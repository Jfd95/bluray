<?php
require_once 'partials/header.php';

$sql = "SELECT b.name, b.price, b.note, b.description, b.cover, c.name AS category
        FROM bluray b
        LEFT JOIN category c
        ON b.cat_id = c.id
        WHERE b.id = :id";
$stmt = $dbh->prepare($sql);
$stmt->bindValue('id', $_GET['id'], PDO::PARAM_INT);
$stmt->execute();
$bluray = $stmt->fetch();
?>
    <main class="container my-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-3" style="max-width: 1200px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="img/covers/<?= $bluray->cover ?>" alt="<?= $bluray->name ?>" class="img-fluid">
                        </div>
                        <div class="col-md-8 px-5">
                            <div class="card-body">
                                <h3 class="card-title">Nom du bluray : <?= $bluray->name ?></h3>
                                <h5 class="card-title">Catégorie : <?= $bluray->category ?></h5>
                                <p class="card-text">Note : <?= stars($bluray->note) ?></p>
                                <p class="fs-4">Prix : <?= $bluray->price ?>€</p>
                                <p class="fs-6"><?= $bluray->description ?></p>
                                <a href="index.php" class="btn btn-outline-primary">Retour à l'index</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

<?php require_once 'partials/footer.php';
