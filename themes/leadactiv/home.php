<?php
/**
 * Created by A. MACHEDA
 * @author Genesii SAS
 * @version 1.0
 */

$page_id = get_queried_object_id();
get_header();
?>

<section class="page__blog--header position-relative py-5 bg-light-gray">
    <div class="container__xl">
        <div class="col-12 text-center f-48 pt-4">
            <h2 class="big-title f-48 mt-3 text-darck-green"><?php _e('Le blog leadactiv') ?></h2>
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
                                    <div class="col-md-11">
                                        <a href="<?php the_permalink(); ?>" class="card-link w-100 text-decoration-none">
                                            <div class="card h-100 p-3 w-100 d-flex flex-row position-relative">
                                                <div class="card-body d-flex flex-column position-relative w-75 ">
                                                    
                                                    <h3 class="f-56 card--title mt-3"><?php the_title(); ?></h3>
                                                    
                                                    <div class="d-flex align-items-center mt-auto">
                                                        <div class="author-avatar me-2">
                                                            <?php echo get_avatar(get_the_author_meta('ID'), 32); ?>
                                                        </div>
                                                        <div class="author-details">
                                                            <div class="author-name f-16 me-5"><?php echo get_the_author(); ?></div>
                                                            <div class="post-date f-16"><?php echo get_the_date('d F Y'); ?></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="background-overlay"></div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <?php $cptloop++;
                        endwhile;
                        wp_reset_postdata();
                    endif; ?>
                </div>
                <ul class="carousel-indicators">
                    <?php for ($i = 0; $i < $cptloop; $i++): ?>
                        <li data-bs-target="#carouselBlog" data-bs-slide-to="<?php echo $i; ?>" class="<?php echo ($i == 0) ? 'active' : ''; ?>"></li>
                    <?php endfor; ?>
                </ul>
            </div>
        </div>
    </div>
</section>


    <section class="page__etude--content position-relative pb-4 pt-2" id="decouvrir">
    <div class="container__lg pt-4">
        <div class="row">
            <div class="col-md-12 mx-4">
                <?php
                $filtres = get_terms(array('taxonomy' => 'category'));
                if (count($filtres) > 0): ?>
                    <div class="page__etude--content--top">
                        <div class="page__etude--content--top--filtres-container">
                            <div class="page__etude--content--top--filtres d-md-flex align-items-center justify-content-start grid--actus--filters flex-wrap">
                                <a class="filter-link f-14 grid--actus--filter all active" data-filter="*"><?php _e('Tous') ?></a>
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
        </div>
    </div>
</section>


    <section class="page__blog--content position-relative pb-sm-5">
    <div class="container__lg position-relative">
        <div class="row pt-4 pb-5 page__blog--content--grid grid--actus">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <div class="col-12 col-md-6 mb-3 mb-sm-2 page__blog--content--grid--item grid--actus--items <?php if(get_the_category(get_the_ID())) { foreach (get_the_category(get_the_ID()) as $term): echo $term->slug.' '; endforeach; } ?>">
                    <?php echo get_template_part('template-parts/content', 'post'); ?>
                </div>
            <?php endwhile; else : ?>
                <div class="col-12"><?php esc_html_e('Désolé, aucun article ne correspond à vos critères.'); ?></div>
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
