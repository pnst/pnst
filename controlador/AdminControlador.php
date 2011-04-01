<?php
class AdminControlador extends ControladorBase
{
    function index(){
	    $this->view->show('admin_login.php');
    }

    function librerias(){
	require_once('modelo/LogModelo.php');
	require_once('modelo/AdminModelo.php');
	require_once('clases/admin.class.php');

    }
    
    //LOGIN ADMINISTRADOR
    public function admin(){

	$this->librerias();

	$a = new LogModelo();

	$data['timeline'] = $a->timeline();
    
	$this->view->show('admin.php', $data);
    }

    public function valida(){
	if(isset($_POST['us']) && !empty($_POST['us']) && isset($_POST['pa']) && !empty($_POST['pa'])){
	    $user = $_POST['us'];
	    // $passw = md5($_POST['pa']);
	    $passw = $_POST['pa'];

	    $this->librerias();

	    $a = new AdminModelo();

	    $b = $a->valida_admin($user);

	    $c = new adminClass();

	    $d = $c->valida_admin($b, $user, $passw); 

	    if ($d == '1'){ 
		$_SESSION['es_admin'] = 1;
		$this->admin();
	
	    }else{
		$_SESSION['es_admin'] = 0;
		$this->view->show('admin_login.php');}

	}else{	$this->view->show('admin_login.php');}

    }

    public function Profesor(){

	$this->librerias();
    
	$a = new AdminModelo();

	$data['profesor'] = $a->Prof();

	$this->view->show('cuentaProfesor.php', $data);
    }

    public function Director(){

	$this->librerias();
    
	$a = new AdminModelo();

	$data['director'] = $a->Dir();

	$this->view->show('cuentaDirector.php', $data);
    }

    public function Sistema(){

	$this->librerias();
    
	$a = new AdminModelo();

	$data['sistema'] = $a->Sys();

	$this->view->show('sistema.php', $data);
    }

}		
