<?php




require_once 'conexion.php';


if($_SERVER["REQUEST_METHOD"] == "POST"){
    $database = new Database();
    $db = $database->getConnection();

    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $direccion = $_POST['direccion'];

    $query = "INSERT INTO estudiante (nombre, telefono, fecha_nacimiento, direccion) VALUES (:nombre, :telefono, :fecha_nacimiento, :direccion)";
    $stmt = $db->prepare($query);

    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':telefono', $telefono);
    $stmt->bindParam(':fecha_nacimiento', $fecha_nacimiento);
    $stmt->bindParam(':direccion', $direccion);

    if($stmt->execute()){
        echo "Estudiante insertado";
    }else{
        echo "Error al insertar";
    }
}


?>

<!DOCTYPE html>
<html>
<head>
    <title>Insertar Estudiante</title>
</head>
<body>
    <h1>Insertar Estudiante</h1>
    <form method="POST">
        <p>Nombre: <input type="text" name="nombre" required></p>
        <p>Telefono: <input type="text" name="telefono" required></p>
        <p>Fecha de Nacimiento: <input type="date" name="fecha_nacimiento" required></p>
        <p>Direccion: <input type="text" name="direccion" required></p>
        <p><button type="submit">Insertar</button></p>
    </form>
    <p><a href="consultar.php">Ver estudiantes</a></p>
</body>
</html>
