<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Mail;
use PDF;
class CategoryController extends Controller
{
    //
//	
//	public function autosavecategory()
//	{
//		
//		
//	$news_category=new \App\Category([
//	'category'=>'Technology'
//	]);
//	
//	$news_category->save();
//	$news_category=new \App\Category([
//	'category'=>'Science'
//	]);
//	
//	$news_category->save();
//		$news_category=new \App\Category([
//	'category'=>'Sport'
//	]);
//	
//	$news_category->save();
//	$news_category=new \App\Category([
//	'category'=>'Health'
//	]);
//	
//	$news_category->save();
//		$news_category=new \App\Category([
//	'category'=>'LifeStyle'
//	]);
//	
//	$news_category->save();
//	$news_category=new \App\Category([
//	'category'=>'Entertainment'
//	]);
//	
//	$news_category->save();
//		$news_category=new \App\Category([
//	'category'=>'World'
//	]);
//	
//	$news_category->save();
//	$news_category=new \App\Category([
//	'category'=>'Others'
//	]);
//	
//	$news_category->save();
//	}
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
	public function getcategories()
	{
		$categories=DB::select('select *from categories');
		return response()->json(array('categories'=>$categories),200);
	}
	public function sendmail()

	{
		$test='email';
		$data=str_random(25);
		$done=$test."".$data;
		echo $done;
/*		

$data=['hello'];
		Mail::send('welcome', $data, function ($message) {
    $message->from('excellentia1ltd@gmail.com', 'Laravel');

    $message->to('ericsoft123@gmail.com')->cc('ericsoft123@gmail.com');
});*/
	}
	public function getdata()
	{
		$categories=DB::select('select *from categories where id:1');
	}
	public function createpdf()
	{
		//$pdf=PDF::loadView('publish');
//		return $pdf->download('test.pdf');
	$users="bite";
		
			$pdf=PDF::loadView('home');
		return $pdf->download('test.pdf');
	
	}
	public function getresult()
	{
		return view('pdftest');
	}
}
