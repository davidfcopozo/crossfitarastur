<?php
$title = "Blog | Crossfit Arastur";
require __DIR__ . "/../_partials/header.php"; ?>
<main class="blog-page main app form" id="main">
    <?php
    $title = "Nuestro Blog";
    $text = "";
    $bg = "image-bg.webp";
    require __DIR__ . "/../_partials/hero-component.php";
    ?>
    <?php require __DIR__ . "/../sections/blog-section.php"; ?>

</main>
<?php require __DIR__ . "/../_partials/footer.php"; ?>