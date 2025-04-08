<?php
	session_start(); // Start Session
	include_once "header.php";
	if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
		// If user don't login redirect to the old page
		header("Location: Admin.php");
		exit();
	}

	?>
<!DOCTYPE html>
<html>
	<head>
		<title>Selection accounts</title>
		<link rel="stylesheet" type="text/css" href="StyleSheet.css" />
	</head>
	<body>
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
						echo "Connected to Database successfully" . "</br>";
						$sqlQuery = "SELECT EmployeeId,FirstName,LastName FROM employee";
						$result = $pdo->query($sqlQuery);

							echo "<table>";  
								echo "<tbody>"; 
									if ($result->rowCount() > 0) {
										while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
											echo "<tr>";
											echo "<td></td>";
											echo "<td></td>";
											echo "<td></td>";
											echo "<td> FirstName: " . $row['FirstName'] . "</td>";
											echo "</tr>";
											echo "<tr>";
											echo "<td>";
											echo "<form method='post' action='UpdateAccount.php'>";
											echo "<input type='hidden' name='EmployeeId' value='" . $row['EmployeeId'] . "' />";
											echo "<input type='submit' value='Edit Employee' />";	
											echo "</form>";
											echo "</td>";
											echo "<td></td>";
											echo "<td></td>";
											echo "<td> LastName: " . $row['LastName'] . "</td>";
											echo "</tr>";  
											}
										}
									else {
											echo "Don't include any data.";
											}
								echo "</tbody>";
							echo "</table>";
						
								$pdo = null;
						} catch (PDOException $e) {
							echo "Connect to DB has error: " . $e->getMessage();
						}

				?>
			</div>
		</div>
	<?php
	include_once "footer.php";
	?>
	</body>
</html>