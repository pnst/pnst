<?php
class nstClass {
	
    function wra_profesor($consulta, $password_profesor){
	while($profesor = $consulta->fetch()){
	    $_SESSION['wraprof_EMAIL_PROF']		= $profesor['EMAIL_PROF'];
	    $_SESSION['wraprof_PASSW_PROF']		= $profesor['PASSW_PROF'];
	    $_SESSION['wraprof_ID_PROFESOR']		= $profesor['ID_PROFESOR'];
	    $_SESSION['wraprof_NOMBRE_COLEGIO']		= $profesor['NOMBRE_COLEGIO'];
	    $_SESSION['wraprof_NOMBRE_PROF']		= $profesor['NOMBRE_PROF'];
	    $_SESSION['wraprof_APELLIDO_PROF']		= $profesor['APELLIDO_PROF'];
	    $_SESSION['nst_SESION']			= $profesor['ID_PROFESOR'];
	    $_SESSION['configuracion']			= "profesor";
	    $logueado					= $profesor['LOGUEADO'] ;
	    $_SESSION['RBD_PROF']			= $profesor['RBD'] ;


	}
	/* Si está logueado mostrar mensaje*/
	if($logueado == 'si')return -5;
    	    if ($password_profesor == $_SESSION['wraprof_PASSW_PROF']){
	    /* ingresa */
	    return 1;
	}else{
	    /*password no coincide*/ 
	    return -2;
	}
    }//fin function wea_profesor
	
    function wra_director($consulta, $password_director){
	while($director= $consulta->fetch()){
	    $_SESSION['wradir_ID_DIR'] 			= $director['ID_DIR'];
	    $_SESSION['nst_SESION']			= $director['ID_DIR'];
	    $_SESSION['wradir_NOMBRE_DIR'] 		= $director['NOMBRE_DIR'];
	    $_SESSION['wradir_APELLIDO_DIR']		= $director['APELLIDO_DIR'];
	    $_SESSION['wradir_EMAIL_DIR'] 		= $director['EMAIL_DIR'];
	    $_SESSION['wradir_PASSW_DIR'] 		= $director['PASSW_DIR'];
	    $_SESSION['wradir_RBD'] 			= $director['RBD'];
	    $_SESSION['wradir_NOMBRE_COLEGIO']		= $director['NOMBRE_COLEGIO'];
	    $_SESSION['configuracion']			= "director";
	    $logueado					= $director['LOGUEADO'] ;
	}
	/* Si está logueado mostrar mensaje*/
	if($logueado == 'si')return -5;

	if ($password_director == $_SESSION['wradir_PASSW_DIR']){
	    /* ingresa */
	    return 1;
	}else{
	    /*password no coincide*/ 
	    return -2;}
	    //fin function wra_profesor
    }
    /* Login de prueba alumno*/
    function wra_login_prba($passw_prba,$passw_alumn){

	while($passw_sis = $passw_prba->fetch()){ $passw_nst = $passw_sis['CODIGO_PRBA'];}
	
	/*La contraseña corresponde*/
	if($passw_nst == $passw_alumn){
	
	require_once 'modelo/PruebaModelo.php';
    
	$get_info_prba = new PruebaModelo();
    
	$get_info = $get_info_prba->get_info_prba($_SESSION['id_prba']);

	while($wra_resp = $get_info->fetch()){
	    $_SESSION["wrares_ID_PRUEBA"] 		= $wra_resp['ID_PRUEBA'];
	    $_SESSION["wrares_ID_CURSO"] 		= $wra_resp['ID_CURSO'];
	    $_SESSION["wrares_FORMATO_PRBA"]		= $wra_resp['FORMATO_PRBA'];
	    $_SESSION["wrares_CODIGO_PRBA"]		= $wra_resp['CODIGO_PRBA'];
	    $_SESSION["wrares_NIVEL_CURSO"]		= $wra_resp['NIVEL_CURSO'];
	    $_SESSION["wrares_LETRA_CURSO"]		= $wra_resp['LETRA_CURSO'];
	    $_SESSION["wrares_NOMBRE_COLEGIO"]		= $wra_resp['NOMBRE_COLEGIO'];
	    $_SESSION["wrares_ASIGNATURA"]		= $wra_resp['ASIGNATURA'];
	    $_SESSION["wrares_NOMBRE_PROF"]		= $wra_resp['NOMBRE_PROF'];
	    $_SESSION["wrares_APELLIDO_PROF"]		= $wra_resp['APELLIDO_PROF'];
	    //	$_SESSION["wrares_ID_PROFESOR"] 	= $wra_resp['ID_PROFESOR'];
	} 

	echo "1";return;
	}else{ echo "0"; return;}
    }
    
    function buscaNivel($id_curso){
	
	require_once ('modelo/PruebaModelo.php');

	$ingresa_prueba = new PruebaModelo();
	
	$nivelA = $ingresa_prueba->nivelPrba($id_curso);

	while($nivel = $nivelA->fetch()){ $aaa = $nivel['0'];}

	return $aaa;
    }
    
    
    function checkEmail($email){
    
    require_once ('modelo/NstModelo.php');

	$check = new NstModelo();
	
	$a = $check->checkProf($email);

	 $disponibilidad = $a->rowCount();
	 
	 if($disponibilidad == '0') {
	 	$a =  $check->checkDir($email);
	 	$disponibilidad = $a->rowCount();
  	}
  	return $disponibilidad;
}


function codigoResend($email){
	
	$numero = rand(999,9999);
	$raiz = rand(0,100000999);
	$numero = dechex ($raiz * $numero);
	$numero = md5($numero);
		$fecha = date('Y-m-d');
	 require_once ('modelo/NstModelo.php');
	$a = new NstModelo();
	
	$c = $a->verReco($email);
	
	$b = $c->rowCount();
	
	if($b > 0){
	
	$a->actualizaCodigo($email,$numero);
	$a->actualizaFecha($email,$fecha);

	}else{
	
	$a->reenviarCodigo($email,$numero,$fecha);
}	
		$mensaje = "Este correo electrónico ha sido generado por el sitio http://www.proyectonst.cl/. Para cambiar su generar una nueva contraseña debe copiar y pegar el siguiente código : $numero \r\n en la siguiente direccion: http://www.proyectonst.cl/?controlador=Nst&accion=nuevaPassword \r\nEl código tiene validez hasta las 24 hr. del día solicitado, después debe volver a realizar el procedimiento de recuperación. \r\n Atte. Administración\r\n Proyecto Educativo NST";
	    $to      = $email;
	    $subject = 'Restaurar Contraseña';
	    $message = $mensaje;
	    $headers = 'From: sysnst@proyectonst.cl' . "\r\n" .
	    'Reply-To: sysnst@proyectonst.cl' . "\r\n" .
	    'X-Mailer: PHP/' . phpversion();

	    mail($to, $subject, $message, $headers);
	}
	
function checkCodigo($cod){
    
    require_once ('modelo/NstModelo.php');

	$check = new NstModelo();
	
	$a = $check->checkCodigo($cod);

	 $disponibilidad = $a->rowCount();
	 
	 
	 if($disponibilidad > '0') {
	 	while($f = $a->fetch() ){ $_SESSION['email_cambiar']=$f['0'];}
		return 'true';
  	
  	}else{
  	
  		return 'false';
	}
}


}
