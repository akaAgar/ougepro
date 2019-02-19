<?php

function genererVociferation()
{
  $text = "";
  $longueurParagraphe = 12;
  
  for ($p = 0; $p < 3; $p++)
  {
	  $text .= "<p>";
	  
  for ($i = 0; $i < $longueurParagraphe; $i++)
  {
    $morceau = genererSection($i == $longueurParagraphe - 1);
	
	if (strlen($morceau) < 24) 
	{
		if (mt_rand(0, 4) == 0)
		{
		  $text .= $morceau . " ";
		  if (mt_rand(0, 4) == 0) $text .= $morceau . " ";
		}
		if (mt_rand(0, 4) == 0) $morceau = mb_strtoupper($morceau);
	}
	
    $text .= $morceau . " ";
  }
	  $text .= "</p>";
  }
  $final = "";
  $majuscule = true;
  for ($i = 0; $i < strlen($text); $i++)
  {
    if (($majuscule) && (estUneLettre($text[$i])))
	{
      $final .= mb_strtoupper($text[$i]);
      $majuscule = false;
	}
	else $final .= $text[$i];
	
	if (($text[$i] == ".") || ($text[$i] == "!") || ($text[$i] == "?") || ($text[$i] == ">"))
		$majuscule = true;
  }
  
  $final = str_replace("  ", " ", $final);
  $final = str_replace("! !", "!!", $final);
  $final = str_replace(" !", "&nbsp;!", $final);
  $final = str_replace(" .", ".", $final);
  $final = str_replace(" ,", ",", $final);
  $final = str_replace("èrez", "érez", $final);
  $final = finaliserTexte($final);
  
  return $final;
}
function genererSection($derniere)
{
  $structures = array
  (
   "%vocatif% !",
   "%vocatif% !",
   "%onomatopees% !",
   "%verbeImperatif% %groupeNominalDet% !",
   "%verbeNonTrans%",
   "%verbeNonTrans% %contexte%",
   "%verbeTrans% %groupeNominalDet%",
   "%verbeNonTrans% %jonctionVerbeVerbe% %verbeNonTrans2%",
   "%verbeTrans% %groupeNominalDet% %jonctionVerbeVerbe% %verbeTrans2% %groupeNominalDet2%",
  );
  $fins = array( ",", ".", "…", "!", "!!", "!!!", ",", ".", "…", "!", "!!", "!!!", " et…", " et soudain, " );
  
  $jonctionVerbeVerbe = array
  (
	"comme",
	"quand",
	"lorsque",
	"puisque",
	"car",
	"autant que",
	"depuis que",
	"tandis que",
  );
  
  $text = getRandomArrayElement($structures);
  $text = str_replace("%vocatif%", genererVocatif(), $text);
  $text = str_replace("%onomatopees%", genererOnomatopees(), $text);
  $text = str_replace("%pronomVerbeNonTrans%", genererVerbe("p", false, true), $text);
  $text = str_replace("%pronomVerbeTrans%", genererVerbe("p", true, true), $text);
  $text = str_replace("%sujetVerbeNonTrans%", genererVerbe("n", false, true), $text);
  $text = str_replace("%sujetVerbeTrans%", genererVerbe("n", true, true), $text);
  $text = str_replace("%verbeNonTrans%", genererVerbe("", false, true), $text);
  $text = str_replace("%verbeNonTrans2%", genererVerbe("", false, true), $text);
  $text = str_replace("%verbeTrans%", genererVerbe("", true, true), $text);
  $text = str_replace("%verbeTrans2%", genererVerbe("", true, true), $text);
  $text = str_replace("%verbeImperatif%", genererVerbe("i", true, true), $text);
  $text = str_replace("%jonctionVerbeVerbe%", getRandomArrayElement($jonctionVerbeVerbe), $text);
  
  $text = str_replace("%contexte%", genererContexte(), $text);
  $text = str_replace("%groupeNominalDet%", genererGroupeNominal(true)[0], $text);
  $text = str_replace("%groupeNominalDet2%", genererGroupeNominal(true)[0], $text);
  if (substr($text, -1) == '!') { }
  else if ($derniere) $text .= " !";
  else $text .= getRandomArrayElement($fins);
  
  return $text;
}
function genererContexte()
{
  $jonctions = array
  (
	"à l'arrière de",
	"à l'ombre de",
	"aux environs de",
    "autant que",
	"comme",
	"contre",
	"dans",
	"derrière",
	"devant",
	"en attendant",
    "moins que",
	"près de",
	"sous",
  );
  
  $contexte = getRandomArrayElement($jonctions);
  $contexte .= " " . genererGroupeNominal(true)[0];
  
  return $contexte;
}
function genererVerbe($sujet, $transitif, $autoriserAdverbes)
{
  $verbesT = array
  (
   "abhorr",
   "absorb",
   "bais",
   "chant",
   "châti",
   "chi",
   "conchi",
   "consomm",
   "dénou",
   "déprav",
   "désir",
   "dévor",
   "écout",
   "empest",
   "envi",
   "fécond",
   "ferm",
   "fess",
   "gratt",
   "idolâtr",
   "implor",
   "infect",
   "ingurgit",
   "jug",
   "labour",
   "libèr",
   "liquéfi",
   "lèch",
   "mâch",
   "mang",
   "mémoris",
   "observ",
   "ouvr",
   "partag",
   "pomp",
   "pri",
   "quémand",
   "ravag",
   "regurgit",
   "reflu",
   "répudi",
   "reni",
   "sabot",
   "savour",
   "suppli",
   "tortur",
  );
  
  $verbesI = array
  (
   "agonis",
   "blasphèm",
   "bouillonn",
   "chant",
   "chi",
   "chuchot",
   "cicatris",
   "coass",
   "couin",
   "coul",
   "cri",
   "désir",
   "dévor",
   "éclat",
   "empest",
   "exist",
   "gratt",
   "hurl",
   "macèr",
   "mendi",
   "mâch",
   "observ",
   "oscill",
   "parl",
   "piss",
   "pleur",
   "pri",
   "prolifèr",
   "pu",
   "quémand",
   "rican",
   "rumin",
   "suint",
   "suppli",
   "tomb",
   "vibr",
   "écout",
   
   "m'accabl",
   "m'épuis",
   "s'acharn",
   "s'écroul",
   "se putréfi",
   "s'agenouill",
   "se mutil",
  );
  
  $adverbes = array
  (
   "admirablement",
   "avec ardeur",
   "avec vigueur",
   "derechef",
   "gravement",
   "lentement",
   "lourdement",
   "perpétuellement",
   "pour l'éternité",
   "quelquefois",
   "salement",
   "sans arrêt",
   "terriblement",
   "approximativement",
   "tendrement",
  );
  
  $pronoms = array
  (
    array( "je", "e" ),
    array( "je", "e" ),
    array( "vous", "ez" ),
    //array( "cela", "e" ),
  );
  
  $verbe = "";
  
  if ($transitif) $verbe = getRandomArrayElement($verbesT);
  else $verbe = getRandomArrayElement($verbesI);
  if ($sujet === "")
  {
	  if (mt_rand(0, 2) == 0) $sujet = "p";
	  else $sujet = "n";
  }
  if ($sujet === "p") // Pronom
  {
	$pronom = getRandomArrayElement($pronoms);
    $verbe = $pronom[0] . " " . $verbe . $pronom[1];	  
  }
  else if ($sujet === "n") // Groupe nominal
  {
	$sujet = genererGroupeNominal(true);
	$terminaisons = array("e", "e", "ent", "ent");
    $verbe = $sujet[0]." ".$verbe.$terminaisons[$sujet[1]];
  }
  else if ($sujet === "i") // Impératif, pas de sujet
    $verbe .= "ez";
  
  if ($autoriserAdverbes)
  {
	if (mt_rand(0, 4) == 0)
		$verbe .= " " . getRandomArrayElement($adverbes);
  }
  
  return $verbe;
}
function genererVocatif()
{
  $syllabesEntite = array
  (
   "aac",
"ad",
"an",
"as",
"bu",
"ceau",
"ci",
"cla",
"cthu",
"drea",
"eac",
"el",
"em",
"esh",
"eur",
"flu",
"ga",
"ge",
"gu",
"ig",
"ik",
"irk",
"ji",
"jo",
"ki",
"krio",
"lio",
"lle",
"lu",
"me",
"mi",
"na",
"nar",
"nya",
"oac",
"od",
"og",
"ok",
"ork",
"ow",
"pe",
"phoi",
"ple",
"quea",
"re",
"ri",
"sha",
"shub",
"sli",
"thao",
"thep",
"thor",
"ty",
"uf",
"ug",
"uh",
"unk",
"up",
"ve",
"ven",
"vu",
"wa",
"waa",
"wi",
"wu",
"zi"
  );
  
  $titres = array
  (
   array ( "adorateur", "adoratrice", "adorateurs", "adoratrices" ),
   array ( "baron", "baronne", "barons", "baronnes" ),
   array ( "celui", "celle", "ceux", "celles" ),
   array ( "créateur", "créatrice", "créateurs", "créatrices" ),
   array ( "fléau", "fléau", "fléaux", "fléaux" ),
   array ( "gardien", "gardienne", "gardiens", "gardiennes" ),
   array ( "maître", "maîtresse", "maîtres", "maîtresses" ),
   array ( "origine", "origine", "origines", "origines" ),
   array ( "plaie", "plaie", "plaies", "plaies" ),
   array ( "roi", "reine", "rois", "reines" ),
   array ( "seigneur", "dame", "seigneur", "dames" ),
   array ( "serviteur", "servante", "serviteurs", "servantes" ),
   array ( "source", "source", "sources", "sources" ),
   array ( "souverain", "souveraine", "souverains", "souveraines" ),
  );
  
  $titresVerbaux = array
  (
   array ( "celui-qui-", "celle-qui-", "ceux-qui-", "cellent-qui-", "e", "e", "ent", "ent" ),
   array ( "toi qui ", "vous qui ", "vous qui ", "vous qui ", "es", "es", "ez", "ez" ),
   array ( "qui me ", "qui me ", "qui me ", "qui me ", "e", "e", "ent", "ent" ),
   array ( "puisses-tu ", "puisses-tu ", "puissiez-vous ", "puissiez-vous ", "er", "er", "er", "er" ),
   array ( "ne cesse pas de ", "ne cesse pas de ", "ne cessez pas de ", "ne cessez pas de ", "er", "er", "er", "er" ),
   array ( "devant qui je ", "devant qui je ", "devant qui je ", "devant qui je ", "e", "e", "e", "e" ),
   array ( "apprends-moi à ", "apprends-moi à ", "apprenez-moi à ", "apprenez-moi à ", "er", "er", "er", "er" ),
  );
  
  $titreJonction = array
  (
    array( "de le" , "de la" , "des" , "des"),
    array( "de mon" , "de ma" , "de mes" , "de mes"),
  );
  
  $voc = "";
  $femplur = 0;
  
  if (mt_rand(0, 4) == 0)
  {
    $longueurNomEntite = mt_rand(2, 4);
	
	for ($i = 0; $i < $longueurNomEntite; $i++)
  	  $voc .= getRandomArrayElement($syllabesEntite);
    $voc = mb_strtoupper(substr($voc, 0, 1)) . substr($voc, 1);
  }
  else
  {
    $gn = genererGroupeNominal(false);
	$voc = $gn[0];  
	$femplur = $gn[1];  
  }
  
  if (mt_rand(0, 3) == 0) // Ajouter un titre à l'entité
  {
    if (mt_rand(0, 1) == 0) // "celui-qui-..."
	{
	  $titreVerbe = getRandomArrayElement($titresVerbaux);
	  
	  $voc .= ", " . $titreVerbe[$femplur];
	  $voc .= genererVerbe("0", false, false) . $titreVerbe[$femplur + 4];
	}
	else
	{
      $voc .= ", " . getRandomArrayElement($titres)[$femplur];
	  $titreObjet = genererGroupeNominal(false);
	  $voc .= " " . $titreJonction[0][$titreObjet[1]] . " " . $titreObjet[0];
	
	  if (mt_rand(0, 3) == 0)
      {
	    $titreObjet2 = genererGroupeNominal(false);
  	    $voc .= " " . getRandomArrayElement($titreJonction)[$titreObjet2[1]] . " " . $titreObjet2[0];
      }
	}
  }
  
  return $voc;
}
function genererMorceau()
{
	
}
function genererGroupeNominal($article)
{
  $articles = array
  (
    array( "le", "la", "les", "les" ),
    array( "mon", "ma", "mes", "mes" ),
  );
  
  // "$" = s au pluriel (50% de chance de pluriel)
  // "+" = toujours au pluriel
  // "*" = féminin
  // Ni l'un ni l'autre = jamais de pluriel
  $substantifs = array
  (
   "abandon$",
   "abattoir$",
   "abîme$",
   "abdomen",
   "appendice$",
   "affliction$*",
   "âme$*",
   "armée$*",
   "angoisse$*",
   "anus",
   "artère$*",
   "astre$",
   "automatismes+",
   "autiste$",
   "autorité$*",
   "avalanche$*",
   "aveugle$",
   "bile*",
   "blasphème$",
   "blessure$*",
   "bouche*",
   "boyaux+",
   "bête$*",
   "caca$",
   "cadavre$",
   "cancer$",
   "cavité$*",
   "concavité$*",
   "certitude$*",
   "cerveau",
   "chaîne$*",
   "chair$*",
   "chancre$",
   "châtiment$",
   "chibre",
   "chien$",
   "chose$*",
   "cicatrice$*",
   "coeur$",
   "conspirateur$",
   "corps",
   "cosmos",
   "couilles+*",
   "crevasse$*",
   "crachat$",
   "crasse*",
   "crâne",
   "crapaud$",
   "cri$",
   "croûte$*",
   "cul",
   "déchet$",
   "déchéance$*",
   "déjection$*",
   "dentition*",
   "désir$",
   "destin",
   "diable$",
   "Dieu",
   "douleur$*",
   "embryon$",
   "émotion$*",
   "enfant$",
   "entrailles+*",
   "erreur$*",
   "esclave$",
   "esprit$",
   "être",
   "faim*",
   "femme$*",
   "flux",
   "fluide$",
   "foetus",
   "fou$",
   "folie*",
   "foutre",
   "frère$",
   "frontière$*",
   "frustration$*",
   "furoncle$",
   "fèces+*",
   "gardien$",
   "gloire*",
   "gendarme$",
   "gourgandines+*",
   "graisse*",
   "grille$*",
   "grimoire$",
   "hallucination$*",
   "haine$*",
   "horizon$",
   "hymne$",
   "hésitation$*",
   "idéaux+",
   "illusion$*",
   "innocence$*",
   "ivresse$*",
   "joie$*",
   "jugement$",
   "langage",
   "langue*",
   "larmes+*",
   "latrines+*",
   "lèvres+*",
   "limbes+",
   "limitation$*",
   "loup$",
   "lune*",
   "mâchoire*",
   "matière*",
   "médicament$",
   "métastases+*",
   "menstrues+*",
   "merde$*",
   "misère*",
   "moisissure$*",
   "montagne$*",
   "mort*",
   "mot$",
   "mécanisme$",
   "médecin$",
   "mélodie$*",
   "mère*",
   "muscle$",
   "naissance*",
   "nation$*",
   "nécrose$*",
   "névrose$*",
   "nuit$*",
   "obsession$*",
   "océan",
   "odeur$*",
   "orage$",
   "organe$",
   "ovipositeur$",
   "outil$",
   "parties+*",
   "pensée$*",
   "pets+",
   "péché$",
   "pharmacien$",
   "pieuvre$*",
   "pipi",
   "pisse*",
   "plaie*",
   "planète$*",
   "pleurs+",
   "poils+",
   "policiers+",
   "porte$*",
   "poème$",
   "pouvoir",
   "prison$*",
   "psychose$*",
   "père",
   "péché$",
   "puanteur$*",
   "punition$*",
   "pus",
   "réalité*",
   "restes+",
   "rêve$",
   "rime$*",
   "rire$",
   "sacrifice$",
   "saleté$*",
   "scrotum",
   "sensation$*",
   "sexe$",
   "silence$",
   "squelette",
   "souvenir$",
   "soldat$",
   "syntaxe*",
   "tourment$",
   "traumatisme$",
   "tumeur$*",
   "vaincu$",
   "verdict$",
   "vérité$*",
   "victime$*",
   "visage",
   "voix*",
   "vulve*",
   "yeux+",
  );

  // "*" = e/s/es pour féminin et pluriel
  // "?" = s au pluriel
  // "%" = al/aux/ale/ales (animal)
  // "/" = x/se/x/ses (poisseux)
  // "^" = r/se/rs/ses (menteur)
  // ";" = le/s/les pour féminin et pluriel (éternel)
  $adjectifs = array
  (
   "abominable?",
   "absent*",
   "affamé*",
   "ardent*",
   "anim%",
   "avide?",
   "baveu/",
   "besti%",
   "blafard*",
   "blasphématoire?",
   "bouffi*",
   "bouillonnant*",
   "boursouflé*",
   "brûlant*",
   "centenaire?",
   "considérable?",
   "constipé*",
   "coriace?",
   "cosmique?",
   "crasseu/",
   "cynique?",
   "cyanosé*",
   "damné*",
   "dégueulasse?",
   "dément*",
   "démesuré*",
   "difforme?",
   "divin*",
   "électrique?",
   "engorgé*",
   "engourdi*",
   "erratique?",
   "éternel;",
   "fasciste?",
   "fétide?",
   "fiévreu/",
   "foireu/",
   "fragile?",
   "futur*",
   "funeste?",
   "géant*",
   "gigantesque?",
   "glacial*",
   "gourmand*",
   "gonflé*",
   "hérétique?",
   "hilare?",
   "trop humain*",
   "immortel;",
   "impie?",
   "impuissant*",
   "incapable?",
   "inerte?",
   "infatigable?",
   "infantile?",
   "infini*",
   "injustifiable?",
   "intime?",
   "intérieur*",
   "interminable?",
   "inutile?",
   "inouï*",
   "invisible?",
   "ironique?",
   "livide?",
   "liquide?",
   "lubrique?",
   "malade?",
   "médic%",
   "menteu^",
   "merdeu/",
   "moelleu/",
   "moisi*",
   "moite?",
   "momifié*",
   "mort-né*",
   "nain*",
   "nocturne?",
   "orgasmique?",
   "oublié*",
   "passé*",
   "profond*",
   "poilu*",
   "poisseu/",
   "pourrissant*",
   "puant*",
   "pulsatil*",
   "raté*",
   "révoltant*",
   "robuste?",
   "rouge?",
   "sale?",
   "salé*",
   "sanglant*",
   "scabreu/",
   "scandaleu/",
   "scarifié*",
   "statique?",
   "stérile?",
   "souple?",
   "touffu*",
   "tordu*",
   "totalitaire?",
   "vaniteu/",
   "vermeil;",
   "vermoulu*",
   "vide?",
   "viril*",
   "vorace?",
  );
  $femplur = 0;
  
  $gn = getRandomArrayElement($substantifs);
  if (strpos($gn, '*') !== false) $femplur++; // le mot est féminin
  if (strpos($gn, '+') !== false) $femplur += 2; // le mot est toujours au pluriel
  else if (strpos($gn, '$') !== false) { if (mt_rand(0, 1) == 0) $femplur += 2; } // le mot est au pluriel une fois sur deux
  $gn = str_replace("*", "", $gn);  
  $gn = str_replace("+", "", $gn);
  if ($femplur >= 2) $gn = str_replace("$", "s", $gn);
  else $gn = str_replace("$", "", $gn);
  if ($article) $gn = getRandomArrayElement($articles)[$femplur] . " " . $gn;
  
  if (mt_rand(0, 2) == 0)
  {
	  $adj = getRandomArrayElement($adjectifs);
	  
	  $term_es = array("","e","s","es");
	  $term_s = array("","","s","s");
	  $term_aux = array("al","ale","aux","ales");
	  $term_xses = array("x","se","x","ses");
	  $term_rses = array("r","se","rs","ses");
	  $term_le = array("","le","s","les");
	  
	  $adj = str_replace("*", $term_es[$femplur], $adj);
	  $adj = str_replace("?", $term_s[$femplur], $adj);
	  $adj = str_replace("%", $term_aux[$femplur], $adj);
	  $adj = str_replace("/", $term_xses[$femplur], $adj);
	  $adj = str_replace("^", $term_rses[$femplur], $adj);
	  $adj = str_replace(";", $term_le[$femplur], $adj);
	  
	  $gn .= " " . $adj;
  }
  return array( $gn, $femplur );
}
function genererOnomatopees()
{
  $onomatopees = array
  (
  "ah-ah",
  "Dieu",
  "Dieu",
  "dieux",
  "maître",
  "seigneur",
  "rhaaaa",
  "ra-ta-ta-ta",
  "fini",
  "beurk",
  "gnagnagna",
  "grrrr",
  "néant",
  "vie",
  "mort",
  "souffrance",
  "maman",
  "papa",
  "gruik",
  "la la la",
  "hop",
  "hé hé",
  "chut",
  "silence",
  "tssss",
  );
  
  $total = 5 - floor(sqrt(mt_rand(1, 24)));
  $ono = "";  
  for ($i = 0; $i < $total; $i++)
  {
    $ono .= getRandomArrayElement($onomatopees) . " ! ";
  }
  
  return $ono;
}
function finaliserTexte($text)
{
  $text = str_replace("  ", " ", $text);
  $text = str_replace_AllCaps("je a", "j'a", $text);
  $text = str_replace_AllCaps("je à", "j'à", $text);
  $text = str_replace_AllCaps("je â", "j'â", $text);
  $text = str_replace_AllCaps("je e", "j'e", $text);
  $text = str_replace_AllCaps("je é", "j'é", $text);
  $text = str_replace_AllCaps("je è", "j'è", $text);
  $text = str_replace_AllCaps("je ë", "j'ë", $text);
  $text = str_replace_AllCaps("je ê", "j'ê", $text);
  $text = str_replace_AllCaps("je i", "j'i", $text);
  $text = str_replace_AllCaps("je ï", "j'ï", $text);
  $text = str_replace_AllCaps("je î", "j'î", $text);
  $text = str_replace_AllCaps("je o", "j'o", $text);
  $text = str_replace_AllCaps("je ô", "j'ô", $text);
  $text = str_replace_AllCaps("je u", "j'u", $text);
  $text = str_replace_AllCaps("je ù", "j'ù", $text);
  $text = str_replace_AllCaps("je ü", "j'ü", $text);
  $text = str_replace_AllCaps("je û", "j'û", $text);
  $text = str_replace_AllCaps("je y", "j'y", $text);
  
  $text = str_replace_AllCaps(" le a", " l'a", $text);
  $text = str_replace_AllCaps(" le à", " l'à", $text);
  $text = str_replace_AllCaps(" le â", " l'â", $text);
  $text = str_replace_AllCaps(" le e", " l'e", $text);
  $text = str_replace_AllCaps(" le é", " l'é", $text);
  $text = str_replace_AllCaps(" le è", " l'è", $text);
  $text = str_replace_AllCaps(" le ë", " l'ë", $text);
  $text = str_replace_AllCaps(" le ê", " l'ê", $text);
  $text = str_replace_AllCaps(" le i", " l'i", $text);
  $text = str_replace_AllCaps(" le ï", " l'ï", $text);
  $text = str_replace_AllCaps(" le î", " l'î", $text);
  $text = str_replace_AllCaps(" le o", " l'o", $text);
  $text = str_replace_AllCaps(" le ô", " l'ô", $text);
  $text = str_replace_AllCaps(" le u", " l'u", $text);
  $text = str_replace_AllCaps(" le ù", " l'ù", $text);
  $text = str_replace_AllCaps(" le ü", " l'ü", $text);
  $text = str_replace_AllCaps(" le û", " l'û", $text);
  $text = str_replace_AllCaps(" le y", " l'y", $text);
  $text = str_replace_AllCaps(" le h", " l'h", $text);
  
  $text = str_replace_AllCaps(" la a", " l'a", $text);
  $text = str_replace_AllCaps(" la à", " l'à", $text);
  $text = str_replace_AllCaps(" la â", " l'â", $text);
  $text = str_replace_AllCaps(" la e", " l'e", $text);
  $text = str_replace_AllCaps(" la é", " l'é", $text);
  $text = str_replace_AllCaps(" la è", " l'è", $text);
  $text = str_replace_AllCaps(" la ë", " l'ë", $text);
  $text = str_replace_AllCaps(" la ê", " l'ê", $text);
  $text = str_replace_AllCaps(" la i", " l'i", $text);
  $text = str_replace_AllCaps(" la ï", " l'ï", $text);
  $text = str_replace_AllCaps(" la î", " l'î", $text);
  $text = str_replace_AllCaps(" la o", " l'o", $text);
  $text = str_replace_AllCaps(" la ô", " l'ô", $text);
  $text = str_replace_AllCaps(" la u", " l'u", $text);
  $text = str_replace_AllCaps(" la ù", " l'ù", $text);
  $text = str_replace_AllCaps(" la ü", " l'ü", $text);
  $text = str_replace_AllCaps(" la û", " l'û", $text);
  $text = str_replace_AllCaps(" la y", " l'y", $text);
  
  $text = str_replace_AllCaps(" ma a", " mon a", $text);
  $text = str_replace_AllCaps(" ma à", " mon à", $text);
  $text = str_replace_AllCaps(" ma â", " mon â", $text);
  $text = str_replace_AllCaps(" ma e", " mon e", $text);
  $text = str_replace_AllCaps(" ma é", " mon é", $text);
  $text = str_replace_AllCaps(" ma è", " mon è", $text);
  $text = str_replace_AllCaps(" ma ë", " mon ë", $text);
  $text = str_replace_AllCaps(" ma ê", " mon ê", $text);
  $text = str_replace_AllCaps(" ma i", " mon i", $text);
  $text = str_replace_AllCaps(" ma ï", " mon ï", $text);
  $text = str_replace_AllCaps(" ma î", " mon î", $text);
  $text = str_replace_AllCaps(" ma o", " mon o", $text);
  $text = str_replace_AllCaps(" ma ô", " mon ô", $text);
  $text = str_replace_AllCaps(" ma u", " mon u", $text);
  $text = str_replace_AllCaps(" ma ù", " mon ù", $text);
  $text = str_replace_AllCaps(" ma ü", " mon ü", $text);
  $text = str_replace_AllCaps(" ma û", " mon û", $text);
  $text = str_replace_AllCaps(" ma y", " mon y", $text);
  
  $text = str_replace_AllCaps("Je a", "J'a", $text);
  $text = str_replace_AllCaps("Je à", "J'à", $text);
  $text = str_replace_AllCaps("Je â", "J'â", $text);
  $text = str_replace_AllCaps("Je e", "J'e", $text);
  $text = str_replace_AllCaps("Je é", "J'é", $text);
  $text = str_replace_AllCaps("Je è", "J'è", $text);
  $text = str_replace_AllCaps("Je ë", "J'ë", $text);
  $text = str_replace_AllCaps("Je ê", "J'ê", $text);
  $text = str_replace_AllCaps("Je i", "J'i", $text);
  $text = str_replace_AllCaps("Je ï", "J'ï", $text);
  $text = str_replace_AllCaps("Je î", "J'î", $text);
  $text = str_replace_AllCaps("Je o", "J'o", $text);
  $text = str_replace_AllCaps("Je ô", "J'ô", $text);
  $text = str_replace_AllCaps("Je u", "J'u", $text);
  $text = str_replace_AllCaps("Je ù", "J'ù", $text);
  $text = str_replace_AllCaps("Je ü", "J'ü", $text);
  $text = str_replace_AllCaps("Je û", "J'û", $text);
  $text = str_replace_AllCaps("Je y", "J'y", $text);
  
  $text = str_replace_AllCaps("Le a", "L'a", $text);
  $text = str_replace_AllCaps("Le à", "L'à", $text);
  $text = str_replace_AllCaps("Le â", "L'â", $text);
  $text = str_replace_AllCaps("Le e", "L'e", $text);
  $text = str_replace_AllCaps("Le é", "L'é", $text);
  $text = str_replace_AllCaps("Le è", "L'è", $text);
  $text = str_replace_AllCaps("Le ë", "L'ë", $text);
  $text = str_replace_AllCaps("Le ê", "L'ê", $text);
  $text = str_replace_AllCaps("Le i", "L'i", $text);
  $text = str_replace_AllCaps("Le ï", "L'ï", $text);
  $text = str_replace_AllCaps("Le î", "L'î", $text);
  $text = str_replace_AllCaps("Le o", "L'o", $text);
  $text = str_replace_AllCaps("Le ô", "L'ô", $text);
  $text = str_replace_AllCaps("Le u", "L'u", $text);
  $text = str_replace_AllCaps("Le ù", "L'ù", $text);
  $text = str_replace_AllCaps("Le ü", "L'ü", $text);
  $text = str_replace_AllCaps("Le û", "L'û", $text);
  $text = str_replace_AllCaps("Le y", "L'y", $text);
  $text = str_replace_AllCaps("Le h", "L'h", $text);
  
  $text = str_replace_AllCaps("La a", "L'a", $text);
  $text = str_replace_AllCaps("La à", "L'à", $text);
  $text = str_replace_AllCaps("La â", "L'â", $text);
  $text = str_replace_AllCaps("La e", "L'e", $text);
  $text = str_replace_AllCaps("La é", "L'é", $text);
  $text = str_replace_AllCaps("La è", "L'è", $text);
  $text = str_replace_AllCaps("La ë", "L'ë", $text);
  $text = str_replace_AllCaps("La ê", "L'ê", $text);
  $text = str_replace_AllCaps("La i", "L'i", $text);
  $text = str_replace_AllCaps("La ï", "L'ï", $text);
  $text = str_replace_AllCaps("La î", "L'î", $text);
  $text = str_replace_AllCaps("La o", "L'o", $text);
  $text = str_replace_AllCaps("La ô", "L'ô", $text);
  $text = str_replace_AllCaps("La u", "L'u", $text);
  $text = str_replace_AllCaps("La ù", "L'ù", $text);
  $text = str_replace_AllCaps("La ü", "L'ü", $text);
  $text = str_replace_AllCaps("La û", "L'û", $text);
  $text = str_replace_AllCaps("La y", "L'y", $text);
  
  $text = str_replace_AllCaps("Ma a", "Mon a", $text);
  $text = str_replace_AllCaps("Ma à", "Mon à", $text);
  $text = str_replace_AllCaps("Ma â", "Mon â", $text);
  $text = str_replace_AllCaps("Ma e", "Mon e", $text);
  $text = str_replace_AllCaps("Ma é", "Mon é", $text);
  $text = str_replace_AllCaps("Ma è", "Mon è", $text);
  $text = str_replace_AllCaps("Ma ë", "Mon ë", $text);
  $text = str_replace_AllCaps("Ma ê", "Mon ê", $text);
  $text = str_replace_AllCaps("Ma i", "Mon i", $text);
  $text = str_replace_AllCaps("Ma ï", "Mon ï", $text);
  $text = str_replace_AllCaps("Ma î", "Mon î", $text);
  $text = str_replace_AllCaps("Ma o", "Mon o", $text);
  $text = str_replace_AllCaps("Ma ô", "Mon ô", $text);
  $text = str_replace_AllCaps("Ma u", "Mon u", $text);
  $text = str_replace_AllCaps("Ma ù", "Mon ù", $text);
  $text = str_replace_AllCaps("Ma ü", "Mon ü", $text);
  $text = str_replace_AllCaps("Ma û", "Mon û", $text);
  $text = str_replace_AllCaps("Ma y", "Mon y", $text);
  $text = str_replace_AllCaps(" ma ho", " mon ho", $text);
  $text = str_replace_AllCaps("Ma ho", "Mon ho", $text);
  $text = str_replace_AllCaps(" ma hé", " mon hé", $text);
  $text = str_replace_AllCaps("Ma hé", "Mon hé", $text);
  $text = str_replace_AllCaps(" ma hal", " mon hal", $text);
  $text = str_replace_AllCaps("Ma hal", "Mon hal", $text);
  $text = str_replace_AllCaps(" la ho", " l'ho", $text);
  $text = str_replace_AllCaps("La ho", "L'ho", $text);
  $text = str_replace_AllCaps(" la hé", " l'hé", $text);
  $text = str_replace_AllCaps("La hé", "L'hé", $text);
  $text = str_replace_AllCaps(" la hal", " l'hal", $text);
  $text = str_replace_AllCaps("La hal", "L'hal", $text);
  
  $text = str_replace_AllCaps("je se ", "je me ", $text);
  $text = str_replace_AllCaps("Je se ", "Je me ", $text);
  $text = str_replace_AllCaps("je s'", "je m'", $text);
  $text = str_replace_AllCaps("Je s'", "Je m'", $text);
  $text = str_replace_AllCaps("tu se ", "tu te ", $text);
  $text = str_replace_AllCaps("Tu se ", "Tu te ", $text);
  $text = str_replace_AllCaps("tu s'", "tu t'", $text);
  $text = str_replace_AllCaps("Tu s'", "Tu t'", $text);
  $text = str_replace_AllCaps("vous se ", "vous vous ", $text);
  $text = str_replace_AllCaps("Vous se ", "Vous vous ", $text);
  $text = str_replace_AllCaps("vous s'", "vous vous ", $text);
  $text = str_replace_AllCaps("Vous s'", "Vous vous ", $text);
  $text = str_replace_AllCaps(" de le ", " du ", $text);
  $text = str_replace_AllCaps(" de les ", " des ", $text);
  $text = str_replace_AllCaps(" que un ", " qu'un ", $text);
  $text = str_replace_AllCaps(" que une ", " qu'une ", $text);
  $text = str_replace_AllCaps(" Que un ", " Qu'un ", $text);
  $text = str_replace_AllCaps(" Que une ", " Qu'une ", $text);
  $text = str_replace_AllCaps(" de un ", " d'un ", $text);
  $text = str_replace_AllCaps(" de une ", " d'une ", $text);
  $text = str_replace_AllCaps(" de des ", " des ", $text);
  $text = str_replace_AllCaps("Le Dieu", "Dieu", $text);
  $text = str_replace_AllCaps(" le Dieu", " le Dieu", $text);
  return $text;
}

function str_replace_AllCaps($oldVal, $newVal, $haystack)
{
  $haystack = str_replace($oldVal, $newVal, $haystack);
  $haystack = str_replace(mb_strtoupper($oldVal), mb_strtoupper($newVal), $haystack);
  
  return $haystack;
}
function getRandomArrayElement($arr) { return $arr[mt_rand(0, count($arr) - 1)]; }
function getRandomArrayIndex($arr) { return mt_rand(0, count($arr) - 1); }
function getRandomArrayIndexExclusion($arr, $exclu)
{
  $index = 0;
  
  do { $index = getRandomArrayIndex($arr); } while ($index == $exclu);
  return $index;
}
function estUneLettre($lettre)
{
  if (ctype_alpha($lettre)) return true;
  
  switch ($lettre)
  {
    case "à":
    case "â":
    case "ä":
    case "é":
    case "è":
    case "ê":
    case "ë":
    case "î":
    case "ï":
    case "ù":
    case "û":
    case "À":
    case "Â":
    case "Ä":
    case "É":
    case "È":
    case "Ê":
    case "Ë":
    case "Î":
    case "Ï":
    case "Ù":
    case "Û":
	return true;
  }
  
  return false;
}

?>
