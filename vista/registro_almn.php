<html>
<head>
<link rel="stylesheet" href="css/jquery-ui-1.8.2.custom.css" type="text/css" media="screen"/>
<script src="js/profesor.js"></script>

</head>
<body>

<!--  Inicio formulario -->
	<div id="admin_almn"><br/>
	<h1>Perfil <span>Profesor</span></h1><br/>
	<form action="" method="post" id="form_reg_alumn"> 
		<li>
		    <label for="nombre1">Primer Nombre </label>
		    <input name="nombre1" class="alumn required tb" name="nombre1" type="text" value=""  /><br/><br/>
		</li>
		<li>
		    <label for="nombre2">Segundo Nombre</label>
		    <input  name="nombre2" class="alumn tb" id="nombre2" type="text" value=""/><br/><br/>

		</li>
		<li>
		    <label id="apellido1_label" for="nombre1">Primer Apellido </label>
		    <input id="apellido1"  class="alumn required tb" name="apellido1" size="20" type="text"/><br/><br/>

		</li>
		<li>
		    <label id="apellido2_label" for="apellido2">Segundo Apellido </label>
		    <input id="apellido2" class="alumn required tb" name="apellido2" size="20" type="text" /><br/><br/>

		</li>
		<li>
		    <label id="rut_label" for="rut">R.U.T</label>
		    <input id="rut" name="rut" size="10" type="text" /><br/><br/>

		</li>
		<li>
		   Curso
		    <select class="alumn" id="curso_alumno" name="curso_alumno" >
		    <option>Cursos</option>
		    <?php while($lista_almn = $curso_almn->fetch()){?>
		    <option value="<?php echo $lista_almn['ID_CURSO'];?>">
		    <?php echo $lista_almn['NIVEL_CURSO']. ' ' .$lista_almn['LETRA_CURSO'];?></option>
		    <?php } ?>
		    </select>
		<input type="reset" value="Limpiar!"/>

		</li>
	    </form>
	<input id="almn_registro_button" type="submit" value="Ingresar"/>
	</div>

<div id="resp_listado_almn"></div>