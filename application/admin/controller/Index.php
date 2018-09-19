<?php
namespace app\admin\controller;
use app\admin\controller\Commom;
class Index extends Common
{
/*
                    _oo8oo_
                   o8888888o
                   88" . "88
                   (| -_- |)
                   0\  =  /0
                 ___/'==='\___
               .' \\|     |// '.
              / \\|||  :  |||// \
             / _||||| -:- |||||_ \
            |   | \\\  -  /// |   |
            | \_|  ''\---/''  |_/ |
            \  .-\__  '-'  __/-.  /
          ___'. .'  /--.--\  '. .'___
       ."" '<  '.___\_<|>_/___.'  >' "".
      | | :  `- \`.:`\ _ /`:.`/ -`  : | |
      \  \ `-.   \_ __\ /__ _/   .-` /  /
  =====`-.____`.___ \_____/ ___.`____.-`=====
                    `=---=`
  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
            佛祖保佑		永无bug
*/
  public function index(){
    return  $this->fetch('index/index');
  }

  public function welcome(){
    return  $this->fetch('index/welcome');
  }

}
