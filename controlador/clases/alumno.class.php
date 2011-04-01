<?php
class alumnoClass{
    
    public function filtro_listaCurso(){

	$filtro = $this->filtro_listaIdAlmn();

	if($filtro == '-1'){
	    /* Si no existe nada para filtrar 
	     * se devuelve el array completo
	     */
	return	$sinFiltrar = $this->lista_cursoSinfiltro();

	}else{
	    /* Filtrando 
	     * Busco la tabla completa*/
	    $sinFiltrar = $this->lista_cursoSinfiltro();

	    $lista = $this->lista_cursoSinfiltro();

	    /* Identifico el ID de la lista completa*/
	    while($a = $sinFiltrar->fetch()){ $arrayID[] = $a['0'];}

	    /*	se envian los dos arreglos para que sean
	     *	comparados y obtener los id de los alumnos que 
	     *	no se repiten    */	    
	    $array_diff = $this->array_diff($arrayID,$filtro);

	    /* Borro los datos correspondientes al arreglo GRYjit */

	    while($a = $lista->fetch()){ 
		
		/* Si el id ($a['0']) no se encuentra en el array
		 * $array_diff se elimina y rearma el arreglo
		 */
		if (!(in_array($a['0'],$array_diff))){
		    
		    unset($a['0']);
		    unset($a['1']);		    
		    unset($a['2']);
		    
		    $a = array_values($a);
		
		}else{
		
		$id[] = $a['0']; 
		$nombre[] = $a['1'] ;
		$apellido[] = $a['2'];
		
		}		
	    }

	    require_once('controlador/AlumnoControlador.php');    

	    $return = new AlumnoControlador();

	    //$return->listado_filtrado($id, $nombre, $apellido);
	    return	$sinFiltrar = $this->lista_cursoSinfiltro();

	}
    }

    public function filtro_listaIdAlmn(){

    require_once ('modelo/AlumnoModelo.php');

    $filtrar = new AlumnoModelo();

    $filtro = $filtrar->get_lista_filtro($_SESSION["wrares_ID_PRUEBA"]);

    while($b = $filtro->fetch()){ $arrayFiltro[] = $b['0'];}

    if(isset($arrayFiltro) && !empty($arrayFiltro)){
	 return $arrayFiltro;
	}
    return -1;

    }

    public function lista_cursoSinfiltro(){
	
	require_once ('modelo/AlumnoModelo.php');

	$listado_alumnos = new AlumnoModelo();

	$sinFiltrar = $listado_alumnos->listado_almn_prba( $_SESSION["wrares_ID_CURSO"]);

	return  $sinFiltrar;
    
    }

    public function array_diff($arr1,$arr2)
    { 
	$array_diff = array(); 
	foreach ($arr1 as $id1){ if (!(in_array($id1,$arr2))) $array_diff[]=$id1; } 
	return $array_diff; 
    }

}

?>
