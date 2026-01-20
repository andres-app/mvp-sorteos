<?php
require_once ROOT_PATH . "/Config/Conexion.php";

class Pago {

  static public function registrar($idsuscripcion, $metodo, $monto) {

    $db = Conexion::conectar();

    $stmt = $db->prepare("
      INSERT INTO pago (idsuscripcion, metodo, monto)
      VALUES (:idsuscripcion, :metodo, :monto)
    ");

    return $stmt->execute([
      ":idsuscripcion" => $idsuscripcion,
      ":metodo"        => $metodo,
      ":monto"         => $monto
    ]);
  }
}
