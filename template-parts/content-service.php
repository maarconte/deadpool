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
<h6 class="service-name"><?php the_title(); ?></h6>
<?php the_content();?>
</div>
