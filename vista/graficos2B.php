<?php
/* Si la variable sessión está vacía  o no existe */
if(empty($_SESSION['nst_SESION']) AND !isset($_SESSION['nst_SESION'])){ header("Location:?controlador=Login");}

$num_list = '0';

while($datos = $graficos->fetch()){
    
    $puntaje_z[] = $datos['0'];
    $puntaje_p[] = $datos['1'];
    $puntaje_t[] = $datos['2'];
    $nombre[] = $datos['3'];
    $apellido[] = $datos['4'];
    $puntaje[] = $datos['5'];
    $nivel_curso = $datos['6'];
    $letra_curso = $datos['7'];
    $formato = $datos['8'];
    $fecha = $datos['9'];
    $num_list++;
    $lista[] = $num_list;

    $grafico2B10[] = $datos['10'];
    $grafico2B11[] = $datos['11'];
    $grafico2B12[] = $datos['12'];
    $grafico2B13[] = $datos['13'];
    $grafico2B14[] = $datos['14'];
    $grafico2B15[] = $datos['15'];
    $grafico2B16[] = $datos['16'];
    $grafico2B20[] = $datos['17'];
    $grafico2B21[] = $datos['18'];
    $grafico2B22[] = $datos['19'];
    $grafico2B23[] = $datos['20'];
    $grafico2B24[] = $datos['21'];
    $grafico2B25[] = $datos['22'];
    $grafico2B26[] = $datos['23'];
    $grafico2B27[] = $datos['24'];
    $grafico2B30[] = $datos['25'];
    $grafico2B31[] = $datos['26'];
    $grafico2B32[] = $datos['27'];
    $grafico2B33[] = $datos['28'];
    $grafico2B34[] = $datos['29'];
    $grafico2B35[] = $datos['30'];
    $grafico2B36[] = $datos['31'];
    $grafico2B37[] = $datos['32'];
    $grafico2B40[] = $datos['33'];
    $grafico2B41[] = $datos['34'];
    $grafico2B42[] = $datos['35'];
    $grafico2B43[] = $datos['36'];
    $grafico2B44[] = $datos['37'];
    $grafico2B45[] = $datos['38'];
    $grafico2B46[] = $datos['39'];  
    $grafico2B47[] = $datos['40'];  

    $PZA[]  = $datos['41'];
    $PPA[]  = $datos['42'];
    $PTA[]  = $datos['43'];
    $PTJE[] = $datos['44'];
    $DIFZ[] = $datos['45'];
    $DIFT[] = $datos['46'];
    $DIFP[] = $datos['47'];
    $DIFPT[]= $datos['48'];
    $DIFZA[] = $datos['49'];
    $DIFTA[] = $datos['50'];
    $DIFPA[] = $datos['51'];
    $DIFPTA[]= $datos['52'];   

}
$fecha = cambia_a_normal($fecha); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>	
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <title>Graficos del colegio : <?php echo $fecha . " " . $_SESSION['wraprof_NOMBRE_COLEGIO'] . ",  " . $nivel_curso.$letra_curso . " Formato de la Prueba : " . $formato ;?></title>
    <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
    <script type="text/javascript" src="js/grafico.js"></script>
    <link rel="stylesheet" href="css/grafosCSS.css" type="text/css" media="screen" />
</head>
<body>
<center>
<div id="informe">
<div id="tabla_general">
<table>
<caption><?php echo $fecha . ", " . $_SESSION['wraprof_NOMBRE_COLEGIO'] . ",  " . $nivel_curso.$letra_curso . " Formato de la Prueba : " . $formato ;?></caption>
    <thead>
	<tr>
	    <td>Lista del Curso</td>
	    <th>Puntaje Prueba</th>   
	    <th>Puntaje Z</th>
	    <th>Percentil</th>
	    <th>Puntaje T</th>
	</tr>
    </thead>
    <tbody>
	<tr>
	<?php foreach($nombre as $indice => $valor){ ?>
	    
	    <th><?php echo $lista[$indice] . ".- " .$nombre[$indice] . " " . $apellido[$indice]; ?></th>
	    <td><?php echo $puntaje[$indice]?></td>			    
	    <td><?php echo $puntaje_z[$indice]?></td>
	    <td><?php echo $puntaje_p[$indice]?></td>
	    <td><?php echo $puntaje_t[$indice]?></td>
	</tr>
	<?php  }  ?>	
    </tbody>
</table>
</div>
    
    <?php   $suma_media = '0';
	foreach($puntaje as $indice =>$valor){
	    $suma_media = $puntaje[$indice] + $suma_media;}
	    $media = $suma_media/($num_list - 1);
	    echo "El puntaje promedio es = " .  $media ;?>

<hr/><hr/>
<br/><br/><br/>
<img src="?controlador=Informes&accion=graficoZ" /><br/><br/><br/>

<div id="puntaje_z">
<table>
    <caption><?php echo $fecha . ", " . $_SESSION['wraprof_NOMBRE_COLEGIO'] . ",  " . $nivel_curso.$letra_curso . " Formato de la Prueba : " . $formato; ?></caption>
    <thead>
	<tr>
	    <td>Lista del Curso</td>   
	    <th>Puntaje Z</th>
	</tr>
    </thead>
    <tbody>
	<tr>
	    <?php foreach($nombre as $indice => $valor){ ?>
	    <th scope="row"><?php echo $lista[$indice] . ".-" . $nombre[$indice] . " " . $apellido[$indice]; ?></th>
	    <td><?php echo $puntaje_z[$indice]?></td>
	</tr>
	<?php }  ?>	
    </tbody>
</table>
</div>

    <?php   $suma_media = '0';
	foreach($puntaje_z as $indice =>$valor){ $suma_media = $puntaje_z[$indice] + $suma_media;}
		$media = $suma_media/($num_list - 1);
	        echo "El puntaje Z promedio es = " .  $media ; ?>

<hr/><hr/>
<br/><br/><br/>
<img src="?controlador=Informes&accion=graficoP" /><br/><br/><br/>

<div id="puntaje_p">
<table>
    <caption><?php echo $fecha . ", " . $_SESSION['wraprof_NOMBRE_COLEGIO'] . ",  " . $nivel_curso.$letra_curso  . " Formato de la Prueba : " . $formato;?></caption>
    <thead>
	<tr>
	    <td>Lista del Curso</td>   
	    <th>Percentil</th>
	</tr>
    </thead>
    <tbody>
	<tr>
	    <?php foreach($nombre as $indice => $valor){ ?>
	    <th scope="row"><?php echo $lista[$indice] . ".-" . $nombre[$indice] . " " . $apellido[$indice]; ?></th>
	    <td><?php echo $puntaje_p[$indice]?></td>
	</tr>
	<?php }  ?>	
    </tbody>
</table>
</div>

    <?php   $suma_media = '0';
	foreach($puntaje_p as $indice =>$valor){ $suma_media = $puntaje_p[$indice] + $suma_media;}
	    $media = $suma_media/($num_list - 1);
	    echo "El percentil promedio es = " .  $media ;?>

<hr/><hr/>
<br/><br/><br/>
<img src="?controlador=Informes&accion=graficoT" /><br/><br/><br/>

<div id="puntaje_t">
<table>
    <caption><?php echo $fecha . ", " . $_SESSION['wraprof_NOMBRE_COLEGIO'] . ",  " . $nivel_curso.$letra_curso . " Formato de la Prueba : " . $formato; ?></caption>
    <thead>
	<tr>
	    <td>Lista del Curso</td>   
	    <th>Puntaje T</th>
	</tr>
    </thead>
    <tbody>
	<tr>
	    <?php foreach($nombre as $indice => $valor){ ?>
	    <th scope="row"><?php echo $lista[$indice] . ".-" . $nombre[$indice] . " " . $apellido[$indice]; ?></th>
	    <td><?php echo $puntaje_t[$indice]?></td>
	</tr>
	<?php }  ?>	
    </tbody>
