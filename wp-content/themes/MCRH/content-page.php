<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package starter_theme
 */
?>

<h1><?php the_title(); ?></h1>

<?php the_content(); ?>

<?php edit_post_link( __( 'Edit', 'starter_theme' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>