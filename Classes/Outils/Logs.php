<?php
//classe pour les logs
namespace Outils;

class Logs{

  private mixed $pointer = null;

  // ouverture du fichier en lecture/ecriture
  public function __construct(string $fichier) {
      $this->pointer = fopen($fichier, 'w+');
  }

  // fermeture du fichier
  public function __destruct(){
    fclose($this->pointer);
  }

  //ecriture
  public function write(string $contenu) {
    //PHP_EOL : fin de ligne
    //sous linux: \r\n CR+LF
    //sous windows: \n LF
    fwrite($this->pointer, $contenu . PHP_EOL);
  }

  public function read(): ?string {
    //ramener le curseur au début
    fseek($this->pointer, 0);
    return fread($this->pointer, 4096);
    //retour du curseur en haut
    fseek($this->pointer, 0);
  }
}