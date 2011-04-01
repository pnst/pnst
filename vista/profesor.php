<?php
/* Si la variable sessión está vacía  o no existe */
if(empty($_SESSION['nst_SESION']) && !isset($_SESSION['nst_SESION'])){ header("Location:?controlador=Login");}
if(empty($_SESSION['wraprof_ID_PROFESOR']) && !isset($_SESSION['wraprof_ID_PROFESOR'])){ header("Location:?controlador=Login");}
if(isset($_SESSION['id_prueba'])){unset($_SESSION['id_prueba']);}?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Panel de Trabajo para el PROFESOR - Proyecto Educativo NST | proyectonst.wikiaula.org</title>
<link rel="stylesheet" href="css/panelCSS.css" type="text/css" media="screen" />
</head>
<body>
<div id="main">
    <div id="respuesta"></div>
    <div id="taskbar">
    <div id="menu">
    <ul>
	<!-- Ayuda -->
	<li class="menu_taskbar"><a href="#"  id="perfilProf"><img src="css/images/Gnome-profesor.png" alt="<?php echo $_SESSION['wraprof_NOMBRE_PROF'] . " , ";?> actualiza o cambia tus datos"></a></li>
	<!-- Registro Prueba-->
	<li class="menu_taskbar"><a href="#" id="pruebas"><img src="css/images/Gnome-office.png" alt="Ingresa tus pruebas al sistema" /></a></li>
	<!-- Registro Alumnos-->
	<li class="menu_taskbar"><a href="#" id="alumno"><img src="css/images/Gnome-registro-alumno.png" alt="Registro de Alumnos" /></a></li>
	<!-- Visor Resultados-->
	<li class="menu_taskbar"><a href="#" id="resultados"><img src="css/images/gnome-resultados-64.png" alt="Visor de Resultados de Prueba" /></a></li>
        <!-- Excepciones de Prueba -->
    <li class="menu_taskbar"><a href="#" id="exp_prueba"><img src="css/images/gnome-aplication.png" alt="Controla quienes dieron dieron la prueba." /></a></li>

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
<script src="js/profesor.js" type="text/javascript"></script>
<script src="js/jquery.jslickmenu.js" type="text/javascript"></script>
<script src="js/jeditable.js"></script>

</body>
</html>
	
