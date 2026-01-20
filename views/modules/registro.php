<div class="max-w-md mx-auto px-6 py-16">
  <div class="bg-white rounded-3xl shadow-sm border border-black/5 p-8">
    <h2 class="text-2xl font-semibold tracking-tight text-center">Registro</h2>
    <p class="text-slate-500 text-sm text-center mt-2">MVP: en el siguiente paso conectamos esto a la BD.</p>

    <form class="mt-8 space-y-4" method="POST" action="<?= $base ?>/login">
      <input class="w-full rounded-2xl border border-black/10 px-4 py-3" placeholder="Nombres" />
      <input class="w-full rounded-2xl border border-black/10 px-4 py-3" placeholder="Correo" />
      <input type="password" class="w-full rounded-2xl border border-black/10 px-4 py-3" placeholder="Contraseña" />
      <button class="w-full bg-black text-white py-3 rounded-2xl font-medium">Crear cuenta (demo)</button>
    </form>
  </div>
</div>
