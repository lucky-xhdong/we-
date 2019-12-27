<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Event extends CI_Model{

    public function __construct()
    {
        parent::__construct();
        $this->_initialize();
    }



    public function _initialize($config=array())
    {
        $config['attributes'] = array(
            'id'              => array("require" => false),
            "unit_id"         => array("require" => false),
            'content_id'      => array("require" => true),
            "part_id"         => array("require" => false),
            "type" 		      => array("require" => false),
            "media_filename"  => array("require" => false),
            "media_type"      => array("require" => false),
            "lesson_id"       => array("require" => false),
            "timeRange"       => array("require" => false),
            "text"            => array("require" => false),
            "content"         => array("require" => false),
            "answer"          => array("require" => false),
            "picture"         => array("require" => false),
            "pictures"          => array("require" => false),
            "displayKewords"    => array("require" => false),
            "scores"            => array("require" => false),
            "media_file_ids"    => array("require" => false),
            "picture_file_ids"  => array("require" => false),
            "content_zh"        => array("require" => false),
            "content_en"        => array("require" => false),
            'name'              => array("require" => false),
            'avatar_id'         => array("require" => false),
            'cloze_answer'      => array("require" => false),
            "system_key"=> array("require" => false),
            "speech_keywords"=> array("require" => false),
            "all_right" => array("require" => false),
            "answers" => array("require" => false),


        );
        parent::_initialize($config);
    }

    public function getEvent($id){
        $unit = new self;
        $data = $this->config['attributes'];
        $row = $this->db->select(implode(',',array_keys($data)))->where("id",$id)->get("lessons_part_events")->row_array();
        if($row){
            foreach($row as $key=>$val){
                if(empty($val)) $val = "";
                $unit->$key = $val;
            }
            return $this->initEvent($unit);
        }else{
            $unit->id = 0;
        }
        return $unit;
    }

    public function  updateKey($data = array())
    {
        if (count($data)) {
            foreach ($data as $key => $val) {
                $this->$key = $val;
            }
            $this->db->where("id", $this->id);
            $this->db->update("lessons_part_events", $data);
        }
        return true;
    }

    private function initEvent($event){
        $content = $this->db->select("*")
            ->where("event_id",$event->id)
            ->where_not_in("type",array("middle_multipleChoices","multipleChoices"))
            ->get("lessons_part_event_content")->row();
        if($content){
            $event->content = $content;
            // 查找content
            if(!empty($event->content->file_id)){
                $event->content->media_list = $this->getPublcMediaFileList($event->content->file_id);
            }
            // 查找items
            $choiceListArray = array("multipleChoices",
                "middle_multipleChoices",
                "review_multipleChoices_click",
                "MTmultipleChoices",
                "SRmultipleChoice",
                "MTmultipleChoice",
                "review_multipleChoices_speak",
                "primary_review_multipleChoices_speak"
                );

            if(!in_array($event->type,$choiceListArray)){
                $items = $this->db->select("*")->where("content_id",$event->content->id)->where("event_id",$event->id)->get("lessons_part_event_content_items")->result();
                if($items){
                    foreach($items as $item){
                        if(!empty($item->file_id)) {
                            $item->media_list = $this->getPublcMediaFileList($item->file_id);
                        }

                        if(!empty($item->picture_file_ids)){
                            $item->picture_list = $this->getPublcMediaFileList($item->picture_file_ids);
                        }

                        if(!empty($item->picture_origin_ids)){
                            $item->picture_origin_list = $this->getPublcMediaFileList($item->picture_origin_ids);
                        }


                    }
                    $event->content->items = $items;
                }

                // 查找select
                $selevent['Yes'] = $this->db
                    ->where("content_id",$event->content->id)
                    ->where("yesorno","Yes")
                    ->get("lessons_part_event_content_select_events`")->row();
                if( $selevent['Yes']) $selevent['Yes']->media_list = $this->getPublcMediaFileList($selevent['Yes']->file_id);
                $selevent['No'] = $this->db
                    ->where("content_id",$event->content->id)
                    ->where("yesorno","No")
                    ->get("lessons_part_event_content_select_events`")->row();
                if( $selevent['No']) $selevent['No']->media_list = $this->getPublcMediaFileList($selevent['No']->file_id);
                if($selevent['No'] && $selevent['Yes']){
                    $event->content->selectEvents =$selevent;
                }

                //查找clickEvents
                $clickEvent['click_1'] = $this->db
                    ->where("content_id",$event->content->id)
                    ->where("click_sort","click_1")
                    ->get("lessons_part_event_click_events`")->row();
                if( $clickEvent['click_1']) $clickEvent['click_1']->media_list = $this->getPublcMediaFileList($clickEvent['click_1']->file_id);
                $clickEvent['click_2'] = $this->db
                    ->where("content_id",$event->content->id)
                    ->where("click_sort","click_2")
                    ->get("lessons_part_event_click_events`")->row();
                if( $clickEvent['click_2']) $clickEvent['click_2']->media_list = $this->getPublcMediaFileList($clickEvent['click_2']->file_id);
                if($clickEvent['click_1'] && $clickEvent['click_2']){
                    $event->content->clickEvents =$clickEvent;
                }
                //查找childEvents
                $childevents = $this->db->select("*")->where("content_id",$event->content->id)->where("event_id",$event->id)->get("lessons_part_event_child_events")->result();
                if($childevents){
                    foreach($childevents as $childevent){
                        if(!empty($childevent->file_id)){
                            $childevent->media_list = $this->getPublcMediaFileList($childevent->file_id);
                        }
                    }
                    $event->content->childrenEvents = $childevents;
                }
            }
        }
        return $event;
    }

    public function getEventInfo(){
        $data = array(
            'id'              => $this->id,
            "unit_id"         => $this->unit_id,
            'content_id'      => (int)$this->content_id,
            "part_id"         => $this->part_id,
            "type" 		      => $this->type,
            "media_filename"  => $this->media_filename,
            "media_type"      => $this->media_type,
            "lesson_id"       => $this->lesson_id,
            "timeRange"       => $this->timeRange,
            "text"            => $this->text,
            "content"         => $this->content,
            "answer"          => $this->answer,
            "answers"         => $this->answers,
            "picture"         => $this->picture,
            "pictures"        => $this->pictures,
            "displayKewords"  => $this->displayKewords,
            "scores"          => $this->scores,
            "media_list"       => $this->getMediaFileList(),
            "picture_list"        => $this->getImageFileList(),
            "avatar_picture_list"        => $this->getAvatarFileList(),
            'name'              => $this->name,
            "media_default_url"=> $file_url =  base_url() . 'media/images/audio.jpg'
        );
        $part = $this->lessonpart->getLessonpart($this->part_id);
        if(count($data['media_list']) == 0){
            $data['media_list'] = $part->getMediaFileList();
        }
        $choiceListArray = array("multipleChoices",
            "middle_multipleChoices",
            "review_multipleChoices_click",
            "MTmultipleChoices",
            "SRmultipleChoice",
            "MTmultipleChoice",
            "review_multipleChoices_speak","primary_review_multipleChoices_speak");

        if(in_array($this->type,$choiceListArray)){
            $data['multipleChoices'] = $this->getmultipleChoices();
        }
        return $data;
    }

    public function getmultipleChoices(){
        $contents = $this->db->where("event_id",$this->id)->get("lessons_part_event_content")->result();
        foreach($contents as $content){
            $content->media_list = $this->getPublcMediaFileList($content->file_id);
            $items =  $this->db->where("event_id",$this->id)
                ->where("content_id",$content->id)
                ->get("lessons_part_event_content_items")->result();
            $content->items = $items;
            $selevent['Yes'] = $this->db
                ->where("content_id",$content->id)
                ->where("yesorno","Yes")
                ->get("lessons_part_event_content_select_events`")->row();
            if( $selevent['Yes']) $selevent['Yes']->media_list = $this->getPublcMediaFileList($selevent['Yes']->file_id);
            $selevent['No'] = $this->db
                ->where("content_id",$content->id)
                ->where("yesorno","No")
                ->get("lessons_part_event_content_select_events`")->row();
            if( $selevent['No']) $selevent['No']->media_list = $this->getPublcMediaFileList($selevent['No']->file_id);
            $content->selectEvents =$selevent;

        }
        return $contents;
    }


    public function getPublcMediaFileList($file_id){
        $data = array();
        if($file_id != null & !empty($file_id)){
            $file_ids = explode(",",$file_id);
            foreach($file_ids as $file_id){
                $file = $this->wetalkfile->getFile($file_id);
                if($file->id != 0){
                    $data[] =  $file->getLessonFileInfo();
                }
            }
        }
        return $data;
    }


    public function getAnswers($eventItem){
        $data = array();
        if($eventItem && isset($eventItem->answers)){
            if(!empty($eventItem->answers)){
                $answer_texts = explode(",",$eventItem->answers);
                foreach($answer_texts as $answer_text){
                    $data[] = array(
                        "type"=>"text",
                        "text"=>$answer_text,
                        "isCorrect"=>true
                    );
                }
            }
        }
        return $data;
    }


    public function getJsonPartEventList($part_id=0,$part,$lesson){
        $evnets = $this->db->select('id')->where("type !=","system")->where("type !=","result")->where("part_id",$part_id)->order_by("sort","asc")->get("lessons_part_events")->result();
        $result = array();
        $result['events'] = array();
        $i = 1;
        foreach($evnets as $key => $event){
            $eventItem = $this->getEvent($event->id);
            if($eventItem->id != 0){
                $filename = "";
                $filetype = "";
                if(!empty($eventItem->media_file_ids)){
                    $file_ids = explode(",",$eventItem->media_file_ids);
                    $file = $this->wetalkfile->getFile($file_ids[0]);
                    if($file->id !=0){
                        $filename = 'media/'.$file->filename;
                        $filetype = $file->type;
                    }
                }
                $files = array();
                if(!empty($eventItem->picture_file_ids)){
                    $file_ids = explode(",",$eventItem->picture_file_ids);
                    foreach($file_ids as $file_id){
                        $file = $this->wetalkfile->getFile($file_id);
                        if($file->id !=0){
                            $files[] = 'media/'.$file->filename;
                        }

                    }
                }

                $avatarname = "";
                if(!empty($eventItem->avatar_id)){
                    $file_ids = explode(",",$eventItem->avatar_id);
                    $file = $this->wetalkfile->getFile($file_ids[0]);
                    if($file->id !=0){
                        $avatarname = 'media/'.$file->filename;
                    }
                }
                $data = array(
                    "num"       =>$i++,
                    'type'      =>$eventItem->type,
                    "timeRange" =>$eventItem->timeRange,
                    "text"      =>$eventItem->text,
                    "content"   =>$eventItem->text,
                    "media_filename"=>$filename,
                    "media_type"    =>$filetype,
                    "answer"      =>$eventItem->answer?$eventItem->answer:$eventItem->text,
                    "answers"     =>$this->getAnswers($eventItem),
                    "cloze_answer"=>$eventItem->cloze_answer,
                    "picture"=>"",
                    "pictures"=>array(),
                    "name"    => $eventItem->name,
                    "avatar"  =>  $avatarname
                );
                //if($lesson->type == "review"){
                    $data["key"] = (string)$eventItem->picture_file_ids;
                //}
                if((int)$eventItem->displayKewords == 1){
                    $data['displayKewords'] = true;
                }
                if((int)$eventItem->all_right == 1){
                    $data['all_right'] = true;
                }

                 $data["pictures"] = $files;
                if(count($files) ==1){
                    $data["picture"] = $files[0];
                }
                if(empty($data['media_filename'])){
                    if($eventItem->type == "vocabulary_look_listen"){
                        $data['media_filename'] = $data["picture"];
                        $data['media_type']     = "image";
                    }else{
                        $data['media_filename'] = $part->real_file_name;
                        $data['media_type']     = $part->real_file_type;
                    }
                }


                if($eventItem->type == "speech"){
                    $data['content_zh'] = $eventItem->content_zh;
                    $data['content_en'] = $eventItem->content_en;
                    $data['speech_keywords'] = $eventItem->speech_keywords;

                }

                //选择题不渲染其他事件
                $choiceListArray = array(
                    "multipleChoices",
                    "middle_multipleChoices",
                    "review_multipleChoices_click",
                    "MTmultipleChoices",
                    "review_multipleChoices_speak","primary_review_multipleChoices_speak");

                if(in_array($eventItem->type,$choiceListArray)){
                    if($eventItem->type == "MTmultipleChoices"){
                        $data["multipleChoicesList"] = $this->getJsonmultipleChoices($i,$eventItem);
                        //$i = $i+count($data["multipleChoicesList"]);
                    }else{
                        $data["multipleChoicesList"] = $this->getJsonmultipleChoices($i,$eventItem);
                        $i = $i+count($data["multipleChoicesList"]);
                    }
                }else{
                    $content = $this->db->where("event_id",$eventItem->id)->get("lessons_part_event_content")->row();
                    if($content){
                        if($eventItem->type == 'MTmultipleChoice' || $eventItem->type ==  "SRmultipleChoice"){
                            $filename = "";
                            $filetype = "";
                            if(!empty($content->file_id)){
                                $file = $this->wetalkfile->getFile($content->file_id);
                                if($file->id !=0){
                                    $filename = 'media/'.$file->filename;
                                    $filetype = $file->type;
                                }
                            }
                            $data["text"] = array(  "type"=>$filetype,
                                                    "text"=>$content->text,
                                                    "media_filename"=>$filename,
                                                    "timeRange"=>$content->timeRange);
                        }


                       // if(count($items) > 1){

                        if($eventItem->type == "sr_conjunction_clause"){
                            $items = $this->getItemsReviewForJson($content,$eventItem);
                            // if(count($items) > 1){
                            $data['content_id'] = (int)$content->id;
                            $data['scores'] = (int)$content->scores;
                            $data['items'] =$items["text"];
                               // $data['items'] = $items["text"];
                        }else if($eventItem->type == "sr_repetition"){
                            $items = $this->getItemsReviewForJson($content,$eventItem);
                            // if(count($items) > 1){
                            $data['content_id'] = (int)$content->id;
                            $data['scores'] = (int)$content->scores;
                          //  $data['items'] =$items["text"];
                            // $data['items'] = $items["text"];
                        }else{
                            $items = $this->getItemsForJson($content,$eventItem);
                            $data['content_id'] = (int)$content->id;
                            $data['scores'] = (int)$content->scores;
                            $data['items'] = $items;
                        }

                        //}
                        $data['clickEvents'] = $this->getClickEventForJson($content,$eventItem);
                        $data['childEvents'] = $this->getchildEventsForJson($content,$eventItem);
                        $data['selectEvents'] = $this->getSelectEventForJson($content,$eventItem);
                    }

                }
                $result['events'][] = $data;
            }
        }
        return $result;
    }


    public function getJsonAllPartEventListforMt($unit,$types,$part){
        $evnets = $this->db->select('id')->where("type !=","system")->where("type !=","result")->where("unit_id",$unit->id)->where_in("type",$types)->order_by("sort","asc")->get("lessons_part_events")->result();
        $result = array();
        $result['events'] = array();
        $i = 1;
        foreach($evnets as $key => $event){
            $eventItem = $this->getEvent($event->id);
            if($eventItem->id != 0){
                $filename = "";
                $filetype = "";
                if(!empty($eventItem->media_file_ids)){
                    $file_ids = explode(",",$eventItem->media_file_ids);
                    $file = $this->wetalkfile->getFile($file_ids[0]);
                    if($file->id !=0){
                        $filename = 'media/'.$file->filename;
                        $filetype = $file->type;
                    }
                }
                $files = array();
                if(!empty($eventItem->picture_file_ids)){
                    $file_ids = explode(",",$eventItem->picture_file_ids);
                    foreach($file_ids as $file_id){
                        $file = $this->wetalkfile->getFile($file_id);
                        if($file->id !=0){
                            $files[] = 'media/'.$file->filename;
                        }

                    }
                }
                $avatarname = "";
                if(!empty($eventItem->avatar_id)){
                    $file_ids = explode(",",$eventItem->avatar_id);
                    $file = $this->wetalkfile->getFile($file_ids[0]);
                    if($file->id !=0){
                        $avatarname = 'media/'.$file->filename;
                    }
                }
                $data = array(
                    "num"       =>$i++,
                    'type'      =>$eventItem->type,
                    "timeRange" =>$eventItem->timeRange,
                    "text"      =>$eventItem->text,
                    "media_filename"=>$filename,
                    "media_type"    =>$filetype,
                    "picture"=>"",
                    "answer"      =>$eventItem->answer?$eventItem->answer:$eventItem->text,
                    "answers"     =>$this->getAnswers($eventItem),
                    "cloze_answer"=>$eventItem->cloze_answer,
                    "pictures"=>array(),
                    "name"    => $eventItem->name,
                    "avatar"  =>  $avatarname
                );
                if(empty($data['media_filename'])){
                    $data['media_filename'] = $part->real_file_name;
                    $data['media_type']     = $part->real_file_type;
                }
                if((int)$eventItem->displayKewords == 1){
                    $data['displayKewords'] = true;
                }
                if((int)$eventItem->all_right == 1){
                    $data['all_right'] = true;
                }
                $data["pictures"] = $files;
                if(count($files) ==1){
                    $data["picture"] = $files[0];
                }
                if($eventItem->type == "speech"){
                    $data['content_zh'] = $eventItem->content_zh;
                    $data['content_en'] = $eventItem->content_en;
                    $data['speech_keywords'] = $eventItem->speech_keywords;
                }

                //选择题不渲染其他事件
                $choiceListArray = array(
                    "multipleChoices",
                    "middle_multipleChoices",
                    "MTmultipleChoices",
                    "review_multipleChoices_click",
                    "review_multipleChoices_speak","primary_review_multipleChoices_speak");

                if(in_array($eventItem->type,$choiceListArray)){
                    $data["multipleChoicesList"] = $this->getJsonmultipleChoices($i,$eventItem);
                    $i = $i+count($data["multipleChoicesList"]);
                }else{
                    $content = $this->db->where("event_id",$eventItem->id)->get("lessons_part_event_content")->row();
                    if($content){
                        $items = $this->getItemsForJson($content,$eventItem);
                       // if(count($items) > 1){
                            $data['content_id'] = (int)$content->id;
                            $data['scores'] = (int)$content->scores;
                            $data['items'] = $items;

                       // }
                        $data['clickEvents'] = $this->getClickEventForJson($content,$eventItem);
                        $data['childEvents'] = $this->getchildEventsForJson($content,$eventItem);
                        $data['selectEvents'] = $this->getSelectEventForJson($content,$eventItem);
                    }

                }
                $data['scores'] = 5;
                $result['events'][] = $data;
            }
        }
        return $result;
    }


    public function getJsonAllPartEventList($lesson,$part){
        $evnets = $this->db->select('id')->where("type !=","system")->where("type !=","result")->where("lesson_id",$lesson->id)->order_by("sort","asc")->get("lessons_part_events")->result();
        $result = array();
        $result['events'] = array();
        $i = 1;
        foreach($evnets as $key => $event){
            $eventItem = $this->getEvent($event->id);
            if($eventItem->id != 0){
                $filename = "";
                $filetype = "";
                if(!empty($eventItem->media_file_ids)){
                    $file_ids = explode(",",$eventItem->media_file_ids);
                    $file = $this->wetalkfile->getFile($file_ids[0]);
                    if($file->id !=0){
                        $filename = 'media/'.$file->filename;
                        $filetype = $file->type;
                    }
                }
                $files = array();
                if(!empty($eventItem->picture_file_ids)){
                    $file_ids = explode(",",$eventItem->picture_file_ids);
                    foreach($file_ids as $file_id){
                        $file = $this->wetalkfile->getFile($file_id);
                        if($file->id !=0){
                            $files[] = 'media/'.$file->filename;
                        }

                    }
                }
                $avatarname = "";
                if(!empty($eventItem->avatar_id)){
                    $file_ids = explode(",",$eventItem->avatar_id);
                    $file = $this->wetalkfile->getFile($file_ids[0]);
                    if($file->id !=0){
                        $avatarname = 'media/'.$file->filename;
                    }
                }
                $data = array(
                    "num"       =>$i++,
                    'type'      =>$eventItem->type,
                    "timeRange" =>$eventItem->timeRange,
                    "text"      =>$eventItem->text,
                    "answer"      =>$eventItem->answer?$eventItem->answer:$eventItem->text,
                    "answers"     =>$this->getAnswers($eventItem),
                    "cloze_answer"=>$eventItem->cloze_answer,
                    "media_filename"=>$filename,
                    "media_type"    =>$filetype,
                    "picture"=>"",
                    "pictures"=>array(),
                    "name"    => $eventItem->name,
                    "avatar"  =>  $avatarname
                );
                if(empty($data['media_filename'])){
                    $data['media_filename'] = $part->real_file_name;
                    $data['media_type']     = $part->real_file_type;
                }
                if((int)$eventItem->displayKewords == 1){
                    $data['displayKewords'] = true;
                }
                if((int)$eventItem->all_right == 1){
                    $data['all_right'] = true;
                }
                $data["pictures"] = $files;
                if(count($files) ==1){
                    $data["picture"] = $files[0];
                }
                if($eventItem->type == "speech"){
                    $data['content_zh'] = $eventItem->content_zh;
                    $data['content_en'] = $eventItem->content_en;
                    $data['speech_keywords'] = $eventItem->speech_keywords;
                }

                //选择题不渲染其他事件
                $choiceListArray = array(
                    "multipleChoices",
                    "middle_multipleChoices",
                    "review_multipleChoices_click",
                    "MTmultipleChoices",
                    "review_multipleChoices_speak","primary_review_multipleChoices_speak");

                if(in_array($eventItem->type,$choiceListArray)){
                    $data["multipleChoicesList"] = $this->getJsonmultipleChoices($i,$eventItem);
                    $i = $i+count($data["multipleChoicesList"]);
                }else{
                    $content = $this->db->where("event_id",$eventItem->id)->get("lessons_part_event_content")->row();
                    if($content){
                        $items = $this->getItemsForJson($content,$eventItem);
                       // if(count($items) > 1){
                            $data['content_id'] = (int)$content->id;
                            $data['scores'] = (int)$content->scores;
                            $data['items'] = $items;
                        //}
                        $data['clickEvents'] = $this->getClickEventForJson($content,$eventItem);
                        $data['childEvents'] = $this->getchildEventsForJson($content,$eventItem);
                        $data['selectEvents'] = $this->getSelectEventForJson($content,$eventItem);
                    }

                }
                $result['events'][] = $data;
            }
        }
        return $result;
    }


    public function getJsonForReviewSummaryEventList($part,$type="text"){
        $evnets = $this->db->select('id')
            ->where("part_id",$part->id)
            ->where("type",$type)
            ->order_by("sort","asc")
            ->get("lessons_part_events")->result();
        $result = array();
        $result['events'] = array();
        $i = 1;
        foreach($evnets as $key => $event){
            $eventItem = $this->getEvent($event->id);
            if($eventItem->id != 0){
                $filename = "";
                $filetype = "";
                if(!empty($eventItem->media_file_ids)){
                    $file_ids = explode(",",$eventItem->media_file_ids);
                    $file = $this->wetalkfile->getFile($file_ids[0]);
                    if($file->id !=0){
                        $filename = 'media/'.$file->filename;
                        $filetype = $file->type;
                    }
                }
                $files = array();
                if(!empty($eventItem->picture_file_ids)){
                    $file_ids = explode(",",$eventItem->picture_file_ids);
                    foreach($file_ids as $file_id){
                        $file = $this->wetalkfile->getFile($file_id);
                        if($file->id !=0){
                            $files[] = 'media/'.$file->filename;
                        }

                    }
                }
                $avatarname = "";
                if(!empty($eventItem->avatar_id)){
                    $file_ids = explode(",",$eventItem->avatar_id);
                    $file = $this->wetalkfile->getFile($file_ids[0]);
                    if($file->id !=0){
                        $avatarname = 'media/'.$file->filename;
                    }
                }
                $data = array(
                    "num"       =>$i++,
                    'type'      =>$eventItem->type,
                    "timeRange" =>$eventItem->timeRange,
                    "text"      =>$eventItem->text,
                    "answer"      =>$eventItem->answer?$eventItem->answer:$eventItem->text,
                    "answers"     =>$this->getAnswers($eventItem),
                    "cloze_answer"=>$eventItem->cloze_answer,
                    "media_filename"=>$filename,
                    "media_type"    =>$filetype,
                    "picture"=>"",
                    "pictures"=>array(),
                    "name"    => $eventItem->name,
                    "avatar"  =>  $avatarname,
                    "system_key"=>$eventItem->system_key,
                );
                if(empty($data['media_filename'])){
                    $data['media_filename'] = $part->real_file_name;
                    $data['media_type']     = $part->real_file_type;
                }
                if((int)$eventItem->displayKewords == 1){
                    $data['displayKewords'] = true;
                }
                if((int)$eventItem->all_right == 1){
                    $data['all_right'] = true;
                }
                $data["pictures"] = $files;
                if(count($files) ==1){
                    $data["picture"] = $files[0];
                }
                if($eventItem->type == "speech"){
                    $data['content_zh'] = $eventItem->content_zh;
                    $data['content_en'] = $eventItem->content_en;
                    $data['speech_keywords'] = $eventItem->speech_keywords;
                }

                //选择题不渲染其他事件
                $choiceListArray = array(
                    "multipleChoices",
                    "middle_multipleChoices",
                    "review_multipleChoices_click",
                    "MTmultipleChoices",
                    "review_multipleChoices_speak","primary_review_multipleChoices_speak");

                if(in_array($eventItem->type,$choiceListArray)){
                    $data["multipleChoicesList"] = $this->getJsonmultipleChoices($i,$eventItem);
                    $i = $i+count($data["multipleChoicesList"]);
                }else{
                    $content = $this->db->where("event_id",$eventItem->id)->get("lessons_part_event_content")->row();
                    if($content){
                        $items = $this->getItemsReviewForJson($content,$eventItem);
                        // if(count($items) > 1){
                        $data['content_id'] = (int)$content->id;
                        $data['scores'] = (int)$content->scores;
                        if($eventItem->type == "sr_readings"){
                            $data['text'] = $items["text"];
                            $data['answer'] = $items["text"];
                            $data['timeRange'] = $items["timeRange"];
                        }else{
                            //$data['items'] = $items;
                        }
                        $data['clickEvents'] = $this->getClickEventForJson($content,$eventItem);
                        $data['childEvents'] = $this->getchildEventsForJson($content,$eventItem);
                        $data['selectEvents'] = $this->getSelectEventForJson($content,$eventItem);
                    }

                }
                $result['events'][] = $data;
            }
        }
        return $result;
    }


    public function getItemsReviewForJson($content,$eventItem){
        $itemsreturn = array();
        $items = $this->db->select("*")->where("content_id",$content->id)
            ->where("event_id",$eventItem->id)
            ->get("lessons_part_event_content_items")
            ->result();
        if($items){
            foreach($items as $item) {
                $itemsreturn["text"][] = $item->text;
                $itemsreturn["timeRange"][] = $item->timeRange;
            }
        }
        return $itemsreturn;
    }


    public function getItemsForJson($content,$eventItem){
        $itemsreturn = array();
        $items = $this->db->select("*")->where("content_id",$content->id)
            ->where("event_id",$eventItem->id)
            ->get("lessons_part_event_content_items")
            ->result();
        if($items){
            foreach($items as $item){
                $data =array(
                    "text"=> $item->text,
                    "item"=> $item->text,
                    "isCorrect"=> (bool)$item->isCorrect,
                );
                if(!empty($item->file_id)) {
                    $file = $this->wetalkfile->getFile($item->file_id);
                    if($file->id !=0){
                        $data['media_type']     = $file->type;
                        $data['media_filename'] =  'media/'.$file->filename;
                        $data['timeRange'] =  $item->timeRange;
                    }
                }
                if(!empty($item->picture_file_ids)){
                    $ids = explode(",",$item->picture_file_ids);
                    $file = $this->wetalkfile->getFile($ids[0]);
                    if($file->id !=0){
//                        $data['media_type']     = $file->type;
                        $data['picture'] =  'media/'.$file->filename;
                    }
                }

                if(!empty($item->picture_origin_ids)){
                    $ids = explode(",",$item->picture_origin_ids);
                    $file = $this->wetalkfile->getFile($ids[0]);
                    if($file->id !=0){
//                        $data['media_type']     = $file->type;
                        $data['picture_origin'] =  'media/'.$file->filename;
                    }
                }

                $itemsreturn[] = $data;
            }
        }
        return $itemsreturn;
    }

    public function getSelectEventForJson($content,$eventItem){
        $seleventEntity = array();
        $seleventyes = $this->db
            ->where("content_id",$content->id)
            ->where("yesorno","Yes")
            ->get("lessons_part_event_content_select_events`")->row();
        if($seleventyes){
            $filename = "";
            $filetype = "";
            if(!empty($seleventyes->file_id)){
                $file = $this->wetalkfile->getFile($seleventyes->file_id);
                if($file->id !=0){
                    $filename = 'media/'.$file->filename;
                    $filetype = $file->type;
                }
            }
            $seleventEntity['Yes'] = array(
                "media_type"=>$filetype,
                "media_filename"=>$filename,
                "timeRange"=>$seleventyes->timeRange,
                "text"=>$seleventyes->text
            );
        }

        $seleventno = $this->db
            ->where("content_id",$content->id)
            ->where("yesorno","Yes")
            ->get("lessons_part_event_content_select_events`")->row();
        if($seleventno){
            $filename = "";
            $filetype = "";
            if(!empty($seleventno->file_id)){
                $file = $this->wetalkfile->getFile($seleventno->file_id);
                if($file->id !=0){
                    $filename = 'media/'.$file->filename;
                    $filetype = $file->type;
                }
            }
            $seleventEntity['No'] = array(
                "media_type"=>$filetype,
                "media_filename"=>$filename,
                "timeRange"=>$seleventno->timeRange,
                "text"=>$seleventno->text
            );
        }
        return $seleventEntity;
    }


    public function getchildEventsForJson($content,$eventItem){
        $childevents = $this->db->select("*")->where("content_id",$content->id)->where("event_id",$eventItem->id)->get("lessons_part_event_child_events")->result();
        if($childevents){
            foreach($childevents as $childevent){
                $filename = "";
                $filetype = "";
                if(!empty($childevent->file_id)){

                    $file = $this->wetalkfile->getFile( $childevent->file_id);
                    if($file->id !=0){
                        $filename = 'media/'.$file->filename;
                        $filetype = $file->type;
                    }
                }
                $childevent->media_type    = $filetype;
                $childevent->media_filename = $filename;
                unset($childevent->event_id);
                unset($childevent->content_id);
                unset($childevent->file_id);
                unset($childevent->id);
            }
        }
        return $childevents;
    }

    public function getClickEventForJson($content,$eventItem){
        $clickEvent['click_1'] = $this->db
            ->where("content_id",$content->id)
            ->where("click_sort","click_1")
            ->get("lessons_part_event_click_events`")->row();
        if( $clickEvent['click_1']){
            $filename = "";
            $filetype = "";
            $file = $this->wetalkfile->getFile( $clickEvent['click_1']->file_id);
            if($file->id !=0){
                $filename = 'media/'.$file->filename;
                $filetype = $file->type;
            }
            $clickEvent['click_1']->media_type    = $filetype;
            $clickEvent['click_1']->media_filename = $filename;
            unset($clickEvent['click_1']->event_id);
            unset($clickEvent['click_1']->content_id);
            unset($clickEvent['click_1']->click_sort);
            unset($clickEvent['click_1']->file_id);
            unset($clickEvent['click_1']->id);
        }
        $clickEvent['click_2'] = $this->db
            ->where("content_id",$content->id)
            ->where("click_sort","click_2")
            ->get("lessons_part_event_click_events`")->row();
        if( $clickEvent['click_2']){
            $filename = "";
            $filetype = "";
            $file = $this->wetalkfile->getFile( $clickEvent['click_2']->file_id);
            if($file->id !=0){
                $filename = 'media/'.$file->filename;
                $filetype = $file->type;
            }
            $clickEvent['click_2']->media_type    = $filetype;
            $clickEvent['click_2']->media_filename = $filename;
            unset($clickEvent['click_2']->event_id);
            unset($clickEvent['click_2']->content_id);
            unset($clickEvent['click_2']->click_sort);
            unset($clickEvent['click_2']->file_id);
            unset($clickEvent['click_2']->id);
        }
        return $clickEvent;
    }

    public function getJsonmultipleChoices($index,$eventItem){
        $contents = $this->db->where("event_id",$eventItem->id)->get("lessons_part_event_content")->result();
        $multipleChoicesList = array();
        foreach($contents as $key=> $content){
            $filenameContent = "";
            $filetypeContent = "";
            if(!empty($content->file_id)){
                $file = $this->wetalkfile->getFile($content->file_id);
                if($file->id !=0){
                    $filenameContent = 'media/'.$file->filename;
                    $filetypeContent = $file->type;
                }
            }
            $items =  $this->db->where("event_id",$eventItem->id)
                ->where("content_id",$content->id)
                ->get("lessons_part_event_content_items")->result();
            $itemEntity = array();
            foreach($items as $item){
                $itemEntity[] = array(
                    "text"=>$item->item,
                    "item"=>$item->item,
                    "isCorrect"=>(bool)$item->isCorrect,
                );
            }
            $seleventEntity = array();
            $seleventyes = $this->db
                ->where("content_id",$content->id)
                ->where("yesorno","Yes")
                ->get("lessons_part_event_content_select_events`")->row();
            if($seleventyes){
                $filename = "";
                $filetype = "";
                if(!empty($seleventyes->file_id)){
                    $file = $this->wetalkfile->getFile($seleventyes->file_id);
                    if($file->id !=0){
                        $filename = 'media/'.$file->filename;
                        $filetype = $file->type;
                    }
                }
                $seleventEntity['Yes'] = array(
                    "media_type"=>$filetype,
                    "media_filename"=>$filename,
                    "timeRange"=>$seleventyes->timeRange,
                    "text"=>$seleventyes->text
                );
            }

            $seleventno = $this->db
                ->where("content_id",$content->id)
                ->where("yesorno","Yes")
                ->get("lessons_part_event_content_select_events`")->row();
            if($seleventno){
                $filename = "";
                $filetype = "";
                if(!empty($seleventno->file_id)){
                    $file = $this->wetalkfile->getFile($seleventno->file_id);
                    if($file->id !=0){
                        $filename = 'media/'.$file->filename;
                        $filetype = $file->type;
                    }
                }
                $seleventEntity['No'] = array(
                    "media_type"=>$filetype,
                    "media_filename"=>$filename,
                    "timeRange"=>$seleventno->timeRange,
                    "text"=>$seleventno->text
                );
            }
            $data = array(
                "num"            => $key+1,
                "content_id"     => $content->id,
                "type"           => "multipleChoice",
                "media_type"     =>  $filetypeContent,
                "media_filename" =>  $filenameContent,
                "timeRange"      =>  $content->timeRange,
                "text"           =>  array("type"=>"text","text"=>$content->text),
                "scores"         =>  (int)$content->scores,
                "items"=>$itemEntity,
                "selectEvents"=> $seleventEntity,
            );
            $multipleChoicesList[] = $data;
        }
        return $multipleChoicesList;
    }

    public function getMediaFileList(){
        $data = array();
        if(!empty($this->media_file_ids)){
            $file_ids = explode(",",$this->media_file_ids);
            foreach($file_ids as $file_id){
                $file = $this->wetalkfile->getFile($file_id);
                if($file->id != 0){
                    $data[] =  $file->getLessonFileInfo();
                }
            }
        }
        return $data;
    }


    public function getImageFileList(){
        $data = array();
        if(!empty($this->picture_file_ids)){
            $file_ids = explode(",",$this->picture_file_ids);
            foreach($file_ids as $file_id){
                $file = $this->wetalkfile->getFile($file_id);
                if($file->id != 0){
                    $data[] =  $file->getLessonFileInfo();
                }
            }
        }
        return $data;
    }

    public function getAvatarFileList(){
        $data = array();
        if(!empty($this->avatar_id)){
            $file_ids = explode(",",$this->avatar_id);
            foreach($file_ids as $file_id){
                $file = $this->wetalkfile->getFile($file_id);
                if($file->id != 0){
                    $data[] =  $file->getLessonFileInfo();
                }
            }
        }
        return $data;
    }


    public function getEventList($part_id=0,$limit=20,$start=0){
        $evnets = $this->db->select('id')->where("part_id",$part_id)->order_by("sort","asc")->limit($limit,$start)->get("lessons_part_events")->result();
        $result = array();
        foreach($evnets as $evnet){
            $result[] = $this->getEvent($evnet->id)->getEventInfo();
        }
        $this->returncode['data'] = $result;
        return $this;
    }

    public function getEventCount($part_id=0){
        $units = $this->db->select("count(*) as num")->where("part_id",$part_id)->get("lessons_part_events")->row();
        return $units->num;
    }

    public function getChildEvent(){
        $events  = $this->db->select("lessons_part_event_child_events.*,files.id as file_id")
                 ->where("event_id",$this->id)
                 ->join('files', 'lessons_part_event_child_events.file_id = files.id', 'left')
                 ->get("lessons_part_event_child_events")->result();
        foreach($events as $event){
            $event->fileInfo = $this->wetalkfile->getFile($event->file_id)->getLessonFileInfo();
        }
        return $events;
    }

    public function getSelectEvent(){
        $events  = $this->db->select("lessons_part_event_select_events.*,files.id as file_id")
            ->where("event_id",$this->id)
            ->join('files', 'lessons_part_event_select_events.file_id = files.id', 'left')
            ->get("lessons_part_event_select_events")->result();
        foreach($events as $event){
            $event->fileInfo = $this->wetalkfile->getFile($event->file_id)->getLessonFileInfo();
        }
        return $events;
    }


    public function getEventContent(){
        $events  = $this->db->select("lessons_part_event_select_events.*,files.id as file_id")
            ->where("event_id",$this->id)
            ->join('files', 'lessons_part_event_select_events.file_id = files.id', 'left')
            ->get("lessons_part_event_select_events")->result();
        foreach($events as $event){
            $event->fileInfo = $this->wetalkfile->getFile($event->file_id)->getLessonFileInfo();
        }
        return $events;
    }


    public function getEventTypes($course){
        $eventtypes  = $this->db->select("*")
            ->where("course_type",$course->type)
            ->or_where("is_all",1)
            ->get("lessons_part_events_type")->result();
        foreach($eventtypes as $eventtype){
            if(empty($eventtype->name)) $eventtype->name = $eventtype->event_type;
        }
        return $eventtypes;
    }

    public function save($post){
        $data = json_decode($post['data']);
        if(!isset($data->displayKewords) || empty($data->displayKewords)){
            $displayKewords = 0;
        }else{
            $displayKewords = 1;
        }

        if(!isset($data->all_right) || empty($data->all_right)){
            $all_right = 0;
        }else{
            $all_right = 1;
        }
        if(isset($data->id) && $data->id != 0){
            if(isset($data->picture_file_ids)){
                $entity['picture_file_ids'] = $data->picture_file_ids;
            }
            if(isset($data->media_file_ids)){
                $entity['media_file_ids'] = $data->media_file_ids;
            }
            if(isset($data->timeRange)){
                $entity['timeRange'] = $data->timeRange;
            }
            if(isset($data->text)){
                $entity['text'] = $data->text;
            }
            if(isset($data->type) && !empty($data->type)){
                $entity['type'] = $data->type;
            }

                $entity['displayKewords'] = $displayKewords;

            if(isset($data->scores) && !empty($data->scores)){
                $entity['scores'] = (int)$data->scores;
            }
            if(isset($data->content_en) && !empty($data->content_en)){
                $entity['content_en'] = $data->content_en;
            }
            if(isset($data->speech_keywords) && !empty($data->speech_keywords)){
                $entity['speech_keywords'] = $data->speech_keywords;
            }

            if(isset($data->content_zh) && !empty($data->content_zh)){
                $entity['content_zh'] =$data->content_zh;
            }
            if(isset($data->answer) && !empty($data->answer)){
                $entity['answer'] =$data->answer;
            }
            if(isset($data->name) && !empty($data->name)){
                $entity['name'] =$data->name;
            }
            if(isset($data->avatar_id) && !empty($data->avatar_id)){
                $entity['avatar_id'] =$data->avatar_id;
            }
            if(isset($data->cloze_answer) && !empty($data->cloze_answer)){
                $entity['cloze_answer'] =$data->cloze_answer;
            }
            if(isset($data->system_key) && !empty($data->system_key)){
                $entity['system_key'] =$data->system_key;
            }
            if(isset($data->answers)){
                $entity['answers'] =$data->answers;
            }
            $entity['all_right'] =$all_right;
        }else{
            $entity = array(
                "picture_file_ids"=>$data->picture_file_ids,
                "media_file_ids"=>$data->media_file_ids,
                "timeRange"=>$data->timeRange,
                "text"=>$data->text,
                "type"=>$data->type,
                "displayKewords"=>$displayKewords,
                "part_id"   =>$data->part_id,
                "lesson_id"=>$data->lesson_id,
                "unit_id" =>$data->unit_id,
                "scores"=>(int)$data->scores,
                "content_en"=>$data->content_en,
                "speech_keywords"=>$data->speech_keywords,
                "content_zh"=>$data->content_zh,
                "answer"=>$data->answer,
                "name"=>$data->name,
                "avatar_id"=>$data->avatar_id,
                "cloze_answer"=>$data->cloze_answer,
                "system_key"=>$data->cloze_answer,
                "all_right"=>$data->all_right,
                "answers"=>$data->answers,
                "user_id"=>getAdminViewer()->id,
                "modify_user_id"=>getAdminViewer()->id,
                "create_time"   =>date("Y-m-d H:i:s"),
                "modify_time"   =>date("Y-m-d H:i:s"),
            );
        }

        if(!empty($data->media_file_ids)){
           $ids = explode(",",$data->media_file_ids);
           $file =  $this->wetalkfile->getFile($ids[0]);
           $entity['media_type'] = $file->type;
        }
        if(isset($data->id) && $data->id != 0){
            $entity["modify_user_id"] = getAdminViewer()->id;
            $entity["modify_time"] = date("Y-m-d H:i:s");

            $this->db->where("id",$data->id);
            $this->db->update('lessons_part_events',$entity);
        }else{
            $this->db->insert('lessons_part_events',$entity);
            $data->id = $this->db->insert_id();
            $this->getEvent($data->id)->updateKey(array("sort"=>$data->id));
        }

        $choiceListArray = array("multipleChoices",
            "middle_multipleChoices",
            "review_multipleChoices_click",
            "MTmultipleChoices",
            "SRmultipleChoice",
            "MTmultipleChoice",
            "review_multipleChoices_speak",
            "primary_review_multipleChoices_speak"
        );

        if(in_array($data->type,$choiceListArray)){
            $multipleChoices = $data->multipleChoices;
            foreach($multipleChoices as $multipleChoice){
                $multipleChoiceEntity = array(
                    "file_id"=>$multipleChoice->file_id,
                    "text"=>$multipleChoice->text,
                    "timeRange"=>$multipleChoice->timeRange,
                    "event_id" => $data->id,
                    "type"=>$data->type,
                    "scores"=>(int)$data->scores,
                    "answer"=>$data->answer,
//                "score"=>$data->score,
                );
                if($multipleChoice->id == 0){
                    $this->db->insert("lessons_part_event_content",$multipleChoiceEntity);
                    $multipleChoice->id = $this->db->insert_id();
                }else{
                    $this->db->where("id",$multipleChoice->id);
                    $this->db->update("lessons_part_event_content",$multipleChoiceEntity);
                }
                foreach($multipleChoice->items as $item){
                    $itemEntity = array(
                        "isCorrect"=>$item->isCorrect,
                        "item"=>$item->item,
                        "text"=>$item->item,
                        "content_id"=>(int)$multipleChoice->id,
                        "event_id"=>$data->id
                    );
                    if($item->id == 0){
                        $this->db->insert("lessons_part_event_content_items",$itemEntity);
                        $item->id = $this->db->insert_id();
                    }else{
                        $this->db->where("id",$item->id);
                        $this->db->update("lessons_part_event_content_items",$itemEntity);
                    }
                }
                //查询seleventEvent
                if(isset($multipleChoice->selectEventsyes) && isset($multipleChoice->selectEventsyes->id)){
                    $selectEventsyesEntity = array(
                        "file_id"    => $multipleChoice->selectEventsyes->file_id,
                        "text"       => $multipleChoice->selectEventsyes->text,
                        "timeRange"  => $multipleChoice->selectEventsyes->timeRange,
                        "item"       => $multipleChoice->selectEventsyes->text,
                        "content_id" => (int)$multipleChoice->id,
                        "yesorno"    => "Yes",
                        "event_id"   => $data->id
                    );
                    if($multipleChoice->selectEventsyes->id == 0){
                        $this->db->insert("lessons_part_event_content_select_events",$selectEventsyesEntity);
                        $item->id = $this->db->insert_id();
                    }else{
                        $this->db->where("id",$multipleChoice->selectEventsyes->id);
                        $this->db->update("lessons_part_event_content_select_events",$selectEventsyesEntity);
                    }
                }

                if(isset($multipleChoice->selectEventsno) && isset($multipleChoice->selectEventsno->id)){
                    $selectEventsnoEntity = array(
                        "file_id"    => $multipleChoice->selectEventsno->file_id,
                        "text"       => $multipleChoice->selectEventsno->text,
                        "timeRange"  => $multipleChoice->selectEventsno->timeRange,
                        "item"       => $multipleChoice->selectEventsno->text,
                        "content_id" => (int)$multipleChoice->id,
                        "yesorno"    => "No",
                        "event_id"   => $data->id
                    );
                    if($multipleChoice->selectEventsno->id == 0){
                        $this->db->insert("lessons_part_event_content_select_events",$selectEventsnoEntity);
                        $item->id = $this->db->insert_id();
                    }else{
                        $this->db->where("id",$multipleChoice->selectEventsno->id);
                        $this->db->update("lessons_part_event_content_select_events",$selectEventsnoEntity);
                    }
                }
            }
        }else{
            $content_id = 0;
            if((isset($data->selectContent->content_id)) ){
                $content_id = $data->selectContent->content_id;
                if(!empty($data->selectContent->selectEventsyes->text)){
                    $contentEntity  = array(
                        "file_id"   => $data->media_file_ids,
                        "text"      => $data->text,
                        "timeRange" => $data->timeRange,
                        "event_id"  => $data->id,
                        "type"      => $data->type,
                        "scores"    =>(int)$data->scores,
                        "answer"    =>$data->answer,
//                "score"=>$data->score,
                    );
                    if($content_id == 0){
                        $this->db->insert("lessons_part_event_content",$contentEntity);
                        $content_id = $this->db->insert_id();
                    }else{
                        $this->db->where("id",$data->selectContent->content_id);
                        $this->db->update("lessons_part_event_content",$contentEntity);
                    }

                    if(isset($data->selectContent->selectEventsyes) && isset($data->selectContent->selectEventsyes->id)){
                        $selectEventsyesEntity = array(
                            "file_id"   =>$data->selectContent->selectEventsyes->file_id,
                            "text"      =>$data->selectContent->selectEventsyes->text,
                            "timeRange" =>$data->selectContent->selectEventsyes->timeRange,
                            "item"      =>$data->selectContent->selectEventsyes->text,
                            "content_id" =>$content_id,
                            "yesorno"   =>"Yes",
                            "event_id"=> $data->id
                        );

                        if($data->selectContent->selectEventsyes->id == 0){

                            $this->db->insert("lessons_part_event_content_select_events",$selectEventsyesEntity);
                            $data->selectContent->selectEventsyes->id = $this->db->insert_id();
                        }else{
                            $this->db->where("id",$data->selectContent->selectEventsyes->id);
                            $this->db->update("lessons_part_event_content_select_events",$selectEventsyesEntity);
                        }
                    }
                }

                if(!empty($data->selectContent->selectEventsno->text)){
                    if(isset($data->selectContent->selectEventsno) && isset($data->selectContent->selectEventsno->id)){
                        $selectEventsnoEntity = array(
                            "file_id"   =>$data->selectContent->selectEventsno->file_id,
                            "text"      =>$data->selectContent->selectEventsno->text,
                            "timeRange" =>$data->selectContent->selectEventsno->timeRange,
                            "item"      =>$data->selectContent->selectEventsno->text,
                            "content_id" =>$content_id,
                            "yesorno"   =>"No",
                            "event_id"=> $data->id
                        );
                        if($data->selectContent->selectEventsno->id == 0){
                            $this->db->insert("lessons_part_event_content_select_events",$selectEventsnoEntity);
                            $data->selectContent->selectEventsno->id = $this->db->insert_id();
                        }else{
                            $this->db->where("id",$data->selectContent->selectEventsno->id);
                            $this->db->update("lessons_part_event_content_select_events",$selectEventsnoEntity);
                        }
                    }

                }
            }
            if((isset($data->itemEntity))){
                $content_id = $content_id!=0?$content_id:$data->itemEntity->content_id;
                $contentEntity  = array(
                    "file_id"   => $data->media_file_ids,
                    "text"      => $data->text,
                    "timeRange" => $data->timeRange,
                    "event_id"  => $data->id,
                    "type"      => $data->type,
                    "scores"=>(int)$data->scores,
                    "answer"=>$data->answer,
//                "score"=>$data->score,
                );
                if($content_id == 0){
                    $this->db->insert("lessons_part_event_content",$contentEntity);
                    $content_id = $this->db->insert_id();
                }else{
                    $this->db->where("id",$content_id);
                    $this->db->update("lessons_part_event_content",$contentEntity);
                }
                foreach($data->itemEntity->items as $itemN){
                    if(!empty($itemN->text) || !empty($itemN->picture_file_ids)){
                        $itemEntity = array(
                            "item"      =>$itemN->text,
                            "text"      =>$itemN->text,
                            "content_id"=>$content_id,
                            "event_id"  =>$data->id,
                            "file_id"   => $itemN->file_id,
                            "timeRange" => $itemN->timeRange,
                            "picture_file_ids" => $itemN->picture_file_ids,
                            "picture_origin_ids" => $itemN->picture_origin_ids,
                            "isCorrect"=>$itemN->isCorrect,
                        );
                        if($itemN->id == 0){
                            $this->db->insert("lessons_part_event_content_items",$itemEntity);
                            $itemN->id = $this->db->insert_id();
                        }else{
                            $this->db->where("id",$itemN->id);
                            $this->db->update("lessons_part_event_content_items",$itemEntity);
                        }
                    }
                }
            }
            //click events
            if((isset($data->clickContent->content_id)) ){
                $content_id = $content_id!=0?$content_id:$data->clickContent->content_id;
                if(!empty($data->clickContent->clickEvent_1->type)){
                    $contentEntity  = array(
                        "file_id"   => $data->media_file_ids,
                        "text"      => $data->text,
                        "timeRange" => $data->timeRange,
                        "event_id"  => $data->id,
                        "type"      => $data->type,
                        "scores"=>(int)$data->scores,
                        "answer"=>$data->answer,
//                "score"=>$data->score,
                    );
                    if($content_id == 0){
                        $this->db->insert("lessons_part_event_content",$contentEntity);
                        $content_id = $this->db->insert_id();
                    }else{
                        $this->db->where("id",$content_id);
                        $this->db->update("lessons_part_event_content",$contentEntity);
                    }

                    if(isset($data->clickContent->clickEvent_1) && isset($data->clickContent->clickEvent_1->id)){
                        $selectEventsyesEntity = array(
                            "file_id"   =>$data->clickContent->clickEvent_1->file_id,
                            "text"      =>$data->clickContent->clickEvent_1->text,
                            "timeRange" =>$data->clickContent->clickEvent_1->timeRange,
                            "content_id"=>$content_id,
                            "click_sort"=>"click_1",
                            "event_id"  =>$data->id,
                            "type"      =>$data->clickContent->clickEvent_1->type,
                            "score"     =>(int)$data->clickContent->clickEvent_1->score,

                        );
                        if($data->clickContent->clickEvent_1->id == 0){
                            $this->db->insert("lessons_part_event_click_events",$selectEventsyesEntity);
                            $data->clickContent->id = $this->db->insert_id();
                        }else{
                            $this->db->where("id",$data->clickContent->clickEvent_1->id);
                            $this->db->update("lessons_part_event_click_events",$selectEventsyesEntity);
                        }
                    }
                }

                if(!empty($data->clickContent->clickEvent_1->type)){
                    if(isset($data->clickContent->clickEvent_2) && isset($data->clickContent->clickEvent_2->id)){
                        $selectEventsnoEntity = array(
                            "file_id"   =>$data->clickContent->clickEvent_2->file_id,
                            "text"      =>$data->clickContent->clickEvent_2->text,
                            "timeRange" =>$data->clickContent->clickEvent_2->timeRange,
                            "content_id" =>$content_id,
                            "click_sort"  =>"click_2",
                            "event_id"=> $data->id,
                            "type"      =>$data->clickContent->clickEvent_2->type,
                            "score"     =>(int)$data->clickContent->clickEvent_2->score,
                        );
                        if($data->clickContent->clickEvent_2->id == 0){
                            $this->db->insert("lessons_part_event_click_events",$selectEventsnoEntity);
                            $data->clickContent->clickEvent_2->id = $this->db->insert_id();
                        }else{
                            $this->db->where("id",$data->clickContent->clickEvent_2->id);
                            $this->db->update("lessons_part_event_click_events",$selectEventsnoEntity);
                        }
                    }
                }
            }
            //childrenEvent
            if((isset($data->childrenEventList)) ){
                $content_id = $content_id!=0?$content_id:$data->childrenEventList->content_id;
                foreach($data->childrenEventList->childrenEventList as $key=>$childrenEvent){

                    if(!empty($childrenEvent->type)){
                        if($key == 0 && $content_id == 0){
                            $contentEntity  = array(
                                "file_id"   => $data->media_file_ids,
                                "text"      => $data->text,
                                "timeRange" => $data->timeRange,
                                "event_id"  => $data->id,
                                "type"      => $data->type,
                                "scores"=>(int)$data->scores,
                                "answer"=>$data->answer,
                            );
                            if($content_id == 0){
                                $this->db->insert("lessons_part_event_content",$contentEntity);
                                $content_id = $this->db->insert_id();
                            }else{
                                $this->db->where("id",$content_id);
                                $this->db->update("lessons_part_event_content",$contentEntity);
                            }
                        }
                        $childrenEventEntnty = array(
                            "file_id"   =>$childrenEvent->file_id,
                            "text"      =>$childrenEvent->text,
                            "timeRange" =>$childrenEvent->timeRange,
                            "content_id"=>$content_id,
                            "event_id"  =>$data->id,
                            "type"      =>$childrenEvent->type,
                            "score"     =>(int)$childrenEvent->score,
                        );

                        if($childrenEvent->id == 0){
                            $this->db->insert("lessons_part_event_child_events",$childrenEventEntnty);
                            $childrenEvent->id = $this->db->insert_id();
                        }else{
                            $this->db->where("id",$childrenEvent->id);
                            $this->db->update("lessons_part_event_child_events",$childrenEventEntnty);
                        }
                    }else{
                        continue;
                    }


                }
            }
        }
        return $this;
    }


    public function updateTimeRange($id,$entity){
        $this->db->where("id",$id);
        $this->db->update('lessons_part_events',$entity);
        return $this;
    }

    public function remove(){
        $this->db->where("id",$this->id);
        $this->db->delete("lessons_part_events");

        $contents = $this->db->where("event_id",$this->id)->get("lessons_part_event_content")->result();
        foreach($contents as $content){
            $this->removeMultipleChoice($content->id);
        }
        return true;
    }


    public function removeItem($id=0){
        $this->db->where("id",$id);
        $this->db->delete("lessons_part_event_content_items");
        return true;
    }

    public function removeChildEvent($id=0){
        $this->db->where("id",$id);
        $this->db->delete("lessons_part_event_child_events");
        return $this;
    }


    public function removeMultipleChoice($id=0){

        $this->db->where("id",$id);
        $this->db->delete("lessons_part_event_content");

        $this->db->where("content_id",$id);
        $this->db->delete("lessons_part_event_content_items");

        $this->db->where("content_id",$id);
        $this->db->delete("lessons_part_event_content_select_events");

        $this->db->where("content_id",$id);
        $this->db->delete("lessons_part_event_child_events");

        $this->db->where("content_id",$id);
        $this->db->delete("lessons_part_event_click_events");

        return true;
    }


    public function syncEvents($part,$orgin_part_id,$type){
        $orginEvents = $this->db->where("part_id",$orgin_part_id)->get("lessons_part_events")->result_array();
        foreach($orginEvents as $orginEvent){
            $orginEvent['part_id']  = $part->id;
            $orginEvent['type']     = $type->event_type;
            $orgin_event_id = $orginEvent['id'];
            unset($orginEvent['id']);
            $this->db->insert("lessons_part_events",$orginEvent);
            $newEventId = $this->db->insert_id();
            $contents = $this->db->where("event_id",$orgin_event_id)->get("lessons_part_event_content")->result_array();
            foreach($contents as $content){
                $content['event_id'] = $newEventId;
                $content['type']     = $type->event_type;
                $orgin_content_id = $content['id'];
                unset($content['id']);
                $this->db->insert("lessons_part_event_content",$content);
                $newContentId = $this->db->insert_id();

                //复制items
                $items = $this->db->where("content_id",$orgin_content_id)->get("lessons_part_event_content_items")->result_array();
                foreach($items as $item){
                    $item['content_id'] = $newContentId;
                    $item['event_id']   = $newEventId;
                    unset($item['id']);
                    $this->db->insert("lessons_part_event_content_items",$item);
                }

                //复制$selectevents
                $selectevents = $this->db->where("content_id",$orgin_content_id)->get("lessons_part_event_content_select_events")->result_array();
                foreach($selectevents as $selectevent){
                    $selectevent['content_id'] = $newContentId;
                    $selectevent['event_id']   = $newEventId;
                    unset($selectevent['id']);
                    $this->db->insert("lessons_part_event_content_select_events",$selectevent);
                }

                //复制$childevents
                $childevents = $this->db->where("content_id",$orgin_content_id)->get("lessons_part_event_child_events")->result_array();
                foreach($childevents as $childevent){
                    $childevent['content_id'] = $newContentId;
                    $childevent['event_id']   = $newEventId;
                    unset($childevent['id']);
                    $this->db->insert("lessons_part_event_child_events",$childevent);
                }

                //复制$childevents
                $clickevents = $this->db->where("content_id",$orgin_content_id)->get("lessons_part_event_click_events")->result_array();
                foreach($clickevents as $clickevent){
                    $clickevent['content_id'] = $newContentId;
                    $clickevent['event_id']   = $newEventId;
                    unset($clickevent['id']);
                    $this->db->insert("lessons_part_event_click_events",$clickevent);
                }

            }

        }
        return true;
    }



    public function syncEventItem($event_id){
        $orginEvent = $this->db->where("id",$event_id)->get("lessons_part_events")->row_array();
        if($orginEvent){
            $orgin_event_id = $orginEvent['id'];
            unset($orginEvent['id']);
            $this->db->insert("lessons_part_events",$orginEvent);
            $newEventId = $this->db->insert_id();

            $this->db->where("id",$newEventId);
            $this->db->update("lessons_part_events",array("sort"=>$newEventId));

            $contents = $this->db->where("event_id",$orgin_event_id)->get("lessons_part_event_content")->result_array();
            foreach($contents as $content){
                $content['event_id'] = $newEventId;
                $orgin_content_id = $content['id'];
                unset($content['id']);
                $this->db->insert("lessons_part_event_content",$content);
                $newContentId = $this->db->insert_id();

                //复制items
                $items = $this->db->where("content_id",$orgin_content_id)->get("lessons_part_event_content_items")->result_array();
                foreach($items as $item){
                    $item['content_id'] = $newContentId;
                    $item['event_id']   = $newEventId;
                    unset($item['id']);
                    $this->db->insert("lessons_part_event_content_items",$item);
                }

                //复制$selectevents
                $selectevents = $this->db->where("content_id",$orgin_content_id)->get("lessons_part_event_content_select_events")->result_array();
                foreach($selectevents as $selectevent){
                    $selectevent['content_id'] = $newContentId;
                    $selectevent['event_id']   = $newEventId;
                    unset($selectevent['id']);
                    $this->db->insert("lessons_part_event_content_select_events",$selectevent);
                }

                //复制$childevents
                $childevents = $this->db->where("content_id",$orgin_content_id)->get("lessons_part_event_child_events")->result_array();
                foreach($childevents as $childevent){
                    $childevent['content_id'] = $newContentId;
                    $childevent['event_id']   = $newEventId;
                    unset($childevent['id']);
                    $this->db->insert("lessons_part_event_child_events",$childevent);
                }

                //复制$childevents
                $clickevents = $this->db->where("content_id",$orgin_content_id)->get("lessons_part_event_click_events")->result_array();
                foreach($clickevents as $clickevent){
                    $clickevent['content_id'] = $newContentId;
                    $clickevent['event_id']   = $newEventId;
                    unset($clickevent['id']);
                    $this->db->insert("lessons_part_event_click_events",$clickevent);
                }

            }

        }
        return true;
    }

    public function getJsonAllMenuList($lesson,$part){
        $event_file_ids = $this->db->select("picture_file_ids,type")->where("part_id",$part->id)->where("picture_file_ids !=","")->group_by("picture_file_ids")->get("lessons_part_events")->result();
        $data = array();
        foreach($event_file_ids as $key=>$file_id){
            if(!empty($file_id->picture_file_ids)){
                $file = $this->wetalkfile->getFile((int)$file_id->picture_file_ids);
                    $filename = 'media/'.$file->filename;
                    $data[]= array(
                        "num"                => $key+1,
                        'type'               => $file_id->type,
                        "text"               => (string)$file_id->picture_file_ids,
                        "media_filename"     => $filename,
                        "media_type"         => 'image',
                        "picture"            =>  "",
                    );
            }

        }
        return $data;
    }

    public function getJsonFileAllMenuList($lesson,$part){
        $event_file_ids = $this->db->select("id")->where("tag","menu")->where("object_id",$lesson->id)->get("wetalk_files")->result();
        $data = array();
        $evnet = $this->db->select('*')->where("id !=","system")->where("type !=","result")->where("part_id",$part->id)->get("lessons_part_events")->row();

        foreach($event_file_ids as $key=>$file_id){
            if(!empty($file_id->id)){
                $file = $this->wetalkfile->getFile((int)$file_id->id);
                $filename = 'media/'.$file->filename;
                if($evnet){
                    $type = $evnet->type;
                }else{
                    $type = "";
                }
                $data[]= array(
                    "num"                => $key+1,
                    'type'               => $type,
                    "text"               => (string)$file_id->id,
                    "media_filename"     => $filename,
                    "media_type"         => 'image',
                    "picture"            =>  $filename,
                );
            }

        }
        return $data;
    }

}  
