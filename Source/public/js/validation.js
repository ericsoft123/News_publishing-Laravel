// JavaScript Document


	
	

      $(document).ready(function() {
        /**
         * The second parameter could either be a string (Possible values: slow, medium, fast),
         * an integer, or it could be left blank and in that case the amount of milliseconds that
         * will pass before typing the upcoming letter will be 66.
         **/
		   //$("label:contains('name')").css({"color":"red"});
		  var x="Type Store Name";
		 
		
		 
		 
        $("#demo-1").typedText("Complete Survey.", "slow");
		  $("#storename").typedText(x, "slow");
		  
		   $("#managername").typedText("Manager's Name", "slow");
		   //$("#phone").typedText("your number 0782389359", "slow");
		  function addfunct()
		  {
			   $("#storename").append("<span>*</span>");
			  $("#managername").append("<span>*</span>");
				  $(".md-form span").css({"color":"red"});
		  }
		 var timestart=setInterval(function(){
			 addfunct()
			 clearInterval(timestart);
		 },2000);
		
		  
		  //start  input 3 event as form3 id
		  $('#form3').keydown(function(){
			  var x=$('#form3').val();
			  if(x.toString().length>=1)
				  {
			  $('.form4').show();
			  $('.form4').addClass('animated bounceInRight');
				  }
			   else{
				   $('.form4').hide();
			   }
			  
			  
		  });
		   $('#form3').keyup(function(){
			  var x=$('#form3').val();
			  if(x.toString().length>=3)
				  {
			  $('.form4').show();
			  $('.form4').addClass('animated bounceInRight');
				  }
			   else
				   {
					   $('.form4').hide();
				   }
			   
			  
		  });
		  //end  input 3 event as form3 id
		  //start  input 4 event as form4 id
		  $('#form4').keydown(function(){
			  var z=$('#form4').val();
			  if(z.toString().length>=3)
				  {
			  $('.form5').show();
			  $('.form5').addClass('animated bounceInRight');
				  }
			   else{
				   $('.form5').hide();
			   }
			  
			  
		  });
		   $('#form4').keyup(function(){
			  var z=$('#form4').val();
			  if(z.toString().length>=3)
				  {
			  $('.form5').show();
			  $('.form5').addClass('animated bounceInRight');
				  }
			   else
				   {
					   $('.form5').hide();
				   }
			   
			  
		  });
		  
		  //end  input 4 event as form4 id
		  //start  input 5 event as form5 id
		  $('#form5').keydown(function(){
			  var m=$('#form5').val();
			  if(m.toString().length>=3)
				  {
			  $('.form6').show();
			  $('.form6').addClass('animated bounceInRight');
				  }
			   else{
				   $('.form6').hide();
			   }
			  
			  
		  });
		   $('#form5').keyup(function(){
			  var m=$('#form5').val();
			  if(m.toString().length>=3)
				  {
			  $('.form6').show();
			  $('.form6').addClass('animated bounceInRight');
				  }
			   else
				   {
					   $('.form6').hide();
				   }
			   
			  
		  });
		  
		  //end  input 5 event as form5 id
		  
		  
		  //start  input 6 event as form6 id
		  $('#form6').keydown(function(){
			  var b=$('#form6').val();
			  if(b.toString().length>=3)
				  {
			  $('.form7').show();
			  $('.form7').addClass('animated bounceInRight');
				  }
			   else{
				   $('.form7').hide();
			   }
			  
			  
		  });
		   $('#form6').keyup(function(){
			  var b=$('#form6').val();
			  if(b.toString().length>=3)
				  {
			  $('.form7').show();
			  $('.form7').addClass('animated bounceInRight');
				  }
			   else
				   {
					   $('.form7').hide();
				   }
			   
			  
		  });
		  
		  
		  //end  input 6 event as form6 id
		  
		  
		  //start  input 7 event as form7 id
		  $('#form7').change(function(){
			  var c=$('#form7').val();
			  if(c.toString().length>=3)
				  {
					  $("#phone").typedText(" 0782389359", "slow");
			  $('.form8').show();
					  $('.form2').show();
					 // $("#send").show();
			  $('.form8').addClass('animated bounceInRight');
				  }
			   else{
				   $('.form8').hide();
			   }
			  
			  
		  });
		  
		   
		  
		  //end  input 7 event as form7 id
		  //start  input 9 event as form9 id
		  $('#comment').keydown(function(){
			  var t=$('#comment').val();
			  if(t.toString().length>=3)
				  {
			  $('.form6').show();
			  $('.form6').addClass('animated bounceInRight');
				  }
			   else{
				   $('.form6').hide();
			   }
			  
			  
		  });
		   $('#comment').keyup(function(){
			  var v=$('#comment').val();
			  if(v.toString().length>=3)
				  {
			  $('.form6').show();
			  $('.form6').addClass('animated bounceInRight');
				  }
			   else
				   {
					   $('.form6').hide();
				   }
			   
			  
		  });
		  
		  //end  input 9 event as form9 id
		/*$("#demo-2").typedText("Morbi ut ante quis libero tincidunt pharetra.", "medium");
		$("#demo-3").typedText("Nam non orci metus. Donec semper quam at libero viverra.", "fast");*/
      });
		
      // START SURVEY BUTTON

	$(document).ready(function(){
		$('#start').click(function(){
			$('#viewdetail').hide();
			 $('#fullform').show();
			$('#start').addClass('animated bounceOutLeft');
			$('#one').hide();
			$("#demo-1").typedText("Add News in Database.", "slow");
		  $("#storename").typedText(x, "slow");
		  
		   $("#managername").typedText("Manager's Name", "slow");
			
		});
	});

    
   //END SURVEY BUTTON-->
	// animation jquery-->
	
      $(document).ready(function() {
        /**
         * The second parameter could either be a string (Possible values: slow, medium, fast),
         * an integer, or it could be left blank and in that case the amount of milliseconds that
         * will pass before typing the upcoming letter will be 66.
         **/
        $("#demo").typedText("Complete form:", "slow");
		  //hide check icon by default
		  $('#check').hide();
		  $('#fullform').hide();
		
      });
		
   
	//START AUTOCOMPLETE JAVASCRIPT-->
	
		$(document).ready(function(){
			 $('Label.form3').typeahead({
        name: 'form-control',
        remote:'storename.php?id=%QUERY',
        limit : 10
    });
		});
		
	
    //start button

$(document).ready(function(){
		$('#start').click(function(){
			 $('#fullform').show();
			$('#start').addClass('animated bounceOutLeft');
			$('#one').hide();
			$("#demo-1").typedText("Complete Survey.", "slow");
		  $("#storename").typedText(x, "slow");
		  
		   $("#managername").typedText("Manager's Name", "slow");
		});
	});