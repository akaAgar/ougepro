<?php

class BorgesEnBabel
{
 private $intro = array(
  "", "", "",

  "Je crois que ",
  "J'ai toujours dit que ",
  "Il est %ADJ0% pour moi de %VERB0% que ",
  "Il est facile de %VERB0% que ",

  "%AUT% nous invit%AUT_TERM% à %VERB0% que ",
  "%AUT% %VERB_AUTEUR%%AUT_TERM% que ",
  "D'après %AUT%, ",
  "Je pense avec %AUT% que ",
 );

 private $auteurs = array(
  array("Berkeley", "e"),
  array("Blake", "e"),
  array("Chesterton", "e"),
  array("Kafka", "e"),
  array("Lugones", "e"),
  array("Milton", "e"),
  array("Nietzsche", "e"),
  array("Pessoa", "e"),
  array("Poe", "e"),
  array("Schelling", "e"),
  array("Schopenhauer", "e"),
  array("la Bhagavad-Gita", "e"),
  array("les Allemands", "ent"),
  array("les Argentins", "ent"),
  array("les Pères de l'Église", "ent"),
  array("les gnostiques", "ent"),
 );

 private $adjectifs = array(
  array("absurde", "absurde"),
  array("contradictoire", "contradictoire"),
  array("divin", "divine"),
  array("essentiel", "essentielle"),
  array("humain", "humaine"),
  array("idéal", "idéale"),
  array("imparfait", "imparfaite"),
  array("impossible", "impossible"),
  array("incompréhensible", "incompréhensible"),
  array("inutile", "inutile"),
  array("inévitable", "inévitable"),
  array("logique", "logique"),
  array("naturel", "naturelle"),
  array("nécessaire", "nécessaire"),
  array("originel", "originelle"),
  array("parfait", "parfaite"),
  array("potentiel", "potentielle"),
  array("religieux", "religieuse"),
  array("vital", "vitale"),
 );
 
 private $verbes_auteur = array(
  "affirm",
 );
 
 private $verbes = array(
  "comprendre",
  "concevoir",
  "expliquer",
  "nier",
  "oublier",
  "penser",
  "prendre conscience de",
  "ressentir",
  "réaliser",
  "voir",
 );
  
 private $structures = array(
  "%le_N1% n'a pas d'autres limites que %le_N2%.",
  "%le_N1% est la forme la plus parfaite de %N2%.",
  "%le_N1% est la vérité de %le_N2%.",
  "%le_N1% est une métaphore de %le_N2%.",
  "%le_N1% n'existe que pour aboutir à %le_N2%.",
  "%le_N1% peut devenir une forme de %N2%.", //, el momento en que una persona se revela a otra.
  "%le_N1% a besoin de faire de %le_N2% %un_N3%.",
  "sans %le_N1%, %le_N2% serait %ADJ2%.",
  "%le_N1% n'a d'autre finalité que de nous faire %VERB1% %le_N2%.",
  "chaque %N1% est %un_N2%.",
  "tout%e1% %N1% contient %un_N2%.",
  "%le_N1% n'est pas %un_N2% de %le_N3%.",
  "%le_N1% est la conséquence %ADJe% de %le_N2%.", // la conclusion ?
  "l'idée de %un_N1% %ADJ1% est %ADJe%.", // la possibilité ?
  "%le_N1% est %un_N2% %ADJ2% de %le_N3%.",
  "%VERB1% %le_N1% est %VERB2% %le_N2%."
 );

 private $noms = array(
  array("amour", 0),
  array("auteur", 0),
  array("biographie", 1),
  array("bouddhisme", 0),
  array("brouillon", 0),
  array("christianisme", 0),
  array("création", 1),
  array("dictionnaire", 0),
  array("désir", 0),
  array("existence", 1),
  array("fiction", 1),
  array("foi", 1),
  array("honte", 1),
  array("humilité", 1),
  array("imagination", 1),
  array("individu", 0),
  array("langue", 1),
  array("lecteur", 0),
  array("littérature fantastique", 1),
  array("livre", 0),
  array("mensonge", 0),
  array("monde", 0),
  array("mort", 1),
  array("mot", 0),
  array("musique", 1),
  array("mythologie", 1),
  array("mémoire", 1),
  array("métaphore", 1),
  array("oubli", 0),
  array("pardon", 0),
  array("phrase", 1),
  array("poème", 0),
  array("poésie", 1),
  array("péché", 0),
  array("religion", 1),
  array("renoncement", 0),
  array("roman", 0),
  array("réalité spirituelle", 1),
  array("réalité", 1),
  array("récit", 0),
  array("répétition", 1),
  array("révélation", 1),
  array("sacrifice", 0),
  array("sensibilité", 1),
  array("souvenir", 0),
  array("temps", 0),
  array("théologie", 1),
  array("univers", 0),
  array("vie", 1),
  array("âme", 1),
  array("éternité", 1),
  array("être", 0),
 );

