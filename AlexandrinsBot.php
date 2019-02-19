<?php

class Alexandrin
{
 public function compterSyllabes($vers, $cesure = false)
 {
  $vers = mb_strtolower($vers, "UTF-8");
  $vers = str_replace("à", "a", $vers);
  $vers = str_replace("à", "a", $vers);
  
  $decoupe = "";
  if (1 === preg_match('~[0-9]~', $vers)) return array(-1, "chiffres", $decoupe);

  $mots = explode(' ', $vers);
  $motsInfo = array();

  for ($i = 0; $i < count($mots); $i++)
  {
   $mot = mb_strtolower($mots[$i], 'UTF-8');
   $mot = preg_replace("/[^[:alnum:][:space:]]/u", '', $mot);

   if (mb_strlen($mot) <= 0) continue;
   array_push($motsInfo, $this->recupererInfoMot($mot));
  }

  $syllabes = 0;
  for ($i = 0; $i < count($motsInfo); $i++)
  {
   $extraSyll = 0;
   if ($i < count($motsInfo) - 1)
    $extraSyll = $this->calculerLiaison($motsInfo[$i], $motsInfo[$i + 1]);

   $syllabes += $motsInfo[$i]["syllabes"] + $extraSyll;
   $motsInfo[$i]["extrasyllabes"] = $extraSyll;
  }
  
  if ($cesure)
  {
   if (!$this->verifierCesures($motsInfo))
    return array(-1, "cesure", $decoupe);
  }
  
  return array($syllabes, ($syllabes <= 0) ? "erreur" : "", $decoupe);
 }

 private function verifierCesures($motsInfo)
 {
  $syllCount = 0;

  $hemistichePasse = false;

  for ($i = 0; $i < count($motsInfo); $i++)
  {
   $syllCount += $motsInfo[$i]["syllabes"] + $motsInfo[$i]["extrasyllabes"];

   switch ($syllCount)
   {
    case 3:
     if (($motsInfo[$i]["syllabes"] == 2) && ($motsInfo[$i]["extrasyllabes"] > 0))
       return false;
     break;
    case 6:
     $hemistichePasse = true;

     // pas de syllabes féminines non élidées avant la césure

     if ($motsInfo[$i]["extrasyllabes"] > 0)
       return false;
     if ($this->motInterditAvantHemistiche($motsInfo[$i]["mot"])) return false;
     break;
   }

   // Un mot "enjambe" l'hémistiche
   if (($syllCount > 6) && (!$hemistichePasse)) return false;
  }

  return true;
 }

 private function motInterditAvantHemistiche($mot)
 {
  // switch ($mot)
  // {
   // case "a": case "à": case "au":
   // case "ce": case "ces":
   // case "de": case "des": case "dans":
   // case "en": case "es":
   // case "je": case "jme": case "jte": case "jle":
   // case "le": case "les": case "la":
   // case "me": case "mes": case "mais": case "ms": case "ma": case "mon":
   // case "ne":
   // case "par":
   // case "se": case "ses": case "suis":
   // case "tu": case "te": case "tes": case "ta": case "ton":
   // case "que": case "qui":

   // return true;
  // }
  
  return false;
 }

 private function finitParUnEMuet($mot, $derniereCons, $variation)
 {
  if ($this->estUnVerbe3PPluriel($mot)) return true;

  if
  (
   (mb_substr($mot, mb_strlen($mot) - mb_strlen($variation), mb_strlen($variation), 'UTF-8') == $variation) &&
   (
    ($derniereCons == mb_strlen($mot) - (mb_strlen($variation) + 1)) ||
    (
     (mb_substr($mot, mb_strlen($mot) - (mb_strlen($variation) + 1), 1, 'UTF-8') == "u") &&
     (mb_substr($mot, mb_strlen($mot) - (mb_strlen($variation) + 2), 1, 'UTF-8') != "o")
    )
   )
  )
    return true;

  return false;
 }

 private function calculerLiaison($mot1, $mot2)
 {
   // le mot suivant commence par une voyelle, pas besoin de prononcer le e muet
    if ($this->getLetterType(mb_substr($mot2["mot"], 0, 1, 'UTF-8')) != 'c') return 0;

	if ($this->finitParUnEMuet($mot1["mot"], $mot1["derniereConsonne"], "e") || $this->finitParUnEMuet($mot1["mot"], $mot1["derniereConsonne"], "es"))
      {

switch ($mot1["mot"])
{
 case "je": case "le": case "te": case "me": case "se": case "que": case "de": case "ce":
   case "les": case "mes": case "tes": case "ses": case "des": case "ces":
   case "jme": case "jte": case "jle": case "ne":
 return 0;
}

  return 1;

      }

  return 0;
 }

