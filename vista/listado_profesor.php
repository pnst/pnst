<table class="prba">
	<tr>
	    <th>Nombre</th>
	    <th>Apellido</th>
	    <th>E-Mail</th>
	    <th>Eliminar</th>
    	</tr>
	<?php while( $profesor = $listado_profesor->fetch()){ ?>
	<tr class="editable">
	    <td id="<?php echo "no?".$profesor['0']?>" class="nombre_prof"><?php echo $profesor['1'] ?></td>
	    <td id="<?php echo "ap?".$profesor['0']?>" class="apellido_prof"><?php echo $profesor['2'] ?></td>
	    <td id="<?php echo "em?".$profesor['0']?>"class="email_prof"><?php echo $profesor['3'] ?></td>
	    <td id="<?php echo $profesor['0']?>">
		<img class="delete_profesor" src="css/images/gnome-close.png" title="Eliminar" alt="Eliminar" />
	    </td>
	 </tr><?php } ?>
<script>
$(document).ready(function() {
/********************************************************************************************************/
/*******			    JEIP .- Registro Prueba				    	*********/
/*******    Editar en el lugar, efecto flickr, depende del pugin jeditable.js		    	*********/
/********************************************************************************************************/
    $('.nombre_prof').editable('?controlador=Profesor&accion=jeip_prof', { 
	    type      : 'text',
	    cancel    : 'Cancelar',
	    submit    : 'Actualizar',
	    indicator : '<img src="css/images/loader.gif">',
	    tooltip   : 'Click para Editar...'    
    });
    $('.apellido_prof').editable('?controlador=Profesor&accion=jeip_prof', { 
	type      : 'text',
	    cancel    : 'Cancelar',
	    submit    : 'Actualizar',
	    indicator : '<img src="img/load.gif">',
	    tooltip   : 'Click para Editar...'    
    });
    $('.email_prof').editable('?controlador=Profesor&accion=jeip_prof', { 
	type      : 'text',
	    cancel    : 'Cancelar',
	    submit    : 'Actualizar',
	    indicator : '<img src="img/load.gif">',
	    tooltip   : 'Click para Editar...'    
    });
/**************************************************************/
/************ Eliminar prueba del registro del profesor *******/
/**************************************************************/
$(".delete_profesor").click(function(){

    if(confirm('¡ Estás a punto de eliminar un profesor !, ¿realmente estás seguro?')){
    $.post('?controlador=Profesor&accion=eliminar',{id_profesor: $(this).parent().attr('id')});
    $(this).parent().parent().remove();}
});

});
</script>


