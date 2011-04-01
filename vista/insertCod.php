<?php
/*
 *      reenvioPasswd.php
 *      
 *      Copyright 2010 Ignacio Peña <ignacio.pena87@gmail.com>
 *      
 *      This program is free software; you can redistribute it and/or modify
 *      it under the terms of the GNU General Public License as published by
 *      the Free Software Foundation; either version 2 of the License, or
 *      (at your option) any later version.
 *      
 *      This program is distributed in the hope that it will be useful,
 *      but WITHOUT ANY WARRANTY; without even the implied warranty of
 *      MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *      GNU General Public License for more details.
 *      
 *      You should have received a copy of the GNU General Public License
 *      along with this program; if not, write to the Free Software
 *      Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston,
 *      MA 02110-1301, USA.
 */
$a = rand(0,50);
$b=rand(40,80);
$_SESSION['resultado'] = $a + $b;


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Ingresa tu nueva contraseña</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<!--  CSS -->
<link type="text/css" rel="stylesheet" href="css/jquery-ui-1.8.2.custom.css" />
<link type="text/css" rel="stylesheet" href="css/general.css" />
</head>
<body>

<center>
<div id="recPass">
    <br/><br/>Ingresa el código de seguridad
    <ul>
	<li id="codVer">
	    Código : <input type="text" id="codigo" name="codigo" size="14px" >
	    <button id="btnCodigo" name="btnCodigo">Validar</button>
	 </li><span id="status"></span>
	<br/><br/>
	
	<li id="2Passw">
	    Contraseña Nueva : <input type="password" id="passw1" name="passw1" size="14px" ><br/>
	    Repite Contraseña: <input type="password" id="passw2" name="passw2" size="14px" >
	 </li><span id="status2"></span>
	<br/><br/>
	
	<li id="captcha">
		Suma '<?php echo $a." + ".$b."' = ";?>: <input type="text" id="suma" name="suma" size="5px" >
	</li>	</li><span id="status1"></span>
    </ul>
</div>
<br/><br/>
<button id="btnCambiar" name="btnCambiar">Cambiar</button>
<div id="msgbox"></div>
</center>
<br/><br/><br/>
</div>



<!-- Libreria UI Custom + Core -->
<script src="js/jquery-1.4.2.min.js" type="text/javascript"></script>
<script src="js/jquery-ui-1.8.2.custom.min.js" type="text/javascript"></script>
<script src="js/reenvioPasswd.js" type="text/javascript"></script>
<script>

$('#btnCambiar').hide();
$('#2Passw').hide();
$('#captcha').hide();
</script>
</body>
</html>
