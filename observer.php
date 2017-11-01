<?php
/**
 * Created by PhpStorm.
 * User: dusc
 * Date: 2017/8/21
 * Time: 15:14
 */

class Subject{
    private $observers=array();
    private $state;
    public  function getState(){
        return  $this->state;
    }
    public function setState($state){
        $this->state = $state;
        $this->notifyAllObservers();
    }

    public function attach($observer){
        array_push($this->observers,$observer);
    }

    public  function notifyAllObservers(){
        foreach ($this->observers as $observer) {
              $observer->update();
        }
    }
}

abstract class Observer{
    protected $subject;
    public abstract function update();
}


class BinaryObserver extends Observer{
    function __construct($subject)
    {
       $this->subject = $subject;
       $this->subject->attach($this);
    }

    public function update()
    {
        // TODO: Implement update() method.
       echo "Binary String: ".decbin($this->subject->getState())."<br>";
    }
}

class OctalObserver extends Observer{
    function __construct($subject)
    {
        $this->subject = $subject;
        $this->subject->attach($this);
    }
    public function update()
    {
        // TODO: Implement update() method.
        echo "Hex String: ".decoct($this->subject->getState())."<br>";
    }
}

$subject = new Subject();

new OctalObserver($subject);
new BinaryObserver($subject);



echo "First state change 15<br>";
$subject->setState(15);
echo "<br>Second state change 10<br>";
$subject->setState(10);



