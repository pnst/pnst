<div id="listado_informes" >
<table class="prba">
<thead>
<h1>Rind<span>ieron</span></h1><br/>
    <tr>
        <th>NOMBRE</th>
        <th>RUT</th>
        <th>RINDIENDO PRUEBA</th>
        <th>TERMINÓ</th>
        <th>Reiniciar</th>
    </tr>
</thead>
<tbody>
<?php while($tbl_informes = $rindieronPrba->fetch()){
        if($tbl_informes['6'] == 'si'){ ?>
    <tr>

        <td><?php echo $tbl_informes['2']. " ".$tbl_informes['4'];?></td>
        <td><?php echo $tbl_informes['7']; ?></td>
        <td><center><?php echo $tbl_informes['6']; ?></center></td>
        <td><center><?php echo $tbl_informes['8']; ?></center></td>
        <td id="<?php echo $tbl_informes['0']?>" >
            <form class="boton" id="exp_reiniciar" method="POST">
                <input type="hidden"  name="id" id="exp_12" value="<?php echo $tbl_informes['0']?>" />
                <input type="submit" value="Reiniciar"  />
            </form></td>
    </tr>
<?php  }} ?>
</table>
</div>
<script>
$("#exp_reiniciar").submit(function() { 
    $.post('?controlador=Profesor&accion=resetPrba', {id_alumno: id_alumn = $(this).parent().attr('id')}, function(e){
        if(e == '1')alert('¡Listo!, el alumno puede volver a dar la prueba. Su nombre aparecerá en la lista del curso.')
    });    
return false;
});
</script>

</body>
</html>

