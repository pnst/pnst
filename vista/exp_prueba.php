<?php

while($a = $excepcion->fetch()){
		$ant = 0;
        $id_curso[] = $a['0'];
        if($ant != $a['1'].$a['2']) $curso[]    = $a['1'].$a['2'];
        $ant = $a['1'].$a['2'];
        $date = cambia_a_normal($a['3']);
        $fecha[]    = $date;
}
?>
<html>
<head>
<link rel="stylesheet" href="css/jquery-ui-1.8.2.custom.css" type="text/css" media="screen"/>
</head>
<body>
<!--  Inicio formulario -->
<div id="admin_almn"><br/>
<h1>Pru<span>eba</span></h1><br/>
<div id="form_excepcion">
    Filtrar por Feca y Curso
    <form action="#" method ="post" id="fe">
    <select  id="exp_curso" name="excepcionesCurso" >
        <option value="0">----</option>
        <?php foreach($curso as $indice => $valor){ ?>
        <option value="<?php echo $id_curso[$indice];?>"><?php echo $curso[$indice]." ->". $fecha[$indice];?></option>
        <?php } ?>
    </select><br/><br/>
   <b> Elije </b>
    <select  id="exp_prueba" name="excepcionesPrba" >
        <option value="0">Seleccionar.</option>
        <option value="1">Alumnos que rindieron Prueba.</option>
        <option value="2">Alumnos NO rindiendo Prueba.</option>
    </select><br/><br/>
    <input type="button" value="Ver" id="ver">
   </form>
    </div>
        
</div>
<div id="resp_excepcion"></div>

<script>
$(document).ready(function(){

$('#ver').click(function(){
	var dat = $('#fe').serialize();

	$('#resp_excepcion').load('?controlador=Profesor&accion=excepcion', $('#fe').serialize());

	
});

	


});
</script>