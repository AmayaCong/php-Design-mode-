<?php
/**
 * Created by PhpStorm.
 * User: dusc
 * Date: 2017/8/23
 * Time: 10:39
 */

interface Filter{
    public function execute($request);
}

class AuthenticationFilter implements Filter{
    public function execute($request)
    {
        // TODO: Implement execute() method.
       echo "Authenticaticating request:{$request}<br>";
    }
}
class DebugFilter implements Filter{
    public function execute($request)
    {
        // TODO: Implement execute() method.
      echo "request log:{$request}<br>";
    }
}

class Target{
    public function execute($request){
        echo "Executing request:$request<br>";
    }
}

class FilterChain{
    private $filters = array();
    private $target;

    public function addFilter($filter){
        array_push($this->filters,$filter);
    }

    public function execute($request){
        foreach ($this->filters as $value)
            $value->execute($request);

        $this->target->execute($request);
    }
    public function setTarget($target){
        $this->target = $target;
    }
}

/*过滤器管理器*/

class FilterManager{
    public  $filterChain;

    public function __construct($target)
    {
        $this->filterChain = new FilterChain();
        $this->filterChain->setTarget($target);
    }

    public function setFilter($filter){
        $this->filterChain->addFilter($filter);
    }

    public function filterRequest($request){
        $this->filterChain->execute($request);
    }
}

/*客户端类*/
class Client{
    public $filterManager;

    public function setFilterManager($filterManager){
        $this->filterManager = $filterManager;
    }
    public function sendRequest($request){
        $this->filterManager->filterRequest($request);
    }
}

$filterManager = new FilterManager(new Target());
$filterManager->setFilter(new AuthenticationFilter());
$filterManager->setFilter(new DebugFilter());

$client = new Client();
$client->setFilterManager($filterManager);
$client->sendRequest("HOME");

