<?php
	/*打开图片*/
		//1.配置图片路径（就是你想要操作的图片路径）
		$src="snow-leopard-2470440_1920.jpg";

		//2.获取图片信息（通过GD库提供的方法，得到你想要处理的图片的基本信息）
		$info=getimagesize($src);

		//3.通过图片编号来获取图像类型
		$type=image_type_to_extension($info[2],false);

		//4.在内存中创建一个和我们图像类型一样的图像
		$fun="imagecreatefrom{$type}";//$fun=imagecreatejpeg;$fun=imagecreatefrompng;

		//5.把图片复制到我们的内存中
		$image=$fun($src);//imagecreatejpeg($src);imagecreatepng($src);imagecreategif($src);


	/*操作图片*/
		//1.设置字体的路径
		$font="msyhbd.ttc";

		//2.填写水印内容
		$content="你好，慕课";

		//3.设置字体的颜色和透明度      参数1：内存中的图片  参数2,3,4：三原色   参数5：透明度
		$color=imagecolorallocatealpha($image, 255, 255, 255, 50);

		//4/写入文字
		imagettftext($image, 200, 0, 200, 300, $color, $font, $content);


	/*输出图片*/
		//浏览器输出
		header("content-type:".$info['mime']);
		$func="image{$type}";//imagejpeg;imagepng;
		$func($image);

		//保存图片
		$func($image,"newimage.".$type);//imagejpeg($image,'newimage.jpeg');


	/*销毁图片*/
	imagedestroy($image);
?>