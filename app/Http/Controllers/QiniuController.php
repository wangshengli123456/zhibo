<?php
/**
 * Created by PhpStorm.
 * User: 利宝宝
 * Date: 2018/12/26
 * Time: 9:36
 */

namespace App\Http\Controllers;

use Qiniu\Auth;
// 引入上传类
use Qiniu\Storage\UploadManager;

class QiniuController
{
    public static function qiniu_upload($filePath) {


// 需要填写你的 Access Key 和 Secret Key
        $accessKey = "jBe2ZqnUBfGcdP43iilFKMTqCpR3qxlexuwose2K";
        $secretKey = "lw3HDgndWbC3axUCsdlJKoJ5xLOisgS6ke38oE-P";
        $bucket = "shop";

// 构建鉴权对象
        $auth = new Auth($accessKey, $secretKey);

// 生成上传 Token
        $token = $auth->uploadToken($bucket);

// 要上传文件的本地路径
//    $filePath = './php-logo.png';

// 上传到七牛后保存的文件名
        $key = basename($filePath);

// 初始化 UploadManager 对象并进行文件的上传。
        $uploadMgr = new UploadManager();

// 调用 UploadManager 的 putFile 方法进行文件的上传。
        $uploadMgr->putFile($token, $key, $filePath);
//删除本地图片
        unlink($filePath);
    }
}