<?php
#http://ctf.woldy.net/index.php?g=api&m=index&a=index
namespace Api\Action;
class IndexAction{
    function index(){
        echo 'hello world';
        $user_rs=M("Users");
        $user=$user_rs->field("id,user_nicename")->limit(4)->select();
        var_dump($user);

    }
}