<?php
	/*打开图片 */
		//1.设置图片路径
		$src="snow-leopard-2470440_1920.jpg";

		//2.获取图片信息
		$info=getimagesize($src);

		//3.获取图片类型
		$type=image_type_to_extension($info[2],false);

		//4.在内存中创建一个与图片类型一样的图像
		$fun="imagecreatefrom{$type}";

		//5.把要操作的图片复制到内存中
		$image=$fun($src);


	/*操作图片 */
		//1.在内存中建立一个宽300，高200的真色彩图片
		$image_thunb=imagecreatetruecolor(300, 200);

		//2.核心步骤：将原图复制到新建的真色彩图片上，并且按照一定比例压缩
		imagecopyresampled($image_thunb, $image, 0, 0, 0, 0, 300, 200, $info[0], $info[1]);

		//3.销毁原始图片
		imagedestroy($image);


	/*保存图片 */
		//在浏览器中输出
		header("content-type:".$info['mime']);
		$funs="image{$type}";
		$funs($image_thunb);

		//保存到硬盘
		$funs($image_thunb,"thumb.".$type);


	/*销毁图片 */
		imagedestroy($image_thunb);
?>