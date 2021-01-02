<?php
/*
  Example of exploiting the Facebook Pages Scrapper without using Facebook API
  By: Abdennacer Elbasri
  Web: wwww.elbasri.net
  Email: wwww.elbasri.net
*/
require_once __DIR__.'/scrapper.php';

//initiate new object
$Scrapobj = new FbScrapper();

//page id/username
$id = "kachafcom";

//run the scrapper
$entries = $Scrapobj->scrappage($id);

if($entries){
	//fetch <p>'s tag where posts content exist
	preg_match_all('/<p>.*?<\/p>/is', $entries, $matches);

	foreach($matches as $element){
		//get post by post
		for($i=0; $i<count($element);$i++){
			//print as html
			echo $element[$i];
			//test if folder exist else create it
			//then save post text only to files (file per post)
			//you can insert it to mysql db or any database if needed
			if( is_dir('data/'.$id) === false )
				mkdir('data/'.$id);
			file_put_contents('data/'.$id.'/post_'.$i.'.txt', strip_tags($element[$i]));
		}
	}
	echo "done :)";
}
else
	echo "no content !";

?>