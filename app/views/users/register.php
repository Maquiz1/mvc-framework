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

        <h2>Register</h2>
        <form action="<?= URLROOT; ?>/users/register" method="POST">
            <input type="text" placeholder="Username *" name="username" value='<?= $data['username']; ?>'>
            <span class="invalidFeedback">
               <?= $data['usernameError']; ?>
            </span>

            <input type="email" placeholder="Email *" name="email" value='<?= $data['email']; ?>'>
            <span class="invalidFeedback">
               <?= $data['emailError']; ?>
            </span>

            <input type="password" placeholder="Password *" name="password" value='<?= $data['password']; ?>'>
            <span class="invalidFeedback">
               <?= $data['passwordError']; ?>
            </span>

            <input type="password" placeholder="Confirm Password *" name="ConfirmPassword" value='<?= $data['ConfirmPassword']; ?>'>
            <span class="invalidFeedback">
               <?= $data['confirmPasswordError']; ?>
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