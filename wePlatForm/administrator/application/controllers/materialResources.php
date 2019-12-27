<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MaterialResources extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('materialresource');

        if(!getAdminViewer()->id){
            redirect('login');
        }else{
            $permissions = getAdminViewer()->getUserRolePermission();
            $permission_urls = array();
            foreach($permissions as $permission){
                $permission_urls[] = $permission->url;
            }
            if(!in_array("/materialResources/",$permission_urls)){
               // redirect('error');
            }
        }
    }

    public function index(){
        $data['types'] = $this->materialresource->getResourceTypeList();
        $data['regions'] = $this->materialresource->getRegionList();
        $data['schools'] = $this->materialresource->getSchoolList();

        $this->load->view('wePlatForm/materialResourcesview',$data);
    }

    public function getSchoolList($region_id=0) {
        $schools = $this->materialresource->getSchoolList($region_id);
        echo json_encode($schools);
    }

    public function addResource(){
        $post = $this->input->post();
        if ($post['resource_type_id'] == 0) {
            echo json_encode($this->returncode);
            return;
        }
        if(isset($post['id']) && $post['id'] != 0){
            $resource = $this->materialresource->getResource($post['id']);
            unset($post['id']);
            unset($post['file']);
            if (!isset($post['school_id'])) {
                $post['school_id'] = 0;
            }
            $resource->uploadpicture();
            $resource->updateKey($post);
        }else{
            unset($post['id']);
            unset($post['file']);
            $id = $this->materialresource->saveResource($post);
            if($id != 0)  {
                $resource = $this->materialresource->getResource($id);
                $resource->uploadpicture();
            }
        }
        echo json_encode($this->returncode);
    }

    public function getResourceInfo($resource_id){

        $resource = $this->materialresource->getResource($resource_id);

        $data['resource'] = $resource;
        $data['types'] = $this->materialresource->getResourceTypeList();
        $data['regions'] = $this->materialresource->getRegionList();
        $data['schools'] = $this->materialresource->getSchoolList($resource->region_id);

        $this->load->view('wePlatForm/tmpl/resourceBasicEdit',$data);
    }

    public function getResourceList(){

        $page = $this->input->get("page")?$this->input->get("page"):1;
        $limit = $this->input->get("limit")?$this->input->get("limit"):20;
        $data = $this->input->get();
        echo json_encode(array(
            'items'=>$this->materialresource->getResourceInfoList($limit,($page-1)*$limit,$data),
            'totalCount'=>$this->materialresource->getResourceDataCount($data),
        ));
    }

    public function deleteResource(){
        $data = $this->input->post();
        echo $data;
        $resource = $this->materialresource->getResource($data['resourcde_id']);
        if(isset($resource->id) && !empty($resource)) $resource->delete();
        echo json_encode($this->returncode);
    }

    public function getResourceFileInfo($resource_id){

        $fileInfo = $this->materialresource->getFileInfo($resource_id);
        $this->load->view('wePlatForm/tmpl/resourceFileInfo', $fileInfo);
    }
}
