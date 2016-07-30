<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DataBase
 *
 * @author marcw
 */
class DataBase {
	/*
	  private static $servername = "sql304.byethost7.com";
	  private static $username = "b7_18011127";
	  private static $password = "33151732";
	  private static $dbname = "b7_18011127_journalcms";

	  private static $servername = "mysql13.000webhost.com";
	  private static $username = "a6053072_a605307";
	  private static $password = "Itsnotasecret12";
	  private static $dbname = "a6053072_CMS";
	 */

	private static $servername = "localhost";
	private static $username = "root";
	private static $password = "";
	private static $dbname = "journalcms";
	private static $dbConnection = null;

	public static function getConnection() {
		if (static::$dbConnection === null) {
			try {
				static::$dbConnection = new PDO("mysql:host=" . static::$servername . ";dbname=" . static::$dbname, static::$username, static::$password);
				// set the PDO error mode to exception
				static::$dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				return static::$dbConnection;
			} catch (PDOException $e) {
				static::$dbConnection = null;
				echo "Connection failed: " . $e->getMessage();
			}
		}
		return static::$dbConnection;
	}

}
