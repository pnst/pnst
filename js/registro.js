$(document).ready(function(){

    $('#regForm').submit(function(e) { register(); e.preventDefault(); });
});

function register(){

    hideshow('loading',1);
    error(0);
	
    $.ajax({
	type: "POST",
	url: "?controlador=Nst&accion=val_registro",
	data: $('#regForm').serialize(),
	dataType: "json",
	success: function(msg){
	    
	    if(msg==1){
	    $.post('?controlador=Log&accion=inReg', $('#regForm').serialize());alert('asd')
	    location.href='?controlador=Nst&accion=registrado';
	    
	    }
	    
	    else 
	    if(parseInt(msg.status)==0)error(1,msg.txt);
	    
	    hideshow('loading',0);
	    }
	});

}


function hideshow(el,act){
	if(act) $('#'+el).css('visibility','visible');
	else $('#'+el).css('visibility','hidden');
}

function error(act,txt){
	hideshow('error',act);
	if(txt) $('#error').html(txt);
}

function suggest(inputString){
    
    if(inputString.length == 0) { $('#suggestions').fadeOut();} 
    else {
	$('#colegio').addClass('load');
	$.post("?controlador=Nst&accion=colegios", {colegio: ""+inputString+""}, function(data){
	    if(data.length >0){
		$('#suggestions').fadeIn();
		$('#suggestionsList').html(data);
		$('#colegio').removeClass('load');
	    }
	});
    }
}

function fill(thisValue) {
    $('#colegio').val(thisValue);
    setTimeout("$('#suggestions').fadeOut();", 600);}

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
					status.addClass("checked");
				status.html("Email disponible.");

				 }else{
					status.addClass("error");
				  status.html("Este email ya se encuentra registrado en el sistema.");

				  }
			  }
			})
		  }else{
			  status.html("Te falta llenar tu email");
		  }
		});
	  })
