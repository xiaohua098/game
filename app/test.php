<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/26 0026
 * Time: 15:55
 */

function   test1(){
   echo  '这是测试共用方法一';
}

 function   regular(){
//       $pattern='/\d{4}-\d{1,2}-\d{1,2}/';
//       $pattern='/^[1-9]\d{7}((0\d)|(1[0-2]))(([0|1|2]\d)|3[0-1])\d{3}$|^[1-9]\d{5}[1-9]\d{3}((0\d)|(1[0-2]))
//       (([0|1|2]\d)|3[0-1])\d{3}([0-9]|X)$/';//身份证格式正则
////身份证全国统一18位号码：AA BB CC DDDD EE FF HH I J
//        AA代表省份（直辖市）
//        BB代表市（区）
//        CC代表县（区）
//        DDDD代表出生年份
//        EE代表出生月份
//        FF代表出生日
//        HH代表个人代码
//        I 代表性别（男单女双）
//        J代表系统校验码
//       $pattern='/^\d{6}(201[8-9])\d{7}X$/';
//       $subject="41052220171008818X";
    //手机号正则
//       $pattern='/^1[3|4|5|8][0-9]\d{4,8}$/';
//       $subject="13525818709";
    //邮箱正则
//       $pattern='/^(\w)+(\.\w+)*@(\w)+((\.\w+)+)$/';
//       $subject='qiqiaini098@163.com';
    //
    //字符描述：
    //^ ：匹配输入的开始位置。
    //\：将下一个字符标记为特殊字符或字面值。
    //* ：匹配前一个字符零次或几次。
    //+ ：匹配前一个字符一次或多次。
    //(pattern) 与模式匹配并记住匹配。
    //x|y：匹配 x 或 y。
    //[a-z] ：表示某个范围内的字符。与指定区间内的任何字符匹配。
    //\w ：与任何单词字符匹配，包括下划线。
    //
    //{n,m} 最少匹配 n 次且最多匹配 m 次
    //$ ：匹配输入的结尾。';
//       $res=preg_match($pattern,$subject);
//       dump($res);
    return view('home.index');
}