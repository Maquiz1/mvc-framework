<?php

    require APPROOT . '/views/includes/head.php';  
    
?>

<div id="section-landing">

<?php
    // require APPROOT . '/views/includes/navigation.php';
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

                    echo "username : " . $user['user_name'] . "  email : " . $user['user_email'];
                    echo "<br>";                    
                }
            }else{
                echo 'No any user from Database';
            }


        ?>
    </div>

</div> 

<?php
    require APPROOT . '/views/includes/foot.php';
?>