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

    $grafico3B10[] = $datos['10'];
    $grafico3B11[] = $datos['11'];
    $grafico3B12[] = $datos['12'];
    $grafico3B13[] = $datos['13'];
    $grafico3B14[] = $datos['14'];
    $grafico3B15[] = $datos['15'];
    $grafico3B16[] = $datos['16'];
    $grafico3B17[] = $datos['17'];
    $grafico3B20[] = $datos['18'];
    $grafico3B21[] = $datos['19'];
    $grafico3B22[] = $datos['20'];
    $grafico3B23[] = $datos['21'];
    $grafico3B24[] = $datos['22'];
    $grafico3B30[] = $datos['23'];
    $grafico3B31[] = $datos['24'];
    $grafico3B32[] = $datos['25'];
    $grafico3B33[] = $datos['26'];
    $grafico3B40[] = $datos['27'];
    $grafico3B41[] = $datos['28'];
    $grafico3B42[] = $datos['29'];
    $grafico3B43[] = $datos['30'];
    $grafico3B44[] = $datos['31'];
    $grafico3B45[] = $datos['32'];
    $grafico3B46[] = $datos['33'];  
    $grafico3B47[] = $datos['34'];  

    $PZA[]  = $datos['35'];
    $PPA[]  = $datos['36'];
    $PTA[]  = $datos['37'];
    $PTJE[] = $datos['38'];
    $DIFZ[] = $datos['39'];
    $DIFT[] = $datos['40'];
    $DIFP[] = $datos['41'];
    $DIFPT[]= $datos['42'];
    $DIFZA[] = $datos['43'];
    $DIFTA[] = $datos['44'];
    $DIFPA[] = $datos['45'];
    $DIFPTA[]= $datos['46'];   

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

<h2>Pregunta Número 1 : "Noticias deportivas"</h2><br/>

<img src="?controlador=Informes&accion=grafico_3B10" /><br/><br/><br/>
Nomenclatura: <br/>
<ul>
    <li>"0. Ganó.",</li>
    <li>"1. Perdió.",</li>
    <li>"2. Empató.",</li>
    <li>"3. No jugaron."</li>
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
	    <td><?php echo $grafico3B10[$indice]?></td>
	</tr>
	<?php }  ?>	
    </tbody>
</table>


<img src="?controlador=Informes&accion=grafico_3B11" /><br/><br/><br/>
Nomenclatura: <br/>
<ul>
    <li>"0. Ganó.",</li>
    <li>"1. Perdió.",</li>
    <li>"2. Empató.",</li>
    <li>"3. No jugaron."</li>
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
	    <td><?php echo $grafico3B11[$indice]?></td>
	</tr>
	<?php }  ?>	
    </tbody>
</table>


<img src="?controlador=Informes&accion=grafico_3B12" /><br/><br/><br/>
Nomenclatura: <br/>
<ul>
    <li>"0. Ganó.",</li>
    <li>"1. Perdió.",</li>
    <li>"2. Empató.",</li>
    <li>"3. No jugaron."</li>
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
	    <td><?php echo $grafico3B12[$indice]?></td>
	</tr>
	<?php }  ?>	
    </tbody>
</table>


<img src="?controlador=Informes&accion=grafico_3B13" /><br/><br/><br/>
Nomenclatura: <br/>
<ul>
    <li>"0. Ganó.",</li>
    <li>"1. Perdió.",</li>
    <li>"2. Empató.",</li>
    <li>"3. No jugaron."</li>
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
	    <td><?php echo $grafico3B13[$indice]?></td>
	</tr>
	<?php }  ?>	
    </tbody>
</table>


<img src="?controlador=Informes&accion=grafico_3B14" /><br/><br/><br/>
Nomenclatura: <br/>
<ul>
    <li>"0. Ganó.",</li>
    <li>"1. Perdió.",</li>
    <li>"2. Empató.",</li>
    <li>"3. No jugaron."</li>
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
	    <td><?php echo $grafico3B14[$indice]?></td>
	</tr>
	<?php }  ?>	
    </tbody>
</table>


