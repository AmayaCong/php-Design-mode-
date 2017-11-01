<?php
/**
 * Created by PhpStorm.
 * User: dusc
 * Date: 2017/7/25
 * Time: 18:17
 * 原型模型
 */

abstract class Shape {
    private  $id;
    protected  $type;

    abstract function draw();
    public function getType(){
        return $this->type;
    }
    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }
    public function copy(){
         return clone $this;
    }

}

class Rectangle extends Shape{
    public function __construct(){
        $this->type = "Rectangle";
    }
    public function draw()
    {
        // TODO: Implement draw() method.
       echo "Inside Rectangle::draw() method.";
    }
}

class Circle extends Shape{
    function __construct()
    {
       $this->type = "Circle";
    }
    public function draw()
    {
        // TODO: Implement draw() method.
      echo "Inside Circle::draw() method.";
    }
}


class ShapeCache{
    public static $tt = array();

    public static function getShape($i){
        return self::$tt[$i]->copy();
    }
    public static function loadCache(){
       $circle = new Circle();

       array_push(self::$tt,$circle);

       $rectangle = new Rectangle();
       array_push(self::$tt,$rectangle);

    }
}

ShapeCache::loadCache();

var_dump(ShapeCache::getShape(1));

