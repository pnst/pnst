<?php
class PruebaControlador extends ControladorBase
{
    public function index(){ $this->view->show("profesor.php"); }

    function libreria(){
	require_once ('clases/nst.class.php');
	require_once ('modelo/PruebaModelo.php');
	require_once ('clases/prueba.class.php');
    }
    
    public function registro(){
	if(!empty($_POST['id_curso']) && isset($_POST['id_curso']) && !empty($_POST['formato_prueba']) && isset($_POST['formato_prueba']) && !empty($_POST['fecha']) && isset($_POST['fecha']) && !empty($_POST['codigo_prueba']) && isset($_POST['codigo_prueba']) ){

	$this->libreria();

	$ingresa_prueba = new PruebaModelo();

	$fecha = date('Y-m-d');

	$b = $ingresa_prueba->cantPrba_anual($_POST['id_curso'], $fecha);

	$d = $b->rowCount();

	if($d >= 2) die("0");
	else{	
	/*Se sabe si el formato ya está ingresado en el sistema*/
	$a = new pruebaClass();

	$c = $a->forPrba_anual($b, $_POST['formato_prueba'], $_POST['fecha']);


	$fecha = cambia_a_mysql($_POST['fecha']);


	$buscaNivel = new  nstClass();

	$nivel = $buscaNivel->buscaNivel($_POST['id_curso']);
	
	$estado = "Pr&oacute;ximo";
	    
	$ingresa_prueba = $ingresa_prueba->set_registro($_POST['id_curso'], $_POST['formato_prueba'], $fecha, $_POST['codigo_prueba'], $_SESSION['wraprof_id_profesor'], $estado, $nivel);

	require_once('modelo/LogModelo.php');

	    $a = new LogModelo();

	    $fecha1 = date('Y-m-d');

	    $titulo = 'AddPrba  '.$_SESSION['wraprof_nombre_colegio'].' para el día : '.$fecha. ' - '. date('h:i:s A');
	    $message = $_SESSION['wraprof_nombre_prof']. ' '.$_SESSION['wraprof_apellido_prof']. ' del colegio: '. $_SESSION['wraprof_nombre_colegio']. ' ha agregado la prueba de asignatura : 1, al curso '. $_POST['id_curso'] . 'con el formato: '.  $_POST['formato_prueba'].' en el nivel: '. $nivel .' se encuentra con estado: '.$estado.' para el día: '.$fecha.' y el código de la prueba es:'.$_POST['codigo_prueba'];			

	    $hora =  date('G:i:s');

	    $ip = '127.0.0.1';

	    $b = $a->setTimeline('AddPrba',$titulo,$message,$fecha1,$hora,$ip,'AddPrba');

	    $c = $a->setReporteDir($_SESSION['wraprof_id_profesor'], $_SESSION['rbd_prof'],'Editalumno', $fecha,$hora,$message);

	echo 1;}
	}else{ echo -10;}
	
	
    }

    function listado_prba(){
    	
	require_once 'modelo/PruebaModelo.php';

	$cursos = new PruebaModelo();

	$fecha = date('Y-m-d');
	    
	$listado_prueba = $cursos->get_lista_prba($_SESSION['wraprof_id_profesor'], $fecha);	
		    
	$data['listado_prueba'] = $listado_prueba;
	
	$this->view->show("listado_prba.php", $data);
    }

    public function registro_prba(){
	/* Esta función muestra en el cuadro de registro de 
	 * prueba los cursos que corresponden al profesro
	 * de forma dinámica
	 */

	require_once 'modelo/PruebaModelo.php';

	$cursos = new PruebaModelo();
	    
	$listado_curso = $cursos->get_cursos_prof($_SESSION['wraprof_id_profesor']);	
		    
	$data['listado_curso'] = $listado_curso;

	$this->view->show("registro_prba.php", $data);

    }

    public function jeip_prba(){
	if(isset($_POST['value']) && !empty($_POST['value'])){

	    list($campo, $id_prba) = explode("?", $_POST['id']);

	    if ($campo == 'for' ){
	    if ($_POST['value'] == 'A' OR $_POST['value'] == 'B' OR $_POST['value'] == 'a' OR $_POST['value'] == 'b'){

		    $formato = strtoupper($_POST['value']);
		
		    $this->set_act_prba($id_prba, $campo, $formato);

		    echo $formato;

		}else {	echo "Formato no válido";}}
	
	    if ($campo == 'fe'){
		$valida_fecha = fecha_valida_prba($_POST['value']);

		if ($valida_fecha == TRUE ){

		    echo $_POST['value'];

		    $this->set_act_prba($id_prba, $campo, $_POST['value']);	

		}else{ echo "La fecha no es válida";}}

	    if ($campo == 'aa'){

		$largo = comprobar_codigo_prba($_POST['value']);
		if ($largo == TRUE){
			echo $_POST['value'];
			$this->set_act_prba($id_prba, $campo, $_POST['value']);	
		}else{echo $_POST['value'] . " Debe tener un mínimo de 3 letras y un máximo de 8";}}
	}
    }

