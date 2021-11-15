<?php
require_once 'functions/db.php';
require_once 'functions/functions.php';
$dbh = connect();

// Valeurs par défaut
$_GET['field'] = $_GET['field'] ?? 'first_name';
$_GET['order'] = $_GET['order'] ?? 'ASC';

$sql = "SELECT * FROM user ORDER BY {$_GET['field']} {$_GET['order']}";
$stmt = $dbh->prepare($sql);
$stmt->execute();
$users = $stmt->fetchAll();

// Switch des valeurs par défaut
$_GET['order'] = $_GET['order'] == 'ASC' ? 'DESC' : 'ASC';

?>
<main class="container">
    <section id="listing">
        <h2 class="display-4 my-4">Tableau des utilisateurs</h2>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-succes table-striped">
                    <thead>
                    <tr>
                        <th><a href="?action=viewuser&field=first_name&order=<?= $_GET['order'] ?>"><i
                                        class="bi bi-arrow-down-up">&nbsp;</i></a>Firstname
                        </th>
                        <th><a href="?action=viewuser&field=last_name&order=<?= $_GET['order'] ?>"><i
                                        class="bi bi-arrow-down-up">&nbsp;</i></a>Lastname
                        </th>
                        <th><a href="?action=viewuser&field=login&order=<?= $_GET['order'] ?>"><i
                                        class="bi bi-arrow-down-up">&nbsp;</i></a>Login
                        </th>
                        <th><a href="?action=viewuser&field=email&order=<?= $_GET['order'] ?>"><i
                                        class="bi bi-arrow-down-up">&nbsp;</i></a>Email
                        </th>
                        <th><a href="?action=viewuser&field=level&order=<?= $_GET['order'] ?>"><i
                                        class="bi bi-arrow-down-up">&nbsp;</i></a>Level
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?= $user->first_name ?></td>
                            <td><?= $user->last_name ?></td>
                            <td><?= $user->login ?></td>
                            <td><?= $user->email ?></td>
                            <td><?= $user->level ?></td>
                            <td><a href="src/deluser.php?id=<?= $user->id ?>"
                                   onclick="return confirm('Êtes vous sûr ?')"><i class="bi bi-trash"></i></a></td>
                            <td><a href="?action=edituser&id=<?= $user->id ?>"><i class="bi bi-pencil"></i></a></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <a href="admin.php" class="btn btn-primary">Retour à l'admininistration</a>
    </section>
</main>