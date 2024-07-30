<?php

if (isset($args) && array_key_exists('bloc', $args)) {
    $lame_etude_cas = $args['bloc'];
}

$all_etudes = array();

if (array_key_exists("selectionner_toutes_etudes", $lame_etude_cas)) {

    if ($lame_etude_cas["selectionner_toutes_etudes"]) {

        $loop = \Genesii\PostType\EtudeDeCas::findAll();
        if ($lame_etude_cas["selectionner_toutes_etudes"][0] == 'true') {
            if ($loop->have_posts()) {
                while ($loop->have_posts()) {
                    $loop->the_post();
                    $all_etudes[] = get_post();

                }
                wp_reset_postdata();

            }
        }
    }
}

?>

<section class="lame--etude-cas">
    <div class="container__lg">
        <div class="row align-items-center justify-content-center text-center">
            <div class="col-12">
                <?php if ($lame_etude_cas["etiquette"]): ?>
                    <h3 class="tag mt-4 mb-3 px-2 justify-content-center text-center">
                        <?php echo $lame_etude_cas["etiquette"] ?>
                    </h3>
                <?php endif; ?>

                <?php if ($lame_etude_cas["titre"]): ?>
                    <h2 class="pt-1 pb-4 small-title f-36 mx-lg-5 mx-md-5 px-md-6 px-lg-6" >
                        <?php echo $lame_etude_cas["titre"] ?>
                    </h2>
                <?php endif; ?>
            </div>
        </div>

        <div class="row g-4">
            <?php
            if (count($all_etudes) > 0)
                $etudes = $all_etudes;
            else
                $etudes = $lame_etude_cas["etudes_cas"];

            $count = 0;
            ?>

            <?php foreach (is_array($etudes) ? $etudes : [] as $etude): ?>
                <?php if ($count >= 4) break; ?>
                <?php $etude_fields = get_fields($etude->ID); ?>
                <div class="col-12 col-md-6 col-lg-6 mb-4 d-flex">
                    <a href="<?php echo get_permalink($etude->ID); ?>" class="card-link w-100">
                        <div class="card h-100 p-3 w-100 bg-white">
                            <div class="card-body d-flex flex-column">
                                <!-- Card Header for Logo and Tag -->
                                <div class="card-header-etude d-flex justify-content-between align-items-start mb-2">
                                    <div class="card-logo-container">
                                        <?php if ($etude_fields["logo_client"]): ?>
                                            <img class="card-logo" src="<?php echo $etude_fields["logo_client"]["url"] ?>"
                                                alt="<?php echo $etude_fields["logo_client"]["alt"] ?>">
                                        <?php endif; ?>
                                    </div>
                                    <div class="tag-container">
                                        <?php if (get_the_terms($etude->ID, 'typeetudedecas')):
                                            foreach (get_the_terms($etude->ID, 'typeetudedecas') as $term): ?>
                                                <span class="tag mb-1 tag-<?php echo $etude_fields["couleur"] ?>">
                                                    <?php echo $term->name; ?>
                                                </span>
                                            <?php endforeach; endif; ?>
                                    </div>
                                </div>
                                <!-- Title and Description -->
                                <h3 class="f-22 card--title mt-2 pt-3">
                                    <?php echo get_the_title($etude->ID); ?>
                                </h3>
                                <div class="f-16 card--description mb-3 col-12 col-md-9">
                                    <?php
                                    $text = strip_tags(get_field('accroche', $etude->ID));
                                    $words = preg_split("/[\s,]+/", $text);
                                    $word_limit = 15;
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
                <?php $count++; ?>
            <?php endforeach; ?>
        </div>

        <div class="row justify-content-center mt-5 mb-0">
            <div class="col-auto text-center">
                <?php if ($lame_etude_cas["lien_etudes_cas"]): ?>
                    <a class="btn color-btn-dark"
                       target="<?php echo $lame_etude_cas["lien_etudes_cas"]["target"] ?>"
                       href="<?php echo $lame_etude_cas["lien_etudes_cas"]["url"] ?>">
                        <?php echo $lame_etude_cas["lien_etudes_cas"]["title"] ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
