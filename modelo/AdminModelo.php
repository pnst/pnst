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
class AdminModelo extends ModeloBase
{
/*
 *Funci�n 	: valida_admin
 *Detalle	: funci�n consulta el email y password del administrador.
 *Par�metros: $a.
 */
    public function valida_admin($a){
	$consulta = $this->db->prepare("SELECT email_admin, passw_admin
									FROM administrador 
									WHERE email_admin = '$a'");
	$consulta->execute();
				
	return $consulta;
    }
    
/*
 *Funci�n 	: Prof
 *Detalle	: funci�n consulta la info de la cuenta del profesor.
 *Par�metros: ().
 */
    public function Prof(){
	$consulta = $this->db->prepare("SELECT a.nombre_prof, a.apellido_prof, a.email_prof, a.fecha_ingreso, a.cuenta, b.nombre_colegio
									FROM profesor a, coelgio b
									WHERE a.rbd = b.rbd
									ORDER BY a.rbd ASC		    ");
	$consulta->execute();
				
	return $consulta;
    }
    
/*
 *Funci�n 	: Dir
 *Detalle	: funci�n consulta la info de la cuenta del director.
 *Par�metros: ().
 */
    public function Dir(){
	$consulta = $this->db->prepare("SELECT a.nombre_dir, a.apellido_dir, a.email_dir, a.fecha_ingreso, a.cuenta, b.nombre_colegio
									FROM director a, colegio b
									WHERE a.rbd = b.rbd
									ORDER BY a.rbd ASC");
	$consulta->execute();
				
	return $consulta;
    }

/*
 *Funci�n 	: Sys
 *Detalle	: funci�n consulta el info de de eventos/log para el timeline.
 *Par�metros: ().
 */
    public function Sys(){
	$consulta = $this->db->prepare("SELECT tipo, titulo, cuerpo, evento_fecha, evento hora, ip
									FROM `timeline` 
									ORDER BY evento_fecha DESC, evento_hora DESC");
	$consulta->execute();
				
	return $consulta;
    }

}
