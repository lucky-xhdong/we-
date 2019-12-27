<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lessonparttows extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('lessonpart');
        $this->load->model('event');
        $this->load->model('wetalkfile');
    }


    public function getLessonpartList(){
        $argus = func_get_args();
        $user = func_get_arg(count($argus)-1);
        if($user && count($argus) >1){
            return $this->lessonpart->getLessonpartList($argus[0]);
        }
        return $this;
    }


    public function getPart18(){
        $data = array(
            "unit_id"       =>2,
            "lesson_id"     =>6,
            "part_id"       =>18,
            "media_filename"=>'media/u2p.mp3',
            "media_type"    =>'audio',
            "totalTime"     =>"2:08",
            "part_type"     =>"listening",
            "have_questions"=>false,
            "questions_type"=>"text",
            "keywords"      =>array("computer technician","quit","start one's own business","upgrade","register",
                "administration departments","employees","focus on",
                "sell","financial software","appear","web presence","be willing to","trend","website design","profitable",
                "set up", "mobile applications", "handheld devices", "expand","partners","investment","explore","overseas markets","branch offices"
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
            "text"=>"Hello, this is Channel We. I'm Mr. V. In today's program we will find out how Jack quit his job and became an entrepreneur.",
            "media_filename"=>'media/u2p.mp4',
            "media_type"    =>'video',
            "picture"=>"images/u2_p001.png",
            "pictures"=>array()

        );
        $data['events'][] = array(
            "num"=>"5",
            'type'=>"text",
            "timeRange"=>"00:00-00:13",
            "displayKewords"=>true,
            "text"=>"Jack used to be a computer technician in a small company, where he got some work experience and learned the basics of how to manage a company.",
            "picture"=>"images/u2_p001.png"
        );
        $data['events'][] = array(
            "num"=>"6",
            'type'=>"text",
            "timeRange"=>"00:13-00:18",
            "text"=>"Four years ago, he quit that job. ",
            "picture"=>"images/u2_p001.png"
        );
        $data['events'][] = array(
            "num"=>"7",
            'type'=>"text",
            "timeRange"=>"00:18-00:26",
            "text"=>"He started his own business from his house, building & upgrading computers.",
            "picture"=>"images/u2_p001.png"
        );
        $data['events'][] = array(
            "num"=>"8",
            'type'=>"text",
            "timeRange"=>"00:26-00:30",
            "text"=>"The next year, he registered his company.",
            "picture"=>"images/u2_p002.png"
        );
        $data['events'][] = array(
            "num"=>"9",
            'type'=>"text",
            "timeRange"=>"00:30-00:41",
            "text"=>"There were three departments in his company, the software development department, the administration department and the sales department.  ",
            "picture"=>"images/u2_p002.png"
        );

        $data['events'][] = array(
            "num"=>"10",
            'type'=>"text",
            "timeRange"=>"00:41-00:46",
            "text"=>"He had 15 employees. ",
            "picture"=>"images/u2_p002.png"
        );

        $data['events'][] = array(
            "num"=>"11",
            'type'=>"text",
            "timeRange"=>"00:46-00:53",
            "text"=>"His company focused on developing financial software and it sold well.",
            "picture"=>"images/u2_p003.png"
        );

        $data['events'][] = array(
            "num"=>"12",
            'type'=>"text",
            "timeRange"=>"00:53-00:59",
            "text"=>"However, several years later, a new, bigger market appeared.",
            "picture"=>"images/u2_p004.png"
        );

        $data['events'][] = array(
            "num"=>"13",
            'type'=>"text",
            "timeRange"=>"00:59-01:07",
            "text"=>"Every company needed a web presence and was willing to pay to have their company's website made.",
            "picture"=>"images/u2_p004.png"
        );

        $data['events'][] = array(
            "num"=>"14",
            'type'=>"text",
            "timeRange"=>"01:07-01:15",
            "text"=>"When Jack saw this trend, he realized that website design could be a profitable business.",
            "picture"=>"images/u2_p004.png"
        );

        $data['events'][] = array(
            "num"=>"15",
            'type'=>"text",
            "timeRange"=>"01:15-01:25",
            "text"=>"So, he hired programmers, art designers, and IT technicians to set up a web-design department.",
            "picture"=>"images/u2_p004.png"
        );

        $data['events'][] = array(
            "num"=>"16",
            'type'=>"text",
            "timeRange"=>"01:25-01:31",
            "text"=>"Now, this department has become the most profitable one in his company.",
            "picture"=>"images/u2_p004.png"
        );

        $data['events'][] = array(
            "num"=>"17",
            'type'=>"text",
            "timeRange"=>"01:31-01:38",
            "text"=>"Right now, his company is focusing on developing mobile applications.",
            "picture"=>"images/u2_p005.png"
        );

        $data['events'][] = array(
            "num"=>"18",
            'type'=>"text",
            "timeRange"=>"01:38-01:46",
            "text"=>"These applications are for handheld devices, such as mobile phones and tablet PCs. ",
            "picture"=>"images/u2_p005.png"
        );


        $data['events'][] = array(
            "num"=>"19",
            'type'=>"text",
            "timeRange"=>"01:46-01:54",
            "text"=>"In order to further expand his company, Jack is now looking for partners and investment. ",
            "picture"=>"images/u2_p005.png"
        );

        $data['events'][] = array(
            "num"=>"20",
            'type'=>"text",
            "timeRange"=>"01:54-01:59",
            "text"=>"He also plans to explore overseas markets.",
            "picture"=>"images/u2_p006.png"
        );

        $data['events'][] = array(
            "num"=>"21",
            'type'=>"text",
            "timeRange"=>"01:59-02:08",
            "text"=>"He is going to set up branch offices in Asia and South America because they are markets with the most potential.",
            "picture"=>"images/u2_p006.png"
        );
        $this->saveEventListToDatabases($data);
        $a =  json_encode($data);
        $fp = fopen('json18.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
       return;

    }

    public function getPart19(){

        $data = array(
            "unit_id"       =>2,
            "lesson_id"     =>6,
            "part_id"       =>19,
            "media_filename"=>'media/u2p.mp3',
            "media_type"    =>'audio',
            "totalTime"     =>"2:08",
            "part_type"     =>"comprehension",
            "have_questions"=>false,
            "questions_type"=>"text",
            "keywords"      =>array("computer technician","quit","start one's own business","upgrade","register",
                "administration departments","employees","focus on",
                "sell","financial software","appear","web presence","be willing to","trend","website design","profitable",
                "set up", "mobile applications", "handheld devices", "expand","partners","investment","explore","overseas markets","branch offices"
            ),
        );
        $data['events'][] = array(
            "num"=>"2",
            'type'=>"text",
            "timeRange"=>"00:00-00:11",
            "text"=>"Hello, this is Channel We. I'm Mr. V. In today's program we will find out how Jack quit his job and became an entrepreneur.",
            "media_filename"=>'media/u2p.mp4',
            "media_type"    =>'video',
            "picture"=>"images/u2_p001.png",
            "pictures"=>array()

        );
        $data['events'][] = array(
            "num"=>"5",
            'type'=>"text",
            "timeRange"=>"00:00-00:13",
            "displayKewords"=>true,
            "text"=>"Jack used to be a computer technician in a small company, where he got some work experience and learned the basics of how to manage a company.",
            "picture"=>"images/u2_p001.png"
        );
        $data['events'][] = array(
            "num"=>"6",
            'type'=>"text",
            "timeRange"=>"00:13-00:18",
            "text"=>"Four years ago, he quit that job.",
            "picture"=>"images/u2_p001.png"
        );
        $data['events'][] = array(
            "num"=>"7",
            'type'=>"text",
            "timeRange"=>"00:18-00:26",
            "text"=>"He started his own business from his house, building & upgrading computers.",
            "picture"=>"images/u2_p001.png"
        );
        $data['events'][] = array(
            "num"=>"8",
            'type'=>"text",
            "timeRange"=>"00:26-00:30",
            "text"=>"The next year, he registered his company.",
            "picture"=>"images/u2_p002.png"
        );
        $data['events'][] = array(
            "num"=>"9",
            'type'=>"text",
            "timeRange"=>"00:30-00:41",
            "text"=>"There were three departments in his company, the software development department, the administration department and the sales department.  ",
            "picture"=>"images/u2_p002.png"
        );
        $data['events'][] = array(
            "num"=>"10",
            'type'=>"multipleChoices",
            "timeRange"=>"",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"9",
                    "content_id"=>203,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2pcq.mp3',
                    "timeRange"=>"00:00-00:06",
                    "text"=>"Was Jack a computer technician in a small company?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Yes","isCorrect"=>true),
                        "1"=>array("item"=>"No", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u2p.mp3',
                            "timeRange"=>"00:00-00:06",
                            "text"=>"Jack used to be a computer technician in a small company."
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u2p.mp3',
                            "timeRange"=>"00:00-00:06",
                            "text"=>"Jack used to be a computer technician in a small company."
                        ),
                    ),
                ),
                1=>array(
                    "num"=>"11",
                    "content_id"=>204,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2pcq.mp3',
                    "timeRange"=>"00:06-00:12",
                    "text"=>"Where did Jack start his own business?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"From his house.","isCorrect"=>true),
                        "1"=>array("item"=>"From rented apartment.", "isCorrect"=>false),
                        "2"=>array("item"=>"Dormitory.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u2p.mp3',
                            "timeRange"=>"00:18-00:26",
                            "text"=>"He started his own business from his house, building & upgrading computers.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u2p.mp3',
                            "timeRange"=>"00:18-00:26",
                            "text"=>"He started his own business from his house, building & upgrading computers.",
                        ),
                    ),
                ),
                2=>array(
                    "num"=>"12",
                    "content_id"=>205,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2pcq.mp3',
                    "timeRange"=>"00:12-00:18",
                    "text"=>"How many departments were there in his company?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"2","isCorrect"=>false),
                        "1"=>array("item"=>"3", "isCorrect"=>true),
                        "2"=>array("item"=>"4", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u2p.mp3',
                            "timeRange"=>"00:30-00:41",
                            "text"=>"There were three departments in his company, the software development department, the administration department and the sales department.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u2p.mp3',
                            "timeRange"=>"00:30-00:41",
                            "text"=>"There were three departments in his company, the software development department, the administration department and the sales department.",                        ),
                    ),
                )
            )
        );


        $data['events'][] = array(
            "num"=>"13",
            'type'=>"text",
            "timeRange"=>"00:41-00:46",
            "text"=>"He had 15 employees. ",
            "picture"=>"images/u2_p002.png"
        );

        $data['events'][] = array(
            "num"=>"14",
            'type'=>"text",
            "timeRange"=>"00:46-00:53",
            "text"=>"His company focused on developing financial software and it sold well.",
            "picture"=>"images/u2_p003.png"
        );

        $data['events'][] = array(
            "num"=>"15",
            'type'=>"text",
            "timeRange"=>"00:53-00:59",
            "text"=>"However, several years later, a new, bigger market appeared.",
            "picture"=>"images/u2_p004.png"
        );

        $data['events'][] = array(
            "num"=>"16",
            'type'=>"text",
            "timeRange"=>"00:59-01:07",
            "text"=>"Every company needed a web presence and was willing to pay to have their company's website made.",
            "picture"=>"images/u2_p004.png"
        );


        $data['events'][] = array(
            "num"=>"17",
            'type'=>"multipleChoices",
            "timeRange"=>"",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"18",
                    "content_id"=>206,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2pcq.mp3',
                    "timeRange"=>"00:18-00:23",
                    "text"=>"Did his company have 50 employees?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Yes","isCorrect"=>false),
                        "1"=>array("item"=>"No", "isCorrect"=>true),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u2p.mp3',
                            "timeRange"=>"00:41-00:46",
                            "text"=>"He had 15 employees."
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u2p.mp3',
                            "timeRange"=>"00:41-00:46",
                            "text"=>"He had 15 employees. "
                        ),
                    ),
                ),
                1=>array(
                    "num"=>"19",
                    "content_id"=>207,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2pcq.mp3',
                    "timeRange"=>"00:23-00:28",
                    "text"=>"What did his company focus on developing?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Computer.","isCorrect"=>false),
                        "1"=>array("item"=>"Video game.", "isCorrect"=>false),
                        "2"=>array("item"=>"Financial software.", "isCorrect"=>true),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u2p.mp3',
                            "timeRange"=>"00:46-00:53",
                            "text"=>"His company focused on developing financial software and it sold well.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u2p.mp3',
                            "timeRange"=>"00:46-00:53",
                            "text"=>"His company focused on developing financial software and it sold well.",
                        ),
                    ),
                ),
                2=>array(
                    "num"=>"20",
                    "content_id"=>208,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2pcq.mp3',
                    "timeRange"=>"00:28-00:33",
                    "text"=>"Were companies willing to pay for their websites?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Yes","isCorrect"=>true),
                        "1"=>array("item"=>"No", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u2p.mp3',
                            "timeRange"=>"01:00-01:07",
                            "text"=>"Every company needed a web presence and was willing to pay to have their company's website made.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u2p.mp3',
                            "timeRange"=>"01:00-01:07",
                            "text"=>"Every company needed a web presence and was willing to pay to have their company's website made.",
                    ),
                )
            )
          )
        );

        $data['events'][] = array(
            "num"=>"21",
            'type'=>"text",
            "timeRange"=>"01:07-01:15",
            "text"=>"When Jack saw this trend, he realized that website design could be a profitable business.",
            "picture"=>"images/u2_p004.png"
        );


        $data['events'][] = array(
            "num"=>"22",
            'type'=>"text",
            "timeRange"=>"01:15-01:25",
            "text"=>"So, he hired programmers, art designers, and IT technicians to set up a web-design department.",
            "picture"=>"images/u2_p004.png"
        );

        $data['events'][] = array(
            "num"=>"23",
            'type'=>"text",
            "timeRange"=>"01:25-01:31",
            "text"=>"Now, this department has become the most profitable one in his company.",
            "picture"=>"images/u2_p004.png"
        );

        $data['events'][] = array(
            "num"=>"24",
            'type'=>"text",
            "timeRange"=>"01:31-01:38",
            "text"=>"Right now, his company is focusing on developing mobile applications.",
            "picture"=>"images/u2_p005.png"
        );

        $data['events'][] = array(
            "num"=>"25",
            'type'=>"text",
            "timeRange"=>"01:38-01:46",
            "text"=>"These applications are for handheld devices, such as mobile phones and tablet PCs. ",
            "picture"=>"images/u2_p005.png"
        );

        $data['events'][] = array(
            "num"=>"26",
            'type'=>"multipleChoices",
            "timeRange"=>"",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"27",
                    "content_id"=>209,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2pcq.mp3',
                    "timeRange"=>"00:33-00:40",
                    "text"=>"Which department has become the most profitable in his company?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Web-design department.","isCorrect"=>true),
                        "1"=>array("item"=>"Administration department.", "isCorrect"=>false),
                        "2"=>array("item"=>"Software development department.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u2pcq.mp3',
                            "timeRange"=>"00:40-00:48",
                            "text"=>"The web-design department has become the most profitable one in his company."
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u2pcq.mp3',
                            "timeRange"=>"00:40-00:48",
                            "text"=>"The web-design department has become the most profitable one in his company."
                        ),
                    ),
                ),

                1=>array(
                    "num"=>"28",
                    "content_id"=>210,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2pcq.mp3',
                    "timeRange"=>"00:48-00:54",
                    "text"=>"What is his company focusing on developing right now?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Mobile phones.","isCorrect"=>false),
                        "1"=>array("item"=>"Mobile applications.", "isCorrect"=>true),
                        "2"=>array("item"=>"Tablet PCs.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u2p.mp3',
                            "timeRange"=>"01:31-01:38",
                            "text"=>"Right now, his company is focusing on developing mobile applications.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u2p.mp3',
                            "timeRange"=>"01:31-01:38",
                            "text"=>"Right now, his company is focusing on developing mobile applications.",
                        ),
                    ),
                ),
                2=>array(
                    "num"=>"29",
                    "content_id"=>211,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2pcq.mp3',
                    "timeRange"=>"00:54-00:59",
                    "text"=>"Where are the mobile applications used?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Computers.","isCorrect"=>false),
                        "1"=>array("item"=>"Telephones.", "isCorrect"=>true),
                        "2"=>array("item"=>"Mobile phones and tablet PCs.", "isCorrect"=>true),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u2_pcq_m.mp3',
                            "timeRange"=>"00:25-00:36",
                            "text"=>"The mobile applications are used for handheld devices, such as mobile phones and tablet PCs.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u2_pcq_m.mp3',
                            "timeRange"=>"00:25-00:36",
                            "text"=>"The mobile applications are used for handheld devices, such as mobile phones and tablet PCs.",
                        ),
                    )
                )
            )
        );


        $data['events'][] = array(
            "num"=>"30",
            'type'=>"text",
            "timeRange"=>"01:46-01:54",
            "text"=>"In order to further expand his company, Jack is now looking for partners and investment. ",
            "picture"=>"images/u2_p005.png"
        );

        $data['events'][] = array(
            "num"=>"31",
            'type'=>"text",
            "timeRange"=>"01:54-01:59",
            "text"=>"He also plans to explore overseas markets.",
            "picture"=>"images/u2_p006.png"
        );

        $data['events'][] = array(
            "num"=>"32",
            'type'=>"text",
            "timeRange"=>"01:59-02:08",
            "text"=>"He is going to set up branch offices in Asia and South America because they are markets with the most potential.",
            "picture"=>"images/u2_p006.png"
        );


        $data['events'][] = array(
            "num"=>"33",
            'type'=>"multipleChoices",
            "timeRange"=>"",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"34",
                    "content_id"=>212,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2pcq.mp3',
                    "timeRange"=>"01:00-01:05",
                    "text"=>"Why is Jack now looking for partners and investment?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"To make friends.","isCorrect"=>false),
                        "1"=>array("item"=>"To further expand his company.", "isCorrect"=>true),
                        "2"=>array("item"=>"To get money.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u2p.mp3',
                            "timeRange"=>"01:46-01:54",
                            "text"=>"In order to further expand his company, Jack is now looking for partners and investment."
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u2p.mp3',
                            "timeRange"=>"01:46-01:54",
                            "text"=>"In order to further expand his company, Jack is now looking for partners and investment."
                        ),
                    ),
                ),

                1=>array(
                    "num"=>"35",
                    "content_id"=>213,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2pcq.mp3',
                    "timeRange"=>"01:06-01:12",
                    "text"=>"Where is he going to set up branch offices?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Asia and South America.","isCorrect"=>true),
                        "1"=>array("item"=>"Asia and South Africa.", "isCorrect"=>false),
                        "2"=>array("item"=>"Asia and Europe.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u2p.mp3',
                            "timeRange"=>"01:59-02:08",
                            "text"=>"He is going to set up branch offices in Asia and South America because they are markets with the most potential.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u2p.mp3',
                            "timeRange"=>"01:59-02:08",
                            "text"=>"He is going to set up branch offices in Asia and South America because they are markets with the most potential.",
                        ),
                    ),
                ),
                2=>array(
                    "num"=>"36",
                    "content_id"=>214,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2pcq.mp3',
                    "timeRange"=>"01:12-01:22",
                    "text"=>"Is he going to set up branch offices in Asia and South America because they are markets with the most population?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Yes.","isCorrect"=>false),
                        "1"=>array("item"=>"No.", "isCorrect"=>true),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u2_pcq_m.mp3',
                            "timeRange"=>"00:05-00:18",
                            "text"=>"He is going to set up branch offices in Asia and South America because they are markets with the most potential.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u2_pcq_m.mp3',
                            "timeRange"=>"00:05-00:18",
                            "text"=>"He is going to set up branch offices in Asia and South America because they are markets with the most potential.",
                        ),
                    )
                )
            )
        );
        $this->saveEventListToDatabases($data);
        $a =  json_encode($data);
        $fp = fopen('json19.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
       return;

    }


    public function getPart20(){
        $data = array(
            "unit_id"       =>2,
            "lesson_id"     =>6,
            "part_id"       =>20,
            "media_filename"=>'media/u2p.mp3',
            "media_type"    =>'audio',
            "totalTime"     =>"2:08",
            "part_type"     =>"listening",
            "have_questions"=>false,
            "questions_type"=>"text",
            "keywords"      =>array("computer technician","quit","start one's own business","upgrade","register",
                "administration departments","employees","focus on",
                "sell","financial software","appear","web presence","be willing to","trend","website design","profitable",
                "set up", "mobile applications", "handheld devices", "expand","partners","investment","explore","overseas markets","branch offices"
            ),
        );

        $data['events'][] = array(
            "num"=>"2",
            'type'=>"text",
            "timeRange"=>"00:00-00:11",
            "text"=>"Hello, this is Channel We. I'm Mr. V. In today's program we will find out how Jack quit his job and became an entrepreneur.",
            "media_filename"=>'media/u2p.mp4',
            "media_type"    =>'video',
            "picture"=>"images/u2_p001.png",
            "pictures"=>array()

        );

        $data['events'][] = array(
            "num"=>"5",
            "content_id"=>215,
            'type'=>"sr_reading",
            "displayKewords"=>true,
            "timeRange"=>"00:00-00:05",
            "scores"=>1,
            "text"=>"Jack used to be a computer technician in a small company.",
            "answer"=>"Jack used to be a computer technician in a small company",
            "picture"=>"images/u2_p001.png"
        );

        $data['events'][] = array(
            "num"=>"6",
            'type'=>"text",
            "timeRange"=>"02:08-02:15",
            "text"=>"where he got some work experience and learned the basics of how to manage a company.",
            "picture"=>"images/u2_p001.png"
        );
        $data['events'][] = array(
            "num"=>"7",
            'type'=>"text",
            "timeRange"=>"02:15-02:18",
            "text"=>"Four years ago.",
            "picture"=>"images/u2_p001.png"
        );

        $data['events'][] = array(
            "num"=>"8",
            "content_id"=>216,
            'type'=>"sr_reading",
            "timeRange"=>"00:00-00:05",
            "scores"=>1,
            "text"=>"He quit that job.",
            "answer"=>"He quit that job",
            "picture"=>"images/u2_p001.png"
        );
        $data['events'][] = array(
            "num"=>"9",
            'type'=>"text",
            "timeRange"=>"00:18-00:26",
            "text"=>"He started his own business from his house, building & upgrading computers.",
            "picture"=>"images/u2_p001.png"
        );

        $data['events'][] = array(
            "num"=>"10",
            "content_id"=>217,
            'type'=>"sr_reading",
            "timeRange"=>"00:00-00:05",
            "scores"=>1,
            "text"=>"The next year, he registered his company.",
            "answer"=>"The next year, he registered his company",
            "picture"=>"images/u2_p001.png"
        );

        $data['events'][] = array(
            "num"=>"11",
            'type'=>"text",
            "timeRange"=>"00:30-00:41",
            "text"=>"There were three departments in his company, the software development department, the administration department and the sales department.  ",
            "picture"=>"images/u2_p002.png"
        );

        $data['events'][] = array(
            "num"=>"12",
            'type'=>"text",
            "timeRange"=>"00:41-00:46",
            "text"=>"He had 15 employees. ",
            "picture"=>"images/u2_p002.png"
        );

        $data['events'][] = array(
            "num"=>"13",
            "content_id"=>218,
            'type'=>"sr_reading",
            "timeRange"=>"00:00-00:05",
            "scores"=>1,
            "text"=>"His company focused on developing financial software and it sold well.",
            "answer"=>"His company focused on developing financial software and it sold well",
            "picture"=>"images/u2_p003.png"
        );

        $data['events'][] = array(
            "num"=>"14",
            'type'=>"text",
            "timeRange"=>"00:53-00:59",
            "text"=>"However, several years later, a new, bigger market appeared.",
            "picture"=>"images/u2_p004.png"
        );


        $data['events'][] = array(
            "num"=>"15",
            'type'=>"text",
            "timeRange"=>"00:59-01:07",
            "text"=>"Every company needed a web presence and was willing to pay to have their company's website made.",
            "picture"=>"images/u2_p004.png"
        );

        $data['events'][] = array(
            "num"=>"16",
            "content_id"=>219,
            'type'=>"sr_reading",
            "timeRange"=>"00:00-00:05",
            "scores"=>1,
            "text"=>"When Jack saw this trend, he realized that website design could be a profitable business.",
            "answer"=>"When Jack saw this trend he realized that website design could be a profitable business",
            "picture"=>"images/u2_p004.png"
        );

        $data['events'][] = array(
            "num"=>"17",
            'type'=>"text",
            "timeRange"=>"01:15-01:25",
            "text"=>"So, he hired programmers, art designers, and IT technicians to set up a web-design department.",
            "picture"=>"images/u2_p004.png"
        );

        $data['events'][] = array(
            "num"=>"18",
            "content_id"=>220,
            'type'=>"sr_reading",
            "timeRange"=>"00:00-00:05",
            "scores"=>1,
            "text"=>"Now, this department has become the most profitable one in his company.",
            "answer"=>"Now, this department has become the most profitable one in his company",
            "picture"=>"images/u2_p004.png"
        );

        $data['events'][] = array(
            "num"=>"19",
            "content_id"=>221,
            'type'=>"sr_reading",
            "timeRange"=>"00:00-00:05",
            "scores"=>1,
            "text"=>"Right now, his company is focusing on developing mobile applications.",
            "picture"=>"images/u2_p005.png"
        );

        $data['events'][] = array(
            "num"=>"20",
            'type'=>"text",
            "timeRange"=>"01:38-01:46",
            "text"=>"These applications are for handheld devices, such as mobile phones and tablet PCs. ",
            "picture"=>"images/u2_p005.png"
        );


        $data['events'][] = array(
            "num"=>"21",
            "content_id"=>222,
            'type'=>"sr_reading",
            "timeRange"=>"01:46-01:54",
            "scores"=>1,
            "text"=>"In order to further expand his company, Jack is now looking for partners and investment. ",
            "answer"=>"In order to further expand his company Jack is now looking for partners and investment",
            "picture"=>"images/u2_p005.png"
        );

        $data['events'][] = array(
            "num"=>"21",
            "content_id"=>222,
            'type'=>"sr_reading",
            "timeRange"=>"01:54-01:59",
            "scores"=>1,
            "text"=>"He also plans to explore overseas markets.",
            "answer"=>"He also plans to explore overseas markets",
            "picture"=>"images/u2_p006.png"
        );

        $data['events'][] = array(
            "num"=>"21",
            'type'=>"text",
            "timeRange"=>"01:59-02:08",
            "text"=>"He is going to set up branch offices in Asia and South America because they are markets with the most potential.",
            "picture"=>"images/u2_p006.png"
        );
        $this->saveEventListToDatabases($data);
        $a =  json_encode($data);
        $fp = fopen('json20.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
       return;
    }


    public function getPart21(){
        $data = array(
            "unit_id"       =>2,
            "lesson_id"     =>7,
            "part_id"       =>21,
            "media_filename"=>'media/u2d.mp4',
            "media_type"    =>'video',
            "totalTime"     =>"4:05",
            "part_type"     =>"dialog",
            "have_questions"=>false,
            "questions_type"=>"text",
            "keywords"      =>array("conversation","interviewer","resume","working experience","landscape photographer",
                "benefit","medical & dental insurance","travel allowance",
                "contact information","look forward to"
            ),
        );
        $data['events'][] = array(
            "num"=>"1",
            'type'=>"text",
            "timeRange"=>"00:00-00:04",
            "text"=>"Andy, Jack's younger brother, is looking for a job.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"2",
            'type'=>"text",
            "timeRange"=>"00:04-00:08",
            "text"=>"The following is the conversation between him and an interviewer.",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"3",
            'type'=>"text",
            "timeRange"=>"00:08-00:11",
            "text"=>"Good morning, Andy Smith. ",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"4",
            'type'=>"text",
            "timeRange"=>"00:11-00:13",
            "text"=>"Please, have a seat.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"5",
            'type'=>"text",
            "timeRange"=>"00:13-00:15",
            "text"=>"Good morning.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"6",
            'type'=>"text",
            "timeRange"=>"00:15-00:17",
            "text"=>"It's great to be here.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"7",
            'type'=>"text",
            "timeRange"=>"00:17-00:18",
            "text"=>"Andy,",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"8",
            'type'=>"text",
            "timeRange"=>"00:18-00:21",
            "text"=>"from your resume I can see that",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"9",
            'type'=>"text",
            "timeRange"=>"00:21-00:24",
            "text"=>"you have lots of photography experience.",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"10",
            'type'=>"text",
            "timeRange"=>"00:24-00:29",
            "text"=>"I wonder why you're interested in being a photographer for our magazine?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"11",
            'type'=>"text",
            "timeRange"=>"00:29-00:35",
            "text"=>"Well, I really enjoy being out in nature, especially in the mountains and forests,",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"12",
            'type'=>"text",
            "timeRange"=>"00:35-00:39",
            "text"=>"and your magazine is one of the best in this field. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"13",
            'type'=>"text",
            "timeRange"=>"00:39-00:41",
            "text"=>"I see.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"14",
            'type'=>"text",
            "timeRange"=>"00:41-00:44",
            "text"=>"Do you have any working experience in this field?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"15",
            'type'=>"text",
            "timeRange"=>"00:44-01:50",
            "text"=>"Yes, I used to be a landscape photographer for a magazine in South Africa. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"16",
            'type'=>"text",
            "timeRange"=>"00:50-00:53",
            "text"=>"Have you brought any of your works with you?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"17",
            'type'=>"text",
            "timeRange"=>"00:53-00:55",
            "text"=>"Yes, of course.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"18",
            'type'=>"text",
            "timeRange"=>"00:55-00:57",
            "text"=>"Here you are.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"19",
            'type'=>"text",
            "timeRange"=>"00:57-01:00",
            "text"=>"These photos are terrific.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"20",
            'type'=>"text",
            "timeRange"=>"01:00-01:03",
            "text"=>"What kind of pay are you expecting? ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"21",
            'type'=>"text",
            "timeRange"=>"01:03-01:05",
            "text"=>"Well,",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"22",
            'type'=>"text",
            "timeRange"=>"01:05-01:09",
            "text"=>"I am thinking about 3000 dollars would be OK,",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"23",
            'type'=>"text",
            "timeRange"=>"01:09-01:15",
            "text"=>"plus the usual benefits, such as medical & dental insurance, and travel allowance.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"24",
            'type'=>"text",
            "timeRange"=>"01:15-01:17",
            "text"=>"I see.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"25",
            'type'=>"text",
            "timeRange"=>"01:17-01:22",
            "text"=>"If you get the job, you will have to travel around 200 days a year.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"26",
            'type'=>"text",
            "timeRange"=>"01:22-01:24",
            "text"=>"Would that be ok with you?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"27",
            'type'=>"text",
            "timeRange"=>"01:24-01:26",
            "text"=>"No problem.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"28",
            'type'=>"text",
            "timeRange"=>"01:26-01:27",
            "text"=>"Great!",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"29",
            'type'=>"text",
            "timeRange"=>"01:27-01:30",
            "text"=>"Do you have any questions to ask?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"30",
            'type'=>"text",
            "timeRange"=>"01:30-01:32",
            "text"=>"Right now, no.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"31",
            'type'=>"text",
            "timeRange"=>"01:32-01:35",
            "text"=>"But I really hope I can get the job.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"32",
            'type'=>"text",
            "timeRange"=>"01:35-01:38",
            "text"=>"I will finish all the interviews this Friday,",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"33",
            'type'=>"text",
            "timeRange"=>"01:38-01:42",
            "text"=>"and you'll hear from us no later than sometime next week. ",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"34",
            'type'=>"text",
            "timeRange"=>"01:42-01:45",
            "text"=>"Let me double-check your contact information.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"35",
            'type'=>"text",
            "timeRange"=>"01:45-01:53",
            "text"=>"Your mobile number is 28610037549?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"36",
            'type'=>"text",
            "timeRange"=>"01:53-01:55",
            "text"=>"That's correct!",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"37",
            'type'=>"text",
            "timeRange"=>"01:55-02:00",
            "text"=>"And my email address is AndyS@exmail.com.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"38",
            'type'=>"text",
            "timeRange"=>"02:00-02:01",
            "text"=>"All right.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"39",
            'type'=>"text",
            "timeRange"=>"02:01-02:02",
            "text"=>"Thanks!",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"40",
            'type'=>"text",
            "timeRange"=>"02:02-02:04",
            "text"=>"Thank you too.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"41",
            'type'=>"text",
            "timeRange"=>"02:04-02:06",
            "text"=>"Thank you for your time,",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"42",
            'type'=>"text",
            "timeRange"=>"02:06-02:09",
            "text"=>"and I look forward to hearing from you soon.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"43",
            'type'=>"text",
            "timeRange"=>"02:09-02:11",
            "text"=>"Thanks for coming today.",
            "picture"=>""
        );
        $this->saveEventListToDatabases($data);
        $a =  json_encode($data);
        $fp = fopen('json21.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
       return;
    }

    public function getPart22(){
        $data = array(
            "unit_id"       =>2,
            "lesson_id"     =>7,
            "part_id"       =>22,
            "media_filename"=>'media/u2d.mp4',
            "media_type"    =>'video',
            "totalTime"     =>"4:05",
            "part_type"     =>"dialog",
            "have_questions"=>false,
            "questions_type"=>"text",
            "keywords"      =>array("conversation","interviewer","resume","working experience","landscape photographer",
                "benefit","medical & dental insurance","travel allowance",
                "contact information","look forward to"
            ),
        );
        $data['events'][] = array(
            "num"=>"1",
            'type'=>"text",
            "timeRange"=>"00:00-00:04",
            "text"=>"Andy, Jack's younger brother, is looking for a job.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"2",
            'type'=>"text",
            "timeRange"=>"00:04-00:08",
            "text"=>"The following is the conversation between him and an interviewer.",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"3",
            'type'=>"text",
            "timeRange"=>"00:08-00:11",
            "text"=>"Good morning, Andy Smith. ",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"4",
            'type'=>"text",
            "timeRange"=>"00:11-00:13",
            "text"=>"Please, have a seat.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"5",
            'type'=>"text",
            "timeRange"=>"00:13-00:15",
            "text"=>"Good morning.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"6",
            'type'=>"text",
            "timeRange"=>"00:15-00:17",
            "text"=>"It's great to be here.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"7",
            'type'=>"text",
            "timeRange"=>"00:17-00:24",
            "text"=>"Andy, from your resume I can see that you have lots of photography experience.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"8",
            'type'=>"text",
            "timeRange"=>"00:24-00:29",
            "text"=>"I wonder why you're interested in being a photographer for our magazine? ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"9",
            'type'=>"text",
            "timeRange"=>"00:29-00:39",
            "text"=>"Well, I really enjoy being out in nature, especially in the mountains and forests, and your magazine is one of the best in this field. ",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"10",
            'type'=>"multipleChoices",
            "timeRange"=>"",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"11",
                    "content_id"=>223,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2dcq.mp3',
                    "timeRange"=>"00:00-00:05",
                    "text"=>"Does Andy have much photography experience? ",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Yes","isCorrect"=>true),
                        "1"=>array("item"=>"No", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u2dcq.mp3',
                            "timeRange"=>"00:05-00:10",
                            "text"=>"He has lots of photography experience.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u2dcq.mp3',
                            "timeRange"=>"00:05-00:10",
                            "text"=>"He has lots of photography experience.",
                        ),
                    ),
                ),
                1=>array(
                    "num"=>"12",
                    "content_id"=>224,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2dcq.mp3',
                    "timeRange"=>"00:10-00:18",
                    "text"=>"How many reasons does Andy give for being interested in being a photographer for the magazine?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Three.","isCorrect"=>false),
                        "1"=>array("item"=>"Two.", "isCorrect"=>true),
                        "2"=>array("item"=>"Four.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u2dcq.mp3',
                            "timeRange"=>"00:18-00:26",
                            "text"=>"He gives two reasons for being interested in being a photographer for the magazine.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u2dcq.mp3',
                            "timeRange"=>"00:18-00:26",
                            "text"=>"He gives two reasons for being interested in being a photographer for the magazine.",
                        ),
                    ),
                ),
                2=>array(
                    "num"=>"13",
                    "content_id"=>225,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2dcq.mp3',
                    "timeRange"=>"00:26-00:31",
                    "text"=>"Is the magazine the best in the field?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Yes","isCorrect"=>false),
                        "1"=>array("item"=>"No", "isCorrect"=>true),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u2dcq.mp3',
                            "timeRange"=>"00:31-00:36",
                            "text"=>"The magazine is one of the best in this field.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u2dcq.mp3',
                            "timeRange"=>"00:31-00:36",
                            "text"=>"The magazine is one of the best in this field.",
                        ),
                    ),
                ),

            )
        );


        $data['events'][] = array(
            "num"=>"14",
            'type'=>"text",
            "timeRange"=>"00:39-00:41",
            "text"=>"I see.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"15",
            'type'=>"text",
            "timeRange"=>"00:41-00:44",
            "text"=>"Do you have any working experience in this field? ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"16",
            'type'=>"text",
            "timeRange"=>"00:44-00:50",
            "text"=>"Yes, I used to be a landscape photographer for a magazine in South Africa. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"17",
            'type'=>"text",
            "timeRange"=>"00:50-00:53",
            "text"=>"Have you brought any of your works with you?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"18",
            'type'=>"text",
            "timeRange"=>"00:53-00:55",
            "text"=>"Yes, of course.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"19",
            'type'=>"text",
            "timeRange"=>"00:55-00:57",
            "text"=>"Here you are.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"20",
            'type'=>"text",
            "timeRange"=>"00:57-01:00",
            "text"=>"These photos are terrific.",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"21",
            'type'=>"multipleChoices",
            "timeRange"=>"",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"22",
                    "content_id"=>226,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2dcq.mp3',
                    "timeRange"=>"00:36-00:41",
                    "text"=>"What was one of Andy's previous jobs?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Fashion photographer.","isCorrect"=>false),
                        "1"=>array("item"=>"Landscape photographer.", "isCorrect"=>true),
                        "2"=>array("item"=>"Portrait photographer.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u2dcq.mp3',
                            "timeRange"=>"00:41-00:48",
                            "text"=>"He used to be a landscape photographer for a magazine in South Africa.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u2dcq.mp3',
                            "timeRange"=>"00:41-00:48",
                            "text"=>"He used to be a landscape photographer for a magazine in South Africa.",
                        ),
                    ),
                ),
                1=>array(
                    "num"=>"23",
                    "content_id"=>227,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2dcq.mp3',
                    "timeRange"=>"00:48-00:54",
                    "text"=>"Has Andy brought any of his works with him for the interview?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Yes.","isCorrect"=>true),
                        "1"=>array("item"=>"No.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u2dcq.mp3',
                            "timeRange"=>"00:54-00:58",
                            "text"=>"He has brought some of his works with him.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u2dcq.mp3',
                            "timeRange"=>"00:54-00:58",
                            "text"=>"He has brought some of his works with him.",
                        ),
                    ),
                ),
                2=>array(
                    "num"=>"24",
                    "content_id"=>228,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2dcq.mp3',
                    "timeRange"=>"00:58-01:04",
                    "text"=>"What does the interviewer think of the Andy's works?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Ok.","isCorrect"=>false),
                        "1"=>array("item"=>"Very good.", "isCorrect"=>true),
                        "2"=>array("item"=>"Terrible.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u2dcq.mp3',
                            "timeRange"=>"01:04-01:09",
                            "text"=>"He thinks that these photos are terrific.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u2dcq.mp3',
                            "timeRange"=>"01:04-01:09",
                            "text"=>"He thinks that these photos are terrific.",
                        ),
                    ),
                ),

            )
        );

        $data['events'][] = array(
            "num"=>"25",
            'type'=>"text",
            "timeRange"=>"01:00-01:03",
            "text"=>"What kind of pay are you expecting? ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"26",
            'type'=>"text",
            "timeRange"=>"01:03-01:15",
            "text"=>"Well, I am thinking about 3000 dollars would be OK, plus the usual benefits, such as medical & dental insurance, and travel allowance.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"27",
            'type'=>"text",
            "timeRange"=>"01:15-01:17",
            "text"=>"I see.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"28",
            'type'=>"text",
            "timeRange"=>"01:17-01:22",
            "text"=>"If you get the job, you will have to travel around 200 days a year.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"29",
            'type'=>"text",
            "timeRange"=>"01:22-01:24",
            "text"=>"Would that be ok with you?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"30",
            'type'=>"text",
            "timeRange"=>"01:24-01:26",
            "text"=>"No problem.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"31",
            'type'=>"text",
            "timeRange"=>"01:26-01:27",
            "text"=>"Great!",
            "picture"=>""
        );


        $data['events'][] = array(
            "num"=>"32",
            'type'=>"multipleChoices",
            "timeRange"=>"",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"33",
                    "content_id"=>229,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2dcq.mp3',
                    "timeRange"=>"01:09-01:13",
                    "text"=>"How much salary does Andy expect?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"3200 dollars.","isCorrect"=>false),
                        "1"=>array("item"=>"3500 dollars.", "isCorrect"=>false),
                        "2"=>array("item"=>"3000 dollars.", "isCorrect"=>true),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u2dcq.mp3',
                            "timeRange"=>"01:13-01:28",
                            "text"=>"He says 3000 dollars would be OK.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u2dcq.mp3',
                            "timeRange"=>"01:13-01:28",
                            "text"=>"He says 3000 dollars would be OK.",
                        ),
                    ),
                ),
                1=>array(
                    "num"=>"34",
                    "content_id"=>230,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2dcq.mp3',
                    "timeRange"=>"01:18-01:24",
                    "text"=>"What else does Andy ask for besides salary?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Usual benefits.","isCorrect"=>true),
                        "1"=>array("item"=>"Allowance.", "isCorrect"=>false),
                        "2"=>array("item"=>"Insurance.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u2dcq.mp3',
                            "timeRange"=>"01:24-01:34",
                            "text"=>"He also asks for the usual benefits, such as medical & dental insurance, and travel allowance.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u2dcq.mp3',
                            "timeRange"=>"01:24-01:34",
                            "text"=>"He also asks for the usual benefits, such as medical & dental insurance, and travel allowance.",
                        ),
                    ),
                ),
                2=>array(
                    "num"=>"35",
                    "content_id"=>231,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2dcq.mp3',
                    "timeRange"=>"01:34-01:40",
                    "text"=>"How many days do Andy has to travel if he gets the job?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"A year.","isCorrect"=>false),
                        "1"=>array("item"=>"220 days.", "isCorrect"=>false),
                        "2"=>array("item"=>"Around 200 days.", "isCorrect"=>true),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u2dcq.mp3',
                            "timeRange"=>"01:40-01:45",
                            "text"=>"He will have to travel around 200 days a year.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u2dcq.mp3',
                            "timeRange"=>"01:40-01:45",
                            "text"=>"He will have to travel around 200 days a year.",
                        ),
                    ),
                ),

            )
        );


        $data['events'][] = array(
            "num"=>"36",
            'type'=>"text",
            "timeRange"=>"01:27-01:30",
            "text"=>"Do you have any questions to ask?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"37",
            'type'=>"text",
            "timeRange"=>"01:30-01:32",
            "text"=>"Right now, no.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"38",
            'type'=>"text",
            "timeRange"=>"01:32-01:35",
            "text"=>"But I really hope I can get the job.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"39",
            'type'=>"text",
            "timeRange"=>"01:35-01:42",
            "text"=>"I will finish all the interviews this Friday, and you'll hear from us no later than sometime next week. ",
            "picture"=>""
        );


        $data['events'][] = array(
            "num"=>"40",
            'type'=>"multipleChoices",
            "timeRange"=>"",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"41",
                    "content_id"=>232,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2dcq.mp3',
                    "timeRange"=>"01:45-01:50",
                    "text"=>"Does Andy want to get the job very much?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Yes","isCorrect"=>true),
                        "1"=>array("item"=>"No", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u2dcq.mp3',
                            "timeRange"=>"01:50-01:55",
                            "text"=>"He says he really hopes he can get the job.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u2dcq.mp3',
                            "timeRange"=>"01:50-01:55",
                            "text"=>"He says he really hopes he can get the job.",
                        ),
                    ),
                ),
                1=>array(
                    "num"=>"42",
                    "content_id"=>233,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2dcq.mp3',
                    "timeRange"=>"01:55-02:00",
                    "text"=>"When will Andy know the result of the job interview?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Sometime next week.","isCorrect"=>true),
                        "1"=>array("item"=>"This Friday.", "isCorrect"=>false),
                        "2"=>array("item"=>"Next Friday.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u2dcq.mp3',
                            "timeRange"=>"02:00-02:07",
                            "text"=>"He will know the result of the job interview no later than sometime next week.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u2dcq.mp3',
                            "timeRange"=>"02:00-02:07",
                            "text"=>"He will know the result of the job interview no later than sometime next week.",
                        ),
                    ),
                ),

            )
        );



        $data['events'][] = array(
            "num"=>"43",
            'type'=>"text",
            "timeRange"=>"01:42-01:45",
            "text"=>"Let me double-check your contact information. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"44",
            'type'=>"text",
            "timeRange"=>"01:45-01:53",
            "text"=>"Your mobile number is 28610037549?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"45",
            'type'=>"text",
            "timeRange"=>"01:53-01:55",
            "text"=>"That's correct!",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"46",
            'type'=>"text",
            "timeRange"=>"01:55-02:00",
            "text"=>"And my email address is AndyS@exmail.com.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"47",
            'type'=>"text",
            "timeRange"=>"02:00-02:01",
            "text"=>"All right.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"48",
            'type'=>"text",
            "timeRange"=>"02:01-02:02",
            "text"=>"Thanks!",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"49",
            'type'=>"text",
            "timeRange"=>"02:02-02:04",
            "text"=>"Thank you too.",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"50",
            'type'=>"multipleChoices",
            "timeRange"=>"",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"51",
                    "content_id"=>234,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2dcq.mp3',
                    "timeRange"=>"02:07-02:13",
                    "text"=>"Does the interviewer have Andy's mobile number? ",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Yes","isCorrect"=>true),
                        "1"=>array("item"=>"No", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u2dcq.mp3',
                            "timeRange"=>"02:13-02:17",
                            "text"=>"He has Andy's mobile number. ",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u2dcq.mp3',
                            "timeRange"=>"02:13-02:17",
                            "text"=>"He has Andy's mobile number. ",
                        ),
                    ),
                ),
                1=>array(
                    "num"=>"52",
                    "content_id"=>235,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2dcq.mp3',
                    "timeRange"=>"02:17-02:23",
                    "text"=>"Does Andy forget to leave his email address to the interviewer?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Yes","isCorrect"=>false),
                        "1"=>array("item"=>"No", "isCorrect"=>true),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u2dcq.mp3',
                            "timeRange"=>"02:23-02:28",
                            "text"=>"He leaves his email address to the interviewer.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u2dcq.mp3',
                            "timeRange"=>"02:23-02:28",
                            "text"=>"He leaves his email address to the interviewer.",
                        ),
                    ),
                ),

            )
        );
        $data['events'][] = array(
            "num"=>"53",
            'type'=>"text",
            "timeRange"=>"02:04-02:09",
            "text"=>"Thank you for your time, and I look forward to hearing from you soon.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"54",
            'type'=>"text",
            "timeRange"=>"02:09-02:11",
            "text"=>"Thanks for coming today.",
            "picture"=>""
        );
        $this->saveEventListToDatabases($data);
        $a =  json_encode($data);
        $fp = fopen('json22.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
       return;
    }



    public function getPart23(){

        $data = array(
            "unit_id"       =>2,
            "lesson_id"     =>7,
            "part_id"       =>23,
            "media_filename"=>'media/u2d.mp4',
            "media_type"    =>'video',
            "totalTime"     =>"4:05",
            "part_type"     =>"dialog",
            "have_questions"=>false,
            "questions_type"=>"text",
            "keywords"      =>array("conversation","interviewer","resume","working experience","landscape photographer",
                "benefit","medical & dental insurance","travel allowance","contact information","look forward to"
            ),
        );
        $data['events'][] = array(
            "num"=>"1",
            'type'=>"text",
            "timeRange"=>"00:00-00:04",
            "text"=>"Andy, Jack's younger brother, is looking for a job.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"2",
            'type'=>"text",
            "timeRange"=>"00:04-00:08",
            "text"=>"The following is the conversation between him and an interviewer.",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"3",
            'type'=>"text",
            "timeRange"=>"00:08-00:11",
            "text"=>"Good morning, Andy Smith. ",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"4",
            'type'=>"text",
            "timeRange"=>"00:11-00:13",
            "text"=>"Please, have a seat.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"5",
            'type'=>"text",
            "timeRange"=>"00:13-00:15",
            "text"=>"Good morning.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"6",
            'type'=>"text",
            "timeRange"=>"00:15-00:17",
            "text"=>"It's great to be here.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"7",
            'type'=>"sr_reading",
            "content_id"=>236,
            "scores"=>1,
            "timeRange"=>"00:28-00:35",
            "text"=>"Andy, from your resume I can see that you have lots of photography experience.",
            "answer"=>"Andy from your resume I can see that you have lots of photography experience",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"8",
            'type'=>"sr_reading",
            "content_id"=>237,
            "scores"=>1,
            "timeRange"=>"00:35-00:41",
            "text"=>"I wonder why you're interested in being a photographer for our magazine? ",
            "answer"=>"I wonder why you are interested in being a photographer for our magazine",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"9",
            'type'=>"text",
            "timeRange"=>"00:29-00:39",
            "text"=>"Well, I really enjoy being out in nature, especially in the mountains and forests, and your magazine is one of the best in this field.",
            "picture"=>""
        );

//        $data['events'][] = array(
//            "num"=>"10",
//            'type'=>"sr_reading",
//            "content_id"=>238,
//            "scores"=>1,
//            "timeRange"=>"00:35-00:41",
//            "text"=>"And your magazine is one of the best in this field. ",
//            "answer"=>"And your magazine is one of the best in this field",
//            "picture"=>""
//        );

        $data['events'][] = array(
            "num"=>"11",
            'type'=>"text",
            "timeRange"=>"00:39-00:41",
            "text"=>"I see.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"12",
            'type'=>"sr_reading",
            "content_id"=>239,
            "scores"=>1,
            "timeRange"=>"00:55-01:00",
            "text"=>"Do you have any working experience in this field? ",
            "answer"=>"Do you have any working experience in this field",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"13",
            'type'=>"sr_reading",
            "content_id"=>240,
            "scores"=>1,
            "timeRange"=>"01:00-01:08",
            "text"=>"Yes, I used to be a landscape photographer for a magazine in South Africa. ",
            "answer"=>"Yes I used to be a landscape photographer for a magazine in South Africa",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"14",
            'type'=>"text",
            "timeRange"=>"00:50-00:53",
            "text"=>"Have you brought any of your works with you?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"15",
            'type'=>"text",
            "timeRange"=>"00:53-00:55",
            "text"=>"Yes, of course.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"16",
            'type'=>"text",
            "timeRange"=>"00:55-00:57",
            "text"=>"Here you are.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"17",
            'type'=>"text",
            "timeRange"=>"00:57-01:00",
            "text"=>"These photos are terrific.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"18",
            'type'=>"sr_reading",
            "content_id"=>241,
            "scores"=>1,
            "timeRange"=>"01:22-01:26",
            "text"=>"What kind of pay are you expecting? ",
            "answer"=>"What kind of pay are you expecting",
            "picture"=>""
        );

//        $data['events'][] = array(
//            "num"=>"19",
//            'type'=>"sr_reading",
//            "content_id"=>242,
//            "scores"=>1,
//            "timeRange"=>"01:26-01:36",
//            "text"=>"Well, I am thinking about 3000 dollars would be OK.",
//            "answer"=>"Well, I am thinking about 3000 dollars would be OK.",
//            "picture"=>""
//        );

        $data['events'][] = array(
            "num"=>"20",
            'type'=>"text",
            "timeRange"=>"01:03-01:15",
            "text"=>"Well, I am thinking about 3000 dollars would be OK.Plus the usual benefits, such as medical & dental insurance, and travel allowance.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"21",
            'type'=>"text",
            "timeRange"=>"01:15-01:17",
            "text"=>"I see.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"22",
            'type'=>"text",
            "timeRange"=>"01:17-01:22",
            "text"=>"If you get the job, you will have to travel around 200 days a year.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"23",
            'type'=>"text",
            "timeRange"=>"01:22-01:24",
            "text"=>"Would that be ok with you?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"24",
            'type'=>"text",
            "timeRange"=>"01:24-01:26",
            "text"=>"No problem.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"25",
            'type'=>"text",
            "timeRange"=>"01:26-01:27",
            "text"=>"Great!",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"26",
            'type'=>"sr_reading",
            "content_id"=>243,
            "scores"=>1,
            "timeRange"=>"01:57-02:01",
            "text"=>"Do you have any questions to ask?",
            "answer"=>"Do you have any questions to ask",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"27",
            'type'=>"text",
            "timeRange"=>"01:30-01:32",
            "text"=>"Right now, no.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"28",
            'type'=>"sr_reading",
            "content_id"=>244,
            "scores"=>1,
            "timeRange"=>"02:05-02:09",
            "text"=>"But I really hope I can get the job.",
            "answer"=>"But I really hope I can get the job",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"29",
            'type'=>"text",
            "timeRange"=>"01:35-01:42",
            "text"=>"I will finish all the interviews this Friday, and you'll hear from us no later than sometime next week. ",
            "picture"=>""
        );

//        $data['events'][] = array(
//            "num"=>"30",
//            'type'=>"sr_reading",
//            "content_id"=>245,
//            "scores"=>1,
//            "timeRange"=>"02:09-02:18",
//            "text"=>"and you'll hear from us no later than sometime next week. ",
//            "answer"=>"and you will hear from us no later than sometime next week",
//            "picture"=>""
//        );

        $data['events'][] = array(
            "num"=>"31",
            'type'=>"sr_reading",
            "content_id"=>246,
            "scores"=>1,
            "timeRange"=>"02:18-02:22",
            "text"=>"Let me double-check your contact information. ",
            "answer"=>"Let me double check your contact information",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"32",
            'type'=>"text",
            "timeRange"=>"01:45-01:53",
            "text"=>"Your mobile number is 28610037549?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"33",
            'type'=>"text",
            "timeRange"=>"01:53-01:55",
            "text"=>"That's correct!",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"34",
            'type'=>"text",
            "timeRange"=>"01:55-02:00",
            "text"=>"And my email address is AndyS@exmail.com.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"35",
            'type'=>"text",
            "timeRange"=>"02:00-02:01",
            "text"=>"All right.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"36",
            'type'=>"text",
            "timeRange"=>"02:01-02:02",
            "text"=>"Thanks!",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"37",
            'type'=>"text",
            "timeRange"=>"02:02-02:04",
            "text"=>"Thank you too.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"35",
            'type'=>"sr_reading",
            "content_id"=>247,
            "scores"=>1,
            "timeRange"=>"02:50-02:56",
            "text"=>"Thank you for your time, and I look forward to hearing from you soon.",
            "answer"=>"Thank you for your time, and I look forward to hearing from you soon",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"36",
            'type'=>"text",
            "timeRange"=>"02:09-02:11",
            "text"=>"Thanks for coming today.",
            "picture"=>""
        );
        $this->saveEventListToDatabases($data);
        $a =  json_encode($data);
        $fp = fopen('json23.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
       return;
    }

    public function getPart24(){
        $dataT = array(
            "unit_id"       =>2,
            "lesson_id"     =>8,
            "part_id"       =>24,
            "media_filename"=>'media/u2ps.mp3',
            "media_type"    =>'audio',
            "totalTime"     =>"1:34",
            "part_type"     =>"summary",
            "have_questions"=>true,
            "questions_type"=>"sr",
            "keywords"      =>array("careers","computer technician","quit","valuable","work experience",
                "upgraded","launch","popular",
                "investor"
            ),
        );
        $data['events'][] = array(
            "num"=>"1",
            'type'=>"text",
            "timeRange"=>"00:00-00:05",
            "text"=>"Here is a short summary about Jack's careers.",
            "picture"=>"images/u2_ps_000.png"
        );
        $data['events'][] = array(
            "num"=>"2",
            'type'=>"text",
            "timeRange"=>"00:05-00:11",
            "text"=>"Jack first worked as a computer technician for a small company.",
            "picture"=>"images/u2_ps_001.png"
        );
        $data['events'][] = array(
            "num"=>"3",
            'type'=>"text",
            "timeRange"=>"00:11-00:17",
            "text"=>"He gained some valuable work experience from this job.",
            "picture"=>"images/u2_ps_002.png"
        );

        $data['events'][] = array(
            "num"=>"4",
            'type'=>"text",
            "timeRange"=>"00:17-00:21",
            "text"=>"Four years ago he quit his first job.",
            "picture"=>"images/u2_ps_002.png"
        );
        $data['events'][] = array(
            "num"=>"5",
            'type'=>"text",
            "timeRange"=>"00:21-00:25",
            "text"=>"He then started working from home. ",
            "picture"=>"images/u2_ps_002.png"
        );
        $data['events'][] = array(
            "num"=>"6",
            'type'=>"text",
            "timeRange"=>"00:25-00:30",
            "text"=>"He upgraded and built computers.",
            "picture"=>"images/u2_ps_002.png"
        );
        $data['events'][] = array(
            "num"=>"7",
            'type'=>"text",
            "timeRange"=>"00:30-00:35",
            "text"=>"One year later, he launched his own software company. ",
            "picture"=>"images/u2_ps_003.png"
        );
        $data['events'][] = array(
            "num"=>"8",
            'type'=>"text",
            "timeRange"=>"00:35-00:41",
            "text"=>"It had 15 employees and three departments.",
            "picture"=>"images/u2_ps_004.png"
        );
        $data['events'][] = array(
            "num"=>"9",
            'type'=>"text",
            "timeRange"=>"00:41-00:44",
            "text"=>"His products sold well.",
            "picture"=>"images/u2_ps_005.png"
        );
        $data['events'][] = array(
            "num"=>"10",
            'type'=>"text",
            "timeRange"=>"00:44-00:53",
            "text"=>"After that, Jack noticed a big need for web-design, so he set up a new department for web design.",
            "picture"=>"images/u2_ps_006.png"
        );
        $data['events'][] = array(
            "num"=>"11",
            'type'=>"text",
            "timeRange"=>"00:53-00:57",
            "text"=>"It has been very profitable.",
            "picture"=>"images/u2_ps_006.png"
        );
        $data['events'][] = array(
            "num"=>"12",
            'type'=>"text",
            "timeRange"=>"00:57-01:06",
            "text"=>"Recently, as mobile applications have become popular, he set up a new department for this area.",
            "picture"=>"images/u2_ps_007.png"
        );
        $data['events'][] = array(
            "num"=>"13",
            'type'=>"text",
            "timeRange"=>"01:06-01:14",
            "text"=>"In order to expand into overseas markets, he is now looking for partners and investors.",
            "picture"=>"images/u2_ps_008.png"
        );

        $data['events'][] = array(
            "num"=>"1",
            "content_id"=>248,
            'type'=>"sr_readings",
            "timeRange"=>array("00:00-00:06","00:04-00:11","00:09-00:15"),
            "scores"=>1,
            "text"=>array("Here is a short summary about Jack's careers.","Jack first worked as a computer technician for a small company.","He gained some valuable work experience from this job."),
            "answer"=>array("Here is a short summary about Jack's careers","Jack first worked as a computer technician for a small company","He gained some valuable work experience from this job"),
            "picture"=>"images/u2_ps_008.png"
        );
        $data['events'][] = array(
            "num"=>"2",
            "content_id"=>249,
            'type'=>"sr_readings",
            "timeRange"=>array("00:13-00:24","00:21-00:25","00:25-00:32"),
            "scores"=>1,
            "text"=>array("Four years ago he quit his first job.","He then started working from home.","He upgraded and built computers."),
            "answer"=>array("Four years ago he quit his first job","He then started working from home","He upgraded and built computers"),
            "picture"=>"images/u2_ps_008.png"
        );

        $data['events'][] = array(
            "num"=>"3",
            "content_id"=>250,
            'type'=>"sr_readings",
            "timeRange"=>array("00:32-00:38","00:38-00:45","00:45-00:49"),
            "scores"=>1,
            "text"=>array("One year later, he launched his own software company.","It had 15 employees and three departments. ","His products sold well."),
            "answer"=>array("One year later he launched his own software company","It had 15 employees and three departments","His products sold well"),
            "picture"=>"images/u2_ps_003.png",
            "pictures"=>array("images/u2_ps_008.png","images/u2_ps_008.png","images/u2_ps_008.png")
        );

        $data['events'][] = array(
            "num"=>"4",
            "content_id"=>251,
            'type'=>"sr_readings",
            "timeRange"=>array("00:49-00:54","00:54-00:58","00:58-01:02","00:58-01:02"),
            "scores"=>1,
            "text"=>array("After that, Jack noticed a big need for web-design, so he set up a new department for web design.","It has been very profitable.","Recently, as mobile applications have become popular, he set up a new department for this area.","In order to expand into overseas markets, he is now looking for partners and investors."),
            "answer"=>array("After that Jack noticed a big need for web-design so he set up a new department for web design","It has been very profitable","Recently as mobile applications have become popular he set up a new department for this area","In order to expand into overseas markets he is now looking for partners and investors"),
            "pictures"=>array("images/u2_ps_008.png","images/u2_ps_008.png","images/u2_ps_008.png","images/u2_ps_008.png")
        );

        // $dataT['eventLists'] = array($data,$data1);
        $database = array_merge($dataT,$data);
        //$database = array_merge($database,$data1);
        echo json_encode($database) ;
        //exit;
        $this->saveEventListToDatabases($database);

       // $dataT['eventLists'] = array($data,$data1);
        $a =  json_encode($dataT);
        $fp = fopen('json24.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
       return;
    }


    public function getPart25(){
        $data = array(
            "unit_id"       =>2,
            "lesson_id"     =>8,
            "part_id"       =>25,
            "media_filename"=>'media/u2p.mp3',
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
            "content_id"=>252,
            'type'=>"sr_reading",
            "timeRange"=>"00:18-00:26",
            "scores"=>1,
            "text"=>"He started his own business from his house, building & upgrading computers.",
            "answer"=>"He started his own business from his house building and upgrading computers",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2p.mp3',
                    "timeRange"=>"00:18-00:26",
                    "text"=>"He started his own business from his house, building & upgrading computers.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2p.mp3',
                    "timeRange"=>"00:18-00:26",
                    "text"=>"He started his own business from his house, building & upgrading computers.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"2",
            "content_id"=>253,
            'type'=>"sr_reading",
            "timeRange"=>"00:30-00:41",
            "scores"=>1,
            "text"=>"There were three departments in his company, the software development department, the administration department and the sales department.",
            "answer"=>"There were three departments in his company the software development department the administration department and the sales department",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2p.mp3',
                    "timeRange"=>"00:30-00:41",
                    "text"=>"There were three departments in his company, the software development department, the administration department and the sales department.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2p.mp3',
                    "timeRange"=>"00:30-00:41",
                    "text"=>"There were three departments in his company, the software development department, the administration department and the sales department.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"3",
            "content_id"=>254,
            'type'=>"sr_reading",
            "timeRange"=>"00:46-00:53",
            "scores"=>1,
            "text"=>"His company focused on developing financial software and it sold well. ",
            "answer"=>"His company focused on developing financial software and it sold well",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2p.mp3',
                    "timeRange"=>"00:46-00:53",
                    "text"=>"His company focused on developing financial software and it sold well. ",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2p.mp3',
                    "timeRange"=>"00:46-00:53",
                    "text"=>"His company focused on developing financial software and it sold well. ",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"4",
            "content_id"=>255,
            'type'=>"sr_reading",
            "timeRange"=>"01:00-01:07",
            "scores"=>1,
            "text"=>"Every company needed a web presence and was willing to pay to have their company's website made.",
            "answer"=>"Every company needed a web presence and was willing to pay to have their company's website made",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2p.mp3',
                    "timeRange"=>"01:00-01:07",
                    "text"=>"Every company needed a web presence and was willing to pay to have their company's website made.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2p.mp3',
                    "timeRange"=>"01:00-01:07",
                    "text"=>"Every company needed a web presence and was willing to pay to have their company's website made.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"5",
            "content_id"=>256,
            'type'=>"sr_reading",
            "timeRange"=>"01:15-01:25",
            "scores"=>1,
            "text"=>"So, he hired programmers, art designers, and IT technicians to set up a web-design department.",
            "answer"=>"So, he hired programmers art designers and IT technicians to set up a web-design department",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2p.mp3',
                    "timeRange"=>"01:15-01:25",
                    "text"=>"So, he hired programmers, art designers, and IT technicians to set up a web-design department.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2p.mp3',
                    "timeRange"=>"01:15-01:25",
                    "text"=>"So, he hired programmers, art designers, and IT technicians to set up a web-design department.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"6",
            "content_id"=>257,
            'type'=>"sr_reading",
            "timeRange"=>"01:25-01:31",
            "scores"=>1,
            "text"=>"Now, this department has become the most profitable one in his company.  ",
            "answer"=>"Now, this department has become the most profitable one in his company",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2p.mp3',
                    "timeRange"=>"01:25-01:31",
                    "text"=>"Now, this department has become the most profitable one in his company.  ",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2p.mp3',
                    "timeRange"=>"01:25-01:31",
                    "text"=>"Now, this department has become the most profitable one in his company.  ",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"7",
            "content_id"=>258,
            'type'=>"sr_reading",
            "timeRange"=>"01:31-01:38",
            "scores"=>1,
            "text"=>"Right now, his company is focusing on developing mobile applications.",
            "answer"=>"Right now his company is focusing on developing mobile applications",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2p.mp3',
                    "timeRange"=>"01:31-01:38",
                    "text"=>"Right now, his company is focusing on developing mobile applications.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2p.mp3',
                    "timeRange"=>"01:31-01:38",
                    "text"=>"Right now, his company is focusing on developing mobile applications.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"8",
            "content_id"=>259,
            'type'=>"sr_reading",
            "timeRange"=>"01:46-01:54",
            "scores"=>1,
            "text"=>"In order to further expand his company, Jack is now looking for partners and investment. ",
            "answer"=>"In order to further expand his company Jack is now looking for partners and investment",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2p.mp3',
                    "timeRange"=>"01:46-01:54",
                    "text"=>"In order to further expand his company, Jack is now looking for partners and investment. ",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2p.mp3',
                    "timeRange"=>"01:46-01:54",
                    "text"=>"In order to further expand his company, Jack is now looking for partners and investment. ",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"9",
            "content_id"=>260,
            'type'=>"sr_reading",
            "timeRange"=>"01:54-01:59",
            "scores"=>1,
            "text"=>"He also plans to explore overseas markets.",
            "answer"=>"He also plans to explore overseas markets",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2p.mp3',
                    "timeRange"=>"01:54-01:59",
                    "text"=>"He also plans to explore overseas markets.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2p.mp3',
                    "timeRange"=>"01:54-01:59",
                    "text"=>"He also plans to explore overseas markets.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"10",
            "content_id"=>261,
            'type'=>"sr_reading",
            "timeRange"=>"00:04-00:08",
            "scores"=>1,
            "text"=>"The following is the conversation between him and an interviewer.",
            "answer"=>"The following is the conversation between him and an interviewer",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2d.mp3',
                    "timeRange"=>"00:04-00:08",
                    "text"=>"The following is the conversation between him and an interviewer.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2d.mp3',
                    "timeRange"=>"00:04-00:08",
                    "text"=>"The following is the conversation between him and an interviewer.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"11",
            "content_id"=>262,
            'type'=>"sr_reading",
            "timeRange"=>"00:24-00:29",
            "scores"=>1,
            "text"=>"I wonder why you're interested in being a photographer for our magazine?",
            "answer"=>"I wonder why you're interested in being a photographer for our magazine",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2d.mp3',
                    "timeRange"=>"00:24-00:29",
                    "text"=>"I wonder why you're interested in being a photographer for our magazine?",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2d.mp3',
                    "timeRange"=>"00:24-00:29",
                    "text"=>"I wonder why you're interested in being a photographer for our magazine?",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"12",
            "content_id"=>263,
            'type'=>"sr_reading",
            "timeRange"=>"00:29-00:35",
            "scores"=>1,
            "text"=>"Well, I really enjoy being out in nature, especially in the mountains and forests.",
            "answer"=>"Well, I really enjoy being out in nature especially in the mountains and forests",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2d.mp3',
                    "timeRange"=>"00:29-00:35",
                    "text"=>"Well, I really enjoy being out in nature, especially in the mountains and forests.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2d.mp3',
                    "timeRange"=>"00:29-00:35",
                    "text"=>"Well, I really enjoy being out in nature, especially in the mountains and forests.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"13",
            "content_id"=>264,
            'type'=>"sr_reading",
            "timeRange"=>"00:44-00:50",
            "scores"=>1,
            "text"=>"Yes,  I used to be a landscape photographer for a magazine in South Africa.",
            "answer"=>"Yes I used to be a landscape photographer for a magazine in South Africa",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2d.mp3',
                    "timeRange"=>"00:44-00:50",
                    "text"=>"Yes,  I used to be a landscape photographer for a magazine in South Africa.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2d.mp3',
                    "timeRange"=>"00:44-00:50",
                    "text"=>"Yes,  I used to be a landscape photographer for a magazine in South Africa.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"14",
            "content_id"=>265,
            'type'=>"sr_reading",
            "timeRange"=>"01:03-01:15",
            "scores"=>1,
            "text"=>"Well, I am thinking about 3000 dollars would be OK, plus the usual benefits, such as medical & dental insurance, and travel allowance.",
            "answer"=>"Well I am thinking about 3000 dollars would be OK plus the usual benefits such as medical and dental insurance and travel allowance.",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2d.mp3',
                    "timeRange"=>"01:03-01:15",
                    "text"=>"Well, I am thinking about 3000 dollars would be OK, plus the usual benefits, such as medical & dental insurance, and travel allowance.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2d.mp3',
                    "timeRange"=>"01:03-01:15",
                    "text"=>"Well, I am thinking about 3000 dollars would be OK, plus the usual benefits, such as medical & dental insurance, and travel allowance.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"15",
            "content_id"=>266,
            'type'=>"sr_reading",
            "timeRange"=>"01:17-01:22",
            "scores"=>1,
            "text"=>"If you get the job, you will have to travel around 200 days a year.",
            "answer"=>"If you get the job, you will have to travel around 200 days a year",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2d.mp3',
                    "timeRange"=>"01:17-01:22",
                    "text"=>"If you get the job, you will have to travel around 200 days a year.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2d.mp3',
                    "timeRange"=>"01:17-01:22",
                    "text"=>"If you get the job, you will have to travel around 200 days a year.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"16",
            "content_id"=>257,
            'type'=>"sr_reading",
            "timeRange"=>"01:27-01:30",
            "scores"=>1,
            "text"=>"Do you have any questions to ask?",
            "answer"=>"Do you have any questions to ask",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2d.mp3',
                    "timeRange"=>"01:27-01:30",
                    "text"=>"Do you have any questions to ask?",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2d.mp3',
                    "timeRange"=>"01:27-01:30",
                    "text"=>"Do you have any questions to ask?",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"17",
            "content_id"=>258,
            'type'=>"sr_reading",
            "timeRange"=>"01:38-01:42",
            "scores"=>1,
            "text"=>"and you'll hear from us no later than sometime next week.",
            "answer"=>"and you'll hear from us no later than sometime next week.",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2d.mp3',
                    "timeRange"=>"01:38-01:42",
                    "text"=>"and you'll hear from us no later than sometime next week.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2d.mp3',
                    "timeRange"=>"01:38-01:42",
                    "text"=>"and you'll hear from us no later than sometime next week.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"18",
            "content_id"=>259,
            'type'=>"sr_reading",
            "timeRange"=>"01:45-01:53",
            "scores"=>1,
            "text"=>"Your mobile number is 28610037549?",
            "answer"=>"Your mobile number is two eight six one zero zero three seven five four nine",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2d.mp3',
                    "timeRange"=>"01:45-01:53",
                    "text"=>"Your mobile number is 28610037549?",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2d.mp3',
                    "timeRange"=>"01:45-01:53",
                    "text"=>"Your mobile number is 28610037549?",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"19",
            "content_id"=>260,
            'type'=>"sr_reading",
            "timeRange"=>"02:04-02:09",
            "scores"=>1,
            "text"=>"Thank you for your time, and I look forward to hearing from you soon. ",
            "answer"=>"Thank you for your time and I look forward to hearing from you soon",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2d.mp3',
                    "timeRange"=>"02:04-02:09",
                    "text"=>"Thank you for your time, and I look forward to hearing from you soon.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2d.mp3',
                    "timeRange"=>"02:04-02:09",
                    "text"=>"Thank you for your time, and I look forward to hearing from you soon.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"20",
            "content_id"=>261,
            'type'=>"sr_reading",
            "timeRange"=>"02:09-02:11",
            "scores"=>1,
            "text"=>"Thanks for coming today. ",
            "answer"=>"Thanks for coming today",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2d.mp3',
                    "timeRange"=>"02:09-02:11",
                    "text"=>"Thanks for coming today. ",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2d.mp3',
                    "timeRange"=>"02:09-02:11",
                    "text"=>"Thanks for coming today. ",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $this->saveEventListToDatabases($data);
        $a =  json_encode($data);
        $fp = fopen('json25.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
       return;
    }


    public function getPart26(){
        $data = array(
            "unit_id"       =>2,
            "lesson_id"     =>8,
            "part_id"       =>26,
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
            "content_id"=>262,
            "media_filename"=>'media/u2p.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_conjunction_clause",
            "timeRange"     =>"00:00-00:13",
            "scores"=>1,
            "text"=>"Jack used to be a computer technician in a small company, where he got some work experience and learned the basics of how to manage a company.",
            "answer" => "Jack used to be a computer technician in a small company where he got some work experience and learned the basics of how to manage a company",
            "items"=>array("where he got some work experience","Jack used to","and learned the basics of how to manage a company.","be a computer technician in a small company"),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2p.mp3',
                    "timeRange"     =>"00:00-00:13",
                    "text" => "Jack used to be a computer technician in a small company where he got some work experience and learned the basics of how to manage a company",
                ),
                "No"=>array(
                    "media_filename"=>'media/u2p.mp3',
                    "timeRange"     =>"00:00-00:13",
                    "text" => "Jack used to be a computer technician in a small company where he got some work experience and learned the basics of how to manage a company",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"2",
            "content_id"=>263,
            "media_filename"=>'media/u2p.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_conjunction_clause",
            "timeRange"     =>"00:18-00:26",
            "scores"=>1,
            "answer"=>"He started his own business from his house, building and upgrading computers",
            "text" => "He started his own business from his house, building and upgrading computers. ",
            "items"=>array("from his house","building and upgrading computers.","He started","his own business"),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2p.mp3',
                    "timeRange"     =>"00:18-00:26",
                    "text" => "He started his own business from his house, building and upgrading computers. ",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2p.mp3',
                    "timeRange"     =>"00:18-00:26",
                    "text" => "He started his own business from his house, building and upgrading computers. ",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"3",
            "content_id"=>264,
            "media_filename"=>'media/u2p.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_conjunction_clause",
            "timeRange"     =>"00:59-01:07",
            "scores"=>1,
            "answer"=>"Every company needed a web presence and was willing to pay to have their company's website made",
            "text" => "Every company needed a web presence and was willing to pay to have their company's website made.",
            "items"=>array("and was willing to","Every company","needed a web presence","pay to have","their company's site made."),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2p.mp3',
                    "timeRange"     =>"00:59-01:07",
                    "text" => "Every company needed a web presence and was willing to pay to have their company's website made.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2p.mp3',
                    "timeRange"     =>"00:59-01:07",
                    "text" => "Every company needed a web presence and was willing to pay to have their company's website made.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"4",
            "content_id"=>265,
            "media_filename"=>'media/u2p.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_conjunction_clause",
            "timeRange"     =>"01:07-01:15",
            "scores"=>1,
            "answer"=>"When Jack saw this trend he realized that website design could be a profitable business",
            "text" => "When Jack saw this trend he realized that website design could be a profitable business",
            "items"=>array("website design could be","he realized that","a profitable business.","When Jack saw this trend"),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2p.mp3',
                    "timeRange"     =>"01:07-01:15",
                    "text" => "When Jack saw this trend he realized that website design could be a profitable business",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2p.mp3',
                    "timeRange"     =>"01:07-01:15",
                    "text" => "When Jack saw this trend he realized that website design could be a profitable business",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"5",
            "content_id"=>266,
            "media_filename"=>'media/u2p.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_conjunction_clause",
            "timeRange"     =>"01:38-01:46",
            "scores"=>1,
            "answer"=>"These applications are for handheld devices such as mobile phones and tablet PCs",
            "text" => "These applications are for handheld devices, such as mobile phones and tablet PCs.",
            "items"=>array("handheld devices","These applications","such as mobile phones and tablet PCs.","are for"),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2p.mp3',
                    "timeRange"     =>"01:38-01:46",
                    "text" => "These applications are for handheld devices, such as mobile phones and tablet PCs.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2p.mp3',
                    "timeRange"     =>"01:38-01:46",
                    "text" => "These applications are for handheld devices, such as mobile phones and tablet PCs.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"6",
            "content_id"=>267,
            "media_filename"=>'media/u2p.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_conjunction_clause",
            "timeRange"     =>"01:46-01:54",
            "scores"=>1,
            "answer"=>"In order to further expand his company Jack is now looking for partners and investment",
            "text" => "In order to further expand his company, Jack is now looking for partners and investment.",
            "items"=>array("partners and investment.","further expand his company","Jack is now looking for","In order to"),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2p.mp3',
                    "timeRange"     =>"01:46-01:54",
                    "text" => "In order to further expand his company, Jack is now looking for partners and investment.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2p.mp3',
                    "timeRange"     =>"01:46-01:54",
                    "text" => "In order to further expand his company, Jack is now looking for partners and investment.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"7",
            "content_id"=>268,
            "media_filename"=>'media/u2p.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_conjunction_clause",
            "timeRange"     =>"01:59-02:08",
            "scores"=>1,
            "answer"=>"He is going to set up branch offices in Asia and South America because they are markets with the most potential",
            "text" => "He is going to set up branch offices in Asia and South America because they are markets with the most potential.",
            "items"=>array("with the most potential.","He is going to","because they are markets","set up branch offices","in Asia and South America"),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2p.mp3',
                    "timeRange"     =>"01:59-02:08",
                    "text" => "He is going to set up branch offices in Asia and South America because they are markets with the most potential.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2p.mp3',
                    "timeRange"     =>"01:59-02:08",
                    "text" => "He is going to set up branch offices in Asia and South America because they are markets with the most potential.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );


        $data['events'][] = array(
            "num"=>"8",
            "content_id"=>269,
            "media_filename"=>'media/u2d.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_conjunction_clause",
            "timeRange"     =>"00:18-00:24",
            "scores"=>1,
            "answer"=>"From your resume I can see that you have lots of photography experience",
            "text" => "From your resume I can see that you have lots of photography experience.",
            "items"=>array("you have","From your resume","lots of","I can see that","photography experience."),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2d.mp3',
                    "timeRange"     =>"00:18-00:24",
                    "text" => "From your resume I can see that you have lots of photography experience.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2d.mp3',
                    "timeRange"     =>"00:18-00:24",
                    "text" => "From your resume I can see that you have lots of photography experience.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"9",
            "content_id"=>270,
            "media_filename"=>'media/u2d.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_conjunction_clause",
            "timeRange"     =>"01:05-01:15",
            "scores"=>1,
            "answer"=>"I am thinking about 3000 dollars would be OK plus the usual benefits such as medical & dental insurance and travel allowance",
            "text" => "I am thinking about 3000 dollars would be OK, plus the usual benefits, such as medical & dental insurance and travel allowance.",
            "items"=>array("3000 dollars would be OK","I am thinking about"," such as medical & dental insurance","and travel allowance.","plus the usual benefits"),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2d.mp3',
                    "timeRange"     =>"01:05-01:15",
                    "text" => "I am thinking about 3000 dollars would be OK, plus the usual benefits, such as medical & dental insurance and travel allowance.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2d.mp3',
                    "timeRange"     =>"01:05-01:15",
                    "text" => "I am thinking about 3000 dollars would be OK, plus the usual benefits, such as medical & dental insurance and travel allowance.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"10",
            "content_id"=>271,
            "media_filename"=>'media/u2d.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_conjunction_clause",
            "timeRange"     =>"01:17-01:22",
            "scores"=>1,
            "answer"=>"If you get the job you will have to travel around 200 days a year",
            "text" => "If you get the job, you will have to travel around 200 days a year.",
            "items"=>array(" If","you will have to travel"," you get the job","around 200 days a year."),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2d.mp3',
                    "timeRange"     =>"01:17-01:22",
                    "text" => "If you get the job, you will have to travel around 200 days a year.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2d.mp3',
                    "timeRange"     =>"01:17-01:22",
                    "text" => "If you get the job, you will have to travel around 200 days a year.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $this->saveEventListToDatabases($data);
        $a =  json_encode($data);
        $fp = fopen('json26.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
       return;
    }

    public function getPart27(){
        $data = array(
            "unit_id"       =>2,
            "lesson_id"     =>8,
            "part_id"       =>27,
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
            "content_id"=>272,
            "media_filename"=>'media/u2p.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"00:13-00:18",
            "scores"=>1,
            "text" => "Four years ago, he quit that job.",
            "answer" => "Four years ago he quit that job.",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2p.mp3',
                    "timeRange"     =>"00:13-00:18",
                    "text" => "Four years ago, he quit that job.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2p.mp3',
                    "timeRange"     =>"00:13-00:18",
                    "text" => "Four years ago, he quit that job.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"2",
            "content_id"=>273,
            "media_filename"=>'media/u2p.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"00:26-00:30",
            "scores"=>1,
            "text" => "The next year, he registered his company.",
            "answer" => "The next year he registered his company",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2p.mp3',
                    "timeRange"     =>"00:26-00:30",
                    "text" => "The next year, he registered his company.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2p.mp3',
                    "timeRange"     =>"00:26-00:30",
                    "text" => "The next year, he registered his company.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"3",
            "content_id"=>274,
            "media_filename"=>'media/u2p.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"01:41-00:46",
            "scores"=>1,
            "text" => "He had 15 employees.",
            "answer" => "He had 15 employees",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2p.mp3',
                    "timeRange"     =>"01:41-00:46",
                    "text" => "He had 15 employees.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2p.mp3',
                    "timeRange"     =>"01:41-00:46",
                    "text" => "He had 15 employees.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"4",
            "content_id"=>275,
            "media_filename"=>'media/u2p.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"00:53-00:59",
            "scores"=>1,
            "text" => "However,several years later, a new, bigger market appeared.",
            "answer" => "However several years later a new bigger market appeared",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2p.mp3',
                    "timeRange"     =>"00:53-00:59",
                    "text" => "However, several years later, a new, bigger market appeared.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2p.mp3',
                    "timeRange"     =>"00:53-00:59",
                    "text" => "However, several years later, a new, bigger market appeared.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"5",
            "content_id"=>276,
            "media_filename"=>'media/u2p.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"01:25-01:31",
            "scores"=>1,
            "text" => "Now,this department has become the most profitable one in his company.",
            "answer" => "Now this department has become the most profitable one in his company",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2p.mp3',
                    "timeRange"     =>"01:25-01:31",
                    "text" => "Now this department has become the most profitable one in his company",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2p.mp3',
                    "timeRange"     =>"01:25-01:31",
                    "text" => "Now this department has become the most profitable one in his company",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"6",
            "content_id"=>277,
            "media_filename"=>'media/u2p.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"01:31-01:38",
            "scores"=>1,
            "text" => "Right now, his company is focusing on developing mobile applications.",
            "answer" => "Right now his company is focusing on developing mobile applications",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2p.mp3',
                    "timeRange"     =>"01:31-01:38",
                    "text" => "Right now, his company is focusing on developing mobile applications.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2p.mp3',
                    "timeRange"     =>"01:31-01:38",
                    "text" => "Right now, his company is focusing on developing mobile applications.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"7",
            "content_id"=>278,
            "media_filename"=>'media/u2p.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"01:54-01:59",
            "scores"=>1,
            "text" => "He also plans to explore overseas markets.",
            "answer" => "He also plans to explore overseas markets",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2p.mp3',
                    "timeRange"     =>"01:54-01:59",
                    "text" => "He also plans to explore overseas markets.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2p.mp3',
                    "timeRange"     =>"01:54-01:59",
                    "text" => "He also plans to explore overseas markets.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"8",
            "content_id"=>279,
            "media_filename"=>'media/u2d.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"00:11-00:13",
            "scores"=>1,
            "text" => "Please, have a seat. ",
            "answer" => "Please have a seat",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2d.mp3',
                    "timeRange"     =>"00:11-00:13",
                    "text" => "Please, have a seat. ",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2d.mp3',
                    "timeRange"     =>"00:11-00:13",
                    "text" => "Please, have a seat.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"9",
            "content_id"=>280,
            "media_filename"=>'media/u2d.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"00:35-00:39",
            "scores"=>1,
            "text" => "And your magazine is one of the best in this field. ",
            "answer" => "And your magazine is one of the best in this field",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2d.mp3',
                    "timeRange"     =>"00:35-00:39",
                    "text" => "And your magazine is one of the best in this field. ",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2d.mp3',
                    "timeRange"     =>"00:35-00:39",
                    "text" => "And your magazine is one of the best in this field. ",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"10",
            "content_id"=>281,
            "media_filename"=>'media/u2d.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"00:41-00:44",
            "scores"=>1,
            "text" => "Do you have any working experience in this field?",
            "answer" => "Do you have any working experience in this field",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2d.mp3',
                    "timeRange"     =>"00:41-00:44",
                    "text" => "Do you have any working experience in this field?",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2d.mp3',
                    "timeRange"     =>"00:41-00:44",
                    "text" => "Do you have any working experience in this field?",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"11",
            "content_id"=>281,
            "media_filename"=>'media/u2d.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"00:50-00:53",
            "scores"=>1,
            "text" => "Have you brought any of your works with you?",
            "answer" => "Have you brought any of your works with you",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2d.mp3',
                    "timeRange"     =>"00:50-00:53",
                    "text" => "Have you brought any of your works with you?",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2d.mp3',
                    "timeRange"     =>"00:50-00:53",
                    "text" => "Have you brought any of your works with you?",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"12",
            "content_id"=>282,
            "media_filename"=>'media/u2d.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"00:57-01:00",
            "scores"=>1,
            "text" => "These photos are terrific.",
            "answer" => "These photos are terrific",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2d.mp3',
                    "timeRange"     =>"00:57-01:00",
                    "text" => "These photos are terrific.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2d.mp3',
                    "timeRange"     =>"00:57-01:00",
                    "text" => "These photos are terrific.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"13",
            "content_id"=>283,
            "media_filename"=>'media/u2d.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"01:00-01:03",
            "scores"=>1,
            "text" => "What kind of pay are you expecting?",
            "answer" => "What kind of pay are you expecting",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2d.mp3',
                    "timeRange"     =>"01:00-01:03",
                    "text" => "What kind of pay are you expecting?",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2d.mp3',
                    "timeRange"     =>"01:00-01:03",
                    "text" => "What kind of pay are you expecting?",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"14",
            "content_id"=>284,
            "media_filename"=>'media/u2d.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"01:32-01:35",
            "scores"=>1,
            "text" => "But I really hope I can get the job.",
            "answer" => "But I really hope I can get the job",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2d.mp3',
                    "timeRange"     =>"01:32-01:35",
                    "text" => "But I really hope I can get the job.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2d.mp3',
                    "timeRange"     =>"01:32-01:35",
                    "text" => "But I really hope I can get the job.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"15",
            "content_id"=>285,
            "media_filename"=>'media/u2d.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"02:04-02:06",
            "scores"=>1,
            "text" => "Thank you for your time.",
            "answer" => "Thank you for your time",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2d.mp3',
                    "timeRange"     =>"02:04-02:06",
                    "text" => "Thank you for your time.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2d.mp3',
                    "timeRange"     =>"02:04-02:06",
                    "text" => "Thank you for your time.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $this->saveEventListToDatabases($data);
        $a =  json_encode($data);
        $fp = fopen('json27.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
       return;
    }

    public function getPart28(){
        $data = array(
            "unit_id"       =>2,
            "lesson_id"     =>9,
            "part_id"       =>28,
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
            "content_id"=>286,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"00:00-00:06",
            "scores"=>10,
            "text" => "Jack is such a man that always thinks _ of himself than others.",
            "answer" => "Jack is such a man that always thinks much more of himself than others.",
            "items" => array(
                "0"=>array("item"=>"much more","isCorrect"=>true),
                "1"=>array("item"=>"much", "isCorrect"=>false),
                "2"=>array("item"=>"much less", "isCorrect"=>false),
                "3"=>array("item"=>"little", "isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2gfi.mp3',
                    "timeRange"     =>"00:00-00:06",
                    "text"=>"Jack is such a man that always thinks much more of himself than others.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2gfi.mp3',
                    "timeRange"     =>"00:00-00:06",
                    "text"=>"Jack is such a man that always thinks much more of himself than others.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"2",
            "content_id"=>287,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"00:07-00:13",
            "scores"=>10,
            "text" => "The number of people present at the interview was _ than expected.",
            "answer"=>"The number of people present at the interview was much larger than expected",
            "items" => array(
                "0"=>array("item"=>"large","isCorrect"=>false),
                "1"=>array("item"=>"much larger", "isCorrect"=>true),
                "2"=>array("item"=>"much more", "isCorrect"=>false),
                "3"=>array("item"=>"many more","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2gfi.mp3',
                    "timeRange"     =>"00:07-00:13",
                    "text"=>"The number of people present at the interview was much larger than expected.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2gfi.mp3',
                    "timeRange"     =>"00:07-00:13",
                    "text"=>"The number of people present at the interview was much larger than expected.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"3",
            "content_id"=>288,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"00:13-00:21",
            "scores"=>10,
            "text" => "Andy is standing too near the camera. Please tell him to move _ backwards.",
            "answer"=>"Andy is standing too near the camera Please tell him to move a litter farther backwards",
            "items" => array(
                "0"=>array("item"=>"a bit far","isCorrect"=>false),
                "1"=>array("item"=>"a bit of farther", "isCorrect"=>false),
                "2"=>array("item"=>"a little farther", "isCorrect"=>true),
                "3"=>array("item"=>"a little far ","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2gfi.mp3',
                    "timeRange"     =>"00:13-00:21",
                    "text"=>"Andy is standing too near the camera. Please tell him to move a litter farther backwards. ",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2gfi.mp3',
                    "timeRange"     =>"00:13-00:21",
                    "text"=>"Andy is standing too near the camera. Please tell him to move a litter farther backwards. ",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );
        $data['events'][] = array(
            "num"=>"4",
            "content_id"=>289,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"00:21-00:26",
            "scores"=>10,
            "text" => "Andy is _ than his sister, Helen.",
            "answer"=>"Andy is less rich than his sister Helen",
            "items" => array(
                "0"=>array("item"=>"less richer","isCorrect"=>false),
                "1"=>array("item"=>"not rich", "isCorrect"=>false),
                "2"=>array("item"=>"not more rich", "isCorrect"=>false),
                "3"=>array("item"=>"less rich","isCorrect"=>true),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2gfi.mp3',
                    "timeRange"     =>"00:21-00:26",
                    "text"=>"Andy is less rich than his sister, Helen.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2gfi.mp3',
                    "timeRange"     =>"00:21-00:26",
                    "text"=>"Andy is less rich than his sister, Helen.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"5",
            "content_id"=>290,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"00:26-00:30",
            "scores"=>10,
            "text" => "How much _ Jack looked with his hat!",
            "answer"=>"How much better Jack looked with his hat",
            "items" => array(
                "0"=>array("item"=>"good", "isCorrect"=>false),
                "1"=>array("item"=>"better","isCorrect"=>true),
                "2"=>array("item"=>"well", "isCorrect"=>false),
                "3"=>array("item"=>"best","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2gfi.mp3',
                    "timeRange"     =>"00:26-00:30",
                    "text"=>"How much better Jack looked with his hat!",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2gfi.mp3',
                    "timeRange"     =>"00:26-00:30",
                    "text"=>"How much better Jack looked with his hat!",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"6",
            "content_id"=>291,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"00:31-00:39",
            "scores"=>10,
            "text" => "If the interviewer had to choose between the two interviewees, he would say Andy was _ choice.",
            "answer"=>"If the interviewer had to choose between the two interviewees, he would say Andy was the better choice",
            "items" => array(
                "0"=>array("item"=>"the better", "isCorrect"=>true),
                "1"=>array("item"=>"good","isCorrect"=>false),
                "2"=>array("item"=>"the best", "isCorrect"=>false),
                "3"=>array("item"=>"better","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2gfi.mp3',
                    "timeRange"     =>"00:31-00:39",
                    "text"=>"If the interviewer had to choose between the two interviewees, he would say Andy was the better choice.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2gfi.mp3',
                    "timeRange"     =>"00:31-00:39",
                    "text"=>"If the interviewer had to choose between the two interviewees, he would say Andy was the better choice.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );
        $data['events'][] = array(
            "num"=>"7",
            "content_id"=>292,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"00:40-00:45",
            "scores"=>10,
            "text" => "Of all the subjects, Alice likes History _ .",
            "answer"=>"Of all the subjects Alice likes History best",
            "items" => array(
                "0"=>array("item"=>"more", "isCorrect"=>false),
                "1"=>array("item"=>"better","isCorrect"=>false),
                "2"=>array("item"=>"well", "isCorrect"=>false),
                "3"=>array("item"=>"best","isCorrect"=>true),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2gfi.mp3',
                    "timeRange"     =>"00:40-00:45",
                    "text"=>"Of all the subjects, Alice likes History best.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2gfi.mp3',
                    "timeRange"     =>"00:40-00:45",
                    "text"=>"Of all the subjects, Alice likes History best.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"8",
            "content_id"=>293,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"00:45-00:51",
            "scores"=>10,
            "text" => "Michael is one of _ employees in Jack's company.",
            "answer"=>"Michael is one of the most popular employees in Jack's company.",
            "items" => array(
                "0"=>array("item"=>"a popular", "isCorrect"=>false),
                "1"=>array("item"=>"more popular ","isCorrect"=>false),
                "2"=>array("item"=>"the most popular", "isCorrect"=>true),
                "3"=>array("item"=>"most popular","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2gfi.mp3',
                    "timeRange"     =>"00:45-00:51",
                    "text"=>"Michael is one of the most popular employees in Jack's company.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2gfi.mp3',
                    "timeRange"     =>"00:45-00:51",
                    "text"=>"Michael is one of the most popular employees in Jack's company.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"9",
            "content_id"=>294,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"00:51-00:57",
            "scores"=>10,
            "text" => "_ Andy looked at the picture, _ he liked it.",
            "answer"=>"The more Andy looked at the picture  the less he liked it",
            "items" => array(
                "0"=>array("item"=>"The best", "isCorrect"=>false),
                "1"=>array("item"=>"The more", "isCorrect"=>true),
                "2"=>array("item"=>"the less","isCorrect"=>true),
                "3"=>array("item"=>"the worse","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2gfi.mp3',
                    "timeRange"     =>"00:51-00:57",
                    "text"=>"The more Andy looked at the picture, the less he liked it. ",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2gfi.mp3',
                    "timeRange"     =>"00:51-00:57",
                    "text"=>"The more Andy looked at the picture, the less he liked it. ",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );
        $data['events'][] = array(
            "num"=>"10",
            "content_id"=>295,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"00:57-01:04",
            "scores"=>10,
            "text" => "Do you think John is naughty? I'm afraid he's _ than naughty.",
            "answer"=>"Do you think John is naughty? I'm afraid he's more clever than naughty",
            "items" => array(
                "0"=>array("item"=>"more clever", "isCorrect"=>true),
                "1"=>array("item"=>"much clever","isCorrect"=>false),
                "2"=>array("item"=>"clever", "isCorrect"=>false),
                "3"=>array("item"=>" much more clever ","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2gfi.mp3',
                    "timeRange"     =>"00:57-01:04",
                    "text" => "Do you think John is naughty? I'm afraid he's more clever than naughty.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2gfi.mp3',
                    "timeRange"     =>"00:57-01:04",
                    "text" => "Do you think John is naughty? I'm afraid he's more clever than naughty.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );


        $data['events'][] = array(
            "num"=>"11",
            "content_id"=>296,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"01:05-01:12",
            "scores"=>10,
            "text" => "The robber told Helen that she had better keep silent _ she wanted to get into trouble.",
            "answer"=>"The robber told Helen that she had better keep silent unless she wanted to get into trouble.",
            "items" => array(
                "0"=>array("item"=>"if", "isCorrect"=>false),
                "1"=>array("item"=>"unless","isCorrect"=>true),
                "2"=>array("item"=>"otherwise", "isCorrect"=>false),
                "3"=>array("item"=>"whether","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2gfi.mp3',
                    "timeRange"     =>"01:05-01:12",
                    "text" => "The robber told Helen that she had better keep silent unless she wanted to get into trouble.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2gfi.mp3',
                    "timeRange"     =>"01:05-01:12",
                    "text" => "The robber told Helen that she had better keep silent unless she wanted to get into trouble.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"12",
            "content_id"=>297,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"01:12-01:21",
            "scores"=>10,
            "text" => "Helen and William were worried about their son, Harry, because no one was aware _ he had gone. ",
            "answer"=>"Helen and William were worried about their son, Harry, because no one was aware of where he had gone.",
            "items" => array(
                "0"=>array("item"=>"the place", "isCorrect"=>true),
                "1"=>array("item"=>"about the place", "isCorrect"=>false),
                "2"=>array("item"=>"where","isCorrect"=>false),
                "3"=>array("item"=>"of where","isCorrect"=>true),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2gfi.mp3',
                    "timeRange"     =>"01:12-01:21",
                    "text" => "Helen and William were worried about their son, Harry, because no one was aware of where he had gone. ",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2gfi.mp3',
                    "timeRange"     =>"01:12-01:21",
                    "text" => "Helen and William were worried about their son, Harry, because no one was aware of where he had gone. ",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"13",
            "content_id"=>298,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"01:21-01:29",
            "scores"=>10,
            "text" => "When Andy came back from South Africa, he gave Jack a good description of _ there.",
            "answer"=>"When Andy came back from South Africa he gave Jack a good description of what he had seen there.",
            "items" => array(
                "0"=>array("item"=>"what he had seen", "isCorrect"=>true),
                "1"=>array("item"=>"that he had seen", "isCorrect"=>false),
                "2"=>array("item"=>"which he had seen,","isCorrect"=>false),
                "3"=>array("item"=>"he had seen what","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2gfi.mp3',
                    "timeRange"     =>"01:21-01:29",
                    "text"=>"When Andy came back from South Africa, he gave Jack a good description of what he had seen there. ",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2gfi.mp3',
                    "timeRange"     =>"01:21-01:29",
                    "text"=>"When Andy came back from South Africa, he gave Jack a good description of what he had seen there. ",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"14",
            "content_id"=>299,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"01:30-01:37",
            "scores"=>10,
            "text" => "Ellen didn't know why the boy was looking at her _ he knew her. She had never seen him before.",
            "answer"=>"Ellen didn't know why the boy was looking at her as if he knew her. She had never seen him before.",
            "items" => array(
                "0"=>array("item"=>"as", "isCorrect"=>false),
                "1"=>array("item"=>"although","isCorrect"=>false),
                "2"=>array("item"=>"even if", "isCorrect"=>false),
                "3"=>array("item"=>"as if","isCorrect"=>true),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2gfi.mp3',
                    "timeRange"     =>"01:30-01:37",
                    "text"=>"Ellen didn't know why the boy was looking at her as if he knew her. She had never seen him before.  ",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2gfi.mp3',
                    "timeRange"     =>"01:30-01:37",
                    "text"=>"Ellen didn't know why the boy was looking at her as if he knew her. She had never seen him before.  ",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"15",
            "content_id"=>300,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"01:38-01:44",
            "scores"=>10,
            "text" => "No sooner had Jack finished his speech _ thunderous applause broke out.",
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
                    "text"=>"JNo sooner had Jack finished his speech than thunderous applause broke out.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"16",
            "content_id"=>301,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"01:44-01:52",
            "scores"=>10,
            "text" => " _ William was putting on his uniform, Helen found that one of the sleeves was torn.",
            "answer"=>"As William was putting on his uniform, Helen found that one of the sleeves was torn",
            "items" => array(
                "0"=>array("item"=>"As", "isCorrect"=>true),
                "1"=>array("item"=>"Since","isCorrect"=>false),
                "2"=>array("item"=>"Unless", "isCorrect"=>false),
                "3"=>array("item"=>"Before","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2gfi.mp3',
                    "timeRange"     =>"01:44-01:52",
                    "text"=>"As William was putting on his uniform, Helen found that one of the sleeves was torn.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2gfi.mp3',
                    "timeRange"     =>"01:44-01:52",
                    "text"=>"As William was putting on his uniform, Helen found that one of the sleeves was torn.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );
        $data['events'][] = array(
            "num"=>"17",
            "content_id"=>302,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"01:53-02:00",
            "scores"=>10,
            "text" => "Mary's teacher said that _ knows the answer to the question will receive a prize.  ",
            "answer"=>"Mary's teacher said that whoever knows the answer to the question will receive a prize",
            "items" => array(
                "0"=>array("item"=>"those", "isCorrect"=>false),
                "1"=>array("item"=>"whoever","isCorrect"=>true),
                "2"=>array("item"=>"whichever people", "isCorrect"=>false),
                "3"=>array("item"=>"any people","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2gfi.mp3',
                    "timeRange"     =>"01:53-02:00",
                    "text"=>"Mary's teacher said that whoever knows the answer to the question will receive a prize. ",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2gfi.mp3',
                    "timeRange"     =>"01:53-02:00",
                    "text"=>"Mary's teacher said that whoever knows the answer to the question will receive a prize. ",

                ),
            ),
            "picture"=>"images/type_click_001.png"
        );
        $data['events'][] = array(
            "num"=>"18",
            "content_id"=>303,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"02:00-02:08",
            "scores"=>10,
            "text" => "Richard didn't know French, _ made it difficult for him to study at a medical university in France.",
            "answer"=>"Richard didn't know French which made it difficult for him to study at a medical university in France",
            "items" => array(
                "0"=>array("item"=>"that", "isCorrect"=>true),
                "1"=>array("item"=>"as","isCorrect"=>false),
                "2"=>array("item"=>"which", "isCorrect"=>true),
                "3"=>array("item"=>"this","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2gfi.mp3',
                    "timeRange"     =>"02:00-02:08",
                    "text"=>"Richard didn't know French, which made it difficult for him to study at a medical university in France.  ",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2gfi.mp3',
                    "timeRange"     =>"02:00-02:08",
                    "text"=>"Richard didn't know French, which made it difficult for him to study at a medical university in France.  ",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"19",
            "content_id"=>304,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"02:09-02:15",
            "scores"=>10,
            "text" => "The reason why Helen was late was _ her clock's alarm didn't go off. ",
            "answer"=>"The reason why Helen was late was that her clock's alarm didn't go off.",
            "items" => array(
                "0"=>array("item"=>"because", "isCorrect"=>false),
                "1"=>array("item"=>"due to", "isCorrect"=>false),
                "2"=>array("item"=>"since","isCorrect"=>false),
                "3"=>array("item"=>"that","isCorrect"=>true),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2gfi.mp3',
                    "timeRange"     =>"02:09-02:15",
                    "text"=>"The reason why Helen was late was that her clock's alarm didn't go off.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2gfi.mp3',
                    "timeRange"     =>"02:09-02:15",
                    "text"=>"The reason why Helen was late was that her clock's alarm didn't go off.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"20",
            "content_id"=>305,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"02:15-02:24",
            "scores"=>10,
            "text" => "Andy was supposed to be an art major, but he actually took _ courses in physics, if not more.",
            "answer"=>"Andy was supposed to be an art major, but he actually took as many courses in physics, if not more.",
            "items" => array(
                "0"=>array("item"=>"so many", "isCorrect"=>false),
                "1"=>array("item"=>"as many", "isCorrect"=>true),
                "2"=>array("item"=>"a good many","isCorrect"=>false),
                "3"=>array("item"=>"such many","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2gfi.mp3',
                    "timeRange"     =>"02:15-02:24",
                    "text"=>"Andy was supposed to be an art major, but he actually took as many courses in physics, if not more.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2gfi.mp3',
                    "timeRange"     =>"02:15-02:24",
                    "text"=>"Andy was supposed to be an art major, but he actually took as many courses in physics, if not more.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );
        $this->saveEventListToDatabases($data);
        $a =  json_encode($data);
        $fp = fopen('json28.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
       return;
    }


    public function getPart29(){
        $data = array(
            "unit_id"       =>2,
            "lesson_id"     =>9,
            "part_id"       =>29,
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
            "content_id"=>306,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"00:00-00:12",
            "scores"=>1,
            "text" => "Jack believes it is reasonable that the less experienced worker earns less money than the more experienced one.",
            "items" => array(
                "0"=>array("item"=>"the more experienced one."),
                "1"=>array("item"=>"it is reasonable that"),
                "2"=>array("item"=>"the less experienced worker"),
                "3"=>array("item"=>"Jack believes"),
                "4"=>array("item"=>"earns less money than"),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2gso.mp3',
                    "timeRange"     =>"00:00-00:12",
                    "text" => "Jack believes it is reasonable that the less experienced worker earns less money than the more experienced one.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2gso.mp3',
                    "timeRange"     =>"00:00-00:12",
                    "text" => "Jack believes it is reasonable that the less experienced worker earns less money than the more experienced one.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );
        $data['events'][] = array(
            "num"=>"2",
            "content_id"=>307,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"00:12-00:20",
            "scores"=>1,
            "text" => "Winter is the coldest season of the year and during that time the Smiths go on holiday.",
            "items" => array(
                "0"=>array("item"=>"the Smiths go on holiday."),
                "1"=>array("item"=>"Winter is"),
                "2"=>array("item"=>"and during that time"),
                "3"=>array("item"=>"the coldest season of the year"),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2gso.mp3',
                    "timeRange"     =>"00:12-00:20",
                    "text" => "Winter is the coldest season of the year and during that time the Smiths go on holiday.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2gso.mp3',
                    "timeRange"     =>"00:12-00:20",
                    "text" => "Winter is the coldest season of the year and during that time the Smiths go on holiday.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );
        $data['events'][] = array(
            "num"=>"3",
            "content_id"=>308,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"00:20-00:27",
            "scores"=>1,
            "text" => "Alice thinks her teacher should make the exercise simpler.",
            "items" => array(
                "0"=>array("item"=>"make the exercise simpler."),
                "1"=>array("item"=>"Alice thinks"),
                "2"=>array("item"=>"should"),
                "3"=>array("item"=>"her teacher"),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2gso.mp3',
                    "timeRange"     =>"00:20-00:27",
                    "text" => "Alice thinks her teacher should make the exercise simpler.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2gso.mp3',
                    "timeRange"     =>"00:20-00:27",
                    "text" => "Alice thinks her teacher should make the exercise simpler.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );
        $data['events'][] = array(
            "num"=>"4",
            "content_id"=>309,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"00:27-00:32",
            "scores"=>1,
            "text" => "John's room is much brighter than Harry's.",
            "items" => array(
                "0"=>array("item"=>"John's room"),
                "1"=>array("item"=>"than"),
                "2"=>array("item"=>"is much brighter"),
                "3"=>array("item"=>"Harry's.")
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2gso.mp3',
                    "timeRange"     =>"00:27-00:32",
                    "text" => "John's room is much brighter than Harry's.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2gso.mp3',
                    "timeRange"     =>"00:27-00:32",
                    "text" => "John's room is much brighter than Harry's.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );
        $data['events'][] = array(
            "num"=>"5",
            "content_id"=>310,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"00:32-00:39",
            "scores"=>1,
            "text" => "This is one of the most wonderful films Amy has ever seen.",
            "items" => array(
                "0"=>array("item"=>"has ever seen."),
                "1"=>array("item"=>"This is"),
                "2"=>array("item"=>"one of the most wonderful films"),
                "3"=>array("item"=>"Amy"),
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
            "num"=>"6",
            "content_id"=>311,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"00:39-00:46",
            "scores"=>1,
            "text" => "The situation is far more complicated than Jack could imagine.",
            "items" => array(
                "0"=>array("item"=>"The situation"),
                "1"=>array("item"=>"than"),
                "2"=>array("item"=>"is far more complicated"),
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
            "num"=>"7",
            "content_id"=>312,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"00:46-00:53",
            "scores"=>1,
            "text" => " John feels much more relaxed now that the exams are over. ",
            "items" => array(
                "0"=>array("item"=>"much more relaxed"),
                "1"=>array("item"=>"John feels"),
                "2"=>array("item"=>"now that"),
                "3"=>array("item"=>"the exams are over."),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2gso.mp3',
                    "timeRange"     =>"00:46-00:53",
                    "text" => "J John feels much more relaxed now that the exams are over. ",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2gso.mp3',
                    "timeRange"     =>"00:46-00:53",
                    "text" => "J John feels much more relaxed now that the exams are over. ",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"8",
            "content_id"=>313,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"00:53-01:01",
            "scores"=>1,
            "text" => " In Jack's company a general manager is inferior to a president in position.",
            "items" => array(
                "0"=>array("item"=>"a president  in position."),
                "1"=>array("item"=>"is inferior to"),
                "2"=>array("item"=>"a general manager"),
                "3"=>array("item"=>"In Jack's company"),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2gso.mp3',
                    "timeRange"     =>"00:53-01:01",
                    "text" => " In Jack's company a general manager is inferior to a president in position.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2gso.mp3',
                    "timeRange"     =>"00:53-01:01",
                    "text" => " In Jack's company a general manager is inferior to a president in position.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"9",
            "content_id"=>314,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"01:01-01:11",
            "scores"=>1,
            "text" => "The interview was very easy and Andy began to feel more confident about his results.",
            "items" => array(
                "0"=>array("item"=>"about his results."),
                "1"=>array("item"=>"was very easy"),
                "2"=>array("item"=>"more confident"),
                "3"=>array("item"=>"The interview"),
                "4"=>array("item"=>"and Andy began to feel"),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2gso.mp3',
                    "timeRange"     =>"01:01-01:11",
                    "text" => "The interview was very easy and Andy began to feel more confident about his results.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2gso.mp3',
                    "timeRange"     =>"01:01-01:11",
                    "text" => "The interview was very easy and Andy began to feel more confident about his results.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"10",
            "content_id"=>315,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"01:11-01:19",
            "scores"=>1,
            "text" => "Alice gave whoever came to the store a pamphlet in which a company's products were described. ",
            "items" => array(
                "0"=>array("item"=>"a pamphlet"),
                "1"=>array("item"=>"were described."),
                "2"=>array("item"=>"Alice gave"),
                "3"=>array("item"=>"whoever came to the store"),
                "4"=>array("item"=>"in which a company's products"),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2gso.mp3',
                    "timeRange"     =>"01:11-01:19",
                    "text" => "Alice gave whoever came to the store a pamphlet in which a company's products were described. ",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2gso.mp3',
                    "timeRange"     =>"01:11-01:19",
                    "text" => "Alice gave whoever came to the store a pamphlet in which a company's products were described. ",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"11",
            "content_id"=>316,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"01:19-01:27",
            "scores"=>1,
            "text" => "Andy said that he would be punctual for the interview but what if he were late? ",
            "items" => array(
                "0"=>array("item"=>"but what if"),
                "1"=>array("item"=>"he would"),
                "2"=>array("item"=>"be punctual for the interview"),
                "3"=>array("item"=>"he were late?"),
                "4"=>array("item"=>"Andy said that"),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2gso.mp3',
                    "timeRange"     =>"01:19-01:27",
                    "text" => "Andy said that he would be punctual for the interview but what if he were late? ",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2gso.mp3',
                    "timeRange"     =>"01:19-01:27",
                    "text" => "Andy said that he would be punctual for the interview but what if he were late? ",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"12",
            "content_id"=>317,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"01:27-01:36",
            "scores"=>1,
            "text" => "Richard and Ellen will move into a new house next Friday by which time it will be completely furnished. ",
            "items" => array(
                "0"=>array("item"=>"next Friday"),
                "1"=>array("item"=>"Richard and Ellen"),
                "2"=>array("item"=>"by which time"),
                "3"=>array("item"=>"it will be completely furnished."),
                "4"=>array("item"=>" will move into a new house"),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2gso.mp3',
                    "timeRange"     =>"01:27-01:36",
                    "text" => "Richard and Ellen will move into a new house next Friday by which time it will be completely furnished. ",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2gso.mp3',
                    "timeRange"     =>"01:27-01:36",
                    "text" => "Richard and Ellen will move into a new house next Friday by which time it will be completely furnished. ",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"13",
            "content_id"=>318,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"01:36-01:46",
            "scores"=>1,
            "text" => "During the time that Jack was going to college he was also working as a waiter on weekends.",
            "items" => array(
                "0"=>array("item"=>"as a waiter"),
                "1"=>array("item"=>"that Jack was going to college"),
                "2"=>array("item"=>"he was also working"),
                "3"=>array("item"=>"During the time"),
                "4"=>array("item"=>"on weekends."),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2gso.mp3',
                    "timeRange"     =>"01:36-01:46",
                    "text" => "During the time that Jack was going to college he was also working as a waiter on weekends.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2gso.mp3',
                    "timeRange"     =>"01:36-01:46",
                    "text" => "During the time that Jack was going to college he was also working as a waiter on weekends.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"14",
            "content_id"=>319,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"01:46-01:54",
            "scores"=>1,
            "text" => "Alice always takes careful notes in class so that from time to time she may review them.",
            "items" => array(
                "0"=>array("item"=>"from time to time"),
                "1"=>array("item"=>"Alice always takes careful notes"),
                "2"=>array("item"=>"so that"),
                "3"=>array("item"=>"in class"),
                "4"=>array("item"=>"she may review them."),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2gso.mp3',
                    "timeRange"     =>"01:46-01:54",
                    "text" => "Alice always takes careful notes in class so that from time to time she may review them.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2gso.mp3',
                    "timeRange"     =>"01:46-01:54",
                    "text" => "Alice always takes careful notes in class so that from time to time she may review them.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"15",
            "content_id"=>320,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"01:54-02:02",
            "scores"=>1,
            "text" => "Amy explained everything over again lest anyone should misunderstand her. ",
            "items" => array(
                "0"=>array("item"=>"over again"),
                "1"=>array("item"=>"Amy explained everything"),
                "2"=>array("item"=>"anyone should misunderstand her."),
                "3"=>array("item"=>"lest"),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2gso.mp3',
                    "timeRange"     =>"01:54-02:02",
                    "text" => "Amy explained everything over again lest anyone should misunderstand her. ",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2gso.mp3',
                    "timeRange"     =>"01:54-02:02",
                    "text" => "Amy explained everything over again lest anyone should misunderstand her. ",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );
        $this->saveEventListToDatabases($data);

        $a =  json_encode($data);
        $fp = fopen('json29.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
       return;
    }

    public function getPart30(){
        $data = array(
            "unit_id"       =>2,
            "lesson_id"     =>9,
            "part_id"       =>30,
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
            "content_id"=>321,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"sr_ordering",
            "timeRange"     =>"0:00-00:05",
            "scores"=>1,
            "text" => "Andy is better prepared than the others.",
            "answer" => "Andy is better prepared than the others",
            "items" => array(
                "0"=>array("item"=>"is better prepared"),
                "1"=>array("item"=>"than"),
                "2"=>array("item"=>"Andy"),
                "3"=>array("item"=>"the others."),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2gsf.mp3',
                    "timeRange"     =>"0:00-00:05",
                    "text" => "Andy is better prepared than the others.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2gsf.mp3',
                    "timeRange"     =>"0:00-00:05",
                    "text" => "Andy is better prepared than the others.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"2",
            "content_id"=>322,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"sr_ordering",
            "timeRange"     =>"00:05-00:10",
            "scores"=>1,
            "text" => "Amy's car is bigger than the red one.",
            "answer" => "Amy's car is bigger than the red one",
            "items" => array(
                "0"=>array("item"=>"the red one."),
                "1"=>array("item"=>"is bigger"),
                "2"=>array("item"=>"than"),
                "3"=>array("item"=>"Amy's car"),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2gsf.mp3',
                    "timeRange"     =>"00:05-00:10",
                    "text" => "Amy's car is bigger than the red one.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2gsf.mp3',
                    "timeRange"     =>"00:05-00:10",
                    "text" => "Amy's car is bigger than the red one.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"3",
            "content_id"=>323,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"sr_ordering",
            "timeRange"     =>"00:10-00:15",
            "scores"=>1,
            "text" => "The busier Jack is, the happier he feels.",
            "answer" => "The busier Jack is the happier he feels.",
            "items" => array(
                "0"=>array("item"=>"the happier"),
                "1"=>array("item"=>"Jack is"),
                "2"=>array("item"=>"he feels."),
                "3"=>array("item"=>"The busier"),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2gsf.mp3',
                    "timeRange"     =>"00:10-00:15",
                    "text" => "The busier Jack is the happier he feels.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2gsf.mp3',
                    "timeRange"     =>"00:10-00:15",
                    "text" => "The busier Jack is the happier he feels.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"4",
            "content_id"=>324,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"sr_ordering",
            "timeRange"     =>"00:15-00:20",
            "scores"=>1,
            "text" => "Alice works the hardest in her class. ",
            "answer" => "Alice works the hardest in her class",
            "items" => array(
                "0"=>array("item"=>"the hardest"),
                "1"=>array("item"=>"works"),
                "2"=>array("item"=>"in her class."),
                "3"=>array("item"=>"Alice"),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2gsf.mp3',
                    "timeRange"     =>"00:15-00:20",
                    "text" => "Alice works the hardest in her class.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2gsf.mp3',
                    "timeRange"     =>"00:15-00:20",
                    "text" => "Alice works the hardest in her class.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"5",
            "content_id"=>325,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"sr_ordering",
            "timeRange"     =>"00:20-00:26",
            "scores"=>1,
            "text" => "The more people Jack knows the less time he has to see them.",
            "answer" => "The more people Jack knows the less time he has to see them",
            "items" => array(
                "0"=>array("item"=>"to see them."),
                "1"=>array("item"=>"Jack knows"),
                "2"=>array("item"=>"the less time"),
                "3"=>array("item"=>"he has"),
                "4"=>array("item"=>"The more people"),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2gsf.mp3',
                    "timeRange"     =>"00:20-00:26",
                    "text" => "The more people Jack knows the less time he has to see them.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2gsf.mp3',
                    "timeRange"     =>"00:20-00:26",
                    "text" => "The more people Jack knows the less time he has to see them.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"6",
            "content_id"=>326,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"sr_ordering",
            "timeRange"     =>"00:26-00:32",
            "scores"=>1,
            "text" => "Whenever Mary is given anything to eat she saves it for Harry.",
            "answer" => "Whenever Mary is given anything to eat she saves it for Harry",
            "items" => array(
                "0"=>array("item"=>"she saves it"),
                "1"=>array("item"=>"Whenever"),
                "2"=>array("item"=>"Mary is given anything to eat"),
                "3"=>array("item"=>"for Harry."),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2gsf.mp3',
                    "timeRange"     =>"00:26-00:32",
                    "text" => "Whenever Mary is given anything to eat she saves it for Harry.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2gsf.mp3',
                    "timeRange"     =>"00:26-00:32",
                    "text" => "Whenever Mary is given anything to eat she saves it for Harry.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"7",
            "content_id"=>327,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"sr_ordering",
            "timeRange"     =>"00:32-00:38",
            "scores"=>1,
            "text" => "Mary and Harry love cats while others hate them.",
            "answer" => "Mary and Harry love cats while others hate them",
            "items" => array(
                "0"=>array("item"=>"Mary and Harry"),
                "1"=>array("item"=>"others hate them."),
                "2"=>array("item"=>"while"),
                "3"=>array("item"=>"love cats"),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2gsf.mp3',
                    "timeRange"     =>"00:32-00:38",
                    "text" => "Mary and Harry love cats while others hate them.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2gsf.mp3',
                    "timeRange"     =>"00:32-00:38",
                    "text" => "Mary and Harry love cats while others hate them.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"8",
            "content_id"=>328,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"sr_ordering",
            "timeRange"     =>"00:38-00:44",
            "scores"=>1,
            "text" => "Although he is a child, John learned Spanish well.",
            "answer" => "Although he is a child, John learned Spanish well",
            "items" => array(
                "0"=>array("item"=>"a child"),
                "1"=>array("item"=>"learned Spanish well."),
                "2"=>array("item"=>"Although he is"),
                "3"=>array("item"=>"John"),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2gsf.mp3',
                    "timeRange"     =>"00:38-00:44",
                    "text" => "Although he is a child, John learned Spanish well. ",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2gsf.mp3',
                    "timeRange"     =>"00:38-00:44",
                    "text" => "Although he is a child, John learned Spanish well. ",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"9",
            "content_id"=>329,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"sr_ordering",
            "timeRange"     =>"00:44-00:50",
            "scores"=>1,
            "text" => "Hardly had Andy reached the airport when the plane took off.",
            "answer" => "Hardly had Andy reached the airport when the plane took off",
            "items" => array(
                "0"=>array("item"=>"when"),
                "1"=>array("item"=>"reached the airport"),
                "2"=>array("item"=>"Hardly had Andy"),
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
            "num"=>"10",
            "content_id"=>330,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"sr_ordering",
            "timeRange"     =>"00:50-00:56",
            "scores"=>1,
            "text" => "As was expected William performed the task with success.",
            "answer" => "As was expected William performed the task with success",
            "items" => array(
                "0"=>array("item"=>"William"),
                "1"=>array("item"=>"with success."),
                "2"=>array("item"=>"As was expected"),
                "3"=>array("item"=>"performed the task"),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2gsf.mp3',
                    "timeRange"     =>"00:50-00:56",
                    "text" => "As was expected William performed the task with success.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u2gsf.mp3',
                    "timeRange"     =>"00:50-00:56",
                    "text" => "As was expected William performed the task with success.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $this->saveEventListToDatabases($data);
        $a =  json_encode($data);
        $fp = fopen('json30.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
       return;
    }

    //最新MT
    public function getPart31(){
        $data = array(
            "unit_id"       =>2,
            "lesson_id"     =>10,
            "part_id"       =>31,
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
                1=>array(1,3,4,5,6,7),
                2=>array(2,3,4,5,6,8),
                3=>array(1,2,5,7,8)
            ),
            "keywords"   =>array(
            ),
        );

        $data['events'][] = array(
            "num"=>"1",
            "type"=>"MTmultipleChoices",
            "media_type"=>"audio",
            "media_filename"=>'media/u2_mt_read_click.mp3',
            "timeRange"=>"00:00-00:11",
            "content"=>"Jack used to be a computer technician in a small company, where he got some work experience and learned the basics of how to manage a company. ",
            "text"=>"Jack used to be a computer technician in a small company, where he got some work experience and learned the basics of how to manage a company. ",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"1",
                    "content_id"=>331,
                    "type"=>"multipleChoice",
                    "text"=>array("type"=>"text","text"=>"Did Jack gain something from the small company?"),
                    "scores"=>5,
                    "items"=>array(
                        "0"=>array("item"=>"Yes","isCorrect"=>true),
                        "1"=>array("item"=>"No", "isCorrect"=>false),
                        "2"=>array("item"=>"It doesn't mention", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                    ),
                ),
                1=>array(
                    "num"=>"1",
                    "content_id"=>332,
                    "type"=>"multipleChoice",
                    "text"=>array("type"=>"text","text"=>"What did Jack learn from the small company?"),
                    "scores"=>5,
                    "items"=>array(
                        "0"=>array("item"=>"How to be a good computer technician","isCorrect"=>false),
                        "1"=>array("item"=>"Something about managing a company", "isCorrect"=>true),
                        "2"=>array("item"=>"Team spirit", "isCorrect"=>false),
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
            "media_filename"=>'media/u2_mt_read_click.mp3',
            "timeRange"=>"00:11-00:31",
            "content"=>"Four years ago, He quit that job. He started his own business from his house, building & upgrading computers. The next year, he registered his company.     His company focused on developing financial software and it sold well.",
            "text"=>"Four years ago, He quit that job. He started his own business from his house, building & upgrading computers. The next year, he registered his company.     His company focused on developing financial software and it sold well.",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"1",
                    "content_id"=>333,
                    "type"=>"multipleChoice",
                    "text"=>array("type"=>"text","text"=>"Did Jack register his company immediately after he quit the job?"),
                    "scores"=>5,
                    "items"=>array(
                        "0"=>array("item"=>"No","isCorrect"=>true),
                        "1"=>array("item"=>"Yes", "isCorrect"=>false),
                        "2"=>array("item"=>"It doesn't mention", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                    ),
                ),
                1=>array(
                    "num"=>"1",
                    "content_id"=>334,
                    "type"=>"multipleChoice",
                    "text"=>array("type"=>"text","text"=>"Was the financial software developed by his company well received? "),
                    "scores"=>5,
                    "items"=>array(
                        "0"=>array("item"=>"Yes","isCorrect"=>true),
                        "1"=>array("item"=>"No", "isCorrect"=>false),
                        "2"=>array("item"=>"It doesn't mention", "isCorrect"=>false),
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
            "media_filename"=>'media/u2_mt_read_click.mp3',
            "timeRange"=>"00:31-01:05",
            "content"=>"However, several years later, a new, bigger market appeared. Every company needed a web presence and was willing to pay to have their company's site made. When Jack saw this trend, he realized that website design could be a profitable business. So, he hired programmers, art designers, and IT technicians to set up a web-design department. Now, this department has become the most profitable one in his company.",
            "text"=>"However, several years later, a new, bigger market appeared. Every company needed a web presence and was willing to pay to have their company's site made. When Jack saw this trend, he realized that website design could be a profitable business. So, he hired programmers, art designers, and IT technicians to set up a web-design department. Now, this department has become the most profitable one in his company.",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"1",
                    "content_id"=>335,
                    "type"=>"multipleChoice",
                    "text"=>array("type"=>"text","text"=>"Was Jack a smart businessman?"),
                    "scores"=>5,
                    "items"=>array(
                        "0"=>array("item"=>"Yes","isCorrect"=>false),
                        "1"=>array("item"=>"No", "isCorrect"=>true),
                        "2"=>array("item"=>"It doesn't mention", "isCorrect"=>false),
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
            "media_filename"=>'media/u2_mt_read_click.mp3',
            "timeRange"=>"01:05-01:17",
            "content"=>"Right now, his company is focusing on developing mobile applications. These applications are for handheld devices, such as mobile phones and tablet PCs. ",
            "text"=>"Right now, his company is focusing on developing mobile applications. These applications are for handheld devices, such as mobile phones and tablet PCs. ",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"1",
                    "content_id"=>336,
                    "type"=>"multipleChoice",
                    "text"=>array("type"=>"text","text"=>"Which department do you think Jack's company put most of money on?"),
                    "scores"=>5,
                    "items"=>array(
                        "0"=>array("item"=>"Web-design department.","isCorrect"=>false),
                        "1"=>array("item"=>"Software development department.", "isCorrect"=>true),
                        "2"=>array("item"=>"Sales department", "isCorrect"=>false),
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
            "media_filename"=>'media/u2_mt_read_click.mp3',
            "timeRange"=>"01:17-01:24",
            "content"=>"In order to further expand his company, Jack is now looking for partners and investment. ",
            "text"=>"In order to further expand his company, Jack is now looking for partners and investment. ",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"1",
                    "content_id"=>337,
                    "type"=>"multipleChoice",
                    "text"=>array("type"=>"text","text"=>"Why is Jack looking for partners and investment?"),
                    "scores"=>5,
                    "items"=>array(
                        "0"=>array("item"=>"To make friends.","isCorrect"=>false),
                        "1"=>array("item"=>"To get more money.", "isCorrect"=>false),
                        "2"=>array("item"=>"To expand his company.", "isCorrect"=>true),
                    ),
                    "selectEvents"=>array(
                    ),
                )
            ),
            "picture"=>"images/type_listen_001.png"
        );

        $data['events'][] = array(
            "num"=>"6",
            "type"=>"MTmultipleChoices",
            "media_type"=>"audio",
            "media_filename"=>'media/u2_mt_read_click.mp3',
            "timeRange"=>"01:24-01:40",
            "content"=>"I: Good morning, Andy Smith. Please, have a seat.Andy: Good morning. It's great to be here.I: Andy, from your resume I can see that you have lots of photography experience. I wonder why you're interested in being a photographer for our magazine?",
            "text"=>"I: Good morning, Andy Smith. Please, have a seat.Andy: Good morning. It's great to be here.I: Andy, from your resume I can see that you have lots of photography experience. I wonder why you're interested in being a photographer for our magazine?",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"1",
                    "content_id"=>338,
                    "type"=>"multipleChoice",
                    "text"=>array("type"=>"text","text"=>"Was Andy an experienced photographer?"),
                    "scores"=>5,
                    "items"=>array(
                        "0"=>array("item"=>"No","isCorrect"=>false),
                        "1"=>array("item"=>"Yes", "isCorrect"=>true),
                        "2"=>array("item"=>"It doesn't mention", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                    ),
                )
            ),
            "picture"=>"images/type_listen_001.png"
        );


        $data['events'][] = array(
            "num"=>"7",
            "type"=>"MTmultipleChoices",
            "media_type"=>"audio",
            "media_filename"=>'media/u2_mt_read_click.mp3',
            "timeRange"=>"01:40-01:50",
            "content"=>"I: I see. Do you have any working experience in this field?A: Yes, I used to be a landscape photographer for a magazine in South Africa.",
            "text"=>"I: I see. Do you have any working experience in this field?A: Yes, I used to be a landscape photographer for a magazine in South Africa.",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"1",
                    "content_id"=>339,
                    "type"=>"multipleChoice",
                    "text"=>array("type"=>"text","text"=>"What did Andy use to take photos of?"),
                    "scores"=>5,
                    "items"=>array(
                        "0"=>array("item"=>"People","isCorrect"=>false),
                        "1"=>array("item"=>"Clothing", "isCorrect"=>false),
                        "2"=>array("item"=>"Nature", "isCorrect"=>true),
                    ),
                    "selectEvents"=>array(
                    ),
                )
            ),
            "picture"=>"images/type_listen_001.png"
        );

        $data['events'][] = array(
            "num"=>"8",
            "type"=>"MTmultipleChoices",
            "media_type"=>"audio",
            "media_filename"=>'media/u2_mt_read_click.mp3',
            "timeRange"=>"01:50-01:58",
            "content"=>"I: I see. If you get the job, you will have to travel around 200 days a year. Would that be ok with you?A: No problem.",
            "text"=>"I: I see. If you get the job, you will have to travel around 200 days a year. Would that be ok with you?A: No problem.",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"1",
                    "content_id"=>340,
                    "type"=>"multipleChoice",
                    "text"=>array("type"=>"text","text"=>"Is Andy willing to travel most of the year for work?"),
                    "scores"=>5,
                    "items"=>array(
                        "0"=>array("item"=>"Yes","isCorrect"=>false),
                        "1"=>array("item"=>"No", "isCorrect"=>false),
                        "2"=>array("item"=>"It doesn't mention", "isCorrect"=>true),
                    ),
                    "selectEvents"=>array(
                    ),
                )
            ),
            "picture"=>"images/type_listen_001.png"
        );
        $this->saveEventListToDatabases($data);
        $a =  json_encode($data);
        $fp = fopen('json31.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
       return;
    }

    public function getPart32(){
        $data = array(
            "unit_id"       =>2,
            "lesson_id"     =>10,
            "part_id"       =>32,
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
                3=>array(2,4,5,7,10),
            ),
            "keywords"      =>array(
            ),
        );

        $data['events'][] = array(
            "num"=>"1",
            "content_id"=>341,
            "type"=>"MTmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u2_mt_listen_click.mp3',
            "timeRange"=>"00:00-00:10",
            "content"=>"Four years ago, he quit that job. He started his own business from his house, building & upgrading computers.",
            "text"=>array("type"=>"audio","text"=>"Where did Jack start his own business?","media_filename"=>'media/u2pcq.mp3',"timeRange"=>"00:06-00:12"),
            "scores"=>7,
            "items"=>array(
                "0"=>array("item"=>"From his house.","isCorrect"=>true),
                "1"=>array("item"=>"From an apartment.", "isCorrect"=>false),
                "2"=>array("item"=>"From a garage.", "isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_listen_001.png"
        );

        $data['events'][] = array(
            "num"=>"2",
            "content_id"=>342,
            "type"=>"MTmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u2_mt_listen_click.mp3',
            "timeRange"=>"00:10-00:24",
            "content"=>"The next year, he registered his company. There were three departments in his company, the software development department, the administration department and the sales department.",
            "text"=>array("type"=>"audio","text"=>"How many departments were there in Jack's company?","media_filename"=>'media/u2pcq.mp3',"timeRange"=>"00:12-00:18"),
            "scores"=>7,
            "items"=>array(
                "0"=>array("item"=>"2","isCorrect"=>false),
                "1"=>array("item"=>"3", "isCorrect"=>true),
                "2"=>array("item"=>"4", "isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_listen_001.png"
        );

        $data['events'][] = array(
            "num"=>"3",
            "content_id"=>343,
            "type"=>"MTmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u2_mt_listen_click.mp3',
            "timeRange"=>"00:24-00:30",
            "content"=>"His company focused on developing financial software and it sold well.",
            "text"=>array("type"=>"audio","text"=>"What did his company focus on developing?","media_filename"=>'media/u2pcq.mp3',"timeRange"=>"00:22-00:28"),
            "scores"=>7,
            "items"=>array(
                "0"=>array("item"=>"Computer.","isCorrect"=>false),
                "1"=>array("item"=>"Sales.", "isCorrect"=>false),
                "2"=>array("item"=>"Financial software.", "isCorrect"=>true),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_listen_001.png"
        );

        $data['events'][] = array(
            "num"=>"4",
            "content_id"=>344,
            "type"=>"MTmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u2_mt_listen_click.mp3',
            "timeRange"=>"00:30-01:04",
            "content"=>"However, several years later, a new, bigger market appeared. Every company needed a web presence and was willing to pay to have their company's site made. When Jack saw this trend, he realized that website design could be a profitable business. So, he hired programmers, art designers, and IT technicians to set up a web-design department. Now, this department has become the most profitable one in his company. ",
            "text"=>array("type"=>"audio","text"=>"Which department has become the most profitable in his company?","media_filename"=>'media/u2pcq.mp3',"timeRange"=>"00:33-00:39"),
            "scores"=>7,
            "items"=>array(
                "0"=>array("item"=>"Web-design department.","isCorrect"=>true),
                "1"=>array("item"=>"Administration department.", "isCorrect"=>false),
                "2"=>array("item"=>"Software development department.", "isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_listen_001.png"
        );

        $data['events'][] = array(
            "num"=>"5",
            "content_id"=>345,
            "type"=>"MTmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u2_mt_listen_click.mp3',
            "timeRange"=>"01:04-01:10",
            "content"=>"Right now, his company is focusing on developing mobile applications. These applications are for handheld devices, such as mobile phones and tablet PCs.",
            "text"=>array("type"=>"audio","text"=>"What is his company focusing on developing right now?","media_filename"=>'media/u2pcq.mp3',"timeRange"=>"00:48-00:53"),
            "scores"=>7,
            "items"=>array(
                "0"=>array("item"=>"Mobile phones.","isCorrect"=>false),
                "1"=>array("item"=>"Mobile applications.", "isCorrect"=>true),
                "2"=>array("item"=>"Tablet PCs.", "isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_listen_001.png"
        );

        $data['events'][] = array(
            "num"=>"6",
            "content_id"=>346,
            "type"=>"MTmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u2_mt_listen_click.mp3',
            "timeRange"=>"01:10-01:17",
            "content"=>"Right now, his company is focusing on developing mobile applications. These applications are for handheld devices, such as mobile phones and tablet PCs.",
            "text"=>array("type"=>"audio","text"=>"Where are the mobile applications used?","media_filename"=>'media/u2pcq.mp3',"timeRange"=>"00:54-00:59"),
            "scores"=>7,
            "items"=>array(
                "0"=>array("item"=>"Computers.","isCorrect"=>false),
                "1"=>array("item"=>"Telephones.", "isCorrect"=>false),
                "2"=>array("item"=>"Mobile phones and tablet PCs.", "isCorrect"=>true),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_listen_001.png"
        );

        $data['events'][] = array(
            "num"=>"7",
            "content_id"=>347,
            "type"=>"MTmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u2_mt_listen_click.mp3',
            "timeRange"=>"01:17:-01:37",
            "content"=>"In order to further expand his company, Jack is now looking for partners and investment. He also plans to explore overseas markets. He is going to set up branch offices in Asia and South America because they are markets with the most potential.",
            "text"=>array("type"=>"audio","text"=>"Where is he going to set up branch offices?","media_filename"=>'media/u2pcq.mp3',"timeRange"=>"01:06-01:11"),
            "scores"=>7,
            "items"=>array(
                "0"=>array("item"=>"Asia and South America.","isCorrect"=>true),
                "1"=>array("item"=>"Asia and South Africa.", "isCorrect"=>false),
                "2"=>array("item"=>"Asia and Europe.", "isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_listen_001.png"
        );


        $data['events'][] = array(
            "num"=>"8",
            "content_id"=>348,
            "type"=>"MTmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u2_mt_listen_click.mp3',
            "timeRange"=>"01:37-01:47",
            "content"=>"I: I see. Do you have any working experience in this field?A: Yes, I used to be a landscape photographer for a magazine in South Africa.",
            "text"=>array("type"=>"audio","text"=>"What was one of Andy's previous jobs?","media_filename"=>'media/u2dcq.mp3',"timeRange"=>"00:38-00:43"),
            "scores"=>7,
            "items"=>array(
                "0"=>array("item"=>"Fashion photographer .","isCorrect"=>false),
                "1"=>array("item"=>"Landscape photographer.", "isCorrect"=>true),
                "2"=>array("item"=>"Portrait photographer.", "isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_listen_001.png"
        );

        $data['events'][] = array(
            "num"=>"9",
            "content_id"=>349,
            "type"=>"MTmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u2_mt_listen_click.mp3',
            "timeRange"=>"01:47-02:01",
            "content"=>"I: These photos are terrific. What kind of pay are you expecting?A: Well, I am thinking about 3000 dollars would be OK, plus the usual benefits, such as medical & dental insurance, and travel allowance. ",
            "text"=>array("type"=>"audio","text"=>"How much salary does Andy expect?","media_filename"=>'media/u2dcq.mp3',"timeRange"=>"01:13-01:17"),
            "scores"=>7,
            "items"=>array(
                "0"=>array("item"=>"3200.","isCorrect"=>false),
                "1"=>array("item"=>"3500.", "isCorrect"=>false),
                "2"=>array("item"=>"3000.", "isCorrect"=>true),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_listen_001.png"
        );

        $data['events'][] = array(
            "num"=>"10",
            "content_id"=>350,
            "type"=>"MTmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u2_mt_listen_click.mp3',
            "timeRange"=>"02:01-02:09",
            "content"=>"I: I see. If you get the job, you will have to travel around 200 days a year. Would that be ok with you?A: No problem. ",
            "text"=>array("type"=>"audio","text"=>"How many days will Andy have to travel if he gets the job?","media_filename"=>'media/u2dcq.mp3',"timeRange"=>"01:40-01:45"),
            "scores"=>7,
            "items"=>array(
                "0"=>array("item"=>"320 days.","isCorrect"=>false),
                "1"=>array("item"=>"120 days.", "isCorrect"=>false),
                "2"=>array("item"=>"Around 200 days.", "isCorrect"=>true),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_listen_001.png"
        );
        $this->saveEventListToDatabases($data);

        $a =  json_encode($data);
        $fp = fopen('json32.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
       return;
    }

    public function getPart33(){
        $data = array(
            "unit_id"       =>2,
            "lesson_id"     =>10,
            "part_id"       =>33,
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
            "content_id"=>351,
            "type"=>"SRmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u2_mt_listen_speak.mp3',
            "timeRange"=>"00:56-01:05",
            "content"=>"He had 15 employees.His company focused on developing financial software and it sold well.",
            "text"=>array("type"=>"audio","text"=>"How many employees were there in Jack's company?","media_filename"=>'media/u2pcq.mp3',"timeRange"=>"00:38-00:43"),
            "scores"=>4,
            "items"=>array(
                "0"=>array("item"=>"50.","answer"=>"fifty","isCorrect"=>false),
                "1"=>array("item"=>"55.","answer"=>"fifty five", "isCorrect"=>false),
                "2"=>array("item"=>"15.","answer"=>"fifteen", "isCorrect"=>true),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"2",
            "content_id"=>352,
            "type"=>"SRmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u2_mt_listen_speak.mp3',
            "timeRange"=>"00:17-00:24",
            "content"=>"In order to further expand his company, Jack is now looking for partners and investment.",
            "text"=>array("type"=>"audio","text"=>"Why is Jack now looking for partners and investment?","media_filename"=>'media/u2pcq.mp3',"timeRange"=>"01:00-01:05"),
            "scores"=>4,
            "items"=>array(
                "0"=>array("item"=>"To have more people around.","answer"=>"to have more people around","isCorrect"=>false),
                "1"=>array("item"=>"To further expand his company.", "answer"=>"to further expand his company","isCorrect"=>true),
                "2"=>array("item"=>"To catch up with the times.", "answer"=>"to catch up with the times","isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"3",
            "content_id"=>363,
            "type"=>"SRmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u2_mt_listen_speak.mp3',
            "timeRange"=>"00:24-00:43",
            "content"=>"I: Andy, from your resume I can see that you have lots of photography experience. I wonder why you're interested in being a photographer for our magazine?            A: Well, I really enjoy being out in nature, especially in the mountains and forests, and your magazine is one of the best in this field. ",
            "text"=>array("type"=>"audio","text"=>"How many reasons does Andy give for being interested in being a photographer for the magazine??","media_filename"=>'media/u2dcq.mp3',"timeRange"=>"00:11-00:19"),
            "scores"=>4,
            "items"=>array(
                "0"=>array("item"=>"3.","answer"=>"three","isCorrect"=>false),
                "1"=>array("item"=>"2.", "answer"=>"two","isCorrect"=>true),
                "2"=>array("item"=>"4.", "answer"=>"four","isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"4",
            "content_id"=>364,
            "type"=>"SRmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u2_mt_listen_speak.mp3',
            "timeRange"=>"00:43-00:50",
            "content"=>"I: Have you brought any of your works with you? A: Yes,of course. Here you areI:These photos are terrific.",
            "text"=>array("type"=>"audio","text"=>"What does the interviewer think of the Andy's works?","media_filename"=>'media/u2dcq.mp3',"timeRange"=>"01:02-01:07"),
            "scores"=>4,
            "items"=>array(
                "0"=>array("item"=>"OK","answer"=>"ok","isCorrect"=>false),
                "1"=>array("item"=>"Very good","answer"=>"very good", "isCorrect"=>true),
                "2"=>array("item"=>"Satisfying","answer"=>"satisfying", "isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"5",
            "content_id"=>365,
            "type"=>"SRmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u2_mt_listen_speak.mp3',
            "timeRange"=>"00:50-00:56",
            "content"=>"I: I will finish all the interviews this Friday, and you'll hear from us no later than sometime next week. ",
            "text"=>array("type"=>"audio","text"=>"When will Andy know the result of the job interview?","media_filename"=>'media/u2dcq.mp3',"timeRange"=>"02:01-02:06"),
            "scores"=>4,
            "items"=>array(
                "0"=>array("item"=>"Sometime next week.","answer"=>"sometime next week","isCorrect"=>true),
                "1"=>array("item"=>"This Friday.","answer"=>"this Friday", "isCorrect"=>false),
                "2"=>array("item"=>"Next Friday.","answer"=>"next Friday", "isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $this->saveEventListToDatabases($data);
        $a =  json_encode($data);
        $fp = fopen('json33.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
       return;
    }

    public function getPart34(){
        $data = array(
            "unit_id"       =>2,
            "lesson_id"     =>10,
            "part_id"       =>34,
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
            "content_id"=>366,
            "media_filename"=>'media/u2gfi.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"00:26-00:30",
            "scores"=>5,
            "text" => "How much better Jack looked with his hat!",
            "answer" => "How much better Jack looked with his hat",
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"2",
            "content_id"=>367,
            "media_filename"=>'media/u2gfi.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"00:40-00:45",
            "scores"=>5,
            "text" => "Of all the subjects, Alice likes History best.",
            "answer" => "Of all the subjects, Alice likes History best",
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"3",
            "content_id"=>368,
            "media_filename"=>'media/u2gso.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"00:27-00:32",
            "scores"=>5,
            "text" => " John's room is much brighter than Harry's.",
            "answer" => " John's room is much brighter than Harry's",
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"4",
            "content_id"=>369,
            "media_filename"=>'media/u2gso.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"00:46-00:53",
            "scores"=>5,
            "text" => "John feels much more relaxed now that the exams are over.",
            "answer" => "John feels much more relaxed now that the exams are over",
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"5",
            "content_id"=>370,
            "media_filename"=>'media/u2gsf.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"00:32-00:38",
            "scores"=>5,
            "text" => "Mary and Harry love cats while others hate them.",
            "answer" => "Mary and Harry love cats while others hate them",
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"6",
            "content_id"=>371,
            "media_filename"=>'media/u2gsf.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"00:10-00:15",
            "scores"=>5,
            "text" => "The busier Jack is, the happier he feels.",
            "answer" => "The busier Jack is, the happier he feels",
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $this->saveEventListToDatabases($data);

        $a =  json_encode($data);
        $fp = fopen('json34.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
       return;
    }

    public function createJson(){
        for($i=18;$i<=34;$i++){
            $function = "getPart".$i;
            $this->$function();
        }
    }

}
