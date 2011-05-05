<?php
class InformesControlador extends ControladorBase {
    public function librerias(){
	require_once ('modelo/InformesModelo.php');
	require_once ('clases/informes.class.php');
	require_once ('clases/graficar.class.php');
	require_once ('clases/variacion.class.php');

    }

    public function index(){ $this->view->show('login.php');}

    public function generarGraficos(){

	$this->librerias();

	if(!isset($_POST['id']) && empty($_POST['id']))header("Location: ?controlador=Index");

	$id_prueba = $_POST['id'];

	$_SESSION['id_prueba'] = $_POST['id'];

	$grafico = new InformesModelo(); 

	//COMPRUEBA SI EXISTEN DATOS
	$a = $grafico->val_datos($id_prueba);
	$b = $a->rowCount();
	
	if($b > '4'){

	$formato = $grafico->nivelFormato($id_prueba);

	$formatoNivel = new informes();

	$formatoNivel = $formatoNivel->NivelFormato($formato);

	$PrbA = new Variacion();

	$id_curso = $PrbA->id_curso($id_prueba); 

	$prba = $PrbA->idAnterior($id_prueba, $id_curso);
	
	if($formatoNivel == '1A')$data['graficos'] = $grafico->grafico_informe1A($id_prueba);
	if($formatoNivel == '1B')$data['graficos'] = $grafico->grafico_informe1B($id_prueba, $prba);
	if($formatoNivel == '2A')$data['graficos'] = $grafico->grafico_informe2A($id_prueba, $prba);
	if($formatoNivel == '2B')$data['graficos'] = $grafico->grafico_informe2B($id_prueba, $prba);
	if($formatoNivel == '3A')$data['graficos'] = $grafico->grafico_informe3A($id_prueba, $prba);
	if($formatoNivel == '3B')$data['graficos'] = $grafico->grafico_informe3B($id_prueba, $prba);
	if($formatoNivel == '4A')$data['graficos'] = $grafico->grafico_informe4A($id_prueba, $prba);
	if($formatoNivel == '4B')$data['graficos'] = $grafico->grafico_informe4B($id_prueba, $prba);

	$this->view->show('graficos' . $formatoNivel . '.php', $data);

	}else{ $this->view->show('faltaDatos.php');}

    }

    public function sucesoProf(){

	if(!isset($_POST['nomprof']) && empty($_POST['nomprof']))header("Location: ?controlador=Index");
	
	if ($_POST['nomprof'] == '-1')header ("Location: http://www.proyectonst.cl/nst/?controlador=Panel");
	
	$this->librerias();

	$a = new InformesModelo(); 

	$_SESSION['sucProfId'] = $_POST['nomprof'];

	$data['sucProf'] = $a->sucesoProf($_POST['nomprof']);

	$this->view->show('graficosSucesos.php', $data);
   }

    
    function graficoZ(){

	$this->librerias();

	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_z($id_prueba);

	$puntaje_z = new graficar();

	$puntaje_z->graficar_puntajeZ($datos);

		
    }

    function graficoP(){

	$this->librerias();

	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_p($id_prueba);

	$puntaje_p = new graficar();

	$puntaje_p->graficar_puntajeP($datos);
	
    }

