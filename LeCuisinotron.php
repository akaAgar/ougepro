<?php

class Cuisinotron
{
  private $ingredients = array();

  private $libPrep0 = array(
"Préparez %s",
"Rincez %s",
"Lavez %s à l'eau froide",
"Laissez %s refroidir complétement",
"Laissez gonfler %s",
"Évidez %s",
"Séchez %s",
"Panez %s",
"Flambez %s",
"Épluchez %s",
"Hachez %s",
"Coupez %s",
"Écrasez %s",
"Faites dorer %s",
"Faites revenir %s dans l'huile d'olive",
"Frottez %s avec un citron",
"Mixez %s",
"Pelez %s",
"Couper %s et retirer la partie inférieure",
"Déposez %s dans un grand plat",
"Piquez %s à la fourchette",
"Faites cuire %s séparément",
"Faites bouillir %s",
"Étalez %s avec un rouleau à pâtisserie",
"Faites fondre %s",
"Montez %s en neige",
"Tapissez un moule avec %s",
"Égouttez %s",
"Faites des boulettes avec %s",
"Découpez %s en tranches fines",
"Découpez %s en cubes",
"Préchauffez le four à %TEMPERATURE%°",
"Beurrez une poêle",
"Attendrissez %s",
"Faites chauffer %s dans une grande casserole",
"Émiettez %s à la fourchette",
"Désossez %s",
"Émincez %s",
"Marinez %s dans le vinaigre",
"Placez %s dans du papier alu",
"Pelez %s",
"Pétrir %s",
"Rôtir %s",
"Couvrez %s avec un linge",
"Assaisonner %s",
"Diluez %s avec de l’eau",
"Réduisez %s en purée",
"Huilez %s" );

  private $libPrep = array(
"Fourrez %s1 avec %s2",
"Couvrez %s1 avec %s2",
"Dispersez %s1 dans %s2",
"Badigeonnez %s1 avec %s2",
"Faites chauffer %s1 dans %s2",
"Arrosez régulièrement %s1 avec %s2",
"Ajoutez %s1 dans %s2 à intervalle régulier",
"Ajoutez %s1 dans %s2",
"Mélangez %s1 avec %s2",
"Mettez %s1 et %s2 dans un plat",
"Décorez %s1 avec %s2",
"Jetez %s1 sur %s2",
"Faites fondre %s1 avec %s2",
"Ramollissez %s1 en ajoutant %s2",
"Laissez %s1 absorber %s2",
"Versez %s1 sur %s2",
"Creusez un puits dans %s1 et versez-y %s2",
"Mélangez %s1 et %s2 avec un fouet",
"Incorporez %s1 dans %s2" );
  
  private $libPrepPlus = array(
"jusqu'à obtenir une mousse",
"afin d'obtenir un mélange homogène",
"puis passez le tout au mixeur",
"sans cesser de remuer",
"jusqu'à légère coloration",
"jusqu'à ce que le mélange devienne jaune",
"et chauffez le mélange au micro-ondes",
"puis faites les cuire dans leur jus" );

  private $libPrepC = array(
"Faites cuire à %TEMPERATURE%°",
"Mettez au réfrigérateur",
"Faites cuire à feu doux",
"Malaxez à la main",
"Mélangez dans un saladier",
"Grillez au barbecue",
"Laissez reposer",
"Le mélange va gonfler à la cuisson",
"Faites cuire au bain-marie",
"Faites cuire à la cocotte-minute" );

  private $libPrepF = array(
"C'est prêt !",
"Bon appétit !",
"Régalez-vous !",
"Démoulez et servez",
"Vos invités vont se régaler !",
"Servez tiède",
"Placez le tout dans un pain pita",
"Salez et poivrez le mélange",
"Démoulez dans un grand plat",
"N'hésitez pas à accompagner de fromage",
"Accompagnez d'une bonne salade",
"Voilà une excellente entrée d'été !",
"Votre dessert est prêt !",
"Vos enfants seront ravis !",
"Servez très chaud",
"Servez bien chaud, avec de la sauce",
"Arrosez d’huile d’olive et parsemez d’origan",
"Servez avec un bon Bordeaux",
"À déguster avec un bon vin blanc" );

