// JavaScript Document
$(document).ready(function(){
	// hide on startup
	$('#fullinfos').hide();
});
//get views update

//get views
//write for full view

function Readmore(id,photo,created_at,reporter_email,news_title,news_text,category,views_no,comment_no,export_no,like_no)
{

	//var download='http://localhost:8000/pdfall?id='.id;
	var fullimage='images/'+photo;
	//console.log(id);
	
	$('#image').attr('src',fullimage);
	$('#created_at').text(created_at);
	$('#reporter_email').text(reporter_email);
	
	$('#titles').text(news_title);
	$('#full_text').text(news_text);
	
	$('#category').text(category);
	
	
	$('#comment_no').text(comment_no);
	$('#export_no').text(export_no);
	$('#like_no').text(like_no);
	$('#text_news').val(news_text);
	$('#title_news').val(news_title);
	$('#email_reporter').val(reporter_email);
	$('#news_id').val(id);
	//$('#changehref').attr("href",link);
	$('#news').hide();
	$('#fullinfos').show();
	
	//send data to controller via ajax to add comment
	$.ajax({
		url:'./addviews',
		type:'get',
		data:{id:id},
		success:function(data)
		{
			console.log(data.check_update_views);
					
			var views=data.check_update_views;
			
			$('#views_no').text(views[0].views_no);
			
				loaddata();
			loaddata_comments();
		}
	});
	
	return false ;
	//to avoid data to be reloaded
	 
}
function post_comments() // start code load data from comments table using ajax
{
	//alert("hello");
	    var news_id=$('#news_id').val();
	    var title_news=$('#title_news').val();
		var text_news=$('#text_news').val();
		var email_reporter=$('#email_reporter').val();
		var comment_email = $('#comment_email').val();
		var comment_text= $('#comment_text').val();
	
	
	//$('#news_id').val(id);
	$.ajax({
		
		url:'./postcomments',
		type:'get',
		data:{news_id:news_id,title_news:title_news,text_news:text_news,email_reporter:email_reporter,comment_email:comment_email,comment_text:comment_text},
		success:function()
		{
			
			
			
			//this load data update data directly when is success update
				loaddata_comments();
		}
	});
}// end code load data from comments table using ajax
function loaddata_comments() // start code load data from comments table using ajax
{
	var news_id=$('#news_id').val();
	
	$.ajax({
		url:'./getcomments',
		type:'get',
		data:{news_id:news_id},
		success:function(data)
		{
			
			
			var commentdata=data.comments;
			//this load data update data directly when is success update
				loaddata();
			var getcomment='<ul class="list-group">';
		for(var i=0;i<commentdata.length;i++)
			{
				getcomment+=` 
        
        <div class="feed-element">
                                                    <a href="profile.html" class="pull-left">
                                                        <img alt="image" class="img-circle" src="images/avatar.jpg" style="width:38px;heigh:38px">
                                                    </a>
                                                    <div class="media-body ">
                                                        <small class="pull-right">2h ago</small>
                                                        <strong>${commentdata[i].comment_email}</strong> posted message on  <br>
                                                        <small class="text-muted">${commentdata[i].created_at}</small>
                                                        <div class="well">
                                                           ${commentdata[i].comment}
                                                        </div>
                                                        <div class="pull-right">
                                                            <a class="btn btn-xs btn-white"><i class="fa fa-thumbs-up"></i> Like </a>
                                                        </div>
                                                    </div>
                                                </div>
       
        `;
			}
		getcomment+='</ul>';
			$('#getcomment').html(getcomment);
			
		}
	});
}// end code load data from comments table using ajax


$(document).ready(function(){ //comment
	// hide on startup
	$('#submit_comments').click(function(e){
		post_comments();
		
		e.preventDefault();
	});
	
	
});//comment

