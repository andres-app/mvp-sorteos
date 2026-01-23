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
      <span class="inline-block mb-2 text-xs font-semibold uppercase tracking-wide text-white bg-purple-700 px-3 py-1 rounded-full">
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

<!-- ===================== -->
<!-- PLANES -->
<!-- ===================== -->
<section class="max-w-7xl mx-auto px-6 py-24">

  <h2 class="text-4xl md:text-5xl font-semibold text-center">
    Elige tu plan
  </h2>
  <p class="text-slate-500 text-center mt-4">
    Elige tu plan recurrente y empieza a tentar la suerte en serio.
  </p>

  <div class="grid md:grid-cols-4 gap-6 mt-16">

    <!-- PRUEBITA -->
    <div class="bg-white rounded-3xl shadow-sm border border-black/5 p-8 flex flex-col">
      <div class="flex justify-between items-center">
        <h3 class="text-xl font-semibold">Prueba</h3>
        <span class="text-xs font-semibold bg-black text-white px-3 py-1 rounded-full">
          PLAN MENSUAL
        </span>
      </div>

      <p class="text-sm text-slate-500 mt-4">
        O sea pagas mes a mes
      </p>

      <ul class="text-sm text-slate-600 mt-6 space-y-2">
        <li>• Descuentos en marcas aliadas</li>
        <li>• Premios semanales</li>
      </ul>

      <div class="mt-auto text-center pt-8">
        <div class="text-4xl font-semibold">S/8</div>
        <p class="text-xs text-slate-400 mb-6">Mensuales</p>

        <a href="<?= $base ?>/checkout/pruebita"
           class="block bg-black text-white py-3 rounded-2xl font-medium hover:bg-purple-700 transition">
          ¡Suscribirme ya!
        </a>
      </div>
    </div>

    <!-- OPULENCIA (DESTACADO) -->
    <div class="bg-white rounded-3xl shadow-md border-2 border-purple-600 p-8 flex flex-col scale-105">
      <span class="text-xs font-semibold text-purple-600 mb-2">
        Recomendado ✌
      </span>

      <div class="flex justify-between items-center">
        <h3 class="text-xl font-semibold">Destacado</h3>
        <span class="text-xs font-semibold bg-black text-white px-3 py-1 rounded-full">
          PLAN ANUAL
        </span>
      </div>

      <ul class="text-sm text-slate-600 mt-6 space-y-2">
        <li>• Descuentos en marcas aliadas</li>
        <li>• Premios semanales</li>
        <li>• Suertudo VIP</li>
      </ul>

      <div class="mt-auto text-center pt-8">
        <div class="text-4xl font-semibold">S/60</div>
        <p class="text-xs text-slate-400 mb-6">Anuales</p>

        <a href="<?= $base ?>/checkout/opulencia"
           class="block bg-purple-700 text-white py-3 rounded-2xl font-medium hover:bg-purple-700 transition">
          ¡Suscribirme ya!
        </a>
      </div>
    </div>

        <!-- PRUEBITA -->
        <div class="bg-white rounded-3xl shadow-sm border border-black/5 p-8 flex flex-col">
      <div class="flex justify-between items-center">
        <h3 class="text-xl font-semibold">Pruebita</h3>
        <span class="text-xs font-semibold bg-black text-white px-3 py-1 rounded-full">
          PLAN MENSUAL
        </span>
      </div>

      <p class="text-sm text-slate-500 mt-4">
        O sea pagas mes a mes
      </p>

      <ul class="text-sm text-slate-600 mt-6 space-y-2">
        <li>• Descuentos en marcas aliadas</li>
        <li>• Premios semanales</li>
      </ul>

      <div class="mt-auto text-center pt-8">
        <div class="text-4xl font-semibold">S/8</div>
        <p class="text-xs text-slate-400 mb-6">Mensuales</p>

        <a href="<?= $base ?>/checkout/pruebita"
           class="block bg-black text-white py-3 rounded-2xl font-medium hover:bg-purple-700 transition">
          ¡Suscribirme ya!
        </a>
      </div>
    </div>
        <!-- PRUEBITA -->
        <div class="bg-white rounded-3xl shadow-sm border border-black/5 p-8 flex flex-col">
      <div class="flex justify-between items-center">
        <h3 class="text-xl font-semibold">Pruebita</h3>
        <span class="text-xs font-semibold bg-black text-white px-3 py-1 rounded-full">
          PLAN MENSUAL
        </span>
      </div>

      <p class="text-sm text-slate-500 mt-4">
        O sea pagas mes a mes
      </p>

      <ul class="text-sm text-slate-600 mt-6 space-y-2">
        <li>• Descuentos en marcas aliadas</li>
        <li>• Premios semanales</li>
      </ul>

      <div class="mt-auto text-center pt-8">
        <div class="text-4xl font-semibold">S/8</div>
        <p class="text-xs text-slate-400 mb-6">Mensuales</p>

        <a href="<?= $base ?>/checkout/pruebita"
           class="block bg-black text-white py-3 rounded-2xl font-medium hover:bg-purple-700 transition">
          ¡Suscribirme ya!
        </a>
      </div>
    </div>

  </div>
