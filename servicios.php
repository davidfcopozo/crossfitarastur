<?php
$title = "Servicios | Crossfit Arastur";
require "_partials/header.php"; ?>
<main class="services-page main app form" id="main">
    <?php
    $title = "Servicios";
    $text = "¡Te llevamos a otro nivel!";
    $bg = "personal-trainer.webp";
    require "_partials/hero-component.php";
    ?>
    <?php require "sections/services.php"; ?>
    <?php
    $title = "Gran oferta";
    $subtitle = "de verano";
    $discount = "50%";
    $description = "Aprovecha nuestro descuento a la matrícula al contactarnos a través de nuestra página web.";

    require "_partials/offer-area.php";
    ?>
</main>
<?php require "_partials/footer.php"; ?>