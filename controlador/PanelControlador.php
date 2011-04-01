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
	    
	    $id_usuario = $_SESSION['wraprof_ID_PROFESOR'];
	    
	    $logueado->Loguinprof($id_usuario);

	    $this->view->show("profesor.php");}

	if($_SESSION['configuracion'] == "director"){
	    
	    $id_usuario = $_SESSION['wradir_ID_DIR'];
	    
	    $logueado->Loguindir($id_usuario);
	    
	    $this->view->show("director.php");}
	
	}else{ $this->view->show("login.php");}
    }

}
