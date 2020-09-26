<?php $this->title = 'Accueil';?>


<section class="hero">
  <div class="container">
    <h1>GREATCOM<br>PLUS</h1>
    <div class="row">
      <div class="col-md-7">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
      </div>
    </div>

    <div class="row d-flex justify-content-center actions mt-5">
      <?php
      if ($this->session->get('pseudo')) {  
        ?>
        <a class="btn btn-secondary waves-effect" role="button" href="../public/index.php?route=logout">Déconnexion</a>
        <a class="btn btn-info waves-effect" role="button" href="../public/index.php?route=profile">Profil</a>
        <?php 
        if($this->session->get('role') === 'admin')
        { 
          ?>
          <a class="btn btn-danger waves-effect" role="button" href="../public/index.php?route=administration">Administration</a>
          <?php
        } 
      }else{ 
       ?>
       <a class="btn btn-dark waves-effect" role="button" href="../public/index.php?route=register">Inscription</a>
       <a class="btn btn-info waves-effect" role="button" href="../public/index.php?route=login">Connexion</a>
       <?php 
     }
     ?>
   </div>
 </div>
</section>

<section class="container contenu">

  <div class="row d-flex justify-content-center alert">
    <?= $this->session->show('login'); ?>
    <?= $this->session->show('logout'); ?>
    <?= $this->session->show('register'); ?>
  </div>


  <div class="row instruction d-flex align-items-center mt-5">
    <div class="col col-12 col-md-6"><h2 class="text-center">Postez vos news</h2><p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet quis vel illo ad deleniti voluptas explicabo velit similique atque et, placeat quasi, reprehenderit impedit laudantium, corporis ipsum id omnis quibusdam!</p></div>
    <div class="col col-md-6 image-instruction"><img class="img-fluid" src="../public/img/post.jpg"></div>
  </div>
  <div class="row d-flex flex-row-reverse instruction d-flex align-items-center">
    <div class="col col-md-6"><h2 class="text-center">Participez aux evenements</h2><p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet quis vel illo ad deleniti voluptas explicabo velit similique atque et, placeat quasi, reprehenderit impedit laudantium, corporis ipsum id omnis quibusdam!</p></div>
    <div class="col col-12 col-md-6 image-instruction"><img class="img-fluid" src="../public/img/evenement.jpg"></div>

  </div>
  <div class="row instruction d-flex align-items-center">
    <div class="col col-md-6"><h2 class="text-center">Comuniquez entre eleves</h2><p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet quis vel illo ad deleniti voluptas explicabo velit similique atque et, placeat quasi, reprehenderit impedit laudantium, corporis ipsum id omnis quibusdam!</p></div>
    <div class="col col-12 col-md-6 image-instruction"><img class="img-fluid" src="../public/img/communication.jpg"></div>
  </div>

</section>