<?php
include 'fpdf/fpdf.php';

$pdf = new FPDF('P', 'mm', 'A4');
//ajout d'une page
$pdf->addPage();
//police
$pdf->setFont('Arial', '', 14);
//si remplissage, il faut avant un setFillColor();
$pdf->SetFillColor(230); //RVB ou niveau de gris
$pdf->Cell(40, 10, 'Hello ', 1, 0, 'C', 0);
$pdf->Cell(40, 10, 'World', 0, 1, 'C', 0); // 1 pour le saut de ligne
$pdf->Cell(80, 10, '24/06/2022', 0, 1, 'C');

$pdo = new PDO('mysql:host=localhost;dbname=taxis;charset=utf8', 'root', '');
$liste = $pdo->query('select * from vehicule')->fetchAll(PDO::FETCH_ASSOC);

//entete de tableau
$pdf->Cell(20 , 10, 'ID', 1, 0); 
$pdf->Cell(40 , 10, 'MARQUE', 1, 0); 
$pdf->Cell(40 , 10, 'MODELE', 1, 0); 
$pdf->Cell(40 , 10, 'COULEUR', 1, 0); 
$pdf->Cell(50 , 10, 'IMMATRICULATION', 1, 1); 

foreach($liste as $num => $vehicule){
  $fill = ($num % 2) ? 1 : 0;
  $pdf->Cell(20 , 10, $vehicule['id_vehicule'], 'LR', 0, 'L', $fill); 
  $pdf->Cell(40 , 10, $vehicule['marque'], 'LR', 0, 'L', $fill); 
  $pdf->Cell(40 , 10, $vehicule['modele'], 'LR', 0, 'L', $fill); 
  $pdf->Cell(40 , 10, $vehicule['couleur'], 'LR', 0, 'L', $fill); 
  $pdf->Cell(50 , 10, $vehicule['immatriculation'], 'LR', 1, 'L', $fill); 
}
$pdf->Cell(190, 10, 'Total: ' . ($num + 1) . ' vehicules', 1, 1, 'C');

//retour au navigateur
$pdf->output('F', 'vehicules.pdf');
//$pdf->output();

//https://www.m2iformation.fr/mon-compte/particuliers/session/
// session SE22-182305




