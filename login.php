<?php 
error_reporting(E_ALL ^ E_NOTICE);
require_once('conexion.php'); ?>
<?php
if((isset($_POST[usuario]) && $_POST[usuario]<>"") && (isset($_POST[contrasena]) && $_POST[contrasena]<>"") ){
$query="SELECT * FROM clientes WHERE usuario='$_POST[usuario]' AND contrasena='$_POST[contrasena]'";
$resource=$conn->query($query);
if($t=$resource->num_rows){
$row=$resource->fetch_assoc();
$_SESSION[user_id]=$row[id];
$_SESSION[nombre]=$row[nombre];
$_SESSION[email]=$row[email];
$_SESSION[telefono]=$row[telefono];
$_SESSION[pais]=$row[pais];
$_SESSION[direccion]=$row[direccion];
$volver=($_SESSION[volver])?$_SESSION[volver]:"tienda.php";
header("Location: ".$volver);
} else {
$error="Usuario/Clave no registrados";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <?php include("head.php");?>
    <style>
    .descuento{
        display: none;
        background-color: greenyellow;
    }  
    #success_message{ 
        display: none;
    }
    </style>
  </head>
  <body>
    <!-- header -->
    <?php include("header.php");?><!-- fin header --> 

    <!-- Menu Principal -->
    <?php include("menu.php");?>    
    <!-- End Menu Principal -->
    
    
    
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
               
			    <form class="well form-horizontal" method="post"  id="formulario" name="fRegistro">
					<fieldset>

					<!-- Nombre de Formulario -->
					<legend><center><h2><b>Inicio de Sesión</b></h2></center></legend><br>

					<!-- Text input-->

					<div class="form-group">
					  <label class="col-md-4 control-label">Usuario</label>  
					  <div class="col-md-4 inputGroupContainer">
                            <div class="input-group">
                              <span class="input-group-addon"><i class="glyphicon "></i></span>
                              <input  name="usuario" id="usuario" placeholder="Usuario" class="form-control"  type="text">
                            </div>
	                  </div>
					</div>

					<!-- Text input-->

					<div class="form-group">
					  <label class="col-md-4 control-label">Contraseña</label> 
					    <div class="col-md-4 inputGroupContainer">
					    <div class="input-group">
					  <span class="input-group-addon"><i class=""></i></span>
					  <input name="contrasena" placeholder="Contraseña" class="form-control"  type="password">
					    </div>
					  </div>
					</div>
					

					<!-- Button -->
					<div class="form-group">
					  <label class="col-md-4 control-label"></label>
					  <div class="col-md-4"><br>
					   <input type="submit" class="btn btn-success" value="Ingresar" name="registro" id="registro">
					  </div>
					</div>

					</fieldset>
				</form>
			</div><!-- /.container -->
    </div>
    <!-- Footer -->
    
    <!-- JS -->
    <?php include("js.php");?><!-- End JS -->
  </body>
</html>