<div class="col-md-4 post-wrapper">

	<div class="thumbnail post-content">
			<a href="<?php the_permalink(); ?>"><h6 class="post-title"><?php the_title(); ?></h6></a>
<div class="avatar-author" style="background-image:url('<?php echo get_avatar_url('the_author_ID()');?>')"></div>
			<?php the_category();?>
		<a href="<?php the_permalink(); ?>">

									<div class="post-img" style="background-image: url(<?php the_post_thumbnail_url(); ?>)">
										</div></a>

		<div class="caption">
			<?php the_excerpt(); ?>
		<a href="<?php the_permalink(); ?>" class="more">Lire plus</a>
		</div>

	</div>
</div>
