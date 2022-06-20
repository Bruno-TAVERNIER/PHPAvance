<?php
namespace DesignPatterns;

class Factory_fichier2{

  public function __construct($contenu1, $contenu2){
    file_put_contents(getcwd().'/fichier2.txt', $contenu1.PHP_EOL.$contenu2.PHP_EOL, FILE_APPEND);
  }

  public function test(){
    echo '<p>fonction test de la fabrique F2</p>';
  }
}