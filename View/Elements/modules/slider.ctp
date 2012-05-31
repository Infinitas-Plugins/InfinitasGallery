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
		$image['Image']['content_image_path_full'] = $this->Html->image(
			$image['Image']['content_image_path_full'],
			array(
				'width' => '596'
			)
		);
		
		$image['Image']['even'] = $counter++ % 2;
	}
	
	echo $this->renderTemplate($galleryImages[0]['Layout']['html'], array('galleryImages' => $galleryImages));