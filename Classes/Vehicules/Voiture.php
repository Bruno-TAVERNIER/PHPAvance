<?php
//classe voiture implémentant l'interface Deplacement
namespace Vehicules;
use \Interfaces\Deplacement; // pour éviter l'implémentation à rallonge
class Voiture implements Deplacement {
  // propriétés
  public $marque;
  public $modele;
  public $couleur;
  public $nbPortes;

  //constructeur
  public function __construct($ma = 'Peugeot', $mo = '305', $cl = 'blouge', $nb = 3) {
    $this->marque = $ma;
    $this->modele = $mo;
    $this->couleur = $cl;
    $this->nbPortes = $nb;
  }

  // méthode magique toString pour dire que c'est une voiture de marque, modele, couleur 
  // lors d'un print ou echo
  public function __toString() {
    return '<p>Vehicule de marque '
           .$this->marque
           .', de modèle '
           .$this->modele 
           .' et de couleur '
           . $this->couleur
           .'</p>';
  }

  // méthode magique pour retourner la marque, le modele, la couleur le nb de portes
  // lors d'un var_dump ou print_r
  public function __debugInfo() {
    return ['marque' => $this->marque,
            'modele' => $this->modele,
            'couleur' => $this->couleur,
            'nbPortes' => $this->nbPortes];
  }

  // méthode imposée (contrat) par l'interface Déplacement 
  public function avancer() {
   echo '<p>A fond les ballons</p>';
  }

  // méthode imposée (contrat) par l'interface Déplacement 
  public function freiner() {
    echo '<p>Oups</p>';
  }
}
