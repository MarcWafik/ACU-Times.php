<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserView
 *
 * @author marcw
 */
class UserView {

	static public function Normal12($ID, $name, $Email, $isAdmin, $IMG, $accsesArr) {
		$MakeAdmin = "";
		if ($isAdmin) {
			$MakeAdmin = '
				<div class="dropdown col-xs-2">
					<button class="btn-setting btn btn-default " data-toggle="dropdown" aria-haspopup="true" > <i class="fa fa-bars" aria-hidden="true"></i> </button>
					<ul class="dropdown-menu" aria-labelledby="dLabel">
						<li><a  href="redir_delete_user.php?id=' . $ID . '"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a></li>
						<li><a  href="#"><i class="fa fa-key" aria-hidden="true"></i> Reset PW</a></li>
						<li role="separator" class="divider"></li>';
			foreach ($accsesArr as &$value) {
				$MakeAdmin .= '<li><a  href="redir_access_user.php?id=' . $ID . '&accessID=' . $value->getId() . '">' . $value->getTitleEnglish() . '</a></li>';
			}
			$MakeAdmin .= '</ul></div>';
		}
		echo '<hr>
			<div class="container">
				<div class=" col-xs-10">
					<div class="col-sm-2 text-center"><a href="profile.php?id=' . $ID . '"><img src="' . $IMG . '" class="img-80x80 img-circle"></a></div>
					<div class="col-sm-10">
						<h4><a href="profile.php?id=' . $ID . '">' . $name . '</a><br>
							<small>' . $ID . '<br>' . $Email . '</small></h4>
					</div>
				</div>
						' . $MakeAdmin . '
			</div>';
	}

}
