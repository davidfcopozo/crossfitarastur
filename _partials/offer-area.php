<article class="offer_area offer_bg">
    <div class="container">
        <div class="row justify-content-end">
            <div class="col-lg-6">
                <div class="offer_text">
                    <h3><?php echo $title; ?><br>
                        <?php echo $subtitle; ?></h3>
                    <h4><?php echo $discount; ?> de descuento</h4>
                    <p><?php echo $description; ?></p>
                    <?php
                    $text = "¡Matricúlate ahora!";
                    require "button.php"; ?>
                </div>
            </div>
        </div>
    </div>
</article>