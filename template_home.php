<?php /* Template Name: Home */ ?>
<?php get_header(); ?>

<?php
$display_blocks = of_get_option('etendard_blocks_presence');
$ordre_blocks = array('titre'=>of_get_option('etendard_blocks_ordre_titre'), 
					  'slider'=>of_get_option('etendard_blocks_ordre_slider'),
					  'cta'=>of_get_option('etendard_blocks_ordre_cta'),
					  'portfolio'=>of_get_option('etendard_blocks_ordre_portfolio'),
					  'articles'=>of_get_option('etendard_blocks_ordre_articles'));
asort($ordre_blocks);
?>

<?php 
foreach ($ordre_blocks as $block=>$ordre){
	if (!$display_blocks || !array_key_exists($block, $display_blocks) || !$display_blocks[$block]) continue;
	
	switch ($block){
		case 'titre':
			get_template_part('home_elements/titre');
			break;
		case 'slider':
			get_template_part('home_elements/slider');
			break;
		case 'portfolio':
			get_template_part('home_elements/portfolio');
			break;
		case 'articles':
			get_template_part('home_elements/articles');
			break;
		case 'cta':
			get_template_part('call_to_action');
			break;
	}
}
?>

<?php get_footer(); ?>