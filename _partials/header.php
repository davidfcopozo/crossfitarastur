<?php
require "config.php";
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <script src="https://www.googletagmanager.com/gtag/js?id=G-ZBQ25EFQXD" async></script>

    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        // Default: Block GA until consent is given
        gtag('consent', 'default', {
            'ad_storage': 'denied',
            'analytics_storage': 'denied'
        });

        // Wait for Clickio consent
        function updateConsent() {
            let consentData = localStorage.getItem("lxGconsent__v2");
            if (consentData) {
                consentData = JSON.parse(consentData);
                if (consentData && consentData.cls_val) {
                    let consentArray = consentData.cls_val.split("|");
                    if (consentArray.length > 14) {
                        let consentFlags = consentArray[14].split("").map(e => e - 0);
                        let analyticsGranted = consentFlags[1] === 1;

                        let consentObj = {
                            'ad_storage': consentFlags[0] ? "granted" : "denied",
                            'analytics_storage': analyticsGranted ? "granted" : "denied"
                        };

                        // Update GA consent
                        gtag("consent", "update", consentObj);

                        // Only initialize GA if analytics is granted
                        if (analyticsGranted) {
                            gtag('config', 'G-ZBQ25EFQXD');
                        }
                    }
                }
            }
        }

        // Run consent check after page loads
        window.addEventListener("load", updateConsent);
    </script>
    <link rel="preconnect" href="//clickiocmp.com">
    <link rel="dns-prefetch" href="//clickiocmp.com">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $title; ?></title>
    <link rel="icon" href="favicon.ico" type="image/png" />
    <meta
        name="description"
        content="CossFit Arastur es el único box de Aragón que cuenta con un servicio de readaptación deportiva integrado en el centro." />
    <meta
        name="keywords"
        content="readaptacion deportiva, entrenamientos personales, CrossFit, ejercicios funcionales, box, RX, escalado, salud, crossfit zaragoza, crossfit aragon, be cool crossfit zaragoza, becool crossfit zaragoza, box crossfit zaragoza, cross fit zaragoza, crossfit en zaragoza, crossfit eolo zaragoza, crossfit hiberus zaragoza, crossfit reebok zaragoza,crossfit rocalla zaragoza, crossfit zaragoza centro, crossfit zaragoza las fuentes, crossfit zaragoza precio, crossfit zgz, gimnasio crossfit zaragoza, hammerbox zaragoza, kronos crossfit zaragoza, reebok crossfit zaragoza, zaragoza crossfit" />

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js" defer></script>
    <!-- FONTS -->
    <link
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900"
        rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap"
        rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <script
        src="https://kit.fontawesome.com/a163031abf.js"
        crossorigin="anonymous" defer></script>
    <!-- Resource style -->
    <link
        href="css/style.min.css"
        rel="stylesheet"
        type="text/css"
        media="all" />
    <!--     <script type="text/javascript" src="js/custom.min.js" defer></script> -->
    <script type="text/javascript" src="js/custom.js" defer></script>
    <script>
        // Defer Clickio loading
        window.addEventListener('load', function() {
            setTimeout(function() {
                var script = document.createElement('script');
                script.src = '//clickiocmp.com/t/consent_241358.js';
                script.setAttribute('importance', 'low');
                document.body.appendChild(script);
            }, 3000);
        });
    </script>
</head>

<body>
    <header class="container">
        <nav class="navbar navbar-expand-lg fixed-top">
            <div class="container">
                <a class="navbar-brand" href="/">
                    <img src="images/logo.webp" alt="CrossFit Arastur" />
                </a>
                <button
                    class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse"
                    aria-controls="navbarCollapse"
                    aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div
                    class="collapse navbar-collapse justify-content-lg-end "
                    id="navbarCollapse">
                    <ul class="navbar-nav text-white">
                        <li class="nav-item">
                            <a class="nav-link " href="servicios.php">Servicios</a>
                        </li>
                        <li class="nav-item">
                            <a
                                class="nav-link"
                                href="blog.php">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="horarios-y-tarifas.php">Horarios & Tarifas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="contacto.php">Contacto</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- /.navbar-collapse -->
    </header>