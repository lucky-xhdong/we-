<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lessonpartsix extends CI_Controller {

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
    public function getPart129(){
        $data = array(
            "unit_id"       =>6,
            "lesson_id"     =>33,
            "part_id"       =>129,
            "media_filename"=>'media/u6p.mp3',
            "media_type"    =>'audio',
            "totalTime"     =>"2:08",
            "part_type"     =>"listening",
            "have_questions"=>false,
            "questions_type"=>"text",
            "keywords"      =>array(
                "locate",
                "north",
                "across from",
                "in front of",
                "snack",
                "next to",
                "consultant",
                "travel agency",
                "parking lot",
                "on the right of",
                "gas station",
                "construct",
                "to the south of",
                "convenient",
                "on the south side of",
                "side by side",
                "local specialty",
                "on the corner of",
                "story",
                "aisle",
                "cooking ware",
                "stationery",
                "block buster"
            ),
        );
        $data['events'][] = array(
            "num"=>"2",
            'type'=>"text",
            "timeRange"=>"00:00-00:09",
            "text"=>"Hello, this is Channel We. I'm Miss V. In today's program we are going to visit Linda's college.",
            "media_filename"=>'media/u6p.mp4',
            "media_type"    =>'video',
            "picture"=>"images/u6_p001.jpg",
            "pictures"=>array()

        );
        $data['events'][] = array(
            "num"=>"3",
            'type'=>"text",
            "timeRange"=>"00:00-00:08",
            "displayKewords"=>true,
            "text"=>"Linda's college is located on Moon Avenue just north of Star Street.",
            "picture"=>"images/u6_p_001.jpg"
        );
        $data['events'][] = array(
            "num"=>"4",
            'type'=>"text",
            "timeRange"=>"00:08-00:17",
            "text"=>"Right beside the campus, there's a natural green park area with lots of trees and flowers.",
            "picture"=>"images/u6_p_002.jpg"
        );
        $data['events'][] = array(
            "num"=>"5",
            'type'=>"text",
            "timeRange"=>"00:17-00:24",
            "text"=>"And sometimes Linda goes for picnics there with her friends from class.",
            "picture"=>"images/u6_p_002.jpg"
        );
        $data['events'][] = array(
            "num"=>"6",
            'type'=>"text",
            "timeRange"=>"00:24-00:31",
            "text"=>"Across from the college, on Moon Avenue, there's The City Museum.",
            "picture"=>"images/u6_p_003.jpg"
        );
        $data['events'][] = array(
            "num"=>"7",
            'type'=>"text",
            "timeRange"=>"00:31-00:36",
            "text"=>"Where Linda's parents used to bring her when she was younger.",
            "picture"=>"images/u6_p_003.jpg"
        );

        $data['events'][] = array(
            "num"=>"8",
            'type'=>"text",
            "timeRange"=>"00:36-00:43",
            "text"=>"She always used to love learning about the history of the city as a child.",
            "picture"=>"images/u6_p_003.jpg"
        );

        $data['events'][] = array(
            "num"=>"9",
            'type'=>"text",
            "timeRange"=>"00:43-00:51",
            "text"=>"Just in front of the museum there's a nice café where you can get hot drinks and snacks.",
            "picture"=>"images/u6_p_004.jpg"
        );

        $data['events'][] = array(
            "num"=>"10",
            'type'=>"text",
            "timeRange"=>"00:51-00:57",
            "text"=>"Next to the café there's also a travel agency.",
            "picture"=>"images/u6_p_005.jpg"
        );

        $data['events'][] = array(
            "num"=>"11",
            'type'=>"text",
            "timeRange"=>"00:57-01:03",
            "text"=>"Linda got a job there as a travel consultant last summer.",
            "picture"=>"images/u6_p_005.jpg"
        );

        $data['events'][] = array(
            "num"=>"12",
            'type'=>"text",
            "timeRange"=>"01:03-01:09",
            "text"=>"Around the back of the travel agency there's a parking lot.",
            "picture"=>"images/u6_p_006.jpg"
        );

        $data['events'][] = array(
            "num"=>"13",
            'type'=>"text",
            "timeRange"=>"01:09-01:17",
            "text"=>"On the right of the parking lot there's a gas station that's open 24 hours.",
            "picture"=>"images/u6_p_007.jpg"
        );

        $data['events'][] = array(
            "num"=>"14",
            'type'=>"text",
            "timeRange"=>"01:17-01:24",
            "text"=>"There's a new subway station being constructed on Star Street.",
            "picture"=>"images/u6_p_008.jpg"
        );

        $data['events'][] = array(
            "num"=>"15",
            'type'=>"text",
            "timeRange"=>"01:24-01:30",
            "text"=>"Its entrance is just to the south of the gas station.",
            "picture"=>"images/u6_p_008.jpg"
        );

        $data['events'][] = array(
            "num"=>"16",
            'type'=>"text",
            "timeRange"=>"01:30-01:35",
            "text"=>"It's convenient to get around by subway.",
            "picture"=>"images/u6_p_008.jpg"
        );

        $data['events'][] = array(
            "num"=>"17",
            'type'=>"text",
            "timeRange"=>"01:35-01:43",
            "text"=>"On the south side of Star Street, there are a few stores and places to eat.",
            "picture"=>"images/u6_p_009.jpg"
        );

        $data['events'][] = array(
            "num"=>"18",
            'type'=>"text",
            "timeRange"=>"01:43-02:00",
            "text"=>"There are two restaurants side by side, one serving fast food and snacks like sandwiches and burgers, and the other a steakhouse serving all kinds of steak and other local specialties.",
            "picture"=>"images/u6_p_010.jpg"
        );

        $data['events'][] = array(
            "num"=>"19",
            'type'=>"text",
            "timeRange"=>"02:00-02:06",
            "text"=>"On the corner of Star Street and Moon Avenue there is a bank.",
            "picture"=>"images/u6_p_011.jpg"
        );

        $data['events'][] = array(
            "num"=>"20",
            'type'=>"text",
            "timeRange"=>"02:06-02:13",
            "text"=>"You can open a bank account or exchange foreign currency there.",
            "picture"=>"images/u6_p_011.jpg"
        );

        $data['events'][] = array(
            "num"=>"21",
            'type'=>"text",
            "timeRange"=>"02:13-02:20",
            "text"=>"There's an ATM outside the bank that faces Star Street.",
            "picture"=>"images/u6_p_011.jpg"
        );

        $data['events'][] = array(
            "num"=>"22",
            'type'=>"text",
            "timeRange"=>"02:20-02:28",
            "text"=>"Behind the bank there is a bookstore that mainly sells second hand textbooks.",
            "picture"=>"images/u6_p_012.jpg"
        );

        $data['events'][] = array(
            "num"=>"23",
            'type'=>"text",
            "timeRange"=>"02:28-02:35",
            "text"=>"Students can get really good deals on used and nearly new books.",
            "picture"=>"images/u6_p_012.jpg"
        );

        $data['events'][] = array(
            "num"=>"24",
            'type'=>"text",
            "timeRange"=>"02:35-02:41",
            "text"=>"To the east of the bank there is a two story supermarket.",
            "picture"=>"images/u6_p_013.jpg"
        );

        $data['events'][] = array(
            "num"=>"25",
            'type'=>"text",
            "timeRange"=>"02:41-02:51",
            "text"=>"On the first floor there are all different food aisles plus the soaps and cleaning aisle and the sports aisle.",
            "picture"=>"images/u6_p_013.jpg"
        );

        $data['events'][] = array(
            "num"=>"26",
            'type'=>"text",
            "timeRange"=>"02:51-02:58",
            "text"=>"On the second floor you can find bedding, cooking ware and stationery.",
            "picture"=>"images/u6_p_013.jpg"
        );
        $data['events'][] = array(
            "num"=>"27",
            'type'=>"text",
            "timeRange"=>"02:58-03:04",
            "text"=>"Students often come here to buy the things they need.",
            "picture"=>"images/u6_p_013.jpg"
        );
        $data['events'][] = array(
            "num"=>"28",
            'type'=>"text",
            "timeRange"=>"03:04-03:10",
            "text"=>"Next to the supermarket there's a small old movie theatre.",
            "picture"=>"images/u6_p_014.jpg"
        );
        $data['events'][] = array(
            "num"=>"29",
            'type'=>"text",
            "timeRange"=>"03:10-03:17",
            "text"=>"And if you have a student card you can get cheap tickets for block busters.",
            "picture"=>"images/u6_p_014.jpg"
        );
        $data['events'][] = array(
            "num"=>"30",
            'type'=>"text",
            "timeRange"=>"03:17-03:23",
            "text"=>"Behind the movie theatre there is a small clothes store.",
            "picture"=>"images/u6_p_015.jpg"
        );

        $data['events'][] = array(
            "num"=>"31",
            'type'=>"text",
            "timeRange"=>"03:23-03:28",
            "text"=>"That has stylish and fashionable stuff.",
            "picture"=>"images/u6_p_015.jpg"
        );
        $data['events'][] = array(
            "num"=>"32",
            'type'=>"text",
            "timeRange"=>"03:28-03:34",
            "text"=>"Every now and again, Linda likes to go there to buy clothes.",
            "picture"=>"images/u6_p_015.jpg"
        );
         $this->saveEventListToDatabases($data);$a =  json_encode($data);
        $fp = fopen('json129.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
        return;

    }

    public function getPart130(){

        $data = array(
            "unit_id"       =>6,
            "lesson_id"     =>33,
            "part_id"       =>130,
            "media_filename"=>'media/u6p.mp3',
            "media_type"    =>'audio',
            "totalTime"     =>"2:08",
            "part_type"     =>"listening",
            "have_questions"=>false,
            "questions_type"=>"text",
            "keywords"      =>array(
                "locate",
                "north",
                "across from",
                "in front of",
                "snack",
                "next to",
                "consultant",
                "travel agency",
                "parking lot",
                "on the right of",
                "gas station",
                "construct",
                "to the south of",
                "convenient",
                "on the south side of",
                "side by side",
                "local specialty",
                "on the corner of",
                "story",
                "aisle",
                "cooking ware",
                "stationery",
                "block buster"
            ),
        );
        $data['events'][] = array(
            "num"=>"2",
            'type'=>"text",
            "timeRange"=>"00:00-00:09",
            "text"=>"Hello, this is Channel We. I'm Miss V. In today's program we are going to visit Linda's college.",
            "media_filename"=>'media/u6p.mp4',
            "media_type"    =>'video',
            "picture"=>"images/u6_p001.jpg",
            "pictures"=>array()

        );
        $data['events'][] = array(
            "num"=>"3",
            'type'=>"text",
            "timeRange"=>"00:00-00:08",
            "displayKewords"=>true,
            "text"=>"Linda's college is located on Moon Avenue just north of Star Street.",
            "picture"=>"images/u6_p_001.jpg"
        );
        $data['events'][] = array(
            "num"=>"4",
            'type'=>"text",
            "timeRange"=>"00:08-00:17",
            "text"=>"Right beside the campus, there's a natural green park area with lots of trees and flowers.",
            "picture"=>"images/u6_p_002.jpg"
        );
        $data['events'][] = array(
            "num"=>"5",
            'type'=>"text",
            "timeRange"=>"00:17-00:24",
            "text"=>"And sometimes Linda goes for picnics there with her friends from class.",
            "picture"=>"images/u6_p_002.jpg"
        );

        $data['events'][] = array(
            "num"=>"6",
            'type'=>"multipleChoices",
            "timeRange"=>"",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"7",
                    "content_id"=>912,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6pcq.mp3',
                    "timeRange"=>"00:00-00:03",
                    "text"=>"Where is Linda's college?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"It's on Star Street just north of Moon Avenue.","isCorrect"=>false),
                        "1"=>array("item"=>"It's on Moon Avenue just south of Star Street.", "isCorrect"=>false),
                        "2"=>array("item"=>"It's on Moon Avenue just north of Star Street.", "isCorrect"=>true),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u6p.mp3',
                            "timeRange"=>"00:00-00:08",
                            "text"=>"Linda's college is located on Moon Avenue just north of Star Street."
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u6p.mp3',
                            "timeRange"=>"00:00-00:08",
                            "text"=>"Linda's college is located on Moon Avenue just north of Star Street."
                        ),
                    ),
                ),
                1=>array(
                    "num"=>"8",
                    "content_id"=>913,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6pcq.mp3',
                    "timeRange"=>"00:03-00:07",
                    "text"=>"Is there a natural green park area near the campus?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Yes.","isCorrect"=>true),
                        "1"=>array("item"=>"No.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u6p.mp3',
                            "timeRange"=>"00:08-00:17",
                            "text"=>"Right beside the campus, there's a natural green park area with lots of trees and flowers.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u6p.mp3',
                            "timeRange"=>"00:08-00:17",
                            "text"=>"Right beside the campus, there's a natural green park area with lots of trees and flowers.",
                        ),
                    ),
                )
            )
        );


        $data['events'][] = array(
            "num"=>"9",
            'type'=>"text",
            "timeRange"=>"00:24-00:31",
            "text"=>"Across from the college, on Moon Avenue, there's The City Museum.",
            "picture"=>"images/u6_p_003.jpg"
        );
        $data['events'][] = array(
            "num"=>"10",
            'type'=>"text",
            "timeRange"=>"00:31-00:36",
            "text"=>"Where Linda's parents used to bring her when she was younger.",
            "picture"=>"images/u6_p_003.jpg"
        );

        $data['events'][] = array(
            "num"=>"11",
            'type'=>"text",
            "timeRange"=>"00:36-00:43",
            "text"=>"She always used to love learning about the history of the city as a child.",
            "picture"=>"images/u6_p_003.jpg"
        );

        $data['events'][] = array(
            "num"=>"12",
            'type'=>"text",
            "timeRange"=>"00:43-00:51",
            "text"=>"Just in front of the museum there's a nice café where you can get hot drinks and snacks.",
            "picture"=>"images/u6_p_004.jpg"
        );

        $data['events'][] = array(
            "num"=>"13",
            'type'=>"multipleChoices",
            "timeRange"=>"",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"14",
                    "content_id"=>914,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6pcq.mp3',
                    "timeRange"=>"00:07-00:10",
                    "text"=>"Where is The City Museum?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"It's on Star Street.","isCorrect"=>false),
                        "1"=>array("item"=>"It's on Moon Avenue.", "isCorrect"=>true),
                        "2"=>array("item"=>"It's across from the natural park area.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u6p.mp3',
                            "timeRange"=>"00:24-00:31",
                            "text"=>"Across from the college, on Moon Avenue, there's The City Museum."
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u6p.mp3',
                            "timeRange"=>"00:24-00:31",
                            "text"=>"Across from the college, on Moon Avenue, there's The City Museum."
                        ),
                    ),
                ),
                1=>array(
                    "num"=>"15",
                    "content_id"=>915,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6pcq.mp3',
                    "timeRange"=>"00:10-00:14",
                    "text"=>"What did Linda used to do in The City Museum?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"She used to see the exhibitions there.","isCorrect"=>false),
                        "1"=>array("item"=>"She used to learn about the history of the nation there.", "isCorrect"=>false),
                        "2"=>array("item"=>"She used to learn about the history of the city there.", "isCorrect"=>true),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u6p.mp3',
                            "timeRange"=>"00:36-00:43",
                            "text"=>"She always used to love learning about the history of the city as a child.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u6p.mp3',
                            "timeRange"=>"00:36-00:43",
                            "text"=>"She always used to love learning about the history of the city as a child.",
                        ),
                    ),
                ),
                2=>array(
                    "num"=>"16",
                    "content_id"=>916,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6pcq.mp3',
                    "timeRange"=>"00:14-00:16",
                    "text"=>"Where is the café?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"It's across from the museum.","isCorrect"=>false),
                        "1"=>array("item"=>"It's in front of the museum.", "isCorrect"=>true),
                        "2"=>array("item"=>"It's in front of the college.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u6p.mp3',
                            "timeRange"=>"00:43-00:51",
                            "text"=>"Just in front of the museum there's a nice café where you can get hot drinks and snacks. ",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u6p.mp3',
                            "timeRange"=>"00:43-00:51",
                            "text"=>"Just in front of the museum there's a nice café where you can get hot drinks and snacks. ",
                        ),
                    ),
                )
            )
        );

        $data['events'][] = array(
            "num"=>"17",
            'type'=>"text",
            "timeRange"=>"00:51-00:57",
            "text"=>"Next to the café there's also a travel agency.",
            "picture"=>"images/u6_p_005.jpg"
        );

        $data['events'][] = array(
            "num"=>"18",
            'type'=>"text",
            "timeRange"=>"00:57-01:03",
            "text"=>"Linda got a job there as a travel consultant last summer.",
            "picture"=>"images/u6_p_005.jpg"
        );

        $data['events'][] = array(
            "num"=>"19",
            'type'=>"text",
            "timeRange"=>"01:03-01:09",
            "text"=>"Around the back of the travel agency there's a parking lot.",
            "picture"=>"images/u6_p_006.jpg"
        );

        $data['events'][] = array(
            "num"=>"20",
            'type'=>"text",
            "timeRange"=>"01:09-01:17",
            "text"=>"On the right of the parking lot there's a gas station that's open 24 hours.",
            "picture"=>"images/u6_p_007.jpg"
        );

        $data['events'][] = array(
            "num"=>"21",
            'type'=>"multipleChoices",
            "timeRange"=>"",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"22",
                    "content_id"=>917,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6pcq.mp3',
                    "timeRange"=>"00:16-00:19",
                    "text"=>"Where did Linda work last summer?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"In the café.","isCorrect"=>false),
                        "1"=>array("item"=>"In the travel agency.", "isCorrect"=>true),
                        "2"=>array("item"=>"In the museum.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u6p.mp3',
                            "timeRange"=>"00:51-01:03",
                            "text"=>"Next to the café there's also a travel agency. Linda got a job there as a travel consultant last summer."
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u6p.mp3',
                            "timeRange"=>"00:51-01:03",
                            "text"=>"Next to the café there's also a travel agency. Linda got a job there as a travel consultant last summer."
                        ),
                    ),
                ),
                1=>array(
                    "num"=>"23",
                    "content_id"=>918,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6pcq.mp3',
                    "timeRange"=>"00:19-00:22",
                    "text"=>"Is the café next to the travel agency?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Yes.","isCorrect"=>true),
                        "1"=>array("item"=>"No.", "isCorrect"=>false)
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u6p.mp3',
                            "timeRange"=>"00:51-00:57",
                            "text"=>"Next to the café there's also a travel agency.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u6p.mp3',
                            "timeRange"=>"00:51-00:57",
                            "text"=>"Next to the café there's also a travel agency.",
                        ),
                    ),
                ),
                2=>array(
                    "num"=>"24",
                    "content_id"=>919,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6pcq.mp3',
                    "timeRange"=>"00:22-00:24",
                    "text"=>"Where is the parking lot?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"It's next to the travel agency.","isCorrect"=>false),
                        "1"=>array("item"=>"It's in front of the travel agency.", "isCorrect"=>false),
                        "2"=>array("item"=>"It's around the back of the travel agency.", "isCorrect"=>true),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u6p.mp3',
                            "timeRange"=>"01:03-01:09",
                            "text"=>"Around the back of the travel agency there's a parking lot.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u6p.mp3',
                            "timeRange"=>"01:03-01:09",
                            "text"=>"Around the back of the travel agency there's a parking lot.",
                        ),
                    ),
                )
            )
        );

        $data['events'][] = array(
            "num"=>"25",
            'type'=>"text",
            "timeRange"=>"01:17-01:24",
            "text"=>"There's a new subway station being constructed on Star Street.",
            "picture"=>"images/u6_p_008.jpg"
        );

        $data['events'][] = array(
            "num"=>"26",
            'type'=>"text",
            "timeRange"=>"01:24-01:30",
            "text"=>"Its entrance is just to the south of the gas station.",
            "picture"=>"images/u6_p_008.jpg"
        );

        $data['events'][] = array(
            "num"=>"27",
            'type'=>"text",
            "timeRange"=>"01:30-01:35",
            "text"=>"It's convenient to get around by subway.",
            "picture"=>"images/u6_p_008.jpg"
        );

        $data['events'][] = array(
            "num"=>"28",
            'type'=>"text",
            "timeRange"=>"01:35-01:43",
            "text"=>"On the south side of Star Street, there are a few stores and places to eat.",
            "picture"=>"images/u6_p_009.jpg"
        );

        $data['events'][] = array(
            "num"=>"29",
            'type'=>"text",
            "timeRange"=>"01:43-02:00",
            "text"=>"There are two restaurants side by side, one serving fast food and snacks like sandwiches and burgers, and the other a steakhouse serving all kinds of steak and other local specialties.",
            "picture"=>"images/u6_p_010.jpg"
        );

        $data['events'][] = array(
            "num"=>"30",
            'type'=>"text",
            "timeRange"=>"02:00-02:06",
            "text"=>"On the corner of Star Street and Moon Avenue there is a bank.",
            "picture"=>"images/u6_p_011.jpg"
        );

        $data['events'][] = array(
            "num"=>"31",
            'type'=>"text",
            "timeRange"=>"02:06-02:13",
            "text"=>"You can open a bank account or exchange foreign currency there.",
            "picture"=>"images/u6_p_011.jpg"
        );


        $data['events'][] = array(
            "num"=>"32",
            'type'=>"multipleChoices",
            "timeRange"=>"",
            "multipleChoicesList"=>array(
//                0=>array(
//                    "num"=>"33",
//                    "content_id"=>920,
//                    "type"=>"multipleChoice",
//                    "media_type"=>"audio",
//                    "media_filename"=>'media/u6pcq.mp3',
//                    "timeRange"=>"00:33-00:37",
//                    "text"=>"Where is the new subway station?",
//                    "scores"=>1,
//                    "items"=>array(
//                        "0"=>array("item"=>"It's on the north of the gas station.","isCorrect"=>false),
//                        "1"=>array("item"=>"It's on Moon Street.", "isCorrect"=>true),
//                        "2"=>array("item"=>"It's in front of the travel agency.", "isCorrect"=>false),
//                    ),
//                    "selectEvents"=>array(
//                        "Yes"=>array(
//                            "media_type"=>"audio",
//                            "media_filename"=>'media/u6p.mp3',
//                            "timeRange"=>"01:17-01:24",
//                            "text"=>"There's a new subway station being constructed on Star Street."
//                        ),
//                        "No"=>array(
//                            "media_type"=>"audio",
//                            "media_filename"=>'media/u6p.mp3',
//                            "timeRange"=>"01:17-01:24",
//                            "text"=>"There's a new subway station being constructed on Star Street."
//                        ),
//                    ),
//                ),
                0=>array(
                    "num"=>"34",
                    "content_id"=>921,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6pcq.mp3',
                    "timeRange"=>"00:31-00:33",
                    "text"=>"Where is the bank?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"It's on the corner of the restaurants.","isCorrect"=>false),
                        "1"=>array("item"=>"It's on the north of Star Street.", "isCorrect"=>false),
                        "2"=>array("item"=>"It's on the corner of Star Street and Moon Avenue.", "isCorrect"=>true)
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u6p.mp3',
                            "timeRange"=>"02:00-02:06",
                            "text"=>"On the corner of Star Street and Moon Avenue there is a bank.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u6p.mp3',
                            "timeRange"=>"02:00-02:06",
                            "text"=>"On the corner of Star Street and Moon Avenue there is a bank.",
                        ),
                    ),
                )
            )
        );

        $data['events'][] = array(
            "num"=>"35",
            'type'=>"text",
            "timeRange"=>"02:13-02:20",
            "text"=>"There's an ATM outside the bank that faces Star Street.",
            "picture"=>"images/u6_p_011.jpg"
        );

        $data['events'][] = array(
            "num"=>"36",
            'type'=>"text",
            "timeRange"=>"02:20-02:28",
            "text"=>"Behind the bank there is a bookstore that mainly sells second hand textbooks.",
            "picture"=>"images/u6_p_012.jpg"
        );

        $data['events'][] = array(
            "num"=>"37",
            'type'=>"text",
            "timeRange"=>"02:28-02:35",
            "text"=>"Students can get really good deals on used and nearly new books.",
            "picture"=>"images/u6_p_012.jpg"
        );

        $data['events'][] = array(
            "num"=>"38",
            'type'=>"multipleChoices",
            "timeRange"=>"",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"39",
                    "content_id"=>922,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6pcq.mp3',
                    "timeRange"=>"00:33-00:36",
                    "text"=>"Is there an ATM outside the bank?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Yes.","isCorrect"=>true),
                        "1"=>array("item"=>"No.", "isCorrect"=>false)
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u6p.mp3',
                            "timeRange"=>"02:13-02:20",
                            "text"=>"There's an ATM outside the bank that faces Star Street."
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u6p.mp3',
                            "timeRange"=>"02:13-02:20",
                            "text"=>"There's an ATM outside the bank that faces Star Street."
                        ),
                    ),
                ),
                1=>array(
                    "num"=>"40",
                    "content_id"=>923,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6pcq.mp3',
                    "timeRange"=>"00:36-00:40",
                    "text"=>"What kind of book does the bookstore mainly sell?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"The bookstore mainly sells new textbooks.","isCorrect"=>false),
                        "1"=>array("item"=>"The bookstore mainly sells second hand textbooks.", "isCorrect"=>true),
                        "2"=>array("item"=>"The bookstore mainly sells popular books.", "isCorrect"=>false)
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u6p.mp3',
                            "timeRange"=>"02:20-02:35",
                            "text"=>"Behind the bank there is a bookstore that mainly sells second hand textbooks. Students can get really good deals on used and nearly new books.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u6p.mp3',
                            "timeRange"=>"02:20-02:35",
                            "text"=>"Behind the bank there is a bookstore that mainly sells second hand textbooks. Students can get really good deals on used and nearly new books.",
                        ),
                    ),
                )
            )
        );

        $data['events'][] = array(
            "num"=>"41",
            'type'=>"text",
            "timeRange"=>"02:35-02:41",
            "text"=>"To the east of the bank there is a two story supermarket.",
            "picture"=>"images/u6_p_013.jpg"
        );

        $data['events'][] = array(
            "num"=>"42",
            'type'=>"text",
            "timeRange"=>"02:41-02:51",
            "text"=>"On the first floor there are all different food aisles plus the soaps and cleaning aisle and the sports aisle.",
            "picture"=>"images/u6_p_013.jpg"
        );

        $data['events'][] = array(
            "num"=>"43",
            'type'=>"text",
            "timeRange"=>"02:51-02:58",
            "text"=>"On the second floor you can find bedding, cooking ware and stationery.",
            "picture"=>"images/u6_p_013.jpg"
        );
        $data['events'][] = array(
            "num"=>"44",
            'type'=>"text",
            "timeRange"=>"02:58-03:04",
            "text"=>"Students often come here to buy the things they need.",
            "picture"=>"images/u6_p_013.jpg"
        );

        $data['events'][] = array(
            "num"=>"45",
            'type'=>"multipleChoices",
            "timeRange"=>"",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"46",
                    "content_id"=>924,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6pcq.mp3',
                    "timeRange"=>"00:40-00:42",
                    "text"=>"Where is the supermarket?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"It's to the east of the bank.","isCorrect"=>true),
                        "1"=>array("item"=>"It's to the west of the bank.", "isCorrect"=>false),
                        "2"=>array("item"=>"It's to the north of the bank.", "isCorrect"=>false)
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u6p.mp3',
                            "timeRange"=>"02:35-02:41",
                            "text"=>" To the east of the bank there is a two story supermarket."
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u6p.mp3',
                            "timeRange"=>"02:35-02:41",
                            "text"=>" To the east of the bank there is a two story supermarket."
                        ),
                    ),
                ),
                1=>array(
                    "num"=>"47",
                    "content_id"=>925,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6pcq.mp3',
                    "timeRange"=>"00:42-00:46",
                    "text"=>"What aisles does the supermarket have on the first floor?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Food aisle plus the soaps.","isCorrect"=>false),
                        "1"=>array("item"=>"Cleaning aisle and Sports aisle.", "isCorrect"=>false),
                        "2"=>array("item"=>"All of the above.", "isCorrect"=>true)
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u6p.mp3',
                            "timeRange"=>"02:41-02:51",
                            "text"=>"On the first floor there are all different food aisles plus the soaps and cleaning aisle and the sports aisle.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u6p.mp3',
                            "timeRange"=>"02:41-02:51",
                            "text"=>"On the first floor there are all different food aisles plus the soaps and cleaning aisle and the sports aisle.",
                        ),
                    ),
                ),
                2=>array(
                    "num"=>"48",
                    "content_id"=>926,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6pcq.mp3',
                    "timeRange"=>"00:46-00:49",
                    "text"=>"Do students often come to the supermarket?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Yes.","isCorrect"=>true),
                        "1"=>array("item"=>"No.", "isCorrect"=>false)
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u6p.mp3',
                            "timeRange"=>"02:58-03:04",
                            "text"=>"Students often come here to buy the things they need.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u6p.mp3',
                            "timeRange"=>"02:58-03:04",
                            "text"=>"Students often come here to buy the things they need.",
                        ),
                    ),
                )
            )
        );


        $data['events'][] = array(
            "num"=>"49",
            'type'=>"text",
            "timeRange"=>"03:04-03:10",
            "text"=>"Next to the supermarket there's a small old movie theatre.",
            "picture"=>"images/u6_p_014.jpg"
        );
        $data['events'][] = array(
            "num"=>"50",
            'type'=>"text",
            "timeRange"=>"03:10-03:17",
            "text"=>"And if you have a student card you can get cheap tickets for block busters.",
            "picture"=>"images/u6_p_014.jpg"
        );
        $data['events'][] = array(
            "num"=>"51",
            'type'=>"text",
            "timeRange"=>"03:17-03:23",
            "text"=>"Behind the movie theatre there is a small clothes store.",
            "picture"=>"images/u6_p_015.jpg"
        );

        $data['events'][] = array(
            "num"=>"52",
            'type'=>"text",
            "timeRange"=>"03:23-03:28",
            "text"=>"That has stylish and fashionable stuff.",
            "picture"=>"images/u6_p_015.jpg"
        );
        $data['events'][] = array(
            "num"=>"53",
            'type'=>"text",
            "timeRange"=>"03:28-03:34",
            "text"=>"Every now and again, Linda likes to go there to buy clothes.",
            "picture"=>"images/u6_p_015.jpg"
        );
        $data['events'][] = array(
            "num"=>"54",
            'type'=>"multipleChoices",
            "timeRange"=>"",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"55",
                    "content_id"=>927,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6pcq.mp3',
                    "timeRange"=>"00:52-00:54",
                    "text"=>"Where is the movie theatre?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"It's on Moon Avenue.","isCorrect"=>false),
                        "1"=>array("item"=>"It's beside the supermarket.", "isCorrect"=>true),
                        "2"=>array("item"=>"It's at the back of the movie theatre.", "isCorrect"=>false)
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u6p.mp3',
                            "timeRange"=>"03:04-03:10",
                            "text"=>"Next to the supermarket there's a small old movie theatre."
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u6p.mp3',
                            "timeRange"=>"03:04-03:10",
                            "text"=>"Next to the supermarket there's a small old movie theatre."
                        ),
                    ),
                ),
                1=>array(
                    "num"=>"56",
                    "content_id"=>928,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6pcq.mp3',
                    "timeRange"=>"00:57-01:01",
                    "text"=>"Why does Linda like to buy clothes in the clothes store?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Clothes there are imported from overseas.","isCorrect"=>false),
                        "1"=>array("item"=>"Clothes there are of good quality.", "isCorrect"=>false),
                        "2"=>array("item"=>"Clothes there are in fashion.", "isCorrect"=>true)
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u6pcq.mp3',
                            "timeRange"=>"01:01-01:06",
                            "text"=>"Because the clothes that the store sells are stylish and fashionable.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u6pcq.mp3',
                            "timeRange"=>"01:01-01:06",
                            "text"=>"Because the clothes that the store sells are stylish and fashionable.",
                        ),
                    ),
                )
            )
        );

         $this->saveEventListToDatabases($data);$a =  json_encode($data);
        $fp = fopen('json130.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
        return;

    }


    public function getPart131(){

        $data = array(
            "unit_id"       =>6,
            "lesson_id"     =>33,
            "part_id"       =>131,
            "media_filename"=>'media/u6p.mp3',
            "media_type"    =>'audio',
            "totalTime"     =>"2:08",
            "part_type"     =>"listening",
            "have_questions"=>false,
            "questions_type"=>"text",
            "keywords"      =>array(
                "locate",
                "north",
                "across from",
                "in front of",
                "snack",
                "next to",
                "consultant",
                "travel agency",
                "parking lot",
                "on the right of",
                "gas station",
                "construct",
                "to the south of",
                "convenient",
                "on the south side of",
                "side by side",
                "local specialty",
                "on the corner of",
                "story",
                "aisle",
                "cooking ware",
                "stationery",
                "block buster"
            ),
        );
        $data['events'][] = array(
            "num"=>"2",
            'type'=>"text",
            "timeRange"=>"00:00-00:09",
            "text"=>"Hello, this is Channel We. I'm Miss V. In today's program we are going to visit Linda's college.",
            "media_filename"=>'media/u6p.mp4',
            "media_type"    =>'video',
            "picture"=>"images/u6_p001.jpg",
            "pictures"=>array()

        );
        $data['events'][] = array(
            "num"=>"3",
            'type'=>"text",
            "timeRange"=>"00:00-00:08",
            "displayKewords"=>true,
            "text"=>"Linda's college is located on Moon Avenue just north of Star Street.",
            "picture"=>"images/u6_p_001.jpg"
        );
        $data['events'][] = array(
            "num"=>"4",
            "content_id"=>929,
            'type'=>"sr_reading",
            "scores"=>1,
            "timeRange"=>"00:08-00:17",
            "text"=>"Right beside the campus, there's a natural green park area with lots of trees and flowers.",
            "answer"=>"Right beside the campus there's a natural green park area with lots of trees and flowers",
            "picture"=>"images/u6_p_002.jpg"
        );
        $data['events'][] = array(
            "num"=>"5",
            'type'=>"text",
            "timeRange"=>"00:17-00:24",
            "text"=>"And sometimes Linda goes for picnics there with her friends from class.",
            "picture"=>"images/u6_p_002.jpg"
        );
        $data['events'][] = array(
            "num"=>"6",
            "content_id"=>930,
            'type'=>"sr_reading",
            "scores"=>1,
            "timeRange"=>"00:24-00:31",
            "text"=>"Across from the college, on Moon Avenue, there's The City Museum.",
            "answer"=>"Across from the college on Moon Avenue, there's The City Museum",
            "picture"=>"images/u6_p_003.jpg"
        );
        $data['events'][] = array(
            "num"=>"7",
            'type'=>"text",
            "timeRange"=>"00:31-00:36",
            "text"=>"Where Linda's parents used to bring her when she was younger.",
            "picture"=>"images/u6_p_003.jpg"
        );

        $data['events'][] = array(
            "num"=>"8",
            'type'=>"text",
            "timeRange"=>"00:36-00:43",
            "text"=>"She always used to love learning about the history of the city as a child.",
            "picture"=>"images/u6_p_003.jpg"
        );

        $data['events'][] = array(
            "num"=>"9",
            "content_id"=>931,
            'type'=>"sr_reading",
            "scores"=>1,
            "timeRange"=>"00:43-00:51",
            "text"=>"Just in front of the museum there's a nice café where you can get hot drinks and snacks.",
            "answer"=>"Just in front of the museum there's a nice café where you can get hot drinks and snacks",
            "picture"=>"images/u6_p_004.jpg"
        );

        $data['events'][] = array(
            "num"=>"10",
            "content_id"=>932,
            'type'=>"sr_reading",
            "scores"=>1,
            "timeRange"=>"00:51-00:57",
            "text"=>"Next to the café there's also a travel agency.",
            "answer"=>"Next to the café there's also a travel agency",
            "picture"=>"images/u6_p_005.jpg"
        );

        $data['events'][] = array(
            "num"=>"11",
            'type'=>"text",
            "timeRange"=>"00:57-01:03",
            "text"=>"Linda got a job there as a travel consultant last summer.",
            "picture"=>"images/u6_p_005.jpg"
        );

        $data['events'][] = array(
            "num"=>"12",
            'type'=>"text",
            "timeRange"=>"01:03-01:09",
            "text"=>"Around the back of the travel agency there's a parking lot.",
            "picture"=>"images/u6_p_006.jpg"
        );

        $data['events'][] = array(
            "num"=>"13",
            "content_id"=>933,
            'type'=>"sr_reading",
            "scores"=>1,
            "timeRange"=>"01:09-01:17",
            "text"=>"On the right of the parking lot there's a gas station that's open 24 hours.",
            "answer"=>"On the right of the parking lot there's a gas station that's open twenty four hours",
            "picture"=>"images/u6_p_007.jpg"
        );

        $data['events'][] = array(
            "num"=>"14",
            'type'=>"text",
            "timeRange"=>"01:17-01:24",
            "text"=>"There's a new subway station being constructed on Star Street.",
            "picture"=>"images/u6_p_008.jpg"
        );

        $data['events'][] = array(
            "num"=>"15",
            "content_id"=>934,
            'type'=>"sr_reading",
            "scores"=>1,
            "timeRange"=>"01:24-01:30",
            "text"=>"Its entrance is just to the south of the gas station.",
            "answer"=>"Its entrance is just to the south of the gas station",
            "picture"=>"images/u6_p_008.jpg"
        );

        $data['events'][] = array(
            "num"=>"16",
            'type'=>"text",
            "timeRange"=>"01:30-01:35",
            "text"=>"It's convenient to get around by subway.",
            "picture"=>"images/u6_p_008.jpg"
        );

        $data['events'][] = array(
            "num"=>"17",
            "content_id"=>935,
            'type'=>"sr_reading",
            "scores"=>1,
            "timeRange"=>"01:35-01:43",
            "text"=>"On the south side of Star Street, there are a few stores and places to eat.",
            "answer"=>"On the south side of Star Street there are a few stores and places to eat",
            "picture"=>"images/u6_p_009.jpg"
        );

        $data['events'][] = array(
            "num"=>"18",
            'type'=>"text",
            "timeRange"=>"01:43-02:00",
            "text"=>"There are two restaurants side by side, one serving fast food and snacks like sandwiches and burgers, and the other a steakhouse serving all kinds of steak and other local specialties.",
            "picture"=>"images/u6_p_010.jpg"
        );

        $data['events'][] = array(
            "num"=>"19",
            "content_id"=>936,
            'type'=>"sr_reading",
            "scores"=>1,
            "timeRange"=>"02:00-02:06",
            "text"=>"On the corner of Star Street and Moon Avenue there is a bank.",
            "answer"=>"On the corner of Star Street and Moon Avenue there is a bank",
            "picture"=>"images/u6_p_011.jpg"
        );

        $data['events'][] = array(
            "num"=>"20",
            'type'=>"text",
            "timeRange"=>"02:06-02:13",
            "text"=>"You can open a bank account or exchange foreign currency there.",
            "picture"=>"images/u6_p_011.jpg"
        );

        $data['events'][] = array(
            "num"=>"21",
            "content_id"=>937,
            'type'=>"sr_reading",
            "scores"=>1,
            "timeRange"=>"02:13-02:20",
            "text"=>"There's an ATM outside the bank that faces Star Street.",
            "answer"=>"There's an ATM outside the bank that faces Star Street",
            "picture"=>"images/u6_p_011.jpg"
        );

        $data['events'][] = array(
            "num"=>"22",
            'type'=>"text",
            "timeRange"=>"02:20-02:28",
            "text"=>"Behind the bank there is a bookstore that mainly sells second hand textbooks.",
            "picture"=>"images/u6_p_012.jpg"
        );

        $data['events'][] = array(
            "num"=>"23",
            'type'=>"text",
            "timeRange"=>"02:28-02:35",
            "text"=>"Students can get really good deals on used and nearly new books.",
            "picture"=>"images/u6_p_012.jpg"
        );

        $data['events'][] = array(
            "num"=>"24",
            "content_id"=>938,
            'type'=>"sr_reading",
            "scores"=>1,
            "timeRange"=>"02:35-02:41",
            "text"=>"To the east of the bank there is a two story supermarket.",
            "answer"=>"To the east of the bank there is a two story supermarket",
            "picture"=>"images/u6_p_013.jpg"
        );

        $data['events'][] = array(
            "num"=>"25",
            'type'=>"text",
            "timeRange"=>"02:41-02:51",
            "text"=>"On the first floor there are all different food aisles plus the soaps and cleaning aisle and the sports aisle.",
            "picture"=>"images/u6_p_013.jpg"
        );

        $data['events'][] = array(
            "num"=>"26",
            'type'=>"text",
            "timeRange"=>"02:51-02:58",
            "text"=>"On the second floor you can find bedding, cooking ware and stationery.",
            "picture"=>"images/u6_p_013.jpg"
        );
        $data['events'][] = array(
            "num"=>"27",
            'type'=>"text",
            "timeRange"=>"02:58-03:04",
            "text"=>"Students often come here to buy the things they need.",
            "picture"=>"images/u6_p_013.jpg"
        );
        $data['events'][] = array(
            "num"=>"28",
            "content_id"=>939,
            'type'=>"sr_reading",
            "scores"=>1,
            "timeRange"=>"03:04-03:10",
            "text"=>"Next to the supermarket there's a small old movie theatre.",
            "answer"=>"Next to the supermarket there's a small old movie theatre",
            "picture"=>"images/u6_p_014.jpg"
        );
        $data['events'][] = array(
            "num"=>"29",
            'type'=>"text",
            "timeRange"=>"03:10-03:17",
            "text"=>"And if you have a student card you can get cheap tickets for block busters.",
            "picture"=>"images/u6_p_014.jpg"
        );
        $data['events'][] = array(
            "num"=>"30",
            "content_id"=>940,
            'type'=>"sr_reading",
            "scores"=>1,
            "timeRange"=>"03:17-03:23",
            "text"=>"Behind the movie theatre there is a small clothes store.",
            "answer"=>"Behind the movie theatre there is a small clothes store",
            "picture"=>"images/u6_p_015.jpg"
        );

        $data['events'][] = array(
            "num"=>"31",
            'type'=>"text",
            "timeRange"=>"03:23-03:28",
            "text"=>"That has stylish and fashionable stuff.",
            "picture"=>"images/u6_p_015.jpg"
        );
        $data['events'][] = array(
            "num"=>"32",
            'type'=>"text",
            "timeRange"=>"03:28-03:34",
            "text"=>"Every now and again, Linda likes to go there to buy clothes.",
            "picture"=>"images/u6_p_015.jpg"
        );

         $this->saveEventListToDatabases($data);$a =  json_encode($data);
        $fp = fopen('json131.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
        return;

    }


    public function getPart132(){
        $data = array(
            "unit_id"       =>6,
            "lesson_id"     =>34,
            "part_id"       =>132,
            "media_filename"=>'media/u6d.mp4',
            "media_type"    =>'video',
            "totalTime"     =>"4:05",
            "part_type"     =>"dialog",
            "have_questions"=>false,
            "questions_type"=>"text",
            "keywords"      =>array(
                "two-bedroom apartment",
                "square meter",
                "spacious",
                "closet",
                "fit in",
                "queen size",
                "electric stove",
                "burner",
                "microwave oven",
                "fridge",
                "washing machine",
                "cabinet",
                "kitchen ware",
                "pot and pan",
                "storage space",
                "tableware",
                "seasoning",
                "air-conditioning",
                "block",
                "heating",
                "deal"
            ),
        );

        $data['events'][] = array(
            "num"=>"1",
            'type'=>"text",
            "timeRange"=>"00:00-00:06",
            "text"=>"Tina is looking for a room to rent for her new college life.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"2",
            'type'=>"text",
            "timeRange"=>"00:06-00:11",
            "text"=>"She found an advertisement about a room for rent.",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"3",
            'type'=>"text",
            "timeRange"=>"00:11-00:16",
            "text"=>"The apartment is very close to the campus.",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"4",
            'type'=>"text",
            "timeRange"=>"00:16-00:22",
            "text"=>"Jim is the one who has posted the advertisement.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"5",
            'type'=>"text",
            "timeRange"=>"00:22-00:27",
            "text"=>"Now, the two meet at Jim's house.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"6",
            'type'=>"text",
            "timeRange"=>"00:27-00:31",
            "text"=>"Hi, Tina, I'm Jim.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"7",
            'type'=>"text",
            "timeRange"=>"0:31-00:34",
            "text"=>"Nice to meet you.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"8",
            'type'=>"text",
            "timeRange"=>"00:34-00:39",
            "text"=>"Hi, Jim, nice to meet you, too.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"9",
            'type'=>"text",
            "timeRange"=>"00:39-00:42",
            "text"=>"Let me show you the room.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"10",
            'type'=>"text",
            "timeRange"=>"00:42-00:46",
            "text"=>"This is a two-bedroom apartment.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"11",
            'type'=>"text",
            "timeRange"=>"00:46-00:50",
            "text"=>"Oh, it is very big.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"12",
            'type'=>"text",
            "timeRange"=>"00:50-00:54",
            "text"=>"The living room is very big.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"13",
            'type'=>"text",
            "timeRange"=>"00:54-00:59",
            "text"=>"It is about 25 square meters.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"14",
            'type'=>"text",
            "timeRange"=>"00:59-01:06",
            "text"=>"There is a sofa, a TV, a dining table and a big bookcase here.",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"15",
            'type'=>"text",
            "timeRange"=>"01:06-01:10",
            "text"=>"We just share the living room.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"16",
            'type'=>"text",
            "timeRange"=>"01:10-01:15",
            "text"=>"It is really spacious.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"17",
            'type'=>"text",
            "timeRange"=>"01:15-01:19",
            "text"=>"This is the bedroom to rent.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"18",
            'type'=>"text",
            "timeRange"=>"01:19-01:23",
            "text"=>"There are two bathrooms in the apartment.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"19",
            'type'=>"text",
            "timeRange"=>"01:23-01:27",
            "text"=>"One bathroom is in my bedroom.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"20",
            'type'=>"text",
            "timeRange"=>"01:27-01:32",
            "text"=>"Another one is here, right next to your bedroom.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"21",
            'type'=>"text",
            "timeRange"=>"01:32-01:36",
            "text"=>"So you can use it by yourself.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"22",
            'type'=>"text",
            "timeRange"=>"01:36-01:41",
            "text"=>"How big is the bedroom to rent?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"23",
            'type'=>"text",
            "timeRange"=>"01:41-01:45",
            "text"=>"It is 15 square meters.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"24",
            'type'=>"text",
            "timeRange"=>"01:45-01:51",
            "text"=>"Oh, the closet is big enough to fit all my stuff in.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"25",
            'type'=>"text",
            "timeRange"=>"01:51-02:00",
            "text"=>"Yes. The bed is queen size, and the desk is large enough for you to put computers and books.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"26",
            'type'=>"text",
            "timeRange"=>"02:00-02:03",
            "text"=>"Excellent.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"27",
            'type'=>"text",
            "timeRange"=>"02:03-02:06",
            "text"=>"Where is the kitchen?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"28",
            'type'=>"text",
            "timeRange"=>"02:06-02:10",
            "text"=>"Oh, this is the kitchen.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"29",
            'type'=>"text",
            "timeRange"=>"02:10-02:14",
            "text"=>"The electric stove has four burners.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"30",
            'type'=>"text",
            "timeRange"=>"02:14-02:18",
            "text"=>"The oven is below it.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"31",
            'type'=>"text",
            "timeRange"=>"02:18-02:25",
            "text"=>"Over there you see the microwave oven, the fridge and washing machine.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"32",
            'type'=>"text",
            "timeRange"=>"02:25-02:30",
            "text"=>"Four cabinets for kitchen ware.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"33",
            'type'=>"text",
            "timeRange"=>"02:30-02:37",
            "text"=>"I don't do much cooking so I only have a few pots and pans.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"34",
            'type'=>"text",
            "timeRange"=>"02:37-02:45",
            "text"=>"You have enough storage space for kitchen ware, tableware and seasonings.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"35",
            'type'=>"text",
            "timeRange"=>"02:45-02:49",
            "text"=>"What about the air-conditioning? ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"36",
            'type'=>"text",
            "timeRange"=>"02:49-02:53",
            "text"=>"Is it central air-conditioning?",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"37",
            'type'=>"text",
            "timeRange"=>"02:53-02:58",
            "text"=>"Yes, the button is here on the entrance wall.",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"38",
            'type'=>"text",
            "timeRange"=>"02:58-03:04",
            "text"=>"It is for both cooling in summer and heating in winter.",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"39",
            'type'=>"text",
            "timeRange"=>"03:04-03:09",
            "text"=>"Is it convenient to go shopping here?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"40",
            'type'=>"text",
            "timeRange"=>"03:09-03:12",
            "text"=>"Yes.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"41",
            'type'=>"text",
            "timeRange"=>"03:12-03:18",
            "text"=>"There is a small shopping area just five blocks away from here.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"42",
            'type'=>"text",
            "timeRange"=>"03:18-03:25",
            "text"=>"There are bars, restaurants, bookstores, and a small supermarket there.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"43",
            'type'=>"text",
            "timeRange"=>"03:25-03:30",
            "text"=>"It takes only 15 minutes to get there on foot.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"44",
            'type'=>"text",
            "timeRange"=>"03:30-03:36",
            "text"=>"By the way, where can I put my bicycle?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"45",
            'type'=>"text",
            "timeRange"=>"03:36-03:41",
            "text"=>"You can put your bike just outside in the yard.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"46",
            'type'=>"text",
            "timeRange"=>"03:41-03:46",
            "text"=>"If you drive, you can also park your car there.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"47",
            'type'=>"text",
            "timeRange"=>"03:46-03:53",
            "text"=>"So we share the electricity, internet, heating, and water?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"48",
            'type'=>"text",
            "timeRange"=>"03:53-03:58",
            "text"=>"Yes. Each month, we pay before the 10th.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"49",
            'type'=>"text",
            "timeRange"=>"03:58-04:01",
            "text"=>"Also.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"50",
            'type'=>"text",
            "timeRange"=>"04:01-04:08",
            "text"=>"The landlord hires a lady to clean the apartment and the yard once a week.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"51",
            'type'=>"text",
            "timeRange"=>"04:08-04:13",
            "text"=>"Deal! When can I move in?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"52",
            'type'=>"text",
            "timeRange"=>"04:13-04:16",
            "text"=>"Anytime you like!",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"53",
            'type'=>"text",
            "timeRange"=>"04:16-04:22",
            "text"=>"Ok, I will probably move in next Monday.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"54",
            'type'=>"text",
            "timeRange"=>"04:22-04:25",
            "text"=>"Welcome!",
            "picture"=>""
        );

         $this->saveEventListToDatabases($data);$a =  json_encode($data);
        $fp = fopen('json132.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
        return;
    }

    public function getPart133(){

        $data = array(
            "unit_id"       =>6,
            "lesson_id"     =>34,
            "part_id"       =>133,
            "media_filename"=>'media/u6d.mp4',
            "media_type"    =>'video',
            "totalTime"     =>"4:05",
            "part_type"     =>"dialog",
            "have_questions"=>false,
            "questions_type"=>"text",
            "keywords"      =>array(
                "two-bedroom apartment",
                "square meter",
                "spacious",
                "closet",
                "fit in",
                "queen size",
                "electric stove",
                "burner",
                "microwave oven",
                "fridge",
                "washing machine",
                "cabinet",
                "kitchen ware",
                "pot and pan",
                "storage space",
                "tableware",
                "seasoning",
                "air-conditioning",
                "block",
                "heating",
                "deal"
            ),
        );

        $data['events'][] = array(
            "num"=>"1",
            'type'=>"text",
            "timeRange"=>"00:00-00:06",
            "text"=>"Tina is looking for a room to rent for her new college life.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"2",
            'type'=>"text",
            "timeRange"=>"00:06-00:11",
            "text"=>"She found an advertisement about a room for rent.",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"3",
            'type'=>"text",
            "timeRange"=>"00:11-00:16",
            "text"=>"The apartment is very close to the campus.",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"4",
            'type'=>"text",
            "timeRange"=>"00:16-00:22",
            "text"=>"Jim is the one who has posted the advertisement.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"5",
            'type'=>"text",
            "timeRange"=>"00:22-00:27",
            "text"=>"Now, the two meet at Jim's house.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"6",
            'type'=>"text",
            "timeRange"=>"00:27-00:31",
            "text"=>"Hi, Tina, I'm Jim.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"7",
            'type'=>"text",
            "timeRange"=>"0:31-00:34",
            "text"=>"Nice to meet you.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"8",
            'type'=>"text",
            "timeRange"=>"00:34-00:39",
            "text"=>"Hi, Jim, nice to meet you, too.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"9",
            'type'=>"text",
            "timeRange"=>"00:39-00:42",
            "text"=>"Let me show you the room.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"10",
            'type'=>"text",
            "timeRange"=>"00:42-00:46",
            "text"=>"This is a two-bedroom apartment.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"11",
            'type'=>"text",
            "timeRange"=>"00:46-00:50",
            "text"=>"Oh, it is very big.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"12",
            'type'=>"text",
            "timeRange"=>"00:50-00:54",
            "text"=>"The living room is very big.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"13",
            'type'=>"text",
            "timeRange"=>"00:54-00:59",
            "text"=>"It is about 25 square meters.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"14",
            'type'=>"text",
            "timeRange"=>"00:59-01:06",
            "text"=>"There is a sofa, a TV, a dining table and a big bookcase here.",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"15",
            'type'=>"text",
            "timeRange"=>"01:06-01:10",
            "text"=>"We just share the living room.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"16",
            'type'=>"text",
            "timeRange"=>"01:10-01:15",
            "text"=>"It is really spacious.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"17",
            'type'=>"multipleChoices",
            "timeRange"=>"",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"18",
                    "content_id"=>941,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6dcq.mp3',
                    "timeRange"=>"00:00-00:03",
                    "text"=>"How many bedrooms does the apartment have?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Two.","isCorrect"=>true),
                        "1"=>array("item"=>"Three.", "isCorrect"=>false),
                        "2"=>array("item"=>"Four.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u6d.mp3',
                            "timeRange"=>"00:42-00:46",
                            "text"=>"This is a two-bedroom apartment.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u6d.mp3',
                            "timeRange"=>"00:42-00:46",
                            "text"=>"This is a two-bedroom apartment.",
                        ),
                    ),
                ),
                1=>array(
                    "num"=>"19",
                    "content_id"=>942,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6dcq.mp3',
                    "timeRange"=>"00:03-00:05",
                    "text"=>"Is the living room big?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Yes.","isCorrect"=>true),
                        "1"=>array("item"=>"No.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u6d.mp3',
                            "timeRange"=>"00:50-00:54",
                            "text"=>"The living room is very big.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u6d.mp3',
                            "timeRange"=>"00:50-00:54",
                            "text"=>"The living room is very big.",
                            ),
                    ),
                ),
                2=>array(
                    "num"=>"20",
                    "content_id"=>943,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6dcq.mp3',
                    "timeRange"=>"00:05-00:07",
                    "text"=>"What room do they share?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"The living room.","isCorrect"=>true),
                        "1"=>array("item"=>"The bedroom.", "isCorrect"=>false),
                        "2"=>array("item"=>"The bathroom.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u6dcq.mp3',
                            "timeRange"=>"00:07-00:09",
                            "text"=>"They share the living room.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u6dcq.mp3',
                            "timeRange"=>"00:07-00:09",
                            "text"=>"They share the living room.",
                        ),
                    ),
                ),
            )
        );


        $data['events'][] = array(
            "num"=>"21",
            'type'=>"text",
            "timeRange"=>"01:15-01:19",
            "text"=>"This is the bedroom to rent.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"22",
            'type'=>"text",
            "timeRange"=>"01:19-01:23",
            "text"=>"There are two bathrooms in the apartment.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"23",
            'type'=>"text",
            "timeRange"=>"01:23-01:27",
            "text"=>"One bathroom is in my bedroom.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"24",
            'type'=>"text",
            "timeRange"=>"01:27-01:32",
            "text"=>"Another one is here, right next to your bedroom.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"25",
            'type'=>"text",
            "timeRange"=>"01:32-01:36",
            "text"=>"So you can use it by yourself.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"26",
            'type'=>"text",
            "timeRange"=>"01:36-01:41",
            "text"=>"How big is the bedroom to rent?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"27",
            'type'=>"text",
            "timeRange"=>"01:41-01:45",
            "text"=>"It is 15 square meters.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"28",
            'type'=>"text",
            "timeRange"=>"01:45-01:51",
            "text"=>"Oh, the closet is big enough to fit all my stuff in.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"29",
            'type'=>"multipleChoices",
            "timeRange"=>"",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"30",
                    "content_id"=>944,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6dcq.mp3',
                    "timeRange"=>"00:18-00:21",
                    "text"=>"How big is the bedroom to rent?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"14 square meters.","isCorrect"=>false),
                        "1"=>array("item"=>"15 square meters.", "isCorrect"=>true),
                        "2"=>array("item"=>"16 square meters.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u6d.mp3',
                            "timeRange"=>"01:41-01:45",
                            "text"=>"It is 15 square meters.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u6d.mp3',
                            "timeRange"=>"01:41-01:45",
                            "text"=>"It is 15 square meters.",
                        ),
                    ),
                ),
                1=>array(
                    "num"=>"31",
                    "content_id"=>945,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6dcq.mp3',
                    "timeRange"=>"00:21-00:24",
                    "text"=>"Is Tina satisfied with the closet?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Yes.","isCorrect"=>true),
                        "1"=>array("item"=>"No.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u6dcq.mp3',
                            "timeRange"=>"00:24-00:29",
                            "text"=>"She's satisfied because the closet is big enough to fit all her stuff in. ",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u6dcq.mp3',
                            "timeRange"=>"00:24-00:29",
                            "text"=>"She's satisfied because the closet is big enough to fit all her stuff in. ",
                        ),
                    ),
                )
            )
        );

        $data['events'][] = array(
            "num"=>"32",
            'type'=>"text",
            "timeRange"=>"01:51-02:00",
            "text"=>"Yes. The bed is queen size, and the desk is large enough for you to put computers and books.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"33",
            'type'=>"text",
            "timeRange"=>"02:00-02:03",
            "text"=>"Excellent.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"34",
            'type'=>"text",
            "timeRange"=>"02:03-02:06",
            "text"=>"Where is the kitchen?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"35",
            'type'=>"text",
            "timeRange"=>"02:06-02:10",
            "text"=>"Oh, this is the kitchen.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"36",
            'type'=>"text",
            "timeRange"=>"02:10-02:14",
            "text"=>"The electric stove has four burners.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"37",
            'type'=>"text",
            "timeRange"=>"02:14-02:18",
            "text"=>"The oven is below it.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"38",
            'type'=>"text",
            "timeRange"=>"02:18-02:25",
            "text"=>"Over there you see the microwave oven, the fridge and washing machine.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"39",
            'type'=>"multipleChoices",
            "timeRange"=>"",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"40",
                    "content_id"=>946,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6dcq.mp3',
                    "timeRange"=>"00:29-00:31",
                    "text"=>"How big is the bed?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"It's king size.","isCorrect"=>false),
                        "1"=>array("item"=>"It's queen size.", "isCorrect"=>true),
                        "2"=>array("item"=>"It's a small one.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u6d.mp3',
                            "timeRange"=>"01:51-02:00",
                            "text"=>"Yes. The bed is queen size, and the desk is large enough for you to put computers and books.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u6d.mp3',
                            "timeRange"=>"01:51-02:00",
                            "text"=>"Yes. The bed is queen size, and the desk is large enough for you to put computers and books.",
                        ),
                    ),
                ),
                1=>array(
                    "num"=>"41",
                    "content_id"=>947,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6dcq.mp3',
                    "timeRange"=>"00:31-00:33",
                    "text"=>"Is the desk small?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Yes.","isCorrect"=>false),
                        "1"=>array("item"=>"No.", "isCorrect"=>true),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u6dcq.mp3',
                            "timeRange"=>"00:33-00:37",
                            "text"=>"The desk is large enough for Tina to put computers and books.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u6dcq.mp3',
                            "timeRange"=>"00:33-00:37",
                            "text"=>"The desk is large enough for Tina to put computers and books.",
                        ),
                    ),
                ),
                2=>array(
                    "num"=>"42",
                    "content_id"=>948,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6dcq.mp3',
                    "timeRange"=>"00:37-00:40",
                    "text"=>"What is NOT in the kitchen?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"The electric stove with two burners.","isCorrect"=>true),
                        "1"=>array("item"=>"The microwave oven and the fridge.", "isCorrect"=>false),
                        "2"=>array("item"=>"The washing machine.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u6dcq.mp3',
                            "timeRange"=>"00:40-00:48",
                            "text"=>"The kitchen has an electric stove with four burners, an oven below it, a microwave oven, the fridge and washing machine. ",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u6dcq.mp3',
                            "timeRange"=>"00:40-00:48",
                            "text"=>"The kitchen has an electric stove with four burners, an oven below it, a microwave oven, the fridge and washing machine. ",
                        ),
                    ),
                ),
            )
        );

        $data['events'][] = array(
            "num"=>"43",
            'type'=>"text",
            "timeRange"=>"02:25-02:30",
            "text"=>"Four cabinets for kitchen ware.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"44",
            'type'=>"text",
            "timeRange"=>"02:30-02:37",
            "text"=>"I don't do much cooking so I only have a few pots and pans.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"45",
            'type'=>"text",
            "timeRange"=>"02:37-02:45",
            "text"=>"You have enough storage space for kitchen ware, tableware and seasonings.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"46",
            'type'=>"text",
            "timeRange"=>"02:45-02:49",
            "text"=>"What about the air-conditioning? ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"47",
            'type'=>"text",
            "timeRange"=>"02:49-02:53",
            "text"=>"Is it central air-conditioning?",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"48",
            'type'=>"text",
            "timeRange"=>"02:53-02:58",
            "text"=>"Yes, the button is here on the entrance wall.",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"49",
            'type'=>"text",
            "timeRange"=>"02:58-03:04",
            "text"=>"It is for both cooling in summer and heating in winter.",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"50",
            'type'=>"multipleChoices",
            "timeRange"=>"",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"51",
                    "content_id"=>949,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6dcq.mp3',
                    "timeRange"=>"00:48-00:51",
                    "text"=>"How many cabinets are there in the kitchen?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Two.","isCorrect"=>false),
                        "1"=>array("item"=>"Three.", "isCorrect"=>false),
                        "2"=>array("item"=>"Four.", "isCorrect"=>true),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u6dcq.mp3',
                            "timeRange"=>"00:51-00:54",
                            "text"=>"There are four cabinets in the kitchen.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u6dcq.mp3',
                            "timeRange"=>"00:51-00:54",
                            "text"=>"There are four cabinets in the kitchen.",
                        ),
                    ),
                ),
                1=>array(
                    "num"=>"52",
                    "content_id"=>950,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6dcq.mp3',
                    "timeRange"=>"00:54-00:57",
                    "text"=>"Does Jim have a lot of kitchen ware?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Yes.","isCorrect"=>false),
                        "1"=>array("item"=>"No.", "isCorrect"=>true),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u6dcq.mp3',
                            "timeRange"=>"00:57-01:02",
                            "text"=>"He doesn't do much cooking so he only has a few pots and pans.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u6dcq.mp3',
                            "timeRange"=>"00:57-01:02",
                            "text"=>"He doesn't do much cooking so he only has a few pots and pans.",
                        ),
                    ),
                ),
                2=>array(
                    "num"=>"53",
                    "content_id"=>951,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6dcq.mp3',
                    "timeRange"=>"01:02-01:05",
                    "text"=>"What kind of air-conditioning is it?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"It's only for cooling.","isCorrect"=>false),
                        "1"=>array("item"=>"It's only for heating.", "isCorrect"=>false),
                        "2"=>array("item"=>"It's central air-conditioning.", "isCorrect"=>true),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u6dcq.mp3',
                            "timeRange"=>"01:05-01:10",
                            "text"=>"It's central air-conditioning and it is for both cooling in summer and heating in winter.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u6dcq.mp3',
                            "timeRange"=>"01:05-01:10",
                            "text"=>"It's central air-conditioning and it is for both cooling in summer and heating in winter.",
                        ),
                    ),
                ),
            )
        );

        $data['events'][] = array(
            "num"=>"54",
            'type'=>"text",
            "timeRange"=>"03:04-03:09",
            "text"=>"Is it convenient to go shopping here?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"55",
            'type'=>"text",
            "timeRange"=>"03:09-03:12",
            "text"=>"Yes.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"56",
            'type'=>"text",
            "timeRange"=>"03:12-03:18",
            "text"=>"There is a small shopping area just five blocks away from here.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"57",
            'type'=>"text",
            "timeRange"=>"03:18-03:25",
            "text"=>"There are bars, restaurants, bookstores, and a small supermarket there.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"58",
            'type'=>"text",
            "timeRange"=>"03:25-03:30",
            "text"=>"It takes only 15 minutes to get there on foot.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"59",
            'type'=>"text",
            "timeRange"=>"03:30-03:36",
            "text"=>"By the way, where can I put my bicycle?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"60",
            'type'=>"text",
            "timeRange"=>"03:36-03:41",
            "text"=>"You can put your bike just outside in the yard.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"61",
            'type'=>"text",
            "timeRange"=>"03:41-03:46",
            "text"=>"If you drive, you can also park your car there.",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"62",
            'type'=>"multipleChoices",
            "timeRange"=>"",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"63",
                    "content_id"=>952,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6dcq.mp3',
                    "timeRange"=>"01:10-01:13",
                    "text"=>"What is in the shopping area nearby?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Bars and restaurants.","isCorrect"=>false),
                        "1"=>array("item"=>"Bookstores and supermarket.", "isCorrect"=>false),
                        "2"=>array("item"=>"Both A and B.", "isCorrect"=>true),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u6d.mp3',
                            "timeRange"=>"03:18-03:25",
                            "text"=>"There are bars, restaurants, bookstores, and a small supermarket there.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u6d.mp3',
                            "timeRange"=>"03:18-03:25",
                            "text"=>"There are bars, restaurants, bookstores, and a small supermarket there.",
                        ),
                    ),
                ),
                1=>array(
                    "num"=>"64",
                    "content_id"=>953,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6dcq.mp3',
                    "timeRange"=>"01:16-01:19",
                    "text"=>"Where can Tina put her bike or car?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"The parking lot nearby.","isCorrect"=>false),
                        "1"=>array("item"=>"There's no space for bike or car.", "isCorrect"=>false),
                        "2"=>array("item"=>"The yard outside the house.", "isCorrect"=>true),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u6dcq.mp3',
                            "timeRange"=>"01:19-01:25",
                            "text"=>"She can put her bike just outside in the yard. If she drives, she can also park her car there. ",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u6dcq.mp3',
                            "timeRange"=>"01:19-01:25",
                            "text"=>"She can put her bike just outside in the yard. If she drives, she can also park her car there. ",
                        ),
                    ),
                )
            )
        );

        $data['events'][] = array(
            "num"=>"65",
            'type'=>"text",
            "timeRange"=>"03:46-03:53",
            "text"=>"So we share the electricity, internet, heating, and water?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"66",
            'type'=>"text",
            "timeRange"=>"03:53-03:58",
            "text"=>"Yes. Each month, we pay before the 10th.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"67",
            'type'=>"text",
            "timeRange"=>"03:58-04:01",
            "text"=>"Also.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"68",
            'type'=>"text",
            "timeRange"=>"04:01-04:08",
            "text"=>"The landlord hires a lady to clean the apartment and the yard once a week.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"69",
            'type'=>"text",
            "timeRange"=>"04:08-04:13",
            "text"=>"Deal! When can I move in?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"70",
            'type'=>"text",
            "timeRange"=>"04:13-04:16",
            "text"=>"Anytime you like!",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"71",
            'type'=>"text",
            "timeRange"=>"04:16-04:22",
            "text"=>"Ok, I will probably move in next Monday.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"72",
            'type'=>"text",
            "timeRange"=>"04:22-04:25",
            "text"=>"Welcome!",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"73",
            'type'=>"multipleChoices",
            "timeRange"=>"",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"74",
                    "content_id"=>954,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6dcq.mp3',
                    "timeRange"=>"01:33-01:35",
                    "text"=>"Will Tina move in?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Yes.","isCorrect"=>true),
                        "1"=>array("item"=>"No.", "isCorrect"=>false)
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u6dcq.mp3',
                            "timeRange"=>"01:35-01:37",
                            "text"=>"She will move in.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u6dcq.mp3',
                            "timeRange"=>"01:35-01:37",
                            "text"=>"She will move in.",
                        ),
                    ),
                ),
                1=>array(
                    "num"=>"75",
                    "content_id"=>955,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6dcq.mp3',
                    "timeRange"=>"01:37-01:39",
                    "text"=>"When can Tina move in?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Anytime.","isCorrect"=>true),
                        "1"=>array("item"=>"Next Monday.", "isCorrect"=>false),
                        "2"=>array("item"=>"Now.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u6dcq.mp3',
                            "timeRange"=>"01:39-01:42",
                            "text"=>"She can move in any time she likes.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u6dcq.mp3',
                            "timeRange"=>"01:39-01:42",
                            "text"=>"She can move in any time she likes.",
                        ),
                    ),
                )
            )
        );

         $this->saveEventListToDatabases($data);$a =  json_encode($data);
        $fp = fopen('json133.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
        return;
    }



    public function getPart134()
    {
        $data = array(
            "unit_id"       =>6,
            "lesson_id"     =>34,
            "part_id"       =>134,
            "media_filename"=>'media/u6d.mp4',
            "media_type"    =>'video',
            "totalTime"     =>"4:05",
            "part_type"     =>"dialog",
            "have_questions"=>false,
            "questions_type"=>"text",
            "keywords"      =>array(
                "two-bedroom apartment",
                "square meter",
                "spacious",
                "closet",
                "fit in",
                "queen size",
                "electric stove",
                "burner",
                "microwave oven",
                "fridge",
                "washing machine",
                "cabinet",
                "kitchen ware",
                "pot and pan",
                "storage space",
                "tableware",
                "seasoning",
                "air-conditioning",
                "block",
                "heating",
                "deal"
            ),
        );

        $data['events'][] = array(
            "num"=>"1",
            'type'=>"text",
            "timeRange"=>"00:00-00:06",
            "text"=>"Tina is looking for a room to rent for her new college life.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"2",
            'type'=>"text",
            "timeRange"=>"00:06-00:11",
            "text"=>"She found an advertisement about a room for rent.",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"3",
            'type'=>"text",
            "timeRange"=>"00:11-00:16",
            "text"=>"The apartment is very close to the campus.",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"4",
            'type'=>"text",
            "timeRange"=>"00:16-00:22",
            "text"=>"Jim is the one who has posted the advertisement.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"5",
            'type'=>"text",
            "timeRange"=>"00:22-00:27",
            "text"=>"Now, the two meet at Jim's house.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"6",
            'type'=>"text",
            "timeRange"=>"00:27-00:31",
            "text"=>"Hi, Tina, I'm Jim.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"7",
            'type'=>"text",
            "timeRange"=>"0:31-00:34",
            "text"=>"Nice to meet you.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"8",
            'type'=>"text",
            "timeRange"=>"00:34-00:39",
            "text"=>"Hi, Jim, nice to meet you, too.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"9",
            'type'=>"text",
            "timeRange"=>"00:39-00:42",
            "text"=>"Let me show you the room.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"10",
            'type'=>"sr_reading",
            "content_id"=>956,
            "scores"=>1,
            "timeRange"=>"00:42-00:46",
            "text"=>"This is a two-bedroom apartment.",
            "answer"=>"This is a two bedroom apartment",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"11",
            'type'=>"text",
            "timeRange"=>"00:46-00:50",
            "text"=>"Oh, it is very big.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"12",
            'type'=>"text",
            "timeRange"=>"00:50-00:54",
            "text"=>"The living room is very big.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"13",
            'type'=>"sr_reading",
            "content_id"=>957,
            "scores"=>1,
            "timeRange"=>"00:54-00:59",
            "text"=>"It is about 25 square meters.",
            "answer"=>"It is about 25 square meters",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"14",
            'type'=>"text",
            "timeRange"=>"00:59-01:06",
            "text"=>"There is a sofa, a TV, a dining table and a big bookcase here.",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"15",
            'type'=>"text",
            "timeRange"=>"01:06-01:10",
            "text"=>"We just share the living room.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"16",
            'type'=>"sr_reading",
            "content_id"=>958,
            "scores"=>1,
            "timeRange"=>"01:10-01:15",
            "text"=>"It is really spacious.",
            "answer"=>"It is really spacious",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"17",
            'type'=>"text",
            "timeRange"=>"01:15-01:19",
            "text"=>"This is the bedroom to rent.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"18",
            'type'=>"sr_reading",
            "content_id"=>959,
            "scores"=>1,
            "timeRange"=>"01:19-01:23",
            "text"=>"There are two bathrooms in the apartment.",
            "answer"=>"There are two bathrooms in the apartment",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"19",
            'type'=>"text",
            "timeRange"=>"01:23-01:27",
            "text"=>"One bathroom is in my bedroom.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"20",
            'type'=>"text",
            "timeRange"=>"01:27-01:32",
            "text"=>"Another one is here, right next to your bedroom.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"21",
            'type'=>"text",
            "timeRange"=>"01:32-01:36",
            "text"=>"So you can use it by yourself.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"22",
            'type'=>"sr_reading",
            "content_id"=>960,
            "scores"=>1,
            "timeRange"=>"01:36-01:41",
            "text"=>"How big is the bedroom to rent?",
            "answer"=>"How big is the bedroom to rent",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"23",
            'type'=>"text",
            "timeRange"=>"01:41-01:45",
            "text"=>"It is 15 square meters.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"24",
            'type'=>"sr_reading",
            "content_id"=>961,
            "scores"=>1,
            "timeRange"=>"01:45-01:51",
            "text"=>"Oh, the closet is big enough to fit all my stuff in.",
            "answer"=>"Oh, the closet is big enough to fit all my stuff in",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"25",
            'type'=>"text",
            "timeRange"=>"01:51-02:00",
            "text"=>"Yes. The bed is queen size, and the desk is large enough for you to put computers and books.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"26",
            'type'=>"text",
            "timeRange"=>"02:00-02:03",
            "text"=>"Excellent.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"27",
            'type'=>"text",
            "timeRange"=>"02:03-02:06",
            "text"=>"Where is the kitchen?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"28",
            'type'=>"sr_reading",
            "content_id"=>962,
            "scores"=>1,
            "timeRange"=>"02:06-02:10",
            "text"=>"Oh, this is the kitchen.",
            "answer"=>"Oh, this is the kitchen.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"29",
            'type'=>"text",
            "timeRange"=>"02:10-02:14",
            "text"=>"The electric stove has four burners.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"30",
            'type'=>"text",
            "timeRange"=>"02:14-02:18",
            "text"=>"The oven is below it.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"31",
            'type'=>"text",
            "timeRange"=>"02:18-02:25",
            "text"=>"Over there you see the microwave oven, the fridge and washing machine.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"32",
            'type'=>"sr_reading",
            "content_id"=>963,
            "scores"=>1,
            "timeRange"=>"02:25-02:30",
            "text"=>"Four cabinets for kitchen ware.",
            "answer"=>"Four cabinets for kitchen ware",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"33",
            'type'=>"text",
            "timeRange"=>"02:30-02:37",
            "text"=>"I don't do much cooking so I only have a few pots and pans.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"34",
            'type'=>"sr_reading",
            "content_id"=>964,
            "scores"=>1,
            "timeRange"=>"02:37-02:45",
            "text"=>"You have enough storage space for kitchen ware, tableware and seasonings.",
            "answer"=>"You have enough storage space for kitchen ware tableware and seasonings",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"35",
            'type'=>"text",
            "timeRange"=>"02:45-02:49",
            "text"=>"What about the air-conditioning? ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"36",
            'type'=>"text",
            "timeRange"=>"02:49-02:53",
            "text"=>"Is it central air-conditioning?",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"37",
            'type'=>"sr_reading",
            "content_id"=>965,
            "scores"=>1,
            "timeRange"=>"02:53-02:58",
            "text"=>"Yes, the button is here on the entrance wall.",
            "answer"=>"Yes, the button is here on the entrance wall",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"38",
            'type'=>"text",
            "timeRange"=>"02:58-03:04",
            "text"=>"It is for both cooling in summer and heating in winter.",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"39",
            'type'=>"text",
            "timeRange"=>"03:04-03:09",
            "text"=>"Is it convenient to go shopping here?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"40",
            'type'=>"text",
            "timeRange"=>"03:09-03:12",
            "text"=>"Yes.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"41",
            'type'=>"sr_reading",
            "content_id"=>966,
            "scores"=>1,
            "timeRange"=>"03:12-03:18",
            "text"=>"There is a small shopping area just five blocks away from here.",
            "answer"=>"There is a small shopping area just five blocks away from here",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"42",
            'type'=>"text",
            "timeRange"=>"03:18-03:25",
            "text"=>"There are bars, restaurants, bookstores, and a small supermarket there.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"43",
            'type'=>"text",
            "timeRange"=>"03:25-03:30",
            "text"=>"It takes only 15 minutes to get there on foot.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"44",
            'type'=>"text",
            "timeRange"=>"03:30-03:36",
            "text"=>"By the way, where can I put my bicycle?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"45",
            "type"=>"sr_reading",
            "content_id"=>967,
            "scores"=>1,
            "timeRange"=>"03:36-03:41",
            "text"=>"You can put your bike just outside in the yard.",
            "answer"=>"You can put your bike just outside in the yard",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"46",
            'type'=>"text",
            "timeRange"=>"03:41-03:46",
            "text"=>"If you drive, you can also park your car there.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"47",
            'type'=>"text",
            "timeRange"=>"03:46-03:53",
            "text"=>"So we share the electricity, internet, heating, and water?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"48",
            'type'=>"text",
            "timeRange"=>"03:53-03:58",
            "text"=>"Yes. Each month, we pay before the 10th.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"49",
            'type'=>"text",
            "timeRange"=>"03:58-04:01",
            "text"=>"Also.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"50",
            "type"=>"sr_reading",
            "content_id"=>968,
            "scores"=>1,
            "timeRange"=>"04:01-04:08",
            "text"=>"The landlord hires a lady to clean the apartment and the yard once a week.",
            "answer"=>"The landlord hires a lady to clean the apartment and the yard once a week",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"51",
            'type'=>"text",
            "timeRange"=>"04:08-04:13",
            "text"=>"Deal! When can I move in?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"52",
            "type"=>"sr_reading",
            "content_id"=>969,
            "scores"=>1,
            "timeRange"=>"04:13-04:16",
            "text"=>"Anytime you like!",
            "answer"=>"Anytime you like",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"53",
            'type'=>"text",
            "timeRange"=>"04:16-04:22",
            "text"=>"Ok, I will probably move in next Monday.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"54",
            'type'=>"text",
            "timeRange"=>"04:22-04:25",
            "text"=>"Welcome!",
            "picture"=>""
        );
        $this->saveEventListToDatabases($data);
        $a = json_encode($data);
        $fp = fopen('json134.txt', "w");
        fwrite($fp, $a);
        fclose($fp);
        return;
    }


    public function getPart135(){
        $dataT = array(
            "unit_id"       =>6,
            "lesson_id"     =>35,
            "part_id"       =>135,
            "media_filename"=>'media/u6ps.mp3',
            "media_type"    =>'audio',
            "totalTime"     =>"1:34",
            "part_type"     =>"summary",
            "have_questions"=>true,
            "questions_type"=>"sr",
            "keywords"      =>array(
                "avenue",
                "opposite",
                "situate",
                "on the east side of",
                "conveniently located",
                "next to",
                "fill up",
                "subway station",
                "on the south side of",
                "grocery store",
                "steak house",
                "across from",
                "on the other side of"
            ),
        );
        $data['events'][] = array(
            "num"=>"1",
            'type'=>"text",
            "timeRange"=>"00:00-00:08",
            "text"=>"Linda's college is located on Moon Avenue just north of Star Street.",
            "picture"=>"images/u6_ps_001.png"
        );
        $data['events'][] = array(
            "num"=>"2",
            'type'=>"text",
            "timeRange"=>"00:08-00:20",
            "text"=>"There's a natural green park area beside the campus, and right opposite, a city museum and a large cafe.",
            "picture"=>"images/u6_ps_002.png"
        );
        $data['events'][] = array(
            "num"=>"3",
            'type'=>"text",
            "timeRange"=>"00:20-00:31",
            "text"=>"There is a parking lot situated on the East side of the museum and south of the parking lot there is a travel agency.",
            "picture"=>"images/u6_ps_003.png"
        );

        $data['events'][] = array(
            "num"=>"4",
            'type'=>"text",
            "timeRange"=>"00:31-00:40",
            "text"=>"There is also a conveniently located gas station right next to the parking lot. ",
            "picture"=>"images/u6_ps_004.png"
        );
        $data['events'][] = array(
            "num"=>"5",
            'type'=>"text",
            "timeRange"=>"00:40-00:45",
            "text"=>"Don't forget to fill up on gas there.",
            "picture"=>"images/u6_ps_004.png"
        );
        $data['events'][] = array(
            "num"=>"6",
            'type'=>"text",
            "timeRange"=>"00:45-00:54",
            "text"=>"If you don't own a car, not to worry, there is a subway station in front of the gas station.",
            "picture"=>"images/u6_ps_005.png"
        );
        $data['events'][] = array(
            "num"=>"7",
            'type'=>"text",
            "timeRange"=>"00:54-01:00",
            "text"=>"You can get to almost anywhere easily by subway.",
            "picture"=>"images/u6_ps_005.png"
        );
        $data['events'][] = array(
            "num"=>"8",
            'type'=>"text",
            "timeRange"=>"01:00-01:08",
            "text"=>"On the south side of Star Street, there are all kinds of interesting stores. ",
            "picture"=>"images/u6_ps_006.png"
        );
        $data['events'][] = array(
            "num"=>"9",
            'type'=>"text",
            "timeRange"=>"01:08-01:13",
            "text"=>"The grocery store is open 24 hours.",
            "picture"=>"images/u6_ps_006.png"
        );
        $data['events'][] = array(
            "num"=>"10",
            'type'=>"text",
            "timeRange"=>"01:13-01:19",
            "text"=>"Next door to it, there are two restaurants.",
            "picture"=>"images/u6_ps_007.png"
        );
        $data['events'][] = array(
            "num"=>"11",
            'type'=>"text",
            "timeRange"=>"01:19-01:26",
            "text"=>"One is a fast food place and the other is a steak house.",
            "picture"=>"images/u6_ps_007.png"
        );
        $data['events'][] = array(
            "num"=>"12",
            'type'=>"text",
            "timeRange"=>"01:26-01:33",
            "text"=>"Across from the restaurants you can find a bank and a bookstore.",
            "picture"=>"images/u6_ps_008.png"
        );
        $data['events'][] = array(
            "num"=>"13",
            'type'=>"text",
            "timeRange"=>"01:33-01:42",
            "text"=>"Next to the bank on the east side there is a big two story supermarket. ",
            "picture"=>"images/u6_ps_009.png"
        );
        $data['events'][] = array(
            "num"=>"14",
            'type'=>"text",
            "timeRange"=>"01:42-01:52",
            "text"=>"On the other side of the supermarket there's an old movie theatre and next to that, a clothing store.",
            "picture"=>"images/u6_ps_010.png"
        );

        $data['events'][] = array(
            "num"=>"1",
            "content_id"=>970,
            'type'=>"sr_readings",
            "timeRange"=>array("00:00-00:06","00:04-00:11","00:09-00:15"),
            "scores"=>1,
            "text"=>array("Linda's college is located on Moon Avenue just north of Star Street.","There's a natural green park area beside the campus, and right opposite, a city museum and a large cafe.","There is a parking lot situated on the East side of the museum and south of the parking lot there is a travel agency."),
            "answer"=>array("Linda's college is located on Moon Avenue just north of Star Street","There's a natural green park area beside the campus and right opposite a city museum and a large cafe","There is a parking lot situated on the East side of the museum and south of the parking lot there is a travel agency"),
            "pictures"=> array("images/u6_ps_010.png","images/u6_ps_010.png","images/u6_ps_010.png"),
            "picture"=>"images/u6_ps_010.png"
        );
        $data['events'][] = array(
            "num"=>"2",
            "content_id"=>971,
            'type'=>"sr_readings",
            "timeRange"=>array("00:13-00:24","00:21-00:25","00:25-00:32"),
            "scores"=>1,
            "text"=>array("There is also a conveniently located gas station right next to the parking lot. ","Don't forget to fill up on gas there.","If you don't own a car, not to worry, there is a subway station in front of the gas station."),
            "answer"=>array("There is also a conveniently located gas station right next to the parking lot","Don't forget to fill up on gas there","If you don't own a car, not to worry there is a subway station in front of the gas station"),
            "pictures"=> array("images/u6_ps_010.png","images/u6_ps_010.png","images/u6_ps_010.png"),
            "picture"=>"images/u6_ps_010.png"
        );

        $data['events'][] = array(
            "num"=>"3",
            "content_id"=>972,
            'type'=>"sr_readings",
            "timeRange"=>array("00:32-00:38","00:38-00:45","00:45-00:49"),
            "scores"=>1,
            "text"=>array("You can get to almost anywhere easily by subway.","On the south side of Star Street, there are all kinds of interesting stores.","The grocery store is open 24 hours."),
            "answer"=>array("You can get to almost anywhere easily by subway","On the south side of Star Street, there are all kinds of interesting stores","The grocery store is open 24 hours"),
            "picture"=>"images/u6_ps_010.png",
            "pictures"=>array("images/u6_ps_010.png","images/u6_ps_010.png","images/u6_ps_010.png")
        );

        $data['events'][] = array(
            "num"=>"4",
            "content_id"=>973,
            'type'=>"sr_readings",
            "timeRange"=>array("00:49-00:54","00:54-00:58","00:58-01:02","00:58-01:02"),
            "scores"=>1,
            "picture"=>"images/u6_ps_010.png",
            "text"=>array("Next door to it, there are two restaurants.","One is a fast food place and the other is a steak house.","Across from the restaurants you can find a bank and a bookstore."),
            "answer"=>array("Next door to it there are two restaurants","One is a fast food place and the other is a steak house","Across from the restaurants you can find a bank and a bookstore"),
            "pictures"=>array("images/u6_ps_010.png","images/u6_ps_010.png","images/u6_ps_010.png")

        );
        $data['events'][] = array(
            "num"=>"5",
            "content_id"=>974,
            'type'=>"sr_readings",
            "timeRange"=>array("00:49-00:54","00:54-00:58","00:58-01:02","00:58-01:02"),
            "scores"=>1,
            "picture"=>"images/u6_ps_010.png",
            "text"=>array("Next to the bank on the east side there is a big two story supermarket.","On the other side of the supermarket there's an old movie theatre and next to that, a clothing store."),
            "answer"=>array("Next to the bank on the east side there is a big two story supermarket","On the other side of the supermarket there's an old movie theatre and next to that a clothing store"),
            "pictures"=>array("images/u6_ps_010.png","images/u6_ps_010.png","images/u6_ps_010.png","images/u6_ps_010.png")

        );
        $database = array_merge($dataT,$data);
        //$database = array_merge($database,$data1);

        //exit;
        $this->saveEventListToDatabases($database);
       // $dataT['eventLists'] = array($data,$data1);
        $a =  json_encode($dataT);
        $fp = fopen('json135.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
        return;
    }


    public function getPart136(){
        $data = array(
            "unit_id"       =>6,
            "lesson_id"     =>35,
            "part_id"       =>136,
            "media_filename"=>'media/u6p.mp3',
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
            "content_id"=>975,
            'type'=>"sr_reading",
            "timeRange"=>"00:00-00:08",
            "scores"=>1,
            "text"=>"Linda's college is located on Moon Avenue just north of Star Street.",
            "answer"=>"Linda's college is located on Moon Avenue just north of Star Street",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6p.mp3',
                    "timeRange"=>"00:00-00:08",
                    "text"=>"Linda's college is located on Moon Avenue just north of Star Street.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6p.mp3',
                    "timeRange"=>"00:00-00:08",
                    "text"=>"Linda's college is located on Moon Avenue just north of Star Street.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"2",
            "content_id"=>976,
            'type'=>"sr_reading",
            "timeRange"=>"00:24-00:31",
            "scores"=>1,
            "text"=>"Across from the college, on Moon Avenue, there's The City Museum.",
            "answer"=>"Across from the college on Moon Avenue there's The City Museum",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6p.mp3',
                    "timeRange"=>"00:24-00:31",
                    "text"=>"Across from the college, on Moon Avenue, there's The City Museum.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6p.mp3',
                    "timeRange"=>"00:24-00:31",
                    "text"=>"Across from the college, on Moon Avenue, there's The City Museum.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"3",
            "content_id"=>977,
            'type'=>"sr_reading",
            "timeRange"=>"00:36-00:43",
            "scores"=>1,
            "text"=>"She always used to love learning about the history of the city as a child.",
            "answer"=>"She always used to love learning about the history of the city as a child",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6p.mp3',
                    "timeRange"=>"00:36-00:43",
                    "text"=>"She always used to love learning about the history of the city as a child.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6p.mp3',
                    "timeRange"=>"00:36-00:43",
                    "text"=>"She always used to love learning about the history of the city as a child.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"4",
            "content_id"=>978,
            'type'=>"sr_reading",
            "timeRange"=>"00:43-00:51",
            "scores"=>1,
            "text"=>"Just in front of the museum there's a nice café where you can get hot drinks and snacks.",
            "answer"=>"Just in front of the museum there's a nice café where you can get hot drinks and snacks",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6p.mp3',
                    "timeRange"=>"00:43-00:51",
                    "text"=>"Just in front of the museum there's a nice café where you can get hot drinks and snacks.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6p.mp3',
                    "timeRange"=>"00:43-00:51",
                    "text"=>"Just in front of the museum there's a nice café where you can get hot drinks and snacks.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"5",
            "content_id"=>979,
            'type'=>"sr_reading",
            "timeRange"=>"01:09-01:17",
            "scores"=>1,
            "text"=>"On the right of the parking lot there's a gas station that's open 24 hours.",
            "answer"=>"On the right of the parking lot there's a gas station that's open 24 hours",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6p.mp3',
                    "timeRange"=>"01:09-01:17",
                    "text"=>"On the right of the parking lot there's a gas station that's open 24 hours.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6p.mp3',
                    "timeRange"=>"01:09-01:17",
                    "text"=>"On the right of the parking lot there's a gas station that's open 24 hours.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"6",
            "content_id"=>980,
            'type'=>"sr_reading",
            "timeRange"=>"01:17-01:24",
            "scores"=>1,
            "text"=>"There's a new subway station being constructed on Star Street.",
            "answer"=>"There's a new subway station being constructed on Star Street",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6p.mp3',
                    "timeRange"=>"01:17-01:24",
                    "text"=>"There's a new subway station being constructed on Star Street.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6p.mp3',
                    "timeRange"=>"01:17-01:24",
                    "text"=>"There's a new subway station being constructed on Star Street.",
                    ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"7",
            "content_id"=>982,
            'type'=>"sr_reading",
            "timeRange"=>"01:35-01:43",
            "scores"=>1,
            "text"=>"On the south side of Star Street, there are a few stores and places to eat.",
            "answer"=>"On the south side of Star Street there are a few stores and places to eat",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6p.mp3',
                    "timeRange"=>"01:35-01:43",
                    "text"=>"On the south side of Star Street, there are a few stores and places to eat.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6p.mp3',
                    "timeRange"=>"01:35-01:43",
                    "text"=>"On the south side of Star Street, there are a few stores and places to eat.",
                    ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"8",
            "content_id"=>982,
            'type'=>"sr_reading",
            "timeRange"=>"02:00-02:06",
            "scores"=>1,
            "text"=>"On the corner of Star Street and Moon Avenue there is a bank.",
            "answer"=>"On the corner of Star Street and Moon Avenue there is a bank",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6p.mp3',
                    "timeRange"=>"02:00-02:06",
                    "text"=>"On the corner of Star Street and Moon Avenue there is a bank.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6p.mp3',
                    "timeRange"=>"02:00-02:06",
                    "text"=>"On the corner of Star Street and Moon Avenue there is a bank.",
                    ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"9",
            "content_id"=>983,
            'type'=>"sr_reading",
            "timeRange"=>"02:13-02:20",
            "scores"=>1,
            "text"=>"There's an ATM outside the bank that faces Star Street.",
            "answer"=>"There's an ATM outside the bank that faces Star Street",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6p.mp3',
                    "timeRange"=>"02:13-02:20",
                    "text"=>"There's an ATM outside the bank that faces Star Street.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6p.mp3',
                    "timeRange"=>"02:13-02:20",
                    "text"=>"There's an ATM outside the bank that faces Star Street.",
                    ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"10",
            "content_id"=>984,
            'type'=>"sr_reading",
            "timeRange"=>"02:20-02:28",
            "scores"=>1,
            "text"=>"Behind the bank there is a bookstore that mainly sells second hand textbooks.",
            "answer"=>"Behind the bank there is a bookstore that mainly sells second hand textbooks",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6p.mp3',
                    "timeRange"=>"02:20-02:28",
                    "text"=>"Behind the bank there is a bookstore that mainly sells second hand textbooks.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6p.mp3',
                    "timeRange"=>"02:20-02:28",
                    "text"=>"Behind the bank there is a bookstore that mainly sells second hand textbooks.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );


        $data['events'][] = array(
            "num"=>"11",
            "content_id"=>985,
            'type'=>"sr_reading",
            "timeRange"=>"02:41-02:51",
            "scores"=>1,
            "text"=>"On the first floor there are all different food aisles plus the soaps and cleaning aisle and the sports aisle.",
            "answer"=>"On the first floor there are all different food aisles plus the soaps and cleaning aisle and the sports aisle",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6p.mp3',
                    "timeRange"=>"02:41-02:51",
                    "text"=>"On the first floor there are all different food aisles plus the soaps and cleaning aisle and the sports aisle.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6p.mp3',
                    "timeRange"=>"02:41-02:51",
                    "text"=>"On the first floor there are all different food aisles plus the soaps and cleaning aisle and the sports aisle.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"12",
            "content_id"=>986,
            'type'=>"sr_reading",
            "timeRange"=>"03:04-03:10",
            "scores"=>1,
            "text"=>"Next to the supermarket there's a small old movie theatre.",
            "answer"=>"Next to the supermarket there's a small old movie theatre.",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6p.mp3',
                    "timeRange"=>"03:04-03:10",
                    "text"=>"Next to the supermarket there's a small old movie theatre.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6p.mp3',
                    "timeRange"=>"03:04-03:10",
                    "text"=>"Next to the supermarket there's a small old movie theatre.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"13",
            "content_id"=>987,
            'type'=>"sr_reading",
            "timeRange"=>"03:17-03:23",
            "scores"=>1,
            "text"=>"Behind the movie theatre there is a small clothes store.",
            "answer"=>"Behind the movie theatre there is a small clothes store",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6p.mp3',
                    "timeRange"=>"03:17-03:23",
                    "text"=>"Behind the movie theatre there is a small clothes store.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6p.mp3',
                    "timeRange"=>"03:17-03:23",
                    "text"=>"Behind the movie theatre there is a small clothes store.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"14",
            "content_id"=>988,
            'type'=>"sr_reading",
            "timeRange"=>"00:59-01:06",
            "scores"=>1,
            "text"=>"There is a sofa, a TV, a dining table and a big bookcase here. ",
            "answer"=>"There is a sofa a TV a dining table and a big bookcase here",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6d.mp3',
                    "timeRange"=>"00:59-01:06",
                    "text"=>"There is a sofa, a TV, a dining table and a big bookcase here. ",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6d.mp3',
                    "timeRange"=>"00:59-01:06",
                    "text"=>"There is a sofa, a TV, a dining table and a big bookcase here. ",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"15",
            "content_id"=>989,
            'type'=>"sr_reading",
            "timeRange"=>"01:51-02:00",
            "scores"=>1,
            "text"=>"Yes. The bed is queen size, and the desk is large enough for you to put computers and books.",
            "answer"=>"Yes The bed is queen size and the desk is large enough for you to put computers and books",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6d.mp3',
                    "timeRange"=>"01:51-02:00",
                    "text"=>"Yes. The bed is queen size, and the desk is large enough for you to put computers and books.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6d.mp3',
                    "timeRange"=>"01:51-02:00",
                    "text"=>"Yes. The bed is queen size, and the desk is large enough for you to put computers and books.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"16",
            "content_id"=>990,
            'type'=>"sr_reading",
            "timeRange"=>"02:08-02:19",
            "scores"=>1,
            "text"=>"Over there you see the microwave oven, the fridge and washing machine.",
            "answer"=>"Over there you see the microwave oven, the fridge and washing machine",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6d.mp3',
                    "timeRange"=>"02:18-02:25",
                    "text"=>"Over there you see the microwave oven, the fridge and washing machine.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6d.mp3',
                    "timeRange"=>"02:18-02:25",
                    "text"=>"Over there you see the microwave oven, the fridge and washing machine.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"17",
            "content_id"=>991,
            'type'=>"sr_reading",
            "timeRange"=>"02:37-02:45",
            "scores"=>1,
            "text"=>"You have enough storage space for kitchen ware, tableware and seasonings.",
            "answer"=>"You have enough storage space for kitchen ware, tableware and seasonings",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6d.mp3',
                    "timeRange"=>"02:37-02:45",
                    "text"=>"You have enough storage space for kitchen ware, tableware and seasonings.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6d.mp3',
                    "timeRange"=>"02:37-02:45",
                    "text"=>"You have enough storage space for kitchen ware, tableware and seasonings.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"18",
            "content_id"=>992,
            'type'=>"sr_reading",
            "timeRange"=>"03:04-03:09",
            "scores"=>1,
            "text"=>"Is it convenient to go shopping here?",
            "answer"=>"Is it convenient to go shopping here",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6d.mp3',
                    "timeRange"=>"03:04-03:09",
                    "text"=>"Is it convenient to go shopping here?",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6d.mp3',
                    "timeRange"=>"03:04-03:09",
                    "text"=>"Is it convenient to go shopping here?",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"19",
            "content_id"=>993,
            'type'=>"sr_reading",
            "timeRange"=>"03:18-03:25",
            "scores"=>1,
            "text"=>"There are bars, restaurants, bookstores, and a small supermarket there. ",
            "answer"=>"There are bars restaurants bookstores and a small supermarket there",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6d.mp3',
                    "timeRange"=>"03:18-03:25",
                    "text"=>"There are bars, restaurants, bookstores, and a small supermarket there. ",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6d.mp3',
                    "timeRange"=>"03:18-03:25",
                    "text"=>"There are bars, restaurants, bookstores, and a small supermarket there. ",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"20",
            "content_id"=>994,
            'type'=>"sr_reading",
            "timeRange"=>"04:01-04:08",
            "scores"=>1,
            "text"=>"The landlord hires a lady to clean the apartment and the yard once a week.",
            "answer"=>"The landlord hires a lady to clean the apartment and the yard once a week",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6d.mp3',
                    "timeRange"=>"04:01-04:08",
                    "text"=>"The landlord hires a lady to clean the apartment and the yard once a week.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6d.mp3',
                    "timeRange"=>"04:01-04:08",
                    "text"=>"The landlord hires a lady to clean the apartment and the yard once a week.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
         $this->saveEventListToDatabases($data);$a =  json_encode($data);
        $fp = fopen('json136.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
        return;
    }


    public function getPart137(){
        $data = array(
            "unit_id"       =>6,
            "lesson_id"     =>35,
            "part_id"       =>137,
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
            "content_id"=>995,
            "media_filename"=>'media/u6p.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_conjunction_clause",
            "timeRange"     =>"00:57-01:03",
            "scores"=>1,
            "text"=>"Linda got a job there as a travel consultant last summer.",
            "answer" =>"Linda got a job there as a travel consultant last summer",
            "items"=>array("got a job there","Linda","last summer.","as a travel consultant"),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6p.mp3',
                    "timeRange"     =>"00:57-01:03",
                    "text"=>"Linda got a job there as a travel consultant last summer.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6p.mp3',
                    "timeRange"     =>"00:57-01:03",
                    "text"=>"Linda got a job there as a travel consultant last summer.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"2",
            "content_id"=>996,
            "media_filename"=>'media/u6p.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_conjunction_clause",
            "timeRange"     =>"01:24-01:30",
            "scores"=>1,
            "answer"=>"Its entrance is just to the south of the gas station",
            "text" => "Its entrance is just to the south of the gas station.",
            "items"=>array("to the south of","is just","Its entrance","the gas station."),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6p.mp3',
                    "timeRange"     =>"01:24-01:30",
                    "text" => "Its entrance is just to the south of the gas station",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6p.mp3',
                    "timeRange"     =>"01:24-01:30",
                    "text" => "Its entrance is just to the south of the gas station",
                    ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"3",
            "content_id"=>997,
            "media_filename"=>'media/u6p.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_conjunction_clause",
            "timeRange"     =>"01:30-01:35",
            "scores"=>1,
            "answer"=>"It's convenient to get around by subway",
            "text" => "It's convenient to get around by subway.",
            "items"=>array("to get around"," by subway.","It's convenient"),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6p.mp3',
                    "timeRange"     =>"01:30-01:35",
                    "text" => "It's convenient to get around by subway.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6p.mp3',
                    "timeRange"     =>"01:30-01:35",
                    "text" => "It's convenient to get around by subway.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"4",
            "content_id"=>998,
            "media_filename"=>'media/u6p.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_conjunction_clause",
            "timeRange"     =>"02:28-02:35",
            "scores"=>1,
            "answer"=>"Students can get really good deals on used and nearly new books",
            "text" => "Students can get really good deals on used and nearly new books.",
            "items"=>array("really good deals on","Students can get","used and","nearly new books."),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6p.mp3',
                    "timeRange"     =>"02:28-02:35",
                    "text" => "Students can get really good deals on used and nearly new books.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6p.mp3',
                    "timeRange"     =>"02:28-02:35",
                    "text" => "Students can get really good deals on used and nearly new books.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"5",
            "content_id"=>999,
            "media_filename"=>'media/u6p.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_conjunction_clause",
            "timeRange"     =>"03:28-03:34",
            "scores"=>1,
            "answer"=>"Every now and again, Linda likes to go there to buy clothes",
            "text" => "Every now and again, Linda likes to go there to buy clothes.",
            "items"=>array("Every now and again","likes to go there","to buy clothes.","Linda"),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6p.mp3',
                    "timeRange"     =>"03:28-03:34",
                    "text" => "Every now and again, Linda likes to go there to buy clothes",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6p.mp3',
                    "timeRange"     =>"03:28-03:34",
                    "text" => "Every now and again, Linda likes to go there to buy clothes",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"6",
            "content_id"=>1000,
            "media_filename"=>'media/u6d.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_conjunction_clause",
            "timeRange"     =>"01:45-01:51",
            "scores"=>1,
            "answer"=>"Oh, the closet is big enough to fit all my stuff in",
            "text" => "Oh, the closet is big enough to fit all my stuff in.",
            "items"=>array("is big enough","to fit all my stuff in.","the closet","Oh"),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6d.mp3',
                    "timeRange"     =>"01:45-01:51",
                    "text" => "Oh, the closet is big enough to fit all my stuff in.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6d.mp3',
                    "timeRange"     =>"01:45-01:51",
                    "text" => "Oh, the closet is big enough to fit all my stuff in.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"7",
            "content_id"=>1001,
            "media_filename"=>'media/u6d.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_conjunction_clause",
            "timeRange"     =>"02:30-02:37",
            "scores"=>1,
            "answer"=>"I don't do much cooking so I only have a few pots and pans",
            "text"=>"I don't do much cooking so I only have a few pots and pans.",
            "items"=>array("a few pots and pans.","do much cooking","so","I only have","I don't"),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6d.mp3',
                    "timeRange"     =>"02:30-02:37",
                    "text"=>"I don't do much cooking so I only have a few pots and pans.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6d.mp3',
                    "timeRange"     =>"02:30-02:37",
                    "text"=>"I don't do much cooking so I only have a few pots and pans.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );


        $data['events'][] = array(
            "num"=>"8",
            "content_id"=>1002,
            "media_filename"=>'media/u6d.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_conjunction_clause",
            "timeRange"     =>"02:58-03:04",
            "scores"=>1,
            "answer"=>"It is for both cooling in summer and heating in winter",
            "text" => "It is for both cooling in summer and heating in winter.",
            "items"=>array("both cooling in summer","It is for","heating in winter.","and"),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6d.mp3',
                    "timeRange"     =>"02:58-03:04",
                    "text" => "It is for both cooling in summer and heating in winter.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6d.mp3',
                    "timeRange"     =>"02:58-03:04",
                    "text" => "It is for both cooling in summer and heating in winter.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"9",
            "content_id"=>1003,
            "media_filename"=>'media/u6d.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_conjunction_clause",
            "timeRange"     =>"03:12-03:18",
            "scores"=>1,
            "answer"=>"There is a small shopping area just five blocks away from here",
            "text" => "There is a small shopping area just five blocks away from here.",
            "items"=>array("away from here.","just five blocks","There is","a small shopping area"),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6d.mp3',
                    "timeRange"     =>"03:12-03:18",
                    "text" => "There is a small shopping area just five blocks away from here.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6d.mp3',
                    "timeRange"     =>"03:12-03:18",
                    "text" => "There is a small shopping area just five blocks away from here.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"10",
            "content_id"=>1004,
            "media_filename"=>'media/u6d.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_conjunction_clause",
            "timeRange"     =>"03:25-03:30",
            "scores"=>1,
            "answer"=>"It takes only 15 minutes to get there on foot",
            "text" => "It takes only 15 minutes to get there on foot.",
            "items"=>array("It takes"," to get there","only 15 minutes","on foot."),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6d.mp3',
                    "timeRange"     =>"03:25-03:30",
                    "text" => "It takes only 15 minutes to get there on foot.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6d.mp3',
                    "timeRange"     =>"03:25-03:30",
                    "text" => "It takes only 15 minutes to get there on foot.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

         $this->saveEventListToDatabases($data);$a =  json_encode($data);
        $fp = fopen('json137.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
        return;
    }

    public function getPart138(){
        $data = array(
            "unit_id"       =>6,
            "lesson_id"     =>35,
            "part_id"       =>138,
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
            "content_id"=>1005,
            "media_filename"=>'media/u6p.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"00:51-00:57",
            "scores"=>1,
            "text" => "Next to the café there's also a travel agency.",
            "answer" => "Next to the café there's also a travel agency",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6p.mp3',
                    "timeRange"     =>"00:51-00:57",
                    "text" => "Next to the café there's also a travel agency.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6p.mp3',
                    "timeRange"     =>"00:51-00:57",
                    "text" => "Next to the café there's also a travel agency.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"2",
            "content_id"=>1006,
            "media_filename"=>'media/u6p.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"02:35-02:41",
            "scores"=>1,
            "text" => "To the east of the bank there is a two story supermarket.",
            "answer" => "To the east of the bank there is a two story supermarket",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6p.mp3',
                    "timeRange"     =>"02:35-02:41",
                    "text" => "To the east of the bank there is a two story supermarket.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6p.mp3',
                    "timeRange"     =>"02:35-02:41",
                    "text" => "To the east of the bank there is a two story supermarket.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"3",
            "content_id"=>1007,
            "media_filename"=>'media/u6p.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"02:58-03:04",
            "scores"=>1,
            "text" => "Students often come here to buy the things they need.",
            "answer" => "Students often come here to buy the things they need",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6p.mp3',
                    "timeRange"     =>"02:58-03:04",
                    "text" => "Students often come here to buy the things they need.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6p.mp3',
                    "timeRange"     =>"02:58-03:04",
                    "text" => "Students often come here to buy the things they need.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"4",
            "content_id"=>1008,
            "media_filename"=>'media/u6d.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"00:39-00:42",
            "scores"=>1,
            "text" => "Let me show you the room.",
            "answer" => "Let me show you the room",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6d.mp3',
                    "timeRange"     =>"00:39-00:42",
                    "text" => "Let me show you the room.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6d.mp3',
                    "timeRange"     =>"00:39-00:42",
                    "text" => "Let me show you the room.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"5",
            "content_id"=>1009,
            "media_filename"=>'media/u6d.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"00:42-00:46",
            "scores"=>1,
            "text" => "This is a two-bedroom apartment.",
            "answer" => "This is a two-bedroom apartment",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6d.mp3',
                    "timeRange"     =>"00:42-00:46",
                    "text" => "This is a two-bedroom apartment.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6d.mp3',
                    "timeRange"     =>"00:42-00:46",
                    "text" => "This is a two-bedroom apartment.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"6",
            "content_id"=>1010,
            "media_filename"=>'media/u6d.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"00:54-00:59",
            "scores"=>1,
            "text" => "It is about 25 square meters. ",
            "answer" => "It is about 25 square meters",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6d.mp3',
                    "timeRange"     =>"00:54-00:59",
                    "text" => "It is about 25 square meters. ",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6d.mp3',
                    "timeRange"     =>"00:54-00:59",
                    "text" => "It is about 25 square meters. ",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"7",
            "content_id"=>1011,
            "media_filename"=>'media/u6d.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"01:10-01:15",
            "scores"=>1,
            "text" => "It is really spacious.",
            "answer" => "It is really spacious",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6d.mp3',
                    "timeRange"     =>"01:10-01:15",
                    "text" => "It is really spacious.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6d.mp3',
                    "timeRange"     =>"01:10-01:15",
                    "text" => "It is really spacious.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"8",
            "content_id"=>1012,
            "media_filename"=>'media/u6d.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"01:27-01:32",
            "scores"=>1,
            "text" => "Another one is here, right next to your bedroom.",
            "answer" => "Another one is here right next to your bedroom",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6d.mp3',
                    "timeRange"     =>"01:27-01:32",
                    "text" => "Another one is here, right next to your bedroom.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6d.mp3',
                    "timeRange"     =>"01:27-01:32",
                    "text" => "Another one is here, right next to your bedroom.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"9",
            "content_id"=>1013,
            "media_filename"=>'media/u6d.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"01:36-01:41",
            "scores"=>1,
            "text" => "How big is the bedroom to rent?",
            "answer" => "How big is the bedroom to rent",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6d.mp3',
                    "timeRange"     =>"01:36-01:41",
                    "text" => "How big is the bedroom to rent?",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6d.mp3',
                    "timeRange"     =>"01:36-01:41",
                    "text" => "How big is the bedroom to rent?",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"10",
            "content_id"=>1014,
            "media_filename"=>'media/u6d.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"02:03-02:06",
            "scores"=>1,
            "text" => "Where is the kitchen?",
            "answer" => "Where is the kitchen",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6d.mp3',
                    "timeRange"     =>"02:03-02:06",
                    "text" => "Where is the kitchen?",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6d.mp3',
                    "timeRange"     =>"02:03-02:06",
                    "text" => "Where is the kitchen?",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"11",
            "content_id"=>1015,
            "media_filename"=>'media/u6d.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"02:14-02:18",
            "scores"=>1,
            "text" => "The oven is below it. ",
            "answer" => "The oven is below it",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6d.mp3',
                    "timeRange"     =>"02:14-02:18",
                    "text" => "The oven is below it.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6d.mp3',
                    "timeRange"     =>"02:14-02:18",
                    "text" => "The oven is below it.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"12",
            "content_id"=>1016,
            "media_filename"=>'media/u6d.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"02:45-02:49",
            "scores"=>1,
            "text" => "What about the air-conditioning?",
            "answer" => "What about the air-conditioning",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6d.mp3',
                    "timeRange"     =>"02:45-02:49",
                    "text" => "What about the air-conditioning?",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6d.mp3',
                    "timeRange"     =>"02:45-02:49",
                    "text" => "What about the air-conditioning?",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"13",
            "content_id"=>1017,
            "media_filename"=>'media/u6d.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"03:30-03:36",
            "scores"=>1,
            "text" => "By the way, where can I put my bicycle?",
            "answer" => "By the way, where can I put my bicycle",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6d.mp3',
                    "timeRange"     =>"03:30-03:36",
                    "text" => "By the way, where can I put my bicycle?",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6d.mp3',
                    "timeRange"     =>"03:30-03:36",
                    "text" => "By the way, where can I put my bicycle?",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"14",
            "content_id"=>1018,
            "media_filename"=>'media/u6d.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"03:41-03:46",
            "scores"=>1,
            "text" => "If you drive, you can also park your car there.",
            "answer" => "If you drive, you can also park your car there",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6d.mp3',
                    "timeRange"     =>"03:41-03:46",
                    "text" => "If you drive, you can also park your car there.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6d.mp3',
                    "timeRange"     =>"03:41-03:46",
                    "text" => "If you drive, you can also park your car there.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"15",
            "content_id"=>1019,
            "media_filename"=>'media/u6d.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"04:13-04:16",
            "scores"=>1,
            "text" => "Anytime you like!",
            "answer" => "Anytime you like",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6d.mp3',
                    "timeRange"     =>"04:13-04:16",
                    "text" => "Anytime you like!",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6d.mp3',
                    "timeRange"     =>"04:13-04:16",
                    "text" => "Anytime you like!",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
         $this->saveEventListToDatabases($data);$a =  json_encode($data);
        $fp = fopen('json138.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
        return;
    }

    public function getPart139(){
        $data = array(
            "unit_id"       =>6,
            "lesson_id"     =>36,
            "part_id"       =>139,
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
            "content_id"=>1020,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"00:00-00:04",
            "scores"=>10,
            "text" => "He was _ enough not to tell her that he had quit the job.",
            "answer" => "He was careful enough not to tell her that he had quit the job.",
            "items" => array(
                "0"=>array("item"=>"care","isCorrect"=>false),
                "1"=>array("item"=>"careful", "isCorrect"=>true),
                "2"=>array("item"=>"careless", "isCorrect"=>false),
                "3"=>array("item"=>"carelessness", "isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6gfi.mp3',
                    "timeRange"     =>"00:00-00:04",
                    "text" => "He was careful enough not to tell her that he had quit the job.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6gfi.mp3',
                    "timeRange"     =>"00:00-00:04",
                    "text" => "He was careful enough not to tell her that he had quit the job.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"2",
            "content_id"=>1021,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"00:04-00:08",
            "scores"=>10,
            "text" => "She looked _ at her husband who was badly wounded.",
            "answer"=>"She looked sadly at her husband who was badly wounded.",
            "items" => array(
                "0"=>array("item"=>"sadly","isCorrect"=>true),
                "1"=>array("item"=>"sadness", "isCorrect"=>false),
                "2"=>array("item"=>"sadenly", "isCorrect"=>false),
                "3"=>array("item"=>"sad","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6gfi.mp3',
                    "timeRange"     =>"00:04-00:08",
                    "text"=>"She looked sadly at her husband who was badly wounded.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6gfi.mp3',
                    "timeRange"     =>"00:04-00:08",
                    "text"=>"She looked sadly at her husband who was badly wounded.",
                    ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"3",
            "content_id"=>1022,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"00:08-00:13",
            "scores"=>10,
            "text" => "The _ chair isn't stable. The child may fall off.",
            "answer"=>"The three-legged chair isn't stable. The child may fall off.",
            "items" => array(
                "0"=>array("item"=>"three-legging","isCorrect"=>false),
                "1"=>array("item"=>"three-legs", "isCorrect"=>false),
                "2"=>array("item"=>"three-legged", "isCorrect"=>true),
                "3"=>array("item"=>"three-leged ","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6gfi.mp3',
                    "timeRange"     =>"00:08-00:13",
                    "text"=>"The three-legged chair isn't stable. The child may fall off.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6gfi.mp3',
                    "timeRange"     =>"00:08-00:13",
                    "text"=>"The three-legged chair isn't stable. The child may fall off.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );
        $data['events'][] = array(
            "num"=>"4",
            "content_id"=>1023,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"00:13-00:17",
            "scores"=>10,
            "text" => "Can you write _ passage in French?",
            "answer"=>"Can you write a 600-word passage in French?",
            "items" => array(
                "0"=>array("item"=>"a 600-words","isCorrect"=>false),
                "1"=>array("item"=>"a 600-words", "isCorrect"=>false),
                "2"=>array("item"=>"a 600-words", "isCorrect"=>false),
                "3"=>array("item"=>"a 600-word","isCorrect"=>true),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6gfi.mp3',
                    "timeRange"     =>"00:13-00:17",
                    "text"=>"Can you write a 600-word passage in French?",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6gfi.mp3',
                    "timeRange"     =>"00:13-00:17",
                    "text"=>"Can you write a 600-word passage in French?",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"5",
            "content_id"=>1024,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"00:17-00:21",
            "scores"=>10,
            "text" => "Without _ , no one is allowed to enter the spot.",
            "answer"=>"Without permission , no one is allowed to enter the spot.",
            "items" => array(
                "0"=>array("item"=>"permission", "isCorrect"=>true),
                "1"=>array("item"=>"permit","isCorrect"=>false),
                "2"=>array("item"=>"permitting", "isCorrect"=>false),
                "3"=>array("item"=>"permittence","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6gfi.mp3',
                    "timeRange"     =>"00:17-00:21",
                    "text"=>"Without permission no one is allowed to enter the spot.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6gfi.mp3',
                    "timeRange"     =>"00:17-00:21",
                    "text"=>"Without permission no one is allowed to enter the spot.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"6",
            "content_id"=>1025,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"00:21-00:26",
            "scores"=>10,
            "text" => "He set fire to the police _ and also attacked a court house. ",
            "answer"=>"He set fire to the police headquarters and also attacked a court house.",
            "items" => array(
                "0"=>array("item"=>"headline", "isCorrect"=>false),
                "1"=>array("item"=>"headquarters","isCorrect"=>true),
                "2"=>array("item"=>"headmaster", "isCorrect"=>false),
                "3"=>array("item"=>"headache","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6gfi.mp3',
                    "timeRange"     =>"00:21-00:26",
                    "text"=>"He set fire to the police headquarters and also attacked a court house.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6gfi.mp3',
                    "timeRange"     =>"00:21-00:26",
                    "text"=>"He set fire to the police headquarters and also attacked a court house.",
                 ),
            ),
            "picture"=>"images/type_click_001.png"
        );
        $data['events'][] = array(
            "num"=>"7",
            "content_id"=>1026,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"00:26-00:30",
            "scores"=>10,
            "text" => "Peter welcomed all the guests with a _ smile.",
            "answer"=>"Peter welcomed all the guests with a welcoming smile.",
            "items" => array(
                "0"=>array("item"=>"welcome", "isCorrect"=>false),
                "1"=>array("item"=>"welcame","isCorrect"=>false),
                "2"=>array("item"=>"welcoming", "isCorrect"=>true),
                "3"=>array("item"=>"welcomed","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6gfi.mp3',
                    "timeRange"     =>"00:26-00:30",
                    "text"=>"Peter welcomed all the guests with a welcoming smile.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6gfi.mp3',
                    "timeRange"     =>"00:26-00:30",
                    "text"=>"Peter welcomed all the guests with a welcoming smile.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"8",
            "content_id"=>1027,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"00:30-00:35",
            "scores"=>10,
            "text" => "Can you tell me what is the _ news about the US presidential election?",
            "answer"=>"Can you tell me what is the latest news about the US presidential election?",
            "items" => array(
                "0"=>array("item"=>"lately", "isCorrect"=>false),
                "1"=>array("item"=>"later","isCorrect"=>false),
                "2"=>array("item"=>"latter", "isCorrect"=>false),
                "3"=>array("item"=>"latest","isCorrect"=>true),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6gfi.mp3',
                    "timeRange"     =>"00:30-00:35",
                    "text"=>"Can you tell me what is the latest news about the US presidential election?",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6gfi.mp3',
                    "timeRange"     =>"00:30-00:35",
                    "text"=>"Can you tell me what is the latest news about the US presidential election?",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"9",
            "content_id"=>1028,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"00:35-00:39",
            "scores"=>10,
            "text" => "To my mother's _ , I passed the exam easily.",
            "answer"=>"To my mother's joy , I passed the exam easily.",
            "items" => array(
                "0"=>array("item"=>"joy", "isCorrect"=>true),
                "1"=>array("item"=>"joyful","isCorrect"=>false),
                "2"=>array("item"=>"joyless", "isCorrect"=>false),
                "3"=>array("item"=>"joyness","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6gfi.mp3',
                    "timeRange"     =>"00:35-00:39",
                    "text"=>"To my mother's joy, I passed the exam easily.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6gfi.mp3',
                    "timeRange"     =>"00:35-00:39",
                    "text"=>"To my mother's joy, I passed the exam easily.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );
        $data['events'][] = array(
            "num"=>"10",
            "content_id"=>1029,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"00:39-00:44",
            "scores"=>10,
            "text" => "The watch that he lost is very expensive.It's of great _ .",
            "answer"=>"The watch that he lost is very expensive.It's of great value.",
            "items" => array(
                "0"=>array("item"=>"valuable", "isCorrect"=>false),
                "1"=>array("item"=>"value","isCorrect"=>true),
                "2"=>array("item"=>"valueless", "isCorrect"=>false),
                "3"=>array("item"=>"unvaluable","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6gfi.mp3',
                    "timeRange"     =>"00:39-00:44",
                    "text" => "The watch that he lost is very expensive.It's of great value.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6gfi.mp3',
                    "timeRange"     =>"00:39-00:44",
                    "text" => "The watch that he lost is very expensive.It's of great value.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );
        $data['events'][] = array(
            "num"=>"11",
            "content_id"=>1030,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"00:44-00:48",
            "scores"=>10,
            "text" => "The letter 'b' in the word 'comb' is _ .",
            "answer"=>"The letter 'b' in the word 'comb' is silent.",
            "items" => array(
                "0"=>array("item"=>"sound", "isCorrect"=>false),
                "1"=>array("item"=>"silence","isCorrect"=>false),
                "2"=>array("item"=>"silent", "isCorrect"=>true),
                "3"=>array("item"=>"sounded","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6gfi.mp3',
                    "timeRange"     =>"00:44-00:48",
                    "text"=>"WThe letter 'b' in the word 'comb' is silent.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6gfi.mp3',
                    "timeRange"     =>"00:44-00:48",
                    "text"=>"WThe letter 'b' in the word 'comb' is silent.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"12",
            "content_id"=>1031,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"00:48-00:54",
            "scores"=>10,
            "text" => "The woman possesses a _ factory,which causes most of the water pollution to this river.",
            "answer"=>"The woman possesses a paper-making factory,which causes most of the water pollution to this river.",
            "items" => array(
                "0"=>array("item"=>"paper-make", "isCorrect"=>false),
                "1"=>array("item"=>"papers-made","isCorrect"=>false),
                "2"=>array("item"=>"paper-made", "isCorrect"=>false),
                "3"=>array("item"=>"paper-making","isCorrect"=>true),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6gfi.mp3',
                    "timeRange"     =>"00:48-00:54",
                    "text" => "The woman possesses a paper-making factory,which causes most of the water pollution to this river.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6gfi.mp3',
                    "timeRange"     =>"00:48-00:54",
                    "text" => "The woman possesses a paper-making factory,which causes most of the water pollution to this river.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"13",
            "content_id"=>1032,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"00:54-00:58",
            "scores"=>10,
            "text" => "He is easily _ by difficulties and obstacles. ",
            "answer"=>"He is easily discouraged by difficulties and obstacles.",
            "items" => array(
                "0"=>array("item"=>"encouraged", "isCorrect"=>false),
                "1"=>array("item"=>"couraged", "isCorrect"=>false),
                "2"=>array("item"=>"encouragement","isCorrect"=>false),
                "3"=>array("item"=>"discouraged","isCorrect"=>true),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6gfi.mp3',
                    "timeRange"     =>"00:54-00:58",
                    "text" => "He is easily discouraged by difficulties and obstacles.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6gfi.mp3',
                    "timeRange"     =>"00:54-00:58",
                    "text" => "He is easily discouraged by difficulties and obstacles.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"14",
            "content_id"=>1033,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"00:58-01:04",
            "scores"=>10,
            "text" => "The doctor said that the patient's condition was _ even though he had tried his best.",
            "answer"=>"The doctor said that the patient's condition was hopeless even though he had tried his best",
            "items" => array(
                "0"=>array("item"=>"hopeless", "isCorrect"=>true),
                "1"=>array("item"=>"hopeful", "isCorrect"=>false),
                "2"=>array("item"=>"hoped","isCorrect"=>false),
                "3"=>array("item"=>"helped","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6gfi.mp3',
                    "timeRange"     =>"00:58-01:04",
                    "text"=>"The doctor said that the patient's condition was hopeless even though he had tried his best.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6gfi.mp3',
                    "timeRange"     =>"00:58-01:04",
                    "text"=>"The doctor said that the patient's condition was hopeless even though he had tried his best.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"15",
            "content_id"=>1034,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"01:04-01:09",
            "scores"=>10,
            "text" => "She felt so _ that she could hardly open her eyes.",
            "answer"=>"She felt so sleepy that she could hardly open her eyes",
            "items" => array(
                "0"=>array("item"=>"asleep", "isCorrect"=>false),
                "1"=>array("item"=>"sleepy","isCorrect"=>true),
                "2"=>array("item"=>"sleep", "isCorrect"=>false),
                "3"=>array("item"=>"sleeping","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6gfi.mp3',
                    "timeRange"     =>"01:04-01:09",
                    "text"=>"She felt so sleepy that she could hardly open her eyes.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6gfi.mp3',
                    "timeRange"     =>"01:04-01:09",
                    "text"=>"She felt so sleepy that she could hardly open her eyes.",
                    ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"16",
            "content_id"=>1035,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"01:09-01:13",
            "scores"=>10,
            "text" =>"He _ let that animal escape from the cage. ",
            "answer"=>"He intentionally let that animal escape from the cage",
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
                    "text"=>"He intentionally let that animal escape from the cage. ",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6gfi.mp3',
                    "timeRange"     =>"01:09-01:13",
                    "text"=>"He intentionally let that animal escape from the cage. ",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );
        $data['events'][] = array(
            "num"=>"17",
            "content_id"=>1036,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"01:13-01:18",
            "scores"=>10,
            "text" => "He is so addicted to smoking that it is _ to talk him into quitting.",
            "answer"=>"He is so addicted to smoking that it is impossible to talk him into quitting",
            "items" => array(
                "0"=>array("item"=>"possible ", "isCorrect"=>false),
                "1"=>array("item"=>"possibly","isCorrect"=>false),
                "2"=>array("item"=>"impossibility", "isCorrect"=>false),
                "3"=>array("item"=>"impossible","isCorrect"=>true),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6gfi.mp3',
                    "timeRange"     =>"01:13-01:18",
                    "text"=>"He is so addicted to smoking that it is impossible to talk him into quitting.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6gfi.mp3',
                    "timeRange"     =>"01:13-01:18",
                    "text"=>"He is so addicted to smoking that it is impossible to talk him into quitting.",

                ),
            ),
            "picture"=>"images/type_click_001.png"
        );
        $data['events'][] = array(
            "num"=>"18",
            "content_id"=>1037,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"01:18-01:23",
            "scores"=>10,
            "text" => "How do French-speaking and _ Canadians interact with each other?",
            "answer"=>"How do French-speaking and English-speaking Canadians interact with each other?",
            "items" => array(
                "0"=>array("item"=>"English-speaking", "isCorrect"=>true),
                "1"=>array("item"=>"speak-English,","isCorrect"=>false),
                "2"=>array("item"=>"spoken-English", "isCorrect"=>false),
                "3"=>array("item"=>"English-spoken","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6gfi.mp3',
                    "timeRange"     =>"01:18-01:23",
                    "text"=>"How do French-speaking and English-speaking  Canadians interact with each other?",
                ),
                "No"=>array(
                    "media_type"        =>"audio",
                    "media_filename"    =>'media/u6gfi.mp3',
                    "timeRange"         =>"01:18-01:23",
                    "text"              =>"How do French-speaking and English-speaking  Canadians interact with each other?",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"19",
            "content_id"=>1038,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"01:23-01:29",
            "scores"=>10,
            "text" => "Personally, I think he did a good job. After all, he's only a _ . ",
            "answer"=>"Personally I think he did a good job After all, he's only a green hand",
            "items" => array(
                "0"=>array("item"=>"red hand", "isCorrect"=>false),
                "1"=>array("item"=>"green hand", "isCorrect"=>true),
                "2"=>array("item"=>"old hand","isCorrect"=>false),
                "3"=>array("item"=>"wed hand","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6gfi.mp3',
                    "timeRange"     =>"01:23-01:29",
                    "text"=>"Personally, I think he did a good job. After all, he's only a green hand. ",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6gfi.mp3',
                    "timeRange"     =>"01:23-01:29",
                    "text"=>"Personally, I think he did a good job. After all, he's only a green hand. ",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"20",
            "content_id"=>1039,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"01:29-01:34",
            "scores"=>10,
            "text" => "Many of the problems were caused by a _ in telecommunications.",
            "answer"=>"Many of the problems were caused by a breakdown in telecommunications",
            "items" => array(
                "0"=>array("item"=>"brokendown", "isCorrect"=>false),
                "1"=>array("item"=>"downbreak", "isCorrect"=>false),
                "2"=>array("item"=>"breakdown","isCorrect"=>true),
                "3"=>array("item"=>"downbroken","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6gfi.mp3',
                    "timeRange"     =>"01:29-01:34",
                    "text"=>"Many of the problems were caused by a breakdown in telecommunications.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6gfi.mp3',
                    "timeRange"     =>"01:29-01:34",
                    "text"=>"Many of the problems were caused by a breakdown in telecommunications.",
                    ),
            ),
            "picture"=>"images/type_click_001.png"
        );
         $this->saveEventListToDatabases($data);$a =  json_encode($data);
        $fp = fopen('json139.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
        return;
    }


    public function getPart140(){
        $data = array(
            "unit_id"       =>6,
            "lesson_id"     =>36,
            "part_id"       =>140,
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
            "content_id"=>1040,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"00:00-00:05",
            "scores"=>1,
            "text" => "Taking care of a baby sounds like a nerve-racking and highly stressful task.",
            "items" => array(
                "0"=>array("item"=>"Taking care of"),
                "1"=>array("item"=>"a baby"),
                "2"=>array("item"=>"sounds like"),
                "3"=>array("item"=>"a nerve-racking"),
                "4"=>array("item"=>"and highly stressful task."),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6gso.mp3',
                    "timeRange"     =>"00:00-00:05",
                    "text" => "Taking care of a baby sounds like a nerve-racking and highly stressful task.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6gso.mp3',
                    "timeRange"     =>"00:00-00:05",
                    "text" => "Taking care of a baby sounds like a nerve-racking and highly stressful task.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );
        $data['events'][] = array(
            "num"=>"2",
            "content_id"=>1041,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"00:05-00:09",
            "scores"=>1,
            "text" => "We must pay special attention to the mysterious visitor.",
            "items" => array(
                "0"=>array("item"=>"We"),
                "1"=>array("item"=>"must"),
                "2"=>array("item"=>"pay special attention to"),
                "3"=>array("item"=>"the mysterious visitor.")
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6gso.mp3',
                    "timeRange"     =>"00:05-00:09",
                    "text" => "We must pay special attention to the mysterious visitor.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6gso.mp3',
                    "timeRange"     =>"00:05-00:09",
                    "text" => "We must pay special attention to the mysterious visitor.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );
        $data['events'][] = array(
            "num"=>"3",
            "content_id"=>1042,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"00:09-00:14",
            "scores"=>1,
            "text" => "You'll have Andy, a professional photographer with you to take photographs.",
            "items" => array(
                "0"=>array("item"=>"You'll have"),
                "1"=>array("item"=>"Andy,"),
                "2"=>array("item"=>"a professional photographer"),
                "3"=>array("item"=>"with you"),
                "4"=>array("item"=>"to take photographs.")
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6gso.mp3',
                    "timeRange"     =>"00:09-00:14",
                    "text" => "You'll have Andy, a professional photographer with you to take photographs.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6gso.mp3',
                    "timeRange"     =>"00:09-00:14",
                    "text" => "You'll have Andy, a professional photographer with you to take photographs.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );
        $data['events'][] = array(
            "num"=>"4",
            "content_id"=>1043,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"00:14-00:18",
            "scores"=>1,
            "text" => "Even though the price of this dress is reasonable, I can't afford it.",
            "items" => array(
                "0"=>array("item"=>"Even though"),
                "1"=>array("item"=>"the price of this dress"),
                "2"=>array("item"=>"is reasonable,"),
                "3"=>array("item"=>"I can't afford it.")
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6gso.mp3',
                    "timeRange"     =>"00:14-00:18",
                    "text" => "Even though the price of this dress is reasonable, I can't afford it.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6gso.mp3',
                    "timeRange"     =>"00:14-00:18",
                    "text" => "Even though the price of this dress is reasonable, I can't afford it.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );
        $data['events'][] = array(
            "num"=>"5",
            "content_id"=>1044,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"00:18-00:23",
            "scores"=>1,
            "text" => "The children live in a village nearby and they come here almost every day.",
            "items" => array(
                "0"=>array("item"=>"The children live in"),
                "1"=>array("item"=>"a village nearby"),
                "2"=>array("item"=>"and"),
                "3"=>array("item"=>"they come here"),
                "4"=>array("item"=>"almost every day."),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6gso.mp3',
                    "timeRange"     =>"00:18-00:23",
                    "text" => "The children live in a village nearby and they come here almost every day.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6gso.mp3',
                    "timeRange"     =>"00:18-00:23",
                    "text" => "The children live in a village nearby and they come here almost every day.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );
        $data['events'][] = array(
            "num"=>"6",
            "content_id"=>1045,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"00:23-00:29",
            "scores"=>1,
            "text" => "The teacher took a deep drink,smiled warmly and thanked him very much for his gift.",
            "items" => array(
                "0"=>array("item"=>"The teacher took a deep drink,"),
                "1"=>array("item"=>"smiled"),
                "2"=>array("item"=>"warmly,"),
                "3"=>array("item"=>"and thanked him very much"),
                "4"=>array("item"=>"for his gift."),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6gso.mp3',
                    "timeRange"     =>"00:23-00:29",
                    "text" => "The teacher took a deep drink, smiled warmly, and thanked him very much for his gift.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6gso.mp3',
                    "timeRange"     =>"00:23-00:29",
                    "text" => "The teacher took a deep drink, smiled warmly, and thanked him very much for his gift.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"7",
            "content_id"=>1046,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"00:29-00:35",
            "scores"=>1,
            "text" => "New York State residents age 16 or over can apply for a New York driver's license.",
            "items" => array(
                "0"=>array("item"=>"New York State residents"),
                "1"=>array("item"=>"age 16 or over"),
                "2"=>array("item"=>"can apply for"),
                "3"=>array("item"=>"a New York driver's license."),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6gso.mp3',
                    "timeRange"     =>"00:29-00:35",
                    "text" => "New York State residents age 16 or over can apply for a New York driver's license.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6gso.mp3',
                    "timeRange"     =>"00:29-00:35",
                    "text" => "New York State residents age 16 or over can apply for a New York driver's license.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"8",
            "content_id"=>1047,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"00:35-00:40",
            "scores"=>1,
            "text" => "This is the kind of question that one cannot answer off the cuff.",
            "items" => array(
                "0"=>array("item"=>"This is"),
                "1"=>array("item"=>"the kind of question"),
                "2"=>array("item"=>"that one cannot answer"),
                "3"=>array("item"=>"off the cuff.")
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6gso.mp3',
                    "timeRange"     =>"00:35-00:40",
                    "text" => "This is the kind of question that one cannot answer off the cuff. ",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6gso.mp3',
                    "timeRange"     =>"00:35-00:40",
                    "text" => "This is the kind of question that one cannot answer off the cuff. ",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"9",
            "content_id"=>1048,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"00:40-00:45",
            "scores"=>1,
            "text" => "The following is a list of musical instruments classified by section.",
            "items" => array(
                "0"=>array("item"=>"The following is"),
                "1"=>array("item"=>"a list of"),
                "2"=>array("item"=>"musical instruments"),
                "3"=>array("item"=>"classified by section."),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6gso.mp3',
                    "timeRange"     =>"00:40-00:45",
                    "text" => "The following is a list of musical instruments, classified by section.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6gso.mp3',
                    "timeRange"     =>"00:40-00:45",
                    "text" => "The following is a list of musical instruments, classified by section.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"10",
            "content_id"=>1049,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"00:45-00:52",
            "scores"=>1,
            "text" => "This scientist is one of the leading minds of our age and deserves to be better known to the general public.",
            "items" => array(
                "0"=>array("item"=>"This scientist is"),
                "1"=>array("item"=>"one of the leading minds"),
                "2"=>array("item"=>"of our age"),
                "3"=>array("item"=>"and deserves to be better known"),
                "4"=>array("item"=>"to the general public."),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6gso.mp3',
                    "timeRange"     =>"00:45-00:52",
                    "text" => "This scientist is one of the leading minds of our age and deserves to be better known to the general public. ",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6gso.mp3',
                    "timeRange"     =>"00:45-00:52",
                    "text" => "This scientist is one of the leading minds of our age and deserves to be better known to the general public. ",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"11",
            "content_id"=>1050,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"00:52-01:00",
            "scores"=>1,
            "text" => "This is an introduction to the UK higher education system,including undergraduate and postgraduate courses.",
            "items" => array(
                "0"=>array("item"=>"This is an introduction"),
                "1"=>array("item"=>"to the UK higher education system,"),
                "2"=>array("item"=>"including"),
                "3"=>array("item"=>"undergraduate and postgraduate courses."),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6gso.mp3',
                    "timeRange"     =>"00:52-01:00",
                    "text" => "This is an introduction to the UK higher education system, including undergraduate and postgraduate courses.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6gso.mp3',
                    "timeRange"     =>"00:52-01:00",
                    "text" => "This is an introduction to the UK higher education system, including undergraduate and postgraduate courses.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"12",
            "content_id"=>1051,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"01:00-01:05",
            "scores"=>1,
            "text" => "These ice-cream mooncakes have good quality but low prices.",
            "items" => array(
                "0"=>array("item"=>"These ice-cream mooncakes"),
                "1"=>array("item"=>"have good quality"),
                "2"=>array("item"=>"but"),
                "3"=>array("item"=>"low prices."),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6gso.mp3',
                    "timeRange"     =>"01:00-01:05",
                    "text" => "These ice-cream mooncakes have good quality but low prices.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6gso.mp3',
                    "timeRange"     =>"01:00-01:05",
                    "text" => "These ice-cream mooncakes have good quality but low prices.",
                    ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"13",
            "content_id"=>1052,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"01:05-01:11",
            "scores"=>1,
            "text" => "Families on social security benefits will be seriously affected by the new policy.",
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
            "num"=>"14",
            "content_id"=>1053,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"01:11-01:16",
            "scores"=>1,
            "text" => "He quit playing basketball completely at the age of 24.",
            "items" => array(
                "0"=>array("item"=>"He quit"),
                "1"=>array("item"=>"playing basketball"),
                "2"=>array("item"=>"completely"),
                "3"=>array("item"=>"at the age of 24."),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6gso.mp3',
                    "timeRange"     =>"01:11-01:16",
                    "text" => "He quit playing basketball completely at the age of 24.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6gso.mp3',
                    "timeRange"     =>"01:11-01:16",
                    "text" => "He quit playing basketball completely at the age of 24.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"15",
            "content_id"=>1054,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"01:16-01:20",
            "scores"=>1,
            "text" => "They should consider replacing these old-fashioned machines. ",
            "items" => array(
                "0"=>array("item"=>"They should consider"),
                "1"=>array("item"=>"replacing"),
                "2"=>array("item"=>"these old-fashioned"),
                "3"=>array("item"=>"machines."),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6gso.mp3',
                    "timeRange"     =>"01:16-01:20",
                    "text" => "They should consider replacing these old-fashioned machines.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6gso.mp3',
                    "timeRange"     =>"01:16-01:20",
                    "text" => "They should consider replacing these old-fashioned machines.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

         $this->saveEventListToDatabases($data);$a =  json_encode($data);
        $fp = fopen('json140.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
        return;
    }

    public function getPart141(){
        $data = array(
            "unit_id"       =>6,
            "lesson_id"     =>36,
            "part_id"       =>141,
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
            "content_id"=>1055,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"sr_ordering",
            "timeRange"     =>"00:00-00:04",
            "scores"=>1,
            "text" => "Try to act naturally, even if you are tense.",
            "answer" => "Try to act naturally even if you are tense",
            "items" => array(
                "0"=>array("item"=>"Try to act"),
                "1"=>array("item"=>"naturally"),
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
            "num"=>"2",
            "content_id"=>1056,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"sr_ordering",
            "timeRange"     =>"00:04-00:08",
            "scores"=>1,
            "text" => "After the race, he felt his heart beating violently.",
            "answer" => "After the race he felt his heart beating violently",
            "items" => array(
                "0"=>array("item"=>"After the race"),
                "1"=>array("item"=>"he felt"),
                "2"=>array("item"=>"his heart beating"),
                "3"=>array("item"=>"violently."),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6gsf.mp3',
                    "timeRange"     =>"00:04-00:08",
                    "text" => "After the race, he felt his heart beating violently.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6gsf.mp3',
                    "timeRange"     =>"00:04-00:08",
                    "text" => "After the race, he felt his heart beating violently.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"3",
            "content_id"=>1057,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"sr_ordering",
            "timeRange"     =>"00:08-00:11",
            "scores"=>1,
            "text" => "It gives me great pleasure to welcome our guest.",
            "answer" => "It gives me great pleasure to welcome our guest",
            "items" => array(
                "0"=>array("item"=>"It gives"),
                "1"=>array("item"=>"me"),
                "2"=>array("item"=>"great pleasure"),
                "3"=>array("item"=>"to welcome our guest."),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6gsf.mp3',
                    "timeRange"     =>"00:08-00:11",
                    "text" => "It gives me great pleasure to welcome our guest.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6gsf.mp3',
                    "timeRange"     =>"00:08-00:11",
                    "text" => "It gives me great pleasure to welcome our guest.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"4",
            "content_id"=>1058,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"sr_ordering",
            "timeRange"     =>"00:11-00:14",
            "scores"=>1,
            "text" => "He must be mentally disabled.",
            "answer" => "He must be mentally disabled",
            "items" => array(
                "0"=>array("item"=>"He"),
                "1"=>array("item"=>"must be"),
                "2"=>array("item"=>"mentally"),
                "3"=>array("item"=>"disabled."),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6gsf.mp3',
                    "timeRange"     =>"00:11-00:14",
                    "text" => "He must be mentally disabled.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6gsf.mp3',
                    "timeRange"     =>"00:11-00:14",
                    "text" => "He must be mentally disabled.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"5",
            "content_id"=>1059,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"sr_ordering",
            "timeRange"     =>"00:14-00:17",
            "scores"=>1,
            "text" => "He returned home empty-handed.",
            "answer" => "He returned home empty handed",
            "items" => array(
                "0"=>array("item"=>"He"),
                "1"=>array("item"=>"returned"),
                "2"=>array("item"=>"home"),
                "3"=>array("item"=>"empty handed."),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6gsf.mp3',
                    "timeRange"     =>"00:14-00:17",
                    "text" => "He returned home empty-handed.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6gsf.mp3',
                    "timeRange"     =>"00:14-00:17",
                    "text" => "He returned home empty-handed.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"6",
            "content_id"=>1060,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"sr_ordering",
            "timeRange"     =>"00:17-00:21",
            "scores"=>1,
            "text" => "His grandfather is energetic and never feels tired.",
            "answer" => "His grandfather is energetic and never feels tired",
            "items" => array(
                "0"=>array("item"=>"His grandfather"),
                "1"=>array("item"=>"is energetic"),
                "2"=>array("item"=>"and never"),
                "3"=>array("item"=>"feels tired."),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6gsf.mp3',
                    "timeRange"     =>"00:17-00:21",
                    "text" => "His grandfather is energetic and never feels tired.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6gsf.mp3',
                    "timeRange"     =>"00:17-00:21",
                    "text" => "His grandfather is energetic and never feels tired.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"7",
            "content_id"=>1061,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"sr_ordering",
            "timeRange"     =>"00:21-00:25",
            "scores"=>1,
            "text" => "Her parents agreed to give her $ 8 pocket money a week.",
            "answer" => "Her parents agreed to give her $ 8 pocket money a week",
            "items" => array(
                "0"=>array("item"=>"Her parents agreed"),
                "1"=>array("item"=>"to give her"),
                "2"=>array("item"=>"$ 8 pocket money"),
                "3"=>array("item"=>"a week."),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6gsf.mp3',
                    "timeRange"     =>"00:21-00:25",
                    "text" => "Her parents agreed to give her $ 8 pocket money a week.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6gsf.mp3',
                    "timeRange"     =>"00:21-00:25",
                    "text" => "Her parents agreed to give her $ 8 pocket money a week.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"8",
            "content_id"=>1062,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"sr_ordering",
            "timeRange"     =>"00:25-00:29",
            "scores"=>1,
            "text" => "Some people adopted a wait-and-see policy at the beginning.",
            "answer" => "Some people adopted a wait-and-see policy at the beginning",
            "items" => array(
                "0"=>array("item"=>"Some people"),
                "1"=>array("item"=>"adopted"),
                "2"=>array("item"=>"a wait-and-see policy"),
                "3"=>array("item"=>"at the beginning.")
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6gsf.mp3',
                    "timeRange"     =>"00:25-00:29",
                    "text" => "Some people adopted a wait-and-see policy at the beginning.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6gsf.mp3',
                    "timeRange"     =>"00:25-00:29",
                    "text" => "Some people adopted a wait-and-see policy at the beginning.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"9",
            "content_id"=>1063,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"sr_ordering",
            "timeRange"     =>"00:29-00:33",
            "scores"=>1,
            "text" => "Tyranny is worse than a Man-Eating Tiger.",
            "answer" => "Tyranny is worse than a Man-Eating Tiger",
            "items" => array(
                "0"=>array("item"=>"Tyranny"),
                "1"=>array("item"=>"is worse"),
                "2"=>array("item"=>"than"),
                "3"=>array("item"=>"a Man-Eating Tiger.")
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6gsf.mp3',
                    "timeRange"     =>"00:29-00:33",
                    "text" => "Tyranny is worse than a Man-Eating Tiger.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6gsf.mp3',
                    "timeRange"     =>"00:29-00:33",
                    "text" => "Tyranny is worse than a Man-Eating Tiger.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"10",
            "content_id"=>1064,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"sr_ordering",
            "timeRange"     =>"00:33-00:37",
            "scores"=>1,
            "text" => "I am so full that I couldn't eat another mouthful.",
            "answer" => "I am so full that I couldn't eat another mouthful",
            "items" => array(
                "0"=>array("item"=>"I am"),
                "1"=>array("item"=>"so full"),
                "2"=>array("item"=>"that"),
                "3"=>array("item"=>"I couldn't eat"),
                "4"=>array("item"=>"another mouthful."),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6gsf.mp3',
                    "timeRange"     =>"00:33-00:37",
                    "text" => "I am so full that I couldn't eat another mouthful.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u6gsf.mp3',
                    "timeRange"     =>"00:33-00:37",
                    "text" => "I am so full that I couldn't eat another mouthful.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

         $this->saveEventListToDatabases($data);$a =  json_encode($data);
        $fp = fopen('json141.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
        return;
    }

    //最新MT
    public function getPart142(){
        $data = array(
            "unit_id"       =>6,
            "lesson_id"     =>37,
            "part_id"       =>142,
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
                1=>array(1,2,4,6),
                2=>array(2,3,5,6),
                3=>array(6,4,2,1)
            ),
            "keywords"   =>array(
            ),
        );

        $data['events'][] = array(
            "num"=>"1",
            "type"=>"MTmultipleChoices",
            "media_type"=>"audio",
            "media_filename"=>'media/u6p_original_mt.mp3',
            "timeRange"=>"00:34-00:46",
            "content"=>"Around the back of the travel agency there's a parking lot. On the right of the parking lot there's a gas station that's open 24 hours.",
            "text"=>"Around the back of the travel agency there's a parking lot. On the right of the parking lot there's a gas station that's open 24 hours..",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"1",
                    "content_id"=>1065,
                    "type"=>"multipleChoice",
                    "text"=>array("type"=>"text","text"=>"Where is the parking lot?"),
                    "scores"=>5,
                    "items"=>array(
                        "0"=>array("item"=>"It's next to the travel agency.","isCorrect"=>false),
                        "1"=>array("item"=>"It's in front of the travel agency.", "isCorrect"=>false),
                        "2"=>array("item"=>"It's around the back of the travel agency.", "isCorrect"=>true),
                    ),
                    "selectEvents"=>array(
                    ),
                ),
                1=>array(
                    "num"=>"2",
                    "content_id"=>1066,
                    "type"=>"multipleChoice",
                    "text"=>array("type"=>"text","text"=>"Where is the gas station?"),
                    "scores"=>5,
                    "items"=>array(
                        "0"=>array("item"=>"It's on the left of the parking lot.","isCorrect"=>false),
                        "1"=>array("item"=>"It's next to the parking lot.", "isCorrect"=>true),
                        "2"=>array("item"=>"It's around the back of the travel agency.", "isCorrect"=>false),
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
            "media_filename"=>'media/u6p_original_mt.mp3',
            "timeRange"=>"01:25-01:38",
            "content"=>"Behind the bank there is a bookstore that mainly sells second hand textbooks. Students can get really good deals on used and nearly new books.",
            "text"=>"Behind the bank there is a bookstore that mainly sells second hand textbooks. Students can get really good deals on used and nearly new books. ",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"1",
                    "content_id"=>1067,
                    "type"=>"multipleChoice",
                    "text"=>array("type"=>"text","text"=>"What kind of book does the bookstore mainly sell?"),
                    "scores"=>5,
                    "items"=>array(
                        "0"=>array("item"=>"The bookstore mainly sells new textbooks.","isCorrect"=>false),
                        "1"=>array("item"=>"The bookstore mainly sells second hand textbooks.", "isCorrect"=>true),
                        "2"=>array("item"=>"The bookstore mainly sells popular books.", "isCorrect"=>false),
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
            "media_filename"=>'media/u6p_original_mt.mp3',
            "timeRange"=>"01:38-01:51",
            "content"=>"To the east of the bank there is a two story supermarket. On the first floor there are all different food aisles plus the soaps and cleaning aisle and the sports aisle.",
            "text"=>"To the east of the bank there is a two story supermarket. On the first floor there are all different food aisles plus the soaps and cleaning aisle and the sports aisle.",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"1",
                    "content_id"=>1068,
                    "type"=>"multipleChoice",
                    "text"=>array("type"=>"text","text"=>"Where is the supermarket?"),
                    "scores"=>5,
                    "items"=>array(
                        "0"=>array("item"=>"It's to the east of the bank.","isCorrect"=>true),
                        "1"=>array("item"=>"It's to the west of the bank.", "isCorrect"=>false),
                        "2"=>array("item"=>"It's to the north of the bank.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                    ),
                ),
                1=>array(
                    "num"=>"2",
                    "content_id"=>1069,
                    "type"=>"multipleChoice",
                    "text"=>array("type"=>"text","text"=>"What aisles does the supermarket have on the first floor? "),
                    "scores"=>5,
                    "items"=>array(
                        "0"=>array("item"=>"Food aisle plus the soaps.","isCorrect"=>false),
                        "1"=>array("item"=>"Cleaning aisle and Sports aisle.", "isCorrect"=>false),
                        "2"=>array("item"=>"All of the above.", "isCorrect"=>true),
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
            "media_filename"=>'media/u6p_original_mt.mp3',
            "timeRange"=>"02:02-02:13",
            "content"=>"Next to the supermarket there's a small old movie theatre. And if you have a student card you can get cheap tickets for block busters.",
            "text"=>"Next to the supermarket there's a small old movie theatre. And if you have a student card you can get cheap tickets for block busters.",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"1",
                    "content_id"=>1070,
                    "type"=>"multipleChoice",
                    "text"=>array("type"=>"text","text"=>"Where is the movie theatre?"),
                    "scores"=>5,
                    "items"=>array(
                        "0"=>array("item"=>"It's on Moon Avenue.","isCorrect"=>false),
                        "1"=>array("item"=>"It's beside the supermarket.", "isCorrect"=>true),
                        "2"=>array("item"=>"It's at the back of the movie theatre.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                    ),
                ),
                1=>array(
                    "num"=>"2",
                    "content_id"=>1071,
                    "type"=>"multipleChoice",
                    "text"=>array("type"=>"text","text"=>"Why do students like the movie theatre?"),
                    "scores"=>5,
                    "items"=>array(
                        "0"=>array("item"=>"Because they can get free tickets.","isCorrect"=>false),
                        "1"=>array("item"=>"Because they can see block busters there.", "isCorrect"=>false),
                        "2"=>array("item"=>"Because they can get discounts with student cards.", "isCorrect"=>true),
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
            "media_filename"=>'media/u6d_original_mt.mp3',
            "timeRange"=>"01:04-01:23",
            "content"=>"Tina: Is it convenient to go shopping here?Jim: Yes. There is a small shopping area just five blocks away from here. There are bars, restaurants, bookstores, and a small supermarket there. It takes only 15 minutes to get there on foot.",
            "text"=>"Tina: Is it convenient to go shopping here?Jim: Yes. There is a small shopping area just five blocks away from here. There are bars, restaurants, bookstores, and a small supermarket there. It takes only 15 minutes to get there on foot.",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"1",
                    "content_id"=>1072,
                    "type"=>"multipleChoice",
                    "text"=>array("type"=>"text","text"=>"What is in the shopping area nearby?"),
                    "scores"=>5,
                    "items"=>array(
                        "0"=>array("item"=>"Bars and restaurants.","isCorrect"=>false),
                        "1"=>array("item"=>"Bookstores and supermarket.", "isCorrect"=>false),
                        "2"=>array("item"=>"Both A and B.", "isCorrect"=>true),
                    ),
                    "selectEvents"=>array(
                    ),
                ),
                1=>array(
                    "num"=>"2",
                    "content_id"=>1073,
                    "type"=>"multipleChoice",
                    "text"=>array("type"=>"text","text"=>"How far is the shopping area?"),
                    "scores"=>5,
                    "items"=>array(
                        "0"=>array("item"=>"It takes only 50 minutes to get there on foot.","isCorrect"=>false),
                        "1"=>array("item"=>"It takes only 15 minutes to walk there.", "isCorrect"=>true),
                        "2"=>array("item"=>"It takes only 15 minutes to drive there.", "isCorrect"=>false),
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
            "media_filename"=>'media/u6d_original_mt.mp3',
            "timeRange"=>"01:23-01:35",
            "content"=>"Tina: By the way, where can I put my bicycle? Jim: You can put your bike just outside in the yard. If you drive, you can also park your car there.",
            "text"=>"Tina: By the way, where can I put my bicycle? Jim: You can put your bike just outside in the yard. If you drive, you can also park your car there.",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"1",
                    "content_id"=>1074,
                    "type"=>"multipleChoice",
                    "text"=>array("type"=>"text","text"=>"Where can Tina put her bike or car?"),
                    "scores"=>5,
                    "items"=>array(
                        "0"=>array("item"=>"The parking lot nearby.","isCorrect"=>false),
                        "1"=>array("item"=>"There's no space for bike or car.", "isCorrect"=>false),
                        "2"=>array("item"=>"The yard outside the house.", "isCorrect"=>true),
                    ),
                    "selectEvents"=>array(
                    ),
                ),
                1=>array(
                    "num"=>"2",
                    "content_id"=>1075,
                    "type"=>"multipleChoice",
                    "text"=>array("type"=>"text","text"=>"Can Tina drive?"),
                    "scores"=>5,
                    "items"=>array(
                        "0"=>array("item"=>"Yes, she can.","isCorrect"=>false),
                        "1"=>array("item"=>"No, she can't.", "isCorrect"=>false),
                        "2"=>array("item"=>"It doesn't mention.", "isCorrect"=>true),
                    ),
                    "selectEvents"=>array(
                    ),
                )
            ),
            "picture"=>"images/type_listen_001.png"
        );

         $this->saveEventListToDatabases($data);$a =  json_encode($data);
        $fp = fopen('json142.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
        return;
    }

    public function getPart143(){
        $data = array(
            "unit_id"       =>6,
            "lesson_id"     =>37,
            "part_id"       =>143,
            "media_filename"=>'',
            "content_totalcount"  => 9,
            "content_perpage"     => 8,
            "content_perPageCount"=>1,
            "media_type"    =>'audio',
            "totalTime"     =>"4:54",
            "part_type"     =>"questions",
            "have_questions"=>true,
            "questions_type"=>"text",
            "selectItems"   =>array(
                1=>array(1,2,4,6,8),
                2=>array(2,3,5,7,9),
            ),
            "keywords"      =>array(
            ),
        );

        $data['events'][] = array(
            "num"=>"1",
            "content_id"=>1076,
            "type"=>"MTmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u6p_original_mt.mp3',
            "timeRange"=>"00:08-00:18",
            "content"=>"Across from the college, on Moon Avenue, there's The City Museum, where Linda's parents used to bring her when she was younger.",
            "text"=>array("type"=>"audio","text"=>"Where is The City Museum?","media_filename"=>'media/u6pcq.mp3',"timeRange"=>"00:07-00:10"),
            "scores"=>7,
            "items"=>array(
                "0"=>array("item"=>"It's on Star Street.","isCorrect"=>false),
                "1"=>array("item"=>"It's on Moon Avenue.", "isCorrect"=>true),
                "2"=>array("item"=>"It's across from the natural park area.","isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_listen_001.png"
        );

        $data['events'][] = array(
            "num"=>"2",
            "content_id"=>1077,
            "type"=>"MTmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u6p_original_mt.mp3',
            "timeRange"=>"00:25-00:34",
            "content"=>"Next to the café there's also a travel agency. Linda got a job there as a travel consultant last summer.",
            "text"=>array("type"=>"audio","text"=>"Where did Linda work last summer?","media_filename"=>'media/u6pcq.mp3',"timeRange"=>"00:16-00:19"),
            "scores"=>7,
            "items"=>array(
                "0"=>array("item"=>"In the café.","isCorrect"=>false),
                "1"=>array("item"=>"In the travel agency.", "isCorrect"=>true),
                "2"=>array("item"=>"In the museum.", "isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_listen_001.png"
        );

//        $data['events'][] = array(
//            "num"=>"3",
//            "content_id"=>1078,
//            "type"=>"MTmultipleChoice",
//            "media_type"=>"audio",
//            "media_filename"=>'media/u6p_original_mt.mp3',
//            "timeRange"=>"00:46-00:59",
//            "content"=>"There's a new subway station being constructed on Moon Avenue. Its entrance is just to the south of the gas station. It's convenient to get around by subway.",
//            "text"=>array("type"=>"audio","text"=>"Where is the new subway station?","media_filename"=>'media/u6pcq.mp3',"timeRange"=>"00:33-00:37"),
//            "scores"=>7,
//            "items"=>array(
//                "0"=>array("item"=>"It's on the north of the gas station.","isCorrect"=>false),
//                "1"=>array("item"=>"It's on Moon Street.", "isCorrect"=>true),
//                "2"=>array("item"=>"It's in front of the travel agency.", "isCorrect"=>false),
//            ),
//            "selectEvents"=>array(
//            ),
//            "picture"=>"images/type_listen_001.png"
//        );

        $data['events'][] = array(
            "num"=>"3",
            "content_id"=>1079,
            "type"=>"MTmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u6p_original_mt.mp3',
            "timeRange"=>"00:59-01:15",
            "content"=>"There are two restaurants side by side, one serving fast food and snacks like sandwiches and burgers, and the other a steakhouse serving all kinds of steak and other local specialties.",
            "text"=>array("type"=>"audio","text"=>"What food is NOT served in the two restaurants?","media_filename"=>'media/u6pcq.mp3',"timeRange"=>"00:27-00:31"),
            "scores"=>7,
            "items"=>array(
                "0"=>array("item"=>"Snacks and coffee.","isCorrect"=>true),
                "1"=>array("item"=>"Sandwiches and burgers.", "isCorrect"=>false),
                "2"=>array("item"=>"Steak and local specialties.", "isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_listen_001.png"
        );

        $data['events'][] = array(
            "num"=>"4",
            "content_id"=>1080,
            "type"=>"MTmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u6p_original_mt.mp3',
            "timeRange"=>"01:51-02:02",
            "content"=>"On the second floor you can find bedding, cooking ware and stationery. Students often come here to buy the things they need.",
            "text"=>array("type"=>"audio","text"=>"What can't you find on the second floor?","media_filename"=>'media/u6pcq.mp3',"timeRange"=>"00:49-00:52"),
            "scores"=>7,
            "items"=>array(
                "0"=>array("item"=>"Foods and drinks.","isCorrect"=>true),
                "1"=>array("item"=>"Quilt and blanket.", "isCorrect"=>false),
                "2"=>array("item"=>"Pots and pans.", "isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_listen_001.png"
        );


        $data['events'][] = array(
            "num"=>"5",
            "content_id"=>1081,
            "type"=>"MTmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u6d_original_mt.mp3',
            "timeRange"=>"00:00-00:12",
            "content"=>"Jim: There are two bathrooms in the apartment. One bathroom is in my bedroom. Another one is here, right next to your bedroom. So you can use it by yourself.",
            "text"=>array("type"=>"audio","text"=>"Do they have separate bathrooms?","media_filename"=>'media/u6dcq.mp3',"timeRange"=>"00:09-00:12"),
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
            "num"=>"6",
            "content_id"=>1082,
            "type"=>"MTmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u6d_original_mt.mp3',
            "timeRange"=>"00:19-00:28",
            "content"=>"Jim: The bed is queen size, and the desk is large enough for you to put computers and books.Tina: Excellent.",
            "text"=>array("type"=>"audio","text"=>"How big is the bed?","media_filename"=>'media/u6dcq.mp3',"timeRange"=>"00:29-00:31"),
            "scores"=>7,
            "items"=>array(
                "0"=>array("item"=>"It's king size.","isCorrect"=>false),
                "1"=>array("item"=>"It's queen size.", "isCorrect"=>true),
                "2"=>array("item"=>"It's a small one.", "isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_listen_001.png"
        );

        $data['events'][] = array(
            "num"=>"7",
            "content_id"=>1083,
            "type"=>"MTmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u6d_original_mt.mp3',
            "timeRange"=>"00:42-00:51",
            "content"=>"Tina: Four cabinets for kitchen ware.Jim: I don't do much cooking so I only have a few pots and pans.",
            "text"=>array("type"=>"audio","text"=>"How many cabinets are there in the kitchen?","media_filename"=>'media/u6dcq.mp3',"timeRange"=>"00:48-00:51"),
            "scores"=>7,
            "items"=>array(
                "0"=>array("item"=>"Two.","isCorrect"=>false),
                "1"=>array("item"=>"Three.", "isCorrect"=>false),
                "2"=>array("item"=>"Four.", "isCorrect"=>true),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_listen_001.png"
        );

        $data['events'][] = array(
            "num"=>"8",
            "content_id"=>1084,
            "type"=>"MTmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u6d_original_mt.mp3',
            "timeRange"=>"01:35-01:51",
            "content"=>"Tina: So we share the electricity, internet, heating, and water?Jim: Yes. Each month, we pay before the 10th. Also, the landlord hires a lady to clean the apartment and the yard once a week.",
            "text"=>array("type"=>"audio","text"=>"Who will do the cleaning once a week?","media_filename"=>'media/u6dcq.mp3',"timeRange"=>"01:30-01:33"),
            "scores"=>7,
            "items"=>array(
                "0"=>array("item"=>"The landlord.","isCorrect"=>false),
                "1"=>array("item"=>"A hired woman.", "isCorrect"=>true),
                "2"=>array("item"=>"Tina and Jim.", "isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_listen_001.png"
        );

        $data['events'][] = array(
            "num"=>"9",
            "content_id"=>1085,
            "type"=>"MTmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u6d_original_mt.mp3',
            "timeRange"=>"01:51-02:01",
            "content"=>"Tina: Deal! When can I move in?Jim: Anytime you like!Tina: Ok, I will probably move in next Monday.",
            "text"=>array("type"=>"audio","text"=>"When can Tina move in?","media_filename"=>'media/u6dcq.mp3',"timeRange"=>"01:37-01:39"),
            "scores"=>7,
            "items"=>array(
                "0"=>array("item"=>"Anytime. ","isCorrect"=>true),
                "1"=>array("item"=>"Next Monday.", "isCorrect"=>false),
                "2"=>array("item"=>"Now.", "isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_listen_001.png"
        );


         $this->saveEventListToDatabases($data);$a =  json_encode($data);
        $fp = fopen('json143.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
        return;
    }

    public function getPart144(){
        $data = array(
            "unit_id"       =>6,
            "lesson_id"     =>37,
            "part_id"       =>144,
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
            "content_id"=>1086,
            "type"=>"SRmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u6p_original_mt.mp3',
            "timeRange"=>"00:00-00:08",
            "content"=>"Linda's college is located on Moon Avenue just north of Star Street.",
            "text"=>array("type"=>"audio","text"=>"Where is Linda's college?","media_filename"=>'media/u6pcq.mp3',"timeRange"=>"00:00-00:03"),
            "scores"=>4,
            "items"=>array(
                "0"=>array("item"=>"It's on Star Street just north of Moon Avenue.","answer"=>"It's on Star Street just north of Moon Avenue","isCorrect"=>false),
                "1"=>array("item"=>"It's on Moon Avenue just south of Star Street.","answer"=>"It's on Moon Avenue just south of Star Street", "isCorrect"=>false),
                "2"=>array("item"=>"It's on Moon Avenue just north of Star Street.","answer"=>"It's on Moon Avenue just north of Star Street", "isCorrect"=>true),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"2",
            "content_id"=>1087,
            "type"=>"SRmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u6p_original_mt.mp3',
            "timeRange"=>"00:18-00:25",
            "content"=>"Just in front of the museum there's a nice café where you can get hot drinks and snacks.",
            "text"=>array("type"=>"audio","text"=>"Where is the café?","media_filename"=>'media/u6pcq.mp3',"timeRange"=>"00:14-00:16"),
            "scores"=>4,
            "items"=>array(
                "0"=>array("item"=>"It's across from the museum.","answer"=>"It's across from the museum","isCorrect"=>false),
                "1"=>array("item"=>"It's in front of the museum.", "answer"=>"It's in front of the museum","isCorrect"=>true),
                "2"=>array("item"=>"It's in front of the college.", "answer"=>"It's in front of the college","isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"3",
            "content_id"=>1088,
            "type"=>"SRmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u6p_original_mt.mp3',
            "timeRange"=>"01:15-01:25",
            "content"=>"On the corner of Star Street and Moon Avenue there is a bank. You can open a bank account or exchange foreign currency there.",
            "text"=>array("type"=>"audio","text"=>"Where is the bank?","media_filename"=>'media/u6pcq.mp3',"timeRange"=>"00:31-00:33"),
            "scores"=>4,
            "items"=>array(
                "0"=>array("item"=>"It's on the corner of the restaurants.","answer"=>"It's on the corner of the restaurants","isCorrect"=>false),
                "1"=>array("item"=>"It's on the north of Star Street.", "answer"=>"It's on the north of Star Street","isCorrect"=>false),
                "2"=>array("item"=>"It's on the corner of Star Street and Moon Avenue.", "answer"=>"It's on the corner of Star Street and Moon Avenue","isCorrect"=>true),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"4",
            "content_id"=>1089,
            "type"=>"SRmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u6d_original_mt.mp3',
            "timeRange"=>"00:12-00:19",
            "content"=>"Tina: How big is the bedroom to rent?Jim: It is 15 square meters.",
            "text"=>array("type"=>"audio","text"=>"How big is the bedroom to rent?","media_filename"=>'media/u6dcq.mp3',"timeRange"=>"00:18-00:21"),
            "scores"=>4,
            "items"=>array(
                "0"=>array("item"=>"14 square meters.","answer"=>"fourteen square meters","isCorrect"=>false),
                "1"=>array("item"=>"15 square meters.","answer"=>"fifteen square meters", "isCorrect"=>true),
                "2"=>array("item"=>"16 square meters.","answer"=>"sixteen square meters", "isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"5",
            "content_id"=>1090,
            "type"=>"SRmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u6d_original_mt.mp3',
            "timeRange"=>"00:28-00:42",
            "content"=>"Jim: Oh, this is the kitchen. The electric stove has four burners. The oven is below it. Over there you see the microwave oven, the fridge and washing machine. ",
            "text"=>array("type"=>"audio","text"=>"What is NOT in the kitchen?","media_filename"=>'media/u6dcq.mp3',"timeRange"=>"00:37-00:40"),
            "scores"=>4,
            "items"=>array(
                "0"=>array("item"=>"The electric stove with two burners.","answer"=>"The electric stove with two burners","isCorrect"=>true),
                "1"=>array("item"=>"The microwave oven and the fridge.","answer"=>"The microwave oven and the fridge", "isCorrect"=>false),
                "2"=>array("item"=>"The washing machine.","answer"=>"The washing machine", "isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"6",
            "content_id"=>1091,
            "type"=>"SRmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u6d_original_mt.mp3',
            "timeRange"=>"00:51-01:04",
            "content"=>"Tina: What about the air-conditioning? Is it central air-conditioning?Jim: Yes, the button is here on the entrance wall. It is for both cooling in summer and heating in winter.",
            "text"=>array("type"=>"audio","text"=>"What kind of air-conditioning is it?","media_filename"=>'media/u6dcq.mp3',"timeRange"=>"01:02-01:05"),
            "scores"=>4,
            "items"=>array(
                "0"=>array("item"=>"It's only for cooling.","answer"=>"It's only for cooling","isCorrect"=>false),
                "1"=>array("item"=>"It's only for heating.","answer"=>"It's only for heating", "isCorrect"=>false),
                "2"=>array("item"=>"It's central air-conditioning.","answer"=>"It's central air-conditioning", "isCorrect"=>true),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_speak_001.png"
        );


         $this->saveEventListToDatabases($data);$a =  json_encode($data);
        $fp = fopen('json144.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
        return;
    }

    public function getPart145(){
        $data = array(
            "unit_id"       =>6,
            "lesson_id"     =>37,
            "part_id"       =>145,
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
            "content_id"=>1092,
            "media_filename"=>'media/u6gfi.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"00:17-00:21",
            "scores"=>5,
            "text" => "Without permission, no one is allowed to enter the spot.",
            "answer" => "Without permission no one is allowed to enter the spot",
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"2",
            "content_id"=>1093,
            "media_filename"=>'media/u6gfi.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"01:18-01:23",
            "scores"=>5,
            "text" => "How do French-speaking and English-speaking  Canadians interact with each other?",
            "answer" => "How do French-speaking and English-speaking  Canadians interact with each other",
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"3",
            "content_id"=>1094,
            "media_filename"=>'media/u6gso.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"00:14-00:18",
            "scores"=>5,
            "text" => "Even though the price of this dress is reasonable,  I can't afford it.",
            "answer" => "Even though the price of this dress is reasonable I can't afford it",
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"4",
            "content_id"=>1095,
            "media_filename"=>'media/u6gso.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"01:11-01:16",
            "scores"=>5,
            "text" => "He quit playing basketball  completely at the age of 24.",
            "answer" => "He quit playing basketball completely at the age of 24",
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"5",
            "content_id"=>1096,
            "media_filename"=>'media/u6gsf.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"00:00-00:04",
            "scores"=>5,
            "text" => "Try to act naturally,even if you are tense.",
            "answer" => "Try to act naturally even if you are tense",
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"6",
            "content_id"=>1097,
            "media_filename"=>'media/u6gsf.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"00:08-00:11",
            "scores"=>5,
            "text" => "It gives me great pleasure to welcome our guest.",
            "answer" => "It gives me great pleasure to welcome our guest",
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_speak_001.png"
        );

         $this->saveEventListToDatabases($data);$a =  json_encode($data);
        $fp = fopen('json145.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
        return;
    }

    public function createJson(){
        for($i=129;$i<=145;$i++){
            $function = "getPart".$i;
            $this->$function();
        }
    }


}
