<?php
require_once 'inc/init.php';

//-----------------Traitement PHP ----------
//Traitement des données du formulaire :
//debug($_POST);

$list_type=['gastronomique', 'brasserie', 'pizzeria', 'autre'];

if(!empty($_POST)){ // si le formulaire a été envoyé
// On contrôle tous les champs du formulaire :
// || double pipestr
    if(!isset($_POST['nom']) || strlen($_POST['nom']) < 4 || strlen($_POST['nom']) > 100){
       //si le champ "pseudo" n'existe pas ou que sa longeur est inférieur à 4 ou superieur à 100 (selonla BDD), alors on met un message à l'internaute       
        $contenu .= '<div class="alert alert-danger">Le nom doit contenir entre 4 et 100 caractères.</div>';
    }
    
    if(!isset($_POST['adresse']) || strlen($_POST['adresse']) < 4 || strlen($_POST['adresse']) > 100){
        $contenu .= '<div class="alert alert-danger">L\'adresse doit contenir entre 4 et 100 caractères.</div>';
    }    
    if(!isset($_POST['type']) || !in_array($_POST['type'], $list_type)){
        $contenu .= '<div class="alert alert-danger">Le type de restaurant n\'est pas valide.</div>';      
    }
   
    if(!isset($_POST['telephone'] ) || !preg_match('#^[0-9]{10}$#', $_POST['telephone']) ){
            $contenu .= '<div class="alert alert-danger">Le numéro de téléphone n\'est pas valide.</div>';
    }
    if(!isset($_POST['note'] ) || !preg_match('#^[0-9]{1}$#', $_POST['note']) ){
        $contenu .= '<div class="alert alert-danger">La note n\'est pas valide.</div>';
    }
    if(!isset($_POST['avis'] ) || strlen($_POST['avis']) < 1 ){
        $contenu .= '<div class="alert alert-danger">L\'avis est obligatoire.</div>';
    }
    //----------------
    
    if(empty($contenu)){// 
       
      //debug($resultat);          

        $succes= executeRequete("INSERT INTO restaurant(nom, adresse, telephone, type, note, avis) VALUES(:nom, :adresse, :telephone, :type, :note, :avis)",
        array(
            ':nom'   => $_POST['nom'] ,
            ':adresse'  => $_POST['adresse'] ,            
            ':telephone'   => $_POST['telephone'] ,            
            ':type' => $_POST['type'] ,
            ':note'    => $_POST['note'] ,
            ':avis' => $_POST['avis']    
            


        ));

        if($succes){
            $contenu .='<div class="alert alert-success">Le restaurant est enregistré. </div>';
        }else{
            $contenu .='<div class="alert alert-danger">Une erreur est survenue ...</div>' ;
        }
      }// fin de if (empty($contenu))  

} 




//------------ AFFICHAGE-------



require_once 'inc/header.php';
?>
<div class="container">
    <h1 class="alert bg-info text-white">Enregister le restaurant</h1>

    <?php echo $contenu; // pour afficher les messages ?>
    <form action="" method="post">

    <div class="row">
        <div class="col-md-6">
            <input class="form-control" type="text" name="nom" id="nom" value="<?php echo $_POST['nom'] ?? ''; ?>" placeholder="Nom">
        </div>
        <div class="col-md-6">
            <select class="form-control" name="type" id="type" placeholder="Type de restaurant">
                <option value="gastronomique">Gastronomique</option>
                <option value="brasserie">Brasserie</option>
                <option value="pizzeria">Pizzeria</option>
                <option value="autre">Autre</option>
            </select>
        </div>       
        
    </div>

    <div class="row mt-3">
    <div class="col-md-12">
        <input class= "form-control" type="text" name="adresse" id="adresse" value="<?php echo $_POST['adresse'] ?? ''; ?>" placeholder="Adresse">
    </div>
    </div>
    <div class="row mt-3">
    <div class="col-md-6">
        <input class="form-control" type="text" name="telephone" id="telephone" value="<?php echo $_POST['telephone'] ?? ''; ?>" placeholder="Téléphone">

        </div>
    <div class="col-md-6">
        <select class="form-control" name="note" id="note">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="4">5</option>     
        </select>
    </div>
    </div>
   
    <div class="mt-3 form-group"><label for="avis">Rédiger un avis</label></div>
    <div class="form-group"><textarea name="avis" id="avis" cols="30" rows="10" class="btn-block"><?php echo $_POST['avis'] ?? ''; ?></textarea></div>
    <div class="form-group"><input type="submit" value="Enregister" class="btn-block btn btn-info mt-4"></div>
    </form>
</div>    
 <?php

require_once 'inc/footer.php';
