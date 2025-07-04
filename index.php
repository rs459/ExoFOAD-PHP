</head>
<?php require_once __DIR__ . '/src/controllers/stagiaireController.php'; ?>
<!-- head -->
<?php require_once __DIR__ . '/templates/partials/_head.php'; ?>
<title>Stagiaires SOFIP Accueil</title>
</head>
<body class="page-stagiaire">
<?php require_once __DIR__ . '/templates/partials/_navbar.php'; ?>
<main class="container">
    <h1 class="text-center m-5">Stagiaire</h1>
<?php if (isset($_GET['success']) && $_GET['success'] === '1'): ?>
    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
        L'opération a été réalisée avec succès !
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fermer"></button>
    </div>
<?php endif; ?>
<?php if (isset($_GET['error'])): ?>
    <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
        <?php
        if ($_GET['error'] === 'suppression') {
            echo "Impossible de supprimer le stagiaire.";
        } elseif ($_GET['error'] === 'action') {
            echo "Impossible d'effectuer l'action. <a href='/'>Retour à l'accueil</a>";
        } else {
            echo "Une erreur est survenue.";
        }
?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fermer"></button>
    </div>
<?php endif; ?>
    <table class="table border table-striped">
    <thead>
        <tr>
            <th class="border text-center" scope="col">Nom</th>
            <th class="border text-center" scope="col">Prénom</th>
            <th class="border text-center" scope="col">Âge</th>
            <th class="border text-center" scope="col">Date de naissance</th>
            <th class="border text-center" scope="col">Email</th>
            <th class="border text-center" scope="col">Ville</th>
            <th class="border text-center" scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
    // boucle foreach pour afficher chaque ligne de la requête
    if (isset($lignes) && is_array($lignes)) {
        foreach ($lignes as $ligne) {
            $date = DateTime::createFromFormat('Y-m-d', $ligne['Birthday']);
            $formatedDated = $date->format('d/m/Y');
            echo '<tr>
                    <td class="border text-center">' . $ligne['LastName'] .'</td>
                    <td class="border text-center">' . $ligne['FirstName'] .'</td>
                    <td class="border text-center">' . $ligne['Age'] .'</td>
                    <td class="border text-center">' . $formatedDated.'</td>
                    <td class="border text-center">' . $ligne['Email'] .'</td>
                    <td class="border text-center">' . $ligne['City'] .'</td>
                    <td class="border align-middle text-center">
                        <form action="/templates/updateStagiaire.php" method="post">
                            <input type="hidden" name="id" value="' . $ligne['StudentID'] . '">
                            <button class="btn btn-outline-success my-1" type="submit">
                                Modifier
                                <span class="visually-hidden">' . htmlspecialchars($ligne['FirstName']) . ' ' . htmlspecialchars($ligne['LastName']) . '</span>
                            </button>
                        </form>
                        <form action="../src/controllers/deleteStagiaireController.php" method="post" onsubmit="confirmerSuppression(event)">
                            <input type="hidden" name="id" value="' . $ligne['StudentID'] . '">
                            <button class="btn btn-outline-danger my-1" type="submit">
                                Supprimer
                                <span class="visually-hidden">'. htmlspecialchars($ligne['FirstName']) . ' ' . htmlspecialchars($ligne['LastName']) . '</span>
                            </button>
                        </form>
                    </td>
                </tr>';
        }
    }
?>
        </tbody>
    </table>
    <div class="my-4">
        <a class="btn btn-outline-primary mx1" href="/templates/ajoutStagiaire.php">Ajouter un stagiaire</a>
    </div>
 </main> 
    <!-- footer -->
    <?php require_once __DIR__ . '/templates/partials/_footer.php'; ?>

