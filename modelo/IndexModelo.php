<?php
class IndexModelo extends ModeloBase
{
	public function listadoPruebas($fecha_hoy)
	{
	    //realizamos la consulta de todos los items
	    $consulta = $this->db->prepare("SELECT A.ID_PRUEBA, A.ID_CURSO, A.FECHA_PRBA, A.FORMATO_PRBA, A.CODIGO_PRBA, B.NIVEL_CURSO, B.LETRA_CURSO, C.NOMBRE_COLEGIO, D.ASIGNATURA, A.ESTADO_PRBA
					    FROM PRUEBA A, CURSO B, COLEGIO C, ASIGNATURA D
					    WHERE B.ID_CURSO = A.ID_CURSO
					    AND A.FECHA_PRBA = '$fecha_hoy'
					    AND C.RBD = B.RBD
					   AND A.ID_ASIGNATURA = D.ID_ASIGNATURA");
		$consulta->execute();
		//devolvemos la coleccion para que la vista la presente.
		return $consulta;
	}
	
	
}
?>
