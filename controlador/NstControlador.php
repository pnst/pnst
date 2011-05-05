<?php

/* ************************* */
//@Author: Ignacio Peña
//@website: www.proyectonst.cl
//@email: ignacio.pena87@yahoo.es
//@license: 
//      This program is free software; you can redistribute it and/or modify
//      it under the terms of the GNU General Public License as published by
//      the Free Software Foundation; either version 2 of the License, or
//      (at your option) any later version.
//      
//      This program is distributed in the hope that it will be useful,
//      but WITHOUT ANY WARRANTY; without even the implied warranty of
//      MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
//      GNU General Public License for more details.
//      
//      You should have received a copy of the GNU General Public License
//      along with this program; if not, write to the Free Software
//      Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston,
//      MA 02110-1301, USA.
//
//Script-PHP: NstControlador
/* ************************* */

class NstControlador extends ControladorBase
{
    function index(){ header("Location: ?controlador=Index");}

    public function logout(){

        require_once('modelo/NstModelo.php');
        /* Indicar que este usuario se ha logueado */
        $logueado = new NstModelo();

        if(isset($_SESSION['configuracion']) && !empty($_SESSION['configuracion'])){

        if($_SESSION['configuracion'] == "profesor"){

            $id_usuario = $_SESSION['wraprof_id_profesor'];

            $logueado->LogOutprof($id_usuario);}

        if($_SESSION['configuracion'] == "director"){

            $id_usuario = $_SESSION['wradir_id_dir'];

            $logueado->LogOutdir($id_usuario);}

        }

        unset($_SESSION['nst_sesion']);

        session_destroy();

        $this->view->show('login.php');
    }

    
    
    function valida_login_prof(){
    if(!empty($_POST['email'])&& isset($_POST['email']) && !empty($_POST['password'])&& isset($_POST['password']) ){

        $password = md5($_POST['password']);
	
        //Incluye el modelo que corresponde
        require_once 'modelo/NstModelo.php';

        //Creamos una instancia de nuestro "modelo"
        $login= new NstModelo();

        //Le pedimos al modelo todos los items
        $consulta = $login->login_profesor($_POST['email']);

        //Se comprueba la cantidad de rows que fueron encontradas
        $contador_rows = $consulta->rowCount();

        if($contador_rows != 0){

            //Incluye la clase que corresponde
            require_once 'clases/nst.class.php';


            $login_profesor = nstClass::wra_profesor($consulta,$password);

            if (!empty($_SESSION['nst_sesion']) && isset($login_profesor)){echo $login_profesor;}
            else{ echo -4;}

        //el correo no existe
        }else{ $this->valida_login_dir($_POST['email'], $password);}
        //campos vacios
    }else{ echo "-1";}
    return;
    }
    
    
    
    private function valida_login_dir($email, $password){

        //Incluye el modelo que corresponde
        require_once 'modelo/NstModelo.php';

        //Creamos una instancia de nuestro "modelo"
        $login= new NstModelo();

        //Le pedimos al modelo todos los items
        $consulta = $login->login_director($email);

        //Se comprueba la cantidad de rows que fueron encontradas
        $contador_rows = $consulta->rowCount();

        if($contador_rows != 0){

            //Incluye la clase que corresponde
            require_once 'clases/nst.class.php';

            $login_director = nstClass::wra_director($consulta,$password);

            /* Envio de password a nst, inicializo variables de session*/
            if (!empty($_SESSION['nst_sesion']) && isset($login_director)){
                echo $login_director;
            }else{ echo "-4";}
        }else{echo "-3" ;}return;
    }
    
    

    //muestra la pagina de login de prueba
    public function login_prba (){$this->view->show("login_prba.php");}
    
    

    //guarda id_prueba para login de la prueba
    public function seprba_id(){

        if(isset($_POST['id_prba']) && !empty($_POST['id_prba'])){$_SESSION['id_prba'] = $_POST['id_prba'];

        echo $_POST['id_prba'];}

        else{ unset($_SESSION['id_prba']);}
    }
    
    
    
