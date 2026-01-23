<?php
if (session_status() === PHP_SESSION_NONE) session_start();

$base = rtrim(
  (isset($_SERVER['HTTPS']) ? 'https' : 'http') .
    '://' . $_SERVER['HTTP_HOST'] .
    dirname($_SERVER['SCRIPT_NAME']),
  '/'
);
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>MVP Sorteos</title>

  <!-- Tailwind -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- App styles -->
  <link rel="stylesheet" href="<?= $base ?>/assets/css/app.css" />
</head>

<body class="text-slate-900">

  <header class="bg-white/90 backdrop-blur border-b border-black/5 sticky top-0 z-50">
    <div class="max-w-6xl mx-auto px-5 py-4 flex items-center justify-between">

      <!-- LOGO -->
      <a href="<?= $base ?>/home"
        class="font-semibold tracking-tight text-lg">
        mvp-sorteos
      </a>

      <!-- NAV -->
      <nav class="space-x-6 text-sm flex items-center">

        <a href="<?= $base ?>/home"
          class="text-gray-600 hover:text-black">
          Inicio
        </a>

        <a href="<?= $base ?>/planes"
          class="text-gray-600 hover:text-black">
          Planes
        </a>

        <?php if (isset($_SESSION["login"])): ?>

          <a href="<?= $base ?>/mi-cuenta"
            class="text-gray-600 hover:text-black">
            Mi cuenta
          </a>

          <?php if (isset($_SESSION["rol"]) && $_SESSION["rol"] === "admin"): ?>
            <div class="relative group">

              <!-- BOTÓN -->
              <button
                class="text-gray-600 hover:text-black font-medium flex items-center gap-1 py-2">
                Admin
                <span class="text-xs">⌄</span>
              </button>

              <!-- SUBMENU -->
              <div
                class="absolute right-0 top-full pt-2
             opacity-0 invisible
             group-hover:opacity-100 group-hover:visible
             transition">

                <div class="w-44 bg-white rounded-2xl shadow-lg border border-black/5 overflow-hidden">

                  <a href="<?= $base ?>/admin_pagos"
                    class="block px-4 py-3 text-sm hover:bg-black hover:text-white transition">
                    Pagos
                  </a>

                  <a href="<?= $base ?>/admin_premios"
                    class="block px-4 py-3 text-sm hover:bg-black hover:text-white transition">
                    Premios
                  </a>

                  <a href="<?= $base ?>/admin_sorteos"
                    class="block px-4 py-3 text-sm hover:bg-black hover:text-white transition">
                    Sorteos
                  </a>

                </div>
              </div>

            </div>
          <?php endif; ?>


          <a href="<?= $base ?>/salir"
            class="bg-black text-white px-4 py-2 rounded-xl hover:opacity-90 transition">
            Salir
          </a>

        <?php else: ?>

          <a href="<?= $base ?>/login"
            class="bg-black text-white px-4 py-2 rounded-xl hover:opacity-90 transition">
            Ingresar
          </a>

        <?php endif; ?>

      </nav>

    </div>
  </header>

  <main class="min-h-[calc(100vh-140px)]">