<img src="?controlador=Informes&accion=grafico_3B15" /><br/><br/><br/>
Nomenclatura: <br/>
<ul>
    <li>"0. Ganó.",</li>
    <li>"1. Perdió.",</li>
    <li>"2. Empató.",</li>
    <li>"3. No jugaron."</li>
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
	    <td><?php echo $grafico3B15[$indice]?></td>
	</tr>
	<?php }  ?>	
    </tbody>
</table>


<img src="?controlador=Informes&accion=grafico_3B16" /><br/><br/><br/>
Nomenclatura: <br/>
<ul>
     <li>"0. Ganó.",</li>
    <li>"1. Perdió.",</li>
    <li>"2. Empató.",</li>
    <li>"3. No jugaron."</li>
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
	    <td><?php echo $grafico3B16[$indice]?></td>
	</tr>
	<?php }  ?>	
    </tbody>
</table>

<img src="?controlador=Informes&accion=grafico_3B17" /><br/><br/><br/>
Nomenclatura: <br/>
<ul>
     <li>"0. Ganó.",</li>
    <li>"1. Perdió.",</li>
    <li>"2. Empató.",</li>
    <li>"3. No jugaron."</li>
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
	    <td><?php echo $grafico3B17[$indice]?></td>
	</tr>
	<?php }  ?>	
    </tbody>
</table>



<hr/><br/><br/><br/>

<h2>Pregunta Número 2 : "Problemas con el aire"</h2><br/>
<img src="?controlador=Informes&accion=grafico_3B20" /><br/><br/><br/>
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
	    <td><?php echo $grafico3B20[$indice]?></td>
	</tr>
	<?php }  ?>	
    </tbody>
</table>

<br/><br/><br/>

<img src="?controlador=Informes&accion=grafico_3B21" /><br/><br/><br/>
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
	    <td><?php echo $grafico3B21[$indice]?></td>
	</tr>
	<?php }  ?>	
    </tbody>
</table>


<br/><br/><br/>


<img src="?controlador=Informes&accion=grafico_3B22" /><br/><br/><br/>
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
	    <td><?php echo $grafico3B22[$indice]?></td>
	</tr>
	<?php }  ?>	
    </tbody>
</table>

<br/><br/><br/>

<img src="?controlador=Informes&accion=grafico_3B23" /><br/><br/><br/>
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
	    <td><?php echo $grafico3B23[$indice]?></td>
	</tr>
	<?php }  ?>	
    </tbody>
</table>

<br/><br/><br/>

<img src="?controlador=Informes&accion=grafico_3B24" /><br/><br/><br/>
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
	    <td><?php echo $grafico3B24[$indice]?></td>
	</tr>
	<?php }  ?>	
    </tbody>
</table>

<br/><br/><br/>


<hr/><br/><br/><br/>

<h2>Pregunta Número 3 : "Estar satisfecho..."</h2><br/>
<br/><br/><br/>

<img src="?controlador=Informes&accion=grafico_3B30" /><br/><br/><br/>
Nomenclatura: <br/>
<ul>
    <li>1. La tía no estaba contenta porque no veía bien.</li>
    <li>2. La tía no sabía lo que estaba viendo.</li>	
    <li>3. La tía veía algo que no le gustaba.</li>	
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
	    <td><?php echo $grafico3B30[$indice]?></td>
	</tr>
	<?php }  ?>	
    </tbody>
</table>

<br/><br/><br/>

<img src="?controlador=Informes&accion=grafico_3B31" /><br/><br/><br/>
Nomenclatura: <br/>
<ul>
    <li>1. La tía quería pillar a Tom en algo.</li>
    <li>2. La tía se sorprendía por las cosas que hacía Tom.</li>	
    <li>3. A cada rato, la tía quería castigar a Tom.</li>	
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
	    <td><?php echo $grafico3B31[$indice]?></td>
	</tr>
	<?php }  ?>	
    </tbody>
</table>


<br/><br/><br/>

<img src="?controlador=Informes&accion=grafico_3B32" /><br/><br/><br/>
Nomenclatura: <br/>
<ul>
    <li>1. La tía se cansó de hacerle preguntas a Tom.</li>
    <li>2. La tía no quería hacerle preguntas a Tom</li>	
    <li>3. La tía siempre le hacia preguntas a Tom.</li>	
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
	    <td><?php echo $grafico3B32[$indice]?></td>
	</tr>
	<?php }  ?>	
    </tbody>
</table>

<br/><br/><br/>

