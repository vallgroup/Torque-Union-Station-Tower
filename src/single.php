<?php
/**
 * The Template for displaying all single posts
 *
 * @package 		torque
 * @author 			Torque
 */
?>
<?php TQ::get_template_parts( array( 'parts/shared/html-header' ) ); ?>

<main>
	<?php
	if ( have_posts() ) {
		while ( have_posts() ) {
			the_post();
	?>
		<?php get_template_part( 'parts/templates/titles/title-page', get_post_format() ); ?>

		<div class="post-container">
				<div class="blog-post-data">
					<?php get_template_part( 'parts/templates/titles/title', get_post_format() ); ?>
					<?php get_template_part( 'parts/templates/post-thumbnail', get_post_format() ); ?>
					<?php get_template_part( 'parts/templates/content', get_post_format() ); ?>
				</div>
				<div class="blog-post-sidebar">
					<?php get_template_part( 'sidebar-primary', get_post_format() ); ?>
					<?php get_template_part( 'parts/templates/recent-posts', get_post_format() ); ?>
				<div>
		</div>
	<?php
		}
	}
	else {  ?>

		<h1>
			<?php echo 'Nothing to show yet.'; ?>
		</h1>

	<?php } ?>
</main>
<?php TQ::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>