</table>
</div>
    <?php   $suma_media = '0';
    foreach($puntaje_t as $indice =>$valor){ $suma_media = $puntaje_t[$indice] + $suma_media;}
	$media = $suma_media/($num_list - 1);
	echo "El puntaje T promedio es = " .  $media ;?>

<hr/><hr/>
<br/><br/><br/>
Gráfico de Torta según respuestas en la prueba:
<br/>

<h2>Pregunta Número 1 : "José, Tomás y Francisco..."</h2><br/>

<img src="?controlador=Informes&accion=grafico_2B10" /><br/><br/><br/>
Nomenclatura: <br/>
<ul>
    <li>"0. José y Tomás.",</li>
    <li>"1. Francisco y Tomás.",</li>
    <li>"2. Tomás, José y Francisco.",</li>
    <li>"3. Francisco y Jośe.",</li>
</ul>
<br/>

<table>
    <caption><?php echo $fecha . ", " . $_SESSION['wraprof_NOMBRE_COLEGIO'] . ",  " . $nivel_curso.$letra_curso . " Formato de la Prueba : " . $formato; ?></caption>
    <thead>
	<tr>
	    <td>Lista del Curso</td>   
	    <th>Respuestas</th>
	</tr>
    </thead>
    <tbody>
	<tr>
	    <?php foreach($nombre as $indice => $valor){ ?>
	    <th scope="row"><?php echo $lista[$indice] . ".-" . $nombre[$indice] . " " . $apellido[$indice]; ?></th>
	    <td><?php echo $grafico2B10[$indice]?></td>
	</tr>
	<?php }  ?>	
    </tbody>
</table>


<img src="?controlador=Informes&accion=grafico_2B11" /><br/><br/><br/>
Nomenclatura: <br/>
<ul>
    <li>"0. Francisco.",</li>
    <li>"1. José.",</li>
    <li>"2. Tomás.",</li>
    <li>"3. Tomás y Jośe.",</li>
</ul>
<br/>

<table>
    <caption><?php echo $fecha . ", " . $_SESSION['wraprof_NOMBRE_COLEGIO'] . ",  " . $nivel_curso.$letra_curso . " Formato de la Prueba : " . $formato; ?></caption>
    <thead>
	<tr>
	    <td>Lista del Curso</td>   
	    <th>Respuestas</th>
	</tr>
    </thead>
    <tbody>
	<tr>
	    <?php foreach($nombre as $indice => $valor){ ?>
	    <th scope="row"><?php echo $lista[$indice] . ".-" . $nombre[$indice] . " " . $apellido[$indice]; ?></th>
	    <td><?php echo $grafico2B11[$indice]?></td>
	</tr>
	<?php }  ?>	
    </tbody>
</table>


<img src="?controlador=Informes&accion=grafico_2B12" /><br/><br/><br/>
Nomenclatura: <br/>
<ul>
    <li>"0. José.",</li>
    <li>"1. Francisco.",</li>
    <li>"2. Tomás.",</li>
    <li>"3. Francisco y Tomás.",</li>
</ul>
<br/>

<table>
    <caption><?php echo $fecha . ", " . $_SESSION['wraprof_NOMBRE_COLEGIO'] . ",  " . $nivel_curso.$letra_curso . " Formato de la Prueba : " . $formato; ?></caption>
    <thead>
	<tr>
	    <td>Lista del Curso</td>   
	    <th>Respuestas</th>
	</tr>
    </thead>
    <tbody>
	<tr>
	    <?php foreach($nombre as $indice => $valor){ ?>
	    <th scope="row"><?php echo $lista[$indice] . ".-" . $nombre[$indice] . " " . $apellido[$indice]; ?></th>
	    <td><?php echo $grafico2B12[$indice]?></td>
	</tr>
	<?php }  ?>	
    </tbody>
</table>


<img src="?controlador=Informes&accion=grafico_2B13" /><br/><br/><br/>
Nomenclatura: <br/>
<ul>
    <li>"0. Tomás.",</li>
    <li>"1. José.",</li>
    <li>"2. Tomás y Francisco.",</li>
    <li>"3. Francisco.",</li>
</ul>
<br/>
<table>
    <caption><?php echo $fecha . ", " . $_SESSION['wraprof_NOMBRE_COLEGIO'] . ",  " . $nivel_curso.$letra_curso . " Formato de la Prueba : " . $formato; ?></caption>
    <thead>
	<tr>
	    <td>Lista del Curso</td>   
	    <th>Respuestas</th>
	</tr>
    </thead>
    <tbody>
	<tr>
	    <?php foreach($nombre as $indice => $valor){ ?>
	    <th scope="row"><?php echo $lista[$indice] . ".-" . $nombre[$indice] . " " . $apellido[$indice]; ?></th>
	    <td><?php echo $grafico2B13[$indice]?></td>
	</tr>
	<?php }  ?>	
    </tbody>
</table>


<img src="?controlador=Informes&accion=grafico_2B14" /><br/><br/><br/>
Nomenclatura: <br/>
<ul>
    <li>"0. Tomás.",</li>
    <li>"1. José.",</li>
    <li>"2. Francisco.",</li>
    <li>"3. Todos llevaban mochila.",</li>
</ul>
<br/>

<table>
    <caption><?php echo $fecha . ", " . $_SESSION['wraprof_NOMBRE_COLEGIO'] . ",  " . $nivel_curso.$letra_curso . " Formato de la Prueba : " . $formato; ?></caption>
    <thead>
	<tr>
	    <td>Lista del Curso</td>   
	    <th>Respuestas</th>
	</tr>
    </thead>
    <tbody>
	<tr>
	    <?php foreach($nombre as $indice => $valor){ ?>
	    <th scope="row"><?php echo $lista[$indice] . ".-" . $nombre[$indice] . " " . $apellido[$indice]; ?></th>
	    <td><?php echo $grafico2B14[$indice]?></td>
	</tr>
	<?php }  ?>	
    </tbody>
</table>


<img src="?controlador=Informes&accion=grafico_2B15" /><br/><br/><br/>
Nomenclatura: <br/>
<ul>
    <li>"0. Francisco y Tomás.",</li>
    <li>"1. Todos se ocuparon del fuego.",</li>
    <li>"2. José y Francisco",</li>
    <li>"3. Tomás y José.",</li>
</ul>
<br/>
<table>
    <caption><?php echo $fecha . ", " . $_SESSION['wraprof_NOMBRE_COLEGIO'] . ",  " . $nivel_curso.$letra_curso . " Formato de la Prueba : " . $formato; ?></caption>
    <thead>
	<tr>
	    <td>Lista del Curso</td>   
	    <th>Respuestas</th>
	</tr>
    </thead>
    <tbody>
	<tr>
	    <?php foreach($nombre as $indice => $valor){ ?>
	    <th scope="row"><?php echo $lista[$indice] . ".-" . $nombre[$indice] . " " . $apellido[$indice]; ?></th>
	    <td><?php echo $grafico2B15[$indice]?></td>
	</tr>
	<?php }  ?>	
    </tbody>
</table>


<img src="?controlador=Informes&accion=grafico_2B16" /><br/><br/><br/>
Nomenclatura: <br/>
<ul>
    <li>"0. Francisco.",</li>
    <li>"1. José.",</li>
    <li>"2. Tomás.",</li>
    <li>"3. Todos.",</li>
