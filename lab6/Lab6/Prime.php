<html>
	<head>
		<title>Generate Prime</title>
		<link rel="stylesheet" type="text/css" href="StyleSheet.css" />
	</head>
	<body>
    <?php 
    include_once "header.php" ;
    ?>
    <div id="container">
    <?php
    include_once "menu.php";
    ?>

        <div id="content">
            <form action="Prime.php" method="GET">
                <h5>Input Range 1: <input type="number" name="range1" required /></h5><br>
                <h5>Input Range 2: <input type="number" name="range2" required /></h5><br>
                <input type="submit" value="Generate">
            </form>
            <div id="prime-numbers">
            <?php
            // checking input is invalid
            if (isset($_GET["range1"]) && isset($_GET["range2"])) {
                $range1 = intval($_GET["range1"]);
                $range2 = intval($_GET["range2"]);

                // checking input is positive number
                if ($range1 >= 0 && $range2 >= $range1) {
                    echo "The list of prime numbers in the range between $range1 and $range2 (inclusive):<br>";
                    for ($num = $range1; $num <= $range2; $num++) {
                        if (isPrime($num)) {
                            echo $num . "<br>";
                        }
                    }
                } else {
                    echo "<p style='color: red;'>Invalid input. Please enter valid ranges.</p>";
                }
            }

            // checking the number is prime
            function isPrime($num) {
                if ($num <= 1) {
                    return false;
                }
                for ($i = 2; $i <= sqrt($num); $i++) {
                    if ($num % $i == 0) {
                        return false;
                    }
                }
                return true;
            }
            ?>
            </div>
        </div>  
    </div>       
    <?php include_once "footer.php";
    ?>
	</body>
</html>