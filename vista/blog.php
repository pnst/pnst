<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<link rel="stylesheet" href="includes/blog.css" type="text/css" media="screen" title="no title" charset="utf-8">
	<title>Proyecto Educativo NST - NST Blog</title>
</head>

<body>
<table>
    <tr>
	<td>asdasdasdasdasdasdasdasdasdasdasdadasdasdasdasdasdasdasd
	</td>
    <tr>
    <tr>
	<td>
	<div id="main">
	    <h1>Blog  NST</h1>
	    <div id="blogPosts">
		<?php include ("includes/includes.php");
	
		$blogPosts = GetBlogPosts();
	    
		foreach ($blogPosts as $post){
		    echo "<div class='post'>";
		    echo "<h2>" . $post->title . "</h2>";
		    echo "<p>" . $post->post . "</p";
		    echo "<span class='footer'>Escrito por: " . $post->author . " Fecha: " . $post->datePosted . " Tags: " . $post->tags . "</span";
		    echo "</div>";
		} ?>
	    </div>
	</div>
	</td>
    </tr>
</table>
</body>

</html>
