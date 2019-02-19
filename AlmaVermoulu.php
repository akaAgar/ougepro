<?php

class AlmanachVermoulu
{
 private $periode = array(
  array("jour",0),
  array("jour",0),
  array("jour",0),

  array("journée %periodeAdj%",1),
  array("journée %periodeAdj%",1),
  array("journée %periodeAdj%",1),
  array("journée %periodeAdj%",1),

  array("semaine %periodeAdj%",1),
  array("semaine %periodeAdj%",1),

  array("rencontre %periodeAdj%",1),
  array("congrès %periodeAdj%",0),

  array("commémoration %periodeAdj%",1),
  array("cérémonie %periodeAdj%",1),
  array("festival %periodeAdj%",0),
  array("fête %periodeAdj%",1),
 );

 private $periodeAdj = array(
  array("",""),
  array("",""),
  array(" européen"," européenne"),
  array(" quotidien"," quotidienne"),
  array(" mondial"," mondiale"),
  array(" national"," nationale"),
  array(" français"," française"),
  array(" franco-%pays%"," franco-%pays%"),
  array(" citoyen"," citoyenne"),
  array(" républicain"," républicaine"),
 );

 private $periodePays = array(
  array("allemand","allemande"),
  array("allemand","allemande"),
  array("allemand","allemande"),

  array("américain","américaine"),
  array("bulgare","bulgare"),
  array("hispanique","hispanique"),
  array("slovaque","slovaque"),
 );

 private $adjectifs = array(
  "abîmé€$",
  "acide$",
  "affamé€$",
  "aimable$",
  "amusant€$",
  "aristocratique$",
  "bienveillant€$",
  "bizarre$",
  "brillant€$",
  "bruyant€$",
  "brûlant€$",
  "calme$",
  "carnivore$",
  "cassé€$",
  "chaud€$",
  "clair€$",
  "colérique$",
  "comestible$",
  "complexe$",
  "compliqué€$",
  "confortable$",
  "contrariant€$",
  "convexe$",
  "crispé€$",
  "d'origine contrôlée",
  "difficile$",
  "dur€$",
  "décevant€$",
  "délavé€$",
  "désagréable$",
  "effrayé€$",
  "enflé€$",
  "enrhumé€s",
  "erratique$",
  "fécond€$",
  "foncé€$",
  "fragile$",
  "froid€$",
  "frustré€$",
  "gai€$",
  "gelé€$",
  "gigantesque$",
  "glauque$",
  "gonflable$",
  "gourmand€$",
  "gris€$",
  "handicapé€$",
  "herbivore$",
  "hérétique$",
  "hilare$",
  "humide$",
  "héroïque$",
  "iconoclaste$",
  "immobile$",
  "impossible$",
  "incompréhensible$",
  "inconnu€$",
  "ingrat€$",
  "insatisfait€$",
  "instable$",
  "interrompu€$",
  "intime$",
  "interdit€$",
  "intéressant€$",
  "impeccable$",
  "impénitent€$",
  "jaune$",
  "lent€$",
  "lisse$",
  "lourd€$",
  "maigre$",
  "maudit€$",
  "malade$",
  "maladroit€$",
  "meilleur€$",
  "méprisable$",
  "minoritaire$",
  "moche$",
  "moite$",
  "mort€$ pour la France",
  "mort€$ pour la France",
  "mort€$",
  "multicolore$",
  "méchant€$",
  "méfiant€$",
  "noble$",
  "noir€$",
  "non-désiré€$",
  "nu€$",
  "obèse$",
  "ordinaire$",
  "patient€$",
  "pestiféré€$",
  "placide$",
  "poilu€$",
  "pointu€$",
  "poli€$",
  "profond€$",
  "propre$",
  "pénible$",
  "rapide$",
  "raté€$",
  "recyclable$",
  "redoutable$",
  "riche$",
  "rond€$",
  "rouge$",
  "sans frontières",
  "satisfait€$",
  "sénile$",
  "solide$",
  "solitaire$",
  "sombre$",
  "souple$",
  "tendu€$",
  "terrifiant€$",
  "tombé€$ au champ d'honneur",
  "tombé€$ au champ d'honneur",
  "tordu€$",
  "tranquille$",
  "transparent€$",
  "triste$",
  "usé€$",
  "ventripotent€$",
  "vide$",
  "violent€$",
  "vivant€$",
  "volant€$",
  "vorace$",
  "vulgaire$",
  "à mobilité réduite",
  "éco-responsable$",
  "énervant€$",
  "étonnant€$",
  "étroit€$",
 );
 
 private $structures = array
 (
  "%periode% %categorie% %nom%",
  "%periode% %des% %nom% %adjectifNom%",
  "%periode% %adjectifDate%",
  "%commemorationNomPropre% %nomPropre%, %nomPropreVerbe% %nom%",
  "%commemorationNomPropre% %nomPropre%, %nomPropreQualificatif% %adjectif%",
 );
 
