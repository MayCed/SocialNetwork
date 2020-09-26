<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
  <title><?= $title ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
  crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../public/css/style.css">
  
  <body>

  	<header>
            <!-- SECTION NAVBAR-->
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark greatcom-navbar">
                <div class="container-fluid">
                   <a class="navbar-brand" href="../public/index.php"><img id="logo" src="../public/img/logo.png"></a>
                   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarResponsive">
                      <ul class="navbar-nav ml-auto">
                         <li class="nav-item">
                            <a class="nav-link" href="index.php?route=multiple_new">Actualité
                               <span class="sr-only">(current)</span>
                           </a>
                       </li>
                       
                    <li class="nav-item">
                        <a class="nav-link" href="../public/index.php?route=contact">Contact</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">Presentation</a>
                        <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                           <a class="dropdown-item" href="../public/index.php?route=histoire">Histoire</a>
                           <a class="dropdown-item" href="../public/index.php?route=reseau">Reseau</a>
                       </div>
                   </li>
               </ul>
           </div>
       </div>
   </nav>
</header>