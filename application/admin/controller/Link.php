<?php
namespace app\admin\controller;
use app\admin\controller\Common;
class Link extends Common
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {   $count=db('link')->count();
        $link=db('link')->order('id desc')->paginate(15);
        // dump($data);die;
        $this->assign([
            'count'=>$count,
            'link'=>$link,
        ]);
        return $this->fetch('link/index');
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
      return $this->fetch('link/add');
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save()
    {
        if(!Request()->isPost()){
           $this->error('请求类型错误');
        }else{
            $data=input('post.');
            // dump($data);die;
            //判断有无http
            if($data['link_url'] && stripos($data['link_url'],'http://') === false){
    			$data['link_url']='http://'.$data['link_url'];
    		}
            //验证
            $validate=validate('link');
            if(!$validate->scene('add')->check($data)){
                $this->error($validate->getError());
            }
            //添加
            $add=db('link')->insert($data);
            if($add){
               $this->success('添加友情链接成功！');
           }else{
               $this->error('添加友情链接失败！');
           }
           return;
        }
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id){
        $data=db('link')->find(input('id'));
        $this->assign('data',$data);
        return $this->fetch('link/edit');
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update($id)
    {
        if(!Request()->isPost()){
           $this->error('请求类型错误');
        }else{
            $data=input($id);
            dump($data);die;
        }
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
    }

    //通用头像上传接口
    public function upload()
    {
       if($this->request->isPost()){
            $res['code']=1;
            $res['msg'] = '上传成功！';
            $file = $this->request->file('file');
            $info = $file->move(ROOT_PATH . 'public/static/admin/images/link');
            if($info){
                $res['name'] = $info->getFilename();
                $res['filepath'] = '/link/'.$info->getSaveName();
             }else{
                $res['code'] = 0;
                $res['msg'] = '上传失败！'.$file->getError();
            }
            return $res;
         }
    }
    //删除头像
    public function delimg(){
        $imgurl=input('imgurl');
        $imgurl=ADMINIMG. $imgurl;
        $res=unlink($imgurl);
        if($cateid){
            db('admin')->setField('img','');
        }
        if($res){
            echo 1; //删除文件成功
        }else{
            echo 2;//删除文件失败
        }
    }


}
