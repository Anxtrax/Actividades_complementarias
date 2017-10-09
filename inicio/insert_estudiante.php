<?php
	require_once('../conexion/conexion.php');
	$title = 'Agregar un nuevo registro';
	$sql_carrera = 'SELECT * FROM carrera';

	$statement = $pdo->prepare($sql_carrera);
	$statement->execute();
	$results = $statement->fetchAll();

	if( $_POST )
	{

  		$sql_insert = 'INSERT INTO estudiante ( noControl, nombreEstudiante, apellido_p_Estudiante, apellido_m_Estudiante, semestre, carrera_clave ) VALUES( ?, ?, ?, ?, ?, ? )';

  		$noControl = isset($_POST['noControl']) ? $_POST['noControl']: '';
  		$nombreEstudiante = isset($_POST['nombreEstudiante']) ? $_POST['nombreEstudiante']: '';
  		$apellido_p_Estudiante = isset($_POST['apellido_p_Estudiante']) ? $_POST['apellido_p_Estudiante']: '';
  		$apellido_m_Estudiante = isset($_POST['apellido_m_Estudiante']) ? $_POST['apellido_m_Estudiante']: '';
  		$semestre = isset($_POST['semestre']) ? $_POST['semestre']: '';
  		$carrera_clave = isset($_POST['carrera_clave']) ? $_POST['carrera_clave']: '';

  		$statement_insert = $pdo->prepare($sql_insert);
  		$statement_insert->execute(array($noControl,$nombreEstudiante,$apellido_p_Estudiante, $apellido_m_Estudiante,$semestre,$carrera_clave));

	}

	$sql_status = 'SELECT estudiante.*, carrera.carreraNombre FROM estudiante INNER JOIN carrera ON carrera.clave = estudiante.carrera_clave ORDER BY noControl';
	$statement_status = $pdo->prepare($sql_status);
	$statement_status->execute();
	$results_status = $statement_status->fetchAll();
?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<title><?php echo $title?></title>
		<link rel="stylesheet" href="../css/materialize.css">
		</head>

	<body>
		<!--Import jQuery before materialize.js-->
    	<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    	<script type="text/javascript" src="../js/materialize.min.js"></script>
    	<div class="navbar-fixed">
	        <nav class="teal lighten-1">
	            <div class="nav-wrapper">
	                <a href="#" class="brand-logo right">Estudiantes</a>
	                <ul id="nav-mobile" class="left side-nav">
	                    <li><a href="index.php">Inicio</a></li>
	                </ul>
	            </div>
	        </nav>
    	</div>
		<div class="container">
			<div class="row">
				<div class="col s12">
					<h2>Agregar un nuevo estudiante</h2>
					<hr>
				</div>
			</div>
			<div class="row">
				<form method="post" class="col s12">
					<div class="row">
						<div class="input-field col s12">
          				<input placeholder="Número de control" name="noControl" type="text">
        				</div>
					</div>
					<div class="row">
        				<div class="input-field col s4">
        				<i class="material-icons prefix">account_circle</i>
          				<input placeholder="Nombre" name="nombreEstudiante" type="text">
        				</div>
        				<div class="input-field col s4">
        					 <i class="material-icons prefix">account_circle</i>
          				<input placeholder="Apellido Paterno" name="apellido_p_Estudiante" type="text">
        				</div>
        				<div class="input-field col s4">
        					 <i class="material-icons prefix">account_circle</i>
          				<input placeholder="Apellido Materno" name="apellido_m_Estudiante" type="text">
        				</div>
        			</div>
        			<div class="row">
        				<div class="input-field col s12">
    						<select name="semestre">
	      						<option value="" disabled selected>Elige el semestre</option>
	      						<option value="I">I</option>
	  							<option value="II">II</option>
	  							<option value="III">III</option>
	  							<option value="IV">IV</option>
	  							<option value="V">V</option>
	  							<option value="VI">VI</option>
	  							<option value="VII">VII</option>
	  							<option value="VIII">VIII</option>
	  							<option value="IX">IX</option>
	  							<option value="X">X</option>
	  							<option value="XI">XI</option>
	  							<option value="XII">XII</option>
    						</select>
    						<label>Semestre</label>
  						</div>
        			</div>
        			<div class="row">
        				<div class="input-field col s12">
                  		<select name="carrera_clave">
                  			<option value="" disabled selected>Elige la carrera</option>
                  			<?php 
				        	foreach($results as $rs) {
				        	?>
  							<option value="<?php echo $rs['clave']?>"><?php echo $rs['carreraNombre']?></option>
  							<?php 
				          	}
				        ?>
						</select>
						<label>Carrera</label>
						</div>
        			</div>
        			<input class="btn waves-effect waves-light" type="submit" value="Agregar" />
        		</form>
      		</div>
			<div class="row">
				<div class="col s12">
				    <h3>Estudiantes</h3>
				    <table class="striped">
					  <thead>
					    <tr>
					    	<th>No Control</th>
				          	<th>Nombre</th>
				            <th>Apellido Paterno</th>
				            <th>Apellido Materno</th>
				            <th>Semestre</th>
				            <th>Carrera</th>
					    </tr>
					  </thead>
					  <tbody>
					  	<?php 
				        	foreach($results_status as $rs2) {
				        ?>
					    <tr>
					    	<td><?php echo $rs2['noControl']?></td>
							<td><?php echo $rs2['nombreEstudiante']?></td>
							<td><?php echo $rs2['apellido_p_Estudiante']?></td>
							<td><?php echo $rs2['apellido_m_Estudiante']?></td>
							<td><?php echo $rs2['semestre']?></td>
							<td><?php echo $rs2['carreraNombre']?></td>
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
		<!--  Scripts-->
    	<!--Import jQuery before materialize.js-->
      	<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
      	<script type="text/javascript" src="../js/materialize.min.js"></script>
      	<script>
      		$(document).ready(function() {
    		$('select').material_select();
  			});
      	</script>
	</body>
</html>