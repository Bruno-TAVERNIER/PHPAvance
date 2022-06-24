<?php
session_start(); //toujours en haut
/* C'est MAL !
echo '<p>Nom: '. $_POST['nom'] . '</p>';
echo '<p>Commentaire: ' . $_POST['commentaire'] . '</p>';
*/

// si un ou deux variables
$nom = strip_tags($_POST['nom']); //enlève toutes les balises HTML, JS, PHP, ...< >

// si beaucoup (ou facilité)
$safe = array_map('strip_tags', $_POST); //exécute la fonction sur tous les éléments du tableau
print_r($safe); //plus de XSS possible

//requete vérif login / password

/*$hash = password_hash($mdp, PASSWORD_DEFAULT); // => 64caractères $2$i
if(password_verify($mdp, $hash)) {
  session_regenerate_id(); //PHPSESSIONID
}*/
$mdp = 'Azerty1234';
$hash = password_hash($mdp, PASSWORD_DEFAULT);
echo $hash;

//$mdp = 'a5b3' . $mdp . 'trucmuche'; //salage
