<?php
/**
 * 
 * Component Name: Content Card 
 * 
 * 
 */
$image = get_sub_field('image');
$title = get_sub_field('title');
$desc = get_sub_field('description');
$link = get_sub_field('link');
?>
<div class="content-card content-row">
    <div class="content-row__inner container-lg">
        <div class="teaser teaser--card d-lg-flex align-items-lg-center">
            <?php if(!empty($image)):
                $img_src = $image['url'];
                $img_alt_text = $image['alt'];
            ?>
                <div class="teaser__img col-lg">
                    <div class="media__img">
                        <img class="b-lazy" data-src="<?php $img_src;?>" alt="<?php $img_alt_text;?>"/>
                    </div>
                </div>
            <?php else:?>
                <div class="teaser__img col-lg">
                    <div class="media__img">
                        <img class="b-lazy" data-src="http://placehold.it/400"/>
                    </div>
                </div>
            <?php endif;?>
            <?php if(!empty($title)):?>
                <div class="teaser__text col-lg">
                    <div class="teaser__text-inner">
                        <h2 class="text--heading-2"><?php echo $title;?></h2>
                        <?php if(!empty($desc)):?>
                            <p class="text--body-1"><?php echo $desc;?></p>    
                        <?php endif;?>
                        <?php if(!empty($link)):
                            $link_url = $link['url'];
                            $link_text = $link['title'];    
                        ?>
                            <a class="btn" href="<?php echo $link_url;?>"><?php echo $link_text;?></a>    
                        <?php endif;?>
                    </div>
                </div>    
            <?php endif;?>
        </div>
    </div>
</div>