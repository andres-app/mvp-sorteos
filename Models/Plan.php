<?php
require_once __DIR__ . '/Conexion.php';

class Plan
{
  public static function listarActivos()
  {
    $cn = Conexion::conectar();
    $st = $cn->prepare("SELECT idplan, nombre, precio, tickets_mensuales FROM plan WHERE estado=1 ORDER BY idplan ASC");
    $st->execute();
    return $st->fetchAll();
  }
}
