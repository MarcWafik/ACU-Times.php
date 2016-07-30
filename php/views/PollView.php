<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PollView
 *
 * @author marcw
 */
class PollView {

	static public function Normal(Poll $imput) {
		$totalClicks = $imput->getTotalClicks();
		if ($totalClicks == 0) {
			$totalClicks = 1;
		}
		echo'<div class=" col-lg-4 col-sm-6 col-xs-12">
				<h3>' . $imput->getTitleEnglish() . '</h3>
				<div> ';
		foreach ($imput->getArrChoices() as $value) {
			$value = new PollChoice;
			$percent = (int) (($value->getVotes() / $totalClicks) * 100);
			echo '<a name="poll_bar" >' . $imput . '</a> <span name="poll_val">' . $percent . '% </span><br/>';
		}
		echo'</div></div>';
	}

}
