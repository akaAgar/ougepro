<?php

class Doutotron
{
 private function addRandomQuotes($text, $oneOutOf, $newsIndex)
{
 $MINWORDLENGTH = 5;

 $text = str_replace("''", "", $text);
 $text = str_replace('"', '', $text);
 $text = str_replace('.', ' .', $text);
 $text = str_replace(',', ' ,', $text);
 $text = str_replace('«', '', $text);
 $text = str_replace('»', '', $text);
 $text = str_replace('»', '', $text);
 $words = explode(' ', $text);

 $wordIndex = 0;
 for ($i=0; $i < count($words); $i++)
 {
  $words[$i] = trim($words[$i], " '");

  if ((strpos($words[$i],'(') >= 0) && (strpos($words[$i],')')  >= 0))
  {
    $words[$i]= str_replace('(', '', $words[$i]);
    $words[$i]= str_replace(')', '', $words[$i]);
  }

  if ((strlen($words[$i]) >= $MINWORDLENGTH) && ($words[$i] == 0) &&
    (!ctype_upper (substr($words[$i], 0, 1))))
  {
   if (($wordIndex % $oneOutOf) == 1) { $words[$i] = '« '.$words[$i].' »'; }
   $wordIndex++;
  }
 }

 $text = implode(' ', $words);

 $text = str_replace(' .', '.', $text);
 $text = str_replace(' ,', ',', $text);
 return $text;
}

public function genererDoutotron($quantite = 1)
{
 $titres = array();
 $details = array();

// Récupération des news
$fullRssFeed = file_get_contents("http://www.lemonde.fr/rss/une.xml");
$fullRssFeed = str_replace('&nsbp;', ' ', $fullRssFeed );
$newsIndex = 0;

for ($nCnt = 0; $nCnt < $quantite; $nCnt++)
{
 $wordIndex = ($nCnt % 2);

  // On isole la news
  $start = strpos($fullRssFeed, '<item>', $newsIndex) + 6;
  $end = strpos($fullRssFeed, '</item>', $newsIndex) + 7;

  $rssFeed = substr($fullRssFeed, $start, $end - $start);

  $newsIndex = $end;

  // On récupère le titre
  $start = strpos($rssFeed, '<title>') + 7;
  $end = strpos($rssFeed, '</title>');
  $title = substr($rssFeed, $start, $end - $start);
  array_push($titres, $this->addRandomQuotes($title,2,$nCnt));

  // On ajoute le corps du texte
  $start = strpos($rssFeed, '<description>') + 13;
  $end = strpos($rssFeed, '</description>');
  $description = strip_tags(html_entity_decode(substr($rssFeed, $start, $end - $start)));

  array_push($details, $this->addRandomQuotes($description,2,$nCnt));
}

 return array($titres, $details);
}

}

?>
