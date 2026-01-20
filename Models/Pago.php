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

  static public function listarPendientes() {

    $db = Conexion::conectar();
  
    $stmt = $db->prepare("
      SELECT 
        p.idpago,
        p.metodo,
        p.monto,
        p.created_at,
        u.nombres,
        u.email,
        s.idsuscripcion
      FROM pago p
      INNER JOIN suscripcion s ON s.idsuscripcion = p.idsuscripcion
      INNER JOIN usuario u ON u.idusuario = s.idusuario
      WHERE p.estado = 'pendiente'
      ORDER BY p.created_at ASC
    ");
  
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  static public function confirmar($idpago) {

    $db = Conexion::conectar();
  
    $stmt = $db->prepare("
      UPDATE pago
      SET estado = 'confirmado'
      WHERE idpago = :idpago
    ");
  
    return $stmt->execute([":idpago" => $idpago]);
  }
  
  
}
