<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lessonpartprimary extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('lessonpart');
    }

    //Lesson 1 chant
    //Look and Listen
    public function getPart179()
    {
        $data = array(
            "level_id"   =>1,
            "unit_id"    =>9,
            "lesson_id"  =>72,
            "part_id"    =>179,
            "play_type"  =>"auto",
            "eng"        => false
        );

        $data['systems'][] = array(
            "num"             => "1",
            'type'            => "look_and_listen",
            "timeRange"       => "00:37:242-00:39:050",
            "text"            => "Let's chant!",
            "media_filename"  => 'media/WG_system.mp3',
            "clickEvents"     =>array(
            ),
            "childEvents"     =>array(
            ),
            "selectEvents"=>array(
            ),
            "media_type" => 'audio',
            "picture" => "",
            "pictures" => array()
        );

//        $data['events'][] = array(
//            "num"             => "1",
//            'type'            => "look_and_listen",
//            "timeRange"       => "00:45-00:47",
//            "text"            => "Let's chant!",
//            "media_filename"  => 'media/WG_system.mp3',
//            "clickEvents"     =>array(
//            ),
//            "childEvents"     =>array(
//            ),
//            "selectEvents"=>array(
//            ),
//            "media_type" => 'audio',
//            "picture" => "",
//            "pictures" => array()
//        );


        $data['events'][] = array(
            "num"             => "2",
            'type'            => "look_and_listen",
            "timeRange"       => "00:00:000-00:28:009",
            "text"            => "Hello, hello, this is John",
            "media_filename"  => 'media/WG_u1_chant.mp4',
            "clickEvents"     =>array(
            ),
            "childEvents"     =>array(
            ),
            "selectEvents"=>array(
            ),
            "media_type" => 'video',
            "picture" => "",
            "pictures" => array()
        );

//        $data['events'][] = array(
//            "num"             => "3",
//            'type'            => "look_and_listen",
//            "timeRange"       => "00:02:08-00:05:10",
//            "text"            => "Hello, hello, this is John.",
//            "media_filename"  => 'media/WG_u1_chant.mp4',
//            "clickEvents"     =>array(
//            ),
//            "childEvents"     =>array(
//            ),
//            "selectEvents"=>array(
//            ),
//            "media_type" => 'video',
//            "picture" => "",
//            "pictures" => array()
//        );
//
//        $data['events'][] = array(
//            "num"             => "4",
//            'type'            => "look_and_listen",
//            "timeRange"       => "00:05:10-00:08:10",
//            "text"            => "Hello, hello, I am John.",
//            "media_filename"  => 'media/WG_u1_chant.mp4',
//            "clickEvents"     =>array(
//            ),
//            "childEvents"     =>array(
//            ),
//            "selectEvents"=>array(
//            ),
//            "media_type" => 'video',
//            "picture" => "",
//            "pictures" => array()
//        );
//
//        $data['events'][] = array(
//            "num"             => "5",
//            'type'            => "look_and_listen",
//            "timeRange"       => "00:08:10-00:11:08",
//            "text"            => "Hello, hello, this is Lily.",
//            "media_filename"  => 'media/WG_u1_chant.mp4',
//            "clickEvents"     =>array(
//            ),
//            "childEvents"     =>array(
//            ),
//            "selectEvents"=>array(
//            ),
//            "media_type" => 'video',
//            "picture" => "",
//            "pictures" => array()
//        );
//
//        $data['events'][] = array(
//            "num"             => "6",
//            'type'            => "look_and_listen",
//            "timeRange"       => "00:11:08-00:14:00",
//            "text"            => "Hello, hello, I am Lily.",
//            "media_filename"  => 'media/WG_u1_chant.mp4',
//            "clickEvents"     =>array(
//            ),
//            "childEvents"     =>array(
//            ),
//            "selectEvents"=>array(
//            ),
//            "media_type" => 'video',
//            "picture" => "",
//            "pictures" => array()
//        );
//        $data['events'][] = array(
//            "num"             => "7",
//            'type'            => "look_and_listen",
//            "timeRange"       => "00:14:00-00:16:22",
//            "text"            => "Hello, hello, what's your name?",
//            "media_filename"  => 'media/WG_u1_chant.mp4',
//            "clickEvents"     =>array(
//            ),
//            "childEvents"     =>array(
//            ),
//            "selectEvents"=>array(
//            ),
//            "media_type" => 'video',
//            "picture" => "",
//            "pictures" => array()
//        );
//
//        $data['events'][] = array(
//            "num"             => "8",
//            'type'            => "look_and_listen",
//            "timeRange"       => "00:16:22-00:19:18",
//            "text"            => "Hello, hello, my name's Tony.",
//            "media_filename"  => 'media/WG_u1_chant.mp4',
//            "clickEvents"     =>array(
//            ),
//            "childEvents"     =>array(
//            ),
//            "selectEvents"=>array(
//            ),
//            "media_type" => 'video',
//            "picture" => "",
//            "pictures" => array()
//        );
//
//        $data['events'][] = array(
//            "num"             => "9",
//            'type'            => "look_and_listen",
//            "timeRange"       => "00:19:18-00:22:10",
//            "text"            => "Hello, hello, what's your name?",
//            "media_filename"  => 'media/WG_u1_chant.mp4',
//            "clickEvents"     =>array(
//            ),
//            "childEvents"     =>array(
//            ),
//            "selectEvents"=>array(
//            ),
//            "media_type" => 'video',
//            "picture" => "",
//            "pictures" => array()
//        );
//
//        $data['events'][] = array(
//            "num"             => "10",
//            'type'            => "look_and_listen",
//            "timeRange"       => "00:22:10-00:25:23",
//            "text"            => "Hello, hello, my name's Kate.",
//            "media_filename"  => 'media/WG_u1_chant.mp4',
//            "clickEvents"     =>array(
//            ),
//            "childEvents"     =>array(
//            ),
//            "selectEvents"=>array(
//            ),
//            "media_type" => 'video',
//            "picture" => "",
//            "pictures" => array()
//        );
//
//        $data['events'][] = array(
//            "num"             => "11",
//            'type'            => "look_and_listen",
//            "timeRange"       => "00:25:23-00:28:09",
//            "text"            => "结尾",
//            "media_filename"  => 'media/WG_u1_chant.mp4',
//            "clickEvents"     =>array(
//            ),
//            "childEvents"     =>array(
//            ),
//            "selectEvents"=>array(
//            ),
//            "media_type" => 'video',
//            "picture" => "",
//            "pictures" => array()
//        );

        $a = json_encode($data);
        $fp = fopen('json179.txt', "w");
        fwrite($fp, $a);
        fclose($fp);
        return;

    }

    //Look Listen and record
    //自动播放 录音 回放录音 播放原句
    public function getPart180()
    {
        $data = array(
            "level_id"   =>1,
            "unit_id"    =>9,
            "lesson_id"  =>72,
            "part_id"    =>180,
            "play_type"  =>"auto"
        );


        $data['systems'][] = array(
            "num"             => "1",
            'type'            => "look_listen_record",
            "timeRange"       => "01:06:000-01:08:133",
            "text"            => "Listen and speak.",
            "media_filename"  => 'media/WG_system.mp3',
            "clickEvents"     =>array(
            ),
            "childEvents"     =>array(
            ),
            "selectEvents"=>array(
            ),
            "media_type" => 'audio',
            "picture" => "",
            "pictures" => array()
        );

//        $data['events'][] = array(
//            "num"             => "1",
//            'type'            => "look_listen_record",
//            "timeRange"       => "01:15-01:17",
//            "text"            => "Listen and speak.",
//            "media_filename"  => 'media/WG_system.mp3',
//            "clickEvents"     =>array(
//            ),
//            "childEvents"     =>array(
//            ),
//            "selectEvents"=>array(
//            ),
//            "media_type" => 'audio',
//            "picture" => "",
//            "pictures" => array()
//        );

        $data['events'][] = array(
            "num"            => "2",
            'type'           => "look_listen_record",
            "timeRange"      => "00:00:00-00:05:035",
            "text"           => "Hello, hello, this is John.",
            "media_filename" => 'media/1_WG_u1_mouth_chant.mp4',
            "media_type"     => 'mouth',
            "picture"        => "",
            "pictures"       => array(),
            "clickEvents"     =>array(
            ),
            "selectEvents"=>array(
            ),
            "childEvents"     =>array(
                "0"=>array(
                   "type"=>"record" //录音
                ),
                "1"=>array(
                    "type"=>"replay",//回听
                ),
                "2"=>array(
                    "type"=>"repeat", //重复播放原文
                ),
            ),
        );

        $data['events'][] = array(
            "num"            => "3",
            'type'           => "look_listen_record",
            "timeRange"      => "00:05:073-00:10:102",
            "text"           => "Hello, hello, I am John.",
            "media_filename" => 'media/1_WG_u1_mouth_chant.mp4',
            "media_type"     => 'mouth',
            "picture"        => "",
            "pictures"       => array(),
            "clickEvents"     =>array(
            ),
            "selectEvents"=>array(
            ),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"record" //录音
                ),
                "1"=>array(
                    "type"=>"replay",//回听
                ),
                "2"=>array(
                    "type"=>"repeat", //重复播放原文
                ),
            ),
        );

        $data['events'][] = array(
            "num"            => "4",
            'type'           => "look_listen_record",
            "timeRange"      => "00:10:056-00:15:401",
            "text"           => "Hello, hello, this is Lily.",
            "media_filename" => 'media/1_WG_u1_mouth_chant.mp4',
            "media_type"     => 'mouth',
            "picture"        => "",
            "pictures"       => array(),
            "clickEvents"     =>array(
            ),
            "selectEvents"=>array(
            ),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"record" //录音
                ),
                "1"=>array(
                    "type"=>"replay",//回听
                ),
                "2"=>array(
                    "type"=>"repeat", //重复播放原文
                ),
            ),
        );

        $data['events'][] = array(
            "num"            => "5",
            'type'           => "look_listen_record",
            "timeRange"      => "00:15:358-00:20:848",
            "text"           => "Hello, hello, I am Lily.",
            "media_filename" => 'media/1_WG_u1_mouth_chant.mp4',
            "media_type"     => 'mouth',
            "picture"        => "",
            "pictures"       => array(),
            "clickEvents"     =>array(
            ),
            "selectEvents"=>array(
            ),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"record" //录音
                ),
                "1"=>array(
                    "type"=>"replay",//回听
                ),
                "2"=>array(
                    "type"=>"repeat", //重复播放原文
                ),
            ),
        );

        $data['events'][] = array(
            "num"            => "6",
            'type'           => "look_listen_record",
            "timeRange"      => "00:20:978-00:26:485",
            "text"           => "Hello, hello, what's your name?",
            "media_filename" => 'media/1_WG_u1_mouth_chant.mp4',
            "media_type"     => 'mouth',
            "picture"        => "",
            "pictures"       => array(),
            "clickEvents"     =>array(
            ),
            "selectEvents"=>array(
            ),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"record" //录音
                ),
                "1"=>array(
                    "type"=>"replay",//回听
                ),
                "2"=>array(
                    "type"=>"repeat", //重复播放原文
                ),
            ),
        );

        $data['events'][] = array(
            "num"            => "7",
            'type'           => "look_listen_record",
            "timeRange"      => "00:26:435-00:31:573",
            "text"           => "Hello, hello, my name's Tony.",
            "media_filename" => 'media/1_WG_u1_mouth_chant.mp4',
            "media_type"     => 'mouth',
            "picture"        => "",
            "pictures"       => array(),
            "clickEvents"     =>array(
            ),
            "selectEvents"=>array(
            ),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"record" //录音
                ),
                "1"=>array(
                    "type"=>"replay",//回听
                ),
                "2"=>array(
                    "type"=>"repeat", //重复播放原文
                ),
            ),
        );

        $data['events'][] = array(
            "num"            => "8",
            'type'           => "look_listen_record",
            "timeRange"      => "00:31:496-00:36:800",
            "text"           => "Hello, hello, what's your name?",
            "media_filename" => 'media/1_WG_u1_mouth_chant.mp4',
            "media_type"     => 'mouth',
            "picture"        => "",
            "pictures"       => array(),
            "clickEvents"     =>array(
            ),
            "selectEvents"=>array(
            ),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"record" //录音
                ),
                "1"=>array(
                    "type"=>"replay",//回听
                ),
                "2"=>array(
                    "type"=>"repeat", //重复播放原文
                ),
            ),
        );

        $data['events'][] = array(
            "num"            => "9",
            'type'           => "look_listen_record",
            "timeRange"      => "00:36:802-00:42:326",
            "text"           => "Hello, hello, my name's Kate.",
            "media_filename" => 'media/1_WG_u1_mouth_chant.mp4',
            "media_type"     => 'mouth',
            "picture"        => "",
            "pictures"       => array(),
            "clickEvents"     =>array(
            ),
            "selectEvents"=>array(
            ),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"record" //录音
                ),
                "1"=>array(
                    "type"=>"replay",//回听
                ),
                "2"=>array(
                    "type"=>"repeat", //重复播放原文
                ),
            ),
        );

        $a = json_encode($data);
        $fp = fopen('json180.txt', "w");
        fwrite($fp, $a);
        fclose($fp);
        return;
    }


    //Sentence By Sentence
    //自动播放和识别
    public function getPart181()
    {
        $data = array(
            "level_id"   =>1,
            "unit_id"    =>9,
            "lesson_id"  =>72,
            "part_id"    =>181,
            "play_type"  =>"auto"
        );


         $data['systems'][] = array(
             "num"             => "1",
             'type'            => "sentence_by_sentence",
             "timeRange"       => "00:49:729-00:51:497",
             "text"            => "Let's check.",
             "media_filename"  => 'media/WG_system.mp3',
             "clickEvents"     =>array(
             ),
             "childEvents"     =>array(
             ),
             "selectEvents"=>array(
             ),
             "media_type" => 'audio',
             "picture" => "",
             "pictures" => array()
         );

//        $data['events'][] = array(
//            "num"             => "1",
//            'type'            => "sentence_by_sentence",
//            "timeRange"       => "00:59-01:01",
//            "text"            => "Let's check.",
//            "media_filename"  => 'media/WG_system.mp3',
//            "clickEvents"     =>array(
//            ),
//            "childEvents"     =>array(
//            ),
//            "selectEvents"=>array(
//            ),
//            "media_type" => 'audio',
//            "picture" => "",
//            "pictures" => array()
//        );

        $data['events'][] = array(
            "num"               => "2",
            'type'              => "sentence_by_sentence",
            "timeRange"         => "00:02:492-00:05:190",
            "text"              => "Hello, hello, this is John.",
            "media_filename"    => 'media/WG_u1_chant.mp4',
            "media_type"        => 'video',
            "picture"           => "",
            "pictures"          => array(),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"sr" //语音识别
                )
            ),
            "clickEvents"       =>array(
            ),
            "selectEvents"=>array(
            ),
        );

        $data['events'][] = array(
            "num"               => "3",
            'type'              => "sentence_by_sentence",
            "timeRange"         => "00:05:000-00:07:634",
            "text"              => "Hello, hello, I am John.",
            "media_filename"    => 'media/WG_u1_chant.mp4',
            "media_type"        => 'video',
            "picture"           => "",
            "pictures"          => array(),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"sr" //语音识别
                )
            ),
            "clickEvents"       =>array(
            ),
            "selectEvents"=>array(
            ),
        );

        $data['events'][] = array(
            "num"               => "4",
            'type'              => "sentence_by_sentence",
            "timeRange"         => "00:07:999-00:11:265",
            "text"              => "Hello, hello, this is Lily.",
            "media_filename"    => 'media/WG_u1_chant.mp4',
            "media_type"        => 'video',
            "picture"           => "",
            "pictures"          => array(),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"sr" //语音识别
                )
            ),
            "clickEvents"       =>array(
            ),
            "selectEvents"=>array(
            ),
        );

        $data['events'][] = array(
            "num"               => "5",
            'type'              => "sentence_by_sentence",
            "timeRange"         => "00:10:959-00:14:015",
            "text"              => "Hello, hello, I am Lily.",
            "media_filename"    => 'media/WG_u1_chant.mp4',
            "media_type"        => 'video',
            "picture"           => "",
            "pictures"          => array(),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"sr" //语音识别
                )
            ),
            "clickEvents"       =>array(
            ),
            "selectEvents"=>array(
            ),
        );

        $data['events'][] = array(
            "num"               => "6",
            'type'              => "sentence_by_sentence",
            "timeRange"         => "00:13:913-00:16:887",
            "text"              => "Hello, hello, what's your name?",
            "media_filename"    => 'media/WG_u1_chant.mp4',
            "media_type"        => 'video',
            "picture"           => "",
            "pictures"          => array(),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"sr" //语音识别
                )
            ),
            "clickEvents"       =>array(
            ),
            "selectEvents"=>array(
            ),
        );

        $data['events'][] = array(
            "num"               => "7",
            'type'              => "sentence_by_sentence",
            "timeRange"         => "00:16:727-00:19:872",
            "text"              => "Hello, hello, my name's Tony.",
            "media_filename"    => 'media/WG_u1_chant.mp4',
            "media_type"        => 'video',
            "picture"           => "",
            "pictures"          => array(),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"sr" //语音识别
                )
            ),
            "clickEvents"       =>array(
            ),
            "selectEvents"=>array(
            ),
        );

        $data['events'][] = array(
            "num"               => "8",
            'type'              => "sentence_by_sentence",
            "timeRange"         => "00:19:572-00:22:838",
            "text"              => "Hello, hello, what's your name?",
            "media_filename"    => 'media/WG_u1_chant.mp4',
            "media_type"        => 'video',
            "picture"           => "",
            "pictures"          => array(),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"sr" //语音识别
                )
            ),
            "clickEvents"       =>array(
            ),
            "selectEvents"=>array(
            ),
        );

        $data['events'][] = array(
            "num"               => "9",
            'type'              => "sentence_by_sentence",
            "timeRange"         => "00:22:199-00:26:345",
            "text"              => "Hello, hello, my name's Kate.",
            "media_filename"    => 'media/WG_u1_chant.mp4',
            "media_type"        => 'video',
            "picture"           => "",
            "pictures"          => array(),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"sr" //语音识别
                )
            ),
            "clickEvents"       =>array(
            ),
            "selectEvents"=>array(
            ),
        );

        $a = json_encode($data);
        $fp = fopen('json181.txt', "w");
        fwrite($fp, $a);
        fclose($fp);
        return;
    }


    public function getPart182()
    {
        $data = array(
            "level_id"   =>1,
            "unit_id"    =>9,
            "lesson_id"  =>73,
            "part_id"    =>182,
            "play_type"  =>"auto",
            "eng"        =>false,
        );

        $data['systems'][] = array(
            "num"             => "1",
            'type'            => "look_and_listen",
            "timeRange"       => "00:39:050-00:40:782",
            "text"            => "Let's talk.",
            "media_filename"  => 'media/WG_system.mp3',
            "clickEvents"     =>array(
            ),
            "childEvents"     =>array(
            ),
            "selectEvents"=>array(
            ),
            "media_type" => 'audio',
            "picture" => "",
            "pictures" => array()
        );

//        $data['events'][] = array(
//            "num"             => "1",
//            'type'            => "look_and_listen",
//            "timeRange"       => "00:47-00:49",
//            "text"            => "Let's talk.",
//            "media_filename"  => 'media/WG_system.mp3',
//            "clickEvents"     =>array(
//            ),
//            "childEvents"     =>array(
//            ),
//            "selectEvents"=>array(
//            ),
//            "media_type" => 'audio',
//            "picture" => "",
//            "pictures" => array()
//        );


        $data['events'][] = array(
            "num"             => "2",
            'type'            => "look_and_listen",
            "timeRange"       => "00:00:000-00:15:652",
            "text"            => "Hi, I'm Tony.",
            "media_filename"  => 'media/WG_u1_conversation.mp4',
            "clickEvents"     =>array(
            ),
            "childEvents"     =>array(
            ),
            "selectEvents"=>array(
            ),
            "media_type" => 'video',
            "picture" => "",
            "pictures" => array()
        );
//        $data['events'][] = array(
//            "num"             => "3",
//            'type'            => "look_and_listen",
//            "timeRange"       => "00:02:09-00:03:28",
//            "text"            => "What's your name?",
//            "media_filename"  => 'media/WG_u1_conversation.mp4',
//            "clickEvents"     =>array(
//            ),
//            "childEvents"     =>array(
//            ),
//            "selectEvents"=>array(
//            ),
//            "media_type" => 'video',
//            "picture" => "",
//            "pictures" => array()
//        );
//        $data['events'][] = array(
//            "num"             => "4",
//            'type'            => "look_and_listen",
//            "timeRange"       => "00:03:28-00:06:02",
//            "text"            => "Hi, Tony.",
//            "media_filename"  => 'media/WG_u1_conversation.mp4',
//            "clickEvents"     =>array(
//            ),
//            "childEvents"     =>array(
//            ),
//            "selectEvents"=>array(
//            ),
//            "media_type" => 'video',
//            "picture" => "",
//            "pictures" => array()
//        );
//        $data['events'][] = array(
//            "num"             => "5",
//            'type'            => "look_and_listen",
//            "timeRange"       => "00:06:02-00:08:15",
//            "text"            => "My name is Lily.",
//            "media_filename"  => 'media/WG_u1_conversation.mp4',
//            "clickEvents"     =>array(
//            ),
//            "childEvents"     =>array(
//            ),
//            "selectEvents"=>array(
//            ),
//            "media_type" => 'video',
//            "picture" => "",
//            "pictures" => array()
//        );
//
//        $data['events'][] = array(
//            "num"             => "6",
//            'type'            => "look_and_listen",
//            "timeRange"       => "00:08:15-00:10:11",
//            "text"            => "Nice to meet you, lily.",
//            "media_filename"  => 'media/WG_u1_conversation.mp4',
//            "clickEvents"     =>array(
//            ),
//            "childEvents"     =>array(
//            ),
//            "selectEvents"=>array(
//            ),
//            "media_type" => 'video',
//            "picture" => "",
//            "pictures" => array()
//        );
//
//        $data['events'][] = array(
//            "num"             => "7",
//            'type'            => "look_and_listen",
//            "timeRange"       => "00:10:11-00:13:25",
//            "text"            => "Nice to meet you too, Tony.",
//            "media_filename"  => 'media/WG_u1_conversation.mp4',
//            "clickEvents"     =>array(
//            ),
//            "childEvents"     =>array(
//            ),
//            "selectEvents"=>array(
//            ),
//            "media_type" => 'video',
//            "picture" => "",
//            "pictures" => array()
//        );
//
//        $data['events'][] = array(
//            "num"             => "8",
//            'type'            => "look_and_listen",
//            "timeRange"       => "00:13:25-00:15:23",
//            "text"            => "Nice to meet you too.",
//            "media_filename"  => 'media/WG_u1_conversation.mp4',
//            "clickEvents"     =>array(
//            ),
//            "childEvents"     =>array(
//            ),
//            "selectEvents"=>array(
//            ),
//            "media_type" => 'video',
//            "picture" => "",
//            "pictures" => array()
//        );

        $a = json_encode($data);
        $fp = fopen('json182.txt', "w");
        fwrite($fp, $a);
        fclose($fp);
        return;

    }

    //role_repeat_and_record
    //自动播放和识别
    public function getPart183()
    {
        $data = array(
            "level_id"   =>1,
            "unit_id"    =>9,
            "lesson_id"  =>73,
            "part_id"    =>183,
            "play_type"  =>"auto"
        );


        $data['systems'][] = array(
            "num"             => "1",
            'type'            => "role_repeat_and_record",
            "timeRange"       => "00:00-00:03",
            "text"            => "You are Lily.",
            "media_filename"  => 'media/WG_u1_system.mp3',
            "clickEvents"     =>array(
            ),
            "childEvents"     =>array(
            ),
            "selectEvents"=>array(
            ),
            "media_type" => 'audio',
            "picture" => "",
            "pictures" => array()
        );
        $data['systems'][] = array(
            "num"             => "2",
            'type'            => "role_repeat_and_record",
            "timeRange"       => "00:06-00:08",
            "text"            => "Follow me.",
            "media_filename"  => 'media/WG_u1_system.mp3',
            "clickEvents"     =>array(
            ),
            "childEvents"     =>array(
            ),
            "selectEvents"=>array(
            ),
            "media_type" => 'audio',
            "picture" => "",
            "pictures" => array()
        );
        $data['events'][] = array(
            "num"             => "3",
            'type'            => "role_repeat_and_record",
            "timeRange"       => "00:00:00-00:03:462",
            "text"            => "Hi, I'm Tony. What's your name?",
            "media_filename"  => 'media/WG_u1_conversation.mp4',
            "clickEvents"     =>array(
            ),
            "childEvents"     =>array(
            ),
            "selectEvents"=>array(
            ),
            "media_type" => 'video',
            "picture" => "",
            "pictures" => array()
        );

//        $data['events'][] = array(
//            "num"             => "4",
//            'type'            => "role_repeat_and_record",
//            "timeRange"       => "00:02:09-00:03:28",
//            "text"            => "What's your name?",
//            "media_filename"  => 'media/WG_u1_conversation.mp4',
//            "clickEvents"     =>array(
//            ),
//            "childEvents"     =>array(
//            ),
//            "selectEvents"=>array(
//            ),
//            "media_type" => 'video',
//            "picture" => "",
//            "pictures" => array()
//        );

        $data['events'][] = array(
            "num"                => "5",
            'type'               => "role_repeat_and_record",
            "timeRange"          => "00:03:772-00:05:427",
            "text"               => "Hi, Tony.",
            "media_filename"     => "media/WG_u1_conversation.mp4",
            "media_type"         => 'video',
            "picture"            => "",
            "pictures" => array(),
            "role"               => "Lily",
            "childEvents"     =>array(
                "0"=>array(
                    "media_filename"  => "media/2_WG_u1_mouth_conv.mp4",
                    "timeRange"       => "00:05:130-00:06:697",
                    "type"            => "mouth", //口型
                    "text"           => "Hi, Tony.",
                ),
                "1"=>array(
                    "type"=>"record",
                ),
                "2"=>array(
                    "type"=>"replay", //回听录音
                ),
            ),
            "clickEvents"     =>array(
            ),
            "selectEvents"=>array(
            ),
        );

        $data['events'][] = array(
            "num"                => "6",
            'type'               => "role_repeat_and_record",
            "timeRange"          => "00:05:649-00:07:760",
            "text"               => "My name is Lily.",
            "media_filename"     => "media/WG_u1_conversation.mp4",
            "media_type"         => 'video',
            "picture"            => "",
            "pictures" => array(),
            "role"               => "Lily",
            "childEvents"     =>array(
                "0"=>array(
                    "media_filename"  => "media/2_WG_u1_mouth_conv.mp4",
                    "timeRange"       => "00:07:399-00:09:790",
                    "type"            => "mouth", //口型
                    "text"           => "My name is Lily.",
                ),
                "1"=>array(
                    "type"=>"record",
                ),
                "2"=>array(
                    "type"=>"replay", //回听录音
                ),
            ),
            "clickEvents"     =>array(
            ),
            "selectEvents"=>array(
            ),
        );

        $data['events'][] = array(
            "num"             => "7",
            'type'            => "role_repeat_and_record",
            "timeRange"       => "00:07:760-00:10:300",
            "text"            => "Nice to meet you, lily.",
            "media_filename"  => 'media/WG_u1_conversation.mp4',
            "clickEvents"     =>array(
            ),
            "childEvents"     =>array(
            ),
            "selectEvents"=>array(
            ),
            "media_type" => 'video',
            "picture" => "",
            "pictures" => array()
        );


        $data['events'][] = array(
            "num"                => "8",
            'type'               => "role_repeat_and_record",
            "timeRange"          => "00:10:300-00:12:783",
            "text"               => "Nice to meet you too, Tony.",
            "media_filename"     => "media/WG_u1_conversation.mp4",
            "media_type"         => 'video',
            "picture"            => "",
            "pictures" => array(),
            "role"               => "Lily",
            "childEvents"     =>array(
                "0"=>array(
                    "media_filename"  => "media/2_WG_u1_mouth_conv.mp4",
                    "timeRange"       => "00:12:757-00:16:041",
                    "type"            => "mouth", //口型
                    "text"            => "Nice to meet you too, Tony.",
                ),
                "1"=>array(
                    "type"=>"record",
                ),
                "2"=>array(
                    "type"=>"replay", //回听录音
                ),
            ),
            "clickEvents"     =>array(
            ),
            "selectEvents"=>array(
            ),
        );

        $data['events'][] = array(
            "num"                => "9",
            'type'               => "role_repeat_and_record",
            "timeRange"          => "00:13:664-00:15:652",
            "text"               => "Nice to meet you too.",
            "media_filename"     => "media/WG_u1_conversation.mp4",
            "media_type"         => 'video',
            "picture"            => "",
            "pictures" => array(),
            "role"               => "Lily",
            "childEvents"     =>array(
                "0"=>array(
                    "media_filename"  => "media/2_WG_u1_mouth_conv.mp4",
                    "timeRange"       => "00:16:289-00:18:566",
                    "type"            => "mouth", //口型
                    "text"            => "Nice to meet you too.",
                ),
                "1"=>array(
                    "type"=>"record",
                ),
                "2"=>array(
                    "type"=>"replay", //回听录音
                ),
            ),
            "clickEvents"     =>array(
            ),
            "selectEvents"=>array(
            ),
        );

        $a = json_encode($data);
        $fp = fopen('json183.txt', "w");
        fwrite($fp, $a);
        fclose($fp);
        return;
    }


    //role_listen_and_repeat_sr
    //自动播放和识别
    public function getPart184()
    {
        $data = array(
            "level_id"   =>1,
            "unit_id"    =>9,
            "lesson_id"  =>73,
            "part_id"    =>184,
            "play_type"  =>"auto"
        );
        $data['systems'][] = array(
            "num"             => "1",
            'type'            => "role_listen_and_repeat_sr",
            "timeRange"       => "00:00-00:03",
            "text"            => "You are Lily.",
            "media_filename"  => 'media/WG_u1_system.mp3',
            "clickEvents"     =>array(
            ),
            "childEvents"     =>array(
            ),
            "selectEvents"=>array(
            ),
            "media_type" => 'audio',
            "picture" => "",
            "pictures" => array()
        );
        $data['systems'][] = array(
            "num"             => "2",
            'type'            => "role_listen_and_repeat_sr",
            "timeRange"       => "00:06-00:08",
            "text"            => "Follow me.",
            "media_filename"  => 'media/WG_u1_system.mp3',
            "clickEvents"     =>array(
            ),
            "childEvents"     =>array(
            ),
            "selectEvents"=>array(
            ),
            "media_type" => 'audio',
            "picture" => "",
            "pictures" => array()
        );
        $data['events'][] = array(
            "num"                => "3",
            'type'               => "role_listen_and_repeat_sr",
            "timeRange"         => "00:00:00-00:03:462",
            "text"               => "Hi, I'm Tony. What's your name?",
            "media_filename"     => "media/WG_u1_conversation.mp4",
            "media_type"         => 'video',
            "picture"            => "",
            "pictures"           =>array(

             ),
            "role_pictures"           =>array(
                "left_head_portrait"=>"images/tony_side.png",
                "right_head_portrait"=>"images/lily_face.png",

            ),
            "role"               => "Tony",
            "childEvents"     =>array(
            ),
            "clickEvents"     =>array(
            ),
            "selectEvents"=>array(
            ),
        );
//        $data['events'][] = array(
//            "num"                => "4",
//            'type'               => "role_listen_and_repeat_sr",
//            "timeRange"          => "00:02:09-00:03:28",
//            "text"               => "What's your name?",
//            "media_filename"     => "media/WG_u1_conversation.mp4",
//            "media_type"         => 'video',
//            "picture"            => "",
//            "pictures"           =>array(
//                "left_head_portrait"=>"images/tony_side.png",
//                "right_head_portrait"=>"images/lily_face.png",
//
//            ),
//            "role"               => "Tony",
//            "childEvents"     =>array(
//            ),
//            "clickEvents"     =>array(
//            ),
//            "selectEvents"=>array(
//            ),
//        );

        $data['events'][] = array(
            "num"                => "5",
            'type'               => "role_listen_and_repeat_sr",
            "timeRange"          => "00:03:772-00:05:427",
            "text"               => "Hi, Tony.",
            "media_filename"     => "media/WG_u1_conversation.mp4",
            "media_type"         => 'video',
            "picture"            => "",
            "pictures"           =>array(

            ),
            "role_pictures"           =>array(
                "left_head_portrait"=>"images/tony_side.png",
                "right_head_portrait"=>"images/lily_face.png",

            ),
            "role"               => "Lily",
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"sr",
                ),
            ),
            "clickEvents"     =>array(
            ),
            "selectEvents"=>array(
            ),
        );


        $data['events'][] = array(
            "num"                => "6",
            'type'               => "role_listen_and_repeat_sr",
            "timeRange"          => "00:05:649-00:07:958",
            "text"               => "My name is Lily.",
            "media_filename"     => "media/WG_u1_conversation.mp4",
            "media_type"         => 'video',
            "picture"            => "",
            "pictures"           =>array(

            ),
            "role_pictures"           =>array(
                "left_head_portrait"=>"images/tony_side.png",
                "right_head_portrait"=>"images/lily_face.png",

            ),
            "role"               => "Lily",
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"sr",
                ),
            ),
            "clickEvents"     =>array(
            ),
            "selectEvents"=>array(
            ),
        );

        $data['events'][] = array(
            "num"                => "7",
            'type'               => "role_listen_and_repeat_sr",
            "timeRange"       => "00:07:958-00:10:300",
            "text"               => "Nice to meet you, lily.",
            "media_filename"     => "media/WG_u1_conversation.mp4",
            "media_type"         => 'video',
            "picture"            => "",
            "pictures"           =>array(

            ),
            "role_pictures"           =>array(
                "left_head_portrait"=>"images/tony_side.png",
                "right_head_portrait"=>"images/lily_face.png",

            ),
            "role"               => "Tony",
            "childEvents"     =>array(
            ),
            "clickEvents"     =>array(
            ),
            "selectEvents"=>array(
            ),
        );
        $data['events'][] = array(
            "num"                => "8",
            'type'               => "role_listen_and_repeat_sr",
            "timeRange"          => "00:10:300-00:12:783",
            "text"               => "Nice to meet you too, Tony.",
            "media_filename"     => "media/WG_u1_conversation.mp4",
            "media_type"         => 'video',
            "picture"            => "",
            "pictures"           =>array(

            ),
            "role_pictures"           =>array(
                "left_head_portrait"=>"images/tony_side.png",
                "right_head_portrait"=>"images/lily_face.png",

            ),
            "role"               => "Lily",
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"sr",
                ),
            ),
            "clickEvents"     =>array(
            ),
            "selectEvents"=>array(
            ),
        );


        $data['events'][] = array(
            "num"                => "9",
            'type'               => "role_listen_and_repeat_sr",
            "timeRange"          => "00:13:664-00:15:652",
            "text"               => "Nice to meet you too.",
            "media_filename"     => "media/WG_u1_conversation.mp4",
            "media_type"         => 'video',
            "picture"            => "",
            "pictures"           =>array(

            ),
            "role_pictures"           =>array(
                "left_head_portrait"=>"images/tony_side.png",
                "right_head_portrait"=>"images/lily_face.png",

            ),
            "role"               => "Lily",
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"sr",
                ),
            ),
            "clickEvents"     =>array(
            ),
            "selectEvents"=>array(
            ),
        );

        $a = json_encode($data);
        $fp = fopen('json184.txt', "w");
        fwrite($fp, $a);
        fclose($fp);
        return;
    }


    public function getPart185()
    {
        $data = array(
            "level_id"   =>1,
            "unit_id"    =>9,
            "lesson_id"  =>73,
            "part_id"    =>185,
            "play_type"  =>"auto"
        );
        $data['systems'][] = array(
            "num"             => "1",
            'type'            => "role_repeat_and_record",
            "timeRange"       => "00:03-00:06",
            "text"            => "Now, you are Tony.",
            "media_filename"  => 'media/WG_u1_system.mp3',
            "clickEvents"     =>array(
            ),
            "childEvents"     =>array(
            ),
            "selectEvents"=>array(
            ),
            "media_type" => 'audio',
            "picture" => "",
            "pictures" => array()
        );
        $data['systems'][] = array(
            "num"             => "2",
            'type'            => "role_repeat_and_record",
            "timeRange"       => "00:06-00:08",
            "text"            => "Follow me.",
            "media_filename"  => 'media/WG_u1_system.mp3',
            "clickEvents"     =>array(
            ),
            "childEvents"     =>array(
            ),
            "selectEvents"=>array(
            ),
            "media_type" => 'audio',
            "picture" => "",
            "pictures" => array()
        );

        $data['events'][] = array(
            "num"                => "3",
            'type'               => "role_repeat_and_record",
            "timeRange"          => "00:00:00-00:01:836",
            "text"               => "Hi, I'm Tony.",
            "media_filename"     => "media/WG_u1_conversation.mp4",
            "media_type"         => 'video',
            "picture"            => "",
            "pictures"           =>array(

            ),
            "role_pictures"           =>array(
                "left_head_portrait"=>"images/lily_side.png",
                "right_head_portrait"=>"images/tony_face.png",

            ),
            "role"               => "Tony",
            "childEvents"     =>array(
                "0"=>array(
                    "media_filename"  => "media/2_WG_u1_mouth_conv.mp4",
                    "timeRange"       => "00:00:00-00:02:300",
                    "type"            => "mouth", //口型
                    "text"            => "Hi, I'm Tony. ",
                ),
                "1"=>array(
                    "type"=>"record",
                ),
                "2"=>array(
                    "type"=>"replay", //回听录音
                ),
            ),
            "clickEvents"     =>array(
            ),
            "selectEvents"=>array(
            ),

        );

        $data['events'][] = array(
            "num"                => "4",
            'type'               => "role_repeat_and_record",
            "timeRange"          => "00:02:080-00:03:772",
            "text"               => "What's your name?",
            "media_filename"     => "media/WG_u1_conversation.mp4",
            "media_type"         => 'video',
            "picture"            => "",
            "pictures"           =>array(

            ),
            "role_pictures"           =>array(
                "left_head_portrait"=>"images/lily_side.png",
                "right_head_portrait"=>"images/tony_face.png",

            ),
            "role"               => "Tony",
            "childEvents"     =>array(
                "0"=>array(
                    "media_filename"  => "media/2_WG_u1_mouth_conv.mp4",
                    "timeRange"       => "00:03:068-00:05:090",
                    "type"            => "mouth", //口型
                    "text"            => "What's your name?",
                ),
                "1"=>array(
                    "type"=>"record",
                ),
                "2"=>array(
                    "type"=>"replay", //回听录音
                ),
            ),
            "clickEvents"     =>array(
            ),
            "selectEvents"=>array(
            ),

        );

        $data['events'][] = array(
            "num"                => "5",
            'type'               => "role_repeat_and_record",
            "timeRange"          => "00:03:772-00:05:427",
            "text"               => "Hi, Tony.",
            "media_filename"     => "media/WG_u1_conversation.mp4",
            "media_type"         => 'video',
            "picture"            => "",
            "pictures"           =>array(

            ),
            "role_pictures"           =>array(
                "left_head_portrait"=>"images/lily_side.png",
                "right_head_portrait"=>"images/tony_face.png",

            ),
            "role"               => "Lily",
            "childEvents"     =>array(
            ),
            "clickEvents"     =>array(
            ),
            "selectEvents"=>array(
            ),

        );
        $data['events'][] = array(
            "num"                => "6",
            'type'               => "role_repeat_and_record",
            "timeRange"          => "00:05:649-00:07:918",
            "text"               => "My name is Lily.",
            "media_filename"     => "media/WG_u1_conversation.mp4",
            "media_type"         => 'video',
            "picture"            => "",
            "pictures"           =>array(

            ),
            "role_pictures"           =>array(
                "left_head_portrait"=>"images/lily_side.png",
                "right_head_portrait"=>"images/tony_face.png",

            ),
            "role"               => "Lily",
            "childEvents"     =>array(
            ),
            "clickEvents"     =>array(
            ),
            "selectEvents"=>array(
            ),

        );

        $data['events'][] = array(
            "num"                => "7",
            'type'               => "role_repeat_and_record",
            "timeRange"         => "00:07:760-00:10:300",
            "text"               => "Nice to meet you, lily.",
            "media_filename"     => "media/WG_u1_conversation.mp4",
            "media_type"         => 'video',
            "picture"            => "",
            "pictures"           =>array(

            ),
            "role_pictures"           =>array(
                "left_head_portrait"=>"images/lily_side.png",
                "right_head_portrait"=>"images/tony_face.png",

            ),
            "role"               => "Tony",
            "childEvents"     =>array(
                "0"=>array(
                    "media_filename"  => "media/2_WG_u1_mouth_conv.mp4",
                    "timeRange"       => "00:10:051-00:12:648",
                    "type"            => "mouth", //口型
                    "text"            => "Nice to meet you, lily.",
                ),
                "1"=>array(
                    "type"=>"record",
                ),
                "2"=>array(
                    "type"=>"replay", //回听录音
                ),
            ),
            "clickEvents"     =>array(
            ),
            "selectEvents"=>array(
            ),

        );

        $data['events'][] = array(
            "num"                => "8",
            'type'               => "role_repeat_and_record",
            "timeRange"          => "00:10:300-00:12:783",
            "text"               => "Nice to meet you too, Tony.",
            "media_filename"     => "media/WG_u1_conversation.mp4",
            "media_type"         => 'video',
            "picture"            => "",
            "pictures"           =>array(

            ),
            "role_pictures"           =>array(
                "left_head_portrait"=>"images/lily_side.png",
                "right_head_portrait"=>"images/tony_face.png",

            ),
            "role"               => "Lily",
            "childEvents"     =>array(
            ),
            "clickEvents"     =>array(
            ),
            "selectEvents"=>array(
            ),

        );

        $data['events'][] = array(
            "num"                => "9",
            'type'               => "role_repeat_and_record",
            "timeRange"          => "00:13:664-00:15:652",
            "text"               => "Nice to meet you too.",
            "media_filename"     => "media/WG_u1_conversation.mp4",
            "media_type"         => 'video',
            "picture"            => "",
            "pictures"           =>array(

            ),
            "role_pictures"           =>array(
                "left_head_portrait"=>"images/lily_side.png",
                "right_head_portrait"=>"images/tony_face.png",

            ),
            "role"               => "Tony",
            "childEvents"     =>array(
                "0"=>array(
                    "media_filename"  => "media/2_WG_u1_mouth_conv.mp4",
                    "timeRange"       => "00:16:334-00:18:943",
                    "type"            => "mouth", //口型
                    "text"            => "Nice to meet you too.",
                ),
                "1"=>array(
                    "type"=>"record",
                ),
                "2"=>array(
                    "type"=>"replay", //回听录音
                ),
            ),
            "clickEvents"     =>array(
            ),
            "selectEvents"=>array(
            ),

        );

        $a = json_encode($data);
        $fp = fopen('json185.txt', "w");
        fwrite($fp, $a);
        fclose($fp);
        return;
    }


    public function getPart186()
    {
        $data = array(
            "level_id"   =>1,
            "unit_id"    =>9,
            "lesson_id"  =>73,
            "part_id"    =>186,
            "play_type"  =>"auto"
        );
        $data['systems'][] = array(
            "num"             => "1",
            'type'            => "role_listen_and_repeat_sr",
            "timeRange"       => "00:03-00:06",
            "text"            => "Now, you are Tony.",
            "media_filename"  => 'media/WG_u1_system.mp3',
            "clickEvents"     =>array(
            ),
            "childEvents"     =>array(
            ),
            "selectEvents"=>array(
            ),
            "media_type" => 'audio',
            "picture" => "",
            "pictures" => array()
        );
        $data['systems'][] = array(
            "num"             => "2",
            'type'            => "role_listen_and_repeat_sr",
            "timeRange"       => "00:06-00:08",
            "text"            => "Follow me.",
            "media_filename"  => 'media/WG_u1_system.mp3',
            "clickEvents"     =>array(
            ),
            "childEvents"     =>array(
            ),
            "selectEvents"=>array(
            ),
            "media_type" => 'audio',
            "picture" => "",
            "pictures" => array()
        );

        $data['events'][] = array(
            "num"                => "3",
            'type'               => "role_listen_and_repeat_sr",
            "timeRange"          => "00:00:00-00:01:836",
            "text"               => "Hi, I'm Tony.",
            "media_filename"     => "media/WG_u1_conversation.mp4",
            "media_type"         => 'video',
            "picture"            => "",
            "pictures" => array(),
            "role"               => "Tony",
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"sr",
                ),
            ),
            "clickEvents"     =>array(
            ),
            "selectEvents"=>array(
            ),

        );
        $data['events'][] = array(
            "num"                => "4",
            'type'               => "role_listen_and_repeat_sr",
            "timeRange"          => "00:02:080-00:03:772",
            "text"               => "What's your name?",
            "media_filename"     => "media/WG_u1_conversation.mp4",
            "media_type"         => 'video',
            "picture"            => "",
            "pictures" => array(),
            "role"               => "Tony",
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"sr",
                ),
            ),
            "clickEvents"     =>array(
            ),
            "selectEvents"=>array(
            ),

        );
        $data['events'][] = array(
            "num"                => "5",
            'type'               => "role_listen_and_repeat_sr",
            "timeRange"          => "00:03:772-00:05:427",
            "text"               => "Hi, Tony.",
            "media_filename"     => "media/WG_u1_conversation.mp4",
            "media_type"         => 'video',
            "picture"            => "",
            "pictures" => array(),
            "role"               => "Tony",
            "childEvents"     =>array(
            ),
            "clickEvents"     =>array(
            ),
            "selectEvents"=>array(
            ),
        );
        $data['events'][] = array(
            "num"                => "6",
            'type'               => "role_listen_and_repeat_sr",
            "timeRange"          => "00:05:649-00:07:918",
            "text"               => "My name is Lily.",
            "media_filename"     => "media/WG_u1_conversation.mp4",
            "media_type"         => 'video',
            "picture"            => "",
            "pictures" => array(),
            "role"               => "Tony",
            "childEvents"     =>array(
            ),
            "clickEvents"     =>array(
            ),
            "selectEvents"=>array(
            ),

        );
        $data['events'][] = array(
            "num"                => "7",
            'type'               => "role_listen_and_repeat_sr",
            "timeRange"         => "00:07:760-00:10:300",
            "text"               => "Nice to meet you, lily.",
            "media_filename"     => "media/WG_u1_conversation.mp4",
            "media_type"         => 'video',
            "picture"            => "",
            "pictures" => array(),
            "role"               => "Tony",
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"sr",
                ),
            ),
            "clickEvents"     =>array(
            ),
            "selectEvents"=>array(
            ),

        );

        $data['events'][] = array(
            "num"                => "8",
            'type'               => "role_listen_and_repeat_sr",
            "timeRange"          => "00:10:300-00:12:783",
            "text"               => "Nice to meet you too, Tony.",
            "media_filename"     => "media/WG_u1_conversation.mp4",
            "media_type"         => 'video',
            "picture"            => "",
            "pictures" => array(),
            "role"               => "Tony",
            "childEvents"     =>array(
            ),
            "clickEvents"     =>array(
            ),
            "selectEvents"=>array(
            ),

        );

        $data['events'][] = array(
            "num"                => "9",
            'type'               => "role_listen_and_repeat_sr",
            "timeRange"          => "00:13:664-00:15:652",
            "text"               => "Nice to meet you too.",
            "media_filename"     => "media/WG_u1_conversation.mp4",
            "media_type"         => 'video',
            "picture"            => "",
            "pictures" => array(),
            "role"               => "Tony",
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"sr",
                ),
            ),
            "clickEvents"     =>array(
            ),
            "selectEvents"=>array(
            ),

        );
        $a = json_encode($data);
        $fp = fopen('json186.txt', "w");
        fwrite($fp, $a);
        fclose($fp);
        return;
    }

    //listen_vocabulary
    //自动播放和识别
    public function getPart187()
    {
        $data = array(
            "level_id"   =>1,
            "unit_id"    =>9,
            "lesson_id"  =>74,
            "part_id"    =>187,
            "play_type"  =>"auto" //非自动播放事件
        );
        //点击第一次 执行 0,第二次执行1,依次循环
        $data['systems'][] = array(
            "num"             => "1",
            'type'            => "vocabulary_look_listen",
            "timeRange"       => "00:40:782-00:41:725",
            "text"            => "Let's learn.",
            "media_filename"  => 'media/WG_system.mp3',
            "clickEvents"     =>array(
            ),
            "childEvents"     =>array(
            ),
            "selectEvents"=>array(
            ),
            "media_type" => 'audio',
            "picture" => "",
            "pictures" => array()
        );

        $data['dataList'][] = array(
            "num"                => "2",
            'type'               => "vocabulary_look_listen",
            "timeRange"          => "",
            "text"               => "a pen",
            "media_filename"     => "images/pen.png",
            "media_type"         => 'image',
            "picture"            => "images/pen.png",
            "clickEvents"=>array(
                "click_1"=>array(
                    "timeRange"          => "00:00-00:02",
                    "text"               => "a pen",
                    "media_filename"     => "media/WG_u1_voc.mp3",
                    "media_type"         => 'audio',
                ),
                "click_2"=>array(
                    "timeRange"          => "00:02-00:04",
                    "text"               => "It's a pen.",
                    "media_filename"     => "media/WG_u1_voc.mp3",
                    "media_type"         => 'audio',
                )
            ),
            "childEvents"     =>array(

            ),
            "selectEvents"=>array(
            ),
        );

        $data['dataList'][] = array(
            "num"                => "3",
            'type'               => "vocabulary_look_listen",
            "timeRange"          => "",
            "text"               => "a book",
            "media_filename"     => "images/book.png",
            "media_type"         => 'image',
            "picture"            => "images/book.png",
            "clickEvents"=>array(
                "click_1"=>array(
                    "timeRange"          => "00:04-00:06",
                    "text"               => "a book",
                    "media_filename"     => "media/WG_u1_voc.mp3",
                    "media_type"         => 'audio',
                ),
                "click_2"=>array(
                    "timeRange"          => "00:06-00:08",
                    "text"               => "It's a book.",
                    "media_filename"     => "media/WG_u1_voc.mp3",
                    "media_type"         => 'audio',
                )
            ),
            "childEvents"     =>array(

            ),
            "selectEvents"=>array(
            ),
        );

        $data['dataList'][] = array(
            "num"                => "4",
            'type'               => "vocabulary_look_listen",
            "timeRange"          => "",
            "text"               => "a pencil",
            "media_filename"     => "images/pencil.png",
            "media_type"         => 'image',
            "picture"            => "images/pencil.png",
            "clickEvents"=>array(
                "click_1"=>array(
                    "timeRange"          => "00:08-00:10",
                    "text"               => "a pencil",
                    "media_filename"     => "media/WG_u1_voc.mp3",
                    "media_type"         => 'audio',
                ),
                "click_2"=>array(
                    "timeRange"          => "00:10-00:12",
                    "text"               => "It's a pencil.",
                    "media_filename"     => "media/WG_u1_voc.mp3",
                    "media_type"         => 'audio',
                )
            ),
            "childEvents"     =>array(

            ),
            "selectEvents"=>array(
            ),
        );

        $data['dataList'][] = array(
            "num"                => "5",
            'type'               => "vocabulary_look_listen",
            "timeRange"          => "",
            "text"               => "an eraser",
            "media_filename"     => "images/eraser.png",
            "media_type"         => 'image',
            "picture"            => "images/eraser.png",
            "clickEvents"=>array(
                "click_1"=>array(
                    "timeRange"          => "00:12-00:14",
                    "text"               => "an eraser",
                    "media_filename"     => "media/WG_u1_voc.mp3",
                    "media_type"         => 'audio',
                ),
                "click_2"=>array(
                    "timeRange"          => "00:14-00:17",
                    "text"               => "It's an eraser.",
                    "media_filename"     => "media/WG_u1_voc.mp3",
                    "media_type"         => 'audio',
                )
            ),
            "childEvents"     =>array(

            ),
            "selectEvents"=>array(
            ),
        );

        $data['dataList'][] = array(
            "num"                => "6",
            'type'               => "vocabulary_look_listen",
            "timeRange"          => "",
            "text"               => "a ruler",
            "media_filename"     => "images/ruler.png",
            "media_type"         => 'image',
            "picture"            => "images/ruler.png",
            "clickEvents"=>array(
                "click_1"=>array(
                    "timeRange"          => "00:17-00:19",
                    "text"               => "a ruler",
                    "media_filename"     => "media/WG_u1_voc.mp3",
                    "media_type"         => 'audio',
                ),
                "click_2"=>array(
                    "timeRange"          => "00:19-00:21",
                    "text"               => "It's a ruler.",
                    "media_filename"     => "media/WG_u1_voc.mp3",
                    "media_type"         => 'audio',
                )
            ),
            "childEvents"     =>array(

            ),
            "selectEvents"=>array(
            ),
        );

        $data['dataList'][] = array(
            "num"                => "7",
            'type'               => "vocabulary_look_listen",
            "timeRange"          => "",
            "text"               => "a bag",
            "media_filename"     => "images/bag.png",
            "media_type"         => 'image',
            "picture"            => "images/bag.png",
            "clickEvents"=>array(
                "click_1"=>array(
                    "timeRange"          => "00:21-00:23",
                    "text"               => "a bag",
                    "media_filename"     => "media/WG_u1_voc.mp3",
                    "media_type"         => 'audio',
                ),
                "click_2"=>array(
                    "timeRange"          => "00:23-00:25",
                    "text"               => "It's a bag.",
                    "media_filename"     => "media/WG_u1_voc.mp3",
                    "media_type"         => 'audio',
                )
            ),
            "childEvents"     =>array(

            ),
            "selectEvents"=>array(
            ),
        );

        $data['dataList'][] = array(
            "num"                => "8",
            'type'               => "vocabulary_look_listen",
            "timeRange"          => "",
            "text"               => "a crayon",
            "media_filename"     => "images/crayon.png",
            "media_type"         => 'image',
            "picture"            => "images/crayon.png",
            "clickEvents"=>array(
                "click_1"=>array(
                    "timeRange"          => "00:25-00:27",
                    "text"               => "a crayon",
                    "media_filename"     => "media/WG_u1_voc.mp3",
                    "media_type"         => 'audio',
                ),
                "click_2"=>array(
                    "timeRange"          => "00:27-00:29",
                    "text"               => "It's a crayon.",
                    "media_filename"     => "media/WG_u1_voc.mp3",
                    "media_type"         => 'audio',
                )
            ),
            "childEvents"     =>array(

            ),
            "selectEvents"=>array(
            ),
        );

        $data['dataList'][] = array(
            "num"                => "9",
            'type'               => "vocabulary_look_listen",
            "timeRange"          => "",
            "text"               => "a pencil case",
            "media_filename"     => "images/pencil_case.png",
            "media_type"         => 'image',
            "picture"            => "images/pencil_case.png",
            "clickEvents"=>array(
                "click_1"=>array(
                    "timeRange"          => "00:29-00:31",
                    "text"               => "a pencil case",
                    "media_filename"     => "media/WG_u1_voc.mp3",
                    "media_type"         => 'audio',
                ),
                "click_2"=>array(
                    "timeRange"          => "00:31-00:34",
                    "text"               => "It's a pencil case.",
                    "media_filename"     => "media/WG_u1_voc.mp3",
                    "media_type"         => 'audio',
                )
            ),
            "childEvents"     =>array(

            ),
            "selectEvents"=>array(
            ),
        );

        $a = json_encode($data);
        $fp = fopen('json187.txt', "w");
        fwrite($fp, $a);
        fclose($fp);
        return;
    }


    //vocabulary Look and repeat
    //自动播放和识别
    public function getPart188()
    {
        $data = array(
            "level_id"   =>1,
            "unit_id"    =>9,
            "lesson_id"  =>74,
            "part_id"    =>188,
            "play_type"  =>"auto" //非自动播放事件
        );
        //点击第一次 执行 0,第二次执行1,依次循环
        $data['dataList'][] = array(
            "num"                => "1",
            'type'               => "vocabulary_look_and_repeat",
            "timeRange"          => "",
            "text"               => "a pen",
            "media_filename"     => "images/pen.png",
            "media_type"         => 'image',
            "picture"            => "images/pen.png",
            "clickEvents"=>array(
                "click_1"=>array(
                    "timeRange"          => "00:00:00-00:01:391",
                    "text"               => "a pen",
                    "media_filename"     => "media/3_WG_u1_mouth_voc.mp4",
                    "media_type"         => 'mouth',
                ),
            ),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"record",
                ),
                "1"=>array(
                    "type"=>"replay",
                ),
                "2"=>array(
                    "type"=>"repeat",
                ),
            ),
            "selectEvents"=>array(
            ),
        );

        $data['dataList'][] = array(
            "num"                => "2",
            'type'               => "vocabulary_look_and_repeat",
            "timeRange"          => "",
            "text"               => "a book",
            "media_filename"     => "images/book.png",
            "media_type"         => 'image',
            "picture"            => "images/book.png",
            "clickEvents"=>array(
                "click_1"=>array(
                    "timeRange"          => "00:10:352-00:12:273",
                    "text"               => "a book",
                    "media_filename"     => "media/3_WG_u1_mouth_voc.mp4",
                    "media_type"         => 'mouth',
                ),
            ),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"record",
                ),
                "1"=>array(
                    "type"=>"replay",
                ),
                "2"=>array(
                    "type"=>"repeat",
                ),
            ),
            "selectEvents"=>array(
            ),
        );

        $data['dataList'][] = array(
            "num"                => "3",
            'type'               => "vocabulary_look_and_repeat",
            "timeRange"          => "",
            "text"               => "a pencil",
            "media_filename"     => "images/pencil.png",
            "media_type"         => 'image',
            "picture"            => "images/pencil.png",
            "clickEvents"=>array(
                "click_1"=>array(
                    "timeRange"          => "00:02:541-00:04:283",
                    "text"               => "a pencil",
                    "media_filename"     => "media/3_WG_u1_mouth_voc.mp4",
                    "media_type"         => 'mouth',
                ),
            ),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"record",
                ),
                "1"=>array(
                    "type"=>"replay",
                ),
                "2"=>array(
                    "type"=>"repeat",
                ),
            ),
            "selectEvents"=>array(
            ),
        );

        $data['dataList'][] = array(
            "num"                => "4",
            'type'               => "vocabulary_look_and_repeat",
            "timeRange"          => "",
            "text"               => "an eraser",
            "media_filename"     => "images/eraser.png",
            "media_type"         => 'image',
            "picture"            => "images/eraser.png",
            "clickEvents"=>array(
                "click_1"=>array(
                    "timeRange"          => "00:04:335-00:05:874",
                    "text"               => "an eraser",
                    "media_filename"     => "media/3_WG_u1_mouth_voc.mp4",
                    "media_type"         => 'mouth',
                ),
            ),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"record",
                ),
                "1"=>array(
                    "type"=>"replay",
                ),
                "2"=>array(
                    "type"=>"repeat",
                ),
            ),
            "selectEvents"=>array(
            ),
        );

        $data['dataList'][] = array(
            "num"                => "5",
            'type'               => "vocabulary_look_and_repeat",
            "timeRange"          => "",
            "text"               => "a ruler",
            "media_filename"     => "images/ruler.png",
            "media_type"         => 'image',
            "picture"            => "images/ruler.png",
            "clickEvents"=>array(
                "click_1"=>array(
                    "timeRange"          => "00:08:699-00:10:067",
                    "text"               => "a ruler",
                    "media_filename"     => "media/3_WG_u1_mouth_voc.mp4",
                    "media_type"         => 'mouth',
                ),
            ),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"record",
                ),
                "1"=>array(
                    "type"=>"replay",
                ),
                "2"=>array(
                    "type"=>"repeat",
                ),
            ),
            "selectEvents"=>array(
            ),
        );

        $data['dataList'][] = array(
            "num"                => "6",
            'type'               => "vocabulary_look_and_repeat",
            "timeRange"          => "",
            "text"               => "a bag",
            "media_filename"     => "images/bag.png",
            "media_type"         => 'image',
            "picture"            => "images/bag.png",
            "clickEvents"=>array(
                "click_1"=>array(
                    "timeRange"          => "00:06:945-00:08:565",
                    "text"               => "a bag",
                    "media_filename"     => "media/3_WG_u1_mouth_voc.mp4",
                    "media_type"         => 'mouth',
                ),
            ),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"record",
                ),
                "1"=>array(
                    "type"=>"replay",
                ),
                "2"=>array(
                    "type"=>"repeat",
                ),
            ),
            "selectEvents"=>array(
            ),
        );

        $data['dataList'][] = array(
            "num"                => "7",
            'type'               => "vocabulary_look_and_repeat",
            "timeRange"          => "",
            "text"               => "a crayon",
            "media_filename"     => "images/crayon.png",
            "media_type"         => 'image',
            "picture"            => "images/crayon.png",
            "clickEvents"=>array(
                "click_1"=>array(
                    "timeRange"          => "00:12:474-00:13:756",
                    "text"               => "a crayon",
                    "media_filename"     => "media/3_WG_u1_mouth_voc.mp4",
                    "media_type"         => 'mouth',
                ),
            ),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"record",
                ),
                "1"=>array(
                    "type"=>"replay",
                ),
                "2"=>array(
                    "type"=>"repeat",
                ),
            ),
            "selectEvents"=>array(
            ),
        );

        $data['dataList'][] = array(
            "num"                => "8",
            'type'               => "vocabulary_look_and_repeat",
            "timeRange"          => "",
            "text"               => "a pencil case",
            "media_filename"     => "images/pencil_case.png",
            "media_type"         => 'image',
            "picture"            => "images/pencil_case.png",
            "clickEvents"=>array(
                "click_1"=>array(
                    "timeRange"          => "00:14:244-00:16:067",
                    "text"               => "a pencil case",
                    "media_filename"     => "media/3_WG_u1_mouth_voc.mp4",
                    "media_type"         => 'mouth',
                ),
            ),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"record",
                ),
                "1"=>array(
                    "type"=>"replay",
                ),
                "2"=>array(
                    "type"=>"repeat",
                ),
            ),
            "selectEvents"=>array(
            ),
        );

        $a = json_encode($data);
        $fp = fopen('json188.txt', "w");
        fwrite($fp, $a);
        fclose($fp);
        return;
    }


    //word_repetition SR
    //自动播放和识别
    public function getPart189()
    {
        $data = array(
            "level_id"   =>1,
            "unit_id"    =>9,
            "lesson_id"  =>74,
            "part_id"    =>189,
            "play_type"  =>"auto" //非自动播放事件
        );
        //点击第一次 执行 0,第二次执行1,依次循环
        $data['dataList'][] = array(
            "num"                => "1",
            'type'               => "word_repetition_sr",
            "timeRange"          => "",
            "text"               => "a pen",
            "media_filename"     => "images/pen.png",
            "media_type"         => 'image',
            "picture"            => "images/pen.png",
            "clickEvents"=>array(
                "click_1"=>array(
                    "timeRange"          => "00:00-00:02",
                    "text"               => "a pen",
                    "media_filename"     => "media/WG_u1_voc.mp3",
                    "media_type"         => 'audio',
                ),
            ),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"sr",
                ),
            ),
            "selectEvents"=>array(
            ),
        );

        $data['dataList'][] = array(
            "num"                => "2",
            'type'               => "word_repetition_sr",
            "timeRange"          => "",
            "text"               => "a book",
            "media_filename"     => "images/book.png",
            "media_type"         => 'image',
            "picture"            => "images/book.png",
            "clickEvents"=>array(
                "click_1"=>array(
                    "timeRange"          => "00:04-00:06",
                    "text"               => "a book",
                    "media_filename"     => "media/WG_u1_voc.mp3",
                    "media_type"         => 'audio',
                ),
            ),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"sr",
                ),
            ),
            "selectEvents"=>array(
            ),
        );

        $data['dataList'][] = array(
            "num"                => "3",
            'type'               => "word_repetition_sr",
            "timeRange"          => "",
            "text"               => "a pencil",
            "media_filename"     => "images/pencil.png",
            "media_type"         => 'image',
            "picture"            => "images/pencil.png",
            "clickEvents"=>array(
                "click_1"=>array(
                    "timeRange"          => "00:08-00:10",
                    "text"               => "a pencil",
                    "media_filename"     => "media/WG_u1_voc.mp3",
                    "media_type"         => 'audio',
                ),
            ),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"sr",
                ),
            ),
            "selectEvents"=>array(
            ),
        );

        $data['dataList'][] = array(
            "num"                => "4",
            'type'               => "word_repetition_sr",
            "timeRange"          => "",
            "text"               => "an eraser",
            "media_filename"     => "images/eraser.png",
            "media_type"         => 'image',
            "picture"            => "images/eraser.png",
            "clickEvents"=>array(
                "click_1"=>array(
                    "timeRange"          => "00:12-00:14",
                    "text"               => "an eraser",
                    "media_filename"     => "media/WG_u1_voc.mp3",
                    "media_type"         => 'audio',
                ),
            ),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"sr",
                ),
            ),
            "selectEvents"=>array(
            ),
        );

        $data['dataList'][] = array(
            "num"                => "5",
            'type'               => "word_repetition_sr",
            "timeRange"          => "",
            "text"               => "a ruler",
            "media_filename"     => "images/ruler.png",
            "media_type"         => 'image',
            "picture"            => "images/ruler.png",
            "clickEvents"=>array(
                "click_1"=>array(
                    "timeRange"          => "00:17-00:19",
                    "text"               => "a ruler",
                    "media_filename"     => "media/WG_u1_voc.mp3",
                    "media_type"         => 'audio',
                ),
            ),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"sr",
                ),
            ),
            "selectEvents"=>array(
            ),
        );
        $data['dataList'][] = array(
            "num"                => "6",
            'type'               => "word_repetition_sr",
            "timeRange"          => "",
            "text"               => "a bag",
            "media_filename"     => "images/bag.png",
            "media_type"         => 'image',
            "picture"            => "images/bag.png",
            "clickEvents"=>array(
                "click_1"=>array(
                    "timeRange"          => "00:21-00:23",
                    "text"               => "a bag",
                    "media_filename"     => "media/WG_u1_voc.mp3",
                    "media_type"         => 'audio',
                ),
            ),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"sr",
                ),
            ),
            "selectEvents"=>array(
            ),
        );

        $data['dataList'][] = array(
            "num"                => "7",
            'type'               => "word_repetition_sr",
            "timeRange"          => "",
            "text"               => "a crayon",
            "media_filename"     => "images/crayon.png",
            "media_type"         => 'image',
            "picture"            => "images/crayon.png",
            "clickEvents"=>array(
                "click_1"=>array(
                    "timeRange"          => "00:25-00:27",
                    "text"               => "a crayon",
                    "media_filename"     => "media/WG_u1_voc.mp3",
                    "media_type"         => 'audio',
                ),
            ),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"sr",
                ),
            ),
            "selectEvents"=>array(
            ),
        );

        $data['dataList'][] = array(
            "num"                => "8",
            'type'               => "word_repetition_sr",
            "timeRange"          => "",
            "text"               => "a pencil case",
            "media_filename"     => "images/pencil_case.png",
            "media_type"         => 'image',
            "picture"            => "images/pencil_case.png",
            "clickEvents"=>array(
                "click_1"=>array(
                    "timeRange"          => "00:29-00:31",
                    "text"               => "a pencil case",
                    "media_filename"     => "media/WG_u1_voc.mp3",
                    "media_type"         => 'audio',
                ),
            ),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"sr",
                ),
            ),
            "selectEvents"=>array(
            ),
        );

        $a = json_encode($data);
        $fp = fopen('json189.txt', "w");
        fwrite($fp, $a);
        fclose($fp);
        return;
    }

    //choose right answer
    //自动播放和识别
    public function getPart190()
    {
        $data = array(
            "level_id"   =>1,
            "unit_id"    =>9,
            "lesson_id"  =>74,
            "part_id"    =>190,
            "play_type"  =>"auto" //非自动播放事件
        );
        $data['systems'][] = array(
            "num"             => "1",
            'type'            => "choose_right_answer",
            "timeRange"       => "00:49:729-00:51:497",
            "text"            => "Let's check.",
            "media_filename"  => 'media/WG_system.mp3',
            "clickEvents"     =>array(
            ),
            "childEvents"     =>array(
            ),
            "selectEvents"=>array(
            ),
            "media_type" => 'audio',
            "picture" => "",
            "pictures" => array()
        );

        $data['systems'][] = array(
            "num"             => "1",
            'type'            => "choose_right_answer",
            "timeRange"       => "01:04:058-01:06:000",
            "text"            => "Listen and click.",
            "media_filename"  => 'media/WG_system.mp3',
            "clickEvents"     =>array(
            ),
            "childEvents"     =>array(
            ),
            "selectEvents"=>array(
            ),
            "media_type" => 'audio',
            "picture" => "",
            "pictures" => array()
        );

//        $data['events'][] = array(
//            "num"                => "1",
//            'type'               => "choose_right_answer",
//            "timeRange"          => "00:00-00:02",
//            "text"               => "a pen",
//            "media_filename"     => "media/WG_u1_voc.mp3",
//            "media_type"         => 'audio',
//            "scores"=>10,
//            "items"=>array(
//                "0"=>array("type"=>"image","media_filename"=>"images/pen.png","text"=>"a pen","isCorrect"=>true),
//                "1"=>array("type"=>"image","media_filename"=>"images/book.png", "text"=>"a book","isCorrect"=>false),
//            ),
//            "picture"   => "",
//            "clickEvents"=>array(
//                "click_1"=>array(
//                    "type"=>"score",
//                    "score"=>10,
//                ),
//                "click_2"=>array(
//                    "type"=>"score",
//                    "score"=>5,
//                ),
//            ),
//            "childEvents"     =>array(
//
//            ),
//            "selectEvents"=>array(
//
//            ),
//        );

        $data['events'][] = array(
            "num"                => "2",
            'type'               => "choose_right_answer",
            "timeRange"          => "00:00-00:02",
            "text"               => "a pen",
            "media_filename"     => "media/WG_u1_voc.mp3",
            "media_type"         => 'audio',
            "scores"=>10,
            "items"=>array(
                "0"=>array("type"=>"image","media_filename"=>"images/pen.png","text"=>"a pen","isCorrect"=>true),
                "1"=>array("type"=>"image","media_filename"=>"images/book.png", "text"=>"a book","isCorrect"=>false),
            ),
            "picture"   => "",
            "clickEvents"=>array(
                "click_1"=>array(
                    "type"=>"score",
                    "score"=>10,
                ),
                "click_2"=>array(
                    "type"=>"score",
                    "score"=>5,
                ),
            ),
            "childEvents"     =>array(

            ),
            "selectEvents"=>array(

            ),
        );

        $data['events'][] = array(
            "num"                => "3",
            'type'               => "choose_right_answer",
            "timeRange"          => "00:02-00:04",
            "text"               => "It's a pen.",
            "media_filename"     => "media/WG_u1_voc.mp3",
            "media_type"         => 'audio',
            "scores"=>10,
            "items"=>array(
                "0"=>array("type"=>"image","media_filename"=>"images/pen.png","text"=>"a pen","isCorrect"=>true),
                "1"=>array("type"=>"image","media_filename"=>"images/pencil.png", "text"=>"a pencil","isCorrect"=>false),
            ),
            "picture"   => "",
            "clickEvents"=>array(
                "click_1"=>array(
                    "type"=>"score",
                    "score"=>10,
                ),
                "click_2"=>array(
                    "type"=>"score",
                    "score"=>5,
                ),
            ),
            "childEvents"     =>array(

            ),
            "selectEvents"=>array(

            ),
        );

        $data['events'][] = array(
            "num"                => "4",
            'type'               => "choose_right_answer",
            "timeRange"          => "00:04-00:06",
            "text"               => "a book",
            "media_filename"     => "media/WG_u1_voc.mp3",
            "media_type"         => 'audio',
            "scores"=>10,
            "items"=>array(
                "0"=>array("type"=>"image","media_filename"=>"images/pencil.png","text"=>"a pencil","isCorrect"=>false),
                "1"=>array("type"=>"image","media_filename"=>"images/book.png", "text"=>"a book","isCorrect"=>true),
            ),
            "picture"   => "",
            "clickEvents"=>array(
                "click_1"=>array(
                    "type"=>"score",
                    "score"=>10,
                ),
                "click_2"=>array(
                    "type"=>"score",
                    "score"=>5,
                ),
            ),
            "childEvents"     =>array(

            ),
            "selectEvents"=>array(

            ),
        );

        $data['events'][] = array(
            "num"                => "5",
            'type'               => "choose_right_answer",
            "timeRange"          => "00:06-00:08",
            "text"               => "It's a book.",
            "media_filename"     => "media/WG_u1_voc.mp3",
            "media_type"         => 'audio',
            "scores"=>10,
            "items"=>array(
                "0"=>array("type"=>"image","media_filename"=>"images/bag.png","text"=>"a bag","isCorrect"=>false),
                "1"=>array("type"=>"image","media_filename"=>"images/book.png", "text"=>"a book","isCorrect"=>true),
            ),
            "picture"   => "",
            "clickEvents"=>array(
                "click_1"=>array(
                    "type"=>"score",
                    "score"=>10,
                ),
                "click_2"=>array(
                    "type"=>"score",
                    "score"=>5,
                ),
            ),
            "childEvents"     =>array(

            ),
            "selectEvents"=>array(

            ),
        );

        $data['events'][] = array(
            "num"                => "6",
            'type'               => "choose_right_answer",
            "timeRange"          => "00:08-00:10",
            "text"               => "a pencil",
            "media_filename"     => "media/WG_u1_voc.mp3",
            "media_type"         => 'audio',
            "scores"=>10,
            "items"=>array(
                "0"=>array("type"=>"image","media_filename"=>"images/pencil.png","text"=>"a pencil","isCorrect"=>true),
                "1"=>array("type"=>"image","media_filename"=>"images/eraser.png", "text"=>"an eraser","isCorrect"=>false),
            ),
            "picture"   => "",
            "clickEvents"=>array(
                "click_1"=>array(
                    "type"=>"score",
                    "score"=>10,
                ),
                "click_2"=>array(
                    "type"=>"score",
                    "score"=>5,
                ),
            ),
            "childEvents"     =>array(

            ),
            "selectEvents"=>array(

            ),
        );

        $data['events'][] = array(
            "num"                => "7",
            'type'               => "choose_right_answer",
            "timeRange"          => "00:10-00:12",
            "text"               => "It's a pencil.",
            "media_filename"     => "media/WG_u1_voc.mp3",
            "media_type"         => 'audio',
            "scores"=>10,
            "items"=>array(
                "0"=>array("type"=>"image","media_filename"=>"images/pencil.png","text"=>"a pencil","isCorrect"=>true),
                "1"=>array("type"=>"image","media_filename"=>"images/pen.png", "text"=>"a pen","isCorrect"=>false),
            ),
            "picture"   => "",
            "clickEvents"=>array(
                "click_1"=>array(
                    "type"=>"score",
                    "score"=>10,
                ),
                "click_2"=>array(
                    "type"=>"score",
                    "score"=>5,
                ),
            ),
            "childEvents"     =>array(

            ),
            "selectEvents"=>array(

            ),
        );

        $data['events'][] = array(
            "num"                => "8",
            'type'               => "choose_right_answer",
            "timeRange"          => "00:12-00:14",
            "text"               => "an eraser",
            "media_filename"     => "media/WG_u1_voc.mp3",
            "media_type"         => 'audio',
            "scores"=>10,
            "items"=>array(
                "0"=>array("type"=>"image","media_filename"=>"images/book.png","text"=>"a book","isCorrect"=>false),
                "1"=>array("type"=>"image","media_filename"=>"images/eraser.png", "text"=>"an eraser","isCorrect"=>true),
            ),
            "picture"   => "",
            "clickEvents"=>array(
                "click_1"=>array(
                    "type"=>"score",
                    "score"=>10,
                ),
                "click_2"=>array(
                    "type"=>"score",
                    "score"=>5,
                ),
            ),
            "childEvents"     =>array(

            ),
            "selectEvents"=>array(

            ),
        );

        $data['events'][] = array(
            "num"                => "9",
            'type'               => "choose_right_answer",
            "timeRange"          => "00:14-00:17",
            "text"               => "It's an eraser.",
            "media_filename"     => "media/WG_u1_voc.mp3",
            "media_type"         => 'audio',
            "scores"=>10,
            "items"=>array(
                "0"=>array("type"=>"image","media_filename"=>"images/bag.png","text"=>"a bag","isCorrect"=>false),
                "1"=>array("type"=>"image","media_filename"=>"images/eraser.png", "text"=>"an eraser","isCorrect"=>true),
            ),
            "picture"   => "",
            "clickEvents"=>array(
                "click_1"=>array(
                    "type"=>"score",
                    "score"=>10,
                ),
                "click_2"=>array(
                    "type"=>"score",
                    "score"=>5,
                ),
            ),
            "childEvents"     =>array(

            ),
            "selectEvents"=>array(

            ),
        );

        $data['events'][] = array(
            "num"                => "10",
            'type'               => "choose_right_answer",
            "timeRange"          => "00:17-00:19",
            "text"               => "a ruler",
            "media_filename"     => "media/WG_u1_voc.mp3",
            "media_type"         => 'audio',
            "scores"=>10,
            "items"=>array(
                "0"=>array("type"=>"image","media_filename"=>"images/ruler.png","text"=>"a ruler","isCorrect"=>true),
                "1"=>array("type"=>"image","media_filename"=>"images/crayon.png", "text"=>"a crayon","isCorrect"=>false),
            ),
            "picture"   => "",
            "clickEvents"=>array(
                "click_1"=>array(
                    "type"=>"score",
                    "score"=>10,
                ),
                "click_2"=>array(
                    "type"=>"score",
                    "score"=>5,
                ),
            ),
            "childEvents"     =>array(

            ),
            "selectEvents"=>array(

            ),
        );

        $data['events'][] = array(
            "num"                => "11",
            'type'               => "choose_right_answer",
            "timeRange"          => "00:19-00:21",
            "text"               => "It's a ruler.",
            "media_filename"     => "media/WG_u1_voc.mp3",
            "media_type"         => 'audio',
            "scores"=>10,
            "items"=>array(
                "0"=>array("type"=>"image","media_filename"=>"images/ruler.png","text"=>"a ruler","isCorrect"=>true),
                "1"=>array("type"=>"image","media_filename"=>"images/pen.png", "text"=>"a pen","isCorrect"=>false),
            ),
            "picture"   => "",
            "clickEvents"=>array(
                "click_1"=>array(
                    "type"=>"score",
                    "score"=>10,
                ),
                "click_2"=>array(
                    "type"=>"score",
                    "score"=>5,
                ),
            ),
            "childEvents"     =>array(

            ),
            "selectEvents"=>array(

            ),
        );

        $data['events'][] = array(
            "num"                => "12",
            'type'               => "choose_right_answer",
            "timeRange"          => "00:21-00:23",
            "text"               => "a bag",
            "media_filename"     => "media/WG_u1_voc.mp3",
            "media_type"         => 'audio',
            "scores"=>10,
            "items"=>array(
                "0"=>array("type"=>"image","media_filename"=>"images/book.png","text"=>"a book","isCorrect"=>false),
                "1"=>array("type"=>"image","media_filename"=>"images/bag.png", "text"=>"a bag","isCorrect"=>true),
            ),
            "picture"   => "",
            "clickEvents"=>array(
                "click_1"=>array(
                    "type"=>"score",
                    "score"=>10,
                ),
                "click_2"=>array(
                    "type"=>"score",
                    "score"=>5,
                ),
            ),
            "childEvents"     =>array(

            ),
            "selectEvents"=>array(

            ),
        );

        $data['events'][] = array(
            "num"                => "13",
            'type'               => "choose_right_answer",
            "timeRange"          => "00:23-00:25",
            "text"               => "It's a bag.",
            "media_filename"     => "media/WG_u1_voc.mp3",
            "media_type"         => 'audio',
            "scores"=>10,
            "items"=>array(
                "0"=>array("type"=>"image","media_filename"=>"images/pencil.png","text"=>"a pencil","isCorrect"=>false),
                "1"=>array("type"=>"image","media_filename"=>"images/bag.png", "text"=>"a bag","isCorrect"=>true),
            ),
            "picture"   => "",
            "clickEvents"=>array(
                "click_1"=>array(
                    "type"=>"score",
                    "score"=>10,
                ),
                "click_2"=>array(
                    "type"=>"score",
                    "score"=>5,
                ),
            ),
            "childEvents"     =>array(

            ),
            "selectEvents"=>array(

            ),
        );

        $data['events'][] = array(
            "num"                => "14",
            'type'               => "choose_right_answer",
            "timeRange"          => "00:25-00:27",
            "text"               => "a crayon",
            "media_filename"     => "media/WG_u1_voc.mp3",
            "media_type"         => 'audio',
            "scores"=>10,
            "items"=>array(
                "0"=>array("type"=>"image","media_filename"=>"images/crayon.png","text"=>"a crayon","isCorrect"=>true),
                "1"=>array("type"=>"image","media_filename"=>"images/pen.png", "text"=>"a pen","isCorrect"=>false),
            ),
            "picture"   => "",
            "clickEvents"=>array(
                "click_1"=>array(
                    "type"=>"score",
                    "score"=>10,
                ),
                "click_2"=>array(
                    "type"=>"score",
                    "score"=>5,
                ),
            ),
            "childEvents"     =>array(

            ),
            "selectEvents"=>array(

            ),
        );

        $data['events'][] = array(
            "num"                => "15",
            'type'               => "choose_right_answer",
            "timeRange"          => "00:27-00:29",
            "text"               => "It's a crayon.",
            "media_filename"     => "media/WG_u1_voc.mp3",
            "media_type"         => 'audio',
            "scores"=>10,
            "items"=>array(
                "0"=>array("type"=>"image","media_filename"=>"images/crayon.png","text"=>"a crayon","isCorrect"=>true),
                "1"=>array("type"=>"image","media_filename"=>"images/pencil.png", "text"=>"a pencil","isCorrect"=>false),
            ),
            "picture"   => "",
            "clickEvents"=>array(
                "click_1"=>array(
                    "type"=>"score",
                    "score"=>10,
                ),
                "click_2"=>array(
                    "type"=>"score",
                    "score"=>5,
                ),
            ),
            "childEvents"     =>array(

            ),
            "selectEvents"=>array(

            ),
        );

        $data['events'][] = array(
            "num"                => "16",
            'type'               => "choose_right_answer",
            "timeRange"          => "00:29-00:31",
            "text"               => "a pencil case",
            "media_filename"     => "media/WG_u1_voc.mp3",
            "media_type"         => 'audio',
            "scores"=>10,
            "items"=>array(
                "0"=>array("type"=>"image","media_filename"=>"images/pen.png","text"=>"a pen","isCorrect"=>false),
                "1"=>array("type"=>"image","media_filename"=>"images/pencil_case.png", "text"=>"a pencil case","isCorrect"=>true),
            ),
            "picture"   => "",
            "clickEvents"=>array(
                "click_1"=>array(
                    "type"=>"score",
                    "score"=>10,
                ),
                "click_2"=>array(
                    "type"=>"score",
                    "score"=>5,
                ),
            ),
            "childEvents"     =>array(

            ),
            "selectEvents"=>array(

            ),
        );

        $data['events'][] = array(
            "num"                => "17",
            'type'               => "choose_right_answer",
            "timeRange"          => "00:31-00:34",
            "text"               => "It's a pencil case.",
            "media_filename"     => "media/WG_u1_voc.mp3",
            "media_type"         => 'audio',
            "scores"=>10,
            "items"=>array(
                "0"=>array("type"=>"image","media_filename"=>"images/bag.png","text"=>"a bag","isCorrect"=>false),
                "1"=>array("type"=>"image","media_filename"=>"images/pencil_case.png", "text"=>"a pencil case","isCorrect"=>true),
            ),
            "picture"   => "",
            "clickEvents"=>array(
                "click_1"=>array(
                    "type"=>"score",
                    "score"=>10,
                ),
                "click_2"=>array(
                    "type"=>"score",
                    "score"=>5,
                ),
            ),
            "childEvents"     =>array(

            ),
            "selectEvents"=>array(

            ),
        );

        $a = json_encode($data);
        $fp = fopen('json190.txt', "w");
        fwrite($fp, $a);
        fclose($fp);
        return;
    }


    public function getPart191()
    {
        $data = array(
            "level_id"   =>1,
            "unit_id"    =>9,
            "lesson_id"  =>75,
            "part_id"    =>191,
            "play_type"  =>"auto"
        );
        $data['systems'][] = array(
            "num"             => "1",
            'type'            => "look_and_listen",
            "timeRange"       => "00:42:425-00:44:148",
            "text"            => "Come to story.",
            "media_filename"  => 'media/WG_system.mp3',
            "clickEvents"     =>array(
            ),
            "childEvents"     =>array(
            ),
            "selectEvents"=>array(
            ),
            "media_type" => 'audio',
            "picture" => "",
            "pictures" => array()
        );

        $data['events'][] = array(
            "num"             => "2",
            'type'            => "look_and_listen",
            "timeRange"       => "00:00:00-00:06:00",
            "text"            => "Wow! Look!",
            "media_filename"  => 'media/WG_u1_passage.mp4',
            "clickEvents"     =>array(
            ),
            "childEvents"     =>array(
            ),
            "selectEvents"=>array(
            ),
            "media_type" => 'video',
            "picture" => "",
            "pictures" => array()
        );

        $data['events'][] = array(
            "num"             => "3",
            'type'            => "look_and_listen",
            "timeRange"       => "00:06:00-00:08:15",
            "text"            => "What's this?",
            "media_filename"  => 'media/WG_u1_passage.mp4',
            "clickEvents"     =>array(
            ),
            "childEvents"     =>array(
            ),
            "selectEvents"=>array(
            ),
            "media_type" => 'video',
            "picture" => "",
            "pictures" => array()
        );

        $data['events'][] = array(
            "num"             => "4",
            'type'            => "look_and_listen",
            "timeRange"       => "00:08:15-00:10:857",
            "text"            => "It's a book.",
            "media_filename"  => 'media/WG_u1_passage.mp4',
            "clickEvents"     =>array(
            ),
            "childEvents"     =>array(
            ),
            "selectEvents"=>array(
            ),
            "media_type" => 'video',
            "picture" => "",
            "pictures" => array()
        );

        $data['events'][] = array(
            "num"             => "5",
            'type'            => "look_and_listen",
            "timeRange"       => "00:10:857-00:14:749",
            "text"            => "It's a pencil case.",
            "media_filename"  => 'media/WG_u1_passage.mp4',
            "clickEvents"     =>array(
            ),
            "childEvents"     =>array(
            ),
            "selectEvents"=>array(
            ),
            "media_type" => 'video',
            "picture" => "",
            "pictures" => array()
        );

        $data['events'][] = array(
            "num"             => "6",
            'type'            => "look_and_listen",
            "timeRange"       => "00:14:749-00:18:036",
            "text"            => "It's a pencil.",
            "media_filename"  => 'media/WG_u1_passage.mp4',
            "clickEvents"     =>array(
            ),
            "childEvents"     =>array(
            ),
            "selectEvents"=>array(
            ),
            "media_type" => 'video',
            "picture" => "",
            "pictures" => array()
        );

        $data['events'][] = array(
            "num"             => "7",
            'type'            => "look_and_listen",
            "timeRange"       => "00:18:036-00:22:273",
            "text"            => "What's this?",
            "media_filename"  => 'media/WG_u1_passage.mp4',
            "clickEvents"     =>array(
            ),
            "childEvents"     =>array(
            ),
            "selectEvents"=>array(
            ),
            "media_type" => 'video',
            "picture" => "",
            "pictures" => array()
        );

        $data['events'][] = array(
            "num"             => "8",
            'type'            => "look_and_listen",
            "timeRange"       => "00:22:273-00:25:114",
            "text"            => "Wow, it's a bag.",
            "media_filename"  => 'media/WG_u1_passage.mp4',
            "clickEvents"     =>array(
            ),
            "childEvents"     =>array(
            ),
            "selectEvents"=>array(
            ),
            "media_type" => 'video',
            "picture" => "",
            "pictures" => array()
        );

        $data['events'][] = array(
            "num"             => "9",
            'type'            => "look_and_listen",
            "timeRange"       => "00:25:114-00:29:584",
            "text"            => "What's this?",
            "media_filename"  => 'media/WG_u1_passage.mp4',
            "clickEvents"     =>array(
            ),
            "childEvents"     =>array(
            ),
            "selectEvents"=>array(
            ),
            "media_type" => 'video',
            "picture" => "",
            "pictures" => array()
        );

        $data['events'][] = array(
            "num"             => "10",
            'type'            => "look_and_listen",
            "timeRange"       => "00:29:584-00:31:994",
            "text"            => "It's an eraser.",
            "media_filename"  => 'media/WG_u1_passage.mp4',
            "clickEvents"     =>array(
            ),
            "childEvents"     =>array(
            ),
            "selectEvents"=>array(
            ),
            "media_type" => 'video',
            "picture" => "",
            "pictures" => array()
        );

        $data['events'][] = array(
            "num"             => "11",
            'type'            => "look_and_listen",
            "timeRange"       => "00:31:994-00:36:006",
            "text"            => "Look, it's a crayon.",
            "media_filename"  => 'media/WG_u1_passage.mp4',
            "clickEvents"     =>array(
            ),
            "childEvents"     =>array(
            ),
            "selectEvents"=>array(
            ),
            "media_type" => 'video',
            "picture" => "",
            "pictures" => array()
        );

        $data['events'][] = array(
            "num"             => "12",
            'type'            => "look_and_listen",
            "timeRange"       => "00:36:006-00:41:143",
            "text"            => "It's a pen and it's a ruler.",
            "media_filename"  => 'media/WG_u1_passage.mp4',
            "clickEvents"     =>array(
            ),
            "childEvents"     =>array(
            ),
            "selectEvents"=>array(
            ),
            "media_type" => 'video',
            "picture" => "",
            "pictures" => array()
        );

        $data['events'][] = array(
            "num"             => "13",
            'type'            => "look_and_listen",
            "timeRange"       => "00:41:143-00:46:292",
            "text"            => "Bye-bye.",
            "media_filename"  => 'media/WG_u1_passage.mp4',
            "clickEvents"     =>array(
            ),
            "childEvents"     =>array(
            ),
            "selectEvents"=>array(
            ),
            "media_type" => 'video',
            "picture" => "",
            "pictures" => array()
        );

        $a = json_encode($data);
        $fp = fopen('json191.txt', "w");
        fwrite($fp, $a);
        fclose($fp);
        return;
    }

    public function getPart192()
    {
        $data = array(
            "level_id"   =>1,
            "unit_id"    =>9,
            "lesson_id"  =>75,
            "part_id"    =>192,
            "play_type"  =>"auto"
        );

        $data['systems'][] = array(
            "num"             => "1",
            'type'            => "look_listen_record",
            "timeRange"       => "01:06:000-01:08:133",
            "text"            => "listen and speak",
            "media_filename"  => 'media/WG_system.mp3',
            "clickEvents"     =>array(
            ),
            "childEvents"     =>array(
            ),
            "selectEvents"=>array(
            ),
            "media_type" => 'audio',
            "picture" => "",
            "pictures" => array()
        );


        $data['events'][] = array(
            "num"            => "3",
            'type'           => "look_listen_record",
            "timeRange"      => "00:02:337-00:04:379",
            "text"           => "What's this?",
            "media_filename" => 'media/4_WG_u1_mouth_passage.mp4',
            "media_type"     => 'mouth',
            "picture"        => "",
            "pictures"       => array(),
            "items"=>array(
                "0"=>array("type"=>"image","media_filename"=>"images/book.png","isCorrect"=>false),
                "1"=>array("type"=>"image","media_filename"=>"images/pencil_case.png","isCorrect"=>false),
                "2"=>array("type"=>"image","media_filename"=>"images/pencil.png","isCorrect"=>false),
                "3"=>array("type"=>"image","media_filename"=>"images/bag.png","isCorrect"=>false),
            ),
            "clickEvents"     =>array(
            ),
            "selectEvents"=>array(
            ),
            "childEvents"     =>array(

            ),
        );

        $data['events'][] = array(
            "num"            => "4",
            'type'           => "look_listen_record",
            "timeRange"      => "00:04:848-00:07:070",
            "text"           => "It's a book.",
            "media_filename" => 'media/4_WG_u1_mouth_passage.mp4',
            "media_type"     => 'mouth',
            "picture"        => "",
            "pictures"       => array(),
            "items"=>array(
                "0"=>array("type"=>"image","media_filename"=>"images/book.png","isCorrect"=>true),
                "1"=>array("type"=>"image","media_filename"=>"images/pencil_case.png","isCorrect"=>false),
                "2"=>array("type"=>"image","media_filename"=>"images/pencil.png","isCorrect"=>false),
                "3"=>array("type"=>"image","media_filename"=>"images/bag.png","isCorrect"=>false),
            ),
            "clickEvents"     =>array(
            ),
            "selectEvents"=>array(
            ),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"record" //录音
                ),
                "1"=>array(
                    "type"=>"replay",//回听
                ),
                "2"=>array(
                    "type"=>"repeat", //重复播放原文
                ),
            ),
        );

        $data['events'][] = array(
            "num"            => "5",
            'type'           => "look_listen_record",
            "timeRange"      => "00:02:337-00:04:379",
            "text"           => "What's this?",
            "media_filename" => 'media/4_WG_u1_mouth_passage.mp4',
            "media_type"     => 'mouth',
            "picture"        => "",
            "pictures"       => array(),
            "items"=>array(
                "0"=>array("type"=>"image","media_filename"=>"images/book.png","isCorrect"=>false),
                "1"=>array("type"=>"image","media_filename"=>"images/pencil_case.png","isCorrect"=>false),
                "2"=>array("type"=>"image","media_filename"=>"images/pencil.png","isCorrect"=>false),
                "3"=>array("type"=>"image","media_filename"=>"images/bag.png","isCorrect"=>false),
            ),
            "clickEvents"     =>array(
            ),
            "selectEvents"=>array(
            ),
            "childEvents"     =>array(

            ),
        );

        $data['events'][] = array(
            "num"            => "6",
            'type'           => "look_listen_record",
            "timeRange"      => "00:07:380-00:09:838",
            "text"           => "It's a pencil case.",
            "media_filename" => 'media/4_WG_u1_mouth_passage.mp4',
            "media_type"     => 'mouth',
            "picture"        => "",
            "pictures"       => array(),
            "items"=>array(
                "0"=>array("type"=>"image","media_filename"=>"images/book.png","isCorrect"=>false),
                "1"=>array("type"=>"image","media_filename"=>"images/pencil_case.png","isCorrect"=>true),
                "2"=>array("type"=>"image","media_filename"=>"images/pencil.png","isCorrect"=>false),
                "3"=>array("type"=>"image","media_filename"=>"images/bag.png","isCorrect"=>false),
            ),
            "clickEvents"     =>array(
            ),
            "selectEvents"=>array(
            ),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"record" //录音
                ),
                "1"=>array(
                    "type"=>"replay",//回听
                ),
                "2"=>array(
                    "type"=>"repeat", //重复播放原文
                ),
            ),
        );

        $data['events'][] = array(
            "num"            => "7",
            'type'           => "look_listen_record",
            "timeRange"      => "00:02:337-00:04:379",
            "text"           => "What's this?",
            "media_filename" => 'media/4_WG_u1_mouth_passage.mp4',
            "media_type"     => 'mouth',
            "picture"        => "",
            "pictures"       => array(),
            "items"=>array(
                "0"=>array("type"=>"image","media_filename"=>"images/book.png","isCorrect"=>false),
                "1"=>array("type"=>"image","media_filename"=>"images/pencil_case.png","isCorrect"=>false),
                "2"=>array("type"=>"image","media_filename"=>"images/pencil.png","isCorrect"=>false),
                "3"=>array("type"=>"image","media_filename"=>"images/bag.png","isCorrect"=>false),
            ),
            "clickEvents"     =>array(
            ),
            "selectEvents"=>array(
            ),
            "childEvents"     =>array(

            ),
        );

        $data['events'][] = array(
            "num"            => "8",
            'type'           => "look_listen_record",
            "timeRange"      => "00:10:166-00:12:570",
            "text"           => "It's a pencil.",
            "media_filename" => 'media/4_WG_u1_mouth_passage.mp4',
            "media_type"     => 'mouth',
            "picture"        => "",
            "pictures"       => array(),
            "items"=>array(
                "0"=>array("type"=>"image","media_filename"=>"images/book.png","isCorrect"=>false),
                "1"=>array("type"=>"image","media_filename"=>"images/pencil_case.png","isCorrect"=>false),
                "2"=>array("type"=>"image","media_filename"=>"images/pencil.png","isCorrect"=>true),
                "3"=>array("type"=>"image","media_filename"=>"images/bag.png","isCorrect"=>false),
            ),
            "clickEvents"     =>array(
            ),
            "selectEvents"=>array(
            ),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"record" //录音
                ),
                "1"=>array(
                    "type"=>"replay",//回听
                ),
                "2"=>array(
                    "type"=>"repeat", //重复播放原文
                ),
            ),
        );

        $data['events'][] = array(
            "num"            => "9",
            'type'           => "look_listen_record",
            "timeRange"      => "00:02:337-00:04:379",
            "text"           => "What's this?",
            "media_filename" => 'media/4_WG_u1_mouth_passage.mp4',
            "media_type"     => 'mouth',
            "picture"        => "",
            "pictures"       => array(),
            "items"=>array(
                "0"=>array("type"=>"image","media_filename"=>"images/book.png","isCorrect"=>false),
                "1"=>array("type"=>"image","media_filename"=>"images/pencil_case.png","isCorrect"=>false),
                "2"=>array("type"=>"image","media_filename"=>"images/pencil.png","isCorrect"=>false),
                "3"=>array("type"=>"image","media_filename"=>"images/bag.png","isCorrect"=>false),
            ),
            "clickEvents"     =>array(
            ),
            "selectEvents"=>array(
            ),
            "childEvents"     =>array(

            ),
        );

        $data['events'][] = array(
            "num"            => "10",
            'type'           => "look_listen_record",
            "timeRange"      => "00:16:703-00:18:687",
            "text"           => "It's a bag.",
            "media_filename" => 'media/4_WG_u1_mouth_passage.mp4',
            "media_type"     => 'mouth',
            "picture"        => "",
            "pictures"       => array(),
            "items"=>array(
                "0"=>array("type"=>"image","media_filename"=>"images/book.png","isCorrect"=>false),
                "1"=>array("type"=>"image","media_filename"=>"images/pencil_case.png","isCorrect"=>false),
                "2"=>array("type"=>"image","media_filename"=>"images/pencil.png","isCorrect"=>false),
                "3"=>array("type"=>"image","media_filename"=>"images/bag.png","isCorrect"=>true),
            ),
            "clickEvents"     =>array(
            ),
            "selectEvents"=>array(
            ),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"record" //录音
                ),
                "1"=>array(
                    "type"=>"replay",//回听
                ),
                "2"=>array(
                    "type"=>"repeat", //重复播放原文
                ),
            ),
        );

        $data['events'][] = array(
            "num"            => "11",
            'type'           => "look_listen_record",
            "timeRange"      => "00:02:337-00:04:379",
            "text"           => "What's this?",
            "media_filename" => 'media/4_WG_u1_mouth_passage.mp4',
            "media_type"     => 'mouth',
            "picture"        => "",
            "pictures"       => array(),
            "items"=>array(
                "0"=>array("type"=>"image","media_filename"=>"images/book.png","isCorrect"=>false),
                "1"=>array("type"=>"image","media_filename"=>"images/pencil_case.png","isCorrect"=>false),
                "2"=>array("type"=>"image","media_filename"=>"images/pencil.png","isCorrect"=>false),
                "3"=>array("type"=>"image","media_filename"=>"images/bag.png","isCorrect"=>false),
            ),
            "clickEvents"     =>array(
            ),
            "selectEvents"=>array(
            ),
            "childEvents"     =>array(

            ),
        );


        $data['events'][] = array(
            "num"            => "12",
            'type'           => "look_listen_record",
            "timeRange"      => "00:19:426-00:21:158",
            "text"           => "It's an eraser.",
            "media_filename" => 'media/4_WG_u1_mouth_passage.mp4',
            "media_type"     => 'mouth',
            "picture"        => "",
            "pictures"       => array(),
            "items"=>array(
                "0"=>array("type"=>"image","media_filename"=>"images/eraser.png","isCorrect"=>true),
                "1"=>array("type"=>"image","media_filename"=>"images/crayon.png","isCorrect"=>false),
                "2"=>array("type"=>"image","media_filename"=>"images/pen.png","isCorrect"=>false),
                "3"=>array("type"=>"image","media_filename"=>"images/ruler.png","isCorrect"=>false),
            ),
            "clickEvents"     =>array(
            ),
            "selectEvents"=>array(
            ),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"record" //录音
                ),
                "1"=>array(
                    "type"=>"replay",//回听
                ),
                "2"=>array(
                    "type"=>"repeat", //重复播放原文
                ),
            ),
        );

        $data['events'][] = array(
            "num"            => "13",
            'type'           => "look_listen_record",
            "timeRange"      => "00:02:337-00:04:379",
            "text"           => "What's this?",
            "media_filename" => 'media/4_WG_u1_mouth_passage.mp4',
            "media_type"     => 'mouth',
            "picture"        => "",
            "pictures"       => array(),
            "items"=>array(
                "0"=>array("type"=>"image","media_filename"=>"images/book.png","isCorrect"=>false),
                "1"=>array("type"=>"image","media_filename"=>"images/pencil_case.png","isCorrect"=>false),
                "2"=>array("type"=>"image","media_filename"=>"images/pencil.png","isCorrect"=>false),
                "3"=>array("type"=>"image","media_filename"=>"images/bag.png","isCorrect"=>false),
            ),
            "clickEvents"     =>array(
            ),
            "selectEvents"=>array(
            ),
            "childEvents"     =>array(

            ),
        );

        $data['events'][] = array(
            "num"            => "14",
            'type'           => "look_listen_record",
            "timeRange"      => "00:22:725-00:24:528",
            "text"           => "It's a crayon.",
            "media_filename" => 'media/4_WG_u1_mouth_passage.mp4',
            "media_type"     => 'mouth',
            "picture"        => "",
            "pictures"       => array(),
            "items"=>array(
                "0"=>array("type"=>"image","media_filename"=>"images/eraser.png","isCorrect"=>false),
                "1"=>array("type"=>"image","media_filename"=>"images/crayon.png","isCorrect"=>true),
                "2"=>array("type"=>"image","media_filename"=>"images/pen.png","isCorrect"=>false),
                "3"=>array("type"=>"image","media_filename"=>"images/ruler.png","isCorrect"=>false),
            ),
            "clickEvents"     =>array(
            ),
            "selectEvents"=>array(
            ),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"record" //录音
                ),
                "1"=>array(
                    "type"=>"replay",//回听
                ),
                "2"=>array(
                    "type"=>"repeat", //重复播放原文
                ),
            ),
        );

        $data['events'][] = array(
            "num"            => "15",
            'type'           => "look_listen_record",
            "timeRange"      => "00:02:337-00:04:379",
            "text"           => "What's this?",
            "media_filename" => 'media/4_WG_u1_mouth_passage.mp4',
            "media_type"     => 'mouth',
            "picture"        => "",
            "pictures"       => array(),
            "items"=>array(
                "0"=>array("type"=>"image","media_filename"=>"images/book.png","isCorrect"=>false),
                "1"=>array("type"=>"image","media_filename"=>"images/pencil_case.png","isCorrect"=>false),
                "2"=>array("type"=>"image","media_filename"=>"images/pencil.png","isCorrect"=>false),
                "3"=>array("type"=>"image","media_filename"=>"images/bag.png","isCorrect"=>false),
            ),
            "clickEvents"     =>array(
            ),
            "selectEvents"=>array(
            ),
            "childEvents"     =>array(

            ),
        );

        $data['events'][] = array(
            "num"            => "16",
            'type'           => "look_listen_record",
            "timeRange"      => "00:25:487-00:26:978",
            "text"           => "It's a pen",
            "media_filename" => 'media/4_WG_u1_mouth_passage.mp4',
            "media_type"     => 'mouth',
            "picture"        => "",
            "pictures"       => array(),
            "items"=>array(
                "0"=>array("type"=>"image","media_filename"=>"images/eraser.png","isCorrect"=>false),
                "1"=>array("type"=>"image","media_filename"=>"images/crayon.png","isCorrect"=>false),
                "2"=>array("type"=>"image","media_filename"=>"images/pen.png","isCorrect"=>true),
                "3"=>array("type"=>"image","media_filename"=>"images/ruler.png","isCorrect"=>false),
            ),
            "clickEvents"     =>array(
            ),
            "selectEvents"=>array(
            ),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"record" //录音
                ),
                "1"=>array(
                    "type"=>"replay",//回听
                ),
                "2"=>array(
                    "type"=>"repeat", //重复播放原文
                ),
            ),
        );

        $data['events'][] = array(
            "num"            => "17",
            'type'           => "look_listen_record",
            "timeRange"      => "00:02:337-00:04:379",
            "text"           => "What's this?",
            "media_filename" => 'media/4_WG_u1_mouth_passage.mp4',
            "media_type"     => 'mouth',
            "picture"        => "",
            "pictures"       => array(),
            "items"=>array(
                "0"=>array("type"=>"image","media_filename"=>"images/book.png","isCorrect"=>false),
                "1"=>array("type"=>"image","media_filename"=>"images/pencil_case.png","isCorrect"=>false),
                "2"=>array("type"=>"image","media_filename"=>"images/pencil.png","isCorrect"=>false),
                "3"=>array("type"=>"image","media_filename"=>"images/bag.png","isCorrect"=>false),
            ),
            "clickEvents"     =>array(
            ),
            "selectEvents"=>array(
            ),
            "childEvents"     =>array(

            ),
        );

        $data['events'][] = array(
            "num"            => "18",
            'type'           => "look_listen_record",
            "timeRange"      => "00:27:616-00:29:406",
            "text"           => "It's a ruler.",
            "media_filename" => 'media/4_WG_u1_mouth_passage.mp4',
            "media_type"     => 'mouth',
            "picture"        => "",
            "pictures"       => array(),
            "items"=>array(
                "0"=>array("type"=>"image","media_filename"=>"images/eraser.png","isCorrect"=>false),
                "1"=>array("type"=>"image","media_filename"=>"images/crayon.png","isCorrect"=>false),
                "2"=>array("type"=>"image","media_filename"=>"images/pen.png","isCorrect"=>false),
                "3"=>array("type"=>"image","media_filename"=>"images/ruler.png","isCorrect"=>true),
            ),
            "clickEvents"     =>array(
            ),
            "selectEvents"=>array(
            ),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"record" //录音
                ),
                "1"=>array(
                    "type"=>"replay",//回听
                ),
                "2"=>array(
                    "type"=>"repeat", //重复播放原文
                ),
            ),
        );


        $a = json_encode($data);
        $fp = fopen('json192.txt', "w");
        fwrite($fp, $a);
        fclose($fp);
        return;
    }

    public function getPart193()
    {
        $data = array(
            "level_id"   =>1,
            "unit_id"    =>9,
            "lesson_id"  =>75,
            "part_id"    =>193,
            "play_type"  =>"auto"
        );

        $data['systems'][] = array(
            "num"             => "1",
            'type'            => "sentence_repetition",
            "timeRange"       => "01:06:000-01:08:133",
            "text"            => "listen and speak.",
            "media_filename"  => 'media/WG_system.mp3',
            "clickEvents"     =>array(
            ),
            "childEvents"     =>array(
            ),
            "selectEvents"=>array(
            ),
            "media_type" => 'audio',
            "picture" => "",
            "pictures" => array()
        );

        $data['events'][] = array(
            "num"               => "2",
            'type'              => "sentence_repetition",
            "timeRange"         => "00:02:03-00:06:00",
            "text"              => "Wow! Look!",
            "media_filename"    => 'media/WG_u1_passage.mp4',
            "media_type"        => 'video',
            "picture"           => "",
            "pictures"          => array(),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"sr" //语音识别
                )
            ),
            "clickEvents"       =>array(
            ),
            "selectEvents"=>array(
            ),
        );
        $data['events'][] = array(
            "num"               => "3",
            'type'              => "sentence_repetition",
            "timeRange"         => "00:06:00-00:08:170",
            "text"              => "What's this?",
            "media_filename"    => 'media/WG_u1_passage.mp4',
            "media_type"        => 'video',
            "picture"           => "",
            "pictures"          => array(),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"sr" //语音识别
                )
            ),
            "clickEvents"       =>array(
            ),
            "selectEvents"=>array(
            ),
        );

        $data['events'][] = array(
            "num"               => "4",
            'type'              => "sentence_repetition",
            "timeRange"         => "00:08:949-00:10:647",
            "text"              => "It's a book.",
            "media_filename"    => 'media/WG_u1_passage.mp4',
            "media_type"        => 'video',
            "picture"           => "",
            "pictures"          => array(),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"sr" //语音识别
                )
            ),
            "clickEvents"       =>array(
            ),
            "selectEvents"=>array(
            ),
        );

        $data['events'][] = array(
            "num"               => "5",
            'type'              => "sentence_repetition",
            "timeRange"         => "00:12:024-00:14:749",
            "text"              => "It's a pencil case.",
            "media_filename"    => 'media/WG_u1_passage.mp4',
            "media_type"        => 'video',
            "picture"           => "",
            "pictures"          => array(),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"sr" //语音识别
                )
            ),
            "clickEvents"       =>array(
            ),
            "selectEvents"=>array(
            ),
        );

        $data['events'][] = array(
            "num"               => "6",
            'type'              => "sentence_repetition",
            "timeRange"         => "00:15:733-00:17:715",
            "text"              => "It's a pencil.",
            "media_filename"    => 'media/WG_u1_passage.mp4',
            "media_type"        => 'video',
            "picture"           => "",
            "pictures"          => array(),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"sr" //语音识别
                )
            ),
            "clickEvents"       =>array(
            ),
            "selectEvents"=>array(
            ),
        );

        $data['events'][] = array(
            "num"               => "7",
            'type'              => "sentence_repetition",
            "timeRange"         => "00:19:224-00:21:168",
            "text"              => "What's this?",
            "media_filename"    => 'media/WG_u1_passage.mp4',
            "media_type"        => 'video',
            "picture"           => "",
            "pictures"          => array(),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"sr" //语音识别
                )
            ),
            "clickEvents"       =>array(
            ),
            "selectEvents"=>array(
            ),
        );

        $data['events'][] = array(
            "num"               => "8",
            'type'              => "sentence_repetition",
            "timeRange"         => "00:21:992-00:25:508",
            "text"              => "Wow, it's a bag.",
            "media_filename"    => 'media/WG_u1_passage.mp4',
            "media_type"        => 'video',
            "picture"           => "",
            "pictures"          => array(),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"sr" //语音识别
                )
            ),
            "clickEvents"       =>array(
            ),
            "selectEvents"=>array(
            ),
        );

        $data['events'][] = array(
            "num"               => "9",
            'type'              => "sentence_repetition",
            "timeRange"         => "00:26:169-00:29:168",
            "text"              => "What's this?",
            "media_filename"    => 'media/WG_u1_passage.mp4',
            "media_type"        => 'video',
            "picture"           => "",
            "pictures"          => array(),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"sr" //语音识别
                )
            ),
            "clickEvents"       =>array(
            ),
            "selectEvents"=>array(
            ),
        );

        $data['events'][] = array(
            "num"               => "10",
            'type'              => "sentence_repetition",
            "timeRange"         => "00:29:733-00:31:574",
            "text"              => "It's an eraser.",
            "media_filename"    => 'media/WG_u1_passage.mp4',
            "media_type"        => 'video',
            "picture"           => "",
            "pictures"          => array(),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"sr" //语音识别
                )
            ),
            "clickEvents"       =>array(
            ),
            "selectEvents"=>array(
            ),
        );

        $data['events'][] = array(
            "num"               => "11",
            'type'              => "sentence_repetition",
            "timeRange"         => "00:32:405-00:36:051",
            "text"              => "Look, it's a crayon.",
            "media_filename"    => 'media/WG_u1_passage.mp4',
            "media_type"        => 'video',
            "picture"           => "",
            "pictures"          => array(),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"sr" //语音识别
                )
            ),
            "clickEvents"       =>array(
            ),
            "selectEvents"=>array(
            ),
        );

        $data['events'][] = array(
            "num"               => "12",
            'type'              => "sentence_repetition",
            "timeRange"         => "00:36:855-00:41:017",
            "text"              => "It's a pen and it's a ruler.",
            "media_filename"    => 'media/WG_u1_passage.mp4',
            "media_type"        => 'video',
            "picture"           => "",
            "pictures"          => array(),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"sr" //语音识别
                )
            ),
            "clickEvents"       =>array(
            ),
            "selectEvents"=>array(
            ),
        );

        $data['events'][] = array(
            "num"               => "13",
            'type'              => "sentence_repetition",
            "timeRange"         => "00:42:235-00:44:108",
            "text"              => "Bye-bye.",
            "media_filename"    => 'media/WG_u1_passage.mp4',
            "media_type"        => 'video',
            "picture"           => "",
            "pictures"          => array(),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"sr" //语音识别
                )
            ),
            "clickEvents"       =>array(
            ),
            "selectEvents"=>array(
            ),
        );

//        $data['events'][] = array(
//            "num"               => "14",
//            'type'              => "sentence_repetition",
//            "timeRange"         => "01:23-01:25",
//            "text"              => "Please stop here. ",
//            "media_filename"    => 'media/WG_system.mp3',
//            "media_type"        => 'audio',
//            "picture"           => "",
//            "pictures"          => array(),
//            "childEvents"     =>array(
//                "0"=>array(
//                    "type"=>"sr" //语音识别
//                )
//            ),
//            "clickEvents"       =>array(
//            ),
//            "selectEvents"=>array(
//            ),
//        );

        $a = json_encode($data);
        $fp = fopen('json193.txt', "w");
        fwrite($fp, $a);
        fclose($fp);
        return;
    }



    //question_and_answer_sr
    //自动播放和识别
    public function getPart194()
    {
        $data = array(
            "level_id"   =>1,
            "unit_id"    =>9,
            "lesson_id"  =>75,
            "part_id"    =>194,
            "play_type"  =>"auto"
        );
        $data['systems'][] = array(
            "num"             => "1",
            'type'            => "question_and_answer_sr",
            "timeRange"       => "00:49:729-00:51:497",
            "text"            => "let's check.",
            "media_filename"  => 'media/WG_system.mp3',
            "clickEvents"     =>array(
            ),
            "childEvents"     =>array(
            ),
            "selectEvents"=>array(
            ),
            "media_type" => 'audio',
            "picture" => "",
            "pictures" => array()
        );

        $data['systems'][] = array(
            "num"             => "1",
            'type'            => "question_and_answer_sr",
            "timeRange"       => "01:06:000-01:08:133",
            "text"            => "listen and speak",
            "media_filename"  => 'media/WG_system.mp3',
            "clickEvents"     =>array(
            ),
            "childEvents"     =>array(
            ),
            "selectEvents"=>array(
            ),
            "media_type" => 'audio',
            "picture" => "",
            "pictures" => array()
        );

        $data['events'][] = array(
            "num"                => "2",
            'type'               => "question_and_answer_sr",
            "timeRange"          => "00:00-00:03",
            "text"              => "What's this?",
            "media_filename"    => 'media/WG_u1_grammar_p1.mp3',
            "media_type"        => 'audio',
            "scores"=>5,
            "answers"=>array(
                "0"=>array("type"=>"text","text"=>"it is a book","isCorrect"=>true), //对应答案
                "1"=>array("type"=>"text","text"=>"it's a book", "isCorrect"=>true), //对应答案
            ),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"sr" //语音识别
                )
            ),
            "selectEvents"=>array(
            ),
            "clickEvents"=>array(
                "click_1"=>array(
                    "type"=>"score",
                    "score"=>10,
                ),
                "click_2"=>array(
                    "type"=>"score",
                    "score"=>5,
                ),
            ),
            "picture"   => "images/book.png",
        );

        $data['events'][] = array(
            "num"                => "3",
            'type'               => "question_and_answer_sr",
            "timeRange"          => "00:00-00:03",
            "text"              => "What's this?",
            "media_filename"    => 'media/WG_u1_grammar_p1.mp3',
            "media_type"        => 'audio',
            "scores"=>5,
            "answers"=>array(
                "0"=>array("type"=>"text","text"=>"It is a pencil case.","isCorrect"=>true), //对应答案
                "1"=>array("type"=>"text","text"=>"It's a pencil case.", "isCorrect"=>true), //对应答案
            ),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"sr" //语音识别
                )
            ),
            "selectEvents"=>array(
            ),
            "clickEvents"=>array(
                "click_1"=>array(
                    "type"=>"score",
                    "score"=>10,
                ),
                "click_2"=>array(
                    "type"=>"score",
                    "score"=>5,
                ),
            ),
            "picture"   => "images/pencil_case.png",
        );

        $data['events'][] = array(
            "num"                => "4",
            'type'               => "question_and_answer_sr",
            "timeRange"          => "00:00-00:03",
            "text"              => "What's this?",
            "media_filename"    => 'media/WG_u1_grammar_p1.mp3',
            "media_type"        => 'audio',
            "scores"=>5,
            "answers"=>array(
                "0"=>array("type"=>"text","text"=>"It is a pencil.","isCorrect"=>true), //对应答案
                "1"=>array("type"=>"text","text"=>"It's a pencil.", "isCorrect"=>true), //对应答案
            ),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"sr" //语音识别
                )
            ),
            "selectEvents"=>array(
            ),
            "clickEvents"=>array(
                "click_1"=>array(
                    "type"=>"score",
                    "score"=>10,
                ),
                "click_2"=>array(
                    "type"=>"score",
                    "score"=>5,
                ),
            ),
            "picture"   => "images/pencil.png",
        );


        $data['events'][] = array(
            "num"                => "5",
            'type'               => "question_and_answer_sr",
            "timeRange"          => "00:00-00:03",
            "text"              => "What's this?",
            "media_filename"    => 'media/WG_u1_grammar_p1.mp3',
            "media_type"        => 'audio',
            "scores"=>5,
            "answers"=>array(
                "0"=>array("type"=>"text","text"=>"It is a bag.","isCorrect"=>true), //对应答案
                "1"=>array("type"=>"text","text"=>"It's a bag.", "isCorrect"=>true), //对应答案
            ),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"sr" //语音识别
                )
            ),
            "selectEvents"=>array(
            ),
            "clickEvents"=>array(
                "click_1"=>array(
                    "type"=>"score",
                    "score"=>10,
                ),
                "click_2"=>array(
                    "type"=>"score",
                    "score"=>5,
                ),
            ),
            "picture"   => "images/bag.png",
        );

        $data['events'][] = array(
            "num"                => "6",
            'type'               => "question_and_answer_sr",
            "timeRange"          => "00:00-00:03",
            "text"              => "What's this?",
            "media_filename"    => 'media/WG_u1_grammar_p1.mp3',
            "media_type"        => 'audio',
            "scores"=>5,
            "answers"=>array(
                "0"=>array("type"=>"text","text"=>"It is an eraser.","isCorrect"=>true), //对应答案
                "1"=>array("type"=>"text","text"=>"It's an eraser.", "isCorrect"=>true), //对应答案
            ),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"sr" //语音识别
                )
            ),
            "selectEvents"=>array(
            ),
            "clickEvents"=>array(
                "click_1"=>array(
                    "type"=>"score",
                    "score"=>10,
                ),
                "click_2"=>array(
                    "type"=>"score",
                    "score"=>5,
                ),
            ),
            "picture"   => "images/eraser.png",
        );

        $data['events'][] = array(
            "num"                => "7",
            'type'               => "question_and_answer_sr",
            "timeRange"          => "00:00-00:03",
            "text"              => "What's this?",
            "media_filename"    => 'media/WG_u1_grammar_p1.mp3',
            "media_type"        => 'audio',
            "scores"=>5,
            "answers"=>array(
                "0"=>array("type"=>"text","text"=>"It is a crayon.","isCorrect"=>true), //对应答案
                "1"=>array("type"=>"text","text"=>"It's a crayon.", "isCorrect"=>true), //对应答案
            ),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"sr" //语音识别
                )
            ),
            "selectEvents"=>array(
            ),
            "clickEvents"=>array(
                "click_1"=>array(
                    "type"=>"score",
                    "score"=>10,
                ),
                "click_2"=>array(
                    "type"=>"score",
                    "score"=>5,
                ),
            ),
            "picture"   => "images/crayon.png",
        );

        $data['events'][] = array(
            "num"                => "8",
            'type'               => "question_and_answer_sr",
            "timeRange"          => "00:00-00:03",
            "text"              => "What's this?",
            "media_filename"    => 'media/WG_u1_grammar_p1.mp3',
            "media_type"        => 'audio',
            "scores"=>5,
            "answers"=>array(
                "0"=>array("type"=>"text","text"=>"It is a pen.","isCorrect"=>true), //对应答案
                "1"=>array("type"=>"text","text"=>"It's a pen.", "isCorrect"=>true), //对应答案
            ),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"sr" //语音识别
                )
            ),
            "selectEvents"=>array(
            ),
            "clickEvents"=>array(
                "click_1"=>array(
                    "type"=>"score",
                    "score"=>10,
                ),
                "click_2"=>array(
                    "type"=>"score",
                    "score"=>5,
                ),
            ),
            "picture"   => "images/pen.png",
        );

        $data['events'][] = array(
            "num"                => "9",
            'type'               => "question_and_answer_sr",
            "timeRange"          => "00:00-00:03",
            "text"              => "What's this?",
            "media_filename"    => 'media/WG_u1_grammar_p1.mp3',
            "media_type"        => 'audio',
            "scores"=>5,
            "answers"=>array(
                "0"=>array("type"=>"text","text"=>"It is a ruler.","isCorrect"=>true), //对应答案
                "1"=>array("type"=>"text","text"=>"It's a ruler.", "isCorrect"=>true), //对应答案
            ),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"sr" //语音识别
                )
            ),
            "selectEvents"=>array(
            ),
            "clickEvents"=>array(
                "click_1"=>array(
                    "type"=>"score",
                    "score"=>10,
                ),
                "click_2"=>array(
                    "type"=>"score",
                    "score"=>5,
                ),
            ),
            "picture"   => "images/ruler.png",
        );

        $a = json_encode($data);
        $fp = fopen('json194.txt', "w");
        fwrite($fp, $a);
        fclose($fp);
        return;
    }


    //listen_and_click_answer
    //自动播放和识别
    public function getPart195()
    {
        $data = array(
            "level_id"   =>1,
            "unit_id"    =>9,
            "lesson_id"  =>76,
            "part_id"    =>195,
            "play_type"  =>"auto"
        );
        $data['systems'][] = array(
            "num"             => "1",
            'type'            => "listen_and_click_answer",
            "timeRange"       => "01:04:058-01:06:000",
            "text"            => "listen and click.",
            "media_filename"  => 'media/WG_system.mp3',
            "clickEvents"     =>array(
            ),
            "childEvents"     =>array(
            ),
            "selectEvents"=>array(
            ),
            "media_type" => 'audio',
            "picture" => "",
            "pictures" => array()
        );

        $data['events'][] = array(
            "num"                => "2",
            'type'               => "listen_and_click_answer",
            "timeRange"          => "00:00-00:03",
            "text"               => "What's this?.",
            "media_filename"     => 'media/WG_u1_grammar_p1.mp3',
            "scores"=>5,
            "items_1"=>array(
                  "1"=>array("type"=>"text",
                            "text"=>"It's",
                            "isCorrect"=>true,
                            "clickEvents"=>array(
                                "click_1"=>array(
                                    "type"=>"audio",
                                    "timeRange" => "00:36-00:38",
                                    "media_filename"=>"media/WG_u1_voc.mp3",
                                ),
                        ),
                     ),
            ),
            "items_2"=>array(
                "1"=>array(
                    "type"=>"text",
                    "text"=>"a pen",
                    "isCorrect"=>true,
                    "clickEvents"=>array(
                        "click_1"=>array(
                            "type"=>"audio",
                            "timeRange" => "00:00-00:02",
                            "media_filename"=>"media/WG_u1_voc.mp3",
                        ),
                    ),
                ),
                "2"=>array( "type"=>"text",
                    "text"=>"a book",
                    "isCorrect"=>false,
                    "clickEvents"=>array(
                        "click_1"=>array(
                            "type"=>"audio",
                            "timeRange" => "00:04-00:06",
                            "media_filename"=>"media/WG_u1_voc.mp3",
                        ),
                    ),
                ),
                "3"=>array( "type"=>"text",
                    "text"=>"an eraser",
                    "isCorrect"=>false,
                    "clickEvents"=>array(
                        "click_1"=>array(
                            "type"=>"audio",
                            "timeRange" => "00:12-00:14",
                            "media_filename"=>"media/WG_u1_voc.mp3",
                        ),
                    ),
                ),
            ),
            "clickEvents"=>array(
                "0"=>array(
                    "select_sort"=> "11",
                    "type"=>"audio",
                    "text"=>"It's a pen.",
                    "timeRange" => "00:05-00:07",
                    "media_filename"=>"media/WG_u1_grammar_p1.mp3",
                ),
                "1"=>array(
                    "select_sort"=> "12",
                    "type"=>"audio",
                    "text"=>"It's a book.",
                    "timeRange" => "00:13-00:15",
                    "media_filename"=>"media/WG_u1_grammar_p1.mp3",
                ),
                "2"=>array(
                    "select_sort"=> "13",
                    "type"=>"audio",
                    "text"=>"It's an eraser.",
                    "timeRange" => "00:09-00:11",
                    "media_filename"=>"media/WG_u1_grammar_p1.mp3",
                ),
            ),
            "selectEvents"=>array(
            ),
            "picture"   => "images/pen.png",
        );

        $data['events'][] = array(
            "num"                => "3",
            'type'               => "listen_and_click_answer",
            "timeRange"          => "00:00-00:03",
            "text"               => "What's this?",
            "media_filename"     => 'media/WG_u1_grammar_p1.mp3',
            "scores"=>5,
            "items_1"=>array(
                "1"=>array("type"=>"text",
                    "text"=>"It's",
                    "isCorrect"=>true,
                    "clickEvents"=>array(
                        "click_1"=>array(
                            "type"=>"audio",
                            "timeRange" => "00:36-00:38",
                            "media_filename"=>"media/WG_u1_voc.mp3",
                        ),
                    ),
                ),
            ),
            "items_2"=>array(
                "1"=>array(
                    "type"=>"text",
                    "text"=>"a pen",
                    "isCorrect"=>false,
                    "clickEvents"=>array(
                        "click_1"=>array(
                            "type"=>"audio",
                            "timeRange" => "00:00-00:02",
                            "media_filename"=>"media/WG_u1_voc.mp3",
                        ),
                    ),
                ),
                "2"=>array( "type"=>"text",
                    "text"=>"a book",
                    "isCorrect"=>true,
                    "clickEvents"=>array(
                        "click_1"=>array(
                            "type"=>"audio",
                            "timeRange" => "00:04-00:06",
                            "media_filename"=>"media/WG_u1_voc.mp3",
                        ),
                    ),
                ),
                "3"=>array( "type"=>"text",
                    "text"=>"an eraser",
                    "isCorrect"=>false,
                    "clickEvents"=>array(
                        "click_1"=>array(
                            "type"=>"audio",
                            "timeRange" => "00:12-00:14",
                            "media_filename"=>"media/WG_u1_voc.mp3",
                        ),
                    ),
                ),
            ),
            "clickEvents"=>array(
                "0"=>array(
                    "select_sort"=> "11",
                    "type"=>"audio",
                    "text"=>"It's a pen.",
                    "timeRange" => "00:05-00:07",
                    "media_filename"=>"media/WG_u1_grammar_p1.mp3",
                ),
                "1"=>array(
                    "select_sort"=> "12",
                    "type"=>"audio",
                    "text"=>"It's a book.",
                    "timeRange" => "00:13-00:15",
                    "media_filename"=>"media/WG_u1_grammar_p1.mp3",
                ),
                "2"=>array(
                    "select_sort"=> "13",
                    "type"=>"audio",
                    "text"=>"It's an eraser.",
                    "timeRange" => "00:09-00:11",
                    "media_filename"=>"media/WG_u1_grammar_p1.mp3",
                ),
            ),
            "selectEvents"=>array(
            ),
            "picture"   => "images/book.png",
        );

        $data['events'][] = array(
            "num"                => "4",
            'type'               => "listen_and_click_answer",
            "timeRange"          => "00:00-00:03",
            "text"               => "What's this?",
            "media_filename"     => 'media/WG_u1_grammar_p1.mp3',
            "scores"=>5,
            "items_1"=>array(
                "1"=>array("type"=>"text",
                    "text"=>"It's",
                    "isCorrect"=>true,
                    "clickEvents"=>array(
                        "click_1"=>array(
                            "type"=>"audio",
                            "timeRange" => "00:36-00:38",
                            "media_filename"=>"media/WG_u1_voc.mp3",
                        ),
                    ),
                ),
            ),
            "items_2"=>array(
                "1"=>array(
                    "type"=>"text",
                    "text"=>"a pen",
                    "isCorrect"=>false,
                    "clickEvents"=>array(
                        "click_1"=>array(
                            "type"=>"audio",
                            "timeRange" => "00:00-00:02",
                            "media_filename"=>"media/WG_u1_voc.mp3",
                        ),
                    ),
                ),
                "2"=>array( "type"=>"text",
                    "text"=>"a book",
                    "isCorrect"=>false,
                    "clickEvents"=>array(
                        "click_1"=>array(
                            "type"=>"audio",
                            "timeRange" => "00:04-00:06",
                            "media_filename"=>"media/WG_u1_voc.mp3",
                        ),
                    ),
                ),
                "3"=>array( "type"=>"text",
                    "text"=>"an eraser",
                    "isCorrect"=>true,
                    "clickEvents"=>array(
                        "click_1"=>array(
                            "type"=>"audio",
                            "timeRange" => "00:12-00:14",
                            "media_filename"=>"media/WG_u1_voc.mp3",
                        ),
                    ),
                ),
            ),
            "clickEvents"=>array(
                "0"=>array(
                    "select_sort"=> "11",
                    "type"=>"audio",
                    "text"=>"It's a pen.",
                    "timeRange" => "00:05-00:07",
                    "media_filename"=>"media/WG_u1_grammar_p1.mp3",
                ),
                "1"=>array(
                    "select_sort"=> "12",
                    "type"=>"audio",
                    "text"=>"It's a book.",
                    "timeRange" => "00:13-00:15",
                    "media_filename"=>"media/WG_u1_grammar_p1.mp3",
                ),
                "2"=>array(
                    "select_sort"=> "13",
                    "type"=>"audio",
                    "text"=>"It's an eraser.",
                    "timeRange" => "00:09-00:11",
                    "media_filename"=>"media/WG_u1_grammar_p1.mp3",
                ),
            ),
            "selectEvents"=>array(
            ),
            "picture"   => "images/eraser.png",
        );


        $data['events'][] = array(
            "num"                => "5",
            'type'               => "listen_and_click_answer",
            "timeRange"          => "00:00-00:03",
            "text"               => "What's this?",
            "media_filename"     => 'media/WG_u1_grammar_p1.mp3',
            "scores"=>5,
            "items_1"=>array(
                "1"=>array("type"=>"text",
                    "text"=>"It's",
                    "isCorrect"=>true,
                    "clickEvents"=>array(
                        "click_1"=>array(
                            "type"=>"audio",
                            "timeRange" => "00:36-00:38",
                            "media_filename"=>"media/WG_u1_voc.mp3",
                        ),
                    ),
                ),
            ),
            "items_2"=>array(
                "1"=>array(
                    "type"=>"text",
                    "text"=>"a pencil",
                    "isCorrect"=>true,
                    "clickEvents"=>array(
                        "click_1"=>array(
                            "type"=>"audio",
                            "timeRange" => "00:08-00:10",
                            "media_filename"=>"media/WG_u1_voc.mp3",
                        ),
                    ),
                ),
                "2"=>array( "type"=>"text",
                    "text"=>"a crayon",
                    "isCorrect"=>false,
                    "clickEvents"=>array(
                        "click_1"=>array(
                            "type"=>"audio",
                            "timeRange" => "00:25-00:27",
                            "media_filename"=>"media/WG_u1_voc.mp3",
                        ),
                    ),
                ),
                "3"=>array( "type"=>"text",
                    "text"=>"a pencil case",
                    "isCorrect"=>false,
                    "clickEvents"=>array(
                        "click_1"=>array(
                            "type"=>"audio",
                            "timeRange" => "00:29-00:31",
                            "media_filename"=>"media/WG_u1_voc.mp3",
                        ),
                    ),
                ),
            ),
            "clickEvents"=>array(
                "0"=>array(
                    "select_sort"=> "11",
                    "type"=>"audio",
                    "text"=>"It's a pencil.",
                    "timeRange" => "00:07-00:09",
                    "media_filename"=>"media/WG_u1_grammar_p1.mp3",
                ),
                "1"=>array(
                    "select_sort"=> "12",
                    "type"=>"audio",
                    "text"=>"t's a crayon.",
                    "timeRange" => "00:15-00:17",
                    "media_filename"=>"media/WG_u1_grammar_p1.mp3",
                ),
                "2"=>array(
                    "select_sort"=> "13",
                    "type"=>"audio",
                    "text"=>"It's a pencil case.",
                    "timeRange" => "00:17-00:20",
                    "media_filename"=>"media/WG_u1_grammar_p1.mp3",
                ),
            ),
            "selectEvents"=>array(
            ),
            "picture"   => "images/pencil.png",
        );


        $data['events'][] = array(
            "num"                => "6",
            'type'               => "listen_and_click_answer",
            "timeRange"          => "00:00-00:03",
            "text"               => "What's this?",
            "media_filename"     => 'media/WG_u1_grammar_p1.mp3',
            "scores"=>5,
            "items_1"=>array(
                "1"=>array("type"=>"text",
                    "text"=>"It's",
                    "isCorrect"=>true,
                    "clickEvents"=>array(
                        "click_1"=>array(
                            "type"=>"audio",
                            "timeRange" => "00:36-00:38",
                            "media_filename"=>"media/WG_u1_voc.mp3",
                        ),
                    ),
                ),
            ),
            "items_2"=>array(
                "1"=>array(
                    "type"=>"text",
                    "text"=>"a pencil",
                    "isCorrect"=>false,
                    "clickEvents"=>array(
                        "click_1"=>array(
                            "type"=>"audio",
                            "timeRange" => "00:08-00:10",
                            "media_filename"=>"media/WG_u1_voc.mp3",
                        ),
                    ),
                ),
                "2"=>array( "type"=>"text",
                    "text"=>"a crayon",
                    "isCorrect"=>true,
                    "clickEvents"=>array(
                        "click_1"=>array(
                            "type"=>"audio",
                            "timeRange" => "00:25-00:27",
                            "media_filename"=>"media/WG_u1_voc.mp3",
                        ),
                    ),
                ),
                "3"=>array( "type"=>"text",
                    "text"=>"a pencil case",
                    "isCorrect"=>false,
                    "clickEvents"=>array(
                        "click_1"=>array(
                            "type"=>"audio",
                            "timeRange" => "00:29-00:31",
                            "media_filename"=>"media/WG_u1_voc.mp3",
                        ),
                    ),
                ),
            ),
            "clickEvents"=>array(
                "0"=>array(
                    "select_sort"=> "11",
                    "type"=>"audio",
                    "text"=>"It's a pencil.",
                    "timeRange" => "00:07-00:09",
                    "media_filename"=>"media/WG_u1_grammar_p1.mp3",
                ),
                "1"=>array(
                    "select_sort"=> "12",
                    "type"=>"audio",
                    "text"=>"It's a crayon.",
                    "timeRange" => "00:15-00:17",
                    "media_filename"=>"media/WG_u1_grammar_p1.mp3",
                ),
                "2"=>array(
                    "select_sort"=> "13",
                    "type"=>"audio",
                    "text"=>"It's a pencil case.",
                    "timeRange" => "00:17-00:20",
                    "media_filename"=>"media/WG_u1_grammar_p1.mp3",
                ),
            ),
            "selectEvents"=>array(
            ),
            "picture"   => "images/crayon.png",
        );

        $data['events'][] = array(
            "num"                => "7",
            'type'               => "listen_and_click_answer",
            "timeRange"          => "00:00-00:03",
            "text"               => "What's this?",
            "media_filename"     => 'media/WG_u1_grammar_p1.mp3',
            "scores"=>5,
            "items_1"=>array(
                "1"=>array("type"=>"text",
                    "text"=>"It's",
                    "isCorrect"=>true,
                    "clickEvents"=>array(
                        "click_1"=>array(
                            "type"=>"audio",
                            "timeRange" => "00:36-00:38",
                            "media_filename"=>"media/WG_u1_voc.mp3",
                        ),
                    ),
                ),
            ),
            "items_2"=>array(
                "1"=>array(
                    "type"=>"text",
                    "text"=>"a pencil",
                    "isCorrect"=>false,
                    "clickEvents"=>array(
                        "click_1"=>array(
                            "type"=>"audio",
                            "timeRange" => "00:08-00:10",
                            "media_filename"=>"media/WG_u1_voc.mp3",
                        ),
                    ),
                ),
                "2"=>array( "type"=>"text",
                    "text"=>"a crayon",
                    "isCorrect"=>false,
                    "clickEvents"=>array(
                        "click_1"=>array(
                            "type"=>"audio",
                            "timeRange" => "00:25-00:27",
                            "media_filename"=>"media/WG_u1_voc.mp3",
                        ),
                    ),
                ),
                "3"=>array( "type"=>"text",
                    "text"=>"a pencil case",
                    "isCorrect"=>true,
                    "clickEvents"=>array(
                        "click_1"=>array(
                            "type"=>"audio",
                            "timeRange" => "00:29-00:31",
                            "media_filename"=>"media/WG_u1_voc.mp3",
                        ),
                    ),
                ),
            ),
            "clickEvents"=>array(
                "0"=>array(
                    "select_sort"=> "11",
                    "type"=>"audio",
                    "text"=>"It's a pencil.",
                    "timeRange" => "00:07-00:09",
                    "media_filename"=>"media/WG_u1_grammar_p1.mp3",
                ),
                "1"=>array(
                    "select_sort"=> "12",
                    "type"=>"audio",
                    "text"=>"It's a crayon.",
                    "timeRange" => "00:15-00:17",
                    "media_filename"=>"media/WG_u1_grammar_p1.mp3",
                ),
                "2"=>array(
                    "select_sort"=> "13",
                    "type"=>"audio",
                    "text"=>"It's a pencil case.",
                    "timeRange" => "00:17-00:20",
                    "media_filename"=>"media/WG_u1_grammar_p1.mp3",
                ),
            ),
            "selectEvents"=>array(
            ),
            "picture"   => "images/pencil_case.png",
        );


        $data['events'][] = array(
            "num"                => "8",
            'type'               => "listen_and_click_answer",
            "timeRange"          => "00:00-00:03",
            "text"               => "What's this?",
            "media_filename"     => 'media/WG_u1_grammar_p1.mp3',
            "scores"=>5,
            "items_1"=>array(
                "1"=>array("type"=>"text",
                    "text"=>"It's",
                    "isCorrect"=>true,
                    "clickEvents"=>array(
                        "click_1"=>array(
                            "type"=>"audio",
                            "timeRange" => "00:36-00:38",
                            "media_filename"=>"media/WG_u1_voc.mp3",
                        ),
                    ),
                ),
            ),
            "items_2"=>array(
                "1"=>array(
                    "type"=>"text",
                    "text"=>"a pencil case",
                    "isCorrect"=>false,
                    "clickEvents"=>array(
                        "click_1"=>array(
                            "type"=>"audio",
                            "timeRange" => "00:29-00:31",
                            "media_filename"=>"media/WG_u1_voc.mp3",
                        ),
                    ),
                ),
                "2"=>array( "type"=>"text",
                    "text"=>"a bag",
                    "isCorrect"=>true,
                    "clickEvents"=>array(
                        "click_1"=>array(
                            "type"=>"audio",
                            "timeRange" => "00:21-00:23",
                            "media_filename"=>"media/WG_u1_voc.mp3",
                        ),
                    ),
                ),
                "3"=>array( "type"=>"text",
                    "text"=>"a ruler",
                    "isCorrect"=>false,
                    "clickEvents"=>array(
                        "click_1"=>array(
                            "type"=>"audio",
                            "timeRange" => "00:17-00:19",
                            "media_filename"=>"media/WG_u1_voc.mp3",
                        ),
                    ),
                ),
            ),
            "clickEvents"=>array(
                "0"=>array(
                    "select_sort"=> "11",
                    "type"=>"audio",
                    "text"=>"It's a pencil case.",
                    "timeRange" => "00:17-00:20",
                    "media_filename"=>"media/WG_u1_grammar_p1.mp3",
                ),
                "1"=>array(
                    "select_sort"=> "12",
                    "type"=>"audio",
                    "text"=>"It's a bag.",
                    "timeRange" => "00:11-00:13",
                    "media_filename"=>"media/WG_u1_grammar_p1.mp3",
                ),
                "2"=>array(
                    "select_sort"=> "13",
                    "type"=>"audio",
                    "text"=>"It's a ruler.",
                    "timeRange" => "00:03-00:05",
                    "media_filename"=>"media/WG_u1_grammar_p1.mp3",
                ),
            ),
            "selectEvents"=>array(
            ),
            "picture"   => "images/bag.png",
        );


        $data['events'][] = array(
            "num"                => "9",
            'type'               => "listen_and_click_answer",
            "timeRange"          => "00:00-00:03",
            "text"               => "What's this?",
            "media_filename"     => 'media/WG_u1_grammar_p1.mp3',
            "scores"=>5,
            "items_1"=>array(
                "1"=>array("type"=>"text",
                    "text"=>"It's",
                    "isCorrect"=>true,
                    "clickEvents"=>array(
                        "click_1"=>array(
                            "type"=>"audio",
                            "timeRange" => "00:36-00:38",
                            "media_filename"=>"media/WG_u1_voc.mp3",
                        ),
                    ),
                ),
            ),
            "items_2"=>array(
                "1"=>array(
                    "type"=>"text",
                    "text"=>"a pencil case",
                    "isCorrect"=>false,
                    "clickEvents"=>array(
                        "click_1"=>array(
                            "type"=>"audio",
                            "timeRange" => "00:29-00:31",
                            "media_filename"=>"media/WG_u1_voc.mp3",
                        ),
                    ),
                ),
                "2"=>array( "type"=>"text",
                    "text"=>"a bag",
                    "isCorrect"=>false,
                    "clickEvents"=>array(
                        "click_1"=>array(
                            "type"=>"audio",
                            "timeRange" => "00:21-00:23",
                            "media_filename"=>"media/WG_u1_voc.mp3",
                        ),
                    ),
                ),
                "3"=>array( "type"=>"text",
                    "text"=>"a ruler",
                    "isCorrect"=>true,
                    "clickEvents"=>array(
                        "click_1"=>array(
                            "type"=>"audio",
                            "timeRange" => "00:17-00:19",
                            "media_filename"=>"media/WG_u1_voc.mp3",
                        ),
                    ),
                ),
            ),
            "clickEvents"=>array(
                "0"=>array(
                    "select_sort"=> "11",
                    "type"=>"audio",
                    "text"=>"It's a pencil case.",
                    "timeRange" => "00:17-00:20",
                    "media_filename"=>"media/WG_u1_grammar_p1.mp3",
                ),
                "1"=>array(
                    "select_sort"=> "12",
                    "type"=>"audio",
                    "text"=>"It's a bag.",
                    "timeRange" => "00:11-00:13",
                    "media_filename"=>"media/WG_u1_grammar_p1.mp3",
                ),
                "2"=>array(
                    "select_sort"=> "13",
                    "type"=>"audio",
                    "text"=>"It's a ruler.",
                    "timeRange" => "00:03-00:05",
                    "media_filename"=>"media/WG_u1_grammar_p1.mp3",
                ),
            ),
            "selectEvents"=>array(
            ),
            "picture"   => "images/ruler.png",
        );


        $data['events'][] = array(
            "num"                => "10",
            'type'               => "listen_and_click_answer",
            "timeRange"          => "00:00-00:03",
            "text"               => "What's this?",
            "media_filename"     => 'media/WG_u1_grammar_p1.mp3',
            "scores"=>5,
            "items_1"=>array(
                "1"=>array("type"=>"text",
                    "text"=>"It's",
                    "isCorrect"=>true,
                    "clickEvents"=>array(
                        "click_1"=>array(
                            "type"=>"audio",
                            "timeRange" => "00:36-00:38",
                            "media_filename"=>"media/WG_u1_voc.mp3",
                        ),
                    ),
                ),
            ),
            "items_2"=>array(
                "1"=>array(
                    "type"=>"text",
                    "text"=>"a pen",
                    "isCorrect"=>true,
                    "clickEvents"=>array(
                        "click_1"=>array(
                            "type"=>"audio",
                            "timeRange" => "00:00-00:02",
                            "media_filename"=>"media/WG_u1_voc.mp3",
                        ),
                    ),
                ),
                "2"=>array( "type"=>"text",
                    "text"=>"a bag",
                    "isCorrect"=>false,
                    "clickEvents"=>array(
                        "click_1"=>array(
                            "type"=>"audio",
                            "timeRange" => "00:21-00:23",
                            "media_filename"=>"media/WG_u1_voc.mp3",
                        ),
                    ),
                ),
                "3"=>array( "type"=>"text",
                    "text"=>"a ruler",
                    "isCorrect"=>false,
                    "clickEvents"=>array(
                        "click_1"=>array(
                            "type"=>"audio",
                            "timeRange" => "00:17-00:19",
                            "media_filename"=>"media/WG_u1_voc.mp3",
                        ),
                    ),
                ),
            ),
            "clickEvents"=>array(
                "0"=>array(
                    "select_sort"=> "11",
                    "type"=>"audio",
                    "text"=>"It's a pen.",
                    "timeRange" => "00:05-00:07",
                    "media_filename"=>"media/WG_u1_grammar_p1.mp3",
                ),
                "1"=>array(
                    "select_sort"=> "12",
                    "type"=>"audio",
                    "text"=>"It's a bag.",
                    "timeRange" => "00:11-00:13",
                    "media_filename"=>"media/WG_u1_grammar_p1.mp3",
                ),
                "2"=>array(
                    "select_sort"=> "13",
                    "type"=>"audio",
                    "text"=>"It's a ruler.",
                    "timeRange" => "00:03-00:05",
                    "media_filename"=>"media/WG_u1_grammar_p1.mp3",
                ),
            ),
            "selectEvents"=>array(
            ),
            "picture"   => "images/pen.png",
        );


        $data['events'][] = array(
            "num"                => "11",
            'type'               => "listen_and_click_answer",
            "timeRange"          => "00:00-00:03",
            "text"               => "What's this?",
            "media_filename"     => 'media/WG_u1_grammar_p1.mp3',
            "scores"=>5,
            "items_1"=>array(
                "1"=>array("type"=>"text",
                    "text"=>"It's",
                    "isCorrect"=>true,
                    "clickEvents"=>array(
                        "click_1"=>array(
                            "type"=>"audio",
                            "timeRange" => "00:36-00:38",
                            "media_filename"=>"media/WG_u1_voc.mp3",
                        ),
                    ),
                ),
            ),
            "items_2"=>array(
                "1"=>array(
                    "type"=>"text",
                    "text"=>"a book",
                    "isCorrect"=>true,
                    "clickEvents"=>array(
                        "click_1"=>array(
                            "type"=>"audio",
                            "timeRange" => "00:04-00:06",
                            "media_filename"=>"media/WG_u1_voc.mp3",
                        ),
                    ),
                ),
                "2"=>array( "type"=>"text",
                    "text"=>"a crayon",
                    "isCorrect"=>false,
                    "clickEvents"=>array(
                        "click_1"=>array(
                            "type"=>"audio",
                            "timeRange" => "00:25-00:27",
                            "media_filename"=>"media/WG_u1_voc.mp3",
                        ),
                    ),
                ),
                "3"=>array( "type"=>"text",
                    "text"=>"a pencil case",
                    "isCorrect"=>false,
                    "clickEvents"=>array(
                        "click_1"=>array(
                            "type"=>"audio",
                            "timeRange" => "00:29-00:31",
                            "media_filename"=>"media/WG_u1_voc.mp3",
                        ),
                    ),
                ),
            ),
            "clickEvents"=>array(
                "0"=>array(
                    "select_sort"=> "11",
                    "type"=>"audio",
                    "text"=>"It's a book.",
                    "timeRange" => "00:13-00:15",
                    "media_filename"=>"media/WG_u1_grammar_p1.mp3",
                ),
                "1"=>array(
                    "select_sort"=> "12",
                    "type"=>"audio",
                    "text"=>"It's a crayon.",
                    "timeRange" => "00:15-00:17",
                    "media_filename"=>"media/WG_u1_grammar_p1.mp3",
                ),
                "2"=>array(
                    "select_sort"=> "13",
                    "type"=>"audio",
                    "text"=>"It's a pencil case.",
                    "timeRange" => "00:17-00:20",
                    "media_filename"=>"media/WG_u1_grammar_p1.mp3",
                ),
            ),
            "selectEvents"=>array(
            ),
            "picture"   => "images/book.png",
        );


        $data['events'][] = array(
            "num"                => "12",
            'type'               => "listen_and_click_answer",
            "timeRange"          => "00:00-00:03",
            "text"               => "What's this?",
            "media_filename"     => 'media/WG_u1_grammar_p1.mp3',
            "scores"=>5,
            "items_1"=>array(
                "1"=>array("type"=>"text",
                    "text"=>"It's",
                    "isCorrect"=>true,
                    "clickEvents"=>array(
                        "click_1"=>array(
                            "type"=>"audio",
                            "timeRange" => "00:36-00:38",
                            "media_filename"=>"media/WG_u1_voc.mp3",
                        ),
                    ),
                ),
            ),
            "items_2"=>array(
                "1"=>array(
                    "type"=>"text",
                    "text"=>"an eraser",
                    "isCorrect"=>true,
                    "clickEvents"=>array(
                        "click_1"=>array(
                            "type"=>"audio",
                            "timeRange" => "00:12-00:14",
                            "media_filename"=>"media/WG_u1_voc.mp3",
                        ),
                    ),
                ),
                "2"=>array( "type"=>"text",
                    "text"=>"a pencil",
                    "isCorrect"=>false,
                    "clickEvents"=>array(
                        "click_1"=>array(
                            "type"=>"audio",
                            "timeRange" => "00:08-00:10",
                            "media_filename"=>"media/WG_u1_voc.mp3",
                        ),
                    ),
                ),
                "3"=>array( "type"=>"text",
                    "text"=>"a crayon",
                    "isCorrect"=>false,
                    "clickEvents"=>array(
                        "click_1"=>array(
                            "type"=>"audio",
                            "timeRange" => "00:25-00:27",
                            "media_filename"=>"media/WG_u1_voc.mp3",
                        ),
                    ),
                ),
            ),
            "clickEvents"=>array(
                "0"=>array(
                    "select_sort"=> "11",
                    "type"=>"audio",
                    "text"=>"It's an eraser.",
                    "timeRange" => "00:09-00:11",
                    "media_filename"=>"media/WG_u1_grammar_p1.mp3",
                ),
                "1"=>array(
                    "select_sort"=> "12",
                    "type"=>"audio",
                    "text"=>"It's a pencil.",
                    "timeRange" => "00:07-00:09",
                    "media_filename"=>"media/WG_u1_grammar_p1.mp3",
                ),
                "2"=>array(
                    "select_sort"=> "13",
                    "type"=>"audio",
                    "text"=>"It's a crayon.",
                    "timeRange" => "00:15-00:17",
                    "media_filename"=>"media/WG_u1_grammar_p1.mp3",
                ),
            ),
            "selectEvents"=>array(
            ),
            "picture"   => "images/eraser.png",
        );



        $data['events'][] = array(
            "num"                => "12",
            'type'               => "listen_and_click_answer",
            "timeRange"          => "00:00-00:03",
            "text"               => "What's this?",
            "media_filename"     => 'media/WG_u1_grammar_p1.mp3',
            "scores"=>5,
            "items_1"=>array(
                "1"=>array("type"=>"text",
                    "text"=>"It's",
                    "isCorrect"=>true,
                    "clickEvents"=>array(
                        "click_1"=>array(
                            "type"=>"audio",
                            "timeRange" => "00:36-00:38",
                            "media_filename"=>"media/WG_u1_voc.mp3",
                        ),
                    ),
                ),
            ),
            "items_2"=>array(
                "1"=>array(
                    "type"=>"text",
                    "text"=>"a pencil",
                    "isCorrect"=>true,
                    "clickEvents"=>array(
                        "click_1"=>array(
                            "type"=>"audio",
                            "timeRange" => "00:08-00:10",
                            "media_filename"=>"media/WG_u1_voc.mp3",
                        ),
                    ),
                ),
                "2"=>array( "type"=>"text",
                    "text"=>"a book",
                    "isCorrect"=>false,
                    "clickEvents"=>array(
                        "click_1"=>array(
                            "type"=>"audio",
                            "timeRange" => "00:04-00:06",
                            "media_filename"=>"media/WG_u1_voc.mp3",
                        ),
                    ),
                ),
                "3"=>array( "type"=>"text",
                    "text"=>"an eraser",
                    "isCorrect"=>false,
                    "clickEvents"=>array(
                        "click_1"=>array(
                            "type"=>"audio",
                            "timeRange" => "00:12-00:14",
                            "media_filename"=>"media/WG_u1_voc.mp3",
                        ),
                    ),
                ),
            ),
            "clickEvents"=>array(
                "0"=>array(
                    "select_sort"=> "11",
                    "type"=>"audio",
                    "text"=>"It's a pencil.",
                    "timeRange" => "00:07-00:09",
                    "media_filename"=>"media/WG_u1_grammar_p1.mp3",
                ),
                "1"=>array(
                    "select_sort"=> "12",
                    "type"=>"audio",
                    "text"=>"It's a book.",
                    "timeRange" => "00:13-00:15",
                    "media_filename"=>"media/WG_u1_grammar_p1.mp3",
                ),
                "2"=>array(
                    "select_sort"=> "13",
                    "type"=>"audio",
                    "text"=>"It's an eraser.",
                    "timeRange" => "00:09-00:11",
                    "media_filename"=>"media/WG_u1_grammar_p1.mp3",
                ),
            ),
            "selectEvents"=>array(
            ),
            "picture"   => "images/pencil.png",
        );


        $data['events'][] = array(
            "num"                => "13",
            'type'               => "listen_and_click_answer",
            "timeRange"          => "00:00-00:03",
            "text"               => "What's this?",
            "media_filename"     => 'media/WG_u1_grammar_p1.mp3',
            "scores"=>5,
            "items_1"=>array(
                "1"=>array("type"=>"text",
                    "text"=>"It's",
                    "isCorrect"=>true,
                    "clickEvents"=>array(
                        "click_1"=>array(
                            "type"=>"audio",
                            "timeRange" => "00:36-00:38",
                            "media_filename"=>"media/WG_u1_voc.mp3",
                        ),
                    ),
                ),
            ),
            "items_2"=>array(
                "1"=>array(
                    "type"=>"text",
                    "text"=>"a crayon",
                    "isCorrect"=>true,
                    "clickEvents"=>array(
                        "click_1"=>array(
                            "type"=>"audio",
                            "timeRange" => "00:25-00:27",
                            "media_filename"=>"media/WG_u1_voc.mp3",
                        ),
                    ),
                ),
                "2"=>array( "type"=>"text",
                    "text"=>"a pencil case",
                    "isCorrect"=>false,
                    "clickEvents"=>array(
                        "click_1"=>array(
                            "type"=>"audio",
                            "timeRange" => "00:29-00:31",
                            "media_filename"=>"media/WG_u1_voc.mp3",
                        ),
                    ),
                ),
                "3"=>array( "type"=>"text",
                    "text"=>"a bag",
                    "isCorrect"=>false,
                    "clickEvents"=>array(
                        "click_1"=>array(
                            "type"=>"audio",
                            "timeRange" => "00:21-00:23",
                            "media_filename"=>"media/WG_u1_voc.mp3",
                        ),
                    ),
                ),
            ),
            "clickEvents"=>array(
                "0"=>array(
                    "select_sort"=> "11",
                    "type"=>"audio",
                    "text"=>"It's a crayon.",
                    "timeRange" => "00:15-00:17",
                    "media_filename"=>"media/WG_u1_grammar_p1.mp3",
                ),
                "1"=>array(
                    "select_sort"=> "12",
                    "type"=>"audio",
                    "text"=>"It's a pencil case.",
                    "timeRange" => "00:17-00:20",
                    "media_filename"=>"media/WG_u1_grammar_p1.mp3",
                ),
                "2"=>array(
                    "select_sort"=> "13",
                    "type"=>"audio",
                    "text"=>"It's a bag.",
                    "timeRange" => "00:11-00:13",
                    "media_filename"=>"media/WG_u1_grammar_p1.mp3",
                ),
            ),
            "selectEvents"=>array(
            ),
            "picture"   => "images/crayon.png",
        );

        $data['events'][] = array(
            "num"                => "14",
            'type'               => "listen_and_click_answer",
            "timeRange"          => "00:00-00:03",
            "text"               => "What's this?",
            "media_filename"     => 'media/WG_u1_grammar_p1.mp3',
            "scores"=>5,
            "items_1"=>array(
                "1"=>array("type"=>"text",
                    "text"=>"It's",
                    "isCorrect"=>true,
                    "clickEvents"=>array(
                        "click_1"=>array(
                            "type"=>"audio",
                            "timeRange" => "00:36-00:38",
                            "media_filename"=>"media/WG_u1_voc.mp3",
                        ),
                    ),
                ),
            ),
            "items_2"=>array(
                "1"=>array(
                    "type"=>"text",
                    "text"=>"a pencil case",
                    "isCorrect"=>true,
                    "clickEvents"=>array(
                        "click_1"=>array(
                            "type"=>"audio",
                            "timeRange" => "00:29-00:31",
                            "media_filename"=>"media/WG_u1_voc.mp3",
                        ),
                    ),
                ),
                "2"=>array( "type"=>"text",
                    "text"=>"a pencil",
                    "isCorrect"=>false,
                    "clickEvents"=>array(
                        "click_1"=>array(
                            "type"=>"audio",
                            "timeRange" => "00:08-00:10",
                            "media_filename"=>"media/WG_u1_voc.mp3",
                        ),
                    ),
                ),
                "3"=>array( "type"=>"text",
                    "text"=>"a crayon",
                    "isCorrect"=>false,
                    "clickEvents"=>array(
                        "click_1"=>array(
                            "type"=>"audio",
                            "timeRange" => "00:25-00:27",
                            "media_filename"=>"media/WG_u1_voc.mp3",
                        ),
                    ),
                ),
            ),
            "clickEvents"=>array(
                "0"=>array(
                    "select_sort"=> "11",
                    "type"=>"audio",
                    "text"=>"It's a pencil case.",
                    "timeRange" => "00:17-00:20",
                    "media_filename"=>"media/WG_u1_grammar_p1.mp3",
                ),
                "1"=>array(
                    "select_sort"=> "12",
                    "type"=>"audio",
                    "text"=>"It's a pencil.",
                    "timeRange" => "00:07-00:09",
                    "media_filename"=>"media/WG_u1_grammar_p1.mp3",
                ),
                "2"=>array(
                    "select_sort"=> "13",
                    "type"=>"audio",
                    "text"=>"It's a crayon.",
                    "timeRange" => "00:15-00:17",
                    "media_filename"=>"media/WG_u1_grammar_p1.mp3",
                ),
            ),
            "selectEvents"=>array(
            ),
            "picture"   => "images/pencil_case.png",
        );

        $data['events'][] = array(
            "num"                => "15",
            'type'               => "listen_and_click_answer",
            "timeRange"          => "00:00-00:03",
            "text"               => "What's this?",
            "media_filename"     => 'media/WG_u1_grammar_p1.mp3',
            "scores"=>5,
            "items_1"=>array(
                "1"=>array("type"=>"text",
                    "text"=>"It's",
                    "isCorrect"=>true,
                    "clickEvents"=>array(
                        "click_1"=>array(
                            "type"=>"audio",
                            "timeRange" => "00:36-00:38",
                            "media_filename"=>"media/WG_u1_voc.mp3",
                        ),
                    ),
                ),
            ),
            "items_2"=>array(
                "1"=>array(
                    "type"=>"text",
                    "text"=>"a bag",
                    "isCorrect"=>true,
                    "clickEvents"=>array(
                        "click_1"=>array(
                            "type"=>"audio",
                            "timeRange" => "00:21-00:23",
                            "media_filename"=>"media/WG_u1_voc.mp3",
                        ),
                    ),
                ),
                "2"=>array( "type"=>"text",
                    "text"=>"an eraser",
                    "isCorrect"=>false,
                    "clickEvents"=>array(
                        "click_1"=>array(
                            "type"=>"audio",
                            "timeRange" => "00:12-00:14",
                            "media_filename"=>"media/WG_u1_voc.mp3",
                        ),
                    ),
                ),
                "3"=>array( "type"=>"text",
                    "text"=>"a pencil",
                    "isCorrect"=>false,
                    "clickEvents"=>array(
                        "click_1"=>array(
                            "type"=>"audio",
                            "timeRange" => "00:08-00:10",
                            "media_filename"=>"media/WG_u1_voc.mp3",
                        ),
                    ),
                ),
            ),
            "clickEvents"=>array(
                "0"=>array(
                    "select_sort"=> "11",
                    "type"=>"audio",
                    "text"=>"It's a bag.",
                    "timeRange" => "00:11-00:13",
                    "media_filename"=>"media/WG_u1_grammar_p1.mp3",
                ),
                "1"=>array(
                    "select_sort"=> "12",
                    "type"=>"audio",
                    "text"=>"It's an eraser.",
                    "timeRange" => "00:09-00:11",
                    "media_filename"=>"media/WG_u1_grammar_p1.mp3",
                ),
                "2"=>array(
                    "select_sort"=> "13",
                    "type"=>"audio",
                    "text"=>"It's a pencil.",
                    "timeRange" => "00:07-00:09",
                    "media_filename"=>"media/WG_u1_grammar_p1.mp3",
                ),
            ),
            "selectEvents"=>array(
            ),
            "picture"   => "images/bag.png",
        );

        $data['events'][] = array(
            "num"                => "16",
            'type'               => "listen_and_click_answer",
            "timeRange"          => "00:00-00:03",
            "text"               => "What's this?",
            "media_filename"     => 'media/WG_u1_grammar_p1.mp3',
            "scores"=>5,
            "items_1"=>array(
                "1"=>array("type"=>"text",
                    "text"=>"It's",
                    "isCorrect"=>true,
                    "clickEvents"=>array(
                        "click_1"=>array(
                            "type"=>"audio",
                            "timeRange" => "00:36-00:38",
                            "media_filename"=>"media/WG_u1_voc.mp3",
                        ),
                    ),
                ),
            ),
            "items_2"=>array(
                "1"=>array(
                    "type"=>"text",
                    "text"=>"a ruler",
                    "isCorrect"=>true,
                    "clickEvents"=>array(
                        "click_1"=>array(
                            "type"=>"audio",
                            "timeRange" => "00:17-00:19",
                            "media_filename"=>"media/WG_u1_voc.mp3",
                        ),
                    ),
                ),
                "2"=>array( "type"=>"text",
                    "text"=>"a book",
                    "isCorrect"=>false,
                    "clickEvents"=>array(
                        "click_1"=>array(
                            "type"=>"audio",
                            "timeRange" => "00:04-00:06",
                            "media_filename"=>"media/WG_u1_voc.mp3",
                        ),
                    ),
                ),
                "3"=>array( "type"=>"text",
                    "text"=>"an eraser",
                    "isCorrect"=>false,
                    "clickEvents"=>array(
                        "click_1"=>array(
                            "type"=>"audio",
                            "timeRange" => "00:12-00:14",
                            "media_filename"=>"media/WG_u1_voc.mp3",
                        ),
                    ),
                ),
            ),
            "clickEvents"=>array(
                "0"=>array(
                    "select_sort"=> "11",
                    "type"=>"audio",
                    "text"=>"It's a ruler.",
                    "timeRange" => "00:03-00:05",
                    "media_filename"=>"media/WG_u1_grammar_p1.mp3",
                ),
                "1"=>array(
                    "select_sort"=> "12",
                    "type"=>"audio",
                    "text"=>"It's a book.",
                    "timeRange" => "00:13-00:15",
                    "media_filename"=>"media/WG_u1_grammar_p1.mp3",
                ),
                "2"=>array(
                    "select_sort"=> "13",
                    "type"=>"audio",
                    "text"=>"It's an eraser.",
                    "timeRange" => "00:09-00:11",
                    "media_filename"=>"media/WG_u1_grammar_p1.mp3",
                ),
            ),
            "selectEvents"=>array(
            ),
            "picture"   => "images/ruler.png",
        );


        $data['events'][] = array(
            "num"                => "17",
            'type'               => "listen_and_click_answer",
            "timeRange"          => "00:08-00:11",
            "text"               => "Is this a pen?",
            "media_filename"     => 'media/WG_u1_grammar_p2.mp3',
            "scores"=>5,
            "items_1"=>array(
                "1"=>array( "type"=>"text",
                    "text"=>"Yes, it is.",
                    "isCorrect"=>true,
                    "clickEvents"=>array(
                        "click_1"=>array(
                            "type"=>"audio",
                            "timeRange" => "00:02-00:05",
                            "media_filename"=>"media/WG_u1_grammar_p2.mp3",
                        ),
                    ),
                ),
            ),
            "items_2"=>array(
                "1"=>array( "type"=>"text",
                    "text"=>"No, it isn't.",
                    "isCorrect"=>false,
                    "clickEvents"=>array(
                        "click_1"=>array(
                            "type"=>"audio",
                            "timeRange" => "00:05-00:08",
                            "media_filename"=>"media/WG_u1_grammar_p2.mp3",
                        ),
                    ),
                ),
            ),
            "childEvents"     =>array(

            ),
            "clickEvents"=>array(
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "timeRange"          => "00:05-00:07",
                    "media_filename"     =>"media/WG_u1_grammar_p1.mp3",
                    "media_type"         => 'audio',
                    "text"              =>"It's a pen.",
                ),
                "No"=>array(
                    "timeRange"          => "00:05-00:07",
                    "media_filename"     =>"media/WG_u1_grammar_p1.mp3",
                    "media_type"         => 'audio',
                    "text"              =>"It's a pen.",
                ),
            ),
            "picture"   => "images/pen.png",
        );


        $data['events'][] = array(
            "num"                => "18",
            'type'               => "listen_and_click_answer",
            "timeRange"          => "00:11-00:14",
            "text"               => "Is this a book?",
            "media_filename"     => 'media/WG_u1_grammar_p2.mp3',
            "scores"=>5,
            "items_1"=>array(
                "1"=>array( "type"=>"text",
                    "text"=>"Yes, it is.",
                    "isCorrect"=>true,
                    "clickEvents"=>array(
                        "click_1"=>array(
                            "type"=>"audio",
                            "timeRange" => "00:02-00:05",
                            "media_filename"=>"media/WG_u1_grammar_p2.mp3",
                        ),
                    ),
                ),
            ),
            "items_2"=>array(
                "1"=>array( "type"=>"text",
                    "text"=>"No, it isn't.",
                    "isCorrect"=>false,
                    "clickEvents"=>array(
                        "click_1"=>array(
                            "type"=>"audio",
                            "timeRange" => "00:05-00:08",
                            "media_filename"=>"media/WG_u1_grammar_p2.mp3",
                        ),
                    ),
                ),
            ),
            "childEvents"     =>array(

            ),
            "clickEvents"=>array(
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "timeRange"          => "00:13-00:15",
                    "media_filename"     =>"media/WG_u1_grammar_p1.mp3",
                    "media_type"         => 'audio',
                    "text"              =>"It's a book.",
                ),
                "No"=>array(
                    "timeRange"          => "00:13-00:15",
                    "media_filename"     =>"media/WG_u1_grammar_p1.mp3",
                    "media_type"         => 'audio',
                    "text"              =>"It's a book.",
                ),
            ),
            "picture"   => "images/book.png",
        );

        $data['events'][] = array(
            "num"                => "19",
            'type'               => "listen_and_click_answer",
            "timeRange"          => "00:14-00:17",
            "text"               => "Is this an eraser?",
            "media_filename"     => 'media/WG_u1_grammar_p2.mp3',
            "scores"=>5,
            "items_1"=>array(
                "1"=>array( "type"=>"text",
                    "text"=>"Yes, it is.",
                    "isCorrect"=>true,
                    "clickEvents"=>array(
                        "click_1"=>array(
                            "type"=>"audio",
                            "timeRange" => "00:02-00:05",
                            "media_filename"=>"media/WG_u1_grammar_p2.mp3",
                        ),
                    ),
                ),
            ),
            "items_2"=>array(
                "1"=>array( "type"=>"text",
                    "text"=>"No, it isn't.",
                    "isCorrect"=>false,
                    "clickEvents"=>array(
                        "click_1"=>array(
                            "type"=>"audio",
                            "timeRange" => "00:05-00:08",
                            "media_filename"=>"media/WG_u1_grammar_p2.mp3",
                        ),
                    ),
                ),
            ),
            "childEvents"     =>array(

            ),
            "clickEvents"=>array(
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "timeRange"          => "00:09-00:11",
                    "media_filename"     =>"media/WG_u1_grammar_p1.mp3",
                    "media_type"         => 'audio',
                    "text"              =>"It's an eraser.",
                ),
                "No"=>array(
                    "timeRange"          => "00:09-00:11",
                    "media_filename"     =>"media/WG_u1_grammar_p1.mp3",
                    "media_type"         => 'audio',
                    "text"              =>"It's an eraser.",
                ),
            ),
            "picture"   => "images/eraser.png",
        );


        $data['events'][] = array(
            "num"                => "20",
            'type'               => "listen_and_click_answer",
            "timeRange"          => "00:17-00:20",
            "text"               => "Is this a pencil?",
            "media_filename"     => 'media/WG_u1_grammar_p2.mp3',
            "scores"=>5,
            "items_1"=>array(
                "1"=>array( "type"=>"text",
                    "text"=>"Yes, it is.",
                    "isCorrect"=>true,
                    "clickEvents"=>array(
                        "click_1"=>array(
                            "type"=>"audio",
                            "timeRange" => "00:02-00:05",
                            "media_filename"=>"media/WG_u1_grammar_p2.mp3",
                        ),
                    ),
                ),
            ),
            "items_2"=>array(
                "1"=>array( "type"=>"text",
                    "text"=>"No, it isn't.",
                    "isCorrect"=>false,
                    "clickEvents"=>array(
                        "click_1"=>array(
                            "type"=>"audio",
                            "timeRange" => "00:05-00:08",
                            "media_filename"=>"media/WG_u1_grammar_p2.mp3",
                        ),
                    ),
                ),
            ),
            "childEvents"     =>array(

            ),
            "clickEvents"=>array(
            ),
            "selectEvents"=>array(
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
            "picture"   => "images/pencil.png",
        );

        $data['events'][] = array(
            "num"                => "21",
            'type'               => "listen_and_click_answer",
            "timeRange"          => "00:20-00:23",
            "text"               => "Is this a crayon?",
            "media_filename"     => 'media/WG_u1_grammar_p2.mp3',
            "scores"=>5,
            "items_1"=>array(
                "1"=>array( "type"=>"text",
                    "text"=>"Yes, it is.",
                    "isCorrect"=>true,
                    "clickEvents"=>array(
                        "click_1"=>array(
                            "type"=>"audio",
                            "timeRange" => "00:02-00:05",
                            "media_filename"=>"media/WG_u1_grammar_p2.mp3",
                        ),
                    ),
                ),
            ),
            "items_2"=>array(
                "1"=>array( "type"=>"text",
                    "text"=>"No, it isn't.",
                    "isCorrect"=>false,
                    "clickEvents"=>array(
                        "click_1"=>array(
                            "type"=>"audio",
                            "timeRange" => "00:05-00:08",
                            "media_filename"=>"media/WG_u1_grammar_p2.mp3",
                        ),
                    ),
                ),
            ),
            "childEvents"     =>array(

            ),
            "clickEvents"=>array(
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "timeRange"          => "00:15-00:17",
                    "media_filename"     =>"media/WG_u1_grammar_p1.mp3",
                    "media_type"         => 'audio',
                    "text"              =>"It's a crayon.",
                ),
                "No"=>array(
                    "timeRange"          => "00:15-00:17",
                    "media_filename"     =>"media/WG_u1_grammar_p1.mp3",
                    "media_type"         => 'audio',
                    "text"              =>"It's a crayon.",
                ),
            ),
            "picture"   => "images/crayon.png",
        );


        $data['events'][] = array(
            "num"                => "22",
            'type'               => "listen_and_click_answer",
            "timeRange"          => "00:23-00:26",
            "text"               => "Is this a pencil case?",
            "media_filename"     => 'media/WG_u1_grammar_p2.mp3',
            "scores"=>5,
            "items_1"=>array(
                "1"=>array( "type"=>"text",
                    "text"=>"Yes, it is.",
                    "isCorrect"=>true,
                    "clickEvents"=>array(
                        "click_1"=>array(
                            "type"=>"audio",
                            "timeRange" => "00:02-00:05",
                            "media_filename"=>"media/WG_u1_grammar_p2.mp3",
                        ),
                    ),
                ),
            ),
            "items_2"=>array(
                "1"=>array( "type"=>"text",
                    "text"=>"No, it isn't.",
                    "isCorrect"=>false,
                    "clickEvents"=>array(
                        "click_1"=>array(
                            "type"=>"audio",
                            "timeRange" => "00:05-00:08",
                            "media_filename"=>"media/WG_u1_grammar_p2.mp3",
                        ),
                    ),
                ),
            ),
            "childEvents"     =>array(

            ),
            "clickEvents"=>array(
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "timeRange"          => "00:17-00:20",
                    "media_filename"     =>"media/WG_u1_grammar_p1.mp3",
                    "media_type"         => 'audio',
                    "text"              =>"It's a pencil case.",
                ),
                "No"=>array(
                    "timeRange"          => "00:17-00:20",
                    "media_filename"     =>"media/WG_u1_grammar_p1.mp3",
                    "media_type"         => 'audio',
                    "text"              =>"It's a pencil case.",
                ),
            ),
            "picture"   => "images/pencil_case.png",
        );

        $data['events'][] = array(
            "num"                => "23",
            'type'               => "listen_and_click_answer",
            "timeRange"          => "00:26-00:29",
            "text"               => "Is this a bag?",
            "media_filename"     => 'media/WG_u1_grammar_p2.mp3',
            "scores"=>5,
            "items_1"=>array(
                "1"=>array( "type"=>"text",
                    "text"=>"Yes, it is.",
                    "isCorrect"=>true,
                    "clickEvents"=>array(
                        "click_1"=>array(
                            "type"=>"audio",
                            "timeRange" => "00:02-00:05",
                            "media_filename"=>"media/WG_u1_grammar_p2.mp3",
                        ),
                    ),
                ),
            ),
            "items_2"=>array(
                "1"=>array( "type"=>"text",
                    "text"=>"No, it isn't.",
                    "isCorrect"=>false,
                    "clickEvents"=>array(
                        "click_1"=>array(
                            "type"=>"audio",
                            "timeRange" => "00:05-00:08",
                            "media_filename"=>"media/WG_u1_grammar_p2.mp3",
                        ),
                    ),
                ),
            ),
            "childEvents"     =>array(

            ),
            "clickEvents"=>array(
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "timeRange"          => "00:11-00:13",
                    "media_filename"     =>"media/WG_u1_grammar_p1.mp3",
                    "media_type"         => 'audio',
                    "text"              =>"It's a bag.",
                ),
                "No"=>array(
                    "timeRange"          => "00:11-00:13",
                    "media_filename"     =>"media/WG_u1_grammar_p1.mp3",
                    "media_type"         => 'audio',
                    "text"              =>"It's a bag.",
                ),
            ),
            "picture"   => "images/bag.png",
        );


        $data['events'][] = array(
            "num"                => "24",
            'type'               => "listen_and_click_answer",
            "timeRange"          => "00:29-00:32",
            "text"               => "Is this a ruler?",
            "media_filename"     => 'media/WG_u1_grammar_p2.mp3',
            "scores"=>5,
            "items_1"=>array(
                "1"=>array( "type"=>"text",
                    "text"=>"Yes, it is.",
                    "isCorrect"=>true,
                    "clickEvents"=>array(
                        "click_1"=>array(
                            "type"=>"audio",
                            "timeRange" => "00:02-00:05",
                            "media_filename"=>"media/WG_u1_grammar_p2.mp3",
                        ),
                    ),
                ),
            ),
            "items_2"=>array(
                "1"=>array( "type"=>"text",
                    "text"=>"No, it isn't.",
                    "isCorrect"=>false,
                    "clickEvents"=>array(
                        "click_1"=>array(
                            "type"=>"audio",
                            "timeRange" => "00:05-00:08",
                            "media_filename"=>"media/WG_u1_grammar_p2.mp3",
                        ),
                    ),
                ),
            ),
            "childEvents"     =>array(

            ),
            "clickEvents"=>array(
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "timeRange"          => "00:03-00:05",
                    "media_filename"     =>"media/WG_u1_grammar_p1.mp3",
                    "media_type"         => 'audio',
                    "text"              =>"It's a ruler.",
                ),
                "No"=>array(
                    "timeRange"          => "00:03-00:05",
                    "media_filename"     =>"media/WG_u1_grammar_p1.mp3",
                    "media_type"         => 'audio',
                    "text"              =>"It's a ruler.",
                ),
            ),
            "picture"   => "images/ruler.png",
        );


        $data['events'][] = array(
            "num"                => "25",
            'type'               => "listen_and_click_answer",
            "timeRange"          => "00:29-00:32",
            "text"               => "Is this a ruler?",
            "media_filename"     => 'media/WG_u1_grammar_p2.mp3',
            "scores"=>5,
            "items_1"=>array(
                "1"=>array( "type"=>"text",
                    "text"=>"Yes, it is.",
                    "isCorrect"=>false,
                    "clickEvents"=>array(
                        "click_1"=>array(
                            "type"=>"audio",
                            "timeRange" => "00:02-00:05",
                            "media_filename"=>"media/WG_u1_grammar_p2.mp3",
                        ),
                    ),
                ),
            ),
            "items_2"=>array(
                "1"=>array( "type"=>"text",
                    "text"=>"No, it isn't.",
                    "isCorrect"=>true,
                    "clickEvents"=>array(
                        "click_1"=>array(
                            "type"=>"audio",
                            "timeRange" => "00:05-00:08",
                            "media_filename"=>"media/WG_u1_grammar_p2.mp3",
                        ),
                    ),
                ),
            ),
            "childEvents"     =>array(

            ),
            "clickEvents"=>array(
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "timeRange"          => "00:05-00:07",
                    "media_filename"     =>"media/WG_u1_grammar_p1.mp3",
                    "media_type"         => 'audio',
                    "text"              =>"It's a pen.",
                ),
                "No"=>array(
                    "timeRange"          => "00:05-00:07",
                    "media_filename"     =>"media/WG_u1_grammar_p1.mp3",
                    "media_type"         => 'audio',
                    "text"              =>"It's a pen.",
                ),
            ),
            "picture"   => "images/pen.png",
        );


        $data['events'][] = array(
        "num"                => "26",
        'type'               => "listen_and_click_answer",
        "timeRange"          => "00:17-00:20",
        "text"               => "Is this a pencil?",
        "media_filename"     => 'media/WG_u1_grammar_p2.mp3',
        "scores"=>5,
        "items_1"=>array(
            "1"=>array( "type"=>"text",
                "text"=>"Yes, it is.",
                "isCorrect"=>false,
                "clickEvents"=>array(
                    "click_1"=>array(
                        "type"=>"audio",
                        "timeRange" => "00:02-00:05",
                        "media_filename"=>"media/WG_u1_grammar_p2.mp3",
                    ),
                ),
            ),
        ),
        "items_2"=>array(
            "1"=>array( "type"=>"text",
                "text"=>"No, it isn't.",
                "isCorrect"=>true,
                "clickEvents"=>array(
                    "click_1"=>array(
                        "type"=>"audio",
                        "timeRange" => "00:05-00:08",
                        "media_filename"=>"media/WG_u1_grammar_p2.mp3",
                    ),
                ),
            ),
        ),
        "childEvents"     =>array(

        ),
        "clickEvents"=>array(
        ),
        "selectEvents"=>array(
            "Yes"=>array(
                "timeRange"          => "00:13-00:15",
                "media_filename"     =>"media/WG_u1_grammar_p1.mp3",
                "media_type"         => 'audio',
                "text"              =>"It's a book.",
            ),
            "No"=>array(
                "timeRange"          => "00:13-00:15",
                "media_filename"     =>"media/WG_u1_grammar_p1.mp3",
                "media_type"         => 'audio',
                "text"              =>"It's a book.",
            ),
        ),
        "picture"   => "images/book.png",
    );


        $data['events'][] = array(
            "num"                => "27",
            'type'               => "listen_and_click_answer",
            "timeRange"          => "00:08-00:11",
            "text"               => "Is this a pen?",
            "media_filename"     => 'media/WG_u1_grammar_p2.mp3',
            "scores"=>5,
            "items_1"=>array(
                "1"=>array( "type"=>"text",
                    "text"=>"Yes, it is.",
                    "isCorrect"=>false,
                    "clickEvents"=>array(
                        "click_1"=>array(
                            "type"=>"audio",
                            "timeRange" => "00:02-00:05",
                            "media_filename"=>"media/WG_u1_grammar_p2.mp3",
                        ),
                    ),
                ),
            ),
            "items_2"=>array(
                "1"=>array( "type"=>"text",
                    "text"=>"No, it isn't.",
                    "isCorrect"=>true,
                    "clickEvents"=>array(
                        "click_1"=>array(
                            "type"=>"audio",
                            "timeRange" => "00:05-00:08",
                            "media_filename"=>"media/WG_u1_grammar_p2.mp3",
                        ),
                    ),
                ),
            ),
            "childEvents"     =>array(

            ),
            "clickEvents"=>array(
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "timeRange"          => "00:09-00:11",
                    "media_filename"     =>"media/WG_u1_grammar_p1.mp3",
                    "media_type"         => 'audio',
                    "text"              =>"It's an eraser.",
                ),
                "No"=>array(
                    "timeRange"          => "00:09-00:11",
                    "media_filename"     =>"media/WG_u1_grammar_p1.mp3",
                    "media_type"         => 'audio',
                    "text"              =>"It's an eraser.",
                ),
            ),
            "picture"   => "images/eraser.png",
        );


        $data['events'][] = array(
            "num"                => "28",
            'type'               => "listen_and_click_answer",
            "timeRange"          => "00:20-00:23",
            "text"               => "Is this a crayon?",
            "media_filename"     => 'media/WG_u1_grammar_p2.mp3',
            "scores"=>5,
            "items_1"=>array(
                "1"=>array( "type"=>"text",
                    "text"=>"Yes, it is.",
                    "isCorrect"=>false,
                    "clickEvents"=>array(
                        "click_1"=>array(
                            "type"=>"audio",
                            "timeRange" => "00:02-00:05",
                            "media_filename"=>"media/WG_u1_grammar_p2.mp3",
                        ),
                    ),
                ),
            ),
            "items_2"=>array(
                "1"=>array( "type"=>"text",
                    "text"=>"No, it isn't.",
                    "isCorrect"=>true,
                    "clickEvents"=>array(
                        "click_1"=>array(
                            "type"=>"audio",
                            "timeRange" => "00:05-00:08",
                            "media_filename"=>"media/WG_u1_grammar_p2.mp3",
                        ),
                    ),
                ),
            ),
            "childEvents"     =>array(

            ),
            "clickEvents"=>array(
            ),
            "selectEvents"=>array(
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
            "picture"   => "images/pencil.png",
        );

        $data['events'][] = array(
            "num"                => "29",
            'type'               => "listen_and_click_answer",
            "timeRange"          => "00:14-00:17",
            "text"               => "Is this an eraser?",
            "media_filename"     => 'media/WG_u1_grammar_p2.mp3',
            "scores"=>5,
            "items_1"=>array(
                "1"=>array( "type"=>"text",
                    "text"=>"Yes, it is.",
                    "isCorrect"=>false,
                    "clickEvents"=>array(
                        "click_1"=>array(
                            "type"=>"audio",
                            "timeRange" => "00:02-00:05",
                            "media_filename"=>"media/WG_u1_grammar_p2.mp3",
                        ),
                    ),
                ),
            ),
            "items_2"=>array(
                "1"=>array( "type"=>"text",
                    "text"=>"No, it isn't.",
                    "isCorrect"=>true,
                    "clickEvents"=>array(
                        "click_1"=>array(
                            "type"=>"audio",
                            "timeRange" => "00:05-00:08",
                            "media_filename"=>"media/WG_u1_grammar_p2.mp3",
                        ),
                    ),
                ),
            ),
            "childEvents"     =>array(

            ),
            "clickEvents"=>array(
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "timeRange"          => "00:15-00:17",
                    "media_filename"     =>"media/WG_u1_grammar_p1.mp3",
                    "media_type"         => 'audio',
                    "text"              =>"It's a crayon.",
                ),
                "No"=>array(
                    "timeRange"          => "00:15-00:17",
                    "media_filename"     =>"media/WG_u1_grammar_p1.mp3",
                    "media_type"         => 'audio',
                    "text"              =>"It's a crayon.",
                ),
            ),
            "picture"   => "images/crayon.png",
        );


        $data['events'][] = array(
            "num"                => "30",
            'type'               => "listen_and_click_answer",
            "timeRange"          => "00:26-00:29",
            "text"               => "Is this a bag?",
            "media_filename"     => 'media/WG_u1_grammar_p2.mp3',
            "scores"=>5,
            "items_1"=>array(
                "1"=>array( "type"=>"text",
                    "text"=>"Yes, it is.",
                    "isCorrect"=>false,
                    "clickEvents"=>array(
                        "click_1"=>array(
                            "type"=>"audio",
                            "timeRange" => "00:02-00:05",
                            "media_filename"=>"media/WG_u1_grammar_p2.mp3",
                        ),
                    ),
                ),
            ),
            "items_2"=>array(
                "1"=>array( "type"=>"text",
                    "text"=>"No, it isn't.",
                    "isCorrect"=>true,
                    "clickEvents"=>array(
                        "click_1"=>array(
                            "type"=>"audio",
                            "timeRange" => "00:05-00:08",
                            "media_filename"=>"media/WG_u1_grammar_p2.mp3",
                        ),
                    ),
                ),
            ),
            "childEvents"     =>array(

            ),
            "clickEvents"=>array(
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "timeRange"          => "00:17-00:20",
                    "media_filename"     =>"media/WG_u1_grammar_p1.mp3",
                    "media_type"         => 'audio',
                    "text"              =>"It's a pencil case.",
                ),
                "No"=>array(
                    "timeRange"          => "00:17-00:20",
                    "media_filename"     =>"media/WG_u1_grammar_p1.mp3",
                    "media_type"         => 'audio',
                    "text"              =>"It's a pencil case.",
                ),
            ),
            "picture"   => "images/pencil_case.png",
        );


        $data['events'][] = array(
            "num"                => "31",
            'type'               => "listen_and_click_answer",
            "timeRange"          => "00:11-00:14",
            "text"               => "Is this a book?",
            "media_filename"     => 'media/WG_u1_grammar_p2.mp3',
            "scores"=>5,
            "items_1"=>array(
                "1"=>array( "type"=>"text",
                    "text"=>"Yes, it is.",
                    "isCorrect"=>false,
                    "clickEvents"=>array(
                        "click_1"=>array(
                            "type"=>"audio",
                            "timeRange" => "00:02-00:05",
                            "media_filename"=>"media/WG_u1_grammar_p2.mp3",
                        ),
                    ),
                ),
            ),
            "items_2"=>array(
                "1"=>array( "type"=>"text",
                    "text"=>"No, it isn't.",
                    "isCorrect"=>true,
                    "clickEvents"=>array(
                        "click_1"=>array(
                            "type"=>"audio",
                            "timeRange" => "00:05-00:08",
                            "media_filename"=>"media/WG_u1_grammar_p2.mp3",
                        ),
                    ),
                ),
            ),
            "childEvents"     =>array(

            ),
            "clickEvents"=>array(
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "timeRange"          => "00:11-00:13",
                    "media_filename"     =>"media/WG_u1_grammar_p1.mp3",
                    "media_type"         => 'audio',
                    "text"              =>"It's a bag.",
                ),
                "No"=>array(
                    "timeRange"          => "00:11-00:13",
                    "media_filename"     =>"media/WG_u1_grammar_p1.mp3",
                    "media_type"         => 'audio',
                    "text"              =>"It's a bag.",
                ),
            ),
            "picture"   => "images/bag.png",
        );


        $data['events'][] = array(
            "num"                => "32",
            'type'               => "listen_and_click_answer",
            "timeRange"          => "00:23-00:26",
            "text"               => "Is this a pencil case?",
            "media_filename"     => 'media/WG_u1_grammar_p2.mp3',
            "scores"=>5,
            "items_1"=>array(
                "1"=>array( "type"=>"text",
                    "text"=>"Yes, it is.",
                    "isCorrect"=>false,
                    "clickEvents"=>array(
                        "click_1"=>array(
                            "type"=>"audio",
                            "timeRange" => "00:02-00:05",
                            "media_filename"=>"media/WG_u1_grammar_p2.mp3",
                        ),
                    ),
                ),
            ),
            "items_2"=>array(
                "1"=>array( "type"=>"text",
                    "text"=>"No, it isn't.",
                    "isCorrect"=>true,
                    "clickEvents"=>array(
                        "click_1"=>array(
                            "type"=>"audio",
                            "timeRange" => "00:05-00:08",
                            "media_filename"=>"media/WG_u1_grammar_p2.mp3",
                        ),
                    ),
                ),
            ),
            "childEvents"     =>array(

            ),
            "clickEvents"=>array(
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "timeRange"          => "00:03-00:05",
                    "media_filename"     =>"media/WG_u1_grammar_p1.mp3",
                    "media_type"         => 'audio',
                    "text"              =>"It's a ruler.",
                ),
                "No"=>array(
                    "timeRange"          => "00:03-00:05",
                    "media_filename"     =>"media/WG_u1_grammar_p1.mp3",
                    "media_type"         => 'audio',
                    "text"              =>"It's a ruler.",
                ),
            ),
            "picture"   => "images/ruler.png",
        );


        $a = json_encode($data);
        $fp = fopen('json195.txt', "w");
        fwrite($fp, $a);
        fclose($fp);
        return;
    }


    //listen_and_repeat
    // 强制录音
    public function getPart196()
    {
        $data = array(
            "level_id"   =>1,
            "unit_id"    =>9,
            "lesson_id"  =>76,
            "part_id"    =>196,
            "play_type"  =>"auto"
        );

        $data['systems'][] = array(
            "num"             => "1",
            'type'            => "listen_and_repeat",
            "timeRange"       => "01:06:000-01:08:133",
            "text"            => "listen and speak.",
            "media_filename"  => 'media/WG_system.mp3',
            "clickEvents"     =>array(
            ),
            "childEvents"     =>array(
            ),
            "selectEvents"=>array(
            ),
            "media_type" => 'audio',
            "picture" => "",
            "pictures" => array()
        );


        $data['events'][] = array(
            "num"                => "2",
            'type'               => "listen_and_repeat",
            "timeRange"          => "00:05-00:07",
            "text"               => "It's a pen.",
            "media_filename"      =>"media/WG_u1_grammar_p1.mp3",
            "media_type"         => 'audio',
            "scores"=>5,
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"record",
                ),
                "1"=>array(
                    "type"=>"replay", //回听录音
                ),
                "2"=>array(
                    "type"=>"repeat", //回听录音
                ),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "type"=>"system",
                ),
                "No"=>array(
                    "type"=>"system"
                ),
            ),
            "picture"   => "images/pen.png",
        );

        $data['events'][] = array(
            "num"                => "3",
            'type'               => "listen_and_repeat",
            "timeRange"          => "00:13-00:15",
            "text"               => "It's a book.",
            "media_filename"           =>"media/WG_u1_grammar_p1.mp3",
            "media_type"         => 'audio',
            "scores"=>5,
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"record",
                ),
                "1"=>array(
                    "type"=>"replay", //回听录音
                ),
                "2"=>array(
                    "type"=>"repeat", //回听录音
                ),
            ),
            "selectEvents"=>array(
            ),
            "picture"   => "images/book.png",
        );

        $data['events'][] = array(
            "num"                => "4",
            'type'               => "listen_and_repeat",
            "timeRange"          => "00:09-00:11",
            "text"               => "It's an eraser.",
            "media_filename"           =>"media/WG_u1_grammar_p1.mp3",
            "media_type"         => 'audio',
            "scores"=>5,
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"record",
                ),
                "1"=>array(
                    "type"=>"replay", //回听录音
                ),
                "2"=>array(
                    "type"=>"repeat", //回听录音
                ),
            ),
            "selectEvents"=>array(
            ),
            "picture"   => "images/eraser.png",
        );

        $data['events'][] = array(
            "num"                => "5",
            'type'               => "listen_and_repeat",
            "timeRange"          => "00:07-00:09",
            "text"               => "It's a pencil.",
            "media_filename"           =>"media/WG_u1_grammar_p1.mp3",
            "media_type"         => 'audio',
            "scores"=>5,
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"record",
                ),
                "1"=>array(
                    "type"=>"replay", //回听录音
                ),
                "2"=>array(
                    "type"=>"repeat", //回听录音
                ),
            ),
            "selectEvents"=>array(
            ),
            "picture"   => "images/pencil.png",
        );

        $data['events'][] = array(
            "num"                => "6",
            'type'               => "listen_and_repeat",
            "timeRange"          => "00:15-00:17",
            "text"               => "It's a crayon.",
            "media_filename"           =>"media/WG_u1_grammar_p1.mp3",
            "media_type"         => 'audio',
            "scores"=>5,
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"record",
                ),
                "1"=>array(
                    "type"=>"replay", //回听录音
                ),
                "2"=>array(
                    "type"=>"repeat", //回听录音
                ),
            ),
            "selectEvents"=>array(
            ),
            "picture"   => "images/crayon.png",
        );

        $data['events'][] = array(
            "num"                => "7",
            'type'               => "listen_and_repeat",
            "timeRange"          => "00:17-00:20",
            "text"               => "It's a pencil case.",
            "media_filename"           =>"media/WG_u1_grammar_p1.mp3",
            "media_type"         => 'audio',
            "scores"=>5,
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"record",
                ),
                "1"=>array(
                    "type"=>"replay", //回听录音
                ),
                "2"=>array(
                    "type"=>"repeat", //回听录音
                ),
            ),
            "selectEvents"=>array(
            ),
            "picture"   => "images/pencil_case.png",
        );

        $data['events'][] = array(
            "num"                => "8",
            'type'               => "listen_and_repeat",
            "timeRange"          => "00:11-00:13",
            "text"               => "It's a bag.",
            "media_filename"           =>"media/WG_u1_grammar_p1.mp3",
            "media_type"         => 'audio',
            "scores"=>5,
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"record",
                ),
                "1"=>array(
                    "type"=>"replay", //回听录音
                ),
                "2"=>array(
                    "type"=>"repeat", //回听录音
                ),
            ),
            "selectEvents"=>array(
            ),
            "picture"   => "images/bag.png",
        );

        $data['events'][] = array(
            "num"                => "9",
            'type'               => "listen_and_repeat",
            "timeRange"          => "00:03-00:05",
            "text"               => "It's a ruler.",
            "media_filename"           =>"media/WG_u1_grammar_p1.mp3",
            "media_type"         => 'audio',
            "scores"=>5,
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"record",
                ),
                "1"=>array(
                    "type"=>"replay", //回听录音
                ),
                "2"=>array(
                    "type"=>"repeat", //回听录音
                ),
            ),
            "selectEvents"=>array(
            ),
            "picture"   => "images/ruler.png",
        );

        $a = json_encode($data);
        $fp = fopen('json196.txt', "w");
        fwrite($fp, $a);
        fclose($fp);
        return;
    }


    public function getPart197()
    {
        $data = array(
            "level_id"   =>1,
            "unit_id"    =>9,
            "lesson_id"  =>76,
            "part_id"    =>197,
            "play_type"  =>"auto"
        );


        $data['systems'][] = array(
            "num"             => "1",
            'type'            => "look_and_speak_answer",
            "timeRange"       => "01:06:000-01:08:133",
            "text"            => "listen and speak.",
            "media_filename"  => 'media/WG_system.mp3',
            "clickEvents"     =>array(
            ),
            "childEvents"     =>array(
            ),
            "selectEvents"=>array(
            ),
            "media_type" => 'audio',
            "picture" => "",
            "pictures" => array()
        );

        $data['events'][] = array(
            "num"                => "2",
            'type'               => "look_and_speak_answer",
            "timeRange"          => "00:00-00:03",
            "text"               => "What's this?",
            "media_filename"     => 'media/WG_u1_grammar_p1.mp3',
            "scores"=>5,
            "answers"=>array(
                "0"=>array("type"=>"text","text"=>"It is a pen.","isCorrect"=>true), //对应答案
                "1"=>array("type"=>"text","text"=>"It's a pen.", "isCorrect"=>true), //对应答案
            ),
            "items_1"=>array(
                "1"=>array( "type"=>"text",
                    "text"=>"it's",
                    "isCorrect"=>true,
                ),
            ),
            "items_2"=>array(
                "1"=>array( "type"=>"text",
                    "text"=>"a pen",
                    "isCorrect"=>true,
                ),
                "2"=>array( "type"=>"text",
                    "text"=>"a book",
                    "isCorrect"=>false,

                ),
                "3"=>array( "type"=>"text",
                    "text"=>"an eraser",
                    "isCorrect"=>false,

                ),
            ),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"sr",
                )
            ),
            "clickEvents"=>array(
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "timeRange"          => "00:05-00:07",
                    "media_filename"     =>"media/WG_u1_grammar_p1.mp3",
                    "media_type"         => 'audio',
                    "text"              =>"It's a pen.",
                ),
                "No"=>array(
                    "timeRange"          => "00:05-00:07",
                    "media_filename"     =>"media/WG_u1_grammar_p1.mp3",
                    "media_type"         => 'audio',
                    "text"              =>"It's a pen.",
                ),
            ),
            "picture"   => "images/pen.png",
        );

        $data['events'][] = array(
            "num"                => "3",
            'type'               => "look_and_speak_answer",
            "timeRange"          => "00:00-00:03",
            "text"               => "What's this?",
            "media_filename"     => 'media/WG_u1_grammar_p1.mp3',
            "scores"=>5,
            "answers"=>array(
                "0"=>array("type"=>"text","text"=>"It is a book","isCorrect"=>true), //对应答案
                "1"=>array("type"=>"text","text"=>"It's a book", "isCorrect"=>true), //对应答案
            ),
            "items_1"=>array(
                "1"=>array( "type"=>"text",
                    "text"=>"it's",
                    "isCorrect"=>true,
                ),
            ),
            "items_2"=>array(
                "1"=>array( "type"=>"text",
                    "text"=>"a pen",
                    "isCorrect"=>false,
                ),
                "2"=>array( "type"=>"text",
                    "text"=>"a book",
                    "isCorrect"=>true,

                ),
                "3"=>array( "type"=>"text",
                    "text"=>"an eraser",
                    "isCorrect"=>false,

                ),
            ),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"sr",
                )
            ),
            "clickEvents"=>array(
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "timeRange"          => "00:13-00:15",
                    "media_filename"     =>"media/WG_u1_grammar_p1.mp3",
                    "media_type"         => 'audio',
                    "text"              =>"It's a book.",
                ),
                "No"=>array(
                    "timeRange"          => "00:13-00:15",
                    "media_filename"     =>"media/WG_u1_grammar_p1.mp3",
                    "media_type"         => 'audio',
                    "text"              =>"It's a book.",
                ),
            ),
            "picture"   => "images/book.png",
        );


        $data['events'][] = array(
            "num"                => "3",
            'type'               => "look_and_speak_answer",
            "timeRange"          => "00:00-00:03",
            "text"               => "What's this?",
            "media_filename"     => 'media/WG_u1_grammar_p1.mp3',
            "scores"=>5,
            "answers"=>array(
                "0"=>array("type"=>"text","text"=>"It is an eraser","isCorrect"=>true), //对应答案
                "1"=>array("type"=>"text","text"=>"It's an eraser", "isCorrect"=>true), //对应答案
            ),
            "items_1"=>array(
                "1"=>array( "type"=>"text",
                    "text"=>"it's",
                    "isCorrect"=>true,
                ),
            ),
            "items_2"=>array(
                "1"=>array( "type"=>"text",
                    "text"=>"a pen",
                    "isCorrect"=>false,
                ),
                "2"=>array( "type"=>"text",
                    "text"=>"a book",
                    "isCorrect"=>false,

                ),
                "3"=>array( "type"=>"text",
                    "text"=>"an eraser",
                    "isCorrect"=>true,

                ),
            ),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"sr",
                )
            ),
            "clickEvents"=>array(
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "timeRange"          => "00:09-00:11",
                    "media_filename"     =>"media/WG_u1_grammar_p1.mp3",
                    "media_type"         => 'audio',
                    "text"              =>"It's an eraser.",
                ),
                "No"=>array(
                    "timeRange"          => "00:09-00:11",
                    "media_filename"     =>"media/WG_u1_grammar_p1.mp3",
                    "media_type"         => 'audio',
                    "text"              =>"It's an eraser.",
                ),
            ),
            "picture"   => "images/eraser.png",
        );


        $data['events'][] = array(
            "num"                => "4",
            'type'               => "look_and_speak_answer",
            "timeRange"          => "00:00-00:03",
            "text"               => "What's this?",
            "media_filename"     => 'media/WG_u1_grammar_p1.mp3',
            "scores"=>5,
            "answers"=>array(
                "0"=>array("type"=>"text","text"=>"It is a pencil","isCorrect"=>true), //对应答案
                "1"=>array("type"=>"text","text"=>"It's a pencil", "isCorrect"=>true), //对应答案
            ),
            "items_1"=>array(
                "1"=>array( "type"=>"text",
                    "text"=>"it's",
                    "isCorrect"=>true,
                ),
            ),
            "items_2"=>array(
                "1"=>array( "type"=>"text",
                    "text"=>"a pencil",
                    "isCorrect"=>true,
                ),
                "2"=>array( "type"=>"text",
                    "text"=>"a crayon",
                    "isCorrect"=>false,

                ),
                "3"=>array( "type"=>"text",
                    "text"=>"a pencil case",
                    "isCorrect"=>false,

                ),
            ),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"sr",
                )
            ),
            "clickEvents"=>array(
            ),
            "selectEvents"=>array(
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
            "picture"   => "images/pencil.png",
        );


        $data['events'][] = array(
            "num"                => "5",
            'type'               => "look_and_speak_answer",
            "timeRange"          => "00:00-00:03",
            "text"               => "What's this?",
            "media_filename"     => 'media/WG_u1_grammar_p1.mp3',
            "scores"=>5,
            "answers"=>array(
                "0"=>array("type"=>"text","text"=>"It is a crayon","isCorrect"=>true), //对应答案
                "1"=>array("type"=>"text","text"=>"It's a crayon", "isCorrect"=>true), //对应答案
            ),
            "items_1"=>array(
                "1"=>array( "type"=>"text",
                    "text"=>"it's",
                    "isCorrect"=>true,
                ),
            ),
            "items_2"=>array(
                "1"=>array( "type"=>"text",
                    "text"=>"a pencil",
                    "isCorrect"=>false,
                ),
                "2"=>array( "type"=>"text",
                    "text"=>"a crayon",
                    "isCorrect"=>true,

                ),
                "3"=>array( "type"=>"text",
                    "text"=>"a pencil case",
                    "isCorrect"=>false,

                ),
            ),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"sr",
                )
            ),
            "clickEvents"=>array(
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "timeRange"          => "00:15-00:17",
                    "media_filename"     =>"media/WG_u1_grammar_p1.mp3",
                    "media_type"         => 'audio',
                    "text"              =>"It's a crayon.",
                ),
                "No"=>array(
                    "timeRange"          => "00:15-00:17",
                    "media_filename"     =>"media/WG_u1_grammar_p1.mp3",
                    "media_type"         => 'audio',
                    "text"              =>"It's a crayon.",
                ),
            ),
            "picture"   => "images/crayon.png",
        );


        $data['events'][] = array(
            "num"                => "6",
            'type'               => "look_and_speak_answer",
            "timeRange"          => "00:00-00:03",
            "text"               => "What's this?",
            "media_filename"     => 'media/WG_u1_grammar_p1.mp3',
            "scores"=>5,
            "answers"=>array(
                "0"=>array("type"=>"text","text"=>"It is a pencil case","isCorrect"=>true), //对应答案
                "1"=>array("type"=>"text","text"=>"It's a pencil case", "isCorrect"=>true), //对应答案
            ),
            "items_1"=>array(
                "1"=>array( "type"=>"text",
                    "text"=>"it's",
                    "isCorrect"=>true,
                ),
            ),
            "items_2"=>array(
                "1"=>array( "type"=>"text",
                    "text"=>"a pencil",
                    "isCorrect"=>false,
                ),
                "2"=>array( "type"=>"text",
                    "text"=>"a crayon",
                    "isCorrect"=>false,

                ),
                "3"=>array( "type"=>"text",
                    "text"=>"a pencil case",
                    "isCorrect"=>true,

                ),
            ),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"sr",
                )
            ),
            "clickEvents"=>array(
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "timeRange"          => "00:17-00:20",
                    "media_filename"     =>"media/WG_u1_grammar_p1.mp3",
                    "media_type"         => 'audio',
                    "text"              =>"It's a pencil case.",
                ),
                "No"=>array(
                    "timeRange"          => "00:17-00:20",
                    "media_filename"     =>"media/WG_u1_grammar_p1.mp3",
                    "media_type"         => 'audio',
                    "text"              =>"It's a pencil case.",
                ),
            ),
            "picture"   => "images/pencil_case.png",
        );


        $data['events'][] = array(
            "num"                => "7",
            'type'               => "look_and_speak_answer",
            "timeRange"          => "00:00-00:03",
            "text"               => "What's this?",
            "media_filename"     => 'media/WG_u1_grammar_p1.mp3',
            "scores"=>5,
            "answers"=>array(
                "0"=>array("type"=>"text","text"=>"It is a bag","isCorrect"=>true), //对应答案
                "1"=>array("type"=>"text","text"=>"It's a bag", "isCorrect"=>true), //对应答案
            ),
            "items_1"=>array(
                "1"=>array( "type"=>"text",
                    "text"=>"it's",
                    "isCorrect"=>true,
                ),
            ),
            "items_2"=>array(
                "1"=>array( "type"=>"text",
                    "text"=>"a pencil case",
                    "isCorrect"=>false,
                ),
                "2"=>array( "type"=>"text",
                    "text"=>"a bag",
                    "isCorrect"=>true,

                ),
                "3"=>array( "type"=>"text",
                    "text"=>"a ruler",
                    "isCorrect"=>false,

                ),
            ),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"sr",
                )
            ),
            "clickEvents"=>array(
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "timeRange"          => "00:11-00:13",
                    "media_filename"     =>"media/WG_u1_grammar_p1.mp3",
                    "media_type"         => 'audio',
                    "text"              =>"It's a bag.",
                ),
                "No"=>array(
                    "timeRange"          => "00:11-00:13",
                    "media_filename"     =>"media/WG_u1_grammar_p1.mp3",
                    "media_type"         => 'audio',
                    "text"              =>"It's a bag.",
                ),
            ),
            "picture"   => "images/bag.png",
        );



        $data['events'][] = array(
            "num"                => "8",
            'type'               => "look_and_speak_answer",
            "timeRange"          => "00:00-00:03",
            "text"               => "What's this?",
            "media_filename"     => 'media/WG_u1_grammar_p1.mp3',
            "scores"=>5,
            "answers"=>array(
                "0"=>array("type"=>"text","text"=>"It is a ruler","isCorrect"=>true), //对应答案
                "1"=>array("type"=>"text","text"=>"It's a ruler", "isCorrect"=>true), //对应答案
            ),
            "items_1"=>array(
                "1"=>array( "type"=>"text",
                    "text"=>"it's",
                    "isCorrect"=>true,
                ),
            ),
            "items_2"=>array(
                "1"=>array( "type"=>"text",
                    "text"=>"a pencil case",
                    "isCorrect"=>false,
                ),
                "2"=>array( "type"=>"text",
                    "text"=>"a bag",
                    "isCorrect"=>false,

                ),
                "3"=>array( "type"=>"text",
                    "text"=>"a ruler",
                    "isCorrect"=>true,

                ),
            ),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"sr",
                )
            ),
            "clickEvents"=>array(
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "timeRange"          => "00:03-00:05",
                    "media_filename"     =>"media/WG_u1_grammar_p1.mp3",
                    "media_type"         => 'audio',
                    "text"              =>"It's a bag.",
                ),
                "No"=>array(
                    "timeRange"          => "00:03-00:05",
                    "media_filename"     =>"media/WG_u1_grammar_p1.mp3",
                    "media_type"         => 'audio',
                    "text"              =>"It's a bag.",
                ),
            ),
            "picture"   => "images/ruler.png",
        );



        $data['events'][] = array(
            "num"                => "9",
            'type'               => "look_and_speak_answer",
            "timeRange"          => "00:00-00:03",
            "text"               => "What's this?",
            "media_filename"     => 'media/WG_u1_grammar_p1.mp3',
            "scores"=>5,
            "answers"=>array(
                "0"=>array("type"=>"text","text"=>"It is a pen","isCorrect"=>true), //对应答案
                "1"=>array("type"=>"text","text"=>"It's a pen", "isCorrect"=>true), //对应答案
            ),
            "items_1"=>array(
                "1"=>array( "type"=>"text",
                    "text"=>"it's",
                    "isCorrect"=>true,
                ),
            ),
            "items_2"=>array(
                "1"=>array( "type"=>"text",
                    "text"=>"a pen",
                    "isCorrect"=>true,
                ),
                "2"=>array( "type"=>"text",
                    "text"=>"a bag",
                    "isCorrect"=>false,

                ),
                "3"=>array( "type"=>"text",
                    "text"=>"a ruler",
                    "isCorrect"=>false,

                ),
            ),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"sr",
                )
            ),
            "clickEvents"=>array(
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "timeRange"          => "00:05-00:07",
                    "media_filename"     =>"media/WG_u1_grammar_p1.mp3",
                    "media_type"         => 'audio',
                    "text"              =>"It's a pen.",
                ),
                "No"=>array(
                    "timeRange"          => "00:05-00:07",
                    "media_filename"     =>"media/WG_u1_grammar_p1.mp3",
                    "media_type"         => 'audio',
                    "text"              =>"It's a pen.",
                ),
            ),
            "picture"   => "images/pen.png",
        );


        $data['events'][] = array(
            "num"                => "10",
            'type'               => "look_and_speak_answer",
            "timeRange"          => "00:00-00:03",
            "text"               => "What's this?",
            "media_filename"     => 'media/WG_u1_grammar_p1.mp3',
            "scores"=>5,
            "answers"=>array(
                "0"=>array("type"=>"text","text"=>"It is a book","isCorrect"=>true), //对应答案
                "1"=>array("type"=>"text","text"=>"It's a book", "isCorrect"=>true), //对应答案
            ),
            "items_1"=>array(
                "1"=>array( "type"=>"text",
                    "text"=>"it's",
                    "isCorrect"=>true,
                ),
            ),
            "items_2"=>array(
                "1"=>array( "type"=>"text",
                    "text"=>"a book",
                    "isCorrect"=>true,
                ),
                "2"=>array( "type"=>"text",
                    "text"=>"a crayon",
                    "isCorrect"=>false,

                ),
                "3"=>array( "type"=>"text",
                    "text"=>"a pencil case",
                    "isCorrect"=>false,

                ),
            ),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"sr",
                )
            ),
            "clickEvents"=>array(
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "timeRange"          => "00:13-00:15",
                    "media_filename"     =>"media/WG_u1_grammar_p1.mp3",
                    "media_type"         => 'audio',
                    "text"              =>"It's a book.",
                ),
                "No"=>array(
                    "timeRange"          => "00:13-00:15",
                    "media_filename"     =>"media/WG_u1_grammar_p1.mp3",
                    "media_type"         => 'audio',
                    "text"              =>"It's a book.",
                ),
            ),
            "picture"   => "images/book.png",
        );




        $data['events'][] = array(
            "num"                => "11",
            'type'               => "look_and_speak_answer",
            "timeRange"          => "00:00-00:03",
            "text"               => "What's this?",
            "media_filename"     => 'media/WG_u1_grammar_p1.mp3',
            "scores"=>5,
            "answers"=>array(
                "0"=>array("type"=>"text","text"=>"It is an eraser","isCorrect"=>true), //对应答案
                "1"=>array("type"=>"text","text"=>"It's an eraser", "isCorrect"=>true), //对应答案
            ),
            "items_1"=>array(
                "1"=>array( "type"=>"text",
                    "text"=>"it's",
                    "isCorrect"=>true,
                ),
            ),
            "items_2"=>array(
                "1"=>array( "type"=>"text",
                    "text"=>"an eraser",
                    "isCorrect"=>true,
                ),
                "2"=>array( "type"=>"text",
                    "text"=>"a pencil",
                    "isCorrect"=>false,

                ),
                "3"=>array( "type"=>"text",
                    "text"=>"a crayon",
                    "isCorrect"=>false,

                ),
            ),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"sr",
                )
            ),
            "clickEvents"=>array(
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "timeRange"          => "00:09-00:11",
                    "media_filename"     =>"media/WG_u1_grammar_p1.mp3",
                    "media_type"         => 'audio',
                    "text"              =>"It's an eraser.",
                ),
                "No"=>array(
                    "timeRange"          => "00:09-00:11",
                    "media_filename"     =>"media/WG_u1_grammar_p1.mp3",
                    "media_type"         => 'audio',
                    "text"              =>"It's an eraser.",
                ),
            ),
            "picture"   => "images/eraser.png",
        );


        $data['events'][] = array(
            "num"                => "12",
            'type'               => "look_and_speak_answer",
            "timeRange"          => "00:00-00:03",
            "text"               => "What's this?",
            "media_filename"     => 'media/WG_u1_grammar_p1.mp3',
            "scores"=>5,
            "answers"=>array(
                "0"=>array("type"=>"text","text"=>"It is a pencil","isCorrect"=>true), //对应答案
                "1"=>array("type"=>"text","text"=>"It's a pencil", "isCorrect"=>true), //对应答案
            ),
            "items_1"=>array(
                "1"=>array( "type"=>"text",
                    "text"=>"it's",
                    "isCorrect"=>true,
                ),
            ),
            "items_2"=>array(
                "1"=>array( "type"=>"text",
                    "text"=>"a pencil",
                    "isCorrect"=>true,
                ),
                "2"=>array( "type"=>"text",
                    "text"=>"a book",
                    "isCorrect"=>false,

                ),
                "3"=>array( "type"=>"text",
                    "text"=>"an eraser",
                    "isCorrect"=>false,

                ),
            ),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"sr",
                )
            ),
            "clickEvents"=>array(
            ),
            "selectEvents"=>array(
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
            "picture"   => "images/pencil.png",
        );


        $data['events'][] = array(
            "num"                => "13",
            'type'               => "look_and_speak_answer",
            "timeRange"          => "00:00-00:03",
            "text"               => "What's this?",
            "media_filename"     => 'media/WG_u1_grammar_p1.mp3',
            "scores"=>5,
            "answers"=>array(
                "0"=>array("type"=>"text","text"=>"It is a crayon","isCorrect"=>true), //对应答案
                "1"=>array("type"=>"text","text"=>"It's a crayon", "isCorrect"=>true), //对应答案
            ),
            "items_1"=>array(
                "1"=>array( "type"=>"text",
                    "text"=>"it's",
                    "isCorrect"=>true,
                ),
            ),
            "items_2"=>array(
                "1"=>array( "type"=>"text",
                    "text"=>"a pencil case",
                    "isCorrect"=>false,
                ),
                "2"=>array( "type"=>"text",
                    "text"=>"a crayon",
                    "isCorrect"=>true,

                ),
                "3"=>array( "type"=>"text",
                    "text"=>"a bag",
                    "isCorrect"=>false,

                ),
            ),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"sr",
                )
            ),
            "clickEvents"=>array(
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "timeRange"          => "00:15-00:17",
                    "media_filename"     =>"media/WG_u1_grammar_p1.mp3",
                    "media_type"         => 'audio',
                    "text"              =>"It's a crayon.",
                ),
                "No"=>array(
                    "timeRange"          => "00:15-00:17",
                    "media_filename"     =>"media/WG_u1_grammar_p1.mp3",
                    "media_type"         => 'audio',
                    "text"              =>"It's a crayon.",
                ),
            ),
            "picture"   => "images/crayon.png",
        );


        $data['events'][] = array(
            "num"                => "14",
            'type'               => "look_and_speak_answer",
            "timeRange"          => "00:00-00:03",
            "text"               => "What's this?",
            "media_filename"     => 'media/WG_u1_grammar_p1.mp3',
            "scores"=>5,
            "answers"=>array(
                "0"=>array("type"=>"text","text"=>"It is a pencil case","isCorrect"=>true), //对应答案
                "1"=>array("type"=>"text","text"=>"It's a pencil case", "isCorrect"=>true), //对应答案
            ),
            "items_1"=>array(
                "1"=>array( "type"=>"text",
                    "text"=>"it's",
                    "isCorrect"=>true,
                ),
            ),
            "items_2"=>array(
                "1"=>array( "type"=>"text",
                    "text"=>"a pencil",
                    "isCorrect"=>false,
                ),
                "2"=>array( "type"=>"text",
                    "text"=>"a crayon",
                    "isCorrect"=>false,

                ),
                "3"=>array( "type"=>"text",
                    "text"=>"a pencil case",
                    "isCorrect"=>true,

                ),
            ),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"sr",
                )
            ),
            "clickEvents"=>array(
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "timeRange"          => "00:17-00:20",
                    "media_filename"     =>"media/WG_u1_grammar_p1.mp3",
                    "media_type"         => 'audio',
                    "text"              =>"It's a pencil case.",
                ),
                "No"=>array(
                    "timeRange"          => "00:17-00:20",
                    "media_filename"     =>"media/WG_u1_grammar_p1.mp3",
                    "media_type"         => 'audio',
                    "text"              =>"It's a pencil case.",
                ),
            ),
            "picture"   => "images/pencil_case.png",
        );


        $data['events'][] = array(
            "num"                => "15",
            'type'               => "look_and_speak_answer",
            "timeRange"          => "00:00-00:03",
            "text"               => "What's this?",
            "media_filename"     => 'media/WG_u1_grammar_p1.mp3',
            "scores"=>5,
            "answers"=>array(
                "0"=>array("type"=>"text","text"=>"It is a bag","isCorrect"=>true), //对应答案
                "1"=>array("type"=>"text","text"=>"It's a bag", "isCorrect"=>true), //对应答案
            ),
            "items_1"=>array(
                "1"=>array( "type"=>"text",
                    "text"=>"it's",
                    "isCorrect"=>true,
                ),
            ),
            "items_2"=>array(
                "1"=>array( "type"=>"text",
                    "text"=>"an eraser",
                    "isCorrect"=>false,
                ),
                "2"=>array( "type"=>"text",
                    "text"=>"a bag",
                    "isCorrect"=>true,

                ),
                "3"=>array( "type"=>"text",
                    "text"=>"a pencil",
                    "isCorrect"=>false,

                ),
            ),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"sr",
                )
            ),
            "clickEvents"=>array(
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "timeRange"          => "00:11-00:13",
                    "media_filename"     =>"media/WG_u1_grammar_p1.mp3",
                    "media_type"         => 'audio',
                    "text"              =>"It's a bag.",
                ),
                "No"=>array(
                    "timeRange"          => "00:11-00:13",
                    "media_filename"     =>"media/WG_u1_grammar_p1.mp3",
                    "media_type"         => 'audio',
                    "text"              =>"It's a bag.",
                ),
            ),
            "picture"   => "images/bag.png",
        );



        $data['events'][] = array(
            "num"                => "16",
            'type'               => "look_and_speak_answer",
            "timeRange"          => "00:00-00:03",
            "text"               => "What's this?",
            "media_filename"     => 'media/WG_u1_grammar_p1.mp3',
            "scores"=>5,
            "answers"=>array(
                "0"=>array("type"=>"text","text"=>"It is a ruler","isCorrect"=>true), //对应答案
                "1"=>array("type"=>"text","text"=>"It's a ruler", "isCorrect"=>true), //对应答案
            ),
            "items_1"=>array(
                "1"=>array( "type"=>"text",
                    "text"=>"it's",
                    "isCorrect"=>true,
                ),
            ),
            "items_2"=>array(
                "1"=>array( "type"=>"text",
                    "text"=>"an eraser",
                    "isCorrect"=>false,
                ),
                "2"=>array( "type"=>"text",
                    "text"=>"a book",
                    "isCorrect"=>false,

                ),
                "3"=>array( "type"=>"text",
                    "text"=>"a ruler",
                    "isCorrect"=>true,

                ),
            ),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"sr",
                )
            ),
            "clickEvents"=>array(
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "timeRange"          => "00:03-00:05",
                    "media_filename"     =>"media/WG_u1_grammar_p1.mp3",
                    "media_type"         => 'audio',
                    "text"              =>"It's a bag.",
                ),
                "No"=>array(
                    "timeRange"          => "00:03-00:05",
                    "media_filename"     =>"media/WG_u1_grammar_p1.mp3",
                    "media_type"         => 'audio',
                    "text"              =>"It's a bag.",
                ),
            ),
            "picture"   => "images/ruler.png",
        );


        $data['events'][] = array(
            "num"                => "17",
            'type'               => "look_and_speak_answer",
            "timeRange"          => "00:08-00:11",
            "text"               => "Is this a pen?",
            "media_filename"     => 'media/WG_u1_grammar_p2.mp3',
            "scores"=>5,
            "answers"=>array(
                "0"=>array("type"=>"text","text"=>"Yes, it is","isCorrect"=>true), //对应答案
                "1"=>array("type"=>"text","text"=>"Yes, it is", "isCorrect"=>true), //对应答案
            ),
            "items_1"=>array(
                "1"=>array( "type"=>"text",
                    "text"=>"Yes, it is.",
                    "isCorrect"=>true,
                ),
            ),
            "items_2"=>array(
                "1"=>array( "type"=>"text",
                    "text"=>"No, it isn't.",
                    "isCorrect"=>false,
                ),
            ),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"sr",
                )
            ),
            "clickEvents"=>array(
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "timeRange"          => "00:05-00:07",
                    "media_filename"     =>"media/WG_u1_grammar_p1.mp3",
                    "media_type"         => 'audio',
                    "text"              =>"It's a pen.",
                ),
                "No"=>array(
                    "timeRange"          => "00:05-00:07",
                    "media_filename"     =>"media/WG_u1_grammar_p1.mp3",
                    "media_type"         => 'audio',
                    "text"              =>"It's a pen.",
                ),
            ),
            "picture"   => "images/pen.png",
        );


        $data['events'][] = array(
            "num"                => "18",
            'type'               => "look_and_speak_answer",
            "timeRange"          => "00:11-00:14",
            "text"               => "Is this a book?",
            "media_filename"     => 'media/WG_u1_grammar_p2.mp3',
            "scores"=>5,
            "answers"=>array(
                "0"=>array("type"=>"text","text"=>"Yes, it is","isCorrect"=>true), //对应答案
                "1"=>array("type"=>"text","text"=>"Yes, it is", "isCorrect"=>true), //对应答案
            ),
            "items_1"=>array(
                "1"=>array( "type"=>"text",
                    "text"=>"Yes, it is.",
                    "isCorrect"=>true,
                ),
            ),
            "items_2"=>array(
                "1"=>array( "type"=>"text",
                    "text"=>"No, it isn't.",
                    "isCorrect"=>false,
                ),
            ),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"sr",
                )
            ),
            "clickEvents"=>array(
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "timeRange"          => "00:13-00:15",
                    "media_filename"     =>"media/WG_u1_grammar_p1.mp3",
                    "media_type"         => 'audio',
                    "text"              =>"It's a book.",
                ),
                "No"=>array(
                    "timeRange"          => "00:13-00:15",
                    "media_filename"     =>"media/WG_u1_grammar_p1.mp3",
                    "media_type"         => 'audio',
                    "text"              =>"It's a book.",
                ),
            ),
            "picture"   => "images/book.png",
        );


        $data['events'][] = array(
            "num"                => "19",
            'type'               => "look_and_speak_answer",
            "timeRange"          => "00:14-00:17",
            "text"               => "Is this an eraser?",
            "media_filename"     => 'media/WG_u1_grammar_p2.mp3',
            "scores"=>5,
            "answers"=>array(
                "0"=>array("type"=>"text","text"=>"Yes, it is","isCorrect"=>true), //对应答案
                "1"=>array("type"=>"text","text"=>"Yes, it is", "isCorrect"=>true), //对应答案
            ),
            "items_1"=>array(
                "1"=>array( "type"=>"text",
                    "text"=>"Yes, it is.",
                    "isCorrect"=>true,
                ),
            ),
            "items_2"=>array(
                "1"=>array( "type"=>"text",
                    "text"=>"No, it isn't.",
                    "isCorrect"=>false,
                ),
            ),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"sr",
                )
            ),
            "clickEvents"=>array(
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "timeRange"          => "00:13-00:15",
                    "media_filename"     =>"media/WG_u1_grammar_p1.mp3",
                    "media_type"         => 'audio',
                    "text"              =>"It's an eraser.",
                ),
                "No"=>array(
                    "timeRange"          => "00:13-00:15",
                    "media_filename"     =>"media/WG_u1_grammar_p1.mp3",
                    "media_type"         => 'audio',
                    "text"              =>"It's an eraser.",
                ),
            ),
            "picture"   => "images/eraser.png",
        );


        $data['events'][] = array(
            "num"                => "20",
            'type'               => "look_and_speak_answer",
            "timeRange"          => "00:17-00:20",
            "text"               => "Is this a pencil?",
            "media_filename"     => 'media/WG_u1_grammar_p2.mp3',
            "scores"=>5,
            "answers"=>array(
                "0"=>array("type"=>"text","text"=>"Yes, it is","isCorrect"=>true), //对应答案
                "1"=>array("type"=>"text","text"=>"Yes, it is", "isCorrect"=>true), //对应答案
            ),
            "items_1"=>array(
                "1"=>array( "type"=>"text",
                    "text"=>"Yes, it is.",
                    "isCorrect"=>true,
                ),
            ),
            "items_2"=>array(
                "1"=>array( "type"=>"text",
                    "text"=>"No, it isn't.",
                    "isCorrect"=>false,
                ),
            ),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"sr",
                )
            ),
            "clickEvents"=>array(
            ),
            "selectEvents"=>array(
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
            "picture"   => "images/pencil.png",
        );


        $data['events'][] = array(
            "num"                => "21",
            'type'               => "look_and_speak_answer",
            "timeRange"          => "00:20-00:23",
            "text"               => "Is this a crayon?",
            "media_filename"     => 'media/WG_u1_grammar_p2.mp3',
            "scores"=>5,
            "answers"=>array(
                "0"=>array("type"=>"text","text"=>"Yes, it is","isCorrect"=>true), //对应答案
                "1"=>array("type"=>"text","text"=>"Yes, it is", "isCorrect"=>true), //对应答案
            ),
            "items_1"=>array(
                "1"=>array( "type"=>"text",
                    "text"=>"Yes, it is.",
                    "isCorrect"=>true,
                ),
            ),
            "items_2"=>array(
                "1"=>array( "type"=>"text",
                    "text"=>"No, it isn't.",
                    "isCorrect"=>false,
                ),
            ),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"sr",
                )
            ),
            "clickEvents"=>array(
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "timeRange"          => "00:15-00:17",
                    "media_filename"     =>"media/WG_u1_grammar_p1.mp3",
                    "media_type"         => 'audio',
                    "text"              =>"It's a crayon.",
                ),
                "No"=>array(
                    "timeRange"          => "00:15-00:17",
                    "media_filename"     =>"media/WG_u1_grammar_p1.mp3",
                    "media_type"         => 'audio',
                    "text"              =>"It's a crayon.",
                ),
            ),
            "picture"   => "images/crayon.png",
        );


        $data['events'][] = array(
            "num"                => "22",
            'type'               => "look_and_speak_answer",
            "timeRange"          => "00:23-00:26",
            "text"               => "Is this a pencil case?",
            "media_filename"     => 'media/WG_u1_grammar_p2.mp3',
            "scores"=>5,
            "answers"=>array(
                "0"=>array("type"=>"text","text"=>"Yes, it is","isCorrect"=>true), //对应答案
                "1"=>array("type"=>"text","text"=>"Yes, it is", "isCorrect"=>true), //对应答案
            ),
            "items_1"=>array(
                "1"=>array( "type"=>"text",
                    "text"=>"Yes, it is.",
                    "isCorrect"=>true,
                ),
            ),
            "items_2"=>array(
                "1"=>array( "type"=>"text",
                    "text"=>"No, it isn't.",
                    "isCorrect"=>false,
                ),
            ),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"sr",
                )
            ),
            "clickEvents"=>array(
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "timeRange"          => "00:17-00:20",
                    "media_filename"     =>"media/WG_u1_grammar_p1.mp3",
                    "media_type"         => 'audio',
                    "text"              =>"It's a pencil case.",
                ),
                "No"=>array(
                    "timeRange"          => "00:17-00:20",
                    "media_filename"     =>"media/WG_u1_grammar_p1.mp3",
                    "media_type"         => 'audio',
                    "text"              =>"It's a pencil case.",
                ),
            ),
            "picture"   => "images/pencil_case.png",
        );


        $data['events'][] = array(
            "num"                => "23",
            'type'               => "look_and_speak_answer",
            "timeRange"          => "00:26-00:29",
            "text"               => "Is this a bag?",
            "media_filename"     => 'media/WG_u1_grammar_p2.mp3',
            "scores"=>5,
            "answers"=>array(
                "0"=>array("type"=>"text","text"=>"Yes, it is","isCorrect"=>true), //对应答案
                "1"=>array("type"=>"text","text"=>"Yes, it is", "isCorrect"=>true), //对应答案
            ),
            "items_1"=>array(
                "1"=>array( "type"=>"text",
                    "text"=>"Yes, it is.",
                    "isCorrect"=>true,
                ),
            ),
            "items_2"=>array(
                "1"=>array( "type"=>"text",
                    "text"=>"No, it isn't.",
                    "isCorrect"=>false,
                ),
            ),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"sr",
                )
            ),
            "clickEvents"=>array(
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "timeRange"          => "00:11-00:13",
                    "media_filename"     =>"media/WG_u1_grammar_p1.mp3",
                    "media_type"         => 'audio',
                    "text"              =>"It's a bag.",
                ),
                "No"=>array(
                    "timeRange"          => "00:11-00:13",
                    "media_filename"     =>"media/WG_u1_grammar_p1.mp3",
                    "media_type"         => 'audio',
                    "text"              =>"It's a bag.",
                ),
            ),
            "picture"   => "images/bag.png",
        );


        $data['events'][] = array(
            "num"                => "24",
            'type'               => "look_and_speak_answer",
            "timeRange"          => "00:29-00:32",
            "text"               => "Is this a ruler?",
            "media_filename"     => 'media/WG_u1_grammar_p2.mp3',
            "scores"=>5,
            "answers"=>array(
                "0"=>array("type"=>"text","text"=>"Yes, it is","isCorrect"=>true), //对应答案
                "1"=>array("type"=>"text","text"=>"Yes, it is", "isCorrect"=>true), //对应答案
            ),
            "items_1"=>array(
                "1"=>array( "type"=>"text",
                    "text"=>"Yes, it is.",
                    "isCorrect"=>true,
                ),
            ),
            "items_2"=>array(
                "1"=>array( "type"=>"text",
                    "text"=>"No, it isn't.",
                    "isCorrect"=>false,
                ),
            ),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"sr",
                )
            ),
            "clickEvents"=>array(
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "timeRange"          => "00:03-00:05",
                    "media_filename"     =>"media/WG_u1_grammar_p1.mp3",
                    "media_type"         => 'audio',
                    "text"              =>"It's a ruler.",
                ),
                "No"=>array(
                    "timeRange"          => "00:03-00:05",
                    "media_filename"     =>"media/WG_u1_grammar_p1.mp3",
                    "media_type"         => 'audio',
                    "text"              =>"It's a ruler.",
                ),
            ),
            "picture"   => "images/ruler.png",
        );













        $data['events'][] = array(
            "num"                => "25",
            'type'               => "look_and_speak_answer",
            "timeRange"          => "00:29-00:32",
            "text"               => "Is this a ruler?",
            "media_filename"     => 'media/WG_u1_grammar_p2.mp3',
            "scores"=>5,
            "answers"=>array(
                "0"=>array("type"=>"text","text"=>"No, it isn't","isCorrect"=>true), //对应答案
                "1"=>array("type"=>"text","text"=>"No, it isn't", "isCorrect"=>true), //对应答案
            ),
            "items_1"=>array(
                "1"=>array( "type"=>"text",
                    "text"=>"Yes, it is.",
                    "isCorrect"=>false,
                ),
            ),
            "items_2"=>array(
                "1"=>array( "type"=>"text",
                    "text"=>"No, it isn't.",
                    "isCorrect"=>true,
                ),
            ),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"sr",
                )
            ),
            "clickEvents"=>array(
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "timeRange"          => "00:05-00:07",
                    "media_filename"     =>"media/WG_u1_grammar_p1.mp3",
                    "media_type"         => 'audio',
                    "text"              =>"It's a pen.",
                ),
                "No"=>array(
                    "timeRange"          => "00:05-00:07",
                    "media_filename"     =>"media/WG_u1_grammar_p1.mp3",
                    "media_type"         => 'audio',
                    "text"              =>"It's a pen.",
                ),
            ),
            "picture"   => "images/pen.png",
        );


        $data['events'][] = array(
            "num"                => "26",
            'type'               => "look_and_speak_answer",
            "timeRange"          => "00:17-00:20",
            "text"               => "Is this a pencil?",
            "media_filename"     => 'media/WG_u1_grammar_p2.mp3',
            "scores"=>5,
            "answers"=>array(
                "0"=>array("type"=>"text","text"=>"No, it isn't","isCorrect"=>true), //对应答案
                "1"=>array("type"=>"text","text"=>"No, it isn't", "isCorrect"=>true), //对应答案
            ),
            "items_1"=>array(
                "1"=>array( "type"=>"text",
                    "text"=>"Yes, it is.",
                    "isCorrect"=>false,
                ),
            ),
            "items_2"=>array(
                "1"=>array( "type"=>"text",
                    "text"=>"No, it isn't.",
                    "isCorrect"=>true,
                ),
            ),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"sr",
                )
            ),
            "clickEvents"=>array(
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "timeRange"          => "00:13-00:15",
                    "media_filename"     =>"media/WG_u1_grammar_p1.mp3",
                    "media_type"         => 'audio',
                    "text"              =>"It's a book.",
                ),
                "No"=>array(
                    "timeRange"          => "00:13-00:15",
                    "media_filename"     =>"media/WG_u1_grammar_p1.mp3",
                    "media_type"         => 'audio',
                    "text"              =>"It's a book.",
                ),
            ),
            "picture"   => "images/book.png",
        );


        $data['events'][] = array(
            "num"                => "27",
            'type'               => "look_and_speak_answer",
            "timeRange"          => "00:08-00:11",
            "text"               => "Is this a pen?",
            "media_filename"     => 'media/WG_u1_grammar_p2.mp3',
            "scores"=>5,
            "answers"=>array(
                "0"=>array("type"=>"text","text"=>"No, it isn't","isCorrect"=>true), //对应答案
                "1"=>array("type"=>"text","text"=>"No, it isn't", "isCorrect"=>true), //对应答案
            ),
            "items_1"=>array(
                "1"=>array( "type"=>"text",
                    "text"=>"Yes, it is.",
                    "isCorrect"=>false,
                ),
            ),
            "items_2"=>array(
                "1"=>array( "type"=>"text",
                    "text"=>"No, it isn't.",
                    "isCorrect"=>true,
                ),
            ),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"sr",
                )
            ),
            "clickEvents"=>array(
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "timeRange"          => "00:13-00:15",
                    "media_filename"     =>"media/WG_u1_grammar_p1.mp3",
                    "media_type"         => 'audio',
                    "text"              =>"It's an eraser.",
                ),
                "No"=>array(
                    "timeRange"          => "00:13-00:15",
                    "media_filename"     =>"media/WG_u1_grammar_p1.mp3",
                    "media_type"         => 'audio',
                    "text"              =>"It's an eraser.",
                ),
            ),
            "picture"   => "images/eraser.png",
        );


        $data['events'][] = array(
            "num"                => "28",
            'type'               => "look_and_speak_answer",
            "timeRange"          => "00:20-00:23",
            "text"               => "Is this a crayon?",
            "media_filename"     => 'media/WG_u1_grammar_p2.mp3',
            "scores"=>5,
            "answers"=>array(
                "0"=>array("type"=>"text","text"=>"No, it isn't","isCorrect"=>true), //对应答案
                "1"=>array("type"=>"text","text"=>"No, it isn't", "isCorrect"=>true), //对应答案
            ),
            "items_1"=>array(
                "1"=>array( "type"=>"text",
                    "text"=>"Yes, it is.",
                    "isCorrect"=>false,
                ),
            ),
            "items_2"=>array(
                "1"=>array( "type"=>"text",
                    "text"=>"No, it isn't.",
                    "isCorrect"=>true,
                ),
            ),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"sr",
                )
            ),
            "clickEvents"=>array(
            ),
            "selectEvents"=>array(
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
            "picture"   => "images/pencil.png",
        );


        $data['events'][] = array(
            "num"                => "29",
            'type'               => "look_and_speak_answer",
            "timeRange"          => "00:14-00:17",
            "text"               => "Is this an eraser?",
            "media_filename"     => 'media/WG_u1_grammar_p2.mp3',
            "scores"=>5,
            "answers"=>array(
                "0"=>array("type"=>"text","text"=>"No, it isn't","isCorrect"=>true), //对应答案
                "1"=>array("type"=>"text","text"=>"No, it isn't", "isCorrect"=>true), //对应答案
            ),
            "items_1"=>array(
                "1"=>array( "type"=>"text",
                    "text"=>"Yes, it is.",
                    "isCorrect"=>false,
                ),
            ),
            "items_2"=>array(
                "1"=>array( "type"=>"text",
                    "text"=>"No, it isn't.",
                    "isCorrect"=>true,
                ),
            ),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"sr",
                )
            ),
            "clickEvents"=>array(
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "timeRange"          => "00:15-00:17",
                    "media_filename"     =>"media/WG_u1_grammar_p1.mp3",
                    "media_type"         => 'audio',
                    "text"              =>"It's a crayon.",
                ),
                "No"=>array(
                    "timeRange"          => "00:15-00:17",
                    "media_filename"     =>"media/WG_u1_grammar_p1.mp3",
                    "media_type"         => 'audio',
                    "text"              =>"It's a crayon.",
                ),
            ),
            "picture"   => "images/crayon.png",
        );


        $data['events'][] = array(
            "num"                => "30",
            'type'               => "look_and_speak_answer",
            "timeRange"          => "00:26-00:29",
            "text"               => "Is this a bag?",
            "media_filename"     => 'media/WG_u1_grammar_p2.mp3',
            "scores"=>5,
            "answers"=>array(
                "0"=>array("type"=>"text","text"=>"No, it isn't","isCorrect"=>true), //对应答案
                "1"=>array("type"=>"text","text"=>"No, it isn't", "isCorrect"=>true), //对应答案
            ),
            "items_1"=>array(
                "1"=>array( "type"=>"text",
                    "text"=>"Yes, it is.",
                    "isCorrect"=>false,
                ),
            ),
            "items_2"=>array(
                "1"=>array( "type"=>"text",
                    "text"=>"No, it isn't.",
                    "isCorrect"=>true,
                ),
            ),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"sr",
                )
            ),
            "clickEvents"=>array(
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "timeRange"          => "00:17-00:20",
                    "media_filename"     =>"media/WG_u1_grammar_p1.mp3",
                    "media_type"         => 'audio',
                    "text"              =>"It's a pencil case.",
                ),
                "No"=>array(
                    "timeRange"          => "00:17-00:20",
                    "media_filename"     =>"media/WG_u1_grammar_p1.mp3",
                    "media_type"         => 'audio',
                    "text"              =>"It's a pencil case.",
                ),
            ),
            "picture"   => "images/pencil_case.png",
        );


        $data['events'][] = array(
            "num"                => "31",
            'type'               => "look_and_speak_answer",
            "timeRange"          => "00:11-00:14",
            "text"               => "Is this a book?",
            "media_filename"     => 'media/WG_u1_grammar_p2.mp3',
            "scores"=>5,
            "answers"=>array(
                "0"=>array("type"=>"text","text"=>"No, it isn't","isCorrect"=>true), //对应答案
                "1"=>array("type"=>"text","text"=>"No, it isn't", "isCorrect"=>true), //对应答案
            ),
            "items_1"=>array(
                "1"=>array( "type"=>"text",
                    "text"=>"Yes, it is.",
                    "isCorrect"=>false,
                ),
            ),
            "items_2"=>array(
                "1"=>array( "type"=>"text",
                    "text"=>"No, it isn't.",
                    "isCorrect"=>true,
                ),
            ),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"sr",
                )
            ),
            "clickEvents"=>array(
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "timeRange"          => "00:11-00:13",
                    "media_filename"     =>"media/WG_u1_grammar_p1.mp3",
                    "media_type"         => 'audio',
                    "text"              =>"It's a bag.",
                ),
                "No"=>array(
                    "timeRange"          => "00:11-00:13",
                    "media_filename"     =>"media/WG_u1_grammar_p1.mp3",
                    "media_type"         => 'audio',
                    "text"              =>"It's a bag.",
                ),
            ),
            "picture"   => "images/bag.png",
        );


        $data['events'][] = array(
            "num"                => "32",
            'type'               => "look_and_speak_answer",
            "timeRange"          => "00:23-00:26",
            "text"               => "Is this a pencil case?",
            "media_filename"     => 'media/WG_u1_grammar_p2.mp3',
            "scores"=>5,
            "answers"=>array(
                "0"=>array("type"=>"text","text"=>"No, it isn't","isCorrect"=>true), //对应答案
                "1"=>array("type"=>"text","text"=>"No, it isn't", "isCorrect"=>true), //对应答案
            ),
            "items_1"=>array(
                "1"=>array( "type"=>"text",
                    "text"=>"Yes, it is.",
                    "isCorrect"=>false,
                ),
            ),
            "items_2"=>array(
                "1"=>array( "type"=>"text",
                    "text"=>"No, it isn't.",
                    "isCorrect"=>true,
                ),
            ),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"sr",
                )
            ),
            "clickEvents"=>array(
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "timeRange"          => "00:03-00:05",
                    "media_filename"     =>"media/WG_u1_grammar_p1.mp3",
                    "media_type"         => 'audio',
                    "text"              =>"It's a ruler.",
                ),
                "No"=>array(
                    "timeRange"          => "00:03-00:05",
                    "media_filename"     =>"media/WG_u1_grammar_p1.mp3",
                    "media_type"         => 'audio',
                    "text"              =>"It's a ruler.",
                ),
            ),
            "picture"   => "images/ruler.png",
        );


        $a = json_encode($data);
        $fp = fopen('json197.txt', "w");
        fwrite($fp, $a);
        fclose($fp);
        return;
    }



    //multipleChoice
    //自动播放和识别
    public function getPart198()
    {
        $data = array(
            "level_id"   =>1,
            "unit_id"    =>9,
            "lesson_id"  =>76,
            "part_id"    =>198,
            "play_type"  =>"auto"
        );
        $data['systems'][] = array(
            "num"             => "1",
            'type'            => "choose_correct_answer",
            "timeRange"       => "00:49:729-00:51:497",
            "text"            => "Let's check.",
            "media_filename"  => 'media/WG_system.mp3',
            "clickEvents"     =>array(
            ),
            "childEvents"     =>array(
            ),
            "selectEvents"=>array(
            ),
            "media_type" => 'audio',
            "picture" => "",
            "pictures" => array()
        );

        $data['events'][] = array(
            "num"=>"2",
            "content_id"=>1632,
            "type"=>"choose_correct_answer",
            "media_type"=>"image",
            "timeRange"=> "",
            "media_filename"=>'images/pen.png',
            "text"=>array(),
            "scores"=>7,
            "items"=>array(
                "0"=>array("item"=>"It's a pen.","isCorrect"=>true),
                "1"=>array("item"=>"It's a book.", "isCorrect"=>false),
                "2"=>array("item"=>"It's an eraser.", "isCorrect"=>false),
            ),
            "clickEvents"=>array(
                "click_1"=>array(
                    "type"=>"score",
                    "score"=>10,
                ),
                "click_2"=>array(
                    "type"=>"score",
                    "score"=>5,
                ),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "timeRange"          => "00:05-00:07",
                    "media_filename"           =>"media/WG_u1_grammar_p1.mp3",
                    "media_type"         => 'audio',
                    "text"=>"It's a pen.",
                ),
                "No"=>array(
                    "timeRange"          => "00:05-00:07",
                    "media_filename"           =>"media/WG_u1_grammar_p1.mp3",
                    "media_type"         => 'audio',
                    "text"=>"It's a pen.",
                ),
            ),
            "picture"   => "images/pen.png",
        );

        $data['events'][] = array(
            "num"=>"3",
            "content_id"=>1633,
            "type"=>"choose_correct_answer",
            "media_type"=>"image",
            "timeRange"=> "",
            "media_filename"=>'images/book.png',
            "text"=>array(),
            "scores"=>7,
            "items"=>array(
                "0"=>array("item"=>"It's a pen.","isCorrect"=>false),
                "1"=>array("item"=>"It's a book.", "isCorrect"=>true),
                "2"=>array("item"=>"It's an eraser.", "isCorrect"=>false),
            ),
            "clickEvents"=>array(
                "click_1"=>array(
                    "type"=>"score",
                    "score"=>10,
                ),
                "click_2"=>array(
                    "type"=>"score",
                    "score"=>5,
                ),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "timeRange"          => "00:13-00:15",
                    "media_filename"           =>"media/WG_u1_grammar_p1.mp3",
                    "media_type"         => 'audio',
                    "text"=>"It's a book.",
                ),
                "No"=>array(
                    "timeRange"          => "00:13-00:15",
                    "media_filename"           =>"media/WG_u1_grammar_p1.mp3",
                    "media_type"         => 'audio',
                    "text"=>"It's a book.",
                ),
            ),
            "picture"   => "images/book.png",
        );

        $data['events'][] = array(
            "num"=>"4",
            "content_id"=>1634,
            "type"=>"choose_correct_answer",
            "media_type"=>"image",
            "timeRange"=> "",
            "media_filename"=>'images/eraser.png',
            "text"=>array(),
            "scores"=>7,
            "items"=>array(
                "0"=>array("item"=>"It's a pen.","isCorrect"=>false),
                "1"=>array("item"=>"It's a book.", "isCorrect"=>false),
                "2"=>array("item"=>"It's an eraser.", "isCorrect"=>true),
            ),
            "clickEvents"=>array(
                "click_1"=>array(
                    "type"=>"score",
                    "score"=>10,
                ),
                "click_2"=>array(
                    "type"=>"score",
                    "score"=>5,
                ),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "timeRange"          => "00:09-00:11",
                    "media_filename"           =>"media/WG_u1_grammar_p1.mp3",
                    "media_type"         => 'audio',
                    "text"=>"It's an eraser.",
                ),
                "No"=>array(
                    "timeRange"          => "00:09-00:11",
                    "media_filename"           =>"media/WG_u1_grammar_p1.mp3",
                    "media_type"         => 'audio',
                    "text"=>"It's an eraser.",
                ),
            ),
            "picture"   => "images/eraser.png",
        );


        $data['events'][] = array(
            "num"=>"5",
            "content_id"=>1635,
            "type"=>"choose_correct_answer",
            "media_type"=>"image",
            "timeRange"=> "",
            "media_filename"=>'images/pencil.png',
            "text"=>array(),
            "scores"=>7,
            "items"=>array(
                "0"=>array("item"=>"It's a pencil.","isCorrect"=>true),
                "1"=>array("item"=>"It's a crayon.", "isCorrect"=>false),
                "2"=>array("item"=>"It's a pencil case.", "isCorrect"=>false),
            ),
            "clickEvents"=>array(
                "click_1"=>array(
                    "type"=>"score",
                    "score"=>10,
                ),
                "click_2"=>array(
                    "type"=>"score",
                    "score"=>5,
                ),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "timeRange"          => "00:07-00:09",
                    "media_filename"           =>"media/WG_u1_grammar_p1.mp3",
                    "media_type"         => 'audio',
                    "text"=>"It's a pencil.",
                ),
                "No"=>array(
                    "timeRange"          => "00:07-00:09",
                    "media_filename"           =>"media/WG_u1_grammar_p1.mp3",
                    "media_type"         => 'audio',
                    "text"=>"It's a pencil.",
                ),
            ),
            "picture"   => "images/pencil.png",
        );


        $data['events'][] = array(
            "num"=>"6",
            "content_id"=>1636,
            "type"=>"choose_correct_answer",
            "media_type"=>"image",
            "timeRange"=> "",
            "media_filename"=>'images/crayon.png',
            "text"=>array(),
            "scores"=>7,
            "items"=>array(
                "0"=>array("item"=>"It's a pencil.","isCorrect"=>false),
                "1"=>array("item"=>"It's a crayon.", "isCorrect"=>true),
                "2"=>array("item"=>"It's a pencil case.", "isCorrect"=>false),
            ),
            "clickEvents"=>array(
                "click_1"=>array(
                    "type"=>"score",
                    "score"=>10,
                ),
                "click_2"=>array(
                    "type"=>"score",
                    "score"=>5,
                ),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "timeRange"          => "00:15-00:17",
                    "media_filename"           =>"media/WG_u1_grammar_p1.mp3",
                    "media_type"         => 'audio',
                    "text"=>"It's a crayon.",
                ),
                "No"=>array(
                    "timeRange"          => "00:15-00:17",
                    "media_filename"           =>"media/WG_u1_grammar_p1.mp3",
                    "media_type"         => 'audio',
                    "text"=>"It's a crayon.",
                ),
            ),
            "picture"   => "images/crayon.png",
        );

        $data['events'][] = array(
            "num"=>"7",
            "content_id"=>1637,
            "type"=>"choose_correct_answer",
            "media_type"=>"image",
            "timeRange"=> "",
            "media_filename"=>'images/pencil_case.png',
            "text"=>array(),
            "scores"=>7,
            "items"=>array(
                "0"=>array("item"=>"It's a pencil.","isCorrect"=>false),
                "1"=>array("item"=>"It's a crayon.", "isCorrect"=>false),
                "2"=>array("item"=>"It's a pencil case.", "isCorrect"=>true),
            ),
            "clickEvents"=>array(
                "click_1"=>array(
                    "type"=>"score",
                    "score"=>10,
                ),
                "click_2"=>array(
                    "type"=>"score",
                    "score"=>5,
                ),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "timeRange"          => "00:17-00:20",
                    "media_filename"           =>"media/WG_u1_grammar_p1.mp3",
                    "media_type"         => 'audio',
                    "text"=>"It's a pencil case.",
                ),
                "No"=>array(
                    "timeRange"          => "00:17-00:20",
                    "media_filename"           =>"media/WG_u1_grammar_p1.mp3",
                    "media_type"         => 'audio',
                    "text"=>"It's a pencil case.",
                ),
            ),
            "picture"   => "images/pencil_case.png",
        );

        $data['events'][] = array(
            "num"=>"8",
            "content_id"=>1638,
            "type"=>"choose_correct_answer",
            "media_type"=>"image",
            "timeRange"=> "",
            "media_filename"=>'images/crayon.png',
            "text"=>array(),
            "scores"=>7,
            "items"=>array(
                "0"=>array("item"=>"It's a pencil case.","isCorrect"=>false),
                "1"=>array("item"=>"It's a bag.", "isCorrect"=>true),
                "2"=>array("item"=>"It's a ruler.", "isCorrect"=>false),
            ),
            "clickEvents"=>array(
                "click_1"=>array(
                    "type"=>"score",
                    "score"=>10,
                ),
                "click_2"=>array(
                    "type"=>"score",
                    "score"=>5,
                ),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "timeRange"          => "00:11-00:13",
                    "media_filename"           =>"media/WG_u1_grammar_p1.mp3",
                    "media_type"         => 'audio',
                    "text"=>"It's a bag.",
                ),
                "No"=>array(
                    "timeRange"          => "00:11-00:13",
                    "media_filename"           =>"media/WG_u1_grammar_p1.mp3",
                    "media_type"         => 'audio',
                    "text"=>"It's a bag.",
                ),
            ),
            "picture"   => "images/crayon.png",
        );

        $data['events'][] = array(
            "num"=>"9",
            "content_id"=>1639,
            "type"=>"choose_correct_answer",
            "media_type"=>"image",
            "timeRange"=> "",
            "media_filename"=>'images/crayon.png',
            "text"=>array(),
            "scores"=>7,
            "items"=>array(
                "0"=>array("item"=>"It's a pencil case.","isCorrect"=>false),
                "1"=>array("item"=>"It's a bag.", "isCorrect"=>false),
                "2"=>array("item"=>"It's a ruler.", "isCorrect"=>true),
            ),
            "clickEvents"=>array(
                "click_1"=>array(
                    "type"=>"score",
                    "score"=>10,
                ),
                "click_2"=>array(
                    "type"=>"score",
                    "score"=>5,
                ),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "timeRange"          => "00:03-00:05",
                    "media_filename"           =>"media/WG_u1_grammar_p1.mp3",
                    "media_type"         => 'audio',
                    "text"=>"It's a ruler.",
                ),
                "No"=>array(
                    "timeRange"          => "00:03-00:05",
                    "media_filename"           =>"media/WG_u1_grammar_p1.mp3",
                    "media_type"         => 'audio',
                    "text"=>"It's a ruler.",
                ),
            ),
            "picture"   => "images/crayon.png",
        );

        $data['events'][] = array(
            "num"             => "10",
            'type'            => "choose_correct_answer",
            "timeRange"       => "01:12:335-01:14:422",
            "text"            => "Please look at your score!",
            "media_filename"  => 'media/WG_system.mp3',
            "clickEvents"     =>array(
            ),
            "childEvents"     =>array(
            ),
            "selectEvents"=>array(
            ),
            "media_type" => 'audio',
            "picture" => "",
            "pictures" => array()
        );


        $a = json_encode($data);
        $fp = fopen('json198.txt', "w");
        fwrite($fp, $a);
        fclose($fp);
        return;
    }


    public function getPart199()
    {
        $data = array(
            "level_id"   =>1,
            "unit_id"    =>9,
            "lesson_id"  =>77,
            "part_id"    =>199,
            "play_type"  =>"auto" //非自动播放事件
        );
        //点击第一次 执行 0,第二次执行1,依次循环
        $data['systems'][] = array(
            "num"             => "1",
            'type'            => "phonic_letter_listen",
            "timeRange"       => "00:46:210-00:48:226",
            "text"            => "Welcome to phonics.",
            "media_filename"  => 'media/WG_system.mp3',
            "clickEvents"     =>array(
            ),
            "childEvents"     =>array(
            ),
            "selectEvents"=>array(
            ),
            "media_type" => 'audio',
            "picture" => "",
            "pictures" => array()
        );

        $data['dataList'][] = array(
            "num"                => "2",
            'type'               => "phonic_letter_listen",
            "timeRange"          => "",
            "text"               => "A",
            "media_filename"     => "images/big_A.png",
            "media_type"         => 'image',
            "picture"            => "images/big_A.png",
            "clickEvents"=>array(
                "click_1"=>array(
                    "timeRange"          => "00:00-00:02",
                    "text"               => "A",
                    "media_filename"     => "media/WG_u1_phonics.mp3",
                    "media_type"         => 'audio',
                ),
                "click_2"=>array(
                    "timeRange"          => "00:02-00:05",
                    "text"               => "big letter A",
                    "media_filename"     => "media/WG_u1_phonics.mp3",
                    "media_type"         => 'audio',
                )
            ),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"sr",
                ),
            ),
            "selectEvents"=>array(
            ),
        );

        $data['dataList'][] = array(
            "num"                => "3",
            'type'               => "phonic_letter_listen",
            "timeRange"          => "",
            "text"               => "A",
            "media_filename"     => "images/small_a.png",
            "media_type"         => 'image',
            "picture"            => "images/small_a.png",
            "clickEvents"=>array(
                "click_1"=>array(
                    "timeRange"          => "00:00-00:02",
                    "text"               => "a",
                    "media_filename"     => "media/WG_u1_phonics.mp3",
                    "media_type"         => 'audio',
                ),
                "click_2"=>array(
                    "timeRange"          => "00:05-00:08",
                    "text"               => "small letter a",
                    "media_filename"     => "media/WG_u1_phonics.mp3",
                    "media_type"         => 'audio',
                )
            ),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"sr",
                ),
            ),
            "selectEvents"=>array(
            ),
        );

        $data['dataList'][] = array(
            "num"                => "4",
            'type'               => "phonic_letter_listen",
            "timeRange"          => "",
            "text"               => "B",
            "media_filename"     => "images/big_B.png",
            "media_type"         => 'image',
            "picture"            => "images/big_B.png",
            "clickEvents"=>array(
                "click_1"=>array(
                    "timeRange"          => "00:08-00:10",
                    "text"               => "B",
                    "media_filename"     => "media/WG_u1_phonics.mp3",
                    "media_type"         => 'audio',
                ),
                "click_2"=>array(
                    "timeRange"          => "00:10-00:13",
                    "text"               => "big letter B",
                    "media_filename"     => "media/WG_u1_phonics.mp3",
                    "media_type"         => 'audio',
                )
            ),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"sr",
                ),
            ),
            "selectEvents"=>array(
            ),
        );

        $data['dataList'][] = array(
            "num"                => "5",
            'type'               => "phonic_letter_listen",
            "timeRange"          => "",
            "text"               => "B",
            "media_filename"     => "images/small_b.png",
            "media_type"         => 'image',
            "picture"            => "images/small_b.png",
            "clickEvents"=>array(
                "click_1"=>array(
                    "timeRange"          => "00:08-00:10",
                    "text"               => "b",
                    "media_filename"     => "media/WG_u1_phonics.mp3",
                    "media_type"         => 'audio',
                ),
                "click_2"=>array(
                    "timeRange"          => "00:13-00:16",
                    "text"               => "small letter b",
                    "media_filename"     => "media/WG_u1_phonics.mp3",
                    "media_type"         => 'audio',
                )
            ),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"sr",
                ),
            ),
            "selectEvents"=>array(
            ),
        );

        $data['dataList'][] = array(
            "num"                => "5",
            'type'               => "phonic_letter_listen",
            "timeRange"          => "",
            "text"               => "B",
            "media_filename"     => "images/big_C.png",
            "media_type"         => 'image',
            "picture"            => "images/big_C.png",
            "clickEvents"=>array(
                "click_1"=>array(
                    "timeRange"          => "00:16-00:18",
                    "text"               => "C",
                    "media_filename"     => "media/WG_u1_phonics.mp3",
                    "media_type"         => 'audio',
                ),
                "click_2"=>array(
                    "timeRange"          => "00:18-00:21",
                    "text"               => "big letter C",
                    "media_filename"     => "media/WG_u1_phonics.mp3",
                    "media_type"         => 'audio',
                )
            ),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"sr",
                ),
            ),
            "selectEvents"=>array(
            ),
        );

        $data['dataList'][] = array(
            "num"                => "6",
            'type'               => "phonic_letter_listen",
            "timeRange"          => "",
            "text"               => "c",
            "media_filename"     => "images/small_c.png",
            "media_type"         => 'image',
            "picture"            => "images/small_c.png",
            "clickEvents"=>array(
                "click_1"=>array(
                    "timeRange"          => "00:16-00:18",
                    "text"               => "c",
                    "media_filename"     => "media/WG_u1_phonics.mp3",
                    "media_type"         => 'audio',
                ),
                "click_2"=>array(
                    "timeRange"          => "00:21-00:24",
                    "text"               => "small letter c",
                    "media_filename"     => "media/WG_u1_phonics.mp3",
                    "media_type"         => 'audio',
                )
            ),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"sr",
                ),
            ),
            "selectEvents"=>array(
            ),
        );


        $a = json_encode($data);
        $fp = fopen('json199.txt', "w");
        fwrite($fp, $a);
        fclose($fp);
        return;
    }

    public function getPart205()
    {
        $data = array(
            "level_id"   =>1,
            "unit_id"    =>9,
            "lesson_id"  =>77,
            "part_id"    =>205,
            "play_type"  =>"auto" //非自动播放事件
        );
        //点击第一次 执行 0,第二次执行1,依次循环


        $data['dataMenu'][] = array(
            "num"                => "1",
            'type'               => "phonic_word_listen",
            "text"               => "A",
            "media_filename"     => "images/Aa.png",
            "media_type"         => 'image',
            "picture"            => "",
        );

        $data['dataMenu'][] = array(
            "num"                => "2",
            'type'               => "phonic_word_listen",
            "text"               => "B",
            "media_filename"     => "images/Bb.png",
            "media_type"         => 'image',
            "picture"            => "",
        );

        $data['dataMenu'][] = array(
            "num"                => "3",
            'type'               => "phonic_word_listen",
            "text"               => "C",
            "media_filename"     => "images/Cc.png",
            "media_type"         => 'image',
            "picture"            => "",
        );

        $data['dataList'][] = array(
            "num"                => "1",
            "key"                => "A",
            'type'               => "phonic_word_listen",
            "timeRange"          => "",
            "text"               => "",
            "media_filename"     => "images/apple.png",
            "media_type"         => 'image',
            "picture"            => "images/apple.png",
            "clickEvents"=>array(
                "click_1"=>array(
                    "timeRange"          => "00:26-00:28",
                    "text"               => "apple",
                    "media_filename"     => "media/WG_u1_phonics.mp3",
                    "media_type"         => 'audio',
                ),
            ),
            "childEvents"     =>array(

            ),
            "selectEvents"=>array(
            ),
        );

        $data['dataList'][] = array(
            "num"                => "2",
            "key"                => "A",
            'type'               => "phonic_word_listen",
            "timeRange"          => "",
            "text"               => "",
            "media_filename"     => "images/ant.png",
            "media_type"         => 'image',
            "picture"            => "images/ant.png",
            "clickEvents"=>array(
                "click_1"=>array(
                    "timeRange"          => "00:28-00:30",
                    "text"               => "ant",
                    "media_filename"     => "media/WG_u1_phonics.mp3",
                    "media_type"         => 'audio',
                ),
            ),
            "childEvents"     =>array(

            ),
            "selectEvents"=>array(
            ),
        );


        $data['dataList'][] = array(
            "num"                => "3",
            "key"                => "B",
            'type'               => "phonic_word_listen",
            "timeRange"          => "",
            "text"               => "",
            "media_filename"     => "images/bag.png",
            "media_type"         => 'image',
            "picture"            => "images/bag.png",
            "clickEvents"=>array(
                "click_1"=>array(
                    "timeRange"          => "00:31-00:33",
                    "text"               => "bag",
                    "media_filename"     => "media/WG_u1_phonics.mp3",
                    "media_type"         => 'audio',
                ),
            ),
            "childEvents"     =>array(

            ),
            "selectEvents"=>array(
            ),
        );

        $data['dataList'][] = array(
            "num"                => "4",
            "key"                => "B",
            'type'               => "phonic_word_listen",
            "timeRange"          => "",
            "text"               => "",
            "media_filename"     => "images/book.png",
            "media_type"         => 'image',
            "picture"            => "images/book.png",
            "clickEvents"=>array(
                "click_1"=>array(
                    "timeRange"          => "00:33-00:35",
                    "text"               => "book",
                    "media_filename"     => "media/WG_u1_phonics.mp3",
                    "media_type"         => 'audio',
                ),
            ),
            "childEvents"     =>array(

            ),
            "selectEvents"=>array(
            ),
        );


        $data['dataList'][] = array(
            "num"                => "5",
            "key"                => "C",
            'type'               => "phonic_word_listen",
            "timeRange"          => "",
            "text"               => "",
            "media_filename"     => "images/cat.png",
            "media_type"         => 'image',
            "picture"            => "images/cat.png",
            "clickEvents"=>array(
                "click_1"=>array(
                    "timeRange"          => "00:36-00:38",
                    "text"               => "cat",
                    "media_filename"     => "media/WG_u1_phonics.mp3",
                    "media_type"         => 'audio',
                ),
            ),
            "childEvents"     =>array(

            ),
            "selectEvents"=>array(
            ),
        );

        $data['dataList'][] = array(
            "num"                => "6",
            "key"                => "C",
            'type'               => "phonic_word_listen",
            "timeRange"          => "",
            "text"               => "",
            "media_filename"     => "images/cake.png",
            "media_type"         => 'image',
            "picture"            => "images/cake.png",
            "clickEvents"=>array(
                "click_1"=>array(
                    "timeRange"          => "00:38-00:40",
                    "text"               => "cake",
                    "media_filename"     => "media/WG_u1_phonics.mp3",
                    "media_type"         => 'audio',
                ),
            ),
            "childEvents"     =>array(

            ),
            "selectEvents"=>array(
            ),
        );

        $a = json_encode($data);
        $fp = fopen('json205.txt', "w");
        fwrite($fp, $a);
        fclose($fp);
        return;
    }


    public function getPart200()
    {
        $data = array(
            "level_id"   =>1,
            "unit_id"    =>9,
            "lesson_id"  =>77,
            "part_id"    =>200,
            "play_type"  =>"auto" //非自动播放事件
        );

        $data['systems'][] = array(
            "num"             => "1",
            'type'            => "look_listen_record",
            "timeRange"       => "01:06:000-01:08:133",
            "text"            => "listen and speak.",
            "media_filename"  => 'media/WG_system.mp3',
            "clickEvents"     =>array(
            ),
            "childEvents"     =>array(
            ),
            "selectEvents"=>array(
            ),
            "media_type" => 'audio',
            "picture" => "",
            "pictures" => array()
        );

        $data['dataMenu'][] = array(
            "num"                => "1",
            'type'               => "look_listen_record",
            "text"               => "A",
            "media_filename"     => "images/Aa.png",
            "media_type"         => 'image',
            "picture"            => "",
        );

        $data['dataMenu'][] = array(
            "num"                => "2",
            'type'               => "look_listen_record",
            "text"               => "B",
            "media_filename"     => "images/Bb.png",
            "media_type"         => 'image',
            "picture"            => "",
        );

        $data['dataMenu'][] = array(
            "num"                => "3",
            'type'               => "look_listen_record",
            "text"               => "C",
            "media_filename"     => "images/Cc.png",
            "media_type"         => 'image',
            "picture"            => "",
        );

        //点击第一次 执行 0,第二次执行1,依次循环
        $data['dataList'][] = array(
            "num"                => "1",
            "key"                => "A",
            'type'               => "look_listen_record",
            "timeRange"          => "",
            "text"               => "",
            "media_filename"     => "",
            "media_type"         => '',
            "picture"            => "images/Aa.png",
            "clickEvents"=>array(
                "click_1"=>array(
                    "timeRange"          => "00:00:00-00:01:388",
                    "text"               => "Aa",
                    "media_filename"     => "media/5_WG_u1_mouth_phonics.mp4",
                    "media_type"         => 'mouth',
                ),
            ),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"record",
                ),
                "1"=>array(
                    "type"=>"replay",
                ),
                "2"=>array(
                    "type"=>"repeat",
                ),
            ),
            "selectEvents"=>array(
            ),
        );

        $data['dataList'][] = array(
            "num"                => "2",
            "key"                => "A",
            'type'               => "look_listen_record",
            "timeRange"          => "",
            "text"               => "",
            "media_filename"     => "",
            "media_type"         => '',
            "picture"            => "images/small_a.png",
            "clickEvents"=>array(
                "click_1"=>array(
                    "timeRange"          => "00:24:885-00:26:106",
                    "text"               => "a",
                    "media_filename"     => "media/5_WG_u1_mouth_phonics.mp4",
                    "media_type"         => 'mouth',
                ),
            ),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"record",
                ),
                "1"=>array(
                    "type"=>"replay",
                ),
                "2"=>array(
                    "type"=>"repeat",
                ),
            ),
            "selectEvents"=>array(
            ),
        );

        $data['dataList'][] = array(
            "num"                => "3",
            "key"                => "A",
            'type'               => "look_listen_record",
            "timeRange"          => "",
            "text"               => "",
            "media_filename"     => "",
            "media_type"         => '',
            "picture"            => "images/apple.png",
            "clickEvents"=>array(
                "click_1"=>array(
                    "timeRange"          => "00:26:589-00:27:881",
                    "text"               => "apple",
                    "media_filename"     => "media/5_WG_u1_mouth_phonics.mp4",
                    "media_type"         => 'mouth',
                ),
            ),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"record",
                ),
                "1"=>array(
                    "type"=>"replay",
                ),
                "2"=>array(
                    "type"=>"repeat",
                ),
            ),
            "selectEvents"=>array(
            ),
        );

        $data['dataList'][] = array(
            "num"                => "4",
            "key"                => "A",
            'type'               => "look_listen_record",
            "timeRange"          => "",
            "text"               => "",
            "media_filename"     => "",
            "media_type"         => '',
            "picture"            => "images/ant.png",
            "clickEvents"=>array(
                "click_1"=>array(
                    "timeRange"          => "00:28:047-00:29:748",
                    "text"               => "ant",
                    "media_filename"     => "media/5_WG_u1_mouth_phonics.mp4",
                    "media_type"         => 'mouth',
                ),
            ),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"record",
                ),
                "1"=>array(
                    "type"=>"replay",
                ),
                "2"=>array(
                    "type"=>"repeat",
                ),
            ),
            "selectEvents"=>array(
            ),
        );

        $data['dataList'][] = array(
            "num"                => "5",
            "key"                => "B",
            'type'               => "look_listen_record",
            "timeRange"          => "",
            "text"               => "",
            "media_filename"     => "",
            "media_type"         => '',
            "picture"            => "images/Bb.png",
            "clickEvents"=>array(
                "click_1"=>array(
                    "timeRange"          => "00:08:018-00:09:241",
                    "text"               => "Bb",
                    "media_filename"     => "media/5_WG_u1_mouth_phonics.mp4",
                    "media_type"         => 'mouth',
                ),
            ),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"record",
                ),
                "1"=>array(
                    "type"=>"replay",
                ),
                "2"=>array(
                    "type"=>"repeat",
                ),
            ),
            "selectEvents"=>array(
            ),
        );

        $data['dataList'][] = array(
            "num"                => "6",
            "key"                => "B",
            'type'               => "look_listen_record",
            "timeRange"          => "",
            "text"               => "",
            "media_filename"     => "",
            "media_type"         => '',
            "picture"            => "images/small_b.png",
            "clickEvents"=>array(
                "click_1"=>array(
                    "timeRange"          => "00:30:526-00:31:212",
                    "text"               => "b",
                    "media_filename"     => "media/5_WG_u1_mouth_phonics.mp4",
                    "media_type"         => 'mouth',
                ),
            ),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"record",
                ),
                "1"=>array(
                    "type"=>"replay",
                ),
                "2"=>array(
                    "type"=>"repeat",
                ),
            ),
            "selectEvents"=>array(
            ),
        );

        $data['dataList'][] = array(
            "num"                => "7",
            "key"                => "B",
            'type'               => "look_listen_record",
            "timeRange"          => "",
            "text"               => "",
            "media_filename"     => "",
            "media_type"         => '',
            "picture"            => "images/bag.png",
            "clickEvents"=>array(
                "click_1"=>array(
                    "timeRange"          => "00:31:614-00:33:020",
                    "text"               => "bag",
                    "media_filename"     => "media/5_WG_u1_mouth_phonics.mp4",
                    "media_type"         => 'mouth',
                ),
            ),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"record",
                ),
                "1"=>array(
                    "type"=>"replay",
                ),
                "2"=>array(
                    "type"=>"repeat",
                ),
            ),
            "selectEvents"=>array(
            ),
        );

        $data['dataList'][] = array(
            "num"                => "8",
            "key"                => "B",
            'type'               => "look_listen_record",
            "timeRange"          => "",
            "text"               => "",
            "media_filename"     => "",
            "media_type"         => '',
            "picture"            => "images/book.png",
            "clickEvents"=>array(
                "click_1"=>array(
                    "timeRange"          => "00:33:601-00:35:072",
                    "text"               => "book",
                    "media_filename"     => "media/5_WG_u1_mouth_phonics.mp4",
                    "media_type"         => 'mouth',
                ),
            ),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"record",
                ),
                "1"=>array(
                    "type"=>"replay",
                ),
                "2"=>array(
                    "type"=>"repeat",
                ),
            ),
            "selectEvents"=>array(
            ),
        );

        $data['dataList'][] = array(
            "num"                => "9",
            "key"                => "C",
            'type'               => "look_listen_record",
            "timeRange"          => "",
            "text"               => "",
            "media_filename"     => "",
            "media_type"         => '',
            "picture"            => "images/Cc.png",
            "clickEvents"=>array(
                "click_1"=>array(
                    "timeRange"          => "00:16:418-00:17:919",
                    "text"               => "Cc",
                    "media_filename"     => "media/5_WG_u1_mouth_phonics.mp4",
                    "media_type"         => 'mouth',
                ),
            ),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"record",
                ),
                "1"=>array(
                    "type"=>"replay",
                ),
                "2"=>array(
                    "type"=>"repeat",
                ),
            ),
            "selectEvents"=>array(
            ),
        );

        $data['dataList'][] = array(
            "num"                => "10",
            "key"                => "C",
            'type'               => "look_listen_record",
            "timeRange"          => "",
            "text"               => "",
            "media_filename"     => "",
            "media_type"         => '',
            "picture"            => "images/small_c.png",
            "clickEvents"=>array(
                "click_1"=>array(
                    "timeRange"          => "00:21:419-00:24:165",
                    "text"               => "c",
                    "media_filename"     => "media/5_WG_u1_mouth_phonics.mp4",
                    "media_type"         => 'mouth',
                ),
            ),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"record",
                ),
                "1"=>array(
                    "type"=>"replay",
                ),
                "2"=>array(
                    "type"=>"repeat",
                ),
            ),
            "selectEvents"=>array(
            ),
        );

        $data['dataList'][] = array(
            "num"                => "11",
            "key"                => "C",
            'type'               => "look_listen_record",
            "timeRange"          => "",
            "text"               => "",
            "media_filename"     => "",
            "media_type"         => '',
            "picture"            => "images/cat.png",
            "clickEvents"=>array(
                "click_1"=>array(
                    "timeRange"          => "00:36:061-00:37:314",
                    "text"               => "cat",
                    "media_filename"     => "media/5_WG_u1_mouth_phonics.mp4",
                    "media_type"         => 'mouth',
                ),
            ),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"record",
                ),
                "1"=>array(
                    "type"=>"replay",
                ),
                "2"=>array(
                    "type"=>"repeat",
                ),
            ),
            "selectEvents"=>array(
            ),
        );

        $data['dataList'][] = array(
            "num"                => "12",
            "key"                => "C",
            'type'               => "look_listen_record",
            "timeRange"          => "",
            "text"               => "",
            "media_filename"     => "",
            "media_type"         => '',
            "picture"            => "images/cake.png",
            "clickEvents"=>array(
                "click_1"=>array(
                    "timeRange"          => "00:37:565-00:38:952",
                    "text"               => "cake",
                    "media_filename"     => "media/5_WG_u1_mouth_phonics.mp4",
                    "media_type"         => 'mouth',
                ),
            ),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"record",
                ),
                "1"=>array(
                    "type"=>"replay",
                ),
                "2"=>array(
                    "type"=>"repeat",
                ),
            ),
            "selectEvents"=>array(
            ),
        );


        $a = json_encode($data);
        $fp = fopen('json200.txt', "w");
        fwrite($fp, $a);
        fclose($fp);
        return;
    }


    public function getPart201()
    {
        $data = array(
            "level_id"   =>1,
            "unit_id"    =>9,
            "lesson_id"  =>77,
            "part_id"    =>201,
            "play_type"  =>"auto" //非自动播放事件
        );

        $data['dataMenu'][] = array(
            "num"                => "1",
            'type'               => "word_sr",
            "text"               => "A",
            "media_filename"     => "images/Aa.png",
            "media_type"         => 'image',
            "picture"            => "",
        );

        $data['dataMenu'][] = array(
            "num"                => "2",
            'type'               => "word_sr",
            "text"               => "B",
            "media_filename"     => "images/Bb.png",
            "media_type"         => 'image',
            "picture"            => "",
        );

        $data['dataMenu'][] = array(
            "num"                => "3",
            'type'               => "word_sr",
            "text"               => "C",
            "media_filename"     => "images/Cc.png",
            "media_type"         => 'image',
            "picture"            => "",
        );

        //点击第一次 执行 0,第二次执行1,依次循环
        $data['dataList'][] = array(
            "num"                => "1",
            'type'               => "word_sr",
            "key"                => "A",
            "timeRange"          => "",
            "text"               => "",
            "media_filename"     => "",
            "media_type"         => '',
            "picture"            => "images/apple.png",
            "clickEvents"=>array(
                "click_1"=>array(
                    "timeRange"          => "00:26-00:28",
                    "text"               => "apple",
                    "media_filename"     => "media/WG_u1_phonics.mp3",
                    "media_type"         => 'audio',
                ),
            ),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"sr",
                ),
            ),
            "selectEvents"=>array(
            ),
        );

        $data['dataList'][] = array(
            "num"                => "2",
            'type'               => "word_sr",
            "key"                => "A",
            "timeRange"          => "",
            "text"               => "",
            "media_filename"     => "",
            "media_type"         => '',
            "picture"            => "images/ant.png",
            "clickEvents"=>array(
                "click_1"=>array(
                    "timeRange"          => "00:28-00:30",
                    "text"               => "ant",
                    "media_filename"     => "media/WG_u1_phonics.mp3",
                    "media_type"         => 'audio',
                ),
            ),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"sr",
                ),
            ),
            "selectEvents"=>array(
            ),
        );


        $data['dataList'][] = array(
            "num"                => "3",
            'type'               => "word_sr",
            "key"                => "B",
            "timeRange"          => "",
            "text"               => "",
            "media_filename"     => "",
            "media_type"         => '',
            "picture"            => "images/bag.png",
            "clickEvents"=>array(
                "click_1"=>array(
                    "timeRange"          => "00:31-00:33",
                    "text"               => "bag",
                    "media_filename"     => "media/WG_u1_phonics.mp3",
                    "media_type"         => 'audio',
                ),
            ),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"sr",
                ),
            ),
            "selectEvents"=>array(
            ),
        );

        $data['dataList'][] = array(
            "num"                => "4",
            'type'               => "word_sr",
            "key"                => "B",
            "timeRange"          => "",
            "text"               => "",
            "media_filename"     => "",
            "media_type"         => '',
            "picture"            => "images/book.png",
            "clickEvents"=>array(
                "click_1"=>array(
                    "timeRange"          => "00:33-00:35",
                    "text"               => "book",
                    "media_filename"     => "media/WG_u1_phonics.mp3",
                    "media_type"         => 'audio',
                ),
            ),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"sr",
                ),
            ),
            "selectEvents"=>array(
            ),
        );

        $data['dataList'][] = array(
            "num"                => "5",
            'type'               => "word_sr",
            "key"                => "C",
            "timeRange"          => "",
            "text"               => "",
            "media_filename"     => "",
            "media_type"         => '',
            "picture"            => "images/cat.png",
            "clickEvents"=>array(
                "click_1"=>array(
                    "timeRange"          => "00:36-00:38",
                    "text"               => "cat",
                    "media_filename"     => "media/WG_u1_phonics.mp3",
                    "media_type"         => 'audio',
                ),
            ),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"sr",
                ),
            ),
            "selectEvents"=>array(
            ),
        );

        $data['dataList'][] = array(
            "num"                => "6",
            'type'               => "word_sr",
            "key"                => "C",
            "timeRange"          => "",
            "text"               => "",
            "media_filename"     => "",
            "media_type"         => '',
            "picture"            => "images/cake.png",
            "clickEvents"=>array(
                "click_1"=>array(
                    "timeRange"          => "00:38-00:40",
                    "text"               => "cake",
                    "media_filename"     => "media/WG_u1_phonics.mp3",
                    "media_type"         => 'audio',
                ),
            ),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"sr",
                ),
            ),
            "selectEvents"=>array(
            ),
        );


        $a = json_encode($data);
        $fp = fopen('json201.txt', "w");
        fwrite($fp, $a);
        fclose($fp);
        return;
    }




    //multipleChoice
    //自动播放和识别
    public function getPart202()
    {
        $data = array(
            "level_id"   =>1,
            "unit_id"    =>9,
            "lesson_id"  =>77,
            "part_id"    =>202,
            "play_type"  =>"auto" //非自动播放事件
        );
        $data['systems'][] = array(
            "num"             => "1",
            'type'            => "choose_right_letter",
            "timeRange"       => "00:49:729-00:51:497",
            "text"            => "Let's check.",
            "media_filename"  => 'media/WG_system.mp3',
            "clickEvents"     =>array(
            ),
            "childEvents"     =>array(
            ),
            "selectEvents"=>array(
            ),
            "media_type" => 'audio',
            "picture" => "",
            "pictures" => array()
        );

        $data['events'][] = array(
            "num"=>"2",
            "content_id"=>1640,
            "type"=>"choose_right_letter",
            "media_type"=>"audio",
            "timeRange"=> "00:26-00:28",
            "media_filename"=>'media/WG_u1_phonics.mp3',
            "text"=>" _ pple",
            "items"=>array(
                "0"=>array("item"=>"a","isCorrect"=>true),
                "1"=>array("item"=>"b", "isCorrect"=>false),
                "2"=>array("item"=>"c", "isCorrect"=>false),
            ),
            "clickEvents"=>array(
                "click_1"=>array(
                    "type"=>"score",
                    "score"=>20,
                ),
                "click_2"=>array(
                    "type"=>"score",
                    "score"=>10,
                ),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "timeRange"          => "00:00-00:09",
                    "media_filename"           =>"media/WG_u1_phonics.mp3",
                    "media_type"         => 'audio',
                    "text"=>"apple",
                ),
                "No"=>array(
                    "timeRange"          => "00:00-00:09",
                    "media_filename"           =>"media/WG_u1_phonics.mp3",
                    "media_type"         => 'audio',
                    "text"=>"apple",
                ),
            ),
            "picture"=>"images/apple.png"
        );

        $data['events'][] = array(
            "num"=>"3",
            "content_id"=>1641,
            "type"=>"choose_right_letter",
            "media_type"=>"audio",
            "timeRange"=> "00:28-00:30",
            "media_filename"=>'media/WG_u1_phonics.mp3',
            "text"=>" _ nt",
            "items"=>array(
                "0"=>array("item"=>"a","isCorrect"=>true),
                "1"=>array("item"=>"b", "isCorrect"=>false),
                "2"=>array("item"=>"c", "isCorrect"=>false),
            ),
            "clickEvents"=>array(
                "click_1"=>array(
                    "type"=>"score",
                    "score"=>20,
                ),
                "click_2"=>array(
                    "type"=>"score",
                    "score"=>10,
                ),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "timeRange"          => "00:28-00:30",
                    "media_filename"           =>"media/WG_u1_phonics.mp3",
                    "media_type"         => 'audio',
                    "text"=>"ant",
                ),
                "No"=>array(
                    "timeRange"          => "00:28-00:30",
                    "media_filename"           =>"media/WG_u1_phonics.mp3",
                    "media_type"         => 'audio',
                    "text"=>"ant",
                ),
            ),
            "picture"=>"images/ant.png"
        );

        $data['events'][] = array(
            "num"=>"4",
            "content_id"=>1642,
            "type"=>"choose_right_letter",
            "media_type"=>"audio",
            "timeRange"=> "00:31-00:33",
            "media_filename"=>'media/WG_u1_phonics.mp3',
            "text"=>" _ ag",
            "items"=>array(
                "0"=>array("item"=>"a","isCorrect"=>false),
                "1"=>array("item"=>"b", "isCorrect"=>true),
                "2"=>array("item"=>"c", "isCorrect"=>false),
            ),
            "clickEvents"=>array(
                "click_1"=>array(
                    "type"=>"score",
                    "score"=>20,
                ),
                "click_2"=>array(
                    "type"=>"score",
                    "score"=>10,
                ),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "timeRange"          => "00:31-00:33",
                    "media_filename"           =>"media/WG_u1_phonics.mp3",
                    "media_type"         => 'audio',
                    "text"=>"bag",
                ),
                "No"=>array(
                    "timeRange"          => "00:31-00:33",
                    "media_filename"           =>"media/WG_u1_phonics.mp3",
                    "media_type"         => 'audio',
                    "text"=>"bag",
                ),
            ),
            "picture"=>"images/bag.png"
        );

        $data['events'][] = array(
            "num"=>"5",
            "content_id"=>1643,
            "type"=>"choose_right_letter",
            "media_type"=>"audio",
            "timeRange"=> "00:33-00:35",
            "media_filename"=>'media/WG_u1_phonics.mp3',
            "text"=>" _ ook",
            "items"=>array(
                "0"=>array("item"=>"a","isCorrect"=>false),
                "1"=>array("item"=>"b", "isCorrect"=>true),
                "2"=>array("item"=>"c", "isCorrect"=>false),
            ),
            "clickEvents"=>array(
                "click_1"=>array(
                    "type"=>"score",
                    "score"=>20,
                ),
                "click_2"=>array(
                    "type"=>"score",
                    "score"=>10,
                ),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "timeRange"          => "00:33-00:35",
                    "media_filename"           =>"media/WG_u1_phonics.mp3",
                    "media_type"         => 'audio',
                    "text"=>"book",
                ),
                "No"=>array(
                    "timeRange"          => "00:33-00:35",
                    "media_filename"           =>"media/WG_u1_phonics.mp3",
                    "media_type"         => 'audio',
                    "text"=>"book",
                ),
            ),
            "picture"=>"images/book.png"
        );

        $data['events'][] = array(
            "num"=>"6",
            "content_id"=>1644,
            "type"=>"choose_right_letter",
            "media_type"=>"audio",
            "timeRange"=> "00:36-00:38",
            "media_filename"=>'media/WG_u1_phonics.mp3',
            "text"=>" _ at",
            "items"=>array(
                "0"=>array("item"=>"a","isCorrect"=>false),
                "1"=>array("item"=>"b", "isCorrect"=>false),
                "2"=>array("item"=>"c", "isCorrect"=>true),
            ),
            "clickEvents"=>array(
                "click_1"=>array(
                    "type"=>"score",
                    "score"=>20,
                ),
                "click_2"=>array(
                    "type"=>"score",
                    "score"=>10,
                ),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "timeRange"          => "00:36-00:38",
                    "media_filename"           =>"media/WG_u1_phonics.mp3",
                    "media_type"         => 'audio',
                    "text"=>"cat",
                ),
                "No"=>array(
                    "timeRange"          => "00:36-00:38",
                    "media_filename"           =>"media/WG_u1_phonics.mp3",
                    "media_type"         => 'audio',
                    "text"=>"cat",
                ),
            ),
            "picture"=>"images/cat.png"
        );

        $data['events'][] = array(
            "num"=>"7",
            "content_id"=>1645,
            "type"=>"choose_right_letter",
            "media_type"=>"audio",
            "timeRange"=> "00:36-00:38",
            "media_filename"=>'media/WG_u1_phonics.mp3',
            "text"=>" _ ake",
            "items"=>array(
                "0"=>array("item"=>"a","isCorrect"=>false),
                "1"=>array("item"=>"b", "isCorrect"=>false),
                "2"=>array("item"=>"c", "isCorrect"=>true),
            ),
            "clickEvents"=>array(
                "click_1"=>array(
                    "type"=>"score",
                    "score"=>20,
                ),
                "click_2"=>array(
                    "type"=>"score",
                    "score"=>10,
                ),
            ),
            "selectEvents"=>array(
                "Yes"=>array(
                    "timeRange"          => "00:38-00:40",
                    "media_filename"           =>"media/WG_u1_phonics.mp3",
                    "media_type"         => 'audio',
                    "text"=>"cake",
                ),
                "No"=>array(
                    "timeRange"          => "00:38-00:40",
                    "media_filename"           =>"media/WG_u1_phonics.mp3",
                    "media_type"         => 'audio',
                    "text"=>"cake",
                ),
            ),
            "picture"=>"images/cake.png"
        );

        $a = json_encode($data);
        $fp = fopen('json202.txt', "w");
        fwrite($fp, $a);
        fclose($fp);
        return;
    }


    //game
    //自动播放和识别
    public function getPart203()
    {
        $data = array(
            "level_id"   =>1,
            "unit_id"    =>9,
            "lesson_id"  =>78,
            "part_id"    =>203,
            "play_type"  =>"auto" //非自动播放事件
        );
        $data['systems'][] = array(
            "num"             => "1",
            'type'            => "game_time_limited_look_speak",
            "timeRange"       => "00:48:226-00:49:405",
            "text"            => "let's play.",
            "media_filename"  => 'media/WG_system.mp3',
            "clickEvents"     =>array(
            ),
            "childEvents"     =>array(
            ),
            "selectEvents"=>array(
            ),
            "media_type" => 'audio',
            "picture" => "",
            "pictures" => array()
        );

        $data['systems'][] = array(
            "num"             => "2",
            'type'            => "game_time_limited_look_speak",
            "timeRange"       => "01:08:287-01:10:643",
            "text"            => "You have one minute.",
            "media_filename"  => 'media/WG_system.mp3',
            "clickEvents"     =>array(
            ),
            "childEvents"     =>array(
            ),
            "selectEvents"=>array(
            ),
            "media_type" => 'audio',
            "picture" => "",
            "pictures" => array()
        );

        $data['events'][] = array(
            "num"=>"3",
            "content_id"=>1646,
            "type"=>"game_time_limited_look_speak",
            "media_type"=>"",
            "timeRange"=> "",
            "media_filename" =>"",
            "text"=>"",
            "items"=>array(
                "0"=>array("text"=>"Aa.","answer"=>"A","type"=>"text"),
                "1"=>array("text"=>"Bb.","answer"=>"B","type"=>"text"),
                "2"=>array("text"=>"Cc.","answer"=>"C","type"=>"text"),
                "3"=>array("text"=>"a pen.","answer"=>"a pen","type"=>"text"),
                "4"=>array("text"=>"a book.","answer"=>"a book","type"=>"text"),
                "5"=>array("text"=>"an eraser","answer"=>"an eraser","type"=>"text"),
                "6"=>array("text"=>"a pencil","answer"=>"a pencil","type"=>"text"),
                "7"=>array("text"=>"a crayon","answer"=>"a crayon","type"=>"text"),
                "8"=>array("text"=>"a pencil case","answer"=>"a pencil case","type"=>"text"),
                "9"=>array("text"=>"a bag","answer"=>"a bag","type"=>"text"),
                "10"=>array("text"=>"a ruler","answer"=>"a ruler","type"=>"text"),
                "11"=>array("text"=>"an apple","answer"=>"an apple","type"=>"text"),
                "12"=>array("text"=>"an ant","answer"=>"an ant","type"=>"text"),
                "13"=>array("text"=>"a bag","answer"=>"a bag","type"=>"text"),
                "14"=>array("text"=>"a book","answer"=>"a book","type"=>"text"),
                "15"=>array("text"=>"a cat","answer"=>"a cat","type"=>"text"),
                "16"=>array("text"=>"a cake","answer"=>"a cake","type"=>"text"),
                "17"=>array("text"=>"It's a pen.","answer"=>"It's a pen","type"=>"text"),
                "18"=>array("text"=>"It's a book.","answer"=>"It's a book","type"=>"text"),
                "19"=>array("text"=>"It's an eraser.","answer"=>"It's an eraser","type"=>"text"),
                "20"=>array("text"=>"It's a pencil.","answer"=>"It's a pencil","type"=>"text"),
                "21"=>array("text"=>"It's a crayon.","answer"=>"It's a crayon","type"=>"text"),
                "22"=>array("text"=>"It's a pencil case.","answer"=>"It's a pencil case","type"=>"text"),
                "23"=>array("text"=>"It's a bag.","answer"=>"It's a bag","type"=>"text"),
                "24"=>array("text"=>"It's a ruler.","answer"=>"It's a ruler","type"=>"text"),
                "25"=>array("text"=>"Is this a pen?","answer"=>"Is this a pen","type"=>"text"),
                "26"=>array("text"=>"Is this a book?","answer"=>"Is this a book","type"=>"text"),
                "27"=>array("text"=>"Is this an eraser?","answer"=>"Is this an eraser","type"=>"text"),
                "28"=>array("text"=>"Is this a pencil?","answer"=>"Is this a pencil","type"=>"text"),
                "29"=>array("text"=>"Is this a crayon?","answer"=>"Is this a crayon","type"=>"text"),
                "30"=>array("text"=>"Is this a pencil case?","answer"=>"Is this a pencil case","type"=>"text"),
                "31"=>array("text"=>"Is this a bag?","answer"=>"Is this a bag","type"=>"text"),
                "32"=>array("text"=>"Is this a ruler?","answer"=>"Is this a ruler","type"=>"text"),
            ),
            "selectEvents"=>array(
            ),
            "picture"=>""
        );

        $data['systems_end'][] = array(
            "num"             => "1",
            'type'            => "game_time_limited_look_speak",
            "timeRange"       => "01:14:422-01:15:841",
            "text"            => "Time's up.",
            "media_filename"  => 'media/WG_system.mp3',
            "clickEvents"     =>array(
            ),
            "childEvents"     =>array(
            ),
            "selectEvents"=>array(
            ),
            "media_type" => 'audio',
            "picture" => "",
            "pictures" => array()
        );

        $data['systems_end'][] = array(
            "num"             => "2",
            'type'            => "game_time_limited_look_speak",
            "timeRange"       => "01:12:335-01:14:422",
            "text"            => "Please look at your score!",
            "media_filename"  => 'media/WG_system.mp3',
            "clickEvents"     =>array(
            ),
            "childEvents"     =>array(
            ),
            "selectEvents"=>array(
            ),
            "media_type" => 'audio',
            "picture" => "",
            "pictures" => array()
        );

        $a = json_encode($data);
        $fp = fopen('json203.txt', "w");
        fwrite($fp, $a);
        fclose($fp);
        return;
    }



    public function getPart204()
    {
        $data = array(
            "level_id"   =>1,
            "unit_id"    =>9,
            "lesson_id"  =>79,
            "part_id"    =>204,
            "key_rand"   => array(
                "vocabulary"=>6,
                "passage_sr" =>5,
                "passage_re" =>5,
                "grammar" =>2,
                "phonics" =>2,
            ),
            "play_type"  =>"auto"
        );


        $data['systems'][] = array(
            "num"             => "1",
            'type'            => "choose_right_letter",
            "timeRange"       => "00:59-01:01",
            "text"            => "Let's check.",
            "media_filename"  => 'media/WG_system.mp3',
            "clickEvents"     =>array(
            ),
            "childEvents"     =>array(
            ),
            "selectEvents"=>array(
            ),
            "media_type" => 'audio',
            "picture" => "",
            "pictures" => array()
        );


        $data['events'][] = array(
            "num"                => "2",
            'type'               => "choose_right_answer",
            "timeRange"          => "00:00-00:02",
            "text"               => "a pen",
            "media_filename"     => "media/WG_u1_voc.mp3",
            "media_type"         => 'audio',
            "scores"=>5,
            "key"=>"vocabulary",
            "content_id"=>1647,
            "items"=>array(
                "0"=>array("type"=>"image","media_filename"=>"images/pen.png","text"=>"a pen","isCorrect"=>true),
                "1"=>array("type"=>"image","media_filename"=>"images/book.png", "text"=>"a book","isCorrect"=>false),
            ),
            "picture"   => "",
            "clickEvents"=>array(
                "click_1"=>array(
                    "type"=>"score",
                    "score"=>5,
                ),
            ),
            "childEvents"     =>array(

            ),
            "selectEvents"=>array(

            ),
        );

        $data['events'][] = array(
            "num"                => "3",
            'type'               => "choose_right_answer",
            "timeRange"          => "00:02-00:04",
            "text"               => "It's a pen.",
            "media_filename"     => "media/WG_u1_voc.mp3",
            "media_type"         => 'audio',
            "scores"=>5,
            "key"=>"vocabulary",
            "content_id"=>1648,
            "items"=>array(
                "0"=>array("type"=>"image","media_filename"=>"images/pen.png","text"=>"a pen","isCorrect"=>true),
                "1"=>array("type"=>"image","media_filename"=>"images/pencil.png", "text"=>"a pencil","isCorrect"=>false),
            ),
            "picture"   => "",
            "clickEvents"=>array(
                "click_1"=>array(
                    "type"=>"score",
                    "score"=>5,
                ),
            ),
            "childEvents"     =>array(

            ),
            "selectEvents"=>array(

            ),
        );

        $data['events'][] = array(
            "num"                => "4",
            'type'               => "choose_right_answer",
            "timeRange"          => "00:04-00:06",
            "text"               => "a book",
            "media_filename"     => "media/WG_u1_voc.mp3",
            "media_type"         => 'audio',
            "scores"=>5,
            "key"=>"vocabulary",
            "content_id"=>1649,
            "items"=>array(
                "0"=>array("type"=>"image","media_filename"=>"images/pencil.png","text"=>"a pencil","isCorrect"=>false),
                "1"=>array("type"=>"image","media_filename"=>"images/book.png", "text"=>"a book","isCorrect"=>true),
            ),
            "picture"   => "",
            "clickEvents"=>array(
                "click_1"=>array(
                    "type"=>"score",
                    "score"=>5,
                ),
            ),
            "childEvents"     =>array(

            ),
            "selectEvents"=>array(

            ),
        );

        $data['events'][] = array(
            "num"                => "5",
            'type'               => "choose_right_answer",
            "timeRange"          => "00:06-00:08",
            "text"               => "It's a book.",
            "media_filename"     => "media/WG_u1_voc.mp3",
            "media_type"         => 'audio',
            "scores"=>5,
            "key"=>"vocabulary",
            "content_id"=>1650,
            "items"=>array(
                "0"=>array("type"=>"image","media_filename"=>"images/bag.png","text"=>"a bag","isCorrect"=>false),
                "1"=>array("type"=>"image","media_filename"=>"images/book.png", "text"=>"a book","isCorrect"=>true),
            ),
            "picture"   => "",
            "clickEvents"=>array(
                "click_1"=>array(
                    "type"=>"score",
                    "score"=>5,
                ),
            ),
            "childEvents"     =>array(

            ),
            "selectEvents"=>array(

            ),
        );

        $data['events'][] = array(
            "num"                => "6",
            'type'               => "choose_right_answer",
            "timeRange"          => "00:08-00:10",
            "text"               => "a pencil",
            "media_filename"     => "media/WG_u1_voc.mp3",
            "media_type"         => 'audio',
            "scores"=>5,
            "key"=>"vocabulary",
            "content_id"=>1651,
            "items"=>array(
                "0"=>array("type"=>"image","media_filename"=>"images/pencil.png","text"=>"a pencil","isCorrect"=>true),
                "1"=>array("type"=>"image","media_filename"=>"images/eraser.png", "text"=>"an eraser","isCorrect"=>false),
            ),
            "picture"   => "",
            "clickEvents"=>array(
                "click_1"=>array(
                    "type"=>"score",
                    "score"=>5,
                ),
            ),
            "childEvents"     =>array(

            ),
            "selectEvents"=>array(

            ),
        );

        $data['events'][] = array(
            "num"                => "7",
            'type'               => "choose_right_answer",
            "timeRange"          => "00:10-00:12",
            "text"               => "It's a pencil.",
            "media_filename"     => "media/WG_u1_voc.mp3",
            "media_type"         => 'audio',
            "scores"=>5,
            "key"=>"vocabulary",
            "content_id"=>1652,
            "items"=>array(
                "0"=>array("type"=>"image","media_filename"=>"images/pencil.png","text"=>"a pencil","isCorrect"=>true),
                "1"=>array("type"=>"image","media_filename"=>"images/pen.png", "text"=>"a pen","isCorrect"=>false),
            ),
            "picture"   => "",
            "clickEvents"=>array(
                "click_1"=>array(
                    "type"=>"score",
                    "score"=>5,
                ),
            ),
            "childEvents"     =>array(

            ),
            "selectEvents"=>array(

            ),
        );

        $data['events'][] = array(
            "num"                => "8",
            'type'               => "choose_right_answer",
            "timeRange"          => "00:12-00:14",
            "text"               => "an eraser",
            "media_filename"     => "media/WG_u1_voc.mp3",
            "media_type"         => 'audio',
            "scores"=>5,
            "key"=>"vocabulary",
            "content_id"=>1653,
            "items"=>array(
                "0"=>array("type"=>"image","media_filename"=>"images/book.png","text"=>"a book","isCorrect"=>false),
                "1"=>array("type"=>"image","media_filename"=>"images/eraser.png", "text"=>"an eraser","isCorrect"=>true),
            ),
            "picture"   => "",
            "clickEvents"=>array(
                "click_1"=>array(
                    "type"=>"score",
                    "score"=>5,
                ),
            ),
            "childEvents"     =>array(

            ),
            "selectEvents"=>array(

            ),
        );

        $data['events'][] = array(
            "num"                => "9",
            'type'               => "choose_right_answer",
            "timeRange"          => "00:14-00:17",
            "text"               => "It's an eraser.",
            "media_filename"     => "media/WG_u1_voc.mp3",
            "media_type"         => 'audio',
            "scores"=>5,
            "key"=>"vocabulary",
            "content_id"=>1654,
            "items"=>array(
                "0"=>array("type"=>"image","media_filename"=>"images/bag.png","text"=>"a bag","isCorrect"=>false),
                "1"=>array("type"=>"image","media_filename"=>"images/eraser.png", "text"=>"an eraser","isCorrect"=>true),
            ),
            "picture"   => "",
            "clickEvents"=>array(
                "click_1"=>array(
                    "type"=>"score",
                    "score"=>5,
                ),
            ),
            "childEvents"     =>array(

            ),
            "selectEvents"=>array(

            ),
        );

        $data['events'][] = array(
            "num"                => "10",
            'type'               => "choose_right_answer",
            "timeRange"          => "00:17-00:19",
            "text"               => "a ruler",
            "media_filename"     => "media/WG_u1_voc.mp3",
            "media_type"         => 'audio',
            "scores"=>5,
            "key"=>"vocabulary",
            "content_id"=>1655,
            "items"=>array(
                "0"=>array("type"=>"image","media_filename"=>"images/ruler.png","text"=>"a ruler","isCorrect"=>true),
                "1"=>array("type"=>"image","media_filename"=>"images/crayon.png", "text"=>"a crayon","isCorrect"=>false),
            ),
            "picture"   => "",
            "clickEvents"=>array(
                "click_1"=>array(
                    "type"=>"score",
                    "score"=>5,
                ),
            ),
            "childEvents"     =>array(

            ),
            "selectEvents"=>array(

            ),
        );

        $data['events'][] = array(
            "num"                => "11",
            'type'               => "choose_right_answer",
            "timeRange"          => "00:19-00:21",
            "text"               => "It's a ruler.",
            "media_filename"     => "media/WG_u1_voc.mp3",
            "media_type"         => 'audio',
            "scores"=>5,
            "key"=>"vocabulary",
            "content_id"=>1656,
            "items"=>array(
                "0"=>array("type"=>"image","media_filename"=>"images/ruler.png","text"=>"a ruler","isCorrect"=>true),
                "1"=>array("type"=>"image","media_filename"=>"images/pen.png", "text"=>"a pen","isCorrect"=>false),
            ),
            "picture"   => "",
            "clickEvents"=>array(
                "click_1"=>array(
                    "type"=>"score",
                    "score"=>5,
                ),
            ),
            "childEvents"     =>array(

            ),
            "selectEvents"=>array(

            ),
        );

        $data['events'][] = array(
            "num"                => "12",
            'type'               => "choose_right_answer",
            "timeRange"          => "00:21-00:23",
            "text"               => "a bag",
            "media_filename"     => "media/WG_u1_voc.mp3",
            "media_type"         => 'audio',
            "scores"=>5,
            "key"=>"vocabulary",
            "content_id"=>1657,
            "items"=>array(
                "0"=>array("type"=>"image","media_filename"=>"images/book.png","text"=>"a book","isCorrect"=>false),
                "1"=>array("type"=>"image","media_filename"=>"images/bag.png", "text"=>"a bag","isCorrect"=>true),
            ),
            "picture"   => "",
            "clickEvents"=>array(
                "click_1"=>array(
                    "type"=>"score",
                    "score"=>5,
                ),
            ),
            "childEvents"     =>array(

            ),
            "selectEvents"=>array(

            ),
        );

        $data['events'][] = array(
            "num"                => "13",
            'type'               => "choose_right_answer",
            "timeRange"          => "00:23-00:25",
            "text"               => "It's a bag.",
            "media_filename"     => "media/WG_u1_voc.mp3",
            "media_type"         => 'audio',
            "scores"=>5,
            "key"=>"vocabulary",
            "content_id"=>1658,
            "items"=>array(
                "0"=>array("type"=>"image","media_filename"=>"images/pencil.png","text"=>"a pencil","isCorrect"=>false),
                "1"=>array("type"=>"image","media_filename"=>"images/bag.png", "text"=>"a bag","isCorrect"=>true),
            ),
            "picture"   => "",
            "clickEvents"=>array(
                "click_1"=>array(
                    "type"=>"score",
                    "score"=>5,
                ),
            ),
            "childEvents"     =>array(

            ),
            "selectEvents"=>array(

            ),
        );

        $data['events'][] = array(
            "num"                => "14",
            'type'               => "choose_right_answer",
            "timeRange"          => "00:25-00:27",
            "text"               => "a crayon",
            "media_filename"     => "media/WG_u1_voc.mp3",
            "media_type"         => 'audio',
            "scores"=>5,
            "key"=>"vocabulary",
            "content_id"=>1659,
            "items"=>array(
                "0"=>array("type"=>"image","media_filename"=>"images/crayon.png","text"=>"a crayon","isCorrect"=>true),
                "1"=>array("type"=>"image","media_filename"=>"images/pen.png", "text"=>"a pen","isCorrect"=>false),
            ),
            "picture"   => "",
            "clickEvents"=>array(
                "click_1"=>array(
                    "type"=>"score",
                    "score"=>5,
                ),
            ),
            "childEvents"     =>array(

            ),
            "selectEvents"=>array(

            ),
        );

        $data['events'][] = array(
            "num"                => "15",
            'type'               => "choose_right_answer",
            "timeRange"          => "00:27-00:29",
            "text"               => "It's a crayon.",
            "media_filename"     => "media/WG_u1_voc.mp3",
            "media_type"         => 'audio',
            "scores"=>5,
            "key"=>"vocabulary",
            "content_id"=>1660,
            "items"=>array(
                "0"=>array("type"=>"image","media_filename"=>"images/crayon.png","text"=>"a crayon","isCorrect"=>true),
                "1"=>array("type"=>"image","media_filename"=>"images/pencil.png", "text"=>"a pencil","isCorrect"=>false),
            ),
            "picture"   => "",
            "clickEvents"=>array(
                "click_1"=>array(
                    "type"=>"score",
                    "score"=>5,
                ),
            ),
            "childEvents"     =>array(

            ),
            "selectEvents"=>array(

            ),
        );

        $data['events'][] = array(
            "num"                => "16",
            'type'               => "choose_right_answer",
            "timeRange"          => "00:29-00:31",
            "text"               => "a pencil case",
            "media_filename"     => "media/WG_u1_voc.mp3",
            "media_type"         => 'audio',
            "scores"=>5,
            "key"=>"vocabulary",
            "content_id"=>1661,
            "items"=>array(
                "0"=>array("type"=>"image","media_filename"=>"images/pen.png","text"=>"a pen","isCorrect"=>false),
                "1"=>array("type"=>"image","media_filename"=>"images/pencil_case.png", "text"=>"a pencil case","isCorrect"=>true),
            ),
            "picture"   => "",
            "clickEvents"=>array(
                "click_1"=>array(
                    "type"=>"score",
                    "score"=>5,
                ),
            ),
            "childEvents"     =>array(

            ),
            "selectEvents"=>array(

            ),
        );

        $data['events'][] = array(
            "num"                => "17",
            'type'               => "choose_right_answer",
            "timeRange"          => "00:31-00:34",
            "text"               => "It's a pencil case.",
            "media_filename"     => "media/WG_u1_voc.mp3",
            "media_type"         => 'audio',
            "scores"=>5,
            "key"=>"vocabulary",
            "content_id"=>1662,
            "items"=>array(
                "0"=>array("type"=>"image","media_filename"=>"images/bag.png","text"=>"a bag","isCorrect"=>false),
                "1"=>array("type"=>"image","media_filename"=>"images/pencil_case.png", "text"=>"a pencil case","isCorrect"=>true),
            ),
            "picture"   => "",
            "clickEvents"=>array(
                "click_1"=>array(
                    "type"=>"score",
                    "score"=>5,
                ),
            ),
            "childEvents"     =>array(

            ),
            "selectEvents"=>array(

            ),
        );


        $data['events'][] = array(
            "num"                => "2",
            'type'               => "question_and_answer_sr",
            "timeRange"          => "00:00-00:03",
            "text"              => "What's this?",
            "media_filename"    => 'media/WG_u1_grammar_p1.mp3',
            "media_type"        => 'audio',
            "scores"=>5,
            "key"=>"passage_sr",
            "content_id"=>1663,
            "answers"=>array(
                "0"=>array("type"=>"text","text"=>"it is a book","isCorrect"=>true), //对应答案
                "1"=>array("type"=>"text","text"=>"it's a book", "isCorrect"=>true), //对应答案
            ),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"sr" //语音识别
                )
            ),
            "selectEvents"=>array(
            ),
            "clickEvents"=>array(
                "click_1"=>array(
                    "type"=>"score",
                    "score"=>5,
                )
            ),
            "picture"   => "images/book.png",
        );

        $data['events'][] = array(
            "num"                => "3",
            'type'               => "question_and_answer_sr",
            "timeRange"          => "00:00-00:03",
            "text"              => "What's this?",
            "media_filename"    => 'media/WG_u1_grammar_p1.mp3',
            "media_type"        => 'audio',
            "scores"=>5,
            "key"=>"passage_sr",
            "content_id"=>1664,
            "answers"=>array(
                "0"=>array("type"=>"text","text"=>"It is a pencil case.","isCorrect"=>true), //对应答案
                "1"=>array("type"=>"text","text"=>"It's a pencil case.", "isCorrect"=>true), //对应答案
            ),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"sr" //语音识别
                )
            ),
            "selectEvents"=>array(
            ),
            "clickEvents"=>array(
                "click_1"=>array(
                    "type"=>"score",
                    "score"=>5,
                )
            ),
            "picture"   => "images/pencil_case.png",
        );

        $data['events'][] = array(
            "num"                => "4",
            'type'               => "question_and_answer_sr",
            "timeRange"          => "00:00-00:03",
            "text"              => "What's this?",
            "media_filename"    => 'media/WG_u1_grammar_p1.mp3',
            "media_type"        => 'audio',
            "scores"=>5,
            "key"=>"passage_sr",
            "content_id"=>1664,
            "answers"=>array(
                "0"=>array("type"=>"text","text"=>"It is a pencil.","isCorrect"=>true), //对应答案
                "1"=>array("type"=>"text","text"=>"It's a pencil.", "isCorrect"=>true), //对应答案
            ),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"sr" //语音识别
                )
            ),
            "selectEvents"=>array(
            ),
            "clickEvents"=>array(
                "click_1"=>array(
                    "type"=>"score",
                    "score"=>5,
                )
            ),
            "picture"   => "images/pencil.png",
        );


        $data['events'][] = array(
            "num"                => "5",
            'type'               => "question_and_answer_sr",
            "timeRange"          => "00:00-00:03",
            "text"              => "What's this?",
            "media_filename"    => 'media/WG_u1_grammar_p1.mp3',
            "media_type"        => 'audio',
            "scores"=>5,
            "key"=>"passage_sr",
            "content_id"=>1665,
            "answers"=>array(
                "0"=>array("type"=>"text","text"=>"It is a bag.","isCorrect"=>true), //对应答案
                "1"=>array("type"=>"text","text"=>"It's a bag.", "isCorrect"=>true), //对应答案
            ),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"sr" //语音识别
                )
            ),
            "selectEvents"=>array(
            ),
            "clickEvents"=>array(
                "click_1"=>array(
                    "type"=>"score",
                    "score"=>5,
                )
            ),
            "picture"   => "images/bag.png",
        );

        $data['events'][] = array(
            "num"                => "6",
            'type'               => "question_and_answer_sr",
            "timeRange"          => "00:00-00:03",
            "text"              => "What's this?",
            "media_filename"    => 'media/WG_u1_grammar_p1.mp3',
            "media_type"        => 'audio',
            "scores"=>5,
            "key"=>"passage_sr",
            "content_id"=>1666,
            "answers"=>array(
                "0"=>array("type"=>"text","text"=>"It is an eraser.","isCorrect"=>true), //对应答案
                "1"=>array("type"=>"text","text"=>"It's an eraser.", "isCorrect"=>true), //对应答案
            ),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"sr" //语音识别
                )
            ),
            "selectEvents"=>array(
            ),
            "clickEvents"=>array(
                "click_1"=>array(
                    "type"=>"score",
                    "score"=>10,
                )
            ),
            "picture"   => "images/eraser.png",
        );

        $data['events'][] = array(
            "num"                => "7",
            'type'               => "question_and_answer_sr",
            "timeRange"          => "00:00-00:03",
            "text"              => "What's this?",
            "media_filename"    => 'media/WG_u1_grammar_p1.mp3',
            "media_type"        => 'audio',
            "scores"=>5,
            "key"=>"passage_sr",
            "content_id"=>1667,
            "answers"=>array(
                "0"=>array("type"=>"text","text"=>"It is a crayon.","isCorrect"=>true), //对应答案
                "1"=>array("type"=>"text","text"=>"It's a crayon.", "isCorrect"=>true), //对应答案
            ),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"sr" //语音识别
                )
            ),
            "selectEvents"=>array(
            ),
            "clickEvents"=>array(
                "click_1"=>array(
                    "type"=>"score",
                    "score"=>5,
                )
            ),
            "picture"   => "images/crayon.png",
        );

        $data['events'][] = array(
            "num"                => "8",
            'type'               => "question_and_answer_sr",
            "timeRange"          => "00:00-00:03",
            "text"              => "What's this?",
            "media_filename"    => 'media/WG_u1_grammar_p1.mp3',
            "media_type"        => 'audio',
            "scores"=>5,
            "key"=>"passage_sr",
            "content_id"=>1668,
            "answers"=>array(
                "0"=>array("type"=>"text","text"=>"It is a pen.","isCorrect"=>true), //对应答案
                "1"=>array("type"=>"text","text"=>"It's a pen.", "isCorrect"=>true), //对应答案
            ),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"sr" //语音识别
                )
            ),
            "selectEvents"=>array(
            ),
            "clickEvents"=>array(
                "click_1"=>array(
                    "type"=>"score",
                    "score"=>5,
                )
            ),
            "picture"   => "images/pen.png",
        );

        $data['events'][] = array(
            "num"                => "9",
            'type'               => "question_and_answer_sr",
            "timeRange"          => "00:00-00:03",
            "text"              => "What's this?",
            "media_filename"    => 'media/WG_u1_grammar_p1.mp3',
            "media_type"        => 'audio',
            "scores"=>5,
            "key"=>"passage_sr",
            "content_id"=>1669,
            "answers"=>array(
                "0"=>array("type"=>"text","text"=>"It is a ruler.","isCorrect"=>true), //对应答案
                "1"=>array("type"=>"text","text"=>"It's a ruler.", "isCorrect"=>true), //对应答案
            ),
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"sr" //语音识别
                )
            ),
            "selectEvents"=>array(
            ),
            "clickEvents"=>array(
                "click_1"=>array(
                    "type"=>"score",
                    "score"=>5,
                )
            ),
            "picture"   => "images/ruler.png",
        );


        $data['events'][] = array(
            "num"               => "3",
            'type'              => "sentence_repetition",
            "timeRange"         => "00:06:00-00:08:170",
            "text"              => "What's this?",
            "media_filename"    => 'media/WG_u1_passage.mp4',
            "media_type"        => 'video',
            "picture"           => "",
            "pictures"          => array(),
            "scores"=>5,
            "key"=>"passage_re",
            "content_id"=>1670,
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"sr" //语音识别
                )
            ),
            "clickEvents"       =>array(
            ),
            "selectEvents"=>array(
            ),
        );

        $data['events'][] = array(
            "num"               => "4",
            'type'              => "sentence_repetition",
            "timeRange"         => "00:08:949-00:10:647",
            "text"              => "It's a book.",
            "media_filename"    => 'media/WG_u1_passage.mp4',
            "media_type"        => 'video',
            "picture"           => "",
            "pictures"          => array(),
            "scores"=>5,
            "key"=>"passage_re",
            "content_id"=>1671,
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"sr" //语音识别
                )
            ),
            "clickEvents"       =>array(
            ),
            "selectEvents"=>array(
            ),
        );

        $data['events'][] = array(
            "num"               => "5",
            'type'              => "sentence_repetition",
            "timeRange"         => "00:12:024-00:14:749",
            "text"              => "It's a pencil case.",
            "media_filename"    => 'media/WG_u1_passage.mp4',
            "media_type"        => 'video',
            "picture"           => "",
            "pictures"          => array(),
            "scores"=>5,
            "key"=>"passage_re",
            "content_id"=>1672,
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"sr" //语音识别
                )
            ),
            "clickEvents"       =>array(
            ),
            "selectEvents"=>array(
            ),
        );

        $data['events'][] = array(
            "num"               => "6",
            'type'              => "sentence_repetition",
            "timeRange"         => "00:15:733-00:17:715",
            "text"              => "It's a pencil.",
            "media_filename"    => 'media/WG_u1_passage.mp4',
            "media_type"        => 'video',
            "picture"           => "",
            "pictures"          => array(),
            "scores"=>5,
            "key"=>"passage_re",
            "content_id"=>1673,
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"sr" //语音识别
                )
            ),
            "clickEvents"       =>array(
            ),
            "selectEvents"=>array(
            ),
        );

        $data['events'][] = array(
            "num"               => "7",
            'type'              => "sentence_repetition",
            "timeRange"         => "00:19:224-00:21:168",
            "text"              => "What's this?",
            "media_filename"    => 'media/WG_u1_passage.mp4',
            "media_type"        => 'video',
            "picture"           => "",
            "pictures"          => array(),
            "scores"=>5,
            "key"=>"passage_re",
            "content_id"=>1674,
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"sr" //语音识别
                )
            ),
            "clickEvents"       =>array(
            ),
            "selectEvents"=>array(
            ),
        );

        $data['events'][] = array(
            "num"               => "8",
            'type'              => "sentence_repetition",
            "timeRange"         => "00:21:992-00:25:508",
            "text"              => "Wow, it's a bag.",
            "media_filename"    => 'media/WG_u1_passage.mp4',
            "media_type"        => 'video',
            "picture"           => "",
            "pictures"          => array(),
            "scores"=>5,
            "key"=>"passage_re",
            "content_id"=>1675,
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"sr" //语音识别
                )
            ),
            "clickEvents"       =>array(
            ),
            "selectEvents"=>array(
            ),
        );

        $data['events'][] = array(
            "num"               => "9",
            'type'              => "sentence_repetition",
            "timeRange"         => "00:26:169-00:29:168",
            "text"              => "What's this?",
            "media_filename"    => 'media/WG_u1_passage.mp4',
            "media_type"        => 'video',
            "picture"           => "",
            "pictures"          => array(),
            "scores"=>5,
            "key"=>"passage_re",
            "content_id"=>1676,
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"sr" //语音识别
                )
            ),
            "clickEvents"       =>array(
            ),
            "selectEvents"=>array(
            ),
        );

        $data['events'][] = array(
            "num"               => "10",
            'type'              => "sentence_repetition",
            "timeRange"         => "00:29:733-00:31:574",
            "text"              => "It's an eraser.",
            "media_filename"    => 'media/WG_u1_passage.mp4',
            "media_type"        => 'video',
            "picture"           => "",
            "pictures"          => array(),
            "scores"=>5,
            "key"=>"passage_re",
            "content_id"=>1677,
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"sr" //语音识别
                )
            ),
            "clickEvents"       =>array(
            ),
            "selectEvents"=>array(
            ),
        );

        $data['events'][] = array(
            "num"               => "11",
            'type'              => "sentence_repetition",
            "timeRange"         => "00:32:405-00:36:051",
            "text"              => "Look, it's a crayon.",
            "media_filename"    => 'media/WG_u1_passage.mp4',
            "media_type"        => 'video',
            "picture"           => "",
            "pictures"          => array(),
            "scores"=>5,
            "key"=>"passage_re",
            "content_id"=>1678,
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"sr" //语音识别
                )
            ),
            "clickEvents"       =>array(
            ),
            "selectEvents"=>array(
            ),
        );

        $data['events'][] = array(
            "num"               => "12",
            'type'              => "sentence_repetition",
            "timeRange"         => "00:36:855-00:41:017",
            "text"              => "It's a pen and it's a ruler.",
            "media_filename"    => 'media/WG_u1_passage.mp4',
            "media_type"        => 'video',
            "picture"           => "",
            "pictures"          => array(),
            "scores"=>5,
            "key"=>"passage_re",
            "content_id"=>1679,
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"sr" //语音识别
                )
            ),
            "clickEvents"       =>array(
            ),
            "selectEvents"=>array(
            ),
        );

        $data['events'][] = array(
            "num"               => "13",
            'type'              => "sentence_repetition",
            "timeRange"         => "00:42:235-00:44:108",
            "text"              => "Bye-bye.",
            "media_filename"    => 'media/WG_u1_passage.mp4',
            "media_type"        => 'video',
            "picture"           => "",
            "pictures"          => array(),
            "scores"=>5,
            "key"=>"passage_re",
            "content_id"=>1680,
            "childEvents"     =>array(
                "0"=>array(
                    "type"=>"sr" //语音识别
                )
            ),
            "clickEvents"       =>array(
            ),
            "selectEvents"=>array(
            ),
        );



        $data['events'][] = array(
            "num"=>"2",
            "scores"=>5,
            "key"=>"grammar",
            "content_id"=>1681,
            "type"=>"choose_correct_answer",
            "media_type"=>"image",
            "timeRange"=> "",
            "media_filename"=>'images/pen.png',
            "text"=>array(),
            "items"=>array(
                "0"=>array("item"=>"It's a pen.","isCorrect"=>true),
                "1"=>array("item"=>"It's a book.", "isCorrect"=>false),
                "2"=>array("item"=>"It's an eraser.", "isCorrect"=>false),
            ),
            "clickEvents"=>array(
                "click_1"=>array(
                    "type"=>"score",
                    "score"=>5,
                )
            ),
            "selectEvents"=>array(

            ),
            "picture"   => "images/pen.png",
        );

        $data['events'][] = array(
            "num"=>"3",
            "scores"=>5,
            "key"=>"grammar",
            "content_id"=>1682,
            "type"=>"choose_correct_answer",
            "media_type"=>"image",
            "timeRange"=> "",
            "media_filename"=>'images/book.png',
            "text"=>array(),
            "items"=>array(
                "0"=>array("item"=>"It's a pen.","isCorrect"=>false),
                "1"=>array("item"=>"It's a book.", "isCorrect"=>true),
                "2"=>array("item"=>"It's an eraser.", "isCorrect"=>false),
            ),
            "clickEvents"=>array(
                "click_1"=>array(
                    "type"=>"score",
                    "score"=>5,
                ),
            ),
            "selectEvents"=>array(
            ),
            "picture"   => "images/book.png",
        );

        $data['events'][] = array(
            "num"=>"4",
            "scores"=>5,
            "key"=>"grammar",
            "content_id"=>1683,
            "type"=>"choose_correct_answer",
            "media_type"=>"image",
            "timeRange"=> "",
            "media_filename"=>'images/eraser.png',
            "text"=>array(),
            "items"=>array(
                "0"=>array("item"=>"It's a pen.","isCorrect"=>false),
                "1"=>array("item"=>"It's a book.", "isCorrect"=>false),
                "2"=>array("item"=>"It's an eraser.", "isCorrect"=>true),
            ),
            "clickEvents"=>array(
                "click_1"=>array(
                    "type"=>"score",
                    "score"=>5,
                )
            ),
            "selectEvents"=>array(
            ),
            "picture"   => "images/eraser.png",
        );


        $data['events'][] = array(
            "num"=>"5",
            "scores"=>5,
            "key"=>"grammar",
            "content_id"=>1684,
            "type"=>"choose_correct_answer",
            "media_type"=>"image",
            "timeRange"=> "",
            "media_filename"=>'images/pencil.png',
            "text"=>array(),
            "items"=>array(
                "0"=>array("item"=>"It's a pencil.","isCorrect"=>true),
                "1"=>array("item"=>"It's a crayon.", "isCorrect"=>false),
                "2"=>array("item"=>"It's a pencil case.", "isCorrect"=>false),
            ),
            "clickEvents"=>array(
                "click_1"=>array(
                    "type"=>"score",
                    "score"=>5,
                )
            ),
            "selectEvents"=>array(
            ),
            "picture"   => "images/pencil.png",
        );


        $data['events'][] = array(
            "num"=>"6",
            "scores"=>5,
            "key"=>"grammar",
            "content_id"=>1685,
            "type"=>"choose_correct_answer",
            "media_type"=>"image",
            "timeRange"=> "",
            "media_filename"=>'images/crayon.png',
            "text"=>array(),
            "items"=>array(
                "0"=>array("item"=>"It's a pencil.","isCorrect"=>false),
                "1"=>array("item"=>"It's a crayon.", "isCorrect"=>true),
                "2"=>array("item"=>"It's a pencil case.", "isCorrect"=>false),
            ),
            "clickEvents"=>array(
                "click_1"=>array(
                    "type"=>"score",
                    "score"=>5,
                )
            ),
            "selectEvents"=>array(
            ),
            "picture"   => "images/crayon.png",
        );

        $data['events'][] = array(
            "num"=>"7",
            "scores"=>5,
            "key"=>"grammar",
            "content_id"=>1686,
            "type"=>"choose_correct_answer",
            "media_type"=>"image",
            "timeRange"=> "",
            "media_filename"=>'images/pencil_case.png',
            "text"=>array(),
            "items"=>array(
                "0"=>array("item"=>"It's a pencil.","isCorrect"=>false),
                "1"=>array("item"=>"It's a crayon.", "isCorrect"=>false),
                "2"=>array("item"=>"It's a pencil case.", "isCorrect"=>true),
            ),
            "clickEvents"=>array(
                "click_1"=>array(
                    "type"=>"score",
                    "score"=>5,
                )
            ),
            "selectEvents"=>array(

            ),
            "picture"   => "images/pencil_case.png",
        );

        $data['events'][] = array(
            "num"=>"8",
            "scores"=>5,
            "key"=>"grammar",
            "content_id"=>1687,
            "type"=>"choose_correct_answer",
            "media_type"=>"image",
            "timeRange"=> "",
            "media_filename"=>'images/crayon.png',
            "text"=>array(),
            "items"=>array(
                "0"=>array("item"=>"It's a pencil case.","isCorrect"=>false),
                "1"=>array("item"=>"It's a bag.", "isCorrect"=>true),
                "2"=>array("item"=>"It's a ruler.", "isCorrect"=>false),
            ),
            "clickEvents"=>array(
                "click_1"=>array(
                    "type"=>"score",
                    "score"=>5,
                )
            ),
            "selectEvents"=>array(

            ),
            "picture"   => "images/crayon.png",
        );

        $data['events'][] = array(
            "num"=>"9",
            "scores"=>5,
            "key"=>"grammar",
            "content_id"=>1688,
            "type"=>"choose_correct_answer",
            "media_type"=>"image",
            "timeRange"=> "",
            "media_filename"=>'images/crayon.png',
            "text"=>array(),
            "items"=>array(
                "0"=>array("item"=>"It's a pencil case.","isCorrect"=>false),
                "1"=>array("item"=>"It's a bag.", "isCorrect"=>false),
                "2"=>array("item"=>"It's a ruler.", "isCorrect"=>true),
            ),
            "clickEvents"=>array(
                "click_1"=>array(
                    "type"=>"score",
                    "score"=>5,
                )
            ),
            "selectEvents"=>array(
            ),
            "picture"   => "images/crayon.png",
        );




        $data['events'][] = array(
            "num"=>"2",
            "scores"=>5,
            "key"=>"phonics",
            "content_id"=>1689,
            "type"=>"choose_right_letter",
            "media_type"=>"audio",
            "timeRange"=> "00:26-00:28",
            "media_filename"=>'media/WG_u1_phonics.mp3',
            "text"=>" _ pple",
            "items"=>array(
                "0"=>array("item"=>"a","isCorrect"=>true),
                "1"=>array("item"=>"b", "isCorrect"=>false),
                "2"=>array("item"=>"c", "isCorrect"=>false),
            ),
            "clickEvents"=>array(
                "click_1"=>array(
                    "type"=>"score",
                    "score"=>5,
                )
            ),
            "selectEvents"=>array(

            ),
            "picture"=>"images/apple.png"
        );

        $data['events'][] = array(
            "num"=>"3",
            "scores"=>5,
            "key"=>"phonics",
            "content_id"=>1690,
            "type"=>"choose_right_letter",
            "media_type"=>"audio",
            "timeRange"=> "00:28-00:30",
            "media_filename"=>'media/WG_u1_phonics.mp3',
            "text"=>" _ nt",
            "items"=>array(
                "0"=>array("item"=>"a","isCorrect"=>true),
                "1"=>array("item"=>"b", "isCorrect"=>false),
                "2"=>array("item"=>"c", "isCorrect"=>false),
            ),
            "clickEvents"=>array(
                "click_1"=>array(
                    "type"=>"score",
                    "score"=>5,
                )
            ),
            "selectEvents"=>array(

            ),
            "picture"=>"images/ant.png"
        );

        $data['events'][] = array(
            "num"=>"4",
            "scores"=>5,
            "key"=>"phonics",
            "content_id"=>1691,
            "type"=>"choose_right_letter",
            "media_type"=>"audio",
            "timeRange"=> "00:31-00:33",
            "media_filename"=>'media/WG_u1_phonics.mp3',
            "text"=>" _ ag",
            "items"=>array(
                "0"=>array("item"=>"a","isCorrect"=>false),
                "1"=>array("item"=>"b", "isCorrect"=>true),
                "2"=>array("item"=>"c", "isCorrect"=>false),
            ),
            "clickEvents"=>array(
                "click_1"=>array(
                    "type"=>"score",
                    "score"=>5,
                )
            ),
            "selectEvents"=>array(

            ),
            "picture"=>"images/bag.png"
        );

        $data['events'][] = array(
            "num"=>"5",
            "scores"=>5,
            "key"=>"phonics",
            "content_id"=>1692,
            "type"=>"choose_right_letter",
            "media_type"=>"audio",
            "timeRange"=> "00:33-00:35",
            "media_filename"=>'media/WG_u1_phonics.mp3',
            "text"=>" _ ook",
            "items"=>array(
                "0"=>array("item"=>"a","isCorrect"=>false),
                "1"=>array("item"=>"b", "isCorrect"=>true),
                "2"=>array("item"=>"c", "isCorrect"=>false),
            ),
            "clickEvents"=>array(
                "click_1"=>array(
                    "type"=>"score",
                    "score"=>5,
                )
            ),
            "selectEvents"=>array(

            ),
            "picture"=>"images/book.png"
        );

        $data['events'][] = array(
            "num"=>"6",
            "scores"=>5,
            "key"=>"phonics",
            "content_id"=>1693,
            "type"=>"choose_right_letter",
            "media_type"=>"audio",
            "timeRange"=> "00:36-00:38",
            "media_filename"=>'media/WG_u1_phonics.mp3',
            "text"=>" _ at",
            "items"=>array(
                "0"=>array("item"=>"a","isCorrect"=>false),
                "1"=>array("item"=>"b", "isCorrect"=>false),
                "2"=>array("item"=>"c", "isCorrect"=>true),
            ),
            "clickEvents"=>array(
                "click_1"=>array(
                    "type"=>"score",
                    "score"=>5,
                )
            ),
            "selectEvents"=>array(

            ),
            "picture"=>"images/cat.png"
        );

        $data['events'][] = array(
            "num"=>"7",
            "scores"=>5,
            "key"=>"phonics",
            "content_id"=>1694,
            "type"=>"choose_right_letter",
            "media_type"=>"audio",
            "timeRange"=> "00:36-00:38",
            "media_filename"=>'media/WG_u1_phonics.mp3',
            "text"=>" _ ake",
            "items"=>array(
                "0"=>array("item"=>"a","isCorrect"=>false),
                "1"=>array("item"=>"b", "isCorrect"=>false),
                "2"=>array("item"=>"c", "isCorrect"=>true),
            ),
            "clickEvents"=>array(
                "click_1"=>array(
                    "type"=>"score",
                    "score"=>5,
                )
            ),
            "selectEvents"=>array(

            ),
            "picture"=>"images/cake.png"
        );

//        $data['events'][] = array(
//            "num"=>"8",
//            "content_id"=>897,
//            "type"=>"choose_correct_answer",
//            "media_type"=>"image",
//            "timeRange"=> "",
//            "media_filename"=>'images/Miss_V.png',
//            "text"=>array(),
//            "scores"=>7,
//            "items"=>array(
//                "0"=>array("item"=>"At the tourism school.","isCorrect"=>true),
//                "1"=>array("item"=>"At the engineering school.", "isCorrect"=>false),
//                "2"=>array("item"=>"At the management school.", "isCorrect"=>false),
//            ),
//            "clickEvents"=>array(
//                "click_1"=>array(
//                    "type"=>"score",
//                    "score"=>10,
//                ),
//                "click_2"=>array(
//                    "type"=>"score",
//                    "score"=>5,
//                ),
//            ),
//            "selectEvents"=>array(
//                "Yes"=>array(
//                    "timeRange"          => "00:00-00:09",
//                    "media_filename"           =>"media/Miss_V.mp3",
//                    "media_type"         => 'audio',
//                    "text"=>"The gym is right in the north part of the campus. Let's go and see it. ",
//                ),
//                "No"=>array(
//                    "timeRange"          => "00:00-00:09",
//                    "media_filename"           =>"media/Miss_V.mp3",
//                    "media_type"         => 'audio',
//                    "text"=>"The gym is right in the north part of the campus. Let's go and see it. ",
//                ),
//            ),
//            "picture"   => "images/Miss_V.png",
//        );
        $a = json_encode($data);
        $fp = fopen('json204.txt', "w");
        fwrite($fp, $a);
        fclose($fp);
        return;
    }

    public function createJson(){
        for($i=179;$i<=205;$i++){
            $function = "getPart".$i;
            $this->$function();
        }
    }
}