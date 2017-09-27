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
<!--<script src="{{url('js/jsajax.js')}}"></script>-->
<script type="text/javascript">
	var urlink="{{route('pdfall',['download'=>'pdfall'])}}";
	//var urlink="{{route('addexport',['download'=>'pdfall'])}}";
	</script>
<script src="{{url('js/validation.js')}}"></script>
<script src="{{url('js/homenews.js')}}"></script>

<style>
	#panelbody{
		  
    white-space: nowrap; 
    width: 100em;
     height: 7em;
    overflow: hidden;
    text-overflow: ellipsis; 
    width:100%;
	  
	}
	</style>
</head>
  

<body>
	<div id="reka"></div>
<nav class="navbar navbar-inverse"><!--Start Nav Code-->
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Brand</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"> <a href="{{route('pdfone',['download'=>'pdfone'])}}"><i class="fa fa-download"></i> Download Displayed News<span class="sr-only">(current)</span></a>
        
        <li><a href="#">Link</a></li>
        <li class="dropdown" >
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Search Category <span class="caret"></span></a>
          <ul class="dropdown-menu" id="getcategory">
           <!--data from database categories to display categories-->
             
          </ul>
        </li>
      </ul>
     <!-- <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>-->
      <ul class="nav navbar-nav navbar-right">
        <li><a href="{{ route('getsignup') }}">Register</a></li>
         <li><a href="{{ route('getsignin') }}">Login</a></li>
        
      </ul>
   
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<!--End Nav Code-->

<div class="container"> <!--start container-->
	
	
    <div class="well">
		<marquee direction="left"><h3>ADMIN ANNOUNCMENT OR NEW NOTIFICATION  <?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// Create database
$sql = "CREATE DATABASE news";
if ($conn->query($sql) === TRUE) {
   // echo "Database created successfully";
} else {
    //echo "Error creating database: " . $conn->error;
}

$conn->close();
?>
//	 <?php
//$dat_host = "localhost";
//$username = "root";
//
//$datab_name="news";
//$pass = "";
//$con=mysqli_connect($dat_host,$username,$pass,$datab_name);
//// Create connection
////$conn = new mysqli($servername, $username, $password);
//// Check connection
//if ($con->connect_error) {
//    die("Connection failed: " . $con->connect_error);
//} 
//
//// Create database
//$sql = "select *from categories";
//			$result=mysqli_query($con,$sql);
//			while($rows=mysqli_fetch_assoc($result)){
//				echo $rows['category'];
//			}
//
//
//$con->close();
//
	//include('php/db.php');		
			?></h3>	</marquee>
		</div>
<hr>
<!--slide -- pic-->
<div class="btn-group btn-group-justified" role="group" aria-label="...">
    <div class="btn-group" role="group">
        <button type="button" class="btn btn-default">NEWS</button>
    </div>
    <div class="btn-group" role="group">
        <button type="button" class="btn btn-default">ADVERTISEMENT</button>
    </div>
    <div class="btn-group" role="group">
        <button type="button" class="btn btn-default">OTHERS</button>
    </div>
</div>

<!--slide -- pic-->
<!--test-->
<!-- form view full information-->
<ul class="list-group" id="fullinfos">
  <li class="list-group-item text-center" id="titles">Cras justo odio
  
  </li>
  <li class="list-group-item"><img src="images/002.jpg" id="image" style="width:100%"></li>
  <li class="list-group-item">
  	<p id="full_text">Full Text</p>
 
  </li>
   <li class="list-group-item" >
   	 <span class="label label-primary" ><i class="fa fa-list"></i>:<span id="category"></span> </span> 	<span class="label label-danger">Posted:<span id="created_at"></span> </span>    <span class="label label-default">  by:<span id="reporter_email"></span></span>
   	
   </li>
  <li class="list-group-item">
  		<a href="#"><i class="fa fa-eye"></i> <span class="badge" id="views_no"></span></a> <a href="#"> <i class="fa fa-comments"></i> <span class="badge" id="comment_no"></span></a> <a href="#" id="changehref"> <i class="fa fa-download"></i> <span class="badge" id="export_no"></span></a>
 <a href="#"><i class="fa fa-thumbs-up"></i> <span class="badge" id="like_no"></span></a>
  	
  </li>
  <li class="list-group-item" id="getcomment">
  	 <!--comment-->
  	  
                                                
  	 <!--comment-->
  	
  </li>
  <li class="list-group-item">
  	<h4 class="text-center">Comment</h4>
  	
  </li>
  <li class="list-group-item">
  
  	<input type="hidden" name="news_title" id="title_news">
  	 	<input type="hidden" name="news_text" id="text_news">
  	 	<input type="hidden" name="news_id" id="news_id">
  	 	 <input type="hidden" name="email_reporter" id="email_reporter"> 
  		<div class="md-form">
            <i class="fa fa-envelope"></i>
            <input type="text"  class="name tt-query"  name="comment_email" id="comment_email" placeholder="fill email or Name" required>
            <label for="form3" id="labelchange" ></label>
        </div>
        
          <div class="md-form form4">
            <i class="fa fa-comment prefix"></i>
            
             <textarea class="form-control" placeholder="Enter full news Text"  name="comment_text" id="comment_text" required></textarea>
            <label for="form6" id="labelchange"></label>
        </div>
        <div class="text-center">
            <button class="btn btn-deep-orange"  id="submit_comments" name="publish_news">Send</button>
        </div>

  	
  </li>
