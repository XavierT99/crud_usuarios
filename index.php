<?php
require 'db.php';
$stmt = $pdo->query("SELECT * FROM users");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Lista de Usuarios</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1>Usuarios</h1>
  <a href="create.php">Agregar nuevo usuario</a>
  <table>
    <tr><th>ID</th><th>Nombre</th><th>Email</th><th>Acciones</th></tr>
    <?php foreach ($stmt as $row): ?>
      <tr>
        <td><?= $row['id'] ?></td>
        <td><?= $row['name'] ?></td>
        <td><?= $row['email'] ?></td>
        <td>
          <a href="edit.php?id=<?= $row['id'] ?>">Editar</a>
          <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('¿Eliminar?')">Eliminar</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </table>
</body>
</html>