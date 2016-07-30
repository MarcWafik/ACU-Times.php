<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RedirectController
 *
 * @author marcw
 */
class Header {

	public static function Location($to) {
		return header("Location: " . $to);
	}

	public static function ResponseCode($code) {
		//return http_response_code($code);
		return header("Location: error.php?err=" . $code);
	}

	const REDIR_HOME = "index.php";
	const REDIR_LOGIN = "login.php";
	//============================================
	const CONTINUE_ = 100;
	const SWITCHING_PROTOCOLS = 101;
	const OK = 200;
	const CREATED = 201;
	const ACCEPTED = 202;
	const NON_AUTHORITATIVE_INFORMATION = 203;
	const NO_CONTENT = 204;
	const RESET_CONTENT = 205;
	const PARTIAL_CONTENT = 206;
	//============================================
	const MULTIPLE_CHOICES = 300;
	const MOVED_PERMANENTLY = 301;
	const MOVED_TEMPORARILY = 302;
	const SEE_OTHER = 303;
	const NOT_MODIFIED = 304;
	const USE_PROXY = 305;
	//============================================
	const BAD_REQUEST = 400;
	const UNAUTHORIZED = 401;
	const PAYMENT_REQUIRED = 402;
	const FORBIDDEN = 403;
	const NOT_FOUND = 404;
	const METHOD_NOT_ALLOWED = 405;
	const NOT_ACCEPTABLE = 406;
	const PROXY_AUTHENTICATION_REQUIRED = 407;
	const REQUEST_TIME_OUT = 408;
	const CONFLICT = 409;
	const GONE = 410;
	const LENGTH_REQUIRED = 411;
	const PRECONDITION_FAILED = 412;
	const REQUEST_ENTITY_TOO_LARGE = 413;
	const REQUEST_URI_TOO_LARGE = 414;
	const UNSUPPORTED_MEDIA_TYPE = 415;
	//==========================================
	const INTERNAL_SERVER_ERROR = 500;
	const NOT_IMPLEMENTED = 501;
	const BAD_GATEWAY = 502;
	const SERVICE_UNAVAILABLE = 503;
	const GATEWAY_TIME_OUT = 504;
	const HTTP_VERSION_NOT_SUPPORTED = 505;

	public static function FirendlyErrorCode($code) {
		$description = "";
		switch ($code) {
			case 100: $text = 'Continue';
				break;
			case 101: $text = 'Switching Protocols';
				break;
			case 200: $text = 'OK';
				break;
			case 201: $text = 'Created';
				break;
			case 202: $text = 'Accepted';
				break;
			case 203: $text = 'Non-Authoritative Information';
				break;
			case 204: $text = 'No Content';
				break;
			case 205: $text = 'Reset Content';
				break;
			case 206: $text = 'Partial Content';
				break;
			case 300: $text = 'Multiple Choices';
				break;
			case 301: $text = 'Moved Permanently';
				break;
			case 302: $text = 'Moved Temporarily';
				break;
			case 303: $text = 'See Other';
				break;
			case 304: $text = 'Not Modified';
				break;
			case 305: $text = 'Use Proxy';
				break;
			case 400: $text = 'Bad Request';
				break;
			case 401: $text = 'Unauthorized';
				$description = 'Sorry, but it appears that you don\'t have access to that page.';
				break;
			case 402: $text = 'Payment Required';
				break;
			case 403: $text = 'Forbidden';
				break;
			case 404: $text = 'Not Found';
				$description = 'Sorry, but the page you are looking for was either not found or does not exist.<br/>
				Try refreshing the page or click the button below to go back to the Homepage.';
				break;
			case 405: $text = 'Method Not Allowed';
				break;
			case 406: $text = 'Not Acceptable';
				break;
			case 407: $text = 'Proxy Authentication Required';
				break;
			case 408: $text = 'Request Time-out';
				break;
			case 409: $text = 'Conflict';
				break;
			case 410: $text = 'Gone';
				break;
			case 411: $text = 'Length Required';
				break;
			case 412: $text = 'Precondition Failed';
				break;
			case 413: $text = 'Request Entity Too Large';
				break;
			case 414: $text = 'Request-URI Too Large';
				break;
			case 415: $text = 'Unsupported Media Type';
				break;
			case 500: $text = 'Internal Server Error';
				break;
			case 501: $text = 'Not Implemented';
				break;
			case 502: $text = 'Bad Gateway';
				break;
			case 503: $text = 'Service Unavailable';
				break;
			case 504: $text = 'Gateway Time-out';
				break;
			case 505: $text = 'HTTP Version not supported';
				break;
			default:
				$text = 'Unknown http status code';
				break;
		}
		return array('text' => $text, 'description' => $description);
	}

}
