<?php

	/**
	 * Fetch a config file item
	 *
	 *
	 * @access	public
	 * @param	string	the config item name
	 * @param	string	the index name
	 * @param	bool
	 * @return	string
	 */
	function item($item, $index = '')
	{
		if ($index == '')
		{
			if ( ! isset($this->config[$item]))
			{
				return FALSE;
			}

			$pref = $this->config[$item];
		}
		else
		{
			if ( ! isset($this->config[$index]))
			{
				return FALSE;
			}

			if ( ! isset($this->config[$index][$item]))
			{
				return FALSE;
			}

			$pref = $this->config[$index][$item];
		}

		return $pref;
	}

	// --------------------------------------------------------------------

	/**
	 * Fetch a config file item - adds slash after item
	 *
	 * The second parameter allows a slash to be added to the end of
	 * the item, in the case of a path.
	 *
	 * @access	public
	 * @param	string	the config item name
	 * @param	bool
	 * @return	string
	 */
	function slash_item($item)
	{
		if ( ! isset($this->config[$item]))
		{
			return FALSE;
		}

		return rtrim($this->config[$item], '/').'/';
	}

	// --------------------------------------------------------------------

	/**
	 * Site URL
	 *
	 * @access	public
	 * @param	string	the URI string
	 * @return	string
	 */
	function site_url($uri = '')
	{
		if ($uri == '')
		{
			return $this->slash_item('base_url').$this->item('index_page');
		}

		if ($this->item('enable_query_strings') == FALSE)
		{
			if (is_array($uri))
			{
				$uri = implode('/', $uri);
			}

			$index = $this->item('index_page') == '' ? '' : $this->slash_item('index_page');
			$suffix = ($this->item('url_suffix') == FALSE) ? '' : $this->item('url_suffix');
			return $this->slash_item('base_url').$index.trim($uri, '/').$suffix;
		}
		else
		{
			if (is_array($uri))
			{
				$i = 0;
				$str = '';
				foreach ($uri as $key => $val)
				{
					$prefix = ($i == 0) ? '' : '&';
					$str .= $prefix.$key.'='.$val;
					$i++;
				}

				$uri = $str;
			}

			return $this->slash_item('base_url').$this->item('index_page').'?'.$uri;
		}
	}

	// --------------------------------------------------------------------


















































function get_url() {
  $parametros = array();
  $url = parse_url($_SERVER['REQUEST_URI']);
  foreach(explode("/", $url['path']) as $p)
    if ($p!='') $parametros[] = $p;
  return $parametros;
}


//valida rut
 function dv($r){$s=1;for($m=0;$r!=0;$r/=10)$s=($s+$r%10*(9-$m++%6))%11;
  return chr($s?$s+47:75);}


//Convierte fecha de mysql a normal
function cambia($fecha){
    $fecha_array = explode("-",$fecha);
    $var_anio=$fecha_array[0];
    $var_mes=$fecha_array[1];
    $var_dia=$fecha_array[2];
    $lafecha=$fecha_array [2].$fecha_array [1].$fecha_array [0];
    return $lafecha;
}

//Convierte fecha de mysql a normal
function cambia_a_normal($fecha){
    $fecha_array = explode("-",$fecha);
    $var_anio=$fecha_array[0];
    $var_mes=$fecha_array[1];
    $var_dia=$fecha_array[2];
    $lafecha=$fecha_array [2]."/".$fecha_array [1]."/".$fecha_array [0];
    return $lafecha;
}

//Convierte fecha de normal a mysql
function cambia_a_mysql($fecha){
    $fecha_array = explode("/",$fecha);
    $var_dia=$fecha_array[0];
    $var_mes=$fecha_array[1];
    $var_anio=$fecha_array[2];
    $lafecha=$fecha_array [2]."-".$fecha_array [1]."-".$fecha_array [0];
    return $lafecha;
} 

//Genera código, sólo letras, de longitud 8
function codprbaAleatorio()
	{
	 $str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
		$cad = "";
		for($i=0;$i<8;$i++) {
			$cad .= substr($str,rand(0,62),1);
		}
		return $cad;
}
function fecha_valida_prba($value){
	$format = 'dd/mm/yyyy';
	if(strlen($value) >= 6 && strlen($format) == 10){
       
        // find separator. Remove all other characters from $format
        $separator_only = str_replace(array('m','d','y'),'', $format);
        $separator = $separator_only[0]; // separator is first character
       
        if($separator && strlen($separator_only) == 2){
            // make regex
            $regexp = str_replace('mm', '(0?[1-9]|1[0-2])', $format);
            $regexp = str_replace('dd', '(0?[1-9]|[1-2][0-9]|3[0-1])', $regexp);
            $regexp = str_replace('yyyy', '(19|20)?[0-9][0-9]', $regexp);
            $regexp = str_replace($separator, "\\" . $separator, $regexp);
            if($regexp != $value && preg_match('/'.$regexp.'\z/', $value)){

		// check date
		$arr=explode($separator,$value);
                $day=$arr[0];
                $month=$arr[1];
		$year=$arr[2];

		$mna = tomorrow();
                $fecha = $day . '/' . $month . '/' . $year;
		$num = compararDias($mna, $fecha);
		if($num > '0'){ return false; }
		
		if(@checkdate($month, $day, $year)){ return true; }

            }else{ return false;}
        }
    }
    return false;
} 

