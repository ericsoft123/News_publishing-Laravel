<?php
include("connect.php");
$delete_id=$_POST['delete_id'];
$id=$_POST['id'];
if(isset($delete_id) && ($delete_id!=null))
{
	$sql="delete from news_articles where reporter_email='$delete_id'";
$result=mysqli_query($con,$sql);
}
if(isset($id) && ($id!=null))
{
	$sql="delete from news_articles where id='$id'";
$result=mysqli_query($con,$sql);
}



?>