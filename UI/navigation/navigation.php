
<?php

$login = include('scripts/php/fetch_login.php');

require('UI/cr-modal/modal.php');

?>
 

<nav class="sidebar close">
    <header>
        <div class="image-text">
            <span class="image">
                <img src="images/gen/user.png">
            </span>
            <div class="text logo-text">
                <span class="name">SocialBook</span>
                <span class="profession"><?php echo ($login === "NULL") ? "Not logged in" : $login; ?></span>
            </div>
        </div>
        <i class='bx bx-chevron-right toggle'></i>
    </header>
    <div class="menu-bar">
        <div class="menu">
            <ul class="menu-links">
                <li class="nav-link">
                    <a href="feed.php" class="<?php echo (basename($_SERVER['PHP_SELF']) === "feed.php") ? "active" : "" ?>">
                        <i class='bx bx-home-alt icon' ></i>
                        <span class="text nav-text">Feed</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a href="#">
                        <i class='bx bx-search icon' ></i>
                        <span class="text nav-text">Search</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a href="#">
                        <i class='bx bx-chat icon'></i>
                        <span class="text nav-text">Inbox</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a href="#">
                        <i class='bx bx-bell icon' ></i>
                        <span class="text nav-text">Notifications</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a onclick="openModal()">
                        <i class='bx bx-plus icon' ></i>
                        <span class="text nav-text">Create Post</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="bottom-content">
            <li class="nav-link">
                <a href="#">
                    <i class='bx bx-user icon' ></i>
                    <span class="text nav-text">Account</span>
                </a>
            </li>
            <li class="nav-link">
                <a href="settings.php" class="<?php echo (basename($_SERVER['PHP_SELF']) === "settings.php") ? "active" : "" ?>">
                    <i class='bx bx-cog icon' ></i>
                    <span class="text nav-text">Settings</span>
                </a>
            </li>
            <li class="">
                <form action="scripts/php/logout.php" method="POST">
                    <a href="#" onclick="this.closest('form').submit();">
                        <i class='bx bx-log-out icon' ></i>
                        <span class="text nav-text">Logout</span>
                    </a>
                </form>
            </li>
            <li class="mode">
                <div class="sun-moon">
                    <i class='bx bx-moon icon moon'></i>
                    <i class='bx bx-sun icon sun'></i>
                </div>
                <span class="mode-text text">Dark mode</span>
                <div class="toggle-switch">
                    <span class="switch"></span>
                </div>
            </li>
            
        </div>
    </div>
</nav>