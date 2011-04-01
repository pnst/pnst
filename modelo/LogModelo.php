<?php
class LogModelo extends ModeloBase
{
    public function timeline(){
	    $consulta = $this->db->prepare("SELECT * FROM TIMELINE ORDER BY EVENTO_FECHA DESC, EVENTO_HORA DESC");
		$consulta->execute();
		return $consulta;
    }

    public function setTimeline($tipo,$titulo,$cuerpo,$fecha,$hora,$ip,$tipo){
	    $consulta = $this->db->prepare("INSERT INTO `TIMELINE` ( `TIPO`,`TITULO`,`CUERPO`,`EVENTO_FECHA`,`EVENTO_HORA`,`IP`,`REFERENCIA`)VALUES
	    ('$tipo', '$titulo', '$cuerpo', '$fecha', '$hora', '$ip', '$tipo')");
		$consulta->execute();
		return $consulta;
    }

    public function setReporteDir($id_prof,$ref,$fecha,$hora,$detalle){
    	$consulta = $this->db->prepare("INSERT INTO `REPORTE_DIR` ( `ID_PROFESOR`,`RBD`,`REPORTE_REFERENCIA`,`REPORTE_FECHA`,`REPORTE_HORA`,`REPORTE_DETALLE`)VALUES
	('$id_prof', '$ref', '$fecha', '$hora', '$detalle')");
	$consulta->execute();
	return $consulta;
    }

    
     
 }