<img src="?controlador=Informes&accion=grafico_3B33" /><br/><br/><br/>
Nomenclatura: <br/>
<ul>
    <li>1. Sid nunca enojaba a la tía.</li>
    <li>2. Sid ponía nerviosa a la tía..</li>	
    <li>3. Sid nunca se enojaba con su tía.</li>	
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
	    <td><?php echo $grafico3B33[$indice]?></td>
	</tr>
	<?php }  ?>	
    </tbody>
</table>

<hr/><br/><br/><br/>

<h2>Pregunta Número 4 : "La pieza..."</h2><br/>
<br/><br/><br/>

<img src="?controlador=Informes&accion=grafico_3B40" /><br/><br/><br/>
Nomenclatura: <br/>
<ul>
    <li>0. Por ahí saltó el gato..</li>
    <li>1. Algunas aparecieron en el cielo...</li>
    <li>2. Empezaron a cantar...</li>
    <li>3. Estaba algo obscura...</li>
    <li>4. Mandó a sus hijos a la cama...</li>
    <li>5. Empezó a soplar con suavidad...</li>
    <li>6. Saltó al patio por la ventana...</li>
    <li>7. Ya había llegado...</li>
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
	    <td><?php echo $grafico3B40[$indice]?></td>
	</tr>
	<?php }  ?>	
    </tbody>
</table>

<br/><br/><br/>

<img src="?controlador=Informes&accion=grafico_3B41" />
<br/><br/><br/>
Nomenclatura: <br/>
<ul>
    <li>0. Por ahí saltó el gato..</li>
    <li>1. Algunas aparecieron en el cielo...</li>
    <li>2. Empezaron a cantar...</li>
    <li>3. Estaba algo obscura...</li>
    <li>4. Mandó a sus hijos a la cama...</li>
    <li>5. Empezó a soplar con suavidad...</li>
    <li>6. Saltó al patio por la ventana...</li>
    <li>7. Ya había llegado...</li>
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
	    <td><?php echo $grafico3B41[$indice]?></td>
	</tr>
	<?php }  ?>	
    </tbody>
</table>

<br/><br/><br/>

<img src="?controlador=Informes&accion=grafico_3B42" />
<br/><br/><br/>
Nomenclatura: <br/>
<ul>
    <li>0. Por ahí saltó el gato..</li>
    <li>1. Algunas aparecieron en el cielo...</li>
    <li>2. Empezaron a cantar...</li>
    <li>3. Estaba algo obscura...</li>
    <li>4. Mandó a sus hijos a la cama...</li>
    <li>5. Empezó a soplar con suavidad...</li>
    <li>6. Saltó al patio por la ventana...</li>
    <li>7. Ya había llegado...</li>
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
	    <td><?php echo $grafico3B42[$indice]?></td>
	</tr>
	<?php }  ?>	
    </tbody>
</table>

<br/><br/><br/>

<img src="?controlador=Informes&accion=grafico_3B43" />
<br/><br/><br/>
Nomenclatura: <br/>
<ul>
    <li>0. Por ahí saltó el gato..</li>
    <li>1. Algunas aparecieron en el cielo...</li>
    <li>2. Empezaron a cantar...</li>
    <li>3. Estaba algo obscura...</li>
    <li>4. Mandó a sus hijos a la cama...</li>
    <li>5. Empezó a soplar con suavidad...</li>
    <li>6. Saltó al patio por la ventana...</li>
    <li>7. Ya había llegado...</li>
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
	    <td><?php echo $grafico3B43[$indice]?></td>
	</tr>
	<?php }  ?>	
    </tbody>
</table>


<br/><br/><br/>

<img src="?controlador=Informes&accion=grafico_3B44" />
<br/><br/><br/>
Nomenclatura: <br/>
<ul>
    <li>0. Por ahí saltó el gato..</li>
    <li>1. Algunas aparecieron en el cielo...</li>
    <li>2. Empezaron a cantar...</li>
    <li>3. Estaba algo obscura...</li>
    <li>4. Mandó a sus hijos a la cama...</li>
    <li>5. Empezó a soplar con suavidad...</li>
    <li>6. Saltó al patio por la ventana...</li>
    <li>7. Ya había llegado...</li>
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
	    <td><?php echo $grafico3B44[$indice]?></td>
	</tr>
	<?php }  ?>	
    </tbody>