    function graficoT(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_t($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->graficar_puntajeT($datos);
	
    }

    public function tabla_informes(){
    $this->librerias();
    
    $informes = new InformesModelo();

    $data['informes_tabla'] = $informes->tabla_informes($_SESSION['wraprof_ID_PROFESOR']);

    $this->view->show('tabla_informes.php', $data);
    
    }

    public function tabla_informesDir(){
    $this->librerias();
    
    $informes = new InformesModelo();

    $fecha = date('Y-m-d');

    $data['informes_tabla'] = $informes->tabla_informesDir($_SESSION['wradir_ID_DIR'], $fecha);

    $this->view->show('tabla_informes.php', $data);
    
    }

    /*
     * GRAFICOS DE TORTA !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
     */ 
    function grafico_1A10(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_1A10($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_1A10($datos);

    }
    function grafico_1A11(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_1A11($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_1A11($datos);
	
    }

    function grafico_1A12(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_1A12($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_1A12($datos);
	
    }

    function grafico_1A13(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_1A13($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_1A13($datos);
	
    }
    
    function grafico_1A14(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_1A14($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_1A14($datos);
	
    }

    function grafico_1A15(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_1A15($id_prueba);

	$puntaje_t = new graficar();
	
	$puntaje_t->grafico_1A15($datos);
	
    }

    function grafico_1A16(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_1A16($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_1A16($datos);
	
    }

    function grafico_1A17(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_1A17($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_1A17($datos);
	
    }

    function grafico_1A20(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_1A20($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_1A20($datos);
	
    }

    function grafico_1A21(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_1A21($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_1A21($datos);
	
    }

    function grafico_1A22(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_1A22($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_1A22($datos);
	
    }

    function grafico_1A23(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_1A23($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_1A23($datos);
	
    }

    function grafico_1A24(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_1A24($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_1A24($datos);
	
    }

   function grafico_1A25(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_1A25($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_1A25($datos);
	
    }

   function grafico_1A26(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_1A26($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_1A26($datos);
	
    }

   function grafico_1A27(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_1A27($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_1A27($datos);
	
}

   function grafico_1A30(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_1A30($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_1A30($datos);
	
}

   function grafico_1A31(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_1A31($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_1A31($datos);
	
}

   function grafico_1A32(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_1A32($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_1A32($datos);
	
}

   function grafico_1A33(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_1A33($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_1A33($datos);
	
}

   function grafico_1A34(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_1A34($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_1A34($datos);
	
}

   function grafico_1A35(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_1A35($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_1A35($datos);
	
}

   function grafico_1A36(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_1A36($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_1A36($datos);
	
}
   function grafico_1A37(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_1A37($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_1A37($datos);
	
}

   function grafico_1A40(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_1A40($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_1A40($datos);
	
}

   function grafico_1A41(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_1A41($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_1A41($datos);
	
}

   function grafico_1A42(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_1A42($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_1A42($datos);
	
}

   function grafico_1A43(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_1A43($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_1A43($datos);
	
}

   function grafico_1A44(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_1A44($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_1A44($datos);
	
}

   function grafico_1A45(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_1A45($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_1A45($datos);
	
}

   function grafico_1A46(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_1A46($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_1A46($datos);
	
}

   function grafico_1A47(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_1A47($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_1A47($datos);
	
}

    function grafico_1B10(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_1B10($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_1B10($datos);

   }
    function grafico_1B11(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_1B11($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_1B11($datos);
	
    }

    function grafico_1B12(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_1B12($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_1B12($datos);
	
    }

    function grafico_1B13(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_1B13($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_1B13($datos);
	
    }
    
    function grafico_1B14(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_1B14($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_1B14($datos);
	
    }

    function grafico_1B15(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_1B15($id_prueba);

	$puntaje_t = new graficar();
	
	$puntaje_t->grafico_1B15($datos);
	
    }

    function grafico_1B16(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_1B16($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_1B16($datos);
	
    }

    function grafico_1B17(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_1B17($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_1B17($datos);
	
    }

    function grafico_1B20(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_1B20($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_1B20($datos);

    }
    function grafico_1B21(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_1B21($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_1B21($datos);
	
    }

    function grafico_1B22(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_1B22($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_1B22($datos);
	
    }

    function grafico_1B23(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_1B23($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_1B23($datos);
	
    }
    
    function grafico_1B24(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_1B24($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_1B24($datos);
	
    }

    function grafico_1B25(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_1B25($id_prueba);

	$puntaje_t = new graficar();
	
	$puntaje_t->grafico_1B25($datos);
	
    }

    function grafico_1B26(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_1B26($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_1B26($datos);
	
    }

    function grafico_1B27(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_1B27($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_1B27($datos);
	
    }

    function grafico_1B30(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_1B30($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_1B30($datos);

    }
    function grafico_1B31(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_1B31($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_1B31($datos);
	
    }

    function grafico_1B32(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_1B32($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_1B32($datos);
	
    }

    function grafico_1B33(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_1B33($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_1B33($datos);
	
    }
    
    function grafico_1B34(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_1B34($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_1B34($datos);
	
    }

    function grafico_1B35(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_1B35($id_prueba);

	$puntaje_t = new graficar();
	
	$puntaje_t->grafico_1B35($datos);
	
    }

    function grafico_1B36(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_1B36($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_1B36($datos);
	
    }

    function grafico_1B40(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_1B40($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_1B40($datos);

    }
    function grafico_1B41(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_1B41($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_1B41($datos);
	
    }

    function grafico_1B42(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_1B42($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_1B42($datos);
	
    }

    function grafico_1B43(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_1B43($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_1B43($datos);
	
    }
    
    function grafico_1B44(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_1B44($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_1B44($datos);
	
    }

    function grafico_1B45(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_1B45($id_prueba);

	$puntaje_t = new graficar();
	
	$puntaje_t->grafico_1B45($datos);
	
    }

    function grafico_1B46(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_1B46($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_1B46($datos);
	
    }

    function graficoZ0(){

	$this->librerias();

	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$d1 = $grafico->grafico_z($id_prueba);

	$a = new Variacion();

	$id_curso = $a->id_curso($id_prueba);

	$pruebaA = $a->idAnterior($id_prueba, $id_curso);

	$d2 = $grafico->graficoZ0($pruebaA);

	$puntaje_z = new graficar();

	$puntaje_z->graficoZ0($d1, $d2);
		
    }


    function graficoT0(){
	// Grafico variación percentil
	$this->librerias();

	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$d1 = $grafico->grafico_t($id_prueba);

	$a = new Variacion();

	$id_curso = $a->id_curso($id_prueba);

	$pruebaA = $a->idAnterior($id_prueba, $id_curso);

	$d2 = $grafico->graficoT0($pruebaA);

	$puntaje_z = new graficar();

	$puntaje_z->graficoT0($d2, $d1);

		
    }


    function graficoP0(){
	// Grafico variación percentil
	$this->librerias();

	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$d1 = $grafico->grafico_p($id_prueba);

	$a = new Variacion();

	$id_curso = $a->id_curso($id_prueba);

	$pruebaA = $a->idAnterior($id_prueba, $id_curso);

	$d2 = $grafico->graficoP0($pruebaA);

	$puntaje_z = new graficar();

	$puntaje_z->graficoP0($d2, $d1);

		
    }


    function graficoPT0(){
	// Grafico variación percentil
	$this->librerias();

	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$d1 = $grafico->grafico_ptje($id_prueba);

	$a = new Variacion();

	$id_curso = $a->id_curso($id_prueba);

	$pruebaA = $a->idAnterior($id_prueba, $id_curso);

	$d2 = $grafico->graficoPT0($pruebaA);

	$puntaje_z = new graficar();

	$puntaje_z->graficoPT0($d2, $d1);

		
    }


    /************************************************************************
     *									    *
     *				=[REPORTE 2A]=				    *
     *									    *
     ************************************************************************
     ************************************************************************/ 

    function grafico_2A10(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_2A10($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_2A10($datos);

    }
    function grafico_2A11(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_2A11($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_2A11($datos);
	
    }

    function grafico_2A12(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_2A12($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_2A12($datos);
	
    }

    function grafico_2A13(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_2A13($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_2A13($datos);
	
    }
    
    function grafico_2A14(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_2A14($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_2A14($datos);
	
    }

    function grafico_2A15(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_2A15($id_prueba);

	$puntaje_t = new graficar();
	
	$puntaje_t->grafico_2A15($datos);
	
    }

    function grafico_2A16(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_2A16($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_2A16($datos);
	
    }

    function grafico_2A17(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_2A17($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_2A17($datos);
	
    }

    function grafico_2A20(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_2A20($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_2A20($datos);
	
    }

    function grafico_2A21(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_2A21($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_2A21($datos);
	
    }

    function grafico_2A22(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_2A22($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_2A22($datos);
	
    }

    function grafico_2A23(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_2A23($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_2A23($datos);
	
    }

    function grafico_2A24(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_2A24($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_2A24($datos);
	
    }

   function grafico_2A25(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_2A25($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_2A25($datos);
	
    }

   function grafico_2A26(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_2A26($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_2A26($datos);
	
   }
   function grafico_2A27(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_2A27($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_2A27($datos);
	
    }



   function grafico_2A30(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_2A30($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_2A30($datos);
	
}

   function grafico_2A31(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_2A31($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_2A31($datos);
	
}

   function grafico_2A32(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_2A32($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_2A32($datos);
	
}

   function grafico_2A33(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_2A33($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_2A33($datos);
	
}

   function grafico_2A34(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_2A34($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_2A34($datos);
	
}

   function grafico_2A35(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_2A35($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_2A35($datos);
	
}

   function grafico_2A36(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_2A36($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_2A36($datos);
	
}
   function grafico_2A37(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_2A37($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_2A37($datos);
	
}

   function grafico_2A40(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_2A40($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_2A40($datos);
	
}

   function grafico_2A41(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_2A41($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_2A41($datos);
	
}

   function grafico_2A42(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_2A42($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_2A42($datos);
	
}

   function grafico_2A43(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_2A43($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_2A43($datos);
	
}

   function grafico_2A44(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_2A44($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_2A44($datos);
	
}

   function grafico_2A45(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_2A45($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_2A45($datos);
	
}

   function grafico_2A46(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_2A46($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_2A46($datos);
	
}

   function grafico_2A47(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_2A47($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_2A47($datos);
	
    }

    function graficoZ1(){

	$this->librerias();

	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$d1 = $grafico->grafico_z($id_prueba);

	$a = new Variacion();

	$id_curso = $a->id_curso($id_prueba);

	$pruebaA = $a->idAnterior($id_prueba, $id_curso);

	$d2 = $grafico->graficoZ0($pruebaA);

	$puntaje_z = new graficar();

	$puntaje_z->graficoZ1($d1, $d2);
		
    }

    function graficoT1(){
	// Grafico variación percentil
	$this->librerias();

	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$d1 = $grafico->grafico_t($id_prueba);

	$a = new Variacion();

	$id_curso = $a->id_curso($id_prueba);

	$pruebaA = $a->idAnterior($id_prueba, $id_curso);

	$d2 = $grafico->graficoT0($pruebaA);

	$puntaje_z = new graficar();

	$puntaje_z->graficoT1($d1, $d2);

		
    }

    function graficoP1(){
	// Grafico variación percentil
	$this->librerias();

	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$d1 = $grafico->grafico_p($id_prueba);

	$a = new Variacion();

	$id_curso = $a->id_curso($id_prueba);

	$pruebaA = $a->idAnterior($id_prueba, $id_curso);

	$d2 = $grafico->graficoP0($pruebaA);

	$puntaje_z = new graficar();

	$puntaje_z->graficoP1($d2, $d1);

		
    }

    function graficoPT1(){
	// Grafico variación percentil
	$this->librerias();

	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$d1 = $grafico->grafico_ptje($id_prueba);

	$a = new Variacion();

	$id_curso = $a->id_curso($id_prueba);

	$pruebaA = $a->idAnterior($id_prueba, $id_curso);

	$d2 = $grafico->graficoPT0($pruebaA);

	$puntaje_z = new graficar();

	$puntaje_z->graficoPT1($d2, $d1);

		
    }


    /************************************************************************
     *									    *
     *				=[REPORTE 2B]=				    *
     *									    *
     ************************************************************************
     ************************************************************************/ 

    function grafico_2B10(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_2B10($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_2B10($datos);

    }
    function grafico_2B11(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_2B11($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_2B11($datos);
	
    }

    function grafico_2B12(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_2B12($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_2B12($datos);
	
    }

    function grafico_2B13(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_2B13($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_2B13($datos);
	
    }
    
    function grafico_2B14(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_2B14($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_2B14($datos);
	
    }

    function grafico_2B15(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_2B15($id_prueba);

	$puntaje_t = new graficar();
	
	$puntaje_t->grafico_2B15($datos);
	
    }

    function grafico_2B16(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_2B16($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_2B16($datos);
	
    }


    function grafico_2B20(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_2B20($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_2B20($datos);
	
    }

    function grafico_2B21(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_2B21($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_2B21($datos);
	
    }

    function grafico_2B22(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_2B22($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_2B22($datos);
	
    }

    function grafico_2B23(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_2B23($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_2B23($datos);
	
    }

    function grafico_2B24(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_2B24($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_2B24($datos);
	
    }

   function grafico_2B25(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_2B25($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_2B25($datos);
	
    }

   function grafico_2B26(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_2B26($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_2B26($datos);
	
   }
   function grafico_2B27(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_2B27($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_2B27($datos);
	
    }



   function grafico_2B30(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_2B30($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_2B30($datos);
	
}

   function grafico_2B31(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_2B31($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_2B31($datos);
	
}

   function grafico_2B32(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_2B32($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_2B32($datos);
	
}

   function grafico_2B33(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_2B33($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_2B33($datos);
	
}

   function grafico_2B34(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_2B34($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_2B34($datos);
	
}

   function grafico_2B35(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_2B35($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_2B35($datos);
	
}

   function grafico_2B36(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_2B36($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_2B36($datos);
	
}
   function grafico_2B37(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_2B37($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_2B37($datos);
	
}

   function grafico_2B40(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_2B40($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_2B40($datos);
	
}

   function grafico_2B41(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_2B41($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_2B41($datos);
	
}

   function grafico_2B42(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_2B42($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_2B42($datos);
	
}

   function grafico_2B43(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_2B43($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_2B43($datos);
	
}

   function grafico_2B44(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_2B44($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_2B44($datos);
	
}

   function grafico_2B45(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_2B45($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_2B45($datos);
	
}

   function grafico_2B46(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_2B46($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_2B46($datos);
	
}

   function grafico_2B47(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_2B47($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_2B47($datos);
	
    }
   
   function graficoZ2(){

	$this->librerias();

	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$d1 = $grafico->grafico_z($id_prueba);

	$a = new Variacion();

	$id_curso = $a->id_curso($id_prueba);

	$pruebaA = $a->idAnterior($id_prueba, $id_curso);

	$d2 = $grafico->graficoZ0($pruebaA);

	$puntaje_z = new graficar();

	$puntaje_z->graficoZ2($d1, $d2);
		
    }

    function graficoT2(){
	// Grafico variación percentil
	$this->librerias();

	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$d1 = $grafico->grafico_t($id_prueba);

	$a = new Variacion();

	$id_curso = $a->id_curso($id_prueba);

	$pruebaA = $a->idAnterior($id_prueba, $id_curso);

	$d2 = $grafico->graficoT0($pruebaA);

	$puntaje_z = new graficar();

	$puntaje_z->graficoT2($d1, $d2);

		
    }

    function graficoP2(){
	// Grafico variación percentil
	$this->librerias();

	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$d1 = $grafico->grafico_p($id_prueba);

	$a = new Variacion();

	$id_curso = $a->id_curso($id_prueba);

	$pruebaA = $a->idAnterior($id_prueba, $id_curso);

	$d2 = $grafico->graficoP0($pruebaA);

	$puntaje_z = new graficar();

	$puntaje_z->graficoP2($d2, $d1);

		
    }

    function graficoPT2(){
	// Grafico variación percentil
	$this->librerias();

	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$d1 = $grafico->grafico_ptje($id_prueba);

	$a = new Variacion();

	$id_curso = $a->id_curso($id_prueba);

	$pruebaA = $a->idAnterior($id_prueba, $id_curso);

	$d2 = $grafico->graficoPT0($pruebaA);

	$puntaje_z = new graficar();

	$puntaje_z->graficoPT2($d2, $d1);

		
    }


    /************************************************************************
     *									    *
     *				=[REPORTE 3A]=				    *
     *									    *
     ************************************************************************
     ************************************************************************/ 

    function grafico_3A10(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_3A10($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_3A10($datos);

    }
    function grafico_3A11(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_3A11($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_3A11($datos);
	
    }

    function grafico_3A12(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_3A12($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_3A12($datos);
	
    }

    function grafico_3A13(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_3A13($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_3A13($datos);
	
    }
    
    function grafico_3A14(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_3A14($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_3A14($datos);
	
    }

    function grafico_3A15(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_3A15($id_prueba);

	$puntaje_t = new graficar();
	
	$puntaje_t->grafico_3A15($datos);
	
    }

    function grafico_3A16(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_3A16($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_3A16($datos);
	
    }


    function grafico_3A20(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_3A20($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_3A20($datos);
	
    }

    function grafico_3A21(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_3A21($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_3A21($datos);
	
    }

    function grafico_3A22(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_3A22($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_3A22($datos);
	
    }

    function grafico_3A23(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_3A23($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_3A23($datos);
	
    }

    function grafico_3A24(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_3A24($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_3A24($datos);
	
    }

   function grafico_3A25(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_3A25($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_3A25($datos);
	
    }

   function grafico_3A30(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_3A30($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_3A30($datos);
	
}

   function grafico_3A31(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_3A31($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_3A31($datos);
	
}

   function grafico_3A32(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_3A32($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_3A32($datos);
	
}

   function grafico_3A33(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_3A33($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_3A33($datos);
	
}

   function grafico_3A40(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_3A40($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_3A40($datos);
	
}

   function grafico_3A41(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_3A41($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_3A41($datos);
	
}

   function grafico_3A42(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_3A42($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_3A42($datos);
	
}

   function grafico_3A43(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_3A43($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_3A43($datos);
	
}

   function grafico_3A44(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_3A44($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_3A44($datos);
	
}

   function grafico_3A45(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_3A45($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_3A45($datos);
	
}

   function grafico_3A46(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_3A46($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_3A46($datos);
	
   }

   function grafico_3A47(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_3A47($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_3A47($datos);
	
}



   
   function graficoZ3(){

	$this->librerias();

	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$d1 = $grafico->grafico_z($id_prueba);

	$a = new Variacion();

	$id_curso = $a->id_curso($id_prueba);

	$pruebaA = $a->idAnterior($id_prueba, $id_curso);

	$d2 = $grafico->graficoZ0($pruebaA);

	$puntaje_z = new graficar();

	$puntaje_z->graficoZ3($d1, $d2);
		
    }

    function graficoT3(){
	// Grafico variación percentil
	$this->librerias();

	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$d1 = $grafico->grafico_t($id_prueba);

	$a = new Variacion();

	$id_curso = $a->id_curso($id_prueba);

	$pruebaA = $a->idAnterior($id_prueba, $id_curso);

	$d2 = $grafico->graficoT0($pruebaA);

	$puntaje_z = new graficar();

	$puntaje_z->graficoT3($d1, $d2);

		
    }

    function graficoP3(){
	// Grafico variación percentil
	$this->librerias();

	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$d1 = $grafico->grafico_p($id_prueba);

	$a = new Variacion();

	$id_curso = $a->id_curso($id_prueba);

	$pruebaA = $a->idAnterior($id_prueba, $id_curso);

	$d2 = $grafico->graficoP0($pruebaA);

	$puntaje_z = new graficar();

	$puntaje_z->graficoP3($d2, $d1);
		
    }

    function graficoPT3(){
	// Grafico variación percentil
	$this->librerias();

	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$d1 = $grafico->grafico_ptje($id_prueba);

	$a = new Variacion();

	$id_curso = $a->id_curso($id_prueba);

	$pruebaA = $a->idAnterior($id_prueba, $id_curso);

	$d2 = $grafico->graficoPT0($pruebaA);

	$puntaje_z = new graficar();

	$puntaje_z->graficoPT3($d2, $d1);
    }

   /************************************************************************
     *									    *
     *				=[REPORTE 3B]=				    *
     *									    *
     ************************************************************************
     ************************************************************************/ 

    function grafico_3B10(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_3B10($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_3B10($datos);

    }
    function grafico_3B11(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_3B11($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_3B11($datos);
	
    }

    function grafico_3B12(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_3B12($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_3B12($datos);
	
    }

    function grafico_3B13(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_3B13($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_3B13($datos);
	
    }
    
    function grafico_3B14(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_3B14($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_3B14($datos);
	
    }

    function grafico_3B15(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_3B15($id_prueba);

	$puntaje_t = new graficar();
	
	$puntaje_t->grafico_3B15($datos);
	
    }

    function grafico_3B16(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_3B16($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_3B16($datos);
	
    }

    function grafico_3B17(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_3B16($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_3B17($datos);
	
    }



    function grafico_3B20(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_3B20($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_3B20($datos);
	
    }

    function grafico_3B21(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_3B21($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_3B21($datos);
	
    }

    function grafico_3B22(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_3B22($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_3B22($datos);
	
    }

    function grafico_3B23(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_3B23($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_3B23($datos);
	
    }

    function grafico_3B24(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_3B24($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_3B24($datos);
	
    }


   function grafico_3B30(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_3B30($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_3B30($datos);
	
}

   function grafico_3B31(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_3B31($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_3B31($datos);
	
}

   function grafico_3B32(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_3B32($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_3B32($datos);
	
}

   function grafico_3B33(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_3B33($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_3B33($datos);
	
}

   function grafico_3B40(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_3B40($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_3B40($datos);
	
}

   function grafico_3B41(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_3B41($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_3B41($datos);
	
}

   function grafico_3B42(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_3B42($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_3B42($datos);
	
}

   function grafico_3B43(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_3B43($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_3B43($datos);
	
}

   function grafico_3B44(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_3B44($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_3B44($datos);
	
}

   function grafico_3B45(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_3B45($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_3B45($datos);
	
}

   function grafico_3B46(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_3B46($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_3B46($datos);
	
   }

   function grafico_3B47(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_3B47($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_3B47($datos);
	
}

       
   function graficoZ4(){

	$this->librerias();

	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$d1 = $grafico->grafico_z($id_prueba);

	$a = new Variacion();

	$id_curso = $a->id_curso($id_prueba);

	$pruebaA = $a->idAnterior($id_prueba, $id_curso);

	$d2 = $grafico->graficoZ0($pruebaA);

	$puntaje_z = new graficar();

	$puntaje_z->graficoZ4($d1, $d2);
		
    }

    function graficoT4(){
	// Grafico variación percentil
	$this->librerias();

	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$d1 = $grafico->grafico_t($id_prueba);

	$a = new Variacion();

	$id_curso = $a->id_curso($id_prueba);

	$pruebaA = $a->idAnterior($id_prueba, $id_curso);

	$d2 = $grafico->graficoT0($pruebaA);

	$puntaje_z = new graficar();

	$puntaje_z->graficoT4($d1, $d2);

		
    }

    function graficoP4(){
	// Grafico variación percentil
	$this->librerias();

	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$d1 = $grafico->grafico_p($id_prueba);

	$a = new Variacion();

	$id_curso = $a->id_curso($id_prueba);

	$pruebaA = $a->idAnterior($id_prueba, $id_curso);

	$d2 = $grafico->graficoP0($pruebaA);

	$puntaje_z = new graficar();

	$puntaje_z->graficoP4($d2, $d1);
		
    }

    function graficoPT4(){
	// Grafico variación percentil
	$this->librerias();

	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$d1 = $grafico->grafico_ptje($id_prueba);

	$a = new Variacion();

	$id_curso = $a->id_curso($id_prueba);

	$pruebaA = $a->idAnterior($id_prueba, $id_curso);

	$d2 = $grafico->graficoPT0($pruebaA);

	$puntaje_z = new graficar();

	$puntaje_z->graficoPT4($d2, $d1);
    }
 
    /************************************************************************
     *									    *
     *				=[REPORTE 4A]=				    *
     *									    *
     ************************************************************************
     ************************************************************************/ 

    function grafico_4A10(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_4A10($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_4A10($datos);

    }
    function grafico_4A11(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_4A11($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_4A11($datos);
	
    }

    function grafico_4A12(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_4A12($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_4A12($datos);
	
    }

    function grafico_4A13(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_4A13($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_4A13($datos);
	
    }
    
    function grafico_4A14(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_4A14($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_4A14($datos);
	
    }



    function grafico_4A20(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_4A20($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_4A20($datos);
	
    }

    function grafico_4A21(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_4A21($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_4A21($datos);
	
    }

    function grafico_4A22(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_4A22($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_4A22($datos);
	
    }

    function grafico_4A23(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_4A23($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_4A23($datos);
	
    }

    function grafico_4A24(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_4A24($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_4A24($datos);
	
    }

    function grafico_4A25(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_4A25($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_4A25($datos);
	
    }


    function grafico_4A26(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_4A26($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_4A26($datos);
	
    }



   function grafico_4A30(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_4A30($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_4A30($datos);
	
}

   function grafico_4A31(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_4A31($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_4A31($datos);
	
}

   function grafico_4A32(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_4A32($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_4A32($datos);
	
}

   function grafico_4A33(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_4A33($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_4A33($datos);
	
}

   function grafico_4A40(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_4A40($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_4A40($datos);
	
}

   function grafico_4A41(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_4A41($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_4A41($datos);
	
}

   function grafico_4A42(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_4A42($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_4A42($datos);
	
}

   function grafico_4A43(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_4A43($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_4A43($datos);
	
}

   function grafico_4A44(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_4A44($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_4A44($datos);
	
}


       
   function graficoZ5(){

	$this->librerias();

	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$d1 = $grafico->grafico_z($id_prueba);

	$a = new Variacion();

	$id_curso = $a->id_curso($id_prueba);

	$pruebaA = $a->idAnterior($id_prueba, $id_curso);

	$d2 = $grafico->graficoZ0($pruebaA);

	$puntaje_z = new graficar();

	$puntaje_z->graficoZ5($d1, $d2);
		
    }

    function graficoT5(){
	// Grafico variación percentil
	$this->librerias();

	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$d1 = $grafico->grafico_t($id_prueba);

	$a = new Variacion();

	$id_curso = $a->id_curso($id_prueba);

	$pruebaA = $a->idAnterior($id_prueba, $id_curso);

	$d2 = $grafico->graficoT0($pruebaA);

	$puntaje_z = new graficar();

	$puntaje_z->graficoT5($d1, $d2);
	
    }

    function graficoP5(){
	// Grafico variación percentil
	$this->librerias();

	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$d1 = $grafico->grafico_p($id_prueba);

	$a = new Variacion();

	$id_curso = $a->id_curso($id_prueba);

	$pruebaA = $a->idAnterior($id_prueba, $id_curso);

	$d2 = $grafico->graficoP0($pruebaA);

	$puntaje_z = new graficar();

	$puntaje_z->graficoP5($d2, $d1);
		
    }

    function graficoPT5(){
	// Grafico variación percentil
	$this->librerias();

	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$d1 = $grafico->grafico_ptje($id_prueba);

	$a = new Variacion();

	$id_curso = $a->id_curso($id_prueba);

	$pruebaA = $a->idAnterior($id_prueba, $id_curso);

	$d2 = $grafico->graficoPT0($pruebaA);

	$puntaje_z = new graficar();

	$puntaje_z->graficoPT5($d2, $d1);
    }

    /************************************************************************
     *									    *
     *				=[REPORTE 4B]=				    *
     *									    *
     ************************************************************************
     ************************************************************************/ 

    function grafico_4B10(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_4B10($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_4B10($datos);

    }
    function grafico_4B11(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_4B11($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_4B11($datos);
	
    }

    function grafico_4B12(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_4B12($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_4B12($datos);
	
    }

    function grafico_4B13(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_4B13($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_4B13($datos);
	
    }
    
    function grafico_4B14(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_4B14($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_4B14($datos);
	
    }



    function grafico_4B20(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_4B20($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_4B20($datos);
	
    }

    function grafico_4B21(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_4B21($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_4B21($datos);
	
    }

    function grafico_4B22(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_4B22($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_4B22($datos);
	
    }

    function grafico_4B23(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_4B23($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_4B23($datos);
	
    }

    function grafico_4B24(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_4B24($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_4B24($datos);
	
    }

    function grafico_4B25(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_4B25($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_4B25($datos);
	
    }


    function grafico_4B26(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_4B26($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_4B26($datos);
    }

    function grafico_4B27(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_4B27($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_4B27($datos);
    }



   function grafico_4B30(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_4B30($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_4B30($datos);
	
}

   function grafico_4B31(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_4B31($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_4B31($datos);
	
}

   function grafico_4B32(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_4B32($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_4B32($datos);
	
}

   function grafico_4B33(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_4B33($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_4B33($datos);
	
}

   function grafico_4B40(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_4B40($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_4B40($datos);
	
}

   function grafico_4B41(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_4B41($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_4B41($datos);
	
}

   function grafico_4B42(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_4B42($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_4B42($datos);
	
}

   function grafico_4B43(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_4B43($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_4B43($datos);
	
}

   function grafico_4B44(){

	$this->librerias();
	
	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$datos = $grafico->grafico_4B44($id_prueba);

	$puntaje_t = new graficar();

	$puntaje_t->grafico_4B44($datos);
	
}


       
   function graficoZ6(){

	$this->librerias();

	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$d1 = $grafico->grafico_z($id_prueba);

	$a = new Variacion();

	$id_curso = $a->id_curso($id_prueba);

	$pruebaA = $a->idAnterior($id_prueba, $id_curso);

	$d2 = $grafico->graficoZ0($pruebaA);

	$puntaje_z = new graficar();

	$puntaje_z->graficoZ6($d1, $d2);
		
    }

    function graficoT6(){
	// Grafico variación percentil
	$this->librerias();

	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$d1 = $grafico->grafico_t($id_prueba);

	$a = new Variacion();

	$id_curso = $a->id_curso($id_prueba);

	$pruebaA = $a->idAnterior($id_prueba, $id_curso);

	$d2 = $grafico->graficoT0($pruebaA);

	$puntaje_z = new graficar();

	$puntaje_z->graficoT6($d1, $d2);
	
    }

    function graficoP6(){
	// Grafico variación percentil
	$this->librerias();

	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$d1 = $grafico->grafico_p($id_prueba);

	$a = new Variacion();

	$id_curso = $a->id_curso($id_prueba);

	$pruebaA = $a->idAnterior($id_prueba, $id_curso);

	$d2 = $grafico->graficoP0($pruebaA);

	$puntaje_z = new graficar();

	$puntaje_z->graficoP6($d2, $d1);
		
    }

    function graficoPT6(){
	// Grafico variación percentil
	$this->librerias();

	$grafico = new InformesModelo();

	$id_prueba = $_SESSION['id_prueba'];
	
	$d1 = $grafico->grafico_ptje($id_prueba);

	$a = new Variacion();

	$id_curso = $a->id_curso($id_prueba);

	$pruebaA = $a->idAnterior($id_prueba, $id_curso);

	$d2 = $grafico->graficoPT0($pruebaA);

	$puntaje_z = new graficar();

	$puntaje_z->graficoPT6($d2, $d1);
    }

    public function exportar(){
       require ('clases/pdf/fpdf.php');
	
	$pdf=new FPDF();
	$pdf->AddPage();
	$pdf->SetFont('Arial','B',16);
	$pdf->Cell(40,10,'Este es un ejemplo de creación de un documento PDF con PHP');
	$pdf->Output();    
       
    }

    public function sucesos_Prof(){ 
	$this->librerias();

	$a = new InformesModelo();

	$data['sucesos'] = $a->ident_prof($_SESSION['wradir_id_dir'], $_SESSION['wradir_rbd'] );

	$this->view->show('sucesosProf.php', $data);
    }  
    
    public function sucesoFgrnal(){ 
    	$this->librerias();

	$grafico = new InformesModelo();

	$a = $grafico->sucesoFgrnal($_SESSION['sucProfId']);

	$suc = new graficar();

	$suc->sucesoFgrnal($a);

    
    }


}
