<!-- head -->
<?php require_once __DIR__ . "/partials/_head.php"; ?>
<title>Test de la connexion à la base.</title>
</head>

<body>
    <?php require_once __DIR__ . '/partials/_navbar.php'; ?>
    <div class="container-fluid p-5" style="max-width: 80%";>
        <?php require_once __DIR__ . '/../tests/test_connexion.php'; ?>
    </div>
    <!-- footer -->
    <?php require_once __DIR__ . '/partials/_footer.php'; ?>