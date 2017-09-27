// JavaScript Document
//send data in database code
	$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

	$(document).ready(function(){
		$('#publish_news').click(function(){
			
		var news_title=$('#news_title').val();
			var photo=$('#photo').val();
		var news_text=$('#news_text').val();
			var reporter_email=$('#reporter_email').val();
			
			
			 $.ajax({
        type: "POST",
        url: './publish_news',
		data: $('#add_data').serialize(), 
        //data:{news_title:news_title,photo:photo,news_text:news_text,reporter_email:reporter_email},
        success: function(data) {
            console.log("Geodata sent");
			console.log(data.users);
			//window.location = "./boots"; 
			//window.location = "LinkTagOut.aspx?variabletopass=test"; 
			
        }
				 
    });
			
		});
	});

function delete_funct(id,reporter_email)
{
	var delete_id=+id;
	
	
	var link="./read_news?reporter_email="+reporter_email;
	 $.ajax({
        type: "POST",
        url:'./delete_newspost',
        data:{delete_id:delete_id},
        success: function(data) {
            console.log("Geodata sent");
			window.location =link; 
			//window.location = "LinkTagOut.aspx?variabletopass=test"; 
			//location.reload();
		console.log(data.users);
        }
    });
	return false;
}
	

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

function view_funct(id,news_title,photo,news_text,created_at,category,reporter_email)
{
	var fullimage='images/'+photo;
	//console.log(id);
	
	$('#photo_publish').attr('src',fullimage);
	console.log(id);
	$('#title').text(news_title);
	//$('#photo_publish').text(photo);
	$('#full_text').text(news_text);
	$('#date_publish').text(created_at);
	$('#category_news').text(category);
	$('#reporter').text(reporter_email);
	$('#tabledata').addClass('animated bounceOutLeft');
	
	
	
	
	$('#viewdetail').addClass('animated bounceInRight');
	$('#viewdetail').show();
	$('#fullform').hide();
	$('#start').show();
	return false;
	 
}

$(document).ready(function(){
		$('#reverse').click(function(){
			
			$('#viewsdetail').hide();
			//$('#tabledata').show();
			$('#tabledata').removeClass('animated bounceOutLeft');
			$('#tabledata').addClass('animated bounceInRight');
			('#viewdetail').removeClass('animated bounceInRight');
			$('#viewdetail').addClass('animated bounceOutLeft');
			
			
		});
	});



//get categories database data
function getcategories()
{
	
	$.ajax({
		url:'./getcategories',
		type:'get',
		
		success:function(data)
		{
			
			
			var categoriesdata=data.categories;
			//this load data update data directly when is success update
				
			var getcategory='<option disabled selected required>choose news category';
		for(var i=0;i<categoriesdata.length;i++)
			{
				getcategory+=` 
        
        

        
           	<option id="catval">${categoriesdata[i].category}</option>
           	
           
        `;
			}
		getcategory+='</option>';
			$('#category').html(getcategory);
			
		}
	});
}
//validation select option
function validselect(){
	var category=$('#category').val();
	if(category!="choose news category")
		{
			$('#publish_news').hide();
		}else{
		$('#publish_news').show();	
			$('#valid').hide();
		}
}
function loadtable(){
	
}
$(document).ready(function(){
	// hide on startup
	
	$('#category').bind('change',function(event){
		var category=$('#category').val();
		if(category!="choose news category")
		{
			$('#valid').hide();
		$('#publish_news').show();		
		}else{
		
			$('#publish_news').hide();
		}
	});
				
			
});

$(document).ready(function(){
	// hide on startup
	//delete_funct();
	validselect();
	getcategories();
	$('#viewdetail').hide();
});