 public function __construct()
 {
array_push($this->ingredients, array(strval(mt_rand(2, 8)) . " plaquettes de chocolat noir", "le chocholat" ));
array_push($this->ingredients, array(strval(mt_rand(2, 4)) . " pâtes brisées", "la pâte brisée" ));
array_push($this->ingredients, array(strval(mt_rand(2, 4)) . " travers de porc", "les travers" ));
array_push($this->ingredients, array(strval(mt_rand(2, 8)) . " cubes de bouillon de volaille", "le bouillon" ));
array_push($this->ingredients, array(strval(mt_rand(1, 20) * 25) . "g de cresson", "le cresson" ));
array_push($this->ingredients, array(strval(mt_rand(1, 20) * 25) . "g d'amandes effilées", "les amandes" ));
array_push($this->ingredients, array(strval(mt_rand(2, 8)) . " pilons de poulet", "les pilons" ));
array_push($this->ingredients, array(strval(mt_rand(2, 8)) . " cailles", "les cailles" ));
array_push($this->ingredients, array(strval(mt_rand(2, 8) * 2) . " pruneaux", "les pruneaux" ));
array_push($this->ingredients, array(strval(mt_rand(2, 8) * 2) . " olives noires", "les olives" ));
array_push($this->ingredients, array(strval(mt_rand(2, 8) * 2) . " portions de Vache qui rit", "la Vache qui rit" ));
array_push($this->ingredients, array(strval(mt_rand(1, 20) * 50) . "g de sucre glace", "le sucre glace" ));
array_push($this->ingredients, array(strval(mt_rand(1, 20) * 50) . "g de beurre", "le beurre" ));
array_push($this->ingredients, array(strval(mt_rand(1, 20) * 50) . "g de petits pois", "les petits pois" ));
array_push($this->ingredients, array(strval(mt_rand(2, 8) * 2) . " billes de mozzarella", "la mozzarella" ));
array_push($this->ingredients, array(strval(mt_rand(1, 9) * 10) . "cl de lait", "le lait" ));
array_push($this->ingredients, array(strval(mt_rand(1, 9) * 10) . "cl de porto", "le porto" ));
array_push($this->ingredients, array(strval(mt_rand(1, 9) * 10) . "cl de crème fraiche", "la crème" ));
array_push($this->ingredients, array(strval(mt_rand(2, 8)) . " gambas", "les gambas" ));
array_push($this->ingredients, array(strval(mt_rand(2, 8)) . " échalotes", "les échalotes" ));
array_push($this->ingredients, array(strval(mt_rand(2, 8)) . " tomates fermes", "les tomates" ));
array_push($this->ingredients, array(strval(mt_rand(2, 8)) . " citrons", "les citrons" ));
array_push($this->ingredients, array(strval(mt_rand(2, 8)) . " pommes", "les pommes" ));
array_push($this->ingredients, array(strval(mt_rand(2, 8)) . " bottes de menthe", "la menthe" ));
array_push($this->ingredients, array(strval(mt_rand(2, 8)) . " poires", "les poires" ));
array_push($this->ingredients, array(strval(mt_rand(2, 8)) . " artichauts", "les artichauts" ));
array_push($this->ingredients, array(strval(mt_rand(2, 8)) . " yaourts nature", "les yaourts" ));
array_push($this->ingredients, array(strval(mt_rand(2, 8)) . " nectarines", "les nectarines" ));
array_push($this->ingredients, array(strval(mt_rand(2, 8)) . " bananes", "les bananes" ));
array_push($this->ingredients, array(strval(mt_rand(2, 8)) . " fruits de mer", "les fruits de mer" ));
array_push($this->ingredients, array(strval(mt_rand(2, 8)) . " oignons", "les oignons" ));
array_push($this->ingredients, array(strval(mt_rand(1, 20) * 50) . "g de farine", "la farine" ));
array_push($this->ingredients, array(strval(mt_rand(2, 8)) . " filets de rouget", "les filets" ));
array_push($this->ingredients, array(strval(mt_rand(2, 8)) . " grandes figues", "les figues" ));
array_push($this->ingredients, array(strval(mt_rand(2, 8)) . " biscottes", "les biscottes" ));
array_push($this->ingredients, array(strval(mt_rand(2, 8)) . " piments rouges", "les piments" ));
array_push($this->ingredients, array(strval(mt_rand(1, 20) * 50) . "g de Nutella", "le Nutella" ));
array_push($this->ingredients, array(strval(mt_rand(1, 20) * 50) . "g de roquefort", "le roquefort" ));
array_push($this->ingredients, array(strval(mt_rand(1, 20) * 50) . "g de feta", "la feta" ));
array_push($this->ingredients, array(strval(mt_rand(1, 20) * 100) . "g de poisson blanc", "le poisson" ));
array_push($this->ingredients, array(strval(mt_rand(1, 20) * 100) . "g de thon", "le thon" ));
array_push($this->ingredients, array(strval(mt_rand(1, 20) * 100) . "g de curry", "le curry" ));
array_push($this->ingredients, array(strval(mt_rand(1, 20) * 100) . "g de viande de boeuf", "le boeuf" ));
array_push($this->ingredients, array(strval(mt_rand(1, 20) * 100) . "g de viande hachée", "la viande hachée" ));
array_push($this->ingredients, array(strval(mt_rand(1, 20) * 100) . "g de langue de boeuf", "la langue" ));
array_push($this->ingredients, array(strval(mt_rand(1, 20) * 100) . "g d'abats", "les abats" ));
array_push($this->ingredients, array(strval(mt_rand(1, 20) * 50) . "g de crème de marrons", "la crème de marrons" ));
array_push($this->ingredients, array(strval(mt_rand(1, 20) * 50) . "g de foie de veau", "le foie" ));
array_push($this->ingredients, array(strval(mt_rand(1, 20) * 100) . "g de rôti de porc", "le rôti" ));
array_push($this->ingredients, array(strval(mt_rand(2, 10)) . " cuillères à soupe de mayonnaise", "la mayonnaise" ));
array_push($this->ingredients, array(strval(mt_rand(2, 10)) . " cuillères à soupe de moutarde", "la moutarde" ));
array_push($this->ingredients, array(strval(mt_rand(1, 4) * 6) . " escargots de bourgogne", "les escargots" ));
array_push($this->ingredients, array(strval(mt_rand(2, 4)) . " boîtes d'abricots au sirop", "les abricots" ));
array_push($this->ingredients, array(strval(mt_rand(2, 4)) . " bacs de glace vanille-caramel", "la glace" ));
array_push($this->ingredients, array(strval(mt_rand(2, 8) * 6) . " champignons de Paris", "les champignons" ));
array_push($this->ingredients, array(strval(mt_rand(2, 4)) . " baguettes", "les baguettes" ));
array_push($this->ingredients, array(strval(mt_rand(1, 20) * 50) . "g de miel liquide", "le miel" ));
array_push($this->ingredients, array(strval(mt_rand(1, 20) * 50) . "g de Chocapic", "les Chocapic" ));
array_push($this->ingredients, array(strval(mt_rand(1, 20) * 50) . "g de spaghettis", "les spaghettis" ));
array_push($this->ingredients, array(strval(mt_rand(1, 20) * 50) . "g de compote de pêches", "la compote" ));
array_push($this->ingredients, array(strval(mt_rand(1, 20) * 50) . "g de pois chiches", "les pois chiches" ));
array_push($this->ingredients, array(strval(mt_rand(2, 8)) . " poignées de roquette", "la roquette" ));
array_push($this->ingredients, array(strval(mt_rand(2, 8)) . " tranches de jambon blanc", "le jambon" ));
array_push($this->ingredients, array(strval(mt_rand(2, 8)) . " oeufs de belle taille", "les oeufs" ));
array_push($this->ingredients, array(strval(mt_rand(2, 8)) . " gousses d'ail", "l'ail" ));
array_push($this->ingredients, array(strval(mt_rand(2, 8)) . " merguez", "les merguez" ));
array_push($this->ingredients, array(strval(mt_rand(2, 8)) . " petits Lu", "les petits Lu" ));
array_push($this->ingredients, array(strval(mt_rand(2, 8)) . " endives", "les endives" ));
array_push($this->ingredients, array(strval(mt_rand(2, 8)) . " sardines", "les sardines" ));
array_push($this->ingredients, array(strval(mt_rand(2, 8)) . " tranches de lard", "le lard" ));
array_push($this->ingredients, array(strval(mt_rand(1, 20) * 50) . "g d'anchois", "les anchois" ));
array_push($this->ingredients, array(strval(mt_rand(1, 20) * 50) . "g de marshmallows", "les marshmallows" ));
array_push($this->ingredients, array(strval(mt_rand(1, 20) * 50) . "g de morilles", "les morilles" ));
array_push($this->ingredients, array(strval(mt_rand(1, 20) * 50) . "g de biscuits cuiller", "les biscuits cuiller" ));
}
 

public function generer()
{
  $texte = "INGRÉDIENTS\n";
  
  $ingCount = mt_rand(2, 3);
  $selIngr = array();

  for ($i = 0; $i < $ingCount; $i++)
  {
   $ingrIndex = $this->getRandomArrayIndexExclusions($this->ingredients, $selIngr);
   array_push($selIngr, $ingrIndex);
   $texte .= "– ". $this->ingredients[$ingrIndex][0] . "\n";
  }

  $texte .= "\nPRÉPARATION\n";

  $prepCount = min(mt_rand(2, 3), $ingCount);
  for ($i = 0; $i < $prepCount; $i++)
  {
    $instruction = $this->getRandomArrayElement($this->libPrep0);
    $instruction = str_replace("%s", $this->ingredients[$selIngr[$i]][1], $instruction);
    $instruction = str_replace("%TEMPERATURE%", strval(180 + mt_rand(0, 3) * 20), $instruction);

    $texte .= "– " . $instruction . "\n";
  }

  $prepCount = min(mt_rand(1, 3), $ingCount - 1);
  for ($i = 0; $i < $prepCount; $i++)
  {
    $instruction = $this->getRandomArrayElement($this->libPrep);
    $instruction = str_replace("%s1", $this->ingredients[$selIngr[$i]][1], $instruction);
    $instruction = str_replace("%s2", $this->ingredients[$selIngr[$i + 1]][1], $instruction);
    $instruction = str_replace("%TEMPERATURE%", strval(180 + mt_rand(0, 3) * 20), $instruction);

	if (mt_rand(0, 2) == 0)
		$instruction .= " " . $this->getRandomArrayElement($this->libPrepPlus);
	
    $texte .= "– " . $instruction . "\n";
  }

  $texte .= "– " . str_replace("%TEMPERATURE%", strval(180 + mt_rand(0, 3) * 20), $this->getRandomArrayElement($this->libPrepC) . " pendant " . strval(5 * mt_rand(2, 18)) . " minutes\n");
  if (mt_rand(0, 1) == 0) $texte .= "– " . $this->getRandomArrayElement($this->libPrepF);

  //return $texte . "\n\n".mb_strlen($texte);
  return $texte;
}

private function getRandomArrayElement($arr) { return $arr[mt_rand(0, count($arr) - 1)]; }

private function getRandomArrayIndexExclusions($arr, $excluArr)
{
  $index = 0;
  
  do
  {
   $index = mt_rand(0, count($arr) - 1);
  } while (in_array($index, $excluArr));

  return $index;
}

}

?>
