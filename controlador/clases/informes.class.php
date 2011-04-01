<?php
class informes {

    function nivelFormato($formatoNivel){
	if(isset($formatoNivel) && !empty($formatoNivel)){
	    while($datos = $formatoNivel->fetch()){
		    $nivel = $datos['0'];
		    $formato = $datos['1'];
	    }
	    
	    return $nivel.$formato;
	}
   
    }


}
?>
