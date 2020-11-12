<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Restaurants</title>
    
  </head>
  <body>
  <style>
  a, a:hover{
      color:white;
  }
    h2{
        border-top: 1px solid navy;
        border-bottom: 1px solid navy;
        color: navy;
    }
    table{
        border-collapse: collapse;
    }
    td, th{
      .border{
        border-bottom: 1px solid black; 
      } 
        
    }
 </style>
    <!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
   
   <div class="container">
        <!--La marque-->
        <a class="navbar-brand" href="<?php echo RACINE_SITE . 'restaurant.php' ;?>">Annuaire des restaurants</a>
        <!--burger-->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!--Menu de navigation-->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              
            <?php
                echo '<li><a class="nav-link" href="'. RACINE_SITE .'new.php">Nouveau Restaurant</a></li>';
                
              ?>  
            </ul>
        </div>
    </div><!-- .container-->
</nav>

<!--Contenu de la page -->
    <main class="container" style="min-height:80vh;">

    