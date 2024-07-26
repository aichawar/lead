<?php
/**
 * @author Aicha Hawa War
 * @version 1.0
 */

 get_header();
?>

    <main class="page__methode container__xl">
        <section class="page__methode--header content-header position-relative mt-5">
            <div class="page__methode--header--top bg-light-purple-gray pt-4 pt-md-5 overflow-hidden">

                <div class="container__lg h-100 d-flex py-sm-4 py-md-5">
                    <div class="row h-100 align-items-center w-100">
                        <div class="col-12 col-md-11 py-3 py-md-0">
                            <h1 class="mb-4 content-mb-0 position-relative deco__trace deco__trace--01"><?php echo get_the_title() ?></h1>
                        </div>
                        <div class="col-md-1 position-relative page__methode--header--top--img d-none d-md-block">
                            <div class="position-absolute start-50 top-50 page__methode--header--top--img--deco">
                                <img class="organic--animate--img" width="369px" src="<?php echo get_template_directory_uri().'/assets/img/deco-header-methode.png' ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php if(get_field('contenu', get_the_ID())): ?>
            <section>
                <div class="container__lg h-100 d-flex py-4 py-md-5">
                    <div class="content-text">
                        <?php echo get_field('contenu', get_the_ID()) ?>
                    </div>
                </div>
            </section>
        <?php endif; ?>
    </main>

<?php
 get_footer();
