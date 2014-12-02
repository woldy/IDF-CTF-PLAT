<?php

/**
 * ÓÎÏ·ÅÐ¶Ï
 * http://ctf.woldy.net/index.php?g=game&m=check&a=index&id=24
 */
namespace Game\Action;
class CheckAction{
    public function index(){
        $id=intval($_GET['id']);
        $uid=get_current_userid();  
        $anwser=$_GET['anwser'];
        $game=sp_sql_game($id,'');
        if($game['anwser']==$anwser){//³É¹¦
            echo 'xx';
        }
        else{
            echo 'failer';
        }

        $userid=111111;
        $users_model=D("Users");
        $user=$users_model->where(array("id"=>$userid))->find();
        var_dump($user);
    }
}
?>
