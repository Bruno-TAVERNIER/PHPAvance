<?php
namespace DesignPatterns;

class Factory_Fichier1{

  public function __construct($contenu1, $contenu2){
    file_put_contents(getcwd().'/fichier1.txt', $contenu1.PHP_EOL.$contenu2.PHP_EOL, FILE_APPEND);
  }

  public function test(){
    echo '<p>fonction test de la fabrique F1</p>';
  }
}