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
$connection->getConnection()->beginTransaction();
$materia = $_POST['materia'];
$query = $connection->getConnection()->prepare("SELECT \"Nombre\" FROM \"Materia\" WHERE \"IdMateria\" = $materia");
$query->execute();
try {
	$arraytoinsert = "{";
	$lastElement = end($_SESSION['preguntas']);
	$dificultadpromedio = 0;
	$numeropreguntas = 0;
	foreach($_SESSION['preguntas'] as $pregunta){
		$preguntaquery = $connection->getConnection()->prepare("INSERT INTO \"UsoPreguntas\"(\"IdPregunta\",\"IdUsuario\") VALUES(:IdPregunta, :IdUsuario)");
		$preguntaquery->bindValue(':IdPregunta', $pregunta);
		$preguntaquery->bindValue(':IdUsuario', $_SESSION['username']);
		$preguntaquery->execute();

		$preguntavecesquery = $connection->getConnection()->prepare("SELECT \"Vecesutilizada\", \"Dificultad\" FROM \"Preguntas\" WHERE \"IdPregunta\" = $pregunta");
		$preguntavecesquery->execute();
		$vecesutilizada = $preguntavecesquery->fetchAll();
		$dificultadpromedio = $dificultadpromedio + $vecesutilizada[0]['Dificultad'];
		$numeropreguntas = $numeropreguntas + 1;
		$vecesutilizada = $vecesutilizada[0]['Vecesutilizada'];
		$vecesutilizada = $vecesutilizada + 1;

		$preguntaupdatequery = $connection->getConnection()->prepare("UPDATE \"Preguntas\"SET \"Vecesutilizada\" = $vecesutilizada WHERE \"IdPregunta\" = $pregunta");
		$preguntaupdatequery->execute();
		if($pregunta != $lastElement){
			$arraytoinsert .= $pregunta.",";
		}else{
			$arraytoinsert .= $pregunta;
		}
	}
	$arraytoinsert.="}";
	$getmaterias = $connection->getConnection()->prepare("SELECT * FROM \"Materia\"");
	$getmaterias->execute();
	$materias = $getmaterias->fetchAll();
	foreach ($materias as $materia) {
		$countvecesquery = $connection->getConnection()->prepare("SELECT COUNT(*) FROM \"Preguntas\" WHERE \"Vecesutilizada\" >= 1 and \"IdMateria\"=".$materia['IdMateria'] );
		$countvecesquery->execute();
		$veces = $countvecesquery->fetchAll();
		$veces = $veces[0][0];
		$updatemateriaquery = $connection->getConnection()->prepare("UPDATE \"Materia\"SET \"NumeroPreguntasUsadas\" = $veces WHERE \"IdMateria\"=". $materia['IdMateria']);
		$updatemateriaquery->execute();
	}
	$checkquery =  $connection->getConnection()->prepare("SELECT * FROM \"Examen\" WHERE \"Preguntas\" = '$arraytoinsert'");
	$checkquery->execute();
	$dificultadpromedio = $dificultadpromedio / $numeropreguntas;
	if($checkquery->rowCount()>0){
			$checkqueryresult = $checkquery->fetchAll();
			$checkqueryresult = $checkqueryresult[0];
			$vecesgenerado = $checkqueryresult['Vecesgenerado'];
			$vecesgenerado = $vecesgenerado + 1;
			$examenquery =  $connection->getConnection()->prepare("UPDATE \"Examen\" SET \"Vecesgenerado\" = $vecesgenerado WHERE \"IdParcial\" =". $checkqueryresult['IdParcial']);
			$examenquery->execute();
	}
	else{
		$examenquery =  $connection->getConnection()->prepare("INSERT INTO \"Examen\"(\"Preguntas\",\"IdUsuario\", \"Dificultad\") VALUES(:Preguntas, :IdUsuario,:Dificultad)");
		$examenquery->bindValue(':Preguntas', $arraytoinsert);
		$examenquery->bindValue(':IdUsuario', $_SESSION['username']);
		$examenquery->bindValue(':Dificultad', $dificultadpromedio);
		$examenquery->execute();
	}
	$results = $query->fetchAll();

	#print_r($arraytoinsert);
	echo ('Examen parcial de ' . $results[0]['Nombre'] . '<br>');
	echo nl2br($_POST['textopregunta']);
	$connection->getConnection()->commit();
} catch (PDOException $e) {
	$connection->getConnection()-> rollback();
	echo "Error en la generación ...".$e->getMessage();
	/*echo "<script>
	alert('Error al generar examen, intente de nuevo.');
	window.location.href = 'http://localhost/deceptive-polymath/DPapp/Generarexamen.php';
</script>";*/
}

	?>
</body>
