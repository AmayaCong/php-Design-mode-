<?php

/**
 * Created by PhpStorm.
 * User: dusc
 * Date: 2017/7/21
 * Time: 17:20
 */


/*
 * 单例模式
 * */
class test
{
   private static $_instance = null;

   private  function  __construct()
   {
   }
   private function __clone()
   {
       // TODO: Implement __clone() method.
   }

   static public  function getInstance(){
       if( is_null(self::$_instance) || isset(self::$_instance)){
           self::$_instance = new self();
       }
       return self::$_instance;
   }
   public function getName(){
       echo "hello world\n";
       return true;
   }

}

//$testt = test::getInstance();
//var_dump($testt->getName());

/*
 *  工厂模式
 * */
interface shap{
    function draw();
}

class Rectangle implements shap{
    public function draw()
    {
        // TODO: Implement draw() method.
        echo "Inside Rectangle::draw method";
    }
}

class Square implements shap{
    public function draw()
    {
        // TODO: Implement draw() method.
        echo "Inside Square::draw method";
    }
}
class Circle implements shap{
    public function draw()
    {
        // TODO: Implement draw() method.
        echo "Inside Circle::draw method";

    }
}

class shapeFactory extends abstrctFactory {
    public function getShap($str=null){
         if(null == $str){
             return null;
         }
         if('CIRCLE'== strtoupper($str)){
             return new Circle();
         }elseif ('RECTANGLE'== strtoupper($str)){
             return new Rectangle();
         }elseif('SQUARE' == strtoupper($str)){
             return new Square();
         }
         return null;
    }

    public function getColor($color = null)
    {
        // TODO: Implement getColor() method.
        return null;
    }
}

/*
 * 抽象工厂模式
 *
 * */

/*
 *  创建颜色接口
 * */

interface Color{
    public function fill();
}

class Red implements Color{

    public function fill()
    {
        // TODO: Implement fill() method.

        echo "Inside Red::fill method";
    }
}

class Green implements Color{
    public function fill()
    {
        // TODO: Implement fill() method.
        echo "Inside Green::fill method";
    }
}


/*
 * 抽象工厂
 * */

abstract class abstrctFactory{
    abstract function getColor($color=null);
    abstract function getShap($shap = null);
}

class ColorFactory extends abstrctFactory{
    public function getColor($color = null)
    {
        // TODO: Implement getColor() method.
        if($color == null){
            return null;
        }
        if(!strcasecmp($color,"RED")){
            return new Red();
        } else if(!strcasecmp($color,"GREEN")){
            return new Green();
        }
        return null;
    }
    public function getShap($shap = null)
    {
        // TODO: Implement getShap() method.
       return $shap;
    }
}

class FactoryProducer{
    static function getFactory($factory){
        if(!strcasecmp($factory,"SHAP")){
             return new shapeFactory();
        }elseif (!strcasecmp($factory,"COLOR")){
            return new ColorFactory();
        }
       return null;
    }
}









$Factory = new FactoryProducer();
$shpap1 = $Factory::getFactory("SHAP")->getShap("RECTANGLE");
var_dump($shpap1);
$shpap1->draw();
echo "<br>";
$color1 = $Factory::getFactory("color")->getColor("GREEN");
var_dump($color1);
$color1->fill();



