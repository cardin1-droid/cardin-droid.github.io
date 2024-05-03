<style>
    nav {
        box-shadow: none;
    }

    .navbar-nav .nav-item {
        border-bottom: 2px solid transparent;
        transition: border-bottom 0.3s ease;
    }

    .navbar-nav .nav-item:hover {
        border-bottom: 4px solid white;
        /* Border bottom color on hover */
    }

    .navbar-nav .nav-item .nav-link:hover {
        color: white;
    }

    .logout {
        background-color: #202A5B;
        color: white;
        font-weight: bold;
    }

    .logout:hover {
        background-color: red;
        color: black;
        font-weight: bold;
    }

    .dropdown-menu {
        display: none;
        /* Hide the dropdown menu by default */
        position: absolute;
        background-color: #fff;
        border: 1px solid #ddd;
        padding: 10px;
        z-index: 1;
        /* Ensure dropdown appears above other content */
    }

    .dropdown:hover .dropdown-menu {
        display: block;
        /* Show dropdown menu when parent list item is hovered */
        border-radius: 10px;
    }

    /* Style dropdown menu items */
    .dropdown-menu li {
        list-style: none;
    }

    .dropdown-menu li a {
        display: block;
        color: #333;
        text-decoration: none;
        padding: 5px 10px;

    }

    .dropdown-menu li a:hover {
        background-color: #f0f0f0;

    }

    .center-text {
        text-align: center;

    }

    .admin {
        background-color: #7287C0;

    }
</style>


<nav class="navbar navbar-expand-lg navbar-light fixed-top admin">
    <a class="navbar-brands" href="#">Canda<span style="color: #202A5B;">Web</span></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-white ml-4 mr-4" href="index.php">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white ml-4 mr-4" href="admin-data2.php">Data</a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link text-white ml-4 mr-4" href="admin-officials2.php">Officials</a>
            </li>
            <li class="dropdown nav-item">
                <a href="#" class="dropdown-toggle nav-link text-white ml-4 mr-4">
                    <span class="text">Incident</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="center-text"><a class="nav-link text-dark ml-4 mr-4" href=" admin-report.php">Report</a></li>
                    <li class="center-text"><a class="nav-link text-dark ml-4 mr-4" href=" admin-record.php">Record</a></li>
                </ul>
            </li>
            <li class="dropdown nav-item">
                <a href="#" class="dropdown-toggle nav-link text-white ml-4 mr-4">
                    <span class="text">Website</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="center-text"><a class="nav-link text-dark ml-4 mr-4" href=" admin-announcements.php">Announcements</a></li>
                    <li class="center-text"><a class="nav-link text-dark ml-4 mr-4" href=" admin-about.php">About</a></li>
                    <li class="center-text"><a class="nav-link text-dark ml-4 mr-4" href=" admin-services.php">Services</a></li>
                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white ml-4 mr-4" href="admin-notif.php">Notification</a>
            </li>
            <li class="dropdown nav-item">
                <a href="#" class="dropdown-toggle nav-link text-white ml-4 mr-4">
                    <span class="text">Settings</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="center-text"><a class="nav-link text-dark ml-4 mr-4" href=" admin-settings.php">Account Settings</a></li>
                    <li class="center-text"><a class="nav-link text-dark ml-4 mr-4" href=" admin-add.php">Edit Admin</a></li>
                </ul>
            </li>
        </ul>
        
        <a style="background-color: #202A5B;
        color: white;
        font-weight: bold;
        text-decoration: none;" class="btn logoutlog" href="logout.php" onmouseover="this.style.backgroundColor='red';" onmouseout="this.style.backgroundColor='#202A5B';">
            Logout
        </a>

    </div>
</nav>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

<!-- Bootstrap JavaScript -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


