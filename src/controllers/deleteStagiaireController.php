<?php

// On inclut le fichier de connexion à la base de données
require_once __DIR__ . '/../../config/connexiondb.php';
$con = connectdb();

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['id'])) {
    $id = $_POST['id'];
    $stmt = $con->prepare("DELETE FROM stagiaire WHERE StudentID = :id");
    $stmt->bindParam(":id", $id);

    if ($stmt->execute()) {
        header("Location: /index.php?success=1");
        exit();
    } else {
        header("Location: /index.php?error=suppression");
        exit();
    }
} else {
    header("Location: /index.php?error=action");
    exit();
}
