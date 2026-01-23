<?php
require_once ROOT_PATH . "/Config/Conexion.php";

class Usuario
{

  public static function login($email)
  {
    $db = Conexion::conectar();
  
    $stmt = $db->prepare("
      SELECT
        idusuario,
        nombres,
        email,
        password_hash,
        rol
      FROM usuario
      WHERE email = ?
      LIMIT 1
    ");
  
    $stmt->execute([$email]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }
  
  public static function registrar($data)
  {
    $db = Conexion::conectar();
  
    $stmt = $db->prepare("
      INSERT INTO usuario (nombres, email, password_hash, rol)
      VALUES (?, ?, ?, 'user')
    ");
  
    return $stmt->execute([
      $data['nombres'],
      $data['email'],
      $data['password']
    ]);
  }  

  public static function existeEmail($email)
  {
    $db = Conexion::conectar();

    $stmt = $db->prepare("
    SELECT idusuario
    FROM usuario
    WHERE email = ?
    LIMIT 1
  ");

    $stmt->execute([$email]);

    return $stmt->fetch(PDO::FETCH_ASSOC) ? true : false;
  }
}
