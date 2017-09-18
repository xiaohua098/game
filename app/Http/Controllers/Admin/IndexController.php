<?php
namespace  App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class IndexController extends Controller{
  //后台登陆
    public function index(Request  $request){
         if($request->isMethod('POST')){
            $data=$request->input();
            $res=DB::table('user')->where('name',$data['name'])->first();
            if(empty($res)){
              return  renderJson('100','该账号不存在！');
            }
            if($res->pwd == sha1('suiqu_'.$data['pwd'])){
                $power=DB::table('role')->where('id',$res->role_id)->get();
                $powers=explode(',',$power->powers);
                   session::put(['name'=>$res->name]);
                   session::put(['id'=>$res->id]);
                    session::put(['role_id'=>$res->role_id]);
                    session::put(['power'=>$powers]);
              return renderJson('200','登录成功!');
            }else{
              return renderJson('100','登录密码错误!');
            }
        }
        return renderJson('100','违法操作!');
    }
    //后台退出
    public function out(){
      session()->flush();
      return renderJson('200','退出成功!');
    }
    //后台注册
//    public function register(Request  $request){
//         $ret = new \stdClass();
//         if($request->isMethod('POST')){
//            $data=$request->input();
//            $data['pwd']=sha1('suiqu_'.$data['pwd']);
//            $data['add_time']=$data['upd_time']=date('Y-m-d H:i:s');
//            $res=DB::table('user')->insert($data);
//            if($res){
//               return renderJson('200','注册成功!');
//            }
//               return renderJson('100','注册失败!');
//        }
//        return renderJson('100','违法操作!');
//    }
}