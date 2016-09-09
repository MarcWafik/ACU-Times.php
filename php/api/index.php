<?php

require_once 'autoload.php';
header("Access-Control-Allow-Origin: *");
//header("Content-Type: application/json; charset=UTF-8");
header('Access-Control-Allow-Headers: X-Requested-With');
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
//date_default_timezone_set('Africa/Cairo');

($_SERVER['REQUEST_METHOD'] == "OPTIONS") ? exit() : null;

$parameter = RouteController::getParameter();

$class = @strtolower($parameter[0]);
$action = @strtolower($parameter[1]);

switch ($class) {
	case 'user':
		switch ($action) {
			case 'create':

				break;
			case 'read':

				break;
			case 'update':

				break;
			case 'updatepw':

				break;
			case 'delete':

				break;
			case 'login':

				break;
			case 'checkemail':

				break;
			default:
				http_response_code(400);
				break;
		}
		break;
//==========================================================
	default:
		http_response_code(400);
		break;
}















/*
switch ($class) {
	case 'todo':
		switch ($_SERVER['REQUEST_METHOD']) {
			case 'POST':
				echo TodoController::create();
				break;
			case 'GET':
				echo TodoController::readAll(); //echo TodoController::read(); or 
				break;
			case 'PUT':
				echo TodoController::update();
				break;
			case 'DELETE':
				echo TodoController::delete();
				break;
			default:
				break;
		}
		break;
//==========================================================
	case 'user':
		switch ($_SERVER['REQUEST_METHOD']) {
			case 'POST':
				switch ($action) {
					case 'create':
						echo UserController::create();
						break;
					case 'login':
						echo UserController::login();
						break;
					default:
						break;
				}
				break;
			case 'GET':
				echo UserController::read();
				break;
			case 'PUT':
				echo UserController::update();
				break;
			case 'DELETE':
				echo UserController::delete();
				break;
			default:
				break;
		}
		break;
//==========================================================
	default:
		echo "Error :class does not exists";
}
*/