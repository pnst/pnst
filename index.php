<?php
class InicioNST{
    static function main(){
	session_start();
	# Startup tasks
	require 'libreria/startup.php';
	require 'libreria/FrontController.php';
	FrontController::main();
    }
}
InicioNST::main();

?>
