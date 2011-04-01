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
    $lista[] = $num_list++;

    $grafico4A10[] = $datos['10'];
    $grafico4A11[] = $datos['11'];
    $grafico4A12[] = $datos['12'];
    $grafico4A13[] = $datos['13'];
    $grafico4A14[] = $datos['14'];
    $grafico4A20[] = $datos['15'];
    $grafico4A21[] = $datos['16'];
    $grafico4A22[] = $datos['17'];
    $grafico4A23[] = $datos['18'];
    $grafico4A24[] = $datos['19'];
    $grafico4A25[] = $datos['20'];
    $grafico4A26[] = $datos['21'];
    $grafico4A30[] = $datos['22'];
    $grafico4A31[] = $datos['23'];
    $grafico4A32[] = $datos['24'];
    $grafico4A33[] = $datos['25'];
    $grafico4A40[] = $datos['26'];
    $grafico4A41[] = $datos['27'];
    $grafico4A42[] = $datos['28'];
    $grafico4A43[] = $datos['29'];
    $grafico4A44[] = $datos['30'];

    $PZA[]  = $datos['31'];
    $PPA[]  = $datos['32'];
    $PTA[]  = $datos['33'];
    $PTJE[] = $datos['34'];
    $DIFZ[] = $datos['35'];
    $DIFT[] = $datos['36'];
    $DIFP[] = $datos['37'];
    $DIFPT[]= $datos['38'];
    $DIFZA[] = $datos['39'];
    $DIFTA[] = $datos['40'];
    $DIFPA[] = $datos['41'];
    $DIFPTA[]= $datos['42'];   

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

<h2>Pregunta Número 1 : "El pinito descontento"</h2><br/>

<img src="?controlador=Informes&accion=grafico_4A10" /><br/><br/><br/>
Nomenclatura: <br/>
<ul>
    <li>"1. Una persona humana.",</li>
    <li>"2. Un objeto de vidrio.",</li>
    <li>"3. Una mata de boldo.",</li>
    <li>"4. Un árbol distinto."</li>
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
	    <td><?php echo $grafico4A10[$indice]?></td>
	</tr>
	<?php }  ?>	
    </tbody>
</table>


<img src="?controlador=Informes&accion=grafico_4A11" /><br/><br/><br/>
Nomenclatura: <br/>
<ul>
    <li>"1. Lo asustaban las cabras.",</li>
    <li>"2. El viento lo hacía sufrir.",</li>
    <li>"3. No le gustaban sus púas.",</li>
    <li>"4. Las cabras le comían las hojas."</li>
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
	    <td><?php echo $grafico4A11[$indice]?></td>
	</tr>
	<?php }  ?>	
    </tbody>
</table>


<img src="?controlador=Informes&accion=grafico_4A12" /><br/><br/><br/>
Nomenclatura: <br/>
<ul>
    <li>"1. Eran demasiado blandas.",</li>
    <li>"2. El viento se las podía llevar.",</li>
    <li>"3. Las cabras se alimentaban con ellas.",</li>
    <li>"4. No eran como sus púas.",</li>
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
	    <td><?php echo $grafico4A12[$indice]?></td>
	</tr>
	<?php }  ?>	
    </tbody>
</table>


<img src="?controlador=Informes&accion=grafico_4A13" /><br/><br/><br/>
Nomenclatura: <br/>
<ul>
    <li>"1. Eran duras y brillantes.",</li>
    <li>"2. Se podían quebrar con el viento.",</li>
    <li>"3. Nadie se las podía comer.",</li>
    <li>"4. No eran como sus púas."</li>
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
	    <td><?php echo $grafico4A13[$indice]?></td>
	</tr>
	<?php }  ?>	
    </tbody>
</table>


<img src="?controlador=Informes&accion=grafico_4A14" /><br/><br/><br/>
Nomenclatura: <br/>
<ul>
    <li>"1. boldo.",</li>
    <li>"2. vidrio.",</li>
    <li>"3. viento.",</li>
    <li>"4. pino."</li>
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
	    <td><?php echo $grafico4A14[$indice]?></td>
	</tr>
	<?php }  ?>	
    </tbody>
