<html>
<head>
<link rel="stylesheet" href="css/jquery-ui-1.8.2.custom.css" type="text/css" media="screen"/>
<script src="js/director.js"></script>
<script> 
$(document).ready(function() {
$("#profesor_registro_button").click(function(){ 

$.post('?controlador=Profesor&accion=insertar', $('#form_reg_profesor').serialize(), function(data){

    if(data == '-1'){alert('¡Debes llenar todos los campos!')}
    if(data == '-2'){alert('¡ Debes indicar una dirección de correo electrónico válida !')}
    if(data == '-3'){alert('¡ La dirección de correo no es válida !')}
    if(data ==  '1'){$('#resp_listado_profesor').load('?controlador=Profesor&accion=listado_prof');}

    });
   
});
});
</script>
</head>
<!-- Matriz de Lista de profesor -->
<div id="admin_profesor"><br/>
<h1>Ingresa un <span>Profesor al Sistema</span></h1><br/>
<form action="" method="post" id="form_reg_profesor"> 
    <li>
	<label for="nombre_prof">Nombre : </label>
	<input name="nombre_prof" class="prof required tb" name="nombre_prof" type="text" value=""  /><br/><br/>
    </li>
    <li>
	<label for="apellido_prof">Apellido :</label>
	<input  name="apellido_prof" class="prof required tb" id="apellido_prof" type="text" value=""/><br/><br/>
    </li>
    <li>
	<label for="nombre1">E- Mail : </label>
	<input id="email_prof"  class="prof required email" name="email_prof"  type="text"/><br/><br/>
    </li>
    <li>
	Curso : <select  id="curso_director" name="id_curso">
	<option selected="selected" value=""> Elige el Curso</option>
	<?php while( $curso_dir = $curso_director->fetch()){?>
	<option value="<?php echo $curso_dir['0']?>">
	<?php echo $curso_dir['1'].$curso_dir['2']?></option>	<?php } ?>
    </select>
<input type="reset" value="Limpiar!"/>
    </li><br/>


</form>
<input id="profesor_registro_button" type="submit" value="Ingresar"/>
</div>
<!-- Matri< lista de profesor -->
<div id="resp_listado_profesor"></div>

