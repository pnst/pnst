<?php
class ResultadosControlador extends ControladorBase {
   public  function librerias(){ 
	require_once ('modelo/ResultadosModelo.php');
	require_once ('clases/pauta.class.php');
	require_once ('clase/variacion.class.php');
   }

   public function respUnoa($resp_1A1, $resp_1A2, $resp_1A3, $resp_1A4){
	$id_alumno = $_SESSION["wrares_id_alumno"];
	$id_prueba = $_SESSION["wrares_id_prueba"];
	
	require_once ('clases/pauta.class.php');
	
	$pauta= new pauta();

	$pauta_1A1 = pauta::pauta_1A1();

	$pauta_1A2 = pauta::pauta_1A2();

	$pauta_1A3 = pauta::pauta_1A3();

	$pauta_1A4 = pauta::pauta_1A4();

	//registro cuantas respuestas buenas se respondieron
	//en cada item, recorro la matriz indexada y luego con
	//el if comparo segun el indice si el valor de las 
	//respuestas es == a el valor de la pauta, si es así 
	//cuento.
	
	$contador_1A1 = 0;  
	$i = 0;
	foreach($resp_1A1 as $indice => $valor){ 
	    if($valor == $pauta_1A1[$indice]){  $contador_1A1++; } 
	    if($indice == '0'){$respuesta_1A10 = $valor;}
	    if($indice == '1'){$respuesta_1A11 = $valor;}
	    if($indice == '2'){$respuesta_1A12 = $valor;}
	    if($indice == '3'){$respuesta_1A13 = $valor;}
	    if($indice == '4'){$respuesta_1A14 = $valor;}
	    if($indice == '5'){$respuesta_1A15 = $valor;}
	    if($indice == '6'){$respuesta_1A16 = $valor;}
	    if($indice == '7'){$respuesta_1A17 = $valor;}
	}
				
	$contador_1A2 = 0;
	foreach($resp_1A2 as $indice => $valor){  
	    if($valor == $pauta_1A2[$indice]){  $contador_1A2++; } 
	    if($indice == '0'){$respuesta_1A20 = $valor;}
	    if($indice == '1'){$respuesta_1A21 = $valor;}
	    if($indice == '2'){$respuesta_1A22 = $valor;}
	    if($indice == '3'){$respuesta_1A23 = $valor;}
	    if($indice == '4'){$respuesta_1A24 = $valor;}
	    if($indice == '5'){$respuesta_1A25 = $valor;}
	    if($indice == '6'){$respuesta_1A26 = $valor;}
	    if($indice == '7'){$respuesta_1A27 = $valor;}
	}
	
	$contador_1A3 = 0;  
	foreach($resp_1A3 as $indice => $valor){  
	    if($valor == $pauta_1A3[$indice]){  $contador_1A3++; }
	    if($indice == '0'){$respuesta_1A30 = $valor;}
	    if($indice == '1'){$respuesta_1A31 = $valor;}
	    if($indice == '2'){$respuesta_1A32 = $valor;}
	    if($indice == '3'){$respuesta_1A33 = $valor;}
	    if($indice == '4'){$respuesta_1A34 = $valor;}
	    if($indice == '5'){$respuesta_1A35 = $valor;}
	    if($indice == '6'){$respuesta_1A36 = $valor;}
	    if($indice == '7'){$respuesta_1A37 = $valor;}
	}
		
	$contador_1A4 = 0;  
	foreach($resp_1A4 as $indice => $valor){  
	    if($valor == $pauta_1A4[$indice]){  $contador_1A4++; }
	    if($indice == '1'){$respuesta_1A41 = $valor;}
	    if($indice == '2'){$respuesta_1A42 = $valor;}
	    if($indice == '3'){$respuesta_1A43 = $valor;}
	    if($indice == '4'){$respuesta_1A44 = $valor;}
	    if($indice == '5'){$respuesta_1A45 = $valor;}
	    if($indice == '6'){$respuesta_1A46 = $valor;}
	    if($indice == '7'){$respuesta_1A47 = $valor;}
	}
	
	// Suma de puntajes 
	$ptje	    = $contador_1A1+$contador_1A2+$contador_1A3+$contador_1A4;
	$nivel	    = $_SESSION["wrares_nivel_curso"];
	$formato    = $_SESSION["wrares_formato_prba"];
		
	$ptje_z	    = pauta::ptje_z($nivel, $formato, $ptje);
	$ptje_t	    = pauta::ptje_t($nivel, $formato, $ptje);
	$percentil  = pauta::percentil($nivel, $formato, $ptje);
	
	$set_resultados = new ResultadosModelo();

	$set_resultados->set_resultados($ptje, $percentil, $ptje_z, $ptje_t, $id_alumno, $id_prueba );  	

	$set_resultados->set_resultados_1A1( $id_prueba,$id_alumno,$respuesta_1A10, $respuesta_1A11,$respuesta_1A12, $respuesta_1A13,$respuesta_1A14, $respuesta_1A15,$respuesta_1A16, $respuesta_1A17);

	$set_resultados->set_resultados_1A2( $id_prueba,$id_prueba,$respuesta_1A20, $respuesta_1A21,$respuesta_1A22, $respuesta_1A23,$respuesta_1A24, $respuesta_1A25,$respuesta_1A26);

	$set_resultados->set_resultados_1A3( $id_prueba,$id_alumno, $id_prueba,$respuesta_1A30, $respuesta_1A31,$respuesta_1A32, $respuesta_1A33,$respuesta_1A34, $respuesta_1A35,$respuesta_1A36, $respuesta_1A37);

	$set_resultados->set_resultados_1A4( $id_prueba,$id_alumno, $id_prueba,$respuesta_1A40, $respuesta_1A41,$respuesta_1A42, $respuesta_1A43,$respuesta_1A44, $respuesta_1A45,$respuesta_1A46, $respuesta_1A47);

	return;	
  }

