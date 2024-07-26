<?php
/*
    Template Name: Page services
*/

get_header();

$group_64a2c4a324ad5 = acf_get_fields('group_64a2c4a324ad5');
$group_64b8fb2d1d0bc = acf_get_fields('group_64b8fb2d1d0bc');

$entete = [];
$blocs = [];

foreach(is_array($group_64a2c4a324ad5) ? $group_64a2c4a324ad5 : [] as $field) {
    if(trim($field['name']) != '') $entete[$field['name']] = get_field($field['key']);
}

foreach(is_array($group_64b8fb2d1d0bc) ? $group_64b8fb2d1d0bc : [] as $field) {
    if(trim($field['name']) != '') $blocs[$field['name']] = get_field($field['key']);
}

$count_total_lame_50 = 0;
$count_lame_50 = 0;

foreach ( is_array($blocs["lames_contenu"]) ? $blocs["lames_contenu"] : [] as $bloc){
    if($bloc["acf_fc_layout"] == "lame_50_image_50_texte"){
        $count_total_lame_50 ++;
    }
}

?>

<main class="page__home container__xl">
    <section class="page__home--header header-100 content-header bg-white position-relative overflow-hidden  py-4 py-md-5 d-flex align-items-center">

        <div class="container__lg h-100 py-4 py-md-5">
            <div class="row h-100 align-items-center py-4 py-md-5">
                <div class="col-md-9 col-lg-6">

                    <?php if($entete["mention_dessus_slogan"]) :?>
                        <h1 class="tag tag-big tag-purple my-3"><?php echo $entete["mention_dessus_slogan"] ?></h1>
                    <?php endif; ?>

                    <h2 class="mb-4 content-mb-0 position-relative">
                        <?php echo $entete["slogan"] ?>
                    </h2>

                    <?php if($entete["mention_dessous_violette"] || $entete["mention_dessous_noire"]):?>
                        <p class="py-3">

                        <?php if($entete["mention_dessous_violette"]):?>
                            <span class="text-secondary typedjs" data-phrase="<?php $cpt = 0; foreach ($entete["mention_dessous_violette"] as $mention): echo $mention["mention"]; echo ($cpt != count($entete["mention_dessous_violette"])) ? ';;' : ''; ?><?php $cpt++; endforeach;?>"></span>
                        <?php endif; ?>

                            <?php if($entete["mention_dessous_noire"]):?>
                                <?php echo $entete["mention_dessous_noire"]; ?>
                            <?php endif; ?>
                        </p>
                    <?php endif; ?>

                    <?php if($entete["lien"]) : ?>
                        <a class="btn btn-purple-black" target="<?php echo $entete["lien"]["target"] ?>" href="<?php echo $entete["lien"]["url"] ?>"><?php echo $entete["lien"]["title"] ?></a>
                    <?php endif; ?>

                    <a class="btn btn-black" href="#lame50"><?php _e('Découvrir'); ?> <i class="fa fa-chevron-down" aria-hidden="true"></i></a>

                </div>
            </div>
        </div>

        <?php if($entete["lien_rs"]):?>
            <a class="purple-link purple-link-black position-absolute bottom-0 end-0 p-5" href="<?php echo $entete["lien_rs"]["url"] ?>" target="<?php echo $entete["lien_rs"]["target"] ?>">
                <i class="fa <?php echo $entete["logo_rs"] ?>" aria-hidden="true"></i> •
                <?php echo $entete["lien_rs"]["title"] ?>
            </a>
        <?php endif; ?>

    </section>


    <?php $cpt=0; foreach(is_array($blocs["lames_contenu"]) ? $blocs["lames_contenu"] : [] as $bloc): $cpt++;?>
        <?php switch ($bloc['acf_fc_layout']):

            case 'lame_chiffres': ?>
                <section class="page__home--chiffres bg-primary">
                    <?php echo do_shortcode('[lame-chiffres id='.get_the_ID().']') ?>
                </section>
                <?php break;?>

            <?php case 'lame_methode' :?>
            <section class="page__home--methode text-center mb-3" id="decouvrir">
                <div class="page__home--methode--top pt-0 pt-md-4 position-relative">
                    <div class="container__lg pt-4">

                        <?php if($bloc["etiquette"]) :?>
                            <h3 class="tag tag-big tag-purple my-3"><?php echo $bloc["etiquette"] ?></h3>
                        <?php endif; ?>

                        <?php if($bloc["titre"]) :?>
                            <h2 class="pt-3 pb-4 deco__trace deco__trace--02"><?php echo $bloc["titre"] ?></h2>
                        <?php endif; ?>

                        <?php if($bloc["mention_dessous_titre"]) :?>
                            <div class="pb-3 content-mb-0"><?php echo $bloc["mention_dessous_titre"] ?></div>
                        <?php endif; ?>

                    </div>

                    <img class="deco position-absolute d-none d-md-block" src="<?php echo get_template_directory_uri().'/assets/img/trace-fleches.png' ?>" alt="<?php _e("Dessins de flèches") ?>" width="205px">
                </div>
                <div class="page__home--methode--bottom pb-4 pb-md-5">
                    
                    <img class="deco position-absolute" src="<?php echo get_template_directory_uri().'/assets/img/trace-wave-top.png' ?>" alt="<?php _e("Traits blancs formants une vague") ?>" width="28%">
                    
                    <div class="container__lg">
                        <div class="row justify-content-center g-4 py-3 pe-3">

                            <?php $cpt = 0 ?>
                            <?php foreach(is_array($bloc["cartes"]) ? $bloc["cartes"] : [] as $carte): ?>
                                <div class="col-md-6 d-flex">
                                    <div class="page__home--methode--bottom--carte carte-<?php echo $cpt%2 ?> p-5 d-flex flex-column align-items-start">

                                        <?php if($carte["icone"]): ?>
                                            <img class="mb-4" src="<?php echo $carte["icone"]["url"] ?>">
                                        <?php endif; ?>

                                        <?php if($carte["titre_carte"]): ?>
                                            <h4 class="py-2"> <?php echo $carte["titre_carte"] ?></h4>
                                        <?php endif; ?>

                                        <?php if($carte["contenu_texte"]): ?>
                                            <div class="text-start content-mb-0">
                                                <?php echo $carte["contenu_texte"] ?>
                                            </div>
                                        <?php endif; ?>

                                    </div>
                                </div>
                                <?php $cpt ++ ?>
                            <?php endforeach; ?>

                        </div>
                    </div>

                    <?php if($bloc["lien_methodes"]):?>
                        <a class="btn btn-purple-black mt-5 px-4" target="<?php echo $bloc["lien_methodes"]["target"] ?>" href="<?php echo $bloc["lien_methodes"]["url"] ?>"><?php echo $bloc["lien_methodes"]["title"] ?></a>
                    <?php endif; ?>

                </div>

            </section>
            <?php break; ?>

        <?php case 'lame_50_image_50_texte': ?>
            <?php $count_lame_50 ++ ?>
            <section class="page__home--50--50 pb-3 pt-md-3 pb-md-5"id="lame50">
                <div class="container__lg">
                    <div class="row align-items-center <?php echo ($bloc["disposition"] != "gauche") ? "flex-md-row-reverse" : "" ?>">
                        <div class="col-md-6 pb-3 pb-md-0 d-flex justify-content-center">
                            <figure>
                                <img src="<?php echo $bloc["image"]["url"] ?>" width="100%" height="100%" alt="<?php echo $bloc["image"]["alt"] ?>">
                            </figure>
                        </div>
                        <div class="col-md-6">
                            <h2 class="text-<?php echo $bloc["couleur_titre"] ?>"><?php echo $bloc["titre"] ?></h2>

                            <?php if(!empty($bloc["sous-titre"]) ): ?>
                                <h3 class="small-title"><?php echo $bloc["sous-titre"] ?></h3>
                            <?php endif; ?>

                            <?php if($bloc["contenu_texte"]): ?>
                                <p><?php echo $bloc["contenu_texte"] ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <?php if($count_lame_50 == $count_total_lame_50) :?>
                    <img class="deco deco-home position-absolute" src="<?php echo get_template_directory_uri().'/assets/img/trace-wave-bottom.png' ?>" alt="<?php _e("Traits blancs formants une vague") ?>" width="28%">
                <?php endif; ?>

            </section>
            <?php break; ?>

        <?php case 'lame_etudes_cas' :?>
            <div class="mt-5">
                <?php echo get_template_part('template-parts/lame', 'etude-cas', ['bloc' => $bloc]) ?>
            </div>
            <?php break; ?>

        <?php case 'lame_partenaires': ?>
            <?php echo get_template_part('template-parts/lame', 'partenaires', $bloc) ?>
            <?php break; ?>

        <?php case 'lame_3_cartes': ?>
                <?php get_template_part('template-parts/lame', '3-cartes', $bloc) ?>

            <?php break; ?>
			            <?php case 'lame_faq': ?>
                <div class="page__methode__faq position-relative py-5">
                    <div class="container__lg">
                        <div class="text-center">

                            <?php if($bloc["etiquette"]) :?>
                                <h3 class="tag tag-big tag-purple my-2"><?php echo $bloc["etiquette"] ?></h3>
                            <?php endif; ?>

                            <?php if($bloc["titre"]) :?>
                                <h2 class="pt-3 pb-4 deco__trace deco__trace--04"><?php echo $bloc["titre"] ?></h2>
                            <?php endif; ?>

                            <?php if(count($bloc["questions_frequemment_posees"]) > 1) : ?>
                                <div class="page__methode__faq__accordion accordion my-4" id="accordionFaq">
                                <?php $cpt = 0 ?>
                                    <?php foreach(is_array($bloc["questions_frequemment_posees"]) ? $bloc["questions_frequemment_posees"] : [] as $question) : ?>

                                        <div class="page__methode__faq__accordion__item accordion-item">
                                            <p class="accordion-header termina_demi" id="heading-<?php echo $cpt ?>">
                                                <button class="accordion-button mt-3 collapsed shadow-none px-0" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-<?php echo $cpt ?>" aria-expanded="true" aria-controls="collapse-<?php echo $cpt ?>">
                                                    <h2 class="small-title"><?php echo $question["question"] ?></h2>
                                                </button>
                                            </p>
                                            <div id="collapse-<?php echo $cpt ?>" class="accordion-collapse collapse" aria-labelledby="heading-<?php echo $cpt ?>" data-bs-parent="#accordionFaq">
                                                <p class="accordion-body text-start px-0 mb-0">
                                                    <?php echo $question["reponse"] ?>
                                                </p>
                                            </div>
                                        </div>

                                    <?php $cpt++ ?>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>

                            <?php if($bloc["mention_dessous_questions"]) :?>
                                <p class="pt-4 pb-2"><?php echo $bloc["mention_dessous_questions"] ?></p>
                            <?php endif; ?>

                            <?php if($bloc["boutons_contact"]):?>
                                <a class="btn btn-purple-black mb-4 px-4 mx-auto" target="<?php echo $bloc["boutons_contact"]["target"] ?>" href="<?php echo $bloc["boutons_contact"]["url"] ?>"><?php echo $bloc["boutons_contact"]["title"] ?></a>
                            <?php endif; ?>

                        </div>
                    </div>

                    <img class="deco deco-mobile-opacity position-absolute" src="<?php echo get_template_directory_uri().'/assets/img/trace-point-interogation.png' ?>" alt="<?php _e("forme 3d") ?>" width="175px">
                </div>
                <?php break; ?>
			
        <?php endswitch ?>

    <?php endforeach; ?>




</main>

<?php the_content(); ?>
<?php
get_footer();