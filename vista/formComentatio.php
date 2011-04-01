<?php

$_SESSION['n1'] = rand(1,20);
$_SESSION['n2'] = rand(1,20);
$_SESSION['expect'] = $_SESSION['n1']+$_SESSION['n2'];

$str='';
if($_SESSION['errStr'])
{
	$str='<div class="error">'.$_SESSION['errStr'].'</div>';
	unset($_SESSION['errStr']);
}

$success='';
if($_SESSION['sent'])
{
	$success='<h1>Gracias por tu interés!</h1><input type="submit" name="atras" value="Atrás!" onClick="javascript:history.go(-1)"/>
 ';
	
	$css='<style type="text/css">#contact-form{display:none;}</style>';
	
	unset($_SESSION['sent']);
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Formulario de comentarios | ¿ Qué es lo que te preocupa ? </title>

<link rel="stylesheet" type="text/css" href="css/jqtransform.css" />
<link rel="stylesheet" type="text/css" href="css/validationEngine.jquery.css" />
<link rel="stylesheet" type="text/css" href="css/general.css" />


<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="js/formulariojs/jquery.jqtransform.js"></script>
<script type="text/javascript" src="js/formulariojs/jquery.validationEngine.js"></script>
<script type="text/javascript" src="js/formulariojs/formulario.js"></script>

</head>

<body id="formback">

<div id="formComent">

	<div id="form-container">
    <h1>Formulario de comentarios</h1>
    <h2>¿ Qué es lo que te preocupa ?</h2>
    
    <form id="contact-form" name="contact-form" method="post" action="#">
      <table width="100%" border="0" cellspacing="0" cellpadding="5">
        <tr>
          <td width="15%"><label for="name">Nombre</label></td>
          <td width="70%"><input type="text" class="validate[required,custom[onlyLetter]]" name="name" id="name" value="<?=$_SESSION['post']['name']?>" /></td>
          <td width="15%" id="errOffset">&nbsp;</td>
        </tr>
        <tr>
          <td><label for="email">Email</label></td>
          <td><input type="text" class="validate[required,custom[email]]" name="email" id="email" value="<?=$_SESSION['post']['email']?>" /></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><label for="subject">Asunto</label></td>
          <td><select name="subject" id="subject">
            <option value="" selected="selected"> - Escoge -</option>
	    <option value="Pregunta">Pregunta</option>
            <option value="Política de seguridad">Política de seguridad</option>
            <option value="Denuncia">Denuncia</option>
            <option value="Informar bug">Informar un bug</option>
            <option value="Pago">Pago</option>
          </select>          </td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td valign="top"><label for="message">Mesaje</label></td>
          <td><textarea name="message" id="message" class="validate[required]" cols="35" rows="5"><?=$_SESSION['post']['message']?></textarea></td>
          <td valign="top">&nbsp;</td>
        </tr>
        <tr>
          <td><label for="captcha"><?=$_SESSION['n1']?> + <?=$_SESSION['n2']?> =</label></td>
          <td><input type="text" class="validate[required,custom[onlyNumber]]" name="captcha" id="captcha" /></td>
          <td valign="top">&nbsp;</td>
        </tr>
        <tr>
          <td valign="top">&nbsp;</td>
          <td colspan="2"><input type="submit" name="button" id="button" value="Enviar" />
          <input type="reset" name="button2" id="button2" value="Resetear" />
          
	  <?=$str?>          
	    
	    <input type="submit" name="atras" value="Atrás!" onClick="javascript:history.go(-1)"/>
	    <img id="loading" src="css/images/loader.gif" width="16" height="16" alt="Procesando" /></td>
	</tr>

      </table>
      </form>
	<br/>


      <?=$success?>
    </div>
</div>