function loaddata(){//load data from news_articles table using ajax
	
	$.ajax({
		url:'./getnews',
		type:'get',
		success:function(data)
		{
			console.log(data.news);
			var getnewsdata=data.news;
		/*	for(var i=0;i<getnewsdata.length;i++)
				{
					console.log(getnewsdata[0].id);
					
					
				}*/
			
			
			//var urllink="{{route('pdfall')}}";
			var news_articles='<ul class="list-group">';
		for(var i=0;i<getnewsdata.length;i++)
			{
				news_articles+=` 
        <div class="thumbnail"><!--start news-->
            <img src="images/${getnewsdata[i].photo}" alt="..." style="width:100%" class="img-thumbnail">
            <ul class="list-group">
            <!--removed parts-->
  <li class="list-group-item">
  	<a href="#"><i class="fa fa-eye"></i> <span class="badge" >${getnewsdata[i].views_no}</span></a> <a href="#"><i class="fa fa-comments"></i> <span class="badge">${getnewsdata[i].comment_no}</span></a> <a href=""><i class="fa fa-download" onclick="return download('${getnewsdata[i].id}','${getnewsdata[i].news_title}')"></i> <span class="badge">${getnewsdata[i].export_no}</span></a>
<a href="#"><i class="fa fa-thumbs-up" onclick="return like('${getnewsdata[i].id}')" id="like"></i> <span class="badge">    ${getnewsdata[i].like_no}</span></a>
  </li>
  
  <!--removed parts-->
  <li class="list-group-item">
  <span class="label label-primary"> <i class="fa fa-list"></i>:${getnewsdata[i].category}</span> 	  <span class="label label-danger"> <i class="fa fa-calendar-o"></i> Posted:${getnewsdata[i].created_at} </span>    <span class="label label-default">  <i class="fa fa-user"></i> by:${getnewsdata[i].reporter_email}</span> 

  </li>
  
</ul>
              <div class="caption">
               
                <h5 name="str2">${getnewsdata[i].news_title}</h5>
                <p name="str">${getnewsdata[i].news_text}</p>
                <input type="hidden" name="id_news" value="${getnewsdata[i].id}">
                 <p><a href="#" id="Readmore" onclick="return Readmore('${getnewsdata[i].id}','${getnewsdata[i].photo}','${getnewsdata[i].created_at}','${getnewsdata[i].reporter_email}','${getnewsdata[i].news_title}','${getnewsdata[i].news_text}','${getnewsdata[i].category}','${getnewsdata[i].views_no}','${getnewsdata[i].comment_no}','${getnewsdata[i].export_no}','${getnewsdata[i].like_no}')" >Read more</a></p>
                
                <!--<p><a href="#" class="btn btn-primary" role="button">Button</a>  <a href="#" class="btn btn-default" role="button">Button</a>
                </p>-->
            </div>
        </div>
        <hr>
        
        
       
       
        `;
			}
		news_articles+='</ul>';
			$('#getresult').html(news_articles);
			
			
				
		}
	});	
}//end code load data from news_articles table using ajax
//start like function
function like(id){
	//call controller to add like data in database using databas
	
	$.ajax({
		url:'./addlike',
		type:'get',
		data:{id:id},
		success:function()
		{
			
			
			
			//this load data update data directly when is success update
				loaddata();
		}
	});
	
	return false;
	//return false means it prevent reload page and add return to that function that receive data
}
//end like function


function download(id) //start function download or export
{
		$.ajax({
		url:'./addexport',
		type:'get',
		data:{id:id},
		success:function()
		{
			
			
		
			
			//this load data update data directly when is success update
				loaddata();
			
		}
	});
	
	return false;
} //end function download or export


