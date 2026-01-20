<?php
// MVP: si no hay sesión, crea una demo para que puedas ver flujo UI.
if (empty($_SESSION['idusuario'])) {
  $_SESSION['idusuario'] = 1;
  $_SESSION['nombre'] = 'Andres';
}
?>

<section class="max-w-6xl mx-auto px-6 py-14">
  <div class="grid md:grid-cols-3 gap-6">

    <div class="md:col-span-2 bg-white rounded-3xl shadow-sm border border-black/5 p-8">
      <h2 class="text-2xl font-semibold tracking-tight">Hola, <?= htmlspecialchars($_SESSION['nombre']) ?> 👋</h2>
      <p class="text-slate-500 mt-2">Este es tu dashboard. En el siguiente paso conectamos login/registro reales y el flujo suscripción → pago.</p>

      <div class="mt-8 flex flex-col sm:flex-row gap-3">
        <a href="<?= $base ?>/planes" class="bg-black text-white px-6 py-3 rounded-2xl font-medium text-center">Ver planes</a>
        <a href="<?= $base ?>/pago" class="bg-white border border-black/10 px-6 py-3 rounded-2xl font-medium text-center hover:bg-black/5">Registrar pago</a>
      </div>
    </div>

    <div class="bg-white rounded-3xl shadow-sm border border-black/5 p-8">
      <p class="text-sm text-slate-500">Estado</p>
      <p class="text-2xl font-semibold mt-1">MVP (demo)</p>

      <div class="mt-6 space-y-3">
        <div class="p-4 rounded-2xl bg-black/5">
          <p class="text-xs text-slate-500">Participaciones</p>
          <p class="text-xl font-semibold">10 / mes</p>
        </div>
        <div class="p-4 rounded-2xl bg-black/5">
          <p class="text-xs text-slate-500">Próximo sorteo</p>
          <p class="text-xl font-semibold">Pronto</p>
        </div>
      </div>
    </div>

  </div>
</section>
