<?php
require __DIR__ . "/../config.php";
$noIndex = isset($noIndex) ? $noIndex : false;
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script defer>
        // Defer Clickio loading
        window.addEventListener('load', function() {
            setTimeout(function() {
                var script = document.createElement('script');
                script.src = '//clickiocmp.com/t/consent_241358.js';
                script.setAttribute('importance', 'low');
                document.body.appendChild(script);
            }, 3000);
        });

        // Setup dataLayer globally
        window.dataLayer = window.dataLayer || [];

        // Initialize GA with consent mode
        function gtag() {
            dataLayer.push(arguments);
        }
        window.gtag = gtag;

        // Initialize GA in consent mode (no cookies until consent)
        gtag('js', new Date());
        gtag('consent', 'default', {
            'analytics_storage': 'denied',
            'ad_storage': 'denied'
        });
        gtag('config', 'G-ZEF11W329M', {
            'send_page_view': false
        });

        // Function to load Google Analytics
        function loadGoogleAnalytics() {
            if (!document.getElementById('ga-script')) {
                console.log('Loading Google Analytics script');
                // Create and load the GA script
                var gaScript = document.createElement('script');
                gaScript.id = 'ga-script';
                gaScript.src = 'https://www.googletagmanager.com/gtag/js?id=G-ZEF11W329M';
                gaScript.async = true;
                document.head.appendChild(gaScript);

                // Send initial pageview after script loads
                gaScript.onload = function() {
                    console.log('GA script loaded, updating consent and sending pageview');
                    updateConsentState();
                };
            } else {
                updateConsentState();
            }
        }

        // Update consent state based on user choice
        function updateConsentState() {
            let consentData = localStorage.getItem("lxGconsent__v2");
            if (consentData) {
                try {
                    consentData = JSON.parse(consentData);
                    if (consentData && consentData.cls_val) {
                        let consentArray = consentData.cls_val.split("|");
                        if (consentArray.length > 14) {
                            let consentFlags = consentArray[14].split("").map(e => e - 0);
                            let analyticsGranted = consentFlags[1] === 1;

                            console.log('Analytics consent:', analyticsGranted ? 'granted' : 'denied');

                            // Update consent state
                            gtag('consent', 'update', {
                                'analytics_storage': analyticsGranted ? 'granted' : 'denied'
                            });

                            // Send pageview if consent granted
                            if (analyticsGranted) {
                                console.log('Sending pageview');
                                gtag('config', 'G-ZEF11W329M', {
                                    'send_page_view': true
                                });
                            }
                        }
                    }
                } catch (e) {
                    console.error("Error parsing consent data", e);
                }
            }
        }

        // Check Clickio consent status
        function checkConsentStatus() {
            let consentData = localStorage.getItem("lxGconsent__v2");
            if (consentData) {
                if (!document.getElementById('ga-script')) {
                    loadGoogleAnalytics();
                } else {
                    updateConsentState();
                }
            }
        }

        // Load GA script immediately but in consent mode
        loadGoogleAnalytics();

        // Watch for changes in localStorage for consent updates
        window.addEventListener('storage', function(e) {
            if (e.key === 'lxGconsent__v2') {
                console.log('Consent changed, checking status');
                checkConsentStatus();
            }
        });

        // Check on page load
        window.addEventListener('load', checkConsentStatus);

        // Create a custom event for Clickio consent manager
        window.addEventListener('message', function(event) {
            if (event.data && event.data.type === 'consent_update') {
                console.log('Consent update message received');
                checkConsentStatus();
            }
        });

        // Also check periodically (Clickio might update without storage event)
        setInterval(checkConsentStatus, 2000);

        // Add a global function that can be called from Clickio CMP
        window.updateAnalyticsConsent = function() {
            console.log('Manual consent update requested');
            checkConsentStatus();
        };
    </script>
    <?php if ($noIndex): ?>
        <meta name="robots" content="noindex, nofollow">
    <?php endif; ?>
    <?php if (isset($postMetaData["author"])): ?>
        <meta name="author" content="<?php echo $postMetaData["author"]; ?>">
    <?php endif; ?>
    <?php
    if (isset($postMetaData["keywords"])) {
        echo '<meta name="keywords" content="' . implode(', ', $postMetaData['keywords']) . '">';
    } else {
        echo '<meta name="keywords" content="readaptacion deportiva, entrenamientos personales, CrossFit, ejercicios funcionales, box, RX, escalado, salud, crossfit zaragoza, crossfit aragon, be cool crossfit zaragoza, becool crossfit zaragoza, box crossfit zaragoza, cross fit zaragoza, crossfit en zaragoza, crossfit eolo zaragoza, crossfit hiberus zaragoza, crossfit reebok zaragoza,crossfit rocalla zaragoza, crossfit zaragoza centro, crossfit zaragoza las fuentes, crossfit zaragoza precio, crossfit zgz, gimnasio crossfit zaragoza, hammerbox zaragoza, kronos crossfit zaragoza, reebok crossfit zaragoza, zaragoza crossfit" />';
    }
    ?>
    <?php
    if (isset($postMetaData["description"])) {
        echo '<meta name="description" content="' .  $postMetaData['description'] . '">';
    } else {
        echo '<meta
        name="description"
        content="CossFit Arastur es el único box de Aragón que cuenta con un servicio de readaptación deportiva integrado en el centro." />';
    }
    ?>
    <?php

    if (!empty($postMetaData)) {
        // Convert date to ISO format (YYYY-MM-DD)
        $isoDate = DateTime::createFromFormat('m/d/Y', $postMetaData['date'])->format('Y-m-d');

        $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
        $baseUrl = $protocol . "://" . $_SERVER['HTTP_HOST'] . "/";

        $wordCount = 0;
        if (isset($postMetaData['content'])) {
            $wordCount = str_word_count(strip_tags($postMetaData['content']));
        }

        $schemaMarkup = [
            "@context" => "https://schema.org",
            "@type" => "BlogPosting",
            "headline" => $postMetaData['title'] ?? "¿Cómo afrontar tu primera clase de CrossFit en Zaragoza?",
            "description" => $postMetaData['description'],
            "datePublished" => $isoDate,
            "author" => [
                "@type" => "Person",
                "name" => $postMetaData['author'],
                "image" => $baseUrl . "images/" . ($postMetaData['author_avatar'] ?? "default-avatar.webp")
            ],
            "image" => [
                "@type" => "ImageObject",
                "url" => $baseUrl . "images/" . $postMetaData['img'],
                "width" => "1200",
                "height" => "630"
            ],
            "publisher" => [
                "@type" => "Organization",
                "name" => "CrossFit Arastur",
                "logo" => [
                    "@type" => "ImageObject",
                    "url" => $baseUrl . "images/logo.webp",
                    "width" => "600",
                    "height" => "60"
                ]
            ],
            "mainEntityOfPage" => [
                "@type" => "WebPage",
                "@id" => $baseUrl . ($postMetaData['slug'] ?? "blog")
            ],
            "keywords" => $postMetaData['keywords'],
            "articleSection" => $postMetaData['categories'],
            "wordCount" => (string)$wordCount
        ];

        $jsonLd = json_encode($schemaMarkup, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);

        echo "<script type=\"application/ld+json\">\n";
        echo $jsonLd;
        echo "\n</script>\n";
    }
    ?>

    <link rel="preconnect" href="//clickiocmp.com">
    <link rel="dns-prefetch" href="//clickiocmp.com">
    <title><?php echo $title; ?></title>
    <link rel="icon" href="favicon.ico" type="image/png" />


    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <script src="/js/bootstrap.min.js" defer></script>
    <!-- FONTS -->
    <link rel="preload" href="/fonts/bebas-neue-regular.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/montserrat-v29-latin-regular.woff2" as="font" type="font/woff2" crossorigin>
    <script
        src="https://kit.fontawesome.com/a163031abf.js"
        crossorigin="anonymous" defer></script>
    <!-- Resource style -->
    <link
        href="/css/style.min.css"
        rel="stylesheet"
        type="text/css" />

    <script src="/js/custom.min.js" defer></script>


</head>

<body>
    <header class="container">
        <nav class="navbar navbar-expand-lg fixed-top">
            <div class="container">
                <a class="navbar-brand" href="/">
                    <img src="/images/logo.webp" alt="CrossFit Arastur" />
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
                            <a class="nav-link " href="servicios.php" area-label="Servicios">Servicios</a>
                        </li>
                        <li class="nav-item">
                            <a
                                class="nav-link"
                                href="blog.php" area-label="Blog">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="horarios-y-tarifas.php" area-label="Horarios & Tarifas">Horarios & Tarifas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="contacto.php" area-label="Contacto">Contacto</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- /.navbar-collapse -->
    </header>