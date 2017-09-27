<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{{URL('css/bootstrap.min.css')}}">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 12px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/getsign') }}">Login</a>
                        <a href="{{ url('/getsignup') }}">Register</a>
                    @endif
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                    
      

                <div class="links">
                    
                </div>
               <div class="container">
              	              <?php 
				   include("php/connect.php");
				   //$sql="SELECT *FROM news_articles WHERE latest='latest' ORDER by created_at  LIMIT 2";
				   $sql="SELECT *FROM news_articles WHERE latest='latest'";
				   //$sql="SELECT *FROM news_articles";
				   $result=mysqli_query($con,$sql);
				   while($row=mysqli_fetch_assoc($result))
				   {
					   ?>
					   
					   <div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><?php echo $row["news_title"]; ?></h3>
    </div>
    <div class="panel-body">
       <?php  echo $row["news_text"];?>
    </div>
</div>
					   <?php
					  
				   }
				   
				   ?>

                </div>
               </div>
            </div>
        </div>
    </body>
</html>
