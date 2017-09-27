<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User; // this will call user model file
use App\Http\Requests;
use App\Http\Controllers\validate;
use Mail;
use Auth;// just to make login to test field of database if is equal to field of our login page
use DB;
use PDF;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

  public function getsignup()
  {
	  return view('auth.register');
  }
	public function postsignup(Request $request)
	{
		$this->checkdata_exist();
		$email=$request->input('email');
		//$confirmation_code['data'] = str_random(30);
		$str=str_random(25);
		$link=$email."".$str;
		$testi="localhost:8000/confirm?token='.$link";
		$token=$link;
		//localhost:8000/confirm?token=ericsoft123@gmail.comQhU3rnJ5dYji5nkqSJ7hZ7yzm"
		//$url='localhost:8000/confirm?token='.$token;
		
		$this->validate($request,[
			//validation of my form
			'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
		]);
		$user=new User([
			//this is to initialize model and input type
			'name'=>$request->input('name'),
			'email'=>$request->input('email'),
			'password'=>bcrypt($request->input('password')),
			'token'=>$token,
			
			
			
		]); // load class from user model to call fillable this will initialize table column with input
		$user->save();
		
		//email
		//php email confirmation message
				
			$mail = new PHPMailer;
		

$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);
						$mail->isSMTP();                                   // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
$mail->SMTPAuth = true;  
			$mail->isSMTP();                                   // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                            // Enable SMTP authentication
$mail->Username = 'excellentia1ltd@gmail.com';          // SMTP username
$mail->Password = '1234bigi'; // SMTP password
$mail->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                 // TCP port to connect to

$mail->setFrom('excellentia1ltd@gmail.com', 'PASSION CODER');
$mail->addReplyTo('excellentia1ltd@gmail.com', 'PASSION CODER');
$mail->addAddress($email);   // Add a recipient
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

$mail->isHTML(true);  // Set email format to HTML

$bodyContent ='<p><a href="http://localhost:8000/confirm?token='.$link.'">Click Here for confirmation</a></p>' ;
		//$bodyContent ='<p><a href="http://localhost:8000/confirm?email='.$email.'&&code='.$str.'">Click Here for confirmation</a></p>' ;

$bodyContent .= '<p>Sent by Eric Kayiranga in CODING TEST(PASSION CODER) ! <b>Email:ericsoft123@gmail.com</b></p>';

$mail->Subject = 'Email confirmation';
$mail->Body    = $bodyContent;

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
	
}
		
		///
		//email
		
return redirect()->route('login')->with('status','Check your inbox to confirm your registration Email');
	
	}
	public function postsignin(Request $request)
	{
		//$email="ericsoft123@gmail.com";
		$email=$request->input('email');
		$users=DB::select('select*from news_articles where reporter_email=:reporter_email',array('reporter_email'=>$email));
		//$users=DB::('select *from news_articles where reporter_email:email',array('reporter_email'=>$email));
		//$categories="hello";
		$this->validate($request,[
		'email'=>'required|string|email|max:255|',
		'password' => 'required|string|min:6|',
		]);
		if(Auth::attempt([
			'email'=>$request->input('email'), //means if it check username table =to input name them add input name;
			'password'=>$request->input('password'),
			'status'=>1,
			'token'=>0,
			
		]))
			
		{
			//return redirect()->route('read_news');
			return view('publish')->with('users',$users);
			
		}
		
	else{
		return redirect()->back()->with('status','Please make sure you have account or you have accepted confirmation in your inbox ');
	}
		
	}
	public function getsignin()
	{
		return view ("auth.login");
	}
	public function confirm()
		
	{
		$token=$_GET['token'];
		//$users=DB::delete('delete from users where token=:token',array('token'=>$token));
//		return redirect()->route('view_newspost');
		$users=DB::update('update users set status=1 where token=:token',array('token'=>$token));
		//return redirect()->route('resetlink')->with('status','confirmation email has been send')->with('token',$token);
		return view ('auth.Newpassword')->with('status','Thank you to register with us Type new password')->with('token',$token);
		//('update news_articles set views_no=views_no+1 where id=:id',array('id'=>$id));
		
	}
	public function pdfall(Request $request){
	//where id=:id',array('id'=>$id)
		$id=$_GET['id'];
		$download='pdfall';
		$news_articles=DB::select('select *from news_articles where id=:id',array('id'=>$id));
		view()->share('news_articles',$news_articles);
		
			
			$pdf=PDF::loadView('pdfall');
			
			return $pdf->download('pdfall');
		
	
		//return view('pdfall');
	}
		public function pdfone(Request $request){
		$news_articles=DB::select('select *from news_articles');
		view()->share('news_articles',$news_articles);
		if($request->has('download')){
			$pdf=PDF::loadView('pdfone');
			return $pdf->download('pdfone');
		
		}
		return view('pdfone');
	}
	public function resetlink(){
		
	}
		public function reset(){
			
			$mail = new PHPMailer;
//variable
       /* $fc_purchased=$_POST['fc'];
		$exchange_rate_fc=$_POST['value'];
		$surch_percentage=$_POST['surch'];
		$amount_fc_purchase=$_POST['foreign'];
		$exchange_zar=$_POST['exchange_zar'];
		$amount_paid_zar=$_POST['tot_paid'];
	    $amount_surch=$_POST['amount_surcharge'];
        $email=$_POST['email'];
        $today = date("Y-m-d H:i:s"); */ 
		

//variable
$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);
						$mail->isSMTP();                                   // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
