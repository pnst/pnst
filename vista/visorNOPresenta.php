<div id="listado_informes" >
<table class="prba">

<thead>
<h1>No <span>Rindieron</span></h1><br/>

    <tr>
        <th>NOMBRE</th>
        <th>RUT</th>
    </tr>
</thead>
<tbody>
<?php while($tbl_informes = $rindieronPrba->fetch()){
        if($tbl_informes['6'] == 'no'){ ?>
    <tr>

        <td><?php echo $tbl_informes['2']. " ".$tbl_informes['4'];?></td>
        <td><?php echo $tbl_informes['7']; ?></td>
    </tr>

<?php  }} ?> 
          
</table> 
          
</div>   
        
</body>  
</html>

