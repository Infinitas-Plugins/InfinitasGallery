<?php
    /**
     * Comment Template.
     *
     * @todo -c Implement .this needs to be sorted out.
     *
     * Copyright (c) 2009 Carl Sutton ( dogmatic69 )
     *
     * Licensed under The MIT License
     * Redistributions of files must retain the above copyright notice.
     *
     * @filesource
     * @copyright     Copyright (c) 2009 Carl Sutton ( dogmatic69 )
     * @link          http://infinitas-cms.org
     * @package       sort
     * @subpackage    sort.comments
     * @license       http://www.opensource.org/licenses/mit-license.php The MIT License
     * @since         0.5a
     */
?>
<div class="gallery">
	<?php
		foreach ($galleries as $gallery) {
			echo $this->Html->tag('h3', $this->Html->link($gallery['GlobalCategory']['title'], array(
				'slug' => $gallery['GlobalCategoryContent']['slug']
			)));

			if(empty($gallery['Image'])) {
				echo __('There are no images in this gallery yet. Come back soon');
				continue;
			}

			
			echo $this->Html->link(
				$this->Html->image($gallery['Image']['content_image_path_small']),
				Router::url($gallery['Image']['content_image_path_full'], true) . '?width=600&height=400',
				array(
					'class' => 'pirobox_' . str_replace('-', '', $gallery['GlobalCategory']['slug']),
					'escape' => false,
					'title' => strip_tags($gallery['Image']['body'])
				)
			);
		}
	?>
</div>