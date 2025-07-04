<?php

// Fichier de test pour vérifier la connexion à la base de données Pierre_Sofip
// Configuration du fuseau horaire français
date_default_timezone_set('Europe/Paris');
// Inclusion du fichier de connexion
require_once '../config/connexiondb.php';
echo "<h2>Test de connexion à la base de données</h2>";
echo "<hr>";
try {
    // Tentative de connexion
    echo "<p>Tentative de connexion à la base de données...</p>";
    $connexion = connectdb();
    if ($connexion) {
        echo "<p style='color: green;'><strong>✅ Connexion réussie !</strong></p>";
        echo "<p>Connexion établie avec succès à la base de données
'Pierre_Sofip'</p>";
        // Test d'une requête simple pour vérifier que la connexion fonctionne vraiment
        try {
            $stmt = $connexion->query("SELECT 1 as test");
            $result = $stmt->fetch();
            if ($result['test'] == 1) {
                echo "<p style='color: green;'>✅ Test de requête réussi</p>";
            }
        } catch (PDOException $e) {
            echo "<p style='color: orange;'>⚠ Connexion établie mais erreur lors du test
de requête : " . $e->getMessage() . "</p>";
        }
        // Affichage des informations de la connexion
        echo "<h3>Informations de connexion :</h3>";
        echo "<ul>";
        echo "<li><strong>Serveur :</strong> localhost</li>";
        echo "<li><strong>Base de données :</strong> Pierre_Sofip</li>";
        echo "<li><strong>Utilisateur :</strong> root</li>";
        echo "<li><strong>Status :</strong> Connecté</li>";
        echo "</ul>";
    } else {
        echo "<p style='color: red;'><strong>❌ Échec de la connexion</strong></p>";
    }
} catch (Exception $e) {
    echo "<p style='color: red;'><strong>❌ Erreur de connexion :</strong></p>";
    echo "<p style='color: red;'>Message d'erreur : " . $e->getMessage() . "</p>";
    echo "<p style='color: red;'>Code d'erreur : " . $e->getCode() . "</p>";
    echo "<h3>Vérifications à effectuer :</h3>";
    echo "<ul>";
    echo "<li>✓ Le serveur MySQL est-il démarré ?</li>";
    echo "<li>✓ La base de données 'Pierre_Sofip' existe-t-elle ?</li>";
    echo "<li>✓ Les identifiants (root/root) sont-ils corrects ?</li>";
    echo "<li>✓ Les permissions sont-elles accordées à l'utilisateur ?</li>";
    echo "</ul>";
}
echo "<hr>";
echo "<p><em>Test effectué le " . date('d/m/Y à H:i:s') . "</em></p>";
