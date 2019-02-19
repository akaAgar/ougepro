<?php

function genererDicton()
{
	if (mt_rand(1, 2) == 1) return genererDicton_NoelAuBalconPaquesAuTison();
	return genererDicton_QuiDortDine();
}

function genererDicton_QuiDortDine()
{
  $verbes = array
  (
   array( "aime", "aime" ),
   array( "baise", "baise" ),
   array( "boit", "boit" ),
   array( "chante", "chante" ),
   array( "chie", "chie" ),
   array( "danse", "danse" ),
   array( "digère", "digère" ),
   array( "dîne", "dîne" ),
   array( "dort", "dort" ),
   array( "souffre", "mourra" ),
   array( "mange", "mange" ),
   array( "ment", "ment" ),
   array( "parle", "parle" ),
   array( "paye", "paye" ),
   array( "pleure", "pleure" ),
   array( "prie", "prie" ),
   array( "rêve", "rêve" ),
   array( "rit", "rit" ),
   array( "s'amuse", "vivra" ),
   array( "s'énerve", "s'énerve" ),
   array( "s'est marié", "se mariera" ),
   array( "se confie", "se confie" ),
   array( "travaille", "travaille" ),
  );

  $complements = array
  (
   " à l'église",
   " à Noël",
   " accompagné",
   " au travail",
   " au village",
   " avec son chien",
   " beaucoup",
   " bien",
   " chaque jour",
   " comme son père",
   " dans le fumier",
   " dans les bois",
   " dans son lit",
   " devant ses bêtes",
   " durement",
   " en bon chrétien",
   " entouré d'amis",
   " le coeur léger",
   " le dernier",
   " le premier",
   " heureux",
   " honnêtement",
   " mal",
   " mollement",
   " péniblement",
   " peu",
   " plein d'entrain",
   " pour rien",
   " rarement",
   " sans colère",
   " sans compter",
   " plus que sa femme",
   " sans hésiter",
   " sans raison",
   " seul",
   " sous la pluie",
   " sous son toit",
   " souvent",
   " trop",
   " trop vite",
   " volontiers",
  );

  $text = "Qui ".$verbes[mt_rand(0, count($verbes) - 1)][0].$complements[mt_rand(0, count($complements) - 1)].", ";
  $text .= $verbes[mt_rand(0, count($verbes) - 1)][1].$complements[mt_rand(0, count($complements) - 1)].".";

  return $text;
}

function genererDicton_NoelAuBalconPaquesAuTison()
{
  $moments = array
  (
    "Printemps", "Été", "Automne", "Hiver", "Novembre", "Avril", "Noël", "Pâques", "Vieillard", "Patron", "Chômage",
	"Baptême", "Amour", "Enfant", "Mariage", "Enterrement", "Divorce", "Foyer", "Mari", "Ami", "Amant", "Ouvrier", "Cochon"
  );
  
  $rimes = array
  (
    array( "au blacon", "au tison", "maigrichon", "tatillon", "glouton", "grognon", "brouillon", "en prison", "en haillons" ),
    array( "pluvieux", "heureux", "neigeux", "brumeux", "coûteux", "ennuyeux", "rigoureux", "soucieux" ),
    array( "arrangé", "apaisé", "sauvé", "refusé", "handicapé", "réconcillié", "ruiné", "fortuné", "annulé" ),
    array( "prudent", "souriant", "sans argent", "répugnant", "méchant", "feignant", "fuyant", "bruyant", "décevant" ),
    array( "au cimetière", "à découvert", "désert", "par terre", "solitaire", "à la guerre" ),
    array( "tendu", "perdu", "foutu", "mal tenu", "dans la rue", "inattendu", "qui pue", "tondu" ),
    array( "raisonnable", "coupable", "à l'étable", "charitable", "contestable", "charitable" ),
    array( "sans bétail", "au travail", "qui sent l'aïl", "sans victuailles", "au bercail" ),
    array( "trop gras", "sans achats", "comme un pacha", "goujat", "dans les six mois" ),
    array( "infidèle", "caractériel", "sans écuelle", "exceptionnel", "criminel", "avant Noël"),
	array( "pourri", "réussi", "sans ennui", "épanoui", "dans son lit", "trop petit" ),
	array( "avare", "sur le départ", "bavard", "dans le brouillard", "dans le placard", "en retard", "au plumard" ),
	array( "couleur d'or", "bientôt mort", "sans remors", "retors", "dehors" ),
	array( "sans-le-sou", "dans la gadoue", "jaloux", "sans époux", "au mois d'août", "casse-cou" )
  );

  $rimeList = $rimes[mt_rand(0, count($rimes) - 1)];
  $rimeIndex1 = mt_rand(0, count($rimeList) - 1);
  $rimeIndex2 = getRandomArrayIndexExclusions($rimeList, $rimeIndex1);
  
  $text = $moments[mt_rand(0, count($moments) - 1)]." ".$rimeList[$rimeIndex1].", ";
  $text .= str_replace("É", "é", strtolower($moments[mt_rand(0, count($moments) - 1)]))." ".$rimeList[$rimeIndex2].".";
  
  $text = str_replace("noël", "Noël", $text);
  $text = str_replace("pâques", "Pâques", $text);
  
  return $text;
}

function getRandomArrayIndexExclusions($arr, $exclu)
{
  $index = 0;
  
  do { $index = array_rand($arr); } while ($index == $exclu);

  return $index;
}

?>