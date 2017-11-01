<?php
/**
 * Created by PhpStorm.
 * User: dusc
 * Date: 2017/8/2
 * Time: 16:14
 *
 * 解释器模式 行为模型
 */


 interface Expression{
     public function interpret($context);
 }

 class TerminalExpression implements Expression{
     private $data;

     function __construct($data)
     {
         $this->data = $data;
     }
     public function interpret($context)
     {
         // TODO: Implement interpret() method.
       if(strpos($context,$this->data)!==false){
           return true;
       }
       return false;
     }
 }


 class OrExpression implements  Expression{
     private  $expr1 = null;
     private  $expr2 = null;

     function __construct($expr1,$expr2)
     {
         $this->expr1 = $expr1;
         $this->expr2 = $expr2;
     }

     public function interpret($context)
     {
         // TODO: Implement interpret() method.
        return $this->expr1->interpret($context) || $this->expr2->interpret($context);
     }
 }


 class AndExpression implements Expression{
     private $expr1 = null ;
     private $expr2 = null;

     function __construct($expr1,$expr2)
     {
         $this->expr1 = $expr1;
         $this->expr2 = $expr2;
     }

     public function interpret($context)
     {
         // TODO: Implement interpret() method.
        return $this->expr1->interpret($context) && $this->expr2->interpret($context);
     }
 }


class InterpreterPatternDemo {

    //规则：Robert 和 John 是男性
public static function getMaleExpression(){
    $robert = new TerminalExpression("Robert");
    $john = new TerminalExpression("John");
    return new OrExpression($robert, $john);
}

   //规则：Julie 是一个已婚的女性
   public static function getMarriedWomanExpression(){
      $julie = new TerminalExpression("Julie");
      $married = new TerminalExpression("Married");
      return new AndExpression($julie, $married);
   }

   public static function main() {
       $isMale = self::getMaleExpression();
       $isMarriedWoman = self::getMarriedWomanExpression();

      echo "John is male? " . $isMale->interpret("John");
      echo "Julie is a married women? ".$isMarriedWoman->interpret("Married Julie");
   }
}

$main  =  new InterpreterPatternDemo();

$main::main();