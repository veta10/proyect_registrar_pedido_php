<?php
require('fpdf/fpdf.php');
$mysqli = new mysqli("containers-us-west-86.railway.app", "root", "9gxJ9ftY9Zk3AKM7S7Cm", "bdneptuno",7510);
class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    $this->Image('Fotos/logo.jpg',28,8,20);
    $this->SetFont('Arial','B',10); 
    $this->SetDrawColor(255,0,0);
    $this->SetTextColor(0,0,255);
    $this->SetFillColor(250,250,0);
    $this->Cell(70);
    $this->Cell(60,10,'COMERCIAL NEPTUNO  -  PEDIDO REGISTRADO ',0,0,'C');
    $this->Ln(25);
}
function Footer()
{  
    $this->SetY(-15);
    $this->SetFont('Arial','I',8);
    $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
}
}
  $pdf=new PDF();    
  $pdf->AliasNbPages();    
  $pdf->AddPage();  
  if(isset($_GET["txtNroPedido"]))
      $IdPedido=$_GET["txtNroPedido"];
  else 
      $IdPedido=0;
  $Consulta="Select * from vistapedido where IdPedido=$IdPedido";
  $Resultado=$mysqli->query($Consulta); 
  $row=$Resultado->fetch_assoc();
  $pdf->SetFillColor(224,235,255);
  $pdf->Cell(18);$pdf->Cell(15,5, 'PEDIDO : '.$IdPedido,0,1,'L');
  $pdf->Cell(18);$pdf->Cell(35,5, 'FECHA  : '.$row['FechaPedido'],0,0,'L');
  $pdf->Cell(70,5, 'CONTACTO : '.utf8_decode($row['NombreContacto']),0,1,'R');
  $pdf->Ln(5);
  $pdf->Cell(10);
  $pdf->Cell(10,5, 'ITEM',1,0,'C',1);
  $pdf->Cell(70,5, 'PRODUCTO',1,0,'C',1);
  $pdf->Cell(40,5, 'PRESENTACION',1,0,'C',1);
  $pdf->Cell(20,5, 'CANTIDAD',1,0,'C',1);
  $pdf->Cell(20,5, 'PRECIO',1,0,'C',1);
  $pdf->Cell(20,5, 'IMPORTE',1,1,'C',1);
  $Consulta="Select * from VistaDetalle where IdPedido=$IdPedido";
  $Resultado=$mysqli->query($Consulta); 
  $pdf->SetFont('Arial','',10);
  $N=1;$Total=0;
  while($row=$Resultado->fetch_assoc()){
      $pdf->Cell(10);        
      $pdf->Cell(10,5, $N,1,0,'C',0);++$N;
      $pdf->Cell(70,5, utf8_decode($row['NombreProducto']),1,0,'L',0);
      $pdf->Cell(40,5, utf8_decode($row['CantidadPorUnidad']),1,0,'L',0);
      $pdf->Cell(20,5, $row['Cantidad'],1,0,'R',0);
      $pdf->Cell(20,5,number_format($row['PrecioUnidad'],2,'.',','),1,0,'R',0);
      $Importe=$row['Cantidad']*$row['PrecioUnidad'];
      $Total=$Total+$Importe;
      $pdf->Cell(20,5,number_format($Importe,2,'.',','),1,1,'R',0);
      
  }
  $pdf->Cell(10);   
  $pdf->Cell(160,5,'T O T A L ',1,0,'R',1);
  $pdf->Cell(20,5,number_format($Total,2,'.',','),1,1,'R',1);
// Creación del objeto de la clase heredada
$pdf->Output();
?>

