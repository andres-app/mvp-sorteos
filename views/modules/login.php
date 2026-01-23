<?php
require_once "Models/Usuario.php";

$error = null;
$success = null;

// 👉 Si ya está logueado, no debería ver login
if (isset($_SESSION["login"])) {
  header("Location: home");
  exit;
}

$tab = $_GET['tab'] ?? 'login';

/* =====================
   LOGIN
===================== */
if ($_SERVER["REQUEST_METHOD"] === "POST" && ($_POST['form'] ?? '') === 'login') {

  $usuario = Usuario::login($_POST["email"]);

  if ($usuario && password_verify($_POST["password"], $usuario["password_hash"])) {

    $_SESSION["login"]     = true;
    $_SESSION["idusuario"] = $usuario["idusuario"];
    $_SESSION["nombres"]   = $usuario["nombres"];
    $_SESSION["rol"]       = $usuario["rol"];

    header("Location: home");
    exit;

  } else {
    $error = "Correo o contraseña incorrectos";
    $tab = 'login';
  }
}

/* =====================
   REGISTRO
===================== */
if ($_SERVER["REQUEST_METHOD"] === "POST" && ($_POST['form'] ?? '') === 'registro') {

  if (Usuario::existeEmail($_POST['email'])) {
    $error = "Este correo ya está registrado";
    $tab = 'registro';
  } else {

    Usuario::registrar([
      'nombres'  => $_POST['nombres'],
      'email'    => $_POST['email'],
      'password' => password_hash($_POST['password'], PASSWORD_DEFAULT)
    ]);

    $success = "Cuenta creada correctamente. Ahora puedes iniciar sesión.";
    $tab = 'login';
  }
}
?>

<div class="flex items-center justify-center py-24 px-6 bg-slate-50">
  <div class="bg-white w-full max-w-md rounded-3xl shadow-sm border border-black/5 p-10">

    <!-- TABS -->
    <div class="flex gap-2 mb-8">
      <a href="?tab=login"
         class="flex-1 text-center py-2 rounded-xl text-sm font-medium
         <?= $tab === 'login'
           ? 'bg-black text-white'
           : 'bg-slate-100 text-slate-600 hover:bg-slate-200' ?>">
        Iniciar sesión
      </a>

      <a href="?tab=registro"
         class="flex-1 text-center py-2 rounded-xl text-sm font-medium
         <?= $tab === 'registro'
           ? 'bg-black text-white'
           : 'bg-slate-100 text-slate-600 hover:bg-slate-200' ?>">
        Crear cuenta
      </a>
    </div>

    <!-- MENSAJES -->
    <?php if ($error): ?>
      <div class="mb-6 text-center text-sm text-red-600">
        <?= $error ?>
      </div>
    <?php endif; ?>

    <?php if ($success): ?>
      <div class="mb-6 text-center text-sm text-green-600">
        <?= $success ?>
      </div>
    <?php endif; ?>

    <!-- =====================
         FORM LOGIN
    ====================== -->
    <?php if ($tab === 'login'): ?>

      <form method="POST" class="space-y-4">
        <input type="hidden" name="form" value="login">

        <input
          type="email"
          name="email"
          required
          placeholder="Correo electrónico"
          class="w-full border border-black/10 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-black">

        <input
          type="password"
          name="password"
          required
          placeholder="Contraseña"
          class="w-full border border-black/10 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-black">

        <button
          class="w-full bg-black text-white py-3 rounded-xl text-lg hover:opacity-90 transition">
          Entrar
        </button>
      </form>

    <?php endif; ?>

    <!-- =====================
         FORM REGISTRO
    ====================== -->
    <?php if ($tab === 'registro'): ?>

      <form method="POST" class="space-y-4">
        <input type="hidden" name="form" value="registro">

        <input
          type="text"
          name="nombres"
          required
          placeholder="Nombre completo"
          class="w-full border border-black/10 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-black">

        <input
          type="email"
          name="email"
          required
          placeholder="Correo electrónico"
          class="w-full border border-black/10 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-black">

        <input
          type="password"
          name="password"
          required
          placeholder="Contraseña"
          class="w-full border border-black/10 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-black">

        <button
          class="w-full bg-black text-white py-3 rounded-xl text-lg hover:opacity-90 transition">
          Crear cuenta
        </button>
      </form>

      <p class="text-xs text-slate-500 mt-4 text-center">
        Al registrarte aceptas nuestros
        <a href="terminos" class="underline">términos</a>
        y
        <a href="privacidad" class="underline">política de privacidad</a>.
      </p>

    <?php endif; ?>

    <!-- GOOGLE (solo UI) -->
    <div class="mt-8">
      <a href="#"
         class="w-full flex items-center justify-center gap-3
                border border-black/10 py-3 rounded-xl text-sm
                hover:bg-black hover:text-white transition">
        <img src="assets/img/google.svg" class="w-5 h-5">
        Continuar con Google
      </a>
    </div>

  </div>
</div>