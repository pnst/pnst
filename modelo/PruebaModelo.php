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

class pruebaModelo extends ModeloBase
{
/*
 * Función set_registro agrega prueba al sistema
 */
    public function set_registro($id_curso, $formato, $fecha, $codigo, $id_profesor, $estado, $nivel){
	$consulta = $this->db->prepare("INSERT INTO prueba(id_profesor, id_curso, id_asignatura, formato_prba, fecha_prba, codigo_prba, estado_prba, nivel)
									VALUES('$id_profesor', '$id_curso', '1', '$formato', '$fecha', '$codigo', '$estado', '$nivel')");
	$consulta->execute();
	return $consulta;
    }
/*
 * Función nivelPrba consulta nivel, si el curso es el '4C' retorna el '4' que es el nivel
 */    
    public function nivelPrba($id_curso){
	$consulta = $this->db->prepare("SELECT nivel_curso
									FROM curso
									WHERE id_curso  = '$id_curso'");
	$consulta->execute();
	return $consulta;
     }
/*
 * Función get_lista_prba consulta info de prueba según año
 */ 
    public function get_lista_prba($id_profesor, $fecha){
	$consulta = $this->db->prepare("SELECT A.id_prueba, A.formato_prba, A.fecha_prba, A.codigo_prba, A.estado_prba, D.asignatura, C.nivel_curso, C.letra_curso
									FROM prueba A, curso C, asignatura D
									WHERE A.id_profesor = '$id_profesor'
									AND C.id_profesor = '$id_profesor'
									AND A.id_asignatura = D.id_asignatura
									AND A.id_curso = C.id_curso
									AND YEAR(fecha_prba) = YEAR('$fecha')");

	$consulta->execute();
	return $consulta;
   }

/*
 * Función cantPrba consulta la cantidad de pruebas que tiene el usuario y que formato tiene
 */   
    public function cantPrba_anual($id, $fecha){
    $consulta = $this->db->prepare("SELECT formato_prba, fecha_prba
									FROM prueba
									WHERE id_curso = '$id'
									AND YEAR( fecha_prba ) = YEAR( '$fecha' )");
	$consulta->execute();
	return $consulta;
    }

/*
 * Función actualiza_registro, actualiza campo en la tabla de prueba
 */
    public function actualiza_registro($id_prba, $campo, $value){
	$consulta = $this->db->prepare("UPDATE prueba SET $campo = '$value' WHERE id_prueba = '$id_prba'");
	$consulta->execute();
	return $consulta;
    }
/*
 * Función eliminar_prba, elimina prueba
 */
    public function eliminar_prba($id){
	$consulta = $this->db->prepare("DELETE FROM prueba WHERE id_prueba = '$id' LIMIT 1");
	$consulta->execute();
	return $consulta;
    }
/*
 * Función get_cursos_prof, consulta las pruebas del profesor
 */
    public function get_cursos_prof($id_profesor){
    $consulta = $this->db->prepare("SELECT B.id_curso, B.nivel_curso, B.letra_curso
								    FROM profesor A, curso B
								    WHERE A.id_profesor = B.id_profesor
								    AND A.id_profesor = '$id_profesor'");

		$consulta->execute();
		return ($consulta);
    }
/*
 * Función get_info_prba, consulta las pruebas del profesor
 */
    public function get_info_prba($id_prba){
	$consulta = $this->db->prepare("SELECT A.id_prueba, A.id_curso, A.formato_prba, A.codigo_prba, B.nivel_curso, B.letra_curso, C.nombre_colegio, D.asignatura, E.nombre_prof, E.apellido_prof
									FROM prueba A, curso B, colegio C, asignatura D, profesor E
			        				WHERE B.id_curso = A.id_curso
			        				AND C.rbd = B.rbd
			        				AND A.id_asignatura = D.id_asignatura
			         				AND A.id_prueba = '$id_prba'
			         				AND B.id_profesor = E.id_profesor");
    
	$consulta->execute();	
	return ($consulta);
    }

/*
 * función info_alumno, consulta nombre y apellido de alumnos
 */
    public function info_alumno($id_alumno){
	$consulta = $this->db->prepare("SELECT nombre1_alumn, apellido1_alumn
									FROM alumnO
		    						WHERE id_alumnO = '$id_alumno'");

	$consulta->execute();
	return ($consulta);
    }

/*
 * Función cambiaestado, actualiza el campo estado de la tabla prueba a 'Cerrado'
 */
    public function cambiaestado_prba($id){
	$consulta = $this->db->prepare("UPDATE prueba SET estado_prba = 'Cerrado' WHERE id_prueba = '$id'");
	$consulta->execute();
	return $consulta;
    }
   
}
