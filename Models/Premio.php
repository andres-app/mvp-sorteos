<?php
require_once __DIR__ . "/../Config/Conexion.php";

class Premio
{
  /* =========================
     FRONTEND / HOME
  ========================= */

  public static function listarActivosPorMes($mes)
  {
    $db = Conexion::conectar();

    $stmt = $db->prepare("
      SELECT 
        idpremio,
        nombre,
        descripcion,
        imagen,
        fecha_sorteo,
        es_principal
      FROM premio
      WHERE estado = 1 AND mes = :mes
      ORDER BY es_principal DESC, fecha_sorteo ASC
    ");

    $stmt->execute([":mes" => $mes]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  /* =========================
     ADMIN
  ========================= */

  public static function listarAdmin()
  {
    $db = Conexion::conectar();

    $stmt = $db->prepare("
      SELECT
        idpremio,
        nombre,
        imagen,
        fecha_sorteo,
        es_principal,
        estado,
        created_at
      FROM premio
      ORDER BY created_at DESC
    ");

    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public static function obtenerPorId($id)
  {
    $db = Conexion::conectar();

    $stmt = $db->prepare("
      SELECT * FROM premio WHERE idpremio = :id
    ");

    $stmt->execute([":id" => $id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public static function insertar($data)
  {
    $db = Conexion::conectar();

    $stmt = $db->prepare("
      INSERT INTO premio (
        nombre,
        descripcion,
        imagen,
        fecha_sorteo,
        es_principal,
        mes,
        estado
      ) VALUES (
        :nombre,
        :descripcion,
        :imagen,
        :fecha_sorteo,
        :es_principal,
        :mes,
        1
      )
    ");

    return $stmt->execute($data);
  }

  public static function activar($id)
  {
    $db = Conexion::conectar();
    $stmt = $db->prepare("UPDATE premio SET estado = 1 WHERE idpremio = :id");
    return $stmt->execute([":id" => $id]);
  }

  public static function desactivar($id)
  {
    $db = Conexion::conectar();
    $stmt = $db->prepare("UPDATE premio SET estado = 0 WHERE idpremio = :id");
    return $stmt->execute([":id" => $id]);
  }

  public static function marcarPrincipal($id)
  {
    $db = Conexion::conectar();

    // Quita principal a los demás
    $db->query("UPDATE premio SET es_principal = 0");

    // Marca este
    $stmt = $db->prepare("
      UPDATE premio SET es_principal = 1 WHERE idpremio = :id
    ");

    return $stmt->execute([":id" => $id]);
  }
}
