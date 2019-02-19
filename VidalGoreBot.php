<?php

class VidalGore
{
 private $maladieType = array(
  array("Saignement %s", "le "),
  array("Ramolissement %s", "le "),
  array("Liquéfaction %s", "la "),
  array("Gonflement %s", "le "),
  array("Perte %s", "la "),
  array("Insuffisance %s", "l'"),
  array("Hyperpilosité %s", "l'"),
  array("Modification %s", "la "),
  array("Fragilisation %s", "la "),
  array("Élargissement %s", "l'"),
  array("Virilisation %s", "la "),
  array("Lamentations %s", "les "),
  array("Convulsions %s", "les "),
  array("Grincement %s", "le "),
  array("Raccourcissement %s", "le "),
  array("Fuite %s", "la "),
  array("Explosion %s", "l'"),
  array("Sécheresse %s", "la "),
  array("Moiteur %s", "la "),
  array("Disparition soudaine %s", "la "),
  array("Surchauffe %s", "la "),
  array("Gémissement %s", "le "),
  array("Autonomie %s", "l'"),
  array("Tristesse %s", "la "),
  array("Inflammation %s", "l'"),
  array("Mauvais caractère %s", "le "),
  array("Multiplication %s", "la "),
  array("Vibration %s", "la "),
  array("Hilarité %s", "l'"),
  array("Déclaration d'indépendance %s", "la "),
  array("Mauvaise odeur %s", "la "),
  array("Insatisfaction %s", "l'"),
  array("Irritabilité %s", "l'"),
  array("Bruits %s", "les "),
  array("Plaintes %s", "les "),
  array("Incontinence %s", "l'"),
  array("Vieillissement %s", "le "),
  array("Ralentissement %s", "le "),
  array("Anorexie %s", "l'"),
  array("Rumination %s", "la "),
  array("Révolte %s", "la "),
  array("Tics %s", "les "),
  array("Vertiges %s", "les "),
  array("Raideur %s", "la "),
  array("Déformation %s", "la "),
  array("Tuméfaction %s", "la "),
  array("Frigidité %s", "la "),
  array("Psychose %s", "la "),
  array("Névrose %s", "la "),
  array("Hallucinations %s", "les "),
  array("Tremblement %s", "le "),
  array("Pâleur %s", "la "),
  array("Surchauffe %s", "la "),
  array("Éclosion %s", "l'"),
  array("Érosion %s", "l'"),
  array("Acouphènes %s", "les "),
  array("Asymétrie %s", "l'"),
  array("Déficit %s", "le "),
  array("Angoisse %s", "l'"),
  array("Hurlements %s", "les "),
  array("Bouillonnement %s", "le "),
  array("Déplacement %s", "le "),
  array("Glissement %s", "le "),
  array("Crissement %s", "le "),
  array("Hypertrophie %s", "l'"),
  array("Assèchement %s", "l'"),
  array("Émiettement %s", "l'"),
  array("Banalité %s", "la "),
  array("Hypotrophie %s", "l'"),
  array("Inversion %s", "l'"),
  array("Somnolence %s", "la "),
  array("Surexcitation %s", "la "),
  array("Mélancolie %s", "la "),
  array("Hypersensibilité %s", "l'"),
  array("Engourdissement %s", "l'"),
  array("Montée au ciel %s", "la "),
  array("Narcissisme %s", "le "),
  array("Onirisme %s", "l'"),
  array("Bégaiement %s", "le "),
  array("Grève %s", "la "),
  array("Menaces %s", "les "),
  array("Machiavélisme %s", "le "),
  array("Agressivité %s", "l'"),
  array("Porosité %s", "la "),
  array("Prolifération %s", "la "),
 );

 private $maladieOrgane = array(
  "de l'anus",
  "des dents",
  "des oreilles",
  "des gencives",
  "des yeux",
  "du cuir chevelu",
  "du nez",
  "des doigts",
  "des orteils",
  "des membres inférieurs",
  "des aisselles",
  "du crâne",
  "des seins",
  "du fémur%droitgauche%",
  "du pied%droitgauche%",
  "des cheveux",
  "des glandes salivaires",
  "de la glande pinéale",
  "de l'âme",
  "du coccyx",
  "de la queue vestigiale",
  "de la peau",
  "des ongles",
  "des parties génitales",
  "du foie",
  "des tendons",
  "des sourcils",
  "de l'abdomen",
  "du torse",
  "du visage",
  "de la nuque",
  "de l'œsophage",
  "des poils pubiens",
  "des vertèbres lombaires",
  "des muscles squelettiques",
  "de la langue",
  "des genoux",
  "des reins",
  "des méninges",
  "du péricarde",
  "des tissus conjonctifs",
  "du sang",
  "de la lymphe",
  "des ganglions",
  "des tissus adipeux",
  "de l'omoplate%droitegauche%",
  "des poignées d'amour",
  "de la vessie",
  "de la luette",
  "de la pomme d'Adam",
  "des articulations",
  "du gros intestin",
  "du troisième œil",
  "de l'inconscient",
  "de l'appendice",
 );

