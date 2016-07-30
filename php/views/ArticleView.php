<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ArticleView
 *
 * @author marcw
 */
class ArticleView {

	private function __construct() {
		
	}

	static public function Large12Next($title, $link, $description, $time, $img) {
		echo
		'<div class="row">
				<div class="col-md-7"> <a href="' . $link . '"> <img class="img-responsive img-rounded img-hover" src="' . $img . '"> </a> </div>
				<div class="col-md-5">
					<a href="' . $link . '"><h2>' . $title . '</h2></a>
					<h5> ' . $time . ' <span class="glyphicon glyphicon-time"></span></h5>
					<p>' . $description . '</p>
				</div>
			</div>
			<hr>';
	}

	static public function Normal12Next($title, $link, $description, $time, $img) {
		echo
		'<div class="row">
					<div class="col-md-3"> <a href="' . $link . '"> <img class="img-responsive img-rounded img-hover" src="' . $img . '"> </a> </div>
					<div class="col-md-9">
						<a href="' . $link . '"><h3>' . $title . '</h3></a>
						<h5> ' . $time . ' <span class="glyphicon glyphicon-time"></span></h5>
						<p>' . $description . '</p>
					</div>
				</div>
				<hr>';
	}

	static public function Large8Under($title, $link, $description, $time, $img) {
		echo
		'<div class="col-md-8 img-portfolio"> 
			<a href="' . $link . '"> <img class="img-responsive img-rounded img-hover" src="' . $img . '"> </a> 
			<a href="' . $link . '"><h3>' . $title . '</h3></a>
			<h5> ' . $time . ' <span class="glyphicon glyphicon-time"></span></h5>
			<p>' . $description . '</p>
		</div>';
	}

	static public function Small4Under($title, $link, $description, $time, $img) {
		echo
		'<div class="col-md-4 img-portfolio"> 
			<a href="' . $link . '"> <img class="img-responsive img-rounded img-hover" src="' . $img . '"> </a> 
			<a href="' . $link . '"><h3>' . $title . '</h3></a>
			<h5> ' . $time . ' <span class="glyphicon glyphicon-time"></span></h5>
			<p>' . $description . '</p>
		</div>';
	}

}