$mail->SMTPAuth = true;  
			$mail->isSMTP();                                   // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                            // Enable SMTP authentication
$mail->Username = 'excellentia1ltd@gmail.com';          // SMTP username
$mail->Password = '1234bigi'; // SMTP password
$mail->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                 // TCP port to connect to

$mail->setFrom('excellentia1ltd@gmail.com', 'PASSION CODER');
$mail->addReplyTo('excellentia1ltd@gmail.com', 'PASSION CODER');
$mail->addAddress('ericsoft123@gmail.com');   // Add a recipient
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

$mail->isHTML(true);  // Set email format to HTML

$bodyContent = 'hello keb';
$bodyContent .= '<p>Sent by Eric Kayiranga in CODING TEST(PASSION CODER) ! <b>Email:ericsoft123@gmail.com</b></p>';

$mail->Subject = 'ORDERS DETAILS from USERS CODED BY PASSION CODER';
$mail->Body    = $bodyContent;

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
	// visit our site www.studyofcs.com for more learning
}

			
 
			
		}
	public function newpassword(Request $request){
		
		$token=$request->input('token');
		$pass=$request->input('password');
		//$password=$request->input('password');
		$password=bcrypt($pass);
		$this->validate($request,[
			
            'password' => 'required|string|min:6|confirmed',
		]);
		$users=DB::update("update users set password='$password',token=0 where token=:token",array('token'=>$token));
		//$users=DB::update("update users set token=0 where token=:token",array('token'=>$token));
		
		
		//if(!$users){
			return redirect()->route('getsignin')->with('status','Thank you. you can use your new password');
			
	//	}
		//return redirect()->back()->with('status','check again')->with('token',$token);
		
	}
	public function getuserdata(){
		$email="ericsoft123@gmail.com";
		$users=DB::select('select*from news_articles where reporter_email=:reporter_email',array('reporter_email'=>$email));
		//$users=DB::select('select*from news_articles '); //reporter_email:reporter_email',array('reporter_email'=>$email));
		return $users;
	}
public function autosavecategory()
	{
		
		
	$news_category=new \App\Category([
	'category'=>'Technology'
	]);
	
	$news_category->save();
	$news_category=new \App\Category([
	'category'=>'Science'
	]);
	
	$news_category->save();
		$news_category=new \App\Category([
	'category'=>'Sport'
	]);
	
	$news_category->save();
	$news_category=new \App\Category([
	'category'=>'Health'
	]);
	
	$news_category->save();
		$news_category=new \App\Category([
	'category'=>'LifeStyle'
	]);
	
	$news_category->save();
	$news_category=new \App\Category([
	'category'=>'Entertainment'
	]);
	
	$news_category->save();
		$news_category=new \App\Category([
	'category'=>'World'
	]);
	
	$news_category->save();
	$news_category=new \App\Category([
	'category'=>'Others'
	]);
	
	$news_category->save();
	}
	public function checkdata_exist()
	{
		//to check if there is a data in category table
$categories=DB::select('select *from categories');
		$data_exist=DB::select('select *from categories where id=1');
		if(!$data_exist)
		{
			$this->autosavecategory();
			return view('publish')->withCategories($categories);
		}
		else{
			
			return view('publish')->withCategories($categories);
		}
		
		
	}
	public function sendemail_multiple()//This Method is only for Testing Purpose
	{
		
	//	$users=DB::select("select *from subscribes");
//	foreach($users as $user)
//	{
//		$emails[]=$user->email;
//		
//		
//	}
//	//print_r($emails) ;
//			Mail::send('news', [$emails], function($message) use ($emails)
//{    
//    $message->to($emails)->subject('This is test e-mail');    
//});
//var_dump( Mail:: failures());
//exit;
		//$updatelatest=DB::update('update news_articles set latest=0 where latest=latest ORDER by created_at  LIMIT 2');
		//$count=DB::table('news_articles')
//			->where('latest','latest')
//			->orderBy('created_at','desc')
//			->count('latest');
//		echo $count;
		$count=DB::table('news_articles')
			->where('latest','latest')
			->count('latest');
			
			
		echo $count;
		
		//echo $collection = collect($users['email']);
		//$emails = ['ericsoft123@gmail.com', 'kebine123@gmail.com'];
		
	

	}
}

