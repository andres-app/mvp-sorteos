<?php
if (!isset($_SESSION["login"])) {
  header("Location: login");
  exit;
}

require_once ROOT_PATH . "/Models/Suscripcion.php";
// Si ya tienes modelos para recibos/chances, luego los conectas
$suscripcion = Suscripcion::obtenerUltimaPorUsuario($_SESSION["idusuario"]);

$tab = $_GET['tab'] ?? 'perfil';
?>

<div class="max-w-6xl mx-auto px-6 py-20">

  <!-- TABS + LOGOUT -->
  <div class="flex items-center justify-between mb-10">

    <div class="flex gap-3">
      <?php
      $tabs = [
        'perfil' => 'Mi perfil',
        'suscripcion' => 'Mi suscripción',
        'chances' => 'Mis chances',
        'recibos' => 'Mis recibos'
      ];
      ?>
      <?php foreach ($tabs as $key => $label): ?>
        <a href="mi-cuenta?tab=<?= $key ?>"
           class="px-4 py-2 rounded-xl text-sm font-medium
           <?= $tab === $key
             ? 'bg-black text-white'
             : 'bg-purple-100 text-purple-700 hover:bg-purple-200' ?>">
          <?= $label ?>
        </a>
      <?php endforeach; ?>
    </div>

    <a href="salir"
       class="border border-purple-400 text-purple-700 px-4 py-2 rounded-xl text-sm flex items-center gap-2">
      Cerrar sesión →
    </a>

  </div>

  <!-- CARD PRINCIPAL -->
  <div class="bg-white rounded-[32px] shadow-sm border border-black/5 p-10">

    <!-- ========================= -->
    <!-- MI PERFIL -->
    <!-- ========================= -->
    <?php if ($tab === 'perfil'): ?>

      <div class="flex flex-col md:flex-row justify-between gap-10">

        <div>
          <h2 class="text-2xl font-semibold mb-6">Mi perfil</h2>

          <div class="space-y-2 text-slate-700">
            <p class="font-medium"><?= htmlspecialchars($_SESSION["nombres"]) ?></p>
            <p><?= htmlspecialchars($_SESSION["telefono"] ?? '+51 --- --- ---') ?></p>
            <p><?= htmlspecialchars($_SESSION["email"] ?? '') ?></p>
          </div>

          <a href="perfil_editar"
             class="inline-flex items-center gap-2 mt-6 px-4 py-2 rounded-xl text-sm
                    bg-purple-100 text-purple-700 hover:bg-purple-200">
            Editar ✎
          </a>
        </div>

        <div class="bg-slate-50 rounded-2xl p-6 text-center">
          <div class="w-32 h-32 bg-white rounded-xl border mx-auto mb-3 flex items-center justify-center">
            QR
          </div>
          <p class="text-xs text-slate-500">Código de identificación</p>
          <p class="font-mono text-sm mt-1">
            <?= substr(md5($_SESSION["idusuario"]), 0, 12) ?>
          </p>
        </div>

      </div>

    <?php endif; ?>

    <!-- ========================= -->
    <!-- MI SUSCRIPCIÓN -->
    <!-- ========================= -->
    <?php if ($tab === 'suscripcion'): ?>

      <h2 class="text-2xl font-semibold mb-8">Mi suscripción</h2>

      <?php if ($suscripcion): ?>

        <div class="flex justify-between items-start mb-8">
          <div>
            <h3 class="text-xl font-semibold mb-2">
              Plan <?= htmlspecialchars($suscripcion['plan_nombre'] ?? 'Pruebita') ?>
            </h3>

            <ul class="text-sm text-slate-600 space-y-1">
              <li>• Descuentos en marcas aliadas</li>
              <li>• Participación en premios semanales</li>
              <li>• Renovación automática</li>
            </ul>
          </div>

          <div class="text-right text-sm text-slate-600">
            <p>Plan válido hasta</p>
            <p class="font-semibold text-lg">
              <?= date("d M Y", strtotime($suscripcion["vence_en"])) ?>
            </p>
          </div>
        </div>

        <div class="flex items-center gap-6">

          <?php if ($suscripcion["estado"] === "activa"): ?>
            <span class="inline-flex items-center gap-2 text-sm text-green-600 font-medium">
              ● Activa
            </span>

            <a href="cancelar_suscripcion"
               class="border border-purple-400 text-purple-700 px-5 py-2 rounded-xl text-sm">
              Cancelar suscripción
            </a>

          <?php elseif ($suscripcion["estado"] === "pendiente"): ?>
            <span class="text-yellow-600 font-medium">Pendiente de pago</span>

            <a href="pago"
               class="bg-black text-white px-5 py-2 rounded-xl text-sm">
              Registrar pago
            </a>

          <?php else: ?>
            <span class="text-red-600 font-medium">Vencida</span>

            <a href="planes"
               class="bg-black text-white px-5 py-2 rounded-xl text-sm">
              Renovar
            </a>
          <?php endif; ?>

        </div>

        <div class="mt-8 bg-yellow-100 text-yellow-800 text-sm rounded-xl px-5 py-3">
          Al cancelar tu suscripción perderás el acceso a todos los beneficios exclusivos.
        </div>

      <?php else: ?>

        <p class="text-slate-600">
          Aún no tienes una suscripción activa.
        </p>

        <a href="planes"
           class="inline-block mt-4 bg-black text-white px-6 py-3 rounded-xl">
          Ver planes
        </a>

      <?php endif; ?>

    <?php endif; ?>

    <!-- ========================= -->
    <!-- MIS CHANCES -->
    <!-- ========================= -->
    <?php if ($tab === 'chances'): ?>

      <h2 class="text-2xl font-semibold mb-6">Mis chances</h2>

      <p class="text-slate-600">
        Aquí verás cuántas oportunidades tienes en cada sorteo.
      </p>

      <div class="mt-6 bg-slate-50 rounded-2xl p-6 text-center text-slate-500">
        Próximamente
      </div>

    <?php endif; ?>

    <!-- ========================= -->
    <!-- MIS RECIBOS -->
    <!-- ========================= -->
    <?php if ($tab === 'recibos'): ?>

      <h2 class="text-2xl font-semibold mb-6">Mis recibos</h2>

      <div class="overflow-hidden rounded-2xl border border-black/5">
        <table class="w-full text-sm">
          <thead class="bg-slate-50 text-left">
            <tr>
              <th class="px-6 py-3">N° de orden</th>
              <th>Producto</th>
              <th>Monto</th>
              <th>Fecha</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <tr class="border-t">
              <td class="px-6 py-4">251205122424</td>
              <td>Suscripción Pruebita</td>
              <td>S/ 60</td>
              <td>05 DIC 2025</td>
              <td>
                <a href="#" class="text-purple-700">⬇</a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

    <?php endif; ?>

  </div>
</div>
