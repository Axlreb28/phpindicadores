<?php
session_start();
?>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <a class="navbar-brand">
            <img src="static/img/logo.png" alt="Logo" style="height: 30px;">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item"><a class="nav-link" href="menudepartamento.php">Departamentos</a></li>
                <li class="nav-item"><a class="nav-link" href="configuracion.php">Configuración</a></li>
                <li class="nav-item"><a class="nav-link" href="logout.php">Salir</a></li>
            </ul>
            <?php if (isset($_SESSION['authenticated']) && $_SESSION['authenticated']): ?>
            <span class="navbar-text ml-auto">
                Hola, <?php echo $_SESSION['username']; ?>
            </span>
            <?php endif; ?>
        </div>
    </nav>
</header>