</table>


<hr/><br/><br/><br/>

<h2>Pregunta Número 2 : "Un viajero espacial..."</h2><br/>
<img src="?controlador=Informes&accion=grafico_4A20" /><br/><br/><br/>

Nomenclatura: <br/>
<ul>
	    <li>1. Rodrigo creía que no se podía vivir en las estrellas</li>
	    <li>2. Pablo creía que se podía vivir en las estrellas.</li>
	    <li>3. Rodrigo creía que las estrellas eran como la Tierra.</li>
	    <li>4. Pablo pensaba que las estrellas tenían árboles y cerros.</li>
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
	    <td><?php echo $grafico4A20[$indice]?></td>
	</tr>
	<?php }  ?>	
    </tbody>
</table>

<br/><br/><br/>

<img src="?controlador=Informes&accion=grafico_4A21" /><br/><br/><br/>
Nomenclatura: <br/>
<ul>
    <li>1. Perfectamente habitables.</li>
    <li>2. Habitables con dificultad.</li>
    <li>3. Casi inhabitables.</li>
    <li>4. Totalmente inhabitables.</li>
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
	    <td><?php echo $grafico4A21[$indice]?></td>
	</tr>
	<?php }  ?>	
    </tbody>
</table>


<br/><br/><br/>


<img src="?controlador=Informes&accion=grafico_4A22" /><br/><br/><br/>
Nomenclatura: <br/>
<ul>
    <li>1. Enormemente calientes.</li>
    <li>2. Más calientes que el Sol.</li>
    <li>3. Lo más caliente que hay.</li>
    <li>4. Tan calientes como el Sol.</li>
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
	    <td><?php echo $grafico4A22[$indice]?></td>
	</tr>
	<?php }  ?>	
    </tbody>
</table>

<br/><br/><br/>

<img src="?controlador=Informes&accion=grafico_4A23" /><br/><br/><br/>
Nomenclatura: <br/>
<ul>
    <li>1. Atmósfera.</li>
    <li>2. Luz.</li>
    <li>3. Gases.</li>
    <li>4. Calor.</li>
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
	    <td><?php echo $grafico4A23[$indice]?></td>
	</tr>
	<?php }  ?>	
    </tbody>
</table>

<br/><br/><br/>

<img src="?controlador=Informes&accion=grafico_4A24" /><br/><br/><br/>
Nomenclatura: <br/>
<ul>
    <li>1. No hay gases en su superficie.</li>
    <li>2. No tienen luz propia.</li>
    <li>3. Giran por el espacio.</li>
    <li>4. En todos hay vida.</li>
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
	    <td><?php echo $grafico4A24[$indice]?></td>
	</tr>
	<?php }  ?>	
    </tbody>
</table>

<br/><br/><br/>

<img src="?controlador=Informes&accion=grafico_4A25" /><br/><br/><br/>
Nomenclatura: <br/>
<ul>
    <li>1. Cuenta con seres vivientes.</li>
    <li>2. Es igual a nuestro sol.</li>
    <li>3. Gira alrededor de una estrella.</li>
    <li>4. Tiene una atmósfera de aire.</li>
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
	    <td><?php echo $grafico4A25[$indice]?></td>
	</tr>
	<?php }  ?>	
    </tbody>
</table>


<br/><br/><br/>

<img src="?controlador=Informes&accion=grafico_4A26" /><br/><br/><br/>
Nomenclatura: <br/>
<ul>
    <li>1. Una estrella muy especial.</li>
    <li>2. Un planeta cualquiera.</li>
    <li>3. Un planeta no habitado.</li>
    <li>4. Un planeta habitable.</li>
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
	    <td><?php echo $grafico4A26[$indice]?></td>
	</tr>
	<?php }  ?>	
    </tbody>
</table>

<hr/><br/><br/><br/>

