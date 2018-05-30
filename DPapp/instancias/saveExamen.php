<?php
require_once '../classes/examen.php';

session_start();
$examen = new Examen();
$examen->setIdProfesor($_SESSION['username']);
$examen->setIdMateria($_POST['materia']);
$examen->setIdTema($_POST['tema']);
#$examen->setDificultad($_POST['dificultad']);
#$examen->setTipoPregunta($_POST['Tipo_pregunta']);
#$examen->setTextopregunta($_POST['textopregunta']);
#print_r($usuario);
$examen->saveExamen();

?>
<body onload="javascript:window.print();">
	<?php
	require_once '../classes/connection.php';
$connection = new Connection();
$materia = $_POST['materia'];
$query = $connection->getConnection()->prepare("SELECT \"Nombre\" FROM \"Materia\" WHERE \"IdMateria\" = $materia");
$query->execute();

$results = $query->fetchAll();


	echo ('Examen parcial de ' . $results[0]['Nombre'] . '<br>');
	echo nl2br($_POST['textopregunta']);
	?>
</body>