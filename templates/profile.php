<?php $this->title = 'Mon profil'; ?>
<div class="container">
 <div class = "row row d-flex justify-content-center mt-4 mb-4 title">
    <h1>Mon Profil</h1>
</div>

<?= $this->session->show('update_password'); ?>
<div class = "row row d-flex flex-column mt-5 mb-5 align-items-center">
    <h2 ><?= $this->session->get('pseudo'); ?></h2>
    <p><?= $this->session->get('firstname'); ?></p>
    <p><?= $this->session->get('name'); ?></p>
    <p><?= $this->session->get('email'); ?></p>
    <p><?= $this->session->get('telephone'); ?></p>
    <a href="../public/index.php?route=updatePassword">Modifier son mot de passe</a>
    <a href="../public/index.php?route=deleteAccount">Supprimer mon compte</a>
</div>
<br>

<div class = "row row d-flex justify-content-center mt-4 mb-4 title">
    <h1>Mes articles</h1>
</div>

<table class="table table-striped w-auto mt-5">
    <tr>
        <td>Id</td>
        <td>Titre</td>
        <td>Contenu</td>
        <td>Auteur</td>
        <td>Date</td>
        <td>Actions</td>
    </tr>
    <?php
    foreach ($articles as $article)
    {
        ?>
        <tr>
            <td><?= htmlspecialchars($article->getId());?></td>
            <td><a href="../public/index.php?route=new&newId=<?= htmlspecialchars($article->getId());?>"><?= htmlspecialchars($article->getTitle());?></a></td>
            <td><?= substr(htmlspecialchars($article->getContent()), 0, 150);?></td>
            <td><?= htmlspecialchars($article->getAuthor());?></td>
            <td>Créé le : <?= htmlspecialchars($article->getCreatedAt());?></td>
            <td>
                <a href="../public/index.php?route=editNew&newId=<?= $article->getId(); ?>">Modifier</a>
                <a href="../public/index.php?route=deleteNew&newId=<?= $article->getId(); ?>">Supprimer</a>
            </td>
        </tr>
        <?php
    }
    ?>
</table>

<a class="btn btn-danger" href="../public/index.php">Retour à l'accueil</a>

</div>