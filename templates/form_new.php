
<?php
$route = isset($post) && $post->get('id') ? 'editNew&newId='.$post->get('id') : 'addNew';
$submit = $route === 'addNew' ? 'Envoyer' : 'Mettre à jour';
?>

<form class="text-center border border-light p-5" method="post" action="../public/index.php?route=<?= $route; ?>" enctype="multipart/form-data">

        <label for="title">Titre</label><br>
        <input class="form-control mb-4" type="text" id="title" name="title" value="<?= isset($post) ? htmlentities($post->get('title')): ''; ?>"><br>
          <?= isset($errors['title']) ? $errors['title'] : ''; ?>

        <label for="content">Contenu</label><br>
        <textarea class="form-control mb-4" id="content" name="content" value=""><?= isset($post) ? htmlentities($post->get('content')): ''; ?></textarea><br>
          <?= isset($errors['content']) ? $errors['content'] : ''; ?>

        <label for="photo">Photo</label><br>
        <img class="img-fluid" src="<?= isset($post) ? htmlentities($post->get('photo')): ''; ?>">
        <input type="file" class="form-control mb-4"id="photo" name="myfile"><br>

        <input type="submit" class="btn btn-success"value="<?= $submit; ?>" id="submit" name="submit">

    </form>