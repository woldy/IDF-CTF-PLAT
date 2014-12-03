<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>

	<html lang="en">
	<head>
		<title><?php echo ($site_seo_title); ?> <?php echo ($site_name); ?></title>
		<meta name="keywords" content="<?php echo ($site_seo_keywords); ?>" />
		<meta name="description" content="<?php echo ($site_seo_description); ?>">
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
		<link href="/tpl/wctf/Public/css/index.css" rel="stylesheet">
		<link href="/tpl/wctf/Public/css/slippry/slippry.css" rel="stylesheet">
		<style>
			.caption-wraper{position: absolute;left:50%;bottom:2em;}
			.caption-wraper .caption{
			position: relative;left:-50%;
			background-color: rgba(0, 0, 0, 0.54);
			padding: 0.4em 1em;
			color:#fff;
			-webkit-border-radius: 1.2em;
			-moz-border-radius: 1.2em;
			-ms-border-radius: 1.2em;
			-o-border-radius: 1.2em;
			border-radius: 1.2em;
			}
			@media (max-width: 767px){
				.sy-box{margin: 12px -20px 0 -20px;}
				.caption-wraper{left:0;bottom: 0.4em;}
				.caption-wraper .caption{
				left: 0;
				padding: 0.2em 0.4em;
				font-size: 0.92em;
				-webkit-border-radius: 0;
				-moz-border-radius: 0;
				-ms-border-radius: 0;
				-o-border-radius: 0;
				border-radius: 0;}
			}
		</style>
	</head>
<body class="body-white">
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

<?php $home_slides=sp_getslide("portal_index"); $home_slides=empty($home_slides)?$default_home_slides:$home_slides; ?>
<ul id="homeslider" class="unstyled">
	<?php if(is_array($home_slides)): foreach($home_slides as $key=>$vo): ?><li>
		<div class="caption-wraper">
			<div class="caption"><?php echo ($vo["slide_name"]); ?></div>
		</div>
		<a href="<?php echo ($vo["slide_url"]); ?>"><img src="<?php echo sp_get_asset_upload_path($vo['slide_pic']);?>" alt=""></a>
	</li><?php endforeach; endif; ?>
</ul>
<div class="container">
	
	<div>
		<h1 class="text-center">我们<font color="red">不发起</font>CTF</h1>
		<h3 class="text-center">我们只做CTF的<font color="red">训练营</font></h3>
	</div>
	<div class="row">
		<div class="span4">
			 <h2 class="font-large nospace"><i class="fa fa-bell"></i> 赛程预告</h2>
             <ul class="index-time">
             	<?php if(is_array($dynamic)): foreach($dynamic as $key=>$vo): ?><li><a href="index.php?g=portal&m=article&a=index&id=<?php echo ($vo["tid"]); ?>"><?php echo ($vo["post_title"]); ?></a><a class="<?php echo ($vo["link_class"]); ?>" href="<?php echo ($vo["post_url"]); ?>" target="_blank">
             	    	<?php if($vo[link_class]=='wait'): ?>>等待开启<
						<?php elseif($vo[link_class]=='reg'): ?>立即报名>>
						<?php elseif($vo[link_class]=='anwser'): ?>解题分享>><?php endif; ?>
             	    </a></li><?php endforeach; endif; ?>
             </ul>
		</div>
		<div class="span4">
			 <h2 class="font-large nospace"><i class="fa fa-tasks"></i> 牛刀小试</h2>
             <div id="ctf-test">
				<div class="test-text">
 					<?php echo ($test["game_content"]); ?>
				</div>  
				<div class="test-submit">
					<input type="text" id="anwser" /><b><a id="btnchk" style="font-size:16px" href="javascript:check(<?php echo ($test["tid"]); ?>)">开始抢答!</a></b><br />
					<a href="javascript:ntest()">下一题</a> 
					<a style="color:#ff0000" href="javascript:alert('下面那个精选习题就是！')">有能耐你整四岁的！</a> 	
				</div>     	
             </div>
		</div>
		<div class="span4">
			  <h2 class="font-large nospace"><i class="fa fa-share-alt"></i> 解题分享</h2>
             <ul class="index-share">
             	<?php if(is_array($share)): foreach($share as $key=>$vo): ?><li>
             		<a href="<?php if($vo[post_url]==''): ?>index.php?g=portal&m=article&a=index&id=<?php echo ($vo["tid"]); else: echo ($vo["post_url"]); endif; ?>" target="_blank"><?php echo ($vo["post_title"]); ?></a> <a class="author">by <?php echo ($vo["post_realauthor"]); ?></a>
             		</li><?php endforeach; endif; ?>
             </ul>
		</div>
	</div>
	
	<div class="row">
		<div class="span4">
			 <h2 class="font-large nospace"><i class="fa fa-flag"></i>  基础教学</h2>
			<ul class="index-share">
				<?php if(is_array($basic)): foreach($basic as $key=>$vo): ?><li>
						<a href="index.php?g=portal&m=article&a=index&id=<?php echo ($vo["tid"]); ?>"><?php echo ($vo["post_title"]); ?></a> <a class="author"><?php echo (substr($vo["post_date"],5,5)); ?></a>
             		</li><?php endforeach; endif; ?>
 
             </ul>
		</div>
		<div class="span4">
			 <h2 class="font-large nospace"><i class="fa fa-star"></i> 精选习题</h2>
             <div id="tagsList"> 
             <?php if(is_array($game)): foreach($game as $key=>$vo): ?><a href="index.php?g=game&m=article&a=index&id=<?php echo ($vo["tid"]); ?>"><?php echo ($vo["game_title"]); ?></a><?php endforeach; endif; ?>
	 
