<?php
	session_start(); // Start Session
	include_once "header.php";
	if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
		// If user don't login redirect to the old page
		header("Location: Admin.php");
		exit();
	}

	require "MySQLConnectionInfo.php";
// echo "<pre>";
// var_dump($_POST['EmployeeId']);
// echo "</pre>";
	$error = "";

// get value by POST EmployeeId
$employeeId = isset($_POST['EmployeeId']) ? $_POST['EmployeeId'] : '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if(isset($_POST["firstNameTextBox"]) && isset($_POST["lastNameTextBox"]) && isset($_POST["phonenumberTextBox"]) && isset($_POST["emailTextBox"]) && isset($_POST["sinTextBox"]) && isset($_POST["passwordTextBox"]) && isset($_POST["employeeField"]) && isset($_POST["admincodeTextBox"]) && isset($_POST['EmployeeId'])) {
		if($_POST["firstNameTextBox"] != ""&&$_POST["lastNameTextBox"] != "" && $_POST["phonenumberTextBox"] != "" && $_POST["emailTextBox"] != "" && $_POST["sinTextBox"] != "" && $_POST["passwordTextBox"] != "" &&$_POST["employeeField"] != "" && $_POST["admincodeTextBox"] != ""){
			try {
				$pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
				// set the PDO error mode to exception
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$sqlQuery = "UPDATE employee
								SET FirstName = '" . $_POST["firstNameTextBox"] . "',
									LastName = '" . $_POST["lastNameTextBox"] . "',
									TelephoneNumber = '" . $_POST["phonenumberTextBox"] . "',
									EmailAddress = '" . $_POST["emailTextBox"] . "',
									SocialInsuranceNumber = '" . $_POST["sinTextBox"] . "',
									Password = '" . $_POST["passwordTextBox"] . "',
									Designation = '" . $_POST["employeeField"] . "',
									AdminCode = '" . $_POST["admincodeTextBox"] . "'
								WHERE EmployeeId = " . $_POST['EmployeeId'];

					$result = $pdo->query($sqlQuery);
echo"<pre>";
echo htmlspecialchars($sqlQuery);
echo "</pre>";
				if ($result) {
					$_SESSION['update_status'] = 'success';
					header("Location: UpdateComplete.php");
					exit();
				} else {
					$_SESSION['update_status'] = 'failure';
					header("Location: UpdateComplete.php");
					exit();
				}
			}
			catch(PDOException $e) {
				echo "Connection failed:  " . $e->getMessage();
			}
		} else{
			$error = "Please enter all items first.";
		}
	} 
	//else {
	//	$error = "Some items have not been set.";
	//}
}

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Update Account</title>
		<link rel="stylesheet" type="text/css" href="StyleSheet.css" />
	</head>
	<body>
		<div id="container">
			<?php
				include_once "menu.php";
			?>
			<div id="content">
				<div id="inputForm">
					<h3>Form Submission Results</h3>
					<?php
						echo $error;
					?>
					<form method="post">
						<h5>Please fill all your information</h5>
						<label>First Name:</label>
						<input type="text" name="firstNameTextBox" value="" /><br>
						<label>Last Name:</label>
						<input type="text" name="lastNameTextBox" value="" /><br>
						<label>Phone Number:</label>
						<input type="tel" name="phonenumberTextBox" value="" /><br>
						<label>Email:</label>
						<input type="email" name="emailTextBox" value="" /><br>
						<label>SIN:</label>
						<input type="text" name="sinTextBox" value="" /><br>
						<label>Password :</label>
						<input type="text" name="passwordTextBox" value="" /><br>
						<label >Designation</label>
								<select name="employeeField" id="employeeField">
									<option value="None"></option>
									<option value="IT Specialist">IT Specialist</option>
									<option value="IT Developer">IT Developer</option>
									<option value="Manager">Manager</option>
								</select><br>
						<label>Admin Code :</label>
						<input type="text" name="admincodeTextBox" id="admincodeTextBox" value="" /><br>
						<input type="hidden" name="EmployeeId" value="<?php echo htmlspecialchars($employeeId); ?>" />
						<input type="submit" id="submit" value="submit information" />
					</form>
					<br />
					<script>
						const inputField = document.getElementById('employeeField');
						const outputField = document.getElementById('admincodeTextBox');

						const valueMap = {
						'IT Specialist': 222,
						'IT Developer': 111,
						'Manager': 999,
						'None': '' // Added a mapping for 'None'
						};
					inputField.addEventListener('change', function() {
						const selectedDesignation = this.value; // Corrected variable name
						outputField.value = valueMap[selectedDesignation] || ''; // Use selectedDesignation and provide a default empty string
					});
					</script>
				</div>
			</div>
		</div>
	<?php
	include_once "footer.php";
	?>
	</body>
</html>