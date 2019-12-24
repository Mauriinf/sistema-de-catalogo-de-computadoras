<?php
$servername="localhost";
$username="root";
$password="";
$dbname="computadoras";
$con=new mysqli($servername,$username,$password,$dbname);
if($con->connect_error){
	die('Error de conexión'.$con->connect_error);
}
?>