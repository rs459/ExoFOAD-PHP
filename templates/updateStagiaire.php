<?php
require_once "../config/connexiondb.php";

$con = connectdb();
$data = null;
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $idStagiaire = $_POST['id'];
    $stmt = $con->prepare("SELECT * FROM Stagiaire WHERE StudentID = :id");
    $stmt->bindParam(":id", $idStagiaire);
    $stmt->execute();
    $data = $stmt->fetch();
}
?>
<?php require_once __DIR__ . '/partials/_head.php'; ?>
<title>Mise à jour d'un stagiaire</title>
</head>
<body class="page-stagiaire-update">
    <?php require_once __DIR__ . '/partials/_navbar.php'; ?>
    <main class="container">

 <h1 class="text-center m-5">Modifier le stagiaire</h1>
 <?php if ($data): ?>
    <form action="../src/controllers/updateStagiaireController.php" method="post">
        <p class="mb-4"><span class="text-danger" aria-hidden="true">*</span> <span class="visually-hidden">Champ obligatoire.</span> <span class="d-inline">Champs obligatoires</span></p>
        <input class="form-control" type="hidden" name="id" value="<?php echo htmlspecialchars($data['StudentID']); ?>">
        <div class="row">
            <div class="mb-3 col-12 col-md-6">
                <label class="form-label" for="lastName">Nom de Famille <span class="text-danger" aria-hidden="true">*</span><span class="visually-hidden"> (champ obligatoire)</span></label>
                <input class="form-control" type="text" name="lastName" id="lastName" value="<?php echo htmlspecialchars($data['LastName']); ?>" required aria-required="true">
            </div>
            <div class="mb-3 col-12 col-md-6">
                <label class="form-label" for="firstName">Prénom <span class="text-danger" aria-hidden="true">*</span><span class="visually-hidden"> (champ obligatoire)</span></label>
                <input class="form-control" type="text" name="firstName" id="firstName" value="<?php echo htmlspecialchars($data['FirstName']); ?>" required aria-required="true">
            </div>
            <div class="mb-3 col-12 col-md-6">
                <label class="form-label" for="birthday">Date de Naissance <span class="text-danger" aria-hidden="true">*</span><span class="visually-hidden"> (champ obligatoire)</span></label>
                <input class="form-control" type="date" name="birthday" id="birthday" value="<?php echo htmlspecialchars($data['Birthday']); ?>" required aria-required="true">
            </div>
            <div class="mb-3 col-12 col-md-6">
                <label class="form-label" for="age">Âge <span class="text-danger" aria-hidden="true">*</span><span class="visually-hidden"> (champ obligatoire)</span></label>
                <input class="form-control" type="number" name="age" id="age" min="1" max="150" value="<?php echo htmlspecialchars($data['Age']); ?>" required aria-required="true">
            </div>
            <div class="mb-3 col-12 col-md-6">
                <label class="form-label" for="email">Email <span class="text-danger" aria-hidden="true">*</span><span class="visually-hidden"> (champ obligatoire)</span></label>
                <input class="form-control" type="email" name="email" id="email" value="<?php echo htmlspecialchars($data['Email']); ?>" required aria-required="true">
            </div>
            <div class="mb-3 col-12 col-md-6">
                <label class="form-label" for="city">Ville <span class="text-danger" aria-hidden="true">*</span><span class="visually-hidden"> (champ obligatoire)</span></label>
                <input class="form-control" type="text" name="city" id="city" value="<?php echo htmlspecialchars($data['City']); ?>" required aria-required="true">
            </div>
        </div>
        <input type="submit" class="btn btn-outline-success my-4" value="Mettre à jour">
    </form>
 <?php else: ?>
    <div class="alert alert-warning mt-4">Aucun stagiaire sélectionné pour la modification.</div>
 <?php endif; ?>
    <div>
        <a class="btn btn-outline-primary" href="/">Afficher les stagiaires</a>
</main>
    <!-- footer -->
    <?php require_once __DIR__ . '/partials/_footer.php'; ?>