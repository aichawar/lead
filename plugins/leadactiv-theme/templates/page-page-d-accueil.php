<?php
/*
    Template Name: Page d'accueil
*/

get_header();

$group_64a2c4a324ad5 = acf_get_fields('group_64a2c4a324ad5');
$group_64b8fb2d1d0bc = acf_get_fields('group_64b8fb2d1d0bc');

$entete = [];
$blocs = [];

foreach (is_array($group_64a2c4a324ad5) ? $group_64a2c4a324ad5 : [] as $field) {
    if (trim($field['name']) != '')
        $entete[$field['name']] = get_field($field['key']);
}

foreach (is_array($group_64b8fb2d1d0bc) ? $group_64b8fb2d1d0bc : [] as $field) {
    if (trim($field['name']) != '')
        $blocs[$field['name']] = get_field($field['key']);
}

$count_total_lame_50 = 0;
$count_lame_50 = 0;

foreach (is_array($blocs["lames_contenu"]) ? $blocs["lames_contenu"] : [] as $bloc) {
    if ($bloc["acf_fc_layout"] == "lame_50_image_50_texte") {
        $count_total_lame_50++;
    }
}

?>

<main class="page__home container__xl">
    <section class=" container__lg headerposition-relative bg-dark-green d-flex align-items-center">
        <div class="h100">
            <div class="row align-items-center pt-2">
                <div div class="col-md-10">
                    <?php if ($entete["mention_dessus_slogan"]): ?>
                        <p class="tag text-white my-3"><?php echo $entete["mention_dessus_slogan"] ?></>
                        <?php endif; ?>
                        <?php if ($entete["slogan"]): ?>
                        <h1 class="title-big-home mb-3 position-relative text-white ">
                            <?php echo $entete["slogan"] ?>
                        </h1>
                    <?php endif; ?>
                    <?php if ($entete["mention_dessous_violette"] || $entete["mention_dessous_noire"]): ?>
                        <p class="my-3 text-white">

                            <?php if ($entete["mention_dessous_violette"]): ?>
                                <span class="typedjs fw-medium"
                                    data-phrase="<?php $cpt = 0;
                                    foreach ($entete["mention_dessous_violette"] as $mention):
                                        echo $mention["mention"];
                                        echo ($cpt != count($entete["mention_dessous_violette"])) ? ';;' : ''; ?><?php $cpt++; endforeach; ?>"></span>
                            <?php endif; ?>

                            <?php if ($entete["mention_dessous_noire"]): ?>
                                <?php echo $entete["mention_dessous_noire"]; ?>
                            <?php endif; ?>
                        </p>
                    <?php endif; ?>

                    <?php if ($entete["lien"]): ?>
                        <a class="btn btn-purple-black" target="<?php echo $entete["lien"]["target"] ?>"
                            href="<?php echo $entete["lien"]["url"] ?>"><?php echo $entete["lien"]["title"] ?></a>
                    <?php endif; ?>
                </div>
                <div class="col-md-2">
                </div>
            </div>
        </div>
        <div class="container__md"></div>
        <div class="col-md-6 align-items-bottom">
            <img src=".\wp-content\uploads\2024\07\3-Fleche_violet.svg" alt="Image" class="">
        </div>
    </section>

    <?php $cpt = 0;
    foreach (is_array($blocs["lames_contenu"]) ? $blocs["lames_contenu"] : [] as $bloc):
        $cpt++; ?>
        <?php switch ($bloc['acf_fc_layout']):

            case 'lame_chiffres': ?>
                <section class="page__home--chiffres bg-light-purple text-black">
                    <?php echo do_shortcode('[lame-chiffres id=' . get_the_ID() . ']') ?>
                </section>
                <?php break; ?>
            <?php case 'lame_methode': ?>
                <section class="page__home--methode my-5 py-4" id="decouvrir">
                    <div class="container__lg pt-5 pb-5 ">
                        <div class="row">
                            <div class="col-md-8">
                                <?php if ($bloc["etiquette"]): ?>
                                    <h3 class="tag text-method--page my-3"><?php echo $bloc["etiquette"] ?></h3>
                                <?php endif; ?>

                                <?php if ($bloc["titre"]): ?>
                                    <h2 class="mb-4 f-56"><?php echo $bloc["titre"] ?></h2>
                                <?php endif; ?>
                                <?php if ($bloc["mention_dessous_titre"]): ?>
                                    <div class="mb-3 f-18"><?php echo $bloc["mention_dessous_titre"] ?></div>
                                <?php endif; ?>
                                <?php if ($bloc["lien_methodes"]): ?>
                                    <a class="btn color-btn-dark my-4 px-3 py-3" target="<?php echo $bloc["lien_methodes"]["target"] ?>"
                                        href="<?php echo $bloc["lien_methodes"]["url"] ?>"><?php echo $bloc["lien_methodes"]["title"] ?></a>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-4">
                                <div class="row g-4">
                                    <?php $cpt = 0 ?>
                                    <?php foreach (is_array($bloc["cartes"]) ? $bloc["cartes"] : [] as $carte): ?>
                                        <div class="col-12 mb-2">
                                            <div class="page__home--methode--bottom--carte carte-<?php echo $cpt % 2 ?> p-4 mx-5">
                                                <?php if ($carte["categories_cartes"]): ?>
                                                    <h3
                                                        class="tag f-14 mb-4 <?php echo strtolower(str_replace(' ', '-', $carte["categories_cartes"])); ?>">
                                                        <?php echo $carte["categories_cartes"] ?></h3>
                                                <?php endif; ?>
                                                <?php if ($carte["titre_carte"]): ?>
                                                    <p class="f-20 my-1 mb-3"> <?php echo $carte["titre_carte"] ?></p>
                                                <?php endif; ?>
                                                <?php if ($carte["contenu_texte"]): ?>
                                                    <div class="text-start f-16 mb-3">
                                                        <?php echo $carte["contenu_texte"] ?>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <?php $cpt++ ?>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <?php break; ?>

            <?php case 'lame_50_image_50_texte': ?>
                <?php if ($count_lame_50 == 0): ?>
                    <section class="page__home--50--50">
                        <div class="row">
                            <?php endif; ?>
                            <div class="container__lg px-5">
                                <div class="card mb-4 background-<?php echo $bloc["couleur_titre"] ?>">
                                    <div
                                        class="row align-items-top <?php echo ($bloc["disposition"] != "gauche") ? "flex-md-row-reverse" : "" ?>">
                                        <div class="col-md-6 px-5 my-2 text-container">
                                            <h2 class="title_big"><?php echo $bloc["titre"] ?></h2>
                                            <?php if ($bloc["contenu_texte"]): ?>
                                                <p class="f-18"><?php echo $bloc["contenu_texte"] ?></p>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-md-6 d-flex ">
                                            <figure class="image-background">
                                                <img src="<?php echo $bloc["image"]["url"] ?>" alt="<?php echo $bloc["image"]["alt"] ?>"
                                                    class="">
                                            </figure>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php if ($count_lame_50 == $count_total_lame_50): ?>
                        </div>
                    </section>
                <?php endif; ?>
                <?php $count_lame_50++; ?>
                <?php break; ?>



            <?php case 'lame_etudes_cas': ?>
                <?php echo get_template_part('template-parts/lame', 'etude-cas', ['bloc' => $bloc]) ?>
                <?php break; ?>

            <?php case 'lame_partenaires': ?>
                <?php echo get_template_part('template-parts/lame', 'partenaires', $bloc) ?>
                <?php break; ?>

            <?php case 'lame_3_cartes': ?>
                    <?php get_template_part('template-parts/lame', '3-cartes', $bloc) ?>
                <?php break; ?>

            <?php case 'lame_faq': ?>
                <div class="container-xl px-5">
                    <div class="faq-section">
                        <div class="row">
                            <div class=" col-2 col-md-3 pe-5">
                                <?php if ($bloc["etiquette"]): ?>
                                    <h3 class="tag tag-big faq-tag my-2"><?php echo $bloc["etiquette"] ?></h3>
                                <?php endif; ?>

                                <?php if ($bloc["titre"]): ?>
                                    <h2 class="faq-title pt-3 pb-4"><?php echo $bloc["titre"] ?></h2>
                                <?php endif; ?>
                            </div>
                            <div class="col-9 col-md-9 ps-5">
                                <?php if (count($bloc["questions_frequemment_posees"]) > 1): ?>
                                    <div class="accordion my-4" id="accordionFaq">
                                        <?php $cpt = 0 ?>
                                        <?php foreach (is_array($bloc["questions_frequemment_posees"]) ? $bloc["questions_frequemment_posees"] : [] as $question): ?>
                                            <div class="accordion-item py-2">
                                                <p class="accordion-header f-20" id="heading-<?php echo $cpt ?>">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                        data-bs-target="#collapse-<?php echo $cpt ?>" aria-expanded="true"
                                                        aria-controls="collapse-<?php echo $cpt ?>">
                                                        <?php echo $question["question"] ?>
                                                    </button>
                                                </p>
                                                <div id="collapse-<?php echo $cpt ?>" class="accordion-collapse collapse"
                                                    aria-labelledby="heading-<?php echo $cpt ?>" data-bs-parent="#accordionFaq">
                                                    <div class="accordion-body">
                                                        <?php echo $question["reponse"] ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php $cpt++ ?>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>

                    </div>
                </div>
                <?php break; ?>

        <?php endswitch ?>

    <?php endforeach; ?>
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