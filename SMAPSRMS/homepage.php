<?php
session_start();
include 'db_config.php'; // Include database configuration

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="homepage.css">
</head>
<body>

    <header>
        <div class="header-container">
            <div class="logo-left">
                <img src="img/leftlogo.png" alt="Parish Logo">
            </div>
            <h1>Saint Michael the Archangel Parish Sacramental Records Management System</h1>
            <div class="logo-right">
                <img src="img/rightlogo.png" alt="Right Logo">
            </div>
        </div>
    </header>
 
    <div class="nav-container"> 
        <div class="search-bar">
            <input type="text" placeholder="Search here...">
            <button type="submit">
                <img src="img/search.png" alt="Search">
            </button>
        </div>
        <nav>
    <ul>
        <li>
            <form action="dashboard.php" method="get">
                <button type="submit" style="background: none; border: none; text-align: center;">
                    <img src="img/dashboard.png" alt="Dashboard Icon" style="width: 25px; height: 30px; display: block; margin: 0 auto;">
                    Dashboard
                </button>
            </form>
        </li>
        <li>
<form action="registration_options.php" method="get">
                <button type="submit" style="background: none; border: none; text-align: center;">
                    <img src="img/registration.png" alt="Registration Icon" style="width: 30px; height: 30px; display: block; margin: 0 auto;">
                    Registration
                </button>
            </form>
        </li>
        <li>
            <form action="baptismalRec.php" method="get">
                <button type="submit" style="background: none; border: none; text-align: center;">
                    <img src="img/baptism.png" alt="Baptism Icon" style="width: 30px; height: 30px; display: block; margin: 0 auto;">
                    Baptism
                </button>
            </form>
        </li>
        <li>
            <form action="communion.php" method="get">
                <button type="submit" style="background: none; border: none; text-align: center;">
                    <img src="img/communion.png" alt="Communion Icon" style="width: 30px; height: 30px; display: block; margin: 0 auto;">
                    Communion
                </button>
            </form>
        </li>
        <li>
            <form action="confirmation_records.php" method="get">
                <button type="submit" style="background: none; border: none; text-align: center;">
                    <img src="img/confirmation.png" alt="Confirmation Icon" style="width: 35px; height: 30px; display: block; margin: 0 auto;">
                    Confirmation
                </button>
            </form>
        </li>
        <li>
            <form action="marriageRec.php" method="get">
                <button type="submit" style="background: none; border: none; text-align: center;">
                    <img src="img/marriage.png" alt="Marriage Icon" style="width: 35px; height: 30px; display: block; margin: 0 auto;">
                    Marriage
                </button>
            </form>
        </li>
    </ul>
</nav>
<div class="profile-container" onclick="toggleMenu(event)">
    <img src="img/profile.png" alt="Profile Icon" class="profile-icon w-8 h-8 rounded-full object-cover">
    <span id="user-menu-button" class="user-name text-sm font-semibold text-[#1a2a4e] select-none flex items-center space-x-2 cursor-pointer">
        USER'S NAME <i class="fas fa-caret-down mr-3 text-lg"></i>
    </span>
    <div id="dropdown-menu" class="hidden origin-top-right absolute right-20 top-16 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none z-10" tabindex="-1" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button">
        <ul>
            <li>
                <a href="profile.php" class="flex items-center px-4 py-2 text-sm text-gray-900 hover:bg-gray-100" role="menuitem">
                    <i class="fas fa-user mr-2"></i> Profile
                </a>
            </li>
            <li>
                <a href="change_password.php" class="flex items-center px-4 py-2 text-sm text-gray-900 hover:bg-gray-100" role="menuitem">
                    <i class="fas fa-lock mr-2"></i> Change Password
                </a>
            </li>
            <li>
                <a href="logout.php" class="flex items-center px-4 py-2 text-sm text-gray- 900 hover:bg-gray-100" role="menuitem">
                    <i class="fas fa-sign-out-alt mr-2"></i> Sign Out
                </a>
            </li>
        </ul>
    </div>
</div>
    
    </div>

    

    <main>
<div class="background-image"></div>
    </main>
    <footer>
        <p>Copyright &copy; SMAP 2025. smap.com. All Rights Reserved | <a href="#">Privacy Policy</a></p>
    </footer>
<script>
function toggleMenu(event) {
    const menu = document.getElementById("dropdown-menu");
    menu.classList.toggle("hidden");
    
    // Prevent the click event from bubbling up to the window
    event.stopPropagation();
}

// Close dropdown if clicked outside
window.addEventListener("click", (e) => {
    const menu = document.getElementById("dropdown-menu");
    if (!menu.contains(e.target) && !document.querySelector(".profile-container").contains(e.target)) {
        menu.classList.add("hidden");
    }
});
</script>
</body>
</html>
