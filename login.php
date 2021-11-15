<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
    <title>Login</title>
</head>
<body>
<main class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h3 class="display-6 my-4">Identifez vous</h3>
            <form action="src/login.php" method="post">
                <div class="form-group">
                    <label for="email">Votre email</label>
                    <input type="email" id="email" name="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="password">Votre password</label>
                    <input type="password" id="password" name="password" class="form-control" required>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Sign In</button>
                </div>
            </form>
        </div>
    </div>
</main>
</body>
</html>