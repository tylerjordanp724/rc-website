<?php
/**
 * Component Name: Featured Content
 * 
 * 
 */
$title_card = get_sub_field('title_card');
$featured_content = get_sub_field('featured_content');
?>

<div class="featured-content content-row">
    <div class="content-row__inner container-lg d-md-flex justify-content-md-between">
        <?php if(!empty($title_card)):
            $title = $title_card['title'];
            $short_desc = $title_card['short_description'];
            $link = $title_card['link'];    
        ?>
            <div class="title-card col-md-2">
                <div class="title-card__header">
                    <?php if(!empty($title)):?>
                        <h2 class="text--heading-2"><?php echo $title;?></h2>
                    <?php endif;?>
                    <?php if(!empty($short_desc)):?>
                        <p class="text--body-1"><?php echo $short_desc;?></p>    
                    <?php endif;?>
                </div>
                <?php if(!empty($link)):
                    $link_url = $link['url'];
                    $link_text = $link['title'];    
                ?>
                    <a class="btn" href="<?php echo $link_url;?>"><?php echo $link_text;?></a>    
                <?php endif;?>
            </div>
            <?php if(!empty($featured_content)):?>
                <div class="teaser-group col-md-8 d-md-flex">
                    <?php foreach($featured_content as $post): setup_postdata($post);
                        $v_intro = get_field('vehicle_intro');
                        $title = get_the_title();
                        $v_price = $v_intro['price'];
                        $v_mileage = $v_intro['mileage'];
                        $feat_img = get_the_post_thumbnail_url();
                    ?>
                        <div class="teaser col-md">
                            <?php if(!empty($feat_img)):?>
                                <div class="media__img">
                                    <img class="b-lazy" data-src="<?php echo $feat_img;?>" />
                                </div> 
                            <?php else:?>
                                <div class="media__img">
                                    <img class="b-lazy" data-src="http://placehold.it/200" />
                                </div> 
                            <?php endif;?>
                            <?php if(!empty($title)):?>
                                <h3 class="text--heading-3"><?php echo $title;?></h3>
                            <?php endif;?>
                            <?php if(!empty($v_price)):?>
                                <div class="text--body-bold">
                                    <span><?php echo $v_price;?></span>
                                </div>    
                            <?php endif;?>
                            <?php if(!empty($v_mileage)):?>
                                <div class="text--body-1">
                                    <span><?php echo $v_mileage;?> miles</span>
                                </div>
                            <?php endif;?>
                            <a href="<?php echo get_permalink();?>" class="btn--underline">
                                <span>More info</span>
                            </a>
                        </div> 
                    <?php endforeach; wp_reset_postdata();?>
                </div>
            <?php endif;?>
        <?php endif;?>
    </div>
</div>