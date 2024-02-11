<?php
/**
 * Component Name: Inventory
 * 
 */
$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
$args = array(
    'post_type' => 'rc_vehicle', 
    'posts_per_page' => 12,
    'paged' => $paged,
    'order' => 'ASC');
$post_query = new WP_Query($args);
?>
<?php if($post_query -> have_posts()): $count = 0;?>
<div class="archive content-row">
    <div class="archive__inner container-lg d-md-flex flex-wrap px-0">
        <?php while($post_query -> have_posts()): $post_query -> the_post();
            $count++;
            $v_intro = get_field('vehicle_intro');
            $title = get_the_title();
            $v_price = $v_intro['price'];
            $v_mileage = $v_intro['mileage'];
            $feat_img = get_the_post_thumbnail_url();
        ?>
            <div class="teaser col-md-6 col-lg-3">
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
        <?php endwhile;?>
    </div>
    <?php if($count <= 12):?>
        <div class="archive__pagination container-lg">
            <?php echo paginate_links( 
                array(
                'base'         => str_replace(999999999, '%#%', esc_url(get_pagenum_link( 999999999 ))),
                'total'        => $post_query->max_num_pages,
                'current'      => $paged,
                'format'       => '?paged=%#%',
                'show_all'     => false,
                'type'         => 'list',
                'end_size'     => 1,
                'mid_size'     => 1,
                'prev_next'    => true,
                'prev_text'    => sprintf(  __( '&larr; Prev', 'text-domain' ) ),
                'next_text'    => sprintf(  __( 'Next &rarr;', 'text-domain' ) ),
                'add_args'     => false,
                'add_fragment' => '',
                ) 
            );?>
        </div>
    <?php endif;?>
</div>
<?php endif; wp_reset_postdata();?>