 private function recupererInfoMot($mot)
 {
  $syll = 0;
  $motLen = mb_strlen($mot);

  $lastLetter = "";
  $lastLetterType = "";
  $derniereConsonne = -999;

  for ($i = 0; $i < $motLen; $i++)
  {
   $letter = mb_substr($mot, $i, 1, 'UTF-8');
   $letterType = $this->getLetterType($letter);

   if ($letterType == 'v')
   {
    //if ($lastLetterType != 'v')
    if (($lastLetterType != 'v') && ($lastLetter != 'y'))
     $syll++;
    else if (($letter == 'é') || ($letter == 'è') || ($letter == 'ë') ||
     ($letter == 'ä') || ($letter == 'ï') || ($letter == 'ü'))
     {
      if ($lastLetter != "u") // TODO: seulement pour é et è ?
      $syll++;
     }

     // Diérèses
    else if ($lastLetterType == 'v')
    {
      if (($lastLetter == 'i') && ($letter != 'i') && ($letter != 'e'))
       $syll++;
      else if ($letter == 'y')
       $syll++;
    }
   }
   else if (($letterType == 'c') && ($i != $motLen - 1))
    $derniereConsonne = $i;
  else if ($letterType == '')
  {
   //if ($lastLetter == 'y') $syllabes--;
  }

   if ($letterType != '')
    $lastLetterType = $letterType;

   $lastLetter = $letter;
  }

  if 
  (
   ((mb_substr($mot, $motLen - 1) == "e") &&
   ($derniereConsonne == $motLen - 2))
   ||
   ((mb_substr($mot, $motLen - 1) == "y") &&
   ($this->getLetterType(mb_substr($mot, $motLen - 2, 1)) == "v"))
   ||
   ((mb_substr($mot, $motLen - 2) == "es") &&
   ($derniereConsonne == $motLen - 3))
   ||
   (mb_substr($mot, $motLen - 3) == "ays") ||
   (mb_substr($mot, $motLen - 3) == "eys") ||
   (mb_substr($mot, $motLen - 3) == "gue") ||
   (mb_substr($mot, $motLen - 3) == "que") ||
   (mb_substr($mot, $motLen - 4) == "gues") ||
   (mb_substr($mot, $motLen - 4) == "ques")
  )
  $syll--;

  
  // Une syllabe de plus dans chaos, aorte...
  if (strpos($mot, 'ao') !== false) $syll++;
  
  if (mb_substr($mot, $motLen - 3) == "ier")
   $syll++;
  
  $syll += $this->compterSyllabesMotSpeciaux($mot);

  return array
  (
   "mot" => $mot,
   "syllabes" => $syll,
   "derniereConsonne" => $derniereConsonne
  );
 }

 private function estUnVerbe3PPluriel($mot)
 {
  switch ($mot)
  {
   case "abandonnent":
case "acceptent":
case "accompagnent":
case "achètent": case "achetent":
case "adorent":
case "aident":
case "aiment":
case "ajoutent":
case "amènent":
case "amusent":
case "annoncent":
case "aperçoivent": case "apercoivent":
case "apparaîssent": case "apparaissent":
case "appellent":
case "apportent":
case "apprennent":
case "approchent":
case "arrangent":
case "arrêtent": case "arretent":
case "assurent":
case "attaquent":
case "atteignent":
case "attendent":
case "avancent":
case "baissent":
case "battent":
case "boivent":
case "bougent":
case "brûlent": case "brulent":
case "cachent":
case "calment":
case "cassent":
case "cessent":
case "changent":
case "chantent":
case "chargent":
case "cherchent":
case "choisissent":
case "commencent":
case "comprennent":
case "comptent":
case "conduisent":
case "connaissent":
case "couchent":
case "coupent":
case "couvrent":
case "craignent":
case "dansent":
case "décident": case "decident":
case "découvrent": case "decouvrent":
case "dégagent": case "degagent":
case "demandent":
case "descendent":
case "détestent": case "detestent":
case "détruisent": case "detruisent":
case "devinent":
case "disparaissent":
case "donnent":
case "endorment":
case "écoutent":
case "écrivent":
case "éloignent": case "eloignent":
case "embrassent":
case "emmenent":
case "empêchent":
case "emportent":
case "enlevent":
case "entendent":
case "essayent":
case "évitent": case "evitent":
case "excusent":
case "expliquent":
case "ferment":
case "finissent":
case "foutent":
case "fourrent":
case "frappent":
case "gagnent":
case "gardent":
case "glissent":
case "habitent":
case "ignorent":
case "imaginent":
case "importent":
case "inquiètent": case "inquietent":
case "installent":
case "invitent":
case "jetent":
case "jurent":
case "lâchent": case "lachent":
case "laissent":
case "lancent":
case "levent":
case "lisent":
case "maintiennent":
case "mangent":
case "manquent":
case "mènent": case "menent":
case "mettent":
case "montent":
case "montrent":
case "obligent":
case "occupent":
case "offrent":
case "osent":
case "ouvrent":
case "payent":
case "pensent":
case "perdent":
case "permettent":
case "pleurent":
case "portent":
case "posent":
case "poussent":
case "préfèrent": case "prefèrent": case "préferent": case "preferent":
case "prennent":
case "préparent": case "preparent":
case "présentent": case "presentent":
case "préviennent": case "previennent":
case "promettent":
case "proposent":
case "protégent": case "protegent":
case "quittent":
case "racontent":
case "ramenent":
case "rappelent":
case "reçoivent": case "recoivent":
case "reconnaissent":
case "réfléchissent": case "refléchissent": case "réflechissent": case "reflechissent":
case "refusent":
case "regardent":
case "rejoignent":
case "remarquent":
case "remettent":
case "remontent":
case "rencontrent":
case "rendent":
case "rentrent":
case "reposent":
case "reprennent":
case "retiennent":
case "retirent":
case "retournent":
case "repoussent":
case "retrouvent":
case "réveillent": case "reveillent":
case "rêvent": case "revent":
case "roulent":
case "sautent":
case "sauvent":
case "sentent":
case "séparent": case "separent":
case "serrent":
case "servent":
case "sortent":
case "suivent":
case "taisent":
case "tendent":
case "tiennent":
case "tentent":
case "terminent":
case "tirent":
case "tombent":
case "touchent":
case "tournent":
case "traînent":
case "traitent":
case "travaillent":
case "traversent":
case "trompent":
case "trouvent":
case "utilisent":
case "vendent":
case "volent":
case "veulent":
return true;
  }

return false;
 }

