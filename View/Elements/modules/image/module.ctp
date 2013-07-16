<?php
$image = ClassRegistry::init('Gallery.Image')->find('image', $config['id']);
if (empty($image)) {
	echo __d('gallery', 'Failed to load image');
	return;
}
echo $this->Html->tag('div', implode('', array(
	$this->Html->image($image['Image']['content_image_path_full'], array('class' => 'img-polaroid img-rounded')),
	$this->Html->tag('label', strip_tags($image['Image']['body']), array())
)), array('class' => 'image'));