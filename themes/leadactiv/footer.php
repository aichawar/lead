<?php
$option_fields = get_fields('option');
$page_id = get_queried_object_id();
?>

<?php wp_footer(); ?>

<footer class="footer bg-dark-green container__xl">
    <section class="footer-main ">
        <div class=" text-white">
            <div class="row">
                <div class="col-lg-4">
                    <?php if($option_fields["logo_clair"]): ?>
                        <a href="<?php echo home_url('/') ?>" class="footer__logo d-flex align-items-center link-dark text-decoration-none py-4">
                            <img class="w-100" src="<?php echo $option_fields["logo_clair"]['url'] ?>" alt="LeadActiv Logo">
                        </a>
                    <?php endif; ?>
                </div>
                <div class="col-6 col-lg-2 py-4">
                    <?php
                    wp_nav_menu(array(
                        'menu' => 'footer-gauche',
                        'menu_class' => 'footer-menu',
                    ));
                    ?>
                </div>
                <div class="col-6 col-lg-2 py-4">
                    <?php
                    wp_nav_menu(array(
                        'menu' => 'footer-droite',
                        'menu_class' => 'footer-menu',
                    ));
                    ?>
                </div>
                <div class="col-lg-4 text-end d-flex align-items-end justify-content-end position-relative">
                    <div class="footer-graphic">
                        <?php if($option_fields["logo_violet"]): ?>
                            <img src="<?php echo $option_fields["logo_violet"]['url'] ?>" alt="Graphic" class="logo-violet">
                        <?php endif; ?>
                        <div class="social-media position-absolute end-0">
                            <a href="https://www.linkedin.com/company/leadactiv" target="_blank" class="social-link">
                                <i class="fa fa-linkedin linkedin-logo"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="footer-bottom-wrapper">
        <div class="text-center">
            <hr class="footer-divider">
            <div class="footer-links d-flex justify-content-between align-items-center">
                <div class="links">
                    <a href="#">Cookies</a>
                    <a href="#">Documents légaux</a>
                    <a href="#">Politique de confidentialité</a>
                </div>
                <div class="copyright">
                    <span>&copy; Copyright LeadActiv 2024, tous droits réservés</span>
                </div>
            </div>
        </div>
    </section>
</footer>

</body>
</html>
