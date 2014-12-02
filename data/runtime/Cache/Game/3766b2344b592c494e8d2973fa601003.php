<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
	<html lang="en">
	<head>
		<title><?php echo ($game_title); ?> <?php echo ($site_name); ?> </title>
		<meta name="keywords" content="<?php echo ($game_keywords); ?>" />
		<meta name="description" content="<?php echo ($game_excerpt); ?>">
			<?php $tmpl = '/tpl/wctf/'; ?>
<?php $portal_index_lastnews=6; $portal_hot_articles="1,2"; $portal_last_post="1,2"; $default_home_slides=array( array( "slide_name"=>"如何开启你的CTF比赛之旅", "slide_pic"=>$tmpl."Public/images/demo/1.jpg", "slide_url"=>"", ), array( "slide_name"=>"CTF训练营 新兵训练我最行", "slide_pic"=>$tmpl."Public/images/demo/2.jpg", "slide_url"=>"", ), array( "slide_name"=>"", "slide_pic"=>$tmpl."Public/images/demo/3.jpg", "slide_url"=>"", ), ); ?>
	
	<meta name="author" content="WCTF">
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- HTML5 shim for IE8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <![endif]-->
	<link rel="icon" href="/tpl/wctf/Public/images/favicon.ico" mce_href="/tpl/wctf/Public/images/favicon.ico" type="image/x-icon">
	<link rel="shortcut icon" href="/tpl/wctf/Public/images/favicon.ico" mce_href="/tpl/wctf/Public/images/favicon.ico" type="image/x-icon">
    <link href="/tpl/wctf/Public/wctf/themes/cmf/theme.min.css" rel="stylesheet">
    <link href="/tpl/wctf/Public/wctf/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="/tpl/wctf/Public/wctf/font-awesome/4.2.0/css/font-awesome.min.css"  rel="stylesheet" type="text/css">
	<!--[if IE 7]>
	<link rel="stylesheet" href="/tpl/wctf/Public/wctf/font-awesome/4.2.0/css/font-awesome-ie7.min.css">
	<![endif]-->
	<link href="/tpl/wctf/Public/css/style.css" rel="stylesheet">
	<link href="/tpl/wctf/Public/css/wctf.css" rel="stylesheet">
	<style>
		/*html{filter:progid:DXImageTransform.Microsoft.BasicImage(grayscale=1);-webkit-filter: grayscale(1);}*/
		#backtotop{position: fixed;bottom: 50px;right:20px;display: none;cursor: pointer;font-size: 50px;z-index: 9999;}
		#backtotop:hover{color:#333}
	</style>
		<link href="/tpl/wctf/Public/css/game.css" rel="stylesheet">
		<style>
			#article_content img{height:auto !important}
		</style>
	</head>
<body class="">
<div class="navbar navbar-fixed-top">
   <div class="navbar-inner">
     <div class="container">
       <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
       </a>
       <a class="brand" href="/"><img src="/tpl/wctf/Public/images/logo.png"/></a>
       <div class="nav-collapse collapse" id="main-menu">
       	<?php
 $effected_id=""; $filetpl="<a href='\$href' target='\$target'>\$label</a>"; $foldertpl="<a href='\$href' target='\$target' class='dropdown-toggle' data-toggle='dropdown' data-hover='dropdown'>\$label <b class='caret'></b></a>"; $ul_class="dropdown-menu" ; $li_class="" ; $style="nav"; $showlevel=6; $dropdown='dropdown'; echo sp_get_menu("main",$effected_id,$filetpl,$foldertpl,$ul_class,$li_class,$style,$showlevel,$dropdown); ?>
		
		<ul class="nav pull-right" id="main-menu-left">
			<li class="dropdown">
			<?php if(sp_is_user_login()): ?><a class="dropdown-toggle user" data-toggle="dropdown" href="#">
	            <?php if(empty($user['avatar'])): ?><img src="/tpl/wctf//Public/images/headicon.png" class="headicon"/>
	            <?php else: ?>
	            <img src="<?php echo sp_get_user_avatar_url($user['avatar']);?>" class="headicon"/><?php endif; ?>
	            <?php echo ($user["user_nicename"]); ?><b class="caret"></b></a>
	            <ul class="dropdown-menu pull-right">
	               <li><a href="<?php echo u('user/center/index');?>"><i class="fa fa-user"></i> &nbsp;个人中心</a></li>
	               <li class="divider"></li>
	               <li><a href="<?php echo u('user/index/logout');?>"><i class="fa fa-sign-out"></i> &nbsp;退出</a></li>
	            </ul>
	        <?php else: ?>
	            <a class="dropdown-toggle user" data-toggle="dropdown" href="#">
	           		<img src="/tpl/wctf//Public/images/headicon.png" class="headicon"/>登录<b class="caret"></b>
	            </a>
	            <ul class="dropdown-menu pull-right">
	               <li><a href="<?php echo U('api/oauth/login',array('type'=>'sina'));?>"><i class="fa fa-weibo"></i> &nbsp;微博登录</a></li>
	               <li><a href="<?php echo U('api/oauth/login',array('type'=>'qq'));?>"><i class="fa fa-qq"></i> &nbsp;QQ登录</a></li>
	               <li><a href="<?php echo u('user/login/index');?>"><i class="fa fa-sign-in"></i> &nbsp;登录</a></li>
	               <li class="divider"></li>
	               <li><a href="<?php echo u('user/register/index');?>"><i class="fa fa-user"></i> &nbsp;注册</a></li>
	            </ul><?php endif; ?>
          	</li>
		</ul>
       </div>
     </div>
   </div>
 </div>
