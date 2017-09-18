<?php
namespace  App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
	public function userList(){
		DB::table('user')
	    ->join('card', 'user.id', '=', 'card.uid')
	    ->select('user.id', 'user.phone', 'user.add_time','user.nickname','user.upd_time')
	    ->get()->toArray();
	}
	public function  userInfo(){
		return 111;
	}
	

}