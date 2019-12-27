<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Regional extends CI_Controller {

    function __construct(){
        parent::__construct();
//        if(!getViewer()->id){
//            redirect("login");
//        }
        $this->load->model('region') ;
        $this->load->model('school') ;
        $this->load->model('article') ;
        $this->load->model('calculationrecord') ;
    }

    public function index($id = 0)
    {

        $data['region']  = $this->region->getRegion($id);

//       echo   $data['region']->getFileBgUrl();
//        exit;
        if($data['region'] ->id == 0) show_404();
        $data['schools']   = $this->school->getSchoolList($id,6);
        $data['articles']  = $this->article->getRegionNewestCategoryArticle($data['region']);
        $data['school_count']   =  $this->school->getSchoolListCount($id);
        $data['totalPages'] =  ceil($data['school_count']/6);
        $data['SchoolName'] = array();
        $data['studentCount'] = array();
        $return = $this->calculationrecord->getGoodScoreNumOfSchoolUser($data['schools']);
        $data['nums'] = $return['nums'];
        $data['Outstanding'] = array();
        foreach($data['schools'] as $key=> $school){
            $data['SchoolName'][] = $school->name;
            //$studentCount = $school->getStudentDataCount($school->id,array());
            $studentCount = rand($data['nums'][$key],20);
            if($id == 6){
                $data['studentCount'][] =$studentCount;
            }
            if($studentCount != 0){
                $data['Outstanding'][] = round($data['nums'][$key]/$studentCount,2);
            }else{
                $data['Outstanding'][] = 0;
            }
            //优秀率
        }
        $this->load->view('regional',$data);
    }

    public function getSchoolList($id=0){
        $post = $this->input->post();
        if(!isset($post['page'])) $post['page'] = 1;
        if(!isset($post['count'])) $post['count'] = 6;
        $data['schools']   = $this->school->getSchoolList($id,$post['count'],($post['page']-1)*$post['count']);
        $this->load->view('tmpl/schoolTmpl',$data);

    }

    public function  getStudentCount($id){
        $data['schools']   = $this->school->getSchoolList($id,6);
        $data['SchoolName'] = array();
        $data['studentCount'] = array();
        if($id == 32){
            $return = $this->calculationrecord->getDemoSchoolUserCount($data['schools']);
            $data['studentCount'] = $return['nums'];
            $data['Outstanding'] = array();
        }else{
            $return = $this->calculationrecord->getSchoolUserCount($data['schools']);
            $data['studentCount'] = $return['nums'];
            $data['Outstanding'] = array();
        }

        if($id == 6){
            $data['studentCount'] = array();
        }
        foreach($data['schools'] as $key=> $school){
            $data['SchoolName'][] = $school->name;
            //$studentCount = $school->getStudentDataCount($school->id,array());
            if($id == 6){
                if($key == 0){
                    $data['studentCount'][] = 1023;
                }else if($key == 1){
                    $data['studentCount'][] = 1548;
                }else if($key == 2){
                    $data['studentCount'][] = 1287;
                }else if($key == 3){
                    $data['studentCount'][] = 1765;
                }else if($key == 4){
                    $data['studentCount'][] = 1654;
                }else if($key == 5){
                    $data['studentCount'][] = 1364;
                }
                $studentCount = 0;
            }else{
                $studentCount = rand($data['studentCount'][$key],20);
            }
            if($studentCount != 0){
                $data['Outstanding'][] = round($data['studentCount'][$key]/$studentCount,2);
            }else{
                $data['Outstanding'][] = 0;
            }
            //优秀率
        }
        echo json_encode($data);
    }


    public function  getTeacherCount($id){
        $data['schools']   = $this->school->getSchoolList($id,6);
        $data['SchoolName'] = array();
        $data['studentCount'] = array();
        if($id == 32){
            $return = $this->calculationrecord->getDemoSchoolUserTeacherCount($data['schools']);
            $data['studentCount'] = $return['nums'];
            $data['Outstanding'] = array();
        }else{
            $return = $this->calculationrecord->getSchoolUserCount($data['schools'],"teacher");
            $data['studentCount'] = $return['nums'];
            $data['Outstanding'] = array();
        }

        if($id == 6){
            $data['studentCount'] = array();
        }
        foreach($data['schools'] as $key=> $school){
            $data['SchoolName'][] = $school->name;
            //$studentCount = $school->getStudentDataCount($school->id,array());
            if($id == 6){
                if($key == 0){
                    $data['studentCount'][] = 1023;
                }else if($key == 1){
                    $data['studentCount'][] = 1548;
                }else if($key == 2){
                    $data['studentCount'][] = 1287;
                }else if($key == 3){
                    $data['studentCount'][] = 1765;
                }else if($key == 4){
                    $data['studentCount'][] = 1654;
                }else if($key == 5){
                    $data['studentCount'][] = 1364;
                }
                $studentCount = 0;
            }else{
                $studentCount = rand($data['studentCount'][$key],20);
            }
            if($studentCount != 0){
                $data['Outstanding'][] = round($data['studentCount'][$key]/$studentCount,2);
            }else{
                $data['Outstanding'][] = 0;
            }
            //优秀率
        }
        echo json_encode($data);
    }

    public function  getRescorceCount($id){
        $data['schools']   = $this->school->getSchoolList($id,6);
        $data['SchoolName'] = array();
        $data['studentCount'] = array();
        $return = $this->calculationrecord->getGoodScoreNumOfSchoolUser($data['schools']);
        $data['nums'] = $return['nums'];
        $data['Outstanding'] = array();
        if($id == 32){
            $return = $this->calculationrecord->getDemoSchoolResourceCount($data['schools']);
            $data['studentCount'] = $return['nums'];
        }

        foreach($data['schools'] as $key=> $school){
            $data['SchoolName'][] = $school->name;
            //$studentCount = $school->getStudentDataCount($school->id,array());
            $studentCount = rand($data['nums'][$key],20);
            if($id == 6){
                if($key == 0){
                    $data['studentCount'][] = 175;
                }else if($key == 1){
                    $data['studentCount'][] = 89;
                }else if($key == 2){
                    $data['studentCount'][] = 26;
                }else if($key == 3){
                    $data['studentCount'][] = 543;
                }else if($key == 4){
                    $data['studentCount'][] = 389;
                }else if($key == 5){
                    $data['studentCount'][] = 216;
                }else{
                    $data['studentCount'][] = 216;
                }
            }
            if($studentCount != 0){
                $data['Outstanding'][] = round($data['nums'][$key]/$studentCount,2);
            }else{
                $data['Outstanding'][] = 0;
            }
            //优秀率
        }
        echo json_encode($data);
    }

    public function  getStudentlevel($id){
        $data['schools']   = $this->school->getSchoolList($id,6);
        $data['SchoolName'] = array();
        $data['studentCount'] = array();
        $return = $this->calculationrecord->getGoodScoreNumOfSchoolUser($data['schools']);
        $data['nums'] = $return['nums'];
        $data['Outstanding'] = array();

         if($id == 32){
             $return = $this->calculationrecord->getDemoSchoolAcademicGradeCount($data['schools']);
             $data['studentCount'] = $return['nums'];
             $data['nums'] = $return['nums'];
         }
        foreach($data['schools'] as $key=> $school){
            $studentCount = 0;
            $data['SchoolName'][] = $school->name;
            //$studentCount = $school->getStudentDataCount($school->id,array());
            if($id != 32){
                $studentCount = rand($data['nums'][$key],20);
            }

            if($id == 6){
                if($key == 0){
                    $data['nums'][$key] = 876;
                }else if($key == 1){
                    $data['nums'][$key] = 765;
                }else if($key == 2){
                    $data['nums'][$key] = 987;
                }else if($key == 3){
                    $data['nums'][$key] = 1021;
                }else if($key == 4){
                    $data['nums'][$key] = 654;
                }else if($key == 5){
                    $data['nums'][$key] = 819;
                }else{
                    $data['nums'][$key] = 654;
                }
            }
            if($studentCount != 0){
                if($id != 32){
                    $data['Outstanding'][] = round($data['nums'][$key]/$studentCount,2);
                }
               // $data['Outstanding'][] = round($data['nums'][$key]/$studentCount,2);
            }else{
                $data['Outstanding'][] = 0;
            }
            //优秀率
        }
        echo json_encode($data);
    }

    public function  getStudentyouxie($id){
        $data['schools']   = $this->school->getSchoolList($id,6);
        $data['SchoolName'] = array();
        $data['studentCount'] = array();
        $return = $this->calculationrecord->getGoodScoreNumOfSchoolUser($data['schools']);
        $data['nums'] = $return['nums'];
       // $data['nums'] = array();

        $data['Outstanding'] = array();
         if($id == 32){
             $return = $this->calculationrecord->getDemoSchoolOutstandingStudents($data['schools']);
             $data['studentCount'] = $return['nums'];
             $data['nums'] = $return['nums'];
         }
        foreach($data['schools'] as $key=> $school){
            $data['SchoolName'][] = $school->name;
            //$studentCount = $school->getStudentDataCount($school->id,array());
            $studentCount = rand($data['nums'][$key],20);
            if($id == 6){
                if($key == 0){
                    $data['nums'][$key] = 576;
                }else if($key == 1){
                    $data['nums'][$key] = 465;
                }else if($key == 2){
                    $data['nums'][$key] = 787;
                }else if($key == 3){
                    $data['nums'][$key] = 821;
                }else if($key == 4){
                    $data['nums'][$key] = 454;
                }else if($key == 5){
                    $data['nums'][$key] = 619;
                }else{
                    $data['nums'][$key] = 954;
                }
            }
            if($studentCount != 0){
                $data['Outstanding'][] = round($data['nums'][$key]/$studentCount,2);
            }else{
                $data['Outstanding'][] = 0;
            }
            //优秀率
        }
        echo json_encode($data);
    }

    public function  getStudentCompareyouxie($id){
        $data['schools']   = $this->school->getSchoolList($id,6);
        $data['SchoolName'] = array();
        $data['studentCount'] = array();
        $return = $this->calculationrecord->getGoodScoreNumOfSchoolUser($data['schools']);
        $data['nums'] = $return['nums'];
        // $data['nums'] = array();
        $data['Outstanding'] = array();
        foreach($data['schools'] as $key=> $school){
            $data['SchoolName'][] = $school->name;
            //$studentCount = $school->getStudentDataCount($school->id,array());
            $studentCount = rand($data['nums'][$key],20);
            if($id == 6 || $id == 32){
                if($key == 0){
                    $data['nums'][$key] = 506;
                }else if($key == 1){
                    $data['nums'][$key] = 365;
                }else if($key == 2){
                    $data['nums'][$key] = 687;
                }else if($key == 3){
                    $data['nums'][$key] = 921;
                }else if($key == 4){
                    $data['nums'][$key] = 754;
                }else if($key == 5){
                    $data['nums'][$key] = 919;
                }else{
                    $data['nums'][$key] = 254;
                }
            }
            if($studentCount != 0){
                $data['Outstanding'][] = round($data['nums'][$key]/$studentCount,2);
            }else{
                $data['Outstanding'][] = 0;
            }
            //优秀率
        }
        echo json_encode($data);
    }




    public function education()
    {
        $this->load->view('education');
    }


    public function teacher()
    {
        $this->load->view('teacher');
    }

    public function educational_decision()
    {
        $this->load->view('educational_decision');
    }

}
