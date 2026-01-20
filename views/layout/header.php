<?php
if (session_status() === PHP_SESSION_NONE) session_start();
$base = rtrim((isset($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['SCRIPT_NAME']), '/');
// Si estás en htdocs/mvp-sorteos, $base será http://localhost/mvp-sorteos
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>MVP Sorteos</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="<?= $base ?>/assets/css/app.css" />
</head>
<body class="text-slate-900">

<header class="bg-white/90 backdrop-blur border-b border-black/5 sticky top-0 z-50">
  <div class="max-w-6xl mx-auto px-5 py-4 flex items-center justify-between">
    <a href="<?= $base ?>/home" class="font-semibold tracking-tight text-lg">mvp-sorteos</a>

    <nav class="flex items-center gap-6 text-sm">
      <a class="text-slate-600 hover:text-black" href="<?= $base ?>/planes">Planes</a>
      <a class="text-slate-600 hover:text-black" href="<?= $base ?>/dashboard">Dashboard</a>

      <?php if (!empty($_SESSION['idusuario'])): ?>
        <a class="bg-black text-white px-4 py-2 rounded-2xl" href="<?= $base ?>/salir">Salir</a>
      <?php else: ?>
        <a class="bg-black text-white px-4 py-2 rounded-2xl" href="<?= $base ?>/login">Ingresar</a>
      <?php endif; ?>
    </nav>
  </div>
</header>

<main class="min-h-[calc(100vh-140px)]">
