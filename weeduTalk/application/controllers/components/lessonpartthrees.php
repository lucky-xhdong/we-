<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lessonpartthrees extends CI_Controller {

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
    public function getPart35(){
        $data = array(
            "unit_id"       =>3,
            "lesson_id"     =>13,
            "part_id"       =>35,
            "media_filename"=>'media/u3p.mp3',
            "media_type"    =>'audio',
            "totalTime"     =>"2:08",
            "part_type"     =>"listening",
            "have_questions"=>false,
            "questions_type"=>"text",
            "keywords"      =>array("as a matter of fact","close friend","block","twin","cute",
                "recruit","branch","currently",
                "human resource manager","high salary","go sightseeing","including","colleague","team-mate","celebrate","hardworking",
                "relax", "outdoor activity"
            ),
        );
        $data['events'][] = array(
            "num"=>"2",
            'type'=>"text",
            "timeRange"=>"00:00-00:11",
            "text"=>"Hello, this is Channel We. I'm Miss V. In today's program let's get to know the friends and neighbors of the Smith's family.",
            "media_filename"=>'media/u3p.mp4',
            "media_type"    =>'video',
            "picture"=>"images/u3_p_001.png",
            "pictures"=>array()

        );
        $data['events'][] = array(
            "num"=>"5",
            'type'=>"text",
            "timeRange"=>"00:00-00:04",
            "displayKewords"=>true,
            "text"=>"Leo Black comes from England.",
            "picture"=>"images/u3_p_001.png"
        );
        $data['events'][] = array(
            "num"=>"6",
            'type'=>"text",
            "timeRange"=>"00:04-00:08",
            "text"=>"They both live in New York.",
            "picture"=>"images/u3_p_001.png"
        );
        $data['events'][] = array(
            "num"=>"7",
            'type'=>"text",
            "timeRange"=>"00:08-00:13",
            "text"=>"He lives in the same community as Helen does.",
            "picture"=>"images/u3_p_001.png"
        );
        $data['events'][] = array(
            "num"=>"8",
            'type'=>"text",
            "timeRange"=>"00:13-00:17",
            "text"=>"Leo is Helen's neighbor.",
            "picture"=>"images/u3_p_001.png"
        );
        $data['events'][] = array(
            "num"=>"9",
            'type'=>"text",
            "timeRange"=>"00:17-00:23",
            "text"=>"As a matter of fact, their houses are next to each other.",
            "picture"=>"images/u3_p_002.png"
        );

        $data['events'][] = array(
            "num"=>"10",
            'type'=>"text",
            "timeRange"=>"00:23-00:32",
            "text"=>"They have been close friends ever since Leo moved into this block about 15 years ago.  ",
            "picture"=>"images/u3_p_002.png"
        );

        $data['events'][] = array(
            "num"=>"11",
            'type'=>"text",
            "timeRange"=>"00:32-00:36",
            "text"=>"Leo is married.",
            "picture"=>"images/u3_p_003.png"
        );

        $data['events'][] = array(
            "num"=>"12",
            'type'=>"text",
            "timeRange"=>"00:36-00:41",
            "text"=>"His wife's name is Lily. ",
            "picture"=>"images/u3_p_003.png"
        );

        $data['events'][] = array(
            "num"=>"13",
            'type'=>"text",
            "timeRange"=>"00:41-00:47",
            "text"=>"They have twin daughters who are both 5 years old.",
            "picture"=>"images/u3_p_004.png"
        );

        $data['events'][] = array(
            "num"=>"14",
            'type'=>"text",
            "timeRange"=>"00:47-00:51",
            "text"=>"They are really cute.",
            "picture"=>"images/u3_p_004.png"
        );

        $data['events'][] = array(
            "num"=>"15",
            'type'=>"text",
            "timeRange"=>"00:51-00:59",
            "text"=>"Leo's niece, Elisa, is staying with them during her visit to New York.",
            "picture"=>"images/u3_p_005.png"
        );

        $data['events'][] = array(
            "num"=>"16",
            'type'=>"text",
            "timeRange"=>"00:59-01:06",
            "text"=>"Leo works as an engineer in an international company. ",
            "picture"=>"images/u3_p_006.png"
        );

        $data['events'][] = array(
            "num"=>"17",
            'type'=>"text",
            "timeRange"=>"01:06-01:18",
            "text"=>"Since last year, Leo has been flying around the world to recruit computer technicians for the company's international branches. ",
            "picture"=>"images/u3_p_006.png"
        );

        $data['events'][] = array(
            "num"=>"18",
            'type'=>"text",
            "timeRange"=>"01:18-01:27",
            "text"=>"Lily currently works as a human resource manager in a big automobile company.",
            "picture"=>"images/u3_p_007.png"
        );


        $data['events'][] = array(
            "num"=>"19",
            'type'=>"text",
            "timeRange"=>"01:27-01:34",
            "text"=>"Both of them have high salaries and they really like their jobs.",
            "picture"=>"images/u3_p_008.png"
        );

        $data['events'][] = array(
            "num"=>"20",
            'type'=>"text",
            "timeRange"=>"01:34-01:44",
            "text"=>"Last Christmas the two families went sightseeing together in Europe, including France and Austria. ",
            "picture"=>"images/u3_p_009.png"
        );

        $data['events'][] = array(
            "num"=>"21",
            'type'=>"text",
            "timeRange"=>"01:44-01:50",
            "text"=>"They had a wonderful time and enjoyed traveling together. ",
            "picture"=>"images/u3_p_009.png"
        );

        $data['events'][] = array(
            "num"=>"22",
            'type'=>"text",
            "timeRange"=>"01:50-01:57",
            "text"=>"Alice Austin is Helen's colleague and good friend.",
            "picture"=>"images/u3_p_010.png"
        );

        $data['events'][] = array(
            "num"=>"23",
            'type'=>"text",
            "timeRange"=>"01:57-02:05",
            "text"=>"They were high school classmates and university basketball team-mates. ",
            "picture"=>"images/u3_p_011.png"
        );

        $data['events'][] = array(
            "num"=>"24",
            'type'=>"text",
            "timeRange"=>"02:05-02:15",
            "text"=>"Alice is 1 year younger than Helen, but interestingly, Alice and Helen were born on the same date.",
            "picture"=>"images/u3_p_012.png"
        );

        $data['events'][] = array(
            "num"=>"24",
            'type'=>"text",
            "timeRange"=>"02:15-02:22",
            "text"=>"They used to celebrate their birthday together before Helen got married.",
            "picture"=>"images/u3_p_012.png"
        );

        $data['events'][] = array(
            "num"=>"25",
            'type'=>"text",
            "timeRange"=>"02:22-02:28",
            "text"=>"Alice is a manager in a bank credit department.",
            "picture"=>"images/u3_p_013.png"
        );

        $data['events'][] = array(
            "num"=>"26",
            'type'=>"text",
            "timeRange"=>"02:28-02:35",
            "text"=>"She also has a high salary and enjoys her job.",
            "picture"=>"images/u3_p_013.png"
        );

        $data['events'][] = array(
            "num"=>"27",
            'type'=>"text",
            "timeRange"=>"02:35-02:42",
            "text"=>"Unlike Helen, Alice isn't married and lives by herself. ",
            "picture"=>"images/u3_p_014.png"
        );

        $data['events'][] = array(
            "num"=>"28",
            'type'=>"text",
            "timeRange"=>"02:42-02:48",
            "text"=>"Her parents live in another town 20 miles away.",
            "picture"=>"images/u3_p_014.png"
        );

        $data['events'][] = array(
            "num"=>"29",
            'type'=>"text",
            "timeRange"=>"02:48-02:53",
            "text"=>"Alice is good at her job and hard-working. ",
            "picture"=>"images/u3_p_015.png"
        );

        $data['events'][] = array(
            "num"=>"30",
            'type'=>"text",
            "timeRange"=>"02:53-02:59",
            "text"=>"She often works late at night until 11 o'clock.",
            "picture"=>"images/u3_p_015.png"
        );

        $data['events'][] = array(
            "num"=>"31",
            'type'=>"text",
            "timeRange"=>"02:59-03:07",
            "text"=>"During the weekend, she forgets all about her work and just relaxes.",
            "picture"=>"images/u3_p_016.png"
        );

        $data['events'][] = array(
            "num"=>"32",
            'type'=>"text",
            "timeRange"=>"03:07-03:12",
            "text"=>"She often goes to visit Helen and her family.",
            "picture"=>"images/u3_p_016.png"
        );

        $data['events'][] = array(
            "num"=>"33",
            'type'=>"text",
            "timeRange"=>"03:12-03:17",
            "text"=>"She likes swimming and outdoor activities. ",
            "picture"=>"images/u3_p_016.png"
        );

        $data['events'][] = array(
            "num"=>"34",
            'type'=>"text",
            "timeRange"=>"03:17-03:24",
            "text"=>"Last weekend Helen took Alice to the theatre to see a new movie. ",
            "picture"=>"images/u3_p_017.png"
        );

        $data['events'][] = array(
            "num"=>"35",
            'type'=>"text",
            "timeRange"=>"03:24-03:32",
            "text"=>"Alice is now planning to have a summer picnic for Helen and her family in two weeks.",
            "picture"=>"images/u3_p_018.png"
        );

        $data['events'][] = array(
            "num"=>"36",
            'type'=>"text",
            "timeRange"=>"03:32-03:39",
            "text"=>"She is really looking forward to spending time with Helen and her family.",
            "picture"=>"images/u3_p_018.png"
        );

        $this->saveEventListToDatabases($data);


        $a =  json_encode($data);
        $fp = fopen('json35.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
        return;

    }

    public function getPart36(){

        $data = array(
            "unit_id"       =>3,
            "lesson_id"     =>13,
            "part_id"       =>36,
            "media_filename"=>'media/u3p.mp3',
            "media_type"    =>'audio',
            "totalTime"     =>"2:08",
            "part_type"     =>"listening",
            "have_questions"=>false,
            "questions_type"=>"text",
            "keywords"      =>array("as a matter of fact","close friend","block","twin","cute",
                "recruit","branch","currently",
                "human resource manager","high salary","go sightseeing","including","colleague","team-mate","celebrate","hardworking",
                "relax", "outdoor activity"
            ),
        );
        $data['events'][] = array(
            "num"=>"2",
            'type'=>"text",
            "timeRange"=>"00:00-00:11",
            "text"=>"Hello, this is Channel We. I'm Miss V. In today's program let's get to know the friends and neighbors of the Smith's family.",
            "media_filename"=>'media/u3p.mp4',
            "media_type"    =>'video',
            "picture"=>"images/u3_p_001.png",
            "pictures"=>array()

        );
        $data['events'][] = array(
            "num"=>"5",
            'type'=>"text",
            "timeRange"=>"00:00-00:04",
            "displayKewords"=>true,
            "text"=>"Leo Black comes from England.",
            "picture"=>"images/u3_p_001.png"
        );
        $data['events'][] = array(
            "num"=>"6",
            'type'=>"text",
            "timeRange"=>"00:04-00:08",
            "text"=>"They both live in New York.",
            "picture"=>"images/u3_p_001.png"
        );
        $data['events'][] = array(
            "num"=>"7",
            'type'=>"text",
            "timeRange"=>"00:08-00:13",
            "text"=>"He lives in the same community as Helen does.",
            "picture"=>"images/u3_p_001.png"
        );
        $data['events'][] = array(
            "num"=>"8",
            'type'=>"text",
            "timeRange"=>"00:13-00:17",
            "text"=>"Leo is Helen's neighbor.",
            "picture"=>"images/u3_p_001.png"
        );
        $data['events'][] = array(
            "num"=>"9",
            'type'=>"text",
            "timeRange"=>"00:17-00:23",
            "text"=>"As a matter of fact, their houses are next to each other.",
            "picture"=>"images/u3_p_002.png"
        );

        $data['events'][] = array(
            "num"=>"10",
            'type'=>"text",
            "timeRange"=>"00:23-00:32",
            "text"=>"They have been close friends ever since Leo moved into this block about 15 years ago.  ",
            "picture"=>"images/u3_p_002.png"
        );

        $data['events'][] = array(
            "num"=>"11",
            'type'=>"multipleChoices",
            "timeRange"=>"",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"34",
                    "content_id"=>372,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3pcq.mp3',
                    "timeRange"=>"00:00-00:04",
                    "text"=>"Where is Leo living?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"England.","isCorrect"=>false),
                        "1"=>array("item"=>"London.", "isCorrect"=>false),
                        "2"=>array("item"=>"New York.", "isCorrect"=>true),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u3p.mp3',
                            "timeRange"=>"00:00-00:08",
                            "text"=>"Leo Black comes from England. They both live in New York."
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u3p.mp3',
                            "timeRange"=>"00:00-00:08",
                            "text"=>"Leo Black comes from England. They both live in New York."
                        ),
                    ),
                ),

                1=>array(
                    "num"=>"12",
                    "content_id"=>373,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3pcq.mp3',
                    "timeRange"=>"00:04-00:08",
                    "text"=>"Do they live far away from each other?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Yes.","isCorrect"=>false),
                        "1"=>array("item"=>"No.", "isCorrect"=>true),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u3pcq.mp3',
                            "timeRange"=>"00:09-00:15",
                            "text"=>"They live in the same block so they are close to each other.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u3pcq.mp3',
                            "timeRange"=>"00:09-00:15",
                            "text"=>"They live in the same block so they are close to each other.",
                        ),
                    ),
                ),
                2=>array(
                    "num"=>"13",
                    "content_id"=>374,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3pcq.mp3',
                    "timeRange"=>"00:15-00:20",
                    "text"=>"How many years have they known each other?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"15 years.","isCorrect"=>true),
                        "1"=>array("item"=>"50 years.", "isCorrect"=>false),
                        "2"=>array("item"=>"14 years.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u3p.mp3',
                            "timeRange"=>"00:23-00:32",
                            "text"=>"They have been close friends ever since Leo moved into this block about 15 years ago.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u3p.mp3',
                            "timeRange"=>"00:23-00:32",
                            "text"=>"They have been close friends ever since Leo moved into this block about 15 years ago.",
                        ),
                    )
                )
            )
        );

        $data['events'][] = array(
            "num"=>"14",
            'type'=>"text",
            "timeRange"=>"00:32-00:36",
            "text"=>"Leo is married.",
            "picture"=>"images/u3_p_003.png"
        );

        $data['events'][] = array(
            "num"=>"15",
            'type'=>"text",
            "timeRange"=>"00:36-00:41",
            "text"=>"His wife's name is Lily. ",
            "picture"=>"images/u3_p_003.png"
        );

        $data['events'][] = array(
            "num"=>"16",
            'type'=>"text",
            "timeRange"=>"00:41-00:47",
            "text"=>"They have twin daughters who are both 5 years old.",
            "picture"=>"images/u3_p_004.png"
        );

        $data['events'][] = array(
            "num"=>"17",
            'type'=>"text",
            "timeRange"=>"00:47-00:51",
            "text"=>"They are really cute.",
            "picture"=>"images/u3_p_004.png"
        );

        $data['events'][] = array(
            "num"=>"18",
            'type'=>"text",
            "timeRange"=>"00:51-00:59",
            "text"=>"Leo's niece, Elisa, is staying with them during her visit to New York.",
            "picture"=>"images/u3_p_005.png"
        );

        $data['events'][] = array(
            "num"=>"19",
            'type'=>"multipleChoices",
            "timeRange"=>"",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"20",
                    "content_id"=>375,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3pcq.mp3',
                    "timeRange"=>"00:20-00:25",
                    "text"=>"Where will Elisa stay during her visit to New York?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"In her friend's house.","isCorrect"=>false),
                        "1"=>array("item"=>"In a hotel near Leo's house.", "isCorrect"=>false),
                        "2"=>array("item"=>"In Leo's house.", "isCorrect"=>true),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u3p.mp3',
                            "timeRange"=>"00:51-00:59",
                            "text"=>"Leo's niece, Elisa, is staying with them during her visit to New York."
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u3p.mp3',
                            "timeRange"=>"00:51-00:59",
                            "text"=>"Leo's niece, Elisa, is staying with them during her visit to New York."
                        ),
                    ),
                )
            )
        );

        $data['events'][] = array(
            "num"=>"21",
            'type'=>"text",
            "timeRange"=>"00:59-01:06",
            "text"=>"Leo works as an engineer in an international company. ",
            "picture"=>"images/u3_p_006.png"
        );

        $data['events'][] = array(
            "num"=>"22",
            'type'=>"text",
            "timeRange"=>"01:06-01:18",
            "text"=>"Since last year, Leo has been flying around the world to recruit computer technicians for the company's international branches. ",
            "picture"=>"images/u3_p_006.png"
        );

        $data['events'][] = array(
            "num"=>"23",
            'type'=>"text",
            "timeRange"=>"01:18-01:27",
            "text"=>"Lily currently works as a human resource manager in a big automobile company.",
            "picture"=>"images/u3_p_007.png"
        );

        $data['events'][] = array(
            "num"=>"24",
            'type'=>"multipleChoices",
            "timeRange"=>"",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"25",
                    "content_id"=>376,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3pcq.mp3',
                    "timeRange"=>"00:26-00:30",
                    "text"=>"What does Leo do?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"He is an engineer.","isCorrect"=>true),
                        "1"=>array("item"=>"He is a human resource manager.", "isCorrect"=>false),
                        "2"=>array("item"=>"He is a boss of an international company.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u3p.mp3',
                            "timeRange"=>"00:59-01:06",
                            "text"=>"Leo works as an engineer in an international company."
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u3p.mp3',
                            "timeRange"=>"00:59-01:06",
                            "text"=>"Leo works as an engineer in an international company."
                        ),
                    ),
                ),

                1=>array(
                    "num"=>"26",
                    "content_id"=>377,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3pcq.mp3',
                    "timeRange"=>"00:30-00:35",
                    "text"=>"Why did Leo fly around the world last year?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"To give speech to technicians.","isCorrect"=>false),
                        "1"=>array("item"=>"To find good computer technicians for the company.", "isCorrect"=>true),
                        "2"=>array("item"=>"To travel for fun.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u3p.mp3',
                            "timeRange"=>"01:06-01:18",
                            "text"=>"Since last year, Leo has been flying around the world to recruit computer technicians for the company's international branches.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u3p.mp3',
                            "timeRange"=>"01:06-01:18",
                            "text"=>"Since last year, Leo has been flying around the world to recruit computer technicians for the company's international branches.",
                        ),
                    ),
                ),
                2=>array(
                    "num"=>"27",
                    "content_id"=>378,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3pcq.mp3',
                    "timeRange"=>"00:36-00:42",
                    "text"=>"Does Leo's company have offices outside the United States?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Yes.","isCorrect"=>true),
                        "1"=>array("item"=>"No.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u3pcq.mp3',
                            "timeRange"=>"00:43-00:51",
                            "text"=>"His company is an international company with branches all over the world.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u3pcq.mp3',
                            "timeRange"=>"00:43-00:51",
                            "text"=>"His company is an international company with branches all over the world.",
                        ),
                    )
                )
            )
        );

        $data['events'][] = array(
            "num"=>"28",
            'type'=>"text",
            "timeRange"=>"01:27-01:34",
            "text"=>"Both of them have high salaries and they really like their jobs.",
            "picture"=>"images/u3_p_008.png"
        );

        $data['events'][] = array(
            "num"=>"29",
            'type'=>"text",
            "timeRange"=>"01:34-01:44",
            "text"=>"Last Christmas the two families went sightseeing together in Europe, including France and Austria. ",
            "picture"=>"images/u3_p_009.png"
        );

        $data['events'][] = array(
            "num"=>"30",
            'type'=>"text",
            "timeRange"=>"01:44-01:50",
            "text"=>"They had a wonderful time and enjoyed traveling together. ",
            "picture"=>"images/u3_p_009.png"
        );

        $data['events'][] = array(
            "num"=>"31",
            'type'=>"text",
            "timeRange"=>"01:50-01:57",
            "text"=>"Alice Austin is Helen's colleague and good friend.",
            "picture"=>"images/u3_p_010.png"
        );

        $data['events'][] = array(
            "num"=>"32",
            'type'=>"text",
            "timeRange"=>"01:57-02:05",
            "text"=>"They were high school classmates and university basketball team-mates. ",
            "picture"=>"images/u3_p_011.png"
        );

        $data['events'][] = array(
            "num"=>"33",
            'type'=>"multipleChoices",
            "timeRange"=>"",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"34",
                    "content_id"=>379,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3pcq.mp3',
                    "timeRange"=>"00:51-00:55",
                    "text"=>"Do the two families have a good relationship?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Yes.","isCorrect"=>true),
                        "1"=>array("item"=>"No.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u3pcq.mp3',
                            "timeRange"=>"00:56-01:04",
                            "text"=>"The two families have a good relationship and went sightseeing together in Europe."
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u3pcq.mp3',
                            "timeRange"=>"00:56-01:04",
                            "text"=>"The two families have a good relationship and went sightseeing together in Europe."
                        ),
                    ),
                ),

                1=>array(
                    "num"=>"35",
                    "content_id"=>380,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3pcq.mp3',
                    "timeRange"=>"01:04-01:11",
                    "text"=>"Were Alice and Helen in the same basketball team at university?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Yes.","isCorrect"=>true),
                        "1"=>array("item"=>"No.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u3p.mp3',
                            "timeRange"=>"01:57-02:05",
                            "text"=>"They were high school classmates and university basketball team-mates.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u3p.mp3',
                            "timeRange"=>"01:57-02:05",
                            "text"=>"They were high school classmates and university basketball team-mates.",
                        ),
                    ),
                ),
                2=>array(
                    "num"=>"36",
                    "content_id"=>381,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3pcq.mp3',
                    "timeRange"=>"01:12-01:16",
                    "text"=>"Do Alice and Helen work together?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Yes.","isCorrect"=>true),
                        "1"=>array("item"=>"No.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u3p.mp3',
                            "timeRange"=>"01:50-01:57",
                            "text"=>"Alice Austin is Helen's colleague and good friend.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u3p.mp3',
                            "timeRange"=>"01:50-01:57",
                            "text"=>"Alice Austin is Helen's colleague and good friend.",
                        ),
                    )
                )
            )
        );

        $data['events'][] = array(
            "num"=>"37",
            'type'=>"text",
            "timeRange"=>"02:05-02:15",
            "text"=>"Alice is 1 year younger than Helen, but interestingly, Alice and Helen were born on the same date.",
            "picture"=>"images/u3_p_012.png"
        );

        $data['events'][] = array(
            "num"=>"38",
            'type'=>"text",
            "timeRange"=>"02:15-02:22",
            "text"=>"They used to celebrate their birthday together before Helen got married.",
            "picture"=>"images/u3_p_012.png"
        );

        $data['events'][] = array(
            "num"=>"39",
            'type'=>"multipleChoices",
            "timeRange"=>"",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"40",
                    "content_id"=>382,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3pcq.mp3',
                    "timeRange"=>"01:17-01:22",
                    "text"=>"Who is older, Alice or Helen?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Alice.","isCorrect"=>false),
                        "1"=>array("item"=>"Helen.","isCorrect"=>true),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u3p.mp3',
                            "timeRange"=>"03:39-03:43",
                            "text"=>"Alice is 1 year younger than Helen."
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u3p.mp3',
                            "timeRange"=>"03:39-03:43",
                            "text"=>"Alice is 1 year younger than Helen."
                        ),
                    ),
                ),
                1=>array(
                    "num"=>"41",
                    "content_id"=>383,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3pcq.mp3',
                    "timeRange"=>"01:23-01:27",
                    "text"=>"what did they used to do together?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Work.","isCorrect"=>false),
                        "1"=>array("item"=>"Go to class.", "isCorrect"=>false),
                        "2"=>array("item"=>"Celebrate birthday.", "isCorrect"=>true),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u3p.mp3',
                            "timeRange"=>"02:15-02:22",
                            "text"=>"They used to celebrate their birthday together before Helen was married.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u3p.mp3',
                            "timeRange"=>"02:15-02:22",
                            "text"=>"They used to celebrate their birthday together before Helen was married.",
                        ),
                    ),
                )
            )
        );

        $data['events'][] = array(
            "num"=>"42",
            'type'=>"text",
            "timeRange"=>"02:22-02:28",
            "text"=>"Alice is a manager in a bank credit department.",
            "picture"=>"images/u3_p_013.png"
        );

        $data['events'][] = array(
            "num"=>"43",
            'type'=>"text",
            "timeRange"=>"02:28-02:35",
            "text"=>"She also has a high salary and enjoys her job.",
            "picture"=>"images/u3_p_013.png"
        );

        $data['events'][] = array(
            "num"=>"27",
            'type'=>"text",
            "timeRange"=>"02:35-02:42",
            "text"=>"Unlike Helen, Alice isn't married and lives by herself. ",
            "picture"=>"images/u3_p_014.png"
        );

        $data['events'][] = array(
            "num"=>"44",
            'type'=>"text",
            "timeRange"=>"02:42-02:48",
            "text"=>"Her parents live in another town 20 miles away.",
            "picture"=>"images/u3_p_014.png"
        );

        $data['events'][] = array(
            "num"=>"45",
            'type'=>"text",
            "timeRange"=>"02:48-02:53",
            "text"=>"Alice is good at her job and hard-working. ",
            "picture"=>"images/u3_p_015.png"
        );

        $data['events'][] = array(
            "num"=>"46",
            'type'=>"text",
            "timeRange"=>"02:53-02:59",
            "text"=>"She often works late at night until 11 o'clock.",
            "picture"=>"images/u3_p_015.png"
        );

        $data['events'][] = array(
            "num"=>"47",
            'type'=>"text",
            "timeRange"=>"02:59-03:07",
            "text"=>"During the weekend, she forgets all about her work and just relaxes.",
            "picture"=>"images/u3_p_016.png"
        );

        $data['events'][] = array(
            "num"=>"48",
            'type'=>"multipleChoices",
            "timeRange"=>"",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"49",
                    "content_id"=>384,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3pcq.mp3',
                    "timeRange"=>"01:27-01:30",
                    "text"=>"Is Alice single?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Yes.","isCorrect"=>true),
                        "1"=>array("item"=>"No.", "isCorrect"=>false),
                        "2"=>array("item"=>"It's not mentioned.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u3p.mp3',
                            "timeRange"=>"02:35-02:42",
                            "text"=>"Unlike Helen, Alice isn't married and lives by herself."
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u3p.mp3',
                            "timeRange"=>"02:35-02:42",
                            "text"=>"Unlike Helen, Alice isn't married and lives by herself."
                        ),
                    ),
                ),

                1=>array(
                    "num"=>"50",
                    "content_id"=>385,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3pcq.mp3',
                    "timeRange"=>"01:31-01:35",
                    "text"=>"Does Alice live with her parents?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Yes.","isCorrect"=>false),
                        "1"=>array("item"=>"No.", "isCorrect"=>true),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u3p.mp3',
                            "timeRange"=>"02:35-02:48",
                            "text"=>"Unlike Helen, Alice isn't married and lives by herself. Her parents live in another town 20 miles away.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u3p.mp3',
                            "timeRange"=>"02:35-02:48",
                            "text"=>"Unlike Helen, Alice isn't married and lives by herself. Her parents live in another town 20 miles away.",
                        ),
                    ),
                ),
                2=>array(
                    "num"=>"51",
                    "content_id"=>386,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3pcq.mp3',
                    "timeRange"=>"01:35-01:39",
                    "text"=>"Does she work on weekends?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Yes.","isCorrect"=>false),
                        "1"=>array("item"=>"No.", "isCorrect"=>true),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u3p.mp3',
                            "timeRange"=>"02:59-03:07",
                            "text"=>"During the weekend, she forgets all about her work and just relaxes.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u3p.mp3',
                            "timeRange"=>"02:59-03:07",
                            "text"=>"During the weekend, she forgets all about her work and just relaxes.",
                        ),
                    )
                ),
                3=>array(
                    "num"=>"52",
                    "content_id"=>387,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3pcq.mp3',
                    "timeRange"=>"01:39-01:42",
                    "text"=>"What does she do on weekends?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Work hard.","isCorrect"=>false),
                        "1"=>array("item"=>"Enjoy her leisure time.", "isCorrect"=>true),
                        "2"=>array("item"=>"Think about work while relaxing.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u3p.mp3',
                            "timeRange"=>"02:59-03:07",
                            "text"=>"During the weekend, she forgets all about her work and just relaxes.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u3p.mp3',
                            "timeRange"=>"02:59-03:07",
                            "text"=>"During the weekend, she forgets all about her work and just relaxes.",
                        ),
                    )
                )
            )
        );

        $data['events'][] = array(
            "num"=>"53",
            'type'=>"text",
            "timeRange"=>"03:07-03:12",
            "text"=>"She often goes to visit Helen and her family.",
            "picture"=>"images/u3_p_016.png"
        );

        $data['events'][] = array(
            "num"=>"54",
            'type'=>"text",
            "timeRange"=>"03:12-03:17",
            "text"=>"She likes swimming and outdoor activities. ",
            "picture"=>"images/u3_p_016.png"
        );

        $data['events'][] = array(
            "num"=>"55",
            'type'=>"text",
            "timeRange"=>"03:17-03:24",
            "text"=>"Last weekend Helen took Alice to the theatre to see a new movie. ",
            "picture"=>"images/u3_p_017.png"
        );

        $data['events'][] = array(
            "num"=>"56",
            'type'=>"text",
            "timeRange"=>"03:24-03:32",
            "text"=>"Alice is now planning to have a summer picnic for Helen and her family in two weeks.",
            "picture"=>"images/u3_p_018.png"
        );

        $data['events'][] = array(
            "num"=>"57",
            'type'=>"text",
            "timeRange"=>"03:32-03:39",
            "text"=>"She is really looking forward to spending time with Helen and her family.",
            "picture"=>"images/u3_p_018.png"
        );

        $data['events'][] = array(
            "num"=>"58",
            'type'=>"multipleChoices",
            "timeRange"=>"",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"59",
                    "content_id"=>388,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3pcq.mp3',
                    "timeRange"=>"01:43-01:48",
                    "text"=>"Did they have a good time last weekend?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Yes.","isCorrect"=>true),
                        "1"=>array("item"=>"No.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u3pcq.mp3',
                            "timeRange"=>"01:48-01:56",
                            "text"=>"They went to see a new movie last weekend and had a good time together."
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u3pcq.mp3',
                            "timeRange"=>"01:48-01:56",
                            "text"=>"They went to see a new movie last weekend and had a good time together."
                        ),
                    ),
                ),

                1=>array(
                    "num"=>"60",
                    "content_id"=>389,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3pcq.mp3',
                    "timeRange"=>"01:56-02:01",
                    "text"=>"What is Alice planning to do in two weeks?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"To travel with Helen's family.","isCorrect"=>false),
                        "1"=>array("item"=>"To see a movie.", "isCorrect"=>false),
                        "2"=>array("item"=>"To have a summer picnic.", "isCorrect"=>true),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u3p.mp3',
                            "timeRange"=>"03:24-03:32",
                            "text"=>"Alice is now planning to have a summer picnic for Helen and her family in two weeks.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u3p.mp3',
                            "timeRange"=>"03:24-03:32",
                            "text"=>"Alice is now planning to have a summer picnic for Helen and her family in two weeks.",
                        ),
                    ),
                )
            )
        );
        $this->saveEventListToDatabases($data);
        $a =  json_encode($data);
        $fp = fopen('json36.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
        return;



    }


    public function getPart37(){

        $data = array(
            "unit_id"       =>3,
            "lesson_id"     =>13,
            "part_id"       =>37,
            "media_filename"=>'media/u3p.mp3',
            "media_type"    =>'audio',
            "totalTime"     =>"2:08",
            "part_type"     =>"listening",
            "have_questions"=>false,
            "questions_type"=>"text",
            "keywords"      =>array("as a matter of fact","close friend","block","twin","cute",
                "recruit","branch","currently",
                "human resource manager","high salary","go sightseeing","including","colleague","team-mate","celebrate","hardworking",
                "relax", "outdoor activity"
            ),
        );
        $data['events'][] = array(
            "num"=>"2",
            'type'=>"text",
            "timeRange"=>"00:00-00:11",
            "text"=>"Hello, this is Channel We. I'm Miss V. In today's program let's get to know the friends and neighbors of the Smith's family.",
            "media_filename"=>'media/u3p.mp4',
            "media_type"    =>'video',
            "picture"=>"images/u3_p_001.png",
            "pictures"=>array()

        );
        $data['events'][] = array(
            "num"=>"5",
            'type'=>"text",
            "timeRange"=>"00:00-00:04",
            "displayKewords"=>true,
            "text"=>"Leo Black comes from England.",
            "picture"=>"images/u3_p_001.png"
        );
        $data['events'][] = array(
            "num"=>"6",
            'type'=>"text",
            "timeRange"=>"00:04-00:08",
            "text"=>"They both live in New York.",
            "picture"=>"images/u3_p_001.png"
        );

        $data['events'][] = array(
            "num"=>"7",
            "content_id"=>390,
            'type'=>"sr_reading",
            "timeRange"=>"00:08-00:13",
            "scores"=>1,
            "text"=>"He lives in the same community as Helen does.",
            "answer"=>"He lives in the same community as Helen does",
            "picture"=>"images/u3_p_001.png"
        );
        $data['events'][] = array(
            "num"=>"8",
            'type'=>"text",
            "timeRange"=>"00:13-00:17",
            "text"=>"Leo is Helen's neighbor.",
            "picture"=>"images/u3_p_001.png"
        );
        $data['events'][] = array(
            "num"=>"9",
            'type'=>"text",
            "timeRange"=>"00:17-00:23",
            "text"=>"As a matter of fact, their houses are next to each other.",
            "picture"=>"images/u3_p_002.png"
        );

        $data['events'][] = array(
            "num"=>"10",
            "content_id"=>391,
            'type'=>"sr_reading",
            "scores"=>1,
            "timeRange"=>"00:23-00:32",
            "text"=>"They have been close friends ever since Leo moved into this block about 15 years ago.",
            "answer"=>"They have been close friends ever since Leo moved into this block about fifteen years ago",
            "picture"=>"images/u3_p_002.png"
        );

        $data['events'][] = array(
            "num"=>"11",
            'type'=>"text",
            "timeRange"=>"00:32-00:36",
            "text"=>"Leo is married.",
            "picture"=>"images/u3_p_003.png"
        );

        $data['events'][] = array(
            "num"=>"12",
            'type'=>"text",
            "timeRange"=>"00:36-00:41",
            "text"=>"His wife's name is Lily. ",
            "picture"=>"images/u3_p_003.png"
        );

        $data['events'][] = array(
            "num"=>"13",
            'type'=>"text",
            "timeRange"=>"00:41-00:47",
            "text"=>"They have twin daughters who are both 5 years old.",
            "picture"=>"images/u3_p_004.png"
        );

        $data['events'][] = array(
            "num"=>"14",
            'type'=>"text",
            "timeRange"=>"00:47-00:51",
            "text"=>"They are really cute.",
            "picture"=>"images/u3_p_004.png"
        );

        $data['events'][] = array(
            "num"=>"15",
            "content_id"=>392,
            'type'=>"sr_reading",
            "scores"=>1,
            "timeRange"=>"00:51-00:59",
            "text"=>"Leo's niece, Elisa, is staying with them during her visit to New York.",
            "answer"=>"Leo's niece Elisa is staying with them during her visit to New York",
            "picture"=>"images/u3_p_005.png"
        );

        $data['events'][] = array(
            "num"=>"16",
            'type'=>"text",
            "timeRange"=>"00:59-01:06",
            "text"=>"Leo works as an engineer in an international company. ",
            "picture"=>"images/u3_p_006.png"
        );

        $data['events'][] = array(
            "num"=>"17",
            'type'=>"text",
            "timeRange"=>"01:06-01:18",
            "text"=>"Since last year, Leo has been flying around the world to recruit computer technicians for the company's international branches. ",
            "picture"=>"images/u3_p_006.png"
        );

        $data['events'][] = array(
            "num"=>"18",
            "content_id"=>393,
            'type'=>"sr_reading",
            "scores"=>1,
            "timeRange"=>"01:18-01:27",
            "text"=>"Lily currently works as a human resource manager in a big automobile company.",
            "answer"=>"Lily currently works as a human resource manager in a big automobile company",
            "picture"=>"images/u3_p_007.png"
        );


        $data['events'][] = array(
            "num"=>"19",
            'type'=>"text",
            "timeRange"=>"01:27-01:34",
            "text"=>"Both of them have high salaries and they really like their jobs.",
            "picture"=>"images/u3_p_008.png"
        );

        $data['events'][] = array(
            "num"=>"20",
            'type'=>"text",
            "timeRange"=>"01:34-01:44",
            "text"=>"Last Christmas the two families went sightseeing together in Europe, including France and Austria. ",
            "picture"=>"images/u3_p_009.png"
        );

        $data['events'][] = array(
            "num"=>"21",
            "content_id"=>394,
            'type'=>"sr_reading",
            "scores"=>1,
            "timeRange"=>"01:44-01:50",
            "text"=>"They had a wonderful time and enjoyed traveling together. ",
            "answer"=>"They had a wonderful time and enjoyed traveling together",
            "picture"=>"images/u3_p_009.png"
        );

        $data['events'][] = array(
            "num"=>"22",
            'type'=>"text",
            "timeRange"=>"01:50-01:57",
            "text"=>"Alice Austin is Helen's colleague and good friend.",
            "picture"=>"images/u3_p_010.png"
        );

        $data['events'][] = array(
            "num"=>"23",
            "content_id"=>3940,
            'type'=>"sr_reading",
            "scores"=>1,
            "timeRange"=>"01:57-02:05",
            "text"=>"They were high school classmates and university basketball team-mates. ",
            "picture"=>"images/u3_p_011.png"
        );

        $data['events'][] = array(
            "num"=>"24",
            'type'=>"text",
            "timeRange"=>"03:39-03:43",
            "text"=>"Alice is 1 year younger than Helen.",
            "picture"=>"images/u3_p_012.png"
        );

        $data['events'][] = array(
            "num"=>"25",
            "content_id"=>395,
            'type'=>"sr_reading",
            "scores"=>1,
            "timeRange"=>"02:05-02:15",
            "text"=>"But interestingly, Alice and Helen were born on the same date.",
            "answer"=>"But interestingly Alice and Helen were born on the same date",
            "picture"=>"images/u3_p_012.png"
        );


        $data['events'][] = array(
            "num"=>"26",
            'type'=>"text",
            "timeRange"=>"02:15-02:22",
            "text"=>"They used to celebrate their birthday together before Helen got married.",
            "picture"=>"images/u3_p_012.png"
        );

        $data['events'][] = array(
            "num"=>"27",
            'type'=>"text",
            "timeRange"=>"02:22-02:28",
            "text"=>"Alice is a manager in a bank credit department.",
            "picture"=>"images/u3_p_013.png"
        );

        $data['events'][] = array(
            "num"=>"28",
            'type'=>"text",
            "timeRange"=>"02:28-02:35",
            "text"=>"She also has a high salary and enjoys her job.",
            "picture"=>"images/u3_p_013.png"
        );

        $data['events'][] = array(
            "num"=>"29",
            "content_id"=>396,
            'type'=>"sr_reading",
            "scores"=>1,
            "timeRange"=>"02:35-02:42",
            "text"=>"Unlike Helen, Alice isn't married and lives by herself. ",
            "answer"=>"Unlike Helen, Alice isn't married and lives by herself",
            "picture"=>"images/u3_p_014.png"
        );

        $data['events'][] = array(
            "num"=>"30",
            'type'=>"text",
            "timeRange"=>"02:42-02:48",
            "text"=>"Her parents live in another town 20 miles away.",
            "picture"=>"images/u3_p_014.png"
        );

        $data['events'][] = array(
            "num"=>"31",
            "content_id"=>397,
            'type'=>"sr_reading",
            "scores"=>1,
            "timeRange"=>"02:48-02:53",
            "text"=>"Alice is good at her job and hard-working. ",
            "answer"=>"Alice is good at her job and hard working",
            "picture"=>"images/u3_p_015.png"
        );

        $data['events'][] = array(
            "num"=>"32",
            'type'=>"text",
            "timeRange"=>"02:53-02:59",
            "text"=>"She often works late at night until 11 o'clock.",
            "picture"=>"images/u3_p_015.png"
        );

        $data['events'][] = array(
            "num"=>"33",
            "content_id"=>398,
            'type'=>"sr_reading",
            "scores"=>1,
            "timeRange"=>"02:59-03:07",
            "text"=>"During the weekend, she forgets all about her work and just relaxes.",
            "answer"=>"During the weekend she forgets all about her work and just relaxes",
            "picture"=>"images/u3_p_016.png"
        );

        $data['events'][] = array(
            "num"=>"34",
            'type'=>"text",
            "timeRange"=>"03:07-03:12",
            "text"=>"She often goes to visit Helen and her family.",
            "picture"=>"images/u3_p_016.png"
        );

        $data['events'][] = array(
            "num"=>"35",
            "content_id"=>399,
            'type'=>"sr_reading",
            "scores"=>1,
            "timeRange"=>"03:12-03:17",
            "text"=>"She likes swimming and outdoor activities. ",
            "answer"=>"She likes swimming and outdoor activities",
            "picture"=>"images/u3_p_016.png"
        );

        $data['events'][] = array(
            "num"=>"36",
            'type'=>"text",
            "timeRange"=>"03:17-03:24",
            "text"=>"Last weekend Helen took Alice to the theatre to see a new movie. ",
            "picture"=>"images/u3_p_017.png"
        );

        $data['events'][] = array(
            "num"=>"37",
            'type'=>"text",
            "timeRange"=>"03:24-03:32",
            "text"=>"Alice is now planning to have a summer picnic for Helen and her family in two weeks.",
            "picture"=>"images/u3_p_018.png"
        );

        $data['events'][] = array(
            "num"=>"38",
            "content_id"=>400,
            'type'=>"sr_reading",
            "scores"=>1,
            "timeRange"=>"03:32-03:39",
            "text"=>"She is really looking forward to spending time with Helen and her family.",
            "answer"=>"She is really looking forward to spending time with Helen and her family",
            "picture"=>"images/u3_p_018.png"
        );
        $this->saveEventListToDatabases($data);
        $a =  json_encode($data);
        $fp = fopen('json37.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
        return;

    }


    public function getPart38(){
        $data = array(
            "unit_id"       =>3,
            "lesson_id"     =>14,
            "part_id"       =>38,
            "media_filename"=>'media/u3d.mp4',
            "media_type"    =>'video',
            "totalTime"     =>"4:05",
            "part_type"     =>"dialog",
            "have_questions"=>false,
            "questions_type"=>"text",
            "keywords"      =>array("fantastic","definitely","professions","attend","graduation ceremony",
                "accountant","pub","accounting",
                "could not help doing","opportunity","perform","by coincidence","made a deal"
            ),
        );

        $data['events'][] = array(
            "num"=>"1",
            'type'=>"text",
            "timeRange"=>"00:00-00:07",
            "text"=>"Andy and Helen are talking about the pictures which Andy took during his trip to Europe.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"2",
            'type'=>"text",
            "timeRange"=>"00:07-00:10",
            "text"=>"Hi, Andy.",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"3",
            'type'=>"text",
            "timeRange"=>"00:10-00:13",
            "text"=>"How was your trip?",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"4",
            'type'=>"text",
            "timeRange"=>"00:13-00:16",
            "text"=>"When did you come back?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"5",
            'type'=>"text",
            "timeRange"=>"00:16-00:19",
            "text"=>"It was fantastic.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"6",
            'type'=>"text",
            "timeRange"=>"00:19-00:23",
            "text"=>"I got home last Saturday.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"7",
            'type'=>"text",
            "timeRange"=>"00:23-00:27",
            "text"=>"Here are some pictures I took on my trip.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"8",
            'type'=>"text",
            "timeRange"=>"00:27-00:31",
            "text"=>"You took so many pictures.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"9",
            'type'=>"text",
            "timeRange"=>"00:31-00:35",
            "text"=>"It was a long trip, wasn't it? ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"10",
            'type'=>"text",
            "timeRange"=>"00:35-00:38",
            "text"=>"Definitely.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"11",
            'type'=>"text",
            "timeRange"=>"00:38-00:42",
            "text"=>"I stayed in Europe for about a month.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"12",
            'type'=>"text",
            "timeRange"=>"00:42-00:50",
            "text"=>"I went to many different places and got to know lots of different people from all kinds of professions.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"13",
            'type'=>"text",
            "timeRange"=>"00:50-00:53",
            "text"=>"I can see that.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"14",
            'type'=>"text",
            "timeRange"=>"00:53-00:58",
            "text"=>"Who's the woman next to you in this picture?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num" => "14",
            'type' => "text",
            "timeRange" => "00:58-01:04",
            "text" => "She is Lily, the woman I met on a plane from Paris to Rome. ",
            "picture" => ""
        );
        $data['events'][] = array(
            "num"=>"15",
            'type'=>"text",
            "timeRange"=>"01:04-01:13",
            "text"=>"She is 55 years old and was on her way to attend her son's university graduation ceremony.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"16",
            'type'=>"text",
            "timeRange"=>"01:13-01:16",
            "text"=>"I see.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"17",
            'type'=>"text",
            "timeRange"=>"01:16-01:20",
            "text"=>"Who is the man with the microphone?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"18",
            'type'=>"text",
            "timeRange"=>"01:20-01:24",
            "text"=>"Is he a professional singer?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"20",
            'type'=>"text",
            "timeRange"=>"01:24-01:27",
            "text"=>"That's Joe.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"21",
            'type'=>"text",
            "timeRange"=>"01:27-01:38",
            "text"=>"He actually works for a small international company as an accountant, but he's a part time singer at this popular pub in Venice. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"22",
            'type'=>"text",
            "timeRange"=>"01:38-01:43",
            "text"=>"He sings there three nights a week after work. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"23",
            'type'=>"text",
            "timeRange"=>"01:43-01:47",
            "text"=>"He doesn't look Italian. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"24",
            'type'=>"text",
            "timeRange"=>"01:47-01:50",
            "text"=>"Where is he from?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"25",
            'type'=>"text",
            "timeRange"=>"01:50-01:56",
            "text"=>"He was born in France and is now working in Venice.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"26",
            'type'=>"text",
            "timeRange"=>"01:56-02:00",
            "text"=>"Are his parents French? ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"27",
            'type'=>"text",
            "timeRange"=>"02:00-02:05",
            "text"=>"His father is French but his mother is American. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"28",
            'type'=>"text",
            "timeRange"=>"02:05-02:12",
            "text"=>"So he can speak three languages, English, French and Italian.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"29",
            'type'=>"text",
            "timeRange"=>"02:12-02:16",
            "text"=>"That's quite interesting.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"30",
            'type'=>"text",
            "timeRange"=>"02:16-02:27",
            "text"=>"Yes. Joe told me that he always wanted to be a singer when he was little, but his parents did not want his career to be a singer. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"31",
            'type'=>"text",
            "timeRange"=>"02:27-02:34",
            "text"=>"So, he had to give up his dream and studied accounting in a college in France. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"32",
            'type'=>"text",
            "timeRange"=>"02:34-02:42",
            "text"=>"But he loved singing so much that he could not help taking every opportunity to perform.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"33",
            'type'=>"text",
            "timeRange"=>"02:42-02:52",
            "text"=>"By coincidence, he got to know the owner of this pub and they made a deal that Joe could sing in the pub as a part-time singer.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"34",
            'type'=>"text",
            "timeRange"=>"02:52-02:56",
            "text"=>"He's a really good singer. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"35",
            'type'=>"text",
            "timeRange"=>"02:56-03:00",
            "text"=>"Oh, that's really interesting.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"36",
            'type'=>"text",
            "timeRange"=>"03:00-03:05",
            "text"=>"I'd really love to talk some more, but I have to go now.",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"37",
            'type'=>"text",
            "timeRange"=>"03:05-03:09",
            "text"=>"Hope to see you again next Saturday.",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"38",
            'type'=>"text",
            "timeRange"=>"03:09-03:13",
            "text"=>"Sure. See you next time.",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"39",
            'type'=>"text",
            "timeRange"=>"03:13-03:15",
            "text"=>"Bye.",
            "picture"=>""
        );
        $this->saveEventListToDatabases($data);
        $a =  json_encode($data);
        $fp = fopen('json38.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
        return;
    }

    public function getPart39(){
        $data = array(
            "unit_id"       =>3,
            "lesson_id"     =>14,
            "part_id"       =>39,
            "media_filename"=>'media/u3d.mp4',
            "media_type"    =>'video',
            "totalTime"     =>"4:05",
            "part_type"     =>"dialog",
            "have_questions"=>false,
            "questions_type"=>"text",
            "keywords"      =>array("fantastic","definitely","professions","attend","graduation ceremony",
                "accountant","pub","accounting",
                "could not help doing","opportunity","perform","by coincidence","made a deal"
            ),
        );
        $data['events'][] = array(
            "num"=>"1",
            'type'=>"text",
            "timeRange"=>"00:00-00:07",
            "text"=>"Andy and Helen are talking about the pictures which Andy took during his trip to Europe.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"2",
            'type'=>"text",
            "timeRange"=>"00:07-00:10",
            "text"=>"Hi, Andy.",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"3",
            'type'=>"text",
            "timeRange"=>"00:10-00:13",
            "text"=>"How was your trip?",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"4",
            'type'=>"text",
            "timeRange"=>"00:13-00:16",
            "text"=>"When did you come back?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"5",
            'type'=>"text",
            "timeRange"=>"00:16-00:19",
            "text"=>"It was fantastic.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"6",
            'type'=>"text",
            "timeRange"=>"00:19-00:23",
            "text"=>"I got home last Saturday.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"7",
            'type'=>"text",
            "timeRange"=>"00:23-00:27",
            "text"=>"Here are some pictures I took on my trip.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"8",
            'type'=>"multipleChoices",
            "timeRange"=>"",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"9",
                    "content_id"=>401,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3dcq.mp3',
                    "timeRange"=>"00:00-00:03",
                    "text"=>"How was Andy's trip?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"It was tiring.","isCorrect"=>false),
                        "1"=>array("item"=>"It was terrific.", "isCorrect"=>true),
                        "2"=>array("item"=>"It was frustrating.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u3dcq.mp3',
                            "timeRange"=>"00:04-00:09",
                            "text"=>"Andy's trip was fantastic.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u3dcq.mp3',
                            "timeRange"=>"00:04-00:09",
                            "text"=>"Andy's trip was fantastic.",
                        ),
                    ),
                )
            )
        );

        $data['events'][] = array(
            "num"=>"10",
            'type'=>"text",
            "timeRange"=>"00:27-00:31",
            "text"=>"You took so many pictures.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"11",
            'type'=>"text",
            "timeRange"=>"00:31-00:35",
            "text"=>"It was a long trip, wasn't it? ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"12",
            'type'=>"text",
            "timeRange"=>"00:35-00:38",
            "text"=>"Definitely.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"13",
            'type'=>"text",
            "timeRange"=>"00:38-00:42",
            "text"=>"I stayed in Europe for about a month.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"14",
            'type'=>"text",
            "timeRange"=>"00:42-00:50",
            "text"=>"I went to many different places and got to know lots of different people from all kinds of professions.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"15",
            'type'=>"multipleChoices",
            "timeRange"=>"",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"16",
                    "content_id"=>402,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3dcq.mp3',
                    "timeRange"=>"00:09-00:13",
                    "text"=>"Did he take a lot of photos?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Yes.","isCorrect"=>true),
                        "1"=>array("item"=>"No.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u3dcq.mp3',
                            "timeRange"=>"00:14-00:19",
                            "text"=>"Andy took many pictures during the trip.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u3dcq.mp3',
                            "timeRange"=>"00:14-00:19",
                            "text"=>"Andy took many pictures during the trip.",
                        ),
                    ),
                ),
                1=>array(
                    "num"=>"17",
                    "content_id"=>403,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3dcq.mp3',
                    "timeRange"=>"00:19-00:23",
                    "text"=>"How long did he stay in Europe?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"A couple of days.","isCorrect"=>false),
                        "1"=>array("item"=>"About four weeks.", "isCorrect"=>true),
                        "2"=>array("item"=>"Half a year.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u3dcq.mp3',
                            "timeRange"=>"00:23-00:28",
                            "text"=>"He had stayed in Europe for about a month.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u3dcq.mp3',
                            "timeRange"=>"00:23-00:28",
                            "text"=>"He had stayed in Europe for about a month.",
                        ),
                    ),
                ),
                2=>array(
                    "num"=>"18",
                    "content_id"=>404,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3dcq.mp3',
                    "timeRange"=>"00:28-00:33",
                    "text"=>"Andy got to know many people of different _________.",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Jobs.","isCorrect"=>true),
                        "1"=>array("item"=>"Nations.", "isCorrect"=>false),
                        "2"=>array("item"=>"Interests..", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u3dcq.mp3',
                            "timeRange"=>"00:34-00:45",
                            "text"=>"Andy went to many different places and got to know lots of different people from all kinds of professions.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u3dcq.mp3',
                            "timeRange"=>"00:34-00:45",
                            "text"=>"Andy went to many different places and got to know lots of different people from all kinds of professions.",
                       ),
                    ),
                ),

            )
        );

        $data['events'][] = array(
            "num"=>"19",
            'type'=>"text",
            "timeRange"=>"00:50-00:53",
            "text"=>"I can see that.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"20",
            'type'=>"text",
            "timeRange"=>"00:53-00:58",
            "text"=>"Who's the woman next to you in this picture?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num" => "20",
            'type' => "text",
            "timeRange" => "00:58-01:04",
            "text" => "She is Lily, the woman I met on a plane from Paris to Rome. ",
            "picture" => ""
        );

        $data['events'][] = array(
            "num"=>"21",
            'type'=>"text",
            "timeRange"=>"01:04-01:13",
            "text"=>"She is 55 years old and was on her way to attend her son's university graduation ceremony.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"22",
            'type'=>"text",
            "timeRange"=>"01:13-01:16",
            "text"=>"I see.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"23",
            'type'=>"multipleChoices",
            "timeRange"=>"",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"24",
                    "content_id"=>405,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3dcq.mp3',
                    "timeRange"=>"00:45-00:49",
                    "text"=>"Where did Andy meet Lily?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"On a ship.","isCorrect"=>false),
                        "1"=>array("item"=>"On a plane.", "isCorrect"=>true),
                        "2"=>array("item"=>"On a bus.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u3dcq.mp3',
                            "timeRange"=>"00:49-00:55",
                            "text"=>"Andy met Lily on the plane from Paris to Rome.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u3dcq.mp3',
                            "timeRange"=>"00:49-00:55",
                            "text"=>"Andy met Lily on the plane from Paris to Rome.",
                        ),
                    ),
                ),
                1=>array(
                    "num"=>"25",
                    "content_id"=>406,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3dcq.mp3',
                    "timeRange"=>"00:55-01:02",
                    "text"=>"Did Andy take a photo with an old woman on the plane to Rome? ",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Yes.","isCorrect"=>true),
                        "1"=>array("item"=>"No.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u3dcq.mp3',
                            "timeRange"=>"01:03-01:11",
                            "text"=>"Andy took photo with an old woman, Lily on the plane to Rome.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u3dcq.mp3',
                            "timeRange"=>"01:03-01:11",
                            "text"=>"Andy took photo with an old woman, Lily on the plane to Rome.",
                        ),
                    ),
                ),
                2=>array(
                    "num"=>"26",
                    "content_id"=>407,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3dcq.mp3',
                    "timeRange"=>"01:11-01:15",
                    "text"=>"Why did Lily go to Rome?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"To attend her son's wedding ceremony.","isCorrect"=>false),
                        "1"=>array("item"=>"To attend the opening ceremony of a university.", "isCorrect"=>false),
                        "2"=>array("item"=>"To attend her son's graduation ceremony.", "isCorrect"=>true),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u3dcq.mp3',
                            "timeRange"=>"01:15-01:22",
                            "text"=>"Lily went to Rome to attend her son's university graduation ceremony.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u3dcq.mp3',
                            "timeRange"=>"01:15-01:22",
                            "text"=>"Lily went to Rome to attend her son's university graduation ceremony.",
                        ),
                    ),
                ),

            )
        );

        $data['events'][] = array(
            "num"=>"27",
            'type'=>"text",
            "timeRange"=>"01:16-01:20",
            "text"=>"Who is the man with the microphone?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"28",
            'type'=>"text",
            "timeRange"=>"01:20-01:24",
            "text"=>"Is he a professional singer?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"30",
            'type'=>"text",
            "timeRange"=>"01:24-01:27",
            "text"=>"That's Joe.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"31",
            'type'=>"text",
            "timeRange"=>"01:27-01:38",
            "text"=>"He actually works for a small international company as an accountant, but he's a part time singer at this popular pub in Venice. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"32",
            'type'=>"text",
            "timeRange"=>"01:38-01:43",
            "text"=>"He sings there three nights a week after work. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"33",
            'type'=>"text",
            "timeRange"=>"01:43-01:47",
            "text"=>"He doesn't look Italian. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"34",
            'type'=>"text",
            "timeRange"=>"01:47-01:50",
            "text"=>"Where is he from?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"35",
            'type'=>"text",
            "timeRange"=>"01:50-01:56",
            "text"=>"He was born in France and is now working in Venice.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"36",
            'type'=>"text",
            "timeRange"=>"01:56-02:00",
            "text"=>"Are his parents French? ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"37",
            'type'=>"text",
            "timeRange"=>"02:00-02:05",
            "text"=>"His father is French but his mother is American. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"38",
            'type'=>"text",
            "timeRange"=>"02:05-02:12",
            "text"=>"So he can speak three languages, English, French and Italian.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"39",
            'type'=>"text",
            "timeRange"=>"02:12-02:16",
            "text"=>"That's quite interesting.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"40",
            'type'=>"multipleChoices",
            "timeRange"=>"",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"41",
                    "content_id"=>408,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3dcq.mp3',
                    "timeRange"=>"01:22-01:26",
                    "text"=>"Is Joe a professional singer? ",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Yes.","isCorrect"=>false),
                        "1"=>array("item"=>"No.", "isCorrect"=>true),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u3dcq.mp3',
                            "timeRange"=>"01:27-01:33",
                            "text"=>"Joe is a part time singer at a pub.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u3dcq.mp3',
                            "timeRange"=>"01:27-01:33",
                            "text"=>"Joe is a part time singer at a pub.",
                        ),
                    ),
                ),
                1=>array(
                    "num"=>"42",
                    "content_id"=>409,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3dcq.mp3',
                    "timeRange"=>"01:33-01:37",
                    "text"=>"Do Joe's parents both come from France?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Yes.","isCorrect"=>false),
                        "1"=>array("item"=>"No.", "isCorrect"=>true),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u3dcq.mp3',
                            "timeRange"=>"01:38-01:45",
                            "text"=>"Joe's father is French but his mother is American.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u3dcq.mp3',
                            "timeRange"=>"01:38-01:45",
                            "text"=>"Joe's father is French but his mother is American.",
                        ),
                    ),
                ),
                2=>array(
                    "num"=>"43",
                    "content_id"=>410,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3dcq.mp3',
                    "timeRange"=>"01:45-01:49",
                    "text"=>"What is his full-time job?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Singer.","isCorrect"=>false),
                        "1"=>array("item"=>"Accountant.", "isCorrect"=>true),
                        "2"=>array("item"=>"Translator.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u3dcq.mp3',
                            "timeRange"=>"01:50-01:58",
                            "text"=>"He actually works for a small international company as an accountant.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u3dcq.mp3',
                            "timeRange"=>"01:50-01:58",
                            "text"=>"He actually works for a small international company as an accountant.",
                        ),
                    ),
                ),
                3=>array(
                    "num"=>"44",
                    "content_id"=>411,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3dcq.mp3',
                    "timeRange"=>"01:58-02:01",
                    "text"=>"Can he speak Italian?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Yes.","isCorrect"=>true),
                        "1"=>array("item"=>"No.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u3dcq.mp3',
                            "timeRange"=>"02:02-02:10",
                            "text"=>"He can speak three languages, English, French and Italian.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u3dcq.mp3',
                            "timeRange"=>"02:02-02:10",
                            "text"=>"He can speak three languages, English, French and Italian.",
                        ),
                    ),
                ),

            )
        );

        $data['events'][] = array(
            "num"=>"45",
            'type'=>"text",
            "timeRange"=>"02:16-02:27",
            "text"=>"Yes. Joe told me that he always wanted to be a singer when he was little, but his parents did not want his career to be a singer. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"46",
            'type'=>"text",
            "timeRange"=>"02:27-02:34",
            "text"=>"So, he had to give up his dream and studied accounting in a college in France. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"47",
            'type'=>"text",
            "timeRange"=>"02:34-02:42",
            "text"=>"But he loved singing so much that he could not help taking every opportunity to perform.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"48",
            'type'=>"text",
            "timeRange"=>"02:42-02:52",
            "text"=>"By coincidence, he got to know the owner of this pub and they made a deal that Joe could sing in the pub as a part-time singer.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"49",
            'type'=>"text",
            "timeRange"=>"02:52-02:56",
            "text"=>"He's a really good singer. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"50",
            'type'=>"multipleChoices",
            "timeRange"=>"",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"51",
                    "content_id"=>412,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3dcq.mp3',
                    "timeRange"=>"02:10-02:14",
                    "text"=>"Is Joe a good singer?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Yes.","isCorrect"=>true),
                        "1"=>array("item"=>"No.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u3dcq.mp3',
                            "timeRange"=>"02:14-02:18",
                            "text"=>"Joes is a really good singer.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u3dcq.mp3',
                            "timeRange"=>"02:14-02:18",
                            "text"=>"Joes is a really good singer.",
                        ),
                    ),
                ),
                1=>array(
                    "num"=>"52",
                    "content_id"=>413,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3dcq.mp3',
                    "timeRange"=>"02:18-02:21",
                    "text"=>"Does he love accounting?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Yes.","isCorrect"=>false),
                        "1"=>array("item"=>"No.", "isCorrect"=>true),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u3dcq.mp3',
                            "timeRange"=>"02:22-02:35",
                            "text"=>"Singing is what he really loves but his parents didn't want him to be a singer. So he had to give up his dream and studied accounting in a college in France.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u3dcq.mp3',
                            "timeRange"=>"02:22-02:35",
                            "text"=>"Singing is what he really loves but his parents didn't want him to be a singer. So he had to give up his dream and studied accounting in a college in France.",
                        ),
                    ),
                ),
                2=>array(
                    "num"=>"43",
                    "content_id"=>414,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3dcq.mp3',
                    "timeRange"=>"02:35-02:39",
                    "text"=>"Does he love singing?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Yes.","isCorrect"=>true),
                        "1"=>array("item"=>"No.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u3dcq.mp3',
                            "timeRange"=>"02:39-02:47",
                            "text"=>"He loves singing very much and always wanted to be a singer when he was little.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u3dcq.mp3',
                            "timeRange"=>"02:39-02:47",
                            "text"=>"He loves singing very much and always wanted to be a singer when he was little.",
                      ),
                    ),
                ),

            )
        );

        $data['events'][] = array(
            "num"=>"44",
            'type'=>"text",
            "timeRange"=>"02:56-03:00",
            "text"=>"Oh, that's really interesting.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"45",
            'type'=>"text",
            "timeRange"=>"03:00-03:05",
            "text"=>"I'd really love to talk some more, but I have to go now.",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"46",
            'type'=>"text",
            "timeRange"=>"03:05-03:09",
            "text"=>"Hope to see you again next Saturday.",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"47",
            'type'=>"text",
            "timeRange"=>"03:09-03:13",
            "text"=>"Sure. See you next time.",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"48",
            'type'=>"text",
            "timeRange"=>"03:13-03:15",
            "text"=>"Bye.",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"49",
            'type'=>"multipleChoices",
            "timeRange"=>"",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"50",
                    "content_id"=>415,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3dcq.mp3',
                    "timeRange"=>"02:47-02:51",
                    "text"=>"When will Helen and Andy meet again?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Next Sunday.","isCorrect"=>false),
                        "1"=>array("item"=>"Next Saturday.", "isCorrect"=>true),
                        "2"=>array("item"=>"This Saturday.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u3dcq.mp3',
                            "timeRange"=>"02:52-02:57",
                            "text"=>"They will meet again next Saturday.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u3dcq.mp3',
                            "timeRange"=>"02:52-02:57",
                            "text"=>"They will meet again next Saturday.",
                        ),
                    ),
                )

            )
        );
        $this->saveEventListToDatabases($data);
        $a =  json_encode($data);
        $fp = fopen('json39.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
        return;
    }



    public function getPart40()
    {

        $data = array(
            "unit_id" => 3,
            "lesson_id" => 14,
            "part_id" => 40,
            "media_filename" => 'media/u3d.mp4',
            "media_type" => 'video',
            "totalTime" => "4:05",
            "part_type" => "dialog",
            "have_questions" => false,
            "questions_type" => "text",
            "keywords" => array("fantastic", "definitely", "professions", "attend", "graduation ceremony",
                "accountant", "pub", "accounting",
                "could not help doing", "opportunity", "perform", "by coincidence", "made a deal"
            ),
        );

        $data['events'][] = array(
            "num" => "1",
            'type' => "text",
            "timeRange" => "00:00-00:07",
            "text" => "Andy and Helen are talking about the pictures which Andy took during his trip to Europe.",
            "picture" => ""
        );
        $data['events'][] = array(
            "num" => "2",
            'type' => "text",
            "timeRange" => "00:07-00:10",
            "text" => "Hi, Andy.",
            "picture" => ""
        );

        $data['events'][] = array(
            "num" => "3",
            'type'=>"sr_reading",
            "content_id"=>416,
            "scores"=>1,
            "timeRange" => "00:10-00:13",
            "text" => "How was your trip?",
            "answer" => "How was your trip",
            "picture" => ""
        );

        $data['events'][] = array(
            "num" => "4",
            'type' => "text",
            "timeRange" => "00:13-00:16",
            "text" => "When did you come back?",
            "picture" => ""
        );
        $data['events'][] = array(
            "num" => "5",
            'type'=>"sr_reading",
            "content_id"=>417,
            "scores"=>1,
            "timeRange" => "00:16-00:19",
            "text" => "It was fantastic.",
            "answer" => "It was fantastic.",
            "picture" => ""
        );
        $data['events'][] = array(
            "num" => "6",
            'type' => "text",
            "timeRange" => "00:19-00:23",
            "text" => "I got home last Saturday.",
            "picture" => ""
        );
        $data['events'][] = array(
            "num" => "7",
            'type' => "text",
            "timeRange" => "00:23-00:27",
            "text" => "Here are some pictures I took on my trip.",
            "picture" => ""
        );
        $data['events'][] = array(
            "num" => "8",
            'type' => "text",
            "timeRange" => "00:27-00:31",
            "text" => "You took so many pictures.",
            "picture" => ""
        );
        $data['events'][] = array(
            "num" => "9",
            'type'=>"sr_reading",
            "content_id"=>418,
            "scores"=>1,
            "timeRange" => "00:31-00:35",
            "text" => "It was a long trip, wasn't it? ",
            "answer" => "It was a long trip wasn't it",
            "picture" => ""
        );
        $data['events'][] = array(
            "num" => "10",
            'type' => "text",
            "timeRange" => "00:35-00:38",
            "text" => "Definitely.",
            "picture" => ""
        );
        $data['events'][] = array(
            "num" => "11",
            'type' => "text",
            "timeRange" => "00:38-00:42",
            "text" => "I stayed in Europe for about a month.",
            "picture" => ""
        );
        $data['events'][] = array(
            "num" => "12",
            'type' => "text",
            "timeRange" => "00:42-00:50",
            "text" => "I went to many different places and got to know lots of different people from all kinds of professions.",
            "picture" => ""
        );
        $data['events'][] = array(
            "num" => "13",
            'type' => "text",
            "timeRange" => "00:50-00:53",
            "text" => "I can see that.",
            "picture" => ""
        );
        $data['events'][] = array(
            "num" => "14",
            'type' => "text",
            "timeRange" => "00:53-00:58",
            "text" => "Who's the woman next to you in this picture?",
            "picture" => ""
        );
        $data['events'][] = array(
            "num" => "14",
            'type'=>"sr_reading",
            "content_id"=>419,
            "scores"=>1,
            "timeRange" => "00:58-01:04",
            "text" => "She is Lily, the woman I met on a plane from Paris to Rome.",
            "answer" => "She is Lily the woman I met on a plane from Paris to Rome",
            "picture" => ""
        );
        $data['events'][] = array(
            "num" => "15",
            'type' => "text",
            "timeRange" => "01:04-01:13",
            "text" => "She is 55 years old and was on her way to attend her son's university graduation ceremony.",
            "picture" => ""
        );
        $data['events'][] = array(
            "num" => "16",
            'type' => "text",
            "timeRange" => "01:13-01:16",
            "text" => "I see.",
            "picture" => ""
        );
        $data['events'][] = array(
            "num" => "17",
            'type' => "text",
            "timeRange" => "01:16-01:20",
            "text" => "Who is the man with the microphone?",
            "picture" => ""
        );
        $data['events'][] = array(
            "num" => "18",
            'type'=>"sr_reading",
            "content_id"=>420,
            "scores"=>1,
            "timeRange" =>"01:20-01:24",
            "text" => "Is he a professional singer?",
            "answer" => "Is he a professional singer",
            "picture" => ""
        );
        $data['events'][] = array(
            "num" => "20",
            'type' => "text",
            "timeRange" => "01:24-01:27",
            "text" => "That's Joe.",
            "picture" => ""
        );
        $data['events'][] = array(
            "num" => "21",
            'type' => "text",
            "timeRange" => "01:27-01:38",
            "text" => "He actually works for a small international company as an accountant, but he's a part time singer at this popular pub in Venice. ",
            "picture" => ""
        );
        $data['events'][] = array(
            "num" => "22",
            'type'=>"sr_reading",
            "content_id"=>421,
            "scores"=>1,
            "timeRange" => "01:38-01:43",
            "text" => "He sings there three nights a week after work. ",
            "answer" => "He sings there three nights a week after work",
            "picture" => ""
        );
        $data['events'][] = array(
            "num" => "23",
            'type' => "text",
            "timeRange" => "01:43-01:47",
            "text" => "He doesn't look Italian. ",
            "picture" => ""
        );
        $data['events'][] = array(
            "num" => "24",
            'type' => "text",
            "timeRange" => "01:47-01:50",
            "text" => "Where is he from?",
            "picture" => ""
        );
        $data['events'][] = array(
            "num" => "25",
            'type'=>"sr_reading",
            "content_id"=>422,
            "scores"=>1,
            "timeRange" => "01:50-01:56",
            "text" => "He was born in France and is now working in Venice.",
            "answer" => "He was born in France and is now working in Venice",
            "picture" => ""
        );
        $data['events'][] = array(
            "num" => "26",
            'type' => "text",
            "timeRange" => "01:56-02:00",
            "text" => "Are his parents French? ",
            "picture" => ""
        );
        $data['events'][] = array(
            "num" => "27",
            'type' => "text",
            "timeRange" => "02:00-02:05",
            "text" => "His father is French but his mother is American. ",
            "picture" => ""
        );
        $data['events'][] = array(
            "num" => "28",
            'type' => "text",
            "timeRange" => "02:05-02:12",
            "text" => "So he can speak three languages, English, French and Italian.",
            "picture" => ""
        );
        $data['events'][] = array(
            "num" => "29",
            'type' => "text",
            "timeRange" => "02:12-02:16",
            "text" => "That's quite interesting.",
            "picture" => ""
        );
        $data['events'][] = array(
            "num" => "30",
            'type' => "text",
            "timeRange" => "02:16-02:27",
            "text" => "Yes. Joe told me that he always wanted to be a singer when he was little, but his parents did not want his career to be a singer. ",
            "picture" => ""
        );
        $data['events'][] = array(
            "num" => "31",
            'type' => "text",
            "timeRange" => "02:27-02:34",
            "text" => "So, he had to give up his dream and studied accounting in a college in France. ",
            "picture" => ""
        );
        $data['events'][] = array(
            "num" => "32",
            'type'=>"sr_reading",
            "content_id"=>423,
            "scores"=>1,
            "timeRange" => "02:34-02:42",
            "text" => "But he loved singing so much that he could not help taking every opportunity to perform.",
            "answer" => "But he loved singing so much that he could not help taking every opportunity to perform",
            "picture" => ""
        );
        $data['events'][] = array(
            "num" => "33",
            'type' => "text",
            "timeRange" => "02:42-02:52",
            "text" => "By coincidence, he got to know the owner of this pub and they made a deal that Joe could sing in the pub as a part-time singer.",
            "picture" => ""
        );
        $data['events'][] = array(
            "num" => "34",
            'type' => "text",
            "timeRange" => "02:52-02:56",
            "text" => "He's a really good singer. ",
            "picture" => ""
        );
        $data['events'][] = array(
            "num" => "35",
            'type' => "text",
            "timeRange" => "02:56-03:00",
            "text" => "Oh, that's really interesting.",
            "picture" => ""
        );
        $data['events'][] = array(
            "num" => "36",
            'type' => "text",
            "timeRange" => "03:00-03:05",
            "text" => "I'd really love to talk some more, but I have to go now.",
            "picture" => ""
        );

        $data['events'][] = array(
            "num" => "37",
            'type' => "text",
            "timeRange" => "03:05-03:09",
            "text" => "Hope to see you again next Saturday.",
            "picture" => ""
        );

        $data['events'][] = array(
            "num" => "38",
            'type'=>"sr_reading",
            "content_id"=>424,
            "scores"=>1,
            "timeRange" => "03:09-03:13",
            "text" => "Sure. See you next time.",
            "answer" => "Sure See you next time",
            "picture" => ""
        );

        $data['events'][] = array(
            "num" => "39",
            'type' => "text",
            "timeRange" => "03:13-03:15",
            "text" => "Bye.",
            "picture" => ""
        );
        $this->saveEventListToDatabases($data);
        $a = json_encode($data);
        $fp = fopen('json40.txt', "w");
        fwrite($fp, $a);
        fclose($fp);
        return;
    }


    public function getPart41(){
        $dataT = array(
            "unit_id"       =>3,
            "lesson_id"     =>15,
            "part_id"       =>41,
            "media_filename"=>'media/u3ps.mp3',
            "media_type"    =>'audio',
            "totalTime"     =>"1:34",
            "part_type"     =>"summary",
            "have_questions"=>true,
            "questions_type"=>"sr",
            "keywords"      =>array("neighbor","colleague","recruit","human resource manager","automobile company",
                "high salary","go sightseeing","team-mate",
                "take time off","relax","outdoor activity"
            ),
        );
        $data['events'][] = array(
            "num"=>"1",
            'type'=>"text",
            "timeRange"=>"00:00-00:05",
            "text"=>"This is a short summary about Helen's neighbor and colleague.",
            "picture"=>"images/u3_ps_000.png"
        );
        $data['events'][] = array(
            "num"=>"2",
            'type'=>"text",
            "timeRange"=>"00:05-00:09",
            "text"=>"Leo is Helen's neighbor. ",
            "picture"=>"images/u3_ps_001.png"
        );
        $data['events'][] = array(
            "num"=>"3",
            'type'=>"text",
            "timeRange"=>"00:09-00:14",
            "text"=>"He is married and has two children.",
            "picture"=>"images/u3_ps_002.png"
        );

        $data['events'][] = array(
            "num"=>"4",
            'type'=>"text",
            "timeRange"=>"00:14-00:19",
            "text"=>"His niece Elisa is staying at his house for the summer.",
            "picture"=>"images/u3_ps_002.png"
        );
        $data['events'][] = array(
            "num"=>"5",
            'type'=>"text",
            "timeRange"=>"00:19-00:25",
            "text"=>"Leo is an engineer in an international company. ",
            "picture"=>"images/u3_ps_003.png"
        );
        $data['events'][] = array(
            "num"=>"6",
            'type'=>"text",
            "timeRange"=>"00:25-00:31",
            "text"=>"He often travels abroad to help recruit technicians. ",
            "picture"=>"images/u3_ps_003.png"
        );
        $data['events'][] = array(
            "num"=>"7",
            'type'=>"text",
            "timeRange"=>"00:31-00:39",
            "text"=>"His wife is a human resource manager for a big automobile company in New York. ",
            "picture"=>"images/u3_ps_003.png"
        );
        $data['events'][] = array(
            "num"=>"8",
            'type'=>"text",
            "timeRange"=>"00:39-00:44",
            "text"=>"Leo and his wife both have high salaries. ",
            "picture"=>"images/u3_ps_004.png"
        );
        $data['events'][] = array(
            "num"=>"9",
            'type'=>"text",
            "timeRange"=>"00:44-00:51",
            "text"=>"Last Christmas, Leo and Helen's families went sightseeing together.",
            "picture"=>"images/u3_ps_005.png"
        );
        $data['events'][] = array(
            "num"=>"10",
            'type'=>"text",
            "timeRange"=>"00:51-00:55",
            "text"=>"Alice is Helen's colleague. ",
            "picture"=>"images/u3_ps_006.png"
        );
        $data['events'][] = array(
            "num"=>"11",
            'type'=>"text",
            "timeRange"=>"00:55-01:02",
            "text"=>"They used to be high school classmates and university team-mates when they were young. ",
            "picture"=>"images/u3_ps_006.png"
        );
        $data['events'][] = array(
            "num"=>"12",
            'type'=>"text",
            "timeRange"=>"01:02-01:07",
            "text"=>"Their birthdays are on the same date. ",
            "picture"=>"images/u3_ps_006.png"
        );
        $data['events'][] = array(
            "num"=>"13",
            'type'=>"text",
            "timeRange"=>"01:07-01:11",
            "text"=>"Alice isn't married. ",
            "picture"=>"images/u3_ps_006.png"
        );
        $data['events'][] = array(
            "num"=>"14",
            'type'=>"text",
            "timeRange"=>"01:11-01:15",
            "text"=>"She lives by herself.",
            "picture"=>"images/u3_ps_006.png"
        );
        $data['events'][] = array(
            "num"=>"14",
            'type'=>"text",
            "timeRange"=>"01:15-01:20",
            "text"=>"Her parents live 20 miles away.",
            "picture"=>"images/u3_ps_006.png"
        );
        $data['events'][] = array(
            "num"=>"16",
            'type'=>"text",
            "timeRange"=>"01:20-01:25",
            "text"=>"Alice is a manager for a credit department in a bank.",
            "picture"=>"images/u3_ps_006.png"
        );
        $data['events'][] = array(
            "num"=>"17",
            'type'=>"text",
            "timeRange"=>"01:25-01:33",
            "text"=>"Although she works hard during the weekdays, she takes time off to relax during the weekend.",
            "picture"=>"images/u3_ps_007.png"
        );
        $data['events'][] = array(
            "num"=>"18",
            'type'=>"text",
            "timeRange"=>"01:33-01:37",
            "text"=>"She often goes to visit Helen.",
            "picture"=>"images/u3_ps_007.png"
        );
        $data['events'][] = array(
            "num"=>"19",
            'type'=>"text",
            "timeRange"=>"01:37-01:42",
            "text"=>"She likes swimming and outdoor activities. ",
            "picture"=>"images/u3_ps_007.png"
        );
        $data['events'][] = array(
            "num"=>"20",
            'type'=>"text",
            "timeRange"=>"01:42-01:47",
            "text"=>"Alice is planning a summer picnic with Helen's family.",
            "picture"=>"images/u3_ps_007.png"
        );

        $data['events'][] = array(
            "num"=>"1",
            "content_id"=>425,
            'type'=>"sr_readings",
            "timeRange"=>array("00:00-00:06","00:04-00:11","00:09-00:15"),
            "scores"=>1,
            "text"=>array("This is a short summary about Helen's neighbor and colleague.","Leo is Helen's neighbor. ","He is married and has two children. "),
            "answer"=>array("This is a short summary about Helen's neighbor and colleague","Leo is Helen's neighbor","He is married and has two children"),
            "pictures"=> array("images/u3_ps_007.png","images/u3_ps_007.png","images/u3_ps_007.png"),
            "picture"=>"images/u3_ps_007.png"
        );
        $data['events'][] = array(
            "num"=>"2",
            "content_id"=>426,
            'type'=>"sr_readings",
            "timeRange"=>array("00:13-00:24","00:21-00:25","00:25-00:32"),
            "scores"=>1,
            "text"=>array("His niece Elisa is staying at his house for the summer. ","Leo is an engineer in an international company.","He often travels abroad to help recruit technicians."),
            "answer"=>array("His niece Elisa is staying at his house for the summer","Leo is an engineer in an international company.","He often travels abroad to help recruit technicians"),
            "pictures"=> array("images/u3_ps_007.png","images/u3_ps_007.png","images/u3_ps_007.png"),
            "picture"=>"images/u3_ps_007.png"
        );

        $data['events'][] = array(
            "num"=>"3",
            "content_id"=>427,
            'type'=>"sr_readings",
            "timeRange"=>array("00:32-00:38","00:38-00:45","00:45-00:49"),
            "scores"=>1,
            "text"=>array("His wife is a human resource manager for a big automobile company in New York. ","Leo and his wife both have high salaries.","Last Christmas, Leo and Helen's families went sightseeing together."),
            "answer"=>array("His wife is a human resource manager for a big automobile company in New York","Leo and his wife both have high salaries","Last Christmas Leo and Helen's families went sightseeing together"),
            "picture"=>"images/u3_ps_007.png",
            "pictures"=>array("images/u3_ps_007.png","images/u3_ps_007.png","images/u3_ps_007.png")
        );

        $data['events'][] = array(
            "num"=>"4",
            "content_id"=>428,
            'type'=>"sr_readings",
            "timeRange"=>array("00:49-00:54","00:54-00:58","00:58-01:02","00:58-01:02"),
            "scores"=>1,
            "picture"=>"images/u3_ps_007.png",
            "text"=>array("Alice is Helen's colleague. ","They used to be high school classmates and university team-mates when they were young. ","Their birthdays are on the same date. "),
            "answer"=>array("Alice is Helen's colleague","They used to be high school classmates and university team-mates when they were young","Their birthdays are on the same date"),
            "pictures"=>array("images/u3_ps_007.png","images/u3_ps_007.png","images/u3_ps_007.png","images/u3_ps_007.png")
        );

        $data['events'][] = array(
            "num"=>"5",
            "content_id"=>429,
            'type'=>"sr_readings",
            "timeRange"=>array("00:49-00:54","00:54-00:58","00:58-01:02","00:58-01:02"),
            "scores"=>1,
            "picture"=>"images/u3_ps_007.png",
            "text"=>array("Alice isn't married.","She lives by herself.","Her parents live 20 miles away.","Alice is a manager for a credit department in a bank. "),
            "answer"=>array("Alice isn't married.","She lives by herself","Her parents live 20 miles away","Alice is a manager for a credit department in a bank"),
            "pictures"=>array("images/u3_ps_007.png","images/u3_ps_007.png","images/u3_ps_007.png","images/u3_ps_007.png")
        );

        $data['events'][] = array(
            "num"=>"6",
            "content_id"=>430,
            'type'=>"sr_readings",
            "timeRange"=>array("00:49-00:54","00:54-00:58","00:58-01:02","00:58-01:02"),
            "scores"=>1,
            "picture"=>"images/u3_ps_007.png",
            "text"=>array("Although she works hard during the weekdays, she takes time off to relax during the weekend.","She often goes to visit Helen.","She likes swimming and outdoor activities.","Alice is planning a summer picnic with Helen's family."),
            "answer"=>array("Although she works hard during the weekdays she takes time off to relax during the weekend","She often goes to visit Helen","She likes swimming and outdoor activities.","Alice is planning a summer picnic with Helen's family"),
            "pictures"=>array("images/u3_ps_007.png","images/u3_ps_007.png","images/u3_ps_007.png","images/u3_ps_007.png")
        );

        $database = array_merge($dataT,$data);
        //$database = array_merge($database,$data1);

        //exit;
        $this->saveEventListToDatabases($database);

        //$dataT['eventLists'] = array($data,$data1);
        $a =  json_encode($dataT);
        $fp = fopen('json41.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
        return;
    }


    public function getPart42(){
        $data = array(
            "unit_id"       =>3,
            "lesson_id"     =>15,
            "part_id"       =>42,
            "media_filename"=>'media/u3p.mp3',
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
            "content_id"=>431,
            'type'=>"sr_reading",
            "timeRange"=>"00:08-00:13",
            "scores"=>1,
            "text"=>"He lives in the same community as Helen does.",
            "answer"=>"He lives in the same community as Helen does",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3p.mp3',
                    "timeRange"=>"00:08-00:13",
                    "text"=>"He lives in the same community as Helen does.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3p.mp3',
                    "timeRange"=>"00:08-00:13",
                    "text"=>"He lives in the same community as Helen does.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"2",
            "content_id"=>432,
            'type'=>"sr_reading",
            "timeRange"=>"00:23-00:32",
            "scores"=>1,
            "text"=>"They have been close friends ever since Leo moved into this block about 15 years ago.",
            "answer"=>"They have been close friends ever since Leo moved into this block about 15 years ago",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3p.mp3',
                    "timeRange"=>"00:23-00:32",
                    "text"=>"They have been close friends ever since Leo moved into this block about 15 years ago.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3p.mp3',
                    "timeRange"=>"00:23-00:32",
                    "text"=>"They have been close friends ever since Leo moved into this block about 15 years ago.",
                    ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"3",
            "content_id"=>433,
            'type'=>"sr_reading",
            "timeRange"=>"01:06-01:18",
            "scores"=>1,
            "text"=>"Since last year, Leo has been flying around the world to recruit computer technicians for the company's international branches.",
            "answer"=>"Since last year, Leo has been flying around the world to recruit computer technicians for the company's international branches",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3p.mp3',
                    "timeRange"=>"01:06-01:18",
                    "text"=>"Since last year, Leo has been flying around the world to recruit computer technicians for the company's international branches.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3p.mp3',
                    "timeRange"=>"01:06-01:18",
                    "text"=>"Since last year, Leo has been flying around the world to recruit computer technicians for the company's international branches.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"4",
            "content_id"=>434,
            'type'=>"sr_reading",
            "timeRange"=>"01:18-01:27",
            "scores"=>1,
            "text"=>"Lily currently works as a human resource manager in a big automobile company.",
            "answer"=>"Lily currently works as a human resource manager in a big automobile company",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3p.mp3',
                    "timeRange"=>"01:18-01:27",
                    "text"=>"Lily currently works as a human resource manager in a big automobile company.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3p.mp3',
                    "timeRange"=>"01:18-01:27",
                    "text"=>"Lily currently works as a human resource manager in a big automobile company.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"5",
            "content_id"=>435,
            'type'=>"sr_reading",
            "timeRange"=>"01:34-01:44",
            "scores"=>1,
            "text"=>"Last Christmas the two families went sightseeing together in Europe, including France and Austria.",
            "answer"=>"Last Christmas the two families went sightseeing together in Europe, including France and Austria",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3p.mp3',
                    "timeRange"=>"01:34-01:44",
                    "text"=>"Last Christmas the two families went sightseeing together in Europe, including France and Austria.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3p.mp3',
                    "timeRange"=>"01:34-01:44",
                    "text"=>"Last Christmas the two families went sightseeing together in Europe, including France and Austria.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"6",
            "content_id"=>436,
            'type'=>"sr_reading",
            "timeRange"=>"01:44-01:50",
            "scores"=>1,
            "text"=>"They had a wonderful time and enjoyed traveling together. ",
            "answer"=>"They had a wonderful time and enjoyed traveling together",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3p.mp3',
                    "timeRange"=>"01:44-01:50",
                    "text"=>"They had a wonderful time and enjoyed traveling together.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3p.mp3',
                    "timeRange"=>"01:44-01:50",
                    "text"=>"They had a wonderful time and enjoyed traveling together.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"7",
            "content_id"=>437,
            'type'=>"sr_reading",
            "timeRange"=>"02:05-02:15",
            "scores"=>1,
            "text"=>"Alice is 1 year younger than Helen, but interestingly, Alice and Helen were born on the same date.  ",
            "answer"=>"Alice is 1 year younger than Helen, but interestingly, Alice and Helen were born on the same date",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3p.mp3',
                    "timeRange"=>"02:05-02:15",
                    "text"=>"Alice is 1 year younger than Helen but interestingly Alice and Helen were born on the same date.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3p.mp3',
                    "timeRange"=>"02:05-02:15",
                    "text"=>"Alice is 1 year younger than Helen but interestingly Alice and Helen were born on the same date.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"8",
            "content_id"=>438,
            'type'=>"sr_reading",
            "timeRange"=>"02:15-02:22",
            "scores"=>1,
            "text"=>"They used to celebrate their birthday together before Helen got married. ",
            "answer"=>"They used to celebrate their birthday together before Helen got married",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3p.mp3',
                    "timeRange"=>"02:15-02:22",
                    "text"=>"They used to celebrate their birthday together before Helen got married.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3p.mp3',
                    "timeRange"=>"02:15-02:22",
                    "text"=>"They used to celebrate their birthday together before Helen got married.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"9",
            "content_id"=>439,
            'type'=>"sr_reading",
            "timeRange"=>"02:59-03:07",
            "scores"=>1,
            "text"=>"During the weekend, she forgets all about her work and just relaxes.",
            "answer"=>"During the weekend, she forgets all about her work and just relaxes",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3p.mp3',
                    "timeRange"=>"02:59-03:07",
                    "text"=>"During the weekend, she forgets all about her work and just relaxes. ",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3p.mp3',
                    "timeRange"=>"02:59-03:07",
                    "text"=>"During the weekend, she forgets all about her work and just relaxes. ",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"10",
            "content_id"=>440,
            'type'=>"sr_reading",
            "timeRange"=>"03:24-03:32",
            "scores"=>1,
            "text"=>"Alice is now planning to have a summer picnic for Helen and her family in two weeks.",
            "answer"=>"Alice is now planning to have a summer picnic for Helen and her family in two weeks",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3p.mp3',
                    "timeRange"=>"03:24-03:32",
                    "text"=>"Alice is now planning to have a summer picnic for Helen and her family in two weeks.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3p.mp3',
                    "timeRange"=>"03:24-03:32",
                    "text"=>"Alice is now planning to have a summer picnic for Helen and her family in two weeks.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"11",
            "content_id"=>441,
            'type'=>"sr_reading",
            "timeRange"=>"03:32-03:39",
            "scores"=>1,
            "text"=>"She is really looking forward to spending time with Helen and her family.",
            "answer"=>"She is really looking forward to spending time with Helen and her family",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3p.mp3',
                    "timeRange"=>"03:32-03:39",
                    "text"=>"She is really looking forward to spending time with Helen and her family.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3p.mp3',
                    "timeRange"=>"03:32-03:39",
                    "text"=>"She is really looking forward to spending time with Helen and her family.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"12",
            "content_id"=>442,
            'type'=>"sr_reading",
            "timeRange"=>"00:42-00:50",
            "scores"=>1,
            "text"=>"I went to many different places and got to know lots of different people from all kinds of professions. ",
            "answer"=>"I went to many different places and got to know lots of different people from all kinds of professions",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3d.mp3',
                    "timeRange"=>"00:42-00:50",
                    "text"=>"I went to many different places and got to know lots of different people from all kinds of professions.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3d.mp3',
                    "timeRange"=>"00:42-00:50",
                    "text"=>"I went to many different places and got to know lots of different people from all kinds of professions.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"13",
            "content_id"=>443,
            'type'=>"sr_reading",
            "timeRange"=>"00:58-01:04",
            "scores"=>1,
            "text"=>"She is Lily, the woman I met on a plane from Paris to Rome. ",
            "answer"=>"She is Lily the woman I met on a plane from Paris to Rome",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3d.mp3',
                    "timeRange"=>"00:58-01:04",
                    "text"=>"She is Lily, the woman I met on a plane from Paris to Rome.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3d.mp3',
                    "timeRange"=>"00:58-01:04",
                    "text"=>"She is Lily, the woman I met on a plane from Paris to Rome.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"14",
            "content_id"=>444,
            'type'=>"sr_reading",
            "timeRange"=>"01:04-01:13",
            "scores"=>1,
            "text"=>"She is 55 years old and was on her way to attend her son's university graduation ceremony.",
            "answer"=>"She is 55 years old and was on her way to attend her son's university graduation ceremony",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3d.mp3',
                    "timeRange"=>"01:04-01:13",
                    "text"=>"She is 55 years old and was on her way to attend her son's university graduation ceremony.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3d.mp3',
                    "timeRange"=>"01:04-01:13",
                    "text"=>"She is 55 years old and was on her way to attend her son's university graduation ceremony.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"15",
            "content_id"=>445,
            'type'=>"sr_reading",
            "timeRange"=>"01:27-01:38",
            "scores"=>1,
            "text"=>"He actually works for a small international company as an accountant, but he's a part time singer at this popular pub in Venice. ",
            "answer"=>"He actually works for a small international company as an accountant but he's a part time singer at this popular pub in Venice",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3d.mp3',
                    "timeRange"=>"01:27-01:38",
                    "text"=>"He actually works for a small international company as an accountant, but he's a part time singer at this popular pub in Venice.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3d.mp3',
                    "timeRange"=>"01:27-01:38",
                    "text"=>"He actually works for a small international company as an accountant, but he's a part time singer at this popular pub in Venice.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"16",
            "content_id"=>446,
            'type'=>"sr_reading",
            "timeRange"=>"02:16-02:27",
            "scores"=>1,
            "text"=>"Yes, Joe told me that he always wanted to be a singer when he was little, but his parents did not want his career to be a singer. ",
            "answer"=>"Yes, Joe told me that he always wanted to be a singer when he was little, but his parents did not want his career to be a singer",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3d.mp3',
                    "timeRange"=>"02:16-02:27",
                    "text"=>"Yes, Joe told me that he always wanted to be a singer when he was little, but his parents did not want his career to be a singer. ",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3d.mp3',
                    "timeRange"=>"02:16-02:27",
                    "text"=>"Yes, Joe told me that he always wanted to be a singer when he was little, but his parents did not want his career to be a singer. ",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"17",
            "content_id"=>447,
            'type'=>"sr_reading",
            "timeRange"=>"02:27-02:34",
            "scores"=>1,
            "text"=>"So, he had to give up his dream and studied accounting in a college in France.",
            "answer"=>"So, he had to give up his dream and studied accounting in a college in France",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3d.mp3',
                    "timeRange"=>"02:27-02:34",
                    "text"=>"So, he had to give up his dream and studied accounting in a college in France.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3d.mp3',
                    "timeRange"=>"02:27-02:34",
                    "text"=>"So, he had to give up his dream and studied accounting in a college in France.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"18",
            "content_id"=>448,
            'type'=>"sr_reading",
            "timeRange"=>"02:34-02:42",
            "scores"=>1,
            "text"=>"But he loved singing so much that he could not help taking every opportunity to perform. ",
            "answer"=>"But he loved singing so much that he could not help taking every opportunity to perform",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3d.mp3',
                    "timeRange"=>"02:34-02:42",
                    "text"=>"But he loved singing so much that he could not help taking every opportunity to perform.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3d.mp3',
                    "timeRange"=>"02:34-02:42",
                    "text"=>"But he loved singing so much that he could not help taking every opportunity to perform.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"19",
            "content_id"=>449,
            'type'=>"sr_reading",
            "timeRange"=>"02:42-02:52",
            "scores"=>1,
            "text"=>"By coincidence, he got to know the owner of this pub and they made a deal that Joe could sing in the pub as a part-time singer.",
            "answer"=>"By coincidence, he got to know the owner of this pub and they made a deal that Joe could sing in the pub as a part-time singer",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3d.mp3',
                    "timeRange"=>"02:42-02:52",
                    "text"=>"By coincidence, he got to know the owner of this pub and they made a deal that Joe could sing in the pub as a part-time singer.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3d.mp3',
                    "timeRange"=>"02:42-02:52",
                    "text"=>"By coincidence, he got to know the owner of this pub and they made a deal that Joe could sing in the pub as a part-time singer.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"20",
            "content_id"=>450,
            'type'=>"sr_reading",
            "timeRange"=>"03:00-03:05",
            "scores"=>1,
            "text"=>"I'd really love to talk some more, but I have to go now. ",
            "answer"=>"I'd really love to talk some more, but I have to go now",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3d.mp3',
                    "timeRange"=>"03:00-03:05",
                    "text"=>"I'd really love to talk some more, but I have to go now.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3d.mp3',
                    "timeRange"=>"03:00-03:05",
                    "text"=>"I'd really love to talk some more, but I have to go now.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $this->saveEventListToDatabases($data);
        $a =  json_encode($data);
        $fp = fopen('json42.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
        return;
    }


    public function getPart43(){
        $data = array(
            "unit_id"       =>3,
            "lesson_id"     =>15,
            "part_id"       =>43,
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
            "content_id"=>451,
            "media_filename"=>'media/u3p.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_conjunction_clause",
            "timeRange"     =>"00:17-00:23",
            "scores"=>1,
            "text"=>"As a matter of fact, their houses are next to each other. ",
            "answer" =>"As a matter of fact, their houses are next to each other",
            "items"=>array("each other.","As a matter of fact","next to","are","their houses"),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3p.mp3',
                    "timeRange"     =>"00:17-00:23",
                    "text"=>"As a matter of fact, their houses are next to each other. ",
                ),
                "No"=>array(
                    "media_filename"=>'media/u3p.mp3',
                    "timeRange"     =>"00:17-00:23",
                    "text"=>"As a matter of fact, their houses are next to each other. ",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"2",
            "content_id"=>452,
            "media_filename"=>'media/u3p.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_conjunction_clause",
            "timeRange"     =>"00:41-00:47",
            "scores"=>1,
            "answer"=>"They have twin daughters who are both 5 years old",
            "text" => "They have twin daughters who are both 5 years old.",
            "items"=>array("both","They have","5 years old.","who are","twin daughters"),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3p.mp3',
                    "timeRange"     =>"00:41-00:47",
                    "text" => "They have twin daughters who are both 5 years old.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3p.mp3',
                    "timeRange"     =>"00:41-00:47",
                    "text" => "They have twin daughters who are both 5 years old.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"3",
            "content_id"=>453,
            "media_filename"=>'media/u3p.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_conjunction_clause",
            "timeRange"     =>"01:27-01:34",
            "scores"=>1,
            "answer"=>"Both of them have high salaries and they really like their jobs",
            "text" => "Both of them have high salaries and they really like their jobs.",
            "items"=>array("have high salaries","their jobs.","Both of them","really like","and they"),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3p.mp3',
                    "timeRange"     =>"01:27-01:34",
                    "text" => "Both of them have high salaries and they really like their jobs.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3p.mp3',
                    "timeRange"     =>"01:27-01:34",
                    "text" => "Both of them have high salaries and they really like their jobs.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"4",
            "content_id"=>454,
            "media_filename"=>'media/u3p.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_conjunction_clause",
            "timeRange"     =>"02:22-02:28",
            "scores"=>1,
            "answer"=>"Alice is a manager in a bank credit department",
            "text" => "Alice is a manager in a bank credit department. ",
            "items"=>array("is","Alice","a manager","a bank credit department.","in"),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3p.mp3',
                    "timeRange"     =>"02:22-02:28",
                    "text" => "Alice is a manager in a bank credit department. ",
                ),
                "No"=>array(
                    "media_filename"=>'media/u3p.mp3',
                    "timeRange"     =>"02:22-02:28",
                    "text" => "Alice is a manager in a bank credit department. ",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"5",
            "content_id"=>455,
            "media_filename"=>'media/u3p.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_conjunction_clause",
            "timeRange"     =>"02:35-02:42",
            "scores"=>1,
            "answer"=>"Unlike Helen Alice isn't married and lives by herself",
            "text" => "Unlike Helen, Alice isn't married and lives by herself.",
            "items"=>array("Unlike Helen","Alice","isn't married","and lives","by herself."),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3p.mp3',
                    "timeRange"     =>"02:35-02:42",
                    "text" => "Unlike Helen, Alice isn't married and lives by herself.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3p.mp3',
                    "timeRange"     =>"02:35-02:42",
                    "text" => "Unlike Helen, Alice isn't married and lives by herself.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"6",
            "content_id"=>456,
            "media_filename"=>'media/u3p.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_conjunction_clause",
            "timeRange"     =>"02:53-02:59",
            "scores"=>1,
            "answer"=>"She often works late at night until 11 o'clock",
            "text" => "She often works late at night until 11 o'clock.",
            "items"=>array("at night","She","late","until 11 o'clock.","often works"),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3p.mp3',
                    "timeRange"     =>"02:53-02:59",
                    "text" => "She often works late at night until 11 o'clock.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3p.mp3',
                    "timeRange"     =>"02:53-02:59",
                    "text" => "She often works late at night until 11 o'clock.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"7",
            "content_id"=>457,
            "media_filename"=>'media/u3p.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_conjunction_clause",
            "timeRange"     =>"03:17-03:24",
            "scores"=>1,
            "answer"=>"Last weekend Helen took Alice to the theatre to see a new movie",
            "text"=>"Last weekend Helen took Alice to the theatre to see a new movie. ",
            "items"=>array("Last weekend","to the theatre","took Alice","to see a new movie.","Helen"),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3p.mp3',
                    "timeRange"     =>"03:17-03:24",
                    "text"=>"Last weekend Helen took Alice to the theatre to see a new movie.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3p.mp3',
                    "timeRange"     =>"03:17-03:24",
                    "text"=>"Last weekend Helen took Alice to the theatre to see a new movie.",
                    ),
            ),
            "picture"=>"images/type_speak_001.png"
        );


        $data['events'][] = array(
            "num"=>"8",
            "content_id"=>458,
            "media_filename"=>'media/u3d.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_conjunction_clause",
            "timeRange"     =>"00:38-00:42",
            "scores"=>1,
            "answer"=>"I stayed in Europe for about a month",
            "text" => "I stayed in Europe for about a month. ",
            "items"=>array("I","for","in Europe","about a month.","stayed"),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3d.mp3',
                    "timeRange"     =>"00:38-00:42",
                    "text" => "I stayed in Europe for about a month.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3d.mp3',
                    "timeRange"     =>"00:38-00:42",
                    "text" => "I stayed in Europe for about a month.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"9",
            "content_id"=>459,
            "media_filename"=>'media/u3d.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_conjunction_clause",
            "timeRange"     =>"01:38-01:43",
            "scores"=>1,
            "answer"=>"He sings there three nights a week after work",
            "text" => "He sings there three nights a week after work.",
            "items"=>array("sings there","He","a week","after work.","three nights"),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3d.mp3',
                    "timeRange"     =>"01:38-01:43",
                    "text" => "He sings there three nights a week after work.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3d.mp3',
                    "timeRange"     =>"01:38-01:43",
                    "text" => "He sings there three nights a week after work.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"10",
            "content_id"=>460,
            "media_filename"=>'media/u3d.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_conjunction_clause",
            "timeRange"     =>"01:50-01:56",
            "scores"=>1,
            "answer"=>"He was born in France and is now working in Venice",
            "text" => "He was born in France and is now working in Venice.",
            "items"=>array("He was born","is now working","in Venice.","and","in France"),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3d.mp3',
                    "timeRange"     =>"01:50-01:56",
                    "text" => "He was born in France and is now working in Venice.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3d.mp3',
                    "timeRange"     =>"01:50-01:56",
                    "text" => "He was born in France and is now working in Venice.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $this->saveEventListToDatabases($data);
        $a =  json_encode($data);
        $fp = fopen('json43.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
        return;
    }

    public function getPart44(){
        $data = array(
            "unit_id"       =>3,
            "lesson_id"     =>15,
            "part_id"       =>44,
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
            "content_id"=>461,
            "media_filename"=>'media/u3p.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"01:50-01:57",
            "scores"=>1,
            "text" => "Alice Austin is Helen's colleague and good friend.",
            "answer" => "Alice Austin is Helen's colleague and good friend",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3p.mp3',
                    "timeRange"     =>"01:50-01:57",
                    "text" => "Alice Austin is Helen's colleague and good friend.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3p.mp3',
                    "timeRange"     =>"01:50-01:57",
                    "text" => "Alice Austin is Helen's colleague and good friend.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"2",
            "content_id"=>462,
            "media_filename"=>'media/u3p.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"01:57-02:05",
            "scores"=>1,
            "text" => "They were high school classmates and university basketball team-mates. ",
            "answer" => "They were high school classmates and university basketball team-mates",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3p.mp3',
                    "timeRange"     =>"01:57-02:05",
                    "text" => "They were high school classmates and university basketball team-mates.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3p.mp3',
                    "timeRange"     =>"01:57-02:05",
                    "text" => "They were high school classmates and university basketball team-mates.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"3",
            "content_id"=>463,
            "media_filename"=>'media/u3p.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"02:48-02:53",
            "scores"=>1,
            "text" => "Alice is good at her job and hard-working. ",
            "answer" => "Alice is good at her job and hard-working",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3p.mp3',
                    "timeRange"     =>"02:48-02:53",
                    "text" => "Alice is good at her job and hard-working.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3p.mp3',
                    "timeRange"     =>"02:48-02:53",
                    "text" => "Alice is good at her job and hard-working.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"4",
            "content_id"=>464,
            "media_filename"=>'media/u3p.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"03:12-03:17",
            "scores"=>1,
            "text" => "She likes swimming and outdoor activities. ",
            "answer" => "She likes swimming and outdoor activities",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3p.mp3',
                    "timeRange"     =>"03:12-03:17",
                    "text" => "She likes swimming and outdoor activities.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3p.mp3',
                    "timeRange"     =>"03:12-03:17",
                    "text" => "She likes swimming and outdoor activities.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"5",
            "content_id"=>465,
            "media_filename"=>'media/u3d.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"00:10-00:13",
            "scores"=>1,
            "text" => "How was your trip? ",
            "answer" => "How was your trip",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3d.mp3',
                    "timeRange"     =>"00:10-00:13",
                    "text" => "How was your trip? ",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3d.mp3',
                    "timeRange"     =>"00:10-00:13",
                    "text" => "How was your trip? ",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"6",
            "content_id"=>466,
            "media_filename"=>'media/u3d.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"00:16-00:19",
            "scores"=>1,
            "text" => "It was fantastic. ",
            "answer" => "It was fantastic",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3d.mp3',
                    "timeRange"     =>"00:16-00:19",
                    "text" => "It was fantastic.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3d.mp3',
                    "timeRange"     =>"00:16-00:19",
                    "text" => "It was fantastic.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"7",
            "content_id"=>467,
            "media_filename"=>'media/u3d.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"00:23-00:27",
            "scores"=>1,
            "text" => "Here are some pictures I took on my trip.",
            "answer" => "Here are some pictures I took on my trip",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3d.mp3',
                    "timeRange"     =>"00:23-00:27",
                    "text" => "Here are some pictures I took on my trip.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3d.mp3',
                    "timeRange"     =>"00:23-00:27",
                    "text" => "Here are some pictures I took on my trip.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"8",
            "content_id"=>468,
            "media_filename"=>'media/u3d.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"00:27-00:31",
            "scores"=>1,
            "text" => "You took so many pictures.",
            "answer" => "You took so many pictures",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3d.mp3',
                    "timeRange"     =>"00:27-00:31",
                    "text" => "You took so many pictures.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3d.mp3',
                    "timeRange"     =>"00:27-00:31",
                    "text" => "You took so many pictures.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"9",
            "content_id"=>469,
            "media_filename"=>'media/u3d.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"00:31-00:35",
            "scores"=>1,
            "text" => "It was a long trip, wasn't it? ",
            "answer" => "It was a long trip, wasn't it?",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3d.mp3',
                    "timeRange"     =>"00:31-00:35",
                    "text" => "It was a long trip, wasn't it?",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3d.mp3',
                    "timeRange"     =>"00:31-00:35",
                    "text" => "It was a long trip, wasn't it?",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"10",
            "content_id"=>470,
            "media_filename"=>'media/u3d.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"00:53-00:58",
            "scores"=>1,
            "text" => "Who's the woman next to you in this picture?",
            "answer" => "Who's the woman next to you in this picture",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3d.mp3',
                    "timeRange"     =>"00:53-00:58",
                    "text" => "Who's the woman next to you in this picture?",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3d.mp3',
                    "timeRange"     =>"00:53-00:58",
                    "text" => "Who's the woman next to you in this picture?",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"11",
            "content_id"=>471,
            "media_filename"=>'media/u3d.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"01:16-01:20",
            "scores"=>1,
            "text" => "Who is the man with the microphone? ",
            "answer" => "Who is the man with the microphone",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3d.mp3',
                    "timeRange"     =>"01:16-01:20",
                    "text" => "Who is the man with the microphone?",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3d.mp3',
                    "timeRange"     =>"01:16-01:20",
                    "text" => "Who is the man with the microphone?",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"12",
            "content_id"=>472,
            "media_filename"=>'media/u3d.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"01:20-01:24",
            "scores"=>1,
            "text" => "Is he a professional singer?",
            "answer" => "Is he a professional singer",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3d.mp3',
                    "timeRange"     =>"01:20-01:24",
                    "text" => "Is he a professional singer?",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3d.mp3',
                    "timeRange"     =>"01:20-01:24",
                    "text" => "Is he a professional singer?",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"13",
            "content_id"=>473,
            "media_filename"=>'media/u3d.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"02:52-02:56",
            "scores"=>1,
            "text" => "He's a really good singer. ",
            "answer" => "He's a really good singer",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3d.mp3',
                    "timeRange"     =>"02:52-02:56",
                    "text" => "He's a really good singer.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3d.mp3',
                    "timeRange"     =>"02:52-02:56",
                    "text" => "He's a really good singer.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"14",
            "content_id"=>474,
            "media_filename"=>'media/u3d.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"02:56-03:00",
            "scores"=>1,
            "text" => "Oh, that's really interesting. ",
            "answer" => "Oh, that's really interesting",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3d.mp3',
                    "timeRange"     =>"02:56-03:00",
                    "text" => "Oh, that's really interesting.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3d.mp3',
                    "timeRange"     =>"02:56-03:00",
                    "text" => "Oh, that's really interesting.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"15",
            "content_id"=>475,
            "media_filename"=>'media/u3d.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"03:05-03:09",
            "scores"=>1,
            "text" => "Hope to see you again next Saturday.",
            "answer" => "Hope to see you again next Saturday.",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3d.mp3',
                    "timeRange"     =>"03:05-03:09",
                    "text" => "Hope to see you again next Saturday.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3d.mp3',
                    "timeRange"     =>"03:05-03:09",
                    "text" => "Hope to see you again next Saturday.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $this->saveEventListToDatabases($data);
        $a =  json_encode($data);
        $fp = fopen('json44.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
        return;
    }

    public function getPart45(){
        $data = array(
            "unit_id"       =>3,
            "lesson_id"     =>16,
            "part_id"       =>45,
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
            "content_id"=>476,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"00:00-00:06",
            "scores"=>10,
            "text" => "— What is Leo like? — _ ",
            "answer" => "— What is Leo like? — He is nice and experienced",
            "items" => array(
                "0"=>array("item"=>"He likes traveling.","isCorrect"=>false),
                "1"=>array("item"=>"He is nice and experienced.", "isCorrect"=>true),
                "2"=>array("item"=>"He is an engineer.", "isCorrect"=>false),
                "3"=>array("item"=>"He looks like a movie star.", "isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3gfi.mp3',
                    "timeRange"     =>"00:00-00:07",
                    "text" => "He is nice and experienced",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3gfi.mp3',
                    "timeRange"     =>"00:00-00:07",
                    "text" => "He is nice and experienced.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"2",
            "content_id"=>477,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"00:07-00:12",
            "scores"=>10,
            "text" => "What Andy said sounds _ .",
            "answer"=>"What Andy said sounds interesting",
            "items" => array(
                "0"=>array("item"=>"well","isCorrect"=>false),
                "1"=>array("item"=>"interesting", "isCorrect"=>true),
                "2"=>array("item"=>"interestingly", "isCorrect"=>false),
                "3"=>array("item"=>"nicely","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3gfi.mp3',
                    "timeRange"     =>"00:07-00:12",
                    "text"=>"What Andy said sounds interesting.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3gfi.mp3',
                    "timeRange"     =>"00:07-00:12",
                    "text"=>"What Andy said sounds interesting.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"3",
            "content_id"=>478,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"00:12-00:17",
            "scores"=>10,
            "text" => "Alice's voice _ as if she has a cold.",
            "answer"=>"Alice's voice sounds as if she has a cold",
            "items" => array(
                "0"=>array("item"=>"seems","isCorrect"=>false),
                "1"=>array("item"=>"hears", "isCorrect"=>false),
                "2"=>array("item"=>"listens", "isCorrect"=>false),
                "3"=>array("item"=>"sounds ","isCorrect"=>true),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3gfi.mp3',
                    "timeRange"     =>"00:12-00:17",
                    "text"=>"Alice's voice sounds as if she has a cold.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3gfi.mp3',
                    "timeRange"     =>"00:12-00:17",
                    "text"=>"Alice's voice sounds as if she has a cold.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );
        $data['events'][] = array(
            "num"=>"4",
            "content_id"=>479,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"00:17-00:22",
            "scores"=>10,
            "text" => "Helen's skirt _ silky.",
            "answer"=>"Helen's skirt feels silky",
            "items" => array(
                "0"=>array("item"=>"turns","isCorrect"=>false),
                "1"=>array("item"=>"feels", "isCorrect"=>true),
                "2"=>array("item"=>"seems", "isCorrect"=>false),
                "3"=>array("item"=>"looks","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3gfi.mp3',
                    "timeRange"     =>"00:17-00:22",
                    "text"=>"Helen's skirt feels silky.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3gfi.mp3',
                    "timeRange"     =>"00:17-00:22",
                    "text"=>"Helen's skirt feels silky.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"5",
            "content_id"=>480,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"00:22-00:28",
            "scores"=>10,
            "text" => "Andy looks _ he hadn't had any sleep for three days.",
            "answer"=>"Andy looks as if he hadn't had any sleep for three days",
            "items" => array(
                "0"=>array("item"=>"as if", "isCorrect"=>true),
                "1"=>array("item"=>"that","isCorrect"=>false),
                "2"=>array("item"=>"like", "isCorrect"=>false),
                "3"=>array("item"=>"when","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3gfi.mp3',
                    "timeRange"     =>"00:22-00:28",
                    "text"=>"Andy looks as if he hadn't had any sleep for three days.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3gfi.mp3',
                    "timeRange"     =>"00:22-00:28",
                    "text"=>"Andy looks as if he hadn't had any sleep for three days.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"6",
            "content_id"=>481,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"00:28-00:34",
            "scores"=>10,
            "text" => "It _ that Lily and Helen are good friends.",
            "answer"=>"It seems that Lily and Helen are good friends",
            "items" => array(
                "0"=>array("item"=>"looks", "isCorrect"=>false),
                "1"=>array("item"=>"shows","isCorrect"=>false),
                "2"=>array("item"=>"seems", "isCorrect"=>true),
                "3"=>array("item"=>"appears","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3gfi.mp3',
                    "timeRange"     =>"00:28-00:34",
                    "text"=>"It seems that Lily and Helen are good friends",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3gfi.mp3',
                    "timeRange"     =>"00:28-00:34",
                    "text"=>"It seems that Lily and Helen are good friends",
                    ),
            ),
            "picture"=>"images/type_click_001.png"
        );
        $data['events'][] = array(
            "num"=>"7",
            "content_id"=>482,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"00:34-00:40",
            "scores"=>10,
            "text" => "The chocolate Andy brought back from Europe _ .",
            "answer"=>"The chocolate Andy brought back from Europe tasted good",
            "items" => array(
                "0"=>array("item"=>"taste good", "isCorrect"=>false),
                "1"=>array("item"=>"is tasted good","isCorrect"=>false),
                "2"=>array("item"=>"is tasted well", "isCorrect"=>false),
                "3"=>array("item"=>"tasted good","isCorrect"=>true),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3gfi.mp3',
                    "timeRange"     =>"00:34-00:40",
                    "text"=>"Ohe chocolate Andy brought back from Europe tasted good.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3gfi.mp3',
                    "timeRange"     =>"00:34-00:40",
                    "text"=>"Ohe chocolate Andy brought back from Europe tasted good.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"8",
            "content_id"=>483,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"00:40-00:47",
            "scores"=>10,
            "text" => "I like shirts made of pure cotton because they _ very soft.",
            "answer"=>"I like shirts made of pure cotton because they feel very soft",
            "items" => array(
                "0"=>array("item"=>"feel", "isCorrect"=>true),
                "1"=>array("item"=>"felt","isCorrect"=>false),
                "2"=>array("item"=>"are feeling", "isCorrect"=>true),
                "3"=>array("item"=>"are felt","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3gfi.mp3',
                    "timeRange"     =>"00:40-00:47",
                    "text"=>"I like shirts made of pure cotton because they feel very soft.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3gfi.mp3',
                    "timeRange"     =>"00:40-00:47",
                    "text"=>"I like shirts made of pure cotton because they feel very soft.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"9",
            "content_id"=>484,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"00:47-00:55",
            "scores"=>10,
            "text" => "Andy _ so tired after the trip that he _ asleep as soon as he went to bed.",
            "answer"=>"Andy was so tired after the trip that he fell asleep as soon as he went to bed",
            "items" => array(
                "0"=>array("item"=>"went", "isCorrect"=>false),
                "1"=>array("item"=>"fall","isCorrect"=>false),
                "2"=>array("item"=>"fell", "isCorrect"=>true),
                "3"=>array("item"=>"was","isCorrect"=>true),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3gfi.mp3',
                    "timeRange"     =>"00:47-00:55",
                    "text"=>"Andy was so tired after the trip that he fell asleep as soon as he went to bed.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3gfi.mp3',
                    "timeRange"     =>"00:47-00:55",
                    "text"=>"Andy was so tired after the trip that he fell asleep as soon as he went to bed.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );
        $data['events'][] = array(
            "num"=>"10",
            "content_id"=>485,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"00:55-01:05",
            "scores"=>10,
            "text" => "-- Let's go back home. It's _ dark.-- OK. And it _ that it's going to rain soon.",
            "answer"=>"-- Let's go back home. It's getting dark.-- OK. And it seems that it's going to rain soon.",
            "items" => array(
                "0"=>array("item"=>"looked", "isCorrect"=>false),
                "1"=>array("item"=>"getting","isCorrect"=>true),
                "2"=>array("item"=>"seems", "isCorrect"=>true),
                "3"=>array("item"=>"growing","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3gfi.mp3',
                    "timeRange"     =>"00:55-01:05",
                    "text" => "-- Let's go back home. It's getting dark.-- OK. And it seems that it's going to rain soon.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3gfi.mp3',
                    "timeRange"     =>"00:55-01:05",
                    "text" => "-- Let's go back home. It's getting dark.-- OK. And it seems that it's going to rain soon.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );
        $data['events'][] = array(
            "num"=>"11",
            "content_id"=>486,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"01:05-01:11",
            "scores"=>10,
            "text" => "Andy's trip _ to be fantastic.",
            "answer"=>"Andy's trip proved to be fantastic",
            "items" => array(
                "0"=>array("item"=>"will be proved", "isCorrect"=>false),
                "1"=>array("item"=>"was proved","isCorrect"=>false),
                "2"=>array("item"=>"proved", "isCorrect"=>true),
                "3"=>array("item"=>"is proving","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3gfi.mp3',
                    "timeRange"     =>"01:05-01:11",
                    "text"=>"JAndy's trip proved to be fantastic.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3gfi.mp3',
                    "timeRange"     =>"01:05-01:11",
                    "text"=>"JAndy's trip proved to be fantastic.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"12",
            "content_id"=>487,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"01:11-01:16",
            "scores"=>10,
            "text" => "Helen _ much younger than she really is.",
            "answer"=>"Helen appears much younger than she really is",
            "items" => array(
                "0"=>array("item"=>"becomes", "isCorrect"=>false),
                "1"=>array("item"=>"keeps","isCorrect"=>false),
                "2"=>array("item"=>"turns", "isCorrect"=>false),
                "3"=>array("item"=>"appears","isCorrect"=>true),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3gfi.mp3',
                    "timeRange"     =>"01:11-01:16",
                    "text" => "Helen appears much younger than she really is.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3gfi.mp3',
                    "timeRange"     =>"01:11-01:16",
                    "text" => "Helen appears much younger than she really is.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"13",
            "content_id"=>488,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"01:16-01:24",
            "scores"=>10,
            "text" => "--You _ pale. Are you sick?--No, I'm just a little bit tired.",
            "answer"=>"--You look pale. Are you sick?--No, I'm just a little bit tired",
            "items" => array(
                "0"=>array("item"=>"are looked", "isCorrect"=>false),
                "1"=>array("item"=>"appear", "isCorrect"=>false),
                "2"=>array("item"=>"look","isCorrect"=>true),
                "3"=>array("item"=>"feel","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3gfi.mp3',
                    "timeRange"     =>"01:16-01:24",
                    "text" => "--You look pale. Are you sick?--No, I'm just a little bit tired",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3gfi.mp3',
                    "timeRange"     =>"01:16-01:24",
                    "text" => "--You look pale. Are you sick?--No, I'm just a little bit tired",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"14",
            "content_id"=>489,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"01:24-01:32",
            "scores"=>10,
            "text" => "Leo wanted to be an engineer when he was young. His dream has _ true so far.",
            "answer"=>"Leo wanted to be an engineer when he was young. His dream has come true so far",
            "items" => array(
                "0"=>array("item"=>"become", "isCorrect"=>true),
                "1"=>array("item"=>"turned", "isCorrect"=>false),
                "2"=>array("item"=>"realized","isCorrect"=>false),
                "3"=>array("item"=>"come","isCorrect"=>true),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3gfi.mp3',
                    "timeRange"     =>"01:24-01:32",
                    "text"=>"Leo wanted to be an engineer when he was young. His dream has come true so far.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3gfi.mp3',
                    "timeRange"     =>"01:24-01:32",
                    "text"=>"Leo wanted to be an engineer when he was young. His dream has come true so far.",              ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"15",
            "content_id"=>490,
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
                    "text"=>"Although Leo has taken lots of medicine his health remains poor.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3gfi.mp3',
                    "timeRange"     =>"01:32-01:39",
                    "text"=>"Although Leo has taken lots of medicine his health remains poor.",
                    ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"16",
            "content_id"=>491,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"01:39-01:48",
            "scores"=>10,
            "text" => "--Hurry up! The concert will start in half an hour.--Oh my god! I only have 10 minutes to _ dressed?",
            "answer"=>"--Hurry up! The concert will start in half an hour.--Oh my god! I only have 10 minutes to get dressed",
            "items" => array(
                "0"=>array("item"=>"have", "isCorrect"=>true),
                "1"=>array("item"=>"go","isCorrect"=>false),
                "2"=>array("item"=>"run", "isCorrect"=>false),
                "3"=>array("item"=>"get","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3gfi.mp3',
                    "timeRange"     =>"01:39-01:48",
                    "text"=>"-Hurry up! The concert will start in half an hour.--Oh my god! I only have 10 minutes to get dressed?",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3gfi.mp3',
                    "timeRange"     =>"01:39-01:48",
                    "text"=>"-Hurry up! The concert will start in half an hour.--Oh my god! I only have 10 minutes to get dressed?",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );
        $data['events'][] = array(
            "num"=>"17",
            "content_id"=>492,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"01:48-01:55",
            "scores"=>10,
            "text" => "--I'm wondering if you could come to our party this weekend.-- _ great!",
            "answer"=>"-I'm wondering if you could come to our party this weekend.-- Sounds great",
            "items" => array(
                "0"=>array("item"=>"Sound", "isCorrect"=>false),
                "1"=>array("item"=>"Sounding","isCorrect"=>false),
                "2"=>array("item"=>"Sounds", "isCorrect"=>true),
                "3"=>array("item"=>"Sounded","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3gfi.mp3',
                    "timeRange"     =>"01:48-01:55",
                    "text"=>"-I'm wondering if you could come to our party this weekend.-- Sounds great!",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3gfi.mp3',
                    "timeRange"     =>"01:48-01:55",
                    "text"=>"-I'm wondering if you could come to our party this weekend.-- Sounds great!",

                ),
            ),
            "picture"=>"images/type_click_001.png"
        );
        $data['events'][] = array(
            "num"=>"18",
            "content_id"=>493,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"01:55-02:03",
            "scores"=>10,
            "text" => "-- Why does the room smell so _ ? -- I bought you a bunch of roses.",
            "answer"=>"-- Why does the room smell so sweet ? -- I bought you a bunch of roses.",
            "items" => array(
                "0"=>array("item"=>"nicely", "isCorrect"=>false),
                "1"=>array("item"=>"sweet","isCorrect"=>true),
                "2"=>array("item"=>"clean", "isCorrect"=>false),
                "3"=>array("item"=>"bad","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3gfi.mp3',
                    "timeRange"     =>"01:55-02:03",
                    "text"=>"-- Why does the room smell so sweet ? -- I bought you a bunch of roses.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3gfi.mp3',
                    "timeRange"     =>"01:55-02:03",
                    "text"=>"-- Why does the room smell so sweet ? -- I bought you a bunch of roses.",
                  ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"19",
            "content_id"=>494,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"02:03-02:08",
            "scores"=>10,
            "text" => "Vegetables _ quickly in summer.",
            "answer"=>"Vegetables go bad quickly in summer",
            "items" => array(
                "0"=>array("item"=>"get bad", "isCorrect"=>false),
                "1"=>array("item"=>"go bad", "isCorrect"=>true),
                "2"=>array("item"=>"get badly","isCorrect"=>false),
                "3"=>array("item"=>" go badly","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3gfi.mp3',
                    "timeRange"     =>"02:03-02:08",
                    "text"=>"TVegetables go bad quickly in summer.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3gfi.mp3',
                    "timeRange"     =>"02:03-02:08",
                    "text"=>"TVegetables go bad quickly in summer.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"20",
            "content_id"=>495,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"02:08-02:15",
            "scores"=>10,
            "text" => "Helen is sad because her new car _ scratched yesterday.",
            "answer"=>"Helen is sad because her new car got scratched yesterday.",
            "items" => array(
                "0"=>array("item"=>"got", "isCorrect"=>false),
                "1"=>array("item"=>"went", "isCorrect"=>true),
                "2"=>array("item"=>"became","isCorrect"=>false),
                "3"=>array("item"=>"turned","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3gfi.mp3',
                    "timeRange"     =>"02:08-02:15",
                    "text"=>"Helen is sad because her new car got scratched yesterday.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3gfi.mp3',
                    "timeRange"     =>"02:08-02:15",
                    "text"=>"Helen is sad because her new car got scratched yesterday.",
                    ),
            ),
            "picture"=>"images/type_click_001.png"
        );
        $this->saveEventListToDatabases($data);
        $a =  json_encode($data);
        $fp = fopen('json45.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
        return;
    }


    public function getPart46(){
        $data = array(
            "unit_id"       =>3,
            "lesson_id"     =>16,
            "part_id"       =>46,
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
            "content_id"=>496,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"00:00-00:07",
            "scores"=>1,
            "text" => "Why Elisa broke up with her boyfriend remains a secret.",
            "items" => array(
                "0"=>array("item"=>"broke up"),
                "1"=>array("item"=>"Why Elisa"),
                "2"=>array("item"=>"remains a secret."),
                "3"=>array("item"=>"with her boyfriend"),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3gso.mp3',
                    "timeRange"     =>"00:00-00:07",
                    "text" => "Why Elisa broke up with her boyfriend remains a secret.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3gso.mp3',
                    "timeRange"     =>"00:00-00:07",
                    "text" => "Why Elisa broke up with her boyfriend remains a secret.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );
        $data['events'][] = array(
            "num"=>"2",
            "content_id"=>497,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"00:07-00:12",
            "scores"=>1,
            "text" => "Both of Leo's twin daughters are very cute.",
            "items" => array(
                "0"=>array("item"=>"are"),
                "1"=>array("item"=>"Leo's twin daughters"),
                "2"=>array("item"=>"Both of"),
                "3"=>array("item"=>"very"),
                "4"=>array("item"=>"cute."),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3gso.mp3',
                    "timeRange"     =>"00:07-00:12",
                    "text" => "Both of Leo's twin daughters are very cute.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3gso.mp3',
                    "timeRange"     =>"00:07-00:12",
                    "text" => "Both of Leo's twin daughters are very cute.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );
        $data['events'][] = array(
            "num"=>"3",
            "content_id"=>498,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"00:12-00:18",
            "scores"=>1,
            "text" => "The math problem proved not difficult at all.",
            "items" => array(
                "0"=>array("item"=>"proved"),
                "1"=>array("item"=>"The math problem"),
                "2"=>array("item"=>"not"),
                "3"=>array("item"=>"at all."),
                "4"=>array("item"=>"difficult"),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3gso.mp3',
                    "timeRange"     =>"00:12-00:18",
                    "text" => "The math problem proved not difficult at all.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3gso.mp3',
                    "timeRange"     =>"00:12-00:18",
                    "text" => "The math problem proved not difficult at all.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );
        $data['events'][] = array(
            "num"=>"4",
            "content_id"=>499,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"00:18-00:24",
            "scores"=>1,
            "text" => "I got separated from my friend after entering the crowded market.",
            "items" => array(
                "0"=>array("item"=>"the crowded market."),
                "1"=>array("item"=>"after"),
                "2"=>array("item"=>"from my friend"),
                "3"=>array("item"=>"entering"),
                "4"=>array("item"=>"I got separated")
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3gso.mp3',
                    "timeRange"     =>"00:18-00:24",
                    "text" => "JI got separated from my friend after entering the crowded market.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3gso.mp3',
                    "timeRange"     =>"00:18-00:24",
                    "text" => "JI got separated from my friend after entering the crowded market.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );
        $data['events'][] = array(
            "num"=>"5",
            "content_id"=>500,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"00:24-00:31",
            "scores"=>1,
            "text" => "To all their friends, Leo and Lily seemed an ideal couple.",
            "items" => array(
                "0"=>array("item"=>"seemed"),
                "1"=>array("item"=>"To all their friends,"),
                "2"=>array("item"=>"an ideal couple."),
                "3"=>array("item"=>" Leo and Lily"),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3gso.mp3',
                    "timeRange"     =>"00:24-00:31",
                    "text" => "To all their friends, Leo and Lily seemed an ideal couple.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3gso.mp3',
                    "timeRange"     =>"00:24-00:31",
                    "text" => "To all their friends, Leo and Lily seemed an ideal couple.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );
        $data['events'][] = array(
            "num"=>"6",
            "content_id"=>501,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"00:31-00:39",
            "scores"=>1,
            "text" => "Joe seemed to have found back all his confidence since he became a singer in a pub.",
            "items" => array(
                "0"=>array("item"=>"Joe seemed to"),
                "1"=>array("item"=>"all his confidence"),
                "2"=>array("item"=>"since he became a singer"),
                "3"=>array("item"=>"in a pub."),
                "4"=>array("item"=>"have found back"),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3gso.mp3',
                    "timeRange"     =>"00:31-00:39",
                    "text" => "Joe seemed to have found back all his confidence since he became a singer in a pub.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3gso.mp3',
                    "timeRange"     =>"00:31-00:39",
                    "text" => "Joe seemed to have found back all his confidence since he became a singer in a pub.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"7",
            "content_id"=>502,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"00:39-00:45",
            "scores"=>1,
            "text" => "Joe seems not to be satisfied with his job.",
            "items" => array(
                "0"=>array("item"=>"his job."),
                "1"=>array("item"=>"Joe"),
                "2"=>array("item"=>"to be satisfied with"),
                "3"=>array("item"=>"seems"),
                "4"=>array("item"=>"not"),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3gso.mp3',
                    "timeRange"     =>"00:39-00:45",
                    "text" => "Joe seems not to be satisfied with his job.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3gso.mp3',
                    "timeRange"     =>"00:39-00:45",
                    "text" => "Joe seems not to be satisfied with his job.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"8",
            "content_id"=>503,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"00:45-00:51",
            "scores"=>1,
            "text" => "It seems as if we haven't seen each other for ages.",
            "items" => array(
                "0"=>array("item"=>"each other"),
                "1"=>array("item"=>"we haven't seen"),
                "2"=>array("item"=>"It seems"),
                "3"=>array("item"=>"for ages."),
                "4"=>array("item"=>"as if"),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3gso.mp3',
                    "timeRange"     =>"00:45-00:51",
                    "text" => "It seems as if we haven't seen each other for ages.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3gso.mp3',
                    "timeRange"     =>"00:45-00:51",
                    "text" => "It seems as if we haven't seen each other for ages.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"9",
            "content_id"=>504,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"00:51-00:57",
            "scores"=>1,
            "text" => "Thanks for the soup. It tastes delicious.",
            "items" => array(
                "0"=>array("item"=>"Thanks for the soup."),
                "1"=>array("item"=>"delicious."),
                "2"=>array("item"=>"tastes"),
                "3"=>array("item"=>"It"),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3gso.mp3',
                    "timeRange"     =>"00:51-00:57",
                    "text" => "Thanks for the soup. It tastes delicious.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3gso.mp3',
                    "timeRange"     =>"00:51-00:57",
                    "text" => "Thanks for the soup. It tastes delicious.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"10",
            "content_id"=>505,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"00:57-01:02",
            "scores"=>1,
            "text" => "Does Andy's story sound interesting to you?",
            "items" => array(
                "0"=>array("item"=>"interesting"),
                "1"=>array("item"=>"Does"),
                "2"=>array("item"=>"Andy's story sound"),
                "3"=>array("item"=>"to you?"),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3gso.mp3',
                    "timeRange"     =>"00:57-01:02",
                    "text" => "Does Andy's story sound interesting to you?",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3gso.mp3',
                    "timeRange"     =>"00:57-01:02",
                    "text" => "Does Andy's story sound interesting to you?",
                    ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"11",
            "content_id"=>506,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"01:02-01:09",
            "scores"=>1,
            "text" => "Stand still until the traffic light turns green.",
            "items" => array(
                "0"=>array("item"=>"until"),
                "1"=>array("item"=>"turns"),
                "2"=>array("item"=>"Stand still"),
                "3"=>array("item"=>"green."),
                "4"=>array("item"=>"the traffic light"),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3gso.mp3',
                    "timeRange"     =>"01:02-01:09",
                    "text" => "Stand still until the traffic light turns green.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3gso.mp3',
                    "timeRange"     =>"01:02-01:09",
                    "text" => "Stand still until the traffic light turns green.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"12",
            "content_id"=>507,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"01:09-01:16",
            "scores"=>1,
            "text" => "Meat can stay fresh for a few days if it's put in the fridge.",
            "items" => array(
                "0"=>array("item"=>"if"),
                "1"=>array("item"=>"for a few days"),
                "2"=>array("item"=>"Meat"),
                "3"=>array("item"=>"it's put in the fridge."),
                "4"=>array("item"=>"can stay fresh"),
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
            "num"=>"13",
            "content_id"=>508,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"01:16-01:22",
            "scores"=>1,
            "text" => "Helen turned pale at the news of the accident.",
            "items" => array(
                "0"=>array("item"=>"turned pale"),
                "1"=>array("item"=>"Helen"),
                "2"=>array("item"=>"the accident."),
                "3"=>array("item"=>"at"),
                "4"=>array("item"=>"the news of"),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3gso.mp3',
                    "timeRange"     =>"01:16-01:22",
                    "text" => "Helen turned pale at the news of the accident.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3gso.mp3',
                    "timeRange"     =>"01:16-01:22",
                    "text" => "Helen turned pale at the news of the accident.",
                    ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"14",
            "content_id"=>509,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"01:22-01:28",
            "scores"=>1,
            "text" => "Leo fell ill after he finished his long business trip.",
            "items" => array(
                "0"=>array("item"=>"Leo"),
                "1"=>array("item"=>"his long business trip."),
                "2"=>array("item"=>"he finished"),
                "3"=>array("item"=>"after"),
                "4"=>array("item"=>"fell ill"),
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
            "num"=>"15",
            "content_id"=>510,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"01:28-01:33",
            "scores"=>1,
            "text" => "Leaves turn yellow in late autumn.",
            "items" => array(
                "0"=>array("item"=>"Leaves"),
                "1"=>array("item"=>"yellow"),
                "2"=>array("item"=>"in late autumn."),
                "3"=>array("item"=>"turn"),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3gso.mp3',
                    "timeRange"     =>"01:28-01:33",
                    "text" => "Leaves turn yellow in late autumn.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3gso.mp3',
                    "timeRange"     =>"01:28-01:33",
                    "text" => "Leaves turn yellow in late autumn.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );
        $this->saveEventListToDatabases($data);
        $a =  json_encode($data);
        $fp = fopen('json46.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
        return;
    }

    public function getPart47(){
        $data = array(
            "unit_id"       =>3,
            "lesson_id"     =>16,
            "part_id"       =>47,
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
            "content_id"=>511,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"sr_ordering",
            "timeRange"     =>"00:00-00:04",
            "scores"=>1,
            "text" => "Don't keep silent in class.",
            "answer" => "Don't keep silent in class",
            "items" => array(
                "0"=>array("item"=>"keep"),
                "1"=>array("item"=>"Don't"),
                "2"=>array("item"=>"in class."),
                "3"=>array("item"=>"silent"),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3gsf.mp3',
                    "timeRange"     =>"00:00-00:04",
                    "text" => "Don't keep silent in class.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3gsf.mp3',
                    "timeRange"     =>"00:00-00:04",
                    "text" => "Don't keep silent in class.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"2",
            "content_id"=>512,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"sr_ordering",
            "timeRange"     =>"00:04-00:11",
            "scores"=>1,
            "text" => "Andy's trip to Europe turned out to be a wonderful experience.",
            "answer" => "Andy's trip to Europe turned out to be a wonderful experience",
            "items" => array(
                "0"=>array("item"=>"experience."),
                "1"=>array("item"=>"to Europe"),
                "2"=>array("item"=>"a wonderful"),
                "3"=>array("item"=>"Andy's trip"),
                "4"=>array("item"=>"turned out to be"),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3gsf.mp3',
                    "timeRange"     =>"00:04-00:11",
                    "text" => "Andy's trip to Europe turned out to be a wonderful experience.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3gsf.mp3',
                    "timeRange"     =>"00:04-00:11",
                    "text" => "Andy's trip to Europe turned out to be a wonderful experience.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"3",
            "content_id"=>513,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"sr_ordering",
            "timeRange"     =>"00:11-00:165",
            "scores"=>1,
            "text" => "You look very tired. What happened to you?",
            "answer" => "You look very tired What happened to you?",
            "items" => array(
                "0"=>array("item"=>"You"),
                "1"=>array("item"=>"look"),
                "2"=>array("item"=>"very tired"),
                "3"=>array("item"=>"What happened to you?"),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3gsf.mp3',
                    "timeRange"     =>"00:11-00:16",
                    "text" => "You look very tired. What happened to you?",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3gsf.mp3',
                    "timeRange"     =>"00:11-00:16",
                    "text" => "You look very tired. What happened to you?",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"4",
            "content_id"=>514,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"sr_ordering",
            "timeRange"     =>"00:16-00:21",
            "scores"=>1,
            "text" => "When did Leo and Lily get married?",
            "answer" => "When did Leo and Lily get married?",
            "items" => array(
                "0"=>array("item"=>"When"),
                "1"=>array("item"=>"get married?"),
                "2"=>array("item"=>"did"),
                "3"=>array("item"=>"Leo and Lily"),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3gsf.mp3',
                    "timeRange"     =>"00:16-00:21",
                    "text" => "When did Leo and Lily get married?",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3gsf.mp3',
                    "timeRange"     =>"00:16-00:21",
                    "text" => "When did Leo and Lily get married?",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"5",
            "content_id"=>515,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"sr_ordering",
            "timeRange"     =>"00:21-00:26",
            "scores"=>1,
            "text" => "There seems to be something wrong with my cellphone.",
            "answer" => "There seems to be something wrong with my cellphone",
            "items" => array(
                "0"=>array("item"=>"There seems"),
                "1"=>array("item"=>"with"),
                "2"=>array("item"=>"something wrong"),
                "3"=>array("item"=>"to be"),
                "4"=>array("item"=>"my cellphone."),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3gsf.mp3',
                    "timeRange"     =>"00:21-00:26",
                    "text" => "There seems to be something wrong with my cellphone.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3gsf.mp3',
                    "timeRange"     =>"00:21-00:26",
                    "text" => "There seems to be something wrong with my cellphone.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"6",
            "content_id"=>516,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"sr_ordering",
            "timeRange"     =>"00:26-00:31",
            "scores"=>1,
            "text" => "A good medicine tastes bitter.",
            "answer" => "A good medicine tastes bitter.",
            "items" => array(
                "0"=>array("item"=>"good"),
                "1"=>array("item"=>"A"),
                "2"=>array("item"=>"tastes"),
                "3"=>array("item"=>"bitter."),
                "4"=>array("item"=>"medicine"),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3gsf.mp3',
                    "timeRange"     =>"00:26-00:31",
                    "text" => "A good medicine tastes bitter.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3gsf.mp3',
                    "timeRange"     =>"00:26-00:31",
                    "text" => "A good medicine tastes bitter.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"7",
            "content_id"=>517,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"sr_ordering",
            "timeRange"     =>"00:31-00:36",
            "scores"=>1,
            "text" => "Alice got injured while playing tennis yesterday.",
            "answer" => "Alice got injured while playing tennis yesterday",
            "items" => array(
                "0"=>array("item"=>"while"),
                "1"=>array("item"=>"Alice"),
                "2"=>array("item"=>"yesterday."),
                "3"=>array("item"=>"playing tennis"),
                "4"=>array("item"=>"got injured"),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3gsf.mp3',
                    "timeRange"     =>"00:31-00:36",
                    "text" => "Alice got injured while playing tennis yesterday.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3gsf.mp3',
                    "timeRange"     =>"00:31-00:36",
                    "text" => "Alice got injured while playing tennis yesterday.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"8",
            "content_id"=>518,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"sr_ordering",
            "timeRange"     =>"00:36-00:42",
            "scores"=>1,
            "text" => "I felt very hungry after taking the exam.",
            "answer" => "I felt very hungry after taking the exam",
            "items" => array(
                "0"=>array("item"=>"very hungry"),
                "1"=>array("item"=>"I"),
                "2"=>array("item"=>"after"),
                "3"=>array("item"=>"felt"),
                "4"=>array("item"=>"taking the exam."),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3gsf.mp3',
                    "timeRange"     =>"00:36-00:42",
                    "text" => "I felt very hungry after taking the exam.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3gsf.mp3',
                    "timeRange"     =>"00:36-00:42",
                    "text" => "I felt very hungry after taking the exam.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"9",
            "content_id"=>519,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"sr_ordering",
            "timeRange"     =>"00:42-00:48",
            "scores"=>1,
            "text" => "It feels good to swim in cold water in summer.",
            "answer" => "It feels good to swim in cold water in summer",
            "items" => array(
                "0"=>array("item"=>"It feels"),
                "1"=>array("item"=>"in summer."),
                "2"=>array("item"=>"to swim"),
                "3"=>array("item"=>"in cold water"),
                "4"=>array("item"=>"good"),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3gsf.mp3',
                    "timeRange"     =>"00:42-00:48",
                    "text" => "It feels good to swim in cold water in summer.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u3gsf.mp3',
                    "timeRange"     =>"00:42-00:48",
                    "text" => "It feels good to swim in cold water in summer.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"10",
            "content_id"=>520,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"sr_ordering",
            "timeRange"     =>"00:48-00:53",
            "scores"=>1,
            "text" => "It's going to stay hot for the next few days.",
            "answer" => "It's going to stay hot for the next few days",
            "items" => array(
                "0"=>array("item"=>"hot"),
                "1"=>array("item"=>"It's going to"),
                "2"=>array("item"=>"the next few days."),
                "3"=>array("item"=>"for"),
                "4"=>array("item"=>"stay"),
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
        $this->saveEventListToDatabases($data);
        $a =  json_encode($data);
        $fp = fopen('json47.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
        return;
    }

    //最新MT
    public function getPart48(){
        $data = array(
            "unit_id"       =>3,
            "lesson_id"     =>17,
            "part_id"       =>48,
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
                2=>array(4,1,3),
                3=>array(2,5,1)
            ),
            "keywords"   =>array(
            ),
        );

        $data['events'][] = array(
            "num"=>"1",
            "type"=>"MTmultipleChoices",
            "media_type"=>"audio",
            "media_filename"=>'media/u3p_original_mt.mp3',
            "timeRange"=>"00:45-01:08",
            "content"=>"Leo works as an engineer in an international company. Since last year, Leo has been flying around the world to recruit computer technicians for the company's international branches. Lily currently works as a human resource manager in a big automobile company.",
            "text"=>"Leo works as an engineer in an international company. Since last year, Leo has been flying around the world to recruit computer technicians for the company's international branches. Lily currently works as a human resource manager in a big automobile company.",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"1",
                    "content_id"=>521,
                    "type"=>"multipleChoice",
                    "text"=>array("type"=>"text","text"=>"What does Leo do?"),
                    "scores"=>5,
                    "items"=>array(
                        "0"=>array("item"=>"He is an engineer.","isCorrect"=>true),
                        "1"=>array("item"=>"He is a human resource manager.", "isCorrect"=>false),
                        "2"=>array("item"=>"He is a boss of an international company.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                    ),
                ),
                1=>array(
                    "num"=>"1",
                    "content_id"=>522,
                    "type"=>"multipleChoice",
                    "text"=>array("type"=>"text","text"=>"Why did Leo fly around the world last year?"),
                    "scores"=>5,
                    "items"=>array(
                        "0"=>array("item"=>"To give speech to technicians.","isCorrect"=>false),
                        "1"=>array("item"=>"To find good computer technicians for the company.", "isCorrect"=>true),
                        "2"=>array("item"=>"To travel for fun.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                    ),
                ),
                2=>array(
                    "num"=>"1",
                    "content_id"=>523,
                    "type"=>"multipleChoice",
                    "text"=>array("type"=>"text","text"=>"Do Leo and Lily do the same job?"),
                    "scores"=>5,
                    "items"=>array(
                        "0"=>array("item"=>"Yes.","isCorrect"=>false),
                        "1"=>array("item"=>"No. ", "isCorrect"=>true),
                        "2"=>array("item"=>"It doesn't mention.", "isCorrect"=>false),
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
            "media_filename"=>'media/u3d_original_mt.mp3',
            "timeRange"=>"00:00-00:11",
            "content"=>"Helen: Hi, Andy. How was your trip? When did you come back?Andy: It was fantastic. I got home last Saturday. Here are some pictures I took on my trip.",
            "text"=>"Helen: Hi, Andy. How was your trip? When did you come back?Andy: It was fantastic. I got home last Saturday. Here are some pictures I took on my trip.",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"1",
                    "content_id"=>524,
                    "type"=>"multipleChoice",
                    "text"=>array("type"=>"text","text"=>"How was Andy's trip?"),
                    "scores"=>5,
                    "items"=>array(
                        "0"=>array("item"=>"It was tiring.","isCorrect"=>false),
                        "1"=>array("item"=>"It was terrific.", "isCorrect"=>true),
                        "2"=>array("item"=>"It was frustrating.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                    ),
                ),
                1=>array(
                    "num"=>"1",
                    "content_id"=>525,
                    "type"=>"multipleChoice",
                    "text"=>array("type"=>"text","text"=>"What are they talking about in this dialog?"),
                    "scores"=>5,
                    "items"=>array(
                        "0"=>array("item"=>"Andy's trip to Europe.","isCorrect"=>true),
                        "1"=>array("item"=>"Andy's friends.", "isCorrect"=>false),
                        "2"=>array("item"=>"Andy's pictures.", "isCorrect"=>false),
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
            "media_filename"=>'media/u3d_original_mt.mp3',
            "timeRange"=>"00:14-00:26",
            "content"=>"Helen: It was a long trip, wasn't it?Andy: Definitely. I stayed in Europe for about a month. I went to many different places and got to know lots of different people from all kinds of professions.",
            "text"=>"Helen: It was a long trip, wasn't it?Andy: Definitely. I stayed in Europe for about a month. I went to many different places and got to know lots of different people from all kinds of professions.",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"1",
                    "content_id"=>526,
                    "type"=>"multipleChoice",
                    "text"=>array("type"=>"text","text"=>"How long had he stayed in Europe?"),
                    "scores"=>5,
                    "items"=>array(
                        "0"=>array("item"=>"A couple of days.","isCorrect"=>false),
                        "1"=>array("item"=>"About four weeks.", "isCorrect"=>true),
                        "2"=>array("item"=>"Half a year.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                    ),
                ),
                1=>array(
                    "num"=>"1",
                    "content_id"=>527,
                    "type"=>"multipleChoice",
                    "text"=>array("type"=>"text","text"=>"Andy got to know many people of different _________."),
                    "scores"=>5,
                    "items"=>array(
                        "0"=>array("item"=>"Jobs.","isCorrect"=>true),
                        "1"=>array("item"=>"Nations.", "isCorrect"=>false),
                        "2"=>array("item"=>"Interests.", "isCorrect"=>false),
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
            "media_filename"=>'media/u3d_original_mt.mp3',
            "timeRange"=>"00:31-00:44",
            "content"=>"Andy: She is Lily, the woman I met on a plane from Paris to Rome. She is 55 years old and was on her way to attend her son's university graduation ceremony. Helen: I see.",
            "text"=>"Andy: She is Lily, the woman I met on a plane from Paris to Rome. She is 55 years old and was on her way to attend her son's university graduation ceremony. Helen: I see.",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"1",
                    "content_id"=>528,
                    "type"=>"multipleChoice",
                    "text"=>array("type"=>"text","text"=>"Why did Lily go to Rome?"),
                    "scores"=>5,
                    "items"=>array(
                        "0"=>array("item"=>"To attend her son's wedding ceremony.","isCorrect"=>false),
                        "1"=>array("item"=>"To attend the opening ceremony of a university.", "isCorrect"=>false),
                        "2"=>array("item"=>"To attend her son's graduation ceremony.", "isCorrect"=>true),
                    ),
                    "selectEvents"=>array(
                    ),
                ),
                1=>array(
                    "num"=>"1",
                    "content_id"=>529,
                    "type"=>"multipleChoice",
                    "text"=>array("type"=>"text","text"=>"How old is Lily's son?"),
                    "scores"=>5,
                    "items"=>array(
                        "0"=>array("item"=>"About 22 years old.","isCorrect"=>true),
                        "1"=>array("item"=>"About 12 years old.", "isCorrect"=>false),
                        "2"=>array("item"=>"About 2 years old.", "isCorrect"=>false),
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
            "media_filename"=>'media/u3d_original_mt.mp3',
            "timeRange"=>"00:49-01:02",
            "content"=>"That's Joe. He actually works for a small international company as an accountant, but he's a part time singer at this popular pub in Venice. He sings there three nights a week after work.",
            "text"=>"That's Joe. He actually works for a small international company as an accountant, but he's a part time singer at this popular pub in Venice. He sings there three nights a week after work.",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"1",
                    "content_id"=>530,
                    "type"=>"multipleChoice",
                    "text"=>array("type"=>"text","text"=>"What is his full-time job?"),
                    "scores"=>5,
                    "items"=>array(
                        "0"=>array("item"=>"Singer.","isCorrect"=>false),
                        "1"=>array("item"=>"Accountant.", "isCorrect"=>true),
                        "2"=>array("item"=>"Translator.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                    ),
                ),
                1=>array(
                    "num"=>"2",
                    "content_id"=>531,
                    "type"=>"multipleChoice",
                    "text"=>array("type"=>"text","text"=>"How often does Joe sing in a pub?"),
                    "scores"=>5,
                    "items"=>array(
                        "0"=>array("item"=>"Twice a week.","isCorrect"=>false),
                        "1"=>array("item"=>"More than 10 times a month.", "isCorrect"=>true),
                        "2"=>array("item"=>"Every night after work.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                    ),
                )
            ),
            "picture"=>"images/type_listen_001.png"
        );
        $this->saveEventListToDatabases($data);
        $a =  json_encode($data);
        $fp = fopen('json48.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
        return;
    }

    public function getPart49(){
        $data = array(
            "unit_id"       =>3,
            "lesson_id"     =>17,
            "part_id"       =>49,
            "media_filename"=>'',
            "content_totalcount"  => 5,
            "content_perpage"     => 5,
            "content_perPageCount"=>1,
            "media_type"    =>'audio',
            "totalTime"     =>"4:54",
            "part_type"     =>"questions",
            "have_questions"=>true,
            "questions_type"=>"text",
            "selectItems"   =>array(
                1=>array(1,2,3,4,5),
                2=>array(5,4,3,2,1),
            ),
            "keywords"      =>array(
            ),
        );

        $data['events'][] = array(
            "num"=>"1",
            "content_id"=>532,
            "type"=>"MTmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u3p_original_mt.mp3',
            "timeRange"=>"00:00-00:12",
            "content"=>"Leo Black comes from England. They both live in New York. He lives in the same community as Helen does. Leo is Helen's neighbor.",
            "text"=>array("type"=>"audio","text"=>"Where is Helen living? ","media_filename"=>'media/u3_difficult_questions.mp3',"timeRange"=>"00:00-00:04"),
            "scores"=>7,
            "items"=>array(
                "0"=>array("item"=>"The United States.","isCorrect"=>true),
                "1"=>array("item"=>"England.", "isCorrect"=>false),
                "2"=>array("item"=>"Africa.", "isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_listen_001.png"
        );

        $data['events'][] = array(
            "num"=>"2",
            "content_id"=>533,
            "type"=>"MTmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u3p_original_mt.mp3',
            "timeRange"=>"00:26-00:38",
            "content"=>"Leo is married. His wife's name is Lily. They have twin daughters who are both 5 years old. They are really cute. ",
            "text"=>array("type"=>"audio","text"=>"How many children do Leo and Lily have?","media_filename"=>'media/u3_difficult_questions.mp3',"timeRange"=>"00:13-00:18"),
            "scores"=>7,
            "items"=>array(
                "0"=>array("item"=>"1 daughter.","isCorrect"=>false),
                "1"=>array("item"=>"2 daughters.", "isCorrect"=>true),
                "2"=>array("item"=>"1 daughter and 1 son.", "isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_listen_001.png"
        );

        $data['events'][] = array(
            "num"=>"3",
            "content_id"=>534,
            "type"=>"MTmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u3p_original_mt.mp3',
            "timeRange"=>"01:28-01:39",
            "content"=>"Alice Austin is Helen's colleague and good friend. They were high school classmates and university basketball team-mates.",
            "text"=>array("type"=>"audio","text"=>"Do both Alice and Helen love sports?","media_filename"=>'media/u3_difficult_questions.mp3',"timeRange"=>"00:36-00:41"),
            "scores"=>7,
            "items"=>array(
                "0"=>array("item"=>"Yes.","isCorrect"=>true),
                "1"=>array("item"=>"No.", "isCorrect"=>false),
                "2"=>array("item"=>"It doesn't mention.", "isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_listen_001.png"
        );

        $data['events'][] = array(
            "num"=>"4",
            "content_id"=>535,
            "type"=>"MTmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u3p_original_mt.mp3',
            "timeRange"=>"02:30-02:38",
            "content"=>"She often goes to visit Helen and her family. She likes swimming and outdoor activities. ",
            "text"=>array("type"=>"audio","text"=>"Which activity might she like to do?","media_filename"=>'media/u3_difficult_questions.mp3',"timeRange"=>"00:49-00:54"),
            "scores"=>7,
            "items"=>array(
                "0"=>array("item"=>"Yoga.","isCorrect"=>false),
                "1"=>array("item"=>"Skiing.", "isCorrect"=>true),
                "2"=>array("item"=>"Bowling.", "isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_listen_001.png"
        );

        $data['events'][] = array(
            "num"=>"5",
            "content_id"=>536,
            "type"=>"MTmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u3d_original_mt.mp3',
            "timeRange"=>"01:55-02:06",
            "content"=>"Helen: Oh, that's really interesting. I'd really love to talk some more, but I have to go now. Hope to see you again next Saturday.Andy: Sure. See you next time.",
            "text"=>array("type"=>"audio","text"=>"When will Helen and Andy meet again?","media_filename"=>'media/u3dcq.mp3',"timeRange"=>"02:47-02:51"),
            "scores"=>7,
            "items"=>array(
                "0"=>array("item"=>"Next Sunday.","isCorrect"=>false),
                "1"=>array("item"=>"Next Saturday.", "isCorrect"=>true),
                "2"=>array("item"=>"This Saturday.", "isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_listen_001.png"
        );


//        $data['events'][] = array(
//            "num"=>"6",
//            "content_id"=>537,
//            "type"=>"MTmultipleChoice",
//            "media_type"=>"audio",
//            "media_filename"=>'media/u3p_original_mt.mp3',
//            "timeRange"=>"01:38-01:55",
//            "content"=>"But he loved singing so much that he could not help taking every opportunity to perform. By coincidence, he got to know the owner of this pub and they made a deal that Joe could sing in the pub as a part-time singer. He's a really good singer.",
//            "text"=>array("type"=>"audio","text"=>"How did Joe get the job as a singer in the pub?","media_filename"=>'media/u3_difficult_questions.mp3',"timeRange"=>"01:37-01:42"),
//            "scores"=>7,
//            "items"=>array(
//                "0"=>array("item"=>"The owner of the pub and he are old friends.","isCorrect"=>false),
//                "1"=>array("item"=>"He met the owner of the pub by accident.", "isCorrect"=>true),
//                "2"=>array("item"=>"He is a good singer.", "isCorrect"=>false),
//            ),
//            "selectEvents"=>array(
//            ),
//            "picture"=>"images/type_listen_001.png"
//        );
        $this->saveEventListToDatabases($data);
        $a =  json_encode($data);
        $fp = fopen('json49.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
        return;
    }

    public function getPart50(){
        $data = array(
            "unit_id"       =>3,
            "lesson_id"     =>17,
            "part_id"       =>50,
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
            "content_id"=>538,
            "type"=>"SRmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u3p_original_mt.mp3',
            "timeRange"=>"00:13-00:26",
            "content"=>"As a matter of fact, their houses are next to each other. They have been close friends ever since Leo moved into this block about 15 years ago.",
            "text"=>array("type"=>"audio","text"=>"How many years have they known each other?","media_filename"=>'media/u3pcq.mp3',"timeRange"=>"00:15-00:20"),
            "scores"=>4,
            "items"=>array(
                "0"=>array("item"=>"15 years.","answer"=>"15 years","isCorrect"=>true),
                "1"=>array("item"=>"50 years.","answer"=>"50 years", "isCorrect"=>false),
                "2"=>array("item"=>"14 years.","answer"=>"14 years", "isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"2",
            "content_id"=>539,
            "type"=>"SRmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u3p_original_mt.mp3',
            "timeRange"=>"01:40-01:54",
            "content"=>"Alice is 1 year younger than Helen, but interestingly, Alice and Helen were born on the same date.  They used to celebrate their birthday together before Helen got married..",
            "text"=>array("type"=>"audio","text"=>"what did they used to do together?","media_filename"=>'media/u3pcq.mp3',"timeRange"=>"01:23-01:27"),
            "scores"=>4,
            "items"=>array(
                "0"=>array("item"=>"Work.","answer"=>"Work","isCorrect"=>false),
                "1"=>array("item"=>"Go to class.", "answer"=>"Go to class","isCorrect"=>false),
                "2"=>array("item"=>"Celebrate birthday.", "answer"=>"Celebrate birthday","isCorrect"=>true),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"3",
            "content_id"=>540,
            "type"=>"SRmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u3p_original_mt.mp3',
            "timeRange"=>"02:15-02:30",
            "content"=>"Alice is good at her job and hard-working. She often works late at night until 11 o'clock. During the weekend, she forgets all about her work and just relaxes.",
            "text"=>array("type"=>"audio","text"=>"What does she do on weekends?","media_filename"=>'media/u3pcq.mp3',"timeRange"=>"01:39-01:42"),
            "scores"=>4,
            "items"=>array(
                "0"=>array("item"=>"Work hard.","answer"=>"Work hard","isCorrect"=>false),
                "1"=>array("item"=>"Enjoy her leisure time.", "answer"=>"Enjoy her leisure time","isCorrect"=>true),
                "2"=>array("item"=>"Think about work while relaxing.", "answer"=>"Think about work while relaxing","isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"4",
            "content_id"=>541,
            "type"=>"SRmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u3p_original_mt.mp3',
            "timeRange"=>"02:38-02:57",
            "content"=>"Last weekend Helen took Alice to the theatre to see a new movie. Alice is now planning to have a summer picnic for Helen and her family in two weeks. She is really looking forward to spending time with Helen and her family.",
            "text"=>array("type"=>"audio","text"=>"What is Alice planning to do in two weeks?","media_filename"=>'media/u3pcq.mp3',"timeRange"=>"01:56-02:01"),
            "scores"=>4,
            "items"=>array(
                "0"=>array("item"=>"To travel with Helen's family.","answer"=>"To travel with Helen's family","isCorrect"=>false),
                "1"=>array("item"=>"To see a movie.","answer"=>"To see a movie", "isCorrect"=>false),
                "2"=>array("item"=>"To have a summer picnic.","answer"=>"To have a summer picnic", "isCorrect"=>true),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"5",
            "content_id"=>542,
            "type"=>"SRmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u3d_original_mt.mp3',
            "timeRange"=>"00:26-00:35",
            "content"=>"Helen: I can see that. Who's the woman next to you in this picture?Andy: She is Lily, the woman I met on a plane from Paris to Rome. ",
            "text"=>array("type"=>"audio","text"=>"Where did Andy meet Lily?","media_filename"=>'media/u3dcq.mp3',"timeRange"=>"00:45-00:49"),
            "scores"=>4,
            "items"=>array(
                "0"=>array("item"=>"On a ship.","answer"=>"On a ship","isCorrect"=>false),
                "1"=>array("item"=>"On a plane.","answer"=>"On a plane", "isCorrect"=>true),
                "2"=>array("item"=>"On a bus.","answer"=>"On a bus", "isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"6",
            "content_id"=>543,
            "type"=>"SRmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u3d_original_mt.mp3',
            "timeRange"=>"01:38-01:55",
            "content"=>"But he loved singing so much that he could not help taking every opportunity to perform. By coincidence, he got to know the owner of this pub and they made a deal that Joe could sing in the pub as a part-time singer. He's a really good singer.",
            "text"=>array("type"=>"audio","text"=>"How did Joe get the job as a singer in the pub?","media_filename"=>'media/u3_difficult_questions.mp3',"timeRange"=>"01:37-01:42"),
            "scores"=>4,
            "items"=>array(
                "0"=>array("item"=>"The owner of the pub and he are old friends.","answer"=>"The owner of the pub and he are old friends","isCorrect"=>false),
                "1"=>array("item"=>"He met the owner of the pub by accident.","answer"=>"He met the owner of the pub by accident", "isCorrect"=>true),
                "2"=>array("item"=>"He is a good singer.","answer"=>"He is a good singer", "isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $this->saveEventListToDatabases($data);

        $a =  json_encode($data);
        $fp = fopen('json50.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
        return;
    }

    public function getPart51(){
        $data = array(
            "unit_id"       =>3,
            "lesson_id"     =>17,
            "part_id"       =>51,
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
            "content_id"=>544,
            "media_filename"=>'media/u3gfi.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"00:28-00:34",
            "scores"=>5,
            "text" => "It seems that Lily and Helen are good friends.",
            "answer" => "It seems that Lily and Helen are good friends",
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"2",
            "content_id"=>545,
            "media_filename"=>'media/u3gfi.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"00:40-00:47",
            "scores"=>5,
            "text" => "I like shirts made of pure cotton because they feel very soft.",
            "answer" => "I like shirts made of pure cotton because they feel very soft",
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"3",
            "content_id"=>546,
            "media_filename"=>'media/u3gso.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"00:12-00:18",
            "scores"=>5,
            "text" => "The math problem proved not difficult at all.",
            "answer" => "The math problem proved not difficult at all",
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"4",
            "content_id"=>547,
            "media_filename"=>'media/u3gso.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"00:39-00:45",
            "scores"=>5,
            "text" => "Joe seems not to be satisfied with his job.",
            "answer" => "JJoe seems not to be satisfied with his job",
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"5",
            "content_id"=>548,
            "media_filename"=>'media/u3gsf.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"00:21-00:26",
            "scores"=>5,
            "text" => "There seems to be something wrong with my cellphone.",
            "answer" => "There seems to be something wrong with my cellphone",
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"6",
            "content_id"=>549,
            "media_filename"=>'media/u3gsf.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"00:31-00:36",
            "scores"=>5,
            "text" => "Alice got injured while playing tennis yesterday.",
            "answer" => "Alice got injured while playing tennis yesterday",
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $this->saveEventListToDatabases($data);
        $a =  json_encode($data);
        $fp = fopen('json51.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
        return;
    }

    public function createJson(){
        for($i=35;$i<=51;$i++){
            $function = "getPart".$i;
            $this->$function();
        }
    }
}
