<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/png" href="uploads/cwlogo.png">

	<title>CandaWeb</title>
</head>


<style>
	@import url('https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Poppins:wght@400;500;600;700&display=swap');

	* {
		margin: 0;
		padding: 0;
		box-sizing: border-box;
		font-family: var(--poppins);
	}

	a {
		text-decoration: none;
	}

	li {
		list-style: none;
	}

	:root {
		--poppins: 'Poppins', sans-serif;
		--lato: 'Lato', sans-serif;
		--light: #F9F9F9;
		--blue: #3C91E6;
		--light-blue: #CFE8FF;
		--grey: #eee;
		--dark-grey: #AAAAAA;
		--dark: #342E37;
		--red: #DB504A;
		--yellow: #FFCE26;
		--light-yellow: #FFF2C6;
		--orange: #FD7238;
		--light-orange: #FFE0D3;
	}

	html {
		overflow-x: hidden;
	}

	body {
		background: var(--grey);
		overflow-x: hidden;
		font-family: 'poppins', sans-serif;

	}

	#content {
		position: relative;
		width: calc(100% - 280px);
		left: 280px;
		transition: .3s ease;
	}

	#sidebar.hide~#content {
		width: calc(100% - 60px);
		left: 60px;
	}

	@media screen and (max-width: 768px) {
		#sidebar {
			width: 200px;
		}

		#content {
			width: calc(100% - 60px);
			left: 200px;
		}

		#content nav .nav-link {
			display: none;
		}
	}

	nav {
		background-color: white;
		box-shadow: none;
		font-family: 'poppins', sans-serif;
	}


	.navbar-brand {
		font-weight: bold;
		font-size: 24px;
		padding-left: 20px;
		color: #4159AA !important;
	}

	.navbar-brands {
		font-weight: bold;
		font-size: 24px;
		padding-left: 20px;
		color: white !important;
	}

	.navbar-brand:hover {
		color: #0d47a1 !important;
	}

	.navbar-brands:hover {
		color: whitesmoke !important;
		text-decoration: none;
	}

	.navbar-nav {
		margin-left: auto;
		margin-right: auto;
	}

	.navbar-nav a {
		font-weight: bold;
		transition: color 0.3s ease-in-out, text-shadow 0.3s ease-in-out;
	}

	.navbar-nav .nav-item {
		border-bottom: 2px solid transparent;
		transition: border-bottom 0.3s ease;
	}

	.navbar-nav .nav-item:hover {
		border-bottom: 4px solid #1565c0;
		/* Border bottom color on hover */
	}

	.navbar-nav .nav-item .nav-link:hover {
		color: #1565c0;
	}

	@media (max-width: 991.98px) {
		.navbar-collapse .navbar-nav .nav-item {
			margin-left: 10px;

		}
	}

	.navbar-toggler-icon {
		background-color: #1565c0 !important;
	}

	.navbar-toggler:focus {
		outline: none;
	}

	.landing-section {
		height: 100vh;
		display: flex;
		align-items: center;
		justify-content: center;
		position: relative;
		/* Ensure the container is positioned */
		color: #fff;
		text-align: center;
	}

	.landing-section::before {
		content: "";
		position: absolute;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		background-color: rgba(0, 0, 0, 0.7);
		/* Dark overlay with transparency */
	}

	.landing-section h1,
	.landing-section p {
		position: relative;
		/* Ensure text is positioned above the overlay */
		z-index: 1;
		/* Ensure text appears above the overlay */
	}

	.landing-section {
		background: url('uploads/canda.jpg') center/cover fixed;
	}


	.animated-heading {
		opacity: 0;
		animation: flyLeft 2s forwards;
		text-shadow: 3px 3px 6px rgba(0, 0, 0, 0.5);
		font-size: 60px;
	}

	@media (min-width: 768px) {
		.animated-heading {
			font-size: 124px;
		}
	}

	@keyframes flyLeft {
		from {
			transform: translateX(-100%);
			opacity: 0;
		}

		to {
			transform: translateX(0);
			opacity: 1;
		}
	}

	#announcements-section {
		padding: 50px 0;
		text-align: center;
	}

	.announcement-slider {
		display: flex;
		overflow: hidden;
		max-width: 100%;
	}

	.announcement-slide {
		min-width: 100%;
		transition: transform 0.5s ease-in-out;
	}

	.announcement-content {
		width: 100%;
		padding: 20px;
		background-color: #f5f5f5;
		border: 1px solid #ddd;
		border-radius: 8px;
	}

	.fixed-size-image {
		max-width: 100%;
		height: auto;
		width: 500px;
		max-height: 300px;
		object-fit: cover;
		border-radius: 5%;
	}

	.title {
		text-align: center;
		padding: 20px;
		color: #1565c0 !important;
		text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
	}

	.titles {
		text-align: center;
		padding: 20px;
		color: white !important;
		text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
	}

	footer {
		background-color: #fff;
		color: black;
		text-align: center;

		padding: 15px;
		bottom: 0;
		width: 100%;
	}

	.bold {
		font-weight: bold;
	}

	.cont-bg {
		background-color: #fff;
	}

	.cont-color {
		background-color: rgb(143, 143, 134);
	}

	.profile-cont {
		margin: 10px;
		margin-top: 70px;
		background-color: #fff;
		border-radius: 10px;
		padding: 30px;
	}

	#map {
		height: 400px;
		width: 100%;
	}

	.bg-canda {
		background-color: #7287C0;
	}

	.hidden {
		display: none;
	}
</style>

<body>