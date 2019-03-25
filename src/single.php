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
					<h3>KEEP READING</h3>
					<div class="sidebar-primary-container">
						<?php
							$args = array( 
								'numberposts' => '4',
								'post__not_in' => array( $post->ID )
							);
							$recent_posts = wp_get_recent_posts( $args );
							
							foreach( $recent_posts as $recent ){ 
								echo '<div class="col2-tablet col1-desktop recent-post-box">';
								if ( has_post_thumbnail( $recent["ID"]) ) {
									echo  '<a href="' . get_permalink($recent['ID']) . '">' . get_the_post_thumbnail($recent["ID"],'medium'). '</a>';
								}
								echo '<a href="' . get_permalink($recent['ID']) . '" class="recent-post-title">' .   $recent['post_title'].'</a>';
								echo '<div class="recent-post-excerpt">'. $recent['post_excerpt'] .'</div>';
								echo '<a href="'. get_permalink($recent['ID']).'" class="post-read-more">READ MORE</a>';
								echo '</div>';
							}
							wp_reset_query();
						?>
					</div>
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