<?php
	if(empty($galleryImages)) {
		$galleryImages = ClassRegistry::init('Gallery.Image')->find('active');
		if(empty($galleryImages)) {
			return false;
		}
	}
	
	$out = array();
	$counter = 1;
	foreach($galleryImages as &$image) {
		$image['Image']['full_image'] = $this->Html->image(
			$image['Image']['image_path'],
			array(
				'width' => '596'
			)
		);
		
		$image['Image']['even'] = $counter++ % 2;
	}
	
	echo $this->renderTemplate($galleryImages[0]['Layout']['html'], array('galleryImages' => $galleryImages));