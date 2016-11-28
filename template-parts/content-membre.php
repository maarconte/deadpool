<?php
/**
 * Template part for displaying members.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package deadpool
 */

?>
<div class="member col-md-3">
	<div class="member-avatar"><img src="<?php the_post_thumbnail_url() ;?>" alt="<?php the_title(); ?>"></div>
<h6 class="member-poste"><?php echo get_field( "poste" ); ;?></h6>
<p class="member-name"><?php the_title(); ?></p>
</div>
