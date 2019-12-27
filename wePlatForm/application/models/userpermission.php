<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Userpermission extends CI_Model
{


    public function __construct()
    {
        parent::__construct();


    }

    public function hasPermissions($user,$destpermissions){
        $permissions = $user->getUserRolePermission();
        foreach($permissions as $permission){
            if(in_array($permission->url,$destpermissions)){
                return true;
                break;
            }
        }
        return false;
    }


    public function hasPermission($user,$permission){
        $permissions = $user->getUserRolePermission();
        foreach($permissions as $permissionItem){
            if($permissionItem->url == $permission){
                return true;
                break;
            }
        }
        return false;
    }
}