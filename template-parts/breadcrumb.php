<?php
/**
 * This is template-parts-breadcrumb page.
 *
 * @package WordPress
 * @subpackage NobleVenus
 * @since NobleVenus 1.0
 */

?>
<div class="breadcrumb">
	<div class="breadcrumb_inner">
		<?php
		if ( function_exists( 'bcn_display' ) ) {
			bcn_display();
		}
		?>
	</div>
</div>
