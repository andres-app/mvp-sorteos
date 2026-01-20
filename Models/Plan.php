<?php
require_once __DIR__ . "/../Config/Conexion.php";

class Plan {

  static public function listarActivos() {

    $db = Conexion::conectar();

    $stmt = $db->prepare("
      SELECT * FROM plan
      WHERE estado = 1
    ");

    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
}