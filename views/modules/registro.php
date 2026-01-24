<?php
require_once "Models/Usuario.php";

// 👉 Si ya está logueado, no debería ver registro
if (isset($_SESSION["login"])) {
  header("Location: mi-cuenta");
  exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {

  if (
    empty($_POST["nombres"]) ||
    empty($_POST["email"]) ||
    empty($_POST["password"])
  ) {

    $_SESSION['toast'] = [
      'type' => 'error',
      'message' => 'Completa todos los campos'
    ];

  } elseif (Usuario::existeEmail($_POST["email"])) {

    $_SESSION['toast'] = [
      'type' => 'error',
      'message' => 'Este correo ya está registrado'
    ];

  } else {

    $ok = Usuario::registrar([
      'nombres'  => $_POST['nombres'],
      'email'    => $_POST['email'],
      'password' => password_hash($_POST['password'], PASSWORD_DEFAULT)
    ]);

    if ($ok) {

      $_SESSION['toast'] = [
        'type' => 'success',
        'message' => 'Cuenta creada correctamente. Ahora puedes iniciar sesión.'
      ];

      header("Location: login");
      exit;

    } else {

      $_SESSION['toast'] = [
        'type' => 'error',
        'message' => 'No se pudo registrar el usuario'
      ];
    }
  }
}
?>

<div class="flex justify-center py-24 px-6 bg-slate-50">
  <div class="bg-white max-w-md w-full rounded-3xl shadow-sm border border-black/5 p-10">

    <h2 class="text-2xl font-semibold text-center mb-2">
      Crear cuenta
    </h2>

    <p class="text-center text-slate-500 mb-8">
      Regístrate para participar en los sorteos
    </p>

    <form method="POST" class="space-y-4">

      <input
        name="nombres"
        required
        placeholder="Nombre completo"
        class="w-full border border-black/10 rounded-xl px-4 py-3
               focus:outline-none focus:ring-2 focus:ring-purple-600">

      <input
        type="email"
        name="email"
        required
        placeholder="Correo electrónico"
        class="w-full border border-black/10 rounded-xl px-4 py-3
               focus:outline-none focus:ring-2 focus:ring-purple-600">

      <input
        type="password"
        name="password"
        required
        placeholder="Contraseña"
        class="w-full border border-black/10 rounded-xl px-4 py-3
               focus:outline-none focus:ring-2 focus:ring-purple-600">

      <button
        class="w-full bg-black text-white py-3 rounded-xl text-lg
               hover:opacity-90 transition">
        Registrarme
      </button>
    </form>

    <p class="text-sm text-center text-slate-500 mt-8">
      ¿Ya tienes cuenta?
      <a href="login" class="text-purple-700 font-medium">
        Iniciar sesión
      </a>
    </p>

  </div>
</div>