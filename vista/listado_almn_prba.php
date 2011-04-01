<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Ingresa el Código de la prueba que el profesor te indicará</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<!--  CSS -->
<link type="text/css" rel="stylesheet" href="css/jquery-ui-1.8.2.custom.css" />
<link type="text/css" rel="stylesheet" href="css/general.css" />
</head>
<body>
<center><br/><br/>
<div id="listado_prba_alumnos">
<?php 
if (isset($listado_alumnos) && !empty($listado_alumnos)){
echo "<h4>Lista del Colegio ".$_SESSION["wrares_NOMBRE_COLEGIO"]."</h4>";
echo "<center><h2> Curso :".$_SESSION["wrares_NIVEL_CURSO"].$_SESSION["wrares_LETRA_CURSO"]."</h2><center>" ;?>
<table class="list_alumn_prba">
<tr>
    <th>Selecciona</th>
    <th>Núm. Lista</th>
    <th>1° Nombre</th>
    <th>2° Nombre</th>
    <th>1° Apellido</th>
    <th>2° Apellido</th>
</tr>
<?php $lista = '1'; 
while( $alumno = $listado_alumnos->fetch()){ 
    if($alumno['5'] == 'no'){ ?>
    <tr id="fila">
	<td id="<?php echo $alumno['0']; ?>"><img class="alumno_prba" src="css/images/Gnome-Next.png" width="50" /></td>
	<td><?php echo $lista; $lista++;?></td>
	<td><?php echo $alumno['1'] ?></td>
	<td><?php echo $alumno['2'] ?></td>
	<td><?php echo $alumno['3'] ?></td>
	<td><?php echo $alumno['4'] ?></td>
	</tr><?php }else{ $lista++;}	} 

}else{ echo " Lo sentimos, todos los alumnos están en proceso o han finalizado su prueba ";?>
<a href="?controlador=Index"><img src="css/images/close.png"/></a>
<?php } ?>	

</div>
<!-- Libreria UI Custom + Core -->
<script src="js/jquery-1.4.2.min.js" type="text/javascript"></script>
<script src="js/jquery-ui-1.8.2.custom.min.js" type="text/javascript"></script>
<script src="js/prba.js" type="text/javascript"></script>

</body>
</html>
