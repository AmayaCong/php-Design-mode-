<?php
/**
 * Created by PhpStorm.
 * User: dusc
 * Date: 2017/8/2
 * Time: 15:08
 * 命令模式 行为型模式
 */

interface Order{
    public function execute();
}
/*
 * 创建请求类
 * */
class Stock{
    private $name = "ABC";
    private $quantity = 10;

    public function buy(){
        echo "Stock [ Name:".$this->name.",Quantity:".$this->quantity."] bought<br>";
    }

    public function sell(){
        echo "Stock [ Name:".$this->name.",Quantity:".$this->quantity."] sold<br>";
    }
}

/*
 * 实现Order接口实体类
 * */
class BuyStock implements Order{
    private $abcStock;

    function __construct($abcStock)
    {
        $this->abcStock = $abcStock;
    }

    public function execute()
    {
        // TODO: Implement execute() method.
       $this->abcStock->buy();
    }
}

class SellStock implements Order{
    private $abcStock;

    function __construct($abcStock){
        $this->abcStock =$abcStock;
    }
    public function execute()
    {
        // TODO: Implement execute() method.
      $this->abcStock->sell();
    }
}
/*
 * 命令调用类
 *
 * */
class Broker{
    private  $orderList = array();

    public function takeOrder($order){
        array_push($this->orderList,$order);
    }

    public function placeOrders(){
        foreach ($this->orderList as $order){
            $order->execute();
            array_shift($this->orderList);
        }
    }
}

$abcStock = new Stock();

$buyStock = new BuyStock($abcStock);
$sellStock = new SellStock($abcStock);

$broker = new Broker();

$broker->takeOrder($buyStock);
$broker->takeOrder($sellStock);

$broker->placeOrders();





