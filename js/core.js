$(document).ready(function() {
/* ************************* */
//@Author: Ignacio Peña
//@website: www.proyectonst.cl
//@email: ignacio.pena87@yahoo.es
//@license: GNU/GPL
/* ************************* */
$('#menu_desplegable').hide();
	
var main = $("#main");
var taskbar = $("#taskbar");
var clock = $("#clock");
var menu_taskbar = $(".menu_taskbar");
var mouseDiffY = 0;
var mouseDiffX = 0;
var mouseActiveIcon = 0;
var mouseActiveCloneIcon = 0;

/*  Efecto reloj tiempo real */
function updateClock(){
    var ahora = new Date();
    var hora = ahora.getHours();
	if(hora < 10) hora = "0" + hora;
    var min = ahora.getMinutes();
	if(min < 10) min = "0" + min;
    var sec = ahora.getSeconds();
	if(sec < 10) sec = "0" + sec;
/* Se muestra por pantalla el reloj actualizando por segundo */
	clock.html(hora + " : " + min + " : " + sec);}

/*llamada para obtener la hora del computador cliente*/
    intervalos();
    function intervalos(){setInterval(updateClock, 1000);}
    $("#clock").show();
    taskbar.slideDown();

/* Salida, cierre de sessión */
$("#logout").click(function(){$.post("?controlador=Nst&accion=logout");document.location='?controlador=Index';});

	
/* ********************************************************************	*/	
/* ********************************************************************	*/	
/* ********************************************************************	*/
/*									*/
/*	Function con la que se pretende simular el efecto del botón 
 *  derecho. Se utiliza "contexmenu" con Jquery.
 */
    var windowwidth;
    var windowheight;
    var checkmenu;
    var menuInicio;
    $(window).ready(function() {

/* ********************************************************************	*/
/* Detecta el div ( 'main' ) y dispara el menu 						*/
/* ********************************************************************	*/
		
    $('#main').bind("contextmenu",function(e){
	windowwidth = $(window).width();
	windowheight = $(window).height();
	checkmenu = 1;
	$('#mask').css({
	    'height': windowheight,
	    'width': windowwidth
	});
			
    $('#menu_desplegable').show("slow");  
			
    $('#menu_desplegable').css({
	'top':e.pageY+'px',
	'left':e.pageX+'px'
	});
	return false;
    });

/* ********************************************************************	*/
/* Si hago click fuera del menu desplegable, realice un hide("fast")	*/					
/* ********************************************************************	*/
    $('#mask').click(function(){
	$(this).height(0);
	$(this).width(0);
	$('#menu_desplegable').hide("fast");
	checkmenu = 0;
	return false;
    });

/* ********************************************************************	*/
/*Si se presiona el boton derecho se realiza un hide("fast"),			*/
/*	pero como se presiona el botón derecho, se show() otro menú 		*/
/*	desplegable						    		*/
/* ********************************************************************	*/

$('#mask').bind("contextmenu",function(){
    $(this).height(0);
    $(this).width(0);
    $('#menu_desplegable').hide("fast");
    checkmenu = 0;
    return false;
});
	
    $(window).resize(function(){
	if(checkmenu == 1) {
	    windowwidth = $(window).width();
	    windowheight = $(window).height();
	    $('#mask').css({
		'height': windowheight,
		'width': windowwidth,
		});
	}
    });
    	
    return false;
});

/* **********	    Fin MEnu desplegable()		***********	*/
/* ********************************************************************	*/
/* ********************************************************************	*/
/*									*/
/* 		Menu de inicio PNST						*/
/*									*/
/* ********************************************************************	*/
	
$("#menu").jSlickmenu({
		speed : 100,
		fadeopacity : 0.4,
		infomargin : 15,
		leftmargin : 110,
		css3rotate : true,
		css3shadow : '#000 5px 10px 10px',
		css3borderradius : 3,
		borderneutral : 5,
		borderhover : 10
});

$('#respuesta').hide();
/*VISOR DE EXCEPCIONES ALUMNO*/
$("#exp_prueba").bind("click", function(event){
            $('#respuesta').show();
            $('#respuesta').load('?controlador=Profesor&accion=exp_prueba');});
$("#exp_prueba").bind("dblclick", function(){ $('#respuesta').hide(); });


/*REGISTRO DE PROFESORES*/
$("#profesores").bind("click", function(event){
	    $('#respuesta').show();
	    $('#respuesta').load('?controlador=Profesor&accion=registro_prof');});
$("#profesores").bind("dblclick", function(){ $('#respuesta').hide(); });

/*ACTUALIZA DATOS PROFESORES*/
$("#perfilProf").bind("click", function(event){
	    $('#respuesta').show();
	    $('#respuesta').load('?controlador=Profesor&accion=actualizaPerfil');});
$("#perfilProf").bind("dblclick", function(){ $('#respuesta').hide(); });

/*ACTUALIZA DATOS PROFESORES*/
$("#perfilDir").bind("click", function(event){
	    $('#respuesta').show();
	    $('#respuesta').load('?controlador=Profesor&accion=actualizaDir');});
$("#perfilDir").bind("dblclick", function(){ $('#respuesta').hide(); });




/*REGISTRO DE PRUEBAS*/
$("#pruebas").bind("click", function(event){
	    $('#respuesta').show();
	    $('#respuesta').load('?controlador=Prueba&accion=registro_prba');});
$("#pruebas").bind("dblclick", function(){ $('#respuesta').hide(); });


/*REGISTRO DE ALUMNOS*/
$("#alumno").bind("click", function(event){
	    $('#respuesta').show();
	    $('#respuesta').load('?controlador=Alumno&accion=registro_curso_almn');});
$("#alumno").bind("dblclick", function(){ $('#respuesta').hide(); });

/*RESULTADOS REPORTES PROF*/
$("#resultados").bind("click", function(event){
	    $('#respuesta').show();
	    $('#respuesta').load('?controlador=Informes&accion=tabla_informes');});
$("#resultados").bind("dblclick", function(){ $('#respuesta').hide();});

/*RESULTADOS REPORTES DIR*/
$("#resultadosDir").bind("click", function(event){
	    $('#respuesta').show();
	    $('#respuesta').load('?controlador=Informes&accion=tabla_informesDir');});
$("#resultadosDir").bind("dblclick", function(){ $('#respuesta').hide();});


/*SUCESOS PROFESOR*/
$("#sucesosProf").bind("click", function(event){
	    
	$('#respuesta').show();
	
	    $('#respuesta').load('?controlador=Informes&accion=sucesos_Prof', function(e){
	
		if(e == '2'){ alert('No tienes datos por el momento')
		$('#respuesta').hide();
		
		}
	    });
	});
$("#sucesosProf").bind("dblclick", function(){ $('#respuesta').hide();});


/*    $('.menu_taskbar').dblclick(function(){$('#respuesta').hide();});

    $("#profesores").click(function(){ 
	    $('#respuesta').show();
	    $('#respuesta').load('?controlador=Profesor&accion=registro_prof'); });

    $("#pruebas").click(function(){
	    $('#respuesta').show();
	    $('#respuesta').load('?controlador=Prueba&accion=registro_prba');});

    $("#alumno").click(function(){
	    $('#respuesta').show();
	    $("#respuesta").load("?controlador=Alumno&accion=registro_curso_almn");});

    $("#resultados").click(function(){
	    $('#respuesta').show();
	    $("#respuesta").load("?controlador=Informes&accion=tabla_informes");});
*/

/* ***************************************************************/    
/*    FIN 						*/
});
