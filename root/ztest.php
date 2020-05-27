<?php

/* $node = "node";
$file = "tracklist1.xml";

$XML = simplexml_load_file($file);

$text = (string)$XML->nodes->{$node}; // works
echo $text;
echo "<br />";
// or
$text2 = (string)$XML->{$node}->child; // also works fine
echo $text2;

*/

include "lib/xmlparser/xmlparser_php5.php";

//Get the XML document loaded into a variable
$xml = file_get_contents("content/music/listings/video/tracklist1.xml");
//Set up the parser object
$parser = new XMLParser($xml);

//Work the magic...
$parser->Parse();

foreach($parser->document->track as $track)
{
    echo $track->title[0]->tagData;
	echo "<br/>";
    echo $track->artist[0]->tagData;
	echo "<br/>";
    echo $track->album[0]->tagData;
	echo "<br/><br/><br/>";
}

?>