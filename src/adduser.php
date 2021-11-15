<?php
require_once '../functions/db.php';
$dbh = connect();
$sql = "INSERT INTO user (first_name, last_name, login, email, level, password)
        VALUES (:firstname, :lastname, :login, :email, :level, :password)";
$stmt = $dbh->prepare($sql);
$stmt->bindValue('firstname', $_POST['firstname'], PDO::PARAM_STR);
$stmt->bindValue('lastname', $_POST['lastname'], PDO::PARAM_STR);
$stmt->bindValue('login', $_POST['login'], PDO::PARAM_STR);
$stmt->bindValue('email', $_POST['email'], PDO::PARAM_STR);
$stmt->bindValue('level', $_POST['level'], PDO::PARAM_STR);
$stmt->bindValue('password', password_hash($_POST['password'], PASSWORD_DEFAULT), PDO::PARAM_STR);
$stmt->execute();

header('location:../admin.php');