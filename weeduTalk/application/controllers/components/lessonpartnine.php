<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lessonpartnine extends CI_Controller {

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
    public function getPart237(){
        $data = array(
            "unit_id"       =>26,
            "lesson_id"     =>80,
            "part_id"       =>237,
            "media_filename"=>'media/u9p.mp3',
            "media_type"    =>'audio',
            "totalTime"     =>"2:08",
            "part_type"     =>"listening",
            "have_questions"=>false,
            "questions_type"=>"text",
            "keywords"      =>array(
                "surround",
                "Atlantic Ocean",
                "square kilometer",
                "inhabitant",
                "population",
                "industrialized",
                "complicated",
                "involve",
                "slave",
                "transport",
                "abolish",
                "slavery",
                "Industrial Revolution",
                "empire",
                "territory",
                "dominate",
                "economy",
                "influential",
                "spread",
                "immigration",
                "multi-cultural",
                "the European Union",
                "attractive",
                "destination"
            ),
        );
        $data['events'][] = array(
            "num"=>"2",
            'type'=>"text",
            "timeRange"=>"00:00-00:11",
            "text"=>"Hello, this is Channel We. I'm Miss. V. In today's program we are going to talk about the location, history and development of the United Kingdom.",
            "media_filename"=>'media/u8Mr_V.mp4',
            "media_type"    =>'video',
            "picture"=>"images/u9_p_001.png",
            "pictures"=>array()

        );
        $data['events'][] = array(
            "num"=>"3",
            'type'=>"text",
            "timeRange"=>"00:00-00:12",
            "displayKewords"=>true,
            "text"=>"England, Scotland, Wales and Northern Ireland are all part of a country in Western Europe, known as the United Kingdom or Britain.",
            "picture"=>"images/u9_p_001.png"
        );
        $data['events'][] = array(
            "num"=>"4",
            'type'=>"text",
            "timeRange"=>"00:12-00:17",
            "text"=>"Many small islands also make up the UK. ",
            "picture"=>"images/u9_p_001.png"
        );
        $data['events'][] = array(
            "num"=>"5",
            'type'=>"text",
            "timeRange"=>"00:17-00:22",
            "text"=>"The United Kingdom is surrounded by the Atlantic Ocean.",
            "picture"=>"images/u9_p_001.png"
        );
        $data['events'][] = array(
            "num"=>"6",
            'type'=>"text",
            "timeRange"=>"00:22-00:34",
            "text"=>"The whole country has an area of 242,500 square kilometers and has about 65 million inhabitants.",
            "picture"=>"images/u9_p_001.png"
        );
        $data['events'][] = array(
            "num"=>"7",
            'type'=>"text",
            "timeRange"=>"00:34-00:40",
            "text"=>"London is the capital and the largest city in the country. ",
            "picture"=>"images/u9_p_002.png"
        );

        $data['events'][] = array(
            "num"=>"8",
            'type'=>"text",
            "timeRange"=>"00:40-00:46",
            "text"=>"It is a world famous global city and global financial centre.",
            "picture"=>"images/u9_p_002.png"
        );

        $data['events'][] = array(
            "num"=>"9",
            'type'=>"text",
            "timeRange"=>"00:46-00:51",
            "text"=>"SThe population of its urban area is around 10 million.",
            "picture"=>"images/u9_p_002.png"
        );

        $data['events'][] = array(
            "num"=>"10",
            'type'=>"text",
            "timeRange"=>"00:51-00:58",
            "text"=>"Britain is a developed country and is considered to have a high-income economy.",
            "picture"=>"images/u9_p_002.png"
        );

        $data['events'][] = array(
            "num"=>"11",
            'type'=>"text",
            "timeRange"=>"00:58-01:03",
            "text"=>"It was the world's first industrialized country.",
            "picture"=>"images/u9_p_002.png"
        );

        $data['events'][] = array(
            "num"=>"12",
            'type'=>"text",
            "timeRange"=>"01:03-01:09",
            "text"=>"The United Kingdom has a long and very complicated history.",
            "picture"=>"images/u9_p_002.png"
        );

        $data['events'][] = array(
            "num"=>"13",
            'type'=>"text",
            "timeRange"=>"01:09-01:16",
            "text"=>"Its first inhabitants can be traced back to over 3000 years ago.",
            "picture"=>"images/u9_p_002.png"
        );

        $data['events'][] = array(
            "num"=>"14",
            'type'=>"text",
            "timeRange"=>"01:16-01:28",
            "text"=>"In the past several hundred years, the country has experienced many ups and downs politically, economically, culturally and in many other areas. ",
            "picture"=>"images/u9_p_002.png"
        );

        $data['events'][] = array(
            "num"=>"15",
            'type'=>"text",
            "timeRange"=>"01:28-01:35",
            "text"=>"During the 18th century, Britain was involved in the Atlantic slave trade.",
            "picture"=>"images/u9_p_003.png"
        );

        $data['events'][] = array(
            "num"=>"16",
            'type'=>"text",
            "timeRange"=>"01:35-01:42",
            "text"=>"Its ships transported a lot of slaves from Africa to the West Indies.",
            "picture"=>"images/u9_p_003.png"
        );

        $data['events'][] = array(
            "num"=>"17",
            'type'=>"text",
            "timeRange"=>"01:42-01:50",
            "text"=>"Later, the country took a leading role in the movement of abolishing slavery worldwide.",
            "picture"=>"images/u9_p_003.png"
        );

        $data['events'][] = array(
            "num"=>"18",
            'type'=>"text",
            "timeRange"=>"01:50-01:57",
            "text"=>"In the early 19th century, the country led the famous Industrial Revolution. ",
            "picture"=>"images/u9_p_004.png"
        );

        $data['events'][] = array(
            "num"=>"19",
            'type'=>"text",
            "timeRange"=>"01:57-02:01",
            "text"=>"Later, it developed into an empire.",
            "picture"=>"images/u9_p_004.png"
        );

        $data['events'][] = array(
            "num"=>"20",
            'type'=>"text",
            "timeRange"=>"02:01-02:07",
            "text"=>"It expanded very fast to many territories throughout the world. ",
            "picture"=>"images/u9_p_004.png"
        );

        $data['events'][] = array(
            "num"=>"21",
            'type'=>"text",
            "timeRange"=>"02:07-02:15",
            "text"=>"It dominated a large part of world trade and effectively controlled the economies of many regions.",
            "picture"=>"images/u9_p_004.png"
        );

        $data['events'][] = array(
            "num"=>"22",
            'type'=>"text",
            "timeRange"=>"02:15-02:22",
            "text"=>"Because of this fast development, the English language has become very influential.",
            "picture"=>"images/u9_p_005.png"
        );

        $data['events'][] = array(
            "num"=>"23",
            'type'=>"text",
            "timeRange"=>"02:22-02:29",
            "text"=>"Over the years its literature and culture have greatly spread throughout the world. ",
            "picture"=>"images/u9_p_005.png"
        );


        $data['events'][] = array(
            "num"=>"24",
            'type'=>"text",
            "timeRange"=>"02:29-02:39",
            "text"=>"In the 1950s, the country experienced a shortage of workers, so the government encouraged immigration from other countries.",
            "picture"=>"images/u9_p_006.png"
        );

        $data['events'][] = array(
            "num"=>"25",
            'type'=>"text",
            "timeRange"=>"02:39-02:46",
            "text"=>"As a result, today the UK is a more multi-cultural society.",
            "picture"=>"images/u9_p_006.png"
        );

        $data['events'][] = array(
            "num"=>"26",
            'type'=>"text",
            "timeRange"=>"02:46-02:51",
            "text"=>"The UK used to be a member of the European Union.",
            "picture"=>"images/u9_p_007.png"
        );
        $data['events'][] = array(
            "num"=>"27",
            'type'=>"text",
            "timeRange"=>"02:51-02:59",
            "text"=>"However, as time went on, more and more people thought they should quit the European Union. ",
            "picture"=>"images/u9_p_008.png"
        );
        $data['events'][] = array(
            "num"=>"28",
            'type'=>"text",
            "timeRange"=>"02:59-03:07",
            "text"=>"In 2016, the United Kingdom voted to leave the EU.",
            "picture"=>"images/u9_p_008.png"
        );
        $data['events'][] = array(
            "num"=>"29",
            'type'=>"text",
            "timeRange"=>"03:07-03:11",
            "text"=>"Now the UK has become more attractive.",
            "picture"=>"images/u9_p_009.png"
        );
        $data['events'][] = array(
            "num"=>"30",
            'type'=>"text",
            "timeRange"=>"03:11-03:17",
            "text"=>"More and more students choose to go to the UK for higher education.",
            "picture"=>"images/u9_p_009.png"
        );

        $data['events'][] = array(
            "num"=>"31",
            'type'=>"text",
            "timeRange"=>"03:17-03:26",
            "text"=>"With its long history and rich culture, it has become one of the most popular tourism destinations.",
            "picture"=>"images/u9_p_09.png"
        );

         $this->saveEventListToDatabases($data);$a =  json_encode($data);
        $fp = fopen('json237.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
        return;

    }

    public function getPart238(){

        $data = array(
            "unit_id"       =>26,
            "lesson_id"     =>80,
            "part_id"       =>238,
            "media_filename"=>'media/u9p.mp3',
            "media_type"    =>'audio',
            "totalTime"     =>"2:08",
            "part_type"     =>"listening",
            "have_questions"=>false,
            "questions_type"=>"text",
            "keywords"      =>array(
                "surround",
                "Atlantic Ocean",
                "square kilometer",
                "inhabitant",
                "population",
                "industrialized",
                "complicated",
                "involve",
                "slave",
                "transport",
                "abolish",
                "slavery",
                "Industrial Revolution",
                "empire",
                "territory",
                "dominate",
                "economy",
                "influential",
                "spread",
                "immigration",
                "multi-cultural",
                "the European Union",
                "attractive",
                "destination"
            ),
        );

        $data['events'][] = array(
            "num"=>"2",
            'type'=>"text",
            "timeRange"=>"00:00-00:11",
            "text"=>"Hello, this is Channel We. I'm Miss. V. In today's program we are going to talk about the location, history and development of the United Kingdom.",
            "media_filename"=>'media/u8Mr_V.mp4',
            "media_type"    =>'video',
            "picture"=>"images/u9_p_001.png",
            "pictures"=>array()

        );
        $data['events'][] = array(
            "num"=>"3",
            'type'=>"text",
            "timeRange"=>"00:00-00:12",
            "displayKewords"=>true,
            "text"=>"England, Scotland, Wales and Northern Ireland are all part of a country in Western Europe, known as the United Kingdom or Britain.",
            "picture"=>"images/u9_p_001.png"
        );

        $data['events'][] = array(
            "num"=>"4",
            'type'=>"multipleChoices",
            "timeRange"=>"",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"5",
                    "content_id"=>1456,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9pcq.mp3',
                    "timeRange"=>"00:00-00:03",
                    "text"=>"Where is the United Kingdom located?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"In Western Europe.","isCorrect"=>true),
                        "1"=>array("item"=>"In Central Europe.", "isCorrect"=>false),
                        "2"=>array("item"=>"In Western Africa.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u9p.mp3',
                            "timeRange"=>"00:00-00:12",
                            "text"=>"England, Scotland, Wales and Northern Ireland are all part of a country in Western Europe, known as the United Kingdom or Britain."
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u9p.mp3',
                            "timeRange"=>"00:00-00:12",
                            "text"=>"England, Scotland, Wales and Northern Ireland are all part of a country in Western Europe, known as the United Kingdom or Britain."
                        ),
                    ),
                ),
                1=>array(
                    "num"=>"6",
                    "content_id"=>1457,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9pcq.mp3',
                    "timeRange"=>"00:03-00:09",
                    "text"=>"Is Britain made up of England, Scotland, Wales and Northern Ireland?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Yes.","isCorrect"=>true),
                        "1"=>array("item"=>"No.", "isCorrect"=>false)
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u9p.mp3',
                            "timeRange"=>"00:00-00:12",
                            "text"=>"England, Scotland, Wales and Northern Ireland are all part of a country in Western Europe, known as the United Kingdom or Britain."
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u9p.mp3',
                            "timeRange"=>"00:00-00:12",
                            "text"=>"England, Scotland, Wales and Northern Ireland are all part of a country in Western Europe, known as the United Kingdom or Britain."
                        ),
                    ),
                )
            )
        );

        $data['events'][] = array(
            "num"=>"7",
            'type'=>"text",
            "timeRange"=>"00:12-00:17",
            "text"=>"Many small islands also make up the UK. ",
            "picture"=>"images/u9_p_001.png"
        );
        $data['events'][] = array(
            "num"=>"8",
            'type'=>"text",
            "timeRange"=>"00:17-00:22",
            "text"=>"The United Kingdom is surrounded by the Atlantic Ocean.",
            "picture"=>"images/u9_p_001.png"
        );
        $data['events'][] = array(
            "num"=>"9",
            'type'=>"text",
            "timeRange"=>"00:22-00:34",
            "text"=>"The whole country has an area of 242,500 square kilometers and has about 65 million inhabitants.",
            "picture"=>"images/u9_p_001.png"
        );
        $data['events'][] = array(
            "num"=>"10",
            'type'=>"multipleChoices",
            "timeRange"=>"",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"11",
                    "content_id"=>1458,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9pcq.mp3',
                    "timeRange"=>"00:09-00:13",
                    "text"=>"By which ocean is the United Kingdom surrounded?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"The Atlantic Ocean.","isCorrect"=>true),
                        "1"=>array("item"=>"The Pacific Ocean.", "isCorrect"=>false),
                        "2"=>array("item"=>"The Arctic Ocean.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u9p.mp3',
                            "timeRange"=>"00:17-00:22",
                            "text"=>"The United Kingdom is surrounded by the Atlantic Ocean. "
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u9p.mp3',
                            "timeRange"=>"00:17-00:22",
                            "text"=>"The United Kingdom is surrounded by the Atlantic Ocean. "
                        ),
                    ),
                ),
                1=>array(
                    "num"=>"12",
                    "content_id"=>1459,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9pcq.mp3',
                    "timeRange"=>"00:13-00:17",
                    "text"=>"What is the population of the United Kingdom?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"About 56 million.","isCorrect"=>false),
                        "1"=>array("item"=>"About 65 million.", "isCorrect"=>true),
                        "2"=>array("item"=>"About 60 million.", "isCorrect"=>false)
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u9p.mp3',
                            "timeRange"=>"00:22-00:34",
                            "text"=>"The whole country has an area of 242,500 square kilometers and has about 65 million inhabitants."
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u9p.mp3',
                            "timeRange"=>"00:22-00:34",
                            "text"=>"The whole country has an area of 242,500 square kilometers and has about 65 million inhabitants."
                        ),
                    ),
                )
            )
        );

        $data['events'][] = array(
            "num"=>"13",
            'type'=>"text",
            "timeRange"=>"00:34-00:40",
            "text"=>"London is the capital and the largest city in the country. ",
            "picture"=>"images/u9_p_002.png"
        );

        $data['events'][] = array(
            "num"=>"14",
            'type'=>"text",
            "timeRange"=>"00:40-00:46",
            "text"=>"It is a world famous global city and global financial centre.",
            "picture"=>"images/u9_p_002.png"
        );

        $data['events'][] = array(
            "num"=>"15",
            'type'=>"text",
            "timeRange"=>"00:46-00:51",
            "text"=>"SThe population of its urban area is around 10 million.",
            "picture"=>"images/u9_p_002.png"
        );

        $data['events'][] = array(
            "num"=>"16",
            'type'=>"text",
            "timeRange"=>"00:51-00:58",
            "text"=>"Britain is a developed country and is considered to have a high-income economy.",
            "picture"=>"images/u9_p_002.png"
        );

        $data['events'][] = array(
            "num"=>"17",
            'type'=>"text",
            "timeRange"=>"00:58-01:03",
            "text"=>"It was the world's first industrialized country.",
            "picture"=>"images/u9_p_002.png"
        );

        $data['events'][] = array(
            "num"=>"18",
            'type'=>"multipleChoices",
            "timeRange"=>"",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"19",
                    "content_id"=>1460,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9pcq.mp3',
                    "timeRange"=>"00:17-00:21",
                    "text"=>"What is the population of the largest city in Britain?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"1,000,000.","isCorrect"=>false),
                        "1"=>array("item"=>"10,000,000.", "isCorrect"=>false),
                        "2"=>array("item"=>"Not mentioned. ", "isCorrect"=>true),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u9p.mp3',
                            "timeRange"=>"00:34-00:51",
                            "text"=>"London is the capital and the largest city in the country. It is a world famous global city and global financial centre.  The population of its urban area is around 10 million."
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u9p.mp3',
                            "timeRange"=>"00:34-00:51",
                            "text"=>"London is the capital and the largest city in the country. It is a world famous global city and global financial centre.  The population of its urban area is around 10 million."
                        ),
                    ),
                ),
                1=>array(
                    "num"=>"20",
                    "content_id"=>1461,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9pcq.mp3',
                    "timeRange"=>"00:21-00:25",
                    "text"=>"Is London still a global financial center?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Yes.","isCorrect"=>true),
                        "1"=>array("item"=>"No.", "isCorrect"=>false)
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u9p.mp3',
                            "timeRange"=>"00:40-00:46",
                            "text"=>"It is a world famous global city and global financial centre."
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u9p.mp3',
                            "timeRange"=>"00:40-00:46",
                            "text"=>"It is a world famous global city and global financial centre."
                        ),
                    ),
                ),
                1=>array(
                    "num"=>"21",
                    "content_id"=>1462,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9pcq.mp3',
                    "timeRange"=>"00:25-00:27",
                    "text"=>"Which statement is true?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"The United Kingdom is the world's most industrialized country.","isCorrect"=>false),
                        "1"=>array("item"=>"The United Kingdom was the world's first modernized country.", "isCorrect"=>false),
                        "2"=>array("item"=>"The United Kingdom was the world's first industrialized country.", "isCorrect"=>true)
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u9p.mp3',
                            "timeRange"=>"00:58-01:03",
                            "text"=>"It was the world's first industrialized country."
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u9p.mp3',
                            "timeRange"=>"00:58-01:03",
                            "text"=>"It was the world's first industrialized country."
                        ),
                    ),
                )
            )
        );


        $data['events'][] = array(
            "num"=>"22",
            'type'=>"text",
            "timeRange"=>"01:03-01:09",
            "text"=>"The United Kingdom has a long and very complicated history.",
            "picture"=>"images/u9_p_002.png"
        );

        $data['events'][] = array(
            "num"=>"23",
            'type'=>"text",
            "timeRange"=>"01:09-01:16",
            "text"=>"Its first inhabitants can be traced back to over 3000 years ago.",
            "picture"=>"images/u9_p_002.png"
        );

        $data['events'][] = array(
            "num"=>"24",
            'type'=>"text",
            "timeRange"=>"01:16-01:28",
            "text"=>"In the past several hundred years, the country has experienced many ups and downs politically, economically, culturally and in many other areas. ",
            "picture"=>"images/u9_p_002.png"
        );

        $data['events'][] = array(
            "num"=>"25",
            'type'=>"text",
            "timeRange"=>"01:28-01:35",
            "text"=>"During the 18th century, Britain was involved in the Atlantic slave trade.",
            "picture"=>"images/u9_p_003.png"
        );

        $data['events'][] = array(
            "num"=>"26",
            'type'=>"text",
            "timeRange"=>"01:35-01:42",
            "text"=>"Its ships transported a lot of slaves from Africa to the West Indies.",
            "picture"=>"images/u9_p_003.png"
        );

        $data['events'][] = array(
            "num"=>"27",
            'type'=>"text",
            "timeRange"=>"01:42-01:50",
            "text"=>"Later, the country took a leading role in the movement of abolishing slavery worldwide.",
            "picture"=>"images/u9_p_003.png"
        );



        $data['events'][] = array(
            "num"=>"28",
            'type'=>"multipleChoices",
            "timeRange"=>"",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"29",
                    "content_id"=>1463,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9pcq.mp3',
                    "timeRange"=>"00:30-00:34",
                    "text"=>"How far can Britain's first settlers date back to?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Less than 3 thousand years.","isCorrect"=>false),
                        "1"=>array("item"=>"More than 3 thousand years.", "isCorrect"=>true),
                        "2"=>array("item"=>"Over 2 thousand years.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u9p.mp3',
                            "timeRange"=>"01:09-01:16",
                            "text"=>"Its first inhabitants can be traced back to over 3000 years ago. "
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u9p.mp3',
                            "timeRange"=>"01:09-01:16",
                            "text"=>"Its first inhabitants can be traced back to over 3000 years ago. "
                        ),
                    ),
                ),
                1=>array(
                    "num"=>"30",
                    "content_id"=>1463,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9pcq.mp3',
                    "timeRange"=>"00:40-00:44",
                    "text"=>"Where did Britain's ships transport slaves?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"From Africa to West Europe.","isCorrect"=>false),
                        "1"=>array("item"=>"From Africa to the West Indies.", "isCorrect"=>true),
                        "2"=>array("item"=>"From Asia to the West Indies.", "isCorrect"=>false)
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u9p.mp3',
                            "timeRange"=>"01:28-01:42",
                            "text"=>"During the 18th century, Britain was involved in the Atlantic slave trade. Its ships transported a lot of slaves from Africa to the West Indies."
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u9p.mp3',
                            "timeRange"=>"01:28-01:42",
                            "text"=>"During the 18th century, Britain was involved in the Atlantic slave trade. Its ships transported a lot of slaves from Africa to the West Indies."
                        ),
                    ),
                )
            )
        );


        $data['events'][] = array(
            "num"=>"31",
            'type'=>"text",
            "timeRange"=>"01:50-01:57",
            "text"=>"In the early 19th century, the country led the famous Industrial Revolution. ",
            "picture"=>"images/u9_p_004.png"
        );

        $data['events'][] = array(
            "num"=>"32",
            'type'=>"text",
            "timeRange"=>"01:57-02:01",
            "text"=>"Later, it developed into an empire.",
            "picture"=>"images/u9_p_004.png"
        );

        $data['events'][] = array(
            "num"=>"33",
            'type'=>"text",
            "timeRange"=>"02:01-02:07",
            "text"=>"It expanded very fast to many territories throughout the world. ",
            "picture"=>"images/u9_p_004.png"
        );

        $data['events'][] = array(
            "num"=>"34",
            'type'=>"text",
            "timeRange"=>"02:07-02:15",
            "text"=>"It dominated a large part of world trade and effectively controlled the economies of many regions.",
            "picture"=>"images/u9_p_004.png"
        );


        $data['events'][] = array(
            "num"=>"35",
            'type'=>"multipleChoices",
            "timeRange"=>"",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"36",
                    "content_id"=>1464,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9pcq.mp3',
                    "timeRange"=>"00:48-00:52",
                    "text"=>"When did the United Kingdom lead the Industrial Revolution?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"In the early 18th century.","isCorrect"=>false),
                        "1"=>array("item"=>"In the early 19th century.", "isCorrect"=>true),
                        "2"=>array("item"=>"In the late 18th century.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u9p.mp3',
                            "timeRange"=>"01:50-01:57",
                            "text"=>"In the early 19th century, the country led the famous Industrial Revolution."
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u9p.mp3',
                            "timeRange"=>"01:50-01:57",
                            "text"=>"In the early 19th century, the country led the famous Industrial Revolution."
                        ),
                    ),
                ),
                1=>array(
                    "num"=>"37",
                    "content_id"=>1465,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9pcq.mp3',
                    "timeRange"=>"00:52-00:57",
                    "text"=>"Why did Britain dominate a large part of world trade?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Because of Industrial Revolution, it expanded very fast to many territories throughout the world.","isCorrect"=>true),
                        "1"=>array("item"=>"Because it was an empire.", "isCorrect"=>false),
                        "2"=>array("item"=>"Because it was the largest country in the world.", "isCorrect"=>false)
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u9p.mp3',
                            "timeRange"=>"01:50-02:15",
                            "text"=>"In the early 19th century, the country led the famous Industrial Revolution. Later, it developed into an empire. It expanded very fast to many territories throughout the world. It dominated a large part of world trade and effectively controlled the economies of many regions."
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u9p.mp3',
                            "timeRange"=>"01:50-02:15",
                            "text"=>"In the early 19th century, the country led the famous Industrial Revolution. Later, it developed into an empire. It expanded very fast to many territories throughout the world. It dominated a large part of world trade and effectively controlled the economies of many regions."
                        ),
                    ),
                )
            )
        );

        $data['events'][] = array(
            "num"=>"38",
            'type'=>"text",
            "timeRange"=>"02:15-02:22",
            "text"=>"Because of this fast development, the English language has become very influential.",
            "picture"=>"images/u9_p_005.png"
        );

        $data['events'][] = array(
            "num"=>"39",
            'type'=>"text",
            "timeRange"=>"02:22-02:29",
            "text"=>"Over the years its literature and culture have greatly spread throughout the world. ",
            "picture"=>"images/u9_p_005.png"
        );


        $data['events'][] = array(
            "num"=>"40",
            'type'=>"text",
            "timeRange"=>"02:29-02:39",
            "text"=>"In the 1950s, the country experienced a shortage of workers, so the government encouraged immigration from other countries.",
            "picture"=>"images/u9_p_006.png"
        );

        $data['events'][] = array(
            "num"=>"41",
            'type'=>"text",
            "timeRange"=>"02:39-02:46",
            "text"=>"As a result, today the UK is a more multi-cultural society.",
            "picture"=>"images/u9_p_006.png"
        );

        $data['events'][] = array(
            "num"=>"42",
            'type'=>"multipleChoices",
            "timeRange"=>"",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"43",
                    "content_id"=>1466,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9pcq.mp3',
                    "timeRange"=>"00:57-01:00",
                    "text"=>"Why has English become influential?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Because of its rapid development.","isCorrect"=>true),
                        "1"=>array("item"=>"Because of its stable development.", "isCorrect"=>false),
                        "2"=>array("item"=>"Because of its slow development.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u9p.mp3',
                            "timeRange"=>"02:15-02:22",
                            "text"=>"Because of this fast development, the English language has become very influential."
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u9p.mp3',
                            "timeRange"=>"02:15-02:22",
                            "text"=>"Because of this fast development, the English language has become very influential."
                        ),
                    ),
                ),
                1=>array(
                    "num"=>"44",
                    "content_id"=>1467,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9pcq.mp3',
                    "timeRange"=>"01:00-01:05",
                    "text"=>"What did the country encounter in the 1950s?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"A workforce shortage.","isCorrect"=>true),
                        "1"=>array("item"=>"An energy shortage.", "isCorrect"=>false),
                        "2"=>array("item"=>"A finance shortage.", "isCorrect"=>false)
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u9p.mp3',
                            "timeRange"=>"02:29-02:39",
                            "text"=>"In the 1950s, the country experienced a shortage of workers, so the government encouraged immigration from other countries. "
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u9p.mp3',
                            "timeRange"=>"02:29-02:39",
                            "text"=>"In the 1950s, the country experienced a shortage of workers, so the government encouraged immigration from other countries. "
                        ),
                    ),
                ),
                2=>array(
                    "num"=>"45",
                    "content_id"=>1468,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9pcq.mp3',
                    "timeRange"=>"01:11-01:16",
                    "text"=>"Why is the United Kingdom a more multi-cultural society?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Because of immigrants from other countries.","isCorrect"=>true),
                        "1"=>array("item"=>"Because of emigrants to other countries.", "isCorrect"=>false),
                        "2"=>array("item"=>"Because of the shortage of workers.", "isCorrect"=>false)
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u9p.mp3',
                            "timeRange"=>"02:29-02:46",
                            "text"=>"In the 1950s, the country experienced a shortage of workers, so the government encouraged immigration from other countries. As a result, today the UK is a more multi-cultural society."
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u9p.mp3',
                            "timeRange"=>"02:29-02:46",
                            "text"=>"In the 1950s, the country experienced a shortage of workers, so the government encouraged immigration from other countries. As a result, today the UK is a more multi-cultural society."
                        ),
                    ),
                )
            )
        );

        $data['events'][] = array(
            "num"=>"46",
            'type'=>"text",
            "timeRange"=>"02:46-02:51",
            "text"=>"The UK used to be a member of the European Union.",
            "picture"=>"images/u9_p_007.png"
        );
        $data['events'][] = array(
            "num"=>"47",
            'type'=>"text",
            "timeRange"=>"02:51-02:59",
            "text"=>"However, as time went on, more and more people thought they should quit the European Union. ",
            "picture"=>"images/u9_p_008.png"
        );
        $data['events'][] = array(
            "num"=>"48",
            'type'=>"text",
            "timeRange"=>"02:59-03:07",
            "text"=>"In 2016, the United Kingdom voted to leave the EU.",
            "picture"=>"images/u9_p_008.png"
        );
        $data['events'][] = array(
            "num"=>"49",
            'type'=>"text",
            "timeRange"=>"03:07-03:11",
            "text"=>"Now the UK has become more attractive.",
            "picture"=>"images/u9_p_009.png"
        );
        $data['events'][] = array(
            "num"=>"50",
            'type'=>"text",
            "timeRange"=>"03:11-03:17",
            "text"=>"More and more students choose to go to the UK for higher education.",
            "picture"=>"images/u9_p_009.png"
        );

        $data['events'][] = array(
            "num"=>"51",
            'type'=>"text",
            "timeRange"=>"03:17-03:26",
            "text"=>"With its long history and rich culture, it has become one of the most popular tourism destinations.",
            "picture"=>"images/u9_p_09.png"
        );

        $data['events'][] = array(
            "num"=>"52",
            'type'=>"multipleChoices",
            "timeRange"=>"",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"53",
                    "content_id"=>1469,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9pcq.mp3',
                    "timeRange"=>"01:16-01:18",
                    "text"=>"Which statement is true?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"The UK is a member of the European Union.","isCorrect"=>false),
                        "1"=>array("item"=>"The UK is no longer a member of the European Union.", "isCorrect"=>true),
                        "2"=>array("item"=>"In 2016, the United Kingdom voted to remain in the EU.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u9p.mp3',
                            "timeRange"=>"02:46-03:07",
                            "text"=>"The UK used to be a member of the European Union. However, as time went on, more and more people thought they should quit the European Union. In 2016, the United Kingdom voted to leave the EU."
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u9p.mp3',
                            "timeRange"=>"02:46-03:07",
                            "text"=>"The UK used to be a member of the European Union. However, as time went on, more and more people thought they should quit the European Union. In 2016, the United Kingdom voted to leave the EU."
                        ),
                    ),
                ),
                1=>array(
                    "num"=>"54",
                    "content_id"=>1470,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9pcq.mp3',
                    "timeRange"=>"01:18-01:22",
                    "text"=>"Did Britain vote to leave the European Union?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Yes.","isCorrect"=>true),
                        "1"=>array("item"=>"No.", "isCorrect"=>false)
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u9p.mp3',
                            "timeRange"=>"02:59-03:07",
                            "text"=>"In 2016, the United Kingdom voted to leave the EU. "
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u9p.mp3',
                            "timeRange"=>"02:59-03:07",
                            "text"=>"In 2016, the United Kingdom voted to leave the EU. "
                        ),
                    ),
                ),
                2=>array(
                    "num"=>"55",
                    "content_id"=>1471,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9pcq.mp3',
                    "timeRange"=>"01:22-01:26",
                    "text"=>"Why do more and more students go to the UK?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"For tourism.","isCorrect"=>false),
                        "1"=>array("item"=>"For higher education.", "isCorrect"=>true),
                        "2"=>array("item"=>"For better jobs.", "isCorrect"=>false)
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u9p.mp3',
                            "timeRange"=>"03:11-03:17",
                            "text"=>"More and more students choose to go to the UK for higher education. "
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u9p.mp3',
                            "timeRange"=>"03:11-03:17",
                            "text"=>"More and more students choose to go to the UK for higher education. "
                        ),
                    ),
                )
            )
        );

         $this->saveEventListToDatabases($data);$a =  json_encode($data);
        $fp = fopen('json238.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
        return;

    }


    public function getPart239(){

        $data = array(
            "unit_id"       =>26,
            "lesson_id"     =>80,
            "part_id"       =>239,
            "media_filename"=>'media/u9p.mp3',
            "media_type"    =>'audio',
            "totalTime"     =>"2:08",
            "part_type"     =>"listening",
            "have_questions"=>false,
            "questions_type"=>"text",
            "keywords"      =>array(
                "surround",
                "Atlantic Ocean",
                "square kilometer",
                "inhabitant",
                "population",
                "industrialized",
                "complicated",
                "involve",
                "slave",
                "transport",
                "abolish",
                "slavery",
                "Industrial Revolution",
                "empire",
                "territory",
                "dominate",
                "economy",
                "influential",
                "spread",
                "immigration",
                "multi-cultural",
                "the European Union",
                "attractive",
                "destination"
            ),
        );
        $data['events'][] = array(
            "num"=>"2",
            'type'=>"text",
            "timeRange"=>"00:00-00:11",
            "text"=>"Hello, this is Channel We. I'm Miss. V. In today's program we are going to talk about the location, history and development of the United Kingdom.",
            "media_filename"=>'media/u8Mr_V.mp4',
            "media_type"    =>'video',
            "picture"=>"images/u9_p_001.png",
            "pictures"=>array()

        );
        $data['events'][] = array(
            "num"=>"3",
            "content_id"=>1472,
            'type'=>"sr_reading",
            "scores"=>1,
            "timeRange"=>"00:00-00:12",
            "displayKewords"=>true,
            "text"=>"England, Scotland, Wales and Northern Ireland are all part of a country in Western Europe, known as the United Kingdom or Britain.",
            "answer"=>"England, Scotland, Wales and Northern Ireland are all part of a country in Western Europe, known as the United Kingdom or Britain.",
            "picture"=>"images/u9_p_001.png"
        );
        $data['events'][] = array(
            "num"=>"4",
            "content_id"=>1473,
            'type'=>"sr_reading",
            "scores"=>1,
            "timeRange"=>"00:12-00:17",
            "text"=>"Many small islands also make up the UK. ",
            "answer"=>"Many small islands also make up the UK.",
            "picture"=>"images/u9_p_001.png"
        );
        $data['events'][] = array(
            "num"=>"5",
            'type'=>"text",
            "timeRange"=>"00:17-00:22",
            "text"=>"The United Kingdom is surrounded by the Atlantic Ocean.",
            "picture"=>"images/u9_p_001.png"
        );
        $data['events'][] = array(
            "num"=>"6",
            'type'=>"text",
            "timeRange"=>"00:22-00:34",
            "text"=>"The whole country has an area of 242,500 square kilometers and has about 65 million inhabitants.",
            "picture"=>"images/u9_p_001.png"
        );
        $data['events'][] = array(
            "num"=>"7",
            "content_id"=>1474,
            'type'=>"sr_reading",
            "scores"=>1,
            "timeRange"=>"00:34-00:40",
            "text"=>"London is the capital and the largest city in the country.",
            "answer"=>"London is the capital and the largest city in the country.",
            "picture"=>"images/u9_p_002.png"
        );

        $data['events'][] = array(
            "num"=>"8",
            'type'=>"text",
            "timeRange"=>"00:40-00:46",
            "text"=>"It is a world famous global city and global financial centre.",
            "picture"=>"images/u9_p_002.png"
        );

        $data['events'][] = array(
            "num"=>"9",
            'type'=>"text",
            "timeRange"=>"00:46-00:51",
            "text"=>"The population of its urban area is around 10 million.",
            "picture"=>"images/u9_p_002.png"
        );

        $data['events'][] = array(
            "num"=>"10",
            "content_id"=>1475,
            'type'=>"sr_reading",
            "scores"=>1,
            "timeRange"=>"00:51-00:58",
            "text"=>"Britain is a developed country and is considered to have a high income economy.",
            "answer"=>"Britain is a developed country and is considered to have a high income economy.",
            "picture"=>"images/u9_p_002.png"
        );

        $data['events'][] = array(
            "num"=>"11",
            'type'=>"text",
            "timeRange"=>"00:58-01:03",
            "text"=>"It was the world's first industrialized country.",
            "picture"=>"images/u9_p_002.png"
        );

        $data['events'][] = array(
            "num"=>"12",
            "content_id"=>1476,
            'type'=>"sr_reading",
            "scores"=>1,
            "timeRange"=>"01:03-01:09",
            "text"=>"The United Kingdom has a long and very complicated history.",
            "answer"=>"The United Kingdom has a long and very complicated history.",
            "picture"=>"images/u9_p_002.png"
        );

        $data['events'][] = array(
            "num"=>"13",
            "content_id"=>1477,
            'type'=>"sr_reading",
            "scores"=>1,
            "timeRange"=>"01:09-01:16",
            "text"=>"Its first inhabitants can be traced back to over 3000 years ago.",
            "answer"=>"Its first inhabitants can be traced back to over 3000 years ago.",
            "picture"=>"images/u9_p_002.png"
        );

        $data['events'][] = array(
            "num"=>"14",
            'type'=>"text",
            "timeRange"=>"01:16-01:28",
            "text"=>"In the past several hundred years, the country has experienced many ups and downs politically, economically, culturally and in many other areas. ",
            "picture"=>"images/u9_p_002.png"
        );

        $data['events'][] = array(
            "num"=>"15",
            "content_id"=>1478,
            'type'=>"sr_reading",
            "scores"=>1,
            "timeRange"=>"01:28-01:35",
            "text"=>"During the 18th century, Britain was involved in the Atlantic slave trade.",
            "answer"=>"During the 18th century, Britain was involved in the Atlantic slave trade.",
            "picture"=>"images/u9_p_003.png"
        );

        $data['events'][] = array(
            "num"=>"16",
            'type'=>"text",
            "timeRange"=>"01:35-01:42",
            "text"=>"Its ships transported a lot of slaves from Africa to the West Indies.",
            "picture"=>"images/u9_p_003.png"
        );

        $data['events'][] = array(
            "num"=>"17",
            'type'=>"text",
            "timeRange"=>"01:42-01:50",
            "text"=>"Later, the country took a leading role in the movement of abolishing slavery worldwide.",
            "picture"=>"images/u9_p_003.png"
        );

        $data['events'][] = array(
            "num"=>"18",
            "content_id"=>1479,
            "type"=>"sr_reading",
            "scores"=>1,
            "timeRange"=>"01:50-01:57",
            "text"=>"In the early 19th century, the country led the famous Industrial Revolution. ",
            "answer"=>"In the early 19th century, the country led the famous Industrial Revolution. ",
            "picture"=>"images/u9_p_004.png"
        );

        $data['events'][] = array(
            "num"=>"19",
            'type'=>"text",
            "timeRange"=>"01:57-02:01",
            "text"=>"Later, it developed into an empire.",
            "picture"=>"images/u9_p_004.png"
        );

        $data['events'][] = array(
            "num"=>"20",
            'type'=>"text",
            "timeRange"=>"02:01-02:07",
            "text"=>"It expanded very fast to many territories throughout the world. ",
            "picture"=>"images/u9_p_004.png"
        );

        $data['events'][] = array(
            "num"=>"21",
            "content_id"=>1480,
            "type"=>"sr_reading",
            "scores"=>1,
            "timeRange"=>"02:07-02:15",
            "text"=>"It dominated a large part of world trade and effectively controlled the economies of many regions.",
            "answer"=>"It dominated a large part of world trade and effectively controlled the economies of many regions.",
            "picture"=>"images/u9_p_004.png"
        );

        $data['events'][] = array(
            "num"=>"22",
            'type'=>"text",
            "timeRange"=>"02:15-02:22",
            "text"=>"Because of this fast development, the English language has become very influential.",
            "picture"=>"images/u9_p_005.png"
        );

        $data['events'][] = array(
            "num"=>"23",
            'type'=>"text",
            "timeRange"=>"02:22-02:29",
            "text"=>"Over the years its literature and culture have greatly spread throughout the world. ",
            "picture"=>"images/u9_p_005.png"
        );


        $data['events'][] = array(
            "num"=>"24",
            "content_id"=>1481,
            "type"=>"sr_reading",
            "scores"=>1,
            "timeRange"=>"02:29-02:39",
            "text"=>"In the 1950s, the country experienced a shortage of workers, so the government encouraged immigration from other countries.",
            "answer"=>"In the 1950s, the country experienced a shortage of workers, so the government encouraged immigration from other countries.",
            "picture"=>"images/u9_p_006.png"
        );

        $data['events'][] = array(
            "num"=>"25",
            'type'=>"text",
            "timeRange"=>"02:39-02:46",
            "text"=>"As a result, today the UK is a more multi-cultural society.",
            "picture"=>"images/u9_p_006.png"
        );

        $data['events'][] = array(
            "num"=>"26",
            'type'=>"text",
            "timeRange"=>"02:46-02:51",
            "text"=>"The UK used to be a member of the European Union.",
            "picture"=>"images/u9_p_007.png"
        );
        $data['events'][] = array(
            "num"=>"27",
            "content_id"=>1482,
            "type"=>"sr_reading",
            "scores"=>1,
            "timeRange"=>"02:51-02:59",
            "text"=>"However, as time went on, more and more people thought they should quit the European Union. ",
            "answer"=>"However, as time went on, more and more people thought they should quit the European Union. ",
            "picture"=>"images/u9_p_008.png"
        );
        $data['events'][] = array(
            "num"=>"28",
            'type'=>"text",
            "timeRange"=>"02:59-03:07",
            "text"=>"In 2016, the United Kingdom voted to leave the EU.",
            "picture"=>"images/u9_p_008.png"
        );
        $data['events'][] = array(
            "num"=>"29",
            'type'=>"text",
            "timeRange"=>"03:07-03:11",
            "text"=>"Now the UK has become more attractive.",
            "picture"=>"images/u9_p_009.png"
        );
        $data['events'][] = array(
            "num"=>"30",
            'type'=>"text",
            "timeRange"=>"03:11-03:17",
            "text"=>"More and more students choose to go to the UK for higher education.",
            "picture"=>"images/u9_p_009.png"
        );

        $data['events'][] = array(
            "num"=>"31",
            "content_id"=>1483,
            "type"=>"sr_reading",
            "scores"=>1,
            "timeRange"=>"03:17-03:26",
            "text"=>"With its long history and rich culture, it has become one of the most popular tourism destinations.",
            "answer"=>"With its long history and rich culture, it has become one of the most popular tourism destinations.",
            "picture"=>"images/u9_p_09.png"
        );

         $this->saveEventListToDatabases($data);$a =  json_encode($data);
        $fp = fopen('json239.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
        return;
    }

    public function getPart240(){

        $data = array(
            "unit_id"       =>26,
            "lesson_id"     =>81,
            "part_id"       =>240,
            "media_filename"=>'media/u9d.mp4',
            "media_type"    =>'video',
            "totalTime"     =>"4:05",
            "part_type"     =>"dialog",
            "have_questions"=>false,
            "questions_type"=>"text",
            "keywords"      =>array(
                "basic stuff",
                "scared",
                "bored",
                "fortunately",
                "fantastic",
                "hilarious",
                "perform",
                "serious",
                "straight-faced",
                "interact",
                "encourage",
                "enthusiastic",
                "interaction",
                "experiment",
                "patient",
                "caring",
                "detailed",
                "instruction"
            ),
        );

        $data['events'][] = array(
            "num"=>"1",
            'type'=>"text",
            "timeRange"=>"00:00-00:04",
            "text"=>"Bob and Tom are having dinner in a restaurant. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"2",
            'type'=>"text",
            "timeRange"=>"00:04-00:07",
            "text"=>"They are chatting about their teachers.",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"3",
            'type'=>"text",
            "timeRange"=>"00:07-00:11",
            "text"=>"Tom, how is everything going with you this semester?",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"4",
            'type'=>"text",
            "timeRange"=>"00:11-00:14",
            "text"=>"Pretty good. How about you?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"5",
            'type'=>"text",
            "timeRange"=>"00:14-00:16",
            "text"=>"I'm ok.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"6",
            'type'=>"text",
            "timeRange"=>"00:16-00:19",
            "text"=>"Are you having a hard time?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"7",
            'type'=>"text",
            "timeRange"=>"00:19-00:21",
            "text"=>"You could say so.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"8",
            'type'=>"text",
            "timeRange"=>"00:21-00:25",
            "text"=>"You know that I had physics and chemistry this semester.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"9",
            'type'=>"text",
            "timeRange"=>"00:25-00:29",
            "text"=>"At first I was not interested in these subjects at all. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"10",
            'type'=>"text",
            "timeRange"=>"00:29-00:32",
            "text"=>"But now, physics is getting more interesting.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"11",
            'type'=>"text",
            "timeRange"=>"00:32-00:35",
            "text"=>"You have chemistry 1 now, right?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"12",
            'type'=>"text",
            "timeRange"=>"00:35-00:37",
            "text"=>"Basic stuff.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"13",
            'type'=>"text",
            "timeRange"=>"00:37-00:41",
            "text"=>"I've heard that Mr. James is a good physics teacher.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"14",
            'type'=>"text",
            "timeRange"=>"00:41-00:44",
            "text"=>"Hasn't he given you any help?",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"15",
            'type'=>"text",
            "timeRange"=>"00:44-00:46",
            "text"=>"You're right.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"16",
            'type'=>"text",
            "timeRange"=>"00:46-00:48",
            "text"=>"Mr. James is good.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"17",
            'type'=>"text",
            "timeRange"=>"00:48-00:51",
            "text"=>"In the beginning, I was really scared. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"18",
            'type'=>"text",
            "timeRange"=>"00:51-00:55",
            "text"=>"I was worried that I would be so bored by physics.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"19",
            'type'=>"text",
            "timeRange"=>"00:55-00:59",
            "text"=>"Fortunately, Mr. James is a fantastic teacher. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"20",
            'type'=>"text",
            "timeRange"=>"00:59-01:03",
            "text"=>"I never expected that physics could be so interesting. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"21",
            'type'=>"text",
            "timeRange"=>"01:03-01:05",
            "text"=>"What happened?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"22",
            'type'=>"text",
            "timeRange"=>"01:05-01:08",
            "text"=>"Mr. James is hilarious.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"23",
            'type'=>"text",
            "timeRange"=>"01:08-01:11",
            "text"=>"He is completely different from other teachers.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"24",
            'type'=>"text",
            "timeRange"=>"01:11-01:15",
            "text"=>"He doesn't just stand at the front and talk about the course. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"25",
            'type'=>"text",
            "timeRange"=>"01:15-01:18",
            "text"=>"He performs for every lesson.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"26",
            'type'=>"text",
            "timeRange"=>"01:18-01:22",
            "text"=>"He is more like an actor than a serious, straight-faced teacher.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"27",
            'type'=>"text",
            "timeRange"=>"01:22-01:30",
            "text"=>"He always asks questions, interacts with us, and encourages us, even though we might not answer his questions correctly.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"28",
            'type'=>"text",
            "timeRange"=>"01:30-01:33",
            "text"=>"He's always lively and enthusiastic.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"29",
            'type'=>"text",
            "timeRange"=>"01:33-01:37",
            "text"=>"Unlike in other classes, his voice never makes me want to sleep.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"30",
            'type'=>"text",
            "timeRange"=>"01:37-01:40",
            "text"=>"He's a really good teacher.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"31",
            'type'=>"text",
            "timeRange"=>"01:40-01:43",
            "text"=>"What is your chemistry teacher like then?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"32",
            'type'=>"text",
            "timeRange"=>"01:43-01:47",
            "text"=>"Joe is nice, but he seems to only teach the book. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"33",
            'type'=>"text",
            "timeRange"=>"01:47-01:50",
            "text"=>"He just does one-way talk. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"34",
            'type'=>"text",
            "timeRange"=>"01:50-01:53",
            "text"=>"No questions, no interactions.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"35",
            'type'=>"text",
            "timeRange"=>"01:53-01:55",
            "text"=>"I often get lost.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"36",
            'type'=>"text",
            "timeRange"=>"01:55-01:57",
            "text"=>"Sorry to hear that. ",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"37",
            'type'=>"text",
            "timeRange"=>"01:57-02:00",
            "text"=>"Do you think you'll be able to pass?",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"38",
            'type'=>"text",
            "timeRange"=>"02:00-02:03",
            "text"=>"I think I'll probably just pass the exam.",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"39",
            'type'=>"text",
            "timeRange"=>"02:03-02:07",
            "text"=>"I had my chemistry 2 last semester. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"40",
            'type'=>"text",
            "timeRange"=>"02:07-02:09",
            "text"=>"Nick was much better.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"41",
            'type'=>"text",
            "timeRange"=>"02:09-02:13",
            "text"=>"Most of the time, we had class in the lab.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"42",
            'type'=>"text",
            "timeRange"=>"02:13-02:17",
            "text"=>"We had several group projects with experiments.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"43",
            'type'=>"text",
            "timeRange"=>"02:17-02:21",
            "text"=>"Nick was very patient and caring. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"44",
            'type'=>"text",
            "timeRange"=>"02:21-02:26:720",
            "text"=>"He gave very detailed and clear instructions about how to perform each experiment.",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"45",
            'type'=>"text",
            "timeRange"=>"02:21-02:26:720",
            "text"=>"He never just stood there.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"46",
            'type'=>"text",
            "timeRange"=>"02:29-02:32",
            "text"=>"He always walked around.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"47",
            'type'=>"text",
            "timeRange"=>"02:32-02:38",
            "text"=>"You could ask him any stupid questions and he always answered seriously. ",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"48",
            'type'=>"text",
            "timeRange"=>"02:38-02:40",
            "text"=>"Don't worry.",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"49",
            'type'=>"text",
            "timeRange"=>"02:40-02:42",
            "text"=>"You will have him next year.",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"50",
            'type'=>"text",
            "timeRange"=>"02:42-02:44",
            "text"=>"I hope so.",
            "picture"=>""
        );

         $this->saveEventListToDatabases($data);$a =  json_encode($data);
        $fp = fopen('json240.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
        return;
    }


    public function getPart241(){

        $data = array(
            "unit_id"       =>26,
            "lesson_id"     =>81,
            "part_id"       =>241,
            "media_filename"=>'media/u9d.mp4',
            "media_type"    =>'video',
            "totalTime"     =>"4:05",
            "part_type"     =>"dialog",
            "have_questions"=>false,
            "questions_type"=>"text",
            "keywords"      =>array(
                "basic stuff",
                "scared",
                "bored",
                "fortunately",
                "fantastic",
                "hilarious",
                "perform",
                "serious",
                "straight-faced",
                "interact",
                "encourage",
                "enthusiastic",
                "interaction",
                "experiment",
                "patient",
                "caring",
                "detailed",
                "instruction"
            ),
        );

        $data['events'][] = array(
            "num"=>"1",
            'type'=>"text",
            "timeRange"=>"00:00-00:04",
            "text"=>"Bob and Tom are having dinner in a restaurant. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"2",
            'type'=>"text",
            "timeRange"=>"00:04-00:07",
            "text"=>"They are chatting about their teachers.",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"3",
            'type'=>"text",
            "timeRange"=>"00:07-00:11",
            "text"=>"Tom, how is everything going with you this semester?",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"4",
            'type'=>"text",
            "timeRange"=>"00:11-00:14",
            "text"=>"Pretty good. How about you?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"5",
            'type'=>"text",
            "timeRange"=>"00:14-00:16",
            "text"=>"I'm ok.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"6",
            'type'=>"text",
            "timeRange"=>"00:16-00:19",
            "text"=>"Are you having a hard time?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"7",
            'type'=>"text",
            "timeRange"=>"00:19-00:21",
            "text"=>"You could say so.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"8",
            'type'=>"text",
            "timeRange"=>"00:21-00:25",
            "text"=>"You know that I had physics and chemistry this semester.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"9",
            'type'=>"text",
            "timeRange"=>"00:25-00:29",
            "text"=>"At first I was not interested in these subjects at all. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"10",
            'type'=>"text",
            "timeRange"=>"00:29-00:32",
            "text"=>"But now, physics is getting more interesting.",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"11",
            'type'=>"multipleChoices",
            "timeRange"=>"",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"12",
                    "content_id"=>1484,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9dcq.mp3',
                    "timeRange"=>"00:00-00:04",
                    "text"=>"Is everything going well with Tom this semester?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Yes.","isCorrect"=>true),
                        "1"=>array("item"=>"No.", "isCorrect"=>false)
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u9dcq.mp3',
                            "timeRange"=>"00:04-00:08 ",
                            "text"=>"Everything is going well with Tom this semester.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u9dcq.mp3',
                            "timeRange"=>"00:04-00:08 ",
                            "text"=>"Everything is going well with Tom this semester.",
                        ),
                    ),
                ),
                1=>array(
                    "num"=>"13",
                    "content_id"=>1485,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9dcq.mp3',
                    "timeRange"=>"00:08-00:13",
                    "text"=>"How did Bob feel at the beginning of this semester?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"He had a difficult time at the beginning.","isCorrect"=>true),
                        "1"=>array("item"=>"He had an easy time at the beginning.", "isCorrect"=>false),
                        "2"=>array("item"=>"He was happy at the beginning.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u9dcq.mp3',
                            "timeRange"=>"00:13-00:21",
                            "text"=>"Bob had physics and chemistry this semester. At first he was not interested in these subjects at all. ",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u9dcq.mp3',
                            "timeRange"=>"00:13-00:21",
                            "text"=>"Bob had physics and chemistry this semester. At first he was not interested in these subjects at all. ",
                        ),
                    ),
                ),
                2=>array(
                    "num"=>"14",
                    "content_id"=>1486,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9dcq.mp3',
                    "timeRange"=>"00:21-00:24",
                    "text"=>"What does Bob think about physics now?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"He thinks it's more interesting.","isCorrect"=>true),
                        "1"=>array("item"=>"He thinks it's boring.", "isCorrect"=>false),
                        "2"=>array("item"=>"He thinks it's much easier.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u9d.mp3',
                            "timeRange"=>"00:29-00:32",
                            "text"=>" But now, physics is getting more interesting.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u9d.mp3',
                            "timeRange"=>"00:29-00:32",
                            "text"=>" But now, physics is getting more interesting.",
                        ),
                    ),
                )
            )
        );

        $data['events'][] = array(
            "num"=>"15",
            'type'=>"text",
            "timeRange"=>"00:32-00:35",
            "text"=>"You have chemistry 1 now, right?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"16",
            'type'=>"text",
            "timeRange"=>"00:35-00:37",
            "text"=>"Basic stuff.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"17",
            'type'=>"text",
            "timeRange"=>"00:37-00:41",
            "text"=>"I've heard that Mr. James is a good physics teacher.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"18",
            'type'=>"text",
            "timeRange"=>"00:41-00:44",
            "text"=>"Hasn't he given you any help?",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"19",
            'type'=>"text",
            "timeRange"=>"00:44-00:46",
            "text"=>"You're right.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"20",
            'type'=>"text",
            "timeRange"=>"00:46-00:48",
            "text"=>"Mr. James is good.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"21",
            'type'=>"text",
            "timeRange"=>"00:48-00:51",
            "text"=>"In the beginning, I was really scared. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"22",
            'type'=>"text",
            "timeRange"=>"00:51-00:55",
            "text"=>"I was worried that I would be so bored by physics.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"23",
            'type'=>"text",
            "timeRange"=>"00:55-00:59",
            "text"=>"Fortunately, Mr. James is a fantastic teacher. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"24",
            'type'=>"text",
            "timeRange"=>"00:59-01:03",
            "text"=>"I never expected that physics could be so interesting. ",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"25",
            'type'=>"multipleChoices",
            "timeRange"=>"",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"26",
                    "content_id"=>1487,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9dcq.mp3',
                    "timeRange"=>"00:36-00:40",
                    "text"=>"What did Bob learn from chemistry 1 this semester?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Basic knowledge.","isCorrect"=>true),
                        "1"=>array("item"=>"Advanced materials.", "isCorrect"=>false),
                        "2"=>array("item"=>"Not mentioned.", "isCorrect"=>false)
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u9dcq.mp3',
                            "timeRange"=>"00:40-00:44",
                            "text"=>" Bob learnt basic stuff from chemistry 1 this semester.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u9dcq.mp3',
                            "timeRange"=>"00:40-00:44",
                            "text"=>" Bob learnt basic stuff from chemistry 1 this semester.",
                        ),
                    ),
                ),
                1=>array(
                    "num"=>"27",
                    "content_id"=>1488,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9dcq.mp3',
                    "timeRange"=>"00:44-00:48",
                    "text"=>"What kind of teacher is James?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"He is boring.","isCorrect"=>false),
                        "1"=>array("item"=>"He is strict.", "isCorrect"=>false),
                        "2"=>array("item"=>"He is excellent.", "isCorrect"=>true),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u9d.mp3',
                            "timeRange"=>"00:55-00:59",
                            "text"=>" Fortunately, Mr. James is a fantastic teacher.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u9d.mp3',
                            "timeRange"=>"00:55-00:59",
                            "text"=>" Fortunately, Mr. James is a fantastic teacher.",
                        ),
                    ),
                )
            )
        );


        $data['events'][] = array(
            "num"=>"28",
            'type'=>"text",
            "timeRange"=>"01:03-01:05",
            "text"=>"What happened?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"29",
            'type'=>"text",
            "timeRange"=>"01:05-01:08",
            "text"=>"Mr. James is hilarious.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"30",
            'type'=>"text",
            "timeRange"=>"01:08-01:11",
            "text"=>"He is completely different from other teachers.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"31",
            'type'=>"text",
            "timeRange"=>"01:11-01:15",
            "text"=>"He doesn't just stand at the front and talk about the course. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"32",
            'type'=>"text",
            "timeRange"=>"01:15-01:18",
            "text"=>"He performs for every lesson.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"33",
            'type'=>"text",
            "timeRange"=>"01:18-01:22",
            "text"=>"He is more like an actor than a serious, straight-faced teacher.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"34",
            'type'=>"text",
            "timeRange"=>"01:22-01:30",
            "text"=>"He always asks questions, interacts with us, and encourages us, even though we might not answer his questions correctly.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"35",
            'type'=>"text",
            "timeRange"=>"01:30-01:33",
            "text"=>"He's always lively and enthusiastic.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"36",
            'type'=>"text",
            "timeRange"=>"01:33-01:37",
            "text"=>"Unlike in other classes, his voice never makes me want to sleep.",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"37",
            'type'=>"multipleChoices",
            "timeRange"=>"",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"38",
                    "content_id"=>1489,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9dcq.mp3',
                    "timeRange"=>"01:00-01:06",
                    "text"=>"Does James always encourage students even though they make mistakes?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Yes.","isCorrect"=>true),
                        "1"=>array("item"=>"No.", "isCorrect"=>false)
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u9d.mp3',
                            "timeRange"=>"01:22-01:30",
                            "text"=>"He always asks questions, interacts with us, and encourages us, even though we might not answer his questions correctly.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u9d.mp3',
                            "timeRange"=>"01:22-01:30",
                            "text"=>"He always asks questions, interacts with us, and encourages us, even though we might not answer his questions correctly.",
                        ),
                    ),
                ),
                1=>array(
                    "num"=>"39",
                    "content_id"=>1490,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9dcq.mp3',
                    "timeRange"=>"01:06-01:09",
                    "text"=>"What does James do every lesson?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"He demonstrates every lesson.","isCorrect"=>true),
                        "1"=>array("item"=>"He lectures every lesson.", "isCorrect"=>false),
                        "2"=>array("item"=>"He shows every lesson.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u9d.mp3',
                            "timeRange"=>"01:15-01:18",
                            "text"=>"He performs for every lesson.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u9d.mp3',
                            "timeRange"=>"01:15-01:18",
                            "text"=>"He performs for every lesson.",
                        ),
                    ),
                ),
                2=>array(
                    "num"=>"40",
                    "content_id"=>1491,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9dcq.mp3',
                    "timeRange"=>"01:09-01:13",
                    "text"=>"Why doesn't Bob want to sleep in physics?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Because his teacher makes the classes very vivid and interesting.","isCorrect"=>true),
                        "1"=>array("item"=>"Because his teacher is very serious and strict.", "isCorrect"=>false),
                        "2"=>array("item"=>"Because his teacher always asks them questions.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u9dcq.mp3',
                            "timeRange"=>"01:13-01:23",
                            "text"=>"Because his physics teacher  is always lively and enthusiastic. Unlike in other classes, his voice never makes Bob want to sleep. ",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u9dcq.mp3',
                            "timeRange"=>"01:13-01:23",
                            "text"=>"Because his physics teacher  is always lively and enthusiastic. Unlike in other classes, his voice never makes Bob want to sleep. ",
                        ),
                    ),
                )
            )
        );

        $data['events'][] = array(
            "num"=>"41",
            'type'=>"text",
            "timeRange"=>"01:37-01:40",
            "text"=>"He's a really good teacher.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"42",
            'type'=>"text",
            "timeRange"=>"01:40-01:43",
            "text"=>"What is your chemistry teacher like then?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"43",
            'type'=>"text",
            "timeRange"=>"01:43-01:47",
            "text"=>"Joe is nice, but he seems to only teach the book. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"44",
            'type'=>"text",
            "timeRange"=>"01:47-01:50",
            "text"=>"He just does one-way talk. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"45",
            'type'=>"text",
            "timeRange"=>"01:50-01:53",
            "text"=>"No questions, no interactions.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"46",
            'type'=>"text",
            "timeRange"=>"01:53-01:55",
            "text"=>"I often get lost.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"47",
            'type'=>"text",
            "timeRange"=>"01:55-01:57",
            "text"=>"Sorry to hear that. ",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"48",
            'type'=>"text",
            "timeRange"=>"01:57-02:00",
            "text"=>"Do you think you'll be able to pass?",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"49",
            'type'=>"text",
            "timeRange"=>"02:00-02:03",
            "text"=>"I think I'll probably just pass the exam.",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"50",
            'type'=>"text",
            "timeRange"=>"02:03-02:07",
            "text"=>"I had my chemistry 2 last semester. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"51",
            'type'=>"text",
            "timeRange"=>"02:07-02:09",
            "text"=>"Nick was much better.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"52",
            'type'=>"text",
            "timeRange"=>"02:09-02:13",
            "text"=>"Most of the time, we had class in the lab.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"53",
            'type'=>"text",
            "timeRange"=>"02:13-02:17",
            "text"=>"We had several group projects with experiments.",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"54",
            'type'=>"multipleChoices",
            "timeRange"=>"",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"55",
                    "content_id"=>1492,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9dcq.mp3',
                    "timeRange"=>"01:35-01:38",
                    "text"=>"Who is Bob's chemistry teacher?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"James.","isCorrect"=>false),
                        "1"=>array("item"=>"Joe.", "isCorrect"=>true),
                        "2"=>array("item"=>"Nick.", "isCorrect"=>false)
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u9dcq.mp3',
                            "timeRange"=>"01:38-01:41",
                            "text"=>"Joe is Bob's chemistry teacher.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u9dcq.mp3',
                            "timeRange"=>"01:38-01:41",
                            "text"=>"Joe is Bob's chemistry teacher.",
                        ),
                    ),
                ),
                1=>array(
                    "num"=>"56",
                    "content_id"=>1493,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9dcq.mp3',
                    "timeRange"=>"01:41-01:46",
                    "text"=>"Why does Bob often get lost in his chemistry classes?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Because his teacher interacts little with them.","isCorrect"=>true),
                        "1"=>array("item"=>"Because his teacher is not good.", "isCorrect"=>false),
                        "2"=>array("item"=>"Because his teacher talks in a low voice.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u9dcq.mp3',
                            "timeRange"=>"01:46-01:52",
                            "text"=>"Because his chemistry teacher just does one-way talk. No questions, no interactions.  ",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u9dcq.mp3',
                            "timeRange"=>"01:46-01:52",
                            "text"=>"Because his chemistry teacher just does one-way talk. No questions, no interactions.  ",
                        ),
                    ),
                )
            )
        );


        $data['events'][] = array(
            "num"=>"57",
            'type'=>"text",
            "timeRange"=>"02:17-02:21",
            "text"=>"Nick was very patient and caring. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"58",
            'type'=>"text",
            "timeRange"=>"02:21-02:26:720",
            "text"=>"He gave very detailed and clear instructions about how to perform each experiment.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"59",
            'type'=>"text",
            "timeRange"=>"02:26:720-02:28:920",
            "text"=>"He never just stood there.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"60",
            'type'=>"text",
            "timeRange"=>"02:29-02:32",
            "text"=>"He always walked around.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"61",
            'type'=>"text",
            "timeRange"=>"02:32-02:38",
            "text"=>"You could ask him any stupid questions and he always answered seriously. ",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"62",
            'type'=>"text",
            "timeRange"=>"02:38-02:40",
            "text"=>"Don't worry.",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"63",
            'type'=>"text",
            "timeRange"=>"02:40-02:42",
            "text"=>"You will have him next year.",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"64",
            'type'=>"text",
            "timeRange"=>"02:42-02:44",
            "text"=>"I hope so.",
            "picture"=>""
        );


        $data['events'][] = array(
            "num"=>"65",
            'type'=>"multipleChoices",
            "timeRange"=>"",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"66",
                    "content_id"=>1494,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9dcq.mp3',
                    "timeRange"=>"02:18-02:23",
                    "text"=>"What did Nick do when his students had class in the lab?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"He gave very detailed instructions about how to perform each experiment.","isCorrect"=>true),
                        "1"=>array("item"=>"He was patient and caring.", "isCorrect"=>false),
                        "2"=>array("item"=>"He just stood there and answered questions.", "isCorrect"=>false)
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u9d.mp3',
                            "timeRange"=>"02:17-02:27",
                            "text"=>"Nick was very patient and caring. He gave very detailed and clear instructions about how to perform each experiment.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u9d.mp3',
                            "timeRange"=>"02:17-02:27",
                            "text"=>"Nick was very patient and caring. He gave very detailed and clear instructions about how to perform each experiment.",
                        ),
                    ),
                ),
                1=>array(
                    "num"=>"67",
                    "content_id"=>1495,
                    "type"=>"multipleChoice",
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9dcq.mp3',
                    "timeRange"=>"02:23-02:27",
                    "text"=>"Will Nick teach Bob chemistry next year?",
                    "scores"=>1,
                    "items"=>array(
                        "0"=>array("item"=>"Yes.","isCorrect"=>true),
                        "1"=>array("item"=>"No.", "isCorrect"=>false)
                    ),
                    "selectEvents"=>array(
                        "Yes"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u9dcq.mp3',
                            "timeRange"=>"02:27-02:32",
                            "text"=>"Tom said Bob would have Nick as his chemistry teacher next year.",
                        ),
                        "No"=>array(
                            "media_type"=>"audio",
                            "media_filename"=>'media/u9dcq.mp3',
                            "timeRange"=>"02:27-02:32",
                            "text"=>"Tom said Bob would have Nick as his chemistry teacher next year.",
                        ),
                    ),
                )
            )
        );

         $this->saveEventListToDatabases($data);$a =  json_encode($data);
        $fp = fopen('json241.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
        return;
    }


    public function getPart242()
    {

        $data = array(
            "unit_id"       =>26,
            "lesson_id"     =>81,
            "part_id"       =>242,
            "media_filename"=>'media/u9d.mp4',
            "media_type"    =>'video',
            "totalTime"     =>"4:05",
            "part_type"     =>"dialog",
            "have_questions"=>false,
            "questions_type"=>"text",
            "keywords"      =>array(
                "basic stuff",
                "scared",
                "bored",
                "fortunately",
                "fantastic",
                "hilarious",
                "perform",
                "serious",
                "straight-faced",
                "interact",
                "encourage",
                "enthusiastic",
                "interaction",
                "experiment",
                "patient",
                "caring",
                "detailed",
                "instruction"
            ),
        );

        $data['events'][] = array(
            "num"=>"1",
            'type'=>"text",
            "timeRange"=>"00:00-00:04",
            "text"=>"Bob and Tom are having dinner in a restaurant. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"2",
            'type'=>"sr_reading",
            "content_id"=>1496,
            "scores"=>1,
            "timeRange"=>"00:04-00:07",
            "text"=>"They are chatting about their teachers.",
            "answer"=>"They are chatting about their teachers.",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"3",
            'type'=>"text",
            "timeRange"=>"00:07-00:11",
            "text"=>"Tom, how is everything going with you this semester?",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"4",
            'type'=>"text",
            "timeRange"=>"00:11-00:14",
            "text"=>"Pretty good. How about you?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"5",
            'type'=>"text",
            "timeRange"=>"00:14-00:16",
            "text"=>"I'm ok.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"6",
            'type'=>"text",
            "timeRange"=>"00:16-00:19",
            "text"=>"Are you having a hard time?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"7",
            'type'=>"text",
            "timeRange"=>"00:19-00:21",
            "text"=>"You could say so.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"8",
            'type'=>"text",
            "timeRange"=>"00:21-00:25",
            "text"=>"You know that I had physics and chemistry this semester.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"9",
            'type'=>"sr_reading",
            "content_id"=>1497,
            "scores"=>1,
            "timeRange"=>"00:25-00:29",
            "text"=>"At first I was not interested in these subjects at all. ",
            "answer"=>"At first I was not interested in these subjects at all. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"10",
            'type'=>"text",
            "timeRange"=>"00:29-00:32",
            "text"=>"But now, physics is getting more interesting.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"11",
            'type'=>"text",
            "timeRange"=>"00:32-00:35",
            "text"=>"You have chemistry 1 now, right?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"12",
            'type'=>"text",
            "timeRange"=>"00:35-00:37",
            "text"=>"Basic stuff.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"13",
            'type'=>"sr_reading",
            "content_id"=>1498,
            "scores"=>1,
            "timeRange"=>"00:37-00:41",
            "text"=>"I've heard that Mr. James is a good physics teacher.",
            "answer"=>"I've heard that Mr. James is a good physics teacher.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"14",
            'type'=>"text",
            "timeRange"=>"00:41-00:44",
            "text"=>"Hasn't he given you any help?",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"15",
            'type'=>"text",
            "timeRange"=>"00:44-00:46",
            "text"=>"You're right.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"16",
            'type'=>"text",
            "timeRange"=>"00:46-00:48",
            "text"=>"Mr. James is good.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"17",
            'type'=>"text",
            "timeRange"=>"00:48-00:51",
            "text"=>"In the beginning, I was really scared. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"18",
            'type'=>"sr_reading",
            "content_id"=>1499,
            "scores"=>1,
            "timeRange"=>"00:51-00:55",
            "text"=>"I was worried that I would be so bored by physics.",
            "answer"=>"I was worried that I would be so bored by physics.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"19",
            'type'=>"text",
            "timeRange"=>"00:55-00:59",
            "text"=>"Fortunately, Mr. James is a fantastic teacher. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"20",
            'type'=>"sr_reading",
            "content_id"=>1500,
            "scores"=>1,
            "timeRange"=>"00:59-01:03",
            "text"=>"I never expected that physics could be so interesting. ",
            "answer"=>"I never expected that physics could be so interesting. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"21",
            'type'=>"text",
            "timeRange"=>"01:03-01:05",
            "text"=>"What happened?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"22",
            'type'=>"text",
            "timeRange"=>"01:05-01:08",
            "text"=>"Mr. James is hilarious.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"23",
            'type'=>"sr_reading",
            "content_id"=>1501,
            "scores"=>1,
            "timeRange"=>"01:08-01:11",
            "text"=>"He is completely different from other teachers.",
            "answer"=>"He is completely different from other teachers.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"24",
            'type'=>"text",
            "timeRange"=>"01:11-01:15",
            "text"=>"He doesn't just stand at the front and talk about the course. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"25",
            'type'=>"text",
            "timeRange"=>"01:15-01:18",
            "text"=>"He performs for every lesson.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"26",
            'type'=>"sr_reading",
            "content_id"=>1502,
            "scores"=>1,
            "timeRange"=>"01:18-01:22",
            "text"=>"He is more like an actor than a serious, straight-faced teacher.",
            "answer"=>"He is more like an actor than a serious, straight-faced teacher.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"27",
            'type'=>"sr_reading",
            "content_id"=>1503,
            "scores"=>1,
            "timeRange"=>"01:22-01:30",
            "text"=>"He always asks questions, interacts with us, and encourages us, even though we might not answer his questions correctly.",
            "answer"=>"He always asks questions, interacts with us, and encourages us, even though we might not answer his questions correctly.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"28",
            'type'=>"text",
            "timeRange"=>"01:30-01:33",
            "text"=>"He's always lively and enthusiastic.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"29",
            'type'=>"text",
            "timeRange"=>"01:33-01:37",
            "text"=>"Unlike in other classes, his voice never makes me want to sleep.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"30",
            'type'=>"text",
            "timeRange"=>"01:37-01:40",
            "text"=>"He's a really good teacher.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"31",
            'type'=>"text",
            "timeRange"=>"01:40-01:43",
            "text"=>"What is your chemistry teacher like then?",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"32",
            'type'=>"sr_reading",
            "content_id"=>1503,
            "scores"=>1,
            "timeRange"=>"01:43-01:47",
            "text"=>"Joe is nice, but he seems to only teach the book. ",
            "answer"=>"Joe is nice, but he seems to only teach the book. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"33",
            'type'=>"text",
            "timeRange"=>"01:47-01:50",
            "text"=>"He just does one-way talk. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"34",
            'type'=>"text",
            "timeRange"=>"01:50-01:53",
            "text"=>"No questions, no interactions.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"35",
            'type'=>"text",
            "timeRange"=>"01:53-01:55",
            "text"=>"I often get lost.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"36",
            'type'=>"text",
            "timeRange"=>"01:55-01:57",
            "text"=>"Sorry to hear that. ",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"37",
            'type'=>"text",
            "timeRange"=>"01:57-02:00",
            "text"=>"Do you think you'll be able to pass?",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"38",
            'type'=>"text",
            "timeRange"=>"02:00-02:03",
            "text"=>"I think I'll probably just pass the exam.",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"39",
            'type'=>"text",
            "timeRange"=>"02:03-02:07",
            "text"=>"I had my chemistry 2 last semester. ",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"40",
            'type'=>"text",
            "timeRange"=>"02:07-02:09",
            "text"=>"Nick was much better.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"41",
            'type'=>"text",
            "timeRange"=>"02:09-02:13",
            "text"=>"Most of the time, we had class in the lab.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"42",
            'type'=>"sr_reading",
            "content_id"=>1504,
            "scores"=>1,
            "timeRange"=>"02:13-02:17",
            "text"=>"We had several group projects with experiments.",
            "answer"=>"We had several group projects with experiments.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"43",
            'type'=>"text",
            "timeRange"=>"02:17-02:21",
            "text"=>"Nick was very patient and caring. ",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"44",
            'type'=>"sr_reading",
            "content_id"=>1505,
            "scores"=>1,
            "timeRange"=>"02:21-02:26:720",
            "text"=>"He gave very detailed and clear instructions about how to perform each experiment.",
            "answer"=>"He gave very detailed and clear instructions about how to perform each experiment.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"45",
            'type'=>"text",
            "timeRange"=>"02:26:720-02:28:920",
            "text"=>"He never just stood there.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"46",
            'type'=>"text",
            "timeRange"=>"02:29-02:32",
            "text"=>"He always walked around.",
            "picture"=>""
        );
        $data['events'][] = array(
            "num"=>"47",
            'type'=>"sr_reading",
            "content_id"=>1506,
            "scores"=>1,
            "timeRange"=>"02:32-02:38",
            "text"=>"You could ask him any stupid questions and he always answered seriously. ",
            "answer"=>"You could ask him any stupid questions and he always answered seriously. ",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"48",
            'type'=>"text",
            "timeRange"=>"02:38-02:40",
            "text"=>"Don't worry.",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"49",
            'type'=>"text",
            "timeRange"=>"02:40-02:42",
            "text"=>"You will have him next year.",
            "picture"=>""
        );

        $data['events'][] = array(
            "num"=>"50",
            'type'=>"text",
            "timeRange"=>"02:42-02:44",
            "text"=>"I hope so.",
            "picture"=>""
        );
        $this->saveEventListToDatabases($data);
        $a = json_encode($data);
        $fp = fopen('json242.txt', "w");
        fwrite($fp, $a);
        fclose($fp);
        return;
    }


    public function getPart243(){
        $dataT = array(
            "unit_id"       =>26,
            "lesson_id"     =>82,
            "part_id"       =>243,
            "media_filename"=>'media/u9ps.mp3',
            "media_type"    =>'audio',
            "totalTime"     =>"1:34",
            "part_type"     =>"summary",
            "have_questions"=>true,
            "questions_type"=>"sr",
            "keywords"      =>array(
                "be made up of",
                "surround",
                "population",
                "financial",
                "developed",
                "complicated",
                "origin",
                "trace back",
                "Industrial Revolution",
                "dominate",
                "Due to labor shortage",
                "immigration",
                "multi-cultural"
            ),
        );
        $data['events'][] = array(
            "num"=>"1",
            'type'=>"text",
            "timeRange"=>"00:00-00:04",
            "text"=>"The United Kingdom is a country in Europe. ",
            "picture"=>"images/u9_ps_001.jpg"
        );
        $data['events'][] = array(
            "num"=>"2",
            'type'=>"text",
            "timeRange"=>"00:04-00:07",
            "text"=>"It is made up of four countries. ",
            "picture"=>"images/u9_ps_001.jpg"
        );
        $data['events'][] = array(
            "num"=>"3",
            'type'=>"text",
            "timeRange"=>"00:07-00:10",
            "text"=>"It is surrounded by the Atlantic Ocean. ",
            "picture"=>"images/u9_ps_001.png"
        );

        $data['events'][] = array(
            "num"=>"4",
            'type'=>"text",
            "timeRange"=>"00:10-00:15",
            "text"=>"The UK has an area of more than 200 thousand square kilometers. ",
            "picture"=>"images/u9_ps_001.jpg"
        );
        $data['events'][] = array(
            "num"=>"5",
            'type'=>"text",
            "timeRange"=>"00:15-00:19",
            "text"=>"It has a population of about 65 million.",
            "picture"=>"images/u9_ps_002.jpg"
        );
        $data['events'][] = array(
            "num"=>"6",
            'type'=>"text",
            "timeRange"=>"00:19-00:22",
            "text"=>"London is the capital city. ",
            "picture"=>"images/u9_ps_003.jpg"
        );
        $data['events'][] = array(
            "num"=>"7",
            'type'=>"text",
            "timeRange"=>"00:22-00:26",
            "text"=>"It's also a famous global and financial center. ",
            "picture"=>"images/u9_ps_003.png"
        );
        $data['events'][] = array(
            "num"=>"8",
            'type'=>"text",
            "timeRange"=>"00:26-00:29",
            "text"=>"The UK is a developed country.",
            "picture"=>"images/u9_ps_004.jpg"
        );
        $data['events'][] = array(
            "num"=>"9",
            'type'=>"text",
            "timeRange"=>"00:29-00:33",
            "text"=>"It has a long and complicated history. ",
            "picture"=>"images/u9_ps_004.jpg"
        );
        $data['events'][] = array(
            "num"=>"10",
            'type'=>"text",
            "timeRange"=>"00:33-00:38",
            "text"=>"Its origin can be traced back to over 3000 years ago.",
            "picture"=>"images/u9_ps_004.jpg"
        );
        $data['events'][] = array(
            "num"=>"11",
            'type'=>"text",
            "timeRange"=>"00:38-00:43",
            "text"=>"Over the years, the country has experienced ups and downs.",
            "picture"=>"images/u9_ps_005.jpg"
        );
        $data['events'][] = array(
            "num"=>"12",
            'type'=>"text",
            "timeRange"=>"00:43-00:49",
            "text"=>"In the early 19th century, the country led the famous Industrial Revolution.",
            "picture"=>"images/u9_ps_005.jpg"
        );
        $data['events'][] = array(
            "num"=>"13",
            'type'=>"text",
            "timeRange"=>"00:49-00:53",
            "text"=>"Later, it developed into an empire.",
            "picture"=>"images/u9_ps_005.jpg"
        );
        $data['events'][] = array(
            "num"=>"14",
            'type'=>"text",
            "timeRange"=>"00:53-00:57",
            "text"=>"It dominated a large part of world trade. ",
            "picture"=>"images/u9_ps_005.jpg"
        );

        $data['events'][] = array(
            "num"=>"15",
            'type'=>"text",
            "timeRange"=>"00:57-01:03",
            "text"=>"Due to labor shortage in the 1950s, immigration was encouraged.",
            "picture"=>"images/u9_ps_005.jpg"
        );

        $data['events'][] = array(
            "num"=>"16",
            'type'=>"text",
            "timeRange"=>"01:03-01:07",
            "text"=>"So the UK today is a multi-cultural society.",
            "picture"=>"images/u9_ps_005.jpg"
        );
        $data['events'][] = array(
            "num"=>"17",
            'type'=>"text",
            "timeRange"=>"01:07-01:11",
            "text"=>"English language is very popular now.",
            "picture"=>"images/u9_ps_006.jpg"
        );

        $data['events'][] = array(
            "num"=>"18",
            'type'=>"text",
            "timeRange"=>"01:11-01:15",
            "text"=>"Universities in the UK are open to the world. ",
            "picture"=>"images/u9_ps_006.jpg"
        );

        $data['events'][] = array(
            "num"=>"19",
            'type'=>"text",
            "timeRange"=>"01:15-01:20",
            "text"=>"On the campuses, you can see many international students.",
            "picture"=>"images/u9_ps_006.jpg"
        );


        $data['events'][] = array(
            "num"=>"20",
            'type'=>"text",
            "timeRange"=>"01:20-01:25",
            "text"=>"The UK has also become a good place for tourism.",
            "picture"=>"images/u9_ps_006.jpg"
        );



        $data['events'][] = array(
            "num"=>"1",
            "content_id"=>1507,
            'type'=>"sr_readings",
            "timeRange"=>array("00:00-00:06","00:04-00:11","00:09-00:15"),
            "scores"=>1,
            "text"=>array("The United Kingdom is a country in Europe. ","It is made up of four countries.","It is surrounded by the Atlantic Ocean."),
            "answer"=>array("The United Kingdom is a country in Europe. ","It is made up of four countries.","It is surrounded by the Atlantic Ocean."),
            "pictures"=> array("images/u9_ps_006.jpg","images/u9_ps_006.jpg","images/u9_ps_006.jpg"),
            "picture"=>"images/u9_ps_006.jpg"
        );
        $data['events'][] = array(
            "num"=>"2",
            "content_id"=>1508,
            'type'=>"sr_readings",
            "timeRange"=>array("00:13-00:24","00:21-00:25","00:25-00:32"),
            "scores"=>1,
            "text"=>array("The UK has an area of more than 200 thousand square kilometers. ","It has a population of about 65 million.","London is the capital city."),
            "answer"=>array("The UK has an area of more than 200 thousand square kilometers. ","It has a population of about 65 million.","London is the capital city."),
            "pictures"=> array("images/u9_ps_006.jpg","images/u9_ps_006.jpg","images/u9_ps_006.jpg"),
            "picture"=>"images/u9_ps_006.jpg"
        );

        $data['events'][] = array(
            "num"=>"3",
            "content_id"=>1509,
            'type'=>"sr_readings",
            "timeRange"=>array("00:32-00:38","00:38-00:45","00:45-00:49"),
            "scores"=>1,
            "text"=>array("It's also a famous global and financial center. ","The UK is a developed country.","It has a long and complicated history."),
            "answer"=>array("It's also a famous global and financial center. ","The UK is a developed country.","It has a long and complicated history."),
            "picture"=>"images/u9_ps_006.jpg",
            "pictures"=>array("images/u9_ps_006.jpg","images/u9_ps_006.jpg","images/u9_ps_006.jpg")
        );

        $data['events'][] = array(
            "num"=>"4",
            "content_id"=>1510,
            'type'=>"sr_readings",
            "timeRange"=>array("00:49-00:54","00:54-00:58","00:58-01:02"),
            "scores"=>1,
            "picture"=>"images/u9_ps_006.jpg",
            "text"=>array("Its origin can be traced back to over 3000 years ago.","Over the years, the country has experienced ups and downs.","In the early 19th century, the country led the famous Industrial Revolution."),
            "answer"=>array("SIts origin can be traced back to over 3000 years ago.","Over the years, the country has experienced ups and downs.","In the early 19th century, the country led the famous Industrial Revolution."),
            "pictures"=>array("images/u9_ps_006.jpg","images/u9_ps_006.jpg","images/u9_ps_006.jpg","images/u9_ps_006.jpg")

        );
        $data['events'][] = array(
            "num"=>"5",
            "content_id"=>1511,
            'type'=>"sr_readings",
            "timeRange"=>array("00:49-00:54","00:54-00:58","00:58-01:02"),
            "scores"=>1,
            "picture"=>"images/u9_ps_006.jpg",
            "text"=>array("Later, it developed into an empire.","It dominated a large part of world trade.","Due to labor shortage in the 1950s, immigration was encouraged."),
            "answer"=>array("Later, it developed into an empire.","It dominated a large part of world trade.","Due to labor shortage in the 1950s, immigration was encouraged."),
            "pictures"=>array("images/u9_ps_006.jpg","images/u9_ps_006.jpg","images/u9_ps_006.jpg")

        );

        $data['events'][] = array(
            "num"=>"6",
            "content_id"=>1512,
            'type'=>"sr_readings",
            "timeRange"=>array("00:49-00:54","00:54-00:58","00:58-01:02"),
            "scores"=>1,
            "picture"=>"images/u9_ps_006.jpg",
            "text"=>array("So the UK today is a multi-cultural society.","English language is very popular now.","Universities in the UK are open to the world. "),
            "answer"=>array("SSo the UK today is a multi-cultural society.","English language is very popular now.","Universities in the UK are open to the world."),
            "pictures"=>array("images/u9_ps_006.jpg","images/u9_ps_006.jpg","images/u9_ps_006.jpg")

        );

        $data['events'][] = array(
            "num"=>"7",
            "content_id"=>1513,
            'type'=>"sr_readings",
            "timeRange"=>array("00:49-00:54","00:54-00:58"),
            "scores"=>1,
            "picture"=>"images/u9_ps_006.png",
            "text"=>array("On the campuses, you can see many international students.","The UK has also become a good place for tourism."),
            "answer"=>array("On the campuses, you can see many international students.","The UK has also become a good place for tourism."),
            "pictures"=>array("images/u9_ps_006.jpg","images/u9_ps_006.jpg")

        );

        $database = array_merge($dataT,$data);
        //$database = array_merge($database,$data1);

        //exit;
        $this->saveEventListToDatabases($database);
       // $dataT['eventLists'] = array($data,$data1);
        $a =  json_encode($dataT);
        $fp = fopen('json243.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
        return;
    }


    public function getPart244(){
        $data = array(
            "unit_id"       =>26,
            "lesson_id"     =>82,
            "part_id"       =>244,
            "media_filename"=>'media/u9p.mp3',
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
            "content_id"=>1514,
            'type'=>"sr_reading",
            "timeRange"=>"00:00-00:12",
            "scores"=>1,
            "text"=>"England, Scotland, Wales and Northern Ireland are all part of a country in Western Europe, known as the United Kingdom or Britain .",
            "answer"=>"England, Scotland, Wales and Northern Ireland are all part of a country in Western Europe, known as the United Kingdom or Britain .",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9p.mp3',
                    "timeRange"=>"00:00-00:12",
                    "text"=>"England, Scotland, Wales and Northern Ireland are all part of a country in Western Europe, known as the United Kingdom or Britain .",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9p.mp3',
                    "timeRange"=>"00:00-00:12",
                    "text"=>"England, Scotland, Wales and Northern Ireland are all part of a country in Western Europe, known as the United Kingdom or Britain .",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"2",
            "content_id"=>1515,
            'type'=>"sr_reading",
            "timeRange"=>"00:22-00:34",
            "scores"=>1,
            "text"=>"The whole country has an area of 242,500 square kilometers and has about 65 million inhabitants.",
            "answer"=>"The whole country has an area of 242,500 square kilometers and has about 65 million inhabitants.",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9p.mp3',
                    "timeRange"=>"00:22-00:34",
                    "text"=>"The whole country has an area of 242,500 square kilometers and has about 65 million inhabitants.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9p.mp3',
                    "timeRange"=>"00:22-00:34",
                    "text"=>"The whole country has an area of 242,500 square kilometers and has about 65 million inhabitants.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"3",
            "content_id"=>1516,
            'type'=>"sr_reading",
            "timeRange"=>"00:51-00:58",
            "scores"=>1,
            "text"=>"Britain is a developed country and is considered to have a high income economy.",
            "answer"=>"Britain is a developed country and is considered to have a high income economy.",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9p.mp3',
                    "timeRange"=>"00:51-00:58",
                    "text"=>"Britain is a developed country and is considered to have a high-income economy.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9p.mp3',
                    "timeRange"=>"00:51-00:58",
                    "text"=>"Britain is a developed country and is considered to have a high-income economy.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"4",
            "content_id"=>1517,
            'type'=>"sr_reading",
            "timeRange"=>"01:03-01:09",
            "scores"=>1,
            "text"=>"The United Kingdom has a long and very complicated history.",
            "answer"=>"The United Kingdom has a long and very complicated history.",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9p.mp3',
                    "timeRange"=>"01:03-01:09",
                    "text"=>"The United Kingdom has a long and very complicated history.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9p.mp3',
                    "timeRange"=>"01:03-01:09",
                    "text"=>"The United Kingdom has a long and very complicated history.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"5",
            "content_id"=>1518,
            'type'=>"sr_reading",
            "timeRange"=>"00:47-00:53",
            "scores"=>1,
            "text"=>"In the past several hundred years, the country has experienced many ups and downs politically, economically, culturally and in many other areas. ",
            "answer"=>"In the past several hundred years, the country has experienced many ups and downs politically, economically, culturally and in many other areas.",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9p.mp3',
                    "timeRange"=>"01:16-01:28",
                    "text"=>"In the past several hundred years, the country has experienced many ups and downs politically, economically, culturally and in many other areas. ",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9p.mp3',
                    "timeRange"=>"01:16-01:28",
                    "text"=>"In the past several hundred years, the country has experienced many ups and downs politically, economically, culturally and in many other areas. ",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"6",
            "content_id"=>1519,
            'type'=>"sr_reading",
            "timeRange"=>"01:28-01:35",
            "scores"=>1,
            "text"=>"During the 18th century, Britain was involved in the Atlantic slave trade.",
            "answer"=>"During the 18th century, Britain was involved in the Atlantic slave trade.",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9p.mp3',
                    "timeRange"=>"01:28-01:35",
                    "text"=>"During the 18th century, Britain was involved in the Atlantic slave trade.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9p.mp3',
                    "timeRange"=>"01:28-01:35",
                    "text"=>"During the 18th century, Britain was involved in the Atlantic slave trade.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"7",
            "content_id"=>1520,
            'type'=>"sr_reading",
            "timeRange"=>"01:42-01:50",
            "scores"=>1,
            "text"=>"Later, the country took a leading role in the movement of abolishing slavery worldwide. ",
            "answer"=>"Later, the country took a leading role in the movement of abolishing slavery worldwide. ",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9p.mp3',
                    "timeRange"=>"01:42-01:50",
                    "text"=>"Later, the country took a leading role in the movement of abolishing slavery worldwide. ",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9p.mp3',
                    "timeRange"=>"01:42-01:50",
                    "text"=>"Later, the country took a leading role in the movement of abolishing slavery worldwide. ",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"8",
            "content_id"=>1521,
            'type'=>"sr_reading",
            "timeRange"=>"01:50-01:57",
            "scores"=>1,
            "text"=>"In the early 19th century, the country led the famous Industrial Revolution. ",
            "answer"=>"In the early 19th century, the country led the famous Industrial Revolution. ",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9p.mp3',
                    "timeRange"=>"01:50-01:57",
                    "text"=>"In the early 19th century, the country led the famous Industrial Revolution. ",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9p.mp3',
                    "timeRange"=>"01:50-01:57",
                    "text"=>"In the early 19th century, the country led the famous Industrial Revolution. ",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"9",
            "content_id"=>1522,
            'type'=>"sr_reading",
            "timeRange"=>"02:07-02:15",
            "scores"=>1,
            "text"=>"It dominated a large part of world trade and effectively controlled the economies of many regions.",
            "answer"=>"It dominated a large part of world trade and effectively controlled the economies of many regions.",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9p.mp3',
                    "timeRange"=>"02:07-02:15",
                    "text"=>"It dominated a large part of world trade and effectively controlled the economies of many regions.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9p.mp3',
                    "timeRange"=>"02:07-02:15",
                    "text"=>"It dominated a large part of world trade and effectively controlled the economies of many regions.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"10",
            "content_id"=>1523,
            'type'=>"sr_reading",
            "timeRange"=>"02:08-02:15",
            "scores"=>1,
            "text"=>"Because of this fast development, the English language has become very influential.",
            "answer"=>"Because of this fast development, the English language has become very influential.",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9p.mp3',
                    "timeRange"=>"02:15-02:22",
                    "text"=>"Because of this fast development, the English language has become very influential.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9p.mp3',
                    "timeRange"=>"02:15-02:22",
                    "text"=>"Because of this fast development, the English language has become very influential.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );


        $data['events'][] = array(
            "num"=>"11",
            "content_id"=>1524,
            'type'=>"sr_reading",
            "timeRange"=>"02:22-02:29",
            "scores"=>1,
            "text"=>"Over the years its literature and culture have greatly spread throughout the world. ",
            "answer"=>"Over the years its literature and culture have greatly spread throughout the world. ",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9p.mp3',
                    "timeRange"=>"02:22-02:29",
                    "text"=>"Over the years its literature and culture have greatly spread throughout the world. ",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9p.mp3',
                    "timeRange"=>"02:22-02:29",
                    "text"=>"Over the years its literature and culture have greatly spread throughout the world. ",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"12",
            "content_id"=>1525,
            'type'=>"sr_reading",
            "timeRange"=>"02:29-02:39",
            "scores"=>1,
            "text"=>"In the 1950s, the country experienced a shortage of workers, so the government encouraged immigration from other countries. ",
            "answer"=>"In the 1950s, the country experienced a shortage of workers, so the government encouraged immigration from other countries. ",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9p.mp3',
                    "timeRange"=>"02:29-02:39",
                    "text"=>"In the 1950s, the country experienced a shortage of workers, so the government encouraged immigration from other countries. ",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9p.mp3',
                    "timeRange"=>"02:29-02:39",
                    "text"=>"In the 1950s, the country experienced a shortage of workers, so the government encouraged immigration from other countries. ",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"13",
            "content_id"=>1526,
            'type'=>"sr_reading",
            "timeRange"=>"02:51-02:59",
            "scores"=>1,
            "text"=>"However, as time went on, more and more people thought they should quit the European Union.",
            "answer"=>"However, as time went on, more and more people thought they should quit the European Union.",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9p.mp3',
                    "timeRange"=>"02:51-02:59",
                    "text"=>"However, as time went on, more and more people thought they should quit the European Union.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9p.mp3',
                    "timeRange"=>"02:51-02:59",
                    "text"=>"However, as time went on, more and more people thought they should quit the European Union.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"14",
            "content_id"=>1527,
            'type'=>"sr_reading",
            "timeRange"=>"03:17-03:26",
            "scores"=>1,
            "text"=>"With its long history and rich culture, it has become one of the most popular tourism destinations.",
            "answer"=>"With its long history and rich culture, it has become one of the most popular tourism destinations.",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9p.mp3',
                    "timeRange"=>"03:17-03:26",
                    "text"=>"With its long history and rich culture, it has become one of the most popular tourism destinations.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9p.mp3',
                    "timeRange"=>"03:17-03:26",
                    "text"=>"With its long history and rich culture, it has become one of the most popular tourism destinations.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"15",
            "content_id"=>1528,
            'type'=>"sr_reading",
            "timeRange"=>"01:11-01:15",
            "scores"=>1,
            "text"=>"He doesn't just stand at the front and talk about the course. ",
            "answer"=>"He doesn't just stand at the front and talk about the course. ",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9d.mp3',
                    "timeRange"=>"01:11-01:15",
                    "text"=>"He doesn't just stand at the front and talk about the course.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9d.mp3',
                    "timeRange"=>"01:11-01:15",
                    "text"=>"He doesn't just stand at the front and talk about the course.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"16",
            "content_id"=>1529,
            'type'=>"sr_reading",
            "timeRange"=>"01:18-01:22",
            "scores"=>1,
            "text"=>"He is more like an actor than a serious, straight-faced teacher. ",
            "answer"=>"He is more like an actor than a serious, straight-faced teacher. ",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9d.mp3',
                    "timeRange"=>"01:18-01:22",
                    "text"=>"He is more like an actor than a serious, straight-faced teacher. ",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9d.mp3',
                    "timeRange"=>"01:18-01:22",
                    "text"=>"He is more like an actor than a serious, straight-faced teacher. ",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"17",
            "content_id"=>1530,
            'type'=>"sr_reading",
            "timeRange"=>"01:22-01:30",
            "scores"=>1,
            "text"=>"He always asks questions, interacts with us, and encourages us, even though we might not answer his questions correctly. ",
            "answer"=>"He always asks questions, interacts with us, and encourages us, even though we might not answer his questions correctly. ",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9d.mp3',
                    "timeRange"=>"01:22-01:30",
                    "text"=>"He always asks questions, interacts with us, and encourages us, even though we might not answer his questions correctly. ",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9d.mp3',
                    "timeRange"=>"01:22-01:30",
                    "text"=>"He always asks questions, interacts with us, and encourages us, even though we might not answer his questions correctly. ",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"18",
            "content_id"=>1531,
            'type'=>"sr_reading",
            "timeRange"=>"01:33-01:37",
            "scores"=>1,
            "text"=>"Unlike in other classes, his voice never makes me want to sleep. ",
            "answer"=>"Unlike in other classes, his voice never makes me want to sleep. ",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9d.mp3',
                    "timeRange"=>"01:33-01:37",
                    "text"=>"Unlike in other classes, his voice never makes me want to sleep. ",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9d.mp3',
                    "timeRange"=>"01:33-01:37",
                    "text"=>"Unlike in other classes, his voice never makes me want to sleep. ",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"19",
            "content_id"=>1531,
            'type'=>"sr_reading",
            "timeRange"=>"02:21-02:27",
            "scores"=>1,
            "text"=>"He gave very detailed and clear instructions about how to perform each experiment. ",
            "answer"=>"YHe gave very detailed and clear instructions about how to perform each experiment. ",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9d.mp3',
                    "timeRange"=>"02:21-02:27",
                    "text"=>"He gave very detailed and clear instructions about how to perform each experiment. ",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9d.mp3',
                    "timeRange"=>"02:21-02:27",
                    "text"=>"He gave very detailed and clear instructions about how to perform each experiment. ",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"20",
            "content_id"=>1531,
            'type'=>"sr_reading",
            "timeRange"=>"02:32-02:38",
            "scores"=>1,
            "text"=>"You could ask him any stupid questions and he always answered seriously. ",
            "answer"=>"You could ask him any stupid questions and he always answered seriously. ",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9d.mp3',
                    "timeRange"=>"02:32-02:38",
                    "text"=>"You could ask him any stupid questions and he always answered seriously. ",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9d.mp3',
                    "timeRange"=>"02:32-02:38",
                    "text"=>"You could ask him any stupid questions and he always answered seriously. ",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
         $this->saveEventListToDatabases($data);$a =  json_encode($data);
        $fp = fopen('json244.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
        return;
    }


    public function getPart245(){
        $data = array(
            "unit_id"       =>26,
            "lesson_id"     =>82,
            "part_id"       =>245,
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
            "content_id"=>1532,
            "media_filename"=>'media/u9p.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_conjunction_clause",
            "timeRange"     =>"00:17-00:22",
            "scores"=>1,
            "text"=>"The United Kingdom, is surrounded, by the Atlantic Ocean.",
            "answer" =>"The United Kingdom, is surrounded, by the Atlantic Ocean.",
            "items"=>array("The United Kingdom","is surrounded","by the Atlantic Ocean."),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9p.mp3',
                    "timeRange"     =>"00:17-00:22",
                    "text"=>"The United Kingdom, is surrounded, by the Atlantic Ocean.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9p.mp3',
                    "timeRange"     =>"00:17-00:22",
                    "text"=>"The United Kingdom, is surrounded, by the Atlantic Ocean.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"2",
            "content_id"=>1533,
            "media_filename"=>'media/u9p.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_conjunction_clause",
            "timeRange"     =>"00:40-00:46",
            "scores"=>1,
            "answer"=>"It is a world famous global city and global financial centre. ",
            "text" => "It is a world famous global city and global financial centre. ",
            "items"=>array("It is","a world famous","global city","and global financial centre."),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9p.mp3',
                    "timeRange"     =>"00:40-00:46",
                    "text" => "It is a world famous global city and global financial centre.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9p.mp3',
                    "timeRange"     =>"00:40-00:46",
                    "text" => "It is a world famous global city and global financial centre.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"3",
            "content_id"=>1534,
            "media_filename"=>'media/u9p.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_conjunction_clause",
            "timeRange"     =>"01:09-01:16",
            "scores"=>1,
            "answer"=>"Its first inhabitants can be traced back to over 3000 years ago.",
            "text" => "Its first inhabitants can be traced back to over 3000 years ago.",
            "items"=>array("Its first inhabitants","can be traced back to","over 3000 years ago."),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9p.mp3',
                    "timeRange"     =>"01:09-01:16",
                    "text" => "Its first inhabitants can be traced back to over 3000 years ago.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9p.mp3',
                    "timeRange"     =>"01:09-01:16",
                    "text" => "Its first inhabitants can be traced back to over 3000 years ago.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"4",
            "content_id"=>1535,
            "media_filename"=>'media/u9p.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_conjunction_clause",
            "timeRange"     =>"01:35-01:42",
            "scores"=>1,
            "answer"=>"Its ships transported a lot of slaves from Africa to the West Indies.",
            "text" => "Its ships transported a lot of slaves from Africa to the West Indies.",
            "items"=>array("Its ships transported","a lot of slaves","in the library","from Africa","to the West Indies."),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9p.mp3',
                    "timeRange"     =>"01:35-01:42",
                    "text" => "Its ships transported a lot of slaves from Africa to the West Indies.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9p.mp3',
                    "timeRange"     =>"01:35-01:42",
                    "text" => "Its ships transported a lot of slaves from Africa to the West Indies.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"5",
            "content_id"=>1536,
            "media_filename"=>'media/u9p.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_conjunction_clause",
            "timeRange"     =>"02:39-02:46",
            "scores"=>1,
            "answer"=>"As a result, today the UK is a more multi-cultural society.",
            "text" => "As a result, today the UK is a more multi-cultural society.",
            "items"=>array("As a result, today","the UK is","a more multi-cultural society."),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9p.mp3',
                    "timeRange"     =>"02:39-02:46",
                    "text" => "As a result, today the UK is a more multi-cultural society.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9p.mp3',
                    "timeRange"     =>"02:39-02:46",
                    "text" => "As a result, today the UK is a more multi-cultural society.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"6",
            "content_id"=>1537,
            "media_filename"=>'media/u9p.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_conjunction_clause",
            "timeRange"     =>"02:46-02:51",
            "scores"=>1,
            "answer"=>"The UK used to be a member of the European Union. ",
            "text" => "The UK used to be a member of the European Union. ",
            "items"=>array("The UK","used to be"," a member of","the European Union."),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9p.mp3',
                    "timeRange"     =>"02:46-02:51",
                    "text" => "The UK used to be a member of the European Union. ",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9p.mp3',
                    "timeRange"     =>"02:46-02:51",
                    "text" => "The UK used to be a member of the European Union. ",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"7",
            "content_id"=>1538,
            "media_filename"=>'media/u9d.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_conjunction_clause",
            "timeRange"     =>"00:07-00:11",
            "scores"=>1,
            "answer"=>"Tom, how is everything going with you this semester?",
            "text"=>"Tom, how is everything going with you this semester?",
            "items"=>array("Tom,","how is everything going","with you","this semester?"),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9d.mp3',
                    "timeRange"     =>"00:07-00:11",
                    "text"=>"Tom, how is everything going with you this semester?",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9d.mp3',
                    "timeRange"     =>"00:07-00:11",
                    "text"=>"Tom, how is everything going with you this semester?",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );


        $data['events'][] = array(
            "num"=>"8",
            "content_id"=>1539,
            "media_filename"=>'media/u9d.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_conjunction_clause",
            "timeRange"     =>"00:25-00:29",
            "scores"=>1,
            "answer"=>"At first I was not interested in these subjects at all. ",
            "text" => "TAt first I was not interested in these subjects at all. ",
            "items"=>array("At first ","I was not interested in","these subjects","at all."),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9d.mp3',
                    "timeRange"     =>"00:25-00:29",
                    "text" => "At first I was not interested in these subjects at all. ",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9d.mp3',
                    "timeRange"     =>"00:25-00:29",
                    "text" => "At first I was not interested in these subjects at all. ",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"9",
            "content_id"=>1540,
            "media_filename"=>'media/u9d.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_conjunction_clause",
            "timeRange"     =>"00:51-00:55",
            "scores"=>1,
            "answer"=>"I was worried that I would be so bored by physics. ",
            "text" => "I was worried that I would be so bored by physics. ",
            "items"=>array("I was worried that","I would be","so bored by physics."),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9d.mp3',
                    "timeRange"     =>"00:51-00:55",
                    "text" => "I was worried that I would be so bored by physics. ",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9d.mp3',
                    "timeRange"     =>"00:51-00:55",
                    "text" => "I was worried that I would be so bored by physics. ",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"10",
            "content_id"=>1541,
            "media_filename"=>'media/u9d.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_conjunction_clause",
            "timeRange"     =>"00:59-01:03",
            "scores"=>1,
            "answer"=>"I never expected that physics could be so interesting.",
            "text" => "I never expected that physics could be so interesting.",
            "items"=>array("I never","expected that","physics","could be so interesting."),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9d.mp3',
                    "timeRange"     =>"00:59-01:03",
                    "text" => "I never expected that physics could be so interesting.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9d.mp3',
                    "timeRange"     =>"00:59-01:03",
                    "text" => "I never expected that physics could be so interesting.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

         $this->saveEventListToDatabases($data);$a =  json_encode($data);
        $fp = fopen('json245.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
        return;
    }

    public function getPart246(){
        $data = array(
            "unit_id"       =>26,
            "lesson_id"     =>82,
            "part_id"       =>246,
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
            "content_id"=>1542,
            "media_filename"=>'media/u9p.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"00:12-00:17",
            "scores"=>1,
            "text" => "Many small islands also make up the UK. ",
            "answer" => "Many small islands also make up the UK. ",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9p.mp3',
                    "timeRange"     =>"00:12-00:17",
                    "text" => "Many small islands also make up the UK. ",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9p.mp3',
                    "timeRange"     =>"00:12-00:17",
                    "text" => "Many small islands also make up the UK. ",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"2",
            "content_id"=>1543,
            "media_filename"=>'media/u9p.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"00:34-00:40",
            "scores"=>1,
            "text" => "London is the capital and the largest city in the country.",
            "answer" => "London is the capital and the largest city in the country.",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9p.mp3',
                    "timeRange"     =>"00:34-00:40",
                    "text" => "London is the capital and the largest city in the country. ",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9p.mp3',
                    "timeRange"     =>"00:34-00:40",
                    "text" => "London is the capital and the largest city in the country. ",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"3",
            "content_id"=>1544,
            "media_filename"=>'media/u9p.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"00:46-00:51",
            "scores"=>1,
            "text" => "The population of its urban area is around 10 million. ",
            "answer" => "The population of its urban area is around 10 million. ",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9p.mp3',
                    "timeRange"     =>"00:46-00:51",
                    "text" => "The population of its urban area is around 10 million. ",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9p.mp3',
                    "timeRange"     =>"00:46-00:51",
                    "text" => "The population of its urban area is around 10 million. ",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"4",
            "content_id"=>1545,
            "media_filename"=>'media/u9p.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"00:58-01:03",
            "scores"=>1,
            "text" => "It was the world's first industrialized country.",
            "answer" => "It was the world's first industrialized country.",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9p.mp3',
                    "timeRange"     =>"00:58-01:03",
                    "text" => "It was the world's first industrialized country.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9p.mp3',
                    "timeRange"     =>"00:58-01:03",
                    "text" => "It was the world's first industrialized country.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"5",
            "content_id"=>1546,
            "media_filename"=>'media/u9p.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"02:01-02:07",
            "scores"=>1,
            "text" => "It expanded very fast to many territories throughout the world. ",
            "answer" => "It expanded very fast to many territories throughout the world. ",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9p.mp3',
                    "timeRange"     =>"02:01-02:07",
                    "text" => "It expanded very fast to many territories throughout the world. ",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9p.mp3',
                    "timeRange"     =>"02:01-02:07",
                    "text" => "It expanded very fast to many territories throughout the world. ",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"6",
            "content_id"=>1547,
            "media_filename"=>'media/u9p.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"02:59-03:07",
            "scores"=>1,
            "text" => "In 2016, the United Kingdom voted to leave the EU. ",
            "answer" => "In 2016, the United Kingdom voted to leave the EU. ",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9p.mp3',
                    "timeRange"     =>"02:59-03:07",
                    "text" => "In 2016, the United Kingdom voted to leave the EU. ",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9p.mp3',
                    "timeRange"     =>"02:59-03:07",
                    "text" => "In 2016, the United Kingdom voted to leave the EU. ",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"7",
            "content_id"=>1548,
            "media_filename"=>'media/u9p.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"03:11-03:17",
            "scores"=>1,
            "text" => "More and more students choose to go to the UK for higher education. ",
            "answer" => "More and more students choose to go to the UK for higher education. ",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9p.mp3',
                    "timeRange"     =>"03:11-03:17",
                    "text" => "More and more students choose to go to the UK for higher education. ",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9p.mp3',
                    "timeRange"     =>"03:11-03:17",
                    "text" => "More and more students choose to go to the UK for higher education. ",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"8",
            "content_id"=>1549,
            "media_filename"=>'media/u9d.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"00:48-00:51",
            "scores"=>1,
            "text" => "In the beginning, I was really scared. ",
            "answer" => "In the beginning, I was really scared. ",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9d.mp3',
                    "timeRange"     =>"00:48-00:51",
                    "text" => "In the beginning, I was really scared. ",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9d.mp3',
                    "timeRange"     =>"00:48-00:51",
                    "text" => "In the beginning, I was really scared. ",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"9",
            "content_id"=>1550,
            "media_filename"=>'media/u9d.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"00:55-00:59",
            "scores"=>1,
            "text" => "Fortunately, Mr. James is a fantastic teacher. ",
            "answer" => "Fortunately, Mr. James is a fantastic teacher. ",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9d.mp3',
                    "timeRange"     =>"00:55-00:59",
                    "text" => "Fortunately, Mr. James is a fantastic teacher. ",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9d.mp3',
                    "timeRange"     =>"00:55-00:59",
                    "text" => "Fortunately, Mr. James is a fantastic teacher. ",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"10",
            "content_id"=>1551,
            "media_filename"=>'media/u9d.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"01:08-01:11",
            "scores"=>1,
            "text" => "He is completely different from other teachers. ",
            "answer" => "He is completely different from other teachers. ",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9d.mp3',
                    "timeRange"     =>"01:08-01:11",
                    "text" => "He is completely different from other teachers.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9d.mp3',
                    "timeRange"     =>"01:08-01:11",
                    "text" => "He is completely different from other teachers.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"11",
            "content_id"=>1552,
            "media_filename"=>'media/u9d.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"01:30-01:33",
            "scores"=>1,
            "text" => "He's always lively and enthusiastic.",
            "answer" => "He's always lively and enthusiastic.",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9d.mp3',
                    "timeRange"     =>"01:30-01:33",
                    "text" => "He's always lively and enthusiastic.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9d.mp3',
                    "timeRange"     =>"01:30-01:33",
                    "text" => "He's always lively and enthusiastic.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"12",
            "content_id"=>1553,
            "media_filename"=>'media/u9d.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"01:40-01:43",
            "scores"=>1,
            "text" => "What is your chemistry teacher like then?",
            "answer" => "What is your chemistry teacher like then?",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9d.mp3',
                    "timeRange"     =>"01:40-01:43",
                    "text" => "What is your chemistry teacher like then?",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9d.mp3',
                    "timeRange"     =>"01:40-01:43",
                    "text" => "What is your chemistry teacher like then?",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"13",
            "content_id"=>1554,
            "media_filename"=>'media/u9d.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"01:43-01:47",
            "scores"=>1,
            "text" => "Joe is nice, but he seems to only teach the book. ",
            "answer" => "Joe is nice, but he seems to only teach the book. ",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9d.mp3',
                    "timeRange"     =>"01:43-01:47",
                    "text" => "Joe is nice, but he seems to only teach the book. ",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9d.mp3',
                    "timeRange"     =>"01:43-01:47",
                    "text" => "Joe is nice, but he seems to only teach the book. ",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"14",
            "content_id"=>1555,
            "media_filename"=>'media/u9d.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"02:00-02:03",
            "scores"=>1,
            "text" => "I think I'll probably just pass the exam.",
            "answer" => "I think I'll probably just pass the exam.",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9d.mp3',
                    "timeRange"     =>"02:00-02:03",
                    "text" => "I think I'll probably just pass the exam.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9d.mp3',
                    "timeRange"     =>"02:00-02:03",
                    "text" => "I think I'll probably just pass the exam.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"15",
            "content_id"=>1556,
            "media_filename"=>'media/u9d.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"02:13-02:17",
            "scores"=>1,
            "text" => "We had several group projects with experiments. ",
            "answer" => "We had several group projects with experiments. ",
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9d.mp3',
                    "timeRange"     =>"02:13-02:17",
                    "text" => "We had several group projects with experiments. ",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9d.mp3',
                    "timeRange"     =>"02:13-02:17",
                    "text" => "We had several group projects with experiments. ",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
         $this->saveEventListToDatabases($data);$a =  json_encode($data);
        $fp = fopen('json246.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
        return;
    }

    public function getPart247(){
        $data = array(
            "unit_id"       =>26,
            "lesson_id"     =>83,
            "part_id"       =>247,
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
            "content_id"=>1557,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"00:00-00:05",
            "scores"=>10,
            "text" => "Joe is ill. | Really? I _ know. I _ go to see him. ",
            "answer" =>"Joe is ill. |Really? I didn't know. I will go to see him. ",
            "items" => array(
                "0"=>array("item"=>"didn't","isCorrect"=>true),
                "1"=>array("item"=>"am going to", "isCorrect"=>false),
                "2"=>array("item"=>"don't", "isCorrect"=>false),
                "3"=>array("item"=>"will", "isCorrect"=>true),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9gfi.mp3',
                    "timeRange"     =>"00:00-00:05",
                    "text" => "Joe is ill. |Really? I didn't know. I will go to see him. ",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9gfi.mp3',
                    "timeRange"     =>"00:00-00:05",
                    "text" => "Joe is ill. |Really? I didn't know. I will go to see him. ",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"2",
            "content_id"=>1558,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"00:05-00:11",
            "scores"=>10,
            "text" => "John was not in town at that time, so he really doesn't know how the accident _ .",
            "answer"=>"John was not in town at that time, so he really doesn't know how the accident happened.",
            "items" => array(
                "0"=>array("item"=>"happened","isCorrect"=>true),
                "1"=>array("item"=>"happens", "isCorrect"=>false),
                "2"=>array("item"=>"has happened", "isCorrect"=>false),
                "3"=>array("item"=>"was happening","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9gfi.mp3',
                    "timeRange"     =>"00:05-00:11",
                    "text"=>"John was not in town at that time, so he really doesn't know how the accident happened.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9gfi.mp3',
                    "timeRange"     =>"00:05-00:11",
                    "text"=>"John was not in town at that time, so he really doesn't know how the accident happened.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"3",
            "content_id"=>1559,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"00:11-00:18",
            "scores"=>10,
            "text" => "My grandparents _ in Beijing. They went there when they were young and have never lived anywhere else. ",
            "answer"=>"My grandparents live in Beijing. They went there when they were young and have never lived anywhere else. ",
            "items" => array(
                "0"=>array("item"=>"live","isCorrect"=>true),
                "1"=>array("item"=>"living", "isCorrect"=>false),
                "2"=>array("item"=>"were living", "isCorrect"=>false),
                "3"=>array("item"=>"will live","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9gfi.mp3',
                    "timeRange"     =>"00:11-00:18",
                    "text"=>"My grandparents live in Beijing. They went there when they were young and have never lived anywhere else. ",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9gfi.mp3',
                    "timeRange"     =>"00:11-00:18",
                    "text"=>"My grandparents live in Beijing. They went there when they were young and have never lived anywhere else. ",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );
        $data['events'][] = array(
            "num"=>"4",
            "content_id"=>1560,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"00:18-00:23",
            "scores"=>10,
            "text" => "I have to go now. | What a pity!  I _ you could stay for lunch.",
            "answer"=>"I have to go now. |What a pity! I thought you could stay for lunch.",
            "items" => array(
                "0"=>array("item"=>"think","isCorrect"=>false),
                "1"=>array("item"=>"thought", "isCorrect"=>true),
                "2"=>array("item"=>"will think", "isCorrect"=>false),
                "3"=>array("item"=>"am thinking","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9gfi.mp3',
                    "timeRange"     =>"00:18-00:23",
                    "text"=>"I have to go now. |What a pity! I thought you could stay for lunch.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9gfi.mp3',
                    "timeRange"     =>"00:18-00:23",
                    "text"=>"I have to go now. |What a pity! I thought you could stay for lunch.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"5",
            "content_id"=>1561,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"00:23-00:29",
            "scores"=>10,
            "text" => "It's easy to recognize John because he's the only one of the boys who _ glasses. ",
            "answer"=>"It's easy to recognize John because he's the only one of the boys who wears glasses. ",
            "items" => array(
                "0"=>array("item"=>"wear", "isCorrect"=>false),
                "1"=>array("item"=>"wears","isCorrect"=>true),
                "2"=>array("item"=>"wearing", "isCorrect"=>false),
                "3"=>array("item"=>"have worn","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9gfi.mp3',
                    "timeRange"     =>"00:23-00:29",
                    "text"=>"It's easy to recognize John because he's the only one of the boys who wears glasses. ",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9gfi.mp3',
                    "timeRange"     =>"00:23-00:29",
                    "text"=>"It's easy to recognize John because he's the only one of the boys who wears glasses. ",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"6",
            "content_id"=>1562,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"00:29-00:36",
            "scores"=>10,
            "text" => "Linda, as well as her partners, _ on the science project around the clock to meet the deadline.",
            "answer"=>"Linda, as well as her partners, is working on the science project around the clock to meet the deadline.",
            "items" => array(
                "0"=>array("item"=>"work", "isCorrect"=>false),
                "1"=>array("item"=>"working","isCorrect"=>false),
                "2"=>array("item"=>"is working", "isCorrect"=>true),
                "3"=>array("item"=>"are working","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9gfi.mp3',
                    "timeRange"     =>"00:29-00:36",
                    "text"=>"Linda, as well as her partners, is working on the science project around the clock to meet the deadline.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9gfi.mp3',
                    "timeRange"     =>"00:29-00:36",
                    "text"=>"Linda, as well as her partners, is working on the science project around the clock to meet the deadline.",
                 ),
            ),
            "picture"=>"images/type_click_001.png"
        );
        $data['events'][] = array(
            "num"=>"7",
            "content_id"=>1563,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"00:36-00:41",
            "scores"=>10,
            "text" => "Linda _ Joe all the time in class, so he doesn't like her.",
            "answer"=>"Linda is disturbing Joe all the time in class, so he doesn't like her.",
            "items" => array(
                "0"=>array("item"=>"is disturbing", "isCorrect"=>true),
                "1"=>array("item"=>"disturbed","isCorrect"=>false),
                "2"=>array("item"=>"will disturb", "isCorrect"=>false),
                "3"=>array("item"=>"disturb","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9gfi.mp3',
                    "timeRange"     =>"00:36-00:41",
                    "text"=>"Linda is disturbing Joe all the time in class, so he doesn't like her.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9gfi.mp3',
                    "timeRange"     =>"00:36-00:41",
                    "text"=>"Linda is disturbing Joe all the time in class, so he doesn't like her.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"8",
            "content_id"=>1564,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"00:41-00:47",
            "scores"=>10,
            "text" => "My English teacher told us that life is like a roller coaster, because it  _ ups and downs.",
            "answer"=>"My English teacher told us that life is like a roller coaster, because it has ups and downs.",
            "items" => array(
                "0"=>array("item"=>"has","isCorrect"=>true),
                "1"=>array("item"=>"had","isCorrect"=>false),
                "2"=>array("item"=>"have", "isCorrect"=>false),
                "3"=>array("item"=>"is having","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9gfi.mp3',
                    "timeRange"     =>"00:41-00:47",
                    "text"=>"My English teacher told us that life is like a roller coaster, because it has ups and downs."
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9gfi.mp3',
                    "timeRange"     =>"00:41-00:47",
                    "text"=>"My English teacher told us that life is like a roller coaster, because it has ups and downs."
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"9",
            "content_id"=>1565,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"00:47-00:51",
            "scores"=>10,
            "text" => "By the time you get home, your meal _ cold. ",
            "answer"=>"By the time you get home, your meal will be cold.",
            "items" => array(
                "0"=>array("item"=>"will be", "isCorrect"=>true),
                "1"=>array("item"=>"was","isCorrect"=>false),
                "2"=>array("item"=>"is", "isCorrect"=>false),
                "3"=>array("item"=>"had been","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9gfi.mp3',
                    "timeRange"     =>"00:47-00:51",
                    "text"=>"By the time you get home, your meal will be cold.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9gfi.mp3',
                    "timeRange"     =>"00:47-00:51",
                    "text"=>"By the time you get home, your meal will be cold.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );
        $data['events'][] = array(
            "num"=>"10",
            "content_id"=>1566,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"00:51-00:56",
            "scores"=>10,
            "text" => "I was wondering if you could take care of my cat until I _ this Sunday. ",
            "answer"=>"I was wondering if you could take care of my cat until I come back this Sunday.",
            "items" => array(
                "0"=>array("item"=>"will come back", "isCorrect"=>false),
                "1"=>array("item"=>"came back","isCorrect"=>false),
                "2"=>array("item"=>"come back", "isCorrect"=>true),
                "3"=>array("item"=>"have come back","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9gfi.mp3',
                    "timeRange"     =>"00:51-00:56",
                    "text" => "I was wondering if you could take care of my cat until I come back this Sunday.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9gfi.mp3',
                    "timeRange"     =>"00:51-00:56",
                    "text" => "I was wondering if you could take care of my cat until I come back this Sunday.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );
        $data['events'][] = array(
            "num"=>"11",
            "content_id"=>1567,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"00:56-01:02",
            "scores"=>10,
            "text" => "Linda, _ with me? | I'd love to, but I have something to attend to. ",
            "answer"=>"Linda, are you coming with me? | I'd love to, but I have something to attend to .",
            "items" => array(
                "0"=>array("item"=>"are you coming", "isCorrect"=>true),
                "1"=>array("item"=>"do you come","isCorrect"=>false),
                "2"=>array("item"=>"did you come", "isCorrect"=>false),
                "3"=>array("item"=>"have you come","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9gfi.mp3',
                    "timeRange"     =>"00:56-01:02",
                    "text"=>"Linda, are you coming with me? | I'd love to, but I have something to attend to.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9gfi.mp3',
                    "timeRange"     =>"00:56-01:02",
                    "text"=>"Linda, are you coming with me? | I'd love to, but I have something to attend to.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"12",
            "content_id"=>1568,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"01:02-01:07",
            "scores"=>10,
            "answer" => "My mother cooks for my family, but lately she's been too tired to do it.",
            "text"=>"My mother _ for my family, but lately she's been too tired to do it.",
            "items" => array(
                "0"=>array("item"=>"will cook", "isCorrect"=>false),
                "1"=>array("item"=>"cook","isCorrect"=>false),
                "2"=>array("item"=>"cooks", "isCorrect"=>true),
                "3"=>array("item"=>"is cooking","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9gfi.mp3',
                    "timeRange"     =>"01:02-01:07",
                    "text" => "My mother cooks for my family, but lately she's been too tired to do it.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9gfi.mp3',
                    "timeRange"     =>"01:02-01:07",
                    "text" => "My mother cooks for my family, but lately she's been too tired to do it.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"13",
            "content_id"=>1569,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"01:07-01:14",
            "scores"=>10,
            "text" => "Scientists are confident that the environment _ by people's further efforts in the future.",
            "answer"=>"Scientists are confident that the environment will be improved by people's further efforts in the future.",
            "items" => array(
                "0"=>array("item"=>"has been improved", "isCorrect"=>false),
                "1"=>array("item"=>"will be improved", "isCorrect"=>true),
                "2"=>array("item"=>"is improved,","isCorrect"=>false),
                "3"=>array("item"=>"was improved","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9gfi.mp3',
                    "timeRange"     =>"01:07-01:14",
                    "text" => "Scientists are confident that the environment will be improved by people's further efforts in the future.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9gfi.mp3',
                    "timeRange"     =>"01:07-01:14",
                    "text" => "Scientists are confident that the environment will be improved by people's further efforts in the future.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"14",
            "content_id"=>1570,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"01:14-01:19",
            "scores"=>10,
            "text" => "I've won a one-week holiday  to the UK. I _ my parents. ",
            "answer"=>"I've won a one-week holiday  to the UK. I am taking my parents.",
            "items" => array(
                "0"=>array("item"=>"am taking", "isCorrect"=>true),
                "1"=>array("item"=>"have taken", "isCorrect"=>false),
                "2"=>array("item"=>"take","isCorrect"=>false),
                "3"=>array("item"=>"will have taken","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9gfi.mp3',
                    "timeRange"     =>"01:14-01:19",
                    "text"=>"I've won a one-week holiday  to the UK. I am taking my parents.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9gfi.mp3',
                    "timeRange"     =>"01:14-01:19",
                    "text"=>"I've won a one-week holiday  to the UK. I am taking my parents.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"15",
            "content_id"=>1571,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"01:19-01:22",
            "scores"=>10,
            "text" => "The train _ at nine tomorrow morning.",
            "answer"=>"The train leaves at nine tomorrow morning.",
            "items" => array(
                "0"=>array("item"=>"leave", "isCorrect"=>false),
                "1"=>array("item"=>"as left","isCorrect"=>false),
                "2"=>array("item"=>"leaves", "isCorrect"=>true),
                "3"=>array("item"=>"left","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9gfi.mp3',
                    "timeRange"     =>"01:19-01:22",
                    "text"=>"The train leaves at nine tomorrow morning.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9gfi.mp3',
                    "timeRange"     =>"01:19-01:22",
                    "text"=>"The train leaves at nine tomorrow morning.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"16",
            "content_id"=>1572,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"01:22-01:26",
            "scores"=>10,
            "text" =>"I _  a good time whether I win or lose.",
            "answer"=>"I will have a good time whether I win or lose.",
            "items" => array(
                "0"=>array("item"=>"had had", "isCorrect"=>false),
                "1"=>array("item"=>"have","isCorrect"=>false),
                "2"=>array("item"=>"had", "isCorrect"=>false),
                "3"=>array("item"=>"will have","isCorrect"=>true),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9gfi.mp3',
                    "timeRange"     =>"01:22-01:26",
                    "text"=>"I will have a good time whether I win or lose.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9gfi.mp3',
                    "timeRange"     =>"01:22-01:26",
                    "text"=>"I will have a good time whether I win or lose.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );
        $data['events'][] = array(
            "num"=>"17",
            "content_id"=>1573,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"01:26-01:30",
            "scores"=>10,
            "text" => "He _ for the USA the day after tomorrow.",
            "answer"=>"He is to leave for the USA the day after tomorrow.",
            "items" => array(
                "0"=>array("item"=>"is to leave", "isCorrect"=>true),
                "1"=>array("item"=>"left","isCorrect"=>false),
                "2"=>array("item"=>"leave", "isCorrect"=>false),
                "3"=>array("item"=>"has left","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9gfi.mp3',
                    "timeRange"     =>"01:26-01:30",
                    "text"=>"He is to leave for the USA the day after tomorrow.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9gfi.mp3',
                    "timeRange"     =>"01:26-01:30",
                    "text"=>"He is to leave for the USA the day after tomorrow.",

                ),
            ),
            "picture"=>"images/type_click_001.png"
        );
        $data['events'][] = array(
            "num"=>"18",
            "content_id"=>1574,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"01:09-01:13",
            "scores"=>10,
            "text" => "Did you hear me? You _ leave home without my permission.",
            "answer"=>"Did you hear me? You are not to leave home without my permission.",
            "items" => array(
                "0"=>array("item"=>"are not to", "isCorrect"=>true),
                "1"=>array("item"=>"are not about to","isCorrect"=>false),
                "2"=>array("item"=>"won't", "isCorrect"=>false),
                "3"=>array("item"=>"are not going to","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9gfi.mp3',
                    "timeRange"     =>"01:09-01:13",
                    "text"=>"Did you hear me? You are not to leave home without my permission.",
                ),
                "No"=>array(
                    "Yes"=>array(
                        "media_type"=>"audio",
                        "media_filename"=>'media/u9gfi.mp3',
                        "timeRange"     =>"01:09-01:13",
                        "text"=>"Did you hear me? You are not to leave home without my permission.",
                    ),
                  ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"19",
            "content_id"=>1575,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"01:34-01:40",
            "scores"=>10,
            "text" => "Did you wash your car? | No, I was going to wash it but my friends _ me.",
            "answer"=>"Did you wash your car? |No, I was going to wash it but my friends dropped in on me.",
            "items" => array(
                "0"=>array("item"=>"dropped in on,", "isCorrect"=>true),
                "1"=>array("item"=>"drop in on", "isCorrect"=>false),
                "2"=>array("item"=>"had dropped in on","isCorrect"=>false),
                "3"=>array("item"=>"will drop in on","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9gfi.mp3',
                    "timeRange"     =>"01:34-01:40",
                    "text"=>"Did you wash your car? |No, I was going to wash it but my friends dropped in on me.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9gfi.mp3',
                    "timeRange"     =>"01:34-01:40",
                    "text"=>"Did you wash your car? |No, I was going to wash it but my friends dropped in on me.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"20",
            "content_id"=>1576,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"fill_in",
            "timeRange"     =>"01:40-01:44",
            "scores"=>10,
            "text" => "Look at those black clouds. I think It _ rain.",
            "answer"=>"Look at those black clouds. I think It is going to rain.",
            "items" => array(
                "0"=>array("item"=>"will not", "isCorrect"=>false),
                "1"=>array("item"=>"does", "isCorrect"=>false),
                "2"=>array("item"=>"is going to","isCorrect"=>true),
                "3"=>array("item"=>"is","isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9gfi.mp3',
                    "timeRange"     =>"01:40-01:44",
                    "text"=>"Look at those black clouds. I think It is going to rain.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9gfi.mp3',
                    "timeRange"     =>"01:40-01:44",
                    "text"=>"Look at those black clouds. I think It is going to rain.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );
         $this->saveEventListToDatabases($data);$a =  json_encode($data);
        $fp = fopen('json247.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
        return;
    }


    public function getPart248(){
        $data = array(
            "unit_id"       =>26,
            "lesson_id"     =>83,
            "part_id"       =>248,
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
            "content_id"=>1577,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"00:00-00:05",
            "scores"=>1,
            "text" => "My friends have promised to throw a party for me before I go to university.",
            "items" => array(
                "0"=>array("item"=>"My friends"),
                "1"=>array("item"=>"have promised to"),
                "2"=>array("item"=>"throw a party for me"),
                "3"=>array("item"=>"before I go to university."),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9gso.mp3',
                    "timeRange"     =>"00:00-00:05",
                    "text" => "My friends have promised to throw a party for me before I go to university.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9gso.mp3',
                    "timeRange"     =>"00:00-00:05",
                    "text" => "My friends have promised to throw a party for me before I go to university.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );
        $data['events'][] = array(
            "num"=>"2",
            "content_id"=>1578,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"00:05-00:09",
            "scores"=>1,
            "text" => "It's been five years since he became CEO. ",
            "items" => array(
                "0"=>array("item"=>"It's been"),
                "1"=>array("item"=>"five years"),
                "2"=>array("item"=>"since"),
                "3"=>array("item"=>"he became CEO.")
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9gso.mp3',
                    "timeRange"     =>"00:05-00:09",
                    "text" => "It's been five years since he became CEO.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9gso.mp3',
                    "timeRange"     =>"00:05-00:09",
                    "text" => "It's been five years since he became CEO.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );
        $data['events'][] = array(
            "num"=>"3",
            "content_id"=>1579,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"00:09-00:13",
            "scores"=>1,
            "text" => "I ran into my ex-boyfriend the other day.   ",
            "items" => array(
                "0"=>array("item"=>"I ran into"),
                "1"=>array("item"=>"my ex-boyfriend"),
                "2"=>array("item"=>"the other day.")
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9gso.mp3',
                    "timeRange"     =>"00:09-00:13",
                    "text" => "I ran into my ex-boyfriend the other day.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9gso.mp3',
                    "timeRange"     =>"00:09-00:13",
                    "text" => "I ran into my ex-boyfriend the other day.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );
        $data['events'][] = array(
            "num"=>"4",
            "content_id"=>1580,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"00:13-00:16",
            "scores"=>1,
            "text" => "What time shall we go shopping tomorrow?",
            "items" => array(
                "0"=>array("item"=>"What time"),
                "1"=>array("item"=>"shall we"),
                "2"=>array("item"=>"go shopping tomorrow?")
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9gso.mp3',
                    "timeRange"     =>"00:13-00:16",
                    "text" => "What time shall we go shopping tomorrow?",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9gso.mp3',
                    "timeRange"     =>"00:13-00:16",
                    "text" => "What time shall we go shopping tomorrow?",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );
        $data['events'][] = array(
            "num"=>"5",
            "content_id"=>1581,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"00:16-00:21",
            "scores"=>1,
            "text" => "If we do nothing, the oceans will turn into deserts eventually.",
            "items" => array(
                "0"=>array("item"=>"If we do nothing,"),
                "1"=>array("item"=>"the oceans"),
                "2"=>array("item"=>"will"),
                "3"=>array("item"=>"turn into deserts eventually.")
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9gso.mp3',
                    "timeRange"     =>"00:16-00:21",
                    "text" => "If we do nothing, the oceans will turn into deserts eventually.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9gso.mp3',
                    "timeRange"     =>"00:16-00:21",
                    "text" => "If we do nothing, the oceans will turn into deserts eventually.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );
        $data['events'][] = array(
            "num"=>"6",
            "content_id"=>1582,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"00:21-00:27",
            "scores"=>1,
            "text" => "I didn't think I'd enjoy the show, but in fact it was fantastic. ",
            "items" => array(
                "0"=>array("item"=>"I didn't think"),
                "1"=>array("item"=>"I'd enjoy the show"),
                "2"=>array("item"=>"but in fact"),
                "3"=>array("item"=>"it was fantastic."),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9gso.mp3',
                    "timeRange"     =>"00:21-00:27",
                    "text" => "I didn't think I'd enjoy the show, but in fact it was fantastic. ",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9gso.mp3',
                    "timeRange"     =>"00:21-00:27",
                    "text" => "I didn't think I'd enjoy the show, but in fact it was fantastic. ",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"7",
            "content_id"=>1583,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"00:27-00:31",
            "scores"=>1,
            "text" => "Joe was distracted, so he didn't catch what the teacher said.",
            "items" => array(
                "0"=>array("item"=>"Joe was distracted,"),
                "1"=>array("item"=>"so"),
                "2"=>array("item"=>"he didn't catch"),
                "3"=>array("item"=>"what the teacher said.."),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9gso.mp3',
                    "timeRange"     =>"00:27-00:31",
                    "text" => "Joe was distracted, so he didn't catch what the teacher said.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9gso.mp3',
                    "timeRange"     =>"00:27-00:31",
                    "text" => "Joe was distracted, so he didn't catch what the teacher said.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"8",
            "content_id"=>1584,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"00:31-00:36",
            "scores"=>1,
            "text" => "The novel describes how a young man becomes successful.",
            "items" => array(
                "0"=>array("item"=>"The novel describes"),
                "1"=>array("item"=>"how"),
                "2"=>array("item"=>"a young man"),
                "3"=>array("item"=>"becomes successful.")
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9gso.mp3',
                    "timeRange"     =>"00:31-00:36",
                    "text" => "The novel describes how a young man becomes successful.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9gso.mp3',
                    "timeRange"     =>"00:31-00:36",
                    "text" => "The novel describes how a young man becomes successful.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"9",
            "content_id"=>1585,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"00:36-00:41",
            "scores"=>1,
            "text" => "The moment I got on the subway, I realized  I had left my schoolbag at home.",
            "items" => array(
                "0"=>array("item"=>"The moment"),
                "1"=>array("item"=>"I got on the subway,"),
                "2"=>array("item"=>"I realized  I had"),
                "3"=>array("item"=>"left my schoolbag at home."),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9gso.mp3',
                    "timeRange"     =>"00:36-00:41",
                    "text" => "The moment I got on the subway, I realized  I had left my schoolbag at home.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9gso.mp3',
                    "timeRange"     =>"00:36-00:41",
                    "text" => "The moment I got on the subway, I realized  I had left my schoolbag at home.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"10",
            "content_id"=>1586,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"00:41-00:47",
            "scores"=>1,
            "text" => "He'll go to the theater as soon as he finishes what he is doing.",
            "items" => array(
                "0"=>array("item"=>"He'll go to the theater"),
                "1"=>array("item"=>"as soon as"),
                "2"=>array("item"=>"he finishes"),
                "3"=>array("item"=>"what he is doing.")
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9gso.mp3',
                    "timeRange"     =>"00:41-00:47",
                    "text" => "He'll go to the theater as soon as he finishes what he is doing.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9gso.mp3',
                    "timeRange"     =>"00:41-00:47",
                    "text" => "He'll go to the theater as soon as he finishes what he is doing.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"11",
            "content_id"=>1587,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"00:47-00:51",
            "scores"=>1,
            "text" => "He's damaging his health because he smokes too much.",
            "items" => array(
                "0"=>array("item"=>"He's damaging"),
                "1"=>array("item"=>"his health"),
                "2"=>array("item"=>"because"),
                "3"=>array("item"=>"he smokes"),
                "4"=>array("item"=>"too much."),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9gso.mp3',
                    "timeRange"     =>"00:47-00:51",
                    "text" => "He's damaging his health because he smokes too much.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9gso.mp3',
                    "timeRange"     =>"00:47-00:51",
                    "text" => "He's damaging his health because he smokes too much.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"12",
            "content_id"=>1588,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"00:51-00:56",
            "scores"=>1,
            "text" => "There won't be a celebration until our team wins the game.",
            "items" => array(
                "0"=>array("item"=>"There won't be"),
                "1"=>array("item"=>"a celebration"),
                "2"=>array("item"=>"until our team"),
                "3"=>array("item"=>" wins the game.")
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9gso.mp3',
                    "timeRange"     =>"00:51-00:56",
                    "text" => "There won't be a celebration until our team wins the game.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9gso.mp3',
                    "timeRange"     =>"00:51-00:56",
                    "text" => "There won't be a celebration until our team wins the game.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"13",
            "content_id"=>1589,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"00:56-01:01",
            "scores"=>1,
            "text" => "Selecting a cellphone is difficult because technology is changing fast.",
            "items" => array(
                "0"=>array("item"=>"Selecting a cellphone"),
                "1"=>array("item"=>"is difficult"),
                "2"=>array("item"=>"because technology"),
                "3"=>array("item"=>"is changing fast."),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9gso.mp3',
                    "timeRange"     =>"00:56-01:01",
                    "text" => "Selecting a cellphone is difficult because technology is changing fast.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9gso.mp3',
                    "timeRange"     =>"00:56-01:01",
                    "text" => "Selecting a cellphone is difficult because technology is changing fast.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"14",
            "content_id"=>1590,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"01:01-01:07",
            "scores"=>1,
            "text" => "He is always thinking about how he can do more for other people.",
            "items" => array(
                "0"=>array("item"=>"He is always"),
                "1"=>array("item"=>"thinking about"),
                "2"=>array("item"=>"how he can"),
                "3"=>array("item"=>"do more for other people."),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9gso.mp3',
                    "timeRange"     =>"01:01-01:07",
                    "text" => "He is always thinking about how he can do more for other people.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9gso.mp3',
                    "timeRange"     =>"01:01-01:07",
                    "text" => "He is always thinking about how he can do more for other people.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"15",
            "content_id"=>1591,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"click_ordering",
            "timeRange"     =>"01:07-01:12",
            "scores"=>1,
            "text" => "You should decide on your own, so I won't provide any advice.",
            "items" => array(
                "0"=>array("item"=>"You should decide"),
                "1"=>array("item"=>"on your own"),
                "2"=>array("item"=>"so I won't"),
                "3"=>array("item"=>"provide any advice."),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9gso.mp3',
                    "timeRange"     =>"01:07-01:12",
                    "text" => "You should decide on your own, so I won't provide any advice.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9gso.mp3',
                    "timeRange"     =>"01:07-01:12",
                    "text" => "You should decide on your own, so I won't provide any advice.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

         $this->saveEventListToDatabases($data);$a =  json_encode($data);
        $fp = fopen('json248.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
        return;
    }

    public function getPart249(){
        $data = array(
            "unit_id"       =>26,
            "lesson_id"     =>83,
            "part_id"       =>249,
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
            "content_id"=>1592,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"sr_ordering",
            "timeRange"     =>"00:00-00:04",
            "scores"=>1,
            "text" => "Sorry, I didn't realize I was sitting in your seat.",
            "answer" => "Sorry, I didn't realize I was sitting in your seat.",
            "items" => array(
                "0"=>array("item"=>"Sorry"),
                "1"=>array("item"=>"I didn't realize"),
                "2"=>array("item"=>" I was sitting"),
                "3"=>array("item"=>"in your seat."),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9gsf.mp3',
                    "timeRange"     =>"00:00-00:04",
                    "text" => "Sorry, I didn't realize I was sitting in your seat.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9gsf.mp3',
                    "timeRange"     =>"00:00-00:04",
                    "text" => "Sorry, I didn't realize I was sitting in your seat.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"2",
            "content_id"=>1593,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"sr_ordering",
            "timeRange"     =>"00:04-00:09",
            "scores"=>1,
            "text" => "Let's hurry up because Tom and Joe are expecting us.",
            "answer" => "Let's hurry up because Tom and Joe are expecting us.",
            "items" => array(
                "0"=>array("item"=>"Let's hurry up"),
                "1"=>array("item"=>"because"),
                "2"=>array("item"=>"Tom and Joe"),
                "3"=>array("item"=>" are expecting us."),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9gsf.mp3',
                    "timeRange"     =>"00:04-00:09",
                    "text" => "Let's hurry up because Tom and Joe are expecting us.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9gsf.mp3',
                    "timeRange"     =>"00:04-00:09",
                    "text" => "Let's hurry up because Tom and Joe are expecting us.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"3",
            "content_id"=>1594,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"sr_ordering",
            "timeRange"     =>"00:09-00:13",
            "scores"=>1,
            "text" => "My roomate talks in her dream and it kind of bothers me. ",
            "answer" => "My roomate talks in her dream and it kind of bothers me.",
            "items" => array(
                "0"=>array("item"=>"My roomate"),
                "1"=>array("item"=>"talks in her dream"),
                "2"=>array("item"=>"and"),
                "3"=>array("item"=>"it kind of bothers me."),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9gsf.mp3',
                    "timeRange"     =>"00:09-00:13",
                    "text" => "My roomate talks in her dream and it kind of bothers me. ",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9gsf.mp3',
                    "timeRange"     =>"00:09-00:13",
                    "text" => "My roomate talks in her dream and it kind of bothers me. ",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"4",
            "content_id"=>1595,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"sr_ordering",
            "timeRange"     =>"00:13-00:17",
            "scores"=>1,
            "text" => "I came to say goodbye because I'm leaving tomorrow. ",
            "answer" => "I came to say goodbye because I'm leaving tomorrow. ",
            "items" => array(
                "0"=>array("item"=>"I came"),
                "1"=>array("item"=>"to say goodby"),
                "2"=>array("item"=>"because"),
                "3"=>array("item"=>"I'm leaving tomorrow."),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9gsf.mp3',
                    "timeRange"     =>"00:13-00:17",
                    "text" => "I came to say goodbye because I'm leaving tomorrow.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9gsf.mp3',
                    "timeRange"     =>"00:13-00:17",
                    "text" => "I came to say goodbye because I'm leaving tomorrow.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"5",
            "content_id"=>1596,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"sr_ordering",
            "timeRange"     =>"00:17-00:21",
            "scores"=>1,
            "text" => "Have you heard that they are getting married next month?",
            "answer" => "Have you heard that they are getting married next month?",
            "items" => array(
                "0"=>array("item"=>"Have you heard"),
                "1"=>array("item"=>"that"),
                "2"=>array("item"=>"they are getting married"),
                "3"=>array("item"=>"next month?")
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9gsf.mp3',
                    "timeRange"     =>"00:17-00:21",
                    "text" => "Have you heard that they are getting married next month?",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9gsf.mp3',
                    "timeRange"     =>"00:17-00:21",
                    "text" => "Have you heard that they are getting married next month?",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );
        $data['events'][] = array(
            "num"=>"6",
            "content_id"=>1597,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"sr_ordering",
            "timeRange"     =>"00:21-00:26",
            "scores"=>1,
            "text" => "My father's birthday is on a Saturday in two weeks.",
            "answer" => "My father's birthday is on a Saturday in two weeks.",
            "items" => array(
                "0"=>array("item"=>"My father's birthday"),
                "1"=>array("item"=>"is"),
                "2"=>array("item"=>"on a Saturday"),
                "3"=>array("item"=>"in two weeks."),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9gsf.mp3',
                    "timeRange"     =>"00:21-00:26",
                    "text" => "My father's birthday is on a Saturday in two weeks.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9gsf.mp3',
                    "timeRange"     =>"00:21-00:26",
                    "text" => "My father's birthday is on a Saturday in two weeks.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"7",
            "content_id"=>1598,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"sr_ordering",
            "timeRange"     =>"00:26-00:31",
            "scores"=>1,
            "text" => "The geography teacher told us the earth goes around the sun. ",
            "answer" => "The geography teacher told us the earth goes around the sun. ",
            "items" => array(
                "0"=>array("item"=>"The geography teacher"),
                "1"=>array("item"=>"told us"),
                "2"=>array("item"=>"the earth goes around"),
                "3"=>array("item"=>" the sun."),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9gsf.mp3',
                    "timeRange"     =>"00:26-00:31",
                    "text" => "The geography teacher told us the earth goes around the sun.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9gsf.mp3',
                    "timeRange"     =>"00:26-00:31",
                    "text" => "The geography teacher told us the earth goes around the sun.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"8",
            "content_id"=>1599,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"sr_ordering",
            "timeRange"     =>"00:31-00:35",
            "scores"=>1,
            "text" => "I'm preparing for the final exam these days. ",
            "answer" => "I'm preparing for the final exam these days.",
            "items" => array(
                "0"=>array("item"=>"I'm preparing for"),
                "1"=>array("item"=>"the final exam"),
                "2"=>array("item"=>"these days.")
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9gsf.mp3',
                    "timeRange"     =>"00:31-00:35",
                    "text" => "I'm preparing for the final exam these days.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9gsf.mp3',
                    "timeRange"     =>"00:31-00:35",
                    "text" => "I'm preparing for the final exam these days.",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"9",
            "content_id"=>1600,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"sr_ordering",
            "timeRange"     =>"00:35-00:39",
            "scores"=>1,
            "text" => "We shall give our parents a call when we get to the dorm. ",
            "answer" => "We shall give our parents a call when we get to the dorm. ",
            "items" => array(
                "0"=>array("item"=>"We shall"),
                "1"=>array("item"=>"give our parents a call"),
                "2"=>array("item"=>"when"),
                "3"=>array("item"=>"we"),
                "4"=>array("item"=>"get to the dorm."),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9gsf.mp3',
                    "timeRange"     =>"00:35-00:39",
                    "text" => "We shall give our parents a call when we get to the dorm. ",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9gsf.mp3',
                    "timeRange"     =>"00:35-00:39",
                    "text" => "We shall give our parents a call when we get to the dorm. ",
                ),
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"10",
            "content_id"=>1601,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"sr_ordering",
            "timeRange"     =>"00:39-00:43",
            "scores"=>1,
            "text" => "I'm afraid your plan won't be fulfilled.",
            "answer" => "I'm afraid your plan won't be fulfilled.",
            "items" => array(
                "0"=>array("item"=>"I'm afraid"),
                "1"=>array("item"=>"your plan"),
                "2"=>array("item"=>"won't be fulfilled.")
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u9gsf.mp3',
                    "timeRange"     =>"00:39-00:43",
                    "text" => "I'm afraid your plan won't be fulfilled.",
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
        $fp = fopen('json249.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
        return;
    }

    //最新MT
    public function getPart250(){
        $data = array(
            "unit_id"       =>26,
            "lesson_id"     =>84,
            "part_id"       =>250,
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
                1=>array(1,2,3),
                2=>array(1,2,4),
                3=>array(2,3,4)
            ),
            "keywords"   =>array(
            ),
        );

        $data['events'][] = array(
            "num"=>"1",
            "type"=>"MTmultipleChoices",
            "media_type"=>"audio",
            "media_filename"=>'media/u9p_original_mt.mp3',
            "timeRange"=>"01:03-01:22",
            "content"=>"During the 18th century, Britain was involved in the Atlantic slave trade. Its ships transported a lot of slaves from Africa to the West Indies. Later, the country took a leading role in the movement of abolishing slavery worldwide.",
            "text"=>"During the 18th century, Britain was involved in the Atlantic slave trade. Its ships transported a lot of slaves from Africa to the West Indies. Later, the country took a leading role in the movement of abolishing slavery worldwide.",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"1",
                    "content_id"=>1602,
                    "type"=>"multipleChoice",
                    "text"=>array("type"=>"text","text"=>"Where did Britain's ships transport slaves?"),
                    "scores"=>5,
                    "items"=>array(
                        "0"=>array("item"=>"From Africa to West Europe","isCorrect"=>false),
                        "1"=>array("item"=>"From Africa to the West Indies.", "isCorrect"=>true),
                        "2"=>array("item"=>"From Asia to the West Indies.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                    ),
                ),
                1=>array(
                    "num"=>"2",
                    "content_id"=>1603,
                    "type"=>"multipleChoice",
                    "text"=>array("type"=>"text","text"=>"What did Britain do later regarding slavery?"),
                    "scores"=>5,
                    "items"=>array(
                        "0"=>array("item"=>"It took a leading role to maintain slavery.","isCorrect"=>false),
                        "1"=>array("item"=>"It took a leading role to get rid of slavery.", "isCorrect"=>true),
                        "2"=>array("item"=>"It took a leading role to improve slavery.", "isCorrect"=>false),
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
            "media_filename"=>'media/u9p_original_mt.mp3',
            "timeRange"=>"01:45-02:01",
            "content"=>"In the 1950s, the country experienced a shortage of workers, so the government encouraged immigration from other countries. As a result, today the UK is a more multi-cultural society.",
            "text"=>"In the 1950s, the country experienced a shortage of workers, so the government encouraged immigration from other countries. As a result, today the UK is a more multi-cultural society.",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"1",
                    "content_id"=>1604,
                    "type"=>"multipleChoice",
                    "text"=>array("type"=>"text","text"=>"What did the country encounter in the 1950s?"),
                    "scores"=>5,
                    "items"=>array(
                        "0"=>array("item"=>"A workforce shortage.","isCorrect"=>true),
                        "1"=>array("item"=>"An energy shortage.", "isCorrect"=>false),
                        "2"=>array("item"=>"A finance shortage.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                    ),
                ),
                1=>array(
                    "num"=>"2",
                    "content_id"=>1605,
                    "type"=>"multipleChoice",
                    "text"=>array("type"=>"text","text"=>"What policy did the country take to deal with the shortage of workers in the 1950s?"),
                    "scores"=>5,
                    "items"=>array(
                        "0"=>array("item"=>"Encouraging immigration.","isCorrect"=>true),
                        "1"=>array("item"=>"Restraining immigration.", "isCorrect"=>false),
                        "2"=>array("item"=>"Encouraging emigration.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                    ),
                ),
                2=>array(
                    "num"=>"3",
                    "content_id"=>1606,
                    "type"=>"multipleChoice",
                    "text"=>array("type"=>"text","text"=>"Why is the United Kingdom a more multi-cultural society?"),
                    "scores"=>5,
                    "items"=>array(
                        "0"=>array("item"=>"Because of immigrants from other countries.","isCorrect"=>true),
                        "1"=>array("item"=>"Because of emigrants to other countries.", "isCorrect"=>false),
                        "2"=>array("item"=>"Because of the shortage of workers.", "isCorrect"=>false),
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
            "media_filename"=>'media/u9d_original_mt.mp3',
            "timeRange"=>"00:00-00:12",
            "content"=>"Tom: Are you having a hard time? Bob: You could say so. You know that I had physics and chemistry this semester. At first I was not interested in these subjects at all. But now, physics is getting more interesting.",
            "text"=>"Tom: Are you having a hard time? Bob: You could say so. You know that I had physics and chemistry this semester. At first I was not interested in these subjects at all. But now, physics is getting more interesting.",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"1",
                    "content_id"=>1607,
                    "type"=>"multipleChoice",
                    "text"=>array("type"=>"text","text"=>"How did Bob feel at the beginning of this semester?"),
                    "scores"=>5,
                    "items"=>array(
                        "0"=>array("item"=>"He had a difficult time at the beginning.","isCorrect"=>true),
                        "1"=>array("item"=>"He had an easy time at the beginning.", "isCorrect"=>false),
                        "2"=>array("item"=>"He was happy at the beginning.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                    ),
                ),
                1=>array(
                    "num"=>"1",
                    "content_id"=>1608,
                    "type"=>"multipleChoice",
                    "text"=>array("type"=>"text","text"=>"Why did Bob have a difficult time at the beginning of this semester?"),
                    "scores"=>5,
                    "items"=>array(
                        "0"=>array("item"=>"Because he did not like physics and chemistry.","isCorrect"=>true),
                        "1"=>array("item"=>"Because he thought physics was too difficult for him.", "isCorrect"=>false),
                        "2"=>array("item"=>"Because he thought physics was boring.", "isCorrect"=>false),
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
            "media_filename"=>'media/u9d_original_mt.mp3',
            "timeRange"=>"00:22-00:36",
            "content"=>"Bob: You're right. Mr. James is good. In the beginning, I was really scared. I was worried that I would be so bored by physics. Fortunately, Mr. James is a fantastic teacher. I never expected that physics could be so interesting. ",
            "text"=>"Bob: You're right. Mr. James is good. In the beginning, I was really scared. I was worried that I would be so bored by physics. Fortunately, Mr. James is a fantastic teacher. I never expected that physics could be so interesting. ",
            "multipleChoicesList"=>array(
                0=>array(
                    "num"=>"1",
                    "content_id"=>1609,
                    "type"=>"multipleChoice",
                    "text"=>array("type"=>"text","text"=>"What kind of teacher is James?"),
                    "scores"=>5,
                    "items"=>array(
                        "0"=>array("item"=>"He is boring.","isCorrect"=>false),
                        "1"=>array("item"=>"He is strict.", "isCorrect"=>false),
                        "2"=>array("item"=>"He is excellent.", "isCorrect"=>true),
                    ),
                    "selectEvents"=>array(
                    ),
                ),
                1=>array(
                    "num"=>"2",
                    "content_id"=>1610,
                    "type"=>"multipleChoice",
                    "text"=>array("type"=>"text","text"=>"What kind of help did James give to Bob?"),
                    "scores"=>5,
                    "items"=>array(
                        "0"=>array("item"=>"James was so fantastic that he made physics interesting to learn.","isCorrect"=>true),
                        "1"=>array("item"=>"James was so good that he didn't scare Bob at all.", "isCorrect"=>false),
                        "2"=>array("item"=>"James was so nice that he helped Bob with his homework.", "isCorrect"=>false),
                    ),
                    "selectEvents"=>array(
                    ),
                )
            ),
            "picture"=>"images/type_listen_001.png"
        );

         $this->saveEventListToDatabases($data);$a =  json_encode($data);
        $fp = fopen('json250.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
        return;
    }

    public function getPart251(){
        $data = array(
            "unit_id"       =>26,
            "lesson_id"     =>84,
            "part_id"       =>251,
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
            "content_id"=>1611,
            "type"=>"MTmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u9p_original_mt.mp3',
            "timeRange"=>"00:00-00:12",
            "content"=>"England, Scotland, Wales and Northern Ireland are all part of a country in Western Europe, known as the United Kingdom or Britain.",
            "text"=>array("type"=>"audio","text"=>"Where is the United Kingdom located?","media_filename"=>'media/u9pcq.mp3',"timeRange"=>"00:00-00:03"),
            "scores"=>7,
            "items"=>array(
                "0"=>array("item"=>"In Western Europe.","isCorrect"=>true),
                "1"=>array("item"=>"In Central Europe.", "isCorrect"=>false),
                "2"=>array("item"=>"In Western Africa.","isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_listen_001.png"
        );

        $data['events'][] = array(
            "num"=>"2",
            "content_id"=>1612,
            "type"=>"MTmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u9p_original_mt.mp3',
            "timeRange"=>"00:12-00:29",
            "content"=>"The United Kingdom is surrounded by the Atlantic Ocean. The whole country has an area of 242,500 square kilometers and has about 65 million inhabitants. ",
            "text"=>array("type"=>"audio","text"=>"What is the population of the United Kingdom?","media_filename"=>'media/u9pcq.mp3',"timeRange"=>"00:13-00:17"),
            "scores"=>7,
            "items"=>array(
                "0"=>array("item"=>"About 56 million.","isCorrect"=>false),
                "1"=>array("item"=>"About 65 million.", "isCorrect"=>true),
                "2"=>array("item"=>"About 60 million.", "isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_listen_001.png"
        );

        $data['events'][] = array(
            "num"=>"3",
            "content_id"=>1613,
            "type"=>"MTmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u9p_original_mt.mp3',
            "timeRange"=>"00:29-00:40",
            "content"=>"Britain is a developed country and is considered to have a high-income economy. It was the world's first industrialized country. ",
            "text"=>array("type"=>"audio","text"=>"What kind of country is Britain?","media_filename"=>'media/u9pcq.mp3',"timeRange"=>"00:27-00:30"),
            "scores"=>7,
            "items"=>array(
                "0"=>array("item"=>"It is a developing country and has a high-income economy.","isCorrect"=>false),
                "1"=>array("item"=>"It is a developed country and has a high-salary economy.", "isCorrect"=>true),
                "2"=>array("item"=>"It is the world's first and most industrialized country.", "isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_listen_001.png"
        );

        $data['events'][] = array(
            "num"=>"4",
            "content_id"=>1614,
            "type"=>"MTmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u9p_original_mt.mp3',
            "timeRange"=>"00:51-01:03",
            "content"=>"In the past several hundred years, the country has experienced many ups and downs politically, economically, culturally and in many other areas.",
            "text"=>array("type"=>"audio","text"=>"What has the United Kingdom experienced in the past several hundred years?","media_filename"=>'media/u9pcq.mp3',"timeRange"=>"00:34-00:40"),
            "scores"=>7,
            "items"=>array(
                "0"=>array("item"=>"It has experienced a steady development.","isCorrect"=>false),
                "1"=>array("item"=>"It has experienced a rapid development.", "isCorrect"=>false),
                "2"=>array("item"=>"It has experienced an unstable development.", "isCorrect"=>true),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_listen_001.png"
        );


        $data['events'][] = array(
            "num"=>"5",
            "content_id"=>1615,
            "type"=>"MTmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u9p_original_mt.mp3',
            "timeRange"=>"01:32-01:45",
            "content"=>"It expanded very fast to many territories throughout the world. It dominated a large part of world trade and effectively controlled the economies of many regions.",
            "text"=>array("type"=>"audio","text"=>"Why did Britain dominate a large part of world trade?","media_filename"=>'media/u9pcq.mp3',"timeRange"=>"00:52-00:57"),
            "scores"=>7,
            "items"=>array(
                "0"=>array("item"=>"Because of Industrial Revolution, it expanded very fast to many territories throughout the world.","isCorrect"=>true),
                "1"=>array("item"=>"Because it was an empire.", "isCorrect"=>false),
                "2"=>array("item"=>"Because it was the largest country in the world.", "isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_listen_001.png"
        );

        $data['events'][] = array(
            "num"=>"6",
            "content_id"=>1616,
            "type"=>"MTmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u9p_original_mt.mp3',
            "timeRange"=>"02:19-02:36",
            "content"=>"Now the UK has become more attractive. More and more students choose to go to the UK for higher education. With its long history and rich culture, it has become one of the most popular tourism destinations.",
            "text"=>array("type"=>"audio","text"=>"Why do more and more students go to the UK?","media_filename"=>'media/u9pcq.mp3',"timeRange"=>"01:22-01:26"),
            "scores"=>7,
            "items"=>array(
                "0"=>array("item"=>"For tourism.","isCorrect"=>false),
                "1"=>array("item"=>"For higher education.", "isCorrect"=>true),
                "2"=>array("item"=>"For better jobs.", "isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_listen_001.png"
        );

        $data['events'][] = array(
            "num"=>"7",
            "content_id"=>1617,
            "type"=>"MTmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u9d_original_mt.mp3',
            "timeRange"=>"00:12-00:22",
            "content"=>"Tom: You have chemistry 1 now, right?Bob: Basic stuff.Tom: I've heard that Mr. James is a good physics teacher. Hasn't he given you any help?",
            "text"=>array("type"=>"audio","text"=>"What did Bob learn from chemistry 1 this semester?","media_filename"=>'media/u9dcq.mp3',"timeRange"=>"00:36-00:40"),
            "scores"=>7,
            "items"=>array(
                "0"=>array("item"=>"Basic knowledge.","isCorrect"=>true),
                "1"=>array("item"=>"Advanced materials.", "isCorrect"=>false),
                "2"=>array("item"=>"Not mentioned.", "isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_listen_001.png"
        );

        $data['events'][] = array(
            "num"=>"8",
            "content_id"=>1618,
            "type"=>"MTmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u9d_original_mt.mp3',
            "timeRange"=>"00:46-00:58",
            "content"=>"Bob: He is more like an actor than a serious, straight-faced teacher. He always asks questions, interacts with us, and encourages us, even though we might not answer his questions correctly. ",
            "text"=>array("type"=>"audio","text"=>"What kind of teachers does Bob like?","media_filename"=>'media/u9dcq.mp3',"timeRange"=>"01:23-01:26"),
            "scores"=>7,
            "items"=>array(
                "0"=>array("item"=>"Those who are serious but always encourage students to be better.","isCorrect"=>false),
                "1"=>array("item"=>"Those who are patient and interact with students enthusiastically.", "isCorrect"=>true),
                "2"=>array("item"=>"Those who are straight-faced and never make students want to sleep.", "isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_listen_001.png"
        );

        $data['events'][] = array(
            "num"=>"9",
            "content_id"=>1619,
            "type"=>"MTmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u9d_original_mt.mp3',
            "timeRange"=>"01:05-01:14",
            "content"=>"Bob: Joe is nice, but he seems to only teach the book. He just does one-way talk. No questions, no interactions. I often get lost. ",
            "text"=>array("type"=>"audio","text"=>"In what way is the physics teacher different from the chemistry teacher?","media_filename"=>'media/u9dcq.mp3',"timeRange"=>"01:52-01:57"),
            "scores"=>7,
            "items"=>array(
                "0"=>array("item"=>"The chemistry teacher is nice but the physics teacher is serious.","isCorrect"=>false),
                "1"=>array("item"=>"The chemistry teacher seldom interacts with students.", "isCorrect"=>true),
                "2"=>array("item"=>"The chemistry teacher always asks questions.", "isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_listen_001.png"
        );

        $data['events'][] = array(
            "num"=>"10",
            "content_id"=>1620,
            "type"=>"MTmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u9d_original_mt.mp3',
            "timeRange"=>"01:14-01:31",
            "content"=>"Tom: Nick was very patient and caring. He gave very detailed and clear instructions about how to perform each experiment. He never just stood there. He always walked around. You could ask him any stupid questions and he always answered seriously. ",
            "text"=>array("type"=>"audio","text"=>"What did Nick do when his students had class in the lab?","media_filename"=>'media/u9dcq.mp3',"timeRange"=>"02:18-02:23"),
            "scores"=>7,
            "items"=>array(
                "0"=>array("item"=>"He gave very detailed instructions about how to perform each experiment.","isCorrect"=>true),
                "1"=>array("item"=>"He was patient and caring.", "isCorrect"=>false),
                "2"=>array("item"=>"He just stood there and answered questions.", "isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_listen_001.png"
        );


         $this->saveEventListToDatabases($data);$a =  json_encode($data);
        $fp = fopen('json251.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
        return;
    }

    public function getPart252(){
        $data = array(
            "unit_id"       =>26,
            "lesson_id"     =>84,
            "part_id"       =>252,
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
            "content_id"=>1621,
            "type"=>"SRmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u9p_original_mt.mp3',
            "timeRange"=>"00:40-00:51",
            "content"=>"The United Kingdom has a long and very complicated history. Its first inhabitants can be traced back to over 3000 years ago. ",
            "text"=>array("type"=>"audio","text"=>"How far can Britain's first settlers date back to?","media_filename"=>'media/u9pcq.mp3',"timeRange"=>"00:30-00:34"),
            "scores"=>4,
            "items"=>array(
                "0"=>array("item"=>"Less than 3 thousand years.","answer"=>"Less than 3 thousand years","isCorrect"=>false),
                "1"=>array("item"=>"More than 3 thousand years.","answer"=>"More than 3 thousand years", "isCorrect"=>true),
                "2"=>array("item"=>"Over 2 thousand years.","answer"=>"Over 2 thousand years", "isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"2",
            "content_id"=>1622,
            "type"=>"SRmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u9p_original_mt.mp3',
            "timeRange"=>"01:22-01:32",
            "content"=>"In the early 19th century, the country led the famous Industrial Revolution. Later, it developed into an empire.",
            "text"=>array("type"=>"audio","text"=>"When did the United Kingdom lead the Industrial Revolution?","media_filename"=>'media/u9pcq.mp3',"timeRange"=>"00:48-00:52"),
            "scores"=>4,
            "items"=>array(
                "0"=>array("item"=>"In the early 18th century.","answer"=>"In the early 18th century","isCorrect"=>false),
                "1"=>array("item"=>"In the early 19th century.", "answer"=>"In the early 19th century","isCorrect"=>true),
                "2"=>array("item"=>"In the late 18th century.", "answer"=>"In the late 18th century","isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"3",
            "content_id"=>1623,
            "type"=>"SRmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u9p_original_mt.mp3',
            "timeRange"=>"02:01-02:19",
            "content"=>"The UK used to be a member of the European Union. However, as time went on, more and more people thought they should quit the European Union. In 2016, the United Kingdom voted to leave the EU.",
            "text"=>array("type"=>"audio","text"=>"Which statement is true?","media_filename"=>'media/u9pcq.mp3',"timeRange"=>"01:16-01:18"),
            "scores"=>4,
            "items"=>array(
                "0"=>array("item"=>"The UK is a member of the European Union.","answer"=>"The UK is a member of the European Union","isCorrect"=>false),
                "1"=>array("item"=>"The UK is no longer a member of the European Union.", "answer"=>"The UK is no longer a member of the European Union","isCorrect"=>true),
                "2"=>array("item"=>"In 2016, the United Kingdom voted to remain in the EU.", "answer"=>"In 2016, the United Kingdom voted to remain in the EU","isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"4",
            "content_id"=>1624,
            "type"=>"SRmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u9d_original_mt.mp3',
            "timeRange"=>"00:36-00:46",
            "content"=>"Bob: Mr. James is hilarious. He is completely different from other teachers. He doesn't just stand at the front and talk about the course. He performs for every lesson. ",
            "text"=>array("type"=>"audio","text"=>"What does James do every lesson?","media_filename"=>'media/u9dcq.mp3',"timeRange"=>"01:06-01:09"),
            "scores"=>4,
            "items"=>array(
                "0"=>array("item"=>"He demonstrates every lesson.","answer"=>"He demonstrates every lesson","isCorrect"=>true),
                "1"=>array("item"=>"He lectures every lesson.","answer"=>"He lectures every lesson", "isCorrect"=>false),
                "2"=>array("item"=>"He shows every lesson.","answer"=>"He shows every lesson", "isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"5",
            "content_id"=>1625,
            "type"=>"SRmultipleChoice",
            "media_type"=>"audio",
            "media_filename"=>'media/u9d_original_mt.mp3',
            "timeRange"=>"00:58-01:05",
            "content"=>"Bob: He's always lively and enthusiastic. Unlike in other classes, his voice never makes me want to sleep. ",
            "text"=>array("type"=>"audio","text"=>"Why doesn't Bob want to sleep in physics?","media_filename"=>'media/u9dcq.mp3',"timeRange"=>"01:09-01:13"),
            "scores"=>4,
            "items"=>array(
                "0"=>array("item"=>"Because his teacher makes the classes very vivid and interesting.","answer"=>"Because his teacher makes the classes very vivid and interesting","isCorrect"=>true),
                "1"=>array("item"=>"Because his teacher is very serious and strict.","answer"=>"Because his teacher is very serious and strict", "isCorrect"=>false),
                "2"=>array("item"=>"Because his teacher always asks them questions.","answer"=>"Because his teacher always asks them questions", "isCorrect"=>false),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_speak_001.png"
        );

         $this->saveEventListToDatabases($data);$a =  json_encode($data);
        $fp = fopen('json252.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
        return;
    }

    public function getPart253(){
        $data = array(
            "unit_id"       =>26,
            "lesson_id"     =>84,
            "part_id"       =>253,
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
            "content_id"=>1626,
            "media_filename"=>'media/u9gfi.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"00:41-00:47",
            "scores"=>5,
            "text" => "My English teacher told us that life is like a roller coaster, because it has ups and downs.  ",
            "answer" => "My English teacher told us that life is like a roller coaster because it has ups and downs",
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"2",
            "content_id"=>1627,
            "media_filename"=>'media/u9gfi.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"00:51-00:56",
            "scores"=>5,
            "text" => "I was wondering if you could take care of my cat until I come back this Sunday. ",
            "answer" => "I was wondering if you could take care of my cat until I come back this Sunday",
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"3",
            "content_id"=>1628,
            "media_filename"=>'media/u9gso.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"00:16-00:21",
            "scores"=>5,
            "text" => "If we do nothing, the oceans will turn into deserts eventually.",
            "answer" => "If we do nothing, the oceans will turn into deserts eventually",
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"4",
            "content_id"=>1629,
            "media_filename"=>'media/u9gso.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"01:07-01:12",
            "scores"=>5,
            "text"   => "You should decide on your own, so I won't provide any advice.",
            "answer" => "You should decide on your own so I won't provide any advice",
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"5",
            "content_id"=>1630,
            "media_filename"=>'media/u9gsf.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"00:00-00:04",
            "scores"=>5,
            "text" => "Sorry, I didn't realize I was sitting in your seat. ",
            "answer" => "Sorry I didn't realize I was sitting in your seat. ",
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_speak_001.png"
        );

        $data['events'][] = array(
            "num"=>"6",
            "content_id"=>1631,
            "media_filename"=>'media/u9gsf.mp3',
            "media_type"    =>'audio',
            'type'          =>"sr_repetition",
            "timeRange"     =>"00:39-00:43",
            "scores"=>5,
            "text" => "I'm afraid your plan won't be fulfilled.",
            "answer" => "I'm afraid your plan won't be fulfilled",
            "selectEvents"=>array(
            ),
            "picture"=>"images/type_speak_001.png"
        );

         $this->saveEventListToDatabases($data);$a =  json_encode($data);
        $fp = fopen('json253.txt',"w");
        fwrite($fp,$a);
        fclose($fp);
        return;
    }

    public function createJson(){
        for($i=237;$i<=253;$i++){
            $function = "getPart".$i;
            $this->$function();
        }
    }


}
