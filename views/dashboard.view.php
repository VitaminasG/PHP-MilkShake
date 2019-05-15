<?php require('partials/head.php'); ?>

    <div class="container">

        <div class="flex-container">

            <h1 class="text-center">Dashboard</h1>

            <ul>

                <?php foreach($data as $a => $b) : ?>

                        <li><?= $a ?> - <?= $b ?></li>

                <?php endforeach; ?>

            </ul>

        </div>

    </div>

<?php require('partials/footer.php'); ?>