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
    
    $grafico2A10[] = $datos['10'];
    $grafico2A11[] = $datos['11'];
    $grafico2A12[] = $datos['12'];
    $grafico2A13[] = $datos['13'];
    $grafico2A14[] = $datos['14'];
    $grafico2A15[] = $datos['15'];
    $grafico2A16[] = $datos['16'];
    $grafico2A17[] = $datos['17'];
    $grafico2A20[] = $datos['18'];
    $grafico2A21[] = $datos['19'];
    $grafico2A22[] = $datos['20'];
    $grafico2A23[] = $datos['21'];
    $grafico2A24[] = $datos['22'];
    $grafico2A25[] = $datos['23'];
    $grafico2A26[] = $datos['24'];
    $grafico2A27[] = $datos['25'];
    $grafico2A30[] = $datos['26'];
    $grafico2A31[] = $datos['27'];
    $grafico2A32[] = $datos['28'];
    $grafico2A33[] = $datos['29'];
    $grafico2A34[] = $datos['30'];
    $grafico2A35[] = $datos['31'];
    $grafico2A36[] = $datos['32'];
    $grafico2A37[] = $datos['33'];
    $grafico2A40[] = $datos['34'];
    $grafico2A41[] = $datos['35'];
    $grafico2A42[] = $datos['36'];
    $grafico2A43[] = $datos['37'];
    $grafico2A44[] = $datos['38'];
    $grafico2A45[] = $datos['39'];
    $grafico2A46[] = $datos['40'];  
    $grafico2A47[] = $datos['41'];  

    $PZA[]  = $datos['42'];
    $PPA[]  = $datos['43'];
    $PTA[]  = $datos['44'];
    $PTJE[] = $datos['45'];
    $DIFZ[] = $datos['46'];
    $DIFT[] = $datos['47'];
    $DIFP[] = $datos['48'];
    $DIFPT[]= $datos['49'];
    $DIFZA[] = $datos['50'];
    $DIFTA[] = $datos['51'];
    $DIFPA[] = $datos['52'];
    $DIFPTA[]= $datos['53'];   

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

<img src="?controlador=Informes&accion=grafico_2A10" /><br/><br/><br/>
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
	    <td><?php echo $grafico2A10[$indice]?></td>
	</tr>
	<?php }  ?>	
    </tbody>
</table>


<img src="?controlador=Informes&accion=grafico_2A11" /><br/><br/><br/>
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
	    <td><?php echo $grafico2A11[$indice]?></td>
	</tr>
	<?php }  ?>	
    </tbody>
</table>


<img src="?controlador=Informes&accion=grafico_2A12" /><br/><br/><br/>
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
	    <td><?php echo $grafico2A12[$indice]?></td>
	</tr>
	<?php }  ?>	
    </tbody>
</table>


<img src="?controlador=Informes&accion=grafico_2A13" /><br/><br/><br/>
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
	    <td><?php echo $grafico2A13[$indice]?></td>
	</tr>
	<?php }  ?>	
    </tbody>
</table>


<img src="?controlador=Informes&accion=grafico_2A14" /><br/><br/><br/>
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
	    <td><?php echo $grafico2A14[$indice]?></td>
	</tr>
	<?php }  ?>	
    </tbody>
</table>


<img src="?controlador=Informes&accion=grafico_2A15" /><br/><br/><br/>
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
	    <td><?php echo $grafico2A15[$indice]?></td>
	</tr>
	<?php }  ?>	
    </tbody>
</table>


<img src="?controlador=Informes&accion=grafico_2A16" /><br/><br/><br/>
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
	    <td><?php echo $grafico2A16[$indice]?></td>
	</tr>
	<?php }  ?>	
    </tbody>
</table>

<img src="?controlador=Informes&accion=grafico_2A17" /><br/><br/><br/>
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
	    <td><?php echo $grafico2A17[$indice]?></td>
	</tr>
	<?php }  ?>	
    </tbody>
</table>

<hr/><br/><br/><br/>

<h2>Pregunta Número 2 : "Completa la oración segun corresponda"</h2><br/>
<img src="?controlador=Informes&accion=grafico_2A20" /><br/><br/><br/>

Nomenclatura: <br/>
<ul>
    <li>"0. A mi mamá le gusta mucho ...",</li>
    <li>"1. Hoy día estamos jugando ...",</li>
    <li>"2. A mi hermana le gusta tocar la ...",</li>
    <li>"3. El jardinero trabaja con una ...",</li>
    <li>"4. Mi papá lee siempre los ...", </li>
    <li>"5. Es lindo jugar con un...",</li>
    <li>"6. A la comida le ponemos...",</li>
    <li>"7. Hay barcos que navegan con..."</li>
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
	    <td><?php echo $grafico2A20[$indice]?></td>
	</tr>
	<?php }  ?>	
    </tbody>
