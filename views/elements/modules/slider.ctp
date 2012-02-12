<?php
	if(empty($galleryImages)) {
		$galleryImages = ClassRegistry::init('Gallery.Image')->find('all');
		if(empty($galleryImages)) {
			return false;
		}
	}
?>
<div id="stage-wrap">
	<div id="stage">
		<div class="anythingSlider">
			<div class="wrapper">
				<?php
					$out = array();
					foreach($galleryImages as $image) {
						$tmp = sprintf(
							'<div class="slide-feature round-all fl">%s</div>',
							$this->Html->image(
								$image['Image']['image_path'],
								array(
									'width' => '596'
								)
							)
						);

						$tmp .= sprintf(
							'<div class="slide-content fr"><h2>%s</h2>%s%s</div>',
							$image['Image']['title'],
							$image['Image']['body'],
							$this->Html->link(
								__d('gallery', Configure::read('Website.read_more'), true),
								array(
									'plugin' => 'gallery',
									'controller' => 'galleries',
									'action' => 'view',
									$image['Image']['id']
								)
							)
						);

						$out[] = $tmp;
					}

					echo $this->Design->arrayToList($out);
				?>
			</div>
		</div>
	</div>
</div>