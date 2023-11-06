<?php
/**
 * @package starter_theme
 */
?>

<h1><?php the_title(); ?></h1>

<?php the_content(); ?>

<?php edit_post_link( __( 'Edit', 'starter_theme' ), '<span class="edit-link">', '</span>' ); ?>