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

    echo $this->Form->create(null, array('url' => array('action' => 'mass')));
	echo $this->Infinitas->adminIndexHead();
?>
<div class="dashboard">
	<?php
		if(!empty($globalImages)){
			echo $this->Form->input('all', array('label' => __('Select all'), 'type' => 'checkbox'));
		}
		echo '<div class="images">';
			foreach ($globalImages as $image) { ?>
				<div class="image">
					<span>
						<?php 
							echo $this->Html->link(
								$this->Text->truncate($image['GlobalCategory']['title'], 25), 
								array(
									'action' => 'index', 
									'GlobalContent.global_category_id' => $image['GlobalContent']['global_category_id']
								)
							); 
						?>
					</span>
					<?php
						echo $this->Html->link(
							$this->Html->image(
								$image['Image']['image_path'],
								array(
									'width' => '150px',
									'class' => 'img'
								)
							),
							$image['Image']['image_path'],
							array(
								'class' => 'thickbox',
								'escape' => false,
								'title' => sprintf(' :: %s', $image['GlobalCategory']['title'])
							)
						);
					?>
				</div> <?php
			}
		echo '</div>';
        echo $this->Form->end(); ?>
</div>