    public function respUnob($resp_1B1, $resp_1B2, $resp_1B3, $resp_1B4){
	$id_alumno = $_SESSION["wrares_id_alumno"];
	$id_prueba = $_SESSION["wrares_id_prueba"];
	
	$pauta= new pauta();

	$pauta_1B1 = pauta::pauta_1B1();

	$pauta_1B2 = pauta::pauta_1B2();

	$pauta_1B3 = pauta::pauta_1B3();

	$pauta_1B4 = pauta::pauta_1B4();

	//registro cuantas respuestas buenas se respondieron
	//en cada item, recorro la matriz indexada y luego con
	//el if comparo segun el indice si el valor de las 
	//respuestas es == a el valor de la pauta, si es así 
	//cuento.
	
	$contador_1B1 = 0;  
	$i = 0;
	foreach($resp_1B1 as $indice => $valor){ 
	    if($valor == $pauta_1B1[$indice]){  $contador_1B1++; } 
	    if($indice == '0'){$respuesta_1B10 = $valor;}
	    if($indice == '1'){$respuesta_1B11 = $valor;}
	    if($indice == '2'){$respuesta_1B12 = $valor;}
	    if($indice == '3'){$respuesta_1B13 = $valor;}
	    if($indice == '4'){$respuesta_1B14 = $valor;}
	    if($indice == '5'){$respuesta_1B15 = $valor;}
	    if($indice == '6'){$respuesta_1B16 = $valor;}
	    if($indice == '7'){$respuesta_1B17 = $valor;}
	}
				
	$contador_1B2 = 0;
	foreach($resp_1B2 as $indice => $valor){  
	    if($valor == $pauta_1B2[$indice]){  $contador_1B2++; } 
	    if($indice == '0'){$respuesta_1B20 = $valor;}
	    if($indice == '1'){$respuesta_1B21 = $valor;}
	    if($indice == '2'){$respuesta_1B22 = $valor;}
	    if($indice == '3'){$respuesta_1B23 = $valor;}
	    if($indice == '4'){$respuesta_1B24 = $valor;}
	    if($indice == '5'){$respuesta_1B25 = $valor;}
	    if($indice == '6'){$respuesta_1B26 = $valor;}
	    if($indice == '7'){$respuesta_1B27 = $valor;}
	}
	
	$contador_1B3 = 0;  
	foreach($resp_1B3 as $indice => $valor){  
	    if($valor == $pauta_1B3[$indice]){  $contador_1B3++; }
	    if($indice == '0'){$respuesta_1B30 = $valor;}
	    if($indice == '1'){$respuesta_1B31 = $valor;}
	    if($indice == '2'){$respuesta_1B32 = $valor;}
	    if($indice == '3'){$respuesta_1A33 = $valor;}
	    if($indice == '4'){$respuesta_1B34 = $valor;}
	    if($indice == '5'){$respuesta_1B35 = $valor;}
	    if($indice == '6'){$respuesta_1B36 = $valor;}
	    if($indice == '7'){$respuesta_1B37 = $valor;}
	}
		
	$contador_1B4 = 0;  
	foreach($resp_1B4 as $indice => $valor){  
	    if($valor == $pauta_1B4[$indice]){  $contador_1B4++; }
	    if($indice == '1'){$respuesta_1B41 = $valor;}
	    if($indice == '2'){$respuesta_1B42 = $valor;}
	    if($indice == '3'){$respuesta_1B43 = $valor;}
	    if($indice == '4'){$respuesta_1B44 = $valor;}
	    if($indice == '5'){$respuesta_1B45 = $valor;}
	    if($indice == '6'){$respuesta_1B46 = $valor;}
	    
	}
	
	// Suma de puntajes 
	$ptje	    = $contador_1B1+$contador_1B2+$contador_1B3+$contador_1B4;
	$nivel	    = $_SESSION["wrares_nivel_curso"];
	$formato    = $_SESSION["wrares_formato_prba"];
		
	$ptje_z	    = pauta::ptje_z($nivel, $formato, $ptje);
	$ptje_t	    = pauta::ptje_t($nivel, $formato, $ptje);
	$percentil  = pauta::percentil($nivel, $formato, $ptje);
	
	$set_resultados = new ResultadosModelo();

	$set_resultados->set_resultados($ptje, $percentil, $ptje_z, $ptje_t, $id_alumno, $id_prueba );  	

	$set_resultados->set_resultados_1B1( $id_prueba,$id_alumno,$respuesta_1B10, $respuesta_1B11,$respuesta_1B12, $respuesta_1B13,$respuesta_1B14, $respuesta_1B15,$respuesta_1B16, $respuesta_1B17);

	$set_resultados->set_resultados_1B2( $id_prueba,$id_prueba,$respuesta_1B20, $respuesta_1B21,$respuesta_1B22, $respuesta_1B23,$respuesta_1B24, $respuesta_1B25,$respuesta_1B26);

	$set_resultados->set_resultados_1B3( $id_prueba,$id_alumno, $id_prueba,$respuesta_1B30, $respuesta_1B31,$respuesta_1B32, $respuesta_1B33,$respuesta_1B34, $respuesta_1B35,$respuesta_1B36, $respuesta_1B37);

	$set_resultados->set_resultados_1B4( $id_prueba,$id_alumno, $id_prueba,$respuesta_1B40, $respuesta_1B41,$respuesta_1B42, $respuesta_1B43,$respuesta_1B44, $respuesta_1B45,$respuesta_1B46);
	
	$var = new Variacion();

	$var->variacion($id_prueba, $_SESSION["wrares_id_curso"], $ptje, $percentil, $ptje_z, $ptje_t, $id_alumno);

	return;	
  }


public function respDosa($resp_2A1, $resp_2A2, $resp_2A3, $resp_2A4){
	
	$id_alumno = $_SESSION["wrares_id_alumno"];
	$id_prueba = $_SESSION["wrares_id_prueba"];

	require_once ('clases/pauta.class.php');
	
	$pauta= new pauta();

	$pauta_2A1 = pauta::pauta_2A1();

	$pauta_2A2 = pauta::pauta_2A2();

	$pauta_2A3 = pauta::pauta_2A3();

	$pauta_2A4 = pauta::pauta_2A4();

	//registro cuantas respuestas buenas se respondieron
	//en cada item, recorro la matriz indexada y luego con
	//el if comparo segun el indice si el valor de las 
	//respuestas es == a el valor de la pauta, si es así 
	//cuento.
	
	$contador_2A1 = 0;  
	$i = 0;
	foreach($resp_2A1 as $indice => $valor){ 
	    if($valor == $pauta_2A1[$indice]){  $contador_2A1++; } 
	    if($indice == '0'){$respuesta_2A10 = $valor;}
	    if($indice == '1'){$respuesta_2A11 = $valor;}
	    if($indice == '2'){$respuesta_2A12 = $valor;}
	    if($indice == '3'){$respuesta_2A13 = $valor;}
	    if($indice == '4'){$respuesta_2A14 = $valor;}
	    if($indice == '5'){$respuesta_2A15 = $valor;}
	    if($indice == '6'){$respuesta_2A16 = $valor;}
	    if($indice == '7'){$respuesta_2A17 = $valor;}
	}
				
	$contador_2A2 = 0;
	foreach($resp_2A2 as $indice => $valor){  
	    if($valor == $pauta_2A2[$indice]){  $contador_2A2++; } 
	    if($indice == '0'){$respuesta_2A20 = $valor;}
	    if($indice == '1'){$respuesta_2A21 = $valor;}
	    if($indice == '2'){$respuesta_2A22 = $valor;}
	    if($indice == '3'){$respuesta_2A23 = $valor;}
	    if($indice == '4'){$respuesta_2A24 = $valor;}
	    if($indice == '5'){$respuesta_2A25 = $valor;}
	    if($indice == '6'){$respuesta_2A26 = $valor;}
	    if($indice == '7'){$respuesta_2A27 = $valor;}
	}
	
	$contador_2A3 = 0;  
	foreach($resp_2A3 as $indice => $valor){  
	    if($valor == $pauta_2A3[$indice]){  $contador_2A3++; }
	    if($indice == '0'){$respuesta_2A30 = $valor;}
	    if($indice == '1'){$respuesta_2A31 = $valor;}
	    if($indice == '2'){$respuesta_2A32 = $valor;}
	    if($indice == '3'){$respuesta_2A33 = $valor;}
	    if($indice == '4'){$respuesta_2A34 = $valor;}
	    if($indice == '5'){$respuesta_2A35 = $valor;}
	    if($indice == '6'){$respuesta_2A36 = $valor;}
	    if($indice == '7'){$respuesta_2A37 = $valor;}

	}
		
	$contador_2A4 = 0;  
	foreach($resp_2A4 as $indice => $valor){  
	    if($valor == $pauta_2A4[$indice]){  $contador_2A4++; }
	    if($indice == '0'){$respuesta_2A40 = $valor;}
	    if($indice == '1'){$respuesta_2A41 = $valor;}
	    if($indice == '2'){$respuesta_2A42 = $valor;}
	    if($indice == '3'){$respuesta_2A43 = $valor;}
	    if($indice == '4'){$respuesta_2A44 = $valor;}
	    if($indice == '5'){$respuesta_2A45 = $valor;}
	    if($indice == '6'){$respuesta_2A46 = $valor;}
	    if($indice == '7'){$respuesta_2A47 = $valor;}
	}
	
	// Suma de puntajes 
	$ptje = $contador_2A1+$contador_2A2+$contador_2A3+$contador_2A4;
	$nivel = $_SESSION["wrares_nivel_curso"];
	$formato = $_SESSION["wrares_formato_prba"];
		
	$ptje_z = pauta::ptje_z($nivel, $formato, $ptje);
	$ptje_t = pauta::ptje_t($nivel, $formato, $ptje);
	$percentil = pauta::percentil($nivel, $formato, $ptje);
	
	require_once ('modelo/ResultadosModelo.php');

	$set_resultados = new ResultadosModelo();

	$set_resultados->set_resultados($ptje, $percentil, $ptje_z, $ptje_t, $id_alumno, $id_prueba );  	

	$set_resultados->set_resultados_2A1( $id_prueba,$id_alumno,$respuesta_2A10, $respuesta_2A11,$respuesta_2A12, $respuesta_2A13,$respuesta_2A14, $respuesta_2A15,$respuesta_2A16, $respuesta_2A17);

	$set_resultados->set_resultados_2A2( $id_prueba,$id_prueba,$respuesta_2A20, $respuesta_2A21,$respuesta_2A22, $respuesta_2A23,$respuesta_2A24, $respuesta_2A25,$respuesta_2A26, $respuesta_2A27);

	$set_resultados->set_resultados_2A3( $id_prueba,$id_alumno, $id_prueba,$respuesta_2A30, $respuesta_2A31,$respuesta_2A32, $respuesta_2A33,$respuesta_2A34, $respuesta_2A35,$respuesta_2A36, $respuesta_2A37);

	$set_resultados->set_resultados_2A4( $id_prueba,$id_alumno, $id_prueba,$respuesta_2A40, $respuesta_2A41,$respuesta_2A42, $respuesta_2A43,$respuesta_2A44, $respuesta_2A45,$respuesta_2A46, $respuesta_2A47);

	$var = new Variacion();

	$var->variacion($id_prueba, $_SESSION["wrares_id_curso"], $ptje, $percentil, $ptje_z, $ptje_t, $id_alumno);

	return;	
    }

