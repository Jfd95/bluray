<?php
// Création de la session
session_start();
require_once '../functions/db.php';
$dbh = connect();
$sql = "SELECT * FROM user WHERE email = :email";
$stmt = $dbh->prepare($sql);
$stmt->bindValue('email', $_POST['email'], PDO::PARAM_STR);
$stmt->execute();
$user = $stmt->fetch();
// var_dump($user);
if ($user) {
    if (password_verify($_POST['password'], $user->password)) {
        $_SESSION['login'] = $user;
        header('location:../admin.php');
    } else {
        header('location:../login.php');
    }
} else {
    header('location:../index.php');
}