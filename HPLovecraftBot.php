<?php

class AutoLovecraft
{

public function genererLovecraft()
{
  $mythos = array
  (
   "Yog-Sothoth",
   "Dagon",
   "Mère Hydra",
   "Shub-Niggurath",
   "Cthulhu",
   "Nyarlathotep",
  );
  
  $verbeInteractionObjet = array
  (
   array( "découvre", "a découvert" ),
   array( "vole", "a volé" ),
   array( "pose les yeux sur", "a posé les yeux sur" ),
   array( "sculpte", "a sculpté" ),
   array( "imagine", "a imaginé" ),
   array( "rêve de", "a rêvé de" ),
   array( "peint", "a peint" ),
   array( "écrit un poème sur", "a écrit un poème sur" ),
  );

  $verbeInteractionLieuBanal = array
  (
   array( "vit dans", "a vécu dans" ),
   array( "visite", "a visité" ),
   array( "emménage dans", "a emménagé dans" ),
   array( "s'installe dans", "s'est installé dans" ),
   array( "passe quelques jours dans", "a passé quelques jours dans" ),
  );
  
  $verbeInteractionLieuEtrange = array
  (
   array( "écrit un poème sur", "a écrit un poème sur" ),
   array( "visite", "a visité" ),
   array( "découvre", "a découvert" ),
   array( "apprend l'existence de", "a appris l'existence de" ),
   array( "part à la recherche de", "est parti à la recherche de" ),
   array( "lit un livre au sujet de", "a lu un livre au sujet de" ),
  );
  
  $verbeInteractionLivre = array
  (
   array( "annote", "a annoté" ),
   array( "découvre", "a découvert" ),
   array( "lit", "a lu" ),
   array( "traduit", "a traduit" ),
   array( "copie", "a copié" ),
  );
  
  $verbeUtilise = array
  (
   "utilise",
   "invoque les pouvoirs de",
   "a recours à",
  );
  
  $lieuBanal = array
  (
   "un appartement dont une pièce a été murée",
   "un village côtier",
   "une maison isolée",
   "une église aux vitraux étranges",
   "un manoir en ruines",
   "la bibliothèque d'une université",
   "un château en ruines",
   "un musée",
  );
  
  $reincarnation = array
  (
   "une créature d'une autre dimension",
   "son propre père",
   "un pharaon",
   "une sorcière morte sur le bûcher",
   "la première créature à avoir quitté l'océan",
   "un homme enterré vivant",
   "un enfant de %Mythos%",
   "une entité qui ne naîtra que dans dix mille ans",
   "un enfant mort-né il y a des siècles",
   "le premier homme",
   "une divinité barbare",
   "Abdul Alhazred",
   "un alchimiste fou",
   "un prophète de l'âge de pierre",
   "un mi-go",
   "un animal disparu depuis des millénaires",
  );
  
  $anomalie = array
  (
   "rêve chaque nuit qu'il %sceneEtrange%",
   "prétend être la réincarnation de %reincarnation%",
   "dit être le frère jumeau de %reincarnation%",
   "revit en rêve les derniers jours de %reincarnation%",
   "ressent l'appel de %lieuEtrange%",
   "écrit une série de poèmes sur %lieuEtrange%",
   "affirme être possédé par le fantôme de %reincarnation%",
  );
  
  $interactionCreation = array
  (
   "peint un tableau où un homme %sceneEtrange%",
   "écrit des poèmes sur un homme qui %sceneEtrange%",
   "prétend qu'il %sceneEtrangePass%",
   "rencontre un homme qui %sceneEtrangePass%",
  );
  
  $IntroductionPartie2 = array
  (
   "Peu après,",
   "Un mois plus tard,",
   "Depuis,",
   "Même s'il n'en parle jamais,",
   "Tous les soirs,",
   "Il fait un cauchemar où",
  );

  $structures = array
  (
   "%Hero% %evenement%. %IntroductionPartie2% il %pathologie%.",
   "%HeroNoAdj% %verbeInteractionLieuEtrange% %lieuEtrange%. %IntroductionPartie2% il %pathologie%.",
   "%Hero% %pathologie% depuis qu'il %evenementPasse%.",
   "%Hero% %anomalie%.",
   "%Hero% %interactionCreation%.",
   "%Hero% %verbeUtilise% %unArtefact% pour %verbeUnRituel%.",
   "%HeroNoAdj% %verbeInteractionLivre% %unLivre%, qui %contenuLivre%.",
   "%Hero% %rencontreEtrange%.",
   );

  $text = $this->getRandomArrayElement($structures);

  $text = str_replace("%Hero%", $this->fragment_hero(""), $text);
  $text = str_replace("%HeroNoAdj%", $this->fragment_hero("noadj"), $text);

  $text = str_replace("%evenement%", $this->fragment_evenement(""), $text);
  $text = str_replace("%evenementPasse%", $this->fragment_evenement("passe"), $text);

  $text = str_replace("%contenuLivre%", $this->fragment_contenuLivre(), $text);

  $text = str_replace("%unArtefact%", $this->fragment_artefact(), $text);
  $text = str_replace("%unLivre%", $this->fragment_livre(), $text);
  $text = str_replace("%rencontreEtrange%", $this->fragment_rencontreEtrange(), $text);

  $text = str_replace("%IntroductionPartie2%", $this->getRandomArrayElement($IntroductionPartie2), $text);

  $text = str_replace("%verbeInteractionObjet%", $this->getRandomArrayElement($verbeInteractionObjet)[0], $text);
  $text = str_replace("%verbeInteractionLieuBanal%", $this->getRandomArrayElement($verbeInteractionLieuBanal)[0], $text);
  $text = str_replace("%verbeInteractionLieuEtrange%", $this->getRandomArrayElement($verbeInteractionLieuEtrange)[0], $text);
  $text = str_replace("%verbeInteractionLivre%", $this->getRandomArrayElement($verbeInteractionLivre)[0], $text);
  $text = str_replace("%verbeUtilise%", $this->getRandomArrayElement($verbeUtilise), $text);
  $text = str_replace("%interactionCreation%", $this->getRandomArrayElement($interactionCreation), $text);

  $text = str_replace("%pVerbeInteractionObjet%", $this->getRandomArrayElement($verbeInteractionObjet)[1], $text);
  $text = str_replace("%pVerbeInteractionLieuBanal%", $this->getRandomArrayElement($verbeInteractionLieuBanal)[1], $text);
  $text = str_replace("%pVerbeInteractionLieuEtrange%", $this->getRandomArrayElement($verbeInteractionLieuEtrange)[1], $text);
  $text = str_replace("%pVerbeInteractionLivre%", $this->getRandomArrayElement($verbeInteractionLivre)[1], $text);
  
  $text = str_replace("%anomalie%", $this->getRandomArrayElement($anomalie), $text);
  $text = str_replace("%pathologie%", $this->fragment_pathologie(), $text);
  $text = str_replace("%unRituel%", $this->fragment_rituel(""), $text);
  $text = str_replace("%verbeUnRituel%", $this->fragment_rituel("verbe"), $text);
  
  $text = str_replace("%lieuBanal%", $this->getRandomArrayElement($lieuBanal), $text);
  $text = str_replace("%lieuEtrange%", $this->fragment_lieuetrange(), $text);
  $text = str_replace("%sceneEtrange%", $this->fragment_sceneetrange(""), $text);
  $text = str_replace("%sceneEtrangePass%", $this->fragment_sceneetrange("passe"), $text);
  $text = str_replace("%reincarnation%", $this->getRandomArrayElement($reincarnation), $text);

  $text = str_replace(" de un", " d'un", $text);
  $text = str_replace(" de le ", " du ", $text);
  $text = str_replace(" de les ", " des ", $text);
  $text = str_replace(" que il ", " qu'il ", $text);
  $text = str_replace("%Mythos%", $this->getRandomArrayElement($mythos), $text);

  $text = strtoupper(substr($text, 0, 1)).substr($text, 1);
  
  return $text;
}

// ==============================================================
// FRAGMENTS
// ==============================================================

private function fragment_rencontreEtrange()
{
  $structures =
  array(
   "%verbeNarrateur% a rencontré %entite% %particularite%",
   "%verbeNarrateur% est le dernier survivant de %entites% %particularites%",
   "%verbeNarrateur% a été l'esclave de %entite% %particularite%",
   "prophétise la venue de %entite% %particularite%",
   "%verbeNarrateur% donne naissance à %entite% %particularite%",
   "%verbeNarrateur% se métamorphose peu à peu en %entite% %particularite%",
   "%verbeNarrateur% recoit les instructions de %entite% %particularite%",
   "part à la recherche de %entite% %particularite%",
   "%verbeNarrateur% retient enfermé dans sa cave %entite% %particularite%",
   );  

  $verbeNarrateur =
  array(
   "déclare qu'il",
   "prétend qu'il",
   "rêve qu'il",
   "raconte qu'il",
   "écrit l'histoire d'un homme qui",
  );  

  $entite =
  array(
   array( "une abomination", "une race d'abominations", 1, 3 ),
   array( "un dieu", "un panthéon de dieux", 0, 2 ),
   array( "une entité", "une race d'entités", 1, 3 ),
   array( "un enfant", "une fratrie d'enfants", 0, 2 ),
   array( "une créature", "une race de créatures", 1, 3 ),
   array( "un être primitif", "une peuplade primitive", 0, 1 ),
   array( "un occultiste", "un groupe d'occultistes", 0, 2 ),
   array( "un membre d'une civilisation", "une civilisation", 1, 1 ),
   array( "un dément", "une secte de déments", 0, 2 ),
   array( "un cadavre putréfié", "un amas de cadavres putréfiés", 0, 2 ),
  );

  $particularite =
  array(
   array( "choisi par %Mythos%", "choisie par %Mythos%", "choisis par %Mythos%", "choisies par %Mythos%" ),
   array( "dont la venue marquera le début d'une nouvelle ère", "dont la venue marquera le début d'une nouvelle ère", "dont la venue marquera le début d'une nouvelle ère", "dont la venue marquera le début d'une nouvelle ère" ),
   array( "omniscient", "omnisciente", "omniscients", "omniscientes" ),
   array( "au visage de pieuvre", "au visage de pieuvre", "aux visages de pieuvre", "aux visages de pieuvre" ),
   array( "oublié", "oubliée", "oubliés", "oubliées" ),
   array( "ineffable", "ineffable", "ineffables", "ineffables" ),
   array( "mort-vivant", "mort-vivante", "mort-vivants", "mort-vivantes" ),
   array( "mi-homme mi-poisson", "mi-homme mi-poisson", "mi-hommes mi-poissons", "mi-hommes mi-poissons" ),
   array( "pratiquant %unRituel%", "pratiquant %unRituel%", "pratiquant %unRituel%", "pratiquant %unRituel%" ),
   array( "plus ancien que notre %ailleurs%", "plus ancienne que notre %ailleurs%", "plus anciens que notre %ailleurs%", "plus anciennes que notre %ailleurs%" ),
   array( "qui détruira notre %ailleurs%", "qui détruira notre %ailleurs%", "qui détruiront notre %ailleurs%", "qui détruiront notre %ailleurs%" ),
   array( "venu d'une autre %ailleurs%", "venue d'une autre %ailleurs%", "venus d'une autre %ailleurs%", "venues d'une autre %ailleurs%" ),
   array( "qui voyage entre les %ailleursP%", "qui voyage entre les %ailleursP%", "qui voyagent entre les %ailleursP%", "qui voyagent entre les %ailleursP%" ),
   array( "qui a créé l'humanité", "qui a créé l'humanité", "qui ont créé l'humanité", "qui ont créé l'humanité" ),
   array( "venu du fond des âges", "venue du fond des âges", "venus du fond des âges", "venues du fond des âges" ),
  );
  
  $selEntite = $this->getRandomArrayElement($entite);
  
  $text = $this->getRandomArrayElement($structures);
  $text = str_replace("%entite%", $selEntite[0], $text);
  $text = str_replace("%entites%", $selEntite[1], $text);
  $text = str_replace("%verbeNarrateur%", $this->getRandomArrayElement($verbeNarrateur), $text);
  $text = str_replace("%particularite%", $this->getRandomArrayElement($particularite)[$selEntite[2]], $text);
  $text = str_replace("%particularites%", $this->getRandomArrayElement($particularite)[$selEntite[3]], $text);
  $text = str_replace("%ailleurs%", $this->getRandomArrayElement(array( "planète", "dimension", "galaxie", "réalité" )), $text);
  $text = str_replace("%ailleursP%", $this->getRandomArrayElement(array( "planètes", "dimensions", "galaxies", "réalités" )), $text);
  
  return $text;
}

private function fragment_contenuLivre()
{
  $verbe =
  array(
   "décrit",
   "enseigne",
  );

  return $this->getRandomArrayElement($verbe) . " %unRituel%";
}

private function fragment_rituel($verbe)
{
  $rituel1 =
  array(
   array( "réaliser", "un rituel horrible" ),
   array( "apprendre", "une tradition ancienne" ),
   array( "redécouvrir", "une science oubliée" ),
   array( "dessiner", "les plans d'une machine" ),
   array( "psalmodier", "une prière à %Mythos%" ),
   array( "accomplir", "un sacrifice rituel" ),
   array( "réaliser", "une opération chirurgicale" ),
   array( "se sacrifier dans", "un suicide rituel" ),
   array( "entonner", "un hymne hideux" ),
   array( "pratiquer", "une méditation occulte" ),
  );
  
  $rituel2 =
  array(
   "qui peut faire revenir les morts",
   "qui nécessite de consommer de la chair humaine",
   "qui permet de rompre les barrières entre les mondes",
   "qui prophétisera la fin des temps",
   "qui révélera la vraie nature de l'humanité",
   "qui permet de voyager dans le temps",
   "qui conjurera une créature hideuse",
   "qui révélera le secret de l'immortalité",
   "qui transformera l'homme en quelque chose d'autre",
   "qui permet de séparer un cerveau de son corps",
   "qui permet d'invoquer %Mythos%",
   "qui permet de voyager jusqu'à des planètes éloignées",
   "qui permet d'accéder à l'omniscience",
  );

  $text = "";
  $rituelBase = $this->getRandomArrayElement($rituel1);
  
  if ($verbe == "verbe") $text = $rituelBase[0] . " ";
  
  $text .= $rituelBase[1] . " " . $this->getRandomArrayElement($rituel2);
  return $text;
}

private function fragment_evenement($temps)
{
  $evStructures =
  array(
   "%verbeInteractionObjet% %unArtefact%",
   "%verbeInteractionLivre% %unLivre%",
   "%verbeInteractionLieuBanal% %lieuBanal%",
   "%verbeInteractionLieuEtrange% %lieuEtrange%",
  );

  $text = $this->getRandomArrayElement($evStructures);
  if ($temps == "passe") $text = str_replace("%verbe", "%pVerbe", $text);
  
  return $text;
}

private function fragment_hero($parametre)
{
  $hero =
  array(
   "Un archéologue",
   "Un explorateur",
   "Un scientifique",
   "Un soldat",
   "Un détective",
   "Un journaliste",
   "Un vagabond",
   "Un écrivain",
   "Un étudiant",
   "Un médecin",
   "Un chirurgien",
   "Un philosophe",
   "Un professeur",
   "Un prêtre",
   "Un psychologue",
   "Un poète",
   "Un peintre",
   "Un marin",
   "Un personnage",
   "Un sorcier",
   "Un meurtrier",
  );
  
  $hero_qualificatif =
  array(
   "alcoolique",
   "longtemps interné dans un asile",
   "qu'on dit fou",
   "que tout le monde croyait disparu",
   "dément",
   "solitaire",
   "excentrique",
   "venu d'un autre pays",
   "revenu d'un long voyage",
   "maléfique",
  );
  
  $text = $this->getRandomArrayElement($hero);  
  if (($parametre != "noadj") && (mt_rand(0, 1) == 0)) $text .= " " . $this->getRandomArrayElement($hero_qualificatif);
  
  return $text;
}

private function fragment_lieuetrange()
{
 $partie1 =
  array(
   array( "une tour", 1 ),
   array( "une grotte", 1 ),
   array( "une ruine", 1 ),
   array( "un laboratoire", 0 ),
   array( "un temple", 0 ),
   array( "un cimetière", 0 ),
   array( "un hôpital", 0 ),
   array( "une tombe", 1 ),
   array( "une île", 1 ),
  );  

  $partie2 =
  array(
   array( "abandonné", "abandonnée"),
   array( "oublié", "oubliée"),
   array( "isolé", "isolée"),
   array( "mystérieux", "mystérieuse"),
  );

  $part1 = $this->getRandomArrayElement($partie1);
  
  return $part1[0] . " " . $this->getRandomArrayElement($partie2)[$part1[1]];
}

private function fragment_pathologie()
{
  $structures =
  array(
   "est saisi d'une peur panique %peurObjet%",
   //"crée une nouvelle science %peurObjet%",
   "souffre %crise%",
   "%mutileverbe%",
   "est obsédé par %obsession%",
   "perd %sens%",
   "constate que %partieducorpsPoss% %mutation%",
   "est convaincu que %sonOrganeInterne% %organeHallu%",
  );

  $sonOrganeInterne =
  array(
   "son intestin",
   "son cœur",
   "son cerveau",
   "son estomac",
   "son foie",
  );

  $organeHallu =
  array(
   "est celui de quelqu'un d'autre",
   "se liquéfie",
   "se putréfie",
   "est une machine artificielle",
   "a été retiré chirurgicalement",
   "servira dans un rituel horrible",
   "sera la clé d'une énigme cosmique",
   "est doué d'une volonté propre",
   "a été remplacé par quelque chose d'autre",
   "est dévoré par un parasite",
  );

  $peurObjet =
  array(
   "de la mer",
   "du sommeil",
   "des angles droits",
   "des fenêtres",
   "des lieux clos",
   "des animaux",
   "de la nuit",
   "de la solitude",
   "de sa propre odeur",
   "de son propre visage",
   "des autres êtres humains",
   "du soleil",
   "du temps qui passe",
   "du crépuscule",
   "de son ombre",
  );

  $crise =
  array(
   "de vertiges",
   "de saignements inexpliqués",
   "d'hallucinations",
   "d'insomnies",
   "de convulsions",
   "de pertes de connaissance",
   "de crises mystiques",
   "d'amnésie rétrograde",
   "de pensées obsédantes",
  );

  $obsession =
  array(
   "la mort",
   "la généalogie",
   "l'océan",
   "les langues anciennes",
   "l'astronomie",
   "les civilisations disparues",
   "la résurrection des morts",
   "ses rêves",
   "la planète Neptune",
   "la chair animale",
   "le sang",
   "certaines figures géométriques",
  );

  $mutileverbe =
  array(
   "se griffe %adverbePathologique% %partieducorps%",
   "se mutile %adverbePathologique% %partieducorps%",
   "se perce %adverbePathologique% %partieducorps%",
   "s'écorche %adverbePathologique% %partieducorps%",
   "tatoue des symboles occultes sur %partieducorpsPoss%",
   "se nettoie %partieducorps% jusqu'au sang",
  );
  
  $partieducorps =
  array(
   array( "le visage", "son visage" ),
   array( "les doigts", "sa main gauche" ),
   array( "l'abdomen", "son ventre" ),
   array( "la langue", "sa langue" ),
   array( "les membres", "son bras droit" ),
   array( "le torse", "son torse" ),
  );
  
  $sens =
  array(
   "la vue",
   "l'ouïe",
   "l'usage de la parole",
   "ses dents",
   "ses cheveux",
   "la mémoire",
   "la capacité à reconnaître les visages",
  );
  
  $adverbePathologique =
  array(
   "compulsivement",
   "frénétiquement",
   "jour et nuit",
   "constamment",
  );
  
  $mutation =
  array(
   "se couvre d'écailles",
   "se couvre de traces de morsures",
   "bouge spontanément",
   "gonfle et se tord",
   "se couvre de vibrisses noirs",
   "se couvre de tumeurs",
   "se tord selon des angles anormaux",
   "se change graduellement en tentacule",
   "se couvre de branchies",
   "se couvre de stries semblables à des runes",
   "émet des sons étouffés",
   "prend un aspect primitif",
   "prend un aspect animal",
   "dégage une odeur de cadavre",
   "maigrit à vue d'œil",
  );
  
  $text = $this->getRandomArrayElement($structures);
  $text = str_replace("%peurObjet%", $this->getRandomArrayElement($peurObjet), $text);
  $text = str_replace("%crise%", $this->getRandomArrayElement($crise), $text);
  $text = str_replace("%mutileverbe%", $this->getRandomArrayElement($mutileverbe), $text);
  $text = str_replace("%adverbePathologique%", $this->getRandomArrayElement($adverbePathologique), $text);
  $text = str_replace("%partieducorps%", $this->getRandomArrayElement($partieducorps)[0], $text);
  $text = str_replace("%partieducorpsPoss%", $this->getRandomArrayElement($partieducorps)[1], $text);  
  $text = str_replace("%obsession%", $this->getRandomArrayElement($obsession), $text);
  $text = str_replace("%sens%", $this->getRandomArrayElement($sens), $text);
  $text = str_replace("%mutation%", $this->getRandomArrayElement($mutation), $text);
  $text = str_replace("%sonOrganeInterne%", $this->getRandomArrayElement($sonOrganeInterne), $text);
  $text = str_replace("%organeHallu%", $this->getRandomArrayElement($organeHallu), $text);
  
  return $text;
}

private function fragment_livre()
{
  $adjectif =
  array(
   "énorme",
   "mystérieux",
   "abominable",
   "étrange",
   "incompréhensible",
   "abominable",
   "ignoble",
  ); 
  
  $livre =
  array(
   "livre",
   "manuscrit",
   "traité",
   "grimoire",
  );  

  return "un " . $this->getRandomArrayElement($adjectif) . " " . $this->getRandomArrayElement($livre) . ", " . $this->fragment_titrelivre();
}

private function fragment_titrelivre()
{
  $partie1 =
  array(
   array( "le", "Cahier", 0 ),
   array( "le", "Codex", 0 ),
   array( "le", "Culte", 0 ),
   array( "le", "Manuel", 0 ),
   array( "la", "Science", 1 ),
   array( "les", "Contes", 2 ),
   array( "les", "Chants", 2 ),
   array( "les", "Tomes", 2 ),
   array( "les", "Incantations", 3 ),
   array( "le", "Rituel", 0 ),
   array( "la", "Ballade", 1 ),
  );  

  $partie2 =
  array(
   array( "des goules", "des goules", "des goules", "des goules" ),
   array( "des morts", "des morts", "des morts", "des morts" ),
   array( "des fous", "des fous", "des fous", "des fous" ),
   array( "premier", "première", "premiers", "premières" ),
   array( "perdu", "perdue", "perdus", "perdues" ),
   array( "des âmes", "des âmes", "des âmes", "des âmes" ),
   array( "des mondes", "des mondes", "des mondes", "des mondes" ),
   array( "insensé", "insensée", "insensés", "insensées" ),
   array( "interdit", "interdite", "interdits", "interdites" ),
   array( "de %Mythos%", "de %Mythos%", "de %Mythos%", "de %Mythos%" ),
  );

  $part1 = $this->getRandomArrayElement($partie1);
  
  return $part1[0] . " \"" . $part1[1] . " " . $this->getRandomArrayElement($partie2)[$part1[2]] . "\"";
}

private function fragment_sceneetrange($parametre)
{
  $partie1 =
  array(
   array( "vit dans", "a vécu dans" ),
   array( "sort de son corps pour se rendre dans", "est sorti de son corps pour se rendre dans" ),
   array( "dessine sur sa peau le plan de", "a dessiné sur sa peau le plan de" ),
   array( "erre pendant un siècle dans", "a erré pendant un siècle dans" ),
   array( "doit construire", "a construit" ),
   array( "explore", "a exploré" ),
   array( "est retenu prisonnier dans", "a été retenu prisonnier dans" ),
  );  

  $partie2 =
  array(
   array( "une cité", 1 ),
   array( "un lieu", 0 ),
   array( "un temple", 0 ),
   array( "une tour", 1 ),
   array( "les entrailles d'une créature", 1 ),
   array( "une pièce", 1 ),
   array( "un dédale", 0 ),
   array( "une grotte", 1 ),
   array( "une forteresse", 1 ),
   array( "une statue", 1 ),
   array( "les rêves d'un dieu", 0 ),
   array( "un château", 0 ),
  );

  $partie3 =
  array(
   array( "au fond de l'Océan", "au fond de l'Océan" ),
   array( "qui n'obéit pas aux lois de la physique", "qui n'obéit pas aux lois de la physique" ),
   array( "où des créatures cylindriques délivrent leur enseignement", "où des créatures cylindriques délivrent leur enseignement" ),
   array( "hors de l'univers", "hors de l'univers" ),
   array( "cyclopéen", "cyclopéenne" ),
   array( "sur une planète éloignée", "sur une planète éloignée" ),
   array( "né des songes de %Mythos%", "née des songes de %Mythos%" ),
   array( "qui seul survivra à la catastrophe à venir", "qui seule survivra à la catastrophe à venir" ),
   array( "orné d'images de %Mythos%", "ornée d'images de %Mythos%" ),
   array( "au carrefour de tous les mondes", "au carrefour de tous les mondes" ),
   array( "plus vaste que la Terre entière", "plus vaste que la Terre entière" ),
   array( "aux confins du système solaire", "aux confins du système solaire" ),
   array( "plus vieux que l'univers", "plus vieille que l'univers" ),
   array( "dans les profondeurs de la terre", "dans les profondeurs de la terre" ),
   array( "géométriquement impossible", "géométriquement impossible" ),
   array( "qui n'existera que dans un millénaire", "qui n'existera que dans un millénaire" ),
   array( "au bord d'une falaise", "au bord d'une falaise" ),
  );
  
  $indexTemps = 0;
  if ($parametre == "passe") $indexTemps = 1;
  
  $lieu = $this->getRandomArrayElement($partie2);
  
  return $this->getRandomArrayElement($partie1)[$indexTemps] . " " . $lieu[0] . " " . $this->getRandomArrayElement($partie3)[$lieu[1]];
}

private function fragment_artefact()
{
	$artefact =
  array(
   array( "un crâne", 0 ),
   array( "un symbole", 0 ),
   array( "un masque", 0 ),
   array( "un couteau", 0 ),
   array( "un couteau", 0 ),
   array( "un encensoir", 0 ),
   array( "un instrument", 0 ),
   array( "un fossile", 0 ),
   array( "un talisman", 0 ),
   array( "un bijou", 0 ),
   array( "une rune", 1 ),
   array( "une statuette", 1 ),
   array( "une figurine", 1 ),
   array( "une charogne", 1 ),
   array( "une idole", 1 ),
  );

  $qualificatif =
  array(
   array( "mystérieux", "mystérieuse" ),
   array( "difforme", "difforme" ),
   array( "hideux", "hideuse" ),
   array( "primitif", "primitive" ),
   array( "ancien", "ancienne" ),
   array( "égyptien", "égyptienne" ),
   array( "couvert de symboles", "couverte de symboles" ),
   array( "enduit de sang frais", "enduite de sang frais" ),
   array( "d'origine inconnue", "d'origine inconnue" ),
   array( "extraterrestre", "extraterrestre" ),
  );
  
  $art = $this->getRandomArrayElement($artefact);
  
  $text = $art[0];
  $text .= " " . $this->getRandomArrayElement($qualificatif)[$art[1]];

  return $text;
}

private function getRandomArrayElement($arr) { return $arr[mt_rand(0, count($arr) - 1)]; }

}