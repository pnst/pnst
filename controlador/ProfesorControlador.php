<?php
class profesorControlador extends ControladorBase
{
	public function index(){ $this->view->show("director.php");}

   function librerias(){
        require_once ('modelo/profesorModelo.php');
        require_once ('modelo/PruebaModelo.php');
        require_once('modelo/LogModelo.php');

    }


    public function registro_prof(){ 
    /* Muestra los cursos del colegio que participan 
     * en el proyecto NST */
	require_once 'modelo/profesorModelo.php';

	$dir = new profesorModelo();

	$data['curso_director'] = $dir->get_curso_dir($_SESSION['wradir_rbd']);
	
	$this->view->show("registro_profesor.php", $data);
    }	

    public function listado_prof(){
    /* Esta funciÃ³n muestra en el cuadro de registro de 
    * profesor los profesores que estÃ¡n trabajando en un
    * mismo colegio de forma dinÃ¡mica
    */
    require_once 'modelo/profesorModelo.php';

    $profesores = new profesorModelo();
	    
    $data['listado_profesor'] = $profesores->get_prof_director($_SESSION['wradir_rbd']);	
    		    
    $this->view->show("listado_profesor.php", $data);
    }

    public function insertar(){
	if(isset($_POST['apellido_prof']) && !empty($_POST['apellido_prof']) && isset($_POST['nombre_prof']) && !empty($_POST['nombre_prof']) && isset($_POST['email_prof']) && !empty($_POST['email_prof']) && isset($_POST['id_curso']) && !empty($_POST['id_curso'])){

	    if(!checkLen($_POST['email_prof'])) die('-2'); 
	    if(!checkEmail($_POST['email_prof'])) die('-3');

		require_once 'modelo/profesorModelo.php';

		$inserta_profesor = new profesorModelo();

		$inserta_profesor->inserta_profesor($_POST['apellido_prof'], $_POST['nombre_prof'], $_POST['email_prof'], $_SESSION['wradir_rbd']);

		// Lo que se busca es traer el id del profesor recien
		// ingresado mediante su email.
		$actualiza_curso = new profesorModelo();
		
		$actualiza_curso->id_profesor($_POST['email_prof']);

		while($id_act_prof = $actualiza_curso->fetch()){
			
			$id_act_prof = $id_act_prof['id_profesor'];
		}
		
		// Se actualiza el id_profesor de la tabla CURSO,
		// segun el curso que le asigna el director
		$actualiza_curso->actualiza_curso($id_act_prof, $_POST['id_curso']);

		echo 1;

		$this->view->show("listado_profesor.php", $data);
	
	    }else{ echo '-1';}
    }

    public function listado_profesor(){
	if(isset($_POST['id_curso']) && !empty($_POST['id_curso'])){
	    
	    require_once 'modelo/profesorModelo.php';

	    $prof_curso = new profesorModelo();

	    // get_lista_profesor = busca al profesor que tiene el curso 
	    // indicado por el alumno.
	    $data['listado_profesor'] = $prof_curso->get_lista_profesor($_POST['id_curso']);

	    $this->view->show("listado_profesor.php", $data);

    }
    }
    
    public function eliminar (){

	require_once 'modelo/profesorModelo.php';

	$eliminar_profesor = new profesorModelo();

	$eliminar_profesor->eliminar_profesor($_POST['id_profesor']);
    }

 public function jeip_prof(){
	if(isset($_POST['value']) && !empty($_POST['value'])){

	    list($campo, $id_prba) = explode("?", $_POST['id']);
	    $formato = strtoupper($_POST['value']);

	    if ($campo == 'no'){
		if(eregi("^[A-ZÃ±Ã¡Ã©Ã­Ã³ÃºÃ¼Ã‘Ã�Ã‰Ã�Ã“ÃšÃœ ]{3,25}$",$formato)){
			echo $formato;
			$this->set_act_prba($id_prba, $campo, $formato);	
		}else{echo "SÃ³lo letras de mÃ­n 3 y mÃ¡x 25";}}

	    if ($campo == 'ap'){
		if(eregi("^[A-ZÃ±Ã¡Ã©Ã­Ã³ÃºÃ¼Ã‘Ã�Ã‰Ã�Ã“ÃšÃœ ]{3,25}$",$formato)){
			echo $formato;
			$this->set_act_prba($id_prba, $campo, $formato);	
		}else{echo "SÃ³lo letras de mÃ­n 3 y mÃ¡x 25";}}

	    if ($campo == 'em'){
		if(checkEmail($_POST['value'])){
			$formato = $_POST['value'];
			echo $formato;
			$this->set_act_prba($id_prba, $campo, $formato);	
		}else{echo "El email no es vÃ¡lido";}}


	}
    }

    function set_act_prba($id_prba, $campo, $value){
	//entrego valor de $campo
	if ($campo == 'no'){ $campo = 'nombre_prof';}
	if ($campo == 'ap'){ $campo = 'apellido_prof';}
	if ($campo == 'em'){ $campo = 'email_prof';}	

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

	    $c = $a->setReporteDir($_SESSION['wraprof_id_profesor'], $_SESSION['rbd_PROF'],'EditAlumno', $fecha,$hora,$message);

    }

