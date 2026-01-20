<?php
if (!isset($_SESSION["login"]) || $_SESSION["rol"] !== "admin") {
  header("Location: dashboard");
  exit;
}
