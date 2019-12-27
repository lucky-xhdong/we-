<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lessonparts extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('lessonpart');
        $this->load->model('unit');
        $this->load->model('classes');
        $this->load->model('wetalkfile');
        $this->load->model('event');
    }


    public function getLessonpartList(){
        $argus = func_get_args();
        $user = func_get_arg(count($argus)-1);
        if($user && count($argus) >1){
            return $this->lessonpart->getLessonpartList($user,$argus[0]);
        }
        return $this;
    }


    public function getMyPartDetails(){
        $argus = func_get_args();
        $user = func_get_arg(count($argus)-1);
        if($user  && count($argus) >1 ){
            return $this->lessonpart->getMyPartDetails($user,$argus[0]);
        }
        return $this;
    }


    public function getPartSpeechComments(){
        $argus = func_get_args();
        $user = func_get_arg(count($argus)-1);
        if($user  && count($argus) >=1 ){
            return $this->lessonpart->getPartSpeechComments();
        }
        return $this;
    }


    public function addCommentsForSpeech(){
        $argus = func_get_args();
        $user = func_get_arg(count($argus)-1);
        if($user  && count($argus) >1 ){
            return $this->lessonpart->addCommentsForSpeech($user,$argus[0]);
        }
        return $this;
    }

    public function getSpeechContentList(){
        $argus = func_get_args();
        $user = func_get_arg(count($argus)-1);
        if($user  && count($argus) >= 1 ){
            if(count($argus) == 1){
                $limit = 20;
                $start = 0;
            }else{
                $limit = isset($argus[0])?$argus[0]:20;
                $start = isset($argus[1])?$argus[1]:0;
            }
            return $this->lessonpart->getSpeechContentList($user,$limit,$start);
        }
        return $this;
    }


    public function getSpeechRecordDetail(){
        $argus = func_get_args();
        $user = func_get_arg(count($argus)-1);
        if($user  && count($argus) >1 ){
            return $this->lessonpart->getRecordDetail($user,$argus[0]);
        }
        return $this;
    }








    public function getPart1(){
        $data = array(
            "unit_id"       =>1,
            "lesson_id"     =>1,
            "part_id"       =>1,
            "media_filename"=>'media/u1p.mp3',
            "media_type"    =>'audio',
            "totalTime"     =>"4:48",
            "part_type"     =>"listening",
            "have_questions"=>false,
            "questions_type"=>"text",
            "keywords"      =>array("name","businessman","born","address","avenue",
                "graduate","university","major",
                "computer science","company","married","grade","customs","kindergarten","photographer","nature",
                "travel", "grandparents", "immigrate", "retired",
            ),
        );
//        $data['events'][] = array(
//                "num"=>"1",
//                'type'=>"text",
//                "timeRange"=>"00:00-00:05",
//                "text"=>"Unit 1 Personal Information",
//                "picture"=>"images/u1_p_001.jpg"
//        );
        $data['events'][] = array(
            "num"=>"2",
            'type'=>"text",
            "timeRange"=>"00:00-00:11",
            "text"=>"Hello, this is Channel We. I'm Mr. V. In today's program we will get to know the big family of Mr. Jack Smith, a famous IT star.",
            "media_filename"=>'media/u1p.mp4',
            "media_type"    =>'video',
            "picture"=>"images/u1_p_001.png",
            "pictures"=>array(),
        );
        $data['events'][] = array(
            "num"=>"5",
            'type'=>"text",
            "timeRange"=>"00:21-00:24",
            "displayKewords"=>true,
            "text"=>"This is Jack Smith.",
            "picture"=>"images/u1_p_002.png"
        );
        $data['events'][] = array(
            "num"=>"6",
            'type'=>"text",
            "timeRange"=>"00:25-00:28",
            "text"=>"His first name is Jack.",
            "picture"=>"images/u1_p_002.png"
        );
        $data['events'][] = array(
            "num"=>"7",
            'type'=>"text",
            "timeRange"=>"00:28-00:31",
            "text"=>"His last name is Smith.",
            "picture"=>"images/u1_p_002.png"
        );
        $data['events'][] = array(
            "num"=>"8",
            'type'=>"text",
            "timeRange"=>"00:32-00:36",
            "text"=>"Jack Smith is an American businessman.",
            "picture"=>"images/u1_p_002.png"
        );
        $data['events'][] = array(
            "num"=>"9",
            'type'=>"text",
            "timeRange"=>"00:37-00:43",
            "text"=>"He was born on March 1st, 1975 in Los Angeles, USA. ",
            "picture"=>"images/u1_p_002.png"
        );
        $data['events'][] = array(
            "num"=>"10",
            'type'=>"text",
            "timeRange"=>"00:43-00:47",
            "text"=>"He now lives in Los Angeles. ",
            "picture"=>"images/u1_p_002.png"
        );

        $data['events'][] = array(
            "num"=>"11",
            'type'=>"text",
            "timeRange"=>"00:47-00:53",
            "text"=>"His address is No. 83 Atlantic Avenue.",
            "picture"=>"images/u1_p_002.png"
        );

        $data['events'][] = array(
            "num"=>"12",
            'type'=>"text",
            "timeRange"=>"00:53-00:59",
            "text"=>"Jack graduated at the age of 22 from a university in England.",
            "picture"=>"images/u1_p_002.png"
        );

        $data['events'][] = array(
            "num"=>"13",
            'type'=>"text",
            "timeRange"=>"00:59-01:03",
            "text"=>"His major was computer science. ",
            "picture"=>"images/u1_p_002.png"
        );

        $data['events'][] = array(
            "num"=>"14",
            'type'=>"text",
            "timeRange"=>"01:03-01:07",
            "text"=>"He first worked for a small computer company. ",
            "picture"=>"images/u1_p_002.png"
        );

        $data['events'][] = array(
            "num"=>"15",
            'type'=>"text",
            "timeRange"=>"01:08-01:13",
            "text"=>"Now he has his own IT company in the U.S.A.",
            "picture"=>"images/u1_p_002.png"
        );

        $data['events'][] = array(
            "num"=>"16",
            'type'=>"text",
            "timeRange"=>"01:13-01:17",
            "text"=>"Jack has a family of four.",
            "picture"=>"images/u1_p_002.png"
        );

        $data['events'][] = array(
            "num"=>"17",
            'type'=>"text",
            "timeRange"=>"01:17-01:22",
            "text"=>"Jack got married to Amy at the age of 27. ",
            "picture"=>"images/u1_p_003.png"
        );

        $data['events'][] = array(
            "num"=>"18",
            'type'=>"text",
            "timeRange"=>"01:22-01:26",
            "text"=>"Amy is an IT engineer. ",
            "picture"=>"images/u1_p_003.png"
        );

        $data['events'][] = array(
            "num"=>"19",
            'type'=>"text",
            "timeRange"=>"01:26-01:30",
            "text"=>"She works for a high-tech company.",
            "picture"=>"images/u1_p_003.png"
        );

        $data['events'][] = array(
            "num"=>"20",
            'type'=>"text",
            "timeRange"=>"01:31-01:36",
            "text"=>"Jack and Amy have two children，Alice and John.",
            "picture"=>"images/u1_p_004.png"
        );

        $data['events'][] = array(
            "num"=>"21",
            'type'=>"text",
            "timeRange"=>"01:36-01:41",
            "text"=>"Alice is their daughter and she is thirteen years old. ",
            "picture"=>"images/u1_p_004.png"
        );

        $data['events'][] = array(
            "num"=>"22",
            'type'=>"text",
            "timeRange"=>"01:41-01:45",
            "text"=>"She goes to middle school. ",
            "picture"=>"images/u1_p_004.png"
        );

        $data['events'][] = array(
            "num"=>"23",
            'type'=>"text",
            "timeRange"=>"01:45-01:48",
            "text"=>"She is in eighth grade.",
            "picture"=>"images/u1_p_004.png"
        );

        $data['events'][] = array(
            "num"=>"24",
            'type'=>"text",
            "timeRange"=>"01:48-01:53",
            "text"=>"John, their son, is nine years old.",
            "picture"=>"images/u1_p_004.png"
        );

        $data['events'][] = array(
            "num"=>"25",
            'type'=>"text",
            "timeRange"=>"01:53-01:57",
            "text"=>"He goes to primary school. ",
            "picture"=>"images/u1_p_004.png"
        );

        $data['events'][] = array(
            "num"=>"26",
            'type'=>"text",
            "timeRange"=>"01:57-02:01",
            "text"=>"They both go to school by school bus. ",
            "picture"=>"images/u1_p_004.png"
        );


        $data['events'][] = array(
            "num"=>"27",
            'type'=>"text",
            "timeRange"=>"02:01-02:07",
            "text"=>"Both of them are very good at studying and their teachers like them very much.",
            "picture"=>"images/u1_p_004.png"
        );

        $data['events'][] = array(
            "num"=>"28",
            'type'=>"text",
            "timeRange"=>"02:08-02:11",
            "text"=>"Jack has a younger sister, Helen.",
            "picture"=>"images/u1_p_005.png"
        );

        $data['events'][] = array(
            "num"=>"29",
            'type'=>"text",
            "timeRange"=>"02:12-02:15",
            "text"=>"She works for a bank.",
            "picture"=>"images/u1_p_005.png"
        );

        $data['events'][] = array(
            "num"=>"30",
            'type'=>"text",
            "timeRange"=>"02:15-02:19",
            "text"=>"Her husband, William, works at customs. ",
            "picture"=>"images/u1_p_006.png"
        );

        $data['events'][] = array(
            "num"=>"31",
            'type'=>"text",
            "timeRange"=>"02:19-02:25",
            "text"=>"Helen and William also have two children: Mary and Harry.",
            "picture"=>"images/u1_p_007.png"
        );

        $data['events'][] = array(
            "num"=>"32",
            'type'=>"text",
            "timeRange"=>"02:26-02:31",
            "text"=>"Mary is five years old and Harry is 3 years old.",
            "picture"=>"images/u1_p_007.png"
        );

        $data['events'][] = array(
            "num"=>"33",
            'type'=>"text",
            "timeRange"=>"02:31-02:37",
            "text"=>"Every morning at 7:30, Helen drives her two children to kindergarten.",
            "picture"=>"images/u1_p_007.png"
        );


        $data['events'][] = array(
            "num"=>"34",
            'type'=>"text",
            "timeRange"=>"02:38-02:42",
            "text"=>"Jack also has a younger brother, Andy.",
            "picture"=>"images/u1_p_008.png"
        );

        $data['events'][] = array(
            "num"=>"35",
            'type'=>"text",
            "timeRange"=>"02:42-02:45",
            "text"=>"He is a photographer. ",
            "picture"=>"images/u1_p_008.png"
        );

        $data['events'][] = array(
            "num"=>"36",
            'type'=>"text",
            "timeRange"=>"02:46-02:48",
            "text"=>"He is single.",
            "picture"=>"images/u1_p_008.png"
        );

        $data['events'][] = array(
            "num"=>"37",
            'type'=>"text",
            "timeRange"=>"02:49-02:53",
            "text"=>"He has just graduated from the New York Art School. ",
            "picture"=>"images/u1_p_008.png"
        );

        $data['events'][] = array(
            "num"=>"38",
            'type'=>"text",
            "timeRange"=>"02:54-02:57",
            "text"=>"He likes nature and travels a lot. ",
            "picture"=>"images/u1_p_008.png"
        );

        $data['events'][] = array(
            "num"=>"39",
            'type'=>"text",
            "timeRange"=>"02:58-03:06",
            "text"=>"He now works for a small magazine in South Africa, but he is thinking about changing his job.",
            "picture"=>"images/u1_p_008.png"
        );

        $data['events'][] = array(
            "num"=>"40",
            'type'=>"text",
            "timeRange"=>"03:06-03:12",
            "text"=>"Jack's grandparents immigrated into the United States from England. ",
            "picture"=>"images/u1_p_009.png"
        );


        $data['events'][] = array(
            "num"=>"41",
            'type'=>"text",
            "timeRange"=>"03:12-03:16",
            "text"=>"Jack's father Richard, is a retired doctor. ",
            "picture"=>"images/u1_p_010.png"
        );

        $data['events'][] = array(
            "num"=>"42",
            'type'=>"text",
            "timeRange"=>"03:17-03:21",
            "text"=>"Jack's mother Ellen, is a retired nurse.",
            "picture"=>"images/u1_p_010.png"
        );

        $data['events'][] = array(
            "num"=>"43",
            'type'=>"text",
            "timeRange"=>"03:21-03:26",
            "text"=>"Now let's look at Jack's family tree.",
            "picture"=>"images/u1_p_011.png"
        );

        $data['events'][] = array(
            "num"=>"44",
            'type'=>"text",
            "timeRange"=>"03:26-03:30",
            "text"=>"Jack comes from a big family. ",
            "picture"=>"images/u1_p_011.png"
        );

        $data['events'][] = array(
            "num"=>"45",
            'type'=>"text",
            "timeRange"=>"03:30-03:34",
            "text"=>"Jack's parents are Richard and Ellen. ",
            "picture"=>"images/u1_p_012.png"
        );

        $data['events'][] = array(
            "num"=>"46",
            'type'=>"text",
            "timeRange"=>"03:34-03:38",
            "text"=>"Jack's wife is Amy. ",
            "picture"=>"images/u1_p_013.png"
        );

        $data['events'][] = array(
            "num"=>"47",
            'type'=>"text",
            "timeRange"=>"03:38-03:42",
            "text"=>"She is Richard and Ellen's daughter-in-law. ",
            "picture"=>"images/u1_p_013.png"
        );

        $data['events'][] = array(
            "num"=>"48",
            'type'=>"text",
            "timeRange"=>"03:42-03:45",
            "text"=>"Jack has two children. ",
            "picture"=>"images/u1_p_014.png"
        );

        $data['events'][] = array(
            "num"=>"49",
            'type'=>"text",
            "timeRange"=>"03:46-03:50",
            "text"=>"They are Richard and Ellen's grandchildren. ",
            "picture"=>"images/u1_p_014.png"
        );

        $data['events'][] = array(
            "num"=>"50",
            'type'=>"text",
            "timeRange"=>"03:50-03:57",
            "text"=>"Richard is Amy's father-in-law, while Ellen is Amy's mother-in-law. ",
            "picture"=>"images/u1_p_015.png"
        );

        $data['events'][] = array(
            "num"=>"51",
            'type'=>"text",
            "timeRange"=>"03:57-04:01",
            "text"=>"Jack has a sister, Helen. ",
            "picture"=>"images/u1_p_016.png"
        );



        $data['events'][] = array(
            "num"=>"52",
            'type'=>"text",
            "timeRange"=>"04:01-04:04",
            "text"=>"She is Jack's children's aunt. ",
            "picture"=>"images/u1_p_016.png"
        );

        $data['events'][] = array(
            "num"=>"53",
            'type'=>"text",
            "timeRange"=>"04:05-04:10",
            "text"=>"Jack's brother, Andy, is Jack's children's uncle. ",
            "picture"=>"images/u1_p_016.png"
        );

        $data['events'][] = array(
            "num"=>"54",
            'type'=>"text",
            "timeRange"=>"04:10-04:16",
            "text"=>"Helen is Amy's sister-in-law while Andy is Amy's brother-in-law.",
            "picture"=>"images/u1_p_017.png"
        );

        $data['events'][] = array(
            "num"=>"55",
            'type'=>"text",
            "timeRange"=>"04:16-04:20",
            "text"=>"William is Jack's brother-in-law.",
            "picture"=>"images/u1_p_018.png"
        );

        $data['events'][] = array(
            "num"=>"56",
            'type'=>"text",
            "timeRange"=>"04:20-04:29",
            "text"=>"Jack's son, John, is Helen and Andy's nephew while Jack's daughter, Alice, is Helen and Andy's niece.",
            "picture"=>"images/u1_p_019.png"
        );

        $data['events'][] = array(
            "num"=>"57",
            'type'=>"text",
            "timeRange"=>"04:29-04:35",
            "text"=>"Jack's children and Helen's children are cousins.",
            "picture"=>"images/u1_p_020.png"
        );
        $this->saveEventListToDatabases($data);
        $a =  json_encode($data);
        $fp = fopen('json1.txt',"w");
         fwrite($fp,$a);
        fclose($fp);
       return;

    }

    public function getPart2(){

        $data = array(
            "unit_id"       =>1,
            "lesson_id"     =>1,
            "part_id"       =>2,
            "media_filename"=>'media/u1p.mp3',
            "media_type"    =>'audio',
            "totalTime"     =>"4:48",
            "have_questions"=>true,
            "questions_type"=>"text",
            "part_type"     =>"comprehension",
            "keywords"      =>array("name","businessman","born","address","avenue",
                "graduate","university","major",
                "computer science","company","married","grade","customs","kindergarten","photographer","nature",
                "travel", "grandparents", "immigrate", "retired",
            ),
        );
//        $data['events'][] = array(
//                "num"=>"1",
//                'type'=>"text",
//                "timeRange"=>"00:00-00:05",
//                "text"=>"Unit 1 Personal Information",
//                "picture"=>"images/u1_p_001.jpg"
//        );
        $data['events'][] = array(
            "num"=>"2",
            'type'=>"text",
            "timeRange"=>"00:00-00:11",
            "text"=>"Hello, this is Channel We.I'm Mr. V. In today's program we will get to know the big family of Mr. Jack Smith, a famous IT star.",
            "media_filename"=>'media/u1p.mp4',
            "media_type"    =>'video',
            "picture"=>"images/u1_p_001.png",
            "pictures"=>array(
            ),
        );
        $data['events'][] = array(
            "num"=>"5",
            'type'=>"text",
            "timeRange"=>"00:21-00:24",
            "displayKewords"=>true,
            "text"=>"This is Jack Smith.",
            "picture"=>"images/u1_p_002.png"
        );
        $data['events'][] = array(
            "num"=>"6",
            'type'=>"text",
            "timeRange"=>"00:25-00:28",
            "text"=>"His first name is Jack.",
            "picture"=>"images/u1_p_002.png"
        );
        $data['events'][] = array(
            "num"=>"7",
            'type'=>"text",
            "timeRange"=>"00:28-00:31",
            "text"=>"His last name is Smith.",
            "picture"=>"images/u1_p_002.png"
        );

        $data['events'][] = array(
            "num"=>"8",
            'type'=>"multipleChoices",
            "timeRange"=>"",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"9",
                    "content_id"=>1,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1pcq.mp3',
                    "timeRange"=>"00:00-00:05",
                    "text"=>"Is his first name Jack?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Yes","isCorrect"=>true),
                        "1"=>array("item"=>"No", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u1p.mp3',
                            "timeRange"=>"00:25-00:28",
                            "text"=>"His first name is Jack."
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u1p.mp3',
                            "timeRange"=>"00:25-00:28",
                            "text"=>"His first name is Jack."
                        ),
                    ),
                ),
                1=>array(
                    "num"=>"10",
                    "content_id"=>2,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1pcq.mp3',
                    "timeRange"=>"00:05-00:09",
                    "text"=>"Is his last name Smith?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Yes","isCorrect"=>true),
                        "1"=>array("item"=>"No", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u1p.mp3',
                            "timeRange"=>"00:28-00:31",
                            "text"=>"His last name is Smith.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u1p.mp3',
                            "timeRange"=>"00:28-00:31",
                            "text"=>"His last name is Smith.",
                        ),
                    ),
                )
            )
        );

        $data['events'][] = array(
            "num"=>"11",
            'type'=>"text",
            "timeRange"=>"00:32-00:36",
            "text"=>"Jack Smith is an American businessman.",
            "picture"=>"images/u1_p_002.png"
        );
        $data['events'][] = array(
            "num"=>"12",
            'type'=>"text",
            "timeRange"=>"00:37-00:43",
            "text"=>"He was born on March 1st, 1975 in Los Angeles, USA. ",
            "picture"=>"images/u1_p_002.png"
        );
        $data['events'][] = array(
            "num"=>"13",
            'type'=>"text",
            "timeRange"=>"00:43-00:47",
            "text"=>"He now lives in Los Angeles. ",
            "picture"=>"images/u1_p_002.png"
        );
        $data['events'][] = array(
            "num"=>"14",
            'type'=>"text",
            "timeRange"=>"00:47-00:53",
            "text"=>"His address is No. 83 Atlantic Avenue.",
            "picture"=>"images/u1_p_002.png"
        );
        $data['events'][] = array(
            "num"=>"15",
            "content_id"=>3,
            "type"=>"multipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u1pcq.mp3',
            "timeRange"=>"00:08-00:12",
            "text"=>"When was he born?",
            "scores"=>1,
            "items"=>array(
                "0"=>array("item"=>"He was born in 1983.","isCorrect"=>false),
                "1"=>array("item"=>"He lives in Los Angeles.", "isCorrect"=>false),
                "2"=>array("item"=>"Jack was born in 1975.", "isCorrect"=>true),
            ),
            "selectEvents"=>array(
            ),
        );
        $data['events'][] = array(
            "num"=>"16",
            'type'=>"text",
            "timeRange"=>"00:53-00:59",
            "text"=>"Jack graduated at the age of 22 from a university in England.",
            "picture"=>"images/u1_p_002.png"
        );
        $data['events'][] = array(
            "num"=>"17",
            'type'=>"text",
            "timeRange"=>"00:59-01:03",
            "text"=>"His major was computer science. ",
            "picture"=>"images/u1_p_002.png"
        );
        $data['events'][] = array(
            "num"=>"18",
            'type'=>"text",
            "timeRange"=>"01:03-01:07",
            "text"=>"He first worked for a small computer company. ",
            "picture"=>"images/u1_p_002.png"
        );
        $data['events'][] = array(
            "num"=>"19",
            'type'=>"text",
            "timeRange"=>"01:08-01:13",
            "text"=>"Now he has his own IT company in the U.S.A.",
            "picture"=>"images/u1_p_002.png"
        );
        $data['events'][] = array(
            "num"=>"20",
            'type'=>"multipleChoices",
            "timeRange"=>"",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"21",
                    "content_id"=>4,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1pcq.mp3',
                    "timeRange"=>"00:12-00:17",
                    "text"=>"How old was Jack when he graduated from a university? ",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"18","isCorrect"=>false),
                        "1"=>array("item"=>"22", "isCorrect"=>true),
                        "2"=>array("item"=>"computer science", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                    ),
                ),
                1=>array(
                    "num"=>"22",
                    "content_id"=>5,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1pcq.mp3',
                    "timeRange"=>"00:17-00:21",
                    "text"=>"What was his major in the university?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Computer science.","isCorrect"=>true),
                        "1"=>array("item"=>"Business.", "isCorrect"=>false),
                        "2"=>array("item"=>"Company management.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                    ),
                )
            )
        );

        $data['events'][] = array(
            "num"=>"23",
            'type'=>"text",
            "timeRange"=>"01:13-01:17",
            "text"=>"Jack has a family of four.",
            "picture"=>"images/u1_p_002.png"
        );
        $data['events'][] = array(
            "num"=>"24",
            'type'=>"text",
            "timeRange"=>"01:17-01:22",
            "text"=>"Jack got married to Amy at the age of 27.",
            "picture"=>"images/u1_p_003.png"
        );
        $data['events'][] = array(
            "num"=>"25",
            'type'=>"text",
            "timeRange"=>"01:22-01:26",
            "text"=>"Amy is an IT engineer. ",
            "picture"=>"images/u1_p_003.png"
        );
        $data['events'][] = array(
            "num"=>"26",
            'type'=>"text",
            "timeRange"=>"01:26-01:30",
            "text"=>"She works for a high-tech company.",
            "picture"=>"images/u1_p_003.png"
        );

        $data['events'][] = array(
            "num"=>"27",
            'type'=>"multipleChoices",
            "timeRange"=>"",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"28",
                    "content_id"=>6,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1pcq.mp3',
                    "timeRange"=>"00:21-00:25",
                    "text"=>"Is Jack married?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Yes","isCorrect"=>true),
                        "1"=>array("item"=>"No", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u1p.mp3',
                            "timeRange"=>"01:17-01:22",
                            "text"=>"Jack got married to Amy at the age of 27. ",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u1p.mp3',
                            "timeRange"=>"01:17-01:22",
                            "text"=>"Jack got married to Amy at the age of 27. ",
                        ),
                    ),
                ),
                1=>array(
                    "num"=>"29",
                    "content_id"=>7,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1pcq.mp3',
                    "timeRange"=>"00:25-00:28",
                    "text"=>"Is his wife a nurse?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Yes","isCorrect"=>false),
                        "1"=>array("item"=>"No", "isCorrect"=>true),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u1p.mp3',
                            "timeRange"=>"01:22-01:26",
                            "text"=>"Amy is an IT engineer. ",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u1p.mp3',
                            "timeRange"=>"01:22-01:26",
                            "text"=>"Amy is an IT engineer.",
                        ),
                    ),
                ),
                2=>array(
                    "num"=>"30",
                    "content_id"=>8,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1pcq.mp3',
                    "timeRange"=>"00:28-00:31",
                    "text"=>"What does Amy do?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Amy works as a doctor. ","isCorrect"=>false),
                        "1"=>array("item"=>"Amy works as an IT engineer. ", "isCorrect"=>true),
                        "2"=>array("item"=>"She is a housewife. ", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                    ),
                )
            )
        );

        $data['events'][] = array(
            "num"=>"31",
            'type'=>"text",
            "timeRange"=>"01:31-01:36",
            "text"=>"Jack and Amy have two children，Alice and John. ",
            "picture"=>"images/u1_p_004.png"
        );
        $data['events'][] = array(
            "num"=>"32",
            'type'=>"text",
            "timeRange"=>"01:36-01:41",
            "text"=>"Alice is their daughter and she is thirteen years old. ",
            "picture"=>"images/u1_p_004.png"
        );

        $data['events'][] = array(
            "num"=>"33",
            'type'=>"text",
            "timeRange"=>"01:41-01:45",
            "text"=>"She goes to middle school. ",
            "picture"=>"images/u1_p_004.png"
        );
        $data['events'][] = array(
            "num"=>"34",
            'type'=>"text",
            "timeRange"=>"01:45-01:48",
            "text"=>"She is in eighth grade.",
            "picture"=>"images/u1_p_004.png"
        );
        $data['events'][] = array(
            "num"=>"35",
            'type'=>"text",
            "timeRange"=>"01:48-01:53",
            "text"=>"John, their son, is nine years old.",
            "picture"=>"images/u1_p_004.png"
        );
        $data['events'][] = array(
            "num"=>"36",
            'type'=>"text",
            "timeRange"=>"01:53-01:57",
            "text"=>"He goes to primary school. ",
            "picture"=>"images/u1_p_004.png"
        );
        $data['events'][] = array(
            "num"=>"37",
            'type'=>"text",
            "timeRange"=>"01:57-02:01",
            "text"=>"They both go to school by school bus. ",
            "picture"=>"images/u1_p_004.png"
        );
        $data['events'][] = array(
            "num"=>"38",
            'type'=>"text",
            "timeRange"=>"02:01-02:07",
            "text"=>"Both of them are very good at studying and their teachers like them very much.",
            "picture"=>"images/u1_p_004.png"
        );
        $data['events'][] = array(
            "num"=>"39",
            'type'=>"multipleChoices",
            "timeRange"=>"",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"40",
                    "content_id"=>9,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1pcq.mp3',
                    "timeRange"=>"00:31-00:36",
                    "text"=>"Does Jack have a daughter and a son?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Yes","isCorrect"=>true),
                        "1"=>array("item"=>"No", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u1p.mp3',
                            "timeRange"=>"01:31-01:36",
                            "text"=>"Jack and Amy have two children, Alice and John.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u1p.mp3',
                            "timeRange"=>"01:31-01:36",
                            "text"=>"Jack and Amy have two children, Alice and John.",
                        ),
                    ),
                ),
                1=>array(
                    "num"=>"41",
                    "content_id"=>10,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1pcq.mp3',
                    "timeRange"=>"00:36-00:40",
                    "text"=>"Do Jack's children both go to school?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Yes","isCorrect"=>true),
                        "1"=>array("item"=>"No", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u1p.mp3',
                            "timeRange"=>"01:57-02:01",
                            "text"=>"They both go to school by school bus.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u1p.mp3',
                            "timeRange"=>"01:57-02:01",
                            "text"=>"They both go to school by school bus.",
                        ),
                    ),
                ),
                2=>array(
                    "num"=>"42",
                    "content_id"=>11,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1pcq.mp3',
                    "timeRange"=>"00:40-00:44",
                    "text"=>"How do they go to school?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"By bike.","isCorrect"=>false),
                        "1"=>array("item"=>"By public bus.", "isCorrect"=>false),
                        "2"=>array("item"=>"By school bus.", "isCorrect"=>true),
                    ),
                    "selectEvents"=>array(
                    ),
                ),
                3=>array(
                    "num"=>"43",
                    "content_id"=>12,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1pcq.mp3',
                    "timeRange"=>"00:44-00:48",
                    "text"=>"Are Alice and John good students?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Yes","isCorrect"=>true),
                        "1"=>array("item"=>"No", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u1p.mp3',
                            "timeRange"=>"02:01-02:07",
                            "text"=>"Both of them are very good at studying and their teachers like them very much.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u1p.mp3',
                            "timeRange"=>"02:01-02:07",
                            "text"=>"Both of them are very good at studying and their teachers like them very much.",
                        ),
                    ),
                ),
            )
        );

        $data['events'][] = array(
            "num"=>"44",
            'type'=>"text",
            "timeRange"=>"02:08-02:11",
            "text"=>"Jack has a younger sister, Helen.",
            "picture"=>"images/u1_p_005.png"
        );
        $data['events'][] = array(
            "num"=>"45",
            'type'=>"text",
            "timeRange"=>"02:12-02:15",
            "text"=>"She works for a bank.",
            "picture"=>"images/u1_p_005.png"
        );
        $data['events'][] = array(
            "num"=>"46",
            'type'=>"text",
            "timeRange"=>"02:15-02:19",
            "text"=>"Her husband, William, works at customs. ",
            "picture"=>"images/u1_p_006.png"
        );
        $data['events'][] = array(
            "num"=>"47",
            'type'=>"multipleChoices",
            "timeRange"=>"",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"48",
                    "content_id"=>13,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1pcq.mp3',
                    "timeRange"=>"00:48-00:51",
                    "text"=>"Where does Helen work?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"She works at a hospital.","isCorrect"=>false),
                        "1"=>array("item"=>"She works at a supermarket.", "isCorrect"=>false),
                        "2"=>array("item"=>"She works for a bank.", "isCorrect"=>true),
                    ),
                    "selectEvents"=>array(
                    ),
                ),
                1=>array(
                    "num"=>"49",
                    "content_id"=>14,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1pcq.mp3',
                    "timeRange"=>"00:51-00:56",
                    "text"=>"Does William work at customs? ",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Yes","isCorrect"=>true),
                        "1"=>array("item"=>"No", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u1p.mp3',
                            "timeRange"=>"02:15-02:19",
                            "text"=>"Her husband, William, works at customs. ",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u1p.mp3',
                            "timeRange"=>"02:15-02:19",
                            "text"=>"Both of them are very good at studying and their teachers like them very much.",
                        ),
                    ),
                ),
            )
        );



        $data['events'][] = array(
            "num"=>"50",
            'type'=>"text",
            "timeRange"=>"02:19-02:25",
            "text"=>"Helen and William also have two children: Mary and Harry.",
            "picture"=>"images/u1_p_007.png"
        );
        $data['events'][] = array(
            "num"=>"51",
            'type'=>"text",
            "timeRange"=>"02:26-02:31",
            "text"=>"Mary is five years old and Harry is 3 years old.",
            "picture"=>"images/u1_p_007.png"
        );
        $data['events'][] = array(
            "num"=>"52",
            "timeRange"=>"02:31-02:37",
            'type'=>"text",
            "text"=>"Every morning at 7:30, Helen drives her two children to kindergarten.",
            "picture"=>"images/u1_p_007.png"
        );
        $data['events'][] = array(
            "num"=>"53",
            'type'=>"multipleChoices",
            "timeRange"=>"",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"54",
                    "content_id"=>15,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1pcq.mp3',
                    "timeRange"=>"00:56-01:00",
                    "text"=>"Do Helen and William have any children? ",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Yes","isCorrect"=>true),
                        "1"=>array("item"=>"No", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u1p.mp3',
                            "timeRange"=>"02:19-02:25",
                            "text"=>"Helen and William also have two children: Mary and Harry.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u1p.mp3',
                            "timeRange"=>"02:19-02:25",
                            "text"=>"Helen and William also have two children: Mary and Harry.",
                        ),
                    ),
                ),
                1=>array(
                    "num"=>"55",
                    "content_id"=>16,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1pcq.mp3',
                    "timeRange"=>"01:00-01:04",
                    "text"=>"Do their children go to school?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Yes","isCorrect"=>false),
                        "1"=>array("item"=>"No", "isCorrect"=>true),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u1p.mp3',
                            "timeRange"=>"02:31-02:37",
                            "text"=>"Every morning at 7:30, Helen drives her two children to kindergarten.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u1p.mp3',
                            "timeRange"=>"02:31-02:37",
                            "text"=>"Every morning at 7:30, Helen drives her two children to kindergarten.",
                        ),
                    ),
                ),
                2=>array(
                    "num"=>"56",
                    "content_id"=>17,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1pcq.mp3',
                    "timeRange"=>"01:04-01:08",
                    "text"=>"Where do Helen's children go?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Primary school.","isCorrect"=>false),
                        "1"=>array("item"=>"Middle school.", "isCorrect"=>false),
                        "2"=>array("item"=>"Kindergarten.", "isCorrect"=>true),
                    ),
                    "selectEvents"=>array(
                    ),
                ),
            )
        );

        $data['events'][] = array(
            "num"=>"57",
            'type'=>"text",
            "timeRange"=>"02:38-02:42",
            "text"=>"Jack also has a younger brother, Andy.",
            "picture"=>"images/u1_p_008.png"
        );
        $data['events'][] = array(
            "num"=>"58",
            'type'=>"text",
            "timeRange"=>"02:42-02:45",
            "text"=>"He is a photographer. ",
            "picture"=>"images/u1_p_008.png"
        );
        $data['events'][] = array(
            "num"=>"59",
            'type'=>"text",
            "timeRange"=>"02:46-02:48",
            "text"=>"He is single.",
            "picture"=>"images/u1_p_008.png"
        );
        $data['events'][] = array(
            "num"=>"60",
            'type'=>"text",
            "timeRange"=>"02:49-02:53",
            "text"=>"He has just graduated from the New York Art School. ",
            "picture"=>"images/u1_p_008.png"
        );
        $data['events'][] = array(
            "num"=>"61",
            'type'=>"text",
            "timeRange"=>"02:54-02:57",
            "text"=>"He likes nature and travels a lot. ",
            "picture"=>"images/u1_p_008.png"
        );
        $data['events'][] = array(
            "num"=>"62",
            'type'=>"text",
            "timeRange"=>"02:58-03:06",
            "text"=>"He now works for a small magazine in South Africa, but he is thinking about changing his job.",
            "picture"=>"images/u1_p_008.png"
        );

        $data['events'][] = array(
            "num"=>"63",
            'type'=>"multipleChoices",
            "timeRange"=>"",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"64",
                    "content_id"=>18,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1pcq.mp3',
                    "timeRange"=>"01:08-01:12",
                    "text"=>"Is Andy Jack's brother?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Yes","isCorrect"=>true),
                        "1"=>array("item"=>"No", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u1p.mp3',
                            "timeRange"=>"02:38-02:42",
                            "text"=>" Every morning at 7:30, Helen drives her two children to kindergarten.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u1p.mp3',
                            "timeRange"=>"02:38-02:42",
                            "text"=>" Every morning at 7:30, Helen drives her two children to kindergarten.",
                        ),
                    ),
                ),
                1=>array(
                    "num"=>"65",
                    "content_id"=>19,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1pcq.mp3',
                    "timeRange"=>"01:12-01:15",
                    "text"=>"What is Andy's job?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"A singer.","isCorrect"=>false),
                        "1"=>array("item"=>"A photographer.", "isCorrect"=>true),
                        "2"=>array("item"=>"A taxi driver.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                    ),
                ),
                2=>array(
                    "num"=>"66",
                    "content_id"=>20,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1pcq.mp3',
                    "timeRange"=>"01:15-01:20",
                    "text"=>"Has Andy just graduated from a management school?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Yes","isCorrect"=>false),
                        "1"=>array("item"=>"No", "isCorrect"=>true),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u1p.mp3',
                            "timeRange"=>"02:49-02:53",
                            "text"=>"He has just graduated from the New York Art School. ",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u1p.mp3',
                            "timeRange"=>"02:49-02:53",
                            "text"=>"He has just graduated from the New York Art School. ",
                        ),
                    ),
                ),
                3=>array(
                    "num"=>"67",
                    "content_id"=>21,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1pcq.mp3',
                    "timeRange"=>"01:20-01:24",
                    "text"=>"Does Andy like nature?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Yes","isCorrect"=>true),
                        "1"=>array("item"=>"No", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u1p.mp3',
                            "timeRange"=>"02:54-02:57",
                            "text"=>"He likes nature and travels a lot. ",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u1p.mp3',
                            "timeRange"=>"02:54-02:57",
                            "text"=>"He likes nature and travels a lot. ",
                        ),
                    ),
                )
            )
        );

        $data['events'][] = array(
            "num"=>"68",
            'type'=>"text",
            "timeRange"=>"03:06-03:12",
            "text"=>"Jack's grandparents immigrated into the United States from England. ",
            "picture"=>"images/u1_p_009.png"
        );

        $data['events'][] = array(
            "num"=>"69",
            'type'=>"text",
            "timeRange"=>"03:12-03:16",
            "text"=>"Jack's father Richard, is a retired doctor. ",
            "picture"=>"images/u1_p_010.png"
        );
        $data['events'][] = array(
            "num"=>"70",
            'type'=>"text",
            "timeRange"=>"03:17-03:21",
            "text"=>"Jack's mother Ellen, is a retired nurse.",
            "picture"=>"images/u1_p_010.png"
        );

        $data['events'][] = array(
            "num"=>"71",
            'type'=>"multipleChoices",
            "timeRange"=>"",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"72",
                    "content_id"=>23,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1pcq.mp3',
                    "timeRange"=>"01:29-01:33",
                    "text"=>"Are Jack's parents retired?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Yes","isCorrect"=>true),
                        "1"=>array("item"=>"No", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u1p.mp3',
                            "timeRange"=>"03:12-03:21",
                            "text"=>"Jack's father Richard, is a retired doctor. Jack's mother Ellen, is a retired nurse. ",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u1p.mp3',
                            "timeRange"=>"03:12-03:21",
                            "text"=>"Jack's father Richard, is a retired doctor. Jack's mother Ellen, is a retired nurse. ",
                        ),
                    ),
                ),
                1=>array(
                    "num"=>"73",
                    "content_id"=>22,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1pcq.mp3',
                    "timeRange"=>"01:24-01:29",
                    "text"=>"Were Jack's grandparents born in the United States?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Yes","isCorrect"=>false),
                        "1"=>array("item"=>"No", "isCorrect"=>true),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u1p.mp3',
                            "timeRange"=>"03:06-03:12",
                            "text"=>"Jack's grandparents immigrated into the United States from England.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u1p.mp3',
                            "timeRange"=>"03:06-03:12",
                            "text"=>"Jack's grandparents immigrated into the United States from England.",
                        ),
                    ),
                ),
            )
        );

        $data['events'][] = array(
            "num"=>"74",
            'type'=>"text",
            "timeRange"=>"03:21-03:26",
            "text"=>"Now let's look at Jack's family tree.",
            "picture"=>"images/u1_p_011.png"
        );
        $data['events'][] = array(
            "num"=>"75",
            'type'=>"text",
            "timeRange"=>"03:26-03:30",
            "text"=>"Jack comes from a big family. ",
            "picture"=>"images/u1_p_011.png"
        );
        $data['events'][] = array(
            "num"=>"76",
            'type'=>"text",
            "timeRange"=>"03:30-03:34",
            "text"=>"Jack's parents are Richard and Ellen. ",
            "picture"=>"images/u1_p_012.png"
        );
        $data['events'][] = array(
            "num"=>"77",
            'type'=>"text",
            "timeRange"=>"03:34-03:38",
            "text"=>"Jack's wife is Amy. ",
            "picture"=>"images/u1_p_013.png"
        );
        $data['events'][] = array(
            "num"=>"78",
            'type'=>"text",
            "timeRange"=>"03:38-03:42",
            "text"=>"She is Richard and Ellen's daughter-in-law. ",
            "picture"=>"images/u1_p_013.png"
        );
        $data['events'][] = array(
            "num"=>"79",
            'type'=>"text",
            "timeRange"=>"03:42-03:45",
            "text"=>"Jack has two children. ",
            "picture"=>"images/u1_p_014.png"
        );
        $data['events'][] = array(
            "num"=>"80",
            'type'=>"text",
            "timeRange"=>"03:46-03:50",
            "text"=>"They are Richard and Ellen's grandchildren. ",
            "picture"=>"images/u1_p_014.png"
        );
        $data['events'][] = array(
            "num"=>"81",
            'type'=>"text",
            "timeRange"=>"03:50-03:57",
            "text"=>"Richard is Amy's father-in-law, while Ellen is Amy's mother-in-law. ",
            "picture"=>"images/u1_p_015.png"
        );
        $data['events'][] = array(
            "num"=>"82",
            'type'=>"text",
            "timeRange"=>"03:57-04:01",
            "text"=>"Jack has a sister, Helen. ",
            "picture"=>"images/u1_p_016.png"
        );
        $data['events'][] = array(
            "num"=>"83",
            'type'=>"text",
            "timeRange"=>"04:01-04:04",
            "text"=>"She is Jack's children's aunt. ",
            "picture"=>"images/u1_p_016.png"
        );
        $data['events'][] = array(
            "num"=>"84",
            'type'=>"text",
            "timeRange"=>"04:05-04:10",
            "text"=>"Jack's brother, Andy, is Jack's children's uncle. ",
            "picture"=>"images/u1_p_016.png"
        );
        $data['events'][] = array(
            "num"=>"85",
            'type'=>"text",
            "timeRange"=>"04:10-04:16",
            "text"=>"Helen is Amy's sister-in-law while Andy is Amy's brother-in-law.",
            "picture"=>"images/u1_p_017.png"
        );
        $data['events'][] = array(
            "num"=>"86",
            'type'=>"text",
            "timeRange"=>"04:16-04:20",
            "text"=>"William is Jack's brother-in-law.",
            "picture"=>"images/u1_p_018.png"
        );
        $data['events'][] = array(
            "num"=>"87",
            'type'=>"text",
            "timeRange"=>"04:20-04:29",
            "text"=>"Jack's son, John, is Helen and Andy's nephew while Jack's daughter, Alice, is Helen and Andy's niece.",
            "picture"=>"images/u1_p_019.png"
        );
        $data['events'][] = array(
            "num"=>"88",
            'type'=>"text",
            "timeRange"=>"04:29-04:35",
            "text"=>"Jack's children and Helen's children are cousins.",
            "picture"=>"images/u1_p_020.png"
        );