</ul>
<br/>
<table>
    <caption><?php echo $fecha . ", " . $_SESSION['wraprof_NOMBRE_COLEGIO'] . ",  " . $nivel_curso.$letra_curso . " Formato de la Prueba : " . $formato; ?></caption>
    <thead>
	<tr>
	    <td>Lista del Curso</td>   
	    <th>Respuestas</th>
	</tr>
    </thead>
    <tbody>
	<tr>
	    <?php foreach($nombre as $indice => $valor){ ?>
	    <th scope="row"><?php echo $lista[$indice] . ".-" . $nombre[$indice] . " " . $apellido[$indice]; ?></th>
	    <td><?php echo $grafico2B16[$indice]?></td>
	</tr>
	<?php }  ?>	
    </tbody>
</table>

<hr/><br/><br/><br/>

<h2>Pregunta Número 2 : "Los Botes..."</h2><br/>
<img src="?controlador=Informes&accion=grafico_2B20" /><br/><br/><br/>

Nomenclatura: <br/>
<ul>
	    <li>0. Los botes tienen...</li>
	    <li>1. Las escobas sirven para...</li>
	    <li>2. En los ríos hay mucha...</li>
	    <li>3. En la cabeza tenemos dos...</li>
	    <li>4. Ese niño fue abrir la...</li>
	    <li>5. Las bicicletas tienen dos...</li>
	    <li>6. En mi mano tengo cinco...</li>
	    <li>7. Hay flores en los...</li>
</ul>
<br/>
<table>
    <caption><?php echo $fecha . ", " . $_SESSION['wraprof_NOMBRE_COLEGIO'] . ",  " . $nivel_curso.$letra_curso . " Formato de la Prueba : " . $formato; ?></caption>
    <thead>
	<tr>
	    <td>Lista del Curso</td>   
	    <th>Respuestas</th>
	</tr>
    </thead>
    <tbody>
	<tr>
	    <?php foreach($nombre as $indice => $valor){ ?>
	    <th scope="row"><?php echo $lista[$indice] . ".-" . $nombre[$indice] . " " . $apellido[$indice]; ?></th>
	    <td><?php echo $grafico2B20[$indice]?></td>
	</tr>
	<?php }  ?>	
    </tbody>
</table>

<br/><br/><br/>

<img src="?controlador=Informes&accion=grafico_2B21" /><br/><br/><br/>
Nomenclatura: <br/>
<ul>
	    <li>0. Los botes tienen...</li>
	    <li>1. Las escobas sirven para...</li>
	    <li>2. En los ríos hay mucha...</li>
	    <li>3. En la cabeza tenemos dos...</li>
	    <li>4. Ese niño fue abrir la...</li>
	    <li>5. Las bicicletas tienen dos...</li>
	    <li>6. En mi mano tengo cinco...</li>
	    <li>7. Hay flores en los...</li>
</ul>
<br/>
<table>
    <caption><?php echo $fecha . ", " . $_SESSION['wraprof_NOMBRE_COLEGIO'] . ",  " . $nivel_curso.$letra_curso . " Formato de la Prueba : " . $formato; ?></caption>
    <thead>
	<tr>
	    <td>Lista del Curso</td>   
	    <th>Respuestas</th>
	</tr>
    </thead>
    <tbody>
	<tr>
	    <?php foreach($nombre as $indice => $valor){ ?>
	    <th scope="row"><?php echo $lista[$indice] . ".-" . $nombre[$indice] . " " . $apellido[$indice]; ?></th>
	    <td><?php echo $grafico2B21[$indice]?></td>
	</tr>
	<?php }  ?>	
    </tbody>
</table>


<br/><br/><br/>


<img src="?controlador=Informes&accion=grafico_2B22" /><br/><br/><br/>
Nomenclatura: <br/>
<ul>
	    <li>0. Los botes tienen...</li>
	    <li>1. Las escobas sirven para...</li>
	    <li>2. En los ríos hay mucha...</li>
	    <li>3. En la cabeza tenemos dos...</li>
	    <li>4. Ese niño fue abrir la...</li>
	    <li>5. Las bicicletas tienen dos...</li>
	    <li>6. En mi mano tengo cinco...</li>
	    <li>7. Hay flores en los...</li>
</ul>
<br/>
<table>
    <caption><?php echo $fecha . ", " . $_SESSION['wraprof_NOMBRE_COLEGIO'] . ",  " . $nivel_curso.$letra_curso . " Formato de la Prueba : " . $formato; ?></caption>
    <thead>
	<tr>
	    <td>Lista del Curso</td>   
	    <th>Respuestas</th>
	</tr>
    </thead>
    <tbody>
	<tr>
	    <?php foreach($nombre as $indice => $valor){ ?>
	    <th scope="row"><?php echo $lista[$indice] . ".-" . $nombre[$indice] . " " . $apellido[$indice]; ?></th>
	    <td><?php echo $grafico2B22[$indice]?></td>
	</tr>
	<?php }  ?>	
    </tbody>
</table>

<br/><br/><br/>

<img src="?controlador=Informes&accion=grafico_2B23" /><br/><br/><br/>
Nomenclatura: <br/>
<ul>
	    <li>0. Los botes tienen...</li>
	    <li>1. Las escobas sirven para...</li>
	    <li>2. En los ríos hay mucha...</li>
	    <li>3. En la cabeza tenemos dos...</li>
	    <li>4. Ese niño fue abrir la...</li>
	    <li>5. Las bicicletas tienen dos...</li>
	    <li>6. En mi mano tengo cinco...</li>
	    <li>7. Hay flores en los...</li>
</ul>
<br/>
<table>
    <caption><?php echo $fecha . ", " . $_SESSION['wraprof_NOMBRE_COLEGIO'] . ",  " . $nivel_curso.$letra_curso . " Formato de la Prueba : " . $formato; ?></caption>
    <thead>
	<tr>
	    <td>Lista del Curso</td>   
	    <th>Respuestas</th>
	</tr>
    </thead>
    <tbody>
	<tr>
	    <?php foreach($nombre as $indice => $valor){ ?>
	    <th scope="row"><?php echo $lista[$indice] . ".-" . $nombre[$indice] . " " . $apellido[$indice]; ?></th>
	    <td><?php echo $grafico2B23[$indice]?></td>
	</tr>
	<?php }  ?>	
    </tbody>
</table>

<br/><br/><br/>

<img src="?controlador=Informes&accion=grafico_2B24" /><br/><br/><br/>
Nomenclatura: <br/>
<ul>
	    <li>0. Los botes tienen...</li>
	    <li>1. Las escobas sirven para...</li>
	    <li>2. En los ríos hay mucha...</li>
	    <li>3. En la cabeza tenemos dos...</li>
	    <li>4. Ese niño fue abrir la...</li>
	    <li>5. Las bicicletas tienen dos...</li>
	    <li>6. En mi mano tengo cinco...</li>
	    <li>7. Hay flores en los...</li>
</ul>
<br/>
<table>
    <caption><?php echo $fecha . ", " . $_SESSION['wraprof_NOMBRE_COLEGIO'] . ",  " . $nivel_curso.$letra_curso . " Formato de la Prueba : " . $formato; ?></caption>
    <thead>
	<tr>
	    <td>Lista del Curso</td>   
	    <th>Respuestas</th>
	</tr>
    </thead>
    <tbody>
	<tr>
	    <?php foreach($nombre as $indice => $valor){ ?>
	    <th scope="row"><?php echo $lista[$indice] . ".-" . $nombre[$indice] . " " . $apellido[$indice]; ?></th>
	    <td><?php echo $grafico2B24[$indice]?></td>
	</tr>
	<?php }  ?>	
    </tbody>
