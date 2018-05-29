<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>DP aplication</title>
  <!-- IMPORTAMOS NUESTROS ESTILOS FRAMEWORK DE BOOTSTRAP -->
  <link rel="stylesheet" type="text/css" href="../css/bootstrap-theme.css">
  <link rel="stylesheet" type="text/css" href="../css/bootstrap-theme.min.css">
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
  <!-- IMPORTAMOS LOS ARCHIVOS JS DEL FRAMEWORK DE BOOTSTRAP -->
  <script type="text/javascript" src="../js/jquery.min.js"></script>
  <script type="text/javascript" src="../js/jquery.js"></script>
  <script type="text/javascript" src="../js/bootstrap.js"></script>
  <script type="text/javascript" src="../js/bootstrap.min.js"></script>
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
 require_once 'barramenuadmin.php';
?>

<div class="container">
  <div class="row">
    <div class="jumbotron">
      <h1>Ingresar Materia</h1>
    </div>
    <div class="col-lg-12 well">
      <form method="POST" action="../instancias/saveTema.php">
        <fieldset>
          <p>
            <label for="materia">Materia: </label>
            <select id="materia" name="materia" class="form-control" required="true">
              <option value="">Seleccione una materia...</option>
              <?php
              require_once 'barramenuadmin.php';
              require_once '../classes/connection.php';
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
            <label for = "nombretema">Nombre del tema: </label>
            <input type="text" class = "form-control" placeholder="Nombre del  tema" id = "nombretema" name="nombretema" pattern= "\w+( |\w+)*" required = "true"/>
          </p>
          <p>
            <label for = "corte">Corte: </label>
            <input type="number" class = "form-control" placeholder="1,2,3..." id = "corte" name="corte" pattern= "[0-9]" required = "true"/>
          </p>
        	<button type="submit" class="btn btn-primary">Ingresar</button>
        </fieldset>
      </form>
    </div>
  </div>
</div>
</body>
</html>
