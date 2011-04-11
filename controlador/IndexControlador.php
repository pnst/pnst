<?php
class IndexControlador extends ControladorBase
{
    //Accion index
    public function index(){

	//Obtiena Fecha y la transforma a formato Mysql::libreria 'funcion.php'
	$fecha_hoy = date("d/m/Y");
	$fecha_hoy = cambia_a_mysql($fecha_hoy);

	//Incluye el modelo que corresponde
	require_once ('modelo/IndexModelo.php');

	//Creamos una instancia de nuestro "modelo"
	$prueba = new IndexModelo();
	
	//Le pedimos al modelo todos los items
	$listado = $prueba->listadoPruebas($fecha_hoy);

	//Pasamos a la vista toda la información que se desea representar
	$data['listado'] = $listado;
		
	//Finalmente presentamos nuestra plantilla
	$this->view->show("IniTop.php"); 
	$this->view->show("IniNav.php"); 
	$this->view->show("Ini.php", $data);
	$this->view->show("IniFooter.php");
    }

    
    public function formComentatio(){$this->view->show("formComentatio.php");}
    
    public function blog(){header("Location: http://www.proyectonst.cl/duh/"); }    

    public function Tour(){ 
	$this->view->show("IniTop.php"); 
	$this->view->show("IniNav.php"); 
	$this->view->show("Tour.php");
    	$this->view->show("IniFooter.php");

    }

    public function Tour_1(){ 
	$this->view->show("IniTop.php"); 
	$this->view->show("IniNav.php"); 
	$this->view->show("Tour_1.php");
    	$this->view->show("IniFooter.php");

    }

    public function Tour_2(){ 
	$this->view->show("IniTop.php"); 
	$this->view->show("IniNav.php"); 
	$this->view->show("Tour_2.php");
    	$this->view->show("IniFooter.php");

    }
    public function Tour_3(){ 
	$this->view->show("IniTop.php"); 
	$this->view->show("IniNav.php"); 
	$this->view->show("Tour_3.php");
    	$this->view->show("IniFooter.php");

    }

    public function About(){

	$this->view->show("IniTop.php"); 
	$this->view->show("IniNav.php"); 
	$this->view->show("About.php");
	$this->view->show("IniFooter.php");

   }

    public function Terminos(){	
	$this->view->show("IniTop.php"); 
	$this->view->show("IniNav.php"); 
	$this->view->show("Terminos.php"); 
	$this->view->show("alt_footer.php");

    }

    public function Privacidad(){
	$this->view->show("IniTop.php"); 
	$this->view->show("IniNav.php"); 
	$this->view->show("Privacidad.php");
	$this->view->show("IniFooter.php");
    }
    public function Cookies(){
	$this->view->show("IniTop.php"); 
	$this->view->show("IniNav.php"); 
	$this->view->show("Cookies.php");
	$this->view->show("IniFooter.php");
    }

    public function saveData(){
	$this->view->show("IniTop.php"); 
	$this->view->show("IniNav.php"); 
	$this->view->show("saveData.php");
	$this->view->show("IniFooter.php");
    }
     
     public function recuperaPassw(){
	$this->view->show("IniTop.php"); 
	$this->view->show("IniNav.php"); 
	$this->view->show("saveData.php");
	$this->view->show("IniFooter.php");
    }
    public function polSeguridad(){
    	$this->view->show("IniTop.php"); 
	$this->view->show("IniNav.php"); 
	$this->view->show("polSeguridad.php");
	$this->view->show("IniFooter.php");

    }

    public function formsubmit(){
	
	$emailAddress = 'contacto@proyectonst.cl';

	require_once "clases/class.phpmailer.php";

	foreach($_POST as $k=>$v){
	    if(ini_get('magic_quotes_gpc'))
		$_POST[$k]=stripslashes($_POST[$k]);
	
		$_POST[$k]=htmlspecialchars(strip_tags($_POST[$k]));
	    }	    

	$err = array();

	if(!checkLen('name'))
	$err[]='Debes arreglar el largo de este campo!';

	if(!checkLen('email'))
	    $err[]='Es extraño, pero la dirección de email es muy corta.';
	else if(!checkEmail($_POST['email']))
	    $err[]='El email no es válido';

	if(!checkLen('subject'))
	    $err[]='Debes indicar el asunto';

	if(!checkLen('message'))
	    $err[]='Hay problemas con el mensaje, agregale más datos.';

	if((int)$_POST['captcha'] != $_SESSION['expect'])
	    $err[]='El número de identificación no es correcto';

	if(count($err)){
	    
	    if($_POST['ajax']){	echo '-1';}
	    else if($_SERVER['HTTP_REFERER']){
		$_SESSION['errStr'] = implode('<br />',$err);
		$_SESSION['post']=$_POST;
		
		header('Location: '.$_SERVER['HTTP_REFERER']);}

		exit;}

	$msg=
	'Nombre:	'.$_POST['name'].'<br />
	Email:	'.$_POST['email'].'<br />
	IP:	'.$_SERVER['REMOTE_ADDR'].'<br /><br />

	Mensaje:<br /><br />

	'.nl2br($_POST['message']).' ';


	$mail = new PHPMailer();
	$mail->IsMail();

	$mail->AddReplyTo($_POST['email'], $_POST['name']);
	$mail->AddAddress($emailAddress);
	$mail->SetFrom($_POST['email'], $_POST['name']);
	$mail->Subject = "A new ".mb_strtolower($_POST['subject'])." from ".$_POST['name']." | enviados desde el formulario de comentarios";

	$mail->MsgHTML($msg);

	$mail->Send();


	unset($_SESSION['post']);

	if($_POST['ajax']){ echo '1';}
	else {
	$_SESSION['sent']=1;
	
	if($_SERVER['HTTP_REFERER'])
		header('Location: '.$_SERVER['HTTP_REFERER']);
	
	exit;}
    }
  }
?>
