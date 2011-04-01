<html>
<head>
<link rel="stylesheet" href="css/jquery-ui-1.8.2.custom.css" type="text/css" media="screen"/>
<script src="js/profesor.js"></script>

</head>
<body>

<!--  Inicio formulario -->
	<div id="admin_almn"><br/>
	<h1>Perfil <span>Director</span></h1><br/>
	<form action="#" method="post" id="form_reg_alumn"> 
	    <?php while ($a = $perfil->fetch()){?>
		<li>
		    <label for="nombre">Nombre </label>
		    <input name="nombre" class="nombre required tb" name="nombre" type="text" size="25" value="<?php echo $a['0']; ?>"  /><br/><br/>
		</li>
		<li>
		    <label id="apellido" for="apellido">Apellido </label>
		    <input id="apellido"  class="apellido required tb" name="apellido" size="25" type="text" value="<?php echo $a['1']; ?>"/><br/><br/>

		</li>
		<li>
		    <label id="email_label" for="apellido2">Email</label>
		    Tu email es "<b><?php echo $a['2']; ?></b>"<br/>
		    <input id="email" class="email required tb" name="email" size="25" type="text" value="" autocomplete="false"/><span id="status"></span><br/><br/>

		</li>
	<?php } ?>
	</form>
	<input id="dir_pefil" type="submit" value="Actualizar !"/>
	</div>

