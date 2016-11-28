<?php
/**
 * Template part for displaying services.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package deadpool
 */

?>
<div class="service col-md-4">
<div class="circle"><?php echo get_field( "icon" ); ;?></div>
<p class="service-name"><?php the_title(); ?></p>
<?php the_content();?>
</div>
