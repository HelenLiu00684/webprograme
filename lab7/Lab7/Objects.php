
<?php

include_once 'Employee.php';
include_once 'Supervisor.php';


    $employee1 = new Employee(1, "Chris", "Papros");
    $employee2 = new Employee(2, "Matt", "Aben");
    $employee3 = new Employee(3, "Carly", "Burnell");
    $employee4 = new Employee(4, "Elizabeth", "Ford");
    $employee5 = new Employee(5, "Doug", "May");
    $employee6 = new Employee(6, "John", "Hopkins");


    $supervisor1 = new Supervisor(101, "Adam", "Philip", [$employee1, $employee2, $employee3]);
    $supervisor2 = new Supervisor(102, "Nicholas", "Jones", [$employee4, $employee5, $employee6]);


    echo "<p>Employee Id: " . $employee1->getEmployeeId() . ", Name: " . $employee1->getFirstName() . " " . $employee1->getLastName() . ", Supervisor: " . $supervisor1->getFirstName() . " " . $supervisor1->getLastName() . "</p>";
    echo "<p>Employee Id: " . $employee2->getEmployeeId() . ", Name: " . $employee2->getFirstName() . " " . $employee2->getLastName() . ", Supervisor: " . $supervisor1->getFirstName() . " " . $supervisor1->getLastName() . "</p>";
    echo "<p>Employee Id: " . $employee3->getEmployeeId() . ", Name: " . $employee3->getFirstName() . " " . $employee3->getLastName() . ", Supervisor: " . $supervisor1->getFirstName() . " " . $supervisor1->getLastName() . "</p>";
    echo "<p>Employee Id: " . $employee4->getEmployeeId() . ", Name: " . $employee4->getFirstName() . " " . $employee4->getLastName() . ", Supervisor: " . $supervisor2->getFirstName() . " " . $supervisor2->getLastName() . "</p>";
    echo "<p>Employee Id: " . $employee5->getEmployeeId() . ", Name: " . $employee5->getFirstName() . " " . $employee5->getLastName() . ", Supervisor: " . $supervisor2->getFirstName() . " " . $supervisor2->getLastName() . "</p>";
    echo "<p>Employee Id: " . $employee6->getEmployeeId() . ", Name: " . $employee6->getFirstName() . " " . $employee6->getLastName() . ", Supervisor: " . $supervisor2->getFirstName() . " " . $supervisor2->getLastName() . "</p>";


?>

