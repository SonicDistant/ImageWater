<?php
	/*一、打开图片*/
		//1.配置图片路径
		$src="snow-leopard-2470440_1920.jpg";

		//2.获取图片基本信息
		$info=getimagesize($src);

		//3.通过图片的编号来获取图片类型
		$type=image_type_to_extension($info[2],false);

		//4.在内存中创建一个和我们图像类型一致的图像
		$fun="imagecreatefrom{$type}";

		//5.把要操作的图片复制到内存中
		$image=$fun($src);


	/*二、操作图片*/
		//1.设置水印的路径
		$image_Mark="lampionblume-2183118_1920.jpg";

		//2.获取水印图片的基本信息
		$info2=getimagesize($image_Mark);

		//3.通过水印的图像编号来获取水印的图片类型
		$type2=image_type_to_extension($info2[2],false);

		//4.在内存中创建一个和水印图片类型一致的图像
		$fun2="imagecreatefrom{$type2}";

		//5.把水印图片复制到内存中
		$water=$fun2($image_Mark);

		//6.合并图片
		imagecopymerge($image, $water, 200, 300, 0, 0, $info2[0], $info2[1], 50);

		//7.销毁水印图片
		imagedestroy($water);


	/*三、输出图片*/
		//在浏览器中输出图片
		header("content-type:".$info['mime']);
		$funs="image{$type}";
		$funs($image);

		//保存图片
		$funs($image,"newimage2.".$type);




	/*四、销毁图片*/
		imagedestroy($image);


	
?>