 private $maladiePrecision = array(
  "chez la femme enceinte",
  "chez l'adolescent",
  "chez l'enfant de moins de 36 mois",
  "chez la personne âgée",
  "durant les fortes chaleurs",
  "lors d'un déplacement en zone tropicale",
  "chez la personne souffrant de maladies chroniques",
  "chez le patient hospitalisé",
  "chez la femme ménopausée",
  "chez l'homme d'église",
  "chez le travailleur indépendant",
  "durant les périodes de stress",
  "chez le sous-officier",
  "chez le chef d'orchestre",
  "chez les personnes souffrant de troubles du sommeil",
  "durant les mois d'hiver",
 );

 private $medicamentPrefixe = array(
  array("préparation pour ", 1 ),
  array("substitut de ", 0 ),
  array("mélange à base de ", 0 ),
 );

 private $medicamentType = array(
  array ( "patch dermique %s", 0, "%i patchs" ),
  array ( "collyre %s", 0, "%i gouttes dans chaque œil" ),
  array ( "solution %s", 1, "%i cuillères à café" ),
  array ( "sirop %s", 0, "%i cuillères à café" ),
  array ( "suppositoire %s", 0, "%i suppositoires" ),
  array ( "comprimé %s", 0, "%i comprimés" ),
  array ( "gélule %s", 1, "%i gélules avec un grand verre d'eau" ),
  array ( "granulés %s", 2, "%i granulés" ),
  array ( "compresse %s", 1, "appliquer une compresse" ),
  array ( "pommade %s", 1, "étaler la pommade" ),
  array ( "inhalation %s", 1, "%i inhalations" ),
  array ( "cataplasme %s", 0, "%i applications" ),
  array ( "vaccin %s", 0, "%i injections" ),
  array ( "poudre %s", 1, "%i cuillères à café" ),
 );

 private $medicamentSousType = array(
  array ( "adhésif", "adhésive", "adhésifs", "adhésives", "%i cuillères à café" ),
  array ( "buvable", "buvable", "buvables", "buvables", null ),
  array ( "sucré", "sucrée", "sucrés", "sucrées", null ),
  array ( "parfumé", "parfumée", "parfumés", "parfumées", null ),
  array ( "lubrifié", "lubrifiée", "lubrifiés", "lubrifiées", null ),
  array ( "pelliculé", "pelliculée", "pelliculés", "pelliculées", null ),
  array ( "sécable", "sécable", "sécables", "sécables", null ),
  array ( "effervescent", "effervescente", "effervescents", "effervescentes", "dissoudre dans un grand verre d'eau et avaler" ),
  array ( "chauffant", "chauffante", "chauffants", "chauffantes", null ),
  array ( "mentholé", "mentholée", "mentholés", "mentholées", null ),
  array ( "sans sucre", "sans sucre", "sans sucre", "sans sucre", null ),
  array ( "injectable", "injectable", "injectables", "injectables", "%i injections" ),
 );
 
 private $nomSyllabes = array( "tri", "fla", "bru", "col", "lax", "de", "al", "med", "lip", "bren", "sac" );
 private $nomSyllabesFin = array( "con", "prane", "ment", "zol", "pan", "rine" );

 private $posologieMoment = array(
  "chaque repas",
  "les rapports sexuels",
  "la miction",
  "la défécation",
  "le coucher",
  "le lever",
  "la pleine lune",
  "la tombée de la nuit",
  "le brossage des dents",
  "les jours de pluie",
  "l'anniversaire de mariage",
  "la mise en terre du patient",
  "les crises",
  "un orage", "un orage",
  "un rituel",
  "la puberté",
  "une nuit sans lune",
  "les après-midi d'été",
  "l'autopsie",
  "les prières du soir",
  "qu'il soit trop tard",
  "une gueule de bois",
  "l'aggravation des symptômes",
  "les émotions fortes",
  "le %day% de chaque mois",
 );

 private $posologieChrono = array( "avant", "pendant", "après" );

