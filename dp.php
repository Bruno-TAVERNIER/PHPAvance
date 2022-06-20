<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP Avancé - Design Patterns</title>
</head>
<body>
  <?php
  /* chargement automatique de toutes les classes nécessaires */
  function autoload($className){
    include 'Classes/' . $className . '.php';
  }
  spl_autoload_register('autoload');

//singleton pour les accès BDD, fichiers, ...
  $i1 = DesignPatterns\Singleton::getInstance();
  echo '<p>Instance N° ' . $i1->getNumber() . '</p>';
  $i2 = DesignPatterns\Singleton::getInstance();
  echo '<p>Instance N° ' . $i2->getNumber() . '</p>';
  $i3 = DesignPatterns\Singleton::getInstance();
  echo '<p>Instance N° ' . $i3->getNumber() . '</p>';
  $i4 = DesignPatterns\Singleton::getInstance();
  echo '<p>Instance N° ' . $i4->getNumber() . '</p>';

  // Adaptateur ou Factory connexion MySQL -> PGSQL
  try {
    $obj1 = DesignPatterns\Factory::getInstance('DesignPatterns\Factory_')->Fichier1('une souris verte', 'qui courait');
    $obj1->test();
    $obj2 = DesignPatterns\Factory::getInstance('DesignPatterns\Factory_')->Fichier2('une poule sur un mur', 'qui...');
    $obj2->test();
  }
  catch(Exception $e) {
    echo $e->getMessage();
  }

  $f1 = new DesignPatterns\Observateur_Fichier1; //ecrit dans fichier texte
  $f2 = new DesignPatterns\Observateur_Fichier2; //ecrit en BDD
  $obs = new DesignPatterns\Observateur;
  $obs->attach($f1);
  $obs->attach($f2);
  $obs->ecrire('toto');
  $obs->ecrire('Hello World');
  
?>
</body>
</html>