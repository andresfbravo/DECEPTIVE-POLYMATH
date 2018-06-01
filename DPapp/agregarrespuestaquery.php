<?php
session_start();
require_once '/classes/connection.php';
$connection = new Connection();
$pregunta = $_POST['pregunta'];



#print_r ($_POST);
$query1 = $connection->getConnection()->prepare("SELECT * FROM \"Respuestas\" WHERE \"IdPregunta\" = $pregunta");
$query1->execute();

$results1 = $query1->fetchAll(PDO::FETCH_ASSOC);
$respuesta = $results1[0]['IdRespuesta'];
$s1= "";
foreach($results1 as $row) {
    $s1.= $_SESSION['numeracion2'].". ".$row ['Respuesta'];
}
if(!in_array($respuesta,$_SESSION['respuestas'])){
  array_push($_SESSION['respuestas'],$respuesta);
}
$_SESSION['numeracion2'] = $_SESSION['numeracion2'] + 1;

echo json_encode($s1);

?>
