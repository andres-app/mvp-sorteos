<div class="max-w-md mx-auto px-6 py-16">
  <div class="bg-white rounded-3xl shadow-sm border border-black/5 p-8">
    <h2 class="text-2xl font-semibold tracking-tight">Registrar pago</h2>
    <p class="text-slate-500 text-sm mt-2">Yape/Plin (manual). En el siguiente paso guardamos esto en BD y lo dejamos pendiente para confirmación admin.</p>

    <form class="mt-8 space-y-4" method="POST" action="#">
      <div class="grid grid-cols-2 gap-3">
        <select name="metodo" class="w-full rounded-2xl border border-black/10 px-4 py-3">
          <option value="YAPE">Yape</option>
          <option value="PLIN">Plin</option>
        </select>
        <input name="monto" class="w-full rounded-2xl border border-black/10 px-4 py-3" placeholder="Monto" />
      </div>

      <input name="celular_origen" class="w-full rounded-2xl border border-black/10 px-4 py-3" placeholder="Celular del pago (opcional)" />
      <input name="nro_operacion" class="w-full rounded-2xl border border-black/10 px-4 py-3" placeholder="Nro. operación (opcional)" />

      <button class="w-full bg-black text-white py-3 rounded-2xl font-medium">Registrar (demo)</button>

      <a href="<?= $base ?>/dashboard" class="block text-center text-sm text-slate-500 mt-2 hover:text-black">Volver al dashboard</a>
    </form>
  </div>
</div>