function getcategories()
{
	
	$.ajax({
		url:'./getcategories',
		type:'get',
		
		success:function(data)
		{
			
			
			var categoriesdata=data.categories;
			//this load data update data directly when is success update
				loaddata();
			var getcategory='<ul class="list-group">';
		for(var i=0;i<categoriesdata.length;i++)
			{
				getcategory+=` 
        
        <li><a href="#" onclick="getcatid('${categoriesdata[i].category}')">${categoriesdata[i].category}</a></li>
  <li role="separator" class="divider"></li>
           
        `;
			}
		getcategory+='</ul>';
			$('#getcategory').html(getcategory);
			
		}
	});
}
function getcatid(category)
{
	$.ajax({
		url:'./searchnews',
		type:'get',
		data:{category:category},
		success:function(data)
		{
			//console.log(data.news);
			var getnewsdata=data.searchnews;
		/*	for(var i=0;i<getnewsdata.length;i++)
				{
					console.log(getnewsdata[0].id);
					
					
				}*/
			
			var news_articles='<ul class="list-group">';
		for(var i=0;i<getnewsdata.length;i++)
			{
				news_articles+=` 
        <div class="thumbnail"><!--start news-->
            <img src="images/${getnewsdata[i].photo}" alt="..." style="width:100%" class="img-thumbnail">
            <ul class="list-group">
            <!--removed parts-->
  <li class="list-group-item">
  	<a href="#"><i class="fa fa-eye"></i> <span class="badge" >${getnewsdata[i].views_no}</span></a> <a href="#"><i class="fa fa-comments"></i> <span class="badge">${getnewsdata[i].comment_no}</span></a> <a href="#"><i class="fa fa-download" onclick="return download('${getnewsdata[i].id}')"></i> <span class="badge">${getnewsdata[i].export_no}</span></a>
<a href="#"><i class="fa fa-thumbs-up" onclick="return like('${getnewsdata[i].id}')" id="like"></i> <span class="badge">    ${getnewsdata[i].like_no}</span></a>
  </li>
  
  <!--removed parts-->
  <li class="list-group-item">
  <span class="label label-primary"> <i class="fa fa-list"></i>:${getnewsdata[i].category}</span> 	  <span class="label label-danger"> <i class="fa fa-calendar-o"></i> Posted:${getnewsdata[i].created_at} </span>    <span class="label label-default">  <i class="fa fa-user"></i> by:${getnewsdata[i].reporter_email}</span> 
 
  </li>
  
</ul>
              <div class="caption">
               
                <h5>${getnewsdata[i].news_title}</h5>
                <p>${getnewsdata[i].news_text}</p>
                <input type="hidden" name="id_news" value="${getnewsdata[i].id}">
                 <p><a href="#" id="Readmore" onclick="return Readmore('${getnewsdata[i].id}','${getnewsdata[i].photo}','${getnewsdata[i].created_at}','${getnewsdata[i].reporter_email}','${getnewsdata[i].news_title}','${getnewsdata[i].news_text}','${getnewsdata[i].category}','${getnewsdata[i].views_no}','${getnewsdata[i].comment_no}','${getnewsdata[i].export_no}','${getnewsdata[i].like_no}')" >Read more</a></p>
                
                <!--<p><a href="#" class="btn btn-primary" role="button">Button</a>  <a href="#" class="btn btn-default" role="button">Button</a>
                </p>-->
            </div>
        </div>
        <hr>
        
        
       
       
        `;
			}
		news_articles+='</ul>';
			$('#getresult').html(news_articles);
			$('#fullinfos').hide();
				$('#news').show();
			
			
				
		}
	});
}
$(document).ready(function(){
	// hide on startup
	$('#subscribe').click(function(ready){
		var email=$('#email').val();
		alert(email);
		$.ajax({
			url:"./subscribe",
			method:"get",
			data:{email:email},
			success:function(){
				$('#myModal2').show();
			}
			
		});
	});
});

function multilinetext()
{
 //var str=$('p.caption').text();
	var str=$("p[name*='str']").text( );

	//var str=$('#str').text();
	
//	alert(str.length);
	if(str.length>1)
		{
			
		$('#str').text((str.substring(0,1)+"...."));
		}
	else{
	$('#str').text(str);
	}
}
function getnotification()

{
	$.ajax({
		url:"./getnotification",
		method:"get",
		success:function(data)
		{
			console.log(data.notification);
			var notify=data.notification;
			//this load data update data directly when is success update
				
			var notification='<marquee direction="up">';
		for(var i=0;i<notify.length;i++)
			{
				notification+=` 
        <h3><a href="">${notify[i].news_title
}</a></h3>
                <p>${notify[i].news_title
}</p>
                for any issue you can contact us on excellentialtd@gmail.com
        `;
			}
		notification+='</marquee>';
			$('#notify').html(notification);
			
		}
			
		
	});
}
$(document).ready(function(){
	// hide on startup
//	console.log('hello');
	multilinetext();
	loaddata();
	loaddata_comments();
	getcategories();
	getnotification();
});
