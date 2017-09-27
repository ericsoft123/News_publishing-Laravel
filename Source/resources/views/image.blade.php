<!doctype html>
<html>
<head>
<meta name="csrf-token" content="{{ csrf_token() }}" />
<title>Untitled Document</title>
<link rel="stylesheet" href="{{URL('css/bootstrap.min.css')}}">
<script src="{{url('js/jquery.js')}}"></script>
<script src="{{url('js/bootstrap.min.js')}}"></script>
<script src="{{url('js/jsajax.js')}}"></script>
<style>
	#done{
		margin:20%;
	}
	
	</style>


</head>
<body>
  <div id="container">
  	
  	<div id="done">
  	
  
   {{$name or ''}}
   
   
   
   
   </div>
    <form method="post" enctype="multipart/form-data" action="{{url('testa')}}">
        {{ csrf_field() }}
			<div>
				<input type="file" name="imagefile" id="imagefile">
			</div>
			<div>
				<input type="text" name="details" id="details">
			</div>
			<div>
				<input type="submit" name="sendpic" value="send" id="send"> 
			</div>
				
			</form>
		
		<div id="test"></div>
  </div>
   
</body>
</html>
