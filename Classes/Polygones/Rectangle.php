<?php
namespace Polygones;
// classe Rectangle
class rectangle extends Polygone{

  // attributs ou propriétés du rectangle
  public int|float $longueur; //union de type
  public int|float $largeur;
  private $trait = '1mm';
  protected string $truc = 'azerty';
  protected ?string $bidule = null; //type nullable
  // une constante (non modifiable, toujours en majuscule et sans le '$')
  public const COULEUR = 'bleu';

  //constructeur : affectation de la longueur et la largeur
  public function __construct(int|float $ln, int|float $lg) {
    $this->longueur = $ln;
    $this->largeur = $lg;
  }

  // destructeur : appelé à la destruction de l'objet ou à la fin du script
  public function __destruct() {
    echo '<p>Destructeur</p>';
  }

  //méthode magique pour l'affichage d'un objet avec echo ou print
  public function __toString(): string {
    return '<p>Ceci est un objet de la classe Rectangle de longueur ' 
           . $this->longueur
           . ' et de largeur '
           . $this->largeur 
           . '</p>';
  }

  //méthode magique pour l'affichage de l'objet avec print_r ou var_dump
  public function __debugInfo(): array {
    return ['longueur' => $this->longueur,
            'largeur' => $this->largeur,
            'perimetre' => $this->perimetre(),
            'surface' => $this->surface()];
  }

  // méthode magique pour la lecture dans une propriété private ou protected
  public function __get($name):mixed { //type mixed pour tout type accepté par PHP
    if(isset($this->$name)) return $this->$name;
    else return 'raté';
  }

  // méthode magique pour l'écriture dans une propriété private ou protected
  public function __set($name, int|float $valeur) {
    if($name == 'trait'){
     if(is_numeric($valeur)) $this->$name = $valeur . 'mm';
    }
  }

  // méthode magique pour gérer le isset sur une propriété private ou protected
  public function __isset($name): bool{
    return false;
  }

  // méthode magique pour gérer le clonage d'un objet (récession)
  public function __clone():void{
    $this->longueur -= .5;
    $this->largeur -= .5;
  }

  //méthodes (fonctions) imposées par la classe Polygone
  public function perimetre():int|float {
    //une fonction renvoie une valeur avec le mot clé "return"
    return (2 * $this->longueur) + (2 * $this->largeur);
  }

  // final pour éviter la surcharge dans une classe enfant
  final public function surface():int|float {
    return $this->longueur * $this->largeur;
  }
}
?>