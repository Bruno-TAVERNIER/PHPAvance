<?php
// interface pour gérer le déplacement des objets
namespace Interfaces;
Interface Deplacement {
  // uniquement des fonction publiques sans code qui devront être
  // écrites dans les classes implémentant l'interface
  public function avancer();
  public function freiner();
}
