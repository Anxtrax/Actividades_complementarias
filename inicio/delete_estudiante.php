<?php
require_once('../conexion/conexion.php');
$noControl = isset($_GET['noControl']) ? $_GET['noControl'] : 0 ;
$sql = 'DELETE FROM estudiante WHERE noControl = ?';

$statement = $pdo->prepare($sql);
$statement->execute(array($noControl));

$results = $statement->fetchAll();
header('Location: estudiantes.php');
