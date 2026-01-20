<?php
if (!isset($_SESSION["login"])) {
  header("Location: login");
  exit;
}

require_once ROOT_PATH . "/Models/Suscripcion.php";

$suscripcion = Suscripcion::obtenerUltimaPorUsuario($_SESSION["idusuario"]);
?>

<div class="max-w-6xl mx-auto px-6 py-20">

  <h1 class="text-3xl font-semibold">
    Bienvenido, <?= htmlspecialchars($_SESSION["nombres"]) ?>
  </h1>

  <?php if ($suscripcion): ?>

    <div class="mt-10 bg-white rounded-3xl border shadow-sm p-8 max-w-xl">

      <h2 class="text-xl font-semibold mb-2">
        Estado de tu suscripción
      </h2>

      <?php if ($suscripcion["estado"] === "activa"): ?>
        <p class="text-green-600 font-medium">✔ Activa</p>
        <p class="text-sm text-gray-500 mt-2">
          Vence el <?= date("d/m/Y", strtotime($suscripcion["vence_en"])) ?>
        </p>

      <?php elseif ($suscripcion["estado"] === "pendiente"): ?>
        <p class="text-yellow-600 font-medium">⏳ Pendiente de pago</p>
        <a href="pago"
           class="inline-block mt-4 bg-black text-white px-5 py-2 rounded-xl">
           Registrar pago
        </a>

      <?php else: ?>
        <p class="text-red-600 font-medium">❌ Vencida</p>
        <a href="planes"
           class="inline-block mt-4 bg-black text-white px-5 py-2 rounded-xl">
           Renovar suscripción
        </a>
      <?php endif; ?>

    </div>

  <?php else: ?>

    <div class="mt-10 bg-white rounded-3xl border shadow-sm p-8 max-w-xl">
      <p class="text-gray-600">
        Aún no tienes una suscripción activa.
      </p>
      <a href="planes"
         class="inline-block mt-4 bg-black text-white px-5 py-2 rounded-xl">
         Ver planes
      </a>
    </div>

  <?php endif; ?>

</div>
