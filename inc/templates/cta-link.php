
<a href="<?php echo $url; ?>" class="cta-link <?php echo $classes; ?>" <?php if( !empty( $new_tab == 1 ) ) { echo'target="_blank"'; } ?>>
	<?php if( !empty( $label ) ) { echo $label; } else { echo'Click Here!'; } ?>
	<i class="fa fa-angle-double-right" aria-hidden="true"></i>
</a>