</div>
		</div>
		<div class="span4">
			  <h2 class="font-large nospace"><i class="fa fa-group"></i> 会员排行</h2>
			  <b>最近注册</b><br />
			  <p>
 				<?php if(is_array($nuser)): foreach($nuser as $key=>$vo): ?><a href="index.php?g=user&m=index&a=index&id=<?php echo ($vo["id"]); ?>"><?php echo ($vo["user_nicename"]); ?></a>、<?php endforeach; endif; ?>
			  </p>
			  <b>解题大牛</b><br />
			  <p>
 				<?php if(is_array($nbuser)): foreach($nbuser as $key=>$vo): ?><a href="index.php?g=user&m=index&a=index&id=<?php echo ($vo["id"]); ?>"><?php echo ($vo["user_nicename"]); ?></a>、<?php endforeach; endif; ?>
			  </p>	
			  <b><font color="red">妹纸！妹纸！</font></b><br />
			  <p>
			   	<?php if(is_array($guser)): foreach($guser as $key=>$vo): ?><a href="index.php?g=user&m=index&a=index&id=<?php echo ($vo["id"]); ?>"><?php echo ($vo["user_nicename"]); ?></a>、<?php endforeach; endif; ?>
			  </p>
			  <b>当前在线</b><br />
			  	<p>不好意思这个功能的代码不会写。。</p>
		</div>
	</div>
		<hr />
	<div class="ctf-info">
		<h1 class="text-center" id="idf_title">
			关于CTF
		</h1>
		<b>什么是CTF:</b><br />
		<p>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CTF全称Capture The Flag，即夺旗比赛，衍生自古代军事战争模式，两队人马前往对方基地夺旗，每队人马须在保护好己方旗帜的情况下将对方旗帜带回基地。在如今的计算机领域中，CTF已经成为安(hei)全(ke)竞赛的一种重要比赛形式，参赛选手往往需要组队参加，通过团队之间的相互合作使用逆向、解密、取证分析、渗透利用等技术最终取得flag。
		</p>
 		<b>CTF的比赛形式:</b><br />
 		<p>
 			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CTF夺旗赛通常有两种形式，解题模式（Jeopardy）和攻防模式（Attack-Defense）。在解题模式的比赛中，主办方会提供一系列不同类型的赛题，比如上线一个有漏洞的服务、提供一段网络流量、给出一个加密后的数据或经过隐写后的文件等，他们将 flag 隐藏在这些赛题中，选手们通过比拼解题来一决高下；在攻防模式比赛中，主办方会事先编写一系列有漏洞的服务，并将它们安装在每个参赛队伍都相同的环境中，参赛队伍一方面需要修补自己服务的漏洞，同时也需要去攻击对手们的服务、拿到对手环境中的 flag 来得分，攻防模式的竞赛往往比解题模式的竞赛更接近真实环境，比赛过程也更加激烈。
 		</p>
 		<b>CTF的常见题型:</b><br />
 		<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;一般在CTF比赛中，会涉及MISC，PPC，CRYPTO，PWN，REVERSE，WEB，STEGA这几种题目。<br />
 			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;MISC(miscellaneous)类型的题目比较杂乱，可能要分析数据，可能需要百度一下，还可能需要脑筋急转弯；PPC(Professionally ProgramCoder)会考察一些编程类的题目；是CRYPTO是密码学，考察各种加解密技术，当然这和软件加密解密的REVERSE技术是两码事。PWN在黑客俚语中代表着，攻破，取得权限，多为溢出类题目。STEGA(Steganography)会将flag隐藏到各种有码无码高清不高清的图片和音像制品中；WEB题目不用多说，大家都懂的。。
 		</p>
 		<b>国内外有哪些著名的CTF比赛:</b><br />
 		<p>
 			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>国内：</b>当然是最近炒得火热的<a href="http://www.xctf.org.cn">XCTF</a>全国联赛了！<br />
 			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>国外：</b><br />
 			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a>PHDays CTF</a>全称Positive Hack Days CTF，是一个国际性信息安全竞赛，竞赛规则基于CTF，但更贴近网络实战环境。<br />
 			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a>iCTF</a>国际黑客竞赛是一个面向全球信息安全专业研究学生团队的大型在线黑客竞赛。清华blue-lotus实验室在上届（2011）竞赛中排名第23位（共87个参赛团队）。<br />
 			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a>DEFCON</a>是世界上最大、最古老的地下黑客大会，和Black Hat的创始人相同，但相比于Black Hat要随意得多。DEFCON以小规模讨论及技术切磋为主，会上最流行的活动是若干人组成一个局域网，然后互打攻防战（CTF），参赛者的目标是进攻对手的网络，但同时保护好自己的地盘。由于想参赛的队伍都得经过会前淘汰赛，因此参赛者都有相当高的实力。
 		</p>
		<hr />
	</div>
	<div>
		<h1 class="text-center" id="idf_title">
			<a mid="0" href="http://idf.cn"  class="idf">IDF实验室</a>
			<span class="click_me">↙点我！！！</span>
		</h1>
		<h3 class="text-center" id="idf_member">
			<a mid="1" href="#" class="idf">寒</a>
			<a mid="2" href="#" class="idf">近</a>
			<a mid="3" href="#" class="idf">嗜</a>
			<a mid="4" href="#" class="idf">好</a>
			<a mid="5" href="#" class="idf">酒</a> 
			&nbsp; 
			<a mid="6" href="http://woldy.net" class="idf" target="_blank" color="#ff0000">剑</a>
			<a mid="7" href="#" class="idf">动</a>
			<a mid="8" href="#" class="idf">秀</a>
			<a mid="9" href="#" class="idf">清</a>
			<a mid="10" href="#" class="idf">风</a>
		</h3>
	</div>

	<div class="idf_describe">
		<div style="float:right;width:300px;margin-top:15px;">
			<div class="member_text" style="height:110px">
				IDF实验室全称<b>互联网情报威慑防御（之友）实验室</b>，2004-2005年孕育于中国鹰派联盟网,是一个由信息安全从业人员、专家及信息安全爱好者组成的独立第三方民间机构。
			</div>
			<div class="member_contact">
				电子邮箱:<a href="mailto:idf@idf.cn">idf@idf.cn</a><p/>
				新浪微博：@IDF实验室
			</p>
			</div>
		</div>
 		<img class="member_img" src="/statics/images/idf/idf_0.jpg"  style="width:150px;height:150px;" />
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


<script src="/tpl/wctf/Public/js/slippry.min.js"></script>
<script src="/tpl/wctf/Public/js/index.js"></script>
<script src="/tpl/wctf/Public/js/tags.js"></script>
<script src="/tpl/wctf/Public/js/game.js"></script>
<script>
$(function() {
	var demo1 = $("#homeslider").slippry({
		transition: 'fade',
		useCSS: true,
		captions: false,
		speed: 1000,
		pause: 5000,
		auto: true,
		preload: 'visible'
	});
});
</script>
</body>
</html>