<?php
/**
 * Created by PhpStorm.
 * User: dusc
 * Date: 2017/8/21
 * Time: 17:09
 */

abstract class Game{
    abstract function initialize();
    abstract function startPlay();
    abstract function endPlay();

    /*模板*/
    public final  function play(){
        /*初始化游戏*/
        $this->initialize();

        /*开始游戏*/
        $this->startPlay();

        /*结束*/
        $this->endPlay();
    }
}

class  Cricket extends Game{
    public function initialize()
    {
        // TODO: Implement initialize() method.
        echo "Cricket Game Initialized! Start playing.<br>";
    }
    public function startPlay()
    {
        // TODO: Implement startPlay() method.
        echo "Cricket Game Started. Enjoy the game.<br>";
    }
    public function endPlay()
    {
        // TODO: Implement endPlay() method.
        echo "Cricket Game Finished!<br>";
    }
}

class  Football extends Game{
    public function initialize()
    {
        // TODO: Implement initialize() method.
       echo "Football Game Initiazed! Start Playing.<br>";
    }

    public function startPlay()
    {
        // TODO: Implement startPlay() method.
       echo "Football Game Started.Enjoy the game!<br>";
    }
    public function endPlay()
    {
        // TODO: Implement endPlay() method.
        echo "Football Game Finished! <br>";
    }
}

$game = new Cricket();
$game->play();

echo "<br>";

$game = new Football();
$game->play();
