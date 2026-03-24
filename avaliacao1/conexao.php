<?php
$pdo = new POD("mysql:host=localhost;dbname=meubanco","root","");
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
?>
