<?php
/**
 * Single page template pour EtudeDeCas
 */
get_header();
?>

<main class="single__etude">
    <section class="single__etude--header position-relative bg-white">
        <div class="container__xl">
            <div class="row align-items-center">
                <div class="col-md-6 d-flex flex-column align-items-start position-relative h500">
                    <?php
                    $etude_fields = get_fields(get_the_ID());
                    if ($etude_fields["logo_client"]): ?>
                        <div class="mb-3 header-logo">
                            <img src="<?php echo $etude_fields["logo_client"]["url"] ?>"
                                alt="<?php echo $etude_fields["logo_client"]["alt"] ?>">
                        </div>
                    <?php endif; ?>

                    <?php if (get_field('phrase_accroche', get_the_ID())): ?>
                        <h1 class="f-58 mb-4">
                            <?php echo get_field('phrase_accroche', get_the_ID()); ?>
                        </h1>
                    <?php endif; ?>

                    <?php if (get_field('description', get_the_ID())): ?>
                        <p class="single__etude--header--descr f-20 mb-4">
                            <?php echo get_field('description', get_the_ID()); ?>
                            </>
                        <?php endif; ?>
                </div>

                <div class="col-md-6 d-flex justify-content-center align-items-center-relative ">
                    <?php if ($media = get_field('media')): ?>
                        <div class="header-media border-radius">
                            <?php if ($media['type_de_media'] == 'YouTube' && $media['url_youtube']): ?>
                                <div class="video-container">
                                    <?php if ($media['miniature']): ?>
                                        <img src="<?php echo esc_url($media['miniature']['url']); ?>"
                                            alt="<?php echo esc_attr($media['miniature']['alt']); ?>" class="miniature-image">
                                        <div class="video-overlay"></div>
                                    <?php else: ?>
                                        <iframe width="100%" height="100%" src="<?php echo esc_url($media['url_youtube']); ?>"
                                            frameborder="0" allowfullscreen></iframe>
                                    <?php endif; ?>
                                </div>
                            <?php elseif ($media['type_de_media'] == 'Vidéo' && $media['fichier_video']): ?>
                                <video width="100%" height="100%" controls
                                    poster="<?php echo esc_url($media['miniature']['url']); ?>">
                                    <source src="<?php echo esc_url($media['fichier_video']['url']); ?>" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            <?php elseif ($media['type_de_media'] == 'Image' && $media['image']): ?>
                                <img src="<?php echo esc_url($media['image']['url']); ?>"
                                    alt="<?php echo esc_attr($media['image']['alt']); ?>">
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                    <img src="/wp-content/uploads/2024/07/SVG-accelerez.png" alt="Image"
                        class="img-fluid position-absolute background-image-left">
                </div>
            </div>
        </div>
    </section>



    <section class="single__etude--body" id="decouvrir">
        <?php foreach (is_array(get_field('lames_contenu', get_the_ID())) ? get_field('lames_contenu', get_the_ID()) : [] as $bloc): ?>
            <?php switch ($bloc['acf_fc_layout']):
                case 'lame_chiffres': ?>
                    <section class="page__home--chiffres bg-light-purple py-5">
                        <?php if ($bloc['titre']): ?>
                            <div class="container__lg mb-n2 mb-md-n4 pt-md-4">
                                <h3 class="text-center f-36 mb-3"><?php echo $bloc['titre']; ?></h3>
                            </div>
                        <?php endif; ?>
                        <?php echo do_shortcode('[lame-chiffres id=' . get_the_ID() . ' display="light"]') ?>
                    </section>
                    <?php break; ?>

                <?php case 'lame_listes_texte': ?>
                    <section class="lame_listes_texte position-relative d-flex align-items-center overflow-hidden bg-light-purple">
                        <div class="container__lg">
                            <div class="row align-items-top">
                                <div class="col-md-6 justify-content-left">
                                    <div class="lame_listes_texte__content">
                                        <?php if (!empty($bloc["titre"])): ?>
                                            <h3 class="f-48"><?php echo $bloc["titre"] ?></h3>
                                        <?php endif; ?>
                                        <?php if (!empty($bloc["texte"])): ?>
                                            <p class="f-16"><?php echo $bloc["texte"] ?></>
                                            <?php endif; ?>
                                            <?php if (!empty($bloc["bouton"])): ?>
                                                <a class="btn color-btn-dark px-5" href="<?php echo $bloc["bouton"]['url'] ?>"
                                                    target="<?php echo $bloc["bouton"]['target'] ?>"><?php echo $bloc["bouton"]['title'] ?></a>
                                            <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-md-6 d-flex justify-content-center align-item-center position-relative">
                                    <?php if (!empty($bloc["liste"])): ?>
                                        <div class="lame_listes_texte__card-container">
                                            <div class="lame_listes_texte__card-content">
                                                <?php if (!empty($bloc["titre_liste"])): ?>
                                                    <p class="tag tag-green f-14"><?php echo $bloc["titre_liste"] ?></p>
                                                <?php endif; ?>
                                                <div class="content-text">
                                                    <ul class="p-0 m-0 list-unstyled">
                                                        <?php foreach ($bloc["liste"] as $item): ?>
                                                            <li class="picto-style  d-flex align-items-center">
                                                                <?php if (!empty($item['picto_item'])): ?>
                                                                    <img src="<?php echo $item['picto_item']['url'] ?>" class="me-5">
                                                                <?php endif; ?>
                                                                <?php echo $item['liste_item'] ?>
                                                            </li>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </section>
                    <?php break; ?>



                <?php case 'lame_texte_image': ?>
                    <section
                        class="lame--texte_image pb-3 py-4 py-md-5 position-relative d-flex align-items-center justify-content-center overflow-hidden bg-white">
                        <div class="py-4 py-md-5 w-100">
                            <div class="container__lg text-center">
                                <?php if (!empty($bloc["titre_lame"])): ?>
                                    <h3 class="title-big position-relative mb-4"><?php echo $bloc["titre_lame"] ?></h3>
                                <?php endif; ?>
                            </div>

                            <div class="container__sm text-center pb-4">
                                <?php if ($bloc["mention_dessous_titre"]): ?>
                                    <div class="f-14 rustica content-text"><?php echo $bloc["mention_dessous_titre"] ?></div>
                                <?php endif; ?>
                            </div>

                            <div class="container__lg pt-0 pt-md-5">
                                <div class="row justify-content-center">
                                    <?php $cpt = 0 ?>
                                    <?php foreach (is_array($bloc["lame_imagetexte"]) ? $bloc["lame_imagetexte"] : [] as $lame): ?>
                                        <div class="col-md-4 d-flex mb-4">
                                            <div class="card h200 p-3 w-100 text-center bg-light-purple">
                                                <?php if ($lame["image"]): ?>
                                                    <figure class="mb-4">
                                                        <img src="<?php echo $lame["image"]["url"]; ?>" width="60" height="60"
                                                            alt="<?php echo $lame["image"]["alt"]; ?>">
                                                    </figure>
                                                <?php endif; ?>
                                                <h4 class="f-18 mb-3"><?php echo $lame["titre"]; ?></h4>
                                                <?php if ($lame["texte"]): ?>
                                                    <div class="f-14 rustica content-text"><?php echo $lame["texte"]; ?></div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <?php $cpt++ ?>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </section>
                    <?php break; ?>


                <?php case 'lame_texte_image_complexe': ?>
                    <section class="pb-3 py-4 py-md-5 position-relative overflow-hidden">

                        <div class="page__home--methode--top pt-0 pt-md-4 position-relative text-center">
                            <div class="container__lg pb-md-4">
                                <?php if ($bloc["etiquette"]): ?>
                                    <h3 class="tag tag-big tag-purple my-3"><?php echo $bloc["etiquette"] ?></h3>
                                <?php endif; ?>

                                <?php if ($bloc["titre"]): ?>
                                    <h2 class="pt-3 pb-4 "><?php echo $bloc["titre"] ?></h2>
                                <?php endif; ?>

                                <?php if ($bloc["texte"]): ?>
                                    <div class="pb-3 content-mb-0"><?php echo $bloc["texte"] ?></div>
                                <?php endif; ?>

                            </div>
                        </div>

                        <?php if ($bloc["lame_de_contenu"] && count($bloc["lame_de_contenu"]) > 0): ?>
                            <?php foreach ($bloc["lame_de_contenu"] as $lame): ?>
                                <div class="page__home--50--50 py-3 py-md-5">
                                    <div class="container__lg">
                                        <div
                                            class="row align-items-center <?php echo ($lame["disposition"] != "gauche") ? "flex-md-row-reverse" : "" ?>">
                                            <div class="col-md-6 pb-3 pb-md-0 d-flex justify-content-center">
                                                <figure>
                                                    <img src="<?php echo $lame["image"]["url"] ?>" width="100%" height="100%"
                                                        alt="<?php echo $lame["image"]["alt"] ?>">
                                                </figure>
                                            </div>
                                            <div class="col-md-6">
                                                <h2 class="text-<?php echo $lame["couleur_titre"] ?> mb-3"><?php echo $lame["titre"] ?></h2>

                                                <?php if ($lame["contenu_texte"]): ?>
                                                    <div class="content-text ul-<?php echo $lame["couleur_titre"] ?>">
                                                        <?php echo $lame["contenu_texte"] ?>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>


                    </section>
                    <?php break; ?>

                <?php case 'lame_etudes_cas': ?>
                    <div class="">
                        <?php echo get_template_part('template-parts/lame', 'etude-cas', ['bloc' => $bloc]) ?>
                    </div>
                    <?php break; ?>

                <?php case 'lame_temoignage_video': ?>
                    <section
                        class="single__etude--temoignage pb-3 py-4 py-md-5 position-relative d-flex align-items-center overflow-hidden">
                        <div class="container__lg py-4 py-md-5">
                            <div class="row align-items-center py-lg-4 py-xl-5">
                                <div class="col-12 ">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div
                                                class="single__etude--temoignage--left  p-4 p-lg-5 h-100 d-flex align-items-center justify-content-center">
                                                <?php if ($bloc["photo"]): ?>
                                                    <figure class="mb-0">
                                                        <img src="<?php echo $bloc["photo"]['url'] ?>" class="img-fluid" />
                                                    </figure>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div
                                                class="single__etude--temoignage--right p-4 p-lg-5 h-100 d-flex flex-column justify-content-center">
                                                <?php
                                                $etude_fields = get_fields(get_the_ID());
                                                if ($etude_fields["logo_client"]): ?>
                                                    <div class="single__etude--temoignage--right--logo mb-3">
                                                        <img src="<?php echo $etude_fields["logo_client"]["url"] ?>"
                                                            alt="<?php echo $etude_fields["logo_client"]["alt"] ?>">
                                                    </div>
                                                <?php endif; ?>
                                                <?php if ($bloc["nom_prenom"]): ?>
                                                    <div class="single__etude--temoignage--right--nom f-18 termina_demi mb-1">
                                                        <?php echo $bloc["nom_prenom"] ?>
                                                    </div>
                                                <?php endif; ?>
                                                <?php if ($bloc["fonction_entreprise"]): ?>
                                                    <div
                                                        class="single__etude--temoignage--right--fonction f-14 rustica text-secondary mb-3">
                                                        <?php echo $bloc["fonction_entreprise"] ?>
                                                    </div>
                                                <?php endif; ?>
                                                <?php if ($bloc["citation"]): ?>
                                                    <div class="single__etude--temoignage--right--citation  f-14 rustica mb-0">
                                                        <?php echo $bloc["citation"] ?>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <?php break; ?>

            <?php endswitch ?>
        <?php endforeach; ?>
    </section>
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