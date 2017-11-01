<?php
/**
 * Created by PhpStorm.
 * User: dusc
 * Date: 2017/8/21
 * Time: 16:18
 */

interface State {
    public function doAction($context);
}

class StartState implements State {
    public function doAction($context)
    {
        // TODO: Implement doAction() method.
      echo "Player is in start state <br>";
      $context->setState($this);
    }
    public function toString(){
        return "Start State";
    }
}

class StopState implements State{
    public function doAction($context)
    {
        // TODO: Implement doAction() method.
      echo "Player is in stop state<br>";
      $context->setState($this);
    }

    public function toString(){
        return "State Stop";
    }
}

class Context{
    private $state;
    function __construct()
    {
        $this->state = null;
    }

    public function setState($state){
       $this->state = $state;
    }
    public function getState(){
        return $this->state;
    }

}

$context = new Context();

$startState = new StartState();
$startState->doAction($context);

echo $context->getState()->toString()."<br>";

$stopState = new StopState();
$stopState->doAction($context);

echo $context->getState()->toString();
