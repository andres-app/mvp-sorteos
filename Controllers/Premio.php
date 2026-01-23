<?php
require_once __DIR__ . "/../Models/Premio.php";

/* =========================
   CONTROLADOR PREMIOS
========================= */

$op = $_GET["op"] ?? "";

/* =========================
   LISTAR (ADMIN)
========================= */
if ($op === "listar_admin") {
  $premios = Premio::listarAdmin();
  echo json_encode($premios);
  exit;
}

/* =========================
   INSERTAR
========================= */
if ($op === "insertar") {

  $nombre = $_POST["nombre"] ?? "";
  $descripcion = $_POST["descripcion"] ?? "";
  $fecha_sorteo = $_POST["fecha_sorteo"] ?? null;
  $es_principal = isset($_POST["es_principal"]) ? 1 : 0;
  $mes = $_POST["mes"] ?? date("m");

  /* 📸 Imagen */
  $imagen = "";
  if (!empty($_FILES["imagen"]["name"])) {
    $imagen = uniqid() . "_" . basename($_FILES["imagen"]["name"]);
    move_uploaded_file(
      $_FILES["imagen"]["tmp_name"],
      __DIR__ . "/../public/assets/img/premios/" . $imagen
    );
  }

  Premio::insertar([
    ":nombre" => $nombre,
    ":descripcion" => $descripcion,
    ":imagen" => $imagen,
    ":fecha_sorteo" => $fecha_sorteo,
    ":es_principal" => $es_principal,
    ":mes" => $mes
  ]);

  header("Location: ../admin_premios");
  exit;
}

/* =========================
   ACTIVAR / DESACTIVAR
========================= */
if ($op === "estado") {

  $id = (int)($_GET["id"] ?? 0);
  $accion = $_GET["accion"] ?? "";

  if ($id > 0) {
    if ($accion === "activar") {
      Premio::activar($id);
    }
    if ($accion === "desactivar") {
      Premio::desactivar($id);
    }
  }

  header("Location: ../admin_premios");
  exit;
}

/* =========================
   MARCAR COMO PRINCIPAL
========================= */
if ($op === "principal") {

  $id = (int)($_GET["id"] ?? 0);

  if ($id > 0) {
    Premio::marcarPrincipal($id);
  }

  header("Location: ../admin_premios");
  exit;
}

/* =========================
   EDITAR (PREPARADO)
========================= */
if ($op === "editar") {

  $id = (int)($_POST["idpremio"] ?? 0);

  if ($id > 0) {
    Premio::editar([
      ":idpremio" => $id,
      ":nombre" => $_POST["nombre"],
      ":descripcion" => $_POST["descripcion"],
      ":fecha_sorteo" => $_POST["fecha_sorteo"],
      ":es_principal" => isset($_POST["es_principal"]) ? 1 : 0
    ]);
  }

  header("Location: ../admin_premios");
  exit;
}
