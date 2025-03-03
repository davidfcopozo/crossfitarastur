<?php
$postMetaData = ["date" => "2/15/2025", "author" => "Iván Santurio", "author_avatar" => "ivan_santurio.webp", "categories" => ["Crossfit", "Nomenclaturas del Crossfit"], "keywords" => [
    "WOD CrossFit",
    "Box CrossFit",
    "AMRAP CrossFit",
    "Time cap CrossFit",
    "For Time CrossFit",
    "EMOM CrossFit",
    "Nomenclatura CrossFit",
    "Workout of the Day",
    "Entrenamiento CrossFit",
    "Centros de CrossFit",
    "Formato de entrenamiento CrossFit",
    "Repeticiones en CrossFit",
    "Técnica en CrossFit",
    "Intensidad en CrossFit",
    "Calentamiento CrossFit",
    "Estiramientos CrossFit",
    "Fuerza y acondicionamiento",
    "Ritmo en CrossFit",
    "Medir rendimiento CrossFit",
    "Programación de entrenamientos CrossFit"
], "description" => "¿Qué significan WOD, box, AMRAP o time cap en CrossFit? Te explicamos la nomenclatura universal de este deporte y los formatos de entrenamiento más comunes. ¡Aprende a entender el lenguaje del CrossFit!", "img" => "que-son-wod-box-amrap-time-cap.webp", "slug" => "que-son-wod-box-amrap-time-cap"];
$title = "WOD, box, AMRAP, Time cap… ¿qué quieren decir estas palabras? | Crossfit Arastur";
require __DIR__ . "/../_partials/header.php";
?>
<main class="services-page main app form" id="main">
    <article class="post">
        <div class="featured-image-container">
            <div class="featured-image">
                <img src="../images/que-son-wod-box-amrap-time-cap.webp" alt="Folio con letras">
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
                <h1>WOD, box, AMRAP, Time cap… ¿qué quieren decir estas palabras?</h1>
                <p>En CrossFit empleamos una nomenclatura particular y universal, de tal forma que no importa el lugar al que vayas a practicar tu deporte, siempre comprenderás los entrenamientos. Te explicamos algunas de estas palabras:</p>
                <ul>
                    <li><strong>WOD</strong>: Workout of the day, es el entrenamiento del día. Normalmente las sesiones duran 1 hora, donde incluiremos el calentamiento, el trabajo principal (fuerza y/o acondicionamiento) y estiramientos finales. En una misma sesión puedes encontrarte un entrenamiento principal o varios. Recuerda, ¡cada día es diferente!</li>
                    <li><strong>Box</strong>: es la denominación de los centros dedicados a esta disciplina. En inglés box significa caja, un centro de Crossfit es como una gran caja donde encontramos todo lo necesario entre cuatro paredes y con material variado.</li>
                    <li><strong>AMRAP (As many reps as posible), For time (a tiempo) o EMOM (every minute on the minute)</strong>: son algunos de los formatos de los entrenamientos que proponemos. Unos días te pediremos que hagas todas las repeticiones que puedas en un tiempo determinado, otro día que hagas lo que se propone lo más rápido posible y otros días que te olvides del crono y te centres en la técnica y el peso.</li>
                    <li><strong>Time cap</strong>: es un límite de tiempo establecido para completar un entrenamiento o WOD (Workout of the Day). Su propósito es asegurar que los atletas mantengan un ritmo adecuado y que el entrenamiento se ajuste a los objetivos de intensidad y duración deseados. Si un atleta no completa el WOD dentro del time cap, se registra el trabajo realizado hasta ese momento, junto con el tiempo límite alcanzado. Esto ayuda a medir el rendimiento y a mantener la consistencia en la programación de los entrenamientos.</li>
                </ul>
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