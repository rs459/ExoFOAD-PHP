<?php

require_once 'config/connexiondb.php'; // Include database connection file
// On établit la connexion
$con = connectdb();
$sql = "SELECT * FROM Stagiaire";
$response = $con->query($sql);
$lignes = $response->fetchAll();
