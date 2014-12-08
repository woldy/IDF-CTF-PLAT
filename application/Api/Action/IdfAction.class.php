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
	 			'text'=> '<b>韩奕</b>，网名韩小狼，中科院信息安全专业硕士，持有CISP资格认证，某所研究员，擅长移动客户端取证、无线网络攻击、恶意代码分析、加密/解密及逆向脱壳技术。曾经在《计算机工程》、《保密科学技术》发表多篇信息安全论文。',
	 			'contact'=>'新浪微博：@韩小小小狼'
	 		), 
	 		'2' =>array(//童进
	 			'text'=> '<b>童进</b>，网名cumirror，持有机械工程与心理学双学位，中南大学软件工程专业硕士，曾就职于山石网科研发中心，Ubuntu控，应用开发工程师，擅长Linux/Windows下C/C++应用开发及网络流量分析，熟悉国内各类防火墙/IDS产品。',
	 			'contact'=>'新浪微博：@cumirror'
	 		), 
	 		'3' =>array(//张世会
	 			'text'=> '<b>张世会</b>，网名土豆，又名土豆院长、做个好土豆，联想集团信息安全主管，持有Cisco CCIE-Security和RedHat RHCA认证，大数据技术爱好者，擅长运维开发、网络/系统架构及虚拟化技术。',
	 			'contact'=>'新浪微博：@蠟筆小新de憂傷'
	 		), 
	 		'4' =>array(//裴伟伟
	 			'text'=> '<b>网名做个好人</b>，HITCON 2014讲师，曾于神州数码从事数据分析处理工作，执着的C/C++程序员，擅长Linux/Windows应用开发、加密/解密及逆向工程，熟悉常见Web攻防技术及系统运维。',
	 			'contact'=>'新浪微博：@repoog'
	 		), 
	 		'5' =>array(//何久
	 			'text'=> '<b>何久</b>，启明星辰ADLab安全工程师，擅长Web漏洞挖掘、渗透测试以及安全加固，熟悉入侵检测技术，参与并负责IDS事件特征开发，移动安全爱好者，对收集各种漏洞有着浓厚的兴趣。',
	 			'contact'=>'新浪微博：@这些年a这些事'
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
	 			'text'=> '李秀烈，启明星辰研发工程师，持有信息安全服务工程（高级）证书及CISP证书，擅长PHP应用开发及应用流量特征分析，熟悉TCP/IP协议，有P2P协议流量特征分析经验。',
	 			'contact'=>'电子邮箱:<a href="mailto:idf@idf.cn">idf@idf.cn</a><p>新浪微博：@IDF实验室'
	 		), 
	 		'9' =>array(//王清
	 			'text'=> '王清，网名Gin，乌云白帽子，曾就职于启明星辰、天融信安全服务团队，擅长Web应用及系统渗透测试，熟悉常见的Web漏洞攻击、防御以及国内各大厂商IDS/IPS和漏洞扫描产品，曾参与多项国内大型企业的渗透测试项目。',
	 			'contact'=>'电子邮箱:<a href="mailto:idf@idf.cn">idf@idf.cn</a><p>新浪微博：@IDF实验室'
	 		), 
	 		'10' =>array(//封畅
	 			'text'=> '<b>封畅</b>，Web开发工程师，信息安全爱好者。在前后端均有涉猎，具有多年全栈开发经验，熟悉.NET，PHP。现在某创业公司负责移动App的服务器端开发。 ',
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