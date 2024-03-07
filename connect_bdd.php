<?php
    //Tentative de connexions à la base de données 
    try {
        $utilisateur = "minireseau";
        $mot_de_passe = "12345";
        $base_de_donnees = "mini_reseau";
        // PDO est la classe qui permet de se connecter à la base de données 
        $db = new PDO(
            "mysql:host=localhost;dbname=".$base_de_donnees.";charset=utf8",
            $utilisateur,
            $mot_de_passe,
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION // Activer la gestion des erreurs 
            ]
        );
    } catch(Exception $e){
        echo "Connexion à la base donnée refusé.";
        exit();
    }
?>