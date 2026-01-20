<?php
require_once ROOT_PATH . "/Config/Conexion.php";

class Usuario {

  static public function login($email) {

    $db = Conexion::conectar();

    $stmt = $db->prepare("
      SELECT idusuario, nombres, email, password_hash, rol
      FROM usuario
      WHERE email = :email AND estado = 1
      LIMIT 1
    ");

    $stmt->execute([":email" => $email]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  static public function registrar($datos) {

    $db = Conexion::conectar();

    $stmt = $db->prepare("
      INSERT INTO usuario (nombres, email, password_hash)
      VALUES (:nombres, :email, :password)
    ");

    return $stmt->execute([
      ":nombres"  => trim($datos["nombres"]),
      ":email"    => trim($datos["email"]),
      ":password" => password_hash($datos["password"], PASSWORD_DEFAULT)
    ]);
  }
}
