<?php
require_once("jpgraph/src/jpgraph.php");
require_once ("jpgraph/src/jpgraph_pie.php");
// Se define el array de valores y el array de la leyenda
$datos = array(70,60,21,33);
$leyenda = array("Morenas","Rubias","Pelirrojas","Otras");
//Se define el grafico
$grafico = new PieGraph(450,300);
//Definimos el titulo
$grafico->title->Set("Mi primer gráfico de torta");
//Añadimos el titulo y la leyenda
$grafico->title->SetFont(FF_FONT1,FS_BOLD);
 $p1 = new PiePlot($datos);
$p1->SetLegends($leyenda);
$p1->SetCenter(0.4);
//Se muestra el grafico
$grafico->Add($p1);
$grafico->Stroke();
?>