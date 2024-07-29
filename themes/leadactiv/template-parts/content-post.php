<?php
$id = get_the_ID();

if (isset($args) && array_key_exists('id', $args)) {
    $id = $args['id'];
}
?>
<div class="card blog__content p-3 w-100 mx-4">
    <a href="<?php echo get_permalink($id); ?>" class="text-decoration-none text-reset d-flex flex-column h-100">
        <div class="card-body d-flex flex-column position-relative h-100">
            <div class="tag-container position-absolute top-0 start-0 m-3">
                <?php if (get_the_category($id)) : ?>
                    <?php foreach (get_the_category($id) as $term) : 
                        $tag_class = '';
                        switch ($term->name) {
                            case 'Prospection digitale':
                                $tag_class = 'tag-purple';
                                break;
                            case 'Outils et modèles':
                                $tag_class = 'tag-orange';
                                break;
                            case 'Articles de fonds':
                                $tag_class = 'tag-green';
                                break;
                            default:
                                $tag_class = 'tag-gray';
                        }
                    ?>
                        <p class="tag <?php echo $tag_class; ?> f-14 mb-4"><?php echo $term->name; ?></p>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            <h3 class="f-28 card--title pt-3 mt-4"><?php echo get_the_title($id); ?></h3>
            <div class="f-16 card--descr pb-3 col-10 pt-2">
                <?php
                $text = strip_tags(get_field('accroche', $id));
                $words = preg_split("/[\s,]+/", $text);
                $word_limit = 25;
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
                    <div class="author-name f-16 me-5"><?php echo get_the_author(); ?></div>
                    <div class="post-date f-16"><?php echo get_the_date('d F Y'); ?></div>
                </div>
            </div>
        </div>
    </a>
</div>
