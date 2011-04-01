<?php
class especifPrba {

    function info_alumno($id_alumno){
	$_SESSION["wrares_ID_ALUMNO"] =	$id_alumno;
	
	require_once 'modelo/PruebaModelo.php';

	$get_info_alumno = new PruebaModelo();

	$get_info = $get_info_alumno->info_Alumno($id_alumno);

	while($nom_alumn = $get_info->fetch()){
	    $_SESSION["wrares_NOMBRE_ALUMNO"]	=	$nom_alumn['NOMBRE1_ALUMN'] ;
	    $_SESSION["wrares_APELLIDO_ALUMNO"]	=	$nom_alumn['APELLIDO1_ALUMN'] ; 
	}
	
	//Paso el valor de nivel y formato
    	$nivel = $_SESSION["wrares_NIVEL_CURSO"];
	$formato = $_SESSION["wrares_FORMATO_PRBA"];
	
	//$dir_prba indica el lugar de la prueba
	$dir_prba = "/prbanst/clp_prueba/".$nivel.$formato.".php";
	
	return $dir_prba;	    
    }
}
