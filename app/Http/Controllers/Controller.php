<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

session_start();
header('Content-Type:image/png');
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    function clockIn()
    {
        return view("clockIn");
    }
    function login()
    {
        return view("login");
    }
    function checkImg()
    {
        ob_clean();
        $image = imagecreatetruecolor(100, 30);
        //设置验证码颜色 imagecolorallocate(int im, int red, int green, int blue);
        $bgcolor = imagecolorallocate($image, 255, 255, 255); //#ffffff
        //区域填充 int imagefill(int im, int x, int y, int col) (x,y) 所在的区域着色,col 表示欲涂上的颜色
        imagefill($image, 0, 0, $bgcolor);
        //设置变量
        $captcha_code = "";
        //生成随机数字
        for ($i = 0; $i < 4; $i++) {
            //设置字体大小
            $fontsize = 6;
            //设置字体颜色，随机颜色
            $fontcolor = imagecolorallocate($image, rand(0, 120), rand(0, 120), rand(0, 120));      //0-120深颜色
            //设置数字
            $fontcontent = rand(0, 9);
            //连续定义变量
            $captcha_code .= $fontcontent;
            //设置坐标
            $x = ($i * 100 / 4) + rand(5, 10);
            $y = rand(5, 10);

            imagestring($image, $fontsize, $x, $y, $fontcontent, $fontcolor);
        }
        //存到session
        $_SESSION['authcode'] = $captcha_code;
        //增加干扰元素，设置雪花点
        for ($i = 0; $i < 200; $i++) {
            //设置点的颜色，50-200颜色比数字浅，不干扰阅读
            $pointcolor = imagecolorallocate($image, rand(50, 200), rand(50, 200), rand(50, 200));
            //imagesetpixel — 画一个单一像素
            imagesetpixel($image, rand(1, 99), rand(1, 29), $pointcolor);
        }
        //增加干扰元素，设置横线
        for ($i = 0; $i < 4; $i++) {
            //设置线的颜色
            $linecolor = imagecolorallocate($image, rand(80, 220), rand(80, 220), rand(80, 220));
            //设置线，两点一线
            imageline($image, rand(1, 99), rand(1, 29), rand(1, 99), rand(1, 29), $linecolor);
        }

        //设置头部，image/png
        header('Content-Type: image/jpeg');
        //imagepng() 建立png图形函数
        imagejpeg($image);
        //imagedestroy() 结束图形函数 销毁$image
        imagedestroy($image);
        exit;
    }
    function close()
    {
        $close = DB::select("truncate table students;");
        session_destroy();
        echo "<script>alert('退出成功')</script>";
        header("Refresh:1;url='/'");
    }

}
