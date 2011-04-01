<center><img src="css/images/tipitapatapa_logo.jpg" width="180" height="210" border="0" alt="Proyecto Educativo NST"></center>
<strong>Pruebas para hoy.</strong><br/>
<table class="table_prba_hoy">
    <tr>
	<th>Selecciona</th>
	<th>Colegio</th>
    	<th>Fecha</th>
	<th>Asignatura</th>
    	<th>Curso</th>
    </tr>
    <?php
    // $listado es una variable asignada desde el controlador ItemsController.
    while($lista= $listado->fetch()){
	
	$lista['FECHA_PRBA'] = cambia_a_normal($lista['FECHA_PRBA']);

	if($lista['ESTADO_PRBA'] == 'Pr&oacute;ximo'){?>
    <tr>
	<td id="<?php echo $lista['ID_PRUEBA']; ?>">
	<img class="prba" src="css/images/prba.png"></td>
	<td><?php echo $lista['NOMBRE_COLEGIO']; ?></td>
	<td><?php echo $lista['FECHA_PRBA']; ?></td>
	<td><?php echo $lista['ASIGNATURA']; ?></td>
	<td><?php echo $lista['NIVEL_CURSO']. $lista['LETRA_CURSO']; ?></td>
    </tr>
    <?php } }?>
</table>
<br></br>

