<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="libraries/css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>

<div id="top" class="c_top"> 
    <div class="banner">
        <?php  include ("configs/banner.php"); ?>
    </div>
   <div id="login" class="c_login">
    Xin Chào Khách</div>
    <div id="menu" class="c_menu">
   <?php include ("configs/main_menu.php"); ?>
    </div>
</div>

<div id="nav_top" class="c_nav_top">

</div>

<div  class="c_body"> 
 
	<div id="sidebar" class="c_sidebar">
    	<div id="search" class="c_search">
        	<?php include ("configs/search.php") ?>
        </div>
     <p>&nbsp;</p>
      <div id="live_support" class="c_live_support">
        	<?php include ("configs/live_support.php") ?>
        </div>
        
  </div>
  <div id="content" class="c_content">content</div>

</div>

<div class="c_break_footer"></div>
<div class="c_footer">footer</div>

</body>
</html>
