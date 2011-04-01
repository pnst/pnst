<?php //if(empty($_SERVER['HTTPS'])) header('Location: https://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>

<body style="background:url(css/images/ui-bg_diagonals-thick_20_d6e7f0_40x40.png)">

 <form action="?controlador=Admin&accion=valida" method="post">
    <table border="0" style="margin:100px 300px;border:2px solid #000; background:url(css/images/ui-bg_diagonals-small_55_fcb6b7_40x40.png) "align="center">
	<tr><td>Usuario: </td><td> <input type="text" name="us" /></td></tr>
    
	<tr><td>Contraseña: </td> <td><input type="password" name="pa" /></td></tr>
  
	<tr ><td colspan="2"><input type="submit" value="Ingresar" /></td></tr>
 
</form>

 </body>
</html>

