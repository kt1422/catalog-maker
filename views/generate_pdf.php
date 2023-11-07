<?php
require('./pdf.php');
session_start();
if(!isset($_SESSION["user"])){
    header('Location: ../index.php?page=login');
}
$GLOBALS['user'] = $_SESSION["user"];

class PDF extends PDF_MySQL_Table
{
    const DPI = 96;
    const MM_IN_INCH = 25.4;
    const A4_HEIGHT = 57;
    const A4_WIDTH = 70;
    // tweak these values (in pixels)
    const MAX_HEIGHT = 196;
    const MAX_WIDTH = 264;

    function Header()
    {
        $user = $GLOBALS['user'];
        // Title
        $this->SetFont('Arial','',14);
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
        $this->SetMargins(0,2,0);
        // Arial italic 8
        $this->SetFont('Arial','I',10);
        // Page number
        $this->Cell(0,10,'Page '.$this->PageNo()+($_GET['page']-1),0,0,'C');
    }

    function pixelsToMM($val) {
        return $val * self::MM_IN_INCH / self::DPI;
    }

    function resizeToFit($imgFilename) {
        list($width, $height) = getimagesize($imgFilename);

        $widthScale = self::MAX_WIDTH / $width;
        $heightScale = self::MAX_HEIGHT / $height;

        $scale = min($widthScale, $heightScale);

        return array(
            round($this->pixelsToMM($scale * $width)),
            round($this->pixelsToMM($scale * $height))
        );
    }

    function centreImage($img,$startX,$startY) {
        list($width, $height) = $this->resizeToFit($img);

        // you will probably want to swap the width/height
        // around depending on the page's orientation
        $this->Image(
            $img, ((self::A4_HEIGHT - $width) / 2)+$startX,
            ((self::A4_WIDTH - $height) / 2)+$startY,
            $width,
            $height
        );
    }
}

$pdf = new PDF('P','mm','A4');
$pdf->SetMargins(0, 0, 0);
$pdf->AddPage();
$col = 0; $row = 0; $item = 0;
for($i=0; $i<$_GET['count']; $i++){
    $pdf->centreImage($_GET['item_path'.$i],7+($col*70),7+$row);
    $pdf->Ln(55);
    $pdf->SetX($col*70);
    $pdf->Cell(70,5,$_GET['item_name'.$i],0,0,'C');
    $pdf->Ln(-55);
    $col++; $item++;
    if($col==3){
        $col=0;
        $row+=66;
        $pdf->Ln(66);
    }
    if($item==12){
        $row = 0;
        $item = 0;
        $pdf->AddPage();
    }
}

$pdf->Output();
?>