    function respDosb($resp_2B1, $resp_2B2, $resp_2B3, $resp_2B4){
	$id_alumno = $_SESSION["wrares_id_alumno"];
	$id_prueba = $_SESSION["wrares_id_prueba"];

	require_once ('clases/pauta.class.php');
	
	$pauta= new pauta();

	$pauta_2B1 = pauta::pauta_2B1();

	$pauta_2B2 = pauta::pauta_2B2();

	$pauta_2B3 = pauta::pauta_2B3();

	$pauta_2B4 = pauta::pauta_2B4();

	//registro cuantas respuestas buenas se respondieron
	//en cada item, recorro la matriz indexada y luego con
	//el if comparo segun el indice si el valor de las 
	//respuestas es == a el valor de la pauta, si es así 
	//cuento.
	
	$contador_2B1 = 0;  
	$i = 0;
	foreach($resp_2B1 as $indice => $valor){ 
	    if($valor == $pauta_2B1[$indice]){  $contador_2B1++; } 
	    if($indice == '0'){$respuesta_2B10 = $valor;}
	    if($indice == '1'){$respuesta_2B11 = $valor;}
	    if($indice == '2'){$respuesta_2B12 = $valor;}
	    if($indice == '3'){$respuesta_2B13 = $valor;}
	    if($indice == '4'){$respuesta_2B14 = $valor;}
	    if($indice == '5'){$respuesta_2B15 = $valor;}
	    if($indice == '6'){$respuesta_2B16 = $valor;}
	    
	}
				
	$contador_2B2 = 0;
	foreach($resp_2B2 as $indice => $valor){  
	    if($valor == $pauta_2B2[$indice]){  $contador_2B2++; } 
	    if($indice == '0'){$respuesta_2B20 = $valor;}
	    if($indice == '1'){$respuesta_2B21 = $valor;}
	    if($indice == '2'){$respuesta_2B22 = $valor;}
	    if($indice == '3'){$respuesta_2B23 = $valor;}
	    if($indice == '4'){$respuesta_2B24 = $valor;}
	    if($indice == '5'){$respuesta_2B25 = $valor;}
	    if($indice == '6'){$respuesta_2B26 = $valor;}
	    if($indice == '7'){$respuesta_2B27 = $valor;}
	}
	
	$contador_2B3 = 0;  
	foreach($resp_2B3 as $indice => $valor){  
	    if($valor == $pauta_2B3[$indice]){  $contador_2B3++; }
	    if($indice == '0'){$respuesta_2B30 = $valor;}
	    if($indice == '1'){$respuesta_2B31 = $valor;}
	    if($indice == '2'){$respuesta_2B32 = $valor;}
	    if($indice == '3'){$respuesta_2B33 = $valor;}
	    if($indice == '4'){$respuesta_2B34 = $valor;}
	    if($indice == '5'){$respuesta_2B35 = $valor;}
	    if($indice == '6'){$respuesta_2B36 = $valor;}
	    if($indice == '7'){$respuesta_2B37 = $valor;}

	}
		
	$contador_2B4 = 0;  
	foreach($resp_2B4 as $indice => $valor){  
	    if($valor == $pauta_2B4[$indice]){  $contador_2B4++; }
	    if($indice == '0'){$respuesta_2B40 = $valor;}
	    if($indice == '1'){$respuesta_2B41 = $valor;}
	    if($indice == '2'){$respuesta_2B42 = $valor;}
	    if($indice == '3'){$respuesta_2B43 = $valor;}
	    if($indice == '4'){$respuesta_2B44 = $valor;}
	    if($indice == '5'){$respuesta_2B45 = $valor;}
	    if($indice == '6'){$respuesta_2B46 = $valor;}
	    if($indice == '7'){$respuesta_2B47 = $valor;}
	}
	
	// Suma de puntajes 
	$ptje = $contador_2B1+$contador_2B2+$contador_2B3+$contador_2B4;
	$nivel = $_SESSION["wrares_nivel_curso"];
	$formato = $_SESSION["wrares_formato_prba"];
		
	$ptje_z = pauta::ptje_z($nivel, $formato, $ptje);
	$ptje_t = pauta::ptje_t($nivel, $formato, $ptje);
	$percentil = pauta::percentil($nivel, $formato, $ptje);
	
	require_once ('modelo/ResultadosModelo.php');

	$set_resultados = new ResultadosModelo();

	$set_resultados->set_resultados($ptje, $percentil, $ptje_z, $ptje_t, $id_alumno, $id_prueba );  	

	$set_resultados->set_resultados_2B1( $id_prueba,$id_alumno,$respuesta_2B10, $respuesta_2B11,$respuesta_2B12, $respuesta_2B13,$respuesta_2B14, $respuesta_2B15,$respuesta_2B16);

	$set_resultados->set_resultados_2B2( $id_prueba,$id_prueba,$respuesta_2B20, $respuesta_2B21,$respuesta_2B22, $respuesta_2B23,$respuesta_2B24, $respuesta_2B25,$respuesta_2B26);

	$set_resultados->set_resultados_2B3( $id_prueba,$id_alumno, $id_prueba,$respuesta_2B30, $respuesta_2B31,$respuesta_2B32, $respuesta_2B33,$respuesta_2B34, $respuesta_2B35,$respuesta_2B36, $respuesta_2B37);

	$set_resultados->set_resultados_2B4( $id_prueba,$id_alumno, $id_prueba,$respuesta_2B40, $respuesta_2B41,$respuesta_2B42, $respuesta_2B43,$respuesta_2B44, $respuesta_2B45,$respuesta_2B46, $respuesta_2B47);

	$var = new Variacion();

	$var->variaciones($id_prueba,$ptje, $percentil, $ptje_z, $ptje_t, $id_alumno);

	return;	
   }
    
