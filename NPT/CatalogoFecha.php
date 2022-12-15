<?php
require('fpdf/fpdf.php');
class PDF extends FPDF
{
// Cabecera de página
function Header()
{
// Logo
    $this->Image('Fotos/logo.jpg',28,8,20);
    // Arial bold 15
    $this->SetFont('Arial','B',15); 
    $this->SetDrawColor(255,0,0);
    $this->SetTextColor(0,0,255);
    $this->SetFillColor(250,250,0);
    $this->Rect(28, 30, 155, 5, 'F');
    // Movernos a la derecha
    $this->Cell(60);
    // Título
    $this->Cell(60,10,'Catalogo de Productos  -   ',0,0,'C');
    $this->Cell(40,10,date('d/m/Y'),0,1,'L');   
    // Salto de línea
    $this->Ln(10);
    $this->SetFillColor(224,235,255);
    $this->Cell(18);
    $this->SetFont('Arial','B',10);
    $this->Cell(15,5, 'ITEM',1,0,'C',0);
    $this->Cell(70,5, 'PRODUCTO',1,0,'L',0);
    $this->Cell(40,5, 'PRESENTACION',1,0,'L',0);
    $this->Cell(15,5, 'STOCK',1,0,'R',0);
    $this->Cell(15,5, 'PRECIO',1,1,'R',0);

 
}
// Pie de página
function Footer()
{   // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
}
}
  $mysqli = new mysqli("containers-us-west-86.railway.app", "root", "9gxJ9ftY9Zk3AKM7S7Cm", "bdneptuno",7510);
  $Consulta="Select * from Producto order by IdCategoria";
  $Resultado=$mysqli->query($Consulta);
  $pdf=new PDF();    
  $pdf->AliasNbPages();    
  $pdf->AddPage();    
  $pdf->SetFont('Arial','',10);
  $N=1;
  while($row=$Resultado->fetch_assoc()){
      $pdf->Cell(18);        
      $pdf->Cell(15,5, $N,1,0,'C',0);++$N;
      $pdf->Cell(70,5, utf8_decode($row['NombreProducto']),1,0,'L',0);
      $pdf->Cell(40,5, utf8_decode($row['CantidadPorUnidad']),1,0,'L',0);
      $pdf->Cell(15,5, $row['UnidadesEnExistencia'],1,0,'R',0);
      $pdf->Cell(15,5,number_format($row['PrecioUnidad'],2,'.',','),1,1,'R',0);
  }
// Creación del objeto de la clase heredada
$pdf->Output();
?>

