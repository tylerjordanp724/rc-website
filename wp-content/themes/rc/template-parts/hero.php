<?php
/**
 * Component: Hero
 * 
 * 
 */
$text = get_sub_field('text');
//$links = get_sub_field('links');
?>

<div class="hero">
    <div class="hero__content container-lg d-flex-md">
        <?php if(!empty($text)):?>
            <div class="hero__content-text col-md">
                <?php echo $text;?>
                <?php if(have_rows('button_group')):?>
                    <div class="buttong-group d-flex">
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
                <>
            </div>
        <?php endif;?>
    </div>
</div>