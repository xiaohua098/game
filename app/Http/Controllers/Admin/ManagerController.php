<?php
namespace  App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManagerController extends Controller{
    //后台管理员列表
    public function managerList(Request $request){
        $count=10;
        $res=DB::table('Manger')->paginate($count);
        $page=$res->links();
        $data=array('manager'=>$res,'page'=>$page);
        if($res){
            return renderJson('200','',$data);
        }
        return renderJson('100','获取失败');
    }
    //添加管理员
    public function managerAdd(Request  $request){
        if($request->isMethod('POST')){
            $data=$request->input();
            if(count($data) != 2){
                return renderJson('100','参数不合法！');
            }
            if(empty($data['name']) || empty($data['pwd']) ){
                return renderJson('100','参数不能为空');
            }
            $data['pwd']=sha1('suiqu_'.$data['pwd']);
            $data['add_time']=$data['upd_time']=date('Y-m-d H:i:s');
            $res=DB::table('manager')->insert($data);
            if($res){
                return renderJson('200','添加成功');
            }
            return renderJson('100','添加失败');
        }
        return renderJson('101','违法操作');
    }
    //修改管理员
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
            $res=DB::table('manager')->where('id',$id)->first()->toArray();
            if($res){
                return renderJson('200','',$res);
            }
            return renderJson('100','该管理员不存在！');
        }
        $data=$request->input();
        $data['upd_time']=date('Y-m-d H:i:s');
        $res=DB::table('manager')->save($data);
        if($res){
            return renderJson('200','修改成功');
        }
    }
    //删除管理员
    public function managerDel(Request  $request){
        if($request->isMethod('GET')){
            $data=$request->input();
            if(empty($data)){
                return renderJson('100','参数不能为空');
            }
            if(!is_numeric($data['id'])){
                return renderJson('100','参数不合法');
            }
            $id=$data['id'];
            $res=DB::table('manager')->where('id',$id)->delete($data);
            if($res){
                return renderJson('200','删除成功');
            }
            return renderJson('100','删除失败');
        }
        return renderJson('101','违法操作!');
    }

    //分配角色
    public function managerAssign(Request  $request){
        if($request->isMethod('GET')){
            $data=$request->input();
            if(empty($data)){
                return renderJson('100','参数不能为空');
            }
            if(!is_numeric($data['id'])){
                return renderJson('100','参数不合法');
            }
            $id=$data['id'];
            $role=DB::table('role')->get();
            $result['id']=$id;
            $result['role']=$role;
            return renderJson('200','',$result);
        }
        $data=$request->input();
        if(empty($data)){
            return renderJson('100','参数不能为空');
        }
        $data['upd_time']=date('Y-m-d H:i:s');
        DB::table('manager')->save($data);
        return renderJson('101','违法操作!');
    }
}
