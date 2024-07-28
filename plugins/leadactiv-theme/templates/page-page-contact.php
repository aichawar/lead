<?php
/*
    Template Name: Page contact
*/

$group_64bf7d164658e = acf_get_fields('group_64bf7d164658e');

$blocs = [];

foreach(is_array($group_64bf7d164658e) ? $group_64bf7d164658e : [] as $field) {
    if(trim($field['name']) != '') $blocs[$field['name']] = get_field($field['key']);
}

get_header();

?>

<main class="page__contact ">
    <?php $cpt=0; foreach(is_array($blocs["lames_contenu"]) ? $blocs["lames_contenu"] : [] as $bloc): $cpt++;?>
        <?php switch ($bloc['acf_fc_layout']):

            case 'lame_formulaire': ?>
            <section class="page__contact--formulaire py-4 py-md-5 bg-deep-purple">
                <div class="container__lg h-100 py-4 py-md-5 px-6">
                    <div class="row align-items-start h-100 py-lg-4 px-5">
                        <div class="col-md-6 position-relative">
                            <div class="background-container">
                                <img src="/wp-content/uploads/2024/07/fleche-contact.svg" alt="Background Image" class="background-image">
                            </div>

                            <?php if($bloc["titre"]) :?>
                                <h2 class=" big-title pt-3 pb-4 mt-4"><?php echo $bloc["titre"] ?></h2>
                            <?php endif; ?>
                        </div>

                        <div class="col-md-6">
                            <div class="contact-form-container p-4">
                                <?php echo do_shortcode($bloc["shortcode_formulaire"]) ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <?php break; ?>

            <?php case 'lame_calendly': ?>
                <section class="page__contact--calendly bg-white position-relative py-4 <?php if($cpt== 1) echo 'mt-lg-5' ?>">
                    <div class="container__lg d-flex flex-column align-items-center py-1 py-lg-4 my-xl-4 h-100">
                        <div class="text-center mb-4 px-5">
                            <?php if($bloc["titre"]) :?>
                                <h4 class="f-36"><?php echo $bloc["titre"] ?></h4>
                            <?php endif; ?>

                            <?php if($bloc["contenu_texte"]) :?>
                                <div class="pt-3 px-5"><?php echo $bloc["contenu_texte"] ?></div>
                            <?php endif; ?>
                        </div>

                        <div class="page__contact--calendly--calendar justify-content-center">
                            <div class="calendly-inline-widget"
                                data-url="<?php echo $bloc["calendly"]; ?>"
                                style="width:1280px;height:800px;border-radius:58px; overflow: hidden;">
                                <button class="calendly__popup-btn btn btn-purple-white" onclick="Calendly.initPopupWidget({url: '<?php echo $bloc["calendly"]; ?>'});return false;" type="button">Prendre rendez-vous</button>
                            </div>
                            <script type="text/javascript" src="https://assets.calendly.com/assets/external/widget.js" async></script>
                        </div>
                    </div>
                </section>
                <?php break; ?>

            <?php case 'lame_3_cartes': ?>
                <section class="bg-dark-green">
                    <?php get_template_part('template-parts/lame', '3-cartes', $bloc) ?>
                </section>
                <?php break; ?>

            <?php case 'lame_reseaux_sociaux': ?>
                <section class="page__contact--reseaux py-4 py-md-5 bg-purple organic--animate--bg overflow-hidden">
                    <div class="container__lg py-md-4 my-1">
                        <?php if($bloc["titre"]): ?>
                            <h2 class="mb-4 text-white text-center f-36"><?php echo $bloc["titre"] ?></h2>
                        <?php endif; ?>
                        <?php if(count($bloc["liens_reseaux"]) >= 1 ) ?>
                        <div class="d-flex justify-content-center flex-wrap">
                            <?php foreach ( is_array($bloc["liens_reseaux"]) ? $bloc["liens_reseaux"] : [] as $lien) : ?>
                                <a class="page__contact--reseaux--icone bg-white text-decoration-none rounded-circle d-flex align-items-center justify-content-center mx-2 p-4 mb-3" href="<?php echo $lien["lien"]["url"] ?>" target="<?php echo $lien["lien"]["target"] ?>">
                                    <i class="text-secondary fa <?php echo $lien["logo_reseau_sociale"] ?>" aria-hidden="true"></i>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </section>
                <?php break; ?>

            <?php case 'lame_clients': ?>
                <div class="lame--clients py-2 py-md-4 bg-purple overflow-hidden">
                    <div class="owl-carousel owl-carousel-clients-contact my-3 py-2 no-margin">
                        <?php if(is_array($bloc["clients"]) >= 1 || is_array($bloc["autres_logos"]) >= 1) :?>
                            <?php foreach ( is_array($bloc["clients"]) ? $bloc["clients"] : [] as  $client ): ?>
                                <figure>
                                    <img src="<?php echo get_field("logo_client", $client->ID)["url"] ?>" alt="">
                                </figure>
                            <?php endforeach; ?>

                            <?php foreach ( is_array($bloc["autres_logos"]) ? $bloc["autres_logos"] : [] as  $client ): ?>
                                <figure>
                                    <img src="<?php echo $client["logo"]["url"] ?>" alt="">
                                </figure>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
                <?php break; ?>

        <?php endswitch; ?>
    <?php endforeach; ?>

</main>


<?php the_content(); ?>

<?php
get_footer();