</table>

<br/><br/><br/>

<img src="?controlador=Informes&accion=grafico_2B25" /><br/><br/><br/>
Nomenclatura: <br/>
<ul>
	    <li>0. Los botes tienen...</li>
	    <li>1. Las escobas sirven para...</li>
	    <li>2. En los ríos hay mucha...</li>
	    <li>3. En la cabeza tenemos dos...</li>
	    <li>4. Ese niño fue abrir la...</li>
	    <li>5. Las bicicletas tienen dos...</li>
	    <li>6. En mi mano tengo cinco...</li>
	    <li>7. Hay flores en los...</li>
</ul>
<br/>
<table>
    <caption><?php echo $fecha . ", " . $_SESSION['wraprof_NOMBRE_COLEGIO'] . ",  " . $nivel_curso.$letra_curso . " Formato de la Prueba : " . $formato; ?></caption>
    <thead>
	<tr>
	    <td>Lista del Curso</td>   
	    <th>Respuestas</th>
	</tr>
    </thead>
    <tbody>
	<tr>
	    <?php foreach($nombre as $indice => $valor){ ?>
	    <th scope="row"><?php echo $lista[$indice] . ".-" . $nombre[$indice] . " " . $apellido[$indice]; ?></th>
	    <td><?php echo $grafico2B25[$indice]?></td>
	</tr>
	<?php }  ?>	
    </tbody>
</table>


<br/><br/><br/>

<img src="?controlador=Informes&accion=grafico_2B26" /><br/><br/><br/>
Nomenclatura: <br/>
<ul>
	    <li>0. Los botes tienen...</li>
	    <li>1. Las escobas sirven para...</li>
	    <li>2. En los ríos hay mucha...</li>
	    <li>3. En la cabeza tenemos dos...</li>
	    <li>4. Ese niño fue abrir la...</li>
	    <li>5. Las bicicletas tienen dos...</li>
	    <li>6. En mi mano tengo cinco...</li>
	    <li>7. Hay flores en los...</li>
</ul>
<br/>
<table>
    <caption><?php echo $fecha . ", " . $_SESSION['wraprof_NOMBRE_COLEGIO'] . ",  " . $nivel_curso.$letra_curso . " Formato de la Prueba : " . $formato; ?></caption>
    <thead>
	<tr>
	    <td>Lista del Curso</td>   
	    <th>Respuestas</th>
	</tr>
    </thead>
    <tbody>
	<tr>
	    <?php foreach($nombre as $indice => $valor){ ?>
	    <th scope="row"><?php echo $lista[$indice] . ".-" . $nombre[$indice] . " " . $apellido[$indice]; ?></th>
	    <td><?php echo $grafico2B26[$indice]?></td>
	</tr>
	<?php }  ?>	
    </tbody>
</table>

<br/><br/><br/>

<img src="?controlador=Informes&accion=grafico_2B27" /><br/><br/><br/>
Nomenclatura: <br/>
<ul>
	    <li>0. Los botes tienen...</li>
	    <li>1. Las escobas sirven para...</li>
	    <li>2. En los ríos hay mucha...</li>
	    <li>3. En la cabeza tenemos dos...</li>
	    <li>4. Ese niño fue abrir la...</li>
	    <li>5. Las bicicletas tienen dos...</li>
	    <li>6. En mi mano tengo cinco...</li>
	    <li>7. Hay flores en los...</li>

</ul>
<br/>
<table>
    <caption><?php echo $fecha . ", " . $_SESSION['wraprof_NOMBRE_COLEGIO'] . ",  " . $nivel_curso.$letra_curso . " Formato de la Prueba : " . $formato; ?></caption>
    <thead>
	<tr>
	    <td>Lista del Curso</td>   
	    <th>Respuestas</th>
	</tr>
    </thead>
    <tbody>
	<tr>
	    <?php foreach($nombre as $indice => $valor){ ?>
	    <th scope="row"><?php echo $lista[$indice] . ".-" . $nombre[$indice] . " " . $apellido[$indice]; ?></th>
	    <td><?php echo $grafico2B27[$indice]?></td>
	</tr>
	<?php }  ?>	
    </tbody>
</table>


<hr/><br/><br/><br/>

<h2>Pregunta Número 3 : "Yo sé que los árboles..."</h2><br/>
<br/><br/><br/>

<img src="?controlador=Informes&accion=grafico_2B30" /><br/><br/><br/>
Nomenclatura: <br/>
<ul>
	    <li>0. Yo sé que los árboles tienen...</li>
	    <li>1. Las casas tienen...</li>	
	    <li>2. Algunas armas de los indios eran...</li>	
	    <li>3. Los carpinteros usan...</li>	
	    <li>4. Para comer usamos...</li>	
	    <li>5. Los alimentos se pueden cocinar en...</li>	
	    <li>6. Para coser un género se necesitan..</li>	
	    <li>7. Para limpiar una casa se usan...</li>					
</ul>
<br/>
<table>
    <caption><?php echo $fecha . ", " . $_SESSION['wraprof_NOMBRE_COLEGIO'] . ",  " . $nivel_curso.$letra_curso . " Formato de la Prueba : " . $formato; ?></caption>
    <thead>
	<tr>
	    <td>Lista del Curso</td>   
	    <th>Respuestas</th>
	</tr>
    </thead>
    <tbody>
	<tr>
	    <?php foreach($nombre as $indice => $valor){ ?>
	    <th scope="row"><?php echo $lista[$indice] . ".-" . $nombre[$indice] . " " . $apellido[$indice]; ?></th>
	    <td><?php echo $grafico2B30[$indice]?></td>
	</tr>
	<?php }  ?>	
    </tbody>
</table>

<br/><br/><br/>

<img src="?controlador=Informes&accion=grafico_2B31" /><br/><br/><br/>
Nomenclatura: <br/>
<ul>
	    <li>0. Yo sé que los árboles tienen...</li>
	    <li>1. Las casas tienen...</li>	
	    <li>2. Algunas armas de los indios eran...</li>	
	    <li>3. Los carpinteros usan...</li>	
	    <li>4. Para comer usamos...</li>	
	    <li>5. Los alimentos se pueden cocinar en...</li>	
	    <li>6. Para coser un género se necesitan..</li>	
	    <li>7. Para limpiar una casa se usan...</li>		
</ul>
<br/>
<table>
    <caption><?php echo $fecha . ", " . $_SESSION['wraprof_NOMBRE_COLEGIO'] . ",  " . $nivel_curso.$letra_curso . " Formato de la Prueba : " . $formato; ?></caption>
    <thead>
	<tr>
	    <td>Lista del Curso</td>   
	    <th>Respuestas</th>
	</tr>
    </thead>
    <tbody>
	<tr>
	    <?php foreach($nombre as $indice => $valor){ ?>
	    <th scope="row"><?php echo $lista[$indice] . ".-" . $nombre[$indice] . " " . $apellido[$indice]; ?></th>
	    <td><?php echo $grafico2B31[$indice]?></td>
	</tr>
	<?php }  ?>	
    </tbody>
</table>


<br/><br/><br/>

