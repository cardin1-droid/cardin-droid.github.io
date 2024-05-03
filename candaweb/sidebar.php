<style>
	.dropdown-menu {
    display: none; /* Hide the dropdown menu by default */
    position: absolute;
    background-color: #fff;
    border: 1px solid #ddd;
    padding: 10px;
    z-index: 1; /* Ensure dropdown appears above other content */
}

.dropdown:hover .dropdown-menu {
    display: block; /* Show dropdown menu when parent list item is hovered */
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
.center-text{
	text-align: center;
	
}

</style>
<section id="sidebar">
	<a href="index.php" class="brand">
		<i class='bx bxs-smile'></i>
		<span class="text">Canda<span style="color: #64b5f6;">Web</span></span>
	</a>
	<ul class="side-menu top">
		<li>
			<a href="index.php">
				<i class='bx bxs-dashboard'></i>
				<span class="text">Dashboard</span>
			</a>
		</li>
		<li>
			<a href="admin-data.php">
				<i class='bx bxs-shopping-bag-alt'></i>
				<span class="text">Data</span>
			</a>
		</li>
		<li>
			<a href="admin-request.php">
				<i class='bx bxs-doughnut-chart'></i>
				<span class="text">Request</span>
			</a>
		</li>
		<li>
			<a href="admin-officials.php">
				<i class='bx bxs-group'></i>
				<span class="text">Officials</span>
			</a>
		</li>
		<li class="dropdown">
			<a href="admin-website.php" class="dropdown-toggle">
				<i class='bx bxs-group'></i>
				<span class="text">Website</span>
			</a>
			<ul class="dropdown-menu">
				<li class="center-text"><a href="admin-announcements.php">Announcements</a></li>
				<li class="center-text"><a href="admin-about.php">About</a></li>
				<li class="center-text"><a href="admin-services.php">Services</a></li>
				
			</ul>
		</li>
		<li>
			<a href="admin-notif.php">
				<i class='bx bxs-group'></i>
				<span class="text">Notification</span>
			</a>
		</li>

	</ul>
	<ul class="side-menu">
		<li>
			<a href="admin-settings.php">
				<i class='bx bxs-cog'></i>
				<span class="text">Settings</span>
			</a>
		</li>
		<li>
			<a href="logout.php" class="logout">
				<i class='bx bxs-log-out-circle'></i>
				<span class="text">Logout</span>
			</a>
		</li>
	</ul>
</section>