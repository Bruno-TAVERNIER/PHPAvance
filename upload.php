<?php

/* Mr Propre */
$safe = array_map('strip_tags', $_POST);

// infos sur le téléchargement de fichier
//print_r($_FILES);
// si aucune erreur on traite le fichier
if($_FILES['photo']['error'] == 0){
  // récupération du fichier tmp et enregistrement

  // dans le cadre d'un image on peut vérifier les dimensions et mettre un message si besoin
  $imgSize = getimagesize($_FILES['photo']['tmp_name']);
  //print_r($imgSize);

  // niveau supérieur utilisation de fileinfo
  $finfo = new finfo(FILEINFO_MIME_TYPE);
  $mime = $finfo->file($_FILES['photo']['tmp_name']);
  //var_dump($mime);
  if(substr($mime, 0, 6) == 'image/') {
    //echo 'ok<br>';
    $ext = substr($_FILES['photo']['name'], strripos($_FILES['photo']['name'], '.'));
    //echo $ext;
    $nouveauNom = md5(uniqid(rand(), true)); //32 caractères
    $result = move_uploaded_file($_FILES['photo']['tmp_name'], 'images/' . $nouveauNom.$ext);
    //$result = move_uploaded_file($_FILES['photo']['tmp_name'], 'images/' . $_FILES['photo']['name']);
    // ajout de $nouveauNom.$ext dans la base de données
  }
  else echo 'bien tenté<br>';

  //$result = move_uploaded_file($_FILES['photo']['tmp_name'], 'images/' . $_FILES['photo']['name']);
}
else echo 'oups'; //voir les erreurs dans la doc