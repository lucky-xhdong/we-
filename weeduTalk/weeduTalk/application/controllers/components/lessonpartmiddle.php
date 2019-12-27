<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lessonpartmiddle extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('lessonpart');
    }


    public function getPart271()
    {
        $data = array(
            "level_id" => 7,
            "unit_id" => 27,
            "lesson_id" => 89,
            "part_id" => 271,
            "play_type" => "auto",
            "eng" => false
        );


        $data['events'][] = array(
            "num"=>"1",
            "content_id"=>1695,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"read_and_click_fill_in",
            "timeRange"     =>"",
            "scores"=>10,
            "text" => "Tony is my friend. _ likes reading books.",
            "answer"=>"Tony is my friend. He likes reading books.",
            "items" => array(
                "0"=>array("item"=>"He","isCorrect"=>true),
                "1"=>array("item"=>"She", "isCorrect"=>false),
                "2"=>array("item"=>"It", "isCorrect"=>false),
                "3"=>array("item"=>"They", "isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1_gfi.mp3',
                    "timeRange"     =>"00:00:000-00:04:000",
                    "text" => "Tony is my friend. He likes reading books.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1_gfi.mp3',
                    "timeRange"     =>"00:00:000-00:04:000",
                    "text" => "Tony is my friend. He likes reading books.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"2",
            "content_id"=>1696,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"read_and_click_fill_in",
            "timeRange"     =>"",
            "scores"=>10,
            "text" => "Our biography teacher has lunch with _ every day.",
            "answer"=>"Our biography teacher has lunch with us every day.",
            "items" => array(
                "0"=>array("item"=>"we","isCorrect"=>false),
                "1"=>array("item"=>"they", "isCorrect"=>false),
                "2"=>array("item"=>"he", "isCorrect"=>false),
                "3"=>array("item"=>"us", "isCorrect"=>true),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1_gfi.mp3',
                    "timeRange"     =>"00:04:000-00:08:000",
                    "text" => "Our biography teacher has lunch with us every day.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1_gfi.mp3',
                    "timeRange"     =>"00:04:000-00:08:000",
                    "text" => "Our biography teacher has lunch with us every day.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"3",
            "content_id"=>1697,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"read_and_click_fill_in",
            "timeRange"     =>"",
            "scores"=>10,
            "text" => "Lily is very kind. _ often helps _ with my math after school.",
            "answer"=>"Lily is very kind. She often helps me with my math after school.",
            "items" => array(
                "0"=>array("item"=>"She","isCorrect"=>true),
                "1"=>array("item"=>"me", "isCorrect"=>true),
                "2"=>array("item"=>"Her", "isCorrect"=>false),
                "3"=>array("item"=>"I", "isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"     =>"audio",
                    "media_filename" =>'media/u1_gfi.mp3',
                    "timeRange"      =>"00:08:000-00:13:000",
                    "text"           => "Lily is very kind. She often helps me with my math after school.",
                ),
                "No"=>array(
                    "media_type"        =>"audio",
                    "media_filename"    =>'media/u1_gfi.mp3',
                    "timeRange"         =>"00:08:000-00:13:000",
                    "text"              => "Lily is very kind. She often helps me with my math after school.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $a = json_encode($data);
        $fp = fopen('json271.txt', "w");
        fwrite($fp, $a);
        fclose($fp);
        return;
    }


    public function getPart272()
    {
        $data = array(
            "level_id" => 7,
            "unit_id" => 27,
            "lesson_id" => 89,
            "part_id" => 272,
            "play_type" => "auto",
            "eng" => false
        );


        $data['events'][] = array(
            "num"=>"1",
            "content_id"=>1698,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"read_and_click_sentence_formation",
            "timeRange"     =>"",
            "scores"=>10,
            "text" => "Tony gets on the school bus at 7:00 in the morning.",
            "answer"=>"Tony gets on the school bus at 7:00 in the morning.",
            "items" => array(
                "0"=>array("item"=>"Tony","isCorrect"=>true),
                "1"=>array("item"=>"gets on", "isCorrect"=>true),
                "2"=>array("item"=>"the school bus", "isCorrect"=>true),
                "3"=>array("item"=>"at 7:00", "isCorrect"=>true),
                "4"=>array("item"=>"in the morning.", "isCorrect"=>true),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1_gsf.mp3',
                    "timeRange"     =>"00:00:000-00:05:000",
                    "text" => "Tony gets on the school bus at 7:00 in the morning.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1_gsf.mp3',
                    "timeRange"     =>"00:00:000-00:05:000",
                    "text" => "Tony gets on the school bus at 7:00 in the morning.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"2",
            "content_id"=>1699,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"read_and_click_sentence_formation",
            "timeRange"     =>"",
            "scores"=>10,
            "text" => "My parents cook the dinner together after they come home from work.",
            "answer"=>"My parents cook the dinner together after they come home from work.",
            "items" => array(
                "0"=>array("item"=>"My parents","isCorrect"=>true),
                "1"=>array("item"=>"cook the dinner together", "isCorrect"=>true),
                "2"=>array("item"=>"after", "isCorrect"=>true),
                "3"=>array("item"=>"they come home", "isCorrect"=>true),
                "4"=>array("item"=>" from work.", "isCorrect"=>true),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1_gsf.mp3',
                    "timeRange"     =>"00:05:000-00:11:000",
                    "text" => "My parents cook the dinner together after they come home from work.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1_gsf.mp3',
                    "timeRange"     =>"00:05:000-00:11:000",
                    "text" => "My parents cook the dinner together after they come home from work.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"3",
            "content_id"=>1700,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"read_and_click_sentence_formation",
            "timeRange"     =>"",
            "scores"=>10,
            "text" => "Lily and I go to the cinema on Sundays.",
            "answer"=>"Lily and I go to the cinema on Sundays.",
            "items" => array(
                "0"=>array("item"=>"Lily and I","isCorrect"=>true),
                "1"=>array("item"=>"go to the cinema", "isCorrect"=>true),
                "2"=>array("item"=>"on Sundays.", "isCorrect"=>true),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"     =>"audio",
                    "media_filename" =>'media/u1_gsf.mp3',
                    "timeRange"      =>"00:11:000-00:16:000",
                    "text" => "Lily and I go to the cinema on Sundays.",
                ),
                "No"=>array(
                    "media_type"     =>"audio",
                    "media_filename" =>'media/u1_gsf.mp3',
                    "timeRange"      =>"00:11:000-00:16:000",
                    "text" => "Lily and I go to the cinema on Sundays.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $a = json_encode($data);
        $fp = fopen('json272.txt', "w");
        fwrite($fp, $a);
        fclose($fp);
        return;
    }


    public function getPart273()
    {
        $data = array(
            "level_id" => 7,
            "unit_id" => 27,
            "lesson_id" => 89,
            "part_id" => 273,
            "play_type" => "auto",
            "eng" => false
        );


        $data['events'][] = array(
            "num"=>"1",
            "content_id"=>1701,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"read_and_click_cloze",
            "timeRange"     =>"",
            "scores"=>10,
            "text" => "I usually _ at 7 and have breakfast at home.I _ before 8:00 and do the morning reading.We have _ every day from 8:30 to 16:00.At 10:00, we have _ and play sports on the field.We _ at 12:00 in the dining hall.",
            "answer"=>"I usually get up at 7 and have breakfast at home. I get to school before 8:00 and do the morning reading. We have seven lessons every day from 8:30 to 16:00. At 10:00, we have a long break and play sports on the field. We have lunch at 12:00 in the dining hall.",
            "items" => array(
                "0"=>array("item"=>"get up","isCorrect"=>true),
                "1"=>array("item"=>"get to school", "isCorrect"=>true),
                "2"=>array("item"=>"seven lessons", "isCorrect"=>true),
                "3"=>array("item"=>"a long break", "isCorrect"=>true),
                "4"=>array("item"=>"have lunch", "isCorrect"=>true),
            ),
            "selectEvents"=>array(

            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"2",
            "content_id"=>1702,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"read_and_click_cloze",
            "timeRange"     =>"",
            "scores"=>10,
            "text" => "This semester Tony has _ : Chinese, math, English, history, geography, biology, music, art, PE and IT.In America there’s one more - STEAM.He likes PE best and Lily’s favorite is _ . Each class lasts _ .There’s a 10-minute break _ each class. In America, only 3 minutes.Both _ classrooms.",
            "answer"=>"This semester Tony has ten subjects: Chinese, math, English, history, geography, biology, music, art, PE and IT.In America there’s one more - STEAM.He likes PE best and Lily’s favorite is music.Each class lasts forty minutes.There’s a 10-minute break between each class.In America, only 3 minutes.Both change classrooms.",
            "items" => array(
                "0"=>array("item"=>"ten subjects","isCorrect"=>true),
                "1"=>array("item"=>"music", "isCorrect"=>true),
                "2"=>array("item"=>"forty minutes", "isCorrect"=>true),
                "3"=>array("item"=>"between", "isCorrect"=>true),
                "4"=>array("item"=>"change", "isCorrect"=>true),
            ),
            "selectEvents"=>array(

            ),
            "picture"=>"images/type_click_001.png"
        );


        $a = json_encode($data);
        $fp = fopen('json273.txt', "w");
        fwrite($fp, $a);
        fclose($fp);
        return;
    }



    public function getPart274()
    {
        $data = array(
            "level_id" => 7,
            "unit_id" => 27,
            "lesson_id" => 89,
            "part_id" => 274,
            "play_type" => "auto",
            "eng" => false
        );


        $data['events'][] = array(
            "num"=>"1",
            "content_id"=>1703,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"read_and_speak_fill_in_sr",
            "timeRange"     =>"",
            "scores"=>10,
            "text" => "Tony is my friend. _ likes reading books.",
            "answer"=>"Tony is my friend. He likes reading books.",
            "items" => array(
                "0"=>array("item"=>"He","isCorrect"=>true),
                "1"=>array("item"=>"She", "isCorrect"=>false),
                "2"=>array("item"=>"It", "isCorrect"=>false),
                "3"=>array("item"=>"They", "isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1_gfi.mp3',
                    "timeRange"     =>"00:00:000-00:04:000",
                    "text" => "Tony is my friend. He likes reading books.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1_gfi.mp3',
                    "timeRange"     =>"00:00:000-00:04:000",
                    "text" => "Tony is my friend. He likes reading books.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"2",
            "content_id"=>1704,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"read_and_speak_fill_in_sr",
            "timeRange"     =>"",
            "scores"=>10,
            "text" => "Our biography teacher has lunch with _ every day.",
            "answer"=>"Our biography teacher has lunch with us every day.",
            "items" => array(
                "0"=>array("item"=>"we","isCorrect"=>false),
                "1"=>array("item"=>"they", "isCorrect"=>false),
                "2"=>array("item"=>"he", "isCorrect"=>false),
                "3"=>array("item"=>"us", "isCorrect"=>true),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1_gfi.mp3',
                    "timeRange"     =>"00:04:000-00:08:000",
                    "text" => "Our biography teacher has lunch with us every day.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1_gfi.mp3',
                    "timeRange"     =>"00:04:000-00:08:000",
                    "text" => "Our biography teacher has lunch with us every day.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"3",
            "content_id"=>1705,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"read_and_speak_fill_in_sr",
            "timeRange"     =>"",
            "scores"=>10,
            "text" => "Lily is very kind. _ often helps _ with my math after school.",
            "answer"=>"Lily is very kind. She often helps me with my math after school.",
            "items" => array(
                "0"=>array("item"=>"She","isCorrect"=>true),
                "1"=>array("item"=>"me", "isCorrect"=>true),
                "2"=>array("item"=>"Her", "isCorrect"=>false),
                "3"=>array("item"=>"I", "isCorrect"=>false),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"     =>"audio",
                    "media_filename" =>'media/u1_gfi.mp3',
                    "timeRange"      =>"00:08:000-00:13:000",
                    "text"           => "Lily is very kind. She often helps me with my math after school.",
                ),
                "No"=>array(
                    "media_type"        =>"audio",
                    "media_filename"    =>'media/u1_gfi.mp3',
                    "timeRange"         =>"00:08:000-00:13:000",
                    "text"              => "Lily is very kind. She often helps me with my math after school.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $a = json_encode($data);
        $fp = fopen('json274.txt', "w");
        fwrite($fp, $a);
        fclose($fp);
        return;
    }


    public function getPart275()
    {
        $data = array(
            "level_id" => 7,
            "unit_id" => 27,
            "lesson_id" => 89,
            "part_id" => 275,
            "play_type" => "auto",
            "eng" => false
        );


        $data['events'][] = array(
            "num"=>"1",
            "content_id"=>1706,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"read_and_speak_sentence_formation_sr",
            "timeRange"     =>"",
            "scores"=>10,
            "text" => "Tony gets on the school bus at 7:00 in the morning.",
            "answer"=>"Tony gets on the school bus at 7:00 in the morning.",
            "items" => array(
                "0"=>array("item"=>"Tony","isCorrect"=>true),
                "1"=>array("item"=>"gets on", "isCorrect"=>true),
                "2"=>array("item"=>"the school bus", "isCorrect"=>true),
                "3"=>array("item"=>"at 7:00", "isCorrect"=>true),
                "4"=>array("item"=>"in the morning.", "isCorrect"=>true),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1_gsf.mp3',
                    "timeRange"     =>"00:00:000-00:05:000",
                    "text" => "Tony gets on the school bus at 7:00 in the morning.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1_gsf.mp3',
                    "timeRange"     =>"00:00:000-00:05:000",
                    "text" => "Tony gets on the school bus at 7:00 in the morning.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"2",
            "content_id"=>1707,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"read_and_speak_sentence_formation_sr",
            "timeRange"     =>"",
            "scores"=>10,
            "text" => "My parents cook the dinner together after they come home from work.",
            "answer"=>"My parents cook the dinner together after they come home from work.",
            "items" => array(
                "0"=>array("item"=>"My parents","isCorrect"=>true),
                "1"=>array("item"=>"cook the dinner together", "isCorrect"=>true),
                "2"=>array("item"=>"after", "isCorrect"=>true),
                "3"=>array("item"=>"they come home", "isCorrect"=>true),
                "4"=>array("item"=>" from work.", "isCorrect"=>true),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1_gsf.mp3',
                    "timeRange"     =>"00:05:000-00:11:000",
                    "text" => "My parents cook the dinner together after they come home from work.",
                ),
                "No"=>array(
                    "media_type"=>"audio",
                    "media_filename"=>'media/u1_gsf.mp3',
                    "timeRange"     =>"00:05:000-00:11:000",
                    "text" => "My parents cook the dinner together after they come home from work.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"3",
            "content_id"=>1708,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"read_and_speak_sentence_formation_sr",
            "timeRange"     =>"",
            "scores"=>10,
            "text" => "Lily and I go to the cinema on Sundays.",
            "answer"=>"Lily and I go to the cinema on Sundays.",
            "items" => array(
                "0"=>array("item"=>"Lily and I","isCorrect"=>true),
                "1"=>array("item"=>"go to the cinema", "isCorrect"=>true),
                "2"=>array("item"=>"on Sundays.", "isCorrect"=>true),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "media_type"     =>"audio",
                    "media_filename" =>'media/u1_gsf.mp3',
                    "timeRange"      =>"00:11:000-00:16:000",
                    "text" => "Lily and I go to the cinema on Sundays.",
                ),
                "No"=>array(
                    "media_type"     =>"audio",
                    "media_filename" =>'media/u1_gsf.mp3',
                    "timeRange"      =>"00:11:000-00:16:000",
                    "text" => "Lily and I go to the cinema on Sundays.",
                ),
            ),
            "picture"=>"images/type_click_001.png"
        );

        $a = json_encode($data);
        $fp = fopen('json275.txt', "w");
        fwrite($fp, $a);
        fclose($fp);
        return;
    }


    public function getPart276()
    {
        $data = array(
            "level_id" => 7,
            "unit_id" => 27,
            "lesson_id" => 89,
            "part_id" => 276,
            "play_type" => "auto",
            "eng" => false
        );


        $data['events'][] = array(
            "num"=>"1",
            "content_id"=>1709,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"read_and_speak_cloze_sr",
            "timeRange"     =>"",
            "scores"=>10,
            "text" => "I usually _ at 7 and have breakfast at home.I _ before 8:00 and do the morning reading.We have _ every day from 8:30 to 16:00.At 10:00, we have _ and play sports on the field.We _ at 12:00 in the dining hall.",
            "answer"=>"I usually get up at 7 and have breakfast at home. I get to school before 8:00 and do the morning reading. We have seven lessons every day from 8:30 to 16:00. At 10:00, we have a long break and play sports on the field. We have lunch at 12:00 in the dining hall.",
            "items" => array(
                "0"=>array("item"=>"get up","isCorrect"=>true),
                "1"=>array("item"=>"get to school", "isCorrect"=>true),
                "2"=>array("item"=>"seven lessons", "isCorrect"=>true),
                "3"=>array("item"=>"a long break", "isCorrect"=>true),
                "4"=>array("item"=>"have lunch", "isCorrect"=>true),
            ),
            "selectEvents"=>array(

            ),
            "picture"=>"images/type_click_001.png"
        );

        $data['events'][] = array(
            "num"=>"2",
            "content_id"=>1710,
            "media_filename"=>'',
            "media_type"    =>'audio',
            'type'          =>"read_and_speak_cloze_sr",
            "timeRange"     =>"",
            "scores"=>10,
            "text" => "This semester Tony has _ : Chinese, math, English, history, geography, biology, music, art, PE and IT.In America there’s one more - STEAM.He likes PE best and Lily’s favorite is _ . Each class lasts _ .There’s a 10-minute break _ each class. In America, only 3 minutes.Both _ classrooms.",
            "answer"=>"This semester Tony has ten subjects: Chinese, math, English, history, geography, biology, music, art, PE and IT.In America there’s one more - STEAM.He likes PE best and Lily’s favorite is music.Each class lasts forty minutes.There’s a 10-minute break between each class.In America, only 3 minutes.Both change classrooms.",
            "items" => array(
                "0"=>array("item"=>"ten subjects","isCorrect"=>true),
                "1"=>array("item"=>"music", "isCorrect"=>true),
                "2"=>array("item"=>"forty minutes", "isCorrect"=>true),
                "3"=>array("item"=>"between", "isCorrect"=>true),
                "4"=>array("item"=>"change", "isCorrect"=>true),
            ),
            "selectEvents"=>array(

            ),
            "picture"=>"images/type_click_001.png"
        );


        $a = json_encode($data);
        $fp = fopen('json276.txt', "w");
        fwrite($fp, $a);
        fclose($fp);
        return;
    }

    public function createJson(){
        for($i=271;$i<=276;$i++){
            $function = "getPart".$i;
            $this->$function();
        }
    }



    //
    //passages reading(SR) items 全部显示
    public function getPartX()
    {
        $data = array(
            "level_id" => 1,
            "unit_id" => 9,
            "lesson_id" => 72,
            "part_id" => 179,
            "play_type" => "auto",
            "eng" => false
        );

        $data['systems'][] = array(
            "num" => "1",
            'type' => "look_and_listen",
            "timeRange" => "00:37:242-00:39:050",
            "text" => "Let's chant!",
            "media_filename" => 'media/WG_system.mp3',
            "clickEvents" => array(),
            "childEvents" => array(),
            "selectEvents" => array(),
            "media_type" => 'audio',
            "picture" => "",
            "pictures" => array()
        );

        $data['events'][] = array(
            "num"       => "2",
            'type'      => "passages_reading_sr",
            "timeRange" => "00:00:000-00:28:009",
            "text"      => "This is Jack Smith.This is Jack Smith. This is Jack Smith. 60 This is Jack Smith. This is Jack Smith.",
            "items"     =>array(
                0=>array("content_id"=>1,"text"=>"This is Jack Smith.This is Jack Smith.","timeRange"=> "00:00-00:03","media_filename" =>'media/WG_u1_chant.mp3',"media_type" =>'audio'),
                1=>array("content_id"=>1,"text"=>"This is Jack Smith","timeRange"=> "00:00-00:03","media_filename" =>'media/WG_u1_chant.mp3',"media_type" =>'audio'),
                2=>array("content_id"=>1,"text"=>"60 This is Jack Smith","timeRange"=> "00:00-00:03","media_filename" =>'media/WG_u1_chant.mp3',"media_type" =>'audio'),
                3=>array("content_id"=>1,"text"=>"This is Jack Smith","timeRange"=> "00:00-00:03","media_filename" =>'media/WG_u1_chant.mp3',"media_type" =>'audio'),
            ),
            "scores"=>10,
            "media_filename" => 'media/WG_u1_chant.mp4',
            "clickEvents" => array(
                "click_1"=>array(
                    "type"=>"read",
                    "childEvents"     =>array(
                        "0"=>array(
                            "type"=>"sr" //语音识别
                        )
                    ),
                ),
            ),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"sr" //语音识别
                )
            ),
            "selectEvents" => array(),
            "media_type" => 'video',
            "picture" => "",
            "pictures" => array()
        );


        $a = json_encode($data);
        $fp = fopen('json179.txt', "w");
        fwrite($fp, $a);
        fclose($fp);
        return;
    }


    //
    //passages reading(SR) items 全部显示
    public function getPartY()
    {
        $data = array(
            "level_id" => 1,
            "unit_id" => 9,
            "lesson_id" => 72,
            "part_id" => 179,
            "play_type" => "auto",
            "eng" => false
        );

        $data['systems'][] = array(
            "num" => "1",
            'type' => "dialog_reading_sr",
            "timeRange" => "00:37:242-00:39:050",
            "text" => "Let's chant!",
            "media_filename" => 'media/WG_system.mp3',
            "clickEvents" => array(),
            "childEvents" => array(),
            "selectEvents" => array(),
            "media_type" => 'audio',
            "picture" => "",
            "pictures" => array()
        );

        $data['events'][] = array(
            "num"       => "2",
            'type'      => "dialog_reading_sr",
            "timeRange" => "00:00:000-00:28:009",
            "text"      => "This is Jack Smith.This is Jack Smith. This is Jack Smith. 60 This is Jack Smith. This is Jack Smith.",
            "items"     =>array(
                0=>array("content_id"=>1,"text"=>"This is Jack Smith.This is Jack Smith.","timeRange"=> "00:00-00:03","media_filename" =>'media/WG_u1_chant.mp3',"media_type" =>'audio'),
                1=>array("content_id"=>1,"text"=>"This is Jack Smith","timeRange"=> "00:00-00:03","media_filename" =>'media/WG_u1_chant.mp3',"media_type" =>'audio'),
                2=>array("content_id"=>1,"text"=>"60 This is Jack Smith","timeRange"=> "00:00-00:03","media_filename" =>'media/WG_u1_chant.mp3',"media_type" =>'audio'),
                3=>array("content_id"=>1,"text"=>"This is Jack Smith","timeRange"=> "00:00-00:03","media_filename" =>'media/WG_u1_chant.mp3',"media_type" =>'audio'),
            ),
            "role"=>"John",
            "scores"=>10,
            "media_filename" => 'media/WG_u1_chant.mp4',
            "clickEvents" => array(
                "click_1"=>array(
                    "type"=>"read",
                    "childEvents"     =>array(
                        "0"=>array(
                            "type"=>"sr" //语音识别
                        )
                    ),
                ),
            ),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"sr" //语音识别
                )
            ),
            "selectEvents" => array(),
            "media_type" => 'video',
            "picture" => "",
            "pictures" => array()
        );

        $data['events'][] = array(
            "num"       => "2",
            'type'      => "passages_reading_sr",
            "timeRange" => "00:00:000-00:28:009",
            "text"      => "This is Jack Smith.This is Jack Smith. This is Jack Smith. 60 This is Jack Smith. This is Jack Smith.",
            "items"     =>array(
                0=>array("content_id"=>1,"text"=>"This is Jack Smith.This is Jack Smith.","timeRange"=> "00:00-00:03","media_filename" =>'media/WG_u1_chant.mp3',"media_type" =>'audio'),
                1=>array("content_id"=>1,"text"=>"This is Jack Smith","timeRange"=> "00:00-00:03","media_filename" =>'media/WG_u1_chant.mp3',"media_type" =>'audio'),
                2=>array("content_id"=>1,"text"=>"60 This is Jack Smith","timeRange"=> "00:00-00:03","media_filename" =>'media/WG_u1_chant.mp3',"media_type" =>'audio'),
                3=>array("content_id"=>1,"text"=>"This is Jack Smith","timeRange"=> "00:00-00:03","media_filename" =>'media/WG_u1_chant.mp3',"media_type" =>'audio'),
            ),
            "role"=>"Lily",
            "scores"=>10,
            "media_filename" => 'media/WG_u1_chant.mp4',
            "clickEvents" => array(
                "click_1"=>array(
                    "type"=>"read",
                    "childEvents"     =>array(
                        "0"=>array(
                            "type"=>"sr" //语音识别
                        )
                    ),
                ),
            ),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"sr" //语音识别
                )
            ),
            "selectEvents" => array(),
            "media_type" => 'video',
            "picture" => "",
            "pictures" => array()
        );


        $a = json_encode($data);
        $fp = fopen('json179.txt', "w");
        fwrite($fp, $a);
        fclose($fp);
        return;
    }


    //dialog_interaction_sr items 全部显示
    public function getPartZ()
    {
        $data = array(
            "level_id" => 1,
            "unit_id" => 9,
            "lesson_id" => 72,
            "part_id" => 179,
            "play_type" => "auto",
            "eng" => false
        );

        $data['systems'][] = array(
            "num" => "1",
            'type' => "dialog_interaction_sr",
            "timeRange" => "00:37:242-00:39:050",
            "text" => "Let's chant!",
            "media_filename" => 'media/WG_system.mp3',
            "clickEvents" => array(),
            "childEvents" => array(),
            "selectEvents" => array(),
            "media_type" => 'audio',
            "picture" => "",
            "pictures" => array()
        );

        $data['events'][] = array(
            "num"       => "2",
            'type'      => "dialog_interaction_sr",
            "timeRange" => "00:00:000-00:28:009",
            "text"      => "This is Jack Smith.This is Jack Smith. This is Jack Smith. 60 This is Jack Smith. This is Jack Smith.",
            "items"     =>array(
                0=>array("isCorrect"=>true,"text"=>"This is Jack Smith.This is Jack Smith.","timeRange"=> "00:00-00:03","media_filename" =>'media/WG_u1_chant.mp3',"media_type" =>'audio'),
                1=>array("isCorrect"=>false,"text"=>"This is Jack Smith","timeRange"=> "00:00-00:03","media_filename" =>'media/WG_u1_chant.mp3',"media_type" =>'audio'),
                2=>array("isCorrect"=>false,"text"=>"60 This is Jack Smith","timeRange"=> "00:00-00:03","media_filename" =>'media/WG_u1_chant.mp3',"media_type" =>'audio'),
            ),
            "role"=>"John",
            "scores"=>10,
            "media_filename" => 'media/WG_u1_chant.mp4',
            "clickEvents" => array(
            ),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"sr" //语音识别
                )
            ),
            "selectEvents" => array(
                "Yes"=>array(
                    "timeRange"          => "00:07-00:09",
                    "media_filename"     =>"media/WG_u1_grammar_p1.mp3",
                    "media_type"         => 'audio',
                    "text"              =>"It's a pencil.",
                ),
                "No"=>array(
                    "timeRange"          => "00:07-00:09",
                    "media_filename"     =>"media/WG_u1_grammar_p1.mp3",
                    "media_type"         => 'audio',
                    "text"              =>"It's a pencil.",
                ),
            ),
            "media_type" => 'video',
            "picture" => "",
            "pictures" => array()
        );

        $a = json_encode($data);
        $fp = fopen('json179.txt', "w");
        fwrite($fp, $a);
        fclose($fp);
        return;
    }



    //passage_repetition_sr items 全部显示
    public function getPartM()
    {
        $data = array(
            "level_id" => 1,
            "unit_id" => 9,
            "lesson_id" => 72,
            "part_id" => 179,
            "play_type" => "auto",
            "eng" => false
        );

        $data['systems'][] = array(
            "num" => "1",
            'type' => "passage_repetition_sr",
            "timeRange" => "00:37:242-00:39:050",
            "text" => "Let's chant!",
            "media_filename" => 'media/WG_system.mp3',
            "clickEvents" => array(),
            "childEvents" => array(),
            "selectEvents" => array(),
            "media_type" => 'audio',
            "picture" => "",
            "pictures" => array()
        );

        $data['events'][] = array(
            "num"       => "2",
            'type'      => "passage_repetition_sr",
            "timeRange" => "00:00:000-00:28:009",
            "text"      => "This is Jack Smith.This is Jack Smith. This is Jack Smith. 60 This is Jack Smith. This is Jack Smith.",
            "items"     =>array(
                0=>array("isCorrect"=>true,"text"=>"This is Jack Smith.This is Jack Smith.","timeRange"=> "00:00-00:03","media_filename" =>'media/WG_u1_chant.mp3',"media_type" =>'audio'),
                1=>array("isCorrect"=>false,"text"=>"This is Jack Smith","timeRange"=> "00:00-00:03","media_filename" =>'media/WG_u1_chant.mp3',"media_type" =>'audio'),
                2=>array("isCorrect"=>false,"text"=>"60 This is Jack Smith","timeRange"=> "00:00-00:03","media_filename" =>'media/WG_u1_chant.mp3',"media_type" =>'audio'),
            ),
            "role"=>"John",
            "scores"=>10,
            "media_filename" => 'media/WG_u1_chant.mp4',
            "clickEvents" => array(
            ),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"sr" //语音识别
                )
            ),
            "selectEvents" => array(
                "Yes"=>array(
                    "timeRange"          => "00:07-00:09",
                    "media_filename"     =>"media/WG_u1_grammar_p1.mp3",
                    "media_type"         => 'audio',
                    "text"              =>"It's a pencil.",
                ),
                "No"=>array(
                    "timeRange"          => "00:07-00:09",
                    "media_filename"     =>"media/WG_u1_grammar_p1.mp3",
                    "media_type"         => 'audio',
                    "text"              =>"It's a pencil.",
                ),
            ),
            "media_type" => 'video',
            "picture" => "",
            "pictures" => array()
        );

        $a = json_encode($data);
        $fp = fopen('json179.txt', "w");
        fwrite($fp, $a);
        fclose($fp);
        return;
    }




    //speech_sr items 全部显示
     //保存录音和语音听写文字.语音听写文字可编辑,可分开提交文字和录音或者同时提交
    //语音听写
    public function getPartD()
    {
        $data = array(
            "level_id" => 1,
            "unit_id" => 9,
            "lesson_id" => 72,
            "part_id" => 179,
            "play_type" => "auto",
            "eng" => false
        );

        $data['systems'][] = array(
            "num" => "1",
            'type' => "speech_sr",
            "timeRange" => "00:37:242-00:39:050",
            "text" => "Let's chant!",
            "media_filename" => 'media/WG_system.mp3',
            "clickEvents" => array(),
            "childEvents" => array(),
            "selectEvents" => array(),
            "media_type" => 'audio',
            "picture" => "",
            "pictures" => array()
        );

        $data['events'][] = array(
            "num"        => "2",
            'type'       => "speech_sr",
            "content_id" => 1516,
            "timeRange"  => "",
            "text"       => "",
            "role"       => "John",
            "timeLimit"  => 60,
            "scores"=>10,
            "media_filename" => 'media/WG_u1_chant.mp4',
            "clickEvents" => array(
            ),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"speech", //语音听写
                ),
            ),
            "selectEvents" => array(

            ),
            "media_type" => 'video',
            "picture" => "",
            "pictures" => array()
        );

        $a = json_encode($data);
        $fp = fopen('json179.txt', "w");
        fwrite($fp, $a);
        fclose($fp);
        return;
    }
}