<main class="container">
    <section id="adduser">
        <div class="row">
            <div class="col-md-8 offset-2">
                <h2 class="display-5">Insérer un utilisateur</h2>
                <form action="src/adduser.php" method="post">
                    <div class="form-group">
                        <label for="firstname" class="form-label">Firstname</label>
                        <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Firstname">
                    </div>

                    <div class="form-group">
                        <label for="lastname" class="form-label">Lastname</label>
                        <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Lastname">
                    </div>

                    <div class="form-group">
                        <label for="login" class="form-label">Login</label>
                        <input type="text" class="form-control" id="login" name="login" placeholder="Login">
                    </div>

                    <div class="form-group">
                        <label for="email" class="form-label">email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                    </div>

                    <div class="form-group">
                        <label for="level" class="form-label">Level de l'utilisateur</label>
                        <select name="level" id="level" class="form-control">
                            <option value="">Sélectionnez...</option>
                                <option value="SuperAdmin">SuperAdmin</option>
                                <option value="Admin">Admin</option>
                                <option value="User">User</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password"
                               placeholder="Password">
                    </div>

                    <input type="submit" class="btn btn-primary" value="Ajouter">

                </form>
            </div>
        </div>
    </section>
</main>
