<?php
	if(file_exists('config.php')){

//error_reporting(0);
	error_reporting(E_ALL);

	if (version_compare(phpversion(), '5.2.1', '<') == true)  die ('Sólo trabaja con PHP5.2.14 hacia arriba'); 

date_default_timezone_set('Chile/Continental');

/*
 *---------------------------------------------------------------
 * SYSTEM FOLDER NAME
 *---------------------------------------------------------------
 *
 * This variable must contain the name of your "system" folder.
 * Include the path if the folder is not in the same  directory
 * as this file.
 *
 */
	$system_path = "";

/*
 *---------------------------------------------------------------
 * APPLICATION FOLDER NAME
 *---------------------------------------------------------------
 *
 * If you want this front controller to use a different "application"
 * folder then the default one you can set its name here. The folder
 * can also be renamed or relocated anywhere on your server.  If
 * you do, use a full server path. For more info please see the user guide:
 * http://codeigniter.com/user_guide/general/managing_apps.html
 *
 * NO TRAILING SLASH!
 *
 */
	$application_folder = "";

/*
 * ---------------------------------------------------------------
 *  Resolve the system path for increased reliability
 * ---------------------------------------------------------------
 */
	if (realpath($system_path) !== FALSE)	$system_path = realpath($system_path).'/';

	// ensure there's a trailing slash
	$system_path = rtrim($system_path, '/').'/';

	// Is the system path correct?
	if ( ! is_dir($system_path)) exit("El PATH de la carpeta del sistema no está definida correctamente. Porfavor abre el  siguiente archivo y edítalo correctamente: ".pathinfo(__FILE__, PATHINFO_BASENAME));

/*
 * -------------------------------------------------------------------
 *  Now that we know the path, set the main path constants
 * -------------------------------------------------------------------
 */
	// The name of THIS file
	define('SELF', pathinfo(__FILE__, PATHINFO_BASENAME));

	// The PHP file extension
	define('EXT', '.php');

	// Path to the system folder
	define('BASEPATH', str_replace("\\", "/", $system_path));

	// Path to the front controller (this file)
	define('FCPATH', str_replace(SELF, '', __FILE__));

	// Name of the "system folder"
	define('SYSDIR', trim(strrchr(trim(BASEPATH, '/'), '/'), '/'));

	// The path to the "application" folder
	if (is_dir($application_folder)){ define('APPPATH', $application_folder.'/');}
	else {
	 if ( ! is_dir(BASEPATH.$application_folder.'/')) exit("El PATH de la carpeta de aplicación no está definida correctamente. Porfavor abre el  siguiente archivo y edítalo correctamente: ".SELF);
		
	define('APPPATH', BASEPATH.$application_folder.'/');
	}


}else{header("Location: install.php");}
