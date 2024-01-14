<?php
/**
 * 
 * Component Name: Featured Testimonial 
 *
 */
$title = get_sub_field('title');
$testimonial = get_sub_field('testimonial');
$link = get_sub_field('link');
?>
<div class="featured-testimonial">
    <div class="featured-testimonial__inner container-lg d-flex align-items-center">
        <div class="inner-content col-lg-8 m-auto">
            <div class="inner-content__wrapper">
                <?php if(!empty($title)):?>
                    <h2 class="text--heading-2"><?php echo $title;?></h2>
                <?php endif;?>
                <?php foreach($testimonial as $post): setup_postdata($post);
                    $text = get_field('testimonial');
                    $author = get_field('author_name');
                ?>
                    <?php if(!empty($text)):?>
                        <div class="quote">
                            <span class="quote__text"><?php echo $text;?></span>
                            <div class="quote__author">- <?php echo $author;?></div>
                        </div>
                    <?php endif;?>
                <?php endforeach;?>
                <?php if(!empty($link)):
                    $link_url = $link['url'];
                    $link_text = $link['title'];    
                ?>
                    <a class="btn btn--inverse" href="<?php echo $link_url;?>"><?php echo $link_text;?></a>    
                <?php endif;?>
            </div>
        </div>
    </div>
</div>