<?php 
/*
Template Name: Sans sidebar
*/
?>
<?php get_header(); ?>
<section class="blog grid">
	<div class="wrapper">
		<h2 class="section-title">
			<?php _e('Blog', TEXT_TRANSLATION_DOMAIN); ?>
		</h2>
		
		<div>
			<?php /* The loop */ ?>
			<?php while (have_posts()) : the_post(); ?>
				<?php get_template_part('content', get_post_format()); ?>
				<?php comments_template(); ?>
			<?php endwhile; ?>
		</div>
	</div>
</section>
<?php get_footer(); ?>