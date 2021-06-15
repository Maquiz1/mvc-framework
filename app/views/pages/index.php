<?php

    include '../includes/head.php';  
    
?>

<div id="section-landing">

<?php
    include '../includes/navigation.php';
?>

    <div class="wrapper-landing">
        <h1></h1>
        <?php 
            // var_dump($data);
            if($data){
                foreach ($data['user'] as $user){
                    echo "Infomataion: " . $user->user_name . $user->user_email;
                    echo "<br>";
                }
            }else{
                echo 'No an user form Database';
            }

        ?>
    </div>

</div> 

<?php
    include '../includes/foot.php';
?>