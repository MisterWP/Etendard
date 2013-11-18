<?php
$texte = $url = $bouton = '';
$template = explode('/', get_page_template());
$template = $template[count($template)-1];

if ($template === 'template_home.php'){
	$custom = get_post_custom();
	
	$texte = $custom['etendard_home_cta_text'][0];
	$url = $custom['etendard_home_cta_url'][0];
	$bouton = $custom['etendard_home_cta_bouton'][0];
}
else if (get_post_type() === 'portfolio'){
	$texte = get_option("etendard_cta_texte");
	$url = get_option("etendard_cta_url");
	$bouton = get_option("etendard_cta_bouton");
}
?>
<?php if ($texte && $url): ?>
<section class="cta">
	<div class="wrapper">
		<p class="cta-text">
			<?php echo $texte; ?>
		</p>
		<div class="button-wrapper">
			<a href="<?php echo esc_attr($url); ?>" class="cta-button">
				<?php if ($bouton){ ?>
					<?php echo esc_html($bouton); ?>
				<?php } else { ?>
					<?php _e('Cliquez ici', TEXT_TRANSLATION_DOMAIN); ?>
				<?php } ?>
			</a>
		</div>
	</div>
</section>
<?php endif; ?>