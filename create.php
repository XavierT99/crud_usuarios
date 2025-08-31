<?php
require 'db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $stmt = $pdo->prepare("INSERT INTO users (name, email) VALUES (?, ?)");
  $stmt->execute([$name, $email]);
  header("Location: index.php");
}
?>

<form method="post">
  <h2>Nuevo Usuario</h2>
  Nombre: <input type="text" name="name" required><br>
  Email: <input type="email" name="email" required><br>
  <button type="submit">Guardar</button>
</form>