    function respTresa($resp_3A1, $resp_3A2, $resp_3A3, $resp_3A4){
	$id_alumno = $_SESSION["wrares_id_alumno"];
	$id_prueba = $_SESSION["wrares_id_prueba"];

	require_once ('clases/pauta.class.php');
	
	$pauta= new pauta();

	$pauta_3A1 = pauta::pauta_3A1();

	$pauta_3A2 = pauta::pauta_3A2();

	$pauta_3A3 = pauta::pauta_3A3();

	$pauta_3A4 = pauta::pauta_3A4();

	//registro cuantas respuestas buenas se respondieron
	//en cada item, recorro la matriz indexada y luego con
	//el if comparo segun el indice si el valor de las 
	//respuestas es == a el valor de la pauta, si es así 
	//cuento.
	
	$contador_3A1 = 0;  
	$i = 0;
	foreach($resp_3A1 as $indice => $valor){ 
	    if($valor == $pauta_3A1[$indice]){  $contador_3A1++; } 
	    if($indice == '0'){$respuesta_3A10 = $valor;}
	    if($indice == '1'){$respuesta_3A11 = $valor;}
	    if($indice == '2'){$respuesta_3A12 = $valor;}
	    if($indice == '3'){$respuesta_3A13 = $valor;}
	    if($indice == '4'){$respuesta_3A14 = $valor;}
	    if($indice == '5'){$respuesta_3A15 = $valor;}
	    if($indice == '6'){$respuesta_3A16 = $valor;}
	    
	}
				
	$contador_3A2 = 0;
	foreach($resp_3A2 as $indice => $valor){  
	    if($valor == $pauta_3A2[$indice]){  $contador_3A2++; } 
	    if($indice == '0'){$respuesta_3A20 = $valor;}
	    if($indice == '1'){$respuesta_3A21 = $valor;}
	    if($indice == '2'){$respuesta_3A22 = $valor;}
	    if($indice == '3'){$respuesta_3A23 = $valor;}
	    if($indice == '4'){$respuesta_3A24 = $valor;}
	    if($indice == '5'){$respuesta_3A25 = $valor;}
	}
	
	$contador_3A3 = 0;  
	foreach($resp_3A3 as $indice => $valor){  
	    if($valor == $pauta_3A3[$indice]){  $contador_3A3++; }
	    if($indice == '0'){$respuesta_3A30 = $valor;}
	    if($indice == '1'){$respuesta_3A31 = $valor;}
	    if($indice == '2'){$respuesta_3A32 = $valor;}
	    if($indice == '3'){$respuesta_3A33 = $valor;}
	}
		
	$contador_3A4 = 0;  
	foreach($resp_3A4 as $indice => $valor){  
	    if($valor == $pauta_3A4[$indice]){  $contador_3A4++; }
	    if($indice == '0'){$respuesta_3A40 = $valor;}
	    if($indice == '1'){$respuesta_3A41 = $valor;}
	    if($indice == '2'){$respuesta_3A42 = $valor;}
	    if($indice == '3'){$respuesta_3A43 = $valor;}
	    if($indice == '4'){$respuesta_3A44 = $valor;}
	    if($indice == '5'){$respuesta_3A45 = $valor;}
	    if($indice == '6'){$respuesta_3A46 = $valor;}
	}
	
	// Suma de puntajes 
	$ptje = $contador_3A1+$contador_3A2+$contador_3A3+$contador_3A4;
	$nivel = $_SESSION["wrares_nivel_curso"];
	$formato = $_SESSION["wrares_formato_prba"];
		
	$ptje_z = pauta::ptje_z($nivel, $formato, $ptje);
	$ptje_t = pauta::ptje_t($nivel, $formato, $ptje);
	$percentil = pauta::percentil($nivel, $formato, $ptje);
	
	require_once ('modelo/ResultadosModelo.php');

	$set_resultados = new ResultadosModelo();

	$set_resultados->set_resultados($ptje, $percentil, $ptje_z, $ptje_t, $id_alumno, $id_prueba );  	

	$set_resultados->set_resultados_3A1( $id_prueba,$id_alumno,$respuesta_3A10, $respuesta_3A11,$respuesta_3A12, $respuesta_3A13,$respuesta_3A14, $respuesta_3A15,$respuesta_3A16);

	$set_resultados->set_resultados_3A2( $id_prueba,$id_prueba,$respuesta_3A20, $respuesta_3A21,$respuesta_3A22, $respuesta_3A23,$respuesta_3A24, $respuesta_3A25);

	$set_resultados->set_resultados_3A3( $id_prueba,$id_alumno, $id_prueba,$respuesta_3A30, $respuesta_3A31,$respuesta_3A32, $respuesta_3A33);

	$set_resultados->set_resultados_3A4( $id_prueba,$id_alumno, $id_prueba,$respuesta_3A40, $respuesta_3A41,$respuesta_3A42, $respuesta_3A43,$respuesta_3A44, $respuesta_3A45,$respuesta_3A46);

	$var = new Variacion();

	$var->variacion($id_prueba, $_SESSION["wrares_id_curso"], $ptje, $percentil, $ptje_z, $ptje_t, $id_alumno);

	return;	
    }
    function respTresb($resp_3B1, $resp_3B2, $resp_3B3, $resp_3B4){	
	$id_alumno = $_SESSION["wrares_id_alumno"];
	$id_prueba = $_SESSION["wrares_id_prueba"];

	require_once ('clases/pauta.class.php');
	
	$pauta= new pauta();

	$pauta_3B1 = pauta::pauta_3B1();

	$pauta_3B2 = pauta::pauta_3B2();

	$pauta_3B3 = pauta::pauta_3B3();

	$pauta_3B4 = pauta::pauta_3B4();

	//registro cuantas respuestas buenas se respondieron
	//en cada item, recorro la matriz indexada y luego con
	//el if comparo segun el indice si el valor de las 
	//respuestas es == a el valor de la pauta, si es así 
	//cuento.
	
	$contador_3B1 = 0;  
	$i = 0;
	foreach($resp_3B1 as $indice => $valor){ 
	    if($valor == $pauta_3B1[$indice]){  $contador_3B1++; } 
	    if($indice == '0'){$respuesta_3B10 = $valor;}
	    if($indice == '1'){$respuesta_3B11 = $valor;}
	    if($indice == '2'){$respuesta_3B12 = $valor;}
	    if($indice == '3'){$respuesta_3B13 = $valor;}
	    if($indice == '4'){$respuesta_3B14 = $valor;}
	    if($indice == '5'){$respuesta_3B15 = $valor;}
	    if($indice == '6'){$respuesta_3B16 = $valor;}
	    if($indice == '7'){$respuesta_3B17 = $valor;}

	    
	}
				
	$contador_3B2 = 0;
	foreach($resp_3B2 as $indice => $valor){  
	    if($valor == $pauta_3B2[$indice]){  $contador_3B2++; } 
	    if($indice == '0'){$respuesta_3B20 = $valor;}
	    if($indice == '1'){$respuesta_3B21 = $valor;}
	    if($indice == '2'){$respuesta_3B22 = $valor;}
	    if($indice == '3'){$respuesta_3B23 = $valor;}
	    if($indice == '4'){$respuesta_3B24 = $valor;}
	}
	
	$contador_3B3 = 0;  
	foreach($resp_3B3 as $indice => $valor){  
	    if($valor == $pauta_3B3[$indice]){  $contador_3B3++; }
	    if($indice == '0'){$respuesta_3B30 = $valor;}
	    if($indice == '1'){$respuesta_3B31 = $valor;}
	    if($indice == '2'){$respuesta_3B32 = $valor;}
	    if($indice == '3'){$respuesta_3B33 = $valor;}
	}
		
	$contador_3B4 = 0;  
	foreach($resp_3B4 as $indice => $valor){  
	    if($valor == $pauta_3B4[$indice]){  $contador_3B4++; }
	    if($indice == '0'){$respuesta_3B40 = $valor;}
	    if($indice == '1'){$respuesta_3B41 = $valor;}
	    if($indice == '2'){$respuesta_3B42 = $valor;}
	    if($indice == '3'){$respuesta_3B43 = $valor;}
	    if($indice == '4'){$respuesta_3B44 = $valor;}
	    if($indice == '5'){$respuesta_3B45 = $valor;}
	    if($indice == '6'){$respuesta_3B46 = $valor;}
	}
	
	// Suma de puntajes 
	$ptje = $contador_3B1+$contador_3B2+$contador_3B3+$contador_3B4;
	$nivel = $_SESSION["wrares_nivel_curso"];
	$formato = $_SESSION["wrares_formato_prba"];
		
	$ptje_z = pauta::ptje_z($nivel, $formato, $ptje);
	$ptje_t = pauta::ptje_t($nivel, $formato, $ptje);
	$percentil = pauta::percentil($nivel, $formato, $ptje);
	
	require_once ('modelo/ResultadosModelo.php');

	$set_resultados = new ResultadosModelo();

	$set_resultados->set_resultados($ptje, $percentil, $ptje_z, $ptje_t, $id_alumno, $id_prueba );  	

	$set_resultados->set_resultados_3B1( $id_prueba,$id_alumno,$respuesta_3B10, $respuesta_3B11,$respuesta_3B12, $respuesta_3B13,$respuesta_3B14, $respuesta_3B15,$respuesta_3B16, $respuesta_3B17);

	$set_resultados->set_resultados_3B2( $id_prueba,$id_prueba,$respuesta_3B20, $respuesta_3B21,$respuesta_3B22, $respuesta_3B23,$respuesta_3B24);

	$set_resultados->set_resultados_3B3( $id_prueba,$id_alumno, $id_prueba,$respuesta_3B30, $respuesta_3B31,$respuesta_3B32, $respuesta_3B33);

	$set_resultados->set_resultados_3B4( $id_prueba,$id_alumno, $id_prueba,$respuesta_3B40, $respuesta_B41,$respuesta_3B42, $respuesta_3B43,$respuesta_3B44, $respuesta_3B45,$respuesta_3B46);
	
	$var = new Variacion();

	$var->variaciones($id_prueba,$ptje, $percentil, $ptje_z, $ptje_t, $id_alumno);

	return;	}
    	
