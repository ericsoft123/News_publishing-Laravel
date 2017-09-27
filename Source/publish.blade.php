<!doctype html>
<html>
<head>
<meta name="csrf-token" content="{{ csrf_token() }}" />
<title>Untitled Document</title>

<!--<script src="{{url('js/jquery.js')}}"></script>
<script src="{{url('js/bootstrap.min.js')}}"></script>-->
 
    
<link rel="stylesheet" href="{{URL('css/bootstrap.min.css')}}">

<!---->
<!-- Material Design Bootstrap -->
<link href="{{URL('css/mdb.min.css')}}" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="{{URL('css/style.css')}}" rel="stylesheet">
   
    <link rel="stylesheet" href="{{URL('css/animate.css')}}">
    
    <link href="{{URL('font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{URL('css/datepicker3.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="c{{URL('ss/survey.css')}}">
    <!-- JQuery -->
    <script type="text/javascript" src="{{URL('js/jquery-3.1.1.min.js')}}"></script>
    <script type="text/javascript" src="{{URL('js/jquery.typedtext.js')}}"></script>
    <!-- Data picker -->
   <script src="{{URL('js/bootstrap-datepicker.js')}}"></script>
    <script src="{{URL('js/typeahead.min.js')}}"></script>
    
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="{{URL('js/tether.min.js')}}"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="{{URL('js/bootstrap.min.js')}}"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="{{URL('js/mdb.min.js')}}"></script>
     <script src="{{ asset('js/app.js') }}"></script>
<!---->
<script src="{{url('js/jsajax.js')}}"></script>
<script src="{{url('js/validation.js')}}"></script>
<script src="{{url('js/publish.js')}}"></script>
</head>
 

<div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
  <div class="container test1"><!---div container start-->

    <!-- this is to center column in bootstrap using class="col-xs-1" align="center" -->
    	<!--<div class="col-xs-1 " align="center"><!--class col-xs-1" align="center" start-->
    	<div class="row">
    	
    	<div class="col-md-3">
    		
    	</div>
    	<div class="col-md-6 test animated bounceInRight" id="fullform"><!-- Start div that contain full form-->
   			<form class="form-horizontal" method="post" enctype="multipart/form-data" name="add_data" id="add_data" action="{{url('publish_news')}}">
    {{ csrf_field() }}
    			<div class="well">
    <div class="card-block">

        <!--Header-->
        <div class="text-center">
          
            <h3 class="demo"><i class="fa fa-pencil animated  bounce"></i><span id="demo-1"></span> </h3>
            <hr class="mt-2 mb-2">
        </div>

      
  <label id="valid" style="color: red">*Please choose any category</label>   
        <!--Body-->
         <div class="md-form form1" id="data_1">
                           
             <div class="input-group date">
           <span class="input-group-addon"><i class="fa fa-list"></i></span> <select id="category" name="category" class="form-control" selected  required>
           <!---->
            </select>
                                </div>
                            </div>
        <div class="md-form">
            <i class="fa fa-comment prefix"></i>
            <input type="text"  class="name tt-query" id="news_title" name="news_title" placeholder="News Title" required>
            <label for="form3" id="labelchange" ></label>
        </div>
       
        
        <div class="md-form form3">
            <i class="fa fa-user prefix"></i>
            <input type="file" name="imagefile" id="imagefile" class="form-control" required placeholder="enter some">
            
        </div>
         
          <div class="md-form form4">
            <i class="fa fa-comment prefix"></i>
            
             <textarea class="form-control" placeholder="Enter full news Text" id="news_text" name="news_text" required></textarea>
            <label for="form6" id="labelchange"></label>
        </div>
       
     
        
        <div class="md-form form8">
          
            <i class="fa fa-phone prefix"></i>
            <input type="text" id="reporter_email" name="reporter_email" class="form-control" required>
            <label for="form2" id="phone"></label>
        </div>

        <div class="text-center">
            <button class="btn btn-deep-orange"  id="publish_news" name="publish_news">Send</button>
        </div>

    </div>
</div>
    	</div>
    	</form>
		</div><!-- Start div that contain full form-->
    <p><a class="btn btn-primary btn-lg" href="#" role="button" id="start">ADD NEWS</a>
<div class="container">

	
	
<!--<input type="submit" id="testi" value="submit"/>-->

<h1></h1>

<div id="succ">


</div>
<!--jumbo data-->
    
    <div class="jumbotron" id="viewdetail">
    <div class="well">
    <div class="row">
    <div class="col-sm-6 col-md-4">
        <div class="thumbnail">
            <img src="images/010.jpg" alt="..." style="width:100%" id="photo_publish">
            <div class="caption">
               
            </div>
        </div>
    </div>
    <div class="thumbnail">
          <h6><i class="fa fa-list"></i> Category     :<span id="category_news"></span> <i class="fa fa-user"></i> Reporter    :<span id="reporter"></span> <i class="fa fa-calendar"></i> publish date    :<span id="date_publish"></span> </h6>
            <div class="caption">
                <h3 id="title">Thumbnail label</h3>
                <p id="full_text">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
                hs ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                <p><a href="#" class="btn btn-primary" role="button" id="reverse">Back</a>  
                </p>
            </div>
        </div>
    </div>
</div>
    </div>
   
</div>
    <!--jumbo data-->
<!-- table data that come from newscontroller.php-->
<div class="table-responsive" >
    <table class="table table-bordered" id="tabledata">
        <thead>
            <tr>
                <th>#</th>
                <th>Category</th>
                <th>News Title</th>
                <th>News Photo</th>
                <th>News Text</th>
                <th>Current Date and Time</th>
                <th>Reporter email</th>
                <th>Action</th>
                
            </tr>
        </thead>
        <?php $n=1; ?>
       @if(isset($users) && ($users!=null))
       @foreach($users as $user)
         <tbody>
            <tr>
                <th scope="row">{{$n}}</th>
                
                <td>{{$user->category}}</td>
                <td>{{$user->news_title}}</td>
                <td>{{$user->photo}}</td>
                <td>{{$user->news_text}}</td>
                <td>{{$user->created_at}}</td>
                <td>{{$user->reporter_email}}</td>
                <td>
                <a class="btn btn-danger" href="#" id="views"

onclick="return delete_funct('{{$user->id}}')">Delete</a>   <a class="btn btn-danger" href="#" id="views"

onclick="return view_funct('{{$user->id}}','{{$user->news_title}}','{{$user->photo}}','{{$user->news_text}}','{{$user->created_at}}','{{$user->category}}','{{$user->reporter_email}}')">View</a>
                </td>
                
            </tr>
           
        </tbody>
        
        <?php $n++;?>
       @endforeach
       @else
       
       <?php echo "succeess";?>
       @endif
        
    </table>
    
    
</div>
<!-- table data that come from newscontroller.php-->
</div>
<!--<input type="submit" id="donet" value="subm">
<div id="msg"></div>
<div id="succ">hello</div>
-->


</body>
</html>



