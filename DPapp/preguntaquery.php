<?php
require_once '/classes/connection.php';
$connection = new Connection();
$tema = $_POST['tema'];
print_r ($_POST);
$query = $connection->getConnection()->prepare("SELECT * FROM \"Preguntas\" WHERE \"IdTema\" = $tema");
$query->execute();

$results = $query->fetchAll(PDO::FETCH_ASSOC);
$s= "";
foreach($results as $row) {
    $s.= "<option value= '" . $row['IdPregunta'] . " ' >" . $row['IdPregunta'] . "</option>";
}
echo json_encode($s);
?>
