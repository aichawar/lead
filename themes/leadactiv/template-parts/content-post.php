<?php
$id = get_the_ID();

if(isset($args) && array_key_exists('id', $args)) {
    $id = $args['id'];
}
?>
<div class="card p-3 w-100 mx-4">
    <a href="<?php echo get_permalink($id); ?>" class="text-decoration-none text-reset">
        <div class="card-body h200 d-flex flex-column position-relative">
            <div class="tag-container position-absolute top-0 start-0 m-3">
                <?php if(get_the_category($id)) : ?>
                    <?php foreach(get_the_category($id) as $term) : ?>
                        <p class="tag tag-light-purple f-13 mb-2"><?php echo $term->name; ?></>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            <h3 class="f-22 card--title pt-3 mt-4" style="font-size: 22px;"><?php echo get_the_title($id); ?></h3>
            <div class="f-14 card--descr pb-3 col-10 pt-2">
                <?php
                $text = strip_tags(get_field('accroche', $id));
                $words = preg_split("/[\s,]+/", $text);
                $word_limit = 100;
                $excerpt = implode(' ', array_slice($words, 0, $word_limit));

                if (count($words) > $word_limit) {
                    $excerpt .= '...';
                }

                echo $excerpt;
                ?>
            </div>
            <div class="d-flex align-items-center mt-auto">
                <div class="author-avatar me-2">
                    <?php echo get_avatar(get_the_author_meta('ID'), 32); ?>
                </div>
                <div class="author-details">
                    <div class="author-name f-14 me-2"><?php echo get_the_author(); ?></div>
                    <div class="post-date f-14"><?php echo get_the_date('d F Y'); ?></div>
                </div>
            </div>
        </div>
    </a>
</div>
