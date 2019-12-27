<?php

/**
 * token 签名加密算法
 *
 */

require_once __DIR__ . '/vendor' . '/autoload.php';

use \Firebase\JWT\JWT;

class CI_Wetalkjwthelp
{
	private $key = "wonderEnglish";

	public function getToken($user){

		$token = array(
			"iss" => base_url(),
			"aud" => base_url(),
			"iat" => time(),
			"nbf" =>time(),
			'username'=>$user->username,
			'userid'=>$user->id
		);
		$accessToken = JWT::encode($token, $this->key);
		return $accessToken;
	}

	public function decodeToken($token){
		return JWT::decode($token, $this->key, array('HS256'));
	}
}

?>
