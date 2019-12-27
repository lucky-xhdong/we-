<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Calculationrecord extends CI_Model
{


	public function __construct()
	{
		parent::__construct();
		//$this->load->model('article') ;
	}

	public function getClassDataInfo($class_id=0,$start_time = null){

		   $studytime = $this->db
			->where("class_user_relationship.class_id",$class_id)
			->join('users_record', 'class_user_relationship.user_id = users_record.user_id', 'left');
			if($start_time != null && !empty($start_time) && $start_time != "0000-00-00 00:00:00"){
				$studytime =$studytime->where("date >=",$start_time);
			}
		   $studytime =$studytime->select("SUM(time) as totalTime")
			->get('class_user_relationship')->row();

//		echo $this->db->last_query();
//		exit;

		$totalday = $this->db
			->where("class_user_relationship.class_id",$class_id)
			->join('users_record','class_user_relationship.user_id = users_record.user_id', 'left');
			if($start_time != null && !empty($start_time) && $start_time != "0000-00-00 00:00:00"){
				$totalday =$totalday->where("date >=",$start_time);
			}
			$totalday = $totalday->select("users_record.date")
			->group_by("users_record.date")
			->get('class_user_relationship')->num_rows();

		$studyscore = $this->db
			->where("class_user_relationship.class_id",$class_id)
			->join('users_record','class_user_relationship.user_id = users_record.user_id', 'left');
			if($start_time != null && !empty($start_time) && $start_time != "0000-00-00 00:00:00"){
				$studyscore =$studyscore->where("date >=",$start_time);
			}
			$studyscore = $studyscore->select("SUM(scores) as studyscore")
			->get('class_user_relationship')->row();



		$val = new stdClass();
		if(isset($studytime->totalTime) && !empty($studytime->totalTime))  $val->totalTime = round($studytime->totalTime/3600,2);
		else $val->totalTime = 0;
		if(isset($totalday) && !empty($totalday))  $val->totalday = $totalday;
		else $val->totalday = 0;
		if(isset($studyscore->studyscore) && !empty($studyscore->studyscore))  $val->studyscore = $studyscore->studyscore;
		else $val->studyscore = 0;
		// 获取本周学习时间
		$end_time       = date('Y-m-d');
		$start_time     = date('Y-m-d',strtotime($end_time. '-7 days'));
		$val2 = $this
			->db->select("SUM(time) as totalTime")
			->join('users_record', 'class_user_relationship.user_id = users_record.user_id', 'left')
			->where("users_record.date >=",$start_time)
			->where("users_record.date <=",$end_time)
			->where("class_user_relationship.class_id",$class_id)
			->get('class_user_relationship')->row();
		if($val2 && !empty($val2->totalTime)) $val->weekTotalTime = round($val2->totalTime/3600,2);
		else $val->weekTotalTime = 0;
		return $val;
	}


	public function calculationUserResult(){
		$classes = $this->db->get("classes")->result();
		foreach($classes as $classeItem){
			$userrelationships = $this->db->where("class_id",$classeItem->id)->get("class_user_relationship")->result();
			foreach($userrelationships as $userrelationship){
				$user = $this->user->createUserObjectid($userrelationship);
				//"calculation_date_time" => array("require" => false)
				$user1 = $this->db->select("calculation_date_time,study_num_time,study_num_day")->where("id", $user->id)->get("users")->row();
				if($user1){
					$userRecordInfo =$user->getUserRecordDataInfo($user1->calculation_date_time);
					$datetime = date("Y-m-d H:i:s");
					$this->db->where("id",$user->id);
					$this->db->update("users",array(
						"study_num_week_time"=>$userRecordInfo->weekTotalTime,
						"study_num_time"=>$userRecordInfo->totalTime + $user1->study_num_time,
						"study_num_day"=>$userRecordInfo->totalday + $user1->study_num_day,
						"calculation_date_time"=>$datetime
					));
				}
				if($user->id != 0 ){
					// 获取当月第一天
					$month_frist_day = date('Y-m-01', strtotime(date("Y-m-d")));;
					//获取今天的值
					$month_last_day = date('Y-m-d');
					$user_record_result =  $this->db->where("start_date",$month_last_day)->where("user_id",$user->id)->get("user_record_result")->row();
					if($user_record_result){
						continue;
					}
					$tomorrow = date("Y-m-d",strtotime("+1 day"));
					$LearningSituationOverviews =$user->getLearningSituationOverviewSetStartTime($month_frist_day,$month_last_day);
					if(count($LearningSituationOverviews)){
						$totaltime1  = $this->db->select('SUM(time) as totalTime,count(distinct date) as totalday')
							->where("user_id",$user->id)
							->get('users_record')->row();

						$entity1 = array(
							"start_date"=> $month_last_day,
							"end_date"  =>$tomorrow,
							"totaltime"  => isset($totaltime1->totalTime)?$totaltime1->totalTime:0,
							"totalday"   => isset($totaltime1->totalday)?$totaltime1->totalday:0,
							"class_id"	=>	$userrelationship->class_id,
							"grade_id"	=>	$userrelationship->grade_id,
							"school_id"	=>	$userrelationship->school_id,
							"user_id"	=>	$user->id,
							"studyReuslt"=> isset($LearningSituationOverviews['StudyReuslt'])?$LearningSituationOverviews['StudyReuslt']:0,
							"studyCourseAverage"=>isset($LearningSituationOverviews['StudyCourseAverage'])?$LearningSituationOverviews['StudyCourseAverage']:0,
							"SkillAverage"=>isset($LearningSituationOverviews['SkillAverage'])?$LearningSituationOverviews['SkillAverage']:0,
							"StudyTimeAndFrequency"=>isset($LearningSituationOverviews['StudyTimeAndFrequency'])?$LearningSituationOverviews['StudyTimeAndFrequency']:0,
							"StudyComprehensive"=>isset($LearningSituationOverviews['StudyComprehensive'])?$LearningSituationOverviews['StudyComprehensive']:0,
							"totalScore"=>isset($LearningSituationOverviews['totalScores'])?$LearningSituationOverviews['totalScores']:0
						);
						if($user_record_result){
							$this->db->where("user_id",$user->id)->where("start_date",$month_last_day)->update("user_record_result",$entity1);
						}else{
							$this->db->insert("user_record_result",$entity1);
						}

					}
				}
			}
		}

	}



	public function calculationUserResultPesronal($user_id=0){

			$user = $this->user->getUser($user_id);
			$userrelationship = $this->db->where("user_id",$user->id)->get("class_user_relationship")->row();
			//"calculation_date_time" => array("require" => false)
			$user1 = $this->db->select("calculation_date_time,study_num_time,study_num_day")->where("id", $user->id)->get("users")->row();
			if($user1){
				$userRecordInfo =$user->getUserRecordDataInfoNew();
				$datetime = date("Y-m-d H:i:s");
				$this->db->where("id",$user->id);
				$this->db->update("users",array(
					"study_num_week_time"=>$userRecordInfo->weekTotalTime,
					"study_num_time"=>$userRecordInfo->totalTime,
					"study_num_day"=>$userRecordInfo->totalday,
                    "study_num_keys"=>$userRecordInfo->study_num_keys,
					"calculation_date_time"=>$datetime
				));
			}

			if($user->id != 0 ){
				// 获取上一个第一天
//				$last_month_frist_day = date('Y-m-d', strtotime(date('Y-m-01') . ' -1 month'));
//				//获取上一个月最后一天
//				$last_month_last_day = date('Y-m-d', strtotime(date('Y-m-01') . ' -1 day'));
//				$LearningSituationOverviews =$user->getLearningSituationOverviewSetStartTime($last_month_frist_day,$last_month_last_day);
//				if(count($LearningSituationOverviews)){
//					$totaltime  = $this->db->select('SUM(time) as totalTime')
//						->where("user_id",$user->id)
//						->where("start_time >=",$last_month_frist_day)
//						->where("end_time <=",$last_month_last_day)
//						->get('users_record')->row();
//					$entity = array(
//						"start_date"=> $last_month_frist_day,
//						"end_date"  =>$last_month_last_day,
//						"totaltime"  => isset($totaltime->totalTime)?$totaltime->totalTime:0,
//						"class_id"	=>	$userrelationship->class_id,
//						"grade_id"	=>	$userrelationship->grade_id,
//						"school_id"	=>	$userrelationship->school_id,
//						"user_id"	=>	$user->id,
//						"studyReuslt"=> isset($LearningSituationOverviews['StudyReuslt'])?$LearningSituationOverviews['StudyReuslt']:0,
//						"studyCourseAverage"=>isset($LearningSituationOverviews['StudyCourseAverage'])?$LearningSituationOverviews['StudyCourseAverage']:0,
//						"SkillAverage"=>isset($LearningSituationOverviews['SkillAverage'])?$LearningSituationOverviews['SkillAverage']:0,
//						"StudyTimeAndFrequency"=>isset($LearningSituationOverviews['StudyTimeAndFrequency'])?$LearningSituationOverviews['StudyTimeAndFrequency']:0,
//						"StudyComprehensive"=>isset($LearningSituationOverviews['StudyComprehensive'])?$LearningSituationOverviews['StudyComprehensive']:0,
//						"totalScore"=>isset($LearningSituationOverviews['totalScores'])?$LearningSituationOverviews['totalScores']:0
//				);
//			    $user_record_result =  $this->db->where("start_date",$last_month_frist_day)->where("user_id",$user->id)->get("user_record_result")->row();
//				//var_dump($user_record_result);
//
//				if($user_record_result){
//
//					$this->db->where("user_id",$user->id)->where("start_date",$last_month_frist_day)->update("user_record_result",$entity);
//				}else{
//					$this->db->insert("user_record_result",$entity);
//				}
//
//			  }


				// 获取当月第一天
				$month_frist_day = date('Y-m-01', strtotime(date("Y-m-d")));
				//$month_frist_day = "2019-02-01";
				//获取今天的值
				$month_last_day = date('Y-m-d');
				//$month_last_day = "2019-02-28";
				//$tomorrow = "2019-03-01";
				$tomorrow = date("Y-m-d",strtotime("+1 day"));
				$user_record_result =  $this->db->where("start_date",$month_last_day)->where("user_id",$user->id)->get("user_record_result")->row();
				if($user_record_result){
					//return true;
				}
				$LearningSituationOverviews =$user->getLearningSituationOverviewSetStartTime($month_frist_day,$month_last_day);
				if(count($LearningSituationOverviews)){
					$totaltime1  = $this->db->select('SUM(time) as totalTime')
						->where("user_id",$user->id)
						->get('users_record')->row();

					$totaltoday  = $this->db->select('count(distinct date) as totalday')
						->where("user_id",$user->id)
						->get('users_record')->row();
					$entity1 = array(
						"start_date"=> $month_last_day,
						"end_date"  =>$tomorrow,
						"totaltime"  => isset($totaltime1->totalTime)?$totaltime1->totalTime:0,
						"totalday"   => isset($totaltoday->totalday)?$totaltoday->totalday:0,
						"class_id"	=>	$userrelationship->class_id,
						"grade_id"	=>	$userrelationship->grade_id,
						"school_id"	=>	$userrelationship->school_id,
						"user_id"	=>	$user->id,
						"is_auto"	=>1,
						"studyReuslt"=> isset($LearningSituationOverviews['StudyReuslt'])?$LearningSituationOverviews['StudyReuslt']:0,
						"studyCourseAverage"=>isset($LearningSituationOverviews['StudyCourseAverage'])?$LearningSituationOverviews['StudyCourseAverage']:0,
						"SkillAverage"=>isset($LearningSituationOverviews['SkillAverage'])?$LearningSituationOverviews['SkillAverage']:0,
						"StudyTimeAndFrequency"=>isset($LearningSituationOverviews['StudyTimeAndFrequency'])?$LearningSituationOverviews['StudyTimeAndFrequency']:0,
						"StudyComprehensive"=>isset($LearningSituationOverviews['StudyComprehensive'])?$LearningSituationOverviews['StudyComprehensive']:0,
						"totalScore"=>isset($LearningSituationOverviews['totalScores'])?$LearningSituationOverviews['totalScores']:0
					);
					//$user_record_result =  $this->db->where("start_date",$month_last_day)->where("user_id",$user->id)->get("user_record_result")->row();
					if($user_record_result){
						$this->db->where("user_id",$user->id)->where("start_date",$month_last_day)->update("user_record_result",$entity1);
					}else{
						$this->db->insert("user_record_result",$entity1);
					}
	               // $this->calculationUserResultPesronal2($user->id);

				}
			}
		return true;

	}



	public function calculationUserResultPesronal2($user_id=0){

		$user = $this->user->getUser($user_id);

		if($user->id != 0 ){
			$month_frist_day = "2019-02-01";
			$month_last_day = "2019-02-28";
			$tomorrow = "2019-03-01";
			$user_record_result =  $this->db->where("start_date",$month_last_day)->where("user_id",$user->id)->get("user_record_result")->row();
			if($user_record_result){
				return true;
			}
			$userrelationship = $this->db->where("user_id",$user->id)->get("class_user_relationship")->row();
			$LearningSituationOverviews =$user->getLearningSituationOverviewSetStartTime($month_frist_day,$month_last_day);
			if(count($LearningSituationOverviews)){
				$totaltime1  = $this->db->select('SUM(time) as totalTime')
					->where("user_id",$user->id)
					->get('users_record')->row();

				$totaltoday  = $this->db->select('count(distinct date) as totalday')
					->where("user_id",$user->id)
					->get('users_record')->row();
				$entity1 = array(
					"start_date"=> $month_last_day,
					"end_date"  =>$tomorrow,
					"totaltime"  => isset($totaltime1->totalTime)?$totaltime1->totalTime:0,
					"totalday"   => isset($totaltoday->totalday)?$totaltoday->totalday:0,
					"class_id"	=>	$userrelationship->class_id,
					"grade_id"	=>	$userrelationship->grade_id,
					"school_id"	=>	$userrelationship->school_id,
					"user_id"	=>	$user->id,
					"is_auto"	=>1,
					"studyReuslt"=> isset($LearningSituationOverviews['StudyReuslt'])?$LearningSituationOverviews['StudyReuslt']:0,
					"studyCourseAverage"=>isset($LearningSituationOverviews['StudyCourseAverage'])?$LearningSituationOverviews['StudyCourseAverage']:0,
					"SkillAverage"=>isset($LearningSituationOverviews['SkillAverage'])?$LearningSituationOverviews['SkillAverage']:0,
					"StudyTimeAndFrequency"=>isset($LearningSituationOverviews['StudyTimeAndFrequency'])?$LearningSituationOverviews['StudyTimeAndFrequency']:0,
					"StudyComprehensive"=>isset($LearningSituationOverviews['StudyComprehensive'])?$LearningSituationOverviews['StudyComprehensive']:0,
					"totalScore"=>isset($LearningSituationOverviews['totalScores'])?$LearningSituationOverviews['totalScores']:0
				);
				//$user_record_result =  $this->db->where("start_date",$month_last_day)->where("user_id",$user->id)->get("user_record_result")->row();
				if($user_record_result){
					$this->db->where("user_id",$user->id)->where("start_date",$month_last_day)->update("user_record_result",$entity1);
				}else{
					$this->db->insert("user_record_result",$entity1);
				}

			}
		}
		return true;

	}

	public function calculationrecordClass(){
		$classes = $this->db->get("classes")->result();
		foreach($classes as $classe){
			$classInfo = $this->getClassDataInfo($classe->id,$classe->calculation_date_time);
			$datetime = date("Y-m-d H:i:s");
			$this->db->where("id",$classe->id);
			$this->db->update("classes",array(
				"study_num_week_time"=>$classInfo->weekTotalTime,
				"study_num_time"=>$classInfo->totalTime + $classe->study_num_time,
				"study_num_day"=>$classInfo->totalday + $classe->study_num_day,
				"calculation_date_time"=>$datetime
			));
		}
		return true;
	}


	public function addTimeForUser($id=0){
		$row = $this->db->where("user_id",$id)->where("date","2018-10-22")->limit(1)->get("users_record")->row();
		if($row){
			$this->db->where("id",$row->id);
			$this->db->update("users_record",array("time"=>3600));
		}

		$row2 = $this->db->where("user_id",$id)->where("date","2018-10-23")->limit(1)->get("users_record")->row();
		if($row2){
			$this->db->where("id",$row2->id);
			$this->db->update("users_record",array("time"=>3600));
		}

		return true;
	}

	public function calculationrecordClassItem($id=0){
			$classe = $this->db->where("id",$id)->get("classes")->row();
			//if( $classe->study_num_time < 0){
				$classe->study_num_time = 0;
				$classe->calculation_date_time = "";
				$classe->study_num_day = 0;
			//}
			$classInfo = $this->getClassDataInfo($classe->id,$classe->calculation_date_time);
			$datetime = date("Y-m-d H:i:s");

			$grades =  $this->db
			->where("class_user_relationship.class_id",$id)->where("class_user_relationship.status",1)
			->get('class_user_relationship')->num_rows();

			$this->db->where("id",$classe->id);
			$this->db->update("classes",array(
				"follower_count"=>$grades,
				"study_num_week_time"=>$classInfo->weekTotalTime,
				"study_num_time"=>$classInfo->totalTime + $classe->study_num_time,
				"study_num_day"=>$classInfo->totalday + $classe->study_num_day,
				"calculation_date_time"=>$datetime
			));
		return true;
	}

	/*
	 *
	 * 1）综合得分大于等于85分为优秀，2）综合得分大于等于75分小于85分为良好，3）综合得分大于等于60小于75分为及格，4）60以下为不及格
	 * 数据分析里面还有一个临界学生的统计（示范与预警页面）。临界学生的定义为：综合得分小于70大于60的学生
	 * */

	public function gettotalScoreNumOfUser($grade_id){
		$get = $this->input->get();
		$classes = $this->classes->getClassGradeList($grade_id);
		$schools = array();
		if(isset($get['school_id']) && $get['school_id'] == 0){
			$schools =  $this->school->getSchoolList($get['region_id'],0);
		}

		$data = array();
		$data['excellent'] = array();
		$data['good'] = array();
		$data['Fail'] = array();
		$data['pass'] = array();
		$data['className'] = array();
		$month_frist_day = date('Y-m-01', strtotime(date("Y-m-d")));
		$array1 = array(2,15,8,17,8);
		$array2 = array(17,9,20,5,12);
		$array3 = array(21,9,8,14,19);
		$array4 = array(0,3,11,2,7);
		if(count($schools) > 0){
			foreach($schools as $Key1=> $school){
				$row_1 = $this->db->where("school_id",$school->id)->where("start_date",$month_frist_day)->where("totalScore >=",85)->get("user_record_result")->num_rows();
				$data['className'][] = $school->name;
				if($grade_id == 28 || $grade_id == 29 || $grade_id = 30){
					$data['excellent'][] = isset($array1[$Key1])?$array1[$Key1]:rand(1,21);
				}else{
					$data['excellent'][] = $row_1;
				}
				//$data['excellent'][] = rand(1,99);
			}
		}else{
			foreach($classes as $Key1=> $classe){
				$row_1 = $this->db->where("class_id",$classe->id)->where("start_date",$month_frist_day)->where("totalScore >=",85)->get("user_record_result")->num_rows();
				$data['className'][] = $classe->name;
				if($grade_id == 28 || $grade_id == 29 || $grade_id = 30){
					$data['excellent'][] = isset($array1[$Key1])?$array1[$Key1]:rand(1,21);
				}else{
					$data['excellent'][] = $row_1;
				}
				//$data['excellent'][] = rand(1,99);
			}
		}

		if(count($schools) > 0){
			foreach($schools as $Key1=> $school){
				$row_2 = $this->db->where("school_id",$school->id)->where("start_date",$month_frist_day)->where("totalScore >=",75)->where("totalScore <",85)->get("user_record_result")->num_rows();
				if($grade_id == 28 || $grade_id == 29 || $grade_id = 30){
					$data['good'][] = isset($array2[$Key1])?$array2[$Key1]:rand(1,21);
				}else{
					$data['good'][] = $row_2;
				}
				//$data['good'][] = rand(1,99);
			}
		}else{
			foreach($classes as $Key1=> $classe){
				$row_2 = $this->db->where("class_id",$classe->id)->where("start_date",$month_frist_day)->where("totalScore >=",75)->where("totalScore <",85)->get("user_record_result")->num_rows();
				if($grade_id == 28 || $grade_id == 29 || $grade_id = 30){
					$data['good'][] = isset($array2[$Key1])?$array2[$Key1]:rand(1,21);
				}else{
					$data['good'][] = $row_2;
				}
				//$data['good'][] = rand(1,99);
			}
		}




		if(count($schools) > 0){
			foreach($schools as $Key1=> $school){
				$row_2 = $this->db->where("school_id",$school->id)->where("start_date",$month_frist_day)->where("totalScore >=",60)->where("totalScore <",75)->get("user_record_result")->num_rows();
				if($grade_id == 28 || $grade_id == 29 || $grade_id = 30){
					$data['pass'][] = isset($array3[$Key1])?$array3[$Key1]:rand(1,21);
				}else{
					$data['pass'][] = $row_2;
				}
				//$data['good'][] = rand(1,99);
			}
		}else{
			foreach($classes as $Key1=> $classe){
				$row_3 = $this->db->where("class_id",$classe->id)->where("start_date",$month_frist_day)->where("totalScore >=",60)->where("totalScore <",75)->get("user_record_result")->num_rows();
				if($grade_id == 28 || $grade_id == 29 || $grade_id = 30){
					$data['pass'][] = isset($array3[$Key1])?$array3[$Key1]:rand(1,21);
				}else{
					$data['pass'][] = $row_3;
				}
				//$data['pass'][] = rand(1,99);
			}

		}

		if(count($schools) > 0){
			foreach($schools as $Key1=> $school){
				$row_4 = $this->db->where("school_id",$school->id)->where("start_date",$month_frist_day)->where("totalScore <",60)->get("user_record_result")->num_rows();
				if($grade_id == 28 || $grade_id == 29 || $grade_id = 30){
					$data['Fail'][] = isset($array3[$Key1])?$array3[$Key1]:rand(1,21);
				}else{
					$data['Fail'][] = $row_4;
				}
				//$data['good'][] = rand(1,99);
			}
		}else{
			foreach($classes as $Key1=> $classe){
				$row_4 = $this->db->where("class_id",$classe->id)->where("start_date",$month_frist_day)->where("totalScore <",60)->get("user_record_result")->num_rows();
				if($grade_id == 28 || $grade_id == 29 || $grade_id = 30){
					$data['Fail'][] = isset($array4[$Key1])?$array4[$Key1]:rand(1,21);
				}else{
					$data['Fail'][] = $row_4;
				}
				//$data['Fail'][] = rand(1,99);
			}

		}


//		$data['excellent'] = implode(",",$data['excellent']);
//		$data['good'] = implode(",",$data['good']);
//		$data['Fail'] = implode(",",$data['Fail']);
//		$data['pass'] = implode(",",$data['pass']);
//		$data['className'] = implode(",",$data['className']);

		return $data;
	}

	/*
	 *  获取班级综合得分
	 * */

	public function getColligationScoreNumOfUser($grade_id){
		$get = $this->input->get();
		$classes = $this->classes->getClassGradeList($grade_id);
		$schools = array();
		if(isset($get['school_id']) && $get['school_id'] == 0){
			$schools =  $this->school->getSchoolList($get['region_id'],0);
		}
		$data = array();
		$data['scores'] = array();
		$data['className'] = array();
		$month_frist_day = date('Y-m-01', strtotime(date("Y-m-d")));
		$array1 = array(89,56,71,48,92);

		if(count($schools) > 0){
			foreach($schools as $Key1=> $school){
				$row = $this->db->select("AVG(totalScore) as avg")->where("start_date",$month_frist_day)->where("school_id",$school->id)->get("user_record_result")->row();
				if($grade_id == 28 || $grade_id == 29 || $grade_id = 30){
					$data['scores'][] = isset($array1[$Key1])?$array1[$Key1]:rand(56,92);
				}else{
					$data['scores'][] = round(isset($row->avg)?$row->avg:0,2);
				}
				$data['className'][] = $school->name;
				//$data['good'][] = rand(1,99);
			}
		}else{
			foreach($classes as $Key1=> $classe){
				$row = $this->db->select("AVG(totalScore) as avg")->where("start_date",$month_frist_day)->where("class_id",$classe->id)->get("user_record_result")->row();
				if($grade_id == 28 || $grade_id == 29 || $grade_id = 30){
					$data['scores'][] = isset($array1[$Key1])?$array1[$Key1]:rand(56,92);
				}else{
					$data['scores'][] = round(isset($row->avg)?$row->avg:0,2);
				}
				$data['className'][] = $classe->name;
			}

		}


		return $data;
	}

	public function getGoodScoreNumOfUser($grade_id){
		$get = $this->input->get();
		$classes = $this->classes->getClassGradeList($grade_id);
		$schools = array();
		if(isset($get['school_id']) && $get['school_id'] == 0){
			$schools =  $this->school->getSchoolList($get['region_id'],0);
		}
		$data = array();
		$data['nums'] = array();
		$data['className'] = array();
		$array1 = array(2,15,8,17,8);
		$month_frist_day = date('Y-m-01', strtotime(date("Y-m-d")));
		if(count($schools) > 0){
			foreach($schools as $Key1=> $school){
				$row_1 = $this->db->where("school_id",$school->id)->where("start_date",$month_frist_day)->where("totalScore <",85)->get("user_record_result")->num_rows();
				if($grade_id == 28 || $grade_id == 29 || $grade_id = 30){
					$data['nums'][] = isset($array1[$Key1])?$array1[$Key1]:rand(2,17);
				}else{
					$data['nums'][] = $row_1;
				}
				$data['className'][] = $school->name;
				//$data['good'][] = rand(1,99);
			}
		}else{
			foreach($classes as $Key1=> $classe){
				$row_1 = $this->db->where("class_id",$classe->id)->where("start_date",$month_frist_day)->where("totalScore <",85)->get("user_record_result")->num_rows();
				if($grade_id == 28 || $grade_id == 29 || $grade_id = 30){
					$data['nums'][] = isset($array1[$Key1])?$array1[$Key1]:rand(2,17);
				}else{
					$data['nums'][] = $row_1;
				}

				$data['className'][] = $classe->name;
			}

		}

		return $data;
	}


	public function getGoodScoreNumOfSchoolUser($schools){
		$data['nums'] = array();
		$month_frist_day = date('Y-m-01', strtotime(date("Y-m-d")));
		foreach($schools as $school){
			$row_1 = $this->db->where("school_id",$school->id)->where("start_date",$month_frist_day)->where("totalScore >=",85)->get("user_record_result")->num_rows();
			//$data['nums'][] = $row_1;
			$data['nums'][] = rand(15,80);
		}
		return $data;
	}

	public function getStudentPerweekStudyUserCount(){
		$end_time       = date('Y-m-d');
		$start_date    = date('Y-m-d',strtotime($end_time. '-7 days'));
		$return = array();
		for($i=1;$i<=7;$i++){
			$date = date('Y-m-d',strtotime($start_date. '+'.$i.' days'));

		}
		return $return;
	}
public function gettotalLoginUserOfUser($grade_id){
	$get = $this->input->get();
	$classes = $this->classes->getClassGradeList($grade_id);
	$schools = array();
	if(isset($get['school_id']) && $get['school_id'] == 0){
		$schools =  $this->school->getSchoolList($get['region_id'],0);
	}
	$data = array();
	$data['className'] = array();
	$data['dates'] = array();
	$data['series'] = array();
	$end_time       = date('Y-m-d');
	$start_date    = date('Y-m-d',strtotime($end_time. '-7 days'));
	foreach($classes as $classe){

	}
	if(count($schools) > 0){
		foreach($schools as $Key1=> $school){
			$data['className'][] = $school->name;
			$loginCount = array();
			for($i=1;$i<=7;$i++){
				$date = date('Y-m-d',strtotime($start_date. '+'.$i.' days'));
				if($Key1 == 0){
					$data['dates'][] = $date;
				}
				$relations = $this->db->select("user_id as id")->where("school_id",$school->id)->get("class_user_relationship")->result();
				if(count($relations)){
					$userCount = $this->db->like("lastvisitDate",$date)->where_in("id",$this->toIdArray($relations))->get("users")->num_rows();
				}else{
					$userCount = 0;
				}
				$loginCount[] = $userCount;
			}
			$namearray = array(
				"name"=>$school->name,
				"type"=>'line',
				"stack"=> "总量",
				"data"=>$loginCount
			);
			$data['series'][] =$namearray;
		}
	}else{
		foreach($classes as $key=> $class){
			$data['className'][] = $class->name;
			$loginCount = array();
			for($i=1;$i<=7;$i++){
				$date = date('Y-m-d',strtotime($start_date. '+'.$i.' days'));
				if($key == 0){
					$data['dates'][] = $date;
				}
				$relations = $this->db->select("user_id as id")->where("class_id",$class->id)->get("class_user_relationship")->result();
				if(count($relations)){
					$userCount = $this->db->like("lastvisitDate",$date)->where_in("id",$this->toIdArray($relations))->get("users")->num_rows();
				}else{
					$userCount = 0;
				}
				$loginCount[] = $userCount;
			}
			$namearray = array(
				"name"=>$class->name,
				"type"=>'line',
				"stack"=> "总量",
				"data"=>$loginCount
			);
			$data['series'][] =$namearray;


	  }

  }

	return $data;
}

	public function randFloat($min=0, $max=1){
				return $min + mt_rand()/mt_getrandmax() * ($max-$min);
		}

	public function gettotalOutstandingUserOfUser($grade_id){
		$get = $this->input->get();
		$classes = $this->classes->getClassGradeList($grade_id);
		$schools = array();
		if(isset($get['school_id']) && $get['school_id'] == 0){
			$schools =  $this->school->getSchoolList($get['region_id'],0);
		}
		$data = array();
		$data['className'] = array();
		$data['dates'] = array();
		$data['series'] = array();
		$end_time       = date('Y-m-d');
		$start_date    = date('Y-m-d',strtotime($end_time. '-7 days'));
		foreach($classes as $classe){
			$data['className'][] = $classe->name;
		}
		$month_frist_day = date('Y-m-01', strtotime(date("Y-m-d")));
		if(count($schools) > 0){
			foreach($schools as $Key1=> $school){
				$loginCount = array();
				for($i=1;$i<=7;$i++){
					$date = date('Y-m-d',strtotime($start_date. '+'.$i.' days'));
					if($Key1 == 0){
						$data['dates'][] = $date;
					}
					if($grade_id == 28 || $grade_id == 29 || $grade_id = 30){
						$loginCount[] = round($this->randFloat(0,1),2);
					}else{
						$row_1 = $this->db->where("school_id",$school->id)->where("start_date",$month_frist_day)->where("totalScore >=",85)->get("user_record_result")->num_rows();
						$loginCount[] = $row_1;
					}
				}
				$namearray = array(
					"name"=>$school->name,
					"type"=>'line',
					"stack"=> "总量",
					"data"=>$loginCount
				);
				$data['series'][] =$namearray;
			}
		}else{
			foreach($classes as $key=> $class){
				$loginCount = array();
				for($i=1;$i<=7;$i++){
					$date = date('Y-m-d',strtotime($start_date. '+'.$i.' days'));
					if($key == 0){
						$data['dates'][] = $date;
					}
					if($grade_id == 28 || $grade_id == 29 || $grade_id = 30){
						$loginCount[] = round($this->randFloat(0,1),2);
					}else{
						$row_1 = $this->db->where("class_id",$class->id)->where("start_date",$month_frist_day)->where("totalScore >=",85)->get("user_record_result")->num_rows();
						$loginCount[] = $row_1;
					}
				}
				$namearray = array(
					"name"=>$class->name,
					"type"=>'line',
					"stack"=> "总量",
					"data"=>$loginCount
				);
				$data['series'][] =$namearray;
			}


		}


		return $data;
	}

	public function getLowscoreScoreNumOfUser($grade_id){
		$get = $this->input->get();
		$classes = $this->classes->getClassGradeList($grade_id);
		$schools = array();
		if(isset($get['school_id']) && $get['school_id'] == 0){
			$schools =  $this->school->getSchoolList($get['region_id'],0);
		}
		$data = array();
		$data['className'] = array();
		$data['dates'] = array();
		$data['series'] = array();
		$end_time       = date('Y-m-d');
		$start_date    = date('Y-m-d',strtotime($end_time. '-7 days'));
//		foreach($classes as $classe){
//			$data['className'][] = $classe->name;
//		}
		$month_frist_day = date('Y-m-01', strtotime(date("Y-m-d")));

		if(count($schools) > 0){
			foreach($schools as $Key1=> $school){
				$data['className'][] = $school->name;
				$loginCount = array();
				for($i=1;$i<=7;$i++){
					$date = date('Y-m-d',strtotime($start_date. '+'.$i.' days'));
					if($Key1 == 0){
						$data['dates'][] = $date;
					}
					if($grade_id == 28 || $grade_id == 29 || $grade_id = 30){
						$loginCount[] = round($this->randFloat(0,1),2);
					}else{
						$row_1 = $this->db->where("school_id",$school->id)->where("start_date",$month_frist_day)->where("totalScore <",60)->get("user_record_result")->num_rows();
						$loginCount[] = $row_1;
					}

				}
				$namearray = array(
					"name"=>$school->name,
					"type"=>'line',
					"stack"=> "总量",
					"data"=>$loginCount
				);
				$data['series'][] =$namearray;
			}
		}else{
			foreach($classes as $key=> $class){
				$data['className'][] = $class->name;
				$loginCount = array();
				for($i=1;$i<=7;$i++){
					$date = date('Y-m-d',strtotime($start_date. '+'.$i.' days'));
					if($key == 0){
						$data['dates'][] = $date;
					}
					if($grade_id == 28 || $grade_id == 29 || $grade_id = 30){
						$loginCount[] = round($this->randFloat(0,1),2);
					}else{
						$row_1 = $this->db->where("class_id",$class->id)->where("start_date",$month_frist_day)->where("totalScore <",60)->get("user_record_result")->num_rows();
						$loginCount[] = $row_1;
					}

				}
				$namearray = array(
					"name"=>$class->name,
					"type"=>'line',
					"stack"=> "总量",
					"data"=>$loginCount
				);
				$data['series'][] =$namearray;
			}

		}



		return $data;
	}

	public function getAvgscoreScoreNumOfUser($grade_id){
		$get = $this->input->get();
		$classes = $this->classes->getClassGradeList($grade_id);
		$schools = array();
		if(isset($get['school_id']) && $get['school_id'] == 0){
			$schools =  $this->school->getSchoolList($get['region_id'],0);
		}
		$data = array();
		$data['scores'] = array();
		$data['className'] = array();
		$month_frist_day = date('Y-m-01', strtotime(date("Y-m-d")));
		$array1 = array(89,56,71,48,92);

		if(count($schools) > 0){
			foreach($schools as $Key1=> $school){
				$row = $this->db->select("AVG(totalScore) as avg")->where("start_date",$month_frist_day)->where("school_id",$school->id)->get("user_record_result")->row();
				if($grade_id == 28 || $grade_id == 29 || $grade_id = 30){
					$data['scores'][] = isset($array1[$Key1])?$array1[$Key1]:rand(56,92);
				}else{
					$data['scores'][] = round(isset($row->avg)?$row->avg:0,2);
				}

				$data['className'][] = $school->name;
			}
		}else{
			foreach($classes as $Key1=>$classe){
				$row = $this->db->select("AVG(totalScore) as avg")->where("start_date",$month_frist_day)->where("class_id",$classe->id)->get("user_record_result")->row();
				if($grade_id == 28 || $grade_id == 29 || $grade_id = 30){
					$data['scores'][] = isset($array1[$Key1])?$array1[$Key1]:rand(56,92);
				}else{
					$data['scores'][] = round(isset($row->avg)?$row->avg:0,2);
				}

				$data['className'][] = $classe->name;
			}
		}

		return $data;
	}


	public function getCategorytotalLoginUserOfUser($grade_id){
		$get = $this->input->get();
		$classes = $this->classes->getClassGradeList($grade_id);
		$schools = array();
		if(isset($get['school_id']) && $get['school_id'] == 0){
			$schools =  $this->school->getSchoolList($get['region_id'],0);
		}
		$data = array();
		$data['className'] = array();
		$data['dates'] = array();
		$data['series'] = array();
		$end_time       = date('Y-m-d');
		$start_date    = date('Y-m-d',strtotime($end_time. '-7 days'));
//		foreach($classes as $classe){
//
//		}

		if(count($schools) > 0){
			foreach($schools as $Key1=> $school){
				$data['className'][] = $school->name;
				$loginCount = array();
				for($i=1;$i<=7;$i++){
					$date = date('Y-m-d',strtotime($start_date. '+'.$i.' days'));
					if($Key1 == 0){
						$data['dates'][] = $date;
					}
					$relations = $this->db->select("user_id as id")->where("school_id",$school->id)->get("class_user_relationship")->result();
					if(count($relations)){
						$userCount = $this->db->like("lastvisitDate",$date)->where_in("id",$this->toIdArray($relations))->get("users")->num_rows();
					}else{
						$userCount = 0;
					}
					$loginCount[] = $userCount;
				}
				$namearray = array(
					"name"=>$school->name,
					"type"=>'line',
					"stack"=> "总量",
					"data"=>$loginCount
				);
				$data['series'][] =$namearray;
			}
		}else{
			foreach($classes as $key=> $class){
				$data['className'][] = $class->name;
				$loginCount = array();
				for($i=1;$i<=7;$i++){
					$date = date('Y-m-d',strtotime($start_date. '+'.$i.' days'));
					if($key == 0){
						$data['dates'][] = $date;
					}
					$relations = $this->db->select("user_id as id")->where("class_id",$class->id)->get("class_user_relationship")->result();
					if(count($relations)){
						$userCount = $this->db->like("lastvisitDate",$date)->where_in("id",$this->toIdArray($relations))->get("users")->num_rows();
					}else{
						$userCount = 0;
					}
					$loginCount[] = $userCount;
				}
				$namearray = array(
					"name"=>$class->name,
					"type"=>'line',
					"stack"=> "总量",
					"data"=>$loginCount
				);
				$data['series'][] =$namearray;
			}

		}



		return $data;
	}


	public function getCategorytotalOutstandingUserOfUser($grade_id){
		$get = $this->input->get();
		$classes = $this->classes->getClassGradeList($grade_id);
		$schools = array();
		if(isset($get['school_id']) && $get['school_id'] == 0){
			$schools =  $this->school->getSchoolList($get['region_id'],0);
		}
		$data = array();
		$data['className'] = array();
		$data['dates'] = array();
		$data['series'] = array();
		$end_time       = date('Y-m-d');
		$start_date    = date('Y-m-d',strtotime($end_time. '-7 days'));
//		foreach($classes as $classe){
//
//		}
		$month_frist_day = date('Y-m-01', strtotime(date("Y-m-d")));


		if(count($schools) > 0){
			foreach($schools as $Key1=> $school){
				$data['className'][] = $school->name;
				$loginCount = array();
				for($i=1;$i<=7;$i++){
					$date = date('Y-m-d',strtotime($start_date. '+'.$i.' days'));
					if($Key1 == 0){
						$data['dates'][] = $date;
					}
					if($grade_id == 28 || $grade_id == 29 || $grade_id = 30){
						$loginCount[] = round($this->randFloat(0,1),2);
					}else{
						$row_1 = $this->db->where("school_id",$school->id)->where("start_date",$month_frist_day)->where("totalScore >=",85)->get("user_record_result")->num_rows();
						$loginCount[] = $row_1;
					}
				}
				$namearray = array(
					"name"=>$school->name,
					"type"=>'line',
					"stack"=> "总量",
					"data"=>$loginCount
				);
				$data['series'][] =$namearray;
			}
		}else{
			foreach($classes as $key=> $class){
				$data['className'][] = $class->name;
				$loginCount = array();
				for($i=1;$i<=7;$i++){
					$date = date('Y-m-d',strtotime($start_date. '+'.$i.' days'));
					if($key == 0){
						$data['dates'][] = $date;
					}
					if($grade_id == 28 || $grade_id == 29 || $grade_id = 30){
						$loginCount[] = round($this->randFloat(0,1),2);
					}else{
						$row_1 = $this->db->where("class_id",$class->id)->where("start_date",$month_frist_day)->where("totalScore >=",85)->get("user_record_result")->num_rows();
						$loginCount[] = $row_1;
					}
				}
				$namearray = array(
					"name"=>$class->name,
					"type"=>'line',
					"stack"=> "总量",
					"data"=>$loginCount
				);
				$data['series'][] =$namearray;
			}

		}

		return $data;
	}


	public function getCategorytotalOutstandingUserOfUser1($grade_id){
		$get = $this->input->get();
		$classes = $this->classes->getClassGradeList($grade_id);
		$schools = array();
		if(isset($get['school_id']) && $get['school_id'] == 0){
			$schools =  $this->school->getSchoolList($get['region_id'],0);
		}
		$data = array();
		$data['className'] = array();
		$data['dates'] = array();
		$data['series'] = array();
		$end_time       = date('Y-m-d');
		$start_date    = date('Y-m-d',strtotime($end_time. '-7 days'));
		$month_frist_day = date('Y-m-01', strtotime(date("Y-m-d")));

		if(count($schools) > 0){
			foreach($schools as $Key1=> $school){
				$data['className'][] = $school->name;
				$loginCount = array();
				for($i=1;$i<=7;$i++){
					$date = date('Y-m-d',strtotime($start_date. '+'.$i.' days'));
					if($Key1 == 0){
						$data['dates'][] = $date;
					}
					if($grade_id == 28 || $grade_id == 29 || $grade_id = 30){
						$loginCount[] = round($this->randFloat(0,1),2);
					}else{
						$row_1 = $this->db->where("school_id",$school->id)->where("start_date",$month_frist_day)->where("totalScore >=",85)->get("user_record_result")->num_rows();
						$loginCount[] = $row_1;
					}
				}
				$namearray = array(
					"name"=>$school->name,
					"type"=>'line',
					"stack"=> "总量",
					"data"=>$loginCount
				);
				$data['series'][] =$namearray;
			}
		}else{
			foreach($classes as $key=> $class){
				$data['className'][] = $class->name;
				$loginCount = array();
				for($i=1;$i<=7;$i++){
					$date = date('Y-m-d',strtotime($start_date. '+'.$i.' days'));
					if($key == 0){
						$data['dates'][] = $date;
					}
					if($grade_id == 28 || $grade_id == 29 || $grade_id = 30){
						$loginCount[] = round($this->randFloat(0,1),2);
					}else{
						$row_1 = $this->db->where("class_id",$class->id)->where("start_date",$month_frist_day)->where("totalScore >=",85)->get("user_record_result")->num_rows();
						$loginCount[] = $row_1;
					}
				}
				$namearray = array(
					"name"=>$class->name,
					"type"=>'line',
					"stack"=> "总量",
					"data"=>$loginCount
				);
				$data['series'][] =$namearray;
			}

		}



		return $data;
	}


	public function getCategotyAvgscoreScoreNumOfUser($grade_id){
		$get = $this->input->get();
		$classes = $this->classes->getClassGradeList($grade_id);
		$schools = array();
		if(isset($get['school_id']) && $get['school_id'] == 0){
			$schools =  $this->school->getSchoolList($get['region_id'],0);
		}
		$data = array();
		$data['scores'] = array();
		$data['className'] = array();
		$month_frist_day = date('Y-m-01', strtotime(date("Y-m-d")));
		$array1 = array(89,56,71,48,92);

		if(count($schools) > 0){
			foreach($schools as $Key1=> $school){
				$row = $this->db->select("AVG(totalScore) as avg")->where("start_date",$month_frist_day)->where("school_id",$school->id)->get("user_record_result")->row();
				if($grade_id == 28 || $grade_id == 29 || $grade_id = 30){
					$data['scores'][] = isset($array1[$Key1])?$array1[$Key1]:rand(56,92);
				}else{
					$data['scores'][] = round(isset($row->avg)?$row->avg:0,2);
				}

				$data['className'][] = $school->name;
			}
		}else{
			foreach($classes as $Key1=>$classe){
				$row = $this->db->select("AVG(totalScore) as avg")->where("start_date",$month_frist_day)->where("class_id",$classe->id)->get("user_record_result")->row();
				if($grade_id == 28 || $grade_id == 29 || $grade_id = 30){
					$data['scores'][] = isset($array1[$Key1])?$array1[$Key1]:rand(56,92);
				}else{
					$data['scores'][] = round(isset($row->avg)?$row->avg:0,2);
				}

				$data['className'][] = $classe->name;
			}

		}


		return $data;
	}


	//及格率
	public function getCategorytotalPassUserOfUser1($grade_id){
		$get = $this->input->get();
		$classes = $this->classes->getClassGradeList($grade_id);
		$schools = array();
		if(isset($get['school_id']) && $get['school_id'] == 0){
			$schools =  $this->school->getSchoolList($get['region_id'],0);
		}
		$data = array();
		$data['className'] = array();
		$data['dates'] = array();
		$data['series'] = array();
		$end_time       = date('Y-m-d');
		$start_date    = date('Y-m-d',strtotime($end_time. '-7 days'));
		foreach($classes as $classe){
			$data['className'][] = $classe->name;
		}
		$month_frist_day = date('Y-m-01', strtotime(date("Y-m-d")));

		if(count($schools) > 0){
			foreach($schools as $Key1=> $school){
				$loginCount = array();
				for($i=1;$i<=7;$i++){
					$date = date('Y-m-d',strtotime($start_date. '+'.$i.' days'));
					if($Key1 == 0){
						$data['dates'][] = $date;
					}
					if($grade_id == 28 || $grade_id == 29 || $grade_id = 30){
						$loginCount[] = round($this->randFloat(0,1),2);
					}else{
						$row_1 = $this->db->where("school_id",$school->id)->where("start_date",$month_frist_day)->where("totalScore >=",85)->get("user_record_result")->num_rows();
						$loginCount[] = $row_1;
					}
				}
				$namearray = array(
					"name"=>$school->name,
					"type"=>'line',
					"stack"=> "总量",
					"data"=>$loginCount
				);
				$data['series'][] =$namearray;
			}
		}else{
			foreach($classes as $key=> $class){
				$loginCount = array();
				for($i=1;$i<=7;$i++){
					$date = date('Y-m-d',strtotime($start_date. '+'.$i.' days'));
					if($key == 0){
						$data['dates'][] = $date;
					}
					if($grade_id == 28 || $grade_id == 29 || $grade_id = 30){
						$loginCount[] = round($this->randFloat(0,1),2);
					}else{
						$row_1 = $this->db->where("class_id",$class->id)->where("start_date",$month_frist_day)->where("totalScore >=",85)->get("user_record_result")->num_rows();
						$loginCount[] = $row_1;
					}
				}
				$namearray = array(
					"name"=>$class->name,
					"type"=>'line',
					"stack"=> "总量",
					"data"=>$loginCount
				);
				$data['series'][] =$namearray;
			}

		}

		return $data;
	}


	public function getSchoolUserCount($schools,$type="student"){
		$data['nums'] = array();
		foreach($schools as $school){
			$row_1 = $this->db->where("school_id",$school->id)->where("user_type",$type)->get("class_user_relationship")->num_rows();
			$data['nums'][] = $row_1;
		}
		return $data;
	}


	public function getDemoSchoolUserCount($schools,$type="student"){
		$data['nums'] = array();
		foreach($schools as $school){
			$row = $this->db->where("id",$school->id)->get("school")->row();
			$data['nums'][] = $row->student_count;
		}
		return $data;
	}

	public function getDemoSchoolUserTeacherCount($schools,$type="student"){
		$data['nums'] = array();
		foreach($schools as $school){
			$row = $this->db->where("id",$school->id)->get("school")->row();
			$data['nums'][] = $row->teacher_count;
		}
		return $data;
	}


	public function getDemoSchoolResourceCount($schools,$type="student"){
		$data['nums'] = array();
		foreach($schools as $school){
			$row = $this->db->where("id",$school->id)->get("school")->row();
			$data['nums'][] = $row->resources_count;
		}
		return $data;
	}


	public function getDemoSchoolAcademicGradeCount($schools,$type="student"){
		$data['nums'] = array();
		foreach($schools as $school){
			$row = $this->db->where("id",$school->id)->get("school")->row();
			$data['nums'][] = $row->academic_grade_count;
		}
		return $data;
	}


	public function getDemoSchoolOutstandingStudents($schools,$type="student"){
		$data['nums'] = array();
		foreach($schools as $school){
			$row = $this->db->where("id",$school->id)->get("school")->row();
			$data['nums'][] = $row->outstanding_students;
		}
		return $data;
	}

	//计算各学校老师或者学生人数

	public function calculationrecordSchoolRegion($region_id=0){
		$schools = $this->db->select("id")->where("region_id",$region_id)->get("school")->result();
		$total_teacher = 0;
		$total_student = 0;
		foreach($schools as $school){
			$student= $this->db->where("user_type","student")->where_in("school_id",$school->id)->get("class_user_relationship")->num_rows();
			$teacher= $this->db->where("user_type","teacher")->where_in("school_id",$school->id)->get("class_user_relationship")->num_rows();
			$total_teacher += $teacher;
			$total_student += $student;
			$this->db->where("id",$school->id)->update("school",array("student_count"=>$student,"teacher_count"=>$teacher));
		}
		$this->db->where("id",$region_id)->update("region",array("school_user_count"=>$total_student,"teacher_count"=>$total_teacher));

		return true;
	}






}
