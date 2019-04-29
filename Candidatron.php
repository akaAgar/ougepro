<?php

class Candidatron
{
  private $fontPath = './candidatron/font.ttf';
  private $colorWhite = null;
  private $colorBlack = null;
  
  private $noms1 = array("ber", "bess", "bez", "bourg", "bur", "capu", "caro", "cha", "cheur", "cler", "cruci", "cure", "flav", "fleur", "foul", "gerb", "glo", "gol", "gou", "gro", "grou", "kro", "kui", "lam", "lapou", "len", "lon", "mar", "maz", "mich", "mou", "muf", "mul", "nou", "pin", "queut", "rum", "sex", "tar", "trou");
  
  private $noms2 = array("beu", "bin", "bulu", "chy", "dain", "duche", "flon", "gieux", "gras", "gneux", "gnon", "gny", "gol", "gon", "goulle", "ignac", "ine", "kin", "lard", "leuf", "leuse", "lèse", "mère", "min", "mont", "monte", "mou", "nard", "neuf", "nier", "pain", "pion", "poing", "pleutre", "rousse", "rouze", "tempe", "thon", "tintin", "touse", "zion");
  
  private $sloganNoms = array(array("bilan", 0), array("communisme", 0), array("changement", 0), array("culture", 1), array("développement", 0), array("démocratie", 1), array("France", 1), array("France", 1), array("écologie", 1), array("économie", 1), array("éducation", 1), array("égalité", 1), array("Europe", 1), array("Europe", 1), array("justice", 1), array("libéralisme", 0), array("pays", 0), array("parlement", 0), array("police", 1), array("présidence", 1), array("progrès", 0), array("quinquennat", 0), array("redistribution", 1), array("République", 1), array("réforme", 1), array("société", 1));
  
  private $sloganAdjectifs = array("abîmé€", "affamé€", "agité€", "aimable", "amusant€", "angoissé€", "aristocratique", "assoupi€", "bizarre", "bleu€", "blond€", "brillant€", "brûlant€", "bruyant€", "calme", "carnivore", "herbivore", "pacifiste", "cassé€", "chaud€", "clair€", "colérique", "comestible", "complexe", "confortable", "confus€", "décevant€", "difficile", "dur€", "effrayé€", "électrique", "énervé€", "enflé€", "énorme", "étendu€", "étroit€", "fatiguant€", "foncé€", "fragile", "froid€", "gai€", "gelé€", "gigantesque", "gonflable", "gourmand€", "gris€", "handicapé€", "hilare", "humide", "immense", "immobile", "impossible", "incompréhensible", "inégal€", "instable", "intéressant€", "lent€", "lisse", "lourd€", "maigre", "malade", "maladroit€", "méchant€", "méfiant€", "meilleur€", "moite", "mort€", "mouillé€", "multicolore", "mûr€", "nain€", "noble", "nu€", "obèse", "pâle", "patient€", "pointu€", "poli€", "profond€", "propre", "radical€", "rapide", "riche", "rond€", "rouge", "satisfait€", "simple", "solide", "solitaire", "sombre", "souple", "sourd€", "tendu€", "tentaculaire", "terrifiant€", "tolérable", "tordu€", "tranquille", "transparent€", "triste", "usé€", "vaste", "vert€", "vide", "violent€", "vivant€", "volant€", "vulgaire");
  
  private $nomsPartis = array(array("Parti", 0), array("Rassemblement", 0), array("Union", 1));
  
  private $couleursSlogan = array(array(164, 96, 0), array(96, 128, 164), array(128, 164, 96), array(192, 0, 0), array(0, 164, 0), array(0, 0, 164));
  
  
  private function texteAvecOmbre($im, $taille, $x, $y, $texte)
  {
    $offsetOmbre = max(1, $taille / 24);
    
    imagettftext($im, $taille, 0, $x + $offsetOmbre, $y + $offsetOmbre, $this->colorBlack, $this->fontPath, $texte);
    imagettftext($im, $taille, 0, $x, $y, $this->colorWhite, $this->fontPath, $texte);
  }
  
  private function majusculePremiereLettre($texte)
  {
    return mb_strtoupper(mb_substr($texte, 0, 1)) . mb_substr($texte, 1);
  }
  
