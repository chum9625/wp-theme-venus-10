<?php
/**
 * This is single-menu page.
 *
 * @package WordPress
 * @subpackage NobleVenus
 * @since NobleVenus 1.0
 */

get_header(); ?>

	<h2 class="pageTitle">メニュー<span>menu</span></h2>

	<?php get_template_part( 'template-parts/breadcrumb' ); ?>

	<?php if ( have_posts() ) : ?>
		<?php
		while ( have_posts() ) :
			the_post();
			?>
	<main class="main">
		<section class="sec">
			<div class="container">
				<div class="article article-menu">
					<div class="row">
						<div class="col-12 col-md-6">
							<h2 class="article_title"><?php the_title(); ?></h2>
							<div class="content">
								<?php the_content(); ?>
							</div>
						</div>

						<div class="col-12 col-md-6">
							<div class="article_pic">
								<?php
								$pic = get_field( 'pic' );
								// 大サイズ画像URL--!
								$pic_url = $pic['sizes']['large'];
								?>
								<img src="<?php echo esc_url( $pic_url ); ?>" alt="">
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="info">
				<div class="container">
					<ul class="info_list">
						<li>
							<b>料金</b>
							<span><?php the_field( 'price' ); ?></span>
						</li>
						<li>
							<b>所要時間</b>
							<span><?php the_field( 'timed' ); ?></span>
						</li>
						<li>
							<b>有効性</b>
							<span>
							<?php
							$efficacies = get_field( 'efficacies' );
							foreach ( $efficacies as $key => $efficacy ) {
								echo esc_html( $efficacy );
								if ( end( $efficacies ) !== $efficacy ) {
									echo '、';
								}
							}
							?>
							</span>
						</li>
						<li>
							<b>お着替え</b>
							<?php if ( get_field( 'change_clothes' ) ) : ?>
								<span>必要あり</span>
								<?php else : ?>
									<span>必要なし</span>
									<?php endif; ?>
						</li>
					</ul>
				</div>
			</div>
		</section>
	</main>
<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>