function compararDias($primera, $segunda)
 {
  $valoresPrimera = explode ("/", $primera);   
  $valoresSegunda = explode ("/", $segunda); 
  $diaPrimera    = $valoresPrimera[0];  
  $mesPrimera  = $valoresPrimera[1];  
  $anyoPrimera   = $valoresPrimera[2]; 
  $diaSegunda   = $valoresSegunda[0];  
  $mesSegunda = $valoresSegunda[1];  
  $anyoSegunda  = $valoresSegunda[2];
  $diasPrimeraJuliano = gregoriantojd($mesPrimera, $diaPrimera, $anyoPrimera);  
  $diasSegundaJuliano = gregoriantojd($mesSegunda, $diaSegunda, $anyoSegunda);     
  if(!checkdate($mesPrimera, $diaPrimera, $anyoPrimera)){
    // "La fecha ".$primera." no es válida";
    return 0;
  }elseif(!checkdate($mesSegunda, $diaSegunda, $anyoSegunda)){
    // "La fecha ".$segunda." no es válida";
    return 0;
  }else{
    return  $diasPrimeraJuliano - $diasSegundaJuliano;
  } 
}


function comprobar_codigo_prba($cod){
   //compruebo que el tamaño del string sea válido.
   if (strlen($cod) < '3' || strlen($cod) > '8')return false; 
   
   $permitidos = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
   for ($i=0; $i<strlen($cod); $i++){
      if (strpos($permitidos, substr($cod,$i,1))===false){
         echo $cod . " Sólo se permiten Letras.<br>";
         return false;
      }
   }
   return true;
} 

function solo_letras($valor){
 $permitidos = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
   for ($i=0; $i<strlen($valor); $i++){
      if (strpos($permitidos, substr($valor,$i,1))===false){
         echo " Sólo se permiten Letras.<br>";
         return false;
      }
   }
   return true;
}
function solo_numeros($valor){
 $permitidos = "1234567890";
   for ($i=0; $i<strlen($valor); $i++){
      if (strpos($permitidos, substr($valor,$i,1))===false) return false;
   }
   return true;
}

function tomorrow(){
    $dia_mna = date ('d',time()+84600);
    $mes_mna = date ('m',time()+84600);
    $anio_mna = date ('Y',time()+84600);
    $tomorrow = $dia_mna . '/' . $mes_mna . '/' . $anio_mna;
    return $tomorrow;
}

//URL visitada
function visitadaURL(){
   $s        = empty($_SERVER["HTTPS"]) ? '' : ($_SERVER["HTTPS"] == "on") ? "s" : "";
   $protocol = strleft(strtolower($_SERVER["SERVER_PROTOCOL"]), "/").$s;
   $port     = ($_SERVER["SERVER_PORT"] == "80") ? "" : (":".$_SERVER["SERVER_PORT"]);
   return $protocol."://".$_SERVER['SERVER_NAME'].$port.$_SERVER['REQUEST_URI'];
}

function strleft($s1, $s2){ return substr($s1, 0, strpos($s1, $s2));}

// Error
function error($numero, $texto){
    $log = fopen('libreria/Log/error.log','a');
    
    $url = visitadaUrl();


    if(file_exists ('libreria/Log/error.log')){ 
	fputs($log,"r\n[" . date('d-M-Y h:i:s A') . " - " . $url . "] ERROR $numero : $texto");
	fclose($log); 

	$mensaje = "\r\n[" . date('d-M-Y h:i:s A') . " - " . $url . "] ERROR $numero : $texto";
	$to      = 'admin@proyectonst.cl';
	$subject = 'Reporte Error ' .  date('d-M-Y h:i:s A');
	$message = $mensaje;
	$headers = 'From: sysnst@proyectonst.cl' . "\r\n" .
	'Reply-To: sysnst@proyectonst.cl' . "\r\n" .
	'X-Mailer: PHP/' . phpversion();

	mail($to, $subject, $message, $headers);

	    require_once('modelo/LogModelo.php');

	    $a = new LogModelo();

	    $fecha = date('Y-m-d');

	    $titulo = 'ERROR '. $cargo . ' ' .$colegio. ' '. date('h:i:s A');

	    $hora =  date('G:i:s');

	    $ip = '127.0.0.1';

	    $b = $a->setTimeline('Error',$titulo,$message,$fecha,$hora,$ip,'Error');


    
    }else{ echo 'El log de Errores No existe';}

}

