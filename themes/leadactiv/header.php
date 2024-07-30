<?php
/**
 * @author Aicha Hawa War
 * @version 1.0
 */
?>

<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta name="format-detection" content="telephone=no">

    <link rel="stylesheet" type="text/css" href="path/to/your/custom/styles.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link href="https://assets.calendly.com/assets/external/widget.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@100..800&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Albert+Sans:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <!-- In header.php -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/build/css/index.css?v=1.0.0">


    <!-- Google Tag Manager -->
    <script>(function (w, d, s, l, i) {
            w[l] = w[l] || []; w[l].push({
                'gtm.start':
                    new Date().getTime(), event: 'gtm.js'
            }); var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : ''; j.async = true; j.src =
                    'https://www.googletagmanager.com/gtm.js?id=' + i + dl; f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-N862X2J');
    </script>
    <!-- End Google Tag Manager -->
    <script src="https://assets.calendly.com/assets/external/widget.js" type="text/javascript"></script>

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N862X2J" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <header>
  <nav class="navbar navbar-expand-lg fixed-top py-2 py-lg-3 
  <?php
  if (is_front_page()) {
      echo 'navbar-home';
  } elseif (is_page(array('notre-methode', 'lagence', 'contact'))) {
      echo 'navbar-method-agency-contact';
  } elseif (is_page(array('etudes-de-cas'))) {
      echo 'navbar-cas-blog';
  } elseif (is_page(array('blog', 'page__blog')) || is_home()) {
      echo 'navbar-cas-blog';
  } else {
      echo 'navbar-single';
  }
  ?>">
      <div class="container-fluid">
        <a class="navbar-brand" href="<?php echo home_url('/') ?>">
          <img class="w-100 logo
          <?php
          if (!is_front_page()) {
              echo 'logo-dark';
          }
          ?>" src="<?php echo get_field('logo_blanc', 'option')['url'] ?>" alt="">
        </a>
        <button class="navbar-toggler collapsed burger border-0 shadow-none" type="button"
          data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse"
          aria-expanded="false" aria-label="Toggle navigation">
          <span class="span-1"></span>
          <span></span>
          <span></span>
        </button>
        <div class="navbar-collapse collapse" id="navbarCollapse">
          <ul id="header" class="navbar-nav me-auto align-items-sm-center pt-1">
            <li id="menu-item-403" class="btn-menu ms-lg-4 mt-3 mt-lg-0 menu-item menu-item-type-post_type menu-item-object-page menu-item-403">
              <a href="<?php echo home_url('/notre-methode/'); ?>">Notre méthode</a>
            </li>
            <li id="menu-item-404" class="btn-menu ms-lg-4 mt-3 mt-lg-0 menu-item menu-item-type-post_type menu-item-object-page menu-item-404">
              <a href="<?php echo home_url('/lagence/'); ?>">L’agence</a>
            </li>
            <li id="menu-item-405" class="btn-menu ms-lg-4 mt-3 mt-lg-0 menu-item menu-item-type-post_type menu-item-object-page menu-item-405">
              <a href="<?php echo home_url('/etudes-de-cas/'); ?>">Études de cas</a>
            </li>
            <li id="menu-item-406" class="btn-menu ms-lg-4 mt-3 mt-lg-0 menu-item menu-item-type-post_type menu-item-object-page menu-item-406">
              <a href="<?php echo home_url('/blog/'); ?>">Blog</a>
            </li>
            <li id="menu-item-407" class="btn-menu ms-lg-4 mt-3 mt-lg-0 menu-item menu-item-type-post_type menu-item-object-page menu-item-407">
              <a href="<?php echo home_url('/contact/'); ?>">Contact</a>
            </li>
          </ul>
          <ul class="navbar-nav ms-auto align-items-sm-center">
            <li id="menu-item-580" class="btn
            <?php
            if (is_front_page()) {
                echo 'btn-purple-black';
            } else {
                echo 'color-btn-dark';
            }
            ?> ms-lg-3 mt-3 mt-lg-0 menu-item menu-item-type-post_type menu-item-object-page menu-item-580">
              <a href="<?php echo home_url('/prendre-rendez-vous/'); ?>">Prendre rendez-vous</a>
            </li>
          </ul>
        </div>
      </div>
  </nav>
</header>
