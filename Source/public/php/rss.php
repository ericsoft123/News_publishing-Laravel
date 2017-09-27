<?php

function connect() {
    return new PDO('mysql:host=localhost;dbname=news', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
}

$pdo = connect();

// posts *******************************
//$sql = 'SELECT * FROM news_articles ORDER BY id DESC limit 10';
$sql = 'SELECT * FROM news_articles ORDER BY id DESC';
$query = $pdo->prepare($sql);
$query->execute();
$rs_post = $query->fetchAll();

// The XML structure
$data = '<?xml version="1.0" encoding="UTF-8" ?>';
$data .= '<rss version="2.0">';
$data .= '<channel>';
$data .= '<title>ERIC : WEB DEVELOPERS TEST</title>';
$data .= '<link>http://www.excellentia1.com</link>';
$data .= '<description>PASSION Web DEVELOPER  PROJECT TEST</description>';
foreach ($rs_post as $row) {
    $data .= '<item>';
    $data .= '<title>'.$row['news_title'].'</title>';
    $data .= '<link>http://www.excellentia1.com</link>';
    $data .= '<description>'.$row['news_text'].'</description>';
    $data .= '</item>';
}
$data .= '</channel>';
$data .= '</rss> ';

header('Content-Type: application/xml');
echo $data;
?>