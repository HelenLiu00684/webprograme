<?php
echo "<div id=\"menu\">
    <ul>";
        $menus = array(
            "Employee",
            "ViewAllEmployees"
        );

        foreach ($menus as $menu) : ?>
		<li>
        <?php if ($menu === 'Employee') : ?>
            <a href="Employee.php"><?php echo $menu; ?></a>
		<?php elseif ($menu === 'ViewAllEmployees') : ?>
			<a href="ViewAllEmployees.php"><?php echo $menu; ?></a>
		<?php endif; ?>
		 </li>
		 <?php endforeach;
    echo "</ul>
</div>";
?>






