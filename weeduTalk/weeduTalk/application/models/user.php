<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Model
{


    public $objectType = 'user';
    public $type = 'user';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('notification');
        $this->load->model('recordmanager');
        $this->load->model('unit');
        $this->_initialize();

    }


    public function _initialize($config = array())
    {
        $config['attributes'] = array(
            'id'                => array("require" => false),
//            'mobile'            => array("require" => true),
//            "email"             => array("require" => false),
            "username"          => array("require" => false),
            "name"              => array("require" => false),
//            'registerDate'      => array("require" => false),
//            'lastvisitDate'     => array("require" => false),
            'user_type'         => array("require" => false),
//            'device_type'       => array("require" => false),
//            'push_user_id'      => array("require" => false),
//            'push_channel_id'   => array("require" => false),
            'letter'            => array("require" => false),
            'avatar'            => array("require" => false),
            'block'             => array("require" => false),
            'mt_time'           => array("require" => false),
            'click_time'        => array("require" => false),
            'sr_time'           => array("require" => false),
            'wait_time'         => array("require" => false),
            'course_ids'         => array("require" => false),
            'status'         => array("require" => false),
            'body'         => array("require" => false),
            'uuid'         => array("require" => false),
//            "calculation_date_time" => array("require" => false)


        );
        parent::_initialize($config);
    }

    public function getUser($id)
    {
        $iuser = new self;
        $data = $this->config['attributes'];
        $user = $this->db->select(implode(',', array_keys($data)))->where("id", $id)->get("users")->row_array();
        if ($user) {
            foreach ($user as $key => $val) {
                if (empty($val)) $val = "";
                $iuser->$key = $val;
            }

            $permissions = $iuser->getUserRolePermission();
            if((!$permissions || count($permissions) == 0)) {
                $iuser->course_ids = $iuser->setCourseIds()->course_ids;
                $iuser->user_type = $iuser->setCourseIds()->user_type;
            }
        } else {
            $iuser->id = 0;
        }
        return $iuser;
    }

    public function setCourseIds(){
        $item1 = new stdClass();
        $item1->course_ids = 0;
        $item1->user_type = "";
        $class = $this->getUserSchoolGradeClassRealtionShip();
        if($class){
            $item1->user_type = $class->user_type;
            $item = $this->db->select("*")
                ->where("id",$class->class_id)
                ->get("classes")->row();
            $item->user_type = $class->user_type;
            if($item){
                if($class->user_type == "student"){
                    return $item;
                }else{
                    if(empty($this->course_ids)){
                        return $item;
                    }else{
                        $item1->course_ids = $this->course_ids;
                        return $item1;
                    }
                }

            }
        }else{
            $item1->course_ids = "0";
        }

        return $item1;

    }

    public function getUserInfo()
    {
        $class = $this->getUserSchoolGradeClassRealtionShip();
        if($this->id == 53){
            $OSS_TEST_BUCKET = "wespeak";
        }else{
            $OSS_TEST_BUCKET = "weedutalk";
        }
        $data = array(
            'id' => (int)$this->id,
            'username' => $this->username,
//            'mobile' => $this->mobile,
            'name' => $this->name,
            'access_token' => $this->wetalkjwthelp->getToken((object)array('id' => $this->id, 'username' => $this->username)),
            "avatar_url" => $this->getAvatarUrl(),
            "letter"     => $this->letter,
            'follower_ids'=> $this->getFollowerIds(),
            'group_ids'   => $this->getGroupIds(),
            'my_radar_charts_url' => anchorurl('components/users/getMyRadarWebView/' . $this->id),
            'my_ranking_list_url'  => anchorurl('components/users/getStudentRankingList/'),
            'my_unchain_list_url' => anchorurl('components/users/unLockLesson/'),
            'my_mt_list_url'      => anchorurl('components/users/getusetMTList/'),
            'my_work_list_url'      => anchorurl('components/users/markHomework/'),
            'user_type'   => $this->user_type,
            'mt_time'     => $this->mt_time,
            'click_time'  => $this->click_time,
            'sr_time'     => $this->sr_time,
            'wait_time'   => $this->wait_time,
            'course_ids'   => $this->course_ids,
            "OSS_ENDPOINT"  => 'https://oss-cn-hangzhou.aliyuncs.com',
            "OSS_TEST_BUCKET" =>$OSS_TEST_BUCKET
        );

        $user = $this->db->select("is_technicians")->where("id", $this->id)->get("users")->row();
        if($user){
            $data['is_technicians'] = $user->is_technicians;
        }else{
            $data['is_technicians'] = 0;
        }


        $post = $this->input->post();
        if( isset($post['device_platform']) && $post['device_platform'] == "pc"){
            $data['click_time'] = 60;
        }

        $get = $this->input->get();
        if( isset($get['device_platform']) && $get['device_platform'] == "pc"){
            $data['click_time'] = 60;
        }

        $customers = $this->db
            ->select("class_user_relationship.user_id as id")
            ->where("class_user_relationship.class_id",912)
            ->join('users', 'class_user_relationship.user_id = users.id', 'left')
            ->where("users.status",1)
            ->get('class_user_relationship')->result();
        if($customers){
            if(in_array($this->id,$this->toIdArray($customers)) || $this->id == 26403){
                $data['is_customer_service'] = true;
                $data['customer_service_id'] = 0;
            }else{
                $data['is_customer_service'] = false;
                $data['customer_service_id'] = $this->getCustomerId();
            }
        }else{
            $data['is_customer_service'] = false;
            $data['customer_service_id'] = 0;
        }

        if($class){
            $data['class_id']  =  $class->class_id;
            $data['grade_id']  =  $class->grade_id;
            $data['school_id'] =  $class->school_id;
            $data['user_type'] =  $class->user_type;
        }else{
            $data['class_id']  =  0;
            $data['grade_id']  =  0;
            $data['school_id'] = 0;
        }
        $data['sr_provider'] = $this->getSrPrivoder($class);
        return $data;
    }


    public function getEvaluationUserInfo()
    {
        $class = $this->getUserSchoolGradeClassRealtionShip();

        $row = $this->db->select("mobile,email,sex,school_age,technical_title,english_level")->where("id",$this->id)->get("users")->row();
        $data = array(
            'id'        => (int)$this->id,
            'username'  => $this->username,
            'mobile'    => $row->mobile,
            'email'     => $row->email,
            'sex'       => $row->sex,
            'school_age'         => $row->school_age,
            'technical_title'    => $row->technical_title,
            'english_level'      => $row->english_level,
            'name' => $this->name,
            'access_token' => $this->wetalkjwthelp->getToken((object)array('id' => $this->id, 'username' => $this->username)),
            "avatar_url" => $this->getAvatarUrl(),
            "letter"     => $this->letter,
            'follower_ids'=> $this->getFollowerIds(),
            'group_ids'   => $this->getGroupIds(),
            'my_radar_charts_url' => anchorurl('components/users/getMyRadarWebView/' . $this->id),
            'my_ranking_list_url'  => anchorurl('components/users/getStudentRankingList/'),
            'my_unchain_list_url' => anchorurl('components/users/unLockLesson/'),
            'my_mt_list_url'      => anchorurl('components/users/getusetMTList/'),
            'my_work_list_url'      => anchorurl('components/users/markHomework/'),
            'user_type'   => $this->user_type,
            'mt_time'     => $this->mt_time,
            'click_time'  => $this->click_time,
            'sr_time'     => $this->sr_time,
            'wait_time'   => $this->wait_time,
            'course_ids'   => $this->course_ids,
        );


        if($class){
            $data['class_id']  =  $class->class_id;
            $data['grade_id']  =  $class->grade_id;
            $data['school_id'] =  $class->school_id;
            $school = $this->db->select("name")->where("id", $class->school_id)->get("school")->row();
            $data['schoolName'] = $school->name;
            $gradeList =  $this->db->select("*")->where("school_id", $class->school_id)->get("grades")->result();
            foreach($gradeList as $grade){
                if($grade->id == $class->grade_id){
                    $grade->isSelect = true;
                }else{
                    $grade->isSelect = false;
                }
            }
            $data['gradeList'] = $gradeList;
            $data['user_type'] =  $class->user_type;
        }else{
            $data['class_id']   =  0;
            $data['gradeList']  =  array();
            $data['grade_id']   =  0;
            $data['school_id']  =  0;
            $data['schoolName'] =  "";
        }
        $data['sr_provider'] = $this->getSrPrivoder($class);
        return $data;
    }

    public function getCustomerId(){
        $user = $this->db->select("customer_service_id")->where("id", $this->id)->get("users")->row();
        if($user){
            if(!empty($user->customer_service_id)){
                return $user->customer_service_id;
            }else{
                $customer = $this->db
                    ->select("class_user_relationship.user_id")
                    ->where("class_user_relationship.class_id",912)
                    ->join('users', 'class_user_relationship.user_id = users.id', 'left')
                    ->where("users.status",1)
                    ->order_by("RAND()")
                    ->limit(1)
                    ->get('class_user_relationship')->row();
                if($customer){
                    $this->updateKey(array("customer_service_id"=>$customer->user_id));
                    return $customer->user_id;
                }

            }
        }
        return 0;
    }

    public function getUserInfoNotToken($user = null)
    {
        $class = $this->getUserSchoolGradeClassRealtionShip();
        $data = array(
            'id' => (int)$this->id,
            'username' => $this->username,
//            'mobile' => $this->mobile,
            'name' => $this->name,
            "avatar_url" => $this->getAvatarUrl(),
            "letter" => $this->letter,
            'follower_ids' => $this->getFollowerIds(),
            'group_ids' => $this->getGroupIds(),
            'is_follower' => $this->is_follower($user),
            'user_type' => $this->user_type,
            'my_radar_charts_url' => anchorurl('components/users/getMyRadarWebView/' . $this->id),
            'mt_time'     => $this->mt_time,
            'click_time'  => $this->click_time,
            'sr_time'     => $this->sr_time,
            'wait_time'   => $this->wait_time,
            'course_ids'   => $this->course_ids,
            'status' => $this->status,

        );
        if($class){
            $data['class_id']  =  $class->class_id;
            $data['grade_id']  =  $class->grade_id;
            $data['school_id'] = $class->school_id;
            $data['user_type'] =  $class->user_type;
        }else{
            $data['class_id']  =  0;
            $data['grade_id']  =  0;
            $data['school_id'] = 0;
        }
        $data['sr_provider'] = $this->getSrPrivoder($class);
        return $data;
    }


    public function getSrPrivoder($class){
        if($class){
            $school = $this->db->select('sr_provider')->where('id', $class->school_id)->get('school')->row();
            if($school){
                return $school->sr_provider;
            }
        }
        return "chivox";
    }

    public function is_follower($user)
    {
        if ($user) {
            $results = $this->db->where('user_id', $user->id)->where('follower_id', $this->id)->get('relationship')->num_rows();
            if ($results > 0) return true;
        }
        return false;
    }


    public function getAvatarUrl()
    {
        $avatarurl = $this->storage->setMinxer($this)->getFileName($this->avatar);
        if (empty($avatarurl)) $avatarurl = base_url() . 'media/assets/user/userhead.png';
        return $avatarurl;
    }

    public function getAvatarUrlFormAvatar($user)
    {
        $iuser = new self;
        $iuser->id = $user->id;
        $avatarurl = $this->storage->setMinxer($iuser)->getFileName($user->avatar);
        if (empty($avatarurl)) $avatarurl = base_url() . 'media/assets/user/userhead.png';
        return $avatarurl;
    }


    public function getUserDetail()
    {
        if (empty($this->id)) {
            $this->returncode['errcode'] = 100009;
            $this->returncode['errdesc'] = "用户不存在";
        } else {
            $this->returncode['data'] = $this->getUserInfoNotToken();
        }
        return $this;
    }

    /*
     *
     * 我的好友
     * */

    public function getFollowers($limit = 20, $start = 0)
    {
        $followers = array();
        if (!empty($this->id)) {
            $results = $this->db->where('user_id', $this->id)->limit($limit, $start)->get('relationship')->result();
            foreach ($results as $result) {
                $followers[] = $this->getUser($result->follower_id)->getUserInfoNotToken();
            }
        }
        return $followers;
    }

    public function getFollowerIds()
    {
        $results = $this->db->select('follower_id')->where('user_id', $this->id)->get('relationship')->result();
        $followerIds = array();
        foreach ($results as $person) {
            $followerIds[] = $person->follower_id;
        }
        return $followerIds;
    }


    public function getGroupIds()
    {
        $results = $this->db->select('group_id')->where('user_id', $this->id)->get('group_followers')->result();
        $groupIds = array();
        foreach ($results as $group) {
            $groupIds[] = $group->group_id;
        }
        //暂时关闭聊天服务
        return array();
        return $groupIds;
    }


    public function  updateKey($data = array())
    {
        if (count($data)) {
            foreach ($data as $key => $val) {
                $this->$key = $val;
            }
            $this->db->where("id", $this->id);
            $this->db->update("users", $data);
        }
        return true;
    }


    /*
   *
   * 获取关注我的好友列表
   *
   *
  **/
    public function getMyFollowerList($user, $limit = 20, $start = 0)
    {
        // $this->notification->setMinxer($this)->updateNotificationStatus("follow");
        $result = $this->db
            ->where('user_id', $this->id)
            ->order_by("id", "desc");
        if ($limit != 0) $result = $result->limit($limit, $start);

        $result = $result->get('relationship')->result();
        $data = array();
        foreach ($result as $follower) {
            $followerUser = $this->getUser($follower->follower_id)->getUserInfoNotToken($user);
            $followerUser['remarks'] = $follower->remarks ? $follower->remarks : $followerUser['name'];
            $data[] = $followerUser;
        }
        $this->returncode['data'] = $data;
        return $this;
    }

    /*
     *
     * 获取我的粉丝总数
     */

    public function getMyFollowerCount()
    {
        $result = $this->db
            ->where('user_id', $this->user_id)
            ->get("relationship")->num_rows();
        return ( string )($result ? $result : 0);
    }

    /*
     *
     * 获取我关注的粉丝数
     */

    public function getMyFollowerIsMeCount()
    {
        $result = $this->db
            ->where('follower_id', $this->user_id)
            ->get("relationship")->num_rows();
        return ( string )($result ? $result : 0);
    }


    /*
     *
     * 获取我关注的
     *
     *
     **/
    public function getFollowerIsMeList($user, $limit = 20, $start = 0)
    {
        $result = $this->db
            ->where('follower_id', $this->user_id)
            ->order_by("id", "desc")
            ->limit($limit, $start)
            ->get('relationship')->result();
        $data = array();
        foreach ($result as $follower) {
            $data[] = $this->getUser($follower->user_id)->getUserInfoNotToken($user);
        }
        $this->returncode['data'] = $data;
        return $this;
    }

    /*
     *
     * 添加关注好友
     *
     *
     */

    public function addFollower($user_id)
    {
        $user = $this->getUser($user_id);
        if ($this->id == $user->id) {
            $this->returncode['errcode'] = 100032;
            $this->returncode['errdesc'] = "你不用添加自己为好友";
        } else {
            $row = $this->db->where('user_id', $user->id)->where('follower_id', $this->id)->get('relationship')->num_rows();
            if (!$row) {
                if ($user && !empty($user->id)) {
                    $this->type = "user";
                    $this->notification->setMinxer($this)->addNotification($this, $user, 'follow');
                    $data = array(
                        'user_id' => $user->id,
                        'follower_id' => $this->id,
                        'created_time' => date('Y-m-d H:i:s')
                    );
                    $this->db->insert('relationship', $data);
                    $this->addGroupMessageToRedis($user, 'friend', 'add', $this);
                } else {
                    $this->returncode['errcode'] = 100031;
                    $this->returncode['errdesc'] = "用户不存在";
                }
            } else {
                $this->returncode['errcode'] = 100033;
                $this->returncode['errdesc'] = "你已经关注了他";
            }

        }
        return $this;
    }

    /*
     *
     * 取消关注好友
     *
     *
     */

    public function removeFollower($user_id)
    {
        $user = $this->getUser($user_id);
        if ($user) {
            $row = $this->db->where('user_id', $this->id)->where('follower_id', $user->id)->get('relationship')->num_rows();
            if ($row) {
                $this->type = "user";
                $this->notification->setMinxer($this)->addNotification($this, $user, 'unfollow');
                // 将之前的follower消息置为已读

                $this->db->where('user_id', $this->id)->where('follower_id', $user->id);
                $this->db->delete('relationship');
                $this->addGroupMessageToRedis($user, 'friend', 'del', $this);
            }
        } else {
            $this->returncode['errcode'] = 100031;
            $this->returncode['errdesc'] = "用户不存在";
        }
        return $this;
    }

    public function addGroupMessageToRedis($follower, $type = 'friend', $op = 'add', $actor, $actor2 = null)
    {
        $clientServer = client_url();
        if ($op == "add") {
            $contentType = "follow";
        } else {
            $contentType = "unfollow";
        }

        if (isset($clientServer) && !empty($clientServer)) {
            if ($actor2) {
                $contentType = "takeOutGroup";
                $data = array(
                    "actor" => $actor->id,
                    "follower" => $follower->id,
                    'type' => $type,
                    'op' => $op,
                    "subjectAvatar" => $actor2->getAvatarUrl(),
                    "subjectId" => $actor2->id,
                    "subjectName" => $actor2->name,
                    "objectId" => $follower->id,
                    "objectName" => $follower->name,
                    "contentType" => $contentType,
                );
            } else {
                $data = array(
                    "actor" => $actor->id,
                    "follower" => $follower->id,
                    'type' => $type,
                    'op' => $op,
                    "subjectAvatar" => $follower->getAvatarUrl(),
                    "subjectId" => $follower->id,
                    "subjectName" => $follower->name,
                    "objectId" => "0",
                    "objectName" => "",
                    "contentType" => $contentType,
                );
            }

            $data_string = json_encode($data);
            $ch = curl_init($clientServer . 'chat/actorFollowersUpate');
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
            curl_setopt($ch, CURLOPT_TIMEOUT, 10);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                    'Content-Type: application/json',
                    'Content-Length: ' . strlen($data_string))
            );
            $result = curl_exec($ch);
        }
    }


    public function modifyPersonalMessage()
    {
        $data = $this->input->post();
        if (is_array($data)) {
            foreach ($data as $key => $val) {
                if (!in_array($key, array_keys($this->config['attributes'])) && !in_array($key,array("device_type","push_user_id","push_channel_id","mobile","email","sex","school_age","technical_title","english_level"))) {
                    unset($data[$key]);
                }
            }
            if (isset($data['username']) && !empty($data['username'])) {
                unset($data['username']);
            }

            if (isset($data['device_type']) && $data['device_type'] == 1) {
                $data['device_type'] = 4;
            }
            //unset($data['name']);
            if (isset($data['name']) && !empty($data['name'])) {
                $data['letter'] = $this->getfirstchar($data['name']);
            }
            unset($data['name']);
            if (count($data)) {
                $this->updateKey($data);
            }
        }
        $this->returncode['data'] = $this->getUserInfoNotToken();
        return $this;
    }

    public function RecoveryName()
    {

        $user = $this->db->select("nickname")->where("id", $this->id)->get("users")->row();
        if ($user && !empty( $user->nickname)) {
            $data['name'] = $user->nickname;
            $this->updateKey($data);
        }

        return $this;
    }

    public function uploadHeadpicture()
    {

        $file = $this->storage->setMinxer($this)->uploadFile();
        if ($file->errorCode == 0) {
            $data['avatar'] = $file->data['file_name'];
            $this->updateKey($data);
            $this->returncode['data'] = $this->getAvatarUrl();
        } else {
            $this->returncode['errcode'] = 1000003;
            $this->returncode['errdesc'] = "头像上传失败";
            $this->returncode['data'] = $file;
        }
        return $this;
    }

    public function getUserSchoolGradeClassRealtionShip()
    {
        return $this->db->where("user_id", $this->id)->get('class_user_relationship')->row();
    }

    public function isTeacher(){
        $row =  $this->db->where("user_id", $this->id)->get('class_user_relationship')->row();
        if($row && $row->user_type == "teacher"){
            return true;
        }
        return false;
    }


    public function getUserSchoolGradeClassRealtionShipStatus()
    {
        $releationship =  $this->db->where("user_id", $this->id)->where("status",1)->get('class_user_relationship')->row();
        if($releationship){
            $class =  $this->db->where("id", $releationship->class_id)->get('classes')->row();
            if(!$class){
                return false;
            }
        }
        return $releationship;
    }

    public function getUserSchoolGradeClassRealtionShipForIds()
    {
        $data = array();
        $classes =  $this->db->where("user_id", $this->id)->get('class_user_relationship')->result();
        foreach($classes as $classe){
            $data[] = $classe->class_id;
        }
        return $data;
    }

    public function getfirstchar($s0)
    {
        if ($s0[0] == 'I' || $s0[0] == 'i') {
            return "I";
        } elseif ($s0[0] == 'U' || $s0[0] == 'u') {
            return 'U';
        } elseif ($s0[0] == 'V' || $s0[0] == 'v') {
            return 'V';
        } else {
            $fchar = ord($s0{0});
            if ($fchar >= ord("A") and $fchar <= ord("z")) return strtoupper($s0{0});
            $s1 = @iconv("UTF-8", "gb2312", $s0);
            $s2 = @iconv("gb2312", "UTF-8", $s1);
            if ($s2 == $s0) {
                $s = $s1;
            } else {
                $s = $s0;
            }
            $asc = ord($s{0}) * 256 + ord($s{1}) - 65536;
            if ($asc >= -20319 and $asc <= -20284) return "A";
            if ($asc >= -20283 and $asc <= -19776) return "B";
            if ($asc >= -19775 and $asc <= -19219) return "C";
            if ($asc >= -19218 and $asc <= -18711) return "D";
            if ($asc >= -18710 and $asc <= -18527) return "E";
            if ($asc >= -18526 and $asc <= -18240) return "F";
            if ($asc >= -18239 and $asc <= -17923) return "G";
            if ($asc >= -17922 and $asc <= -17418) return "H";
            if ($asc >= -17417 and $asc <= -16475) return "J";
            if ($asc >= -16474 and $asc <= -16213) return "K";
            if ($asc >= -16212 and $asc <= -15641) return "L";
            if ($asc >= -15640 and $asc <= -15166) return "M";
            if ($asc >= -15165 and $asc <= -14923) return "N";
            if ($asc >= -14922 and $asc <= -14915) return "O";
            if ($asc >= -14914 and $asc <= -14631) return "P";
            if ($asc >= -14630 and $asc <= -14150) return "Q";
            if ($asc >= -14149 and $asc <= -14091) return "R";
            if ($asc >= -14090 and $asc <= -13319) return "S";
            if ($asc >= -13318 and $asc <= -12839) return "T";
            if ($asc >= -12838 and $asc <= -12557) return "W";
            if ($asc >= -12556 and $asc <= -11848) return "X";
            if ($asc >= -11847 and $asc <= -11056) return "Y";
            if ($asc >= -11055 and $asc <= -10247) return "Z";
            return null;
        }
    }


    public function setSchoolTime($data)
    {
        if (!isset($data['school_id']) || !isset($data['month'])) {
            return false;
        } else {
            $row = $this->db->where("school_id", $data['school_id'])->where('user_id', $this->id)->get('class_user_relationship')->row();
            if ($row) {
                $enddate = date('Y-m-d', strtotime("+" . $data['month'] . " month", strtotime($row->end_date)));
                $this->db->where("id", $row->id);
                $this->db->update("class_user_relationship", array("end_date" => $enddate));
                $this->updateKey(array("end_date" => $enddate));
            }
        }
        return true;
    }

    public function setSchoolHomeTime($data)
    {
        if (!isset($data['school_id'])) {
            return false;
        } else {
            $row = $this->db->where("school_id", $data['school_id'])->where('user_id', $this->id)->get('class_user_relationship')->row();
            if ($row) {
                $startdate = $data['home_start_date'];
                if (isset($data['month']) && !empty($data['month'])) {
                    if ($row->home_end_date != '0000-00-00') {
                        $enddate = date('Y-m-d', strtotime("+" . $data['month'] . " month", strtotime($row->home_end_date)));
                    } else {
                        $enddate = date('Y-m-d', strtotime("+" . $data['month'] . " month"));
                    }
                } else {
                    $enddate = $data['home_end_date'];
                }
                $this->db->where("id", $row->id);
                $this->db->update("class_user_relationship", array(
                    "home_end_date" => $enddate,
                    "home_start_date" => $startdate,
                    "is_open_home" => $data['is_open_home']
                ));
                //$this->updateKey(array("home_end_date"=>$enddate));
            }
        }
        return true;
    }

    public function DeleteUserSchoolRelationShip($data)
    {
//        if (!isset($data['school_id'])) {
//            return false;
//        } else {
        $row = $this->db->where('user_id', $this->id)->get('class_user_relationship')->row();
        if ($row) {
            $this->db->where("user_id", $this->id);
            if(isset($data['class_id']) && !empty($data['class_id'])){
                $this->db->where("class_id", $data['class_id']);
            }
            if(isset($data['school_id']) && !empty($data['school_id'])){
                $this->db->where("school_id", $data['school_id']);
            }
            $this->db->update("class_user_relationship",array("status"=>0));
        }
//        }
        return true;
    }

    public function updatePassword($password = "")
    {
        if (!empty($password)) {
            $salt = $this->wetalkuserhelper->genRandomPassword(32);
            $crypt = $this->wetalkuserhelper->getCryptedPassword($password, $salt);
            $this->updateKey(array("password" => $crypt . ':' . $salt));
        }
    }

    public function getScore()
    {
        return rand(0, 100);
    }



    /*
     *
     * 获取单个学生学习课程进度
     */

    public function getStudentCoruseProgress()
    {
        return 1;
    }

    /*
     *
     * 获取单个学生学习进度
     *
     */

    public function getStudentUnitProgress()
    {
        $this->recordmanager->initialize()->user_id = $this->id;
        $studyUnit = $this->recordmanager->getMyStudyUnit();
        return $studyUnit;
    }

    /*
     *
     * 获取课程总单元数目
     *
     */

    public function getTotalUnit()
    {
        return $this->unit->getTotalUnit();
    }

    /*
     *
     *  获取学生学习总天数
     */

    public function getStudentStudyDays(){
        $this->recordmanager->initialize()->user_id = $this->id;
        $studyDays = $this->recordmanager->getStudentStudyDays();
        return $studyDays;
    }

    /*
     *
     *  获取学生学习总学时
     */

    public function getStudentStudyTimes(){
        $this->recordmanager->initialize()->user_id = $this->id;
        $studyDays = $this->recordmanager->getUserStudyTimeS();
        return $studyDays;
    }


    /*
     * 周学习天数
     *
    */
    public function getUserAveragePerWeekDays(){
        $end_time   = date('Y-m-d H:i:s');
        $start_time = date("Y-m-d H:i:s",strtotime("-28 days"));
        $totaldays = $this->getDays($start_time,$end_time);
        $totalweek = ceil($totaldays / 7);
        $weekStudyDays = 0;
        //学习总天数
        $studyDays = $this->db->select("id")
            ->where("user_id", $this->id)
            ->where("date >=", $start_time)
            ->where("date <=", $end_time)
            ->group_by('date')
            ->get('users_record')->result();
        if ($studyDays) {
            $weekStudyDays =round(count($studyDays) / $totalweek,2);
        }
        return $weekStudyDays;
    }

    /*
     * 周学习时间
     *
    */
    public function getUserAveragePerWeekTimes(){
        $end_time   = date('Y-m-d H:i:s');
        $start_time = date("Y-m-d H:i:s",strtotime("-28 days"));
        $totaldays = $this->getDays($start_time,$end_time);
        $totalweek = ceil($totaldays / 7);
        $weekStudyDays = 0;
        //学习总天数
        $studyDays = $this->db->select("count(time) as num")
            ->where("user_id", $this->id)
            ->where("date >=", $start_time)
            ->where("date <=", $end_time)
            ->get('users_record')->row();
        if ($studyDays) {
            $studyTime = $studyDays->num ? $studyDays->num : 0;
            $weekStudyDays = round(intval($studyTime/$totalweek)/60*60,1);
        }
        return $weekStudyDays;
    }

    /*
     *
     * 完成率
     *
     * */

    public function getMyCompletion(){
        $this->recordmanager->initialize()->user_id = $this->id;
        $percentCompletion = $this->recordmanager->getMyCompletion();
        return $percentCompletion;
    }

    /*
    *
    * 正确率
    *
    * */

    public function getMyCorrection(){
        $this->recordmanager->initialize()->user_id = $this->id;
        $percentCompletion = $this->recordmanager->getMyCorrection();
        return $percentCompletion;
    }

    /*
     *
     *
     * 语音识别率
     *
     */

    public function getMySrPecent(){
        $this->recordmanager->initialize()->user_id = $this->id;
        return  $this->recordmanager->getUserSrPecent();
    }

    /*
    *
    *
    * 技能概览
    *
    */

    public function getMySkillAverage(){
        $this->recordmanager->initialize()->user_id = $this->id;
        return  $this->recordmanager->getUserSkillAverage();
    }


    /*
    *
    *
    * 单元测试平均分
    *
    */

    public function getMyStudypartQuiz(){
        $end_time   = date('Y-m-d H:i:s');
        $start_time = date("Y-m-d H:i:s",strtotime("-28 days"));
        $this->recordmanager->initialize()->start_time = $start_time;
        $this->recordmanager->end_time = $end_time;
        return $this->recordmanager->getUserStudypartQuiz();

    }

    /*
    *
    *
    * 未学习天数
    *
    */

    public function getMyNotStudyDays(){
        $end_time   = date('Y-m-d H:i:s');
        $start_time = date("Y-m-d H:i:s",strtotime("-28 days"));
        $studyDays  = $this->db->select("id")
            ->where("user_id",$this->id)
            ->where("date >=",$start_time)
            ->where("date <=",$end_time)
            ->group_by('date')
            ->get('users_record')->result();
        $studyDays = isset($studyDays)?count($studyDays):0;
        return 28-$studyDays;
    }



    public function getDays($begin_time,$end_time){
        if ( $begin_time < $end_time ) {
            $starttime  = $begin_time;
            $endtime    = $end_time;
        } else {
            $starttime  = $end_time;
            $endtime    = $begin_time;
        }
        $timediff   = strtotime($endtime) -  strtotime($starttime);
        $days       = intval( $timediff / 60/60/24 );
        return $days;
    }


    /**
     *
     * 获取班级的总学习时间
     *
     **/

    public function getUserRecordDataInfo(){
//        $studytime = $this->db
//            ->where("user_id",$this->id)
//            ->select("SUM(time) as totalTime")
//            ->get('users_record')->row();
//
//
//        $totalday = $this->db->where("user_id",$this->id)
//            ->select("count(distinct date) as totalday")
//            ->get('users_record')->row();

//        $studyscore = $this->db->where("user_id",$this->id)
//            ->select("SUM(scores) as studyscore")
//            ->group_by("group_id")
//            ->get('users_record')->row();

        $val = new stdClass();
//        if(isset($studytime->totalTime) && !empty($studytime->totalTime))  $val->totalTime = round($studytime->totalTime/3600,2);
//        else $val->totalTime = 0;
//        if(isset($totalday->totalday) && !empty($totalday->totalday))  $val->totalday = $totalday->totalday;
//        else $val->totalday = 0;
//        if(isset($studyscore->studyscore) && !empty($studyscore->studyscore))  $val->studyscore = $studyscore->studyscore;
//        else $val->studyscore = 0;
        // 获取本周学习时间
        $end_time       = date('Y-m-d');
        $start_time     = date('Y-m-d',strtotime($end_time. '-7 days'));
        $val2 = $this->db->select("SUM(time) as totalTime")
            ->where("users_record.date >",$start_time)
            ->where("users_record.date <=",$end_time)
            ->where("users_record.user_id",$this->id)
            ->get('users_record')->row();
        if($val2)
            $val->weekTotalTime = round($val2->totalTime/60);
        else $val->weekTotalTime = 0;
        return $val;
    }

    public function  getUserStudyRecordDataInfo(){
        $studytime = $this->db
            ->select("study_num_time,study_num_day,study_num_week_time")
            ->where("id",$this->id)
            ->get('users')->row();
        return $studytime;
    }


    public function getStudentPerweekStudyUserCount(){
        $end_time       = date('Y-m-d');
        $start_date    = date('Y-m-d',strtotime($end_time. '-7 days'));
        $return = array();
        for($i=1;$i<=7;$i++){
            $date = date('Y-m-d',strtotime($start_date. '+'.$i.' days'));
            $time = $this->db
                ->select("SUM(time) as totalTime")
                ->where_in("user_id",$this->id)
                ->where("date",$date)
                ->get('users_record')->row();
            if($time){
                $return[date('m/d',strtotime($date))] = round($time->totalTime/60);
            }else{
                $return[date('m/d',strtotime($date))] = 0;
            }
        }
        return $return;
    }


    public function getLearningSituationOverview(){
        $month_frist_day = date('Y-m-01', strtotime(date("Y-m-d")));
//        $study_result = $this->db
//            ->select("SUM(totalScore)/count(*) as totalScore,SUM(studyReuslt)/count(*) as studyReuslt,SUM(StudyTimeAndFrequency)/count(*) as StudyTimeAndFrequency,SUM(studyCourseAverage)/count(*) as studyCourseAverage,SUM(SkillAverage)/count(*) as SkillAverage,SUM(StudyComprehensive)/count(*) as StudyComprehensive")
//            ->where("start_date >=",$month_frist_day)
//            ->where("user_id",$this->id)->get("user_record_result")->row();
//        if(!$study_result){
//            $last_month_frist_day = date('Y-m-d', strtotime(date('Y-m-01') . ' -1 month'));
//            $study_result = $this->db
//                ->select("SUM(totalScore)/count(*) as totalScore,SUM(studyReuslt)/count(*) as studyReuslt,SUM(StudyTimeAndFrequency)/count(*) as StudyTimeAndFrequency,SUM(studyCourseAverage)/count(*) as studyCourseAverage,SUM(SkillAverage)/count(*) as SkillAverage,SUM(StudyComprehensive)/count(*) as StudyComprehensive")
//                ->where("start_date",$last_month_frist_day)
//                ->where("user_id",$this->id)->get("user_record_result")->row();
//        }
        //计算今天几号
        $day =  date("d");
        if($day <20){
            $month_day = date('Y-m-d', strtotime(date('Y-m-01') . ' -1 day'));

            $month_second_day = date('Y-m-d', strtotime(date('Y-m-01') . ' -2 day'));

            $study_result = $this->db
                ->select("totalScore,studyReuslt,StudyTimeAndFrequency,SkillAverage,studyCourseAverage,StudyComprehensive")
                ->where("user_id",$this->id)
                ->where("start_date",$month_day)
                ->limit(1)->get("user_record_result")->row();
            if($study_result){

            }else{
                $study_result = $this->db
                    ->select("totalScore,studyReuslt,StudyTimeAndFrequency,SkillAverage,studyCourseAverage,StudyComprehensive")
                    ->where("user_id",$this->id)
                    ->where("start_date",$month_second_day)
                    ->limit(1)->get("user_record_result")->row();
            }

            $totalscore = $this->db
                ->select("totaltime,totalday")
                ->where("user_id",$this->id)->order_by("start_date","desc")
                ->limit(1)->get("user_record_result")->row();
            // $study_result->totalScore = $totalscore->totalScore;
            $study_result->totaltime = $totalscore->totaltime;
            $study_result->totalday = $totalscore->totalday;

        }else{
            $study_result = $this->db
                ->select("totalScore,totaltime,totalday,studyReuslt,StudyTimeAndFrequency,SkillAverage,studyCourseAverage,StudyComprehensive")
                ->where("user_id",$this->id)->order_by("start_date","desc")->limit(1)->get("user_record_result")->row();
        }



        $data['totaltime'] = isset($study_result->totaltime)? round($study_result->totaltime/3600,2):0;
        $data['totalday'] = isset($study_result->totalday)? $study_result->totalday:0;
        $data['StudyReuslt']            =  isset($study_result->studyReuslt)? sprintf("%.2f",$study_result->studyReuslt):0; //学习效果
        $data['StudyReuslt'] = $data['StudyReuslt']>20?20:$data['StudyReuslt'];
        if($data['StudyReuslt'] <12){
            $data['StudyReusltString'] = "学习效果为（{$data['StudyReuslt']}）分，低于标准水平，请注意一定按照教师要求，确保课程的完成率达标，提高答题的正确率和达标率，及时复习，提高MT的正确率和得分，提高学习得分;";
        }else if($data['StudyReuslt'] >=12 && $data['StudyReuslt'] <=14){
            $data['StudyReusltString'] = "学习效果为（{$data['StudyReuslt']}）分，处于标准水平，请继续按照教师要求，确保课程的完成率达标，提高答题的正确率和达标率，及时复习，提高MT的正确率和得分，提高学习得分；";

        }else if($data['StudyReuslt'] > 14 && $data['StudyReuslt'] <=16){
            $data['StudyReusltString'] = "学习效果为（{$data['StudyReuslt']}）分，学习效果良好，请继续按照教师要求，确保课程的完成率达标，提高答题的正确率和达标率，及时复习，提高MT的正确率和得分，提高学习得分；";
        }else if($data['StudyReuslt'] > 16){
            $data['StudyReusltString'] = "学习效果为（{$data['StudyReuslt']}）分，远高于标准水平，请继续保持良好的练习习惯，继续提升练习效果；";
        }
        $data['StudyTimeAndFrequency']  =  isset($study_result->StudyTimeAndFrequency)? sprintf("%.2f",$study_result->StudyTimeAndFrequency):0; //时间与频率

        $data['StudyTimeAndFrequency'] = $data['StudyTimeAndFrequency']>20?20:$data['StudyTimeAndFrequency'];

        if($data['StudyTimeAndFrequency'] <12){
            $data['StudyTimeAndFrequencyString'] = "学习时间和学习频率低于标准要求，请努力练习，确保达到标准要求；";
        }else if($data['StudyTimeAndFrequency'] >=12 && $data['StudyTimeAndFrequency'] <=14){
            $data['StudyTimeAndFrequencyString'] = "学习时间和频率及格，请继续坚持练习；";

        }else if($data['StudyTimeAndFrequency'] > 14 && $data['StudyTimeAndFrequency'] <=16){
            $data['StudyTimeAndFrequencyString'] = "学习时间和频率良好，请继续保持；";
        }else if($data['StudyTimeAndFrequency'] > 16){
            $data['StudyTimeAndFrequencyString'] = "学习时间和频率优秀，请继续保持。";
        }

        $data['StudyCourseAverage']     =   isset($study_result->studyCourseAverage)? sprintf("%.2f",$study_result->studyCourseAverage):0; //学习进度
        $data['StudyCourseAverage'] = $data['StudyCourseAverage']>20?20:$data['StudyCourseAverage'];

        if($data['StudyCourseAverage'] <12 ){
            $data['StudyCourseAverageString'] = "学习进度低于标准要求，请努力练习，确保达到标准要求；";
        }else if($data['StudyCourseAverage'] >=12 && $data['StudyCourseAverage'] <=14){
            $data['StudyCourseAverageString'] = "学习进度及格，请继续坚持练习；";
        }else if($data['StudyCourseAverage'] > 14 && $data['StudyCourseAverage'] <=16){
            $data['StudyCourseAverageString'] = "学习进度良好，请继续保持；";
        }else if($data['StudyCourseAverage'] > 16){
            $data['StudyCourseAverageString'] = "学习进度优秀，请继续保持。";
        }

        $data['SkillAverage']           =   isset($study_result->SkillAverage)? sprintf("%.2f",$study_result->SkillAverage):0; //技能情况

        $data['SkillAverage'] = $data['SkillAverage']>20?20:$data['SkillAverage'];

        if($data['SkillAverage'] <12 ){
            $data['SkillAverageString'] = "能力得分低于标准要求，请加强听力、口语和语法的练习，提高英语听说的流畅度、准确度，确保能力得分不低于标准要求;";
        }else if($data['SkillAverage'] >=12 && $data['SkillAverage'] <=14){
            $data['SkillAverageString'] = "能力得分达标，请继续坚持多听、多说，继续提升听说的流畅度和准确度;";
        }else if($data['SkillAverage'] > 14 && $data['SkillAverage'] <=16){
            $data['SkillAverageString'] = "能力得分良好，请继续保持，坚持多听多说，不断提升听说的流畅度和准确度；";
        }else if($data['SkillAverage'] > 16){
            $data['SkillAverageString'] = "能力得分优秀，请继续保持良好的练习习惯，继续提升听说的流畅度和准确度。";
        }

        $data['StudyComprehensive']     =   isset($study_result->StudyComprehensive)? sprintf("%.2f",$study_result->StudyComprehensive):0; //学习方法
        $data['StudyComprehensive'] = $data['StudyComprehensive']>20?20:$data['StudyComprehensive'];

        if($data['StudyComprehensive'] <12 ){
            $data['StudyComprehensiveString'] = "学习方法得分为（{$data['StudyComprehensive']}）分，学习方法得分偏低，请按照教师要求进行练习，提高课程学习的频率和时间，正确合理使用功能键，确保练习时间和频率达标，提高完成率、正确率和语音识别率，逐步提升听力理解能力和口语能力。";
        }else if($data['StudyComprehensive'] >=12 && $data['StudyComprehensive'] <=14){
            $data['StudyComprehensiveString'] = "学习方法得分为（{$data['StudyComprehensive']}）分，学习方法得分良好，请继续坚持课程学习，强化正确的练习方法和习惯，进一步提升听力和口语能力；";
        }else if($data['StudyComprehensive'] > 14){
            $data['StudyComprehensiveString'] = "学习方法得分为（{$data['StudyComprehensive']}）分，学习方法得分优秀，请继续坚持课程学习，整体优化语言质量，提升英语技能。";
        }
        $data['totalScores'] =  isset($study_result->totalScore)?$study_result->totalScore:0;;
        return $data;
    }

    public function testData(){
        $this->recordmanager->initialize()->user_id    = $this->id;
        $end_time       = date('Y-m-d');
        $this->recordmanager->start_time = date('Y-m-d',strtotime($end_time. '-14 days'));;
        $this->recordmanager->end_time   =$end_time;
        $result = $this->recordmanager->getUserStudyTimeAndFrequency();
        echo sprintf("%.2f",$this->recordmanager->getUserStudyComprehensive()*20);
        var_dump($result);
        exit;
    }

    /*
     * 获取有平台操作权限的用户列表
     * */

    public function getPlatformAccount($limit=20,$start=0){
        $data = array();
        $get = $this->input->get();
        $users = $this->db
            ->select("distinct(wetalk_user_user_role.uid),user_user_role.uid")
            ->join('users','user_user_role.uid = users.id', 'left');
        if(isset($get['key']) && !empty($get['key'])){
            $users = $users->like("users.name",$get['key'])
                ->or_like("users.username",$get['key'])
                ->or_like("users.mobile",$get['key'])
                ->or_like("users.email",$get['key'])
                ->or_like("users.weixin",$get['key'])
                ->or_like("users.qq",$get['key']);
        }

        $users = $users->limit($limit,$start)
            ->get("user_user_role")->result();
        foreach($users as $userrole){
            $user =   $this->getUser($userrole->uid);
            if($user->id != 0){
                $userinfo = $user->getUserInfoNotToken();
                if(!empty($user->course_ids)){
                    $course_count = count(explode(",",$user->course_ids));
                }else{
                    $course_count = 0;
                }
                $userinfo['roleName'] = $user->getUserRole()->name;
                $userinfo['course_count'] =$course_count;
                $data[] =$userinfo;
            }
        }
        $this->returncode['data'] = $data;
        return $this;
    }


    /*
     * 获取有平台不同角色类型的权限
     * */

    public function getPlatformOaAccount($type="111111"){
        $data = array();
        $users = $this->db
            ->select("distinct(wetalk_user_user_role.uid),user_user_role.uid")
            ->join('users','user_user_role.uid = users.id', 'left')
            ->join('user_role','user_user_role.rid = user_role.id', 'left')
            ->where('user_role.type',$type)
            ->get("user_user_role")->result();
        foreach($users as $userrole){
            $user =   $this->getUser($userrole->uid);
            if($user->id != 0){
                $userinfo = $user->getUserInfoNotToken();
                if(!empty($user->course_ids)){
                    $course_count = count(explode(",",$user->course_ids));
                }else{
                    $course_count = 0;
                }
                $userinfo['roleName'] = $user->getUserRole()->name;
                $userinfo['course_count'] =$course_count;
                $data[] =$userinfo;
            }
        }
        $this->returncode['data'] = $data;
        return $this;
    }

    public function getPlatformAccountCount(){
        $get = $this->input->get();
        $user = $this->db
            ->select("distinct(wetalk_user_user_role.uid),user_user_role.uid")
            ->join('users','user_user_role.uid = users.id', 'left');
        if(isset($get['key']) && !empty($get['key'])){
            $user = $user->like("users.name",$get['key'])
                ->or_like("users.username",$get['key'])
                ->or_like("users.mobile",$get['key'])
                ->or_like("users.email",$get['key'])
                ->or_like("users.weixin",$get['key'])
                ->or_like("users.qq",$get['key']);
        }
        $user =$user ->get("user_user_role")->num_rows();
        return $user;
    }



    /*
     *
     * 获取角色信息
     *
     * */

    public function getUserRole(){
        $role = new stdClass();
        $role->name = "";
        $role->id = 0;
        $role->type = 0;
        $userroles = $this->db->select("rid")->where("uid",$this->id)->get("user_user_role")->row();
        if($userroles){
            $role1 = $this->db->select("*")->where("id",$userroles->rid)->get("user_role")->row();
            if($role1) $role = $role1;
        }
        return $role;
    }


    /*
     *
     * 获取角色权限
     *
     * */

    public function getUserRolePermission(){
        $role = $this->getUserRole();
        $permissions = $this->db
            ->select("user_permission.*")
            ->where("user_role_permission.rid",$role->id)
            ->where("user_permission.category",1)
            ->join('user_permission','user_permission.id = user_role_permission.pid', 'left')
            ->get("user_role_permission")->result();
        return $permissions;
    }

    /*
     *
     * 判断是否还有某权限
     **/

    public function hasPermission($per){
        $data = array();
        $permissions = $this->getUserRolePermission();
        foreach($permissions as $permission){
            $data[] = $permission->url;
        }
        if(in_array($per,$data)) return true;
        return false;
    }


    /*
     *
     * 判断平台用户所管理区域
     *
     * */

    public function getPlatFormAccountRegion($type = "common"){
        $regioninfo = $this->db->select("*")->where("user_id",$this->id)->get("region_user_relationship")->row();
        return $regioninfo;
    }


    public function insetAgentLog($class="",$method="",$arguments=""){
        $month = date("m");
        if((int)$month >= 4){
            $table = "user_agent_new";
        }else{
            $table = "user_agent";
        }
        $app_version = $this->input->get("app_version")?$this->input->get("app_version"):$this->input->post("app_version");
        $device_platform = $this->input->get("device_platform")?$this->input->get("device_platform"):$this->input->post("device_platform");
        if(!$app_version) $app_version = "";
        if(!$device_platform) $device_platform = "";
        $entity = array(
            "user_id"=>$this->id,
            "datetime"=>date("Y-m-d H:i:s"),
            "date"=>date("Y-m-d"),
            "ip"=>$_SERVER['REMOTE_ADDR'],
            "agent"=>$_SERVER['HTTP_USER_AGENT'],
            "version"=>$app_version,
            "platform"=>$device_platform,
            "count"=>1,
            "get_class"=>$class,
            "get_method"=>$method
        );
        if($table == "user_agent_new"){
            $entity['arguments'] = json_encode($arguments);
        }
        $agent_id = 0;
        $row = $this->db->where("user_id",$this->id)
            ->where("date",date("Y-m-d"))
            ->where("version",$app_version)
            ->where("agent",$_SERVER['HTTP_USER_AGENT'])
            ->where("platform",$device_platform)
            ->where("ip",$_SERVER['REMOTE_ADDR'])
            ->where("get_class",$class)
            ->where("get_method",$method)
            ->get($table)->row();
        if(!$row){
            $this->db->insert($table,$entity);
            $agent_id = $this->db->insert_id();
        }else{
            $agent_id = $row->id;
            $this->db
                ->where("id",$row->id)
                ->where("user_id",$this->id)
                ->where("date",date("Y-m-d"))
                ->where("version",$app_version)
                ->where("agent",$_SERVER['HTTP_USER_AGENT'])
                ->where("platform",$device_platform)
                ->where("ip",$_SERVER['REMOTE_ADDR'])
                ->where("get_class",$class)
                ->where("get_method",$method);
            $this->db->set("count","count+1",false);
            // $this->db->set("agent",$_SERVER['HTTP_USER_AGENT'],false);
            $this->db->update($table);
        }
        if($method == "saveData"){
            $entity = array(
                "agent_id"  => $agent_id,
                "user_id"   => $this->id,
                "version"    => $app_version,
                "postdata"  => $this->input->post("data")
            );
            $this->db->insert("user_agent_data",$entity);
        }
        return true;
    }

    public function getUserList($limit = 20, $start = 0,$data= array())
    {
        // $this->notification->setMinxer($this)->updateNotificationStatus("follow");
        $result = $this->db->select('users.is_technicians,users.status as userstatus,users.registerDate,users.lastvisitDate,class_user_relationship.*,classes.name as ClassName,grades.name as GradeName,school.name as schoolName,region.name as RegionName')
            ->join('users','class_user_relationship.user_id = users.id', 'left')
            ->join('classes', 'class_user_relationship.class_id = classes.id', 'left')
            ->join('grades', 'class_user_relationship.grade_id = grades.id', 'left')
            ->join('school', 'class_user_relationship.school_id = school.id', 'left')
            ->join('region', 'school.region_id = region.id', 'left')
            ->order_by("id", "desc")
            ->group_by("class_user_relationship.user_id");
        if(isset($data['key']) && !empty($data['key'])){
            $result = $result->like("users.name",$data['key'])
                ->or_like("users.username",$data['key'])
                ->or_like("users.mobile",$data['key'])
                ->or_like("users.email",$data['key'])
                ->or_like("users.weixin",$data['key'])
                ->or_like("users.qq",$data['key']);
        }
        $result = $result->limit($limit, $start);
        $result = $result->get('class_user_relationship')->result();
        $data = array();
        $users = array();
        $returnusers = array();
        $user_array_ids = array();
        foreach($result as $item1){
            $user_array_ids[] = $item1->user_id;
        }
        if(count($user_array_ids) > 0){
            $items = $this->db->select("id,name,user_type,username,avatar,course_ids,block,status")->where_in("id", $user_array_ids)->get("users")->result();
            foreach($items as $item){
                $item->avatar_url = $this->user->getAvatarUrlFormAvatar($item);
                $item->my_radar_charts_url = anchorurl('components/users/getMyRadarWebView/' . $item->id);
                $users[$item->id] = $item;
            }
        }

        foreach ($result as $follower) {
            $followerUser = $users[$follower->user_id];
            $followerUser->ClassName = $follower->ClassName;
            $followerUser->userstatus = $follower->userstatus;
            $followerUser->is_technicians = $follower->is_technicians;
            $followerUser->status = $follower->status;
            $followerUser->GradeName = $follower->GradeName;
            $followerUser->schoolName = $follower->schoolName;
            $followerUser->RegionName = $follower->RegionName;
            $followerUser->user_type = $follower->user_type;
            $followerUser->registerDate = $follower->registerDate;
            $followerUser->lastvisitDate = $follower->lastvisitDate;
            $data[] = $followerUser;
        }
        $this->returncode['data'] = $data;
        return $this;
    }


    public function getUserListNotClass($limit = 20, $start = 0)
    {
        // $this->notification->setMinxer($this)->updateNotificationStatus("follow");
        $result = $this->db->select('users.*')
            ->join('class_user_relationship','class_user_relationship.user_id = users.id', 'left')
            ->join('user_user_role','user_user_role.uid = users.id', 'left')
            ->where('class_user_relationship.id is null')
            ->where('user_user_role.uid is null')
            ->order_by("id", "desc");
        if(isset($data['key']) && !empty($data['key'])){
            $result = $result->like("users.name",$data['key'])
                ->or_like("users.username",$data['key'])
                ->or_like("users.mobile",$data['key'])
                ->or_like("users.email",$data['key'])
                ->or_like("users.weixin",$data['key'])
                ->or_like("users.qq",$data['key']);
        }
        $result = $result->limit($limit, $start);
        $result = $result->get('users')->result();

        $data = array();
        foreach ($result as $followerUser) {
            $followerUser->avatar_url   = $this->user->getAvatarUrlFormAvatar($followerUser);
            $followerUser->ClassName  ="";
            $followerUser->userstatus = "";
            $followerUser->status     = 0;
            $followerUser->GradeName  = "";
            $followerUser->schoolName = "";
            $followerUser->RegionName = "";
            $followerUser->user_type  = "";
            $data[] = $followerUser;
        }
        $this->returncode['data'] = $data;
        return $this;
    }

    public function getUserListNotClassCount($data= array())
    {
        // $this->notification->setMinxer($this)->updateNotificationStatus("follow");
        $result = $this->db->select('users.*')
            ->join('class_user_relationship','class_user_relationship.user_id = users.id', 'left')
            ->join('user_user_role','user_user_role.uid = users.id', 'left')
            ->where('class_user_relationship.id is null')
            ->where('user_user_role.uid is null');
        if(isset($data['key']) && !empty($data['key'])){
            $result = $result->like("users.name",$data['key'])
                ->or_like("users.username",$data['key'])
                ->or_like("users.mobile",$data['key'])
                ->or_like("users.email",$data['key'])
                ->or_like("users.weixin",$data['key'])
                ->or_like("users.qq",$data['key']);
        }
        return $result->get('users')->num_rows();
    }

    public function getUserListCount($data= array())
    {
        $result = $this->db->select('class_user_relationship.*,classes.name as ClassName,grades.name as GradeName,school.name as schoolName,region.name as RegionName')
            ->join('users','class_user_relationship.user_id = users.id', 'left')
            ->join('classes', 'class_user_relationship.class_id = classes.id', 'left')
            ->join('grades', 'class_user_relationship.grade_id = grades.id', 'left')
            ->join('school', 'class_user_relationship.school_id = school.id', 'left')
            ->join('region', 'school.region_id = region.id', 'left')->group_by("class_user_relationship.user_id");
        if(isset($data['key']) && !empty($data['key'])){
            $result = $result->like("users.name",$data['key'])
                ->or_like("users.username",$data['key'])
                ->or_like("users.mobile",$data['key'])
                ->or_like("users.email",$data['key'])
                ->or_like("users.weixin",$data['key'])
                ->or_like("users.qq",$data['key']);
        }
        return $result->get('class_user_relationship')->num_rows();

    }


    public function resetPassword()
    {
        $password = "123456";
        $user_ids = $this->input->post("user_ids");
        $user_array = explode(",",$user_ids);
        if (count($user_array) > 0) {
            $salt = $this->wetalkuserhelper->genRandomPassword(32);
            $crypt = $this->wetalkuserhelper->getCryptedPassword($password, $salt);
            $this->db->where_in("id", $user_array);
            $this->db->update("users", array("password" => $crypt . ':' . $salt));
        }
    }

    public function DeletePlatFormUserRelationShip($data=array()){
        if($this->id && !empty($this->id)){
            $this->db->where("uid",$this->id);
            $this->db->delete("user_user_role");
        }
        return true;
    }

}