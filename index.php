<?php
class InicioNST{
    static function main(){
	session_start();
	# Startup tasks
	require 'libreria/Startup.php';
	require 'libreria/FrontController.php';
	FrontController::main();
    }
}
InicioNST::main();

?>