    public function validar_log_prba(){

        if(isset($_POST['cod_prba_user']) && !empty($_POST['cod_prba_user'])){

            require_once 'modelo/NstModelo.php';

            $passw_prba = new NstModelo();

            /* Envio id_prueba y devuelve password_prba*/
            $passw_prueba = $passw_prba->passw_prueba($_SESSION['id_prba']);

            /*Se comprueba la cantidad de rows que fueron encontradas*/
            $contador_rows = $passw_prueba->rowCount();

            if($contador_rows != 0){

            //Incluye la clase que corresponde
            require_once 'clases/nst.class.php';

            $login_profesor = nstClass::wra_login_prba($passw_prueba,$_POST['cod_prba_user']);

            }
        }else {echo "-1";}
    }

    
    public function registrar(){ $this->view->show('registrar.php');}

    public function registrado(){ $this->view->show('registrado.php');}

    public function val_registro(){

        if($_POST['nombre'] OR $_POST['apellido'] OR $_POST['email'] OR $_POST['cargo'] OR $_POST['passw'] OR $_POST['colegio'] OR $_POST['day'] OR $_POST['month'] OR $_POST['year']){

        if(empty($_POST['nombre']) && empty($_POST['apellido']) && empty($_POST['email'])  && empty($_POST['passw'])){
        die(msg(0,"Debes llenar todos los campos"));}

        // Valida Nacimiento
        if(!(int)$_POST['day'] && !(int)$_POST['month'] && !(int)$_POST['year']){
        die(msg(0,"Debes indicar tu fecha de nacimiento"));}

        // Valida E-Mail
        if(!(preg_match("/^[\.A-z0-9_\-\+]+[@][A-z0-9_\-]+([.][A-z0-9_\-]+)+[A-z]{1,4}$/", $_POST['email'])))
            die(msg(0,"La dirección e-mail no es válida"));

        //Valida Colegio
        if($_POST['colegio'] == '')die(msg(0,"Debes indicar tu colegio"));

        //Valida Cargo
        if($_POST['cargo'] == 'Cargo')die(msg(0,"Indica si eres Profesor o Director"));

        require_once('modelo/NstModelo.php');

        $a = new NstModelo();

        $b = $a->existeColegio($_POST['colegio']);

        $c = $b->rowCount();

        if($c == '') die(msg(0,"Revisa la ortografía del colegio, si el colegio realmente existe debes enviar un email a: colegio@proyectonst.cl indicando el Nombre Completo y el RBD. Al recibir el email nos pondremos en contacto contigo a la brevedad para solucionar este problema."));

		$nacimiento = $_POST['year']."-".$_POST['month']."-".$_POST['day'];
		
		$fecha_ingreso = date('Y-m-d');
		
		$password = md5($_POST['passw']);
		
		if($_POST['cargo'] == 'Profesor') $f = $a->insertaProf($_SESSION['rbd_registro'] , $_POST['nombre'], $_POST['apellido'],$_POST['email'], $password,$fecha_ingreso,$nacimiento);

        echo 1;
        }else{ $this->view->show('login.php');} }


        
        
