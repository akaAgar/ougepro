<?php

class MandelaBot
{
 private $arr_actions = array(
  array("a changé de sexe", ""),
  array("a chanté une chanson de %sujet_chanson%", "chanson"),
  array("a été accusé€ de frapper %safemme%", ""),
  array("a trompé %safemme% avec %unefille% de %age_adulte% ans", ""),
  array("a dit ce truc super raciste pendant une interview", ""),
  array("a frappé %sujet%",""),
  array("a gagné le prix Goncourt", "livre"),
  array("a participé à une émission de télé-réalité", ""),
  array("a gagné l'Eurovision", "chanson"),
  array("a essayé de se suicider", ""),
  array("a passé la nuit en garde à vue", ""),
  array("a fait une grève de la faim","politique"),
  array("s'est déguisé€ en personnage de dessin animé", ""),
  array("a avoué être alcoolique", ""),
  array("a pleuré pendant un discours de %sujet_politique%", ""),
  array("a raconté qu'%il% avait été sans-abri", ""),
  array("a avoué qu'%il% avait abandonné son enfant handicapé", ""),
  array("a été condamné€ et envoyé€ en prison", ""),
  array("a raconté la fois où %il% s'était déguisé€ en nazi", ""),
  array("s'est présenté€ à la présidentielle", "politique"),
  array("a tourné dans une publicité de la SPA", ""),
  array("a participé à une émission de %sujet_tele%", ""),
  array("a failli mourir pendant une opération chirurgicale", ""),
  array("a claqué la porte du gouvernement", "politique"),
  array("a roté en direct à la télévision", ""),
  array("a eu un grave accident de voiture", ""),
  array("a participé au Paris-Dakar", ""),
  array("a fait un malaise", ""),
  array("a traité les Français de crétins", "politique"),
  array("a été accusé€ d'avoir plagié %sujet_livre%", "livre"),
  array("a reproché à %sujet_chanson% de lui avoir tout piqué", "chanson"),
  array("a parlé de sa vie sexuelle sur le plateau de %sujet_tele%", ""),
  array("a gagné au Loto", ""),
  array("a été accusé d'homophobie par Act Up", ""),
  array("a présenté cette émission télé très bizarre qui n'a duré qu'un épisode", "tele"),
  array("s'est mis€ torse nu à l'Assemblée Nationale", "politique"),
  array("a été retrouvé€ par les flics complètement paumé€ au milieu de la rue", ""),
  array("a chassé un invité de son plateau", "tele"),
  array("a participé à Fort Boyard", ""),
  array("a annoncé qu'%il% mettait fin à sa carrière", ""),
  array("a reconnu publiquement qu'%il% avait un cancer", ""),
  array("a raconté qu'%il% avait déterré un cadavre quand %il% était ado", ""),
  array("a avoué qu'%il% se droguait", ""),
  array("était devenu€ obèse à cause d'une maladie", ""),
  array("a parlé de sa dépression", ""),
  array("a accusé %sujet% de lui avoir volé de l'argent", ""),
  array("a cassé une assiette sur la tête d'un journaliste", ""),
  array("s'est fait tirer dessus par un fou", ""),
  array("a été harcelé€ devant chez %lui% par un malade", ""),
  array("a raconté que %sujet_sexe_autre% lui avait piqué %safemme%", ""),
  array("a participé à cette émission avec cette musique bizarre", ""),
  array("a sorti cette chanson qui a été interdite par le CSA", "chanson"),
  array("a dit des trucs super flippants au journal télé", ""),
  array("s'est fait insulter par %sujet% pendant Nulle Part Ailleurs", ""),
  array("a fait cette opération de chirurgie esthétique", ""),
  array("a fait une énorme faute de français pendant une interview", ""),
  array("a sorti ce film où il y avait des scènes porno", "cinema"),
  array("s'est cassé la jambe pendant une finale", "sport"),
  array("a été surpris€ à poil avec %unefille%", ""),
  array("a chanté en duo avec %sujet_chanson%", "chanson"),
  array("s'est mis a faire de la muscu et a doublé de volume", ""),
  array("a voulu se lancer dans la chanson avec ce single pourri", ""),
  array("a sorti une sextape", ""),
  array("a été pris€ en photo avec un gros joint à la main", ""),
  array("a fait son coming-out dans une émission de %sujet_tele%", ""),
  array("s'est attaché€ à un arbre pour protester contre une loi", "politique"),
  array("a fait un caméo dans un film chelou avec %sujet_cinema%", ""),
  array("a joué dans cette pub pour des bonbons très bizarres", "tele,cinema,chanson"),
  array("s'était mis à porter des shorts Adidas super courts", "sport"),
  array("a été sponsorisé€ par une marque liée à la mafia russe", "sport"),
  array("a invité dans son emission %unefille% qui avait sorti un couteau", "tele"),
  array("a avoué sa liaison avec %sujet_sexe_autre%", ""),
  array("est arrivé€ complètement bourré€ sur le plateau de %sujet_tele%", ""),
  array("a fait publier dans Paris Match une photo super flippante de sa famille", ""),
  array("a sorti son album de photos à collectionner", "tele,cinema,chanson,sport"),
 );

