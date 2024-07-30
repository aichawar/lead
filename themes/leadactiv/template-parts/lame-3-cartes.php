<section class="lame--3--cartes padding-80 mt-6 position-relative">
    <div class="container__lg">
        <div class="text-center">
            <?php if($args["etiquette"]) : ?>
                <h3 class="tag tag-big mb-3 text-white"><?php echo $args["etiquette"]; ?></h3>
            <?php endif; ?>

            <?php if($args["titre_3_cartes"]) :
                $titre = $args["titre_3_cartes"];
                $titre_parts = preg_split('/\s+/', $titre);
                $part_count = count($titre_parts);
            ?>

            <h2 class="big-title f-72 text-white d-flex justify-content-center align-items-center flex-wrap mx-md-5" >
                <?php for ($i = 0; $i < $part_count; $i++) : ?>
                    <span class="<?php echo $i > 0 ? 'ms-md-3 ms-sm-2' : ''; ?>">
                        <p class="d-inline"><?php echo $titre_parts[$i]; ?></p>
                    </span>
                    <?php if ($i == 0 && !empty($args["title_images"])) : ?>
                        <div class="title-images d-flex ms-md-4 ms-ms-2 me-2 me-sm-1">
                            <?php foreach ($args["title_images"] as $image_circulaire) : ?>
                                <?php if ($image_circulaire['image_circulaire']) : ?>
                                    <figure class="title-image-figure">
                                        <img src="<?php echo $image_circulaire['image_circulaire']['url']; ?>" alt="<?php echo $image_circulaire['image_circulaire']['alt']; ?>" class="mx-auto">
                                    </figure>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                <?php endfor; ?>
            </h2>
            <?php endif; ?>

            <?php if ($args["bouton"]) : ?>
                <a class="btn btn-purple-black mt-5 mb-4" target="<?php echo $args["bouton"]["target"]; ?>" href="<?php echo $args["bouton"]["url"]; ?>"><?php echo $args["bouton"]["title"]; ?></a>
            <?php endif; ?>

            <?php if ($args["cartes"]) : ?>                
                <div class="row g-4 py-4">
                    <?php foreach ($args["cartes"] as $carte) : ?>
                        <div class="col-12 col-md-6 col-lg-4 md-flex">
                            <div class="lame--3--cartes--carte d-inline-block text-start background-<?php echo $carte["couleur_fond"]; ?>" >
                                <div class="lame--3--cartes--carte--inner">
                                    <?php if ($carte["titre_carte"]) : ?>
                                        <p class="f-36 mb-4"><?php echo $carte["titre_carte"]; ?></>
                                    <?php endif; ?>
                                    <?php if ($carte["contenu_texte"]) : ?>
                                        <p class='f-16'><?php echo $carte["contenu_texte"]; ?></p>
                                    <?php endif; ?>
                                    <?php if ($carte["last-sentence"]) : ?>
                                        <div class="last-sentence-container">
                                            <p class="last-sentence f-20"><?php echo $carte["last-sentence"]; ?></p>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>                
            <?php endif; ?>
        </div>
    </div>
</section>
