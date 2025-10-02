<?php


require_once 'conexion.php';


if(isset($_GET['id'])){
    $database = new Database();
    $db = $database->getConnection();

    $id = $_GET['id'];

    $query = "DELETE FROM estudiante WHERE id = :id";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':id', $id);

    if($stmt->execute()){
        echo "Estudiante eliminado";
    }else{
        echo "Error al eliminar";
    }
}



?>

<!DOCTYPE html>
<html>
<head>
    <title>Eliminar Estudiante</title>
</head>
<body>
    <p><a href="consultar.php">Volver a la lista</a></p>
</body>
</html>
