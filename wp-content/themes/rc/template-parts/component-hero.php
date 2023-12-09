<?php
/**
 * Component: Hero
 * 
 * 
 */
$text = get_sub_field('text');
$image = get_sub_field('image');
?>

<div class="hero d-flex align-items-center">
    <div class="hero__content container-lg d-md-flex align-items-md-center justify-items-md-between">
        <?php if(!empty($text)):?>
            <div class="hero__content-text col-md">
                <?php echo $text;?>
                <?php if(have_rows('button_group')):?>
                    <div class="button-group d-flex">
                        <?php while(have_rows('button_group')): the_row();
                            $link = get_sub_field('link');
                        ?>
                            <?php if(!empty($link)):
                                $link_url = $link['url'];  
                                $link_text = $link['title'];  
                            ?>
                                <a href="<?php echo $link_url;?>" class="btn"><?php echo $link_text;?></a>    
                            <?php endif;?>
                        <?php endwhile;?>
                    </div> 
                <?php endif;?>
            </div>
            <div class="hero__content-media col-md">
                <?php if(!empty($image)):
                    $img_src = $image['url'];
                    $img_alt_text = $image['alt'];
                ?>
                    <div class="media__img">
                        <img src="<?php $img_src;?>" alt="<?php $img_alt_text;?>"/>
                    </div>
                <?php else:?>
                    <div class="media__img">
                        <img src="http://placehold.it/400"/>
                    </div>
                <?php endif;?>
            </div>
        <?php endif;?>
    </div>
</div>