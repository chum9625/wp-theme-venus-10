<?php
/**
 * This is sidebar-categories component.
 *
 * @package WordPress
 * @subpackage NobleVenus
 * @since NobleVenus 1.0
 */

?>
<aside class="archive">
	<h2 class="archive_title">カテゴリ 一覧</h2>
	<ul class="archive_list">
		<?php
		$args = array(
			'title_li' => ' ', // 見出し削除--!
		);
		wp_list_categories( $args );
		?>
	</ul>
</aside>