    function set_act_prba($id_prba, $campo, $value){
	//entrego valor de $campo
	if ($campo == 'fe'){ $campo = 'fecha_prba';$value = cambia_a_mysql($value);}
	if ($campo == 'aa'){ $campo = 'codigo_prba';}
	if ($campo == 'for'){ $campo = 'formato_prba';}	

	require_once 'modelo/PruebaModelo.php';

	$actualiza_registro_prba = new PruebaModelo();

	$actualiza_registro_prba->actualiza_registro($id_prba, $campo, $value);

	require_once('modelo/LogModelo.php');

	    $a = new LogModelo();

	    $fecha1 = date('Y-m-d');

	    $titulo = 'EditPrba  '.$_SESSION['wraprof_nombre_colegio'].' ha modificado una prueba -'. date('h:i:s A');
	    $message = $_SESSION['wraprof_nombre_prof']. ' '.$_SESSION['wraprof_apellido_prof']. ' del colegio: '. $_SESSION['wraprof_nombre_colegio']. ' ha modificado la prueba .'.$id_prba .', ha modificado el campo: '.$campo.' con el valor: '. $value;			

	    $hora =  date('G:i:s');

	    $ip = '127.0.0.1';

	    $b = $a->setTimeline('EditPrba',$titulo,$message,$fecha1,$hora,$ip,'EditPrba');

	    $c = $a->setReporteDir($_SESSION['wraprof_id_profesor'], $_SESSION['rbd_prof'],'Editalumno', $fecha,$hora,$message);

    }

    public function cambiaEstado_prba(){
	if(isset($_POST['id']) && !empty($_POST['id'])){

	    require_once('modelo/PruebaModelo.php');

	    $cambiaEstado = new PruebaModelo();

	    $cambiaEstado->cambiaEstado_prba($_POST['id']);

	require_once('modelo/LogModelo.php');

	    $a = new LogModelo();

	    $fecha1 = date('Y-m-d');

	    $titulo = 'CerrarPrba  '.$_SESSION['wraprof_nombre_colegio'].' ha cerrado una prueba -'. date('h:i:s A');
	    $message = $_SESSION['wraprof_nombre_prof']. ' '.$_SESSION['wraprof_apellido_prof']. ' del colegio: '. $_SESSION['wraprof_nombre_colegio']. ' ha cerrado la prueba .'.$_POST['id'];			

	    $hora =  date('G:i:s');

	    $ip = '127.0.0.1';

	    $b = $a->setTimeline('CerrarPrba',$titulo,$message,$fecha1,$hora,$ip,'CerrarPrba');

	    $c = $a->setReporteDir($_SESSION['wraprof_id_profesor'], $_SESSION['rbd_prof'],'Editalumno', $fecha,$hora,$message);
	    return;
	}
    }

    
    public function eliminar(){

	require_once 'modelo/PruebaModelo.php';

	$eliminar_prba = new PruebaModelo();

	$eliminar_prba->eliminar_prba($_POST['id']);

	require_once('modelo/LogModelo.php');

	    $a = new LogModelo();

	    $fecha1 = date('Y-m-d');

	    $titulo = 'DelPrba  '.$_SESSION['wraprof_nombre_colegio'].' ha eliminado una prueba -'. date('h:i:s A');
	    $message = $_SESSION['wraprof_nombre_prof']. ' '.$_SESSION['wraprof_apellido_prof']. ' del colegio: '. $_SESSION['wraprof_nombre_colegio']. ' ha eliminado la prueba .'.$_POST['id'];			

	    $hora =  date('G:i:s');

	    $ip = '127.0.0.1';

	    $b = $a->setTimeline('DelPrba',$titulo,$message,$fecha1,$hora,$ip,'DelPrba');

	    $c = $a->setReporteDir($_SESSION['wraprof_id_profesor'],$_SESSION['rbd_prof'],'Editalumno', $fecha,$hora,$message);

    }

