<?php
// Supprimer un utilisateur
require_once '../functions/db.php';
$dbh = connect();
$sql = "DELETE FROM user WHERE id = :id";
$stmt = $dbh->prepare($sql);
$stmt->bindValue('id', $_GET['id'], PDO::PARAM_INT);
$stmt->execute();
header('location:../admin.php');