<?php
$postMetaData = ["date" => "2/15/2025", "author" => "Iván Santurio", "categories" => ["Crossfit", "Historia"], "keywords" => [
    "Orígenes del CrossFit",
    "Historia del CrossFit",
    "Greg Glassman",
    "Entrenamiento funcional",
    "CrossFit años 70",
    "California EEUU",
    "Primer centro de entrenamiento",
    "CrossFit Inc",
    "CrossFit Health",
    "CrossFit Games",
    "Boxes de CrossFit",
    "Entrenadores de CrossFit",
    "CrossFit en el mundo",
    "Mejorar condición física",
    "Calidad de vida",
    "CrossFit para niños",
    "Strongman CrossFit",
    "Gimnasia en CrossFit",
    "Departamento de policía Santa Cruz",
    "Desarrollo del CrossFit"
]];
$title = "Orígenes del Crossfit | Crossfit Arastur";
require "_partials/header.php";
?>
<main class="services-page main app form" id="main">
    <article class="post">
        <div class="featured-image-container">
            <div class="featured-image">
                <img src="../images/blog-4.webp" alt="Cuerda o soga para hacer ejercicios en el piso">
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
                <h1>Orígenes del Crossfit</h1>
                <p>Aunque en España apenas conocemos este deporte desde hace 10 años, no es una moda reciente, ya que su origen está en los años 70 en California (EEUU).</p>
                <p>Greg Glassman fue su creador, cuando decidió comenzar a desarrollar un entrenamiento funcional con el fin de mejorar la condición física de una forma más eficaz. Así, en 1995 abrió el primer centro de entrenamiento, y poco después fue extendiendo esta idea a profesionales, como el departamento de policía de Santa Cruz.</p>
                <p> En el año 2000 fundó la marca CrossFit Inc junto a la que fue su mujer, y actualmente, casi 20 años después, podemos encontrar boxes de CrossFit repartidos por todo el mundo, cuenta con entrenadores de diferentes niveles y especialidades dentro de la disciplina deportiva (kids, strongman, gymnastics…), con sus propios campeonatos del mundo (CrossFit Games), y con una línea de desarrollo fundamental denominada CrossFit Health, donde podemos comprobar que el objetivo final de este deporte es mejorar la condición física y la salud de las personas, en busca de una mejor calidad de vida.</p>
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