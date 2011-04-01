<?php if($_SESSION['es_admin'] != 1) header("Location:?controlador=Admin");

$cont = 0;
$ccg = 0;
$ccp = 0;
while($a = $profesor->fetch()){
		$nombre[]   =	$a['0']. ' '. $a['1'];
		$email[]    =	$a['2'];
		$ingreso[]  =	cambia_a_normal($a['3']);
		$cuenta[]   =	$a['4'];
		if($a['4'] == 'Gratis') $ccg++;
		if($a['4'] == 'Pro') $ccp++;
		$cont ++;
		$colegio[]    =	$a['5'];
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cuentas Profesor - Panel de Administración y Estadísticas.</title>

<link type="text/css" rel="stylesheet" href="css/general.css" />
<link type="text/css" rel="stylesheet" href="css/jquery-ui-1.8.2.custom.css" />
</head>
<body>
<center>
 <br/><br/><div id="cuentas"><br/>

<div id="aboutNST">
    <h1>Cuentas Profesor - Panel de Administración y Estadísticas.</h1><br/>
    Número Total de Cuentas: <?php echo $cont; ?> <br/>
    Número Total de Cuentas Gratis : <?php echo $ccg; ?> <br/>
    Número Total de Cuentas Pro: <?php echo $ccp;?> <br/>

<hr/>

<table >
<caption>Detalle de Cuentas Profesor</caption>
    <thead>
	<tr>
	    <td>Lista de Profesores</td>
	    <th>Email</th>
	    <th>Ingreso</th>
	    <th>Cuenta</th>
	    <th>Colegio</th>

	</tr>
    </thead>
    <tbody>
	<tr>
	<?php foreach($nombre as $indice => $valor){ ?>
	    <b><th><?php echo $nombre[$indice]; ?></th>
	    <td><?php echo $email[$indice]?></td> 
	    <td><?php echo $ingreso[$indice]?></td> 	   
	    <td><?php echo $cuenta[$indice]?></td>
	    <td><?php echo $colegio[$indice]?></td></b>

	</tr>
	<?php  }  ?>	
    </tbody>
</table>
<hr/>

<table >
<caption>Detalle de Cuentas Pro</caption>
    <thead>
	<tr>
	    <td>Lista de Profesores</td>
	    <th>Email</th>
	    <th>Ingreso</th>
	    <th>Cuenta</th>
	    <th>Colegio</th>

	</tr>
    </thead>
    <tbody>
	<tr>
	<?php foreach($nombre as $indice => $valor){ 
	    if($cuenta[$indice] == 'Pro'){ ?>		
	    <th><?php echo $nombre[$indice]; ?></th>
	    <td><?php echo $email[$indice]?></td> 
	    <td><?php echo $ingreso[$indice]?></td> 	   
	    <td><?php echo $cuenta[$indice]?></td>
	    <td><?php echo $colegio[$indice]?></td>

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
