<?php
namespace  App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class RoleController extends Controller{
    //角色列表
    public function roleList(Request $request){
        $count=10;
        $res=DB::table('role')->paginate($count);
        $page=$res->links();
        $data=array('role'=>$res,'page'=>$page);
        if($res){
            return renderJson('200','',$data);
        }
        return renderJson('100','获取失败');
    }
    //添加角色
    public function roleAdd(Request  $request){
        if($request->isMethod('POST')){
            $data=$request->input();
            if(count($data) != 1){
                return renderJson('100','参数不合法！');
            }
            if(empty($data['title']) ){
                return renderJson('100','参数不能为空');
            }
            $data['add_time']=$data['upd_time']=date('Y-m-d H:i:s');
            $res=DB::table('role')->insert($data);
            if($res){
                return renderJson('200','添加成功');
            }
            return renderJson('100','添加失败');
        }
        return renderJson('101','违法操作');
    }
    //修改角色
    public function authEdit(Request  $request){
        if($request->isMethod('GET')){
            $data=$request->input();
            if(empty($data)){
                return renderJson('100','参数不能为空');
            }
            if(!is_numeric($data['id'])){
                return renderJson('100','参数不合法');
            }
            $id=$data['id'];
            $res=DB::table('role')->where('id',$id)->first()->toArray();
            if($res){
                return renderJson('200','',$res);
            }
            return renderJson('100','该角色不存在！');
        }
        $data=$request->input();
        $data['upd_time']=date('Y-m-d H:i:s');
        $res=DB::table('role')->save($data);
        if($res){
            return renderJson('200','修改成功');
        }
    }
    //删除角色
    public function authDel(Request  $request){
        if($request->isMethod('GET')){
            $data=$request->input();
            if(empty($data)){
                return renderJson('100','参数不能为空');
            }
            if(!is_numeric($data['id'])){
                return renderJson('100','参数不合法');
            }
            $id=$data['id'];
            $res=DB::table('role')->where('id',$id)->delete($data);
            if($res){
                return renderJson('200','删除成功');
            }
            return renderJson('100','删除失败');
        }
        return renderJson('100','违法操作!');
    }

    //分配权限
    public function roleAssign(Request  $request){
        if($request->isMethod('GET')){
            $data=$request->input();
            if(empty($data)){
                return renderJson('100','参数不能为空');
            }
            if(!is_numeric($data['id'])){
                return renderJson('100','参数不合法');
            }
            $id=$data['id'];
            $auth=DB::table('auth')->get();
            $result['id']=$id;
            $result['auth']=$auth;
            return renderJson('200','',$result);
        }
        $data=$request->input();
        if(empty($data)){
            return renderJson('100','参数不能为空');
        }
        $data['powers']=emplode(',',$data['powers']);
        $data['upd_time']=date('Y-m-d H:i:s');
        DB::table('role')->save($data);
        return renderJson('100','违法操作!');
    }
}
