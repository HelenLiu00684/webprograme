<?php
session_start(); // Start Session
?>
<!DOCTYPE html>
<html>
<head>
    <title>Employee List</title>
    <link rel="stylesheet" type="text/css" href="StyleSheet.css" />
</head>
<body>
    <?php
    include_once "header.php";
    ?>
    <div id="container">
        <?php
            include_once "menu.php";
        ?>
        <div id="content">
            <h2>DataBase Data</h2>
            <?php

                require "MySQLConnectionInfo.php";

                try {
                    $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
                    // Set PDO status
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    echo "<p style='color: green;'>Connected to Database successfully</p>" . "</br>";

                    $sqlQuery = "SELECT * FROM employee";
                    $result = $pdo->query($sqlQuery);

                    if ($result->rowCount() > 0) {
                        echo "<table border='1'>";
                        echo "<tr><th>First Name</th><th>Last Name</th><th>Email Address</th><th>Phone Number</th><th>SIN</th><th>Designation</th></tr>";
                        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($row['FirstName']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['LastName']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['EmailAddress']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['TelephoneNumber']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['SocialInsuranceNumber']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['Designation']) . "</td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "<p>No employee data found.</p>";
                    }

                    $pdo = null;
                } catch (PDOException $e) {
                    echo "<p style='color: red;'>Connect to DB has error: " . htmlspecialchars($e->getMessage()) . "</p>";
                }

            ?>
        </div>
    </div>
    <?php
    include_once "footer.php";
    ?>
</body>
</html>