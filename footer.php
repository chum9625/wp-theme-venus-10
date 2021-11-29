<?php
/**
 * This is footer page.
 *
 * @package WordPress
 * @subpackage NobleVenus
 * @since NobleVenus 1.0
 */

?>
<div class="pagetop js-pagetop"><i class="fas fa-angle-up"></i>PAGE TOP</div>

	<footer class="footer">
		<div class="container">
			<div class="footer_inner">
				<nav class="gnavMainFooter">
					<?php
					$args = array(
						'theme_location' => 'footer-menu',
						'container'      => false,
					);
					wp_nav_menu( $args );
					?>
				</nav>
				<div class="footer_copyright">
					<small>&copy; Noble Venus</small>
				</div>

			</div>
		</div>

		<section class="for-sp">
			<div class="sp-fixed-menu">
				<ul>
					<li><a href="<?php echo esc_url( home_url() ); ?>/kind/treatment/">施術</a></li>
					<li><a href="<?php echo esc_url( home_url() ); ?>/contact"><i class="far fa-envelope fa-lg"></i></a></li>
					<li><a href="<?php echo esc_url( home_url() ); ?>/kind/lesson/">講座</a></li>
				</ul>
			</div>
		</section>
	</footer>

	<?php
	if ( is_home() ) {
		wp_enqueue_style( 'slick-carousel', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', '', '1.0.0' );
		wp_enqueue_script( 'slick-carousel', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', '', '1.0.0', true );
		wp_enqueue_script( 'venus-10-home', get_template_directory_uri() . '/assets/js/home.js', '', '1.0.0', true );
	}
	?>

	<?php wp_footer(); ?>
</body>
</html>
