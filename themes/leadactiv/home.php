<?php
/**
 * Created by A. MACHEDA
 * @author Genesii SAS
 * @version 1.0
 */

$page_id = get_queried_object_id();
get_header();
?>

<main class="page__blog overflow-hidden container__xl">
    <section class="page__blog--header content-header position-relative py-1 py-md-2 mt-lg-3 bg-light-gray">
        <div class="container__lg h-100 py-2 py-md-3 my-xl-4" style="padding-left: 80px; padding-right: 80px;">
            <div class="row h-100 align-items-center pt-4 py-lg-2 py-xl-3">
                <div class="col-12 text-center">
                    <h4 class="big-title pt-3 text-darck-green" style="font-size: 36px;"><?php _e('Le blog leadactiv') ?></h4>
                </div>
                <div class="col-12">
                    <div id="carouselBlog" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <?php
                            $loop = new WP_Query(array('post_type' => 'post', 'posts_per_page' => 5));
                            $cptloop = 0;
                            if ($loop->have_posts()):
                                while ($loop->have_posts()):
                                    $loop->the_post(); ?>
                                    <div class="carousel-item <?php echo ($cptloop == 0) ? 'active' : ''; ?>">
                                        <div class="row justify-content-center">
                                            <div class="col-md-10">
                                                <div class="card h-100 p-3 w-100 d-flex flex-row position-relative" style="background-color: #C6CBF7; border-radius: 20px; overflow: hidden; height: 500px; padding: 20px;">
                                                    <div class="card-body d-flex flex-column position-relative w-75">
                                                        <h3 class="f-18 card--title mt-3" style="font-size: 36px; font-weight: 500;"><?php echo get_the_title(); ?></h3>
                                                        <div class="card--author-date" style="color: #6c757d; margin-top: auto; margin-bottom: 20px; padding-right: 20px;">
                                                            <span class="author"><?php the_author(); ?></span>
                                                            <span class="date"><?php echo get_the_date(); ?></span>
                                                        </div>
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
                                <li data-bs-target="#carouselBlog" data-bs-slide-to="<?php echo $i; ?>" class="<?php echo ($i == 0) ? 'active' : ''; ?>" style="background-color: white; width: 40px; height: 3px; border-radius: 5px; margin: 0 2px; position: relative;"></li>
                            <?php endfor; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="page__etude--content position-relative pb-4 pt-2" id="decouvrir">
        <div class="container__lg pt-4" style="padding-left: 80px; padding-right: 80px;">
            <div class="row">
                <div class="col-md-6">
                    <?php
                    $filtres = get_terms(array('taxonomy' => 'category'));
                    if (count($filtres) > 0): ?>
                        <div class="page__etude--content--top--filtres d-md-flex align-items-center justify-content-start grid--actus--filters flex-wrap">
                            <a class="filter-link f-13 grid--actus--filter all active"><?php _e('Tous') ?></a>
                            <?php foreach ($filtres as $filtre): ?>
                                <div class="page__etude--content--top--filtres--item">
                                    <a class="filter-link f-13 d-block grid--actus--filter" data-filter=".<?php echo $filtre->slug; ?>"><?php echo $filtre->name; ?></a>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <section class="page__blog--content position-relative pb-sm-5">
        <div class="container__lgposition-relative">
            <div class="row pt-4 pb-5 page__blog--content--grid grid--actus">
                <?php if (have_posts()):
                    while (have_posts()):
                        the_post(); ?>
                        <div
                            class="col-md-6 mb-4 page__blog--content--grid--item grid--actus--items <?php if (get_the_category(get_the_ID())) {
                                foreach (get_the_category(get_the_ID()) as $term):
                                    echo $term->slug . ' '; endforeach;
                            } ?>">
                            <?php echo get_template_part('template-parts/content', 'post'); ?>
                        </div>
                    <?php endwhile; else: ?>
                    <div class="col-12"><?php esc_html_e('Désolé, aucun article ne correspond à vos critères.'); ?></div>
                <?php endif; ?>


            </div>
        </div>
    </section>


</main>

<?php
get_footer();