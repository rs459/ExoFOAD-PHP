<!-- head -->
<?php require_once __DIR__ . '/partials/_head.php'; ?>
<title>Ajout d'un stagiaire</title>
</head>

<body class="page-stagiaire-add">
    <?php require_once __DIR__ . '/partials/_navbar.php'; ?>
    <main class="container">
        <h1 class="text-center m-5">Ajouter d'un stagiaire</h1>

        <form method="post" action="../src/controllers/ajoutStagiaireController.php" enctype="multipart/form-data">
            <p class="mb-4"><span class="text-danger" aria-hidden="true">*</span> <span class="visually-hidden">Champ obligatoire.</span> <span class="d-inline">Champs obligatoires</span></p>
            <div class="row g-3">
                <div class="col-12 col-md-6">
                    <label for="lastName" class="form-label">Nom de Famille <span class="text-danger" aria-hidden="true">*</span><span class="visually-hidden"> (champ obligatoire)</span></label>
                    <input type="text" class="form-control" id="lastName" name="lastName" required aria-required="true">
                </div>
                <div class="col-12 col-md-6">
                    <label for="firstName" class="form-label">Prénom <span class="text-danger" aria-hidden="true">*</span><span class="visually-hidden"> (champ obligatoire)</span></label>
                    <input type="text" class="form-control" id="firstName" name="firstName" required aria-required="true">
                </div>
                <div class="col-12 col-md-6">
                    <label for="birthday" class="form-label">Date de Naissance <span class="text-danger" aria-hidden="true">*</span><span class="visually-hidden"> (champ obligatoire)</span></label>
                    <input type="date" class="form-control" id="birthday" name="birthday" required aria-required="true">
                </div>
                <div class="col-12 col-md-6">
                    <label for="age" class="form-label">Âge <span class="text-danger" aria-hidden="true">*</span><span class="visually-hidden"> (champ obligatoire)</span></label>
                    <input type="number" class="form-control" id="age" name="age" min="1" max="150" required aria-required="true">
                </div>
                <div class="col-12 col-md-6">
                    <label for="email" class="form-label">Email <span class="text-danger" aria-hidden="true">*</span><span class="visually-hidden"> (champ obligatoire)</span></label>
                    <input type="email" class="form-control" id="email" name="email" required aria-required="true">
                </div>
                <div class="col-12 col-md-6">
                    <label for="city" class="form-label">Ville <span class="text-danger" aria-hidden="true">*</span><span class="visually-hidden"> (champ obligatoire)</span></label>
                    <input type="text" class="form-control" id="city" name="city" required aria-required="true">
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12 col-md-6 d-grid mx-auto">
                    <button type="submit" class="btn btn-primary btn-lg">Ajouter le Stagiaire</button>
                </div>
                <div class="col-12 col-md-6 d-grid mx-auto">
                    <a href="/" class="btn btn-outline-primary btn-lg">Afficher les stagiaires</a>
                </div>
            </div>
        </form>
    </main>
    <!-- footer -->
    <?php require_once __DIR__ . '/partials/_footer.php'; ?>