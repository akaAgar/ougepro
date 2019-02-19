<?php

class HasArt
{
public function genererImage()
{
 $width = 682;
 $height = 512;

 $image = imagecreatetruecolor($width, $height);
 imagealphablending($image, true);
 imagesetinterpolation($image, IMG_BSPLINE);
 imagefill($image, 0, 0, $this->getRandomColor($image));

 $passCount = mt_rand(1, 3);
 
 for($i = 0; $i < $passCount; $i++)
 {
   $passType = mt_rand(0, 7);
   
   imagelayereffect($image, IMG_EFFECT_ALPHABLEND);
   switch ($passType)
   {
    case 0: $this->makePolygonPass($image, $width, $height); break;
    case 1: $this->makeLinePass($image, $width, $height); break;
    default: $this->makeImagePass($image, $width, $height); break;
   }
   
   if (mt_rand(0, 1) == 0)
   {
     $effectType = mt_rand(0, 1);
	 
	 switch ($effectType)
     {
       case 0:
        if (mt_rand(0, 3) != 0) break;

	    $image = imagerotate($image, mt_rand(0, 360), $this->getRandomColor($image), 0);
        $image = imagecrop($image, array('x' =>mt_rand(0, imagesx($image) - $width), 'y' => mt_rand(0, imagesy($image) - $height), 'width' => $width, 'height'=> $height));
		break;

       case 1:
	    $srcX = mt_rand($width / 16, $width / 2);
	    $srcY = mt_rand($height / 16, $height / 2);
	    $srcX = mt_rand($width / 16, $width / 2);
	    $srcY = mt_rand($height / 16, $height / 2);
	   
        imagecopyresampled($image, $image, 0, 0, $srcX, $srcY, $width, $height, $width - $srcX, $height - $srcY);
		break;
		
       case 2:
	    imagefilter($image, IMG_FILTER_EMBOSS);
		break;
	 }
   }
 }
 
 imagefilter($image, IMG_FILTER_CONTRAST, mt_rand(-128, 0));
 
 return $image;
}

private function colorImage($image, $r, $g, $b)
{
 $width = imagesx($image);
 $height = imagesy($image);

 for($x = 0; $x < $width; $x++)
 {
  for($y = 0; $y < $height; $y++)
  {
    $rgba = imagecolorat($image, $x, $y);
    $alpha = ($rgba & 0x7F000000) >> 24;
    imagesetpixel($image, $x, $y, imagecolorallocatealpha($image, $r, $g, $b, $alpha));
  }
 }
 
 return $image;
}

private function getRandomColor($image)
{
 $r = mt_rand(0, 255);
 $g = mt_rand(0, 255);
 $b = mt_rand(0, 255);
 return imagecolorallocate($image, $r, $g, $b);
}

private function getRandomColorAlpha($image)
{
 $r = mt_rand(0, 255);
 $g = mt_rand(0, 255);
 $b = mt_rand(0, 255);
 $a = mt_rand(0, 64);
 return imagecolorallocatealpha($image, $r, $g, $b, $a);
}

private function makeImagePass($image, $width, $height)
{
 $pattern = imagecreatefrompng('hasart/brush'.str_pad(mt_rand(0, 16), 3, '0', STR_PAD_LEFT).'.png');
 
 $pattern = $this->colorImage($pattern, mt_rand(0, 255), mt_rand(0, 255), mt_rand(0, 255));
 imagesetinterpolation($pattern, IMG_BSPLINE);
 imagealphablending($pattern, false);
 imagesavealpha($pattern, true);
 $rotation = imagerotate($pattern, mt_rand(0, 360), imagecolorallocatealpha($pattern, 0, 0, 0, 127));
 imagesetinterpolation($rotation, IMG_BSPLINE);
 imagealphablending($rotation, false);
 imagesavealpha($rotation, true);
 
 imagelayereffect($image, IMG_EFFECT_ALPHABLEND);
 
 $imageCount = mt_rand(1, 4);
 for($i = 0; $i < $imageCount; $i++)
   imagecopyresampled($image, $rotation, mt_rand($width / 16, $width / 2), mt_rand($height / 16, $height / 2), 0, 0, mt_rand($width / 16, $width), mt_rand($height / 16, $height), imagesx($rotation), imagesy($rotation));
 
 imagedestroy($rotation);
 imagedestroy($pattern);
}

private function drawNoise($image, $width, $height)
{
 $noiseCol = $this->getRandomColorAlpha($image);
	
 for ($x = 0; $x < $width; $x++)
 {
   for ($y = 0; $y < $height; $y++)
   {
     if (mt_rand(0, 6) == 0)
      imageline($image, $x, $y, $x + 1, $y + 1, $noiseCol);
   }
 }
}

private function makePolygonPass($image, $width, $height)
{
 $polyCount = mt_rand(2, 4);
 
 $option_singleColor = (mt_rand(0, 2) == 0);
 $option_noFill = (mt_rand(0, 5) == 0);
 
 $defaultPassColor = $this->getRandomColorAlpha($image);
 
 for($i = 0; $i < $polyCount; $i++)
 {
  $ptCount = mt_rand(3, 8);
 
  $points = array();
  for($j = 0; $j < $ptCount; $j++)
   array_push($points, mt_rand(1, $width - 1), mt_rand(1, $height - 1));

  if (!$option_singleColor) $defaultPassColor = $this->getRandomColorAlpha($image);

  if ($option_noFill) imagepolygon($image, $points, $ptCount, $defaultPassColor);
  else imagefilledpolygon($image, $points, $ptCount, $this->getRandomColorAlpha($image));
 }
}

private function makeLinePass($image, $width, $height)
{
  $lineCount = mt_rand(8, 16);
  
  $option_singleColor = (mt_rand(0, 1) == 0);
  $option_singleThickness = (mt_rand(0, 1) == 0);
  $option_lineType = mt_rand(0, 3);
  
  for($i = 0; $i < $lineCount; $i++)
  {
    if (($i == 0) || (!$option_singleThickness))
		imagesetthickness($image, mt_rand(1, 8));
	  
    switch ($option_lineType)
	{
      case 0: case 1: $curvedLine = (mt_rand(0, 1) == 0);
	  case 2: $curvedLine = false;
	  case 3: $curvedLine = true;
	}

	if ($curvedLine)
	{
     $cX = mt_rand(1, $width - 1);
     $cY = mt_rand(1, $height - 1);
     $arcW = mt_rand($width / 16, $width);
     $arcH = mt_rand($height / 16, $height);
     $angle0 = mt_rand(0, 360);
     $angle1 = mt_rand(0, 360);

     imagearc($image, $cX, $cY, $arcW, $arcH, min($angle0, $angle1), max($angle0, $angle1), $this->getRandomColor($image));
	}
	else
	{
     $x1 = mt_rand(1, $width - 1);
     $y1 = mt_rand(1, $height - 1);
     $x2 = mt_rand(1, $width - 1);
     $y2 = mt_rand(1, $height - 1);
 
     $lineColor = $this->getRandomColorAlpha($image);
     imageline($image, $x1, $y1, $x2, $y2, $lineColor);
	}
  }
}

private function getRandomArrayElement($arr) { return $arr[mt_rand(0, count($arr) - 1)]; }

public function genererTitre()
{
	$adjectifs = array
(
array("amoureux", "amoureuse"),
array("ancien","ancienne"),
array("animé", "animée"),
array("apaisé","apaisée"),
array("approximatif","approximative"),
array("aride","aride"),
array("au collier de perles", "au collier de perles"),
array("avec joueur de luth", "avec joueur de luth"),
array("automatisé", "automatisée"),
array("autonome","autonome"),
array("avec Jésus enfant", "avec Jésus enfant"),
array("avec enfant","avec enfant"),
array("avec reflet","avec reflet"),
array("avec trois personnages","avec trois personnages"),
array("aérien","aérienne"),
array("baroque", "baroque"),
array("bourgeois", "bourgeoise"),
array("bucolique", "bucolique"),
array("caché", "cachée"),
array("confus","confuse"),
array("d'enfance","d'enfance"),
array("d'éternité","d'éternité"),
array("de sable", "de sable"),
array("décomposé", "décomposée"),
array("déstructuré", "déstructurée"),
array("dynamique", "dynamique"),
array("en croix","en croix"),
array("en deux dimensions", "en deux dimensions"),
array("en flammes","en flammes"),
array("en marche", "en marche"),
array("en mouvement", "en mouvement"),
array("en ruines", "en ruines"),
array("endormi", "endormie"),
array("enneigé","enneigée"),
array("et son modèle", "et son modèle"),
array("figuratif","figurative"),
array("géométrique", "géométrique"),
array("horizontal", "horizontale"),
array("humain", "humaine"),
array("humide","humide"),
array("imaginaire","imaginaire"),
array("inachevé", "inachevée"),
array("invisible", "invisible"),
array("ironique","ironique"),
array("jubilatoire", "jubilatoire"),
array("libéré", "libérée"),
array("lucide","lucide"),
array("lumineux","lumineuse"),
array("léger","légère"),
array("moderne","moderne"),
array("nuageux", "nuageuse"),
array("objectif","objective"),
array("onirique","onirique"),
array("oublié","oubliée"),
array("précieux","précieuse"),
array("pénétrant","pénétrante"),
array("rapide","rapide"),
array("reconstruit", "reconstruite"),
array("religieux","religieuse"),
array("régulier", "régulière"),
array("sanglant", "sanglante"),
array("sans lune","sans lune"),
array("sauvage","sauvage"),
array("silencieux","silencieuse"),
array("solitaire","solitaire"),
array("soluble", "soluble"),
array("sombre","sombre"),
array("souterrain", "souterraine"),
array("statique", "statique"),
array("subjectif","subjective"),
array("sublime","sublime"),
array("sylvestre","sylvestre"),
array("tonitruant", "tonitruante"),
array("tortueux","tortueuse"),
array("toxique", "toxique"),
array("universel", "universelle"),
array("urbain","urbaine"),
array("vertical", "verticale"),
array("agité", "agitée"),
array("virtuel", "virtuelle"),
array("vivace","vivace"),
array("éphémère", "éphémère"),
array("éternel", "éternelle"),
array("ironique", "ironique"),
array("à la cornemuse", "à la cornemuse"),
array("avec coucher de soleil", "avec coucher de soleil"),
array("au pot au lait", "au pot au lait"),
array("mélancolique", "mélancolique"),
array("oblong", "oblongue"),
array("avec figures animales", "avec figures animales"),
array("végétal", "végétale"),
array("du dimanche", "du dimanche"),
array("hivernal", "hivernale"),
array("surpeuplé", "surpeuplée"),
array("en colère", "en colère"),
array("intime", "intime"),
array("dénudé", "dénudée"),
array("populaire", "populaire"),
);

$noms = array
(
array("Abstraction", 1),
array("Accident", 0),
array("Ami", 0),
array("Animal", 0),
array("Arbre", 0),
array("Aristocrate", 0),
array("Armée", 1),
array("Arrangement", 0),
array("Art", 0),
array("Atelier", 0),
array("Aube", 1),
array("Automne", 0),
array("Autoportrait", 0),
array("Banquet", 0),
array("Banquise", 1),
array("Bestiaire", 0),
array("Boulevard", 0),
array("Brouillard", 0),
array("Cascade", 1),
array("Chaos", 0),
array("Chat", 0),
array("Chemin", 0),
array("Cheval", 0),
array("Chimpanzé", 0),
array("Château", 0),
array("Chute", 1),
array("Ciel", 0),
array("Composition", 1),
array("Conflit", 0),
array("Couleur", 1),
array("Couple", 0),
array("Course", 1),
array("Crépuscule", 0),
array("Deuil", 0),
array("Désert", 0),
array("Fluide", 0),
array("Forme", 1),
array("Forêt", 1),
array("Foule", 1),
array("Gouffre", 0),
array("Grotte", 1),
array("Guerre", 1),
array("Haine", 1),
array("Horizon", 0),
array("Humeur", 1),
array("Idée", 1),
array("Image", 1),
array("Impression", 1),
array("Incendie", 0),
array("Instant", 0),
array("Interprétation", 1),
array("Intrus", 0),
array("Jeune femme", 1),
array("Joie", 1),
array("Jour de fête", 0),
array("Lampadaire", 0),
array("Langage", 0),
array("Loi", 1),
array("Lévrier", 0),
array("Madone", 1),
array("Maison", 1),
array("Méditation", 1),
array("Mémoire", 1),
array("Musicien", 0),
array("Naissance", 1),
array("Nature morte", 1),
array("Nostalgie", 1),
array("Nu", 0),
array("Nuit", 1),
array("Nuée", 1),
array("Objet", 0),
array("Océan", 0),
array("Oiseau", 0),
array("Paix", 1),
array("Parcours", 0),
array("Passant", 0),
array("Paysage", 0),
array("Peine", 1),
array("Peur", 1),
array("Pinceau", 0),
array("Plaie", 1),
array("Plaisir", 0),
array("Planète", 1),
array("Poisson", 0),
array("Portrait", 0),
array("Poursuite", 1),
array("Prince", 0),
array("Prière", 1),
array("Projection", 1),
array("Présence", 1),
array("Repas", 0),
array("Richesse", 1),
array("Route", 1),
array("Réalité", 1),
array("Rêverie", 1),
array("Saison", 1),
array("Schéma", 0),
array("Scène de chasse", 1),
array("Scène", 1),
array("Sentiment", 0),
array("Source", 1),
array("Souvenir", 0),
array("Tableau", 0),
array("Tache", 1),
array("Tentative", 1),
array("Traque", 1),
array("Traumatisme", 0),
array("Village", 0),
array("Visage", 0),
array("Vision", 1),
array("Volière", 1),
array("Vérité", 1),
array("Écho", 0),
array("Éclat", 0),
array("Écorché", 0),
array("Église", 1),
array("Étreinte", 1),
array("Étude", 1),
array("Soldat", 0),
array("Ouvrier", 0),
array("Marchand", 0),
array("Rivage", 0),
array("Bocage", 0),
array("Ruelle", 1),
array("Courtisane", 1),
array("Révolution", 1),
);

$n = $this->getRandomArrayElement($noms);

return $n[0]." ".$this->getRandomArrayElement($adjectifs)[$n[1]];

}
}

?>
