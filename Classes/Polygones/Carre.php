<?php
/* classe Carré qui hérite de Rectangle. Ne pourra pas être héritée */
namespace Polygones;

final class Carre extends Rectangle {
 
  //constructeur
  public function __construct($cote){
    //appel du constructeur de Rectangle avec côtés identiques
    parent::__construct($cote, $cote);
  }
}