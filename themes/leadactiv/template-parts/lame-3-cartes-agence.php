<section class="lame--3--cartes-agence header-100 px-4 my-2 px-md-0 pb-4 pt-3 pt-md-5 position-relative overflow-hidden container__xl">
    <div class="container__lg text-center pb-5 pt-3 pt-md-4 mt-3">
        <?php if($args["titre_part_1"] || $args["titre_part_2"] || $args["bouton_avec_pour"]) : ?>
        <div class="d-flex justify-content-center align-items-center">
            <p class="big-title f-36 fw-500 m-0"><?php echo $args["titre_part_1"]; ?></p>
            
            <div class="toggle-button mx-3 f-18">
                <input type="radio" id="avec" name="relation" value="avec" <?php echo ($args["bouton_avec_pour"] == 'avec') ? 'checked' : ''; ?>>
                <label for="avec">avec</label>
                <input type="radio" id="pour" name="relation" value="pour" <?php echo ($args["bouton_avec_pour"] == 'pour') ? 'checked' : ''; ?>>
                <label for="pour">pour</label>
            </div>

            <p class="big-title f-36 fw-500 m-0"><?php echo $args["titre_part_2"]; ?></p>
        </div>
        <?php endif; ?>

        <?php if ($args["cartes_avec"] && $args["cartes_pour"]) : ?>
            <div class="container__lg">
                <div class="row g-4 py-5 cartes-set cartes-set-avec ">
                    <?php foreach ($args["cartes_avec"] as $carte) : ?>
                        <div class="col-md-4 d-flex">
                            <div class="lame--agence--carte text-start p-4 h-100 background-<?php echo $carte["couleur_fond"]; ?>">
                                <h4 class="small-title"><?php echo $carte["titre_carte"]; ?></h4>
                                <p class="f-16"><?php echo $carte["contenu_texte"]; ?></p>
                                <div class="card-image-container">
                                    <img class="card-image" src="<?php echo $carte["image"]['url']; ?>" alt="Card Image">
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="row g-4 py-5 cartes-set cartes-set-pour " style="display: none;">
                    <?php foreach ($args["cartes_pour"] as $carte) : ?>
                        <div class="col-md-4 d-flex">
                            <div class="lame--agence--carte text-start p-4 h-100 background-<?php echo $carte["couleur_fond"]; ?>">
                                <h4 class="small-title"><?php echo $carte["titre_carte"]; ?></h4>
                                <p class="f-16"><?php echo $carte["contenu_texte"]; ?></p>
                                <div class="card-image-container">
                                    <img class="card-image" src="<?php echo $carte["image"]['url']; ?>" alt="Card Image">
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>
