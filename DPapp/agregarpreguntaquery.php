<?php
require_once '/classes/connection.php';
$connection = new Connection();
$pregunta = $_POST['pregunta'];
#print_r ($_POST);
$query = $connection->getConnection()->prepare("SELECT * FROM \"Preguntas\" WHERE \"IdPregunta\" = $pregunta");
$query->execute();

$results = $query->fetchAll(PDO::FETCH_ASSOC);
$s= "";
foreach($results as $row) {
    $s.= $row ['Textopregunta'];
}
echo json_encode($s);
?>