 private $commemorationNomPropres = array
 (
  "anniversaire de",
  "anniversaire de la mort de",
  "canonisation de",
  "exécution de",
  "exhumation du corps de",
  "fête de",
  "journée en mémoire de",
  "libération de",
  "procès de",
 );
 
 private $nomProprePrenoms = array("Aalongue", "Abbaud", "Abbon", "Abelène", "Abran", "Abzal", "Acelin", "Achaire", "Achard", "Acheric", "Adalard", "Adalbaud", "Adalbéron", "Adalbert", "Adalelme", "Adalgaire", "Adalgise", "Adalicaire", "Adalman", "Adalric", "Adebran", "Adélard", "Adelbert", "Adelin", "Adenet", "Adhémar", "Adier", "Adinot", "Adolbert", "Adon", "Adoul", "Adrier", "Adson", "Agambert", "Aganon", "Agebert", "Agelmar", "Agelric", "Agenulf", "Agerad", "Ageran", "Agilbert", "Agilmar", "Aglebert", "Agmer", "Agnebert", "Agrestin", "Agrève", "Aibert", "Aicard", "Aimbaud", "Aimin", "Aimoin", "Airard", "Airy", "Alard", "Albalde", "Albaud", "Albéron", "Alboin", "Albuson", "Alchaire", "Alchas", "Alcuin", "Alleaume", "Amanieu", "Amat", "Amblard", "Anaclet", "Ansbert", "Anselin", "Ansoald", "Archambaud", "Arembert", "Arnat", "Artaud", "Aubry", "Authaire", "Avold", "Ayoul", "Barnoin", "Barral", "Baudri", "Bérard", "Bérenger", "Bernon", "Bettolin", "Betton", "Brunon", "Burchard", "Caribert", "Centule", "Childebert", "Chilpéric", "Cillien", "Clodomir", "Clotaire", "Cloud", "Colomban", "Conan", "Conrad", "Cybard", "Dacien", "Dadon", "Dalmace", "Dambert", "Dioclétien", "Doat", "Drogon", "Durand", "Eadwin", "Ebbon", "Ebehard", "Eddo", "Edwin", "Egfroi", "Égilon", "Eilbert", "Einold", "Éon", "Ermenfred", "Ermengaud", "Ernée", "Ernold", "Ernoul", "Eumène", "Eunuce", "Euric", "Eustaise", "Euverte", "Evroult", "Fleuret", "Flocel", "Flodoard", "Flouard", "Flour", "Floxel", "Folquet", "Fortunat", "Foulque", "Frajou", "Frambault", "Frambourg", "Frameric", "Francaire", "Fulbert", "Gailhart", "Gaillon", "Garréjade", "Gaubert", "Gerbert", "Giboin", "Gildric", "Gislebert", "Godomer", "Gossuin", "Guéthenoc", "Guibin", "Guiscard", "Hatton", "Haynhard", "Héribert", "Herlebald", "Herlebauld", "Herlemond", "Hildebald", "Hildebrand", "Hilduin", "Hoel", "Honfroi", "Hugon", "Humbaud", "Isembert", "Ithier", "Jacquemin", "Jacut", "Lagier", "Lambert", "Lancelin", "Léothéric", "Lidoire", "Lisiard", "Lothaire", "Lubin", "Maïeul", "Malulf", "Marcuard", "Maric", "Materne", "Matfrid", "Matifas", "Maur", "Mauront", "Mesmin", "Milon", "Odo", "Oldaric", "Orderic", "Oricle", "Premon", "Rachio", "Radoald", "Radulf", "Raginard", "Raimbaut", "Raimbert", "Rainier", "Rainon", "Ramnulf", "Ranulfe", "Rataud", "Rodron", "Romary", "Roscelin", "Rostang", "Salvin", "Savaric", "Savary", "Sébaste", "Senoc", "Sicard", "Siegebert", "Sifard", "Sigebert", "Taillefer", "Taurin", "Théodebert", "Théodemar", "Theoderich", "Théodran", "Thérouanne", "Thiégaud", "Ursicin", "Ursion", "Vantelme", "Volusien", "Warin", "Wigeric", "Willibert", "Wulfoald", "Wulgrin");
 
 private $nomPropreNoms =
 array(
 "bon","boz","cor","dieu","trot","cho","que","bois","nier","rais","mar","ran","thom","seb",
 "mi","thi","bault","cel","lan","bur","cher","bou","do","flag","pluf","met","chie"
 );
 
 private $nomPropreVerbes = array
 (
  "contempteur %des%",
  "inventeur %des%",
  "leader %des%",
  "libérateur %des%",
  "prophète %des%",
  "qui a triomphé %des%",
  "roi %des%",
  "saint patron %des%",
 );
 
