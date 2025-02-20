<?php
$postMetaData = ["date" => "2/15/2025", "author" => "Marta Puchan", "categories" => ["Crossfit", "Principiante"]];
$title = "¿Cómo afrontar mi primera clase de crossfit? | Crossfit Arastur";
require "_partials/header.php";
?>
<main class="services-page main app form" id="main">
    <article class="post">
        <div class="featured-image-container">
            <div class="featured-image">

                <img src="../images/crossfit_arastur_primera_clase.webp" alt="Chica de espalda supervisando clase de crossfit">
            </div>
        </div>
        </div>


        <div class="post-content-wrapper">
            <div class="post-meta">
                <time datetime="<?php echo $postMetaData['date']; ?>">
                    <?php
                    setlocale(LC_TIME, "es_ES.UTF-8", "es_ES", "Spanish_Spain");
                    $date = strtotime($postMetaData['date']);
                    echo strftime(" %d de %B de %Y", $date);
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

<?php require "_partials/footer.php"; ?>