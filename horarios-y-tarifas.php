<?php
$title = "Horarios & Tarifas | Crossfit Arastur";
require "_partials/header.php"; ?>
<main class="schedule-prices-page main app form" id="main">
    <?php
    $title = "Horarios & Tarifas";
    $text = "";
    $bg = "schedule.webp";
    require "_partials/hero-component.php";
    ?>

    <?php require "_partials/prices.php"; ?>
    <div class="section-title">
        <h2>Horarios</h2>
    </div>
    <?php require "sections/schedules.php"; ?>
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