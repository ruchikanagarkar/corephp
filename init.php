<?php
/*
 * Allows you to register multiple methods that PHP will call when a new Class is declared or instantiated
*/
spl_autoload_register(function($class){
	include 'class/'.$class.'.php';
});
?>