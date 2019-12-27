
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(E_ALL^E_NOTICE^E_WARNING);
define("CONTROLLERPATH",API_ROOT_PATH.'ueditor/');
class Ueditorcontroller extends CI_Controller {




    function __construct(){
        parent::__construct();
        $this->load->model('article');
        $this->load->model('category');
        if(!getAdminViewer()->id){
            redirect('login');
        }else{
//            $permissions = getAdminViewer()->getUserRolePermission();
//            $permission_urls = array();
//            foreach($permissions as $permission){
//                $permission_urls[] = $permission->url;
//            }
//            if(!in_array("/contents/",$permission_urls)){
//                redirect('error');
//            }
        }
    }

    public function index(){
       // $this->load->view('wePlatForm/contents');
    }

    public function upload(){
        $CONFIG = json_decode(preg_replace("/\/\*[\s\S]+?\*\//", "", file_get_contents(CONTROLLERPATH.'config.json')), true);

        $action = $_GET['action'];
        switch ($action) {
            case 'config':
                $result =  json_encode($CONFIG);
                break;

            /* 上传图片 */
            case 'uploadimage':
                /* 上传涂鸦 */
            case 'uploadscrawl':
                /* 上传视频 */
            case 'uploadvideo':
                /* 上传文件 */
            case 'uploadfile':
                $result = include(CONTROLLERPATH."action_upload.php");
                break;

            /* 列出图片 */
            case 'listimage':
                $result = include(CONTROLLERPATH."action_list.php");
                break;
            /* 列出文件 */
            case 'listfile':
                $result = include(CONTROLLERPATH."action_list.php");
                break;

            /* 抓取远程文件 */
            case 'catchimage':
                $result = include(CONTROLLERPATH."action_crawler.php");
                break;

            default:
                $result = json_encode(array(
                    'state'=> '请求地址出错'
                ));
                break;
        }

        /* 输出结果 */
        if (isset($_GET["callback"])) {
            if (preg_match("/^[\w_]+$/", $_GET["callback"])) {
                echo htmlspecialchars($_GET["callback"]) . '(' . $result . ')';
            } else {
                echo json_encode(array(
                    'state'=> 'callback参数不合法'
                ));
            }
        } else {
            echo $result;
        }
    }

}
