<?php
 //transformation date AAAA-MM-JJ en JJ/MM/AAAA
// en mode totalement procédural
 function dateFr2($dte){
  $tDate = explode('-', $dte); // transformation date => tableau en fonction du '-'
  return implode('/', array_reverse($tDate));
}
?>