<?php
namespace app\admin\validate;
use think\validate;
class Link extends validate
{
	protected $rule=[
		'title'=>'require|max:60|min:3|unique:link',
        'link_url'=>'require|unique:link',
	];

	protected $message=[
		'title.require'=>'标题名称不得为空！',
        'title.max'=>'标题不得大于60！',
        'title.min'=>'标题不得小于3!',
        'title.unique'=>'标题名称不得重复！',
        'link_url.require'=>'链接地址不得为空！',
        'link_url.unique'=>'链接地址不得重复！',
	];

	protected $scene=[
		'add'=>['title','link_url'],
		'edit'=>['title','link_url'],
	];
}
