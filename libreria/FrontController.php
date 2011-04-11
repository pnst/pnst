<?php if ( ! defined('BASEPATH')) exit('No tendrás acceso =) ');


class FrontController
{
 static function main()	{
 
 //Incluimos algunas clases:
  require 'libreria/Config.php'; //de configuracion
  require 'libreria/Spdo.php'; //PDO con singleton
  require 'libreria/ControladorBase.php'; //Clase controlador base
  require 'libreria/ModeloBase.php'; //Clase modelo base
  require 'libreria/Vista.php'; //Mini motor de plantillas
  require 'config.php'; //Archivo con configuraciones.
  require_once 'libreria/Funciones.php';// Funciones de Fecha y otros arreglos
		
 //Con el objetivo de no repetir nombre de clases, nuestros controladores
 //terminaran todos en Controller. Por ej, la clase controladora Items, ser� ItemsController
 		
 //Formamos el nombre del Controlador o en su defecto, tomamos que es el IndexController
  if(! empty($_GET['controlador'])) $NombreControlador = $_GET['controlador'] . 'Controlador';
    else $NombreControlador = "IndexControlador";
 		
 //Lo mismo sucede con las acciones, si no hay accion, tomamos index como accion
  if(! empty($_GET['accion'])) $actionName = $_GET['accion'];
    else $actionName = "index";
		
  $controllerPath = $config->get('CarpetaControlador') . $NombreControlador . '.php';

 //Incluimos el fichero que contiene nuestra clase controladora solicitada	
  if(is_file($controllerPath)) require $controllerPath;
    else die('Es una pena pero el controlador no existe - 404 not found.');
		
 //Si no existe la clase que buscamos y su accion, tiramos un error 404
   if (is_callable(array($NombreControlador, $actionName)) == false) {
     trigger_error ($NombreControlador . '->' . $actionName . '` no existe', E_USER_NOTICE);
     return false;
   }
 //Si todo esta bien, creamos una instancia del controlador y llamamos a la accion
  $controller = new $NombreControlador();
  $controller->$actionName();
  }
 }
?>
