<?php if($_SESSION['es_admin'] != 1) header("Location:?controlador=Admin");

$cont = 0;
$HD = 0;
$Login = 0;
$Ingreso = 0;
$DelAlumno = 0;
$AddAlumno = 0;
$EditAlumno = 0;
$DelPrba = 0;
$AddPrba = 0;
$EditPrba = 0;
$SERVER =0;
$Regitro =0;


while($a = $sistema->fetch()){
		$tipo[]	    =	$a['0'];
		if($a['0'] == 'HD') $HD++;
		if($a['0'] == 'Ingreso')$Ingreso++;
		if($a['0'] == 'Login')$Login ++;
		if($a['0'] == 'DelAlumno')$DelAlumno++;
		if($a['0'] == 'AddAlumno')$AddAlumno++;
		if($a['0'] == 'EditAlumno')$EditAlumno++;
		if($a['0'] == 'DelPrba')$DelPrba++;
		if($a['0'] == 'AddPrba')$AddPrba++;
		if($a['0'] == 'EditPrba')$EditPrba++;
		if($a['0'] == 'SERVER')$SERVER++;
		if($a['0'] == 'Registro')$Registro++;


		$titulo[]   =	$a['1'];
		$cuerpo[]    =	$a['2'];
		$fecha[]  =	cambia_a_normal($a['3']);
		$hora[]   =	$a['4'];
		$ip[]    =	$a['5'];
		$cont ++;

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cuentas Director - Panel de Administración y Estadísticas.</title>

<link type="text/css" rel="stylesheet" href="css/general.css" />
<link type="text/css" rel="stylesheet" href="css/jquery-ui-1.8.2.custom.css" />
</head>
<body>
<center>
<form method="post" action="?controlador=Exportacion&accion=exportar">
<input type="hidden" value="<?php echo 'http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']; ?>" name="doc"/>
<input value="Exportar" type="submit"/>
</form>

<input type="button" name="imprimir" value="Imprimir" onclick="window.print();">

 <br/><br/><div id="cuentas"><br/>

<div id="aboutNST">
    <h1>Cuentas Director - Panel de Administración y Estadísticas.</h1><br/>
    Número Total de Sucesos: <?php echo $cont; ?> <br/>
    Número Total de Ingresos : <?php echo $Ingreso; ?> <br/>
    Número Total de Login : <?php echo $Login;?> <br/>
    Número Total de Registrados : <?php echo $Registro;?> <br/>
<hr/>
    Número Total de Alumnos Ingresados : <?php echo $AddAlumno; ?> <br/>
    Número Total de Alumnos Borrados   : <?php echo $DelAlumno;?> <br/>
    Número Total de Alumnos Eliminados : <?php echo $EditAlumno;?> <br/>
<hr/>
    Número Total de Pruebas Ingresadas : <?php echo $AddPrba; ?> <br/>
    Número Total de Pruebas Borradas   : <?php echo $DelPrba;?> <br/>
    Número Total de Pruebas Editadas : <?php echo $EditPrba;?> <br/>
<hr/>
    Número Total de Revisiones de Espacio en Disco: <?php echo $HD; ?><br/>
    Número de veces que el sistema ha estado DOWN: <?php echo $SERVER ?><br/>

<hr/>

<table >
<caption>Detalle de Monitoreo</caption>
    <thead>
	<tr>
	    <td>Tipo</td>
	    <th>Título</th>
	    <th>Cuerpo</th>
	    <th>Fecha</th>
	    <th>IP</th>

	</tr>
    </thead>
    <tbody>
	<tr>
	<?php foreach($tipo as $indice => $valor){
	    if($tipo[$indice] == 'SERVER'){
		if($SERVER > 0){?>
	    <b><th><?php echo $tipo[$indice]; ?></th>
	    <td><?php echo $titulo[$indice]?></td> 
	    <td><?php echo $cuerpo[$indice]?></td> 	   
	    <td><?php echo $fecha[$indice]. ' '.$hora[$indice] ?></td>
	    <td><?php echo $ip[$indice]?></td></b>

	</tr>
	<?php  }else{ ?> <th>El sistema se ha mantenido funcionando initerrumpidamente</th><?php } } } ?>	
    </tbody>
</table>



<hr/>

<table >
<caption>Detalle de Espacio en Disco</caption>
    <thead>
	<tr>
	    <td>Tipo</td>
	    <th>Título</th>
	    <th>Cuerpo</th>
	    <th>Fecha</th>
	    <th>IP</th>

	</tr>
    </thead>
    <tbody>
	<tr>
	<?php foreach($tipo as $indice => $valor){
	    if($tipo[$indice] == 'HD'){ ?>
	    <b><th><?php echo $tipo[$indice]; ?></th>
	    <td><?php echo $titulo[$indice]?></td> 
	    <td><?php echo $cuerpo[$indice]?></td> 	   
	    <td><?php echo $fecha[$indice]. ' '.$hora[$indice] ?></td>
	    <td><?php echo $ip[$indice]?></td></b>

	</tr>
	<?php  } }  ?>	
    </tbody>
</table>


<hr/>

<table >
<caption>Detalle de Ingresos</caption>
    <thead>
	<tr>
	    <td>Tipo</td>
	    <th>Título</th>
	    <th>Cuerpo</th>
	    <th>Fecha</th>
	    <th>IP</th>

	</tr>
    </thead>
    <tbody>
	<tr>
	<?php foreach($tipo as $indice => $valor){
	    if($tipo[$indice] == 'Ingreso'){ ?>
	    <b><th><?php echo $tipo[$indice]; ?></th>
	    <td><?php echo $titulo[$indice]?></td> 
	    <td><?php echo $cuerpo[$indice]?></td> 	   
	    <td><?php echo $fecha[$indice]. ' '.$hora[$indice] ?></td>
	    <td><?php echo $ip[$indice]?></td></b>

	</tr>
	<?php  } }  ?>	
    </tbody>
</table>
<hr/>

<table >
<caption>Detalle de Login</caption>
    <thead>
	<tr>
	    <td>Tipo</td>
	    <th>Título</th>
	    <th>Cuerpo</th>
	    <th>Fecha</th>
	    <th>IP</th>

	</tr>
    </thead>
    <tbody>
	<tr>
	<?php foreach($tipo as $indice => $valor){
	    if($tipo[$indice] == 'Login'){ ?>
	    <b><th><?php echo $tipo[$indice]; ?></th>
	    <td><?php echo $titulo[$indice]?></td> 
	    <td><?php echo $cuerpo[$indice]?></td> 	   
	    <td><?php echo $fecha[$indice]. ' '.$hora[$indice] ?></td>
	    <td><?php echo $ip[$indice]?></td></b>

	</tr>
	<?php  } }  ?>	
    </tbody>
</table>

<hr/>

<table >
<caption>Detalle de Registros</caption>
    <thead>
	<tr>
	    <td>Tipo</td>
	    <th>Título</th>
	    <th>Cuerpo</th>
	    <th>Fecha</th>
	    <th>IP</th>

	</tr>
    </thead>
    <tbody>
	<tr>
	<?php foreach($tipo as $indice => $valor){
	    if($tipo[$indice] == 'Registro'){ ?>
	    <b><th><?php echo $tipo[$indice]; ?></th>
	    <td><?php echo $titulo[$indice]?></td> 
	    <td><?php echo $cuerpo[$indice]?></td> 	   
	    <td><?php echo $fecha[$indice]. ' '.$hora[$indice] ?></td>
	    <td><?php echo $ip[$indice]?></td></b>

	</tr>
	<?php  } }  ?>	
    </tbody>
</table>

<hr/>

<table >
<caption>Detalle de Alumnos Ingresados</caption>
    <thead>
	<tr>
	    <td>Tipo</td>
	    <th>Título</th>
	    <th>Cuerpo</th>
	    <th>Fecha</th>
	    <th>IP</th>

	</tr>
    </thead>
    <tbody>
	<tr>
	<?php foreach($tipo as $indice => $valor){
	    if($tipo[$indice] == 'AddAlumno'){ ?>
	    <b><th><?php echo $tipo[$indice]; ?></th>
	    <td><?php echo $titulo[$indice]?></td> 
	    <td><?php echo $cuerpo[$indice]?></td> 	   
	    <td><?php echo $fecha[$indice]. ' '.$hora[$indice] ?></td>
	    <td><?php echo $ip[$indice]?></td></b>

	</tr>
	<?php  } }  ?>	
    </tbody>
</table>

<hr/>

<table >
<caption>Detalle de Alumnos Eliminados</caption>
    <thead>
	<tr>
	    <td>Tipo</td>
	    <th>Título</th>
	    <th>Cuerpo</th>
	    <th>Fecha</th>
	    <th>IP</th>

	</tr>
    </thead>
    <tbody>
	<tr>
	<?php foreach($tipo as $indice => $valor){
	    if($tipo[$indice] == 'DelAlumno'){ ?>
	    <b><th><?php echo $tipo[$indice]; ?></th>
	    <td><?php echo $titulo[$indice]?></td> 
	    <td><?php echo $cuerpo[$indice]?></td> 	   
	    <td><?php echo $fecha[$indice]. ' '.$hora[$indice] ?></td>
	    <td><?php echo $ip[$indice]?></td></b>

	</tr>
	<?php  } }  ?>	
    </tbody>
</table>

<hr/>

<table >
<caption>Detalle de Alumnos Editados</caption>
    <thead>
	<tr>
	    <td>Tipo</td>
	    <th>Título</th>
	    <th>Cuerpo</th>
	    <th>Fecha</th>
	    <th>IP</th>

	</tr>
    </thead>
    <tbody>
	<tr>
	<?php foreach($tipo as $indice => $valor){
	    if($tipo[$indice] == 'EditAlumno'){ ?>
	    <b><th><?php echo $tipo[$indice]; ?></th>
	    <td><?php echo $titulo[$indice]?></td> 
	    <td><?php echo $cuerpo[$indice]?></td> 	   
	    <td><?php echo $fecha[$indice]. ' '.$hora[$indice] ?></td>
	    <td><?php echo $ip[$indice]?></td></b>

	</tr>
	<?php  } }  ?>	
    </tbody>
</table>

<hr/>

<table >
<caption>Detalle de Pruebas Ingresadas</caption>
    <thead>
	<tr>
	    <td>Tipo</td>
	    <th>Título</th>
	    <th>Cuerpo</th>
	    <th>Fecha</th>
	    <th>IP</th>

	</tr>
    </thead>
    <tbody>
	<tr>
	<?php foreach($tipo as $indice => $valor){
	    if($tipo[$indice] == 'AddPrba'){ ?>
	    <b><th><?php echo $tipo[$indice]; ?></th>
	    <td><?php echo $titulo[$indice]?></td> 
	    <td><?php echo $cuerpo[$indice]?></td> 	   
	    <td><?php echo $fecha[$indice]. ' '.$hora[$indice] ?></td>
	    <td><?php echo $ip[$indice]?></td></b>

	</tr>
	<?php  } }  ?>	
    </tbody>
</table>

<hr/>

<table >
<caption>Detalle de Pruebas Eliminadas</caption>
    <thead>
	<tr>
	    <td>Tipo</td>
	    <th>Título</th>
	    <th>Cuerpo</th>
	    <th>Fecha</th>
	    <th>IP</th>

	</tr>
    </thead>
    <tbody>
	<tr>
	<?php foreach($tipo as $indice => $valor){
	    if($tipo[$indice] == 'DelPrba'){ ?>
	    <b><th><?php echo $tipo[$indice]; ?></th>
	    <td><?php echo $titulo[$indice]?></td> 
	    <td><?php echo $cuerpo[$indice]?></td> 	   
	    <td><?php echo $fecha[$indice]. ' '.$hora[$indice] ?></td>
	    <td><?php echo $ip[$indice]?></td></b>

	</tr>
	<?php  } }  ?>	
    </tbody>
</table>

<hr/>

<table >
<caption>Detalle de Pruebas Modificadas</caption>
    <thead>
	<tr>
	    <td>Tipo</td>
	    <th>Título</th>
	    <th>Cuerpo</th>
	    <th>Fecha</th>
	    <th>IP</th>

	</tr>
    </thead>
    <tbody>
	<tr>
	<?php foreach($tipo as $indice => $valor){
	    if($tipo[$indice] == 'EditPrba'){ ?>
	    <b><th><?php echo $tipo[$indice]; ?></th>
	    <td><?php echo $titulo[$indice]?></td> 
	    <td><?php echo $cuerpo[$indice]?></td> 	   
	    <td><?php echo $fecha[$indice]. ' '.$hora[$indice] ?></td>
	    <td><?php echo $ip[$indice]?></td></b>

	</tr>
	<?php  } }  ?>	
    </tbody>
</table>


<br/><br/><br/><button onClick="javascript:history.go(-1)">Atrás!</a></button>

</div>

<br/><br/>
<h2>Proyecto Educativo NST.<a href="?controlador=Nst&accion=logout">Cerrar Sesión</a></h2>
</div>
</center>
    <!-- Libreria UI Custom + Core -->
    <script src="js/jquery-1.4.2.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui-1.8.2.custom.min.js" type="text/javascript"></script>

</body>
</html>
