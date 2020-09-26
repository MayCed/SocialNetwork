<?php $this->title = "Inscription"; ?>
<div class = "row row d-flex justify-content-center mt-4 mb-4 title">
    <h1>GREATCOMPLUS</h1>
</div>
<div class= "col-6 offset-3">

    <form class="text-center border border-light p-5" method="post" action="../public/index.php?route=register" enctype="multipart/form-data">

        <p class="h4 mb-4">Sign up</p>

        <label for="pseudo">Login</label><br>
        <input class="form-control mb-4" type="text" id="pseudo" name="pseudo"><br>
        <?= isset($errors['pseudo']) ? $errors['pseudo'] : ''; ?>

        <div class="form-row mb-4">
            <div class="col">
                <!-- First name -->
                <label for="firstname">Nom</label><br>
                <input class="form-control" type="text" id="firstname" name="firstname"><br>
                <?= isset($errors['firstname']) ? $errors['firstname'] : ''; ?>
            </div>
            <div class="col">
                <label for="name">Prenom</label><br>
                <input class= "form-control" type="text" id="name" name="name"><br>
                <?= isset($errors['name']) ? $errors['name'] : ''; ?>
            </div>
        </div>

        <!-- E-mail -->
        <label for="email">Email</label><br>
        <input class="form-control mb-4" type="text" id="email" name="email"><br>
        <?= isset($errors['email']) ? $errors['email'] : ''; ?>

        <!-- Password -->
        <label for="password">Mot de passe</label><br>
        <input class="form-control " type="text" id="password" name="password"><br>
        <progress max="100" value="0" id="strength" styke="width: 230px"></progress><br>

        <?= isset($errors['password']) ? $errors['password'] : ''; ?>

        <!-- Phone number -->
        <label for="telephone">Telephone</label><br>
        <input class="form-control mb-4" type="text" id="telephone" name="telephone"><br>
        <?= isset($errors['telephone']) ? $errors['telephone'] : ''; ?>

        <label for="photo">Photo</label><br>
        <input class="form-control mb-4" type="file" id="photo" name="myfile"><br>

        <hr>

        <button class="btn btn-info my-4 btn-block" type="submit" value="Inscription" id="submit" name="submit">Inscription</button>

        <hr>
    </form>
    <!-- Default form register -->
</div>
<script src="js/main.js"></script>