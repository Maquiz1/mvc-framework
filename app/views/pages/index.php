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
        // echo "<pre>";
        //     var_dump($data['users']);
        // echo "<pre>";
        
            echo '<br>';
            echo '<br>';
            if($data){
                foreach ($data['users'] as $user){

                    echo "Infomataion: " . $user->user_name . $user->user_email;
                    echo "<br>";                    
                }
            }else{
                echo 'No any user from Database';
            }


        ?>
    </div>

</div> 

<?php
    include '../includes/foot.php';
?>