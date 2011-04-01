<?php
class ResultadosModelo extends ModeloBase
{
    public function set_resultados($ptje, $percentil, $ptje_z, $ptje_t, $id_alumno, $id_prueba){
	$consulta = $this->db->prepare("INSERT INTO RESULTADOS(ID_PRUEBA, PUNTAJE, PUNTAJE_Z, PERCENTIL, PUNTAJE_T, ID_ALUMNO)  
	    VALUES('$id_prueba', '$ptje' , '$ptje_z', '$percentil', '$ptje_t', '$id_alumno')");

	$consulta->execute();
	    
	return $consulta;
    }
    public function set_resultados_2A1($id_prueba,$id_alumno,$respuesta_2A10, $respuesta_2A11,$respuesta_2A12, $respuesta_2A13,$respuesta_2A14, $respuesta_2A15,$respuesta_2A16, $respuesta_2A17){
	$consulta = $this->db->prepare("INSERT INTO RESULTADOS_2A1(ID_PRUEBA, ID_ALUMNO, 2A1_0,2A1_1,2A1_2,2A1_3,2A1_4,2A1_5,2A1_6,2A1_7)  
	    VALUES('$id_prueba','$id_alumno','$respuesta_2A10', '$respuesta_2A11','$respuesta_2A12', '$respuesta_2A13','$respuesta_2A14','$respuesta_2A15','$respuesta_2A16', '$respuesta_2A17')");

	$consulta->execute();
	    
	return $consulta;
    }
  
  public function set_resultados_2A2($id_prueba,$id_alumno,$respuesta_2A20, $respuesta_2A21,$respuesta_2A22, $respuesta_2A23,$respuesta_2A24, $respuesta_2A25,$respuesta_2A26, $respuesta_2A27){
	$consulta = $this->db->prepare("INSERT INTO RESULTADOS_2A2(ID_PRUEBA, ID_ALUMNO, 2A2_0,2A2_1,2A2_2,2A2_3,2A2_4,2A2_5,2A2_6, 2A2_7)  
	    VALUES('$id_prueba','$id_alumno','$respuesta_2A20', '$respuesta_2A21','$respuesta_2A22', '$respuesta_2A23','$respuesta_2A24','$respuesta_2A25','$respuesta_2A26', '$respuesta_2A27')");

	$consulta->execute();
	    
	return $consulta;
  }

  public function set_resultados_2A3($id_prueba,$id_alumno,$respuesta_2A30, $respuesta_2A31,$respuesta_2A32, $respuesta_2A33,$respuesta_2A34, $respuesta_2A35,$respuesta_2A36, $respuesta_2A37){
	$consulta = $this->db->prepare("INSERT INTO RESULTADOS_2A3(ID_PRUEBA, ID_ALUMNO, 2A3_0,2A3_1,2A3_2,2A3_3,2A3_4,2A3_5,2A3_6,2A3_7)  
	    VALUES('$id_prueba','$id_alumno','$respuesta_2A30', '$respuesta_2A31','$respuesta_2A32', '$respuesta_2A33','$respuesta_2A34','$respuesta_2A35','$respuesta_2A36', '$respuesta_2A37')");

	$consulta->execute();
	    
	return $consulta;
    }


  public function set_resultados_2A4($id_prueba,$id_alumno,$respuesta_2A40, $respuesta_2A41,$respuesta_2A42, $respuesta_2A43,$respuesta_2A44, $respuesta_2A45,$respuesta_2A46, $respuesta_2A47){
	$consulta = $this->db->prepare("INSERT INTO RESULTADOS_2A4(ID_PRUEBA, ID_ALUMNO, 2A4_0,2A4_1,2A4_2,2A4_3,2A4_4,2A4_5,2A4_6,2A4_7)  
	    VALUES('$id_prueba','$id_alumno','$respuesta_2A40', '$respuesta_2A41','$respuesta_2A42', '$respuesta_2A43','$respuesta_2A44','$respuesta_2A45','$respuesta_2A46', '$respuesta_2A47')");

	$consulta->execute();
	    
	return $consulta;
    }

}
