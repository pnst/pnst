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
class AlumnoModelo extends ModeloBase
{
/*
 *Función 	: get_curso_almn
 *Detalle	: función consulta curso del profesor.
 *Parámetros: $id_profesor.
 */
    public function get_curso_almn($id_profesor){
	$consulta = $this->db->prepare("SELECT b.id_curso, b.nivel_curso, b.letra_curso 
									FROM profesor a, curso b 
									WHERE a. id_profesor = b.id=profesor 
									AND a.id_profesor = '$id_profesor'");
	$consulta->execute();
	return $consulta;
    }

/*
 *Función 	: get_lista_almn
 *Detalle	: función consulta lista de alumno para rendir prueba.
 *Parámetros: $id_curso.
 */
	public function get_lista_almn($id_curso){
	$consulta = $this->db->prepare("SELECT id_alumno, nombre1_alumn, nombre2_alumn, apellido1_alumn, apellido2_alumn, rinde
									FROM Ccurso a, profesor b, alumno c
									WHERE a.id_curso = '$id_curso'
									AND b.id_profesor = a.id_profesor 
									AND c.id_curso = a.id_curso 
									ORDER BY apellido1_alumm ASC");
	$consulta->execute();
	return $consulta;
 	}
 	
/*
 *Función 	: eliminar_alumno
 *Detalle	: función elimina alumno.
 *Parámetros: $id_alumno.
 */ 	
    public function eliminar_alumno($id_alumno){
	$consulta = $this->db->prepare("DELETE FROM alumno WHERE id_alumno = '$id_alumno' LIMIT 1");

	$consulta->execute();
	return $consulta;
    }
    
/*
 *Función 	: inserta_alumno
 *Detalle	: función agrega alumno.
 *Parámetros: $nombre1, $nombre2, $apellido1, $apellido2, $id_curso,$rut.
 */ 
    public function insertar_alumno($nombre1, $nombre2, $apellido1, $apellido2, $id_curso,$rut){
	$consulta = $this->db->prepare("INSERT INTO alumno(id_curso, nombre1_alumn,nombre2_alumn, apellido1_alumn, apellido2_alumn, rut) 
									VALUES('$id_curso', '$nombre1', '$nombre2', '$apellido1', '$apellido2', '$rut')");

	$consulta->execute();
	return $consulta;
    }

/*
 *Función 	: actualiza_registro
 *Detalle	: función actualiza campo(desde Jeip).
 *Parámetros: $id_alumno, $campo, $value.
 */ 
    public function actualiza_registro($id_alumno, $campo, $value){
	$consulta = $this->db->prepare("UPDATE alumno SET $campo = '$value' WHERE id_alumno = '$id_alumno'");
	
	$consulta->execute();
	return $consulta;
    }

/*
 *Función 	: listado_almn_prba
 *Detalle	:  función consulta lista de alumno para rendir prueba.
 *Parámetros: $id_curso.
 */     
    public function listado_almn_prba($id_curso){
	$consulta = $this->db->prepare("SELECT id_alumno, nombre1_alumn, nombre2_alumn, apellido1_alumn, apellido2_alumn, rinde
									FROM curso a, profesor b, alumno c 
									WHERE a.id_curso = '$id_curso'
									AND b.id_profesor = a.id_profesor 
									AND c.id_curso = a.id_curso
									ORDER BY apellido1_alumn  ASC");
	
	$consulta->execute();
	return $consulta;
    }

/*
 *Función 	: rindiendoPrba
 *Detalle	: función actualiza campo rinde 'si'.
 *Parámetros: $id_alumno.
 */ 
    public function rindiendoPrba($id_alumno){
	$consulta = $this->db->prepare("UPDATE alumno SET rinde = 'si' WHERE id_alumno = '$id_alumno'");

	$consulta->execute();
	return $consulta;
    }

/*
 *Función 	: terminaPrba
 *Detalle	: función actualiza campo rinde 'no'.
 *Parámetros: $id_alumno.
 */ 
    public function terminaPrba($id_alumno){
	$consulta = $this->db->prepare("UPDATE alumno SET rinde = 'no' WHERE id_alumno = '$id_alumno'");

	$consulta->execute();
	return $consulta;
    }
}
