<?php

require_once '../functions/db.php';
$dbh = connect();
$sql = "UPDATE bluray SET name = :name, price = :price, description = :description, release_date = :date, note = :note, cat_id = :category
        WHERE id = :id";
$stmt = $dbh->prepare($sql);
// pas oublier d'associer l'id du site
$stmt->bindValue('id', $_POST['id'], PDO::PARAM_INT);
$stmt->bindValue('name', $_POST['name'], PDO::PARAM_STR);
$stmt->bindValue('price', $_POST['price'], PDO::PARAM_INT);
$stmt->bindValue('description', $_POST['description'], PDO::PARAM_STR);
$stmt->bindValue('date', $_POST['date'], PDO::PARAM_STR);
$stmt->bindValue('note', $_POST['note'], PDO::PARAM_INT);
$stmt->bindValue('category', $_POST['category'], PDO::PARAM_INT);
$stmt->execute();
if(!empty($_FILES['cover']['name'])) {
    if(move_uploaded_file($_FILES['cover']['tmp_name'], '../img/logo/'.$_FILES['cover']['name'])) {
        header('location:../admin.php');
    }
} else {
    header('location:../admin.php');
}