<img src="?controlador=Informes&accion=grafico_2B32" /><br/><br/><br/>
Nomenclatura: <br/>
<ul>
	    <li>0. Yo sé que los árboles tienen...</li>
	    <li>1. Las casas tienen...</li>	
	    <li>2. Algunas armas de los indios eran...</li>	
	    <li>3. Los carpinteros usan...</li>	
	    <li>4. Para comer usamos...</li>	
	    <li>5. Los alimentos se pueden cocinar en...</li>	
	    <li>6. Para coser un género se necesitan..</li>	
	    <li>7. Para limpiar una casa se usan...</li>			
</ul>
<br/>
<table>
    <caption><?php echo $fecha . ", " . $_SESSION['wraprof_NOMBRE_COLEGIO'] . ",  " . $nivel_curso.$letra_curso . " Formato de la Prueba : " . $formato; ?></caption>
    <thead>
	<tr>
	    <td>Lista del Curso</td>   
	    <th>Respuestas</th>
	</tr>
    </thead>
    <tbody>
	<tr>
	    <?php foreach($nombre as $indice => $valor){ ?>
	    <th scope="row"><?php echo $lista[$indice] . ".-" . $nombre[$indice] . " " . $apellido[$indice]; ?></th>
	    <td><?php echo $grafico2B32[$indice]?></td>
	</tr>
	<?php }  ?>	
    </tbody>
</table>

<br/><br/><br/>

<img src="?controlador=Informes&accion=grafico_2B33" /><br/><br/><br/>
Nomenclatura: <br/>
<ul>
  	    <li>0. Yo sé que los árboles tienen...</li>
	    <li>1. Las casas tienen...</li>	
	    <li>2. Algunas armas de los indios eran...</li>	
	    <li>3. Los carpinteros usan...</li>	
	    <li>4. Para comer usamos...</li>	
	    <li>5. Los alimentos se pueden cocinar en...</li>	
	    <li>6. Para coser un género se necesitan..</li>	
	    <li>7. Para limpiar una casa se usan...</li>			
</ul>
<br/>
<table>
    <caption><?php echo $fecha . ", " . $_SESSION['wraprof_NOMBRE_COLEGIO'] . ",  " . $nivel_curso.$letra_curso . " Formato de la Prueba : " . $formato; ?></caption>
    <thead>
	<tr>
	    <td>Lista del Curso</td>   
	    <th>Respuestas</th>
	</tr>
    </thead>
    <tbody>
	<tr>
	    <?php foreach($nombre as $indice => $valor){ ?>
	    <th scope="row"><?php echo $lista[$indice] . ".-" . $nombre[$indice] . " " . $apellido[$indice]; ?></th>
	    <td><?php echo $grafico2B33[$indice]?></td>
	</tr>
	<?php }  ?>	
    </tbody>
</table>

<br/><br/><br/>

<img src="?controlador=Informes&accion=grafico_2B34" /><br/><br/><br/>
Nomenclatura: <br/>
<ul>
  	    <li>0. Yo sé que los árboles tienen...</li>
	    <li>1. Las casas tienen...</li>	
	    <li>2. Algunas armas de los indios eran...</li>	
	    <li>3. Los carpinteros usan...</li>	
	    <li>4. Para comer usamos...</li>	
	    <li>5. Los alimentos se pueden cocinar en...</li>	
	    <li>6. Para coser un género se necesitan..</li>	
	    <li>7. Para limpiar una casa se usan...</li>				
</ul>
<br/>
<table>
    <caption><?php echo $fecha . ", " . $_SESSION['wraprof_NOMBRE_COLEGIO'] . ",  " . $nivel_curso.$letra_curso . " Formato de la Prueba : " . $formato; ?></caption>
    <thead>
	<tr>
	    <td>Lista del Curso</td>   
	    <th>Respuestas</th>
	</tr>
    </thead>
    <tbody>
	<tr>
	    <?php foreach($nombre as $indice => $valor){ ?>
	    <th scope="row"><?php echo $lista[$indice] . ".-" . $nombre[$indice] . " " . $apellido[$indice]; ?></th>
	    <td><?php echo $grafico2B34[$indice]?></td>
	</tr>
	<?php }  ?>	
    </tbody>
</table>

<br/><br/><br/>


<img src="?controlador=Informes&accion=grafico_2B35" /><br/><br/><br/>
Nomenclatura: <br/>
<ul>
  	    <li>0. Yo sé que los árboles tienen...</li>
	    <li>1. Las casas tienen...</li>	
	    <li>2. Algunas armas de los indios eran...</li>	
	    <li>3. Los carpinteros usan...</li>	
	    <li>4. Para comer usamos...</li>	
	    <li>5. Los alimentos se pueden cocinar en...</li>	
	    <li>6. Para coser un género se necesitan..</li>	
	    <li>7. Para limpiar una casa se usan...</li>			
</ul>
<br/>
<table>
    <caption><?php echo $fecha . ", " . $_SESSION['wraprof_NOMBRE_COLEGIO'] . ",  " . $nivel_curso.$letra_curso . " Formato de la Prueba : " . $formato; ?></caption>
    <thead>
	<tr>
	    <td>Lista del Curso</td>   
	    <th>Respuestas</th>
	</tr>
    </thead>
    <tbody>
	<tr>
	    <?php foreach($nombre as $indice => $valor){ ?>
	    <th scope="row"><?php echo $lista[$indice] . ".-" . $nombre[$indice] . " " . $apellido[$indice]; ?></th>
	    <td><?php echo $grafico2B35[$indice]?></td>
	</tr>
	<?php }  ?>	
    </tbody>
</table>

<br/><br/><br/>


<img src="?controlador=Informes&accion=grafico_2B36" /><br/><br/><br/>
Nomenclatura: <br/>
<ul>
  	    <li>0. Yo sé que los árboles tienen...</li>
	    <li>1. Las casas tienen...</li>	
	    <li>2. Algunas armas de los indios eran...</li>	
	    <li>3. Los carpinteros usan...</li>	
	    <li>4. Para comer usamos...</li>	
	    <li>5. Los alimentos se pueden cocinar en...</li>	
	    <li>6. Para coser un género se necesitan..</li>	
	    <li>7. Para limpiar una casa se usan...</li>		
</ul>
<br/>
<table>
    <caption><?php echo $fecha . ", " . $_SESSION['wraprof_NOMBRE_COLEGIO'] . ",  " . $nivel_curso.$letra_curso . " Formato de la Prueba : " . $formato; ?></caption>
    <thead>
	<tr>
	    <td>Lista del Curso</td>   
	    <th>Respuestas</th>
	</tr>
    </thead>
    <tbody>
	<tr>
	    <?php foreach($nombre as $indice => $valor){ ?>
	    <th scope="row"><?php echo $lista[$indice] . ".-" . $nombre[$indice] . " " . $apellido[$indice]; ?></th>
	    <td><?php echo $grafico2B36[$indice]?></td>
	</tr>
	<?php }  ?>	
    </tbody>
</table>

<br/><br/><br/>

<img src="?controlador=Informes&accion=grafico_2B37" /><br/><br/><br/>
Nomenclatura: <br/>
<ul>
  	    <li>0. Yo sé que los árboles tienen...</li>
	    <li>1. Las casas tienen...</li>	
	    <li>2. Algunas armas de los indios eran...</li>	
	    <li>3. Los carpinteros usan...</li>	
	    <li>4. Para comer usamos...</li>	
	    <li>5. Los alimentos se pueden cocinar en...</li>	
	    <li>6. Para coser un género se necesitan..</li>	
	    <li>7. Para limpiar una casa se usan...</li>				
