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

class NstModelo extends ModeloBase
{
    public function login_profesor($email){
	//realizamos la consulta de todos los items
	$consulta = $this->db->prepare("SELECT A.EMAIL_PROF, A.PASSW_PROF, A.ID_PROFESOR, A.NOMBRE_PROF, A.APELLIDO_PROF, B.NOMBRE_COLEGIO, A.LOGUEADO, A.RBD
		FROM PROFESOR A, COLEGIO B
		WHERE EMAIL_PROF = '$email'
		AND A.RBD= B.RBD");
	$consulta->execute();
				
	//devolvemos la coleccion para que la vista la presente.
	return $consulta;
    }

    public function login_director($email){
	$consulta = $this->db->prepare("SELECT A.ID_DIR, A.NOMBRE_DIR, A.APELLIDO_DIR, A.EMAIL_DIR, A.PASSW_DIR, B.RBD, B.NOMBRE_COLEGIO, A.LOGUEADO
		FROM DIRECTOR A, COLEGIO B
		WHERE A.EMAIL_DIR = '$email'
		AND A.RBD = B.RBD");
    	$consulta->execute();

	return $consulta;
    }

    public function passw_prueba($id_prba){
	$consulta = $this->db->prepare("SELECT CODIGO_PRBA 
					    FROM PRUEBA 
					    WHERE ID_PRUEBA = '$id_prba'");

	$consulta->execute();

	return $consulta;
    }

    public function Loguinprof($id_usuario){
	$consulta = $this->db->prepare("UPDATE PROFESOR SET LOGUEADO = 'si' WHERE ID_PROFESOR = '$id_usuario'");

	$consulta->execute();

	return $consulta;

    }

    public function Loguindir($id_usuario){
	$consulta = $this->db->prepare("UPDATE DIRECTOR SET LOGUEADO = 'si' WHERE ID_DIRECTOR = '$id_usuario'");

	$consulta->execute();

	return $consulta;

    }

    public function LogOutprof($id_usuario){
	$consulta = $this->db->prepare("UPDATE PROFESOR SET LOGUEADO = 'no' WHERE ID_PROFESOR = '$id_usuario'");

	$consulta->execute();

	return $consulta;

    }

    public function LogOutdir($id_usuario){
	$consulta = $this->db->prepare("UPDATE DIRECTOR SET LOGUEADO = 'no' WHERE ID_DIRECTOR = '$id_usuario'");

	$consulta->execute();

	return $consulta;

    }

    public function existeColegio($colegio){
	$consulta = $this->db->prepare("SELECT NOMBRE_COLEGIO FROM COLEGIO WHERE NOMBRE_COLEGIO = '$colegio'");

	$consulta->execute();

	return $consulta;

    }
    
    public function  insertaProf($rbd,$nombre,$apellido,$email,$password, $fecha_ingreso,$nacimiento){
	$consulta = $this->db->prepare(" INSERT INTO `PROFESOR` ( `RBD`,`NOMBRE_PROF` ,`APELLIDO_PROF` ,`EMAIL_PROF` ,`PASSW_PROF` ,`LOGUEADO` ,`CUENTA` ,`FECHA_INGRESO` ,`FECHA_NAC` ,`CUENTA_ACTIVA` )VALUES
	('$rbd', '$nombre', '$apellido', '$email','$password', 'no','Gratis','$fecha_ingreso', '$nacimiento','no')");

	$consulta->execute();

	return $consulta;

    }
	    
	 public function checkProf($email){
	$consulta = $this->db->prepare("SELECT RBD FROM PROFESOR WHERE EMAIL_PROF = '$email'");

	$consulta->execute();

	return $consulta;

    }
    
    public function checkDir($email){
	$consulta = $this->db->prepare("SELECT RBD FROM DIRECTOR WHERE EMAIL_DIR = '$email'");

	$consulta->execute();

	return $consulta;

    }
    public function reenviarCodigo($email,$numero,$fecha){
	$consulta = $this->db->prepare("INSERT INTO `NST`.`REENVIAR` (`ID_REENVIAR` ,`EMAIL_REENVIAR` ,`CODIGO_REENVIAR` ,`FECHA`)
VALUES (NULL , '$email', '$numero', '$fecha')");

	$consulta->execute();

	return $consulta;

    }
    
     public function verReco($email){
	$consulta = $this->db->prepare("SELECT ID_REENVIAR FROM REENVIAR WHERE EMAIL_REENVIAR = '$email'");

	$consulta->execute();

	return $consulta;

    }
     
     public function actualizaCodigo($email,$cod){
	$consulta = $this->db->prepare("UPDATE REENVIAR SET CODIGO_REENVIAR = '$cod' WHERE EMAIL_REENVIAR = '$email'");

	$consulta->execute();

	return $consulta;

    }
    public function actualizaFecha($email,$fecha){
	$consulta = $this->db->prepare("UPDATE REENVIAR SET FECHA = '$fecha' WHERE EMAIL_REENVIAR = '$email'");

	$consulta->execute();

	return $consulta;

    }
    
    public function updateProf($email,$passw){
	$consulta = $this->db->prepare("UPDATE PROFESOR SET PASSW_PROF = '$passw' WHERE EMAIL_PROF = '$email'");

	$consulta->execute();

	return $consulta;

    }
    
        public function updateDir($email,$passw){
	$consulta = $this->db->prepare("UPDATE DIRECTOR SET PASSW_DIR = '$passw' WHERE EMAIL_DIR = '$email'");

	$consulta->execute();

	return $consulta;

    }
    
     public function buProf($email){
	$consulta = $this->db->prepare("SELECT RBD FROM PROFESOR WHERE EMAIL_PROF = '$email'");

	$consulta->execute();

	return $consulta;

    }

     public function checkCodigo($cod){
	$consulta = $this->db->prepare("SELECT EMAIL_REENVIAR FROM REENVIAR WHERE CODIGO_REENVIAR = '$cod'");

	$consulta->execute();

	return $consulta;

    }

}
