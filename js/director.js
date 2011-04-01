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

$("#resp_listado_profesor").load("?controlador=Profesor&accion=listado_prof");


/** Detecta el curso, coje el id_curso y lo encia a la función listado_profesor
 * para que muestre el profesro que está asociado a ese curso
 */
$("#curso_director").change(function () {

    //activo el select
    $("#curso_director option:selected").each(function () {
    //capturo el id del curso
    var id_curso=$(this).val();
    //envio id y cargo el div con la respuesta
    $("#resp_listado_profesor").load("?controlador=Profesor&accion=listado_profesor", { id_curso: id_curso });
    });
});



/* ***************************************************************/    
/*   FIN						*/
});
