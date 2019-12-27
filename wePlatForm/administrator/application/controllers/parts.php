<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 *
 *课程管理
 *
 *
 **/


class Parts extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model("course");
        $this->load->model("unit");
        $this->load->model("lesson");
        $this->load->model("lessonpart");
        $this->load->model("event");
        $this->load->model("wetalkfile");
        if(!getAdminViewer()->id){
            redirect('login');
        }else{
            $permissions = getAdminViewer()->getUserRolePermission();
            $permission_urls = array();
            foreach($permissions as $permission){
                $permission_urls[] = $permission->url;
            }
            if(!in_array("/courses/",$permission_urls)){
                redirect('error');
            }
        }
    }

    public function index(){
        $this->load->view('courses/courseList');
    }

    public function getEventList($part_id=0){
        $data['part_id'] = $part_id;
        $data['part'] = $this->lessonpart->getLessonpart($part_id);;
        $data['lesson'] = $this->lesson->getLesson($data['part']->lesson_id);
        $data['unit'] = $this->unit->getUnit($data['lesson']->unit_id);
        $data['course']  = $this->course->getCourse($data['unit']->course_id);
        $this->load->view('courses/parteventList',$data);
    }

    public function getEventLists($part_id=0){
        $page = $this->input->get("page")?$this->input->get("page"):1;
        $limit = $this->input->get("limit")?$this->input->get("limit"):20;
        $part_id = $this->input->get("part_id")?$this->input->get("part_id"):$part_id;
        $data['items'] = $this->event->getEventList($part_id,$limit,($page-1)*$limit)->returncode['data'];
        $data['totalCount'] = $this->event->getEventCount($part_id);
        echo json_encode($data);
    }
//  新增 展示courseList页面每项的详情信息
      public function getEventDetail($event_id=0,$part_id=0){
          $data['event_id'] = $event_id;
          if($event_id != 0){
              $data['event'] = $this->event->getEvent($event_id);
              $data['part'] = $this->lessonpart->getLessonpart($data['event']->part_id);
          }else{
              $data['part'] = $this->lessonpart->getLessonpart($part_id);
          }
          $data['lesson'] = $this->lesson->getLesson($data['part']->lesson_id);
          $data['unit'] = $this->unit->getUnit($data['lesson']->unit_id);
          $data['course']  = $this->course->getCourse($data['unit']->course_id);
          //获取课程下面的所有Event类型
          $data['eventTypes'] = $this->event->getEventTypes($data['course']);

         $this->load->view('courses/courseDetail',$data);
      }

        public function syncEvents($part_id=0){
            $part          = $this->lessonpart->getLessonpart($part_id);
            $orgin_part_id = $part->sync_origin_id;
            $event_type_id = $part->event_type_id;
            if(!empty($event_type_id)){
                $type = $this->db->where("id",$event_type_id)->get("lessons_part_events_type")->row();
                if(!empty($orgin_part_id)){
                    $this->event->syncEvents($part,$orgin_part_id,$type);
                }
            }
            echo json_encode($this->returncode);
        }

        public function syncEventItem($event_id=0){
            if($event_id != 0){
                $this->event->syncEventItem($event_id);
            }
            echo json_encode($this->returncode);
        }

       public function save(){
           $post = $this->input->post();
           $response = $this->event->save($post);
           echo json_encode($response->returncode);
       }

       public function updateTimeRange($id=0){
           $post = $this->input->post();
           $response = $this->event->updateTimeRange($id,$post);
           echo json_encode($response->returncode);
       }

       public function removeItem(){
           $post = $this->input->post();
           $response = $this->event->removeItem($post['id']);
           echo json_encode($response->returncode);
       }

        public function removeMultipleChoice(){
            $post = $this->input->post();
            $response = $this->event->removeMultipleChoice($post['id']);
            echo json_encode($response->returncode);
        }

        public function removeEvent($event_id=0){
            $this->event->getEvent($event_id)->remove();
            echo json_encode($this->returncode);
        }

    public function removeChildEvent(){
        $post = $this->input->post();
        $response = $this->event->removeChildEvent($post['id']);
        echo json_encode($response->returncode);
    }

    public function removeQuestionItem(){
        $post = $this->input->post();
        $response = $this->event->removeItem($post['id']);
        echo json_encode($response->returncode);
    }







    public function updateEventSorts(){
        $requestvalue = $this->input->post("requestvalue");
        $events = json_decode($requestvalue);
        foreach($events as $event){
            $this->event->getEvent($event->id)->updateKey(array("sort"=>$event->sign));
        }
        echo json_encode($this->returncode);
    }




}
