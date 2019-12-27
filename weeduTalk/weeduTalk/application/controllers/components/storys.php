<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Storys extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('wetalkfile');
        $this->load->model('story');
        $this->load->model('vote');
        $this->load->model('comment');
    }


    public function testEMoj(){
//        $data['body']      =  "ghhbbbbhvbbbbbbbbvvvbbbbbbbbbbbbbbbbbbbbbbb\Ud83d\Ude0d\Ud83d\Ude12\Ud83d\Ude1f\Ud83d\Ude1f";
//        $data['body']      =  addslashes($data['body']);
//        $this->db->where("id",80);
//        $this->db->update("files",$data);
        return $this;
    }

    /*
     *
     * 发布story
     *
     */

    public function addStory(){
        $argus = func_get_args();
        $user = func_get_arg(count($argus)-1);
        if($user) {
            $user->objectType = "story";
            $post = $this->input->post();
            if ($post) {
                $file = $this->storage->setMinxer($user)->uploadMediaFile();
                if($file->errorCode == 0){
                    $data['filename']    =  $file->data['file_name'];
                    $data['title_type']  =  "audio";
                }
                $data['duration']      = isset($post['duration'])?$post['duration']:0;
                $data['owner_type']    =  isset($post['owner_type'])?$post['owner_type']:'user';
                if($data['owner_type'] == 'user') $data['owner_id'] = $user->id;
                else $data['owner_id'] =   isset($post['owner_id'])?$post['owner_id']:0;
                $data['title']          =   isset($post['title'])?$post['title']:"";
                $data['body']          =   isset($post['body'])?$post['body']:"";
                $data['access']        =   isset($post['access'])   ? $post['access'] : "public";
                $data['location']      =   isset($post['location']) ? $post['location'] : "location";
                $data['user_id']       =   $user->id;
                if(count($data)){
                    //TODO
                    return $this->story->addStory($user,$data,$post);
                }
            }
        }
        return $this;
    }

    /*
     *
     * 上传图片体文件
     *
     */

    public function addImage(){
        $argus = func_get_args();
        $user = func_get_arg(count($argus)-1);
        if($user) {
            $user->objectType = "story";
                $file = $this->storage->setMinxer($user)->uploadFile();
                if($file->errorCode == 0){
                    $data['filename']    =  $file->data['file_name'];
                    $data['meta']        =  $file->data['meta'];
                    $data['user_id']     =  $user->id;
                    $data['object_type'] =  'story';
                    $data['type']        =  "image"; // image
                    if(count($data)){
                        //TODO
                        return $this->wetalkfile->addFile($user,$data);
                    }
                }else{
                    $this->returncode['errcode'] = "10000012";
                    $this->returncode['errdesc'] = $file->errorMessage;
                }

        }
        return $this;
    }

    /*
     *
     * 对文件添加文字或者多媒体描述
     *
     */

    public function addMediaDescription(){
        $argus = func_get_args();
        $user = func_get_arg(count($argus)-1);
        if($user) {
            $user->objectType = "story";
            $post = $this->input->post();
            if ($post) {
                $file = $this->storage->setMinxer($user)->uploadMediaFile();

                if($file->errorCode == 0){
                    $data['media_name']    =  $file->data['file_name'];
                    $data['duration']      = isset($post['duration'])?$post['duration']:0;
                    $data['body']          = isset($post['body'])?$post['body']:" ";
                }else{
                    $data['body'] = isset($post['body'])?$post['body']:" ";
                }
                if(count($data)){
                    //TODO
                    return $this->wetalkfile->editFile($post['id'],$data);
                }
            }
        }
        return $this;
    }

    /*
     *
     * 对一个story点赞
     *
     */

    public function voteUpstory(){
        $argus = func_get_args();
        $user = func_get_arg(count($argus)-1);
        if($user && count($argus) >1){
            $story =  $this->story->getStory($argus[0]);
            if(!empty($story->id)){
                $this->returncode['data'] = $this->vote->setMinxer($story)->voteUpStory($user)->returncode['data'];
            }else{
                $this->returncode['errcode'] = 10000001;
                $this->returncode['errdesc'] = "没有这样的内容";
            }
        }
        return $this;
    }

    /*
    *
    * 对一个story发表评论
    *
    */

    public function addComment(){
        $argus = func_get_args();
        $user = func_get_arg(count($argus)-1);
        $to_user = null;
        if($user && count($argus) >1){
            $post = $this->input->post();
            $user->objectType = "story";
            $file = $this->storage->setMinxer($user)->uploadMediaFile();
            if($file->errorCode == 0){
                $data['filename']    =  $file->data['file_name'];
                $data['duration']    = isset($post['duration'])?$post['duration']:0;
            }
            $data['body']            =   isset($post['body'])?$post['body']:"";
            if(isset($post['to_user_id'])){
                $to_user = $this->user->getUser($post['to_user_id']);
            }
            $story =  $this->story->getStory($argus[0]);
            if(!empty($story->id)){
                $this->returncode['data'] = $this->comment->setMinxer($story)->addComment($data,$user,$to_user)->returncode['data'];
            }else{
                $this->returncode['errcode'] = 10000001;
                $this->returncode['errdesc'] = "没有这样的内容";
            }
        }
        return $this;
    }

    /*
     *
     *  获取我的豆豆圈内容列表
     */


}