</section>

<!-- ===================== -->
<!-- FAQ -->
<!-- ===================== -->
<section class="max-w-5xl mx-auto px-6 py-24">

  <h2 class="text-4xl font-semibold text-center mb-12">
    ¿Aún tienes dudas?
  </h2>

  <div class="space-y-4">

    <details class="bg-white rounded-full px-6 py-4 border border-black/5">
      <summary class="flex justify-between items-center cursor-pointer font-medium">
        ¿Qué es mvp-sorteos?
        <span class="text-purple-600">⌄</span>
      </summary>
      <p class="mt-3 text-slate-600">
        Plataforma de sorteos exclusivos para suscriptores.
      </p>
    </details>

    <details class="bg-white rounded-full px-6 py-4 border border-black/5">
      <summary class="flex justify-between items-center cursor-pointer font-medium">
        ¿Cómo me vuelvo parte de mvp-sorteos?
        <span class="text-purple-600">⌄</span>
      </summary>
      <p class="mt-3 text-slate-600">
        Eligiendo un plan activo desde nuestra web.
      </p>
    </details>

    <details class="bg-white rounded-full px-6 py-4 border border-black/5">
      <summary class="flex justify-between items-center cursor-pointer font-medium">
        ¿Cómo me contactan si gano?
        <span class="text-purple-600">⌄</span>
      </summary>
      <p class="mt-3 text-slate-600">
        Por correo y WhatsApp registrados.
      </p>
    </details>

  </div>

  <div class="text-center mt-12">
    <a href="<?= $base ?>/faq"
       class="inline-block border border-black/10 px-8 py-3 rounded-full font-medium hover:bg-black hover:text-white transition">
      Ver todas las preguntas
    </a>
  </div>
</section>

<!-- ===================== -->
<!-- FOOTER GLOBAL -->
<!-- ===================== -->
<footer class="border-t border-black/5 py-16">
  <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-4 gap-10 text-sm">

    <div>
      <h4 class="font-semibold mb-4">Contáctanos</h4>
      <p>Escríbenos a soporte@mvp-sorteos.com</p>
      <p class="text-slate-500 mt-2">
        L–V 9am a 6pm | Sáb. 9am a 2pm
      </p>
    </div>

    <div>
      <h4 class="font-semibold mb-4">Información legal</h4>
      <ul class="space-y-2 text-slate-600">
        <li><a href="<?= $base ?>/terminos">Términos y condiciones</a></li>
        <li><a href="<?= $base ?>/privacidad">Política de privacidad</a></li>
        <li><a href="<?= $base ?>/cookies">Política de cookies</a></li>
        <li><a href="<?= $base ?>/reglamento">Reglamento</a></li>
      </ul>
    </div>

    <div>
      <h4 class="font-semibold mb-4">Libro de reclamaciones</h4>
      <a href="<?= $base ?>/reclamaciones"
         class="inline-block border border-black/10 px-4 py-2 rounded-lg font-medium hover:bg-black hover:text-white transition">
        Abrir libro
      </a>
    </div>

    <div class="text-right text-slate-500">
      © 2026 MVP SORTEOS<br>
      RUC: 20102020511
    </div>

  </div>
</footer>