</ul>

<!-- form view full information-->

<!--test-->
<div class="row" id="news"><!-- start form loading data 1-->
    <div class="col-sm-6 col-md-4" id="getresult">
       <!-- replace with ajax-->
       <!--replace with ajax-->
    </div>
    
    <div class="col-sm-6 col-md-4"><!-- start middle -->
       
        <div class="thumbnail">
            <img src="images/bmw.jpg" alt="...">
            <div class="caption">
                <h3>Thumbnail label</h3>
                <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
        
                <p><a href="#" class="btn btn-primary" role="button">Button</a>  <a href="#" class="btn btn-default" role="button">Button</a>
                </p>
            </div>
        </div>
        
        <div class="thumbnail">
            <img src="images/bmw.jpg" alt="...">
            <div class="caption">
                <h3>Thumbnail label</h3>
                <p id>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                
                <p><a href="#" class="btn btn-primary" role="button">Button</a>  <a href="#" class="btn btn-default" role="button">Button</a>
                </p>
            </div>
        </div>
        
        <div class="thumbnail">
            <img src="..." alt="...">
            <div class="caption">
                <h3>Thumbnail label</h3>
                <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                <p><a href="#" class="btn btn-primary" role="button">Button</a>  <a href="#" class="btn btn-default" role="button">Button</a>
                </p>
            </div>
        </div>
        
        <div class="thumbnail">
            <img src="..." alt="...">
            <div class="caption">
                <h3>Thumbnail label</h3>
                <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                <p><a href="#" class="btn btn-primary" role="button">Button</a>  <a href="#" class="btn btn-default" role="button">Button</a>
                </p>
            </div>
        </div>
        
        <div class="thumbnail">
            <img src="..." alt="...">
            <div class="caption">
                <h3>Thumbnail label</h3>
                <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                <p><a href="#" class="btn btn-primary" role="button">Button</a>  <a href="#" class="btn btn-default" role="button">Button</a>
                </p>
            </div>
        </div>
        
        <div class="thumbnail">
            <img src="..." alt="...">
            <div class="caption">
                <h3>Thumbnail label</h3>
                <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                <p><a href="#" class="btn btn-primary" role="button">Button</a>  <a href="#" class="btn btn-default" role="button">Button</a>
                </p>
            </div>
        </div>
        
        <div class="thumbnail">
            <img src="..." alt="...">
            <div class="caption">
                <h3>Thumbnail label</h3>
                <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                <p><a href="#" class="btn btn-primary" role="button">Button</a>  <a href="#" class="btn btn-default" role="button">Button</a>
                </p>
            </div>
        </div>
        
        <div class="thumbnail">
            <img src="..." alt="...">
            <div class="caption">
                <h3>Thumbnail label</h3>
                <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                <p><a href="#" class="btn btn-primary" role="button">Button</a>  <a href="#" class="btn btn-default" role="button">Button</a>
                </p>
            </div>
        </div>
        
        <div class="thumbnail">
            <img src="..." alt="...">
            <div class="caption">
                <h3>Thumbnail label</h3>
                <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                <p><a href="#" class="btn btn-primary" role="button">Button</a>  <a href="#" class="btn btn-default" role="button">Button</a>
                </p>
            </div>
        </div>
        
        <div class="thumbnail">
            <img src="..." alt="...">
            <div class="caption">
                <h3>Thumbnail label</h3>
                <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                <p><a href="#" class="btn btn-primary" role="button">Button</a>  <a href="#" class="btn btn-default" role="button">Button</a>
                </p>
            </div>
        </div>
    </div><!-- end middle -->
    
    <div class="col-sm-6 col-md-4"><!-- start left -->
        <div class="thumbnail">
            <img src="..." alt="...">
            <div class="caption" id="notify">
             
                <p><a href="#" class="btn btn-primary" role="button">Button</a>  <a href="#" class="btn btn-default" role="button">Button</a>
                </p>
            </div>
        </div>
        <div class="thumbnail">
            <img src="..." alt="...">
            <div class="caption">
                <marquee direction="up">   <h3><a href="index.php">Thumbnail label</a></h3>
                <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                for any issue you can contact us on excellentialtd@gmail.com</marquee>
                         <form class="navbar-form navbar-left" >
        <div class="form-group">
          <input type="text"  placeholder="Enter your email" id="email">
        </div>
        <button type="submit"  id="subscribe">Subscribe</button>
      </form>
                <p><a href="php/rss.php" class="btn btn-primary" role="button"><i class="fa fa-rss" aria-hidden="true"></i> View Rssfeed</a>  <a href="#" class="btn btn-default" role="button">Button</a>
                </p>
            </div>
        </div>
        <div class="thumbnail">
            <img src="..." alt="...">
            <div class="caption">
                <h3>Thumbnail label</h3>
                <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                <p><a href="#" class="btn btn-primary" role="button">Button</a>  <a href="#" class="btn btn-default" role="button">Button</a>
                </p>
            </div>
        </div>
        <div class="thumbnail">
            <img src="..." alt="...">
            <div class="caption">
                <h3>Thumbnail label</h3>
                <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                <p><a href="#" class="btn btn-primary" role="button">Button</a>  <a href="#" class="btn btn-default" role="button">Button</a>
                </p>
            </div>
        </div>
        <div class="thumbnail">
            <img src="..." alt="...">
            <div class="caption">
                <h3>Thumbnail label</h3>
                <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                <p><a href="#" class="btn btn-primary" role="button">Button</a>  <a href="#" class="btn btn-default" role="button">Button</a>
                </p>
            </div>
        </div>
        <div class="thumbnail">
            <img src="..." alt="...">
            <div class="caption">
                <h3>Thumbnail label</h3>
                <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                <p><a href="#" class="btn btn-primary" role="button">Button</a>  <a href="#" class="btn btn-default" role="button">Button</a>
                </p>
            </div>
        </div>
        <div class="thumbnail">
            <img src="..." alt="...">
            <div class="caption">
                <h3>Thumbnail label</h3>
                <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                <p><a href="#" class="btn btn-primary" role="button">Button</a>  <a href="#" class="btn btn-default" role="button">Button</a>
                </p>
            </div>
        </div>
        <div class="thumbnail">
            <img src="..." alt="...">
            <div class="caption">
                <h3>Thumbnail label</h3>
                <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                <p><a href="#" class="btn btn-primary" role="button">Button</a>  <a href="#" class="btn btn-default" role="button">Button</a>
                </p>
            </div>
        </div>
        <div class="thumbnail">
            <img src="..." alt="...">
            <div class="caption">
                <h3>Thumbnail label</h3>
                <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                <p><a href="#" class="btn btn-primary" role="button">Button</a>  <a href="#" class="btn btn-default" role="button">Button</a>
                </p>
            </div>
        </div>
        <div class="thumbnail">
            <img src="..." alt="...">
            <div class="caption">
                <h3>Thumbnail label</h3>
                <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                <p><a href="#" class="btn btn-primary" role="button">Button</a>  <a href="#" class="btn btn-default" role="button">Button</a>
                </p>
            </div>
        </div>
    </div>
    