    function respCuatroa($resp_4A1, $resp_4A2, $resp_4A3, $resp_4A4){	
	$id_alumno = $_SESSION["wrares_id_alumno"];
	$id_prueba = $_SESSION["wrares_id_prueba"];

	require_once ('clases/pauta.class.php');
	
	$pauta= new pauta();

	$pauta_4A1 = pauta::pauta_4A1();

	$pauta_4A2 = pauta::pauta_4A2();

	$pauta_4A3 = pauta::pauta_4A3();

	$pauta_4A4 = pauta::pauta_4A4();

	//registro cuantas respuestas buenas se respondieron
	//en cada item, recorro la matriz indexada y luego con
	//el if comparo segun el indice si el valor de las 
	//respuestas es == a el valor de la pauta, si es así 
	//cuento.
	
	$contador_4A1 = 0;  
	$i = 0;
	foreach($resp_4A1 as $indice => $valor){ 
	    if($valor == $pauta_4A1[$indice]){  $contador_4A1++; } 
	    if($indice == '0'){$respuesta_4A10 = $valor;}
	    if($indice == '1'){$respuesta_4A11 = $valor;}
	    if($indice == '2'){$respuesta_4A12 = $valor;}
	    if($indice == '3'){$respuesta_4A13 = $valor;}
	    if($indice == '4'){$respuesta_4A14 = $valor;}
		    
	}
				
	$contador_4A2 = 0;
	foreach($resp_4A2 as $indice => $valor){  
	    if($valor == $pauta_4A2[$indice]){  $contador_4A2++; } 
	    if($indice == '0'){$respuesta_4A20 = $valor;}
	    if($indice == '1'){$respuesta_4A21 = $valor;}
	    if($indice == '2'){$respuesta_4A22 = $valor;}
	    if($indice == '3'){$respuesta_4A23 = $valor;}
	    if($indice == '4'){$respuesta_4A24 = $valor;}
	    if($indice == '5'){$respuesta_4A25 = $valor;}
	    if($indice == '6'){$respuesta_4A26 = $valor;}
	
	}
	
	$contador_4A3 = 0;  
	foreach($resp_4A3 as $indice => $valor){  
	    if($valor == $pauta_4A3[$indice]){  $contador_4A3++; }
	    if($indice == '0'){$respuesta_4A30 = $valor;}
	    if($indice == '1'){$respuesta_4A31 = $valor;}
	    if($indice == '2'){$respuesta_4A32 = $valor;}
	    if($indice == '3'){$respuesta_4A33 = $valor;}
	
	}
		
	$contador_4A4 = 0;  
	foreach($resp_4A4 as $indice => $valor){  
	    if($valor == $pauta_4A4[$indice]){  $contador_4A4++; }
	    if($indice == '0'){$respuesta_4A40 = $valor;}
	    if($indice == '1'){$respuesta_4A41 = $valor;}
	    if($indice == '2'){$respuesta_4A42 = $valor;}
	    if($indice == '3'){$respuesta_4A43 = $valor;}
	    if($indice == '4'){$respuesta_4A44 = $valor;}
	
	}
	
	// Suma de puntajes 
	$ptje = $contador_4A1+$contador_4A2+$contador_4A3+$contador_4A4;
	$nivel = $_SESSION["wrares_nivel_curso"];
	$formato = $_SESSION["wrares_formato_prba"];
		
	$ptje_z = pauta::ptje_z($nivel, $formato, $ptje);
	$ptje_t = pauta::ptje_t($nivel, $formato, $ptje);
	$percentil = pauta::percentil($nivel, $formato, $ptje);
	
	require_once ('modelo/ResultadosModelo.php');

	$set_resultados = new ResultadosModelo();

	$set_resultados->set_resultados($ptje, $percentil, $ptje_z, $ptje_t, $id_alumno, $id_prueba );  	

	$set_resultados->set_resultados_4A1( $id_prueba,$id_alumno,$respuesta_4A10, $respuesta_4A11,$respuesta_4A12, $respuesta_4A13,$respuesta_4A14);

	$set_resultados->set_resultados_4A2( $id_prueba,$id_prueba,$respuesta_4A20, $respuesta_4A21,$respuesta_4A22, $respuesta_4A23,$respuesta_4A24, $respuesta_4A25,$respuesta_4A26);

	$set_resultados->set_resultados_4A3( $id_prueba,$id_alumno, $id_prueba,$respuesta_4A30, $respuesta_4A31,$respuesta_4A32, $respuesta_4A33);

	$set_resultados->set_resultados_4A4( $id_prueba,$id_alumno, $id_prueba,$respuesta_4A40, $respuesta_4A41,$respuesta_4A42, $respuesta_4A43,$respuesta_4A44);

	$var = new Variacion();

	$var->variacion($id_prueba, $_SESSION["wrares_id_curso"], $ptje, $percentil, $ptje_z, $ptje_t, $id_alumno);

	return;	
    }	

