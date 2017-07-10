<?php
	require "image.class.php";
	$src="snow-leopard-2470440_1920.jpg";
	$image=new Image($src);
	$source="lampionblume-2183118_1920.jpg";

	
	$local= array(
		'x' => 200,
		'y' => 300 );
	$alpha=100;

	$content="hello";
	$font_url="msyhbd.ttc";
	$size=20;
	$color=array(
		0=>255,
		1=>0,
		2=>0,
		3=>20
		);
	$local01=array(
		'x'=>30,
		'y'=>50);
	$angle=0;

	
	$image->imageMark($source,$local,$alpha);
	$image->thumb(300,500);
	$image->fontMark($content,$font_url,$size,$color,$local01,$angle);
	$image->show();
?>