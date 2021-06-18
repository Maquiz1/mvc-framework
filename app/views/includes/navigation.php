<div class="top-nav">
    <ul>
        <li>
            <a href="<?php echo URLROOT; ?>/pages/index">HOME</a>
        </li>
        <li>
            <a href="<?php echo URLROOT; ?>/pages/about">About</a>
        </li>
        <li>
            <a href="<?php echo URLROOT; ?>/pages/projects">Projects</a>
        </li>
        <li>
            <a href="<?php echo URLROOT; ?>/pages/blog">Blog</a>
        </li>
        <li class="btn-login">
            <a href="<?php echo URLROOT; ?>/Pages/contact">Contact</a>
        </li>
        <li class="btn-login">
            <? if(isset($_SESSION['user_id'])) : ?>
            <a href="<?php echo URLROOT; ?>/users/logout">Logout</a>
            <? else : ?>
            <a href="<?php echo URLROOT; ?>/users/login">Login</a>
            <? endif; ?>
        </li>
    </ul>
</div>