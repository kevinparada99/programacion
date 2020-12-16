<?php

require('pdf/fpdf.php');

date_default_timezone_set('America/El_salvador'); //Configuramos el horario de acuerdo a la ubicación del servidor
class PDF extends FPDF{    
    function Header() {        
        $this->Image('../../public/Nutricion-master/img/logo.png', 12, 12, 25); //Insertamos el logo si es en PNG su calidad o formato debe estar entre PNG 8/PNG 24
         
        $ancho = 190;
        $this->SetFont('Arial', 'B', 6);
        $this->pagina = 0;
        if($this->pagina == 1){ //Cuando el archivo está en Horizontal
            $horizontal = 85; //Permitirá que las dimensiones que abarca horizontalmente sea 85 puntos más que cuando es vertical
            $this->SetY(12);
            $this->Cell($ancho + $horizontal, 10,'Desarrolladores: 5tech', 0, 0, 'R');
            $this->SetY(15);
            $this->Cell($ancho + $horizontal, 10,'Fecha: '.date('d/m/Y'), 0, 0, 'R');
            $this->SetY(18);
            $this->Cell($ancho + $horizontal, 10,'Hora: '.date('H:i:s'), 0, 0, 'R');            
        } else {            
            $this->SetY(12); //Mencionamos que el curso en la posición Y empezará a los 12 puntos para escribir el Usuario:
            $this->Cell($ancho, 10,'Desarrolladores: 5tech', 0, 0, 'R');
            $this->SetY(15);
            $this->Cell($ancho, 10,'Fecha: '.date('d/m/Y'), 0, 0, 'R');
            $this->SetY(18);
            $this->Cell($ancho, 10,'Hora: '.date('H:i:s'), 0, 1, 'R');            
        }   
    
        $this->SetFont('Arial','B',10);
        // Movernos a la derecha
        $this->Cell(50);
        // Título
        $this->Cell(90,30,'Reporte De Usuarios',0,0,'C');
        // Salto de línea
        $this->Ln(20);
       
        $this->cell(40, 10, 'Nombre', 1, 0, '', 0);
        $this->cell(10,10,'Edad',1,0,'',0);
        $this->cell(30,10,'Peso',1,0,'',0);
        $this->cell(20, 10, 'Sexo', 1, 0, '', 0);
        $this->cell(40, 10, 'Enfermedades', 1, 0, '', 0);
        $this->cell(40, 10, 'Observaciones', 1, 1, '', 0);     
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
  
    require 'co.php';
    $consulta = "SELEcT * FROM usuarios";
    $resultado = $mysqli->query($consulta);
    
    
    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Arial','',10);

    while($row = $resultado->fetch_assoc()){
        $pdf->cell(40, 10, $row['nombre'], 1, 0, '', 0);
        $pdf->cell(10,10,$row['nacimiento'],1,0,'',0);
        $pdf->cell(30,10,$row['inicial'].$row['libras'],1,0,'',0);
        $pdf->cell(20, 10, $row['actual'], 1, 0, '', 0);
        $pdf->cell(40, 10, $row['enfermedad'], 1, 0, '', 0);
        $pdf->cell(40, 10, $row['observacion'], 1, 1, '', 0);
    }
    
    
    
    
    $pdf->Output();
    
    
    
    ?>