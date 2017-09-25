<?php

$dsn = 'mysql:dbname=bd;host=localhost';
$user = 'usuario';
$password = 'password';

try{

	$pdo = new PDO(	$dsn, 
					$user, 
					$password
					);

}catch( PDOException $e ){
	echo 'Error al conectarnos: ' . $e->getMessage();
}
?>