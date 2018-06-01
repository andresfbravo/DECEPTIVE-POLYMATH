<?php
session_start();
require_once '/classes/connection.php';
$connection = new Connection();
$pregunta = $_POST['pregunta'];

$respuesta = $_POST['respuesta'];

#print_r ($_POST);
$query1 = $connection->getConnection()->prepare("SELECT * FROM \"Respuestas\" WHERE \"IdPregunta\" = $pregunta");
$query1->execute();

$results1 = $query1->fetchAll(PDO::FETCH_ASSOC);
$s1= "";
foreach($results as $row) {
    $s1.= $_SESSION['numeracion'].". ".$row ['Textorespuesta'];
}
if(!in_array($respuesta,$_SESSION['respuestas'])){
  array_push($_SESSION['respuestas'],$respuesta);
}
$_SESSION['numeracion'] = $_SESSION['numeracion'] + 1;

echo json_encode($s);

?>