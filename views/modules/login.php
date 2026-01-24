<?php
require_once "Models/Usuario.php";

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

    $_SESSION['toast'] = [
      'type' => 'error',
      'message' => 'Correo o contraseña incorrectos'
    ];

    header("Location: login?tab=login");
    exit;
  }
}

/* =====================
   REGISTRO (DESDE LOGIN)
===================== */
if ($_SERVER["REQUEST_METHOD"] === "POST" && ($_POST['form'] ?? '') === 'registro') {

  if (Usuario::existeEmail($_POST['email'])) {

    $_SESSION['toast'] = [
      'type' => 'error',
      'message' => 'Este correo ya está registrado'
    ];

    header("Location: login?tab=registro");
    exit;

  } else {

    Usuario::registrar([
      'nombres'  => $_POST['nombres'],
      'email'    => $_POST['email'],
      'password' => password_hash($_POST['password'], PASSWORD_DEFAULT)
    ]);

    $_SESSION['toast'] = [
      'type' => 'success',
      'message' => 'Cuenta creada correctamente. Ahora puedes iniciar sesión.'
    ];

    header("Location: login?tab=login");
    exit;
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
          class="w-full border border-black/10 rounded-xl px-4 py-3
                 focus:outline-none focus:ring-2 focus:ring-black">

        <input
          type="password"
          name="password"
          required
          placeholder="Contraseña"
          class="w-full border border-black/10 rounded-xl px-4 py-3
                 focus:outline-none focus:ring-2 focus:ring-black">

        <button
          class="w-full bg-black text-white py-3 rounded-xl text-lg
                 hover:opacity-90 transition">
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
          class="w-full border border-black/10 rounded-xl px-4 py-3
                 focus:outline-none focus:ring-2 focus:ring-black">

        <input
          type="email"
          name="email"
          required
          placeholder="Correo electrónico"
          class="w-full border border-black/10 rounded-xl px-4 py-3
                 focus:outline-none focus:ring-2 focus:ring-black">

        <input
          type="password"
          name="password"
          required
          placeholder="Contraseña"
          class="w-full border border-black/10 rounded-xl px-4 py-3
                 focus:outline-none focus:ring-2 focus:ring-black">

        <button
          class="w-full bg-black text-white py-3 rounded-xl text-lg
                 hover:opacity-90 transition">
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

    <!-- GOOGLE (solo UI por ahora) -->
    <div class="mt-8">
      <a href="#"
        class="w-full flex items-center justify-center gap-3
               border border-black/10 py-3 rounded-xl text-sm
               hover:bg-black hover:text-white transition">

        <svg class="w-5 h-5" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
          <path fill="#EA4335" d="M24 9.5c3.54 0 6.72 1.23 9.21 3.65l6.85-6.85C35.9 2.4 30.47 0 24 0 14.62 0 6.51 5.38 2.56 13.22l7.98 6.19C12.43 13.02 17.74 9.5 24 9.5z" />
          <path fill="#4285F4" d="M46.5 24.5c0-1.56-.14-3.06-.4-4.5H24v9h12.7c-.55 2.96-2.22 5.47-4.7 7.15l7.27 5.63c4.26-3.93 6.73-9.72 6.73-17.28z" />
          <path fill="#FBBC05" d="M10.54 28.41c-.48-1.45-.76-2.99-.76-4.41s.28-2.96.76-4.41l-7.98-6.19C.92 16.6 0 20.2 0 24s.92 7.4 2.56 10.6l7.98-6.19z" />
          <path fill="#34A853" d="M24 48c6.48 0 11.93-2.14 15.91-5.81l-7.27-5.63c-2.02 1.35-4.6 2.14-8.64 2.14-6.26 0-11.57-3.52-13.46-8.91l-7.98 6.19C6.51 42.62 14.62 48 24 48z" />
        </svg>
        Continuar con Google
      </a>
    </div>

  </div>
</div>
