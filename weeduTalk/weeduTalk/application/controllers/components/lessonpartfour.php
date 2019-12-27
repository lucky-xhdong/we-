<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lessonpartfour extends CI_Controller {

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
    public function getPart52(){
        $data = array(
            "unit_id"       =>4,
            "lesson_id"     =>18,
            "part_id"       =>52,
            "media_filename"=>'media/u4p.mp3',
            "media_type"    =>'audio',
            "totalTime"     =>"2:08",
            "part_type"     =>"listening",
            "have_questions"=>false,
            "questions_type"=>"text",
            "keywords"      =>array(
                "drugstore",
                "item",
                "outgoing",
                "professional",
                "fulfill",
                "cheerful",
                "hospitable",
                "frequent",
                "snack",
                "comic pictures",
                "post",
                "social networking",
                "blog",
                "cooperate",
                "supermarket"
            ),
        );
        $data['events'][] = array(
            "num"=>"2",
            'type'=>"text",
            "timeRange"=>"00:00-00:12",
            "text"=>"Hello, this is Channel We. I'm Mr. V. In today's program we will get to know Peter, a shopkeeper of a drugstore, his shop assistant and some of his regular customers.
",
            "media_filename"=>'media/u4p.mp4',
            "media_type"    =>'video',
            "picture"=>"images/u4_p_001.jpg",
            "pictures"=>array()

        );
        $data['events'][] = array(
            "num"=>"3",
            'type'=>"text",
            "timeRange"=>"00:00-00:07",
            "displayKewords"=>true,
            "text"=>"Peter is the shopkeeper of a drugstore which is located across from the office building where Helen works.",
            "picture"=>"images/u4_p_001.jpg"
        );
        $data['events'][] = array(
            "num"=>"4",
            'type'=>"text",
            "timeRange"=>"00:07-00:20",
            "text"=>"His drugstore sells medicine and other various items, such as soda drinks, sweets, cheap cosmetics, cleaning supplies, magazines, as well as bread and butter.",
            "picture"=>"images/u4_p_001.jpg"
        );
        $data['events'][] = array(
            "num"=>"5",
            'type'=>"text",
            "timeRange"=>"00:20-00:26",
            "text"=>"Peter is outgoing, friendly and highly interested in sports.",
            "picture"=>"images/u4_p_002.jpg"
        );
        $data['events'][] = array(
            "num"=>"6",
            'type'=>"text",
            "timeRange"=>"00:26-00:33",
            "text"=>"He used to practice tennis when he was a young child who wanted to become a professional tennis player.",
            "picture"=>"images/u4_p_002.jpg"
        );
        $data['events'][] = array(
            "num"=>"7",
            'type'=>"text",
            "timeRange"=>"00:33-00:41",
            "text"=>"If he hadn't had a serious foot injury, he would have been an excellent tennis player and fulfilled his dream.",
            "picture"=>"images/u4_p_002.jpg"
        );

        $data['events'][] = array(
            "num"=>"8",
            'type'=>"text",
            "timeRange"=>"00:41-00:47",
            "text"=>"Now he still loves to do sports with his friends in his spare time during the weekend.",
            "picture"=>"images/u4_p_002.jpg"
        );

        $data['events'][] = array(
            "num"=>"9",
            'type'=>"text",
            "timeRange"=>"00:47-00:55",
            "text"=>"This is Bill, the shop assistant, who has been working in the drugstore since it opened 5 years ago.",
            "picture"=>"images/u4_p_003.jpg"
        );

        $data['events'][] = array(
            "num"=>"10",
            'type'=>"text",
            "timeRange"=>"00:55-01:04",
            "text"=>"This dark-haired and dark-eyed Italian boy is quite popular with all the customers because he is so cheerful and hospitable.",
            "picture"=>"images/u4_p_003.jpg"
        );

        $data['events'][] = array(
            "num"=>"11",
            'type'=>"text",
            "timeRange"=>"01:04-01:08",
            "text"=>"He always smiles whenever he serves them.",
            "picture"=>"images/u4_p_003.jpg"
        );

        $data['events'][] = array(
            "num"=>"12",
            'type'=>"text",
            "timeRange"=>"01:08-01:19",
            "text"=>"One of the regular customers is Sue, who works as a UI designer in an international software company on the 22nd floor in the opposite building.",
            "picture"=>"images/u4_p_004.jpg"
        );

        $data['events'][] = array(
            "num"=>"13",
            'type'=>"text",
            "timeRange"=>"01:19-01:29",
            "text"=>"She visits the drugstore two or three times a week for lunch food or other things during the weekdays as it is so close to where she works.",
            "picture"=>"images/u4_p_004.jpg"
        );

        $data['events'][] = array(
            "num"=>"14",
            'type'=>"text",
            "timeRange"=>"01:29-01:33",
            "text"=>"It is also the only drugstore in the neighborhood.",
            "picture"=>"images/u4_p_004.jpg"
        );

        $data['events'][] = array(
            "num"=>"15",
            'type'=>"text",
            "timeRange"=>"01:33-01:42",
            "text"=>"Another frequent customer to the drugstore is a painter, Joe, whose workshop is just one block away, behind the office building.",
            "picture"=>"images/u4_p_005.jpg"
        );

        $data['events'][] = array(
            "num"=>"16",
            'type'=>"text",
            "timeRange"=>"01:42-01:49",
            "text"=>"He often works until very late and goes to the drugstore for cold drinks and snacks.",
            "picture"=>"images/u4_p_005.jpg"
        );

        $data['events'][] = array(
            "num"=>"17",
            'type'=>"text",
            "timeRange"=>"01:49-01:53",
            "text"=>"Joe is good at drawing comic pictures.",
            "picture"=>"images/u4_p_005.jpg"
        );

        $data['events'][] = array(
            "num"=>"18",
            'type'=>"text",
            "timeRange"=>"01:53-02:06",
            "text"=>"Last month, he posted one comic story on his social networking blog on the internet and got the attention of a worldwide film company, which is now trying to find a way to cooperate with him.",
            "picture"=>"images/u4_p_005.jpg"
        );

        $data['events'][] = array(
            "num"=>"19",
            'type'=>"text",
            "timeRange"=>"02:06-02:11",
            "text"=>"Peter loves his store and enjoys seeing people in and out.",
            "picture"=>"images/u4_p_006.jpg"
        );

        $data['events'][] = array(
            "num"=>"20",
            'type'=>"text",
            "timeRange"=>"02:11-02:15",
            "text"=>"He dreams of having a big supermarket in the future.",
            "picture"=>"images/u4_p_006.jpg"
        );

         $this->saveEventListToDatabases($data);$a =  json_encode($data);
        $fp = fopen('json52.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
        return;

    }

    public function getPart53(){

        $data = array(
            "unit_id"       =>4,
            "lesson_id"     =>18,
            "part_id"       =>53,
            "media_filename"=>'media/u4p.mp3',
            "media_type"    =>'audio',
            "totalTime"     =>"2:08",
            "part_type"     =>"listening",
            "have_questions"=>false,
            "questions_type"=>"text",
            "keywords"      =>array(
                "drugstore",
                "item",
                "outgoing",
                "professional",
                "fulfill",
                "cheerful",
                "hospitable",
                "frequent",
                "snack",
                "comic pictures",
                "post",
                "social networking",
                "blog",
                "cooperate",
                "supermarket"
            ),
        );
        $data['events'][] = array(
            "num"=>"2",
            'type'=>"text",
            "timeRange"=>"00:00-00:12",
            "text"=>"Hello, this is Channel We. I'm Mr. V. In today's program we will get to know Peter, a shopkeeper of a drugstore, his shop assistant and some of his regular customers.",
            "media_filename"=>'media/u4p.mp4',
            "media_type"    =>'video',
            "picture"=>"images/u4_p_001.jpg",
            "pictures"=>array()

        );
        $data['events'][] = array(
            "num"=>"3",
            'type'=>"text",
            "timeRange"=>"00:00-00:07",
            "displayKewords"=>true,
            "text"=>"Peter is the shopkeeper of a drugstore which is located across from the office building where Helen works.",
            "picture"=>"images/u4_p_001.jpg"
        );
        $data['events'][] = array(
            "num"=>"4",
            'type'=>"text",
            "timeRange"=>"00:07-00:20",
            "text"=>"His drugstore sells medicine and other various items, such as soda drinks, sweets, cheap cosmetics, cleaning supplies, magazines, as well as bread and butter.",
            "picture"=>"images/u4_p_001.jpg"
        );

        $data['events'][] = array(
            "num"=>"5",
            'type'=>"multipleChoices",
            "timeRange"=>"",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"6",
                    "content_id"=>550,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4pcq.mp3',
                    "timeRange"=>"00:00-00:03",
                    "text"=>"Where is Peter's drugstore located?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Next to the office building where Helen works.","isCorrect"=>false),
                        "1"=>array("item"=>"Across from the office building where Helen works.", "isCorrect"=>true),
                        "2"=>array("item"=>"One block away from the office building where Helen works.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u4pcq.mp3',
                            "timeRange"=>"00:03-00:08",
                            "text"=>"Peter's drugstore is located across from the office building where Helen works."
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u4pcq.mp3',
                            "timeRange"=>"00:03-00:08",
                            "text"=>"Peter's drugstore is located across from the office building where Helen works."
                        ),
                    ),
                ),
                1=>array(
                    "num"=>"7",
                    "content_id"=>551,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4pcq.mp3',
                    "timeRange"=>"00:08-00:11",
                    "text"=>"Can you buy something to eat at Peter's drugstore?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Yes.","isCorrect"=>true),
                        "1"=>array("item"=>"No.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u4pcq.mp3',
                            "timeRange"=>"00:11-00:17",
                            "text"=>"Peter's drugstore sells bread and butter besides medicine and other various items.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u4pcq.mp3',
                            "timeRange"=>"00:11-00:17",
                            "text"=>"Peter's drugstore sells bread and butter besides medicine and other various items.",
                        ),
                    ),
                )
            )
        );


        $data['events'][] = array(
            "num"=>"8",
            'type'=>"text",
            "timeRange"=>"00:20-00:26",
            "text"=>"Peter is outgoing, friendly and highly interested in sports.",
            "picture"=>"images/u4_p_002.jpg"
        );
        $data['events'][] = array(
            "num"=>"9",
            'type'=>"text",
            "timeRange"=>"00:26-00:33",
            "text"=>"He used to practice tennis when he was a young child who wanted to become a professional tennis player.",
            "picture"=>"images/u4_p_002.jpg"
        );

        $data['events'][] = array(
            "num"=>"10",
            'type'=>"multipleChoices",
            "timeRange"=>"",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"11",
                    "content_id"=>552,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4pcq.mp3',
                    "timeRange"=>"00:17-00:19",
                    "text"=>"Is Peter a sports fan?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Yes.","isCorrect"=>true),
                        "1"=>array("item"=>"No.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u4pcq.mp3',
                            "timeRange"=>"00:19-00:22",
                            "text"=>"Peter is highly interested in sports."
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u4pcq.mp3',
                            "timeRange"=>"00:19-00:22",
                            "text"=>"Peter is highly interested in sports."
                        ),
                    ),
                ),
                1=>array(
                    "num"=>"12",
                    "content_id"=>553,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4pcq.mp3',
                    "timeRange"=>"00:22-00:25",
                    "text"=>"What sports did Peter practice when he was young?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Tennis.","isCorrect"=>true),
                        "1"=>array("item"=>"Table tennis.", "isCorrect"=>false),
                        "2"=>array("item"=>"Badminton.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u4pcq.mp3',
                            "timeRange"=>"00:25-00:29",
                            "text"=>"Peter used to practice tennis when he was a young child.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u4pcq.mp3',
                            "timeRange"=>"00:25-00:29",
                            "text"=>"Peter used to practice tennis when he was a young child.",
                        ),
                    ),
                )
            )
        );


        $data['events'][] = array(
            "num"=>"13",
            'type'=>"text",
            "timeRange"=>"00:33-00:41",
            "text"=>"If he hadn't had a serious foot injury, he would have been an excellent tennis player and fulfilled his dream.",
            "picture"=>"images/u4_p_002.jpg"
        );

        $data['events'][] = array(
            "num"=>"14",
            'type'=>"text",
            "timeRange"=>"00:41-00:47",
            "text"=>"Now he still loves to do sports with his friends in his spare time during the weekend.",
            "picture"=>"images/u4_p_002.jpg"
        );


        $data['events'][] = array(
            "num"=>"15",
            'type'=>"multipleChoices",
            "timeRange"=>"",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"16",
                    "content_id"=>554,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4pcq.mp3',
                    "timeRange"=>"00:29-00:33",
                    "text"=>"What prevented Peter from becoming an excellent tennis player?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Lack of professional training.","isCorrect"=>false),
                        "1"=>array("item"=>"A serious foot injury.", "isCorrect"=>true),
                        "2"=>array("item"=>"Lack of enthusiasm. ", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u4pcq.mp3',
                            "timeRange"=>"00:33-00:38",
                            "text"=>"A serious foot injury prevented Peter from becoming an excellent tennis player."
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u4pcq.mp3',
                            "timeRange"=>"00:33-00:38",
                            "text"=>"A serious foot injury prevented Peter from becoming an excellent tennis player."
                        ),
                    ),
                ),
                1=>array(
                    "num"=>"12",
                    "content_id"=>555,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4pcq.mp3',
                    "timeRange"=>"00:38-00:43",
                    "text"=>"What might Peter do with his friends in his spare time during the weekend?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Doing exercises.","isCorrect"=>true),
                        "1"=>array("item"=>"Watching movies.", "isCorrect"=>false),
                        "2"=>array("item"=>"Playing chess.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u4pcq.mp3',
                            "timeRange"=>"00:43-00:48",
                            "text"=>"As Peter loves to do sports with his friends in his spare time during the weekend.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u4pcq.mp3',
                            "timeRange"=>"00:43-00:48",
                            "text"=>"As Peter loves to do sports with his friends in his spare time during the weekend.",
                        ),
                    ),
                )
            )
        );

        $data['events'][] = array(
            "num"=>"13",
            'type'=>"text",
            "timeRange"=>"00:47-00:55",
            "text"=>"This is Bill, the shop assistant, who has been working in the drugstore since it opened 5 years ago.",
            "picture"=>"images/u4_p_003.jpg"
        );

        $data['events'][] = array(
            "num"=>"14",
            'type'=>"text",
            "timeRange"=>"00:55-01:04",
            "text"=>"This dark-haired and dark-eyed Italian boy is quite popular with all the customers because he is so cheerful and hospitable.",
            "picture"=>"images/u4_p_003.jpg"
        );

        $data['events'][] = array(
            "num"=>"15",
            'type'=>"text",
            "timeRange"=>"01:04-01:08",
            "text"=>"He always smiles whenever he serves them.",
            "picture"=>"images/u4_p_003.jpg"
        );

        $data['events'][] = array(
            "num"=>"16",
            'type'=>"multipleChoices",
            "timeRange"=>"",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"17",
                    "content_id"=>556,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4pcq.mp3',
                    "timeRange"=>"00:48-00:54",
                    "text"=>"How many years has Bill, the shop assistant, been working in Peter's drugstore?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"One year ago.","isCorrect"=>false),
                        "1"=>array("item"=>"Just 5 months.", "isCorrect"=>false),
                        "2"=>array("item"=>"More than 5 years.", "isCorrect"=>true),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u4pcq.mp3',
                            "timeRange"=>"00:54-00:59",
                            "text"=>"Bill has been working in the drugstore since it opened 5 years ago."
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u4pcq.mp3',
                            "timeRange"=>"00:54-00:59",
                            "text"=>"Bill has been working in the drugstore since it opened 5 years ago."
                        ),
                    ),
                ),
                1=>array(
                    "num"=>"18",
                    "content_id"=>557,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4pcq.mp3',
                    "timeRange"=>"00:59-01:01",
                    "text"=>"Where does Bill come from?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Italy.","isCorrect"=>true),
                        "1"=>array("item"=>"Austria.", "isCorrect"=>false),
                        "2"=>array("item"=>"Egypt.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u4pcq.mp3',
                            "timeRange"=>"01:01-01:03",
                            "text"=>"Bill comes from Italy.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u4pcq.mp3',
                            "timeRange"=>"01:01-01:03",
                            "text"=>"Bill comes from Italy.",
                        ),
                    ),
                ),
                2=>array(
                    "num"=>"19",
                    "content_id"=>558,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4pcq.mp3',
                    "timeRange"=>"01:03-01:07",
                    "text"=>"Bill is popular with all the customers because________.",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"He always smiles.","isCorrect"=>false),
                        "1"=>array("item"=>"He is friendly and outgoing.", "isCorrect"=>true),
                        "2"=>array("item"=>"He likes talking with people.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u4pcq.mp3',
                            "timeRange"=>"01:07-01:13",
                            "text"=>"Bill is quite popular with all the customers because he is so cheerful and hospitable.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u4pcq.mp3',
                            "timeRange"=>"01:07-01:13",
                            "text"=>"Bill is quite popular with all the customers because he is so cheerful and hospitable.",
                        ),
                    ),
                )
            )
        );


        $data['events'][] = array(
            "num"=>"20",
            'type'=>"text",
            "timeRange"=>"01:08-01:19",
            "text"=>"One of the regular customers is Sue, who works as a UI designer in an international software company on the 22nd floor in the opposite building.",
            "picture"=>"images/u4_p_004.jpg"
        );

        $data['events'][] = array(
            "num"=>"21",
            'type'=>"text",
            "timeRange"=>"01:19-01:29",
            "text"=>"She visits the drugstore two or three times a week for lunch food or other things during the weekdays as it is so close to where she works.",
            "picture"=>"images/u4_p_004.jpg"
        );

        $data['events'][] = array(
            "num"=>"22",
            'type'=>"text",
            "timeRange"=>"01:29-01:33",
            "text"=>"It is also the only drugstore in the neighborhood.",
            "picture"=>"images/u4_p_004.jpg"
        );

        $data['events'][] = array(
            "num"=>"23",
            'type'=>"multipleChoices",
            "timeRange"=>"",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"24",
                    "content_id"=>559,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4pcq.mp3',
                    "timeRange"=>"01:13-01:15",
                    "text"=>"What does Sue do?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"She is a software programmer.","isCorrect"=>false),
                        "1"=>array("item"=>"She is an Engineer.", "isCorrect"=>false),
                        "2"=>array("item"=>"She is a UI designer.", "isCorrect"=>true),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u4pcq.mp3',
                            "timeRange"=>"01:15-01:20",
                            "text"=>"Sue works as a UI designer in an international software company."
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u4pcq.mp3',
                            "timeRange"=>"01:15-01:20",
                            "text"=>"Sue works as a UI designer in an international software company."
                        ),
                    ),
                ),
                1=>array(
                    "num"=>"25",
                    "content_id"=>560,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4pcq.mp3',
                    "timeRange"=>"01:20-01:24",
                    "text"=>"How often does Sue come to Peter's drugstore?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Two or three times a day.","isCorrect"=>false),
                        "1"=>array("item"=>"Two or three times a week.", "isCorrect"=>true),
                        "2"=>array("item"=>"Once in a while.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u4pcq.mp3',
                            "timeRange"=>"01:24-01:28",
                            "text"=>"Sue visits the drugstore two or three times a week.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u4pcq.mp3',
                            "timeRange"=>"01:24-01:28",
                            "text"=>"Sue visits the drugstore two or three times a week.",
                        ),
                    ),
                ),
                2=>array(
                    "num"=>"26",
                    "content_id"=>561,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4pcq.mp3',
                    "timeRange"=>"01:28-01:32",
                    "text"=>"Does Sue come to Peter's drugstore to buy medicine?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Yes.","isCorrect"=>false),
                        "1"=>array("item"=>"No.", "isCorrect"=>true)
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u4pcq.mp3',
                            "timeRange"=>"01:32-01:38",
                            "text"=>"Sue visits the drugstore two or three times a week for lunch food or other things.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u4pcq.mp3',
                            "timeRange"=>"01:32-01:38",
                            "text"=>"Sue visits the drugstore two or three times a week for lunch food or other things.",
                        ),
                    ),
                )
            )
        );

        $data['events'][] = array(
            "num"=>"27",
            'type'=>"text",
            "timeRange"=>"01:33-01:42",
            "text"=>"Another frequent customer to the drugstore is a painter, Joe, whose workshop is just one block away, behind the office building.",
            "picture"=>"images/u4_p_005.jpg"
        );

        $data['events'][] = array(
            "num"=>"28",
            'type'=>"text",
            "timeRange"=>"01:42-01:49",
            "text"=>"He often works until very late and goes to the drugstore for cold drinks and snacks.",
            "picture"=>"images/u4_p_005.jpg"
        );

        $data['events'][] = array(
            "num"=>"29",
            'type'=>"text",
            "timeRange"=>"01:49-01:53",
            "text"=>"Joe is good at drawing comic pictures.",
            "picture"=>"images/u4_p_005.jpg"
        );

        $data['events'][] = array(
            "num"=>"30",
            'type'=>"text",
            "timeRange"=>"01:53-02:06",
            "text"=>"Last month, he posted one comic story on his social networking blog on the internet and got the attention of a worldwide film company, which is now trying to find a way to cooperate with him.",
            "picture"=>"images/u4_p_005.jpg"
        );

        $data['events'][] = array(
            "num"=>"31",
            'type'=>"multipleChoices",
            "timeRange"=>"",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"32",
                    "content_id"=>562,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4pcq.mp3',
                    "timeRange"=>"01:38-01:41",
                    "text"=>"Does Joe often come to Peter's drugstore?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Yes.","isCorrect"=>true),
                        "1"=>array("item"=>"No.", "isCorrect"=>false)
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u4pcq.mp3',
                            "timeRange"=>"01:41-01:45",
                            "text"=>"Joe is another frequent customer to the drugstore."
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u4pcq.mp3',
                            "timeRange"=>"01:41-01:45",
                            "text"=>"Joe is another frequent customer to the drugstore."
                        ),
                    ),
                ),
                1=>array(
                    "num"=>"33",
                    "content_id"=>563,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4pcq.mp3',
                    "timeRange"=>"01:45-01:49",
                    "text"=>"Joe comes to Peter's store to buy__________.",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Drinks and snacks.","isCorrect"=>true),
                        "1"=>array("item"=>"Cigarettes.", "isCorrect"=>false),
                        "2"=>array("item"=>"Lunch.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u4pcq.mp3',
                            "timeRange"=>"01:49-01:55",
                            "text"=>"Joe often works until very late and goes to the drugstore for cold drinks and snacks.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u4pcq.mp3',
                            "timeRange"=>"01:49-01:55",
                            "text"=>"Joe often works until very late and goes to the drugstore for cold drinks and snacks.",
                        ),
                    ),
                ),
                2=>array(
                    "num"=>"34",
                    "content_id"=>564,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4pcq.mp3',
                    "timeRange"=>"01:55-02:00",
                    "text"=>"What did Joe post on his social networking blog last month?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Funny photos.","isCorrect"=>false),
                        "1"=>array("item"=>"A comic story.", "isCorrect"=>true),
                        "2"=>array("item"=>"Comic pictures.", "isCorrect"=>false)
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u4pcq.mp3',
                            "timeRange"=>"02:00-02:06",
                            "text"=>"Last month, Joe posted one comic story on his social networking blog.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u4pcq.mp3',
                            "timeRange"=>"02:00-02:06",
                            "text"=>"Last month, Joe posted one comic story on his social networking blog.",
                        ),
                    ),
                )
            )
        );

        $data['events'][] = array(
            "num"=>"35",
            'type'=>"text",
            "timeRange"=>"02:06-02:11",
            "text"=>"Peter loves his store and enjoys seeing people in and out.",
            "picture"=>"images/u4_p_006.jpg"
        );

        $data['events'][] = array(
            "num"=>"36",
            'type'=>"text",
            "timeRange"=>"02:11-02:15",
            "text"=>"He dreams of having a big supermarket in the future.",
            "picture"=>"images/u4_p_006.jpg"
        );

         $this->saveEventListToDatabases($data);$a =  json_encode($data);
        $fp = fopen('json53.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
        return;

    }


    public function getPart54(){

        $data = array(
            "unit_id"       =>4,
            "lesson_id"     =>18,
            "part_id"       =>54,
            "media_filename"=>'media/u4p.mp3',
            "media_type"    =>'audio',
            "totalTime"     =>"2:08",
            "part_type"     =>"listening",
            "have_questions"=>false,
            "questions_type"=>"text",
            "keywords"      =>array(
                "drugstore",
                "item",
                "outgoing",
                "professional",
                "fulfill",
                "cheerful",
                "hospitable",
                "frequent",
                "snack",
                "comic pictures",
                "post",
                "social networking",
                "blog",
                "cooperate",
                "supermarket"
            ),
        );
        $data['events'][] = array(
            "num"=>"2",
            'type'=>"text",
            "timeRange"=>"00:00-00:12",
            "text"=>"Hello, this is Channel We. I'm Mr. V. In today's program we will get to know Peter, a shopkeeper of a drugstore, his shop assistant and some of his regular customers.",
            "media_filename"=>'media/u4p.mp4',
            "media_type"    =>'video',
            "picture"=>"images/u4_p_001.jpg",
            "pictures"=>array()

        );
        $data['events'][] = array(
            "num"=>"3",
            'type'=>"text",
            "timeRange"=>"00:00-00:07",
            "displayKewords"=>true,
            "text"=>"Peter is the shopkeeper of a drugstore which is located across from the office building where Helen works.",
            "picture"=>"images/u4_p_001.jpg"
        );
        $data['events'][] = array(
            "num"=>"4",
            'type'=>"text",
            "timeRange"=>"00:07-00:20",
            "text"=>"His drugstore sells medicine and other various items, such as soda drinks, sweets, cheap cosmetics, cleaning supplies, magazines, as well as bread and butter.",
            "picture"=>"images/u4_p_001.jpg"
        );

        $data['events'][] = array(
            "num"=>"5",
            "content_id"=>565,
            'type'=>"sr_reading",
            "timeRange"=>"00:20-00:26",
            "scores"=>1,
            "text"=>"Peter is outgoing, friendly and highly interested in sports.",
            "answer"=>"Peter is outgoing, friendly and highly interested in sports",
            "picture"=>"images/u4_p_001.png"
        );
        $data['events'][] = array(
            "num"=>"6",
            'type'=>"text",
            "timeRange"=>"00:26-00:33",
            "text"=>"He used to practice tennis when he was a young child who wanted to become a professional tennis player.",
            "picture"=>"images/u4_p_002.jpg"
        );
        $data['events'][] = array(
            "num"=>"7",
            "content_id"=>566,
            'type'=>"sr_reading",
            "scores"=>1,
            "timeRange"=>"00:33-00:41",
            "text"=>"If he hadn't had a serious foot injury.",
            "answer"=>"If he hadn't had a serious foot injury",
            "picture"=>"images/u4_p_002.jpg"
        );

        $data['events'][] = array(
            "num"=>"8",
            "content_id"=>567,
            'type'=>"sr_reading",
            "scores"=>1,
            "timeRange"=>"00:33-00:41",
            "text"=>"He would have been an excellent tennis player and fulfilled his dream.",
            "answer"=>"He would have been an excellent tennis player and fulfilled his dream.",
            "picture"=>"images/u4_p_002.jpg"
        );

        $data['events'][] = array(
            "num"=>"9",
            'type'=>"text",
            "timeRange"=>"00:41-00:47",
            "text"=>"Now he still loves to do sports with his friends in his spare time during the weekend.",
            "picture"=>"images/u4_p_002.jpg"
        );

        $data['events'][] = array(
            "num"=>"10",
            "content_id"=>568,
            'type'=>"sr_reading",
            "scores"=>1,
            "timeRange"=>"00:47-00:55",
            "text"=>"This is Bill, the shop assistant.",
            "answer"=>"This is Bill, the shop assistant.",
            "picture"=>"images/u4_p_003.jpg"
        );

        $data['events'][] = array(
            "num"=>"11",
            "content_id"=>569,
            'type'=>"sr_reading",
            "scores"=>1,
            "timeRange"=>"00:47-00:55",
            "text"=>"Who has been working in the drugstore since it opened 5 years ago.",
            "answer"=>"Who has been working in the drugstore since it opened 5 years ago.",
            "picture"=>"images/u4_p_003.jpg"
        );

        $data['events'][] = array(
            "num"=>"12",
            'type'=>"text",
            "timeRange"=>"00:55-01:04",
            "text"=>"This dark-haired and dark-eyed Italian boy is quite popular with all the customers because he is so cheerful and hospitable.",
            "picture"=>"images/u4_p_003.jpg"
        );

        $data['events'][] = array(
            "num"=>"13",
            'type'=>"text",
            "timeRange"=>"01:04-01:08",
            "text"=>"He always smiles whenever he serves them.",
            "picture"=>"images/u4_p_003.jpg"
        );

        $data['events'][] = array(
            "num"=>"14",
            "content_id"=>570,
            'type'=>"sr_reading",
            "scores"=>1,
            "timeRange"=>"01:08-01:19",
            "text"=>"One of the regular customers is Sue.",
            "answer"=>"One of the regular customers is Sue.",
            "picture"=>"images/u4_p_004.jpg"
        );

        $data['events'][] = array(
            "num"=>"15",
            "content_id"=>571,
            'type'=>"sr_reading",
            "scores"=>1,
            "timeRange"=>"01:08-01:19",
            "text"=>" who works as a UI designer in an international software company.",
            "answer"=>" who works as a UI designer in an international software company.",
            "picture"=>"images/u4_p_004.jpg"
        );


        $data['events'][] = array(
            "num"=>"16",
            "content_id"=>572,
            'type'=>"sr_reading",
            "scores"=>1,
            "timeRange"=>"01:08-01:19",
            "text"=>"On the 22nd floor in the opposite building.",
            "answer"=>"On the 22nd floor in the opposite building.",
            "picture"=>"images/u4_p_004.jpg"
        );

        $data['events'][] = array(
            "num"=>"17",
            'type'=>"text",
            "timeRange"=>"01:19-01:29",
            "text"=>"She visits the drugstore two or three times a week for lunch food or other things during the weekdays as it is so close to where she works.",
            "picture"=>"images/u4_p_004.jpg"
        );

        $data['events'][] = array(
            "num"=>"18",
            'type'=>"text",
            "timeRange"=>"01:29-01:33",
            "text"=>"It is also the only drugstore in the neighborhood.",
            "picture"=>"images/u4_p_004.jpg"
        );

        $data['events'][] = array(
            "num"=>"19",
            'type'=>"text",
            "timeRange"=>"01:33-01:42",
            "text"=>"Another frequent customer to the drugstore is a painter, Joe, whose workshop is just one block away, behind the office building.",
            "picture"=>"images/u4_p_005.jpg"
        );

        $data['events'][] = array(
            "num"=>"20",
            "content_id"=>573,
            'type'=>"sr_reading",
            "scores"=>1,
            "timeRange"=>"01:42-01:49",
            "text"=>"He often works until very late and goes to the drugstore for cold drinks and snacks.",
            "answer"=>"He often works until very late and goes to the drugstore for cold drinks and snacks",
            "picture"=>"images/u4_p_005.jpg"
        );

        $data['events'][] = array(
            "num"=>"21",
            "content_id"=>574,
            'type'=>"sr_reading",
            "scores"=>1,
            "timeRange"=>"01:49-01:53",
            "text"=>"Joe is good at drawing comic pictures.",
            "answer"=>"Joe is good at drawing comic pictures",
            "picture"=>"images/u4_p_005.jpg"
        );

        $data['events'][] = array(
            "num"=>"22",
            'type'=>"text",
            "timeRange"=>"01:53-02:06",
            "text"=>"Last month, he posted one comic story on his social networking blog on the internet and got the attention of a worldwide film company, which is now trying to find a way to cooperate with him.",
            "picture"=>"images/u4_p_005.jpg"
        );

        $data['events'][] = array(
            "num"=>"23",
            "content_id"=>575,
            'type'=>"sr_reading",
            "scores"=>1,
            "timeRange"=>"02:06-02:11",
            "text"=>"Peter loves his store and enjoys seeing people in and out.",
            "answer"=>"Peter loves his store and enjoys seeing people in and out",
            "picture"=>"images/u4_p_006.jpg"
        );

        $data['events'][] = array(
            "num"=>"25",
            'type'=>"text",
            "timeRange"=>"02:11-02:15",
            "text"=>"He dreams of having a big supermarket in the future.",
            "picture"=>"images/u4_p_006.jpg"
        );

         $this->saveEventListToDatabases($data);$a =  json_encode($data);
        $fp = fopen('json54.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
        return;

    }


    public function getPart55(){
        $data = array(
            "unit_id"       =>4,
            "lesson_id"     =>19,
            "part_id"       =>55,
            "media_filename"=>'media/u4d.mp4',
            "media_type"    =>'video',
            "totalTime"     =>"4:05",
            "part_type"     =>"dialog",
            "have_questions"=>false,
            "questions_type"=>"text",
            "keywords"      =>array(
                "be fed up with",
                "impressive",
                "delicious",
                "fabulous",
                "seasoning",
                "chain restaurants",
                "cashier counter",
                "management",
                "family business"
            ),
        );

        $data['events'][] = array(
            "num"=>"1",
            'type'=>"text",
            "timeRange"=>"00:00-00:03",
            "text"=>"Alice and Helen are colleagues.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"2",
            'type'=>"text",
            "timeRange"=>"00:03-00:05",
            "text"=>"It's lunch time.",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"3",
            'type'=>"text",
            "timeRange"=>"00:05-00:09",
            "text"=>"Alice Austin wants to have lunch with Helen Miller.",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"4",
            'type'=>"text",
            "timeRange"=>"00:09-00:11",
            "text"=>"Hi, Helen.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"5",
            'type'=>"text",
            "timeRange"=>"00:11-00:14",
            "text"=>"It's time for lunch.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"6",
            'type'=>"text",
            "timeRange"=>"00:14-00:17",
            "text"=>"What do you want to have?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"7",
            'type'=>"text",
            "timeRange"=>"00:17-00:22",
            "text"=>"Well, I have had fast food for two days and I'm fed up with it.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"8",
            'type'=>"text",
            "timeRange"=>"00:22-00:24",
            "text"=>"How about seafood?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"9",
            'type'=>"text",
            "timeRange"=>"00:24-00:28",
            "text"=>"I know a Spanish restaurant not far away.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"10",
            'type'=>"text",
            "timeRange"=>"00:28-00:34",
            "text"=>"My friend took me there two weeks ago and the paella was very impressive.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"11",
            'type'=>"text",
            "timeRange"=>"00:34-00:37",
            "text"=>"Great, why not!",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"12",
            'type'=>"text",
            "timeRange"=>"00:37-00:43",
            "text"=>"Hmm. It looks so delicious and tastes fabulous!",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"13",
            'type'=>"text",
            "timeRange"=>"00:43-00:48",
            "text"=>"All kinds of seasonings here are shipped from Spain.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"14",
            'type'=>"text",
            "timeRange"=>"00:48-00:52",
            "text"=>"It sounds like you know a lot about the restaurant.",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"15",
            'type'=>"text",
            "timeRange"=>"00:52-00:57",
            "text"=>"Well, my friend told me something about this restaurant.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"16",
            'type'=>"text",
            "timeRange"=>"00:57-01:01",
            "text"=>"Look at those black and white pictures on the wall.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"17",
            'type'=>"text",
            "timeRange"=>"01:01-01:05",
            "text"=>"This couple was the founder of the restaurant in Spain.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"18",
            'type'=>"text",
            "timeRange"=>"01:05-01:09",
            "text"=>"They used to be fishermen in a small village.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"19",
            'type'=>"text",
            "timeRange"=>"01:09-01:14",
            "text"=>"Later on, they started working and running seafood restaurants.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"20",
            'type'=>"text",
            "timeRange"=>"01:14-01:18",
            "text"=>"They have had 5 chain restaurants there.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"21",
            'type'=>"text",
            "timeRange"=>"01:18-01:30",
            "text"=>"Their son, David, moved to the U.S. about 25 years ago, and set up the first restaurant in a town in New Jersey on the east coast with his brother Jason.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"22",
            'type'=>"text",
            "timeRange"=>"01:30-01:36",
            "text"=>"Then, they set up the second restaurant in Chicago two years later.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"23",
            'type'=>"text",
            "timeRange"=>"01:36-01:42",
            "text"=>"Now, this is the sixth restaurant they have had in this country.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"24",
            'type'=>"text",
            "timeRange"=>"01:42-01:47",
            "text"=>"This restaurant was left to David's niece, Ada, to run.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"25",
            'type'=>"text",
            "timeRange"=>"01:47-01:52",
            "text"=>"The lady behind the cashier counter is Ada.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"26",
            'type'=>"text",
            "timeRange"=>"01:52-01:57:100",
            "text"=>"She graduated from the University of Southern California last year.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"27",
            'type'=>"text",
            "timeRange"=>"01:57-02:01",
            "text"=>"Her major is restaurant and bar management.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"28",
            'type'=>"text",
            "timeRange"=>"02:01-02:04",
            "text"=>"She looks so pretty.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"29",
            'type'=>"text",
            "timeRange"=>"02:04-02:07",
            "text"=>"Is she from Spain, too?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"30",
            'type'=>"text",
            "timeRange"=>"02:07-02:11",
            "text"=>"Actually, she was born in the United States.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"31",
            'type'=>"text",
            "timeRange"=>"02:11-02:16",
            "text"=>"Her father is Spanish and her mother is an American born Indian.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"32",
            'type'=>"text",
            "timeRange"=>"02:16-02:19",
            "text"=>"Who are the cooks here?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"33",
            'type'=>"text",
            "timeRange"=>"02:19-02:23",
            "text"=>"There are three chefs that she has hired here.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"34",
            'type'=>"text",
            "timeRange"=>"02:23-02:28",
            "text"=>"One is her schoolmate who majored in cooking before graduation.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"35",
            'type'=>"text",
            "timeRange"=>"02:28-02:37",
            "text"=>"Another is her uncle Andrew, David's younger brother, and the third one is David's brother-in-law, who is an Indian.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"36",
            'type'=>"text",
            "timeRange"=>"02:37-02:41",
            "text"=>"Who's that young waiter in the green T-shirt over there?",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"37",
            'type'=>"text",
            "timeRange"=>"02:41-02:45",
            "text"=>"Is he her brother or some other relative?",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"38",
            'type'=>"text",
            "timeRange"=>"02:45-02:49",
            "text"=>"Oh, that's her cousin, Tony.",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"39",
            'type'=>"text",
            "timeRange"=>"02:49-02:51",
            "text"=>"He's handsome, right?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"40",
            'type'=>"text",
            "timeRange"=>"02:51-02:53",
            "text"=>"Yes.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"41",
            'type'=>"text",
            "timeRange"=>"02:53-02:57",
            "text"=>"All the employees are her relatives.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"42",
            'type'=>"text",
            "timeRange"=>"02:57-03:00",
            "text"=>"It must be a family business.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"43",
            'type'=>"text",
            "timeRange"=>"03:00-03:02",
            "text"=>"You are right.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"44",
            'type'=>"text",
            "timeRange"=>"03:02-03:06",
            "text"=>"A very successful family business.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"45",
            'type'=>"text",
            "timeRange"=>"03:06-03:10",
            "text"=>"Well, it's nearly time for work.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"46",
            'type'=>"text",
            "timeRange"=>"03:10-03:12",
            "text"=>"Let's go.",
            "picture"=>""
        );

         $this->saveEventListToDatabases($data);$a =  json_encode($data);
        $fp = fopen('json55.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
        return;
    }

    public function getPart56(){

        $data = array(
            "unit_id"       =>4,
            "lesson_id"     =>19,
            "part_id"       =>56,
            "media_filename"=>'media/u4d.mp4',
            "media_type"    =>'video',
            "totalTime"     =>"4:05",
            "part_type"     =>"dialog",
            "have_questions"=>false,
            "questions_type"=>"text",
            "keywords"      =>array(
                "be fed up with",
                "impressive",
                "delicious",
                "fabulous",
                "seasoning",
                "chain restaurants",
                "cashier counter",
                "management",
                "family business"
            ),
        );

        $data['events'][] = array(
            "num"=>"1",
            'type'=>"text",
            "timeRange"=>"00:00-00:03",
            "text"=>"Alice and Helen are colleagues.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"2",
            'type'=>"text",
            "timeRange"=>"00:03-00:05",
            "text"=>"It's lunch time.",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"3",
            'type'=>"text",
            "timeRange"=>"00:05-00:09",
            "text"=>"Alice Austin wants to have lunch with Helen Miller.",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"4",
            'type'=>"text",
            "timeRange"=>"00:09-00:11",
            "text"=>"Hi, Helen.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"5",
            'type'=>"text",
            "timeRange"=>"00:11-00:14",
            "text"=>"It's time for lunch.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"6",
            'type'=>"text",
            "timeRange"=>"00:14-00:17",
            "text"=>"What do you want to have?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"7",
            'type'=>"text",
            "timeRange"=>"00:17-00:22",
            "text"=>"Well, I have had fast food for two days and I'm fed up with it.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"8",
            'type'=>"text",
            "timeRange"=>"00:22-00:24",
            "text"=>"How about seafood?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"9",
            'type'=>"text",
            "timeRange"=>"00:24-00:28",
            "text"=>"I know a Spanish restaurant not far away.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"10",
            'type'=>"text",
            "timeRange"=>"00:28-00:34",
            "text"=>"My friend took me there two weeks ago and the paella was very impressive.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"11",
            'type'=>"text",
            "timeRange"=>"00:34-00:37",
            "text"=>"Great, why not!",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"12",
            'type'=>"multipleChoices",
            "timeRange"=>"",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"13",
                    "content_id"=>576,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4dcq.mp3',
                    "timeRange"=>"00:00-00:05",
                    "text"=>"Why don't Alice and Helen choose fast food for lunch?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Because they have had enough of it.","isCorrect"=>true),
                        "1"=>array("item"=>"Because it is not nutritious.", "isCorrect"=>false),
                        "2"=>array("item"=>"Because they don't like it.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
//                        "Yes"=>array(
//                            "media_type"=>"audio",
//                            "media_filename"=>'media/u4dcq.mp3',
//                            "timeRange"=>"02:06-02:09",
//                            "text"=>"Because they have had enough of it.",
//                        ),
//                        "No"=>array(
//                            "media_type"=>"audio",
//                            "media_filename"=>'media/u4dcq.mp3',
//                            "timeRange"=>"02:06-02:09",
//                            "text"=>"Because they have had enough of it.",
//                        ),
                    ),
                ),
                1=>array(
                    "num"=>"14",
                    "content_id"=>577,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4dcq.mp3',
                    "timeRange"=>"00:05-00:07",
                    "text"=>"What is paella?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"It is a kind of seafood from Japan.","isCorrect"=>false),
                        "1"=>array("item"=>"It is a kind of seafood from Spain.", "isCorrect"=>true),
                        "2"=>array("item"=>"It is a kind of seafood from America.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
//                        "Yes"=>array(
//                            "media_type"=>"audio",
//                            "media_filename"=>'media/u4dcq.mp3',
//                            "timeRange"=>"02:12-02:15",
//                            "text"=>"It is a kind of seafood from Spain.",
//                        ),
//                        "No"=>array(
//                            "media_type"=>"audio",
//                            "media_filename"=>'media/u4dcq.mp3',
//                            "timeRange"=>"02:12-02:15",
//                            "text"=>"It is a kind of seafood from Spain.",
//                        ),
                    ),
                )
            )
        );

        $data['events'][] = array(
            "num"=>"15",
            'type'=>"text",
            "timeRange"=>"00:37-00:43",
            "text"=>"Hmm. It looks so delicious and tastes fabulous!",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"16",
            'type'=>"text",
            "timeRange"=>"00:43-00:48",
            "text"=>"All kinds of seasonings here are shipped from Spain.",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"17",
            'type'=>"multipleChoices",
            "timeRange"=>"",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"18",
                    "content_id"=>578,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4dcq.mp3',
                    "timeRange"=>"00:07-00:11",
                    "text"=>"What does Alice think of paella, the seafood?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"It tastes bad.","isCorrect"=>false),
                        "1"=>array("item"=>"It tastes differently.", "isCorrect"=>false),
                        "2"=>array("item"=>"It tastes good. ", "isCorrect"=>true),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u4dcq.mp3',
                            "timeRange"=>"00:11-00:15",
                            "text"=>"She says it looks so delicious and tastes fabulous!",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u4dcq.mp3',
                            "timeRange"=>"00:11-00:15",
                            "text"=>"She says it looks so delicious and tastes fabulous!",
                        ),
                    ),
                ),
                1=>array(
                    "num"=>"19",
                    "content_id"=>579,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4dcq.mp3',
                    "timeRange"=>"00:15-00:18",
                    "text"=>"What is special about this seafood?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Its flavors.","isCorrect"=>true),
                        "1"=>array("item"=>"Its color.", "isCorrect"=>false),
                        "2"=>array("item"=>"Its smell.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u4dcq.mp3',
                            "timeRange"=>"00:18-00:22",
                            "text"=>"As all kinds of its seasonings are shipped from Spain.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u4dcq.mp3',
                            "timeRange"=>"00:18-00:22",
                            "text"=>"As all kinds of its seasonings are shipped from Spain.",
                        ),
                    ),
                )
            )
        );

        $data['events'][] = array(
            "num"=>"20",
            'type'=>"text",
            "timeRange"=>"00:48-00:52",
            "text"=>"It sounds like you know a lot about the restaurant.",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"21",
            'type'=>"text",
            "timeRange"=>"00:52-00:57",
            "text"=>"Well, my friend told me something about this restaurant.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"22",
            'type'=>"text",
            "timeRange"=>"00:57-01:01",
            "text"=>"Look at those black and white pictures on the wall.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"23",
            'type'=>"text",
            "timeRange"=>"01:01-01:05",
            "text"=>"This couple was the founder of the restaurant in Spain.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"24",
            'type'=>"text",
            "timeRange"=>"01:05-01:09",
            "text"=>"They used to be fishermen in a small village.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"25",
            'type'=>"text",
            "timeRange"=>"01:09-01:14",
            "text"=>"Later on, they started working and running seafood restaurants.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"26",
            'type'=>"text",
            "timeRange"=>"01:14-01:18",
            "text"=>"They have had 5 chain restaurants there.",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"27",
            'type'=>"multipleChoices",
            "timeRange"=>"",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"28",
                    "content_id"=>580,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4dcq.mp3',
                    "timeRange"=>"00:22-00:26",
                    "text"=>"Who set up the seafood restaurant in Spain?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"A fisherman.","isCorrect"=>false),
                        "1"=>array("item"=>"A couple who used to be fishermen.", "isCorrect"=>true),
                        "2"=>array("item"=>"A rich man.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u4dcq.mp3',
                            "timeRange"=>"00:26-00:31",
                            "text"=>"A couple who used to be fishermen in a small village set up the restaurant.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u4dcq.mp3',
                            "timeRange"=>"00:26-00:31",
                            "text"=>"A couple who used to be fishermen in a small village set up the restaurant.",
                        ),
                    ),
                ),
                1=>array(
                    "num"=>"29",
                    "content_id"=>581,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4dcq.mp3',
                    "timeRange"=>"00:31-00:35",
                    "text"=>"How many restaurants has the couple had in Spain?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"15.","isCorrect"=>false),
                        "1"=>array("item"=>"50.", "isCorrect"=>false),
                        "2"=>array("item"=>"5.", "isCorrect"=>true),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u4dcq.mp3',
                            "timeRange"=>"00:35-00:38",
                            "text"=>"They have had 5 chain restaurants there.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u4dcq.mp3',
                            "timeRange"=>"00:35-00:38",
                            "text"=>"They have had 5 chain restaurants there.",
                        ),
                    ),
                )
            )
        );

        $data['events'][] = array(
            "num"=>"30",
            'type'=>"text",
            "timeRange"=>"01:18-01:30",
            "text"=>"Their son, David, moved to the U.S. about 25 years ago, and set up the first restaurant in a town in New Jersey on the east coast with his brother Jason.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"31",
            'type'=>"text",
            "timeRange"=>"01:30-01:36",
            "text"=>"Then, they set up the second restaurant in Chicago two years later.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"32",
            'type'=>"text",
            "timeRange"=>"01:36-01:42",
            "text"=>"Now, this is the sixth restaurant they have had in this country.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"33",
            'type'=>"text",
            "timeRange"=>"01:42-01:47",
            "text"=>"This restaurant was left to David's niece, Ada, to run.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"34",
            'type'=>"text",
            "timeRange"=>"01:47-01:52",
            "text"=>"The lady behind the cashier counter is Ada.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"35",
            'type'=>"text",
            "timeRange"=>"01:52-01:57",
            "text"=>"She graduated from the University of Southern California last year.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"36",
            'type'=>"text",
            "timeRange"=>"01:57-02:01",
            "text"=>"Her major is restaurant and bar management.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"37",
            'type'=>"multipleChoices",
            "timeRange"=>"",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"38",
                    "content_id"=>582,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4dcq.mp3',
                    "timeRange"=>"00:38-00:42",
                    "text"=>"Who founded this chain seafood restaurant in the U.S?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"David and Jason.","isCorrect"=>true),
                        "1"=>array("item"=>"Ada.", "isCorrect"=>false),
                        "2"=>array("item"=>"The couple.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u4dcq.mp3',
                            "timeRange"=>"00:42-00:56",
                            "text"=>"David moved to the U.S. about 25 years ago, and set up the first restaurant in a town in New Jersey on the east coast with his brother Jason. Now, this is the sixth restaurant they have had in this country.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u4dcq.mp3',
                            "timeRange"=>"00:42-00:56",
                            "text"=>"David moved to the U.S. about 25 years ago, and set up the first restaurant in a town in New Jersey on the east coast with his brother Jason. Now, this is the sixth restaurant they have had in this country.",
                        ),
                    ),
                ),
                1=>array(
                    "num"=>"39",
                    "content_id"=>583,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4dcq.mp3',
                    "timeRange"=>"00:56-00:59",
                    "text"=>"Who is in charge of the operation of the restaurant?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"David.","isCorrect"=>false),
                        "1"=>array("item"=>"Ada.", "isCorrect"=>true),
                        "2"=>array("item"=>"Jason.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u4dcq.mp3',
                            "timeRange"=>"00:59-01:04",
                            "text"=>"This restaurant was left to David's niece, Ada, to run.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u4dcq.mp3',
                            "timeRange"=>"00:59-01:04",
                            "text"=>"This restaurant was left to David's niece, Ada, to run.",
                        ),
                    ),
                )
            )
        );

        $data['events'][] = array(
            "num"=>"40",
            'type'=>"text",
            "timeRange"=>"02:01-02:04",
            "text"=>"She looks so pretty.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"41",
            'type'=>"text",
            "timeRange"=>"02:04-02:07",
            "text"=>"Is she from Spain, too?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"42",
            'type'=>"text",
            "timeRange"=>"02:07-02:11",
            "text"=>"Actually, she was born in the United States.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"43",
            'type'=>"text",
            "timeRange"=>"02:11-02:16",
            "text"=>"Her father is Spanish and her mother is an American born Indian.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"44",
            'type'=>"multipleChoices",
            "timeRange"=>"",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"45",
                    "content_id"=>584,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4dcq.mp3',
                    "timeRange"=>"01:04-01:06",
                    "text"=>"Where was Ada's mother born?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"In India.","isCorrect"=>false),
                        "1"=>array("item"=>"In Spain.", "isCorrect"=>false),
                        "2"=>array("item"=>"In the U.S.", "isCorrect"=>true),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u4dcq.mp3',
                            "timeRange"=>"01:06-01:11",
                            "text"=>"Her mother is an American born Indian, which means her mother was born in the U.S.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u4dcq.mp3',
                            "timeRange"=>"01:06-01:11",
                            "text"=>"Her mother is an American born Indian, which means her mother was born in the U.S.",
                        ),
                    ),
                ),
                1=>array(
                    "num"=>"46",
                    "content_id"=>585,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4dcq.mp3',
                    "timeRange"=>"01:11-01:15",
                    "text"=>"Which of the following statements is not true about Ada?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"She is a cashier.","isCorrect"=>true),
                        "1"=>array("item"=>"She is American.", "isCorrect"=>false),
                        "2"=>array("item"=>"She majored in restaurant and bar management.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u4dcq.mp3',
                            "timeRange"=>"01:15-01:20",
                            "text"=>"Ada is not a cashier. She is now in charge of the operation of the restaurant.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u4dcq.mp3',
                            "timeRange"=>"01:15-01:20",
                            "text"=>"Ada is not a cashier. She is now in charge of the operation of the restaurant.",
                        ),
                    ),
                )
            )
        );

        $data['events'][] = array(
            "num"=>"47",
            'type'=>"text",
            "timeRange"=>"02:16-02:19",
            "text"=>"Who are the cooks here?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"48",
            'type'=>"text",
            "timeRange"=>"02:19-02:23",
            "text"=>"There are three chefs that she has hired here.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"49",
            'type'=>"text",
            "timeRange"=>"02:23-02:28",
            "text"=>"One is her schoolmate who majored in cooking before graduation.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"50",
            'type'=>"text",
            "timeRange"=>"02:28-02:37",
            "text"=>"Another is her uncle Andrew, David's younger brother, and the third one is David's brother-in-law, who is an Indian.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"51",
            'type'=>"text",
            "timeRange"=>"02:37-02:41",
            "text"=>"Who's that young waiter in the green T-shirt over there?",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"52",
            'type'=>"text",
            "timeRange"=>"02:41-02:45",
            "text"=>"Is he her brother or some other relative?",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"53",
            'type'=>"text",
            "timeRange"=>"02:45-02:49",
            "text"=>"Oh, that's her cousin, Tony.",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"54",
            'type'=>"text",
            "timeRange"=>"02:49-02:51",
            "text"=>"He's handsome, right?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"55",
            'type'=>"text",
            "timeRange"=>"02:51-02:53",
            "text"=>"Yes.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"56",
            'type'=>"text",
            "timeRange"=>"02:53-02:57",
            "text"=>"All the employees are her relatives.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"57",
            'type'=>"text",
            "timeRange"=>"02:57-03:00",
            "text"=>"It must be a family business.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"58",
            'type'=>"text",
            "timeRange"=>"03:00-03:02",
            "text"=>"You are right.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"59",
            'type'=>"text",
            "timeRange"=>"03:02-03:06",
            "text"=>"A very successful family business.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"60",
            'type'=>"text",
            "timeRange"=>"03:06-03:10",
            "text"=>"Well, it's nearly time for work.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"61",
            'type'=>"text",
            "timeRange"=>"03:10-03:12",
            "text"=>"Let's go.",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"62",
            'type'=>"multipleChoices",
            "timeRange"=>"",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"63",
                    "content_id"=>586,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4dcq.mp3',
                    "timeRange"=>"01:20-01:24",
                    "text"=>"Which of the following is WRONG about Tony?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"He is Ada's cousin.","isCorrect"=>false),
                        "1"=>array("item"=>"He is a handsome guy.", "isCorrect"=>false),
                        "2"=>array("item"=>"He is a cook.", "isCorrect"=>true),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u4dcq.mp3',
                            "timeRange"=>"01:24-01:28",
                            "text"=>"Tony is not a cook. He is the waiter of the restaurant.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u4dcq.mp3',
                            "timeRange"=>"01:24-01:28",
                            "text"=>"Tony is not a cook. He is the waiter of the restaurant.",
                        ),
                    ),
                ),
                1=>array(
                    "num"=>"64",
                    "content_id"=>587,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4dcq.mp3',
                    "timeRange"=>"01:28-01:32",
                    "text"=>"Are all the employees in the restaurant Ada's relatives?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Yes.","isCorrect"=>true),
                        "1"=>array("item"=>"No.", "isCorrect"=>false)
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u4dcq.mp3',
                            "timeRange"=>"01:32-01:37",
                            "text"=>"All the employees in restaurant are relatives. It is a family business.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u4dcq.mp3',
                            "timeRange"=>"01:32-01:37",
                            "text"=>"All the employees in restaurant are relatives. It is a family business.",
                        ),
                    ),
                )
            )
        );

         $this->saveEventListToDatabases($data);$a =  json_encode($data);
        $fp = fopen('json56.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
        return;
    }



    public function getPart57()
    {
        $data = array(
            "unit_id"       =>4,
            "lesson_id"     =>20,
            "part_id"       =>57,
            "media_filename"=>'media/u4d.mp4',
            "media_type"    =>'video',
            "totalTime"     =>"4:05",
            "part_type"     =>"dialog",
            "have_questions"=>false,
            "questions_type"=>"text",
            "keywords"      =>array(
                "be fed up with",
                "impressive",
                "delicious",
                "fabulous",
                "seasoning",
                "chain restaurants",
                "cashier counter",
                "management",
                "family business"
            ),
        );

        $data['events'][] = array(
            "num"=>"1",
            'type'=>"text",
            "timeRange"=>"00:00-00:03",
            "text"=>"Alice and Helen are colleagues.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"2",
            'type'=>"text",
            "timeRange"=>"00:03-00:05",
            "text"=>"It's lunch time.",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"3",
            'type'=>"text",
            "timeRange"=>"00:05-00:09",
            "text"=>"Alice Austin wants to have lunch with Helen Miller.",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"4",
            'type'=>"text",
            "timeRange"=>"00:09-00:11",
            "text"=>"Hi, Helen.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"5",
            'type'=>"text",
            "timeRange"=>"00:11-00:14",
            "text"=>"It's time for lunch.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"6",
            'type'=>"text",
            "timeRange"=>"00:14-00:17",
            "text"=>"What do you want to have?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"7",
            'type'=>"text",
            "timeRange"=>"00:17-00:22",
            "text"=>"Well, I have had fast food for two days and I'm fed up with it.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"8",
            'type'=>"text",
            "timeRange"=>"00:22-00:24",
            "text"=>"How about seafood?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"9",
            'type'=>"text",
            "timeRange"=>"00:24-00:28",
            "text"=>"I know a Spanish restaurant not far away.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"10",
            'type'=>"sr_reading",
            "content_id"=>588,
            "scores"=>1,
            "timeRange"=>"00:28-00:34",
            "text"=>"My friend took me there two weeks ago and the paella was very impressive.",
            "answer"=>"My friend took me there two weeks ago and the paella was very impressive",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"11",
            'type'=>"text",
            "timeRange"=>"00:34-00:37",
            "text"=>"Great, why not!",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"12",
            'type'=>"text",
            "timeRange"=>"00:37-00:43",
            "text"=>"Hmm. It looks so delicious and tastes fabulous!",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"13",
            'type'=>"text",
            "timeRange"=>"00:43-00:48",
            "text"=>"All kinds of seasonings here are shipped from Spain.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"14",
            'type'=>"sr_reading",
            "content_id"=>589,
            "scores"=>1,
            "timeRange"=>"00:48-00:52",
            "text"=>"It sounds like you know a lot about the restaurant.",
            "answer"=>"It sounds like you know a lot about the restaurant",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"15",
            'type'=>"text",
            "timeRange"=>"00:52-00:57",
            "text"=>"Well, my friend told me something about this restaurant.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"16",
            'type'=>"text",
            "timeRange"=>"00:57-01:01",
            "text"=>"Look at those black and white pictures on the wall.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"17",
            'type'=>"sr_reading",
            "content_id"=>590,
            "scores"=>1,
            "timeRange"=>"01:01-01:05",
            "text"=>"This couple was the founder of the restaurant in Spain.",
            "answer"=>"This couple was the founder of the restaurant in Spain",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"18",
            'type'=>"sr_reading",
            "content_id"=>591,
            "scores"=>1,
            "timeRange"=>"01:05-01:09",
            "text"=>"They used to be fishermen in a small village.",
            "answer"=>"They used to be fishermen in a small village",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"19",
            'type'=>"text",
            "timeRange"=>"01:09-01:14",
            "text"=>"Later on, they started working and running seafood restaurants.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"20",
            'type'=>"text",
            "timeRange"=>"01:14-01:18",
            "text"=>"They have had 5 chain restaurants there.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"21",
            'type'=>"text",
            "timeRange"=>"01:18-01:30",
            "text"=>"Their son, David, moved to the U.S. about 25 years ago, and set up the first restaurant in a town in New Jersey on the east coast with his brother Jason.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"22",
            'type'=>"sr_reading",
            "content_id"=>592,
            "scores"=>1,
            "timeRange"=>"01:30-01:36",
            "text"=>"Then, they set up the second restaurant in Chicago two years later.",
            "answer"=>"Then, they set up the second restaurant in Chicago two years later",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"23",
            'type'=>"text",
            "timeRange"=>"01:36-01:42",
            "text"=>"Now, this is the sixth restaurant they have had in this country.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"24",
            'type'=>"sr_reading",
            "content_id"=>593,
            "scores"=>1,
            "timeRange"=>"01:42-01:47",
            "text"=>"This restaurant was left to David's niece, Ada, to run.",
            "answer"=>"This restaurant was left to David's niece, Ada, to run.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"25",
            'type'=>"sr_reading",
            "content_id"=>594,
            "scores"=>1,
            "timeRange"=>"01:47-01:52",
            "text"=>"The lady behind the cashier counter is Ada.",
            "answer"=>"The lady behind the cashier counter is Ada",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"26",
            'type'=>"text",
            "timeRange"=>"01:52-01:57",
            "text"=>"She graduated from the University of Southern California last year.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"27",
            'type'=>"text",
            "timeRange"=>"01:57-02:01",
            "text"=>"Her major is restaurant and bar management.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"28",
            'type'=>"sr_reading",
            "content_id"=>595,
            "scores"=>1,
            "timeRange"=>"02:01-02:04",
            "text"=>"She looks so pretty.",
            "answer"=>"She looks so pretty.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"29",
            'type'=>"text",
            "timeRange"=>"02:04-02:07",
            "text"=>"Is she from Spain, too?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"30",
            'type'=>"text",
            "timeRange"=>"02:07-02:11",
            "text"=>"Actually, she was born in the United States.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"31",
            'type'=>"sr_reading",
            "content_id"=>596,
            "scores"=>1,
            "timeRange"=>"02:11-02:16",
            "text"=>"Her father is Spanish and her mother is an American born Indian.",
            "answer"=>"Her father is Spanish and her mother is an American born Indian.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"32",
            'type'=>"text",
            "timeRange"=>"02:16-02:19",
            "text"=>"Who are the cooks here?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"33",
            'type'=>"text",
            "timeRange"=>"02:19-02:23",
            "text"=>"There are three chefs that she has hired here.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"34",
            'type'=>"text",
            "timeRange"=>"02:23-02:28",
            "text"=>"One is her schoolmate who majored in cooking before graduation.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"35",
            'type'=>"sr_reading",
            "content_id"=>597,
            "scores"=>1,
            "timeRange"=>"02:28-02:37",
            "text"=>"Another is her uncle Andrew, David's younger brother, and the third one is David's brother-in-law, who is an Indian.",
            "answer"=>"Another is her uncle Andrew David's younger brother and the third one is David's brother in law who is an Indian",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"36",
            'type'=>"sr_reading",
            "content_id"=>598,
            "scores"=>1,
            "timeRange"=>"02:37-02:41",
            "text"=>"Who's that young waiter in the green T-shirt over there?",
            "answer"=>"Who's that young waiter in the green T shirt over there",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"37",
            'type'=>"text",
            "timeRange"=>"02:41-02:45",
            "text"=>"Is he her brother or some other relative?",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"38",
            'type'=>"text",
            "timeRange"=>"02:45-02:49",
            "text"=>"Oh, that's her cousin, Tony.",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"39",
            'type'=>"text",
            "timeRange"=>"02:49-02:51",
            "text"=>"He's handsome, right?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"40",
            'type'=>"text",
            "timeRange"=>"02:51-02:53",
            "text"=>"Yes.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"41",
            'type'=>"sr_reading",
            "content_id"=>599,
            "scores"=>1,
            "timeRange"=>"02:53-02:57",
            "text"=>"All the employees are her relatives.",
            "answer"=>"All the employees are her relatives",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"42",
            'type'=>"text",
            "timeRange"=>"02:57-03:00",
            "text"=>"It must be a family business.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"43",
            'type'=>"text",
            "timeRange"=>"03:00-03:02",
            "text"=>"You are right.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"44",
            'type'=>"text",
            "timeRange"=>"03:02-03:06",
            "text"=>"A very successful family business.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"45",
            'type'=>"text",
            "timeRange"=>"03:06-03:10",
            "text"=>"Well, it's nearly time for work.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"46",
            'type'=>"text",
            "timeRange"=>"03:10-03:12",
            "text"=>"Let's go.",
            "picture"=>""
        );
        $this->saveEventListToDatabases($data);
        $a = json_encode($data);
        $fp = fopen('json57.txt', "w");
        fwrite($fp, $a);
        fclose($fp);
        return;
    }


    public function getPart58(){
        $dataT = array(
            "unit_id"       =>4,
            "lesson_id"     =>20,
            "part_id"       =>58,
            "media_filename"=>'media/u4ps.mp3',
            "media_type"    =>'audio',
            "totalTime"     =>"1:34",
            "part_type"     =>"summary",
            "have_questions"=>true,
            "questions_type"=>"sr",
            "keywords"      =>array(
                "shopkeeper",
                "outgoing",
                "various",
                "be popular with",
                "regular customers",
                "comic",
                "snack",
                "supermarket"
            ),
        );
        $data['events'][] = array(
            "num"=>"1",
            'type'=>"text",
            "timeRange"=>"00:00-00:06",
            "text"=>"Peter, Jack's uncle, is the shopkeeper of a drugstore.",
            "picture"=>"images/u4_ps_001.png"
        );
        $data['events'][] = array(
            "num"=>"2",
            'type'=>"text",
            "timeRange"=>"00:06-00:14",
            "text"=>"He is outgoing, friendly and highly interested in sports, especially tennis.",
            "picture"=>"images/u4_ps_002.png"
        );
        $data['events'][] = array(
            "num"=>"3",
            'type'=>"text",
            "timeRange"=>"00:14-00:19",
            "text"=>"His drugstore sells various items.",
            "picture"=>"images/u4_ps_003.png"
        );

        $data['events'][] = array(
            "num"=>"4",
            'type'=>"text",
            "timeRange"=>"00:19-00:27",
            "text"=>"Bill, Peter's shop assistant, is an Italian boy and quite popular with all the customers.",
            "picture"=>"images/u4_ps_005.png"
        );
        $data['events'][] = array(
            "num"=>"5",
            'type'=>"text",
            "timeRange"=>"00:27-00:33",
            "text"=>"Sue and Joe are regular customers of Peter's drugstore.",
            "picture"=>"images/u4_ps_006.png"
        );
        $data['events'][] = array(
            "num"=>"6",
            'type'=>"text",
            "timeRange"=>"00:33-00:40",
            "text"=>"Sue is a UI designer in an international software company. ",
            "picture"=>"images/u4_ps_006.png"
        );
        $data['events'][] = array(
            "num"=>"7",
            'type'=>"text",
            "timeRange"=>"00:40-00:50",
            "text"=>"She visits the drugstore two or three times a week for lunch food or other things as it is so close to where she works.",
            "picture"=>"images/u4_ps_007.png"
        );
        $data['events'][] = array(
            "num"=>"8",
            'type'=>"text",
            "timeRange"=>"00:50-00:55",
            "text"=>"Joe is a painter and good at drawing comics.",
            "picture"=>"images/u4_ps_008.png"
        );
        $data['events'][] = array(
            "num"=>"9",
            'type'=>"text",
            "timeRange"=>"00:55-01:03",
            "text"=>"He often works until very late and goes to Bill's store for cold drinks and snacks.",
            "picture"=>"images/u4_ps_008.png"
        );
        $data['events'][] = array(
            "num"=>"10",
            'type'=>"text",
            "timeRange"=>"01:03-01:09",
            "text"=>"Peter loves his store and enjoys seeing people in and out.",
            "picture"=>"images/u4_ps_008.png"
        );
        $data['events'][] = array(
            "num"=>"11",
            'type'=>"text",
            "timeRange"=>"01:09-01:14",
            "text"=>"He dreams of having a big supermarket in the future.",
            "picture"=>"images/u4_ps_009.png"
        );

        $data['events'][] = array(
            "num"=>"1",
            "content_id"=>600,
            'type'=>"sr_readings",
            "timeRange"=>array("00:00-00:06","00:04-00:11","00:09-00:15"),
            "scores"=>1,
            "text"=>array("Peter, Jack's uncle, is the shopkeeper of a drugstore.","He is outgoing, friendly and highly interested in sports, especially tennis.","His drugstore sells various items."),
            "answer"=>array("Peter Jack's uncle is the shopkeeper of a drugstore","He is outgoing friendly and highly interested in sports especially tennis","His drugstore sells various items"),
            "pictures"=> array("images/u4_ps_009.png","images/u4_ps_009.png","images/u4_ps_009.png"),
            "picture"=>"images/u4_ps_009.png"
        );
        $data['events'][] = array(
            "num"=>"2",
            "content_id"=>601,
            'type'=>"sr_readings",
            "timeRange"=>array("00:13-00:24","00:21-00:25","00:25-00:32"),
            "scores"=>1,
            "text"=>array("Bill, Peter's shop assistant, is an Italian boy and quite popular with all the customers.","Sue and Joe are regular customers of Peter's drugstore.","Sue is a UI designer in an international software company."),
            "answer"=>array("Bill Peter's shop assistant is an Italian boy and quite popular with all the customers","Sue and Joe are regular customers of Peter's drugstore","Sue is a UI designer in an international software company"),
            "pictures"=> array("images/u4_ps_009.png","images/u4_ps_009.png","images/u4_ps_009.png"),
            "picture"=>"images/u4_ps_009.png"
        );

        $data['events'][] = array(
            "num"=>"3",
            "content_id"=>602,
            'type'=>"sr_readings",
            "timeRange"=>array("00:32-00:38","00:38-00:45","00:45-00:49"),
            "scores"=>1,
            "text"=>array("She visits the drugstore two or three times a week for lunch food or other things as it is so close to where she works.","Joe is a painter and good at drawing comics.","He often works until very late and goes to Bill's store for cold drinks and snacks."),
            "answer"=>array("She visits the drugstore two or three times a week for lunch food or other things as it is so close to where she works","Joe is a painter and good at drawing comics","He often works until very late and goes to Bill's store for cold drinks and snacks"),
            "picture"=>"images/u4_ps_009.png",
            "pictures"=>array("images/u4_ps_009.png","images/u4_ps_009.png","images/u4_ps_009.png")
        );

        $data['events'][] = array(
            "num"=>"4",
            "content_id"=>603,
            'type'=>"sr_readings",
            "timeRange"=>array("00:49-00:54","00:54-00:58","00:58-01:02","00:58-01:02"),
            "scores"=>1,
            "picture"=>"images/u4_ps_009.png",
            "text"=>array("Peter loves his store and enjoys seeing people in and out.","He dreams of having a big supermarket in the future."),
            "answer"=>array("Peter loves his store and enjoys seeing people in and out","He dreams of having a big supermarket in the future"),
            "pictures"=>array("images/u4_ps_009.png","images/u4_ps_009.png","images/u4_ps_009.png","images/u4_ps_009.png")

        );
        $database = array_merge($dataT,$data);
        //$database = array_merge($database,$data1);

        //exit;
        $this->saveEventListToDatabases($database);
        //$dataT['eventLists'] = array($data,$data1);
        $a =  json_encode($dataT);
        $fp = fopen('json58.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
        return;
    }


    public function getPart59(){
        $data = array(
            "unit_id"       =>4,
            "lesson_id"     =>20,
            "part_id"       =>59,
            "media_filename"=>'media/u4p.mp3',
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
            "content_id"=>604,
            'type'=>"sr_reading",
            "timeRange"=>"00:00-00:07",
            "scores"=>1,
            "text"=>"Peter is the shopkeeper of a drugstore which is located across from the office building where Helen works.",
            "answer"=>"Peter is the shopkeeper of a drugstore which is located across from the office building where Helen works",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4p.mp3',
                    "timeRange"=>"00:00-00:07",
                    "text"=>"Peter is the shopkeeper of a drugstore which is located across from the office building where Helen works.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4p.mp3',
                    "timeRange"=>"00:00-00:07",
                    "text"=>"Peter is the shopkeeper of a drugstore which is located across from the office building where Helen works.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"2",
            "content_id"=>605,
            'type'=>"sr_reading",
            "timeRange"=>"00:20-00:26",
            "scores"=>1,
            "text"=>"Peter is outgoing, friendly and highly interested in sports.",
            "answer"=>"Peter is outgoing friendly and highly interested in sports",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4p.mp3',
                    "timeRange"=>"00:20-00:26",
                    "text"=>"Peter is outgoing friendly and highly interested in sports",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4p.mp3',
                    "timeRange"=>"00:20-00:26",
                    "text"=>"Peter is outgoing friendly and highly interested in sports",
                    ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"3",
            "content_id"=>606,
            'type'=>"sr_reading",
            "timeRange"=>"00:26-00:33",
            "scores"=>1,
            "text"=>"He used to practice tennis when he was a young child who wanted to become a professional tennis player.",
            "answer"=>"He used to practice tennis when he was a young child who wanted to become a professional tennis player",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4p.mp3',
                    "timeRange"=>"00:26-00:33",
                    "text"=>"He used to practice tennis when he was a young child who wanted to become a professional tennis player.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4p.mp3',
                    "timeRange"=>"00:26-00:33",
                    "text"=>"He used to practice tennis when he was a young child who wanted to become a professional tennis player.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"4",
            "content_id"=>607,
            'type'=>"sr_reading",
            "timeRange"=>"00:33-00:41",
            "scores"=>1,
            "text"=>"If he hadn't had a serious foot injury, he would have been an excellent tennis player and fulfilled his dream.",
            "answer"=>"If he hadn't had a serious foot injury he would have been an excellent tennis player and fulfilled his dream",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4p.mp3',
                    "timeRange"=>"00:33-00:41",
                    "text"=>"If he hadn't had a serious foot injury, he would have been an excellent tennis player and fulfilled his dream.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4p.mp3',
                    "timeRange"=>"00:33-00:41",
                    "text"=>"If he hadn't had a serious foot injury, he would have been an excellent tennis player and fulfilled his dream.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"5",
            "content_id"=>608,
            'type'=>"sr_reading",
            "timeRange"=>"00:55-01:04",
            "scores"=>1,
            "text"=>"This dark-haired and dark-eyed Italian boy is quite popular with all the customers because he is so cheerful and hospitable.",
            "answer"=>"This dark-haired and dark eyed Italian boy is quite popular with all the customers because he is so cheerful and hospitable",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4p.mp3',
                    "timeRange"=>"00:55-01:04",
                    "text"=>"This dark-haired and dark-eyed Italian boy is quite popular with all the customers because he is so cheerful and hospitable.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4p.mp3',
                    "timeRange"=>"00:55-01:04",
                    "text"=>"This dark-haired and dark-eyed Italian boy is quite popular with all the customers because he is so cheerful and hospitable.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"6",
            "content_id"=>609,
            'type'=>"sr_reading",
            "timeRange"=>"01:08-01:19",
            "scores"=>1,
            "text"=>"One of the regular customers is Sue, who works as a UI designer in an international software company on the 22nd floor in the opposite building.",
            "answer"=>"One of the regular customers is Sue who works as a UI designer in an international software company on the 22nd floor in the opposite building",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4p.mp3',
                    "timeRange"=>"01:08-01:19",
                    "text"=>"One of the regular customers is Sue, who works as a UI designer in an international software company on the 22nd floor in the opposite building.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4p.mp3',
                    "timeRange"=>"01:08-01:19",
                    "text"=>"One of the regular customers is Sue, who works as a UI designer in an international software company on the 22nd floor in the opposite building.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"7",
            "content_id"=>610,
            'type'=>"sr_reading",
            "timeRange"=>"01:19-01:29",
            "scores"=>1,
            "text"=>"She visits the drugstore two or three times a week for lunch food or other things during the weekdays as it is so close to where she works.",
            "answer"=>"She visits the drugstore two or three times a week for lunch food or other things during the weekdays as it is so close to where she works",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4p.mp3',
                    "timeRange"=>"01:19-01:29",
                    "text"=>"She visits the drugstore two or three times a week for lunch food or other things during the weekdays as it is so close to where she works.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4p.mp3',
                    "timeRange"=>"01:19-01:29",
                    "text"=>"She visits the drugstore two or three times a week for lunch food or other things during the weekdays as it is so close to where she works.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"8",
            "content_id"=>611,
            'type'=>"sr_reading",
            "timeRange"=>"01:33-01:42",
            "scores"=>1,
            "text"=>"Another frequent customer to the drugstore is a painter, Joe, whose workshop is just one block away, behind the office building.",
            "answer"=>"Another frequent customer to the drugstore is a painter, Joe, whose workshop is just one block away, behind the office building.",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4p.mp3',
                    "timeRange"=>"01:33-01:42",
                    "text"=>"Another frequent customer to the drugstore is a painter, Joe, whose workshop is just one block away, behind the office building.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4p.mp3',
                    "timeRange"=>"01:33-01:42",
                    "text"=>"Another frequent customer to the drugstore is a painter, Joe, whose workshop is just one block away, behind the office building.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"9",
            "content_id"=>612,
            'type'=>"sr_reading",
            "timeRange"=>"01:53-02:06",
            "scores"=>1,
            "text"=>"Last month, he posted one comic story on his social networking blog on the internet and got the attention of a worldwide film company, which is now trying to find a way to cooperate with him.",
            "answer"=>"Last month, he posted one comic story on his social networking blog on the internet and got the attention of a worldwide film company which is now trying to find a way to cooperate with him",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4p.mp3',
                    "timeRange"=>"01:53-02:06",
                    "text"=>"Last month, he posted one comic story on his social networking blog on the internet and got the attention of a worldwide film company, which is now trying to find a way to cooperate with him.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4p.mp3',
                    "timeRange"=>"01:53-02:06",
                    "text"=>"Last month, he posted one comic story on his social networking blog on the internet and got the attention of a worldwide film company, which is now trying to find a way to cooperate with him.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"10",
            "content_id"=>613,
            'type'=>"sr_reading",
            "timeRange"=>"00:17-00:22",
            "scores"=>1,
            "text"=>"Well, I have had fast food for two days and I'm fed up with it.",
            "answer"=>"Well I have had fast food for two days and I'm fed up with it",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4d.mp3',
                    "timeRange"=>"00:17-00:22",
                    "text"=>"Well, I have had fast food for two days and I'm fed up with it.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4d.mp3',
                    "timeRange"=>"00:17-00:22",
                    "text"=>"Well, I have had fast food for two days and I'm fed up with it.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"11",
            "content_id"=>614,
            'type'=>"sr_reading",
            "timeRange"=>"00:28-00:34",
            "scores"=>1,
            "text"=>"My friend took me there two weeks ago and the paella was very impressive.",
            "answer"=>"My friend took me there two weeks ago and the paella was very impressive",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4d.mp3',
                    "timeRange"=>"00:28-00:34",
                    "text"=>"My friend took me there two weeks ago and the paella was very impressive.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4d.mp3',
                    "timeRange"=>"00:28-00:34",
                    "text"=>"My friend took me there two weeks ago and the paella was very impressive.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"12",
            "content_id"=>615,
            'type'=>"sr_reading",
            "timeRange"=>"01:09-01:14",
            "scores"=>1,
            "text"=>"Later on, they started working and running seafood restaurants.",
            "answer"=>"Later on they started working and running seafood restaurants",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4d.mp3',
                    "timeRange"=>"01:09-01:14",
                    "text"=>"Later on, they started working and running seafood restaurants.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4d.mp3',
                    "timeRange"=>"01:09-01:14",
                    "text"=>"Later on, they started working and running seafood restaurants.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"13",
            "content_id"=>616,
            'type'=>"sr_reading",
            "timeRange"=>"01:18-01:30",
            "scores"=>1,
            "text"=>"Their son, David, moved to the U.S. about 25 years ago, and set up the first restaurant in a town in New Jersey on the east coast with his brother Jason.",
            "answer"=>"Their son David, moved to the US about 25 years ago, and set up the first restaurant in a town in New Jersey on the east coast with his brother Jason",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4d.mp3',
                    "timeRange"=>"01:18-01:30",
                    "text"=>"Their son, David, moved to the U.S. about 25 years ago, and set up the first restaurant in a town in New Jersey on the east coast with his brother Jason.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4d.mp3',
                    "timeRange"=>"01:18-01:30",
                    "text"=>"Their son, David, moved to the U.S. about 25 years ago, and set up the first restaurant in a town in New Jersey on the east coast with his brother Jason.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"14",
            "content_id"=>617,
            'type'=>"sr_reading",
            "timeRange"=>"01:30-01:36",
            "scores"=>1,
            "text"=>"Then, they set up the second restaurant in Chicago two years later.",
            "answer"=>"Then they set up the second restaurant in Chicago two years later",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4d.mp3',
                    "timeRange"=>"01:30-01:36",
                    "text"=>"Then, they set up the second restaurant in Chicago two years later.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4d.mp3',
                    "timeRange"=>"01:30-01:36",
                    "text"=>"Then, they set up the second restaurant in Chicago two years later.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"15",
            "content_id"=>618,
            'type'=>"sr_reading",
            "timeRange"=>"01:42-01:47",
            "scores"=>1,
            "text"=>"This restaurant was left to David's niece, Ada, to run.",
            "answer"=>"This restaurant was left to David's niece Ada to run",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4d.mp3',
                    "timeRange"=>"01:42-01:47",
                    "text"=>"This restaurant was left to David's niece, Ada, to run.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4d.mp3',
                    "timeRange"=>"01:42-01:47",
                    "text"=>"This restaurant was left to David's niece, Ada, to run.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"16",
            "content_id"=>619,
            'type'=>"sr_reading",
            "timeRange"=>"01:52-01:57",
            "scores"=>1,
            "text"=>"She graduated from the University of Southern California last year.",
            "answer"=>"She graduated from the University of Southern California last year",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4d.mp3',
                    "timeRange"=>"01:52-01:57",
                    "text"=>"She graduated from the University of Southern California last year.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4d.mp3',
                    "timeRange"=>"01:52-01:57",
                    "text"=>"She graduated from the University of Southern California last year.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"17",
            "content_id"=>620,
            'type'=>"sr_reading",
            "timeRange"=>"02:11-02:16",
            "scores"=>1,
            "text"=>"Her father is Spanish and her mother is an American born Indian.",
            "answer"=>"Her father is Spanish and her mother is an American born Indian",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4d.mp3',
                    "timeRange"=>"02:11-02:16",
                    "text"=>"Her father is Spanish and her mother is an American born Indian.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4d.mp3',
                    "timeRange"=>"02:11-02:16",
                    "text"=>"Her father is Spanish and her mother is an American born Indian.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"18",
            "content_id"=>621,
            'type'=>"sr_reading",
            "timeRange"=>"02:23-02:28",
            "scores"=>1,
            "text"=>"One is her schoolmate who majored in cooking before graduation.",
            "answer"=>"One is her schoolmate who majored in cooking before graduation",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4d.mp3',
                    "timeRange"=>"02:23-02:28",
                    "text"=>"One is her schoolmate who majored in cooking before graduation.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4d.mp3',
                    "timeRange"=>"02:23-02:28",
                    "text"=>"One is her schoolmate who majored in cooking before graduation.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"19",
            "content_id"=>622,
            'type'=>"sr_reading",
            "timeRange"=>"02:28-02:37",
            "scores"=>1,
            "text"=>"Another is her uncle Andrew, David's younger brother, and the third one is David's brother-in-law, who is an Indian.",
            "answer"=>"Another is her uncle Andrew David's younger brother and the third one is David's brother in law who is an Indian",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4d.mp3',
                    "timeRange"=>"02:28-02:37",
                    "text"=>"Another is her uncle Andrew, David's younger brother, and the third one is David's brother-in-law, who is an Indian.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4d.mp3',
                    "timeRange"=>"02:28-02:37",
                    "text"=>"Another is her uncle Andrew, David's younger brother, and the third one is David's brother-in-law, who is an Indian.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"20",
            "content_id"=>623,
            'type'=>"sr_reading",
            "timeRange"=>"02:37-02:41",
            "scores"=>1,
            "text"=>"Who's that young waiter in the green T-shirt over there?",
            "answer"=>"Who's that young waiter in the green T shirt over there",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4d.mp3',
                    "timeRange"=>"02:37-02:41",
                    "text"=>"Who's that young waiter in the green T-shirt over there?",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4d.mp3',
                    "timeRange"=>"02:37-02:41",
                    "text"=>"Who's that young waiter in the green T-shirt over there?",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
         $this->saveEventListToDatabases($data);$a =  json_encode($data);
        $fp = fopen('json59.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
        return;
    }


    public function getPart60(){
        $data = array(
            "unit_id"       =>4,
            "lesson_id"     =>20,
            "part_id"       =>60,
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
            "content_id"=>624,
            "media_filename"=>'media/u4p.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_conjunction_clause",
            "timeRange"     =>"00:41-00:47",
            "scores"=>1,
            "text"=>"Now he still loves to do sports with his friends in his spare time during the weekend.",
            "answer" =>"Now he still loves to do sports with his friends in his spare time during the weekend",
            "items"=>array("in his spare time","Now he still loves to do sports","during the weekend.","with his friends"),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4p.mp3',
                    "timeRange"     =>"00:41-00:47",
                    "text"=>"Now he still loves to do sports with his friends in his spare time during the weekend.",
                ),
                "No"=>array(
                    "media_filename"=>'media/u4p.mp3',
                    "timeRange"     =>"00:41-00:47",
                    "text"=>"Now he still loves to do sports with his friends in his spare time during the weekend.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"2",
            "content_id"=>625,
            "media_filename"=>'media/u4p.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_conjunction_clause",
            "timeRange"     =>"01:42-01:49",
            "scores"=>1,
            "answer"=>"He often works until very late and goes to the drugstore for cold drinks and snacks",
            "text" => "He often works until very late and goes to the drugstore for cold drinks and snacks.",
            "items"=>array("until very late","for cold drinks and snacks.","He often works","and goes to the drugstore"),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4p.mp3',
                    "timeRange"     =>"01:42-01:49",
                    "text" => "He often works until very late and goes to the drugstore for cold drinks and snacks.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4p.mp3',
                    "timeRange"     =>"01:42-01:49",
                    "text" => "He often works until very late and goes to the drugstore for cold drinks and snacks.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"3",
            "content_id"=>626,
            "media_filename"=>'media/u4p.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_conjunction_clause",
            "timeRange"     =>"02:11-02:16",
            "scores"=>1,
            "answer"=>"He dreams of having a big supermarket in the future",
            "text" => "He dreams of having a big supermarket in the future.",
            "items"=>array("having a big supermarket","He dreams of","in the future."),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4p.mp3',
                    "timeRange"     =>"02:11-02:16",
                    "text" => "He dreams of having a big supermarket in the future.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4p.mp3',
                    "timeRange"     =>"02:11-02:16",
                    "text" => "He dreams of having a big supermarket in the future.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"4",
            "content_id"=>627,
            "media_filename"=>'media/u4d.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_conjunction_clause",
            "timeRange"     =>"00:43-00:48",
            "scores"=>1,
            "answer"=>"All kinds of seasonings here are shipped from Spain",
            "text" => "All kinds of seasonings here are shipped from Spain.",
            "items"=>array("from Spain.","here are shipped","All kinds of seasonings"),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4d.mp3',
                    "timeRange"     =>"00:43-00:48",
                    "text" => "All kinds of seasonings here are shipped from Spain.",
                ),
                "No"=>array(
                    "media_filename"=>'media/u4d.mp3',
                    "timeRange"     =>"00:43-00:48",
                    "text" => "All kinds of seasonings here are shipped from Spain.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"5",
            "content_id"=>628,
            "media_filename"=>'media/u4d.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_conjunction_clause",
            "timeRange"     =>"00:48-00:52",
            "scores"=>1,
            "answer"=>"It sounds like you know a lot about the restaurant",
            "text" => "It sounds like you know a lot about the restaurant.",
            "items"=>array("you know a lot","It sounds like","about the restaurant."),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4d.mp3',
                    "timeRange"     =>"00:48-00:52",
                    "text" => "It sounds like you know a lot about the restaurant.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4d.mp3',
                    "timeRange"     =>"00:48-00:52",
                    "text" => "It sounds like you know a lot about the restaurant.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"6",
            "content_id"=>629,
            "media_filename"=>'media/u4d.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_conjunction_clause",
            "timeRange"     =>"00:57-01:01",
            "scores"=>1,
            "answer"=>"Look at those black and white pictures on the wall",
            "text" => "Look at those black and white pictures on the wall.",
            "items"=>array("those black and white pictures","on the wall.","Look at"),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4d.mp3',
                    "timeRange"     =>"00:57-01:01",
                    "text" => "Look at those black and white pictures on the wall.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4d.mp3',
                    "timeRange"     =>"00:57-01:01",
                    "text" => "Look at those black and white pictures on the wall.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"7",
            "content_id"=>630,
            "media_filename"=>'media/u4d.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_conjunction_clause",
            "timeRange"     =>"01:01-01:05",
            "scores"=>1,
            "answer"=>"This couple was the founder of the restaurant in Spain",
            "text"=>"This couple was the founder of the restaurant in Spain.",
            "items"=>array("of the restaurant","was the founder","This couple","in Spain."),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4d.mp3',
                    "timeRange"     =>"01:01-01:05",
                    "text"=>"This couple was the founder of the restaurant in Spain.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4d.mp3',
                    "timeRange"     =>"01:01-01:05",
                    "text"=>"This couple was the founder of the restaurant in Spain.",
                    ),
            ),
            "picture"=>"images/type_speak_001.png"
        );


        $data['events'][] = array(
            "num"=>"8",
            "content_id"=>631,
            "media_filename"=>'media/u4d.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_conjunction_clause",
            "timeRange"     =>"00:38-00:42",
            "scores"=>1,
            "answer"=>"Now this is the sixth restaurant they have had in this country",
            "text" => "Now, this is the sixth restaurant they have had in this country.",
            "items"=>array("they have had","Now","this is the sixth restaurant","in this country."),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4d.mp3',
                    "timeRange"     =>"01:36-01:42",
                    "text" => "Now, this is the sixth restaurant they have had in this country.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4d.mp3',
                    "timeRange"     =>"01:36-01:42",
                    "text" => "Now, this is the sixth restaurant they have had in this country.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"9",
            "content_id"=>632,
            "media_filename"=>'media/u4d.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_conjunction_clause",
            "timeRange"     =>"01:57-02:01",
            "scores"=>1,
            "answer"=>"Her major is restaurant and bar management",
            "text" => "Her major is restaurant and bar management.",
            "items"=>array("restaurant and bar management.","Her major","is"),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4d.mp3',
                    "timeRange"     =>"01:57-02:01",
                    "text" => "Her major is restaurant and bar management.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4d.mp3',
                    "timeRange"     =>"01:57-02:01",
                    "text" => "Her major is restaurant and bar management.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"10",
            "content_id"=>633,
            "media_filename"=>'media/u4d.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_conjunction_clause",
            "timeRange"     =>"02:07-02:11",
            "scores"=>1,
            "answer"=>"Actually she was born in the United States",
            "text" => "Actually, she was born in the United States.",
            "items"=>array("she was born","Actually","in the United States."),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4d.mp3',
                    "timeRange"     =>"02:07-02:11",
                    "text" => "Actually, she was born in the United States.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4d.mp3',
                    "timeRange"     =>"02:07-02:11",
                    "text" => "Actually, she was born in the United States.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

         $this->saveEventListToDatabases($data);$a =  json_encode($data);
        $fp = fopen('json60.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
        return;
    }

    public function getPart61(){
        $data = array(
            "unit_id"       =>4,
            "lesson_id"     =>20,
            "part_id"       =>61,
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
            "content_id"=>634,
            "media_filename"=>'media/u4p.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"01:04-01:08",
            "scores"=>1,
            "text" => "He always smiles whenever he serves them.",
            "answer" => "He always smiles whenever he serves them",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4p.mp3',
                    "timeRange"     =>"01:04-01:08",
                    "text" => "He always smiles whenever he serves them.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4p.mp3',
                    "timeRange"     =>"01:04-01:08",
                    "text" => "He always smiles whenever he serves them.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"2",
            "content_id"=>635,
            "media_filename"=>'media/u4p.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"02:06-02:11",
            "scores"=>1,
            "text" => "Peter loves his store and enjoys seeing people in and out.",
            "answer" => "Peter loves his store and enjoys seeing people in and out",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4p.mp3',
                    "timeRange"     =>"02:06-02:11",
                    "text" => "Peter loves his store and enjoys seeing people in and out.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4p.mp3',
                    "timeRange"     =>"02:06-02:11",
                    "text" => "Peter loves his store and enjoys seeing people in and out.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"3",
            "content_id"=>636,
            "media_filename"=>'media/u4ps.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"00:00-00:06",
            "scores"=>1,
            "text" => "Peter, Jack's uncle, is the shopkeeper of a drugstore.",
            "answer" => "Peter Jack's uncle, is the shopkeeper of a drugstore",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4ps.mp3',
                    "timeRange"     =>"00:00-00:06",
                    "text" => "Peter, Jack's uncle, is the shopkeeper of a drugstore.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4ps.mp3',
                    "timeRange"     =>"00:00-00:06",
                    "text" => "Peter, Jack's uncle, is the shopkeeper of a drugstore.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"4",
            "content_id"=>637,
            "media_filename"=>'media/u4ps.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"00:19-00:27",
            "scores"=>1,
            "text" => "Bill, Peter's shop assistant, is an Italian boy and quite popular with all the customers.",
            "answer" => "Bill Peter's shop assistant is an Italian boy and quite popular with all the customers",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4ps.mp3',
                    "timeRange"     =>"00:19-00:27",
                    "text" => "Bill, Peter's shop assistant, is an Italian boy and quite popular with all the customers.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4ps.mp3',
                    "timeRange"     =>"00:19-00:27",
                    "text" => "Bill, Peter's shop assistant, is an Italian boy and quite popular with all the customers.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"5",
            "content_id"=>638,
            "media_filename"=>'media/u4ps.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"00:27-00:33",
            "scores"=>1,
            "text" => "Sue and Joe are regular customers of Peter's drugstore.",
            "answer" => "Sue and Joe are regular customers of Peter's drugstore",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4ps.mp3',
                    "timeRange"     =>"00:27-00:33",
                    "text" => "Sue and Joe are regular customers of Peter's drugstore.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4ps.mp3',
                    "timeRange"     =>"00:27-00:33",
                    "text" => "Sue and Joe are regular customers of Peter's drugstore.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"6",
            "content_id"=>639,
            "media_filename"=>'media/u4ps.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"00:33-00:40",
            "scores"=>1,
            "text" => "Sue is a UI designer in an international software company.",
            "answer" => "Sue is a UI designer in an international software company",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4ps.mp3',
                    "timeRange"     =>"00:33-00:40",
                    "text" => "Sue is a UI designer in an international software company.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4ps.mp3',
                    "timeRange"     =>"00:33-00:40",
                    "text" => "Sue is a UI designer in an international software company.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"7",
            "content_id"=>640,
            "media_filename"=>'media/u4ps.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"00:50-00:55",
            "scores"=>1,
            "text" => "Joe is a painter and good at drawing comics.",
            "answer" => "Joe is a painter and good at drawing comics",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4ps.mp3',
                    "timeRange"     =>"00:50-00:55",
                    "text" => "Joe is a painter and good at drawing comics.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4ps.mp3',
                    "timeRange"     =>"00:50-00:55",
                    "text" => "Joe is a painter and good at drawing comics.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"8",
            "content_id"=>641,
            "media_filename"=>'media/u4ps.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"01:09-01:14",
            "scores"=>1,
            "text" => "He dreams of having a big supermarket in the future.",
            "answer" => "He dreams of having a big supermarket in the future",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4ps.mp3',
                    "timeRange"     =>"01:09-01:14",
                    "text" => "He dreams of having a big supermarket in the future.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4ps.mp3',
                    "timeRange"     =>"01:09-01:14",
                    "text" => "He dreams of having a big supermarket in the future.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"9",
            "content_id"=>642,
            "media_filename"=>'media/u4d.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"00:11-00:14",
            "scores"=>1,
            "text" => "It's time for lunch.",
            "answer" => "It's time for lunch",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4d.mp3',
                    "timeRange"     =>"00:11-00:14",
                    "text" => "It's time for lunch.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4d.mp3',
                    "timeRange"     =>"00:11-00:14",
                    "text" => "It's time for lunch.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"10",
            "content_id"=>643,
            "media_filename"=>'media/u4d.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"00:37-00:43",
            "scores"=>1,
            "text" => "Hmm. It looks so delicious and tastes fabulous!",
            "answer" => "Hmm It looks so delicious and tastes fabulous",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4d.mp3',
                    "timeRange"     =>"00:37-00:43",
                    "text" => "Hmm. It looks so delicious and tastes fabulous!",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4d.mp3',
                    "timeRange"     =>"00:37-00:43",
                    "text" => "Hmm. It looks so delicious and tastes fabulous!",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"11",
            "content_id"=>644,
            "media_filename"=>'media/u4d.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"01:05-01:09",
            "scores"=>1,
            "text" => "They used to be fishermen in a small village.",
            "answer" => "They used to be fishermen in a small village",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4d.mp3',
                    "timeRange"     =>"01:05-01:09",
                    "text" => "They used to be fishermen in a small village.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4d.mp3',
                    "timeRange"     =>"01:05-01:09",
                    "text" => "They used to be fishermen in a small village.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"12",
            "content_id"=>645,
            "media_filename"=>'media/u4d.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"02:01-02:04",
            "scores"=>1,
            "text" => "She looks so pretty.",
            "answer" => "She looks so pretty",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4d.mp3',
                    "timeRange"     =>"02:01-02:04",
                    "text" => "She looks so pretty.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4d.mp3',
                    "timeRange"     =>"02:01-02:04",
                    "text" => "She looks so pretty.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"13",
            "content_id"=>646,
            "media_filename"=>'media/u4d.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"02:16-02:19",
            "scores"=>1,
            "text" => "Who are the cooks here?",
            "answer" => "Who are the cooks here",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4d.mp3',
                    "timeRange"     =>"02:16-02:19",
                    "text" => "Who are the cooks here?",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4d.mp3',
                    "timeRange"     =>"02:16-02:19",
                    "text" => "Who are the cooks here?",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"14",
            "content_id"=>647,
            "media_filename"=>'media/u4d.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"02:53-02:57",
            "scores"=>1,
            "text" => "All the employees are her relatives.",
            "answer" => "All the employees are her relatives",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4d.mp3',
                    "timeRange"     =>"02:53-02:57",
                    "text" => "All the employees are her relatives.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4d.mp3',
                    "timeRange"     =>"02:53-02:57",
                    "text" => "All the employees are her relatives.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"15",
            "content_id"=>648,
            "media_filename"=>'media/u4d.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"02:57-03:00",
            "scores"=>1,
            "text" => "It must be a family business.",
            "answer" => "It must be a family business",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4d.mp3',
                    "timeRange"     =>"02:57-03:00",
                    "text" => "It must be a family business.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4d.mp3',
                    "timeRange"     =>"02:57-03:00",
                    "text" => "It must be a family business.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
         $this->saveEventListToDatabases($data);$a =  json_encode($data);
        $fp = fopen('json61.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
        return;
    }

    public function getPart62(){
        $data = array(
            "unit_id"       =>4,
            "lesson_id"     =>21,
            "part_id"       =>62,
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
            "content_id"=>649,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"00:00-00:06",
            "scores"=>10,
            "text" => "The doctor told her not to cough more than she can _ since it may cause problems to her lungs.",
            "answer" => "The doctor told her not to cough more than she can help since it may cause problems to her lungs.",
            "items" => array(
                "0"=>array("item"=>"check","isCorrect"=>false),
                "1"=>array("item"=>"allow", "isCorrect"=>false),
                "2"=>array("item"=>"stop", "isCorrect"=>false),
                "3"=>array("item"=>"help", "isCorrect"=>true),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4gfi.mp3',
                    "timeRange"     =>"00:00-00:06",
                    "text" => "The doctor told her not to cough more than she can help since it may cause problems to her lungs.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4gfi.mp3',
                    "timeRange"     =>"00:00-00:06",
                    "text" => "The doctor told her not to cough more than she can help since it may cause problems to her lungs.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"2",
            "content_id"=>650,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"00:06-00:12",
            "scores"=>10,
            "text" => "When the class discussion is near its end, make sure to _ it with important points.",
            "answer"=>"When the class discussion is near its end make sure to conclude it with important points",
            "items" => array(
                "0"=>array("item"=>"conclude","isCorrect"=>true),
                "1"=>array("item"=>"lead", "isCorrect"=>false),
                "2"=>array("item"=>"avoid", "isCorrect"=>false),
                "3"=>array("item"=>"hold","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4gfi.mp3',
                    "timeRange"     =>"00:06-00:12",
                    "text"=>"When the class discussion is near its end make sure to conclude it with important points.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4gfi.mp3',
                    "timeRange"     =>"00:06-00:12",
                    "text"=>"When the class discussion is near its end make sure to conclude it with important points",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"3",
            "content_id"=>651,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"00:12-00:18",
            "scores"=>10,
            "text" => "He found a job as an English teacher which _ spending quite a lot of time with students.",
            "answer"=>"He found a job as an English teacher which involves spending quite a lot of time with students",
            "items" => array(
                "0"=>array("item"=>"enjoys","isCorrect"=>false),
                "1"=>array("item"=>"involves", "isCorrect"=>true),
                "2"=>array("item"=>"practices", "isCorrect"=>false),
                "3"=>array("item"=>"suggests ","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4gfi.mp3',
                    "timeRange"     =>"00:12-00:18",
                    "text"=>"He found a job as an English teacher which involves spending quite a lot of time with students.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4gfi.mp3',
                    "timeRange"     =>"00:12-00:18",
                    "text"=>"He found a job as an English teacher which involves spending quite a lot of time with students.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );
        $data['events'][] = array(
            "num"=>"4",
            "content_id"=>652,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"00:18-00:26",
            "scores"=>10,
            "text" => "Bears _ fat stores throughout the summer and fall to have energy enough to last them through their winter sleep.",
            "answer"=>"Bears build up fat stores throughout the summer and fall to have energy enough to last them through their winter sleep",
            "items" => array(
                "0"=>array("item"=>"pack up","isCorrect"=>false),
                "1"=>array("item"=>"build up", "isCorrect"=>true),
                "2"=>array("item"=>"bring", "isCorrect"=>false),
                "3"=>array("item"=>"take up","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4gfi.mp3',
                    "timeRange"     =>"00:18-00:26",
                    "text"=>"Bears build up fat stores throughout the summer and fall to have energy enough to last them through their winter sleep.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4gfi.mp3',
                    "timeRange"     =>"00:18-00:26",
                    "text"=>"Bears build up fat stores throughout the summer and fall to have energy enough to last them through their winter sleep.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"5",
            "content_id"=>653,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"00:26-00:32",
            "scores"=>10,
            "text" => "When wireless networks _ in disasters, old-fashioned phones matter.",
            "answer"=>"When wireless networks break down in disasters old fashioned phones matter",
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
                    "text"=>"When wireless networks break down in disasters, old-fashioned phones matter.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4gfi.mp3',
                    "timeRange"     =>"00:26-00:32",
                    "text"=>"When wireless networks break down in disasters, old-fashioned phones matter.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"6",
            "content_id"=>654,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"00:32-00:36",
            "scores"=>10,
            "text" => "He will _ as general manager next month.",
            "answer"=>"He will take over as general manager next month",
            "items" => array(
                "0"=>array("item"=>"get away", "isCorrect"=>false),
                "1"=>array("item"=>"take over","isCorrect"=>true),
                "2"=>array("item"=>"set off", "isCorrect"=>false),
                "3"=>array("item"=>"run out","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4gfi.mp3',
                    "timeRange"     =>"00:32-00:36",
                    "text"=>"He will take over as general manager next month.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4gfi.mp3',
                    "timeRange"     =>"00:32-00:36",
                    "text"=>"He will take over as general manager next month.",
                    ),
            ),
            "picture"=>"images/type_click_001.png"
        );
        $data['events'][] = array(
            "num"=>"7",
            "content_id"=>655,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"00:36-00:44",
            "scores"=>10,
            "text" => "The city government's plan to fight against smog will focus on _ information and handling PM 2.5.",
            "answer"=>"The city government's plan to fight against smog will focus on gathering information and handling PM two point five",
            "items" => array(
                "0"=>array("item"=>"expressing", "isCorrect"=>false),
                "1"=>array("item"=>"representing","isCorrect"=>false),
                "2"=>array("item"=>"gathering", "isCorrect"=>true),
                "3"=>array("item"=>"acknowledging","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4gfi.mp3',
                    "timeRange"     =>"00:36-00:44",
                    "text"=>"The city government's plan to fight against smog will focus on gathering information and handling PM 2.5.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4gfi.mp3',
                    "timeRange"     =>"00:36-00:44",
                    "text"=>"The city government's plan to fight against smog will focus on gathering information and handling PM 2.5.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"8",
            "content_id"=>656,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"00:44-00:50",
            "scores"=>10,
            "text" => "To buy this computer, you should be able to _ at least twenty dollars a week.",
            "answer"=>"To buy this computer you should be able to put aside at least twenty dollars a week",
            "items" => array(
                "0"=>array("item"=>"put forward", "isCorrect"=>true),
                "1"=>array("item"=>"put in","isCorrect"=>false),
                "2"=>array("item"=>"put down", "isCorrect"=>false),
                "3"=>array("item"=>"put aside","isCorrect"=>true),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4gfi.mp3',
                    "timeRange"     =>"00:44-00:50",
                    "text"=>"To buy this computer，you should be able to put aside at least twenty dollars a week.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4gfi.mp3',
                    "timeRange"     =>"00:44-00:50",
                    "text"=>"To buy this computer，you should be able to put aside at least twenty dollars a week.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"9",
            "content_id"=>657,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"00:50-00:57",
            "scores"=>10,
            "text" => "Many people are beginning to reflect on  what kind of consequences studying abroad will _ .",
            "answer"=>"Many people are beginning to reflect on  what kind of consequences studying abroad will bring about",
            "items" => array(
                "0"=>array("item"=>"bring out", "isCorrect"=>false),
                "1"=>array("item"=>"bring down","isCorrect"=>false),
                "2"=>array("item"=>"bring about", "isCorrect"=>true),
                "3"=>array("item"=>"bring up","isCorrect"=>true),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4gfi.mp3',
                    "timeRange"     =>"00:50-00:57",
                    "text"=>"Many people are beginning to reflect on  what kind of consequences studying abroad will bring about.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4gfi.mp3',
                    "timeRange"     =>"00:50-00:57",
                    "text"=>"Many people are beginning to reflect on  what kind of consequences studying abroad will bring about.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );
        $data['events'][] = array(
            "num"=>"10",
            "content_id"=>658,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"00:57-01:03",
            "scores"=>10,
            "text" => "It took her a long time to _ the skills she needed to become a professional lawyer.",
            "answer"=>"It took her a long time to acquire the skills she needed to become a professional lawyer",
            "items" => array(
                "0"=>array("item"=>"acquire", "isCorrect"=>true),
                "1"=>array("item"=>"inquire","isCorrect"=>false),
                "2"=>array("item"=>"require", "isCorrect"=>false),
                "3"=>array("item"=>"request","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4gfi.mp3',
                    "timeRange"     =>"00:57-01:03",
                    "text" => "It took her a long time to acquire the skills she needed to become a professional lawyer.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4gfi.mp3',
                    "timeRange"     =>"00:57-01:03",
                    "text" => "It took her a long time to acquire the skills she needed to become a professional lawyer.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );
        $data['events'][] = array(
            "num"=>"11",
            "content_id"=>659,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"01:03-01:08",
            "scores"=>10,
            "text" => "The athletes of the school _ at the gym for three hours every day.",
            "answer"=>"The athletes of the school work out at the gym for three hours every day.",
            "items" => array(
                "0"=>array("item"=>"work out", "isCorrect"=>true),
                "1"=>array("item"=>"carry out","isCorrect"=>false),
                "2"=>array("item"=>"take in", "isCorrect"=>false),
                "3"=>array("item"=>"set aside","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4gfi.mp3',
                    "timeRange"     =>"01:03-01:08",
                    "text"=>"The athletes of the school work out at the gym for three hours every day.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4gfi.mp3',
                    "timeRange"     =>"01:03-01:08",
                    "text"=>"The athletes of the school work out at the gym for three hours every day.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"12",
            "content_id"=>660,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"01:08-01:14",
            "scores"=>10,
            "text" => "Taking exercise is an effective way to _ yourself when you are working on a tight schedule.",
            "answer"=>"Taking exercise is an effective way to refresh yourself when you are working on a tight schedule.",
            "items" => array(
                "0"=>array("item"=>"relieve", "isCorrect"=>false),
                "1"=>array("item"=>"refresh","isCorrect"=>true),
                "2"=>array("item"=>"liberate", "isCorrect"=>false),
                "3"=>array("item"=>"comfort","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4gfi.mp3',
                    "timeRange"     =>"01:08-01:14",
                    "text" => "Taking exercise is an effective way to refresh yourself when you are working on a tight schedule.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4gfi.mp3',
                    "timeRange"     =>"01:08-01:14",
                    "text" => "Taking exercise is an effective way to refresh yourself when you are working on a tight schedule.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"13",
            "content_id"=>661,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"01:14-01:20",
            "scores"=>10,
            "text" => "It is not easy to _ bad habits; it needs your determination and perseverance.",
            "answer"=>"It is not easy to remove bad habits it needs your determination and perseverance",
            "items" => array(
                "0"=>array("item"=>"replace", "isCorrect"=>false),
                "1"=>array("item"=>"move", "isCorrect"=>false),
                "2"=>array("item"=>"remove","isCorrect"=>true),
                "3"=>array("item"=>"get rid","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4gfi.mp3',
                    "timeRange"     =>"01:14-01:20",
                    "text" => "It is not easy  to remove bad habits; it needs your determination and perseverance.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4gfi.mp3',
                    "timeRange"     =>"01:14-01:20",
                    "text" => "It is not easy  to remove bad habits; it needs your determination and perseverance.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"14",
            "content_id"=>662,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"01:20-01:26",
            "scores"=>10,
            "text" => "Review each interview you go on, otherwise you're bound to _ the same mistakes.",
            "answer"=>"Review each interview you go on, otherwise you're bound to repeat the same mistakes.",
            "items" => array(
                "0"=>array("item"=>"correct", "isCorrect"=>false),
                "1"=>array("item"=>"repeat", "isCorrect"=>true),
                "2"=>array("item"=>"commit","isCorrect"=>false),
                "3"=>array("item"=>"improve","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4gfi.mp3',
                    "timeRange"     =>"01:20-01:26",
                    "text"=>"Review each interview you go on，otherwise you're bound to repeat the same mistakes.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4gfi.mp3',
                    "timeRange"     =>"01:20-01:26",
                    "text"=>"Review each interview you go on，otherwise you're bound to repeat the same mistakes.",              ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"15",
            "content_id"=>663,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"01:26-01:30",
            "scores"=>10,
            "text" => "She _ a smile to cover up her disappointment.",
            "answer"=>"She managed a smile to cover up her disappointment",
            "items" => array(
                "0"=>array("item"=>"hid", "isCorrect"=>true),
                "1"=>array("item"=>"managed","isCorrect"=>false),
                "2"=>array("item"=>"refused", "isCorrect"=>false),
                "3"=>array("item"=>"brought","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4gfi.mp3',
                    "timeRange"     =>"01:26-01:30",
                    "text"=>"She managed a smile to cover up her disappointment.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4gfi.mp3',
                    "timeRange"     =>"01:26-01:30",
                    "text"=>"She managed a smile to cover up her disappointment.",
                    ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"16",
            "content_id"=>664,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"01:30-01:35",
            "scores"=>10,
            "text" => "No matter how rich you are，it can't _ a healthy body.",
            "answer"=>"No matter how rich you are，it can't match a healthy body.",
            "items" => array(
                "0"=>array("item"=>"compare", "isCorrect"=>false),
                "1"=>array("item"=>"suit","isCorrect"=>false),
                "2"=>array("item"=>"defeat", "isCorrect"=>false),
                "3"=>array("item"=>"match","isCorrect"=>true),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4gfi.mp3',
                    "timeRange"     =>"01:30-01:35",
                    "text"=>"No matter how rich you are，it can't match a healthy body.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4gfi.mp3',
                    "timeRange"     =>"01:30-01:35",
                    "text"=>"No matter how rich you are，it can't match a healthy body.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );
        $data['events'][] = array(
            "num"=>"17",
            "content_id"=>665,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"01:35-01:42",
            "scores"=>10,
            "text" => "If you sit all day long and rarely work out，you're likely to _ neck and back pains.",
            "answer"=>"If you sit all day long and rarely work out，you're likely to suffer from neck and back pains",
            "items" => array(
                "0"=>array("item"=>"suffer from", "isCorrect"=>true),
                "1"=>array("item"=>"suffer for","isCorrect"=>false),
                "2"=>array("item"=>"suffer at", "isCorrect"=>false),
                "3"=>array("item"=>"got","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4gfi.mp3',
                    "timeRange"     =>"01:35-01:42",
                    "text"=>"If you sit all day long and rarely work out，you're likely to suffer from neck and back pains.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4gfi.mp3',
                    "timeRange"     =>"01:35-01:42",
                    "text"=>"If you sit all day long and rarely work out，you're likely to suffer from neck and back pains.",

                ),
            ),
            "picture"=>"images/type_click_001.png"
        );
        $data['events'][] = array(
            "num"=>"18",
            "content_id"=>666,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"01:42-01:46",
            "scores"=>10,
            "text" => "She must have been _ on her way here in the traffic jam.",
            "answer"=>"She must have been held up on her way here in the traffic jam",
            "items" => array(
                "0"=>array("item"=>"held up", "isCorrect"=>true),
                "1"=>array("item"=>"put up","isCorrect"=>false),
                "2"=>array("item"=>"taken up", "isCorrect"=>false),
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
            "num"=>"19",
            "content_id"=>667,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"01:46-01:52",
            "scores"=>10,
            "text" => "Fuels we burn and plant food we eat _ their chemical energy in the form of heat.",
            "answer"=>"Fuels we burn and plant food we eat give off their chemical energy in the form of heat",
            "items" => array(
                "0"=>array("item"=>"give in", "isCorrect"=>false),
                "1"=>array("item"=>"give off", "isCorrect"=>true),
                "2"=>array("item"=>"give away","isCorrect"=>false),
                "3"=>array("item"=>"give up","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4gfi.mp3',
                    "timeRange"     =>"01:46-01:52",
                    "text"=>"TFuels we burn and plant food we eat give off their chemical energy in the form of heat.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4gfi.mp3',
                    "timeRange"     =>"01:46-01:52",
                    "text"=>"Fuels we burn and plant food we eat give off their chemical energy in the form of heat.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"20",
            "content_id"=>668,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"01:52-01:59",
            "scores"=>10,
            "text" => "The secret to happiness _ your successful work and your contribution towards others' happiness.",
            "answer"=>"The secret to happiness consists in your successful work and your contribution towards others'happiness",
            "items" => array(
                "0"=>array("item"=>"consists in", "isCorrect"=>true),
                "1"=>array("item"=>"results in", "isCorrect"=>false),
                "2"=>array("item"=>"brings in","isCorrect"=>false),
                "3"=>array("item"=>"takes in","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4gfi.mp3',
                    "timeRange"     =>"01:52-01:59",
                    "text"=>"The secret to happiness consists in your successful work and your contribution towards others' happiness.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4gfi.mp3',
                    "timeRange"     =>"01:52-01:59",
                    "text"=>"The secret to happiness consists in your successful work and your contribution towards others' happiness.",
                    ),
            ),
            "picture"=>"images/type_click_001.png"
        );
         $this->saveEventListToDatabases($data);$a =  json_encode($data);
        $fp = fopen('json62.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
        return;
    }


    public function getPart63(){
        $data = array(
            "unit_id"       =>4,
            "lesson_id"     =>21,
            "part_id"       =>63,
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
            "content_id"=>669,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"00:00-00:05",
            "scores"=>1,
            "text" => "The government was planning a new bridge connecting Hongkong and Zhuhai.",
            "items" => array(
                "0"=>array("item"=>"a new bridge connecting"),
                "1"=>array("item"=>"was planning"),
                "2"=>array("item"=>"The government"),
                "3"=>array("item"=>"Hongkong and Zhuhai.")
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4gso.mp3',
                    "timeRange"     =>"00:00-00:05",
                    "text" => "The government was planning a new bridge connecting Hongkong and Zhuhai.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4gso.mp3',
                    "timeRange"     =>"00:00-00:05",
                    "text" => "The government was planning a new bridge connecting Hongkong and Zhuhai.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );
        $data['events'][] = array(
            "num"=>"2",
            "content_id"=>670,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"00:05-00:10",
            "scores"=>1,
            "text" => "He had to pause from time to time to wipe the sweat from his forehead.",
            "items" => array(
                "0"=>array("item"=>"to wipe the sweat"),
                "1"=>array("item"=>"from his forehead."),
                "2"=>array("item"=>"He had to pause"),
                "3"=>array("item"=>"from time to time"),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4gso.mp3',
                    "timeRange"     =>"00:05-00:10",
                    "text" => "He had to pause from time to time to wipe the sweat from his forehead.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4gso.mp3',
                    "timeRange"     =>"00:05-00:10",
                    "text" => "He had to pause from time to time to wipe the sweat from his forehead.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );
        $data['events'][] = array(
            "num"=>"3",
            "content_id"=>671,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"00:10-00:15",
            "scores"=>1,
            "text" => "Measures have been taken to bring down the high prices of daily goods.",
            "items" => array(
                "0"=>array("item"=>"the high prices"),
                "1"=>array("item"=>"Measures have been taken"),
                "2"=>array("item"=>"of daily goods."),
                "3"=>array("item"=>"to bring down")
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
            "num"=>"4",
            "content_id"=>672,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"00:15-00:20",
            "scores"=>1,
            "text" => "If you want to buy the bicycle, ask the shop assistant to reduce the price.",
            "items" => array(
                "0"=>array("item"=>"ask the shop assistant"),
                "1"=>array("item"=>"you want to"),
                "2"=>array("item"=>"If"),
                "3"=>array("item"=>"buy the bicycle,"),
                "4"=>array("item"=>" to reduce the price.")
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4gso.mp3',
                    "timeRange"     =>"00:15-00:20",
                    "text" => "If you want to buy the bicycle, ask the shop assistant to reduce the price.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4gso.mp3',
                    "timeRange"     =>"00:15-00:20",
                    "text" => "If you want to buy the bicycle, ask the shop assistant to reduce the price.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );
        $data['events'][] = array(
            "num"=>"5",
            "content_id"=>673,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"00:20-00:23",
            "scores"=>1,
            "text" => "Would you like to come along with us to the concert tonight?",
            "items" => array(
                "0"=>array("item"=>"to come along with us"),
                "1"=>array("item"=>"to the concert"),
                "2"=>array("item"=>"tonight?"),
                "3"=>array("item"=>"Would you like"),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4gso.mp3',
                    "timeRange"     =>"00:20-00:23",
                    "text" => "Would you like to come along with us to the concert tonight?",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4gso.mp3',
                    "timeRange"     =>"00:20-00:23",
                    "text" => "Would you like to come along with us to the concert tonight?",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );
        $data['events'][] = array(
            "num"=>"6",
            "content_id"=>674,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"00:23-00:28",
            "scores"=>1,
            "text" => "Tina had hoped to take a holiday this year but she wasn't able to get away.",
            "items" => array(
                "0"=>array("item"=>"this year"),
                "1"=>array("item"=>"Tina had hoped"),
                "2"=>array("item"=>"but"),
                "3"=>array("item"=>"to take a holiday"),
                "4"=>array("item"=>"she wasn't able to get away.")
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4gso.mp3',
                    "timeRange"     =>"00:23-00:28",
                    "text" => "Tina had hoped to take a holiday this year but she wasn't able to get away.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4gso.mp3',
                    "timeRange"     =>"00:23-00:28",
                    "text" => "Tina had hoped to take a holiday this year but she wasn't able to get away.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"7",
            "content_id"=>675,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"00:28-00:32",
            "scores"=>1,
            "text" => "He always starts the day by going through his email",
            "items" => array(
                "0"=>array("item"=>"his email."),
                "1"=>array("item"=>"He always"),
                "2"=>array("item"=>"starts the day"),
                "3"=>array("item"=>"by going through")
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4gso.mp3',
                    "timeRange"     =>"00:28-00:32",
                    "text" => "He always starts the day by going through his email.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4gso.mp3',
                    "timeRange"     =>"00:28-00:32",
                    "text" => "He always starts the day by going through his email.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"8",
            "content_id"=>676,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"00:32-00:36",
            "scores"=>1,
            "text" => "Why do we have to put up with his selfish behavior?",
            "items" => array(
                "0"=>array("item"=>"his selfish behavior?"),
                "1"=>array("item"=>"have to"),
                "2"=>array("item"=>"Why do we"),
                "3"=>array("item"=>"put up with"),
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
            "content_id"=>677,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"00:36-00:40",
            "scores"=>1,
            "text" => "He decided that he would drive all the way home in spite of the night.",
            "items" => array(
                "0"=>array("item"=>"all the way home"),
                "1"=>array("item"=>"He decided"),
                "2"=>array("item"=>"he would drive"),
                "3"=>array("item"=>"that"),
                "4"=>array("item"=>"in spite of the night."),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4gso.mp3',
                    "timeRange"     =>"00:36-00:40",
                    "text" => "He decided that he would drive all the way home in spite of the night.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4gso.mp3',
                    "timeRange"     =>"00:36-00:40",
                    "text" => "He decided that he would drive all the way home in spite of the night.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"10",
            "content_id"=>678,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"00:40-00:45",
            "scores"=>1,
            "text" => "This insect takes on the colour of its surroundings to protect itself.",
            "items" => array(
                "0"=>array("item"=>"of its surroundings"),
                "1"=>array("item"=>"This insect"),
                "2"=>array("item"=>"to protect itself."),
                "3"=>array("item"=>"takes on the colour"),
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
            "content_id"=>679,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"00:45-00:49",
            "scores"=>1,
            "text" => "He is always willing to lend a hand if others are in trouble",
            "items" => array(
                "0"=>array("item"=>"others"),
                "1"=>array("item"=>"to lend a hand"),
                "2"=>array("item"=>"He is always willing"),
                "3"=>array("item"=>"if"),
                "4"=>array("item"=>"are in trouble."),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4gso.mp3',
                    "timeRange"     =>"00:45-00:49",
                    "text" => "He is always willing to lend a hand if others are in trouble.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4gso.mp3',
                    "timeRange"     =>"00:45-00:49",
                    "text" => "He is always willing to lend a hand if others are in trouble.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"12",
            "content_id"=>680,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"00:49-00:54",
            "scores"=>1,
            "text" => "He is so busy that he cannot afford enough time with his son.",
            "items" => array(
                "0"=>array("item"=>"he cannot afford"),
                "1"=>array("item"=>"He is so busy"),
                "2"=>array("item"=>"with his son."),
                "3"=>array("item"=>"that"),
                "4"=>array("item"=>"enough time"),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4gso.mp3',
                    "timeRange"     =>"00:49-00:54",
                    "text" => "He is so busy that he cannot afford enough time with his son.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4gso.mp3',
                    "timeRange"     =>"00:49-00:54",
                    "text" => "He is so busy that he cannot afford enough time with his son.",
                    ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"13",
            "content_id"=>681,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"00:54-00:58",
            "scores"=>1,
            "text" => "He has heard a lot of good things about her since he came here.",
            "items" => array(
                "0"=>array("item"=>"a lot of good things"),
                "1"=>array("item"=>"He has heard"),
                "2"=>array("item"=>"he came here."),
                "3"=>array("item"=>"about her"),
                "4"=>array("item"=>"since"),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4gso.mp3',
                    "timeRange"     =>"00:54-00:58",
                    "text" => "He has heard a lot of good things about her since he came here.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4gso.mp3',
                    "timeRange"     =>"00:54-00:58",
                    "text" => "He has heard a lot of good things about her since he came here.",
                    ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"14",
            "content_id"=>682,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"00:58-01:03",
            "scores"=>1,
            "text" => "I always get extremely nervous before I have to give a speech.",
            "items" => array(
                "0"=>array("item"=>"I have to"),
                "1"=>array("item"=>"I always"),
                "2"=>array("item"=>"before"),
                "3"=>array("item"=>"get extremely nervous"),
                "4"=>array("item"=>"give a speech."),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4gso.mp3',
                    "timeRange"     =>"00:58-01:03",
                    "text" => "I always get extremely nervous before I have to give a speech.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4gso.mp3',
                    "timeRange"     =>"00:58-01:03",
                    "text" => "I always get extremely nervous before I have to give a speech.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"15",
            "content_id"=>683,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"01:03-01:08",
            "scores"=>1,
            "text" => "He needs to learn English since his company is opening a branch in London.",
            "items" => array(
                "0"=>array("item"=>"his company is opening"),
                "1"=>array("item"=>"He needs"),
                "2"=>array("item"=>"since"),
                "3"=>array("item"=>"to learn English"),
                "4"=>array("item"=>"a branch in London."),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4gso.mp3',
                    "timeRange"     =>"01:03-01:08",
                    "text" => "He needs to learn English since his company is opening a branch in London.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4gso.mp3',
                    "timeRange"     =>"01:03-01:08",
                    "text" => "He needs to learn English since his company is opening a branch in London.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

         $this->saveEventListToDatabases($data);$a =  json_encode($data);
        $fp = fopen('json63.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
        return;
    }

    public function getPart64(){
        $data = array(
            "unit_id"       =>4,
            "lesson_id"     =>21,
            "part_id"       =>64,
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
            "content_id"=>684,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"sr_ordering",
            "timeRange"     =>"00:00-00:04",
            "scores"=>1,
            "text" => "If we don't have enough evidence, we will lose the case.",
            "answer" => "If we don't have enough evidence we will lose the case",
            "items" => array(
                "0"=>array("item"=>"have enough evidence"),
                "1"=>array("item"=>"If"),
                "2"=>array("item"=>"lose the case."),
                "3"=>array("item"=>"we don't"),
                "4"=>array("item"=>"we will"),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4gsf.mp3',
                    "timeRange"     =>"00:00-00:04",
                    "text" => "If we don't have enough evidence, we will lose the case.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4gsf.mp3',
                    "timeRange"     =>"00:00-00:04",
                    "text" => "If we don't have enough evidence, we will lose the case.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"2",
            "content_id"=>685,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"sr_ordering",
            "timeRange"     =>"00:04-00:08",
            "scores"=>1,
            "text" => "Her parents have to teach her to care for others.",
            "answer" => "Her parents have to teach her to care for others",
            "items" => array(
                "0"=>array("item"=>"have to"),
                "1"=>array("item"=>"Her parents"),
                "2"=>array("item"=>"to care for others."),
                "3"=>array("item"=>"teach her"),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4gsf.mp3',
                    "timeRange"     =>"00:04-00:08",
                    "text" => "Her parents have to teach her to care for others.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4gsf.mp3',
                    "timeRange"     =>"00:04-00:08",
                    "text" => "Her parents have to teach her to care for others.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"3",
            "content_id"=>686,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"sr_ordering",
            "timeRange"     =>"00:08-00:11",
            "scores"=>1,
            "text" => "They were packing to leave for a weekend.",
            "answer" => "They were packing to leave for a weekend",
            "items" => array(
                "0"=>array("item"=>"for a weekend."),
                "1"=>array("item"=>"They"),
                "2"=>array("item"=>"to leave"),
                "3"=>array("item"=>"were packing"),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4gsf.mp3',
                    "timeRange"     =>"00:08-00:11",
                    "text" => "They were packing to leave for a weekend.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4gsf.mp3',
                    "timeRange"     =>"00:08-00:11",
                    "text" => "They were packing to leave for a weekend.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"4",
            "content_id"=>687,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"sr_ordering",
            "timeRange"     =>"00:11-00:16",
            "scores"=>1,
            "text" => "The girl burst into tears immediately when she saw her mother.",
            "answer" => "The girl burst into tears immediately when she saw her mother",
            "items" => array(
                "0"=>array("item"=>"when she saw her mother."),
                "1"=>array("item"=>"burst into tears"),
                "2"=>array("item"=>"The girl"),
                "3"=>array("item"=>"immediately"),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4gsf.mp3',
                    "timeRange"     =>"00:11-00:16",
                    "text" => "The girl burst into tears immediately when she saw her mother.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4gsf.mp3',
                    "timeRange"     =>"00:11-00:16",
                    "text" => "The girl burst into tears immediately when she saw her mother.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"5",
            "content_id"=>688,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"sr_ordering",
            "timeRange"     =>"00:16-00:20",
            "scores"=>1,
            "text" => "The house was greatly damaged by the earthquake.",
            "answer" => "The house was greatly damaged by the earthquake",
            "items" => array(
                "0"=>array("item"=>"was greatly damaged"),
                "1"=>array("item"=>"The house"),
                "2"=>array("item"=>"by the earthquake."),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4gsf.mp3',
                    "timeRange"     =>"00:16-00:20",
                    "text" => "The house was greatly damaged by the earthquake.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4gsf.mp3',
                    "timeRange"     =>"00:16-00:20",
                    "text" => "The house was greatly damaged by the earthquake.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"6",
            "content_id"=>689,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"sr_ordering",
            "timeRange"     =>"00:20-00:24",
            "scores"=>1,
            "text" => "Stay where you are until the police arrive.",
            "answer" => "Stay where you are until the police arrive",
            "items" => array(
                "0"=>array("item"=>"until"),
                "1"=>array("item"=>"Stay"),
                "2"=>array("item"=>"the police"),
                "3"=>array("item"=>"where you are"),
                "4"=>array("item"=>"arrive."),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4gsf.mp3',
                    "timeRange"     =>"00:20-00:24",
                    "text" => "Stay where you are until the police arrive.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4gsf.mp3',
                    "timeRange"     =>"00:20-00:24",
                    "text" => "Stay where you are until the police arrive.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"7",
            "content_id"=>690,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"sr_ordering",
            "timeRange"     =>"00:24-00:29",
            "scores"=>1,
            "text" => "Life is like walking in the snow because every step shows.",
            "answer" => "Life is like walking in the snow because every step shows",
            "items" => array(
                "0"=>array("item"=>"Life is"),
                "1"=>array("item"=>"like walking"),
                "2"=>array("item"=>"in the snow"),
                "3"=>array("item"=>"because"),
                "4"=>array("item"=>"every step shows."),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4gsf.mp3',
                    "timeRange"     =>"00:24-00:29",
                    "text" => "Life is like walking in the snow because every step shows.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4gsf.mp3',
                    "timeRange"     =>"00:24-00:29",
                    "text" => "Life is like walking in the snow because every step shows.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"8",
            "content_id"=>691,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"sr_ordering",
            "timeRange"     =>"00:29-00:33",
            "scores"=>1,
            "text" => "A person is known by the company he keeps.",
            "answer" => "A person is known by the company he keeps",
            "items" => array(
                "0"=>array("item"=>"is known"),
                "1"=>array("item"=>"A person"),
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
            "num"=>"9",
            "content_id"=>692,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"sr_ordering",
            "timeRange"     =>"00:33-00:37",
            "scores"=>1,
            "text" => "Cheaters never win and winners never cheat.",
            "answer" => "Cheaters never win and winners never cheat",
            "items" => array(
                "0"=>array("item"=>"winners"),
                "1"=>array("item"=>"never win"),
                "2"=>array("item"=>"and"),
                "3"=>array("item"=>"Cheaters"),
                "4"=>array("item"=>"never cheat."),
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
            "num"=>"10",
            "content_id"=>693,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"sr_ordering",
            "timeRange"     =>"00:37-00:41",
            "scores"=>1,
            "text" => "Don't let the grass grow under your feet.",
            "answer" => "Don't let the grass grow under your feet",
            "items" => array(
                "0"=>array("item"=>"the grass grow"),
                "1"=>array("item"=>"let"),
                "2"=>array("item"=>"under your feet."),
                "3"=>array("item"=>" Don't"),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4gsf.mp3',
                    "timeRange"     =>"00:37-00:41",
                    "text" => "Don't let the grass grow under your feet.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u4gsf.mp3',
                    "timeRange"     =>"00:37-00:41",
                    "text" => "Don't let the grass grow under your feet.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

         $this->saveEventListToDatabases($data);$a =  json_encode($data);
        $fp = fopen('json64.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
        return;
    }

    //最新MT
    public function getPart65(){
        $data = array(
            "unit_id"       =>4,
            "lesson_id"     =>22,
            "part_id"       =>65,
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
                1=>array(1,2,3),
                2=>array(3,2,1),
                3=>array(2,3,1)
            ),
            "keywords"   =>array(
            ),
        );

        $data['events'][] = array(
            "num"=>"1",
            "type"=>"MTmultipleChoices",
            "media_type"=>"audio",
            "media_filename"=>'media/u4p_original_mt.mp3',
            "timeRange"=>"00:07-00:31",
            "content"=>"Peter is outgoing, friendly and highly interested in sports. He used to practice tennis when he was a young child who wanted to become a professional tennis player. If he hadn't had a serious foot injury, he would have been an excellent tennis player and fulfilled his dream. Now he still loves to do sports with his friends in his spare time during the weekend.",
            "text"=>"Peter is outgoing, friendly and highly interested in sports. He used to practice tennis when he was a young child who wanted to become a professional tennis player. If he hadn't had a serious foot injury, he would have been an excellent tennis player and fulfilled his dream. Now he still loves to do sports with his friends in his spare time during the weekend.",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"1",
                    "content_id"=>694,
                    "type"=>"multipleChoice",
                    "text"=>array("type"=>"text","text"=>"What sports did Peter practice when he was young?"),
                    "scores"=>5,
                    "items"=>array(
                        "0"=>array("item"=>"Tennis.","isCorrect"=>true),
                        "1"=>array("item"=>"Table tennis.", "isCorrect"=>false),
                        "2"=>array("item"=>"Badminton.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                    ),
                ),
                1=>array(
                    "num"=>"1",
                    "content_id"=>695,
                    "type"=>"multipleChoice",
                    "text"=>array("type"=>"text","text"=>"What prevented Peter from becoming an excellent tennis player?"),
                    "scores"=>5,
                    "items"=>array(
                        "0"=>array("item"=>"Lack of professional training.","isCorrect"=>false),
                        "1"=>array("item"=>"A serious foot injury.", "isCorrect"=>true),
                        "2"=>array("item"=>"Lack of enthusiasm. ", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                    ),
                ),
                2=>array(
                    "num"=>"1",
                    "content_id"=>696,
                    "type"=>"multipleChoice",
                    "text"=>array("type"=>"text","text"=>"What might Peter do with his friends in his spare time during the weekend?"),
                    "scores"=>5,
                    "items"=>array(
                        "0"=>array("item"=>"Doing exercises.","isCorrect"=>true),
                        "1"=>array("item"=>"Watching movies. ", "isCorrect"=>false),
                        "2"=>array("item"=>"Playing chess.", "isCorrect"=>false),
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
            "media_filename"=>'media/u4p_original_mt.mp3',
            "timeRange"=>"0:31-00:50",
            "content"=>"This is Bill, the shop assistant, who has been working in the drugstore since it opened 5 years ago. This dark-haired and dark-eyed Italian boy is quite popular with all the customers because he is so cheerful and hospitable; he always smiles whenever he serves them.",
            "text"=>"This is Bill, the shop assistant, who has been working in the drugstore since it opened 5 years ago. This dark-haired and dark-eyed Italian boy is quite popular with all the customers because he is so cheerful and hospitable; he always smiles whenever he serves them.",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"1",
                    "content_id"=>697,
                    "type"=>"multipleChoice",
                    "text"=>array("type"=>"text","text"=>"How many years has Bill, the shop assistant, been working in Peter's drugstore?"),
                    "scores"=>5,
                    "items"=>array(
                        "0"=>array("item"=>"One year ago.","isCorrect"=>false),
                        "1"=>array("item"=>"Just 5 months.", "isCorrect"=>false),
                        "2"=>array("item"=>"More than 5 years. ", "isCorrect"=>true),
                    ),
                    "selectEvents"=>array(
                    ),
                ),
                1=>array(
                    "num"=>"1",
                    "content_id"=>698,
                    "type"=>"multipleChoice",
                    "text"=>array("type"=>"text","text"=>"Where does Bill come from?"),
                    "scores"=>5,
                    "items"=>array(
                        "0"=>array("item"=>"Italy.","isCorrect"=>true),
                        "1"=>array("item"=>"Austria.", "isCorrect"=>false),
                        "2"=>array("item"=>"Egypt.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                    ),
                ),
                2=>array(
                    "num"=>"1",
                    "content_id"=>699,
                    "type"=>"multipleChoice",
                    "text"=>array("type"=>"text","text"=>"Bill is popular with all the customers because________."),
                    "scores"=>5,
                    "items"=>array(
                        "0"=>array("item"=>"He always smiles.","isCorrect"=>false),
                        "1"=>array("item"=>"He is friendly and outgoing.", "isCorrect"=>true),
                        "2"=>array("item"=>"He likes talking with people.", "isCorrect"=>false),
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
            "media_filename"=>'media/u4d_original_mt.mp3',
            "timeRange"=>"01:26-01:40",
            "content"=>"Alice: She looks so pretty. Is she from Spain, too?Helen: Actually, she was born in the United States. Her father is Spanish and her mother is an American born Indian.",
            "text"=>"Alice: She looks so pretty. Is she from Spain, too?Helen: Actually, she was born in the United States. Her father is Spanish and her mother is an American born Indian.",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"1",
                    "content_id"=>700,
                    "type"=>"multipleChoice",
                    "text"=>array("type"=>"text","text"=>"Where was Ada's mother born?"),
                    "scores"=>5,
                    "items"=>array(
                        "0"=>array("item"=>"In India.","isCorrect"=>false),
                        "1"=>array("item"=>"In Spain.", "isCorrect"=>false),
                        "2"=>array("item"=>"In the U.S.", "isCorrect"=>true),
                    ),
                    "selectEvents"=>array(
                    ),
                )
            ),
            "picture"=>"images/type_listen_001.png"
        );

         $this->saveEventListToDatabases($data);$a =  json_encode($data);
        $fp = fopen('json65.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
        return;
    }

    public function getPart66(){
        $data = array(
            "unit_id"       =>4,
            "lesson_id"     =>22,
            "part_id"       =>66,
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
                1=>array(1,2,3,5,6),
                2=>array(2,3,4,5,6),
            ),
            "keywords"      =>array(
            ),
        );

        $data['events'][] = array(
            "num"=>"1",
            "content_id"=>701,
            "type"=>"MTmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u4p_original_mt.mp3',
            "timeRange"=>"00:00-00:07",
            "content"=>"Peter is the shopkeeper of a drugstore which is located across from the office building where Helen works.",
            "text"=>array("type"=>"audio","text"=>"Where is Peter's drugstore located?","media_filename"=>'media/u4pcq.mp3',"timeRange"=>"00:00-00:03"),
            "scores"=>7,
            "items"=>array(
                "0"=>array("item"=>"Next to the office building where Helen works.","isCorrect"=>false),
                "1"=>array("item"=>"Across from the office building where Helen works.", "isCorrect"=>true),
                "2"=>array("item"=>"One block away from the office building where Helen works.", "isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_listen_001.png"
        );

        $data['events'][] = array(
            "num"=>"2",
            "content_id"=>702,
            "type"=>"MTmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u4p_original_mt.mp3',
            "timeRange"=>"00:50-01:00",
            "content"=>"One of the regular customers is Sue, who works as a UI designer in an international software company on the 22nd floor in the opposite building.",
            "text"=>array("type"=>"audio","text"=>"What does Sue do?","media_filename"=>'media/u4pcq.mp3',"timeRange"=>"01:13-01:15"),
            "scores"=>7,
            "items"=>array(
                "0"=>array("item"=>"She is a software programmer.","isCorrect"=>false),
                "1"=>array("item"=>"She is an Engineer.", "isCorrect"=>false),
                "2"=>array("item"=>"She is a UI designer. ", "isCorrect"=>true),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_listen_001.png"
        );

        $data['events'][] = array(
            "num"=>"3",
            "content_id"=>703,
            "type"=>"MTmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u4p_original_mt.mp3',
            "timeRange"=>"01:00-01:10",
            "content"=>"She visits the drugstore two or three times a week for lunch food or other things during the weekdays as it is so close to where she works.",
            "text"=>array("type"=>"audio","text"=>"How often does Sue come to Peter's drugstore?","media_filename"=>'media/u4pcq.mp3',"timeRange"=>"01:20-01:24"),
            "scores"=>7,
            "items"=>array(
                "0"=>array("item"=>"Two or three times a day.","isCorrect"=>false),
                "1"=>array("item"=>"Two or three times a week.", "isCorrect"=>true),
                "2"=>array("item"=>"Once in a while.", "isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_listen_001.png"
        );

        $data['events'][] = array(
            "num"=>"4",
            "content_id"=>704,
            "type"=>"MTmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u4p_original_mt.mp3',
            "timeRange"=>"01:41-01:50",
            "content"=>"Peter loves his store and enjoys seeing people in and out. He dreams of having a big supermarket in the future.",
            "text"=>array("type"=>"audio","text"=>"What is Peter's future dream?","media_filename"=>'media/u4pcq.mp3',"timeRange"=>"02:06-02:09"),
            "scores"=>7,
            "items"=>array(
                "0"=>array("item"=>"To have his own company.","isCorrect"=>false),
                "1"=>array("item"=>"To have a big supermarket.", "isCorrect"=>true),
                "2"=>array("item"=>"To travel around the world.", "isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_listen_001.png"
        );

        $data['events'][] = array(
            "num"=>"5",
            "content_id"=>705,
            "type"=>"MTmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u4d_original_mt.mp3',
            "timeRange"=>"00:00-00:20",
            "content"=>"Alice: Hi, Helen. It's time for lunch. What do you want to have?Helen: Well, I have had fast food for two days and I'm fed up with it. How about seafood? I know a Spanish restaurant not far away. My friend took me there two weeks ago and the paella was very impressive.Alice: Great, why not!",
            "text"=>array("type"=>"audio","text"=>"What is paella?","media_filename"=>'media/u4dcq.mp3',"timeRange"=>"00:05-00:07"),
            "scores"=>7,
            "items"=>array(
                "0"=>array("item"=>"It is a kind of seafood from Japan.","isCorrect"=>false),
                "1"=>array("item"=>"It is a kind of seafood from Spain.", "isCorrect"=>true),
                "2"=>array("item"=>"It is a kind of seafood from America.", "isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_listen_001.png"
        );

        $data['events'][] = array(
            "num"=>"6",
            "content_id"=>706,
            "type"=>"MTmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u4d_original_mt.mp3',
            "timeRange"=>"01:40-01:52",
            "content"=>"Alice: Who's that young waiter in the green T-shirt over there? Is he her brother or some other relative?Helen: Oh, that's her cousin, Tony. He's handsome, right?",
            "text"=>array("type"=>"audio","text"=>"Which of the following is WRONG about Tony?","media_filename"=>'media/u4dcq.mp3',"timeRange"=>"01:20-01:24"),
            "scores"=>7,
            "items"=>array(
                "0"=>array("item"=>"He is Ada's cousin.","isCorrect"=>false),
                "1"=>array("item"=>"He is a handsome guy.", "isCorrect"=>false),
                "2"=>array("item"=>"He is a cook.", "isCorrect"=>true),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_listen_001.png"
        );

         $this->saveEventListToDatabases($data);$a =  json_encode($data);
        $fp = fopen('json66.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
        return;
    }

    public function getPart67(){
        $data = array(
            "unit_id"       =>4,
            "lesson_id"     =>22,
            "part_id"       =>67,
            "media_filename"=>'',
            "content_totalcount"  => 7,
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
            "content_id"=>707,
            "type"=>"SRmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u4p_original_mt.mp3',
            "timeRange"=>"01:10-01:25",
            "content"=>"Another frequent customer to the drugstore is a painter, Joe, whose workshop is just one block away, behind the office building. He often works until very late and goes to the drugstore for cold drinks and snacks.",
            "text"=>array("type"=>"audio","text"=>"Joe comes to Peter's store to buy__________.","media_filename"=>'media/u4pcq.mp3',"timeRange"=>"01:45-01:49"),
            "scores"=>4,
            "items"=>array(
                "0"=>array("item"=>"Drinks and snacks.","answer"=>"Drinks and snack","isCorrect"=>true),
                "1"=>array("item"=>"Cigarettes.","answer"=>"Cigarettes", "isCorrect"=>false),
                "2"=>array("item"=>"Lunch. ","answer"=>"Lunch", "isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"2",
            "content_id"=>708,
            "type"=>"SRmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u4p_original_mt.mp3',
            "timeRange"=>"01:25-01:41",
            "content"=>"Joe is good at drawing comic pictures. Last month, he posted one comic story on his social networking blog on the internet and got the attention of a worldwide film company, which is now trying to find a way to cooperate with him.",
            "text"=>array("type"=>"audio","text"=>"What did Joe post on his social networking blog last month?","media_filename"=>'media/u4pcq.mp3',"timeRange"=>"01:55-02:00"),
            "scores"=>4,
            "items"=>array(
                "0"=>array("item"=>"Funny photos.","answer"=>"Funny photos","isCorrect"=>false),
                "1"=>array("item"=>"A comic story.", "answer"=>"A comic story","isCorrect"=>true),
                "2"=>array("item"=>"Comic pictures.", "answer"=>"Comic pictures","isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"3",
            "content_id"=>709,
            "type"=>"SRmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u4d_original_mt.mp3',
            "timeRange"=>"00:20-00:29",
            "content"=>"Alice: Hmm. It looks so delicious and tastes fabulous!Helen: All kinds of seasonings here are shipped from Spain. ",
            "text"=>array("type"=>"audio","text"=>"What does Alice think of paella, the seafood?","media_filename"=>'media/u4dcq.mp3',"timeRange"=>"00:07-00:11"),
            "scores"=>4,
            "items"=>array(
                "0"=>array("item"=>"It tastes bad.","answer"=>"It tastes bad","isCorrect"=>false),
                "1"=>array("item"=>"It tastes differently.", "answer"=>"It tastes differently","isCorrect"=>false),
                "2"=>array("item"=>"It tastes good.", "answer"=>"It tastes good","isCorrect"=>true),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"4",
            "content_id"=>710,
            "type"=>"SRmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u4d_original_mt.mp3',
            "timeRange"=>"00:29-00:43",
            "content"=>"Alice:It sounds like you know a lot about the restaurant.Helen: Well, my friend told me something about this restaurant. Look at those black and white pictures on the wall. This couple was the founder of the restaurant in Spain.",
            "text"=>array("type"=>"audio","text"=>"Who set up the seafood restaurant in Spain?","media_filename"=>'media/u4dcq.mp3',"timeRange"=>"00:22-00:26"),
            "scores"=>4,
            "items"=>array(
                "0"=>array("item"=>"A fisherman.","answer"=>"A fisherman","isCorrect"=>false),
                "1"=>array("item"=>"A couple.","answer"=>"A couple", "isCorrect"=>true),
                "2"=>array("item"=>"A rich man.","answer"=>"A rich man", "isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"5",
            "content_id"=>711,
            "type"=>"SRmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u4d_original_mt.mp3',
            "timeRange"=>"00:43-00:55",
            "content"=>"They used to be fishermen in a small village. Later on, they started working and running seafood restaurants. They have had 5 chain restaurants there.",
            "text"=>array("type"=>"audio","text"=>"How many restaurants has the couple had in Spain?","media_filename"=>'media/u4dcq.mp3',"timeRange"=>"00:31-00:35"),
            "scores"=>4,
            "items"=>array(
                "0"=>array("item"=>"15","answer"=>"fifteen","isCorrect"=>false),
                "1"=>array("item"=>"50","answer"=>"fifty", "isCorrect"=>false),
                "2"=>array("item"=>"5","answer"=>"five", "isCorrect"=>true),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"6",
            "content_id"=>712,
            "type"=>"SRmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u4d_original_mt.mp3',
            "timeRange"=>"00:55-01:12",
            "content"=>"Their son, David, moved to the U.S. about 25 years ago, and set up the first restaurant in a town in New Jersey on the east coast with his brother Jason. Then, they set up the second restaurant in Chicago two years later.",
            "text"=>array("type"=>"audio","text"=>"Who founded this chain seafood restaurant in the U.S?","media_filename"=>'media/u4dcq.mp3',"timeRange"=>"00:38-00:42"),
            "scores"=>4,
            "items"=>array(
                "0"=>array("item"=>"David and Jason.","answer"=>"David and Jason","isCorrect"=>true),
                "1"=>array("item"=>"Ada.","answer"=>"Ada", "isCorrect"=>false),
                "2"=>array("item"=>"The couple.","answer"=>"The couple", "isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"7",
            "content_id"=>713,
            "type"=>"SRmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u4d_original_mt.mp3',
            "timeRange"=>"01:12-01:26",
            "content"=>"This restaurant was left to David's niece, Ada, to run. That lady behind the cashier counter is Ada. She graduated from the University of Southern California last year. ",
            "text"=>array(
                "type"=>"audio",
                "text"=>"Who is in charge of the operation of the restaurant?",
                "media_filename"=>'media/u4dcq.mp3',
                "timeRange"=>"00:56-00:59"
            ),
            "scores"=>4,
            "items"=>array(
                "0"=>array("item"=>"David.","answer"=>"David","isCorrect"=>false),
                "1"=>array("item"=>"Ada.","answer"=>"Ada", "isCorrect"=>true),
                "2"=>array("item"=>"Jason.","answer"=>"Jason", "isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_speak_001.png"
        );


         $this->saveEventListToDatabases($data);$a =  json_encode($data);
        $fp = fopen('json67.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
        return;
    }

    public function getPart68(){
        $data = array(
            "unit_id"       =>4,
            "lesson_id"     =>22,
            "part_id"       =>68,
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
            "content_id"=>714,
            "media_filename"=>'media/u4gfi.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"00:32-00:36",
            "scores"=>5,
            "text" => "He will take over as general manager next month.",
            "answer" => "He will take over as general manager next month",
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"2",
            "content_id"=>715,
            "media_filename"=>'media/u4gfi.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"01:26-01:30",
            "scores"=>5,
            "text" => "She managed a smile to cover up her disappointment.",
            "answer" => "She managed a smile to cover up her disappointment",
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"3",
            "content_id"=>716,
            "media_filename"=>'media/u4gso.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"00:20-00:23",
            "scores"=>5,
            "text" => "Would you like to come along with us to the concert tonight？",
            "answer" => "Would you like to come along with us to the concert tonight",
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"4",
            "content_id"=>717,
            "media_filename"=>'media/u4gso.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"00:45-00:49",
            "scores"=>5,
            "text" => "He is always willing to lend a hand if others are in trouble",
            "answer" => "He is always willing to lend a hand if others are in trouble",
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"5",
            "content_id"=>718,
            "media_filename"=>'media/u4gsf.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"00:33-00:37",
            "scores"=>5,
            "text" => "Cheaters never win and winners never cheat.",
            "answer" => "Cheaters never win and winners never cheat",
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"6",
            "content_id"=>719,
            "media_filename"=>'media/u4gsf.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"00:37-00:41",
            "scores"=>5,
            "text" => "Don't let the grass grow under your feet.",
            "answer" => "Don't let the grass grow under your feet",
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_speak_001.png"
        );

         $this->saveEventListToDatabases($data);$a =  json_encode($data);
        $fp = fopen('json68.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
        return;
    }

    public function createJson(){
        for($i=52;$i<=68;$i++){
            $function = "getPart".$i;
            $this->$function();
        }
    }
}