</table>

<br/><br/><br/>

<img src="?controlador=Informes&accion=grafico_2A21" /><br/><br/><br/>
Nomenclatura: <br/>
<ul>
    <li>"0. A mi mamá le gusta mucho ...",</li>
    <li>"1. Hoy día estamos jugando ...",</li>
    <li>"2. A mi hermana le gusta tocar la ...",</li>
    <li>"3. El jardinero trabaja con una ...",</li>
    <li>"4. Mi papá lee siempre los ...", </li>
    <li>"5. Es lindo jugar con un...",</li>
    <li>"6. A la comida le ponemos...",</li>
    <li>"7. Hay barcos que navegan con..."</li>
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
	    <td><?php echo $grafico2A21[$indice]?></td>
	</tr>
	<?php }  ?>	
    </tbody>
</table>


<br/><br/><br/>


<img src="?controlador=Informes&accion=grafico_2A22" /><br/><br/><br/>
Nomenclatura: <br/>
<ul>
    <li>"0. A mi mamá le gusta mucho ...",</li>
    <li>"1. Hoy día estamos jugando ...",</li>
    <li>"2. A mi hermana le gusta tocar la ...",</li>
    <li>"3. El jardinero trabaja con una ...",</li>
    <li>"4. Mi papá lee siempre los ...", </li>
    <li>"5. Es lindo jugar con un...",</li>
    <li>"6. A la comida le ponemos...",</li>
    <li>"7. Hay barcos que navegan con..."</li>
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
	    <td><?php echo $grafico2A22[$indice]?></td>
	</tr>
	<?php }  ?>	
    </tbody>
</table>

<br/><br/><br/>

<img src="?controlador=Informes&accion=grafico_2A23" /><br/><br/><br/>
Nomenclatura: <br/>
<ul>
    <li>"0. A mi mamá le gusta mucho ...",</li>
    <li>"1. Hoy día estamos jugando ...",</li>
    <li>"2. A mi hermana le gusta tocar la ...",</li>
    <li>"3. El jardinero trabaja con una ...",</li>
    <li>"4. Mi papá lee siempre los ...", </li>
    <li>"5. Es lindo jugar con un...",</li>
    <li>"6. A la comida le ponemos...",</li>
    <li>"7. Hay barcos que navegan con..."</li>
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
	    <td><?php echo $grafico2A23[$indice]?></td>
	</tr>
	<?php }  ?>	
    </tbody>
</table>

<br/><br/><br/>

<img src="?controlador=Informes&accion=grafico_2A24" /><br/><br/><br/>
Nomenclatura: <br/>
<ul>
    <li>"0. A mi mamá le gusta mucho ...",</li>
    <li>"1. Hoy día estamos jugando ...",</li>
    <li>"2. A mi hermana le gusta tocar la ...",</li>
    <li>"3. El jardinero trabaja con una ...",</li>
    <li>"4. Mi papá lee siempre los ...", </li>
    <li>"5. Es lindo jugar con un...",</li>
    <li>"6. A la comida le ponemos...",</li>
    <li>"7. Hay barcos que navegan con..."</li>
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
	    <td><?php echo $grafico2A24[$indice]?></td>
	</tr>
	<?php }  ?>	
    </tbody>
</table>

<br/><br/><br/>

<img src="?controlador=Informes&accion=grafico_2A25" /><br/><br/><br/>
Nomenclatura: <br/>
<ul>
    <li>"0. A mi mamá le gusta mucho ...",</li>
    <li>"1. Hoy día estamos jugando ...",</li>
    <li>"2. A mi hermana le gusta tocar la ...",</li>
    <li>"3. El jardinero trabaja con una ...",</li>
    <li>"4. Mi papá lee siempre los ...", </li>
    <li>"5. Es lindo jugar con un...",</li>
    <li>"6. A la comida le ponemos...",</li>
    <li>"7. Hay barcos que navegan con..."</li>
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
	    <td><?php echo $grafico2A25[$indice]?></td>
	</tr>
	<?php }  ?>	
    </tbody>
</table>


<br/><br/><br/>

