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




}
