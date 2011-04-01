<div id="listado_informes" >
<table class="prba">

<thead>
<h1>Reportes de  <span>Prueba C.L.P.</span></h1><br/>

    <tr>
	<th>Fecha Prueba</th>
	<th>Curso</th>
	<th>Formato</th>
	<th>Ver Resultados</th>
    </tr>
</thead>
<tbody>
<?php while($tbl_informes = $informes_tabla->fetch()){ ?>
    <tr>
	<td><?php echo $tbl_informes['1'] ?></td>
	<td><?php echo $tbl_informes['2'].$tbl_informes['3'] ?></td>
	<td><?php echo $tbl_informes['4'] ?></td>
	<td id="<?php echo $tbl_informes['0']?>" >
	    <form method="POST" class="boton" action="?controlador=Informes&accion=generarGraficos">
		<input type="hidden"  name="id" value="<?php echo $tbl_informes['0']?>" />
		<input type="submit" value="Ver"  /> 
	    </form></td>
    </tr>

<?php  } ?>

</table>

</div>

</body>
</html>
