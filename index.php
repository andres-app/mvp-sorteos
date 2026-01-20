<?php
session_start();

define("ROOT_PATH", __DIR__);

require_once "Controllers/Plantilla.php";

$plantilla = new Plantilla();
$plantilla->mostrarPlantilla();
