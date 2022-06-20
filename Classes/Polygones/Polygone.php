<?php
/* classe abstraite Polygone */
namespace Polygones;
abstract class Polygone {

  // méthodes abstraites qui devront être écrites par chaque enfant de premier niveau
  abstract public function perimetre();
  abstract public function surface();

  // méthode qui sera héritée par toutes les classes enfant
  public function hello(){
    echo '<h1>Hello World!</h1>';
  }
}