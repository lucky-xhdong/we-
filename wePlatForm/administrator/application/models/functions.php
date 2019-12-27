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
        return  $this->db->where('province_id',$province_id)->get('province')->row();
    }

    /*
     * 获取市
     * @param
     * @return array
     */

    public function getCity($city_id){
        return  $this->db->where('city_id',$city_id)->get('city')->row();
    }

    /*
     * 获取区域
     * @param
     * @return array
     */

    public function getDistrict($district_id){
        return  $this->db->where('district_id',$district_id)->get('district')->row();
    }

}  
