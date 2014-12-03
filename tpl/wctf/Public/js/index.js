function get_info(id){
	var aj = $.ajax({
    	url:'index.php?g=api&m=idf&a=member',   
    	data: {
     		 id:id
    	},
    	type: 'get',
    	cache: false,
    	dataType: 'json',
    	success: function(data) {
      		if (data.errcode == "0") {
      			$(".member_text").html(data.text);
      			$(".member_contact").html(data.contact);
      			$(".member_img").attr("src","/statics/images/idf/idf_"+id+".jpg");
            $(".member_img").height(150);
            $(".member_img").width(150);
        	}
    	}
  });
}

function check(id){
  var aj = $.ajax({
      url:'index.php?g=Game&m=article&a=check',   
      data: {
         id:id,
         anwser:$("#anwser").val()
      },
      type: 'get',
      cache: false,
      dataType: 'json',
      success: function(data) {
           if (data.errcode == "0") {
               alert("恭喜你答对了！是不是觉得有点简单？登陆后尝试做一些精品习题吧！");
           }
           else{
              alert(data.str);
           }
      }
  });
}

function ntest(){
  var aj = $.ajax({
      url:'index.php?g=Portal&m=index&a=ntest',   
      data: {
      },
      type: 'get',
      cache: false,
      dataType: 'json',
      success: function(data) {
           if (data.errcode == "0") {
               $(".test-text").html(data.game_content);
               $("#btnchk").attr("href","javascript:check("+data.id+")");
           }
           else{
              alert(data.str);
           }
      }
  });
}




$(document).ready(function(){

	$(".idf").hover(//成员简介
    	function(){
        $(this).attr('color','#ff0000');
        get_info($(this).attr('mid'));
    	},
    	function(){
        	
    	}
	);

});