</table>


<br/><br/><br/>

<img src="?controlador=Informes&accion=grafico_3B45" />
<br/><br/><br/>
Nomenclatura: <br/>
<ul>
    <li>0. Por ahí saltó el gato..</li>
    <li>1. Algunas aparecieron en el cielo...</li>
    <li>2. Empezaron a cantar...</li>
    <li>3. Estaba algo obscura...</li>
    <li>4. Mandó a sus hijos a la cama...</li>
    <li>5. Empezó a soplar con suavidad...</li>
    <li>6. Saltó al patio por la ventana...</li>
    <li>7. Ya había llegado...</li>
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
	    <td><?php echo $grafico3B45[$indice]?></td>
	</tr>
	<?php }  ?>	
    </tbody>
</table>

<br/><br/><br/>

<img src="?controlador=Informes&accion=grafico_3B46" />
<br/><br/><br/>
Nomenclatura: <br/>
<ul>
    <li>0. Por ahí saltó el gato..</li>
    <li>1. Algunas aparecieron en el cielo...</li>
    <li>2. Empezaron a cantar...</li>
    <li>3. Estaba algo obscura...</li>
    <li>4. Mandó a sus hijos a la cama...</li>
    <li>5. Empezó a soplar con suavidad...</li>
    <li>6. Saltó al patio por la ventana...</li>
    <li>7. Ya había llegado...</li>
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
	    <td><?php echo $grafico3B46[$indice]?></td>
	</tr>
	<?php }  ?>	
    </tbody>
</table>

<br/><br/><br/>

<img src="?controlador=Informes&accion=grafico_3B47" />
<br/><br/><br/>
Nomenclatura: <br/>
<ul>
    <li>0. Por ahí saltó el gato..</li>
    <li>1. Algunas aparecieron en el cielo...</li>
    <li>2. Empezaron a cantar...</li>
    <li>3. Estaba algo obscura...</li>
    <li>4. Mandó a sus hijos a la cama...</li>
    <li>5. Empezó a soplar con suavidad...</li>
    <li>6. Saltó al patio por la ventana...</li>
    <li>7. Ya había llegado...</li>
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
	    <td><?php echo $grafico3B47[$indice]?></td>
	</tr>
	<?php }  ?>	
    </tbody>
</table>

<hr/><br/><br/><br/>

<h2>Comparación de puntajes  Prueba Nivel 3<br/>
    Formato 'A' y 'B'.</h2>
<br/><br/><br/>
<div id="tabla_general">
<table id="var">
<caption><?php echo $fecha . ", " . $_SESSION['wraprof_NOMBRE_COLEGIO'] . ",  " . $nivel_curso.$letra_curso . " Formato de la Prueba : " . $formato ;?></caption>
    <thead>
	<tr>
	    <td>Lista del Curso</td>
	    <th>Puntaje Prueba - 3A</th>
	    <th>Puntaje Prueba - 3B</th>
	    <th>Variación Puntaje - 3A</th>   
	    <th>Variación Puntaje - 3B</th> 
	    <th>Indice de Variación </th>   

	    
	    <th>Puntaje Z - 3A</th>
	    <th>Puntaje Z - 3B</th>
	    <th>Variación Z - 3A</th>
	    <th>Variación Z - 3B</th>
	    <th>Indice de Variación </th>   


	    <th>Percentil - 3A</th>
	    <th>Percentil - 3B</th>
	    <th>Variación Percentil - 3A</th>
	    <th>Variación Percentil - 3B</th>	 
	    <th>Indice de Variación </th>   


	    <th>Puntaje T - 3A</th>
	    <th>Puntaje T - 3B</th>
	    <th>Variación T - 3A</th>
	    <th>Variación T - 3B</th>
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
	    <th>Puntaje Z - 3A</th>
	    <th>Puntaje Z - 3B</th>
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
	    <th>Percentil - 3A</th>
	    <th>Percentil - 3B</th>
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
	    <th>Puntaje T - 3A</th>
	    <th>Puntaje T - 3B</th>
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
	    <th>Puntaje - 3A</th>
	    <th>Puntaje - 3B</th>
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
<button onClick="javascript:history.go(-1)">Atrás!</a></button>
</body>
</html>

