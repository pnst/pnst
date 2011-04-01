<?php
class ProfesorModelo extends ModeloBase
{
    public function get_prof_director($rbd){
		//realiza consulta de todos los items
		$consulta = $this->db->prepare("SELECT C.ID_PROFESOR, C.NOMBRE_PROF, C.APELLIDO_PROF, C.EMAIL_PROF
								FROM DIRECTOR A,  PROFESOR C
								WHERE A.RBD = '$rbd'
								AND C.RBD = A.RBD");

		$consulta->execute();

		return $consulta;
    }

    public function perfil_prof($id_prof){
		//realiza consulta de todos los items
		$consulta = $this->db->prepare("SELECT NOMBRE_PROF, APELLIDO_PROF, EMAIL_PROF
						FROM PROFESOR
						WHERE ID_PROFESOR ='$id_prof'");

		$consulta->execute();

		return $consulta;
    }

    public function update_nom($id_prof,$nom){
		//realiza consulta de todos los items
		$consulta = $this->db->prepare("UPDATE PROFESOR SET NOMBRE_PROF = '$nom' 
					WHERE ID_PROFESOR = '$id_prof'");

		$consulta->execute();

		return $consulta;
    }

    public function update_ape($id_prof,$ape){
		//realiza consulta de todos los items
		$consulta = $this->db->prepare("UPDATE PROFESOR SET APELLIDO_PROF = '$ape' 
					WHERE ID_PROFESOR = '$id_prof'");

		$consulta->execute();

		return $consulta;
    }

    public function update_email($id_prof,$email){
		//realiza consulta de todos los items
		$consulta = $this->db->prepare("UPDATE PROFESOR SET EMAIL_PROF = '$email' 
					WHERE ID_PROFESOR = '$id_prof'");

		$consulta->execute();

		return $consulta;
    }

    public function perfil_dir($id_prof){
		//realiza consulta de todos los items
		$consulta = $this->db->prepare("SELECT NOMBRE_DIR, APELLIDO_DIR, EMAIL_DIR
						FROM DIRECTOR
						WHERE ID_DIR ='$id_prof'");

		$consulta->execute();

		return $consulta;
    }

    public function update_dirnom($id_prof,$nom){
		//realiza consulta de todos los items
		$consulta = $this->db->prepare("UPDATE DIRECTOR SET NOMBRE_DIR = '$nom' 
					WHERE ID_DIR = '$id_prof'");

		$consulta->execute();

		return $consulta;
    }

    public function update_dirape($id_prof,$ape){
		//realiza consulta de todos los items
		$consulta = $this->db->prepare("UPDATE DIRECTOR SET APELLIDO_DIR = '$ape' 
					WHERE ID_DIR = '$id_prof'");

		$consulta->execute();

		return $consulta;
    }

    public function update_diremail($id_prof,$email){
		//realiza consulta de todos los items
		$consulta = $this->db->prepare("UPDATE DIRECTOR SET EMAIL_DIR = '$email' 
					WHERE ID_DIR = '$id_prof'");

		$consulta->execute();

		return $consulta;
    }









    public function get_curso_dir($rbd){
    $consulta = $this->db->prepare("SELECT C.ID_CURSO, C.NIVEL_CURSO, C.LETRA_CURSO
								FROM DIRECTOR A,  CURSO C
								WHERE A.RBD = '$rbd'
								AND C.RBD = A.RBD");
    $consulta->execute();

    return $consulta;
    
    }
    //inserta profesor a la base de datos
    public function inserta_profesor($apellido, $nombre, $email, $rbd){
    $consulta = $this->db->prepare("INSERT INTO PROFESOR(RBD, NOMBRE_PROF, APELLIDO_PROF, EMAIL_PROF, PASSW_PROF, ANIO)
				    VALUE('$rbd', '$nombre', '$apellido', '$email', '123456', '2010') ");

    $consulta->execute();

    return $consulta;
    }

    public function get_lista_profesor($id_curso){
    //realiza consulta de profesro segun id_curso
    $consulta = $this->db->prepare("SELECT C.ID_PROFESOR, C.NOMBRE_PROF, C.APELLIDO_PROF, C.EMAIL_PROF
				    FROM CURSO A,  PROFESOR C
				    WHERE A.ID_CURSO= '$id_curso'
				    AND C.ID_PROFESOR = A.ID_PROFESOR");
    $consulta->execute();

    return $consulta;
    }
    //trae el id del profesor
    public function id_profesor($email_profesor){
    $consulta = $this->db->prepare("SELECT A.ID_PROFESOR
				    FROM PROFESOR A
				    WHERE A.EMAIL_PROF = '$email_profesor'");

    $consulta->execute();
    
    print_r($consulta);

    return $consulta;
    }

    public function actualiza_curso($id_prof, $id_curso){
	$consulta = $this->db->prepare("UPDATE CURSO SET ID_PROFESOR = '$id_prof' 
					WHERE ID_CURSO = '$id_curso'");

	$consulta->execute();

	return	$consulta;
    
    }

    public function eliminar_profesor($id_profesor){
	$consulta = $this->db->prepare("DELETE FROM PROFESOR WHERE ID_PROFESOR = '$id_profesor' LIMIT 1");

	$consulta->execute();

	return $consulta;
    
    }
    public function exp_prueba($id_profesor, $fecha){
        $consulta = $this->db->prepare("SELECT C.ID_PRUEBA, B.NIVEL_CURSO, B.LETRA_CURSO, C.FECHA_PRBA
                                    FROM PROFESOR A, CURSO B, PRUEBA C
                                    WHERE A.ID_PROFESOR = B.ID_PROFESOR
                                    AND A.ID_PROFESOR = '$id_profesor'
                                    AND A.ID_PROFESOR = C.ID_PROFESOR
                                    AND B.ID_CURSO = C.ID_CURSO
                                    AND WEEK('$fecha') = WEEK(C.FECHA_PRBA)
                                    ORDER BY B.NIVEL_CURSO ASC,B.LETRA_CURSO ASC, C.FECHA_PRBA ASC;");

        $consulta->execute();

        return $consulta;

    }

   public function rindieronPrba($id_prba){
        $consulta = $this->db->prepare("SELECT C.*
                                        FROM PRUEBA A, CURSO B, ALUMNO C
                                        WHERE A.ID_PRUEBA = '$id_prba'
                                        AND B.ID_CURSO = A.ID_CURSO
                                        AND C.ID_CURSO = A.ID_CURSO
                                        AND C.ID_CURSO = B.ID_CURSO
                                        ORDER BY C.APELLIDO1_ALUMN ASC, C.APELLIDO2_ALUMN ASC, C.NOMBRE1_ALUMN ASC, C.NOMBRE2_ALUMN ASC");

        $consulta->execute();

        return $consulta;

    }

   public function resetRinde($id_alumno){
        $consulta = $this->db->prepare("UPDATE ALUMNO SET RINDE = 'no' WHERE ID_ALUMNO = '$id_alumno'");

        $consulta->execute();

        return $consulta;

   }

  public function resetTermino($id_alumno){
        $consulta = $this->db->prepare("UPDATE ALUMNO SET TERMINO_PRBA = 'no' WHERE ID_ALUMNO = '$id_alumno'");

        $consulta->execute();

        return $consulta;

    }



}
