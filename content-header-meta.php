<?php if(!is_page() && !is_tag()): ?> 
		
	<span class="header-meta">
	
		<?php echo sprintf(__('Publié le %2$s par %3$s dans %4$s | '), get_post_format_string(get_post_format()), get_the_date(), get_the_author_link(), get_the_category_list('/')); ?> 
		
		<?php comments_number(__('Aucun commentaire', TEXT_TRANSLATION_DOMAIN), __('Un commentaire', TEXT_TRANSLATION_DOMAIN), __('% commentaires', TEXT_TRANSLATION_DOMAIN)); ?> 
		
		<?php edit_post_link(__('Éditer', TEXT_TRANSLATION_DOMAIN)); ?>
		
	</span>

<?php endif; ?>