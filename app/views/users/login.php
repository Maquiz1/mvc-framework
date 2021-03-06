<?php

    require APPROOT . '/views/includes/head.php';  
    
?>

<div class="navbar">

<?php
    require APPROOT . '/views/includes/navigation.php';
?>

</div>

<div class="container-login">
<?php var_dump($_SESSION); ?>
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
            <div>
            <button id='submit' type='submit' value='submit'>Submit</button>
            </div>
            <p class='options'>Not registered yet?<a href="<?= URLROOT; ?>/users/register">Create an account!</a></p>

        </form>

    </div>
</div>


<?php
    require APPROOT . '/views/includes/foot.php';
?>


