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
               alert(data.str);
               location.reload(); 
           }
           else{
              alert(data.str);
           }
      }
  });
}

function tip(id){
  if(confirm('获取提示后将会使积分减半，确定获取提示？')){
      var aj = $.ajax({
      url:'index.php?g=Game&m=article&a=tip',   
      data: {
         id:id
      },
      type: 'get',
      cache: false,
      dataType: 'json',
      success: function(data) {
          if (data.errcode == "0") {
               $("#btntip").hide();
               $("#tip-anwser").append("<span class='tip'>"+data.str+"</span>");
          }
          else{
            alert(data.str);
          }
      }
  });
  }
}
