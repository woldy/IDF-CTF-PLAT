<?php

/**
 * 4
 * @处理标签函数
 * @以字符串方式传入,通过sp_param_lable函数解析为以下变量
 * ids:调用指定id的一个或多个数据,如 1,2,3
 * cid:数据所在分类,可调出一个或多个分类数据,如 1,2,3 默认值为全部,在当前分类为:'.$cid.'
 * field:调用game指定字段,如(id,game_title...) 默认全部
 * limit:数据条数,默认值为10,可以指定从第几条开始,如3,8(表示共调用8条,从第3条开始)
 * order:推荐方式(post_date) (desc/asc/rand())
 */
function sp_sql_games($tag){
	$where=array();
	$tag=sp_param_lable($tag);
	$field = !empty($tag['field']) ? $tag['field'] : '*';
	$limit = !empty($tag['limit']) ? $tag['limit'] : '';
	$order = !empty($tag['order']) ? $tag['order'] : 'post_date';


	//根据参数生成查询条件
	$where['status'] = array('eq',1);
	$where['game_status'] = array('eq',1);

	if (isset($tag['cid'])) {
		$where['term_id'] = array('in',$tag['cid']);
	}
	
	if (isset($tag['ids'])) {
		$where['object_id'] = array('in',$tag['ids']);
	}


	$join = "".C('DB_PREFIX').'games as b on a.object_id =b.id';
	$join2= "".C('DB_PREFIX').'users as c on b.game_author = c.id';
	$rs= M("GtermRelationships");

	$games=$rs->alias("a")->join($join)->join($join2)->field($field)->where($where)->order($order)->limit($limit)->select();
	return $games;
}

/**
 * 4
 * @ 处理标签函数
 * @ $tag以字符串方式传入,通过sp_param_lable函数解析为以下变量。例："cid:1,2;order:post_date desc,listorder desc;"
 * ids:调用指定id的一个或多个数据,如 1,2,3
 * cid:数据所在分类,可调出一个或多个分类数据,如 1,2,3 默认值为全部,在当前分类为:'.$cid.'
 * field:调用game指定字段,如(id,game_title...) 默认全部
 * limit:数据条数,默认值为10,可以指定从第几条开始,如3,8(表示共调用8条,从第3条开始)
 * order:推荐方式(post_date) (desc/asc/rand())
 */

function sp_sql_games_paged($tag,$pagesize=20,$pagetpl='{first}{prev}{liststart}{list}{listend}{next}{last}'){
	$where=array();
	$tag=sp_param_lable($tag);
	$field = !empty($tag['field']) ? $tag['field'] : '*';
	$limit = !empty($tag['limit']) ? $tag['limit'] : '';
	$order = !empty($tag['order']) ? $tag['order'] : 'post_date';


	//根据参数生成查询条件
	$where['status'] = array('eq',1);
	$where['game_status'] = array('eq',1);

	if (isset($tag['cid'])) {
		$where['term_id'] = array('in',$tag['cid']);
	}

	if (isset($tag['ids'])) {
		$where['object_id'] = array('in',$tag['ids']);
	}

	$join = "".C('DB_PREFIX').'games as b on a.object_id =b.id';
	$join2= "".C('DB_PREFIX').'users as c on b.game_author = c.id';
	$rs= M("GtermRelationships");
	$totalsize=$rs->alias("a")->join($join)->join($join2)->field($field)->where($where)->count();
	
	import('Page');
	if ($pagesize == 0) {
		$pagesize = 20;
	}
	$PageParam = C("VAR_PAGE");
	$page = new \Page($totalsize,$pagesize);
	$page->setLinkWraper("li");
	$page->SetPager('default', $pagetpl, array("listlong" => "6", "first" => "首页", "last" => "尾页", "prev" => "上一页", "next" => "下一页", "list" => "*", "disabledclass" => ""));
	$games=$rs->alias("a")->join($join)->join($join2)->field($field)->where($where)->order($order)->limit($page->firstRow . ',' . $page->listRows)->select();

	$content['games']=$games;
	$content['page']=$page->show('default');
	return $content;
}

function get_games_log($gid,$uid=0){
	$res=array();
	$uid=$uid==0?get_current_userid():$uid;	
	$m_gl= M("GamesLog");
	$gl=$m_gl->where("uid={$uid} and gid={$gid}")->select();
	if($uid==0){
		$res=array(
			'right' => 0,
			'tiped' =>0,
			'trycount'=>0
		);
	}
	else if($gl==false){//没有记录
		$m_gl->add(
			array(
				'uid'=>$uid,
				'gid'=>$gid
			)
		);
		$res=array(
			'right' => 0,
			'tiped' =>0,
			'trycount'=>0
		);
	}
	else{
		$res=$gl[0];
	}

	return $res;
}

/**
 * 5
 * @param int $tid 分类表下的tid.
 * @param string $tag 
 * @处理标签函数
 * @以字符串方式传入,通过sp_param_lable函数解析为以下变量
 * field:调用game指定字段,如(id,game_title...) 默认全部
 * 如：field:game_title;
 * @return array 返回指定id所有页面
 */
