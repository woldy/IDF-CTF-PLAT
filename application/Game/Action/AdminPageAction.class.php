<?php
namespace Game\Action;
use Common\Action\AdminbaseAction;
class AdminPageAction extends AdminbaseAction {
	protected $games_obj;
	function _initialize() {
		parent::_initialize();
		$this->games_obj =D("Games");
	}
	function index(){
		
		$where_ands=array("game_type=2 and game_status=1");
		$fields=array(
				'start_time'=> array("field"=>"post_date","operator"=>">"),
				'end_time'  => array("field"=>"post_date","operator"=>"<"),
				'keyword'  => array("field"=>"game_title","operator"=>"like"),
		);
		if(IS_POST){
				
			foreach ($fields as $param =>$val){
				if (isset($_POST[$param]) && !empty($_POST[$param])) {
					$operator=$val['operator'];
					$field   =$val['field'];
					$get=$_POST[$param];
					$_GET[$param]=$get;
					if($operator=="like"){
						$get="%$get%";
					}
					array_push($where_ands, "$field $operator '$get'");
				}
			}
		}else{
			foreach ($fields as $param =>$val){
				if (isset($_GET[$param]) && !empty($_GET[$param])) {
					$operator=$val['operator'];
					$field   =$val['field'];
					$get=$_GET[$param];
					if($operator=="like"){
						$get="%$get%";
					}
					array_push($where_ands, "$field $operator '$get'");
				}
			}
		}
		
		$where= join(" and ", $where_ands);
		
		$count=$this->games_obj->where($where)->count();
		$page = $this->page($count, 20);
		
		$games=$this->games_obj->where($where)->limit($page->firstRow . ',' . $page->listRows)->select();
		
		$users_obj=D("Users");
		$users_data=$users_obj->field("id,user_login")->where("user_status=1")->select();
		$users=array();
		foreach ($users_data as $u){
			$users[$u['id']]=$u;
		}
		$this->assign("users",$users);
		
		$this->assign("Page", $page->show('Admin'));
		$this->assign("formget",$_GET);
		$this->assign("games",$games);
		$this->display();
	}
	
	function recyclebin(){
		$where_ands=array("game_type=2 and game_status=0");
		$fields=array(
				'start_time'=> array("field"=>"post_date","operator"=>">"),
				'end_time'  => array("field"=>"post_date","operator"=>"<"),
				'keyword'  => array("field"=>"game_title","operator"=>"like"),
		);
		if(IS_POST){
		
			foreach ($fields as $param =>$val){
				if (isset($_POST[$param]) && !empty($_POST[$param])) {
					$operator=$val['operator'];
					$field   =$val['field'];
					$get=$_POST[$param];
					$_GET[$param]=$get;
					if($operator=="like"){
						$get="%$get%";
					}
					array_push($where_ands, "$field $operator '$get'");
				}
			}
		}else{
			foreach ($fields as $param =>$val){
				if (isset($_GET[$param]) && !empty($_GET[$param])) {
					$operator=$val['operator'];
					$field   =$val['field'];
					$get=$_GET[$param];
					if($operator=="like"){
						$get="%$get%";
					}
					array_push($where_ands, "$field $operator '$get'");
				}
			}
		}
		
		$where= join(" and ", $where_ands);
		
		$count=$this->games_obj->where($where)->count();
		$page = $this->page($count, 20);
		
		$games=$this->games_obj->where($where)->limit($page->firstRow . ',' . $page->listRows)->select();
		
		$users_obj=D("Users");
		$users_data=$users_obj->field("id,user_login")->where("user_status=1")->select();
		$users=array();
		foreach ($users_data as $u){
			$users[$u['id']]=$u;
		}
		$this->assign("users",$users);
		
		$this->assign("Page", $page->show('Admin'));
		$this->assign("formget",$_GET);
		$this->assign("games",$games);
		$this->display();
	}
	
	function add(){
         $this->display();
	}
	
	function add_post(){
		if (IS_POST) {
			$_POST['smeta']['thumb'] = sp_asset_relative_url($_POST['smeta']['thumb']);
			$_POST['game']['post_date']=date("Y-m-d H:i:s",time());
			$_POST['game']['smeta']=json_encode($_POST['smeta']);
			$_POST['game']['game_author']=get_current_admin_id();
			$result=$this->games_obj->add($_POST['game']);
			if ($result) {
				$this->success("添加成功！");
			} else {
				$this->error("添加失败！");
			}
		}
	}
	
	public function edit(){
		$terms_obj = D("Gterms");
		$term_id = intval(I("get.term")); 
		$id= intval(I("get.id"));
		$term=$terms_obj->where("term_id=$term_id")->find();
		$game=$this->games_obj->where("id=$id")->find();
		$this->assign("game",$game);
		$this->assign("smeta",(array)json_decode($game['smeta']));
			
		$this->assign("author","1");
		$this->assign("term",$term);
		$this->display();
	}
	
	public function edit_post(){
		$terms_obj = D("Gterms");
	
		if (IS_POST) {
			$_POST['smeta']['thumb'] = sp_asset_relative_url($_POST['smeta']['thumb']);
			
			$_POST['game']['smeta']=json_encode($_POST['smeta']);
			unset($_POST['game']['game_author']);
			$result=$this->games_obj->save($_POST['game']);
			if ($result !== false) {
				//
				$this->success("保存成功！");
				//$this->success(json_encode($_POST['meta']));
			} else {
				$this->error("保存失败！");
			}
		}
	}
	
	//排序
	public function listorders() {
		$status = parent::_listorders($this->terms_relationship);
		if ($status) {
			$this->success("排序更新成功！");
		} else {
			$this->error("排序更新失败！");
		}
	}
	
	
	function delete(){
		
		
		if(isset($_POST['ids'])){
			$ids = implode(",", $_POST['ids']);
			$data=array("game_status"=>"0");
			if ($this->games_obj->where("id in ($ids)")->save($data)) {
				$this->success("删除成功！");
			} else {
				$this->error("删除失败！");
			}
		}else{
			if(isset($_GET['id'])){
				$id = intval(I("get.id"));
				$data=array("id"=>$id,"game_status"=>"0");
				if ($this->games_obj->save($data)) {
					$this->success("删除成功！");
				} else {
					$this->error("删除失败！");
				}
			}
		}
	}
	
	function restore(){
		if(isset($_GET['id'])){
			$id = intval(I("get.id"));
			$data=array("id"=>$id,"game_status"=>"1");
			if ($this->games_obj->save($data)) {
				$this->success("还原成功！");
			} else {
				$this->error("还原失败！");
			}
		}
	}
	
	function clean(){
		
		if(isset($_POST['ids'])){
			$ids = implode(",", $_POST['ids']);
			if ($this->games_obj->where("id in ($ids)")->delete()!==false) {
				$this->success("删除成功！");
			} else {
				$this->error("删除失败！");
			}
		}
		if(isset($_GET['id'])){
			$id = intval(I("get.id"));
			if ($this->games_obj->delete($id)!==false) {
				$this->success("删除成功！");
			} else {
				$this->error("删除失败！");
			}
		}
	}
	
	
	
}