<?php

namespace App\Http\Controllers;
use App\mailtest;
use App\mailtest\index;
use Illuminate\Http\Request;
use DB;
use Mail;

// You may need to do:
// use \PHPMailer;
class NewsController extends Controller
{
    //
	public function publish_news(Request $request)
	{
		
		$reporter_email=$request->input('reporter_email');
		
		$imagefile = $request->file('imagefile');
		//$count=DB::table('news_articles')->count('latest');
		//here is  to count where  in table we will have latest column equal latest and orderby  column created_at desc then it will update
		$count=DB::table('news_articles')
			->where('latest','latest')
			->orderBy('created_at','desc')
			->count('latest');
		if($count==2)
		{
			//send email and delete latest news
			
			//if(isset($imagefile) && ($imagefile!=null))
			if(isset($reporter_email) && ($reporter_email!=null)) //This isset is to check if sometime you will run this router method without $eporter_email variable it can skilp this process and take else case
		{
		
	$target=public_path("images/").basename($_FILES["imagefile"]["name"]); //initialize Image to be uploaded and set folder path
	   $category = $request->input('category');
	   $news_title = $request->input('news_title');
		$news_text = $request->input('news_text');
		$reporter_email= $request->input('reporter_email');
        $today = date("Y-m-d H:i:s"); 
			$latest="latest";
	$imagefile=$_FILES['imagefile']["name"];
	
	$usertest=DB::insert ('insert into news_articles(category,news_title,photo,news_text,reporter_email,created_at,updated_at,latest) values(?,?,?,?,?,?,?,?)',array($category,$news_title,$imagefile,$news_text,$reporter_email,$today,$today,$latest));
			///This query is to insert image and all input field submit by publisher to table (news_articles)
			$users=DB::select('select*from news_articles where  reporter_email=:reporter_email',array('reporter_email'=>$reporter_email));//This query is userfull just to select only one user data who is login
		//return view('publish')->withUsers($users);
			
	if(move_uploaded_file($_FILES["imagefile"]["tmp_name"],$target))
	{
		$name="successfull uploaded";
		//$this->read_news($reporter_email);
		//return view('image',array('name'=>'success uploaded'));
		//$this->read_news();
		
		//after successfull upload Then  call this Method to send email notification to subscribers
		$this->sendemailmult();
		
	
		
		//This is to redirect to This router and send variable to be used on read_news 
		
		return Redirect()->route('read_news',['reporter_email'=>$reporter_email]);
		
		
		
		//return Redirect()->route('read_news');
		//return view('publish')->with('users',$users);
		//return redirect()->route('postsignin');
		//return response()->json(array('users'=>$users),200);
		
		
	}
	else{
		echo"failed";
	}
			
		}
		else{
		echo"succeed";
		}

			//
		}
		else{
			if(isset($imagefile) && ($imagefile!=null))
		{
		
	$target=public_path("images/").basename($_FILES["imagefile"]["name"]);
	   $category = $request->input('category');
	   $news_title = $request->input('news_title');
		$news_text = $request->input('news_text');
		$reporter_email= $request->input('reporter_email');
        $today = date("Y-m-d H:i:s"); 
	$imagefile=$_FILES['imagefile']["name"];
	
	$usertest=DB::insert ('insert into news_articles(category,news_title,photo,news_text,reporter_email,created_at,updated_at) values(?,?,?,?,?,?,?)',array($category,$news_title,$imagefile,$news_text,$reporter_email,$today,$today));
			$users=DB::select('select*from news_articles where reporter_email=:reporter_email',array('reporter_email'=>$reporter_email));
		//return view('publish')->withUsers($users);
	
	if(move_uploaded_file($_FILES["imagefile"]["tmp_name"],$target))
	{
		$name="successfull uploaded";
		//$this->read_news($reporter_email);
		//return view('image',array('name'=>'success uploaded'));
		//$this->read_news();
		return Redirect()->route('read_news',['reporter_email'=>$reporter_email]);
		
		//return Redirect()->route('read_news');
		//return view('publish')->with('users',$users);
		//return redirect()->route('postsignin');
		//return response()->json(array('users'=>$users),200);
		
		
	}
	else{
		echo"failed";
	}
			
		}
		else{
		echo"succeed";
		}

		}
			
		
		}
	public function read_news()
	{
		
		$reporter_email=$_GET['reporter_email'];
		
		if(isset($reporter_email) && ($reporter_email!=null))
		{
			
			//$this->publish_news($reporter_email);
		
		//$this->delete_newspost()
		//$this->delete_newspost($reporter_email);
		$this->checkdata_exist();
		//$users=DB::select('select *from news_articles');
		
		//$email=$request->input('email');
//		$users=DB::select('select*from news_articles where reporter_email=:reporter_email',array('reporter_email'=>$email));
		//$users=DB::select('select *from news_articles where id=:id',array('id'=>$test));
		
		
    //
			$users=DB::select('select*from news_articles where reporter_email=:reporter_email',array('reporter_email'=>$reporter_email));
		return view('publish')->withUsers($users);

		}
		else{
			$users=DB::select('select *from news_articles');
		
		//$users=DB::select('select *from news_articles where id=:id',array('id'=>$test));
		return view('publish')->withUsers($users);
		}
		
		
	}
	public function delete_newspost(Request $request){
		$delete_id = $request->input('delete_id');
	
		//$delete_id=$_POST['delete_id'];
		DB::delete('delete from news_articles where id=:id',array('id'=>$delete_id));
		//$users=DB::select('select *from news_articles');
		
		//return response()->json(array('users'=>$users),200);
		//return Redirect()->route('read_news',['reporter_email'=>$reporter_email]);
		
	}
	
		
		
		

