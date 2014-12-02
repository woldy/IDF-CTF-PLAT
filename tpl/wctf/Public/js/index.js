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