<?php
session_start();
if(!$_SESSION['login']) header('location:index.php');
require_once '../functions/db.php';
$dbh = connect();
$sql = "INSERT INTO bluray (name, price, release_date, cat_id, note, cover, description)
        VALUES (:name, :price, :date, :category, :note, :cover, :description)";
$stmt = $dbh->prepare($sql);
$stmt->bindValue('name', $_POST['name'], PDO::PARAM_STR);
$stmt->bindValue('price', $_POST['price'], PDO::PARAM_INT);
$stmt->bindValue('date', $_POST['date'], PDO::PARAM_STR);
$stmt->bindValue('category', $_POST['category'], PDO::PARAM_INT);
$stmt->bindValue('note', $_POST['note'], PDO::PARAM_INT);
$stmt->bindValue('cover', !empty($_FILES['cover']['name']) ? $_FILES['cover']['name'] : 'bluray_default.png', PDO::PARAM_STR);
$stmt->bindValue('description', $_POST['description'], PDO::PARAM_STR);
$stmt->execute();
if(!empty($_FILES['cover']['name'])) {
    if(move_uploaded_file($_FILES['cover']['tmp_name'], '../img/covers/'.$_FILES['cover']['name'])) {
        // Transfert réussi
        // gestion d'un message flash
        header('location:../admin.php');
    }
} else {
    header('location:../admin.php');
}