<?php $this->title = 'Actualités';?>

<div class="container-fluid">


  <div class = "row d-flex justify-content-center">
    <br>
    <?= $this->session->show('add_new'); ?>
    <?= $this->session->show('edit_new'); ?>
    <?= $this->session->show('delete_new'); ?>
    <?= $this->session->show('add_comment_new'); ?>
    <?= $this->session->show('flag_comment_new'); ?>
    <?= $this->session->show('delete_comment_new'); ?>

    <br>
  </div>

  <!-- Grid row -->
  <div class="row">

    <!-- Grid column  <div class=" col-md-6 col-lg-4 offset-md-4 post"> -->
      <div class=" col-md-8 col-lg-6 offset-md-4 offset-lg-2 post">


        <div class = "d-flex justify-content-center row mb-4">
          <div class = "col-12 d-sm-block d-md-none d-lg-none">
          <a class ="btn btn-success mt-1"href="../public/index.php?route=profile">Profil</a>
          <a href="../public/index.php?route=addNew" class="btn btn-primary waves-effect mt-1 postactu">News</a>
          <a class="btn btn-secondary waves-effect mt-1" role="button" href="../public/index.php?route=logout">Déconnexion</a>
        </div>


        </div>
        <!-- Card -->
        <?php foreach($articles as $article){ ?>
          <div class="card news-card mb-5">
            <div class="card-body">
              <div class="content d-flex">
                <h5><?= $article->getAuthor();?></h5>
                <div class="right-side-meta text-right w-100"><?= substr ($article->getCreatedAt(),0,10);?></div>
              </div>
            </div>
            <img class="card-img-top" src="<?= $article->getPhoto();?>" alt="Card image cap">
            <div class="card-body">
              <div class="social-meta">
                <h4 class="card-title text-center"><a href="../public/index.php?route=new&newId=<?= htmlspecialchars($article->getId());?>"><?= htmlspecialchars($article->getTitle());?></a></h4>
                <P><?= $article->getContent();?></P>
              </div>
              <hr>
              <div class="md-form">
                <i class="far fa-heart prefix"></i>
              </div>
            </div>
          </div>
          <?php 
        }
        ?>
      </div>


      <!-- PARTIE PROFIL-->

      <div class="col-md-3 d-none d-lg-block ">
        <!-- Grid row -->
        <div class="row ">


          <!-- Grid column -->
          <div class="col-12 profil">

            <!-- Card -->
            <div class="card card-personal photo_profil">
              <!-- Card image-->
              <img class="card-img-top" src="<?= htmlspecialchars($this->session->get('photo')); ?>" alt="Card image cap">
              <!-- Card image-->
              <!-- Card content -->
              <div class="card-body text-center">
                <!-- Title-->

                <h4 class="card-title title-one">
                  <?= $this->session->get('name')." ".$this->session->get('firstname');?></h4>

                  <hr>
                </br>
                <a class ="btn btn-success"href="../public/index.php?route=profile">Mon Profil</a></span></a>
              </div>

              <div class="text-center mt-1">
               <a href="../public/index.php?route=addNew" class="btn btn-primary waves-effect mt-1 postactu">AJOUTER UN POST</a>
             </div>

             <div class="row d-flex justify-content-center">
               <a class="btn btn-secondary waves-effect mt-1" role="button" href="../public/index.php?route=logout">Déconnexion</a>
             </div>

           </div>
           <!-- Card -->



         </div>
         <!-- Grid column -->

       </div>
       <!-- Grid row -->


     </div>


   </div>
