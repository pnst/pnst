<?php
class AlumnoModelo extends ModeloBase
{
    public function get_curso_almn($id_profesor){
	$consulta = $this->db->prepare("SELECT B.ID_CURSO, B.NIVEL_CURSO, B.LETRA_CURSO
					FROM PROFESOR A, CURSO B
					WHERE A.ID_PROFESOR = B.ID_PROFESOR
					AND A.ID_PROFESOR = '$id_profesor'");
	$consulta->execute();
	return $consulta;
    }

 public function get_lista_almn($id_curso){
	$consulta = $this->db->prepare("SELECT ID_ALUMNO, NOMBRE1_ALUMN, NOMBRE2_ALUMN, APELLIDO1_ALUMN, APELLIDO2_ALUMN, RINDE
					FROM CURSO A, PROFESOR B, ALUMNO C
					WHERE A.ID_CURSO = '$id_curso'
					AND B.ID_PROFESOR = A.ID_PROFESOR
					AND C.ID_CURSO = A.ID_CURSO
					ORDER BY APELLIDO1_ALUMN ASC");
	$consulta->execute();
	return $consulta;
 }
    public function eliminar_alumno($id_alumno){
	$consulta = $this->db->prepare("DELETE FROM ALUMNO WHERE ID_ALUMNO = '$id_alumno' LIMIT 1");

	$consulta->execute();

	return $consulta;
    
    }

    public function insertar_alumno($nombre1, $nombre2, $apellido1, $apellido2, $id_curso,$rut){
	$consulta = $this->db->prepare("INSERT INTO ALUMNO (ID_CURSO, NOMBRE1_ALUMN,NOMBRE2_ALUMN, APELLIDO1_ALUMN, APELLIDO2_ALUMN, RUT) VALUES('$id_curso', '$nombre1', '$nombre2', '$apellido1', '$apellido2', '$rut')");

	$consulta->execute();

	return $consulta;
    }

    public function actualiza_registro($id_alumno, $campo, $value){
	    $consulta = $this->db->prepare("UPDATE ALUMNO SET $campo = '$value' WHERE ID_ALUMNO = '$id_alumno'");
	
	    $consulta->execute();

	    return $consulta;
    }
    
    public function listado_almn_prba($id_curso){
	$consulta = $this->db->prepare("SELECT ID_ALUMNO, NOMBRE1_ALUMN, NOMBRE2_ALUMN, APELLIDO1_ALUMN, APELLIDO2_ALUMN, RINDE
					FROM CURSO A, PROFESOR B, ALUMNO C
					WHERE A.ID_CURSO = '$id_curso'
					AND B.ID_PROFESOR = A.ID_PROFESOR
					AND C.ID_CURSO = A.ID_CURSO
					ORDER BY APELLIDO1_ALUMN ASC");
	
	$consulta->execute();

	return $consulta;
    }

    /******************* INDICO SI EL ALUMNO ESTA RINDIENDO LA PRUEBA ******************/
    public function rindiendoPrba($id_alumno){
	$consulta = $this->db->prepare("UPDATE ALUMNO SET RINDE = 'si' WHERE ID_ALUMNO = '$id_alumno'");

	$consulta->execute();

	return $consulta;

    }

    public function terminaPrba($id_alumno){
	$consulta = $this->db->prepare("UPDATE ALUMNO SET RINDE = 'no' WHERE ID_ALUMNO = '$id_alumno'");

	$consulta->execute();

	return $consulta;

    }




    public function filtrar_lista($id_prueba, $id_alumno){
	$consulta = $this->db->prepare("INSERT INTO FILTRO_CURSO_LISTA (ID_PRUEBA, ID_ALUMNO) 
			    VALUES('$id_prueba', '$id_alumno')");

	$consulta->execute();

	return $consulta;

    }
    public function get_lista_filtro($id_prueba){
    
    $consulta = $this->db->prepare("SELECT ID_ALUMNO
					FROM FILTRO_CURSO_LISTA
					WHERE ID_PRUEBA = '$id_prueba'
					ORDER BY ID_ALUMNO ASC");
	
    $consulta->execute();

    return $consulta;	
    
    }
}
