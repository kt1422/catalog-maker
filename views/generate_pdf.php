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
    $this->Cell(45,15,$_POST['header'],0,0,'C');
    $this->Ln(15);
    $this->SetFont('Arial','',12);
    // Ensure table header is printed
    parent::Header();
}
}

$pdf = new PDF('P','mm','A4');
$pdf->SetMargins(1, 1, 1);
$pdf->AddPage();
$pdf->Image($image[0],10,6,30);
$pdf->Output();
?>