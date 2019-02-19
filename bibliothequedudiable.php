<?php

// Pour la version Twitter
function genererLivre_Question()
{
  $paire = recupererPaire(); 

  $phrase = ", notre suggestion de lecture du moment est :\n\n%titre% %deAuteur%";
  
  if ((getdate()["hours"] >= 17) || (getdate()["hours"] < 4)) $phrase = "Bonsoir".$phrase;
  else $phrase = "Bonjour".$phrase;

  $phrase = str_replace("%titre%", $paire[0], $phrase);
  $phrase = str_replace("%deAuteur%", $paire[1], $phrase);
  
  return $phrase;
}

// Pour la version HTML
function genererLivre_MisEnForme()
{
  $paire = recupererPaire(); 
  return "<strong><em>".$paire[0]."</em></strong> ".$paire[1];
}

function recupererPaire()
{

  $paires = array
  (
   array( "" , "d'Alain Finkielkraut" ),
   array( "" , "d'Arthur C. Clarke" ),
   array( "" , "de Jacques Lacan" ),
   array( "" , "de Philippe Muray" ),
   array( "1984," , "de George Orwell" ),
   array( "Ainsi parlait Zarathoustra," , "de Friedrich Nietzsche" ),
   array( "American psycho," , "de Bret Easton Ellis" ),
   array( "Andromaque," , "de Jean Racine" ),
   array( "Au coeur des ténèbres," , "de Joseph Conrad" ),
   array( "Au régal des vermines," , "de Marc-Édouard Nabe" ),
   array( "Aurélia," , "de Gérard de Nerval" ),
   array( "Baise-moi," , "de Virginie Despentes" ),
   array( "Candide," , "de Voltaire" ),
   array( "Carrie," , "de Stephen King" ),
   array( "Cas de folie circulaire," , "de Henri Michaux" ),
   array( "Casino Royale," , "de Ian Fleming" ),
   array( "Cent ans de solitude," , "de Gabriel Garcia Marquez" ),
   array( "Cent mille milliards de poèmes," , "de Raymond Queneau" ),
   array( "Contre Sainte-Beuve," , "de Marcel Proust" ),
   array( "Crime et châtiment," , "de Dostoïevski" ),
   array( "Critique de la raison pure," , "d'Emmanuel Kant" ),
   array( "De l'inconvénient d'être né," , "d'Emil Cioran" ),
   array( "De la discipline chrétienne," , "de Saint Augustin" ),
   array( "De sang-froid," , "de Truman Capote" ),
   array( "Don Quichotte," , "de Cervantes" ),
   array( "Dracula," , "de Bram Stoker" ),
   array( "Du côté de chez Swann," , "" ),
   array( "En attendant Godot," , "de Samuel Beckett" ),
   array( "Éthique à Nicomaque," , "d'Aristote" ),
   array( "Étoiles, garde-à-vous," , "de Robert Heinlein" ),
   array( "Exercices spirituels," , "" ),
   array( "Extension du domaine de la lutte," , "de Michel Houellebecq" ),
   array( "Faust," , "de Goethe" ),
   array( "Fifi Brindacier," , "" ),
   array( "Fight Club," , "de Chuck Palanihuk" ),
   array( "Frankenstein," , "de Mary Shelley" ),
   array( "Féérie pour une autre fois," , "" ),
   array( "Gargantua," , "de François Rabelais" ),
   array( "Génie du christianisme," , "de Chateaubriand" ),
   array( "Germinal," , "d'Émile Zola" ),
   array( "Grandes espérances," , "de Charles Dickens" ),
   array( "Hamlet," , "de William Shakespeare" ),
   array( "Harry Potter," , "de J.K. Rowling" ),
   array( "Histoires extroardinaires," , "d'Edgar Allan Poe" ),
   array( "Huckleberry Finn," , "de Mark Twain" ),
   array( "Impressions et paysages," , "de Federico Garcia Lorca" ),
   array( "J'irai cracher sur vos tombes," , "de Boris Vian" ),
   array( "Jacques le fataliste," , "de Denis Diderot" ),
   array( "Journal d'un gros dégueulasse," , "de Charles Bukowski" ),
   array( "Jurassic park," , "de Michael Crichton" ),
   array( "Justine ou les malheurs de la vertu," , "de Sade" ),
   array( "L'Aleph," , "de Jorge Luis Borgès" ),
   array( "L'Amour au temps du choléra," , "" ),
   array( "L'Anti-Oedipe," , "de Gilles Deleuze" ),
   array( "L'Appel de Cthulhu," , "de H.P. Lovecraft" ),
   array( "L'Art poétique," , "de Boileau" ),
   array( "L'Homme sans qualités," , "de Robert Musil" ),
   array( "L'Homme à la recherche de son âme," , "de C.G. Jung" ),
   array( "L'Insoutenable légerté de l'être," , "de Milan Kundera" ),
   array( "L'Odyssée," , "de Homère" ),
   array( "L'Ombilic des limbes," , "d'Antonin Artaud" ),
   array( "L'Âge d'homme," , "de Michel Leiris" ),
   array( "L'École des femmes," , "de Molière" ),
   array( "L'Éducation sentimentale," , "" ),
   array( "L'Énéide," , "de Virgile" ),
   array( "L'Étranger," , "d'Albert Camus" ),
   array( "La Bibliothèque de Babel," , "" ),
   array( "La Divine comédie," , "de Dante Alighieri" ),
   array( "La Domination masculine," , "de Pierre Bourdieu" ),
   array( "La Faim," , "de Knut Hamsun" ),
   array( "La Ferme des animaux," , "" ),
   array( "La Gloire de mon père," , "de Marcel Pagnol" ),
   array( "La Grande beuverie," , "de René Daumal" ),
   array( "La Montagne magique," , "de Thomas Mann" ),
   array( "La Mort d'Ivan Illitch," , "de Leo Tolstoï" ),
   array( "La Métamorphose," , "de Franz Kafka" ),
   array( "La Nausée," , "" ),
   array( "La Peste," , "" ),
   array( "La Plaisanterie," , "" ),
   array( "La Princesse de Clèves," , "de Madame de Lafayette" ),
   array( "La Psychologie de masse du fascisme," , "de Wilhelm Reich" ),
   array( "La Vénus à la fourrure," , "de Léopold von Sacher-Masoch" ),
   array( "Las Vegas Parano," , "de Hunter Thompson" ),
   array( "Le Banquet," , "de Platon" ),
   array( "Le Bruit et la fureur," , "de William Faulkner" ),
   array( "Le Cauchemar d'Innsmouth," , "" ),
   array( "Le Chevalier au lion," , "de Chrétien de Troyes" ),
   array( "Le Chien des Baskerville," , "d'Arthur Conan Doyle" ),
   array( "Le Cid," , "de Pierre Corneille" ),
   array( "Le Crime de l'Orient-Express," , "d'Agatha Christie" ),
   array( "Le Decameron," , "de Jean Boccace" ),
   array( "Le Deuxième sexe," , "de Simone de Beauvoir" ),
   array( "Le Feu follet," , "de Drieu la Rochelle" ),
   array( "Le Guide du voyageur galactique," , "de Douglas Adams" ),
   array( "Le Horla," , "de Guy de Maupassant" ),
   array( "Le Joueur d'Échecs," , "de Stefan Zweig" ),
   array( "Le Livre de Job," , "" ),
   array( "Le Livre de l'intranquillité," , "de Fernando Pessoa" ),
   array( "Le Livre des oeuvres divines," , "de Hildegarde de Bingen" ),
   array( "Le Maître du Haut Château," , "de Philip K. Dick" ),
   array( "Le Mariage du Ciel et de l'Enfer," , "de William Blake" ),
   array( "Le Meilleur des Mondes," , "d'Aldous Huxley" ),
   array( "Le Nez," , "de Nikolai Gogol" ),
   array( "Le Nom de la rose," , "d'Umberto Eco" ),
   array( "Le Passe-muraille," , "de Marcel Aymé" ),
   array( "Le Petit prince," , "d'Antoine de Saint-Exupéry" ),
   array( "Le Portrait de Dorian Gray," , "d'Oscar Wilde" ),
   array( "Le Procès," , "" ),
   array( "Le Père Goriot," , "de Honoré de Balzac" ),
   array( "Le Roi Lear," , "" ),
   array( "Le Rouge et le noir," , "de Stendhal" ),
   array( "Le Silmarillion," , "de J. R. R. Tolkien" ),
   array( "Le Tambour," , "de Günter Grass" ),
   array( "Le Testament," , "de François Villon" ),
   array( "Le Vieil homme et la mer," , "d'Ernest Hemingway" ),
   array( "Le prophète," , "de Khalil Gibran" ),
   array( "Les Annales du Disque-monde," , "de Terry Pratchett" ),
   array( "Les Cent-vingt journées de Sodome," , "" ),
   array( "Les Chants de Maldoror," , "de Lautréamont" ),
   array( "Les Contes de Cantorbéry," , "de Goeffrey Chaucer" ),
   array( "Les Enquêtes du Père Brown," , "de G.K. Chesterton" ),
   array( "Les Essais" , "de Montaigne" ),
   array( "Les Fables" , "de Jean de la Fontaine" ),
   array( "Les Fleurs du mal," , "de Charles Baudelaire" ),
   array( "Les Frères Karamazov," , "" ),
   array( "Les Gommes," , "d'Alain Robbe-Grillet" ),
   array( "Les Hauts de Hurlevent," , "d'Emily Bronte" ),
   array( "Les Hymnes à la nuit," , "de Novalis" ),
   array( "Les Lettres persanes," , "de Montesquieu" ),
   array( "Les Liaisons dangereuses," , "de Pierre Choderlos de Laclos" ),
   array( "Les Mille et une nuits," , "" ),
   array( "Les Moins de seize ans," , "de Gabriel Matzneff" ),
   array( "Les Mots," , "de Jean-Paul Sartre" ),
   array( "Les Mémoires d'Hadrien," , "de Marguerite Yourcenar" ),
   array( "Les Métamorphoses," , "d'Ovide" ),
   array( "Les Nourritures terrestres," , "d'André Gide" ),
   array( "Les Onze mille verges," , "de Guillaume Apollinaire" ),
   array( "Les Oraisons funèbres," , "de Bossuet" ),
   array( "Les Rêveries du promeneur solitaire," , "de Jean-Jacques Rousseau" ),
   array( "Les Versets sataniques," , "de Salman Rushdie" ),
   array( "Les Voyages de Gulliver," , "de Jonathan Swift" ),
   array( "Lettre au père," , "" ),
   array( "Lettre sur les aveugles," , "" ),
   array( "Lolita," , "de Vladimir Nabokov" ),
   array( "Madame Bovary," , "de Gustave Flaubert" ),
   array( "Manifeste du parti communiste," , "de Karl Marx" ),
   array( "Mars," , "de Fritz Zorn" ),
   array( "Moby Dick," , "de Herman Melville" ),
   array( "Molloy," , "" ),
   array( "Mrs Dalloway," , "de Virginia Woolf" ),
   array( "Médée," , "d'Euripide" ),
   array( "Mémoires d'outre-tombe," , "" ),
   array( "Nadja," , "d'André Breton" ),
   array( "Oedipe roi," , "de Sophocle" ),
   array( "Orgueil et préjugés," , "de Jane Austen" ),
   array( "Othello," , "" ),
   array( "Petits poèmes en prose," , "" ),
   array( "Pour en finir avec le jugement de Dieu," , "" ),
   array( "Psychopathologie de la vie quotidienne," , "de Sigmund Freud" ),
   array( "Surveiller et punir," , "de Michel Foucault" ),
   array( "Tractatus logico-philosophicus," , "de Ludwig Wittgenstein" ),
   array( "Traité d'Athéologie," , "de Michel Onfray" ),
   array( "Ubu roi," , "d'Alfred Jarry" ),
   array( "Ulysse," , "de James Joyce" ),
   array( "Une maison de poupée," , "de Henrik Ibsen" ),
   array( "Une saison en enfer," , "d'Arthur Rimbaud" ),
   array( "Vingt mille lieues sous les mers," , "de Jules Verne" ),
   array( "Voyage au bout de la nuit," , "de Louis-Ferdinand Céline" ),
   array( "Zorba le grec," , "" ),
  );

  $p1 = "";
  $p2 = "";
  
  // Certains auteurs n'ont pas de livre (leur nom peut donner des résultats amusants mais pas le titre de leurs oeuvres)
  do { $p1 = getRandomArrayIndex($paires); } while (strcmp($paires[$p1][0], "") == 0);
  
  // Certains livres n'ont pas d'auteur (oeuvres anonymes, auteurs de plusieurs livres notés une seule fois pour éviter qu'ils soient "sur-représentés")
  // Certains auteurs ont plusieurs livres, faire attention de ne pas attribuer par accident un livre au bon auteur
  do { $p2 = getRandomArrayIndexExclusion($paires); }
  while ((strcmp($paires[$p2][1], "") == 0) || (strcmp($paires[$p1][1], $paires[$p2][1]) == 0));

  return array( $paires[$p1][0], $paires[$p2][1] );
}

function getRandomArrayElement($arr) { return $arr[mt_rand(0, count($arr) - 1)]; }
function getRandomArrayIndex($arr) { return mt_rand(0, count($arr) - 1); }
function getRandomArrayIndexExclusion($arr, $exclu = -1)
{
  $index = 0;
  
  do { $index = getRandomArrayIndex($arr); } while ($index == $exclu);

  return $index;
}

?>
