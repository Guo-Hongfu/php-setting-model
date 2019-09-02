<?php

/**
 * Created by PhpStorm.
 * User: Guo-Hongfu
 * Date: 2019/9/2
 * Time: 23:16
 */

/**
 * 工厂类核心代码
 */
class HeartFactory
{
    // 创建实例的静态方法
    public static function upload($type='oss'){
        switch ($type){
            case 'qiniu':
                return new \cloud_storage\Qiniu();
            case 's3':
                return new \cloud_storage\S3();
            default:
                return new \cloud_storage\OSS();
        }
    }
}

// 使用方法

$file='./hi.png';

// 上传文件到OSS
$oss = HeartFactory::upload();
$oss->upload($file);

// 上传文件到七牛
$qiniu = HeartFactory::upload('qiniu');
$qiniu->upload($file);

// 上传文件到s3
$s3 = HeartFactory::upload('s3');
$s3->upload($file);
