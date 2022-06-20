<?php
namespace DesignPatterns;
// include à la main à cause de ReflectionClass
include 'Factory_fichier1.php';
include 'Factory_fichier2.php';

class Factory {
  private static $_instance = null;
  private $_ns;

  protected function __construct() {}

  public static function getInstance($ns = null){
    //si pas d'instance on la crée (idem Singleton)
    if(is_null(self::$_instance)) self::$_instance = new self;
    self::$_instance->_ns = $ns;
    return self::$_instance;
  }

  public function __call($methode, $arguments){
    //première lettre en majuscule
    $class = ucfirst($this->_ns.$methode);
    if(class_exists($class, false)){
      $refClass = new \ReflectionClass($class);
      if($refClass->isInstantiable() && $refClass->hasMethod('__construct')){
        return $refClass->newInstanceArgs($arguments);
      }
      else throw new \Exception('classe non instanciable');
    }
    else throw new \Exception('classe introuvable');
  }
}