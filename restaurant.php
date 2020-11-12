<?php
require_once 'inc/init.php';

require_once 'inc/header.php';


?>
<div class="container">
    <h1 class="alert bg-info text-white">La liste des restaurants</h1>
    <div class="row">
        <div class="col-md-6">
            <table class="table table-striped border">
            <tr class="center font-weight-bold"><td>Nom </td><td>Téléphone</td> <td>Autre infos</td></tr>
            <?php
                /***Afficher la liste des restaurants***/
                $resultat = executeRequete('SELECT * FROM restaurant');      
                //debug($resultat);
                

                
                if($resultat && $resultat->rowCount()>0){
                while($restaurant = $resultat->fetch(PDO::FETCH_ASSOC) ){
                    echo '<tr><td>'.$restaurant['nom']. ' </td><td>'. $restaurant['telephone'] . '</td> ' .'</td><td><a class="btn btn-info btn-block" href="?id='.$restaurant['id_restaurant'].'">Plus De Détails</a></td></tr>';
                    
                } 
                }else{
                    $contenu='<div class="alert alert-warning">La liste des restaurants est vide !!!</div>';
                }
                echo $contenu;

            ?> </table>
        </div>
        <div class="col-md-6">
           
        <?php
        echo '';

        if(isset($_GET['id'])){
            
            
            
            $resultat = executeRequete("SELECT * FROM restaurant WHERE id_restaurant= :id", array(':id'=>$_GET['id']));
            if($resultat->rowCount() == 1){ // s'il y a 1 ligne de résultat, c'est que le pseudo est en BDD: on peut alors vérifier le mdp
                
                $restaurant= $resultat->fetch(PDO::FETCH_ASSOC);
                echo  '<table class="table border"><tr class="text-center bg-info text-white"><td>'. $restaurant['nom'] .'</td></tr>';
                echo '<tr><td >Type: '.$restaurant['type'] . '</td> </tr>';
                echo '<tr><td>Adresse: '.$restaurant['adresse'] . '</td> </tr>';
                echo '<tr><td>Téléphone: '.$restaurant['telephone'] . '</td> </tr>';
                echo '<tr><td>Note: '.$restaurant['note'] . '</td> </tr>';
                echo '<tr><td>Avis: '.$restaurant['avis'] . '</td> </tr>';

                echo '<tr><td><a class="btn btn-info" href="update.php?id='.$restaurant['id_restaurant'] .'">Modifier</a></td></tr>';
               



            }
        }
       
        ?>

     </table>
            
        </div>
    </div>
</div>
<?php
require_once 'inc/footer.php';
