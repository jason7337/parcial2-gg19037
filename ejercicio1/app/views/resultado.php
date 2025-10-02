<!DOCTYPE html>
<html>
<head>
    <title>Resultado</title>
</head>
<body>
    <h1>Resultado de Simulacion</h1>

    <h2>Datos del Cliente</h2>
    <p>Nombre: <?php echo $nombre; ?></p>
    <p>Correo: <?php echo $correo; ?></p>
    <p>DUI: <?php echo $dui; ?></p>
    <p>Cuota Mensual: $<?php echo number_format($cuota, 2); ?></p>

    <h2>Tabla de Amortizacion</h2>
    <table border="1">
        <tr>
            <th>Mes</th>
            <th>Cuota</th>
            <th>Intereses</th>
            <th>Capital</th>
            <th>Saldo Pendiente</th>
        </tr>
        <?php foreach($tabla as $fila): ?>
        <tr>
            <td><?php echo $fila['mes']; ?></td>
            <td>$<?php echo number_format($fila['cuota'], 2); ?></td>
            <td>$<?php echo number_format($fila['intereses'], 2); ?></td>
            <td>$<?php echo number_format($fila['capital'], 2); ?></td>
            <td>$<?php echo number_format($fila['saldo'], 2); ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <p><a href="/">Volver</a></p>
</body>
</html>
