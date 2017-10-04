<pre><?php
  require_once('../conexion/conexion.php');
  $titulo = 'Búsqueda';
  
  $sql = 'SELECT * FROM estudiante WHERE 1';
  $search_terms = isset($_GET['nombreEstudiante']) ? $_GET['nombreEstudiante'] : '';
  $search_arr = explode(' ', $search_terms);
  $arr_sql_terms = array();
  $n = 0;
  foreach ( $search_arr as $search_term) {
    $sql .= " AND nombreEstudiante LIKE :search{$n}";
    $arr_sql_terms[":search{$n}"] = '%' . $search_term . '%';
    $n++;
  }
  

  $statement = $pdo->prepare($sql);
  $statement->execute($arr_sql_terms);
  $results = $statement->fetchAll();
?>
</pre>
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
            <h2>Buscador sencillo con LIKE</h2>
            <hr>
            <h3>Estudiantes</h3>
            <form method="get">
            <div class="row">
              <div class="medium-6 columns">
                <label>Ingrese el título
                  <input type="text" name="nombreEstudiante" placeholder="ej. Jose">
                  <input class="button" type="submit" value="BUSCAR" />
                </label>
              </div>
            </div>
            </form>
          </div>

          <h3>Estudiantes</h3>
          <hr>
          <table class="striped">
                <thead>
                  <tr>
                      <th>No Control</th>
                      <th>Nombre</th>
                      <th>Apellido Paterno</th>
                      <th>Apellido Materno</th>
                      <th>Semestre</th>
                      <th>Clave Carrera</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    foreach($results as $rs) {
                  ?>
                  <tr>
                      <td><?php echo $rs['noControl']?></td>
                      <td><?php echo $rs['nombreEstudiante']?></td>
                      <td><?php echo $rs['apellido_p_Estudiante']?></td>
                      <td><?php echo $rs['apellido_m_Estudiante']?></td>
                      <td><?php echo $rs['semestre']?></td>
                      <td><?php echo $rs['carrera_clave']?></td>
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