<?php
/**
 * Template part for displaying clients.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package deadpool
 */

?>
<div class="client col-md-3">
<a href="<?php echo get_field( "url" ) ;?>"><img  class="client-logo" src="<?php the_post_thumbnail_url() ;?>" alt="<?php the_title(); ?>"></a>
<!--<p class="client-name"><?php the_title(); ?></p>-->
</div>
