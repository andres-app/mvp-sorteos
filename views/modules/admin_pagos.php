<?php
require_once ROOT_PATH . "/views/modules/admin_guard.php";
require_once ROOT_PATH . "/Models/Pago.php";
require_once ROOT_PATH . "/Models/Suscripcion.php";

/* 📦 Pagos pendientes */
$pagos = Pago::listarPendientes();

/* ✅ Confirmar pago */
if ($_SERVER["REQUEST_METHOD"] === "POST") {

  if (!empty($_POST["idpago"]) && !empty($_POST["idsuscripcion"])) {

    Suscripcion::activar($_POST["idsuscripcion"]);
    Pago::confirmar($_POST["idpago"]);

    header("Location: admin_pagos");
    exit;
  }
}
?>

<section class="max-w-6xl mx-auto px-6 py-16">

  <h2 class="text-3xl font-semibold mb-8">Pagos pendientes</h2>

  <div class="bg-white rounded-3xl shadow-sm border overflow-hidden">

    <table class="w-full text-sm">
      <thead class="bg-slate-50">
        <tr>
          <th class="px-6 py-4 text-left">Usuario</th>
          <th>Método</th>
          <th>Monto</th>
          <th>Fecha</th>
          <th></th>
        </tr>
      </thead>

      <tbody>

        <?php foreach ($pagos as $p): ?>
          <tr class="border-t">
            <td class="px-6 py-4">
              <div class="font-medium"><?= htmlspecialchars($p["nombres"]) ?></div>
              <div class="text-slate-500"><?= htmlspecialchars($p["email"]) ?></div>
            </td>

            <td><?= htmlspecialchars($p["metodo"]) ?></td>

            <td>S/ <?= number_format($p["monto"], 2) ?></td>

            <td><?= date("d/m/Y", strtotime($p["created_at"])) ?></td>

            <td>
              <form method="POST" action="admin_pagos">
                <input type="hidden" name="idpago" value="<?= (int)$p["idpago"] ?>">
                <input type="hidden" name="idsuscripcion" value="<?= (int)$p["idsuscripcion"] ?>">

                <button
                  type="submit"
                  class="bg-black text-white px-4 py-2 rounded-xl hover:opacity-90 transition">
                  Confirmar
                </button>
              </form>
            </td>
          </tr>
        <?php endforeach; ?>

        <?php if (empty($pagos)): ?>
          <tr>
            <td colspan="5" class="text-center py-8 text-slate-500">
              No hay pagos pendientes
            </td>
          </tr>
        <?php endif; ?>

      </tbody>
    </table>

  </div>
</section>
