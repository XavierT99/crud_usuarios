<?php
require 'db.php';
$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$id]);
$user = $stmt->fetch();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $stmt = $pdo->prepare("UPDATE users SET name = ?, email = ? WHERE id = ?");
  $stmt->execute([$name, $email, $id]);
  header("Location: index.php");
}
?>

<form method="post">
  <h2>Editar Usuario</h2>
  Nombre: <input type="text" name="name" value="<?= $user['name'] ?>" required><br>
  Email: <input type="email" name="email" value="<?= $user['email'] ?>" required><br>
  <button type="submit">Actualizar</button>
</form>
