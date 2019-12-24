<?php 
error_reporting(E_ALL ^ E_NOTICE);
if(!isset($_SESSION))session_start();
if(!$_SESSION[admin_id]){
$_SESSION[volver]=$_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING'];
header("Location: index.php");
}
require_once('../conexion.php'); ?>
<?php
	if($_POST[enviar] == "Modificar"){
		$unidad=implode(',',$_POST[unidad]);
		$q="UPDATE `productos` SET `nombre` = '$_POST[nombre]', `codigo` = '$_POST[codigo]', `categoria` = '$_POST[categoria]', `frase_promocional` = 'de calidad', `unidad` = '$unidad', `precio` = '$_POST[precio]', `disponibilidad` = '$_POST[disponibilidad]', `descripcion` = '$_POST[descripcion]', `promocion` = '$_POST[promocion]' WHERE `productos`.`id` = $_POST[id];";
		$resource=$conn->query($q);
		header("Location: listado_productos.php");
	}
?>
<?php
//if($_GET[id]==0){
       //header("Location: listado_productos.php"); 
        //}
$query=" SELECT * FROM productos WHERE id='$_GET[id]'";
$resource = $conn->query($query); 
$total = $resource->num_rows;
$row = $resource->fetch_assoc();

$rowColores = $row["colores"];
$arrayColores = explode(",",$rowColores);
?>

