<?php
//Ce fichier contient toutes les fonctions et sera inclus dans toutes les pages.
function debug($variable) {  
    echo '<div style="border:1px solid orange">';
        echo '<pre>';
         print_r($variable);
        echo '<pre>';
    echo '</div>';
}


//Fonction qui exécute des requêtes
function executeRequete($requete, $param= array()){ // le paramètre $requete attend de recevoir une requete SQL sous forme de string. $param attend un array avec les marqueurs associés à la valeur. Cet paramètre est  optionnel car on lui a affecté un array() vide par défaut.
    //Echapper les données de $param car elle proviennent de l'internaute : 
    foreach($param  as $indice=> $valeur){
        $param[$indice] = htmlspecialchars($valeur);// htmlspecialchars transforme les chevrons pour neutraliser les balises <script> </<script> et <style> (évite les failles XSS et CSS).         dans cette boucle. On prend à chaque tour de la valeur du tabaleau $param que 'lon échappe et que l'on réaffecte à son emplacementd'origine.
        //Requête préparée
       // echo $indice.' '.$valeur.'<br>';
        }
        global $pdo; // on accède à la variable globale $pdo qui est définie dans init.php à l'extérieur de cette de fonctions.
       
        $resultat = $pdo->prepare($requete); //on prépare la requête envoyée à notre fonction;
       
       
        $succes = $resultat->execute($param);// puis on exécute la requête en lui passant le tableau qui contient les marqueurs et leur valeur pour faire les binParam().   $succes true si la requête à marché, sinon false;
        if($succes){
           
            return $resultat ; // si $succes contient true, donc que la requête a marché, je retourne le résultat de ma requête 
        } else{
            return false; //si la requête n'a pas marché on retourne false.
            
        }
      
    
}