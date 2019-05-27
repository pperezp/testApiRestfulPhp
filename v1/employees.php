<?php 
// https://www.phpflow.com/php/create-php-restful-api-without-rest-framework-dependency/

header('Content-Type: application/json');

require_once("../controller/EmployeeController.php");
require_once("../model/Employee.php");

$requestMethod = $_SERVER["REQUEST_METHOD"];

$employeeController = new EmployeeController();

switch($requestMethod){
    case 'GET':
        // Retrive Employees
        if(!empty($_GET["id"])){
            $id = intval($_GET["id"]);
            $json = $employeeController->readById($id);
        }else{
            $json = $employeeController->read();
        }

        echo $json;

        break;

    case 'POST':
        // Insert Employees
        $data = json_decode(file_get_contents('php://input'), true);
    
        $employee = new Employee();

        $employee->setName($data["employee_name"]);
        $employee->setSalary($data["employee_salary"]);
        $employee->setAge($data["employee_age"]);

        $employeeController->create($employee);
        break;

    case 'PUT':
        // Update Employee
        $id = intval($_GET["id"]);
        $data = json_decode(file_get_contents("php://input"),true);
        
        $employee = new Employee();

        $employee->setId($id);
        $employee->setName($data["employee_name"]);
        $employee->setSalary($data["employee_salary"]);
        $employee->setAge($data["employee_age"]);

        $employeeController->update($employee);

        break;

    case 'DELETE':
        // Delete Employees
        $id = intval($_GET["id"]);
        $employeeController->delete($id);
        break;
    
    default:
        // Invalid Request Method
        header("HTTP/1.0 405 Method Not Allowed");
        break;
}
?>