<!DOCTYPE html>
<html lang="es">
    <head> 
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <meta charset="utf-8"> 
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.0/css/bootstrapValidator.min.css">
	
		<!-- Website Font style -->
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
		<title>Modifica Productos</title>
		
		<style>
			#success_message{ 
				display: none;
			}
		</style>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/js/bootstrapvalidator.min.js"></script>
		<script type="text/javascript">
			  $(document).ready(function() {
    $('#Modificar').bootstrapValidator({
       
		</script>
	</head>
		<body>
         <?php 
            include("header.php"); 
            include("menu_admin.php"); 
        ?>
		    <div class="container">
			    <form class="well form-horizontal" method="post"  id="Modificar" name="Modificar">
					<fieldset>

					<!-- Nombre de Formulario -->
					<legend><center><h2><b>Modifica Productos</b></h2></center></legend><br>

					<!-- Nombre input-->

					<div class="form-group">
					  <label class="col-md-4 control-label">Nombre</label>  
					  <div class="col-md-4 inputGroupContainer">
					  <div class="input-group">
					  <span class="input-group-addon"><i class="glyphicon "></i></span>
					  <input  name="nombre" id="nombre" placeholder="Ingrese Nombre de Producto" class="form-control"  type="text" value="<?php echo $row[nombre]?>">
					    </div>
					  </div>
					</div>
					
					<!-- Email input-->
					      	<div class="form-group">
							  <label class="col-md-4 control-label">Código</label>  
							    <div class="col-md-4 inputGroupContainer">
							    <div class="input-group">
							        <span class="input-group-addon"><i class="glyphicon "></i></span>
							  		<input name="codigo" id="codigo" placeholder="Ingrese Código" class="form-control"  type="text" style="text-transform: uppercase" value="<?php echo $row[codigo]?>">
							    </div>
							  </div>
							</div>

					<!-- Categoria input-->
					       
					<div class="form-group"> 
					 	<label class="col-md-4 control-label">Categoría</label>
							<div class="col-md-4 selectContainer">
								<div class="input-group">
									<span class="input-group-addon"><i class="glyphicon "></i></span>
									<select name="categoria" id="categoria" class="form-control selectpicker" >
										<option value=" " >Seleccione Una categoría</option>
										 <option value="Frutas"<?php if($row[categoria]=="Frutas") echo selected ?>>hadware</option>
										 <option value="Legumbres"<?php if($row[categoria]=="Legumbres") echo selected ?>>HD</option>
										 <option value="Congelados"<?php if($row[categoria]=="Congelados") echo selected ?>>Tarjeta de video</option>
										 <option value="Coctel"<?php if($row[categoria]=="Coctel") echo selected ?>>Ram</option>
										 <option value="Verduras"<?php if($row[categoria]=="Verduras") echo selected ?>>Tarjeta de  sonido</option>
									</select>
								</div>
							</div>
					</div>


					
					<!-- Select Colores -->
					<div class="form-group"> 
					 	<label class="col-md-4 control-label">Colores</label>
							<div class="col-md-4 selectContainer">
								<div class="input-group">
									<span class="input-group-addon"><i class="glyphicon "></i></span>
									<select name="unidad[]" id="unidad" class="form-control selectpicker" >
										<option value=" " >Seleccione Unidad de Medida</option>
									 	<option value="Unidad" <?php if(in_array("Unidad",$arrayColores)) echo "selected"; ?>>Unidad</option>
									 	<option value="1 Kilo" <?php if(in_array("1 Kilo",$arrayColores)) echo "selected"; ?>>500 Gb</option>
									 	
									</select>
								</div>
							</div>
					</div>
					<!-- Precio -->
					       
					<div class="form-group">
					  <label class="col-md-4 control-label">Precio</label>  
					    <div class="col-md-4 inputGroupContainer">
					    <div class="input-group">
					        <span class="input-group-addon"><i class="glyphicon "></i></span>
					  	<input name="precio" id="precio" placeholder="Ingrese Precio $" class="form-control" type="text" value="<?php echo $row[precio]?>">
					    </div>
					  </div>
					</div>


					<!-- Disponibilidad -->
					 <div class="form-group">
						 <label class="col-md-4 control-label">Disponibilidad</label>
						 <div class="col-md-4 inputGroupContainer">        	      
							<div class="radio">
							  <label><input type="radio" name="disponibilidad" value="1" required <?php if($row[disponibilidad]== 1) echo checked ?>>Si</label>
							</div>
							<div class="radio">
							  <label><input type="radio" name="disponibilidad" value="0" required <?php if($row[disponibilidad]== 0) echo checked ?>>No</label>
							</div>
						 </div>
					</div>

					<!-- Descripción -->
					       	      
					<div class="form-group">
					  <label class="col-md-4 control-label">Descripción</label>  
					    <div class="col-md-4 inputGroupContainer">
					    <div class="input-group">
					        <span class="input-group-addon"><i class="glyphicon "></i></span>
				    	<textarea name="descripcion" id="descripcion" cols="30" rows="10" placeholder="Ingrese Descripción" class="form-control" type="text"><?php echo $row[descripcion]?></textarea>
					    </div>
					  </div>
					</div>
					
					<!-- En Promoción -->
					 <div class="form-group">
						 <label class="col-md-4 control-label">En Promoción</label>
						 <div class="col-md-4 inputGroupContainer">        	      
							<div class="radio">
							  <label>
							  <input type="radio" name="promocion" value="Si" required  <?php if($row[promocion]=="Si") echo checked ?>>Si</label>
							</div>
							<div class="radio">
							  <label><input type="radio" name="promocion" value="No" required  <?php if($row[promocion]=="No") echo checked ?>>No</label>
							</div>
						 </div>
					</div>

					
					<!-- Success message -->
					<div class="alert alert-success" role="alert" id="success_message">Success <i class="glyphicon glyphicon-thumbs-up"></i> Success!.</div>

					<!-- Button -->
					<div class="form-group">
					  <label class="col-md-4 control-label"></label>
					  <div class="col-md-4"><br>
					   <input type="submit" class="btn btn-success" name="enviar" value="Modificar" id="agregarProducto">
					  </div>
					</div>

					</fieldset>
					<input type="hidden" name="id" id="id" value="<?php echo $row[id]?>">
				</form>
				
			</div><!-- /.container -->
	
		</body>
</html>