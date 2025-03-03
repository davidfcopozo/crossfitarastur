<?php
$postMetaData = ["date" => "2/15/2025", "author" => "Marta Puchan", "author_avatar" => "marta_puchan.webp", "categories" => ["Crossfit", "Principiante"], "keywords" => [
    "CrossFit Zaragoza",
    "Primera clase de CrossFit",
    "Consejos para principiantes",
    "Entrenadores de CrossFit",
    "Energía y motivación",
    "Nervios primera clase",
    "Adaptación al CrossFit",
    "Ropa deportiva CrossFit",
    "Zapatillas CrossFit",
    "CrossFit Arastur",
    "Entrenamiento intenso",
    "Inicio suave en CrossFit",
    "Condición física inicial",
    "Deporte en Zaragoza",
    "Estímulos de entrenamiento",
    "Superar incertidumbre",
    "Clases adaptadas",
    "Experiencia en CrossFit",
    "Pedir cita CrossFit",
    "Motivación para entrenar"
], "description" => "Descubre cómo afrontar tu primera clase de CrossFit en Zaragoza con energía y motivación. Consejos para principiantes, la importancia de los entrenadores y todo lo que necesitas saber para empezar. ¡Te esperamos en CrossFit Arastur!", "img" => "como-afrontar-primera-clase-de-crossfit.webp", "slug" => "como-afrontar-primera-clase-de-crossfit"];
$title = "¿Cómo afrontar mi primera clase de crossfit? | Crossfit Arastur";
require __DIR__ . "/../_partials/header.php";
?>
<main class="services-page main app form" id="main">
    <article class="post">
        <div class="featured-image-container">
            <div class="featured-image">

                <img src="/../images/como-afrontar-primera-clase-de-crossfit.webp" alt="Chica de espalda supervisando clase de crossfit">
            </div>
        </div>
        </div>


        <div class="post-content-wrapper">
            <div class="post-meta">
                <time datetime="<?php echo $postMetaData['date']; ?>">
                    <?php
                    $dateObj = new DateTime('@' . strtotime($postMetaData['date']));
                    $dateObj->setTimezone(new DateTimeZone('Europe/Madrid'));
                    $months = ['', 'enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre'];
                    echo ' ' . $dateObj->format('j') . ' de ' . $months[(int)$dateObj->format('n')] . ' de ' . $dateObj->format('Y');
                    ?>
                </time>
                <span class="author">Por <?php echo htmlspecialchars($postMetaData['author']); ?></span>
            </div>

            <div class="post-content">
                <h1>¿Cómo afrontar mi primera clase de crossfit?</h1>
                <p>Muy sencillo: con energía, motivación y siguiendo los consejos de nuestros entrenadores.
                    Todos hemos pasado por ese momento de nervios e incertidumbre, de pensar que esto no es para nosotros, de creer que no voy a ser capaz de terminarla, o peor aún, de si podré seguir el ritmo de las siguientes clases. La respuesta es SÍ, PUEDES HACERLO. Así que a partir de ahora, respira y relájate a la vez que continúas leyendo.</p>
                <p>CrossFit es una actividad intensa, pero no pienses que vas a empezar al 100%, todo lo contrario, el inicio es suave y adaptado a la condición de cada uno, por eso es muy importante que te dejes guiar por los entrenadores, te aseguramos que tienen mucha experiencia y saben qué es mejor para afrontar las primeras sesiones. Puede ser que vengas de practicar otro deporte, pero piensa que esto es algo nuevo para tu cuerpo, así que tienes que dejarle que se adapte a los estímulos de entrenamiento.</p>
                <p>Así que solo te faltan unas zapatillas y ropa deportiva cómoda, pedir cita, y ¡te esperamos en CrossFit Arastur!.</p>
            </div>

            <div class="post-categories">
                <?php foreach ($postMetaData['categories'] as $category): ?>
                    <span class="category"><?php echo htmlspecialchars($category); ?></span>
                <?php endforeach; ?>
            </div>
        </div>
    </article>
</main>

<?php require __DIR__ . "/../_partials/footer.php"; ?>