<img src="?controlador=Informes&accion=grafico_2A26" /><br/><br/><br/>
Nomenclatura: <br/>
<ul>
    <li>"0. A mi mamá le gusta mucho ...",</li>
    <li>"1. Hoy día estamos jugando ...",</li>
    <li>"2. A mi hermana le gusta tocar la ...",</li>
    <li>"3. El jardinero trabaja con una ...",</li>
    <li>"4. Mi papá lee siempre los ...", </li>
    <li>"5. Es lindo jugar con un...",</li>
    <li>"6. A la comida le ponemos...",</li>
    <li>"7. Hay barcos que navegan con..."</li>
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
	    <td><?php echo $grafico2A26[$indice]?></td>
	</tr>
	<?php }  ?>	
    </tbody>
</table>

<br/><br/><br/>

<hr/><br/><br/><br/>

<h2>Pregunta Número 3 : "Usamos los lápices"</h2><br/>
<br/><br/><br/>

<img src="?controlador=Informes&accion=grafico_2A30" /><br/><br/><br/>
Nomenclatura: <br/>
<ul>
    <li>0.Usamos los lápices para...</li>
    <li>1.Los bomberos apagan...</li>
    <li>2.Los doctores sanan a los...</li>
    <li>3.Las vacas nos dan...</li>
    <li>4.Los trenes sirven para...</li>
    <li>5.Sacamos muchas frutas de los...</li>
    <li>6.Les ponemos candados a las...</li>
    <li>7.Los payasos trabajan en los...</li>				
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
	    <td><?php echo $grafico2A30[$indice]?></td>
	</tr>
	<?php }  ?>	
    </tbody>
</table>

<br/><br/><br/>

<img src="?controlador=Informes&accion=grafico_2A31" /><br/><br/><br/>
Nomenclatura: <br/>
<ul>
    <li>0.Usamos los lápices para...</li>
    <li>1.Los bomberos apagan...</li>
    <li>2.Los doctores sanan a los...</li>
    <li>3.Las vacas nos dan...</li>
    <li>4.Los trenes sirven para...</li>
    <li>5.Sacamos muchas frutas de los...</li>
    <li>6.Les ponemos candados a las...</li>
    <li>7.Los payasos trabajan en los...</li>				
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
	    <td><?php echo $grafico2A31[$indice]?></td>
	</tr>
	<?php }  ?>	
    </tbody>
</table>


<br/><br/><br/>

<img src="?controlador=Informes&accion=grafico_2A32" /><br/><br/><br/>
Nomenclatura: <br/>
<ul>
    <li>0.Usamos los lápices para...</li>
    <li>1.Los bomberos apagan...</li>
    <li>2.Los doctores sanan a los...</li>
    <li>3.Las vacas nos dan...</li>
    <li>4.Los trenes sirven para...</li>
    <li>5.Sacamos muchas frutas de los...</li>
    <li>6.Les ponemos candados a las...</li>
    <li>7.Los payasos trabajan en los...</li>				
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
	    <td><?php echo $grafico2A32[$indice]?></td>
	</tr>
	<?php }  ?>	
    </tbody>
</table>

<br/><br/><br/>

<img src="?controlador=Informes&accion=grafico_2A33" /><br/><br/><br/>
Nomenclatura: <br/>
<ul>
    <li>0.Usamos los lápices para...</li>
    <li>1.Los bomberos apagan...</li>
    <li>2.Los doctores sanan a los...</li>
    <li>3.Las vacas nos dan...</li>
    <li>4.Los trenes sirven para...</li>
    <li>5.Sacamos muchas frutas de los...</li>
    <li>6.Les ponemos candados a las...</li>
    <li>7.Los payasos trabajan en los...</li>				
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
	    <td><?php echo $grafico2A33[$indice]?></td>
	</tr>
	<?php }  ?>	
    </tbody>
</table>

<br/><br/><br/>

<img src="?controlador=Informes&accion=grafico_2A34" /><br/><br/><br/>
Nomenclatura: <br/>
<ul>
    <li>0.Usamos los lápices para...</li>
    <li>1.Los bomberos apagan...</li>
    <li>2.Los doctores sanan a los...</li>
    <li>3.Las vacas nos dan...</li>
    <li>4.Los trenes sirven para...</li>
    <li>5.Sacamos muchas frutas de los...</li>
    <li>6.Les ponemos candados a las...</li>
    <li>7.Los payasos trabajan en los...</li>				
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
	    <td><?php echo $grafico2A34[$indice]?></td>
	</tr>
	<?php }  ?>	
    </tbody>
</table>

<br/><br/><br/>


