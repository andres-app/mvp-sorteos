<?php
require_once __DIR__ . '/../../Models/Plan.php';
$planes = Plan::listarActivos();
?>

<section class="max-w-5xl mx-auto px-6 py-16">
  <div class="mb-10">
    <h2 class="text-3xl font-semibold tracking-tight">Planes</h2>
    <p class="text-slate-500 mt-2">Elige tu suscripción mensual. Luego registras tu pago por Yape o Plin.</p>
  </div>

  <div class="grid md:grid-cols-2 gap-6">
    <?php foreach ($planes as $p): ?>
      <div class="bg-white rounded-3xl shadow-sm border border-black/5 p-8">
        <div class="flex items-start justify-between">
          <div>
            <h3 class="text-xl font-semibold"><?= htmlspecialchars($p['nombre']) ?></h3>
            <p class="text-slate-500 mt-1"><?= (int)$p['tickets_mensuales'] ?> participaciones / mes</p>
          </div>
          <div class="text-right">
            <p class="text-3xl font-semibold">S/ <?= number_format((float)$p['precio'], 2) ?></p>
            <p class="text-xs text-slate-500">mensual</p>
          </div>
        </div>

        <div class="mt-8 flex gap-3">
          <a href="<?= $base ?>/login" class="flex-1 bg-black text-white py-3 rounded-2xl text-center font-medium">Suscribirme</a>
          <a href="<?= $base ?>/home" class="px-4 py-3 rounded-2xl border border-black/10 hover:bg-black/5">Volver</a>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</section>
