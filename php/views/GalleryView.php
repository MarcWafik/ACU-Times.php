<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GalleryView
 *
 * @author marcw
 */
class GalleryView {

	static public function Normal12(Gallery $gallery) {
		echo'<div class="row">
					<h4>' . $gallery->getTitleEnglish() . '<small>&nbsp;&nbsp;&nbsp;' . $gallery->getCreatDate_StringShort() . ' </small></h4>';
		for ($index = 0; $index < $gallery->getImageNumber(); $index++) {
			echo '<div class="gallery-div"> 
						<a class="fancybox" rel="group" href="' . Image::getMainImage($gallery->getId(), Image::GALLERY, $index) . '"><img src="' . Image::getMainImage($gallery->getId(), Image::GALLERY, $index) . '" height="200" class="img-gallery"/></a>
					</div>';
		}
		echo '</div>';
	}

}
