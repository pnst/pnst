<?php

$dbname='NST';
$dbhost='localhost';
$dbuser='NST';
$dbpwd='qwe123';
$config = Config::singleton();
$config->set('CarpetaControlador', 'controlador/');
$config->set('CarpetaModelo', 'modelo/');
$config->set('CarpetaVista', 'vista/');
$config->set('dbhost', $dbhost);
$config->set('dbname', $dbname);
$config->set('dbuser', $dbuser);
$config->set('dbpass', $dbpwd);

?>
