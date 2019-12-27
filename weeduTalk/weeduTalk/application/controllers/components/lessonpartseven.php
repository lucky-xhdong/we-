<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lessonpartseven extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('lessonpart');
        $this->load->model('wetalkfile');
        $this->load->model('event');
    }


    public function getLessonpartList(){
        $argus = func_get_args();
        $user = func_get_arg(count($argus)-1);
        if($user && count($argus) >1){
            return $this->lessonpart->getLessonpartList($argus[0]);
        }
        return $this;
    }
    public function getPart146(){
        $data = array(
            "unit_id"       =>7,
            "lesson_id"     =>38,
            "part_id"       =>146,
            "media_filename"=>'media/u7p.mp3',
            "media_type"    =>'audio',
            "totalTime"     =>"2:08",
            "part_type"     =>"listening",
            "have_questions"=>false,
            "questions_type"=>"text",
            "keywords"      =>array(
                "SAT",
                "get dressed",
                "semester",
                "be responsible for",
                "tidy up",
                "sweep",
                "environment",
                "rank",
                "so as to",
                "mathematics",
                "relax",
                "go on outings",
                "pay off"
            ),
        );
        $data['events'][] = array(
            "num"=>"2",
            'type'=>"text",
            "timeRange"=>"00:00-00:09",
            "text"=>"Hello, this is Channel We. I'm Mr. V. In today's program we are going to know Lucy's school life. ",
            "media_filename"=>'media/u7Mr_V.mp4',
            "media_type"    =>'video',
            "picture"=>"images/u7_p_001.jpg",
            "pictures"=>array()

        );
        $data['events'][] = array(
            "num"=>"3",
            'type'=>"text",
            "timeRange"=>"00:00-00:04",
            "displayKewords"=>true,
            "text"=>"Lucy Daniel is a high school student.",
            "picture"=>"images/u7_p_001.jpg"
        );
        $data['events'][] = array(
            "num"=>"4",
            'type'=>"text",
            "timeRange"=>"00:04-00:08",
            "text"=>"She is going to take the SAT in two years. ",
            "picture"=>"images/u7_p_001.jpg"
        );
        $data['events'][] = array(
            "num"=>"5",
            'type'=>"text",
            "timeRange"=>"00:08-00:13",
            "text"=>"During the week, she usually gets up at around 6 o'clock.",
            "picture"=>"images/u7_p_002.jpg"
        );
        $data['events'][] = array(
            "num"=>"6",
            'type'=>"text",
            "timeRange"=>"00:13-00:19",
            "text"=>"She quickly gets dressed, brushes her teeth and washes her hands and face. ",
            "picture"=>"images/u7_p_002.jpg"
        );
        $data['events'][] = array(
            "num"=>"7",
            'type'=>"text",
            "timeRange"=>"00:19-00:23",
            "text"=>"Her mother, Jane, prepares breakfast for the family. ",
            "picture"=>"images/u7_p_003.jpg"
        );

        $data['events'][] = array(
            "num"=>"8",
            'type'=>"text",
            "timeRange"=>"00:23-00:26",
            "text"=>"She is a great cook.",
            "picture"=>"images/u7_p_003.jpg"
        );

        $data['events'][] = array(
            "num"=>"9",
            'type'=>"text",
            "timeRange"=>"00:26-00:30",
            "text"=>"Lucy has her breakfast at around 6:30. ",
            "picture"=>"images/u7_p_004.jpg"
        );

        $data['events'][] = array(
            "num"=>"10",
            'type'=>"text",
            "timeRange"=>"00:30-00:34",
            "text"=>"After breakfast, she goes to school by bicycle.",
            "picture"=>"images/u7_p_004.jpg"
        );

        $data['events'][] = array(
            "num"=>"11",
            'type'=>"text",
            "timeRange"=>"00:34-00:38",
            "text"=>"Her school is not far from where she lives.",
            "picture"=>"images/u7_p_004.jpg"
        );

        $data['events'][] = array(
            "num"=>"12",
            'type'=>"text",
            "timeRange"=>"00:38-00:42",
            "text"=>"It takes her about 20 minutes to get to school.",
            "picture"=>"images/u7_p_004.jpg"
        );

        $data['events'][] = array(
            "num"=>"13",
            'type'=>"text",
            "timeRange"=>"00:42-00:47",
            "text"=>"She usually arrives at school at around 7:15.",
            "picture"=>"images/u7_p_004.jpg"
        );

        $data['events'][] = array(
            "num"=>"14",
            'type'=>"text",
            "timeRange"=>"00:47-00:52",
            "text"=>"Her classes start at 8 in the morning and end at 4 in the afternoon.",
            "picture"=>"images/u7_p_005.jpg"
        );

        $data['events'][] = array(
            "num"=>"15",
            'type'=>"text",
            "timeRange"=>"00:52-00:56",
            "text"=>"She has a total of 8 classes every day.",
            "picture"=>"images/u7_p_005.jpg"
        );

        $data['events'][] = array(
            "num"=>"16",
            'type'=>"text",
            "timeRange"=>"00:56-01:03",
            "text"=>"This semester, she has mathematics, English, and Chinese classes in the mornings.",
            "picture"=>"images/u7_p_005.jpg"
        );

        $data['events'][] = array(
            "num"=>"17",
            'type'=>"text",
            "timeRange"=>"01:03-01:09",
            "text"=>"In the afternoons, she has physics, chemistry and other classes.",
            "picture"=>"images/u7_p_005.jpg"
        );

        $data['events'][] = array(
            "num"=>"18",
            'type'=>"text",
            "timeRange"=>"01:09-01:12",
            "text"=>"She doesn't go home for lunch.",
            "picture"=>"images/u7_p_006.jpg"
        );

        $data['events'][] = array(
            "num"=>"19",
            'type'=>"text",
            "timeRange"=>"01:12-01:17",
            "text"=>"Sometimes, she has lunch at a fast food restaurant near the school.",
            "picture"=>"images/u7_p_006.jpg"
        );

        $data['events'][] = array(
            "num"=>"20",
            'type'=>"text",
            "timeRange"=>"01:17-01:22",
            "text"=>"Sometimes she has her lunch in the school cafeteria.",
            "picture"=>"images/u7_p_006.jpg"
        );

        $data['events'][] = array(
            "num"=>"21",
            'type'=>"text",
            "timeRange"=>"01:22-01:26",
            "text"=>"She usually gets home at around 4:30 pm.",
            "picture"=>"images/u7_p_007.jpg"
        );

        $data['events'][] = array(
            "num"=>"22",
            'type'=>"text",
            "timeRange"=>"01:26-01:33",
            "text"=>"On Fridays, she often plays volleyball with her classmates for about half an hour before she goes home. ",
            "picture"=>"images/u7_p_007.jpg"
        );

        $data['events'][] = array(
            "num"=>"23",
            'type'=>"text",
            "timeRange"=>"01:33-01:42",
            "text"=>"After arriving at home, Lucy usually studies for about an hour before she has dinner with her parents and her sister Betty.",
            "picture"=>"images/u7_p_008.jpg"
        );


        $data['events'][] = array(
            "num"=>"24",
            'type'=>"text",
            "timeRange"=>"01:42-01:46",
            "text"=>"Betty is 8 years older than she is.",
            "picture"=>"images/u7_p_008.jpg"
        );

        $data['events'][] = array(
            "num"=>"25",
            'type'=>"text",
            "timeRange"=>"01:46-01:52",
            "text"=>"After dinner, her father washes the dishes, and her mother cleans the kitchen. ",
            "picture"=>"images/u7_p_009.jpg"
        );

        $data['events'][] = array(
            "num"=>"26",
            'type'=>"text",
            "timeRange"=>"01:52-01:57",
            "text"=>"Lucy is mainly responsible for tidying up her own room. ",
            "picture"=>"images/u7_p_009.jpg"
        );
        $data['events'][] = array(
            "num"=>"27",
            'type'=>"text",
            "timeRange"=>"01:57-02:02",
            "text"=>"She is also responsible for sweeping the yard once a week on weekends.",
            "picture"=>"images/u7_p_009.jpg"
        );
        $data['events'][] = array(
            "num"=>"28",
            'type'=>"text",
            "timeRange"=>"02:02-02:09",
            "text"=>"In order for Lucy to have a quiet environment to study, her parents usually watch TV in their bedroom. ",
            "picture"=>"images/u7_p_010.jpg"
        );
        $data['events'][] = array(
            "num"=>"29",
            'type'=>"text",
            "timeRange"=>"02:09-02:15",
            "text"=>"Lucy's high school ranks Number 1 in the city and she has tons of homework to do.",
            "picture"=>"images/u7_p_011.jpg"
        );
        $data['events'][] = array(
            "num"=>"30",
            'type'=>"text",
            "timeRange"=>"02:15-02:20",
            "text"=>"She has to do a lot of reading in English and Chinese.",
            "picture"=>"images/u7_p_011.jpg"
        );

        $data['events'][] = array(
            "num"=>"31",
            'type'=>"text",
            "timeRange"=>"02:20-02:28",
            "text"=>"Each week, she also has to write three papers about hot topics in the newspaper so as to improve her writing skill. ",
            "picture"=>"images/u7_p_011.jpg"
        );
        $data['events'][] = array(
            "num"=>"32",
            'type'=>"text",
            "timeRange"=>"02:28-02:33",
            "text"=>"Her favorite school subjects are physics and mathematics.",
            "picture"=>"images/u7_p_011.jpg"
        );


        $data['events'][] = array(
            "num"=>"33",
            'type'=>"text",
            "timeRange"=>"02:33-02:38",
            "text"=>"Her dream is to become a scientist like Newton.",
            "picture"=>"images/u7_p_011.jpg"
        );

        $data['events'][] = array(
            "num"=>"34",
            'type'=>"text",
            "timeRange"=>"02:38-02:41",
            "text"=>"She goes to bed at 11.",
            "picture"=>"images/u7_p_012.jpg"
        );

        $data['events'][] = array(
            "num"=>"35",
            'type'=>"text",
            "timeRange"=>"02:41-02:46",
            "text"=>"She likes to have a hot shower to relax herself before going to bed.",
            "picture"=>"images/u7_p_012.jpg"
        );

        $data['events'][] = array(
            "num"=>"36",
            'type'=>"text",
            "timeRange"=>"02:46-02:54",
            "text"=>"It is only during the weekend that Lucy can find the time to enjoy music or go on outings with her family.",
            "picture"=>"images/u7_p_013.jpg"
        );

        $data['events'][] = array(
            "num"=>"37",
            'type'=>"text",
            "timeRange"=>"02:54-03:00",
            "text"=>"But she still thinks all the effort she puts in at school will pay off in the end.",
            "picture"=>"images/u7_p_013.jpg"
        );

         $this->saveEventListToDatabases($data);$a =  json_encode($data);
        $fp = fopen('json146.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
        return;

    }

    public function getPart147(){

        $data = array(
            "unit_id"       =>7,
            "lesson_id"     =>38,
            "part_id"       =>147,
            "media_filename"=>'media/u7p.mp3',
            "media_type"    =>'audio',
            "totalTime"     =>"2:08",
            "part_type"     =>"listening",
            "have_questions"=>false,
            "questions_type"=>"text",
            "keywords"      =>array(
                "SAT",
                "get dressed",
                "semester",
                "be responsible for",
                "tidy up",
                "sweep",
                "environment",
                "rank",
                "so as to",
                "mathematics",
                "relax",
                "go on outings",
                "pay off"
            ),
        );
        $data['events'][] = array(
            "num"=>"2",
            'type'=>"text",
            "timeRange"=>"00:00-00:09",
            "text"=>"Hello, this is Channel We. I'm Mr. V. In today's program we are going to know Lucy's school life. ",
            "media_filename"=>'media/u7Mr_V.mp4',
            "media_type"    =>'video',
            "picture"=>"images/u7_p_001.jpg",
            "pictures"=>array()

        );
        $data['events'][] = array(
            "num"=>"3",
            'type'=>"text",
            "timeRange"=>"00:00-00:04",
            "displayKewords"=>true,
            "text"=>"Lucy Daniel is a high school student.",
            "picture"=>"images/u7_p_001.jpg"
        );
        $data['events'][] = array(
            "num"=>"4",
            'type'=>"text",
            "timeRange"=>"00:04-00:08",
            "text"=>"She is going to take the SAT in two years. ",
            "picture"=>"images/u7_p_001.jpg"
        );
        $data['events'][] = array(
            "num"=>"5",
            'type'=>"text",
            "timeRange"=>"00:08-00:13",
            "text"=>"During the week, she usually gets up at around 6 o'clock.",
            "picture"=>"images/u7_p_002.jpg"
        );
        $data['events'][] = array(
            "num"=>"6",
            'type'=>"text",
            "timeRange"=>"00:13-00:19",
            "text"=>"She quickly gets dressed, brushes her teeth and washes her hands and face. ",
            "picture"=>"images/u7_p_002.jpg"
        );
        $data['events'][] = array(
            "num"=>"7",
            'type'=>"text",
            "timeRange"=>"00:19-00:23",
            "text"=>"Her mother, Jane, prepares breakfast for the family. ",
            "picture"=>"images/u7_p_003.jpg"
        );

        $data['events'][] = array(
            "num"=>"8",
            'type'=>"text",
            "timeRange"=>"00:23-00:26",
            "text"=>"She is a great cook.",
            "picture"=>"images/u7_p_003.jpg"
        );

        $data['events'][] = array(
            "num"=>"9",
            'type'=>"multipleChoices",
            "timeRange"=>"",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"10",
                    "content_id"=>1098,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7pcq.mp3',
                    "timeRange"=>"00:00-00:04",
                    "text"=>"When is Lucy going to take the SAT?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"In two years.","isCorrect"=>true),
                        "1"=>array("item"=>"In two and a half years.", "isCorrect"=>false),
                        "2"=>array("item"=>"In two months.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u7p.mp3',
                            "timeRange"=>"00:04-00:08",
                            "text"=>"She is going to take the SAT in two years."
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u7p.mp3',
                            "timeRange"=>"00:04-00:08",
                            "text"=>"She is going to take the SAT in two years."
                        ),
                    ),
                ),
                1=>array(
                    "num"=>"11",
                    "content_id"=>1099,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7pcq.mp3',
                    "timeRange"=>"00:04-00:07",
                    "text"=>"Is Lucy's mother good at cooking?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Yes.","isCorrect"=>true),
                        "1"=>array("item"=>"No.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u7p.mp3',
                            "timeRange"=>"00:19-00:26",
                            "text"=>"Her mother, Jane, prepares breakfast for the family. She is a great cook.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u7p.mp3',
                            "timeRange"=>"00:19-00:26",
                            "text"=>"Her mother, Jane, prepares breakfast for the family. She is a great cook.",
                        ),
                    ),
                ),
                2=>array(
                    "num"=>"11",
                    "content_id"=>1100,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7pcq.mp3',
                    "timeRange"=>"00:07-00:11",
                    "text"=>"Who prepares breakfast for the family?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Lucy.","isCorrect"=>false),
                        "1"=>array("item"=>"Jane.", "isCorrect"=>true),
                        "2"=>array("item"=>"July.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u7p.mp3',
                            "timeRange"=>"00:19-00:23",
                            "text"=>"Her mother, Jane, prepares breakfast for the family.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u7p.mp3',
                            "timeRange"=>"00:19-00:23",
                            "text"=>"Her mother, Jane, prepares breakfast for the family.",
                        ),
                    ),
                )
            )
        );

        $data['events'][] = array(
            "num"=>"12",
            'type'=>"text",
            "timeRange"=>"00:26-00:30",
            "text"=>"Lucy has her breakfast at around 6:30. ",
            "picture"=>"images/u7_p_004.jpg"
        );

        $data['events'][] = array(
            "num"=>"13",
            'type'=>"text",
            "timeRange"=>"00:30-00:34",
            "text"=>"After breakfast, she goes to school by bicycle.",
            "picture"=>"images/u7_p_004.jpg"
        );

        $data['events'][] = array(
            "num"=>"14",
            'type'=>"text",
            "timeRange"=>"00:34-00:38",
            "text"=>"Her school is not far from where she lives.",
            "picture"=>"images/u7_p_004.jpg"
        );

        $data['events'][] = array(
            "num"=>"15",
            'type'=>"text",
            "timeRange"=>"00:38-00:42",
            "text"=>"It takes her about 20 minutes to get to school.",
            "picture"=>"images/u7_p_004.jpg"
        );

        $data['events'][] = array(
            "num"=>"16",
            'type'=>"text",
            "timeRange"=>"00:42-00:47",
            "text"=>"She usually arrives at school at around 7:15.",
            "picture"=>"images/u7_p_004.jpg"
        );

        $data['events'][] = array(
            "num"=>"17",
            'type'=>"multipleChoices",
            "timeRange"=>"",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"18",
                    "content_id"=>1101,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7pcq.mp3',
                    "timeRange"=>"0:11-00:14",
                    "text"=>"How does Lucy go to school?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"She bikes to school.","isCorrect"=>true),
                        "1"=>array("item"=>"She takes a taxi to school.", "isCorrect"=>false),
                        "2"=>array("item"=>"She drives to school.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u7p.mp3',
                            "timeRange"=>"00:30-00:34",
                            "text"=>"After breakfast, she goes to school by bicycle."
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u7p.mp3',
                            "timeRange"=>"00:30-00:34",
                            "text"=>"After breakfast, she goes to school by bicycle."
                        ),
                    ),
                ),
                1=>array(
                    "num"=>"19",
                    "content_id"=>1102,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7pcq.mp3',
                    "timeRange"=>"00:14-00:18",
                    "text"=>"How long does it take Lucy to get to school?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"About 20 minutes.","isCorrect"=>true),
                        "1"=>array("item"=>"About 10 minutes.", "isCorrect"=>false),
                        "2"=>array("item"=>"About 15 minutes.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u7p.mp3',
                            "timeRange"=>"00:30-00:34",
                            "text"=>"After breakfast, she goes to school by bicycle.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u7p.mp3',
                            "timeRange"=>"00:30-00:34",
                            "text"=>"After breakfast, she goes to school by bicycle.",
                        ),
                    ),
                ),
                2=>array(
                    "num"=>"20",
                    "content_id"=>1103,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7pcq.mp3',
                    "timeRange"=>"00:18-00:22",
                    "text"=>"Does Lucy usually arrive at school at around 8?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Yes.","isCorrect"=>false),
                        "1"=>array("item"=>"No.", "isCorrect"=>true),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u7p.mp3',
                            "timeRange"=>"00:42-00:47",
                            "text"=>"She usually arrives at school at around 7:15.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u7p.mp3',
                            "timeRange"=>"00:42-00:47",
                            "text"=>"She usually arrives at school at around 7:15.",
                        ),
                    ),
                )
            )
        );

        $data['events'][] = array(
            "num"=>"21",
            'type'=>"text",
            "timeRange"=>"00:47-00:52",
            "text"=>"Her classes start at 8 in the morning and end at 4 in the afternoon.",
            "picture"=>"images/u7_p_005.jpg"
        );

        $data['events'][] = array(
            "num"=>"22",
            'type'=>"text",
            "timeRange"=>"00:52-00:56",
            "text"=>"She has a total of 8 classes every day.",
            "picture"=>"images/u7_p_005.jpg"
        );

        $data['events'][] = array(
            "num"=>"23",
            'type'=>"text",
            "timeRange"=>"00:56-01:03",
            "text"=>"This semester, she has mathematics, English, and Chinese classes in the mornings.",
            "picture"=>"images/u7_p_005.jpg"
        );

        $data['events'][] = array(
            "num"=>"24",
            'type'=>"text",
            "timeRange"=>"01:03-01:09",
            "text"=>"In the afternoons, she has physics, chemistry and other classes.",
            "picture"=>"images/u7_p_005.jpg"
        );

        $data['events'][] = array(
            "num"=>"25",
            'type'=>"multipleChoices",
            "timeRange"=>"",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"26",
                    "content_id"=>1104,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7pcq.mp3',
                    "timeRange"=>"00:22-00:26",
                    "text"=>"How many classes does Lucy have every day?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"8 classes.","isCorrect"=>true),
                        "1"=>array("item"=>"9 classes.", "isCorrect"=>false),
                        "2"=>array("item"=>"7 classes.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u7p.mp3',
                            "timeRange"=>"00:52-00:56",
                            "text"=>"She has a total of 8 classes every day."
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u7p.mp3',
                            "timeRange"=>"00:52-00:56",
                            "text"=>"She has a total of 8 classes every day."
                        ),
                    ),
                ),
                1=>array(
                    "num"=>"27",
                    "content_id"=>1105,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7pcq.mp3',
                    "timeRange"=>"00:26-00:30",
                    "text"=>"Does Lucy have fine arts in this semester?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Yes.","isCorrect"=>false),
                        "1"=>array("item"=>"No.", "isCorrect"=>false),
                        "2"=>array("item"=>"Cannot be determined.", "isCorrect"=>true),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u7p.mp3',
                            "timeRange"=>"00:56-01:09",
                            "text"=>"This semester, she has mathematics, English, and Chinese classes in the mornings. In the afternoons, she has physics, chemistry and other classes. ",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u7p.mp3',
                            "timeRange"=>"00:56-01:09",
                            "text"=>"This semester, she has mathematics, English, and Chinese classes in the mornings. In the afternoons, she has physics, chemistry and other classes. ",
                        ),
                    ),
                )
            )
        );


        $data['events'][] = array(
            "num"=>"28",
            'type'=>"text",
            "timeRange"=>"01:09-01:12",
            "text"=>"She doesn't go home for lunch.",
            "picture"=>"images/u7_p_006.jpg"
        );

        $data['events'][] = array(
            "num"=>"29",
            'type'=>"text",
            "timeRange"=>"01:12-01:17",
            "text"=>"Sometimes, she has lunch at a fast food restaurant near the school.",
            "picture"=>"images/u7_p_006.jpg"
        );

        $data['events'][] = array(
            "num"=>"30",
            'type'=>"text",
            "timeRange"=>"01:17-01:22",
            "text"=>"Sometimes she has her lunch in the school cafeteria.",
            "picture"=>"images/u7_p_006.jpg"
        );

        $data['events'][] = array(
            "num"=>"31",
            'type'=>"text",
            "timeRange"=>"01:22-01:26",
            "text"=>"She usually gets home at around 4:30 pm.",
            "picture"=>"images/u7_p_007.jpg"
        );

        $data['events'][] = array(
            "num"=>"32",
            'type'=>"text",
            "timeRange"=>"01:26-01:33",
            "text"=>"On Fridays, she often plays volleyball with her classmates for about half an hour before she goes home. ",
            "picture"=>"images/u7_p_007.jpg"
        );

        $data['events'][] = array(
            "num"=>"33",
            'type'=>"multipleChoices",
            "timeRange"=>"",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"34",
                    "content_id"=>1106,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7pcq.mp3',
                    "timeRange"=>"00:30-00:36",
                    "text"=>"Does Lucy always have lunch at a fast food restaurant near the school?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Yes.","isCorrect"=>false),
                        "1"=>array("item"=>"No", "isCorrect"=>true)
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u7p.mp3',
                            "timeRange"=>"01:17-01:22",
                            "text"=>"Sometimes she has her lunch in the school cafeteria."
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u7p.mp3',
                            "timeRange"=>"01:17-01:22",
                            "text"=>"Sometimes she has her lunch in the school cafeteria."
                        ),
                    ),
                ),
                1=>array(
                    "num"=>"35",
                    "content_id"=>1107,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7pcq.mp3',
                    "timeRange"=>"00:36-00:42",
                    "text"=>"Besides at a fast food restaurant near the school, where else does Lucy have lunch?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"In the school cafeteria.","isCorrect"=>true),
                        "1"=>array("item"=>"At home.", "isCorrect"=>false),
                        "2"=>array("item"=>"In the café.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u7p.mp3',
                            "timeRange"=>"01:12-01:22",
                            "text"=>"Sometimes, she has lunch at a fast food restaurant near the school. Sometimes she has her lunch in the school cafeteria.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u7p.mp3',
                            "timeRange"=>"01:12-01:22",
                            "text"=>"Sometimes, she has lunch at a fast food restaurant near the school. Sometimes she has her lunch in the school cafeteria.",
                        ),
                    ),
                )
            )
        );

        $data['events'][] = array(
            "num"=>"36",
            'type'=>"text",
            "timeRange"=>"01:33-01:42",
            "text"=>"After arriving at home, Lucy usually studies for about an hour before she has dinner with her parents and her sister Betty.",
            "picture"=>"images/u7_p_008.jpg"
        );


        $data['events'][] = array(
            "num"=>"37",
            'type'=>"text",
            "timeRange"=>"01:42-01:46",
            "text"=>"Betty is 8 years older than she is.",
            "picture"=>"images/u7_p_008.jpg"
        );

        $data['events'][] = array(
            "num"=>"38",
            'type'=>"text",
            "timeRange"=>"01:46-01:52",
            "text"=>"After dinner, her father washes the dishes, and her mother cleans the kitchen. ",
            "picture"=>"images/u7_p_009.jpg"
        );

        $data['events'][] = array(
            "num"=>"39",
            'type'=>"text",
            "timeRange"=>"01:52-01:57",
            "text"=>"Lucy is mainly responsible for tidying up her own room. ",
            "picture"=>"images/u7_p_009.jpg"
        );
        $data['events'][] = array(
            "num"=>"40",
            'type'=>"text",
            "timeRange"=>"01:57-02:02",
            "text"=>"She is also responsible for sweeping the yard once a week on weekends.",
            "picture"=>"images/u7_p_009.jpg"
        );


        $data['events'][] = array(
            "num"=>"41",
            'type'=>"multipleChoices",
            "timeRange"=>"",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"42",
                    "content_id"=>1108,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7pcq.mp3',
                    "timeRange"=>"00:48-00:52",
                    "text"=>"Who does Lucy have dinner with at home after school?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Her parents.","isCorrect"=>false),
                        "1"=>array("item"=>"With her sister.", "isCorrect"=>false),
                        "2"=>array("item"=>"All of the above.", "isCorrect"=>true)
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u7p.mp3',
                            "timeRange"=>"01:33-01:42",
                            "text"=>"After arriving at home, Lucy usually studies for about an hour before she has dinner with her parents and her sister Betty. "
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u7p.mp3',
                            "timeRange"=>"01:33-01:42",
                            "text"=>"After arriving at home, Lucy usually studies for about an hour before she has dinner with her parents and her sister Betty. "
                        ),
                    ),
                ),
                1=>array(
                    "num"=>"43",
                    "content_id"=>1109,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7pcq.mp3',
                    "timeRange"=>"00:52-00:57",
                    "text"=>"Do Lucy's parents both do housework after dinner?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Yes","isCorrect"=>true),
                        "1"=>array("item"=>"No.", "isCorrect"=>false)
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u7p.mp3',
                            "timeRange"=>"01:46-01:52",
                            "text"=>"After dinner, her father washes the dishes, and her mother cleans the kitchen. ",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u7p.mp3',
                            "timeRange"=>"01:46-01:52",
                            "text"=>"After dinner, her father washes the dishes, and her mother cleans the kitchen. ",
                        ),
                    ),
                ),
                2=>array(
                    "num"=>"44",
                    "content_id"=>1110,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7pcq.mp3',
                    "timeRange"=>"00:57-01:01",
                    "text"=>"What is Lucy responsible for doing at home?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Tidying up her own room..","isCorrect"=>false),
                        "1"=>array("item"=>"Sweeping the yard.", "isCorrect"=>false),
                        "2"=>array("item"=>"All of the above.", "isCorrect"=>true),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u7p.mp3',
                            "timeRange"=>"01:52-02:02",
                            "text"=>"Lucy is mainly responsible for tidying up her own room. She is also responsible for sweeping the yard once a week on weekends.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u7p.mp3',
                            "timeRange"=>"01:52-02:02",
                            "text"=>"Lucy is mainly responsible for tidying up her own room. She is also responsible for sweeping the yard once a week on weekends.",
                        ),
                    ),
                )
            )
        );

        $data['events'][] = array(
            "num"=>"45",
            'type'=>"text",
            "timeRange"=>"02:02-02:09",
            "text"=>"In order for Lucy to have a quiet environment to study, her parents usually watch TV in their bedroom. ",
            "picture"=>"images/u7_p_010.jpg"
        );
        $data['events'][] = array(
            "num"=>"46",
            'type'=>"text",
            "timeRange"=>"02:09-02:15",
            "text"=>"Lucy's high school ranks Number 1 in the city and she has tons of homework to do.",
            "picture"=>"images/u7_p_011.jpg"
        );
        $data['events'][] = array(
            "num"=>"47",
            'type'=>"text",
            "timeRange"=>"02:15-02:20",
            "text"=>"She has to do a lot of reading in English and Chinese.",
            "picture"=>"images/u7_p_011.jpg"
        );

        $data['events'][] = array(
            "num"=>"48",
            'type'=>"text",
            "timeRange"=>"02:20-02:28",
            "text"=>"Each week, she also has to write three papers about hot topics in the newspaper so as to improve her writing skill. ",
            "picture"=>"images/u7_p_011.jpg"
        );
        $data['events'][] = array(
            "num"=>"49",
            'type'=>"text",
            "timeRange"=>"02:28-02:33",
            "text"=>"Her favorite school subjects are physics and mathematics.",
            "picture"=>"images/u7_p_011.jpg"
        );


        $data['events'][] = array(
            "num"=>"50",
            'type'=>"text",
            "timeRange"=>"02:33-02:38",
            "text"=>"Her dream is to become a scientist like Newton.",
            "picture"=>"images/u7_p_011.jpg"
        );

        $data['events'][] = array(
            "num"=>"51",
            'type'=>"multipleChoices",
            "timeRange"=>"",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"52",
                    "content_id"=>1111,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7pcq.mp3',
                    "timeRange"=>"01:06-01:09",
                    "text"=>"What is Lucy's high school like in the city?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"It's the best in the city.","isCorrect"=>true),
                        "1"=>array("item"=>"It's not so good.", "isCorrect"=>false),
                        "2"=>array("item"=>"It's the worst in the city.", "isCorrect"=>false)
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u7p.mp3',
                            "timeRange"=>"02:09-02:15",
                            "text"=>"Lucy's high school ranks Number 1 in the city and she has tons of homework to do."
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u7p.mp3',
                            "timeRange"=>"02:09-02:15",
                            "text"=>"Lucy's high school ranks Number 1 in the city and she has tons of homework to do."
                        ),
                    ),
                ),
                1=>array(
                    "num"=>"53",
                    "content_id"=>1112,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7pcq.mp3',
                    "timeRange"=>"01:14-01:17",
                    "text"=>"What is Lucy's favorite school subject?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Physics.","isCorrect"=>false),
                        "1"=>array("item"=>"Mathematics.", "isCorrect"=>false),
                        "2"=>array("item"=>"All of the above.", "isCorrect"=>true)
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u7p.mp3',
                            "timeRange"=>"02:28-02:33",
                            "text"=>"Her favorite school subjects are physics and mathematics.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u7p.mp3',
                            "timeRange"=>"02:28-02:33",
                            "text"=>"Her favorite school subjects are physics and mathematics.",
                        ),
                    ),
                )
            )
        );

        $data['events'][] = array(
            "num"=>"54",
            'type'=>"text",
            "timeRange"=>"02:38-02:41",
            "text"=>"She goes to bed at 11.",
            "picture"=>"images/u7_p_012.jpg"
        );

        $data['events'][] = array(
            "num"=>"55",
            'type'=>"text",
            "timeRange"=>"02:41-02:46",
            "text"=>"She likes to have a hot shower to relax herself before going to bed.",
            "picture"=>"images/u7_p_012.jpg"
        );

        $data['events'][] = array(
            "num"=>"56",
            'type'=>"text",
            "timeRange"=>"02:46-02:54",
            "text"=>"It is only during the weekend that Lucy can find the time to enjoy music or go on outings with her family.",
            "picture"=>"images/u7_p_013.jpg"
        );

        $data['events'][] = array(
            "num"=>"57",
            'type'=>"text",
            "timeRange"=>"02:54-03:00",
            "text"=>"But she still thinks all the effort she puts in at school will pay off in the end.",
            "picture"=>"images/u7_p_013.jpg"
        );

        $data['events'][] = array(
            "num"=>"58",
            'type'=>"multipleChoices",
            "timeRange"=>"",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"59",
                    "content_id"=>1113,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7pcq.mp3',
                    "timeRange"=>"01:17-01:20",
                    "text"=>"When does Lucy go to bed?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"At 11.","isCorrect"=>true),
                        "1"=>array("item"=>"At 10.", "isCorrect"=>false),
                        "2"=>array("item"=>"At 9:30.", "isCorrect"=>false)
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u7p.mp3',
                            "timeRange"=>"02:38-02:41",
                            "text"=>"She goes to bed at 11."
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u7p.mp3',
                            "timeRange"=>"02:38-02:41",
                            "text"=>"She goes to bed at 11."
                        ),
                    ),
                ),
                1=>array(
                    "num"=>"60",
                    "content_id"=>1114,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7pcq.mp3',
                    "timeRange"=>"01:20-01:24",
                    "text"=>"When does Lucy have time to enjoy music?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Only during the weekend.","isCorrect"=>true),
                        "1"=>array("item"=>"Only during the weekdays.", "isCorrect"=>false),
                        "2"=>array("item"=>"Only during vacation.", "isCorrect"=>false)
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u7p.mp3',
                            "timeRange"=>"02:46-02:54",
                            "text"=>"It is only during the weekend that Lucy can find the time to enjoy music or go on outings with her family.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u7p.mp3',
                            "timeRange"=>"02:46-02:54",
                            "text"=>"It is only during the weekend that Lucy can find the time to enjoy music or go on outings with her family.",
                        ),
                    ),
                )
            )
        );


         $this->saveEventListToDatabases($data);$a =  json_encode($data);
        $fp = fopen('json147.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
        return;

    }


    public function getPart148(){

        $data = array(
            "unit_id"       =>7,
            "lesson_id"     =>38,
            "part_id"       =>148,
            "media_filename"=>'media/u7p.mp3',
            "media_type"    =>'audio',
            "totalTime"     =>"2:08",
            "part_type"     =>"listening",
            "have_questions"=>false,
            "questions_type"=>"text",
            "keywords"      =>array(
                "SAT",
                "get dressed",
                "semester",
                "be responsible for",
                "tidy up",
                "sweep",
                "environment",
                "rank",
                "so as to",
                "mathematics",
                "relax",
                "go on outings",
                "pay off"
            ),
        );
        $data['events'][] = array(
            "num"=>"2",
            'type'=>"text",
            "timeRange"=>"00:00-00:09",
            "text"=>"Hello, this is Channel We. I'm Mr. V. In today's program we are going to know Lucy's school life. ",
            "media_filename"=>'media/u7Mr_V.mp4',
            "media_type"    =>'video',
            "picture"=>"images/u7_p_001.jpg",
            "pictures"=>array()

        );
        $data['events'][] = array(
            "num"=>"3",
            'type'=>"text",
            "timeRange"=>"00:00-00:04",
            "displayKewords"=>true,
            "text"=>"Lucy Daniel is a high school student.",
            "picture"=>"images/u7_p_001.jpg"
        );
        $data['events'][] = array(
            "num"=>"4",
            "content_id"=>1115,
            'type'=>"sr_reading",
            "scores"=>1,
            "timeRange"=>"00:04-00:08",
            "text"=>"She is going to take the SAT in two years.",
            "answer"=>"She is going to take the SAT in two years",
            "picture"=>"images/u7_p_001.jpg"
        );
        $data['events'][] = array(
            "num"=>"5",
            'type'=>"text",
            "timeRange"=>"00:08-00:13",
            "text"=>"During the week, she usually gets up at around 6 o'clock.",
            "picture"=>"images/u7_p_002.jpg"
        );
        $data['events'][] = array(
            "num"=>"6",
            'type'=>"text",
            "timeRange"=>"00:13-00:19",
            "text"=>"She quickly gets dressed, brushes her teeth and washes her hands and face. ",
            "picture"=>"images/u7_p_002.jpg"
        );
        $data['events'][] = array(
            "num"=>"7",
            'type'=>"text",
            "timeRange"=>"00:19-00:23",
            "text"=>"Her mother, Jane, prepares breakfast for the family. ",
            "picture"=>"images/u7_p_003.jpg"
        );

        $data['events'][] = array(
            "num"=>"8",
            'type'=>"text",
            "timeRange"=>"00:23-00:26",
            "text"=>"She is a great cook.",
            "picture"=>"images/u7_p_003.jpg"
        );

        $data['events'][] = array(
            "num"=>"9",
            'type'=>"text",
            "timeRange"=>"00:26-00:30",
            "text"=>"Lucy has her breakfast at around 6:30. ",
            "picture"=>"images/u7_p_004.jpg"
        );

        $data['events'][] = array(
            "num"=>"10",
            "content_id"=>1116,
            'type'=>"sr_reading",
            "scores"=>1,
            "timeRange"=>"00:30-00:34",
            "text"=>"After breakfast, she goes to school by bicycle.",
            "answer"=>"After breakfast, she goes to school by bicycle.",
            "picture"=>"images/u7_p_004.jpg"
        );

        $data['events'][] = array(
            "num"=>"11",
            'type'=>"text",
            "timeRange"=>"00:34-00:38",
            "text"=>"Her school is not far from where she lives.",
            "picture"=>"images/u7_p_004.jpg"
        );

        $data['events'][] = array(
            "num"=>"12",
            "content_id"=>1117,
            'type'=>"sr_reading",
            "scores"=>1,
            "timeRange"=>"00:38-00:42",
            "text"=>"It takes her about 20 minutes to get to school.",
            "answer"=>"It takes her about 20 minutes to get to school",
            "picture"=>"images/u7_p_004.jpg"
        );

        $data['events'][] = array(
            "num"=>"13",
            'type'=>"text",
            "timeRange"=>"00:42-00:47",
            "text"=>"She usually arrives at school at around 7:15.",
            "picture"=>"images/u7_p_004.jpg"
        );

        $data['events'][] = array(
            "num"=>"14",
            "content_id"=>1118,
            'type'=>"sr_reading",
            "scores"=>1,
            "timeRange"=>"00:47-00:52",
            "text"=>"Her classes start at 8 in the morning and end at 4 in the afternoon.",
            "answer"=>"Her classes start at 8 in the morning and end at 4 in the afternoon.",
            "picture"=>"images/u7_p_005.jpg"
        );

        $data['events'][] = array(
            "num"=>"15",
            'type'=>"text",
            "timeRange"=>"00:52-00:56",
            "text"=>"She has a total of 8 classes every day.",
            "picture"=>"images/u7_p_005.jpg"
        );

        $data['events'][] = array(
            "num"=>"16",
            'type'=>"text",
            "timeRange"=>"00:56-01:03",
            "text"=>"This semester, she has mathematics, English, and Chinese classes in the mornings.",
            "picture"=>"images/u7_p_005.jpg"
        );

        $data['events'][] = array(
            "num"=>"17",
            'type'=>"text",
            "timeRange"=>"01:03-01:09",
            "text"=>"In the afternoons, she has physics, chemistry and other classes.",
            "picture"=>"images/u7_p_005.jpg"
        );

        $data['events'][] = array(
            "num"=>"18",
            'type'=>"text",
            "timeRange"=>"01:09-01:12",
            "text"=>"She doesn't go home for lunch.",
            "picture"=>"images/u7_p_006.jpg"
        );

        $data['events'][] = array(
            "num"=>"19",
            "content_id"=>1119,
            'type'=>"sr_reading",
            "scores"=>1,
            "timeRange"=>"01:12-01:17",
            "text"=>"Sometimes, she has lunch at a fast food restaurant near the school.",
            "answer"=>"Sometimes, she has lunch at a fast food restaurant near the school",
            "picture"=>"images/u7_p_006.jpg"
        );

        $data['events'][] = array(
            "num"=>"20",
            'type'=>"text",
            "timeRange"=>"01:17-01:22",
            "text"=>"Sometimes she has her lunch in the school cafeteria.",
            "picture"=>"images/u7_p_006.jpg"
        );

        $data['events'][] = array(
            "num"=>"21",
            'type'=>"text",
            "timeRange"=>"01:22-01:26",
            "text"=>"She usually gets home at around 4:30 pm.",
            "picture"=>"images/u7_p_007.jpg"
        );

        $data['events'][] = array(
            "num"=>"22",
            "content_id"=>1120,
            'type'=>"sr_reading",
            "scores"=>1,
            "timeRange"=>"01:26-01:33",
            "text"=>"On Fridays, she often plays volleyball with her classmates for about half an hour before she goes home. ",
            "answer"=>"On Fridays she often plays volleyball with her classmates for about half an hour before she goes home",
            "picture"=>"images/u7_p_007.jpg"
        );

        $data['events'][] = array(
            "num"=>"23",
            'type'=>"text",
            "timeRange"=>"01:33-01:42",
            "text"=>"After arriving at home, Lucy usually studies for about an hour before she has dinner with her parents and her sister Betty.",
            "picture"=>"images/u7_p_008.jpg"
        );


        $data['events'][] = array(
            "num"=>"24",
            "content_id"=>1121,
            'type'=>"sr_reading",
            "scores"=>1,
            "timeRange"=>"01:42-01:46",
            "text"=>"Betty is 8 years older than she is.",
            "answer"=>"Betty is 8 years older than she is.",
            "picture"=>"images/u7_p_008.jpg"
        );

        $data['events'][] = array(
            "num"=>"25",
            'type'=>"text",
            "timeRange"=>"01:46-01:52",
            "text"=>"After dinner, her father washes the dishes, and her mother cleans the kitchen. ",
            "picture"=>"images/u7_p_009.jpg"
        );

        $data['events'][] = array(
            "num"=>"26",
            "content_id"=>1122,
            'type'=>"sr_reading",
            "scores"=>1,
            "timeRange"=>"01:52-01:57",
            "text"=>"Lucy is mainly responsible for tidying up her own room. ",
            "answer"=>"Lucy is mainly responsible for tidying up her own room",
            "picture"=>"images/u7_p_009.jpg"
        );
        $data['events'][] = array(
            "num"=>"27",
            "content_id"=>1123,
            'type'=>"sr_reading",
            "scores"=>1,
            "timeRange"=>"01:57-02:02",
            "text"=>"She is also responsible for sweeping the yard once a week on weekends.",
            "answer"=>"She is also responsible for sweeping the yard once a week on weekends",
            "picture"=>"images/u7_p_009.jpg"
        );
        $data['events'][] = array(
            "num"=>"28",
            'type'=>"text",
            "timeRange"=>"02:02-02:09",
            "text"=>"In order for Lucy to have a quiet environment to study, her parents usually watch TV in their bedroom. ",
            "picture"=>"images/u7_p_010.jpg"
        );
        $data['events'][] = array(
            "num"=>"29",
            'type'=>"text",
            "timeRange"=>"02:09-02:15",
            "text"=>"Lucy's high school ranks Number 1 in the city and she has tons of homework to do.",
            "picture"=>"images/u7_p_011.jpg"
        );
        $data['events'][] = array(
            "num"=>"30",
            'type'=>"text",
            "timeRange"=>"02:15-02:20",
            "text"=>"She has to do a lot of reading in English and Chinese.",
            "picture"=>"images/u7_p_011.jpg"
        );

        $data['events'][] = array(
            "num"=>"31",
            "content_id"=>1124,
            'type'=>"sr_reading",
            "scores"=>1,
            "timeRange"=>"02:20-02:28",
            "text"=>"Each week, she also has to write three papers about hot topics in the newspaper so as to improve her writing skill. ",
            "answer"=>"Each week, she also has to write three papers about hot topics in the newspaper so as to improve her writing skill. ",
            "picture"=>"images/u7_p_011.jpg"
        );
        $data['events'][] = array(
            "num"=>"32",
            'type'=>"text",
            "timeRange"=>"02:28-02:33",
            "text"=>"Her favorite school subjects are physics and mathematics.",
            "picture"=>"images/u7_p_011.jpg"
        );


        $data['events'][] = array(
            "num"=>"33",
            'type'=>"text",
            "timeRange"=>"02:33-02:38",
            "text"=>"Her dream is to become a scientist like Newton.",
            "picture"=>"images/u7_p_011.jpg"
        );

        $data['events'][] = array(
            "num"=>"34",
            'type'=>"text",
            "timeRange"=>"02:38-02:41",
            "text"=>"She goes to bed at 11.",
            "picture"=>"images/u7_p_012.jpg"
        );

        $data['events'][] = array(
            "num"=>"35",
            "content_id"=>1125,
            'type'=>"sr_reading",
            "scores"=>1,
            "timeRange"=>"02:41-02:46",
            "text"=>"She likes to have a hot shower to relax herself before going to bed.",
            "answer"=>"She likes to have a hot shower to relax herself before going to bed",
            "picture"=>"images/u7_p_012.jpg"
        );

        $data['events'][] = array(
            "num"=>"36",
            'type'=>"text",
            "timeRange"=>"02:46-02:54",
            "text"=>"It is only during the weekend that Lucy can find the time to enjoy music or go on outings with her family.",
            "picture"=>"images/u7_p_013.jpg"
        );

        $data['events'][] = array(
            "num"=>"37",
            "content_id"=>1126,
            'type'=>"sr_reading",
            "scores"=>1,
            "timeRange"=>"02:54-03:00",
            "text"=>"But she still thinks all the effort she puts in at school will pay off in the end.",
            "answer"=>"But she still thinks all the effort she puts in at school will pay off in the end.",
            "picture"=>"images/u7_p_013.jpg"
        );

         $this->saveEventListToDatabases($data);$a =  json_encode($data);
        $fp = fopen('json148.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
        return;
    }

    public function getPart149(){
        $data = array(
            "unit_id"        => 7,
            "lesson_id"      => 39,
            "part_id"        => 149,
            "media_filename" => 'media/u7d.mp4',
            "media_type"     => 'video',
            "totalTime"      => "4:05",
            "part_type"      => "dialog",
            "have_questions" => false,
            "questions_type" => "text",
            "keywords"       => array(
                "vocational school",
                "be curious about",
                "make a decision",
                "in the suburbs",
                "shower",
                "butter",
                "assemble",
                "take a nap",
                "hard drive",
                "disc",
                "read up on"
            ),
        );
        $data['events'][] = array(
            "num"=>"1",
            'type'=>"text",
            "timeRange"=>"00:00:000-00:04:480",
            "text"=>"Lucy is now spending her summer vacation at Joe's home.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"2",
            'type'=>"text",
            "timeRange"=>"00:04:480-00:11:560",
            "text"=>"Joe is her cousin, who is now studying at a vocational school in Germany.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"3",
            'type'=>"text",
            "timeRange"=>"00:11:560-00:14:000",
            "text"=>"They are now sitting in the yard and chatting.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"4",
            'type'=>"text",
            "timeRange"=>"00:14:000-00:20:120",
            "text"=>"Joe, tell me something about your last semester at Vocational School.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"5",
            'type'=>"text",
            "timeRange"=>"00:20:120-00:24:800",
            "text"=>"I am really curious about your school life.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"6",
            'type'=>"text",
            "timeRange"=>"00:24:800-00:28:840",
            "text"=>"Well, I really think I've made the right decision. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"7",
            'type'=>"text",
            "timeRange"=>"00:28:840-00:30:800",
            "text"=>"I like it.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"8",
            'type'=>"text",
            "timeRange"=>"00:30:800-00:33:880",
            "text"=>"Is your school far away?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"9",
            'type'=>"text",
            "timeRange"=>"00:33:880-00:39:760",
            "text"=>"Yes, the school is about 15 miles out of town in the suburbs. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"10",
            'type'=>"text",
            "timeRange"=>"00:39:760-00:43:680",
            "text"=>"So I usually stay at school during the week. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"11",
            'type'=>"text",
            "timeRange"=>"00:43:680-00:49:760",
            "text"=>"Last semester, I stayed with another boy, Tom, in the school dormitory.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"12",
            'type'=>"text",
            "timeRange"=>"00:49:760-00:52:960",
            "text"=>"When did you usually get up?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"13",
            'type'=>"text",
            "timeRange"=>"00:52:960-00:55:760",
            "text"=>"I usually got up at 7.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"14",
            'type'=>"text",
            "timeRange"=>"00:55:760-00:58:440",
            "text"=>"We shared one bathroom.",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"15",
            'type'=>"text",
            "timeRange"=>"00:58:440-01:02:400",
            "text"=>"So first I showered and brushed my teeth.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"16",
            'type'=>"text",
            "timeRange"=>"01:02:400-01:05:680",
            "text"=>"Then Tom used the bathroom after me.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"17",
            'type'=>"text",
            "timeRange"=>"01:05:680-01:09:560",
            "text"=>"Did you have a mini fridge in the room?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"18",
            'type'=>"text",
            "timeRange"=>"01:09:560-01:16:680",
            "text"=>"Yes, we had a mini fridge where we stored some breads, butter, drinks and fruits. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"19",
            'type'=>"text",
            "timeRange"=>"01:16:680-01:20:760",
            "text"=>"We also had a microwave oven to warm up simple food. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"20",
            'type'=>"text",
            "timeRange"=>"01:20:760-01:25:000",
            "text"=>"We usually ate a simple breakfast from the fridge.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"21",
            'type'=>"text",
            "timeRange"=>"01:25:000-01:29:440",
            "text"=>"How many classes did you have each day?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"22",
            'type'=>"text",
            "timeRange"=>"01:29:440-01:34:840",
            "text"=>"Well, last semester, I had 7 classes altogether.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"23",
            'type'=>"text",
            "timeRange"=>"01:34:840-01:41:560",
            "text"=>"One class was actually in the workshop, where we learned how to assemble computers from parts.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"24",
            'type'=>"text",
            "timeRange"=>"01:41:560-01:45:680",
            "text"=>"When did your classes start?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"25",
            'type'=>"text",
            "timeRange"=>"01:45:680-01:50:720",
            "text"=>"In the morning, my classes were from 8 to 11:30.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"26",
            'type'=>"text",
            "timeRange"=>"01:50:720-01:55:640",
            "text"=>"In the afternoon, the classes were from 2 to 4:30.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"27",
            'type'=>"text",
            "timeRange"=>"01:55:640-01:57:840",
            "text"=>"That's nice!",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"28",
            'type'=>"text",
            "timeRange"=>"01:57:840-02:00:880",
            "text"=>"Then you had more time in between.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"29",
            'type'=>"text",
            "timeRange"=>"02:00:880-02:04:680",
            "text"=>"Did you often take a nap after lunch?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"30",
            'type'=>"text",
            "timeRange"=>"02:04:680-02:06:880",
            "text"=>"Of course not.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"31",
            'type'=>"text",
            "timeRange"=>"02:06:880-02:10:520",
            "text"=>"I usually played computer games after lunch.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"32",
            'type'=>"text",
            "timeRange"=>"02:10:520-02:15:600",
            "text"=>"You are studying computer repairing, aren't you?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"33",
            'type'=>"text",
            "timeRange"=>"02:15:600-02:26:000",
            "text"=>"Yes, but right now, I am learning about hardware, such as how to change parts, the hard drive, the disc and so on. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"34",
            'type'=>"text",
            "timeRange"=>"02:26:000-02:28:240",
            "text"=>"Is it interesting?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"35",
            'type'=>"text",
            "timeRange"=>"02:28:240-02:31:560",
            "text"=>"It's OK, I think.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"36",
            'type'=>"text",
            "timeRange"=>"02:31:560-02:35:400",
            "text"=>"My interest now is how to write programs. ",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"37",
            'type'=>"text",
            "timeRange"=>"02:35:400-02:40:400",
            "text"=>"I am now taking a mathematics class to prepare for it.",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"38",
            'type'=>"text",
            "timeRange"=>"02:40:400-02:44:760",
            "text"=>"What did you usually do after class?",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"39",
            'type'=>"text",
            "timeRange"=>"02:44:760-02:48:460",
            "text"=>"I did a lot of sports at the school gym. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"40",
            'type'=>"text",
            "timeRange"=>"02:48:460-02:55:200",
            "text"=>"But in the evening, I often spent at least two hours reading up on program writing.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"41",
            'type'=>"text",
            "timeRange"=>"02:55:200-02:59:300",
            "text"=>"Didn't you often have parties?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"42",
            'type'=>"text",
            "timeRange"=>"02:59:300-03:02:320",
            "text"=>"I don't like parties. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"43",
            'type'=>"text",
            "timeRange"=>"03:02:320-03:05:560",
            "text"=>"I would rather watch TV.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"44",
            'type'=>"text",
            "timeRange"=>"03:05:560-03:08:600",
            "text"=>"Did you go to bed late?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"45",
            'type'=>"text",
            "timeRange"=>"03:08:600-03:12:600",
            "text"=>"Sometimes very late, at about 12:30.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"46",
            'type'=>"text",
            "timeRange"=>"03:12:600-03:16:760",
            "text"=>"But most of the time, I went to bed at 10.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"47",
            'type'=>"text",
            "timeRange"=>"03:16:760-03:20:000",
            "text"=>"That's much better than me.",
            "picture"=>""
        );

         $this->saveEventListToDatabases($data);$a =  json_encode($data);
        $fp = fopen('json149.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
        return;
    }


    public function getPart150(){
        $data = array(
            "unit_id"       =>7,
            "lesson_id"     =>39,
            "part_id"       =>150,
            "media_filename"=>'media/u7d.mp4',
            "media_type"    =>'video',
            "totalTime"     =>"4:05",
            "part_type"     =>"dialog",
            "have_questions"=>false,
            "questions_type"=>"text",
            "keywords"      =>array(
                "vocational school ",
                "be curious about",
                "make a decision",
                "in the suburbs",
                "shower",
                "butter",
                "assemble",
                "take a nap ",
                "hard drive",
                "disc",
                "read up on"
            ),
        );

        $data['events'][] = array(
            "num"=>"1",
            'type'=>"text",
            "timeRange"=>"00:00:000-00:04:480",
            "text"=>"Lucy is now spending her summer vacation at Joe's home.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"2",
            'type'=>"text",
            "timeRange"=>"00:04:480-00:11:560",
            "text"=>"Joe is her cousin, who is now studying at a vocational school in Germany.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"3",
            'type'=>"text",
            "timeRange"=>"00:11:560-00:14:000",
            "text"=>"They are now sitting in the yard and chatting.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"4",
            'type'=>"text",
            "timeRange"=>"00:14:000-00:20:120",
            "text"=>"Joe, tell me something about your last semester at Vocational School.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"5",
            'type'=>"text",
            "timeRange"=>"00:20:120-00:24:800",
            "text"=>"I am really curious about your school life.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"6",
            'type'=>"text",
            "timeRange"=>"00:24:800-00:28:840",
            "text"=>"Well, I really think I've made the right decision. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"7",
            'type'=>"text",
            "timeRange"=>"00:28:840-00:30:800",
            "text"=>"I like it.",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"8",
            'type'=>"multipleChoices",
            "timeRange"=>"",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"9",
                    "content_id"=>1128,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7dcq.mp3',
                    "timeRange"=>"00:00-00:03",
                    "text"=>"Where is Joe studying now?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"At a high school in Germany.","isCorrect"=>false),
                        "1"=>array("item"=>"At a vocational school in France.", "isCorrect"=>false),
                        "2"=>array("item"=>"At a vocational school in Germany.", "isCorrect"=>true),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u7dcq.mp3',
                            "timeRange"=>"00:04-00:09",
                            "text"=>"Joe is Lucy's cousin, who is now studying at a vocational school in Germany.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u7dcq.mp3',
                            "timeRange"=>"00:04-00:09",
                            "text"=>"Joe is Lucy's cousin, who is now studying at a vocational school in Germany.",
                        ),
                    ),
                ),
                1=>array(
                    "num"=>"10",
                    "content_id"=>1129,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7dcq.mp3',
                    "timeRange"=>"00:09-00:13",
                    "text"=>"How does Lucy feel about Joe's school life?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"She is curious.","isCorrect"=>true),
                        "1"=>array("item"=>"She is serious.", "isCorrect"=>false),
                        "2"=>array("item"=>"She is anxious.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u7dcq.mp3',
                            "timeRange"=>"00:13-00:17",
                            "text"=>"Lucy is really curious about Joe's school life.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u7dcq.mp3',
                            "timeRange"=>"00:13-00:17",
                            "text"=>"Lucy is really curious about Joe's school life.",
                        ),
                    ),
                ),
                2=>array(
                    "num"=>"11",
                    "content_id"=>1130,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7dcq.mp3',
                    "timeRange"=>"00:17-00:23",
                    "text"=>"Does Joe think he has made the right decision to study at a vocational school in Germany?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Yes.","isCorrect"=>true),
                        "1"=>array("item"=>"No.", "isCorrect"=>false)
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u7dcq.mp3',
                            "timeRange"=>"00:23-00:28",
                            "text"=>"Joe likes his school life and he really thinks he has made the right decision.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u7dcq.mp3',
                            "timeRange"=>"00:23-00:28",
                            "text"=>"Joe likes his school life and he really thinks he has made the right decision.",
                        ),
                    ),
                ),
            )
        );

        $data['events'][] = array(
            "num"=>"12",
            'type'=>"text",
            "timeRange"=>"00:30:800-00:33:880",
            "text"=>"Is your school far away?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"13",
            'type'=>"text",
            "timeRange"=>"00:33:880-00:39:760",
            "text"=>"Yes, the school is about 15 miles out of town in the suburbs. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"14",
            'type'=>"text",
            "timeRange"=>"00:39:760-00:43:680",
            "text"=>"So I usually stay at school during the week. ",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"15",
            'type'=>"multipleChoices",
            "timeRange"=>"",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"16",
                    "content_id"=>1131,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7dcq.mp3',
                    "timeRange"=>"00:40-00:43",
                    "text"=>"Where is Joe's school from his home?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"About 15 miles from his home, in the suburbs.","isCorrect"=>true),
                        "1"=>array("item"=>"About 15 miles from his home, downtown.", "isCorrect"=>false),
                        "2"=>array("item"=>"About 10 miles from his home, in the suburbs.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u7dcq.mp3',
                            "timeRange"=>"03:28-03:33",
                            "text"=>"The school is about 15 miles out of town in the suburbs.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u7dcq.mp3',
                            "timeRange"=>"03:28-03:33",
                            "text"=>"The school is about 15 miles out of town in the suburbs.",
                        ),
                    ),
                )
            )
        );

        $data['events'][] = array(
            "num"=>"17",
            'type'=>"text",
            "timeRange"=>"00:43:680-00:49:760",
            "text"=>"Last semester, I stayed with another boy, Tom, in the school dormitory.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"18",
            'type'=>"text",
            "timeRange"=>"00:49:760-00:52:960",
            "text"=>"When did you usually get up?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"19",
            'type'=>"text",
            "timeRange"=>"00:52:960-00:55:760",
            "text"=>"I usually got up at 7.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"20",
            'type'=>"text",
            "timeRange"=>"00:55:760-00:58:440",
            "text"=>"We shared one bathroom.",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"21",
            'type'=>"text",
            "timeRange"=>"00:58:440-01:02:400",
            "text"=>"So first I showered and brushed my teeth.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"22",
            'type'=>"text",
            "timeRange"=>"01:02:400-01:05:680",
            "text"=>"Then Tom used the bathroom after me.",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"23",
            'type'=>"multipleChoices",
            "timeRange"=>"",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"24",
                    "content_id"=>1132,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7dcq.mp3',
                    "timeRange"=>"00:43-00:48",
                    "text"=>"Who did Joe stay with in the  dormitory last semester?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Tom.","isCorrect"=>true),
                        "1"=>array("item"=>"Sam.", "isCorrect"=>false),
                        "2"=>array("item"=>"Tony.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u7dcq.mp3',
                            "timeRange"=>"00:48-00:54",
                            "text"=>"Last semester, Joe stayed with another boy, Tom, in the school dormitory.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u7dcq.mp3',
                            "timeRange"=>"00:48-00:54",
                            "text"=>"Last semester, Joe stayed with another boy, Tom, in the school dormitory.",
                        ),
                    ),
                ),
                1=>array(
                    "num"=>"25",
                    "content_id"=>1133,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7dcq.mp3',
                    "timeRange"=>"00:54-00:59",
                    "text"=>"Did Joe share the bathroom with another boy in the school dormitory last semester?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Yes.","isCorrect"=>true),
                        "1"=>array("item"=>"Np.", "isCorrect"=>false)
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u7dcq.mp3',
                            "timeRange"=>"00:59-01:03",
                            "text"=>"Joe and Tom shared a bathroom  in the dormitory last semester.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u7dcq.mp3',
                            "timeRange"=>"00:59-01:03",
                            "text"=>"Joe and Tom shared a bathroom  in the dormitory last semester.",
                        ),
                    ),
                ),
                2=>array(
                    "num"=>"26",
                    "content_id"=>1134,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7dcq.mp3',
                    "timeRange"=>"01:03-01:07",
                    "text"=>"Who used the bathroom first, Tom or Joe?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Tom.","isCorrect"=>false),
                        "1"=>array("item"=>"Joe.", "isCorrect"=>true),
                        "2"=>array("item"=>"None of the above.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u7dcq.mp3',
                            "timeRange"=>"01:07-01:14",
                            "text"=>"Joe used the bathroom first to shower and brush his teeth. Tom used the bathroom after him.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u7dcq.mp3',
                            "timeRange"=>"01:07-01:14",
                            "text"=>"Joe used the bathroom first to shower and brush his teeth. Tom used the bathroom after him.",
                        ),
                    ),
                ),
            )
        );

        $data['events'][] = array(
            "num"=>"27",
            'type'=>"text",
            "timeRange"=>"01:05:680-01:09:560",
            "text"=>"Did you have a mini fridge in the room?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"28",
            'type'=>"text",
            "timeRange"=>"01:09:560-01:16:680",
            "text"=>"Yes, we had a mini fridge where we stored some breads, butter, drinks and fruits. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"29",
            'type'=>"text",
            "timeRange"=>"01:16:680-01:20:760",
            "text"=>"We also had a microwave oven to warm up simple food. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"30",
            'type'=>"text",
            "timeRange"=>"01:20:760-01:25:000",
            "text"=>"We usually ate a simple breakfast from the fridge.",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"31",
            'type'=>"multipleChoices",
            "timeRange"=>"",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"32",
                    "content_id"=>1135,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7dcq.mp3',
                    "timeRange"=>"01:14-01:18",
                    "text"=>"What did the two boys store in the mini fridge?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Some breads, butter, drinks and fruits.","isCorrect"=>true),
                        "1"=>array("item"=>"Some breads, butter, mutton and pork.", "isCorrect"=>false),
                        "2"=>array("item"=>"Some wine and beer, drinks and fruits.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u7dcq.mp3',
                            "timeRange"=>"01:18-01:24",
                            "text"=>"The two boys had a mini fridge where they stored some breads, butter, drinks and fruits.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u7dcq.mp3',
                            "timeRange"=>"01:18-01:24",
                            "text"=>"The two boys had a mini fridge where they stored some breads, butter, drinks and fruits.",
                        ),
                    ),
                ),
                1=>array(
                    "num"=>"33",
                    "content_id"=>1136,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7dcq.mp3',
                    "timeRange"=>"01:24-01:28",
                    "text"=>"What did the two boys use to warm up their food?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"A microwave oven.","isCorrect"=>true),
                        "1"=>array("item"=>"A stove.", "isCorrect"=>false),
                        "2"=>array("item"=>"An oven.", "isCorrect"=>false)
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u7dcq.mp3',
                            "timeRange"=>"01:28-01:33",
                            "text"=>"The two boys also had a microwave oven to warm up simple food.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u7dcq.mp3',
                            "timeRange"=>"01:28-01:33",
                            "text"=>"The two boys also had a microwave oven to warm up simple food.",
                        ),
                    ),
                )
            )
        );

        $data['events'][] = array(
            "num"=>"34",
            'type'=>"text",
            "timeRange"=>"01:25:000-01:29:440",
            "text"=>"How many classes did you have each day?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"35",
            'type'=>"text",
            "timeRange"=>"01:29:440-01:34:840",
            "text"=>"Well, last semester, I had 7 classes altogether.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"36",
            'type'=>"text",
            "timeRange"=>"01:34:840-01:41:560",
            "text"=>"One class was actually in the workshop, where we learned how to assemble computers from parts.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"37",
            'type'=>"text",
            "timeRange"=>"01:41:560-01:45:680",
            "text"=>"When did your classes start?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"38",
            'type'=>"text",
            "timeRange"=>"01:45:680-01:50:720",
            "text"=>"In the morning, my classes were from 8 to 11:30.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"39",
            'type'=>"text",
            "timeRange"=>"01:50:720-01:55:640",
            "text"=>"In the afternoon, the classes were from 2 to 4:30.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"40",
            'type'=>"text",
            "timeRange"=>"01:55:640-01:57:840",
            "text"=>"That's nice!",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"41",
            'type'=>"text",
            "timeRange"=>"01:57:840-02:00:880",
            "text"=>"Then you had more time in between.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"42",
            'type'=>"text",
            "timeRange"=>"02:00:880-02:04:680",
            "text"=>"Did you often take a nap after lunch?",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"43",
            'type'=>"text",
            "timeRange"=>"02:04:680-02:06:880",
            "text"=>"Of course not.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"44",
            'type'=>"text",
            "timeRange"=>"02:06:880-02:10:520",
            "text"=>"I usually played computer games after lunch.",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"45",
            'type'=>"multipleChoices",
            "timeRange"=>"",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"46",
                    "content_id"=>1137,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7dcq.mp3',
                    "timeRange"=>"01:33-01:37",
                    "text"=>"How many classes did Joe have each day last semester?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"7 classes.","isCorrect"=>true),
                        "1"=>array("item"=>"8 classes.", "isCorrect"=>false),
                        "2"=>array("item"=>"9 classes.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u7dcq.mp3',
                            "timeRange"=>"01:37-01:41",
                            "text"=>"Last semester, Joe had 7 classes altogether.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u7dcq.mp3',
                            "timeRange"=>"01:37-01:41",
                            "text"=>"Last semester, Joe had 7 classes altogether.",
                        ),
                    ),
                ),
                1=>array(
                    "num"=>"47",
                    "content_id"=>1138,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7dcq.mp3',
                    "timeRange"=>"01:41-01:46",
                    "text"=>"Where did Joe mention he had class last semester?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Gym.","isCorrect"=>false),
                        "1"=>array("item"=>"Cafeteria.", "isCorrect"=>false),
                        "2"=>array("item"=>"Workshop.", "isCorrect"=>true)
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u7dcq.mp3',
                            "timeRange"=>"01:46-01:54",
                            "text"=>"Joe had one class in the workshop, where he and other students learned how to assemble computers from parts.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u7dcq.mp3',
                            "timeRange"=>"01:46-01:54",
                            "text"=>"Joe had one class in the workshop, where he and other students learned how to assemble computers from parts.",
                        ),
                    ),
                ),
                2=>array(
                    "num"=>"48",
                    "content_id"=>1139,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7dcq.mp3',
                    "timeRange"=>"02:05-02:09",
                    "text"=>"What did Joe usually do after lunch?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Take a nap.","isCorrect"=>false),
                        "1"=>array("item"=>"Play computer games.", "isCorrect"=>true),
                        "2"=>array("item"=>"Study.", "isCorrect"=>false)
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u7dcq.mp3',
                            "timeRange"=>"02:09-02:13",
                            "text"=>" Joe usually played computer games after lunch.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u7dcq.mp3',
                            "timeRange"=>"02:09-02:13",
                            "text"=>" Joe usually played computer games after lunch.",
                        ),
                    ),
                )
            )
        );

        $data['events'][] = array(
            "num"=>"49",
            'type'=>"text",
            "timeRange"=>"02:10:520-02:15:600",
            "text"=>"You are studying computer repairing, aren't you?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"50",
            'type'=>"text",
            "timeRange"=>"02:15:600-02:26:000",
            "text"=>"Yes, but right now, I am learning about hardware, such as how to change parts, the hard drive, the disc and so on. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"51",
            'type'=>"text",
            "timeRange"=>"02:26:000-02:28:240",
            "text"=>"Is it interesting?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"52",
            'type'=>"text",
            "timeRange"=>"02:28:240-02:31:560",
            "text"=>"It's OK, I think.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"53",
            'type'=>"text",
            "timeRange"=>"02:31:560-02:35:400",
            "text"=>"My interest now is how to write programs. ",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"54",
            'type'=>"text",
            "timeRange"=>"02:35:400-02:40:400",
            "text"=>"I am now taking a mathematics class to prepare for it.",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"55",
            'type'=>"multipleChoices",
            "timeRange"=>"",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"56",
                    "content_id"=>1140,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7dcq.mp3',
                    "timeRange"=>"02:13-02:16",
                    "text"=>"What is Joe learning about now?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Hardware.","isCorrect"=>true),
                        "1"=>array("item"=>"Software.", "isCorrect"=>false),
                        "2"=>array("item"=>"Programs.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u7dcq.mp3',
                            "timeRange"=>"02:16-02:24",
                            "text"=>"Right now, Joe is learning about hardware, such as how to change parts, the hard drive, the disc and so on. ",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u7dcq.mp3',
                            "timeRange"=>"02:16-02:24",
                            "text"=>"Right now, Joe is learning about hardware, such as how to change parts, the hard drive, the disc and so on. ",
                        ),
                    ),
                ),
                1=>array(
                    "num"=>"57",
                    "content_id"=>1141,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7dcq.mp3',
                    "timeRange"=>"02:24-02:30",
                    "text"=>"Which class is Joe now taking to prepare for writing programs?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Physics.","isCorrect"=>false),
                        "1"=>array("item"=>"Math.", "isCorrect"=>true),
                        "2"=>array("item"=>"Chemistry.", "isCorrect"=>false)
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u7dcq.mp3',
                            "timeRange"=>"02:30-02:38",
                            "text"=>"Joe's interest now is how to write programs. He is now taking a mathematics class to prepare for it.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u7dcq.mp3',
                            "timeRange"=>"02:30-02:38",
                            "text"=>"Joe's interest now is how to write programs. He is now taking a mathematics class to prepare for it.",
                        ),
                    ),
                )
            )
        );


        $data['events'][] = array(
            "num"=>"58",
            'type'=>"text",
            "timeRange"=>"02:40:400-02:44:760",
            "text"=>"What did you usually do after class?",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"59",
            'type'=>"text",
            "timeRange"=>"02:44:760-02:48:460",
            "text"=>"I did a lot of sports at the school gym. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"60",
            'type'=>"text",
            "timeRange"=>"02:48:460-02:55:200",
            "text"=>"But in the evening, I often spent at least two hours reading up on program writing.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"61",
            'type'=>"text",
            "timeRange"=>"02:55:200-02:59:300",
            "text"=>"Didn't you often have parties?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"62",
            'type'=>"text",
            "timeRange"=>"02:59:300-03:02:320",
            "text"=>"I don't like parties. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"63",
            'type'=>"text",
            "timeRange"=>"03:02:320-03:05:560",
            "text"=>"I would rather watch TV.",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"64",
            'type'=>"multipleChoices",
            "timeRange"=>"",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"65",
                    "content_id"=>1142,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7dcq.mp3',
                    "timeRange"=>"02:38-02:43",
                    "text"=>"Did Joe do a lot of sports at the school gym after class?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Yes.","isCorrect"=>true),
                        "1"=>array("item"=>"No.", "isCorrect"=>false)
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u7dcq.mp3',
                            "timeRange"=>"02:43-02:48",
                            "text"=>"Joe did a lot of sports at the school gym after class.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u7dcq.mp3',
                            "timeRange"=>"02:43-02:48",
                            "text"=>"Joe did a lot of sports at the school gym after class.",
                        ),
                    ),
                ),
                1=>array(
                    "num"=>"66",
                    "content_id"=>1143,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7dcq.mp3',
                    "timeRange"=>"02:48-02:51",
                    "text"=>"What did Joe do in the evening?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Reading up on program writing.","isCorrect"=>true),
                        "1"=>array("item"=>"Playing computer games.", "isCorrect"=>false),
                        "2"=>array("item"=>"Studying mathematics.", "isCorrect"=>false)
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u7dcq.mp3',
                            "timeRange"=>"02:51-02:58",
                            "text"=>"In the evening, Joe often spent at least two hours reading up on program writing.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u7dcq.mp3',
                            "timeRange"=>"02:51-02:58",
                            "text"=>"In the evening, Joe often spent at least two hours reading up on program writing.",
                        ),
                    ),
                )
            )
        );

        $data['events'][] = array(
            "num"=>"67",
            'type'=>"text",
            "timeRange"=>"03:05:560-03:08:600",
            "text"=>"Did you go to bed late?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"68",
            'type'=>"text",
            "timeRange"=>"03:08:600-03:12:600",
            "text"=>"Sometimes very late, at about 12:30.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"69",
            'type'=>"text",
            "timeRange"=>"03:12:600-03:16:760",
            "text"=>"But most of the time, I went to bed at 10.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"70",
            'type'=>"text",
            "timeRange"=>"03:16:760-03:20:000",
            "text"=>"That's much better than me.",
            "picture"=>""
        );
         $this->saveEventListToDatabases($data);$a =  json_encode($data);
        $fp = fopen('json150.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
        return;
    }


    public function getPart151()
    {
        $data = array(
            "unit_id"       =>7,
            "lesson_id"     =>39,
            "part_id"       =>151,
            "media_filename"=>'media/u7d.mp4',
            "media_type"    =>'video',
            "totalTime"     =>"4:05",
            "part_type"     =>"dialog",
            "have_questions"=>false,
            "questions_type"=>"text",
            "keywords"      =>array(
                "vocational school ",
                "be curious about",
                "make a decision",
                "in the suburbs",
                "shower",
                "butter",
                "assemble",
                "take a nap ",
                "hard drive",
                "disc",
                "read up on"
            ),
        );

        $data['events'][] = array(
            "num"=>"1",
            'type'=>"text",
            "timeRange"=>"00:00:000-00:04:480",
            "text"=>"Lucy is now spending her summer vacation at Joe's home.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"2",
            'type'=>"sr_reading",
            "content_id"=>1144,
            "scores"=>1,
            "timeRange"=>"00:04:480-00:11:560",
            "text"=>"Joe is her cousin, who is now studying at a vocational school in Germany.",
            "answer"=>"Joe is her cousin who is now studying at a vocational school in Germany",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"3",
            'type'=>"text",
            "timeRange"=>"00:11:560-00:14:000",
            "text"=>"They are now sitting in the yard and chatting.",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"4",
            'type'=>"text",
            "timeRange"=>"00:14:000-00:20:120",
            "text"=>"Joe, tell me something about your last semester at Vocational School.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"5",
            'type'=>"sr_reading",
            "content_id"=>1145,
            "scores"=>1,
            "timeRange"=>"00:20:120-00:24:800",
            "text"=>"I am really curious about your school life.",
            "answer"=>"I am really curious about your school life",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"6",
            'type'=>"text",
            "timeRange"=>"00:24:800-00:28:840",
            "text"=>"Well, I really think I've made the right decision. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"7",
            'type'=>"text",
            "timeRange"=>"00:28:840-00:30:800",
            "text"=>"I like it.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"8",
            'type'=>"text",
            "timeRange"=>"00:30:800-00:33:880",
            "text"=>"Is your school far away?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"9",
            'type'=>"sr_reading",
            "content_id"=>1146,
            "scores"=>1,
            "timeRange"=>"00:33:880-00:39:760",
            "text"=>"Yes, the school is about 15 miles out of town in the suburbs. ",
            "answer"=>"Yes the school is about 15 miles out of town in the suburbs",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"10",
            'type'=>"text",
            "timeRange"=>"00:39:760-00:43:680",
            "text"=>"So I usually stay at school during the week. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"11",
            'type'=>"text",
            "timeRange"=>"00:43:680-00:49:760",
            "text"=>"Last semester, I stayed with another boy, Tom, in the school dormitory.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"12",
            'type'=>"text",
            "timeRange"=>"00:49:760-00:52:960",
            "text"=>"When did you usually get up?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"13",
            'type'=>"text",
            "timeRange"=>"00:52:960-00:55:760",
            "text"=>"I usually got up at 7.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"14",
            'type'=>"text",
            "timeRange"=>"00:55:760-00:58:440",
            "text"=>"We shared one bathroom.",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"15",
            'type'=>"sr_reading",
            "content_id"=>1147,
            "scores"=>1,
            "timeRange"=>"00:58:440-01:02:400",
            "text"=>"So first I showered and brushed my teeth.",
            "answer"=>"So first I showered and brushed my teeth.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"16",
            'type'=>"text",
            "timeRange"=>"01:02:400-01:05:680",
            "text"=>"Then Tom used the bathroom after me.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"17",
            'type'=>"text",
            "timeRange"=>"01:05:680-01:09:560",
            "text"=>"Did you have a mini fridge in the room?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"18",
            'type'=>"sr_reading",
            "content_id"=>1148,
            "scores"=>1,
            "timeRange"=>"01:09:560-01:16:680",
            "text"=>"Yes, we had a mini fridge where we stored some breads, butter, drinks and fruits. ",
            "answer"=>"Yes we had a mini fridge where we stored some breads, butter, drinks and fruits",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"19",
            'type'=>"text",
            "timeRange"=>"01:16:680-01:20:760",
            "text"=>"We also had a microwave oven to warm up simple food. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"20",
            'type'=>"text",
            "timeRange"=>"01:20:760-01:25:000",
            "text"=>"We usually ate a simple breakfast from the fridge.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"21",
            'type'=>"text",
            "timeRange"=>"01:25:000-01:29:440",
            "text"=>"How many classes did you have each day?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"22",
            'type'=>"text",
            "timeRange"=>"01:29:440-01:34:840",
            "text"=>"Well, last semester, I had 7 classes altogether.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"23",
            'type'=>"sr_reading",
            "content_id"=>1149,
            "scores"=>1,
            "timeRange"=>"01:34:840-01:41:560",
            "text"=>"One class was actually in the workshop, where we learned how to assemble computers from parts.",
            "answer"=>"One class was actually in the workshop where we learned how to assemble computers from parts",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"24",
            'type'=>"text",
            "timeRange"=>"01:41:560-01:45:680",
            "text"=>"When did your classes start?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"25",
            'type'=>"text",
            "timeRange"=>"01:45:680-01:50:720",
            "text"=>"In the morning, my classes were from 8 to 11:30.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"26",
            'type'=>"text",
            "timeRange"=>"01:50:720-01:55:640",
            "text"=>"In the afternoon, the classes were from 2 to 4:30.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"27",
            'type'=>"text",
            "timeRange"=>"01:55:640-01:57:840",
            "text"=>"That's nice!",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"28",
            'type'=>"sr_reading",
            "content_id"=>1150,
            "scores"=>1,
            "timeRange"=>"01:57:840-02:00:880",
            "text"=>"Then you had more time in between.",
            "answer"=>"Then you had more time in between",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"29",
            'type'=>"sr_reading",
            "content_id"=>1151,
            "scores"=>1,
            "timeRange"=>"02:00:880-02:04:680",
            "text"=>"Did you often take a nap after lunch?",
            "answer"=>"Did you often take a nap after lunch",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"30",
            'type'=>"text",
            "timeRange"=>"02:04:680-02:06:880",
            "text"=>"Of course not.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"31",
            'type'=>"text",
            "timeRange"=>"02:06:880-02:10:520",
            "text"=>"I usually played computer games after lunch.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"32",
            'type'=>"text",
            "timeRange"=>"02:10:520-02:15:600",
            "text"=>"You are studying computer repairing, aren't you?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"33",
            'type'=>"sr_reading",
            "content_id"=>1152,
            "scores"=>1,
            "timeRange"=>"02:15:600-02:26:000",
            "text"=>"Yes, but right now, I am learning about hardware, such as how to change parts, the hard drive, the disc and so on. ",
            "answer"=>"Yes, but right now I am learning about hardware such as how to change parts the hard drive the disc and so on",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"34",
            'type'=>"text",
            "timeRange"=>"02:26:000-02:28:240",
            "text"=>"Is it interesting?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"35",
            'type'=>"text",
            "timeRange"=>"02:28:240-02:31:560",
            "text"=>"It's OK, I think.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"36",
            'type'=>"text",
            "timeRange"=>"02:31:560-02:35:400",
            "text"=>"My interest now is how to write programs. ",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"37",
            'type'=>"sr_reading",
            "content_id"=>1153,
            "scores"=>1,
            "timeRange"=>"02:35:400-02:40:400",
            "text"=>"I am now taking a mathematics class to prepare for it.",
            "answer"=>"I am now taking a mathematics class to prepare for it",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"38",
            'type'=>"text",
            "timeRange"=>"02:40:400-02:44:760",
            "text"=>"What did you usually do after class?",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"39",
            'type'=>"text",
            "timeRange"=>"02:44:760-02:48:460",
            "text"=>"I did a lot of sports at the school gym. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"40",
            'type'=>"sr_reading",
            "content_id"=>1154,
            "scores"=>1,
            "timeRange"=>"02:48:460-02:55:200",
            "text"=>"But in the evening, I often spent at least two hours reading up on program writing.",
            "answer"=>"But in the evening I often spent at least two hours reading up on program writing",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"41",
            'type'=>"text",
            "timeRange"=>"02:55:200-02:59:300",
            "text"=>"Didn't you often have parties?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"42",
            'type'=>"text",
            "timeRange"=>"02:59:300-03:02:320",
            "text"=>"I don't like parties. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"43",
            'type'=>"sr_reading",
            "content_id"=>1155,
            "scores"=>1,
            "timeRange"=>"03:02:320-03:05:560",
            "text"=>"I would rather watch TV.",
            "answer"=>"I would rather watch TV",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"44",
            'type'=>"text",
            "timeRange"=>"03:05:560-03:08:600",
            "text"=>"Did you go to bed late?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"45",
            'type'=>"text",
            "timeRange"=>"03:08:600-03:12:600",
            "text"=>"Sometimes very late, at about 12:30.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"46",
            'type'=>"text",
            "timeRange"=>"03:12:600-03:16:760",
            "text"=>"But most of the time, I went to bed at 10.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"47",
            'type'=>"text",
            "timeRange"=>"03:16:760-03:20:000",
            "text"=>"That's much better than me.",
            "picture"=>""
        );
        $this->saveEventListToDatabases($data);
        $a = json_encode($data);
        $fp = fopen('json151.txt', "w");
        fwrite($fp, $a);
        fclose($fp);
        return;
    }


    public function getPart152(){
        $dataT = array(
            "unit_id"       =>7,
            "lesson_id"     =>40,
            "part_id"       =>152,
            "media_filename"=>'media/u7ps.mp3',
            "media_type"    =>'audio',
            "totalTime"     =>"1:34",
            "part_type"     =>"summary",
            "have_questions"=>true,
            "questions_type"=>"sr",
            "keywords"      =>array(
                "semester",
                "spend",
                "sweep",
                "Generally speaking",
                "relax"
            ),
        );
        $data['events'][] = array(
            "num"=>"1",
            'type'=>"text",
            "timeRange"=>"00:00-00:04",
            "text"=>"Lucy usually gets up at around 6 o'clock in the morning.",
            "picture"=>"images/u7_ps_001.png"
        );
        $data['events'][] = array(
            "num"=>"2",
            'type'=>"text",
            "timeRange"=>"00:04-00:07",
            "text"=>"She has breakfast at around 6:30.",
            "picture"=>"images/u7_ps_001.png"
        );
        $data['events'][] = array(
            "num"=>"3",
            'type'=>"text",
            "timeRange"=>"00:07-00:11",
            "text"=>"After breakfast, she goes to school by bicycle.",
            "picture"=>"images/u7_ps_001.png"
        );

        $data['events'][] = array(
            "num"=>"4",
            'type'=>"text",
            "timeRange"=>"00:11-00:16",
            "text"=>"She often arrives at school at around 7:15.",
            "picture"=>"images/u7_ps_001.png"
        );
        $data['events'][] = array(
            "num"=>"5",
            'type'=>"text",
            "timeRange"=>"00:16-00:21",
            "text"=>"Her classes start at 8 in the morning and end at 4 in the afternoon. ",
            "picture"=>"images/u7_ps_002.png"
        );
        $data['events'][] = array(
            "num"=>"6",
            'type'=>"text",
            "timeRange"=>"00:21-00:26",
            "text"=>"This semester, she has 8 classes each day.",
            "picture"=>"images/u7_ps_002.png"
        );
        $data['events'][] = array(
            "num"=>"7",
            'type'=>"text",
            "timeRange"=>"00:26-00:31",
            "text"=>"Sometimes, she has lunch at a fast food restaurant near the school. ",
            "picture"=>"images/u7_ps_002.png"
        );
        $data['events'][] = array(
            "num"=>"8",
            'type'=>"text",
            "timeRange"=>"00:31-00:35",
            "text"=>"Sometimes, she has lunch in her school cafeteria.",
            "picture"=>"images/u7_ps_002.png"
        );
        $data['events'][] = array(
            "num"=>"9",
            'type'=>"text",
            "timeRange"=>"00:35-00:39",
            "text"=>"She usually gets home at around 4:30 pm.",
            "picture"=>"images/u7_ps_003.png"
        );
        $data['events'][] = array(
            "num"=>"10",
            'type'=>"text",
            "timeRange"=>"00:39-00:42",
            "text"=>"The family usually has dinner together. ",
            "picture"=>"images/u7_ps_003.png"
        );
        $data['events'][] = array(
            "num"=>"11",
            'type'=>"text",
            "timeRange"=>"00:42-00:46",
            "text"=>"She often spends some time cleaning her room after dinner. ",
            "picture"=>"images/u7_ps_004.png"
        );
        $data['events'][] = array(
            "num"=>"12",
            'type'=>"text",
            "timeRange"=>"00:46-00:51",
            "text"=>"Her father washes the dishes while her mother cleans the kitchen.",
            "picture"=>"images/u7_ps_004.png"
        );
        $data['events'][] = array(
            "num"=>"13",
            'type'=>"text",
            "timeRange"=>"00:51-00:55",
            "text"=>"She goes to bed at around 11 pm.",
            "picture"=>"images/u7_ps_005.png"
        );
        $data['events'][] = array(
            "num"=>"14",
            'type'=>"text",
            "timeRange"=>"00:55-00:59",
            "text"=>"She likes to take a hot shower before going to bed. ",
            "picture"=>"images/u7_ps_005.png"
        );

        $data['events'][] = array(
            "num"=>"15",
            'type'=>"text",
            "timeRange"=>"00:59-01:02",
            "text"=>"She sweeps the yard once a week.",
            "picture"=>"images/u7_ps_006.png"
        );

        $data['events'][] = array(
            "num"=>"16",
            'type'=>"text",
            "timeRange"=>"01:02-01:08",
            "text"=>"She also has to write three papers about hot topics in the newspaper. ",
            "picture"=>"images/u7_ps_006.png"
        );
        $data['events'][] = array(
            "num"=>"17",
            'type'=>"text",
            "timeRange"=>"01:08-01:14",
            "text"=>"Generally speaking, Lucy can't relax much until the weekend.",
            "picture"=>"images/u7_ps_006.png"
        );



        $data['events'][] = array(
            "num"=>"1",
            "content_id"=>1156,
            'type'=>"sr_readings",
            "timeRange"=>array("00:00-00:06","00:04-00:11","00:09-00:15"),
            "scores"=>1,
            "text"=>array("Lucy usually gets up at around 6 o'clock in the morning.","She has breakfast at around 6:30.","After breakfast, she goes to school by bicycle."),
            "answer"=>array("Lucy usually gets up at around 6 o'clock in the morning","She has breakfast at around 6:30.","After breakfast she goes to school by bicycle."),
            "pictures"=> array("images/u7_ps_006.png","images/u7_ps_006.png","images/u7_ps_006.png"),
            "picture"=>"images/u7_ps_006.png"
        );
        $data['events'][] = array(
            "num"=>"2",
            "content_id"=>1157,
            'type'=>"sr_readings",
            "timeRange"=>array("00:13-00:24","00:21-00:25","00:25-00:32"),
            "scores"=>1,
            "text"=>array("She often arrives at school at around 7:15.","Her classes start at 8 in the morning and end at 4 in the afternoon.","This semester, she has 8 classes each day."),
            "answer"=>array("She often arrives at school at around 7:15","Her classes start at 8 in the morning and end at 4 in the afternoon","This semester, she has 8 classes each day"),
            "pictures"=> array("images/u7_ps_006.png","images/u7_ps_006.png","images/u7_ps_006.png"),
            "picture"=>"images/u7_ps_006.png"
        );

        $data['events'][] = array(
            "num"=>"3",
            "content_id"=>1158,
            'type'=>"sr_readings",
            "timeRange"=>array("00:32-00:38","00:38-00:45","00:45-00:49"),
            "scores"=>1,
            "text"=>array("Sometimes, she has lunch at a fast food restaurant near the school. ","Sometimes, she has lunch in her school cafeteria.","She usually gets home at around 4:30 pm."),
            "answer"=>array("Sometimes she has lunch at a fast food restaurant near the school ","Sometimes she has lunch in her school cafeteria","She usually gets home at around 4:30 pm"),
            "picture"=>"images/u7_ps_006.png",
            "pictures"=>array("images/u7_ps_006.png","images/u7_ps_006.png","images/u7_ps_006.png")
        );

        $data['events'][] = array(
            "num"=>"4",
            "content_id"=>1159,
            'type'=>"sr_readings",
            "timeRange"=>array("00:49-00:54","00:54-00:58","00:58-01:02","00:58-01:02","00:58-01:02"),
            "scores"=>1,
            "picture"=>"images/u7_ps_006.png",
            "text"=>array("The family usually has dinner together.","She often spends some time cleaning her room after dinner.","Her father washes the dishes while her mother cleans the kitchen.","She goes to bed at around 11 pm."),
            "answer"=>array("The family usually has dinner together","She often spends some time cleaning her room after dinner","Her father washes the dishes while her mother cleans the kitchen","She goes to bed at around 11 pm"),
            "pictures"=>array("images/u7_ps_006.png","images/u7_ps_006.png","images/u7_ps_006.png","images/u7_ps_006.png")

        );
        $data['events'][] = array(
            "num"=>"5",
            "content_id"=>1160,
            'type'=>"sr_readings",
            "timeRange"=>array("00:49-00:54","00:54-00:58","00:58-01:02","00:58-01:02"),
            "scores"=>1,
            "picture"=>"images/u7_ps_006.png",
            "text"=>array("She likes to take a hot shower before going to bed.","She sweeps the yard once a week.","She also has to write three papers about hot topics in the newspaper.","Generally speaking, Lucy can't relax much until the weekend."),
            "answer"=>array("She likes to take a hot shower before going to bed","She sweeps the yard once a week","She also has to write three papers about hot topics in the newspaper","Generally speaking, Lucy can't relax much until the weekend"),
            "pictures"=>array("images/u7_ps_006.png","images/u7_ps_006.png","images/u7_ps_006.png")

        );
        $database = array_merge($dataT,$data);
        //$database = array_merge($database,$data1);

        //exit;
        $this->saveEventListToDatabases($database);

       // $dataT['eventLists'] = array($data,$data1);
        $a =  json_encode($dataT);
        $fp = fopen('json152.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
        return;
    }


    public function getPart153(){
        $data = array(
            "unit_id"       =>7,
            "lesson_id"     =>40,
            "part_id"       =>153,
            "media_filename"=>'media/u7p.mp3',
            "content_totalcount"  => 20,
            "content_perpage"     => 2,
            "content_perPageCount"=> 3,
            "media_type"    =>'audio',
            "totalTime"     =>"4:54",
            "have_questions"=>true,
            "questions_type"=>"sr",
            "part_type"     =>"questions",
            "is_playbutton"  =>true,
            "keywords"      =>array(
            ),
        );

        $data['events'][] = array(
            "num"=>"1",
            "content_id"=>1161,
            'type'=>"sr_reading",
            "timeRange"=>"00:08-00:13",
            "scores"=>1,
            "text"=>"During the week, she usually gets up at around 6 o'clock.",
            "answer"=>"During the week she usually gets up at around 6 o'clock",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7p.mp3',
                    "timeRange"=>"00:08-00:13",
                    "text"=>"During the week, she usually gets up at around 6 o'clock.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7p.mp3',
                    "timeRange"=>"00:08-00:13",
                    "text"=>"During the week, she usually gets up at around 6 o'clock.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"2",
            "content_id"=>1162,
            'type'=>"sr_reading",
            "timeRange"=>"00:13-00:19",
            "scores"=>1,
            "text"=>"She quickly gets dressed, brushes her teeth and washes her hands and face.",
            "answer"=>"She quickly gets dressed, brushes her teeth and washes her hands and face.",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7p.mp3',
                    "timeRange"=>"00:13-00:19",
                    "text"=>"She quickly gets dressed, brushes her teeth and washes her hands and face.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7p.mp3',
                    "timeRange"=>"00:13-00:19",
                    "text"=>"She quickly gets dressed, brushes her teeth and washes her hands and face.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"3",
            "content_id"=>1163,
            'type'=>"sr_reading",
            "timeRange"=>"00:56-01:03",
            "scores"=>1,
            "text"=>"This semester, she has mathematics, English, and Chinese classes in the mornings.",
            "answer"=>"This semester, she has mathematics, English, and Chinese classes in the mornings",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7p.mp3',
                    "timeRange"=>"00:56-01:03",
                    "text"=>"This semester, she has mathematics, English, and Chinese classes in the mornings.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7p.mp3',
                    "timeRange"=>"00:56-01:03",
                    "text"=>"This semester, she has mathematics, English, and Chinese classes in the mornings.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"4",
            "content_id"=>1164,
            'type'=>"sr_reading",
            "timeRange"=>"01:12-01:17",
            "scores"=>1,
            "text"=>"Sometimes, she has lunch at a fast food restaurant near the school.",
            "answer"=>"Sometimes, she has lunch at a fast food restaurant near the school.",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7p.mp3',
                    "timeRange"=>"01:12-01:17",
                    "text"=>"Sometimes, she has lunch at a fast food restaurant near the school.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7p.mp3',
                    "timeRange"=>"01:12-01:17",
                    "text"=>"Sometimes, she has lunch at a fast food restaurant near the school.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"5",
            "content_id"=>1165,
            'type'=>"sr_reading",
            "timeRange"=>"01:26-01:33",
            "scores"=>1,
            "text"=>"On Fridays, she often plays volleyball with her classmates for about half an hour before she goes home.",
            "answer"=>"On Fridays, she often plays volleyball with her classmates for about half an hour before she goes home.",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7p.mp3',
                    "timeRange"=>"01:26-01:33",
                    "text"=>"On Fridays, she often plays volleyball with her classmates for about half an hour before she goes home.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7p.mp3',
                    "timeRange"=>"01:26-01:33",
                    "text"=>"On Fridays, she often plays volleyball with her classmates for about half an hour before she goes home.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"6",
            "content_id"=>1166,
            'type'=>"sr_reading",
            "timeRange"=>"01:33-01:42",
            "scores"=>1,
            "text"=>"After arriving at home, Lucy usually studies for about an hour before she has dinner with her parents and her sister Betty.",
            "answer"=>"After arriving at home, Lucy usually studies for about an hour before she has dinner with her parents and her sister Betty.",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7p.mp3',
                    "timeRange"=>"01:33-01:42",
                    "text"=>"After arriving at home, Lucy usually studies for about an hour before she has dinner with her parents and her sister Betty.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7p.mp3',
                    "timeRange"=>"01:33-01:42",
                    "text"=>"After arriving at home, Lucy usually studies for about an hour before she has dinner with her parents and her sister Betty.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"7",
            "content_id"=>1167,
            'type'=>"sr_reading",
            "timeRange"=>"01:46-01:52",
            "scores"=>1,
            "text"=>"After dinner, her father washes the dishes, and her mother cleans the kitchen. ",
            "answer"=>"After dinner, her father washes the dishes, and her mother cleans the kitchen.",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7p.mp3',
                    "timeRange"=>"01:46-01:52",
                    "text"=>"After dinner, her father washes the dishes, and her mother cleans the kitchen. ",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7p.mp3',
                    "timeRange"=>"01:46-01:52",
                    "text"=>"After dinner, her father washes the dishes, and her mother cleans the kitchen. ",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"8",
            "content_id"=>1168,
            'type'=>"sr_reading",
            "timeRange"=>"01:57-02:02",
            "scores"=>1,
            "text"=>"She is also responsible for sweeping the yard once a week on weekends.",
            "answer"=>"She is also responsible for sweeping the yard once a week on weekends.",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7p.mp3',
                    "timeRange"=>"01:57-02:02",
                    "text"=>"She is also responsible for sweeping the yard once a week on weekends.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7p.mp3',
                    "timeRange"=>"01:57-02:02",
                    "text"=>"She is also responsible for sweeping the yard once a week on weekends.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"9",
            "content_id"=>1169,
            'type'=>"sr_reading",
            "timeRange"=>"02:02-02:09",
            "scores"=>1,
            "text"=>"In order for Lucy to have a quiet environment to study, her parents usually watch TV in their bedroom. ",
            "answer"=>"In order for Lucy to have a quiet environment to study, her parents usually watch TV in their bedroom. ",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7p.mp3',
                    "timeRange"=>"02:02-02:09",
                    "text"=>"In order for Lucy to have a quiet environment to study, her parents usually watch TV in their bedroom. ",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7p.mp3',
                    "timeRange"=>"02:02-02:09",
                    "text"=>"In order for Lucy to have a quiet environment to study, her parents usually watch TV in their bedroom. ",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"10",
            "content_id"=>1170,
            'type'=>"sr_reading",
            "timeRange"=>"02:09-02:15",
            "scores"=>1,
            "text"=>"Lucy's high school ranks Number 1 in the city and she has tons of homework to do.",
            "answer"=>"Lucy's high school ranks Number 1 in the city and she has tons of homework to do.",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7p.mp3',
                    "timeRange"=>"02:09-02:15",
                    "text"=>"Lucy's high school ranks Number 1 in the city and she has tons of homework to do.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7p.mp3',
                    "timeRange"=>"02:09-02:15",
                    "text"=>"Lucy's high school ranks Number 1 in the city and she has tons of homework to do.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );


        $data['events'][] = array(
            "num"=>"11",
            "content_id"=>1171,
            'type'=>"sr_reading",
            "timeRange"=>"02:20-02:28",
            "scores"=>1,
            "text"=>"Each week, she also has to write three papers about hot topics in the newspaper so as to improve her writing skill.",
            "answer"=>"Each week, she also has to write three papers about hot topics in the newspaper so as to improve her writing skill. ",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7p.mp3',
                    "timeRange"=>"02:20-02:28",
                    "text"=>"Each week, she also has to write three papers about hot topics in the newspaper so as to improve her writing skill.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7p.mp3',
                    "timeRange"=>"02:20-02:28",
                    "text"=>"Each week, she also has to write three papers about hot topics in the newspaper so as to improve her writing skill.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"12",
            "content_id"=>1172,
            'type'=>"sr_reading",
            "timeRange"=>"02:46-02:54",
            "scores"=>1,
            "text"=>"It is only during the weekend that Lucy can find the time to enjoy music or go on outings with her family.",
            "answer"=>"It is only during the weekend that Lucy can find the time to enjoy music or go on outings with her family.",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7p.mp3',
                    "timeRange"=>"02:46-02:54",
                    "text"=>"It is only during the weekend that Lucy can find the time to enjoy music or go on outings with her family.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7p.mp3',
                    "timeRange"=>"02:46-02:54",
                    "text"=>"It is only during the weekend that Lucy can find the time to enjoy music or go on outings with her family.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"13",
            "content_id"=>1173,
            'type'=>"sr_reading",
            "timeRange"=>"00:14-00:21",
            "scores"=>1,
            "text"=>"Joe, tell me something about your last semester at Vocational School.",
            "answer"=>"Joe, tell me something about your last semester at Vocational School.",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7d.mp3',
                    "timeRange"=>"00:14-00:21",
                    "text"=>"Joe, tell me something about your last semester at Vocational School.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7d.mp3',
                    "timeRange"=>"00:14-00:21",
                    "text"=>"Joe, tell me something about your last semester at Vocational School.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"14",
            "content_id"=>1174,
            'type'=>"sr_reading",
            "timeRange"=>"00:25-00:29",
            "scores"=>1,
            "text"=>"Well, I really think I've made the right decision.",
            "answer"=>"Well, I really think I've made the right decision.",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7d.mp3',
                    "timeRange"=>"00:25-00:29",
                    "text"=>"Well, I really think I've made the right decision.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7d.mp3',
                    "timeRange"=>"00:25-00:29",
                    "text"=>"Well, I really think I've made the right decision.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"15",
            "content_id"=>1175,
            'type'=>"sr_reading",
            "timeRange"=>"00:34-00:40",
            "scores"=>1,
            "text"=>"Yes, the school is about 15 miles out of town in the suburbs. ",
            "answer"=>"Yes, the school is about 15 miles out of town in the suburbs. ",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7d.mp3',
                    "timeRange"=>"00:34-00:40",
                    "text"=>"Yes, the school is about 15 miles out of town in the suburbs. ",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7d.mp3',
                    "timeRange"=>"00:34-00:40",
                    "text"=>"Yes, the school is about 15 miles out of town in the suburbs. ",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"16",
            "content_id"=>1176,
            'type'=>"sr_reading",
            "timeRange"=>"01:10-01:17",
            "scores"=>1,
            "text"=>"Yes, we had a mini fridge where we stored some breads, butter, drinks and fruits.",
            "answer"=>"Yes, we had a mini fridge where we stored some breads, butter, drinks and fruits.",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7d.mp3',
                    "timeRange"=>"01:10-01:17",
                    "text"=>"Yes, we had a mini fridge where we stored some breads, butter, drinks and fruits.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7d.mp3',
                    "timeRange"=>"01:10-01:17",
                    "text"=>"Yes, we had a mini fridge where we stored some breads, butter, drinks and fruits.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"17",
            "content_id"=>1177,
            'type'=>"sr_reading",
            "timeRange"=>"01:35-01:42",
            "scores"=>1,
            "text"=>"One class was actually in the workshop, where we learned how to assemble computers from parts.",
            "answer"=>"YOne class was actually in the workshop, where we learned how to assemble computers from parts.",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7d.mp3',
                    "timeRange"=>"01:35-01:42",
                    "text"=>"One class was actually in the workshop, where we learned how to assemble computers from parts.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7d.mp3',
                    "timeRange"=>"01:35-01:42",
                    "text"=>"One class was actually in the workshop, where we learned how to assemble computers from parts.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"18",
            "content_id"=>1178,
            'type'=>"sr_reading",
            "timeRange"=>"02:16-02:26",
            "scores"=>1,
            "text"=>"Yes, but right now, I am learning about hardware, such as how to change parts, the hard drive, the disc and so on. ",
            "answer"=>"Yes, but right now, I am learning about hardware, such as how to change parts, the hard drive, the disc and so on. ",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7d.mp3',
                    "timeRange"=>"02:16-02:26",
                    "text"=>"Yes, but right now, I am learning about hardware, such as how to change parts, the hard drive, the disc and so on.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7d.mp3',
                    "timeRange"=>"02:16-02:26",
                    "text"=>"Yes, but right now, I am learning about hardware, such as how to change parts, the hard drive, the disc and so on.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"19",
            "content_id"=>1179,
            'type'=>"sr_reading",
            "timeRange"=>"02:36-02:41",
            "scores"=>1,
            "text"=>"I am now taking a mathematics class to prepare for it.",
            "answer"=>"I am now taking a mathematics class to prepare for it.",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7d.mp3',
                    "timeRange"=>"02:36-02:41",
                    "text"=>"I am now taking a mathematics class to prepare for it.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7d.mp3',
                    "timeRange"=>"02:36-02:41",
                    "text"=>"I am now taking a mathematics class to prepare for it.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"20",
            "content_id"=>1180,
            'type'=>"sr_reading",
            "timeRange"=>"02:49-02:56",
            "scores"=>1,
            "text"=>"But in the evening, I often spent at least two hours reading up on program writing.",
            "answer"=>"But in the evening, I often spent at least two hours reading up on program writing.",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7d.mp3',
                    "timeRange"=>"02:49-02:56",
                    "text"=>"But in the evening, I often spent at least two hours reading up on program writing.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7d.mp3',
                    "timeRange"=>"02:49-02:56",
                    "text"=>"But in the evening, I often spent at least two hours reading up on program writing.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
         $this->saveEventListToDatabases($data);$a =  json_encode($data);
        $fp = fopen('json153.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
        return;
    }


    public function getPart154(){
        $data = array(
            "unit_id"       =>7,
            "lesson_id"     =>40,
            "part_id"       =>154,
            "media_filename"=>'',
            "content_totalcount"  => 10,
            "content_perpage"     => 4,
            "content_perPageCount"=> 1,
            "media_type"    =>'audio',
            "totalTime"     =>"4:54",
            "have_questions"=>true,
            "questions_type"=>"sr",
            "part_type"     =>"questions",
            "keywords"      =>array(
            ),
        );
        $data['events'][] = array(
            "num"=>"1",
            "content_id"=>1181,
            "media_filename"=>'media/u7p.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_conjunction_clause",
            "timeRange"     =>"00:34-00:38",
            "scores"=>1,
            "text"=>"Her school is not far from where she lives.",
            "answer" =>"Her school is not far from where she lives. ",
            "items"=>array("Her school","is","not far from","where she lives."),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7p.mp3',
                    "timeRange"     =>"00:34-00:38",
                    "text"=>"Her school is not far from where she lives.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7p.mp3',
                    "timeRange"     =>"00:34-00:38",
                    "text"=>"Her school is not far from where she lives.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"2",
            "content_id"=>1182,
            "media_filename"=>'media/u7p.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_conjunction_clause",
            "timeRange"     =>"01:52-01:57",
            "scores"=>1,
            "answer"=>"Lucy is mainly responsible for tidying up her own room",
            "text" => "Lucy is mainly responsible for tidying up her own room.",
            "items"=>array("Lucy","is mainly responsible for","tidying up","her own room."),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7p.mp3',
                    "timeRange"     =>"01:52-01:57",
                    "text" => "Lucy is mainly responsible for tidying up her own room.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7p.mp3',
                    "timeRange"     =>"01:52-01:57",
                    "text" => "Lucy is mainly responsible for tidying up her own room.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"3",
            "content_id"=>1183,
            "media_filename"=>'media/u7p.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_conjunction_clause",
            "timeRange"     =>"02:15-02:20",
            "scores"=>1,
            "answer"=>"She has to do a lot of reading in English and Chinese",
            "text" => "She has to do a lot of reading in English and Chinese.",
            "items"=>array("She","has to do.","a lot of reading","in English and Chinese."),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7p.mp3',
                    "timeRange"     =>"02:15-02:20",
                    "text" => "She has to do a lot of reading in English and Chinese.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7p.mp3',
                    "timeRange"     =>"02:15-02:20",
                    "text" => "She has to do a lot of reading in English and Chinese.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"4",
            "content_id"=>1184,
            "media_filename"=>'media/u7p.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_conjunction_clause",
            "timeRange"     =>"02:28-02:33",
            "scores"=>1,
            "answer"=>"Her favorite school subjects are physics and mathematics",
            "text" => "Her favorite school subjects are physics and mathematics.",
            "items"=>array("Her favorite","school subjects","are","physics and mathematics."),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7p.mp3',
                    "timeRange"     =>"02:28-02:33",
                    "text" => "Her favorite school subjects are physics and mathematics.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7p.mp3',
                    "timeRange"     =>"02:28-02:33",
                    "text" => "Her favorite school subjects are physics and mathematics.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"5",
            "content_id"=>1185,
            "media_filename"=>'media/u7p.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_conjunction_clause",
            "timeRange"     =>"02:41-02:46",
            "scores"=>1,
            "answer"=>"She likes to have a hot shower to relax herself before going to bed",
            "text" => "She likes to have a hot shower to relax herself before going to bed.",
            "items"=>array("She likes to","have a hot shower","to relax herself","before going to bed."),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7p.mp3',
                    "timeRange"     =>"02:41-02:46",
                    "text" => "She likes to have a hot shower to relax herself before going to bed.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7p.mp3',
                    "timeRange"     =>"02:41-02:46",
                    "text" => "She likes to have a hot shower to relax herself before going to bed.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"6",
            "content_id"=>1186,
            "media_filename"=>'media/u7p.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_conjunction_clause",
            "timeRange"     =>"02:54-03:00",
            "scores"=>1,
            "answer"=>"But she still thinks all the effort she puts in at school will pay off in the end",
            "text" => "But she still thinks all the effort she puts in at school will pay off in the end.",
            "items"=>array("But she still thinks","all the effort","she puts in at school","will pay off in the end."),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7p.mp3',
                    "timeRange"     =>"02:54-03:00",
                    "text" => "But she still thinks all the effort she puts in at school will pay off in the end.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7p.mp3',
                    "timeRange"     =>"02:54-03:00",
                    "text" => "But she still thinks all the effort she puts in at school will pay off in the end.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"7",
            "content_id"=>1187,
            "media_filename"=>'media/u7d.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_conjunction_clause",
            "timeRange"     =>"00:05-00:11",
            "scores"=>1,
            "answer"=>"Joe is her cousin, who is now studying at a vocational school in Germany",
            "text"=>"Joe is her cousin, who is now studying at a vocational school in Germany.",
            "items"=>array("Joe is her cousin","who is now studying","at a vocational school","in Germany."),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7d.mp3',
                    "timeRange"     =>"00:05-00:11",
                    "text"=>"Joe is her cousin, who is now studying at a vocational school in Germany.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7d.mp3',
                    "timeRange"     =>"00:05-00:11",
                    "text"=>"Joe is her cousin, who is now studying at a vocational school in Germany.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );


        $data['events'][] = array(
            "num"=>"8",
            "content_id"=>1188,
            "media_filename"=>'media/u7d.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_conjunction_clause",
            "timeRange"     =>"00:44-00:50",
            "scores"=>1,
            "answer"=>"Last semester, I stayed with another boy, Tom, in the school dormitory.",
            "text" => "Last semester, I stayed with another boy, Tom, in the school dormitory.",
            "items"=>array("Last semester","I stayed","with another boy Tom","in the school dormitory."),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7d.mp3',
                    "timeRange"     =>"00:44-00:50",
                    "text" => "Last semester, I stayed with another boy, Tom, in the school dormitory.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7d.mp3',
                    "timeRange"     =>"00:44-00:50",
                    "text" => "Last semester, I stayed with another boy, Tom, in the school dormitory.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"9",
            "content_id"=>1189,
            "media_filename"=>'media/u7d.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_conjunction_clause",
            "timeRange"     =>"01:17-01:21",
            "scores"=>1,
            "answer"=>"We also had a microwave oven to warm up simple food",
            "text" => "We also had a microwave oven to warm up simple food.",
            "items"=>array("We also had","a microwave oven","to warm up","simple food."),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7d.mp3',
                    "timeRange"     =>"01:17-01:21",
                    "text" => "We also had a microwave oven to warm up simple food.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7d.mp3',
                    "timeRange"     =>"01:17-01:21",
                    "text" => "We also had a microwave oven to warm up simple food.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"10",
            "content_id"=>1190,
            "media_filename"=>'media/u7d.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_conjunction_clause",
            "timeRange"     =>"03:13-03:17",
            "scores"=>1,
            "answer"=>"But most of the time, I went to bed at 10",
            "text" => "But most of the time, I went to bed at 10.",
            "items"=>array("But"," most of the time,","I went to bed","at 10."),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7d.mp3',
                    "timeRange"     =>"03:13-03:17",
                    "text" => "But most of the time, I went to bed at 10.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7d.mp3',
                    "timeRange"     =>"03:13-03:17",
                    "text" => "It takes only 15 minutes to get there on foot.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

         $this->saveEventListToDatabases($data);$a =  json_encode($data);
        $fp = fopen('json154.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
        return;
    }

    public function getPart155(){
        $data = array(
            "unit_id"       =>7,
            "lesson_id"     =>40,
            "part_id"       =>155,
            "media_filename"=>'',
            "content_totalcount"  => 15,
            "content_perpage"     => 2,
            "content_perPageCount"=> 3,
            "media_type"    =>'audio',
            "totalTime"     =>"4:54",
            "have_questions"=>true,
            "questions_type"=>"sr",
            "part_type"     =>"questions",
            "keywords"      =>array(
            ),
        );

        $data['events'][] = array(
            "num"=>"1",
            "content_id"=>1191,
            "media_filename"=>'media/u7p.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"00:04-00:08",
            "scores"=>1,
            "text" => "She is going to take the SAT in two years.",
            "answer" => "She is going to take the SAT in two years",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7p.mp3',
                    "timeRange"     =>"00:04-00:08",
                    "text" => "She is going to take the SAT in two years.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7p.mp3',
                    "timeRange"     =>"00:04-00:08",
                    "text" => "She is going to take the SAT in two years.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"2",
            "content_id"=>1192,
            "media_filename"=>'media/u7p.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"00:23-00:26",
            "scores"=>1,
            "text" => "She is a great cook.",
            "answer" => "She is a great cook",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7p.mp3',
                    "timeRange"     =>"00:23-00:26",
                    "text" => "She is a great cook.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7p.mp3',
                    "timeRange"     =>"00:23-00:26",
                    "text" => "She is a great cook.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"3",
            "content_id"=>1193,
            "media_filename"=>'media/u7p.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"00:30-00:34",
            "scores"=>1,
            "text" => "After breakfast, she goes to school by bicycle.",
            "answer" => "After breakfast, she goes to school by bicycle",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7p.mp3',
                    "timeRange"     =>"00:30-00:34",
                    "text" => "After breakfast, she goes to school by bicycle.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7p.mp3',
                    "timeRange"     =>"00:30-00:34",
                    "text" => "After breakfast, she goes to school by bicycle.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"4",
            "content_id"=>1194,
            "media_filename"=>'media/u7p.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"00:38-00:42",
            "scores"=>1,
            "text" => "It takes her about 20 minutes to get to school.",
            "answer" => "It takes her about 20 minutes to get to school",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7p.mp3',
                    "timeRange"     =>"00:38-00:42",
                    "text" => "It takes her about 20 minutes to get to school.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7p.mp3',
                    "timeRange"     =>"00:38-00:42",
                    "text" => "It takes her about 20 minutes to get to school.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"5",
            "content_id"=>1195,
            "media_filename"=>'media/u7p.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"00:52-00:56",
            "scores"=>1,
            "text" => "She has a total of 8 classes every day.",
            "answer" => "She has a total of 8 classes every day",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7p.mp3',
                    "timeRange"     =>"00:52-00:56",
                    "text" => "She has a total of 8 classes every day.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7p.mp3',
                    "timeRange"     =>"00:52-00:56",
                    "text" => "She has a total of 8 classes every day.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"6",
            "content_id"=>1196,
            "media_filename"=>'media/u7p.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"01:42-01:46",
            "scores"=>1,
            "text" => "Betty is 8 years older than she is.",
            "answer" => "Betty is 8 years older than she is",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7p.mp3',
                    "timeRange"     =>"01:42-01:46",
                    "text" => "Betty is 8 years older than she is.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7d.mp3',
                    "timeRange"     =>"01:42-01:46",
                    "text" => "Betty is 8 years older than she is.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"7",
            "content_id"=>1197,
            "media_filename"=>'media/u7p.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"02:33-02:38",
            "scores"=>1,
            "text" => "Her dream is to become a scientist like Newton. ",
            "answer" => "Her dream is to become a scientist like Newton",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7p.mp3',
                    "timeRange"     =>"02:33-02:38",
                    "text" => "Her dream is to become a scientist like Newton.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7p.mp3',
                    "timeRange"     =>"02:33-02:38",
                    "text" => "Her dream is to become a scientist like Newton.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"8",
            "content_id"=>1198,
            "media_filename"=>'media/u7d.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"00:21-00:25",
            "scores"=>1,
            "text" => "I am really curious about your school life.",
            "answer" => "I am really curious about your school life",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7d.mp3',
                    "timeRange"     =>"00:21-00:25",
                    "text" => "I am really curious about your school life.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7d.mp3',
                    "timeRange"     =>"00:21-00:25",
                    "text" => "I am really curious about your school life.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"9",
            "content_id"=>1199,
            "media_filename"=>'media/u7d.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"00:40-00:44",
            "scores"=>1,
            "text" => "So I usually stay at school during the week.",
            "answer" => "So I usually stay at school during the week",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7d.mp3',
                    "timeRange"     =>"00:40-00:44",
                    "text" => "So I usually stay at school during the week.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7d.mp3',
                    "timeRange"     =>"00:40-00:44",
                    "text" => "So I usually stay at school during the week.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"10",
            "content_id"=>1200,
            "media_filename"=>'media/u7d.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"00:56-00:59",
            "scores"=>1,
            "text" => "We shared one bathroom.",
            "answer" => "We shared one bathroom.",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7d.mp3',
                    "timeRange"     =>"00:56-00:59",
                    "text" => "We shared one bathroom.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7d.mp3',
                    "timeRange"     =>"00:56-00:59",
                    "text" => "We shared one bathroom.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"11",
            "content_id"=>1201,
            "media_filename"=>'media/u7d.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"01:25-01:30",
            "scores"=>1,
            "text" => "How many classes did you have each day?",
            "answer" => "How many classes did you have each day?",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7d.mp3',
                    "timeRange"     =>"01:25-01:30",
                    "text" => "How many classes did you have each day?",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7d.mp3',
                    "timeRange"     =>"01:25-01:30",
                    "text" => "How many classes did you have each day?",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"12",
            "content_id"=>1202,
            "media_filename"=>'media/u7d.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"01:58-02:01",
            "scores"=>1,
            "text" => "Then you had more time in between.",
            "answer" => "Then you had more time in between",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7d.mp3',
                    "timeRange"     =>"01:58-02:01",
                    "text" => "Then you had more time in between.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7d.mp3',
                    "timeRange"     =>"01:58-02:01",
                    "text" => "Then you had more time in between.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"13",
            "content_id"=>1203,
            "media_filename"=>'media/u7d.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"02:32-02:36",
            "scores"=>1,
            "text" => "My interest now is how to write programs.",
            "answer" => "My interest now is how to write programs",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7d.mp3',
                    "timeRange"     =>"02:32-02:36",
                    "text" => "My interest now is how to write programs.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7d.mp3',
                    "timeRange"     =>"02:32-02:36",
                    "text" => "My interest now is how to write programs.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"14",
            "content_id"=>1204,
            "media_filename"=>'media/u7d.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"02:45-02:49",
            "scores"=>1,
            "text" => "I did a lot of sports at the school gym.",
            "answer" => "I did a lot of sports at the school gym",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7d.mp3',
                    "timeRange"     =>"02:45-02:49",
                    "text" => "I did a lot of sports at the school gym.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7d.mp3',
                    "timeRange"     =>"02:45-02:49",
                    "text" => "I did a lot of sports at the school gym.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"15",
            "content_id"=>1205,
            "media_filename"=>'media/u7d.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"03:03-03:06",
            "scores"=>1,
            "text" => "I would rather watch TV.",
            "answer" => "I would rather watch TV",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7d.mp3',
                    "timeRange"     =>"03:03-03:06",
                    "text" => "I would rather watch TV.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7d.mp3',
                    "timeRange"     =>"03:03-03:06",
                    "text" => "Anytime you like!",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
         $this->saveEventListToDatabases($data);$a =  json_encode($data);
        $fp = fopen('json155.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
        return;
    }

    public function getPart156(){
        $data = array(
            "unit_id"       =>7,
            "lesson_id"     =>41,
            "part_id"       =>156,
            "media_filename"=>'',
            "content_totalcount"  => 20,
            "content_perpage"     => 10,
            "content_perPageCount"=> 1,
            "media_type"    =>'audio',
            "totalTime"     =>"4:54",
            "have_questions"=>true,
            "questions_type"=>"text",
            "part_type"     =>"questions",
            "keywords"      =>array(
            ),
        );
        $data['events'][] = array(
            "num"=>"1",
            "content_id"=>1206,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"00:00-00:05",
            "scores"=>10,
            "text" => "You can not be _ with anything when you are not _ with yourself.",
            "answer" => "You can not be pleased with anything when you are not pleased with yourself.",
            "items" => array(
                "0"=>array("item"=>"pleased","isCorrect"=>true),
                "1"=>array("item"=>"please", "isCorrect"=>false),
                "2"=>array("item"=>"pleased", "isCorrect"=>true),
                "3"=>array("item"=>"pleasing", "isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7gfi.mp3',
                    "timeRange"     =>"00:00-00:05",
                    "text" => "You can not be pleased with anything when you are not pleased with yourself.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7gfi.mp3',
                    "timeRange"     =>"00:00-00:05",
                    "text" => "You can not be pleased with anything when you are not pleased with yourself.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"2",
            "content_id"=>1207,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"00:05-00:10",
            "scores"=>10,
            "text" => "The traffic accident which happened yesterday _ five people dead.",
            "answer"=>"The traffic accident which happened yesterday left five people dead.",
            "items" => array(
                "0"=>array("item"=>"left","isCorrect"=>true),
                "1"=>array("item"=>"leave", "isCorrect"=>false),
                "2"=>array("item"=>"lead", "isCorrect"=>false),
                "3"=>array("item"=>"led","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7gfi.mp3',
                    "timeRange"     =>"00:05-00:10",
                    "text"=>"The traffic accident which happened yesterday left five people dead.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7gfi.mp3',
                    "timeRange"     =>"00:05-00:10",
                    "text"=>"The traffic accident which happened yesterday left five people dead.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"3",
            "content_id"=>1208,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"00:10-00:15",
            "scores"=>10,
            "text" => "He is inexperienced, so I'm afraid he can't _ the job.",
            "answer"=>"He is inexperienced, so I'm afraid he can't handle the job.",
            "items" => array(
                "0"=>array("item"=>"handle","isCorrect"=>true),
                "1"=>array("item"=>"hand", "isCorrect"=>false),
                "2"=>array("item"=>"handler", "isCorrect"=>false),
                "3"=>array("item"=>"handy","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7gfi.mp3',
                    "timeRange"     =>"00:10-00:15",
                    "text"=>"He is inexperienced, so I'm afraid he can't handle the job.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7gfi.mp3',
                    "timeRange"     =>"00:10-00:15",
                    "text"=>"He is inexperienced, so I'm afraid he can't handle the job.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );
        $data['events'][] = array(
            "num"=>"4",
            "content_id"=>1209,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"00:15-00:20",
            "scores"=>10,
            "text" => "Why did you _ the file in two? | Because it was useless.",
            "answer"=>"Why did you tear the file in two? | Because it was useless.",
            "items" => array(
                "0"=>array("item"=>"tore","isCorrect"=>false),
                "1"=>array("item"=>"tears", "isCorrect"=>false),
                "2"=>array("item"=>"torn", "isCorrect"=>false),
                "3"=>array("item"=>"tear","isCorrect"=>true),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7gfi.mp3',
                    "timeRange"     =>"00:15-00:20",
                    "text"=>"Why did you tear the file in two? | Because it was useless.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7gfi.mp3',
                    "timeRange"     =>"00:15-00:20",
                    "text"=>"Why did you tear the file in two? | Because it was useless.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"5",
            "content_id"=>1210,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"00:20-00:25",
            "scores"=>10,
            "text" => "The director avoided giving a _ answer to the sharp question.",
            "answer"=>"The director avoided giving a direct answer to the sharp question.",
            "items" => array(
                "0"=>array("item"=>"directing", "isCorrect"=>false),
                "1"=>array("item"=>"direct","isCorrect"=>true),
                "2"=>array("item"=>"direction", "isCorrect"=>false),
                "3"=>array("item"=>"director","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7gfi.mp3',
                    "timeRange"     =>"00:20-00:25",
                    "text"=>"The director avoided giving a direct answer to the sharp question.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7gfi.mp3',
                    "timeRange"     =>"00:20-00:25",
                    "text"=>"The director avoided giving a direct answer to the sharp question.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"6",
            "content_id"=>1211,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"00:25-00:30",
            "scores"=>10,
            "text" => "He _ his latest novel. It is completely different from his other ones.",
            "answer"=>"He completed his latest novel. It is completely different from his other ones.",
            "items" => array(
                "0"=>array("item"=>"complete", "isCorrect"=>false),
                "1"=>array("item"=>"completion","isCorrect"=>false),
                "2"=>array("item"=>"completed", "isCorrect"=>true),
                "3"=>array("item"=>"completing","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7gfi.mp3',
                    "timeRange"     =>"00:25-00:30",
                    "text"=>"He completed his latest novel. It is completely different from his other ones.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7gfi.mp3',
                    "timeRange"     =>"00:25-00:30",
                    "text"=>"He completed his latest novel. It is completely different from his other ones.",
                 ),
            ),
            "picture"=>"images/type_click_001.png"
        );
        $data['events'][] = array(
            "num"=>"7",
            "content_id"=>1212,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"00:30-00:35",
            "scores"=>10,
            "text" => "Lucy and Joe are _ to each other. It is impossible to separate them.",
            "answer"=>"Lucy and Joe are close to each other. It is impossible to separate them.",
            "items" => array(
                "0"=>array("item"=>"close", "isCorrect"=>true),
                "1"=>array("item"=>"closing","isCorrect"=>false),
                "2"=>array("item"=>"closed", "isCorrect"=>false),
                "3"=>array("item"=>"closes","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7gfi.mp3',
                    "timeRange"     =>"00:30-00:35",
                    "text"=>"Lucy and Joe are close to each other. It is impossible to separate them.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7gfi.mp3',
                    "timeRange"     =>"00:30-00:35",
                    "text"=>"Lucy and Joe are close to each other. It is impossible to separate them.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"8",
            "content_id"=>1213,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"00:35-00:41",
            "scores"=>10,
            "text" => "The governor _ that his most important task was to provide the poor with free housing. ",
            "answer"=>"The governor stated that his most important task was to provide the poor with free housing.",
            "items" => array(
                "0"=>array("item"=>"announce","isCorrect"=>false),
                "1"=>array("item"=>"states","isCorrect"=>false),
                "2"=>array("item"=>"stated", "isCorrect"=>true),
                "3"=>array("item"=>"nation","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7gfi.mp3',
                    "timeRange"     =>"00:35-00:41",
                    "text"=>"The governor stated that his most important task was to provide the poor with free housing."
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7gfi.mp3',
                    "timeRange"     =>"00:35-00:41",
                    "text"=>"The governor stated that his most important task was to provide the poor with free housing."
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"9",
            "content_id"=>1214,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"00:41-00:46",
            "scores"=>10,
            "text" => "He _ an organization which provides a shelter for the homeless.",
            "answer"=>"He heads an organization which provides a shelter for the homeless.",
            "items" => array(
                "0"=>array("item"=>"heads","isCorrect"=>true),
                "1"=>array("item"=>"head","isCorrect"=>false),
                "2"=>array("item"=>"heats","isCorrect"=>false),
                "3"=>array("item"=>"harms","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7gfi.mp3',
                    "timeRange"     =>"00:41-00:46",
                    "text"=>"He heads an organization which provides a shelter for the homeless.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7gfi.mp3',
                    "timeRange"     =>"00:41-00:46",
                    "text"=>"He heads an organization which provides a shelter for the homeless.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );
        $data['events'][] = array(
            "num"=>"10",
            "content_id"=>1215,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"00:46-00:51",
            "scores"=>10,
            "text" => "Farmers are _ their land and heading for big cities to look for jobs.",
            "answer"=>"Farmers are deserting their land and heading for big cities to look for jobs.",
            "items" => array(
                "0"=>array("item"=>"deserting", "isCorrect"=>true),
                "1"=>array("item"=>"deserted","isCorrect"=>false),
                "2"=>array("item"=>"abandon", "isCorrect"=>false),
                "3"=>array("item"=>"desert","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7gfi.mp3',
                    "timeRange"     =>"00:46-00:51",
                    "text" => "Farmers are deserting their land and heading for big cities to look for jobs.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7gfi.mp3',
                    "timeRange"     =>"00:46-00:51",
                    "text" => "Farmers are deserting their land and heading for big cities to look for jobs.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );
        $data['events'][] = array(
            "num"=>"11",
            "content_id"=>1216,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"00:51-00:57",
            "scores"=>10,
            "text" => "No matter what happens, I will always be there for you. You _ to me.",
            "answer"=>"No matter what happens, I will always be there for you. You matter  to me.",
            "items" => array(
                "0"=>array("item"=>"event", "isCorrect"=>false),
                "1"=>array("item"=>"matter","isCorrect"=>true),
                "2"=>array("item"=>"issue", "isCorrect"=>false),
                "3"=>array("item"=>"means","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7gfi.mp3',
                    "timeRange"     =>"00:51-00:57",
                    "text"=>"No matter what happens, I will always be there for you. You matter to me.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7gfi.mp3',
                    "timeRange"     =>"00:51-00:57",
                    "text"=>"No matter what happens, I will always be there for you. You matter to me.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"12",
            "content_id"=>1217,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"00:57-01:02",
            "scores"=>10,
            "answer" => "The students pretended to be studying when their teacher stepped into the lab.",
            "text"=>"The students pretended to be studying when their teacher _ into the lab.",
            "items" => array(
                "0"=>array("item"=>"moved", "isCorrect"=>false),
                "1"=>array("item"=>"stride","isCorrect"=>false),
                "2"=>array("item"=>"step", "isCorrect"=>false),
                "3"=>array("item"=>"stepped","isCorrect"=>true),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7gfi.mp3',
                    "timeRange"     =>"00:57-01:02",
                    "text" => "The students pretended to be studying when their teacher stepped into the lab.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7gfi.mp3',
                    "timeRange"     =>"00:57-01:02",
                    "text" => "The students pretended to be studying when their teacher stepped into the lab.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"13",
            "content_id"=>1218,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"01:02-01:06",
            "scores"=>10,
            "text" => "Morning sunshine _ in through the open curtains.",
            "answer"=>"Morning sunshine flooded in through the open curtains.",
            "items" => array(
                "0"=>array("item"=>"flood", "isCorrect"=>false),
                "1"=>array("item"=>"squeezed", "isCorrect"=>false),
                "2"=>array("item"=>"crowded","isCorrect"=>false),
                "3"=>array("item"=>"flooded","isCorrect"=>true),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7gfi.mp3',
                    "timeRange"     =>"01:02-01:06",
                    "text" => "Morning sunshine flooded in through the open curtains.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7gfi.mp3',
                    "timeRange"     =>"01:02-01:06",
                    "text" => "Morning sunshine flooded in through the open curtains.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"14",
            "content_id"=>1219,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"01:06-01:12",
            "scores"=>10,
            "text" => "With so many employees, it's difficult for the employer to keep _ of them all.",
            "answer"=>"With so many employees, it's difficult for the employer to keep track of them all.",
            "items" => array(
                "0"=>array("item"=>"track", "isCorrect"=>true),
                "1"=>array("item"=>"back", "isCorrect"=>false),
                "2"=>array("item"=>"up","isCorrect"=>false),
                "3"=>array("item"=>"in touch","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7gfi.mp3',
                    "timeRange"     =>"01:06-01:12",
                    "text"=>"With so many employees, it's difficult for the employer to keep track of them all.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7gfi.mp3',
                    "timeRange"     =>"01:06-01:12",
                    "text"=>"With so many employees, it's difficult for the employer to keep track of them all.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"15",
            "content_id"=>1220,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"01:12-01:16",
            "scores"=>10,
            "text" => " _ has decided to raise oil prices.  ",
            "answer"=>"OPEC  has decided to raise oil prices.",
            "items" => array(
                "0"=>array("item"=>"OPEC", "isCorrect"=>true),
                "1"=>array("item"=>"APEC","isCorrect"=>false),
                "2"=>array("item"=>"NATO", "isCorrect"=>false),
                "3"=>array("item"=>"Euro","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7gfi.mp3',
                    "timeRange"     =>"01:12-01:16",
                    "text"=>"OPEC  has decided to raise oil prices.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7gfi.mp3',
                    "timeRange"     =>"01:12-01:16",
                    "text"=>"OPEC  has decided to raise oil prices.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"16",
            "content_id"=>1221,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"01:16-01:21",
            "scores"=>10,
            "text" =>"I want to withdraw money. I wonder if there is an _ beside the gym.",
            "answer"=>"I want to withdraw money. I wonder if there is an ATM beside the gym.",
            "items" => array(
                "0"=>array("item"=>"ATM", "isCorrect"=>true),
                "1"=>array("item"=>"TV","isCorrect"=>false),
                "2"=>array("item"=>"CD", "isCorrect"=>false),
                "3"=>array("item"=>"photo","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7gfi.mp3',
                    "timeRange"     =>"01:16-01:21",
                    "text"=>"I want to withdraw money. I wonder if there is an ATM beside the gym.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7gfi.mp3',
                    "timeRange"     =>"01:16-01:21",
                    "text"=>"I want to withdraw money. I wonder if there is an ATM beside the gym.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );
        $data['events'][] = array(
            "num"=>"17",
            "content_id"=>1222,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"01:21-01:26",
            "scores"=>10,
            "text" => "If you want to be accepted to an American university, you must pass _ . ",
            "answer"=>"If you want to be accepted to an American university, you must pass  TOEFL.",
            "items" => array(
                "0"=>array("item"=>"TOEFL", "isCorrect"=>true),
                "1"=>array("item"=>"PETS","isCorrect"=>false),
                "2"=>array("item"=>"CET", "isCorrect"=>false),
                "3"=>array("item"=>"TOEIC","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7gfi.mp3',
                    "timeRange"     =>"01:21-01:26",
                    "text"=>"If you want to be accepted to an American university, you must pass  TOEFL.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7gfi.mp3',
                    "timeRange"     =>"01:21-01:26",
                    "text"=>"If you want to be accepted to an American university, you must pass  TOEFL.",

                ),
            ),
            "picture"=>"images/type_click_001.png"
        );
        $data['events'][] = array(
            "num"=>"18",
            "content_id"=>1223,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"01:26-01:31",
            "scores"=>10,
            "text" => "Joe's hard work paid off. He was promoted to _ of the company.",
            "answer"=>"Joe's hard work paid off. He was promoted to CEO of the company. ",
            "items" => array(
                "0"=>array("item"=>"UFO", "isCorrect"=>false),
                "1"=>array("item"=>"IMO","isCorrect"=>false),
                "2"=>array("item"=>"CEO", "isCorrect"=>true),
                "3"=>array("item"=>"WHO","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7gfi.mp3',
                    "timeRange"     =>"01:26-01:31",
                    "text"=>"Joe's hard work paid off. He was promoted to CEO of the company.",
                ),
                "No"=>array(
                    "Yes"=>array(
                        "media_type"=>"audio",
                        "media_filename"=>'media/u7gfi.mp3',
                        "timeRange"     =>"01:26-01:31",
                        "text"=>"Joe's hard work paid off. He was promoted to CEO of the company.",
                    ),
                  ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"19",
            "content_id"=>1224,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"01:31-01:37",
            "scores"=>10,
            "text" => "While watching TV, we noticed that more famous stars made the _ . ",
            "answer"=>"While watching TV, we noticed that more famous stars made the ads.",
            "items" => array(
                "0"=>array("item"=>"ads", "isCorrect"=>true),
                "1"=>array("item"=>"DVD", "isCorrect"=>false),
                "2"=>array("item"=>"AIDS","isCorrect"=>false),
                "3"=>array("item"=>"VCD","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7gfi.mp3',
                    "timeRange"     =>"01:31-01:37",
                    "text"=>"While watching TV, we noticed that more famous stars made the ads.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7gfi.mp3',
                    "timeRange"     =>"01:31-01:37",
                    "text"=>"While watching TV, we noticed that more famous stars made the ads.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"20",
            "content_id"=>1225,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"01:37-01:44",
            "scores"=>10,
            "text" => "Tom loved doing experiments, so he built a chemistry _ for himself at the age of 18. ",
            "answer"=>"Tom loved doing experiments, so he built a chemistry lab for himself at the age of 18.",
            "items" => array(
                "0"=>array("item"=>"lap", "isCorrect"=>false),
                "1"=>array("item"=>"lamb", "isCorrect"=>false),
                "2"=>array("item"=>"lab","isCorrect"=>true),
                "3"=>array("item"=>"library","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7gfi.mp3',
                    "timeRange"     =>"01:37-01:44",
                    "text"=>"Tom loved doing experiments, so he built a chemistry lab for himself at the age of 18.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7gfi.mp3',
                    "timeRange"     =>"01:37-01:44",
                    "text"=>"Tom loved doing experiments, so he built a chemistry lab for himself at the age of 18.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );
         $this->saveEventListToDatabases($data);$a =  json_encode($data);
        $fp = fopen('json156.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
        return;
    }


    public function getPart157(){
        $data = array(
            "unit_id"       =>7,
            "lesson_id"     =>41,
            "part_id"       =>157,
            "media_filename"=>'',
            "content_totalcount"  => 15,
            "content_perpage"     => 6,
            "content_perPageCount"=> 1,
            "media_type"    =>'audio',
            "have_questions"=>true,
            "questions_type"=>"text",
            "totalTime"     =>"4:54",
            "part_type"     =>"questions",
            "keywords"      =>array(
            ),
        );
        $data['events'][] = array(
            "num"=>"1",
            "content_id"=>1226,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"00:00-00:06",
            "scores"=>1,
            "text" => "Although he is old, he still breaks bad habits and forms good habits.",
            "items" => array(
                "0"=>array("item"=>"Although he is old,"),
                "1"=>array("item"=>"he still"),
                "2"=>array("item"=>"breaks bad habits"),
                "3"=>array("item"=>"and forms good habits."),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7gso.mp3',
                    "timeRange"     =>"00:00-00:06",
                    "text" => "Although he is old, he still breaks bad habits and forms good habits.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7gso.mp3',
                    "timeRange"     =>"00:00-00:06",
                    "text" => "Although he is old, he still breaks bad habits and forms good habits.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );
        $data['events'][] = array(
            "num"=>"2",
            "content_id"=>1227,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"00:06-00:09",
            "scores"=>1,
            "text" => "He was blinded in a traffic accident.",
            "items" => array(
                "0"=>array("item"=>"He"),
                "1"=>array("item"=>"was blinded"),
                "2"=>array("item"=>"in"),
                "3"=>array("item"=>"a traffic accident.")
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7gso.mp3',
                    "timeRange"     =>"00:06-00:09",
                    "text" => "He was blinded in a traffic accident.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7gso.mp3',
                    "timeRange"     =>"00:06-00:09",
                    "text" => "He was blinded in a traffic accident.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );
        $data['events'][] = array(
            "num"=>"3",
            "content_id"=>1228,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"00:09-00:13",
            "scores"=>1,
            "text" => "The bus slowed down as it entered the bus stop.",
            "items" => array(
                "0"=>array("item"=>"The bus"),
                "1"=>array("item"=>"slowed down"),
                "2"=>array("item"=>"as it entered"),
                "3"=>array("item"=>"the bus stop."),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7gso.mp3',
                    "timeRange"     =>"00:09-00:13",
                    "text" => "The bus slowed down as it entered the bus stop.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7gso.mp3',
                    "timeRange"     =>"00:09-00:13",
                    "text" => "The bus slowed down as it entered the bus stop.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );
        $data['events'][] = array(
            "num"=>"4",
            "content_id"=>1229,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"00:13-00:18",
            "scores"=>1,
            "text" => "Scientists have always been aware of how fear can rule our lives.",
            "items" => array(
                "0"=>array("item"=>"Scientists have always"),
                "1"=>array("item"=>"been aware of"),
                "2"=>array("item"=>"how fear can"),
                "3"=>array("item"=>"rule our lives.")
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7gso.mp3',
                    "timeRange"     =>"00:13-00:18",
                    "text" => "Scientists have always been aware of how fear can rule our lives.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7gso.mp3',
                    "timeRange"     =>"00:13-00:18",
                    "text" => "Scientists have always been aware of how fear can rule our lives.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );
        $data['events'][] = array(
            "num"=>"5",
            "content_id"=>1230,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"00:18-00:22",
            "scores"=>1,
            "text" => "The rest of the group shouldered the heavy bags and set off.",
            "items" => array(
                "0"=>array("item"=>"The rest of the group"),
                "1"=>array("item"=>"shouldered"),
                "2"=>array("item"=>"the heavy bags"),
                "3"=>array("item"=>"and set off.")
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7gso.mp3',
                    "timeRange"     =>"00:18-00:22",
                    "text" => "The rest of the group shouldered the heavy bags and set off.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7gso.mp3',
                    "timeRange"     =>"00:18-00:22",
                    "text" => "The rest of the group shouldered the heavy bags and set off.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );
        $data['events'][] = array(
            "num"=>"6",
            "content_id"=>1231,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"00:22-00:26",
            "scores"=>1,
            "text" => "There were not enough tents to shelter all of them.",
            "items" => array(
                "0"=>array("item"=>"There were not"),
                "1"=>array("item"=>"enough tents"),
                "2"=>array("item"=>"to shelter"),
                "3"=>array("item"=>"all of them."),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7gso.mp3',
                    "timeRange"     =>"00:22-00:26",
                    "text" => "There were not enough tents to shelter all of them.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7gso.mp3',
                    "timeRange"     =>"00:22-00:26",
                    "text" => "There were not enough tents to shelter all of them.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"7",
            "content_id"=>1232,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"00:26-00:31",
            "scores"=>1,
            "text" => "The mother felt sorry to have wronged her son, so she apologized to him.",
            "items" => array(
                "0"=>array("item"=>"The mother"),
                "1"=>array("item"=>"felt sorry to"),
                "2"=>array("item"=>"have wronged her son"),
                "3"=>array("item"=>"so she apologized to him."),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7gso.mp3',
                    "timeRange"     =>"00:26-00:31",
                    "text" => "The mother felt sorry to have wronged her son, so she apologized to him.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7gso.mp3',
                    "timeRange"     =>"00:26-00:31",
                    "text" => "The mother felt sorry to have wronged her son, so she apologized to him.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"8",
            "content_id"=>1233,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"00:31-00:36",
            "scores"=>1,
            "text" => "The young man owned up that he hadn't completed the project on his own.",
            "items" => array(
                "0"=>array("item"=>"The young man"),
                "1"=>array("item"=>"owned up that"),
                "2"=>array("item"=>"he hadn't completed the project"),
                "3"=>array("item"=>"on his own.")
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7gso.mp3',
                    "timeRange"     =>"00:31-00:36",
                    "text" => "The young man owned up that he hadn't completed the project on his own.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7gso.mp3',
                    "timeRange"     =>"00:31-00:36",
                    "text" => "The young man owned up that he hadn't completed the project on his own.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"9",
            "content_id"=>1234,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"00:36-00:42",
            "scores"=>1,
            "text" => "The 50-year-old employee was sent a box along with a letter saying she was fired.",
            "items" => array(
                "0"=>array("item"=>"The 50-year-old employee"),
                "1"=>array("item"=>"was sent a box"),
                "2"=>array("item"=>"along with a letter"),
                "3"=>array("item"=>"saying she was fired."),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7gso.mp3',
                    "timeRange"     =>"00:36-00:42",
                    "text" => "TThe 50-year-old employee was sent a box along with a letter saying she was fired.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7gso.mp3',
                    "timeRange"     =>"00:36-00:42",
                    "text" => "TThe 50-year-old employee was sent a box along with a letter saying she was fired.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"10",
            "content_id"=>1235,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"00:42-00:46",
            "scores"=>1,
            "text" => "The security guard was asked to check each passenger's luggage.",
            "items" => array(
                "0"=>array("item"=>"The security guard"),
                "1"=>array("item"=>"was asked to"),
                "2"=>array("item"=>"check"),
                "3"=>array("item"=>"each passenger's luggage.")
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7gso.mp3',
                    "timeRange"     =>"00:42-00:46",
                    "text" => "The security guard was asked to check each passenger's luggage.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7gso.mp3',
                    "timeRange"     =>"00:42-00:46",
                    "text" => "The security guard was asked to check each passenger's luggage."
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"11",
            "content_id"=>1236,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"00:46-00:50",
            "scores"=>1,
            "text" => "What can we do if all the hotels are fully booked in the city?",
            "items" => array(
                "0"=>array("item"=>"What can we do"),
                "1"=>array("item"=>"if all the hotels"),
                "2"=>array("item"=>"are fully booked"),
                "3"=>array("item"=>"in the city?"),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7gso.mp3',
                    "timeRange"     =>"00:46-00:50",
                    "text" => "What can we do if all the hotels are fully booked in the city?",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7gso.mp3',
                    "timeRange"     =>"00:46-00:50",
                    "text" => "What can we do if all the hotels are fully booked in the city?",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"12",
            "content_id"=>1237,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"00:50-00:54",
            "scores"=>1,
            "text" => "She can't help thinking that there must be some good in him.",
            "items" => array(
                "0"=>array("item"=>"She can't help thinking"),
                "1"=>array("item"=>"that"),
                "2"=>array("item"=>"there must be"),
                "3"=>array("item"=>"some good in him."),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7gso.mp3',
                    "timeRange"     =>"00:50-00:54",
                    "text" => "She can't help thinking that there must be some good in him.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7gso.mp3',
                    "timeRange"     =>"00:50-00:54",
                    "text" => "She can't help thinking that there must be some good in him.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"13",
            "content_id"=>1238,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"00:54-00:59",
            "scores"=>1,
            "text" => "It was cold in the dorm, so he blew into his hands to warm them up.",
            "items" => array(
                "0"=>array("item"=>"It was cold"),
                "1"=>array("item"=>"in the dorm"),
                "2"=>array("item"=>"so he blew into his hands"),
                "3"=>array("item"=>"to warm them up."),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7gso.mp3',
                    "timeRange"     =>"00:54-00:59",
                    "text" => "It was cold in the dorm, so he blew into his hands to warm them up.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7gso.mp3',
                    "timeRange"     =>"00:54-00:59",
                    "text" => "It was cold in the dorm, so he blew into his hands to warm them up.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"14",
            "content_id"=>1239,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"00:59-01:04",
            "scores"=>1,
            "text" => "Some products have dropped in value since China entered the WTO.",
            "items" => array(
                "0"=>array("item"=>"Some products"),
                "1"=>array("item"=>"have dropped in value"),
                "2"=>array("item"=>"since China"),
                "3"=>array("item"=>"entered the WTO."),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7gso.mp3',
                    "timeRange"     =>"00:59-01:04",
                    "text" => "Some products have dropped in value since China entered the WTO.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7gso.mp3',
                    "timeRange"     =>"00:59-01:04",
                    "text" => "Some products have dropped in value since China entered the WTO.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"15",
            "content_id"=>1240,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"01:04-01:10",
            "scores"=>1,
            "text" => "After the great former president passed away, the UN flag was lowered in his honor.",
            "items" => array(
                "0"=>array("item"=>"After the great former president"),
                "1"=>array("item"=>"passed away"),
                "2"=>array("item"=>"the UN flag"),
                "3"=>array("item"=>"was lowered in his honor."),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7gso.mp3',
                    "timeRange"     =>"01:04-01:10",
                    "text" => "After the great former president passed away, the UN flag was lowered in his honor.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7gso.mp3',
                    "timeRange"     =>"01:04-01:10",
                    "text" => "After the great former president passed away, the UN flag was lowered in his honor.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

         $this->saveEventListToDatabases($data);$a =  json_encode($data);
        $fp = fopen('json157.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
        return;
    }

    public function getPart158(){
        $data = array(
            "unit_id"       =>7,
            "lesson_id"     =>41,
            "part_id"       =>158,
            "media_filename"=>'',
            "content_totalcount"  => 10,
            "content_perpage"     => 5,
            "content_perPageCount"=>1,
            "have_questions"=>true,
            "questions_type"=>"sr",
            "media_type"    =>'audio',
            "totalTime"     =>"4:54",
            "part_type"     =>"questions",
            "keywords"      =>array(
            ),
        );
        $data['events'][] = array(
            "num"=>"1",
            "content_id"=>1241,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"sr_ordering",
            "timeRange"     =>"00:00-00:04",
            "scores"=>1,
            "text" => "Doctors should be patient with their patients.",
            "answer" => "Doctors should be patient with their patients",
            "items" => array(
                "0"=>array("item"=>"Doctors"),
                "1"=>array("item"=>"should"),
                "2"=>array("item"=>"be patient with"),
                "3"=>array("item"=>"their patients."),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7gsf.mp3',
                    "timeRange"     =>"00:00-00:04",
                    "text" => "Doctors should be patient with their patients.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7gsf.mp3',
                    "timeRange"     =>"00:00-00:04",
                    "text" => "Doctors should be patient with their patients.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"2",
            "content_id"=>1242,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"sr_ordering",
            "timeRange"     =>"00:04-00:08",
            "scores"=>1,
            "text" => "It was dark so he lit up the road with a flash light.",
            "answer" => "It was dark so he lit up the road with a flash light",
            "items" => array(
                "0"=>array("item"=>"It was dark"),
                "1"=>array("item"=>"so he lit up"),
                "2"=>array("item"=>"the road"),
                "3"=>array("item"=>"with a flash light."),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7gsf.mp3',
                    "timeRange"     =>"00:04-00:08",
                    "text" => "It was dark so he lit up the road with a flash light.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7gsf.mp3',
                    "timeRange"     =>"00:04-00:08",
                    "text" => "It was dark so he lit up the road with a flash light.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"3",
            "content_id"=>1243,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"sr_ordering",
            "timeRange"     =>"00:08-00:12",
            "scores"=>1,
            "text" => "Cherish the present, for every day is a present.",
            "answer" => "Cherish the present, for every day is a present",
            "items" => array(
                "0"=>array("item"=>"Cherish"),
                "1"=>array("item"=>"the present,"),
                "2"=>array("item"=>"for every day is"),
                "3"=>array("item"=>"a present."),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7gsf.mp3',
                    "timeRange"     =>"00:08-00:12",
                    "text" => "Cherish the present, for every day is a present.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7gsf.mp3',
                    "timeRange"     =>"00:08-00:12",
                    "text" => "Cherish the present, for every day is a present.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"4",
            "content_id"=>1244,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"sr_ordering",
            "timeRange"     =>"00:12-00:16",
            "scores"=>1,
            "text" => "At present, learning English is a must.",
            "answer" => "At present, learning English is a must",
            "items" => array(
                "0"=>array("item"=>"At present"),
                "1"=>array("item"=>"learning English is"),
                "2"=>array("item"=>"a must."),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7gsf.mp3',
                    "timeRange"     =>"00:12-00:16",
                    "text" => "At present, learning English is a must.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7gsf.mp3',
                    "timeRange"     =>"00:12-00:16",
                    "text" => "At present, learning English is a must.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"5",
            "content_id"=>1245,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"sr_ordering",
            "timeRange"     =>"00:16-00:19",
            "scores"=>1,
            "text" => "Let it cool off before you eat it.",
            "answer" => "Let it cool off before you eat it",
            "items" => array(
                "0"=>array("item"=>"Let it"),
                "1"=>array("item"=>"cool off"),
                "2"=>array("item"=>"before"),
                "3"=>array("item"=>"you eat it."),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7gsf.mp3',
                    "timeRange"     =>"00:16-00:19",
                    "text" => "Let it cool off before you eat it.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7gsf.mp3',
                    "timeRange"     =>"00:16-00:19",
                    "text" => "Let it cool off before you eat it.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"6",
            "content_id"=>1246,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"sr_ordering",
            "timeRange"     =>"00:19-00:23",
            "scores"=>1,
            "text" => "Your garden may have been covered with fallen leaves.",
            "answer" => "Your garden may have been covered with fallen leaves",
            "items" => array(
                "0"=>array("item"=>"Your garden"),
                "1"=>array("item"=>"may have been"),
                "2"=>array("item"=>"covered with"),
                "3"=>array("item"=>"fallen leaves."),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7gsf.mp3',
                    "timeRange"     =>"00:19-00:23",
                    "text" => "Your garden may have been covered with fallen leaves.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7gsf.mp3',
                    "timeRange"     =>"00:19-00:23",
                    "text" => "Your garden may have been covered with fallen leaves.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"7",
            "content_id"=>1247,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"sr_ordering",
            "timeRange"     =>"00:23-00:26",
            "scores"=>1,
            "text" => "Don't judge a man by his appearance. ",
            "answer" => "Don't judge a man by his appearance",
            "items" => array(
                "0"=>array("item"=>"Don't judge"),
                "1"=>array("item"=>"a man"),
                "2"=>array("item"=>"by his appearance."),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7gsf.mp3',
                    "timeRange"     =>"00:23-00:26",
                    "text" => "Don't judge a man by his appearance.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7gsf.mp3',
                    "timeRange"     =>"00:23-00:26",
                    "text" => "Don't judge a man by his appearance.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"8",
            "content_id"=>1248,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"sr_ordering",
            "timeRange"     =>"00:26-00:29",
            "scores"=>1,
            "text" => "I haven't scheduled the coming week yet.",
            "answer" => "I haven't scheduled the coming week yet",
            "items" => array(
                "0"=>array("item"=>"I haven't scheduled"),
                "1"=>array("item"=>"the coming week"),
                "2"=>array("item"=>"yet."),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7gsf.mp3',
                    "timeRange"     =>"00:26-00:29",
                    "text" => "I haven't scheduled the coming week yet.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7gsf.mp3',
                    "timeRange"     =>"00:26-00:29",
                    "text" => "I haven't scheduled the coming week yet.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"9",
            "content_id"=>1249,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"sr_ordering",
            "timeRange"     =>"00:29-00:32",
            "scores"=>1,
            "text" => "Where there's a will, there's a way.",
            "answer" => "Where there's a will, there's a way",
            "items" => array(
                "0"=>array("item"=>"Where"),
                "1"=>array("item"=>"there's a will,"),
                "2"=>array("item"=>"there's a way."),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7gsf.mp3',
                    "timeRange"     =>"00:29-00:32",
                    "text" => "Where there's a will, there's a way.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7gsf.mp3',
                    "timeRange"     =>"00:29-00:32",
                    "text" => "Where there's a will, there's a way.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"10",
            "content_id"=>1250,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"sr_ordering",
            "timeRange"     =>"00:32-00:35",
            "scores"=>1,
            "text" => "I'm glad that you are over the flu.",
            "answer" => "I'm glad that you are over the flu",
            "items" => array(
                "0"=>array("item"=>"I'm glad that"),
                "1"=>array("item"=>"you are"),
                "2"=>array("item"=>"over the flu."),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7gsf.mp3',
                    "timeRange"     =>"00:32-00:35",
                    "text" => "I'm glad that you are over the flu.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7gsf.mp3',
                    "timeRange"     =>"00:32-00:35",
                    "text" => "I'm glad that you are over the flu.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

         $this->saveEventListToDatabases($data);$a =  json_encode($data);
        $fp = fopen('json158.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
        return;
    }

    //最新MT
    public function getPart159(){
        $data = array(
            "unit_id"       =>7,
            "lesson_id"     =>42,
            "part_id"       =>159,
            "media_filename"      =>'',
            "content_totalcount"  => 6,
            "content_perpage"     => 3,
            "content_perPageCount"=>1,
            "media_type"    =>'audio',
            "totalTime"     =>"4:54",
            "have_questions"=>true,
            "questions_type"=>"text",
            "part_type"     =>"questions",
            "selectItems"   =>array(
                1=>array(1,2,3,4),
                2=>array(1,2,3,5),
                3=>array(1,3,4,5)
            ),
            "keywords"   =>array(
            ),
        );

        $data['events'][] = array(
            "num"=>"1",
            "type"=>"MTmultipleChoices",
            "media_type"=>"audio",
            "media_filename"=>'media/u7p_original_mt.mp3',
            "timeRange"=>"01:14-01:28",
            "content"=>"After dinner, her father washes the dishes, and her mother cleans the kitchen. Lucy is mainly responsible for tidying up her own room. She is also responsible for sweeping the yard once a week on weekends.",
            "text"=>"After dinner, her father washes the dishes, and her mother cleans the kitchen. Lucy is mainly responsible for tidying up her own room. She is also responsible for sweeping the yard once a week on weekends.",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"1",
                    "content_id"=>1251,
                    "type"=>"multipleChoice",
                    "text"=>array("type"=>"text","text"=>"What is Lucy responsible for doing at home?"),
                    "scores"=>5,
                    "items"=>array(
                        "0"=>array("item"=>"Tidying up her own room.","isCorrect"=>false),
                        "1"=>array("item"=>"Sweeping the yard.", "isCorrect"=>false),
                        "2"=>array("item"=>"All of the above.", "isCorrect"=>true),
                    ),
                    "selectEvents"=>array(
                    ),
                ),
                1=>array(
                    "num"=>"2",
                    "content_id"=>1252,
                    "type"=>"multipleChoice",
                    "text"=>array("type"=>"text","text"=>"From the sentences you just heard, what do you think of Lucy?"),
                    "scores"=>5,
                    "items"=>array(
                        "0"=>array("item"=>"Lucy is a lazy girl.","isCorrect"=>false),
                        "1"=>array("item"=>"Lucy is a diligent girl.", "isCorrect"=>true),
                        "2"=>array("item"=>"Lucy is a funny girl.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                    ),
                )
            ),
            "picture"=>"images/type_listen_001.png"
        );

        $data['events'][] = array(
            "num"=>"2",
            "type"=>"MTmultipleChoices",
            "media_type"=>"audio",
            "media_filename"=>'media/u7p_original_mt.mp3',
            "timeRange"=>"01:28-01:44",
            "content"=>"In order for Lucy to have a quiet environment to study, her parents usually watch TV in their bedroom. Lucy's high school ranks Number 1 in the city and she has tons of homework to do. She has to do a lot of reading in English and Chinese.",
            "text"=>"In order for Lucy to have a quiet environment to study, her parents usually watch TV in their bedroom. Lucy's high school ranks Number 1 in the city and she has tons of homework to do. She has to do a lot of reading in English and Chinese.",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"1",
                    "content_id"=>1253,
                    "type"=>"multipleChoice",
                    "text"=>array("type"=>"text","text"=>"Why do Lucy's parents usually watch TV in their bedroom?"),
                    "scores"=>5,
                    "items"=>array(
                        "0"=>array("item"=>"Because they want to give Lucy a quiet environment to study.","isCorrect"=>true),
                        "1"=>array("item"=>"Because they want a quiet place to relax.", "isCorrect"=>false),
                        "2"=>array("item"=>"Because they want to give Lucy a quiet environment to play piano.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                    ),
                ),
                1=>array(
                    "num"=>"2",
                    "content_id"=>1254,
                    "type"=>"multipleChoice",
                    "text"=>array("type"=>"text","text"=>"What is Lucy's high school like in the city?"),
                    "scores"=>5,
                    "items"=>array(
                        "0"=>array("item"=>"It's the best in the city.","isCorrect"=>true),
                        "1"=>array("item"=>"It's not so good.", "isCorrect"=>false),
                        "2"=>array("item"=>"It's the worst in the city.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                    ),
                )
            ),
            "picture"=>"images/type_listen_001.png"
        );

        $data['events'][] = array(
            "num"=>"3",
            "type"=>"MTmultipleChoices",
            "media_type"=>"audio",
            "media_filename"=>'media/u7p_original_mt.mp3',
            "timeRange"=>"00:53-01:07",
            "content"=>"It is only during the weekend that Lucy can find the time to enjoy music or go on outings with her family. But she still thinks all the effort she puts in at school will pay off in the end. ",
            "text"=>"It is only during the weekend that Lucy can find the time to enjoy music or go on outings with her family. But she still thinks all the effort she puts in at school will pay off in the end.",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"1",
                    "content_id"=>1255,
                    "type"=>"multipleChoice",
                    "text"=>array("type"=>"text","text"=>"What does Lucy think of the efforts she has made at school?"),
                    "scores"=>5,
                    "items"=>array(
                        "0"=>array("item"=>"She will succeed in the end.","isCorrect"=>true),
                        "1"=>array("item"=>"She will get nothing from it.", "isCorrect"=>false),
                        "2"=>array("item"=>"She will pay for it in the end.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                    ),
                )
            ),
            "picture"=>"images/type_listen_001.png"
        );
        $data['events'][] = array(
            "num"=>"4",
            "type"=>"MTmultipleChoices",
            "media_type"=>"audio",
            "media_filename"=>'media/u7d_original_mt.mp3',
            "timeRange"=>"00:53-01:07",
            "content"=>"Lucy: How many classes did you have each day?Joe: Well, last semester, I had 7 classes altogether. One class was actually in the workshop, where we learned how to assemble computers from parts.",
            "text"=>"Lucy: How many classes did you have each day?Joe: Well, last semester, I had 7 classes altogether. One class was actually in the workshop, where we learned how to assemble computers from parts.",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"1",
                    "content_id"=>1256,
                    "type"=>"multipleChoice",
                    "text"=>array("type"=>"text","text"=>"How many classes did Joe have each day last semester?"),
                    "scores"=>5,
                    "items"=>array(
                        "0"=>array("item"=>"7 classes.","isCorrect"=>true),
                        "1"=>array("item"=>"8 classes.", "isCorrect"=>false),
                        "2"=>array("item"=>"9 classes.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                    ),
                ),
                1=>array(
                    "num"=>"2",
                    "content_id"=>1257,
                    "type"=>"multipleChoice",
                    "text"=>array("type"=>"text","text"=>"What class might Joe have had in the workshop?"),
                    "scores"=>5,
                    "items"=>array(
                        "0"=>array("item"=>"Software programming.","isCorrect"=>false),
                        "1"=>array("item"=>"Computer repair.", "isCorrect"=>true),
                        "2"=>array("item"=>"Computer game design.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                    ),
                )
            ),
            "picture"=>"images/type_listen_001.png"
        );
        $data['events'][] = array(
            "num"=>"5",
            "type"=>"MTmultipleChoices",
            "media_type"=>"audio",
            "media_filename"=>'media/u7d_original_mt.mp3',
            "timeRange"=>"01:28-01:40",
            "content"=>"Lucy: What did you usually do after class?Joe: I did a lot of sports at the school gym. But in the evening, I often spent at least two hours reading up on program writing.",
            "text"=>"Lucy: What did you usually do after class?Joe: I did a lot of sports at the school gym. But in the evening, I often spent at least two hours reading up on program writing.",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"1",
                    "content_id"=>1258,
                    "type"=>"multipleChoice",
                    "text"=>array("type"=>"text","text"=>"What did Joe do in the evening?"),
                    "scores"=>5,
                    "items"=>array(
                        "0"=>array("item"=>"Reading up on program writing.","isCorrect"=>true),
                        "1"=>array("item"=>"Playing computer games.", "isCorrect"=>false),
                        "2"=>array("item"=>"Studying mathematics.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                    ),
                ),
                1=>array(
                    "num"=>"2",
                    "content_id"=>1259,
                    "type"=>"multipleChoice",
                    "text"=>array("type"=>"text","text"=>"Why did Joe often spend a lot of time in the evening reading up on program writing?"),
                    "scores"=>5,
                    "items"=>array(
                        "0"=>array("item"=>"He was interested in writing programs.","isCorrect"=>true),
                        "1"=>array("item"=>"He didn't like computer repair.", "isCorrect"=>false),
                        "2"=>array("item"=>"He isn't interested in hardware any more.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                    ),
                )
            ),
            "picture"=>"images/type_listen_001.png"
        );


         $this->saveEventListToDatabases($data);$a =  json_encode($data);
        $fp = fopen('json159.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
        return;
    }

    public function getPart160(){
        $data = array(
            "unit_id"       =>7,
            "lesson_id"     =>42,
            "part_id"       =>160,
            "media_filename"=>'',
            "content_totalcount"  => 10,
            "content_perpage"     => 8,
            "content_perPageCount"=>1,
            "media_type"    =>'audio',
            "totalTime"     =>"4:54",
            "part_type"     =>"questions",
            "have_questions"=>true,
            "questions_type"=>"text",
            "selectItems"   =>array(
                1=>array(1,3,5,7,9),
                2=>array(2,4,6,8,10),
            ),
            "keywords"      =>array(
            ),
        );

        $data['events'][] = array(
            "num"=>"1",
            "content_id"=>1260,
            "type"=>"MTmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u7p_original_mt.mp3',
            "timeRange"=>"00:00-00:10",
            "content"=>"Lucy Daniel is a high school student. She is going to take the SAT in two years. During the week, she usually gets up at around 6 o'clock.",
            "text"=>array("type"=>"audio","text"=>"When is Lucy going to take the SAT?","media_filename"=>'media/u7pcq.mp3',"timeRange"=>"00:00-00:04"),
            "scores"=>7,
            "items"=>array(
                "0"=>array("item"=>"In two years.","isCorrect"=>true),
                "1"=>array("item"=>"In two and a half years.", "isCorrect"=>false),
                "2"=>array("item"=>"In two months.","isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_listen_001.png"
        );

        $data['events'][] = array(
            "num"=>"2",
            "content_id"=>1261,
            "type"=>"MTmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u7p_original_mt.mp3',
            "timeRange"=>"00:10-00:19",
            "content"=>"Her mother, Jane, prepares breakfast for the family. She is a great cook. Lucy has her breakfast at around 6:30.",
            "text"=>array("type"=>"audio","text"=>"Who prepares breakfast for the family?","media_filename"=>'media/u7pcq.mp3',"timeRange"=>"00:07-00:11"),
            "scores"=>7,
            "items"=>array(
                "0"=>array("item"=>"Lucy.","isCorrect"=>false),
                "1"=>array("item"=>"Jane.", "isCorrect"=>true),
                "2"=>array("item"=>"July.", "isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_listen_001.png"
        );

        $data['events'][] = array(
            "num"=>"3",
            "content_id"=>1262,
            "type"=>"MTmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u7p_original_mt.mp3',
            "timeRange"=>"00:29-00:44",
            "content"=>"She has a total of 8 classes every day. This semester, she has mathematics, English, and Chinese classes in the mornings. In the afternoons, she has physics, chemistry and other classes. ",
            "text"=>array("type"=>"audio","text"=>"How many classes does Lucy have every day?","media_filename"=>'media/u7pcq.mp3',"timeRange"=>"00:22-00:26"),
            "scores"=>7,
            "items"=>array(
                "0"=>array("item"=>"8 classes.","isCorrect"=>true),
                "1"=>array("item"=>"9 classes.", "isCorrect"=>false),
                "2"=>array("item"=>"7 classes.", "isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_listen_001.png"
        );

        $data['events'][] = array(
            "num"=>"4",
            "content_id"=>1263,
            "type"=>"MTmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u7p_original_mt.mp3',
            "timeRange"=>"00:53-01:03",
            "content"=>"She usually gets home at around 4:30 pm. On Fridays, she often plays volleyball with her classmates for about half an hour before she goes home.",
            "text"=>array("type"=>"audio","text"=>"Why does Lucy not go home immediately after school on Friday?","media_filename"=>'media/u7pcq.mp3',"timeRange"=>"00:42-00:48"),
            "scores"=>7,
            "items"=>array(
                "0"=>array("item"=>"To do homework at school.","isCorrect"=>false),
                "1"=>array("item"=>"To play volleyball with her classmates.", "isCorrect"=>true),
                "2"=>array("item"=>"To play basketball with her classmates.", "isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_listen_001.png"
        );


        $data['events'][] = array(
            "num"=>"5",
            "content_id"=>1264,
            "type"=>"MTmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u7p_original_mt.mp3',
            "timeRange"=>"01:03-01:14",
            "content"=>"After arriving at home, Lucy usually studies for about an hour before she has dinner with her parents and her sister Betty. Betty is 8 years older than she is. ",
            "text"=>array("type"=>"audio","text"=>"Who does Lucy have dinner with at home after school?","media_filename"=>'media/u7pcq.mp3',"timeRange"=>"00:48-00:52"),
            "scores"=>7,
            "items"=>array(
                "0"=>array("item"=>"Her parents.","isCorrect"=>false),
                "1"=>array("item"=>"With her sister.", "isCorrect"=>false),
                "2"=>array("item"=>"All of the above.", "isCorrect"=>true),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_listen_001.png"
        );

        $data['events'][] = array(
            "num"=>"6",
            "content_id"=>1265,
            "type"=>"MTmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u7d_original_mt.mp3',
            "timeRange"=>"00:00-00:09",
            "content"=>"Lucy is now spending her summer vacation at Joe's home. Joe is her cousin, who is now studying at a vocational school in Germany.",
            "text"=>array("type"=>"audio","text"=>"How big is the bed?","media_filename"=>'media/u7dcq.mp3',"timeRange"=>"00:00-00:03"),
            "scores"=>7,
            "items"=>array(
                "0"=>array("item"=>"At a high school in Germany.","isCorrect"=>false),
                "1"=>array("item"=>"At a vocational school in France.", "isCorrect"=>false),
                "2"=>array("item"=>"At a vocational school in Germany.", "isCorrect"=>true),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_listen_001.png"
        );

        $data['events'][] = array(
            "num"=>"7",
            "content_id"=>1266,
            "type"=>"MTmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u7d_original_mt.mp3',
            "timeRange"=>"00:09-00:22",
            "content"=>"Lucy: Joe, tell me something about your last semester at Vocational School. I am really curious about your school life.Joe: Well, I really think I've made the right decision. I like it.",
            "text"=>array("type"=>"audio","text"=>"How does Lucy feel about Joe's school life?","media_filename"=>'media/u7dcq.mp3',"timeRange"=>"00:09-00:13"),
            "scores"=>7,
            "items"=>array(
                "0"=>array("item"=>"She is curious.","isCorrect"=>true),
                "1"=>array("item"=>"She is serious.", "isCorrect"=>false),
                "2"=>array("item"=>"She is anxious.", "isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_listen_001.png"
        );

        $data['events'][] = array(
            "num"=>"8",
            "content_id"=>1267,
            "type"=>"MTmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u7d_original_mt.mp3',
            "timeRange"=>"00:22-00:38",
            "content"=>"Lucy: Is your school far away?Joe: Yes, the school is about 15 miles out of town in the suburbs. So I usually stay at school during the week. Last semester, I stayed with another boy, Tom, in the school dormitory.",
            "text"=>array("type"=>"audio","text"=>"Why doesn't Joe go home after school every day?","media_filename"=>'media/u7dcq.mp3',"timeRange"=>"00:28-00:32"),
            "scores"=>7,
            "items"=>array(
                "0"=>array("item"=>"His school is far away.","isCorrect"=>true),
                "1"=>array("item"=>"He likes to stay at school.", "isCorrect"=>false),
                "2"=>array("item"=>"He only wants to stay in the  dormitory.", "isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_listen_001.png"
        );

        $data['events'][] = array(
            "num"=>"9",
            "content_id"=>1268,
            "type"=>"MTmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u7d_original_mt.mp3',
            "timeRange"=>"01:07-01:15",
            "content"=>"Lucy: Did you often take a nap after lunch?Joe: Of course not. I usually played computer games after lunch.",
            "text"=>array("type"=>"audio","text"=>"What did Joe usually do after lunch?","media_filename"=>'media/u7dcq.mp3',"timeRange"=>"02:05-02:09"),
            "scores"=>7,
            "items"=>array(
                "0"=>array("item"=>"Take a nap.","isCorrect"=>false),
                "1"=>array("item"=>"Play computer games.", "isCorrect"=>true),
                "2"=>array("item"=>"Study.", "isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_listen_001.png"
        );

        $data['events'][] = array(
            "num"=>"10",
            "content_id"=>1269,
            "type"=>"MTmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u7d_original_mt.mp3',
            "timeRange"=>"01:40-01:52",
            "content"=>"Lucy: Did you go to bed late?Joe: Sometimes very late, at about 12:30. But most of the time, I went to bed at 10.Lucy: That's much better than me.",
            "text"=>array("type"=>"audio","text"=>"Which statement is true?","media_filename"=>'media/u7dcq.mp3',"timeRange"=>"03:12-03:15"),
            "scores"=>7,
            "items"=>array(
                "0"=>array("item"=>"Joe usually went to bed at 10.","isCorrect"=>true),
                "1"=>array("item"=>"Lucy seldom went bed late.", "isCorrect"=>false),
                "2"=>array("item"=>"Joe never went to bed late.", "isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_listen_001.png"
        );


         $this->saveEventListToDatabases($data);$a =  json_encode($data);
        $fp = fopen('json160.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
        return;
    }

    public function getPart161(){
        $data = array(
            "unit_id"       =>7,
            "lesson_id"     =>42,
            "part_id"       =>161,
            "media_filename"=>'',
            "content_totalcount"  => 6,
            "content_perpage"     => 5,
            "content_perPageCount"=>1,
            "media_type"    =>'audio',
            "totalTime"     =>"4:54",
            "part_type"     =>"questions",
            "have_questions"=>true,
            "questions_type"=>"sr",
            "keywords"      =>array(
            ),
        );

        $data['events'][] = array(
            "num"=>"1",
            "content_id"=>1270,
            "type"=>"SRmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u7p_original_mt.mp3',
            "timeRange"=>"00:19-00:29",
            "content"=>"Her school is not far from where she lives. It takes her about 20 minutes to get to school. She usually arrives at school at around 7:15.",
            "text"=>array("type"=>"audio","text"=>"How long does it take Lucy to get to school?","media_filename"=>'media/u7pcq.mp3',"timeRange"=>"00:14-00:18"),
            "scores"=>4,
            "items"=>array(
                "0"=>array("item"=>"About 20 minutes.","answer"=>"About 20 minutes","isCorrect"=>true),
                "1"=>array("item"=>"About 10 minutes.","answer"=>"About 10 minutes", "isCorrect"=>false),
                "2"=>array("item"=>"About 15 minutes.","answer"=>"About 15 minutes", "isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"2",
            "content_id"=>1271,
            "type"=>"SRmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u7p_original_mt.mp3',
            "timeRange"=>"00:44-00:53",
            "content"=>"Sometimes, she has lunch at a fast food restaurant near the school. Sometimes she has her lunch in the school cafeteria. ",
            "text"=>array("type"=>"audio","text"=>"Besides at a fast food restaurant near the school, where else does Lucy have lunch?","media_filename"=>'media/u7pcq.mp3',"timeRange"=>"00:36-00:42"),
            "scores"=>4,
            "items"=>array(
                "0"=>array("item"=>"In the school cafeteria.","answer"=>"In the school cafeteria","isCorrect"=>true),
                "1"=>array("item"=>"At home.", "answer"=>"At home","isCorrect"=>false),
                "2"=>array("item"=>"In the café.", "answer"=>"In the café","isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"3",
            "content_id"=>1272,
            "type"=>"SRmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u7p_original_mt.mp3',
            "timeRange"=>"01:44-01:52",
            "content"=>"Her favorite school subjects are physics and mathematics. Her dream is to become a scientist like Newton. ",
            "text"=>array("type"=>"audio","text"=>"What is Lucy's favorite school subject?","media_filename"=>'media/u7pcq.mp3',"timeRange"=>"01:14-01:17"),
            "scores"=>4,
            "items"=>array(
                "0"=>array("item"=>"Physics.","answer"=>"Physics","isCorrect"=>false),
                "1"=>array("item"=>"Mathematics.", "answer"=>"Mathematics","isCorrect"=>false),
                "2"=>array("item"=>"All of the above.", "answer"=>"All of the above","isCorrect"=>true),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"4",
            "content_id"=>1273,
            "type"=>"SRmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u7d_original_mt.mp3',
            "timeRange"=>"00:38-00:53",
            "content"=>"Lucy: Did you have a mini fridge in the room?Joe: Yes, we had a mini fridge where we stored some breads, butter, drinks and fruits. We also had a microwave oven to warm up simple food. We usually ate a simple breakfast from the fridge.",
            "text"=>array("type"=>"audio","text"=>"What did the two boys store in the mini fridge?","media_filename"=>'media/u7dcq.mp3',"timeRange"=>"01:14-01:18"),
            "scores"=>4,
            "items"=>array(
                "0"=>array("item"=>"Some breads, butter, drinks and fruits.","answer"=>"Some breads butter drinks and fruits","isCorrect"=>true),
                "1"=>array("item"=>"Some breads, butter, mutton and pork.","answer"=>"Some breads butter mutton and pork", "isCorrect"=>false),
                "2"=>array("item"=>"Some wine and beer, drinks and fruits.","answer"=>"Some wine and beer drinks and fruits", "isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"5",
            "content_id"=>1274,
            "type"=>"SRmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u7d_original_mt.mp3',
            "timeRange"=>"01:15-01:28",
            "content"=>"Lucy: You are studying computer repairing, aren't you?Joe: Yes, but right now, I am learning about hardware, such as how to change parts, the hard drive, the disc and so on. ",
            "text"=>array("type"=>"audio","text"=>"What is Joe learning about now?","media_filename"=>'media/u7dcq.mp3',"timeRange"=>"02:13-02:16"),
            "scores"=>4,
            "items"=>array(
                "0"=>array("item"=>"Hardware.","answer"=>"Hardware","isCorrect"=>true),
                "1"=>array("item"=>"Software.","answer"=>"Software", "isCorrect"=>false),
                "2"=>array("item"=>"Programs.","answer"=>"Programs", "isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_speak_001.png"
        );

         $this->saveEventListToDatabases($data);$a =  json_encode($data);
        $fp = fopen('json161.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
        return;
    }

    public function getPart162(){
        $data = array(
            "unit_id"       =>7,
            "lesson_id"     =>42,
            "part_id"       =>162,
            "media_filename"=>'',
            "content_totalcount"  =>6,
            "content_perpage"     => 3,
            "content_perPageCount"=>1,
            "have_questions"=>true,
            "questions_type"=>"sr",
            "media_type"    =>'audio',
            "totalTime"     =>"4:54",
            "part_type"     =>"questions",
            "keywords"      =>array(
            ),
        );
        $data['events'][] = array(
            "num"=>"1",
            "content_id"=>1275,
            "media_filename"=>'media/u7gfi.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"00:00-00:05",
            "scores"=>5,
            "text" => "You can not be pleased with anything when you are not pleased with yourself.",
            "answer" => "You can not be pleased with anything when you are not pleased with yourself",
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"2",
            "content_id"=>1276,
            "media_filename"=>'media/u7gfi.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"00:20-00:25",
            "scores"=>5,
            "text" => "The director avoided giving a direct answer to the sharp question.",
            "answer" => "The director avoided giving a direct answer to the sharp question",
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"3",
            "content_id"=>1277,
            "media_filename"=>'media/u7gso.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"00:00-00:06",
            "scores"=>5,
            "text" => "Although he is old, he still breaks bad habits and forms good habits.",
            "answer" => "Although he is old he still breaks bad habits and forms good habits",
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"4",
            "content_id"=>1278,
            "media_filename"=>'media/u7gso.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"00:18-00:22",
            "scores"=>5,
            "text"   => "The rest of the group shouldered the heavy bags and set off. ",
            "answer" => "The rest of the group shouldered the heavy bags and set off",
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"5",
            "content_id"=>1279,
            "media_filename"=>'media/u7gsf.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"00:00-00:04",
            "scores"=>5,
            "text" => "Doctors should be patient with their patients.",
            "answer" => "Doctors should be patient with their patients",
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"6",
            "content_id"=>1280,
            "media_filename"=>'media/u7gsf.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"00:08-00:12",
            "scores"=>5,
            "text" => "Cherish the present, for every day is a present.",
            "answer" => "Cherish the present for every day is a present",
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_speak_001.png"
        );

         $this->saveEventListToDatabases($data);$a =  json_encode($data);
        $fp = fopen('json162.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
        return;
    }

    public function createJson(){
        for($i=146;$i<=162;$i++){
            $function = "getPart".$i;
            $this->$function();
        }
    }


}
