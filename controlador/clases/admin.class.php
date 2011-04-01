<?php
class adminClass{
    
  
    public function valida_admin($c, $user, $passw){
	$u='';
	$p='';
	while($d = $c->fetch()){ $u = $d['0']; $p = $d['1'];}
	if ($u == $user){if($p == $passw){ return '1';}else{ return '0';} }else {return '0';}

    }


 
}

?>
