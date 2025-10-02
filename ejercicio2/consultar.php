<?php


require_once 'conexion.php';

$database = new Database();
$db = $database->getConnection();

$query = "SELECT * FROM estudiante";
$stmt = $db->prepare($query);
$stmt->execute();


?>


<!DOCTYPE html>
<html>
<head>
    <title>Consultar Estudiantes</title>
</head>
<body>
    <h1>Lista de Estudiantes</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Telefono</th>
            <th>Fecha Nacimiento</th>
            <th>Direccion</th>
            <th>Accion</th>
        </tr>
        <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['nombre']; ?></td>
            <td><?php echo $row['telefono']; ?></td>
            <td><?php echo $row['fecha_nacimiento']; ?></td>
            <td><?php echo $row['direccion']; ?></td>
            <td>
                <a href="eliminar.php?id=<?php echo $row['id']; ?>">Eliminar</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
    <p><a href="insertar.php">Insertar nuevo estudiante</a></p>
</body>
</html>
