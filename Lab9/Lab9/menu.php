<?php
echo "<div id=\"menu\">
    <ul>";
        $menus = array(
            "CreateAccount",
            "Login",
            "ViewAllEmployees",
			"SelectAccount"
        );

        foreach ($menus as $menu) : ?>
		    <li>
        <?php if ($menu === 'CreateAccount') : ?>
            <a href="Input.php"><?php echo $menu; ?></a>
		<?php elseif ($menu === 'Login') : ?>
			<a href="Login.php"><?php echo $menu; ?></a>
		<?php elseif ($menu === 'ViewAllEmployees') : ?>
			<a href="ViewAllEmployees.php"><?php echo $menu; ?></a>
		<?php elseif ($menu === 'SelectAccount') : ?>
			<a href="Admin.php"><?php echo $menu; ?></a>
		<?php endif; ?>
		 </li>
		 <?php endforeach;
    echo "</ul>
</div>";
?>






