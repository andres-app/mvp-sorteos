<?php
require_once "views/modules/admin_guard.php";
require_once "Models/Premio.php";

$premios = Premio::listarAdmin();
?>

<section class="max-w-6xl mx-auto px-6 py-20">

  <div class="flex justify-between mb-6">
    <h2 class="text-2xl font-semibold">Gestión de premios</h2>
    <a href="admin_premio_nuevo"
       class="bg-black text-white px-4 py-2 rounded-xl text-sm">
      + Nuevo premio
    </a>
  </div>

  <div class="grid md:grid-cols-3 gap-6">
    <?php foreach ($premios as $p): ?>
      <div class="bg-white rounded-3xl border p-4">
        <img src="<?= $base ?>/assets/img/premios/<?= $p['imagen'] ?>"
             class="w-full h-40 object-cover rounded-xl mb-3">

        <h3 class="font-semibold"><?= htmlspecialchars($p['nombre']) ?></h3>

        <?php if ($p['es_principal']): ?>
          <span class="text-xs bg-black text-white px-2 py-1 rounded-full">
            Premiazo
          </span>
        <?php endif; ?>

        <p class="text-sm text-slate-500 mt-2">
          Sorteo: <?= date("d/m/Y", strtotime($p['fecha_sorteo'])) ?>
        </p>
      </div>
    <?php endforeach; ?>
  </div>

</section>