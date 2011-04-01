<html>
<head>
<link rel="stylesheet" href="css/jquery-ui-1.8.2.custom.css" type="text/css" media="screen"/>
<script src="js/profesor.js"></script>
</head>

<div id="registro_prba">
	<br/>
	<h1>Ingresar <span>Pruebas</span></h1><br/>
	<form action="" method="post" id="formPrba" name="formPrba">
	    <fieldset id="paso_1">
		<legend>Primer Paso</legend>
		<select id="curso" name="id_curso">
		<option  selected="selected" value="">Elige el curso</option>
		<?php while( $curso = $listado_curso->fetch()){?>

		<option value="<?php echo $curso['ID_CURSO'];?>">
		 <?php echo $curso['NIVEL_CURSO']. ' ' .$curso['LETRA_CURSO'];?></option>
		<?php } ?>
	    </select><br />
	</fieldset>
	
	<fieldset id="paso_2">
	<legend>Segundo Paso</legend>
	<h4>Hace click en la Fecha</h4><br/>
	Fecha <input type="text" id="fecha" readonly="readonly" class="serializar_prba" name="fecha" value="<?php echo tomorrow(); ?>" />
	<br><br/>
	
	<h4>Formato de la Prueba</h4>	
	<input type="radio" id="formato_prueba" class="serializar_prba" name="formato_prueba" value="A"></input> A
	<input type="radio" id="formato_prueba" class="serializar_prba" name="formato_prueba" value="B"></input> B
		
	<div class="push">
	    <h4>¿Desea realizar algun cambio?</h4>
	    <input type="radio" id="confirma_formato_si" name="confirma_formato" value="si" ></input>
	    <label for="confirma_formato_si">No, Siguiente</label>&emsp;
	    <input type="radio" id="confirma_formato_no" name="confirma_formato" value="no" ></input>
	    <label for="confirma_formato_no">Si, Cambiar</label>
	</div>
	</fieldset>
		
	<fieldset id="paso_3">
	    <legend>Tercer Paso</legend>
	    Código de la Prueba  <br></br>
	    <input type="text" class="serializar_prba" name="codigo_prueba" readonly="readonly" value="<?php echo codprbaAleatorio();?>" /><br />
	</fieldset>
	
    </form>
    
    <input type="submit" id="prba_registro_button" value="Registrar Prueba" onClick="document.form=formPrba.reset();return false"></input>
</div>
	<!-- Fin formulario -->
<div id="resp_listado_prba" ></div>
