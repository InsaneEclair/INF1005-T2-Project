<?php
session_start();
$current_page = basename($_SERVER['REQUEST_URI'], ".php");
?>

<nav class="navbar navbar-expand-lg bg-secondary" data-bs-theme="dark">
    <a class="navbar-brand" href="#">
        <img src="images/logo.jpg" alt="Logo" title="World of Pets Logo">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <div class="navbar-nav flex-grow-1">
            <ul class="navbar-nav">
                <!-- Left items -->
                <li class="nav-item <?= ($current_page === 'index') ? 'active' : '' ?>">
                    <a class="nav-link" href="/index.php">Home</a>
                </li>
            </ul>
        </div>

        <!-- Search form -->
        <form class="form-inline mx-auto d-flex" action="search.php" method="GET">
            <input class="form-control mr-2 search-input" type="search" placeholder="Search for Fishes here!" aria-label="Search" name="query">
            <button class="btn search-button" type="submit">Search</button>
        </form>

        <div class="navbar-nav flex-grow-1 justify-content-end">
            <ul class="navbar-nav">
                <!-- Right items -->
                <li class="nav-item <?= ($current_page === 'register') ? 'active' : '' ?>">
                    <a class="nav-link" href="<?= ($current_page === 'register') ? '#' : 'register.php' ?>">Member Registration</a>
                </li>
                <li class="nav-item <?= ($current_page === 'login') ? 'active' : '' ?>">
                    <a class="nav-link" href="<?= ($current_page === 'login') ? '#' : 'login.php' ?>">Login</a>
                </li>
                <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) : ?>
                    <li class="nav-item <?= ($current_page === 'profile') ? 'active' : '' ?>">
                        <a class="nav-link" href="<?= ($current_page === 'profile') ? '#' : 'profile.php' ?>">Profile</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>