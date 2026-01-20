<?php
require_once "Models/Plan.php";
require_once "Models/Suscripcion.php";

/* 🔐 Proteger acceso */
if (!isset($_SESSION["login"])) {
  header("Location: login");
  exit;
}

/* 📦 Obtener planes */
$planes = Plan::listarActivos();

/* 📨 Procesar suscripción */
if ($_SERVER["REQUEST_METHOD"] === "POST") {

  if (!empty($_POST["idplan"])) {

    Suscripcion::crearPendiente(
      $_SESSION["idusuario"],
      $_POST["idplan"]
    );

    header("Location: pago");
    exit;
  }
}
?>

<section class="max-w-5xl mx-auto px-6 py-16">

  <div class="mb-10">
    <h2 class="text-3xl font-semibold tracking-tight">Planes</h2>
    <p class="text-slate-500 mt-2">
      Elige tu suscripción mensual. Luego registra tu pago por Yape o Plin.
    </p>
  </div>

  <div class="grid md:grid-cols-2 gap-6">

    <?php foreach ($planes as $p): ?>
      <div class="bg-white rounded-3xl shadow-sm border border-black/5 p-8">

        <div class="flex items-start justify-between">
          <div>
            <h3 class="text-xl font-semibold">
              <?= htmlspecialchars($p["nombre"]) ?>
            </h3>
            <p class="text-slate-500 mt-1">
              <?= (int)$p["tickets_mensuales"] ?> participaciones / mes
            </p>
          </div>

          <div class="text-right">
            <p class="text-3xl font-semibold">
              S/ <?= number_format((float)$p["precio"], 2) ?>
            </p>
            <p class="text-xs text-slate-500">mensual</p>
          </div>
        </div>

        <!-- 🔴 ACCIONES -->
        <div class="mt-8 flex gap-3">

          <!-- ✅ FORMULARIO REAL (POST) -->
          <form method="POST" action="planes" class="flex-1">
            <input
              type="hidden"
              name="idplan"
              value="<?= (int)$p["idplan"] ?>">

            <button
              type="submit"
              class="w-full bg-black text-white py-3 rounded-2xl text-center font-medium hover:opacity-90 transition">
              Suscribirme
            </button>
          </form>

          <!-- ⬅️ Volver -->
          <a
            href="home"
            class="px-4 py-3 rounded-2xl border border-black/10 hover:bg-black/5 transition">
            Volver
          </a>

        </div>

      </div>
    <?php endforeach; ?>

  </div>
</section>
