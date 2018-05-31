<?php
session_start();
require_once '/classes/connection.php';
$connection = new Connection();
$pregunta = $_POST['pregunta'];

#print_r ($_POST);
$query = $connection->getConnection()->prepare("SELECT * FROM \"Preguntas\" WHERE \"IdPregunta\" = $pregunta");
$query->execute();

$results = $query->fetchAll(PDO::FETCH_ASSOC);
$s= "";
foreach($results as $row) {
    $s.= $_SESSION['numeracion'].". ".$row ['Textopregunta'];
}
if(!in_array($pregunta,$_SESSION['preguntas'])){
  array_push($_SESSION['preguntas'],$pregunta);
}
$_SESSION['numeracion'] = $_SESSION['numeracion'] + 1;

echo json_encode($s);
?>
