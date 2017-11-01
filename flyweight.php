<?php
/**
 * Created by PhpStorm.
 * User: dusc
 * Date: 2017/7/28
 * Time: 14:20
 * 享元模式 结构化模式
 */

interface Shape{
    public function draw();
}
/*
 * 创建shape实体类
 * */

class Circle implements Shape{
    private $color;
    private $x;
    private $y;
    private $radius;

    function __construct($color)
    {
        $this->color = $color;
    }

    public function setX($x){
        $this->x =$x;
    }
    public function setY($y){
        $this->y = $y;
    }
    public function setRadius($radius){
        $this->radius=$radius;
    }


    public function draw()
    {
        // TODO: Implement draw() method.
        echo "Circle: Draw() [Color : " . $this->color
        .", x : ".$this->x .", y :". $this->y .", radius :" .$this->radius."<br>";
    }
}




class ShapeFactory {
     private static $circleMap =array();
     public static function getCircle($color){
         $circle = @self::$circleMap[$color];

         if(empty($circle)){
             $circle = new Circle($color);
             self::$circleMap[$color] = $circle;
             echo "Creating circle of color :".$color."<br>";
         }

         return $circle;
     }
}






    for( $i=0; $i < 20; ++$i) {
         $circle = ShapeFactory::getCircle(getRandomColor());
         $circle->setX(getRandomX());
         $circle->setY(getRandomY());
         $circle->setRadius(100);
         $circle->draw();
      }

  function getRandomColor() {
      $colors = array( "Red", "Green", "Blue", "White", "Black" );
      return $colors[intval(randFloat()*count($colors))];
   }
  function getRandomX() {
      return (int)(randFloat()*100 );
   }
   function getRandomY() {
      return (int)(randFloat()*100);
   }
   function randFloat($min=0, $max=1){
       return $min + mt_rand()/mt_getrandmax() * ($max-$min);
   }