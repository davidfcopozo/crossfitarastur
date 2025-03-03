<?php
$title = "Contacto | Crossfit Arastur";
$canonicalURL = "https://powderblue-parrot-507586.hostingersite.com/contacto";
require "_partials/header.php"; ?>
<main class="services-page main app form" id="main">
    <?php
    $title = "Contacto";
    $text = "¡Habla con nosotros y transforma tu vida!";
    $bg = "contact.webp";
    require "_partials/hero-component.php";
    ?>
    <?php require "sections/contact.php"; ?>
    <?php require "_partials/faq.php"; ?>

</main>
<?php require "_partials/footer.php"; ?>