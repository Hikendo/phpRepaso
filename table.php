<?php
// Supongamos que ya tienes una conexión PDO llamada $pdo

// Ejecuta una consulta SQL
$query = "SELECT id, nombre, edad FROM usuarios";
$stmt = $pdo->query($query);

// Obtiene todos los resultados como un array
$resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de Usuarios</title>
</head>
<body>
    <h1>Tabla de Usuarios</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Edad</th>
        </tr>
        <?php foreach ($resultados as $fila): ?>
            <tr>
                <td><?= $fila['id'] ?></td>
                <td><?= $fila['nombre'] ?></td>
                <td><?= $fila['edad'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
