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
class AlumnoModelo extends ModeloBase
{
/*
 *Funci�n 	: get_curso_almn
 *Detalle	: funci�n consulta curso del profesor.
 *Par�metros: $id_profesor.
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
 *Funci�n 	: get_lista_almn
 *Detalle	: funci�n consulta lista de alumno para rendir prueba.
 *Par�metros: $id_curso.
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
 *Funci�n 	: eliminar_alumno
 *Detalle	: funci�n elimina alumno.
 *Par�metros: $id_alumno.
 */ 	
    public function eliminar_alumno($id_alumno){
	$consulta = $this->db->prepare("DELETE FROM alumno WHERE id_alumno = '$id_alumno' LIMIT 1");

	$consulta->execute();
	return $consulta;
    }
    
/*
 *Funci�n 	: inserta_alumno
 *Detalle	: funci�n agrega alumno.
 *Par�metros: $nombre1, $nombre2, $apellido1, $apellido2, $id_curso,$rut.
 */ 
    public function insertar_alumno($nombre1, $nombre2, $apellido1, $apellido2, $id_curso,$rut){
	$consulta = $this->db->prepare("INSERT INTO alumno(id_curso, nombre1_alumn,nombre2_alumn, apellido1_alumn, apellido2_alumn, rut) 
									VALUES('$id_curso', '$nombre1', '$nombre2', '$apellido1', '$apellido2', '$rut')");

	$consulta->execute();
	return $consulta;
    }

/*
 *Funci�n 	: actualiza_registro
 *Detalle	: funci�n actualiza campo(desde Jeip).
 *Par�metros: $id_alumno, $campo, $value.
 */ 
    public function actualiza_registro($id_alumno, $campo, $value){
	$consulta = $this->db->prepare("UPDATE alumno SET $campo = '$value' WHERE id_alumno = '$id_alumno'");
	
	$consulta->execute();
	return $consulta;
    }

/*
 *Funci�n 	: listado_almn_prba
 *Detalle	:  funci�n consulta lista de alumno para rendir prueba.
 *Par�metros: $id_curso.
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
 *Funci�n 	: rindiendoPrba
 *Detalle	: funci�n actualiza campo rinde 'si'.
 *Par�metros: $id_alumno.
 */ 
    public function rindiendoPrba($id_alumno){
	$consulta = $this->db->prepare("UPDATE alumno SET rinde = 'si' WHERE id_alumno = '$id_alumno'");

	$consulta->execute();
	return $consulta;
    }

/*
 *Funci�n 	: terminaPrba
 *Detalle	: funci�n actualiza campo rinde 'no'.
 *Par�metros: $id_alumno.
 */ 
    public function terminaPrba($id_alumno){
	$consulta = $this->db->prepare("UPDATE alumno SET rinde = 'no' WHERE id_alumno = '$id_alumno'");

	$consulta->execute();
	return $consulta;
    }
}
