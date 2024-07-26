<?php

namespace Genesii\PostType;

use Genesii\Kernel\PostType\AbstractPostType;

final class EtudeDeCas extends AbstractPostType {

    const SLUG = "etudedecas";
    const REWRITE_SLUG = "etudes-de-cas";
    const SINGULAR_NAME = "Etude de cas";
    const PLURIAL_NAME = "Etudes de cas";
    const FEMININE = true;
    const MENU_POSITION = 4;
    const MENU_ICON = 'dashicons-book-alt';
    const PUBLIC = true;
    const REMOVE_EDITOR = true;
    const PUBLICLY_QUERYABLE = true;
    const SHOW_UI = true;
    const SHOW_IN_MENU = null;
    const SHOW_IN_REST = true;
    const QUERY_VAR = true;
    const CAPABILITY_TYPE = 'post';
    const HAS_ARCHIVE = false;
    const HIERARCHICAL = true;
    const SUPPORTS = ['thumbnail', 'title'];

    public static function hooks(): void 
    {
        // ...
        // ici, déclaration des hooks associés à ce type de contenu, exemple :


        add_action('wp_ajax_load_more_etudes_de_cas', [self::class, 'load_more_etudes_de_cas']);
        add_action('wp_ajax_nopriv_load_more_etudes_de_cas', [self::class, 'load_more_etudes_de_cas']);
    }

    public static function save($id): void
    {
        // ...
        // action à effectuer juste après l'enregistrement du post, exemple pour 
        // définir une meta custom au post qui vient d'être créé/enregistré :

        /* 
        $etudeDeCas = new EtudeDeCas($id);
        $etudeDeCas->setMeta('ma_custom_meta', 'valeur');

        var_dump($etudeDeCas->getMeta('ma_custom_meta'));
        exit();
        */
    }

    public static function findAll($limit = -1, $page = 1, $filterByOrder = false): \WP_Query
    {
        $query = [
            'post_type'         => self::SLUG,
            'post_status'       => 'publish',
            'posts_per_page'    => $limit,
            'paged' => $page
        ];

        if ($filterByOrder) {
            $query['meta_key'] = 'ordre';
            $query['orderby']  = 'meta_value';
            $query['order']    = 'ASC';
        }
        return new \WP_Query($query);
    }

    // Fonction pour gérer la requête Ajax et renvoyer les résultats au format JSON
    public static function load_more_etudes_de_cas() {
        $paged = $_POST['paged'];

        $loop = \Genesii\PostType\EtudeDeCas::findAll(-1, $paged);


        if ($loop->have_posts()) {
            ob_start();
            while ($loop->have_posts()) {
                $loop->the_post();

                $classes = "col-md-6 col-lg-4 mb-3 mb-sm-4 mb-lg-2 page__etude--content--grid--item grid--actus--items ";
                if(get_the_terms( get_the_ID(), 'typeetudedecas')) {
                    $cpt= 1;
                    foreach (get_the_terms( get_the_ID(), 'typeetudedecas') as $term):
                        $classes.= $term->slug.' ';
                    endforeach;
                }

                echo '<div class="'.$classes.'">';
                    echo do_shortcode('[leadactiv-content-etude id='.get_the_ID().']');
                echo '</div>';
            }
            $result = ob_get_clean();
            wp_send_json_success($result);
        } else {
            wp_send_json_error();
        }
    }
}

