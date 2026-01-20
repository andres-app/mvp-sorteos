<?php
require_once ROOT_PATH . "/Config/Conexion.php";

class Suscripcion {

  static public function crearPendiente($idusuario, $idplan) {

    $db = Conexion::conectar();

    $stmt = $db->prepare("
      INSERT INTO suscripcion (idusuario, idplan)
      VALUES (:idusuario, :idplan)
    ");

    $stmt->execute([
      ":idusuario" => $idusuario,
      ":idplan"    => $idplan
    ]);

    return $db->lastInsertId();
  }

  static public function obtenerUltimaPorUsuario($idusuario) {

    $db = Conexion::conectar();

    $stmt = $db->prepare("
      SELECT s.*, p.nombre, p.precio
      FROM suscripcion s
      INNER JOIN plan p ON p.idplan = s.idplan
      WHERE s.idusuario = :idusuario
      ORDER BY s.idsuscripcion DESC
      LIMIT 1
    ");

    $stmt->execute([":idusuario" => $idusuario]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  static public function activar($idsuscripcion) {

    $db = Conexion::conectar();
  
    $inicio = date("Y-m-d");
    $fin = date("Y-m-d", strtotime("+30 days"));
  
    $stmt = $db->prepare("
      UPDATE suscripcion
      SET estado = 'activa',
          inicia_en = :inicio,
          vence_en = :fin
      WHERE idsuscripcion = :idsuscripcion
    ");
  
    return $stmt->execute([
      ":inicio"        => $inicio,
      ":fin"           => $fin,
      ":idsuscripcion" => $idsuscripcion
    ]);
  }
  
}
