<?php
#http://ctf.woldy.net/index.php?g=api&m=idf&a=member
namespace Api\Action;
class IdfAction{
	 function member(){//成员信息
	 	$info = array(
	 		'0' =>array(//IDF
	 			'text'=> 'IDF实验室全称<b>互联网情报威慑防御（之友）实验室</b>，2004-2005年孕育于中国鹰派联盟网,是一个由信息安全从业人员、专家及信息安全爱好者组成的独立第三方民间机构。',
	 			'contact'=>'电子邮箱:<a href="mailto:idf@idf.cn">idf@idf.cn</a><p>新浪微博：@IDF实验室'
	 		), 
	 		'1' =>array( //韩弈
	 			'text'=> '韩弈',
	 			'contact'=>'QQ：xxxxxxxxxxx'
	 		), 
	 		'2' =>array(//童进
	 			'text'=> '<b>童进</b>，北京思普崚技术有限公司应用开发工程师。擅长Linux下C应用开发、防火墙及IDS协议分析与检测。',
	 			'contact'=>'电子邮箱:<a href="mailto:idf@idf.cn">idf@idf.cn</a><p>新浪微博：@IDF实验室'
	 		), 
	 		'3' =>array(//张世会
	 			'text'=> '<b>张世会</b>，联想集团信息安全主管。擅长思科网络、系统虚拟化及系统/网络运维。',
	 			'contact'=>'电子邮箱:<a href="mailto:idf@idf.cn">idf@idf.cn</a><p>新浪微博：@IDF实验室'
	 		), 
	 		'4' =>array(//裴伟伟
	 			'text'=> '<b>裴伟伟</b>，具有两年数据库管理经验、四年的项目开发经验及两年的项目管理经验，擅长软件开发及安全服务项目管理、Windows/Linux应用开发。',
	 			'contact'=>'电子邮箱:<a href="mailto:idf@idf.cn">idf@idf.cn</a><p>新浪微博：@IDF实验室'
	 		), 
	 		'5' =>array(//何久
	 			'text'=> '<b>何久</b>，启明星辰网络安全服务工程师。擅长Web应用及系统渗透测试，具有多年网络安全服务经验。',
	 			'contact'=>'电子邮箱:<a href="mailto:idf@idf.cn">idf@idf.cn</a><p>新浪微博：@IDF实验室'
	 		), 
	 		'6' =>array(//魏志伟
	 			'text'=> '<b>魏志伟</b>，网名-天孤剑-，就职于某搜索引擎公司，CTF训练营发起者。自幼编程，熟悉各种编程语言的hello world，擅长WEB开发，号称可以从前做到后，从后做到前，一边写代码，一边搞安全。最大的梦想是微博粉丝过百。',
	 			'contact'=>'电子邮箱：<a href="mailto:king@woldy.net">king@woldy.net</a><p>新浪微博：<a href="http://weibo.com/woldy" target="_blank">@无所不能的魂大人</a>'
	 		), 
	 		'7' =>array(//孙希栋
	 			'text'=> '<b>孙希栋</b>，启明星辰产品研发工程师。擅长Linux下C应用及内核开发。',
	 			'contact'=>'电子邮箱:<a href="mailto:idf@idf.cn">idf@idf.cn</a><p>新浪微博：@IDF实验室'
	 		), 
	 		'8' =>array(//李秀烈
	 			'text'=> '<b>李秀烈</b>，启明星辰研发工程师。擅长网络应用协议分析。',
	 			'contact'=>'电子邮箱:<a href="mailto:idf@idf.cn">idf@idf.cn</a><p>新浪微博：@IDF实验室'
	 		), 
	 		'9' =>array(//王清
	 			'text'=> '<b>王清</b>，启明星辰研发工程师。擅长网络应用协议分析。',
	 			'contact'=>'电子邮箱:<a href="mailto:idf@idf.cn">idf@idf.cn</a><p>新浪微博：@IDF实验室'
	 		), 
	 		'10' =>array(//封畅
	 			'text'=> '<b>封畅</b>，具有多年的Web应用开发经验。擅长.Net、PHP应用开发，目前从事移动应用后端应用开发。',
	 			'contact'=>'电子邮箱:<a href="mailto:idf@idf.cn">idf@idf.cn</a><p>新浪微博：@IDF实验室'
	 		), 
	 	);

	 	$id=intval($_GET['id']);
	 	$res=$info[$id];
	 	$res['errcode']=0;
	 	$res['text']=$res['text'];
	 	$res['contact']=$res['contact'];
	 	echo json_encode($res);
	 }
}