<img src="?controlador=Informes&accion=grafico_2A35" /><br/><br/><br/>
Nomenclatura: <br/>
<ul>
    <li>0.Usamos los lápices para...</li>
    <li>1.Los bomberos apagan...</li>
    <li>2.Los doctores sanan a los...</li>
    <li>3.Las vacas nos dan...</li>
    <li>4.Los trenes sirven para...</li>
    <li>5.Sacamos muchas frutas de los...</li>
    <li>6.Les ponemos candados a las...</li>
    <li>7.Los payasos trabajan en los...</li>				
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
	    <td><?php echo $grafico2A35[$indice]?></td>
	</tr>
	<?php }  ?>	
    </tbody>
</table>

<br/><br/><br/>


<img src="?controlador=Informes&accion=grafico_2A36" /><br/><br/><br/>
Nomenclatura: <br/>
<ul>
    <li>0.Usamos los lápices para...</li>
    <li>1.Los bomberos apagan...</li>
    <li>2.Los doctores sanan a los...</li>
    <li>3.Las vacas nos dan...</li>
    <li>4.Los trenes sirven para...</li>
    <li>5.Sacamos muchas frutas de los...</li>
    <li>6.Les ponemos candados a las...</li>
    <li>7.Los payasos trabajan en los...</li>				
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
	    <td><?php echo $grafico2A36[$indice]?></td>
	</tr>
	<?php }  ?>	
    </tbody>
</table>

<br/><br/><br/>

<br/><br/><br/>


<img src="?controlador=Informes&accion=grafico_2A37" /><br/><br/><br/>
Nomenclatura: <br/>
<ul>
    <li>0.Usamos los lápices para...</li>
    <li>1.Los bomberos apagan...</li>
    <li>2.Los doctores sanan a los...</li>
    <li>3.Las vacas nos dan...</li>
    <li>4.Los trenes sirven para...</li>
    <li>5.Sacamos muchas frutas de los...</li>
    <li>6.Les ponemos candados a las...</li>
    <li>7.Los payasos trabajan en los...</li>				
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
	    <td><?php echo $grafico2A37[$indice]?></td>
	</tr>
	<?php }  ?>	
    </tbody>
</table>



<hr/><br/><br/><br/>

<h2>Pregunta Número 4 : "A Luisa..."</h2><br/>
<br/><br/><br/>

<img src="?controlador=Informes&accion=grafico_2A40" /><br/><br/><br/>
Nomenclatura: <br/>
<ul>
    <li>0. Por ahí saltó el gato...</li>
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
	    <td><?php echo $grafico2A40[$indice]?></td>
	</tr>
	<?php }  ?>	
    </tbody>
</table>

<br/><br/><br/>

<img src="?controlador=Informes&accion=grafico_2A41" />
<br/><br/><br/>
Nomenclatura: <br/>
<ul>
    <li>0. Por ahí saltó el gato...</li>
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
	    <td><?php echo $grafico2A41[$indice]?></td>
	</tr>
	<?php }  ?>	
    </tbody>
</table>

<br/><br/><br/>

<img src="?controlador=Informes&accion=grafico_2A42" />
<br/><br/><br/>
Nomenclatura: <br/>
<ul>
    <li>0. Por ahí saltó el gato...</li>
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
	    <td><?php echo $grafico2A42[$indice]?></td>
	</tr>
	<?php }  ?>	
    </tbody>
</table>

<br/><br/><br/>

<img src="?controlador=Informes&accion=grafico_2A43" />
<br/><br/><br/>
Nomenclatura: <br/>
<ul>
    <li>0. Por ahí saltó el gato...</li>
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
	    <td><?php echo $grafico2A43[$indice]?></td>
	</tr>
	<?php }  ?>	
    </tbody>
</table>


<br/><br/><br/>

<img src="?controlador=Informes&accion=grafico_2A44" />
<br/><br/><br/>
Nomenclatura: <br/>
<ul>
    <li>0. Por ahí saltó el gato...</li>
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
	    <td><?php echo $grafico2A44[$indice]?></td>
	</tr>
	<?php }  ?>	
    </tbody>
</table>


<br/><br/><br/>

<img src="?controlador=Informes&accion=grafico_2A45" />
<br/><br/><br/>
Nomenclatura: <br/>
<ul>
    <li>0. Por ahí saltó el gato...</li>
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
	    <td><?php echo $grafico2A45[$indice]?></td>
	</tr>
	<?php }  ?>	
    </tbody>
</table>

<br/><br/><br/>

<img src="?controlador=Informes&accion=grafico_2A46" />
<br/><br/><br/>
Nomenclatura: <br/>
<ul>
    <li>0. Por ahí saltó el gato...</li>
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
	    <td><?php echo $grafico2A46[$indice]?></td>
	</tr>
	<?php }  ?>	
    </tbody>
