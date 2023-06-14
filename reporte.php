<?php
	$enlace = mysqli_connect("localhost","root","");
	mysqli_select_db($enlace, "adopcion_animal");
	$consulta = mysqli_query($enlace, "select m.id_mascota, m.nombre_mascota, a.nombre_adoptante, a.mail, ad.fecha_adopcion from mascotas m 
				left join adopciones ad on m.id_mascota = ad.id_mascota 
				left join adoptantes a on ad.id_adoptante = a.id_adoptante");

	require('Generar_PDFs/fpdf.php');
	$pdf=new FPDF();	
	$pdf->AddPage();
	$pdf->Image('images/logo.gif', 10, 10, 15);
	$pdf->SetFont('Arial','B',15);
	$pdf->Cell(80,16,'                Reporte de mascotas adoptadas',0,1);
	$pdf->Line($pdf->GetX(), $pdf->GetY(), $pdf->GetPageWidth() - $pdf->GetX() - $pdf->rMargin, $pdf->GetY());
	$pdf->Ln();
	$fil_tam = 10;
	$pdf->SetFont('Arial','B',10); 
	$pdf->Cell(25, $fil_tam, 'ID Mascota', 1);
	$pdf->Cell(30, $fil_tam, 'Mascota', 1);
	$pdf->Cell(35, $fil_tam, 'Adoptante', 1);
	$pdf->Cell(60, $fil_tam, 'Correo', 1);
	$pdf->Cell(35, $fil_tam, 'Fecha Adopcion', 1);
	$pdf->Ln(); 

	$pdf->SetFont('Arial','',10); 
	while($fila = mysqli_fetch_array($consulta)){
		$pdf->Cell(25, $fil_tam, $fila['id_mascota'],1);
		$pdf->Cell(30, $fil_tam, $fila['nombre_mascota'],1);
		$pdf->Cell(35, $fil_tam, $fila['nombre_adoptante'],1);
		$pdf->Cell(60, $fil_tam, $fila['mail'],1);
		$pdf->Cell(35, $fil_tam, $fila['fecha_adopcion'],1);
		$pdf->Ln();
	}

	$pdf->Ln(); 
	$pdf->SetTextColor(0,0,255);
	$pdf->SetFont('','U'); 
	$pdf->Write(5,'Visita mi pagina','http://localhost/Aplicaciones/Practica%205/index.php');

	$pdf->Output();

	// Envía los encabezados HTTP para indicar que se va a enviar un archivo PDF
	header('Content-type: application/pdf');
	header('Content-Disposition: inline; filename="reporte.pdf"');
	header('Content-Transfer-Encoding: binary');
	header('Accept-Ranges: bytes');

	// Envía el archivo PDF al navegador
	readfile('reporte.pdf');		
?>