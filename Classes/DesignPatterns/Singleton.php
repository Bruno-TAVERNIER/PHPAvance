<?php
namespace DesignPatterns;

// Singleton, pour les classes qui ne doivent avoir qu'une seule instance active 
class Singleton {
  protected static $_instance = null;
  protected $number = 0;

  // on interdit l'accès au constructeur donc pas de new Singleton() possible
  protected function __construct(){
    $this->number++;
  }

  // fonction pour récupérer le nombre d'instances
  public function getNumber(){
    return $this->number;
  }

  // récupération de l'instance de la classe
  //si aucune instance on la crée, sinon on retourne celle qui existe
  public static function getInstance(){
    if(is_null(self::$_instance)){
      self::$_instance = new self; //lancement du constructeur
    }
    return self::$_instance;
  }

}