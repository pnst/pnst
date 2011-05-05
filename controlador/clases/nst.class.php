<?php
class nstClass {
	
    function wra_profesor($consulta, $password_profesor){
	while($profesor = $consulta->fetch()){
	    $_SESSION['wraprof_email_prof']		= $profesor['email_prof'];
	    $_SESSION['wraprof_passw_prof']		= $profesor['passw_prof'];
	    $_SESSION['wraprof_id_profesor']	= $profesor['id_profesor'];
	    $_SESSION['wraprof_nombre_colegio']	= $profesor['nombre_colegio'];
	    $_SESSION['wraprof_nombre_prof']	= $profesor['nombre_prof'];
	    $_SESSION['wraprof_apellido_prof']	= $profesor['apellido_prof'];
	    $_SESSION['nst_sesion']				= $profesor['id_profesor'];
	    $_SESSION['configuracion']			= "profesor";
	    $logueado							= $profesor['logueado'] ;
	    $_SESSION['rbd_prof']				= $profesor['rbd'] ;


	}
	/* Si está logueado mostrar mensaje*/
	if($logueado == 'si')return -5;
    	    if ($password_profesor == $_SESSION['wraprof_passw_prof']){
	    /* ingresa */
	    return 1;
	}else{
	    /*password no coincide*/ 
	    return -2;
	}
    }//fin function wea_profesor
    
    
    
	
    function wra_director($consulta, $password_director){
	while($director= $consulta->fetch()){
	    $_SESSION['wradir_id_dir']			= $director['id_dir'];
	    $_SESSION['nst_sesion']				= $director['id_dir'];
	    $_SESSION['wradir_nombre_dir'] 		= $director['nombre_dir'];
	    $_SESSION['wradir_apellido_dir']	= $director['apellido_dir'];
	    $_SESSION['wradir_email_dir'] 		= $director['email_dir'];
	    $_SESSION['wradir_passw_dir'] 		= $director['passw_dir'];
	    $_SESSION['wradir_rbd'] 			= $director['rbd'];
	    $_SESSION['wradir_nombre_colegio']	= $director['nombre_colegio'];
	    $_SESSION['configuracion']			= "director";
	    $logueado							= $director['logueado'] ;
	}
	/* Si está logueado mostrar mensaje*/
	if($logueado == 'si')return -5;

	if ($password_director == $_SESSION['wradir_passw_dir']){
	    /* ingresa */
	    return 1;
	}else{
	    /*password no coincide*/ 
	    return -2;}
	    //fin function wra_profesor
    }
    
    
    
    
    /* Login de prueba alumno*/
    function wra_login_prba($passw_prba,$passw_alumn){

	while($passw_sis = $passw_prba->fetch()){ $passw_nst = $passw_sis['codigo_prba'];}
	
	/*La contraseña corresponde*/
	if($passw_nst == $passw_alumn){
	
	require_once 'modelo/PruebaModelo.php';
    
	$get_info_prba = new PruebaModelo();
    
	$get_info = $get_info_prba->get_info_prba($_SESSION['id_prba']);

	while($wra_resp = $get_info->fetch()){
	    $_SESSION["wrares_id_prueba"] 		= $wra_resp['id_prueba'];
	    $_SESSION["wrares_id_curso"] 		= $wra_resp['id_curso'];
	    $_SESSION["wrares_formato_prba"]	= $wra_resp['formato_prba'];
	    $_SESSION["wrares_codigo_prba"]		= $wra_resp['codigo_prba'];
	    $_SESSION["wrares_nivel_curso"]		= $wra_resp['nivel_curso'];
	    $_SESSION["wrares_letra_curso"]		= $wra_resp['letra_curso'];
	    $_SESSION["wrares_nombre_colegio"]	= $wra_resp['nombre_colegio'];
	    $_SESSION["wrares_asignatura"]		= $wra_resp['asignatura'];
	    $_SESSION["wrares_nombre_prof"]		= $wra_resp['nombre_prof'];
	    $_SESSION["wrares_apellido_prof"]	= $wra_resp['apellido_prof'];
	    //	$_SESSION["wrares_id_profesor"] = $wra_resp['id_profesor'];
	} 

	echo "1";return;}else{ echo "0"; return;}}
    
    
    
	
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

	}else{ $a->reenviarCodigo($email,$numero,$fecha);}	
		
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
  	
  	}else{ return 'false'; }}


}
