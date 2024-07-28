<?php
/*
    Template Name: Page méthode
*/

get_header();

$group_64a417f5b2b47 = acf_get_fields('group_64a417f5b2b47');
$group_64ae683f9dfb3 = acf_get_fields('group_64ae683f9dfb3');

$entete = [];
$blocs = [];

foreach (is_array($group_64a417f5b2b47) ? $group_64a417f5b2b47 : [] as $field) {
    if (trim($field['name']) != '')
        $entete[$field['name']] = get_field($field['key']);
}

foreach (is_array($group_64ae683f9dfb3) ? $group_64ae683f9dfb3 : [] as $field) {
    if (trim($field['name']) != '')
        $blocs[$field['name']] = get_field($field['key']);
}

?>
<?php
// Fonction pour retourner la classe CSS de la balise en fonction du type de section
function get_tag_class($section)
{
    switch ($section) {
        case 'carte_fondation':
            return 'tag-green';
        case 'carte_exec':
            return 'tag-purple';
        case 'carte_reflexion':
            return 'tag-saumon';
        default:
            return '';
    }
}
?>

<main class="page__methode">
    <section class="page__home--header page__methode--header--top position-relative d-flex bg-deep-purple align-items-center ">
        <div class="container__xl">      
            <div class="row align-items-center py-5 pt-2 mx-5 h-100">
                <div class="col-md-7">
                    <?php if ($entete["mention_titre"]): ?>
                        <h1 class="tag my-3 text-darck-green"><?php echo $entete["mention_titre"] ?></h1>
                    <?php endif; ?>
                    <h2 class="big-title mb-4 content-mb-0 position-relative text-darck-green">
                        <?php echo $entete["titre"] ?>
                    </h2>
                    <?php if ($entete["mention_dessous_titre"]): ?>
                        <div class="w-632">
                        <p class="py-3  f-20"><?php echo $entete["mention_dessous_titre"]; ?></p>
                    </div>
                    <?php endif; ?>
                    <a href="#prendre-rendez-vous" class="btn color-btn-dark px-5">Prendre rendez-vous</a>
                </div>
                <div
                    class="col-md-5 page__methode--header--top--img col-md-4 d-flex  position-relative">
                    <?php if ($entete["image"]): ?>
                        <div class="image-container-methode">
                            <img class="page__methode--header--top--img--illu"
                                src="<?php echo $entete["image"]["url"] ?>" alt="<?php echo $entete["image"]["alt"] ?>">
                        </div>
                    <?php endif; ?>
                </div> 
            </div>
     </div>
    </section>
    <?php if ($entete["afficher_lame"] == "true"): ?>
        <?php if (is_array($entete["clients"]) >= 1 || is_array($entete["autres_logos"]) >= 1): ?>
            <div class="mb-n5">
                <div class="page__methode--header--bottom--logos py-4 bg-dark-green ">
                    <div class="slider--horizontal my-3 mx-2">
                        <?php
                        $timeSpeed = 0.72;
                        $logoSize = 170;
                        $logos = count(is_array($entete["clients"]) ? array_merge($entete["clients"], $entete["clients"], $entete["clients"], $entete["clients"]) : []) + count(is_array($entete["autres_logos"]) ? array_merge($entete["autres_logos"], $entete["autres_logos"], $entete["autres_logos"], $entete["autres_logos"]) : []);
                        ?>
                        <div class="slide-track"
                            style="width: <?php echo $logoSize * $logos; ?>px; animation-duration: <?php echo $timeSpeed * $logos; ?>s;">
                            <?php foreach (is_array($entete["clients"]) ? array_merge($entete["clients"], $entete["clients"], $entete["clients"], $entete["clients"]) : [] as $client): ?>
                                <div class="slide">
                                    <img style="filter:brightness(0) invert(1);"
                                        src="<?php echo get_field("logo_client", $client->ID)["url"] ?>" alt="" />
                                </div>
                            <?php endforeach; ?>
                            <?php foreach (is_array($entete["autres_logos"]) ? array_merge($entete["autres_logos"], $entete["autres_logos"], $entete["autres_logos"], $entete["autres_logos"]) : [] as $client): ?>
                                <div class="slide">
                                    <img style="filter:brightness(0) invert(1);" src="<?php echo $client["logo"]["url"] ?>"
                                        alt="" />
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    <?php endif; ?>
    <?php $cpt = 0;
