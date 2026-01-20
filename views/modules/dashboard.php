<?php
if (!isset($_SESSION["login"])) {
  header("Location: login");
  exit;
}
?>

<div class="max-w-6xl mx-auto px-6 py-20">
  <h1 class="text-3xl font-semibold">
    Bienvenido, <?= $_SESSION["nombres"] ?>
  </h1>

  <p class="mt-4 text-gray-500">
    Tu suscripción y participaciones aparecerán aquí.
  </p>
</div>
