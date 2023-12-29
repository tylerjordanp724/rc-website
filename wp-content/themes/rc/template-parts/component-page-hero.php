<?php 
/**
 * Component Name: Page Hero
 * 
 * 
 */
    $page_title = get_the_title();
    $tagline = get_field('tagline');
?>
<div class="page-hero d-flex align-items-center">
    <div class="page-hero__inner container-lg">
        <?php if(!empty($page_title)):?>
            <h1 class="text--heading-1"><?php echo $page_title;?></h1>    
            <?php if(!empty($tagline)):?>
                <p class="text--body-2"><?php echo $tagline;?></div>    
            <?php endif;?>
        <?php endif;?>
    </div>
</div>