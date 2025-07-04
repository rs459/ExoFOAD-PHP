<?php

// On inclut le fichier de connexion à la base de données
require_once __DIR__ . '/../../config/connexiondb.php';
$con = connectdb();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = isset($_POST['id']) ? trim($_POST['id']) : null;
    $lastName = isset($_POST['lastName']) ? trim($_POST['lastName']) : '';
    $firstName = isset($_POST['firstName']) ? trim($_POST['firstName']) : '';
    $birthday = isset($_POST['birthday']) ? trim($_POST['birthday']) : '';
    $age = isset($_POST['age']) ? trim($_POST['age']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $city = isset($_POST['city']) ? trim($_POST['city']) : '';

    if (!empty($id) && !empty($lastName) && !empty($firstName) && !empty($birthday) && !empty($age) && !empty($email) && !empty($city)) {
        $stmt = $con->prepare("UPDATE Stagiaire SET LastName = :lastName, FirstName = :firstName, Birthday = :birthday, Age = :age, Email = :email, City = :city WHERE StudentID = :id");
        $stmt->bindParam(':lastName', $lastName);
        $stmt->bindParam(':firstName', $firstName);
        $stmt->bindParam(':birthday', $birthday);
        $stmt->bindParam(':age', $age);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':city', $city);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        // Redirection après la mise à jour
        header('Location: /index.php?success=1');
        exit();
    } else {
        echo "Certaines valeurs ne sont pas conformes, il faut remplir tous les champs";
    }
} else {
    echo "Méthode non autorisée.";
}
