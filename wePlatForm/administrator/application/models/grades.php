<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Grades extends CI_Model{



    public function __construct()
    {
        parent::__construct();
        $this->_initialize();
    }



    public function _initialize($config=array())
    {
        $config['attributes'] = array(
            'id'                => array("require" => false),
            'name'              => array("require" => true),
            "user_id"           => array("require" => false),
            "created_time"      => array("require" => false),
            "follower_count"    => array("require" => false),
            "start_date"        => array("require" => false),
            "end_date"          => array("require" => false),
            "school_user_count" => array("require" => false),
            "home_user_count"   => array("require" => false),
            "block"             => array("require" => false),
            "school_id"         => array("require" => false),
            "enteryear"          => array("require" => false),
         );
        parent::_initialize($config);
    }

    public function getGrade($id){
        $amoeba = new self;
        $data = $this->config['attributes'];
        $item = $this->db->select(implode(',',array_keys($data)))->where("id",$id)->get("grades")->row_array();
        if($item){
            foreach($item as $key=>$val){
                if(empty($val)) $val = "";
                $amoeba->$key = $val;
            }
        }else{
            $amoeba->id = 0;
        }
        return $amoeba;
    }

    public function getGradeInfo(){
        $data = array(
            'id'                => $this->id,
            'name'              => $this->name,
            "username"          =>$this->getUserInfo()->name,
            "created_time"      => $this->created_time,
            "follower_count"    => $this->follower_count?$this->follower_count:0,
            "school_user_count" => $this->school_user_count?$this->school_user_count:0,
            "home_user_count"   => $this->home_user_count?$this->home_user_count:0,
            "start_date"        => $this->start_date,
            "end_date"          => $this->end_date,
            "livenessGrade"    => $this->getLivenessForGrade(),
            'livenessHome'      => $this->getLivenessForHome(),
            "block"             => $this->block,
            "enteryear"         => $this->enteryear,

        );
        return $data;
    }

    public function getGradeInfoDataView(){

        $data = array(
            'id'                => $this->id,
            'name'              => '<a href="'.anchorurl('home/studyDataClass/'.$this->id).'">'.$this->name.'</a>',
            "username"          =>$this->getUserInfo()->name,
            "created_time"      => $this->created_time,
            "follower_count"    => $this->follower_count?$this->follower_count:0,
            "school_user_count" => $this->school_user_count?$this->school_user_count:0,
            "home_user_count"   => $this->home_user_count?$this->home_user_count:0,
            "start_date"        => $this->start_date == '0000-00-00' ?'':$this->start_date,
            "end_date"          => $this->end_date == '0000-00-00' ?'':$this->end_date,
            "livenessGrade"    => $this->getLivenessForGrade(),
            'livenessHome'      => $this->getLivenessForHome(),
            "block"             => $this->block,
            "enteryear"         => $this->enteryear,
            "school_id"         => $this->school_id,
        );
        return $data;
    }


    public function getGradeInfoView(){

        $data = array(
            'id'                => $this->id,
            'name'              => $this->name,
            "username"          =>$this->getUserInfo()->name,
            "created_time"      => $this->created_time,
            "follower_count"    => $this->follower_count?$this->follower_count:0,
            "school_user_count" => $this->school_user_count?$this->school_user_count:0,
            "home_user_count"   => $this->home_user_count?$this->home_user_count:0,
            "start_date"        => $this->start_date == '0000-00-00' ?'':$this->start_date,
            "end_date"          => $this->end_date == '0000-00-00' ?'':$this->end_date,
            "livenessGrade"     => $this->getLivenessForGrade(),
            'livenessHome'      => $this->getLivenessForHome(),
            "block"             => $this->block,
            "enteryear"         => $this->enteryear,
            "school_id"         => $this->school_id,
        );
        return $data;
    }

    public function getUserInfo(){
        return $this->user->getUser($this->user_id);
    }


    /*
     *
     * 学校安装活跃度
     *
     */

    public function getLivenessForGrade(){
        return rand(1,10000);
    }

    /*
    *
    * 家庭安装活跃度
    *
    */

    public function getLivenessForHome(){
        return rand(1,10000);
    }



    //五个维度数据分析

    /*
     * 学习指数 占五个维度的20%
     * 正确率  4% * 实际准确率
     * 完成率  4% *
     * 达标率  4% * 未给
     * MT平均分 4% *
     * 学习方法得分 4% *  未给
     * result:
     */
    public function studyIndex(){

    }


    /*
     * 活跃度 占五个维度的20%
     * 活跃数( 28天内登入系统算1次)/总人数 * 20&
     */
    public function activieRate(){

    }


    /*
     * 学习时间和频率 占五个维度的20%
     * 周学习天数 =  总共学习的天数/7 周1天 10%*5% 2天40%*5% 3天 60%*5% 4天 70%*5% 5天 80%*5% 6天 90%*5% 7天 100&*5%
     * 总学习天数 =  实际学习天数/(选择查询的天数/7) = 周1天 10%*5% 2天40%*5% 3天 60%*5% 4天 70%*5% 5天 80%*5% 6天 90%*5% 7天 100&*5%
     * 周学习时间 =  平均每周小时 周1小时 10%*5% 1.5小时 20%*5% 2小时 40%*5% 2.5小时 60%*5% 3小时 70%*5% 3.5小时 80%*5% 4小时 90%*5% 5小时 100%*5%
     * 总学习时间 =  实际总学时间/(选择查询的天数/7) = 周1小时 10%*5% 1.5小时 20%*5% 2小时 40%*5% 2.5小时 60%*5% 3小时 70%*5% 3.5小时 80%*5% 4小时 90%*5% 5小时 100%*5%
     */

    public function studyTimeAndFreQuency(){

    }


    /*
    * 技能概览 20%
    *
    * 听力理解 : 7% listen 每个part占20% 包括 listening (计算完成率) 和comhension(正确率)的 click
    * 口语能力:  7% sr的计算 正确率
    * 语法能力:  6% grammer 正确率
    */

    public function skillRate(){


    }


    /*
    * 功能键使用次数 20%
    *
    * 重复建比文字建次数  8%  比率 >3 8, >2 6  1<x<=2 4, x==1 2 x <1 0
    * 录音键比回听键     7%  比率 x=1 7,0.6<x<1 6分,0.4<x<=0.6 4分,0.2<x<=0.4 2分, 0<x<=0.2 1分  ,x==0 0分
    *  重复键比录音键:回听键    5% >3 5分,==3 4分,==2 3分,===1,2分,重复建 < 音键:回听键 0分
    */


    public function functionButtionsRate(){


    }



    public function getGradeCount($school_id){
        return $this->db->where("school_id",$school_id)->get("grades")->num_rows();
    }


    public function  updateKey($data = array()){
        if(count($data)){
            $this->db->where("id",$this->id);
            $this->db->update("grades",$data);
        }
        return true;
    }

    /*
     *
     * 获取学校列表数据
     */

    public function getGradeList($school_id,$limit=20,$start=0){
        $data = array();
        $items = $this->db->select("id")->where("school_id",$school_id)->limit($limit,$start)->get("grades")->result();
        foreach($items as $item){
            $data[] = $this->getGrade($item->id);
        }
        return $data;
    }

    /*
     *
     * 获取学校列表数据
     */

    public function getGradeInfoList($school_id,$limit=20,$start=0){
        $data = array();
        $items = $this->db->select("id")->where("school_id",$school_id)->limit($limit,$start)->get("grades")->result();
        foreach($items as $item){
            $data[] = $this->getGrade($item->id)->getGradeInfoView();
        }
        return $data;
    }

    /*
     *
     * 获取学校列表数据
     */

    public function getGradeInfoDataList($school_id,$limit=20,$start=0){
        $data = array();
        $items = $this->db->select("id")->where("school_id",$school_id)->limit($limit,$start)->get("grades")->result();
        foreach($items as $item){
            $data[] = $this->getGrade($item->id)->getGradeInfoDataView();
        }
        return $data;
    }


    public function save($data){
        $entity = $this->config['attributes'];
        foreach($data as $key => $val){
            if(!in_array($key,array_keys($entity)) && $key != "grade_id"){
                unset($data[$key]);
            }
        }
        if(!empty($data['grade_id'])){
            $this->db->where("id",$data['grade_id']);
            unset($data['grade_id']);
            $this->db->update("grades",$data);
        }else{
            unset($data['grade_id']);
            $data['created_time']   = date('Y-m-d H:i:s');
            $data['user_id']        = getAdminViewer()->id;
            $this->db->insert("grades",$data);
        }
        return true;
    }

    public function delete($data){
        if(!empty($data['grade_id'])){
            $this->db->where("id",$data['grade_id']);
            $this->db->delete("grades");
        }
        return true;
    }

    public function getScore(){
        return rand(0,100);
    }

}  
