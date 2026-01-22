<?php

class Plantilla
{
  public function mostrarPlantilla()
  {
    // Layout base
    include "views/layout/header.php";

    $ruta = isset($_GET['url']) ? trim($_GET['url']) : '';

    // Lista blanca de rutas (MVP)
    $rutasPermitidas = [
      'home',
      'login',
      'registro',
      'planes',
      'pago',
      'dashboard',
      'salir',
      'admin_pagos',
      'admin_premios',
      'admin_premio_nuevo'

    ];

    if ($ruta === '') {
      include "views/modules/home.php";
    } elseif (in_array($ruta, $rutasPermitidas)) {
      include "views/modules/{$ruta}.php";
    } else {
      include "views/modules/404.php";
    }

    include "views/layout/footer.php";
  }
}
