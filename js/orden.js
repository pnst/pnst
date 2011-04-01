$(document).ready(function(){
    







function register(){

    hideshow('loading',1);
    error(0);
	
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

});
