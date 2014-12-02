<?php
namespace Common\Model;
use Common\Model\CommonModel;
class PostsModel extends CommonModel {
	/*
	 * 表结构
	 * id:game的自增id
	 * game_author:用户的id
	 * post_date:发布时间
	 * game_content
	 * game_title
	 * game_excerpt:发表内容的摘录
	 * game_status:发表的状态,可以有多个值,分别为publish->发布,delete->删除,...
	 * comment_status:
	 * game_password
	 * game_name
	 * game_modified:更新时间
	 * game_content_filtered
	 * game_parent:为父级的game_id,就是这个表里的ID,一般用于表示某个发表的自动保存，和相关媒体而设置
	 * game_type:可以为多个值,image->表示某个game的附件图片;audio->表示某个game的附件音频;video->表示某个game的附件视频;...
	 */
	//game_type,game_status注意变量定义格式;
	
	protected $_auto = array (
		array ('post_date', 'mGetDate', 1, 'callback' ), 	// 增加的时候调用回调函数
		//array ('game_modified', 'mGetDate', 2, 'callback' ) 
	);
	// 获取当前时间
	function mGetDate() {
		return date ( 'Y-m-d H:i:s' );
	}
	
	protected function _before_write(&$data) {
		parent::_before_write($data);
	}
}