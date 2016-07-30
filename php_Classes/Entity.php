<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Entity
 *
 * @author marcw
 */
abstract class Entity {

	protected $id;
	protected $creatDate;
	protected $lastUpdateDate;

	public function __init() {
		$this->id = 0;
		$this->setCreatDate();
		$this->setLastUpdateDate();
	}

	protected function fillFromAssoc($DBrow) {
		$this->id = $DBrow['id'];
		$this->creatDate = new DateTime($DBrow['creatDate']);
		$this->lastUpdateDate = new DateTime($DBrow['lastUpdateDate']);
	}

	protected function bindParamClass($stmt) {
		
	}

//=================================================Const===================================================
	const DB_TABLE_NAME = "";

//================================================CUID===================================================
	protected function Do_comand_Update_Creat($comand, $bindID = FALSE, $creat = FALSE) {
		$conn = DataBase::getConnection();
		if ($conn === null) {
			return FALSE;
		}
		try {
			$stmt = $conn->prepare($comand);

			$this->bindParamClass($stmt);
			if ($bindID) {
				$stmt->bindParam(':id', $this->id);
			}
			$ret = $stmt->execute();
			if ($creat && $ret) {
				$this->id = $conn->lastInsertId();
			}
			return $ret;
		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage();
			return FALSE;
		}
	}

	public function delete($Permenant = FALSE) {
		return static::delete_or_Undo_Static($this->id, TRUE, $Permenant);
	}

	public function undoDelete() {
		return static::delete_or_Undo_Static($this->id, FALSE);
	}

	public static function delete_static($id, $Permenant = FALSE) {
		return static::delete_or_Undo_Static($id, TRUE, $Permenant);
	}

	public static function undoDelete_static($id) {
		return static::delete_or_Undo_Static($id, FALSE);
	}

	protected static function delete_or_Undo_Static($id, $Delete_or_Undo = TRUE, $Permenant = FALSE) {
		$conn = DataBase::getConnection();
		if ($conn === null) {
			return FALSE;
		}
		try {
			if ($Permenant) {
				$stmt = $conn->prepare("DELETE FROM " . static::DB_TABLE_NAME . " WHERE ID=:imputID");
			} else {
				$stmt = $conn->prepare("UPDATE " . static::DB_TABLE_NAME . " SET isDeleted =:isDeleted WHERE id=:id");
				$stmt->bindParam(':isDeleted', $Delete_or_Undo);
			}
			$stmt->bindParam(':imputID', $id);
			$stmt->execute();
			return TRUE;
		} catch (PDOException $e) {
			echo $sql . "<br>" . $e->getMessage();
			return FALSE;
		}
	}

	public function read($id) {
		$conn = DataBase::getConnection();
		if ($conn === null) {
			return FALSE;
		}

		try {

			$stmt = $conn->prepare("SELECT * FROM " . static::DB_TABLE_NAME . " WHERE ID=:imputID");
			$stmt->bindParam(':imputID', $id);
			$stmt->execute();
			$stmt->setFetchMode(PDO::FETCH_ASSOC);

			$temp = $stmt->fetch();
			if ($temp != false) {
				$this->fillFromAssoc($temp);
				return TRUE;
			}
			return FALSE;
		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage();
			return FALSE;
		}
	}

	public static function readAll($offset = 0, $size = 0) {
		$comand = "SELECT * FROM " . static::DB_TABLE_NAME;
		return Do_comand_readAll($comand, $offset, $size);
	}

	protected static function Do_comand_readAll($comand, $offset = 0, $size = 0) {
		if (isset($size) && isset($offset) && 0 < $size && 0 < $offset) {
			$comand .= " LIMIT $size OFFSET $offset";
		}
		$conn = DataBase::getConnection();
		if ($conn === null) {
			return FALSE;
		}

		try {
			$stmt = $conn->prepare($comand);
			$stmt->execute();
			$stmt->setFetchMode(PDO::FETCH_ASSOC);

			$result = array();
			foreach ($stmt->fetchAll() as $value) {
				$temp = new static();
				$temp->fillFromAssoc($value);
				array_push($result, $temp);
			}
			return $result;
		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage();
		}
	}

	public static function Do_comand_Search($comand, $find, $offset = 0, $size = 0) {
		if (isset($size) && isset($offset) && 0 < $size && 0 < $offset) {
			$comand .= " LIMIT $size OFFSET $offset";
		}
		$conn = DataBase::getConnection();
		if ($conn === null) {
			return FALSE;
		}
		$find = '%' . $find . '%';
		try {
			$stmt = $conn->prepare($comand);
			$stmt->bindParam(':find', $find);
			$stmt->execute();
			$stmt->setFetchMode(PDO::FETCH_ASSOC);

			$result = array();
			foreach ($stmt->fetchAll() as $value) {
				$temp = new static();
				$temp->fillFromAssoc($value);
				array_push($result, $temp);
			}
			return $result;
		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage();
		}
	}

//===================================================SET===================================================
	public function setLastUpdateDate() {
		$this->lastUpdateDate = new DateTime();
	}

	public function setCreatDate() {
		$this->creatDate = new DateTime();
	}

//===================================================GET===================================================
	public function getId() {
		return $this->id;
	}

	public function getCreatDate() {
		return $this->creatDate;
	}

	public function getCreatDate_StringShort() {
		return $this->creatDate->format('g:i a - d/m/Y');
	}

	public function getCreatDate_StringLong() {
		return $this->creatDate->format('g:i a - D, d F Y');
	}

	public function getLastUpdateDate() {
		return $this->lastUpdateDate;
	}

	public function getLastUpdateDate_StringShort() {
		return $this->lastUpdateDate->format('g:i a - d/m/Y');
	}

	public function getLastUpdateDate_StringLong() {
		return $this->lastUpdateDate->format('g:i a - D, d F Y');
	}

}
