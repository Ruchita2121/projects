<?php session_start();
require_once('../Connections/db52417.php');
require('../fpdf153/fpdf.php');

//mysql_select_db($database_api2007, $api2007);
$query_Products = "SELECT * FROM product, category WHERE product.Cat_ID=category.CatID ORDER BY product.Prod_Name";
$Products = mysql_query($query_Products) or die(mysql_error());
$row_Products = mysql_fetch_assoc($Products);
$totalRows_Products = mysql_num_rows($Products);

class PDF extends FPDF
{
//Page header
function Header()
{
	//$this->Image('images/sitelogo.jpg',10,8,33);	// Logo
	$this->SetFont('Arial','B',15);			// Arial bold 15
	$this->Cell(80);				// Move to the right
	$this->Cell(30,10,'Furniture Mart',1,0,'C');	// Title
	$this->Ln(20);					// Line break
}

//Page footer
function Footer()
{
	$this->SetY(-15);			// Position at 1.5 cm from bottom
	$this->SetFont('Arial','I',8);		// Arial italic 8
$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');	// Page number
}
}

//Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);

$offset 	= 50;		// set parameters
$img_offset 	= 20;
$img_width 	= 30;
$start_row_init	= 40;
$cell_width 	= 0;
$line_height 	= 6;
$spacing 	= 6;		// spacing between items

$start_row = $start_row_init;

do { 
	//list($width, $height, $type, $attr) = getimagesize('./Images/'.$row_Products['Prod_thumb']);
	// check if image exists
	$validImg = 0;
	if ($attr) {
		$validImg = 1;
		$img_height = $img_width * $height / $width ;
	} else {
		$img_height = $img_width;
	}
	
	// move to next page if image does not fit
	if ($start_row + $img_height >= 297 - 20) {
		$start_row = $start_row_init;
		$pdf->AddPage();
	}

	$pdf->SetY($start_row);
	$pdf->SetFont('Times','',12);	
	
	// disp info
	if ($validImg) {
		$pdf->Image('../Images/'.$row_Products['Prod_thumb'], $img_offset, $start_row, $img_width);
	}
	$pdf->Cell($offset);
	$pdf->Cell($cell_width, $line_height ,'Name: '.$row_Products['Prod_Name'],0,1);
	$pdf->Cell($offset);
	$pdf->Cell($cell_width, $line_height ,'Category: '.$row_Products['CatName'],0,1);
	$pdf->Cell($offset);
	$pdf->Cell($cell_width, $line_height ,'Description: '.$row_Products['Prod_dscrp'],0,1);
	$pdf->Cell($offset);
	$pdf->Cell($cell_width, $line_height ,'Price: '.$row_Products['Prod_Price'],0,1);
	$pdf->Cell($offset);
	//$pdf->Cell($cell_width, $line_height ,'Size: '.$row_Products['Prod_Size'],0,1);
	//$pdf->Cell($offset);
	//$pdf->Cell($cell_width, $line_height ,'Weight: '.$row_Products['ProdWeight'],0,1);
	
	$current_row = $pdf->GetY();
	$row_dif = ($current_row - $start_row);

	// choose greatest
	if ($current_row > $start_row + $img_height)
		$start_row = $current_row;
	else
		$start_row = $start_row + $img_height;
	// add spacing between rows
	$start_row = $start_row + $spacing;
} while ($row_Products = mysql_fetch_assoc($Products)); 

$pdf->Output();
mysql_free_result($Products);

?>