  private function largeurTexte($texte, $taille)
  {
    global $fontPath;
    
    $textBox = imagettfbbox($taille, 0, $this->fontPath, $texte);
    return $textBox[4] - $textBox[0];
  }
  
  public function generer()
  {
    global $colorWhite, $colorBlack, $fontPath;
    
    $im = imagecreatefromjpeg('https://thispersondoesnotexist.com/image');
    $im = imagecrop($im, array(
      'x' => 0,
      'y' => 0,
      'width' => 1024,
      'height' => 1152
    ));
    
    $this->colorWhite  = imagecolorallocate($im, 255, 255, 255);
    $this->colorBlack  = imagecolorallocate($im, 0, 0, 0);
    $couleurSlogan     = $this->couleursSlogan[mt_rand(0, count($this->couleursSlogan) - 1)];
    $colorBandeau      = imagecolorallocatealpha($im, $couleurSlogan[0], $couleurSlogan[1], $couleurSlogan[2], 48);
    $colorBandeauSolid = imagecolorallocate($im, $couleurSlogan[0], $couleurSlogan[1], $couleurSlogan[2]);
    
    $prenom = $this->noms1[mt_rand(0, count($this->noms1) - 1)] . $this->noms2[mt_rand(0, count($this->noms2) - 1)];
    $prenom = $this->majusculePremiereLettre($prenom);
    
    $nom = $this->noms1[mt_rand(0, count($this->noms1) - 1)] . $this->noms2[mt_rand(0, count($this->noms2) - 1)];
    $nom = $this->majusculePremiereLettre($nom);
    
    $nomComplet = $prenom . " " . $nom;
    
    $points = array(
      0,
      817,
      1024,
      894,
      1024,
      1024,
      0,
      1024
    );
    imagefilledpolygon($im, $points, 4, $colorBandeau);
    imagefilledrectangle($im, 0, 1024, 1024, 1280, $colorBandeauSolid);
    
    $this->texteAvecOmbre($im, 48, 16, 894, $prenom);
    $this->texteAvecOmbre($im, 96, 16, 1008, $nom);
    
    $nomParti    = array();
    $nomParti[0] = $this->nomsPartis[mt_rand(0, count($this->nomsPartis) - 1)];
    $nomParti[1] = $this->majusculePremiereLettre($this->sloganAdjectifs[mt_rand(0, count($this->sloganAdjectifs) - 1)]);
    if ($nomParti[0][1] == 1) // sujet féminin
      $nomParti[1] = str_replace("€", "e", $nomParti[1]);
    else
      $nomParti[1] = str_replace("€", "", $nomParti[1]);
    $nomParti[0] = $nomParti[0][0];
    
    $initialesParti = array();
    for ($i = 0; $i < 2; $i++)
      $initialesParti[$i] = mb_substr($nomParti[$i], 0, 1);
    
    for ($i = 0; $i < 2; $i++)
      $this->texteAvecOmbre($im, 64, 72 - $this->largeurTexte($initialesParti[$i], 64) / 2 + (40 * $i), 84, $initialesParti[$i]);
    
    $this->texteAvecOmbre($im, 18, 92 - $this->largeurTexte($nomParti[0], 18) / 2, 116, $nomParti[0]);
    $this->texteAvecOmbre($im, 18, 92 - $this->largeurTexte($nomParti[1], 18) / 2, 140, $nomParti[1]);
    
    $slogan  = "Pour ";
    $sloganN = $this->sloganNoms[mt_rand(0, count($this->sloganNoms) - 1)];
    $slogan .= ($sloganN[1] == 1) ? "une" : "un";
    $slogan .= " " . $sloganN[0];
    $slogan .= " " . $this->sloganAdjectifs[mt_rand(0, count($this->sloganAdjectifs) - 1)];
    if ($sloganN[1] == 1) // sujet féminin
      $slogan = str_replace("€", "e", $slogan);
    else
      $slogan = str_replace("€", "", $slogan);
    
    $this->texteAvecOmbre($im, 48, 18, 1110, $slogan);
    
    // Retourne une array de 2 valeurs :
    // #0: une string "Pour XXX XXX, votez XXX XXX (parti XXX)
    // #1: l'image
    
    return Array(
      $slogan . ", votez " . $prenom . " " . $nom . " (" . $nomParti[0] . " " . $nomParti[1] . ")",
      $im
    );
  }
}

?>
