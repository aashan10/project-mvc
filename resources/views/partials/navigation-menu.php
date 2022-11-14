<h3 class="float-md-start mb-0">
    <a href="/" class="fw-bold nav-link">
        <?= $title ?? 'Awesome App' ?>
    </a>
</h3>
<?php
    $currentPage = $_SERVER['REQUEST_URI'];
?>
<nav class="nav nav-masthead justify-content-center float-md-end">
    <a class="nav-link fw-bold py-1 px-0 <?= $currentPage === '/' ? "active" : "" ?>" aria-current="page" href="/">Home</a>
    <a class="nav-link fw-bold py-1 px-0 <?= $currentPage === '/features' ? "active" : "" ?>" href="/features">Features</a>
    <a class="nav-link fw-bold py-1 px-0 <?= $currentPage === '/contact' ? "active" : "" ?>" href="/contact">Contact</a>
</nav>