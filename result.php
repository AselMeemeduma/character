<?php
session_start();
require 'vendor/autoload.php';

$fb = new Facebook\Facebook([
  'app_id' => '178728269598594',
  'app_secret' => '34759706ffb61f4b9add1dae533ca766',
  'default_graph_version' => 'v2.2',
  ]);

try {
  // Returns a `Facebook\FacebookResponse` object
  $response = $fb->get('/me?fields=id,name,picture',$_SESSION['fb_access_token']);
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

$user = $response->getGraphUser();

echo 'Name: ' . $user['name'];
$picture=$user['picture'];
$pc = json_decode($picture);
//echo $pc->url;
echo "<img src='$pc->url'>";
//var_dump($pc);
/*function array_kshift($characters){
	list($k)=array_keys($characters);
	$r=array($k=>$characters[$k]);
	unset($characters[$k]);
	return $r;
<<<<<<< HEAD
}*/
$characters= array("Hiruni","Jehan Fernando","Maldeniya","Maldeniya's Dog","Telan","Ostin aiya" );
$k = array_rand($characters);
$v = $characters[$k];

print_r($v);

// Create image
$image = new \NMC\ImageWithText\Image(dirname(__FILE__) . '/source.jpg');

// Add styled text to image
$text1 = new \NMC\ImageWithText\Text('Thanks for using our image text PHP library!', 3, 25);
$text1->align = 'left';
$text1->color = 'FFFFFF';
$text1->font = dirname(__FILE__) . '/Ubuntu-Medium.ttf';
$text1->lineHeight = 36;
$text1->size = 24;
$text1->startX = 40;
$text1->startY = 40;
$image->addText($text1);

// Add another styled text to image
$text2 = new \NMC\ImageWithText\Text('No, really, thanks!', 1, 30);
$text2->align = 'left';
$text2->color = '000000';
$text2->font = dirname(__FILE__) . '/Ubuntu-Medium.ttf';
$text2->lineHeight = 20;
$text2->size = 14;
$text2->startX = 40;
$text2->startY = 140;
$image->addText($text2);

// Render image
$image2=render(dirname(__FILE__) . '/destination.jpg');
$image->render(dirname(__FILE__) . '/destination.jpg');
echo "<img src='$image2'>";
?>
