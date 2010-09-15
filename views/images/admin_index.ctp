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

    echo $this->Form->create('Image', array('url' => array('action' => 'mass')));

    $massActions = $this->Infinitas->massActionButtons(
        array(
            'add',
            'edit',
            'copy', // @todo overwrite and copy file
            'move',
            'toggle',
            'delete' // @todo hard delete should unlink() file.
        )
    );
    echo $this->Infinitas->adminIndexHead($this, $filterOptions, $massActions);
?>
<div class="table">
	<?php
		echo $this->Form->input('all', array('label' => __('Select all', true), 'type' => 'checkbox'));
		foreach ($images as $image){
			?>
				<div title="<?php echo __('File', true), ' :: ', $image['Image']['image']; ?>"class="image">
					<?php
						echo $this->Html->link(
							$this->Html->image(
								$image['Image']['image_path'],
								array(
									'width' => '100px',
									'class' => 'img'
								)
							),
							Router::url('/', true).'img/'.$image['Image']['image_path'].'?width=600&height=400',
							array(
								'class' => 'pirobox_'.str_replace('-', '', $image['Category']['slug']),
								'escape' => false,
								'title' => strip_tags($image['Image']['description'])
							)
						);
					?>
					<div class="name"><?php echo $this->Html->link($this->Text->truncate($image['Image']['image'], 20), array('action' => 'edit', $image['Image']['id'])); ?></div>
					<div class="ext"><span><?php echo __('Category', true), ':</span>', $image['Category']['title']; ?></div>
					<div class="check"><?php echo $this->Form->checkbox($image['Image']['id']); ?></div>
				</div>
			<?php
		}
        echo $this->Form->end(); ?>
</div>
<?php echo $this->element('pagination/admin/navigation'); ?>