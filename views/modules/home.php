<!-- ===================== -->
<!-- HERO -->
<!-- ===================== -->
<section class="max-w-6xl mx-auto px-6 py-20">

  <div class="bg-white rounded-3xl shadow-sm border border-black/5 p-10 md:p-14 text-center">
    <h1 class="text-4xl md:text-5xl font-semibold tracking-tight">
      Suscríbete. Participa. Gana.
    </h1>

    <p class="mt-4 text-slate-500 max-w-2xl mx-auto">
      Sorteos mensuales exclusivos para suscriptores. Participa automáticamente y gana premios reales.
    </p>

    <div class="mt-8 flex flex-col sm:flex-row gap-3 justify-center">
      <a href="<?= $base ?>/planes"
        class="bg-black text-white px-6 py-3 rounded-2xl text-base font-medium">
        Ver planes
      </a>
      <a href="<?= $base ?>/login"
        class="bg-white border border-black/10 px-6 py-3 rounded-2xl text-base font-medium hover:bg-black/5">
        Ingresar
      </a>
    </div>
  </div>

</section>


<!-- ===================== -->
<!-- SORTEOS DEL MES -->
<!-- ===================== -->
<section class="max-w-6xl mx-auto px-6 pb-20">

  <h2 class="text-2xl font-semibold mb-6">
    Sorteos de este mes
  </h2>

  <div class="flex gap-6 overflow-x-auto pb-4 snap-x snap-mandatory">

    <!-- ===================== -->
    <!-- PREMIO PRINCIPAL -->
    <!-- ===================== -->
    <div class="min-w-[420px] snap-start bg-white rounded-3xl shadow-md border border-black/5 p-6">

      <!-- Imagen GRANDE -->
      <div class="w-full h-64 rounded-2xl overflow-hidden bg-slate-100 mb-4">
        <img
          src="<?= $base ?>/assets/img/premios/auto.png"
          alt="Auto 0km"
          class="w-full h-full object-cover object-center" />
      </div>

      <!-- Badge -->
      <span class="inline-block mb-2 text-xs font-semibold uppercase tracking-wide text-white bg-black px-3 py-1 rounded-full">
        Premiazo
      </span>

      <h3 class="text-xl font-semibold">Auto 0km</h3>
      <p class="text-sm text-slate-500">Sorteo estelar del mes</p>

      <p class="mt-2 text-sm">
        Sorteo: <strong>31 de mayo</strong>
      </p>

      <a href="<?= $base ?>/planes"
        class="mt-5 inline-block bg-black text-white px-5 py-2.5 rounded-xl text-sm font-medium">
        Participar
      </a>
    </div>

    <!-- ===================== -->
    <!-- PS5 -->
    <!-- ===================== -->
    <div class="min-w-[260px] snap-start bg-white rounded-3xl shadow-sm border border-black/5 p-6 flex flex-col">

      <div class="w-full h-48 rounded-2xl overflow-hidden bg-slate-100 mb-4">
        <img
          src="<?= $base ?>/assets/img/premios/ps5.png"
          alt="PlayStation 5"
          class="w-full h-full object-cover object-center" />
      </div>

      <span class="text-xs font-medium text-slate-500 mb-1">
        Sorteo del mes
      </span>

      <h3 class="font-semibold">PlayStation 5</h3>
      <p class="text-sm text-slate-500 mb-4">
        Sorteo: 15 de mayo
      </p>

      <!-- Empuja el botón al fondo -->
      <div class="mt-auto">
        <a href="<?= $base ?>/planes"
          class="inline-flex items-center justify-center w-full border border-black/10 rounded-xl py-2 text-sm font-medium hover:bg-black/5">
          Participar
        </a>
      </div>

    </div>

    <!-- ===================== -->
    <!-- MACBOOK -->
    <!-- ===================== -->
    <div class="min-w-[260px] snap-start bg-white rounded-3xl shadow-sm border border-black/5 p-6 flex flex-col">

      <div class="w-full h-48 rounded-2xl overflow-hidden bg-slate-100 mb-4">
        <img
          src="<?= $base ?>/assets/img/premios/macbook.png"
          alt="MacBook Pro"
          class="w-full h-full object-cover object-center" />
      </div>

      <span class="text-xs font-medium text-slate-500 mb-1">
        Sorteo del mes
      </span>

      <h3 class="font-semibold">MacBook Pro</h3>
      <p class="text-sm text-slate-500 mb-4">
        Sorteo: 25 de mayo
      </p>

      <div class="mt-auto">
        <a href="<?= $base ?>/planes"
          class="inline-flex items-center justify-center w-full border border-black/10 rounded-xl py-2 text-sm font-medium hover:bg-black/5">
          Participar
        </a>
      </div>

    </div>


  </div>
</section>


<!-- ===================== -->
<!-- GRID DE PREMIOS -->
<!-- ===================== -->
<section class="max-w-6xl mx-auto px-6 pb-24">

  <div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-semibold">Todos los premios</h2>
    <a href="#" class="text-sm text-slate-500 hover:text-black">Ver todos</a>
  </div>

  <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-6">

    <!-- CARD -->
    <div class="bg-white rounded-3xl shadow-sm border border-black/5 p-6">
      <div class="w-full h-40 rounded-2xl overflow-hidden bg-slate-100 mb-4">
        <img
          src="<?= $base ?>/assets/img/premios/macbook.png"
          class="w-full h-full object-cover object-center"
          alt="MacBook Pro"
        />
      </div>
      <h3 class="font-medium">iPhone 15 Pro</h3>
      <p class="text-sm text-slate-500">Participación automática</p>
    </div>

    <div class="bg-white rounded-3xl shadow-sm border border-black/5 p-6">
      <div class="w-full h-40 rounded-2xl overflow-hidden bg-slate-100 mb-4">
        <img
          src="<?= $base ?>/assets/img/premios/macbook.png"
          class="w-full h-full object-cover object-center"
          alt="Nintendo Switch OLED"
        />
      </div>
      <h3 class="font-medium">Nintendo Switch OLED</h3>
      <p class="text-sm text-slate-500">Participación automática</p>
    </div>

    <div class="bg-white rounded-3xl shadow-sm border border-black/5 p-6">
      <div class="w-full h-40 rounded-2xl overflow-hidden bg-slate-100 mb-4">
        <img
          src="<?= $base ?>/assets/img/premios/macbook.png"
          class="w-full h-full object-cover object-center"
          alt="Apple Watch Ultra"
        />
      </div>
      <h3 class="font-medium">Apple Watch Ultra</h3>
      <p class="text-sm text-slate-500">Participación automática</p>
    </div>

  </div>
</section>

