<?php

include_once 'Employee.php'; // import super class

class Supervisor extends Employee {
    private $employees;

    public function __construct($employeeId, $firstName, $lastName, $employees) {
        parent::__construct($employeeId, $firstName, $lastName); // invoke father constructor
    }

    public function getEmployees() {
        return $this->employees;
    }

    public function setEmployees($employees) {
        $this->employees = $employees;
    }
}

?>