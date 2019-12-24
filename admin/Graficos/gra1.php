<?php
    include "conexion.php";
    include("jpgraph/src/jpgraph.php");
    include("jpgraph/src/jpgraph_pie.php");
    include("jpgraph/src/jpgraph_pie3d.php");
   $sql = "SELECT * FROM productos";
    $query=$con->query($sql);
    while($row = $query->fetch_array())
    {
     $data[] = $row[1];
     $can[] = $row[6];
    }  
    $graph = new PieGraph(550,300,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
//$graph->SetShadow();
 
// Setup margin and titles
    $graph->title->Set("Productos");
    $p1 = new PiePlot3D($data);
    $p1->SetSize(0.45);
    $p1->SetCenter(0.4);
 // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);
    $p1->SetLegends($can);
    $p1->ExplodeAll();
 //muestra gráfico
    $graph->Add($p1);
    $graph->Stroke(); 
  ?>