</ul>
<br/>
<table>
    <caption><?php echo $fecha . ", " . $_SESSION['wraprof_NOMBRE_COLEGIO'] . ",  " . $nivel_curso.$letra_curso . " Formato de la Prueba : " . $formato; ?></caption>
    <thead>
	<tr>
	    <td>Lista del Curso</td>   
	    <th>Respuestas</th>
	</tr>
    </thead>
    <tbody>
	<tr>
	    <?php foreach($nombre as $indice => $valor){ ?>
	    <th scope="row"><?php echo $lista[$indice] . ".-" . $nombre[$indice] . " " . $apellido[$indice]; ?></th>
	    <td><?php echo $grafico2B37[$indice]?></td>
	</tr>
	<?php }  ?>	
    </tbody>
</table>



<hr/><br/><br/><br/>

<h2>Pregunta Número 4 : "Los colmillos..."</h2><br/>
<br/><br/><br/>

<img src="?controlador=Informes&accion=grafico_2B40" /><br/><br/><br/>
Nomenclatura: <br/>
<ul>
    <li>0. Casa</li>
    <li>1. Colchón</li>
    <li>2. Elefantes</li>
    <li>3. Niño</li>
    <li>4. Persianas</li>
    <li>5. Ventana</li>
    <li>6. Vidrios</li>
    <li>7. Colmillos</li>
</ul>
<br/>
<table>
    <caption><?php echo $fecha . ", " . $_SESSION['wraprof_NOMBRE_COLEGIO'] . ",  " . $nivel_curso.$letra_curso . " Formato de la Prueba : " . $formato; ?></caption>
    <thead>
	<tr>
	    <td>Lista del Curso</td>   
	    <th>Respuestas</th>
	</tr>
    </thead>
    <tbody>
	<tr>
	    <?php foreach($nombre as $indice => $valor){ ?>
	    <th scope="row"><?php echo $lista[$indice] . ".-" . $nombre[$indice] . " " . $apellido[$indice]; ?></th>
	    <td><?php echo $grafico2B40[$indice]?></td>
	</tr>
	<?php }  ?>	
    </tbody>
</table>

<br/><br/><br/>

<img src="?controlador=Informes&accion=grafico_2B41" />
<br/><br/><br/>
Nomenclatura: <br/>
<ul>
    <li>0. Casa</li>
    <li>1. Colchón</li>
    <li>2. Elefantes</li>
    <li>3. Niño</li>
    <li>4. Persianas</li>
    <li>5. Ventana</li>
    <li>6. Vidrios</li>
    <li>7. Colmillos</li>
</ul>
<br/>
<table>
    <caption><?php echo $fecha . ", " . $_SESSION['wraprof_NOMBRE_COLEGIO'] . ",  " . $nivel_curso.$letra_curso . " Formato de la Prueba : " . $formato; ?></caption>
    <thead>
	<tr>
	    <td>Lista del Curso</td>   
	    <th>Respuestas</th>
	</tr>
    </thead>
    <tbody>
	<tr>
	    <?php foreach($nombre as $indice => $valor){ ?>
	    <th scope="row"><?php echo $lista[$indice] . ".-" . $nombre[$indice] . " " . $apellido[$indice]; ?></th>
	    <td><?php echo $grafico2B41[$indice]?></td>
	</tr>
	<?php }  ?>	
    </tbody>
</table>

<br/><br/><br/>

<img src="?controlador=Informes&accion=grafico_2B42" />
<br/><br/><br/>
Nomenclatura: <br/>
<ul>
    <li>0. Casa</li>
    <li>1. Colchón</li>
    <li>2. Elefantes</li>
    <li>3. Niño</li>
    <li>4. Persianas</li>
    <li>5. Ventana</li>
    <li>6. Vidrios</li>
    <li>7. Colmillos</li>
</ul>
<br/>
<table>
    <caption><?php echo $fecha . ", " . $_SESSION['wraprof_NOMBRE_COLEGIO'] . ",  " . $nivel_curso.$letra_curso . " Formato de la Prueba : " . $formato; ?></caption>
    <thead>
	<tr>
	    <td>Lista del Curso</td>   
	    <th>Respuestas</th>
	</tr>
    </thead>
    <tbody>
	<tr>
	    <?php foreach($nombre as $indice => $valor){ ?>
	    <th scope="row"><?php echo $lista[$indice] . ".-" . $nombre[$indice] . " " . $apellido[$indice]; ?></th>
	    <td><?php echo $grafico2B42[$indice]?></td>
	</tr>
	<?php }  ?>	
    </tbody>
</table>

<br/><br/><br/>

<img src="?controlador=Informes&accion=grafico_2B43" />
<br/><br/><br/>
Nomenclatura: <br/>
<ul>
    <li>0. Casa</li>
    <li>1. Colchón</li>
    <li>2. Elefantes</li>
    <li>3. Niño</li>
    <li>4. Persianas</li>
    <li>5. Ventana</li>
    <li>6. Vidrios</li>
    <li>7. Colmillos</li>
</ul>
<br/>
<table>
    <caption><?php echo $fecha . ", " . $_SESSION['wraprof_NOMBRE_COLEGIO'] . ",  " . $nivel_curso.$letra_curso . " Formato de la Prueba : " . $formato; ?></caption>
    <thead>
	<tr>
	    <td>Lista del Curso</td>   
	    <th>Respuestas</th>
	</tr>
    </thead>
    <tbody>
	<tr>
	    <?php foreach($nombre as $indice => $valor){ ?>
	    <th scope="row"><?php echo $lista[$indice] . ".-" . $nombre[$indice] . " " . $apellido[$indice]; ?></th>
	    <td><?php echo $grafico2B43[$indice]?></td>
	</tr>
	<?php }  ?>	
    </tbody>
</table>


<br/><br/><br/>

<img src="?controlador=Informes&accion=grafico_2B44" />
<br/><br/><br/>
Nomenclatura: <br/>
<ul>
    <li>0. Casa</li>
    <li>1. Colchón</li>
    <li>2. Elefantes</li>
    <li>3. Niño</li>
    <li>4. Persianas</li>
    <li>5. Ventana</li>
    <li>6. Vidrios</li>
    <li>7. Colmillos</li>
</ul>
<br/>
<table>
    <caption><?php echo $fecha . ", " . $_SESSION['wraprof_NOMBRE_COLEGIO'] . ",  " . $nivel_curso.$letra_curso . " Formato de la Prueba : " . $formato; ?></caption>
    <thead>
	<tr>
	    <td>Lista del Curso</td>   
	    <th>Respuestas</th>
	</tr>
    </thead>
    <tbody>
	<tr>
	    <?php foreach($nombre as $indice => $valor){ ?>
	    <th scope="row"><?php echo $lista[$indice] . ".-" . $nombre[$indice] . " " . $apellido[$indice]; ?></th>
	    <td><?php echo $grafico2B44[$indice]?></td>
	</tr>
	<?php }  ?>	
    </tbody>
</table>


<br/><br/><br/>

<img src="?controlador=Informes&accion=grafico_2B45" />
<br/><br/><br/>
Nomenclatura: <br/>
<ul>
    <li>0. Casa</li>
    <li>1. Colchón</li>
    <li>2. Elefantes</li>
    <li>3. Niño</li>
    <li>4. Persianas</li>
    <li>5. Ventana</li>
    <li>6. Vidrios</li>
    <li>7. Colmillos</li>
