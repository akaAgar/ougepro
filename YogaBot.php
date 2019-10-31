<?php

class YogaBot
{
 private $posesNom = array(
  array("anguille", 1),
  array("armoire", 1),
  array("bélier", 0),
  array("bonsaï", 0),
  array("bestiole", 1),
  array("bousier", 0),
  array("capybara", 0),
  array("combattant", 0),
  array("lamantin", 0),
  array("limace", 1),
  array("loutre", 1),
  array("moine", 0),
  array("murène", 1),
  array("ornithorynque", 0),
  array("pangolin", 0),
  array("poulet", 0),
  array("poutre", 1),
  array("sage", 0),
  array("scarabée", 0),
  array("thon", 0),
  array("zèbre", 0),
 );

 private $posesAdjectif = array(
  array("demi-%s", "demie-%s"),
  array("double %s", "double %s"),
  array("grand %s", "grande %s"),
  array("petit %s", "petite %s"),
  array("vénérable %s", "vénérable %s"),
  array("%s assoupli", "%s assouplie"),
  array("%s astucieux", "%s astucieuse"),
  array("%s calme", "%s calme"),
  array("%s carapacé", "%s carapacée"),
  array("%s détendu", "%s détendue"),
  array("%s fluide", "%s fluide"),
  array("%s hilare", "%s hilare"),
  array("%s inversé", "%s inversée"),
  array("%s pensif", "%s pensive"),
  array("%s pétrifié", "%s pétrifié"),
  array("%s primitif", "%s primitive"),
  array("%s retourné", "%s retournée"),
  array("%s rigide", "%s rigide"),
  array("%s serein", "%s sereine"),
  array("%s simple", "%s simple"),
  array("%s stable", "%s stable"),
  array("%s tête en bas", "%s tête en bas"),
  array("%s tête en haut", "%s tête en haut"),
  array("%s tordu", "%s tordue"),
 );

 private $debuts = array(
  "allongé sur %partie1%",
  "assis sur %partie1%",
  "dans une expiration",
  "debout sur %partie1%",
 );

 private $partiesCorps = array(
  array("le bras", 0, true),
  array("le centre", 0, false),
  array("le cœur", 0, false),
  array("le cou", 0, false),
  array("le coude", 0, true),
  array("la cuisse", 1, true),
  array("le dos", 0, false),
  array("le genou", 0, true),
  array("la hanche", 1, true),
  array("la jambe", 1, true),
  array("la main", 1, true),
  array("le nez", 0, false),
  array("l'oreille", 1, true),
  array("la tête", 1, false),
 );

 private $partiesCorpsAdjectifs = array(
  array("%s arrière", "%s arrière"),
  array("%s avant", "%s avant"),
  array("%s droit", "%s droite"),
  array("%s du bas", "%s du bas"),
  array("%s du haut", "%s du haut"),
  array("%s gauche", "%s gauche"),
 );

 private $directions = array(
  "l'arrière",
  "l'avant",
  "la droite",
  "la gauche",
  "le ciel",
  "le sol",
  "le tapis",
 );

 private $positionsRelatives = array(
  "au-dessus de",
  "contre",
  "devant",
  "derrière",
  "sous",
 );

 private $verbes = array(
  "alignez",
  "allongez",
  "ancrez",
  "arrondissez",
  "basculez",
  "écartez",
  "expirez",
  "gardez",
  "inspirez",
  "lancez",
  "pliez",
  "poussez",
  "tendez",
  "tirez",
  "tordez",
 );

 private $mouvements = array(
  "%verbe% %partie1% vers %direction%",
  "%verbe% %partie1% %positionRelative% %partie2%",
 );

 public function generer($formatHTML)
 {
  $pNom = $this->randomArray($this->posesNom);
  $pAdj = $this->randomArray($this->posesAdjectif);
  $pose = str_replace("%s", $pNom[0], $pAdj[$pNom[1]]);

  $description = "";
  $mouvementTotal = mt_rand(2, 4);
  for ($i = 0; $i < $mouvementTotal; $i++)
  {
    if ($i == 1) $description .= ", ";
    else if ($i > 1) $description .= " puis ";

    $descriptionPartie = "";
    if ($i == 0)
      $descriptionPartie = $this->randomArray($this->debuts);
    else
      $descriptionPartie = $this->randomArray($this->mouvements);

    for ($j = 1; $j <= 2; $j++)
    {
      $partieCorps = $this->randomArray($this->partiesCorps);
      if ($partieCorps[2]) // partie fournie par paires (mains, bras...)
        $partieCorps = str_replace("%s", $partieCorps[0], $this->randomArray($this->partiesCorpsAdjectifs)[$partieCorps[1]]);
      else
        $partieCorps = $partieCorps[0];

      $descriptionPartie = str_replace("%partie".strval($j)."%", $partieCorps, $descriptionPartie);
    }
    $descriptionPartie = str_replace("%direction%", $this->randomArray($this->directions), $descriptionPartie);
    $descriptionPartie = str_replace("%verbe%", $this->randomArray($this->verbes), $descriptionPartie);
    $descriptionPartie = str_replace("%positionRelative%", $this->randomArray($this->positionsRelatives), $descriptionPartie);
    $description .= $descriptionPartie;
  }

  $description = str_replace(" de le ", " du ", $description);

  if ($formatHTML)
    return "<strong>".mb_strtoupper($pose)."</strong>&nbsp;: ".$description;
  else
    return mb_strtoupper($pose)." : ".$description;
 }

 private function randomArray($arr)
 {
   return $arr[mt_rand(0, count($arr) - 1)];
 }
}

?>
