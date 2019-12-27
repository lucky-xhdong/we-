<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Show extends CI_Controller {

	function __construct(){
	   parent::__construct();
       $this->load->model('category') ;
        $this->load->model('article') ;

    }


//    public function index($id=0)
//    {
//        $this->load->view('articleDetail');
//    }

	public function index($id=0)
    {
//        $data['menu_categorys'] = $this->category->getCategoryList();
        $data['article']        = $this->article->getarticleDetail((int)$id);
        $data['hot_articles'] = $this->category->getHotArticles();
        if($data['article']){
            $data['category'] = $this->category->getCategory($data['article']->catid);
            $this->load->view('articleDetail',$data);
        }else{
            show_404();
        }
//        $data['category_bar'] = $this->category->getCategory( $data['article']->catid);
//        $data['hot_articles'] = $this->category->getHotArticles();
//        $data['formbuild']             = $this->article->getARticleForm();
	}


    public function about_us()
    {
        $id = 211;
        $data['article']        = $this->article->getarticleDetail((int)$id);
        $data['hot_articles'] = $this->category->getHotArticles();
        if($data['article']){
            $data['category'] = $this->category->getCategory($data['article']->catid);
            $this->load->view('wePlatForm/articleDetail',$data);
        }else{
            show_404();
        }
    }

    public function contact_us()
    {
        $id = 212;
        $data['article']        = $this->article->getarticleDetail((int)$id);
        $data['hot_articles'] = $this->category->getHotArticles();
        if($data['article']){
            $data['category'] = $this->category->getCategory($data['article']->catid);
            $this->load->view('wePlatForm/articleDetail',$data);
        }else{
            show_404();
        }
    }

    public function privacy_policy()
    {
        $id = 213;
        $data['article']        = $this->article->getarticleDetail((int)$id);
        $data['hot_articles'] = $this->category->getHotArticles();
        if($data['article']){
            $data['category'] = $this->category->getCategory($data['article']->catid);
            $this->load->view('wePlatForm/articleDetail',$data);
        }else{
            show_404();
        }
    }




    public function download($id){
        $content = $this->db->select('*')->where('id',$id)->get('content')->row();
        if($content){
            $this->load->helper('download');
            $data = file_get_contents(FILEPATH.'assets/files/'.$content->fileurl);
            $name = $content->fileurl;
            force_download($name, $data);
        }else{
            //redirect('userbasicsetting/dbmanage');
            redirect('show/index/'.$id);
        }

    }

    public function form($id){
        $data['menu_categorys'] = $this->category->getCategoryList();
        $data['article']        = $this->article->getarticleDetail($id);
        $data['category_bar'] = $this->category->getCategory( $data['article']->catid);
        $data['hot_articles'] = $this->category->getHotArticles();
        $data['formbuild']         = $this->article->getARticleForm();
        $this->load->view('wePlatForm/articlerom',$data);
    }

    public function submitform($article_id){
        $post = $this->input->post();
        $data = array(
            'remote_addr'=>$_SERVER['REMOTE_ADDR'],
            'create_time'=> date('Y-m-d H:i:s'),
            'article_id' => $article_id,
            'metadata'   => $post['meta_ideatree'],
            'title'      => $post['title'],
        );
        $this->db->insert('submitform',$data);
        $this->sendEmail($post['title'],$post['meta_ideatree']);
       // redirect('show/form/'.$article_id);
    }

    public function sendEmail($title,$metadata){
        $metadata = json_decode($metadata);
        $string = "";
        $tables = array();
        foreach($metadata as $data){
            if($data->field_type == "text" || $data->field_type == "paragraph" || $data->field_type == 'email' ||$data->field_type == 'dropdown' || $data->field_type == "date"){
                $string .= $data->label.' : '. $data->value.'<br />';
                $tables[$data->label] = $data->value;
            }else if($data->field_type == 'checkboxes'){
                $checkstring = "";
                foreach($data->field_options->options as $option){
                    if($option->checked){
                        $checkstring .= $option->label.'&nbsp;&nbsp;';
                    }
                }
                $string .= $data->label.' : '. $checkstring.'<br />';
                $tables[$data->label] = $checkstring;
            } else if($data->field_type == 'radio'){
                $checkstring = "";
                foreach($data->field_options->options as $option){
                    if($option->checked){
                        $checkstring .= $option->label.'&nbsp;&nbsp;';
                    }
                }
                $string .= $data->label.' : '. $checkstring.'<br />';
                $tables[$data->label] = $checkstring;
            }
            else if($data->field_type == 'number'){
                $string .= $data->label.' : '. $data->value.' '.$data->field_options->units.'<br />';
                $tables[$data->label] =  $data->value.' '.$data->field_options->units;
            }

        }
        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'smtp.163.com',
            'smtp_port' => 25,
            'smtp_user' => 'ipregnant2014@163.com',
            'smtp_pass' => 'ipregnant!2014'
        );
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->mailtype='html';
        $this->email->from('ipregnant2014@163.com', 'Administrator');
        $this->email->to("125601510@qq.com");
        $this->email->subject('表单提交结果汇总');
        $returnstring = '<table class="table" style="width: 100%; max-width: 100%; border-spacing: 0; border-collapse: collapse; border: 1px solid #ddd; font: 14px  Helvetica, Microsoft Yahei, Hiragino Sans GB, WenQuanYi Micro Hei, sans-serif;">';
        $returnstring .= '<thead><tr>';
        foreach(array_keys($tables) as $head){
            $returnstring .= '<th style="border-bottom: 2px solid #ddd; font-weight: bold; text-align: left;vertical-align: bottom; padding: 8px;">'.$head.'</th>';
        }
        $returnstring .= '</tr></thead><tbody><tr>';
        foreach(array_values($tables) as $val){
            $returnstring .= '<td style="padding: 8px; border-bottom: 1px solid #ddd;">'.$val.'</td>';
        }
        $returnstring .= '</tr></tbody></table>';
        $message = "您好 !<br /> 您的表单{$title} 提交结果 <br>"
                   . " ".$returnstring
                    ;

        $this->email->message($message);
        if($this->email->send())
        {
            return true;
        }
        else
        {
            return $this->email->print_debugger();
        }
    }
}
