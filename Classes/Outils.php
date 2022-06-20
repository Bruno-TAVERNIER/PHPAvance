<?php
// classe qui ne contient que des fonctions statiques 
class Outils {

  //méthodes statiques
  //transformation date AAAA-MM-JJ en JJ/MM/AAAA
  public static function dateFr($dte){
    $tDate = explode('-', $dte); // transformation date => tableau en fonction du '-'
    return $tDate[2] . '/' . $tDate[1] . '/' . $tDate[0];
    // return implode('/', array_reverse($tDate));
  }

  // conversion date JJ/MM/AAAA en AAAA-MM-JJ
  public static function dateUs($dte) {
    $jour = substr($dte, 0, 2);
    $mois = substr($dte, 3, 2);
    $annee = substr($dte, 6, 4);
    return $annee . '-' . $mois . '-' . $jour;
  }
}