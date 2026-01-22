<?php
require_once __DIR__ . "/../Config/Conexion.php";

class Premio {

  public static function listarActivosPorMes($mes) {
    $db = Conexion::conectar();
    $stmt = $db->prepare("
      SELECT * FROM premio
      WHERE estado = 1 AND mes = :mes
      ORDER BY es_principal DESC, fecha_sorteo ASC
    ");
    $stmt->execute([":mes" => $mes]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public static function insertar($data) {
    $db = Conexion::conectar();
    $stmt = $db->prepare("
      INSERT INTO premio (nombre, descripcion, imagen, fecha_sorteo, es_principal, mes)
      VALUES (:nombre, :descripcion, :imagen, :fecha_sorteo, :es_principal, :mes)
    ");
    return $stmt->execute($data);
  }

  public static function listarAdmin() {
    $db = Conexion::conectar();
    return $db->query("SELECT * FROM premio ORDER BY created_at DESC")
              ->fetchAll(PDO::FETCH_ASSOC);
  }
}
