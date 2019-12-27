<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Story extends CI_Model{


    public $object_type = "story";


    public function __construct()
    {
        parent::__construct();
        $this->_initialize();

    }



    public function _initialize($config=array())
    {
        $config['attributes'] = array(
            'id'                    => array("require" => false),
            "title"                 => array("require" => false),
            'body'                  => array("require" => true),
            "created_time"          => array("require" => false),
            "user_id"               => array("require" => false),
            "block_user_ids"        => array("require" => false),
            "public_user_ids"       => array("require" => false),
            "access"                => array("require" => false),
            "location"              => array("require" => false),
            "comment_count"         => array("require" => false),
            "last_comment_time"     => array("require" => false),
            "last_comment_body"     => array("require" => false),
            "last_comment_user_id"  => array("require" => false),
            "duration"              => array("require" => false),
            "vote_up_count"         => array("require" => false),
            "filename"         => array("require" => false),
            "title_type"         => array("require" => false),
            "story_type"         => array("require" => false),

        );
        parent::_initialize($config);
    }

    public function getStory($id){
        $unit = new self;
        $data = $this->config['attributes'];
        $row = $this->db->select(implode(',',array_keys($data)))->where("id",$id)->get("storys")->row_array();
        if($row){
            foreach($row as $key=>$val){
                if(empty($val)) $val = "";
                $unit->$key = $val;
            }
        }else{
            $unit->id = 0;
        }
        return $unit;
    }

    public function addStory($user,$data=array(),$post=array()){
        //获取发布的post数据
        if($data && count($data)){
            $data['created_time'] = date('Y-m-d H:i:s');
            if(isset($data['body']) && !empty($data['body'])) $data['body'] = $this->userTextEncode($data['body']);
            if(isset($data['title']) && !empty($data['title'])) $data['title'] = $this->userTextEncode($data['title']);
            $this->db->insert('storys',$data);
            $storyId = $this->db->insert_id();
            if(isset($post['ids'])){
                $ids = explode(',',$post['ids']);
                // 更新file的id
                if(count($ids) && is_array($ids)){
                    $this->db->where_in('id',$ids);
                    $this->db->update('files',array("object_id"=>$storyId));
                }

            }
            $this->returncode['data'] = $this->getStory($storyId)->getStoryInfo();
        }
        return $this;
    }


    public function updateColumn($data){
        if(is_array($data)){
            $this->db->where("id",$this->id);
            $this->db->update('storys',$data);
        }
        return $this;
    }

    public function getStoryInfo($user=null){
        $minxer                   = new stdClass();
        $minxer->id               = $this->user_id;
        $minxer->objectType       = "story";
        $data = array(
            'id'                  => (int)$this->id,
            "title"               => $this->userTextDecode($this->title),
            'body'                => $this->userTextDecode($this->body),
            "user_id"             => $this->user_id,
            "userInfo"            => $this->user->getUser($this->user_id)->getUserInfoNotToken(),
            "created_time"        => $this->created_time,
            "location"            => $this->location,
            "comment_count"       => $this->comment_count,
            "last_comment_time"   => $this->last_comment_time,
            "last_comment_body"   => $this->last_comment_body,
            "last_comment_user_id"=> $this->last_comment_user_id,
            'fileurl'             => $this->storage->setMinxer($minxer)->getFileName($this->filename,'origin'),
            'vote_up_count'       => $this->vote_up_count,
            'voterList'           => $this->vote->setMinxer($this)->getVoterList(),
            'commentsList'        => $this->comment->setMinxer($this)->getCommentsList(0,false)->returncode['data'],
            'fileList'            => $this->wetalkfile->setMinxer($this)->getFileList()->returncode['data'],
            "title_type"          => $this->title_type,
            "story_type"          => $this->story_type,
            'duration'            => $this->duration,
            'isVoted'             => false
        );
        if($user) $data['isVoted'] = $this->vote->setMinxer($this)->isVoted($user);
        return $data;
    }

    public function getFollowerStoryList($followers,$limit,$start,$user){
        $followers[] = $user->id;
        $storys = array();
        $result = $this->db->select("id")->where_in("user_id",$followers)->order_by("id","desc")->limit($limit,$start)->get("storys")->result();
        foreach($result as $story){
            $storys[] = $this->getStory($story->id)->getStoryInfo($user);
        }
        $this->returncode['data'] = $storys;
        return $this;

    }

    public function userTextEncode($str){
        if(!is_string($str))return $str;
        if(!$str || $str=='undefined')return '';

        $text = json_encode($str); //暴露出unicode
        $text = preg_replace_callback("/(\\\u[ed][0-9a-f]{3})/i",function($str){
            return addslashes($str[0]);
        },$text); //将emoji的unicode留下，其他不动，这里的正则比原答案增加了d，因为我发现我很多emoji实际上是\ud开头的，反而暂时没发现有\ue开头。
        return json_decode($text);
    }

    public function userTextDecode($str){
        $text = json_encode($str); //暴露出unicode
        $text = preg_replace_callback('/\\\\\\\\/i',function($str){
            return '\\';
        },$text); //将两条斜杠变成一条，其他不动
        return json_decode($text);
    }


}  
