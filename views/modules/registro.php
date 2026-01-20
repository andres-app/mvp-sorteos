<?php
require_once "Models/Usuario.php";

// 👉 Si ya está logueado, no debería ver registro
if (isset($_SESSION["login"])) {
  header("Location: dashboard");
  exit;
}

$error = null;

if ($_SERVER["REQUEST_METHOD"] === "POST") {

  if (
    !empty($_POST["nombres"]) &&
    !empty($_POST["email"]) &&
    !empty($_POST["password"])
  ) {

    $ok = Usuario::registrar($_POST);

    if ($ok) {
      header("Location: login");
      exit;
    } else {
      $error = "No se pudo registrar el usuario";
    }

  } else {
    $error = "Completa todos los campos";
  }
}
?>

<div class="flex justify-center py-24 px-6">
  <div class="bg-white max-w-md w-full rounded-3xl shadow-lg p-10">
    <h2 class="text-2xl font-semibold text-center">Crear cuenta</h2>

    <?php if ($error): ?>
      <div class="mt-6 text-center text-sm text-red-600">
        <?= $error ?>
      </div>
    <?php endif; ?>

    <form method="POST" class="mt-8 space-y-4">
      <input
        name="nombres"
        required
        placeholder="Nombre completo"
        class="w-full border rounded-xl px-4 py-3">

      <input
        type="email"
        name="email"
        required
        placeholder="Correo electrónico"
        class="w-full border rounded-xl px-4 py-3">

      <input
        type="password"
        name="password"
        required
        placeholder="Contraseña"
        class="w-full border rounded-xl px-4 py-3">

      <button
        class="w-full bg-black text-white py-3 rounded-xl text-lg">
        Registrarme
      </button>
    </form>
  </div>
</div>
