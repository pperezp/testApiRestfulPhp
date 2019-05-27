<?php
require_once("../model/db/Connection.php");
require_once("../model/Employee.php");

class EmployeeController{
    private $db;

    function __construct(){
        $this->db = new Connection();
    }

    function read(){
        $json = $this->db->executeToJSON("SELECT * FROM employee");
        return $json;
    }

    function readById($id = 0){ 
        $json = $this->db->executeToJSON("SELECT * FROM employee WHERE id = $id");
        return $json;
    }

    function create($employee){
        $result = $this->db->execute(
            "INSERT INTO employee 
            SET employee_name='".$employee->getName()."', 
            employee_salary='".$employee->getSalary()."', 
            employee_age='".$employee->getAge()."'"
        );
    
        if($result){
            $response = array(
                'status' => 1,
                'status_message' =>'Employee Added Successfully.'
            );
        }else{
            $response = array(
                'status' => 0,
                'status_message' =>'Employee Addition Failed.'
            );
        }
        
        echo json_encode($response);
    }

    function update($employee){
        $result = $this->db->execute(
            "UPDATE employee 
            SET employee_name='".$employee->getName()."', 
            employee_salary='".$employee->getSalary()."', 
            employee_age='".$employee->getAge()."' 
            WHERE id=".$employee->getId()
        );
        
        if($result){
            $response = array(
                'status' => 1,
                'status_message' =>'Employee Updated Successfully.'
            );
        }else{
            $response = array(
                'status' => 0,
                'status_message' =>'Employee Updation Failed.'
            );
        }
    
        echo json_encode($response);
    }
    
    function delete($id){
        $result = $this->db->execute("DELETE FROM employee WHERE id = ".$id);
    
        if($result){
            $response = array(
                'status' => 1,
                'status_message' =>'Employee Deleted Successfully.'
            );
        }else{
            $response = array(
                'status' => 0,
                'status_message' =>'Employee Deletion Failed.'
            );
        }

        echo json_encode($response);
    }
}
?>