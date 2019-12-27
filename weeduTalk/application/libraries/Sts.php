<?php

require_once API_ROOT_PATH . 'oss/sts/aliyun-php-sdk-core/Config.php';

use Sts\Request\V20150401 as Sts;

class CI_Sts{

	function __construct() {

	}

	public function getOssMessage(){
		define("REGION_ID", "cn-hangzhou");
		define("ENDPOINT", "sts.cn-hangzhou.aliyuncs.com");
// 只允许子用户使用角色
		DefaultProfile::addEndpoint(REGION_ID, REGION_ID, "Sts", ENDPOINT);
		$iClientProfile = DefaultProfile::getProfile(REGION_ID, "LTAIgYrbp5YsfAhG", "gwDGSLiU3nr7yKQVQb0WnFdafVA8Ec");
		$client = new DefaultAcsClient($iClientProfile);
// 角色资源描述符，在RAM的控制台的资源详情页上可以获取
		$roleArn = "acs:ram::20989462:role/aliyunosstokengeneratorrole";
// 在扮演角色(AssumeRole)时，可以附加一个授权策略，进一步限制角色的权限；
// 详情请参考《RAM使用指南》
// 此授权策略表示读取所有OSS的只读权限
		$policy=<<<POLICY
				{
  "Version": "1",
  "Statement": [
    {
      "Action": ["oss:List*", "oss:Get*"],
      "Resource":["acs:oss:*:*:weedutalk", "acs:oss:*:*:weedutalk/*"],
      "Effect": "Allow"
    }
  ]
}
POLICY;
		$request = new Sts\AssumeRoleRequest();
// RoleSessionName即临时身份的会话名称，用于区分不同的临时身份
// 您可以使用您的客户的ID作为会话名称
		$request->setRoleSessionName("client_name");
		$request->setRoleArn($roleArn);
		$request->setPolicy($policy);
		$request->setDurationSeconds(3600);
		try {
			$response = $client->getAcsResponse($request);
			return $response;
			//print_r($response);
		} catch(ServerException $e) {
			//print "Error: " . $e->getErrorCode() . " Message: " . $e->getMessage() . "\n";
		} catch(ClientException $e) {
			//print "Error: " . $e->getErrorCode() . " Message: " . $e->getMessage() . "\n";
		}
		$response = new stdClass();
		return $response;
	}


	public function getOssMessage1(){
		define("REGION_ID", "cn-hangzhou");
		define("ENDPOINT", "sts.cn-hangzhou.aliyuncs.com");
// 只允许子用户使用角色
		DefaultProfile::addEndpoint(REGION_ID, REGION_ID, "Sts", ENDPOINT);
		$iClientProfile = DefaultProfile::getProfile(REGION_ID, "LTAIgYrbp5YsfAhG", "gwDGSLiU3nr7yKQVQb0WnFdafVA8Ec");
		$client = new DefaultAcsClient($iClientProfile);
// 角色资源描述符，在RAM的控制台的资源详情页上可以获取
		$roleArn = "acs:ram::20989462:role/aliyunosstokengeneratorrole";
// 在扮演角色(AssumeRole)时，可以附加一个授权策略，进一步限制角色的权限；
// 详情请参考《RAM使用指南》
// 此授权策略表示读取所有OSS的只读权限
		$policy=<<<POLICY
				{
  "Version": "1",
  "Statement": [
    {
      "Action": ["oss:List*", "oss:Get*"],
      "Resource":["acs:oss:*:*:wespeak", "acs:oss:*:*:wespeak/*"],
      "Effect": "Allow"
    }
  ]
}
POLICY;
		$request = new Sts\AssumeRoleRequest();
// RoleSessionName即临时身份的会话名称，用于区分不同的临时身份
// 您可以使用您的客户的ID作为会话名称
		$request->setRoleSessionName("client_name");
		$request->setRoleArn($roleArn);
		$request->setPolicy($policy);
		$request->setDurationSeconds(3600);
		try {
			$response = $client->getAcsResponse($request);
			return $response;
			//print_r($response);
		} catch(ServerException $e) {
			//print "Error: " . $e->getErrorCode() . " Message: " . $e->getMessage() . "\n";
		} catch(ClientException $e) {
			//print "Error: " . $e->getErrorCode() . " Message: " . $e->getMessage() . "\n";
		}
		$response = new stdClass();
		return $response;
	}

}
// END ws class

/* End of file class_ws.php */
/* Location: ./server/class_ws.php */