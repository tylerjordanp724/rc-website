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
<?php if($post_query -> have_posts()):?>
    <div class="archive content-row">
        <div class="archive__inner container">
            <?php while($post_query -> have_posts()): $post_query -> the_post();
                $author_name = get_sub_field('author_name');
            ?>
            <?php endwhile; wp_reset_postdata();?>
        </div>
    </div>
<?php endif;?>


