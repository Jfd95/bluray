<?php
session_start();
if (!$_SESSION['login']) header('location:index.php');

require_once '../functions/db.php';
$dbh = connect();
// Requête pour récupérer le nom du logo (pour effacer l'image)
$sql = "SELECT cover FROM bluray WHERE id = :id";
$stmt = $dbh->prepare($sql);
$stmt->bindValue('id', $_GET['id'], PDO::PARAM_INT);
$stmt->execute();
$cover = $stmt->fetch();
// Requête de suppression du bluray
$sql = "DELETE FROM bluray WHERE id = :id";
$stmt = $dbh->prepare($sql);
$stmt->bindValue('id', $_GET['id'], PDO::PARAM_INT);
$stmt->execute();
// Suppresion de l'image sauf de l'image par défaut
if($cover->cover !== 'bluray_default.png') {
    unlink('../img/covers/'.$cover->cover);
}
//Redirection vers l'admin
header('location:../admin.php');
