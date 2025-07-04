<?php

// On inclut le fichier de connexion à la base de données
require_once __DIR__ . '/../../config/connexiondb.php';
$con = connectdb();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (
        isset(
            $_POST['lastName'],
            $_POST['firstName'],
            $_POST['birthday'],
            $_POST['age'],
            $_POST['email'],
            $_POST['city']
        ) &&
        $_POST['lastName'] !== '' &&
        $_POST['firstName'] !== '' &&
        $_POST['birthday'] !== '' &&
        $_POST['age'] !== '' &&
        $_POST['email'] !== '' &&
        $_POST['city'] !== ''
    ) {
        $lastName = $_POST['lastName'];
        $firstName = $_POST['firstName'];
        $birthday = $_POST['birthday'];
        $age = $_POST['age'];
        $email = $_POST['email'];
        $city = $_POST['city'];

        $sql = "INSERT INTO Stagiaire (LastName, FirstName, Birthday, Age, Email, City) VALUES (:lastName, :firstName, :birthday, :age, :email, :city)";
        $stmt = $con->prepare($sql);
        $stmt->bindParam(':lastName', $lastName);
        $stmt->bindParam(':firstName', $firstName);
        $stmt->bindParam(':birthday', $birthday);
        $stmt->bindParam(':age', $age);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':city', $city);

        if ($stmt->execute()) {
            header('Location: /index.php?success=1');
            exit;
        } else {
            echo "Erreur lors de l'ajout du stagiaire.";
        }
    } else {
        echo "Tous les champs sont obligatoires.";
    }
}
