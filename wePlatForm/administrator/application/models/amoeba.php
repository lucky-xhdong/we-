<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Amoeba extends CI_Model{



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
            "description" 		=> array("require" => false),
            "created_time"      => array("require" => false),
            "follower_count"    => array("require" => false),
            "school_user_count" => array("require" => false),
            "home_user_count"   => array("require" => false),
            "start_date"        => array("require" => false),
            "end_date"          => array("require" => false),
         );
        parent::_initialize($config);
    }

    public function getAmoeba($id){
        $amoeba = new self;
        $data = $this->config['attributes'];
        $item = $this->db->select(implode(',',array_keys($data)))->where("id",$id)->get("amoeba")->row_array();
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

    public function getAmoebaInfo(){

        $data = array(
            'id'                => $this->id,
            'name'              => $this->name,
            "username"           =>$this->getUserInfo()->name,
            "description" 		=> $this->description,
            "created_time"      => $this->created_time,
            "follower_count"    => $this->follower_count?$this->follower_count:0,
            "school_user_count" => $this->school_user_count?$this->school_user_count:0,
            "home_user_count"   => $this->home_user_count?$this->home_user_count:0,
            "start_date"        => $this->start_date,
            "end_date"          => $this->end_date,
            "livenessSchool"    => $this->getLivenessForSchool(),
            'livenessHome'      => $this->getLivenessForHome(),

        );
        return $data;
    }

    public function getAmoebaInfoView(){

        $data = array(
            'id'                => $this->id,
            'name'              => '<a href="'.anchorurl('home/studyDataSchool/'.$this->id).'">'.$this->name.'</a>',
            "username"           =>$this->getUserInfo()->name,
            "description" 		=> $this->description,
            "created_time"      => $this->created_time,
            "follower_count"    => $this->follower_count?$this->follower_count:0,
            "school_user_count" => $this->school_user_count?$this->school_user_count:0,
            "home_user_count"   => $this->home_user_count?$this->home_user_count:0,
            "start_date"        => $this->start_date,
            "end_date"          => $this->end_date,
            "livenessSchool"    => $this->getLivenessForSchool(),
            'livenessHome'      => $this->getLivenessForHome(),

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

    public function getLivenessForSchool(){
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



    public function getAmoebaCount(){
        return $this->db->get('amoeba')->num_rows();
    }


    public function  updateKey($data = array()){
        if(count($data)){
            $this->db->where("id",$this->id);
            $this->db->update("amoeba",$data);
        }
        return true;
    }

    /*
     *
     * 获取阿米巴列表数据
     */

    public function getAmoebaList($limit=20,$start=0){
        $data = array();
        $items = $this->db->select("id")->limit($limit,$start)->get("amoeba")->result();
        foreach($items as $item){
            $data[] = $this->getAmoeba($item->id);
        }
        return $data;
    }

    /*
     *
     * 获取阿米巴列表数据
     */

    public function getAmoebaInfoList($limit=20,$start=0){
        $data = array();
        $items = $this->db->select("id")->limit($limit,$start)->get("amoeba")->result();
        foreach($items as $item){
            $data[] = $this->getAmoeba($item->id)->getAmoebaInfoView();
        }
        return $data;
    }

    public function getScore(){
        return rand(0,100);
    }


}  
