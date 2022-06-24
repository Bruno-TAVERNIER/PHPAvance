<?php
// créer un cookie d'une durée de vie d'une heure (RGPD => maxi 13 mois)
setcookie('nom', 'valeur', time() + 3600 );
// cookie securisé => non accessible en JS => HTTPS obligatoire
// let's encrypt (autosigné) => certificat SSL 
setcookie('nom2', 'valeur2', time() + 365*24*3600, null, null, true, true); 
// préférer les sessions ou autre possibilités de suivi
// navigateur -> JS LocalStorage/sessionStorage -> token / id session, ...

$pdo = new PDO('mysql:host=localhost;dbname=taxis;charset=utf8', 'root', '');
// uniquement en développement car plus verbeux sur les erreurs
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

print_r($pdo);

$nom = "OUI";
$prenom = "OUI";
/*
$stmt = $pdo->exec("insert into conducteur(nom, prenom)
                    values('". $nom ."', '". $prenom ."')");*/

$stmt = $pdo->prepare("insert into conducteur(nom, prenom)
                      values(?, ?)");
$params = [$nom, $prenom];
$stmt->execute($params);

$stmt2 =$pdo->prepare("insert into conducteur(nom, prenom)
                      values(:nom, :prenom)");
$param2 = [':nom' => $nom, ':prenom' => $prenom];
$stmt2->execute($param2);

$stmt3 =$pdo->prepare("insert into conducteur(nom, prenom, age)
                      values(:nom, :prenom, :age)");
$stmt3->bindValue(':nom', $nom, PDO::PARAM_STR);
// ou $stmt3->bindParam(':nom', $nom, PDO::PARAM_STR, 30); //avec ctrl taille en plus
$stmt3->bindValue(':prenom', $prenom, PDO::PARAM_STR);
$stmt3->bindValue(':age', $age, PDO::PARAM_INT); //stop !!!
$stmt->execute();


$nb = count($tab);
for($i = 0; $i < $nb; $i++){
  echo $i;
}

// wordpress => 2 fois plus vite 

// pdo -> exec pour INSERT/UPDATE/DELETE
// pdo -> query pour SELECT
// pdo-> prepare->execute pour INSERT/UPDATE/DELETE/SELECT 

$liste = $pdo->query("select * from table")->fetchAll(PDO::FETCH_ASSOC);
unset($pdo); //récup mémoire

//ramasse miette => supprimer tout
?>