<h2>Pregunta Número 3 : "La ballena y el vigía (1ª. parte)"</h2><br/>
<br/><br/><br/>

<img src="?controlador=Informes&accion=grafico_4A30" /><br/><br/><br/>
Nomenclatura: <br/>
<ul>
	    <li>1. Pegado al barco.</li>
	    <li>2. Bastante cerca del barco.</li>	
	    <li>3. Muy alejado del barco.</li>	
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
	    <td><?php echo $grafico4A30[$indice]?></td>
	</tr>
	<?php }  ?>	
    </tbody>
</table>

<br/><br/><br/>

<img src="?controlador=Informes&accion=grafico_4A31" /><br/><br/><br/>
Nomenclatura: <br/>
<ul>
    <li>1. Mal oído.</li>
    <li>2. Buen oído.</li>	
    <li>3. Muy buen oído.</li>	
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
	    <td><?php echo $grafico4A31[$indice]?></td>
	</tr>
	<?php }  ?>	
    </tbody>
</table>


<br/><br/><br/>

<img src="?controlador=Informes&accion=grafico_4A32" /><br/><br/><br/>
Nomenclatura: <br/>
<ul>
    <li>1. Hace pocos días.</li>
    <li>2. Unos pocos años atrás.</li>		    
    <li>3. Hace mucho tiempo atrás.</li>	
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
	    <td><?php echo $grafico4A32[$indice]?></td>
	</tr>
	<?php }  ?>	
    </tbody>
</table>

<br/><br/><br/>

<img src="?controlador=Informes&accion=grafico_4A33" /><br/><br/><br/>
Nomenclatura: <br/>
<ul>
    <li>1. Largo.</li>
    <li>2. Corto.</li>	
    <li>3. Muy corto.</li>	
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
	    <td><?php echo $grafico4A33[$indice]?></td>
	</tr>
	<?php }  ?>	
    </tbody>
</table>




<hr/><br/><br/><br/>

<h2>Pregunta Número 4 : "La ballena y el vigía (2ª. parte)"</h2><br/>
<br/><br/><br/>

<img src="?controlador=Informes&accion=grafico_4A40" /><br/><br/><br/>
Nomenclatura: <br/>
<ul>
    <li>1.-"A" = Instrumentos usados por la tripulación.</li>
    <li>2.-"B" = Miembros de la tripulación.</li>
    <li>3.-"C" = Partes del barco o del bote.</li>
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
	    <td><?php echo $grafico4A40[$indice]?></td>
	</tr>
	<?php }  ?>	
    </tbody>
</table>

<br/><br/><br/>

<img src="?controlador=Informes&accion=grafico_4A41" />
<br/><br/><br/>
Nomenclatura: <br/>
<ul>
    <li>1.-"A" = Instrumentos usados por la tripulación.</li>
    <li>2.-"B" = Miembros de la tripulación.</li>
    <li>3.-"C" = Partes del barco o del bote.</li>
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
	    <td><?php echo $grafico4A41[$indice]?></td>
	</tr>
	<?php }  ?>	
    </tbody>
</table>

<br/><br/><br/>

<img src="?controlador=Informes&accion=grafico_4A42" />
<br/><br/><br/>
Nomenclatura: <br/>
<ul>
    <li>1.-"A" = Instrumentos usados por la tripulación.</li>
    <li>2.-"B" = Miembros de la tripulación.</li>
    <li>3.-"C" = Partes del barco o del bote.</li>
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
	    <td><?php echo $grafico4A42[$indice]?></td>
	</tr>
	<?php }  ?>	
    </tbody>
</table>

<br/><br/><br/>

<img src="?controlador=Informes&accion=grafico_4A43" />
<br/><br/><br/>
Nomenclatura: <br/>
<ul>
    <li>1.-"A" = Instrumentos usados por la tripulación.</li>
    <li>2.-"B" = Miembros de la tripulación.</li>
    <li>3.-"C" = Partes del barco o del bote.</li>
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
	    <td><?php echo $grafico4A43[$indice]?></td>
	</tr>
	<?php }  ?>	
    </tbody>
