<?php
namespace DesignPatterns;

class Observateur_Fichier1 implements \SplObserver {
  
  public function __construct(){
    echo '<p>Observateur Fichier 1</p>';
  }

  public function update(\SplSubject $sujet){
    echo '<p>Observateur Fichier 1: ' . $sujet->getMessage() . '</p>';
    file_put_contents(getcwd().'/obs_f1.txt', $sujet->getMessage().PHP_EOL, FILE_APPEND );
  }
}