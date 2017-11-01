<?php
/**
 * Created by PhpStorm.
 * User: dusc
 * Date: 2017/7/28
 * Time: 15:49
 * 代理模式 结构型模型
 */

interface Image{
    public function display();
}
/*
 * 创建接口实体类
 * */
class RealImage implements Image{
    private $fileName;
    function __construct($filename)
    {
      $this->fileName = $filename;
      $this->loadFromDisk($this->fileName);
    }

    public function display()
    {
        // TODO: Implement display() method.
        echo "Displaying ".$this->fileName."<br>";
    }
    private function loadFromDisk($fileName){
        echo "Loading ".$fileName."<br>";
    }
}

/*
 *
 * 代理实体类
 * */

class ProxyImage implements Image{
    private $RealImage;
    private $fileName;

    function __construct($fileName)
    {
        $this->fileName = $fileName;
    }

    public function display()
    {
        // TODO: Implement display() method.
       if(!isset($this->RealImage)){
           $this->RealImage = new RealImage($this->fileName);
       }
       $this->RealImage->display();
    }

}

$image = new ProxyImage("test_10mb.jpg");

$image->display();
echo "<br>";
echo date("Y-m-d H:i:s",strtotime("+1 year",strtotime('2017-07-28')))."<br>";
echo date("Y-m-d H:i:s",strtotime("+1 year"));