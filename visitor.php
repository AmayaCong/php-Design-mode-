<?php
/**
 * Created by PhpStorm.
 * User: dusc
 * Date: 2017/8/21
 * Time: 17:35
 */

 interface ComputerPart{
     public function accept($computerPartVisitor);
 }

 class Keyboard implements ComputerPart{
     public function accept($computerPartVisitor)
     {
         // TODO: Implement accept() method.
       $computerPartVisitor->visit($this);
     }
 }

 class Monitor implements ComputerPart{
     public function accept($computerPartVisitor)
     {
         // TODO: Implement accept() method.
         $computerPartVisitor->visit($this);
     }
 }

 class Mouse implements ComputerPart{
     public function accept($computerPartVisitor)
     {
         // TODO: Implement accept() method.
       $computerPartVisitor->visit($this);
     }
 }


 class Computer implements ComputerPart{
     public $parts = array();
     function __construct()
     {
         array_push($this->parts,new Mouse(), new Keyboard(), new Monitor());
     }
     public function accept($computerPartVisitor)
     {
         // TODO: Implement accept() method.
       foreach ($this->parts as $key=>$value){
           $value->accept($computerPartVisitor);
       }
       $computerPartVisitor->visit($this);
     }
 }

 /*定义一个表示访问者的接口*/

 interface CompterPartVisitor{
     public function visit($f);
 }

class ComputerPartDisplayVisitor implements CompterPartVisitor {

    public function visit($computer) {
       echo "Displaying Computer.<br>";
    }
}


$computer = new Computer();
$computer->accept(new ComputerPartDisplayVisitor());