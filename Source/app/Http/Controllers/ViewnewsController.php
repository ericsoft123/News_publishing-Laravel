<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;
use CreateDatabase;
class ViewnewsController extends Controller
{
    //
	public function getnews(){
		$news=DB::select('select *from news_articles  order BY created_at DESC LIMIT 10 ');
		//$news=DB::select('select *from news_articles');
		return response()->json(array('news'=>$news),200);
		return view('homenews')->withNews($news);
		//return view('test')->withNews($news);
	}

	public function addviews(){
		//$id=$request->input('id');
		$id=$_GET['id'];
		
		$views=DB::update('update news_articles set views_no=views_no+1 where id=:id',array('id'=>$id));
		
		$check_update_views=DB::select('select*from news_articles where id=:id',array('id'=>$id));
		return response()->json(array('check_update_views'=>$check_update_views),200);
	}

	public function addlike()
	{
		$id=$_GET['id'];
		
		$views=DB::update('update news_articles set like_no=like_no+1 where id=:id',array('id'=>$id));
		
		
	}
	public function addexport()
	{
		$id=$_GET['id'];
		//$news_title=$_GET['news_title'];
		$download='pdfall';
		$views=DB::update('update news_articles set export_no=export_no+1 where id=:id',array('id'=>$id));
		
		$news_articles=DB::select('select *from news_articles where id=:id',array('id'=>$id));
		view()->share('news_articles',$news_articles);
		
			
			$pdf=PDF::loadView('pdfall');
			
			return $pdf->download('pdfall');
	}
	public function searchnews()
	{
		$category=$_GET['category'];
		//$category="science";
		$searchnews=DB::select('select *from news_articles   where category=:category order BY created_at DESC LIMIT 10',array('category'=>$category));
		//$news=DB::select('select *from news_articles');
		return response()->json(array('searchnews'=>$searchnews),200);
	}
	public function  getnewsregister()
	{
		$reporter_email=$_GET['reporter_email'];
		$news=DB::select('select *from news_articles  where reporter_email=:reporter_email',array('reporter_email'=>$reporter_email));
		//$news=DB::select('select *from news_articles');
		return response()->json(array('news'=>$news),200);
		
	}
	public function dataso(){
		$createdatabase=new \App\CreateDatabase;
		
	}
	//public function rssfeed()
//	{
//		/* create new feed */
//   $feed = App::make("feed");
//
//   /* creating rss feed with our most recent 20 posts */
//   $posts = \DB::table('posts')->orderBy('created_at', 'desc')->take(20)->get();
//
//   /* set your feed's title, description, link, pubdate and language */
//   $feed->title = 'Your title';
//   $feed->description = 'Your description';
//   $feed->logo = 'http://yoursite.tld/logo.jpg';
//   $feed->link = url('feed');
//   $feed->setDateFormat('datetime');
//   $feed->pubdate = $posts[0]->created_at;
//   $feed->lang = 'en';
//   $feed->setShortening(true);
//   $feed->setTextLimit(100);
//
//   foreach ($posts as $post)
//   {
//       $feed->add($post->title, $post->author, URL::to($post->slug), $post->created_at, $post->description, $post->content);
//   }
//
//   return $feed->render('atom');
//	}
}
