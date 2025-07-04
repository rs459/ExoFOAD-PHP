<?php
$currentPath = $_SERVER['REQUEST_URI'];
?>
<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">Stagiaires SOFIP</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex">
                <li class="nav-item">
                    <a class="nav-link<?php echo ($currentPath === '/' || strpos($currentPath, '/index.php') !== false) ? ' active' : ''; ?>"
                       href="/"
                       <?php echo ($currentPath === '/' || strpos($currentPath, '/index.php') !== false) ? 'aria-current="page"' : ''; ?>>
                        Accueil
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link<?php echo (strpos($currentPath, 'testConnect.php') !== false) ? ' active' : ''; ?>"
                       href="/templates/testConnect.php"
                       <?php echo (strpos($currentPath, 'testConnect.php') !== false) ? 'aria-current="page"' : ''; ?>>
                        Test BDD
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
