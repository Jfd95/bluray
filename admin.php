<?php
session_start();
if (!$_SESSION['login']) header('location:index.php');
require 'partials/header_admin.php';
require 'functions/db.php';
require 'functions/functions.php';
$dbh = connect();

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'addbluray') {
        require 'forms/addbluray.php';
    } elseif ($_GET['action'] == 'editbluray') {
        require 'forms/editbluray.php';
    } elseif ($_GET['action'] == 'adduser') {
        require 'forms/adduser.php';
    } elseif ($_GET['action'] == 'edituser') {
        require 'forms/edituser.php';
    } elseif($_GET['action'] == 'viewuser') {
        require 'viewuser.php';
    }
} else {
    require 'partials/admin_table.php';
}

require 'partials/footer.php';