  private $arr_intro1 = array(
   "te souviens de ",
   "te rappelles ",
 );

  private $arr_intro2 = array(
   "le jour où ",
   "la fois où ",
   "ce jour où ",
   "cette fois où ",
   "quand ",
 );

  private $arr_outro = array(
  "il pleuvait",
  "c'était pendant les vacances scolaires",
  "c'était en été",
  "c'était à la rentrée",
  "c'était juste avant les grandes vacances",
  "je devais avoir %age% ans",
  "c'était vers Noël",
  "il neigeait",
  "tout le monde avait dit qu'%il% était foutu€",
  "les gens étaient fous",
  "ça avait fait scandale",
  "ils en avaient parlé au 20h",
  "tout le monde en parlait",
  "on en parlait au collège",
  "il y avait une rumeur",
  "on s'était moqué de %lui%",
  "il y avait eu une pétition",
  "mes parents m'avaient raconté cette histoire",
  "j'avais fait des cauchemars",
  "c'était en %annee%",
  "personne osait en parler",
  "il y avait eu une édition spéciale sur TF1",
  "les profs voulaient pas qu'on en parle",
  "ça avait fait peur à tout le monde à l'école",
  "personne voulait y croire",
  "je sais plus si c'était vrai"
  );

 private $arr_sujets = array(
  array("Alain Chabat", 0, "tele,cinema"),
  array("Alain Delon", 0, "cinema"),
  array("Alain Prost", 0, "sport"),
  array("Alain Souchon", 0, "chanson"),
  array("Antoine de Caunes", 0, "tele,cinema"),
  array("Arlette Laguiller", 1, "politique"),
  array("Béatrice Dalle", 1, "cinema,chanson"),
  array("Bernard Minet", 0, "chanson"),
  array("Bernard Pivot", 0, "tele,livre"),
  array("Bernard Tapie", 0, "chanson,cinema,politique"),
  array("Bill Clinton", 0, "politique"),
  array("Bill Cosby", 0, "cinema"),
  array("Boris Elstine", 0, "politique"),
  array("Caroline Loeb", 1, "chanson"),
  array("Catherine Deneuve", 1, "cinema"),
  array("Cauet", 0, "tele"),
  array("Chantal Goya", 1, "tele"),
  array("Charles Pasqua", 0, "politique"),
  array("Coluche", 0, "cinema"),
  array("Corbier", 0, "chanson"),
  array("Dalida", 1, "chanson"),
  array("Daniel Cohn-Bendit", 0, "politique"),
  array("Dorothée", 1, "tele"),
  array("François Mitterand", 0, "politique"),
  array("Georges Marchais", 0, "politique"),
  array("Isabelle Adjani", 1, "cinema"),
  array("Jacques Brel", 0, "chanson,cinema"),
  array("Jacques Chirac", 0, "politique"),
  array("Jacques Delors", 0, "politique"),
  array("Jacques Martin", 0, "tele"),
  array("Jacques Pradel", 0, "tele"),
  array("Jean Gabin", 0, "cinema"),
  array("Jean Yanne", 0, "cinema"),
  array("Jean-Claude Van Damme", 0, "cinema"),
  array("Jean-Louis Aubert", 0, "chanson"),
  array("Jean-Paul Belmondo", 0, "cinema"),
  array("Jean-Pierre Cassel", 0, "cinema"),
  array("Jean-Pierre Chevènement", 0, "politique"),
  array("JoeyStarr", 0, "chanson,cinema"),
  array("Johnny Hallyday", 0, "chanson,cinema"),
  array("José Bové", 0, "politique"),
  array("Kurt Cobain", 0, "chanson"),
  array("Laurent Fabius", 0, "politique"),
  array("Laure Manaudou", 1, "sport"),
  array("Lionel Jospin", 0, "politique"),
  array("Loana", 1, ""),
  array("Louis de Funès", 0, "cinema"),
  array("Martine Aubry", 0, "politique"),
  array("MC Solaar", 0, "chanson"),
  array("Michael Jackson", 0, "chanson,cinema"),
  array("Michael Jordan", 0, "sport,cinema"),
  array("Michel Drucker", 0, "tele"),
  array("Michel Rocard", 0, "politique"),
  array("Michel Serrault", 0, "cinema"),
  array("Mimie Mathy", 1, "cinema"),
  array("Mireille Dumas", 1, "tele"),
  array("Nelson Mandela", 0, "politique"),
  array("Olivier Minne", 0, "tele"),
  array("Ophélie Winter", 1, "chanson"),
  array("Pamela Anderson", 1, "cinema"),
  array("Passe-partout", 0, ""),
  array("Patrick Dewaere", 0, "cinema"),
  array("Patrick Hernandez", 0, "chanson"),
  array("Patrick Poivre d'Arvor", 0, "livre,tele"),
  array("Patrick Sebastien", 0, "chanson,cinema,tele"),
  array("Philippe Gildas", 0, "tele"),
  array("Pierre Arditi", 0, "cinema"),
  array("Pierre Bérégovoy", 0, "politique"),
  array("Pierre Desproges", 0, "livre"),
  array("Prince", 0, "chanson"),
  array("Robert Badinter", 0, "politique"),
  array("Ségolène Royal", 1, "politique"),
  array("Serge Gainsbourg", 0, "chanson"),
  array("Simone Signoret", 1, "cinema"),
  array("Simone Veil", 1, "politique"),
  array("Steevy Boulay", 0, ""),
  array("Stéphane Collaro", 0, "chanson,cinema"),
  array("Thierry Ardisson", 0, "tele"),
  array("Vanessa Demouy", 1, "cinema"),
  array("Yannick Noah", 0, "sport,chanson"),
  array("Yves Montand", 0, "cinema"),
  array("Zidane", 0, "sport"),
  array("l'Abbé Pierre", 0, "politique"),
  array("le pape Jean-Paul II", 0, "politique,livre"),
 );

