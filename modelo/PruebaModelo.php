<?php
class PruebaModelo extends ModeloBase
{
    public function set_registro($id_curso, $formato, $fecha, $codigo, $id_profesor, $estado, $nivel){
	    $consulta = $this->db->prepare("INSERT INTO PRUEBA(ID_PROFESOR, ID_CURSO, ID_ASIGNATURA, FORMATO_PRBA, FECHA_PRBA, CODIGO_PRBA, ESTADO_PRBA, NIVEL)
		VALUES('$id_profesor', '$id_curso', '1', '$formato', '$fecha', '$codigo', '$estado', '$nivel')");
		$consulta->execute();
		return $consulta;
    }
    
    public function nivelPrba($id_curso){
	$consulta = $this->db->prepare("SELECT NIVEL_CURSO
					FROM CURSO
					WHERE ID_CURSO  = '$id_curso'");
	$consulta->execute();
	return $consulta;
      
    }
   

    public function get_lista_prba($id_profesor, $fecha){
	$consulta = $this->db->prepare("SELECT A.ID_PRUEBA, A.FORMATO_PRBA, A.FECHA_PRBA, A.CODIGO_PRBA, A.ESTADO_PRBA, D.ASIGNATURA, C.NIVEL_CURSO, C.LETRA_CURSO
	FROM PRUEBA A, CURSO C, ASIGNATURA D
	WHERE A.ID_PROFESOR = '$id_profesor'
	AND C.ID_PROFESOR = '$id_profesor'
	AND A.ID_ASIGNATURA = D.ID_ASIGNATURA
	AND A.ID_CURSO = C.ID_CURSO
	AND YEAR(FECHA_PRBA) = YEAR('$fecha')");

	$consulta->execute();
	return $consulta;
	
    }

    /** SABER QUE CANTIDAD DE PRUEBAS TIENE Y QUE FORMATOS **/

    public function cantPrba_anual($id, $fecha){
    	$consulta = $this->db->prepare("SELECT FORMATO_PRBA, FECHA_PRBA
					FROM PRUEBA
					WHERE ID_CURSO = '$id'
					AND YEAR( FECHA_PRBA ) = YEAR( '$fecha' )");
	$consulta->execute();
	return $consulta;

    
    }

    public function actualiza_registro($id_prba, $campo, $value){
	$consulta = $this->db->prepare("UPDATE PRUEBA SET $campo = '$value' WHERE ID_PRUEBA = '$id_prba'");
	$consulta->execute();
	return $consulta;
    }

    public function eliminar_prba($id){
	$consulta = $this->db->prepare("DELETE FROM PRUEBA WHERE ID_PRUEBA = '$id' LIMIT 1");
	    $consulta->execute();
	    return $consulta;
    }

    public function get_cursos_prof($id_profesor){
    //realizamos la consulta de todos los items
    $consulta = $this->db->prepare("SELECT B.ID_CURSO, B.NIVEL_CURSO, B.LETRA_CURSO
				    FROM PROFESOR A, CURSO B
				    WHERE A.ID_PROFESOR = B.ID_PROFESOR
				    AND A.ID_PROFESOR = '$id_profesor'");

		$consulta->execute();
		//devolvemos la coleccion para que la vista la presente.
		return ($consulta);
    }

    public function get_info_prba($id_prba){
	$consulta = $this->db->prepare("SELECT A.ID_PRUEBA, A.ID_CURSO, A.FORMATO_PRBA, A.CODIGO_PRBA, B.NIVEL_CURSO, B.LETRA_CURSO, C.NOMBRE_COLEGIO, D.ASIGNATURA, E.NOMBRE_PROF, E.APELLIDO_PROF
					FROM PRUEBA A, CURSO B, COLEGIO C, ASIGNATURA D, PROFESOR E
        				WHERE B.ID_CURSO = A.ID_CURSO
        				AND C.RBD = B.RBD
        				AND A.ID_ASIGNATURA = D.ID_ASIGNATURA
         				AND A.ID_PRUEBA = '$id_prba'
         				AND B.ID_PROFESOR = E.ID_PROFESOR");
    
	$consulta->execute();	
	return ($consulta);
    }

    public function info_alumno($id_alumno){
	$consulta = $this->db->prepare("SELECT NOMBRE1_ALUMN, APELLIDO1_ALUMN
					FROM ALUMNO
		    			WHERE ID_ALUMNO = '$id_alumno'");

	$consulta->execute();
	    
    	return ($consulta);
    }

    public function cambiaEstado_prba($id){
	$consulta = $this->db->prepare("UPDATE PRUEBA SET ESTADO_PRBA = 'Cerrado' WHERE ID_PRUEBA = '$id'");
	    
	$consulta->execute();
		
	return $consulta;
	
    }
   
}
