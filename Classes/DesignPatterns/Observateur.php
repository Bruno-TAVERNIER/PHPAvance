<?php
namespace DesignPatterns;

class Observateur implements \SplSubject{
  private $_observers;
  private $_message;

  public function __construct(){
    $this->_observers = new \SplObjectStorage;
  }

  public function attach(\SplObserver $obs){
    $this->_observers->attach($obs);
  }

  public function detach(\SplObserver $obs) {
    $this->detach($obs);
    return $this;
  }

  public function getMessage(){
    return $this->_message;
  }

  public function ecrire($sujet){
    $this->_message = $sujet;
    $this->notify();
  }

  public function notify() {
    foreach($this->_observers as $observers){
      try{
        $observers->update($this);
      }
      catch(Exception $e){
        die($e->getMessage());
      }
    }
    return $this;
  }
}