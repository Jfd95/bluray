<!doctype html>
<html lang="zxx">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1">
    <title>Partie administration</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Dashboard</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Websites</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Catégories</a>
                    </li>
                    <?php if ($_SESSION['login']->level == 'SuperAdmin') : ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                               data-bs-toggle="dropdown" aria-expanded="false">
                                Users
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="admin.php?action=adduser">Ajouter un nouvel
                                        utilisateur</a></li>
                                <li><a class="dropdown-item" href="admin.php?action=viewuser">Voir les utilisateurs</a>
                                </li>

                            </ul>
                        </li>
                    <?php endif; ?>
                </ul>
                <div>
                    <?= $_SESSION['login']->first_name . ' ' . $_SESSION['login']->last_name . ' (' . $_SESSION['login']->level . ')' ?>
                    <a href="src/logout.php" class="btn btn-primary">Déconnexion</a>
                </div>
            </div>
        </div>
    </nav>
</header>