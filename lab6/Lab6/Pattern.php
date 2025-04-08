<html>
	<head>
		<title>Generate Prime</title>
		<link rel="stylesheet" type="text/css" href="StyleSheet.css" />
	</head>
	<body>
    <?php 
    include_once "header.php" ;
    include_once "menu.php";
    ?>
    <div id="content">
        <form action="Pattern.php" method="GET">
            <h5>Input Start Number Of Item: <input type="number" name="row" required /></h5><br>
            <input type="submit" value="Generate">
        </form>
        <div id="pattern-general">
        <?php
        // checking input is invalid
        if (isset($_GET["row"])) {
            $row = intval($_GET["row"]);

        for ($i = $row; $i > 0; $i--) {    

            if ($i % 2 == 0) {
                $symbol = "*";
            } else {
                $symbol = "$";
            }

            for ($j = $i; $j >0; $j--) {
                echo $symbol;
                }

            echo "<br>";    
            } 
        }

        ?>
        </div>
    </div>    
    <?php include_once "footer.php";
    ?>
	</body>
</html>