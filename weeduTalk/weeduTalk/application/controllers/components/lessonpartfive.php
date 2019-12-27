<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lessonpartfive extends CI_Controller {

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
    public function getPart98(){
        $data = array(
            "unit_id"       =>5,
            "lesson_id"     =>28,
            "part_id"       =>98,
            "media_filename"=>'media/u5p.mp3',
            "media_type"    =>'audio',
            "totalTime"     =>"2:08",
            "part_type"     =>"listening",
            "have_questions"=>false,
            "questions_type"=>"text",
            "keywords"      =>array(
                "dormitory",
                "laundry",
                "kitchen",
                "oval",
                "opposite",
                "balcony",
                "favorite",
                "disturb",
                "furnish",
                "electric stove",
                "electric oven",
                "microwave oven",
                "refrigerator",
                "cooking ware",
                "utensil",
                "shower",
                "bathtub",
                "lawn",
                "backyard"
            ),
        );
        $data['events'][] = array(
            "num"=>"2",
            'type'=>"text",
            "timeRange"=>"00:00-00:09",
            "text"=>"Hello, this is Channel We. I'm Miss V. In today's program we are going to visit Linda's home.",
            "media_filename"=>'media/u5p.mp4',
            "media_type"    =>'video',
            "picture"=>"images/u5_p_001.png",
            "pictures"=>array()

        );
        $data['events'][] = array(
            "num"=>"3",
            'type'=>"text",
            "timeRange"=>"00:00-00:03",
            "displayKewords"=>true,
            "text"=>"This is Linda's home.",
            "picture"=>"images/u5_p_001.png"
        );
        $data['events'][] = array(
            "num"=>"4",
            'type'=>"text",
            "timeRange"=>"00:03-00:07",
            "text"=>"She lives with her parents.",
            "picture"=>"images/u5_p_001.png"
        );
        $data['events'][] = array(
            "num"=>"5",
            'type'=>"text",
            "timeRange"=>"00:07-00:14",
            "text"=>"She doesn't live in a dormitory because her college is close to her home.",
            "picture"=>"images/u5_p_001.png"
        );
        $data['events'][] = array(
            "num"=>"6",
            'type'=>"text",
            "timeRange"=>"00:14-00:22",
            "text"=>"The house is a two-story building with a basement and a garage.",
            "picture"=>"images/u5_p_001.png"
        );
        $data['events'][] = array(
            "num"=>"7",
            'type'=>"text",
            "timeRange"=>"00:22-00:28",
            "text"=>"The house has an outside entrance with some steps.",
            "picture"=>"images/u5_p_001.png"
        );

        $data['events'][] = array(
            "num"=>"8",
            'type'=>"text",
            "timeRange"=>"00:28-00:35",
            "text"=>"The garage is big so it provides lots of extra storage space.",
            "picture"=>"images/u5_p_002.png"
        );

        $data['events'][] = array(
            "num"=>"9",
            'type'=>"text",
            "timeRange"=>"00:35-00:43",
            "text"=>"A washing machine and a dryer are kept here and they usually do their laundry here.",
            "picture"=>"images/u5_p_002.png"
        );

        $data['events'][] = array(
            "num"=>"10",
            'type'=>"text",
            "timeRange"=>"00:43-00:54",
            "text"=>"There are five rooms on the first floor, including a living room, a dining room, a study, a kitchen, and a bathroom.",
            "picture"=>"images/u5_p_003.png"
        );

        $data['events'][] = array(
            "num"=>"11",
            'type'=>"text",
            "timeRange"=>"00:54-01:02",
            "text"=>"In the middle of the dining room is an oval table with four chairs around it.",
            "picture"=>"images/u5_p_004.png"
        );

        $data['events'][] = array(
            "num"=>"12",
            'type'=>"text",
            "timeRange"=>"01:02-01:06",
            "text"=>"The whole family has meals here.",
            "picture"=>"images/u5_p_004.png"
        );

        $data['events'][] = array(
            "num"=>"13",
            'type'=>"text",
            "timeRange"=>"01:06-01:15",
            "text"=>"Entering the living room you will see a web television hanging on the wall and a sofa opposite it. ",
            "picture"=>"images/u5_p_005.png"
        );

        $data['events'][] = array(
            "num"=>"14",
            'type'=>"text",
            "timeRange"=>"01:15-01:20",
            "text"=>"Next to the television is a fireplace.",
            "picture"=>"images/u5_p_005.png"
        );

        $data['events'][] = array(
            "num"=>"15",
            'type'=>"text",
            "timeRange"=>"01:20-01:27",
            "text"=>"There's a carpet on the floor in the middle between the television and the sofa.",
            "picture"=>"images/u5_p_005.png"
        );

        $data['events'][] = array(
            "num"=>"16",
            'type'=>"text",
            "timeRange"=>"01:27-01:32",
            "text"=>"A balcony is connected to the living room.",
            "picture"=>"images/u5_p_005.png"
        );

        $data['events'][] = array(
            "num"=>"17",
            'type'=>"text",
            "timeRange"=>"01:32-01:40",
            "text"=>"The study is Linda's favorite room, where no one can disturb her.",
            "picture"=>"images/u5_p_006.png"
        );

        $data['events'][] = array(
            "num"=>"18",
            'type'=>"text",
            "timeRange"=>"01:40-01:45",
            "text"=>"The double-pane windows keep it quiet.",
            "picture"=>"images/u5_p_006.png"
        );

        $data['events'][] = array(
            "num"=>"19",
            'type'=>"text",
            "timeRange"=>"01:45-01:51",
            "text"=>"Against one side of the wall stands a large bookcase.",
            "picture"=>"images/u5_p_006.png"
        );

        $data['events'][] = array(
            "num"=>"20",
            'type'=>"text",
            "timeRange"=>"01:51-01:58",
            "text"=>"The kitchen is her mother's favorite place since she is fond of cooking.",
            "picture"=>"images/u5_p_007.png"
        );

        $data['events'][] = array(
            "num"=>"21",
            'type'=>"text",
            "timeRange"=>"01:58-02:04",
            "text"=>"The kitchen is not luxurious but well furnished.",
            "picture"=>"images/u5_p_007.png"
        );

        $data['events'][] = array(
            "num"=>"22",
            'type'=>"text",
            "timeRange"=>"02:04-02:11",
            "text"=>"There is an electric stove, an electric oven and a microwave oven in the kitchen.",
            "picture"=>"images/u5_p_007.png"
        );

        $data['events'][] = array(
            "num"=>"23",
            'type'=>"text",
            "timeRange"=>"02:11-02:16",
            "text"=>"All the seasonings are in different sized bottles.",
            "picture"=>"images/u5_p_007.png"
        );

        $data['events'][] = array(
            "num"=>"24",
            'type'=>"text",
            "timeRange"=>"02:16-02:22",
            "text"=>"A refrigerator stands on the left-hand side of the door.",
            "picture"=>"images/u5_p_007.png"
        );

        $data['events'][] = array(
            "num"=>"25",
            'type'=>"text",
            "timeRange"=>"02:22-02:32",
            "text"=>"All the cooking ware, such as pans, pots and other utensils, are hung on the wall above the stove.",
            "picture"=>"images/u5_p_007.png"
        );

        $data['events'][] = array(
            "num"=>"26",
            'type'=>"text",
            "timeRange"=>"02:32-02:42",
            "text"=>"All the table ware, such as plates, bowls, and cutlery, are kept in a cabinet opposite the refrigerator.",
            "picture"=>"images/u5_p_007.png"
        );
        $data['events'][] = array(
            "num"=>"27",
            'type'=>"text",
            "timeRange"=>"02:42-02:48",
            "text"=>"In the bathroom there is a shower and a bathtub. ",
            "picture"=>"images/u5_p_008.png"
        );
        $data['events'][] = array(
            "num"=>"28",
            'type'=>"text",
            "timeRange"=>"02:48-02:52",
            "text"=>"The sink is next to the toilet.",
            "picture"=>"images/u5_p_008.png"
        );
        $data['events'][] = array(
            "num"=>"29",
            'type'=>"text",
            "timeRange"=>"02:52-03:02",
            "text"=>"The soap, toothbrushes, and lotions are all kept on the shelf on the other side of the sink.",
            "picture"=>"images/u5_p_008.png"
        );
        $data['events'][] = array(
            "num"=>"30",
            'type'=>"text",
            "timeRange"=>"03:02-03:12",
            "text"=>"All the bath towels are folded and placed on the shelf on the wall at the end of the bathtub. ",
            "picture"=>"images/u5_p_008.png"
        );

        $data['events'][] = array(
            "num"=>"31",
            'type'=>"text",
            "timeRange"=>"03:12-03:23",
            "text"=>"There are three bedrooms on the second floor, one for her, another for her parents and the third one for guests.",
            "picture"=>"images/u5_p_009.png"
        );
        $data['events'][] = array(
            "num"=>"32",
            'type'=>"text",
            "timeRange"=>"03:23-03:32",
            "text"=>"Her parents' bedroom has a comfortable king sized bed and a small bathroom with it.",
            "picture"=>"images/u5_p_009.png"
        );

        $data['events'][] = array(
            "num"=>"33",
            'type'=>"text",
            "timeRange"=>"03:32-03:38",
            "text"=>"In front of the house there's a beautiful lawn. ",
            "picture"=>"images/u5_p_010.png"
        );
        $data['events'][] = array(
            "num"=>"34",
            'type'=>"text",
            "timeRange"=>"03:38-03:53",
            "text"=>"At the back of the house they have a backyard, where they plant all kinds of vegetables and fruit trees, including tomatoes, cabbages, pears and apples.",
            "picture"=>"images/u5_p_010.png"
        );
        $data['events'][] = array(
            "num"=>"35",
            'type'=>"text",
            "timeRange"=>"03:53-04:00",
            "text"=>"That's why her mother's salad is always so fresh and delicious!",
            "picture"=>"images/u5_p_010.png"
        );

         $this->saveEventListToDatabases($data);$a =  json_encode($data);
        $fp = fopen('json98.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
        return;

    }

    public function getPart99(){
        $data = array(
            "unit_id"       =>5,
            "lesson_id"     =>28,
            "part_id"       =>99,
            "media_filename"=>'media/u5p.mp3',
            "media_type"    =>'audio',
            "totalTime"     =>"2:08",
            "part_type"     =>"listening",
            "have_questions"=>false,
            "questions_type"=>"text",
            "keywords"      =>array(
                "dormitory",
                "laundry",
                "kitchen",
                "oval",
                "opposite",
                "balcony",
                "favorite",
                "disturb",
                "furnish",
                "electric stove",
                "electric oven",
                "microwave oven",
                "refrigerator",
                "cooking ware",
                "utensil",
                "shower",
                "bathtub",
                "lawn",
                "backyard"
            ),
        );
        $data['events'][] = array(
            "num"=>"2",
            'type'=>"text",
            "timeRange"=>"00:00-00:09",
            "text"=>"Hello, this is Channel We. I'm Miss V. In today's program we are going to visit Linda's home.",
            "media_filename"=>'media/u5p.mp4',
            "media_type"    =>'video',
            "picture"=>"images/u5_p_001.png",
            "pictures"=>array()

        );
        $data['events'][] = array(
            "num"=>"3",
            'type'=>"text",
            "timeRange"=>"00:00-00:03",
            "displayKewords"=>true,
            "text"=>"This is Linda's home.",
            "picture"=>"images/u5_p_001.png"
        );
        $data['events'][] = array(
            "num"=>"4",
            'type'=>"text",
            "timeRange"=>"00:03-00:07",
            "text"=>"She lives with her parents.",
            "picture"=>"images/u5_p_001.png"
        );
        $data['events'][] = array(
            "num"=>"5",
            'type'=>"text",
            "timeRange"=>"00:07-00:14",
            "text"=>"She doesn't live in a dormitory because her college is close to her home.",
            "picture"=>"images/u5_p_001.png"
        );
        $data['events'][] = array(
            "num"=>"6",
            'type'=>"text",
            "timeRange"=>"00:14-00:22",
            "text"=>"The house is a two-story building with a basement and a garage.",
            "picture"=>"images/u5_p_001.png"
        );
        $data['events'][] = array(
            "num"=>"7",
            'type'=>"text",
            "timeRange"=>"00:22-00:28",
            "text"=>"The house has an outside entrance with some steps.",
            "picture"=>"images/u5_p_001.png"
        );
        $data['events'][] = array(
            "num"=>"8",
            'type'=>"multipleChoices",
            "timeRange"=>"",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"9",
                    "content_id"=>720,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5pcq.mp3',
                    "timeRange"=>"00:00-00:02",
                    "text"=>"Where does Linda live?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"She lives in her parents' house.","isCorrect"=>true),
                        "1"=>array("item"=>"She lives in her home alone.", "isCorrect"=>false),
                        "2"=>array("item"=>"She lives in a college dormitory.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u5p.mp3',
                            "timeRange"=>"00:03-00:14",
                            "text"=>"She lives with her parents. She doesn't live in a dormitory because her college is close to her home."
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u5p.mp3',
                            "timeRange"=>"00:03-00:14",
                            "text"=>"She lives with her parents. She doesn't live in a dormitory because her college is close to her home."
                        ),
                    ),
                ),
                1=>array(
                    "num"=>"10",
                    "content_id"=>721,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5pcq.mp3',
                    "timeRange"=>"00:02-00:05",
                    "text"=>"What kind of building is Linda's house?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"It's a one-story building without garage.","isCorrect"=>false),
                        "1"=>array("item"=>"It's a two-story building with a basement and a garage.", "isCorrect"=>true),
                        "2"=>array("item"=>"It's a two-story building with no basement or garage.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u5p.mp3',
                            "timeRange"=>"00:14-00:22",
                            "text"=>"The house is a two-story building with a basement and a garage.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u5p.mp3',
                            "timeRange"=>"00:14-00:22",
                            "text"=>"The house is a two-story building with a basement and a garage.",
                        ),
                    ),
                )
            )
        );

        $data['events'][] = array(
            "num"=>"11",
            'type'=>"text",
            "timeRange"=>"00:28-00:35",
            "text"=>"The garage is big so it provides lots of extra storage space.",
            "picture"=>"images/u5_p_002.png"
        );

        $data['events'][] = array(
            "num"=>"12",
            'type'=>"text",
            "timeRange"=>"00:35-00:43",
            "text"=>"A washing machine and a dryer are kept here and they usually do their laundry here.",
            "picture"=>"images/u5_p_002.png"
        );

        $data['events'][] = array(
            "num"=>"13",
            'type'=>"multipleChoices",
            "timeRange"=>"",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"14",
                    "content_id"=>722,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5pcq.mp3',
                    "timeRange"=>"00:05-00:08",
                    "text"=>"Is the garage a big one?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Yes.","isCorrect"=>true),
                        "1"=>array("item"=>"No.", "isCorrect"=>false)
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u5p.mp3',
                            "timeRange"=>"00:28-00:35",
                            "text"=>"The garage is big so it provides lots of extra storage space."
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u5p.mp3',
                            "timeRange"=>"00:28-00:35",
                            "text"=>"The garage is big so it provides lots of extra storage space."
                        ),
                    ),
                ),
                1=>array(
                    "num"=>"15",
                    "content_id"=>723,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5pcq.mp3',
                    "timeRange"=>"00:08-00:11",
                    "text"=>"What things are kept in the garage?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"An old car and a new bike.","isCorrect"=>false),
                        "1"=>array("item"=>"A washing machine and a hair dryer.", "isCorrect"=>false),
                        "2"=>array("item"=>"A washing machine and a dryer.", "isCorrect"=>true),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u5p.mp3',
                            "timeRange"=>"00:35-00:43",
                            "text"=>"A washing machine and a dryer are kept here and they usually do their laundry here.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u5p.mp3',
                            "timeRange"=>"00:35-00:43",
                            "text"=>"A washing machine and a dryer are kept here and they usually do their laundry here.",
                        ),
                    ),
                ),
                2=>array(
                    "num"=>"16",
                    "content_id"=>724,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5pcq.mp3',
                    "timeRange"=>"00:11-00:14",
                    "text"=>"Do they usually do laundry there?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Yes.","isCorrect"=>true),
                        "1"=>array("item"=>"No.", "isCorrect"=>false)
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u5p.mp3',
                            "timeRange"=>"00:35-00:43",
                            "text"=>"A washing machine and a dryer are kept here and they usually do their laundry here.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u5p.mp3',
                            "timeRange"=>"00:35-00:43",
                            "text"=>"A washing machine and a dryer are kept here and they usually do their laundry here.",
                        ),
                    ),
                )
            )
        );

        $data['events'][] = array(
            "num"=>"17",
            'type'=>"text",
            "timeRange"=>"00:43-00:54",
            "text"=>"There are five rooms on the first floor, including a living room, a dining room, a study, a kitchen, and a bathroom.",
            "picture"=>"images/u5_p_003.png"
        );

        $data['events'][] = array(
            "num"=>"18",
            'type'=>"text",
            "timeRange"=>"00:54-01:02",
            "text"=>"In the middle of the dining room is an oval table with four chairs around it.",
            "picture"=>"images/u5_p_004.png"
        );

        $data['events'][] = array(
            "num"=>"19",
            'type'=>"text",
            "timeRange"=>"01:02-01:06",
            "text"=>"The whole family has meals here.",
            "picture"=>"images/u5_p_004.png"
        );

        $data['events'][] = array(
            "num"=>"20",
            'type'=>"text",
            "timeRange"=>"01:06-01:15",
            "text"=>"Entering the living room you will see a web television hanging on the wall and a sofa opposite it. ",
            "picture"=>"images/u5_p_005.png"
        );

        $data['events'][] = array(
            "num"=>"21",
            'type'=>"text",
            "timeRange"=>"01:15-01:20",
            "text"=>"Next to the television is a fireplace.",
            "picture"=>"images/u5_p_005.png"
        );

        $data['events'][] = array(
            "num"=>"22",
            'type'=>"text",
            "timeRange"=>"01:20-01:27",
            "text"=>"There's a carpet on the floor in the middle between the television and the sofa.",
            "picture"=>"images/u5_p_005.png"
        );

        $data['events'][] = array(
            "num"=>"23",
            'type'=>"text",
            "timeRange"=>"01:27-01:32",
            "text"=>"A balcony is connected to the living room.",
            "picture"=>"images/u5_p_005.png"
        );

        $data['events'][] = array(
            "num"=>"24",
            'type'=>"multipleChoices",
            "timeRange"=>"",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"25",
                    "content_id"=>725,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5pcq.mp3',
                    "timeRange"=>"00:14-00:17",
                    "text"=>"How many rooms are there on the first floor?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Three.","isCorrect"=>false),
                        "1"=>array("item"=>"Five.", "isCorrect"=>true),
                        "2"=>array("item"=>"Four.", "isCorrect"=>false)
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u5p.mp3',
                            "timeRange"=>"00:43-00:54",
                            "text"=>"There are five rooms on the first floor, including a living room, a dining room, a study, a kitchen, and a bathroom."
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u5p.mp3',
                            "timeRange"=>"00:43-00:54",
                            "text"=>"There are five rooms on the first floor, including a living room, a dining room, a study, a kitchen, and a bathroom."
                        ),
                    ),
                ),
                1=>array(
                    "num"=>"26",
                    "content_id"=>726,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5pcq.mp3',
                    "timeRange"=>"00:17-00:20",
                    "text"=>"What things are there in the dining room?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"An oval table with 3 chairs around it.","isCorrect"=>false),
                        "1"=>array("item"=>"An oval table with 4 chairs around it.", "isCorrect"=>true),
                        "2"=>array("item"=>"A round table with 4 chairs around it.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u5p.mp3',
                            "timeRange"=>"00:54-01:02",
                            "text"=>"In the middle of the dining room is an oval table with four chairs around it.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u5p.mp3',
                            "timeRange"=>"00:54-01:02",
                            "text"=>"In the middle of the dining room is an oval table with four chairs around it.",
                        ),
                    ),
                ),
                2=>array(
                    "num"=>"27",
                    "content_id"=>727,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5pcq.mp3',
                    "timeRange"=>"00:20-00:22",
                    "text"=>"Does the living room have a balcony?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Yes.","isCorrect"=>true),
                        "1"=>array("item"=>"No.", "isCorrect"=>false)
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u5p.mp3',
                            "timeRange"=>"01:27-01:32",
                            "text"=>"A balcony is connected to the living room.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u5p.mp3',
                            "timeRange"=>"01:27-01:32",
                            "text"=>"A balcony is connected to the living room.",
                        ),
                    ),
                )
            )
        );


        $data['events'][] = array(
            "num"=>"28",
            'type'=>"text",
            "timeRange"=>"01:32-01:40",
            "text"=>"The study is Linda's favorite room, where no one can disturb her.",
            "picture"=>"images/u5_p_006.png"
        );

        $data['events'][] = array(
            "num"=>"29",
            'type'=>"text",
            "timeRange"=>"01:40-01:45",
            "text"=>"The double-pane windows keep it quiet.",
            "picture"=>"images/u5_p_006.png"
        );

        $data['events'][] = array(
            "num"=>"30",
            'type'=>"text",
            "timeRange"=>"01:45-01:51",
            "text"=>"Against one side of the wall stands a large bookcase.",
            "picture"=>"images/u5_p_006.png"
        );

        $data['events'][] = array(
            "num"=>"31",
            'type'=>"text",
            "timeRange"=>"01:51-01:58",
            "text"=>"The kitchen is her mother's favorite place since she is fond of cooking.",
            "picture"=>"images/u5_p_007.png"
        );

        $data['events'][] = array(
            "num"=>"32",
            'type'=>"text",
            "timeRange"=>"01:58-02:04",
            "text"=>"The kitchen is not luxurious but well furnished.",
            "picture"=>"images/u5_p_007.png"
        );

        $data['events'][] = array(
            "num"=>"33",
            'type'=>"text",
            "timeRange"=>"02:04-02:11",
            "text"=>"There is an electric stove, an electric oven and a microwave oven in the kitchen.",
            "picture"=>"images/u5_p_007.png"
        );

        $data['events'][] = array(
            "num"=>"34",
            'type'=>"multipleChoices",
            "timeRange"=>"",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"35",
                    "content_id"=>728,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5pcq.mp3',
                    "timeRange"=>"00:25-00:28",
                    "text"=>"Who likes the study best in Linda's family?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Linda.","isCorrect"=>true),
                        "1"=>array("item"=>"Her father.", "isCorrect"=>false),
                        "2"=>array("item"=>"Her mother.", "isCorrect"=>false)
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u5p.mp3',
                            "timeRange"=>"01:32-01:40",
                            "text"=>"The study is Linda's favorite room."
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u5p.mp3',
                            "timeRange"=>"01:32-01:40",
                            "text"=>"The study is Linda's favorite room."
                        ),
                    ),
                ),
                1=>array(
                    "num"=>"36",
                    "content_id"=>729,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5pcq.mp3',
                    "timeRange"=>"00:32-00:35",
                    "text"=>"Who likes the kitchen best in Linda's family?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Linda.","isCorrect"=>false),
                        "1"=>array("item"=>"Her father.", "isCorrect"=>false),
                        "2"=>array("item"=>"Her mother.", "isCorrect"=>true)
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u5p.mp3',
                            "timeRange"=>"01:51-01:58",
                            "text"=>"The kitchen is her mother's favorite place since she is fond of cooking.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u5p.mp3',
                            "timeRange"=>"01:51-01:58",
                            "text"=>"The kitchen is her mother's favorite place since she is fond of cooking.",
                        ),
                    ),
                ),
                2=>array(
                    "num"=>"37",
                    "content_id"=>730,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5pcq.mp3',
                    "timeRange"=>"00:35-00:39",
                    "text"=>"Why is the kitchen her mother's favorite place?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Because she enjoys cooking.","isCorrect"=>true),
                        "1"=>array("item"=>"Because it is very beautiful.", "isCorrect"=>false),
                        "2"=>array("item"=>"Because she decorated it by herself.", "isCorrect"=>false)
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u5p.mp3',
                            "timeRange"=>"01:51-01:58",
                            "text"=>"The kitchen is her mother's favorite place since she is fond of cooking.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u5p.mp3',
                            "timeRange"=>"01:51-01:58",
                            "text"=>"The kitchen is her mother's favorite place since she is fond of cooking.",
                        ),
                    ),
                )
            )
        );

        $data['events'][] = array(
            "num"=>"38",
            'type'=>"text",
            "timeRange"=>"02:11-02:16",
            "text"=>"All the seasonings are in different sized bottles.",
            "picture"=>"images/u5_p_007.png"
        );

        $data['events'][] = array(
            "num"=>"39",
            'type'=>"text",
            "timeRange"=>"02:16-02:22",
            "text"=>"A refrigerator stands on the left-hand side of the door.",
            "picture"=>"images/u5_p_007.png"
        );

        $data['events'][] = array(
            "num"=>"40",
            'type'=>"text",
            "timeRange"=>"02:22-02:32",
            "text"=>"All the cooking ware, such as pans, pots and other utensils, are hung on the wall above the stove.",
            "picture"=>"images/u5_p_007.png"
        );

        $data['events'][] = array(
            "num"=>"41",
            'type'=>"text",
            "timeRange"=>"02:32-02:42",
            "text"=>"All the table ware, such as plates, bowls, and cutlery, are kept in a cabinet opposite the refrigerator.",
            "picture"=>"images/u5_p_007.png"
        );

        $data['events'][] = array(
            "num"=>"42",
            'type'=>"multipleChoices",
            "timeRange"=>"",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"43",
                    "content_id"=>731,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5pcq.mp3',
                    "timeRange"=>"00:39-00:41",
                    "text"=>"Where is the refrigerator?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"It's opposite the door.","isCorrect"=>false),
                        "1"=>array("item"=>"It's on the right of the door.", "isCorrect"=>false),
                        "2"=>array("item"=>"It's on the left of the door.", "isCorrect"=>true)
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u5p.mp3',
                            "timeRange"=>"02:16-02:22",
                            "text"=>"A refrigerator stands on the left hand-side of the door."
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u5p.mp3',
                            "timeRange"=>"02:16-02:22",
                            "text"=>"A refrigerator stands on the left hand-side of the door."
                        ),
                    ),
                ),
                1=>array(
                    "num"=>"44",
                    "content_id"=>732,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5pcq.mp3',
                    "timeRange"=>"00:41-00:47",
                    "text"=>"Are all the cooking ware, such as pans, pots and other utensils kept in the cabinet?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Yes.","isCorrect"=>false),
                        "1"=>array("item"=>"No.", "isCorrect"=>true)
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u5p.mp3',
                            "timeRange"=>"02:22-02:32",
                            "text"=>"All the cooking ware, such as pans, pots and other utensils, are hung on the wall above the stove.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u5p.mp3',
                            "timeRange"=>"02:22-02:32",
                            "text"=>"All the cooking ware, such as pans, pots and other utensils, are hung on the wall above the stove.",
                        ),
                    ),
                )
            )
        );

        $data['events'][] = array(
            "num"=>"45",
            'type'=>"text",
            "timeRange"=>"02:42-02:48",
            "text"=>"In the bathroom there is a shower and a bathtub. ",
            "picture"=>"images/u5_p_008.png"
        );
        $data['events'][] = array(
            "num"=>"46",
            'type'=>"text",
            "timeRange"=>"02:48-02:52",
            "text"=>"The sink is next to the toilet.",
            "picture"=>"images/u5_p_008.png"
        );
        $data['events'][] = array(
            "num"=>"47",
            'type'=>"text",
            "timeRange"=>"02:52-03:02",
            "text"=>"The soap, toothbrushes, and lotions are all kept on the shelf on the other side of the sink.",
            "picture"=>"images/u5_p_008.png"
        );
        $data['events'][] = array(
            "num"=>"48",
            'type'=>"text",
            "timeRange"=>"03:02-03:12",
            "text"=>"All the bath towels are folded and placed on the shelf on the wall at the end of the bathtub.",
            "picture"=>"images/u5_p_008.png"
        );
        $data['events'][] = array(
            "num"=>"49",
            'type'=>"multipleChoices",
            "timeRange"=>"",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"50",
                    "content_id"=>733,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5pcq.mp3',
                    "timeRange"=>"00:50-00:54",
                    "text"=>"Where are all the soap, toothbrushes, and lotions kept?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"On the shelf on the wall at the end of the bathtub.","isCorrect"=>false),
                        "1"=>array("item"=>"On the shelf on the other side of the sink.", "isCorrect"=>true),
                        "2"=>array("item"=>"On the shelf in the shower.", "isCorrect"=>false)
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u5p.mp3',
                            "timeRange"=>"02:52-03:02",
                            "text"=>"The soap, toothbrushes, and lotions are all kept on the shelf on the other side of the sink."
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u5p.mp3',
                            "timeRange"=>"02:52-03:02",
                            "text"=>"The soap, toothbrushes, and lotions are all kept on the shelf on the other side of the sink."
                        ),
                    ),
                ),
                1=>array(
                    "num"=>"51",
                    "content_id"=>734,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5pcq.mp3',
                    "timeRange"=>"00:54-00:57",
                    "text"=>"Which word best describes the bathroom?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Dirty.","isCorrect"=>false),
                        "1"=>array("item"=>"Tidy.", "isCorrect"=>true),
                        "2"=>array("item"=>"Clean.", "isCorrect"=>false)
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u5pcq.mp3',
                            "timeRange"=>"00:57-01:03",
                            "text"=>"Everything is in its place in the bathroom so tidy is the word which best describes the bathroom.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u5pcq.mp3',
                            "timeRange"=>"00:57-01:03",
                            "text"=>"Everything is in its place in the bathroom so tidy is the word which best describes the bathroom.",
                        ),
                    ),
                )
            )
        );


        $data['events'][] = array(
            "num"=>"52",
            'type'=>"text",
            "timeRange"=>"03:12-03:23",
            "text"=>"There are three bedrooms on the second floor, one for her, another for her parents and the third one for guests.",
            "picture"=>"images/u5_p_009.png"
        );
        $data['events'][] = array(
            "num"=>"53",
            'type'=>"text",
            "timeRange"=>"03:23-03:32",
            "text"=>"Her parents' bedroom has a comfortable king sized bed and a small bathroom with it.",
            "picture"=>"images/u5_p_009.png"
        );

        $data['events'][] = array(
            "num"=>"54",
            'type'=>"text",
            "timeRange"=>"03:32-03:38",
            "text"=>"In front of the house there's a beautiful lawn. ",
            "picture"=>"images/u5_p_010.png"
        );
        $data['events'][] = array(
            "num"=>"55",
            'type'=>"text",
            "timeRange"=>"03:38-03:53",
            "text"=>"At the back of the house they have a backyard, where they plant all kinds of vegetables and fruit trees, including tomatoes, cabbages, pears and apples.",
            "picture"=>"images/u5_p_010.png"
        );
        $data['events'][] = array(
            "num"=>"56",
            'type'=>"text",
            "timeRange"=>"03:53-04:00",
            "text"=>"That's why her mother's salad is always so fresh and delicious!",
            "picture"=>"images/u5_p_010.png"
        );

        $data['events'][] = array(
            "num"=>"57",
            'type'=>"multipleChoices",
            "timeRange"=>"",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"58",
                    "content_id"=>735,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5pcq.mp3',
                    "timeRange"=>"01:03-01:06",
                    "text"=>"Which room has a king sized bed?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Linda's room.","isCorrect"=>false),
                        "1"=>array("item"=>"Her parents' room.", "isCorrect"=>true),
                        "2"=>array("item"=>"The Guest's room.", "isCorrect"=>false)
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u5p.mp3',
                            "timeRange"=>"03:23-03:32",
                            "text"=>"Her parents' bedroom has a comfortable king sized bed and a small bathroom with it."
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u5p.mp3',
                            "timeRange"=>"03:23-03:32",
                            "text"=>"Her parents' bedroom has a comfortable king sized bed and a small bathroom with it."
                        ),
                    ),
                ),
                1=>array(
                    "num"=>"59",
                    "content_id"=>736,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5pcq.mp3',
                    "timeRange"=>"01:09-01:12",
                    "text"=>"What are planted in the backyard?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Tomatoes and cabbages.","isCorrect"=>false),
                        "1"=>array("item"=>"Pears and apples.", "isCorrect"=>false),
                        "2"=>array("item"=>"Both vegetables and fruit trees.", "isCorrect"=>true)
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u5pcq.mp3',
                            "timeRange"=>"01:12-01:20",
                            "text"=>"They plant all kinds of vegetables and fruit trees, including tomatoes, cabbages, pears and apples in the backyard.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u5pcq.mp3',
                            "timeRange"=>"01:12-01:20",
                            "text"=>"They plant all kinds of vegetables and fruit trees, including tomatoes, cabbages, pears and apples in the backyard.",
                        ),
                    ),
                )
            )
        );

         $this->saveEventListToDatabases($data);$a =  json_encode($data);
        $fp = fopen('json99.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
        return;

    }


    public function getPart100(){

        $data = array(
            "unit_id"       =>5,
            "lesson_id"     =>28,
            "part_id"       =>100,
            "media_filename"=>'media/u5p.mp3',
            "media_type"    =>'audio',
            "totalTime"     =>"2:08",
            "part_type"     =>"listening",
            "have_questions"=>false,
            "questions_type"=>"text",
            "keywords"      =>array(
                "dormitory",
                "laundry",
                "kitchen",
                "oval",
                "opposite",
                "balcony",
                "favorite",
                "disturb",
                "furnish",
                "electric stove",
                "electric oven",
                "microwave oven",
                "refrigerator",
                "cooking ware",
                "utensil",
                "shower",
                "bathtub",
                "lawn",
                "backyard"
            ),
        );
        $data['events'][] = array(
            "num"=>"2",
            'type'=>"text",
            "timeRange"=>"00:00-00:09",
            "text"=>"Hello, this is Channel We. I'm Miss V. In today's program we are going to visit Linda's home.",
            "media_filename"=>'media/u5p.mp4',
            "media_type"    =>'video',
            "picture"=>"images/u5_p_001.png",
            "pictures"=>array()

        );
        $data['events'][] = array(
            "num"=>"3",
            'type'=>"text",
            "timeRange"=>"00:00-00:03",
            "displayKewords"=>true,
            "text"=>"This is Linda's home.",
            "picture"=>"images/u5_p_001.png"
        );
        $data['events'][] = array(
            "num"=>"4",
            'type'=>"text",
            "timeRange"=>"00:03-00:07",
            "text"=>"She lives with her parents.",
            "picture"=>"images/u5_p_001.png"
        );
        $data['events'][] = array(
            "num"=>"5",
            "content_id"=>737,
            'type'=>"sr_reading",
            "scores"=>1,
            "timeRange"=>"00:07-00:14",
            "text"=>"She doesn't live in a dormitory because her college is close to her home.",
            "answer"=>"She doesn't live in a dormitory because her college is close to her home",
            "picture"=>"images/u5_p_001.png"
        );
        $data['events'][] = array(
            "num"=>"6",
            'type'=>"text",
            "timeRange"=>"00:14-00:22",
            "text"=>"The house is a two-story building with a basement and a garage.",
            "picture"=>"images/u5_p_001.png"
        );
        $data['events'][] = array(
            "num"=>"7",
            "content_id"=>738,
            'type'=>"sr_reading",
            "scores"=>1,
            "timeRange"=>"00:22-00:28",
            "text"=>"The house has an outside entrance with some steps.",
            "answer"=>"The house has an outside entrance with some steps",
            "picture"=>"images/u5_p_001.png"
        );

        $data['events'][] = array(
            "num"=>"8",
            'type'=>"text",
            "timeRange"=>"00:28-00:35",
            "text"=>"The garage is big so it provides lots of extra storage space.",
            "picture"=>"images/u5_p_002.png"
        );

        $data['events'][] = array(
            "num"=>"9",
            'type'=>"text",
            "timeRange"=>"00:35-00:43",
            "text"=>"A washing machine and a dryer are kept here and they usually do their laundry here.",
            "picture"=>"images/u5_p_002.png"
        );

        $data['events'][] = array(
            "num"=>"10",
            "content_id"=>739,
            'type'=>"sr_reading",
            "scores"=>1,
            "timeRange"=>"00:43-00:54",
            "text"=>"There are five rooms on the first floor, including a living room, a dining room, a study, a kitchen, and a bathroom.",
            "answer"=>"There are five rooms on the first floor including a living room a dining room a study a kitchen and a bathroom",
            "picture"=>"images/u5_p_003.png"
        );

        $data['events'][] = array(
            "num"=>"11",
            'type'=>"text",
            "timeRange"=>"00:54-01:02",
            "text"=>"In the middle of the dining room is an oval table with four chairs around it.",
            "picture"=>"images/u5_p_004.png"
        );

        $data['events'][] = array(
            "num"=>"12",
            "content_id"=>740,
            'type'=>"sr_reading",
            "scores"=>1,
            "timeRange"=>"01:02-01:06",
            "text"=>"The whole family has meals here.",
            "answer"=>"The whole family has meals here",
            "picture"=>"images/u5_p_004.png"
        );

        $data['events'][] = array(
            "num"=>"13",
            'type'=>"text",
            "timeRange"=>"01:06-01:15",
            "text"=>"Entering the living room you will see a web television hanging on the wall and a sofa opposite it. ",
            "picture"=>"images/u5_p_005.png"
        );

        $data['events'][] = array(
            "num"=>"14",
            "content_id"=>741,
            'type'=>"sr_reading",
            "scores"=>1,
            "timeRange"=>"01:15-01:20",
            "text"=>"Next to the television is a fireplace.",
            "answer"=>"Next to the television is a fireplace",
            "picture"=>"images/u5_p_005.png"
        );

        $data['events'][] = array(
            "num"=>"15",
            'type'=>"text",
            "timeRange"=>"01:20-01:27",
            "text"=>"There's a carpet on the floor in the middle between the television and the sofa.",
            "picture"=>"images/u5_p_005.png"
        );

        $data['events'][] = array(
            "num"=>"16",
            "content_id"=>742,
            'type'=>"sr_reading",
            "scores"=>1,
            "timeRange"=>"01:27-01:32",
            "text"=>"A balcony is connected to the living room.",
            "answer"=>"A balcony is connected to the living room",
            "picture"=>"images/u5_p_005.png"
        );

        $data['events'][] = array(
            "num"=>"17",
            "content_id"=>743,
            'type'=>"sr_reading",
            "scores"=>1,
            "timeRange"=>"01:32-01:40",
            "text"=>"The study is Linda's favorite room, where no one can disturb her.",
            "answer"=>"The study is Linda's favorite room where no one can disturb her",
            "picture"=>"images/u5_p_006.png"
        );

        $data['events'][] = array(
            "num"=>"18",
            'type'=>"text",
            "timeRange"=>"01:40-01:45",
            "text"=>"The double-pane windows keep it quiet.",
            "picture"=>"images/u5_p_006.png"
        );

        $data['events'][] = array(
            "num"=>"19",
            'type'=>"text",
            "timeRange"=>"01:45-01:51",
            "text"=>"Against one side of the wall stands a large bookcase.",
            "picture"=>"images/u5_p_006.png"
        );

        $data['events'][] = array(
            "num"=>"20",
            "content_id"=>744,
            'type'=>"sr_reading",
            "scores"=>1,
            "timeRange"=>"01:51-01:58",
            "text"=>"The kitchen is her mother's favorite place since she is fond of cooking.",
            "answer"=>"The kitchen is her mother's favorite place since she is fond of cooking",
            "picture"=>"images/u5_p_007.png"
        );

        $data['events'][] = array(
            "num"=>"21",
            "content_id"=>745,
            'type'=>"sr_reading",
            "scores"=>1,
            "timeRange"=>"01:58-02:04",
            "text"=>"The kitchen is not luxurious but well furnished.",
            "answer"=>"The kitchen is not luxurious but well furnished",
            "picture"=>"images/u5_p_007.png"
        );

        $data['events'][] = array(
            "num"=>"22",
            'type'=>"text",
            "timeRange"=>"02:04-02:11",
            "text"=>"There is an electric stove, an electric oven and a microwave oven in the kitchen.",
            "picture"=>"images/u5_p_007.png"
        );

        $data['events'][] = array(
            "num"=>"23",
            "content_id"=>746,
            'type'=>"sr_reading",
            "scores"=>1,
            "timeRange"=>"02:11-02:16",
            "text"=>"All the seasonings are in different sized bottles.",
            "answer"=>"All the seasonings are in different sized bottles",
            "picture"=>"images/u5_p_007.png"
        );

        $data['events'][] = array(
            "num"=>"24",
            "content_id"=>747,
            'type'=>"sr_reading",
            "scores"=>1,
            "timeRange"=>"02:16-02:22",
            "text"=>"A refrigerator stands on the left-hand side of the door.",
            "answer"=>"A refrigerator stands on the left-hand side of the door",
            "picture"=>"images/u5_p_007.png"
        );

        $data['events'][] = array(
            "num"=>"25",
            'type'=>"text",
            "timeRange"=>"02:22-02:32",
            "text"=>"All the cooking ware, such as pans, pots and other utensils, are hung on the wall above the stove.",
            "picture"=>"images/u5_p_007.png"
        );

        $data['events'][] = array(
            "num"=>"26",
            'type'=>"text",
            "timeRange"=>"02:32-02:42",
            "text"=>"All the table ware, such as plates, bowls, and cutlery, are kept in a cabinet opposite the refrigerator.",
            "picture"=>"images/u5_p_007.png"
        );
        $data['events'][] = array(
            "num"=>"27",
            "content_id"=>748,
            'type'=>"sr_reading",
            "scores"=>1,
            "timeRange"=>"02:42-02:48",
            "text"=>"In the bathroom there is a shower and a bathtub. ",
            "answer"=>"In the bathroom there is a shower and a bathtub",
            "picture"=>"images/u5_p_008.png"
        );
        $data['events'][] = array(
            "num"=>"28",
            "content_id"=>749,
            'type'=>"sr_reading",
            "scores"=>1,
            "timeRange"=>"02:48-02:52",
            "text"=>"The sink is next to the toilet.",
            "answer"=>"The sink is next to the toilet.",
            "picture"=>"images/u5_p_008.png"
        );
        $data['events'][] = array(
            "num"=>"29",
            'type'=>"text",
            "timeRange"=>"02:52-03:02",
            "text"=>"The soap, toothbrushes, and lotions are all kept on the shelf on the other side of the sink.",
            "picture"=>"images/u5_p_008.png"
        );
        $data['events'][] = array(
            "num"=>"30",
            "content_id"=>750,
            'type'=>"sr_reading",
            "scores"=>1,
            "timeRange"=>"03:02-03:12",
            "text"=>"All the bath towels are folded and placed on the shelf on the wall at the end of the bathtub.",
            "answer"=>"All the bath towels are folded and placed on the shelf on the wall at the end of the bathtub",
            "picture"=>"images/u5_p_008.png"
        );

        $data['events'][] = array(
            "num"=>"31",
            'type'=>"text",
            "timeRange"=>"03:12-03:23",
            "text"=>"There are three bedrooms on the second floor, one for her, another for her parents and the third one for guests.",
            "picture"=>"images/u5_p_009.png"
        );
        $data['events'][] = array(
            "num"=>"32",
            'type'=>"text",
            "timeRange"=>"03:23-03:32",
            "text"=>"Her parents' bedroom has a comfortable king sized bed and a small bathroom with it.",
            "picture"=>"images/u5_p_009.png"
        );

        $data['events'][] = array(
            "num"=>"33",
            "content_id"=>751,
            'type'=>"sr_reading",
            "scores"=>1,
            "timeRange"=>"03:32-03:38",
            "text"=>"In front of the house there's a beautiful lawn.",
            "answer"=>"In front of the house there's a beautiful lawn",
            "picture"=>"images/u5_p_010.png"
        );
        $data['events'][] = array(
            "num"=>"34",
            'type'=>"text",
            "timeRange"=>"03:38-03:53",
            "text"=>"At the back of the house they have a backyard, where they plant all kinds of vegetables and fruit trees, including tomatoes, cabbages, pears and apples.",
            "picture"=>"images/u5_p_010.png"
        );
        $data['events'][] = array(
            "num"=>"35",
            "content_id"=>752,
            'type'=>"sr_reading",
            "scores"=>1,
            "timeRange"=>"03:53-04:00",
            "text"=>"That's why her mother's salad is always so fresh and delicious!",
            "answer"=>"That's why her mother's salad is always so fresh and delicious",
            "picture"=>"images/u5_p_010.png"
        );

         $this->saveEventListToDatabases($data);$a =  json_encode($data);
        $fp = fopen('json100.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
        return;

    }


    public function getPart101(){
        $data = array(
            "unit_id"       =>5,
            "lesson_id"     =>29,
            "part_id"       =>101,
            "media_filename"=>'media/u5d.mp4',
            "media_type"    =>'video',
            "totalTime"     =>"4:05",
            "part_type"     =>"dialog",
            "have_questions"=>false,
            "questions_type"=>"text",
            "keywords"      =>array(
                "campus",
                "independent",
                "impressive",
                "major",
                "hospitality",
                "registration",
                "undergraduate admission",
                "gym",
                "reception desk",
                "locker room",
                "court",
                "fitness room",
                "cuisine"
            ),
        );

        $data['events'][] = array(
            "num"=>"1",
            'type'=>"text",
            "timeRange"=>"00:00-00:08",
            "text"=>"This is Bill's university, the Western University, which is located in the middle of the country.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"2",
            'type'=>"text",
            "timeRange"=>"00:08-00:15",
            "text"=>"Bill's high school classmate Linda comes to visit him during the spring break.",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"3",
            'type'=>"text",
            "timeRange"=>"00:15-00:19",
            "text"=>"They meet in front of Bill's dormitory.",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"4",
            'type'=>"text",
            "timeRange"=>"00:19-00:24",
            "text"=>"Hi, Linda. Welcome to my university.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"5",
            'type'=>"text",
            "timeRange"=>"00:24-00:29",
            "text"=>"Well, what a beautiful campus! ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"6",
            'type'=>"text",
            "timeRange"=>"00:29-00:33",
            "text"=>"It looks like a garden.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"7",
            'type'=>"text",
            "timeRange"=>"00:33-00:36",
            "text"=>"Of course.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"8",
            'type'=>"text",
            "timeRange"=>"00:36-00:39",
            "text"=>"Let me show you around.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"9",
            'type'=>"text",
            "timeRange"=>"00:39-00:49",
            "text"=>"We have three schools on the campus, including the management school, the electronic engineering school, and the tourism school.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"10",
            'type'=>"text",
            "timeRange"=>"00:49-00:56",
            "text"=>"Each school has an independent building with its own library and computer lab.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"11",
            'type'=>"text",
            "timeRange"=>"00:56-01:02",
            "text"=>"I've heard that there is a famous café at the tourism school.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"12",
            'type'=>"text",
            "timeRange"=>"01:02-01:05",
            "text"=>"Can we go and have a look?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"13",
            'type'=>"text",
            "timeRange"=>"01:05-01:07",
            "text"=>"Sure.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"14",
            'type'=>"text",
            "timeRange"=>"01:07-01:10",
            "text"=>"Here we are.",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"15",
            'type'=>"text",
            "timeRange"=>"01:10-01:14",
            "text"=>"This is the tourism school.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"16",
            'type'=>"text",
            "timeRange"=>"01:14-01:19",
            "text"=>"The café is right on the first floor, over there.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"17",
            'type'=>"text",
            "timeRange"=>"01:19-01:25",
            "text"=>"All the classrooms are on the second floor and the library is on the third floor.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"18",
            'type'=>"text",
            "timeRange"=>"01:25-01:29",
            "text"=>"The dean's office is on the first floor too. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"19",
            'type'=>"text",
            "timeRange"=>"01:29-01:33",
            "text"=>"The computer lab is next to the café.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"20",
            'type'=>"text",
            "timeRange"=>"01:33-01:39",
            "text"=>"Oh, the café is certainly very impressive.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"21",
            'type'=>"text",
            "timeRange"=>"01:39-01:47",
            "text"=>"Yes. All the students that majored in hospitality practice cooking and servicing here in the café. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"22",
            'type'=>"text",
            "timeRange"=>"01:47-01:51",
            "text"=>"There is a large kitchen back there.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"23",
            'type'=>"text",
            "timeRange"=>"01:51-01:58",
            "text"=>"There are altogether thirty tables and it serves mainly western food.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"24",
            'type'=>"text",
            "timeRange"=>"01:58-02:04",
            "text"=>"What's the building across the lawn over there in the east?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"25",
            'type'=>"text",
            "timeRange"=>"02:04-02:08",
            "text"=>"Oh, that is the student center.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"26",
            'type'=>"text",
            "timeRange"=>"02:08-02:19",
            "text"=>"All the offices of student services are there, such as the financial aid, registration and undergraduate admissions.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"27",
            'type'=>"text",
            "timeRange"=>"02:19-02:22",
            "text"=>"Where is the gym?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"28",
            'type'=>"text",
            "timeRange"=>"02:22-02:27",
            "text"=>"The gym is right in the north part of the campus. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"29",
            'type'=>"text",
            "timeRange"=>"02:27-02:30",
            "text"=>"Let's go and see it.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"30",
            'type'=>"text",
            "timeRange"=>"02:30-02:35",
            "text"=>"This is the third floor school gym. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"31",
            'type'=>"text",
            "timeRange"=>"02:35-02:42",
            "text"=>"There, opposite the reception desk, is the locker room with a bathroom inside it. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"32",
            'type'=>"text",
            "timeRange"=>"02:42-02:47",
            "text"=>"Over there is a door leading into the swimming pool.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"33",
            'type'=>"text",
            "timeRange"=>"02:47-02:52",
            "text"=>"Well, the swimming pool is great.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"34",
            'type'=>"text",
            "timeRange"=>"02:52-02:56",
            "text"=>"I enjoy swimming so much.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"35",
            'type'=>"text",
            "timeRange"=>"02:56-03:00",
            "text"=>"Let's go to the second floor.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"36",
            'type'=>"text",
            "timeRange"=>"03:00-03:05",
            "text"=>"See, here is the full-sized basketball court.",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"37",
            'type'=>"text",
            "timeRange"=>"03:05-03:11",
            "text"=>"And opposite over there, is a full-sized volleyball court. ",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"38",
            'type'=>"text",
            "timeRange"=>"03:11-03:16",
            "text"=>"I often do jogging around the court after school.",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"39",
            'type'=>"text",
            "timeRange"=>"03:16-03:20",
            "text"=>"What is on the third floor?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"40",
            'type'=>"text",
            "timeRange"=>"03:20-03:24",
            "text"=>"The fitness room is on the third floor.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"41",
            'type'=>"text",
            "timeRange"=>"03:24-03:28",
            "text"=>"You can do many exercises there.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"42",
            'type'=>"text",
            "timeRange"=>"03:28-03:33",
            "text"=>"Some students work part time there as coaches.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"43",
            'type'=>"text",
            "timeRange"=>"03:33-03:38",
            "text"=>"Don't you have an outdoor playground here?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"44",
            'type'=>"text",
            "timeRange"=>"03:38-03:42",
            "text"=>"Yes, but not here at the gym.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"45",
            'type'=>"text",
            "timeRange"=>"03:42-03:47",
            "text"=>"The playground is in front of the dormitory.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"46",
            'type'=>"text",
            "timeRange"=>"03:47-03:51",
            "text"=>"Do you have to pay here?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"47",
            'type'=>"text",
            "timeRange"=>"03:51-03:58",
            "text"=>"No. As a matter of fact, our tuition covers the fee for the gym.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"48",
            'type'=>"text",
            "timeRange"=>"03:58-04:03",
            "text"=>"You just use your student ID card for entrance.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"49",
            'type'=>"text",
            "timeRange"=>"04:03-04:06",
            "text"=>"I see.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"50",
            'type'=>"text",
            "timeRange"=>"04:06-04:10",
            "text"=>"Well, it's time for lunch.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"51",
            'type'=>"text",
            "timeRange"=>"04:10-04:15",
            "text"=>"How about going downtown to try some local cuisines?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"52",
            'type'=>"text",
            "timeRange"=>"04:15-04:17",
            "text"=>"Why not?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"53",
            'type'=>"text",
            "timeRange"=>"04:17-04:19",
            "text"=>"Let's go.",
            "picture"=>""
        );

         $this->saveEventListToDatabases($data);$a =  json_encode($data);
        $fp = fopen('json101.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
        return;
    }

    public function getPart102(){

        $data = array(
            "unit_id"       =>5,
            "lesson_id"     =>29,
            "part_id"       =>102,
            "media_filename"=>'media/u5d.mp4',
            "media_type"    =>'video',
            "totalTime"     =>"4:05",
            "part_type"     =>"dialog",
            "have_questions"=>false,
            "questions_type"=>"text",
            "keywords"      =>array(
                "campus",
                "independent",
                "impressive",
                "major",
                "hospitality",
                "registration",
                "undergraduate admission",
                "gym",
                "reception desk",
                "locker room",
                "court",
                "fitness room",
                "cuisine"
            ),
        );

        $data['events'][] = array(
            "num"=>"1",
            'type'=>"text",
            "timeRange"=>"00:00-00:08",
            "text"=>"This is Bill's university, the Western University, which is located in the middle of the country.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"2",
            'type'=>"text",
            "timeRange"=>"00:08-00:15",
            "text"=>"Bill's high school classmate Linda comes to visit him during the spring break.",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"3",
            'type'=>"text",
            "timeRange"=>"00:15-00:19",
            "text"=>"They meet in front of Bill's dormitory.",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"4",
            'type'=>"text",
            "timeRange"=>"00:19-00:24",
            "text"=>"Hi, Linda. Welcome to my university.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"5",
            'type'=>"text",
            "timeRange"=>"00:24-00:29",
            "text"=>"Well, what a beautiful campus! ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"6",
            'type'=>"text",
            "timeRange"=>"00:29-00:33",
            "text"=>"It looks like a garden.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"7",
            'type'=>"text",
            "timeRange"=>"00:33-00:36",
            "text"=>"Of course.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"8",
            'type'=>"text",
            "timeRange"=>"00:36-00:39",
            "text"=>"Let me show you around.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"9",
            'type'=>"text",
            "timeRange"=>"00:39-00:49",
            "text"=>"We have three schools on the campus, including the management school, the electronic engineering school, and the tourism school.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"10",
            'type'=>"text",
            "timeRange"=>"00:49-00:56",
            "text"=>"Each school has an independent building with its own library and computer lab.",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"11",
            'type'=>"multipleChoices",
            "timeRange"=>"",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"12",
                    "content_id"=>753,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5dcq.mp3',
                    "timeRange"=>"00:00-00:03",
                    "text"=>"When does Linda visit Bill?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"During the vacation.","isCorrect"=>true),
                        "1"=>array("item"=>"During the class break.", "isCorrect"=>false),
                        "2"=>array("item"=>"During the winter break.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u5d.mp3',
                            "timeRange"=>"00:08-00:15",
                            "text"=>"Bill's high school classmate Linda comes to visit him during the spring break. ",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u5d.mp3',
                            "timeRange"=>"00:08-00:15",
                            "text"=>"Bill's high school classmate Linda comes to visit him during the spring break. ",
                        ),
                    ),
                ),
                1=>array(
                    "num"=>"13",
                    "content_id"=>754,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5dcq.mp3',
                    "timeRange"=>"00:03-00:07",
                    "text"=>"How many schools are there in Bill's university?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Two.","isCorrect"=>false),
                        "1"=>array("item"=>"Three.", "isCorrect"=>true),
                        "2"=>array("item"=>"Four.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u5dcq.mp3',
                            "timeRange"=>"00:07-00:15",
                            "text"=>"There are three schools on the campus, including the management school, the electronic engineering school, and the tourism school.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u5dcq.mp3',
                            "timeRange"=>"00:07-00:15",
                            "text"=>"There are three schools on the campus, including the management school, the electronic engineering school, and the tourism school.",
                        ),
                    ),
                ),
                2=>array(
                    "num"=>"14",
                    "content_id"=>755,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5dcq.mp3',
                    "timeRange"=>"00:15-00:19",
                    "text"=>"Does each school have its own library and computer lab?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Yes.","isCorrect"=>true),
                        "1"=>array("item"=>"No.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u5d.mp3',
                            "timeRange"=>"00:49-00:56",
                            "text"=>"Each school has an independent building with its own library and computer lab.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u5d.mp3',
                            "timeRange"=>"00:49-00:56",
                            "text"=>"Each school has an independent building with its own library and computer lab.",
                        ),
                    ),
                ),
            )
        );

        $data['events'][] = array(
            "num"=>"15",
            'type'=>"text",
            "timeRange"=>"00:56-01:02",
            "text"=>"I've heard that there is a famous café at the tourism school.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"16",
            'type'=>"text",
            "timeRange"=>"01:02-01:05",
            "text"=>"Can we go and have a look?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"17",
            'type'=>"text",
            "timeRange"=>"01:05-01:07",
            "text"=>"Sure.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"18",
            'type'=>"text",
            "timeRange"=>"01:07-01:10",
            "text"=>"Here we are.",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"19",
            'type'=>"text",
            "timeRange"=>"01:10-01:14",
            "text"=>"This is the tourism school.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"20",
            'type'=>"text",
            "timeRange"=>"01:14-01:19",
            "text"=>"The café is right on the first floor, over there.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"21",
            'type'=>"text",
            "timeRange"=>"01:19-01:25",
            "text"=>"All the classrooms are on the second floor and the library is on the third floor.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"22",
            'type'=>"text",
            "timeRange"=>"01:25-01:29",
            "text"=>"The dean's office is on the first floor too. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"23",
            'type'=>"text",
            "timeRange"=>"01:29-01:33",
            "text"=>"The computer lab is next to the café.",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"24",
            'type'=>"multipleChoices",
            "timeRange"=>"",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"25",
                    "content_id"=>756,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5dcq.mp3',
                    "timeRange"=>"00:22-00:24",
                    "text"=>"Where is the café?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"On the first floor.","isCorrect"=>true),
                        "1"=>array("item"=>"On the second floor.", "isCorrect"=>false),
                        "2"=>array("item"=>"On the third floor.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u5d.mp3',
                            "timeRange"=>"01:14-01:19",
                            "text"=>"The café is right on the first floor, over there.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u5d.mp3',
                            "timeRange"=>"01:14-01:19",
                            "text"=>"The café is right on the first floor, over there.",
                        ),
                    ),
                ),
                1=>array(
                    "num"=>"26",
                    "content_id"=>757,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5dcq.mp3',
                    "timeRange"=>"00:19-00:22",
                    "text"=>"Is the dean's office on the second floor?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Yes.","isCorrect"=>false),
                        "1"=>array("item"=>"No.", "isCorrect"=>true)
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u5d.mp3',
                            "timeRange"=>"01:25-01:29",
                            "text"=>"The dean's office is on the first floor too.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u5d.mp3',
                            "timeRange"=>"01:25-01:29",
                            "text"=>"The dean's office is on the first floor too.",
                            ),
                    ),
                )
            )
        );

        $data['events'][] = array(
            "num"=>"27",
            'type'=>"text",
            "timeRange"=>"01:33-01:39",
            "text"=>"Oh, the café is certainly very impressive.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"28",
            'type'=>"text",
            "timeRange"=>"01:39-01:47",
            "text"=>"Yes. All the students that majored in hospitality practice cooking and servicing here in the café. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"29",
            'type'=>"text",
            "timeRange"=>"01:47-01:51",
            "text"=>"There is a large kitchen back there.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"30",
            'type'=>"text",
            "timeRange"=>"01:51-01:58",
            "text"=>"There are altogether thirty tables and it serves mainly western food.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"31",
            'type'=>"text",
            "timeRange"=>"01:58-02:04",
            "text"=>"What's the building across the lawn over there in the east?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"32",
            'type'=>"text",
            "timeRange"=>"02:04-02:08",
            "text"=>"Oh, that is the student center.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"33",
            'type'=>"text",
            "timeRange"=>"02:08-02:19",
            "text"=>"All the offices of student services are there, such as the financial aid, registration and undergraduate admissions.",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"34",
            'type'=>"multipleChoices",
            "timeRange"=>"",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"35",
                    "content_id"=>758,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5dcq.mp3',
                    "timeRange"=>"00:32-00:36",
                    "text"=>"Does the café have student waiters and waitresses there?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Yes.","isCorrect"=>false),
                        "1"=>array("item"=>"No.", "isCorrect"=>true)
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u5d.mp3',
                            "timeRange"=>"01:39-01:47",
                            "text"=>"Yes. All the students that majored in hospitality practice cooking and servicing here in the café.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u5d.mp3',
                            "timeRange"=>"01:39-01:47",
                            "text"=>"Yes. All the students that majored in hospitality practice cooking and servicing here in the café.",
                        ),
                    ),
                ),
                1=>array(
                    "num"=>"36",
                    "content_id"=>759,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5dcq.mp3',
                    "timeRange"=>"00:29-00:32",
                    "text"=>"What food does the café mainly serve?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Chinese food.","isCorrect"=>false),
                        "1"=>array("item"=>"Western food.", "isCorrect"=>true),
                        "2"=>array("item"=>"Indian food.", "isCorrect"=>false)
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u5d.mp3',
                            "timeRange"=>"01:51-01:58",
                            "text"=>"There are altogether thirty tables and it serves mainly western food.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u5d.mp3',
                            "timeRange"=>"01:51-01:58",
                            "text"=>"There are altogether thirty tables and it serves mainly western food.",
                        ),
                    ),
                ),
                2=>array(
                    "num"=>"37",
                    "content_id"=>760,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5dcq.mp3',
                    "timeRange"=>"00:40-00:44",
                    "text"=>"What services doesn't the student center provide?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Undergraduate admission.","isCorrect"=>false),
                        "1"=>array("item"=>"Financial aid.", "isCorrect"=>false),
                        "2"=>array("item"=>"Gym registration.", "isCorrect"=>true)
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u5dcq.mp3',
                            "timeRange"=>"00:44-00:53",
                            "text"=>"The student center provides services like financial aid, registration and undergraduate admissions,not including gym registration.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u5dcq.mp3',
                            "timeRange"=>"00:44-00:53",
                            "text"=>"The student center provides services like financial aid, registration and undergraduate admissions,not including gym registration.",
                        ),
                    ),
                )
            )
        );

        $data['events'][] = array(
            "num"=>"38",
            'type'=>"text",
            "timeRange"=>"02:19-02:22",
            "text"=>"Where is the gym?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"39",
            'type'=>"text",
            "timeRange"=>"02:22-02:27",
            "text"=>"The gym is right in the north part of the campus. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"40",
            'type'=>"text",
            "timeRange"=>"02:27-02:30",
            "text"=>"Let's go and see it.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"41",
            'type'=>"text",
            "timeRange"=>"02:30-02:35",
            "text"=>"This is the third floor school gym. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"42",
            'type'=>"text",
            "timeRange"=>"02:35-02:42",
            "text"=>"There, opposite the reception desk, is the locker room with a bathroom inside it. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"43",
            'type'=>"text",
            "timeRange"=>"02:42-02:47",
            "text"=>"Over there is a door leading into the swimming pool.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"44",
            'type'=>"text",
            "timeRange"=>"02:47-02:52",
            "text"=>"Well, the swimming pool is great.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"45",
            'type'=>"text",
            "timeRange"=>"02:52-02:56",
            "text"=>"I enjoy swimming so much.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"46",
            'type'=>"text",
            "timeRange"=>"02:56-03:00",
            "text"=>"Let's go to the second floor.",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"47",
            'type'=>"multipleChoices",
            "timeRange"=>"",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"48",
                    "content_id"=>761,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5dcq.mp3',
                    "timeRange"=>"00:53-00:55",
                    "text"=>"Where is the gym?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"In the south of the campus.","isCorrect"=>false),
                        "1"=>array("item"=>"In the north of the campus.", "isCorrect"=>true),
                        "2"=>array("item"=>"In the west of the campus.", "isCorrect"=>false)
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u5d.mp3',
                            "timeRange"=>"02:22-02:30",
                            "text"=>"The gym is right in the north part of the campus. Let's go and see it. ",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u5d.mp3',
                            "timeRange"=>"02:22-02:30",
                            "text"=>"The gym is right in the north part of the campus. Let's go and see it. ",
                        ),
                    ),
                ),
                1=>array(
                    "num"=>"49",
                    "content_id"=>762,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5dcq.mp3',
                    "timeRange"=>"00:55-00:57",
                    "text"=>"Where is the swimming pool?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"On the first floor of the gym.","isCorrect"=>true),
                        "1"=>array("item"=>"On the second floor of the gym.", "isCorrect"=>false),
                        "2"=>array("item"=>"On the third floor of the gym.", "isCorrect"=>false)
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u5dcq.mp3',
                            "timeRange"=>"00:57-01:01",
                            "text"=>"The swimming pool is on the first floor of the gym.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u5dcq.mp3',
                            "timeRange"=>"00:57-01:01",
                            "text"=>"The swimming pool is on the first floor of the gym.",
                        ),
                    ),
                ),
                2=>array(
                    "num"=>"50",
                    "content_id"=>763,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5dcq.mp3',
                    "timeRange"=>"01:01-01:03",
                    "text"=>"Where is the locker room?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Inside the bathroom.","isCorrect"=>false),
                        "1"=>array("item"=>"Opposite the reception desk.", "isCorrect"=>true),
                        "2"=>array("item"=>"Next to the swimming pool.", "isCorrect"=>false)
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u5d.mp3',
                            "timeRange"=>"02:35-02:42",
                            "text"=>"There, opposite the reception desk, is the locker room with a bathroom inside it.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u5d.mp3',
                            "timeRange"=>"02:35-02:42",
                            "text"=>"There, opposite the reception desk, is the locker room with a bathroom inside it.",
                        ),
                    ),
                )
            )
        );

        $data['events'][] = array(
            "num"=>"51",
            'type'=>"text",
            "timeRange"=>"03:00-03:05",
            "text"=>"See, here is the full-sized basketball court.",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"52",
            'type'=>"text",
            "timeRange"=>"03:05-03:11",
            "text"=>"And opposite over there, is a full-sized volleyball court. ",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"53",
            'type'=>"text",
            "timeRange"=>"03:11-03:16",
            "text"=>"I often do jogging around the court after school.",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"54",
            'type'=>"multipleChoices",
            "timeRange"=>"",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"55",
                    "content_id"=>764,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5dcq.mp3',
                    "timeRange"=>"01:03-01:06",
                    "text"=>"What court doesn't the gym have?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"A full-sized basketball court.","isCorrect"=>false),
                        "1"=>array("item"=>"A full-sized football court.", "isCorrect"=>true),
                        "2"=>array("item"=>"A full-sized volleyball court.", "isCorrect"=>false)
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u5dcq.mp3',
                            "timeRange"=>"01:06-01:12",
                            "text"=>"The gym has a full-sized basketball court and a volleyball court. It has no football court.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u5dcq.mp3',
                            "timeRange"=>"01:06-01:12",
                            "text"=>"The gym has a full-sized basketball court and a volleyball court. It has no football court.",
                        ),
                    ),
                ),
                1=>array(
                    "num"=>"56",
                    "content_id"=>765,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5dcq.mp3',
                    "timeRange"=>"01:12-01:15",
                    "text"=>"What does Bill often do in the gym?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"He often swims during summer vacation.","isCorrect"=>false),
                        "1"=>array("item"=>"He often plays basketball here.", "isCorrect"=>false),
                        "2"=>array("item"=>"He often runs around the court.", "isCorrect"=>true)
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u5dcq.mp3',
                            "timeRange"=>"01:15-01:19",
                            "text"=>"Bill often does jogging around the court after school.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u5dcq.mp3',
                            "timeRange"=>"01:15-01:19",
                            "text"=>"Bill often does jogging around the court after school.",
                        ),
                    ),
                )
            )
        );

        $data['events'][] = array(
            "num"=>"57",
            'type'=>"text",
            "timeRange"=>"03:16-03:20",
            "text"=>"What is on the third floor?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"58",
            'type'=>"text",
            "timeRange"=>"03:20-03:24",
            "text"=>"The fitness room is on the third floor.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"59",
            'type'=>"text",
            "timeRange"=>"03:24-03:28",
            "text"=>"You can do many exercises there.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"60",
            'type'=>"text",
            "timeRange"=>"03:28-03:33",
            "text"=>"Some students work part time there as coaches.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"61",
            'type'=>"text",
            "timeRange"=>"03:33-03:38",
            "text"=>"Don't you have an outdoor playground here?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"62",
            'type'=>"text",
            "timeRange"=>"03:38-03:42",
            "text"=>"Yes, but not here at the gym.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"63",
            'type'=>"text",
            "timeRange"=>"03:42-03:47",
            "text"=>"The playground is in front of the dormitory.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"64",
            'type'=>"text",
            "timeRange"=>"03:47-03:51",
            "text"=>"Do you have to pay here?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"65",
            'type'=>"text",
            "timeRange"=>"03:51-03:58",
            "text"=>"No. As a matter of fact, our tuition covers the fee for the gym.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"66",
            'type'=>"text",
            "timeRange"=>"03:58-04:03",
            "text"=>"You just use your student ID card for entrance.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"67",
            'type'=>"text",
            "timeRange"=>"04:03-04:06",
            "text"=>"I see.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"68",
            'type'=>"text",
            "timeRange"=>"04:06-04:10",
            "text"=>"Well, it's time for lunch.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"69",
            'type'=>"text",
            "timeRange"=>"04:10-04:15",
            "text"=>"How about going downtown to try some local cuisines?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"70",
            'type'=>"text",
            "timeRange"=>"04:15-04:17",
            "text"=>"Why not?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"71",
            'type'=>"text",
            "timeRange"=>"04:17-04:19",
            "text"=>"Let's go.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"72",
            'type'=>"multipleChoices",
            "timeRange"=>"",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"73",
                    "content_id"=>766,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5dcq.mp3',
                    "timeRange"=>"01:19-01:21",
                    "text"=>"What is on the third floor?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"The fitness room.","isCorrect"=>true),
                        "1"=>array("item"=>"The locker room.", "isCorrect"=>false),
                        "2"=>array("item"=>"The basketball court.", "isCorrect"=>false)
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u5d.mp3',
                            "timeRange"=>"03:20-03:24",
                            "text"=>"The fitness room is on the third floor.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u5d.mp3',
                            "timeRange"=>"03:20-03:24",
                            "text"=>"The fitness room is on the third floor.",
                        ),
                    ),
                ),
                1=>array(
                    "num"=>"74",
                    "content_id"=>767,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5dcq.mp3',
                    "timeRange"=>"01:21-01:24",
                    "text"=>"Does the gym have an outdoor playground?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Yes.","isCorrect"=>false),
                        "1"=>array("item"=>"No.", "isCorrect"=>true)
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u5dcq.mp3',
                            "timeRange"=>"01:24-01:28",
                            "text"=>"No, it doesn't. The playground is in front of the dormitory.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u5dcq.mp3',
                            "timeRange"=>"01:24-01:28",
                            "text"=>"No, it doesn't. The playground is in front of the dormitory.",
                        ),
                    ),
                ),
                2=>array(
                    "num"=>"75",
                    "content_id"=>768,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5dcq.mp3',
                    "timeRange"=>"01:32-01:35",
                    "text"=>"Will Bill and Linda have lunch together?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Yes.","isCorrect"=>true),
                        "1"=>array("item"=>"No.", "isCorrect"=>false)
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u5dcq.mp3',
                            "timeRange"=>"01:35-01:37",
                            "text"=>"Yes, they will have lunch together.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u5dcq.mp3',
                            "timeRange"=>"01:35-01:37",
                            "text"=>"Yes, they will have lunch together.",
                        ),
                    ),
                )
            )
        );

         $this->saveEventListToDatabases($data);$a =  json_encode($data);
        $fp = fopen('json102.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
        return;
    }



    public function getPart103()
    {
        $data = array(
            "unit_id"       =>5,
            "lesson_id"     =>29,
            "part_id"       =>103,
            "media_filename"=>'media/u5d.mp4',
            "media_type"    =>'video',
            "totalTime"     =>"4:05",
            "part_type"     =>"dialog",
            "have_questions"=>false,
            "questions_type"=>"text",
            "keywords"      =>array(
                "campus",
                "independent",
                "impressive",
                "major",
                "hospitality",
                "registration",
                "undergraduate admission",
                "gym",
                "reception desk",
                "locker room",
                "court",
                "fitness room",
                "cuisine"
            ),
        );

        $data['events'][] = array(
            "num"=>"1",
            'type'=>"text",
            "timeRange"=>"00:00-00:08",
            "text"=>"This is Bill's university, the Western University, which is located in the middle of the country.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"2",
            'type'=>"text",
            "timeRange"=>"00:08-00:15",
            "text"=>"Bill's high school classmate Linda comes to visit him during the spring break.",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"3",
            'type'=>"text",
            "timeRange"=>"00:15-00:19",
            "text"=>"They meet in front of Bill's dormitory.",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"4",
            'type'=>"text",
            "timeRange"=>"00:19-00:24",
            "text"=>"Hi, Linda. Welcome to my university.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"5",
            'type'=>"sr_reading",
            "content_id"=>769,
            "scores"=>1,
            "timeRange"=>"00:24-00:29",
            "text"=>"Well, what a beautiful campus! ",
            "answer"=>"Well what a beautiful campus",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"6",
            'type'=>"text",
            "timeRange"=>"00:29-00:33",
            "text"=>"It looks like a garden.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"7",
            'type'=>"text",
            "timeRange"=>"00:33-00:36",
            "text"=>"Of course.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"8",
            'type'=>"sr_reading",
            "content_id"=>770,
            "scores"=>1,
            "timeRange"=>"00:36-00:39",
            "text"=>"Let me show you around.",
            "answer"=>"Let me show you around",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"9",
            'type'=>"text",
            "timeRange"=>"00:39-00:49",
            "text"=>"We have three schools on the campus, including the management school, the electronic engineering school, and the tourism school.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"10",
            'type'=>"text",
            "timeRange"=>"00:49-00:56",
            "text"=>"Each school has an independent building with its own library and computer lab.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"11",
            'type'=>"sr_reading",
            "content_id"=>771,
            "scores"=>1,
            "timeRange"=>"00:56-01:02",
            "text"=>"I've heard that there is a famous café at the tourism school.",
            "answer"=>"I've heard that there is a famous café at the tourism school",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"12",
            'type'=>"sr_reading",
            "content_id"=>772,
            "scores"=>1,
            "timeRange"=>"01:02-01:05",
            "text"=>"Can we go and have a look?",
            "answer"=>"Can we go and have a look",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"13",
            'type'=>"text",
            "timeRange"=>"01:05-01:07",
            "text"=>"Sure.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"14",
            'type'=>"text",
            "timeRange"=>"01:07-01:10",
            "text"=>"Here we are.",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"15",
            'type'=>"text",
            "timeRange"=>"01:10-01:14",
            "text"=>"This is the tourism school.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"16",
            'type'=>"text",
            "timeRange"=>"01:14-01:19",
            "text"=>"The café is right on the first floor, over there.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"17",
            'type'=>"text",
            "timeRange"=>"01:19-01:25",
            "text"=>"All the classrooms are on the second floor and the library is on the third floor.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"18",
            'type'=>"text",
            "timeRange"=>"01:25-01:29",
            "text"=>"The dean's office is on the first floor too. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"19",
            'type'=>"text",
            "timeRange"=>"01:29-01:33",
            "text"=>"The computer lab is next to the café.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"20",
            'type'=>"sr_reading",
            "content_id"=>773,
            "scores"=>1,
            "timeRange"=>"01:33-01:39",
            "text"=>"Oh, the café is certainly very impressive.",
            "answer"=>"Oh the café is certainly very impressive",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"21",
            'type'=>"text",
            "timeRange"=>"01:39-01:47",
            "text"=>"Yes. All the students that majored in hospitality practice cooking and servicing here in the café. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"22",
            'type'=>"text",
            "timeRange"=>"01:47-01:51",
            "text"=>"There is a large kitchen back there.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"23",
            'type'=>"text",
            "timeRange"=>"01:51-01:58",
            "text"=>"There are altogether thirty tables and it serves mainly western food.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"24",
            'type'=>"sr_reading",
            "content_id"=>774,
            "scores"=>1,
            "timeRange"=>"01:58-02:04",
            "text"=>"What's the building across the lawn over there in the east?",
            "answer"=>"What's the building across the lawn over there in the east",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"25",
            'type'=>"text",
            "timeRange"=>"02:04-02:08",
            "text"=>"Oh, that is the student center.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"26",
            'type'=>"text",
            "timeRange"=>"02:08-02:19",
            "text"=>"All the offices of student services are there, such as the financial aid, registration and undergraduate admissions.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"27",
            'type'=>"text",
            "timeRange"=>"02:19-02:22",
            "text"=>"Where is the gym?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"28",
            'type'=>"sr_reading",
            "content_id"=>775,
            "scores"=>1,
            "timeRange"=>"02:22-02:27",
            "text"=>"The gym is right in the north part of the campus. ",
            "answer"=>"The gym is right in the north part of the campus",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"29",
            'type'=>"text",
            "timeRange"=>"02:27-02:30",
            "text"=>"Let's go and see it.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"30",
            'type'=>"text",
            "timeRange"=>"02:30-02:35",
            "text"=>"This is the third floor school gym. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"31",
            'type'=>"sr_reading",
            "content_id"=>776,
            "scores"=>1,
            "timeRange"=>"02:35-02:42",
            "text"=>"There, opposite the reception desk, is the locker room with a bathroom inside it. ",
            "answer"=>"There opposite the reception desk is the locker room with a bathroom inside it.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"32",
            'type'=>"text",
            "timeRange"=>"02:42-02:47",
            "text"=>"Over there is a door leading into the swimming pool.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"33",
            'type'=>"text",
            "timeRange"=>"02:47-02:52",
            "text"=>"Well, the swimming pool is great.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"34",
            'type'=>"sr_reading",
            "content_id"=>777,
            "scores"=>1,
            "timeRange"=>"02:52-02:56",
            "text"=>"I enjoy swimming so much.",
            "answer"=>"I enjoy swimming so much",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"35",
            'type'=>"text",
            "timeRange"=>"02:56-03:00",
            "text"=>"Let's go to the second floor.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"36",
            'type'=>"text",
            "timeRange"=>"03:00-03:05",
            "text"=>"See, here is the full-sized basketball court.",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"37",
            'type'=>"text",
            "timeRange"=>"03:05-03:11",
            "text"=>"And opposite over there, is a full-sized volleyball court. ",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"38",
            'type'=>"sr_reading",
            "content_id"=>778,
            "scores"=>1,
            "timeRange"=>"03:11-03:16",
            "text"=>"I often do jogging around the court after school.",
            "answer"=>"I often do jogging around the court after school",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"39",
            'type'=>"text",
            "timeRange"=>"03:16-03:20",
            "text"=>"What is on the third floor?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"40",
            'type'=>"text",
            "timeRange"=>"03:20-03:24",
            "text"=>"The fitness room is on the third floor.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"41",
            'type'=>"text",
            "timeRange"=>"03:24-03:28",
            "text"=>"You can do many exercises there.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"42",
            'type'=>"text",
            "timeRange"=>"03:28-03:33",
            "text"=>"Some students work part time there as coaches.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"43",
            'type'=>"text",
            "timeRange"=>"03:33-03:38",
            "text"=>"Don't you have an outdoor playground here?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"44",
            'type'=>"text",
            "timeRange"=>"03:38-03:42",
            "text"=>"Yes, but not here at the gym.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"45",
            'type'=>"sr_reading",
            "content_id"=>779,
            "scores"=>1,
            "timeRange"=>"03:42-03:47",
            "text"=>"The playground is in front of the dormitory.",
            "answer"=>"The playground is in front of the dormitory",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"46",
            'type'=>"text",
            "timeRange"=>"03:47-03:51",
            "text"=>"Do you have to pay here?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"47",
            'type'=>"sr_reading",
            "content_id"=>780,
            "scores"=>1,
            "timeRange"=>"03:51-03:58",
            "text"=>"No. As a matter of fact, our tuition covers the fee for the gym.",
            "answer"=>"No As a matter of fact our tuition covers the fee for the gym",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"48",
            'type'=>"text",
            "timeRange"=>"03:58-04:03",
            "text"=>"You just use your student ID card for entrance.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"49",
            'type'=>"text",
            "timeRange"=>"04:03-04:06",
            "text"=>"I see.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"50",
            'type'=>"text",
            "timeRange"=>"04:06-04:10",
            "text"=>"Well, it's time for lunch.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"51",
            'type'=>"sr_reading",
            "content_id"=>781,
            "scores"=>1,
            "timeRange"=>"04:10-04:15",
            "text"=>"How about going downtown to try some local cuisines?",
            "answer"=>"How about going downtown to try some local cuisines",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"52",
            'type'=>"text",
            "timeRange"=>"04:15-04:17",
            "text"=>"Why not?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"53",
            'type'=>"text",
            "timeRange"=>"04:17-04:19",
            "text"=>"Let's go.",
            "picture"=>""
        );
        $this->saveEventListToDatabases($data);
        $a = json_encode($data);
        $fp = fopen('json103.txt', "w");
        fwrite($fp, $a);
        fclose($fp);
        return;
    }


    public function getPart104(){
        $dataT = array(
            "unit_id"       =>5,
            "lesson_id"     =>30,
            "part_id"       =>104,
            "media_filename"=>'media/u5ps.mp3',
            "media_type"    =>'audio',
            "totalTime"     =>"1:34",
            "part_type"     =>"summary",
            "have_questions"=>true,
            "questions_type"=>"sr",
            "keywords"      =>array(
                "basement",
                "garage",
                "balcony",
                "study",
                "luxurious",
                "hang",
                "shower",
                "lawn",
                "backyard"
            ),
        );
        $data['events'][] = array(
            "num"=>"1",
            'type'=>"text",
            "timeRange"=>"00:00-00:06",
            "text"=>"Linda's home is a two-story building with a basement and a garage. ",
            "picture"=>"images/u5_ps_002.png"
        );
        $data['events'][] = array(
            "num"=>"2",
            'type'=>"text",
            "timeRange"=>"00:06-00:12",
            "text"=>"There are five rooms on the first floor, including the living room. ",
            "picture"=>"images/u5_ps_003.png"
        );
        $data['events'][] = array(
            "num"=>"3",
            'type'=>"text",
            "timeRange"=>"00:12-00:16",
            "text"=>"A balcony is connected to the living room.",
            "picture"=>"images/u5_ps_003.png"
        );

        $data['events'][] = array(
            "num"=>"4",
            'type'=>"text",
            "timeRange"=>"00:16-00:21",
            "text"=>"The dining room has a table with four chairs. ",
            "picture"=>"images/u5_ps_004.png"
        );
        $data['events'][] = array(
            "num"=>"5",
            'type'=>"text",
            "timeRange"=>"00:21-00:27",
            "text"=>"The living room has a television, a large sofa, and a fireplace. ",
            "picture"=>"images/u5_ps_004.png"
        );
        $data['events'][] = array(
            "num"=>"6",
            'type'=>"text",
            "timeRange"=>"00:27-00:31",
            "text"=>"In the study, there is a bookcase.",
            "picture"=>"images/u5_ps_005.png"
        );
        $data['events'][] = array(
            "num"=>"7",
            'type'=>"text",
            "timeRange"=>"00:31-00:36",
            "text"=>"The kitchen is not luxurious but well furnished. ",
            "picture"=>"images/u5_ps_006.png"
        );
        $data['events'][] = array(
            "num"=>"8",
            'type'=>"text",
            "timeRange"=>"00:36-00:41",
            "text"=>"A refrigerator stands on the left-hand side of the door. ",
            "picture"=>"images/u5_ps_006.png"
        );
        $data['events'][] = array(
            "num"=>"9",
            'type'=>"text",
            "timeRange"=>"00:41-00:45",
            "text"=>"All the cooking ware is hung on the wall.",
            "picture"=>"images/u5_ps_006.png"
        );
        $data['events'][] = array(
            "num"=>"10",
            'type'=>"text",
            "timeRange"=>"00:45-00:49",
            "text"=>"All the table ware is kept in a cabinet.",
            "picture"=>"images/u5_ps_006.png"
        );
        $data['events'][] = array(
            "num"=>"11",
            'type'=>"text",
            "timeRange"=>"00:49-00:53",
            "text"=>"The bathroom has both a shower and a tub. ",
            "picture"=>"images/u5_ps_007.png"
        );
        $data['events'][] = array(
            "num"=>"12",
            'type'=>"text",
            "timeRange"=>"00:53-00:58",
            "text"=>"Everything in the bathroom is neat and in its place.",
            "picture"=>"images/u5_ps_007.png"
        );
        $data['events'][] = array(
            "num"=>"13",
            'type'=>"text",
            "timeRange"=>"00:58-01:05",
            "text"=>"There are 3 bedrooms on the second floor, two for her family and one for guests. ",
            "picture"=>"images/u5_ps_008.png"
        );
        $data['events'][] = array(
            "num"=>"14",
            'type'=>"text",
            "timeRange"=>"01:05-01:09",
            "text"=>"In front of the house there's a beautiful lawn. ",
            "picture"=>"images/u5_ps_009.png"
        );
        $data['events'][] = array(
            "num"=>"15",
            'type'=>"text",
            "timeRange"=>"01:09-01:15",
            "text"=>"At the back is a backyard full of vegetables and fruit trees. ",
            "picture"=>"images/u5_ps_010.png"
        );

        $data['events'][] = array(
            "num"=>"1",
            "content_id"=>782,
            'type'=>"sr_readings",
            "timeRange"=>array("00:00-00:06","00:04-00:11","00:09-00:15"),
            "scores"=>1,
            "text"=>array("Linda's home is a two-story building with a basement and a garage.","There are five rooms on the first floor, including the living room.","A balcony is connected to the living room."),
            "answer"=>array("Linda's home is a two-story building with a basement and a garage","There are five rooms on the first floor including the living room","A balcony is connected to the living room"),
            "pictures"=> array("images/u5_ps_010.png","images/u5_ps_010.png","images/u5_ps_010.png"),
            "picture"=>"images/u5_ps_010.png"
        );
        $data['events'][] = array(
            "num"=>"2",
            "content_id"=>783,
            'type'=>"sr_readings",
            "timeRange"=>array("00:13-00:24","00:21-00:25","00:25-00:32"),
            "scores"=>1,
            "text"=>array("The dining room has a table with four chairs. ","The living room has a television, a large sofa, and a fireplace. ","In the study, there is a bookcase. "),
            "answer"=>array("The dining room has a table with four chairs","The living room has a television a large sofa, and a fireplace","In the study there is a bookcase"),
            "pictures"=> array("images/u5_ps_010.png","images/u5_ps_010.png","images/u5_ps_010.png"),
            "picture"=>"images/u5_ps_010.png"
        );

        $data['events'][] = array(
            "num"=>"3",
            "content_id"=>784,
            'type'=>"sr_readings",
            "timeRange"=>array("00:32-00:38","00:38-00:45","00:45-00:49"),
            "scores"=>1,
            "text"=>array("The kitchen is not luxurious but well furnished.","A refrigerator stands on the left-hand side of the door.","All the cooking ware is hung on the wall. "),
            "answer"=>array("The kitchen is not luxurious but well furnished","A refrigerator stands on the left-hand side of the door","All the cooking ware is hung on the wall"),
            "picture"=>"images/u5_ps_010.png",
            "pictures"=>array("images/u5_ps_010.png","images/u5_ps_010.png","images/u5_ps_010.png")
        );

        $data['events'][] = array(
            "num"=>"4",
            "content_id"=>785,
            'type'=>"sr_readings",
            "timeRange"=>array("00:49-00:54","00:54-00:58","00:58-01:02","00:58-01:02"),
            "scores"=>1,
            "picture"=>"images/u5_ps_010.png",
            "text"=>array("All the table ware is kept in a cabinet.","The bathroom has both a shower and a tub.","Everything in the bathroom is neat and in its place."),
            "answer"=>array("All the table ware is kept in a cabinet","The bathroom has both a shower and a tub","Everything in the bathroom is neat and in its place"),
            "pictures"=>array("images/u5_ps_010.png","images/u5_ps_010.png","images/u5_ps_010.png")

        );
        $data['events'][] = array(
            "num"=>"5",
            "content_id"=>786,
            'type'=>"sr_readings",
            "timeRange"=>array("00:49-00:54","00:54-00:58","00:58-01:02","00:58-01:02"),
            "scores"=>1,
            "picture"=>"images/u5_ps_010.png",
            "text"=>array("There are 3 bedrooms on the second floor, two for her family and one for guests.","In front of the house there's a beautiful lawn.","At the back is a backyard full of vegetables and fruit trees."),
            "answer"=>array("There are 3 bedrooms on the second floor two for her family and one for guests","In front of the house there's a beautiful lawn.","At the back is a backyard full of vegetables and fruit trees."),
            "pictures"=>array("images/u5_ps_010.png","images/u5_ps_010.png","images/u5_ps_010.png","images/u5_ps_010.png")

        );
        $database = array_merge($dataT,$data);
        //$database = array_merge($database,$data1);

        //exit;
        $this->saveEventListToDatabases($database);
       // $dataT['eventLists'] = array($data,$data1);
        $a =  json_encode($dataT);
        $fp = fopen('json104.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
        return;
    }


    public function getPart105(){
        $data = array(
            "unit_id"       =>5,
            "lesson_id"     =>30,
            "part_id"       =>105,
            "media_filename"=>'media/u5p.mp3',
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
            "content_id"=>787,
            'type'=>"sr_reading",
            "timeRange"=>"00:14-00:22",
            "scores"=>1,
            "text"=>"The house is a two-story building with a basement and a garage.",
            "answer"=>"The house is a two-story building with a basement and a garage",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5p.mp3',
                    "timeRange"=>"00:14-00:22",
                    "text"=>"The house is a two-story building with a basement and a garage.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5p.mp3',
                    "timeRange"=>"00:14-00:22",
                    "text"=>"The house is a two-story building with a basement and a garage.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"2",
            "content_id"=>788,
            'type'=>"sr_reading",
            "timeRange"=>"00:43-00:54",
            "scores"=>1,
            "text"=>"There are five rooms on the first floor, including a living room, a dining room, a study, a kitchen, and a bathroom.",
            "answer"=>"There are five rooms on the first floor including a living room a dining room a study a kitchen and a bathroom",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5p.mp3',
                    "timeRange"=>"00:43-00:54",
                    "text"=>"There are five rooms on the first floor, including a living room, a dining room, a study, a kitchen, and a bathroom.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5p.mp3',
                    "timeRange"=>"00:43-00:54",
                    "text"=>"There are five rooms on the first floor, including a living room, a dining room, a study, a kitchen, and a bathroom.",
                    ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"3",
            "content_id"=>789,
            'type'=>"sr_reading",
            "timeRange"=>"00:54-01:02",
            "scores"=>1,
            "text"=>"In the middle of the dining room is an oval table with four chairs around it.",
            "answer"=>"In the middle of the dining room is an oval table with four chairs around it",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5p.mp3',
                    "timeRange"=>"00:54-01:02",
                    "text"=>"In the middle of the dining room is an oval table with four chairs around it.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5p.mp3',
                    "timeRange"=>"00:54-01:02",
                    "text"=>"In the middle of the dining room is an oval table with four chairs around it.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"4",
            "content_id"=>790,
            'type'=>"sr_reading",
            "timeRange"=>"01:20-01:27",
            "scores"=>1,
            "text"=>"There's a carpet on the floor in the middle between the television and the sofa.",
            "answer"=>"There's a carpet on the floor in the middle between the television and the sofa",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5p.mp3',
                    "timeRange"=>"01:20-01:27",
                    "text"=>"There's a carpet on the floor in the middle between the television and the sofa. ",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5p.mp3',
                    "timeRange"=>"01:20-01:27",
                    "text"=>"There's a carpet on the floor in the middle between the television and the sofa.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"5",
            "content_id"=>791,
            'type'=>"sr_reading",
            "timeRange"=>"02:04-02:11",
            "scores"=>1,
            "text"=>"There is an electric stove, an electric oven and a microwave oven in the kitchen.",
            "answer"=>"There is an electric stove an electric oven and a microwave oven in the kitchen",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5p.mp3',
                    "timeRange"=>"02:04-02:11",
                    "text"=>"There is an electric stove, an electric oven and a microwave oven in the kitchen.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5p.mp3',
                    "timeRange"=>"02:04-02:11",
                    "text"=>"There is an electric stove, an electric oven and a microwave oven in the kitchen.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"6",
            "content_id"=>792,
            'type'=>"sr_reading",
            "timeRange"=>"02:22-02:32",
            "scores"=>1,
            "text"=>"All the cooking ware, such as pans, pots and other utensils, are hung on the wall above the stove.",
            "answer"=>"All the cooking ware  such as pans pots and other utensils are hung on the wall above the stove",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5p.mp3',
                    "timeRange"=>"02:22-02:32",
                    "text"=>"All the cooking ware, such as pans, pots and other utensils, are hung on the wall above the stove.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5p.mp3',
                    "timeRange"=>"02:22-02:32",
                    "text"=>"All the cooking ware, such as pans, pots and other utensils, are hung on the wall above the stove.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"7",
            "content_id"=>793,
            'type'=>"sr_reading",
            "timeRange"=>"02:32-02:42",
            "scores"=>1,
            "text"=>"All the table ware, such as plates, bowls, and cutlery, are kept in a cabinet opposite the refrigerator.",
            "answer"=>"All the table ware such as plates bowls and cutlery are kept in a cabinet opposite the refrigerator",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5p.mp3',
                    "timeRange"=>"02:32-02:42",
                    "text"=>"All the table ware, such as plates, bowls, and cutlery, are kept in a cabinet opposite the refrigerator.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5p.mp3',
                    "timeRange"=>"02:32-02:42",
                    "text"=>"All the table ware, such as plates, bowls, and cutlery, are kept in a cabinet opposite the refrigerator.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"8",
            "content_id"=>794,
            'type'=>"sr_reading",
            "timeRange"=>"02:52-03:02",
            "scores"=>1,
            "text"=>"The soap, toothbrushes, and lotions are all kept on the shelf on the other side of the sink. ",
            "answer"=>"The soap toothbrushes and lotions are all kept on the shelf on the other side of the sink",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5p.mp3',
                    "timeRange"=>"02:52-03:02",
                    "text"=>"The soap, toothbrushes, and lotions are all kept on the shelf on the other side of the sink. ",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5p.mp3',
                    "timeRange"=>"02:52-03:02",
                    "text"=>"The soap, toothbrushes, and lotions are all kept on the shelf on the other side of the sink. ",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"9",
            "content_id"=>795,
            'type'=>"sr_reading",
            "timeRange"=>"03:12-03:23",
            "scores"=>1,
            "text"=>"There are three bedrooms on the second floor, one for her, another for her parents and the third one for guests.",
            "answer"=>"There are three bedrooms on the second floor one for her another for her parents and the third one for guests.",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5p.mp3',
                    "timeRange"=>"03:12-03:23",
                    "text"=>"There are three bedrooms on the second floor, one for her, another for her parents and the third one for guests.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5p.mp3',
                    "timeRange"=>"03:12-03:23",
                    "text"=>"There are three bedrooms on the second floor, one for her, another for her parents and the third one for guests.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"10",
            "content_id"=>796,
            'type'=>"sr_reading",
            "timeRange"=>"03:38-03:53",
            "scores"=>1,
            "text"=>"At the back of the house they have a backyard, where they plant all kinds of vegetables and fruit trees, including tomatoes, cabbages, pears and apples. ",
            "answer"=>"At the back of the house they have a backyard where they plant all kinds of vegetables and fruit trees including tomatoes cabbages pears and apples",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5p.mp3',
                    "timeRange"=>"03:38-03:53",
                    "text"=>"At the back of the house they have a backyard, where they plant all kinds of vegetables and fruit trees, including tomatoes, cabbages, pears and apples. ",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5p.mp3',
                    "timeRange"=>"03:38-03:53",
                    "text"=>"At the back of the house they have a backyard, where they plant all kinds of vegetables and fruit trees, including tomatoes, cabbages, pears and apples. ",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"11",
            "content_id"=>797,
            'type'=>"sr_reading",
            "timeRange"=>"00:39-00:49",
            "scores"=>1,
            "text"=>"We have three schools on the campus, including the management school, the electronic engineering school, and the tourism school.",
            "answer"=>"We have three schools on the campus including the management school the electronic engineering school and the tourism school",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5d.mp3',
                    "timeRange"=>"00:39-00:49",
                    "text"=>"We have three schools on the campus, including the management school, the electronic engineering school, and the tourism school.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5d.mp3',
                    "timeRange"=>"00:39-00:49",
                    "text"=>"We have three schools on the campus, including the management school, the electronic engineering school, and the tourism school.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"12",
            "content_id"=>798,
            'type'=>"sr_reading",
            "timeRange"=>"00:56-01:02",
            "scores"=>1,
            "text"=>"I've heard that there is a famous café at the tourism school. ",
            "answer"=>"I've heard that there is a famous café at the tourism school",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5d.mp3',
                    "timeRange"=>"00:56-01:02",
                    "text"=>"I've heard that there is a famous café at the tourism school. ",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5d.mp3',
                    "timeRange"=>"00:56-01:02",
                    "text"=>"I've heard that there is a famous café at the tourism school. ",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"13",
            "content_id"=>799,
            'type'=>"sr_reading",
            "timeRange"=>"01:25-01:29",
            "scores"=>1,
            "text"=>"The dean's office is on the first floor too.",
            "answer"=>"The dean's office is on the first floor too",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5d.mp3',
                    "timeRange"=>"01:25-01:29",
                    "text"=>"The dean's office is on the first floor too.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5d.mp3',
                    "timeRange"=>"01:25-01:29",
                    "text"=>"The dean's office is on the first floor too.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"14",
            "content_id"=>800,
            'type'=>"sr_reading",
            "timeRange"=>"01:39-01:47",
            "scores"=>1,
            "text"=>"Yes. All the students that majored in hospitality practice cooking and servicing here in the café.",
            "answer"=>"Yes All the students that majored in hospitality practice cooking and servicing here in the café",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5d.mp3',
                    "timeRange"=>"01:39-01:47",
                    "text"=>"Yes. All the students that majored in hospitality practice cooking and servicing here in the café.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5d.mp3',
                    "timeRange"=>"01:39-01:47",
                    "text"=>"Yes. All the students that majored in hospitality practice cooking and servicing here in the café.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"15",
            "content_id"=>801,
            'type'=>"sr_reading",
            "timeRange"=>"01:51-01:58",
            "scores"=>1,
            "text"=>"There are altogether thirty tables and it serves mainly western food.",
            "answer"=>"There are altogether thirty tables and it serves mainly western food",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5d.mp3',
                    "timeRange"=>"01:51-01:58",
                    "text"=>"There are altogether thirty tables and it serves mainly western food.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5d.mp3',
                    "timeRange"=>"01:51-01:58",
                    "text"=>"There are altogether thirty tables and it serves mainly western food.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"16",
            "content_id"=>802,
            'type'=>"sr_reading",
            "timeRange"=>"02:08-02:19",
            "scores"=>1,
            "text"=>"All the offices of student services are there, such as the financial aid, registration and undergraduate admissions.",
            "answer"=>"All the offices of student services are there such as the financial aid registration and undergraduate admissions",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5d.mp3',
                    "timeRange"=>"02:08-02:19",
                    "text"=>"All the offices of student services are there, such as the financial aid, registration and undergraduate admissions.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5d.mp3',
                    "timeRange"=>"02:08-02:19",
                    "text"=>"All the offices of student services are there, such as the financial aid, registration and undergraduate admissions.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"17",
            "content_id"=>803,
            'type'=>"sr_reading",
            "timeRange"=>"02:35-02:42",
            "scores"=>1,
            "text"=>"There, opposite the reception desk, is the locker room with a bathroom inside it. ",
            "answer"=>"There opposite the reception desk is the locker room with a bathroom inside it",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5d.mp3',
                    "timeRange"=>"02:35-02:42",
                    "text"=>"There, opposite the reception desk, is the locker room with a bathroom inside it. ",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5d.mp3',
                    "timeRange"=>"02:35-02:42",
                    "text"=>"There, opposite the reception desk, is the locker room with a bathroom inside it. ",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"18",
            "content_id"=>804,
            'type'=>"sr_reading",
            "timeRange"=>"03:05-03:11",
            "scores"=>1,
            "text"=>"And opposite over there, is a full-sized volleyball court. ",
            "answer"=>"And opposite over there is a full sized volleyball court",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5d.mp3',
                    "timeRange"=>"03:05-03:11",
                    "text"=>"And opposite over there, is a full-sized volleyball court. ",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5d.mp3',
                    "timeRange"=>"03:05-03:11",
                    "text"=>"And opposite over there, is a full-sized volleyball court. ",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"19",
            "content_id"=>805,
            'type'=>"sr_reading",
            "timeRange"=>"03:51-03:58",
            "scores"=>1,
            "text"=>"No. As a matter of fact, our tuition covers the fee for the gym.",
            "answer"=>"No As a matter of fact our tuition covers the fee for the gym",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5d.mp3',
                    "timeRange"=>"03:51-03:58",
                    "text"=>"No. As a matter of fact, our tuition covers the fee for the gym.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5d.mp3',
                    "timeRange"=>"03:51-03:58",
                    "text"=>"No. As a matter of fact, our tuition covers the fee for the gym.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"20",
            "content_id"=>806,
            'type'=>"sr_reading",
            "timeRange"=>"04:06-04:10",
            "scores"=>1,
            "text"=>"Well, it's time for lunch.",
            "answer"=>"Well it's time for lunch",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5d.mp3',
                    "timeRange"=>"04:06-04:10",
                    "text"=>"Well, it's time for lunch. ",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5d.mp3',
                    "timeRange"=>"04:06-04:10",
                    "text"=>"Well, it's time for lunch. ",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
         $this->saveEventListToDatabases($data);$a =  json_encode($data);
        $fp = fopen('json105.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
        return;
    }


    public function getPart106(){
        $data = array(
            "unit_id"       =>5,
            "lesson_id"     =>30,
            "part_id"       =>106,
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
            "content_id"=>807,
            "media_filename"=>'media/u5p.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_conjunction_clause",
            "timeRange"     =>"00:07-00:14",
            "scores"=>1,
            "text"=>"She doesn't live in a dormitory because her college is close to her home.",
            "answer" =>"She doesn't live in a dormitory because her college is close to her home",
            "items"=>array("doesn't live in a dormitory","She","is close to her home.","her college","because"),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5p.mp3',
                    "timeRange"     =>"00:07-00:14",
                    "text"=>"She doesn't live in a dormitory because her college is close to her home.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5p.mp3',
                    "timeRange"     =>"00:07-00:14",
                    "text"=>"She doesn't live in a dormitory because her college is close to her home.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"2",
            "content_id"=>808,
            "media_filename"=>'media/u5p.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_conjunction_clause",
            "timeRange"     =>"01:06-01:15",
            "scores"=>1,
            "answer"=>"Entering the living room you will see a web television hanging on the wall and a sofa opposite it",
            "text" => "Entering the living room you will see a web television hanging on the wall and a sofa opposite it.",
            "items"=>array("you will see a web television","and a sofa opposite it.","hanging on the wall","Entering the living room"),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5p.mp3',
                    "timeRange"     =>"01:06-01:15",
                    "text" => "Entering the living room you will see a web television hanging on the wall and a sofa opposite it.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5p.mp3',
                    "timeRange"     =>"01:06-01:15",
                    "text" => "Entering the living room you will see a web television hanging on the wall and a sofa opposite it.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"3",
            "content_id"=>809,
            "media_filename"=>'media/u5p.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_conjunction_clause",
            "timeRange"     =>"01:32-01:40",
            "scores"=>1,
            "answer"=>"The study is Linda's favorite room, where no one can disturb her",
            "text" => "The study is Linda's favorite room, where no one can disturb her.",
            "items"=>array("where","The study","no one can disturb her.","is Linda's favorite room"),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5p.mp3',
                    "timeRange"     =>"01:32-01:40",
                    "text" => "The study is Linda's favorite room, where no one can disturb her.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5p.mp3',
                    "timeRange"     =>"01:32-01:40",
                    "text" => "The study is Linda's favorite room, where no one can disturb her.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"4",
            "content_id"=>810,
            "media_filename"=>'media/u5p.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_conjunction_clause",
            "timeRange"     =>"01:58-02:04",
            "scores"=>1,
            "answer"=>"The kitchen is not luxurious but well furnished",
            "text" => "The kitchen is not luxurious but well furnished.",
            "items"=>array("well furnished.","but","is not luxurious","The kitchen"),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5p.mp3',
                    "timeRange"     =>"01:58-02:04",
                    "text" => "The kitchen is not luxurious but well furnished.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5p.mp3',
                    "timeRange"     =>"01:58-02:04",
                    "text" => "The kitchen is not luxurious but well furnished.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"5",
            "content_id"=>811,
            "media_filename"=>'media/u5p.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_conjunction_clause",
            "timeRange"     =>"03:02-03:12",
            "scores"=>1,
            "answer"=>"All the bath towels are folded and placed on the shelf on the wall at the end of the bath tub",
            "text" => "All the bath towels are folded and placed on the shelf on the wall at the end of the bath tub.",
            "items"=>array("All the bath towels"," at the end of the bath tub.","are folded","and placed on the shelf","on the wall"),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5p.mp3',
                    "timeRange"     =>"03:02-03:12",
                    "text" => "All the bath towels are folded and placed on the shelf on the wall at the end of the bath tub.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5p.mp3',
                    "timeRange"     =>"03:02-03:12",
                    "text" => "All the bath towels are folded and placed on the shelf on the wall at the end of the bath tub.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"6",
            "content_id"=>812,
            "media_filename"=>'media/u5p.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_conjunction_clause",
            "timeRange"     =>"03:53-04:00",
            "scores"=>1,
            "answer"=>"That's why her mother's salad is always so fresh and delicious!",
            "text" => "That's why her mother's salad is always so fresh and delicious!",
            "items"=>array("so fresh and delicious!","That's why","is always","her mother's salad"),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5p.mp3',
                    "timeRange"     =>"03:53-04:00",
                    "text" => "That's why her mother's salad is always so fresh and delicious!",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5p.mp3',
                    "timeRange"     =>"03:53-04:00",
                    "text" => "That's why her mother's salad is always so fresh and delicious!",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"7",
            "content_id"=>813,
            "media_filename"=>'media/u5d.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_conjunction_clause",
            "timeRange"     =>"00:49-00:56",
            "scores"=>1,
            "answer"=>"Each school has an independent building with its own library and computer lab",
            "text"=>"Each school has an independent building with its own library and computer lab.",
            "items"=>array("has an independent building","its own library and computer lab.","with","Each school"),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5d.mp3',
                    "timeRange"     =>"00:49-00:56",
                    "text"=>"Each school has an independent building with its own library and computer lab.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5d.mp3',
                    "timeRange"     =>"00:49-00:56",
                    "text"=>"Each school has an independent building with its own library and computer lab.",
                    ),
            ),
            "picture"=>"images/type_speak_001.png"
        );


        $data['events'][] = array(
            "num"=>"8",
            "content_id"=>814,
            "media_filename"=>'media/u5d.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_conjunction_clause",
            "timeRange"     =>"01:19-01:25",
            "scores"=>1,
            "answer"=>"All the classrooms are on the second floor and the library is on the third floor",
            "text" => "All the classrooms are on the second floor and the library is on the third floor. ",
            "items"=>array("is on the third floor.","are on the second floor","All the classrooms","and the library"),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5d.mp3',
                    "timeRange"     =>"01:19-01:25",
                    "text" => "All the classrooms are on the second floor and the library is on the third floor. ",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5d.mp3',
                    "timeRange"     =>"01:19-01:25",
                    "text" => "All the classrooms are on the second floor and the library is on the third floor. ",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"9",
            "content_id"=>815,
            "media_filename"=>'media/u5d.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_conjunction_clause",
            "timeRange"     =>"02:42-02:47",
            "scores"=>1,
            "answer"=>"Over there is a door leading into the swimming pool",
            "text" => "Over there is a door leading into the swimming pool.",
            "items"=>array("leading into","is a door","Over there","the swimming pool."),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5d.mp3',
                    "timeRange"     =>"02:42-02:47",
                    "text" => "Over there is a door leading into the swimming pool.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5d.mp3',
                    "timeRange"     =>"02:42-02:47",
                    "text" => "Over there is a door leading into the swimming pool.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"10",
            "content_id"=>816,
            "media_filename"=>'media/u5d.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_conjunction_clause",
            "timeRange"     =>"04:10-04:15",
            "scores"=>1,
            "answer"=>"How about going downtown to try some local cuisines?",
            "text" => "How about going downtown to try some local cuisines?",
            "items"=>array("some local cuisines?","going downtown","How about","to try"),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5d.mp3',
                    "timeRange"     =>"04:10-04:15",
                    "text" => "How about going downtown to try some local cuisines?",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5d.mp3',
                    "timeRange"     =>"04:10-04:15",
                    "text" => "How about going downtown to try some local cuisines?",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

         $this->saveEventListToDatabases($data);$a =  json_encode($data);
        $fp = fopen('json106.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
        return;
    }

    public function getPart107(){
        $data = array(
            "unit_id"       =>5,
            "lesson_id"     =>30,
            "part_id"       =>107,
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
            "content_id"=>817,
            "media_filename"=>'media/u5p.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"00:22-00:28",
            "scores"=>1,
            "text" => "The house has an outside entrance with some steps.",
            "answer" => "The house has an outside entrance with some steps",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5p.mp3',
                "timeRange"     =>"00:22-00:28",
                "text" => "The house has an outside entrance with some steps.",
            ),
            "No"=>array(
                "media_type"    =>"audio",
                "media_filename"=>'media/u5p.mp3',
                "timeRange"     =>"00:22-00:28",
                "text"          =>"The house has an outside entrance with some steps.",
            ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"2",
            "content_id"=>818,
            "media_filename"=>'media/u5p.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"01:27-01:32",
            "scores"=>1,
            "text" => "A balcony is connected to the living room.",
            "answer" => "A balcony is connected to the living room",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5p.mp3',
                    "timeRange"     =>"01:27-01:32",
                    "text" => "A balcony is connected to the living room.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5p.mp3',
                    "timeRange"     =>"01:27-01:32",
                    "text" => "A balcony is connected to the living room.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"3",
            "content_id"=>819,
            "media_filename"=>'media/u5p.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"01:45-01:51",
            "scores"=>1,
            "text" => "Against one side of the wall stands a large bookcase. ",
            "answer" => "Against one side of the wall stands a large bookcase",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5p.mp3',
                    "timeRange"     =>"01:45-01:51",
                    "text" => "Against one side of the wall stands a large bookcase. ",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5p.mp3',
                    "timeRange"     =>"01:45-01:51",
                    "text" => "Against one side of the wall stands a large bookcase. ",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"4",
            "content_id"=>820,
            "media_filename"=>'media/u5p.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"02:16-02:22",
            "scores"=>1,
            "text" => "A refrigerator stands on the left-hand side of the door. ",
            "answer" => "A refrigerator stands on the left hand side of the door",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5p.mp3',
                    "timeRange"     =>"02:16-02:22",
                    "text" => "A refrigerator stands on the left-hand side of the door. ",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5p.mp3',
                    "timeRange"     =>"02:16-02:22",
                    "text" => "A refrigerator stands on the left-hand side of the door. ",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"5",
            "content_id"=>821,
            "media_filename"=>'media/u5p.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"02:48-02:52",
            "scores"=>1,
            "text" => "The sink is next to the toilet.",
            "answer" => "The sink is next to the toilet",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5p.mp3',
                    "timeRange"     =>"02:48-02:52",
                    "text" => "The sink is next to the toilet.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5p.mp3',
                    "timeRange"     =>"02:48-02:52",
                    "text" => "The sink is next to the toilet.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"6",
            "content_id"=>822,
            "media_filename"=>'media/u5p.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"03:23-03:32",
            "scores"=>1,
            "text" => "Her parents' bedroom has a comfortable king sized bed and a small bathroom with it. ",
            "answer" => "Her parents' bedroom has a comfortable king sized bed and a small bathroom with it",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5p.mp3',
                    "timeRange"     =>"03:23-03:32",
                    "text" => "Her parents' bedroom has a comfortable king sized bed and a small bathroom with it. ",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5p.mp3',
                    "timeRange"     =>"03:23-03:32",
                    "text" => "Her parents' bedroom has a comfortable king sized bed and a small bathroom with it. ",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"7",
            "content_id"=>823,
            "media_filename"=>'media/u5d.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"00:24-00:29",
            "scores"=>1,
            "text" => "Well, what a beautiful campus! ",
            "answer" => "Well what a beautiful campus",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5d.mp3',
                    "timeRange"     =>"00:24-00:29",
                    "text" => "Well, what a beautiful campus! ",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5d.mp3',
                    "timeRange"     =>"00:24-00:29",
                    "text" => "Well, what a beautiful campus! ",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"8",
            "content_id"=>824,
            "media_filename"=>'media/u5d.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"00:36-00:39",
            "scores"=>1,
            "text" => "Let me show you around.",
            "answer" => "Let me show you around",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5d.mp3',
                    "timeRange"     =>"00:36-00:39",
                    "text" => "Let me show you around.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5d.mp3',
                    "timeRange"     =>"00:36-00:39",
                    "text" => "Let me show you around.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"9",
            "content_id"=>825,
            "media_filename"=>'media/u5d.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"01:14-01:19",
            "scores"=>1,
            "text" => "The café is right on the first floor, over there.",
            "answer" => "The café is right on the first floor, over there",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5d.mp3',
                    "timeRange"     =>"01:14-01:19",
                    "text" => "The café is right on the first floor, over there.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5d.mp3',
                    "timeRange"     =>"01:14-01:19",
                    "text" => "The café is right on the first floor, over there.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"10",
            "content_id"=>826,
            "media_filename"=>'media/u5d.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"01:33-01:39",
            "scores"=>1,
            "text" => "Oh, the café is certainly very impressive.",
            "answer" => "Oh the café is certainly very impressive",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5d.mp3',
                    "timeRange"     =>"01:33-01:39",
                    "text" => "Oh, the café is certainly very impressive.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5d.mp3',
                    "timeRange"     =>"01:33-01:39",
                    "text" => "Oh, the café is certainly very impressive.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"11",
            "content_id"=>827,
            "media_filename"=>'media/u5d.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"01:58-02:04",
            "scores"=>1,
            "text" => "What's the building across the lawn over there in the east?",
            "answer" => "What's the building across the lawn over there in the east",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5d.mp3',
                    "timeRange"     =>"01:58-02:04",
                    "text" => "What's the building across the lawn over there in the east?",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5d.mp3',
                    "timeRange"     =>"01:58-02:04",
                    "text" => "What's the building across the lawn over there in the east?",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"12",
            "content_id"=>828,
            "media_filename"=>'media/u5d.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"02:22-02:27",
            "scores"=>1,
            "text" => "The gym is right in the north part of the campus.",
            "answer" => "The gym is right in the north part of the campus",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5d.mp3',
                    "timeRange"     =>"02:22-02:27",
                    "text" => "The gym is right in the north part of the campus.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5d.mp3',
                    "timeRange"     =>"02:22-02:27",
                    "text" => "The gym is right in the north part of the campus.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"13",
            "content_id"=>829,
            "media_filename"=>'media/u5d.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"03:16-03:20",
            "scores"=>1,
            "text" => "What is on the third floor?",
            "answer" => "What is on the third floor",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5d.mp3',
                    "timeRange"     =>"03:16-03:20",
                    "text" => "What is on the third floor?",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5d.mp3',
                    "timeRange"     =>"03:16-03:20",
                    "text" => "What is on the third floor?",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"14",
            "content_id"=>830,
            "media_filename"=>'media/u5d.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"03:42-03:47",
            "scores"=>1,
            "text" => "The playground is in front of the dormitory.",
            "answer" => "The playground is in front of the dormitory",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5d.mp3',
                    "timeRange"     =>"03:42-03:47",
                    "text" => "The playground is in front of the dormitory.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5d.mp3',
                    "timeRange"     =>"03:42-03:47",
                    "text" => "The playground is in front of the dormitory.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"15",
            "content_id"=>831,
            "media_filename"=>'media/u5d.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"04:15-04:17",
            "scores"=>1,
            "text" => "Why not?",
            "answer" => "Why not?",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5d.mp3',
                    "timeRange"     =>"04:15-04:17",
                    "text" => "Why not?",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5d.mp3',
                    "timeRange"     =>"04:15-04:17",
                    "text" => "Why not?",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
         $this->saveEventListToDatabases($data);$a =  json_encode($data);
        $fp = fopen('json107.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
        return;
    }

    public function getPart108(){
        $data = array(
            "unit_id"       =>5,
            "lesson_id"     =>31,
            "part_id"       =>108,
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
            "content_id"=>832,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"00:00-00:05",
            "scores"=>10,
            "text" => "If it is fine tomorrow, Linda _ a picnic with her classmates.",
            "answer" => "If it is fine tomorrow, Linda will have a picnic with her classmates",
            "items" => array(
                "0"=>array("item"=>"has","isCorrect"=>false),
                "1"=>array("item"=>"will have", "isCorrect"=>true),
                "2"=>array("item"=>"have", "isCorrect"=>false),
                "3"=>array("item"=>"shall have", "isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5gfi.mp3',
                    "timeRange"     =>"00:00-00:05",
                    "text" => "If it is fine tomorrow Linda will have a picnic with her classmates.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5gfi.mp3',
                    "timeRange"     =>"00:00-00:05",
                    "text" => "If it is fine tomorrow Linda will have a picnic with her classmates.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"2",
            "content_id"=>833,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"00:05-00:11",
            "scores"=>10,
            "text" => "In the past 10 years Bill's university _ great reputation in the tourism field.",
            "answer"=>"In the past 10 years Bill's university has achieved great reputation in the tourism field",
            "items" => array(
                "0"=>array("item"=>"having achieve","isCorrect"=>false),
                "1"=>array("item"=>"has achieved", "isCorrect"=>true),
                "2"=>array("item"=>"had achieved", "isCorrect"=>false),
                "3"=>array("item"=>"have achieved","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5gfi.mp3',
                    "timeRange"     =>"00:05-00:11",
                    "text"=>"In the past 10 years Bill's university has achieved great reputation in the tourism field",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5gfi.mp3',
                    "timeRange"     =>"00:07-00:17",
                    "text"=>"In the past 10 years Bill's university has achieved great reputation in the tourism field",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"3",
            "content_id"=>834,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"00:11-00:15",
            "scores"=>10,
            "text" => "Linda said that she dropped her purse when she _ for the bus.",
            "answer"=>"Linda said that she dropped her purse when she was running for the bus",
            "items" => array(
                "0"=>array("item"=>"was runing","isCorrect"=>false),
                "1"=>array("item"=>"is running", "isCorrect"=>false),
                "2"=>array("item"=>"were running", "isCorrect"=>false),
                "3"=>array("item"=>"was running ","isCorrect"=>true),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5gfi.mp3',
                    "timeRange"     =>"00:11-00:15",
                    "text"=>"Linda said that she dropped her purse when she was running for the bus.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5gfi.mp3',
                    "timeRange"     =>"00:11-00:15",
                    "text"=>"Linda said that she dropped her purse when she was running for the bus.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );
        $data['events'][] = array(
            "num"=>"4",
            "content_id"=>835,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"00:15-00:20",
            "scores"=>10,
            "text" => "If our partner _ , our business plan will not succeed.",
            "answer"=>"If our partner won't cooperate , our business plan will not succeed.",
            "items" => array(
                "0"=>array("item"=>"are co-operating","isCorrect"=>false),
                "1"=>array("item"=>"won't cooperate", "isCorrect"=>true),
                "2"=>array("item"=>"didn't co-operate", "isCorrect"=>false),
                "3"=>array("item"=>"had not co-operated","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5gfi.mp3',
                    "timeRange"     =>"00:15-00:20",
                    "text"=>"If our partner won't cooperate our business plan will not succeed.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5gfi.mp3',
                    "timeRange"     =>"00:15-00:20",
                    "text"=>"If our partner won't cooperate our business plan will not succeed.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"5",
            "content_id"=>836,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"00:20-00:23",
            "scores"=>10,
            "text" => "I _ think Cameron will _ direct the new film.",
            "answer"=>"I don't think Cameron will X direct the new film",
            "items" => array(
                "0"=>array("item"=>"do", "isCorrect"=>false),
                "1"=>array("item"=>"not","isCorrect"=>false),
                "2"=>array("item"=>"don't", "isCorrect"=>true),
                "3"=>array("item"=>"X","isCorrect"=>true),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5gfi.mp3',
                    "timeRange"     =>"00:20-00:23",
                    "text"=>"I don't think Cameron will X direct the new film",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5gfi.mp3',
                    "timeRange"     =>"00:20-00:23",
                    "text"=>"I don't think Cameron will X direct the new film",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"6",
            "content_id"=>837,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"00:23-00:27",
            "scores"=>10,
            "text" => "What Linda said _ to be untrue.",
            "answer"=>"What Linda said has turned out to be untrue.",
            "items" => array(
                "0"=>array("item"=>"has turned out", "isCorrect"=>true),
                "1"=>array("item"=>"have been turned out","isCorrect"=>false),
                "2"=>array("item"=>"is turned out", "isCorrect"=>false),
                "3"=>array("item"=>"have turned out","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5gfi.mp3',
                    "timeRange"     =>"00:23-00:27",
                    "text"=>"What Linda said has turned out to be untrue.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5gfi.mp3',
                    "timeRange"     =>"00:23-00:27",
                    "text"=>"What Linda said has turned out to be untrue.",
                    ),
            ),
            "picture"=>"images/type_click_001.png"
        );
        $data['events'][] = array(
            "num"=>"7",
            "content_id"=>838,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"00:27-00:31",
            "scores"=>10,
            "text" => "If it _ rain, I will  go out for a walk in the park.",
            "answer"=>"If it doesn't rain, I will  go out for a walk in the park.",
            "items" => array(
                "0"=>array("item"=>"shall not", "isCorrect"=>false),
                "1"=>array("item"=>"didn't","isCorrect"=>false),
                "2"=>array("item"=>"doesn't", "isCorrect"=>true),
                "3"=>array("item"=>"won't","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5gfi.mp3',
                    "timeRange"     =>"00:27-00:31",
                    "text"=>"If it doesn't rain I will  go out for a walk in the park.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5gfi.mp3',
                    "timeRange"     =>"00:27-00:31",
                    "text"=>"If it doesn't rain I will  go out for a walk in the park.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"8",
            "content_id"=>839,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"00:31-00:35",
            "scores"=>10,
            "text" => "I _ that you were waiting, otherwise I would have come sooner.",
            "answer"=>"I didn't know that you were waiting, otherwise I would have come sooner",
            "items" => array(
                "0"=>array("item"=>"don't know", "isCorrect"=>false),
                "1"=>array("item"=>"haven't known","isCorrect"=>false),
                "2"=>array("item"=>"hadn't known", "isCorrect"=>false),
                "3"=>array("item"=>"didn't know","isCorrect"=>true),
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
            "num"=>"9",
            "content_id"=>840,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"00:35-00:41",
            "scores"=>10,
            "text" => "Bill will visit Linda's parents but he _ think they will be happy to see him.",
            "answer"=>"Bill will visit Linda's parents but he doesn't think they will be happy to see him",
            "items" => array(
                "0"=>array("item"=>"haven't", "isCorrect"=>false),
                "1"=>array("item"=>"don't","isCorrect"=>false),
                "2"=>array("item"=>"didn't", "isCorrect"=>false),
                "3"=>array("item"=>"doesn't","isCorrect"=>true),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5gfi.mp3',
                    "timeRange"     =>"00:35-00:41",
                    "text"=>"Bill will visit Linda's parents but he doesn't think they will be happy to see him.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5gfi.mp3',
                    "timeRange"     =>"00:35-00:41",
                    "text"=>"Bill will visit Linda's parents but he doesn't think they will be happy to see him.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );
        $data['events'][] = array(
            "num"=>"10",
            "content_id"=>841,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"00:41-00:44",
            "scores"=>10,
            "text" => "He _ accomplish the task in time.",
            "answer"=>"He did accomplish the task in time",
            "items" => array(
                "0"=>array("item"=>"is", "isCorrect"=>true),
                "1"=>array("item"=>"has","isCorrect"=>false),
                "2"=>array("item"=>"did", "isCorrect"=>false),
                "3"=>array("item"=>"does","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5gfi.mp3',
                    "timeRange"     =>"00:41-00:44",
                    "text" => "He did accomplish the task in time.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5gfi.mp3',
                    "timeRange"     =>"00:41-00:44",
                    "text" => "He did accomplish the task in time.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );
        $data['events'][] = array(
            "num"=>"11",
            "content_id"=>842,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"00:44-00:50",
            "scores"=>10,
            "text" => "When Bill was at school, he _ early and go jogging around the playground.",
            "answer"=>"When Bill was at school, he would get up early and go jogging around the playground",
            "items" => array(
                "0"=>array("item"=>"will get up", "isCorrect"=>false),
                "1"=>array("item"=>"gets up","isCorrect"=>false),
                "2"=>array("item"=>"would get up", "isCorrect"=>true),
                "3"=>array("item"=>"should get up","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5gfi.mp3',
                    "timeRange"     =>"00:44-00:50",
                    "text"=>"When Bill was at school, he would get up early and go jogging around the playground.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5gfi.mp3',
                    "timeRange"     =>"00:44-00:50",
                    "text"=>"TWhen Bill was at school, he would get up early and go jogging around the playground.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"12",
            "content_id"=>843,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"00:50-00:55",
            "scores"=>10,
            "text" => "- We didn't see Bill at the lecture yesterday.- He _ it.",
            "answer"=>"- We didn't see Bill at the lecture yesterday.- He can't have attended it.",
            "items" => array(
                "0"=>array("item"=>"shouldn't have attended", "isCorrect"=>false),
                "1"=>array("item"=>"can't have attended","isCorrect"=>true),
                "2"=>array("item"=>"wouldn't have attended", "isCorrect"=>false),
                "3"=>array("item"=>"needn't have attended","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5gfi.mp3',
                    "timeRange"     =>"00:50-00:55",
                    "text" => "- We didn't see Bill at the lecture yesterday.- He can't have attended it.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5gfi.mp3',
                    "timeRange"     =>"00:50-00:55",
                    "text" => "- We didn't see Bill at the lecture yesterday.- He can't have attended it.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"13",
            "content_id"=>844,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"00:55-00:59",
            "scores"=>10,
            "text" => "The students in the classroom _ not to make so much noise.",
            "answer"=>"The students in the classroom ought not to make so much noise.",
            "items" => array(
                "0"=>array("item"=>"should", "isCorrect"=>false),
                "1"=>array("item"=>"dare", "isCorrect"=>false),
                "2"=>array("item"=>"must","isCorrect"=>false),
                "3"=>array("item"=>"ought","isCorrect"=>true),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5gfi.mp3',
                    "timeRange"     =>"00:55-00:59",
                    "text" => "The students in the classroom ought not to make so much noise.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5gfi.mp3',
                    "timeRange"     =>"00:55-00:59",
                    "text" => "The students in the classroom ought not to make so much noise.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"14",
            "content_id"=>845,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"00:59-01:05",
            "scores"=>10,
            "text" => "- Linda got the scholarship this semester.- She _ have been an outstanding student.",
            "answer"=>"- Linda got the scholarship this semester.- She must have been an outstanding student.",
            "items" => array(
                "0"=>array("item"=>"should", "isCorrect"=>false),
                "1"=>array("item"=>"could", "isCorrect"=>false),
                "2"=>array("item"=>"must","isCorrect"=>true),
                "3"=>array("item"=>"would","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5gfi.mp3',
                    "timeRange"     =>"00:59-01:05",
                    "text"=>"- Linda got the scholarship this semester.- She must have been an outstanding student.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5gfi.mp3',
                    "timeRange"     =>"00:59-01:05",
                    "text"=>"- Linda got the scholarship this semester.- She must have been an outstanding student.",              ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"15",
            "content_id"=>846,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"01:05-01:10",
            "scores"=>10,
            "text" => "How did the secretary do her work? The mail _ yesterday.",
            "answer"=>"How did the secretary do her work? The mail should have been sent yesterday.",
            "items" => array(
                "0"=>array("item"=>"should be sent", "isCorrect"=>false),
                "1"=>array("item"=>"must be sent","isCorrect"=>false),
                "2"=>array("item"=>"must have sent", "isCorrect"=>false),
                "3"=>array("item"=>"should have been sent","isCorrect"=>true),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5gfi.mp3',
                    "timeRange"     =>"01:05-01:10",
                    "text"=>"How did the secretary do her work? The mail should have been sent yesterday.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5gfi.mp3',
                    "timeRange"     =>"01:05-01:10",
                    "text"=>"How did the secretary do her work? The mail should have been sent yesterday.",
                    ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"16",
            "content_id"=>847,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"01:10-01:15",
            "scores"=>10,
            "text" =>"You _ the look on the manager's face when he admitted his fault.",
            "answer"=>"You should have seen the look on the manager's face when he admitted his fault.",
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
            "content_id"=>848,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"01:15-01:20",
            "scores"=>10,
            "text" => "Bill _ the book very much because he finished it in one night.",
            "answer"=>"Bill must have liked the book very much because he finished it in one night.",
            "items" => array(
                "0"=>array("item"=>"must like", "isCorrect"=>false),
                "1"=>array("item"=>"had liked","isCorrect"=>false),
                "2"=>array("item"=>"must have been liking", "isCorrect"=>false),
                "3"=>array("item"=>"must have liked","isCorrect"=>true),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5gfi.mp3',
                    "timeRange"     =>"01:15-01:20",
                    "text"=>"Bill must have liked the book very much because he finished it in one night.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5gfi.mp3',
                    "timeRange"     =>"01:15-01:20",
                    "text"=>"Bill must have liked the book very much because he finished it in one night.",

                ),
            ),
            "picture"=>"images/type_click_001.png"
        );
        $data['events'][] = array(
            "num"=>"18",
            "content_id"=>849,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"01:20-01:24",
            "scores"=>10,
            "text" => "If you don't want to, you _ to join us.",
            "answer"=>"If you don't want to, you don't have to join us.",
            "items" => array(
                "0"=>array("item"=>"don't have", "isCorrect"=>true),
                "1"=>array("item"=>"can't","isCorrect"=>false),
                "2"=>array("item"=>"mustn't", "isCorrect"=>false),
                "3"=>array("item"=>"need not","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5gfi.mp3',
                    "timeRange"     =>"01:20-01:24",
                    "text"=>"If you don't want to, you don't have to join us.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5gfi.mp3',
                    "timeRange"     =>"01:20-01:24",
                    "text"=>"If you don't want to, you don't have to join us.",
                  ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"19",
            "content_id"=>850,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"01:24-01:28",
            "scores"=>10,
            "text" => "Linda asked how long  she _ keep the borrowed books.",
            "answer"=>"Linda asked how long  she could keep the borrowed books.",
            "items" => array(
                "0"=>array("item"=>"would", "isCorrect"=>false),
                "1"=>array("item"=>"might", "isCorrect"=>false),
                "2"=>array("item"=>"can","isCorrect"=>false),
                "3"=>array("item"=>"could","isCorrect"=>true),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5gfi.mp3',
                    "timeRange"     =>"01:24-01:28",
                    "text"=>"Linda asked how long  she could keep the borrowed books.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5gfi.mp3',
                    "timeRange"     =>"01:24-01:28",
                    "text"=>"Linda asked how long  she could keep the borrowed books.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"20",
            "content_id"=>851,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"01:28-01:32",
            "scores"=>10,
            "text" => "What _ I do to prepare for the final exam?",
            "answer"=>"What shall I do to prepare for the final exam?",
            "items" => array(
                "0"=>array("item"=>"shall", "isCorrect"=>true),
                "1"=>array("item"=>"will", "isCorrect"=>false),
                "2"=>array("item"=>"need","isCorrect"=>false),
                "3"=>array("item"=>"must","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5gfi.mp3',
                    "timeRange"     =>"01:28-01:32",
                    "text"=>"What shall I do to prepare for the final exam?",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5gfi.mp3',
                    "timeRange"     =>"01:28-01:32",
                    "text"=>"What shall I do to prepare for the final exam?",
                    ),
            ),
            "picture"=>"images/type_click_001.png"
        );
         $this->saveEventListToDatabases($data);$a =  json_encode($data);
        $fp = fopen('json108.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
        return;
    }


    public function getPart109(){
        $data = array(
            "unit_id"       =>5,
            "lesson_id"     =>31,
            "part_id"       =>109,
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
            "content_id"=>852,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"00:00-00:03",
            "scores"=>1,
            "text" => "You like noodles. I do too.",
            "items" => array(
                "0"=>array("item"=>"You like"),
                "1"=>array("item"=>"too."),
                "2"=>array("item"=>"I do"),
                "3"=>array("item"=>"noodles.")
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5gso.mp3',
                    "timeRange"     =>"00:00-00:03",
                    "text" => "You like noodles.I do too.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5gso.mp3',
                    "timeRange"     =>"00:00-00:03",
                    "text" => "You like noodles.I do too.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );
        $data['events'][] = array(
            "num"=>"2",
            "content_id"=>853,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"00:03-00:07",
            "scores"=>1,
            "text" => "Bill was sent to England as an exchange student last year.",
            "items" => array(
                "0"=>array("item"=>"was sent to England"),
                "1"=>array("item"=>"as an exchange student"),
                "2"=>array("item"=>"Bill"),
                "3"=>array("item"=>"last year."),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5gso.mp3',
                    "timeRange"     =>"00:03-00:07",
                    "text" => "Bill was sent to England as an exchange student last year.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5gso.mp3',
                    "timeRange"     =>"00:03-00:07",
                    "text" => "Bill was sent to England as an exchange student last year.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );
        $data['events'][] = array(
            "num"=>"3",
            "content_id"=>854,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"00:07-00:10",
            "scores"=>1,
            "text" => "You are to explain why it's a mess here.",
            "items" => array(
                "0"=>array("item"=>"why"),
                "1"=>array("item"=>"are to explain"),
                "2"=>array("item"=>"You"),
                "3"=>array("item"=>"it's a mess here.")
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5gso.mp3',
                    "timeRange"     =>"00:07-00:10",
                    "text" => "You are to explain why it's a mess here.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5gso.mp3',
                    "timeRange"     =>"00:07-00:10",
                    "text" => "You are to explain why it's a mess here.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );
        $data['events'][] = array(
            "num"=>"4",
            "content_id"=>855,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"00:10-00:13",
            "scores"=>1,
            "text" => "I hope you will have a good vacation.",
            "items" => array(
                "0"=>array("item"=>"a good vacation."),
                "1"=>array("item"=>"I hope"),
                "2"=>array("item"=>"have"),
                "3"=>array("item"=>"you will")
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5gso.mp3',
                    "timeRange"     =>"00:10-00:13",
                    "text" => "I hope you will have a good vacation.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5gso.mp3',
                    "timeRange"     =>"00:10-00:13",
                    "text" => "I hope you will have a good vacation.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );
        $data['events'][] = array(
            "num"=>"5",
            "content_id"=>856,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"00:13-00:17",
            "scores"=>1,
            "text" => "Don't go to the forest during the rainy season.",
            "items" => array(
                "0"=>array("item"=>"Don't"),
                "1"=>array("item"=>"during"),
                "2"=>array("item"=>"the rainy season."),
                "3"=>array("item"=>"go to the forest"),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5gso.mp3',
                    "timeRange"     =>"00:13-00:17",
                    "text" => "Don't go to the forest during the rainy season.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5gso.mp3',
                    "timeRange"     =>"00:13-00:17",
                    "text" => "Don't go to the forest during the rainy season.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );
        $data['events'][] = array(
            "num"=>"6",
            "content_id"=>857,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"00:17-00:20",
            "scores"=>1,
            "text" => "Never have I been abroad before.",
            "items" => array(
                "0"=>array("item"=>"before."),
                "1"=>array("item"=>"have I"),
                "2"=>array("item"=>"Never"),
                "3"=>array("item"=>"been abroad"),
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
            "num"=>"7",
            "content_id"=>858,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"00:20-00:23",
            "scores"=>1,
            "text" => "Linda knows how to swim, doesn't she?",
            "items" => array(
                "0"=>array("item"=>"Linda"),
                "1"=>array("item"=>"doesn't she?"),
                "2"=>array("item"=>"how to swim,"),
                "3"=>array("item"=>"knows"),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5gso.mp3',
                    "timeRange"     =>"00:20-00:23",
                    "text" => "Linda knows how to swim, doesn't she?",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5gso.mp3',
                    "timeRange"     =>"00:20-00:23",
                    "text" => "Linda knows how to swim, doesn't she?",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"8",
            "content_id"=>859,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"00:23-00:27",
            "scores"=>1,
            "text" => "Take the sunglasses with you in case you need them on your journey.",
            "items" => array(
                "0"=>array("item"=>"Take the sunglasses with you"),
                "1"=>array("item"=>"you need them"),
                "2"=>array("item"=>"on your journey."),
                "3"=>array("item"=>"in case"),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5gso.mp3',
                    "timeRange"     =>"00:23-00:27",
                    "text" => "Take the sunglasses with you in case you need them on your journey.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5gso.mp3',
                    "timeRange"     =>"00:23-00:27",
                    "text" => "Take the sunglasses with you in case you need them on your journey.?",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"9",
            "content_id"=>860,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"00:27-00:29",
            "scores"=>1,
            "text" => "Shall we go out for a walk?",
            "items" => array(
                "0"=>array("item"=>"Shall"),
                "1"=>array("item"=>"for a walk?"),
                "2"=>array("item"=>" go out"),
                "3"=>array("item"=>"we"),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5gso.mp3',
                    "timeRange"     =>"00:27-00:29",
                    "text" => "Shall we go out for a walk?",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5gso.mp3',
                    "timeRange"     =>"00:27-00:29",
                    "text" => "Shall we go out for a walk?",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"10",
            "content_id"=>861,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"00:29-00:34",
            "scores"=>1,
            "text" => "Bill goes jogging in the gym every day so he was able to win the marathon.",
            "items" => array(
                "0"=>array("item"=>"Bill"),
                "1"=>array("item"=>"win the marathon."),
                "2"=>array("item"=>"in the gym every day"),
                "3"=>array("item"=>"so he was able to"),
                "4"=>array("item"=>"goes jogging"),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5gso.mp3',
                    "timeRange"     =>"00:29-00:34",
                    "text" => "Bill goes jogging in the gym every day so he was able to win the marathon.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5gso.mp3',
                    "timeRange"     =>"00:29-00:34",
                    "text" => "Bill goes jogging in the gym every day so he was able to win the marathon.",
                    ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"11",
            "content_id"=>862,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"00:34-00:39",
            "scores"=>1,
            "text" => "Linda told Bill she would visit his school the week after the next.",
            "items" => array(
                "0"=>array("item"=>"she would"),
                "1"=>array("item"=>"Linda told Bill"),
                "2"=>array("item"=>"the week after the next."),
                "3"=>array("item"=>"visit his school"),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5gso.mp3',
                    "timeRange"     =>"00:34-00:39",
                    "text" => "Linda told Bill she would visit his school the week after the next.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5gso.mp3',
                    "timeRange"     =>"00:34-00:39",
                    "text" => "Linda told Bill she would visit his school the week after the next.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"12",
            "content_id"=>863,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"00:39-00:43",
            "scores"=>1,
            "text" => "Could you do me a favor by moving the table out of the room?",
            "items" => array(
                "0"=>array("item"=>"Could you"),
                "1"=>array("item"=>"by"),
                "2"=>array("item"=>"moving the table"),
                "3"=>array("item"=>"do me a favor"),
                "4"=>array("item"=>"out of the room?"),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5gso.mp3',
                    "timeRange"     =>"00:39-00:43",
                    "text" => "Could you do me a favor by moving the table out of the room?",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5gso.mp3',
                    "timeRange"     =>"00:39-00:43",
                    "text" => "Could you do me a favor by moving the table out of the room?",
                    ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"13",
            "content_id"=>864,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"00:43-00:47",
            "scores"=>1,
            "text" => "Linda was about to go out when her friend came in.",
            "items" => array(
                "0"=>array("item"=>"Linda"),
                "1"=>array("item"=>"when"),
                "2"=>array("item"=>"was about to go out"),
                "3"=>array("item"=>"her friend came in."),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5gso.mp3',
                    "timeRange"     =>"00:43-00:47",
                    "text" => "Linda was about to go out when her friend came in.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5gso.mp3',
                    "timeRange"     =>"00:43-00:47",
                    "text" => "Linda was about to go out when her friend came in.",
                    ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"14",
            "content_id"=>865,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"00:47-00:52",
            "scores"=>1,
            "text" => "You are supposed to speak fluent English after studying it for 10 ten years.",
            "items" => array(
                "0"=>array("item"=>"for 10 ten years."),
                "1"=>array("item"=>"You are supposed to"),
                "2"=>array("item"=>"after studying it"),
                "3"=>array("item"=>"speak fluent English"),
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
            "num"=>"15",
            "content_id"=>866,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"00:52-00:55",
            "scores"=>1,
            "text" => "You are meant to be an artist.",
            "items" => array(
                "0"=>array("item"=>"are meant to be"),
                "1"=>array("item"=>"You"),
                "2"=>array("item"=>"an artist."),
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

         $this->saveEventListToDatabases($data);$a =  json_encode($data);
        $fp = fopen('json109.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
        return;
    }

    public function getPart110(){
        $data = array(
            "unit_id"       =>5,
            "lesson_id"     =>31,
            "part_id"       =>110,
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
            "content_id"=>867,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"sr_ordering",
            "timeRange"     =>"00:00-00:03",
            "scores"=>1,
            "text" => "I didn't go to bed until I finished my homework.",
            "answer" => "I didn't go to bed until I finished my homework",
            "items" => array(
                "0"=>array("item"=>"until"),
                "1"=>array("item"=>"I didn't"),
                "2"=>array("item"=>"go to bed"),
                "3"=>array("item"=>"I finished my homework."),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5gsf.mp3',
                    "timeRange"     =>"00:00-00:03",
                    "text" => "I didn't go to bed until I finished my homework.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5gsf.mp3',
                    "timeRange"     =>"00:00-00:03",
                    "text" => "I didn't go to bed until I finished my homework.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"2",
            "content_id"=>868,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"sr_ordering",
            "timeRange"     =>"00:03-00:06",
            "scores"=>1,
            "text" => "Do you have to get up early every day?",
            "answer" => "Do you have to get up early every day?",
            "items" => array(
                "0"=>array("item"=>"Do you"),
                "1"=>array("item"=>"every day?"),
                "2"=>array("item"=>"get up early"),
                "3"=>array("item"=>"have to"),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5gsf.mp3',
                    "timeRange"     =>"00:03-00:06",
                    "text" => "Do you have to get up early every day?",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5gsf.mp3',
                    "timeRange"     =>"00:03-00:06",
                    "text" => "Do you have to get up early every day?",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"3",
            "content_id"=>869,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"sr_ordering",
            "timeRange"     =>"00:06-00:10",
            "scores"=>1,
            "text" => "Please do come to my birthday party this weekend.",
            "answer" => "Please do come to my birthday party this weekend",
            "items" => array(
                "0"=>array("item"=>"Please"),
                "1"=>array("item"=>"this weekend."),
                "2"=>array("item"=>"come to my birthday party"),
                "3"=>array("item"=>"do"),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5gsf.mp3',
                    "timeRange"     =>"00:06-00:10",
                    "text" => "Please do come to my birthday party this weekend.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5gsf.mp3',
                    "timeRange"     =>"00:06-00:10",
                    "text" => "Please do come to my birthday party this weekend.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"4",
            "content_id"=>870,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"sr_ordering",
            "timeRange"     =>"00:10-00:14",
            "scores"=>1,
            "text" => "Chinese is becoming more and more important.",
            "answer" => "Chinese is becoming more and more important",
            "items" => array(
                "0"=>array("item"=>"Chinese"),
                "1"=>array("item"=>"becoming"),
                "2"=>array("item"=>"is"),
                "3"=>array("item"=>"more and more important."),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5gsf.mp3',
                    "timeRange"     =>"00:10-00:14",
                    "text" => "Chinese is becoming more and more important.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5gsf.mp3',
                    "timeRange"     =>"00:10-00:14",
                    "text" => "Chinese is becoming more and more important.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"5",
            "content_id"=>871,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"sr_ordering",
            "timeRange"     =>"00:14-00:18",
            "scores"=>1,
            "text" => "I have been studying English for 6 years.",
            "answer" => "I have been studying English for 6 years",
            "items" => array(
                "0"=>array("item"=>"English"),
                "1"=>array("item"=>"have been studying"),
                "2"=>array("item"=>"I"),
                "3"=>array("item"=>"for 6 years."),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5gsf.mp3',
                    "timeRange"     =>"00:14-00:18",
                    "text" => "I have been studying English for 6 years.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5gsf.mp3',
                    "timeRange"     =>"00:14-00:18",
                    "text" => "I have been studying English for 6 years.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"6",
            "content_id"=>872,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"sr_ordering",
            "timeRange"     =>"00:18-00:21",
            "scores"=>1,
            "text" => "You'd better have your hair cut.",
            "answer" => "You'd better have your hair cut",
            "items" => array(
                "0"=>array("item"=>"You'd better"),
                "1"=>array("item"=>"cut."),
                "2"=>array("item"=>"your hair"),
                "3"=>array("item"=>"have"),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5gsf.mp3',
                    "timeRange"     =>"00:18-00:21",
                    "text" => "You'd better have your hair cut.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5gsf.mp3',
                    "timeRange"     =>"00:18-00:21",
                    "text" => "You'd better have your hair cut.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"7",
            "content_id"=>873,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"sr_ordering",
            "timeRange"     =>"00:21-00:24",
            "scores"=>1,
            "text" => "Would you like to have dinner with me today?",
            "answer" => "Would you like to have dinner with me today?",
            "items" => array(
                "0"=>array("item"=>"with me"),
                "1"=>array("item"=>"Would you like"),
                "2"=>array("item"=>"today?"),
                "3"=>array("item"=>"to have dinner"),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5gsf.mp3',
                    "timeRange"     =>"00:21-00:24",
                    "text" => "Would you like to have dinner with me today?",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5gsf.mp3',
                    "timeRange"     =>"00:21-00:24",
                    "text" => "Would you like to have dinner with me today?",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"8",
            "content_id"=>874,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"sr_ordering",
            "timeRange"     =>"00:24-00:27",
            "scores"=>1,
            "text" => "To travel abroad you need a passport.",
            "answer" => "To travel abroad you need a passport",
            "items" => array(
                "0"=>array("item"=>"you"),
                "1"=>array("item"=>"To travel abroad"),
                "2"=>array("item"=>"a passport."),
                "3"=>array("item"=>"need"),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5gsf.mp3',
                    "timeRange"     =>"00:24-00:27",
                    "text" => "To travel abroad you need a passport.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u5gsf.mp3',
                    "timeRange"     =>"00:24-00:27",
                    "text" => "To travel abroad you need a passport.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"9",
            "content_id"=>875,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"sr_ordering",
            "timeRange"     =>"00:27-00:31",
            "scores"=>1,
            "text" => "It is likely to snow tonight according to the weather report.",
            "answer" => "It is likely to snow tonight according to the weather report",
            "items" => array(
                "0"=>array("item"=>"according to"),
                "1"=>array("item"=>"It is likely"),
                "2"=>array("item"=>"to snow tonight"),
                "3"=>array("item"=>"the weather report.")
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
            "num"=>"10",
            "content_id"=>876,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"sr_ordering",
            "timeRange"     =>"00:31-00:34",
            "scores"=>1,
            "text" => "Are you willing to share your ideas with us?",
            "answer" => "Are you willing to share your ideas with us?",
            "items" => array(
                "0"=>array("item"=>"with us?"),
                "1"=>array("item"=>"share your ideas"),
                "2"=>array("item"=>"Are you"),
                "3"=>array("item"=>"willing to"),
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

         $this->saveEventListToDatabases($data);$a =  json_encode($data);
        $fp = fopen('json110.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
        return;
    }

    //最新MT
    public function getPart111(){
        $data = array(
            "unit_id"       =>5,
            "lesson_id"     =>32,
            "part_id"       =>111,
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
                2=>array(1,4,5,7),
                3=>array(1,3,4,6)
            ),
            "keywords"   =>array(
            ),
        );

        $data['events'][] = array(
            "num"=>"1",
            "type"=>"MTmultipleChoices",
            "media_type"=>"audio",
            "media_filename"=>'media/u5p_original_mt.mp3',
            "timeRange"=>"00:10-00:21",
            "content"=>"The house is a two-story building with a basement and a garage. The house has an outside entrance with some steps.",
            "text"=>"The house is a two-story building with a basement and a garage. The house has an outside entrance with some steps.",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"1",
                    "content_id"=>877,
                    "type"=>"multipleChoice",
                    "text"=>array("type"=>"text","text"=>"What kind of building is Linda's house?"),
                    "scores"=>5,
                    "items"=>array(
                        "0"=>array("item"=>"It's a one-story building without garage.","isCorrect"=>false),
                        "1"=>array("item"=>"It's a two-story building with a basement and a garage.", "isCorrect"=>true),
                        "2"=>array("item"=>"It's a two-story building with no basement or garage.", "isCorrect"=>false),
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
            "media_filename"=>'media/u5p_original_mt.mp3',
            "timeRange"=>"00:48-01:04",
            "content"=>"The kitchen is her mother's favorite place since she is fond of cooking. The kitchen is not luxurious but well furnished. There is an electric stove, an electric oven and a microwave oven in the kitchen. ",
            "text"=>"The kitchen is her mother's favorite place since she is fond of cooking. The kitchen is not luxurious but well furnished. There is an electric stove, an electric oven and a microwave oven in the kitchen. ",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"1",
                    "content_id"=>878,
                    "type"=>"multipleChoice",
                    "text"=>array("type"=>"text","text"=>"Who likes the kitchen best in Linda's family?"),
                    "scores"=>5,
                    "items"=>array(
                        "0"=>array("item"=>"Linda.","isCorrect"=>false),
                        "1"=>array("item"=>"Her father.", "isCorrect"=>false),
                        "2"=>array("item"=>"Her mother. ", "isCorrect"=>true),
                    ),
                    "selectEvents"=>array(
                    ),
                ),
                1=>array(
                    "num"=>"2",
                    "content_id"=>879,
                    "type"=>"multipleChoice",
                    "text"=>array("type"=>"text","text"=>"Why is the kitchen her mother's favorite place?"),
                    "scores"=>5,
                    "items"=>array(
                        "0"=>array("item"=>"Because she enjoys cooking.","isCorrect"=>true),
                        "1"=>array("item"=>"Because it is very beautiful.", "isCorrect"=>false),
                        "2"=>array("item"=>"Because she decorated it by herself.", "isCorrect"=>false),
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
            "media_filename"=>'media/u5p_original_mt.mp3',
            "timeRange"=>"01:56-02:13",
            "content"=>"There are three bedrooms on the second floor, one for her, another for her parents and the third one for guests. Her parents' bedroom has a comfortable king sized bed and a small bathroom with it.",
            "text"=>"There are three bedrooms on the second floor, one for her, another for her parents and the third one for guests. Her parents' bedroom has a comfortable king sized bed and a small bathroom with it. ",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"1",
                    "content_id"=>880,
                    "type"=>"multipleChoice",
                    "text"=>array("type"=>"text","text"=>"Which room has a king sized bed?"),
                    "scores"=>5,
                    "items"=>array(
                        "0"=>array("item"=>"Linda's room.","isCorrect"=>false),
                        "1"=>array("item"=>"Her parents' room.", "isCorrect"=>true),
                        "2"=>array("item"=>"The Guest's room.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                    ),
                ),
                1=>array(
                    "num"=>"2",
                    "content_id"=>881,
                    "type"=>"multipleChoice",
                    "text"=>array("type"=>"text","text"=>"How many people are there in Linda's family?"),
                    "scores"=>5,
                    "items"=>array(
                        "0"=>array("item"=>"Three.","isCorrect"=>true),
                        "1"=>array("item"=>"Four.", "isCorrect"=>false),
                        "2"=>array("item"=>"Five.", "isCorrect"=>false),
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
            "media_filename"=>'media/u5d_original_mt.mp3',
            "timeRange"=>"00:32-00:47",
            "content"=>"The café is right on the first floor, over there. All the classrooms are on the second floor and the library is on the third floor. The dean's office is on the first floor too. The computer lab is next to the café.",
            "text"=>"The café is right on the first floor, over there. All the classrooms are on the second floor and the library is on the third floor. The dean's office is on the first floor too. The computer lab is next to the café.",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"1",
                    "content_id"=>882,
                    "type"=>"multipleChoice",
                    "text"=>array("type"=>"text","text"=>"Where are all the classrooms?"),
                    "scores"=>5,
                    "items"=>array(
                        "0"=>array("item"=>"They are above the café.","isCorrect"=>true),
                        "1"=>array("item"=>"They are above the library.", "isCorrect"=>false),
                        "2"=>array("item"=>"They are under the dean's office.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                    ),
                ),
                1=>array(
                    "num"=>"2",
                    "content_id"=>883,
                    "type"=>"multipleChoice",
                    "text"=>array("type"=>"text","text"=>"Where is the computer lab?"),
                    "scores"=>5,
                    "items"=>array(
                        "0"=>array("item"=>"On the third floor.","isCorrect"=>false),
                        "1"=>array("item"=>"On the second floor.", "isCorrect"=>false),
                        "2"=>array("item"=>"On the first floor.", "isCorrect"=>true),
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
            "media_filename"=>'media/u5d_original_mt.mp3',
            "timeRange"=>"01:02-01:19",
            "content"=>"What's the building across the lawn over there in the east? Oh, that is the student center. All the offices of student services are there, such as the financial aid, registration and undergraduate admissions.",
            "text"=>"What's the building across the lawn over there in the east? Oh, that is the student center. All the offices of student services are there, such as the financial aid, registration and undergraduate admissions.",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"1",
                    "content_id"=>884,
                    "type"=>"multipleChoice",
                    "text"=>array("type"=>"text","text"=>"Where should you go if you want to apply for a student loan?"),
                    "scores"=>5,
                    "items"=>array(
                        "0"=>array("item"=>"The dean's office.","isCorrect"=>false),
                        "1"=>array("item"=>"The student center.", "isCorrect"=>true),
                        "2"=>array("item"=>"The gym.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                    ),
                ),
                1=>array(
                    "num"=>"2",
                    "content_id"=>885,
                    "type"=>"multipleChoice",
                    "text"=>array("type"=>"text","text"=>"What services doesn't the student center provide?"),
                    "scores"=>5,
                    "items"=>array(
                        "0"=>array("item"=>"Undergraduate admission.","isCorrect"=>false),
                        "1"=>array("item"=>"Financial aid.", "isCorrect"=>false),
                        "2"=>array("item"=>"Gym registration.", "isCorrect"=>true),
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
            "media_filename"=>'media/u5d_original_mt.mp3',
            "timeRange"=>"01:27-01:46",
            "content"=>"This is the third floor school gym. There, opposite the reception desk, is the locker room with a bathroom inside it. Over there is a door leading into the swimming pool. Well, the swimming pool is great. I enjoy swimming so much.",
            "text"=>"This is the third floor school gym. There, opposite the reception desk, is the locker room with a bathroom inside it. Over there is a door leading into the swimming pool. Well, the swimming pool is great. I enjoy swimming so much.",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"1",
                    "content_id"=>886,
                    "type"=>"multipleChoice",
                    "text"=>array("type"=>"text","text"=>"Where is the swimming pool?"),
                    "scores"=>5,
                    "items"=>array(
                        "0"=>array("item"=>"On the first floor of the gym.","isCorrect"=>true),
                        "1"=>array("item"=>"On the second floor of the gym.", "isCorrect"=>false),
                        "2"=>array("item"=>"On the third floor of the gym.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                    ),
                ),
                1=>array(
                    "num"=>"2",
                    "content_id"=>887,
                    "type"=>"multipleChoice",
                    "text"=>array("type"=>"text","text"=>"Where is the locker room?"),
                    "scores"=>5,
                    "items"=>array(
                        "0"=>array("item"=>"Inside the bathroom.","isCorrect"=>false),
                        "1"=>array("item"=>"Opposite the reception desk.", "isCorrect"=>true),
                        "2"=>array("item"=>"Next to the swimming pool.", "isCorrect"=>false),
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
            "media_filename"=>'media/u5d_original_mt.mp3',
            "timeRange"=>"01:46-01:59",
            "content"=>"See, here is the full-sized basketball court. And opposite over there, is a full-sized volleyball court. I often do jogging around the court after school.",
            "text"=>"See, here is the full-sized basketball court. And opposite over there, is a full-sized volleyball court. I often do jogging around the court after school.",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"1",
                    "content_id"=>888,
                    "type"=>"multipleChoice",
                    "text"=>array("type"=>"text","text"=>"What court doesn't the gym have?"),
                    "scores"=>5,
                    "items"=>array(
                        "0"=>array("item"=>"A full-sized basketball court.","isCorrect"=>false),
                        "1"=>array("item"=>"A full-sized football court.", "isCorrect"=>true),
                        "2"=>array("item"=>"A full-sized volleyball court.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                    ),
                ),
                1=>array(
                    "num"=>"2",
                    "content_id"=>889,
                    "type"=>"multipleChoice",
                    "text"=>array("type"=>"text","text"=>"What does Bill often do in the gym?"),
                    "scores"=>5,
                    "items"=>array(
                        "0"=>array("item"=>"He often swims during summer vacation.","isCorrect"=>false),
                        "1"=>array("item"=>"He often plays basketball here.", "isCorrect"=>false),
                        "2"=>array("item"=>"He often runs around the court.", "isCorrect"=>true),
                    ),
                    "selectEvents"=>array(
                    ),
                )
            ),
            "picture"=>"images/type_listen_001.png"
        );

         $this->saveEventListToDatabases($data);$a =  json_encode($data);
        $fp = fopen('json111.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
        return;
    }

    public function getPart112(){
        $data = array(
            "unit_id"       =>5,
            "lesson_id"     =>32,
            "part_id"       =>112,
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
            "content_id"=>890,
            "type"=>"MTmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u5p_original_mt.mp3',
            "timeRange"=>"00:00-00:10",
            "content"=>"This is Linda's home. She lives with her parents. She doesn't live in a dormitory because her college is close to her home.",
            "text"=>array("type"=>"audio","text"=>"Where does Linda live?","media_filename"=>'media/u5pcq.mp3',"timeRange"=>"00:00-00:02"),
            "scores"=>7,
            "items"=>array(
                "0"=>array("item"=>"She lives in her parents' house.","isCorrect"=>true),
                "1"=>array("item"=>"She lives in her home alone.", "isCorrect"=>false),
                "2"=>array("item"=>"She lives in a college dormitory.", "isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_listen_001.png"
        );

        $data['events'][] = array(
            "num"=>"2",
            "content_id"=>891,
            "type"=>"MTmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u5p_original_mt.mp3',
            "timeRange"=>"00:33-00:48",
            "content"=>"The study is Linda's favorite room, where no one can disturb her. The double-pane windows keep it quiet. Against one side of the wall stands a large bookcase. ",
            "text"=>array("type"=>"audio","text"=>"Why is the double-pane window used in the study?","media_filename"=>'media/u5pcq.mp3',"timeRange"=>"00:28-00:32"),
            "scores"=>7,
            "items"=>array(
                "0"=>array("item"=>"To keep off the wind.","isCorrect"=>false),
                "1"=>array("item"=>"To keep off the noise.", "isCorrect"=>true),
                "2"=>array("item"=>"To keep the room warm.", "isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_listen_001.png"
        );

        $data['events'][] = array(
            "num"=>"3",
            "content_id"=>892,
            "type"=>"MTmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u5p_original_mt.mp3',
            "timeRange"=>"01:04-01:13",
            "content"=>"All the seasonings are in different sized bottles. A refrigerator stands on the left-hand side of the door.",
            "text"=>array("type"=>"audio","text"=>"Where is the refrigerator?","media_filename"=>'media/u5pcq.mp3',"timeRange"=>"00:39-00:41"),
            "scores"=>7,
            "items"=>array(
                "0"=>array("item"=>"It's opposite the door.","isCorrect"=>false),
                "1"=>array("item"=>"It's on the right of the door.", "isCorrect"=>false),
                "2"=>array("item"=>"It's on the left of the door.", "isCorrect"=>true),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_listen_001.png"
        );

        $data['events'][] = array(
            "num"=>"4",
            "content_id"=>893,
            "type"=>"MTmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u5p_original_mt.mp3',
            "timeRange"=>"01:47-01:56",
            "content"=>"All the bath towels are folded and placed on the shelf on the wall at the end of the bathtub.",
            "text"=>array("type"=>"audio","text"=>"Which word best describes the bathroom?","media_filename"=>'media/u5pcq.mp3',"timeRange"=>"00:54-00:57"),
            "scores"=>7,
            "items"=>array(
                "0"=>array("item"=>"Dirty.","isCorrect"=>false),
                "1"=>array("item"=>"Tidy.", "isCorrect"=>true),
                "2"=>array("item"=>"Clean.", "isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_listen_001.png"
        );

        $data['events'][] = array(
            "num"=>"5",
            "content_id"=>894,
            "type"=>"MTmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u5p_original_mt.mp3',
            "timeRange"=>"02:13-02:27",
            "content"=>"At the back of the house they have a backyard, where they plant all kinds of vegetables and fruit trees, including tomatoes, cabbages, pears and apples. ",
            "text"=>array("type"=>"audio","text"=>"What are planted in the backyard?","media_filename"=>'media/u5pcq.mp3',"timeRange"=>"01:09-01:12"),
            "scores"=>7,
            "items"=>array(
                "0"=>array("item"=>"Tomatoes and cabbages.","isCorrect"=>false),
                "1"=>array("item"=>"Pears and apples.", "isCorrect"=>false),
                "2"=>array("item"=>"Both vegetables and fruit trees.", "isCorrect"=>true),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_listen_001.png"
        );


        $data['events'][] = array(
            "num"=>"6",
            "content_id"=>895,
            "type"=>"MTmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u5d_original_mt.mp3',
            "timeRange"=>"00:00-00:10",
            "content"=>"Bill's high school classmate Linda comes to visit him during the spring break. They meet in front of Bill's dormitory.",
            "text"=>array("type"=>"audio","text"=>"When does Linda visit Bill?","media_filename"=>'media/u5dcq.mp3',"timeRange"=>"00:00-00:03"),
            "scores"=>7,
            "items"=>array(
                "0"=>array("item"=>"During the vacation.","isCorrect"=>true),
                "1"=>array("item"=>"During the class break.", "isCorrect"=>false),
                "2"=>array("item"=>"During the winter break.", "isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_listen_001.png"
        );

        $data['events'][] = array(
            "num"=>"7",
            "content_id"=>896,
            "type"=>"MTmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u5d_original_mt.mp3',
            "timeRange"=>"00:10-00:21",
            "content"=>"Let me show you around. We have three schools on the campus, including the management school, the electronic engineering school, and the tourism school.",
            "text"=>array("type"=>"audio","text"=>"How many schools are there in Bill's university?","media_filename"=>'media/u5dcq.mp3',"timeRange"=>"00:03-00:07"),
            "scores"=>7,
            "items"=>array(
                "0"=>array("item"=>"Two.","isCorrect"=>false),
                "1"=>array("item"=>"Three.", "isCorrect"=>true),
                "2"=>array("item"=>"Four.", "isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_listen_001.png"
        );

        $data['events'][] = array(
            "num"=>"8",
            "content_id"=>897,
            "type"=>"MTmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u5d_original_mt.mp3',
            "timeRange"=>"00:21-00:32",
            "content"=>"I've heard that there is a famous café at the tourism school. Can we go and have a look?Sure. Here we are. This is the tourism school. ",
            "text"=>array("type"=>"audio","text"=>"Where is the café?","media_filename"=>'media/u5dcq.mp3',"timeRange"=>"00:22-00:24"),
            "scores"=>7,
            "items"=>array(
                "0"=>array("item"=>"At the tourism school.","isCorrect"=>true),
                "1"=>array("item"=>"At the engineering school.", "isCorrect"=>false),
                "2"=>array("item"=>"At the management school.", "isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_listen_001.png"
        );

        $data['events'][] = array(
            "num"=>"9",
            "content_id"=>898,
            "type"=>"MTmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u5d_original_mt.mp3',
            "timeRange"=>"00:47-01:02",
            "content"=>"All the students that majored in hospitality practice cooking and servicing here in the café. There is a large kitchen back there. There are altogether thirty tables and it serves mainly western food.",
            "text"=>array("type"=>"audio","text"=>"What food does the café mainly serve?","media_filename"=>'media/u5dcq.mp3',"timeRange"=>"00:29-00:32"),
            "scores"=>7,
            "items"=>array(
                "0"=>array("item"=>"Chinese food.","isCorrect"=>false),
                "1"=>array("item"=>"Western food.", "isCorrect"=>true),
                "2"=>array("item"=>"Indian food.", "isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_listen_001.png"
        );

        $data['events'][] = array(
            "num"=>"10",
            "content_id"=>899,
            "type"=>"MTmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u5d_original_mt.mp3',
            "timeRange"=>"02:20-02:29",
            "content"=>"Well, it's time for lunch. How about going downtown to try some local cuisines? Why not? Let's go.",
            "text"=>array("type"=>"audio","text"=>"Where will Bill and Linda have lunch together?","media_filename"=>'media/u5dcq.mp3',"timeRange"=>"01:37-01:40"),
            "scores"=>7,
            "items"=>array(
                "0"=>array("item"=>"In the café at Bill's university.","isCorrect"=>false),
                "1"=>array("item"=>"In the dining hall at Bill's university.", "isCorrect"=>false),
                "2"=>array("item"=>"In a restaurant in the city.", "isCorrect"=>true),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_listen_001.png"
        );

         $this->saveEventListToDatabases($data);$a =  json_encode($data);
        $fp = fopen('json112.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
        return;
    }

    public function getPart113(){
        $data = array(
            "unit_id"       =>5,
            "lesson_id"     =>32,
            "part_id"       =>113,
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
            "content_id"=>900,
            "type"=>"SRmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u5p_original_mt.mp3',
            "timeRange"=>"00:21-00:33",
            "content"=>"Entering the living room you will see a web television hanging on the wall and a sofa opposite it. Next to the television is a fireplace.",
            "text"=>array("type"=>"audio","text"=>"Where is the web television?","media_filename"=>'media/u5pcq.mp3',"timeRange"=>"00:22-00:25"),
            "scores"=>4,
            "items"=>array(
                "0"=>array("item"=>"It's hanging on the wall opposite the fireplace.","answer"=>"It's hanging on the wall opposite the fireplace","isCorrect"=>false),
                "1"=>array("item"=>"It's sitting on the cabinet next to the fireplace.","answer"=>"It's sitting on the cabinet next to the fireplace", "isCorrect"=>false),
                "2"=>array("item"=>"It's on the wall opposite the sofa. ","answer"=>"It's on the wall opposite the sofa", "isCorrect"=>true),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"2",
            "content_id"=>901,
            "type"=>"SRmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u5p_original_mt.mp3',
            "timeRange"=>"01:13-01:31",
            "content"=>"All the cooking ware, such as pans, pots and other utensils, are hung on the wall above the stove. All the table ware, such as plates, bowls, and cutlery, are kept in a cabinet opposite the refrigerator.",
            "text"=>array("type"=>"audio","text"=>"Where are forks and knives kept in the kitchen?","media_filename"=>'media/u5pcq.mp3',"timeRange"=>"00:47-00:50"),
            "scores"=>4,
            "items"=>array(
                "0"=>array("item"=>"In the cabinet on the left hand-side of the door.","answer"=>"In the cabinet on the left hand-side of the door","isCorrect"=>false),
                "1"=>array("item"=>"In the cabinet opposite the refrigerator.", "answer"=>"In the cabinet opposite the refrigerator","isCorrect"=>true),
                "2"=>array("item"=>"In the cabinet on the wall above the stove.", "answer"=>"In the cabinet on the wall above the stove","isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"3",
            "content_id"=>902,
            "type"=>"SRmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u5p_original_mt.mp3',
            "timeRange"=>"01:31-01:47",
            "content"=>"In the bathroom there is a shower and a bathtub. The sink is next to the toilet. The soap, toothbrushes, and lotions are all kept on the shelf on the other side of the sink. ",
            "text"=>array("type"=>"audio","text"=>"Where are all the soap, toothbrushes, and lotions kept?","media_filename"=>'media/u5pcq.mp3',"timeRange"=>"00:50-00:54"),
            "scores"=>4,
            "items"=>array(
                "0"=>array("item"=>"On the shelf on the wall at the end of the bathtub.","answer"=>"On the shelf on the wall at the end of the bath tub","isCorrect"=>false),
                "1"=>array("item"=>"On the shelf on the other side of the sink.", "answer"=>"On the shelf on the other side of the sink","isCorrect"=>true),
                "2"=>array("item"=>"On the shelf in the shower.", "answer"=>"On the shelf in the shower","isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"4",
            "content_id"=>903,
            "type"=>"SRmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u5d_original_mt.mp3',
            "timeRange"=>"01:19-01:27",
            "content"=>"Where is the gym?The gym is right in the north part of the campus. Let's go and see it.",
            "text"=>array("type"=>"audio","text"=>"Where is the gym?","media_filename"=>'media/u5dcq.mp3',"timeRange"=>"00:53-00:55"),
            "scores"=>4,
            "items"=>array(
                "0"=>array("item"=>"In the south of the campus.","answer"=>"In the south of the campus","isCorrect"=>false),
                "1"=>array("item"=>"In the north of the campus.","answer"=>"In the north of the campus", "isCorrect"=>true),
                "2"=>array("item"=>"In the west of the campus.","answer"=>"In the west of the campus", "isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"5",
            "content_id"=>904,
            "type"=>"SRmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u5d_original_mt.mp3',
            "timeRange"=>"01:59-02:08",
            "content"=>"What is on the third floor?The fitness room is on the third floor. You can do many exercises there.",
            "text"=>array("type"=>"audio","text"=>"What is on the third floor?","media_filename"=>'media/u5dcq.mp3',"timeRange"=>"01:19-01:21"),
            "scores"=>4,
            "items"=>array(
                "0"=>array("item"=>"The fitness room.","answer"=>"The fitness room","isCorrect"=>true),
                "1"=>array("item"=>"The locker room.","answer"=>"The locker room", "isCorrect"=>false),
                "2"=>array("item"=>"The basketball court.","answer"=>"The basketball court", "isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"6",
            "content_id"=>905,
            "type"=>"SRmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u5d_original_mt.mp3',
            "timeRange"=>"02:08-02:20",
            "content"=>"Do you have to pay here?No. As a matter of fact, our tuition covers the fee for the gym. You just use your student ID card for entrance.",
            "text"=>array("type"=>"audio","text"=>"How much do students pay to become a member of the gym?","media_filename"=>'media/u5dcq.mp3',"timeRange"=>"01:28-01:32"),
            "scores"=>4,
            "items"=>array(
                "0"=>array("item"=>"They just pay a little because the tuition covers most part of the fee.","answer"=>"They just pay a little because the tuition covers most part of the fee","isCorrect"=>false),
                "1"=>array("item"=>"They pay a lot because the tuition doesn't cover the fee.","answer"=>"They pay a lot because the tuition doesn't cover the fee", "isCorrect"=>false),
                "2"=>array("item"=>"They don't have to pay because the tuition already covers the fee.","answer"=>"They don't have to pay because the tuition already covers the fee", "isCorrect"=>true),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_speak_001.png"
        );


         $this->saveEventListToDatabases($data);$a =  json_encode($data);
        $fp = fopen('json113.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
        return;
    }

    public function getPart114(){
        $data = array(
            "unit_id"       =>5,
            "lesson_id"     =>32,
            "part_id"       =>114,
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
            "content_id"=>906,
            "media_filename"=>'media/u5gfi.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"00:11-00:15",
            "scores"=>5,
            "text" => "Linda said that she dropped her purse when she was running for the bus.",
            "answer" => "Linda said that she dropped her purse when she was running for the bus",
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"2",
            "content_id"=>907,
            "media_filename"=>'media/u5gfi.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"00:31-00:35",
            "scores"=>5,
            "text" => "I didn't know that you were waiting, otherwise I would have come sooner.",
            "answer" => "I didn't know that you were waiting otherwise I would have come sooner",
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"3",
            "content_id"=>908,
            "media_filename"=>'media/u5gso.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"00:17-00:20",
            "scores"=>5,
            "text" => "Never have I been abroad before.",
            "answer" => "Never have I been abroad before",
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"4",
            "content_id"=>909,
            "media_filename"=>'media/u5gso.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"00:39-00:43",
            "scores"=>5,
            "text" => "Could you do me a favor by moving the table out of the room?",
            "answer" => "Could you do me a favor by moving the table out of the room",
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"5",
            "content_id"=>910,
            "media_filename"=>'media/u5gsf.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"00:06-00:10",
            "scores"=>5,
            "text" => "Please do come to my birthday party this weekend.",
            "answer" => "Please do come to my birthday party this weekend",
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"6",
            "content_id"=>911,
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
        $fp = fopen('json114.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
        return;
    }

    public function createJson(){
        for($i=98;$i<=114;$i++){
            $function = "getPart".$i;
            $this->$function();
        }
    }
}
