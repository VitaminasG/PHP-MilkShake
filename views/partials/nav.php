<nav>
    <nav class="navbar fixed-top navbar-dark bg-dark">
        <?php $app = new App\Container; ?>
        <a class="navbar-brand" href="/"><?= $app->appName(); ?></a>
        <ul class="nav justify-content-end">
            <li class="nav-item">
                <a class="nav-link" href="/">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/dashboard">Dashboard</a>
            </li>
        </ul>
    </nav>
</nav>