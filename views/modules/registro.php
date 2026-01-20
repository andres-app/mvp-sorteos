<?php
require_once "Models/Usuario.php";
Usuario::registrar();
?>

<div class="flex justify-center py-24 px-6">
  <div class="bg-white max-w-md w-full rounded-3xl shadow-lg p-10">
    <h2 class="text-2xl font-semibold text-center">Crear cuenta</h2>

    <form method="POST" class="mt-8 space-y-4">
      <input name="nombres" required
        placeholder="Nombre completo"
        class="w-full border rounded-xl px-4 py-3">

      <input type="email" name="email" required
        placeholder="Correo"
        class="w-full border rounded-xl px-4 py-3">

      <input type="password" name="password" required
        placeholder="Contraseña"
        class="w-full border rounded-xl px-4 py-3">

      <button class="w-full bg-black text-white py-3 rounded-xl">
        Registrarme
      </button>
    </form>
  </div>
</div>
