<?php   
session_start();
if(!isset($_SESSION['uid'])){
header('Location:index.php');
}
require('../../../generar_repote_usuarios/pdf/fpdf.php');



class PDF extends FPDF{    
    function Header() {   
        $idUsuario = $_SESSION['uid'];
        
        $this->Image('fondo.png', -62, -25, 350);
        $this->SetTextColor(43,129,73);
        $this->SetFont('Times', 'I', 45);
        $this->SetXY(25, 15);
        $this->Cell(50,5,'Rutina Diaria');
        $this->SetXY(60, 15);
        $this->Cell(50,25,'De',0,0,1);
       $this->SetXY(30, 15);
        $this->Cell(50,45,'Alimentacion');


        $this->SetFont('Courier', '', 35);
        $this->SetXY(40, 15);
        $this->SetTextColor(32,140,69);
        $this->Cell(50,95,'Desayuno');

        
       require '../../../generar_repote_usuarios/co.php';
       $consulta = "SELEcT * FROM cart Where user_id = $idUsuario  AND product_cat = 1 AND peso = 3";
       $resultado = $mysqli->query($consulta);
  
       $this->SetFont('Arial', '', 15);
       $this->SetXY(10, 75);
       $this->SetTextColor(0,0,0);
      
       while($row = $resultado->fetch_assoc()){
        
       $this->cell(70,10, utf8_decode('                '.$row['product_title']).'.......................... C.'.$row['price'], 0, 1, '', 0);
     
    }
  

    $this->SetFont('Courier', '', 35);
    $this->SetXY(25, 65);
    $this->SetTextColor(32,140,69);
    $this->Cell(50,100,utf8_decode('Media Mañana'));


    $consultaM = "SELEcT * FROM cart Where user_id =$idUsuario AND product_cat = 2 AND peso = 3";
    $resultadoM = $mysqli->query($consultaM);
    $this->SetFont('Arial', '', 15);
    $this->SetXY(10, 125);
    $this->SetTextColor(0,0,0);
    while($rowM = $resultadoM->fetch_assoc()){
        
        $this->cell(70,10, utf8_decode('                '.$rowM['product_title']).'.......................... C.'.$rowM['price'], 0, 1, '', 0);
      
     }


     $this->SetFont('Courier', '', 35);
    $this->SetXY(35, 95);
    $this->SetTextColor(32,140,69);
    $this->Cell(50,100,utf8_decode('Almuerzo'));


    $consultaA = "SELEcT * FROM cart Where user_id = $idUsuario AND product_cat = 3 AND peso = 3";
    $resultadoA = $mysqli->query($consultaA);
    $this->SetFont('Arial', '', 15);
    $this->SetXY(10, 155);
    $this->SetTextColor(0,0,0);

    while($rowA = $resultadoA->fetch_assoc()){
        
        $this->cell(70,10, utf8_decode('                '.$rowA['product_title']).'......................... C.'.$rowA['price'], 0, 1, '', 0);
      
     }


     $this->SetFont('Courier', '', 35);
     $this->SetXY(35, 140);
     $this->SetTextColor(32,140,69);
     $this->Cell(50,100,utf8_decode('Merienda'));

     $consultaME = "SELEcT * FROM cart Where user_id = $idUsuario AND product_cat = 4 AND peso = 3";
    $resultadoME = $mysqli->query($consultaME);
    $this->SetFont('Arial', '', 15);
    $this->SetXY(10, 200);
    $this->SetTextColor(0,0,0);

    
    while($rowME = $resultadoME->fetch_assoc()){
        
        $this->cell(70,10, utf8_decode('                '.$rowME['product_title']).'...........................C.'.$rowME['price'], 0, 1, '', 0);
      
     }

     $this->SetFont('Courier', '', 35);
     $this->SetXY(35, 175);
     $this->SetTextColor(32,140,69);
     $this->Cell(50,100,utf8_decode('Cena'));
 
     $consultaCE = "SELEcT * FROM cart Where user_id = $idUsuario AND product_cat = 5 AND peso = 3";
     $resultadoCE = $mysqli->query($consultaCE);
     $this->SetFont('Arial', '', 15);
     $this->SetXY(10, 230);
     $this->SetTextColor(0,0,0);
     while($rowCE = $resultadoCE->fetch_assoc()){
        
        $this->cell(70,10, utf8_decode('                '.$rowCE['product_title']).'...........................C.'.$rowCE['price'], 0, 1, '', 0);
      
     
    }
     }
    
       function Footer()
       { 
           // Posición: a 1,5 cm del final
           $this->SetY(-15);
           // Arial italic 8
           $this->SetFont('Arial','I',8);
           // Número de página
           $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
       }

     
}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',10);

$pdf->Output();


?>