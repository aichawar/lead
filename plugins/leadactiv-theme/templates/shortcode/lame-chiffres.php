<?php
$display = "dark";

if(isset($args) && array_key_exists('display', $args)) {
    $display = $args['display'];
}

$fields = get_field('lames_contenu',$args['id']);

foreach ($fields as $bloc){
    if($bloc['acf_fc_layout'] == 'lame_chiffres'){
        $lame_chiffres =  $bloc;
        break;
    }
}
?>

<div class="<?php echo ($display == "light") ? "container__md" : "container__xl"; ?> py-4 py-md-5">
    <div class="row justify-content-center align-items-center">
        <?php 
        $count = count(is_array($lame_chiffres["chiffres"]) ? $lame_chiffres["chiffres"] : []);
        $index = 0;
        foreach(is_array($lame_chiffres["chiffres"]) ? $lame_chiffres["chiffres"] : [] as $chiffre): 
        ?>
            <div class="col-md-4 d-flex flex-column justify-content-center align-items-center text-center position-relative">
                <h2 class="page__home--chiffres--chiffre mb-4"><?php echo $chiffre["chiffre"] ?></>
                <?php if($chiffre["legende"]) : ?>
                    <p class="page__home--chiffres--legend mb-0 mt-3"><?php echo $chiffre["legende"] ?></p>
                <?php endif; ?>
                <?php if ($index < $count - 1): ?>
                    <div class="divider position-absolute top-50 end-0 translate-middle-y"></div>
                <?php endif; ?>
            </div>
            <?php $index++; ?>
        <?php endforeach; ?>
    </div>
</div>
