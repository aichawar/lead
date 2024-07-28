<section class="lame--3--cartes pb-5 pt-5 mt-5 position-relative container__lg">

    <div class="text-center pb-5 pt-3 pt-md-4 mt-3">
            <?php if($args["etiquette"]) : ?>
                <h3 class="tag tag-big mb-3 text-white"><?php echo $args["etiquette"]; ?></h3>
            <?php endif; ?>

            <?php if($args["titre_3_cartes"]) :
                $titre = $args["titre_3_cartes"];
                // Diviser le titre en parties individuelles par mots
                $titre_parts = preg_split('/\s+/', $titre);
                $part_count = count($titre_parts);
            ?>

            <h2 class="big-title f-72 text-white d-flex justify-content-center align-items-center flex-wrap" style="padding: 0 15%;">
                <?php for ($i = 0; $i < $part_count; $i++) : ?>
                    <span class="<?php echo $i > 0 ? 'ms-3' : ' '; ?>">
                        <p class="d-inline"><?php echo $titre_parts[$i]; ?></p>
                    </span>
                    <?php if ($i == 0 && !empty($args["title_images"])) : ?>
                        <div class="title-images d-flex ms-4 me-2">
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
                <a class="btn btn-purple-black mt-4 mb-4" target="<?php echo $args["bouton"]["target"]; ?>" href="<?php echo $args["bouton"]["url"]; ?>"><?php echo $args["bouton"]["title"]; ?></a>
            <?php endif; ?>
        <?php if ($args["cartes"]) : ?>
            <div class="lame-3carte-margin">
                <div class="row g-1 py-4">
                    <?php foreach ($args["cartes"] as $carte) : ?>
                        <div class="col-md-4 d-flex">
                            <div class="lame--3--cartes--carte text-start background-<?php echo $carte["couleur_fond"]; ?>" style="background-image: url('<?php echo $carte["image"]['url']; ?>');">
                                <div class="lame--3--cartes--carte--inner">
                                    <?php if ($carte["titre_carte"]) : ?>
                                        <h4 class="small-title"><?php echo $carte["titre_carte"]; ?></h4>
                                    <?php endif; ?>
                                    <?php if ($carte["contenu_texte"]) : ?>
                                        <p class='f-16' ><?php echo $carte["contenu_texte"]; ?></p>
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
            </div>
        <?php endif; ?>
    </div>
</section>
