<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lessonparteight extends CI_Controller {

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
    public function getPart206(){
        $data = array(
            "unit_id"       =>8,
            "lesson_id"     =>43,
            "part_id"       =>206,
            "media_filename"=>'media/u8p.mp3',
            "media_type"    =>'audio',
            "totalTime"     =>"2:08",
            "part_type"     =>"listening",
            "have_questions"=>false,
            "questions_type"=>"text",
            "keywords"      =>array(
                "experience",
                "graduate",
                "major",
                "consumer",
                "in addition to",
                "thesis",
                "internship",
                "behavior",
                "related",
                "convenient",
                "occasionally",
                "colleague",
                "research institution",
                "smartly",
                "yogurt",
                "be satisfied with"
            ),
        );
        $data['events'][] = array(
            "num"=>"2",
            'type'=>"text",
            "timeRange"=>"00:00-00:10",
            "text"=>"Hello, this is Channel We. I'm Mr. V. In today's program we are going to know Lucy's sister, Betty.",
            "media_filename"=>'media/u8Mr_V.mp4',
            "media_type"    =>'video',
            "picture"=>"images/u7_p_001.jpg",
            "pictures"=>array()

        );
        $data['events'][] = array(
            "num"=>"3",
            'type'=>"text",
            "timeRange"=>"00:00-00:08",
            "displayKewords"=>true,
            "text"=>"Lucy's sister Betty got to experience a different kind of school life at a University in Europe several years ago.",
            "picture"=>"images/u8_p_001.jpg"
        );
        $data['events'][] = array(
            "num"=>"4",
            'type'=>"text",
            "timeRange"=>"00:08-00:13",
            "text"=>"She graduated last year with a Bachelor's degree in Science. ",
            "picture"=>"images/u8_p_001.jpg"
        );
        $data['events'][] = array(
            "num"=>"5",
            'type'=>"text",
            "timeRange"=>"00:13-00:17",
            "text"=>"It took her four years to complete the degree.",
            "picture"=>"images/u8_p_001.jpg"
        );
        $data['events'][] = array(
            "num"=>"6",
            'type'=>"text",
            "timeRange"=>"00:17-00:20",
            "text"=>"Betty majored in consumer science.",
            "picture"=>"images/u8_p_002.jpg"
        );
        $data['events'][] = array(
            "num"=>"7",
            'type'=>"text",
            "timeRange"=>"00:20-00:24",
            "text"=>"She went to university at the age of 17. ",
            "picture"=>"images/u8_p_002.jpg"
        );

        $data['events'][] = array(
            "num"=>"8",
            'type'=>"text",
            "timeRange"=>"00:24-00:32",
            "text"=>"She had a very easy life during the last semester because she only had three courses to take in addition to writing her thesis.",
            "picture"=>"images/u8_p_002.jpg"
        );

        $data['events'][] = array(
            "num"=>"9",
            'type'=>"text",
            "timeRange"=>"00:32-00:37",
            "text"=>"She only had lectures on Wednesday mornings and Thursday afternoons. ",
            "picture"=>"images/u8_p_002.jpg"
        );

        $data['events'][] = array(
            "num"=>"10",
            'type'=>"text",
            "timeRange"=>"00:37-00:41",
            "text"=>"Usually she didn't get up until after 8.",
            "picture"=>"images/u8_p_002.jpg"
        );

        $data['events'][] = array(
            "num"=>"11",
            'type'=>"text",
            "timeRange"=>"00:41-00:47",
            "text"=>"She had all her three meals at the school dining-hall because she stayed on the campus.",
            "picture"=>"images/u8_p_003.jpg"
        );

        $data['events'][] = array(
            "num"=>"12",
            'type'=>"text",
            "timeRange"=>"00:47-00:53",
            "text"=>"She would usually go swimming at the school gym at around 5 o'clock in the afternoon. ",
            "picture"=>"images/u8_p_004.jpg"
        );

        $data['events'][] = array(
            "num"=>"13",
            'type'=>"text",
            "timeRange"=>"00:53-00:57",
            "text"=>"During the last semester she did an internship.",
            "picture"=>"images/u7_p_004.jpg"
        );

        $data['events'][] = array(
            "num"=>"14",
            'type'=>"text",
            "timeRange"=>"00:57-01:01",
            "text"=>"She got a part-time job in a small company downtown.",
            "picture"=>"images/u8_p_005.jpg"
        );

        $data['events'][] = array(
            "num"=>"15",
            'type'=>"text",
            "timeRange"=>"01:01-01:06",
            "text"=>"She drove to work 3 days a week and worked 4 hours each time. ",
            "picture"=>"images/u8_p_005.jpg"
        );

        $data['events'][] = array(
            "num"=>"16",
            'type'=>"text",
            "timeRange"=>"01:06-01:09",
            "text"=>"She usually went to the company at 8. ",
            "picture"=>"images/u8_p_005.jpg"
        );

        $data['events'][] = array(
            "num"=>"17",
            'type'=>"text",
            "timeRange"=>"01:09-01:12",
            "text"=>"She worked as a research assistant.",
            "picture"=>"images/u8_p_005.jpg"
        );

        $data['events'][] = array(
            "num"=>"18",
            'type'=>"text",
            "timeRange"=>"01:12-01:17",
            "text"=>"She usually started her work by reading emails for her boss. ",
            "picture"=>"images/u8_p_005.jpg"
        );

        $data['events'][] = array(
            "num"=>"19",
            'type'=>"text",
            "timeRange"=>"01:17-01:20",
            "text"=>"She learned a lot from the internship.",
            "picture"=>"images/u8_p_005.jpg"
        );

        $data['events'][] = array(
            "num"=>"20",
            'type'=>"text",
            "timeRange"=>"01:20-01:25",
            "text"=>"Betty had to spend a lot of time in the library writing her thesis. ",
            "picture"=>"images/u8_p_006.jpg"
        );

        $data['events'][] = array(
            "num"=>"21",
            'type'=>"text",
            "timeRange"=>"01:25-01:29",
            "text"=>"Her topic was about consumer behaviors. ",
            "picture"=>"images/u8_p_006.jpg"
        );

        $data['events'][] = array(
            "num"=>"22",
            'type'=>"text",
            "timeRange"=>"01:29-01:35",
            "text"=>"In order to write the thesis, she had to search for related research papers and books. ",
            "picture"=>"images/u8_p_006.jpg"
        );

        $data['events'][] = array(
            "num"=>"23",
            'type'=>"text",
            "timeRange"=>"01:35-01:38",
            "text"=>"The library was large and comfortable.",
            "picture"=>"images/u8_p_006.jpg"
        );


        $data['events'][] = array(
            "num"=>"24",
            'type'=>"text",
            "timeRange"=>"01:38-01:41",
            "text"=>"It was open around the clock.",
            "picture"=>"images/u8_p_006.jpg"
        );

        $data['events'][] = array(
            "num"=>"25",
            'type'=>"text",
            "timeRange"=>"01:41-01:46",
            "text"=>"It was very convenient and she could go there any time she liked. ",
            "picture"=>"images/u8_p_006.jpg"
        );

        $data['events'][] = array(
            "num"=>"26",
            'type'=>"text",
            "timeRange"=>"01:46-01:50",
            "text"=>"She usually went to the library with some soft drinks and snacks.",
            "picture"=>"images/u8_p_006.jpg"
        );
        $data['events'][] = array(
            "num"=>"27",
            'type'=>"text",
            "timeRange"=>"01:50-01:53",
            "text"=>"She often worked there until very late.",
            "picture"=>"images/u8_p_006.jpg"
        );
        $data['events'][] = array(
            "num"=>"28",
            'type'=>"text",
            "timeRange"=>"01:53-01:58",
            "text"=>"During the weekends, she often went shopping or visited her friend Ada.",
            "picture"=>"images/u8_p_007.jpg"
        );
        $data['events'][] = array(
            "num"=>"29",
            'type'=>"text",
            "timeRange"=>"01:58-02:03",
            "text"=>"Ada came from South America and worked in a big company there.",
            "picture"=>"images/u8_p_007.jpg"
        );
        $data['events'][] = array(
            "num"=>"30",
            'type'=>"text",
            "timeRange"=>"02:03-02:08",
            "text"=>"Sometimes, they saw movies together or drove to different parks for picnics.",
            "picture"=>"images/u8_p_009.jpg"
        );

        $data['events'][] = array(
            "num"=>"31",
            'type'=>"text",
            "timeRange"=>"02:08-02:15",
            "text"=>"Occasionally, Betty would have parties with Ada and Ada's colleagues on Saturday evenings.",
            "picture"=>"images/u8_p_0010.jpg"
        );
        $data['events'][] = array(
            "num"=>"32",
            'type'=>"text",
            "timeRange"=>"02:15-02:20",
            "text"=>"Betty now works for a research institution as a researcher. ",
            "picture"=>"images/u8_p_011.jpg"
        );



        $data['events'][] = array(
            "num"=>"33",
            'type'=>"text",
            "timeRange"=>"02:20-02:23",
            "text"=>"She is much busier than before.",
            "picture"=>"images/u8_p_011.jpg"
        );

        $data['events'][] = array(
            "num"=>"34",
            'type'=>"text",
            "timeRange"=>"02:23-02:29",
            "text"=>"Since the institution is located far away, she has to get up before 7 each morning.",
            "picture"=>"images/u8_p_011.jpg"
        );

        $data['events'][] = array(
            "num"=>"35",
            'type'=>"text",
            "timeRange"=>"02:29-02:32",
            "text"=>"She has to dress up smartly.",
            "picture"=>"images/u8_p_011.jpg"
        );

        $data['events'][] = array(
            "num"=>"36",
            'type'=>"text",
            "timeRange"=>"02:32-02:35",
            "text"=>"She leaves home for work at 7:50.",
            "picture"=>"images/u8_p_011.jpg"
        );

        $data['events'][] = array(
            "num"=>"37",
            'type'=>"text",
            "timeRange"=>"02:35-02:41",
            "text"=>"She usually has a simple lunch at her office, two sandwiches and a bottle of yogurt.",
            "picture"=>"images/u8_p_011.jpg"
        );

        $data['events'][] = array(
            "num"=>"38",
            'type'=>"text",
            "timeRange"=>"02:41-02:44",
            "text"=>"She finishes work at 6 pm.",
            "picture"=>"images/u8_p_012.jpg"
        );

        $data['events'][] = array(
            "num"=>"39",
            'type'=>"text",
            "timeRange"=>"02:44-02:50",
            "text"=>"If it is necessary, she has to bring some work home and continues working on her computer. ",
            "picture"=>"images/u8_p_012.jpg"
        );

        $data['events'][] = array(
            "num"=>"40",
            'type'=>"text",
            "timeRange"=>"02:50-02:54",
            "text"=>"She never does any work on weekends.",
            "picture"=>"images/u8_p_013.jpg"
        );

        $data['events'][] = array(
            "num"=>"41",
            'type'=>"text",
            "timeRange"=>"02:54-02:59",
            "text"=>"As before, weekends are her time to enjoy herself.",
            "picture"=>"images/u8_p_013.jpg"
        );

        $data['events'][] = array(
            "num"=>"42",
            'type'=>"text",
            "timeRange"=>"02:59-03:03",
            "text"=>"She loves her work and is very satisfied with it.",
            "picture"=>"images/u8_p_013.jpg"
        );

         $this->saveEventListToDatabases($data);$a =  json_encode($data);
        $fp = fopen('json206.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
        return;

    }

    public function getPart207(){

        $data = array(
            "unit_id"       =>8,
            "lesson_id"     =>43,
            "part_id"       =>207,
            "media_filename"=>'media/u8p.mp3',
            "media_type"    =>'audio',
            "totalTime"     =>"2:08",
            "part_type"     =>"listening",
            "have_questions"=>false,
            "questions_type"=>"text",
            "keywords"      =>array(
                "experience",
                "graduate",
                "major",
                "consumer",
                "in addition to",
                "thesis",
                "internship",
                "behavior",
                "related",
                "convenient",
                "occasionally",
                "colleague",
                "research institution",
                "smartly",
                "yogurt",
                "be satisfied with"
            ),
        );
        $data['events'][] = array(
            "num"=>"2",
            'type'=>"text",
            "timeRange"=>"00:00-00:10",
            "text"=>"Hello, this is Channel We. I'm Mr. V. In today's program we are going to know Lucy's sister, Betty.",
            "media_filename"=>'media/u8Mr_V.mp4',
            "media_type"    =>'video',
            "picture"=>"images/u8_p_001.jpg",
            "pictures"=>array()

        );
        $data['events'][] = array(
            "num"=>"3",
            'type'=>"text",
            "timeRange"=>"00:00-00:08",
            "displayKewords"=>true,
            "text"=>"Lucy's sister Betty got to experience a different kind of school life at a University in Europe several years ago.",
            "picture"=>"images/u8_p_001.jpg"
        );
        $data['events'][] = array(
            "num"=>"4",
            'type'=>"text",
            "timeRange"=>"00:08-00:13",
            "text"=>"She graduated last year with a Bachelor's degree in Science. ",
            "picture"=>"images/u8_p_001.jpg"
        );
        $data['events'][] = array(
            "num"=>"5",
            'type'=>"text",
            "timeRange"=>"00:13-00:17",
            "text"=>"It took her four years to complete the degree.",
            "picture"=>"images/u8_p_001.jpg"
        );
        $data['events'][] = array(
            "num"=>"6",
            'type'=>"text",
            "timeRange"=>"00:17-00:20",
            "text"=>"Betty majored in consumer science.",
            "picture"=>"images/u8_p_002.jpg"
        );
        $data['events'][] = array(
            "num"=>"7",
            'type'=>"text",
            "timeRange"=>"00:20-00:24",
            "text"=>"She went to university at the age of 17. ",
            "picture"=>"images/u8_p_002.jpg"
        );

        $data['events'][] = array(
            "num"=>"8",
            'type'=>"text",
            "timeRange"=>"00:24-00:32",
            "text"=>"She had a very easy life during the last semester because she only had three courses to take in addition to writing her thesis.",
            "picture"=>"images/u8_p_002.jpg"
        );

        $data['events'][] = array(
            "num"=>"9",
            'type'=>"multipleChoices",
            "timeRange"=>"",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"10",
                    "content_id"=>1281,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8pcq.mp3',
                    "timeRange"=>"00:00-00:03",
                    "text"=>"Where did Betty earn her Bachelor's degree?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"In Europe.","isCorrect"=>true),
                        "1"=>array("item"=>"In America.", "isCorrect"=>false),
                        "2"=>array("item"=>"In China.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u8p.mp3',
                            "timeRange"=>"00:00-00:13",
                            "text"=>"Lucy's sister Betty got to experience a different kind of school life at a University in Europe several years ago. She graduated last year with a Bachelor's degree in Science."
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u8p.mp3',
                            "timeRange"=>"00:00-00:13",
                            "text"=>"Lucy's sister Betty got to experience a different kind of school life at a University in Europe several years ago. She graduated last year with a Bachelor's degree in Science."
                        ),
                    ),
                ),
                1=>array(
                    "num"=>"11",
                    "content_id"=>1282,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8pcq.mp3',
                    "timeRange"=>"00:03-00:06",
                    "text"=>"What is Betty's major?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Computer science.","isCorrect"=>false),
                        "1"=>array("item"=>"Consumer science.", "isCorrect"=>true),
                        "2"=>array("item"=>"Cognitive science.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u8p.mp3',
                            "timeRange"=>"00:17-00:20",
                            "text"=>"Betty majored in consumer science. ",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u8p.mp3',
                            "timeRange"=>"00:17-00:20",
                            "text"=>"Betty majored in consumer science. ",
                        ),
                    ),
                ),
                2=>array(
                    "num"=>"12",
                    "content_id"=>1283,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8pcq.mp3',
                    "timeRange"=>"00:06-00:09",
                    "text"=>"Did she have a hard time last semester?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Yes.","isCorrect"=>true),
                        "1"=>array("item"=>"No.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u8p.mp3',
                            "timeRange"=>"00:24-00:32",
                            "text"=>"She had a very easy life during the last semester because she only had three courses to take in addition to writing her thesis.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u8p.mp3',
                            "timeRange"=>"00:24-00:32",
                            "text"=>"She had a very easy life during the last semester because she only had three courses to take in addition to writing her thesis.",
                        ),
                    ),
                )
            )
        );


        $data['events'][] = array(
            "num"=>"13",
            'type'=>"text",
            "timeRange"=>"00:32-00:37",
            "text"=>"She only had lectures on Wednesday mornings and Thursday afternoons. ",
            "picture"=>"images/u8_p_002.jpg"
        );

        $data['events'][] = array(
            "num"=>"14",
            'type'=>"text",
            "timeRange"=>"00:37-00:41",
            "text"=>"Usually she didn't get up until after 8.",
            "picture"=>"images/u8_p_002.jpg"
        );

        $data['events'][] = array(
            "num"=>"15",
            'type'=>"text",
            "timeRange"=>"00:41-00:47",
            "text"=>"She had all her three meals at the school dining-hall because she stayed on the campus.",
            "picture"=>"images/u8_p_003.jpg"
        );

        $data['events'][] = array(
            "num"=>"16",
            'type'=>"text",
            "timeRange"=>"00:47-00:53",
            "text"=>"She would usually go swimming at the school gym at around 5 o'clock in the afternoon. ",
            "picture"=>"images/u8_p_004.jpg"
        );

        $data['events'][] = array(
            "num"=>"17",
            'type'=>"multipleChoices",
            "timeRange"=>"",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"18",
                    "content_id"=>1284,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8pcq.mp3',
                    "timeRange"=>"00:13-00:17",
                    "text"=>"When did she have lectures according to the passage?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Tuesday mornings.","isCorrect"=>false),
                        "1"=>array("item"=>"Thursday afternoons.", "isCorrect"=>true),
                        "2"=>array("item"=>"Friday afternoons.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u8p.mp3',
                            "timeRange"=>"00:32-00:37",
                            "text"=>"She only had lectures on Wednesday mornings and Thursday afternoons."
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u8p.mp3',
                            "timeRange"=>"00:32-00:37",
                            "text"=>"She only had lectures on Wednesday mornings and Thursday afternoons."
                        ),
                    ),
                ),
                1=>array(
                    "num"=>"19",
                    "content_id"=>1285,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8pcq.mp3',
                    "timeRange"=>"00:17-00:20",
                    "text"=>"When might she get up?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"At 8:30.","isCorrect"=>true),
                        "1"=>array("item"=>"At 7:00.", "isCorrect"=>false),
                        "2"=>array("item"=>"At 7:30.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u8p.mp3',
                            "timeRange"=>"00:37-00:41",
                            "text"=>"Betty majored in consumer science. ",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u8p.mp3',
                            "timeRange"=>"00:37-00:41",
                            "text"=>"Betty majored in consumer science. ",
                        ),
                    ),
                ),
                2=>array(
                    "num"=>"20",
                    "content_id"=>1286,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8pcq.mp3',
                    "timeRange"=>"00:20-00:23",
                    "text"=>"What did she usually do at the school gym?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Go swimming.","isCorrect"=>true),
                        "1"=>array("item"=>"Go jogging.", "isCorrect"=>false),
                        "2"=>array("item"=>"Go jogging.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u8p.mp3',
                            "timeRange"=>"000:47-00:53",
                            "text"=>"She would usually go swimming at the school gym at around 5 o'clock in the afternoon. ",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u8p.mp3',
                            "timeRange"=>"000:47-00:53",
                            "text"=>"She would usually go swimming at the school gym at around 5 o'clock in the afternoon. ",
                        ),
                    ),
                )
            )
        );


        $data['events'][] = array(
            "num"=>"21",
            'type'=>"text",
            "timeRange"=>"00:53-00:57",
            "text"=>"During the last semester she did an internship.",
            "picture"=>"images/u7_p_004.jpg"
        );

        $data['events'][] = array(
            "num"=>"22",
            'type'=>"text",
            "timeRange"=>"00:57-01:01",
            "text"=>"She got a part-time job in a small company downtown.",
            "picture"=>"images/u8_p_005.jpg"
        );

        $data['events'][] = array(
            "num"=>"23",
            'type'=>"text",
            "timeRange"=>"01:01-01:06",
            "text"=>"She drove to work 3 days a week and worked 4 hours each time. ",
            "picture"=>"images/u8_p_005.jpg"
        );

        $data['events'][] = array(
            "num"=>"24",
            'type'=>"text",
            "timeRange"=>"01:06-01:09",
            "text"=>"She usually went to the company at 8. ",
            "picture"=>"images/u8_p_005.jpg"
        );

        $data['events'][] = array(
            "num"=>"25",
            'type'=>"text",
            "timeRange"=>"01:09-01:12",
            "text"=>"She worked as a research assistant.",
            "picture"=>"images/u8_p_005.jpg"
        );

        $data['events'][] = array(
            "num"=>"26",
            'type'=>"text",
            "timeRange"=>"01:12-01:17",
            "text"=>"She usually started her work by reading emails for her boss. ",
            "picture"=>"images/u8_p_005.jpg"
        );

        $data['events'][] = array(
            "num"=>"27",
            'type'=>"text",
            "timeRange"=>"01:17-01:20",
            "text"=>"She learned a lot from the internship.",
            "picture"=>"images/u8_p_005.jpg"
        );

        $data['events'][] = array(
            "num"=>"28",
            'type'=>"multipleChoices",
            "timeRange"=>"",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"29",
                    "content_id"=>1287,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8pcq.mp3',
                    "timeRange"=>"00:23-00:28",
                    "text"=>"Did she work five days a week when she did her internship?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Yes","isCorrect"=>false),
                        "1"=>array("item"=>"No.", "isCorrect"=>true)
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u8p.mp3',
                            "timeRange"=>"01:01-01:06",
                            "text"=>"She drove to work 3 days a week and worked 4 hours each time."
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u8p.mp3',
                            "timeRange"=>"01:01-01:06",
                            "text"=>"She drove to work 3 days a week and worked 4 hours each time."
                        ),
                    ),
                ),
                1=>array(
                    "num"=>"30",
                    "content_id"=>1288,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8pcq.mp3',
                    "timeRange"=>"00:28-00:31",
                    "text"=>"What did she do during her internship?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"She worked as a research assistant.","isCorrect"=>true),
                        "1"=>array("item"=>"She worked as a researcher.", "isCorrect"=>false),
                        "2"=>array("item"=>"She worked as an administrative assistant.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u8p.mp3',
                            "timeRange"=>"01:09-01:12",
                            "text"=>"She worked as a research assistant.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u8p.mp3',
                            "timeRange"=>"01:09-01:12",
                            "text"=>"She worked as a research assistant.",
                        ),
                    ),
                ),
                2=>array(
                    "num"=>"31",
                    "content_id"=>1289,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8pcq.mp3',
                    "timeRange"=>"00:31-00:35",
                    "text"=>"How did she usually start her work?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"By reading emails for her boss.","isCorrect"=>true),
                        "1"=>array("item"=>"By reading news on line.", "isCorrect"=>false),
                        "2"=>array("item"=>"By replying  to her workmates emails.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u8p.mp3',
                            "timeRange"=>"01:09-01:17",
                            "text"=>"She worked as a research assistan. She usually started her work by reading emails for her boss.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u8p.mp3',
                            "timeRange"=>"01:09-01:17",
                            "text"=>"She worked as a research assistan. She usually started her work by reading emails for her boss.",
                        ),
                    ),
                )
            )
        );


        $data['events'][] = array(
            "num"=>"32",
            'type'=>"text",
            "timeRange"=>"01:20-01:25",
            "text"=>"Betty had to spend a lot of time in the library writing her thesis. ",
            "picture"=>"images/u8_p_006.jpg"
        );

        $data['events'][] = array(
            "num"=>"33",
            'type'=>"text",
            "timeRange"=>"01:25-01:29",
            "text"=>"Her topic was about consumer behaviors. ",
            "picture"=>"images/u8_p_006.jpg"
        );

        $data['events'][] = array(
            "num"=>"34",
            'type'=>"text",
            "timeRange"=>"01:29-01:35",
            "text"=>"In order to write the thesis, she had to search for related research papers and books. ",
            "picture"=>"images/u8_p_006.jpg"
        );

        $data['events'][] = array(
            "num"=>"35",
            'type'=>"text",
            "timeRange"=>"01:35-01:38",
            "text"=>"The library was large and comfortable.",
            "picture"=>"images/u8_p_006.jpg"
        );


        $data['events'][] = array(
            "num"=>"36",
            'type'=>"text",
            "timeRange"=>"01:38-01:41",
            "text"=>"It was open around the clock.",
            "picture"=>"images/u8_p_006.jpg"
        );

        $data['events'][] = array(
            "num"=>"37",
            'type'=>"text",
            "timeRange"=>"01:41-01:46",
            "text"=>"It was very convenient and she could go there any time she liked. ",
            "picture"=>"images/u8_p_006.jpg"
        );

        $data['events'][] = array(
            "num"=>"38",
            'type'=>"text",
            "timeRange"=>"01:46-01:50",
            "text"=>"She usually went to the library with some soft drinks and snacks.",
            "picture"=>"images/u8_p_006.jpg"
        );
        $data['events'][] = array(
            "num"=>"39",
            'type'=>"text",
            "timeRange"=>"01:50-01:53",
            "text"=>"She often worked there until very late.",
            "picture"=>"images/u8_p_006.jpg"
        );

        $data['events'][] = array(
            "num"=>"40",
            'type'=>"multipleChoices",
            "timeRange"=>"",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"41",
                    "content_id"=>1290,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8pcq.mp3',
                    "timeRange"=>"00:43-00:47",
                    "text"=>"Why did Betty spend so much time in the library?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"She wants to write her thesis.","isCorrect"=>true),
                        "1"=>array("item"=>"She likes to read.", "isCorrect"=>false),
                        "2"=>array("item"=>"She wants to use computers.", "isCorrect"=>false)
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u8p.mp3',
                            "timeRange"=>"01:20-01:25",
                            "text"=>"Betty had to spend a lot of time in the library writing her thesis."
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u8p.mp3',
                            "timeRange"=>"01:20-01:25",
                            "text"=>"Betty had to spend a lot of time in the library writing her thesis."
                        ),
                    ),
                ),
                1=>array(
                    "num"=>"42",
                    "content_id"=>1291,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8pcq.mp3',
                    "timeRange"=>"01:00-01:04",
                    "text"=>"Was the library open late at night?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Yes.","isCorrect"=>true),
                        "1"=>array("item"=>"No.", "isCorrect"=>false)
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u8p.mp3',
                            "timeRange"=>"01:35-01:41",
                            "text"=>"The library was large and comfortable. It was open around the clock.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u8p.mp3',
                            "timeRange"=>"01:35-01:41",
                            "text"=>"The library was large and comfortable. It was open around the clock.",
                        ),
                    ),
                ),
                2=>array(
                    "num"=>"43",
                    "content_id"=>1292,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8pcq.mp3',
                    "timeRange"=>"01:04-01:08",
                    "text"=>"Were food and drinks allowed to be brought into the library?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Yes.","isCorrect"=>true),
                        "1"=>array("item"=>"No.", "isCorrect"=>false)
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u8p.mp3',
                            "timeRange"=>"01:46-01:50",
                            "text"=>"She usually went to the library with some soft drinks and snacks.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u8p.mp3',
                            "timeRange"=>"01:46-01:50",
                            "text"=>"She usually went to the library with some soft drinks and snacks.",
                        ),
                    ),
                )
            )
        );

        $data['events'][] = array(
            "num"=>"44",
            'type'=>"text",
            "timeRange"=>"01:53-01:58",
            "text"=>"During the weekends, she often went shopping or visited her friend Ada.",
            "picture"=>"images/u8_p_007.jpg"
        );
        $data['events'][] = array(
            "num"=>"45",
            'type'=>"text",
            "timeRange"=>"01:58-02:03",
            "text"=>"Ada came from South America and worked in a big company there.",
            "picture"=>"images/u8_p_007.jpg"
        );
        $data['events'][] = array(
            "num"=>"46",
            'type'=>"text",
            "timeRange"=>"02:03-02:08",
            "text"=>"Sometimes, they saw movies together or drove to different parks for picnics.",
            "picture"=>"images/u8_p_009.jpg"
        );

        $data['events'][] = array(
            "num"=>"47",
            'type'=>"text",
            "timeRange"=>"02:08-02:15",
            "text"=>"Occasionally, Betty would have parties with Ada and Ada's colleagues on Saturday evenings.",
            "picture"=>"images/u8_p_0010.jpg"
        );
        $data['events'][] = array(
            "num"=>"48",
            'type'=>"text",
            "timeRange"=>"02:15-02:20",
            "text"=>"Betty now works for a research institution as a researcher. ",
            "picture"=>"images/u8_p_011.jpg"
        );


        $data['events'][] = array(
            "num"=>"49",
            'type'=>"text",
            "timeRange"=>"02:20-02:23",
            "text"=>"She is much busier than before.",
            "picture"=>"images/u8_p_011.jpg"
        );

        $data['events'][] = array(
            "num"=>"50",
            'type'=>"multipleChoices",
            "timeRange"=>"",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"51",
                    "content_id"=>1293,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8pcq.mp3',
                    "timeRange"=>"01:08-01:12",
                    "text"=>"Are Betty and Ada good friends?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Yes.","isCorrect"=>true),
                        "1"=>array("item"=>"No.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u8p.mp3',
                            "timeRange"=>"01:53-01:58",
                            "text"=>"During the weekends, she often went shopping or visited her friend Ada."
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u8p.mp3',
                            "timeRange"=>"01:53-01:58",
                            "text"=>"During the weekends, she often went shopping or visited her friend Ada."
                        ),
                    ),
                ),
                1=>array(
                    "num"=>"52",
                    "content_id"=>1294,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8pcq.mp3',
                    "timeRange"=>"01:00-01:04",
                    "text"=>"Was the library open late at night?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Yes.","isCorrect"=>true),
                        "1"=>array("item"=>"No.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u8p.mp3',
                            "timeRange"=>"02:15-02:20",
                            "text"=>"Betty now works for a research institution as a researcher.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u8p.mp3',
                            "timeRange"=>"02:15-02:20",
                            "text"=>"Betty now works for a research institution as a researcher.",
                        ),
                    ),
                )
            )
        );


        $data['events'][] = array(
            "num"=>"53",
            'type'=>"text",
            "timeRange"=>"02:23-02:29",
            "text"=>"Since the institution is located far away, she has to get up before 7 each morning.",
            "picture"=>"images/u8_p_011.jpg"
        );

        $data['events'][] = array(
            "num"=>"54",
            'type'=>"text",
            "timeRange"=>"02:29-02:32",
            "text"=>"She has to dress up smartly.",
            "picture"=>"images/u8_p_011.jpg"
        );

        $data['events'][] = array(
            "num"=>"55",
            'type'=>"text",
            "timeRange"=>"02:32-02:35",
            "text"=>"She leaves home for work at 7:50.",
            "picture"=>"images/u8_p_011.jpg"
        );

        $data['events'][] = array(
            "num"=>"56",
            'type'=>"text",
            "timeRange"=>"02:35-02:41",
            "text"=>"She usually has a simple lunch at her office, two sandwiches and a bottle of yogurt.",
            "picture"=>"images/u8_p_011.jpg"
        );

        $data['events'][] = array(
            "num"=>"38",
            'type'=>"text",
            "timeRange"=>"02:41-02:44",
            "text"=>"She finishes work at 6 pm.",
            "picture"=>"images/u8_p_012.jpg"
        );

        $data['events'][] = array(
            "num"=>"57",
            'type'=>"text",
            "timeRange"=>"02:44-02:50",
            "text"=>"If it is necessary, she has to bring some work home and continues working on her computer. ",
            "picture"=>"images/u8_p_012.jpg"
        );

        $data['events'][] = array(
            "num"=>"58",
            'type'=>"text",
            "timeRange"=>"02:50-02:54",
            "text"=>"She never does any work on weekends.",
            "picture"=>"images/u8_p_013.jpg"
        );

        $data['events'][] = array(
            "num"=>"59",
            'type'=>"text",
            "timeRange"=>"02:54-02:59",
            "text"=>"As before, weekends are her time to enjoy herself.",
            "picture"=>"images/u8_p_013.jpg"
        );

        $data['events'][] = array(
            "num"=>"60",
            'type'=>"text",
            "timeRange"=>"02:59-03:03",
            "text"=>"She loves her work and is very satisfied with it.",
            "picture"=>"images/u8_p_013.jpg"
        );

        $data['events'][] = array(
            "num"=>"61",
            'type'=>"multipleChoices",
            "timeRange"=>"",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"62",
                    "content_id"=>1295,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8pcq.mp3',
                    "timeRange"=>"01:18-01:22",
                    "text"=>"Why does she get up very early every morning?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Because her office is far from her home.","isCorrect"=>true),
                        "1"=>array("item"=>"Because she is used to getting up early.", "isCorrect"=>false),
                        "2"=>array("item"=>"Because she wants to start work early.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u8p.mp3',
                            "timeRange"=>"02:23-02:29",
                            "text"=>"Since the institution is located far away, she has to get up before 7 each morning."
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u8p.mp3',
                            "timeRange"=>"02:23-02:29",
                            "text"=>"Since the institution is located far away, she has to get up before 7 each morning."
                        ),
                    ),
                )
            )
        );

         $this->saveEventListToDatabases($data);$a =  json_encode($data);
        $fp = fopen('json207.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
        return;

    }


    public function getPart208(){

        $data = array(
            "unit_id"       =>8,
            "lesson_id"     =>43,
            "part_id"       =>208,
            "media_filename"=>'media/u8p.mp3',
            "media_type"    =>'audio',
            "totalTime"     =>"2:08",
            "part_type"     =>"listening",
            "have_questions"=>false,
            "questions_type"=>"text",
            "keywords"      =>array(
                "experience",
                "graduate",
                "major",
                "consumer",
                "in addition to",
                "thesis",
                "internship",
                "behavior",
                "related",
                "convenient",
                "occasionally",
                "colleague",
                "research institution",
                "smartly",
                "yogurt",
                "be satisfied with"
            ),
        );
        $data['events'][] = array(
            "num"=>"2",
            'type'=>"text",
            "timeRange"=>"00:00-00:10",
            "text"=>"Hello, this is Channel We. I'm Mr. V. In today's program we are going to know Lucy's sister, Betty.",
            "media_filename"=>'media/u8Mr_V.mp4',
            "media_type"    =>'video',
            "picture"=>"images/u7_p_001.jpg",
            "pictures"=>array()

        );
        $data['events'][] = array(
            "num"=>"3",
            'type'=>"text",
            "timeRange"=>"00:00-00:08",
            "displayKewords"=>true,
            "text"=>"Lucy's sister Betty got to experience a different kind of school life at a University in Europe several years ago.",
            "picture"=>"images/u8_p_001.jpg"
        );
        $data['events'][] = array(
            "num"=>"4",
            "content_id"=>1296,
            'type'=>"sr_reading",
            "scores"=>1,
            "timeRange"=>"00:08-00:13",
            "text"=>"She graduated last year with a Bachelor's degree in Science. ",
            "answer"=>"She graduated last year with a Bachelor's degree in Science",
            "picture"=>"images/u8_p_001.jpg"
        );
        $data['events'][] = array(
            "num"=>"5",
            'type'=>"text",
            "timeRange"=>"00:13-00:17",
            "text"=>"It took her four years to complete the degree.",
            "picture"=>"images/u8_p_001.jpg"
        );
        $data['events'][] = array(
            "num"=>"6",
            "content_id"=>1297,
            'type'=>"sr_reading",
            "scores"=>1,
            "timeRange"=>"00:17-00:20",
            "text"=>"Betty majored in consumer science.",
            "answer"=>"Betty majored in consumer science.",
            "picture"=>"images/u8_p_002.jpg"
        );
        $data['events'][] = array(
            "num"=>"7",
            'type'=>"text",
            "timeRange"=>"00:20-00:24",
            "text"=>"She went to university at the age of 17. ",
            "picture"=>"images/u8_p_002.jpg"
        );

        $data['events'][] = array(
            "num"=>"8",
            'type'=>"text",
            "timeRange"=>"00:24-00:32",
            "text"=>"She had a very easy life during the last semester because she only had three courses to take in addition to writing her thesis.",
            "picture"=>"images/u8_p_002.jpg"
        );

        $data['events'][] = array(
            "num"=>"9",
            "content_id"=>1298,
            'type'=>"sr_reading",
            "scores"=>1,
            "timeRange"=>"00:32-00:37",
            "text"=>"She only had lectures on Wednesday mornings and Thursday afternoons.",
            "answer"=>"She only had lectures on Wednesday mornings and Thursday afternoons",
            "picture"=>"images/u8_p_002.jpg"
        );

        $data['events'][] = array(
            "num"=>"10",
            'type'=>"text",
            "timeRange"=>"00:37-00:41",
            "text"=>"Usually she didn't get up until after 8.",
            "picture"=>"images/u8_p_002.jpg"
        );

        $data['events'][] = array(
            "num"=>"11",
            'type'=>"text",
            "timeRange"=>"00:41-00:47",
            "text"=>"She had all her three meals at the school dining-hall because she stayed on the campus.",
            "picture"=>"images/u8_p_003.jpg"
        );

        $data['events'][] = array(
            "num"=>"12",
            "content_id"=>1299,
            'type'=>"sr_reading",
            "scores"=>1,
            "timeRange"=>"00:47-00:53",
            "text"=>"She would usually go swimming at the school gym at around 5 o'clock in the afternoon.",
            "answer"=>"She would usually go swimming at the school gym at around 5 o'clock in the afternoon.",
            "picture"=>"images/u8_p_004.jpg"
        );

        $data['events'][] = array(
            "num"=>"13",
            'type'=>"text",
            "timeRange"=>"00:53-00:57",
            "text"=>"During the last semester she did an internship.",
            "picture"=>"images/u7_p_004.jpg"
        );

        $data['events'][] = array(
            "num"=>"14",
            'type'=>"text",
            "timeRange"=>"00:57-01:01",
            "text"=>"She got a part-time job in a small company downtown.",
            "picture"=>"images/u8_p_005.jpg"
        );

        $data['events'][] = array(
            "num"=>"15",
            "content_id"=>1300,
            'type'=>"sr_reading",
            "scores"=>1,
            "timeRange"=>"01:01-01:06",
            "text"=>"She drove to work 3 days a week and worked 4 hours each time.",
            "answer"=>"She drove to work 3 days a week and worked 4 hours each time.",
            "picture"=>"images/u8_p_005.jpg"
        );

        $data['events'][] = array(
            "num"=>"16",
            'type'=>"text",
            "timeRange"=>"01:06-01:09",
            "text"=>"She usually went to the company at 8. ",
            "picture"=>"images/u8_p_005.jpg"
        );

        $data['events'][] = array(
            "num"=>"17",
            'type'=>"text",
            "timeRange"=>"01:09-01:12",
            "text"=>"She worked as a research assistant.",
            "picture"=>"images/u8_p_005.jpg"
        );

        $data['events'][] = array(
            "num"=>"18",
            "content_id"=>1301,
            'type'=>"sr_reading",
            "scores"=>1,
            "timeRange"=>"01:12-01:17",
            "text"=>"She usually started her work by reading emails for her boss.",
            "answer"=>"She usually started her work by reading emails for her boss.",
            "picture"=>"images/u8_p_005.jpg"
        );

        $data['events'][] = array(
            "num"=>"19",
            'type'=>"text",
            "timeRange"=>"01:17-01:20",
            "text"=>"She learned a lot from the internship.",
            "picture"=>"images/u8_p_005.jpg"
        );

        $data['events'][] = array(
            "num"=>"20",
            "content_id"=>1302,
            'type'=>"sr_reading",
            "scores"=>1,
            "timeRange"=>"01:20-01:25",
            "text"=>"Betty had to spend a lot of time in the library writing her thesis. ",
            "answer"=>"Betty had to spend a lot of time in the library writing her thesis",
            "picture"=>"images/u8_p_006.jpg"
        );

        $data['events'][] = array(
            "num"=>"21",
            'type'=>"text",
            "timeRange"=>"01:25-01:29",
            "text"=>"Her topic was about consumer behaviors. ",
            "picture"=>"images/u8_p_006.jpg"
        );

        $data['events'][] = array(
            "num"=>"22",
            'type'=>"text",
            "timeRange"=>"01:29-01:35",
            "text"=>"In order to write the thesis, she had to search for related research papers and books. ",
            "picture"=>"images/u8_p_006.jpg"
        );

        $data['events'][] = array(
            "num"=>"23",
            'type'=>"text",
            "timeRange"=>"01:35-01:38",
            "text"=>"The library was large and comfortable.",
            "picture"=>"images/u8_p_006.jpg"
        );


        $data['events'][] = array(
            "num"=>"24",
            'type'=>"text",
            "timeRange"=>"01:38-01:41",
            "text"=>"It was open around the clock.",
            "picture"=>"images/u8_p_006.jpg"
        );

        $data['events'][] = array(
            "num"=>"25",
            'type'=>"text",
            "timeRange"=>"01:41-01:46",
            "text"=>"It was very convenient and she could go there any time she liked. ",
            "picture"=>"images/u8_p_006.jpg"
        );

        $data['events'][] = array(
            "num"=>"26",
            "content_id"=>1303,
            'type'=>"sr_reading",
            "scores"=>1,
            "timeRange"=>"01:46-01:50",
            "text"=>"She usually went to the library with some soft drinks and snacks.",
            "answer"=>"She usually went to the library with some soft drinks and snacks.",
            "picture"=>"images/u8_p_006.jpg"
        );
        $data['events'][] = array(
            "num"=>"27",
            'type'=>"text",
            "timeRange"=>"01:50-01:53",
            "text"=>"She often worked there until very late.",
            "picture"=>"images/u8_p_006.jpg"
        );
        $data['events'][] = array(
            "num"=>"28",
            "content_id"=>1304,
            'type'=>"sr_reading",
            "scores"=>1,
            "timeRange"=>"01:53-01:58",
            "text"=>"During the weekends, she often went shopping or visited her friend Ada.",
            "answer"=>"During the weekends, she often went shopping or visited her friend Ada.",
            "picture"=>"images/u8_p_007.jpg"
        );
        $data['events'][] = array(
            "num"=>"29",
            'type'=>"text",
            "timeRange"=>"01:58-02:03",
            "text"=>"Ada came from South America and worked in a big company there.",
            "picture"=>"images/u8_p_007.jpg"
        );
        $data['events'][] = array(
            "num"=>"30",
            'type'=>"text",
            "timeRange"=>"02:03-02:08",
            "text"=>"Sometimes, they saw movies together or drove to different parks for picnics.",
            "picture"=>"images/u8_p_009.jpg"
        );

        $data['events'][] = array(
            "num"=>"31",
            "content_id"=>1305,
            'type'=>"sr_reading",
            "scores"=>1,
            "timeRange"=>"02:08-02:15",
            "text"=>"Occasionally, Betty would have parties with Ada and Ada's colleagues on Saturday evenings.",
            "answer"=>"Occasionally Betty would have parties with Ada and Ada's colleagues on Saturday evenings",
            "picture"=>"images/u8_p_0010.jpg"
        );
        $data['events'][] = array(
            "num"=>"32",
            'type'=>"text",
            "timeRange"=>"02:15-02:20",
            "text"=>"Betty now works for a research institution as a researcher. ",
            "picture"=>"images/u8_p_011.jpg"
        );



        $data['events'][] = array(
            "num"=>"33",
            'type'=>"text",
            "timeRange"=>"02:20-02:23",
            "text"=>"She is much busier than before.",
            "picture"=>"images/u8_p_011.jpg"
        );

        $data['events'][] = array(
            "num"=>"34",
            "content_id"=>1306,
            'type'=>"sr_reading",
            "scores"=>1,
            "timeRange"=>"02:23-02:29",
            "text"=>"Since the institution is located far away, she has to get up before 7 each morning.",
            "answer"=>"Since the institution is located far away, she has to get up before 7 each morning.",
            "picture"=>"images/u8_p_011.jpg"
        );

        $data['events'][] = array(
            "num"=>"35",
            'type'=>"text",
            "timeRange"=>"02:29-02:32",
            "text"=>"She has to dress up smartly.",
            "picture"=>"images/u8_p_011.jpg"
        );

        $data['events'][] = array(
            "num"=>"36",
            'type'=>"text",
            "timeRange"=>"02:32-02:35",
            "text"=>"She leaves home for work at 7:50.",
            "picture"=>"images/u8_p_011.jpg"
        );

        $data['events'][] = array(
            "num"=>"37",
            "content_id"=>1307,
            'type'=>"sr_reading",
            "scores"=>1,
            "timeRange"=>"02:35-02:41",
            "text"=>"She usually has a simple lunch at her office, two sandwiches and a bottle of yogurt.",
            "answer"=>"She usually has a simple lunch at her office, two sandwiches and a bottle of yogurt",
            "picture"=>"images/u8_p_011.jpg"
        );

        $data['events'][] = array(
            "num"=>"38",
            'type'=>"text",
            "timeRange"=>"02:41-02:44",
            "text"=>"She finishes work at 6 pm.",
            "picture"=>"images/u8_p_012.jpg"
        );

        $data['events'][] = array(
            "num"=>"39",
            'type'=>"text",
            "timeRange"=>"02:44-02:50",
            "text"=>"If it is necessary, she has to bring some work home and continues working on her computer. ",
            "picture"=>"images/u8_p_012.jpg"
        );

        $data['events'][] = array(
            "num"=>"40",
            "content_id"=>1308,
            'type'=>"sr_reading",
            "scores"=>1,
            "timeRange"=>"02:50-02:54",
            "text"=>"She never does any work on weekends.",
            "answer"=>"She never does any work on weekends",
            "picture"=>"images/u8_p_013.jpg"
        );

        $data['events'][] = array(
            "num"=>"41",
            'type'=>"text",
            "timeRange"=>"02:54-02:59",
            "text"=>"As before, weekends are her time to enjoy herself.",
            "picture"=>"images/u8_p_013.jpg"
        );

        $data['events'][] = array(
            "num"=>"42",
            'type'=>"text",
            "timeRange"=>"02:59-03:03",
            "text"=>"She loves her work and is very satisfied with it.",
            "picture"=>"images/u8_p_013.jpg"
        );

         $this->saveEventListToDatabases($data);$a =  json_encode($data);
        $fp = fopen('json208.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
        return;
    }

    public function getPart209(){

        $data = array(
            "unit_id"       =>8,
            "lesson_id"     =>44,
            "part_id"       =>209,
            "media_filename"=>'media/u8d.mp4',
            "media_type"    =>'video',
            "totalTime"     =>"4:05",
            "part_type"     =>"dialog",
            "have_questions"=>false,
            "questions_type"=>"text",
            "keywords"      =>array(
                "algebra",
                "introduction",
                "literature",
                "get used to",
                "chemistry",
                "homestay",
                "altogether",
                "take care of",
                "chat",
                "comfortable",
                "van",
                "relative",
                "abroad",
                "choose",
                "regret"
            ),
        );

        $data['events'][] = array(
            "num"=>"1",
            'type'=>"text",
            "timeRange"=>"00:00-00:06",
            "text"=>"July Zhang, a Chinese girl, has been in San Francisco for high school.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"2",
            'type'=>"text",
            "timeRange"=>"00:06-00:10",
            "text"=>"She got back two days ago for the Christmas holiday.",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"3",
            'type'=>"text",
            "timeRange"=>"00:10-00:14",
            "text"=>"Her best friend Linda comes to visit and chat with her.",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"4",
            'type'=>"text",
            "timeRange"=>"00:14-00:17",
            "text"=>"July, did you have a good time in America?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"5",
            'type'=>"text",
            "timeRange"=>"00:17-00:19",
            "text"=>"Of course I did!",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"6",
            'type'=>"text",
            "timeRange"=>"00:19-00:21",
            "text"=>"Tell me all about it!",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"7",
            'type'=>"text",
            "timeRange"=>"00:21-00:26",
            "text"=>"Well, I usually arrived at school at 7:45. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"8",
            'type'=>"text",
            "timeRange"=>"00:26-00:29",
            "text"=>"I got there by school bus. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"9",
            'type'=>"text",
            "timeRange"=>"00:29-00:33",
            "text"=>"My first class, Algebra, started at 8.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"10",
            'type'=>"text",
            "timeRange"=>"00:33-00:39",
            "text"=>"Then, I had Consumer Math, Introduction to Literature, and Physical Science. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"11",
            'type'=>"text",
            "timeRange"=>"00:39-00:42",
            "text"=>"Then I had lunch at the school café.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"12",
            'type'=>"text",
            "timeRange"=>"00:42-00:44",
            "text"=>"How was the food there?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"13",
            'type'=>"text",
            "timeRange"=>"00:44-00:48",
            "text"=>"In the beginning, I couldn't get used to it. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"14",
            'type'=>"text",
            "timeRange"=>"00:48-00:52",
            "text"=>"But now, I think I like the food better there.",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"15",
            'type'=>"text",
            "timeRange"=>"00:52-00:55",
            "text"=>"How about the afternoon?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"16",
            'type'=>"text",
            "timeRange"=>"00:55-01:03",
            "text"=>"I only had three classes in the afternoon, chemistry, art and PE, physical education. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"17",
            'type'=>"text",
            "timeRange"=>"01:03-01:06",
            "text"=>"I usually got home at 4 pm.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"18",
            'type'=>"text",
            "timeRange"=>"01:06-01:09",
            "text"=>"Tell me something about your homestay.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"19",
            'type'=>"text",
            "timeRange"=>"01:09-01:12",
            "text"=>"It was really wonderful.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"20",
            'type'=>"text",
            "timeRange"=>"01:12-01:15",
            "text"=>"My host family is a big family. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"21",
            'type'=>"text",
            "timeRange"=>"01:15-01:20",
            "text"=>"Mr. and Mrs. Blake are very nice and they have six children.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"22",
            'type'=>"text",
            "timeRange"=>"01:20-01:23",
            "text"=>"Oh, they must have a big house then. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"23",
            'type'=>"text",
            "timeRange"=>"01:23-01:26",
            "text"=>"Yes, very big. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"24",
            'type'=>"text",
            "timeRange"=>"01:26-01:29",
            "text"=>"There were 7 bedrooms altogether.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"25",
            'type'=>"text",
            "timeRange"=>"01:29-01:33",
            "text"=>"Mr. Blake was very busy during the week. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"26",
            'type'=>"text",
            "timeRange"=>"01:33-01:38",
            "text"=>"Mrs. Blake was a housewife and took care of the family every day. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"27",
            'type'=>"text",
            "timeRange"=>"01:38-01:42",
            "text"=>"Usually, we were all back from school by 4 o'clock. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"28",
            'type'=>"text",
            "timeRange"=>"01:42-01:46",
            "text"=>"One of the most wonderful times was dinner. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"29",
            'type'=>"text",
            "timeRange"=>"01:46-01:51",
            "text"=>"We all sat together around the table, eating and chatting. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"30",
            'type'=>"text",
            "timeRange"=>"01:51-01:54",
            "text"=>"Did they take good care of you?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"31",
            'type'=>"text",
            "timeRange"=>"01:54-01:56",
            "text"=>"Yes, they did.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"32",
            'type'=>"text",
            "timeRange"=>"01:56-02:02",
            "text"=>"Actually, Lidia, the third oldest sister, was as old as me.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"33",
            'type'=>"text",
            "timeRange"=>"02:02-02:05",
            "text"=>"She was very nice.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"34",
            'type'=>"text",
            "timeRange"=>"02:05-02:08",
            "text"=>"She helped me get used to life there. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"35",
            'type'=>"text",
            "timeRange"=>"02:08-02:13",
            "text"=>"Mrs. Blake also tried really hard to make sure I felt comfortable.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"36",
            'type'=>"text",
            "timeRange"=>"02:13-02:15",
            "text"=>"Did you miss home?",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"37",
            'type'=>"text",
            "timeRange"=>"02:15-02:18",
            "text"=>"In the beginning, yes.",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"38",
            'type'=>"text",
            "timeRange"=>"02:18-02:22",
            "text"=>"But 2 months later, I started to get used to life there.",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"39",
            'type'=>"text",
            "timeRange"=>"02:22-02:27",
            "text"=>"Besides, I talked to my Mum on WeChat almost every evening.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"40",
            'type'=>"text",
            "timeRange"=>"02:27-02:30",
            "text"=>"Did you go to any interesting places then?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"41",
            'type'=>"text",
            "timeRange"=>"02:30-02:38",
            "text"=>"Yes. During the weekends, Mr. Blake often took us to some parks around the town in his big van. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"42",
            'type'=>"text",
            "timeRange"=>"02:38-02:44",
            "text"=>"Sometimes, we had family parties with Mr. Blake's friends or relatives. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"43",
            'type'=>"text",
            "timeRange"=>"02:44-02:46",
            "text"=>"Wonderful!",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"44",
            'type'=>"text",
            "timeRange"=>"02:46-02:51",
            "text"=>"My mom wants me to study abroad next year too. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"45",
            'type'=>"text",
            "timeRange"=>"02:51-02:54",
            "text"=>"I think I will also choose a homestay.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"46",
            'type'=>"text",
            "timeRange"=>"02:54-02:56",
            "text"=>"Yes, you should!",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"47",
            'type'=>"text",
            "timeRange"=>"02:56-02:59",
            "text"=>"You won't regret it at all.",
            "picture"=>""
        );

         $this->saveEventListToDatabases($data);$a =  json_encode($data);
        $fp = fopen('json209.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
        return;
    }


    public function getPart210(){

        $data = array(
            "unit_id"       =>8,
            "lesson_id"     =>44,
            "part_id"       =>210,
            "media_filename"=>'media/u8d.mp4',
            "media_type"    =>'video',
            "totalTime"     =>"4:05",
            "part_type"     =>"dialog",
            "have_questions"=>false,
            "questions_type"=>"text",
            "keywords"      =>array(
                "algebra",
                "introduction",
                "literature",
                "get used to",
                "chemistry",
                "homestay",
                "altogether",
                "take care of",
                "chat",
                "comfortable",
                "van",
                "relative",
                "abroad",
                "choose",
                "regret"
            ),
        );

        $data['events'][] = array(
            "num"=>"1",
            'type'=>"text",
            "timeRange"=>"00:00-00:06",
            "text"=>"July Zhang, a Chinese girl, has been in San Francisco for high school.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"2",
            'type'=>"text",
            "timeRange"=>"00:06-00:10",
            "text"=>"She got back two days ago for the Christmas holiday.",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"3",
            'type'=>"text",
            "timeRange"=>"00:10-00:14",
            "text"=>"Her best friend Linda comes to visit and chat with her.",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"4",
            'type'=>"text",
            "timeRange"=>"00:14-00:17",
            "text"=>"July, did you have a good time in America?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"5",
            'type'=>"text",
            "timeRange"=>"00:17-00:19",
            "text"=>"Of course I did!",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"6",
            'type'=>"text",
            "timeRange"=>"00:19-00:21",
            "text"=>"Tell me all about it!",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"7",
            'type'=>"text",
            "timeRange"=>"00:21-00:26",
            "text"=>"Well, I usually arrived at school at 7:45. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"8",
            'type'=>"text",
            "timeRange"=>"00:26-00:29",
            "text"=>"I got there by school bus. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"9",
            'type'=>"text",
            "timeRange"=>"00:29-00:33",
            "text"=>"My first class, Algebra, started at 8.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"10",
            'type'=>"text",
            "timeRange"=>"00:33-00:39",
            "text"=>"Then, I had Consumer Math, Introduction to Literature, and Physical Science. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"11",
            'type'=>"text",
            "timeRange"=>"00:39-00:42",
            "text"=>"Then I had lunch at the school café.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"12",
            'type'=>"multipleChoices",
            "timeRange"=>"",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"13",
                    "content_id"=>1309,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8dcq.mp3',
                    "timeRange"=>"00:00-00:03",
                    "text"=>"Did July enjoy her stay in America?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Yes.","isCorrect"=>true),
                        "1"=>array("item"=>"No.", "isCorrect"=>false)
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u8dcq.mp3',
                            "timeRange"=>"00:03-00:06 ",
                            "text"=>"She had a good time in America.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u8dcq.mp3',
                            "timeRange"=>"00:03-00:06 ",
                            "text"=>"She had a good time in America.",
                        ),
                    ),
                ),
                1=>array(
                    "num"=>"14",
                    "content_id"=>1310,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8dcq.mp3',
                    "timeRange"=>"00:06-00:10",
                    "text"=>"How did July go to school every day?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"By school bus.","isCorrect"=>true),
                        "1"=>array("item"=>"By bus.", "isCorrect"=>false),
                        "2"=>array("item"=>"By bike.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u8dcq.mp3',
                            "timeRange"=>"00:10-00:13",
                            "text"=>"She went to school by school bus.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u8dcq.mp3',
                            "timeRange"=>"00:10-00:13",
                            "text"=>"She went to school by school bus.",
                        ),
                    ),
                )
            )
        );

        $data['events'][] = array(
            "num"=>"15",
            'type'=>"text",
            "timeRange"=>"00:42-00:44",
            "text"=>"How was the food there?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"16",
            'type'=>"text",
            "timeRange"=>"00:44-00:48",
            "text"=>"In the beginning, I couldn't get used to it. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"17",
            'type'=>"text",
            "timeRange"=>"00:48-00:52",
            "text"=>"But now, I think I like the food better there.",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"18",
            'type'=>"text",
            "timeRange"=>"00:52-00:55",
            "text"=>"How about the afternoon?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"19",
            'type'=>"text",
            "timeRange"=>"00:55-01:03",
            "text"=>"I only had three classes in the afternoon, chemistry, art and PE, physical education. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"20",
            'type'=>"text",
            "timeRange"=>"01:03-01:06",
            "text"=>"I usually got home at 4 pm.",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"21",
            'type'=>"multipleChoices",
            "timeRange"=>"",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"22",
                    "content_id"=>1311,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8dcq.mp3',
                    "timeRange"=>"00:13-00:16",
                    "text"=>"How did July like the food there?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"She now enjoys it.","isCorrect"=>true),
                        "1"=>array("item"=>"She never got used to it.", "isCorrect"=>false),
                        "2"=>array("item"=>"She liked it from the very beginning.", "isCorrect"=>false)
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u8dcq.mp3',
                            "timeRange"=>"00:16-00:22",
                            "text"=>"In the beginning, she couldn't get used to it. But now, she likes the food better there.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u8dcq.mp3',
                            "timeRange"=>"00:16-00:22",
                            "text"=>"In the beginning, she couldn't get used to it. But now, she likes the food better there.",
                        ),
                    ),
                ),
                1=>array(
                    "num"=>"23",
                    "content_id"=>1312,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8dcq.mp3',
                    "timeRange"=>"00:22-00:26",
                    "text"=>"How many classes did she have in the afternoon?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Three.","isCorrect"=>true),
                        "1"=>array("item"=>"Four.", "isCorrect"=>false),
                        "2"=>array("item"=>"Two.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u8dcq.mp3',
                            "timeRange"=>"00:26-00:30",
                            "text"=>"She only had three classes in the afternoon.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u8dcq.mp3',
                            "timeRange"=>"00:26-00:30",
                            "text"=>"She only had three classes in the afternoon.",
                        ),
                    ),
                ),
                2=>array(
                    "num"=>"24",
                    "content_id"=>1313,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8dcq.mp3',
                    "timeRange"=>"00:30-00:34",
                    "text"=>"What classes did she have in the afternoon?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Chemistry, art and PE.","isCorrect"=>true),
                        "1"=>array("item"=>"Chemistry, art and math.", "isCorrect"=>false),
                        "2"=>array("item"=>"Chemistry, math and PE.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u8dcq.mp3',
                            "timeRange"=>"00:34-00:42",
                            "text"=>"She had three classes  in the afternoon: chemistry, art and PE, physical education.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u8dcq.mp3',
                            "timeRange"=>"00:34-00:42",
                            "text"=>"She had three classes  in the afternoon: chemistry, art and PE, physical education.",
                        ),
                    ),
                )
            )
        );

        $data['events'][] = array(
            "num"=>"25",
            'type'=>"text",
            "timeRange"=>"01:06-01:09",
            "text"=>"Tell me something about your homestay.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"26",
            'type'=>"text",
            "timeRange"=>"01:09-01:12",
            "text"=>"It was really wonderful.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"27",
            'type'=>"text",
            "timeRange"=>"01:12-01:15",
            "text"=>"My host family is a big family. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"28",
            'type'=>"text",
            "timeRange"=>"01:15-01:20",
            "text"=>"Mr. and Mrs. Blake are very nice and they have six children.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"29",
            'type'=>"text",
            "timeRange"=>"01:20-01:23",
            "text"=>"Oh, they must have a big house then. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"30",
            'type'=>"text",
            "timeRange"=>"01:23-01:26",
            "text"=>"Yes, very big. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"31",
            'type'=>"text",
            "timeRange"=>"01:26-01:29",
            "text"=>"There were 7 bedrooms altogether.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"32",
            'type'=>"text",
            "timeRange"=>"01:29-01:33",
            "text"=>"Mr. Blake was very busy during the week. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"33",
            'type'=>"text",
            "timeRange"=>"01:33-01:38",
            "text"=>"Mrs. Blake was a housewife and took care of the family every day. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"34",
            'type'=>"text",
            "timeRange"=>"01:38-01:42",
            "text"=>"Usually, we were all back from school by 4 o'clock. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"35",
            'type'=>"text",
            "timeRange"=>"01:42-01:46",
            "text"=>"One of the most wonderful times was dinner. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"36",
            'type'=>"text",
            "timeRange"=>"01:46-01:51",
            "text"=>"We all sat together around the table, eating and chatting. ",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"37",
            'type'=>"multipleChoices",
            "timeRange"=>"",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"38",
                    "content_id"=>1314,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8dcq.mp3',
                    "timeRange"=>"01:10-01:13",
                    "text"=>"Who took care of the family?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Mrs. Blake.","isCorrect"=>true),
                        "1"=>array("item"=>"Mr. Blake.", "isCorrect"=>false),
                        "2"=>array("item"=>"Mr. and Mrs. Blake.", "isCorrect"=>false)
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u8dcq.mp3',
                            "timeRange"=>"01:33-01:38",
                            "text"=>"Mrs. Blake was a housewife and took care of the family every day.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u8dcq.mp3',
                            "timeRange"=>"01:33-01:38",
                            "text"=>"Mrs. Blake was a housewife and took care of the family every day.",
                        ),
                    ),
                ),
                1=>array(
                    "num"=>"39",
                    "content_id"=>1315,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8dcq.mp3',
                    "timeRange"=>"01:13-01:18",
                    "text"=>"Which of the following did July enjoy most?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Dinner time.","isCorrect"=>true),
                        "1"=>array("item"=>"Lunch time.", "isCorrect"=>false),
                        "2"=>array("item"=>"Breakfast time.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u8dcq.mp3',
                            "timeRange"=>"01:42-01:46",
                            "text"=>"One of the most wonderful times was dinner. ",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u8dcq.mp3',
                            "timeRange"=>"01:42-01:46",
                            "text"=>"One of the most wonderful times was dinner. ",
                        ),
                    ),
                )
            )
        );

        $data['events'][] = array(
            "num"=>"40",
            'type'=>"text",
            "timeRange"=>"01:51-01:54",
            "text"=>"Did they take good care of you?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"41",
            'type'=>"text",
            "timeRange"=>"01:54-01:56",
            "text"=>"Yes, they did.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"42",
            'type'=>"text",
            "timeRange"=>"01:56-02:02",
            "text"=>"Actually, Lidia, the third oldest sister, was as old as me.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"43",
            'type'=>"text",
            "timeRange"=>"02:02-02:05",
            "text"=>"She was very nice.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"44",
            'type'=>"text",
            "timeRange"=>"02:05-02:08",
            "text"=>"She helped me get used to life there. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"45",
            'type'=>"text",
            "timeRange"=>"02:08-02:13",
            "text"=>"Mrs. Blake also tried really hard to make sure I felt comfortable.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"46",
            'type'=>"text",
            "timeRange"=>"02:13-02:15",
            "text"=>"Did you miss home?",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"47",
            'type'=>"text",
            "timeRange"=>"02:15-02:18",
            "text"=>"In the beginning, yes.",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"48",
            'type'=>"text",
            "timeRange"=>"02:18-02:22",
            "text"=>"But 2 months later, I started to get used to life there.",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"49",
            'type'=>"text",
            "timeRange"=>"02:22-02:27",
            "text"=>"Besides, I talked to my Mum on WeChat almost every evening.",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"50",
            'type'=>"multipleChoices",
            "timeRange"=>"",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"51",
                    "content_id"=>1316,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8dcq.mp3',
                    "timeRange"=>"01:18-01:22",
                    "text"=>"Who helped July to get used to the new environment?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Lidia, the third oldest sister.","isCorrect"=>true),
                        "1"=>array("item"=>"Mrs. Blake.", "isCorrect"=>false),
                        "2"=>array("item"=>"Mr. Blake.", "isCorrect"=>false)
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u8dcq.mp3',
                            "timeRange"=>"01:22-01:27",
                            "text"=>"Lidia, the third oldest sister, helped her get used to life there.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u8dcq.mp3',
                            "timeRange"=>"01:22-01:27",
                            "text"=>"Lidia, the third oldest sister, helped her get used to life there.",
                        ),
                    ),
                ),
                1=>array(
                    "num"=>"52",
                    "content_id"=>1317,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8dcq.mp3',
                    "timeRange"=>"01:28-01:33",
                    "text"=>"Did Mrs. Blake make July feel comfortable in her host family?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Yes.","isCorrect"=>true),
                        "1"=>array("item"=>"No.", "isCorrect"=>false)
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u8dcq.mp3',
                            "timeRange"=>"02:44-02:49",
                            "text"=>"Mrs. Blake also tried really hard to make sure that July felt comfortable.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u8dcq.mp3',
                            "timeRange"=>"02:44-02:49",
                            "text"=>"Mrs. Blake also tried really hard to make sure that July felt comfortable.",
                        ),
                    ),
                ),
                2=>array(
                    "num"=>"53",
                    "content_id"=>1318,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8dcq.mp3',
                    "timeRange"=>"01:39-01:43",
                    "text"=>"How did July keep in touch with her mother?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"By WeChat.","isCorrect"=>true),
                        "1"=>array("item"=>"By telephone.", "isCorrect"=>false),
                        "2"=>array("item"=>"By email.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u8dcq.mp3',
                            "timeRange"=>"01:43-01:48",
                            "text"=>"She talked to her Mum on WeChat almost every evening.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u8dcq.mp3',
                            "timeRange"=>"01:43-01:48",
                            "text"=>"She talked to her Mum on WeChat almost every evening.",
                        ),
                    ),
                )
            )
        );

        $data['events'][] = array(
            "num"=>"54",
            'type'=>"text",
            "timeRange"=>"02:27-02:30",
            "text"=>"Did you go to any interesting places then?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"55",
            'type'=>"text",
            "timeRange"=>"02:30-02:38",
            "text"=>"Yes. During the weekends, Mr. Blake often took us to some parks around the town in his big van. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"56",
            'type'=>"text",
            "timeRange"=>"02:38-02:44",
            "text"=>"Sometimes, we had family parties with Mr. Blake's friends or relatives. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"57",
            'type'=>"text",
            "timeRange"=>"02:44-02:46",
            "text"=>"Wonderful!",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"58",
            'type'=>"text",
            "timeRange"=>"02:46-02:51",
            "text"=>"My mom wants me to study abroad next year too. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"59",
            'type'=>"text",
            "timeRange"=>"02:51-02:54",
            "text"=>"I think I will also choose a homestay.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"60",
            'type'=>"text",
            "timeRange"=>"02:54-02:56",
            "text"=>"Yes, you should!",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"61",
            'type'=>"text",
            "timeRange"=>"02:56-02:59",
            "text"=>"You won't regret it at all.",
            "picture"=>""
        );


        $data['events'][] = array(
            "num"=>"62",
            'type'=>"multipleChoices",
            "timeRange"=>"",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"63",
                    "content_id"=>1319,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8dcq.mp3',
                    "timeRange"=>"01:58-02:02",
                    "text"=>"What did Mr. Blake often do during weekends?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Take them  to outings in parks.","isCorrect"=>true),
                        "1"=>array("item"=>"Take them shopping in his big van.", "isCorrect"=>false),
                        "2"=>array("item"=>"Have parties with her friends and relatives.", "isCorrect"=>false)
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u8dcq.mp3',
                            "timeRange"=>"02:02-02:15",
                            "text"=>"During the weekends, Mr. Blake often took them to some parks around the town in his big van. Sometimes, they had family parties with Mr. Blake's friends or relatives. ",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u8dcq.mp3',
                            "timeRange"=>"02:02-02:15",
                            "text"=>"During the weekends, Mr. Blake often took them to some parks around the town in his big van. Sometimes, they had family parties with Mr. Blake's friends or relatives. ",
                        ),
                    ),
                ),
                1=>array(
                    "num"=>"64",
                    "content_id"=>1320,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8dcq.mp3',
                    "timeRange"=>"02:15-02:18",
                    "text"=>"Which of the following is correct?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Linda is looking forward to the homestay.","isCorrect"=>true),
                        "1"=>array("item"=>"Linda doesn't want to live in a homestay.", "isCorrect"=>false),
                        "2"=>array("item"=>"Linda doesn't care about where she studies.", "isCorrect"=>false)
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u8dcq.mp3',
                            "timeRange"=>"02:18-02:23",
                            "text"=>"Linda said she would choose a homestay too when she studies abroad the next year.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u8dcq.mp3',
                            "timeRange"=>"02:18-02:23",
                            "text"=>"Linda said she would choose a homestay too when she studies abroad the next year.",
                        ),
                    ),
                ),
                2=>array(
                    "num"=>"65",
                    "content_id"=>1321,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8dcq.mp3',
                    "timeRange"=>"02:23-02:28",
                    "text"=>"Does July encourage Linda to live in a host family?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Yes.","isCorrect"=>true),
                        "1"=>array("item"=>"No.", "isCorrect"=>false)
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u8dcq.mp3',
                            "timeRange"=>"02:28-02:33",
                            "text"=>"July told her that she wouldn't regret to choose a homestay.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u8dcq.mp3',
                            "timeRange"=>"02:28-02:33",
                            "text"=>"July told her that she wouldn't regret to choose a homestay.",
                        ),
                    ),
                )
            )
        );
         $this->saveEventListToDatabases($data);$a =  json_encode($data);
        $fp = fopen('json210.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
        return;
    }


    public function getPart211()
    {

        $data = array(
            "unit_id"       =>8,
            "lesson_id"     =>44,
            "part_id"       =>211,
            "media_filename"=>'media/u8d.mp4',
            "media_type"    =>'video',
            "totalTime"     =>"4:05",
            "part_type"     =>"dialog",
            "have_questions"=>false,
            "questions_type"=>"text",
            "keywords"      =>array(
                "algebra",
                "introduction",
                "literature",
                "get used to",
                "chemistry",
                "homestay",
                "altogether",
                "take care of",
                "chat",
                "comfortable",
                "van",
                "relative",
                "abroad",
                "choose",
                "regret"
            ),
        );

        $data['events'][] = array(
            "num"=>"1",
            'type'=>"text",
            "timeRange"=>"00:00-00:06",
            "text"=>"July Zhang, a Chinese girl, has been in San Francisco for high school.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"2",
            'type'=>"text",
            "timeRange"=>"00:06-00:10",
            "text"=>"She got back two days ago for the Christmas holiday.",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"3",
            'type'=>"text",
            "timeRange"=>"00:10-00:14",
            "text"=>"Her best friend Linda comes to visit and chat with her.",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"4",
            'type'=>"text",
            "timeRange"=>"00:14-00:17",
            "text"=>"July, did you have a good time in America?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"5",
            'type'=>"text",
            "timeRange"=>"00:17-00:19",
            "text"=>"Of course I did!",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"6",
            'type'=>"text",
            "timeRange"=>"00:19-00:21",
            "text"=>"Tell me all about it!",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"7",
            'type'=>"sr_reading",
            "content_id"=>1322,
            "scores"=>1,
            "timeRange"=>"00:21-00:26",
            "text"=>"Well, I usually arrived at school at 7:45. ",
            "answer"=>"Well I usually arrived at school at 7:45",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"8",
            'type'=>"text",
            "timeRange"=>"00:26-00:29",
            "text"=>"I got there by school bus. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"9",
            'type'=>"text",
            "timeRange"=>"00:29-00:33",
            "text"=>"My first class, Algebra, started at 8.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"10",
            'type'=>"text",
            "timeRange"=>"00:33-00:39",
            "text"=>"Then, I had Consumer Math, Introduction to Literature, and Physical Science. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"11",
            'type'=>"text",
            "timeRange"=>"00:39-00:42",
            "text"=>"Then I had lunch at the school café.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"12",
            'type'=>"text",
            "timeRange"=>"00:42-00:44",
            "text"=>"How was the food there?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"13",
            'type'=>"sr_reading",
            "content_id"=>1323,
            "scores"=>1,
            "timeRange"=>"00:44-00:48",
            "text"=>"In the beginning, I couldn't get used to it. ",
            "answer"=>"In the beginning I couldn't get used to it",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"14",
            'type'=>"text",
            "timeRange"=>"00:48-00:52",
            "text"=>"But now, I think I like the food better there.",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"15",
            'type'=>"text",
            "timeRange"=>"00:52-00:55",
            "text"=>"How about the afternoon?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"16",
            'type'=>"text",
            "timeRange"=>"00:55-01:03",
            "text"=>"I only had three classes in the afternoon, chemistry, art and PE, physical education. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"17",
            'type'=>"text",
            "timeRange"=>"01:03-01:06",
            "text"=>"I usually got home at 4 pm.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"18",
            'type'=>"sr_reading",
            "content_id"=>1324,
            "scores"=>1,
            "timeRange"=>"01:06-01:09",
            "text"=>"Tell me something about your homestay.",
            "answer"=>"Tell me something about your homestay",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"19",
            'type'=>"text",
            "timeRange"=>"01:09-01:12",
            "text"=>"It was really wonderful.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"20",
            'type'=>"text",
            "timeRange"=>"01:12-01:15",
            "text"=>"My host family is a big family. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"21",
            'type'=>"text",
            "timeRange"=>"01:15-01:20",
            "text"=>"Mr. and Mrs. Blake are very nice and they have six children.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"22",
            'type'=>"sr_reading",
            "content_id"=>1325,
            "scores"=>1,
            "timeRange"=>"01:20-01:23",
            "text"=>"Oh, they must have a big house then.",
            "answer"=>"Oh, they must have a big house then",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"23",
            'type'=>"text",
            "timeRange"=>"01:23-01:26",
            "text"=>"Yes, very big. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"24",
            'type'=>"text",
            "timeRange"=>"01:26-01:29",
            "text"=>"There were 7 bedrooms altogether.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"25",
            'type'=>"text",
            "timeRange"=>"01:29-01:33",
            "text"=>"Mr. Blake was very busy during the week. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"26",
            'type'=>"text",
            "timeRange"=>"01:33-01:38",
            "text"=>"Mrs. Blake was a housewife and took care of the family every day. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"27",
            'type'=>"sr_reading",
            "content_id"=>1326,
            "scores"=>1,
            "timeRange"=>"01:38-01:42",
            "text"=>"Usually, we were all back from school by 4 o'clock. ",
            "answer"=>"Usually, we were all back from school by 4 o'clock.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"28",
            'type'=>"text",
            "timeRange"=>"01:42-01:46",
            "text"=>"One of the most wonderful times was dinner. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"29",
            'type'=>"text",
            "timeRange"=>"01:46-01:51",
            "text"=>"We all sat together around the table, eating and chatting. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"30",
            'type'=>"sr_reading",
            "content_id"=>1327,
            "scores"=>1,
            "timeRange"=>"01:51-01:54",
            "text"=>"Did they take good care of you?",
            "answer"=>"Did they take good care of you",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"31",
            'type'=>"text",
            "timeRange"=>"01:54-01:56",
            "text"=>"Yes, they did.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"32",
            'type'=>"text",
            "timeRange"=>"01:56-02:02",
            "text"=>"Actually, Lidia, the third oldest sister, was as old as me.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"33",
            'type'=>"text",
            "timeRange"=>"02:02-02:05",
            "text"=>"She was very nice.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"34",
            'type'=>"text",
            "timeRange"=>"02:05-02:08",
            "text"=>"She helped me get used to life there. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"35",
            'type'=>"text",
            "timeRange"=>"02:08-02:13",
            "text"=>"Mrs. Blake also tried really hard to make sure I felt comfortable.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"36",
            'type'=>"text",
            "timeRange"=>"02:13-02:15",
            "text"=>"Did you miss home?",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"37",
            'type'=>"text",
            "timeRange"=>"02:15-02:18",
            "text"=>"In the beginning, yes.",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"38",
            'type'=>"text",
            "timeRange"=>"02:18-02:22",
            "text"=>"But 2 months later, I started to get used to life there.",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"39",
            'type'=>"sr_reading",
            "content_id"=>1328,
            "scores"=>1,
            "timeRange"=>"02:22-02:27",
            "text"=>"Besides, I talked to my Mum on WeChat almost every evening.",
            "answer"=>"Besides, I talked to my Mum on WeChat almost every evening",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"40",
            'type'=>"text",
            "timeRange"=>"02:27-02:30",
            "text"=>"Did you go to any interesting places then?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"41",
            'type'=>"sr_reading",
            "content_id"=>1329,
            "scores"=>1,
            "timeRange"=>"02:30-02:38",
            "text"=>"Yes. During the weekends, Mr. Blake often took us to some parks around the town in his big van.",
            "answer"=>"Yes. During the weekends, Mr. Blake often took us to some parks around the town in his big van.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"42",
            'type'=>"text",
            "timeRange"=>"02:38-02:44",
            "text"=>"Sometimes, we had family parties with Mr. Blake's friends or relatives. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"43",
            'type'=>"text",
            "timeRange"=>"02:44-02:46",
            "text"=>"Wonderful!",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"44",
            'type'=>"text",
            "timeRange"=>"02:46-02:51",
            "text"=>"My mom wants me to study abroad next year too. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"45",
            'type'=>"text",
            "timeRange"=>"02:51-02:54",
            "text"=>"I think I will also choose a homestay.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"46",
            'type'=>"text",
            "timeRange"=>"02:54-02:56",
            "text"=>"Yes, you should!",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"47",
            'type'=>"sr_reading",
            "content_id"=>1330,
            "scores"=>1,
            "timeRange"=>"02:56-02:59",
            "text"=>"You won't regret it at all.",
            "answer"=>"You won't regret it at all",
            "picture"=>""
        );
        $this->saveEventListToDatabases($data);
        $a = json_encode($data);
        $fp = fopen('json211.txt', "w");
        fwrite($fp, $a);
        fclose($fp);
        return;
    }


    public function getPart212(){
        $dataT = array(
            "unit_id"       =>8,
            "lesson_id"     =>45,
            "part_id"       =>212,
            "media_filename"=>'media/u8ps.mp3',
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
            "text"=>"Betty graduated last year from a university in Europe. ",
            "picture"=>"images/u8_ps_001.png"
        );
        $data['events'][] = array(
            "num"=>"2",
            'type'=>"text",
            "timeRange"=>"00:04-00:08",
            "text"=>"During the last semester, she had a relatively easy life.",
            "picture"=>"images/u8_ps_001.png"
        );
        $data['events'][] = array(
            "num"=>"3",
            'type'=>"text",
            "timeRange"=>"00:08-00:11",
            "text"=>"She only had three courses.",
            "picture"=>"images/u8_ps_001.png"
        );

        $data['events'][] = array(
            "num"=>"4",
            'type'=>"text",
            "timeRange"=>"00:11-00:15",
            "text"=>"As a result, she normally didn't get up until after 8.",
            "picture"=>"images/u8_ps_001.png"
        );
        $data['events'][] = array(
            "num"=>"5",
            'type'=>"text",
            "timeRange"=>"00:15-00:19",
            "text"=>"She ate all her meals at the school dining-hall.",
            "picture"=>"images/u8_ps_001.png"
        );
        $data['events'][] = array(
            "num"=>"6",
            'type'=>"text",
            "timeRange"=>"00:19-00:22",
            "text"=>"She often went swimming at the school gym.",
            "picture"=>"images/u8_ps_001.png"
        );
        $data['events'][] = array(
            "num"=>"7",
            'type'=>"text",
            "timeRange"=>"00:22-00:27",
            "text"=>"She did an internship at a small company and worked as an assistant.",
            "picture"=>"images/u8_ps_002.png"
        );
        $data['events'][] = array(
            "num"=>"8",
            'type'=>"text",
            "timeRange"=>"00:27-00:32",
            "text"=>"There she worked 3 times a week for 4 hours each time.",
            "picture"=>"images/u8_ps_002.png"
        );
        $data['events'][] = array(
            "num"=>"9",
            'type'=>"text",
            "timeRange"=>"00:32-00:35",
            "text"=>"Meanwhile she had to write her thesis.",
            "picture"=>"images/u8_ps_003.png"
        );
        $data['events'][] = array(
            "num"=>"10",
            'type'=>"text",
            "timeRange"=>"00:35-00:39",
            "text"=>"So she had to search for materials in the library.",
            "picture"=>"images/u8_ps_003.png"
        );
        $data['events'][] = array(
            "num"=>"11",
            'type'=>"text",
            "timeRange"=>"00:39-00:42",
            "text"=>"She often worked there until very late.",
            "picture"=>"images/u8_ps_003.png"
        );
        $data['events'][] = array(
            "num"=>"12",
            'type'=>"text",
            "timeRange"=>"00:42-00:48",
            "text"=>"On weekends, she often went downtown to do shopping or visit her friend, Ada.",
            "picture"=>"images/u8_ps_004.png"
        );
        $data['events'][] = array(
            "num"=>"13",
            'type'=>"text",
            "timeRange"=>"00:48-00:51",
            "text"=>"The two often had a good time together.",
            "picture"=>"images/u8_ps_004.png"
        );
        $data['events'][] = array(
            "num"=>"14",
            'type'=>"text",
            "timeRange"=>"00:51-00:54",
            "text"=>"Betty now works for a research institute.",
            "picture"=>"images/u8_ps_005.png"
        );

        $data['events'][] = array(
            "num"=>"15",
            'type'=>"text",
            "timeRange"=>"00:54-00:59",
            "text"=>"She usually gets up before 7 and leaves for work by 7:50.",
            "picture"=>"images/u8_ps_006.png"
        );

        $data['events'][] = array(
            "num"=>"16",
            'type'=>"text",
            "timeRange"=>"00:59-01:03",
            "text"=>"She usually has a simple lunch at her office.",
            "picture"=>"images/u8_ps_006.png"
        );
        $data['events'][] = array(
            "num"=>"17",
            'type'=>"text",
            "timeRange"=>"01:03-01:07",
            "text"=>"If it is necessary, she has to bring her work home.",
            "picture"=>"images/u8_ps_006.png"
        );

        $data['events'][] = array(
            "num"=>"18",
            'type'=>"text",
            "timeRange"=>"01:07-01:10",
            "text"=>"She never works on weekends.",
            "picture"=>"images/u8_ps_006.png"
        );

        $data['events'][] = array(
            "num"=>"19",
            'type'=>"text",
            "timeRange"=>"01:10-01:14",
            "text"=>"She loves her work and is very satisfied with it.",
            "picture"=>"images/u8_ps_006.png"
        );



        $data['events'][] = array(
            "num"=>"1",
            "content_id"=>1331,
            'type'=>"sr_readings",
            "timeRange"=>array("00:00-00:06","00:04-00:11","00:09-00:15"),
            "scores"=>1,
            "text"=>array("Betty graduated last year from a university in Europe. ","During the last semester, she had a relatively easy life.","She only had three courses."),
            "answer"=>array("Betty graduated last year from a university in Europe","During the last semester she had a relatively easy life.","She only had three courses"),
            "pictures"=> array("images/u8_ps_006.png","images/u8_ps_006.png","images/u8_ps_006.png"),
            "picture"=>"images/u8_ps_006.png"
        );
        $data1['events'][] = array(
            "num"=>"2",
            "content_id"=>1332,
            'type'=>"sr_readings",
            "timeRange"=>array("00:13-00:24","00:21-00:25","00:25-00:32"),
            "scores"=>1,
            "text"=>array("As a result, she normally didn't get up until after 8. ","She ate all her meals at the school dining-hall. ","She often went swimming at the school gym."),
            "answer"=>array("As a result, she normally didn't get up until after 8","She ate all her meals at the school dining-hall","She often went swimming at the school gym"),
            "pictures"=> array("images/u8_ps_006.png","images/u8_ps_006.png","images/u8_ps_006.png"),
            "picture"=>"images/u8_ps_006.png"
        );

        $data1['events'][] = array(
            "num"=>"3",
            "content_id"=>1333,
            'type'=>"sr_readings",
            "timeRange"=>array("00:32-00:38","00:38-00:45","00:45-00:49"),
            "scores"=>1,
            "text"=>array("She did an internship at a small company and worked as an assistant. ","There she worked 3 times a week for 4 hours each time. ","Meanwhile she had to write her thesis."),
            "answer"=>array("She did an internship at a small company and worked as an assistant","There she worked 3 times a week for 4 hours each time","Meanwhile she had to write her thesis"),
            "picture"=>"images/u8_ps_006.png",
            "pictures"=>array("images/u8_ps_006.png","images/u8_ps_006.png","images/u8_ps_006.png")
        );

        $data1['events'][] = array(
            "num"=>"4",
            "content_id"=>1334,
            'type'=>"sr_readings",
            "timeRange"=>array("00:49-00:54","00:54-00:58","00:58-01:02"),
            "scores"=>1,
            "picture"=>"images/u8_ps_006.png",
            "text"=>array("So she had to search for materials in the library. ","She often worked there until very late. ","On weekends, she often went downtown to do shopping or visit her friend, Ada."),
            "answer"=>array("So she had to search for materials in the library","She often worked there until very late","On weekends, she often went downtown to do shopping or visit her friend, Ada"),
            "pictures"=>array("images/u8_ps_006.png","images/u8_ps_006.png","images/u8_ps_006.png","images/u8_ps_006.png")

        );
        $data['events'][] = array(
            "num"=>"5",
            "content_id"=>1335,
            'type'=>"sr_readings",
            "timeRange"=>array("00:49-00:54","00:54-00:58","00:58-01:02"),
            "scores"=>1,
            "picture"=>"images/u8_ps_006.png",
            "text"=>array("The two often had a good time together.","Betty now works for a research institute. ","She usually gets up before 7 and leaves for work by 7:50."),
            "answer"=>array("The two often had a good time together","Betty now works for a research institute","She usually gets up before 7 and leaves for work by 7:50. "),
            "pictures"=>array("images/u8_ps_006.png","images/u8_ps_006.png","images/u8_ps_006.png")

        );

        $data['events'][] = array(
            "num"=>"6",
            "content_id"=>1336,
            'type'=>"sr_readings",
            "timeRange"=>array("00:49-00:54","00:54-00:58","00:58-01:02","00:58-01:02"),
            "scores"=>1,
            "picture"=>"images/u8_ps_006.png",
            "text"=>array("She usually has a simple lunch at her office.","If it is necessary, she has to bring her work home. ","She never works on weekends.","She loves her work and is very satisfied with it."),
            "answer"=>array("She usually has a simple lunch at her office","If it is necessary, she has to bring her work home.","She never works on weekends.","She loves her work and is very satisfied with it."),
            "pictures"=>array("images/u8_ps_006.png","images/u8_ps_006.png","images/u8_ps_006.png")

        );

        $database = array_merge($dataT,$data);
        //$database = array_merge($database,$data1);

        //exit;
        $this->saveEventListToDatabases($database);


        //$dataT['eventLists'] = array($data,$data1);
        $a =  json_encode($dataT);
        $fp = fopen('json212.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
        return;
    }


    public function getPart213(){
        $data = array(
            "unit_id"       =>8,
            "lesson_id"     =>45,
            "part_id"       =>213,
            "media_filename"=>'media/u8p.mp3',
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
            "content_id"=>1337,
            'type'=>"sr_reading",
            "timeRange"=>"00:00-00:08",
            "scores"=>1,
            "text"=>"Lucy's sister Betty got to experience a different kind of school life at a University in Europe several years ago.",
            "answer"=>"Lucy's sister Betty got to experience a different kind of school life at a University in Europe several years ago",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8p.mp3',
                    "timeRange"=>"00:00-00:08",
                    "text"=>"Lucy's sister Betty got to experience a different kind of school life at a University in Europe several years ago.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8p.mp3',
                    "timeRange"=>"00:00-00:08",
                    "text"=>"Lucy's sister Betty got to experience a different kind of school life at a University in Europe several years ago.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"2",
            "content_id"=>1338,
            'type'=>"sr_reading",
            "timeRange"=>"00:24-00:32",
            "scores"=>1,
            "text"=>"She had a very easy life during the last semester because she only had three courses to take in addition to writing her thesis.",
            "answer"=>"She had a very easy life during the last semester because she only had three courses to take in addition to writing her thesis",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8p.mp3',
                    "timeRange"=>"00:24-00:32",
                    "text"=>"She had a very easy life during the last semester because she only had three courses to take in addition to writing her thesis.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8p.mp3',
                    "timeRange"=>"00:24-00:32",
                    "text"=>"She had a very easy life during the last semester because she only had three courses to take in addition to writing her thesis.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"3",
            "content_id"=>1339,
            'type'=>"sr_reading",
            "timeRange"=>"00:32-00:37",
            "scores"=>1,
            "text"=>"She only had lectures on Wednesday mornings and Thursday afternoons.",
            "answer"=>"She only had lectures on Wednesday mornings and Thursday afternoons.",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8p.mp3',
                    "timeRange"=>"00:32-00:37",
                    "text"=>"She only had lectures on Wednesday mornings and Thursday afternoons.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8p.mp3',
                    "timeRange"=>"00:32-00:37",
                    "text"=>"She only had lectures on Wednesday mornings and Thursday afternoons.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"4",
            "content_id"=>1340,
            'type'=>"sr_reading",
            "timeRange"=>"00:41-00:47",
            "scores"=>1,
            "text"=>"She had all her three meals at the school dining-hall because she stayed on the campus.",
            "answer"=>"She had all her three meals at the school dining-hall because she stayed on the campus.",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8p.mp3',
                    "timeRange"=>"00:41-00:47",
                    "text"=>"She had all her three meals at the school dining-hall because she stayed on the campus.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8p.mp3',
                    "timeRange"=>"00:41-00:47",
                    "text"=>"She had all her three meals at the school dining-hall because she stayed on the campus.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"5",
            "content_id"=>1341,
            'type'=>"sr_reading",
            "timeRange"=>"00:47-00:53",
            "scores"=>1,
            "text"=>"She would usually go swimming at the school gym at around 5 o'clock in the afternoon. ",
            "answer"=>"She would usually go swimming at the school gym at around 5 o'clock in the afternoon.",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8p.mp3',
                    "timeRange"=>"00:47-00:53",
                    "text"=>"She would usually go swimming at the school gym at around 5 o'clock in the afternoon. ",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8p.mp3',
                    "timeRange"=>"00:47-00:53",
                    "text"=>"She would usually go swimming at the school gym at around 5 o'clock in the afternoon. ",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"6",
            "content_id"=>1342,
            'type'=>"sr_reading",
            "timeRange"=>"01:29-01:35",
            "scores"=>1,
            "text"=>"In order to write the thesis, she had to search for related research papers and books.",
            "answer"=>"In order to write the thesis, she had to search for related research papers and books.",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8p.mp3',
                    "timeRange"=>"01:29-01:35",
                    "text"=>"In order to write the thesis, she had to search for related research papers and books.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8p.mp3',
                    "timeRange"=>"01:29-01:35",
                    "text"=>"In order to write the thesis, she had to search for related research papers and books.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"7",
            "content_id"=>1343,
            'type'=>"sr_reading",
            "timeRange"=>"01:46-01:50",
            "scores"=>1,
            "text"=>"She usually went to the library with some soft drinks and snacks.",
            "answer"=>"She usually went to the library with some soft drinks and snacks.",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8p.mp3',
                    "timeRange"=>"01:46-01:50",
                    "text"=>"She usually went to the library with some soft drinks and snacks. ",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8p.mp3',
                    "timeRange"=>"01:46-01:50",
                    "text"=>"She usually went to the library with some soft drinks and snacks.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"8",
            "content_id"=>1344,
            'type'=>"sr_reading",
            "timeRange"=>"01:53-01:58",
            "scores"=>1,
            "text"=>"During the weekends, she often went shopping or visited her friend Ada.",
            "answer"=>"During the weekends, she often went shopping or visited her friend Ada.",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8p.mp3',
                    "timeRange"=>"01:53-01:58",
                    "text"=>"During the weekends, she often went shopping or visited her friend Ada.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8p.mp3',
                    "timeRange"=>"01:53-01:58",
                    "text"=>"During the weekends, she often went shopping or visited her friend Ada.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"9",
            "content_id"=>1345,
            'type'=>"sr_reading",
            "timeRange"=>"02:03-02:08",
            "scores"=>1,
            "text"=>"Sometimes, they saw movies together or drove to different parks for picnics.",
            "answer"=>"Sometimes, they saw movies together or drove to different parks for picnics.",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8p.mp3',
                    "timeRange"=>"02:03-02:08",
                    "text"=>"Sometimes, they saw movies together or drove to different parks for picnics. ",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8p.mp3',
                    "timeRange"=>"02:03-02:08",
                    "text"=>"Sometimes, they saw movies together or drove to different parks for picnics. ",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"10",
            "content_id"=>1346,
            'type'=>"sr_reading",
            "timeRange"=>"02:08-02:15",
            "scores"=>1,
            "text"=>"Occasionally, Betty would have parties with Ada and Ada's colleagues on Saturday evenings. ",
            "answer"=>"Occasionally, Betty would have parties with Ada and Ada's colleagues on Saturday evenings. ",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8p.mp3',
                    "timeRange"=>"02:08-02:15",
                    "text"=>"Occasionally, Betty would have parties with Ada and Ada's colleagues on Saturday evenings. ",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8p.mp3',
                    "timeRange"=>"02:08-02:15",
                    "text"=>"Occasionally, Betty would have parties with Ada and Ada's colleagues on Saturday evenings.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );


        $data['events'][] = array(
            "num"=>"11",
            "content_id"=>1347,
            'type'=>"sr_reading",
            "timeRange"=>"02:23-02:29",
            "scores"=>1,
            "text"=>"Since the institution is located far away, she has to get up before 7 each morning.",
            "answer"=>"Since the institution is located far away, she has to get up before 7 each morning.",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8p.mp3',
                    "timeRange"=>"02:23-02:29",
                    "text"=>"Since the institution is located far away, she has to get up before 7 each morning.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8p.mp3',
                    "timeRange"=>"02:23-02:29",
                    "text"=>"Since the institution is located far away, she has to get up before 7 each morning.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"12",
            "content_id"=>1348,
            'type'=>"sr_reading",
            "timeRange"=>"02:35-02:41",
            "scores"=>1,
            "text"=>"She usually has a simple lunch at her office, two sandwiches and a bottle of yogurt.",
            "answer"=>"She usually has a simple lunch at her office, two sandwiches and a bottle of yogurt.",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8p.mp3',
                    "timeRange"=>"02:35-02:41",
                    "text"=>"She usually has a simple lunch at her office, two sandwiches and a bottle of yogurt.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8p.mp3',
                    "timeRange"=>"02:35-02:41",
                    "text"=>"She usually has a simple lunch at her office, two sandwiches and a bottle of yogurt.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"13",
            "content_id"=>1349,
            'type'=>"sr_reading",
            "timeRange"=>"02:44-02:50",
            "scores"=>1,
            "text"=>"If it is necessary, she has to bring some work home and continues working on her computer. ",
            "answer"=>"If it is necessary, she has to bring some work home and continues working on her computer. ",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8p.mp3',
                    "timeRange"=>"02:44-02:50",
                    "text"=>"If it is necessary, she has to bring some work home and continues working on her computer. ",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8d.mp3',
                    "timeRange"=>"02:44-02:50",
                    "text"=>"If it is necessary, she has to bring some work home and continues working on her computer. ",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"14",
            "content_id"=>1350,
            'type'=>"sr_reading",
            "timeRange"=>"00:33-00:39",
            "scores"=>1,
            "text"=>"Then, I had Consumer Math, Introduction to Literature, and Physical Science.",
            "answer"=>"Then, I had Consumer Math, Introduction to Literature, and Physical Science.",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8d.mp3',
                    "timeRange"=>"00:33-00:39",
                    "text"=>"Then, I had Consumer Math, Introduction to Literature, and Physical Science.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8d.mp3',
                    "timeRange"=>"00:33-00:39",
                    "text"=>"Then, I had Consumer Math, Introduction to Literature, and Physical Science.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"15",
            "content_id"=>1351,
            'type'=>"sr_reading",
            "timeRange"=>"00:55-01:03",
            "scores"=>1,
            "text"=>"I only had three classes in the afternoon, chemistry, art and PE, physical education.",
            "answer"=>"I only had three classes in the afternoon, chemistry, art and PE, physical education.",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8d.mp3',
                    "timeRange"=>"00:55-01:03",
                    "text"=>"I only had three classes in the afternoon, chemistry, art and PE, physical education.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8d.mp3',
                    "timeRange"=>"00:55-01:03",
                    "text"=>"I only had three classes in the afternoon, chemistry, art and PE, physical education.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"16",
            "content_id"=>1352,
            'type'=>"sr_reading",
            "timeRange"=>"01:33-01:38",
            "scores"=>1,
            "text"=>"Mrs. Blake was a housewife and took care of the family every day.",
            "answer"=>"Mrs. Blake was a housewife and took care of the family every day.",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8d.mp3',
                    "timeRange"=>"01:33-01:38",
                    "text"=>"Mrs. Blake was a housewife and took care of the family every day. ",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8d.mp3',
                    "timeRange"=>"01:33-01:38",
                    "text"=>"Mrs. Blake was a housewife and took care of the family every day. ",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"17",
            "content_id"=>1353,
            'type'=>"sr_reading",
            "timeRange"=>"01:46-01:51",
            "scores"=>1,
            "text"=>"We all sat together around the table, eating and chatting.",
            "answer"=>"We all sat together around the table, eating and chatting.",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8d.mp3',
                    "timeRange"=>"01:46-01:51",
                    "text"=>"We all sat together around the table, eating and chatting.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8d.mp3',
                    "timeRange"=>"01:46-01:51",
                    "text"=>"We all sat together around the table, eating and chatting.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"18",
            "content_id"=>1354,
            'type'=>"sr_reading",
            "timeRange"=>"02:08-02:13",
            "scores"=>1,
            "text"=>"Mrs. Blake also tried really hard to make sure I felt comfortable.",
            "answer"=>"Mrs. Blake also tried really hard to make sure I felt comfortable.",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8d.mp3',
                    "timeRange"=>"02:08-02:13",
                    "text"=>"Mrs. Blake also tried really hard to make sure I felt comfortable.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8d.mp3',
                    "timeRange"=>"02:08-02:13",
                    "text"=>"Mrs. Blake also tried really hard to make sure I felt comfortable.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"19",
            "content_id"=>1355,
            'type'=>"sr_reading",
            "timeRange"=>"02:30-02:38",
            "scores"=>1,
            "text"=>"Yes. During the weekends, Mr. Blake often took us to some parks around the town in his big van.",
            "answer"=>"Yes. During the weekends, Mr. Blake often took us to some parks around the town in his big van.",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8d.mp3',
                    "timeRange"=>"02:30-02:38",
                    "text"=>"Yes. During the weekends, Mr. Blake often took us to some parks around the town in his big van.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8d.mp3',
                    "timeRange"=>"02:30-02:38",
                    "text"=>"Yes. During the weekends, Mr. Blake often took us to some parks around the town in his big van.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"20",
            "content_id"=>1356,
            'type'=>"sr_reading",
            "timeRange"=>"02:38-02:44",
            "scores"=>1,
            "text"=>"Sometimes, we had family parties with Mr. Blake's friends or relatives.",
            "answer"=>"Sometimes, we had family parties with Mr. Blake's friends or relatives.",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8d.mp3',
                    "timeRange"=>"02:38-02:44",
                    "text"=>"Sometimes, we had family parties with Mr. Blake's friends or relatives.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8d.mp3',
                    "timeRange"=>"02:38-02:44",
                    "text"=>"Sometimes, we had family parties with Mr. Blake's friends or relatives.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
         $this->saveEventListToDatabases($data);$a =  json_encode($data);
        $fp = fopen('json213.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
        return;
    }


    public function getPart214(){
        $data = array(
            "unit_id"       =>8,
            "lesson_id"     =>45,
            "part_id"       =>214,
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
            "content_id"=>1357,
            "media_filename"=>'media/u8p.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_conjunction_clause",
            "timeRange"     =>"00:08-00:13",
            "scores"=>1,
            "text"=>"She graduated last year with a Bachelor's degree in Science.",
            "answer" =>"She graduated last year with a Bachelor's degree in Science. ",
            "items"=>array("She graduated","last year","with a Bachelor's degree","in Science."),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8p.mp3',
                    "timeRange"     =>"00:08-00:13",
                    "text"=>"She graduated last year with a Bachelor's degree in Science.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8p.mp3',
                    "timeRange"     =>"00:08-00:13",
                    "text"=>"She graduated last year with a Bachelor's degree in Science.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"2",
            "content_id"=>1358,
            "media_filename"=>'media/u8p.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_conjunction_clause",
            "timeRange"     =>"00:13-00:17",
            "scores"=>1,
            "answer"=>"It took her four years to complete the degree.",
            "text" => "It took her four years to complete the degree.",
            "items"=>array("It took her","four years","to complete the degree."),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8p.mp3',
                    "timeRange"     =>"00:13-00:17",
                    "text" => "It took her four years to complete the degree.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8p.mp3',
                    "timeRange"     =>"00:13-00:17",
                    "text" => "It took her four years to complete the degree.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"3",
            "content_id"=>1359,
            "media_filename"=>'media/u8p.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_conjunction_clause",
            "timeRange"     =>"01:12-01:17",
            "scores"=>1,
            "answer"=>"She usually started her work by reading emails for her boss.",
            "text" => "SShe usually started her work by reading emails for her boss.",
            "items"=>array("She usually","started her work","by reading emails","for her boss."),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8p.mp3',
                    "timeRange"     =>"01:12-01:17",
                    "text" => "She usually started her work by reading emails for her boss.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8p.mp3',
                    "timeRange"     =>"01:12-01:17",
                    "text" => "She usually started her work by reading emails for her boss.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"4",
            "content_id"=>1360,
            "media_filename"=>'media/u8p.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_conjunction_clause",
            "timeRange"     =>"01:20-01:25",
            "scores"=>1,
            "answer"=>"Betty had to spend a lot of time in the library writing her thesis.",
            "text" => "Betty had to spend a lot of time in the library writing her thesis.",
            "items"=>array("Betty had to spend","a lot of time","in the library"," writing her thesis."),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8p.mp3',
                    "timeRange"     =>"01:20-01:25",
                    "text" => "Betty had to spend a lot of time in the library writing her thesis.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8p.mp3',
                    "timeRange"     =>"01:20-01:25",
                    "text" => "Betty had to spend a lot of time in the library writing her thesis.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"5",
            "content_id"=>1361,
            "media_filename"=>'media/u8p.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_conjunction_clause",
            "timeRange"     =>"01:50-01:53",
            "scores"=>1,
            "answer"=>"She often worked there until very late.",
            "text" => "She often worked there until very late.",
            "items"=>array("She","often"," worked there","until very late."),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8p.mp3',
                    "timeRange"     =>"01:50-01:53",
                    "text" => "She often worked there until very late.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8p.mp3',
                    "timeRange"     =>"01:50-01:53",
                    "text" => "She often worked there until very late.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"6",
            "content_id"=>1362,
            "media_filename"=>'media/u8p.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_conjunction_clause",
            "timeRange"     =>"02:15-02:20",
            "scores"=>1,
            "answer"=>"Betty now works for a research institution as a researcher.",
            "text" => "Betty now works for a research institution as a researcher.",
            "items"=>array("Betty now works","for a research institution","as a researcher."),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8p.mp3',
                    "timeRange"     =>"02:15-02:20",
                    "text" => "Betty now works for a research institution as a researcher.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8p.mp3',
                    "timeRange"     =>"02:15-02:20",
                    "text" => "Betty now works for a research institution as a researcher.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"7",
            "content_id"=>1363,
            "media_filename"=>'media/u8d.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_conjunction_clause",
            "timeRange"     =>"02:59-03:03",
            "scores"=>1,
            "answer"=>"She loves her work and is very satisfied with it.",
            "text"=>"She loves her work and is very satisfied with it.",
            "items"=>array("She loves her work ","and","is very satisfied"," with it."),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8d.mp3',
                    "timeRange"     =>"02:59-03:03",
                    "text"=>"She loves her work and is very satisfied with it.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8d.mp3',
                    "timeRange"     =>"02:59-03:03",
                    "text"=>"She loves her work and is very satisfied with it.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );


        $data['events'][] = array(
            "num"=>"8",
            "content_id"=>1364,
            "media_filename"=>'media/u8d.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_conjunction_clause",
            "timeRange"     =>"01:06-01:09",
            "scores"=>1,
            "answer"=>"Tell me something about your homestay.",
            "text" => "Tell me something about your homestay.",
            "items"=>array("Tell me something","about","your homestay."),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8d.mp3',
                    "timeRange"     =>"01:06-01:09",
                    "text" => "Tell me something about your homestay.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8d.mp3',
                    "timeRange"     =>"01:06-01:09",
                    "text" => "Tell me something about your homestay.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"9",
            "content_id"=>1365,
            "media_filename"=>'media/u8d.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_conjunction_clause",
            "timeRange"     =>"01:38-01:42",
            "scores"=>1,
            "answer"=>"Usually, we were all back from school by 4 o'clock.",
            "text" => "Usually, we were all back from school by 4 o'clock.",
            "items"=>array("Usually,","we were all back","from school,","by 4 o'clock."),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8d.mp3',
                    "timeRange"     =>"01:38-01:42",
                    "text" => "Usually, we were all back from school by 4 o'clock.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8d.mp3',
                    "timeRange"     =>"01:38-01:42",
                    "text" => "Usually, we were all back from school by 4 o'clock.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"10",
            "content_id"=>1366,
            "media_filename"=>'media/u8d.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_conjunction_clause",
            "timeRange"     =>"02:18-02:22",
            "scores"=>1,
            "answer"=>"But 2 months later, I started to get used to life there.",
            "text" => "But 2 months later, I started to get used to life there.",
            "items"=>array("But 2 months later, ","I started to","get used to","life there."),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8d.mp3',
                    "timeRange"     =>"02:18-02:22",
                    "text" => "But 2 months later, I started to get used to life there.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8d.mp3',
                    "timeRange"     =>"02:18-02:22",
                    "text" => "But 2 months later, I started to get used to life there.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

         $this->saveEventListToDatabases($data);$a =  json_encode($data);
        $fp = fopen('json214.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
        return;
    }

    public function getPart215(){
        $data = array(
            "unit_id"       =>8,
            "lesson_id"     =>45,
            "part_id"       =>215,
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
            "content_id"=>1367,
            "media_filename"=>'media/u8p.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"00:20-00:24",
            "scores"=>1,
            "text" => "She went to university at the age of 17.",
            "answer" => "She went to university at the age of 17.",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8p.mp3',
                    "timeRange"     =>"00:20-00:24",
                    "text" => "She went to university at the age of 17.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8p.mp3',
                    "timeRange"     =>"00:20-00:24",
                    "text" => "She went to university at the age of 17.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"2",
            "content_id"=>1368,
            "media_filename"=>'media/u8p.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"00:37-00:41",
            "scores"=>1,
            "text" => "Usually she didn't get up until after 8.",
            "answer" => "Usually she didn't get up until after 8.",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8p.mp3',
                    "timeRange"     =>"00:37-00:41",
                    "text" => "Usually she didn't get up until after 8.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8p.mp3',
                    "timeRange"     =>"00:37-00:41",
                    "text" => "Usually she didn't get up until after 8.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"3",
            "content_id"=>1369,
            "media_filename"=>'media/u8p.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"01:01-01:06",
            "scores"=>1,
            "text" => "She drove to work 3 days a week and worked 4 hours each time.",
            "answer" => "She drove to work 3 days a week and worked 4 hours each time.",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8p.mp3',
                    "timeRange"     =>"01:01-01:06",
                    "text" => "She drove to work 3 days a week and worked 4 hours each time. ",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8p.mp3',
                    "timeRange"     =>"01:01-01:06",
                    "text" => "She drove to work 3 days a week and worked 4 hours each time.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"4",
            "content_id"=>1370,
            "media_filename"=>'media/u8p.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"02:29-02:32",
            "scores"=>1,
            "text" => "She has to dress up smartly.",
            "answer" => "She has to dress up smartly.",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8p.mp3',
                    "timeRange"     =>"02:29-02:32",
                    "text" => "She has to dress up smartly.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8p.mp3',
                    "timeRange"     =>"02:29-02:32",
                    "text" => "She has to dress up smartly.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"5",
            "content_id"=>1371,
            "media_filename"=>'media/u8p.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"02:32-02:35",
            "scores"=>1,
            "text" => "She leaves home for work at 7:50.",
            "answer" => "She leaves home for work at 7:50.",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8p.mp3',
                    "timeRange"     =>"02:32-02:35",
                    "text" => "She leaves home for work at 7:50.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8p.mp3',
                    "timeRange"     =>"02:32-02:35",
                    "text" => "She leaves home for work at 7:50.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"6",
            "content_id"=>1372,
            "media_filename"=>'media/u8p.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"02:41-02:44",
            "scores"=>1,
            "text" => "She finishes work at 6 pm. ",
            "answer" => "She finishes work at 6 pm. ",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8p.mp3',
                    "timeRange"     =>"02:41-02:44",
                    "text" => "She finishes work at 6 pm. ",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8d.mp3',
                    "timeRange"     =>"02:41-02:44",
                    "text" => "She finishes work at 6 pm. ",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"7",
            "content_id"=>1373,
            "media_filename"=>'media/u8p.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"02:50-02:54",
            "scores"=>1,
            "text" => "She never does any work on weekends.",
            "answer" => "She never does any work on weekends.",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8p.mp3',
                    "timeRange"     =>"02:50-02:54",
                    "text" => "She never does any work on weekends.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8p.mp3',
                    "timeRange"     =>"02:50-02:54",
                    "text" => "She never does any work on weekends.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"8",
            "content_id"=>1374,
            "media_filename"=>'media/u8p.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"02:54-02:59",
            "scores"=>1,
            "text" => "As before, weekends are her time to enjoy herself. ",
            "answer" => "As before, weekends are her time to enjoy herself. ",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8p.mp3',
                    "timeRange"     =>"02:54-02:59",
                    "text" => "As before, weekends are her time to enjoy herself. ",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8p.mp3',
                    "timeRange"     =>"02:54-02:59",
                    "text" => "As before, weekends are her time to enjoy herself. ",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"9",
            "content_id"=>1375,
            "media_filename"=>'media/u8d.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"00:14-00:17",
            "scores"=>1,
            "text" => "July, did you have a good time in America?",
            "answer" => "July, did you have a good time in America?",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8d.mp3',
                    "timeRange"     =>"00:14-00:17",
                    "text" => "July, did you have a good time in America?",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8d.mp3',
                    "timeRange"     =>"00:14-00:17",
                    "text" => "July, did you have a good time in America?",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"10",
            "content_id"=>1376,
            "media_filename"=>'media/u8d.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"00:26-00:29",
            "scores"=>1,
            "text" => "I got there by school bus.",
            "answer" => "I got there by school bus.",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8d.mp3',
                    "timeRange"     =>"00:26-00:29",
                    "text" => "I got there by school bus.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8d.mp3',
                    "timeRange"     =>"00:26-00:29",
                    "text" => "I got there by school bus.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"11",
            "content_id"=>1377,
            "media_filename"=>'media/u8d.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"00:42-00:44",
            "scores"=>1,
            "text" => "How was the food there?",
            "answer" => "How was the food there?",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8d.mp3',
                    "timeRange"     =>"00:42-00:44",
                    "text" => "How was the food there?",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8d.mp3',
                    "timeRange"     =>"00:42-00:44",
                    "text" => "How was the food there?",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"12",
            "content_id"=>1378,
            "media_filename"=>'media/u8d.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"00:44-00:48",
            "scores"=>1,
            "text" => "In the beginning, I couldn't get used to it.",
            "answer" => "In the beginning, I couldn't get used to it.",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8d.mp3',
                    "timeRange"     =>"00:44-00:48",
                    "text" => "In the beginning, I couldn't get used to it.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8d.mp3',
                    "timeRange"     =>"00:44-00:48",
                    "text" => "In the beginning, I couldn't get used to it.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"13",
            "content_id"=>1379,
            "media_filename"=>'media/u8d.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"01:51-01:54",
            "scores"=>1,
            "text" => "Did they take good care of you?",
            "answer" => "Did they take good care of you?",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8d.mp3',
                    "timeRange"     =>"01:51-01:54",
                    "text" => "Did they take good care of you?",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8d.mp3',
                    "timeRange"     =>"01:51-01:54",
                    "text" => "Did they take good care of you?",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"14",
            "content_id"=>1380,
            "media_filename"=>'media/u8d.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"02:13-02:15",
            "scores"=>1,
            "text" => "Did you miss home?",
            "answer" => "Did you miss home?",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8d.mp3',
                    "timeRange"     =>"02:13-02:15",
                    "text" => "Did you miss home?",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8d.mp3',
                    "timeRange"     =>"02:13-02:15",
                    "text" => "Did you miss home?",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"15",
            "content_id"=>1381,
            "media_filename"=>'media/u8d.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"02:56-02:59",
            "scores"=>1,
            "text" => "You won't regret it at all.",
            "answer" => "You won't regret it at all.",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8d.mp3',
                    "timeRange"     =>"02:56-02:59",
                    "text" => "You won't regret it at all.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8d.mp3',
                    "timeRange"     =>"02:56-02:59",
                    "text" => "You won't regret it at all.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
         $this->saveEventListToDatabases($data);$a =  json_encode($data);
        $fp = fopen('json215.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
        return;
    }

    public function getPart216(){
        $data = array(
            "unit_id"       =>8,
            "lesson_id"     =>46,
            "part_id"       =>216,
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
            "content_id"=>1382,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"01:49-01:58",
            "scores"=>10,
            "text" => "Andy wanted to work in South Africa. His brother was _ it while his sister was in favor _ it. ",
            "answer" => "Andy wanted to work in South Africa. His brother was against it while his sister was in favor of it. ",
            "items" => array(
                "0"=>array("item"=>"for","isCorrect"=>false),
                "1"=>array("item"=>"of", "isCorrect"=>true),
                "2"=>array("item"=>"against", "isCorrect"=>true),
                "3"=>array("item"=>"to", "isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1gfi.mp3',
                    "timeRange"     =>"01:49-01:58",
                    "text" => "Andy wanted to work in South Africa. His brother was against it while his sister was in favor of it. ",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1gfi.mp3',
                    "timeRange"     =>"01:49-01:58",
                    "text" => "Andy wanted to work in South Africa. His brother was against it while his sister was in favor of it. ",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"2",
            "content_id"=>1383,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"01:26-01:33",
            "scores"=>10,
            "text" => "Jack plans to separate the new department _ the company and set _ a new company. ",
            "answer"=>"Jack plans to separate the new department from the company and set up a new company.",
            "items" => array(
                "0"=>array("item"=>"of","isCorrect"=>false),
                "1"=>array("item"=>"up", "isCorrect"=>true),
                "2"=>array("item"=>"from", "isCorrect"=>true),
                "3"=>array("item"=>"off","isCorrect"=>false),
                "4"=>array("item"=>"out","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1gfi.mp3',
                    "timeRange"     =>"01:26-01:33",
                    "text"=>"Jack plans to separate the new department from the company and set up a new company.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1gfi.mp3',
                    "timeRange"     =>"01:26-01:33",
                    "text"=>"Jack plans to separate the new department from the company and set up a new company.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"3",
            "content_id"=>1384,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"01:11-01:16",
            "scores"=>10,
            "text" => "Jack found a new source of profit _ accident.  ",
            "answer"=>"Jack found a new source of profit by accident.",
            "items" => array(
                "0"=>array("item"=>"in","isCorrect"=>false),
                "1"=>array("item"=>"with", "isCorrect"=>false),
                "2"=>array("item"=>"on", "isCorrect"=>false),
                "3"=>array("item"=>"by","isCorrect"=>true),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1gfi.mp3',
                    "timeRange"     =>"01:11-01:16",
                    "text"=>"Jack found a new source of profit by accident.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1gfi.mp3',
                    "timeRange"     =>"01:11-01:16",
                    "text"=>"Jack found a new source of profit by accident.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );
        $data['events'][] = array(
            "num"=>"4",
            "content_id"=>1385,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"00:00-00:07",
            "scores"=>10,
            "text" => "William is applying _ a credit card as he is going to travel abroad. ",
            "answer"=>"William is applying for a credit card as he is going to travel abroad.",
            "items" => array(
                "0"=>array("item"=>"for","isCorrect"=>true),
                "1"=>array("item"=>"up", "isCorrect"=>false),
                "2"=>array("item"=>"of", "isCorrect"=>false),
                "3"=>array("item"=>"to","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1gfi.mp3',
                    "timeRange"     =>"00:00-00:07",
                    "text"=>"William is applying for a credit card as he is going to travel abroad.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1gfi.mp3',
                    "timeRange"     =>"00:00-00:07",
                    "text"=>"William is applying for a credit card as he is going to travel abroad.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"5",
            "content_id"=>1386,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"00:00-00:06",
            "scores"=>10,
            "text" => "If she had to choose between the two applicants, she would say Andy was _ choice.",
            "answer"=>"If she had to choose between the two applicants, she would say Andy was the better choice.",
            "items" => array(
                "0"=>array("item"=>"the better", "isCorrect"=>false),
                "1"=>array("item"=>"good","isCorrect"=>true),
                "2"=>array("item"=>"the best", "isCorrect"=>false),
                "3"=>array("item"=>"better","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8gfi.mp3',
                    "timeRange"     =>"00:00-00:06",
                    "text"=>"If she had to choose between the two applicants, she would say Andy was the better choice.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8gfi.mp3',
                    "timeRange"     =>"00:00-00:06",
                    "text"=>"If she had to choose between the two applicants, she would say Andy was the better choice.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"6",
            "content_id"=>1387,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"00:06-00:13",
            "scores"=>10,
            "text" => "Helen and William were worried about their son, Harry, because no one knew _ he went. ",
            "answer"=>"Helen and William were worried about their son, Harry, because no one knew where he went.",
            "items" => array(
                "0"=>array("item"=>"the place", "isCorrect"=>false),
                "1"=>array("item"=>"about the place","isCorrect"=>false),
                "2"=>array("item"=>"where", "isCorrect"=>true),
                "3"=>array("item"=>"of where","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8gfi.mp3',
                    "timeRange"     =>"00:06-00:13",
                    "text"=>"Helen and William were worried about their son, Harry, because no one knew where he went.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8gfi.mp3',
                    "timeRange"     =>"00:06-00:13",
                    "text"=>"Helen and William were worried about their son, Harry, because no one knew where he went.",
                 ),
            ),
            "picture"=>"images/type_click_001.png"
        );
        $data['events'][] = array(
            "num"=>"7",
            "content_id"=>1388,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"01:38-01:44",
            "scores"=>10,
            "text" => "No sooner had Jack finished his speech _ thunderous applause broke out.  ",
            "answer"=>"No sooner had Jack finished his speech than thunderous applause broke out.",
            "items" => array(
                "0"=>array("item"=>"when", "isCorrect"=>false),
                "1"=>array("item"=>"then","isCorrect"=>false),
                "2"=>array("item"=>"than", "isCorrect"=>true),
                "3"=>array("item"=>"as","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2gfi.mp3',
                    "timeRange"     =>"01:38-01:44",
                    "text"=>"No sooner had Jack finished his speech than thunderous applause broke out.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2gfi.mp3',
                    "timeRange"     =>"01:38-01:44",
                    "text"=>"No sooner had Jack finished his speech than thunderous applause broke out.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"8",
            "content_id"=>1389,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"00:40-00:47",
            "scores"=>10,
            "text" => "I like shirts made of pure cotton because they _ very soft.",
            "answer"=>"I like shirts made of pure cotton because they feel very soft.",
            "items" => array(
                "0"=>array("item"=>"feel","isCorrect"=>true),
                "1"=>array("item"=>"felt","isCorrect"=>false),
                "2"=>array("item"=>"are feeling", "isCorrect"=>false),
                "3"=>array("item"=>"are felt","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3gfi.mp3',
                    "timeRange"     =>"00:40-00:47",
                    "text"=>"I like shirts made of pure cotton because they feel very soft."
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3gfi.mp3',
                    "timeRange"     =>"00:40-00:47",
                    "text"=>"I like shirts made of pure cotton because they feel very soft."
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"9",
            "content_id"=>1390,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"00:55-01:05",
            "scores"=>10,
            "text" => "Let's go back home. It's _ dark. | OK. And it _ that it's going to rain soon.",
            "answer"=>"Let's go back home. It's getting dark.|OK. And it seems that it's going to rain soon.",
            "items" => array(
                "0"=>array("item"=>"looked", "isCorrect"=>false),
                "1"=>array("item"=>"getting","isCorrect"=>true),
                "2"=>array("item"=>"seems", "isCorrect"=>false),
                "3"=>array("item"=>"growing","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3gfi.mp3',
                    "timeRange"     =>"00:55-01:05",
                    "text"=>"Let's go back home. It's getting dark.|OK. And it seems that it's going to rain soon.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3gfi.mp3',
                    "timeRange"     =>"00:55-01:05",
                    "text"=>"Let's go back home. It's getting dark.|OK. And it seems that it's going to rain soon.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );
        $data['events'][] = array(
            "num"=>"10",
            "content_id"=>1391,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"01:32-01:39",
            "scores"=>10,
            "text" => "Although Leo has taken lots of medicine his health _ poor.",
            "answer"=>"Although Leo has taken lots of medicine his health remains poor.",
            "items" => array(
                "0"=>array("item"=>"remains", "isCorrect"=>true),
                "1"=>array("item"=>"continues","isCorrect"=>false),
                "2"=>array("item"=>"maintains", "isCorrect"=>false),
                "3"=>array("item"=>"keeps","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3gfi.mp3',
                    "timeRange"     =>"01:32-01:39",
                    "text" => "Although Leo has taken lots of medicine his health remains poor.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3gfi.mp3',
                    "timeRange"     =>"00:46-00:51",
                    "text" => "Farmers are deserting their land and heading for big cities to look for jobs.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );
        $data['events'][] = array(
            "num"=>"11",
            "content_id"=>1392,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"00:13-00:17",
            "scores"=>10,
            "text" => "Helen is sad because her new car _ scratched yesterday.",
            "answer"=>"Helen is sad because her new car was scratched yesterday.",
            "items" => array(
                "0"=>array("item"=>"was", "isCorrect"=>true),
                "1"=>array("item"=>"were","isCorrect"=>false),
                "2"=>array("item"=>"became", "isCorrect"=>false),
                "3"=>array("item"=>"turned","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8gfi.mp3',
                    "timeRange"     =>"00:13-00:17",
                    "text"=>"Helen is sad because her new car was scratched yesterday.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8gfi.mp3',
                    "timeRange"     =>"00:13-00:17",
                    "text"=>"Helen is sad because her new car was scratched yesterday.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"12",
            "content_id"=>1393,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"00:26-00:32",
            "scores"=>10,
            "text" => "When wireless networks _ in disasters, old-fashioned phones matter. ",
            "answer"=>"When wireless networks break down in disasters, old-fashioned phones matter.",
            "items" => array(
                "0"=>array("item"=>"turn down", "isCorrect"=>false),
                "1"=>array("item"=>"turn out","isCorrect"=>false),
                "2"=>array("item"=>"break down", "isCorrect"=>true),
                "3"=>array("item"=>"break out","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4gfi.mp3',
                    "timeRange"     =>"00:26-00:32",
                    "text" => "When wireless networks break down in disasters, old-fashioned phones matter.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4gfi.mp3',
                    "timeRange"     =>"00:26-00:32",
                    "text" => "When wireless networks break down in disasters, old-fashioned phones matter.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"13",
            "content_id"=>1394,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"00:50-00:57",
            "scores"=>10,
            "text" => "Many people are beginning to reflect on  what kind of consequences studying abroad will _ .",
            "answer"=>"Many people are beginning to reflect on what kind of consequences studying abroad will bring about.",
            "items" => array(
                "0"=>array("item"=>"bring out", "isCorrect"=>false),
                "1"=>array("item"=>"bring down", "isCorrect"=>false),
                "2"=>array("item"=>"bring about","isCorrect"=>true),
                "3"=>array("item"=>"bring up","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4gfi.mp3',
                    "timeRange"     =>"00:50-00:57",
                    "text" => "Many people are beginning to reflect on what kind of consequences studying abroad will bring about.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4gfi.mp3',
                    "timeRange"     =>"00:50-00:57",
                    "text" => "Many people are beginning to reflect on what kind of consequences studying abroad will bring about.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"14",
            "content_id"=>1395,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"01:42-01:46",
            "scores"=>10,
            "text" => "She must have been _ on her way here in the traffic jam.",
            "answer"=>"She must have been held up on her way here in the traffic jam.",
            "items" => array(
                "0"=>array("item"=>"held up", "isCorrect"=>true),
                "1"=>array("item"=>"put up", "isCorrect"=>false),
                "2"=>array("item"=>"taken up","isCorrect"=>false),
                "3"=>array("item"=>"given up","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4gfi.mp3',
                    "timeRange"     =>"01:42-01:46",
                    "text"=>"She must have been held up on her way here in the traffic jam.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4gfi.mp3',
                    "timeRange"     =>"01:42-01:46",
                    "text"=>"She must have been held up on her way here in the traffic jam.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"15",
            "content_id"=>1396,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"00:31-00:35",
            "scores"=>10,
            "text" => "I _ that you were waiting, otherwise I would have come sooner.",
            "answer"=>"I didn't know that you were waiting, otherwise I would have come sooner.",
            "items" => array(
                "0"=>array("item"=>"don't know", "isCorrect"=>true),
                "1"=>array("item"=>"haven't known","isCorrect"=>false),
                "2"=>array("item"=>"hadn't known", "isCorrect"=>false),
                "3"=>array("item"=>"didn't know","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5gfi.mp3',
                    "timeRange"     =>"00:31-00:35",
                    "text"=>"I didn't know that you were waiting, otherwise I would have come sooner.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5gfi.mp3',
                    "timeRange"     =>"00:31-00:35",
                    "text"=>"I didn't know that you were waiting, otherwise I would have come sooner.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"16",
            "content_id"=>1397,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"01:10-01:15",
            "scores"=>10,
            "text" =>"You _ the look on the manager's face when he admitted his fault.　",
            "answer"=>"You should have seen the look on the manager's face when he admitted his fault.　",
            "items" => array(
                "0"=>array("item"=>"should have seen", "isCorrect"=>true),
                "1"=>array("item"=>"would have seen","isCorrect"=>false),
                "2"=>array("item"=>"must have seen", "isCorrect"=>false),
                "3"=>array("item"=>"could have seen","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5gfi.mp3',
                    "timeRange"     =>"01:10-01:15",
                    "text"=>"You should have seen the look on the manager's face when he admitted his fault.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5gfi.mp3',
                    "timeRange"     =>"01:10-01:15",
                    "text"=>"You should have seen the look on the manager's face when he admitted his fault.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );
        $data['events'][] = array(
            "num"=>"17",
            "content_id"=>1398,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"00:17-00:21",
            "scores"=>10,
            "text" => "Without _ , no one is allowed to enter the spot.",
            "answer"=>"Without permission, no one is allowed to enter the spot.",
            "items" => array(
                "0"=>array("item"=>"permission", "isCorrect"=>true),
                "1"=>array("item"=>"permit","isCorrect"=>false),
                "2"=>array("item"=>"permitting", "isCorrect"=>false),
                "3"=>array("item"=>"permissive","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6gfi.mp3',
                    "timeRange"     =>"00:17-00:21",
                    "text"=>"Without permission, no one is allowed to enter the spot.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6gfi.mp3',
                    "timeRange"     =>"00:17-00:21",
                    "text"=>"Without permission, no one is allowed to enter the spot.",

                ),
            ),
            "picture"=>"images/type_click_001.png"
        );
        $data['events'][] = array(
            "num"=>"18",
            "content_id"=>1399,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"01:09-01:13",
            "scores"=>10,
            "text" => "He _ let that animal escape from the cage. ",
            "answer"=>"He intentionally let that animal escape from the cage.",
            "items" => array(
                "0"=>array("item"=>"intend", "isCorrect"=>false),
                "1"=>array("item"=>"intention","isCorrect"=>false),
                "2"=>array("item"=>"intentionally", "isCorrect"=>true),
                "3"=>array("item"=>"intentional","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6gfi.mp3',
                    "timeRange"     =>"01:09-01:13",
                    "text"=>"He intentionally let that animal escape from the cage.",
                ),
                "No"=>array(
                    "Yes"=>array(
                        "media_type"=>"audio",
                        "media_filename"=>'media/u6gfi.mp3',
                        "timeRange"     =>"01:09-01:13",
                        "text"=>"He intentionally let that animal escape from the cage.",
                    ),
                  ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"19",
            "content_id"=>1400,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"00:20-00:25",
            "scores"=>10,
            "text" => "The director avoided giving a _ answer to the sharp question. ",
            "answer"=>"The director avoided giving a direct answer to the sharp question.",
            "items" => array(
                "0"=>array("item"=>"directing", "isCorrect"=>false),
                "1"=>array("item"=>"direct", "isCorrect"=>false),
                "2"=>array("item"=>"direction","isCorrect"=>false),
                "3"=>array("item"=>"director","isCorrect"=>true),
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
            "num"=>"20",
            "content_id"=>1401,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"01:26-01:31",
            "scores"=>10,
            "text" => "Joe's hard work paid off. He was promoted to _ of the company. ",
            "answer"=>"Joe's hard work paid off. He was promoted to CEO of the company. ",
            "items" => array(
                "0"=>array("item"=>"UFO", "isCorrect"=>false),
                "1"=>array("item"=>"IMO", "isCorrect"=>false),
                "2"=>array("item"=>"CEO","isCorrect"=>false),
                "3"=>array("item"=>"WHO","isCorrect"=>true),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7gfi.mp3',
                    "timeRange"     =>"01:26-01:31",
                    "text"=>"Joe's hard work paid off. He was promoted to CEO of the company.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u7gfi.mp3',
                    "timeRange"     =>"01:26-01:31",
                    "text"=>"Joe's hard work paid off. He was promoted to CEO of the company.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );
         $this->saveEventListToDatabases($data);$a =  json_encode($data);
        $fp = fopen('json216.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
        return;
    }


    public function getPart217(){
        $data = array(
            "unit_id"       =>8,
            "lesson_id"     =>46,
            "part_id"       =>217,
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
            "content_id"=>1402,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"01:12-01:18",
            "scores"=>1,
            "text" => "Alice used to be a shy girl but she has grown out of it now.",
            "items" => array(
                "0"=>array("item"=>"Alice used to be"),
                "1"=>array("item"=>"a shy girl"),
                "2"=>array("item"=>"but she"),
                "3"=>array("item"=>"has grown out of it now."),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1gso.mp3',
                    "timeRange"     =>"01:12-01:18",
                    "text" => "Alice used to be a shy girl but she has grown out of it now.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1gso.mp3',
                    "timeRange"     =>"01:12-01:18",
                    "text" => "Alice used to be a shy girl but she has grown out of it now.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );
        $data['events'][] = array(
            "num"=>"2",
            "content_id"=>1403,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"00:00-00:04",
            "scores"=>1,
            "text" => "Andy decided to become a photographer when he was young.",
            "items" => array(
                "0"=>array("item"=>"Andy decided to"),
                "1"=>array("item"=>"become a photographer"),
                "2"=>array("item"=>"when"),
                "3"=>array("item"=>"he was young.")
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8gso.mp3',
                    "timeRange"     =>"00:00-00:04",
                    "text" => "Andy decided to become a photographer when he was young.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8gso.mp3',
                    "timeRange"     =>"00:00-00:04",
                    "text" => "Andy decided to become a photographer when he was young.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );
        $data['events'][] = array(
            "num"=>"3",
            "content_id"=>1404,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"00:39-00:46",
            "scores"=>1,
            "text" => "The situation is far more complicated than Jack could imagine.",
            "items" => array(
                "0"=>array("item"=>"The situation"),
                "1"=>array("item"=>"is far more complicated"),
                "2"=>array("item"=>"than"),
                "3"=>array("item"=>"Jack could imagine."),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2gso.mp3',
                    "timeRange"     =>"00:39-00:46",
                    "text" => "The situation is far more complicated than Jack could imagine.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2gso.mp3',
                    "timeRange"     =>"00:39-00:46",
                    "text" => "The situation is far more complicated than Jack could imagine.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );
        $data['events'][] = array(
            "num"=>"4",
            "content_id"=>1405,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"00:32-00:39",
            "scores"=>1,
            "text" => "This is one of the most wonderful films Amy has ever seen.",
            "items" => array(
                "0"=>array("item"=>"This is"),
                "1"=>array("item"=>"one of the most wonderful films"),
                "3"=>array("item"=>"Amy"),
                "2"=>array("item"=>"has ever seen.")
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2gso.mp3',
                    "timeRange"     =>"00:32-00:39",
                    "text" => "This is one of the most wonderful films Amy has ever seen.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2gso.mp3',
                    "timeRange"     =>"00:32-00:39",
                    "text" => "This is one of the most wonderful films Amy has ever seen.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );
        $data['events'][] = array(
            "num"=>"5",
            "content_id"=>1406,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"01:54-02:02",
            "scores"=>1,
            "text" => "Amy explained everything over again lest anyone should misunderstand her.",
            "items" => array(
                "0"=>array("item"=>"Amy explained everything"),
                "1"=>array("item"=>"over again"),
                "2"=>array("item"=>"lest"),
                "3"=>array("item"=>"anyone should misunderstand her.")
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2gso.mp3',
                    "timeRange"     =>"01:54-02:02",
                    "text" => "TAmy explained everything over again lest anyone should misunderstand her.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2gso.mp3',
                    "timeRange"     =>"01:54-02:02",
                    "text" => "TAmy explained everything over again lest anyone should misunderstand her.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );
        $data['events'][] = array(
            "num"=>"6",
            "content_id"=>1407,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"01:09-01:16",
            "scores"=>1,
            "text" => "Meat can stay fresh for a few days if it's put in the fridge.",
            "items" => array(
                "0"=>array("item"=>"Meat can stay fresh"),
                "1"=>array("item"=>"for a few days"),
                "2"=>array("item"=>"if"),
                "3"=>array("item"=>"it's put in the fridge."),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3gso.mp3',
                    "timeRange"     =>"01:09-01:16",
                    "text" => "Meat can stay fresh for a few days if it's put in the fridge.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3gso.mp3',
                    "timeRange"     =>"01:09-01:16",
                    "text" => "Meat can stay fresh for a few days if it's put in the fridge.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"7",
            "content_id"=>1408,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"01:22-01:28",
            "scores"=>1,
            "text" => "Leo fell ill after he finished his long business trip.",
            "items" => array(
                "0"=>array("item"=>"Leo fell ill"),
                "1"=>array("item"=>"after"),
                "2"=>array("item"=>"he finished"),
                "3"=>array("item"=>"his long business trip."),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3gso.mp3',
                    "timeRange"     =>"01:22-01:28",
                    "text" => "Leo fell ill after he finished his long business trip.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3gso.mp3',
                    "timeRange"     =>"01:22-01:28",
                    "text" => "Leo fell ill after he finished his long business trip.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"8",
            "content_id"=>1409,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"00:32-00:36",
            "scores"=>1,
            "text" => "Why do we have to put up with his selfish behavior?",
            "items" => array(
                "0"=>array("item"=>"Why do we"),
                "1"=>array("item"=>"have to"),
                "2"=>array("item"=>"put up with"),
                "3"=>array("item"=>"his selfish behavior?")
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4gso.mp3',
                    "timeRange"     =>"00:32-00:36",
                    "text" => "Why do we have to put up with his selfish behavior?",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4gso.mp3',
                    "timeRange"     =>"00:32-00:36",
                    "text" => "Why do we have to put up with his selfish behavior?",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"9",
            "content_id"=>1410,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"00:10-00:15",
            "scores"=>1,
            "text" => "Measures have been taken to bring down the high prices of daily goods.",
            "items" => array(
                "0"=>array("item"=>"Measures have been taken"),
                "1"=>array("item"=>"to bring down"),
                "2"=>array("item"=>"the high prices"),
                "3"=>array("item"=>"of daily goods."),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4gso.mp3',
                    "timeRange"     =>"00:10-00:15",
                    "text" => "Measures have been taken to bring down the high prices of daily goods.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4gso.mp3',
                    "timeRange"     =>"00:10-00:15",
                    "text" => "Measures have been taken to bring down the high prices of daily goods.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"10",
            "content_id"=>1411,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"00:40-00:45",
            "scores"=>1,
            "text" => "This insect takes on the colour of its surroundings to protect itself.",
            "items" => array(
                "0"=>array("item"=>"This insect"),
                "1"=>array("item"=>"takes on the colour"),
                "2"=>array("item"=>"of its surroundings"),
                "3"=>array("item"=>"to protect itself.")
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4gso.mp3',
                    "timeRange"     =>"00:40-00:45",
                    "text" => "This insect takes on the colour of its surroundings to protect itself.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4gso.mp3',
                    "timeRange"     =>"00:40-00:45",
                    "text" => "This insect takes on the colour of its surroundings to protect itself.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"11",
            "content_id"=>1412,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"00:17-00:20",
            "scores"=>1,
            "text" => "Never have I been abroad before.",
            "items" => array(
                "0"=>array("item"=>"Never"),
                "1"=>array("item"=>"have I"),
                "2"=>array("item"=>"been abroad"),
                "3"=>array("item"=>"before."),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5gso.mp3',
                    "timeRange"     =>"00:17-00:20",
                    "text" => "Never have I been abroad before.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5gso.mp3',
                    "timeRange"     =>"00:17-00:20",
                    "text" => "Never have I been abroad before.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"12",
            "content_id"=>1413,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"00:50-00:54",
            "scores"=>1,
            "text" => "You are meant to be an artist.",
            "items" => array(
                "0"=>array("item"=>"You"),
                "1"=>array("item"=>"are meant to be"),
                "2"=>array("item"=>"an artist.")
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5gso.mp3',
                    "timeRange"     =>"00:52-00:55",
                    "text" => "You are meant to be an artist.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5gso.mp3',
                    "timeRange"     =>"00:52-00:55",
                    "text" => "You are meant to be an artist.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"13",
            "content_id"=>1414,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"00:47-00:52",
            "scores"=>1,
            "text" => "You are supposed to speak fluent English after studying it for 10 ten years.",
            "items" => array(
                "0"=>array("item"=>"You are supposed to"),
                "1"=>array("item"=>"speak fluent English"),
                "2"=>array("item"=>"after studying it"),
                "3"=>array("item"=>"for 10 ten years."),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5gso.mp3',
                    "timeRange"     =>"00:47-00:52",
                    "text" => "You are supposed to speak fluent English after studying it for 10 ten years.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5gso.mp3',
                    "timeRange"     =>"00:47-00:52",
                    "text" => "You are supposed to speak fluent English after studying it for 10 ten years.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"14",
            "content_id"=>1415,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"01:05-01:11",
            "scores"=>1,
            "text" => "Families on social security benefits will be seriously affected by the new policy. ",
            "items" => array(
                "0"=>array("item"=>"Families"),
                "1"=>array("item"=>"on social security benefits"),
                "2"=>array("item"=>"will be seriously affected"),
                "3"=>array("item"=>"by the new policy."),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6gso.mp3',
                    "timeRange"     =>"01:05-01:11",
                    "text" => "Families on social security benefits will be seriously affected by the new policy.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6gso.mp3',
                    "timeRange"     =>"01:05-01:11",
                    "text" => "Families on social security benefits will be seriously affected by the new policy.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"15",
            "content_id"=>1416,
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
                "3"=>array("item"=>"on his own."),
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

         $this->saveEventListToDatabases($data);$a =  json_encode($data);
        $fp = fopen('json217.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
        return;
    }

    public function getPart218(){
        $data = array(
            "unit_id"       =>8,
            "lesson_id"     =>46,
            "part_id"       =>218,
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
            "content_id"=>1417,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"sr_ordering",
            "timeRange"     =>"00:00-00:04",
            "scores"=>1,
            "text" => "Whether you get the job or not depends on your English.",
            "answer" => "Whether you get the job or not depends on your English",
            "items" => array(
                "0"=>array("item"=>"Whether"),
                "1"=>array("item"=>"you get the job"),
                "2"=>array("item"=>"or not"),
                "3"=>array("item"=>"depends on your English."),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8gsf.mp3',
                    "timeRange"     =>"00:00-00:04",
                    "text" => "Doctors should be patient with their patients.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8gsf.mp3',
                    "timeRange"     =>"00:00-00:04",
                    "text" => "Doctors should be patient with their patients.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"2",
            "content_id"=>1418,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"sr_ordering",
            "timeRange"     =>"00:44-00:50",
            "scores"=>1,
            "text" => "Hardly had Andy reached the airport when the plane took off. ",
            "answer" => "Hardly had Andy reached the airport when the plane took off. ",
            "items" => array(
                "0"=>array("item"=>"Hardly had Andy"),
                "1"=>array("item"=>"reached the airport"),
                "2"=>array("item"=>"when"),
                "3"=>array("item"=>"the plane took off."),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2gsf.mp3',
                    "timeRange"     =>"00:44-00:50",
                    "text" => "Hardly had Andy reached the airport when the plane took off.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2gsf.mp3',
                    "timeRange"     =>"00:44-00:50",
                    "text" => "Hardly had Andy reached the airport when the plane took off.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"3",
            "content_id"=>1419,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"sr_ordering",
            "timeRange"     =>"00:04-00:08",
            "scores"=>1,
            "text" => "Andy's trip to Europe turned out to be a nightmare.",
            "answer" => "Andy's trip to Europe turned out to be a nightmare.",
            "items" => array(
                "0"=>array("item"=>"Andy's trip"),
                "1"=>array("item"=>"to Europe"),
                "2"=>array("item"=>"turned out to be"),
                "3"=>array("item"=>"a nightmare."),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8gsf.mp3',
                    "timeRange"     =>"00:04-00:08",
                    "text" => "Andy's trip to Europe turned out to be a nightmare.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u8gsf.mp3',
                    "timeRange"     =>"00:04-00:08",
                    "text" => "Andy's trip to Europe turned out to be a nightmare.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"4",
            "content_id"=>1420,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"sr_ordering",
            "timeRange"     =>"00:48-00:53",
            "scores"=>1,
            "text" => "It's going to stay hot for the next few days.",
            "answer" => "It's going to stay hot for the next few days",
            "items" => array(
                "0"=>array("item"=>"It's going to"),
                "1"=>array("item"=>"stay hot"),
                "2"=>array("item"=>"for"),
                "3"=>array("item"=>"the next few days."),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3gsf.mp3',
                    "timeRange"     =>"00:48-00:53",
                    "text" => "It's going to stay hot for the next few days.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3gsf.mp3',
                    "timeRange"     =>"00:48-00:53",
                    "text" => "It's going to stay hot for the next few days.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"5",
            "content_id"=>1421,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"sr_ordering",
            "timeRange"     =>"00:33-00:37",
            "scores"=>1,
            "text" => "Cheaters never win and winners never cheat.",
            "answer" => "Cheaters never win and winners never cheat.",
            "items" => array(
                "0"=>array("item"=>"Cheaters never win"),
                "1"=>array("item"=>"and"),
                "2"=>array("item"=>" winners never cheat.")
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4gsf.mp3',
                    "timeRange"     =>"00:33-00:37",
                    "text" => "Cheaters never win and winners never cheat.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4gsf.mp3',
                    "timeRange"     =>"00:33-00:37",
                    "text" => "Cheaters never win and winners never cheat.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"6",
            "content_id"=>1422,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"sr_ordering",
            "timeRange"     =>"00:29-00:33",
            "scores"=>1,
            "text" => "A person is known by the company he keeps.",
            "answer" => "A person is known by the company he keeps.",
            "items" => array(
                "0"=>array("item"=>"A person"),
                "1"=>array("item"=>"is known"),
                "2"=>array("item"=>"by the company"),
                "3"=>array("item"=>"he keeps."),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4gsf.mp3',
                    "timeRange"     =>"00:29-00:33",
                    "text" => "A person is known by the company he keeps.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4gsf.mp3',
                    "timeRange"     =>"00:29-00:33",
                    "text" => "A person is known by the company he keeps.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"7",
            "content_id"=>1423,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"sr_ordering",
            "timeRange"     =>"00:23-00:26",
            "scores"=>1,
            "text" => "Are you willing to share your ideas with us?",
            "answer" => "Are you willing to share your ideas with us?",
            "items" => array(
                "0"=>array("item"=>"Are you willing"),
                "1"=>array("item"=>"to share your ideas"),
                "2"=>array("item"=>" with us?"),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5gsf.mp3',
                    "timeRange"     =>"00:31-00:34",
                    "text" => "Are you willing to share your ideas with us?",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5gsf.mp3',
                    "timeRange"     =>"00:31-00:34",
                    "text" => "Are you willing to share your ideas with us?",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"8",
            "content_id"=>1424,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"sr_ordering",
            "timeRange"     =>"00:27-00:31",
            "scores"=>1,
            "text" => "It is likely to snow tonight according to the weather report.",
            "answer" => "It is likely to snow tonight according to the weather report",
            "items" => array(
                "0"=>array("item"=>"It is likely"),
                "1"=>array("item"=>"to snow tonight"),
                "2"=>array("item"=>"according to"),
                "3"=>array("item"=>"the weather report."),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5gsf.mp3',
                    "timeRange"     =>"00:27-00:31",
                    "text" => "It is likely to snow tonight according to the weather report.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5gsf.mp3',
                    "timeRange"     =>"00:27-00:31",
                    "text" => "It is likely to snow tonight according to the weather report.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"9",
            "content_id"=>1425,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"sr_ordering",
            "timeRange"     =>"00:00-00:04",
            "scores"=>1,
            "text" => "Try to act naturally, even if you are tense.",
            "answer" => "Try to act naturally, even if you are tense.",
            "items" => array(
                "0"=>array("item"=>"Try to act"),
                "1"=>array("item"=>"naturally,"),
                "2"=>array("item"=>"even if"),
                "3"=>array("item"=>"you are tense."),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6gsf.mp3',
                    "timeRange"     =>"00:00-00:04",
                    "text" => "Try to act naturally, even if you are tense.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6gsf.mp3',
                    "timeRange"     =>"00:00-00:04",
                    "text" => "Try to act naturally, even if you are tense.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"10",
            "content_id"=>1426,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"sr_ordering",
            "timeRange"     =>"00:08-00:12",
            "scores"=>1,
            "text" => "Cherish the present, for every day is a present.",
            "answer" => "Cherish the present, for every day is a present",
            "items" => array(
                "0"=>array("item"=>"Cherish the present,"),
                "1"=>array("item"=>"for"),
                "2"=>array("item"=>"every day"),
                "3"=>array("item"=>"is a present."),
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
                    "timeRange"     =>"00:32-00:35",
                    "text" => "I'm glad that you are over the flu.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

         $this->saveEventListToDatabases($data);$a =  json_encode($data);
        $fp = fopen('json218.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
        return;
    }

    //最新MT
    public function getPart219(){
        $data = array(
            "unit_id"       =>8,
            "lesson_id"     =>47,
            "part_id"       =>219,
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
                2=>array(1,2,4,5),
                3=>array(2,3,4,5)
            ),
            "keywords"   =>array(
            ),
        );

        $data['events'][] = array(
            "num"=>"1",
            "type"=>"MTmultipleChoices",
            "media_type"=>"audio",
            "media_filename"=>'media/u8p_original_mt.mp3',
            "timeRange"=>"00:12-00:26",
            "content"=>"Betty majored in consumer science. She went to university at the age of 17. She had a very easy life during the last semester because she only had three courses to take in addition to writing her thesis.",
            "text"=>"Betty majored in consumer science. She went to university at the age of 17. She had a very easy life during the last semester because she only had three courses to take in addition to writing her thesis.",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"1",
                    "content_id"=>1427,
                    "type"=>"multipleChoice",
                    "text"=>array("type"=>"text","text"=>"What is Betty's major?"),
                    "scores"=>5,
                    "items"=>array(
                        "0"=>array("item"=>"Computer science.","isCorrect"=>false),
                        "1"=>array("item"=>"Consumer science.", "isCorrect"=>true),
                        "2"=>array("item"=>"Cognitive science.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                    ),
                ),
                1=>array(
                    "num"=>"2",
                    "content_id"=>1428,
                    "type"=>"multipleChoice",
                    "text"=>array("type"=>"text","text"=>"Why did she have an easy life last semester?"),
                    "scores"=>5,
                    "items"=>array(
                        "0"=>array("item"=>"Because she had very few courses.","isCorrect"=>true),
                        "1"=>array("item"=>"Because she only had one thesis to write.", "isCorrect"=>false),
                        "2"=>array("item"=>"Because she had no courses other than writing her thesis.", "isCorrect"=>false),
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
            "media_filename"=>'media/u8p_original_mt.mp3',
            "timeRange"=>"01:01-01:08",
            "content"=>"She usually started her work by reading emails for her boss. She learned a lot from the internship.",
            "text"=>"She usually started her work by reading emails for her boss. She learned a lot from the internship.",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"1",
                    "content_id"=>1429,
                    "type"=>"multipleChoice",
                    "text"=>array("type"=>"text","text"=>"How did she usually start her work?"),
                    "scores"=>5,
                    "items"=>array(
                        "0"=>array("item"=>"By reading emails for her boss.","isCorrect"=>true),
                        "1"=>array("item"=>"By reading news on line.", "isCorrect"=>false),
                        "2"=>array("item"=>"By replying  to her workmates emails.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                    ),
                ),
                1=>array(
                    "num"=>"2",
                    "content_id"=>1430,
                    "type"=>"multipleChoice",
                    "text"=>array("type"=>"text","text"=>"Why might Betty have liked her internship?"),
                    "scores"=>5,
                    "items"=>array(
                        "0"=>array("item"=>"She learned a lot.","isCorrect"=>true),
                        "1"=>array("item"=>"She likes to research.", "isCorrect"=>false),
                        "2"=>array("item"=>"She likes to work in a big company.", "isCorrect"=>false),
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
            "media_filename"=>'media/u8p_original_mt.mp3',
            "timeRange"=>"00:22-00:34",
            "content"=>"Linda: How about the afternoon?July: I only had three classes in the afternoon, chemistry, art and PE, physical education. I usually got home at 4 pm.",
            "text"=>"Linda: How about the afternoon?July: I only had three classes in the afternoon, chemistry, art and PE, physical education. I usually got home at 4 pm.",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"1",
                    "content_id"=>1431,
                    "type"=>"multipleChoice",
                    "text"=>array("type"=>"text","text"=>"What classes did she have in the afternoon?"),
                    "scores"=>5,
                    "items"=>array(
                        "0"=>array("item"=>"Chemistry, art and PE.","isCorrect"=>true),
                        "1"=>array("item"=>"Chemistry, art and math.", "isCorrect"=>false),
                        "2"=>array("item"=>"Chemistry, math and PE.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                    ),
                ),
                1=>array(
                    "num"=>"1",
                    "content_id"=>1431,
                    "type"=>"multipleChoice",
                    "text"=>array("type"=>"text","text"=>"When did she finish her classes in the afternoon?"),
                    "scores"=>5,
                    "items"=>array(
                        "0"=>array("item"=>"Before 4 pm.","isCorrect"=>true),
                        "1"=>array("item"=>"At 4 pm.", "isCorrect"=>false),
                        "2"=>array("item"=>"After 4 pm.", "isCorrect"=>false),
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
            "media_filename"=>'media/u8d_original_mt.mp3',
            "timeRange"=>"01:05-01:23",
            "content"=>"Linda: Did they take good care of you?July: Yes, they did. Actually, Lidia, the third oldest sister, was as old as me. She was very nice. She helped me get used to life there. Mrs. Blake also tried really hard to make sure I felt comfortable. ",
            "text"=>"Linda: Did they take good care of you?July: Yes, they did. Actually, Lidia, the third oldest sister, was as old as me. She was very nice. She helped me get used to life there. Mrs. Blake also tried really hard to make sure I felt comfortable. ",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"1",
                    "content_id"=>1432,
                    "type"=>"multipleChoice",
                    "text"=>array("type"=>"text","text"=>"Who helped July to get used to the new environment?"),
                    "scores"=>5,
                    "items"=>array(
                        "0"=>array("item"=>"Lidia, the third oldest sister.","isCorrect"=>true),
                        "1"=>array("item"=>"Mrs. Blake.", "isCorrect"=>false),
                        "2"=>array("item"=>"Mr. Blake.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                    ),
                ),
                1=>array(
                    "num"=>"2",
                    "content_id"=>1433,
                    "type"=>"multipleChoice",
                    "text"=>array("type"=>"text","text"=>"What is Mrs. Blake like?"),
                    "scores"=>5,
                    "items"=>array(
                        "0"=>array("item"=>"She's very kind and caring.","isCorrect"=>true),
                        "1"=>array("item"=>"She's very busy at work.", "isCorrect"=>false),
                        "2"=>array("item"=>"She's cold and serious.", "isCorrect"=>false),
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
            "media_filename"=>'media/u8d_original_mt.mp3',
            "timeRange"=>"01:51-02:03",
            "content"=>"Linda: Wonderful! My mom wants me to study abroad next year too. I think I will also choose a homestay.July Yes, you should! You won't regret it at all.",
            "text"=>"Linda: Wonderful! My mom wants me to study abroad next year too. I think I will also choose a homestay.July Yes, you should! You won't regret it at all.",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"1",
                    "content_id"=>1434,
                    "type"=>"multipleChoice",
                    "text"=>array("type"=>"text","text"=>"Why does Linda want to choose a homestay?"),
                    "scores"=>5,
                    "items"=>array(
                        "0"=>array("item"=>"July's good experience with her host family interested her.","isCorrect"=>true),
                        "1"=>array("item"=>"She has no relatives in America.", "isCorrect"=>false),
                        "2"=>array("item"=>"She doesn't like to live on campus.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                    ),
                )
            ),
            "picture"=>"images/type_listen_001.png"
        );


         $this->saveEventListToDatabases($data);$a =  json_encode($data);
        $fp = fopen('json219.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
        return;
    }

    public function getPart220(){
        $data = array(
            "unit_id"       =>8,
            "lesson_id"     =>47,
            "part_id"       =>220,
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
            "content_id"=>1435,
            "type"=>"MTmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u8p_original_mt.mp3',
            "timeRange"=>"00:00-00:12",
            "content"=>"Lucy's sister Betty got to experience a different kind of school life at a University in Europe several years ago. She graduated last year with a Bachelor's degree in Science. ",
            "text"=>array("type"=>"audio","text"=>"Where did Betty earn her Bachelor's degree?","media_filename"=>'media/u8pcq.mp3',"timeRange"=>"00:00-00:03"),
            "scores"=>7,
            "items"=>array(
                "0"=>array("item"=>"In Europe.","isCorrect"=>true),
                "1"=>array("item"=>"In America.", "isCorrect"=>false),
                "2"=>array("item"=>"In China.","isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_listen_001.png"
        );

        $data['events'][] = array(
            "num"=>"2",
            "content_id"=>1436,
            "type"=>"MTmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u8p_original_mt.mp3',
            "timeRange"=>"00:34-00:45",
            "content"=>"She had all her three meals at the school dining-hall because she stayed on the campus. She would usually go swimming at the school gym at around 5 o'clock in the afternoon. ",
            "text"=>array("type"=>"audio","text"=>"What did she usually do at the school gym?","media_filename"=>'media/u8pcq.mp3',"timeRange"=>"00:20-00:23"),
            "scores"=>7,
            "items"=>array(
                "0"=>array("item"=>"Go swimming.","isCorrect"=>true),
                "1"=>array("item"=>"Go jogging.", "isCorrect"=>false),
                "2"=>array("item"=>"Go dancing.", "isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_listen_001.png"
        );

        $data['events'][] = array(
            "num"=>"3",
            "content_id"=>1437,
            "type"=>"MTmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u8p_original_mt.mp3',
            "timeRange"=>"01:08-01:21",
            "content"=>"Betty had to spend a lot of time in the library writing her thesis. Her topic was about consumer behaviors. In order to write the thesis, she had to search for related research papers and books. ",
            "text"=>array("type"=>"audio","text"=>"What books did she usually search for in the library?","media_filename"=>'media/u8pcq.mp3',"timeRange"=>"00:47-00:51"),
            "scores"=>7,
            "items"=>array(
                "0"=>array("item"=>"Books about consumer behaviors.","isCorrect"=>true),
                "1"=>array("item"=>"Books about fashion.", "isCorrect"=>false),
                "2"=>array("item"=>"Books about writing theses.", "isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_listen_001.png"
        );

        $data['events'][] = array(
            "num"=>"4",
            "content_id"=>1438,
            "type"=>"MTmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u8p_original_mt.mp3',
            "timeRange"=>"01:34-01:50",
            "content"=>"During the weekends, she often went shopping or visited her friend Ada. Sometimes, they saw movies together or drove to different parks for picnics. Occasionally, Betty would have parties with Ada and Ada's colleagues on Saturday evenings. ",
            "text"=>array("type"=>"audio","text"=>"What DOESN'T  Betty  do on her weekends?","media_filename"=>'media/u8pcq.mp3',"timeRange"=>"01:12-01:15"),
            "scores"=>7,
            "items"=>array(
                "0"=>array("item"=>"Have parties with Ada.","isCorrect"=>false),
                "1"=>array("item"=>"Visit her friend Lidia.", "isCorrect"=>true),
                "2"=>array("item"=>"Watch movies with her friend.", "isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_listen_001.png"
        );


        $data['events'][] = array(
            "num"=>"5",
            "content_id"=>1439,
            "type"=>"MTmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u8p_original_mt.mp3',
            "timeRange"=>"02:01-02:08",
            "content"=>"She never does any work on weekends. As before, weekends are her time to enjoy herself.",
            "text"=>array("type"=>"audio","text"=>"What does she do on her weekends?","media_filename"=>'media/u8pcq.mp3',"timeRange"=>"01:22-01:25"),
            "scores"=>7,
            "items"=>array(
                "0"=>array("item"=>"Go to the park.","isCorrect"=>true),
                "1"=>array("item"=>"Go to work.", "isCorrect"=>false),
                "2"=>array("item"=>"Research from home.", "isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_listen_001.png"
        );

        $data['events'][] = array(
            "num"=>"6",
            "content_id"=>1440,
            "type"=>"MTmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u8d_original_mt.mp3',
            "timeRange"=>"00:00-00:13",
            "content"=>"Linda: July, did you have a good time in America?July: Of course I did!Linda: Tell me all about it!July: Well, I usually arrived at school at 7:45. I got there by school bus. ",
            "text"=>array("type"=>"audio","text"=>"How did July go to school every day?","media_filename"=>'media/u8dcq.mp3',"timeRange"=>"00:06-00:10"),
            "scores"=>7,
            "items"=>array(
                "0"=>array("item"=>"By school bus.","isCorrect"=>true),
                "1"=>array("item"=>"By bus.", "isCorrect"=>false),
                "2"=>array("item"=>"By bike.", "isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_listen_001.png"
        );

        $data['events'][] = array(
            "num"=>"7",
            "content_id"=>1441,
            "type"=>"MTmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u8d_original_mt.mp3',
            "timeRange"=>"00:34-00:46",
            "content"=>"Linda: Tell me something about your homestay.July: It was really wonderful. My host family is a big family. Mr. and Mrs. Blake are very nice and they have six children. ",
            "text"=>array("type"=>"audio","text"=>"Who did July live with in America?","media_filename"=>'media/u8dcq.mp3',"timeRange"=>"00:52-00:55"),
            "scores"=>7,
            "items"=>array(
                "0"=>array("item"=>"With an American family.","isCorrect"=>true),
                "1"=>array("item"=>"With a relative.", "isCorrect"=>false),
                "2"=>array("item"=>"With her roommate in the dormitory.", "isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_listen_001.png"
        );

        $data['events'][] = array(
            "num"=>"8",
            "content_id"=>1442,
            "type"=>"MTmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u8d_original_mt.mp3',
            "timeRange"=>"00:46-00:54",
            "content"=>"July:  Mr. Blake was very busy during the week. Mrs. Blake was a housewife and took care of the family every day. ",
            "text"=>array("type"=>"audio","text"=>"Who took care of the family?","media_filename"=>'media/u8dcq.mp3',"timeRange"=>"01:10-01:13"),
            "scores"=>7,
            "items"=>array(
                "0"=>array("item"=>"Mrs. Blake.","isCorrect"=>true),
                "1"=>array("item"=>"Mr. Blake.", "isCorrect"=>false),
                "2"=>array("item"=>"Mr. and Mrs. Blake.", "isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_listen_001.png"
        );

        $data['events'][] = array(
            "num"=>"9",
            "content_id"=>1443,
            "type"=>"MTmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u8d_original_mt.mp3',
            "timeRange"=>"00:54-01:05",
            "content"=>"Usually, we were all back from school by 4 o'clock. One of the most wonderful times was dinner. We all sat together around the table, eating and chatting. ",
            "text"=>array("type"=>"audio","text"=>"Which of the following did July enjoy most?","media_filename"=>'media/u8dcq.mp3',"timeRange"=>"01:13-01:18"),
            "scores"=>7,
            "items"=>array(
                "0"=>array("item"=>"Dinner time.","isCorrect"=>true),
                "1"=>array("item"=>"Lunch time.", "isCorrect"=>false),
                "2"=>array("item"=>"Breakfast time.", "isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_listen_001.png"
        );

        $data['events'][] = array(
            "num"=>"10",
            "content_id"=>1444,
            "type"=>"MTmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u8d_original_mt.mp3',
            "timeRange"=>"01:23-01:35",
            "content"=>"Linda: Did you miss home?July: In the beginning, Yes. But 2 months later, I started to get used to life there. Besides, I talked to my Mum on WeChat almost every evening.",
            "text"=>array("type"=>"audio","text"=>"Did July have a good relationship with her mother?","media_filename"=>'media/u8dcq.mp3',"timeRange"=>"01:48-01:52"),
            "scores"=>7,
            "items"=>array(
                "0"=>array("item"=>"Yes.","isCorrect"=>true),
                "1"=>array("item"=>"No.", "isCorrect"=>false),
                "2"=>array("item"=>"I don't know.", "isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_listen_001.png"
        );


         $this->saveEventListToDatabases($data);$a =  json_encode($data);
        $fp = fopen('json220.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
        return;
    }

    public function getPart221(){
        $data = array(
            "unit_id"       =>8,
            "lesson_id"     =>47,
            "part_id"       =>221,
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
            "content_id"=>1445,
            "type"=>"SRmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u8p_original_mt.mp3',
            "timeRange"=>"00:26-00:34",
            "content"=>"She only had lectures on Wednesday mornings and Thursday afternoons. Usually she didn't get up until after 8. ",
            "text"=>array("type"=>"audio","text"=>"When did she have lectures according to the passage?","media_filename"=>'media/u8pcq.mp3',"timeRange"=>"00:13-00:17"),
            "scores"=>4,
            "items"=>array(
                "0"=>array("item"=>"Tuesday mornings..","answer"=>"Tuesday mornings","isCorrect"=>false),
                "1"=>array("item"=>"Thursday afternoons.","answer"=>"Thursday afternoons", "isCorrect"=>true),
                "2"=>array("item"=>"Friday afternoons.","answer"=>"Friday afternoons", "isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"2",
            "content_id"=>1446,
            "type"=>"SRmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u8p_original_mt.mp3',
            "timeRange"=>"00:45-01:01",
            "content"=>"During the last semester she did an internship. She got a part-time job in a small company downtown. She drove to work 3 days a week and worked 4 hours each time. She usually went to the company at 8. She worked as a research assistant. ",
            "text"=>array("type"=>"audio","text"=>"What did she do during her internship?","media_filename"=>'media/u8pcq.mp3',"timeRange"=>"00:28-00:31"),
            "scores"=>4,
            "items"=>array(
                "0"=>array("item"=>"She worked as a research assistant.","answer"=>"She worked as a research assistant","isCorrect"=>true),
                "1"=>array("item"=>"She worked as a researcher.", "answer"=>"She worked as a researcher","isCorrect"=>false),
                "2"=>array("item"=>"She worked as an administrative assistant.", "answer"=>"She worked as an administrative assistant","isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"3",
            "content_id"=>1447,
            "type"=>"SRmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u8p_original_mt.mp3',
            "timeRange"=>"01:50-02:01",
            "content"=>"Since the institution is located far away, she has to get up before 7 each morning. She has to dress up smartly. She leaves home for work at 7:50. ",
            "text"=>array("type"=>"audio","text"=>"Why does she get up very early every morning?","media_filename"=>'media/u8pcq.mp3',"timeRange"=>"01:18-01:22"),
            "scores"=>4,
            "items"=>array(
                "0"=>array("item"=>"Because her office is far from her home..","answer"=>"Because her office is far from her home","isCorrect"=>true),
                "1"=>array("item"=>"Because she is used to getting up early.", "answer"=>"Because she is used to getting up early","isCorrect"=>false),
                "2"=>array("item"=>"Because she wants to start work early.", "answer"=>"Because she wants to start work early","isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"4",
            "content_id"=>1448,
            "type"=>"SRmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u8d_original_mt.mp3',
            "timeRange"=>"00:13-00:22",
            "content"=>"Linda: How was the food there?July: In the beginning, I couldn't get used to it. But now, I think I like the food better there.",
            "text"=>array("type"=>"audio","text"=>"How did July like the food there?","media_filename"=>'media/u8dcq.mp3',"timeRange"=>"00:13-00:16"),
            "scores"=>4,
            "items"=>array(
                "0"=>array("item"=>"She now enjoys it.","answer"=>"She now enjoys it","isCorrect"=>true),
                "1"=>array("item"=>"She never got used to it.","answer"=>"She never got used to it", "isCorrect"=>false),
                "2"=>array("item"=>"She liked it from the very beginning.","answer"=>"She liked it from the very beginning", "isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"5",
            "content_id"=>1449,
            "type"=>"SRmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u8d_original_mt.mp3',
            "timeRange"=>"01:35-01:51",
            "content"=>"Linda: Did you go to any interesting places then?July: Yes. During the weekends, Mr. Blake often took us to some parks around the town in his big van. Sometimes, we had family parties with Mr. Blake's friends or relatives. ",
            "text"=>array("type"=>"audio","text"=>"What did Mr. Blake often do during weekends?","media_filename"=>'media/u8dcq.mp3',"timeRange"=>"0:58-02:02"),
            "scores"=>4,
            "items"=>array(
                "0"=>array("item"=>"Take them  to outings in parks.","answer"=>"Take them  to outings in parks","isCorrect"=>true),
                "1"=>array("item"=>"Take them shopping in his big van.","answer"=>"Take them shopping in his big van", "isCorrect"=>false),
                "2"=>array("item"=>"Have parties with her friends and relatives.","answer"=>"Have parties with her friends and relatives", "isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_speak_001.png"
        );

         $this->saveEventListToDatabases($data);$a =  json_encode($data);
        $fp = fopen('json221.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
        return;
    }

    public function getPart222(){
        $data = array(
            "unit_id"       =>8,
            "lesson_id"     =>47,
            "part_id"       =>222,
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
            "content_id"=>1450,
            "media_filename"=>'media/u4gfi.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"00:50-00:57",
            "scores"=>5,
            "text" => "Many people are beginning to reflect on what kind of consequences studying abroad will bring about.",
            "answer" => "Many people are beginning to reflect on what kind of consequences studying abroad will bring about",
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"2",
            "content_id"=>1451,
            "media_filename"=>'media/u4gfi.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"01:42-01:46",
            "scores"=>5,
            "text" => "She must have been held up on her way here in the traffic jam.",
            "answer" => "She must have been held up on her way here in the traffic jam",
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"3",
            "content_id"=>1452,
            "media_filename"=>'media/u4gso.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"00:32-00:36",
            "scores"=>5,
            "text" => "Why do we have to put up with his selfish behavior?",
            "answer" => "Why do we have to put up with his selfish behavior",
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"4",
            "content_id"=>1453,
            "media_filename"=>'media/u4gso.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"00:52-00:55",
            "scores"=>5,
            "text"   => "You are meant to be an artist.",
            "answer" => "You are meant to be an artist.",
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"5",
            "content_id"=>1454,
            "media_filename"=>'media/u4gsf.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"00:29-00:33",
            "scores"=>5,
            "text" => "A person is known by the company he keeps.",
            "answer" => "A person is known by the company he keeps.",
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"6",
            "content_id"=>1455,
            "media_filename"=>'media/u5gsf.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"00:27-00:31",
            "scores"=>5,
            "text" => "It is likely to snow tonight according to the weather report.",
            "answer" => "It is likely to snow tonight according to the weather report",
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_speak_001.png"
        );

         $this->saveEventListToDatabases($data);$a =  json_encode($data);
        $fp = fopen('json222.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
        return;
    }

    public function createJson(){
        for($i=206;$i<=222;$i++){
            $function = "getPart".$i;
            $this->$function();
        }
    }


}
