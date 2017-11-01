<?php
/**
 * Created by PhpStorm.
 * User: dusc
 * Date: 2017/8/21
 * Time: 16:49
 */

interface Strategy{
    public function doOperation($num1,$num2);
}

class OperationAdd implements Strategy{
    public function doOperation($num1, $num2)
    {
        // TODO: Implement doOperation() method.
      return $num1+$num2;
    }
}

class OperationMultiply implements Strategy{
    public function doOperation($num1, $num2)
    {
        // TODO: Implement doOperation() method.
       return $num1*$num2;
    }
}

class Context{
    private $strategy;
    public function __construct($strategy)
    {
        $this->strategy = $strategy;
    }
    public function executeStrategy($num1,$num2){
        return $this->strategy->doOperation($num1,$num2);
    }
}

$context = new Context(new OperationAdd());

echo "10+5=".$context->executeStrategy(10,5);



