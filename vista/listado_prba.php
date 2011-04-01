<table>
    <thead>
	<tr>
	   <th>Asignatura</th>
	   <th>Curso</th>
	   <th>Formato</th>
	   <th>Fecha</th>
	   <th>Código</th>
	   <th>Estado</th>
	   <th>Acción</th>
	</tr>
    </thead>
    <tbody class="editable">
	<?php while($prba_prof = $listado_prueba->fetch()){ ?>
	<tr>
	    <td id="<?php echo "as?".$prba_prof['0']?>" class="asignatura_prba">
		    <?php echo $prba_prof['5'] ?></td>

	    <td id="<?php echo "cu?".$prba_prof['0']?>" class="curso_prba">
		    <?php echo $prba_prof['6'].$prba_prof['7'] ?></td>

	    <td id="<?php echo "for?".$prba_prof['0']?>" class="formato_prba">
		    <?php echo $prba_prof['1'] ?></td>

	    <td id="<?php echo "fe?".$prba_prof['0']?>" class="fecha_prba">
		    <?php echo $prba_prof['2'] = cambia_a_normal($prba_prof['2']); ?></td>

	    <td id="<?php echo "aa?".$prba_prof['0']?>" class="codigo_prba">
		    <?php echo $prba_prof['3'] ?></td>

	    <td id="<?php echo "es?".$prba_prof['0']?>" class="estado_prba">
		    <?php echo $prba_prof['4'] ?></td>

	    <td id="<?php echo $prba_prof['0'];?>" class="<?php echo $prba_prof['4']; ?>">
		<img class="delete_prba" src="css/images/gnome-close.png" title="Eliminar" alt="Eliminar"/>
		<img class="resultado_prba" src="css/images/gnome-resultados.png" title="Resultados" alt="Resultados"/>
	    </td>
    </tr>
<?php  } ?>

</table>

</tbody>


<div class="mensaje_resultados" id="dialog-confirm" title="Advertencia">
<p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>Antes de cambiar el estado la prueba asegúrese que todos sus alumnos han terminado la prueba.<br/> 
<br/>El informe se va a generar a partir de la información recibida.</p>
</div>
    
    <script>
$(document).ready(function() {

$('.mensaje_resultados').hide();

/********************************************************************************************************/
/*******			    JEIP .- Registro Prueba				    	*********/
/*******    Editar en el lugar, efecto flickr, depende del pugin jeditable.js		    	*********/
/********************************************************************************************************/

$('.formato_prba').editable('?controlador=Prueba&accion=jeip_prba', { 
    type      : 'text',
    cancel    : 'Cancelar',
    submit    : 'Actualizar',
    indicator : '<img src="css/images/loader.gif">',
    tooltip   : 'Click para Editar...'
});
	$('.fecha_prba').editable('?controlador=Prueba&accion=jeip_prba', { 
    type      : 'text',
    cancel    : 'Cancelar',
    submit    : 'Actualizar',
    indicator : '<img src="css/images/loader.gif">',
    tooltip   : 'Click para Editar...'
});
	$('.codigo_prba').editable('?controlador=Prueba&accion=jeip_prba', { 
    type      : 'text',
    cancel    : 'Cancelar',
    submit    : 'Actualizar',
    indicator : '<img src="css/images/loader.gif">',
    tooltip   : 'Click para Editar...'
});
    
/**************************************************************/
/************ Eliminar prueba del registro del profesor *******/
/**************************************************************/
$(".delete_prba").click(function(){
    if(confirm('ATENCIÓN: Estas a punto de eliminar esta prueba, ¿Estás seguro?')){
    $.post('?controlador=Prueba&accion=eliminar',{id: $(this).parent().attr('id')});
    $(this).parent().parent().remove();}

});

/**************************************************************/
/************ Resultados ver informes			 *******/
/**************************************************************/
$(".resultado_prba").click(function(){
    var id = $(this).parent().attr('id');
    var clase = $(this).parent().attr('class');

    //verifico el estado de la prueba si es Próximo lo cierro
    if (clase == 'Próximo'){   
    $( "#dialog:ui-dialog" ).dialog( "destroy" );
    $( "#dialog-confirm" ).dialog({
	resizable: false,
	modal: true,
	buttons: {
	    "Cerrar Prueba": function() {
	    
	    $.post('?controlador=Prueba&accion=cambiaEstado_prba',{id : id});

	    if (confirm('¿Deseas ver el informe final con los resultados ?')) {
		$.post('?controlador=Informes&accion=generarGraficos', {id : id}, function(){
		window.location.replace("?controlador=Informes&accion=generarGraficos");   });
		}
	    $( this ).dialog( "close" ); },

	    Cancelar: function() { $( this ).dialog( "close" );  }
	    }
	});
    }
});


});
</script>
