<?php
namespace app\index\Controller;
use think\Controller;
use think\Request;
use think\Session;
class Common extends Controller
{
  public function _initialize(){

    if(isMobile()){
    $this->redirect('mobile/index/index');
    }

  }


}
