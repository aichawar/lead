<section class="lame--partenaire py-5 text-center">
    <div class="owl-carousel owl-carousel-partenaires">
        <?php foreach($args['logos_partenaires'] as $logo): ?>
            <div class="lame--partenaire--logo-container position-relative">
                <figure>
                    <img class="w-100 h-100 px-3" src="<?php echo $logo["logo"]["url"] ?>" alt="<?php echo $logo["logo"]["alt"] ?>">
                </figure>
            </div>
        <?php endforeach; ?>
    </div>
</section>