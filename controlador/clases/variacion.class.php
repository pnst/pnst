<?php
class Variacion {

    function librerias(){ require_once ('modelo/VariacionModelo.php');  }

    function variaciones($id_prueba, $id_curso, $ptje, $percentil, $ptje_z, $ptje_t, $id_alumno ){

	$this->librerias();

	$consulta = new VariacionModelo();

	$iprA = $this->idAnterior($id_prueba);

	/* busco los puntajes Z de la prueba anterior */
	$puntajeZA = $consulta->puntajeZAnterior($iprA, $id_alumno);

	while($Z = $puntajeZA->fetch()){$PZ = $Z['0'];}

	$difZ = ($ptje_z - $PZ)/100;

	/* busco los puntajes T de la prueba anterior */
	$puntajeTA = $consulta->puntajeTAnterior($iprA, $id_alumno);

	while($T = $puntajeTA->fetch()){$PT = $T['0'];}

	$difT = ($ptje_t - $PT)/100;

	/* busco los puntajes P de la prueba anterior */
	$puntajePA = $consulta->puntajePAnterior($iprA, $id_alumno);
	
	while($P = $puntajePA->fetch()){$PP = $P['0'];}

	$difP = ($percentil - $PP)/100;

	/* busco Puntaje de la prueba anterior */
	$puntajeA = $consulta->puntajeAnterior($iprA, $id_alumno);

	while($Puntaje = $puntajePA->fetch()){$PA = $Puntaje['0'];}

	$difPT = ($ptje - $PA)/100;

	/* Guardo los datos en la tabla variacion */
	$consulta->set_variacion($id_prueba, $id_alumno, $difZ, $difT, $difP, $difPT );

    return;
    }

    public function idAnterior($id_prueba, $id_curso){
	
	$this->librerias();

	$consulta = new VariacionModelo();

	/* Consulto por la fecha dela prueba */
	$fec = $consulta->fechaPrba($id_prueba);

	while($fe = $fec->fetch()){$fecha = $fe['0'];}

	/* Consulto por el id de la prueba anterior */
	$prbaA = $consulta->prbaAnt_eqA($fecha,$id_curso);

	while($id_prbaAnterior = $prbaA->fetch()){ $iprA = $id_prbaAnterior['0'] ;}

	if(!isset($iprA) && empty($iprA)){ 
	    /* si no encuentra se busca por un año menos */
	    list($anio, $mes, $dia) = explode("-", $fecha);
	    $fecha = $anio - 1 . "-12-31";

	    /* Consulto por el id de la prueba anterior */
	    $prbaA = $consulta->prbaAnt_eqA($fecha,$id_curso);

	    while($id_prbaAnterior = $prbaA->fetch()){ 
		if($id_prbaAnterior['1'] = 'B')$iprA = $id_prbaAnterior['0'] ;
	    }
	    
	    if(!isset($iprA) && empty($iprA)){ return;}

    	return $iprA;
	
	}

	return $iprA;
    }

    public function id_curso($id_prueba){
	$this->librerias();

	$consulta = new VariacionModelo();

	/* Consulto por la fecha dela prueba */
	$cur= $consulta->cursoPrba($id_prueba);

	while($cu = $cur->fetch()){$id_curso = $cu['0'];}

	return $id_curso;
    }


}
