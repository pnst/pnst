<?php 
$_SESSION['n1'] = rand(1,40);
$_SESSION['n2'] = rand(1,120);
$_SESSION['suma'] = $_SESSION['n1']+$_SESSION['n2'];

?>
<html>
<head>
<title>Adios al Proyecto Educativo NST: Medición de la Comprensión Lectora </title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="keywords" content="CLP, C.L.P., software medición comprensión lectora, comprensión, comprensión lectora, programación neuro linguistica, comprensión linguistica progresiva, medir comprensión lectora, lectora, medición comprensión lectora, gnu/gpl, software libre">
<meta name="description" content="Proyecto Educativo NST es casi con seguridad la mejor aplicación para medir de forma rápida y fácil la comprensión lectora en alumnos de 1° a 4° año básico. Es una aplicación de fácil uso y entendimiento. Entrega gráficos claros mostrando los resultados de forma certera y veraz.">

<link type="text/css" rel="stylesheet" href="css/general.css" /></head>
<body>

<div id="aboutNST">

<br/>
<table>
<tr align=center><td><h1>Eliminación de tu cuenta del Proyecto NST</h1></td></tr>
<tr align=center><td><br>

<table border=1 bgcolor=#eeeeee>
<tr><td>
    <table cellpadding=4 cellspacing=0 width=400>

<tr><td align=right>Nombre real: </td>
<td><b>
<?php  if($_SESSION['wraprof_NOMBRE_PROF'])echo $_SESSION['wraprof_NOMBRE_PROF'].' '. $_SESSION['wraprof_APELLIDO_PROF'];
if($_SESSION['wradir_NOMBRE_DIR']) echo $_SESSION['wradir_NOMBRE_DIR'].' '. $_SESSION['wradir_APELLIDO_DIR']; 
?>
</b></td></tr>


<tr><td align=right>Nombre de usuario de NST: </td>
<td><b>
<?php  if ($_SESSION['wraprof_EMAIL_PROF']) echo $_SESSION['wraprof_EMAIL_PROF'];
       if ($_SESSION['wradir_EMAIL_DIR'])   echo $_SESSION['wradir_EMAIL_DIR']; 
?>
</b></td></tr>

<tr><td align=right>Colegio: </td>
<td><b>
<?php  
if($_SESSION['wraprof_NOMBRE_COLEGIO'])echo $_SESSION['wraprof_NOMBRE_COLEGIO'];
if($_SESSION['wradir_NOMBRE_COLEGIO']) echo $_SESSION['wradir_NOMBRE_COLEGIO']; 
?>
</b></td></tr>

<tr><td valign=top align=right>Cargo:</td>
<td><b><?php if($_SESSION['configuracion'])echo $_SESSION['configuracion'];?></b>

</td></tr></table></td></tr></table></td></tr>


<tr><td align=center><br><b>Antes de continuar, considera lo siguiente.</b></td></tr>

<tr><td>Al cancelar esta cuenta, perderás tu nombre de usuario de NST  y tu perfil relacionado con esa cuenta. También se borrará toda tu información de cuenta. Esto incluye la información como correo electrónico, nombre, contraseña y cargo entre otros. La eliminación de tu cuenta también terminará los servicios de suscripción que tienes con el nombre de usuario de NST que estás cancelando. Posiblemente no puedas recobrar los pagos de esos servicios ni la información asociada a la cuenta que eliminas.</td></tr>
	
<tr><td>Si aun no lo has hecho, antes de eliminar tu cuenta verifica que no tengas activo el servicio PRO. Para ver y cancelar tu suscripcion actual visita <a href="?controlador=Nst&accion=unsuscribe">  Información de cuenta PRO NST</a> de tu cuenta, haz clic en la ficha "Mis servicios", y después en el enlace "Cancelar" para cada suscripción.</td></tr>

