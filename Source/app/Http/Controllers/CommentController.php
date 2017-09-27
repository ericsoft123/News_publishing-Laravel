<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class CommentController extends Controller
{
    //
	public function getcomments()
	{
		//$id=$_GET['id'];
		
		$news_id=$_GET['news_id'];
		$comments=DB::select('select*from comments where news_id=:news_id',array('news_id'=>$news_id));
		return response()->json(array('comments'=>$comments),200);
	}
	public function postcomments(){
		$news_id=$_GET['news_id'];
		$title_news=$_GET['title_news'];
		$text_news=$_GET['text_news'];
		$email_reporter=$_GET['email_reporter'];
		$comment_email=$_GET['comment_email'];
		$comment_text=$_GET['comment_text'];
		
	     $today = date("Y-m-d H:i:s"); 
		DB::insert('insert into comments(news_id,news_title,news_text,reporter_email,comment_email,comment,created_at) values(?,?,?,?,?,?,?)',array($news_id,$title_news,$text_news,$email_reporter,$comment_email,$comment_text,$today));
		$views=DB::update('update news_articles set comment_no=comment_no+1 where id=:id',array('id'=>$news_id));
		//DB::insert('insert into comments(news_title,news_text,reporter_email,comment_email,comment) values(?,?,?,?,?)',array("j","b","gh","gh","bn"));
		//echo"hello";
		
	}
	
}