</table>

<br/><br/><br/>

<img src="?controlador=Informes&accion=grafico_2A47" />
<br/><br/><br/>
Nomenclatura: <br/>
<ul>
    <li>0. Por ahí saltó el gato...</li>
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
	    <td><?php echo $grafico2A47[$indice]?></td>
	</tr>
	<?php }  ?>	
    </tbody>
</table>

<hr/><br/><br/><br/>

<h2>Comparación de puntajes  Prueba Nivel 1 y 2<br/>
    Formato 'B' y 'A'.</h2>
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
	    
	    <th scope="row"><?php echo $lista[$indice] . ".-" . $nombre[$indice] . " " . $apellido[$indice]; ?></th>
	    <td><?php echo $PTJE[$indice]?></td> 
	    <td><?php echo $puntaje[$indice]?></td> 	 
	    <td id="var"><?php echo $DIFPTA[$indice]?>%</td>
	    <td id="var"><?php echo $DIFPT[$indice]?>%</td>
	    <?php $indicept = ($DIFPT[$indice] - $DIFPTA[$indice])/100; 
	    if($indicept > '0'){?>
    		<td id="pos"><?php echo $indicept;?>%</td> 
	    <?php }else{ ?>
		<td id="neg"><?php echo $indicept;}?>%</td>
		
	    

	    
	    <td><?php echo $PZA[$indice]?></td>
	    <td><?php echo $puntaje_z[$indice]?></td>
	    <td id="var"><?php echo $DIFZA[$indice]?>%</td>
	    <td id="var"><?php echo $DIFZ[$indice]?>%</td>
	    <?php $indicepz = ($DIFZ[$indice] - $DIFZA[$indice])/100;
	    if($indicepz > '0'){?>
    		<td id="pos"><?php echo $indicepz;?>%</td> 
	    <?php }else{ ?>
		<td id="neg"><?php echo $indicepz;}?>%</td>

	    

	    <td><?php echo $PPA[$indice]?></td>
	    <td><?php echo $puntaje_p[$indice]?></td>
	    <td id="var"><?php echo $DIFPA[$indice]?>%</td>
	    <td id="var"><?php echo $DIFP[$indice]?>%</td>
	    <?php $indicepp = ($DIFP[$indice] - $DIFPA[$indice])/100; 
	    if($indicepp > '0'){?>
    		<td id="pos"><?php echo $indicepp;?>%</td> 
	    <?php }else{ ?>
		<td id="neg"><?php echo $indicepp;}?>%</td>

	  
	    <td><?php echo $PTA[$indice]?></td>
	    <td><?php echo $puntaje_t[$indice]?></td>
	    <td id="var"><?php echo $DIFTA[$indice]?>%</td>
	    <td id="var"><?php echo $DIFT[$indice]?>%</td>
	    <?php $indicept = ($DIFT[$indice] - $DIFTA[$indice])/100;
	    if($indicept > '0'){?>
    		<td id="pos"><?php echo $indicept;?>%</td> 
	    <?php }else{ ?>
		<td id="neg"><?php echo $indicept;}?>%</td>

	</tr>
	<?php  }  ?>	
    </tbody>
</table>

<table id="tabla_general">
    <tr>
	<td>
<?php  /* INICIO PUNTAJE */
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
	echo "<br/>El  promedio de la Variación del  Puntaje  es = " .  $media . "<br/>" ;?> 
	</td>
    </tr>	
    <tr>
	<td>	
<?php	/* FIN PUNTAJE
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
		echo "<br/>El  promedio de la Variación del  Puntaje Z es = " .  $media . "<br/>"  ; ?> 
	</td>
    </tr>	
    <tr>
	<td>	
<?php	/* FIN PUNTAJE Z
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
		echo "<br/>El  promedio de la Variación del  Percentil es = " .  $media  . "<br/>" ; ?> 
	<td>
    </tr>	
    <tr>
	<td>	
<?php	
	
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
		echo "<br/>El  promedio de la Variación del  Puntaje T es = " .  $media  . "<br/>" ; ?>
	</td>
    </tr>
</table>
</div>
<br/><br/><br/><hr/>

<img src="?controlador=Informes&accion=graficoZ1" /><br/><br/><br/>
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

<img src="?controlador=Informes&accion=graficoP1" /><br/><br/><br/>
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



<img src="?controlador=Informes&accion=graficoT1" /><br/><br/><br/>
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



<img src="?controlador=Informes&accion=graficoPT1" /><br/><br/><br/>
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

