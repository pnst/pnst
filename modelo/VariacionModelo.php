<?php
class VariacionModelo extends ModeloBase
{
public function prbaAnt_eqA($fecha,$id_curso){
    //realiza consulta de todos los items
    $consulta = $this->db->prepare("SELECT ID_PRUEBA, FORMATO_PRBA
	FROM PRUEBA
	WHERE ID_CURSO = '$id_curso'
	AND FECHA_PRBA < '$fecha'
	AND YEAR(FECHA_PRBA) = YEAR('$fecha')
        ORDER BY FECHA_PRBA ASC");

    $consulta->execute();

    return $consulta;
}

public function prbaAnt_antA($fecha,$id_curso){
    //realiza consulta de todos los items
    $consulta = $this->db->prepare("SELECT ID_PRUEBA
	FROM PRUEBA
	WHERE ID_CURSO = '$id_curso'
	AND FECHA_PRBA < '$fecha'
	AND YEAR(FECHA_PRBA) = YEAR('$fecha')");

    $consulta->execute();

    return $consulta;
}



public function fechaPrba($id_prueba){
    //realiza consulta de todos los items
    $consulta = $this->db->prepare("SELECT FECHA_PRBA
	FROM PRUEBA
	WHERE ID_PRUEBA = '$id_prueba'");

    $consulta->execute();

    return $consulta;
}

public function cursoPrba($id_prueba){
    //realiza consulta de todos los items
    $consulta = $this->db->prepare("SELECT ID_CURSO

	FROM PRUEBA
	WHERE ID_PRUEBA = '$id_prueba'");

    $consulta->execute();

    return $consulta;
}


public function puntajeZAnterior($iprA, $id_alumno){
    //realiza consulta de todos los items
    $consulta = $this->db->prepare("SELECT PUNTAJE_Z
	FROM RESULTADOS
	WHERE ID_ALUMNO = '$id_curso'
	AND ID_PRUEBA = '$iprA'");

    $consulta->execute();

    return $consulta;
}
public function puntajeTAnterior($iprA, $id_alumno){
    //realiza consulta de todos los items
    $consulta = $this->db->prepare("SELECT PUNTAJE_T
	FROM RESULTADOS
	WHERE ID_ALUMNO = '$id_curso'
	AND ID_PRUEBA = '$iprA'");

    $consulta->execute();

    return $consulta;
}
public function puntajePAnterior($iprA, $id_alumno){
    //realiza consulta de todos los items
    $consulta = $this->db->prepare("SELECT PERCENTIL
	FROM RESULTADOS
	WHERE ID_ALUMNO = '$id_curso'
	AND ID_PRUEBA = '$iprA'");

    $consulta->execute();

    return $consulta;
}
public function puntajeAnterior($iprA, $id_alumno){
    //realiza consulta de todos los items
    $consulta = $this->db->prepare("SELECT PUNTAJE
	FROM RESULTADOS
	WHERE ID_ALUMNO = '$id_curso'
	AND ID_PRUEBA = '$iprA'");

    $consulta->execute();

    return $consulta;
}
public function set_variacion($id_prueba, $id_alumno, $difZ, $difT, $difP, $difPT ){
    $consulta = $this->db->prepare("INSERT INTO VARIACION(ID_PRUEBA, ID_ALUMNO, DIFZ, DIFT, DIFP, DIFPT)
		VALUES('$id_prueba', '$id_alumno', '$difZ', '$difT', '$difP', '$difPT' )");

    $consulta->execute();

    return $consulta;
}


}
