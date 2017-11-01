<?php
/**
 * Created by PhpStorm.
 * User: dusc
 * Date: 2017/7/27
 * Time: 15:32
 * 过滤模式
 */
class Person{
    private $name;
    private $gender;
    private $maritalStatus;

    function __construct($name,$gender,$martalStatus){
        $this->name =$name;
        $this->gender = $gender;
        $this->maritalStatus = $martalStatus;
    }

    public function getName(){
        return $this->name;
    }
    public function getGender(){
        return $this->gender;
    }
    public function getMaritaStatus(){
        return $this->maritalStatus;
    }
}
/*
 * 标准接口
 * */

interface Criteria{
    public function meetCriteria($persons);
}
/*
 * 创建Criteria接口的实体类
 * */

class CriteriaMale implements Criteria{
    public function meetCriteria($persons)
    {
        // TODO: Implement meetCriteria() method.
       $malePersons = array();
       foreach ($persons as $value){
           if(!strcasecmp($value->getGender(),"MALE")){
               array_push($malePersons,$value);
           }
       }
       return $malePersons;
    }
}
class CriteriaSingle implements Criteria{
    public function meetCriteria($persons)
    {
        // TODO: Implement meetCriteria() method.
        $singlePersons = array();
        foreach ($persons as $value){
            if(!strcasecmp($value->getMaritaStatus(),"SINGLE")){
                array_push($singlePersons,$value);
            }
        }
        return $singlePersons;
    }
}

class CriteriaFemale implements Criteria{
    public function meetCriteria($persons)
    {
        // TODO: Implement meetCriteria() method.
        $femalePersons = array();
        foreach ($persons as $value){
            if(!strcasecmp($value->getGender(),"FEMALE")){
                array_push($femalePersons,$value);
            }
        }
        return $femalePersons;
    }
}


class AndCriteria implements Criteria{
    private $criteria;
    private $otherCriteria;
    function __construct($criteria,$otherCriteria)
    {
        $this->criteria = $criteria;
        $this->otherCriteria = $otherCriteria;
    }

    public function meetCriteria($persons)
    {
        // TODO: Implement meetCriteria() method.
        $firstCriteriaPersons = $this->criteria->meetCriteria($persons);
        return $this->otherCriteria->meetCriteria($firstCriteriaPersons);
    }
}


class OrCriteria implements Criteria{
    private $criteria;
    private $otherCriteria;
    function __construct($criteria,$otherCriteria)
    {
       $this->criteria = $criteria;
       $this->otherCriteria = $otherCriteria;
    }

    public function meetCriteria($persons)
    {
        // TODO: Implement meetCriteria() method.
       $firstCriteriaItems = $this->criteria->meetCriteria($persons);
       $otherCriteriaItems = $this->otherCriteria->meetCriteria($persons);

       foreach ($otherCriteriaItems as $value){
           if(!contains($firstCriteriaItems,$value)){
               array_push($firstCriteriaItems,$value);
           }
       }
       return $firstCriteriaItems;
    }
}

function contains($objlist,$obj){
    foreach ($objlist as $value){
        if($value === $obj)
           return true;
    }
    return false;
}

$persons = array();
array_push($persons,new Person("Robert","Male", "Single"));
array_push($persons,new Person("John","Male", "Married"));
array_push($persons,new Person("Laura","Female", "Married"));
array_push($persons,new Person("Diana","Female", "Single"));
array_push($persons,new Person("Mike","Male", "Single"));
array_push($persons,new Person("Bobby","Male", "Single"));


  $male = new CriteriaMale();
  $female = new CriteriaFemale();
  $single = new CriteriaSingle();
  $singleMale = new AndCriteria($single, $male);
  $singleOrFemale = new OrCriteria($single, $female);

echo "Males: <br>";
printPersons($male->meetCriteria($persons));

echo "<br>Females: <br>";
printPersons($female->meetCriteria($persons));

echo "<br>Single Males: <br>";
printPersons($singleMale->meetCriteria($persons));

echo "<br>Single Or Females: <br>";
printPersons($singleOrFemale->meetCriteria($persons));

function printPersons($persons){
    foreach ($persons as  $value) {
        echo "Person : [ Name : " . $value->getName().
            ", Gender : " . $value->getGender().
            ", Marital Status : " . $value->getMaritaStatus().
            " ]<br>";
    }
   }

