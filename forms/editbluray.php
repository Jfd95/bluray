<?php
// Requête et traitement pour l'enregistrement à modifier
$sql = "SELECT b.id, b.name, b.price, b.release_date, b.note, b.cover, b.description, c.name AS category, c.id AS idcat
        FROM bluray b
        LEFT JOIN category c
        ON b.cat_id = c.id
        WHERE b.id = :id";
$stmt = $dbh->prepare($sql);
$stmt->bindValue('id', $_GET['id'], PDO::PARAM_INT);
$stmt->execute();
$bluray = $stmt->fetch();

// Requête et traitement pour la liste des catégories
$sql = "SELECT * FROM category ORDER BY category.name";
$stmt = $dbh->prepare($sql);
$stmt->execute();
$categories = $stmt->fetchAll();
?>

<main class="container">
    <section id="editbluray">
        <div class="row">
            <div class="col-md-8 offset-2">
                <h2 class="display-5">Modifier un bluray</h2>
                <form action="src/editbluray.php" method="post">
                    <div class="form-group">
                        <label for="name" class="form-label">Nom du bluray</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?= $bluray->name ?>">
                    </div>

                    <div class="form-group">
                        <label for="price" class="form-label">Prix du bluray</label>
                        <input type="text" class="form-control" id="price" name="price" value="<?= $bluray->price ?>€">
                    </div>

                    <div class="form-group">
                        <label for="date" class="form-label">Date de sortie du bluray</label>
                        <input type="date" class="form-control" id="date" name="date"
                               value="<?= $bluray->release_date ?>">
                    </div>

                    <div class="form-group">
                        <label for="category" class="form-label">Catégorie du bluray</label>
                        <select name="category" id="category" class="form-control">
                            <option value="">Sélectionnez...</option>
                            <?php foreach ($categories as $category): ?>
                                <option value="<?= $category->id ?>" <?= $bluray->idcat == $category->id ? 'selected' : '' ?>><?= $category->name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="note" class="form-label">Evaluation du bluray</label>
                        <select name="note" id="note" class="form-control">
                            <option value="">Sélectionnez...</option>
                            <?php for ($i = 1; $i <= 5; $i++): ?>
                                <option value="<?= $i ?>" <?= $bluray->note == $i ? 'selected' : '' ?>><?= $i ?></option>
                            <?php endfor; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="description" class="form-label">Description du bluray</label>
                        <textarea name="description" id="description" class="form-control" cols="30"
                                  rows="6"><?= $bluray->description ?></textarea>
                    </div>

                    <!-- Champ caché avec l'id du site pour l'upadate -->
                    <input type="hidden" value="<?= $bluray->id ?>" name="id">
                    <input type="submit" class="btn btn-primary" value="Modifier">

                </form>
            </div>
        </div>
    </section>
</main>