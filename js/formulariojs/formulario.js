$(document).ready(function(){

    $('#contact-form').jqTransform();

    $("button").click(function(){ $(".formError").hide();});

    var use_ajax=true;
    $.validationEngine.settings={};

    $("#contact-form").validationEngine({
	inlineValidation: false,
	promptPosition: "centerRight",
	success :  function(){use_ajax=true},
	failure : function(){use_ajax=false;}
     })
    
    $("#contact-form").submit(function(e){
	
    if(!$('#subject').val().length){
    $.validationEngine.buildPrompt(".jqTransformSelectWrapper","* Se requiere la información de este campo","error")
    return false;}
			
    if(use_ajax){
	$('#loading').css('visibility','visible');
	$.post('?controlador=Index&accion=formsubmit',$(this).serialize()+'&ajax=1',
				
	    function(data){
		if(parseInt(data)==-1)
		    $.validationEngine.buildPrompt("#captcha","* Error en la suma de los dígitos !!!","error");
		else{ $("#contact-form").hide('slow').after('<h1>Gracias por tu interés!</h1>');}

		$('#loading').css('visibility','hidden');}		
		
	);}

	e.preventDefault();

	})



    });
