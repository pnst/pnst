<?php
class LogControlador extends ControladorBase
{
    public function index(){ $this->view->show('login.php');}

    //Log detecta quienes ingresan
    public function inBrow(){	
    $this->logbrow('[IP : '.$_SERVER [ 'REMOTE_ADDR' ].' Sistema Operativo: '.$_POST['os'].']=> Navegador: '.$_POST['navegador'].' Versión: '.$_POST['version'], $_SERVER[ 'REMOTE_ADDR' ]);
    	
    }

      //ENVIA LOS MENSAJES SOBRE LOS QUE INGRESAN
    function logbrow($texto, $ip){	
	$url = visitadaUrl();

        $log = fopen('libreria/Log/logbrow.log','a');
	
	if(file_exists ('libreria/Log/logbrow.log')){ 
	    fputs($log,"\r\n[" . date('d-M-Y h:i:s A') . " - " . $url . "] Ingreso $texto");
	    fclose($log);
	    
	    $mensaje = "\r\n[" . date('d-M-Y h:i:s A') . " - " . $url . "] Ingreso $texto";
	    $to      = 'admin@proyectonst.cl';
	    $subject = 'Reporte Ingreso [' .  date('d-M-Y h:i:s A') . "] " . $ip;
	    $message = $mensaje;
	    $headers = 'From: sysnst@proyectonst.cl' . "\r\n" .
	    'Reply-To: sysnst@proyectonst.cl' . "\r\n" .
	    'X-Mailer: PHP/' . phpversion();

	    mail($to, $subject, $message, $headers);

	    require_once('modelo/LogModelo.php');

	    $a = new LogModelo();

	    $fecha = date('Y-m-d');

	    $titulo = 'Ingreso '. $ip . ' ' . date('h:i:s A');

	    $hora =  date('G:i:s');

	    $b = $a->setTimeline('Ingreso',$titulo,$message,$fecha,$hora,$ip, 'Ingreso');

	}else{ echo 'El log de Ingresos No existe';}
    }

    
    //Log detecta quienes se tratan de loguearse
    public function inForm(){
	$this->logLoguin('[ IP : '.$_POST [ 'ip' ].' ] - [ Username: '.$_POST[ 'email' ].'] Ingreso: '.$_POST[ 'ingreso' ], $_POST[ 'ip' ], $_POST[ 'ingreso' ]);
    }

    //ENVIA LOS MENSAJES SOBRE EL LOGUIN
    function logLoguin($texto, $ip, $ingreso){
	
	$log = fopen('libreria/Log/logLoguin.log','a');

	$url = visitadaUrl();
		
	if(file_exists ('libreria/Log/logLoguin.log')){ 
	    fputs($log,"\r\n[" . date('d-M-Y h:i:s A') . " - " . $url . "] = $texto");
	    fclose($log);
	
	    $mensaje = "\r\n[" . date('d-M-Y h:i:s A') . " - " . $url . "] = $texto";
	    $to      = 'admin@proyectonst.cl';
	    $subject = 'Reporte Ingresos [' .  date('d-M-Y h:i:s A') . '] ' . $ip . ' [ Situacion : ' . $ingreso . ' ] ';
	    $message = $mensaje;
	    $headers = 'From: sysnst@proyectonst.cl' . "\r\n" .
	    'Reply-To: sysnst@proyectonst.cl' . "\r\n" .
	    'X-Mailer: PHP/' . phpversion();

	    mail($to, $subject, $message, $headers);

	    require_once('modelo/LogModelo.php');

	    $a = new LogModelo();

	    $fecha = date('Y-m-d');

	    $titulo = 'Login '. $ingreso . ' ' .date('h:i:s A');

	    $hora =  date('G:i:s');

	    $b = $a->setTimeline('Loguin',$titulo,$message,$fecha,$hora,$ip,'Login');

	    return;

	}else{ echo 'El log de Loguin NO existe';}
    }
    

    //Log detecta quienes se registran
    public function inReg(){ echo 'llegamos';
      $this->logRegistro('[ IP : '. $_POST['ip'] .' ] - [ Nombre: '. $_POST['nombre'] . ' ' . $_POST['apellido'] .'] E-MAIL: '. $_POST['email'] .' ] COLEGIO: ' . $_POST['colegio'] . ' CARGO : ' . $_POST['cargo'], $_POST['$ip'], $_POST['cargo'], $_POST['colegio']);
    }

    //ENVIA LOS MENSAJES SOBRE EL REGISTRO
    function logRegistro($texto, $ip, $cargo ,$colegio){
	
	$log = fopen('libreria/Log/logRegistro.log','a');

	if(file_exists ('libreria/Log/logRegistro.log')){ 
	    fputs($log,"\r\n[" . date('d-M-Y h:i:s A') . " ] = $texto");
	    fclose($log);
	
	    $mensaje = "\r\n[" . date('d-M-Y h:i:s A') . " ] = $texto";
	    $to      = 'admin@proyectonst.cl';
	    $subject = 'Reporte REGISTROS [' .  date('d-M-Y h:i:s A') . '] ' . $ip ;
	    $message = $mensaje;
	    $headers = 'From: sysnst@proyectonst.cl' . "\r\n" .
	    'Reply-To: sysnst@proyectonst.cl' . "\r\n" .
	    'X-Mailer: PHP/' . phpversion();

	    mail($to, $subject, $message, $headers);


	    require_once('modelo/LogModelo.php');

	    $a = new LogModelo();

	    $fecha = date('Y-m-d');

	    $titulo = 'Registro '. $cargo . ' ' .$colegio. ' '. date('h:i:s A');

	    $hora =  date('G:i:s');

	    $b = $a->setTimeline('Registro',$titulo,$message,$fecha,$hora,$ip,'Registro');


	    return;

	}else{ echo 'El log de Loguin NO existe';}
    }
    
    public function mailR(){ mail_recordatorio($_POST['to']);}

    public function mailB(){ mail_promocion($_POST['to1']);}




}		