foreach (is_array($blocs["lames_contenu"]) ? $blocs["lames_contenu"] : [] as $bloc):
    $cpt++; ?>
    <?php switch ($bloc['acf_fc_layout']):
        case 'lame_fonctionnement': ?>
            <section class="page__methode--fonctionnement my-5 pt-4" id="decouvrir">
                <div class="container__lg>
                    <div class="page__methode--fonctionnement--top pt-3 my-4" id="section-header">
                        <div class="text-center">
                            <div id="section-title">
                                <?php if ($bloc["etiquette"]): ?>
                                    <h3 class="tag"><?php echo $bloc["etiquette"] ?></h3>
                                <?php endif; ?>
                                <?php if ($bloc["grand_titre"]): ?>
                                    <h2 class="py-2"><?php echo $bloc["grand_titre"] ?></h2>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="page__methode--fonctionnement--bottom">
                        <div class="container__lg">
                            <div class=" pt-2 justify-content-center position-relative">
                                <div class="progress-container">
                                    <div class="progress-bar" id="progressbar"></div>
                                </div>
                                <div class="scroll-container ">
                                    <?php
                                    $sections = [
                                        "carte_fondation" => "etiquette_fondation",
                                        "carte_exec" => "etiquette_exec",
                                        "carte_reflexion" => "etiquette_reflexion"
                                    ];
                                    foreach ($sections as $section => $etiquette):
                                        if (count($bloc[$section]) >= 1):
                                            foreach ($bloc[$section] as $index => $carte): ?>
                                                <div id="<?php echo $section . '-' . $index; ?>" class="mt-md-1 pt-1 pb-0 section-effect"
                                                    data-section-type="<?php echo $section; ?>">
                                                    <div class="position-relative section-content">
                                                        <div class="row justify-content-center align-items-center col-md-12 ">
                                                            <div class="col-md-6 text-container-methode">
                                                                <div class="content-container">
                                                                    <div class="tags-container">
                                                                        <?php if ($bloc[$etiquette]): ?>
                                                                            <h3 class="tag <?php echo get_tag_class($section); ?> position-relative me-3">
                                                                                <?php echo $bloc[$etiquette] ?>
                                                                            </h3>
                                                                        <?php endif; ?>
                                                                        <?php if ($carte["etiquette_jour"]): ?>
                                                                            <h3 class="tag tag-gray position-relative">
                                                                                <?php echo $carte["etiquette_jour"] ?>
                                                                            </h3>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                    <div class="position-relative">
                                                                        <?php if ($carte["contenue_carte"]): ?>
                                                                            <div><?php echo $carte["contenue_carte"] ?></div>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 image-container">
                                                                <?php if ($carte["image"]): ?>
                                                                    <img src="<?php echo $carte["image"]["url"]; ?>"
                                                                        alt="<?php echo $carte["image"]["alt"]; ?>"
                                                                        class="img-fluid carte-image fade-in">
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach;
                                        endif;
                                    endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center px-5 py-3 fixed-button" id="fixed-button">
                        <a class="btn color-btn-dark" href="#decouvrir"><?php _e('Prendre rendez-vous') ?></a>
                    </div>
                </div>
            </section>
            <?php break; ?>
        <?php case 'lame_etudes_cas': ?>
            <section class="bg-light-gray justify-content-center">
                <?php echo get_template_part('template-parts/lame', 'etude-cas', ['bloc' => $bloc]) ?>
            </section>
        <?php break; ?>
        <?php case 'lame_partenaires': ?>
            <?php echo get_template_part('template-parts/lame', 'partenaires', $bloc) ?>
            <?php break; ?>
            <?php case 'lame_faq': ?>
                <section class="container__lg">
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
                </section>
                <?php break; ?>
    <?php endswitch; ?>
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
