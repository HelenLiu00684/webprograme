<?php
require "MySQLConnectionInfo.php"; // Include database connection details

try {
    $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

if (isset($_GET['action'])) {
    $action = $_GET['action'];
    if ($action === 'list') {
        try {
            $sql = "SELECT EmployeeID, FirstName, LastName FROM Employee";
            $result = $pdo->query($sql);
            $employees = $result->fetchAll(PDO::FETCH_ASSOC);
            header('Content-Type: application/json');
            echo json_encode($employees);
        } catch (PDOException $e) {
            header('Content-Type: application/json');
            echo json_encode(array('error' => 'Error fetching employee list: ' . $e->getMessage()));
        }

    } elseif ($action === 'details') {
        if (isset($_GET['EmployeeID'])) {
            $employeeId = $_GET['EmployeeID'];
            try {
                // WARNING: This approach is vulnerable to SQL injection.
                // It is strongly recommended to use prepared statements for security.
                $sql = "SELECT FirstName, LastName, EmailAddress, TelephoneNumber, SocialInsuranceNumber, Password, Designation FROM Employee WHERE EmployeeID = " . $pdo->quote($employeeId);
                $result = $pdo->query($sql);
                $employee = $result->fetch(PDO::FETCH_ASSOC);
                header('Content-Type: application/json');
                echo json_encode($employee);
            } catch (PDOException $e) {
                header('Content-Type: application/json');
                echo json_encode(array('error' => 'Error fetching employee details: ' . $e->getMessage()));
            }
        } else {
            header('Content-Type: application/json');
            echo json_encode(null);
        }
    } else {
        header('Content-Type: application/json');
        echo json_encode(array('error' => 'Invalid action'));
    }
}

// 关闭 PDO 连接
$pdo = null;
?>