 private function randArray($arr)
 { return $arr[mt_rand(0, count($arr) - 1)]; }

 private function ajouter_article($nom, $article)
 {
  return $article[$nom[1]]." ".$nom[0];
 }
 
 private function remplacementAvantVoyelle($avant, $apres, $texte)
 {
  $voyelles = array(
   "a","à","â","e","é","è","ê","ë","i","î","ï","o","ô","u","ù","û",
   "A","À","Â","E","É","È","Ê","Ë","I","Î","Ï","O","Ô","U","Ù","Û",
   "h", "H", "y", "Y");

  foreach($voyelles as $v)
   $texte = str_replace($avant.$v, $apres.$v, $texte);
  
  return $texte;
 }

 public function generer()
 {
  $terminaisons = array('', 'e', 's', 'es');

  $texte = $this->randArray($this->intro).$this->randArray($this->structures);

  $auteur = $this->randArray($this->auteurs);
  
  $texte = str_replace("%AUT%", $auteur[0], $texte);
  $texte = str_replace("%VERB_AUTEUR%", $this->randArray($this->verbes_auteur), $texte);
  $texte = str_replace("%AUT_TERM%", $auteur[1], $texte);

  $texte = str_replace("%VERB0%", $this->randArray($this->verbes), $texte);
  $texte = str_replace("%VERB1%", $this->randArray($this->verbes), $texte);
  $texte = str_replace("%VERB2%", $this->randArray($this->verbes), $texte);
  
  $nom1 = $this->randArray($this->noms);
  $nom2 = $this->randArray($this->noms);
  $nom3 = $this->randArray($this->noms);

  $texte = str_replace("%N1%", $nom1[0], $texte);
  $texte = str_replace("%N2%", $nom2[0], $texte);
  $texte = str_replace("%N3%", $nom3[0], $texte);

  $texte = str_replace("%le_N1%", $this->ajouter_article($nom1, array("le", "la")), $texte);
  $texte = str_replace("%le_N2%", $this->ajouter_article($nom2, array("le", "la")), $texte);
  $texte = str_replace("%le_N3%", $this->ajouter_article($nom3, array("le", "la")), $texte);
  
  $texte = str_replace("%un_N1%", $this->ajouter_article($nom1, array("un", "une")), $texte);
  $texte = str_replace("%un_N2%", $this->ajouter_article($nom2, array("un", "une")), $texte);
  $texte = str_replace("%un_N3%", $this->ajouter_article($nom3, array("un", "une")), $texte);

  $texte = str_replace("%e1%", $terminaisons[$nom1[1]], $texte);
  $texte = str_replace("%e2%", $terminaisons[$nom2[1]], $texte);
  $texte = str_replace("%e3%", $terminaisons[$nom3[1]], $texte);
  
  $texte = str_replace("%ADJ0%", $this->randArray($this->adjectifs)[0], $texte);
  $texte = str_replace("%ADJ%", $this->randArray($this->adjectifs)[0], $texte);
  $texte = str_replace("%ADJe%", $this->randArray($this->adjectifs)[1], $texte);
  $texte = str_replace("%ADJ1%", $this->randArray($this->adjectifs)[$nom1[1]], $texte);
  $texte = str_replace("%ADJ2%", $this->randArray($this->adjectifs)[$nom2[1]], $texte);
  $texte = str_replace("%ADJ3%", $this->randArray($this->adjectifs)[$nom3[1]], $texte);
 
  // ajout d'un espace au début pour que les remplacements aient lieu
  // sur le premier mot
  $texte = " ".$texte;

  $texte = str_replace(" de que ", " que ", $texte);
  
  $texte = $this->remplacementAvantVoyelle(" le ", " l'", $texte);
  $texte = $this->remplacementAvantVoyelle(" la ", " l'", $texte);

  // doit être après "le => l'" pour éviter "du l'amour"
  $texte = str_replace(" à le ", " au ", $texte);
  $texte = str_replace(" de le ", " du ", $texte);
  
  $texte = $this->remplacementAvantVoyelle(" de ", " d'", $texte);
  $texte = $this->remplacementAvantVoyelle(" quee ", " qu'", $texte);
  
  $texte = str_replace("l'honte", "la honte", $texte);

  $texte = strtoupper(substr($texte, 1, 1)).substr($texte, 2);

  return $texte;
 }
}

?>