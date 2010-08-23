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
			foreach($gallery['Image'] as $image){
				echo $this->Html->link(
					$this->Html->image(
						$image['image_path'],
						array(
							'width' => '100px'
						)
					),
					Router::url('/', true).'img/'.$image['image_path'],
					array(
						'class' => 'pirobox_'.str_replace('-', '', $gallery['Category']['slug']),
						'escape' => false,
						'title' => strip_tags($image['description'])
					)
				);
			}
		}
	?>
</div>