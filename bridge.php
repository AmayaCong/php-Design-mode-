<?php
/**
 * Created by PhpStorm.
 * User: dusc
 * Date: 2017/7/26
 * Time: 10:27
 * 桥接模式 结构型模式
 */

/*
 * 创建桥接接口
 * */

interface DrawApi{
    public function drawCircle($radius,$x,$y);
}

/*
 * 创建实现DrawApi
 * */

class RedCircle implements DrawApi{
    public function drawCircle($radius, $x, $y)
    {
        // TODO: Implement drawCircle() method.
      echo "Drawing Circle[ color: red, radius:{$radius},x:{$x},y:{$y}]";
    }
}

class GreenCircle implements DrawApi{
    public function drawCircle($radius, $x, $y)
    {
        // TODO: Implement drawCircle() method.
        echo "Drawing Circle[ color: Green, radius:{$radius},x:{$x},y:{$y}]";
    }
}

abstract class Shape{
    protected $drawApi;
     function __construct($drawApi)
    {
      $this->drawApi= $drawApi;
    }
    public abstract function draw();
}

class Circle extends Shape{
    private $x,$y,$radius;
    function __construct($x,$y,$radius,$drawAPI)
    {
       parent::__construct($drawAPI);
       $this->x = $x;
       $this->y = $y;
       $this->radius = $radius;
    }
    public function draw(){
        $this->drawApi->drawCircle($this->radius,$this->x,$this->y);
    }
}
$redCircle = new Circle(100,100, 10, new RedCircle());
$greenCircle = new Circle(100,100, 10, new GreenCircle());

$redCircle->draw();
$greenCircle->draw();