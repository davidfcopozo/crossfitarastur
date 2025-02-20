<?php
$title = "Blog | Crossfit Arastur";
require "_partials/header.php"; ?>
<main class="blog-page main app form" id="main">
    <?php
    $title = "Nuestro Blog";
    $text = "";
    $bg = "image-bg.webp";
    require "_partials/hero-component.php";
    ?>
    <?php require "sections/blog-section.php"; ?>

</main>
<?php require "_partials/footer.php"; ?>