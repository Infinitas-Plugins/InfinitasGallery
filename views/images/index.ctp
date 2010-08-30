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
		foreach ($galleries as $gallery){
			?><h3><?php echo $gallery['Category']['title']; ?></h3><?php
			echo $gallery['Category']['description'];

			if(!empty($gallery['Image'])){
				foreach($gallery['Image'] as $image){
					echo $this->Html->link(
						$this->Html->image($image['image_path']),
						Router::url('/', true).'img/'.$image['image_path'].'?width=600&height=400',
						array(
							'class' => 'pirobox_'.str_replace('-', '', $gallery['Category']['slug']),
							'escape' => false,
							'title' => strip_tags($image['description'])
						)
					);
				}
			}
			else{
				echo __('There are no images in this gallery yet. Come back soon', true);
			}
		}
	?>
</div>