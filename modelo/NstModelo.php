<?php
/* ************************* */
//@Author: Ignacio Peña
//@website: www.proyectonst.cl
//@email: ignacio.pena@proyectonst.cl
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
//
/* ************************* */

class NstModelo extends ModeloBase
{
	
/*
 * Función 	: login_profesor
 * Detalle	: función consulta información completa del usuario profesor.
 * Parámetros: $email.
 */ 
    public function login_profesor($email){
	//realizamos la consulta de todos los items
	$consulta = $this->db->prepare("SELECT A.email_prof, A.passw_prof, A.id_profesor, A.nombre_prof, A.apellido_prof, B.nombre_colegio, A.logueado, A.rbd
									FROM profesor A, colegio B
									WHERE email_prof = '$email'
									AND A.rbd= B.rbd");
	$consulta->execute();
				
	//devolvemos la coleccion para que la vista la presente.
	return $consulta;
    }

/*
 * Función 	: login_director
 * Detalle	: función consulta información completa del usuario director.
 * Parámetros: $email.
 */ 
    public function login_director($email){
	$consulta = $this->db->prepare("SELECT A.id_dir, A.nombre_dir, A.apellido_dir, A.email_dir, A.passw_dir, B.rbd, B.nombre_colegio, A.logueado
									FROM director A, colegio B
									WHERE A.email_dir = '$email'
									AND A.rbd = B.rbd");
    	$consulta->execute();

	return $consulta;
    }

/*
 * Función 	: passw_prueba
 * Detalle	: función consulta código/password de la prueba según el id.
 * Parámetros: $id_prba.
 */ 
    public function passw_prueba($id_prba){
	$consulta = $this->db->prepare("SELECT codigo_prba 
								    FROM prueba 
								    WHERE id_prueba = '$id_prba'");

	$consulta->execute();

	return $consulta;
    }
    
/*
 * Función 	: Loguinprof
 * Detalle	: función actualiza el estado logueado = 'si'.
 * Parámetros: $id_usuario.
 */ 
    public function Loguinprof($id_usuario){
	$consulta = $this->db->prepare("UPDATE profesor SET logueado = 'si' WHERE id_profesor = '$id_usuario'");

	$consulta->execute();

	return $consulta;

    }

/*
 * Función 	: Loguindir
 * Detalle	: función actualiza el estado logueado = 'si'.
 * Parámetros: $id_usuario.
 */ 
    public function Loguindir($id_usuario){
	$consulta = $this->db->prepare("UPDATE director SET logueado = 'si' WHERE id_director = '$id_usuario'");

	$consulta->execute();

	return $consulta;

    }
    
/* 
 * Función 	: LogOutprof
 * Detalle	: función actualiza el estado logueado = 'no'.
 * Parámetros: $id_usuario.
 */ 

    public function LogOutprof($id_usuario){
	$consulta = $this->db->prepare("UPDATE profesor SET logueado = 'no' WHERE id_profesor = '$id_usuario'");

	$consulta->execute();

	return $consulta;

    }
    
/*
 * Función 	: LogOutdir
 * Detalle	: función actualiza el estado logueado = 'no'.
 * Parámetros: $id_usuario.
 */

    public function LogOutdir($id_usuario){
	$consulta = $this->db->prepare("UPDATE director SET logueado = 'no' WHERE id_director = '$id_usuario'");

	$consulta->execute();

	return $consulta;

    }
    
/*
 * Función 	: existecolegio
 * Detalle	: función consulta si existe colegio en la base de datos.
 * Parámetros: $colegio.
 */

    public function existecolegio($colegio){
	$consulta = $this->db->prepare("SELECT nombre_colegio FROM colegio WHERE nombre_colegio = '$colegio'");

	$consulta->execute();

	return $consulta;

    }
    
/*
 * Función 	: insertaprof
 * Detalle	: función agrega profesor.
 * Parámetros: $rbd,$nombre,$apellido,$email,$password, $fecha_ingreso,$nacimiento.
 */
	public function  insertaprof($rbd,$nombre,$apellido,$email,$password, $fecha_ingreso,$nacimiento){
	$consulta = $this->db->prepare(" INSERT INTO `profesor` ( `rbd`,`nombre_prof` ,`apellido_prof` ,`email_prof` ,`passw_prof` ,`logueado` ,`cuenta` ,`fecha_ingreso` ,`fecha_nac` ,`cuenta_activa` )
										VALUES '$rbd', '$nombre', '$apellido', '$email','$password', 'no','Gratis','$fecha_ingreso', '$nacimiento','no')");
	$consulta->execute();

	return $consulta;

    }
    
/* 
 * Función 	: checkprof
 * Detalle	: función consulta rbd del profesor según email.
 * Parámetros: $email.
 */   
	 public function checkprof($email){
	$consulta = $this->db->prepare("SELECT rbd FROM profesor WHERE email_prof = '$email'");

	$consulta->execute();

	return $consulta;

    }
    
/*
 * Función 	: checkdir
 * Detalle	: función consulta rbd del director según email.
 * Parámetros: $email.
 */    
    public function checkdir($email){
	$consulta = $this->db->prepare("SELECT rbd FROM director WHERE email_dir = '$email'");

	$consulta->execute();

	return $consulta;

    }
    
/*
 * Función 	: reenviarCodigo
 * Detalle	: función agrega código para reenvío.
 * Parámetros: $email,$numero,$fecha.
 */    
    public function reenviarCodigo($email,$numero,$fecha){
	$consulta = $this->db->prepare("INSERT INTO `NST`.`reenviar` (`id_reenviar` ,`email_reenviar` ,`codigo_reenviar` ,`fecha`)
									VALUES (NULL , '$email', '$numero', '$fecha')");

	$consulta->execute();

	return $consulta;

    }
/*
 * Función 	: verReco
 * Detalle	: función consulta id .
 * Parámetros: $email,$numero,$fecha.
 */    
     public function verReco($email){
	$consulta = $this->db->prepare("SELECT id_reenviar FROM reenviar WHERE email_reenviar = '$email'");

	$consulta->execute();

	return $consulta;

    }

/*
 * Función 	: actualizaCodigo
 * Detalle	: función actualiza
 * Parámetros: $email,$cod.
 */ 
	public function actualizaCodigo($email,$cod){
	$consulta = $this->db->prepare("UPDATE reenviar SET codigo_reenviar = '$cod' WHERE email_reenviar = '$email'");

	$consulta->execute();

	return $consulta;

    }

/*
 * Función 	: actualizaFecha
 * Detalle	: función actualiza
 * Parámetros: $email,$fecha.
 */ 
	public function actualizaFecha($email,$fecha){
	$consulta = $this->db->prepare("UPDATE reenviar SET fecha = '$fecha' WHERE email_reenviar = '$email'");

	$consulta->execute();

	return $consulta;

    }

/*
 * Función 	: updateprof
 * Detalle	: función actualiza contraseña del profesor
 * Parámetros: $email,$passw.
 */   
    public function updateprof($email,$passw){
	$consulta = $this->db->prepare("UPDATE profesor SET passw_prof = '$passw' WHERE email_prof = '$email'");

	$consulta->execute();

	return $consulta;

    }

/*
 * Función 	: updatedir
 * Detalle	: función actualiza contraseña del director
 * Parámetros: $email,$passw.
 */  
    public function updatedir($email,$passw){
	$consulta = $this->db->prepare("UPDATE director SET passw_dir = '$passw' WHERE email_dir = '$email'");

	$consulta->execute();

	return $consulta;

    }

/*
 * Función 	: buprof
 * Detalle	: función consulta rbd del profesor
 * Parámetros: $email.
 */   
     public function buprof($email){
	$consulta = $this->db->prepare("SELECT rbd FROM profesor WHERE email_prof = '$email'");

	$consulta->execute();

	return $consulta;

    }
    
/*
 * Función 	: checkCodigo
 * Detalle	: función consulta
 * Parámetros: $cod.
 */
     public function checkCodigo($cod){
	$consulta = $this->db->prepare("SELECT email_reenviar FROM reenviar WHERE codigo_reenviar = '$cod'");

	$consulta->execute();

	return $consulta;

    }

}
