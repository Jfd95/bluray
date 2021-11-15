<?php
require_once 'functions/db.php';
require_once 'functions/functions.php';
$dbh = connect();
$sql = "SELECT * FROM category c ORDER BY c.name";
$stmt = $dbh->prepare($sql);
$stmt->execute();
$categories = $stmt->fetchAll();
?>
<main class="container">
    <section id="addbluray">
        <div class="row">
            <div class="col-md-8 offset-2">
                <h2 class="display-5">Insérer un bluray</h2>
                <form action="src/addbluray.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name" class="form-label">Nom du bluray</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>

                    <div class="form-group">
                        <label for="price" class="form-label">Prix du bluray</label>
                        <input type="text" class="form-control" id="price" name="price">
                    </div>

                    <div class="form-group">
                        <label for="date" class="form-label">Date de sortie du bluray</label>
                        <input type="date" class="form-control" id="date" name="date">
                    </div>

                    <div class="form-group">
                        <label for="category" class="form-label">Catégorie du bluray</label>
                        <select name="category" id="category" class="form-control">
                            <option value="">Sélectionnez...</option>
                            <?php foreach ($categories as $category): ?>
                                <option value="<?= $category->id ?>"><?= $category->name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="note" class="form-label">Evaluation du bluray</label>
                        <select name="note" id="note" class="form-control">
                            <option value="">Sélectionnez...</option>
                            <?php for ($i = 1; $i <= 5; $i++): ?>
                                <option value="<?= $i ?>"><?= $i ?></option>
                            <?php endfor; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="description" class="form-label">Description du site</label>
                        <textarea name="description" id="description" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="cover">Logo du bluray</label>
                        <input type="file" id="cover" name="cover" class="form-control">
                    </div>

                    <input type="submit" class="btn btn-primary" value="Ajouter">
                </form>
            </div>
        </div>
    </section>
</main>