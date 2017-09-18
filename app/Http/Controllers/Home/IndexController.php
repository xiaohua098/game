<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/27 0027
 * Time: 11:33
 */

namespace App\Http\Controllers\Home;
use App\Http\Controllers\Controller;

class IndexController   extends  Controller
{
  public  function index(){
      echo '测试git';
  }

  public  function pay(){
      $form = "<form name='payForm' action='/App/alipay/alipayapi.php' style='display:none;' method='post'>
        <input type='text' name='WIDout_trade_no' value='11' id='out_trade_no'>
        <input type='text' name='WIDsubject' value='小花订单'>
        <input type='text' name='WIDtotal_fee' value='0.1'>
        <input type='text' name='WIDbody' value='即时到账'>
        </form>
        <script>
        function submitForm(){
            document.payForm.submit();
        }
        submitForm();
        </script>
        ";
      echo $form;
  }

    //展示成功页面
    public function flow3(){
        //展示页面
        echo 'ok';
    }

}