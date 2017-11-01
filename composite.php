<?php
/**
 * Created by PhpStorm.
 * User: dusc
 * Date: 2017/7/27
 * Time: 17:15
 * 组合模式 结构
 */

class Employee{
    private $name;
    private $dept;
    private $salary;
    private  $subordinates ;

    function __construct($name,$dept,$salary)
    {
        $this->name = $name;
        $this->dept = $dept;
        $this->salary = $salary;
        $this->subordinates = array();
    }

    public function add($e){
        array_push($this->subordinates,$e);
    }

    public function remove($e){
        foreach ($this->subordinates as $key =>$value){
            if($value === $e){
               unset($this->subordinates[$key]);
            }
        }
    }

    public function getSubordinates(){
        return $this->subordinates;
    }

    public function __toString()
    {
        // TODO: Implement __toString() method.
        return 'Employee :[ Name : "'.$this->name.
      '", dept : "'.$this->dept.'", salary :"'.$this->salary.'" ]';
    }

}


$CEO = new Employee("John","CEO", 30000);

 $headSales = new Employee("Robert","Head Sales", 20000);

 $headMarketing = new Employee("Michel","Head Marketing", 20000);

   $clerk1 = new Employee("Laura","Marketing", 10000);
   $clerk2 = new Employee("Bob","Marketing", 10000);

   $salesExecutive1 = new Employee("Richard","Sales", 10000);
   $salesExecutive2 = new Employee("Rob","Sales", 10000);

      $CEO->add($headSales);
      $CEO->add($headMarketing);

      $headSales->add($salesExecutive1);
      $headSales->add($salesExecutive2);

      $headMarketing->add($clerk1);
      $headMarketing->add($clerk2);

      //打印该组织的所有员工
      echo $CEO."<br>";
      foreach ($CEO->getSubordinates() as $value) {
          echo $value."<br>";
          foreach ($value->getSubordinates() as $v) {
              echo $v."<br>";
          }
      }

      function printfinfo ($CEO){
          echo "<pre>";
          print_r($CEO);
          die();


      }
      printfinfo($CEO);