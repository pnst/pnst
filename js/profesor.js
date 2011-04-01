$(document).ready(function() {

/*
//@Author: Ignacio Peña
//@website: www.proyectonst.cl
//@email: ignacio.pena87@yahoo.es
//@license: 
//      This program is free software; you can redistribute it and/or modify
//      it under the terms of the GNU General Public License as published by
//      the Free Software Foundation; either version 2 of the License, or
//      (at your option) any later version.
//      
//      This program is distributed in the hope that it will be useful,
//      but WITHOUT ANY WARRANTY; without even the implied warranty of
//      MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
//      GNU General Public License for more details.
//      
//      You should have received a copy of the GNU General Public License
//      along with this program; if not, write to the Free Software
//      Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston,
//      MA 02110-1301, USA.
//
//Script-Jquery: Profesor
*/

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

/* ****************************************************************	*/ 
/* ****************************************************************	*/ 
/*					Registro de PRUEBAS		*/
/* ****************************************************************	*/  
/*									*/
/*			¿Cuál es la idea ?				    
 *		La idea es hacer más atractivo un simple y típico Form de 	
 * 	ingreso de datos. El Form tiene los siguientes inputs a 
 * 	llenar: Fecha, Código de Prueba, Formato de Prueba y Curso.
 * 
 *  	Se crean "3 pasos" para llenar el mismo Form, pero se le incluirán
 *  colores acentuando los datos.
 *  	
 *  		¿ Y como funciona?
 *  	El funcionamiento básico es esconder el "paso 2 y 3", 
 *  e ir mostrando los pasos a medida que se van completando
 *  dando la impresión  de que "aparece" el paso siguiente 
 *  y se esconde el actual.
 */
/*	Seteo de valor de iniciación	*/

$( "#fecha" ).datepicker({ 
    beforeShowDay: $.datepicker.noWeekends, 
    dateFormat: 'dd/mm/yy',
    autoSize: false,
    showButtonPanel: false,
    minDate:1, 
    maxDate: '2M',
});

$("#prba_registro_button").hide();

$("#curso").val('Elige el curso');

$.pasoDos_uno = "incompleto";

$.pasoDos_dos = "incompleto"; 

$("#paso_2 input[type=radio]").each(function(){ this.checked = false; });
	
/*	Escondiendo paso 2 y 3	*/
$("#paso_2").hide();

$("#paso_3").hide();

    
/*	Inicio Paso Uno	*/
pasoUno();


    	
/* ********************************************************************	*/	
/* ********************************************************************	*/
/*									*/
/* 			Inicio Primer Paso, elección del curso		*/
/*									*/
/* ********************************************************************	*/
function pasoUno(){
    
     $("#resp_listado_prba").load("?controlador=Prueba&accion=listado_prba");
	$("#paso_1").show("slow");
	$("#curso").change(function () {

	    		
	    $("#curso option:selected").each(function () {
		var curso_elegido = true;
		var curso = $("#curso").val();
						
		/*	Validando si la selección de curso = ''	*/			
		if ($("#curso").val()== '' ) { curso_elegido = false;$("#paso_2").hide();};
				
		/*	Validando si Profesor no tiene curso asignado = '-1'	*/			
		if ($("#curso").val()== '-1' ) {curso_elegido = false;
	    alert("No tienes asociado un curso, debes ponerte en contacto con el Director del establecimiento.")
		$("#paso_2").hide();};

		var curso = curso;
		/*	Validando si es "true" que un curso se ha elegido	*/
		if (curso_elegido) {$("#paso_1").animate({paddingBottom: "120px"}).css({"background-image": "url(css/images/gnome-acept.png)","background-position": "bottom center","background-repeat": "no-repeat"});
			
		/*	Se esconde el paso 1 y se muestra el paso dos	*/
		$("#paso_2 input[type=radio]").each(function(){this.checked = false;});
		$.pasoDos_uno = "incompleto";
		$.pasoDos_dos = "incompleto"; 
		$("#paso_2").show("slow");
		$("#paso_1").hide("slow");
				};
			});
		});
	};
	
	/* **********		    Fin PasoUno()		***********	*/
	/* ********************************************************************	*/
	/* ********************************************************************	*/	
	/* ********************************************************************	*/	
	/* ********************************************************************	*/
	/*									*/
	/* 	    Inicio Segundo Paso, elección Fecha y Formato		*/
	/*									*/
	/* ********************************************************************	*/
			
	function pasoDos() {

	    /*	Valido que los dos "radio" esten llenados   */
	    if (($.pasoDos_uno == "completo") && ($.pasoDos_dos == "completo")) {
		$("#paso_2").animate({paddingBottom: "120px"}).css({"background-image": "url(css/images/gnome-acept.png)","background-position": "bottom center","background-repeat": "no-repeat"});
		
		/*	Desmarco el "radio" en el paso 3	*/	
		$("#paso_3 input[type=radio]").each(function(){ this.checked = false; });
			
		/*	Muesto de forma lenta el paso 3	*/		
		$("#paso_3").show("slow");
			
		/*	Inicio Paso Tres	*/
		pasoTres();
		
		/*	Escondo de forma lenta el paso 2	*/
		$("#paso_2").hide("slow");
		}
	};

	$("#paso_2 input[name=formato_prueba]").click(function(){

	/*	 Si no se ha seleccionado Formato, tiene valor de "incompleto"	*/
	$.pasoDos_uno = "incompleto"; 	
	
	if ($("#formato_prueba").val('A') || $("#formato_prueba").val('B')){$.pasoDos_uno = "completo";}
		
	/*	Vuelta a la función Dos	*/
	pasoDos();
	});
	
	/* Validador dce Formato	*/
	$("#paso_2 input[name=confirma_formato]").click(function(){
	
	if ($("#confirma_formato_si:checked").val()) {	$.pasoDos_dos = "completo"; } 
	else { $.pasoDos_dos = "incompleto"; 
	
	/*	Marco en el Paso 1 el valor como 'Elige el curso'	*/
		$("#curso").val('Elige el curso');
		
	/*	Saco del paso uno la imagen de aceptación	*/	
		$("#paso_1").animate({paddingBottom: "20px"}).css({"background": "#dddddd"});
	
	/* Escondo paso Dos	*/
		$("#paso_2").hide("slow");
	
	/*Muestro paso Tres	*/
		$("#paso_1").show("slow");
		
	/*  FIN ELSE	*/
		};
		
	/*	Vuelta a la función Dos	*/
		pasoDos();
	});

	/* **********	    Fin PasoDos()			***********	*/
	/* ********************************************************************	*/
	/* ********************************************************************	*/	
	/* ********************************************************************	*/	
	/* ********************************************************************	*/
	/*									*/
	/* 			Inicio Tercer Paso, Resumen de datos  		*/
	/*									*/
	/* ********************************************************************	*/
	function pasoTres(){
	    $("#prba_registro_button").show("slow");
	    $("#prba_registro_button").click(function(data) {
	
	    $.post("?controlador=Prueba&accion=registro", $("form#formPrba").serialize(), function(data){

	    if(data == '1'){ $("#resp_listado_prba").load("?controlador=Prueba&accion=listado_prba");}  

	    if(data == '0'){alert('¡ Este curso ya tiene ingresado en el sistema las dos pruebas anuales !, Debes revisar el visor de pruebas.')}

	    if(data == '-1'){alert('¡ El formato de la prueba ya está en el sistema !, Recuerda que cada prueba tiene su formato según corresponda A ó B.')}

	    if(data == '-2'){alert('¡ Las fechas de las pruebas tienen un requisito mínimo: 1 mes entre aplicación de la primera prueba  y la segunda prueba !.')}

	    if(data == '-10'){alert('¡ Esto es vergonzoso ! Estamos experimentando problemas técnicos, prueba refrescando la página ó apretando la tecla F5.')}


	    });
		    
       /******	Escondo de forma lenta el paso 3 ******/
		    $("#prba_registro_button").hide("slow");
		    $("#paso_3").hide("slow");
		    
		    /**** Seteo de variables para un nuevo registro **/
		    $("#prba_registro_button").hide();
		    $.pasoDos_uno = "incompleto";
		    $.pasoDos_dos = "incompleto"; 
		    $("#paso_2 input[type=radio]").each(function(){ this.checked = false; });
	
		    /*	Marco en el Paso 1 el valor como 'Elige el curso'   ****/
		    $("#curso").val('Elige el curso');
		
		    /*	Saco del paso uno la imagen de aceptación   *****/
		    $("#paso_1").animate({paddingBottom: "20px"}).css({"background": "#dddddd"});
		    $("#paso_2").animate({paddingBottom: "20px"}).css({"background": "#fdf5ce"});

		    /*	Inicio Paso Uno	***/
		    $("#paso_1").show();
		});
	    };

/*****************************************************************************/
/*	    Muestro lista del curso
 *  La idea es que cuando el profesor indique el curso, se muestre la lista 
 *  del curso de forma dinámica.
 */
$("#almn_registro_button").click(function(){
	$.post("?controlador=Alumno&accion=insertar", $("#form_reg_alumn").serialize(), function(e){
		if (e == 1) alert('El rut no es v�lido. Rev�salo')
		if (e == 2) alert('El rut no es v�lido. Rev�salo')

	});

	var id_curso = $("#curso_alumno").val();
	$("#resp_listado_almn").load("?controlador=Alumno&accion=lista_curso_almn", {id_curso : id_curso});
    });

$("#curso_alumno").change(function () {
    //activo el select
    $("#curso_alumno option:selected").each(function () {
    //capturo el id del curso
	var id_curso=$(this).val();
	//envio id y cargo el div con la respuesta
	$("#resp_listado_almn").load("?controlador=Alumno&accion=lista_curso_almn", { id_curso: id_curso });
	});
    });


/**************** ACTUALIZA PERFIL DE PROFESOR ****************/
$("#prof_pefil").click(function(){
	$.post("?controlador=Profesor&accion=setPerfil", $("#form_reg_alumn").serialize(), function(e){
			if(e == 1)alert('¡Cuando vuelvas a inicializar tu sesión los cambios estarán listos!')
			if(e == 0)alert('¡El e-mail ya se encuentra registrado en el sistema!')
		});
    });


/**************** ACTUALIZA PERFIL DE DIRECTOR ****************/
$("#dir_pefil").click(function(){
	$.post("?controlador=Profesor&accion=setDir", $("#form_reg_alumn").serialize(), function(e){
			if(e == 1)alert('¡Cuando vuelvas a inicializar tu sesión los cambios estarán listos!')
			if(e == 0)alert('¡El e-mail ya se encuentra registrado en el sistema!')
		});
    });
    
/* ***************************************************************/    
/*    FIN DEL DOM						*/
});

// Verificamos disponibilidad de email.
$(function(){
		$("input[name=email]").keyup(function(e){
		  var email = $(this).val();
		  var status=$("#status");
		  status.removeClass("checked").removeClass("error")
		  if(email.length > 0){
			$.ajax({
			  type:"POST",
			  url:"?controlador=Nst&accion=dispEmail",
			  data:"email="+email,
			  dataType:"json",
			  beforeSend:function(){
				  status.html("<img src='css/images/loading2.gif'/>");
			  },
			  success:function(e){
				  if(e == true){
				  	$('#prof_pefil').show('slow');
				  	$('#dir_pefil').hide('slow');
					status.addClass("checked");
					status.html("Email disponible.");

				 }else{
					status.addClass("error");
					$('#prof_pefil').hide();
					$('#dir_pefil').hide();
				  	status.html("Este email ya se encuentra registrado en el sistema.");

				  }
			  }
			})
		  }else{
			  status.html("Te falta llenar tu email");
		  }
		});
	  })



