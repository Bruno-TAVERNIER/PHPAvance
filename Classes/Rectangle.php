<?php
// classe Rectangle
class rectangle {

  // attributs ou propriétés du rectangle
  public $longueur = null;
  public $largeur = null;
  private $trait = '1mm';
  protected $truc = 'azerty';
  // une constante (non modifiable, toujours en majuscule et sans le '$')
  public const COULEUR = 'bleu';

  //constructeur : affectation de la longueur et la largeur
  public function __construct($ln, $lg) {
    $this->longueur = $ln;
    $this->largeur = $lg;
  }

  // destructeur : appelé à la destruction de l'objet ou à la fin du script
  public function __destruct() {
    echo '<p>Destructeur</p>';
  }

  //méthode magique pour l'affichage d'un objet avec echo ou print
  public function __toString() {
    return '<p>Ceci est un objet de la classe Rectangle de longueur ' 
           . $this->longueur
           . ' et de largeur '
           . $this->largeur 
           . '</p>';
  }

  //méthode magique pour l'affichage de l'objet avec print_r ou var_dump
  public function __debugInfo() {
    return ['longueur' => $this->longueur,
            'largeur' => $this->largeur,
            'perimetre' => $this->perimetre(),
            'surface' => $this->surface()];
  }

  // méthode magique pour la lecture dans une propriété private ou protected
  public function __get($name){
    if(isset($this->$name)) return $this->$name;
    else return 'raté';
  }

  // méthode magique pour l'écriture dans une propriété private ou protected
  public function __set($name, $valeur) {
    if($name == 'trait'){
     if(is_numeric($valeur)) $this->$name = $valeur . 'mm';
    }
  }

  // méthode magique pour gérer le isset sur une propriété private ou protected
  public function __isset($name) {
    return false;
  }

  // méthode magique pour gérer le clonage d'un objet (récession)
  public function __clone() {
    $this->longueur -= .5;
    $this->largeur -= .5;
  }

  //méthodes (fonctions)
  public function perimetre(){
    //une fonction renvoie une valeur avec le mot clé "return"
    return (2 * $this->longueur) + (2 * $this->largeur);
  }

  public function surface() {
    return $this->longueur * $this->largeur;
  }
}
?>