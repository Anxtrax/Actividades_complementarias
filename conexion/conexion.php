<?php

$dsn = 'mysql:dbname=complementarias;host=localhost';
$user = 'complementarias';
$password = 'c2uuaHJN3J82DpNc';

try{

	$pdo = new PDO(	$dsn, 
					$user, 
					$password
					);

}catch( PDOException $e ){
	echo 'Error al conectarnos: ' . $e->getMessage();
}
?>