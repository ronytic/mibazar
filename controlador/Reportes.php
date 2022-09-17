<?php

namespace controlador;

class Reportes
{
    function holamundo()
    {
        // echo "Hola mundo";
        // exit();
        // CREAR UN PDF

        $pdf = new \librerias\fpdf\FPDF(); // Instanciamos la clase
        $pdf->AddPage(); // Creamos una página
        $pdf->SetFont('arial', "B", 12); // Establecemos la fuente arial negrita tamaño 12
        $pdf->Cell(40, 10, "Hola mundo", 1); // Creamos una celda con el texto "Hola mundo"
        $pdf->Ln(); // Salto de línea
        $pdf->Cell(40, 10, "Mi nombre es Raul", 1);
        $pdf->Cell(70, 10, "Mi cumpleaño en Mayo", 1);
        $pdf->Output(); // Mostramos el pdf generado
    }

    public function contenedorventas()
    {
        $titulo = "Reporte de Ventas";
        $vista = "vista/reportes/ventas.php";
        require_once "vista/cargador.php";
    }

    public function ventas()
    {

        // GENERAR UN CODIGO QR y GUARDARLO DENTRO DE UNA CARPETA
        require_once "qrlib.php";
        $codeContents = base64_encode("Mi sistemaweb" . date("Y-m-d H:i:s"));
        $pngAbsoluteFilePath = "imagenes/qr.png";
        \QRcode::png($codeContents, $pngAbsoluteFilePath);


        //Obtener las ventas
        $venta = new \modelo\Venta;
        $ventas = $venta->seleccionar("*", "estado=1");


        //INICIANDO EL REPORTE PDF
        $pdf = new PDF('L', 'cm', 'letter'); // Instanciamos la clase
        $pdf->AliasNbPages();
        $pdf->AddPage(); // Creamos una página



        $pdf->Ln(); // Salto de línea
        //CABECERA DE LA TABLA
        $pdf->Cell(1, 0.5, "#", 1, 0, "C");
        $pdf->Cell(4, 0.5, "Cliente", 1, 0, "C");
        $pdf->Cell(4, 0.5, "Nit", 1, 0, "C");
        $pdf->Cell(4, 0.5, "Total", 1, 0, "C");
        $pdf->Cell(4, 0.5, "Cancelado", 1, 0, "C");
        $pdf->Cell(4, 0.5, "Cambio", 1, 0, "C");
        $pdf->Cell(4, 0.5, "Fecha", 1, 0, "C");
        $pdf->Ln();
        $pdf->SetFont('arial', "", 11); // Establecemos la fuente arial tamaño 11


        //CONTENIDO DE LA TABLA
        $i = 0;
        foreach ($ventas as $fila) {
            $i++;
            //REpetir varias veces
            $pdf->Cell(1, 0.5, $i, 1, 0, "C");
            $pdf->Cell(4, 0.5, utf8_decode($fila['nombrecliente']), 1, 0, "L");
            $pdf->Cell(4, 0.5, $fila['nitcliente'], 1, 0, "L");
            $pdf->Cell(4, 0.5, $fila['totalgeneral'], 1, 0, "R");
            $pdf->Cell(4, 0.5, $fila['cancelado'], 1, 0, "R");
            $pdf->Cell(4, 0.5, $fila['cambio'], 1, 0, "R");
            $pdf->Cell(4, 0.5, $fila['fecha'], 1, 0, "C");
            $pdf->Ln();
        }


        $pdf->Output(); // Mostramos el pdf generado
    }
}

class PDF extends \librerias\fpdf\FPDF
{
    function Header()
    {
        $this->SetFont('arial', "B", 12); // Establecemos la fuente arial negrita tamaño 12
        $this->Cell(24, 1, "Reporte de Ventas", 0, 0, "C"); // Creamos una celda con el texto
        $this->Ln(); // Salto de línea

        //Insertar una imagen como logo
        $this->Image("imagenes/milogo.jpg", 1, 1, 2, 2);
        $this->Image("imagenes/qr.png", 25, 1, 2, 2);
    }

    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-1.5);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Número de página
        $this->Cell(0, 1, utf8_decode('Página ') . $this->PageNo() . '/{nb}', "T", 0, 'C');
    }
}
