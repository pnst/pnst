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

class resultadosModelo extends ModeloBase
{
/*
 * Función set_resultados, agrega resultados de la prueba
 */
	public function set_resultados($ptje, $percentil, $ptje_z, $ptje_t, $id_alumno, $id_prueba){
	$consulta = $this->db->prepare("INSERT INTO resultados(id_prueba, puntaje, puntaje_z, percentil, puntaje_t, id_alumno)  
	    							VALUES('$id_prueba', '$ptje' , '$ptje_z', '$percentil', '$ptje_t', '$id_alumno')");
	$consulta->execute();
	return $consulta;
    }
    
/*
 * Función agrega resultados de la pregunta 1, prueba 2 en formato A
 */
    public function set_resultados_2a1($id_prueba,$id_alumno,$respuesta_2a10, $respuesta_2a11,$respuesta_2a12, $respuesta_2a13,$respuesta_2a14, $respuesta_2a15,$respuesta_2a16, $respuesta_2a17){
	$consulta = $this->db->prepare("INSERT INTO resultados_2a1(id_prueba, id_alumno, 2a1_0,2a1_1,2a1_2,2a1_3,2a1_4,2a1_5,2a1_6,2a1_7)  
	    							VALUES('$id_prueba','$id_alumno','$respuesta_2a10', '$respuesta_2a11','$respuesta_2a12', '$respuesta_2a13','$respuesta_2a14','$respuesta_2a15','$respuesta_2a16', '$respuesta_2a17')");
	$consulta->execute();
	return $consulta;
    }
/*
 * Función agrega resultados de la pregunta 2, prueba 2 en formato A
 */  
  public function set_resultados_2a2($id_prueba,$id_alumno,$respuesta_2a20, $respuesta_2a21,$respuesta_2a22, $respuesta_2a23,$respuesta_2a24, $respuesta_2a25,$respuesta_2a26, $respuesta_2a27){
	$consulta = $this->db->prepare("INSERT INTO resultados_2a2(id_prueba, id_alumno, 2a2_0,2a2_1,2a2_2,2a2_3,2a2_4,2a2_5,2a2_6, 2a2_7)  
	    							VALUES('$id_prueba','$id_alumno','$respuesta_2a20', '$respuesta_2a21','$respuesta_2a22', '$respuesta_2a23','$respuesta_2a24','$respuesta_2a25','$respuesta_2a26', '$respuesta_2a27')");
	$consulta->execute();
	return $consulta;
  }
/*
 * Función agrega resultados de la pregunta 3, prueba 2 en formato A
 */ 
  public function set_resultados_2a3($id_prueba,$id_alumno,$respuesta_2a30, $respuesta_2a31,$respuesta_2a32, $respuesta_2a33,$respuesta_2a34, $respuesta_2a35,$respuesta_2a36, $respuesta_2a37){
	$consulta = $this->db->prepare("INSERT INTO resultados_2a3(id_prueba, id_alumno, 2a3_0,2a3_1,2a3_2,2a3_3,2a3_4,2a3_5,2a3_6,2a3_7)  
	    							VALUES('$id_prueba','$id_alumno','$respuesta_2a30', '$respuesta_2a31','$respuesta_2a32', '$respuesta_2a33','$respuesta_2a34','$respuesta_2a35','$respuesta_2a36', '$respuesta_2a37')");
	$consulta->execute();
	return $consulta;
    }
/*
 * Función agrega resultados de la pregunta 4, prueba 2 en formato A
 */ 
  public function set_resultados_2a4($id_prueba,$id_alumno,$respuesta_2a40, $respuesta_2a41,$respuesta_2a42, $respuesta_2a43,$respuesta_2a44, $respuesta_2a45,$respuesta_2a46, $respuesta_2a47){
	$consulta = $this->db->prepare("INSERT INTO resultados_2a4(id_prueba, id_alumno, 2a4_0,2a4_1,2a4_2,2a4_3,2a4_4,2a4_5,2a4_6,2a4_7)  
	    							VALUES('$id_prueba','$id_alumno','$respuesta_2a40', '$respuesta_2a41','$respuesta_2a42', '$respuesta_2a43','$respuesta_2a44','$respuesta_2a45','$respuesta_2a46', '$respuesta_2a47')");
	$consulta->execute();
	return $consulta;
    }

}
