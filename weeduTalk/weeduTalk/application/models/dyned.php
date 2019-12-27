<?php

if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class Dyned extends CI_Model
{

	public $usename   = 'stanford-staff';

	public $password  = "ketizud2e";



    public function __construct()
    {
        parent::__construct();
    }

	/*
	 *
	 *  获取dyned产品包List
	 *
	 * */

	public function getProuductList(){
		$products = $this->db->get("dyned_products")->result();
		$data = array();
		foreach($products as $product){
			$data[] = array(
				"product_id"=>$product->id,
				"name"		=>$product->name,
				"price"     =>$product->price,
			);
		}
		return $data;
	}

	/*
	 * POST 请求
	 *  name,password,email,product_id
	 *
	 */

	public function addNewStudent(){
		$post = $this->input->post();
		$post['product_id'] = 1;
		$post['name'] = "rose";
		$post['email'] = "rose@144.ro";
		$post['password'] = '123456';

		if(!isset($post['product_id']) || empty($post['product_id'])){
			$this->returncode['errcode'] = '100001';
			$this->returncode['errdesc'] = '请选择要购买的产品类别!';
		}else if(!isset($post['name']) || empty($post['name'])){
			$this->returncode['errcode'] = '100002';
			$this->returncode['errdesc'] = '请填写姓名!';
		}else if(!isset($post['email']) || empty($post['email'])){
			$this->returncode['errcode'] = '100003';
			$this->returncode['errdesc'] = '请填写Email 字段!';
		}else if(!isset($post['password']) || empty($post['password'])){
			$this->returncode['errcode'] = '100004';
			$this->returncode['errdesc'] = '请输入密码!';
		}else{
			$row = $this->db->where("id",$post['product_id'])->get("dyned_products")->row();
			if($row){

				$password= base64_encode($this->usename.':'.$this->password);
				$headers = array(
					"Content-type: application/json;charset='utf-8'",
					"Accept: application/json",
					"Cache-Control: no-cache",
					"Pragma: no-cache",
					"Authorization: Basic $password"
				);
				$student = array(
					"classroom"		=>  $row->dyned_class_url,
					"name"			=>	$post['name'],
					"password"		=>	$post['password'],
					"email"			=>	$post['email'],
					"model_student"	=>	$row->student_url
				);
				$data_string = json_encode($student);
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, "https://cn2api.records.dyned.com/students/");
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
				curl_setopt($ch, CURLOPT_POSTFIELDS,$data_string);
				curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
				curl_setopt($ch, CURLOPT_HEADER, 0);
				$output = curl_exec($ch);
				curl_close($ch);
				$output = json_decode($output);
				if(isset($output->email) && $output->email != $post['email']){
					//Email 已经注册过
					$this->returncode['errcode'] = '100006';
					$this->returncode['errdesc'] = 'email 已经注册!';
				}else{
					$this->returncode['data'] = array(
						"name"			=>	 $output->name,
						"email"			=>	 $output->email,
						"classroom"     =>   $output->classroom
					);
				}
			}else{
				$this->returncode['errcode'] = '100005';
				$this->returncode['errdesc'] = '产品不存在!';
			}
		}
		return $this;
	}



}