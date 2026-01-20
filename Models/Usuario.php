<?php
require_once __DIR__ . "/../Config/Conexion.php";

class Usuario {

  static public function registrar($datos) {

    $db = Conexion::conectar();

    $stmt = $db->prepare("
      INSERT INTO usuario (nombres, email, password_hash)
      VALUES (:nombres, :email, :password)
    ");

    return $stmt->execute([
      ":nombres"  => $datos["nombres"],
      ":email"    => $datos["email"],
      ":password" => password_hash($datos["password"], PASSWORD_DEFAULT)
    ]);
  }

  static public function login($email) {

    $db = Conexion::conectar();

    $stmt = $db->prepare("
      SELECT * FROM usuario
      WHERE email = :email AND estado = 1
    ");

    $stmt->execute([":email" => $email]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }
}
