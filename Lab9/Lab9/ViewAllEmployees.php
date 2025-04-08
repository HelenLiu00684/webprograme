<?php
	session_start(); // Start Session
	include_once "header.php";
	if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
		// If user don't login redirect to the old page
		header("Location: login.php");
		exit();
	}

	?>
<!DOCTYPE html>
<html>
	<head>
		<title>Employee List</title>
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

						$sqlQuery = "SELECT * FROM employee";
						$result = $pdo->query($sqlQuery);

						if ($result->rowCount() > 0) {
							echo "<table border='1'>";
							echo "<tr><th>First Name</th><th>Last Name</th><th>Email Address</th><th>Phone Number</th><th>SIN</th><th>Designation</th></tr>";
							while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
								echo "<tr>";
								echo "<td>" . $row['FirstName'] . "</td>";
								echo "<td>" . $row['LastName'] . "</td>";
								echo "<td>" . $row['EmailAddress'] . "</td>";
								echo "<td>" . $row['TelephoneNumber'] . "</td>";
								echo "<td>" . $row['SocialInsuranceNumber'] . "</td>";
								echo "<td>" . $row['Designation'] . "</td>";
								echo "</tr>";
							}
							echo "</table>";
						} else {
							echo "Don't include any data.";
						}

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