<?php

require_once API_ROOT_PATH . 'oss/samples/Common.php';

use OSS\OssClient;
use OSS\Core\OssException;
use OSS\Http\RequestCore;
use OSS\Http\ResponseCore;

class CI_Oss{

	function __construct() {

	}

	public function pushObject($path,$content){
		$bucket = Common::getBucketName();
		$ossClient = Common::getOssClient();
		$result = $ossClient->putObject($bucket, $path, $content);
//		Common::println("b.file is created");
//		Common::println($result['x-oss-request-id']);
//		Common::println($result['etag']);
//		Common::println($result['content-md5']);
//		Common::println($result['body']);
		return $result;
	}


	public function pushNEWObject($path,$content){
		$bucket = Common::getBucketNewName();
		$ossClient = Common::getOssClient();
		$result = $ossClient->putObject($bucket, $path, $content);
//		Common::println("b.file is created");
//		Common::println($result['x-oss-request-id']);
//		Common::println($result['etag']);
//		Common::println($result['content-md5']);
//		Common::println($result['body']);
		return $result;
	}


	public function createSignUrl($object){
		$timeout = 3600;
		$signedUrl = "";
		try {
			$ossClient = Common::getOssClient();
			$bucket = Common::getBucketNewName();
			// 生成GetObject的签名URL。
			$signedUrl = $ossClient->signUrl($bucket, $object, $timeout);
		} catch (OssException $e) {
//			printf(__FUNCTION__ . ": FAILED\n");
//			printf($e->getMessage() . "\n");
			//return false;
		}
		return $signedUrl;
	}

	public function createSignUrlWeSpeak($object){
		$timeout = 3600;
		$signedUrl = "";
		try {
			$ossClient = Common::getOssClient();
			$bucket = Common::getBucketName();
			// 生成GetObject的签名URL。
			$signedUrl = $ossClient->signUrl($bucket, $object, $timeout);
		} catch (OssException $e) {
//			printf(__FUNCTION__ . ": FAILED\n");
//			printf($e->getMessage() . "\n");
			//return false;
		}
		return $signedUrl;
	}


	public function createSignUrlNewWeSpeak($object){
		$timeout = 3600;
		$signedUrl = "";
		try {
			$ossClient = Common::getOssClient();
			$bucket = Common::getBucketNewName();
			// 生成GetObject的签名URL。
			$signedUrl = $ossClient->signUrl($bucket, $object, $timeout);
		} catch (OssException $e) {
//			printf(__FUNCTION__ . ": FAILED\n");
//			printf($e->getMessage() . "\n");
			//return false;
		}
		return $signedUrl;
	}


	public function createSignUrlTeacheExam($object){
		$timeout = 3600;
		$signedUrl = "";
		try {
			$ossClient = Common::getOssClient();
			$bucket = Common::getBucketName();
			// 生成GetObject的签名URL。
			$signedUrl = $ossClient->signUrl($bucket, $object, $timeout);
		} catch (OssException $e) {
//			printf(__FUNCTION__ . ": FAILED\n");
//			printf($e->getMessage() . "\n");
			//return false;
		}
		return $signedUrl;
	}


}
// END ws class

/* End of file class_ws.php */
/* Location: ./server/class_ws.php */