<?php
$sql="INSERT INTO usuarios (nome,email)VALUES(:nome,:email)";
$stmt=$pdo->prepare($sql);
$stmt->bindParam(':nome',$nome);
$stmt->bindParam(':email',$email);
$stmt->execute();




?>