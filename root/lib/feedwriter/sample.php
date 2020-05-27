<?php
  // Including the DB connection file:
  require '../db/connect.php';

  include("FeedWriter.php");
  $TestFeed = new FeedWriter(RSS2);
  $TestFeed->setTitle('Emprovise RSS Feed');
  $TestFeed->setLink('http://emprovise.comuf.com/content/rss');
  $TestFeed->setDescription(
        'This is test of creating a RSS 2.0 feed Universal Feed Writer'
  );
  $TestFeed->setImage('Testing the RSS writer class',
        'http://emprovise.comuf.com/content/rss',
        'http://emprovise.comuf.com/img/globals/emprovise.gif');
//    mysql_connect("server", "mysql_user", "mysql_password");
//    mysql_select_db("my_database");
    $result = mysql_query("SELECT title, url, description, CURDATE() AS create_date FROM spider_links");
    while($row = mysql_fetch_array($result, MYSQL_ASSOC))
    {
        $newItem = $TestFeed->createNewItem();
        $newItem->setTitle($row['title']);
        $newItem->setLink($row['url']);
        $newItem->setDate($row['create_date']);
        $newItem->setDescription($row['description']);
        $TestFeed->addItem($newItem);
    }
  $TestFeed->genarateFeed();
?>
