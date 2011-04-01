<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Panel de Trabajo NST - Proyecto Educativo NST | proyectonst.wikiaula.org</title>
<link href="css/screen.css" rel="stylesheet" type="text/css" />

</head>
<body>
<div id="cont">
  <div class="box lock"> </div>
  <div id="loginform" class="box form">
    <!-- IMAGEN  "X" -->
    <h2>Formulario de Ingreso <a href="" class="cerrar">Cerrar</a></h2>
    <div class="formcont">
      <fieldset id="signin_menu">
      <span class="message" id="message">¡Debes iniciar sesión para ingresar!</span>
      <label class="error" id="error"></label>
     
      <form method="post" id="block_login_form" action="">
        <label for="email_login">Email</label>
        <input id="email_login" name="email_login" value="" title="Ingresa tu dirección de correo electrónico" class="required" tabindex="4" type="text">
        </p>
        <p>
          <label for="password_login">Password</label>
          <input id="password_login" name="password_login" value="" title="Ingresa la contraseña de tu cuenta" class="required" tabindex="5" type="password">
        </p>
        <p class="clear"></p>
        <a href="#" class="forgot" id="resend_password_link">¿Olvidaste tu contraseña?</a>
       <p class="remember">
          <input id="signin_submit" value="Sign in" tabindex="6" type="submit">
          <input id="cancel_submit" value="Cancel" tabindex="7" type="button">
        </p>
      </form>
      </fieldset>
    </div>
    <div class="formfooter"></div>
  </div>
</div>

<div id="bg">
  <div>
    <table cellspacing="0" cellpadding="0">
      <tr>
        <td><img src="css/images/tipitapatapa_logo.jpg" alt="Proyecto Educativo NST" /> </td>
      </tr>
    </table>
  </div>
</div>

<script type='text/javascript' src='css/js/jquery-1.4.2.min.js'></script>
<script type='text/javascript' src='css/js/jquery.timer.js'></script>
<script src="css/js/script.js"></script>
</body>
</html>
