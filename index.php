<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP Avancé - Classes</title>
</head>
<body>
  <?php
  // on va chercher le contenu de la classe
  /*include 'Classes/MyException.php';
  include 'Classes/Polygone.php';
  include 'Classes/Rectangle.php';
  include 'Classes/Carre.php';
  include 'Classes/Deplacement.php';
  include 'Classes/voiture.php';
  include 'Classes/Outils.php';*/
  /* chargement automatique de toutes les classes nécessaires */
  function autoload($className){
    include 'Classes/' . $className . '.php';
  }
  spl_autoload_register('autoload');
  $logs = new Outils\Logs('./logs.txt');
  // instanciation de l'objet
  $r1 = new Polygones\Rectangle(3, 2);
  $r2 = new Polygones\Rectangle(lg:5, ln:4);
  $c1 = new Polygones\Carre(5);
  echo '<p>Surface Carré: ' . $c1->surface() . '</p>'; 
  echo '<p>Périmètre Carré: ' . $c1->perimetre() . '</p>';
  $r1->longueur = 22;
  $r1->largeur= 8;
  // appel des méthodes
  echo '<p>Surface R1: ' . $r1->surface() . '</p>'; 
  echo '<p>Périmètre R1: ' . $r1->perimetre() . '</p>';
  $logs->write('<p>Périmètre R1: ' . $r1->perimetre() . '</p>');
  // affichage des propriétés
  echo '<p>Longueur R1: ' . $r1->longueur . '</p>';
  // destruction de l'objet R1
  // unset($r1);
  echo '<p>Longueur R2: ' . $r2->longueur . '</p>';
  //affichage du premier rectangle
  echo $r1; //appel de toString ou erreur
  var_dump($r1);
  echo '<br>';
  //$r1->largeur = "toto"; non controlé
  print_r($r1);
  echo '<br>';
  var_dump($r2);
  $logs->write(print_r($r2, true));
  echo '<br>';
  echo $r1->trait;
  echo $r1->bidule;
  $r1->trait = 2;
  echo $r1->trait;

  var_dump(isset($r1->largeur));
  //clonage
  $r3 = clone($r2);
  var_dump($r3);
  $r4 = clone($r3);
  var_dump($r4);
  echo $r4->hello(); //héritage de Polygone
  echo $c1->hello(); //héritage de Polygone
  // une méthode statique ne nécessite pas d'instanciation de la classe
  echo '<p>' . Outils\Outils::dateFr('2022-06-20') . '</p>';
  echo '<p>' . Outils\Outils::dateUs('20/06/2022') . '</p>';

  // purement procédural
  include 'fonctions.php';
  echo '<p>' . dateFr2('2022-06-20') . '</p>';
  
  $v1 = new Vehicules\Voiture('Lada', 'Samara', 'bleue', 5);
  $v2 = new Vehicules\Voiture('Tata', 'nano', 'rouge', 3);
  $v3 = new Vehicules\Voiture(nb: 5, ma:'truc', mo:'muche');
  print_r($v3); 
  echo $v1; //appel __toString()
  print_r($v2); //appel __debugInfo()
  $v1->avancer();
  $v1->freiner();

  /* Exceptions */
  echo Outils\Outils::inverse(2);
  try {
    echo Outils\Outils::inverse(0);
  }
  catch(Exceptions\MyException $e){
    echo '<p class="alert alert-danger">MyException ' . $e->getMessage() . '</p>';
  }
  catch(\Exception $e){
    echo '<p class="alert alert-warning">Exception std ' . $e->getMessage() . '</p>';
  }
  finally {
    echo "<p>S'affichera que ça fonctionne ou non</p>";
  }

  //position des caractères
  $chaine = "une souris verte";
  $une = substr($chaine, 0, 3);
  echo $une;
  echo htmlspecialchars($chaine, ENT_COMPAT|ENT_HTML401, 'UTF-8', false);
  echo htmlspecialchars($chaine, double_encode: false);
  $tableau = explode(' ', $chaine);
  $tableau2 = explode(string: $chaine, separator:' ');
  print_r($tableau);
  print_r($tableau2);

  $t = new Outils\Test(n3:2, n2:3, n1:1);
  $t->n1 = 4;
  echo $t->somme();
//*
  $note = 19;
$appreciation = match($note){
    20, 19, 18 => 'Excellent',
    17 ,16, 15 => 'très bien',
    default => 'oups'
  }; //*/
  echo $appreciation;

  /* WEAKMAP */
  echo '<hr>';
  $map = new WeakMap;
  $obj = new stdClass;
  $map[$obj] = 42;
  $map[$t] = '';
  print_r($map);

  unset($obj);
  print_r($map);

  unset($t);
  print_r($map);
  echo '<hr>';

  //retourne la position de souris dans la chaine, null si non trouvé */
  $position = strpos($chaine, 'souris');
  echo 'pos: ' . $position;
  var_dump($position);
  if($position !== false) {
    echo 'trouvé';
  }
  else echo 'non trouvé';

  //vérifie si présent ou non
  var_dump(str_contains($chaine, 'souris'));
  $url = 'https://github.com/Bruno-Tavernier/PHPAvance.git';
  var_dump(str_starts_with($url, 'https://'));
  var_dump(str_ends_with($url, '.git'));
  echo '<hr><pre>';
  echo $logs->read();
  echo '</pre>';
  $logs->write('The End!');
  ?>
</body>
</html>