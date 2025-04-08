<?php
    session_start(); // start session_start;
    $status = isset($_SESSION['update_status']) ? $_SESSION['update_status'] : '';
	?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Complete</title>
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
            <h3>Update Complete Result</h3>
				<?php if ($status === 'success'): ?>
						<h4>Employer information has been updated success！</h4>

					<?php elseif ($status === 'failure'): ?>
						<h4>Employer information has not been updated ！</h4>
					<?php else: ?>
						<p>Unkown Error</p>
					<?php endif; ?>
            <p><a href="CreateAccount.php">Go back to the CreateAccount page.</a></p>
        </div>
    </div>
    <?php
        include_once "footer.php";
    ?>
</body>
</html>