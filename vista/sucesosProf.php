<div id="listado_informes1" >
<table class="prba">

<thead>
<h1>Sucesos</h1><br/>

    <tr>
	<th>Nombre </th>
	<th>Contacto</th>
	<th>Referencia</th>
	<th>fecha y hora</th>
	<th>Detalle</th>
    </tr>
</thead>
<tbody>
<?php while($tbl_informes = $sucesos->fetch()){
	$ult = ''; ?>
    <tr>
    
    <?php   
	    if($ult != $tbl_informes['0']. ' '.$tbl_informes['1'] ){

		$profesores[] =  $tbl_informes['0']. ' '.$tbl_informes['1'];
		$id[] = $tbl_informes['7'];
		$ult = $tbl_informes['0']. ' '.$tbl_informes['1']; 
	    
	    } ?>  

	<td><?php echo $tbl_informes['0']. ' '.$tbl_informes['1']; ?></td>
	<td><?php echo $tbl_informes['2'] ?></td>
	<td><b><?php echo $tbl_informes['3'] ?></b></td>
	<td><?php echo $tbl_informes['4']. ' '. $tbl_informes['5'] ?></td>
	<td><?php echo $tbl_informes['6'] ?></td>


    </tr>

<?php  } ?>

</table>
<br/>
<br/>
</div>
</body>
</html>