 public function genererNotice($versionCourte)
 {
  $medic = $this->getRandomArrayElement($this->medicamentType);
  $medicMod = $this->getRandomArrayElement($this->medicamentSousType);

  $notice = "<h2>".$this->genererNom()."</h2>";

  $terminaison = $this->recupererTerminaison($medic[1]);

  $description = "";
  if (mt_rand(1, 10) == 1)
  {
   $medPrefixe = $this->getRandomArrayElement($this->medicamentPrefixe);
   $description .= $medPrefixe[0];
   $terminaison = $this->recupererTerminaison($medPrefixe[1]);
   $description .= $this->genererMedicament($medic, $medicMod);
  }
  else
   $description .= mb_strtolower($this->genererMedicament($medic, $medicMod));
  $description .= " ".$this->genererFonction($terminaison)." ".mb_strtolower($this->genererMaladie(true));
  if (mt_rand(1, 5) == 1) $description .= " ".$this->getRandomArrayElement($this->maladiePrecision);
  $description .= ".";

  $notice .= "<h3>".$this->str1ToUpper($description)."</h3>";

  $notice .= "<p><strong>POSOLOGIE&nbsp;:</strong><br />";
  $notice .= $this->genererPosologie($medic, $medicMod);
  $notice .= ".</p>";

  $miseEnGardeCount = $versionCourte ? 1 : mt_rand(1, 3);
  $notice .= "<p><strong>MISE EN GARDE&nbsp;:</strong><br />";
  $notice .= "Ne pas utiliser en cas ";
  for ($i = 0; $i < $miseEnGardeCount; $i++)
  {
   if ($i > 0)
   {
    if ($i == $miseEnGardeCount - 1) $notice .= " ou ";
    else $notice .= ", ";
   }
   $notice .= "de ".mb_strtolower($this->genererMaladie());
  }
  $notice .= ".</p>";
  
  $indesirableCount = $versionCourte ? 1 : mt_rand(2, 3);
  $notice .= "<p><strong>EFFETS INDÉSIRABLES&nbsp;:</strong><br />";
  for ($i = 0; $i < $indesirableCount; $i++)
  {
   $notice .= $this->genererMaladie()."<br />";
   if ($i < $indesirableCount - 1) $notice .= "\n";
  }
  $notice .= "</p>";

  $notice = str_replace("%day%", strval(mt_rand(2, 28)), $notice);

  $notice = str_replace(" de le ", " du ", $notice);
  $notice = str_replace(" de les ", " des ", $notice);
  $notice = str_replace(" de a", " d'a", $notice);
  $notice = str_replace(" de e", " d'e", $notice);
  $notice = str_replace(" de é", " d'é", $notice);
  $notice = str_replace(" de h", " d'h", $notice);
  $notice = str_replace(" de i", " d'i", $notice);
  $notice = str_replace(" de o", " d'o", $notice);
  $notice = str_replace(" de u", " d'u", $notice);

  return $notice;
 }

 private function genererFonction($terminaison)
 {
  $str = $this->getRandomArrayElement(
   array(
    "utilisé".$terminaison,
    "prescrit".$terminaison,
    "efficace",
    "recommandé".$terminaison
   ));

  $str .= " ";

  $str .= $this->getRandomArrayElement(
   array(
    "contre",
    "dans le traitement de",
    "dans la prévention de"
    ));

  return $str;
 }

 private function recupererTerminaison($indexGenre)
 {
  switch ($indexGenre)
  {
   case 1: return "e";
   case 2: return "s";
   case 3: return "es";
  }

  return "";
 }

 private function genererMaladie($article = false)
 {
  $maladie = $this->getRandomArrayElement($this->maladieType);

  $str = str_replace(
   "%s",
   $this->getRandomArrayElement($this->maladieOrgane),
   $maladie[0]);

 $str = str_replace("%droitgauche%", $this->getRandomArrayElement(array("", " droit", " gauche")), $str);
 $str = str_replace("%droitegauche%", $this->getRandomArrayElement(array("", " droite", " gauche")), $str);

  if ($article) $str = $maladie[1].$str;

  return $str;
 }

 private function str1ToUpper($str) { return mb_strtoupper(mb_substr($str, 0, 1)).mb_substr($str, 1); }

 private function genererPosologie($medic, $medicMod)
 {
  if ($medicMod[4] == null) $action = $medic[2];
  else $action = $medicMod[4];

  $action = str_replace("%i", strval(mt_rand(2, 8)), $action);

  return $this->str1ToUpper($action." ".$this->getRandomArrayElement($this->posologieChrono)." ".$this->getRandomArrayElement($this->posologieMoment));
 }

 private function genererMedicament($medic, $medicMod)
 {
  return str_replace(
   "%s",
   $medicMod[$medic[1]],
   $medic[0]);
 }

 private function genererNom()
 {
  $nom = "";
  $syllabes = mt_rand(3, 4);

  for ($i = 0; $i < $syllabes; $i++)
  {
   if ($i == $syllabes - 1) $nom .= $this->getRandomArrayElement($this->nomSyllabesFin);
   else $nom .= $this->getRandomArrayElement($this->nomSyllabes);
  }

  $nom = mb_strtoupper($nom);
  $nom .= " ".strval(mt_rand(1, 20) * 50)."mg";

  return $nom;
 }

 private function getRandomArrayElement($arr) { return $arr[mt_rand(0, count($arr) - 1)]; }
}

?>