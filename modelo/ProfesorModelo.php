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
class ProfesorModelo extends ModeloBase
{
	/*
	 * Función		: get_prof_director
	 * Descripción	: consulta cuenta profesor(para el director)
	 * Parámetros	: $rbd
	 */
    public function get_prof_director($rbd){
		$consulta = $this->db->prepare("SELECT C.id_profesor, C.nombre_prof, C.apellido_prof, C.email_prof
										FROM director A,  profesor C
										WHERE A.rbd = '$rbd'
										AND C.rbd = A.rbd");
		$consulta->execute();
		return $consulta;
    }
    
	/*
	 * Función		: perfil_prof
	 * Descripción	: consulta info cuenta profesor del perfil
	 * Parámetros	: $id_prof
	 */
    public function perfil_prof($id_prof){
		$consulta = $this->db->prepare("SELECT nombre_prof, apellido_prof, email_prof
										FROM profesor
										WHERE id_profesor ='$id_prof'");
		$consulta->execute();
		return $consulta;
    }
    
	/*
	 * Función		: update_nom
	 * Descripción	: actualiza  nombre profesor del perfil
	 * Parámetros	: $id_prof,$nom
	 */
    public function update_nom($id_prof,$nom){
		$consulta = $this->db->prepare("UPDATE profesor SET nombre_prof = '$nom' 
										WHERE id_profesor = '$id_prof'");
		$consulta->execute();
		return $consulta;
    }
    
	/*
	 * Función		: update_ape
	 * Descripción	: actualiza  apellido profesor del perfil
	 * Parámetros	: $id_prof,$ape
	 */
    public function update_ape($id_prof,$ape){
		$consulta = $this->db->prepare("UPDATE profesor SET apellido_prof = '$ape' 
										WHERE id_profesor = '$id_prof'");
		$consulta->execute();
		return $consulta;
    }
    
	/*
	 * Función		: update_email
	 * Descripción	: actualiza  email profesor del perfil
	 * Parámetros	: $id_prof,$email
	 */
    public function update_email($id_prof,$email){
		$consulta = $this->db->prepare("UPDATE profesor SET email_prof = '$email' 
										WHERE id_profesor = '$id_prof'");
		$consulta->execute();
		return $consulta;
    }
    
	/*
	 * Función		: perfil_dir
	 * Descripción	: consulta cuenta director
	 * Parámetros	: $id_prof
	 */
    public function perfil_dir($id_prof){
		$consulta = $this->db->prepare("SELECT nombre_dir, apellido_dir, email_dir
										FROM director
										WHERE id_dir ='$id_prof'");
		$consulta->execute();
		return $consulta;
    }
    
	/*
	 * Función		: update_dirnom
	 * Descripción	: actualiza  nombre director del perfil
	 * Parámetros	: $id_prof, $nom
	 */
    public function update_dirnom($id_prof,$nom){
		//realiza consulta de todos los items
		$consulta = $this->db->prepare("UPDATE director SET nombre_dir = '$nom' 
										WHERE id_dir = '$id_prof'");
		$consulta->execute();
		return $consulta;
    }
   
	/*
	 * Función		: update_dirape
	 * Descripción	: actualiza  apellido director del perfil
	 * Parámetros	: $id_prof, $ape
	 */
    public function update_dirape($id_prof,$ape){
		//realiza consulta de todos los items
		$consulta = $this->db->prepare("UPDATE director SET apellido_dir = '$ape' 
										WHERE id_dir = '$id_prof'");
		$consulta->execute();
		return $consulta;
    }
   
	/*
	 * Función		: update_dirmail
	 * Descripción	: actualiza mail director del perfil
	 * Parámetros	: $id_prof, $email
	 */
    public function update_diremail($id_prof,$email){
		//realiza consulta de todos los items
		$consulta = $this->db->prepare("UPDATE director SET email_dir = '$email' 
										WHERE id_dir = '$id_prof'");
		$consulta->execute();
		return $consulta;
    }
   
	/*
	 * Función		: get_curso_dir
	 * Descripción	: consulta los cursos a pertenecientes al mismo colegio
	 * Parámetros	: $rbd
	 */
    public function get_curso_dir($rbd){
    $consulta = $this->db->prepare("SELECT C.id_curso, C.nivel_curso, C.letra_curso
									FROM director A,  curso C
									WHERE A.rbd = '$rbd'
									AND C.rbd = A.rbd");
    $consulta->execute();
    return $consulta;
    }
    
    //inserta profesor a la base de datos
    public function inserta_profesor($apellido, $nombre, $email, $rbd){
    $consulta = $this->db->prepare("INSERT INTO profesor(rbd, nombre_prof, apellido_prof, email_prof, passw_prof, anio)
				    VALUE('$rbd', '$nombre', '$apellido', '$email', '123456', '2010') ");
    $consulta->execute();
    return $consulta;
    }

    public function get_lista_profesor($id_curso){
    //realiza consulta de profesro segun id_curso
    $consulta = $this->db->prepare("SELECT C.id_profesor, C.nombre_prof, C.apellido_prof, C.email_prof
								    FROM curso A,  profesor C
								    WHERE A.id_curso= '$id_curso'
								    AND C.id_profesor = A.id_profesor");
    $consulta->execute();
    return $consulta;
    }
    
    //trae el id del profesor
    public function id_profesor($email_profesor){
    $consulta = $this->db->prepare("SELECT A.id_profesor
								    FROM profesor A
								    WHERE A.email_prof = '$email_profesor'");
    $consulta->execute();
    print_r($consulta);
    return $consulta;
    }

    public function actualiza_curso($id_prof, $id_curso){
		$consulta = $this->db->prepare("UPDATE curso SET id_profesor = '$id_prof' 
										WHERE id_curso = '$id_curso'");
		$consulta->execute();
		return	$consulta;
    }

    public function eliminar_profesor($id_profesor){
		$consulta = $this->db->prepare("DELETE FROM profesor WHERE id_profesor = '$id_profesor' LIMIT 1");
		$consulta->execute();
		return $consulta;
     }
   
	/*
	 * Función		: exp_prueba
	 * Descripción	: consulta pruebas por curso y fecha de la semana
	 * Parámetros	: $id_profesor, $fecha
	 */
    public function exp_prueba($id_profesor, $fecha){
        $consulta = $this->db->prepare("SELECT C.id_prueba, B.nivel_curso, B.letra_curso, C.fecha_prba
                                    FROM profesor A, curso B, prueba C
                                    WHERE A.id_profesor = B.id_profesor
                                    AND A.id_profesor = '$id_profesor'
                                    AND A.id_profesor = C.id_profesor
                                    AND B.id_curso = C.id_curso
                                    AND WEEK('$fecha') = WEEK(C.fecha_prba)
                                    ORDER BY B.nivel_curso ASC,B.letra_curso ASC, C.fecha_prba ASC;");
        $consulta->execute();
        return $consulta;
    }
   
	/*
	 * Función		: rindieronPrba
	 * Descripción	: consulta que alumnos dieron la prueba (odenado por prueba)
	 * Parámetros	: $id_prba
	 */
   public function rindieronPrba($id_prba){
        $consulta = $this->db->prepare("SELECT C.*
                                        FROM prueba A, curso B, alumno C
                                        WHERE A.id_prueba = '$id_prba'
                                        AND B.id_curso = A.id_curso
                                        AND C.id_curso = A.id_curso
                                        AND C.id_curso = B.id_curso
                                        ORDER BY C.apellido1_alumn ASC, C.apellido2_alumn ASC, C.nombre1_alumn ASC, C.nombre2_alumn ASC");
        $consulta->execute();
        return $consulta;
    }

    /*
	 * Función		: resetrinde
	 * Descripción	: actualiza el campo rinde a 'no'
	 * Parámetros	: $id_alumno
	 */
   public function resetrinde($id_alumno){
        $consulta = $this->db->prepare("UPDATE alumno SET rinde = 'no' WHERE ID_alumno = '$id_alumno'");
        $consulta->execute();
        return $consulta;
   }
   /*
	 * Función		: resetTermino
	 * Descripción	: actualiza el campo termino_prba a 'no'
	 * Parámetros	: $id_alumno
	 */
  public function resetTermino($id_alumno){
        $consulta = $this->db->prepare("UPDATE alumno SET termino_prba = 'no' WHERE ID_alumno = '$id_alumno'");
        $consulta->execute();
        return $consulta;
    }



}