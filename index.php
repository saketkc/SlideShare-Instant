<?php
//session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
 <LINK href="style.css" rel="stylesheet" type="text/css">
<title>SlideShare Instant</title>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script src="http://chrisslidesharehacks.googlecode.com/files/previewer2.js"></script>
<script type="text/javascript">
function call()
{
	if(typeof slideshareviewer==='undefined'){slideshareviewer=function(){function init(){var divs=document.getElementsByTagName('div');for(var i=0;divs[i];i++){if(divs[i].className.toString().indexOf('slideshare')!==-1){var source=divs[i].getElementsByTagName('a')[0];var container=document.createElement('a');var chunks=source.href.split('#');var thumbsurl='http://cdn.slideshare.net/'+chunks[1]+'-thumbnail-2';container.href=chunks[0];container.style.width='425px';container.style.display='block';container.style.position='relative';container.style.height='355px';container.style.textAlign='center';container.style.color='#666';container.style.fontFamily='arial';container.style.border='1px solid #ccc';divs[i].insertBefore(container,source);container.innerHTML='Click to view';container.style.background='url('+thumbsurl+') center center no-repeat #eee';var flash='<object width="425" height="355"><param name="movie" value="http://static.slideshare.net/swf/ssplayer2.swf?doc='+chunks[1]+'"/><param name="allowFullScreen" value="true"/><param name="allowScriptAccess" value="always"/><embed src="http://static.slideshare.net/swf/ssplayer2.swf?doc='+chunks[1]+'" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="425" height="355"></embed></object>';container.flash=flash;container.onclick=function(){var replace=document.createElement('div');this.parentNode.insertBefore(replace,this);replace.innerHTML=this.flash;this.parentNode.removeChild(this);return false;};}}};function addLoadEvent(func){var oldonload=window.onload;if(typeof window.onload!='function'){window.onload=func;}else{window.onload=function(){if(oldonload){oldonload();}
func();};}}
return{init:init,load:addLoadEvent};}();slideshareviewer.load(slideshareviewer.init);}
}
$(document).ready(function()
{
	
	var number=01;
$(".search_input").focus();
$(".search_input").keyup(function() 
{

var search_input = $(this).val();
var keyword= encodeURIComponent(search_input);
//number=number+1;
//alert(keyword);
$.ajax({
   type: "GET",
   url: "ajax.php",
   //data: "name=John&location=Boston",
  data:{'op':'ajaxrequest','query':keyword},

   //data: "op='ajaxrequest'&query='linux'",
   success: function(msg){
     //alert( "Data Saved: " + msg );
    //call();
    //alert(msg.find('div'));
     $('.inner').html(msg);//=msg;
     
    // call();
    //$('.inner').prepend('<div id="new">'+msg+'</div>');

   }
 });
});
$('#next').click(function() {
  //alert("Handler for .click() called.");
  number=number+1;
  var keyword = $(".search_input").val();
  $.ajax({
   type: "GET",
   url: "ajax.php",
   //data: "name=John&location=Boston",
  data:{'op':'numberrequest','query':keyword,'number':number},

   //data: "op='ajaxrequest'&query='linux'",
   success: function(msg){
     //alert( "Data Saved: " + msg );
    //call();
    //alert(msg.find('div'));
     $('.inner').html(msg);//=msg;
   //  var calls='<?php echo $_SESSIONS['sad']['1']?>';
     //alert(calls);
    // call();
    //$('.inner').prepend('<div id="new">'+msg+'</div>');

   }
 });
});
$('#prev').click(function() {
  //alert("Handler for .click() called.");
  number=number-1;
  var keyword = $(".search_input").val();
  $.ajax({
   type: "GET",
   url: "ajax.php",
   //data: "name=John&location=Boston",
  data:{'op':'numberrequest','query':keyword,'number':number},

   //data: "op='ajaxrequest'&query='linux'",
   success: function(msg){
     //alert( "Data Saved: " + msg );
    //call();
    //alert(msg.find('div'));
     $('.inner').html(msg);//=msg;
   //  var calls='<?php echo $_SESSIONS['sad']['1']?>';
     //alert(calls);
    // call();
    //$('.inner').prepend('<div id="new">'+msg+'</div>');

   }
 });
});
});

</script>
<body>
<center>
SlideShare Instant Query<input type="text" class='search_input'  /><br/>
<div class="container">
<div class="inner"></div>
<button id="next">
  Next--
</div>
<button id="prev">--Prev</div>
</div>
</center>
</body>