//        $data['events'][] = array(
//            "num"=>"81",
//            'type'=>"text",
//            "timeRange"=>"04:35-04:40",
//            "text"=>"while Ellen is Amy's mother-in-law.",
//            "picture"=>"images/u1_p_001.png"
//        );
//
//        $data['events'][] = array(
//            "num"=>"82",
//            'type'=>"text",
//            "timeRange"=>"02:58-03:02",
//            "text"=>"He now works for a small magazine in South Africa",
//            "picture"=>"images/u1_p_001.png"
//        );
//        $data['events'][] = array(
//            "num"=>"83",
//            'type'=>"text",
//            "timeRange"=>"02:31-02:33",
//            "text"=>"Every morning at 7:30",
//            "picture"=>"images/u1_p_001.png"
//        );
//        $data['events'][] = array(
//            "num"=>"84",
//            'type'=>"text",
//            "timeRange"=>"04:39-04:43",
//            "text"=>"and their teachers like them very much",
//            "picture"=>"images/u1_p_001.png"
//        );
//        $data['events'][] = array(
//            "num"=>"85",
//            'type'=>"text",
//            "timeRange" =>"04:43-04:48",
//            "text"      =>"Jack's son, John, is Helen and Andy's nephew",
//            "picture"   =>"images/u1_p_001.png"
//        );
        $this->saveEventListToDatabases($data);
        $a =  json_encode($data);
        $fp = fopen('json2.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
       return;

    }

    public function getSystemEvents(){
        $data = array(
            "media_filename"=>'media/system.mp3',
            "media_type"    =>'audio',
            "totalTime"     =>"3:26",
            "part_type"     =>"system",
        );

        // 进入课程主界面读
        $data['events'][] = array(
            "num"=>"1",
            "type"=>"text",
            'text'=>array("Welcome to We Talk.","Welcome to We Talk."),
            "timeRange"=>array("00:08-00:10","00:10-00:13"),
        );

        // 退出课程时候读
        $data['events'][] = array(
            "num"=>"2",
            "type"=>"text",
            'text'=>array("Goodbye.","Goodbye."),
            "timeRange"=>array("00:06-00:07","00:07-00:08"),
        );

        //答对题目
        $data['events'][] = array(
            "num"=>"3",
            'type'=>"We Win.",
            "timeRange"=>array("00:11-00:14","00:14-00:17"),
        );

        //进入passage
        $data['events'][] = array(
            "num"=>"4",
            "type"=>"text",
            'text'=>array("Passage","Passage"),
            "timeRange"=>array("00:13-00:15","00:15-00:16:646"),
        );
        //进入Dialog
        $data['events'][] = array(
            "num"=>"5",
            "type"=>"text",
            'text'=>array("Dialog","Dialog"),
            "timeRange"=>array("00:17-00:18","00:18-00:19:740"),
        );

        //进入Review
        $data['events'][] = array(
            "num"=>"6",
            "type"=>"text",
            'text'=>array("Review","Review"),
            "timeRange"=>array("00:20-00:20:883","00:21-00:22"),
        );


        //进入Grammar
        $data['events'][] = array(
            "num"=>"7",
            "type"=>"text",
            'text'=>array("Grammar","Grammar"),
            "timeRange"=>array("00:22-00:22:911","00:22:911-00:24"),
        );

        //进入课程界面播放课程/小节名称之后播放，提示选择学习内容

        $data['events'][] = array(
            "num"=>"8",
            "type"=>"text",
            'text'=>array("Please choose the part you wish to study.","Please choose the part you wish to study."),
            "timeRange"=>array("00:24-00:27","00:27-00:29:745"),
        );

        //Passage/Dialog listening, Summary结束时播放此句，询问是否再听一次，点yes,再次播放全篇，点no，退出本小节

        $data['events'][] = array(
            "num"=>"9",
            "type"=>"text",
            'text'=>array("Do you want to listen to it again?","Do you want to listen to it again?"),
            "timeRange"=>array("00:32-00:34","00:34-00:37"),
        );


        // Passage/Dialog Comprehension开始时播放此句，此为练习要求
        $data['events'][] = array(
            "num"=>"10",
            "type"=>"text",
            'text'=>array("Listen carefully and answer the questions.","Listen carefully and answer the questions."),
            "timeRange"=>array("00:41-00:44","00:44-00:48"),
        );

        // SR Sentence Reading开始时播放此句,此为题目要求
        $data['events'][] = array(
            "num"=>"11",
            "type"=>"text",
            'text'=>array("Read the following sentences.","Read the following sentences."),
            "timeRange"=>array("01:12-01:14","01:14-01:17"),
        );

        // SR Sentence repetition开始时播放此句，此为题目要求
        $data['events'][] = array(
            "num"=>"12",
            "type"=>"text",
            'text'=>array("Listen and repeat the sentence.","Listen and repeat the sentence."),
            "timeRange"=>array("01:17-01:20","01:20-01:23"),
        );

        // 所有练习结束时鼓励语
        $data['events'][] = array(
            "num"=>"13",
            "type"=>"text",
            'text'=>array("Excellent work.","Excellent work.","You did very well.","You did very well.","Thanks for your effort.","Thanks for your effort."),
            "timeRange"=>array("01:27-01:29","01:29-01:31","01:31-01:33","01:33-01:35","01:35-01:37","01:37-01:39"),
        );

        // 完成一个part时
        $data['events'][] = array(
            "num"=>"14",
            "type"=>"text",
            'text'=>array("That's enough for now.","That's enough for now."),
            "timeRange"=>array("01:23-01:25","01:25-01:27"),
        );


        // 练习结束，询问是否再做一次
        $data['events'][] = array(
            "num"=>"15",
            "type"=>"text",
            'text'=>array("Do you want to do it again?","Do you want to do it again?"),
            "timeRange"=>array("01:39-01:41","01:41-01:43"),
        );

        // 超过十秒无反应
        $data['events'][] = array(
            "num"=>"16",
            "type"=>"text",
            'text'=>array("Are you there?","Are you there?"),
            "timeRange"=>array("00:30-00:31","00:31-00:32"),
        );
         //MT中 listen and click, listen and speak， sentence repetition开始时播放此句通篇播放指令

        $data['events'][] = array(
            "num"=>"17",
            "type"=>"text",
            'text'=>array("Listen carefully.","Listen carefully."),
            "timeRange"=>array("00:37-00:39","00:39-00:41"),
        );

        //right
        $data['events'][] = array(
            "num"=>"18",
            "type"=>"text",
            'text'=>array("That's right.","That's right.","Yes, that's right.","Yes, that's right.","That's correct!","That's correct!"),
            "timeRange"=>array("01:43-01:44","01:44-01:46","01:46-01:47:985","01:48-01:50","01:50-01:52","01:52-01:54"),
        );

        // wrong1
        $data['events'][] = array(
            "num"=>"19",
            "type"=>"text",
            'text'=>array("No, that's not correct, please try again.","No, that's not correct, please try again."),
            "timeRange"=>array("01:54-01:58","01:58-02:03"),
        );

        // wrong2
        $data['events'][] = array(
            "num"=>"20",
            "type"=>"text",
            'text'=>array("No, that's not correct.","No, that's not correct."),
            "timeRange"=>array("02:07-02:10","02:10-02:13"),
        );

        //time out 5 seconds 答题超过5秒
        $data['events'][] = array(
            "num"=>"21",
            "type"=>"text",
            'text'=>array("Please make a choice.","Please make a choice."),
            "timeRange"=>array("02:03-02:05","02:05-02:07"),
        );

        //not recognize 1 SR 没有识别第一次
        $data['events'][] = array(
            "num"=>"22",
            "type"=>"text",
            'text'=>array("Please say it again.","Please say it again."),
            "timeRange"=>array("00:52-00:54","00:54-00:56"),
        );

        //not recognize 2 SR 没有识别第二次
        $data['events'][] = array(
            "num"=>"23",
            "type"=>"text",
            'text'=>array("What did you say?","What did you say?"),
            "timeRange"=>array("00:56-00:57","00:57-00:59"),
        );

        // SR time out 5 seconds
        $data['events'][] = array(
            "num"=>"24",
            "type"=>"text",
            'text'=>array("Please speak your answer.","Please speak your answer."),
            "timeRange"=>array("01:08-01:10","01:10-01:12"),
        );

        // 进入APP
        $data['events'][] = array(
            "num"=>"25",
            "type"=>"text",
            'text'=>array("Welcome to Wonder English.","Welcome to Wonder English."),
            "timeRange"=>array("00:00-00:03","00:03-00:06"),
        );

        $a =  json_encode($data);
        $fp = fopen('system.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
       return;
    }



    public function getSystemPrimaryEvents(){
        $data = array(
            "media_filename"=>'media/systemprimary.mp3',
            "media_type"    =>'audio',
            "totalTime"     =>"00:00:000-00:32:539",
            "part_type"     =>"system",
        );
        // 正确
        $data['events'][] = array(
            "num"=>"1",
            "type"=>"text",
            "system_type"=>"correct",
            'text'=>array("Yes, thank you.","Thank you","Well done","Great","Excellent","awesome"),
            "timeRange"=>array("00:00:000-00:02:012","00:02:012-00:03:578","00:03:578-00:05:101","00:05:101-00:06:448","00:06:448-00:07:986","00:07:986-00:09:392"),
        );
        // 错误
        $data['events'][] = array(
            "num"=>"18",
            "type"=>"text",
            "system_type"=>"error",
            'text'=>array("Try again","Not yet","Sorry, try again.",),
            "timeRange"=>array("00:09:392-00:11:053","00:11:053-00:12:624","00:12:624-00:14:907"),
        );
        $a =  json_encode($data);
        $fp = fopen('systemprimary.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
        return;
    }

    public function getPart3(){
        $data = array(
            "unit_id"       =>1,
            "lesson_id"     =>1,
            "part_id"       =>3,
            "media_filename"=>'media/u1p.mp3',
            "media_type"    =>'audio',
            "totalTime"     =>"4:48",
            "part_type"     =>"listening",
            "have_questions"=>true,
            "questions_type"=>"sr",
            "keywords"      =>array("name","businessman","born","address","avenue",
                "graduate","university","major",
                "computer science","company","married","grade","customs","kindergarten","photographer","nature",
                "travel", "grandparents", "immigrate", "retired",
            ),
        );
//        $data['events'][] = array(
//                "num"=>"1",
//                'type'=>"text",
//                "timeRange"=>"00:00-00:05",
//                "text"=>"Unit 1 Personal Information",
//                "picture"=>"images/u1_p_001.jpg"
//        );
        $data['events'][] = array(
            "num"=>"2",
            'type'=>"text",
            "timeRange"=>"00:00-00:11",
            "text"=>"Hello, this is Channel We.I'm Mr. V. In today's program we will get to know the big family of Mr. Jack Smith, a famous IT star.",
            "media_filename"=>'media/u1p.mp4',
            "media_type"    =>'video',
            "picture"=>"images/u1_p_001.png",
            "pictures"=>array(
            ),
        );
        $data['events'][] = array(
            "num"=>"5",
            'type'=>"text",
            "timeRange"=>"00:21-00:24",
            "text"=>"This is Jack Smith.",
            "displayKewords"=>true,
            "picture"=>"images/u1_p_002.png"
        );
        $data['events'][] = array(
            "num"=>"6",
            'type'=>"text",
            "timeRange"=>"00:25-00:28",
            "text"=>"His first name is Jack.",
            "picture"=>"images/u1_p_002.png"
        );

        $data['events'][] = array(
            "num"=>"7",
            "content_id"=>24,
            'type'=>"sr_reading",
            "timeRange"=>"00:28-00:31",
            "scores"=>1,
            "text"=>"His last name is Smith.",
            "answer"=>"His last name is Smith",
            "picture"=>"images/u1_p_002.png"
        );
        $data['events'][] = array(
            "num"=>"8",
            'type'=>"text",
            "timeRange"=>"00:32-00:36",
            "text"=>"Jack Smith is an American businessman.",
            "picture"=>"images/u1_p_002.png"
        );
        $data['events'][] = array(
            "num"=>"9",
            'type'=>"text",
            "timeRange"=>"00:37-00:43",
            "text"=>"He was born on March 1st, 1975 in Los Angeles, USA. ",
            "picture"=>"images/u1_p_002.png"
        );

        $data['events'][] = array(
            "num"=>"10",
            'type'=>"text",
            "timeRange"=>"00:43-00:47",
            "text"=>"He now lives in Los Angeles. ",
            "picture"=>"images/u1_p_002.png"
        );

        $data['events'][] = array(
            "num"=>"11",
            "content_id"=>25,
            'type'=>"sr_reading",
            "scores"=>1,
            "timeRange"=>"00:47-00:53",
            "text"=>"His address is No.83 Atlantic Avenue.",
            "answer"=>"His address is number eighty three Atlantic Avenue",
            "picture"=>"images/u1_p_002.png"
        );

        $data['events'][] = array(
            "num"=>"12",
            'type'=>"text",
            "timeRange"=>"00:53-00:59",
            "text"=>"Jack graduated at the age of 22 from a university in England.",
            "picture"=>"images/u1_p_002.png"
        );

        $data['events'][] = array(
            "num"=>"13",
            "content_id"=>26,
            'type'=>"sr_reading",
            "scores"=>1,
            "timeRange"=>"00:59-01:03",
            "text"=>"His major was computer science.",
            "answer"=>"His major was computer science",
            "picture"=>"images/u1_p_002.png"
        );

        $data['events'][] = array(
            "num"=>"14",
            'type'=>"text",
            "timeRange"=>"01:03-01:07",
            "text"=>"He first worked for a small computer company. ",
            "picture"=>"images/u1_p_002.png"
        );

        $data['events'][] = array(
            "num"=>"15",
            "content_id"=>27,
            'type'=>"sr_reading",
            "scores"=>1,
            "timeRange"=>"01:08-01:13",
            "text"=>"Now he has his own IT company in the U.S.A.",
            "answer"=>"Now he has his own IT company in the USA",
            "picture"=>"images/u1_p_002.png"
        );

        $data['events'][] = array(
            "num"=>"16",
            'type'=>"text",
            "timeRange"=>"01:13-01:17",
            "text"=>"Jack has a family of four.",
            "picture"=>"images/u1_p_002.png"
        );

        $data['events'][] = array(
            "num"=>"17",
            "content_id"=>28,
            'type'=>"sr_reading",
            "scores"=>1,
            "timeRange"=>"01:17-01:22",
            "text"=>"Jack got married to Amy at the age of 27.",
            "answer"=>"Jack got married to Amy at the age of twenty seven",
            "picture"=>"images/u1_p_003.png"
        );

        $data['events'][] = array(
            "num"=>"18",
            'type'=>"text",
            "timeRange"=>"01:22-01:26",
            "text"=>"Amy is an IT engineer. ",
            "picture"=>"images/u1_p_003.png"
        );


        $data['events'][] = array(
            "num"=>"19",
            "content_id"=>29,
            'type'=>"sr_reading",
            "scores"=>1,
            "timeRange"=>"01:27-01:30",
            "text"=>"She works for a high-tech company.",
            "answer"=>"She works for a high tech company",
            "picture"=>"images/u1_p_003.png"
        );

        $data['events'][] = array(
            "num"=>"20",
            'type'=>"text",
            "timeRange"=>"01:31-01:36",
            "text"=>"Jack and Amy have two children，Alice and John. ",
            "picture"=>"images/u1_p_004.png"
        );

        $data['events'][] = array(
            "num"=>"21",
            "content_id"=>30,
            'type'=>"sr_reading",
            "scores"=>1,
            "timeRange"=>"01:36-01:41",
            "text"=>"Alice is their daughter and she is thirteen years old.",
            "answer"=>"Alice is their daughter and she is thirteen years old",
            "picture"=>"images/u1_p_004.png"
        );

        $data['events'][] = array(
            "num"=>"22",
            'type'=>"text",
            "timeRange"=>"01:41-01:45",
            "text"=>"She goes to middle school. ",
            "picture"=>"images/u1_p_004.png"
        );

        $data['events'][] = array(
            "num"=>"23",
            "content_id"=>31,
            'type'=>"sr_reading",
            "scores"=>1,
            "timeRange"=>"01:45-01:48",
            "text"=>"She is in eighth grade.",
            "answer"=>"She is in eighth grade",
            "picture"=>"images/u1_p_004.png"
        );

        $data['events'][] = array(
            "num"=>"24",
            'type'=>"text",
            "timeRange"=>"01:48-01:53",
            "text"=>"John, their son, is nine years old.",
            "picture"=>"images/u1_p_004.png"
        );

        $data['events'][] = array(
            "num"=>"25",
            "content_id"=>32,
            'type'=>"sr_reading",
            "scores"=>1,
            "timeRange"=>"01:53-01:57",
            "text"=>"He goes to primary school.",
            "answer"=>"He goes to primary school",
            "picture"=>"images/u1_p_004.png"
        );

        $data['events'][] = array(
            "num"=>"26",
            'type'=>"text",
            "timeRange"=>"01:57-02:01",
            "text"=>"They both go to school by school bus. ",
            "picture"=>"images/u1_p_004.png"
        );


        $data['events'][] = array(
            "num"=>"27",
            "content_id"=>33,
            'type'=>"sr_reading",
            "scores"=>1,
            "timeRange"=>"02:01-02:07",
            "text"=>"Both of them are very good at studying.",
            "answer"=>"Both of them are very good at studying",
            "picture"=>"images/u1_p_004.png"
        );

        $data['events'][] = array(
            "num"=>"28",
            'type'=>"text",
            "timeRange"=>"04:39-04:43",
            "text"=>"And their teachers like them very much.",
            "picture"=>"images/u1_p_004.png"
        );

        $data['events'][] = array(
            "num"=>"29",
            "content_id"=>34,
            'type'=>"sr_reading",
            "scores"=>1,
            "timeRange"=>"02:08-02:11",
            "text"=>"Jack has a younger sister, Helen.",
            "answer"=>"Jack has a younger sister Helen",
            "picture"=>"images/u1_p_005.png"
        );

        $data['events'][] = array(
            "num"=>"30",
            'type'=>"text",
            "timeRange"=>"02:12-02:15",
            "text"=>"She works for a bank.",
            "picture"=>"images/u1_p_005.png"
        );

        $data['events'][] = array(
            "num"=>"31",
            "content_id"=>35,
            'type'=>"sr_reading",
            "scores"=>1,
            "timeRange"=>"02:15-02:19",
            "text"=>"Her husband, William, works at customs.",
            "answer"=>"Her husband William works at customs",
            "picture"=>"images/u1_p_006.png"
        );

        $data['events'][] = array(
            "num"=>"32",
            'type'=>"text",
            "timeRange"=>"02:19-02:25",
            "text"=>"Helen and William also have two children: Mary and Harry.",
            "answer"=>"Helen and William also have two children Mary and Harry",
            "picture"=>"images/u1_p_007.png"
        );

        $data['events'][] = array(
            "num"=>"33",
            'type'=>"text",
            "timeRange"=>"02:26-02:31",
            "text"=>"Mary is five years old and Harry is 3 years old.",
            "picture"=>"images/u1_p_007.png"
        );

        $data['events'][] = array(
            "num"=>"34",
            'type'=>"text",
            "timeRange"=>"04:55-04:58",
            "text"=>"Every morning at 7:30.",
            "picture"=>"images/u1_p_007.png"
        );

        $data['events'][] = array(
            "num"=>"35",
            "content_id"=>36,
            'type'=>"sr_reading",
            "scores"=>1,
            "timeRange"=>"02:33-02:37",
            "text"=>"Helen drives her two children to kindergarten.",
            "answer"=>"Helen drives her two children to kindergarten",
            "picture"=>"images/u1_p_007.png"
        );
        $data['events'][] = array(
            "num"=>"36",
            'type'=>"text",
            "timeRange"=>"02:38-02:42",
            "text"=>"Jack also has a younger brother, Andy.",
            "picture"=>"images/u1_p_008.png"
        );
        $data['events'][] = array(
            "num"=>"37",
            "content_id"=>37,
            'type'=>"sr_reading",
            "scores"=>1,
            "timeRange"=>"02:42-02:45",
            "text"=>"He is a photographer.",
            "answer"=>"He is a photographer",
            "picture"=>"images/u1_p_008.png"
        );
        $data['events'][] = array(
            "num"=>"38",
            'type'=>"text",
            "timeRange"=>"02:46-02:48",
            "text"=>"He is single.",
            "picture"=>"images/u1_p_008.png"
        );

        $data['events'][] = array(
            "num"=>"39",
            'type'=>"text",
            "timeRange"=>"02:49-02:53",
            "text"=>"He has just graduated from the New York Art School. ",
            "picture"=>"images/u1_p_008.png"
        );

        $data['events'][] = array(
            "num"=>"40",
            "content_id"=>38,
            'type'=>"sr_reading",
            "scores"=>1,
            "timeRange"=>"02:54-02:57",
            "text"=>"He likes nature and travels a lot.",
            "answer"=>"He likes nature and travels a lot",
            "picture"=>"images/u1_p_008.png"
        );


        $data['events'][] = array(
            "num"=>"41",
            'type'=>"text",
            "timeRange"=>"02:58-03:02",
            "text"=>"He now works for a small magazine in South Africa.",
            "picture"=>"images/u1_p_008.png"
        );

        $data['events'][] = array(
            "num"=>"42",
            "content_id"=>39,
            'type'=>"sr_reading",
            "scores"=>1,
            "timeRange"=>"03:02-03:06",
            "text"=>"But he is thinking about changing his job.",
            "answer"=>"but he is thinking about changing his job",
            "picture"=>"images/u1_p_008.png"
        );

        $data['events'][] = array(
            "num"=>"43",
            'type'=>"text",
            "timeRange"=>"03:06-03:12",
            "text"=>"Jack's grandparents immigrated into the United States from England. ",
            "picture"=>"images/u1_p_009.png"
        );


        $data['events'][] = array(
            "num"=>"44",
            'type'=>"text",
            "timeRange"=>"03:12-03:16",
            "text"=>"Jack's father Richard, is a retired doctor. ",
            "picture"=>"images/u1_p_010.png"
        );

        $data['events'][] = array(
            "num"=>"45",
            "content_id"=>40,
            'type'=>"sr_reading",
            "scores"=>1,
            "timeRange"=>"03:17-03:21",
            "text"=>"Jack's mother Ellen, is a retired nurse.",
            "answer"=>"Jack's mother Ellen is a retired nurse",
            "picture"=>"images/u1_p_010.png"
        );


        $data['events'][] = array(
            "num"=>"46",
            'type'=>"text",
            "timeRange"=>"03:21-03:26",
            "text"=>"Now let's look at Jack's family tree.",
            "picture"=>"images/u1_p_011.png"
        );
        $data['events'][] = array(
            "num"=>"47",
            "content_id"=>41,
            'type'=>"sr_reading",
            "scores"=>1,
            "timeRange"=>"03:26-03:30",
            "text"=>"Jack comes from a big family.",
            "answer"=>"Jack comes from a big family",
            "picture"=>"images/u1_p_011.png"
        );



        $data['events'][] = array(
            "num"=>"48",
            'type'=>"text",
            "timeRange"=>"03:30-03:34",
            "text"=>"Jack's parents are Richard and Ellen. ",
            "answer"=>"Jack's parents are Richard and Ellen",
            "picture"=>"images/u1_p_012.png"
        );

        $data['events'][] = array(
            "num"=>"49",
            'type'=>"text",
            "timeRange"=>"03:34-03:38",
            "text"=>"Jack's wife is Amy. ",
            "picture"=>"images/u1_p_013.png"
        );

        $data['events'][] = array(
            "num"=>"50",
            'type'=>"text",
            "timeRange"=>"03:38-03:42",
            "text"=>"She is Richard and Ellen's daughter-in-law.",
            "answer"=>"She is Richard and Ellen's daughter in law",
            "picture"=>"images/u1_p_013.png"
        );

        $data['events'][] = array(
            "num"=>"51",
            'type'=>"text",
            "timeRange"=>"03:42-03:45",
            "text"=>"Jack has two children. ",
            "picture"=>"images/u1_p_014.png"
        );

        $data['events'][] = array(
            "num"=>"52",
            'type'=>"text",
            "timeRange"=>"03:46-03:50",
            "text"=>"They are Richard and Ellen's grandchildren. ",
            "picture"=>"images/u1_p_014.png"
        );

        $data['events'][] = array(
            "num"=>"53",
            "content_id"=>42,
            'type'=>"sr_reading",
            "scores"=>1,
            "timeRange"=>"03:50-03:53",
            "text"=>"Richard is Amy's father-in-law.",
            "answer"=>"Richard is Amy's father in law",
            "picture"=>"images/u1_p_015.png"
        );

        $data['events'][] = array(
            "num"=>"54",
            'type'=>"text",
            "timeRange"=>"04:35-04:39",
            "text"=>"While Ellen is Amy's mother-in-law. ",
            "picture"=>"images/u1_p_015.png"
        );
        $data['events'][] = array(
            "num"=>"55",
            'type'=>"text",
            "timeRange"=>"03:57-04:01",
            "text"=>"Jack has a sister, Helen. ",
            "picture"=>"images/u1_p_016.png"
        );

        $data['events'][] = array(
            "num"=>"56",
            "content_id"=>43,
            'type'=>"sr_reading",
            "scores"=>1,
            "timeRange"=>"04:01-04:04",
            "text"=>"She is Jack's children's aunt.",
            "answer"=>"She is Jack's children's aunt",
            "picture"=>"images/u1_p_016.png"
        );
        $data['events'][] = array(
            "num"=>"57",
            "content_id"=>44,
            'type'=>"sr_reading",
            "scores"=>1,
            "timeRange"=>"04:05-04:10",
            "text"=>"Jack's brother, Andy, is Jack's children's uncle.",
            "answer"=>"Jack's brother Andy is Jack's children's uncle",
            "picture"=>"images/u1_p_016.png"
        );

        $data['events'][] = array(
            "num"=>"58",
            'type'=>"text",
            "timeRange"=>"04:10-04:16",
            "text"=>"Helen is Amy's sister-in-law while Andy is Amy's brother-in-law.",
            "picture"=>"images/u1_p_017.png"
        );

        $data['events'][] = array(
            "num"=>"59",
            "content_id"=>45,
            'type'=>"sr_reading",
            "scores"=>1,
            "timeRange"=>"04:16-04:20",
            "text"=>"William is Jack's brother-in-law.",
            "answer"=>"William is Jack's brother in law",
            "picture"=>"images/u1_p_018.png"
        );

        $data['events'][] = array(
            "num"=>"60",
            "content_id"=>46,
            'type'=>"sr_reading",
            "scores"=>1,
            "timeRange"=>"04:20-04:25",
            "text"=>"Jack's son, John, is Helen and Andy's nephew.",
            "answer"=>"Jack's son John is Helen and Andy's nephew",
            "picture"=>"images/u1_p_019.png"
        );

        $data['events'][] = array(
            "num"=>"61",
            "content_id"=>47,
            'type'=>"sr_reading",
            "scores"=>1,
            "timeRange"=>"04:25-04:29",
            "text"=>"while Jack's daughter, Alice, is Helen and Andy's niece.",
            "answer"=>"while Jack's daughter Alice is Helen and Andy's niece",
            "picture"=>"images/u1_p_019.png"
        );
        $data['events'][] = array(
            "num"=>"57",
            "content_id"=>48,
            'type'=>"sr_reading",
            "scores"=>1,
            "timeRange"=>"04:29-04:35",
            "text"=>"Jack's children and Helen's children are cousins.",
            "answer"=>"Jack's children and Helen's children are cousins",
            "picture"=>"images/u1_p_020.png"
        );
//
//        $data['events'][] = array(
//            "num"=>"58",
//            "timeRange"=>"04:35-04:40",
//            "text"=>"while Ellen is Amy's mother-in-law. ",
//            "picture"=>"images/u1_p_001.jpg"
//        );
//
//        $data['events'][] = array(
//            "num"=>"59",
//            "timeRange"=>"02:58-03:02",
//            "text"=>"He now works for a small magazine in South Africa,",
//            "picture"=>"images/u1_p_001.jpg"
//        );
//
//        $data['events'][] = array(
//            "num"=>"60",
//            "timeRange"=>"02:31-02:33",
//            "text"=>"Every morning at 7:30,",
//            "picture"=>"images/u1_p_001.jpg"
//        );
//
//        $data['events'][] = array(
//            "num"=>"61",
//            "timeRange"=>"04:39-04:43",
//            "text"=>"and their teachers like them very much ",
//            "picture"=>"images/u1_p_001.jpg"
//        );
//
//        $data['events'][] = array(
//            "num"=>"62",
//            "timeRange"=>"04:43-04:48",
//            "text"=>"Jack's son, John, is Helen and Andy's nephew",
//            "picture"=>"images/u1_p_001.jpg"
//        );
        $this->saveEventListToDatabases($data);
        $a =  json_encode($data);
        $fp = fopen('json3.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
       return;
    }


    public function getPart4(){
        $data = array(
            "unit_id"       =>1,
            "lesson_id"     =>2,
            "part_id"       =>4,
            "media_filename"=>'media/u1p4.mp4',
            "media_type"    =>'video',
            "totalTime"     =>"4:05",
            "part_type"     =>"dialog",
            "have_questions"=>false,
            "questions_type"=>"text",
            "keywords"      =>array("apply for","credit card","abroad","application form","fill out",
                            "ID","Social Security Number","mobile",
                            "zip code","bill","capital letter","double-check","teller"
                             ),
        );
        $data['events'][] = array(
                "num"=>"1",
                'type'=>"text",
                "timeRange"=>"00:00-00:04",
                "text"=>"Ellen Richard is now inside a bank.",
                "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"2",
            'type'=>"text",
            "timeRange"=>"00:04-00:10",
            "text"=>"She is going to apply for a credit card as she is going to travel abroad. ",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"3",
            'type'=>"text",
            "timeRange"=>"00:10-00:13",
            "text"=>"Hello, ma'am. ",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"4",
            'type'=>"text",
            "timeRange"=>"00:13-00:16",
            "text"=>"How may I help you?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"5",
            'type'=>"text",
            "timeRange"=>"0:16-00:23",
            "text"=>"Yes. I want to apply for a credit card that can be used abroad. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"6",
            'type'=>"text",
            "timeRange"=>"00:23-00:30",
            "text"=>"Ok. You need to fill out this application form first, please.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"7",
            'type'=>"text",
            "timeRange"=>"00:30-00:35",
            "text"=>"Well, I always feel nervous when I have to fill out forms. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"8",
            'type'=>"text",
            "timeRange"=>"00:35-00:38",
            "text"=>"Could you please do it for me?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"9",
            'type'=>"text",
            "timeRange"=>"00:38-00:41",
            "text"=>"Sure, my pleasure. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"10",
            'type'=>"text",
            "timeRange"=>"00:41-00:45",
            "text"=>"May I have your name, please?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"11",
            'type'=>"text",
            "timeRange"=>"00:45-00:48",
            "text"=>"It's Ellen Richard.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"12",
            'type'=>"text",
            "timeRange"=>"00:48-00:52",
            "text"=>"Ok, Ellen Richard. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"13",
            'type'=>"text",
            "timeRange"=>"00:52-00:56",
            "text"=>"May I have your ID number, please?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"14",
            'type'=>"text",
            "timeRange"=>"00:56-01:04",
            "text"=>"77019850326.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"15",
            'type'=>"text",
            "timeRange"=>"01:04-01:10",
            "text"=>"Ok, and do you have your Social Security number with you today?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"16",
            'type'=>"text",
            "timeRange"=>"01:10-01:18",
            "text"=>"Yes, I do. It's 123-45-6789.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"17",
            'type'=>"text",
            "timeRange"=>"01:18-01:22",
            "text"=>"And what is your home phone number?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"18",
            'type'=>"text",
            "timeRange"=>"01:22-01:29",
            "text"=>"It's 320 66071287.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"19",
            'type'=>"text",
            "timeRange"=>"01:29-01:34",
            "text"=>"Great. And do you have a mobile phone, Mrs. Richard?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"20",
            'type'=>"text",
            "timeRange"=>"01:34-01:37",
            "text"=>"Yes, of course.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"21",
            'type'=>"text",
            "timeRange"=>"01:37-01:43",
            "text"=>"It's 216 222 5566.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"22",
            'type'=>"text",
            "timeRange"=>"01:43-01:47",
            "text"=>"And what is your home address?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"23",
            'type'=>"text",
            "timeRange"=>"01:47-01:53",
            "text"=>"2990 Third Ave Cleveland, CA.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"24",
            'type'=>"text",
            "timeRange"=>"01:53-01:57",
            "text"=>"CA is for California.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"25",
            'type'=>"text",
            "timeRange"=>"01:57-01:59",
            "text"=>"Got it. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"26",
            'type'=>"text",
            "timeRange"=>"01:59-02:03",
            "text"=>"And your zip code, please?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"27",
            'type'=>"text",
            "timeRange"=>"02:03-02:08",
            "text"=>"Oh, yes, the zip code is 44114.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"28",
            'type'=>"text",
            "timeRange"=>"02:08-02:15",
            "text"=>"Could you please tell me your email address so that we can mail you your monthly bill?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"29",
            'type'=>"text",
            "timeRange"=>"02:15-02:21",
            "text"=>"Of course. It's Ellens@gmail.com.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"30",
            'type'=>"text",
            "timeRange"=>"02:21-02:25",
            "text"=>"The first E is a capital letter.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"31",
            'type'=>"text",
            "timeRange"=>"02:25-02:30",
            "text"=>"Ellens@gmail.com.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"32",
            'type'=>"text",
            "timeRange"=>"02:30-02:37",
            "text"=>"Ok, Mrs. Richard, let me double-check everything with you before you go to the teller. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"33",
            'type'=>"text",
            "timeRange"=>"02:37-02:41",
            "text"=>"Name: Ellen Richard. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"34",
            'type'=>"text",
            "timeRange"=>"02:41-02:49",
            "text"=>"ID number: 77019850326.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"35",
            'type'=>"text",
            "timeRange"=>"02:49-02:57",
            "text"=>"Social Security number: 123-45-6789. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"36",
            'type'=>"text",
            "timeRange"=>"02:57-03:06",
            "text"=>"Home phone number: 320 66071287.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"37",
            'type'=>"text",
            "timeRange"=>"03:06-03:14",
            "text"=>"Mobile phone number: 216 222 5566. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"38",
            'type'=>"text",
            "timeRange"=>"03:14-03:21",
            "text"=>"Home address: 2990 Third Ave Cleveland, CA.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"39",
            'type'=>"text",
            "timeRange"=>"03:21-03:26",
            "text"=>"Zip Code is 44114. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"40",
            'type'=>"text",
            "timeRange"=>"03:26-03:33",
            "text"=>"And your email address is Ellens@gmail.com.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"41",
            'type'=>"text",
            "timeRange"=>"03:33-03:37",
            "text"=>"Is that all correct, Mrs. Richard?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"42",
            'type'=>"text",
            "timeRange"=>"03:37-03:40",
            "text"=>"Yes, that's right! ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"43",
            'type'=>"text",
            "timeRange"=>"03:40-03:43",
            "text"=>"Thank you so much!",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"44",
            'type'=>"text",
            "timeRange"=>"03:43-03:47",
            "text"=>"Alright, we also need your signature. ",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"45",
            'type'=>"text",
            "timeRange"=>"03:47-03:51",
            "text"=>"Please sign your name here, Mrs. Richard. ",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"46",
            'type'=>"text",
            "timeRange"=>"03:51-03:59",
            "text"=>"OK, now that the form is done, you can take it to the bank teller at Window number 2.",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"47",
            'type'=>"text",
            "timeRange"=>"03:59-04:02",
            "text"=>"Thanks so much for your help.",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"48",
            'type'=>"text",
            "timeRange"=>"04:02-04:05",
            "text"=>"My pleasure, ma'am.",
            "picture"=>""
        );
        $this->saveEventListToDatabases($data);

        $a =  json_encode($data);
        $fp = fopen('json4.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
       return;
    }

    public function getPart5(){
        $data = array(
            "unit_id"       =>1,
            "lesson_id"     =>2,
            "part_id"       =>5,
            "media_filename"=>'media/u1p4.mp4',
            "media_type"    =>'video',
            "totalTime"     =>"4:05",
            "part_type"     =>"dialog",
            "have_questions"=>true,
            "questions_type"=>"text",
            "keywords"      =>array("apply for","credit card","abroad","application form","fill out",
                "ID","Social Security Number","mobile",
                "zip code","bill","capital letter","double-check","teller"
            ),
        );
        $data['events'][] = array(
            "num"=>"1",
            'type'=>"text",
            "timeRange"=>"00:00-00:04",
            "text"=>"Ellen Richard is now inside a bank.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"2",
            'type'=>"text",
            "timeRange"=>"00:04-00:10",
            "text"=>"She is going to apply for a credit card as she is going to travel abroad. ",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"3",
            'type'=>"text",
            "timeRange"=>"00:10-00:13",
            "text"=>"Hello, ma'am. ",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"4",
            'type'=>"text",
            "timeRange"=>"00:13-00:16",
            "text"=>"How may I help you?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"5",
            'type'=>"text",
            "timeRange"=>"0:16-00:23",
            "text"=>"Yes. I want to apply for a credit card that can be used abroad. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"6",
            'type'=>"text",
            "timeRange"=>"00:23-00:30",
            "text"=>"Ok. You need to fill out this application form first, please.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"7",
            'type'=>"text",
            "timeRange"=>"00:30-00:35",
            "text"=>"Well, I always feel nervous when I have to fill out forms. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"8",
            'type'=>"multipleChoices",
            "timeRange"=>"",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"44",
                    "content_id"=>49,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1dcq.mp3',
                    "timeRange"=>"00:00-00:04",
                    "text"=>"What does Ellen want to apply for?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Ellen wants to apply for a passport.","isCorrect"=>false),
                        "1"=>array("item"=>"Ellen wants to apply for a credit card.", "isCorrect"=>true),
                        "2"=>array("item"=>"Ellen wants to help the man. ", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u1dcq_feedback.mp3',
                            "timeRange"=>"00:00-00:05",
                            "text"=>"Ellen wants to apply for a credit card.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u1dcq_feedback.mp3',
                            "timeRange"=>"00:00-00:05",
                            "text"=>"Ellen wants to apply for a credit card.",
                        ),
                    ),
                ),
                1=>array(
                    "num"=>"44",
                    "content_id"=>50,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1dcq.mp3',
                    "timeRange"=>"00:04-00:09",
                    "text"=>"Why does Ellen want to apply for a credit card?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Because she is nervous.","isCorrect"=>false),
                        "1"=>array("item"=>"Because she wants to go shopping.", "isCorrect"=>false),
                        "2"=>array("item"=>"Because she wants to travel abroad.", "isCorrect"=>true),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u1dcq_feedback.mp3',
                            "timeRange"=>"00:05-00:11",
                            "text"=>"Ellen applies for a credit card because she wants to travel abroad.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u1dcq_feedback.mp3',
                            "timeRange"=>"00:05-00:11",
                            "text"=>"Ellen applies for a credit card because she wants to travel abroad.",
                        ),
                    ),
                ),
                2=>array(
                    "num"=>"44",
                    "content_id"=>51,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1dcq.mp3',
                    "timeRange"=>"00:09-00:13",
                    "text"=>"Does she need to fill out a form?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Yes","isCorrect"=>true),
                        "1"=>array("item"=>"No", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u1dcq_feedback.mp3',
                            "timeRange"=>"00:11-00:15",
                            "text"=>"She needs to fill out a form.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u1dcq_feedback.mp3',
                            "timeRange"=>"00:11-00:15",
                            "text"=>"She needs to fill out a form.",
                        ),
                    ),
                ),

            )
        );

        $data['events'][] = array(
            "num"=>"9",
            'type'=>"text",
            "timeRange"=>"00:35-00:38",
            "text"=>"Could you please do it for me?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"10",
            'type'=>"text",
            "timeRange"=>"00:38-00:41",
            "text"=>"Sure, my pleasure. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"11",
            'type'=>"text",
            "timeRange"=>"00:41-00:45",
            "text"=>"May I have your name, please?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"12",
            'type'=>"text",
            "timeRange"=>"00:45-00:48",
            "text"=>"It's Ellen Richard.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"13",
            'type'=>"text",
            "timeRange"=>"00:48-00:52",
            "text"=>"Ok, Ellen Richard. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"14",
            'type'=>"text",
            "timeRange"=>"00:52-00:56",
            "text"=>"May I have your ID number, please?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"15",
            'type'=>"text",
            "timeRange"=>"00:56-01:04",
            "text"=>"77019850326.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"16",
            'type'=>"text",
            "timeRange"=>"01:04-01:10",
            "text"=>"Ok, and do you have your Social Security number with you today?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"17",
            'type'=>"text",
            "timeRange"=>"01:10-01:18",
            "text"=>"Yes, I do. It's 123-45-6789.",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"18",
            'type'=>"multipleChoices",
            "timeRange"=>"",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"44",
                    "content_id"=>52,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1dcq.mp3',
                    "timeRange"=>"00:13-00:17",
                    "text"=>"Does Ellen have an ID number? ",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Yes","isCorrect"=>true),
                        "1"=>array("item"=>"No", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u1dcq_feedback.mp3',
                            "timeRange"=>"00:15-00:26",
                            "text"=>"Ellen has an ID number. Her number is 77019850326. ",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u1dcq_feedback.mp3',
                            "timeRange"=>"00:15-00:26",
                            "text"=>"Ellen has an ID number. Her number is 77019850326. ",
                        ),
                    ),
                ),
                1=>array(
                    "num"=>"44",
                    "content_id"=>53,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1dcq.mp3',
                    "timeRange"=>"00:17-00:22",
                    "text"=>"Does Ellen have a Social Security Number?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Yes","isCorrect"=>true),
                        "1"=>array("item"=>"No", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u1dcq_feedback.mp3',
                            "timeRange"=>"00:26-00:37",
                            "text"=>"Ellen has a Social Security Number. Her number is 123-45-6789.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u1dcq_feedback.mp3',
                            "timeRange"=>"00:26-00:37",
                            "text"=>"Ellen has a Social Security Number. Her number is 123-45-6789.",
                        ),
                    ),
                ),

            )
        );

        $data['events'][] = array(
            "num"=>"19",
            'type'=>"text",
            "timeRange"=>"01:18-01:22",
            "text"=>"And what is your home phone number?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"20",
            'type'=>"text",
            "timeRange"=>"01:22-01:29",
            "text"=>"It's 320 66071287.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"21",
            'type'=>"text",
            "timeRange"=>"01:29-01:34",
            "text"=>"Great. And do you have a mobile phone, Mrs. Richard?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"22",
            'type'=>"text",
            "timeRange"=>"01:34-01:37",
            "text"=>"Yes, of course.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"23",
            'type'=>"text",
            "timeRange"=>"01:37-01:43",
            "text"=>"It's 216 222 5566.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"24",
            'type'=>"text",
            "timeRange"=>"01:43-01:47",
            "text"=>"And what is your home address?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"25",
            'type'=>"text",
            "timeRange"=>"01:47-01:53",
            "text"=>"2990 Third Ave Cleveland, CA.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"26",
            'type'=>"text",
            "timeRange"=>"01:53-01:57",
            "text"=>"CA is for California.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"27",
            'type'=>"text",
            "timeRange"=>"01:57-01:59",
            "text"=>"Got it. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"28",
            'type'=>"text",
            "timeRange"=>"01:59-02:03",
            "text"=>"And your zip code, please?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"29",
            'type'=>"text",
            "timeRange"=>"02:03-02:08",
            "text"=>"Oh, yes, the zip code is 44114.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"30",
            'type'=>"text",
            "timeRange"=>"02:08-02:15",
            "text"=>"Could you please tell me your email address so that we can mail you your monthly bill?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"31",
            'type'=>"text",
            "timeRange"=>"02:15-02:21",
            "text"=>"Of course. It's Ellens@gmail.com.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"32",
            'type'=>"text",
            "timeRange"=>"02:21-02:25",
            "text"=>"The first E is a capital letter.",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"33",
            'type'=>"multipleChoices",
            "timeRange"=>"",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"44",
                    "content_id"=>54,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1dcq.mp3',
                    "timeRange"=>"00:22-00:26",
                    "text"=>"Does Ellen have a mobile phone? ",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Yes","isCorrect"=>true),
                        "1"=>array("item"=>"No", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u1dcq_feedback.mp3',
                            "timeRange"=>"00:37-00:46",
                            "text"=>"Ellen's mobile phone is 216 222 5566.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u1dcq_feedback.mp3',
                            "timeRange"=>"00:37-00:46",
                            "text"=>"Ellen's mobile phone is 216 222 5566.",
                        ),
                    ),
                ),
                1=>array(
                    "num"=>"44",
                    "content_id"=>55,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1dcq.mp3',
                    "timeRange"=>"00:26-00:30",
                    "text"=>"Does Ellen have a zip code? ",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Yes","isCorrect"=>true),
                        "1"=>array("item"=>"No", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u1dcq_feedback.mp3',
                            "timeRange"=>"00:46-00:52",
                            "text"=>"Ellen's zip code is 44114.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u1dcq_feedback.mp3',
                            "timeRange"=>"00:46-00:52",
                            "text"=>"Ellen's zip code is 44114.",
                        ),
                    ),
                ),
                2=>array(
                    "num"=>"44",
                    "content_id"=>56,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1dcq.mp3',
                    "timeRange"=>"00:30-00:34",
                    "text"=>"Where does Ellen live?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Paris.","isCorrect"=>false),
                        "1"=>array("item"=>"California.", "isCorrect"=>true),
                        "2"=>array("item"=>"England.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u1dcq_feedback.mp3',
                            "timeRange"=>"00:52-00:56",
                            "text"=>"Ellen lives in California.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u1dcq_feedback.mp3',
                            "timeRange"=>"00:52-00:56",
                            "text"=>"Ellen lives in California.",
                        ),
                    ),
                ),
                3=>array(
                    "num"=>"44",
                    "content_id"=>57,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1dcq.mp3',
                    "timeRange"=>"00:34-00:39",
                    "text"=>"Why does the bank need her email address?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"To send her monthly bill.","isCorrect"=>true),
                        "1"=>array("item"=>"To greet her every month.", "isCorrect"=>false),
                        "2"=>array("item"=>"To promote business.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u1dcq_feedback.mp3',
                            "timeRange"=>"00:56-01:02",
                            "text"=>"The bank needs her email address to send her monthly bill.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u1dcq_feedback.mp3',
                            "timeRange"=>"00:56-01:02",
                            "text"=>"The bank needs her email address to send her monthly bill.",
                        ),
                    ),
                ),

            )
        );

        $data['events'][] = array(
            "num"=>"34",
            'type'=>"text",
            "timeRange"=>"02:25-02:30",
            "text"=>"Ellens@gmail.com.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"35",
            'type'=>"text",
            "timeRange"=>"02:30-02:37",
            "text"=>"Ok, Mrs. Richard, let me double-check everything with you before you go to the teller. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"36",
            'type'=>"text",
            "timeRange"=>"02:37-02:41",
            "text"=>"Name: Ellen Richard. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"37",
            'type'=>"text",
            "timeRange"=>"02:41-02:49",
            "text"=>"ID number: 77019850326.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"38",
            'type'=>"text",
            "timeRange"=>"02:49-02:57",
            "text"=>"Social Security number: 123-45-6789. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"39",
            'type'=>"text",
            "timeRange"=>"02:57-03:06",
            "text"=>"Home phone number: 320 66071287.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"40",
            'type'=>"text",
            "timeRange"=>"03:06-03:14",
            "text"=>"Mobile phone number: 216 222 5566. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"41",
            'type'=>"text",
            "timeRange"=>"03:14-03:21",
            "text"=>"Home address: 2990 Third Ave Cleveland, CA.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"42",
            'type'=>"text",
            "timeRange"=>"03:21-03:26",
            "text"=>"Zip Code is 44114. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"43",
            'type'=>"text",
            "timeRange"=>"03:26-03:33",
            "text"=>"And your email address is Ellens@gmail.com.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"44",
            'type'=>"text",
            "timeRange"=>"03:33-03:37",
            "text"=>"Is that all correct, Mrs. Richard?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"45",
            'type'=>"text",
            "timeRange"=>"03:37-03:40",
            "text"=>"Yes, that's right! ",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"46",
            'type'=>"text",
            "timeRange"=>"03:40-03:43",
            "text"=>"Thank you so much!",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"47",
            'type'=>"multipleChoices",
            "timeRange"=>"",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"44",
                    "content_id"=>58,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1dcq.mp3',
                    "timeRange"=>"00:39-00:44",
                    "text"=>"Is all that information correct?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Yes","isCorrect"=>true),
                        "1"=>array("item"=>"No", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u1dcq_feedback.mp3',
                            "timeRange"=>"01:02-01:06",
                            "text"=>"All the information is correct.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u1dcq_feedback.mp3',
                            "timeRange"=>"01:02-01:06",
                            "text"=>"All the information is correct.",
                        ),
                    ),
                ),

            )
        );

        $data['events'][] = array(
            "num"=>"48",
            'type'=>"text",
            "timeRange"=>"03:43-03:47",
            "text"=>"Alright, we also need your signature. ",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"49",
            'type'=>"text",
            "timeRange"=>"03:47-03:51",
            "text"=>"Please sign your name here, Mrs. Richard. ",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"50",
            'type'=>"text",
            "timeRange"=>"03:51-03:59",
            "text"=>"OK, now that the form is done, you can take it to the bank teller at Window number 2.",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"51",
            'type'=>"text",
            "timeRange"=>"03:59-04:02",
            "text"=>"Thanks so much for your help.",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"52",
            'type'=>"text",
            "timeRange"=>"04:02-04:05",
            "text"=>"My pleasure, ma'am.",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"47",
            'type'=>"multipleChoices",
            "timeRange"=>"",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"44",
                    "content_id"=>59,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1dcq.mp3',
                    "timeRange"=>"00:44-00:49",
                    "text"=>"Does the bank also need Ellen's signature? ",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Yes","isCorrect"=>true),
                        "1"=>array("item"=>"No", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u1dcq_feedback.mp3',
                            "timeRange"=>"01:06-01:10",
                            "text"=>"The bank needs Ellen's signature.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u1dcq_feedback.mp3',
                            "timeRange"=>"01:06-01:10",
                            "text"=>"The bank needs Ellen's signature.",
                        ),
                    ),
                ),
                1=>array(
                    "num"=>"44",
                    "content_id"=>60,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1dcq.mp3',
                    "timeRange"=>"00:49-00:55",
                    "text"=>"After filling out the form, what does Ellen need to do next?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Take the form and go home.","isCorrect"=>false),
                        "1"=>array("item"=>"Take the form to the bank teller.", "isCorrect"=>true),
                        "2"=>array("item"=>"Take the form to her husband.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u1dcq_feedback.mp3',
                            "timeRange"=>"01:10-01:18",
                            "text"=>"After filling out the form, Ellen will take the form to the bank teller at Window number 2.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u1dcq_feedback.mp3',
                            "timeRange"=>"01:10-01:18",
                            "text"=>"After filling out the form, Ellen will take the form to the bank teller at Window number 2.",
                        ),
                    ),
                ),

            )
        );

        $this->saveEventListToDatabases($data);
        $a =  json_encode($data);
        $fp = fopen('json5.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
       return;
    }



    public function getPart6(){
        $data = array(
            "unit_id"       =>1,
            "lesson_id"     =>2,
            "part_id"       =>6,
            "media_filename"=>'media/u1p4.mp4',
            "media_type"    =>'video',
            "totalTime"     =>"4:05",
            "part_type"     =>"dialog",
            "have_questions"=>true,
            "questions_type"=>"sr",
            "keywords"      =>array("apply for","credit card","abroad","application form","fill out",
                "ID","Social Security Number","mobile",
                "zip code","bill","capital letter","double-check","teller"
            ),
        );
        $data['events'][] = array(
            "num"=>"1",
            'type'=>"text",
            "timeRange"=>"00:00-00:04",
            "text"=>"Ellen Richard is now inside a bank.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"2",
            'type'=>"text",
            "timeRange"=>"00:04-00:10",
            "text"=>"She is going to apply for a credit card as she is going to travel abroad. ",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"3",
            'type'=>"text",
            "timeRange"=>"00:10-00:13",
            "text"=>"Hello, ma'am. ",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"4",
            'type'=>"sr_reading",
            "content_id"=>61,
            "scores"=>1,
            "timeRange"=>"00:13-00:16",
            "text"=>"How may I help you?",
            "answer"=>"How may I help you",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"5",
            'type'=>"text",
            "timeRange"=>"0:16-00:23",
            "text"=>"Yes. I want to apply for a credit card that can be used abroad. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"6",
            'type'=>"sr_reading",
            "content_id"=>62,
            "scores"=>1,
            "timeRange"=>"00:23-00:30",
            "text"=>"Ok. You need to fill out this application form first, please.",
            "answer"=>"Ok You need to fill out this application form first please",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"7",
            'type'=>"text",
            "timeRange"=>"00:30-00:35",
            "text"=>"Well, I always feel nervous when I have to fill out forms. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"8",
            'type'=>"sr_reading",
            "content_id"=>63,
            "scores"=>1,
            "timeRange"=>"00:35-00:38",
            "text"=>"Could you please do it for me?",
            "answer"=>"Could you please do it for me",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"9",
            'type'=>"text",
            "timeRange"=>"00:38-00:41",
            "text"=>"Sure, my pleasure. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"10",
            'type'=>"sr_reading",
            "content_id"=>64,
            "scores"=>1,
            "timeRange"=>"00:41-00:45",
            "text"=>"May I have your name, please?",
            "answer"=>"May I have your name please",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"11",
            'type'=>"text",
            "timeRange"=>"00:45-00:48",
            "text"=>"It's Ellen Richard.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"12",
            'type'=>"text",
            "timeRange"=>"00:48-00:52",
            "text"=>"Ok, Ellen Richard. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"13",
            'type'=>"text",
            "timeRange"=>"00:52-00:56",
            "text"=>"May I have your ID number, please?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"14",
            'type'=>"text",
            "timeRange"=>"00:56-01:04",
            "text"=>"77019850326.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"15",
            'type'=>"sr_reading",
            "content_id"=>65,
            "scores"=>1,
            "timeRange"=>"01:04-01:10",
            "text"=>"Ok, and do you have your Social Security number with you today?",
            "answer"=>"OK and do you have your Social Security number with you today",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"16",
            'type'=>"text",
            "timeRange"=>"01:10-01:18",
            "text"=>"Yes, I do. It's 123-45-6789.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"17",
            'type'=>"text",
            "timeRange"=>"01:18-01:22",
            "text"=>"And what is your home phone number?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"18",
            'type'=>"text",
            "timeRange"=>"01:22-01:29",
            "text"=>"It's 320 66071287.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"19",
            'type'=>"sr_reading",
            "content_id"=>66,
            "scores"=>1,
            "timeRange"=>"01:29-01:34",
            "text"=>"Great. And do you have a mobile phone, Mrs. Richard?",
            "answer"=>"Great And do you have a mobile phone Mrs Richard",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"20",
            'type'=>"text",
            "timeRange"=>"01:34-01:37",
            "text"=>"Yes, of course.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"21",
            'type'=>"text",
            "timeRange"=>"01:37-01:43",
            "text"=>"It's 216 222 5566.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"22",
            'type'=>"sr_reading",
            "content_id"=>67,
            "scores"=>1,
            "timeRange"=>"01:43-01:47",
            "text"=>"And what is your home address?",
            "answer"=>"And what is your home address",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"23",
            'type'=>"text",
            "timeRange"=>"01:47-01:53",
            "text"=>"2990 Third Ave Cleveland, CA.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"24",
            'type'=>"sr_reading",
            "content_id"=>68,
            "scores"=>1,
            "timeRange"=>"01:53-01:57",
            "text"=>"CA is for California.",
            "answer"=>"CA is for California",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"25",
            'type'=>"text",
            "timeRange"=>"01:57-01:59",
            "text"=>"Got it. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"26",
            'type'=>"text",
            "timeRange"=>"01:59-02:03",
            "text"=>"And your zip code, please?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"27",
            'type'=>"sr_reading",
            "content_id"=>69,
            "scores"=>1,
            "timeRange"=>"02:03-02:08",
            "text"=>"Oh, yes, the zip code is 44114.",
            "answer"=>"Oh yes the zip code is four four one one four",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"28",
            'type'=>"text",
            "timeRange"=>"02:08-02:15",
            "text"=>"Could you please tell me your email address so that we can mail you your monthly bill?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"29",
            'type'=>"text",
            "timeRange"=>"02:15-02:21",
            "text"=>"Of course. It's Ellens@gmail.com.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"30",
            'type'=>"sr_reading",
            "content_id"=>70,
            "scores"=>1,
            "timeRange"=>"02:21-02:25",
            "text"=>"The first E is a capital letter.",
            "answer"=>"he first E is a capital letter",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"31",
            'type'=>"text",
            "timeRange"=>"02:25-02:30",
            "text"=>"Ellens@gmail.com.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"32",
            'type'=>"text",
            "timeRange"=>"02:30-02:37",
            "text"=>"Ok, Mrs. Richard, let me double-check everything with you before you go to the teller. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"33",
            'type'=>"sr_reading",
            "content_id"=>71,
            "scores"=>1,
            "timeRange"=>"02:37-02:41",
            "text"=>"Name: Ellen Richard.",
            "answer"=>"Name Ellen Richard",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"34",
            'type'=>"text",
            "timeRange"=>"02:41-02:49",
            "text"=>"ID number: 77019850326.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"35",
            'type'=>"sr_reading",
            "content_id"=>72,
            "scores"=>1,
            "timeRange"=>"02:49-02:57",
            "text"=>"Social Security number: 123-45-6789. ",
            "answer"=>"Social Security number one two three four five six seven eight nine",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"36",
            'type'=>"text",
            "timeRange"=>"02:57-03:06",
            "text"=>"Home phone number: 320 66071287.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"37",
            'type'=>"sr_reading",
            "content_id"=>73,
            "scores"=>1,
            "timeRange"=>"03:06-03:14",
            "text"=>"Mobile phone number: 216 222 5566. ",
            "answer"=>"Mobile phone number two one six two two two five five six six",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"38",
            'type'=>"text",
            "timeRange"=>"03:14-03:21",
            "text"=>"Home address: 2990 Third Ave Cleveland, CA.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"39",
            'type'=>"text",
            "timeRange"=>"03:21-03:26",
            "text"=>"Zip Code is 44114. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"40",
            'type'=>"text",
            "timeRange"=>"03:26-03:33",
            "text"=>"And your email address is Ellens@gmail.com.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"41",
            'type'=>"sr_reading",
            "content_id"=>74,
            "scores"=>1,
            "timeRange"=>"03:33-03:37",
            "text"=>"Is that all correct, Mrs. Richard?",
            "answer"=>"Is that all correct Mrs Richard",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"42",
            'type'=>"text",
            "timeRange"=>"03:37-03:40",
            "text"=>"Yes, that's right! ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"43",
            'type'=>"text",
            "timeRange"=>"03:40-03:43",
            "text"=>"Thank you so much!",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"44",
            'type'=>"sr_reading",
            "content_id"=>75,
            "scores"=>1,
            "timeRange"=>"03:43-03:47",
            "text"=>"Alright, we also need your signature.",
            "answer"=>"Alright we also need your signature",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"45",
            'type'=>"sr_reading",
            "content_id"=>76,
            "scores"=>1,
            "timeRange"=>"03:47-03:51",
            "text"=>"Please sign your name here, Mrs. Richard. ",
            "answer"=>"Please sign your name here Mrs Richard",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"46",
            'type'=>"sr_reading",
            "content_id"=>77,
            "scores"=>1,
            "timeRange"=>"03:51-03:59",
            "text"=>"OK, now that the form is done, you can take it to the bank teller at Window number 2.",
            "answer"=>"OK now that the form is done you can take it to the bank teller at Window number 2",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"47",
            'type'=>"text",
            "timeRange"=>"03:59-04:02",
            "text"=>"Thanks so much for your help.",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"48",
            'type'=>"sr_reading",
            "content_id"=>78,
            "scores"=>1,
            "timeRange"=>"04:02-04:05",
            "text"=>"My pleasure, ma'am.",
            "answer"=>"My pleasure mam",
            "picture"=>""
        );
        $this->saveEventListToDatabases($data);
        $a =  json_encode($data);
        $fp = fopen('json6.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
       return;
    }

    public function getPart7(){
        $dataT = array(
            "unit_id"       =>1,
            "lesson_id"     =>3,
            "part_id"       =>7,
            "media_filename"=>'media/u1ps.mp3',
            "media_type"    =>'audio',
            "totalTime"     =>"1:34",
            "part_type"     =>"summary",
            "have_questions"=>true,
            "questions_type"=>"sr",
            "keywords"      =>array("name","born","birthday","address","avenue",
                "bachelor's degree","graduating","owner","computer science",
                "married","photographer","nature","single","immigrate","retired"
            ),
        );
        $data['events'][] = array(
            "num"=>"1",
            'type'=>"text",
            "timeRange"=>"00:00-00:05",
            "text"=>"Here is a short summary about Jack Smith.",
            "picture"=>"images/u1_ps_000.png"
        );
        $data['events'][] = array(
            "num"=>"2",
            'type'=>"text",
            "timeRange"=>"00:06-00:10",
            "text"=>"His first name is Jack and his last name is Smith.",
            "picture"=>"images/u1_ps_001.png"
        );
        $data['events'][] = array(
            "num"=>"3",
            'type'=>"text",
            "timeRange"=>"00:10-00:14",
            "text"=>"He is from the United States.",
            "picture"=>"images/u1_ps_002.png"
        );

        $data['events'][] = array(
            "num"=>"4",
            'type'=>"text",
            "timeRange"=>"00:14-00:21",
            "text"=>"He was born in 1975 in Los Angeles, USA.",
            "picture"=>"images/u1_ps_003.png"
        );
        $data['events'][] = array(
            "num"=>"5",
            'type'=>"text",
            "timeRange"=>"00:20-00:25",
            "text"=>"His birthday is March 1st.",
            "picture"=>"images/u1_ps_003.png"
        );
        $data['events'][] = array(
            "num"=>"6",
            'type'=>"text",
            "timeRange"=>"00:25-00:32",
            "text"=>"His home address is No.83 Atlantic Avenue in Los Angeles.",
            "picture"=>"images/u1_ps_004.png"
        );
        $data['events'][] = array(
            "num"=>"7",
            'type'=>"text",
            "timeRange"=>"00:32-00:37",
            "text"=>"He has a bachelor's degree in computer science.",
            "picture"=>"images/u1_ps_005.png"
        );
        $data['events'][] = array(
            "num"=>"8",
            'type'=>"text",
            "timeRange"=>"00:37-00:44",
            "text"=>"After graduating from university, Jack found a job in a small computer company.",
            "picture"=>"images/u1_ps_006.png"
        );
        $data['events'][] = array(
            "num"=>"9",
            'type'=>"text",
            "timeRange"=>"00:44-00:49",
            "text"=>"Now he is the owner of an IT company.",
            "picture"=>"images/u1_ps_006.png"
        );
        $data['events'][] = array(
            "num"=>"10",
            'type'=>"text",
            "timeRange"=>"00:49-00:54",
            "text"=>"Jack is married to Amy and they have two children. ",
            "picture"=>"images/u1_ps_007.png"
        );
        $data['events'][] = array(
            "num"=>"11",
            'type'=>"text",
            "timeRange"=>"00:54-00:58",
            "text"=>"Jack's children both go to school. ",
            "picture"=>"images/u1_ps_007.png"
        );
        $data['events'][] = array(
            "num"=>"12",
            'type'=>"text",
            "timeRange"=>"00:58-01:02",
            "text"=>"Jack has a sister and a brother. ",
            "picture"=>"images/u1_ps_007.png"
        );
        $data['events'][] = array(
            "num"=>"13",
            'type'=>"text",
            "timeRange"=>"01:02-01:08",
            "text"=>"His sister, Helen, is married, and has two children.",
            "picture"=>"images/u1_ps_007.png"
        );
        $data['events'][] = array(
            "num"=>"14",
            'type'=>"text",
            "timeRange"=>"01:08-01:12",
            "text"=>"Helen's two children go to kindergarten.",
            "picture"=>"images/u1_ps_007.png"
        );
        $data['events'][] = array(
            "num"=>"15",
            'type'=>"text",
            "timeRange"=>"01:12-01:17",
            "text"=>"Jack's brother, Andy, is a photographer.",
            "picture"=>"images/u1_ps_007.png"
        );
        $data['events'][] = array(
            "num"=>"16",
            'type'=>"text",
            "timeRange"=>"01:17-01:20",
            "text"=>"Andy likes nature.",
            "picture"=>"images/u1_ps_007.png"
        );
        $data['events'][] = array(
            "num"=>"17",
            'type'=>"text",
            "timeRange"=>"01:20-01:23",
            "text"=>" He is still single.",
            "picture"=>"images/u1_ps_007.png"
        );
        $data['events'][] = array(
            "num"=>"18",
            'type'=>"text",
            "timeRange"=>"01:23-01:28",
            "text"=>"Jack's grandparents immigrated to the USA from England.",
            "picture"=>"images/u1_ps_007.png"
        );
        $data['events'][] = array(
            "num"=>"10",
            'type'=>"text",
            "timeRange"=>"01:28-01:33",
            "text"=>"Jack's parents are both retired.",
            "picture"=>"images/u1_ps_007.png"
        );

        $data['events'][] = array(
            "num"=>"1",
            "content_id"=>79,
            'type'=>"sr_readings",
            "timeRange"=>array("00:00-00:06","00:04-00:11","00:09-00:15"),
            "scores"=>1,
            "text"=>array("Here is a short summary about Jack Smith.","His first name is Jack and his last name is Smith.","He is from the United States."),
            "answer"=>array("Here is a short summary about Jack Smith","His first name is Jack and his last name is Smith","He is from the United States"),
            "picture"=>"images/u1_ps_003.png"
        );
        $data['events'][] = array(
            "num"=>"2",
            "content_id"=>80,
            'type'=>"sr_readings",
            "timeRange"=>array("00:13-00:24","00:21-00:25","00:25-00:32"),
            "scores"=>1,
            "text"=>array("He was born in 1975 in Los Angeles, USA.","His birthday is March 1st.","His home address is No.83 Atlantic Avenue in Los Angeles."),
            "answer"=>array("He was born in nineteen seventy five in Los Angeles USA","His birthday is March first","His home address is number eighty three Atlantic Avenue in Los Angeles"),
            "picture"=>"images/u1_ps_004.png"
        );

        $data['events'][] = array(
            "num"=>"3",
            "content_id"=>81,
            'type'=>"sr_readings",
            "timeRange"=>array("00:32-00:38","00:38-00:45","00:45-00:49"),
            "scores"=>1,
            "text"=>array("He has a bachelor's degree in computer science.","After graduating from university, Jack found a job in a small computer company. ","Now he is the owner of an IT company. "),
            "answer"=>array("He has a bachelor's degree in computer science","After graduating from university Jack found a job in a small computer company","Now he is the owner of an IT company"),
            "picture"=>"images/u1_ps_007.png"
        );

        $data['events'][] = array(
            "num"=>"4",
            "content_id"=>82,
            'type'=>"sr_readings",
            "timeRange"=>array("00:49-00:54","00:54-00:58","00:58-01:02"),
            "scores"=>1,
            "text"=>array("Jack is married to Amy and they have two children.","Jack's children both go to school.","Jack has a sister and a brother."),
            "answer"=>array("Jack is married to Amy and they have two children","Jack's children both go to school","Jack has a sister and a brother"),
            "picture"=>"images/u1_ps_008.png"
        );

        $data['events'][] = array(
            "num"=>"5",
            "content_id"=>83,
            'type'=>"sr_readings",
            "timeRange"=>array("01:02-01:08","01:08-01:12","01:12-01:17"),
            "scores"=>1,
            "text"=>array("His sister, Helen, is married, and has two children.","Helen's two children go to kindergarten.","Jack's brother, Andy, is a photographer."),
            "answer"=>array("His sister Helen is married and has two children","Helen's two children go to kindergarten","Jack's brother Andy is a photographer"),
            "picture"=>"images/u1_ps_008.png"
        );

        $data['events'][] = array(
            "num"=>"6",
            "content_id"=>84,
            'type'=>"sr_readings",
            "timeRange"=>array("01:17-01:20","01:20-01:23","01:23-01:28","01:28-01:33"),
            "scores"=>1,
            "text"=>array("Andy likes nature.","He is still single.","Jack's grandparents immigrated to the USA from England.","Jack's parents are both retired."),
            "answer"=>array("Andy likes nature","He is still single","Jack's grandparents immigrated to the USA from England","Jack's parents are both retired"),
            "picture"=>"images/u1_ps_009.png"
        );

       // $dataT['eventLists'] = array($data,$data1);
        $database = array_merge($dataT,$data);
        //$database = array_merge($database,$data1);
        echo json_encode($database) ;
        //exit;
        $this->saveEventListToDatabases($database);
        $a =  json_encode($dataT);
        $fp = fopen('json7.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
       return;
    }


    public function getPart8(){
        $data = array(
            "unit_id"       =>1,
            "lesson_id"     =>3,
            "part_id"       =>8,
            "media_filename"=>'media/u1p.mp3',
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
            "content_id"=>85,
            'type'=>"sr_reading",
            "timeRange"=>"00:47-00:53",
            "scores"=>1,
            "text"=>"His address is No. 83 Atlantic Avenue.",
            "answer"=>"His address is number eighty three Atlantic Avenue",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1p.mp3',
                    "timeRange"=>"00:47-00:53",
                    "text"=>"His address is No. 83 Atlantic Avenue.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1p.mp3',
                    "timeRange"=>"00:47-00:53",
                    "text"=>"His address is No. 83 Atlantic Avenue.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"2",
            "content_id"=>86,
            'type'=>"sr_reading",
            "timeRange"=>"00:53-00:59",
            "scores"=>1,
            "text"=>"Jack graduated at the age of 22 from a university in England.",
            "answer"=>"Jack graduated at the age of twenty two from a university in England",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1p.mp3',
                    "timeRange"=>"00:53-00:59",
                    "text"=>"Jack graduated at the age of 22 from a university in England.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1p.mp3',
                    "timeRange"=>"00:53-00:59",
                    "text"=>"Jack graduated at the age of 22 from a university in England.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"3",
            "content_id"=>87,
            'type'=>"sr_reading",
            "timeRange"=>"01:03-01:07",
            "scores"=>1,
            "text"=>"He first worked for a small computer company.",
            "answer"=>"He first worked for a small computer company",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1p.mp3',
                    "timeRange"=>"01:03-01:07",
                    "text"=>"He first worked for a small computer company.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1p.mp3',
                    "timeRange"=>"01:03-01:07",
                    "text"=>"He first worked for a small computer company.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"4",
            "content_id"=>88,
            'type'=>"sr_reading",
            "timeRange"=>"01:17-01:22",
            "scores"=>1,
            "text"=>"Jack got married to Amy at the age of 27.",
            "answer"=>"Jack got married to Amy at the age of twenty seven",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1p.mp3',
                    "timeRange"=>"01:17-01:22",
                    "text"=>"Jack got married to Amy at the age of 27.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1p.mp3',
                    "timeRange"=>"01:17-01:22",
                    "text"=>"Jack got married to Amy at the age of 27.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"5",
            "content_id"=>89,
            'type'=>"sr_reading",
            "timeRange"=>"01:36-01:41",
            "scores"=>1,
            "text"=>"Alice is their daughter and she is thirteen years old.",
            "answer"=>"Alice is their daughter and she is thirteen years old",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1p.mp3',
                    "timeRange"=>"01:36-01:41",
                    "text"=>"Alice is their daughter and she is thirteen years old. ",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1p.mp3',
                    "timeRange"=>"01:36-01:41",
                    "text"=>"Alice is their daughter and she is thirteen years old. ",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"6",
            "content_id"=>90,
            'type'=>"sr_reading",
            "timeRange"=>"01:53-01:57",
            "scores"=>1,
            "text"=>"He goes to primary school. ",
            "answer"=>"He goes to primary school",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1p.mp3',
                    "timeRange"=>"01:53-01:57",
                    "text"=>"He goes to primary school. ",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1p.mp3',
                    "timeRange"=>"01:53-01:57",
                    "text"=>"He goes to primary school. ",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"7",
            "content_id"=>90,
            'type'=>"sr_reading",
            "timeRange"=>"01:57-02:01",
            "scores"=>1,
            "text"=>"They both go to school by school bus.",
            "answer"=>"They both go to school by school bus",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1p.mp3',
                    "timeRange"=>"01:57-02:01",
                    "text"=>"They both go to school by school bus. ",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1p.mp3',
                    "timeRange"=>"01:57-02:01",
                    "text"=>"They both go to school by school bus. ",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"8",
            "content_id"=>91,
            'type'=>"sr_reading",
            "timeRange"=>"02:01-02:07",
            "scores"=>1,
            "text"=>"Both of them are very good at studying and their teachers like them very much.",
            "answer"=>"Both of them are very good at studying and their teachers like them very much",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1p.mp3',
                    "timeRange"=>"02:01-02:07",
                    "text"=>"Both of them are very good at studying and their teachers like them very much.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1p.mp3',
                    "timeRange"=>"02:01-02:07",
                    "text"=>"Both of them are very good at studying and their teachers like them very much.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"9",
            "content_id"=>92,
            'type'=>"sr_reading",
            "timeRange"=>"02:08-02:11",
            "scores"=>1,
            "text"=>"Jack has a younger sister, Helen.",
            "answer"=>"Jack has a younger sister Helen",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1p.mp3',
                    "timeRange"=>"02:08-02:11",
                    "text"=>"Jack has a younger sister, Helen.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1p.mp3',
                    "timeRange"=>"02:08-02:11",
                    "text"=>"Jack has a younger sister, Helen.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"10",
            "content_id"=>93,
            'type'=>"sr_reading",
            "timeRange"=>"02:15-02:19",
            "scores"=>1,
            "text"=>"Her husband, William, works at customs.",
            "answer"=>"Her husband William works at customs",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1p.mp3',
                    "timeRange"=>"02:15-02:19",
                    "text"=>"Her husband, William, works at customs.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1p.mp3',
                    "timeRange"=>"02:15-02:19",
                    "text"=>"Her husband, William, works at customs.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"11",
            "content_id"=>94,
            'type'=>"sr_reading",
            "timeRange"=>"02:49-02:53",
            "scores"=>1,
            "text"=>"He has just graduated from the New York Art School.",
            "answer"=>"He has just graduated from the New York Art School",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1p.mp3',
                    "timeRange"=>"02:49-02:53",
                    "text"=>"He has just graduated from the New York Art School.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1p.mp3',
                    "timeRange"=>"02:49-02:53",
                    "text"=>"He has just graduated from the New York Art School.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"12",
            "content_id"=>95,
            'type'=>"sr_reading",
            "timeRange"=>"02:54-02:57",
            "scores"=>1,
            "text"=>"He likes nature and travels a lot.",
            "answer"=>"He likes nature and travels a lot",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1p.mp3',
                    "timeRange"=>"02:54-02:57",
                    "text"=>"He likes nature and travels a lot.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1p.mp3',
                    "timeRange"=>"02:54-02:57",
                    "text"=>"He likes nature and travels a lot.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"13",
            "content_id"=>96,
            'type'=>"sr_reading",
            "timeRange"=>"03:06-03:12",
            "scores"=>1,
            "text"=>"Jack's grandparents immigrated into the United States from England. ",
            "answer"=>"Jack's grandparents immigrated into the United States from England",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1p.mp3',
                    "timeRange"=>"03:06-03:12",
                    "text"=>"Jack's grandparents immigrated into the United States from England. ",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1p.mp3',
                    "timeRange"=>"03:06-03:12",
                    "text"=>"Jack's grandparents immigrated into the United States from England. ",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"14",
            "content_id"=>97,
            'type'=>"sr_reading",
            "timeRange"=>"03:50-03:57",
            "scores"=>1,
            "text"=>"Richard is Amy's father-in-law while Ellen is Amy's mother-in-law.",
            "answer"=>"Richard is Amy's father in law while Ellen is Amy's mother-in-law",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1p.mp3',
                    "timeRange"=>"03:50-03:57",
                    "text"=>"Richard is Amy's father-in-law while Ellen is Amy's mother-in-law.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1p.mp3',
                    "timeRange"=>"03:50-03:57",
                    "text"=>"Richard is Amy's father-in-law while Ellen is Amy's mother-in-law.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"15",
            "content_id"=>98,
            'type'=>"sr_reading",
            "timeRange"=>"04:01-04:04",
            "scores"=>1,
            "text"=>"She is Jack's children's aunt.",
            "answer"=>"She is Jack's children's aunt",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1p.mp3',
                    "timeRange"=>"04:01-04:04",
                    "text"=>"She is Jack's children's aunt.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1p.mp3',
                    "timeRange"=>"04:01-04:04",
                    "text"=>"She is Jack's children's aunt.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"16",
            "content_id"=>99,
            'type'=>"sr_reading",
            "timeRange"=>"04:43-04:48",
            "scores"=>1,
            "text"=>"Jack's son, John, is Helen and Andy's nephew.",
            "answer"=>"Jack's son John is Helen and Andy's nephew",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1p.mp3',
                    "timeRange"=>"04:43-04:48",
                    "text"=>"Jack's son, John, is Helen and Andy's nephew.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1p.mp3',
                    "timeRange"=>"04:43-04:48",
                    "text"=>"Jack's son, John, is Helen and Andy's nephew.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"17",
            "content_id"=>99,
            'type'=>"sr_reading",
            "timeRange"=>"04:29-04:35",
            "scores"=>1,
            "text"=>"Jack's children and Helen's children are cousins.",
            "answer"=>"Jack's children and Helen's children are cousins",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1p.mp3',
                    "timeRange"=>"04:29-04:35",
                    "text"=>" Jack's children and Helen's children are cousins.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1p.mp3',
                    "timeRange"=>"04:29-04:35",
                    "text"=>" Jack's children and Helen's children are cousins.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"18",
            "content_id"=>100,
            'type'=>"sr_reading",
            "timeRange"=>"04:05-04:10",
            "scores"=>1,
            "text"=>"Do you have your Social Security Number with you today? ",
            "answer"=>"Do you have your Social Security Number with you today",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1d.mp3',
                    "timeRange"=>"04:05-04:10",
                    "text"=>"Do you have your Social Security Number with you today? ",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1d.mp3',
                    "timeRange"=>"04:05-04:10",
                    "text"=>"Do you have your Social Security Number with you today? ",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"19",
            "content_id"=>101,
            'type'=>"sr_reading",
            "timeRange"=>"04:11-04:14",
            "scores"=>1,
            "text"=>"And do you have a mobile phone, Mrs. Richard?",
            "answer"=>"And do you have a mobile phone Mrs Richard",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1d.mp3',
                    "timeRange"=>"04:11-04:14",
                    "text"=>" And do you have a mobile phone, Mrs. Richard?",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1d.mp3',
                    "timeRange"=>"04:11-04:14",
                    "text"=>" And do you have a mobile phone, Mrs. Richard?",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"20",
            "content_id"=>102,
            'type'=>"sr_reading",
            "timeRange"=>"04:14-04:19",
            "scores"=>1,
            "text"=>"Let me double check everything with you before you go to the teller.",
            "answer"=>"Let me double check everything with you before you go to the teller",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1d.mp3',
                    "timeRange"=>"04:14-04:19",
                    "text"=>"Let me double-check everything with you before you go to the teller.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1d.mp3',
                    "timeRange"=>"04:14-04:19",
                    "text"=>"Let me double-check everything with you before you go to the teller.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $this->saveEventListToDatabases($data);
        $a =  json_encode($data);
        $fp = fopen('json8.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
       return;
    }


    public function getPart9(){
        $data = array(
            "unit_id"       =>1,
            "lesson_id"     =>3,
            "part_id"       =>9,
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
            "content_id"=>103,
            "media_filename"=>'media/u1p.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_conjunction_clause",
            "timeRange"     =>"00:37-00:43",
            "scores"=>1,
            "answer"=>"He was born on March first nineteen seventy five in Los Angeles USA",
            "text" => "He was born on March 1st,1975 in Los Angeles, USA.",
            "items"=>array("on March 1st","1975","He was born","in Los Angeles","USA."),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1p.mp3',
                    "timeRange"     =>"00:37-00:43",
                    "text" => "He was born on March 1st,1975 in Los Angeles, USA.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1p.mp3',
                    "timeRange"     =>"00:37-00:43",
                    "text" => "He was born on March 1st,1975 in Los Angeles, USA.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"2",
            "content_id"=>104,
            "media_filename"=>'media/u1p.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_conjunction_clause",
            "timeRange"     =>"02:20-02:25",
            "scores"=>1,
            "answer"=>"Helen and William also have two children Mary and Harry",
            "text" => "Helen and William also have two children: Mary and Harry.",
            "items"=>array("also","Mary and Harry.","have","two children","Helen and William"),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1p.mp3',
                    "timeRange"     =>"02:20-02:25",
                    "text" => "Helen and William also have two children: Mary and Harry.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1p.mp3',
                    "timeRange"     =>"02:20-02:25",
                    "text" => "Helen and William also have two children: Mary and Harry.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"3",
            "content_id"=>105,
            "media_filename"=>'media/u1p.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_conjunction_clause",
            "timeRange"     =>"02:31-02:37",
            "scores"=>1,
            "answer"=>"Every morning at seven thirty Helen drives her two children to kindergarten",
            "text" => "Every morning at 7:30, Helen drives her two children to kindergarten.",
            "items"=>array("at 7:30","Helen drives","her two children","to kindergarten","Every morning"),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1p.mp3',
                    "timeRange"     =>"02:31-02:37",
                    "text" => "Every morning at 7:30, Helen drives her two children to kindergarten.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1p.mp3',
                    "timeRange"     =>"02:31-02:37",
                    "text" => "Every morning at 7:30, Helen drives her two children to kindergarten.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"4",
            "content_id"=>106,
            "media_filename"=>'media/u1p.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_conjunction_clause",
            "timeRange"     =>"02:58-03:02",
            "scores"=>1,
            "answer"=>"He now works for a small magazine in South Africa",
            "text" => "He now works for a small magazine in South Africa.",
            "items"=>array("a small magazine","now","works for","He","in South Africa."),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1p.mp3',
                    "timeRange"     =>"02:58-03:02",
                    "text" => "He now works for a small magazine in South Africa.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1p.mp3',
                    "timeRange"     =>"02:58-03:02",
                    "text" => "He now works for a small magazine in South Africa.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"5",
            "content_id"=>107,
            "media_filename"=>'media/u1p.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_conjunction_clause",
            "timeRange"     =>"04:48-04:52",
            "scores"=>1,
            "answer"=>"But he is thinking about changing his job",
            "text" => "But he is thinking about changing his job.",
            "items"=>array("changing","his job.","But","thinking about","he is"),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1p.mp3',
                    "timeRange"     =>"04:48-04:52",
                    "text" => "But he is thinking about changing his job.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1p.mp3',
                    "timeRange"     =>"04:48-04:52",
                    "text" => "But he is thinking about changing his job.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"6",
            "content_id"=>108,
            "media_filename"=>'media/u1p.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_conjunction_clause",
            "timeRange"     =>"04:10-04:16",
            "scores"=>1,
            "answer"=>"Helen is Amy's sister in law while Andy is Amy's brother in law",
            "text" => "Helen is Amy's sister-in-law while Andy is Amy's brother-in-law.",
            "items"=>array("Helen is","while","Amy's sister-in-law.","Amy's brother-in-law","Andy is"),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1p.mp3',
                    "timeRange"     =>"04:10-04:16",
                    "text" => "Helen is Amy's sister-in-law while Andy is Amy's brother-in-law.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1p.mp3',
                    "timeRange"     =>"04:10-04:16",
                    "text" => "Helen is Amy's sister-in-law while Andy is Amy's brother-in-law.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"7",
            "content_id"=>109,
            "media_filename"=>'media/u1d.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_conjunction_clause",
            "timeRange"     =>"04:19-04:24",
            "scores"=>1,
            "answer"=>"I want to apply for a credit card that can be used abroad",
            "text" => "I want to apply for a credit card that can be used abroad. ",
            "items"=>array("apply for","that can be used","I want to","a credit card","abroad."),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1d.mp3',
                    "timeRange"     =>"04:19-04:24",
                    "text" => "I want to apply for a credit card that can be used abroad. ",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1d.mp3',
                    "timeRange"     =>"04:19-04:24",
                    "text" => "I want to apply for a credit card that can be used abroad. ",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );


        $data['events'][] = array(
            "num"=>"8",
            "content_id"=>110,
            "media_filename"=>'media/u1d.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_conjunction_clause",
            "timeRange"     =>"04:24-04:29",
            "scores"=>1,
            "answer"=>"You need to fill out this application form first please",
            "text" => "You need to fill out this application form first, please.",
            "items"=>array("this application form","please.","You need to","fill out","first"),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1d.mp3',
                    "timeRange"     =>"04:24-04:29",
                    "text" => "You need to fill out this application form first, please.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1d.mp3',
                    "timeRange"     =>"04:24-04:29",
                    "text" => "You need to fill out this application form first, please.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"9",
            "content_id"=>111,
            "media_filename"=>'media/u1d.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_conjunction_clause",
            "timeRange"     =>"04:29-04:34",
            "scores"=>1,
            "answer"=>"I always feel nervous when I have to fill out forms",
            "text" => "I always feel nervous when I have to fill out forms.　",
            "items"=>array("I have to","when","feel nervous"," I always","fill out forms"),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1d.mp3',
                    "timeRange"     =>"04:29-04:34",
                    "text" => "I always feel nervous when I have to fill out forms.　",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1d.mp3',
                    "timeRange"     =>"04:29-04:34",
                    "text" => "I always feel nervous when I have to fill out forms.　",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"10",
            "content_id"=>112,
            "media_filename"=>'media/u1d.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_conjunction_clause",
            "timeRange"     =>"04:46-04:53",
            "scores"=>1,
            "answer"=>"Now that the form is done you can take it to the bank teller at Window number two",
            "text" => "Now that the form is done, you can take it to the bank teller at Window No. 2. ",
            "items"=>array("at Window No.2.","you can take it","the form is done","Now that","to the bank teller"),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1d.mp3',
                    "timeRange"     =>"04:46-04:53",
                    "text" => "Now that the form is done, you can take it to the bank teller at Window No. 2. ",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1d.mp3',
                    "timeRange"     =>"04:46-04:53",
                    "text" => "Now that the form is done, you can take it to the bank teller at Window No. 2. ",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $this->saveEventListToDatabases($data);
        $a =  json_encode($data);
        $fp = fopen('json9.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
       return;
    }

    public function getPart10(){
        $data = array(
            "unit_id"       =>1,
            "lesson_id"     =>3,
            "part_id"       =>10,
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
            "content_id"=>113,
            "media_filename"=>'media/u1p.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"00:32-00:36",
            "scores"=>1,
            "text" => " Jack Smith is an American businessman.",
            "answer" => "Jack Smith is an American businessman",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1p.mp3',
                    "timeRange"     =>"00:32-00:36",
                    "text" => " Jack Smith is an American businessman.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1p.mp3',
                    "timeRange"     =>"00:32-00:36",
                    "text" => " Jack Smith is an American businessman.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"2",
            "content_id"=>114,
            "media_filename"=>'media/u1p.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"01:08-01:13",
            "scores"=>1,
            "text" => "Now he has his own IT company in the U.S.A.",
            "answer" => "Now he has his own IT company in the USA",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1p.mp3',
                    "timeRange"     =>"01:08-01:13",
                    "text" => "Now he has his own IT company in the U.S.A.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1p.mp3',
                    "timeRange"     =>"01:08-01:13",
                    "text" => "Now he has his own IT company in the U.S.A.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"3",
            "content_id"=>115,
            "media_filename"=>'media/u1p.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"01:22-01:26",
            "scores"=>1,
            "text" => " Amy is an IT engineer.",
            "answer" => "Amy is an IT engineer",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1p.mp3',
                    "timeRange"     =>"01:22-01:26",
                    "text" => " Amy is an IT engineer.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1p.mp3',
                    "timeRange"     =>"01:22-01:26",
                    "text" => " Amy is an IT engineer.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"4",
            "content_id"=>116,
            "media_filename"=>'media/u1p.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"01:45-01:48",
            "scores"=>1,
            "text" => "She is in eighth grade.",
            "answer" => "She is in eighth grade",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1p.mp3',
                    "timeRange"     =>"01:45-01:48",
                    "text" => "She is in eighth grade.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1p.mp3',
                    "timeRange"     =>"01:45-01:48",
                    "text" => "She is in eighth grade.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"5",
            "content_id"=>117,
            "media_filename"=>'media/u1p.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"02:12-02:15",
            "scores"=>1,
            "text" => "She works for a bank.",
            "answer" => "She works for a bank",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1p.mp3',
                    "timeRange"     =>"02:12-02:15",
                    "text" => "She works for a bank.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1p.mp3',
                    "timeRange"     =>"02:12-02:15",
                    "text" => "She works for a bank.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"6",
            "content_id"=>118,
            "media_filename"=>'media/u1p.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"04:52-04:55",
            "scores"=>1,
            "text" => "Mary is five years old.",
            "answer" => "Mary is five years old",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1p.mp3',
                    "timeRange"     =>"04:52-04:55",
                    "text" => "Mary is five years old.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1p.mp3',
                    "timeRange"     =>"04:52-04:55",
                    "text" => "Mary is five years old.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"7",
            "content_id"=>119,
            "media_filename"=>'media/u1p.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"02:42-02:45",
            "scores"=>1,
            "text" => "He is a photographer.",
            "answer" => "He is a photographer",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1p.mp3',
                    "timeRange"     =>"02:42-02:45",
                    "text" => "He is a photographer.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1p.mp3',
                    "timeRange"     =>"02:42-02:45",
                    "text" => "He is a photographer.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"8",
            "content_id"=>120,
            "media_filename"=>'media/u1p.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"03:12-03:16",
            "scores"=>1,
            "text" => "Jack's father Richard, is a retired doctor.",
            "answer" => "Jack's father Richard is a retired doctor",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1p.mp3',
                    "timeRange"     =>"03:12-03:16",
                    "text" => "Jack's father Richard, is a retired doctor.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1p.mp3',
                    "timeRange"     =>"03:12-03:16",
                    "text" => "Jack's father Richard, is a retired doctor.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"9",
            "content_id"=>121,
            "media_filename"=>'media/u1p.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"03:26-03:30",
            "scores"=>1,
            "text" => "Jack comes from a big family.",
            "answer" => "Jack comes from a big family",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1p.mp3',
                    "timeRange"     =>"03:26-03:30",
                    "text" => "Jack comes from a big family.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1p.mp3',
                    "timeRange"     =>"03:26-03:30",
                    "text" => "Jack comes from a big family.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"10",
            "content_id"=>122,
            "media_filename"=>'media/u1d.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"00:52-00:56",
            "scores"=>1,
            "text" => "May I have your ID number, please?",
            "answer" => "May I have your ID number please",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1d.mp3',
                    "timeRange"     =>"00:52-00:56",
                    "text" => "May I have your ID number, please?",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1d.mp3',
                    "timeRange"     =>"00:52-00:56",
                    "text" => "May I have your ID number, please?",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"11",
            "content_id"=>123,
            "media_filename"=>'media/u1d.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"04:34-04:38",
            "scores"=>1,
            "text" => " What is your home phone number?",
            "answer" => "What is your home phone number",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1d.mp3',
                    "timeRange"     =>"04:34-04:38",
                    "text" => " What is your home phone number?",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1d.mp3',
                    "timeRange"     =>"04:34-04:38",
                    "text" => " What is your home phone number?",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"12",
            "content_id"=>124,
            "media_filename"=>'media/u1d.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"01:43-01:47",
            "scores"=>1,
            "text" => "And what is your home address?",
            "answer" => "And what is your home address",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1d.mp3',
                    "timeRange"     =>"01:43-01:47",
                    "text" => "And what is your home address?",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1d.mp3',
                    "timeRange"     =>"01:43-01:47",
                    "text" => "And what is your home address?",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"13",
            "content_id"=>125,
            "media_filename"=>'media/u1d.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"01:59-02:03",
            "scores"=>1,
            "text" => "And your zip code, please?",
            "answer" => "And your zip code please",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1d.mp3',
                    "timeRange"     =>"01:59-02:03",
                    "text" => "And your zip code, please?",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1d.mp3',
                    "timeRange"     =>"01:59-02:03",
                    "text" => "And your zip code, please?",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"14",
            "content_id"=>126,
            "media_filename"=>'media/u1d.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"04:38-04:43",
            "scores"=>1,
            "text" => "Could you please tell me your e-mail address?",
            "answer" => "Could you please tell me your email address",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1d.mp3',
                    "timeRange"     =>"04:38-04:43",
                    "text" => "Could you please tell me your e-mail address?",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1d.mp3',
                    "timeRange"     =>"04:38-04:43",
                    "text" => "Could you please tell me your e-mail address?",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"15",
            "content_id"=>127,
            "media_filename"=>'media/u1d.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"04:43-04:46",
            "scores"=>1,
            "text" => "Please sign your name here.",
            "answer" => "Please sign your name here",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1d.mp3',
                    "timeRange"     =>"04:43-04:46",
                    "text" => "Please sign your name here.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1d.mp3',
                    "timeRange"     =>"04:43-04:46",
                    "text" => "Please sign your name here.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $this->saveEventListToDatabases($data);
        $a =  json_encode($data);
        $fp = fopen('json10.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
       return;
    }

    public function getPart11(){
        $data = array(
            "unit_id"       =>1,
            "lesson_id"     =>4,
            "part_id"       =>11,
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
            "content_id"=>128,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"00:00-00:07",
            "scores"=>10,
            "text" => "William is applying _ a credit card as he is going to travel abroad.",
            "answer"=>"William is applying for a credit card as he is going to travel abroad.",
            "items" => array(
                "0"=>array("item"=>"for","isCorrect"=>true),
                "1"=>array("item"=>"up", "isCorrect"=>false),
                "2"=>array("item"=>"of", "isCorrect"=>false),
                "3"=>array("item"=>"to", "isCorrect"=>false),
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
            "num"=>"2",
            "content_id"=>129,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"00:06-00:11",
            "scores"=>10,
            "text" => "Ellen will have a trip to Europe _ the plan.",
            "answer"=>"Ellen will have a trip to Europe according to the plan.",
            "items" => array(
                "0"=>array("item"=>"due to","isCorrect"=>false),
                "1"=>array("item"=>"because of", "isCorrect"=>false),
                "2"=>array("item"=>"according to", "isCorrect"=>true),
                "3"=>array("item"=>"lead to","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1gfi.mp3',
                    "timeRange"     =>"00:06-00:11",
                    "text"=>"Ellen will have a trip to Europe according to the plan.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1gfi.mp3',
                    "timeRange"     =>"00:06-00:11",
                    "text"=>"Ellen will have a trip to Europe according to the plan.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"3",
            "content_id"=>130,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"00:11-00:18",
            "scores"=>10,
            "text" => "Jack was born and _ in America _ he went to a university in England.",
            "answer"=>"Jack was born and brought up in America but he went to a university in England.",
            "items" => array(
                "0"=>array("item"=>"grown up","isCorrect"=>false),
                "1"=>array("item"=>"went up", "isCorrect"=>false),
                "2"=>array("item"=>"brought up", "isCorrect"=>true),
                "3"=>array("item"=>"but","isCorrect"=>true),
                "4"=>array("item"=>"and","isCorrect"=>false),
                "5"=>array("item"=>"so","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1gfi.mp3',
                    "timeRange"     =>"00:11-00:18",
                    "text"=>"Jack was born and brought up in America but he went to a university in England.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1gfi.mp3',
                    "timeRange"     =>"00:11-00:18",
                    "text"=>"Jack was born and brought up in America but he went to a university in England.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );
        $data['events'][] = array(
            "num"=>"4",
            "content_id"=>131,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"00:18-00:23",
            "scores"=>10,
            "text" => "Helen is strict _ her children _ study.",
            "answer"=>"Helen is strict with her children in study.",
            "items" => array(
                "0"=>array("item"=>"to","isCorrect"=>false),
                "1"=>array("item"=>"with", "isCorrect"=>true),
                "2"=>array("item"=>"for", "isCorrect"=>false),
                "3"=>array("item"=>"in","isCorrect"=>true),
                "4"=>array("item"=>"on","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1gfi.mp3',
                    "timeRange"     =>"00:18-00:23",
                    "text"=>"Helen is strict with her children in study .",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1gfi.mp3',
                    "timeRange"     =>"00:18-00:23",
                    "text"=>"Helen is strict with her children in study .",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"5",
            "content_id"=>132,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"00:23-00:30",
            "scores"=>10,
            "text" => " John has to take some extra classes to catch up _ his classmates due _ his illness.",
            "answer"=>"John has to take some extra classes to catch up with his classmates due to his illness.",
            "items" => array(
                "0"=>array("item"=>"with", "isCorrect"=>true),
                "1"=>array("item"=>"to","isCorrect"=>true),
                "2"=>array("item"=>"for", "isCorrect"=>false),
                "3"=>array("item"=>"in","isCorrect"=>false),
                "4"=>array("item"=>"on","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1gfi.mp3',
                    "timeRange"     =>"00:23-00:30",
                    "text"=>"John has to take some extra classes to catch up with his classmates due to his illness.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1gfi.mp3',
                    "timeRange"     =>"00:23-00:30",
                    "text"=>"John has to take some extra classes to catch up with his classmates due to his illness.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"6",
            "content_id"=>133,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"00:30-00:37",
            "scores"=>10,
            "text" => "Your mother is badly ill. You'd better call _ a doctor immediately.",
            "answer"=>"Your mother is badly ill. You'd better call in a doctor immediately.",
            "items" => array(
                "0"=>array("item"=>"for", "isCorrect"=>false),
                "1"=>array("item"=>"on","isCorrect"=>false),
                "2"=>array("item"=>"in", "isCorrect"=>true),
                "3"=>array("item"=>"up","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1gfi.mp3',
                    "timeRange"     =>"00:30-00:37",
                    "text"=>"Your mother is badly ill. You'd better call in a doctor immediately.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1gfi.mp3',
                    "timeRange"     =>"00:30-00:37",
                    "text"=>"Your mother is badly ill. You'd better call in a doctor immediately.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );
        $data['events'][] = array(
            "num"=>"7",
            "content_id"=>134,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"00:37-00:43",
            "scores"=>10,
            "text" => "It took the firefighters 12 days to put _ the forest fire.",
            "answer"=>"It took the firefighters 12 days to put out the forest fire.",
            "items" => array(
                "0"=>array("item"=>"up", "isCorrect"=>false),
                "1"=>array("item"=>"on","isCorrect"=>false),
                "2"=>array("item"=>"down", "isCorrect"=>false),
                "3"=>array("item"=>"out","isCorrect"=>true),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1gfi.mp3',
                    "timeRange"     =>"00:37-00:43",
                    "text"=>"It took the firefighters 12 days to put out the forest fire.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1gfi.mp3',
                    "timeRange"     =>"00:37-00:43",
                    "text"=>"It took the firefighters 12 days to put out the forest fire.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"8",
            "content_id"=>135,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"00:43-00:50",
            "scores"=>10,
            "text" => "Andy _ his brother as his idol as he is successful in business.",
            "answer"=>"Andy regards his brother as his idol as he is successful in business.",
            "items" => array(
                "0"=>array("item"=>"sees", "isCorrect"=>false),
                "1"=>array("item"=>"thinks","isCorrect"=>false),
                "2"=>array("item"=>"looks", "isCorrect"=>false),
                "3"=>array("item"=>"regards","isCorrect"=>true),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1gfi.mp3',
                    "timeRange"     =>"00:43-00:50",
                    "text"=>"Andy regards his brother as his idol as he is successful in business.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1gfi.mp3',
                    "timeRange"     =>"00:43-00:50",
                    "text"=>"Andy regards his brother as his idol as he is successful in business.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"9",
            "content_id"=>136,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"00:50-00:56",
            "scores"=>10,
            "text" => "Would you please turn _ the heating? It's too hot here.",
            "answer"=>"Would you please turn down the heating? It's too hot here.",
            "items" => array(
                "0"=>array("item"=>"over", "isCorrect"=>false),
                "1"=>array("item"=>"up","isCorrect"=>false),
                "2"=>array("item"=>"on", "isCorrect"=>false),
                "3"=>array("item"=>"down","isCorrect"=>true),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1gfi.mp3',
                    "timeRange"     =>"00:50-00:56",
                    "text"=>"Would you please turn down the heating? It's too hot here.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1gfi.mp3',
                    "timeRange"     =>"00:50-00:56",
                    "text"=>"Would you please turn down the heating? It's too hot here.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );
        $data['events'][] = array(
            "num"=>"10",
            "content_id"=>137,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"00:56-01:03",
            "scores"=>10,
            "text" => "Andy spent lots of money _ photography _ now he is an excellent photographer.",
            "answer"=>"Andy spent lots of money on photography and now he is an excellent photographer.",
            "items" => array(
                "0"=>array("item"=>"on", "isCorrect"=>true),
                "1"=>array("item"=>"in","isCorrect"=>false),
                "2"=>array("item"=>"for", "isCorrect"=>false),
                "3"=>array("item"=>"then","isCorrect"=>false),
                "4"=>array("item"=>"and","isCorrect"=>true),
                "5"=>array("item"=>"but","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1gfi.mp3',
                    "timeRange"     =>"00:56-01:03",
                    "text"=>"WAndy spent lots of money on photography and now he is an excellent photographer.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1gfi.mp3',
                    "timeRange"     =>"00:56-01:03",
                    "text"=>"WAndy spent lots of money on photography and now he is an excellent photographer.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );
        $data['events'][] = array(
            "num"=>"11",
            "content_id"=>138,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"01:03-01:11",
            "scores"=>10,
            "text" => " Jack grew up in America but he went to a university in England _ the United States.",
            "answer"=>"Jack grew up in America but he went to a university in England instead of the United States.",
            "items" => array(
                "0"=>array("item"=>"in place of", "isCorrect"=>false),
                "1"=>array("item"=>"instead of","isCorrect"=>true),
                "2"=>array("item"=>"in case of", "isCorrect"=>false),
                "3"=>array("item"=>"in spite of","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1gfi.mp3',
                    "timeRange"     =>"01:03-01:11",
                    "text"=>"Jack grew up in America but he went to a university in England instead of the United States.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1gfi.mp3',
                    "timeRange"     =>"01:03-01:11",
                    "text"=>"Jack grew up in America but he went to a university in England instead of the United States.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"12",
            "content_id"=>139,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"01:11-01:16",
            "scores"=>10,
            "text" => " Jack found a new source of profit _ accident.",
            "answer"=>"Jack found a new source of profit by accident.",
            "items" => array(
                "0"=>array("item"=>"in", "isCorrect"=>false),
                "1"=>array("item"=>"with","isCorrect"=>false),
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
            "num"=>"13",
            "content_id"=>140,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"01:16-01:20",
            "scores"=>10,
            "text" => " I'll drop _ on you _ my way home.",
            "answer"=>"I'll drop in on you on my way home.",
            "items" => array(
                "0"=>array("item"=>"in", "isCorrect"=>true),
                "1"=>array("item"=>"on", "isCorrect"=>true),
                "2"=>array("item"=>"up","isCorrect"=>false),
                "3"=>array("item"=>"at","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1gfi.mp3',
                    "timeRange"     =>"01:16-01:20",
                    "text"=>"I'll drop in on you on my way home.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1gfi.mp3',
                    "timeRange"     =>"01:16-01:20",
                    "text"=>"I'll drop in on you on my way home.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"14",
            "content_id"=>141,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"01:20-01:26",
            "scores"=>10,
            "text" => "Andy finally paid _ the auto loans after three years.",
            "answer"=>"Andy finally paid off the auto loans after three years.",
            "items" => array(
                "0"=>array("item"=>"for", "isCorrect"=>true),
                "1"=>array("item"=>"off", "isCorrect"=>true),
                "2"=>array("item"=>"to","isCorrect"=>false),
                "3"=>array("item"=>"up","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1gfi.mp3',
                    "timeRange"     =>"01:20-01:26",
                    "text"=>"Andy finally paid off the auto loans after three years.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1gfi.mp3',
                    "timeRange"     =>"01:20-01:26",
                    "text"=>"Andy finally paid off the auto loans after three years.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"15",
            "content_id"=>142,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"01:26-01:33",
            "scores"=>10,
            "text" => "Jack plans to separate the new department _ the company and set _ a new company.",
            "answer"=>"Jack plans to separate the new department from the company and set up a new company.",
            "items" => array(
                "0"=>array("item"=>"of", "isCorrect"=>false),
                "1"=>array("item"=>"from","isCorrect"=>true),
                "2"=>array("item"=>"up", "isCorrect"=>true),
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
            "num"=>"16",
            "content_id"=>143,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"01:33-01:38",
            "scores"=>10,
            "text" => "Jack's father had an accident _ a rainy night.",
            "answer"=>"Jack's father had an accident on a rainy night.",
            "items" => array(
                "0"=>array("item"=>"at", "isCorrect"=>false),
                "1"=>array("item"=>"in","isCorrect"=>false),
                "2"=>array("item"=>"on", "isCorrect"=>true),
                "3"=>array("item"=>"for","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1gfi.mp3',
                    "timeRange"     =>"01:33-01:38",
                    "text"=>"Jack's father had an accident on a rainy night.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1gfi.mp3',
                    "timeRange"     =>"01:33-01:38",
                    "text"=>"Jack's father had an accident on a rainy night.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );
        $data['events'][] = array(
            "num"=>"17",
            "content_id"=>144,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"01:38-01:44",
            "scores"=>10,
            "text" => "Every morning Helen drives her two children to kindergarten _ time.",
            "answer"=>"Every morning Helen drives her two children to kindergarten on time.",
            "items" => array(
                "0"=>array("item"=>"in", "isCorrect"=>false),
                "1"=>array("item"=>"by","isCorrect"=>false),
                "2"=>array("item"=>"at", "isCorrect"=>false),
                "3"=>array("item"=>"on","isCorrect"=>true),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1gfi.mp3',
                    "timeRange"     =>"01:38-01:44",
                    "text"=>"Every morning Helen drives her two children to kindergarten on time. ",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1gfi.mp3',
                    "timeRange"     =>"01:38-01:44",
                    "text"=>"Every morning Helen drives her two children to kindergarten on time. ",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );
        $data['events'][] = array(
            "num"=>"18",
            "content_id"=>145,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"01:44-01:49",
            "scores"=>10,
            "text" => "Harry is curious _ where babies come from.",
            "answer"=>"Harry is curious about where babies come from.",
            "items" => array(
                "0"=>array("item"=>"about", "isCorrect"=>true),
                "1"=>array("item"=>"in","isCorrect"=>false),
                "2"=>array("item"=>"at", "isCorrect"=>false),
                "3"=>array("item"=>"of","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1gfi.mp3',
                    "timeRange"     =>"01:44-01:49",
                    "text"=>"Harry is curious about where babies come from.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1gfi.mp3',
                    "timeRange"     =>"01:44-01:49",
                    "text"=>"Harry is curious about where babies come from.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"19",
            "content_id"=>146,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"01:49-01:58",
            "scores"=>10,
            "text" => "Andy wanted to work in South Africa. His brother was _ it while his sister was in favor _ it.",
            "answer"=>"Andy wanted to work in South Africa. His brother was against it while his sister was in favor of it.",
            "items" => array(
                "0"=>array("item"=>"for", "isCorrect"=>false),
                "1"=>array("item"=>"against", "isCorrect"=>true),
                "2"=>array("item"=>"of","isCorrect"=>true),
                "3"=>array("item"=>"to","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1gfi.mp3',
                    "timeRange"     =>"01:49-01:58",
                    "text"=>"Andy wanted to work in South Africa. His brother was against it while his sister was in favor of it.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1gfi.mp3',
                    "timeRange"     =>"01:49-01:58",
                    "text"=>"Andy wanted to work in South Africa. His brother was against it while his sister was in favor of it.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"20",
            "content_id"=>147,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"01:58-02:03",
            "scores"=>10,
            "text" => " William runs _ the river every morning.",
            "answer"=>"William runs along the river every morning.",
            "items" => array(
                "0"=>array("item"=>"around", "isCorrect"=>false),
                "1"=>array("item"=>"on", "isCorrect"=>false),
                "2"=>array("item"=>"in","isCorrect"=>false),
                "3"=>array("item"=>"along","isCorrect"=>true),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1gfi.mp3',
                    "timeRange"     =>"01:58-02:03",
                    "text"=>"William runs along the river every morning.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1gfi.mp3',
                    "timeRange"     =>"01:58-02:03",
                    "text"=>"William runs along the river every morning.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );
        $this->saveEventListToDatabases($data);
        $a =  json_encode($data);
        $fp = fopen('json11.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
       return;
    }


    public function getPart12(){
        $data = array(
            "unit_id"       =>1,
            "lesson_id"     =>4,
            "part_id"       =>12,
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
            "content_id"=>148,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"00:01-00:05",
            "scores"=>1,
            "text" => "Let's get down to business.",
            "items" => array(
                "0"=>array("item"=>"get down to"),
                "1"=>array("item"=>"Let's"),
                "2"=>array("item"=>"business."),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1gso.mp3',
                    "timeRange"     =>"00:01-00:05",
                    "text" => "Let's get down to business.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1gso.mp3',
                    "timeRange"     =>"00:01-00:05",
                    "text" => "Let's get down to business.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );
        $data['events'][] = array(
            "num"=>"2",
            "content_id"=>149,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"00:05-00:12",
            "scores"=>1,
            "text" => "Helen tried to call her brother Jack for help during the earthquake but didn't get through.",
            "items" => array(
                "0"=>array("item"=>"call her brother Jack"),
                "1"=>array("item"=>"Helen tried to"),
                "2"=>array("item"=>"but didn't get through."),
                "3"=>array("item"=>"for help"),
                "4"=>array("item"=>"during the earthquake"),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1gso.mp3',
                    "timeRange"     =>"00:05-00:12",
                    "text" => "Helen tried to call her brother Jack for help during the earthquake but didn't get through.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1gso.mp3',
                    "timeRange"     =>"00:05-00:12",
                    "text" => "Helen tried to call her brother Jack for help during the earthquake but didn't get through.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );
        $data['events'][] = array(
            "num"=>"3",
            "content_id"=>150,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"00:12-00:16",
            "scores"=>1,
            "text" => "Why did you hang up on me yesterday?",
            "items" => array(
                "0"=>array("item"=>"yesterday?"),
                "1"=>array("item"=>"did you"),
                "2"=>array("item"=>"Why"),
                "3"=>array("item"=>"on me"),
                "4"=>array("item"=>"hang up"),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1gso.mp3',
                    "timeRange"     =>"00:12-00:16",
                    "text" => "Why did you hang up on me yesterday?",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1gso.mp3',
                    "timeRange"     =>"00:12-00:16",
                    "text" => "Why did you hang up on me yesterday?",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );
        $data['events'][] = array(
            "num"=>"4",
            "content_id"=>151,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"00:16-00:20",
            "scores"=>1,
            "text" => "Andy and Jack have a lot in common.",
            "items" => array(
                "0"=>array("item"=>"Andy and Jack"),
                "1"=>array("item"=>"in common."),
                "2"=>array("item"=>"a lot"),
                "3"=>array("item"=>"have")
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1gso.mp3',
                    "timeRange"     =>"00:16-00:20",
                    "text" => "Andy and Jack have a lot in common.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1gso.mp3',
                    "timeRange"     =>"00:16-00:20",
                    "text" => "Andy and Jack have a lot in common.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );
        $data['events'][] = array(
            "num"=>"5",
            "content_id"=>152,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"00:20-00:24",
            "scores"=>1,
            "text" => "Please keep off the grass.",
            "items" => array(
                "0"=>array("item"=>"the grass."),
                "1"=>array("item"=>"Please"),
                "2"=>array("item"=>"keep off"),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1gso.mp3',
                    "timeRange"     =>"00:20-00:24",
                    "text" => "Please keep off the grass.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1gso.mp3',
                    "timeRange"     =>"00:20-00:24",
                    "text" => "Please keep off the grass.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );
        $data['events'][] = array(
            "num"=>"6",
            "content_id"=>153,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"00:24-00:30",
            "scores"=>1,
            "text" => "Andy decided to live on photography when he was still young.",
            "items" => array(
                "0"=>array("item"=>"Andy decided to"),
                "1"=>array("item"=>"when he was"),
                "2"=>array("item"=>"still young."),
                "3"=>array("item"=>"live on photography")
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1gso.mp3',
                    "timeRange"     =>"00:24-00:30",
                    "text" => "Andy decided to live on photography when he was still young.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1gso.mp3',
                    "timeRange"     =>"00:24-00:30",
                    "text" => "Andy decided to live on photography when he was still young.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"7",
            "content_id"=>154,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"00:30-00:35",
            "scores"=>1,
            "text" => "Jack neither drinks nor smokes.",
            "items" => array(
                "0"=>array("item"=>"nor"),
                "1"=>array("item"=>"smokes."),
                "2"=>array("item"=>"Jack"),
                "3"=>array("item"=>"drinks"),
                "4"=>array("item"=>"neither"),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1gso.mp3',
                    "timeRange"     =>"00:30-00:35",
                    "text" => "Jack neither drinks nor smokes. ",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1gso.mp3',
                    "timeRange"     =>"00:30-00:35",
                    "text" => "Jack neither drinks nor smokes. ",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"8",
            "content_id"=>155,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"00:35-00:40",
            "scores"=>1,
            "text" => "Amy didn't want to marry until she met Jack.",
            "items" => array(
                "0"=>array("item"=>"she met Jack."),
                "1"=>array("item"=>"until"),
                "2"=>array("item"=>"didn't want to"),
                "3"=>array("item"=>"Amy"),
                "4"=>array("item"=>"marry"),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1gso.mp3',
                    "timeRange"     =>"00:35-00:40",
                    "text" => "Amy didn't want to marry until she met Jack.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1gso.mp3',
                    "timeRange"     =>"00:35-00:40",
                    "text" => "Amy didn't want to marry until she met Jack.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"9",
            "content_id"=>156,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"00:40-00:47",
            "scores"=>1,
            "text" => "Amy rushed to the office without having breakfast since she got up late.",
            "items" => array(
                "0"=>array("item"=>"since"),
                "1"=>array("item"=>"without having breakfast"),
                "2"=>array("item"=>"the office"),
                "3"=>array("item"=>"Amy rushed to"),
                "4"=>array("item"=>"she got up late."),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1gso.mp3',
                    "timeRange"     =>"00:40-00:47",
                    "text" => "Amy rushed to the office without having breakfast since she got up late.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1gso.mp3',
                    "timeRange"     =>"00:40-00:47",
                    "text" => "Amy rushed to the office without having breakfast since she got up late.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"10",
            "content_id"=>157,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"00:47-00:51",
            "scores"=>1,
            "text" => "Mary is fond of drawing.",
            "items" => array(
                "0"=>array("item"=>"fond"),
                "1"=>array("item"=>"Mary"),
                "2"=>array("item"=>"drawing."),
                "3"=>array("item"=>"of"),
                "4"=>array("item"=>"is"),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1gso.mp3',
                    "timeRange"     =>"00:47-00:51",
                    "text" => "Mary is fond of drawing.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1gso.mp3',
                    "timeRange"     =>"00:47-00:51",
                    "text" => "Mary is fond of drawing.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"11",
            "content_id"=>158,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"00:51-00:56",
            "scores"=>1,
            "text" => "Jack married Amy when he was 27.",
            "items" => array(
                "0"=>array("item"=>"married"),
                "1"=>array("item"=>"when"),
                "2"=>array("item"=>"Jack"),
                "3"=>array("item"=>"he was 27."),
                "4"=>array("item"=>"Amy"),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1gso.mp3',
                    "timeRange"     =>"00:51-00:56",
                    "text" => "Jack married Amy when he was 27.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1gso.mp3',
                    "timeRange"     =>"00:51-00:56",
                    "text" => "Jack married Amy when he was 27.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"12",
            "content_id"=>159,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"00:56-01:03",
            "scores"=>1,
            "text" => "The software developed by Jack's company is popular with customers.",
            "items" => array(
                "0"=>array("item"=>"The software"),
                "1"=>array("item"=>"is popular with"),
                "2"=>array("item"=>"developed"),
                "3"=>array("item"=>"customers."),
                "4"=>array("item"=>"by Jack's company"),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1gso.mp3',
                    "timeRange"     =>"00:56-01:03",
                    "text" => "The software developed by Jack's company is popular with customers.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1gso.mp3',
                    "timeRange"     =>"00:56-01:03",
                    "text" => "The software developed by Jack's company is popular with customers.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"13",
            "content_id"=>160,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"01:03-01:07",
            "scores"=>1,
            "text" => "Could you remind me of the time of the meeting?",
            "items" => array(
                "0"=>array("item"=>"me"),
                "1"=>array("item"=>"Could you"),
                "2"=>array("item"=>"of the meeting?"),
                "3"=>array("item"=>"remind"),
                "4"=>array("item"=>"of the time"),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1gso.mp3',
                    "timeRange"     =>"01:03-01:07",
                    "text" => "Could you remind me of the time of the meeting?",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1gso.mp3',
                    "timeRange"     =>"01:03-01:07",
                    "text" => "Could you remind me of the time of the meeting?",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"14",
            "content_id"=>161,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"01:07-01:12",
            "scores"=>1,
            "text" => "Jack is caring for his father in the local hospital.",
            "items" => array(
                "0"=>array("item"=>"in the local hospital."),
                "1"=>array("item"=>"is"),
                "2"=>array("item"=>"caring for"),
                "3"=>array("item"=>"his father"),
                "4"=>array("item"=>"Jack"),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1gso.mp3',
                    "timeRange"     =>"01:07-01:12",
                    "text" => "Jack is caring for his father in the local hospital.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1gso.mp3',
                    "timeRange"     =>"01:07-01:12",
                    "text" => "Jack is caring for his father in the local hospital.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"15",
            "content_id"=>162,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"01:12-01:18",
            "scores"=>1,
            "text" => "Alice used to be a shy girl but she has grown out of it now.",
            "items" => array(
                "0"=>array("item"=>"a shy girl"),
                "1"=>array("item"=>"Alice used to be"),
                "2"=>array("item"=>"out of it now."),
                "3"=>array("item"=>"but she has grown"),
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
                    "timeRange"     =>"01:07-01:12",
                    "text" => "Jack is caring for his father in the local hospital. ",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $this->saveEventListToDatabases($data);
        $a =  json_encode($data);
        $fp = fopen('json12.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
       return;
    }

    public function getPart13(){
        $data = array(
            "unit_id"       =>1,
            "lesson_id"     =>4,
            "part_id"       =>13,
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
            "content_id"=>163,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"sr_ordering",
            "timeRange"     =>"00:01-00:05",
            "scores"=>1,
            "text" => "I can't agree with you more.",
            "answer" => "I can't agree with you more",
            "items" => array(
                "0"=>array("item"=>"I"),
                "1"=>array("item"=>"agree with"),
                "2"=>array("item"=>"more."),
                "3"=>array("item"=>"you"),
                "4"=>array("item"=>"can't"),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1gsf.mp3',
                    "timeRange"     =>"00:01-00:05",
                    "text" => "I can't agree with you more.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1gsf.mp3',
                    "timeRange"     =>"00:01-00:05",
                    "text" => "I can't agree with you more.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"2",
            "content_id"=>164,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"sr_ordering",
            "timeRange"     =>"00:05-00:10",
            "scores"=>1,
            "text" => "Ma'am, does the wallet on the ground belong to you?",
            "answer" => "Maam does the wallet on the ground belong to you",
            "items" => array(
                "0"=>array("item"=>"does the wallet"),
                "1"=>array("item"=>"belong to"),
                "2"=>array("item"=>"you?"),
                "3"=>array("item"=>"Ma'am,"),
                "4"=>array("item"=>"on the ground")
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1gsf.mp3',
                    "timeRange"     =>"00:05-00:10",
                    "text" => "Ma'am, does the wallet on the ground belong to you?",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1gsf.mp3',
                    "timeRange"     =>"00:05-00:10",
                    "text" => "Ma'am, does the wallet on the ground belong to you?",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"3",
            "content_id"=>165,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"sr_ordering",
            "timeRange"     =>"00:10-00:16",
            "scores"=>1,
            "text" => "Ellen came across an old friend during the trip in Europe.",
            "answer" => "Ellen came across an old friend during the trip in Europe",
            "items" => array(
                "0"=>array("item"=>"came across"),
                "1"=>array("item"=>"Ellen"),
                "2"=>array("item"=>"during the trip"),
                "3"=>array("item"=>"an old friend"),
                "4"=>array("item"=>"in Europe."),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1gsf.mp3',
                    "timeRange"     =>"00:10-00:16",
                    "text" => "Ellen came across an old friend during the trip in Europe.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1gsf.mp3',
                    "timeRange"     =>"00:10-00:16",
                    "text" => "Ellen came across an old friend during the trip in Europe.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"4",
            "content_id"=>166,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"sr_ordering",
            "timeRange"     =>"00:16-00:21",
            "scores"=>1,
            "text" => "Congratulations on your success!",
            "answer" => "Congratulations on your success",
            "items" => array(
                "0"=>array("item"=>"Congratulations"),
                "1"=>array("item"=>"success!"),
                "2"=>array("item"=>"your"),
                "3"=>array("item"=>"on"),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1gsf.mp3',
                    "timeRange"     =>"00:16-00:21",
                    "text" => "Congratulations on your success!",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1gsf.mp3',
                    "timeRange"     =>"00:16-00:21",
                    "text" => "Congratulations on your success!",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"5",
            "content_id"=>167,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"sr_ordering",
            "timeRange"     =>"00:20-00:25",
            "scores"=>1,
            "text" => "Jack's parents are proud of him.",
            "answer" => "Jack's parents are proud of him",
            "items" => array(
                "0"=>array("item"=>"him."),
                "1"=>array("item"=>"proud of"),
                "2"=>array("item"=>"Jack's parents"),
                "3"=>array("item"=>"are"),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1gsf.mp3',
                    "timeRange"     =>"00:20-00:25",
                    "text" => "Jack's parents are proud of him.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1gsf.mp3',
                    "timeRange"     =>"00:20-00:25",
                    "text" => "Jack's parents are proud of him.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"6",
            "content_id"=>168,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"sr_ordering",
            "timeRange"     =>"00:24-00:29",
            "scores"=>1,
            "text" => "Help yourself to some homemade cookies.",
            "answer" => "Help yourself to some homemade cookies",
            "items" => array(
                "0"=>array("item"=>"homemade cookies."),
                "1"=>array("item"=>"to"),
                "2"=>array("item"=>"Help yourself"),
                "3"=>array("item"=>"some"),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1gsf.mp3',
                    "timeRange"     =>"00:24-00:29",
                    "text" => "Help yourself to some homemade cookies.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1gsf.mp3',
                    "timeRange"     =>"00:24-00:29",
                    "text" => "Help yourself to some homemade cookies.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"7",
            "content_id"=>169,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"sr_ordering",
            "timeRange"     =>"00:29-00:35",
            "scores"=>1,
            "text" => "Whether you can get the job depends on whether your English is good enough.",
            "answer" => "Whether you can get the job depends on whether your English is good enough",
            "items" => array(
                "0"=>array("item"=>"Whether you can"),
                "1"=>array("item"=>"depends on whether"),
                "2"=>array("item"=>"get the job"),
                "3"=>array("item"=>"your English is"),
                "4"=>array("item"=>"good enough."),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1gsf.mp3',
                    "timeRange"     =>"00:29-00:35",
                    "text" => "Whether you can get the job depends on whether your English is good enough.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1gsf.mp3',
                    "timeRange"     =>"00:29-00:35",
                    "text" => "Whether you can get the job depends on whether your English is good enough.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"8",
            "content_id"=>170,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"sr_ordering",
            "timeRange"     =>"00:35-00:41",
            "scores"=>1,
            "text" => "Alice gets along very well with all her cousins.",
            "answer" => "Alice gets along very well with all her cousins",
            "items" => array(
                "0"=>array("item"=>"Alice"),
                "1"=>array("item"=>"very well"),
                "2"=>array("item"=>"with"),
                "3"=>array("item"=>"all her cousins."),
                "4"=>array("item"=>" gets along"),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1gsf.mp3',
                    "timeRange"     =>"00:35-00:41",
                    "text" => "Alice gets along very well with all her cousins.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1gsf.mp3',
                    "timeRange"     =>"00:35-00:41",
                    "text" => "Alice gets along very well with all her cousins.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"9",
            "content_id"=>171,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"sr_ordering",
            "timeRange"     =>"00:41-00:45",
            "scores"=>1,
            "text" => "I'm looking forward to meeting you.",
            "answer" => "I'm looking forward to meeting you",
            "items" => array(
                "0"=>array("item"=>"I'm"),
                "1"=>array("item"=>"you."),
                "2"=>array("item"=>"meeting"),
                "3"=>array("item"=>"looking forward to"),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1gsf.mp3',
                    "timeRange"     =>"00:41-00:45",
                    "text" => "I'm looking forward to meeting you.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1gsf.mp3',
                    "timeRange"     =>"00:41-00:45",
                    "text" => "I'm looking forward to meeting you.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"10",
            "content_id"=>172,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"sr_ordering",
            "timeRange"     =>"00:45-00:51",
            "scores"=>1,
            "text" => "We were in great need of food and water after the earthquake. ",
            "answer" => "We were in great need of food and water after the earthquake",
            "items" => array(
                "0"=>array("item"=>"We were"),
                "1"=>array("item"=>"food and water"),
                "2"=>array("item"=>"after the earthquake."),
                "3"=>array("item"=>" in great need of"),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1gsf.mp3',
                    "timeRange"     =>"00:45-00:51",
                    "text" => "We were in great need of food and water after the earthquake. ",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1gsf.mp3',
                    "timeRange"     =>"00:45-00:51",
                    "text" => "We were in great need of food and water after the earthquake. ",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $this->saveEventListToDatabases($data);

        $a =  json_encode($data);
        $fp = fopen('json13.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
       return;
    }


    public function getPart114(){
        $data = array(
            "unit_id"       =>1,
            "lesson_id"     =>5,
            "part_id"       =>14,
            "media_filename"=>'',
            "content_totalcount"  => 10,
            "content_perpage"     => 8,
            "content_perPageCount"=>1,
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
            "content_id"=>173,
            "type"=>"MTmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u1p.mp3',
            "timeRange"=>"00:53-01:22",
            "content"=>"Jack graduated at the age of 22 from a university in England. His major was computer science. He first worked for a small computer company. Now he has his own IT company in the U.S.A. Jack has a family of four. Jack got married to Amy at the age of 27.",
            "text"=>array("type"=>"text","text"=>"Which is true?"),
            "scores"=>4,
            "items"=>array(
                "0"=>array("item"=>"Jack is 22 years old now","isCorrect"=>false),
                "1"=>array("item"=>"Jack is single", "isCorrect"=>false),
                "2"=>array("item"=>"Jack works in the U.S.A.", "isCorrect"=>true),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_listen_001.png"
        );

        $data['events'][] = array(
            "num"=>"2",
            "content_id"=>174,
            "type"=>"MTmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u1p.mp3',
            "timeRange"=>"01:31-01:48",
            "content"=>"Alice is their daughter and she is thirteen years old. She goes to middle school. She is in eighth grade.",
            "text"=>array("type"=>"text","text"=>"When will Jack's daughter go to high school?"),
            "scores"=>4,
            "items"=>array(
                "0"=>array("item"=>"Very soon","isCorrect"=>true),
                "1"=>array("item"=>"She just graduated from high school", "isCorrect"=>false),
                "2"=>array("item"=>"She is now in primary school", "isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_listen_001.png"
        );

        $data['events'][] = array(
            "num"=>"3",
            "content_id"=>175,
            "type"=>"MTmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u1p.mp3',
            "timeRange"=>"02:08-02:31",
            "content"=>"Jack has a younger sister, Helen. She works for a bank. Her husband, William, works at customs. Helen and William also have two children: Mary and Harry. Mary is five years old and Harry is 3 years old.",
            "text"=>array("type"=>"text", "text"=>"What's the relationship between Jack and Helen's children?"),
            "scores"=>4,
            "items"=>array(
                "0"=>array("item"=>"Jack is their uncle","isCorrect"=>true),
                "1"=>array("item"=>"They are Jack's children", "isCorrect"=>false),
                "2"=>array("item"=>"Jack is their teacher", "isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_listen_001.png"
        );

        $data['events'][] = array(
            "num"=>"4",
            "content_id"=>176,
            "type"=>"MTmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u1p.mp3',
            "timeRange"=>"02:38-03:06",
            "content"=>"Jack also has a younger brother, Andy. He is a photographer. He is single. He has just graduated from the New York Art School.He likes nature and travels a lot. He now works for a small magazine in South Africa, but he is thinking about changing his job.",
            "text"=>array("type"=>"text", "text"=>"What does Andy like doing?"),
            "scores"=>4,
            "items"=>array(
                "0"=>array("item"=>"He likes computer science","isCorrect"=>false),
                "1"=>array("item"=>"He likes traveling and taking pictures", "isCorrect"=>true),
                "2"=>array("item"=>"He likes writing books", "isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_listen_001.png"
        );

        $data['events'][] = array(
            "num"=>"5",
            "content_id"=>177,
            "type"=>"MTmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u1p.mp3',
            "timeRange"=>"03:06-03:21",
            "content"=>"Jack's grandparents immigrated into the United States from England. Jack's father Richard, is a retired doctor. Jack's mother Ellen, is a retired nurse.",
            "text"=>array("type"=>"text","text"=>"Where might Jack's parents work?"),
            "scores"=>4,
            "items"=>array(
                "0"=>array("item"=>"They worked in factory","isCorrect"=>false),
                "1"=>array("item"=>"Both of them worked in hospital", "isCorrect"=>true),
                "2"=>array("item"=>"They worked at school", "isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_listen_001.png"
        );

        $data['events'][] = array(
            "num"=>"6",
            "content_id"=>178,
            "type"=>"MTmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u1d.mp3',
            "timeRange"=>"00:10-00:23",
            "content"=>"Staff: Hello, ma'am. How may I help you? Ellen: Yes. I want to apply for a credit card that can be used abroad.",
            "text"=>array("type"=>"text", "text"=>"Why does Ellen want to apply for a credit card?"),
            "scores"=>4,
            "items"=>array(
                "0"=>array("item"=>"Because she is nervous","isCorrect"=>false),
                "1"=>array("item"=>"Because it's convenient for shopping", "isCorrect"=>false),
                "2"=>array("item"=>"Because she wants to travel abroad.", "isCorrect"=>true),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_listen_001.png"
        );

        $data['events'][] = array(
            "num"=>"7",
            "content_id"=>179,
            "type"=>"MTmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u1d.mp3',
            "timeRange"=>"00:23-00:41",
            "content"=>"Staff: Ok. You need to fill out this application form first, please.Ellen: Well, I always feel nervous when I have to fill out forms. Could you please do it for me?Staff: Sure, my pleasure. May I have your name, please?",
            "text"=>array("type"=>"text","text"=>"Why does Ellen say she feels nervous when she has to fill out forms?"),
            "scores"=>4,
            "items"=>array(
                "0"=>array("item"=>"She has difficulty in reading and writing.","isCorrect"=>true),
                "1"=>array("item"=>"She is just too lazy to do it by herself.", "isCorrect"=>false),
                "2"=>array("item"=>"She's too old to see anything", "isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_listen_001.png"
        );

        $data['events'][] = array(
            "num"=>"8",
            "content_id"=>180,
            "type"=>"MTmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u1d.mp3',
            "timeRange"=>"00:41-01:04",
            "content"=>"Staff: May I have your name, please?Ellen: It's Ellen Richard.Staff: Ok, Ellen Richard. May I have your ID number, please?Ellen: 77019850326.",
            "text"=>array("type"=>"text", "text"=>"Her ID number could be:"),
            "scores"=>4,
            "items"=>array(
                "0"=>array("item"=>"Her Student ID number","isCorrect"=>false),
                "1"=>array("item"=>"Her Driving License number", "isCorrect"=>true),
                "2"=>array("item"=>"Her Social Security Number", "isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_listen_001.png"
        );
        $data['events'][] = array(
            "num"=>"9",
            "content_id"=>181,
            "type"=>"MTmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u1d.mp3',
            "timeRange"=>"02:25-03:43",
            "content"=>"Staff: Ellens@gmail.com. Ok, Mrs. Richard, let me double-check everything with you before you go to the teller. Name: Ellen Richard. ID number: 77019850326. Social Security number: 123-45-6789. Home phone number: 320 66071287. Mobile phone number: 216 222 5566. Home address: 2990Third Ave Cleveland, CA. Zip Code is 44114. And your email address is Ellens@gmail.com. Is that all correct, Mrs. Richard?Ellen: Yes, that's right! Thank you so much!",
            "text"  => array("type"=>"text","text"=>"What kind of person is the staff?"),
            "scores"=>4,
            "items"=>array(
                "0"=>array("item"=>"He is very patient","isCorrect"=>true),
                "1"=>array("item"=>"He doesn't work hard", "isCorrect"=>false),
                "2"=>array("item"=>"He is inexperienced.", "isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_listen_001.png"
        );

        $data['events'][] = array(
            "num"=>"10",
            "content_id"=>182,
            "type"=>"MTmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u1d.mp3',
            "timeRange"=>"03:43-04:05",
            "content"=>"Staff: Alright, we also need your signature. Please sign your name here. Mrs. Richard. OK, now that the form is done, you can take it to the bank teller at Window number 2.Ellen: Thanks so much for your help.Staff: My pleasure, ma'am.",
            "text"=>array("type"=>"text","text"=>"What position do you think the staff in the dialog is?"),
            "scores"=>4,
            "items"=>array(
                "0"=>array("item"=>"The bank teller ","isCorrect"=>false),
                "1"=>array("item"=>"The bank lobby manager", "isCorrect"=>true),
                "2"=>array("item"=>"The security guard", "isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_listen_001.png"
        );
        $this->saveEventListToDatabases($data);
        $a =  json_encode($data);
        $fp = fopen('json14.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
       return;
    }

    public function getPart115(){
        $data = array(
            "unit_id"       =>1,
            "lesson_id"     =>5,
            "part_id"       =>15,
            "media_filename"=>'',
            "content_totalcount"  => 10,
            "content_perpage"     => 8,
            "content_perPageCount"=>1,
            "media_type"    =>'audio',
            "totalTime"     =>"4:54",
            "part_type"     =>"questions",
            "have_questions"=>true,
            "questions_type"=>"text",
            "keywords"      =>array(
            ),
        );

        $data['events'][] = array(
            "num"=>"1",
            "content_id"=>183,
            "type"=>"MTmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u1p.mp3',
            "timeRange"=>"00:32-00:53",
            "content"=>"Jack Smith is an American businessman.He was born on March 1st, 1975 in Los Angeles, USA. He now lives in Los Angeles.His address is No. 83 Atlantic Avenue. ",
            "text"=>array("type"=>"audio","text"=>"When was he born?","media_filename"=>'media/u1pcq.mp3',"timeRange"=>"00:08-00:12"),
            "scores"=>4,
            "items"=>array(
                "0"=>array("item"=>"He was born in 1983","isCorrect"=>false),
                "1"=>array("item"=>"He lives in Los Angeles", "isCorrect"=>false),
                "2"=>array("item"=>"Jack was born in 1975", "isCorrect"=>true),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_listen_001.png"
        );

        $data['events'][] = array(
            "num"=>"2",
            "content_id"=>184,
            "type"=>"MTmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u1p.mp3',
            "timeRange"=>"01:13-01:30",
            "content"=>"Jack has a family of four. Jack got married to Amy at the age of 27. Amy is an IT engineer. She works for a high-tech company.",
            "text"=>array("type"=>"audio","text"=>"What does Amy do?","media_filename"=>'media/u1pcq.mp3',"timeRange"=>"00:28-00:31"),
            "scores"=>4,
            "items"=>array(
                "0"=>array("item"=>"Amy works as a doctor","isCorrect"=>false),
                "1"=>array("item"=>"works as an IT engineer", "isCorrect"=>true),
                "2"=>array("item"=>"is a housewife.", "isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_listen_001.png"
        );

        $data['events'][] = array(
            "num"=>"3",
            "content_id"=>185,
            "type"=>"MTmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u1p.mp3',
            "timeRange"=>"02:08-02:19",
            "content"=>"Jack has a younger sister, HelenmultipleChoices.She works for a bank.Her husband, William, works at customs. ",
            "text"=>array("type"=>"audio","text"=>"Where does Helen work?","media_filename"=>'media/u1pcq.mp3',"timeRange"=>"00:48-00:51"),
            "scores"=>4,
            "items"=>array(
                "0"=>array("item"=>"She works at a hospital","isCorrect"=>false),
                "1"=>array("item"=>"She works at a supermarket", "isCorrect"=>false),
                "2"=>array("item"=>"She works for a bank.", "isCorrect"=>true),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_listen_001.png"
        );

        $data['events'][] = array(
            "num"=>"4",
            "content_id"=>186,
            "type"=>"MTmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u1p.mp3',
            "timeRange"=>"02:08-02:19",
            "content"=>"Jack has a younger sister, Helen.She works for a bank.Her husband, William, works at customs. ",
            "text"=>array("type"=>"audio","text"=>"Where does William work?","media_filename"=>'media/u1mt.mp3',"timeRange"=>"00:00-00:04"),
            "scores"=>4,
            "items"=>array(
                "0"=>array("item"=>"At police station","isCorrect"=>false),
                "1"=>array("item"=>"At customs", "isCorrect"=>true),
                "2"=>array("item"=>"In government", "isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_listen_001.png"
        );

        $data['events'][] = array(
            "num"=>"5",
            "content_id"=>187,
            "type"=>"MTmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u1p.mp3',
            "timeRange"=>"01:31-02:07",
            "content"=>"Jack and Amy have two children, Alice and John.Alice is their daughter and she is thirteen years old.She goes to middle school. She is in eighth grade. John, their son, is nine years old. He goes to primary school. They both go to school by school bus. ",
            "text"=>array("type"=>"audio","text"=>"How do Jack's children go to school? ","media_filename"=>'media/u1mt.mp3',"timeRange"=>"00:04-00:08"),
            "scores"=>4,
            "items"=>array(
                "0"=>array("item"=>"By foot","isCorrect"=>false),
                "1"=>array("item"=>"By car", "isCorrect"=>false),
                "2"=>array("item"=>"By school bus ", "isCorrect"=>true),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_listen_001.png"
        );

//        $data['events'][] = array(
//            "num"=>"6",
//            "content_id"=>188,
//            "type"=>"MTmultipleChoice",
//            "media_type"=>"audio",
//            "media_filename"=>'media/u1p.mp3',
//            "timeRange"=>"03:06-03:21",
//            "content"=>"Jack's grandparents immigrated into the United States from England.Jack's father Richard, is a retired doctor. Jack's mother Ellen, is a retired nurse.",
//            "text"=>array("type"=>"audio","text"=>"Were Jack's grandparents born in the United States?","media_filename"=>'media/u1mt.mp3',"timeRange"=>"00:09-00:14"),
//            "scores"=>4,
//            "items"=>array(
//                "0"=>array("item"=>"Yes","isCorrect"=>false),
//                "1"=>array("item"=>"No", "isCorrect"=>true),
//                "2"=>array("item"=>"It doesn't mention. ", "isCorrect"=>false),
//            ),
//            "selectEvents"=>array(
//            ),
//            "picture"=>"images/type_listen_001.png"
//        );

        $data['events'][] = array(
            "num"=>"7",
            "content_id"=>189,
            "type"=>"MTmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u1d.mp3',
            "timeRange"=>"00:10-00:38",
            "content"=>"Hello, ma'am. How may I help you?Yes. I want to apply for a credit card that can be used abroad.Ok. You need to fill out this application form first, please. Well, I always feel nervous when I have to fill out forms. Could you please do it for me?",
            "text"=>array("type"=>"audio","text"=>"What does Ellen want to apply for?","media_filename"=>'media/u1dcq.mp3',"timeRange"=>"00:00-00:04"),
            "scores"=>4,
            "items"=>array(
                "0"=>array("item"=>"Ellen wants to apply for a passport","isCorrect"=>false),
                "1"=>array("item"=>"Ellen wants to apply for a credit card", "isCorrect"=>true),
                "2"=>array("item"=>"Ellen wants to help the man", "isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_listen_001.png"
        );

        $data['events'][] = array(
            "num"=>"8",
            "content_id"=>190,
            "type"=>"MTmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u1d.mp3',
            "timeRange"=>"00:10-00:38",
            "content"=>"Hello, ma'am. How may I help you?Yes. I want to apply for a credit card that can be used abroad.Ok. You need to fill out this application form first, please. Well, I always feel nervous when I have to fill out forms. Could you please do it for me?",
            "text"=>array("type"=>"audio","text"=>"Why does Ellen want to apply for a credit card?","media_filename"=>'media/u1dcq.mp3',"timeRange"=>"00:04-00:09"),
            "scores"=>4,
            "items"=>array(
                "0"=>array("item"=>"Because she is nervous","isCorrect"=>false),
                "1"=>array("item"=>"Because she wants to go shopping", "isCorrect"=>false),
                "2"=>array("item"=>"Because she wants to travel abroad.", "isCorrect"=>true),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_listen_001.png"
        );

        $data['events'][] = array(
            "num"=>"9",
            "content_id"=>191,
            "type"=>"MTmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u1d.mp3',
            "timeRange"=>"02:08-02:25",
            "content"=>"Could you please tell me your email address so that we can mail you your monthly bill?Of course. It's Ellens@gmail.com.The first E is a capital letter.",
            "text"=>array("type"=>"audio","text"=>"Why does the bank need her email address?","media_filename"=>'media/u1dcq.mp3',"timeRange"=>"00:34-00:39"),
            "scores"=>4,
            "items"=>array(
                "0"=>array("item"=>"to send her monthly bill.","isCorrect"=>true),
                "1"=>array("item"=>"to greet her every month", "isCorrect"=>false),
                "2"=>array("item"=>"to promote business.", "isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_listen_001.png"
        );

        $data['events'][] = array(
            "num"=>"10",
            "content_id"=>192,
            "type"=>"MTmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u1d.mp3',
            "timeRange"=>"03:43-04:05",
            "content"=>"Alright, we also need your signature. Please sign your name here, Mrs. Richard. OK, now that the form is done, you can take it to the bank teller at Window number 2.Thanks so much for your help.My pleasure, ma'am.",
            "text"=>array("type"=>"audio","text"=>"After filling out the form, what does Ellen need to do next?","media_filename"=>'media/u1dcq.mp3',"timeRange"=>"00:49-00:55"),
            "scores"=>4,
            "items"=>array(
                "0"=>array("item"=>"Take the form and go home","isCorrect"=>false),
                "1"=>array("item"=>"Take the form to the bank teller", "isCorrect"=>true),
                "2"=>array("item"=>"Take the form to her husband", "isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_listen_001.png"
        );


        $a =  json_encode($data);
        $fp = fopen('json15.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
       return;
    }

    public function getPart116(){
        $data = array(
            "unit_id"       =>1,
            "lesson_id"     =>5,
            "part_id"       =>16,
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
            "content_id"=>193,
            "type"=>"SRmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u1p.mp3',
            "timeRange"=>"00:53-01:13",
            "content"=>"Jack graduated at the age of 22 from a university in England. His major was computer science. He first worked for a small computer company. Now he has his own IT company in the U.S.A.",
            "text"=>array("type"=>"audio","text"=>"How old was Jack when he graduated from a university?","media_filename"=>'media/u1pcq.mp3',"timeRange"=>"00:12-00:17"),
            "scores"=>4,
            "items"=>array(
                "0"=>array("item"=>"18","answer"=>"eighteen","isCorrect"=>false),
                "1"=>array("item"=>"22","answer"=>"twenty two", "isCorrect"=>true),
                "2"=>array("item"=>"computer science","answer"=>"computer science", "isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"2",
            "content_id"=>194,
            "type"=>"SRmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u1p.mp3',
            "timeRange"=>"00:53-01:13",
            "content"=>"Jack graduated at the age of 22 from a university in England. His major was computer science. He first worked for a small computer company. Now he has his own IT company in the U.S.A.",
            "text"=>array("type"=>"audio","text"=>"What was his major in the university?","media_filename"=>'media/u1pcq.mp3',"timeRange"=>"00:17-00:21"),
            "scores"=>4,
            "items"=>array(
                "0"=>array("item"=>"computer science","answer"=>"computer science","isCorrect"=>true),
                "1"=>array("item"=>"business", "answer"=>"business","isCorrect"=>false),
                "2"=>array("item"=>"company management", "answer"=>"company management","isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"3",
            "content_id"=>195,
            "type"=>"SRmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u1p.mp3',
            "timeRange"=>"02:20-02:37",
            "content"=>"Helen and William also have two children: Mary and Harry. Mary is five years old and Harry is 3 years old. Every morning at 7:30, Helen drives her two children to kindergarten",
            "text"=>array("type"=>"audio","text"=>"Where do Helen's children go?","media_filename"=>'media/u1pcq.mp3',"timeRange"=>"01:04-01:08"),
            "scores"=>4,
            "items"=>array(
                "0"=>array("item"=>"primary school","answer"=>"primary school","isCorrect"=>true),
                "1"=>array("item"=>"middle school","answer"=>"middle school", "isCorrect"=>false),
                "2"=>array("item"=>"kindergarten", "answer"=>"kindergarten","isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"4",
            "content_id"=>196,
            "type"=>"SRmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u1p.mp3',
            "timeRange"=>"02:38-03:06",
            "content"=>"Jack also has a younger brother, Andy. He is a photographer. He is single. He has just graduated from the New York Art School. He likes nature and travels a lot. He now works for a small magazine in South Africa, but he is thinking about changing his job.",
            "text"=>array("type"=>"audio","text"=>"What is Andy's job?","media_filename"=>'media/u1pcq.mp3',"timeRange"=>"01:12-01:15"),
            "scores"=>4,
            "items"=>array(
                "0"=>array("item"=>"a singer","answer"=>"a singer","isCorrect"=>false),
                "1"=>array("item"=>"a photographer","answer"=>"a photographer", "isCorrect"=>true),
                "2"=>array("item"=>"a taxi driver", "answer"=>"a taxi driver","isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"5",
            "content_id"=>197,
            "type"=>"SRmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u1d.mp3',
            "timeRange"=>"01:43-01:57",
            "content"=>"Staff: And what is your home address?Ellen: 2990 Third Ave Cleveland, CA. CA is for California.",
            "text"=>array("type"=>"audio","text"=>"Where does Ellen live?","media_filename"=>'media/u1dcq.mp3',"timeRange"=>"00:30-00:34"),
            "scores"=>4,
            "items"=>array(
                "0"=>array("item"=>"Paris","answer"=>"Paris","isCorrect"=>false),
                "1"=>array("item"=>"California","answer"=>"California", "isCorrect"=>true),
                "2"=>array("item"=>"England","answer"=>"England", "isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"6",
            "content_id"=>198,
            "type"=>"SRmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u1d.mp3',
            "timeRange"=>"01:29-01:43",
            "content"=>"Staff: Great. And do you have a mobile phone, Mrs. Richard? Ellen: Yes, of course. It's 216 222 5566?",
            "text"=>array("type"=>"audio","text"=>"What is Ellen's mobile phone number?","media_filename"=>'media/u1mt.mp3',"timeRange"=>"00:08-00:12"),
            "scores"=>4,
            "items"=>array(
                "0"=>array("item"=>"216 222 5566","answer"=>"two one six two two two five five six six","isCorrect"=>true),
                "1"=>array("item"=>"567 897 1234","answer"=>"five six seven eight nine seven one two three four", "isCorrect"=>false),
                "2"=>array("item"=>"895 214 7630","answer"=>"eight nine five two one four seven six three zero", "isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $a =  json_encode($data);
        $fp = fopen('json16.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
       return;
    }

    public function getPart117(){
        $data = array(
            "unit_id"       =>1,
            "lesson_id"     =>5,
            "part_id"       =>17,
            "media_filename"=>'',
            "content_totalcount"  =>6,
            "content_perpage"     => 4,
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
            "content_id"=>199,
            "media_filename"=>'media/u1gfi.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"01:16-01:20",
            "scores"=>4,
            "text" => "I'll drop in on you on my way home.",
            "answer" => "I'll drop in on you on my way home",
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"2",
            "content_id"=>200,
            "media_filename"=>'media/u1gfi.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"01:58-02:03",
            "scores"=>4,
            "text" => "William runs along the river every morning.",
            "answer" => "William runs along the river every morning",
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"3",
            "content_id"=>201,
            "media_filename"=>'media/u1gso.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"00:01-00:05",
            "scores"=>4,
            "text" => "Let's get down to business.",
            "answer" => "Let's get down to business",
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"4",
            "content_id"=>202,
            "media_filename"=>'media/u1gso.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"00:20-00:24",
            "scores"=>4,
            "text" => "Please keep off the grass.",
            "answer" => "Please keep off the grass",
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"5",
            "content_id"=>203,
            "media_filename"=>'media/u1gsf.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"00:01-00:05",
            "scores"=>4,
            "text" => "I can't agree with you more.",
            "answer" => "I can't agree with you more",
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"6",
            "content_id"=>204,
            "media_filename"=>'media/u1gsf.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"00:16-00:21",
            "scores"=>4,
            "text" => "Congratulations on your success!",
            "answer" => "Congratulations on your success",
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $a =  json_encode($data);
        $fp = fopen('json17.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
       return;
    }


    //最新MT
   public function getPart14(){
          $data = array(
            "unit_id"       =>1,
            "lesson_id"     =>5,
            "part_id"       =>14,
            "media_filename"=>'',
            "content_totalcount"  => 6,
            "content_perpage"     => 3,
            "content_perPageCount"=>1,
            "media_type"    =>'audio',
            "totalTime"     =>"4:54",
            "have_questions"=>true,
            "questions_type"=>"text",
            "part_type"     =>"questions",
            "selectItems"   =>array(
                1=>array(1,2,5),
                2=>array(6,1,3),
                3=>array(4,1,6)
            ),
            "keywords"   =>array(
            ),
        );

       $data['events'][] = array(
           "num"=>"1",
           "type"=>"MTmultipleChoices",
           "media_type"=>"audio",
           "media_filename"=>'media/u1_mt_r_c_q1.mp3',
           "timeRange"=>"00:00-00:17",
           "content"=>"Jack graduated at the age of 22 from a university in England. His major was computer science. He first worked for a small computer company. Now he has his own IT company in the U.S.A.",
           "text"=>"Jack graduated at the age of 22 from a university in England. His major was computer science. He first worked for a small computer company. Now he has his own IT company in the U.S.A.",
           "multipleChoicesList"=>array(
               0=>array(
                   "num"=>"1",
                   "content_id"=>173,
                   "type"=>"multipleChoice",
                   "text"=>array("type"=>"text","text"=>"How old was Jack when he graduated from a university?"),
                   "scores"=>5,
                   "items"=>array(
                       "0"=>array("item"=>"18","isCorrect"=>false),
                       "1"=>array("item"=>"22", "isCorrect"=>true),
                       "2"=>array("item"=>"computer science", "isCorrect"=>false),
                   ),
                   "selectEvents"=>array(
                   ),
               ),
               1=>array(
                   "num"=>"1",
                   "content_id"=>174,
                   "type"=>"multipleChoice",
                   "text"=>array("type"=>"text","text"=>"What was his major in the university?"),
                   "scores"=>5,
                   "items"=>array(
                       "0"=>array("item"=>"Computer science.","isCorrect"=>true),
                       "1"=>array("item"=>"Business.", "isCorrect"=>false),
                       "2"=>array("item"=>"Company management.", "isCorrect"=>false),
                   ),
                   "selectEvents"=>array(
                   ),
               ),
               2=>array(
                   "num"=>"1",
                   "content_id"=>175,
                   "type"=>"multipleChoice",
                   "text"=>array("type"=>"text","text"=>"Which is true?"),
                   "scores"=>5,
                   "items"=>array(
                       "0"=>array("item"=>"Jack is 22 years old now.","isCorrect"=>false),
                       "1"=>array("item"=>"Jack is single.", "isCorrect"=>false),
                       "2"=>array("item"=>"Jack works in the U.S.A.", "isCorrect"=>true),
                   ),
                   "selectEvents"=>array(
                   ),
               ),
           ),
           "picture"=>"images/type_listen_001.png"
       );

       $data['events'][] = array(
           "num"=>"2",
           "type"=>"MTmultipleChoices",
           "media_type"=>"audio",
           "media_filename"=>'media/u1_mt_r_c_q2.mp3',
           "timeRange"=>"00:00-00:10",
           "content"=>"Jack has a younger sister, Helen.She works for a bank. Her husband, William, works at customs.",
           "text"=>"Jack has a younger sister, Helen.She works for a bank. Her husband, William, works at customs.",
           "multipleChoicesList"=>array(
               0=>array(
                   "num"=>"1",
                   "content_id"=>176,
                   "type"=>"multipleChoice",
                   "text"=>array("type"=>"text","text"=>"Where does Helen work?"),
                   "scores"=>5,
                   "items"=>array(
                       "0"=>array("item"=>"She works at a hospital.","isCorrect"=>false),
                       "1"=>array("item"=>"She works at a supermarket.", "isCorrect"=>false),
                       "2"=>array("item"=>"She works for a bank.", "isCorrect"=>true),
                   ),
                   "selectEvents"=>array(
                   ),
               ),
               1=>array(
                   "num"=>"1",
                   "content_id"=>177,
                   "type"=>"multipleChoice",
                   "text"=>array("type"=>"text","text"=>"Where does William work?"),
                   "scores"=>5,
                   "items"=>array(
                       "0"=>array("item"=>"At police station.","isCorrect"=>false),
                       "1"=>array("item"=>"At customs.", "isCorrect"=>true),
                       "2"=>array("item"=>"In government.", "isCorrect"=>false),
                   ),
                   "selectEvents"=>array(
                   ),
               ),
           ),
           "picture"=>"images/type_listen_001.png"
       );

       $data['events'][] = array(
           "num"=>"3",
           "type"=>"MTmultipleChoices",
           "media_type"=>"audio",
           "media_filename"=>'media/u1_mt_r_c_q3.mp3',
           "timeRange"=>"00:00-00:10",
           "content"=>"Jack also has a younger brother, Andy. He is a photographer. He likes nature and travels a lot.",
           "text"=>"Jack also has a younger brother, Andy. He is a photographer. He likes nature and travels a lot.",
           "multipleChoicesList"=>array(
               0=>array(
                   "num"=>"1",
                   "content_id"=>178,
                   "type"=>"multipleChoice",
                   "text"=>array("type"=>"text","text"=>"What is Andy's job?"),
                   "scores"=>5,
                   "items"=>array(
                       "0"=>array("item"=>"A singer.","isCorrect"=>false),
                       "1"=>array("item"=>"A photographer.", "isCorrect"=>true),
                       "2"=>array("item"=>" A taxi driver.", "isCorrect"=>false),
                   ),
                   "selectEvents"=>array(
                   ),
               ),
               1=>array(
                   "num"=>"1",
                   "content_id"=>179,
                   "type"=>"multipleChoice",
                   "text"=>array("type"=>"text","text"=>"What does Andy like doing?"),
                   "scores"=>5,
                   "items"=>array(
                       "0"=>array("item"=>"He likes computer science.","isCorrect"=>false),
                       "1"=>array("item"=>"He likes traveling and taking pictures.", "isCorrect"=>true),
                       "2"=>array("item"=>"He likes writing books.", "isCorrect"=>false),
                   ),
                   "selectEvents"=>array(
                   ),
               ),
           ),
           "picture"=>"images/type_listen_001.png"
       );

       $data['events'][] = array(
           "num"=>"4",
           "type"=>"MTmultipleChoices",
           "media_type"=>"audio",
           "media_filename"=>'media/u1_mt_r_c_q4.mp3',
           "timeRange"=>"00:00-00:14",
           "content"=>"Jack's grandparents immigrated into the United States from England. Jack's father Richard, is a retired doctor. Jack's mother Ellen, is a retired nurse.",
           "text"=>"Jack's grandparents immigrated into the United States from England. Jack's father Richard, is a retired doctor. Jack's mother Ellen, is a retired nurse.",
           "multipleChoicesList"=>array(
               0=>array(
                   "num"=>"1",
                   "content_id"=>180,
                   "type"=>"multipleChoice",
                   "text"=>array("type"=>"text","text"=>"Where might Jack's parents work?"),
                   "scores"=>5,
                   "items"=>array(
                       "0"=>array("item"=>"They worked in factory.","isCorrect"=>false),
                       "1"=>array("item"=>"Both of them worked in hospital.", "isCorrect"=>true),
                       "2"=>array("item"=>"They worked at school.", "isCorrect"=>false),
                   ),
                   "selectEvents"=>array(
                   ),
               ),
               1=>array(
                   "num"=>"1",
                   "content_id"=>181,
                   "type"=>"multipleChoice",
                   "text"=>array("type"=>"text","text"=>"Were Jack's grandparents born in the United States?"),
                   "scores"=>5,
                   "items"=>array(
                       "0"=>array("item"=>"Yes.","isCorrect"=>false),
                       "1"=>array("item"=>"No.", "isCorrect"=>true),
                       "2"=>array("item"=>"It doesn't mention.", "isCorrect"=>false),
                   ),
                   "selectEvents"=>array(
                   ),
               ),
           ),
           "picture"=>"images/type_listen_001.png"
       );

       $data['events'][] = array(
           "num"=>"5",
           "type"=>"MTmultipleChoices",
           "media_type"=>"audio",
           "media_filename"=>'media/u1_mt_r_c_q5.mp3',
           "timeRange"=>"00:00-00:11",
           "content"=>"Staff: Hello, ma'am.How may I help you? Ellen: Yes. I want to apply for a credit card that can be used abroad.",
           "text"=>"Staff: Hello, ma'am.How may I help you? Ellen: Yes. I want to apply for a credit card that can be used abroad.",
           "multipleChoicesList"=>array(
               0=>array(
                   "num"=>"1",
                   "content_id"=>182,
                   "type"=>"multipleChoice",
                   "text"=>array("type"=>"text","text"=>"What does Ellen want to apply for?"),
                   "scores"=>5,
                   "items"=>array(
                       "0"=>array("item"=>"Ellen wants to apply for a passport.","isCorrect"=>false),
                       "1"=>array("item"=>"Ellen wants to apply for a credit card.", "isCorrect"=>true),
                       "2"=>array("item"=>" Ellen wants to help the man.", "isCorrect"=>false),
                   ),
                   "selectEvents"=>array(
                   ),
               ),
               1=>array(
                   "num"=>"1",
                   "content_id"=>183,
                   "type"=>"multipleChoice",
                   "text"=>array("type"=>"text","text"=>"Why does Ellen want to apply for a credit card?"),
                   "scores"=>5,
                   "items"=>array(
                       "0"=>array("item"=>"Because she is nervous.","isCorrect"=>false),
                       "1"=>array("item"=>"Because it's convenient for shopping.", "isCorrect"=>false),
                       "2"=>array("item"=>"Because she wants to travel abroad.", "isCorrect"=>true),
                   ),
                   "selectEvents"=>array(
                   ),
               ),
           ),
           "picture"=>"images/type_listen_001.png"
       );

       $data['events'][] = array(
           "num"=>"6",
           "type"=>"MTmultipleChoices",
           "media_type"=>"audio",
           "media_filename"=>'media/u1_mt_r_c_q6.mp3',
           "timeRange"=>"00:00-00:13",
           "content"=>"Staff: OK, now that the form is done, you can take it to the bank teller at Window number 2.Ellen: Thanks so much for your help.Staff: My pleasure, ma'am.",
           "text"=>"Staff: OK, now that the form is done, you can take it to the bank teller at Window number 2.Ellen: Thanks so much for your help.Staff: My pleasure, ma'am.",
           "multipleChoicesList"=>array(
               0=>array(
                   "num"=>"1",
                   "content_id"=>184,
                   "type"=>"multipleChoice",
                   "text"=>array("type"=>"text","text"=>"After filling out the form, what does Ellen need to do next?"),
                   "scores"=>5,
                   "items"=>array(
                       "0"=>array("item"=>"Take the form and go home.","isCorrect"=>false),
                       "1"=>array("item"=>"Take the form to the bank teller.", "isCorrect"=>true),
                       "2"=>array("item"=>"Take the form to her husband.", "isCorrect"=>false),
                   ),
                   "selectEvents"=>array(
                   ),
               ),
               1=>array(
                   "num"=>"1",
                   "content_id"=>185,
                   "type"=>"multipleChoice",
                   "text"=>array("type"=>"text","text"=>"What position do you think the staff in the dialog is?"),
                   "scores"=>5,
                   "items"=>array(
                       "0"=>array("item"=>"The bank teller.","isCorrect"=>false),
                       "1"=>array("item"=>"The bank lobby manager.", "isCorrect"=>true),
                       "2"=>array("item"=>"The security guard.", "isCorrect"=>false),
                   ),
                   "selectEvents"=>array(
                   ),
               ),
           ),
           "picture"=>"images/type_listen_001.png"
       );

       $this->saveEventListToDatabases($data);
        $a =  json_encode($data);
        $fp = fopen('json14.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
       return;
   }

    public function getPart15(){
        $data = array(
            "unit_id"       =>1,
            "lesson_id"     =>5,
            "part_id"       =>15,
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
                1=>array(1,2,3,4,5),
                2=>array(6,5,4,3,2),
            ),
            "keywords"      =>array(
            ),
        );

        $data['events'][] = array(
            "num"=>"1",
            "content_id"=>186,
            "type"=>"MTmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u1_mt_l_c_q1.mp3',
            "timeRange"=>"00:00-00:11",
            "content"=>"Jack Smith is an American businessman. He was born on March 1st, 1975 in Los Angeles, USA.",
            "text"=>array("type"=>"audio","text"=>"When was he born?","media_filename"=>'media/u1_mt_listen_click_qq1.mp3',"timeRange"=>"00:00-00:03"),
            "scores"=>7,
            "items"=>array(
                "0"=>array("item"=>"He was born in 1983.","isCorrect"=>false),
                "1"=>array("item"=>"He lives in Los Angeles.", "isCorrect"=>false),
                "2"=>array("item"=>"Jack was born in 1975.", "isCorrect"=>true),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_listen_001.png"
        );

        $data['events'][] = array(
            "num"=>"2",
            "content_id"=>187,
            "type"=>"MTmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u1_mt_l_c_q2.mp3',
            "timeRange"=>"00:00-00:12",
            "content"=>"Jack got married to Amy at the age of 27.Amy is an IT engineer.She works for a high-tech company.",
            "text"=>array("type"=>"audio","text"=>" What does Amy do?","media_filename"=>'media/u1_mt_listen_click_qq2.mp3',"timeRange"=>"00:00-00:03"),
            "scores"=>7,
            "items"=>array(
                "0"=>array("item"=>"Amy works as a doctor.","isCorrect"=>false),
                "1"=>array("item"=>"Amy works as an IT engineer.", "isCorrect"=>true),
                "2"=>array("item"=>"She is a housewife.", "isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_listen_001.png"
        );

        $data['events'][] = array(
            "num"=>"3",
            "content_id"=>188,
            "type"=>"MTmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u1_mt_l_c_q3.mp3',
            "timeRange"=>"00:00-00:12",
            "content"=>"Jack and Amy have two children, Alice and John.They both go to school by school bus.Both of them are very good at studying.",
            "text"=>array("type"=>"audio","text"=>"How do Jack's children go to school?","media_filename"=>'media/u1_mt_listen_click_qq3.mp3',"timeRange"=>"00:00-00:04"),
            "scores"=>7,
            "items"=>array(
                "0"=>array("item"=>"By bike.","isCorrect"=>false),
                "1"=>array("item"=>"By public bus.", "isCorrect"=>false),
                "2"=>array("item"=>"By school bus.", "isCorrect"=>true),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_listen_001.png"
        );

        $data['events'][] = array(
            "num"=>"4",
            "content_id"=>189,
            "type"=>"MTmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u1_mt_l_c_q4.mp3',
            "timeRange"=>"00:00-00:13",
            "content"=>"Staff: Ok. You need to fill out this application form first, please.Ellen: Well, I always feel nervous when I have to fill out forms.Could you please do it for me?",
            "text"=>array("type"=>"audio","text"=>"Why does Ellen say she feels nervous when she has to fill out forms?","media_filename"=>'media/u1_mt2.mp3',"timeRange"=>"00:00-00:06"),
            "scores"=>7,
            "items"=>array(
                "0"=>array("item"=>"She has difficulty in reading and writing.","isCorrect"=>true),
                "1"=>array("item"=>"She is just too lazy to do it by herself.", "isCorrect"=>false),
                "2"=>array("item"=>"She's too old to see anything.", "isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_listen_001.png"
        );

        $data['events'][] = array(
            "num"=>"5",
            "content_id"=>190,
            "type"=>"MTmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u1_mt_l_c_q5.mp3',
            "timeRange"=>"00:00-00:13",
            "content"=>"Staff: Could you please tell me your email address so that we can mail you your monthly bill?Ellen: Of course.It's Ellens@gmail.com.The first E is a capital letter.",
            "text"=>array("type"=>"audio","text"=>"Why does the bank need her email address?","media_filename"=>'media/u1_mt_listen_click_qq5.mp3',"timeRange"=>"00:00-00:05"),
            "scores"=>7,
            "items"=>array(
                "0"=>array("item"=>"To send her monthly bill.","isCorrect"=>true),
                "1"=>array("item"=>"To greet her every month.", "isCorrect"=>false),
                "2"=>array("item"=>"To promote business.", "isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_listen_001.png"
        );

        $data['events'][] = array(
            "num"=>"6",
            "content_id"=>191,
            "type"=>"MTmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u1_mt_l_c_q6.mp3',
            "timeRange"=>"00:00-00:13",
            "content"=>"Staff: Ok, Mrs. Richard, let me double-check everything with you before you go to the teller. Is that all correct, Mrs. Richard? Ellen: Yes, that's right! Thank you so much!",
            "text"=>array("type"=>"audio","text"=>"What kind of person is the staff?","media_filename"=>'media/u1_mt2.mp3',"timeRange"=>"00:06-00:10"),
            "scores"=>7,
            "items"=>array(
                "0"=>array("item"=>"He is very patient.","isCorrect"=>true),
                "1"=>array("item"=>"He doesn't work hard.", "isCorrect"=>false),
                "2"=>array("item"=>"He is inexperienced.", "isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_listen_001.png"
        );

        $this->saveEventListToDatabases($data);
        $a =  json_encode($data);
        $fp = fopen('json15.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
       return;
    }

    public function getPart16(){
        $data = array(
            "unit_id"       =>1,
            "lesson_id"     =>5,
            "part_id"       =>16,
            "media_filename"=>'',
            "content_totalcount"  => 5,
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
            "content_id"=>192,
            "type"=>"SRmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u1_mt_l_s_q1.mp3',
            "timeRange"=>"00:00-00:10",
            "content"=>"Alice is their daughter and she is thirteen years old. She goes to middle school. She is in eighth grade.",
            "text"=>array("type"=>"audio","text"=>"When will Jack's daughter go to high school?","media_filename"=>'media/u1_mt2.mp3',"timeRange"=>"00:10-00:15"),
            "scores"=>4,
            "items"=>array(
                "0"=>array("item"=>"Very soon.","answer"=>"Very soon","isCorrect"=>true),
                "1"=>array("item"=>"She just graduated from high school.","answer"=>"tShe just graduated from high school", "isCorrect"=>false),
                "2"=>array("item"=>"She is now in primary school.","answer"=>"She is now in primary school", "isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"2",
            "content_id"=>193,
            "type"=>"SRmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u1_mt_l_s_q2.mp3',
            "timeRange"=>"00:00-00:11",
            "content"=>"Mary is five years old and Harry is three years old.Every morning at 7:30, Helen drives her two children to kindergarten.",
            "text"=>array("type"=>"audio","text"=>"What was his major in the university?","media_filename"=>'media/u1_mt_listen_speak_qq2.mp3',"timeRange"=>"00:00-00:03"),
            "scores"=>4,
            "items"=>array(
                "0"=>array("item"=>"Primary school. ","answer"=>"Primary school","isCorrect"=>false),
                "1"=>array("item"=>"Middle school.", "answer"=>"Middle school","isCorrect"=>false),
                "2"=>array("item"=>"Kindergarten.", "answer"=>"Kindergarten","isCorrect"=>true),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"3",
            "content_id"=>194,
            "type"=>"SRmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u1_mt_l_s_q3.mp3',
            "timeRange"=>"00:00-00:08",
            "content"=>"Jack has a younger sister, Helen.(01:40-01:43)Helen and William also have two children: Mary and Harry.(01:49-01:53)",
            "text"=>array("type"=>"audio","text"=>"What's the relationship between Jack and Helen's children?","media_filename"=>'media/u1_mt2.mp3',"timeRange"=>"00:15-00:21"),
            "scores"=>4,
            "items"=>array(
                "0"=>array("item"=>"Jack is their uncle.","answer"=>"Jack is their uncle","isCorrect"=>true),
                "1"=>array("item"=>"They are Jack's children.", "answer"=>"They are Jack's children.","isCorrect"=>false),
                "2"=>array("item"=>" Jack is their teacher.", "answer"=>" Jack is their teacher","isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"4",
            "content_id"=>195,
            "type"=>"SRmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u1_mt_l_s_q4.mp3',
            "timeRange"=>"00:00-00:13",
            "content"=>"Staff: Great. And do you have a mobile phone, Mrs. Richard?Ellen: Yes, of course.It's 216 222 5566",
            "text"=>array("type"=>"audio","text"=>"What is Ellen's mobile phone number?","media_filename"=>'media/u1_mt_listen_speak_qq4.mp3',"timeRange"=>"00:00-00:03"),
            "scores"=>4,
            "items"=>array(
                "0"=>array("item"=>"216 222 5566","answer"=>"two one six two two two five five six six","isCorrect"=>true),
                "1"=>array("item"=>"567 897 1234","answer"=>"five six seven eight nine seven one two three four", "isCorrect"=>false),
                "2"=>array("item"=>"895 214 7630","answer"=>"eight nine five two one four seven six three zero", "isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"5",
            "content_id"=>196,
            "type"=>"SRmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u1_mt_l_s_q5.mp3',
            "timeRange"=>"00:00-00:11",
            "content"=>"Staff: And what is your home address?Ellen: 2990 Third Ave Cleveland, CA. CA is for California.",
            "text"=>array("type"=>"audio","text"=>"Where does Ellen live?","media_filename"=>'media/u1_mt_listen_speak_qq5.mp3',"timeRange"=>"00:00-00:03"),
            "scores"=>4,
            "items"=>array(
                "0"=>array("item"=>"Paris.","answer"=>"Paris","isCorrect"=>false),
                "1"=>array("item"=>"California.","answer"=>"California", "isCorrect"=>true),
                "2"=>array("item"=>"England.","answer"=>"England", "isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $this->saveEventListToDatabases($data);
        $a =  json_encode($data);
        $fp = fopen('json16.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
       return;
    }

    public function getPart17(){
        $data = array(
            "unit_id"       =>1,
            "lesson_id"     =>5,
            "part_id"       =>17,
            "media_filename"=>'',
            "content_totalcount"  =>6,
            "content_perpage"     => 4,
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
            "content_id"=>197,
            "media_filename"=>'media/u1gfi.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"01:16-01:20",
            "scores"=>5,
            "text" => "I'll drop in on you on my way home.",
            "answer" => "I'll drop in on you on my way home",
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"2",
            "content_id"=>198,
            "media_filename"=>'media/u1gfi.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"01:58-02:03",
            "scores"=>5,
            "text" => "William runs along the river every morning.",
            "answer" => "William runs along the river every morning",
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"3",
            "content_id"=>199,
            "media_filename"=>'media/u1gso.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"00:01-00:05",
            "scores"=>5,
            "text" => "Let's get down to business.",
            "answer" => "Let's get down to business",
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"4",
            "content_id"=>200,
            "media_filename"=>'media/u1gso.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"00:20-00:24",
            "scores"=>5,
            "text" => "Please keep off the grass.",
            "answer" => "Please keep off the grass",
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"5",
            "content_id"=>201,
            "media_filename"=>'media/u1gsf.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"00:01-00:05",
            "scores"=>5,
            "text" => "I can't agree with you more.",
            "answer" => "I can't agree with you more",
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"6",
            "content_id"=>202,
            "media_filename"=>'media/u1gsf.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"00:16-00:21",
            "scores"=>5,
            "text" => "Congratulations on your success!",
            "answer" => "Congratulations on your success",
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $this->saveEventListToDatabases($data);
        $a =  json_encode($data);
        $fp = fopen('json17.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
       return;
    }


    public function createJson(){
        for($i=1;$i<=17;$i++){
            $function = "getPart".$i;
            $this->$function();
        }
    }



    public function getSystemEventsNew(){
        $data = array(
            "media_filename"=>'media/system.mp3',
            "media_type"    =>'audio',
            "totalTime"     =>"3:26",
            "part_type"     =>"system",
        );

        // 进入课程主界面读
        $data['events'][] = array(
            "num"=>"1",
            "type"=>"text",
            'text'=>array("Welcome to We Talk.","Welcome to We Talk."),
            "timeRange"=>array("00:09:155-00:11:895","00:11:895-00:15:181"),
        );

        // 退出课程时候读
        $data['events'][] = array(
            "num"=>"2",
            "type"=>"text",
            'text'=>array("Goodbye.","Goodbye."),
            "timeRange"=>array("00:05:884-00:07:556","00:07:556-00:09:155"),
        );

        //答对题目
        $data['events'][] = array(
            "num"=>"3",
            'type'=>"We Win.",
            "timeRange"=>array("00:11-00:14","00:14-00:17"),
        );

        //进入passage
        $data['events'][] = array(
            "num"=>"4",
            "type"=>"text",
            'text'=>array("Passage","Passage"),
            "timeRange"=>array("00:15:181-00:16:783","00:16:783-00:18:670"),
        );
        //进入Dialog
        $data['events'][] = array(
            "num"=>"5",
            "type"=>"text",
            'text'=>array("Dialog","Dialog"),
            "timeRange"=>array("00:18:670-00:20:266","00:20:266-00:22:189"),
        );

        //进入Review
        $data['events'][] = array(
            "num"=>"6",
            "type"=>"text",
            'text'=>array("Review","Review"),
            "timeRange"=>array("00:22:189-00:23:965","00:23:965-00:25:906"),
        );


        //进入Grammar
        $data['events'][] = array(
            "num"=>"7",
            "type"=>"text",
            'text'=>array("Grammar","Grammar"),
            "timeRange"=>array("00:25:906-00:27:420","00:27:420-00:29:109"),
        );

        //进入课程界面播放课程/小节名称之后播放，提示选择学习内容

        $data['events'][] = array(
            "num"=>"8",
            "type"=>"text",
            'text'=>array("Please click the part you wish to study.","Please click the part you wish to study."),
            "timeRange"=>array("00:29:109-00:32:472","00:32:472-00:36:405"),
        );

        //Passage/Dialog listening, Summary结束时播放此句，询问是否再听一次，点yes,再次播放全篇，点no，退出本小节

        $data['events'][] = array(
            "num"=>"9",
            "type"=>"text",
            'text'=>array("Do you want to try it again?","Do you want to try it again?"),
            "timeRange"=>array("00:41:040-00:43:848","00:43:848-00:46:754"),
        );


        // Passage/Dialog Comprehension开始时播放此句，此为练习要求
        $data['events'][] = array(
            "num"=>"10",
            "type"=>"text",
            'text'=>array("Listen carefully and answer the questions.","Listen carefully and answer the questions."),
            "timeRange"=>array("00:51:301-00:54:781","00:54:781-00:59:204"),
        );

        // SR Sentence Reading开始时播放此句,此为题目要求
        $data['events'][] = array(
            "num"=>"11",
            "type"=>"text",
            'text'=>array("Read the following sentences.","Read the following sentences."),
            "timeRange"=>array("01:18:414-01:21:198","01:21:198-01:24:686"),
        );

        // SR Sentence repetition开始时播放此句，此为题目要求
        $data['events'][] = array(
            "num"=>"12",
            "type"=>"text",
            'text'=>array("Listen and repeat the sentence.","Listen and repeat the sentence."),
            "timeRange"=>array("01:24:686-01:27:594","01:27:594-01:31:894"),
        );

        // 所有练习结束时鼓励语
        $data['events'][] = array(
            "num"=>"13",
            "type"=>"text",
            'text'=>array("Great!","Great!","Well done!","Well done!"),
            "timeRange"=>array("01:37:252-01:38:704","01:38:704-01:40:226","01:40:226-01:42:006","01:42:006-01:44:072"),
        );

        // 完成一个part时
        $data['events'][] = array(
            "num"=>"14",
            "type"=>"text",
            'text'=>array("That's all for the part.","That's all for the part."),
            "timeRange"=>array("01:31:894-01:34:306","01:34:306-01:37:252"),
        );


        // 练习结束，询问是否再做一次
        $data['events'][] = array(
            "num"=>"15",
            "type"=>"text",
            'text'=>array("Do you want to try it again?","Do you want to try it again?"),
            "timeRange"=>array("00:41:040-00:43:848","00:43:848-00:46:754"),
        );

        // 超过十秒无反应
        $data['events'][] = array(
            "num"=>"16",
            "type"=>"text",
            'text'=>array("Are you still there?","Are you still there?"),
            "timeRange"=>array("00:36:405-00:38:610","00:38:610-00:41:040"),
        );
        //MT中 listen and click, listen and speak， sentence repetition开始时播放此句通篇播放指令

        $data['events'][] = array(
            "num"=>"17",
            "type"=>"text",
            'text'=>array("Listen carefully.","Listen carefully."),
            "timeRange"=>array("00:46:754-00:48:859","00:48:859-00:51:301"),
        );

        //right
        $data['events'][] = array(
            "num"=>"18",
            "type"=>"text",
            'text'=>array("That's right.","That's right.","Yes, that's right.","Yes, that's right.","That's correct!","That's correct!"),
            "timeRange"=>array("01:49:753-01:51:442","01:51:442-01:53:274","01:53:274-01:55:717","01:55:717-01:58:324","01:58:324-02:00:191","02:00:191-02:02:316"),
        );

        // wrong1
        $data['events'][] = array(
            "num"=>"19",
            "type"=>"text",
            'text'=>array("Try again please.","Try again please."),
            "timeRange"=>array("02:02:316-02:04:410","02:04:410-02:06:788"),
        );

        // wrong2
        $data['events'][] = array(
            "num"=>"20",
            "type"=>"text",
            'text'=>array("Sorry, not yet.","Sorry, not yet."),
            "timeRange"=>array("02:11:598-02:14:260","02:14:260-02:16:953"),
        );

        //time out 5 seconds 答题超过5秒
        $data['events'][] = array(
            "num"=>"21",
            "type"=>"text",
            'text'=>array("Please give your answer.","Please give your answer."),
            "timeRange"=>array("02:06:788-02:08:968","02:08:968-02:11:598"),
        );

        //not recognize 1 SR 没有识别第一次
        $data['events'][] = array(
            "num"=>"22",
            "type"=>"text",
            'text'=>array("Try again please.","Try again please."),
            "timeRange"=>array("02:02:316-02:04:410","02:04:410-02:06:788"),
        );

        //not recognize 2 SR 没有识别第二次
        $data['events'][] = array(
            "num"=>"23",
            "type"=>"text",
            'text'=>array("Sorry, not yet.","Sorry, not yet."),
            "timeRange"=>array("02:11:598-02:14:260","02:14:260-02:16:953"),
        );

        // SR time out 5 seconds
        $data['events'][] = array(
            "num"=>"24",
            "type"=>"text",
            'text'=>array("Please say your answer.","Please say your answer."),
            "timeRange"=>array("01:13:013-01:15:390","01:15:390-01:18:414"),
        );

        // 进入APP
        $data['events'][] = array(
            "num"=>"25",
            "type"=>"text",
            'text'=>array("Welcome to We Speak.","Welcome to We Speak."),
            "timeRange"=>array("00:00:000-00:02:615","00:02:615-00:05:884"),
        );


        // 中小学打错音效
        $data['events'][] = array(
            "num"=>"26",
            "type"=>"text",
            'text'=>array("Welcome to We Speak.","Welcome to We Speak."),
            "timeRange"=>array("03:40:400-03:41:640","03:40:400-03:41:640"),
        );

        // 中小学打对音效
        $data['events'][] = array(
            "num"=>"27",
            "type"=>"text",
            'text'=>array("Welcome to We Speak.","Welcome to We Speak."),
            "timeRange"=>array("03:43:560-03:45:000","03:43:560-03:45:000"),
        );

        // 中小学课程锁点击音效
        $data['events'][] = array(
            "num"=>"28",
            "type"=>"text",
            'text'=>array("Welcome to We Speak.","Welcome to We Speak."),
            "timeRange"=>array("03:47:240-03:48:240","03:47:240-03:48:240"),
        );

        // 中小学选择题点击音效
        $data['events'][] = array(
            "num"=>"29",
            "type"=>"text",
            'text'=>array("Welcome to We Speak.","Welcome to We Speak."),
            "timeRange"=>array("03:50:000-03:51:000","03:50:000-03:51:000"),
        );

        // 中小学语音识别音效
        $data['events'][] = array(
            "num"=>"30",
            "type"=>"text",
            'text'=>array("Welcome to We Speak.","Welcome to We Speak."),
            "timeRange"=>array("03:52:800-03:53:800","03:52:800-03:53:800"),
        );

        $a =  json_encode($data);
        $fp = fopen('system.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
        return;
    }


}