</ul>
<br/>
<table>
    <caption><?php echo $fecha . ", " . $_SESSION['wraprof_NOMBRE_COLEGIO'] . ",  " . $nivel_curso.$letra_curso . " Formato de la Prueba : " . $formato; ?></caption>
    <thead>
	<tr>
	    <td>Lista del Curso</td>   
	    <th>Respuestas</th>
	</tr>
    </thead>
    <tbody>
	<tr>
	    <?php foreach($nombre as $indice => $valor){ ?>
	    <th scope="row"><?php echo $lista[$indice] . ".-" . $nombre[$indice] . " " . $apellido[$indice]; ?></th>
	    <td><?php echo $grafico2B45[$indice]?></td>
	</tr>
	<?php }  ?>	
    </tbody>
</table>

<br/><br/><br/>

<img src="?controlador=Informes&accion=grafico_2B46" />
<br/><br/><br/>
Nomenclatura: <br/>
<ul>
    <li>0. Casa</li>
    <li>1. Colchón</li>
    <li>2. Elefantes</li>
    <li>3. Niño</li>
    <li>4. Persianas</li>
    <li>5. Ventana</li>
    <li>6. Vidrios</li>
    <li>7. Colmillos</li>
</ul>
<br/>
<table>
    <caption><?php echo $fecha . ", " . $_SESSION['wraprof_NOMBRE_COLEGIO'] . ",  " . $nivel_curso.$letra_curso . " Formato de la Prueba : " . $formato; ?></caption>
    <thead>
	<tr>
	    <td>Lista del Curso</td>   
	    <th>Respuestas</th>
	</tr>
    </thead>
    <tbody>
	<tr>
	    <?php foreach($nombre as $indice => $valor){ ?>
	    <th scope="row"><?php echo $lista[$indice] . ".-" . $nombre[$indice] . " " . $apellido[$indice]; ?></th>
	    <td><?php echo $grafico2B46[$indice]?></td>
	</tr>
	<?php }  ?>	
    </tbody>
</table>

<br/><br/><br/>

<img src="?controlador=Informes&accion=grafico_2B47" />
<br/><br/><br/>
Nomenclatura: <br/>
<ul>
    <li>0. Casa</li>
    <li>1. Colchón</li>
    <li>2. Elefantes</li>
    <li>3. Niño</li>
    <li>4. Persianas</li>
    <li>5. Ventana</li>
    <li>6. Vidrios</li>
    <li>7. Colmillos</li>
</ul>
<br/>
<table>
    <caption><?php echo $fecha . ", " . $_SESSION['wraprof_NOMBRE_COLEGIO'] . ",  " . $nivel_curso.$letra_curso . " Formato de la Prueba : " . $formato; ?></caption>
    <thead>
	<tr>
	    <td>Lista del Curso</td>   
	    <th>Respuestas</th>
	</tr>
    </thead>
    <tbody>
	<tr>
	    <?php foreach($nombre as $indice => $valor){ ?>
	    <th scope="row"><?php echo $lista[$indice] . ".-" . $nombre[$indice] . " " . $apellido[$indice]; ?></th>
	    <td><?php echo $grafico2B47[$indice]?></td>
	</tr>
	<?php }  ?>	
    </tbody>
</table>

<hr/><br/><br/><br/>

<h2>Comparación de puntajes  Prueba Nivel 2<br/>
    Formato 'A' y 'B'.</h2>
<br/><br/><br/>
<div id="tabla_general">
<table id="var">
<caption><?php echo $fecha . ", " . $_SESSION['wraprof_NOMBRE_COLEGIO'] . ",  " . $nivel_curso.$letra_curso . " Formato de la Prueba : " . $formato ;?></caption>
    <thead>
	<tr>
	    <td>Lista del Curso</td>
	    <th>Puntaje Prueba - 1B</th>
	    <th>Puntaje Prueba - 2A</th>
	    <th>Variación Puntaje - 1B</th>   
	    <th>Variación Puntaje - 2A</th> 
	    <th>Indice de Variación </th>   

	    
	    <th>Puntaje Z - 1B</th>
	    <th>Puntaje Z - 2A</th>
	    <th>Variación Z - 1B</th>
	    <th>Variación Z - 2A</th>
	    <th>Indice de Variación </th>   


	    <th>Percentil - 1B</th>
	    <th>Percentil - 2A</th>
	    <th>Variación Percentil - 1B</th>
	    <th>Variación Percentil - 2A</th>	 
	    <th>Indice de Variación </th>   


	    <th>Puntaje T - 1B</th>
	    <th>Puntaje T - 2A</th>
	    <th>Variación T - 1B</th>
	    <th>Variación T - 2A</th>
	    <th>Indice de Variación </th>   

	</tr>
    </thead>
    <tbody>
	<tr>
	<?php foreach($nombre as $indice => $valor){ ?>
	    
	    <th><?php echo $lista[$indice] . ".- " .$nombre[$indice] . " " . $apellido[$indice]; ?></th>
	    
	    <td><?php echo $PTJE[$indice]?></td> 
	    <td><?php echo $puntaje[$indice]?></td> 	 
	    <td id="var"><?php echo $DIFPTA[$indice]?></td>
	    <td id="var"><?php echo $DIFPT[$indice]?></td>
	    <?php $indicept = ($DIFPT[$indice] - $DIFPTA[$indice])/100; 
	    if($indicept > '0'){?>
    		<td id="pos"><?php echo $indicept;?></td> 
	    <?php }else{ ?>
		<td id="neg"><?php echo $indicept;}?></td>
		
	    

	    
	    <td><?php echo $PZA[$indice]?></td>
	    <td><?php echo $puntaje_z[$indice]?></td>
	    <td id="var"><?php echo $DIFZA[$indice]?></td>
	    <td id="var"><?php echo $DIFZ[$indice]?></td>
	    <?php $indicepz = ($DIFZ[$indice] - $DIFZA[$indice])/100;
	    if($indicepz > '0'){?>
    		<td id="pos"><?php echo $indicepz;?></td> 
	    <?php }else{ ?>
		<td id="neg"><?php echo $indicepz;}?></td>

	    

	    <td><?php echo $PPA[$indice]?></td>
	    <td><?php echo $puntaje_p[$indice]?></td>
	    <td id="var"><?php echo $DIFPA[$indice]?></td>
	    <td id="var"><?php echo $DIFP[$indice]?></td>
	    <?php $indicepp = ($DIFP[$indice] - $DIFPA[$indice])/100; 
	    if($indicepp > '0'){?>
    		<td id="pos"><?php echo $indicepp;?></td> 
	    <?php }else{ ?>
		<td id="neg"><?php echo $indicepp;}?></td>

	  
	    <td><?php echo $PTA[$indice]?></td>
	    <td><?php echo $puntaje_t[$indice]?></td>
	    <td id="var"><?php echo $DIFTA[$indice]?></td>
	    <td id="var"><?php echo $DIFT[$indice]?></td>
	    <?php $indicept = ($DIFT[$indice] - $DIFTA[$indice])/100;
	    if($indicept > '0'){?>
    		<td id="pos"><?php echo $indicept;?></td> 
	    <?php }else{ ?>
		<td id="neg"><?php echo $indicept;}?></td>

	</tr>
	<?php  }  ?>	
    </tbody>
</table>

