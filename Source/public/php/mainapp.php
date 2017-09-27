<?php 
class Databases{
	public function dbconnect()
	{
		$GLOBALS['servername'] = "localhost";
$GLOBALS['username'] = "root";
$GLOBALS['password'] = "";
//$GLOBALS['dbname ']= "news";
$GLOBALS['$db']=mysqli_connect($GLOBALS['servername'],$GLOBALS['username'], $GLOBALS['password']);
		if(!$GLOBALS['$db'])
		{
			echo"db not available";
			
		}
		else{
			//echo"we have this available";
			
		
			
		}
		
	}
	public function create_database()
	{
		$getdbconnect=$this->dbconnect();
		$sql="create database  news";
		$GLOBALS['result']=mysqli_query($GLOBALS['$db'],$sql);
		
		$this->tablecreate();
	}
	
	
	public function connect()
	{
		
		$getdbconnect=$this->dbconnect();
		/*$GLOBALS['servername'] = "localhost";
        $GLOBALS['username'] = "root";
        $GLOBALS['password'] = "";*/
		$GLOBALS['dbname']= "news";
		$GLOBALS['con']=mysqli_connect($GLOBALS['servername'],$GLOBALS['username'], $GLOBALS['password'],$GLOBALS['dbname']);
		
		
	}
	public function checktable_exist()
	{
		//This to check table
		$table=$this->connect();
		$sql="select 1 from `categories` LIMIT 1;select 1 from `comments` LIMIT 1;select 1 from `users` LIMIT 1;select 1 from `posts` LIMIT 1";
		$GLOBALS['table_exist']=mysqli_multi_query($GLOBALS['con'],$sql);
		
	}
	public function checkdatabase_exist()
	{
		//this function is important but i did not use it on this project
		$this->dbconnect();
		$sql="SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME='news'";
		$GLOBALS['database_exist']=mysqli_query($GLOBALS['$db'],$sql);
		if(mysqli_num_rows($GLOBALS['database_exist'])>0)
		{
			echo"database available";
		}
		else{
			
			echo"database is not available";
		}
	}
	public function tablecreate()
	{
		$table=$this->connect();
		include("connect.php");
				$sql = "CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
INSERT INTO `categories` (`id`, `category`, `created_at`, `updated_at`) VALUES
(1, 'Technology', '2017-09-16 06:33:55', '2017-09-16 06:33:55'),
(2, 'Science', '2017-09-16 06:33:55', '2017-09-16 06:33:55'),
(3, 'Sport', '2017-09-16 06:33:55', '2017-09-16 06:33:55'),
(4, 'Health', '2017-09-16 06:33:55', '2017-09-16 06:33:55'),
(5, 'LifeStyle', '2017-09-16 06:33:55', '2017-09-16 06:33:55'),
(6, 'Entertainment', '2017-09-16 06:33:55', '2017-09-16 06:33:55'),
(7, 'World', '2017-09-16 06:33:55', '2017-09-16 06:33:55'),
(8, 'Others', '2017-09-16 06:33:55', '2017-09-16 06:33:55');
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);
  ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;


  
  CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(8, '2014_10_12_000000_create_users_table', 1),
(9, '2014_10_12_100000_create_password_resets_table', 1),
(10, '2017_09_08_031700_create_news_articles_table', 1),
(11, '2017_09_10_072705_create_categories_table', 1),
(12, '2017_09_10_194235_create_comments_table', 1),
(13, '2017_09_14_014122_create_subscribes_table', 1),
(14, '2017_09_15_014507_create_post_table', 1);
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
  
  CREATE TABLE `news_articles` (
  `id` int(10) UNSIGNED NOT NULL,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `news_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `news_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `reporter_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `views_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `comment_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `export_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `like_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
   `latest` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'latest'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
  ALTER TABLE `news_articles`
  ADD PRIMARY KEY (`id`);
  ALTER TABLE `news_articles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
  
  
CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
  ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);
  ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
  
  CREATE TABLE `subscribes` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
ALTER TABLE `subscribes`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `subscribes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
  
  CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `token` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
  ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);
  ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
  
  
  CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
  ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);
  
  CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `news_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `news_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `news_text` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reporter_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);
  ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
  ";
		$result=mysqli_multi_query($GLOBALS['con'],$sql);
if($result)
{
		header('LOCATION:http://localhost:8000/');
}
		else{
			echo"table exist then navigate to,";
			
		}

	}
	
	public function main()
	{
		//THIS IS TO CHECK IF TABLE OR DATABASE AVAILABLE
		
		
		$table=$this->create_database();
		$table=$this->checktable_exist();
		
		if($GLOBALS['result'])
		{
			
			$this->create_database();
			
		}
		else{
			echo"database is available";
			//DATABASE IS AVAILABLE
			//CHECK IF TABLE IS AVAILABLE
			if($GLOBALS['table_exist'])
		{
			echo"table is available";
			//TABLE IS AVAILABLE
			//NAVIGATE TO THIS LINK
			header('LOCATION:http://localhost:8000/');
		}
		else{
			echo"table is not available";
			//TABLE IS NOT AVAILABLE
			//CREATE A TABLE
			$this->tablecreate();
		}
		}
		
		
		
	}
	
}
$database=new Databases;

$database->main();
//$database->checkdatabase_exist();


?>