 private $nomPropreQualificatifs = array
 (
  "anarchiste",
  "apostat",
  "bureaucrate",
  "chauffagiste",
  "citoyen",
  "clown",
  "communiste",
  "contempteur",
  "droguiste",
  "esthète",
  "kinésithérapeute",
  "invididu",
  "mathématicien",
  "médecin-légiste",
  "messie",
  "pape",
  "patriote",
  "podologue",
  "prêtre",
  "prophète",
  "quidam",
  "restaurateur",
  "révolutionnaire",
  "saboteur",
  "séducteur",
  "sommelier",
  "spécimen",
  "tourneur-fraiseur",
  "vagabond",
  "vieillard",
 );
 
 private $noms = array
 (
  array("absolu", 0),
  array("absorption", 0),
  array("aspérités", 3),
  array("aveux", 2),
  array("aération", 1),
  array("aïl", 0),
  array("banalités", 3),
  array("banalités", 3),
  array("bave", 1),
  array("beurre", 0),
  array("brume", 1),
  array("buveurs", 2),
  array("béret", 0),
  array("cartilage", 0),
  array("chaos", 0),
  array("chien", 0),
  array("clous", 2),
  array("coins", 2),
  array("coupe mulet", 1),
  array("coussins", 2),
  array("coït", 0),
  array("crainte", 1),
  array("crampes", 3),
  array("crasse", 1),
  array("croûtes", 3),
  array("cuistres", 2),
  array("dentistes", 2),
  array("distraction", 1),
  array("divorce", 0),
  array("doute", 0),
  array("déchets", 2),
  array("enfants", 2),
  array("ennui", 0),
  array("espoir", 0),
  array("essuie-tout", 0),
  array("factures", 3),
  array("flan", 0),
  array("foin", 0),
  array("formes géométriques", 3),
  array("freins", 2),
  array("fruits", 2),
  array("fuites", 3),
  array("fête", 1),
  array("ganglions", 2),
  array("gaufres", 3),
  array("gencives", 3),
  array("gens", 2),
  array("gercures", 3),
  array("goût", 0),
  array("grattoirs", 2),
  array("grincements", 2),
  array("gueules", 3),
  array("hoquet", 0),
  array("incinérateurs", 2),
  array("indigestion", 1),
  array("indignation", 1),
  array("injure", 1),
  array("intellectuels", 2),
  array("invertébrés", 2),
  array("joie", 1),
  array("kystes", 2),
  array("lamantins", 2),
  array("liens", 2),
  array("marâtres", 3),
  array("mastication", 1),
  array("mensonge", 0),
  array("menuisiers", 2),
  array("merde", 1),
  array("mitochondries", 3),
  array("moisi", 0),
  array("moribonds", 2),
  array("mou", 0),
  array("moufles", 2),
  array("myopes", 2),
  array("mécontents", 2),
  array("navet", 0),
  array("nez", 0),
  array("notaires", 2),
  array("obstination", 1),
  array("odeurs", 3),
  array("ongles", 2),
  array("organes", 2),
  array("oursins", 2),
  array("outils", 2),
  array("pain", 0),
  array("papier peint", 0),
  array("parpaing", 0),
  array("pessimistes", 2),
  array("phacochères", 2),
  array("philosophes", 2),
  array("piquette", 1),
  array("plaintes", 3),
  array("plâtre", 0),
  array("poneys", 2),
  array("procrastination", 1),
  array("province", 1),
  array("pus", 0),
  array("pâtés", 2),
  array("pâtisserie", 1),
  array("pénombre", 1),
  array("quincaillerie", 1),
  array("reclus", 2),
  array("rongeurs", 2),
  array("rouille", 1),
  array("royalistes", 2),
  array("récipents", 2),
  array("sabotage", 0),
  array("sac banane", 0),
  array("saumure", 1),
  array("sectes", 3),
  array("solipsisme", 0),
  array("sorcières", 3),
  array("sous-entendu", 0),
  array("spasmes", 2),
  array("sphères", 3),
  array("superposition", 1),
  array("taches", 3),
  array("tire-fesses", 2),
  array("trafiquants d'armes", 2),
  array("traîtrise", 1),
  array("trous", 2),
  array("tubulures", 3),
  array("vent", 0),
  array("ventres", 2),
  array("vociférations", 3),
  array("volaille", 1),
  array("vélléités", 3),
  array("yaourt", 0),
  array("zones", 3),
  array("échardes", 3),
  array("égoïsme", 0),
 );

 private $categories = array
 (
  "des maladies %des%",
  "pour le respect %des%",
  "de lutte contre %les%",
  "pour l'égalité entre les hommes et %les%",
  "du dépistage %des%",
  "contre les violences faites %aux%",
  "en mémoire %des%",
  "contre la discrimination %des%",
  "de sensibilisation %aux%",
  "pour les droits %des%",
  "en faveur %des%",
  "sans",
  "contre %les%",
 );

