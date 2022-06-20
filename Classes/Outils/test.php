<?php
namespace Outils;
class Test {
  /*public int|float $n1;
  public int|float $n2;
  public int|float $n3;*/

  public function __construct(public int|float $n1 = 0,public int|float $n2 = 0,public int|float $n3 = 0){
 /*   $this->n1 = $n1;
    $this->n2 = $n2;
    $this->n3 = $n3;*/
  }

  public function somme() :int|float {
    return $this->n1 + $this->n2 + $this->n3;
  }
}