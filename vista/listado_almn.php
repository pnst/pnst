<table>
    <thead>
	<tr>
	    <th>1° Nombre</th>
	    <th>2° Nombre</th>
	    <th>1° Apellido</th>
	    <th>2° Apellido</th>
	    <th>Eliminar</th>
	</tr>
    </thead>
    <tbody class="editable">
	<tr>
	    <?php while($lista = $lista_almn->fetch()){ ?>
	    <td id="<?php echo "n1?".$lista['0']?>" class="nombre1"><?php echo $lista['1'] ?></td>
	    <td id="<?php echo "n2?".$lista['0']?>" class="nombre2"><?php echo $lista['2'] ?></td>
	    <td id="<?php echo "a1?".$lista['0']?>"class="apellido1"><?php echo $lista['3'] ?></td>
	    <td id="<?php echo "a2?".$lista['0']?>"class="apellido2"><?php echo $lista['4'] ?></td>
	    <td id="<?php echo $lista['0']; ?>">
	    <img class="delete_alumno" src="css/images/gnome-close.png" title="Eliminar" alt="Eliminar"/></td>
	</tr>
<?php } ?>

</table>

</tbody>


<script>

$(document).ready(function() {
    
/********************************************************************************************************/
/*******			    JEIP .- Registro Prueba				    	*********/
/*******    Editar en el lugar, efecto flickr, depende del pugin jeditable.js		    	*********/
/********************************************************************************************************/

$('.nombre1').editable('?controlador=Alumno&accion=jeip_alumno', { type : 'text',cancel : 'Cancelar',submit : 'Actualizar',indicator : '<img src="css/images/loader.gif">',tooltip : 'Click para Editar...' });

$('.nombre2').editable('?controlador=Alumno&accion=jeip_alumno', { type : 'text',cancel : 'Cancelar',submit : 'Actualizar',indicator : '<img src="img/load.gif">',tooltip   : 'Click para Editar...'});

$('.apellido1').editable('?controlador=Alumno&accion=jeip_alumno', { type : 'text',cancel : 'Cancelar',submit : 'Actualizar',indicator : '<img src="img/load.gif">',tooltip   : 'Click para Editar...'});

$('.apellido2').editable('?controlador=Alumno&accion=jeip_alumno', { type : 'text',cancel : 'Cancelar',submit : 'Actualizar', indicator : '<img src="img/load.gif">', tooltip   : 'Click para Editar...'   });

/**************************************************************/
/************ Eliminar prueba del registro del profesor *******/
/**************************************************************/
$(".delete_alumno").click(function(){
    if(confirm('¿Estas seguro que quieres eliminar a este alumno?')){
    $.post('?controlador=Alumno&accion=eliminar',{id_alumno: $(this).parent().attr('id')});
    $(this).parent().parent().remove();}
});

});
</script>

