
<?php
$servername="localhost";
$username="root";
$password="root";
$dbname="computadoras";
//--------------Creamos la conexion------
$con=new mysqli($servername,$username,$password,$dbname);
if($con->connect_error){
	die("Conexión Fallida ".$con->connect_error);
}
?>