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
class LogModelo extends ModeloBase
{
/* 
 * Función 	: timeline
 * Detalle	: función consulta todos los eventos del sistema trackeados ordenados 
 *			por fecha y hora más recientes. 
 *Parámetros: None.
 */ 
    public function timeline(){
	    $consulta = $this->db->prepare("SELECT * FROM timeline ORDER BY evento_fecha DESC, evento_hora DESC");
		$consulta->execute();
		return $consulta;
    }
/* 
 * Función 	: setTimeline
 * Detalle	: función agrega información importante para posterior rescate. 
 * /Parámetros: $tipo,$titulo,$cuerpo,$fecha,$hora,$ip,$tipo
 */
	public function setTimeline($tipo,$titulo,$cuerpo,$fecha,$hora,$ip,$tipo){
	$consulta = $this->db->prepare("INSERT INTO `timeline` ( `tipo`,`titulo`,`cuerpo`,`evento_fecha`,`evento_hora`,`ip`,`referencia`)
									VALUES('$tipo', '$titulo', '$cuerpo', '$fecha', '$hora', '$ip', '$tipo')");
	$consulta->execute();
	return $consulta;
    }

/*
 * Función 	: setReporteDir
 * Detalle	: función agrega datos de log acciones del profesor.
 * Parámetros: $id_prof,$ref,$fecha,$hora,$detalle
 */
    public function setReporteDir($id_prof,$ref,$fecha,$hora,$detalle){
	$consulta = $this->db->prepare("INSERT INTO `reporte_dir` ( `id_profesor`,`rbd`,`reporte_referencia`,`reporte_fecha`,`reporte_hora`,`reporte_detalle`)
	VALUES ('$id_prof', '$ref', '$fecha', '$hora', '$detalle')");
	$consulta->execute();
	return $consulta;
    }

    
     
 }
