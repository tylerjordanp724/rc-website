<?php 
/**
 * Component Name: Testimonials
 * 
 * 
 */
$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
$args = array(
    'post_type' => 'rc_testimonial', 
    'posts_per_page' => 12,
    'paged' => $paged,
    'order' => 'ASC');
$post_query = new WP_Query($args);
?>
<?php if($post_query -> have_posts()): $count = 0;?>
    <div class="archive content-row">
        <div class="archive__inner container-lg">
            <?php while($post_query -> have_posts()): $post_query -> the_post();
                $count++;
                $author_name = get_field('author_name');
                $content = get_field('testimonial');
            ?>
            <div class="archive__item">
                <?php if(!empty($author_name)):?>
                    <h3 class="text--heading-3"><?php echo $author_name;?></h3>    
                <?php endif;?>
                <?php if(!empty($content)):?>
                    <div class="item__content">
                        <?php echo $content;?>
                    </div>    
                <?php endif;?>
            </div>
            <?php endwhile;?>
        </div>
        <?php if($count >= 12):?>
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
        <?php endif; wp_reset_postdata();?>
    </div>
<?php endif;?>


