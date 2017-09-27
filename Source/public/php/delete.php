<? 
include("connect.php");
$reporter_email=$_POST['reporter_email'];
$sql="delete from news_articles where reporter_email='$reporter_email'";
?>