<?php

/**
 * Created by PhpStorm.
 * User: Guo-Hongfu
 * Date: 2019/8/30
 * Time: 23:40
 */

/**
 * Class Heart
 * 单例模式核心代码
 */
class Heart
{
    //私有的静态的保存对象的属性
    private static $obj = null;

    // 私有的构造对象：阻止类外new对象
    private function __construct(){}

    // 私有的克隆方法：阻止类外 clone对象
    private function __clone(){}

    // 公共的静态的创建对象的方法
    public static function getInstance(){
        // 判断当前对象是否存在
        if (!self::$obj instanceof self){
            self::$obj = new self();
        }
        return self::$obj;

    }
}

$heart = Heart::getInstance();
$heart2 = Heart::getInstance();
var_dump($heart === $heart2); // bool(true)

