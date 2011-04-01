<?php
class AdminModelo extends ModeloBase
{
    public function valida_admin($a){
		//realizamos la consulta de todos los items
	$consulta = $this->db->prepare("SELECT EMAIL_ADMIN, PASSW_ADMIN
					FROM ADMINISTRADOR
					WHERE EMAIL_ADMIN = '$a'");
	$consulta->execute();
				
	//devolvemos la coleccion para que la vista la presente.
	return $consulta;
    }

    public function Prof(){
		//realizamos la consulta de todos los items
	$consulta = $this->db->prepare("SELECT A.NOMBRE_PROF, A.APELLIDO_PROF, A.EMAIL_PROF, A.FECHA_INGRESO, A.CUENTA, B.NOMBRE_COLEGIO
FROM PROFESOR A, COLEGIO B
WHERE A.RBD = B.RBD
ORDER BY A.RBD ASC		    ");
	$consulta->execute();
				
	//devolvemos la coleccion para que la vista la presente.
	return $consulta;
    }

    public function Dir(){
		//realizamos la consulta de todos los items
	$consulta = $this->db->prepare("SELECT A.NOMBRE_DIR, A.APELLIDO_DIR, A.EMAIL_DIR, A.FECHA_INGRESO, A.CUENTA, B.NOMBRE_COLEGIO
FROM DIRECTOR A, COLEGIO B
WHERE A.RBD = B.RBD
ORDER BY A.RBD ASC		");
	$consulta->execute();
				
	//devolvemos la coleccion para que la vista la presente.
	return $consulta;
    }

    public function Sys(){
		//realizamos la consulta de todos los items
	$consulta = $this->db->prepare("SELECT TIPO, TITULO, CUERPO, EVENTO_FECHA, EVENTO_HORA, IP
FROM `TIMELINE` 
ORDER BY EVENTO_FECHA DESC, EVENTO_HORA DESC");
	$consulta->execute();
				
	//devolvemos la coleccion para que la vista la presente.
	return $consulta;
    }

}