 private function compterSyllabesMotSpeciaux($mot)
 {
  switch (mb_strtolower($mot))
  {
   // "hier" a deux syllabes mais une seule est détectée par le parsing
   case "hier": case "maestro":
   case "gruau": case "cruauté":
   
   case "g": case "c": case "v": // "j'ai", "c'est", "vais"
   case "tt":
   case "y":
   case "je": case "le": case "te": case "me": case "se": case "ce": case "de":
   case "les": case "mes": case "tes": case "ses": case "des":  case "ces":
   case "jme": case "jte": case "jle": case "que": case "ne":
   return 1;
   
   case "cv":
   case "jss":
   case "tkt":
   case "ct":
   case "cmt":
   case "ptn":
   case "psk":
   case "ksos":
   case "qqn":
   case "pp":
   case "srx":
   case "pq":
   case "ko":
   case "rt":
   return 2;

   case "mdr": case "mddr": case "mdddr":
   case "mdrr": case "mdrrr": case "mdrrrr":
   case "mddrr": case "mddrrr": case "mddrrrr":
   case "mdddrr": case "mdddrrr": case "mdddrrrr":
   case "dsl":
   case "rsa": case "rer": case "ter":
   case "omg":
   case "rmi":
   case "ajrd": case "auj": case "ajd":
   case "afk": case "brb": case "php":
   return 3;

   case "ptdr":
   case "sncf":
   case "ratp":
   case "gign":
   return 4;

   case "xptdr":
   return 5;
  }
  
  if (mb_strlen($mot) < 2) return 0;
  if ($this->estUnVerbe3PPluriel($mot)) return -1;

  $contientUneConsonne = false;
  $contientUneVoyelle = false;
   
  for ($i = 0; $i < mb_strlen($mot); $i++)
  {
   if ($this->getLetterType(mb_strtolower(mb_substr($mot, $i, 1, 'UTF-8'), 'UTF-8')) == "v")
    $contientUneVoyelle = true;

   if ($this->getLetterType(mb_strtolower(mb_substr($mot, $i, 1, 'UTF-8'), 'UTF-8')) == "c")
    $contientUneConsonne = true;
  }
   
  // Invalider le tweet, on ne sait pas parser ce mot uniquement fait de consonnes
  if ($contientUneConsonne && !$contientUneVoyelle) return -999999;

  return 0;
 }

 private function getLetterType($lettre)
 {
  //if ($lettre == mb_strtoupper($lettre, 'UTF-8')) return ""; // pas une lettre
  // if (!ctype_alpha($lettre)) return ""; // pas une lettre

  switch ($lettre)
  {
   case "a": case "à": case "â": case "ä":
   case "e": case "é": case "è": case "ê": case "ë":
   case "i": case "î": case "ï":
   case "o": case "ô": case "ö": case "œ":
   case "u": case "ù": case "ü": case "û":
   case "y":

   return "v";
   
   case "b": case "c": case "d":  case "f":  case "g":  case "h":  case "j":
   case "k":  case "l":  case "m":  case "n":  case "p":  case "q":  case "r": 
   case "s":  case "t":  case "v":  case "w":  case "x":  case "z": case "ç":

   return "c";
   }

  return "";
 }
}

?>
