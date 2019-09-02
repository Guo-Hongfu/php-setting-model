<?php
/**
 * Created by PhpStorm.
 * User: Guo-Hongfu
 * Date: 2019/9/2
 * Time: 23:17
 */

namespace cloud_storage;

/**
 * Class Upload
 * @package cloud_storage
 * 定义一个抽象父类
 */
abstract class Upload
{
    /**
     * @var string
     * 给客户端返回的信息
     */
    protected $msg = 'ok';

    /**
     * @var
     * 返回的上传文件的路径
     */
    protected $filePath;

    /**
     * 返回的状态
     * true 上传成功，false上传失败
     */
    protected $stat = true;


    /**
     * @return mixed
     * 上传文件的主要逻辑
     */
    abstract public function upload($file);

    /**
     * 下载文件的主要逻辑
     */
    abstract public function download($file);

    /**
     * @return array
     * 构造一个数据类型
     */
    protected function getData()
    {
        return [
            'stat' => $this->stat,
            'msg' => $this->msg,
            'file_path' => $this->filePath
        ];
    }

    /**
     * 给客户端返回json数据
     */
    public function getJson()
    {
        return json_encode($this->getData());
    }

    /**
     * 给客户端返回数组
     */
    public function getArray(){
        return $this->getData();
    }

}