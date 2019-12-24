<?php
include "conexion.php";
require_once('class.ezpdf.php');
$pdf = new Cezpdf('Carta'); //seleccionamos tipo de hoja
$pdf->selectFont('fonts/Arial.afm'); //seleccionamos fuente a utilizar
$pdf->ezImage("/emp.jpeg", 10, 150, 'none', 'left');
$pdf->ezText("<b>Fecha:</b> ".date("d/m/Y"),12);
$pdf->ezText("<b>Hora:</b> ".date("h:i:s"),12);
$pdf->ezText("<b>Tados del cliente</b>\n",24);
//include"conexion.php";
$sql="SELECT * from clientes";
$result=$con->query($sql);
if($result->num_rows>0){
while ($row=mysqli_fetch_array($result)) {
        $data[]=array('nombre'=>$row[1],'usuario'=>$row[8],'email'=>$row[2],'telefono'=>$row[3],'direccion'=>$row[5],'fecha'=>$row[10]);
}
}
else{
	echo "Base de datos vacía";
}
$titles=array('nombre'=>'nombre','usuario'=>'usuario', 'email'=>'email','telefono'=>'telefono','direccion'=>'direccion','fecha'=>'fecha');
$pdf->ezTable($data);
ob_end_clean();
$pdf->ezStream();
$conn->close();
?>
