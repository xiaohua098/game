<?php
namespace  App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller{
    //删除权限
    public function authList(Request $request){
            $count=10;
            $res=DB::table('auth')->paginate($count);
            $page=$res->links();
            $data=array('auth'=>$res,'page'=>$page);
            if($res){
                return renderJson('200','',$data);
            }
            return renderJson('100','获取失败');
    }
    //添加权限
    public function authAdd(Request  $request){
        if($request->isMethod('POST')){
            $data=$request->input();
            if(count($data) != 3){
                return renderJson('100','参数不合法！');
            }
            if(empty($data['title']) ){
                return renderJson('100','参数不能为空');
            }
            $data['add_time']=$data['upd_time']=date('Y-m-d H:i:s');
            $res=DB::table('auth')->insert($data);
            if($res){
                return renderJson('200','添加成功');
            }
            return renderJson('100','添加失败');
        }
        $auth=DB::table('Auth')->where('pid',0)->get()->toArray();
        return renderJson('200','',$auth);
    }
    //修改权限
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
            $res=DB::table('auth')->where('id',$id)->first()->toArray();
            if($res){
                return renderJson('200','',$res);
            }
            return renderJson('100','该权限不存在！');
        }
        $data=$request->input();
        $data['upd_time']=date('Y-m-d H:i:s');
        $res=DB::table('auth')->save($data);
        if($res){
            return renderJson('200','修改成功');
        }
    }
    //删除权限
    public function authDel(Request  $request){
        if($request->isMethod('GET')){
            $data=$request->input();
            $id=$data['id'];
            $res=DB::table('auth')->where('id',$id)->delete($data);
            if($res){
                return renderJson('200','删除成功');
            }
            return renderJson('100','删除失败');
        }
        return renderJson('100','违法操作!');
    }

}
