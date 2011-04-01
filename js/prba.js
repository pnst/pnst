$(document).ready(function() {
/* ************************* */
//@Author: Ignacio Peña
//@website: www.proyectonst.cl
//@email: ignacio.pena87@yahoo.es
//@license: GNU/GPL
//Script-Jquery: Profesor
//
/* ************************************************************************	*/        
/* Formato por defecto de todos los botones y link con el theme css		*/
/* ************************************************************************	*/ 
/*										*/
/* $(function(){								*/
/* $("button, input:submit, a", ".container").button();});			*/
/* ************************************************************************	*/  
/* ************************************************************************	*/        
/* *****	Formato usando el Theme+ Css de Jquery-Ui		*******	*/        
/* *****	para dar formato s�lamente a los botones		*******	*/ 
/* ************************************************************************	*/ 


	
$(function() { $("button, input:submit").button(); });

/* Envia id_alumno y envia al alumno a dar la prueba correspondiente*/
$('.alumno_prba').click(function(){
    $.post('?controlador=Prueba&accion=wra_respuestas', {id_alumno: $(this).parent().attr('id')}, function(data){
	document.location=data;
	var destino = data;
	window.open(destino,"","channelmode,fullscreen = yes, resizable=yes,scrollbars");
	window.close();
	location.href="?controlador=Index";
	});
    });

/*****************************************************************************/
/*****************************************************************************/
/*****************************************************************************/
/*Se recoge toda la informacion de ul y li, prueba->1A */
$("ul.sortable1a").sortable({
    connectWith:  '.sortable1a',
    opacity: 0.8,
    revert: true,    
});

/*****************************************************************************/
/* se recoge toda la informacion de ul y li, prueba->1A*/

$("#buttonprbaunoa").click(function() {
    
    if (confirm('¿Deseas finalizas la prueba?')){
	var posicion = $('.sortable1a').serial();
	var respUnoa = $("form#1a").serialize();
	var resp =  'posicion='+ posicion + '&respUnoa=' + respUnoa;
	
	$.post('?controlador=Prueba&accion=nstresp', resp);
	alert ("Haz finalizado la Prueba.");
	
	$.post('?controlador=Prueba&accion=terminaPrba');

	window.close() 
	}
});

/*****************************************************************************/
/*****************************************************************************/
/*Se recoge toda la informacion de ul y li, prueba->1B */
$("ul.sortable1b").sortable({
    connectWith:  '.sortable1b',
    opacity: 0.8,
    revert: true,    
});

/*****************************************************************************/
/* se recoge toda la informacion de ul y li, prueba->1A*/

$("#buttonprbaunob").click(function() {
    
    if (confirm('¿Deseas finalizas la prueba?')){
	var posicion = $('.sortable1b').serial();
	
	$.post('?controlador=Prueba&accion=nstresp', posicion);
	alert ("Haz finalizado la Prueba.");
	$.post('?controlador=Prueba&accion=terminaPrba');

	window.close() 
	}
});



/*****************************************************************************/
/*****************************************************************************/
/*****************************************************************************/
/*Se recoge toda la informacion de ul y li, prueba->2A */
$("ul.sortable2a").sortable({
    connectWith:  '.sortable2a',
    opacity: 0.8,
    revert: true,    
});

/* se recoge toda la informacion de ul y li, prueba->2A*/
$("#buttonprbadosa").click(function() {
    
    if (confirm('¿Deseas finalizas la prueba?')){
	var posicion = $('.sortable2a').serial();
	var respDosa = $("form#2a").serialize();
	var resp =  'posicion='+ posicion + '&respDosa=' + respDosa;
	
	$.post('?controlador=Prueba&accion=nstresp', resp);
	alert ("Haz finalizado la Prueba.");
	$.post('?controlador=Prueba&accion=terminaPrba');

	window.close() 
	}
});

/*****************************************************************************/
/*****************************************************************************/
/*****************************************************************************/
/* se recoge toda la informacion de ul y li, prueba->2B*/
$("ul.sortable2b").sortable({
    connectWith:  '.sortable2b',
    opacity: 0.8,
    revert: true,
});

/* al presional el botón de class="buttonprba"*/
$('#buttonprbadosb').click(function(){
 if (undefined === $("input[name='paseo1']:checked").val()) {
	alert("Te falta responder la pregunta '0.Salieron a pasear' del texto: 'José, Tomás y Francisco...'")
    }else{    if (undefined === $("input[name='paseo2']:checked").val()) {
	alert("Te falta responder la pregunta '1. Llevó las cosas de cocina.' del texto: 'José, Tomás y Francisco...'")
    }else{    if (undefined === $("input[name='paseo3']:checked").val()) {
	alert("Te falta responder la pregunta '2.Trajo ropa de abrigo' del texto: 'José, Tomás y Francisco...'")
    }else{    if (undefined === $("input[name='paseo4']:checked").val()) {
	alert("Te falta responder la pregunta '3.Hizo de cocinero' del texto: 'José, Tomás y Francisco...'")
    }else{    if (undefined === $("input[name='paseo5']:checked").val()) {
	alert("Te falta responder la pregunta '4.Llevaban mochila' del texto: 'José, Tomás y Francisco...'")
    }else{    if (undefined === $("input[name='paseo6']:checked").val()) {
	alert("Te falta responder la pregunta '5.Se ocuparon del fuego' del texto: 'José, Tomás y Francisco...'")
    }else{    if (undefined === $("input[name='paseo7']:checked").val()) {
	alert("Te falta responder la pregunta '6.Lavaron los platos' del texto: 'José, Tomás y Francisco...'")
    }else{

    if(confirm('¿Desea Finalizar la Prueba?')){
	/* Serializa el método sort y el formulario */
	var posicion = $('.sortable2b').serial();
	var respDosb = $("form#2b").serialize();
	var resp =  'posicion='+ posicion + '&respDosa=' + respDosb;

	$.post('?controlador=Prueba&accion=nstresp', resp);	
	alert("Haz finalizado la Prueba.");
	$.post('?controlador=Prueba&accion=terminaPrba');

	window.close(); 
	}
    }//fin else paseo 7
    }//fin else paseo 6
    }//fin else paseo 5
    }//fin else paseo 4
    }//fin else paseo 3
    }//fin else paseo 2
    }//fin else paseo 1

 });


/*****************************************************************************/
/*****************************************************************************/
/*****************************************************************************/
/* se recoge toda la informacion de ul y li, prueba->3A*/
$("ul.sortable3a").sortable({
    connectWith:  '.sortable3a',
    opacity: 0.8,
    revert: true,
});
/* al presional el botón de class="buttonprba"*/
$('#buttonprbatresa').click(function(){
    /********* Pregunta 1 **************************************************************/
    if (undefined === $("input[name='paseo1']:checked").val()) {
	alert("Te falta responder la pregunta '0.Salieron a pasear' del texto: 'José, Tomás y Francisco...'")
    }else{
    if (undefined === $("input[name='paseo2']:checked").val()) {
	alert("Te falta responder la pregunta '1. Llevó las cosas de cocina.' del texto: 'José, Tomás y Francisco...'")
    }else{
    if (undefined === $("input[name='paseo3']:checked").val()) {
	alert("Te falta responder la pregunta '2.Trajo ropa de abrigo' del texto: 'José, Tomás y Francisco...'")
    }else{
    if (undefined === $("input[name='paseo4']:checked").val()) {
	alert("Te falta responder la pregunta '3.Hizo de cocinero' del texto: 'José, Tomás y Francisco...'")
    }else{
    if (undefined === $("input[name='paseo5']:checked").val()) {
	alert("Te falta responder la pregunta '4.Llevaban mochila' del texto: 'José, Tomás y Francisco...'")
    }else{
    if (undefined === $("input[name='paseo6']:checked").val()) {
	alert("Te falta responder la pregunta '5.Se ocuparon del fuego' del texto: 'José, Tomás y Francisco...'")
    }else{
    if (undefined === $("input[name='paseo7']:checked").val()) {
	alert("Te falta responder la pregunta '6.Lavaron los platos' del texto: 'José, Tomás y Francisco...'")
    }else{
    /************ pregunta 2 ********************************************************************/
    if (undefined === $("input[name='playa1']:checked").val()) {
	alert("Te falta responder la pregunta '0.Los niños fueron solos a la playa' del texto: 'Un paseo a la playa'")
    }else{
    if (undefined === $("input[name='playa2']:checked").val()) {
	alert("Te falta responder la pregunta '1.A la playa fue una sola familia' del texto: 'Un paseo a la playa'")
    }else{
    if (undefined === $("input[name='playa3']:checked").val()) {
	alert("Te falta responder la pregunta '2.Daban ganas de bañarse' del texto: 'Un paseo a la playa'")
    }else{
    if (undefined === $("input[name='playa4']:checked").val()) {
	alert("Te falta responder la pregunta '3.Los papás descansaron y jugaron' del texto: 'Un paseo a la playa'")
    }else{
    if (undefined === $("input[name='playa5']:checked").val()) {
	alert("Te falta responder la pregunta '4.Las mamás estuvieron muy calladas' del texto: 'Un paseo a la playa'")
    }else{
    if (undefined === $("input[name='playa6']:checked").val()) {
	alert("Te falta responder la pregunta '5.A algunos el paseo no les gustó' del texto: 'Un paseo a la playa'")
    }else{
    /************ pregunta 3 ********************************************************************/
    if (undefined === $("input[name='3a11']:checked").val()) {
	alert("Te falta responder la pregunta '0.No cesar de hacerle preguntas a alguien,...' del texto: 'Estar satisfecho'")
    }else{
     if (undefined === $("input[name='3a12']:checked").val()) {
	alert("Te falta responder la pregunta '1.Estar satisfecho con lo que se ve, ...' del texto: 'Estar satisfecho'")
    }else{
     if (undefined === $("input[name='3a13']:checked").val()) {
	alert("Te falta responder la pregunta '2.Aprovechar cualquier oportunidad,...' del texto: 'Estar satisfecho'")
    }else{
    if (undefined === $("input[name='3a14']:checked").val()) {
	alert("Te falta responder la pregunta '3.Sorprender a alquien, significa...' del texto: 'Estar satisfecho'")
    }else{
    /* Serializa el método sort y el formulario */
    if(confirm('¿Deseas Finalizar la Prueba?')){
	var posicion = $('.sortable3a').serial();
	var respDosa = $("form#3a").serialize();
	var resp =  'posicion='+ posicion + '&respDosa=' + respDosa;
    
	$.post('?controlador=Prueba&accion=nstresp', resp);	
	alert("Haz finalizado la Prueba.");
	$.post('?controlador=Prueba&accion=terminaPrba');
	window.close(); 
	}
    }//fin else 3a14
    }//fin else 3a13
    }//fin else 3a12
    }//fin else 3a11
    }//fin else playa 6
    }//fin else playa 5
    }//fin else playa 4
    }//fin else playa 3
    }//fin else playa 2
    }//fin else playa 1
    }//fin else paseo 7
    }//fin else paseo 6
    }//fin else paseo 5
    }//fin else paseo 4
    }//fin else paseo 3
    }//fin else paseo 2
    }//fin else paseo 1
});
/*****************************************************************************/
/*****************************************************************************/
/*****************************************************************************/
/*se recoge toda la informacion de ul y li, prueba->3B */
$("ul.sortable3b").sortable({
    connectWith:  '.sortable3b',
    opacity: 0.8,
    revert: true,
});
/* al presional el botón de class="buttonprba"*/
$('#buttonprbatresb').click(function(){
    /************ pregunta 1 ********************************************************************/
    if (undefined === $("input[name='dep1']:checked").val()) {
	alert("Te falta responder la pregunta '0. El equipo verde' del texto: 'Noticias deportivas'")
    }else{
    if (undefined === $("input[name='dep2']:checked").val()) {
	alert("Te falta responder la pregunta '1. El equipo celeste' del texto: 'Noticias deportivas'")
    }else{
    if (undefined === $("input[name='dep3']:checked").val()) {
	alert("Te falta responder la pregunta '2. El equipo azul' del texto: 'Noticias deportivas'")
    }else{
    if (undefined === $("input[name='dep4']:checked").val()) {
	alert("Te falta responder la pregunta '3. El equipo amarillo' del texto: 'Noticias deportivas'")
    }else{
    if (undefined === $("input[name='dep5']:checked").val()) {
	alert("Te falta responder la pregunta '4. El equipo blanco' del texto: 'Noticias deportivas'")
    }else{
    if (undefined === $("input[name='dep6']:checked").val()) {
	alert("Te falta responder la pregunta '5. El equipo lila' del texto: 'Noticias deportivas'")
    }else{
    if (undefined === $("input[name='dep7']:checked").val()) {
	alert("Te falta responder la pregunta '6. El equipo naranja' del texto: 'Noticias deportivas'")
    }else{
    if (undefined === $("input[name='dep8']:checked").val()) {
	alert("Te falta responder la pregunta '7. El equipo rojo' del texto: 'Noticias deportivas'")
    }else{
    /************ pregunta 2 ********************************************************************/
    if (undefined === $("input[name='aire1']:checked").val()) {
	alert("Te falta responder la pregunta '0. Leña se ...' del texto: 'Problemas con el aire'")
    }else{
    if (undefined === $("input[name='aire2']:checked").val()) {
	alert("Te falta responder la pregunta '1. Leña verde ...' del texto: 'Problemas con el aire'")
    }else{
    if (undefined === $("input[name='aire3']:checked").val()) {
	alert("Te falta responder la pregunta '2. Olor a comida.' del texto 'Problemas con el aire'")
    }else{
    if (undefined === $("input[name='aire4']:checked").val()) {
	alert("Te falta responder la pregunta '3. Ollas sin tapa' del texto: 'Problemas con el aire'")
    }else{
    if (undefined === $("input[name='aire5']:checked").val()) {
	alert("Te falta responder la pregunta '4. Tapas para las ollas' del texto: 'Problemas con el aire'")
    }else{
    /************ pregunta 3 ********************************************************************/
    if (undefined === $("input[name='3b11']:checked").val()) {
	alert("Te falta responder la pregunta '0.Estar satisfecho con lo que se ve...' del texto: 'Estar satisfecho'")
    }else{
    if (undefined === $("input[name='3b12']:checked").val()) {
	alert("Te falta responder la pregunta '1.Sorprender a alguien, significa...' del texto: 'Estar satisfecho'")
    }else{
    if (undefined === $("input[name='3b13']:checked").val()) {
	alert("Te falta responder la pregunta '2.No cesar de hacerle preguntas...' del texto: 'Estar satisfecho'")
    }else{
    if (undefined === $("input[name='3b14']:checked").val()) {
	alert("Te falta responder la pregunta '3.Alterarle los nervios a alguien,...' del texto: 'Estar satisfecho'")
    }else{
    if(confirm('¿Deseas Finalizar la Prueba?')){
	var posicion = $('.sortable3b').serial();
	var respDosa = $("form#3b").serialize();
	var resp =  'posicion='+ posicion + '&respDosa=' + respDosa;

	$.post('?controlador=Prueba&accion=nstresp', resp);	
	alert("Haz finalizado la Prueba.");

	$.post('?controlador=Prueba&accion=terminaPrba');
	window.close(); 
	}
    }//fin else 3b14
    }//fin else 3b13
    }//fin else 3b12
    }//fin else 3b11
    }//fin else aire5
    }//fin else aire4
    }//fin else aire3
    }//fin else aire2
    }//fin else aire1
    }//fin else dep8
    }//fin else dep7
    }//fin else dep6
    }//fin else dep5
    }//fin else dep4
    }//fin else dep3
    }//fin else dep2
    }//fin else dep1
});

/*****************************************************************************/
/*****************************************************************************/
/*****************************************************************************/
/*Function que irdena los "li" donde
 * se ubican los cuadros. Ayuda al 
 * método sortable a mantener ordenados
 * mediante array los "recuadros" (li)
 */
(function($) {
    $.fn.serial = function() {
    var array = [];
    var $elemento = $(this);
    $elemento.each(function(i) {
	var id_elementos = this.id;
	$('li', this).each(function(e) {
	    array.push(id_elementos + '[' + e + ']=' + this.id);
	});
    });
    return array.join('&');
    }
})(jQuery);

/*****************************************************************************/
/*****************************************************************************/
/*****************************************************************************/
/*recojo datos de la prueba 4 Formato A*/
$("#buttonCuatroa").click(function() {
    if (undefined === $("input[name='4a11']:checked").val()) {
	alert("Te falta responder la pregunta '0.El pinito quería transformarse...' del texto: 'El pinito descontento'")
    }else{   
    if (undefined === $("input[name='4a12']:checked").val()) {
	alert("Te falta responder la pregunta '1.El pinito está descontento...' del texto: 'El pinito descontento'")
    }else{
    if (undefined === $("input[name='4a13']:checked").val()) {
	alert("Te falta responder la pregunta '2.Al pinito terminaron por no gustarle...' del texto: 'El pinito descontento'")
    }else{
    if (undefined === $("input[name='4a14']:checked").val()) {
	alert("Te falta responder la pregunta '3.El pinito se dio cuenta que no era bueno...' del texto: 'El pinito descontento'")
    }else{
    if (undefined === $("input[name='4a15']:checked").val()) {
	alert("Te falta responder la pregunta '4.El que se porta como si fuera una persona...' del texto: 'El pinito descontento'")
    }else{
    /************ pregunta 2 ********************************************************************/
    if (undefined === $("input[name='4a21']:checked").val()) {
	alert("Te falta responder la pregunta '1.De acuerdo con la lectura,...' del texto: 'Un viajero espacial'")
    }else{
    if (undefined === $("input[name='4a22']:checked").val()) {
	alert("Te falta responder la pregunta '2.De acuerdo a lo que dice Pablo,...' del texto: 'Un viajero espacial'")
    }else{
    if (undefined === $("input[name='4a23']:checked").val()) {
	alert("Te falta responder la pregunta '3.Pablo dice que los gases que hay en las estrellas...' del texto: 'Un viajero espacial'")
    }else{
    if (undefined === $("input[name='4a24']:checked").val()) {
	alert("Te falta responder la pregunta '4.Según Pablo, las estrellas...' del texto: 'Un viajero espacial'")
    }else{
    if (undefined === $("input[name='4a25']:checked").val()) {
	alert("Te falta responder la pregunta '5.Los planetas se diferenciasn de las estrellas...' del texto: 'Un viajero espacial'")
    }else{
    if (undefined === $("input[name='4a26']:checked").val()) {
	alert("Te falta responder la pregunta '6.Un planeta es un cuerpo...' del texto: 'Un viajero espacial'")
    }else{
    if (undefined === $("input[name='4a27']:checked").val()) {
	alert("Te falta responder la pregunta '7.Como resultado de la conversación...' del texto: 'Un viajero espacial'")
    }else{
    /************ pregunta 3 ********************************************************************/
    if (undefined === $("input[name='4a31']:checked").val()) {
	alert("Te falta responder la pregunta '0.La primera vez que el vigía...' del texto: 'La ballena y el vigía(1ª. parte)'")
    }else{
    if (undefined === $("input[name='4a32']:checked").val()) {
	alert("Te falta responder la pregunta '1.La ballena del relato tenía:' del texto: 'La ballena y el vigía(1ª. parte)'")
    }else{
    if (undefined === $("input[name='4a33']:checked").val()) {
	alert("Te falta responder la pregunta '2.Los hechos que se cuentan...' del texto: 'La ballena y el vigía(1ª. parte)'")
    }else{
    if (undefined === $("input[name='4a34']:checked").val()) {
	alert("Te falta responder la pregunta '3.El viaje realizado por los tripulantes....' del texto: 'La ballena y el vigía(1ª. parte)'")
    }else{
    /************ pregunta 4 ********************************************************************/
    if (undefined === $("input[name='ball1']:checked").val()) {
	alert("Te falta responder la pregunta '0.Ancla' del texto: 'La ballena y el vigía(2ª. parte)'")
    }else{
    if (undefined === $("input[name='ball2']:checked").val()) {
	alert("Te falta responder la pregunta '1.Ancla' del texto: 'La ballena y el vigía(2ª. parte)'")
    }else{
   if (undefined === $("input[name='ball3']:checked").val()) {
	alert("Te falta responder la pregunta '2.Arponero' del texto: 'La ballena y el vigía(2ª. parte)'")
    }else{
    if (undefined === $("input[name='ball4']:checked").val()) {
	alert("Te falta responder la pregunta '3.Megáfono' del texto: 'La ballena y el vigía(2ª. parte)'")
    }else{
    if (undefined === $("input[name='ball5']:checked").val()) {
	alert("Te falta responder la pregunta '4.Popa' del texto: 'La ballena y el vigía(2ª. parte)'")
    }else{
    
    if(confirm('¿Desea Finalizar la Prueba?')){
	$.post('?controlador=Prueba&accion=nstresp', $("form#4a").serialize());	
	alert("Haz finalizado la Prueba.");
	$.post('?controlador=Prueba&accion=terminaPrba');
	window.close(); 
	}
    
    }//fin else ball5
    }//fin else ball4
    }//fin else ball3
    }//fin else ball2
    }//fin else ball1
    }//fin else 4a34    
    }//fin else 4a33
    }//fin else 4a32
    }//fin else 4a31
    }//fin else 4a27
    }//fin else 4a26
    }//fin else 4a25
    }//fin else 4a24
    }//fin else 4a23
    }//fin else 4a22
    }//fin else 4a21
    }//fin else 4a15
    }//fin else 4a14
    }//fin else 4a13
    }//fin else 4a12
    }//fin else 4a11
}); //fin funcion button

/*****************************************************************************/
/*****************************************************************************/
/*****************************************************************************/
/*recojo datos de la prueba 4 Formato B*/
$("#buttonCuatrob").click(function() {
    if (undefined === $("input[name='4b11']:checked").val()) {
	alert("Te falta responder la pregunta '0.El pinito quería transformarse...' del texto: 'El pinito descontento'")
    }else{
    if (undefined === $("input[name='4b12']:checked").val()) {
	alert("Te falta responder la pregunta '1.El pinito está descontento...' del texto: 'El pinito descontento'")
    }else{
    if (undefined === $("input[name='4b13']:checked").val()) {
	alert("Te falta responder la pregunta '2.Al pinito terminaron por no gustarle...' del texto: 'El pinito descontento'")
    }else{
    if (undefined === $("input[name='4b14']:checked").val()) {
	alert("Te falta responder la pregunta '3.El pinito se dio cuenta que no era bueno...' del texto: 'El pinito descontento'")
    }else{
    if (undefined === $("input[name='4b15']:checked").val()) {
	alert("Te falta responder la pregunta '4.El que se porta como si fuera una persona...' del texto: 'El pinito descontento'")
    }else{
    /************ pregunta 2 ********************************************************************/
    if (undefined === $("input[name='4b21']:checked").val()) {
	alert("Te falta responder la pregunta '0. De acuerdo a todo lo que se dice,...' del texto: 'Días de aprendizaje'")
    }else{
    if (undefined === $("input[name='4b22']:checked").val()) {
	alert("Te falta responder la pregunta '1. La madre del hipopótamo joven...' del texto: 'Días de aprendizaje'")
    }else{
    if (undefined === $("input[name='4b23']:checked").val()) {
    alert("Te falta responder la pregunta '2. La madre hace caminar al pequeño...' del texto: 'Días de aprendizaje'")
    }else{
     if (undefined === $("input[name='4b24']:checked").val()) {
    alert("Te falta responder la pregunta '3. Los seres que aprenden gracias a ...' del texto: 'Días de aprendizaje'")
    }else{
    if (undefined === $("input[name='4b25']:checked").val()) {
	alert("Te falta responder la pregunta '4. Los mamíferos son animales que se ...' del texto: 'Días de aprendizaje'")
    }else{
    if (undefined === $("input[name='4b26']:checked").val()) {
	alert("Te falta responder la pregunta '5. Una de las cosas importantes que los...' del texto: 'Días de aprendizaje'")
    }else{
    if (undefined === $("input[name='4b27']:checked").val()) {
	alert("Te falta responder la pregunta '6. Los mamíferos recién nacidos...' del texto: 'Días de aprendizaje'")
    }else{
    if (undefined === $("input[name='4b28']:checked").val()) {
	alert("Te falta responder la pregunta '7. El modo de aprender de las crías...' del texto: 'Días de aprendizaje'")
    }else{

    /************ pregunta 3 ********************************************************************/
    if (undefined === $("input[name='4b31']:checked").val()) {
	alert("Te falta responder la pregunta '0.La primera vez que el vigía...' del texto: 'La ballena y el vigía(1ª. parte)'")
    }else{
    if (undefined === $("input[name='4b32']:checked").val()) {
	alert("Te falta responder la pregunta '1.Los hechos que cuentan...' del texto: 'La ballena y el vigía(1ª. parte)'")
    }else{
    if (undefined === $("input[name='4b33']:checked").val()) {
	alert("Te falta responder la pregunta '2. El viaje realizado por los ...' del texto: 'La ballena y el vigía(1ª. parte)'")
    }else{
    if (undefined === $("input[name='4b34']:checked").val()) {
	alert("Te falta responder la pregunta '3.La segunda vez, la ballena...' del texto: 'La ballena y el vigía(1ª. parte)'")
    }else{
     /************ pregunta 4 ********************************************************************/
    if (undefined === $("input[name='ball1']:checked").val()) {
	alert("Te falta responder la pregunta '0.Ancla' del texto: 'La ballena y el vigía(2ª. parte)'")
    }else{
    if (undefined === $("input[name='ball2']:checked").val()) {
	alert("Te falta responder la pregunta '1.Proa' del texto: 'La ballena y el vigía(2ª. parte)'")
    }else{
   if (undefined === $("input[name='ball3']:checked").val()) {
	alert("Te falta responder la pregunta '2.Remeros' del texto: 'La ballena y el vigía(2ª. parte)'")
    }else{
    if (undefined === $("input[name='ball4']:checked").val()) {
	alert("Te falta responder la pregunta '3.Remos' del texto: 'La ballena y el vigía(2ª. parte)'")
    }else{
    if (undefined === $("input[name='ball5']:checked").val()) {
	alert("Te falta responder la pregunta '4.Timonel' del texto: 'La ballena y el vigía(2ª. parte)'")
    }else{
    
    if(confirm('¿Desea Finalizar la Prueba?')){
	   $.post('?controlador=Prueba&accion=nstresp', $("form#4b").serialize());	
	   alert("Haz finalizado la Prueba.");

	$.post('?controlador=Prueba&accion=terminaPrba');
	  window.close();
    }

    }//fin else ball5
    }//fin else ball4
    }//fin else ball3
    }//fin else ball2
    }//fin else ball1
    }//fin else 4b34
    }//fin else 4b33	
    }//fin else 4b32
    }//fin else 4b31
    }//fin else 4b28
    }//fin else 4b27
    }//fin else 4b26
    }//fin else 4b25
    }//fin else 4b24
    }//fin else 4b23
    }//fin else 4b22
    }//fin else 4b21
    }//fin else 4b15
    }//fin else 4b14
    }//fin else 4b13
    }//fin else 4b12
    }//fin else 4b11
}); //fin funcion button

return false;
});
