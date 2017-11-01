<?php
/**
 * Created by PhpStorm.
 * User: dusc
 * Date: 2017/8/21
 * Time: 14:14
 */

interface IIterator{
    public function hasNext();
    public function next();
}

interface Container{
    public function getIterator();
}
/* 接口Container实体类*/

class NameRepository implements Container{
    public $names = array("Robert","John","Julie","Lora");

    public function getIterator()
    {
        // TODO: Implement getIterator() method.
      return new NameIterator($this->names);
    }

}

class NameIterator implements IIterator{
    public $index=0;
    public $_data;
    function __construct($_data)
    {
        $this->_data = $_data;
    }

    public function hasNext()
    {
        // TODO: Implement hasNext() method.
        if($this->index < count($this->_data)){
            return true;
        }
        return false;
    }
    public function next()
    {
        // TODO: Implement next() method.
        if($this->hasNext()){
            return $this->_data[$this->index++];
        }
        return null;
    }
}

$nameRepository = new NameRepository();

for($iter=$nameRepository->getIterator();$iter->hasNext();){
    $name = (string)$iter->next();
    echo "Name:{$name}<br>";
}

