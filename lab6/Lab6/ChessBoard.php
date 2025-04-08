<html>
	<head>
		<title>ChessBorad</title>
		<link rel="stylesheet" type="text/css" href="StyleSheet.css" />
	</head>
	<body>
    <?php
    include_once "header.php";
    include_once "menu.php";
    ?>
    include_once "form.php";     // checking input is vailid
    <div id="content">
        <form action="ChessBoard.php" method="GET">
        <h5>Input the row of ChessBoard <input type="text" name="row" required /></h5><br>
        <h5>Input the colorone of ChessBoard <input type="text" name="color1" id="color1" list="colors" required /><h5><br>
        <h5>Input the colortwo of ChessBoard <input type="text" name="color2" id="color2" list="colors" required /><h5><br>
        <datalist id="colors">
            <option value="black">
            <option value="white">
            <option value="red">
            <option value="grey">
        </datalist>	
        <input type="submit" value="Generate Chessboard">
        </form>
        <div id="chessBoard">
        <?php
            // checking input is valid
            if (isset($_GET["row"]) && isset($_GET["color1"]) && isset($_GET["color2"])) {
                $row = intval($_GET["row"]);
                $color1 = htmlspecialchars($_GET["color1"]);
                $color2 = htmlspecialchars($_GET["color2"]);

                if ($row > 0) {
                    echo "<div id='chessboard'>"; // chessboard in div part，This code is from AI
                    echo "<table border='1'>";
                    for ($i = 0; $i < $row; $i++) {
                        echo "<tr>";
                        for ($j = 0; $j < $row; $j++) {
                            if (($i + $j) % 2 == 0) {
                                $color = $color1;
                            } else {
                                $color = $color2;
                            }
                            echo "<td width='25px' height='25px' td bgcolor='$color'></td>";
                        }
                        echo "</tr>";
                    }
                    echo "</table>";
                    echo "</div>"; // close chessboard div
                } else {
                    echo "Invalid row number. Please enter a positive integer.";
                }
            } else {
                echo "Please fill in all the fields.";
            }
        ?>    
        </div>
    </div>
    <?php
    include_once "footer.php";
    ?>
	</body>
</html>