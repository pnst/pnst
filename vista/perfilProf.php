<?php

/* ************************* */
//@Author: Ignacio Peña
//@website: www.proyectonst.cl
//@email: ignacio.pena87@yahoo.es
//@license: 
//      This program is free software; you can redistribute it and/or modify
//      it under the terms of the GNU General Public License as published by
//      the Free Software Foundation; either version 2 of the License, or
//      (at your option) any later version.
//      
//      This program is distributed in the hope that it will be useful,
//      but WITHOUT ANY WARRANTY; without even the implied warranty of
//      MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
//      GNU General Public License for more details.
//      
//      You should have received a copy of the GNU General Public License
//      along with this program; if not, write to the Free Software
//      Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston,
//      MA 02110-1301, USA.
//
//Vista-PHP:  Perfil del Profesor
?>
<html>
<head>
	<link rel="stylesheet" href="css/jquery-ui-1.8.2.custom.css" type="text/css" media="screen"/>
	<script type='text/javascript' src="js/profesor.js"></script>
</head>
<body>

<!--  Inicio formulario -->
	<div id="admin_almn"><br/>
	<h1>Perfil <span>Profesor</span></h1><br/>
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
		    <input id="email" class="email required tb" name="email" size="25" type="text" value=""  autocomplete="false"/><span id="status"></span><br/><br/>

		</li>
	<?php } ?>
	</form>
	<input id="prof_pefil" type="submit" value="Actualizar !"/>
	</div>

