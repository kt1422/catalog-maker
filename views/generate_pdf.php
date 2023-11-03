<?php
require('./pdf.php');
session_start();
if(!isset($_SESSION["user"])){
    header('Location: ../index.php?page=login');
}
$GLOBALS['user'] = $_SESSION["user"];

class PDF extends PDF_MySQL_Table
{
function Header()
{
    $user = $GLOBALS['user'];
    // Title
    // $this->Image('../public/img/useeby.png',10,6,30);
    $this->SetFont('Arial','',18);
    $this->Cell(80);
    $this->Cell(45,15,$_GET['header'],0,0,'C');
    $this->Ln(15);
    $this->SetFont('Arial','',12);
    // Ensure table header is printed
    parent::Header();
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo(),0,0,'C');
}
}

$pdf = new PDF('P','mm','A4');
$pdf->SetMargins(1, 1, 1);
$pdf->AddPage();
for($i=0; $i<$_GET['count']; $i++){
    $pdf->Image($_GET['item_path'.$i],10,18,50);
}
$pdf->Output();
?>