$(document).ready(function() {
$(function() { $("button, input:submit").button(); });

$('#btnResend').click(function(){
	$.post('?controlador=Nst&accion=mail_reenvio',$('#FormResend').serialize(), function(e){
			alert('Revisa tu correo')
		});
	});
	
	
$('#btnCambiar').click(function(){
	var passw = $('input[name=passw2]').val();
	$.post('?controlador=Nst&accion=camb_passw',{passw: passw}, function(e){
			alert('La contraseña se a actualizado.')
		});
	});

//VALIDA CODIGO
$('#btnCodigo').click(function(){
	
	var codigo = $('input[name=codigo]').val();
	var status=$("#status");
	status.removeClass("checked").removeClass("error")
	if(codigo.length > 0){
	$.ajax({
		  type:"POST",
			  url:"?controlador=Nst&accion=valCodnew",
			  data:"codigo="+codigo,
			  dataType:"json",
			  beforeSend:function(){
				  status.html("<img src='css/images/loading2.gif'/>");
				  
			  },
			  success:function(e){
				  if(e == true){
					status.addClass("checked");
					status.html("Código Correcto");
					$('#2Passw').show('slow');
					$('#codVer').hide('slow');
				 }else{
					status.addClass("error");
					status.html("Este código NO corresponde.");

				  }
			  }
			})
		  }else{
			  status.html("Te falta ingresar el código");
		  }
		
		});


//VALIDA MISMA CONTRASEÑA
$(function(){
		$("input[name=passw2]").keyup(function(e){
		  var passw1 = $(this).val();
		  var passw2 = $('input[name=passw2]').val();
		  var status2=$("#status2");
		  status2.removeClass("checked").removeClass("error")
		  if(passw1.length > 0){
		  	$.post('?controlador=Nst&accion=SamePassw',{passw1: passw1, passw2: passw2}, function(e){
			  if(e == true){
					status2.addClass("checked");
					status2.html("Contraseñas iguales.");
					$('#captcha').show('slow');

				 }else{
					status2.addClass("error");
					status2.html("Las contraseñas no coinciden.");
				  }
			  
			});
 	
			  
		  }else{
			  status2.html("Te falta llenar tu  nueva contraseña");
		  }
		});
	  })

		
	// VALIDA SUMA 02020
$(function(){
		$("input[name=suma]").keyup(function(e){
		  var suma = $(this).val();
		  var status1=$("#status1");
		  status1.removeClass("checked").removeClass("error")
		  if(suma.length > 0){
			$.ajax({
			  type:"POST",
			  url:"?controlador=Nst&accion=val_suma",
			  data:"suma="+suma,
			  dataType:"json",
			  beforeSend:function(){
				  status1.html("<img src='css/images/loading2.gif'/>");
				  
			  },
			  success:function(e){
				  if(e == true){
					status1.addClass("checked");
					$('#btnCambiar').show('slow');
				status1.html("Suma correcta.");

				 }else{
					status1.addClass("error");
				  status1.html("Suma incorrecta !!!.");

				  }
			  }
			})
		  }else{
			  status1.html("Te falta realizar la suma");
		  }
		});
	  })	
		
		
		
// VALIDA EMAIL
$(function(){
		$("input[name=email]").keyup(function(e){
		  var email = $(this).val();
		  var status=$("#status");
		  status.removeClass("checked").removeClass("error")
		  if(email.length > 0){
			$.ajax({
			  type:"POST",
			  url:"?controlador=Nst&accion=dispEmailPOST",
			  data:"email="+email,
			  dataType:"json",
			  beforeSend:function(){
				  status.html("<img src='css/images/loading2.gif'/>");
				  
			  },
			  success:function(e){
				  if(e == true){
					status.addClass("error");
					status.html("Este email NO se encuentra registrado en el sistema.");

				 }else{
					status.addClass("checked");
					status.html("Email correcto.");
					$('#captcha').show('slow');
				  }
			  }
			})
		  }else{
			  status.html("Te falta llenar tu email");
		  }
		});
	  })


// VALIDA SUMA
$(function(){
		$("input[name=suma]").keyup(function(e){
		  var suma = $(this).val();
		  var status1=$("#status1");
		  status1.removeClass("checked").removeClass("error")
		  if(suma.length > 0){
			$.ajax({
			  type:"POST",
			  url:"?controlador=Nst&accion=val_suma",
			  data:"suma="+suma,
			  dataType:"json",
			  beforeSend:function(){
				  status1.html("<img src='css/images/loading2.gif'/>");
				  
			  },
			  success:function(e){
				  if(e == true){
					status1.addClass("checked");
					$('#btnResend').show('slow');
				status1.html("Suma correcta.");

				 }else{
					status1.addClass("error");
				  status1.html("Suma incorrecta !!!.");

				  }
			  }
			})
		  }else{
			  status1.html("Te falta realizar la suma");
		  }
		});
	  })




});
