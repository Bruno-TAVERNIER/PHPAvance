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
  include 'Classes/Rectangle.php';
  include 'Classes/Outils.php';
  // instanciation de l'objet
  $r1 = new Rectangle(3, 2);
  $r2 = new Rectangle(5, 4);
  $r1->longueur = 22;
  $r1->largeur= 8;
  // appel des méthodes
  echo '<p>Surface: ' . $r1->surface() . '</p>'; 
  echo '<p>Périmètre: ' . $r1->perimetre() . '</p>';
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

  // une méthode statique ne nécessite pas d'instanciation de la classe
  echo '<p>' . Outils::dateFr('2022-06-20') . '</p>';
  echo '<p>' . Outils::dateUs('20/06/2022') . '</p>';
  ?>
</body>
</html>