function sp_sql_game($tid,$tag){
	$where=array();
	$tag=sp_param_lable($tag);
	$field = !empty($tag['field']) ? $tag['field'] : '*';


	//sc
	$where['status'] = array('eq',1);
	$where['tid'] = array('eq',$tid);


	$join = "".C('DB_PREFIX').'games as b on a.object_id =b.id';
	$join2= "".C('DB_PREFIX').'users as c on b.game_author = c.id';
	$rs= M("GtermRelationships");

	$games=$rs->alias("a")->join($join)->join($join2)->field($field)->where($where)->find();
	return $games;
}

/**
 * 6
 * @处理标签函数
 * @以字符串方式传入,通过sp_param_lable函数解析为以下变量
 * 返回符合条件的所有页面
 * ids:调用指定id的一个或多个数据,如 1,2,3
 * field:调用post指定字段,如(id,post_title...) 默认全部
 * limit:数据条数,默认值为10,可以指定从第几条开始,如3,8(表示共调用8条,从第3条开始)
 * order:推荐使用方式(post_date) (desc/asc/rand())
 * 使用：ids:1,2;field:post_date,post_content;limit:10;order:post_date DESC,id;
 */
function sp_sql_pages($tag){
	$where=array();
	$tag=sp_param_lable($tag);
	$field = !empty($tag['field']) ? $tag['field'] : '*';
	$limit = !empty($tag['limit']) ? $tag['limit'] : '';
	$order = !empty($tag['order']) ? $tag['order'] : 'post_date';


	//根据参数生成查询条件
	$where['game_status'] = array('eq',1);
	$where['game_type'] = array('eq',2);

	$rs= M("Games");

	$games=$rs->field($field)->where($where)->order($order)->limit($limit)->select();
	return $games;
}

/**
 * 7
 * @处理标签函数
 * @以字符串方式传入,通过sp_param_lable函数解析为以下变量
 * 返回指定id=$id的页面
 */
function sp_sql_page($id){
	$where=array();
	$where['id'] = array('eq',$id);

	$rs= M("Games");
	$game=$rs->where($where)->find();
	return $game;
}


/**
 * 8
 * 返回指定分类
 */
function sp_get_term($term_id){
	
	$terms=F('all_terms');
	if(empty($terms)){
		$term_obj= M("Gterms");
		$terms=$term_obj->where("status=1")->select();
		$mterms=array();
		
		foreach ($terms as $t){
			$tid=$t['term_id'];
			$mterms["t$tid"]=$t;
		}
		
		F('all_terms',$mterms);
		return $mterms["t$term_id"];
	}else{
		return $terms["t$term_id"];
	}
}
/**
 * 8
 * 返回指定分类下的子分类
 */
function sp_get_child_terms($term_id){

	$term_id=intval($term_id);
	$term_obj = M("Gterms");
	$terms=$term_obj->where("status=1 and parent=$term_id")->select();
	
	return $terms;
}
/**
 * 9
 * @处理标签函数
 * @以字符串方式传入,通过sp_param_lable函数解析为以下变量
 * 返回符合条件的所有分类
 * ids:调用指定id的一个或多个数据,如 1,2,3
 * field:调用post指定字段,如(id,post_title...) 默认全部
 * limit:数据条数,默认值为10,可以指定从第几条开始,如3,8(表示共调用8条,从第3条开始)
 * order:path (desc/asc/rand())
 * 使用：ids:1,2;field:post_date,game_content;limit:10;order:post_date DESC,id;
 */
function sp_get_terms($tag){
	
	$where=array();
	$tag=sp_param_lable($tag);
	$field = !empty($tag['field']) ? $tag['field'] : '*';
	$limit = !empty($tag['limit']) ? $tag['limit'] : '';
	$order = !empty($tag['order']) ? $tag['order'] : 'term_id';
	
	//根据参数生成查询条件
	$where['status'] = array('eq',1);
	
	if (isset($tag['ids'])) {
		$where['term_id'] = array('in',$tag['ids']);
	}
	
	$term_obj= M("Gterms");
	$terms=$term_obj->field($field)->where($where)->order($order)->limit($limit)->select();
	return $terms;
}

function sp_admin_get_tpl_file_list(){
	$template_path=C("SP_TMPL_PATH").C("SP_DEFAULT_THEME")."/Portal/";
	$files=scandir($template_path);
	$tpl_files=array();
	foreach ($files as $f){
		if($f!="." || $f!=".."){
			if(is_file($template_path.$f)){
				$suffix=C("TMPL_TEMPLATE_SUFFIX");
				$result=preg_match("/$suffix$/", $f);
				if($result){
					$tpl=str_replace($suffix, "", $f);
					$tpl_files[$tpl]=$tpl;
				}
			}
		}
	}
	return $tpl_files;
}