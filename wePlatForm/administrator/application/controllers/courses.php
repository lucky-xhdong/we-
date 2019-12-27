<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 *
 *课程管理
 *
 *
 **/


class Courses extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model("course");
        $this->load->model("unit");
        $this->load->model("lesson");
        $this->load->model("lessonpart");
        $this->load->model('wetalkfile');
        $this->load->model('event');
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

    public function getCourseList(){
        $data['items'] = $this->course->getAdminCourseList(getAdminViewer())->returncode['data'];
        $data['totalCount'] = $this->course->getAdminCourseCount(getAdminViewer());
        echo json_encode($data);
    }

    public function getCourseDetail($id = 0){
        $data = array();
        if($id != 0){
            $data['course'] = $this->course->getCourse($id);
        }
        $this->load->view('courses/tmpl/coursetmpl',$data);
    }

    public function updateCourse(){
        $post = $this->input->post();
        if($post['id'] != 0){
            $course = $this->course->getCourse($post['id']);
            unset($post['id']);
            unset($post['file']);
            $course->uploadpicture();
            $course->updateKey($post);
        }else{
            unset($post['id']);
            unset($post['file']);
            $id = $this->course->saveCourse($post);
            if($id != 0)  {
                $course = $this->course->getCourse($id);
                $course->uploadpicture();
            }
        }
        echo json_encode($this->returncode);
    }

    public function getUnitDetail($unit_id = 0,$course_id=0,$level_id=0){
        $data['course_id'] = $course_id;
        $data['level_id'] = $level_id;
        if($unit_id != 0){
            $data['unit'] = $this->unit->getUnit($unit_id);
        }
        $this->load->view('courses/tmpl/unittmpl',$data);
    }


    public function updateUnit(){
        $post = $this->input->post();
        if($post['id'] != 0 ){
            $unit = $this->unit->getUnit($post['id']);
            unset($post['id']);
            unset($post['file']);
            unset($post['level_id']);
            $unit->uploadpicture();
            $unit->updateKey($post);
        }else{
            unset($post['id']);
            unset($post['file']);
            $id = $this->unit->saveUnit($post);
            if($id != 0)  {
                $unit = $this->unit->getUnit($id);
                $unit->uploadpicture();
            }
        }

        echo json_encode($this->returncode);
    }


    public function getPartDetail($id = 0,$lesson_id=0){
        if($id != 0){
            $data['part'] = $this->lessonpart->getLessonpart($id);
        }
        $data['lesson_id'] = $lesson_id;
        $data['parts'] = $this->lessonpart->getLessonpartList(null,$lesson_id)->returncode['data'];
        $data['lesson'] = $this->lesson->getLesson($lesson_id);
        $data['unit'] = $this->unit->getUnit($data['lesson']->unit_id);
        $data['course']  = $this->course->getCourse($data['unit']->course_id);
        $data['eventTypes'] = $this->event->getEventTypes($data['course']);

        $this->load->view('courses/tmpl/parttmpl',$data);
    }


    public function updatePart(){
        $post = $this->input->post();
        if($post['id'] != 0 ){
            $part = $this->lessonpart->getLessonpart($post['id']);
            unset($post['id']);
            unset($post['file']);
            $part->uploadpicture();
            $part->updateKey($post);
        }else{
            unset($post['id']);
            unset($post['file']);
            $id = $this->lessonpart->savePart($post);
            if($id != 0)  {
                $part = $this->lessonpart->getLessonpart($id);
                $part->uploadpicture();
            }
        }
        echo json_encode($this->returncode);
    }

    public function syncUnitTemplate($unit_id){
        $this->unit->syncUnitTemplate($unit_id);
        echo json_encode($this->returncode);
    }


    public function getLessonDetail($id = 0,$unit_id=0){
        $data = array("unit_id"=>$unit_id);
        if($id !=0) $data['lesson'] = $this->lesson->getLesson($id);
        $this->load->view('courses/tmpl/lessontmpl',$data);
    }


    public function updateLesson(){
        $post = $this->input->post();
        if($post['id'] != 0 ){
            $lesson = $this->lesson->getLesson($post['id']);
            unset($post['id']);
            unset($post['file']);
            $lesson->uploadpicture();
            $lesson->updateKey($post);
        }else{
            unset($post['id']);
            unset($post['file']);
            $id = $this->lesson->saveLesson($post);
            if($id != 0)  {
                $lesson = $this->lesson->getLesson($id);
                $lesson->uploadpicture();
            }
        }
        echo json_encode($this->returncode);
    }



    public function getCourseUnit($course_id=0){
        $data['course_id'] = $course_id;
        $data['course']  = $this->course->getCourse($course_id);
        $data['levels']  = $this->course->getLevelList($course_id)->returncode['data'];
        $this->load->view('courses/courseUnitList',$data);
    }


    public function getlevels($course_id=0){
        $levels = $this->course->getLevelList($course_id)->returncode['data'];
        echo json_encode($levels);
    }

    public function addLevels($course_id=0){
        $this->course->save($this->input->post());
        echo json_encode($this->course->getLevelList($course_id)->returncode['data']);

    }

    public function deleteLevel($course_id=0){
        $this->course->delete($this->input->post());
        echo json_encode($this->course->getLevelList($course_id)->returncode['data']);

    }

    public function getCourseUnitList($course_id=0,$level_id=0){
        $level_id = $this->input->get("level_id");
        if($course_id > 1 && $level_id==0 && !$level_id){
            $levels = $this->course->getLevelList($course_id)->returncode['data'];
            $level_id = $levels[0]->id;
        }else{
            $level_id = $this->input->get("level_id");
        }
        $data['items'] = $this->unit->getUnitAllList(null,$course_id,$level_id)->returncode['data'];
        $data['totalCount'] = $this->unit->getUnitCount($course_id,$level_id);
        echo json_encode($data);
    }


    public function getUnitLessons($unit_id = 0){
        $data['unit_id'] = $unit_id;
        $data['unit'] = $this->unit->getUnit($unit_id);;
        $data['course']  = $this->course->getCourse($data['unit']->course_id);
        $this->load->view('courses/courseUnitlessonsList',$data);
    }

    public function getUnitLessonsList($unit_id=0){
        $data['items'] = $this->lesson->getLessonList(null,$unit_id)->returncode['data'];
        $data['totalCount'] = $this->lesson->getLessonCount($unit_id);
        echo json_encode($data);
    }


    public function getLessonparts($lesson_id = 0){
        $data['lesson_id'] = $lesson_id;
        $data['lesson'] = $this->lesson->getLesson($lesson_id);
        $data['unit'] = $this->unit->getUnit($data['lesson']->unit_id);
        $data['course']  = $this->course->getCourse($data['unit']->course_id);

        $this->load->view('courses/courselessonPartsList',$data);
    }

    public function getLessonpartsList($lesson_id=0){
        $data['items'] = $this->lessonpart->getLessonpartList(null,$lesson_id)->returncode['data'];
        $data['totalCount'] = $this->lessonpart->getLessonPartCount($lesson_id);
        echo json_encode($data);
    }

    public function getfilelist($lesson_id=0){
        $lesson = new stdClass();
        $lesson->id = $lesson_id;
        $lesson->object_type = "lesson";
        $page = $this->input->get("page")?$this->input->get("page"):1;
        $limit = $this->input->get("limit")?$this->input->get("limit"):5;
        $data['items'] = $this->wetalkfile->setMinxer($lesson)->getLessonFileList($limit,($page-1)*$limit)->returncode['data'];
        $data['totalCount'] = $this->wetalkfile->setMinxer($lesson)->getFilesCount();
        echo json_encode($data);
    }

    public function partSave(){
        $post = json_decode($this->input->post('data'),true);
        $this->db->where("id",$post['id']);
        $this->db->update("lessons_part", array("file_id"=>$post['file_id']));
        echo json_decode($this->returncode);
    }

    public function createZip($lesson_id = 0){
        $zip=new ZipArchive();
        $lesson = $this->lesson->getLesson($lesson_id);
        $unit   = $this->unit->getUnit($lesson->unit_id);
        $course  = $this->course->getCourse($unit->course_id);
        if($lesson->id != 0){
            if($lesson->type == "test" && $course->type == 'middle_school'){
                $types = array(
                    "passage","dialog","vocabulary","grammar","review"
                );
                $lessons = $this->db->where("unit_id",$unit->id)->where_in("type",$types)->get("lessons")->result();
                if($zip->open(UPLOADFILEPATH.'lesson'.$lesson->id.'.zip', ZipArchive::OVERWRITE)=== TRUE) {
                    foreach($lessons as $lessonItem){
                        $realfiepath = UPLOADFILEPATH.'lesson/n'.$lessonItem->id;
                            $this->addFileToZip($realfiepath, $zip);
                    }
                }
            }else{
                $realfiepath = UPLOADFILEPATH.'lesson/n'.$lesson->id;
                if($zip->open(UPLOADFILEPATH.'lesson'.$lesson->id.'.zip', ZipArchive::OVERWRITE)=== TRUE) {
                    $this->addFileToZip($realfiepath, $zip);
                }
            }
            $parts =  $this->lessonpart->getLessonparItem($lesson_id)->returncode['data'];
            foreach($parts as $key=> $part){
                $data = $part->createJson($lesson,$course,$unit);
                $realfiepathItme = UPLOADFILEPATH.'/automatic/';
                if (!is_dir($realfiepathItme))
                {
                    mkdir($realfiepathItme,0755,true);
                }
                $filename = 'json'.$part->id.'.txt';
                if(file_exists($realfiepathItme.$filename)) unlink($realfiepathItme.$filename);
                $fp = fopen($realfiepathItme.$filename,"w+");
                fwrite($fp,json_encode($data));
                fclose($fp);
                $zip->addFile($realfiepathItme.$filename,$filename);
            }
            $lesson->updateKey(array("update_time"=>date("Y-m-d H:i:s")));
        }
        $zip->close();
        echo json_encode($this->returncode);
    }

    public function addFileToZip($path,$zip){
        if(is_dir($path)){
            $handler=opendir($path); //打开当前文件夹由$path指定。
            while(($filename=readdir($handler))!==false){
                if($filename != "." && $filename != ".."){//文件夹文件名字为'.'和‘..’，不要对他们进行操作
                    if(is_dir($path."/".$filename)){// 如果读取的某个对象是文件夹，则递归
                        addFileToZip($path."/".$filename, $zip);
                    }else{ //将文件加入zip对象
                        $zip->addFile($path."/".$filename,"media/".$filename);
                    }
                }
            }
            @closedir($path);
        }
    }

}
