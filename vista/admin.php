<?php if($_SESSION['es_admin'] != 1) header("Location:?controlador=Admin");

	$log = fopen('libreria/Log/logHD.log','a');

	$texto = FUNC_sizeDomainQuota(300);

	if(file_exists ('libreria/Log/logHD.log')){ 
	    fputs($log,"\r\n[" . date('d-M-Y h:i:s A') . " ] = $texto");
	    fclose($log);
	 	
	    $mensaje = "\r\n[" . date('d-M-Y h:i:s A') . " ] = $texto";
	    $to      = 'admin@proyectonst.cl';
	    $subject = 'Reporte ESPACIO EN DISCO [' .  date('d-M-Y h:i:s A') . '] ' . $_SERVER['REMOTE_ADDR'];
	    $message = $mensaje;
	    $headers = 'From: sysnst@proyectonst.cl' . "\r\n" .
	    'Reply-To: sysnst@proyectonst.cl' . "\r\n" .
	    'X-Mailer: PHP/' . phpversion();

	    mail($to, $subject, $message, $headers);

	    require_once('modelo/LogModelo.php');

	    $a = new LogModelo();

	    $fecha = date('Y-m-d');

	    $titulo = 'HD, Reporte de espacio en disco' .date('h:i:s A');

	    $hora =  date('G:i:s');

	    $ip = '127.0.0.1';

	    $b = $a->setTimeline('HD',$titulo,$message,$fecha,$hora,$_SERVER['REMOTE_ADDR'],'HD');}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Panel de Administración y Estadísticas.</title>

<link rel="stylesheet" type="text/css" href="css/timeline.css" />

<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.8.2.custom.min.js"></script>

<script type="text/javascript" src="js/timeline.js"></script>

</head>

<body>

<div id="main">
    <h1>Panel de Administración y Estadísticas.</h1>
    <h2>Proyecto Educativo NST.<a href="?controlador=Nst&accion=logout">Cerrar Sesión</a></h2>
    
    <div id="admin">
	<table>
	    <tr>
		<td>
			<element>
				<form method="post" action="?controlador=Admin&accion=Profesor">
					<input type="submit" value="Cuentas Profesor" />
				</form>
			</element></td>
		<td>
			<element>
				<form method="post" action="?controlador=Admin&accion=Director">
					<input type="submit" value="Cuentas Director" />
				</form>
			</element></td>
		<td>
			<element>
				<form method="post" action="?controlador=Admin&accion=Sistema">
					<input type="submit" value="Reporte del Sistema" />
				</form>
			</element></td>
		
		<td>
			<element>
				<form method="post" action="?controlador=Admin&accion=Stat">
					<input type="submit" value="Estadísticas" />
				</form>
			</element></td>

	    </tr>
	</table>
    </div>

    <div id="timelineLimiter"> 
    <div id="timelineScroll">  


    <?php $dates = array();
		
        while($row = $timeline->fetch()){
		$dates[date('d-m-Y',strtotime($row['EVENTO_FECHA']))][] = $row;}
        
        $colors = array('green','blue','chreme');
		$scrollPoints = '';
		
        $i=0;
        foreach($dates as $year=>$array){
	    echo '<div class="event">
		    <div class="eventHeading '.$colors[$i++%3].'">'.$year.'</div>
		    <ul class="eventList" >';
        
        foreach($array as $event){
	    
	    echo '<li class="'.$event['TIPO'].'">
	
		<span class="icon" title="'.ucfirst($event['TIPO']).'">
		</span>'.htmlspecialchars($event['TITULO']).'
		
		<div class="content">
		<div class="body">'.($event['TIPO']=='image'?'
		
		<div style="text-align:center">
		    <img src="'.$event['CUERPO'].'" alt="Pincha acá." /></div>':nl2br($event['CUERPO'])).'</div>
		    
		<div class="title">'.htmlspecialchars($event['TITULO']).'</div>
		<div class="date">'.date("F j, Y",strtotime($event['EVENTO_FECHA'])).'</div></div></li>'; }
            
	    echo '</ul></div>';

		$scrollPoints.='<div class="scrollPoints">'.$year.'</div>';
        } ?>
	    
        <div class="clear"></div>
        </div>
        
	<div id="scroll"> 
	    <div id="centered"> 
		    <div id="highlight"></div> 
		    <?php echo $scrollPoints ?>
		<div class="clear"></div>
            </div>
        </div>
        
        <div id="slider"> 
        	<div id="bar"> 
            	<div id="barLeft"></div>  
                <div id="barRight"></div>  
          </div>
        </div>
        
    </div> 

  	<p class="tutInfo">
    Tipitapatapa, √ab está detrás de este proyecto <a href="http://www.gnu.org/licenses/gpl.html">Gnu/GPL 3.0</a>  | <a href="http://www.proyectonst.cl/nst/">http://www.proyectonst.cl</a>, 2010</p>
</div>
	    

<script>
    $(document).ready(function(){  
	$('#sucesos').click(function(){
	    var selector = $('#profeSuc').val();
	    if(selector == '-1'){alert('Debes seleccionar el nombre de un profesor')}
	
	});
  
    });
</script>
</body>
</html>