<div class="container tc-main">
	<div class="row">
		<div class="span9">
			
			<div class="tc-box first-box article-box">
		    	<h2><?php echo ($game_title); ?></h2>
		    	<div class="article-infobox">
		    		<span><?php echo ($post_date); ?> by <?php echo ($user_nicename); ?></span>
		    		<span>
		    			<a href="javascript:;"><i class="fa fa-eye"></i><span><?php echo ($game_hits); ?></span></a>
						<a href="<?php echo U('article/do_like',array('id'=>$object_id));?>" class="J_count_btn"><i class="fa fa-thumbs-up"></i><span class="count"><?php echo ($game_like); ?></span></a>
						<a href="<?php echo U('user/favorite/do_favorite',array('id'=>$object_id));?>" class="J_favorite_btn" data-title="<?php echo ($game_title); ?>" data-url="<?php echo U('article/index',array('id'=>$tid));?>" data-key="<?php echo sp_get_favorite_key('games',$object_id);?>">
							<i class="fa fa-star-o"></i>
						</a>
					</span>
		    	</div>
		    	<hr>
		    	<div id="article_content">
		    	<?php echo ($game_content); ?>
		    	</div>
		    	<hr />
		    	<?php if($gl['right'] == 0): ?><div class="anwser">
		    		<div style="height:50px">
		    		<input type="text" id="anwser"/>
		    		</div>
		    		<div id="tip-anwser">
		    		<button onclick="javascript:check(<?php echo ($tid); ?>)" class="btn pull-right btn-primary J_ajax_submit_btn"><i class="fa fa-check"></i>&nbsp;回答</button>
		    		<?php if($gl['tiped'] == 1): ?><span class="tip"><?php echo ($tip); ?></span>
					<?php else: ?>
						<button id="btntip" onclick="javascript:tip(<?php echo ($tid); ?>)" class="btn pull-right btn-primary J_ajax_submit_btn"><i class="fa fa-leaf"></i>&nbsp;提示</button><?php endif; ?>
		    	
		    		</div>
		    	</div>
		    	<?php else: ?>
					<div class="tip" style="text-align:right;color:#428bca">此题已答！</div>
					<hr />
		    		<?php echo Comments("games",$object_id); endif; ?>
		    </div>
		    
		    <?php $ad=sp_getad("portal_article_bottom"); ?>
			<?php if(!empty($ad)): ?><div class="tc-box">
	        	<div class="headtitle">
	        		<h2>赞助商</h2>
	        	</div>
	        	<div>
		        	<?php echo ($ad); ?>
		        </div>
			</div><?php endif; ?>
		    
		</div>
		<div class="span3">
			<div class="tc-box first-box">
				<div class="headtitle">
	          		<h2>分享</h2>
	          	</div>
	          	<div class="bdsharebuttonbox"><a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a></div>
