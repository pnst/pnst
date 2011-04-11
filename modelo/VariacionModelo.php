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

class VariacionModelo extends ModeloBase
{

/*
 *Función 	: prbaAnt_eqA
 *Detalle	:  función consulta el id y formato de prueba filtrando por 
 *			el mismo año de la fecha.
 *Parámetros: $fecha, $id_curso.
 */
public function prbaAnt_eqA($fecha,$id_curso){
    //realiza consulta de todos los items
    $consulta = $this->db->prepare("SELECT id_prueba, formato_prba
									FROM prueba
									WHERE id_curso = '$id_curso'
									AND fecha_prba < '$fecha'
									AND YEAR(fecha_prba) = YEAR('$fecha')
									ORDER BY fecha_prba ASC");

    $consulta->execute();

    return $consulta;
}
/*
 * Función 	: prbaAnt_anA
 * Detalle	:  función consulta id de pruebas anteriores en función al 
 * 			año y el id del curso.
 * Parámetros: $fecha, $id_curso.
 */ 
public function prbaAnt_antA($fecha,$id_curso){
    //realiza consulta de todos los items
    $consulta = $this->db->prepare("SELECT id_prueba
									FROM prueba
									WHERE id_curso = '$id_curso'
									AND fecha_prba < '$fecha'
									AND YEAR(fecha_prba) = YEAR('$fecha')");

    $consulta->execute();

    return $consulta;
}

/*
 * Función 	: fechaPrba
 * Detalle	:  función consulta fecha de prueba según id de prueba
 * Parámetros: $id_prueba.
 */
public function fechaPrba($id_prueba){
    //realiza consulta de todos los items
    $consulta = $this->db->prepare("SELECT fecha_prba
									FROM prueba
									WHERE id_prueba = '$id_prueba'");

    $consulta->execute();

    return $consulta;
}

/*
 * Función 	: cursoPrba
 * Detalle	: función consulta id del curso según la asociación de 
 * 			id de prueba(id único)
 * Parámetros: $id_prueba.
 */
public function cursoPrba($id_prueba){
    //realiza consulta de todos los items
    $consulta = $this->db->prepare("SELECT id_curso
									FROM prueba
									WHERE id_prueba = '$id_prueba'");

    $consulta->execute();

    return $consulta;
}

/*
 * Función 	: puntajeZAnterior
 * Detalle	: función consulta puntaje Z de la prueba anterior
 * Parámetros: $iprA, $id_alumno.
 */
public function puntajeZAnterior($iprA, $id_alumno){
    //realiza consulta de todos los items
    $consulta = $this->db->prepare("SELECT puntaje_z
									FROM resultados
									WHERE id_alumno = '$id_curso'
									AND id_prueba = '$iprA'");

    $consulta->execute();

    return $consulta;
}

/*
 * Función 	: puntajeTAnterior
 * Detalle	: función consulta puntaje T de la prueba anterior
 * Parámetros: $iprA, $id_alumno.
 */  
public function puntajeTAnterior($iprA, $id_alumno){
    //realiza consulta de todos los items
    $consulta = $this->db->prepare("SELECT puntaje_t
									FROM resultados
									WHERE id_alumno = '$id_curso'
									AND id_prueba = '$iprA'");

    $consulta->execute();

    return $consulta;
}

/*
 * Función 	: puntajePAnterior
 * Detalle	: función consulta percentil de la prueba anterior
 * Parámetros: $iprA, $id_alumno.
 */ 
public function puntajePAnterior($iprA, $id_alumno){
    //realiza consulta de todos los items
    $consulta = $this->db->prepare("SELECT percentil
									FROM resultados
									WHERE id_alumno = '$id_curso'
									AND id_prueba = '$iprA'");

    $consulta->execute();

    return $consulta;
}

/*
 * Función 	: puntajeAnterior
 * Detalle	: función consulta puntaje de la prueba anterior
 * Parámetros: $iprA, $id_alumno.
 */ 
public function puntajeAnterior($iprA, $id_alumno){
    $consulta = $this->db->prepare("SELECT puntaje
									FROM resultados
									WHERE id_alumno = '$id_curso'
									AND id_prueba = '$iprA'");

    $consulta->execute();

    return $consulta;
}
/*
 * Función 	: set_variacion
 * Detalle	: función de inserción de variaciones de puntajes 
 * 			(puntaje Actual - puntaje Anterior).
 * Parámetros: $id_prueba, $id_alumno, $difZ, $difT, $difP, $difPT.
 */
public function set_variacion($id_prueba, $id_alumno, $difZ, $difT, $difP, $difPT ){
    $consulta = $this->db->prepare("INSERT INTO variacion(id_prueba, id_alumno, DIFZ, DIFT, DIFP, DIFPT)
									VALUES('$id_prueba', '$id_alumno', '$difZ', '$difT', '$difP', '$difPT' )");

    $consulta->execute();

    return $consulta;
}


}