<?php   
	/* INICIO PUNTAJE */
	$suma_media = '0';
	foreach($PTJE as $indice =>$valor){ $suma_media = $PTJE[$indice] + $suma_media;}
		$media = $suma_media/($num_list - 1);
	        echo "<br/>El  promedio del Puntaje  anterior fué de   = " .  $media ;


	$suma_media = '0';
	foreach($puntaje as $indice =>$valor){ $suma_media = $puntaje[$indice] + $suma_media;}
		$media = $suma_media/($num_list - 1);
	        echo "<br/>El  promedio del Puntaje  actual es  = " .  $media ;
	
	
	$suma_media = '0';
	foreach($DIFPT as $indice =>$valor){ $suma_media = $DIFPT[$indice] + $suma_media;}
		$media = $suma_media/($num_list - 1);
		echo "<br/>El  promedio de la Variación del  Puntaje  es = " .  $media . "<br/>" ; 

	/* FIN PUNTAJE
	 * ------------
	 * INICIO PUNTAJE Z
	 * */


        $suma_media = '0';
	foreach($PZA as $indice =>$valor){ $suma_media = $PZA[$indice] + $suma_media;}
		$media = $suma_media/($num_list - 1);
	        echo "<br/>El  promedio del Puntaje Z anterior fué de   = " .  $media ;

		
	$suma_media = '0';
	foreach($puntaje_z as $indice =>$valor){ $suma_media = $puntaje_z[$indice] + $suma_media;}
		$media = $suma_media/($num_list - 1);
	        echo "<br/>El  promedio del Puntaje Z actual es  = " .  $media ;
	
	
	$suma_media = '0';
	foreach($DIFZ as $indice =>$valor){ $suma_media = $DIFZ[$indice] + $suma_media;}
		$media = $suma_media/($num_list - 1);
		echo "<br/>El  promedio de la Variación del  Puntaje Z es = " .  $media . "<br/>"  ; 

	/* FIN PUNTAJE Z
	 * ------------
	 * INICIO PERCENTIL
	 * */
	$suma_media = '0';
	foreach($PPA as $indice =>$valor){ $suma_media = $PPA[$indice] + $suma_media;}
		$media = $suma_media/($num_list - 1);
	        echo "<br/>El  promedio del Percentil anterior fué de   = " .  $media ;


	$suma_media = '0';
	foreach($puntaje_p as $indice =>$valor){ $suma_media = $puntaje_p[$indice] + $suma_media;}
		$media = $suma_media/($num_list - 1);
	        echo "<br/>El  promedio del Percentil actual es = " .  $media ;
	
	
	$suma_media = '0';
	foreach($DIFT as $indice =>$valor){ $suma_media = $DIFT[$indice] + $suma_media;}
		$media = $suma_media/($num_list - 1);
		echo "<br/>El  promedio de la Variación del  Percentil es = " .  $media  . "<br/>" ; 
		
	/* FIN PERCENTIL
	 * ------------
	 * INICIO PUNTAJE T
	 * */

		
	$suma_media = '0';
	foreach($PTA as $indice =>$valor){ $suma_media = $PTA[$indice] + $suma_media;}
		$media = $suma_media/($num_list - 1);
	        echo "<br/>El  promedio del Puntaje T anterior fué de   = " .  $media ;


	$suma_media = '0';
	foreach($puntaje_t as $indice =>$valor){ $suma_media = $puntaje_t[$indice] + $suma_media;}
		$media = $suma_media/($num_list - 1);
	        echo "<br/>El  promedio del Puntaje T actual es = " .  $media ;
	
	
	$suma_media = '0';
	foreach($DIFP as $indice =>$valor){ $suma_media = $DIFP[$indice] + $suma_media;}
		$media = $suma_media/($num_list - 1);
		echo "<br/>El  promedio de la Variación del  Puntaje T es = " .  $media  . "<br/>" ; 

?>
</div>
<br/><br/><br/><hr/>

<img src="?controlador=Informes&accion=graficoZ2" /><br/><br/><br/>
<table>
<caption><?php echo $fecha . ", " . $_SESSION['wraprof_NOMBRE_COLEGIO'] . ",  " . $nivel_curso.$letra_curso . " Formato de la Prueba : " . $formato ;?></caption>
    <thead>
	<tr>
	    <td>Lista del Curso</td>
	    <th>Puntaje Z - 1B</th>
	    <th>Puntaje Z - 2A</th>
	    <th>Variación Z</th>
	</tr>
    </thead>
    <tbody>
	<tr>
	<?php foreach($nombre as $indice => $valor){ ?>
	    
	    <th><?php echo $lista[$indice] . ".- " .$nombre[$indice] . " " . $apellido[$indice]; ?></th>
	    
	    <td><?php echo $PZA[$indice]?></td>
	    <td><?php echo $puntaje_z[$indice]?></td>
	    <td><?php echo $DIFZ[$indice]?></td>

	</tr>
	<?php  }  ?>	
    </tbody>
</table><hr/>

<img src="?controlador=Informes&accion=graficoP2" /><br/><br/><br/>
<table>
<caption><?php echo $fecha . ", " . $_SESSION['wraprof_NOMBRE_COLEGIO'] . ",  " . $nivel_curso.$letra_curso . " Formato de la Prueba : " . $formato ;?></caption>
    <thead>
	<tr>
	    <td>Lista del Curso</td>
	    <th>Percentil - 1B</th>
	    <th>Percentil - 2A</th>
	    <th>Variación Percentil</th>
	</tr>
    </thead>
    <tbody>
	<tr>
	<?php foreach($nombre as $indice => $valor){ ?>
	    
	    <th><?php echo $lista[$indice] . ".- " .$nombre[$indice] . " " . $apellido[$indice]; ?></th>
	    
	    <td><?php echo $PPA[$indice]?></td>
	    <td><?php echo $puntaje_p[$indice]?></td>
	    <td><?php echo $DIFP[$indice]?></td>

	</tr>
	<?php  }  ?>	
    </tbody>
</table><hr/>



<img src="?controlador=Informes&accion=graficoT2" /><br/><br/><br/>
<table>
<caption><?php echo $fecha . ", " . $_SESSION['wraprof_NOMBRE_COLEGIO'] . ",  " . $nivel_curso.$letra_curso . " Formato de la Prueba : " . $formato ;?></caption>
    <thead>
	<tr>
	    <td>Lista del Curso</td>
	    <th>Puntaje T - 1B</th>
	    <th>Puntaje T - 2A</th>
	    <th>Variación T</th>
	</tr>
    </thead>
    <tbody>
	<tr>
	<?php foreach($nombre as $indice => $valor){ ?>
	    
	    <th><?php echo $lista[$indice] . ".- " .$nombre[$indice] . " " . $apellido[$indice]; ?></th>
	    
	    <td><?php echo $PTA[$indice]?></td>
	    <td><?php echo $puntaje_t[$indice]?></td>
	    <td><?php echo $DIFT[$indice]?></td>

	</tr>
	<?php  }  ?>	
    </tbody>
</table><hr/>



<img src="?controlador=Informes&accion=graficoPT2" /><br/><br/><br/>
<table>
<caption><?php echo $fecha . ", " . $_SESSION['wraprof_NOMBRE_COLEGIO'] . ",  " . $nivel_curso.$letra_curso . " Formato de la Prueba : " . $formato ;?></caption>
    <thead>
	<tr>
	    <td>Lista del Curso</td>
	    <th>Puntaje - 1B</th>
	    <th>Puntaje - 2A</th>
	    <th>Variación Puntaje</th>
	</tr>
    </thead>
    <tbody>
	<tr>
	<?php foreach($nombre as $indice => $valor){ ?>
	    
	    <th><?php echo $lista[$indice] . ".- " .$nombre[$indice] . " " . $apellido[$indice]; ?></th>
	    
	    <td><?php echo $PTJE[$indice]?></td> 
	    <td><?php echo $puntaje[$indice]?></td> 	   
	    <td><?php echo $DIFPT[$indice]?></td>

	</tr>
	<?php  }  ?>	
    </tbody>
</table><hr/>





</div>
<br/>
<br/>
<button onClick="javascript:history.go(-1)">Atrás!</a></button>
</body>
</html>