	//public function view_newspost(Request $request)
//	{
//		
//		$delete_id = $request->input('delete_id');
//		if(isset($delete_id) && ($delete_id!=null))
//		{
//		
//		//$delete_id=$_POST['delete_id'];
//		$users=DB::select('select *from news_articles where id=:id',array('id'=>$delete_id));
//			foreach($users as $user)
//		{
//			$suc=$user->photo;
//		}
//		
//		return response()->json(array('suc'=>$suc),200);
//			
//		}
//		else{
//		echo"succeed";
//		}
//		
//		//return redirect()->route('views_news');
//		//return view('view_news')->withUsers($users);
//		/*$del='hello';
//		return view('view_news')->withUsers($users);*/
//		
//		
//	}
	public function viewdata()
	{
		return view('view_news');
	}
	public function getmsg()
	{
		$news_title=$_POST['news_title'];
		$msg="hello mwabantumwe";
		return response()->json(array('news_title'=>$news_title,'msg'=>$msg),200);
	}
	
	public function test(Request $request)
	{
		echo public_path();
		//return view('test.index');
		echo"done";
		
	}
	public function testa(Request $request)
	{
		$imagefile = $request->file('imagefile');
	if(isset($imagefile) && ($imagefile!=null))
		{
		
	$target=public_path("images/").basename($_FILES["imagefile"]["name"]);
	$details=$_POST['details'];
	$imagefile=$_FILES['imagefile']["name"];
	
	$users=DB::insert ('insert into images(image,text) values(?,?)',array($imagefile,$details));
	
	if(move_uploaded_file($_FILES["imagefile"]["tmp_name"],$target))
	{
		
		return view('image',array('name'=>'success uploaded'));
		
	}
	else{
		echo"failed";
	}
			
		}
		else{
		echo"succeed";
		}
		
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
	public function subscribe()
	{
		$email=$_GET['email'];
	
		DB::insert ('insert into subscribes(email) values(?)',array($email));
	}
	public function getnotification()
	{
		$notification=DB::select('select *from news_articles order by rand() limit 2');
		
//		//select counter(latest) *from news_articles where
		return response()->json(array('notification'=>$notification),200);
//		
//		
		
		
	}
		public function sendemailmult()
	{
//start writing  a code to check if table does not have subscribers users This code is to avoid error on empty subscribers
		$counter=DB::table('subscribes')->count('email');
		if($counter!=0)
		{
			$users=DB::select("select *from subscribes");
	foreach($users as $user)
	{
		$emails[]=$user->email;
		
		
	}
	//print_r($emails) ;
			Mail::send('news', [$emails], function($message) use ($emails)
{    
    $message->to($emails)->subject('Latest news');   
//this script is like a loop to update every 10 row will be checked and add 10 row
			
					$updatelatest=DB::update("update news_articles set latest=0 where latest=latest ORDER by created_at");
				
				
				
	
				
});
		return redirect()->back();
var_dump( Mail:: failures());
exit;
		}
		else{
			return redirect()->back();
		}
		
		
		//start writing  a code to check if table does not have subscribers users

		
		//echo $collection = collect($users['email']);
		//$emails = ['ericsoft123@gmail.com', 'kebine123@gmail.com'];
		
	

	}
	
	

}
