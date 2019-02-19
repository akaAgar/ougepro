<?php

function getRandomSubject()
{
 $sujets = array
 (
  array("l'oeuvre d'art", "f"),
  array("la réalité", "f"),
  array("l'art", "m"),
  array("l'opinion", "f"),
  array("le pouvoir de refuser", "m"),
  array("le bonheur", "m"),
  array("la liberté", "f"),
  array("le vivant", "m"),
  array("le désir", "m"),
  array("la connaissance", "f"),
  array("la loi", "f"),
  array("l'autre", "m"),
  array("l'homme", "m"),
  array("l'expérience", "f"),
  array("la paix", "f"),
  array("la perception", "f"),
  array("l'objectivité", "f"),
  array("l'impartialité", "f"),
  array("le temps", "m"),
  array("la culture", "f"),
  array("le langage", "m"),
  array("la science", "f"),
  array("l'État", "m"),
  array("la nature", "f"),
  array("la vérité", "f"),
  array("la croyance", "f"),
  array("le travail", "m"),
  array("l'éphémère", "m"),
  array("la justice", "f"),
  array("l'égalité", "f")
 );
 
 $structures = array
 (
  array("%1 est-il limité par %2", "%1 est-elle limitée par %2"),
  array("%1 peut-il être %e", "%1 peut-elle être %e"),
  array("%1 peut-il ne pas être %e", "%1 peut-elle ne pas être %e"),
  array("%1 a-t-il des limites", "%1 a-t-elle des limites"),
  array("%1 a-t-il un sens", "%1 a-t-elle un sens"),
  array("%1 est-il avant tout %2", "%1 est-elle avant tout %2"),
  array("%1 est-il capable d'être %e", "%1 est-elle capable d'être %e"),
  array("Faut-il préférer %1 à %2", "Faut-il préférer %1 à %2"),
  array("Que vaut l'opposition de %1 et de %2", "Que vaut l'opposition de %1 et de %2"),
  array("%1 peut-il se satisfaire de %2", "%1 peut-elle se satisfaire de %2"),
  array("La recherche de %1 est-elle %e", "La recherche de %1 est-elle %e"),
  array("%1 transforme-t-il notre conscience de %2", "%1 transforme-t-elle notre conscience de %2"),
  array("Peut-on comprendre %1", "Peut-on comprendre %1"),
  array("%1 peut-il s'éduquer", "%1 peut-elle s'éduquer"),
  array("Peut-on échapper à %1", "Peut-on échapper à %1"),
  array("%1 n'est-il qu'un outil", "%1 n'est-elle qu'un outil"),
  array("%1 se limite-t-il à %2", "%1 se limite-t-elle à %2"),
  array("Que devons-nous à %1", "Que devons-nous à %1"),
  array("%1 nous permet-il de prendre conscience de %2", "%1 nous permet-elle de prendre conscience de %2"),
  array("Devons-nous aspirer à maîtriser %1", "Devons-nous aspirer à maîtriser %1"),
  array("%1 est-il contraire à %2", "%1 est-elle contraire à %2"),
  array("Peut-on vivre sans %1", "Peut-on vivre sans %1"),
  array("Avons-nous le devoir de chercher %1", "Avons-nous le devoir de chercher %1"),
  array("%1 a-t-il de la valeur", "%1 a-t-elle de la valeur")
 );
 
 $epithetes = array
 (
  array("vrai", "vraie"),
  array("beau", "belle"),
  array("raisonnable", "raisonnable"),
  array("universel", "universelle"),
  array("désintéressé", "désintéressée"),
  array("naturel", "naturelle"),
  array("utile", "utile"),
  array("juste", "juste"),
  array("humain", "humaine"),
  array("historique", "historique")
 );
	
$text = "";
$selSujet = array(0, 0);


$selSujet[0] = array_rand($sujets);
$selSujet[1] = getRandomArrayIndexExclusions($sujets, $selSujet[0]);

$selStruct = array_rand($structures);

$femID = 0;
if ($sujets[$selSujet[0]][1] == "f") $femID = 1;

$text = $structures[$selStruct][$femID];
$text = str_replace("%e", $epithetes[array_rand($epithetes)][$femID], $text);

 $text = str_replace("%1", $sujets[$selSujet[0]][0], $text);
 $text = str_replace("%2", $sujets[$selSujet[1]][0], $text);
 $text = str_replace(" de le ", " du ", $text);
 $text = str_replace(" à le ", " au ", $text);
 $text = strtoupper(substr($text, 0, 1)) . substr($text, 1);
 $text = $text . " ?";

 return $text;
}

function getRandomArrayIndexExclusions($arr, $exclu)
{
  $index = 0;
  
  do { $index = array_rand($arr); } while ($index == $exclu);

  return $index;
}

?>