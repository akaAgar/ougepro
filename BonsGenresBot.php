<?php

class BonChicBonsGenres
{
public function genererGenre($majuscule = true)
{
 $bases = array(
 array("autofiction", 1 ),
 array("ballade", 1 ),
 array("bande dessinée", 1 ),
 array("biographie", 1 ),
 array("body horror", 0 ),
 array("calligramme", 0 ),
 array("carnet de bord", 0 ),
 array("chanson de geste", 1 ),
 array("copypasta", 0 ),
 array("comédie", 1 ),
 array("complainte", 1 ),
 array("confession", 1 ),
 array("conversation", 1 ),
 array("conte", 0 ),
 array("cyberpunk", 0 ),
 array("essai", 0 ),
 array("fable", 1 ),
 array("fabliau", 0 ),
 array("fanfiction", 1 ),
 array("fantasy", 1 ),
 array("farce", 1 ),
 array("féérie", 1 ),
 array("fiction", 1 ),
 array("haïkus", 2 ),
 array("journal intime", 0 ),
 array("journalisme", 0 ),
 array("kōans", 2 ),
 array("maximes", 3 ),
 array("mémoires de guerre", 2 ),
 array("monologue", 0 ),
 array("nanolittérature", 1 ),
 array("nouvelle", 1 ),
 array("opéra", 0 ),
 array("opéra bouffe", 0 ),
 array("parabole", 1 ),
 array("réalisme", 0 ),
 array("récit", 0 ),
 array("roman", 0 ),
 array("roman noir", 0 ),
 array("romance", 1 ),
 array("pamphlet", 0 ),
 array("pensées", 3 ),
 array("pièce de théâtre", 1 ),
 array("poésie", 1 ),
 array("polar", 0 ),
 // array("portrait", 0 ),
 array("science-fiction", 1 ),
 array("sermon", 0 ),
 array("space opera", 0 ),
 array("steampunk", 0 ),
 array("sonnet", 0 ),
 array("témoignage", 0 ),
 array("thriller", 0 ),
 array("tragédie", 1 ),
 array("tragicomédie", 1 ),
 );

 $articles = array("le", "la", "les", "les" );

 // ACHTUNG !!! Ajouter aussi la ligne dans prefixes_base
 $prefixes = array(
 array("archéo-", "archéo-", "archéo-", "archéo-" ),
 array("afro-", "afro-", "afro-", "afro-" ),
 array("anti-", "anti-", "anti-", "anti-" ),
 array("crypto-", "crypto-", "crypto-", "crypto-" ),
 array("cyber-", "cyber-", "cyber-", "cyber-" ),
 array("méta-", "méta-", "méta-", "méta-" ),
 array("micro-", "micro-", "micro-", "micro-" ),
 array("néo-", "néo-", "néo-", "néo-" ),
 array("non-", "non-", "non-", "non-" ),
 array("paléo-", "paléo-", "paléo-", "paléo-" ),
 array("post-", "post-", "post-", "post-" ),
 array("proto-", "proto-", "proto-", "proto-" ),
 array("pseudo-", "pseudo-", "pseudo-", "pseudo-" ),
 array("semi-", "semi-", "semi-", "semi-" ),
 array("techno-", "techno-", "techno-", "techno-" ),
 );

// ACHTUNG !!! Ajouter aussi la ligne dans prefixes
 $prefixes_base = array(
 array("archéo-", "archéo-", "archéo-", "archéo-" ),
 array("afro-", "afro-", "afro-", "afro-" ),
 array("anti-", "anti-", "anti-", "anti-" ),
 array("crypto-", "crypto-", "crypto-", "crypto-" ),
 array("cyber-", "cyber-", "cyber-", "cyber-" ),
 array("nouveau ", "nouvelle ", "nouveaux ", "nouvelles " ),	// Unique à ce tableau
 array("méta-", "méta-", "méta-", "méta-" ),
 array("micro-", "micro-", "micro-", "micro-" ),
 array("néo-", "néo-", "néo-", "néo-" ),
 array("non-", "non-", "non-", "non-" ),
 array("paléo-", "paléo-", "paléo-", "paléo-" ),
 array("post-", "post-", "post-", "post-" ),
 array("proto-", "proto-", "proto-", "proto-" ),
 array("pseudo-", "pseudo-", "pseudo-", "pseudo-" ),
 array("semi-", "semi-", "semi-", "semi-" ),
 array("techno-", "techno-", "techno-", "techno-" ),
 );

 $suffixes = array(
 array("magique", "magique", "magiques", "magiques", 1 ),

 array("d'amour", "d'amour", "d'amour", "d'amour", 0 ),
 array("d'apprentissage", "d'apprentissage", "d'apprentissage", "d'apprentissage", 0 ),
 array("d'aventure", "d'aventure", "d'aventure", "d'aventure", 0 ),
 array("d'épouvante", "d'épouvante", "d'épouvante", "d'épouvante", 0 ),
 array("d'espionnage", "d'espionnage", "d'espionnage", "d'espionnage", 0 ),
 array("d'anticipation", "d'anticipation", "d'anticipation", "d'anticipation", 0 ),

 array("gonzo", "gonzo", "gonzo", "gonzo", 1 ),
 array("fantastique", "fantastique", "fantastiques", "fantastiques", 1 ),
 array("philosophique", "philosophique", "philosophiques", "philosophiques", 1 ),
 array("courtois", "courtoise", "courtois", "courtoises", 1 ),
 array("dadaïste", "dadaïste", "dadaïstes", "dadaïstes", 1 ),

 array("criminel", "criminelle", "criminels", "criminelles", 1 ),
 array("lovecraftien", "lovecraftienne", "lovecraftiens", "lovecraftiennes", 1 ),
 array("lacanien", "lacanienne", "lacaniens", "lacaniennes", 1 ),
 array("bourdieusien", "bourdieusienne", "bourdieusiens", "bourdieusiennes", 1 ),

 array("épistolaire", "épistolaire", "épistolaires", "épistolaires", 1 ),
 array("fragmentaire", "fragmentaire", "fragmentaires", "fragmentaires", 1 ),

 array("romantique", "romantique", "romantiques", "romantiques", 1 ),
 array("mythologique", "mythologique", "mythologiques", "mythologiques", 1 ),
 array("pastoral", "pastorale", "pastoraux", "pastorales", 1 ),
 array("parnassien", "parnassienne", "parnassiens", "parnassiennes", 1 ),
 array("picaresque", "picaresque", "picaresques", "picaresques", 1 ),
 array("mathématique", "mathématique", "mathématiques", "mathématiques", 1 ),
 array("médical", "médicale", "médicaux", "médicales", 1 ),
 array("naturaliste", "naturaliste", "naturalistes", "naturalistes", 1 ),
 array("surréaliste", "surréaliste", "surréalistes", "surréalistes", 1 ),
 array("lyrique", "lyrique", "lyriques", "lyriques", 1 ),

 array("industriel", "industrielle", "industriels", "industrielles", 1 ),
 array("psychanalytique", "psychanalytique", "psychanalytiques", "psychanalytiques", 1 ),
 array("chrétien", "chrétienne", "chrétiens", "chrétiennes", 1 ),
 array("bouddhiste", "bouddhiste", "bouddhistes", "bouddhistes", 1 ),
 array("gaulliste", "gaulliste", "gaullistes", "gaullistes", 1 ),
 array("ouvrier", "ouvrière", "ouvriers", "ouvrières", 1 ),

 array("anarchiste", "anarchiste", "anarchistes", "anarchistes", 1 ),
 array("décolonial", "décoloniale", "décoloniaux", "décoloniales", 1 ),
 array("érotique", "érotique", "érotiques", "érotiques", 1 ),
 array("féministe", "féministe", "féministes", "féministes", 1 ),
 array("marxiste", "marxiste", "marxistes", "marxistes", 1 ),
 array("politique", "politique", "politiques", "politiques", 1 ),
 array("royaliste", "royaliste", "royalistes", "royalistes", 1 ),
 array("sentimental", "sentimentale", "sentimentaux", "sentimentales", 1 ),
 array("pornographique", "pornographique", "pornographiques", "pornographiques", 1 ),
 array("paranormal", "paranormale", "paranormaux", "paranormales", 1 ),
 array("zen", "zen", "zen", "zen", 1 ),

 array("LGBT", "LGBT", "LGBT", "LGBT", 1 ),
 array("juif", "juive", "juifs", "juives", 1 ),
 array("provençal", "provençale", "provençaux", "provençales", 1 ),
 array("scandinave", "scandinave", "scandinaves", "scandinaves", 1 ),
 array("sud-américain", "sud-américaine", "sud-américains", "sud-américaines", 0 ),

 array("historique", "historique", "historiques", "historiques", 1 ),
 array("préhistorique", "préhistorique", "préhistoriques", "préhistoriques", 1 ),
 array("médiéval", "médiévale", "médiévaux", "médiévales", 1 ),
 array("expérimental", "expérimentale", "expérimentaux", "expérimentales", 1 ),
 array("procédural", "procédurale", "procéduraux", "procédurales", 1 ),

 array("révolutionnaire", "révolutionnaire", "révolutionnaires", "révolutionnaires", 1 ),
 array("ludique", "ludique", "ludiques", "ludiques", 1 ),
 array("humoristique", "humoristique", "humoristiques", "humoristiques", 1 ),
 array("illustré", "illustrée", "illustrés", "illustrées", 0 ),
 array("brut", "brute", "bruts", "brutes", 0 ),

 array("du terroir", "du terroir", "du terroir", "du terroir", 0 ),

 array("à clef", "à clef", "à clef", "à clef", 0 ),

 array("absurde", "absurde", "absurdes", "absurdes", 1 ),
 array("classique", "classique", "classiques", "classiques", 1 ),
 array("traditionnel", "traditionnelle", "traditionnels", "traditionnelles", 1 ),
 array("autoréférentiel", "autoréférentielle", "autoréférentiels", "autoréférentielles", 0 ),
 array("populaire", "populaire", "populaires", "populaires", 0 ),
 array("épique", "épique", "épiques", "épiques", 1 ),

 array("contemporain", "contemporaine", "contemporains", "contemporaines", 1 ),

 array("de boulevard", "de boulevard", "de boulevard", "de boulevard", 0 ),

 array("en vers", "en vers", "en vers", "en vers", 0 ),

 array("pour enfants", "pour enfants", "pour enfants", "pour enfants", 0 ),
 array("pour jeune adulte", "pour jeune adulte", "pour jeune adulte", "pour jeune adulte", 0 ),
 );

 $base = $this->getRandomArrayElement($bases);
 $suff1id = $this->getRandomArrayIndex($suffixes);
 $suff2id = $this->getRandomArrayIndexExclusions($suffixes, $suff1id);

 $texte = $base[0];
 $suff1 = $suffixes[min($suff1id, $suff2id)][$base[1]];
 $suff2 = $suffixes[max($suff1id, $suff2id)][$base[1]];
 
 if (mt_rand(0, 2) === 0)
 {
  if (mt_rand(0, 2) === 0)
   $texte = $this->getRandomArrayElement($prefixes_base)[$base[1]] . $texte;
  else if (mt_rand(0, 1) === 0)
  {
   if ($suffixes[min($suff1id, $suff2id)][4] != 0)
	$suff1 = $this->getRandomArrayElement($prefixes)[$base[1]] . $suff1;
  }
  else
  {
   if ($suffixes[max($suff1id, $suff2id)][4] != 0)
	$suff2 = $this->getRandomArrayElement($prefixes)[$base[1]] . $suff2;
  }
 }
  
 if (mb_substr($suff1, 0, 1) !== "-") $suff1 = " ".$suff1;
 if (mb_substr($suff2, 0, 1) !== "-") $suff2 = " ".$suff2;
 
 $texte .= $suff1;
 $texte .= $suff2;
  
  $lettre1 = mb_substr($texte, 0, 1);
  
  if (($base[1] < 2) &&
      (($lettre1 == "a") || ($lettre1 == "e") || ($lettre1 == "i") || ($lettre1 == "o") || ($lettre1 == "u")))
   $texte = "l'".$texte;
   else 
	   $texte = $articles[$base[1]]." ".$texte;


   if ($majuscule)
   $texte = mb_strtoupper(mb_substr($texte, 0, 1)) . mb_substr($texte, 1);

 return $texte;
}

private function getRandomArrayElement($arr) { return $arr[mt_rand(0, count($arr) - 1)]; }
private function getRandomArrayIndex($arr) { return mt_rand(0, count($arr) - 1); }
private function getRandomArrayIndexExclusions($arr, $exclu)
{
  $index = 0;
  do { $index = $this->getRandomArrayIndex($arr); } while ($index == $exclu);
  return $index;
}
}
