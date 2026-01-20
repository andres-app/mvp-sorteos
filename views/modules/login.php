<?php
require_once "Models/Usuario.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

  $usuario = Usuario::login($_POST["email"]);

  if ($usuario && password_verify($_POST["password"], $usuario["password_hash"])) {

    $_SESSION["login"] = true;
    $_SESSION["idusuario"] = $usuario["idusuario"];
    $_SESSION["nombres"] = $usuario["nombres"];
    $_SESSION["rol"] = $usuario["rol"];

    header("Location: dashboard");
    exit;

  } else {
    $error = "Credenciales incorrectas";
  }
}
?>

<div class="flex items-center justify-center py-24 px-6">
  <div class="bg-white w-full max-w-md rounded-3xl shadow-lg p-10">
    <h2 class="text-2xl font-semibold text-center">Iniciar sesión</h2>

    <?php if (!empty($error)): ?>
      <p class="text-red-500 text-sm text-center mt-4"><?= $error ?></p>
    <?php endif; ?>

    <form method="POST" class="mt-8 space-y-4">
      <input type="email" name="email" required
        class="w-full border rounded-xl px-4 py-3"
        placeholder="Correo">

      <input type="password" name="password" required
        class="w-full border rounded-xl px-4 py-3"
        placeholder="Contraseña">

      <button class="w-full bg-black text-white py-3 rounded-xl">
        Entrar
      </button>
    </form>
  </div>
</div>
