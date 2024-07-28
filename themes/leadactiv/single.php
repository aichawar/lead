<?php
/**
 * Created by A. MACHEDA
 * @author Genesii SAS
 * @version 1.0
 */

get_header();
$displayMore = false;
?>
<main class="page__single ">
    <!-- Header Section -->
    <section class="py-4 py-sm-5 px-4 position-relative overflow-hidden page__single--header pt-5">
        <div class="container__lg mt-2 pt-5">
            <h1 class="title-big mb-2 content-mb-0 position-relative text-dark col-10" style="margin-top: 10px;">
                <?php
                if (get_field('titre', get_the_ID())) {
                    echo get_field('titre', get_the_ID());
                } else {
                    the_title();
                }
                ?>
            </h1>
            <div class="pt-2 mt-1 d-flex align-items-center author-section">
                <div class="author-avatar">
                    <?php echo get_avatar(get_the_author_meta('ID'), 24); ?>
                </div>
                <div class="author-info ms-3">
                    <span class="author-name"><?php echo get_the_author(); ?></span>
                    <span class="post-date ms-3"><?php echo get_the_date('d F Y'); ?></span>
                </div>
            </div>
        </div>
    </section>

    <!-- Progress Bar Section -->
    <div class="progress-bar-container">
        <div class="progress-bar-blog" id="progress-bar-blog"></div>
    </div>

    <!-- Content Section -->
    <section class="py-4 py-sm-5 position-relative overflow-hidden">
        <div class="container__lg">
            <div class="page__single--body  px-2 pb-4 pb-md-5">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="page__single--body--right ms-auto position-sticky" style="top: -5px;">
                            <?php if (have_rows('lame_de_contenu')): ?>
                                <div class="page__single--body--right--sommaire pe-5">
                                    <?php
                                    $cptTitre = 0;
                                    while (have_rows('lame_de_contenu')):
                                        the_row();
                                        $titre = get_sub_field('titre');
                                        if ($titre):
                                            $cptTitre++;
                                            ?>
                                            <a href="#<?php echo sanitize_title($titre) . $cptTitre ?>"
                                                class="scroll-link f-16 mb-sommaire px-2 py-2 d-block">
                                                <?php echo $titre; ?>
                                            </a>
                                            <?php
                                        endif;
                                    endwhile;
                                    ?>
                                </div>
                            <?php endif; ?>

                            <div class="mt-4 page__single--body--rs">
                                <div class="f-18 termina_demi mb-3 text-left"><?php _e('Partager :'); ?></div>
                                <div class="d-flex justify-content-start">
                                    <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo get_permalink() ?>"
                                        target="_blank" class="me-2"><i class="fa fa-linkedin"></i></a>
                                    <a href="https://twitter.com/intent/tweet?text=<?php echo get_permalink() ?>"
                                        target="_blank" class="me-2"><i class="fa fa-twitter"></i></a>
                                    <a href="mailto:exemple@mail.com?subject=&body=<?php echo get_permalink() ?>"
                                        target="_blank" class="me-2"><i class="fa fa-envelope"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="mb-3 d-flex align-items-center">
                            <?php if (get_field('lecture', get_the_ID())): ?>
                                <div class="f-18 fw-500 rustica">
                                    <?php echo get_field('lecture', get_the_ID()) ?>     <?php _e(' min. de lecture'); ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <?php if (get_field('introduction', get_the_ID())): ?>
                            <div class="content-text f-18 mb-4">
                                <?php echo get_field('introduction', get_the_ID()); ?>
                            </div>
                        <?php endif; ?>

                        <?php
                        $cptTitre = 0;
                        if (have_rows('lame_de_contenu')):
                            ?>
                            <div class="page__single--body--content">
                                <?php
                                while (have_rows('lame_de_contenu')):
                                    the_row();
                                    $titre = get_sub_field('titre');
                                    $texte = get_sub_field('texte');
                                    $image = get_sub_field('image');
                                    if ($titre):
                                        $cptTitre++;
                                        ?>
                                        <h2 class="text-darck- green f-22 mt-4"
                                            id="<?php echo sanitize_title($titre) . $cptTitre ?>">
                                            <?php echo $titre; ?>
                                        </h2>
                                        <?php
                                    endif;
                                    if ($texte):
                                        ?>
                                        <div class="content-text f-18 mb-4">
                                            <?php echo $texte; ?>
                                        </div>
                                        <?php
                                    endif;
                                    if ($image):
                                        ?>
                                        <img src="<?php echo $image['url']; ?>" class="w-100 mb-4" />
                                        <?php
                                    endif;
                                endwhile;
                                ?>
                            </div>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container__lg d-lg-none">
        <div class="p-4 no-hover w-100">
            <div class="f-18 termina_demi mb-3 text-center"><?php _e('Partager :'); ?></div>
            <div class="d-flex justify-content-center page__single--body--rs">
                <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo get_permalink() ?>"
                    target="_blank" class="me-2"><i class="fa fa-linkedin"></i></a>
                <a href="https://twitter.com/intent/tweet?text=<?php echo get_permalink() ?>" target="_blank"
                    class="me-2"><i class="fa fa-twitter"></i></a>
                <a href="mailto:exemple@mail.com?subject=&body=<?php echo get_permalink() ?>" target="_blank"
                    class="me-2"><i class="fa fa-envelope"></i></a>
            </div>
        </div>
    </div>

    <div class="page__single--bottom container__lg py-4 py-lg-5">
        <div class="justify-content-center text-center">
            <?php if (get_field("titre_du_bloc", get_the_ID())): ?>
                <div class="mb-4 content-mb-0 position-relative f-56">
                    <?php echo get_field("titre_du_bloc", get_the_ID()) ?>
                </div>
                <a href="http://leadactiv-v1.local/prendre-rendez-vous/" class="btn color-btn-dark mb-5">Découvrir nos
                    articles</a>
            <?php endif; ?>
        </div>
        <?php if (get_field("articles", get_the_ID())):
            $displayMore = true; ?>
            <div class="row justify-content-center">
                <?php
                $articles = get_field("articles", get_the_ID());
                foreach ($articles as $article): ?>
                    <div class="col-md-6 mb-1">
                        <?php echo get_template_part('template-parts/content', 'post', ['id' => $article->ID]); ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
    <?php if ($cptTitre > 0 && $displayMore): ?>
    <?php endif; ?>

    <div class="cta-section">
    <h2 class="cta-title">
        <span class="light-text">Nous prospectons,</span>
        <br>
        <strong>vous vendez</strong>
    </h2>
    <div class="cta-buttons">
        <a href="<?php echo home_url('/prendre-rendez-vous/'); ?>" class="btn color-btn-dark">Prendre rendez-vous</a>
        <a href="<?php echo home_url('/contact/'); ?>" class="btn btn-purple-black">Nous contacter</a>
    </div>
</div>
</main>

<?php
get_footer();
?>