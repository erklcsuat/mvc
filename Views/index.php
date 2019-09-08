<?php

print 'This is a index page!';

?>

<ul>
   <?php 
        foreach($users as $user)
        { ?>
            <li><?php print $user['name']; ?></li>
            <a href="book-add">GO TO BOOK ADD</a>
    <?php }
   ?>
</ul>

<br>
