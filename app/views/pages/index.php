<?php

    include APPROOT . '../../views/includes/head.php';  
    
?>

<div id="section-landing">

<?php
    include APPROOT . '../../views/includes/navigation.php';
?>

    <div class="wrapper-landing">
        <h1>One man is crapp soft</h1>
        <h2>is anaother man full job</h2>
        <?php 
            echo $data['title'];
            // var_dump($data);
            foreach ($data['name'] as $user){
                echo "Infomataion: " . $user->username . $user->user_email;
                echo "<br>";
            }

        ?>
    </div>

</div> 

<?php
    include APPROOT . '../../views/includes/foot.php';
?>