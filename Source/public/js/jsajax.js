// JavaScript Document
//send data in database code
	$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

	$(document).ready(function(){
		$('#publish_news').click(function(){
			
			//var news_title=$('#news_title').val();
//			var photo=$('#photo').val();
//			var news_text=$('#news_text').val();
//			var reporter_email=$('#reporter_email').val();
			
			
			 $.ajax({
        type: "POST",
        url: './publish_news',
		data: $('#add_data').serialize(), 
        //data:{news_title:news_title,photo:photo,news_text:news_text,reporter_email:reporter_email},
        success: function(data) {
            console.log("Geodata sent");
			//window.location = "./boots"; 
			//window.location = "LinkTagOut.aspx?variabletopass=test"; 
			
        },
				 
    });
			
		});
	});

//function delete_funct(id)
//{
//	var delete_id=+id;
//	//alert(delete_id);
//	 $.ajax({
//        type: "POST",
//        url:'./delete_newspost',
//        data:{delete_id:delete_id},
//        success: function() {
//            console.log("Geodata sent");
//			//window.location = "./boots"; 
//			//window.location = "LinkTagOut.aspx?variabletopass=test"; 
//			location.reload();
//		
//        }
//    });
//}
//	

$(document).ready(function(){
		$('#donet').click(function(e){
			
			var news_title=$('#news_title').val();
			
			
			 $.ajax({
        type: "POST",
        url: './getmsg',
        data:{news_title:news_title},
        success: function(data) {
			$("#msg").html(data.news_title);
			$('#succ').html(data.msg);
            console.log("Geodata sent");
			//window.location = "./boots"; 
			//window.location = "LinkTagOut.aspx?variabletopass=test"; 
			//location.reload();
		
        }
    });
			e.preventDefault();
		});
	});

function view_funct(id,news_title,photo,news_text,created_at)
{
	console.log(id);
	$('#title').text(news_title);
	$('#photo_publish').text(photo);
	$('#full_text').text(news_text);
	$('#date_publish').text(created_at);
	 
}

	
	
//send data in database code

//get data from database
/*$(document).ready(function(){
	 $.ajax({
        type: "GET",
        url: './getdata',
       
        success: function(data) {
            $('#succ').html(data);
			console.log(data);
        }
    });
});*/

//get data from database
	