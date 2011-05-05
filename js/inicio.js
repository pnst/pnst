$(document).ready(function() {
/* ******************************************************************/        
/* 		Jquery para el login y registro en PNST		    */
/* ******************************************************************/ 
/*  La idea es mostrar un cuadrado con el efecto fading que de 
/ * información al usuario que se está logueando
 */
	
$("#bienvenida").show();

$("#msgbox").hide();

$("form#login_form").submit(function(){


    /*Remuevo las clases,preparo terreno para el fading y cargo*/
    $("#msgbox").removeClass().addClass('messagebox').html('<img src="css/images/loader.gif"/>Verificando ').fadeIn(1000);

    /* metodo post, envio la información para que sea procesada*/
    $.post("?controlador=Nst&accion=valida_login_prof",{ ip:$('#ip').val(), email:$('#email').val(),password:$('#password').val(),rand:Math.random() } ,function(data){ 

    /**************************************************************************************
     * ***********************************************************************************/
    if(data==-5){  //campos vacios
	$("#msgbox").fadeTo(200,0.1,function(){ 

	var ingreso = 'Usuario ya ha Iniciado sesión';
	/* metodo post, envio la información para el log respectivo*/
	/*$.post("?controlador=Log&accion=inForm",{ip:$('#ip').val(),email:$('#email').val(), ingreso: ingreso}); */

	$(this).html('¡Este usuario ya ha iniciado sesión!').addClass('messageboxerror').fadeTo(900,1); });}

    /**************************************************************************************
     * ***********************************************************************************/

    if(data==-1){  //campos vacios
	$("#msgbox").fadeTo(200,0.1,function(){
	
	var ingreso = 'Campos Vacíos';
	/* metodo post, envio la información para el log respectivo*/
	/*$.post("?controlador=Log&accion=inForm",{ip:$('#ip').val(),email:$('#email').val(), ingreso: ingreso}); */

	$(this).html('¡Debes llenar todos los campos!').addClass('messageboxerror').fadeTo(900,1); });}

    /**************************************************************************************
     * ***********************************************************************************/

    if(data==-4){  
	/*Problemas, no se pudo cargar la variable de sesion $_SESSION['wraprof_SESION']*/
	$("#msgbox").fadeTo(200,0.1,function(){ 
	
	var ingreso = 'Problemas Técnicos';
	/* metodo post, envio la información para el log respectivo*/
	/*$.post("?controlador=Log&accion=inForm",{ip:$('#ip').val(),email:$('#email').val(), ingreso: ingreso}); */

	$(this).html('¡Tenemos problemas técnicos!').addClass('messageboxerror').fadeTo(900,1); }); }

    /**************************************************************************************
     * ***********************************************************************************/

    if(data==-3){  
	/*e-mail no existe*/
	$("#msgbox").fadeTo(200,0.1,function(){ 

	var ingreso = 'E-Mail NO Existe';
	/* metodo post, envio la información para el log respectivo*/
	/*$.post("?controlador=Log&accion=inForm",{ip:$('#ip').val(),email:$('#email').val(), ingreso: ingreso}); */

	$(this).html('¡El correo electrónico no existe!').addClass('messageboxerror').fadeTo(900,1); }); }

    /**************************************************************************************
    * ***********************************************************************************/

    if(data==-2){  
    /*Si el loguin es correcto*/
	$("#msgbox").fadeTo(200,0.1,function(){ 

	var ingreso = 'Password INCORRECTA';
	/* metodo post, envio la información para el log respectivo*/
	/*$.post("?controlador=Log&accion=inForm",{ip:$('#ip').val(),email:$('#email').val(), ingreso: ingreso}); */

	$(this).html('La contraseña no corresponde.....').addClass('messageboxerror').fadeTo(900,1);}); }

    /**************************************************************************************
     * ***********************************************************************************/
	
    if(data==1){  
    /*cargando..... e ingresando*/
    $("#msgbox").fadeTo(200,0.1,function(){ 
	$(this).html('Ingresando.....')
	.addClass('messageboxok')
	.fadeTo(900,1,function() { 
	
	var ingreso = 'correcto';
	/* metodo post, envio la información para el log respectivo*/
	/*$.post("?controlador=Log&accion=inForm",{ip:$('#ip').val(),email:$('#email').val(), ingreso: ingreso}); */
	
	/* Redirigir al Panel*/ 
	document.location='?controlador=Panel'; }); 
	});}

    /**************************************************************************************
     * ***********************************************************************************/

/*FIN $.post*/
    });
return false; 
});
		




/* ************************************************************************	*/        
/* Formato por defecto de todos los botones y link con el theme css			*/
/* ************************************************************************	*/ 
/*																			*/
/* $(function(){															*/
/* $("button, input:submit, a", ".container").button();});					*/
/* ************************************************************************	*/  
/* ************************************************************************	*/        
/* *****	Formato usando el Theme+ Css de Jquery-Ui				*******	*/        
/* *****	para dar formato s�lamente a los botones				*******	*/ 
/* ************************************************************************	*/ 
$(function() { $("button, input:submit").button(); });

/*Envío de id_prba y redirige a web de login prueba*/
$('.prba').click(function(){
$.post('?controlador=Nst&accion=seprba_id',{id_prba: $(this).parent().attr('id')}, function(){
    document.location='?controlador=Nst&accion=login_prba';
    });
});

/* Evalua la información enviada por el servidor y redirige*/
$('#btnprba_login').click(function(){
	var cod_prba_user = $('#cod_prba_user').val();

	$.post('?controlador=Nst&accion=validar_log_prba',{ cod_prba_user : cod_prba_user},function(data){ 
    
	if(data=='-1'){  //campos vacios
	$("#msgbox").fadeTo(200,0.1,function(){ 
	$(this).html('¡Debes introducir la contraseña!').addClass('messageboxerror').fadeTo(900,1); });}
	
    if(data=='0'){  
	/*Problemas, no se pudo cargar la variable de sesion $_SESSION['wraprof_SESION']*/
	$("#msgbox").fadeTo(200,0.1,function(){ 
	$(this).html('¡La contraseña es incorrecta!').addClass('messageboxerror').fadeTo(900,1); }); }
    
    if(data=='1'){  
    /*cargando..... e ingresando*/
    $("#msgbox").fadeTo(200,0.1,function(){ 
	$(this).html('Contraseña correcta.....')
	.addClass('messageboxok')
	.fadeTo(900,1,function() { document.location='?controlador=Alumno&accion=listado_almn_prba'; }); });}

    });	
});




});