<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"2","bdSize":"32"},"share":{},"image":{"viewList":["weixin","tsina","qzone","tqq","renren"],"viewText":"分享到：","viewSize":"32"},"selectShare":{"bdContainerClass":null,"bdSelectMiniList":["weixin","tsina","qzone","tqq","renren"]}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
        	</div>
        	
        	<div class="tc-box">
	        	<div class="headtitle">
	        		<h2>热门训练</h2>
	        	</div>
	        	<div class="ranking">
	        		<?php $hot_articles=sp_sql_games("field:game_title,game_excerpt,tid,smeta;order:game_hits desc;limit:5;"); ?>
		        	<ul class="unstyled">
		        		<?php if(is_array($hot_articles)): foreach($hot_articles as $key=>$vo): $top=$key<3?"top3":""; ?>
							<li class="<?php echo ($top); ?>"><i><?php echo ($key+1); ?></i><a title="<?php echo ($vo["game_title"]); ?>" href="<?php echo U('article/index',array('id'=>$vo['tid']));?>"><?php echo ($vo["game_title"]); ?></a></li><?php endforeach; endif; ?>
					</ul>
				</div>
			</div>
			
			<div class="tc-box">
	        	<div class="headtitle">
	        		<h2>最新加入</h2>
	        	</div>
	        	<?php $last_users=sp_get_users("field:*;limit:0,8;order:create_time desc;"); ?>
	        	<ul class="list-unstyled tc-photos margin-bottom-30">
	        		<?php if(is_array($last_users)): foreach($last_users as $key=>$vo): ?><li>
	                    <a href="<?php echo U('user/index/index',array('id'=>$vo['id']));?>">
	                    <img alt="" src="<?php echo U('user/public/avatar',array('id'=>$vo['id']));?>">
	                    </a>
                    </li><?php endforeach; endif; ?>
                </ul>
			</div>
			
			<div class="tc-box">
	        	<div class="headtitle">
	        		<h2>最新评论</h2>
	        	</div>
	        	<div class="comment-ranking">
	        		<?php $last_comments=sp_get_comments("field:*;limit:0,5;order:createtime desc;"); ?>
	        		<?php if(is_array($last_comments)): foreach($last_comments as $key=>$vo): ?><div class="comment-ranking-inner">
	                        <i class="fa fa-comment"></i>
	                        <a href="<?php echo U('user/index/index',array('id'=>$vo['uid']));?>"><?php echo ($vo["full_name"]); ?>:</a>
	                        <span><?php echo ($vo["content"]); ?></span>
	                        <a href="/<?php echo ($vo["url"]); ?>#comment<?php echo ($vo["id"]); ?>">查看原文</a>
	                        <span class="comment-time"><?php echo date('m月d日  H:i',strtotime($vo['createtime']));?></span>
	                    </div><?php endforeach; endif; ?>
                </div>
			</div>
        	
		</div>
		
	</div>
              
<br><br><br>
<!-- Footer
      ================================================== -->
      <hr>

      <div id="footer" >
        <div class="links">
        友情链接：
        <?php $links=sp_getlinks(); ?>
        <?php if(is_array($links)): foreach($links as $key=>$vo): ?><a href="<?php echo ($vo["link_url"]); ?>" target="<?php echo ($vo["link_target"]); ?>"><?php echo ($vo["link_name"]); ?></a><?php endforeach; endif; ?>
        </div>
        <br />
        <div id="copyright" style="text-align:center">
          <p>
        Made in China by woldy
          </p>
        </div>
      </div>
      <div id="backtotop"><i class="fa fa-arrow-circle-up"></i></div>
      <?php echo ($site_tongji); ?>

</div>

<script type="text/javascript">
//全局变量
var GV = {
    DIMAUB: "/",
    JS_ROOT: "statics/js/",
    TOKEN: ""
};
</script>
<!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="/statics/js/jquery.js"></script>
    <script src="/statics/js/wind.js"></script>
    <script src="/tpl/wctf/Public/wctf/bootstrap/js/bootstrap.min.js"></script>
    <script src="/statics/js/frontend.js"></script>
	<script>
	$(function(){
		$('body').on('touchstart.dropdown', '.dropdown-menu', function (e) { e.stopPropagation(); });
		
		;(function($){
			$.fn.totop=function(opt){
				var scrolling=false;
				return this.each(function(){
					var $this=$(this);
					$(window).scroll(function(){
						if(!scrolling){
							var sd=$(window).scrollTop();
							if(sd>100){
								$this.fadeIn();
							}else{
								$this.fadeOut();
							}
						}
					});
					
					$this.click(function(){
						scrolling=true;
						$('html, body').animate({
							scrollTop : 0
						}, 500,function(){
							scrolling=false;
							$this.fadeOut();
						});
					});
				});
			};
		})(jQuery); 
		
		$("#backtotop").totop();
		
		
	});
	</script>


<script src="/tpl/wctf/Public/js/game.js"></script>
</body>
</html>