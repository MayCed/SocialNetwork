<?php
$route = isset($post) && $post->get('id') ? 'editCommentNew' : 'addCommentNew';
$submit = $route === 'addCommentNew' ? 'Ajouter' : 'Mettre à jour';
?>



<form method="post" action="../public/index.php?route=<?= $route; ?>&newId=<?= htmlspecialchars($article->getId()); ?>">
	
    <label for="content">Message</label><br>
    <textarea id="content" name="content"><?= isset($post) ? htmlspecialchars($post->get('pseudo')): ''; ?></textarea><br>
    <?= isset($errors['content']) ? $errors['content'] : ''; ?>

    <input type="submit" value="<?= $submit; ?>" id="submit" name="submit">
</form>