 private function choisirSujet($flags, $interdit = null)
 {
  $sujet = null;
  $f_requis = explode(',', $flags);

  do
  {
   // Pas de flags, en prendre un au hasard
   if ((count($f_requis) == 1) && ($f_requis[0] === ""))
    $sujet = $this->randArray($this->arr_sujets);
   else
   {
    $sujet = $this->randArray($this->arr_sujets);

    if (!$this->inArrayAtLeastOne(explode(',', $sujet[2]), $f_requis))
     continue;
   }

   if ($interdit !== null)
   {
    // On est tombé sur le sujet interdit, en prendre un autre
    if ($sujet[0] === $interdit) continue;
   }

   break;
  } while (true);

  return $sujet;
 }

 private function choisirSujetParSexe($sexeID)
 {
  do
  {
   $sujet = $this->randArray($this->arr_sujets);

   if ($sujet[1] === $sexeID) return $sujet;
  } while (true);
 }

 private function inArrayAtLeastOne($haystack, $needles)
 {
  foreach ($needles as $n)
  {
   if (in_array($n, $haystack)) return true;
  }

  return false;
 }

 private function randArray($arr)
 { return $arr[mt_rand(0, count($arr) - 1)]; }

public function generer($formatTweet)
{
 $action = $this->randArray($this->arr_actions);
 $sujet = $this->choisirSujet($action[1]);
 
 $texte = $this->randArray($this->arr_intro1);
 $texte .= $this->randArray($this->arr_intro2);
 $texte .= $sujet[0]." ".$action[0];

 if (mt_rand(0, 1) == 0) // une chance sur 2 d'avoir une outro
  $texte .= ", ".$this->randArray($this->arr_outro);

 // Sujets supplémentaires (utilisés comme compléments)
 $texte = str_replace("%sujet%", $this->choisirSujet("", $sujet[0])[0], $texte);
 $texte = str_replace("%sujet_chanson%", $this->choisirSujet("chanson", $sujet[0])[0], $texte);
 $texte = str_replace("%sujet_cinema%", $this->choisirSujet("cinema", $sujet[0])[0], $texte);
 $texte = str_replace("%sujet_livre%", $this->choisirSujet("livre", $sujet[0])[0], $texte);
 $texte = str_replace("%sujet_politique%", $this->choisirSujet("politique", $sujet[0])[0], $texte);
 $texte = str_replace("%sujet_tele%", $this->choisirSujet("tele", $sujet[0])[0], $texte);
 
 $texte = str_replace("%sujet_sexe_meme%", $this->choisirSujetParSexe($sujet[1])[0], $texte);
 $texte = str_replace("%sujet_sexe_autre%", $this->choisirSujetParSexe(1 - $sujet[1])[0], $texte);

  // Accords féminin/masculin
  if ($sujet[1] == 1)
  {
   $texte = str_replace("€", "e", $texte);
   $texte = str_replace("%safemme%", "son mari", $texte);
   $texte = str_replace("%unefille%", "un mec", $texte);
   $texte = str_replace("%il%", "elle", $texte);
   $texte = str_replace("%lui%", "elle", $texte);
  }
  else
  {
   $texte = str_replace("€", "", $texte);
   $texte = str_replace("%safemme%", "sa femme", $texte);
   $texte = str_replace("%unefille%", "une fille", $texte);
   $texte = str_replace("%il%", "il", $texte);
   $texte = str_replace("%lui%", "lui", $texte);
  }

  // Nombres
  $texte = str_replace("%age%", strval(mt_rand(7,16)), $texte);
  $texte = str_replace("%age_adulte%", strval(mt_rand(18,28)), $texte);
  $texte = str_replace("%annee%", strval(mt_rand(1985,1998)), $texte);

  // Ajustements grammaticaux divers
  $texte = str_replace(" souviens de quand ", " rappelles quand ", $texte);
  $texte = str_replace(" de le ", " du ", $texte);
  $texte = str_replace(" de e", " d'e", $texte);
  $texte = str_replace(" de A", " d'A", $texte);
  $texte = str_replace(" de E", " d'E", $texte);
  $texte = str_replace(" de I", " d'I", $texte);
  $texte = str_replace(" de O", " d'O", $texte);
  $texte = str_replace(" de U", " d'U  ", $texte);
  $texte = str_replace(" que i", " qu'i", $texte);
  $texte = str_replace(" que o", " qu'o", $texte);
 
 if ($formatTweet) $texte = "RT si tu ".$texte.".";
 else $texte = "Tu ".$texte."&nbsp;?";

  return $texte;
}
}

?>