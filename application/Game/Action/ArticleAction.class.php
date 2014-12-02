<?php

/**
 * 文章内页
 */
namespace Game\Action;
use Common\Action\HomeBaseAction;
class ArticleAction extends HomeBaseAction {
    //文章内页
    public function index() {
    	$id=intval($_GET['id']);
    	$article=sp_sql_game($id,'');
    	$termid=$article['term_id'];
    	$term_obj= D("Gterms");
    	$term=$term_obj->where("term_id='$termid'")->find();
    	
    	$article_id=$article['object_id'];
    	
    	$should_change_game_hits=sp_check_user_action("games",1,true);
    	if($should_change_game_hits){
    		$games_model=M("Games");
    		$games_model->save(array("id"=>$article_id,"game_hits"=>array("exp","game_hits+1")));
    	}
    	
    	
    	$gl=get_games_log($id);//当前用户当前游戏状态

    	$smeta=json_decode($article['smeta'],true);
    	$content_data=sp_content_page($article['game_content']);
    	$article['game_content']=$content_data['content'];
    	$this->assign("page",$content_data['page']);
    	$this->assign($article);
    	$this->assign("smeta",$smeta);
    	$this->assign("term",$term);
    	$this->assign("article_id",$article_id);
        $this->assign("gl",$gl);
    	
    	$tplname=$term["one_tpl"];
    	$tplname=sp_get_apphome_tpl($tplname, "article");     
        $gid=$article['object_id'];
        
    	$this->display(":$tplname");
    }
    
    public function do_like(){
    	$this->check_login();
    	
    	$id=intval($_GET['id']);//games表中id
    	
    	$games_model=M("Games");
    	
    	$can_like=sp_check_user_action("games$id",1);
    	
    	if($can_like){
    		$games_model->save(array("id"=>$id,"game_like"=>array("exp","game_like+1")));
    		$this->success("赞好啦！");
    	}else{
    		$this->error("您已赞过啦！");
    	}
    	
    }


    public function check(){
        $gid=intval($_GET['id']);
        $anwser=$_GET['anwser'];
        $game=sp_sql_game($gid,'');
        $uid=get_current_userid();
   
        if($anwser==$game['anwser']){
            $m_gl= M("GamesLog");
            $gl=M("GamesLog")->where("uid={$uid} and gid={$gid}")->save(array('right' =>1,'righttime'=>time()));
            $result=array(
                'errcode' =>0, 
                'str'=>'u r right'
            );
        }
        else{
            $result=array(
                'errcode' =>1, 
                'str'=>'u r wrong'
            );
        }
        if($anwser==""){
            $result=array(
                'errcode' =>2, 
                'str'=>'plz enter ur anwser!'
            );
        }
        echo json_encode($result);
    }

    public function tip(){
        $gid=intval($_GET['id']);
        $uid=get_current_userid();
        if($uid==123450){
            $result=array(
                'errcode' =>1, 
                'str'=>"首先，你需要登录。。"
             );
            echo json_encode($result);
            exit;
        }
        $game=sp_sql_game($gid,'');
        $m_gl= M("GamesLog");
        $gl=M("GamesLog")->where("uid={$uid} and gid={$gid}")->save(array('tiped' =>1));
        $result=array(
                'errcode' =>0, 
                'str'=>$game['tip']
        );
        echo json_encode($result);
    }
}
?>