    public function actualizaPerfil (){

	require_once 'modelo/profesorModelo.php';

	$eliminar_profesor = new profesorModelo();

	$data['perfil'] = $eliminar_profesor->perfil_prof($_SESSION['wraprof_id_profesor']);

	$this->view->show('perfilProf.php', $data);
    }

    public function setPerfil(){
	if(isset($_POST['nombre'])|| !empty($_POST['nombre']) || isset($_POST['apellido'])|| !empty($_POST['apellido']) || isset($_POST['email'])|| !empty($_POST['email'])){
	
	require_once 'modelo/profesorModelo.php';

	$eliminar_profesor = new profesorModelo();
	
	$formato = strtoupper($_POST['nombre']);

	if(eregi("^[A-ZÃ±Ã¡Ã©Ã­Ã³ÃºÃ¼Ã‘Ã�Ã‰Ã�Ã“ÃšÃœ]{3,25}$",$formato)){
	    $eliminar_profesor->update_nom($_SESSION['wraprof_id_profesor'],$formato);
	}
	$formato = strtoupper($_POST['apellido']);

	if(eregi("^[A-ZÃ±Ã¡Ã©Ã­Ã³ÃºÃ¼Ã‘Ã�Ã‰Ã�Ã“ÃšÃœ]{3,25}$",$formato)){
	    $eliminar_profesor->update_ape($_SESSION['wraprof_id_profesor'],$formato);
	}

	if(checkEmail($_POST['email'])){
	require_once ('NstControlador.php');
	$a = new NstControlador();
	$b = $a->dispEmail($_POST['email']); 
	if($b == 'true'){ 
		$eliminar_profesor->update_email($_SESSION['wraprof_id_profesor'],$_POST['email']);}
		echo 1;
	if($b == 'false') echo 0;
		}

	 return 1;    
	
	}

    }
    
    public function setDir(){
	if(isset($_POST['nombre'])|| !empty($_POST['nombre']) || isset($_POST['apellido'])|| !empty($_POST['apellido']) || isset($_POST['email'])|| !empty($_POST['email'])){
	
	require_once 'modelo/profesorModelo.php';

	$eliminar_profesor = new profesorModelo();
	
	$formato = strtoupper($_POST['nombre']);

	if(eregi("^[A-ZÃ±Ã¡Ã©Ã­Ã³ÃºÃ¼Ã‘Ã�Ã‰Ã�Ã“ÃšÃœ]{3,25}$",$formato)){
	    $eliminar_profesor->update_dirnom($_SESSION['wradir_id_dir'],$formato);
	}
	$formato = strtoupper($_POST['apellido']);

	if(eregi("^[A-ZÃ±Ã¡Ã©Ã­Ã³ÃºÃ¼Ã‘Ã�Ã‰Ã�Ã“ÃšÃœ]{3,25}$",$formato)){
	    $eliminar_profesor->update_dirape($_SESSION['wradir_id_dir'],$formato);
	}

	if(checkEmail($_POST['email'])){
	$eliminar_profesor->update_diremail($_SESSION['wradir_id_dir'],$_POST['email']);}

	 return;    
	
	}

    }

  public function actualizaDir (){

	require_once 'modelo/profesorModelo.php';

	$eliminar_profesor = new profesorModelo();

	$data['perfil'] = $eliminar_profesor->perfil_dir($_SESSION['wradir_id_dir']);

	$this->view->show('perfilDir.php', $data);
    }
    public function exp_prueba(){

        $this->librerias();

        $exp_prueba = new profesorModelo();

        $fecha = date('Y-m-d');

        $data['excepcion'] = $exp_prueba->exp_prueba($_SESSION['wraprof_id_profesor'], $fecha);

        $this->view->show('exp_prueba.php', $data);

    }

  public function excepcion(){
  	
  	 if(isset($_GET['excepcionesPrba']) || !empty($_GET['excepcionesPrba']) || isset($_GET['excepcionesCurso']) || !empty($_GET['excepcionesCurso'])){
            $this->librerias();

            $exp = new profesorModelo();

            if($_GET['excepcionesPrba'] == '1'){

                $data['rindieronPrba'] = $exp->rindieronPrba($_GET['excepcionesCurso']);

                $this->view->show('visorRinde.php', $data);
            }

            if($_GET['excepcionesPrba'] == '2'){

                $data['rindieronPrba'] = $exp->rindieronPrba($_GET['excepcionesCurso']);

                $this->view->show('visorNOPresenta.php',$data);
            }
        }
    }

    public function resetPrba(){

    if(isset($_POST['id_alumno']) || !empty($_POST['id_alumno']) ){
        $this->librerias();

        $exp = new profesorModelo();

        $exp->resetRinde($_POST['id_alumno']);

        $exp->resetTermino($_POST['id_alumno']);

        echo 1;
    }
    }



}
