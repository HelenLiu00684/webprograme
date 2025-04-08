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
				<div id="inputForm">
					<form method="post" action="Session2.php">
						<label>First Name:</label>
						<input type="text" name="firstNameTextBox" value="Submit"><br>
						<label>Last Name:</label>
						<input type="text" name="lastNameTextBox" value="Submit" /><br>
						<label>Telephone Number:</label>
						<input type="tel" name="telnumberTextBox" value="Submit" /><br>
						<label>Email:</label>
						<input type="email" name="emailTextBox" value="Submit" /><br>
						<label>Birth Day:</label>
						<input type="Date" name="BirthDayTextBox" value="Submit" /><br>
						<label>Select your profession :</label><br>
						<input type="radio" id="student" name="profession" value="student">
						<label for="student">Student</label>
						<input type="radio" id="doctor" name="profession" value="doctor">
						<label for="doctor">Doctor</label>
						<input type="radio" id="engineer" name="profession" value="engineer">
						<label for="engineer">Engineer</label><br>
						<label >Choose your favourist sport</label>
								<select name="sports">
									<option value="None"></option>
									<option value="Hockey">Hockey</option>
									<option value="Football">Football</option>
									<option value="Carling">Carling</option>
									<option value="Tennis">Tennis</option>
								</select>
						<input type="submit" id="submit" value="submit information" />
					</form>
					<br />
				</div>
			</div>
		</div>
    <?php
        include_once "footer.php";
    ?>
	</body>
</html>