</div>
<div id="aside">
    <div id="bienvenida"><h3>Bienvenidos Profesores, Alumnos y Directores</h3><br/><br/><br/>
    <!-- Invitación a utilizar la aplicación -->	
	<p> El objetivo del <strong>Proyecto Educativo NST</strong> es la medición
	y control de la comprensión lectora asistido por computador. Para este poyecto es
	importante apoyar la labor docente en la realización de estas pruebas de forma 
	eficiente y simple.</p><br/>
	<p> Para comenzar debes identificarte : </p>
	<br/><br/>
	
    <!-- Formulario de Identificación -->
    <form method="post" action="" id="login_form">
	<input name="hora" type="hidden" id="hora" value="<?php echo date("h:i:s A");?>" size="10"/><br/><br/>

	<label for="email">Email <span class="small">Introduce tu E-Mail </span></label>
	<input name="email" class="required email" type="text"  id="email" value="" size="10"/><br/>

	<input name="ip" type="hidden" id="ip" value="<?php echo $_SERVER [ 'REMOTE_ADDR' ];?>" size="10"/><br/><br/>	
	
	<label for="password">Password <span class="small">Introduce tu password </span></label>
	<input name="password" class="required" type="password" id="password" value="" size="10"/><br/><br/>	
	<button id="subDir" name="subDir" >Entrar!</button>

  	<input name="fecha" type="hidden" id="fecha" value="<?php echo date("d - m - Y");?>" size="10"/><br/><br/>	

    </form>
    <br/>
    <span id="msgbox" style="display:none"></span><br/>
    <a href="?controlador=Nst&accion=reenvioPasswd" class="forgot" id="resend_password_link">¿Olvidaste tu contraseña?</a>
    <a href="?controlador=Nst&accion=registrar" class="register" id="resend_password_link">Regístrate</a>
    </div>
    </div>
</div>
</div>
    <div id="footer-container">
	<div class="footer">
	   <div class="company-links">
		<div class="copyright">
	<!-- LINKS FOOTER -->

		<a href="?controlador=Index&accion=About">Acerca de NST</a> &#183;  <a href="?controlador=Index&accion=Terminos">Condiciones de servicio</a> &#183; <a href="?controlador=Index&accion=Privacidad">Tu privacidad</a>&#183; 


<br/>

Tipitapatapa, √ab está detrás de este proyecto <a href="http://www.gnu.org/licenses/gpl.html">Gnu/GPL</a>  | <a href="http://www.proyectonst.cl/nst/">http://www.proyectonst.cl</a>, 2010.</div>

  	    </div>
	</div>
    </div>
</div>
<!-- Libreria UI Custom + Core -->
<script src="js/jquery-1.4.2.min.js" type="text/javascript"></script>
<script src="js/jquery-ui-1.8.2.custom.min.js" type="text/javascript"></script>
<script src="js/inicio.js" type="text/javascript"></script>
</body>
</html>
