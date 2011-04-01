<?php /*
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
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> Registrate al ProyectoNST, es fácil tener una cuenta, obten la tuya.</title>

<link rel="stylesheet" type="text/css" href="css/registrar.css" />

</head>

<body>

<div id="div-regForm">

<div class="form-title">Registrate
    <img src="css/images/gnome-docs.png"/>
</div>
<div class="form-sub-title">Es fácil, obten tu cuenta.</div>

<form id="regForm" action="?controlador=Nst&accion=val_registro" method="post">

<table>
  <tbody>
  <tr>
    <td><label for="fname">Nombre:</label></td>
    <td><div class="input-container"><input name="nombre" id="nombre" type="text" /></div></td>
  </tr>
  <tr>
    <td><label for="lname">Apellido:</label></td>
    <td><div class="input-container"><input name="apellido" id="apellido" type="text" /></div></td>
  </tr>
  <tr>
    <td><label for="email">E-Mail:</label></td>
    <td><div class="input-container"><input name="email" id="email" type="text"  /><span id="status"></span></div></td>
  </tr>
  <tr>
    <td><label for="pass">Password:</label></td>
    <td><div class="input-container"><input name="passw" id="passw" type="password" /></div></td>
  </tr>
  <tr>
    <td><label for="colegio">Colegio:</label></td>
    <td><div class="input-container"><input name="colegio" id="colegio" onkeyup="suggest(this.value);" onblur="fill();" class="" type="text" />
	<div class="suggestionsBox" id="suggestions" style="display: none;"> <img src="css/images/arrow01.png" style="position: relative; top: -12px; left: 30px;" alt="Colegios" />
        <div class="suggestionList" id="suggestionsList"> &nbsp; </div>
	</div></div>
    </td>
  </tr>
  <tr>
    <td><label for="cargo">Cargo:</label></td>
    <td><div class="input-container">
	
	<select name="cargo">
	    <option value="Cargo">Cargo</option>
	    <option value="Director">Director</option>
	    <option value="Profesor">Profesor</option>
	</select>
	    
    </div></td>
  </tr>

  <tr>
    <td><label>Fecha de Nacimiento:</label></td>
    <td>
    <div class="input-container">
	
	<select name="day"><option value="0">Día:</option><?=generate_options(1,31)?></select>
	<select name="month"><option value="0">Mes:</option><?=generate_options(1,12,'callback_month')?></select>
	<select name="year"><option value="0">Año:</option><?=generate_options(date('Y'),1900)?></select>

    </div>
    </td>
  </tr>
  <tr>
    <td>
	<div class="input-container">
	    <input type="hidden" name=ip value="<?php echo $_SERVER [ 'REMOTE_ADDR' ]; ?>"/>
	</div>
    </td>
</tr>
  <tr>
   <td>&nbsp;</td>
   <td><input type="submit" class="greenButton" value="Registrar" /><img id="loading" src="css/images/loader.gif" alt="Procesando.." />
  </td>
 </tr>
 
  </tbody>
</table>

</form>

<div id="error">
&nbsp;
</div>

</div>
<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="js/registro.js"></script>

</body>
</html>
