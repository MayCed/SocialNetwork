<?php $this->title = "Connexion"; ?>
 <div class = "row row d-flex justify-content-center mt-4 mb-4 title">
    <h1>GREATCOMPLUS</h1>
</div>
<?= $this->session->show('error_login'); ?>

<div class=container-fluid>
	<div class="row d-flex justify-content-center">
		<form method="post" class="text-center border border-light p-5" action="../public/index.php?route=login">

			<p class="h4 mb-4">Sign in</p>

			<!-- Email -->
			<label for="pseudo">Pseudo</label><br>
			<input class="form-control mb-4" type="text" id="pseudo" name="pseudo" value="<?= isset($post) ? htmlspecialchars($post->get('pseudo')): ''; ?>">

			<!-- Password -->
			<label for="password">Mot de passe</label><br>
			<input class="form-control mb-4" type="password" id="password" name="password"><br>

			<!-- Sign in button -->
			<button class="btn btn-info btn-block my-4" type="submit" value="Connexion" id="submit" name="submit">Sign in</button>

			<!-- Register -->
			<p>Pas encore inscrit ?
				<a href="../public/index.php?route=register">S'inscrire</a>
			</p>

		</form>

	</div>
</div>