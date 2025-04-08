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
                $page = isset($_GET['page']) ? $_GET['page'] : '';
                if ($page === 'arrays') {
                    include_once "Arrays.php";

                } elseif ($page === 'objects') {
                    include_once "Objects.php";

                } 
            ?>
        </div>
    </div>
    <?php
        include_once "footer.php";
    ?>
	</body>
</html>