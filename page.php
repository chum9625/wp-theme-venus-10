<?php
/**
 * This is page template.
 *
 * @package WordPress
 * @subpackage NobleVenus
 * @since NobleVenus 1.0
 */

get_header(); ?>

<?php if ( have_posts() ) : ?>
	<?php
	while ( have_posts() ) :
		the_post();
		?>

	<h2 class="pageTitle"><?php the_title(); ?><span><?php echo esc_html( $post->post_name ); ?></span></h2>

		<?php get_template_part( 'template-parts/breadcrumb' ); ?>

	<main class="main">
		<div class="container">
			<div class="content">
				<?php the_content(); ?>
			</div>
		</div>
	</main>

<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>
