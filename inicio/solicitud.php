<?php
	require_once('../conexion/conexion.php');
 
	$titulo = 'Solicitudes';
	$sql_solicitud = 'SELECT solicitud.*, instituto.*, instructor.*, estudiante.* FROM solicitud INNER JOIN instituto ON instituto.clave = solicitud.instituto_clave INNER JOIN instructor ON instructor.rfc = solicitud.instructor_rfc INNER JOIN estudiante ON estudiante.noControl = solicitud.estudiante_NoControl';

	$statement = $pdo->prepare($sql_solicitud);
	$statement->execute(array());
	$results = $statement->fetchAll();

	
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<title><?php echo $titulo ?></title>
		<link rel="stylesheet" href="../css/materialize.min.css">
	</head>

	<body>
		<!--Import jQuery before materialize.js-->
    	<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    	<script type="text/javascript" src="js/materialize.min.js"></script>
    	<div class="navbar-fixed">
        <nav class="teal lighten-2">
            <div class="nav-wrapper">
                <a href="#" class="brand-logo right">Solicitudes</a>
                <ul id="nav-mobile" class="left side-nav">
                    <li><a href="index.php">Inicio</a></li>
                </ul>
            </div>
        </nav>
    	</div>
		<div class="container">
			<div class="row">
				<div class="col s12">
					<h2>Ejecución de una sentencia SQL</h2>
					<hr>
					
					<h3>Solicitudes</h3>
					<hr>
					<table class="striped">
				        <thead>
				          <tr>
				              <th>Folio</th>
				              <th>Asunto</th>
				              <th>Fecha</th>
				              <th>Lugar</th>
				              <th>Nombre Instituto</th>
				          </tr>
				        </thead>
				        <tbody>
				        	<?php 
				        		foreach($results as $rs) {
				        	?>
				          <tr>
							<td><?php echo $rs['folio']?></td>
							<td><?php echo $rs['asunto']?></td>
							<td><?php echo $rs['fecha']?></td>
							<td><?php echo $rs['lugar']?></td>
							<td><?php echo $rs['nombreInstituto']?></td>
				          </tr>
				          <?php 
				          	}
				          ?>
				        </tbody>
				    </table>

				   
				</div>
			</div>
			<div class="col s12">
                <footer class="page-footer teal lighten-2">
                    <div class="footer-copyright">
                        <div class="container">
                            &copy; 2017 Leonel Gonz&aacute;lez Vidales
                        </div>
                    </div>
                </footer>
            </div>
		</div>
	</body>
</html>