/*
 * Kick start the lightbox
 *
 * you canset the way the lighbox behaves from this file. see blow for the options
 * available to you.
 *
 * my_speed : this is the time in ms it takes for the lightbox to adjust its size
 *		0: instant, 1000: one second etc
 *		
 * bg_alpha : this is how transparent the background is, range 0 -> 1
 *		0: completely transparent, 1: completely opaque (wont see the background)
 *
 * slideShow : if you want the lightbox to change automaticaly (there will be a play and pause button)
 *		true: allow slideshows, false: dont allow slide shows
 *
 * slideSpeed : how lond it takes before moving to the next image in secondss
 *
 * close_all : the classes that when clicked will close the light box
 *
 * Copyright (c) 2010 Carl Sutton ( dogmatic69 )
 *
 * @filesource
 * @copyright Copyright (c) 2010 Carl Sutton ( dogmatic69 )
 * @link http://www.infinitas-cms.org
 * @package gallery
 * @subpackage gallery.config
 * @license http://www.opensource.org/licenses/mit-license.php The MIT License
 * @since 0.1
 *
 * @author dogmatic69
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 */

$(document).ready(function(){
	$gallery = $('.gallery');
	if($gallery){
		$gallery.piroBox({
			my_speed: 300,
			bg_alpha: 0.5,
			slideShow : false,
			slideSpeed : 3,
			close_all : '.piro_close,.piro_overlay'
		});
	}
});