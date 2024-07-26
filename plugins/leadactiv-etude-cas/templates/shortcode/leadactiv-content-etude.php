<?php
$id = get_the_ID();

if(isset($args) && array_key_exists('id', $args)) {
    $id = $args['id'];
}
?>
<div class="card">
    <a href="<?php echo get_permalink($id); ?>">
        <figure class="card--img">
            <img src="<?php echo get_the_post_thumbnail_url($id) ?>"/>
        </figure>

        <div class="p-4">

            <div class="tag tag-light-purple f-13 mb-3 text-start"><?php if(get_the_terms( $id, 'typeetudedecas')) { $cpt= 1; foreach (get_the_terms( $id, 'typeetudedecas') as $term): echo '<span>'.$term->name.'</span>'; echo ($cpt != count(get_the_terms( $id, 'typeetudedecas'))) ? ' | ' : ''; $cpt++; endforeach; }?></div>
            <h3 class="f-18 card--title"><?php echo get_the_title($id)?></h3>
            <div class="f-14 card--descr mb-3">
                <?php
                $text = strip_tags(get_field('accroche', $id));
                $words = preg_split("/[\s,]+/", $text);
                $word_limit = 25;
                $excerpt = implode(' ', array_slice($words, 0, $word_limit));
                //var_dump($excerpt);

                if (count($words) > $word_limit) {
                    $excerpt .= '...';
                }

                echo $excerpt;
                ?>
            </div>
            <div class="card--link"><?php _e('Découvrir l’étude de cas'); ?></div>
        </div>
    </a>
</div>