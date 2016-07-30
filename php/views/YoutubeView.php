<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of YoutubeView
 *
 * @author marcw
 */
class YoutubeView {

	static public function Thumb(Youtube $imput, $small = FALSE) {
		if ($small) {
			$temp = " col-md-6 ";
		}
		echo
		'				<div class="row ' . $temp . '" style="padding-bottom: 5px">
					<div class="col-xs-6 col-sm-6 col-md-6"> <a href="#"> <img class="img-responsive img-hover" src="' . $imput->getyoutubeThumbnail() . '"> </a> </div>
					<div class="col-xs-6 col-sm-6 col-md-6"> 
						<a href="video.php?id=' . $imput->getId() . '"><h4>' . $imput->getTitleEnglish() . '</h4></a>
						<h6>' . $imput->getCreatDate_StringShort() . '<span class="glyphicon glyphicon-time"></span></h6>
					</div>
				</div>';
	}

}
