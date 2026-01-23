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

<?php if (empty($premios)): ?>
  <div class="col-span-3 text-center text-slate-500 py-12">
    No hay premios registrados
  </div>
<?php endif; ?>

<?php foreach ($premios as $p): ?>
  <div class="bg-white rounded-3xl border border-black/5 p-4 flex flex-col">

    <!-- IMAGEN -->
    <img
      src="<?= $base ?>/assets/img/premios/<?= htmlspecialchars($p['imagen'] ?: 'default.png') ?>"
      class="w-full h-40 object-cover rounded-xl mb-3">

    <!-- NOMBRE -->
    <h3 class="font-semibold"><?= htmlspecialchars($p['nombre']) ?></h3>

    <!-- BADGES -->
    <div class="flex gap-2 mt-2">
      <?php if (!empty($p['es_principal'])): ?>
        <span class="text-xs bg-black text-white px-2 py-1 rounded-full">
          Premiazo
        </span>
      <?php endif; ?>

      <?php if (isset($p['estado']) && $p['estado'] == 0): ?>
        <span class="text-xs border border-black/20 px-2 py-1 rounded-full">
          Inactivo
        </span>
      <?php endif; ?>
    </div>

    <!-- FECHA -->
    <p class="text-sm text-slate-500 mt-2">
      Sorteo:
      <?= !empty($p['fecha_sorteo'])
        ? date("d/m/Y", strtotime($p['fecha_sorteo']))
        : 'Sin fecha asignada' ?>
    </p>

    <!-- ACCIONES ADMIN -->
    <div class="mt-auto pt-4 space-y-2">

      <a href="admin_premio_editar?id=<?= (int)$p['idpremio'] ?>"
         class="block text-center border border-black/10 px-3 py-2 rounded-xl text-sm hover:bg-black hover:text-white transition">
        Editar
      </a>

      <?php if (isset($p['estado']) && $p['estado'] == 1): ?>
        <a href="Controllers/PremioController.php?op=estado&id=<?= (int)$p['idpremio'] ?>&accion=desactivar"
           class="block text-center border border-black/10 px-3 py-2 rounded-xl text-sm">
          Desactivar
        </a>
      <?php else: ?>
        <a href="Controllers/PremioController.php?op=estado&id=<?= (int)$p['idpremio'] ?>&accion=activar"
           class="block text-center border border-black/10 px-3 py-2 rounded-xl text-sm">
          Activar
        </a>
      <?php endif; ?>

      <?php if (empty($p['es_principal'])): ?>
        <a href="Controllers/PremioController.php?op=principal&id=<?= (int)$p['idpremio'] ?>"
           class="block text-center border border-black/10 px-3 py-2 rounded-xl text-sm hover:bg-black hover:text-white transition">
          Marcar como premiazo
        </a>
      <?php endif; ?>

    </div>

  </div>
<?php endforeach; ?>

</div>


</section>