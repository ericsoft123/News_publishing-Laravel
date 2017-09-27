<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;


class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testNewsControllerMethod()
    {
        $response = $this->get('/');
        $response = $this->get('/test');
		$response = $this->get('/read_news');
		$response = $this->get('/delete_newspost');
		$response = $this->get('/publish_news');
		$response = $this->get('/delete_newspost');
		$response = $this->get('/view_newspost');
		$response = $this->get('/viewdata');
		$response = $this->get('/test');
		$response = $this->get('/testa');
		
		
		
        $response->assertStatus(200);
		
		
    }

	public function dataavailable(){
		$this->assertDatabaseHas('users',['email'=>'ericsoft123@gmail.com']);
		
	}
	public function nodata(){
		$this->assertDatabaseMissing('users',['email'=>'ericsoft123@gmail.com']);
		
	}
	
	public function Testsubmit(){
		 $response=$this->get('/read_news')->visit('/read_news')
		->type('ceceka','news_title')
		->type('ceceka@gmail.com','reporter_email')
		->press('publish_news')
		->seePageIs('/read_news');
		$response->assertStatus(200);
	}
}
