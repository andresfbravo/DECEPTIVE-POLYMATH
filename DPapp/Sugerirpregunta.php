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
  <style type="text/css">
	fieldset{
		width: 30%;
		margin: 0 auto;
	}
	</style>
</head>
<body>
<?php
session_start();

if(!($_SESSION['login'])){
  header('location: http://localhost/deceptive-polymath/DPapp/');
 }
 if ($_SESSION['tipo_usuario']=="Administrador"){
   require_once 'VistasUsuarios/barramenuadmin.php';
 } else if($_SESSION['tipo_usuario']=="Profesor"){
   require_once 'VistasUsuarios/barramenuprof.php';
 } else if ($_SESSION['tipo_usuario']=="Estudiante"){
   require_once 'VistasUsuarios/barramenuestudiante.php';
 }
?>

<div class="container">
  <div class="row">
    <div class="jumbotron">
      <h1>Sugerir Pregunta</h1>
    </div>
    <div class="col-lg-12 well">
      <form method="POST" action="../DPapp/instancias/saveSugerencia.php">
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
            <label for = "dificultad">Dificultad: </label>
            <input type="number" class = "form-control" placeholder="1-150" id = "dificultad" name="dificultad"  min="1" max="151" pattern= "[0-9]{2,3}" required = "true"/>
          </p>
          <p>
            <label for = "corte">Corte: </label>
            <input type="number" class = "form-control" placeholder="1,2,3..." id = "corte" name="corte" pattern= "[0-9]{2,3}" required = "true"/>
          </p>
          <p>
            <label for = "tipopregunta">Tipo de Pregunta: </label>
            <select id="tipopregunta" name="tipopregunta" class="form-control" required="true">
                <option value="">Seleccione un tipo...</option>
                <option value="Seleccion Multiple">Selección Múltiple</option>
                <option value="Respuesta Abierta">Respuesta Abierta</option>
                <option value="Relaciones">Relaciones</option>
            </select>
          </p>
          <p>
            <label for = "textopregunta">Texto de la Pregunta: </label>
            <textarea name="textopregunta" rows="10" cols="70" placeholder="Descripcion de la pregunta"></textarea>
          </p>
        	<button type="submit" class="logout btn-primary">Sugerir</button>
        </fieldset>
      </form>
    </div>
  </div>
</div>
<script type="text/javascript">

</script>
</body>
</html>
