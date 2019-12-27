<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Auth extends CI_Model{  
  
    function verify_users($username, $password){ 
		$password = md5($password);  
        $query = $this->db
			->select('id')
            ->where('user_name', $username) 
            ->limit(1)->get('register_user');
        if($query->num_rows > 0){  
             $qpassword = $this->db
			->select('*')
            ->where('password',$password) 
			 ->where('user_name', $username)
			 ->where_in('user_type', array('administrator','editor'))
            ->limit(1)->get('register_user');
			return $qpassword->row();
		 }  
        return false;  
    }  
	function updatetoken($user,$context){
		$token = base64_encode($user->user_id.time());
		if(!isset($context->device_type)){
			$context->device_type  = $user->device_type;
		}
		if(!isset($context->device_token)){
			$context->device_token  = $user->device_token;
		}
		$data = array(
		'login_token' => $token,
		'device_type'  => $context->device_type,
		'device_token' => $context->device_token,
		'last_login_time'=>date('Y-m-d H:i:s')
	   );
		$this->db->where('user_id', $user->user_id);
		$this->db->update('register_user', $data);
		return $token;
	}
	
	 function verify_client_users($context){
		$password = md5($context->password);  
		$pattern = "/^([0-9A-Za-z\\-_\\.]+)@([0-9a-z]+\\.[a-z]{2,3}(\\.[a-z]{2})?)$/i";
		if(isset($context->mobile) && $context->mobile && !empty($context->mobile) && preg_match( $pattern, $context->mobile ) ){
				$query = $this->db
			->select('user_id')  
            ->where('email',$context->mobile) 
            ->limit(1)->get('register_user'); 
			if($query->num_rows > 0){  
				 $qpassword = $this->db
				->select('*')  
				->where('password',$password) 
				->where('email',$context->mobile) 
				->limit(1)->get('register_user');
			   }	
		}else{
			$query = $this->db
			->select('user_id')  
            ->where('mobile',$context->mobile) 
            ->limit(1)->get('register_user'); 
		   if($query->num_rows > 0){  
				 $qpassword = $this->db
				->select('*')  
				->where('password',$password) 
				->where('mobile',$context->mobile) 
				->limit(1)->get('register_user'); 
		   }
		}
		if( isset($qpassword) && $qpassword->result()){
			$result = $qpassword->result();
			return $result[0];
		}else{
			return false;
		}
        return false;  
    }  
	
	 function verify_admin_users($context){
		$password = md5($context->password);  
		if(isset($context->username)  && !empty($context->username)){
		  $query = $this->db
			->select('user_id')  
            ->where('user_name',$context->username) 
            ->limit(1)->get('register_user'); 
			if($query->num_rows > 0){  
				 $qpassword = $this->db
				->select('*')  
				->where('password',$password) 
				->where('user_name',$context->username) 
				->limit(1)->get('register_user');
			   }	
		}
		if( isset($qpassword) && $qpassword->result()){
			$result = $qpassword->result();
			return $result[0];
		}else{
			return false;
		}
        return false;  
    }  
}  
