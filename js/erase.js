$(function() {
    
	$(document).mouseup(function() {
	    $("#loginform").mouseup(function() {return false});
	    $("a.cerrar").click(function(e){
		e.preventDefault();
		$("#loginform").hide();
                $(".lock").fadeIn("slow");
		});
	    
	    if ($("#loginform").is(":hidden")){ $(".lock").fadeOut();
                } else { $(".lock").fadeIn(); }				
		$("#loginform").toggle();
            });
             			
	    $("form#block_login_form").submit(function() {
		$.post("?controlador=Nst&accion=valida_login_prof", { email:$('input#email_login').val(),password:$('input#password_login').val(),rand:Math.random() }, function(data) {
	
	if(data=='-5'){  
	$("#loginform").show();
	/*e-mail no existe*/
	$("#message").html("¡Este usuario ya ha iniciado sesión!");
			$("#message").css({color:"red"});
      			$("#message").hide().fadeIn(1500);
      			$("input#email_login").focus();}

	    
	if(data=='-4'){  
	$("#loginform").show();
	/*e-mail no existe*/
	$("#message").html("¡Tenemos problemas técnicos!");
			$("#message").css({color:"red"});
      			$("#message").hide().fadeIn(1500);
      			$("input#email_login").focus();}

		    
	if(data=='-1'){  //campos vacios
	$("#loginform").show();
	$("#message").html("Debes llenar todos los campos");
			$("#message").css({color:"red"});
      			$("#message").hide().fadeIn(1500);
      			$("input#email_login").focus();}
	if(data=='-3'){  
	$("#loginform").show();
	/*e-mail no existe*/
	$("#message").html("El E-mail no existe en el sistema");
			$("#message").css({color:"red"});
      			$("#message").hide().fadeIn(1500);
      			$("input#email_login").focus();}
	if(data=='-2'){  
	$("#loginform").show();
	/*Contraseña no es correcta*/
	$("#message").html("La contraseña no es correcta");
			$("#message").css({color:"red"});
      			$("#message").hide().fadeIn(1500);
      			$("input#username").focus();}
	if(data=='1'){ 
	$("#loginform").show();
	$("#message").html("¡¡ Bienvenido !!");
			$("#message").css({color:"green"});
      			$("#message").hide().fadeTo(900,1,function(){
				document.location='?controlador=Nst&accion=dar_baja';});}
    });
return false;
});
    /* This is example of other button*/
	$("input#cancel_submit").click(function(e) {
		$("#loginform").hide();
                $(".lock").fadeIn();
	});		
});
