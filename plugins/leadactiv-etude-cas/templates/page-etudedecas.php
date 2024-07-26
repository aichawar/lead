<?php
/*
    Template Name: Listing études de cas
*/

get_header();
?>

<main class="page__etude container__xl">
<section class="page__etude--header content-header position-relative py-1 py-md-2 mt-lg-3 bg-light-gray">
        <div class="container__lg  h-100 py-2 py-md-3 my-xl-4">
            <div class="row h-100 align-items-center pt-4 py-lg-2 py-xl-3">
                <div class="col-12 text-center f-48">
                    <h2 class="big-title f-48 pt-3 text-darck-green"><?php _e('Nos études de cas') ?></h2>
                </div>
                <div class="col-12">
                    <div id="carouselEtudesDeCas" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <?php
                            $loop = \Genesii\PostType\EtudeDeCas::findAll(-1);
                            $cptloop = 0;
                            if ($loop->have_posts()):
                                while ($loop->have_posts() && $cptloop < 5):
                                    $loop->the_post(); ?>
                                    <?php $etude_fields = get_fields(get_the_ID()); ?>
                                    <div class="carousel-item <?php echo ($cptloop == 0) ? 'active' : ''; ?>">
                                        <div class="row justify-content-center">
                                            <div class="col-md-10">
                                                <div class="card h-100 p-3 w-100 d-flex flex-row position-relative" style="background-color: #C6CBF7; border-radius: 20px; overflow: hidden; height: 500px; padding: 20px;">
                                                    <div class="card-body d-flex flex-column position-relative w-75">
                                                        <div class="card-logo-container" style="width: 200px; margin-bottom: 10px;">
                                                            <?php if ($etude_fields["logo_client"]): ?>
                                                                <img class="card-logo" src="<?php echo $etude_fields["logo_client"]["url"] ?>" alt="<?php echo $etude_fields["logo_client"]["alt"] ?>" style="width: 100%; height: 100%; object-fit: contain;">
                                                            <?php endif; ?>
                                                        </div>
                                                        <h3 class="f-18 card--title mt-3" style="font-size: 36px; font-weight: 500;"><?php echo get_the_title(); ?></h3>
                                                        <div class="f-14 card--description mb-4 mt-auto" style="color: #6c757d; margin-top: auto; margin-bottom: 20px; padding-right: 20px;">
                                                            <?php
                                                            $text = strip_tags(get_field('accroche', get_the_ID()));
                                                            $words = preg_split("/[\s,]+/", $text);
                                                            $word_limit = 25;
                                                            $excerpt = implode(' ', array_slice($words, 0, $word_limit));

                                                            if (count($words) > $word_limit) {
                                                                $excerpt .= '...';
                                                            }
                                                            echo $excerpt;
                                                            ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 d-flex align-items-center justify-content-center me-5">
                                                        <figure class="card--img" style="width: 630px; height: 360px; object-fit: contain; border-radius: 20px;">
                                                            <img class="img-fluid" src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="<?php the_title(); ?>">
                                                        </figure>
                                                    </div>
                                                    <div class="background-overlay" style="position: absolute; width: 50%; height: 100%; background-size: contain; z-index: -1; background-image: url('/wp-content/uploads/2024/07/SVG-accelerez.png'); margin-top: 20px;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php $cptloop++;
                                endwhile;
                                wp_reset_postdata();
                            endif; ?>
                        </div>
                        <ul class="carousel-indicators" style="position: absolute; bottom: -50px; left: -80px; transform: translateX(0); width: 20%; display: flex; justify-content: left; align-items: center;">
                            <?php for ($i = 0; $i < $cptloop; $i++): ?>
                                <li data-bs-target="#carouselEtudesDeCas" data-bs-slide-to="<?php echo $i; ?>" class="<?php echo ($i == 0) ? 'active' : ''; ?>" style="background-color: white; width: 40px; height: 3px; border-radius: 5px; margin: 0 2px; position: relative;"></li>
                            <?php endfor; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="page__etude--content position-relative pb-5" id="decouvrir">
        <div class="container__lg px-4 pt-4">
            <div class="row">
                <div class="col-xl-12 col-md-11">
                    <?php
                    $filtres = get_terms(array('taxonomy' => 'typeetudedecas'));
                    if (count($filtres) > 0): ?>
                        <div class="page__etude--content--top">
                            <div
                                class="page__etude--content--top--filtres d-md-flex align-items-center justify-content-start grid--actus--filters flex-wrap">
                                <a class="filter-link f-14 grid--actus--filter all active"
                                    data-filter="*"><?php _e('Tous') ?></a>
                                <?php $cpt = 0;
                                foreach ($filtres as $filtre):
                                    $cpt++; ?>
                                    <div class="page__etude--content--top--filtres--item">
                                        <a class="filter-link f-14 d-block grid--actus--filter"
                                            data-filter=".<?php echo $filtre->slug; ?>"><?php echo $filtre->name; ?></a>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>


        <div class="container__lg mx-3 position-relative">
            <div class="row pt-4 page__etude--content--grid grid--actus">
                <?php
                $loop = \Genesii\PostType\EtudeDeCas::findAll(-1);
                $cptloop = 0;
                if ($loop->have_posts()):
                    while ($loop->have_posts()):
                        $loop->the_post(); ?>
                        <?php $etude_fields = get_fields(get_the_ID()); ?>
                        <div
                            class="col-md-6 mb-1 page__etude--content--grid--item grid--actus--items <?php if (get_the_terms(get_the_ID(), 'typeetudedecas')) {
                                $cpt = 1;
                                foreach (get_the_terms(get_the_ID(), 'typeetudedecas') as $term):
                                    echo $term->slug . ' '; endforeach;
                            } ?>">
                            <a href="<?php the_permalink(); ?>" class="text-decoration-none text-reset">
                                <div class="card h250 p-3 w-100 mx-2">
                                    <div class="card-body d-flex flex-column position-relative">
                                        <div class="position-absolute top-0 start-0 m-3 card-logo-container mb-2">
                                            <?php if ($etude_fields["logo_client"]): ?>
                                                <img class="card-logo" src="<?php echo $etude_fields["logo_client"]["url"] ?>"
                                                    alt="<?php echo $etude_fields["logo_client"]["alt"] ?>">
                                            <?php endif; ?>
                                        </div>
                                        <div class="tag-container position-absolute top-0 end-0 m-3">
                                            <?php if (get_the_terms(get_the_ID(), 'typeetudedecas')):
                                                foreach (get_the_terms(get_the_ID(), 'typeetudedecas') as $term): ?>
                                                    <span
                                                        class="tag f-13 mb-1 tag-<?php echo $etude_fields["couleur"] ?>"><?php echo $term->name; ?></span>
                                                <?php endforeach; endif; ?>
                                        </div>
                                        <h3 class="f-18 card--title mt-5 pt-3 mb-2"><?php echo get_the_title(); ?></h3>
                                        <div class="f-14 card--description opacity-75 mt-2 col-9">
                                            <?php
                                            $text = strip_tags(get_field('accroche', get_the_ID()));
                                            $words = preg_split("/[\s,]+/", $text);
                                            $word_limit = 50;
                                            $excerpt = implode(' ', array_slice($words, 0, $word_limit));

                                            if (count($words) > $word_limit) {
                                                $excerpt .= '...';
                                            }

                                            echo $excerpt;
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <?php $cptloop++ ?>
                    <?php endwhile;
                    wp_reset_postdata(); else: ?>
                    <div class="col-12"><?php esc_html_e('Désolé, aucune études de cas disponibles.'); ?></div>
                <?php endif; ?>
            </div>
        </div>
    </section>

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
