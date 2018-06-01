<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>DP aplication</title>
  <!-- IMPORTAMOS NUESTROS ESTILOS FRAMEWORK DE BOOTSTRAP -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <!-- IMPORTAMOS LOS ARCHIVOS JS DEL FRAMEWORK DE BOOTSTRAP -->
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/PopulateTema.js"></script>
  <script type="text/javascript" src="js/PopulatePregunta.js"></script>
    <script type="text/javascript" src="js/agregarpreguntas.js"></script>

  <style type="text/css">
    white-space:pre-wrap;
  </style>
</head>
<body>
<?php
session_start();
$_SESSION['numeracion'] = 1;
$_SESSION['numeracion2'] = 1;
$_SESSION['preguntas'] = array();
$_SESSION['respuestas'] = array();
if(!($_SESSION['login'])){
  header('location: http://localhost/deceptive-polymath/DPapp/');
 }
 if($_SESSION['tipo_usuario'] == 'Administrador'):
  require_once 'VistasUsuarios/barramenuadmin.php';

elseif($_SESSION['tipo_usuario'] == 'Estudiante'):
 require_once 'VistasUsuarios/barramenuestudiante.php';

elseif($_SESSION['tipo_usuario'] == 'Profesor'):
 require_once 'VistasUsuarios/barramenuprof.php';
endif;
?>
  <div class="container">
  <div class="row">
    <div class="jumbotron">
      <h1>Generador de Examenes</h1>
    </div>
    <div class="col-lg-12 well">
      <form method="POST" action="../DPapp/instancias/saveExamen.php">
        <fieldset>
          <p>
            <label for="materia">Materia: </label>
            <select id="materia" name="materia" class="form-control" required="true">
              <option value="">Seleccione una materia...</option>
              <?php
              require_once '/classes/connection.php';
              $connection = new Connection();
              $query = $connection->getConnection()->prepare("SELECT * FROM \"Materia\"");
              $query->execute();

              $results = $query->fetchAll(PDO::FETCH_ASSOC);
                echo($results);
              foreach($results as $row) {
                  echo "<option value= '" . $row['IdMateria'] . " ' >" . $row['Nombre'] . "</option>";
              }
              ?>
            </select>
          </p>
          <p>
            <label for="tema">Tema: </label>
            <select id="tema" name="tema" class="form-control" required="true">
              <option value="">Seleccione un tema...</option>

            </select>
          </p>
          <p>
            <label for="pregunta">Pregunta: </label>
            <select id="pregunta" name="pregunta" class="form-control" required="true">
              <option value="">Seleccione una pregunta...</option>

            </select>
          </p>

          <p>
            <label for = "textopregunta">Texto de la Pregunta: </label>
            <textarea id ="textopregunta" name="textopregunta" rows="10" cols="70" placeholder="Descripcion de la pregunta"></textarea>
          </p>
          <!--<p>
            <label for = "textorespuesta">Texto de la Respuesta: </label>
            <textarea id ="textorespuesta" name="textorespuesta" rows="10" cols="70" placeholder="Descripcion de la respesta"></textarea>
          </p>-->
          <button type="button" id="agregar" class="logout btn-primary">Agregar pregunta</button>
          <button type="sub oninvalid="  oninvalid="""mit" id="imprimir" class="logout btn-primary">Imprimir</button>
        </fieldset>
      </form>
    </div>
  </div>
</div>
</body>
</html>
