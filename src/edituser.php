<?php

// var_dump($_POST['id']);
require_once '../functions/db.php';
$dbh = connect();
$sql = "UPDATE user SET first_name = :firstname, last_name = :lastname, login = :login, email = :email, level = :level
        WHERE id = :id";
$stmt = $dbh->prepare($sql);
// pas oublier d'associer l'id du site
$stmt->bindValue('id', $_POST['id'], PDO::PARAM_INT);
$stmt->bindValue('firstname', $_POST['firstname'], PDO::PARAM_STR);
$stmt->bindValue('lastname', $_POST['lastname'], PDO::PARAM_STR);
$stmt->bindValue('login', $_POST['login'], PDO::PARAM_STR);
$stmt->bindValue('email', $_POST['email'], PDO::PARAM_STR);
$stmt->bindValue('level', $_POST['level'], PDO::PARAM_STR);
$stmt->execute();

header('location:../admin.php');