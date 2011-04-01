<?php
// Function to check response time
	function pingDomain($domain){
		$starttime = microtime(true);
		$file      = fsockopen ($domain, 80, $errno, $errstr, 10);
		$stoptime  = microtime(true);
		$status    = 0;
 
		if (!$file) $status = -1;  // Site is down
		else {
			fclose($file);
			$status = ($stoptime - $starttime) * 1000;
			$status = floor($status);
		}
		return $status;
	}
 
	// notificamos via email
	if (pingDomain('www.proyectonst.cl/nst/') < 0) {
    
	    if(file_exists ('libreria/Log/logHD.log')){ 
	    fputs($log,"\r\n[" . date('d-M-Y h:i:s A') . " ] = www.proyectonst.cl/nst/ CAÃ�DO !!!");
	    fclose($log);
	
	    $to      = 'admin@proyectonst.cl';
	    $subject = 'Reporte STATUS SERVIDOR [' .  date('d-M-Y h:i:s A') . ']';
	    $message = 'Sitio CAIDO!!!!!!!!!!!!!';
	    $headers = 'From: sysnst@proyectonst.cl' . "\r\n" .
	    'Reply-To: sysnst@proyectonst.cl' . "\r\n" .
	    'X-Mailer: PHP/' . phpversion();

	    mail($to, $subject, $message, $headers);

	    require_once('modelo/LogModelo.php');

	    $a = new LogModelo();

	    $fecha = date('Y-m-d');

	    $titulo = 'Monitoreo Servidor, Monitoreo Servidor' .date('h:i:s A');

	    $hora =  date('G:i:s');

	    $ip = '127.0.0.1';

	    $b = $a->setTimeline('SERVER',$titulo,$message,$fecha,$hora,$ip,'SERVER');
		}
	}

//SABER ESPACIO EN DISCO

function FUNC_sizeDomainQuota($quota){ 
 
    function obsah($adr,&$totalquota,&$dir,&$size){ 
 
          $dp = OpenDir($adr); 
 
              do{ 
 
                $itm = ReadDir($dp); 
 
    if (Is_Dir("$adr/$itm")&&($itm!=".")&&($itm!="..")&&($itm!="")){ 
 
      obsah("$adr/$itm",$totalquota,$dir,$size); 
 
          $dir++; 
    } 
 
    elseif (($itm!=".")&&($itm!="..")&&($itm!="")){ 
 
      $size = $size + FileSize("$adr/$itm"); 
      $totalquota++; 
    } 
 
  } while ($itm!=false); 
 
  CloseDir($dp); 
 
} 
 
    obsah(".",$totalquota,$dir,$size); 
 
        $freeA = $size/1024*1024; 
        $freeA = $freeA/1024; 
        $freeA = $freeA/1024; 
 
        $exp = explode(".",$freeA); 
        $freeN = substr($exp[1],0,2); 
        $freeA = $exp[0].".".$freeN; 
 
	$freeB = $quota-$freeA;
 
        $datosQuote = "TamaÃ±o de PNST: <B>$freeA</B> Mbytes<br/> Espacio en Disco: <B>$quota</B> Mbytes<br>Espacio Libre: <B>$freeB</B> Mbytes <br/> Ocupado por <B>$totalquota</B> ficheros y <B>$dir</B> carpeta\s<br/>"; 
 
    return $datosQuote; 
} 

$log = fopen('libreria/Log/logHD.log','a');

	$texto = FUNC_sizeDomainQuota(300);

	if(file_exists ('libreria/Log/logHD.log')){ 
	    fputs($log,"\r\n[" . date('d-M-Y h:i:s A') . " ] = $texto");
	    fclose($log);
	
	    $mensaje = "\r\n[" . date('d-M-Y h:i:s A') . " ] = $texto";
	    $to      = 'admin@proyectonst.cl';
	    $subject = 'Reporte ESPACIO EN DISCO [' .  date('d-M-Y h:i:s A') . '] ' . $ip ;
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

	    $b = $a->setTimeline('HD',$titulo,$message,$fecha,$hora,$ip,'HD');
	}

?>