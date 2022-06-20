<?php
namespace DesignPatterns;

class Observateur_Fichier2 implements \SplObserver {
  
  public function __construct(){
    echo '<p>Observateur Fichier 2</p>';
  }

  public function update(\SplSubject $sujet){
    echo '<p>Observateur Fichier 2: ' . $sujet->getMessage() . '</p>';
    file_put_contents(getcwd().'/obs_f2.txt', $sujet->getMessage().PHP_EOL, FILE_APPEND );
  }
}