<!doctype html>
<html><head>
<meta name="csrf-token" content="{{ csrf_token() }}" />
<title>Untitled Document</title>

<!--<script src="{{url('js/jquery.js')}}"></script>
<script src="{{url('js/bootstrap.min.js')}}"></script>-->
 
    

<link rel="stylesheet" href="{{URL('css/bootstrap.min.css')}}">
<!---->
<!-- Material Design Bootstrap -->
<link href="{{URL('css/mdb.min.css')}}" rel="stylesheet">
<!--     Your custom styles (optional) -->
    <link href="{{URL('css/style.css')}}" rel="stylesheet">
   
    <link rel="stylesheet" href="{{URL('css/animate.css')}}">
    
    <link href="{{URL('font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{URL('css/datepicker3.css')}}" rel="stylesheet">
    
    <!-- JQuery -->
    <script type="text/javascript" src="{{URL('js/jquery.js')}}"></script>
    <script type="text/javascript" src="{{URL('js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{URL('js/jquery.typedtext.js')}}"></script>
    <!-- Data picker -->
   <script src="{{URL('js/bootstrap-datepicker.js')}}"></script>
    <script src="{{URL('js/typeahead.min.js')}}"></script>
    
    <!-- Bootstrap tooltips -->
    <!--<script type="text/javascript" src="{{URL('js/tether.min.js')}}"></script>
     Bootstrap core JavaScript -->
    
    <!-- MDB core JavaScript--> 
    <script type="text/javascript" src="{{URL('js/mdb.min.js')}}"></script>
    
<!-- customer script-->
<script src="{{url('js/jsajax.js')}}"></script>
<script src="{{url('js/validation.js')}}"></script>

<body>
<!--test-->
<div class="row" id="news"><!-- start form loading data 1-->
    <div class="col-sm-6 col-md-4">
       @if(isset($news) && ($news!=null))
       @foreach($news as $new)
        <div class="thumbnail"><!--start news-->
            <img src="images/{{$new->photo}}" alt="..." style="width:100%" class="img-thumbnail">
            <ul class="list-group">
            <!--removed parts-->
  <li class="list-group-item">
  	<a href="#">Inbox<span class="badge" >{{$new->views_no}}</span></a><a href="#">Inbox<span class="badge">{{$new->comment_no}}</span></a><a href="#">Inbox<span class="badge">{{$new->export_no}}</span></a>
<a href="#">Inbox<span class="badge">{{$new->like_no}}</span></a>
  </li>
  
  <!--removed parts-->
  <li class="list-group-item">
  <span class="label label-primary"><i class="fa fa-list"></i>:{{$new->category}} </span> 	<span class="label label-danger">Posted:{{$new->created_at}} </span>    <span class="label label-default">  by:{{$new->reporter_email}}</span> 
  </li>
  
</ul>
              <div class="caption">
               
                <h5>{{$new->news_title}}</h5>
                <p>{{$new->news_text}}</p>
                
            </div>
        </div>
        <hr><!--news code-->
        @endforeach
         	 @else
       
       
       @endif
    </div>
</body>
</html>