</table>


<br/><br/><br/>

<img src="?controlador=Informes&accion=grafico_4A44" />
<br/><br/><br/>
Nomenclatura: <br/>
<ul>
    <li>1.-"A" = Instrumentos usados por la tripulación.</li>
    <li>2.-"B" = Miembros de la tripulación.</li>
    <li>3.-"C" = Partes del barco o del bote.</li>
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
	    <td><?php echo $grafico4A44[$indice]?></td>
	</tr>
	<?php }  ?>	
    </tbody>
</table>


<hr/><br/><br/><br/>

<h2>Comparación de puntajes  Prueba Nivel 3 y 4<br/>
    Formato 'B' y 'A'.</h2>
<br/><br/><br/>
<div id="tabla_general">
<table id="var">
<caption><?php echo $fecha . ", " . $_SESSION['wraprof_NOMBRE_COLEGIO'] . ",  " . $nivel_curso.$letra_curso . " Formato de la Prueba : " . $formato ;?></caption>
    <thead>
	<tr>
	    <td>Lista del Curso</td>
	    <th>Puntaje Prueba - 3B</th>
	    <th>Puntaje Prueba - 4A</th>
	    <th>Variación Puntaje - 3B</th>   
	    <th>Variación Puntaje - 4A</th> 
	    <th>Indice de Variación </th>   

	    
	    <th>Puntaje Z - 3B</th>
	    <th>Puntaje Z - 4A</th>
	    <th>Variación Z - 3B</th>
	    <th>Variación Z - 4A</th>
	    <th>Indice de Variación </th>   


	    <th>Percentil - 3B</th>
	    <th>Percentil - 4A</th>
	    <th>Variación Percentil - 3B</th>
	    <th>Variación Percentil - 4A</th>	 
	    <th>Indice de Variación </th>   


	    <th>Puntaje T - 3B</th>
	    <th>Puntaje T - 4A</th>
	    <th>Variación T - 3B</th>
	    <th>Variación T - 4A</th>
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

<img src="?controlador=Informes&accion=graficoZ5" /><br/><br/><br/>
<table>
<caption><?php echo $fecha . ", " . $_SESSION['wraprof_NOMBRE_COLEGIO'] . ",  " . $nivel_curso.$letra_curso . " Formato de la Prueba : " . $formato ;?></caption>
    <thead>
	<tr>
	    <td>Lista del Curso</td>
	    <th>Puntaje Z - 3B</th>
	    <th>Puntaje Z - 4A</th>
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

<img src="?controlador=Informes&accion=graficoP5" /><br/><br/><br/>
<table>
<caption><?php echo $fecha . ", " . $_SESSION['wraprof_NOMBRE_COLEGIO'] . ",  " . $nivel_curso.$letra_curso . " Formato de la Prueba : " . $formato ;?></caption>
    <thead>
	<tr>
	    <td>Lista del Curso</td>
	    <th>Percentil - 3B</th>
	    <th>Percentil - 4A</th>
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



<img src="?controlador=Informes&accion=graficoT5" /><br/><br/><br/>
<table>
<caption><?php echo $fecha . ", " . $_SESSION['wraprof_NOMBRE_COLEGIO'] . ",  " . $nivel_curso.$letra_curso . " Formato de la Prueba : " . $formato ;?></caption>
    <thead>
	<tr>
	    <td>Lista del Curso</td>
	    <th>Puntaje T - 3B</th>
	    <th>Puntaje T - 4A</th>
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



<img src="?controlador=Informes&accion=graficoPT5" /><br/><br/><br/>
<table>
<caption><?php echo $fecha . ", " . $_SESSION['wraprof_NOMBRE_COLEGIO'] . ",  " . $nivel_curso.$letra_curso . " Formato de la Prueba : " . $formato ;?></caption>
    <thead>
	<tr>
	    <td>Lista del Curso</td>
	    <th>Puntaje - 3B</th>
	    <th>Puntaje - 4A</th>
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