//Función de mensaje Registro
function msg($status,$txt){ return '{"status":'.$status.',"txt":"'.$txt.'"}';}

//Calendario - Registro
function generate_options($from,$to,$callback=false){
    $reverse=false;
	
    if($from>$to){
	$tmp=$from;
	$from=$to;
	$to=$tmp;
	$reverse=true;}
	
    $return_string=array();
    for($i=$from;$i<=$to;$i++){$return_string[]='<option value="'.$i.'">'.($callback?$callback($i):$i).'</option>';}
	
    if($reverse)$return_string=array_reverse($return_string);
	
    return join('',$return_string);
}

//Calendario-Registro
function callback_month($month){ return date('M',mktime(0,0,0,$month,1));}

    function checkLen($str,$len=2){
       	return isset($_POST[$str]) && mb_strlen(strip_tags($_POST[$str]),"utf-8") > $len;
    }

    function checkEmail($str){
	return preg_match("/^[\.A-z0-9_\-\+]+[@][A-z0-9_\-]+([.][A-z0-9_\-]+)+[A-z]{1,4}$/", $str);
    }


function FUNC_sizeDomainQuota($quota){ 
 
    function obsah($adr,&$totalquota,&$dir,&$size){ 
 
          $dp = OpenDir($adr); 
 
              do{ 
 
                $itm = ReadDir($dp); 
 
    if (Is_Dir("$adr/$itm")&&($itm!=".")&&($itm!="..")&&($itm!="")){ 
 
      obsah("$adr/$itm",$totalquota,$dir,$size); 
 
          $dir++; 
    } 
 
    elseif (($itm!=".")&&($itm!="..")&&($itm!="")){ 
 
      $size = $size + FileSize("$adr/$itm"); 
      $totalquota++; 
    } 
 
  } while ($itm!=false); 
 
  CloseDir($dp); 
 
} 
 
    obsah(".",$totalquota,$dir,$size); 
 
        $freeA = $size/1024*1024; 
        $freeA = $freeA/1024; 
        $freeA = $freeA/1024; 
 
        $exp = explode(".",$freeA); 
        $freeN = substr($exp[1],0,2); 
        $freeA = $exp[0].".".$freeN; 
 
	$freeB = $quota-$freeA;
 
        $datosQuote = "Tamaño de PNST: <B>$freeA</B> Mbytes<br/> Espacio en Disco: <B>$quota</B> Mbytes<br>Espacio Libre: <B>$freeB</B> Mbytes <br/> Ocupado por <B>$totalquota</B> ficheros y <B>$dir</B> carpeta\s<br/>"; 
 
    return $datosQuote; 
} 

function mail_recordatorio($to){
	    $subject = 'Renovación Suscripción Pro Proyecto Educativo NST';
	    $message = 'Esto es un sistema automático, no responder.<br/>
		El motivo de este correo es por que aparece en el sistema con una suscripción vigente en el <a href="www.proyectonst.cl/nst/">Proyecto Educativo NST</a>.<br/>
		Queríamos recordarle con anticipación que la suscripción termina a final de año ';
	    $headers = 'From: sysnst@proyectonst.cl' . "\r\n" .
	    'Reply-To: sysnst@proyectonst.cl' . "\r\n" .
	    'X-Mailer: PHP/' . phpversion();

	    mail($to, $subject, $message, $headers);
}

function mail_promocion($to){
	    $subject = 'Increibles promociones, obten tu  Suscripción Pro Proyecto Educativo NST';
	    $message = 'Esto es un sistema automático, por favor no reenviar.<br/>
		El motivo de este correo es por que aparece en el sistema del <a href="www.proyectonst.cl/nst/">Proyecto Educativo NST</a>.<br/>
		Queríamos recordarle con anticipación que se puede suscribir ahora y ahorrar dinero. ';
	    $headers = 'From: sysnst@proyectonst.cl' . "\r\n" .
	    'Reply-To: sysnst@proyectonst.cl' . "\r\n" .
	    'X-Mailer: PHP/' . phpversion();

	    mail($to, $subject, $message, $headers);
}

