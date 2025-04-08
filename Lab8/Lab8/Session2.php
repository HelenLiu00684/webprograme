<!DOCTYPE html>
<html>
<head>
    <title>Session 2 - Form Submission Results</title>
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
            <h3>Form Submission Results</h3>
            <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    if (isset($_POST["firstNameTextBox"])) {
                        $firstName = $_POST["firstNameTextBox"];
                        echo "<span id=\"firstNameTextBox\">First Name: $firstName</span><br>";
                    } else {
                        $firstName = "Was not set by the form";
                        echo "<span id=\"firstNameTextBox\">First Name: $firstName</span><br>";
                    }

                    if (isset($_POST["lastNameTextBox"])) {
                        $lastName = $_POST["lastNameTextBox"];
                        echo "<span id=\"lastNameTextBox\">Last Name: $lastName</span><br>";
                    } else {
                        $lastName = "Was not set by the form";
                        echo "<span id=\"lastNameTextBox\">Last Name: $lastName</span><br>";
                    }

                    if (isset($_POST["telnumberTextBox"])) {
                        $telnumberTextBox = $_POST["telnumberTextBox"];
                        echo "<span id=\"telnumberTextBox\">Telephone Number: $telnumberTextBox</span><br>";
                    } else {
                        $telnumberTextBox = "Was not set by the form";
                        echo "<span id=\"telnumberTextBox\">Telephone Number: $telnumberTextBox</span><br>";
                    }

                    if (isset($_POST["emailTextBox"])) {
                        $emailTextBox = $_POST["emailTextBox"];
                        echo "<span id=\"emailTextBox\">Email: $emailTextBox</span><br>";
                    } else {
                        $emailTextBox = "Was not set by the form";
                        echo "<span id=\"emailTextBox\">Email: $emailTextBox</span><br>";
                    }

                    if (isset($_POST["BirthDayTextBox"])) {
                        $BirthDayTextBox = $_POST["BirthDayTextBox"];
                        echo "<span id=\"BirthDayTextBox\">Birth Day: $BirthDayTextBox</span><br>";
                    } else {
                        $BirthDayTextBox = "Was not set by the form";
                        echo "<span id=\"BirthDayTextBox\">Birth Day: $BirthDayTextBox</span><br>";
                    }

                    if (isset($_POST["profession"])) {
                        $profession = $_POST["profession"];
                        echo "<span id=\"profession\">Select your profession : $profession</span><br>";
                    } else {
                        $profession = "Was not set by the form";
                        echo "<span id=\"profession\">Select your profession : $profession</span><br>";
                    }

                    if (isset($_POST["sports"])) {
                        $sports = $_POST["sports"];
                        echo "<span id=\"sportresult\">Choose your favourist sport: $sports</span><br>";
                    } else {
                        $sports = "Was not set by the form";
                        echo "<span id=\"sportresult\">Choose your favourist sport: $sports</span><br>";
                    }
                } else {
                    echo "<p>No data received from the form.</p>";
                }
            ?>
            <p><a href="Input.php">Go back to the form</a></p>
        </div>
    </div>
    <?php
        include_once "footer.php";
    ?>
</body>
</html>