<?php
class pruebaClass{
    
    public function forPrba_anual($b, $formato, $fecha){ 
    /* SI EL FORMATO ES EL MISMO, MENSAJITO */
	while($c = $b->fetch()){ $a = $c['0']; $d = $c['1'];}

	if($a == $formato)die("-1");

	list($anio1, $mes1, $dia1) = explode("-", $d);

	list($dia2, $mes2, $anio2) = explode("/", $fecha);

	if ($mes1 == $mes2)die("-2");

	$timestamp1 = mktime(0,0,0,$mes1,$dia1,$anio1);
	$timestamp2 = mktime(0,0,0,$mes2,$dia2,$anio2); 

	if($mes1 > $mes2)$dif_seg = $timestamp1 - $timestamp2;

	if($mes1 < $mes2)$dif_seg = $timestamp2 - $timestamp1;

	$dif_dia = $dif_seg/(60 * 60 * 24);

	$dif_dia = abs($dif_dia);
	$dif_dia = floor($dif_dia);

	if($dif_dia < '30')die("-2");
	
	return;
    
    }

}

?>