    public function wra_respuestas(){
	if(isset($_POST['id_alumno']) && !empty($_POST['id_alumno'])){
	    require_once 'clases/especifPrba.class.php';

	    $info_alumno = new especifPrba();

	    $_SESSION['path_prba'] = especifPrba::info_alumno($_POST['id_alumno']);

	    /*envio el id para filtrar e indicar que este alumno
	     * ya fué seleccionado en la lista del curso*/

	    require_once ('modelo/alumnoModelo.php');
	  
	    $filtrar = new alumnoModelo();

	    $filtrar->rindiendoPrba($_SESSION['wrares_id_alumno']);

	    $filtrar->filtrar_lista($_SESSION["wrares_id_prueba"],$_SESSION['wrares_id_alumno']); 
	    
	     echo '?controlador=Prueba&accion=rinde_prueba';
	}
    }

    public function terminaPrba(){
	    
	require_once ('modelo/alumnoModelo.php');
	  
	    $filtrar = new alumnoModelo();

	    $filtrar->terminaPrba($_SESSION['wrares_id_alumno']);}

    public function rinde_prueba(){
	if(isset($_SESSION['path_prba']) && !empty($_SESSION['path_prba'])){
	    $this->view->show($_SESSION['path_prba']);
	}
    }

    /* Function que se dedica a "armar" arreglos 
     * y enviarlos a la clase resultados
     */ 
    public function nstresp(){

    /****************************************************************************/
    /*respuestas de la prueba 1A */
    if ( isset($_POST['respu1']) OR isset($_POST['respu2'])){
	$resp1[] = '3';
	foreach ($_POST['respu1'] as $posicion => $resp){ $respu1[] = $resp;}
	foreach ($_POST['respu2'] as $position => $resp){ $respu2[] = $resp;} 
	foreach ($_POST['respu3'] as $position => $resp){ $respu3[] = $resp;} 
	$ov = array ( 1 => $_POST['ov1'], 2 => $_POST['ov2'], 3 => $_POST['ov3'], 4 => $_POST['ov4'], 5 => $_POST['ov5'], 6 => $_POST['ov6'], 7 => $_POST['ov7']);
	 	
	require_once("ResultadosControlador.php");

	$objwra = new ResultadosControlador;

	ResultadosControlador::respUnoa($respu1, $respu2, $respu3, $ov);
	
	return;
    }

    /****************************************************************************/
    /*respuestas de la prueba 1B */
    if ( isset($_POST['respu4']) OR isset($_POST['respu5'])){
	$resp1[] = '3';
	foreach ($_POST['respu4'] as $posicion => $resp){ $respu4[] = $resp;}
	foreach ($_POST['respu5'] as $position => $resp){ $respu5[] = $resp;} 
	foreach ($_POST['respu6'] as $position => $resp){ $respu6[] = $resp;} 
	foreach ($_POST['respu7'] as $position => $resp){ $respu7[] = $resp;} 
	 	
	require_once("ResultadosControlador.php");

	$objwra = new ResultadosControlador;

	ResultadosControlador::respUnob($respu4, $respu5, $respu6, $respu7);
	
	return;
    }



    
    /****************************************************************************/
    /*respuestas de la prueba 2A */
    if ( isset($_POST['resp1']) OR isset($_POST['resp2'])){
	$resp1[] = '3';
	foreach ($_POST['resp1'] as $posicion => $resp){ $resp1[] = $resp;}
	foreach ($_POST['resp2'] as $position => $resp){ $resp2[] = $resp;} 
	foreach ($_POST['resp3'] as $position => $resp){ $resp3[] = $resp;} 
	$gol = array (0 => $_POST['gol1'], 1 => $_POST['gol1'], 2 => $_POST['gol2'], 3 => $_POST['gol3'], 4 => $_POST['gol4'], 5 => $_POST['gol5'], 6 => $_POST['gol6'], 7 => $_POST['gol7']);
	 	
	require_once("ResultadosControlador.php");

	$objwra = new ResultadosControlador;

	ResultadosControlador::respDosa($gol, $resp1, $resp2, $resp3);
	
	return;
    }
    /****************************************************************************/
    /*respuestas de la prueba 2B */
    if (isset($_POST['resp4']) OR isset($_POST['resp5']) OR isset($_POST['resp6'])){

	foreach ($_POST['resp4'] as $position => $resp){	$resp4[] = $resp;}
	foreach ($_POST['resp5'] as $position => $resp){	$resp5[] = $resp;} 
	foreach ($_POST['resp6'] as $position => $resp){	$resp6[] = $resp;} 
	$paseo = array (0 => $_POST['paseo1'], 1 => $_POST['paseo2'], 2 => $_POST['paseo3'], 3 => $_POST['paseo4'], 4 => $_POST['paseo5'], 5 => $_POST['paseo6'], 6 => $_POST['paseo7'], 7 => $_POST['paseo7']);

	require_once("clases/resultados.class.php");
	$objwra = new resultados;
	resultados::respDosb($paseo, $resp4, $resp5, $resp6);
    }
    /****************************************************************************/
    /*respuestas de la prueba 3A */
    if ( isset($_POST['resp7'])){
	
	foreach ($_POST['resp7'] as $position => $resp){ $resp7[] = $resp;}
	
	$satisf = array (0 => $_POST['3a11'], 1 => $_POST['3a12'], 2 => $_POST['3a13'], 3 => $_POST['3a14']);

	$paseo = array (0 => $_POST['paseo1'], 1 => $_POST['paseo2'], 2 => $_POST['paseo3'], 3 => $_POST['paseo4'],  4 => $_POST['paseo5'], 5 => $_POST['paseo6'], 6 => $_POST['paseo7']);

	$playa = array (0 => $_POST['playa1'], 1 => $_POST['playa2'], 2 => $_POST['playa3'], 3 => $_POST['playa4'], 4 => $_POST['playa5'],5 => $_POST['playa6']);

	require_once("clases/resultados.class.php");
	
	$objwra = new resultados;

	resultados::respTresa($paseo, $playa, $satisf, $resp7);
    }
    /****************************************************************************/
    /*respuestas de la prueba 3B */
    if (isset( $_POST['resp8'])){

	foreach ($_POST['resp8'] as $position => $resp){ $resp8[] = $resp;}
    
	$aire = array (0 => $_POST['aire1'], 1 => $_POST['aire2'], 2 => $_POST['aire3'], 3 => $_POST['aire4'], 4 => $_POST['aire5']);
    
	$dep = array (0 => $_POST['dep1'], 1 => $_POST['dep2'], 2 => $_POST['dep3'], 3 => $_POST['dep4'],  4 => $_POST['dep5'], 5 => $_POST['dep6'], 6 => $_POST['dep7'], 7 => $_POST['dep8']);
    
	$radio = array (0 => $_POST['3b11'], 1 => $_POST['3b12'], 2 => $_POST['3b13'], 3 => $_POST['3b14']);
    
	require_once("clases/resultados.class.php");
    
	$objwra = new resultados;
    
	resultados::respTresb($dep, $aire, $radio, $resp8);
    }
    /****************************************************************************/
    /*respuestas de la prueba 4A */
    if(isset($_POST['4a11']) OR isset($_POST['4a21']) OR isset($_POST['4a31']) OR isset($_POST['ball1'])){

	$pinito = array(0 => $_POST['4a11'], 1 => $_POST['4a12'], 2 => $_POST['4a13'], 3 => $_POST['4a14'], 4 => $_POST['4a15']);
    
	$viaje = array(0 => $_POST['4a21'], 1 => $_POST['4a22'], 2 => $_POST['4a23'], 3 => $_POST['4a24'], 4 => $_POST['4a25'], 5 => $_POST['4a26'], 6 => $_POST['4a27']);

	$ballena1 = array(0 => $_POST['4a31'], 1 => $_POST['4a32'], 2 => $_POST['4a33'], 3 => $_POST['4a34']);

	$ballena2 = array(0 => $_POST['ball1'], 1 => $_POST['ball2'], 2 => $_POST['ball3'], 3 => $_POST['ball4'], 4 => $_POST['ball5']);
	
	print_r ($ballena2);
	require_once("clases/resultados.class.php");
    
	$objwra = new resultados;
    
	resultados::respCuatroa($pinito, $viaje, $ballena1, $ballena2);
    }
    /****************************************************************************/
    /*respuestas de la prueba 4B */
    if(isset($_POST['4b11']) OR isset($_POST['4b21']) OR isset($_POST['4b31'])){

	$pinito = array(0 => $_POST['4b11'], 1 => $_POST['4b12'], 2 => $_POST['4b13'], 3 => $_POST['4b14'], 4 => $_POST['4b15']);
    
	$aprendiz = array(0 => $_POST['4b21'], 1 => $_POST['4b22'], 2 => $_POST['4b23'], 3 => $_POST['4b24'], 4 => $_POST['4b25'], 5 => $_POST['4b26'], 6 => $_POST['4b27'], 7 => $_POST['4b28']);

	$ballena1 = array(0 => $_POST['4b31'], 1 => $_POST['4b32'], 2 => $_POST['4b33'], 3 => $_POST['4b34']);

	$ballena2 = array(0 => $_POST['ball1'], 1 => $_POST['ball2'], 2 => $_POST['ball3'], 3 => $_POST['ball4'], 4 => $_POST['ball5']);
    
	require_once("clases/resultados.class.php");
    
	$objwra = new resultados;
    
	resultados::respCuatrob($pinito, $aprendiz, $ballena1, $ballena2);
      }
    
    }
}
