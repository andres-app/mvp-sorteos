<?php
if (!isset($_SESSION["login"]) || $_SESSION["rol"] !== "admin") {
  header("Location: mi-cuenta");
  exit;
}
