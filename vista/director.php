<?php
/* Si la variable sessión está vacía  o no existe */
if(empty($_SESSION['nst_SESION']) && !isset($_SESSION['nst_SESION'])){ header("Location:?controlador=Login");}
if(empty($_SESSION['wradir_ID_DIR']) && !isset($_SESSION['wradir_ID_DIR'])){ header("Location:?controlador=Login");}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Panel de Trabajo para el DIRECTOR - Proyecto Educativo NST | proyectonst.wikiaula.org</title>
<link rel="stylesheet" href="css/panelCSS.css" type="text/css" media="screen" />

</head>
<body>
<div id="main">
    <div id="respuesta"></div>
    <div id="taskbar">
	<div id="menu">
	    <ul>
		<!-- Ayuda -->
		<li class="menu_taskbar"><a href="#" id="perfilDir"><img src="css/images/Gnome-director.png" alt="<?php echo $_SESSION['wradir_NOMBRE_DIR'] . " , "  ;?> este es el ícono de ayuda"></a></li>
		<!-- Registro -->
		<li class="menu_taskbar"><a href="#" id="profesores"><img src="css/images/Gnome-registro-profesor.png" alt="Registro de profesores"/></a></li>
		<!-- Visor Resultados-->
		<li class="menu_taskbar"><a href="#" id="resultadosDir"><img src="css/images/gnome-resultados-64.png" alt="Visor de Resultados de Prueba" /></a></li>
		<!-- LOG SUCESOS -->
		<li class="menu_taskbar"><a href="#" id="sucesosProf"><img src="css/images/Gnome-sucesos-64.png" alt="Registro de profesores"/></a></li>
		<!-- Logout -->
		<li class="menu_taskbar"><a href="#" id="logout"><img src="css/images/Exit.png" alt="Finalizar sesión" /></a></li>
	    </ul>
	</div>	
    </div>

	<div id="mask"> </div>
<!-- FIN MENU -->
</div>


<!-- Libreria UI Custom + Core -->
<script src="js/jquery-1.4.2.min.js" type="text/javascript"></script>
<script src="js/jquery-ui-1.8.2.custom.min.js" type="text/javascript"></script>
<script src="js/core.js" type="text/javascript"></script>
<script src="js/jquery.jslickmenu.js" type="text/javascript"></script>
<script src="js/jeditable.js" type="text/javascript"></script>

</body>
</html>
	
