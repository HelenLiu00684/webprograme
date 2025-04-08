<html>
	<head>
		<title>Include Example</title>
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
				<?php
					if(isset($_POST["firstNameTextBox"]))
						$firstName = $_POST["firstNameTextBox"];
					else
						$firstName = "Was not set by the form";

					if(isset($_POST["lastNameTextBox"]))
						$lastName = $_POST["lastNameTextBox"];
					else
						$lastName = "Was not set by the form";

					if(isset($_POST["telnumberTextBox"]))
						$telnumberTextBox = $_POST["telnumberTextBox"];
					else
						$telnumberTextBox = "Was not set by the form";

					if(isset($_POST["emailTextBox"]))
						$emailTextBox = $_POST["emailTextBox"];
					else
						$emailTextBox = "Was not set by the form";

					if(isset($_POST["BirthDayTextBox"]))
						$BirthDayTextBox = $_POST["BirthDayTextBox"];
					else
						$BirthDayTextBox = "Was not set by the form";

					if(isset($_POST["profession"]))
						$profession = $_POST["profession"];
					else
						$profession = "Was not set by the form";

					if(isset($_POST["sports"]))
						$sports = $_POST["sports"];
					else
						$sports = "Was not set by the form";

					echo <<<_END
					<form method="post">
						<label>First Name:</label>
						<input type="text" name="firstNameTextBox" value="Submit">
						<span id="firstNameTextBox">First Name: $firstName</span><br>
						<label>Last Name:</label>
						<input type="text" name="lastNameTextBox" value="Submit" />
						<span id="lastNameTextBox">Last Name: $lastName</span><br>
						<label>Telephone Number:</label>
						<input type="tel" name="telnumberTextBox" value="Submit" />
						<span id="telnumberTextBox">Telephone Number: $telnumberTextBox</span><br>
						<label>Email:</label>
						<input type="email" name="emailTextBox" value="Submit" />
						<span id="emailTextBox">Email: $emailTextBox</span><br>
						<label>Birth Day:</label>
						<input type="Date" name="BirthDayTextBox" value="Submit" />
						<span id="BirthDayTextBox">Birth Day: $BirthDayTextBox</span><br>
						<label>Select your profession :</label><br>
						<input type="radio" id="student" name="profession" value="student">
						<label for="student">Student</label>
						<input type="radio" id="doctor" name="profession" value="doctor">
						<label for="doctor">Doctor</label>
						<input type="radio" id="engineer" name="profession" value="engineer">
						<label for="engineer">Engineer</label>
						<span id="profession">Select your profession : $profession</span><br>
						<label >Choose your favourist sport</label>
								<select name="sports">
									<option value="None"></option>
									<option value="Hockey">Hockey</option>
									<option value="Football">Football</option>
									<option value="Carling">Carling</option>
									<option value="Tennis">Tennis</option>
								</select>
						<span id="sportresult">Choose your favourist sport: $sports</span><br>
						<input type="submit" id="submit" value="submit information" />
					</form>
					<br />

_END;
				?>
			</div>
		</div>
	<?php
	include_once "footer.php";
	?>
	</body>
</html>