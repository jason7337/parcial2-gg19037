<!DOCTYPE html>
<html>
<head>
    <title>Simulador de Credito</title>
</head>
<body>
    <h1>Simulador de Credito</h1>
    <form method="POST" action="/calcular">
        <p>
            Nombre: <input type="text" name="nombre" required>
        </p>
        <p>
            Correo: <input type="text" name="correo" required>
        </p>
        <p>
            DUI: <input type="text" name="dui" placeholder="00000000-0" required>
        </p>
        <p>
            Monto: <input type="number" step="0.01" name="monto" required>
        </p>
        <p>
            Tasa anual (%): <input type="number" step="0.01" name="tasa" required>
        </p>
        <p>
            Plazo (meses): <input type="number" name="plazo" required>
        </p>
        <p>
            <button type="submit">Calcular</button>
        </p>
    </form>
</body>
</html>
