$(document).ready(function() {
/* ************************* */
//@Author: Ignacio Peña
//@website: www.proyectonst.cl
//@email: ignacio.pena87@yahoo.es
//@license: GNU/GPL
//Script-Jquery: Grafico
//

$('#exportar').click(function(){
	$.post('?controlador=Informes&accion=exportar');
	});

return false;
});
