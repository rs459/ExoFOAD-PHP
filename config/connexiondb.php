<?php

// on declare la fonction connectdb
// qui va se connecter à la base de données
// on y indique le serveur, l'utilisateur, le mot de passe et la base de données
function connectdb()
{
    $server = 'localhost';
    $user = 'root';
    $password = 'root';
    $bdd = 'Pierre_Sofip';
    // on utilise PDO pour se connecter à la base de données3
    // on utilise le mode d'erreur exception pour attraper les erreurs
    // on utilise le nom de la base de données pour se connecter
    // on utilise le nom du serveur, l'utilisateur et le mot de passe
    // on retourne la connexion
    try {
        $con = new PDO(
            'mysql:host=' . $server . ';dbname=' . $bdd,
            $user,
            $password
        );
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $con;
    }
    // on attrape l'erreur si la connexion échoue
    catch (PDOException $error) {
        echo 'N° : ' . $error->getCode() . '<br />';
        die('Erreur : ' . $error->getMessage() . '<br />');
    }
}
