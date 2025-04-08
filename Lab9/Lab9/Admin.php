<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <link rel="stylesheet" type="text/css" href="StyleSheet.css" />
</head>
<body>
    <?php
		session_start(); // enable session
        include_once "header.php";
    ?>
    <div id="container">
        <?php
            include_once "menu.php";
        ?>
        <div id="content">
				<?php

					require "MySQLConnectionInfo.php";
					$error = "";
					$connectionStatus = "";
				if ($_SERVER["REQUEST_METHOD"] == "POST") {
					if(!isset($_POST["emailTextBox"])||!isset($_POST["passwordTextBox"])||!isset($_POST["admincodeTextBox"]))
					{
						$error = "Email,Password or AdminCode has not be set."; 
					}
					else
					{
						if($_POST["emailTextBox"] != "" && $_POST["passwordTextBox"] != "" && $_POST["admincodeTextBox"] != "" ){
							try {
								$pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
								// PDO error!
								$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
								$connectionStatus = "Connected successfully";

								$sqlQuery = "SELECT Password,AdminCode FROM employee WHERE EmailAddress ='".$_POST["emailTextBox"]."'";

								try {
									$result = $pdo->query( $sqlQuery );
									$row = $result->fetch(PDO::FETCH_ASSOC);

									if ($row) {
										$passwordFromDb = $row['Password'];
										$admincode = $row['AdminCode'];
										if ($_POST["passwordTextBox"] == $passwordFromDb && $_POST["admincodeTextBox"] == '999') {
											$_SESSION['loggedin'] = true; // set the session loggedin
											$_SESSION['email'] = $_POST['emailTextBox']; // saving email
											$_SESSION['admincode'] = $_POST['admincodeTextBox']; // saving email
											header("Location: SelectAccount.php"); // redirection
											exit(); // exit script
										} else {
											$error = "password error or unauthorization.";
										}
									} else {
										$error = "the email should not be exist";
										}
									}
								catch(PDOException $e) {
									$error = "Checking failed:  " . $e->getMessage();
									echo $error . "<br>"; 
									}

							$pdo = null;
							}
						catch(PDOException $e) {
							$error = "connect to DB has failed:  " . $e->getMessage();
							echo $error . "<br>"; // connect error
						}
						}
					else{
						$error = "please input more detailed information."; // 更明确的错误信息
						}
					}
				}
			?>
<!DOCTYPE html>
<html>
	<head>
		<title>Admin Panel</title>
		<link rel="stylesheet" type="text/css" href="StyleSheet.css" />
	</head>
	<body>
					<form method="post">
						<h2>Admin Panel</h2>
						<label>Email&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:</label>
						<input type="email" name="emailTextBox" value="" /><br>
						<label>Password :</label>
						<input type="text" name="passwordTextBox" value="" /><br>
						<label>Admin Code :</label>
						<input type="text" name="admincodeTextBox" value="" /><br>
						<input type="submit" id="submit" value="submit information" />
					</form>

					<br />

		<?php
			echo $connectionStatus. "<br>";
			echo $error;
		?>
			</div>
		</div>
	<?php
	include_once "footer.php";
	?>
	</body>
</html>