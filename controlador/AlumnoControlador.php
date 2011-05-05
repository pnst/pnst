<?php
class AlumnoControlador extends ControladorBase
{
    public function index(){
		    
    }
    
    public function registro_curso_almn(){

	require_once 'modelo/AlumnoModelo.php';

	$almn = new AlumnoModelo();

	$curso_almn = $almn->get_curso_almn($_SESSION['wraprof_id_profesor']);
    	
	$data['curso_almn'] = $curso_almn;
	
	$this->view->show("registro_almn.php", $data);
    }

    public function lista_curso_almn(){
	if (isset($_POST['id_curso']) && !empty($_POST['id_curso'])){

	require_once 'modelo/AlumnoModelo.php';

	$almn_list = new AlumnoModelo();

	$lista_almn = $almn_list->get_lista_almn($_POST['id_curso']);
    	
	$data['lista_almn'] = $lista_almn;
	
	$this->view->show("listado_almn.php", $data);
	}
    }

    public function eliminar(){
	require_once'modelo/AlumnoModelo.php';

	$eliminar_alumno = new AlumnoModelo();

	$eliminar_alumno->eliminar_alumno($_POST['id_alumno']);

	require_once('modelo/LogModelo.php');

	    $a = new LogModelo();

	    $fecha = date('Y-m-d');

	    $titulo = 'DelAlumno  '.$_SESSION['wraprof_nombre_colegio']	. ' '. date('h:i:s A');
	    $message = $_SESSION['wraprof_nombre_prof']. ' '.$_SESSION['wraprof_apellido_prof']. ' del colegio: '. $_SESSION['wraprof_nombre_colegio']. ' ha eliminado al alumno con id: '. $_POST['id_alumno'].' aceptando a la advertencia hecha por el sistema';			

	    $hora =  date('G:i:s');

	    $ip = '127.0.0.1';

	    $b = $a->setTimeline('DelAlumno',$titulo,$message,$fecha,$hora,$ip,'DelAlumno');

	    $c = $a->setReporteDir($_SESSION['wraprof_id_profesor'],$_SESSION['rbd_prof'], 'DelAlumno', $fecha,$hora, $message);

    }

    public function insertar(){
	if(isset($_POST['apellido1']) && !empty($_POST['apellido1']) &&  isset($_POST['apellido2']) && !empty($_POST['apellido2']) && isset($_POST['curso_alumno']) && !empty($_POST['curso_alumno']) && isset($_POST['nombre1']) && !empty($_POST['nombre1']) && isset($_POST['nombre2']) && !empty($_POST['nombre2']) && isset($_POST['curso_alumno']) && !empty($_POST['curso_alumno'])){
	    /* cambio minÃºsculas a mayÃºsculas */    
	$nombre1 = strtoupper($_POST['nombre1']);
	$nombre2 = strtoupper($_POST['nombre2']);
	$apellido1 = strtoupper($_POST['apellido1']);
	$apellido2 = strtoupper($_POST['apellido2']);
	
	$rut = $_POST['rut'];
	$arrRut = explode("-",$rut);
	$a = solo_numeros($arrRut[1]);
	$b = solo_numeros($arrRut[0]);
	if($a == true){
	if($b == true){
	if(dv($arrRut[0]) == strtoupper($arrRut[1])){
    
	require_once 'modelo/AlumnoModelo.php';

	$insertar_alumno = new AlumnoModelo();

	$insertar_alumno->insertar_alumno($nombre1, $nombre2, $apellido1, $apellido2, $_POST['curso_alumno'], $_POST['rut']);
		
	}else { echo 1;}
		}else{echo 2;}
	}else{ echo 2;}
	
	

	require_once('modelo/LogModelo.php');

	    $a = new LogModelo();

	    $fecha = date('Y-m-d');

	    $titulo = 'AddAlumno '. $_POST['curso_alumno'] . ' ' .$_SESSION['wraprof_nombre_colegio']	. ' '. date('h:i:s A');
	    $message = $_SESSION['wraprof_nombre_prof']. ' '.$_SESSION['wraprof_apellido_prof']. ' del colegio: '. $_SESSION['wraprof_nombre_colegio']. ' ha agregado al alumno: '. $nombre1 . ' '. $nombre2 .' '.$apellido1. ' '.$apellido2.' al curso: '.$_POST['curso_alumno'];			

	    $hora =  date('G:i:s');

	    $ip = '127.0.0.1';

	    $b = $a->setTimeline('AddAlumno',$titulo,$message,$fecha,$hora,$ip,'AddAlumno');

	    $c = $a->setReporteDir($_SESSION['wraprof_id_profesor'],$_SESSION['rbd_prof'],'AddAlumno', $fecha,$hora, $message);


	}
    }

    public function jeip_alumno(){
	if(isset($_POST['value']) && !empty($_POST['value'])){
	    list($campo, $id_alumno) = explode("?", $_POST['id']);
	    if($campo == 'n1' OR $campo == 'n2' OR $campo == 'a1' OR $campo == 'a2'){
		if ($campo == 'n1'){ $campo = 'nombre1_alumn'; }
		if ($campo == 'n2'){ $campo = 'nombre2_alumn'; }
		if ($campo == 'a1'){ $campo = 'apellido1_alumn';}
		if ($campo == 'a2'){ $campo = 'apellido2_alumn';}
		
	       	$formato = strtoupper($_POST['value']);
		
		if(eregi("^[A-ZÃ±Ã¡Ã©Ã­Ã³ÃºÃ¼Ã‘Ã�Ã‰Ã�Ã“ÃšÃœ]{3,25}$",$formato)){
		
		require_once 'modelo/AlumnoModelo.php';

		$actualiza_registro_alumno = new AlumnoModelo();

		$actualiza_registro_alumno->actualiza_registro($id_alumno, $campo,$formato);
		}else{ $formato = 'SÃ³lo Letras, mÃ­n 3 y mÃ¡x 25'; echo $formato;}

	require_once('modelo/LogModelo.php');

	    $a = new LogModelo();

	    $fecha = date('Y-m-d');

	    $titulo = 'EditAlumno, Profesor@ : '.$_SESSION['wraprof_nombre_prof'].' '.$_SESSION['wraprof_apellido_prof'].' del colegio:' .$_SESSION['wraprof_nombre_colegio']. ' ha modificado un valor en un alumno '. date('h:i:s A');
	    $message = $_SESSION['wraprof_nombre_prof'].' '.$_SESSION['wraprof_apellido_prof']. ' del colegio: '. $_SESSION['wraprof_nombre_colegio']. 'ha modificado un valor en un alumno(id = '.$id_alumno.') el  valor: '. $_POST['value'].' en el campo: '.$campo;			

	    $hora =  date('G:i:s');

	    $ip = '127.0.0.1';

	    $b = $a->setTimeline('EditAlumno',$titulo,$message,$fecha,$hora,$ip,'EditAlumno');

	    $c = $a->setReporteDir($_SESSION['wraprof_id_profesor'], $_SESSION['rbd_prof'],'EditAlumno', $fecha,$hora,$message);

	    }else{echo 'campo no reconocido';}
	}else{echo 'debes escribir un nombre Ã³ apellido';}
    }

    public function listado_almn_prba(){

	require_once ('clases/alumno.class.php');

	$filtrar = new alumnoClass();

	$data['listado_alumnos'] = $filtrar->filtro_listaCurso();
	
	$this->view->show('listado_almn_prba.php', $data);
    }

    public function listado_filtrado($id, $nombre, $apellido){

	$data['listado_alumnos'] = $nombre;

	$this->view->show('listado_almn_filtrado.php', $data);
    
    
    }
}		
