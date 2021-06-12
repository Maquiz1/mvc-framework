<?php

    include APPROOT . '/views/includes/head.php';  
    
?>

<div id="section-landing">

<?php
    include APPROOT . '/views/includes/navigation.php';
?>

    <div class="wrapper-landing">
        <h1>One man is crapp soft</h1>
        <h2>is anaother man full job</h2>
        <?php 
            echo $data['title'];
        ?>
    </div>

</div>

<?php
    include APPROOT . '/views/includes/foot.php';
?>