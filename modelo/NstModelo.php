<?php
/* ************************* */
//@Author: Ignacio Pe�a
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
 * Funci�n 	: login_profesor
 * Detalle	: funci�n consulta informaci�n completa del usuario profesor.
 * Par�metros: $email.
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
 * Funci�n 	: login_director
 * Detalle	: funci�n consulta informaci�n completa del usuario director.
 * Par�metros: $email.
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
 * Funci�n 	: passw_prueba
 * Detalle	: funci�n consulta c�digo/password de la prueba seg�n el id.
 * Par�metros: $id_prba.
 */ 
    public function passw_prueba($id_prba){
	$consulta = $this->db->prepare("SELECT codigo_prba 
								    FROM prueba 
								    WHERE id_prueba = '$id_prba'");

	$consulta->execute();

	return $consulta;
    }
    
/*
 * Funci�n 	: Loguinprof
 * Detalle	: funci�n actualiza el estado logueado = 'si'.
 * Par�metros: $id_usuario.
 */ 
    public function Loguinprof($id_usuario){
	$consulta = $this->db->prepare("UPDATE profesor SET logueado = 'si' WHERE id_profesor = '$id_usuario'");

	$consulta->execute();

	return $consulta;

    }

/*
 * Funci�n 	: Loguindir
 * Detalle	: funci�n actualiza el estado logueado = 'si'.
 * Par�metros: $id_usuario.
 */ 
    public function Loguindir($id_usuario){
	$consulta = $this->db->prepare("UPDATE director SET logueado = 'si' WHERE id_director = '$id_usuario'");

	$consulta->execute();

	return $consulta;

    }
    
/* 
 * Funci�n 	: LogOutprof
 * Detalle	: funci�n actualiza el estado logueado = 'no'.
 * Par�metros: $id_usuario.
 */ 

    public function LogOutprof($id_usuario){
	$consulta = $this->db->prepare("UPDATE profesor SET logueado = 'no' WHERE id_profesor = '$id_usuario'");

	$consulta->execute();

	return $consulta;

    }
    
/*
 * Funci�n 	: LogOutdir
 * Detalle	: funci�n actualiza el estado logueado = 'no'.
 * Par�metros: $id_usuario.
 */

    public function LogOutdir($id_usuario){
	$consulta = $this->db->prepare("UPDATE director SET logueado = 'no' WHERE id_director = '$id_usuario'");

	$consulta->execute();

	return $consulta;

    }
    
/*
 * Funci�n 	: existecolegio
 * Detalle	: funci�n consulta si existe colegio en la base de datos.
 * Par�metros: $colegio.
 */

    public function existecolegio($colegio){
	$consulta = $this->db->prepare("SELECT nombre_colegio FROM colegio WHERE nombre_colegio = '$colegio'");

	$consulta->execute();

	return $consulta;

    }
    
/*
 * Funci�n 	: insertaprof
 * Detalle	: funci�n agrega profesor.
 * Par�metros: $rbd,$nombre,$apellido,$email,$password, $fecha_ingreso,$nacimiento.
 */
	public function  insertaprof($rbd,$nombre,$apellido,$email,$password, $fecha_ingreso,$nacimiento){
	$consulta = $this->db->prepare(" INSERT INTO `profesor` ( `rbd`,`nombre_prof` ,`apellido_prof` ,`email_prof` ,`passw_prof` ,`logueado` ,`cuenta` ,`fecha_ingreso` ,`fecha_nac` ,`cuenta_activa` )
										VALUES '$rbd', '$nombre', '$apellido', '$email','$password', 'no','Gratis','$fecha_ingreso', '$nacimiento','no')");
	$consulta->execute();

	return $consulta;

    }
    
/* 
 * Funci�n 	: checkprof
 * Detalle	: funci�n consulta rbd del profesor seg�n email.
 * Par�metros: $email.
 */   
	 public function checkprof($email){
	$consulta = $this->db->prepare("SELECT rbd FROM profesor WHERE email_prof = '$email'");

	$consulta->execute();

	return $consulta;

    }
    
/*
 * Funci�n 	: checkdir
 * Detalle	: funci�n consulta rbd del director seg�n email.
 * Par�metros: $email.
 */    
    public function checkdir($email){
	$consulta = $this->db->prepare("SELECT rbd FROM director WHERE email_dir = '$email'");

	$consulta->execute();

	return $consulta;

    }
    
/*
 * Funci�n 	: reenviarCodigo
 * Detalle	: funci�n agrega c�digo para reenv�o.
 * Par�metros: $email,$numero,$fecha.
 */    
    public function reenviarCodigo($email,$numero,$fecha){
	$consulta = $this->db->prepare("INSERT INTO `NST`.`reenviar` (`id_reenviar` ,`email_reenviar` ,`codigo_reenviar` ,`fecha`)
									VALUES (NULL , '$email', '$numero', '$fecha')");

	$consulta->execute();

	return $consulta;

    }
/*
 * Funci�n 	: verReco
 * Detalle	: funci�n consulta id .
 * Par�metros: $email,$numero,$fecha.
 */    
     public function verReco($email){
	$consulta = $this->db->prepare("SELECT id_reenviar FROM reenviar WHERE email_reenviar = '$email'");

	$consulta->execute();

	return $consulta;

    }

/*
 * Funci�n 	: actualizaCodigo
 * Detalle	: funci�n actualiza
 * Par�metros: $email,$cod.
 */ 
	public function actualizaCodigo($email,$cod){
	$consulta = $this->db->prepare("UPDATE reenviar SET codigo_reenviar = '$cod' WHERE email_reenviar = '$email'");

	$consulta->execute();

	return $consulta;

    }

/*
 * Funci�n 	: actualizaFecha
 * Detalle	: funci�n actualiza
 * Par�metros: $email,$fecha.
 */ 
	public function actualizaFecha($email,$fecha){
	$consulta = $this->db->prepare("UPDATE reenviar SET fecha = '$fecha' WHERE email_reenviar = '$email'");

	$consulta->execute();

	return $consulta;

    }

/*
 * Funci�n 	: updateprof
 * Detalle	: funci�n actualiza contrase�a del profesor
 * Par�metros: $email,$passw.
 */   
    public function updateprof($email,$passw){
	$consulta = $this->db->prepare("UPDATE profesor SET passw_prof = '$passw' WHERE email_prof = '$email'");

	$consulta->execute();

	return $consulta;

    }

/*
 * Funci�n 	: updatedir
 * Detalle	: funci�n actualiza contrase�a del director
 * Par�metros: $email,$passw.
 */  
    public function updatedir($email,$passw){
	$consulta = $this->db->prepare("UPDATE director SET passw_dir = '$passw' WHERE email_dir = '$email'");

	$consulta->execute();

	return $consulta;

    }

/*
 * Funci�n 	: buprof
 * Detalle	: funci�n consulta rbd del profesor
 * Par�metros: $email.
 */   
     public function buprof($email){
	$consulta = $this->db->prepare("SELECT rbd FROM profesor WHERE email_prof = '$email'");

	$consulta->execute();

	return $consulta;

    }
    
/*
 * Funci�n 	: checkCodigo
 * Detalle	: funci�n consulta
 * Par�metros: $cod.
 */
     public function checkCodigo($cod){
	$consulta = $this->db->prepare("SELECT email_reenviar FROM reenviar WHERE codigo_reenviar = '$cod'");

	$consulta->execute();

	return $consulta;

    }

}
