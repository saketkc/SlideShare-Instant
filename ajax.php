<?php
//session_start();
$var=array();
global $vaar;
//$var=[];
if ($_GET['op']=="ajaxrequest")
{
	
	$var=$_GET['query'];
	//global $_SESSIONS[$var];
	
	$api_key="8GD14Jk1";
$secret="mnFaUN4s";

$proxy="Your proxy";
$pass="password";
$timeout=0;
$ts=time();
	$hash=sha1($secret.$ts);
	# use CURL library to fetch remote file
	$apiurl="http://www.slideshare.net/api/2/search_slideshows?q=$var";

		$ch = curl_init();
		curl_setopt ($ch, CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_PROXY, $proxy);
		curl_setopt($ch, CURLOPT_PROXYPORT,80);
		curl_setopt($ch, CURLOPT_PROXYUSERPWD,$pass);
		$url = $apiurl."&api_key=$api_key&ts=$ts&hash=$hash&items_per_page=1";
		curl_setopt ($ch, CURLOPT_URL, $url);
		
		
		//curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
		$file_contents = curl_exec($ch);
		//$res =  simplexml_load_file($file_contents);	
		//echo "$res";
	//echo "$file_contents";
	$xml = simplexml_load_string($file_contents);
	//print_r ($xml);
	$number=1;
	foreach ( $xml->Slideshow as $files)
	{
//$val=($xml->Slideshow);
/*$URL= $files->URL;
 $DownloadUrl= explode("?",$files->DownloadUrl);
 $ThumbUrl=explode("/", $DownloadUrl[0]);
 $thumb= explode(".", $ThumbUrl[4]);
 $href=$URL."#".$thumb[0];*/
 $_SESSION[$var][$number]=$files->Embed;
 
 //echo $_SESSION['sad']['2'];
 $vaar[$number]=$_SESSION[$var][$number];
 echo ($vaar[$number]);
 $number=$number+1;
 
 //echo "<div class='slideshares'>"."<a href='$href'></a>"."</div>";
 //echo "<div class='slideshares'>
 //echo "<div class='slideshares'><a href='http://www.slideshare.net/Fenng/linuxunix#linuxunix-100414033213-phpapp01'>asd</a><script src='http://chrisslidesharehacks.googlecode.com/files/previewer2.js'></script></div>";//View 'Building Badges for distribution' on SlideShare</a></div>";
 //echo "<div>".$href."</div>";
}
//$class="messag";
//$msg="Done";


//die();
}
if ($_GET['op']=="numberrequest")
{
//	session_start();
	$num=$_GET['number'];
	$query=$_GET['query'];
//echo $num;
	//echo $query;
	//echo $_SESSION['sad'];
	//if(isset($_SESSION[$query][$num]))
	{
		//echo "SAS $vaar";
	}
	//else 
	//echo "DSD";
	
	
	$api_key="8GD14Jk1";
$secret="mnFaUN4s";

$proxy="proxy";
$pass="password";
$timeout=0;
$ts=time();
	$hash=sha1($secret.$ts);
	# use CURL library to fetch remote file
	$apiurl="http://www.slideshare.net/api/2/search_slideshows?q=$query";

		$ch = curl_init();
		curl_setopt ($ch, CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_PROXY, $proxy);
		curl_setopt($ch, CURLOPT_PROXYPORT,80);
		curl_setopt($ch, CURLOPT_PROXYUSERPWD,$pass);
		$url = $apiurl."&api_key=$api_key&ts=$ts&hash=$hash&items_per_page=$num";
		curl_setopt ($ch, CURLOPT_URL, $url);
		
		
		//curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
		$file_contents = curl_exec($ch);
		//$res =  simplexml_load_file($file_contents);	
		//echo "$res";
	//echo "$file_contents";
	$xml = simplexml_load_string($file_contents);
	//print_r ($xml);
	$number=1;
	foreach ( $xml->Slideshow as $files)
	{
//$val=($xml->Slideshow);
/*$URL= $files->URL;
 $DownloadUrl= explode("?",$files->DownloadUrl);
 $ThumbUrl=explode("/", $DownloadUrl[0]);
 $thumb= explode(".", $ThumbUrl[4]);
 $href=$URL."#".$thumb[0];*/
 $_SESSION[$var][$number]=$files->Embed;
 
 //echo $_SESSION['sad']['2'];
 $vaar[$number]=$_SESSION[$var][$number];
 if ($number==$num)
 {
	 echo $files->Embed;
	 //echo ($vaar[$number]);
	 //die();
 }
 
 $number=$number+1;
 
 //echo "<div class='slideshares'>"."<a href='$href'></a>"."</div>";
 //echo "<div class='slideshares'>
 //echo "<div class='slideshares'><a href='http://www.slideshare.net/Fenng/linuxunix#linuxunix-100414033213-phpapp01'>asd</a><script src='http://chrisslidesharehacks.googlecode.com/files/previewer2.js'></script></div>";//View 'Building Badges for distribution' on SlideShare</a></div>";
 //echo "<div>".$href."</div>";
}
}
?>