	public function colegios(){
   	$db = new mysqli('localhost', 'NST' ,'qwe123', 'NST');

    if(isset($_POST['colegio'])) {
    $colegio = $db->real_escape_string($_POST['colegio']);

    if(strlen($colegio) >0) {

     $query = $db->query("select RBD,NOMBRE_COLEGIO from COLEGIO where NOMBRE_COLEGIO regexp '^a|$colegio' LIMIT 5");
        if($query) {
            echo '<ul>';
            while ($result = $query ->fetch_object()) {
                                  $_SESSION['rbd_registro'] = $result->RBD;	
                                  echo '<li onClick="fill(\''.addslashes($result->NOMBRE_COLEGIO).'\');">'.$result->NOMBRE_COLEGIO.'</li>';
            }
            echo '</ul>';} else { echo 'OOPS tenemos problemas!';}
            } else { echo 'Experimentamos problemas.';}
        } else { echo 'El sistema no está funcionando ahora.';} }

        
        
        
	public function  dispEmail($email){
		if($_POST['email']) $email = $_POST['email'];
		if (isset($email)) {
			//Incluye la clase que corresponde
            require_once 'clases/nst.class.php';
            $a = new nstClass();
            $z = $a->checkEmail($email);
 			$checking = 'false';
  	
  		if($z == '0') $checking = 'true';
  		echo $checking;
		return $checking;
		}
	}

	
	
	
	public function  dispEmailPOST(){
		if($_POST['email']) $email = $_POST['email'];
		
		if (isset($email)) {
			//Incluye la clase que corresponde
            require_once 'clases/nst.class.php';
            $a = new nstClass();
            $z = $a->checkEmail($email);
 			$checking = 'false';
  	
  		if($z == '0') $checking = 'true';
  		echo $checking;
		return $checking;
		}
	}

	
	
	public function val_suma(){
	if($_POST['suma']) $suma = $_POST['suma'];
		sleep(2);
		if (isset($suma)) {
			$checking = 'false';
  	
  		if($suma ==  $_SESSION['resultado']) $checking = 'true';
  		echo $checking;
		}
	}

    public function Eliminar_Cuenta(){ $this->view->show("eliminarCuenta.php");}

    public function dar_baja(){ $this->view->show("contratoBaja.php");}

    public function val_baja(){
    if(isset($_POST['captcha']) && !empty($_POST['captcha']) && isset($_POST['password']) && !empty($_POST['password'])){
        $passw = md5($_POST['password']);

        if($_SESSION['wraprof_PASSW_PROF']){
            if($_SESSION['wraprof_PASSW_PROF'] == $passw ){
                if($_SESSION['suma'] == $_POST['captcha']) echo 1;
                else echo -2;
            }else{echo-1;}

        }
        
        if($_SESSION['wradir_PASSW_DIR']){
            if($_SESSION['wradir_PASSW_DIR'] == $passw){
                if($_SESSION['suma'] == $_POST['captcha']) echo 1;
                else echo -2;
            }else{echo-1;}
        }

    	}else {echo 0;}
    }

	public function reenvioPasswd(){ $this->view->show('reenvioPasswd.php');}

	
	
	public function mail_reenvio(){
		if(isset($_POST['email']) || !empty($_POST['email'])) {
			require_once 'clases/nst.class.php';
    		$a = new nstClass();
    		$z = $a->codigoResend($_POST['email']);
    		return;
		}
	}


	
	public function nuevaPassword(){$this->view->show('insertCod.php');}

	public function valCodnew(){
		if(isset($_POST['codigo'])){
			//Incluye la clase que corresponde
        	require_once 'clases/nst.class.php';
        	$a = new nstClass();
        	$z = $a->checkCodigo($_POST['codigo']);
 			echo $z;
		return;
		}
	}

	
	
	public function SamePassw(){
		if(isset($_POST['passw1']) || isset($_POST['passw2'])){
			$z = false;
			if($_POST['passw1'] == $_POST['passw2'])  $z = true;
 			echo $z;
		return;
		}
	}
	
	
	
	
	public function camb_passw(){
		if(isset($_POST['passw'])){
			$passw = md5($_POST['passw']);
			require_once ('modelo/NstModelo.php');
			$a = new NstModelo();
		
			$buscaMail = $a->buProf($_SESSION['email_cambiar']);
		
			if($buscaMail->rowCount() > 0 )	$a->updateProf($_SESSION['email_cambiar'], $passw);
		
			$a->updateDir($_SESSION['email_cambiar'], $passw);
		}
	}

	
	
}