</div><!-- end form loading data 1-->

</div><!--end container-->

<!--footer-->
<div class="well">
	  <!-- *** FOOTER ***
 _________________________________________________________ -->
        <div id="footer" data-animate="fadeInUp">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <h4>Pages</h4>

                        <ul>
                            <li><a href="text.html">About us</a>
                            </li>
                            <li><a href="text.html">Terms and conditions</a>
                            </li>
                            <li><a href="faq.html">FAQ</a>
                            </li>
                            <li><a href="#">Contact us</a>
                            </li>
                        </ul>

                        <hr>

                        <h4>User section</h4>

                        <ul>
                            <li><a href="#" data-toggle="modal" data-target="#login-modal">Login</a>
                            </li>
                            <li><a href="register.php">Register</a>
                            </li>
                        </ul>

                        <hr class="hidden-md hidden-lg hidden-sm">

                    </div>
                    <!-- /.col-md-3 -->

                    <div class="col-md-3 col-sm-6">

                        <h4>Top categories</h4>

                        <h5>News</h5>

                        <ul>
                            <li><a href="category.php">Technology</a>
                            </li>
                            <li><a href="category.php">Science</a>
                            </li>
                            <li><a href="category.php">Entertainement</a>
                            </li>
                        </ul>

                        <h5>Others</h5>
                        <ul>
                            <li><a href="category.php"></a>
                            </li>
                            <li><a href="category.php">Sport</a>
                            </li>
                            <li><a href="category.php">LifeStyle</a>
                            </li>
                            <li><a href="category.php">Health</a>
                            </li>
                        </ul>

                        <hr class="hidden-md hidden-lg">

                    </div>
                    <!-- /.col-md-3 -->

                    <div class="col-md-3 col-sm-6">

                        <h5>Where to find us</h5>

                        <p><strong>excellentia Ltd.</strong>
                            <br>13/25 Pinestreet
                            <br>Kwazulu Natal
                            <br>45Y 73J
                            <br>Durban
                            <br>
                            <strong>South Africa</strong>
                        </p>

                        <a href="contact.php">Go to contact page</a>

                        <hr class="hidden-md hidden-lg">

                    </div>
                    <!-- /.col-md-3 -->



                    <div class="col-md-3 col-sm-6">

                        <h4>Get the news</h4>

                        <p class="text-muted">Please subcribe to our email to get new update .</p>

                        <form>
                            <div class="input-group">

                                <input type="text" class="form-control">

                                <span class="input-group-btn">

			    <button class="btn btn-default" type="button">Subscribe!</button>

			</span>

                            </div>
                            <!-- /input-group -->
                        </form>

                        <hr>

                        <h4>Stay in touch</h4>

                        <p class="social">
                            <a href="#" class="facebook external" data-animate-hover="shake"><i class="fa fa-facebook"></i></a>
                            <a href="#" class="twitter external" data-animate-hover="shake"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="instagram external" data-animate-hover="shake"><i class="fa fa-instagram"></i></a>
                            <a href="#" class="gplus external" data-animate-hover="shake"><i class="fa fa-google-plus"></i></a>
                            <a href="#" class="email external" data-animate-hover="shake"><i class="fa fa-envelope"></i></a>
                        </p>


                    </div>
                    <!-- /.col-md-3 -->

                </div>
                <!-- /.row -->

            </div>
            <!-- /.container -->
        </div>
        <!-- /#footer -->

        <!-- *** FOOTER END *** -->




        <!-- *** COPYRIGHT ***
 _________________________________________________________ -->
        <div id="copyright">
            <div class="container">
                <div class="col-md-6">
                    <p class="pull-left">© 2017 Kayiranga Eric.</p>

                </div>
                <div class="col-md-6">
                    <p class="pull-right"> by <a href="#navigation" class="scroll-to">ericsoft123@gmail.com</a>
                         <!-- Not removing these links is part of the license conditions of the . Thanks for understanding :) If you want to use the  without the attribution links, you can do so after supporting further themes development at https://excellentia1.com/donate  -->
                    </p>
                </div>
            </div>
        </div>
        <!-- *** COPYRIGHT END *** -->



    </div>
    <!-- /#all -->


</div>
<div class="well"><marquee direction="RIGHT">for any issue you can contact us on excellentialtd@gmail.com</marquee></div>
<!--footer-->
<!-- modal-->
<div class="modal inmodal" id="myModal2" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content animated flipInY">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <h2><i class="fa fa-thumbs-up modal-icon " style="color: blue"></i></h2><span></span>
                                            
                                            
                                        </div>
                                        <div class="modal-body alert-success">
                                            <p><strong>Thank you for Taking</strong> your Time to This Survey  
                                                and we will continue to be in Touch with you.</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                            
                                        </div>
                                    </div>
                                </div>
                                </div>
<!--modal-->
</body>
</html>



