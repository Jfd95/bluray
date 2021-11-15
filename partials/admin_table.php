<?php
// Valeurs par défaut
$_GET['field'] = $_GET['field'] ?? 'name';
$_GET['order'] = $_GET['order'] ?? 'ASC';

$sql = "SELECT b.id, b.name, b.price, b.release_date, b.note, b.cover, c.name AS category
        FROM bluray b
        LEFT JOIN category c
        ON b.cat_id = c.id
        ORDER BY {$_GET['field']} {$_GET['order']}";
$stmt = $dbh->prepare($sql);
$stmt->execute();
$blurays = $stmt->fetchAll();

// Switch des valeurs par défaut
$_GET['order'] = $_GET['order'] == 'ASC' ? 'DESC' : 'ASC';
?>
<main class="container">
    <section id="listing">
        <h2 class="display-4 my-4">Administration des bluray</h2>
        <h1 class="display-6 my-4">Ajouter un nouveau bluray <small class="text-primary"><a href="?action=addbluray"><i
                            class="bi bi-camera-reels"></i></a></small></h1>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-succes table-striped">
                    <thead>
                    <tr>
                        <th>Logo</th>
                        <th><a href="?field=name&order=<?= $_GET['order'] ?>"><i class="bi bi-arrow-down-up">&nbsp;</i></a>Nom
                        </th>
                        <th><a href="?field=price&order=<?= $_GET['order'] ?>"><i class="bi bi-arrow-down-up">&nbsp;</i></a>Prix
                        </th>
                        <th><a href="?field=release_date&order=<?= $_GET['order'] ?>"><i class="bi bi-arrow-down-up">&nbsp;</i></a>Date
                        </th>
                        <th><a href="?field=category&order=<?= $_GET['order'] ?>"><i
                                        class="bi bi-arrow-down-up">&nbsp;</i></a>Catégorie
                        </th>
                        <th><a href="?field=note&order=<?= $_GET['order'] ?>"><i class="bi bi-arrow-down-up">&nbsp;</i></a>Evaluation
                        </th>
                        <th><i class="bi bi-trash"></i></th>
                        <th><i class="bi bi-pencil"></i></th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php foreach ($blurays as $bluray) : ?>
                        <tr>
                            <td><img src="img/covers/<?= $bluray->cover ?>" alt=""></td>
                            <td><?= $bluray->name ?></td>
                            <td><?= $bluray->price ?>€</td>
                            <td><?= $bluray->release_date ?></td>
                            <td><?= $bluray->category ?></td>
                            <td><?= stars($bluray->note) ?></td>
                            <td><a href="src/delbluray.php?id=<?= $bluray->id ?>"
                                   onclick="return confirm('Êtes vous sûr ?')"><i class="bi bi-trash"></i></a></td>
                            <td><a href="?action=editbluray&id=<?= $bluray->id ?>"><i class="bi bi-pencil"></i></a></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</main>