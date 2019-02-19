<?php


class EtSi
{

public function genererEtSi_NBSP() { return str_replace(" ?", "&nbsp;?", $this->genererEtSi()); }

public function genererEtSi()
{
  $structures = array
  (
   "%evenement% %action_evenement_evenement%",
   "%personne% %action_personne_personne% %personne2%",
   "%personne% %action_personne_evenement% %evenement%",
   "%personne% %action_personne_lieu%",
   "%personne% %action_personne%",
   "%evenement% %action_evenement%",
   "%lieu% %action_lieu%",
   "%invention% %action_invention%",
   );

  $lieu =
  array(
   array( "la France", "en France", 1 ),
   array( "l'Afrique", "en Afrique", 1 ),
   array( "l'Antarctique", "en Antarctique", 0 ),
   array( "la Chine", "en Chine", 1 ),
   array( "le Japon", "au Japon", 0 ),
   array( "l'Allemagne", "en Allemagne", 1 ),
   array( "la Russie", "en Russie", 1 ),
   array( "le Brésil", "au Brésil", 0 ),
   array( "les États-Unis", "aux États-Unis", 2 ),
   array( "la Scandinavie", "en Scandinavie", 1 ),
   array( "l'Europe", "en Europe", 1 ),
   array( "la Grèce", "en Grèce", 1 ),
   array( "l'Inde", "en Inde", 1 ),
   array( "l'Amérique du Sud", "en Amérique du Sud", 1 ),
   array( "la Turquie", "en Turquie", 1 ),
   array( "la Lune", "sur la Lune", 1 ),
   array( "Mars", "sur Mars", 0 ),
   array( "l'Atlantide", "dans l'Atlantide", 1 ),
   array( "Rome", "à Rome", 0 ),
  );
  
  $date =
  array(
   "hier",
   "en 1900",
   "cent ans plus tôt",
   "cent ans plus tard",
   "mille ans plus tôt",
   "mille ans plus tard",
  );
  
  $invention =
  array(
   array( "le char d'assaut", 0 ),
   array( "la vaccination", 1 ),
   array( "les antidépresseurs", 2 ),
   array( "le pistolet-mitrailleur", 0 ),
   array( "la machine à vapeur", 1 ),
   array( "la bombe atomique", 1 ),
   array( "l'hypnose", 1 ),
   array( "l'alchimie", 1 ),
   array( "la psychanalyse", 1 ),
   array( "la catapulte", 1 ),
   array( "le lance-flammes", 0 ),
   array( "la réalité virtuelle", 1 ),
   array( "la lampe à pétrole", 1 ),
   array( "l'automobile", 1 ),
   array( "l'astrologie", 1 ),
   array( "le micro-ordinateur", 0 ),
   array( "la guillotine", 1 ),
   array( "la poudre à canon", 1 ),
   array( "la monnaie", 1 ),
   array( "le réfrigérateur", 0 ),
   array( "le chewing-gum", 0 ),
   array( "l'anesthésie", 1 ),
   array( "la pénicilline", 1 ),
   array( "Internet", 0 ),
   array( "le télégraphe", 0 ),
   array( "la langue des signes", 1 ),
   array( "le téléphone", 0 ),
   array( "la télévision", 1 ),
   array( "l'électricité", 1 ),
   array( "l'intelligence artificielle", 1 ),
   array( "le bombardier furtif", 0 ),
   array( "le pantacourt", 0 ),
   array( "la perche à selfie", 0 ),
  );
  
  $action_invention =
  array(
   array( "avait été inventé par %personne%", "avait été inventée par %personne%", "avaient été inventés par %personne%" ),
   array( "avait été inventé %alieu%", "avait été inventée %alieu%", "avaient été inventés %alieu%" ),
   array( "avait été la cause de %evenement%", "avait été la cause de %evenement%", "avaient été la cause de %evenement%" ),
   array( "avait été inventé pendant %evenement%", "avait été inventée pendant %evenement%", "avaient été inventés pendant %evenement%" ),
   array( "nécessitait l'usage de %invention2%", "nécessitait l'usage de %invention2%", "nécessitait l'usage de %invention2%" ),
   array( "avait été inventé en même temps que %invention2%", "avait été inventée en même temps que %invention2%", "avaient été inventés en même temps que %invention2%" ),
  );
  
  // Doivent être classés par ordre (à peu près) chronologique
  $evenement =
  array(
   array( "la découverte du feu", 1 ),
   array( "la construction des pyramides", 1 ),
   array( "la guerre de Troie", 1 ),
   array( "la guerre des Gaules", 1 ),
   array( "la christianisation du monde romain", 1 ),
   array( "la chute de l'empire romain", 1 ),
   array( "la chute de Constantinople", 1 ),
   array( "la première croisade", 1 ),
   array( "la guerre de cent ans", 1 ),
   array( "la peste noire", 1 ),
   array( "la découverte de l'Amérique", 1 ),
   array( "la Renaissance", 1 ),
   array( "la Révolution américaine", 1 ),
   array( "la Révolution française", 1 ),
   array( "la Révolution industrielle", 1 ),
   array( "la bataille de Waterloo", 1 ),
   array( "la Commune de Paris", 1 ),
   array( "la Révolution Russe", 1 ),
   array( "la première guerre mondiale", 1 ),
   array( "la pandémie de grippe espagnole", 1 ),
   array( "la montée du fascisme", 1 ),
   array( "la deuxième guerre mondiale", 1 ),
   array( "la guerre du Vietnam", 1 ),
   array( "l'assassinat de JFK", 0 ),
   array( "le premier vol spatial habité", 0 ),
   array( "la guerre du Golfe", 1 ),
   array( "l'invention de l'imprimerie", 1 ),
  );
  
  $action_evenement_evenement =
  array(
   array( "était lié à %evenement2%", "était liée à %evenement2%" ),
   array( "et %evenement2% avaient eu lieu en même temps", "et %evenement2% avaient eu lieu en même temps" ),
   array( "avait causé %evenement2%", "avait causé %evenement2%" ),
   array( "avait été un complot visant à provoquer %evenement2%", "avait été un complot visant à provoquer %evenement2%" ),
   array( "avait eu lieu après %evenement2%", "avait eu lieu après %evenement2%" ),
   array( "avait eu lieu en réaction à %evenement2%", "avait eu lieu en réaction à %evenement2%" ),
   array( "avait été provoqué par %metiers%", "avait été provoquée par %metiers%" ),
  );
   
  // 0: masculin, 1: féminin
  // Doivent être classés par ordre (à peu près) chronologique
  $personne =
  array(
   array( "Aristote", 0 ),
   array( "Alexandre le Grand", 0 ),
   array( "Cléopatre", 1 ),
   array( "Néron", 0 ),
   array( "Caligula", 0 ),
   array( "Jules César", 0 ),
   array( "Attila", 0 ),
   array( "Jésus", 0 ),

   array( "Charlemagne", 0 ),
   array( "Guillaume le Conquérant", 0 ),
   array( "Saladin", 0 ),
   array( "le pape Pie V", 0 ),
   array( "Henri VIII", 0 ),
   array( "Torquemada", 0 ),
   array( "Jeanne d'Arc", 1 ),
   array( "Christophe Colomb", 0 ),
   array( "Léonard de Vinci", 0 ),
   array( "Elizabeth I", 1 ),
   array( "Galilée", 0 ),
   array( "Gutenberg", 0),
   array( "Nostradamus", 0),
   array( "Isaac Newton", 0 ),
   array( "Louis XIV", 0 ),
   array( "George Washington", 0 ),
   array( "Emmanuel Kant", 0 ),
   array( "le marquis de Sade", 0 ),
   array( "Robespierre", 0 ),

   array( "Ludwig van Beethoven", 0 ),
   array( "Napoléon", 0 ),
   array( "Victor Hugo", 0 ),
   array( "Billy the Kid", 0 ),
   array( "Nikola Telsa", 0 ),
   array( "Marie Curie", 1 ),
   array( "Charles Darwin", 0 ),
   array( "Karl Marx", 0 ),
   array( "Raspoutine", 0 ),
   array( "Friedrich Nietzsche", 0 ),
   array( "Louis Pasteur", 0 ),
   array( "H.P. Lovecraft", 0 ),

   array( "Atatürk", 0 ),
   array( "Albert Enstein", 0 ),
   array( "Charlie Chaplin", 0 ),
   array( "Sigmund Freud", 0 ),
   array( "Pablo Picasso", 0 ),
   array( "Adolf Hitler", 0 ),
   array( "Staline", 0 ),
   array( "Charles de Gaulle", 0 ),
   array( "Marilyn Monroe", 1 ),
   array( "Eva Perón", 1 ),
   array( "Ghandi", 0 ),

   array( "Malcolm X", 0 ),
   array( "Nelson Mandela", 0 ),
   array( "Bob Marley", 0 ),
   array( "John Lennon", 0 ),
   array( "Mère Thérésa", 1 ),
  );
  
  $action_personne_personne =
  array(
   array( "avait rencontré", "avait rencontré" ),
   array( "avait été assassiné par", "avait été assassinée par" ),
   array( "avait été de la famille de", "avait été de la famille de" ),
   array( "était tombé amoureux de", "était tombée amoureuse de" ),
   array( "s'était réincarné en", "s'était réincarnée en" ),
   array( "avait tout appris à", "avait tout appris à" ),
   array( "était membre de la même société secrète que", "était membre de la même société secrète que" ),
   array( "avait été le modèle de", "avait été le modèle de" ),
   array( "avait eu le tempérament de", "avait eu le tempérament de" ),
   array( "était un personnage fictif inventé par", "était un personnage fictif inventé par" ),
   array( "s'était battu en duel avec", "s'était battu en duel avec" ),
   array( "était en fait", "était en fait" ),
  );
  
  $metier =
  array(
   array( "un peintre", "une peintre", "des peintres" ),
   array( "un magicien", "une magicienne", "des magiciens" ),
   array( "un voyageur temporel", "une voyageuse temporelle", "des voyageurs temporels" ),
   array( "un androïde", "une androïde", "des androïdes" ),
   array( "un extraterrestre", "une extraterrestre", "des extraterrestres" ),
   array( "membre d'une société secrète", "membre d'une société secrète", "les membres d'une société secrète" ),
   array( "un romancier", "une romancière", "des écrivains" ),
   array( "un clown", "un clown", "des clowns" ),
   array( "un gigolo", "une prostituée", "des prostituées" ),
   array( "un pirate", "un pirate", "des pirates" ),
   array( "un hippie", "une hippie", "des hippies" ),
   array( "un prêtre", "une nonne", "des prêtres" ),
   array( "un philosophe", "une philosophe", "des philosophes" ),
   array( "un poète", "une poète", "des poètes" ),
   array( "un chirurgien", "une chirurgienne", "des chirurgiens" ),
  );
  
  $action_personne =
  array(
   array( "n'était jamais né", "n'était jamais née" ),
   array( "avait été une femme", "avait été un homme" ),
   array( "était encore vivant encore aujourd'hui", "était encore vivant encore aujourd'hui" ),
   array( "était une invention des livres d'histoire", "était une invention des livres d'histoire"),
   array( "avait été %metier%", "avait été %metier%" ),
   array( "avait été %metier%", "avait été %metier%" ), // Doublé volontairement
  );
  
  $action_personne_evenement =
  array(
   "avait été responsable de",
   "avait empéché",
   "avait prédit",
   "avait écrit un livre sur",
  );
    
  $action_evenement =
  array(
   array( "n'avait jamais eu lieu", "n'avait jamais eu lieu" ),
   array( "avait eu lieu %alieu%", "avait eu lieu %alieu%" ),
   array( "avait eu lieu %date%", "avait eu lieu %date%" ),
   array( "avait été provoqué par %metiers%", "avait été provoquée par %metiers%" ),
  );
  
  $action_personne_lieu =
  array(
   array( "était né %alieu%", "était née %alieu%" ),
   array( "avait découvert %lieu%", "avait découvert %lieu%" ),
   array( "avait conquis %lieu%", "avait conquis %lieu%" ),
   array( "avait été exilé %alieu%", "avait été exilée %alieu%" ),
  );
  
  $action_lieu =
  array(
   array( "avait une frontière commune avec %lieu2%", "avait une frontière commune avec %lieu2%", "avaient une frontière commune avec %lieu2%"  ),
   array( "avait annexé %lieu2%", "avait annexé %lieu2%", "avaient annexé %lieu2%" ),
   array( "se trouvait à la place de %lieu2%", "se trouvait à la place de %lieu2%", "se trouvaient à la place de %lieu2%" ),
   array( "était peuplé par les habitants de %lieu2%", "était peuplée par les habitants de %lieu2%", "étaient peuplés par les habitants de %lieu2%" ),
   array( "se trouvait sous le niveau de la mer", "se trouvait sous le niveau de la mer", "se trouvaient sous le niveau de la mer" ),
   array( "était inhabitable par l'homme", "était inhabitable par l'homme", "étaient inhabitable par l'homme" ),
   array( "n'avait jamais été découvert", "n'avait jamais été découverte", "n'avaient jamais été découverts" ),
   
   array( "était uniquement peuplé par %metiers%", "était uniquement peuplée par %metiers%", "étaient uniquement peuplés par %metiers%" ),
   array( "était uniquement peuplé par %metiers%", "était uniquement peuplée par %metiers%", "étaient uniquement peuplés par %metiers%" ), // Doublé volontairement
  );
  
  $pe1 = $this->getRandomArrayIndex_NoLast($personne);
  $pe2 = $this->getRandomArrayIndex_After($personne, $pe1);
  $li1 = $this->getRandomArrayIndex($lieu);
  $li2 = $this->getRandomArrayIndexExclusion($lieu, $li1);
  $ev1 = $this->getRandomArrayIndex_NoLast($evenement);
  $ev2 = $this->getRandomArrayIndex_After($evenement, $ev1);

  $inv = $this->getRandomArrayIndex($invention);
  $inv2 = $this->getRandomArrayIndexExclusion($invention, $inv);
  
  $text = "Et si ".$this->getRandomArrayElement($structures)." ?";

  // Les actions en premier
  $text = str_replace("%action_evenement_evenement%", $this->getRandomArrayElement($action_evenement_evenement)[$evenement[$ev1][1]], $text);
  $text = str_replace("%action_personne_personne%", $this->getRandomArrayElement($action_personne_personne)[$personne[$pe1][1]], $text);
  $text = str_replace("%action_personne_evenement%", $this->getRandomArrayElement($action_personne_evenement), $text);
  $text = str_replace("%action_personne_lieu%", $this->getRandomArrayElement($action_personne_lieu)[$personne[$pe1][1]], $text);
  $text = str_replace("%action_personne%", $this->getRandomArrayElement($action_personne)[$personne[$pe1][1]], $text);
  $text = str_replace("%action_invention%", $this->getRandomArrayElement($action_invention)[$invention[$inv][1]], $text);
  $text = str_replace("%action_evenement%", $this->getRandomArrayElement($action_evenement)[$evenement[$ev1][1]], $text);
  $text = str_replace("%action_lieu%", $this->getRandomArrayElement($action_lieu)[$lieu[$li1][2]], $text);
  
  $text = str_replace("%personne%", $personne[$pe1][0], $text);
  $text = str_replace("%personne2%", $personne[$pe2][0], $text);
  
  $text = str_replace("%evenement%", $evenement[$ev1][0], $text);
  $text = str_replace("%evenement2%", $evenement[$ev2][0], $text);

  $text = str_replace("%invention%", $invention[$inv][0], $text);
  $text = str_replace("%invention2%", $invention[$inv2][0], $text);

  $text = str_replace("%date%", $this->getRandomArrayElement($date), $text);
  $text = str_replace("%metier%", $this->getRandomArrayElement($metier)[$personne[$pe1][1]], $text);
  $text = str_replace("%metiers%", $this->getRandomArrayElement($metier)[2], $text);

  $text = str_replace("%lieu%", $lieu[$li1][0], $text);
  $text = str_replace("%lieu2%", $lieu[$li2][0], $text);
  $text = str_replace("%alieu%", $this->getRandomArrayElement($lieu)[1], $text);
  
  $text = str_replace(" à le ", " au ", $text);
  $text = str_replace(" de le ", " du ", $text);
  $text = str_replace(" de les ", " des ", $text);

  $text = str_replace(" de A", " d'A", $text);
  $text = str_replace(" de E", " d'E", $text);
  $text = str_replace(" de I", " d'I", $text);
  $text = str_replace(" de O", " d'O", $text);
  $text = str_replace(" de U", " d'U", $text);
  $text = str_replace(" de Y", " d'Y", $text);
  $text = str_replace(" de a", " d'a", $text);
  $text = str_replace(" de e", " d'e", $text);
  $text = str_replace(" de i", " d'i", $text);
  $text = str_replace(" de o", " d'o", $text);
  $text = str_replace(" de u", " d'u", $text);
  $text = str_replace(" de y", " d'y", $text);

  $text = str_replace(" que A", " qu'A", $text);
  $text = str_replace(" que E", " qu'E", $text);
  $text = str_replace(" que I", " qu'I", $text);
  $text = str_replace(" que O", " qu'O", $text);
  $text = str_replace(" que U", " qu'U", $text);
  $text = str_replace(" que Y", " qu'Y", $text);
  $text = str_replace(" que a", " qu'a", $text);
  $text = str_replace(" que e", " qu'e", $text);
  $text = str_replace(" que i", " qu'i", $text);
  $text = str_replace(" que o", " qu'o", $text);
  $text = str_replace(" que u", " qu'u", $text);
  $text = str_replace(" que y", " qu'y", $text);
  
  return $text;
}

private function getRandomArrayIndex($arr) { return mt_rand(0, count($arr) - 1); }
private function getRandomArrayElement($arr) { return $arr[mt_rand(0, count($arr) - 1)]; }

private function getRandomArrayIndex_NoLast($arr) { return mt_rand(0, count($arr) - 2); }
private function getRandomArrayIndex_After($arr, $initial) { return mt_rand($initial + 1, count($arr) - 1); }

private function getRandomArrayIndexExclusion($arr, $exclu)
{
  $index = 0;
  
  do { $index = $this->getRandomArrayIndex($arr); } while ($index == $exclu);

  return $index;
}
}

?>
