<?php
/**
 * Created by PhpStorm.
 * User: dusc
 * Date: 2017/7/25
 * Time: 16:46
 */

interface Item{
    public function name();
    public function packing();
    public function price();
}

interface Packing{
    public function pack();
}

/*
 * 创建packing实体类
 * */
class Wrapper implements Packing{
    public function pack()
    {
        // TODO: Implement pack() method.
        return "Wrapper";
    }
}

class Bottle implements Packing{
    public function pack()
    {
        // TODO: Implement pack() method.
        return "Bottle";
    }
}


/*
 *
 * 实现Item接口实体类
 * */
abstract class Burger implements Item{
    public function packing()
    {
        // TODO: Implement packing() method.
       return new Wrapper();
    }
    public abstract function price();
}

abstract class ColdDrink implements Item{
    public function packing()
    {
        // TODO: Implement packing() method.
      return new Bottle();
    }
    public abstract function price();
}


/*
 * 创建burrger coldDrink实体类
 * */

class VegBurger extends Burger{
    public function price()
    {
        // TODO: Implement price() method.
      return 25.0;
    }
    public function name()
    {
        // TODO: Implement name() method.
       return "Veg Burger";
    }
}

class ChickenBurger extends Burger{
    public function price()
    {
        // TODO: Implement price() method.
       return 50.5;
    }
    public function name()
    {
        // TODO: Implement name() method.
       return "Chicken Burger";
    }
}


class Coke extends ColdDrink{
    public function price()
    {
        // TODO: Implement price() method.
      return 30.0;
    }
    public function name()
    {
        // TODO: Implement name() method.
       return "Coke";
    }
}

class Pepsi extends ColdDrink{
    public function price()
    {
        // TODO: Implement price() method.
       return 35.0;
    }
    public function name()
    {
        // TODO: Implement name() method.
        return "Pepsi";
    }
}

/*
 * 创建一个Meal
 * */
class Meal{
    private $List = array();
    public function addItem($item){
        array_push($this->List,$item);
    }
    public function getCost(){
         $cost = 0;
         foreach ($this->List as $value)
             $cost+=$value->price();
         return $cost;
    }

    public function showItems(){
        foreach ($this->List as $value){
            echo "Item:".$value->name().", Packing:".$value->packing()->pack().", Price:".$value->price()."<br>";
        }
    }

}


class MealBuilder{
    public function prepareVegMeal(){
        $meal = new Meal();
        $meal->addItem(new VegBurger());
        $meal->addItem(new Coke());
        return $meal;
    }

    public function prepareNonVegMeal(){
        $meal = new Meal();
        $meal->addItem(new ChickenBurger());
        $meal->addItem(new Pepsi());
        return $meal;
    }
}

$mealBuilder = new MealBuilder();

$vegMeal = $mealBuilder->prepareVegMeal();

$vegMeal->showItems();
echo "Total Cost: ".$vegMeal->getCost();







