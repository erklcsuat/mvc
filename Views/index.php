<?php

print 'This is a index page!';

?>

<ul>
   <?php 
        foreach($users as $user)
        { ?>
            <li><?php print $user['name']; ?></li>
    <?php } ?>
</ul>

<br>
