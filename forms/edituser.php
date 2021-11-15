<?php

$sql = "SELECT * FROM user
        WHERE id = :id";
$stmt = $dbh->prepare($sql);
$stmt->bindValue('id', $_GET['id'], PDO::PARAM_INT);
$stmt->execute();
$users = $stmt->fetch();

?>

<main class="container">
    <section id="edituser">
        <div class="row">
            <div class="col-md-8 offset-2">
                <h2 class="display-5">Modifier un utilisateur</h2>
                <form action="src/edituser.php" method="post">
                    <div class="form-group">
                        <label for="firstname" class="form-label">Prénom de l'utilisateur</label>
                        <input type="text" class="form-control" id="firstname" name="firstname"
                               value="<?= $users->first_name ?>">
                    </div>

                    <div class="form-group">
                        <label for="lastname" class="form-label">Nom de l'utilisateur</label>
                        <input type="text" class="form-control" id="lastname" name="lastname"
                               value="<?= $users->last_name ?>">
                    </div>

                    <div class="form-group">
                        <label for="login" class="form-label">Login</label>
                        <input type="text" class="form-control" id="login" name="login" value="<?= $users->login ?>">
                    </div>

                    <div class="form-group">
                        <label for="email" class="form-label">Email de l'utilisateur</label>
                        <input type="text" class="form-control" id="email" name="email" value="<?= $users->email ?>">
                    </div>

                    <div class="form-group">
                        <label for="level" class="form-label">Hiérarchie de l'utilisateur</label>
                        <select name="level" id="level" class="form-control">
                            <option value="">Selectionnez...</option>
                            <option value="SuperAdmin">SuperAdmin</option>
                            <option value="Admin">Admin</option>
                            <option value="User">User</option>
                        </select>
                    </div>

                    <input type="hidden" value="<?= $users->id ?>" name="id">
                    <input type="submit" class="btn btn-primary" value="Modifier">

                </form>
            </div>
        </div>
    </section>
</main>