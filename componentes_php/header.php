<?php
$current_page = basename($_SERVER['PHP_SELF'] , '.php');

?>
<header class="header">
    <div class="header__brand">
        <a class="" href="index.php"><img class="header__logo header__item" src="img/logo2.png" alt="logo"></a>
    </div>
    <nav class="header__nav"  id="header__nav">
        <ul class="header__menu">
            <li class="header__item"><a class="<?= ($current_page == 'index') ? 'header__link--active': '' ?> header__link" href="./index.php">Inicio</a></li>
            <li class="header__item"><a class="<?= ($current_page == 'inventario') ? 'header__link--active': '' ?> header__link" href="./inventario.php">Inventario</a></li>
            <li class="header__item"><a class="<?= ($current_page == 'clientes') ? 'header__link--active': '' ?> header__link" href="./clientes.php">Clientes</a></li>
            <li class="header__item"><a class="<?= ($current_page == 'proveedores') ? 'header__link--active': '' ?> header__link" href="./proveedores.php">Proveedores</a></li>
            <li class="header__item"><a class="<?= ($current_page == 'reportes') ? 'header__link--active': '' ?> header__link" href="./reportes.php">Reportes</a></li>
        </ul>
    </nav>
    <nav class="header__actions" aria-label="Acciones del sitio">
        <a class="header__button" href="carrito.php" aria-label="Ir al carrito">
            <i class="fa-solid fa-cart-shopping header__icon"></i>
        </a>
        <a class="header__button header__button--menu" aria-label="Abrir menú" href="#" id="header-menu-toggle">
            <i class="fa-solid fa-bars header__icon"></i>
        </a>
    </nav>
</header>