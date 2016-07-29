<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PrintHTML
 *
 * @author marcw
 */
class PrintHTML {

	static public function numericOption($start, $end) {
		//$right_now = getdate();
		//$this_year = $right_now['year'];
		for ($i = $start; $i >= $end; $i--) {
			echo "<option value='{$i}' >{$i}</option>";
		}
		for ($i = $start; $i <= $end; $i++) {
			echo "<option value='{$i}' >{$i}</option>";
		}
	}

//============================================PORTOFOLIO===================================================
	static public function portofolio_12row_next_large_($title, $link, $description, $time, $img) {
		echo
		'<div class="row">
				<div class="col-md-7"> <a href="' . $link . '"> <img class="img-responsive img-rounded img-hover" src="' . $img . '"> </a> </div>
				<div class="col-md-5">
					<a href="' . $link . '"><h3>' . $title . '</h3></a>
					<h5> ' . $time . ' <span class="glyphicon glyphicon-time"></span></h5>
					<p>' . $description . '</p>
				</div>
			</div>
			<hr>';
	}

	static public function portofolio_12row_next_normal($title, $link, $description, $time, $img) {
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

	static public function portofolio_8row_under_large($title, $link, $description, $time, $img) {
		echo
		'<div class="col-md-8 img-portfolio"> 
			<a href="' . $link . '"> <img class="img-responsive img-rounded img-hover" src="' . $img . '"> </a> 
			<a href="' . $link . '"><h3>' . $title . '</h3></a>
			<h5> ' . $time . ' <span class="glyphicon glyphicon-time"></span></h5>
			<p>' . $description . '</p>
		</div>';
	}
	static public function portofolio_4row_under_small($title, $link, $description, $time, $img) {
		echo
		'<div class="col-md-4 img-portfolio"> 
			<a href="' . $link . '"> <img class="img-responsive img-rounded img-hover" src="' . $img . '"> </a> 
			<a href="' . $link . '"><h3>' . $title . '</h3></a>
			<h5> ' . $time . ' <span class="glyphicon glyphicon-time"></span></h5>
			<p>' . $description . '</p>
		</div>';
	}
}
