<?php
require_once "Models/Suscripcion.php";
require_once "Models/Pago.php";

if (!isset($_SESSION["login"])) {
  header("Location: login");
  exit;
}

$suscripcion = Suscripcion::obtenerUltimaPorUsuario($_SESSION["idusuario"]);

if ($_SERVER["REQUEST_METHOD"] === "POST") {

  Pago::registrar(
    $suscripcion["idsuscripcion"],
    $_POST["metodo"],
    $_POST["monto"]
  );

  $mensaje = "Pago registrado. En breve será validado.";
}
?>

<div class="flex justify-center py-24 px-6">
  <div class="bg-white max-w-md w-full rounded-3xl shadow-lg p-10">
    <h2 class="text-2xl font-semibold text-center">Registrar pago</h2>

    <?php if (!empty($mensaje)): ?>
      <div class="mt-6 text-center text-green-600 text-sm">
        <?= $mensaje ?>
      </div>
    <?php endif; ?>

    <p class="mt-4 text-sm text-gray-500 text-center">
      Plan: <strong><?= $suscripcion["nombre"] ?></strong><br>
      Monto: <strong>S/ <?= number_format($suscripcion["precio"],2) ?></strong>
    </p>

    <form method="POST" class="mt-8 space-y-4">
      <select name="metodo" required
        class="w-full border rounded-xl px-4 py-3">
        <option value="YAPE">Yape</option>
        <option value="PLIN">Plin</option>
      </select>

      <input
        name="monto"
        required
        value="<?= $suscripcion["precio"] ?>"
        class="w-full border rounded-xl px-4 py-3">

      <button
        class="w-full bg-black text-white py-3 rounded-xl text-lg">
        Registrar pago
      </button>
    </form>
  </div>
</div>
