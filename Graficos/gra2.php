<?php
require_once ('jpgraph/src/jpgraph.php');
require_once ('jpgraph/src/jpgraph_bar.php');
include "conexion.php";
// Creamos el grafico
//$datos=array(10,5,8,6);
//$labels=array("pepe","juanita","Maria","Luis");
$sql = "SELECT Cantidad,id from productos";
    $query=$con->query($sql);
    while($row = $query->fetch_array())
    {
     $data[] = $row[0];
     $can[] = $row[1];
    } 
$grafico = new Graph(500, 400, 'auto');
$grafico->SetScale("textlin");
$grafico->title->Set("Gráfica en Barras");
$grafico->xaxis->title->Set("Id del producto");
$grafico->xaxis->SetTickLabels($can);
$grafico->yaxis->title->Set("Cantidad");

$barplot1 =new BarPlot($data);
$barplot1->SetWidth(30); // 30 pixeles de ancho para cada barra

$grafico->Add($barplot1);
$grafico->Stroke();

?>