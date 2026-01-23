<?php
require_once "Models/Usuario.php";

$error = null;

// 👉 Si ya está logueado, no debería ver login
if (isset($_SESSION["login"])) {
  header("Location: mi-cuenta");
  exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {

  $usuario = Usuario::login($_POST["email"]);

  if ($usuario && password_verify($_POST["password"], $usuario["password_hash"])) {

    $_SESSION["login"]     = true;
    $_SESSION["idusuario"] = $usuario["idusuario"];
    $_SESSION["nombres"]   = $usuario["nombres"];
    $_SESSION["rol"]       = $usuario["rol"];

    header("Location: mi-cuenta");
    exit;

  } else {
    $error = "Correo o contraseña incorrectos";
  }
}
?>

<div class="flex items-center justify-center py-24 px-6">
  <div class="bg-white w-full max-w-md rounded-3xl shadow-lg p-10">
    <h2 class="text-2xl font-semibold text-center">Iniciar sesión</h2>

    <?php if ($error): ?>
      <div class="mt-6 text-center text-sm text-red-600">
        <?= $error ?>
      </div>
    <?php endif; ?>

    <form method="POST" class="mt-8 space-y-4">
      <input
        type="email"
        name="email"
        required
        placeholder="Correo electrónico"
        class="w-full border rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-black">

      <input
        type="password"
        name="password"
        required
        placeholder="Contraseña"
        class="w-full border rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-black">

      <button
        class="w-full bg-black text-white py-3 rounded-xl text-lg hover:opacity-90 transition">
        Entrar
      </button>
    </form>
  </div>
</div>
