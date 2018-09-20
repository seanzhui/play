<?php
namespace app\admin\controller;
use app\admin\controller\Common;
class Index extends Common
{
  public function index(){
    return  $this->fetch('index/index');
  }

  public function welcome(){
    return  $this->fetch('index/welcome');
  }

}
