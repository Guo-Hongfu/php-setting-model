<?php

/**
 * Created by PhpStorm.
 * User: Guo-Hongfu
 * Date: 2019/9/26
 * Time: 23:16
 */

/**
 * 抽象活动算法类
 */

abstract class Activity
{
    /**
     * 计算活动金额
     * @return mixed
     */
    public abstract function doActive($money);
}


/**
 * Class AtoActivity
 * 计算满减
 */
class FullActivity extends Activity
{
    public function doActive($money)
    {
        echo '满减算法：原价'. $money .'元';
    }
}

/**
 * Class AtoActivity
 * 计算促销
 */
class ProActivity extends Activity
{
    public function doActive($money)
    {
        echo '促销算法：原价'. $money .'元';
    }
}
