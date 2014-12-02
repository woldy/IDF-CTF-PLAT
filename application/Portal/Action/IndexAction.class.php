<?php
namespace Portal\Action;
use Common\Action\HomeBaseAction; 
/**
 * 首页
 */
class IndexAction extends HomeBaseAction {
	
    //首页
	public function index() {
        $nuser_rs=M("Users")->cache(true);
        $pterms = M("PtermRelationships");
        $gterms = M("GtermRelationships")->cache(true);
        $gmodel = M("Games")->cache(true);

        $nuser=$nuser_rs->field("id,user_nicename")->order("id desc")->limit(10)->select();//新手
        $guser=$nuser_rs->field("id,user_nicename")->where("sex=1")->order("id desc")->limit(10)->select();//girls
        $nbuser=$nuser_rs->field("id,user_nicename")->order("score desc")->limit(10)->select();//高手
        $dynamic=$pterms //CTF动态
        ->alias("a")
        ->field("tid,post_title,link_class,post_url")
        ->join(C ( 'DB_PREFIX' )."posts b ON a.object_id = b.id")
        ->where("a.term_id = 6 and a.status=1")
        ->limit(6)
        ->order("a.listorder ASC,b.post_modified DESC")->select();


        $share=$pterms //解题分享
        ->alias("a")
        ->field("post_title,post_realauthor,post_url,tid")
        ->join(C ( 'DB_PREFIX' )."posts b ON a.object_id = b.id")
        ->where("a.term_id = 10 and a.status=1")
        ->limit(8)
        ->order("a.listorder ASC,b.post_modified DESC")->select();


        $basic=$pterms //基础教学
        ->alias("a")
        ->field("post_title,tid,post_date")
        ->join(C ( 'DB_PREFIX' )."posts b ON a.object_id = b.id")
        ->where("a.term_id = 9 and a.status=1")
        ->limit(8)
        ->order("a.listorder ASC,b.post_modified DESC")->select();

        $game=$gterms //精选习题
        ->alias("a")
        ->field("tid,game_title")
        ->join(C ( 'DB_PREFIX' )."games b ON a.object_id = b.id")
        ->where("a.term_id !=16 and a.status=1")
        ->limit(20)
        ->order("a.listorder ASC,b.game_modified DESC")->select();

        if(!isset($_SESSION['test_ids'])){ //取出所有牛刀小试
            $test=$gterms 
            ->alias("a")
            ->field("object_id")
            ->join(C ( 'DB_PREFIX' )."games b ON a.object_id = b.id")
            ->where("a.term_id=16 and a.status=1")
            ->limit(8)
            ->order("a.listorder ASC,b.game_modified DESC")->select();
            $test_ids=array();
            for($i=0;$i<count($test);$i++){
                $test_ids[$i]=$test[$i]['object_id'];
            }
            $_SESSION['test_ids']=$test_ids;
        }
        $test_ids=$_SESSION['test_ids'];
        $tid=$test_ids[array_rand($test_ids)];

        $test=$gmodel->field("id,game_title,game_content")->where("id=".$tid)->select();
        $test=$test[0];

        
        $this->assign("dynamic",$dynamic);
        $this->assign("test",$test);
        $this->assign("share",$share);
        $this->assign("basic",$basic);
        $this->assign("game",$game);

		$this->assign("nuser",$nuser);
		$this->assign("guser",$guser);
		$this->assign("nbuser",$nbuser);
    	$this->display(":index");
    }
    
}

?>
