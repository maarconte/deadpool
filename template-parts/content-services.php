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
<?php echo get_field( "icon" ); ;?>
<p class="service-name"><?php the_title(); ?></p>
<?php the_content();?>
</div>
