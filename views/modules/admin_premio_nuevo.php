<form method="POST" enctype="multipart/form-data"
      class="max-w-xl mx-auto bg-white p-8 rounded-3xl border">

  <input type="text" name="nombre" placeholder="Nombre"
         class="w-full mb-4 border rounded-xl px-4 py-2">

  <textarea name="descripcion"
            placeholder="Descripción"
            class="w-full mb-4 border rounded-xl px-4 py-2"></textarea>

  <input type="date" name="fecha_sorteo"
         class="w-full mb-4 border rounded-xl px-4 py-2">

  <input type="file" name="imagen" class="mb-4">

  <label class="flex items-center gap-2 mb-4">
    <input type="checkbox" name="es_principal" value="1">
    Premiazo
  </label>

  <input type="text" name="mes"
         placeholder="mayo-2026"
         class="w-full mb-6 border rounded-xl px-4 py-2">

  <button class="bg-black text-white px-6 py-2 rounded-xl">
    Guardar premio
  </button>
</form>
