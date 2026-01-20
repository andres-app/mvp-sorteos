<div class="max-w-md mx-auto px-6 py-16">
  <div class="bg-white rounded-3xl shadow-sm border border-black/5 p-8">
    <h2 class="text-2xl font-semibold tracking-tight text-center">Iniciar sesión</h2>
    <p class="text-slate-500 text-sm text-center mt-2">MVP: por ahora simulamos sesión con un botón.</p>

    <form class="mt-8 space-y-4" method="POST" action="<?= $base ?>/dashboard">
      <input class="w-full rounded-2xl border border-black/10 px-4 py-3" placeholder="Correo (demo)" />
      <input type="password" class="w-full rounded-2xl border border-black/10 px-4 py-3" placeholder="Contraseña (demo)" />

      <button class="w-full bg-black text-white py-3 rounded-2xl font-medium">Entrar (demo)</button>

      <div class="text-center text-sm text-slate-500">
        ¿No tienes cuenta? <a class="text-black underline" href="<?= $base ?>/registro">Regístrate</a>
      </div>
    </form>
  </div>
</div>
