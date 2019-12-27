<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Functions extends CI_Model{



    public function __construct()
    {
        parent::__construct();
    }


    /*
     * 获取所有省份列表
     * @param
     * @return array
     */
    public function getProviceList($countryid=1){
        return $this->db->where('country_id',$countryid)->get('province')->result();
    }

    /*
     * 获取所有城市列表
     * @param
     * @return array
     */


    public  function  getCityList($provice=1){
        return $this->db->where('province_id',$provice)->get('city')->result();
    }
    /*
     * 获取所有区域列表
     * @param
     * @return array
     */


    public  function  getAreaList($cityid=1){
        return $this->db->where('city_id',$cityid)->get('district')->result();
    }

    /*
     * 获取省
     * @param
     * @return array
     */

    public function getProvice($province_id){
        $row =   $this->db->where('province_id',$province_id)->get('province')->row();
        if(!$row){
            $row = new stdClass();
            $row->name = "";
        }
        return $row;
    }

    /*
     * 获取市
     * @param
     * @return array
     */

    public function getCity($city_id){
        $row =   $this->db->where('city_id',$city_id)->get('city')->row();
        if(!$row){
            $row = new stdClass();
            $row->name = "";
        }
        return $row;

    }

    /*
     * 获取区域
     * @param
     * @return array
     */

    public function getDistrict($district_id){
        $row= $this->db->where('district_id',$district_id)->get('district')->row();
        if(!$row){
            $row = new stdClass();
            $row->name = "";
        }
        return $row;
    }

    /**
     * 根据省市县获取学校
     */
    public function  getSchool($province_id,$city_id,$district_id){
        return  $this->db->where('province_id',$province_id)->where('city_id',$city_id)->where('district_id',$district_id)->get('school')->result();
    }

    public function getServiceCount(){

        $region_count = $this->db->get("region")->num_rows();
        $school_count = $this->db->get("school")->num_rows();
        $student_count = $this->db->where("user_type","student")->get('class_user_relationship')->num_rows();
        $teacher_count = $this->db->where("user_type","teacher")->get('class_user_relationship')->num_rows();
            $data = array(
                "region_count"  =>$region_count,
                "school_count"  => $school_count,
                "teacher_count" =>$teacher_count,
                "student_count" => $student_count,
                "status"=>1,
                "date"=>date("Y-m-d")
            );
        return (object) $data;
    }



//    public function getServiceCount(){
//        $_week_day = date("w");
//        $item  = $this->db->get("service_count")->row();
//        if($_week_day == 4 && $item->date != date("Y-m-d")){
//                $data = array(
//                    "region_count"  => $item->region_count + rand(1,3),
//                    "school_count"  => $item->school_count + rand(10,15),
//                    "teacher_count" => $item->teacher_count + rand(8,18),
//                    "student_count" => $item->student_count + rand(100,200),
//                    "status"=>1,
//                    "date"=>date("Y-m-d")
//                );
//                $this->db->where("id",$item->id)->update("service_count",$data);
//                return (object) $data;
//        }else{
//            $this->db->where("id",$item->id)->update("service_count",array("status"=>0));
//        }
//        return $item;
//    }

}  
