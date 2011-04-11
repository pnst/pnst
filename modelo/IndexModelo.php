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
class IndexModelo extends ModeloBase
{
/*
 *Función 	: listadoPruebas
 *Detalle	: función consulta pruebas para el día de hoy.
 *Parámetros: $fecha_hoy.
 */
	public function listadoPruebas($fecha_hoy){
	    $consulta = $this->db->prepare("SELECT a.id_prueba, a.id_curso, a.fecha_prba, a.formato_prba, a.codigo_prba, b.nivel_curso, b.letra_curso, c.nombre_colegio, d.asignatura, a.estado_prba
					    				FROM prueba a, curso b, colegio c, asignatura d
					    				WHERE b.id_curso = a.id_curso
					    				AND a.fecha_prba = '$fecha_hoy'
					    				AND c.rbd = b.rbd 
					   					AND a.id_asignatura =d.id_asignatura");
		$consulta->execute();
		return $consulta;
	}
	
	
}
?>
