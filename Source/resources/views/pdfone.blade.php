<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>

 <script type="text/javascript" src="{{URL('js/jquery.js')}}"></script>
 <script src="{{url('js/pdf.js')}}"></script>
</head>


<body>

<!--<div id="getresult"></div>-->
	
</div>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<style>
	img{
		width:100%;
	}
	
	</style>
</head>

<body>
@foreach($news_articles as $news_article)


<h1>{{$news_article->news_title}}</h1>  <span>Category:{{$news_article->category}}</span> <span>Date Posted:{{$news_article->created_at}}</span> <span>writen by: {{$news_article->reporter_email}} </span>
<h1></h1>
<span><img src="images/001.JPG"  alt=""/></span>
<p>{{$news_article->news_text}}</p>

@endforeach

</body>
</html>
</body>
</html>
