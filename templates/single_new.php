<?php $this->title = 'Actualité';?>
<section class="container">
    
    <br>
    <div class = "row row d-flex justify-content-center">
        <?= $this->session->show('add_comment_new'); ?>
    </div>
    <br>
    
    <div class="row d-flex justify-content-center mt-5">
        <div class="col col-12 col-md-6 d-flex justify-content-center flex-column text-center newssingle">
           <div class="card">

              <!-- Card image -->
              <div class="card_img">
                 <img class="img-thumbnail card-img-top" src="<?= htmlspecialchars($article->getPhoto());?>" alt="Card image cap">
             </div>

             <!-- Card content -->
             <div class="card-body newsbody">

                <!-- Title -->
                <h4 class="card-title"><a href="../public/index.php?route=new&newId=<?= htmlspecialchars($article->getId());?>"><?= htmlspecialchars($article->getTitle());?></a></h4>
                <!-- Text -->
                <p class="card-text"><?= htmlspecialchars($article->getContent());?></p>
                <div class="card-footer text-muted text-center">
                    <p><?= htmlspecialchars($article->getCreatedAt());?></p>
                </div>

            </div>

        </div>
    </div>
</div>

<div class = "row row d-flex justify-content-center">
    <a class="btn btn-default btn-lg btn-block btn-info" href="../public/index.php?route=multiple_new">Retournez sur la page d'actualité</a>
</div>
<br>


<div class = "row row d-flex justify-content-center">
    <h3>Ajouter un commentaire</h3>
</div>
<div class = "row row d-flex justify-content-center">
    <?php include('form_comment_new.php'); ?>
</div>


<div class = "row row d-flex justify-content-start">
<h3>Commentaires</h3>
</div>


<?php
if($comments){ 
foreach($comments as $comment)
{
    ?>
    <div class = "row row d-flex justify-content-center">
        <div class="col col-12 d-flex justify-content-start mt-3 pl-0">
            <h5 class="mr-2"><?= htmlspecialchars($comment->getPseudo());?>:</h5>
            <p class="mr-2"><?= htmlspecialchars($comment->getContent());?></p>

            <p class="mr-2">Posté le <?= htmlspecialchars($comment->GetCreatedAt());?></p>

            <?php if($comment->isFlag())
            {
                ?>
                <p>Ce commentaire a déjà été signalé</p>
                <?php
            }
            else{
                ?>
                <p class="mr-2"><a href="../public/index.php?route=flagCommentNew&commentNewId=<?= $comment->getId(); ?>">Signaler le commentaire</a></p>

                <?php
            }
            ?>
            <br>
        </div>
    </div>
    <?php
}
}
else{
    ?>
    <p>il n'y a pas de commentaire sur cet article</p>

    <?php

}
?>
</section>

