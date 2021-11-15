<?php
require_once 'partials/header.php';
if (!isset($_GET['cat'])) {
    $sql = 'SELECT b.id, b.name, b.price, b.release_date, b.note, b.cover, c.name AS category
    FROM bluray b
    LEFT JOIN category c
    ON b.cat_id = c.id
    ORDER BY b.name';
    $stmt = $dbh->prepare($sql);
} else {
    $sql = 'SELECT b.id, b.name, b.price, b.release_date, b.note, b.cover, c.name AS category
    FROM bluray b
    LEFT JOIN category c 
    ON b.cat_id = b.id
    WHERE b.cat_id = :cat
    ORDER BY b.name';
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue('cat', $_GET['cat'], PDO::PARAM_INT);
}
$stmt->execute();
$blurays = $stmt->fetchAll();
// Test pour afficher le nom de la catégorie
$cat = isset($_GET['cat']) ? 'Catégorie ' . $_GET['catname'] : 'Toutes les catégories';
?>
    <main class="container">
        <section id="listing">
            <h2 class="display-3 my-4">Liste des blurays</h2>
            <h3><?= $cat ?> <span class="badge bg-secondary"><?= count($blurays) ?></span></h3>
            <div class="row">
                <div class="col-md-12">
                    <?php if ($blurays) : ?>
                        <table class="table table-succes table-striped">
                            <thead>
                            <tr>
                                <th>Logo</th>
                                <th>Nom</th>
                                <th>Prix</th>
                                <th>Date</th>
                                <th>Catégorie</th>
                                <th>Evaluation</th>
                            </tr>
                            </thead>

                            <tbody>
                            <?php foreach ($blurays as $bluray): ?>
                                <tr>
                                    <td><img src="img/covers/<?= $bluray->cover ?>" alt="<?= $bluray->name ?>"></td>
                                    <td><a href="details.php?id=<?= $bluray->id ?>"><?= $bluray->name ?></a></td>
                                    <td><?= $bluray->price ?>€</td>
                                    <td><?= $bluray->release_date ?></td>
                                    <td><?= $bluray->category ?></td>
                                    <td><?= stars($bluray->note) ?></td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php else: ?>
                        <h5 class="text-muted">Aucun bluray pour cette catégorie</h5>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    </main>

<?php require_once 'partials/footer.php';