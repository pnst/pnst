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
//* ************************* */

class AlumnoModelo extends ModeloBase
{

/*
 * Función 	: get_curso_almn
 * Detalle	: función consulta el id y el curso del profesor en función
 *  		al id del mismo.
 * Parámetros: $id_profesor.
 */ 
    public function get_curso_almn($id_profesor){
	$consulta = $this->db->prepare("SELECT B.id_curso, B.nivel_curso, B.letra_curso
									FROM profesor A, curso B
									WHERE A.id_profesor = B.id_profesor
									AND A.id_profesor = '$id_profesor'");
	$consulta->execute();
	return $consulta;
    }




}
?>