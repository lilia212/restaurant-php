<?php
require_once 'inc/init.php';

//-----------------Traitement PHP ----------
//Traitement des données du formulaire :
//debug($_POST);
$restos= array('id'=>'','nom'=>'', 'adresse'=>'','telephone'=>'','type'=>'' ,'note'=>'','avis'=>'');
$list_type=['gastronomique', 'brasserie', 'pizzeria', 'autre'];


if(!empty($_GET['id']) && empty($_POST['id_restaurant'])){

    $resultat= executeRequete("SELECT * FROM restaurant WHERE id_restaurant=:id_restaurant",
        array(
            ':id_restaurant'   => $_GET['id']                     


        ));
        if($resultat->rowCount() == 1){ // s'il y a 1 ligne de résultat, c'est que le pseudo est en BDD: on peut alors vérifier le mdp
                
            $restaurant= $resultat->fetch(PDO::FETCH_ASSOC);
            $restos['id']= $_GET['id'];
            $restos['nom']= $restaurant['nom'];
            $restos['adresse']= $restaurant['adresse'];
            $restos['telephone']= $restaurant['telephone'];
            $restos['type']= $restaurant['type'];
            $restos['note']= $restaurant['note'];
            $restos['avis']= $restaurant['avis'];


        }else{
            $contenu .= '<div class="alert alert-danger">Ce restaurant n\'existe pas dans la liste.</div>';
        }

}



elseif(!empty($_POST)){ // si le formulaire a été envoyé
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
      $restos['type']= $_POST['type'];
      $restos['note']= $_POST['note'];
        $succes= executeRequete("UPDATE restaurant SET nom = :nom, adresse = :adresse, telephone=:telephone, type=:type, note=:note, avis=:avis WHERE id_restaurant=:id_restaurant",
        array(
            ':id_restaurant'   => $_POST['id_restaurant'] ,
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

} else{
    header('new.php');
    exit;
}




//------------ AFFICHAGE-------



require_once 'inc/header.php';
?>
<div class="container">
    <h1 class="alert bg-info text-white">Modifier le restaurant</h1>

    <?php echo $contenu; // pour afficher les messages ?>
    <form action="" method="post">

    <div class="row">
        <div class="col-md-6">
            <input id="id_restaurant" name="id_restaurant" type="hidden" value="<?php echo $_POST['id_restaurant'] ?? $restos['id']; ?>">
            <input class="form-control" type="text" name="nom" id="nom" value="<?php echo $_POST['nom'] ??  $restos['nom']; ?>" placeholder="Nom">
        </div>
        <div class="col-md-6">
            <select class="form-control" name="type" id="type" placeholder="Type de restaurant">
                <option value="gastronomique" <?php if($restos['type']=='gastronomique') echo 'selected';?>
                    
                >Gastronomique</option>
                <option value="brasserie"  <?php if($restos['type']=='brasserie') echo 'selected';?>>Brasserie</option>
                <option value="pizzeria"  <?php if($restos['type']=='pizzeria') echo 'selected';?>>Pizzeria</option>
                <option value="autre"  <?php if($restos['type']=='autre') echo 'selected';?>>Autre</option>
            </select>
        </div>       
        
    </div>

    <div class="row mt-3">
    <div class="col-md-12">
        <input class= "form-control" type="text" name="adresse" id="adresse" value="<?php echo $_POST['adresse'] ?? $restos['adresse']; ?>" placeholder="Adresse">
    </div>
    </div>
    <div class="row mt-3">
    <div class="col-md-6">
        <input class="form-control" type="text" name="telephone" id="telephone" value="<?php echo $_POST['telephone'] ?? $restos['telephone']; ?>" placeholder="Téléphone">

        </div>
    <div class="col-md-6">
        <select class="form-control" name="note" id="note">
            <option value="1" <?php if($restos['note']=='1') echo 'selected';?>>1</option>
            <option value="2" <?php if($restos['note']=='2') echo 'selected';?>>2</option>
            <option value="3" <?php if($restos['note']=='3') echo 'selected';?>>3</option>
            <option value="4" <?php if($restos['note']=='4') echo 'selected';?>>4</option>
            <option value="5" <?php if($restos['note']=='5') echo 'selected';?>>5</option>     
        </select>
    </div>
    </div>
   
    <div class="mt-3 form-group"><label for="avis">Rédiger un avis</label></div>
    <div class="form-group"><textarea name="avis" id="avis" cols="30" rows="10" class="btn-block"><?php echo $_POST['avis'] ?? $restos['avis']; ?></textarea></div>
    <div class="form-group"><input type="submit" value="Enregister" class="btn-block btn btn-info mt-4"></div>
    </form>
</div>    
 <?php

require_once 'inc/footer.php';
