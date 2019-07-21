<?php

class Sloganotron
{
  private $noms = array(
  array("la police", "police", 1),
  array("les patrons", "patrons", 2),
  array("la justice", "justice", 1),
  array("les médias", "médias", 2),
  array("les ouvriers", "ouvriers", 2),
  array("les profs", "professeurs", 2),
  array("les végétariens", "végétariens", 2),
  array("les grévistes", "grévistes", 2),
  array("les élections", "élections", 3),
  array("les politiques", "politiques", 2),
  array("les anarchistes", "anarchistes", 2),
  array("les bourgeois", "bourgeois", 2),
  array("l'état", "état", 0),
  array("l'armée", "armée", 1),
  array("les avocats", "avocats", 2),
  array("les fonctionnaires", "fonctionnaires", 2),
  array("les médecins", "médecins", 2),
  array("les impôts", "impôts", 2),
  array("les syndicats", "syndicats", 2),
  array("les jeunes", "jeunes", 2),
  array("les retraités", "retraités", 2),
  array("les détenus", "détenus", 2),
  array("le capitalisme", "capitalisme", 0),
  array("les traders", "traders", 2),
  array("les précaires", "précaires", 2),
  array("les prisons", "prisons", 3),
  array("les hôpitaux", "hôpitaux", 2),
  array("les lycéens", "lycéens", 2),
  array("le grand capital", "grand capital", 0),

  array("Macron", "Macron", 0),
  array("Sarkozy", "Sarkozy", 0),
  );
  
  private $slogans = array(
  "*NOM* attention",
  "*NOM* démission",
  "*LENOM* *TUES* foutu*ES*",
  "*LENOM* *EST* dans la rue",
  "*LENOM* on *LE* aura",
  "*LENOM* avec nous",
  "Blocage de *LENOM*",
  "*LENOM* *EST* à nous",
  "*NOM* partout, *NOM2* nulle part",
  "*NOM*, *NOM2*, même combat",
  "Ni *NOM*, ni *NOM2*",
  "*NOM* piège à cons",
  "*LENOM* *EST* *LENOM2* de demain",
  "*NOM* aux ordres",
  "*LENOM* on en veut pas",
  "Égalité entre *LENOM* et *LENOM2*",
  "*NOM* fasciste*S*, *NOM2* complice*S2*",
  "*NOM* en grève",
  "*NOM* en colère",
  "Nationalisation de *LENOM*",
  "*LENOM* en prison",
  "Touche pas à *MON* *NOM*",
  "*NOM* dans la misère",
  "*NOM* dans la galère",
  "Pas de *NOM* pas d'opinion",
  "Y'en a marre de *LENOM*",
  "*NOM* précaire*S*",
  "*LENOM* c'est la guerre",
  "Mise à mort de *LENOM*",
  "Réformez *LENOM*",
  "Revalorisation de *LENOM*",
  "A bas *LENOM*",
  "Non à la militarisation de *LENOM*",
  "*NOM* solidaire*S*",
  "Décarbonons *LENOM*",
  "Libérez *LENOM*",
  "*LENOM* *EST* innocent*ES*",
  "Tout le monde déteste *LENOM*",
  "Pas de *NOM*, pas de *NOM2*",
  "*NOM* exploité*ES*",
  );

  private $slogansDebut = array(
    "Eh eh ! oh oh !",
    "Non non non,",
    "Une seule solution,",
    "Cette fois-ci ça suffit,",
    "Exigeons l'impossible :",
    "Sauvez la planète,",
    "Qu'est-ce qu'on veut ?",
  );
  
  private $slogansFin = array(
    "Ou alors ça va péter !",
    "Riposte générale !",
    "Le combat doit continuer !",
    "Tous ensemble ! Tous ensemble !",
    "Augmentez les salaires !",
    "Ce n'est qu'un début !",
  );

  public function generer($formatHTML)
  {
   $texte = "";
   
   $sloganSpecial = 0;
   if (mt_rand(0, 3) == 0)
   {
    if (mt_rand(0, 1) == 0) $sloganSpecial = -1;
    else $sloganSpecial = 1;
   }

   for ($i = 0; $i < 2; $i++)
   {
    $phraseNormale = true;

    if (($sloganSpecial == -1) && ($i == 0))
    {
      $texte .= $this->slogansDebut[mt_rand(0, count($this->slogansDebut) - 1)]."\r\n";
      $phraseNormale = false;
    }
    else if (($sloganSpecial == 1) && ($i == 1))
    {
      $texte .= $this->slogansFin[mt_rand(0, count($this->slogansFin) - 1)];
      $phraseNormale = false;
    }

    if ($phraseNormale)
    {
      $nom = $this->noms[mt_rand(0, count($this->noms) - 1)];
      $phrase = $this->slogans[mt_rand(0, count($this->slogans) - 1)];
      $phrase = str_replace("*NOM*", $nom[1], $phrase);
      $phrase = str_replace("*LENOM*", $nom[0], $phrase);

      $phrase = str_replace("*ES*", array("", "e", "s", "es")[$nom[2]], $phrase);
      $phrase = str_replace("*EST*", array("est", "est", "sont", "sont")[$nom[2]], $phrase);
      $phrase = str_replace("*LE*", array("le", "la", "les", "les")[$nom[2]], $phrase);
      $phrase = str_replace("*MON*", array("mon", "ma", "mes", "mes")[$nom[2]], $phrase);
      $phrase = str_replace("*S*", array("", "", "s", "s")[$nom[2]], $phrase);
      $phrase = str_replace("*TUES*", array("t'es", "t'es", "vous êtes", "vous êtes")[$nom[2]], $phrase);

      $nom2 = $this->noms[mt_rand(0, count($this->noms) - 1)];
      $phrase = str_replace("*NOM2*", $nom2[1], $phrase);
      $phrase = str_replace("*LENOM2*", $nom2[0], $phrase);

      $phrase = str_replace("*ES2*", array("", "e", "s", "es")[$nom2[2]], $phrase);
      $phrase = str_replace("*EST2*", array("est", "est", "sont", "sont")[$nom2[2]], $phrase);
      $phrase = str_replace("*LE2*", array("le", "la", "les", "les")[$nom2[2]], $phrase);
      $phrase = str_replace("*S2*", array("", "", "s", "s")[$nom2[2]], $phrase);
      $phrase = str_replace("*TUES2*", array("t'es", "t'es", "vous êtes", "vous êtes")[$nom2[2]], $phrase);

      $phrase = mb_strtoupper(mb_substr($phrase, 0, 1)).mb_substr($phrase, 1);
      $texte .= $phrase;

      if ($i == 0) $texte .= ",\n"; else $texte .= " !";
    }
   }

    $texte = str_replace(" de a", " d'a", $texte);
    $texte = str_replace(" de é", " d'é", $texte);
    $texte = str_replace(" de o", " d'o", $texte);

    $texte = str_replace(" le a", " l'a", $texte);
    $texte = str_replace(" la a", " l'a", $texte);

    $texte = str_replace(" de le ", " du ", $texte);
    $texte = str_replace(" de les ", " des ", $texte);

    if ($formatHTML)
    {
      $texte = str_replace("\n", "<br />", $texte);
      $texte = str_replace(" !", "&nbsp;!", $texte);
      $texte = str_replace(" ?", "&nbsp;?", $texte);
    }

    return $texte;
  }
}

?>
