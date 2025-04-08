<?php
echo "<div id=\"menu\">
    <ul>";
        $menus = array(
            "Input",
            "Session1",
            "Session2"
        );

        foreach ($menus as $menu) : ?>
		    <li>
        <?php if ($menu === 'Input') : ?>
            <a href="Input.php"><?php echo $menu; ?></a>
		<?php elseif ($menu === 'Session1') : ?>
			<a href="Session1.php"><?php echo $menu; ?></a>
		<?php else : ?>
			<a href="Session1.php"><?php echo $menu; ?></a>
		<?php endif; ?>
		 </li>
		 <?php endforeach;
    echo "</ul>
</div>";
?>






