<?php 
class Employee{
    private $id;
    private $name;
    private $salary;
    private $age;

    function setId($id){
        $this->id = $id;
    }

    function setName($name){
        $this->name = $name;
    }

    function setSalary($salary){
        $this->salary = $salary;
    }

    function setAge($age){
        $this->age = $age;
    }

    function getId(){
        return $this->id;
    }

    function getName(){
        return $this->name;
    }

    function getSalary(){
        return $this->salary;
    }

    function getAge(){
        return $this->age;
    }
}
?>