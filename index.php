 <?PHP
require('fpdf/fpdf.php');
 
/* Open CSV file */

$handle = fopen("test.csv", "r");
$c = 0;
/* gets data from csv file */
while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
/* stores dates as variables */
        $title[$c] = $data[0];
        $link[$c] = $data[1];
        $c++;
}

/* Create PDF, set properties */
$pdf = new FPDF();
$pdf->SetFont('Arial','B',16);
$pdf->Ln(50); 

/* inserts data into PDF */
for ($d=0; $d < $c; $d++) {
$pdf->AddPage();
	
 	$pdf->MultiCell(0,10,' Die Zeitschrift '. $title[$d] .'  ist auch online verfügbar.',0,C); 
	$pdf->Cell(0,60,' URL:'. $link[$d] .''); 
	$pdf->Image('http://chart.apis.google.com/chart?cht=qr&chs=450x450&chl='.$link[$d].'.png',70,100,90);
}

$pdf->Output();

?>