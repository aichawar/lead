<?php
/*
    Template Name: Page agence
*/

get_header();

$group_64a52fac35b7b = acf_get_fields('group_64a52fac35b7b');
$group_64b8fb3b67d5f = acf_get_fields('group_64b8fb3b67d5f');


$entete = [];
$blocs = [];

foreach (is_array($group_64a52fac35b7b) ? $group_64a52fac35b7b : [] as $field) {
    if (trim($field['name']) != '')
        $entete[$field['name']] = get_field($field['key']);
}

foreach (is_array($group_64b8fb3b67d5f) ? $group_64b8fb3b67d5f : [] as $field) {
    if (trim($field['name']) != '')
        $blocs[$field['name']] = get_field($field['key']);
}

?>


<main class="page__agence ">
<section class="page__home--header page__methode--header--top position-relative bg-light-purple align-items-center overflow-hidden">
    <div class="container__xl">
        <div class="row align-items-center pt-5 mx-5 h-100">
            <div class="col-md-8 pt-5 mt-5">
                <h2 class=" my-3 f-56 mb-4 pt-5">
                    <?php echo $entete["titre"] ?>
                </h2>
                <?php if ($entete["mention_dessous"]): ?>
                    <p class="py-3 text-dark"><?php echo $entete["mention_dessous"]; ?></p>
                <?php endif; ?>
            </div>
            <div class="col-md-4 d-flex justify-content-end position-relative">
                <?php if ($entete["image"]): ?>
                    <div class="image-c">
                        <img src="<?php echo $entete["image"]["url"] ?>"
                            alt="<?php echo $entete["image"]["alt"] ?>">
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

   
        <?php if (count($blocs["lames_contenu"]) >= 1): ?>
            <?php $cpt = 0;
            foreach (is_array($blocs["lames_contenu"]) ? $blocs["lames_contenu"] : [] as $bloc):
                $cpt++; ?>
                <?php switch ($bloc['acf_fc_layout']):

                    case 'lame_chiffres': ?>
                        <section class="bg-dark-green text-white">
                            <div class="container__lg">
                                <?php echo do_shortcode('[lame-chiffres id=' . get_the_ID() . ']') ?>
                            </div>
                            </section>
                        <?php break; ?>

                        <?php case 'lame_3_cartes': ?>
                            <section class="bg-white">
                                <?php get_template_part('template-parts/lame', '3-cartes-agence', $bloc) ?>                                
                            </section>
                        <?php break; ?>

                        <?php case 'lame_equipe': ?>
                            <section class="container__lg">
                                <div class="page__agence--equipe text-center">
                                    <div class=" mx-2 py-3 py-md-5">
                                        <?php if ($bloc["titre"]): ?>
                                            <h2 class="py-4 f-36"><?php echo $bloc["titre"] ?></h2>
                                        <?php endif; ?>

                                        <?php if (count($bloc["equipe"]) >= 1): ?>
                                            <div class="row justify-content-center">
                                                <?php
                                                $count = 0;
                                                foreach (is_array($bloc["equipe"]) ? $bloc["equipe"] : [] as $membre): ?>
                                                    <?php
                                                    // Determine the color based on position
                                                    $rowIndex = floor($count / 4);
                                                    $columnIndex = $count % 4;
                                                    $colorIndex = ($rowIndex % 2 == 0) ? $columnIndex % 2 : ($columnIndex % 2 == 0 ? 1 : 0);
                                                    $colors = ['violet', 'gren'];
                                                    $color = $colors[$colorIndex];
                                                    ?>
                                                    <div class="col-lg-3 col-md-4 col-sm-6 mb-4 justify-content-center">
                                                        <div class="page__agence--equipe--membre card-<?php echo $color; ?> text-center p-3 h-100">
                                                            <?php if ($membre["photo_profile"]): ?>
                                                                <img class="background-image" src="<?php echo $membre["photo_profile"]["url"] ?>" alt="<?php echo $membre["prenom_et_nom"] ?>">
                                                            <?php endif; ?>
                                                            <div class="card-footer">
                                                                <span class="tag-<?php echo $color; ?> d-inline-block">
                                                                    <?php if ($membre["lien_linkedin"]): ?>
                                                                        <a href="<?php echo $membre["lien_linkedin"]["url"] ?>" target="_blank">
                                                                            <?php echo $membre["prenom_et_nom"] ?>
                                                                        </a>
                                                                    <?php else: ?>
                                                                        <?php echo $membre["prenom_et_nom"] ?>
                                                                    <?php endif; ?>
                                                                </span>
                                                                <?php if ($membre["poste_occupe"]): ?>
                                                                    <span class="tag-orange d-inline-block">
                                                                        <?php echo $membre["poste_occupe"] ?>
                                                                    </span>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php $count++; ?>
                                                <?php endforeach; ?>

                                                <?php while ($count % 4 != 0): ?>
                                                    <?php
                                                    // Determine the color for placeholder cards
                                                    $rowIndex = floor($count / 4);
                                                    $columnIndex = $count % 4;
                                                    $colorIndex = ($rowIndex % 2 == 0) ? $columnIndex % 2 : ($columnIndex % 2 == 0 ? 1 : 0);
                                                    $color = $colors[$colorIndex];
                                                    ?>
                                                    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                                                        <div class="page__agence--equipe--membre placeholder-card card-<?php echo $color; ?> text-center p-3 h-100">
                                                        </div>
                                                    </div>
                                                    <?php $count++; ?>
                                                <?php endwhile; ?>
                                            </div>
                                            <div class="text-center pt-4">
                                                <a class="btn btn-purple-black mb-4 px-4 mx-auto" href="contact_url">Prendre rendez-vous</a>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </section>    
                        <?php break; ?>
                    <?php case 'lame_etudes_cas': ?>
                        <section class="bg-light-gray">
                         <?php echo get_template_part('template-parts/lame', 'etude-cas', ['bloc' => $bloc]) ?>
                        </section>                       
                    <?php break; ?>

                        <?php case 'lame_evolution': ?>
                        <div class="container__lg ">
                            <div class="page__agence--evolution--haut text-center pt-5 justify-content-between align-items-center">
                                <?php if ($bloc["etiquette"]): ?>
                                    <h3 class="tag tag-big mt-4 mb-2"><?php echo $bloc["etiquette"] ?></h3>
                                <?php endif; ?>

                                <?php if ($bloc["titre"]): ?>
                                    <h2 class="py-4 big-title f-56"><?php echo $bloc["titre"] ?></h2>
                                <?php endif; ?>
                            </div>
                            <div class="page__agence--evolution--dates text-center py-4 justify-content-center">
                                <div class="navigation">
                                    <button id="prev" class="nav-arrow"></button>
                                    <?php $cpt = 0;
                                    foreach ($bloc["cartes"] as $carte): ?>
                                        <button class="btn date-btn mx-2" data-date="<?php echo $cpt; ?>"><?php echo $carte["date"]; ?></button>
                                        <?php $cpt++; ?>
                                    <?php endforeach; ?>
                                    <button id="next" class="nav-arrow"></button>
                                </div>
                            </div>
                            <div class="page__agence--evolution--bas py-5 scroll-container ">
                                <div class="cards-container-evolution px-4 position-relative">
                                    <?php $cpt = 0;
                                    foreach ($bloc["cartes"] as $carte): ?>
                                        <div class="justify-content-center g-3 cards cards-<?php echo $cpt; ?>" data-index="<?php echo $cpt; ?>">
                                            <div class="col-lg-4 col-md-6 mb-4 d-flex justify-content-center">
                                                <div class="card card-evolution text-start p-4 h-100 position-relative">
                                                    <div class="position-absolute top-0 end-0 p-2 mx-2">
                                                        <p class="tag tag-light-purple px-3 "><?php echo $carte["evolution_collaborateurs"]; ?>%</p>
                                                    </div>
                                                    <p class="card-title fw-500 mb-2">Nombre de collaborateurs</p>
                                                    <p class="card-content text-black  collaborateurs  mb-4"><?php echo $carte["nombre_collaborateurs"]; ?></p>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 mb-4 d-flex justify-content-center">
                                                <div class="card card-evolution text-start p-4 h-100 position-relative">
                                                    <div class="position-absolute top-0 end-0 p-2 mx-2">
                                                        <p class="tag tag-light-purple px-3 "><?php echo $carte["evolution_clients"]; ?>%</p>
                                                    </div>
                                                    <p class="card-title fw-500 mb-2 text-black">Clients accompagnés</p>
                                                    <p class="card-content text-black clients mb-4"><?php echo $carte["clients_accompagnes"]; ?></p>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 mb-4 d-flex justify-content-center">
                                                <div class=" card card-evolution text-start p-4 h-100 position-relative">
                                                    <div class="position-absolute top-0 end-0 p-2 ">
                                                        <p class="tag tag-light-purple px-3 text-black"><?php echo $carte["evolution_ca"]; ?>%</p>
                                                    </div>
                                                    <p class="card-title fw-500 mb-2">CA réalisé</p>
                                                    <p class="card-content text-black ca mb-4"><?php echo $carte["ca_realise"]; ?>€</p>
                                                </div>
                                            </div>
                                        </div>
                                        <?php $cpt++; ?>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <div class="text-center pt-4">
                                <a class="btn btn-purple-black mb-4 px-4 mx-auto" href="contact_url">Prendre rendez-vous</a>
                            </div>
                        </div>
                    <?php break; ?>

                <?php endswitch; ?>
            <?php endforeach; ?>
        <?php endif; ?>

    <div class="cta-section">
        <h2 class="cta-title">
            <span class="light-text">Nous prospectons,</span>
            <br>
            <strong>vous vendez</strong>
        </h2>
        <div class="cta-buttons">
            <a href="<?php echo home_url('/prendre-rendez-vous/'); ?>" class="btn color-btn-dark">Prendre
                rendez-vous</a>
            <a href="<?php echo home_url('/contact/'); ?>" class="btn btn-purple-black">Nous contacter</a>
        </div>
    </div>
</main>






<?php the_content(); ?>

<?php
get_footer();