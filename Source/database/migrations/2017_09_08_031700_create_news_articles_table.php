<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_articles', function (Blueprint $table) {
            $table->increments('id');
			$table->string('category');
			$table->string('news_title');
			$table->string('photo');
		    $table->text('news_text');
			$table->string('reporter_email');
			$table->string('views_no')->default('0');
			$table->string('comment_no')->default('0');
			$table->string('export_no')->default('0');
			$table->string('like_no')->default('0');
            $table->timestamps();
			$table->string('latest')->default('latest');
			
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news_articles');
    }
}