<tr><td><b><br/><br/>Advertencia:  al borrar tu usuario de NST se eliminará automáticamente tu cuenta.  Al borrar la cuenta, tanto las pruebas, como el/los cursos y las estadísticas son eliminados permanentemente.  Una vez realizada esta acción, es irreversible.<br/><br/></b></td></tr>


<tr><td>La mayoría de las cuentas canceladas, son primero desactivadas y luego eliminadas de nuestra base de datos en un lapso de 20 días (aproximadamente). Este periodo es necesario, pues así prevenimos el que hayas solicitado la cancelación por error, y evitamos posibles actividades fraudulentas por parte de los usuarios. Además, debido al número limitado de nombres de usuario y perfiles, una vez cancelada tu cuenta cualquier otra persona podrás utilizar aquellos que usabas.</td></tr>

<tr><td><a href="?controlador=Index&accion=saveData">Haz clic aquí</a> para conocer qué información podría permanecer en nuestros registros archivados después de haberse eliminado tu cuenta.
Cancelar tu cuenta de NST no altera ni elimina los reportes generados por <a href="http://espanol.people.yahoo.com/">Proyecto NST</a>, que tendrás que <a href="?controlador=http://privacy.yahoo.com/privacy/e1/yps/details.html">modificar o eliminar</a> tú mismo. </td></tr>

<tr><td>&nbsp;</td></tr>
<tr><td align=center colspan=2>
<b>¡Lamentamos que te vayas!<br>¿Realmente quieres eliminar tu cuenta de NST?</b>
</td></tr>
<tr><td align=center>Si es así, introduce tu contraseña en este campo.</td></tr>

<form id="baja" action="#" method="POST">

<tr><td align=center><input name="password" type="password" size=20 maxlength=32></td></tr>

<tr><td align=center>
<input type=hidden name="ip" value="<?php echo $_SERVER [ 'REMOTE_ADDR' ];?>" >
<tr><td colspan=4><hr></td></tr>
<tr><td colspan=3 align=center>
<table border=0 cellspacing=0 cellpadding=1><tr>

<br/><b>Ingresa la suma correspondiente.</b>
<tr>
          <td><label for="captcha"><?=$_SESSION['n1']?> + <?=$_SESSION['n2']?> =</label></td>
          <td><input type="text" name="captcha" id="captcha" /></td>
          <td valign="top">&nbsp;</td>
</tr></table>
</tr></table>
</td></tr></table>
</td><td>
</td></tr>
</td></tr>
<tr><td>
    <center><table cellpadding=10 cellspacing=5>
    <tbody>

    <tr align=center><td><b><font face=arial size=+1>SÍ</font></b><br>
    <input type=submit name=".confirm" id="eliminar" value="Eliminar esta cuenta.">
</td><td><b>NO</b>
<br><input type=submit name=".confirm" id="volver" value="Cambio de opinión, deseo volver."></td></tr>
</tbody>
</table></center>
</td></tr>
</form>

<div id="respuesta"></div>

</tbody>
</table>
</center>


</div>

<script src="js/jquery-1.4.2.min.js" type="text/javascript"></script>
<script>
$(document).ready(function() { 

    $('#eliminar').click(function (){
   
       $.post('?controlador=Nst&accion=val_baja', $('form#baja').serialize(), function(e){
	if(e == '-2'){alert('¡ No haz sumado bien !, te equivocaste en la suma intentalo de nuevo')}
	if(e == '-1'){alert('¡ La contraseña no corresponde !, ingresaste mal la contraseña ')}
	if(e ==  '0'){alert('¡ Debes llenar todos los campos !')}
	if(e ==  '1'){ if(confirm('Esta será la última pregunta, ¿ Estas realmente seguro que vas a eliminar tu cuenta del sistema ?')){document.location='?controlador=Index'};}
       })
       return false;
    });

  $('#volver').click(function (){
   
	document.location.href="?controlador=Nst&accion=logout";     
      return false;
    });
});
</script>
</body>
</html>











