<?php
class InformesModelo extends ModeloBase
{

public function val_datos($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT ID_RESULTADOS FROM RESULTADOS WHERE ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}


public function grafico_informe($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.PUNTAJE_Z, A.PERCENTIL, A.PUNTAJE_T, C.NOMBRE1_ALUMN, C.APELLIDO1_ALUMN, A.PUNTAJE, D.NIVEL_CURSO, D.LETRA_CURSO, B.FORMATO_PRBA, B.FECHA_PRBA
FROM RESULTADOS A, PRUEBA B, ALUMNO C, CURSO D
WHERE A.ID_PRUEBA = '$id_prueba'
AND   A.ID_PRUEBA = B.ID_PRUEBA
AND   B.ID_CURSO = C.ID_CURSO
AND   A.ID_ALUMNO = C.ID_ALUMNO
AND   D.ID_CURSO = C.ID_CURSO
AND  D.ID_CURSO =  B.ID_CURSO
ORDER BY C.APELLIDO1_ALUMN ASC");
    
    $consulta->execute();
	
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_informe1A($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.PUNTAJE_Z, A.PERCENTIL, A.PUNTAJE_T, C.NOMBRE1_ALUMN, C.APELLIDO1_ALUMN, A.PUNTAJE, D.NIVEL_CURSO, D.LETRA_CURSO, B.FORMATO_PRBA, B.FECHA_PRBA, E.1A1_0, E.1A1_1, E.1A1_2, E.1A1_3, E.1A1_4, E.1A1_5,E.1A1_6, E.1A1_7, F.1A2_0, F.1A2_1, F.1A2_2, F.1A2_3, F.1A2_4, F.1A2_5, F.1A2_6, F.1A2_7, G.1A3_0, G.1A3_1, G.1A3_2, G.1A3_3, G.1A3_4, G.1A3_5, G.1A3_6, G.1A3_7, H.1A4_0, H.1A4_1, H.1A4_2, H.1A4_3, H.1A4_4, H.1A4_5, H.1A4_6, H.1A4_7

FROM RESULTADOS A, PRUEBA B, ALUMNO C, CURSO D, RESULTADOS_1A1 E, RESULTADOS_1A2 F, RESULTADOS_1A3 G, RESULTADOS_1A4 H
WHERE A.ID_PRUEBA	=   '$id_prueba'
AND   A.ID_PRUEBA	=   B.ID_PRUEBA
AND   B.ID_CURSO	=   C.ID_CURSO
AND   A.ID_ALUMNO	=   C.ID_ALUMNO
AND   D.ID_CURSO	=   C.ID_CURSO
AND   D.ID_CURSO	=   B.ID_CURSO
AND   A.ID_ALUMNO 	=   E.ID_ALUMNO
AND   B.ID_PRUEBA	=   E.ID_PRUEBA
AND   A.ID_ALUMNO 	=   F.ID_ALUMNO
AND   B.ID_PRUEBA	=   F.ID_PRUEBA
AND   A.ID_ALUMNO 	=   G.ID_ALUMNO
AND   B.ID_PRUEBA	=   G.ID_PRUEBA
AND   A.ID_ALUMNO 	=   H.ID_ALUMNO
AND   B.ID_PRUEBA	=   H.ID_PRUEBA
ORDER BY C.APELLIDO1_ALUMN ASC");
    
    $consulta->execute();
	
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_informe1B($id_prueba, $id_pruebaA){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.PUNTAJE_Z, A.PERCENTIL, A.PUNTAJE_T, C.NOMBRE1_ALUMN, C.APELLIDO1_ALUMN, A.PUNTAJE, D.NIVEL_CURSO, D.LETRA_CURSO, B.FORMATO_PRBA, B.FECHA_PRBA, E.1B1_0, E.1B1_1, E.1B1_2, E.1B1_3, E.1B1_4, E.1B1_5,E.1B1_6, E.1B1_7, F.1B2_0, F.1B2_1, F.1B2_2, F.1B2_3, F.1B2_4, F.1B2_5, F.1B2_6, F.1B2_7, G.1B3_0, G.1B3_1, G.1B3_2, G.1B3_3, G.1B3_4, G.1B3_5, G.1B3_6, H.1B4_0, H.1B4_1, H.1B4_2, H.1B4_3, H.1B4_4, H.1B4_5, H.1B4_6, I.PUNTAJE_Z, I.PERCENTIL, I.PUNTAJE_T, I.PUNTAJE, J.DIFZ, J.DIFT, J.DIFP, J.DIFPT

FROM RESULTADOS A, PRUEBA B, ALUMNO C, CURSO D, RESULTADOS_1B1 E, RESULTADOS_1B2 F, RESULTADOS_1B3 G, RESULTADOS_1B4 H, RESULTADOS I, VARIACION J
WHERE A.ID_PRUEBA	=   '$id_prueba'
AND   A.ID_PRUEBA	=   B.ID_PRUEBA
AND   B.ID_CURSO	=   C.ID_CURSO
AND   A.ID_ALUMNO	=   C.ID_ALUMNO
AND   D.ID_CURSO	=   C.ID_CURSO
AND   D.ID_CURSO	=   B.ID_CURSO
AND   A.ID_ALUMNO 	=   E.ID_ALUMNO
AND   B.ID_PRUEBA	=   E.ID_PRUEBA
AND   A.ID_ALUMNO 	=   F.ID_ALUMNO
AND   B.ID_PRUEBA	=   F.ID_PRUEBA
AND   A.ID_ALUMNO 	=   G.ID_ALUMNO
AND   B.ID_PRUEBA	=   G.ID_PRUEBA
AND   A.ID_ALUMNO 	=   H.ID_ALUMNO
AND   B.ID_PRUEBA	=   H.ID_PRUEBA
AND   I.ID_PRUEBA 	=   '$id_pruebaA'
AND   I.ID_ALUMNO	=  A.ID_ALUMNO
AND   J.ID_PRUEBA       =   '$id_prueba'
AND   C.ID_ALUMNO       =  J.ID_ALUMNO
ORDER BY C.APELLIDO1_ALUMN ASC");
    
    $consulta->execute();
	
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_informe2A($id_prueba, $id_pruebaA){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.PUNTAJE_Z, A.PERCENTIL, A.PUNTAJE_T, C.NOMBRE1_ALUMN, C.APELLIDO1_ALUMN, A.PUNTAJE, D.NIVEL_CURSO, D.LETRA_CURSO, B.FORMATO_PRBA, B.FECHA_PRBA, E.2A1_0, E.2A1_1, E.2A1_2, E.2A1_3, E.2A1_4, E.2A1_5,E.2A1_6, E.2A1_7, F.2A2_0, F.2A2_1, F.2A2_2, F.2A2_3, F.2A2_4, F.2A2_5, F.2A2_6, F.2A2_7, G.2A3_0, G.2A3_1, G.2A3_2, G.2A3_3, G.2A3_4, G.2A3_5, G.2A3_6, G.2A3_7, H.2A4_0, H.2A4_1, H.2A4_2, H.2A4_3, H.2A4_4, H.2A4_5, H.2A4_6, H.2A4_7, I.PUNTAJE_Z, I.PERCENTIL, I.PUNTAJE_T, I.PUNTAJE, J.DIFZ, J.DIFT, J.DIFP, J.DIFPT, K.DIFZ, K.DIFT, K.DIFP, K.DIFPT


FROM RESULTADOS A, PRUEBA B, ALUMNO C, CURSO D, RESULTADOS_2A1 E, RESULTADOS_2A2 F, RESULTADOS_2A3 G, RESULTADOS_2A4 H, RESULTADOS I, VARIACION J, VARIACION K
WHERE A.ID_PRUEBA	=   '$id_prueba'
AND   A.ID_PRUEBA	=   B.ID_PRUEBA
AND   B.ID_CURSO	=   C.ID_CURSO
AND   A.ID_ALUMNO	=   C.ID_ALUMNO
AND   D.ID_CURSO	=   C.ID_CURSO
AND   D.ID_CURSO	=   B.ID_CURSO
AND   A.ID_ALUMNO 	=   E.ID_ALUMNO
AND   B.ID_PRUEBA	=   E.ID_PRUEBA
AND   A.ID_ALUMNO 	=   F.ID_ALUMNO
AND   B.ID_PRUEBA	=   F.ID_PRUEBA
AND   A.ID_ALUMNO 	=   G.ID_ALUMNO
AND   B.ID_PRUEBA	=   G.ID_PRUEBA
AND   A.ID_ALUMNO 	=   H.ID_ALUMNO
AND   B.ID_PRUEBA	=   H.ID_PRUEBA
AND   I.ID_PRUEBA 	=   '$id_pruebaA'
AND   I.ID_ALUMNO	=  A.ID_ALUMNO
AND   J.ID_PRUEBA       =   '$id_prueba'
AND   C.ID_ALUMNO       =  J.ID_ALUMNO
AND   K.ID_PRUEBA       =   '$id_pruebaA'
AND   C.ID_ALUMNO       =  K.ID_ALUMNO

ORDER BY C.APELLIDO1_ALUMN ASC");
    
    $consulta->execute();
	
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_informe2B($id_prueba, $id_pruebaA){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.PUNTAJE_Z, A.PERCENTIL, A.PUNTAJE_T, C.NOMBRE1_ALUMN, C.APELLIDO1_ALUMN, A.PUNTAJE, D.NIVEL_CURSO, D.LETRA_CURSO, B.FORMATO_PRBA, B.FECHA_PRBA, E.2B1_0, E.2B1_1, E.2B1_2, E.2B1_3, E.2B1_4, E.2B1_5,E.2B1_6, F.2B2_0, F.2B2_1, F.2B2_2, F.2B2_3, F.2B2_4, F.2B2_5, F.2B2_6, F.2B2_7, G.2B3_0, G.2B3_1, G.2B3_2, G.2B3_3, G.2B3_4, G.2B3_5, G.2B3_6, G.2B3_7, H.2B4_0, H.2B4_1, H.2B4_2, H.2B4_3, H.2B4_4, H.2B4_5, H.2B4_6, H.2B4_7, I.PUNTAJE_Z, I.PERCENTIL, I.PUNTAJE_T, I.PUNTAJE, J.DIFZ, J.DIFT, J.DIFP, J.DIFPT, K.DIFZ, K.DIFT, K.DIFP, K.DIFPT


FROM RESULTADOS A, PRUEBA B, ALUMNO C, CURSO D, RESULTADOS_2B1 E, RESULTADOS_2B2 F, RESULTADOS_2B3 G, RESULTADOS_2B4 H, RESULTADOS I, VARIACION J, VARIACION K
WHERE A.ID_PRUEBA	=   '$id_prueba'
AND   A.ID_PRUEBA	=   B.ID_PRUEBA
AND   B.ID_CURSO	=   C.ID_CURSO
AND   A.ID_ALUMNO	=   C.ID_ALUMNO
AND   D.ID_CURSO	=   C.ID_CURSO
AND   D.ID_CURSO	=   B.ID_CURSO
AND   A.ID_ALUMNO 	=   E.ID_ALUMNO
AND   B.ID_PRUEBA	=   E.ID_PRUEBA
AND   A.ID_ALUMNO 	=   F.ID_ALUMNO
AND   B.ID_PRUEBA	=   F.ID_PRUEBA
AND   A.ID_ALUMNO 	=   G.ID_ALUMNO
AND   B.ID_PRUEBA	=   G.ID_PRUEBA
AND   A.ID_ALUMNO 	=   H.ID_ALUMNO
AND   B.ID_PRUEBA	=   H.ID_PRUEBA
AND   I.ID_PRUEBA 	=   '$id_pruebaA'
AND   I.ID_ALUMNO	=  A.ID_ALUMNO
AND   J.ID_PRUEBA       =   '$id_prueba'
AND   C.ID_ALUMNO       =  J.ID_ALUMNO
AND   K.ID_PRUEBA       =   '$id_pruebaA'
AND   C.ID_ALUMNO       =  K.ID_ALUMNO

ORDER BY C.APELLIDO1_ALUMN ASC");
    
    $consulta->execute();
	
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_informe3A($id_prueba, $id_pruebaA){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.PUNTAJE_Z, A.PERCENTIL, A.PUNTAJE_T, C.NOMBRE1_ALUMN, C.APELLIDO1_ALUMN, A.PUNTAJE, D.NIVEL_CURSO, D.LETRA_CURSO, B.FORMATO_PRBA, B.FECHA_PRBA, E.3A1_0, E.3A1_1, E.3A1_2, E.3A1_3, E.3A1_4, E.3A1_5,E.3A1_6, F.3A2_0, F.3A2_1, F.3A2_2, F.3A2_3, F.3A2_4, F.3A2_5, G.3A3_0, G.3A3_1, G.3A3_2, G.3A3_3, H.3A4_0, H.3A4_1, H.3A4_2, H.3A4_3, H.3A4_4, H.3A4_5, H.3A4_6, H.3A4_7, I.PUNTAJE_Z, I.PERCENTIL, I.PUNTAJE_T, I.PUNTAJE, J.DIFZ, J.DIFT, J.DIFP, J.DIFPT, K.DIFZ, K.DIFT, K.DIFP, K.DIFPT


FROM RESULTADOS A, PRUEBA B, ALUMNO C, CURSO D, RESULTADOS_3A1 E, RESULTADOS_3A2 F, RESULTADOS_3A3 G, RESULTADOS_3A4 H, RESULTADOS I, VARIACION J, VARIACION K
WHERE A.ID_PRUEBA	=   '$id_prueba'
AND   A.ID_PRUEBA	=   B.ID_PRUEBA
AND   B.ID_CURSO	=   C.ID_CURSO
AND   A.ID_ALUMNO	=   C.ID_ALUMNO
AND   D.ID_CURSO	=   C.ID_CURSO
AND   D.ID_CURSO	=   B.ID_CURSO
AND   A.ID_ALUMNO 	=   E.ID_ALUMNO
AND   B.ID_PRUEBA	=   E.ID_PRUEBA
AND   A.ID_ALUMNO 	=   F.ID_ALUMNO
AND   B.ID_PRUEBA	=   F.ID_PRUEBA
AND   A.ID_ALUMNO 	=   G.ID_ALUMNO
AND   B.ID_PRUEBA	=   G.ID_PRUEBA
AND   A.ID_ALUMNO 	=   H.ID_ALUMNO
AND   B.ID_PRUEBA	=   H.ID_PRUEBA
AND   I.ID_PRUEBA 	=   '$id_pruebaA'
AND   I.ID_ALUMNO	=  A.ID_ALUMNO
AND   J.ID_PRUEBA       =   '$id_prueba'
AND   C.ID_ALUMNO       =  J.ID_ALUMNO
AND   K.ID_PRUEBA       =   '$id_pruebaA'
AND   C.ID_ALUMNO       =  K.ID_ALUMNO

ORDER BY C.APELLIDO1_ALUMN ASC");
    
    $consulta->execute();
	
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_informe3B($id_prueba, $id_pruebaA){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.PUNTAJE_Z, A.PERCENTIL, A.PUNTAJE_T, C.NOMBRE1_ALUMN, C.APELLIDO1_ALUMN, A.PUNTAJE, D.NIVEL_CURSO, D.LETRA_CURSO, B.FORMATO_PRBA, B.FECHA_PRBA, E.3B1_0, E.3B1_1, E.3B1_2, E.3B1_3, E.3B1_4, E.3B1_5,E.3B1_6, E.3B1_7, F.3B2_0, F.3B2_1, F.3B2_2, F.3B2_3, F.3B2_4,G.3B3_0, G.3B3_1, G.3B3_2, G.3B3_3, H.3B4_0, H.3B4_1, H.3B4_2, H.3B4_3, H.3B4_4, H.3B4_5, H.3B4_6, H.3B4_7, I.PUNTAJE_Z, I.PERCENTIL, I.PUNTAJE_T, I.PUNTAJE, J.DIFZ, J.DIFT, J.DIFP, J.DIFPT, K.DIFZ, K.DIFT, K.DIFP, K.DIFPT


FROM RESULTADOS A, PRUEBA B, ALUMNO C, CURSO D, RESULTADOS_3B1 E, RESULTADOS_3B2 F, RESULTADOS_3B3 G, RESULTADOS_3B4 H, RESULTADOS I, VARIACION J, VARIACION K
WHERE A.ID_PRUEBA	=   '$id_prueba'
AND   A.ID_PRUEBA	=   B.ID_PRUEBA
AND   B.ID_CURSO	=   C.ID_CURSO
AND   A.ID_ALUMNO	=   C.ID_ALUMNO
AND   D.ID_CURSO	=   C.ID_CURSO
AND   D.ID_CURSO	=   B.ID_CURSO
AND   A.ID_ALUMNO 	=   E.ID_ALUMNO
AND   B.ID_PRUEBA	=   E.ID_PRUEBA
AND   A.ID_ALUMNO 	=   F.ID_ALUMNO
AND   B.ID_PRUEBA	=   F.ID_PRUEBA
AND   A.ID_ALUMNO 	=   G.ID_ALUMNO
AND   B.ID_PRUEBA	=   G.ID_PRUEBA
AND   A.ID_ALUMNO 	=   H.ID_ALUMNO
AND   B.ID_PRUEBA	=   H.ID_PRUEBA
AND   I.ID_PRUEBA 	=   '$id_pruebaA'
AND   I.ID_ALUMNO	=  A.ID_ALUMNO
AND   J.ID_PRUEBA       =   '$id_prueba'
AND   C.ID_ALUMNO       =  J.ID_ALUMNO
AND   K.ID_PRUEBA       =   '$id_pruebaA'
AND   C.ID_ALUMNO       =  K.ID_ALUMNO

ORDER BY C.APELLIDO1_ALUMN ASC");
    
    $consulta->execute();
	
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_informe4A($id_prueba, $id_pruebaA){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.PUNTAJE_Z, A.PERCENTIL, A.PUNTAJE_T, C.NOMBRE1_ALUMN, C.APELLIDO1_ALUMN, A.PUNTAJE, D.NIVEL_CURSO, D.LETRA_CURSO, B.FORMATO_PRBA, B.FECHA_PRBA, E.4A1_0, E.4A1_1, E.4A1_2, E.4A1_3, E.4A1_4, F.4A2_0, F.4A2_1, F.4A2_2, F.4A2_3, F.4A2_4, F.4A2_5, F.4A2_6,G.4A3_0, G.4A3_1, G.4A3_2, G.4A3_3, H.4A4_0, H.4A4_1, H.4A4_2, H.4A4_3, H.4A4_4, I.PUNTAJE_Z, I.PERCENTIL, I.PUNTAJE_T, I.PUNTAJE, J.DIFZ, J.DIFT, J.DIFP, J.DIFPT, K.DIFZ, K.DIFT, K.DIFP, K.DIFPT


FROM RESULTADOS A, PRUEBA B, ALUMNO C, CURSO D, RESULTADOS_4A1 E, RESULTADOS_4A2 F, RESULTADOS_4A3 G, RESULTADOS_4A4 H, RESULTADOS I, VARIACION J, VARIACION K
WHERE A.ID_PRUEBA	=   '$id_prueba'
AND   A.ID_PRUEBA	=   B.ID_PRUEBA
AND   B.ID_CURSO	=   C.ID_CURSO
AND   A.ID_ALUMNO	=   C.ID_ALUMNO
AND   D.ID_CURSO	=   C.ID_CURSO
AND   D.ID_CURSO	=   B.ID_CURSO
AND   A.ID_ALUMNO 	=   E.ID_ALUMNO
AND   B.ID_PRUEBA	=   E.ID_PRUEBA
AND   A.ID_ALUMNO 	=   F.ID_ALUMNO
AND   B.ID_PRUEBA	=   F.ID_PRUEBA
AND   A.ID_ALUMNO 	=   G.ID_ALUMNO
AND   B.ID_PRUEBA	=   G.ID_PRUEBA
AND   A.ID_ALUMNO 	=   H.ID_ALUMNO
AND   B.ID_PRUEBA	=   H.ID_PRUEBA
AND   I.ID_PRUEBA 	=   '$id_pruebaA'
AND   I.ID_ALUMNO	=  A.ID_ALUMNO
AND   J.ID_PRUEBA       =   '$id_prueba'
AND   C.ID_ALUMNO       =  J.ID_ALUMNO
AND   K.ID_PRUEBA       =   '$id_pruebaA'
AND   C.ID_ALUMNO       =  K.ID_ALUMNO

ORDER BY C.APELLIDO1_ALUMN ASC");
    
    $consulta->execute();
	
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}


public function grafico_informe4B($id_prueba, $id_pruebaA){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.PUNTAJE_Z, A.PERCENTIL, A.PUNTAJE_T, C.NOMBRE1_ALUMN, C.APELLIDO1_ALUMN, A.PUNTAJE, D.NIVEL_CURSO, D.LETRA_CURSO, B.FORMATO_PRBA, B.FECHA_PRBA, E.4B1_0, E.4B1_1, E.4B1_2, E.4B1_3, E.4B1_4, F.4B2_0, F.4B2_1, F.4B2_2, F.4B2_3, F.4B2_4, F.4B2_5, F.4B2_6, F.4B2_7, G.4B3_0, G.4B3_1, G.4B3_2, G.4B3_3, H.4B4_0, H.4B4_1, H.4B4_2, H.4B4_3, H.4B4_4, I.PUNTAJE_Z, I.PERCENTIL, I.PUNTAJE_T, I.PUNTAJE, J.DIFZ, J.DIFT, J.DIFP, J.DIFPT, K.DIFZ, K.DIFT, K.DIFP, K.DIFPT


FROM RESULTADOS A, PRUEBA B, ALUMNO C, CURSO D, RESULTADOS_4B1 E, RESULTADOS_4B2 F, RESULTADOS_4B3 G, RESULTADOS_4B4 H, RESULTADOS I, VARIACION J, VARIACION K
WHERE A.ID_PRUEBA	=   '$id_prueba'
AND   A.ID_PRUEBA	=   B.ID_PRUEBA
AND   B.ID_CURSO	=   C.ID_CURSO
AND   A.ID_ALUMNO	=   C.ID_ALUMNO
AND   D.ID_CURSO	=   C.ID_CURSO
AND   D.ID_CURSO	=   B.ID_CURSO
AND   A.ID_ALUMNO 	=   E.ID_ALUMNO
AND   B.ID_PRUEBA	=   E.ID_PRUEBA
AND   A.ID_ALUMNO 	=   F.ID_ALUMNO
AND   B.ID_PRUEBA	=   F.ID_PRUEBA
AND   A.ID_ALUMNO 	=   G.ID_ALUMNO
AND   B.ID_PRUEBA	=   G.ID_PRUEBA
AND   A.ID_ALUMNO 	=   H.ID_ALUMNO
AND   B.ID_PRUEBA	=   H.ID_PRUEBA
AND   I.ID_PRUEBA 	=   '$id_pruebaA'
AND   I.ID_ALUMNO	=  A.ID_ALUMNO
AND   J.ID_PRUEBA       =   '$id_prueba'
AND   C.ID_ALUMNO       =  J.ID_ALUMNO
AND   K.ID_PRUEBA       =   '$id_pruebaA'
AND   C.ID_ALUMNO       =  K.ID_ALUMNO

ORDER BY C.APELLIDO1_ALUMN ASC");
    
    $consulta->execute();
	
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}


     /************************************************************************
     *									    *
     *				=[  Graficos	]=			    *
     *									    *
     ************************************************************************
     ************************************************************************/ 


public function grafico_z($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.PUNTAJE_Z
	FROM RESULTADOS A, PRUEBA B, ALUMNO C
	WHERE A.ID_PRUEBA = '$id_prueba'
	AND   A.ID_PRUEBA = B.ID_PRUEBA
	AND   B.ID_CURSO = C.ID_CURSO
	AND   A.ID_ALUMNO = C.ID_ALUMNO
	ORDER BY C.APELLIDO1_ALUMN ASC");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function graficoZ0($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.PUNTAJE_Z
	FROM RESULTADOS A, PRUEBA B, ALUMNO C
	WHERE A.ID_PRUEBA = '$id_prueba'
	AND   A.ID_PRUEBA = B.ID_PRUEBA
	AND   B.ID_CURSO = C.ID_CURSO
	AND   A.ID_ALUMNO = C.ID_ALUMNO
	ORDER BY C.APELLIDO1_ALUMN ASC");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_p($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.PERCENTIL
	FROM RESULTADOS A, PRUEBA B, ALUMNO C
	WHERE A.ID_PRUEBA = '$id_prueba'
	AND   A.ID_PRUEBA = B.ID_PRUEBA
	AND   B.ID_CURSO = C.ID_CURSO
	AND   A.ID_ALUMNO = C.ID_ALUMNO
	ORDER BY C.APELLIDO1_ALUMN ASC");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function graficoP0($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.PERCENTIL
	FROM RESULTADOS A, PRUEBA B, ALUMNO C
	WHERE A.ID_PRUEBA = '$id_prueba'
	AND   A.ID_PRUEBA = B.ID_PRUEBA
	AND   B.ID_CURSO = C.ID_CURSO
	AND   A.ID_ALUMNO = C.ID_ALUMNO
	ORDER BY C.APELLIDO1_ALUMN ASC");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}


public function grafico_t($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.PUNTAJE_T
	FROM RESULTADOS A, PRUEBA B, ALUMNO C
	WHERE A.ID_PRUEBA = '$id_prueba'
	AND   A.ID_PRUEBA = B.ID_PRUEBA
	AND   B.ID_CURSO = C.ID_CURSO
	AND   A.ID_ALUMNO = C.ID_ALUMNO
	ORDER BY C.APELLIDO1_ALUMN ASC");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function graficoT0($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.PUNTAJE_T
	FROM RESULTADOS A, PRUEBA B, ALUMNO C
	WHERE A.ID_PRUEBA = '$id_prueba'
	AND   A.ID_PRUEBA = B.ID_PRUEBA
	AND   B.ID_CURSO = C.ID_CURSO
	AND   A.ID_ALUMNO = C.ID_ALUMNO
	ORDER BY C.APELLIDO1_ALUMN ASC");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}


public function grafico_ptje($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.PUNTAJE
	FROM RESULTADOS A, PRUEBA B, ALUMNO C
	WHERE A.ID_PRUEBA = '$id_prueba'
	AND   A.ID_PRUEBA = B.ID_PRUEBA
	AND   B.ID_CURSO = C.ID_CURSO
	AND   A.ID_ALUMNO = C.ID_ALUMNO
	ORDER BY C.APELLIDO1_ALUMN ASC");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function graficoPT0($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.PUNTAJE
	FROM RESULTADOS A, PRUEBA B, ALUMNO C
	WHERE A.ID_PRUEBA = '$id_prueba'
	AND   A.ID_PRUEBA = B.ID_PRUEBA
	AND   B.ID_CURSO = C.ID_CURSO
	AND   A.ID_ALUMNO = C.ID_ALUMNO
	ORDER BY C.APELLIDO1_ALUMN ASC");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}



public function nivelFormato($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.NIVEL, A.FORMATO_PRBA 
				    FROM PRUEBA A 
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}


public function tabla_informes($id_profesor){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.ID_PRUEBA, A.FECHA_PRBA, B.NIVEL_CURSO, B.LETRA_CURSO, A.FORMATO_PRBA
		FROM PRUEBA A, CURSO B
		WHERE A.ESTADO_PRBA = 'Cerrado'
		AND  A.ID_PROFESOR = '$id_profesor' 
		AND A.ID_PROFESOR = B.ID_PROFESOR 
		AND A.ID_CURSO = B.ID_CURSO
		ORDER BY A.FECHA_PRBA DESC");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function tabla_informesDir($id_dir,$fecha){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.ID_PRUEBA, A.FECHA_PRBA, B.NIVEL_CURSO, B.LETRA_CURSO, A.FORMATO_PRBA
		FROM PRUEBA A, CURSO B, DIRECTOR C, PROFESOR D
		WHERE A.ESTADO_PRBA = 'Cerrado'
		AND A.ID_PROFESOR = D.ID_PROFESOR
                AND D.RBD  = C.RBD
                AND C.RBD = B.RBD
                AND  B.ID_CURSO = A.ID_CURSO
                AND B.ID_PROFESOR = D.ID_PROFESOR
               AND C.ID_DIR = '$id_dir'
                AND YEAR(A.FECHA_PRBA) = YEAR('$fecha')
		ORDER BY A.FECHA_PRBA DESC");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

/*
 *  INFORMACIÓN DE GRÁFICOS TORTA
 *
 */
public function grafico_1A10($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.1A1_0
	FROM RESULTADOS_1A1 A
	WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}
public function grafico_1A11($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.1A1_1
	FROM RESULTADOS_1A1 A
	WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_1A12($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.1A1_2
	FROM RESULTADOS_1A1 A
	WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_1A13($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.1A1_3
	FROM RESULTADOS_1A1 A
	WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_1A14($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.1A1_4
				    FROM RESULTADOS_1A1 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_1A15($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.1A1_5
				    FROM RESULTADOS_1A1 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_1A16($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.1A1_6
				    FROM RESULTADOS_1A1 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_1A17($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.1A1_7
				    FROM RESULTADOS_1A1 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_1A20($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.1A2_0
				    FROM RESULTADOS_1A2 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_1A21($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.1A2_1
				    FROM RESULTADOS_1A2 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_1A22($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.1A2_2
				    FROM RESULTADOS_1A2 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_1A23($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.1A2_3
				    FROM RESULTADOS_1A2 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_1A24($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.1A2_4
				    FROM RESULTADOS_1A2 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_1A25($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.1A2_5
				    FROM RESULTADOS_1A2 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_1A26($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.1A2_6
				    FROM RESULTADOS_1A2 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_1A27($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.1A2_7
				    FROM RESULTADOS_1A2 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_1A30($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.1A3_0
				    FROM RESULTADOS_1A3 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_1A31($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.1A3_1
				    FROM RESULTADOS_1A3 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_1A32($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.1A3_2
				    FROM RESULTADOS_1A3 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_1A33($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.1A3_3
				    FROM RESULTADOS_1A3 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_1A34($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.1A3_4
				    FROM RESULTADOS_1A3 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_1A35($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.1A3_5
				    FROM RESULTADOS_1A3 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_1A36($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.1A3_6
				    FROM RESULTADOS_1A3 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_1A37($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.1A3_7
				    FROM RESULTADOS_1A3 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_1A40($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.1A4_0
				    FROM RESULTADOS_1A4 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_1A41($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.1A4_1
				    FROM RESULTADOS_1A4 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_1A42($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.1A4_2
				    FROM RESULTADOS_1A4 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_1A43($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.1A4_3
				    FROM RESULTADOS_1A4 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_1A44($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.1A4_4
				    FROM RESULTADOS_1A4 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_1A45($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.1A4_5
				    FROM RESULTADOS_1A4 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_1A46($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.1A4_6
				    FROM RESULTADOS_1A4 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_1A47($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.1A4_7
				    FROM RESULTADOS_1A4 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

     /************************************************************************
     *									    *
     *				=[  Graficos 1B	]=			    *
     *									    *
     ************************************************************************
     ************************************************************************/ 


public function grafico_1B10($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.1B1_0
	FROM RESULTADOS_1B1 A
	WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}
public function grafico_1B11($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.1B1_1
	FROM RESULTADOS_1B1 A
	WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_1B12($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.1B1_2
	FROM RESULTADOS_1B1 A
	WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_1B13($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.1B1_3
	FROM RESULTADOS_1B1 A
	WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_1B14($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.1B1_4
				    FROM RESULTADOS_1B1 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_1B15($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.1B1_5
				    FROM RESULTADOS_1B1 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_1B16($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.1B1_6
				    FROM RESULTADOS_1B1 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_1B17($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.1B1_7
				    FROM RESULTADOS_1B1 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_1B20($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.1B2_0
	FROM RESULTADOS_1B2 A
	WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}
public function grafico_1B21($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.1B2_1
	FROM RESULTADOS_1B2 A
	WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_1B22($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.1B2_2
	FROM RESULTADOS_1B2 A
	WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_1B23($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.1B2_3
	FROM RESULTADOS_1B2 A
	WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_1B24($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.1B2_4
				    FROM RESULTADOS_1B2 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_1B25($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.1B2_5
				    FROM RESULTADOS_1B2 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_1B26($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.1B2_6
				    FROM RESULTADOS_1B2 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_1B27($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.1B2_7
				    FROM RESULTADOS_1B2 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_1B30($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.1B3_0
	FROM RESULTADOS_1B3 A
	WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}
public function grafico_1B31($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.1B3_1
	FROM RESULTADOS_1B3 A
	WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_1B32($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.1B3_2
	FROM RESULTADOS_1B3 A
	WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_1B33($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.1B3_3
	FROM RESULTADOS_1B3 A
	WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_1B34($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.1B3_4
				    FROM RESULTADOS_1B3 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_1B35($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.1B3_5
				    FROM RESULTADOS_1B3 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_1B36($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.1B3_6
				    FROM RESULTADOS_1B3 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_1B40($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.1B4_0
	FROM RESULTADOS_1B4 A
	WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}
public function grafico_1B41($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.1B4_1
	FROM RESULTADOS_1B4 A
	WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_1B42($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.1B4_2
	FROM RESULTADOS_1B4 A
	WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_1B43($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.1B4_3
	FROM RESULTADOS_1B4 A
	WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_1B44($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.1B4_4
				    FROM RESULTADOS_1B4 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_1B45($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.1B4_5
				    FROM RESULTADOS_1B4 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_1B46($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.1B4_6
				    FROM RESULTADOS_1B4 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

     /************************************************************************
     *									    *
     *				=[  Graficos 2A	]=			    *
     *									    *
     ************************************************************************
     ************************************************************************/ 

public function grafico_2A10($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2A1_0
	FROM RESULTADOS_2A1 A
	WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}
public function grafico_2A11($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2A1_1
	FROM RESULTADOS_2A1 A
	WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_2A12($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2A1_2
	FROM RESULTADOS_2A1 A
	WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_2A13($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2A1_3
	FROM RESULTADOS_2A1 A
	WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_2A14($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2A1_4
				    FROM RESULTADOS_2A1 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_2A15($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2A1_5
				    FROM RESULTADOS_2A1 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_2A16($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2A1_6
				    FROM RESULTADOS_2A1 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_2A17($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2A1_7
				    FROM RESULTADOS_2A1 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_2A20($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2A2_0
				    FROM RESULTADOS_2A2 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_2A21($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2A2_1
				    FROM RESULTADOS_2A2 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_2A22($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2A2_2
				    FROM RESULTADOS_2A2 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_2A23($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2A2_3
				    FROM RESULTADOS_2A2 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_2A24($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2A2_4
				    FROM RESULTADOS_2A2 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_2A25($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2A2_5
				    FROM RESULTADOS_2A2 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_2A26($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2A2_6
				    FROM RESULTADOS_2A2 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_2A27($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2A2_7
				    FROM RESULTADOS_2A2 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_2A30($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2A3_0
				    FROM RESULTADOS_2A3 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_2A31($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2A3_1
				    FROM RESULTADOS_2A3 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_2A32($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2A3_2
				    FROM RESULTADOS_2A3 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_2A33($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2A3_3
				    FROM RESULTADOS_2A3 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_2A34($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2A3_4
				    FROM RESULTADOS_2A3 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_2A35($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2A3_5
				    FROM RESULTADOS_2A3 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_2A36($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2A3_6
				    FROM RESULTADOS_2A3 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_2A37($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2A3_7
				    FROM RESULTADOS_2A3 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_2A40($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2A4_0
				    FROM RESULTADOS_2A4 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_2A41($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2A4_1
				    FROM RESULTADOS_2A4 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_2A42($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2A4_2
				    FROM RESULTADOS_2A4 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_2A43($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2A4_3
				    FROM RESULTADOS_2A4 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_2A44($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2A4_4
				    FROM RESULTADOS_2A4 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_2A45($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2A4_5
				    FROM RESULTADOS_2A4 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_2A46($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2A4_6
				    FROM RESULTADOS_2A4 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_2A47($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2A4_7
				    FROM RESULTADOS_2A4 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

     /************************************************************************
     *									    *
     *				=[  Graficos 2B	]=			    *
     *									    *
     ************************************************************************
     ************************************************************************/ 

public function grafico_2B10($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2B1_0
	FROM RESULTADOS_2B1 A
	WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}
public function grafico_2B11($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2B1_1
	FROM RESULTADOS_2B1 A
	WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_2B12($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2B1_2
	FROM RESULTADOS_2B1 A
	WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_2B13($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2B1_3
	FROM RESULTADOS_2B1 A
	WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_2B14($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2B1_4
				    FROM RESULTADOS_2B1 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_2B15($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2B1_5
				    FROM RESULTADOS_2B1 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_2B16($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2B1_6
				    FROM RESULTADOS_2B1 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_2B20($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2B2_0
				    FROM RESULTADOS_2B2 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_2B21($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2B2_1
				    FROM RESULTADOS_2B2 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_2B22($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2B2_2
				    FROM RESULTADOS_2B2 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_2B23($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2B2_3
				    FROM RESULTADOS_2B2 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_2B24($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2B2_4
				    FROM RESULTADOS_2B2 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_2B25($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2B2_5
				    FROM RESULTADOS_2B2 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_2B26($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2B2_6
				    FROM RESULTADOS_2B2 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_2B27($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2B2_7
				    FROM RESULTADOS_2B2 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_2B30($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2B3_0
				    FROM RESULTADOS_2B3 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_2B31($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2B3_1
				    FROM RESULTADOS_2B3 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_2B32($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2B3_2
				    FROM RESULTADOS_2B3 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_2B33($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2B3_3
				    FROM RESULTADOS_2B3 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_2B34($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2B3_4
				    FROM RESULTADOS_2B3 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_2B35($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2B3_5
				    FROM RESULTADOS_2B3 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_2B36($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2B3_6
				    FROM RESULTADOS_2B3 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_2B37($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2B3_7
				    FROM RESULTADOS_2B3 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_2B40($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2B4_0
				    FROM RESULTADOS_2B4 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_2B41($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2B4_1
				    FROM RESULTADOS_2B4 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_2B42($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2B4_2
				    FROM RESULTADOS_2B4 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_2B43($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2B4_3
				    FROM RESULTADOS_2B4 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_2B44($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2B4_4
				    FROM RESULTADOS_2B4 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_2B45($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2B4_5
				    FROM RESULTADOS_2B4 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_2B46($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2B4_6
				    FROM RESULTADOS_2B4 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_2B47($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2B4_7
				    FROM RESULTADOS_2B4 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

     /************************************************************************
     *									    *
     *				=[  Graficos 3A	]=			    *
     *									    *
     ************************************************************************
     ************************************************************************/ 

public function grafico_3A10($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.3A1_0
	FROM RESULTADOS_3A1 A
	WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}
public function grafico_3A11($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.3A1_1
	FROM RESULTADOS_3A1 A
	WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_3A12($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.3A1_2
	FROM RESULTADOS_3A1 A
	WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_3A13($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.3A1_3
	FROM RESULTADOS_3A1 A
	WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_3A14($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.3A1_4
				    FROM RESULTADOS_3A1 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_3A15($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.3A1_5
				    FROM RESULTADOS_3A1 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_3A16($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.3A1_6
				    FROM RESULTADOS_3A1 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_3A17($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.3A1_7
				    FROM RESULTADOS_3A1 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}


public function grafico_3A20($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.3A2_0
				    FROM RESULTADOS_3A2 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_3A21($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.3A2_1
				    FROM RESULTADOS_3A2 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_3A22($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.3A2_2
				    FROM RESULTADOS_3A2 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_3A23($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.3A2_3
				    FROM RESULTADOS_3A2 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_3A24($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.3A2_4
				    FROM RESULTADOS_3A2 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_3A25($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.3A2_5
				    FROM RESULTADOS_3A2 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}


public function grafico_3A30($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.3A3_0
				    FROM RESULTADOS_3A3 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_3A31($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.3A3_1
				    FROM RESULTADOS_3A3 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_3A32($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.3A3_2
				    FROM RESULTADOS_3A3 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_3A33($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.3A3_3
				    FROM RESULTADOS_3A3 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_3A40($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.3A4_0
				    FROM RESULTADOS_3A4 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_3A41($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.3A4_1
				    FROM RESULTADOS_3A4 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_3A42($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.3A4_2
				    FROM RESULTADOS_3A4 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_3A43($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.3A4_3
				    FROM RESULTADOS_3A4 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_3A44($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.3A4_4
				    FROM RESULTADOS_3A4 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_3A45($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.3A4_5
				    FROM RESULTADOS_3A4 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_3A46($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.3A4_6
				    FROM RESULTADOS_3A4 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_3A47($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.3A4_7
				    FROM RESULTADOS_3A4 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

     /************************************************************************
     *									    *
     *				=[  Graficos 3B	]=			    *
     *									    *
     ************************************************************************
     ************************************************************************/ 

public function grafico_3B10($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.3B1_0
	FROM RESULTADOS_3B1 A
	WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}
public function grafico_3B11($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.3B1_1
	FROM RESULTADOS_3B1 A
	WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_3B12($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.3B1_2
	FROM RESULTADOS_3B1 A
	WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_3B13($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.3B1_3
	FROM RESULTADOS_3B1 A
	WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_3B14($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.3B1_4
				    FROM RESULTADOS_3B1 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_3B15($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.3B1_5
				    FROM RESULTADOS_3B1 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_3B16($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.3B1_6
				    FROM RESULTADOS_3B1 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_3B17($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.3B1_7
				    FROM RESULTADOS_3B1 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}


public function grafico_3B20($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.3B2_0
				    FROM RESULTADOS_3B2 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_3B21($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.3B2_1
				    FROM RESULTADOS_3B2 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_3B22($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.3B2_2
				    FROM RESULTADOS_3B2 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_3B23($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.3B2_3
				    FROM RESULTADOS_3B2 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_3B24($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.3B2_4
				    FROM RESULTADOS_3B2 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_3B25($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.3B2_5
				    FROM RESULTADOS_3B2 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}


public function grafico_3B30($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.3B3_0
				    FROM RESULTADOS_3B3 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_3B31($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.3B3_1
				    FROM RESULTADOS_3B3 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_3B32($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.3B3_2
				    FROM RESULTADOS_3B3 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_3B33($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.3B3_3
				    FROM RESULTADOS_3B3 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_3B40($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.3B4_0
				    FROM RESULTADOS_3B4 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_3B41($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.3B4_1
				    FROM RESULTADOS_3B4 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_3B42($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.3B4_2
				    FROM RESULTADOS_3B4 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_3B43($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.3B4_3
				    FROM RESULTADOS_3B4 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_3B44($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.3B4_4
				    FROM RESULTADOS_3B4 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_3B45($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.3B4_5
				    FROM RESULTADOS_3B4 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_3B46($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.3B4_6
				    FROM RESULTADOS_3B4 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_3B47($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.3B4_7
				    FROM RESULTADOS_3B4 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}


     /************************************************************************
     *									    *
     *				=[  Graficos 4A	]=			    *
     *									    *
     ************************************************************************
     ************************************************************************/ 

public function grafico_4A10($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.4A1_0
	FROM RESULTADOS_4A1 A
	WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}
public function grafico_4A11($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.4A1_1
	FROM RESULTADOS_4A1 A
	WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_4A12($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.4A1_2
	FROM RESULTADOS_4A1 A
	WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_4A13($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.4A1_3
	FROM RESULTADOS_4A1 A
	WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_4A14($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.4A1_4
				    FROM RESULTADOS_4A1 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}


public function grafico_4A20($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.4A2_0
				    FROM RESULTADOS_4A2 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_4A21($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.4A2_1
				    FROM RESULTADOS_4A2 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_4A22($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.4A2_2
				    FROM RESULTADOS_4A2 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_4A23($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.4A2_3
				    FROM RESULTADOS_4A2 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_4A24($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.4A2_4
				    FROM RESULTADOS_4A2 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_4A25($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.4A2_5
				    FROM RESULTADOS_4A2 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;

}

public function grafico_4A26($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.4A2_6
				    FROM RESULTADOS_4A2 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}


public function grafico_4A30($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.4A3_0
				    FROM RESULTADOS_4A3 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_4A31($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.4A3_1
				    FROM RESULTADOS_4A3 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_4A32($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.4A3_2
				    FROM RESULTADOS_4A3 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_4A33($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.4A3_3
				    FROM RESULTADOS_4A3 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_4A40($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.4A4_0
				    FROM RESULTADOS_4A4 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_4A41($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.4A4_1
				    FROM RESULTADOS_4A4 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_4A42($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.4A4_2
				    FROM RESULTADOS_4A4 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_4A43($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.4A4_3
				    FROM RESULTADOS_4A4 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_4A44($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.4A4_4
				    FROM RESULTADOS_4A4 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

     /************************************************************************
     *									    *
     *				=[  Graficos 4B	]=			    *
     *									    *
     ************************************************************************
     ************************************************************************/ 

public function grafico_4B10($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.4B1_0
	FROM RESULTADOS_4B1 A
	WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}
public function grafico_4B11($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.4B1_1
	FROM RESULTADOS_4B1 A
	WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_4B12($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.4B1_2
	FROM RESULTADOS_4B1 A
	WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_4B13($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.4B1_3
	FROM RESULTADOS_4B1 A
	WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_4B14($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.4B1_4
				    FROM RESULTADOS_4B1 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}


public function grafico_4B20($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.4B2_0
				    FROM RESULTADOS_4B2 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_4B21($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.4B2_1
				    FROM RESULTADOS_4B2 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_4B22($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.4B2_2
				    FROM RESULTADOS_4B2 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_4B23($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.4B2_3
				    FROM RESULTADOS_4B2 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_4B24($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.4B2_4
				    FROM RESULTADOS_4B2 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_4B25($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.4B2_5
				    FROM RESULTADOS_4B2 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;

}

public function grafico_4B26($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.4B2_6
				    FROM RESULTADOS_4B2 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_4B27($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.4B2_7
				    FROM RESULTADOS_4B2 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}


public function grafico_4B30($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.4B3_0
				    FROM RESULTADOS_4B3 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_4B31($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.4B3_1
				    FROM RESULTADOS_4B3 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_4B32($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.4B3_2
				    FROM RESULTADOS_4B3 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_4B33($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.4B3_3
				    FROM RESULTADOS_4B3 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_4B40($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.4B4_0
				    FROM RESULTADOS_4B4 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_4B41($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.4B4_1
				    FROM RESULTADOS_4B4 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_4B42($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.4B4_2
				    FROM RESULTADOS_4B4 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_4B43($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.4B4_3
				    FROM RESULTADOS_4B4 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_4B44($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.4B4_4
				    FROM RESULTADOS_4B4 A
				    WHERE A.ID_PRUEBA = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function ident_prof($id_dir, $rbd){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT B.NOMBRE_PROF, B.APELLIDO_PROF, B.EMAIL_PROF,A.REPORTE_REFERENCIA, A.REPORTE_FECHA, A.REPORTE_HORA, A.REPORTE_DETALLE, B.ID_PROFESOR 
				FROM REPORTE_DIR A, PROFESOR B
				WHERE A.RBD = '$rbd'
				AND A.RBD = B.RBD
				AND B.ID_PROFESOR = A.ID_PROFESOR
				ORDER BY B.NOMBRE_PROF ASC, A.REPORTE_FECHA ASC, A.REPORTE_HORA ASC");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}


/***************************************************************************************************************
 * ******************************** = SUCESOS PROFESOR = *******************************************************
 * ************************************************************************************************************/

public function sucesoProf($id_prof){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT B.NOMBRE_PROF, B.APELLIDO_PROF, B.EMAIL_PROF, A.REPORTE_REFERENCIA, A.REPORTE_FECHA, A.REPORTE_HORA, A.REPORTE_DETALLE, B.ID_PROFESOR
				    FROM REPORTE_DIR A, PROFESOR B
				    WHERE A.ID_PROFESOR = '$id_prof'
				    AND A.RBD = B.RBD
				    AND B.ID_PROFESOR = A.ID_PROFESOR
				    ORDER BY B.NOMBRE_PROF ASC , A.REPORTE_FECHA ASC , A.REPORTE_HORA ASC");
    
    $consulta->execute();
	
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function sucesoFgrnal($id_prof){
 //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT B.NOMBRE_PROF, B.APELLIDO_PROF,  A.REPORTE_FECHA, A.REPORTE_REFERENCIA, A.REPORTE_HORA
				    FROM REPORTE_DIR A, PROFESOR B
				    WHERE A.ID_PROFESOR = '$id_prof'
				    AND A.RBD = B.RBD
				    AND B.ID_PROFESOR = A.ID_PROFESOR
				    ORDER BY A.REPORTE_FECHA ASC");
    
    $consulta->execute();
	
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;


}




}
