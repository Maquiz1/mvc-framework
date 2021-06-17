<?php

    require APPROOT . '/views/includes/head.php';  
    
?>

<div class="navbar">

<?php
    require APPROOT . '/views/includes/navigation.php';
?>

</div>

<div class="container-login">
    <div class="wrapper-login">

        <h2>Sign in</h2>
        <form action="<?= URLROOT; ?>/users/login" method="POST">
            <input type="text" placeholder="Username *" name="username">
            <span class="invalidFeedback">
               <?= $data['usernameError']; ?>
            </span>

            <input type="password" placeholder="Password *" name="password">
            <span class="invalidFeedback">
               <?= $data['passwordError']; ?>
            </span>

            <button id='submit' type='submit' value='submit'>Submit</button>
            <p class='options'>Not registered yet?<a href="<?= URLROOT; ?>/users/register">Create an account!</a></p>

        </form>

      
        <?php        
            // if($data){
                

            //     foreach ($data['users'] as $user){

            //         echo "username : " . $user['user_name'] . "  email : " . $user['user_email'];
            //         echo "<br>";                    
            //     }
            // }else{
            //     echo 'No any user from Database';
            // }


        ?>

    </div>
</div>


<?php
    require APPROOT . '/views/includes/foot.php';
?>