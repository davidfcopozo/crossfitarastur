<section class="pricing-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Tarifas</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-8">
                <div class="ps-item">
                    <h3>8 Sesiones</h3>
                    <div class="pi-price">
                        <h4>45.0<span class="euro">€</span></h4>
                        <span>Sesión de open box gratis los sábados</span>
                    </div>
                    <ul>
                        <li>Free riding</li>
                        <li>Unlimited equipments</li>
                        <li>Personal trainer</li>
                        <li>Weight losing classes</li>
                        <li>Month to mouth</li>
                        <li>No time restriction</li>
                    </ul>
                    <?php
                    $text = "Más info";
                    $plan = "8 sesiones";
                    $message = urlencode("Hola, me gustaría información sobre el plan de  $plan.");
                    $whatsapp = "https://api.whatsapp.com/send?phone=34649238717&text=$message";
                    $contact = "contacto.php?message=$message";
                    $link = preg_match('/(android|iphone|ipod|mobile)/i', $_SERVER['HTTP_USER_AGENT']) ? $whatsapp : $contact;
                    require "_partials/button.php"; ?>
                </div>
            </div>
            <div class="col-lg-4 col-md-8">
                <div class="ps-item">
                    <h3>12 Sesiones</h3>
                    <div class="pi-price">
                        <h4>55.0<span class="euro">€</span></h4>
                        <span>Sesión de open box gratis los sábados</span>
                    </div>
                    <ul>
                        <li>Free riding</li>
                        <li>Unlimited equipments</li>
                        <li>Personal trainer</li>
                        <li>Weight losing classes</li>
                        <li>Month to mouth</li>
                        <li>No time restriction</li>
                    </ul>
                    <?php
                    $text = "Más info";
                    $plan = "12 sesiones";
                    $message = urlencode("Hola, me gustaría información sobre el plan de  $plan.");
                    $whatsapp = "https://api.whatsapp.com/send?phone=34649238717&text=$message";
                    $contact = "contacto.php?message=$message";
                    $link = preg_match('/(android|iphone|ipod|mobile)/i', $_SERVER['HTTP_USER_AGENT']) ? $whatsapp : $contact;
                    require "_partials/button.php"; ?>
                </div>
            </div>
            <div class="col-lg-4 col-md-8">
                <div class="ps-item">
                    <h3>16 Sesiones</h3>
                    <div class="pi-price">
                        <h4>65.0<span class="euro">€</span></h4>
                        <span>Sesión de open box gratis los sábados</span>
                    </div>
                    <ul>
                        <li>Free riding</li>
                        <li>Unlimited equipments</li>
                        <li>Personal trainer</li>
                        <li>Weight losing classes</li>
                        <li>Month to mouth</li>
                        <li>No time restriction</li>
                    </ul>
                    <?php
                    $text = "Más info";
                    $plan = "16 sesiones";
                    $message = urlencode("Hola, me gustaría información sobre el plan de  $plan.");
                    $whatsapp = "https://api.whatsapp.com/send?phone=34649238717&text=$message";
                    $contact = "contacto.php?message=$message";
                    $link = preg_match('/(android|iphone|ipod|mobile)/i', $_SERVER['HTTP_USER_AGENT']) ? $whatsapp : $contact;
                    require "_partials/button.php"; ?>
                </div>
            </div>
            <div class="col-lg-4 col-md-8">
                <div class="ps-item">
                    <h3>Ilimitado</h3>
                    <div class="pi-price">
                        <h4>75.0<span class="euro">€</span><span class="month">/mes</span></h4>
                        <span>Sesión de open box gratis los sábados</span>
                    </div>
                    <ul>
                        <li>Free riding</li>
                        <li>Unlimited equipments</li>
                        <li>Personal trainer</li>
                        <li>Weight losing classes</li>
                        <li>Month to mouth</li>
                        <li>No time restriction</li>
                    </ul>
                    <?php
                    $text = "Más info";
                    $plan = "ilimitado";
                    $message = urlencode("Hola, me gustaría información sobre el plan de  $plan.");
                    $whatsapp = "https://api.whatsapp.com/send?phone=34649238717&text=$message";
                    $contact = "contacto.php?message=$message";
                    $link = preg_match('/(android|iphone|ipod|mobile)/i', $_SERVER['HTTP_USER_AGENT']) ? $whatsapp : $contact;
                    require "_partials/button.php"; ?>
                </div>
            </div>
        </div>
    </div>
</section>