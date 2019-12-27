<?php

if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class Storage extends CI_Model
{
    public $_minxer = null;

    public $sizes = array(
        "square"	=> array('width'=>196,'height'=>196),
        "region_large"	=> array('width'=>457,'height'=>196),
        "region_small"	=> array('width'=>326,'height'=>402),
        "school"	=> array('width'=>330,'height'=>220),
        'small'     => array('width'=>160,'height'=>160),
        'medium'    => array('width'=>152,'height'=>152),
        'large'     => array('width'=>240,'height'=>240),
        'region_bg'     => array('width'=>500,'height'=>298)
    );


    public $errorCode    = 0;
    public $errorMessage = null;



    public function __construct()
    {
        parent::__construct();
    }

    /*
     * 设置当前上传文件的属性
     * $minxer = 'person' or $minxer = 'group'
     * @return Storage
     */

    public function setMinxer($minxer){
        $this->_minxer = $minxer;
        return $this;
    }

   /*
    * 文件上传共用类
    * 只针对于图片
    *
    */

    public function uploadFile(){
        if($this->_minxer){
            $realfiepath = UPLOADFILEPATH.$this->_minxer->objectType.'/n'.$this->_minxer->id;
            if (!is_dir($realfiepath))
            {
                mkdir($realfiepath,0755,true);
            }

            $config['upload_path'] = $realfiepath;
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = 8*1024*1024;
            $this->load->library('upload', $config);
            //$this->upload->set_allowed_types('*');
            if(!$this->upload->do_upload('file')){
                $this->errorCode = 9000001;
                $this->errorMessage = $this->upload->display_errors();
            }else{
                $data = $this->upload->data();
                $this->load->library('image_lib');
                $config['image_library']  = 'gd2';
                $config['source_image']   = $data['full_path'];
                $config['dynamic_output'] = FALSE;
                $config['quality']        = '100%';
                $config['new_image']      = $data['full_path'];
                $config['create_thumb']   = TRUE;
                $config['maintain_ratio'] = FALSE;
                $config['master_dim']     = 'width';
                $sizes = $this->sizes;
                $imagesizearray =  getimagesize($data['full_path']);
                $data['meta'] = $imagesizearray[0].'x'.$imagesizearray[1];
                foreach($sizes as $dem=>$size){
                    $config['width'] = $size['width'];
                    $config['height'] = $size['height'];
                    $config['thumb_marker'] = '_'.$dem;
                    $this->image_lib->initialize($config);
                    if (!$this->image_lib->resize())
                    {
                        $this->errorCode = 9000002;
                        $this->errorMessage = $this->upload->display_errors();
                    }else{
                    }
                }
                $this->data = $data;
            }
        }
        return $this;
    }

    public function uploadBackGroundFile(){
        if($this->_minxer){
            $realfiepath = UPLOADFILEPATH.$this->_minxer->objectType.'/n'.$this->_minxer->id;
            if (!is_dir($realfiepath))
            {
                mkdir($realfiepath,0755,true);
            }

            $config['upload_path'] = $realfiepath;
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = 8*1024*1024;
            $this->load->library('upload', $config);
            //$this->upload->set_allowed_types('*');
            if(!$this->upload->do_upload('fileback')){
                $this->errorCode = 9000001;
                $this->errorMessage = $this->upload->display_errors();
            }else{
                $data = $this->upload->data();
                $this->load->library('image_lib');
                $config['image_library']  = 'gd2';
                $config['source_image']   = $data['full_path'];
                $config['dynamic_output'] = FALSE;
                $config['quality']        = '100%';
                $config['new_image']      = $data['full_path'];
                $config['create_thumb']   = TRUE;
                $config['maintain_ratio'] = FALSE;
                $config['master_dim']     = 'width';
                $sizes = $this->sizes;
                $imagesizearray =  getimagesize($data['full_path']);
                $data['meta'] = $imagesizearray[0].'x'.$imagesizearray[1];
                foreach($sizes as $dem=>$size){
                    $config['width'] = $size['width'];
                    $config['height'] = $size['height'];
                    $config['thumb_marker'] = '_'.$dem;
                    $this->image_lib->initialize($config);
                    if (!$this->image_lib->resize())
                    {
                        $this->errorCode = 9000002;
                        $this->errorMessage = $this->upload->display_errors();
                    }else{
                    }
                }
                $this->data = $data;
            }
        }
        return $this;
    }

    /*
     * 文件上传共用类
     * 只针对于多媒体文件
     *
   */

    public function uploadMediaFile(){
        if($this->_minxer){
            $realfiepath = UPLOADFILEPATH.$this->_minxer->objectType.'/n'.$this->_minxer->id;
            if (!is_dir($realfiepath))
            {
                mkdir($realfiepath,0755,true);
            }
           // echo $realfiepath;exit;
            $config['upload_path'] = $realfiepath;
           $config['allowed_types'] = 'mp3|wav|caf|mp4|jpeg|jpg|png';
            $config['max_size'] = 100*1024*1024;
            $this->load->library('upload', $config);
            //$this->upload->set_allowed_types('mp3|wav|caf');
            if(!$this->upload->do_upload('file')){
                $this->errorCode = 9000001;
                $this->errorMessage = $this->upload->display_errors();
            }else{
                $data = $this->upload->data();
                $this->data = $data;
            }
        }
        return $this;
    }


    public function uploadLessonMediaFile($file){
        if($this->_minxer){
            $realfiepath = UPLOADFILEPATH.$this->_minxer->objectType.'/n'.$this->_minxer->id;
            if (!is_dir($realfiepath))
            {
                mkdir($realfiepath,0755,true);
            }
            $config['upload_path'] = $realfiepath;
            $config['allowed_types'] = 'mp3|wav|caf|mp4';
            $config['max_size'] = 8*1024*1024;
            $this->load->library('upload', $config);
            //$this->upload->set_allowed_types('mp3|wav|caf');
            if(!$this->upload->do_upload($file)){
                $this->errorCode    = 9000001;
                $this->errorMessage = $this->upload->display_errors();
            }else{
                $data = $this->upload->data();
                $this->data = $data;
            }
        }
        return $this;
    }





    public  function setSize($size=array()){
        $this->sizes[] = $size;
        return $this;
    }

    public function getFileName($filename=null,$size="small"){

        if(!empty($filename)){
            if($size == 'origin') return base_url() . 'assets/' . $this->_minxer->objectType . '/n'.$this->_minxer->id.'/' . $filename;
            $file_ext = strrchr($filename,'.');
            $filename = str_replace($file_ext, '', $filename);
            $file_path = base_url() . 'assets/' . $this->_minxer->objectType . '/n'.$this->_minxer->id.'/' . $filename . '_' . $size . $file_ext;
        }else{
            $file_path = "";
        }
        return $file_path;
    }

    public function removeFile($filename){
        $realfiepath = UPLOADFILEPATH.$this->_minxer->objectType.'/n'.$this->_minxer->id.'/' . $filename;
        if(file_exists($realfiepath)){
            unlink($realfiepath);
        }
        return true;
    }

    public function getMeidiaFileName($filename=null){
        if(!empty($filename)){
            return base_url() . 'assets/' . $this->_minxer->objectType . '/n'.$this->_minxer->id.'/' . $filename;
        }else{
            $file_path = "";
        }
        return $file_path;
    }


}