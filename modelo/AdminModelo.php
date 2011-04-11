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
class AdminModelo extends ModeloBase
{
/*
 *Función 	: valida_admin
 *Detalle	: función consulta el email y password del administrador.
 *Parámetros: $a.
 */
    public function valida_admin($a){
	$consulta = $this->db->prepare("SELECT email_admin, passw_admin
									FROM administrador 
									WHERE email_admin = '$a'");
	$consulta->execute();
				
	return $consulta;
    }
    
/*
 *Función 	: Prof
 *Detalle	: función consulta la info de la cuenta del profesor.
 *Parámetros: ().
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
 *Función 	: Dir
 *Detalle	: función consulta la info de la cuenta del director.
 *Parámetros: ().
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
 *Función 	: Sys
 *Detalle	: función consulta el info de de eventos/log para el timeline.
 *Parámetros: ().
 */
    public function Sys(){
	$consulta = $this->db->prepare("SELECT tipo, titulo, cuerpo, evento_fecha, evento hora, ip
									FROM `timeline` 
									ORDER BY evento_fecha DESC, evento_hora DESC");
	$consulta->execute();
				
	return $consulta;
    }

}
