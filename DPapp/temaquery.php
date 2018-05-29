<?php
require_once '/classes/connection.php';
$connection = new Connection();
$materia = $_POST['materia'];
$query = $connection->getConnection()->prepare("SELECT * FROM \"Tema\" WHERE \"IdMateria\" = $materia");
$query->execute();

$results = $query->fetchAll(PDO::FETCH_ASSOC);
$s= "";
foreach($results as $row) {
    $s.= "<option value= '" . $row['IdTema'] . " ' >" . $row['NombreTema'] . "</option>";
}
echo json_encode($s);
?>
