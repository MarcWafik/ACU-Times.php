<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Image
 *
 * @author marcw
 */
class Image {

	const ARTICLE = "article";
	const USER = "user";
	const GALLERY = "gallery";

	public static function getMainImage($id, $type) {
		return "images/" . $type . "/" . $id . ".jpg";
	}

	public static function upload() {
		$target_dir = "\\Data\\IMG";
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

// Check if image file is a actual image or fake image
		if (getimagesize($_FILES["fileToUpload"]["tmp_name"]) === false) {
			return FALSE; //File is not an image
		}
		/* Check if file already exists
		  if (file_exists($target_file)) {
		  echo "Sorry, file already exists.";
		  $uploadOk = 0;
		  } */
// Check file size
		if ($_FILES["fileToUpload"]["size"] > 800000) {
			return FALSE;
		}
// Allow certain file formats
		if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
			return FALSE;
		}
// if everything is ok, try to upload file
			if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
				echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
			} else {
				echo "Sorry, there was an error uploading your file.";
			}
	}

}