 private function randArray($arr) { return $arr[mt_rand(0, count($arr) - 1)]; }
 private function accordTerminaison($mot, $genreNombre)
 {
  $mot = str_replace('€', (($genreNombre % 2) == 1) ? 'e' : '', $mot);
  $mot = str_replace('$', ($genreNombre > 1) ? 's' : '', $mot);

  return $mot;
 }

 public function imprimerjour($dateJS, $dateJ, $dateM, $dateA)
 {
  $jourSemaine = array('dimanche','lundi','mardi','mercredi','jeudi','vendredi','samedi');
  $mois = array('','janvier','février','mars','avril','mai','juin','juillet','août','septembre','octobre','novembre','décembre');
  
  $jour = $dateJ;
  if ($jour == 1) $jour = '1er';

  return $jourSemaine[$dateJS].' '.$jour.' '.$mois[$dateM].' '.$dateA;
 }
 
 private function remplacementAvantVoyelle($avant, $apres, $texte)
 {
  $voyelles = array(
   "a","à","â","e","é","è","ê","ë","i","î","ï","o","ô","u","ù","û",
   "A","À","Â","E","É","È","Ê","Ë","I","Î","Ï","O","Ô","U","Ù","Û",
   "h", "H" /*, "y", "Y" */);

  foreach($voyelles as $v)
   $texte = str_replace($avant.$v, $apres.$v, $texte);
  
  return $texte;
 }

 // par défault: date('w'), date('j'), date('n'), date('Y')
 public function generer($dateJS, $dateJ, $dateM, $dateA, $formatTwitter = false)
 {
  $seedDuJour = $dateA * 1777 + $dateM * 37 + $dateJ;
  mt_srand($seedDuJour);

  $intro = $this->imprimerjour($dateJS, $dateJ, $dateM, $dateA);
  if ($formatTwitter)
   $intro = "Bonjour, nous sommes le ".$intro.", ";

  $jourInfo = $this->randArray($this->periode);
  $periode = str_replace('%periodeAdj%', $this->randArray($this->periodeAdj)[$jourInfo[1]], $jourInfo[0]);
  $periode = str_replace('%pays%', $this->randArray($this->periodePays)[$jourInfo[1]], $periode);

  $texte = $this->randArray($this->structures);
  $texte = str_replace('%periode%', $periode, $texte);
  $texte = str_replace('%commemorationNomPropre%', $this->randArray($this->commemorationNomPropres), $texte);
  
  $nom = $this->randArray($this->noms);
  
  $adj = $this->randArray($this->adjectifs);
  $adjN = $this->accordTerminaison($adj, $nom[1]);
  $adjD = $this->accordTerminaison($adj, $jourInfo[1]);

  $texte = str_replace('%categorie%', $this->randArray($this->categories), $texte);

  $patronyme = $this->randArray($this->nomPropreNoms).$this->randArray($this->nomPropreNoms);
  $patronyme = strtoupper(substr($patronyme, 1, 1)).substr($patronyme, 2);
  
  $texte = str_replace('%nomPropre%', $this->randArray($this->nomProprePrenoms).' '.$patronyme, $texte);
  $texte = str_replace('%nomPropreQualificatif%', $this->randArray($this->nomPropreQualificatifs), $texte);
  $texte = str_replace('%nomPropreVerbe%', $this->randArray($this->nomPropreVerbes), $texte);

  $texte = str_replace('%nom%', $nom[0], $texte);
  $texte = str_replace('%adjectif%', $this->accordTerminaison($adj, 0), $texte);
  $texte = str_replace('%adjectifNom%', $adjN, $texte);
  $texte = str_replace('%adjectifDate%', $adjD, $texte);

  $texte = str_replace('%aux%', array('au','à la','aux','aux')[$nom[1]], $texte);
  $texte = str_replace('%des%', array('du','de la','des','des')[$nom[1]], $texte);
  $texte = str_replace('%les%', array('le','la','les','les')[$nom[1]], $texte);
  
  $texte = $this->remplacementAvantVoyelle(" au ", " à l'", $texte);
  $texte = $this->remplacementAvantVoyelle(" à la ", " à l'", $texte);
  $texte = $this->remplacementAvantVoyelle(" de la ", " de l'", $texte);
  $texte = $this->remplacementAvantVoyelle(" du ", " de l'", $texte);
  $texte = $this->remplacementAvantVoyelle(" de ", " d'", $texte);

  $texte = str_replace('  ', ' ', $texte);
  
  if ($formatTwitter)
   return $intro.$texte.'.';
  else
   return array($intro, $texte);
 }
}

?>