<?php
class PanelControlador extends ControladorBase
{
	public function index()
	{

	require_once('modelo/NstModelo.php');
	/* Indicar que este usuario se ha logueado */
	$logueado = new NstModelo();

	if(isset($_SESSION['configuracion']) && !empty($_SESSION['configuracion'])){	  
	
	if($_SESSION['configuracion'] == "profesor"){
	    
	    $id_usuario = $_SESSION['wraprof_id_profesor'];
	    
	    $logueado->Loguinprof($id_usuario);

	    $this->view->show("Profesor.php");}

	if($_SESSION['configuracion'] == "director"){
	    
	    $id_usuario = $_SESSION['wradir_id_dir'];
	    
	    $logueado->Loguindir($id_usuario);
	    
	    $this->view->show("Director.php");}
	
	}else{ $this->view->show("login.php");}
    }

}
