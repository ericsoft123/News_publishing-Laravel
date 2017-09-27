// JavaScript Document

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
            <img src="" alt="..." style="width:100%" class="img-thumbnail">
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
	
	getcategories();
});