    function respCuatrob($resp_4B1, $resp_4B2, $resp_4B3, $resp_4B4){	
	$id_alumno = $_SESSION["wrares_id_alumno"];
	$id_prueba = $_SESSION["wrares_id_prueba"];

	require_once ('clases/pauta.class.php');
	
	$pauta= new pauta();

	$pauta_4B1 = pauta::pauta_4B1();

	$pauta_4B2 = pauta::pauta_4B2();

	$pauta_4B3 = pauta::pauta_4B3();

	$pauta_4B4 = pauta::pauta_4B4();

	//registro cuantas respuestas buenas se respondieron
	//en cada item, recorro la matriz indexada y luego con
	//el if comparo segun el indice si el valor de las 
	//respuestas es == a el valor de la pauta, si es así 
	//cuento.
	
	$contador_4B1 = 0;  
	$i = 0;
	foreach($resp_4B1 as $indice => $valor){ 
	    if($valor == $pauta_4B1[$indice]){  $contador_4B1++; } 
	    if($indice == '0'){$respuesta_4B10 = $valor;}
	    if($indice == '1'){$respuesta_4B11 = $valor;}
	    if($indice == '2'){$respuesta_4B12 = $valor;}
	    if($indice == '3'){$respuesta_4B13 = $valor;}
	    if($indice == '4'){$respuesta_4B14 = $valor;}
	}
				
	$contador_4B2 = 0;
	foreach($resp_4B2 as $indice => $valor){  
	    if($valor == $pauta_4B2[$indice]){  $contador_4B2++; } 
	    if($indice == '0'){$respuesta_4B20 = $valor;}
	    if($indice == '1'){$respuesta_4B21 = $valor;}
	    if($indice == '2'){$respuesta_4B22 = $valor;}
	    if($indice == '3'){$respuesta_4B23 = $valor;}
	    if($indice == '4'){$respuesta_4B24 = $valor;}
	    if($indice == '5'){$respuesta_4B25 = $valor;}
	    if($indice == '6'){$respuesta_4B26 = $valor;}
	    if($indice == '7'){$respuesta_4B27 = $valor;}
	}
	
	$contador_4B3 = 0;  
	foreach($resp_4B3 as $indice => $valor){  
	    if($valor == $pauta_4B3[$indice]){  $contador_4B3++; }
	    if($indice == '0'){$respuesta_4B30 = $valor;}
	    if($indice == '1'){$respuesta_4B31 = $valor;}
	    if($indice == '2'){$respuesta_4B32 = $valor;}
	    if($indice == '3'){$respuesta_4B33 = $valor;}
	}
		
	$contador_4B4 = 0;  
	foreach($resp_4B4 as $indice => $valor){  
	    if($valor == $pauta_4B4[$indice]){  $contador_4B4++; }
	    if($indice == '0'){$respuesta_4B40 = $valor;}
	    if($indice == '1'){$respuesta_4B41 = $valor;}
	    if($indice == '2'){$respuesta_4B42 = $valor;}
	    if($indice == '3'){$respuesta_4B43 = $valor;}
	    if($indice == '4'){$respuesta_4B44 = $valor;}
	}
	
	// Suma de puntajes 
	$ptje = $contador_4B1+$contador_4B2+$contador_4B3+$contador_4B4;
	$nivel = $_SESSION["wrares_nivel_curso"];
	$formato = $_SESSION["wrares_formato_prba"];
		
	$ptje_z = pauta::ptje_z($nivel, $formato, $ptje);
	$ptje_t = pauta::ptje_t($nivel, $formato, $ptje);
	$percentil = pauta::percentil($nivel, $formato, $ptje);
	
	require_once ('modelo/ResultadosModelo.php');

	$set_resultados = new ResultadosModelo();

	$set_resultados->set_resultados($ptje, $percentil, $ptje_z, $ptje_t, $id_alumno, $id_prueba );  	

	$set_resultados->set_resultados_4B1( $id_prueba,$id_alumno,$respuesta_4B10, $respuesta_4B11,$respuesta_4B12, $respuesta_4B13,$respuesta_4B14);

	$set_resultados->set_resultados_4B2( $id_prueba,$id_prueba,$respuesta_4B20, $respuesta_4B21,$respuesta_4B22, $respuesta_4B23,$respuesta_4B24, $respuesta_4B25,$respuesta_4B26, $respuesta_4B27);

	$set_resultados->set_resultados_4B3( $id_prueba,$id_alumno, $id_prueba,$respuesta_4B30, $respuesta_4B31,$respuesta_4B32, $respuesta_4B33);

	$set_resultados->set_resultados_4B4( $id_prueba,$id_alumno, $id_prueba,$respuesta_4B40, $respuesta_4B41,$respuesta_4B42, $respuesta_4B43,$respuesta_4B44);
	
	$var = new Variacion();

	$var->variaciones($id_prueba,$ptje, $percentil, $ptje_z, $ptje_t, $id_alumno);

	return;	
    }

   }
